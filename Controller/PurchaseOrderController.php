<?php
App::uses('AppController', 'Controller');

class PurchaseOrderController extends AppController {

	public $components = array('Paginator');
    
    public $uses = array(
        'Company' ,
        'Customer' ,
        'Products' ,
        'ParentCategory' ,
        'Category' ,
        'Unit' ,
        'Wholesale' ,
        'Attachment' ,
        'PurchaseOrderHeader' ,
        'PurchaseOrderDetail' ,
        'Consumer' ,
        'Delivering' ,
    );
    
    public function beforeRender()
    {
        $this->set('baseUrl', Router::url('/'));
        $this->set('baseUrlDashboard', Router::url('/dashboard/'));
        if(!$this->Session->check('Customer.company_id'))
        {
            return $this->redirect(array('controller' => 'dashboard', 'action' => 'customer'));
        }
    }
    
    private function uploadDocuments($id)
    {
        $ds          = DIRECTORY_SEPARATOR;
        $idPO = $id;
        $storeFolder = '..\webroot\files\delivery'. $ds .$idPO;
        
        if (!empty($this->request->form)) 
        {
            $tempFile = $this->request->form['documents']['tmp_name'];
            $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds; 
            if (!file_exists($targetPath)) {
                mkdir($targetPath, 0777, true);
            }
            $targetFile =  $targetPath. $this->request->form['documents']['name'];
            if(move_uploaded_file($tempFile,$targetFile))
            {
                $this->Delivering->create();
                $dataEdit = array(
                    'id_po_h' => $idPO ,
                    'date_delivering' => date('Y-m-d H:i:s') ,
                    'attachment' => $this->request->form['documents']['name'] ,
                );
                $this->Delivering->save($dataEdit);
                
                $this->PurchaseOrderHeader->id = $idPO;
                $this->PurchaseOrderHeader->save(array('status' => 'delivering'));
                $this->Session->setFlash('Purchase Order Berhasil Di kirim','success');
            }
        }
    }
    
    public function index($page = 0)
    {
        //FOR UPLOAD DOCUMENTS
        if($this->request->is('post') && isset($this->request->data['id']))
        {
            $this->uploadDocuments($this->request->data['id']);
        }
        
        //FOR SEARCHING
        if($this->request->is('post') && !isset($this->request->data['id']))
        {
            $sortTransaction = array();
            $sortDate = array();
            
            if(isset($this->request->data['filter']['status']) & !empty($this->request->data['filter']['status']))
            {
                if ($this->request->data['filter']['status'] == 1)
                    $status = 'pending';
                if ($this->request->data['filter']['status'] == 2)
                    $status = 'on progress';
                if ($this->request->data['filter']['status'] == 3)
                    $status = 'delivering';    
                
                $conditions['conditions'] = array(
                    'status' => $status
                );
            }
            
            if (isset($this->request->data['filter']['date']) && !empty($this->request->data['filter']['date']))
            {
                if ($this->request->data['filter']['date'] == 1)
                    $date = 'DESC';
                if ($this->request->data['filter']['date'] == 2)
                    $date = 'ASC';
                    
                $sortDate = array(
                    'date_po' => $date
                );
                $conditions['order'] = array_merge($sortDate , $sortTransaction);
            }
            
            
            if (isset($this->request->data['filter']['transaction']) && !empty($this->request->data['filter']['transaction']))
            {
                if ($this->request->data['filter']['transaction'] == 1)
                    $transaction = 'ASC';
                if ($this->request->data['filter']['transaction'] == 2)
                    $transaction = 'DESC';
                    
                $sortTransaction = array(
                    'total_transaction' => $transaction
                );
                $conditions['order'] = array_merge($sortDate , $sortTransaction);
            }
            $conditions['limit'] = 2;
        }
        //pr($this->request);die;
        
        $this->request->data = array(
            'filter' => array(
                'status' => isset($this->request->data['filter']['status']) && !empty($this->request->data['filter']['status']) ? $this->request->data['filter']['status']: '' ,
                'date' => isset($this->request->data['filter']['date']) && !empty($this->request->data['filter']['date']) ? $this->request->data['filter']['date']: '' ,
                'transaction' => isset($this->request->data['filter']['transaction']) && !empty($this->request->data['filter']['transaction']) ? $this->request->data['filter']['transaction']: '' ,
            )
        );
        
        //set for first time
        if(!isset($conditions))
        {
            $conditions = array(
                'limit' => 2
            );
        }
        /*
        if(isset($this->request->params['sort']))
        {
            $conditions['order'] = array(
                $this->request->params['sort'] => $this->request->params['direction']
            );
        }
        //pr($conditions);die;
        */
        $this->Paginator->settings = $conditions;
        $this->request->params['named']['page'] = $page;
        $data = $this->Paginator->paginate($this->PurchaseOrderHeader);
        
        $dataPO = array();
        if(!empty($data))
        {
            foreach($data as $row => $val)
            {
                $consumer_name = $this->Consumer->find('first' , array('conditions' => array('consumer_id' => $val['PurchaseOrderHeader']['consumer_id'])));
                $name = $consumer_name['Consumer']['consumer_name'];
                
                $dataPO[] = array('PurchaseOrderHeader' => array(
                    'id' => $val['PurchaseOrderHeader']['id_po_h'] ,
                    'date' => $val['PurchaseOrderHeader']['date_po'] ,
                    'total_transaction' => $val['PurchaseOrderHeader']['total_transaction'] ,
                    'consumer_id' => $val['PurchaseOrderHeader']['consumer_id'] ,
                    'consumer_name' => $name ,
                    'status' => $val['PurchaseOrderHeader']['status'] ,
                ));
            }
        }
        $this->set('dataPO' , $dataPO);
    }
    
    public function details()
    {
        $id = $this->request->params['id'];
        $POdata = $this->PurchaseOrderHeader->find('first' , array('conditions' => array('id_po_h' => $id)));
        $consumerData = $this->Consumer->find('first' , array('conditions' => array('consumer_id' => $POdata['PurchaseOrderHeader']['consumer_id'])));
        $detailPO = $this->PurchaseOrderDetail->find('all' , array('conditions' => array('id_po_h' => $id)));
        $companyDetails = $this->Company->find('first' , array('conditions' => array('company_id' => $consumerData['Consumer']['company_id'])));
        
        $this->set('POdata' , $POdata);
        $this->set('consumerData' , $consumerData);
        $this->set('detailPO' , $detailPO);
        $this->set('companyDetails' , $companyDetails);
    }
    
    public function progress()
    {
        $this->autoRender = false;
        $id = $this->request->data['id'];
        
        $data = array(
            'status' => 'on progress'
        );
        
        $this->PurchaseOrderHeader->id = $id;
        $this->PurchaseOrderHeader->save($data);
    }
    
    public function completed()
    {
        $this->autoRender = false;
        $id = $this->request->data['id'];
        
        $data = array(
            'status' => 'completed'
        );
        
        $this->PurchaseOrderHeader->id = $id;
        $this->PurchaseOrderHeader->save($data);
    }
    
    public function reject()
    {
        $this->autoRender = false;
        $id = $this->request->data['id'];
        $reason = $this->request->data['reason'];
        
        $data = array(
            'status' => 'reject' ,
            'reason' => $reason ,
            
        );
        
        $this->PurchaseOrderHeader->id = $id;
        $this->PurchaseOrderHeader->save($data);
    }
}

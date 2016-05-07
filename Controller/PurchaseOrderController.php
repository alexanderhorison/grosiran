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
    
    private function filteringPurchaseOrder($filter)
    {
        $conditions = array();
        $order = array();
        
        if (isset($filter['status']) && !empty($filter['status'])) {
            $conditions['PurchaseOrderHeader.status'] = $filter['status'];
        }
        
        $sortTransaction = array();
        $sortDate = array();
        if (isset($filter['date']) && !empty($filter['date']))
        {
            if ($filter['date'] == 1)
                $date = 'DESC';
            if ($filter['date'] == 2)
                $date = 'ASC';
                
            $sortDate = array(
                'date_po' => $date
            );
        }
        
        if (isset($filter['transaction']) && !empty($filter['transaction']))
        {
            if ($filter['transaction'] == 1)
                $transaction = 'ASC';
            if ($filter['transaction'] == 2)
                $transaction = 'DESC';
                
            $sortTransaction = array(
                'total_transaction' => $transaction
            );
        }
        $order = array_merge($sortDate , $sortTransaction);
        $this->Paginator->settings = array(
            'conditions' => $conditions ,
            'order' => $order ,
            'limit' => 5
        );
        
        try {
            $data = $this->Paginator->paginate($this->PurchaseOrderHeader);
        } catch (Exception $e) {
            $data = array();
        }
        
        return $data;
    }
    
    public function index()
    {
        if($this->request->is('post') && isset($this->request->data['id']))
        {
            $this->uploadDocuments($this->request->data['id']);
        }
    
        $data = $this->filteringPurchaseOrder($this->request->query);
        $dataPO = array();
        
        if (!empty($data)) {
            foreach ($data as $row => $val) {
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

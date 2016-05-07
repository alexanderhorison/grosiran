<?php
App::uses('AppController', 'Controller');

class HistoryController extends AppController {

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
    
    private function filteringOrderHistory($filter)
    {
        $conditions = array();
        $order = array();
        
        $conditions['PurchaseOrderHeader.status IN'] = array('reject' , 'completed');
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
            'limit' => 2
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
        $data = $this->filteringOrderHistory($this->request->query);
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
}

<?php
App::uses('AppController', 'Controller');

class TicketController extends AppController {

	public $components = array('Paginator');
    
    public $uses = array(
        'Company' ,
        'Customer' ,
        'Consumer' ,
        'Products' ,
        'ParentCategory' ,
        'Category' ,
        'Unit' ,
        'Wholesale' ,
        'Attachment' ,
        'Ticket' ,
        'TicketDetail' ,
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
    
    
    private function filteringTicket($filter)
    {
        $conditions = array();
        $order = array();
        
        if (isset($filter['status']) && !empty($filter['status'])) {
            $conditions['Ticket.status'] = $filter['status'];
        }
        
        $sortDate = array();
        if (isset($filter['date']) && !empty($filter['date']))
        {
            if ($filter['date'] == 1)
                $date = 'DESC';
            if ($filter['date'] == 2)
                $date = 'ASC';
                
            $sortDate = array(
                'date_ticket' => $date
            );
        }
        
        $this->Paginator->settings = array(
            'conditions' => $conditions ,
            'order' => $sortDate ,
            'limit' => 2
        );
        
        
        try {
            $data = $this->Paginator->paginate($this->Ticket);
        } catch (Exception $e) {
            $data = array();
        }
        
        return $data;
    }
    
    public function index()
    {
        $data = $this->filteringTicket($this->request->query);
        $this->set('data' , $data);
    }
    
    public function details()
    {
        $id = $this->params['id'];
        
        $ticketData = $this->Ticket->find('first' , array('conditions' => array('id_ticket' => $id)));
        $consumerData = $this->Consumer->find('first' , array('conditions' => array('consumer_id' => $ticketData['Ticket']['consumer_id'])));
        $detailTicket = $this->TicketDetail->find('all' , array('conditions' => array('id_ticket' => $id)));
        $companyDetails = $this->Company->find('first' , array('conditions' => array('company_id' => $consumerData['Consumer']['company_id'])));
        
        //pr($detailTicket);die;
        $this->set('ticketData' , $ticketData);
        $this->set('consumerData' , $consumerData);
        $this->set('companyDetails' , $companyDetails);
        $this->set('detailTicket' , $detailTicket);
        
        if ($this->request->is('post'))
        {
            $data = array(
                'id_ticket' => $id ,
                'owner_id' => $this->Session->read('Customer.user_id') ,
                'type' => 'company' ,
                'date' => date('Y-m-d H:i:s') ,
                'message' => $this->request->data['reply']
            );
            
            $this->TicketDetail->create();
            if($this->TicketDetail->save($data))
            {
                $this->Session->setFlash('Berhasil Reply','success');
                return $this->redirect(array('controller' => 'ticket', 'action' => 'details' , 'id' => $id));
            }
            
        }
    }
}

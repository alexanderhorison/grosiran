<?php
App::uses('AppController', 'Controller');

class DashboardController extends AppController {

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
    );
    
    public function beforeRender()
    {
        if($this->Session->read('Customer.company_id') != '')
        {
            $this->set('baseUrl', Router::url('/'));
            $this->set('baseUrlDashboard', Router::url('/dashboard/'));
        }
        else
            return $this->redirect(array('controller' => 'login', 'action' => 'login'));
    }
    
    public function customer()
    {
        
    }
    
    public function profile()
    {
        $idCompany  = $this->Session->read('Customer.company_id');
        
        if($this->request->is(array('post' , 'put')))
        {
            $save = $this->Company->saveData($this->request->data , $idCompany);
            if($save)
            {
                $this->Session->setFlash('Data berhasil disimpan','success');
                return $this->redirect(array('controller' => 'dashboard', 'action' => 'profile'));
            }
            $this->Session->setFlash('Data gagal disimpan','error');
        }
        
        $dataCompany = $this->Company->find('first' , array('conditions' => array('company_id' => $idCompany)));
        $this->request->data = $dataCompany;
    }
    
}

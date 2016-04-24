<?php
App::uses('AppController', 'Controller');

class LoginController extends AppController {

	public $components = array('Paginator');
    
    public $uses = array(
        'Company' ,
        'Customer' ,
        'Products' ,
    );
    public $layout = 'clean';
    
    
    public function beforeRender()
    {
        $this->set('baseUrl', Router::url('/'));
        $this->set('baseUrlDashboard', Router::url('/dashboard/'));
        if($this->Session->check('Customer.company_id'))
        {
            return $this->redirect(array('controller' => 'dashboard', 'action' => 'customer'));
        }
    }
    
    public function logout()
    {
        $this->Session->destroy();
        return $this->redirect(array('controller' => 'login', 'action' => 'login'));
    }
    
    public function login()
    {
        if($this->request->is('post'))
        {
            $data = $this->Customer->checkCustomer($this->request->data);
            if(!empty($data))
            {
                $this->Session->write('Customer.company_id', $data['company_id']);
                $this->Session->write('Customer.user_id', $data['user_id']);
                $this->Session->setFlash('Berhasil login','success');
                return $this->redirect(array('controller' => 'dashboard', 'action' => 'customer'));
            }
            $this->Session->setFlash('Gagal login','error');
        }
    }
}

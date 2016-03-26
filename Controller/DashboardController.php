<?php
App::uses('AppController', 'Controller');

class DashboardController extends AppController {

	public $components = array('Paginator');

    public function beforeRender()
    {
        $this->set('baseUrl', Router::url('/'));
        $this->set('baseUrlDashboard', Router::url('/dashboard/'));
    }

    public function index()
    {
        
    }

    public function add()
    {
        
    }
    
    public function profile()
    {
        
    }

}

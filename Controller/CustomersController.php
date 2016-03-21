<?php
App::uses('AppController', 'Controller');

class CustomersController extends AppController {

	public $components = array('Paginator');

    public function beforeRender()
    {
        $this->set('__module_title__', 'Customers');
        $this->set('__action_title__', 'List Customers');
    }

    public function index()
    {

    }

    public function add()
    {
        
    }

}

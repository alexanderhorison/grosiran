<?php
App::uses('AppModel', 'Model' , 'Session');

/**
 * Customer Model
 *
 */
class Customer extends AppModel {

	public $useTable = 'b_user';
    public $primaryKey = 'user_id';

    
    public function checkCustomer($data)
    {
        $customer = $this->find('first' , array('condtions' => $data));
        $response = array();
        if(!empty($customer))
            $response = $customer['Customer'];
        
        return $response;
    }
}

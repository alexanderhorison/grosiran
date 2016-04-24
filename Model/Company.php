<?php
App::uses('AppModel', 'Model');

/**
 * Company Model
 *
 */
class Company extends AppModel {

	public $useTable = 'company_app';
    public $primaryKey = 'company_id';

    
    
    public function saveData($data , $id)
    {
        $this->id = $id;
        $data['Company']['last_update'] = date('Y-m-d H:i:s');
        //pr($data);die;
        return $this->save($data , $id);
    }
}

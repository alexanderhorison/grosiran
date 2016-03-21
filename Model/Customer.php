<?php
App::uses('AppModel', 'Model');

/**
 * Customer Model
 *
 */
class Customer extends AppModel {

	public $useTable = 'customers';
    public $primaryKey = 'CUSTOMER_ID';

}

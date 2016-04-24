<?php
App::uses('AppModel', 'Model' , 'Session');

/**
 * Customer Model
 *
 */
class Consumer extends AppModel {

	public $useTable = 'consumer';
    public $primaryKey = 'consumer_id';
}

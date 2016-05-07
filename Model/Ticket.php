<?php
App::uses('AppModel', 'Model');

/**
 * Unit Model
 *
 */
class Ticket extends AppModel {

	public $useTable = 'ticket';
    public $primaryKey = 'id_ticket';
}

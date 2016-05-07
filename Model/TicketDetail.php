<?php
App::uses('AppModel', 'Model');

/**
 * Unit Model
 *
 */
class TicketDetail extends AppModel {

	public $useTable = 'ticket_detail';
    public $primaryKey = 'id_detail_ticket';
}

<?php
App::uses('AppModel', 'Model');

/**
 * wholesale Model
 *
 */
class PurchaseOrderHeader extends AppModel {

	public $useTable = 'purchase_order_header';
    public $primaryKey = 'id_po_h';
    
}

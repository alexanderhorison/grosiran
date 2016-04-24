<?php
App::uses('AppModel', 'Model');

/**
 * wholesale Model
 *
 */
class PurchaseOrderDetail extends AppModel {

	public $useTable = 'purchase_order_detail';
    public $primaryKey = 'id_po_d';
    
    public $belongsTo = array(
        'Products' => array(
            'className' => 'Products',
            'foreignKey' => 'product_id'
        )
    );
}

<?php
App::uses('AppModel', 'Model');

/**
 * Category Model
 *
 */
class Category extends AppModel {

	public $useTable = 'category';
    public $primaryKey = 'category_id';
    
    public $belongsTo = array(
        'ParentCategory' => array(
            'className' => 'ParentCategory',
            'foreignKey' => 'parent_category_id'
        )
    );
}

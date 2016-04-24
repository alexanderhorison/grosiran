<?php
App::uses('AppModel', 'Model');

/**
 * Attachment Model
 *
 */
class Attachment extends AppModel {

	public $useTable = 'attachment';
    public $primaryKey = 'attachment_id';
    
    public function deleteAttachment($id)
    {
        $sql = "
            delete from 
                attachment
            where 
                attachment_id = ".$id."
        ";
        $this->query($sql);
    }
    
    public function defaultImage($name , $idProduct)
    {
        $sql = "
            update
                products
            set
                default_image = '".$name."'
            where
                product_id = ".$idProduct."
        ";
        $this->query($sql);
    }
}

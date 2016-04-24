<?php
App::uses('AppController', 'Controller');

class UploadController extends AppController {

	public $components = array('Paginator');
    
    public $uses = array(
        'Company' ,
        'Customer' ,
        'Products' ,
        'Attachment' ,
    );
    
    public function beforeRender()
    {
        $this->set('baseUrl', Router::url('/'));
        $this->set('baseUrlDashboard', Router::url('/dashboard/'));
    }
    
    
    public function attachment()
    {
        $this->autoRender = false;
        $ds          = DIRECTORY_SEPARATOR;
        $idProduct = $this->request->data['attachment']['id_product'];
        $storeFolder = '..\webroot\files\images'. $ds .$idProduct;
        
        if (!empty($_FILES)) 
        {
            $tempFile = $_FILES['file']['tmp_name'];
            $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds; 
            if (!file_exists($targetPath)) {
                mkdir($targetPath, 0777, true);
            }
            $targetFile =  $targetPath. $_FILES['file']['name'];
            move_uploaded_file($tempFile,$targetFile);
        }
        $data = array(
            'type_attachment' => 'documents' ,
            'product_id' => $idProduct ,
            'url' => $_FILES['file']['name']
        );
        $this->Attachment->save($data);
    }
    
    public function images()
    {   
        $this->autoRender = false;
        $ds          = DIRECTORY_SEPARATOR;
        $idProduct = $this->request->data['images']['id_product'];
        $storeFolder = '..\webroot\files\images'. $ds .$idProduct;
        
        if (!empty($_FILES)) 
        {
            $tempFile = $_FILES['file']['tmp_name'];
            $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;
            if (!file_exists($targetPath)) {
                mkdir($targetPath, 0777, true);
            }
            $targetFile =  $targetPath. $_FILES['file']['name'];
            move_uploaded_file($tempFile,$targetFile);
        }
        $data = array(
            'type_attachment' => 'images' ,
            'product_id' => $idProduct ,
            'url' => $_FILES['file']['name']
        );
        $this->Attachment->save($data);
    }
    
    public function deleteimages()
    {
        $this->autoRender = false;
        $id = $this->request->data['id'];
        $idproduct = $this->request->data['idproduct'];
        $this->Attachment->deleteAttachment($id);
    }
    
    public function deleteattachment()
    {
        $this->autoRender = false;
        $id = $this->request->data['id'];
        $idproduct = $this->request->data['idproduct'];
        $this->Attachment->deleteAttachment($id);
    }
    
    public function defaultimage()
    {
        $this->autoRender = false;
        $name = $this->request->data['name'];
        $idproduct = $this->request->data['idproduct'];
        $this->Attachment->defaultImage($name , $idproduct);
    }
}

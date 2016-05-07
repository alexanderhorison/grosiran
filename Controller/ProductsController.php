<?php
App::uses('AppController', 'Controller');

class ProductsController extends AppController {

	public $components = array('Paginator');
    
    public $uses = array(
        'Company' ,
        'Customer' ,
        'Products' ,
        'ParentCategory' ,
        'Category' ,
        'Unit' ,
        'Wholesale' ,
        'Attachment' ,
    );
    
    public function beforeRender()
    {
        $this->set('baseUrl', Router::url('/'));
        $this->set('baseUrlDashboard', Router::url('/dashboard/'));
        if(!$this->Session->check('Customer.company_id'))
        {
            return $this->redirect(array('controller' => 'dashboard', 'action' => 'customer'));
        }
    }
    
    private function getPaginateProducts($data = array())
    {
        $options['fields'] = array(
            'Products.product_id' ,
            'Category.category_name' ,
            'ParentCategory.parent_category_name' ,
            'Products.product_name' ,
            'Products.product_desc' ,
            'Products.product_price' ,
            'Products.default_image' ,
            'Products.weight' ,
            'Products.selflife' ,
            'Products.status' ,
            'Unit.unit_name'
        );
        
        $options['joins'] = array(
            array(
                'table' => 'category',
                'alias' => 'Category',
                'type' => 'left',
                'foreignKey' => false,
                'conditions'=> array('Products.category_id = Category.category_id')
            ) ,
            array(
                'table' => 'parent_category',
                'alias' => 'ParentCategory',
                'type' => 'left',
                'foreignKey' => false,
                'conditions'=> array('ParentCategory.parent_category_id = ParentCategory.parent_category_id')
            ) ,
            array(
                'table' => 'unit',
                'alias' => 'Unit',
                'type' => 'left',
                'foreignKey' => false,
                'conditions'=> array('Unit.unit_id = Products.unit')
            ) ,
        );
        
        //product name
        $name = array();
        if(!empty($data['name']))
        {   
            $name = array(
                'Products.product_name LIKE' => '%'.$data['name'].'%'
            );
        }
        //end product name
        
        
        //status
        $statusDefault = array(
            'Products.status !=' => 'delete'
        );
        $status = array();
        if(!empty($data['status']))
        {   
            $status = array(
                'Products.status' => $data['status'] == 1 ? 'pending' : 'active'
            );
        }
        $options['conditions'] = array_merge($statusDefault , $status , $name);
        //end status
        
        //order
        if(!empty($data['price']))
        {
            $options['order'] = array(
                'Products.product_price' => $data['price'] == 1 ? 'ASC' : 'DESC'
            );
        }
        //end order
        
        $options['limit'] = 1;
        
        $this->Paginator->settings = $options;
        try {
            $data = $this->Paginator->paginate($this->Products);
        } catch (Exception $e) {
            $data = array();
        }
        
        return $data;
    }
    
    
    public function index()
    {
        $data = $this->getPaginateProducts($this->request->query);
        $dataProducts = '';
        
        if(!empty($data))
        {
            foreach ($data as $row => $val)
            {
                $dataProducts[] = array_merge($val['Products'] , $val['Category'] , $val['ParentCategory'] , $val['Unit']);
            }
        }
        $this->set('data' , $dataProducts);
    }
    
    public function uploadProductsInfo()
    {
        $isValid = $this->Products->find('first' , array('conditions' => array('company_id' => $this->Session->read('Customer.company_id'))));
        if(empty($isValid))
        {
            $this->Session->setFlash('Data tidak bisa di Akses','error');
            return $this->redirect(array('controller' => 'dashboard', 'action' => 'customer'));
        }
        
        $id = $this->request->params['id'];
        $this->set('id' , $id);
        $productDetails = $this->Products->getProductById($id);
        if($productDetails['status'] != 'pending')
        {
            $this->Session->setFlash('Gagal akses ke halaman ini','error');
            return $this->redirect(array('controller' => 'dashboard', 'action' => 'addProducts'));
        }
        $this->set('productDetails' , $productDetails);
        
        $categoryDetails = $this->Category->find('first' , array('conditions' => array('category_id' => $productDetails['category_id'])));
        $categoryDetails = array(
            'category_name' =>  $categoryDetails['Category']['category_name'] ,
            'parent_category_name' =>  $categoryDetails['ParentCategory']['parent_category_name'] ,
        );
        $this->set('categoryDetails' , $categoryDetails);
        
        $unitDetails = $this->Unit->find('first' , array('conditions' => array('unit_id' => $productDetails['unit'])));
        $unitDetails = $unitDetails['Unit'];
        $this->set('unitDetails' , $unitDetails);
        
        $checkWholeSale = $this->Wholesale->find('all' , array('conditions' => array('product_id' => $id)));
        if(!empty($checkWholeSale))
        {
            foreach($checkWholeSale as $row => $val)
            {
                $wholesaleDetails[] = array(
                    'start' => $val['Wholesale']['start'] ,
                    'to' => $val['Wholesale']['to'] ,
                    'wholeprice' => $val['Wholesale']['wholeprice'] ,
                );
            }
            $this->set('wholesaleDetails' , $wholesaleDetails);
        }
        
        
        if ($this->request->is(array('post' , 'put')))
        {
            $idProduct = $this->request->data['id_product'];
            $this->Products->id = $idProduct;
            $this->Products->save(array('status' => 'active'));
            return $this->redirect(array('controller' => 'dashboard', 'action' => 'products'));
        }
    }
    
    public function editProducts()
    {
        $isValid = $this->Products->find('first' , array('conditions' => array('company_id' => $this->Session->read('Customer.company_id'))));
        if(empty($isValid))
        {
            $this->Session->setFlash('Data tidak bisa di Akses','error');
            return $this->redirect(array('controller' => 'dashboard', 'action' => 'customer'));
        }
        
        $id = $this->params['id'];
        $this->set('id' , $id);
        if($this->request->is(array('post' , 'put')))
        {
            $this->request->data['Products']['last_updated_date'] = date('Y-m-d H:i:s');
            $this->request->data['Products']['last_updated_by'] = $this->Session->read('Customer.user_id');
            
            $saveProduct = $this->Products->editData($this->request->data , $id);
            if($saveProduct['code'] == 200)
            {
                $this->Session->setFlash('Data berhasil disimpan','success');
                //return $this->redirect(array('controller' => 'dashboard', 'action' => 'customer'));
            }
            else
                $this->Session->setFlash('Data gagal disimpan','error');
        }
        
        $this->request->data['Products'] = $this->Products->getProductById($id);
        
        $parentCategory = $this->ParentCategory->find('all');
        $parentCategory = Hash::combine(
            $parentCategory, 
            '{n}.ParentCategory.parent_category_id', 
            '{n}.ParentCategory.parent_category_name'
        );
        $this->set('parentCategory' , $parentCategory);
        
        $category = $this->Category->find('all');
        $category = Hash::combine(
            $category, 
            '{n}.Category.category_id', 
            '{n}.Category.category_name'
        );
        $this->set('category' , $category);
        
        $unit = $this->Unit->find('all');
        $unit = Hash::combine(
            $unit, 
            '{n}.Unit.unit_id', 
            '{n}.Unit.unit_name'
        );
        $this->set('unit' , $unit);
        
        $images = $this->Attachment->find('all' , array('conditions' => array('product_id' => $id , 'type_attachment' => 'images')));
        if(!empty($images))
        {
            foreach($images as $row => $val)
            {
                $imagesDetails[] = array(
                    'url' => '../../../webroot/files/images/'.$id.'/'.$val['Attachment']['url'] ,
                    'image' => $val['Attachment']['url'] , 
                    'id' => $val['Attachment']['attachment_id']
                );
            }
            $this->set('imagesDetails' , $imagesDetails);
        }
        
        $attachment = $this->Attachment->find('all' , array('conditions' => array('product_id' => $id , 'type_attachment' => 'documents')));
        if(!empty($attachment))
        {
            foreach($attachment as $row => $val)
            {
                $attachmentDetails[] = array(
                    'url' => '../../../webroot/files/images/'.$id.'/'.$val['Attachment']['url'] ,
                    'image' => $val['Attachment']['url'] ,
                    'id' => $val['Attachment']['attachment_id']
                );
            }
            $this->set('attachmentDetails' , $attachmentDetails);
        }
        
        $defaultImages = $this->Products->getProductById($id);
        $defaultImages = $defaultImages['default_image'];
        $this->set('defaultImages' , $defaultImages);
        
    }
    
    public function addProducts()
    {
        if($this->request->is('post'))
        {
            $this->request->data['Products']['created_date'] = date('Y-m-d H:i:s');
            $this->request->data['Products']['created_by'] = $this->Session->read('Customer.user_id');
            $this->request->data['Products']['company_id'] = $this->Session->read('Customer.company_id');
            $this->request->data['Products']['status'] = 'pending';
            
            $saveProduct = $this->Products->saveData($this->request->data);
            if($saveProduct['code'] == 200)
            {
                $this->Session->setFlash('Data berhasil disimpan','success');
                return $this->redirect(array('controller' => 'dashboard', 'action' => '/products/add/step-2' , $saveProduct['data']));
            }
            $this->Session->setFlash('Data gagal disimpan','error');
        }
        
        $parentCategory = $this->ParentCategory->find('all');
        $parentCategory = Hash::combine(
            $parentCategory, 
            '{n}.ParentCategory.parent_category_id', 
            '{n}.ParentCategory.parent_category_name'
        );
        $this->set('parentCategory' , $parentCategory);
        
        $category = $this->Category->find('all');
        $category = Hash::combine(
            $category, 
            '{n}.Category.category_id', 
            '{n}.Category.category_name'
        );
        $this->set('category' , $category);
        
        $unit = $this->Unit->find('all');
        $unit = Hash::combine(
            $unit, 
            '{n}.Unit.unit_id', 
            '{n}.Unit.unit_name'
        );
        $this->set('unit' , $unit);
    }
    
    public function deleteProduct()
    {
        $this->autoRender = false;
        $id = $this->request->data['id'];
        
        $data = array(
            'status' => 'delete'
        );
        
        $this->Products->id = $id;
        $this->Products->save($data);
    }
    
    public function changeStatus()
    {
        $this->autoRender = false;
        $id = $this->request->data['id'];
        $status = $this->request->data['status'];
        if ($status == 'active')
            $newStatus = 'pending';
        else if($status == 'pending')
            $newStatus = 'active';
        $data = array(
            'status' => $newStatus
        );
        
        $this->Products->id = $id;
        $this->Products->save($data);
    }
}

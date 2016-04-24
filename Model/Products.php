<?php
App::uses('AppModel', 'Model' , 'Wholesale');

/**
 * Products Model
 *
 */
class Products extends AppModel {

	public $useTable = 'products';
    public $primaryKey = 'product_id';

    
    
    public function saveData($data)
    {
        $response = array(
            'code' => 203 ,
        );
        
        if($this->save($data))
        {
            $id = $this->getLastInsertID();
            if(!empty($data['Products']['wholeprice_1']))
            {
                $saveWholesale = $this->inputWholesale($data , $id);
                return $saveWholesale;
            }
            
            $response = array(
                'code' => 200 ,
                'data' => $id
            );
        }
        return $response;
    }
    
    public function inputWholesale($data , $id)
    {
        $wholesale = ClassRegistry::init('Wholesale');
        
        for($i=1 ; $i<=5 ; $i++)
        {
            if(!empty($data['Products']['start_'.$i]) && !empty($data['Products']['to_'.$i]) && !empty($data['Products']['wholeprice_'.$i]))
            {
                $dataWholesale[$i] = array(
                    'product_id' => $id ,
                    'start' => $data['Products']['start_'.$i] ,
                    'to' => $data['Products']['to_'.$i] ,
                    'wholeprice' => $data['Products']['wholeprice_'.$i] ,
                );
                
                $wholesale->create();
                $wholesale->save($dataWholesale[$i]);
            }
        }
        return array(
            'code' => 200 , 
            'data' => $id
        );
    }
    
    public function getProduct()
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
        $options['conditions'] = array(
            'Products.status !=' => 'delete'
        );
        $data = $this->find('all' , $options);
        $dataProducts = array();
        foreach ($data as $row => $val)
        {
            $dataProducts[] = array(
                'product_id' => $val['Products']['product_id'] ,
                'product_name' => $val['Products']['product_name'] ,
                'category_name' => $val['Category']['category_name'] ,
                'parent_category_name' => $val['ParentCategory']['parent_category_name'] ,
                'product_price' => $val['Products']['product_price'] ,
                'unit_name' => $val['Unit']['unit_name'] ,
                'default_image' => $val['Products']['default_image'] ,
                'weight' => $val['Products']['weight'] ,
                'selflife' => $val['Products']['selflife'] ,
                'status' => $val['Products']['status'] ,
            );
        }
        return $dataProducts;
        
    }
    
    public function getProductById($id)
    {
        $options['fields'] = array(
            'Products.product_id' ,
            'Products.category_id' ,
            'Products.product_name' ,
            'Products.product_desc' ,
            'Products.product_price' ,
            'Products.default_image' ,
            'Products.weight' ,
            'Products.selflife' ,
            'Products.status' ,
            'Products.unit' ,
            'Wholesale.start' ,
            'Wholesale.to' ,
            'Wholesale.wholeprice' ,
        );
        $options['conditions'] = array(
            'Products.product_id' => $id
        );
        $options['joins'] = array(
            array(
                'table' => 'wholesale',
                'alias' => 'Wholesale',
                'type' => 'left',
                'foreignKey' => false,
                'conditions'=> array('Products.product_id = Wholesale.product_id')
            )
        );
        $data = $this->find('all' , $options);
        
        if($data)
        {
            $dataProduct = $data[0]['Products'];
            $i = 1;
            foreach($data as $row => $val)
            {
                if($val['Wholesale']['wholeprice'] != '')
                {
                    $response['start_'.$i] = $val['Wholesale']['start'];
                    $response['to_'.$i] = $val['Wholesale']['to'];
                    $response['wholeprice_'.$i] = $val['Wholesale']['wholeprice'];
                    $i++;
                }
            }
        }
        if($data[0]['Wholesale']['wholeprice'] != '')
            $dataProduct = array_merge($data[0]['Products'] , $response);
            
        return $dataProduct;
    }
    
    public function editData($data , $id)
    {
        $this->id = $id;
        $response = array(
            'code' => 203 ,
        );
        
        if($this->save($data , $id))
        {
            if(!empty($data['Products']['wholeprice_1']))
            {
                $saveWholesale = $this->editWholesale($data , $id , 'edit');
                return $saveWholesale;
            }
            
            $response = array(
                'code' => 200
            );
        }
        return $response;
    }
    
    public function editWholesale($data , $idProduct)
    {
        $wholesale = ClassRegistry::init('Wholesale');
        $getIdWholesale = $wholesale->find('all' , array('conditions' => array('product_id' => $idProduct)));
        
        $i = 1;
        foreach($getIdWholesale as $row => $val)
        {
            $dataWholesale = array(
                'product_id' => $idProduct ,
                'start' => $data['Products']['start_'.$i] ,
                'to' => $data['Products']['to_'.$i] ,
                'wholeprice' => $data['Products']['wholeprice_'.$i] ,
            );
            $wholesale->id = $val['Wholesale']['wholesale_id'];
            $wholesale->save($dataWholesale , $val['Wholesale']['wholesale_id']);
            $i++;
        }
        
        //if vendor wants to add more
        if(!empty($data['Products']['wholeprice_'.$i]))
        {
            for($i ; $i <= 5 ; $i++)
            {
                if(!empty($data['Products']['start_'.$i]) && !empty($data['Products']['to_'.$i]) && !empty($data['Products']['wholeprice_'.$i]))
                {
                    $dataWholesale[$i] = array(
                        'product_id' => $idProduct ,
                        'start' => $data['Products']['start_'.$i] ,
                        'to' => $data['Products']['to_'.$i] ,
                        'wholeprice' => $data['Products']['wholeprice_'.$i] ,
                    );
                    
                    $wholesale->create();
                    $wholesale->save($dataWholesale[$i]);
                }
            }
        }
        return array(
            'code' => 200
        );
    }
}

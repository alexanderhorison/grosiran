<?php 
$array = array(
    1 => 'Lorem ipsum dolor sit amet.' ,
    2 => 'Dolore, ab unde modi est!' ,
    3 => 'Illum, fuga minus sit eaque.' ,
    4 => 'Consequatur ducimus maiores voluptatum minima.' ,
);
$unit = array(
    1 => 'Unit' ,
    2 => 'Pax' ,
    3 => 'Box' ,
    4 => 'Gram'
);

?>
    <div class="col-md-offset-1 col-md-5 widget_middle_left">
        <div class="stats-info stats-info1">
            <div class="panel-heading">
                <h4 class="panel-title"><span class="title-form">Details Product</span></h4>
            </div>
            <div class="tab-content">
                <div class="well">
                    <h3><?php echo $productDetails['product_name'];?></h3>
                    <b>Category</b>  <br> <?php echo $categoryDetails['category_name'];?> | <?php echo $categoryDetails['parent_category_name'];?><br><br>
                    <b>Product Description</b> <br><?php echo $productDetails['product_desc'];?><br><br>
                    <b>Product Price</b> <br> Rp. <?php echo number_format($productDetails['product_price'] , 2 , ',' , '.');?> / <?php echo $unitDetails['unit_name'];?><br>
                </div>
            </div> 
            <div class="panel-footer">
                <p class="help-block">*Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin semper rhoncus diam id suscipit. In sagittis feugiat</p>
            </div>
        </div>
    </div>
    
    
    <?php if (isset($wholesaleDetails) && !empty($wholesaleDetails)) : ?>
    <div class="col-md-offset-1 col-md-4 widget_middle_left">
        <div class="stats-info stats-info1">
            <div class="panel-heading">
                <h4 class="panel-title"><span class="title-form">Wholesaler Info</span></h4>
            </div>
            <div class="tab-content">
                 <div class="well">
                    <?php foreach($wholesaleDetails as $row => $val):?>
                        <?php echo $val['start'];?> - <?php echo $val['to'];?> <br>Price : Rp. <?php echo number_format($val['wholeprice'] , 2 , ',' , '.');?> / <?php echo $unitDetails['unit_name'];?> <br><br>
                    <?php endforeach;?>
                 </div>
            </div>
            <div class="panel-footer">
                <p class="help-block">*Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin semper rhoncus diam id suscipit. In sagittis feugiat</p>
            </div>
        </div>
    </div>
    <?php endif; ?>
    
    <div class="col-md-offset-1 col-md-10 widget_middle_left">
        <div class="stats-info stats-info1">
            <div class="panel-heading">
                <h4 class="panel-title"><span class="title-form">Images Product</span></h4>
            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="horizontal-form">
                    <div class="form-group">
                        <?php
                        echo $this->Form->create('images', array(
                            'role' => 'form',
                            'class' => 'dropzone',
                            'id' => 'images' ,
                            'type' => 'file',
                            'url' => array('controller' => 'upload', 'action' => 'images')
                        ));
                        echo $this->Form->input('id_product' , array(
                            'type' => 'hidden' ,
                            'value' => $id
                        ));
                        echo $this->Form->end();
                        ?>
                    </div>
                </div>  
            </div>
            <div class="panel-footer">
                <p class="help-block">*Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin semper rhoncus diam id suscipit. In sagittis feugiat</p>
            </div>
        </div>
    </div>
    
    
    <div class="col-md-offset-1 col-md-5 widget_middle_left">
        <div class="stats-info stats-info1">
            <div class="panel-heading">
                <h4 class="panel-title"><span class="title-form">Additional documents</span></h4>
            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="horizontal-form">
                    <div class="form-group">
                        <?php
                        echo $this->Form->create('attachment', array(
                            'role' => 'form',
                            'class' => 'dropzone',
                            'id' => 'attachment' ,
                            'type' => 'file',
                            'url' => array('controller' => 'upload', 'action' => 'attachment')
                        ));
                        echo $this->Form->input('id_product' , array(
                            'type' => 'hidden' ,
                            'value' => $id
                        ));
                        echo $this->Form->end();
                        ?>
                    </div>
                </div>  
            </div>
            <div class="panel-footer">
                <p class="help-block">*Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin semper rhoncus diam id suscipit. In sagittis feugiat</p>
            </div>
        </div>
    </div>
    
    <div class="col-md-offset-1 col-md-4 widget_middle_left">
        <div class="stats-info stats-info1">
            <div class="panel-heading">
                <h4 class="panel-title"><span class="title-form">Additional Info</span></h4>
            </div>
            <div class="tab-content">
                <div class="well">
                    <b>Weight</b>  <br> <?php echo $productDetails['weight'];?> Grams<br><br>
                    <b>Self Life</b> <br><?php echo $productDetails['selflife'];?> Years<br>
                </div>
            </div> 
            <div class="panel-footer">
                <p class="help-block">*Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin semper rhoncus diam id suscipit. In sagittis feugiat</p>
            </div>
        </div>
    </div>
    
<form method="post">
    <?php
    echo $this->Form->input('id_product' , array(
        'type' => 'hidden' ,
        'value' => $id
    ));
    ?>
    <div class="col-md-12 submit-button">
        <button class="btn-block btn" type="submit"><b>Submit Product</b></button>
    </div>
</form>
<?php
echo $this->Html->script(array(
    'easy/wow.min' ,
    'easy/dropzone' ,
    'easy/jquery-1.10.2.min' ,
    'validation/parsley.min' ,
    'easy/jquery.nicescroll' ,
    'dropzone/dropzone',
    'easy/scripts' ,
    'easy/bootstrap.min.js',
    'profile/profile',
    
));
echo $this->fetch('scriptBottom');
?>
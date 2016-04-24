
    <?php
    echo $this->Form->create('Products', array(
        'role' => 'form',
        'class' => 'form-horizontal',
        'id' => 'products' ,
        'type' => 'file',
        'data-parsley-validate' => true ,
    ));
    ?>
    <div class="col-md-offset-1 col-md-10 widget_middle_left">
        <div class="stats-info stats-info1">
            <div class="panel-heading">
                <h4 class="panel-title"><span class="title-form">Details Product</span></h4>
            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="horizontal-form">
                    <!-- categories -->
                    <div class="form-group">
                        <label for="category" class="col-sm-2 control-label">Category</label>
                        <?php
                        echo $this->Form->input('category_master', array(
                            'options' => $parentCategory,
                            'empty' => 'Choose Category' ,
                            'id' => 'category' ,
                            'div' => 'col-sm-4',
                            'label' => false,
                            'class' => 'form-control1 required'
                        ));
                        ?>
                        <?php
                        echo $this->Form->input('category_id', array(
                            'options' => $category,
                            'empty' => 'Choose Sub Category' ,
                            'id' => 'category' ,
                            'div' => 'col-sm-4',
                            'label' => false,
                            'class' => 'form-control1 required'
                        ));
                        ?>
                    </div>
                    
                    <div class="form-group">
                        <label for="product_name" class="col-sm-2 control-label">Product Name</label>
                        <?php
                        echo $this->Form->input('product_name', array(
                            'type' => 'text',
                            'id' => 'product_name' ,
                            'div' => 'col-sm-8',
                            'label' => false,
                            'class' => 'form-control1 required'
                        ));
                        ?>
                        
                    </div>
                    <div class="form-group">
                        <label for="product_desc" class="col-sm-2 control-label">Products Description</label>
                        <div class="col-sm-8">
                            <?php
                            echo $this->Form->textarea('product_desc', array(
                                'id' => 'product_desc' ,
                                'label' => false,
                                'class' => 'form-control1 required control2'
                            ));
                            ?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="price" class="col-sm-2 control-label">Price</label>
                        <?php
                        echo $this->Form->input('product_price', array(
                            'type' => 'text',
                            'id' => 'product_price' ,
                            'div' => 'col-sm-3',
                            'label' => false,
                            'class' => 'form-control1 required' ,
                            'data-parsley-minlength' => 3 ,
                            'data-parsley-type' => 'number' ,
                        ));
                        ?>
                        <?php
                        echo $this->Form->input('unit', array(
                            'options' => $unit,
                            'empty' => 'Choose Unit' ,
                            'id' => 'unit' ,
                            'div' => 'col-sm-2',
                            'label' => false,
                            'class' => 'form-control1 required' ,
                        ));
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
                <div class="tab-pane active" id="horizontal-form">
                    <div class="form-group">
                        <label for="weight" class="col-sm-2 control-label">Weight</label>
                        <?php
                        echo $this->Form->input('weight', array(
                            'type' => 'text',
                            'id' => 'weight',
                            'div' => 'col-sm-6',
                            'label' => false,
                            'class' => 'form-control1' ,
                            //'data-parsley-required' => true ,
                            'data-parsley-type' => 'number' ,
                        ));
                        ?>
                        <div class="col-sm-2">
                            <p class="help-block">Gram</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="selflife" class="col-sm-2 control-label">Shelf life</label>
                        <?php
                        echo $this->Form->input('selflife', array(
                            'type' => 'text',
                            'id' => 'selflife',
                            'div' => 'col-sm-6',
                            'label' => false,
                            'class' => 'form-control1' ,
                            //'data-parsley-required' => true ,
                            'data-parsley-type' => 'number' ,
                        ));
                        ?>
                        <div class="col-sm-2">
                            <p class="help-block">Years</p>
                        </div>
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
                <h4 class="panel-title"><span class="title-form">Wholesaler Info</span></h4>
            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="horizontal-form">
                    <?php for($i=1 ; $i<=5 ; $i++){?>
                        <div class="form-group">
                            <?php
                            echo $this->Form->input('start_'.$i, array(
                                'type' => 'text',
                                'id' => 'from_'.$i ,
                                'div' => 'col-sm-3',
                                'label' => false,
                                'class' => 'form-control1' ,
                                'data-parsley-type' => 'number' ,
                                'placeholder' => 'Start'
                            ));
                            
                            echo $this->Form->input('to_'.$i, array(
                                'type' => 'text',
                                'id' => 'to_'.$i ,
                                'div' => 'col-sm-3',
                                'label' => false,
                                'class' => 'form-control1' ,
                                'data-parsley-type' => 'number' ,
                                'placeholder' => 'To'
                            ));
                            
                            echo $this->Form->input('wholeprice_'.$i, array(
                                'type' => 'text',
                                'id' => 'wholeprice_'.$i ,
                                'div' => 'col-sm-3',
                                'label' => false,
                                'class' => 'form-control1' ,
                                'data-parsley-minlength' => 3 ,
                                'data-parsley-type' => 'number' ,
                                'placeholder' => 'Price'
                            ));
                            ?>
                        </div>
                    <?php } ?>
                </div>  
            </div>
            <div class="panel-footer">
                <p class="help-block">*Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin semper rhoncus diam id suscipit. In sagittis feugiat</p>
            </div>
        </div>
    </div>
    
    <div class="col-sm-12 col-sm-offset-0 submit-button">
        <button class="btn-block btn" type="submit"><b>Next</b></button>
    </div>
    <br><br>
    <?php echo $this->Form->end(); ?>
    
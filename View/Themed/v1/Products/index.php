    <div class="col-md-offset-1 col-md-10 widget_middle_left">
        <div class="stats-info stats-info1">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-3">
                        <h4 class="panel-title"><span class="title-form">List Products</span></h4>
                    </div>
                    <div class="col-md-offset-5">
                        <?php echo $this->Form->create('Filter' , array(
                            'type' => 'get'
                        )); ?>
                            <div class="form-group" id="horizontal-form">
                                <div class="col-md-3">
                                    <?php
                                    echo $this->Form->input('status', array(
                                        'options' => array(
                                            '1' => 'Pending',
                                            '2' => 'Active',
                                        ),
                                        'empty' => 'Sort By Status' ,
                                        'label' => false,
                                        'div' => false,
                                        'class' => 'form-control',
                                    ));
                                    ?>
                                </div>
                                
                                <div class="col-md-3">
                                    <?php
                                    echo $this->Form->input('price', array(
                                        'options' => array(
                                            '1' => 'Price Low to High',
                                            '2' => 'Price High to Low',
                                        ),
                                        'empty' => 'Sort By Price' ,
                                        'label' => false,
                                        'div' => false,
                                        'class' => 'form-control',
                                    ));
                                    ?>
                                </div>
                                <div class="col-md-3">
                                    <?php
                                    echo $this->Form->input('name', array(
                                        'type' => 'text',
                                        'label' => false,
                                        'div' => false,
                                        'class' => 'form-control' ,
                                        'placeholder' => 'Product Name'
                                    ));
                                    ?>
                                </div>
                                <div class="col-md-3">
                                    <?php
                                    echo $this->Form->input('Search', array(
                                        'type' => 'submit',
                                        'label' => false,
                                        'div' => false,
                                        'class' => 'form-control'
                                    ));
                                    ?>
                                </div>
                            </div>
                        <?php echo $this->Form->end(); ?>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="horizontal-form">
                <?php
                if(empty($data)):
                    ?>
                    <div class="col-md-offset-6"><h3>No Data</h3></div>
                    <?php
                else :
                    ?>
                    <div class="online">
                        <?php foreach ($data as $row => $val) : ?>
                            <div class="online-top">
                                <div class="top-at">
                                    <img class="img-responsive" src="/zenopati/webroot/files/images/<?php echo $val['product_id'].'/'.$val['default_image'];?>" alt="">
                                </div>
                                <div class="top-on col-md-5">
                                    <div class="top-on1 col-md-6">
                                        <h3><?php echo $val['product_name'];?></h3>
                                        <p><?php echo $val['category_name'];?> | <?php echo $val['parent_category_name'];?></p>
                                        <p>Rp. <?php echo number_format($val['product_price'] , 2 , ',' , '.');?> / <?php echo $val['unit_name'];?></p>
                                        <p><?php echo $val['weight'];?> Gram</p>
                                        <p><?php echo $val['selflife'];?> Years</p>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <br><br><br>
                                        
                                        <a class="btn btn-default" href="/zenopati/dashboard/products/edit/<?php echo $val['product_id'];?>">Edit Products</a>
                                        <button class="btn btn-default" onclick="deleteProduct(<?php echo $val['product_id'];?>)">Delete Products</button>
                                        <button class="btn btn-default" onclick="changeStatus(<?php echo $val['product_id'];?>,'<?php echo $val['status']?>')">
                                            <?php echo $val['status'] == 'pending' ? 'Active' : 'Pending';?>
                                        </button>
                                    </div>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    
                    <div class="col-md-offset-5">
                        <ul class="pagination" align="center">
                            <?php
                            echo $this->Paginator->prev('&laquo;', array('tag' => 'li', 'escape' => false), '<a href="#">&laquo;</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false , 'onclick' => 'this.form.submit()'));
                            echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentLink' => true, 'currentClass' => 'active', 'currentTag' => 'a' , 'onclick' => 'this.form.submit()'));
                            echo $this->Paginator->next('&raquo;', array('tag' => 'li', 'escape' => false), '<a href="#">&raquo;</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false, 'onclick' => 'this.form.submit()'));
                            ?>
                        </ul>
                    </div>
                <?php endif; ?>
                </div> 
            </div>
            <div class="panel-footer" align="center">
                <p class="help-block">*Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin semper rhoncus diam id suscipit. In sagittis feugiat</p>
            </div>
        </div>
    </div>

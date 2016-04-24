    
    <div class="col-md-offset-1 col-md-10 widget_middle_left">
        <div class="stats-info stats-info1">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-3">
                        <h4 class="panel-title"><span class="title-form">List Purchase Order</span></h4>
                    </div>
                    <div class="col-md-offset-6">
                        <?php echo $this->Form->create('filter'); ?>
                            <div class="form-group" id="horizontal-form">
                                <div class="col-md-4">
                                    <?php
                                    echo $this->Form->input('status', array(
                                        'options' => array(
                                            '1' => 'Pending',
                                            '2' => 'On Progress',
                                            '3' => 'Delivering',
                                        ),
                                        'empty' => 'Sort By Status' ,
                                        'label' => false,
                                        'div' => false,
                                        'class' => 'form-control',
                                        'onchange' => 'this.form.submit()'
                                    ));
                                    ?>
                                </div>
                                <div class="col-md-4">
                                    <?php
                                    echo $this->Form->input('date', array(
                                        'options' => array(
                                            '1' => 'Newset',
                                            '2' => 'Oldest',
                                        ),
                                        'empty' => 'Sort By Date' ,
                                        'label' => false,
                                        'div' => false,
                                        'class' => 'form-control',
                                        'onchange' => 'this.form.submit()'
                                    ));
                                    ?>
                                </div>
                                <div class="col-md-4">
                                    <?php
                                    echo $this->Form->input('transaction', array(
                                        'options' => array(
                                            '1' => 'Transaction Low to High',
                                            '2' => 'Transaction High to Low',
                                        ),
                                        'empty' => 'Sort By Transaction' ,
                                        'label' => false,
                                        'div' => false,
                                        'class' => 'form-control',
                                        'onchange' => 'this.form.submit()'
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
                    if(empty($dataPO))
                        {
                            ?>
                            <div class="col-md-offset-5"><h3>No Data</h3></div>
                            <?php
                        }
                    ?>
                    <div class="online">
                        <?php 
                        foreach ($dataPO as $row => $val) : 
                        if($val['PurchaseOrderHeader']['status'] == "delivering")
                        {
                            $color = 'blue' ;
                            $status = 'primary' ;
                        }
                        if($val['PurchaseOrderHeader']['status'] == "reject")
                        {
                            $color = 'red' ;
                            $status = 'danger' ;
                        }
                        if($val['PurchaseOrderHeader']['status'] == "pending")
                        {
                            $color = 'orange' ;
                            $status = 'warning' ;
                        }
                        if($val['PurchaseOrderHeader']['status'] == "on progress")
                        {
                            $color = 'green' ;
                            $status = 'success' ;
                        }
                        if($val['PurchaseOrderHeader']['status'] == "completed")
                        {
                            $color = 'gray' ;
                            $status = 'default' ;
                        }
                        ?>
                        
                        <div class="online-top">
                            <div class="circle col-md-1" align="center" style="background-color:<?php echo $color;?>;">
                                <b id="id-po">#<?php echo $val['PurchaseOrderHeader']['id'];?></b>
                            </div>
                            <div class="top-on col-md-5">
                                <div class="top-on1 col-md-7">
                                    <p>Date : <?php echo date('d M Y' , strtotime($val['PurchaseOrderHeader']['date']));?></p>
                                    <p>Total Transaction : Rp. <?php echo number_format($val['PurchaseOrderHeader']['total_transaction'] , 2 , ',' , '.');?></p>
                                    <p>Customer Name : <?php echo $val['PurchaseOrderHeader']['consumer_name'];?></p>
                                    <p>Consumer ID : #<?php echo $val['PurchaseOrderHeader']['consumer_id'];?></p>
                                    <p style="color:black">
                                        <h4>
                                            <span class="label label-<?php echo $status;?>">
                                                <?php echo ucfirst($val['PurchaseOrderHeader']['status']);?>
                                            </span>
                                        </h4>
                                    </p>
                                </div>
                                <div class="col-md-5">
                                    <br><br>
                                    <?php if($val['PurchaseOrderHeader']['status'] == 'on progress'):?>
                                    <button class="btn btn-default" data-toggle="modal" data-target="#deliveringModal-<?php echo $val['PurchaseOrderHeader']['id'];?>"> Delivering</button>
                                    <?php endif;?>
                                    
                                    <?php if($val['PurchaseOrderHeader']['status'] == 'pending'):?>
                                    <button class="btn btn-default" onclick="onProgress('<?php echo $val['PurchaseOrderHeader']['id'];?>')"> Progress</button> 
                                    <button class="btn btn-default" data-toggle="modal" data-target="#rejectModal-<?php echo $val['PurchaseOrderHeader']['id'];?>"> Reject</button>
                                    <?php endif;?>
                                    
                                    <?php if($val['PurchaseOrderHeader']['status'] == 'delivering'):?>
                                    <button class="btn btn-default" onclick="completed('<?php echo $val['PurchaseOrderHeader']['id'];?>')"> Completed</button>
                                    <?php endif;?>
                                    <a class="btn btn-default" href="/zenopati/dashboard/purchase-order/details/<?php echo $val['PurchaseOrderHeader']['id'];?>">View Details</a>
                                </div>
                            </div>
                            
                            <div class="clearfix"> </div>
                        </div>
                        
                        
                        <!-- MODAL UPLOAD DOCUMENTS -->
                        <div id="deliveringModal-<?php echo $val['PurchaseOrderHeader']['id'];?>" class="modal fade" role="dialog">
                            <form enctype="multipart/form-data" data-parsley-validate="1" method="post" action="/zenopati/dashboard/purchase-order/">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Upload Delivery Documents</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Please Upload Delivery Documents here..</p>
                                            <input type="file" name="documents" class="required">
                                            <input type="hidden" name="id" value="<?php echo $val['PurchaseOrderHeader']['id'];?>">
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-default" type="submit">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--END MODAL-->
                        
                        <div id="rejectModal-<?php echo $val['PurchaseOrderHeader']['id'];?>" class="modal fade" role="dialog">
                            
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Reject Purchase Order</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Please input reason here..</p>
                                        <textarea class="form-control required" id="reason-<?php echo $val['PurchaseOrderHeader']['id'];?>"></textarea>
                                        <ul class="parsley-errors-list filled" id="error-reason-<?php echo $val['PurchaseOrderHeader']['id'];?>">
                                        </ul>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-default" type="button" onclick="reject('<?php echo $val['PurchaseOrderHeader']['id'];?>')">Submit</button>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                        
                            
                        <?php endforeach; ?>
                    </div>
                    <br><br>
                    <div class="col-md-offset-5">
                        <ul class="pagination" align="center">
                            <?php
                            $this->Paginator->options(array(
                            'url'=> array(
                                'controller' => 'PurchaseOrder',
                                'action' => 'index'
                            )));
                            //echo $this->Paginator->first();
                            echo $this->Paginator->prev('&laquo;', array('tag' => 'li', 'escape' => false), '<a href="#">&laquo;</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
                            echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentLink' => true, 'currentClass' => 'active', 'currentTag' => 'a'));
                            echo $this->Paginator->next('&raquo;', array('tag' => 'li', 'escape' => false), '<a href="#">&raquo;</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="panel-footer" align="center">
                <p class="help-block">*Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin semper rhoncus diam id suscipit. In sagittis feugiat</p>
            </div>
        </div>
    </div>
    
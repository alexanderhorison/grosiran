    
    <div class="col-md-offset-1 col-md-10 widget_middle_left">
        <div class="stats-info stats-info1">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-3">
                        <h4 class="panel-title"><span class="title-form">Order History</span></h4>
                    </div>
                    <div class="col-md-offset-4">
                        <?php echo $this->Form->create('Filter' , array(
                            'type' => 'get'
                        )); ?>
                            <div class="form-group" id="horizontal-form">
                                <div class="col-md-3">
                                    <?php
                                    echo $this->Form->input('status', array(
                                        'options' => array(
                                            'reject' => 'Rejected',
                                            'completed' => 'Completed',
                                        ),
                                        'empty' => 'Filter By Status' ,
                                        'label' => false,
                                        'div' => false,
                                        'class' => 'form-control',
                                    ));
                                    ?>
                                </div>
                                <div class="col-md-3">
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
                                    ));
                                    ?>
                                </div>
                                <div class="col-md-3">
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
                if(empty($dataPO)):
                    ?>
                    <div class="col-md-offset-6"><h3>No Data</h3></div>
                    <?php
                else:
                    ?>
                    <table class="table table-striped">
                        <thead>
                            <tr class="warning">
                                <th>Purchase Order ID</th>
                                <th>Customer Name</th>
                                <th>Date Transaction</th>
                                <th>Total Transaction</th>
                                <th>Status Transaction</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($dataPO as $row => $val) :
                            ?>
                            <tr>
                                <td>#<?php echo $val['PurchaseOrderHeader']['id'];?></td>
                                <td><?php echo $val['PurchaseOrderHeader']['consumer_name'];?></td>
                                <td><?php echo $val['PurchaseOrderHeader']['date'];?></td>
                                <td>Rp. <?php echo number_format($val['PurchaseOrderHeader']['total_transaction'] , 2 , ',' , '.');?></td>
                                <td><?php echo $val['PurchaseOrderHeader']['status'];?></td>
                                <td><a class="btn btn-default" href="/zenopati/dashboard/order-history/details/<?php echo $val['PurchaseOrderHeader']['id'];?>">Details</a></td>
                            </tr>
                            
                            <?php endforeach; ?>
                        <tbody>
                    </table>
                    <br><br>
                    <div class="col-md-offset-5">
                        <ul class="pagination" align="center">
                            <?php
                            echo $this->Paginator->prev('&laquo;', array('tag' => 'li', 'escape' => false), '<a href="#">&laquo;</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false, 'onclick' => 'this.form.submit()'));
                            echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentLink' => true, 'currentClass' => 'active', 'currentTag' => 'a', 'onclick' => 'this.form.submit()'));
                            echo $this->Paginator->next('&raquo;', array('tag' => 'li', 'escape' => false), '<a href="#">&raquo;</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false, 'onclick' => 'this.form.submit()'));
                            ?>
                        </ul>
                    </div>
                <?php endif;?>
                </div>
            </div>
            <div class="panel-footer" align="center">
                <p class="help-block">*Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin semper rhoncus diam id suscipit. In sagittis feugiat</p>
            </div>
        </div>
    </div>
    
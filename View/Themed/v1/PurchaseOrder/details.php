

    <div class="col-md-offset-1 col-md-10 widget_middle_left">
        <div class="stats-info stats-info1">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="panel-title"><span class="title-form">Purchase Order ID : #<?php echo $POdata['PurchaseOrderHeader']['id_po_h'];?></span></h4>
                    </div>
                    <div class="col-md-6" align="right">
                        <button class="btn btn-default"><span class="fa fa-envelope-o"></span> Download as PDF</button>&nbsp;
                        <button class="btn btn-default"><span class="fa fa-bell"></span> Print</button>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="horizontal-form">
                    <div class="row">
                        <div class="col-md-5 well">
                            <div class="row">
                                <h4 style="padding-left:50px">Consumer Details</h4>
                                <div class="col-md-3" align="left" style="padding-left:50px">
                                    <p>Date</p>
                                    <p>Name  </p>
                                    <p>Email</p>
                                    <p>Handphone</p>
                                    <p>Zip Code</p>
                                    <p>Address</p>
                                </div>
                                <div class="col-md-9" style="font-weight:bold">
                                    <p><?php echo date('d M Y' , strtotime($POdata['PurchaseOrderHeader']['date_po']));?></p>
                                    <p><?php echo $consumerData['Consumer']['consumer_name'];?></p>
                                    <p><?php echo $consumerData['Consumer']['consumer_email'];?></p>
                                    <p><?php echo $consumerData['Consumer']['consumer_phone'];?></p>
                                    <p><?php echo $consumerData['Consumer']['zip_code'];?></p>
                                    <p><?php echo $consumerData['Consumer']['consumer_address'];?></p>
                                    
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-5 well">
                            <div class="row">
                                <h4 style="padding-left:50px">Company Details</h4>
                                <div class="col-md-3" align="left" style="padding-left:50px">
                                    <p>Name  </p>
                                    <p>Phone</p>
                                    <p>Fax</p>
                                    <p>Zip Code</p>
                                    <p>Address</p>
                                </div>
                                <div class="col-md-9" style="font-weight:bold">
                                    <p><?php echo $companyDetails['Company']['company_name'];?></p>
                                    <p><?php echo $companyDetails['Company']['company_phone'];?></p>
                                    <p><?php echo $companyDetails['Company']['fax'];?></p>
                                    <p><?php echo $companyDetails['Company']['kodepos'];?></p>
                                    <p><?php echo $companyDetails['Company']['company_address'];?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped">
                                <thead>
                                    <tr class="default">
                                        <th>#</th>
                                        <th>ID Product</th>
                                        <th>Product Name</th>
                                        <th>Price / Unit</th>
                                        <th>Qty</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $i = 1;
                                    foreach($detailPO as $row => $val):
                                    ?>
                                    <tr>
                                        <td><?php echo $i;?></td>
                                        <td><?php echo $val['PurchaseOrderDetail']['product_id'];?></td>
                                        <td><?php echo $val['Products']['product_name'];?></td>
                                        <td>Rp. <?php echo number_format($val['Products']['product_price'] , 2 , ',' , '.');?></td>
                                        <td><?php echo $val['PurchaseOrderDetail']['qty'];?></td>
                                        <td>Rp. <?php echo number_format($val['PurchaseOrderDetail']['total_detail'] , 2 , ',' , '.');?></td>
                                    </tr>
                                    <?php 
                                    $i++;
                                    endforeach;
                                    ?>
                                    <tr style="3px;border-top:solid black 3px;">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><b>Sub Total</b></td>
                                        <td>Rp. <?php echo number_format($POdata['PurchaseOrderHeader']['total_transaction'] , 2 , ',' , '.');?></td>
                                    </tr>
                                    <!--
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><b>Discount</b></td>
                                        <td>10%</td>
                                    </tr>
                                    -->
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><b>Grand Total</b></td>
                                        <td>Rp. <?php echo number_format($POdata['PurchaseOrderHeader']['total_transaction'] , 2 , ',' , '.');?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="well">
                        <b>Remarks : </b><br>
                        *<?php echo $POdata['PurchaseOrderHeader']['remarks'];?>
                    </div>
                    <br><br>
                </div>
            </div>
            <div class="panel-footer" align="center">
                <p class="help-block">*Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin semper rhoncus diam id suscipit. In sagittis feugiat</p>
            </div>
        </div>
    </div>

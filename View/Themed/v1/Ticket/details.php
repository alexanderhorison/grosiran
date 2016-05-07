

    <div class="col-md-offset-1 col-md-10 widget_middle_left">
        <div class="stats-info stats-info1">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="panel-title"><span class="title-form">Ticket ID : #<?php echo $ticketData['Ticket']['id_ticket'];?></span></h4>
                    </div>
                    <div class="col-md-5" align="right">
                        <p><?php echo date('d M Y' , strtotime($ticketData['Ticket']['date_ticket']));?></p>
                    </div>
                    <div class="col-md-1" align="right">
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
                                    <p>Name  </p>
                                    <p>Email</p>
                                    <p>Handphone</p>
                                    <p>Zip Code</p>
                                    <p>Address</p>
                                </div>
                                <div class="col-md-9" style="font-weight:bold">
                                    
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
                        <div class="col-md-12" id="style-2">
                            <div class="activity-row activity-row1">
                                <div class="col-xs-1 activity-img"></div>
                                <div class="col-xs-9 activity-img2">
                                    <div class="activity-desc-sub" align="center">
                                        <h5><b> <?php echo $ticketData['Ticket']['subject'];?></b></h5>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="col-xs-2 activity-desc1"></div>
                                <div class="clearfix"> </div>
                            </div>
                            <?php foreach($detailTicket as $row => $val): ?>
                            
                                <div class="activity-row activity-row1">
                                    <?php if ($val['TicketDetail']['type'] != 'company') : ?>
                                        <div class="col-xs-2 activity-img"><img src="images/3.png" class="img-responsive" alt=""><span>10:02 PM</span></div>
                                        <div class="col-xs-7 activity-img2">
                                            <div class="activity-desc-sub">
                                                <h5> <span class="label label-success">Consumer</span> &nbsp;<?php echo $consumerData['Consumer']['consumer_name'];?></h5>
                                                <p><?php echo $val['TicketDetail']['message'];?></p>
                                            </div>
                                        </div>
                                        <div class="col-xs-2 activity-desc1"></div>
                                        <div class="clearfix"> </div>
                                    <?php else : ?>
                                        <div class="col-xs-2 activity-desc1"></div>
                                        <div class="col-xs-7 activity-img2">
                                            <div class="activity-desc-sub1">
                                                <h5> <span class="label label-danger">Vendor</span> &nbsp;<?php echo $companyDetails['Company']['company_name'];?></h5>
                                                <p><?php echo $val['TicketDetail']['message'];?></p>
                                            </div>
                                        </div>
                                        <div class="col-xs-2 activity-img"><img src="images/3.png" class="img-responsive" alt=""><span>10:02 PM</span></div>
                                        <div class="clearfix"> </div>
                                    <?php endif;?>
                                </div>
                            
                            <?php endforeach;?>
                        </div>
                    </div>
                    <br>
                    
                    <form method="post">
                        <div class="row">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-7">
                                <textarea class="form-control" rows="7" name="reply"></textarea>
                            </div>
                            <div class="col-md-2">
                                <input type="submit" class="btn btn-default btn-lg" value="Reply">
                            </div>
                        </div>
                        
                    </form>
                    
                    <br><br>
                </div>
            </div>
            <div class="panel-footer" align="center">
                <p class="help-block">*Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin semper rhoncus diam id suscipit. In sagittis feugiat</p>
            </div>
        </div>
    </div>

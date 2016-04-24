<!DOCTYPE html>
<html>
<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Zenopati</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href='//fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
    <?php
    echo $this->Html->css(array(
        'bootstrap.min',
        'animate' ,
        'font-awesome' ,
        'graph' ,
        'style' ,
        'icon-font.min' ,
        'parsley' ,
        'dropzone' ,
    ));
    ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="sticky-header left-side-collapsed">
    <section>
        <div class="left-side sticky-left-side">

            <!--logo and iconic logo start-->
            <div class="logo">
                <h1><a href="<?php echo $baseUrlDashboard.'customer';?>">List Menu</a></h1>
            </div>
            <div class="logo-icon text-center">
                <a href="<?php echo $baseUrlDashboard.'customer';?>"><i class="lnr lnr-home"></i> </a>
            </div>

            <!--logo and iconic logo end-->
            <div class="left-side-inner">

                <!--sidebar nav start-->
                    <ul class="nav nav-pills nav-stacked custom-nav">
                        <li class="active"><a href="<?php echo $baseUrlDashboard.'profile';?>"><i class="lnr lnr-power-switch"></i><span>Company Profile</span></a></li>
                        <li class="menu-list">
                            <a href="#"><i class="lnr lnr-cog"></i>
                                <span>Products</span></a>
                                <ul class="sub-menu-list">
                                    <li><a href="<?php echo $baseUrlDashboard.'products';?>">List Products</a> </li>
                                    <li><a href="<?php echo $baseUrlDashboard.'products/add/step-1';?>">Add Products</a></li>
                                </ul>
                        </li>
                        <li><a href="<?php echo $baseUrlDashboard.'purchase-order';?>"><i class="lnr lnr-spell-check"></i> <span>Purchase Order</span></a></li>
                        <li><a href=<?php echo $baseUrlDashboard.'order-history';?>"><i class="lnr lnr-menu"></i> <span>Order History</span></a></li>
                        <li><a href="<?php echo $baseUrlDashboard.'dispute';?>"><i class="lnr lnr-indent-increase"></i> <span>Dispute</span></a></li>
                    </ul>
                <!--sidebar nav end-->
            </div>
        </div>
        
        <div class="main-content">
            <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
            <div class="header-section">
                         
                <!--toggle button start-->
                <a class="toggle-btn  menu-collapsed"><i class="fa fa-bars"></i></a>
                <!--toggle button end-->

                <!--notification menu start -->
                <div class="menu-right">
                    <div class="user-panel-top"> 
                        <!--
                        <div class="profile_details_left">
                            <h1><?php echo ucfirst($companyName);?></h1>
                        </div>
                        -->
                        <div class="profile_details">		
                            <ul>
                                <li class="dropdown profile_details_drop">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <div class="profile_img">	
                                            <span > </span> 
                                             <div class="user-name">
                                                <p>Admin<span>Administrator</span></p>
                                             </div>
                                             <i class="lnr lnr-chevron-down"></i>
                                             <i class="lnr lnr-chevron-up"></i>
                                            <div class="clearfix"></div>	
                                        </div>	
                                    </a>
                                    <ul class="dropdown-menu drp-mnu">
                                        <li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li> 
                                        <li> <a href="#"><i class="fa fa-user"></i>Profile</a> </li> 
                                        <li> <a href="<?php echo $baseUrlDashboard.'logout';?>"><i class="fa fa-sign-out"></i> Logout</a> </li>
                                    </ul>
                                </li>
                                <div class="clearfix"> </div>
                            </ul>
                        </div>		         	
                    </div>
                </div>
            </div>
            <div id="page-wrapper">
            <?php 
                echo $this->Session->flash('flash');
                echo $this->Session->flash('auth');
                echo $this->fetch('content');
            ?>
            </div>
        </div>
    </section>
</body>
<?php
echo $this->Html->script(array(
    'easy/Chart' ,
    'easy/wow.min' ,
    'easy/dropzone' ,
    'easy/jquery-1.10.2.min' ,
    'validation/parsley.min' ,
    'easy/classie' ,
    'easy/uisearch' ,
    'easy/jquery.flot.min' ,
    'easy/jquery.nicescroll' ,
    'dropzone/dropzone',
    'easy/scripts' ,
    'easy/bootstrap.min.js'
));
?>

<?php
echo $this->fetch('scriptBottom');
?>

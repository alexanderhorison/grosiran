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
    
    <div id="page-wrapper">
    <?php 
        echo $this->Session->flash('flash');
        echo $this->Session->flash('auth');
        echo $this->fetch('content');
    ?>
    </div>
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
    'easy/bootstrap.min.js',
    
));
?>

<?php
echo $this->fetch('scriptBottom');
?>

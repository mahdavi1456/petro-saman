<?php
session_start();
include 'includes.php';
if((isset($_GET['login']) && $_GET['login']=="ok")){
    $_SESSION['user_id'] = $_GET['id'];
    $id = $_GET['id'];
    $user_info = get_select_query("select * from user where u_id=$id");
    $_SESSION['name'] = $user_info[0]['u_name'];
    $_SESSION['family'] = $user_info[0]['u_family'];
    $_SESSION['username'] = $user_info[0]['u_username'];
    $_SESSION['level'] = $user_info[0]['u_level'];
}

if(isset($_GET['logout']) || !isset($_SESSION['user_id'])){
    $_SESSION = [];
    $url = get_url() . "login.php";
    ?>
    <script type="text/javascript">
        window.location.href = "<?php echo $url; ?>";
    </script>
    <?php
} ?>
<!DOCTYPE html>
<html lang="fa">
    <head>
        <meta charset="utf-8">
        <title>پترو سامان</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="<?php get_url(); ?>bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="<?php get_url(); ?>dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="<?php get_url(); ?>dist/css/style.css">
        <link rel="stylesheet" href="<?php get_url(); ?>dist/css/skins/_all-skins.min.css">
        <link rel="stylesheet" href="<?php get_url(); ?>plugins/iCheck/flat/blue.css">
        <link rel="stylesheet" href="<?php get_url(); ?>plugins/iCheck/square/blue.css">
        <link rel="stylesheet" href="<?php get_url(); ?>plugins/morris/morris.css">
        <link rel="stylesheet" href="<?php get_url(); ?>plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <link rel="stylesheet" href="<?php get_url(); ?>plugins/datepicker/datepicker3.css">
        <link rel="stylesheet" href="<?php get_url(); ?>plugins/daterangepicker/daterangepicker-bs3.css">
        <link rel="stylesheet" href="<?php get_url(); ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
	    <link rel="stylesheet" href="<?php get_url(); ?>plugins/select2/select2.min.css">
        <link rel="stylesheet" href="<?php get_url(); ?>dist/fonts/fontiran.css">
        <link rel="stylesheet" href="<?php get_url(); ?>dist/css/bootstrap-rtl.min.css">
        <link rel="stylesheet" href="<?php get_url(); ?>dist/css/rtl.css">
        <link rel="stylesheet" href="<?php get_url(); ?>plugins/datatables/dataTables.bootstrap.css">
	    <link rel="stylesheet" href="<?php get_url(); ?>dist/css/persianDatepicker-default.css">
    	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
	    <script src="<?php get_url(); ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
	    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
        <script src="<?php get_url(); ?>bootstrap/js/bootstrap.min.js"></script>
		<link href="<?php get_url(); ?>include/validation/style.css" type="text/css" rel="stylesheet" />
		<script src="<?php get_url(); ?>include/validation/script.js"></script>
        <script type="text/javascript" src="<?php get_url(); ?>include/lib/NumberFormat.js"></script>
        <style>
            .control-sidebar{
                display:none;
            }
        </style>
    </head>
	<body class="skin-blue sidebar-mini">
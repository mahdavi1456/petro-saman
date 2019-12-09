<?php include 'includes.php'; ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>ورود به سامانه</title>
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<link rel="stylesheet" href="<?php get_url(); ?>bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php get_url(); ?>dist/css/AdminLTE.min.css">
		<link rel="stylesheet" href="<?php get_url(); ?>plugins/iCheck/square/blue.css">
		<link rel="stylesheet" type="text/css" href="<?php get_url(); ?>dist/fonts/fontiran.css">
	</head>
	<body class="login-page">
		<div class="login-box">
			<div class="login-logo"><h1>ورود به سامانه</h1></div>
			<div class="login-box-body">
				<?php $media = new media();
				$logo = $media->get_logo_url();
				?>
				<div class="text-center"><img src="<?php echo $logo; ?>"></div>
				<hr>
				<form action="" method="post">
					<div class="form-group has-feedback">
						<input type="text" name="u_username" class="form-control" placeholder="نام کاربری">
						<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
					</div>
					<div class="form-group has-feedback">
						<input type="password" name="u_password" class="form-control" placeholder="رمز ورود">
						<span class="glyphicon glyphicon-lock form-control-feedback"></span>
					</div>
					<div class="row">
						<div class="col-md-12">
							<button name="login" type="submit" class="btn btn-primary btn-block btn-flat btn-lg">ورود</button>
						</div>
					</div>
				</form>
				<?php
				if(isset($_POST['login'])){
            		$username = $_POST['u_username'];
            		$password = $_POST['u_password'];
            		$st = check_login($username, $password);
            		if($st==1){
						$user_id = get_user_id($username);
						$uid = $user_id[0][0];
						$url = "index.php?login=ok&id=" . $uid;

						$lr_time = jdate('Y/m/d H:i:s');
						$lr_ip = get_ip();
						$sql_r = "insert into login_record(u_id, lr_time, lr_ip) values($uid, '$lr_time', '$lr_ip')";
						ex_query($sql_r);
						?>
						<script type="text/javascript">
							window.location.href = "<?php echo $url; ?>";
						</script>
						<?php
            		} else { ?>
						<br><div class="alert alert-danger">نام کاربری یا رمز وارد شده صحیح نمی باشد</div>
            		<?php
            		}
        		} ?>
			</div>
		</div>
		<script src="<?php get_url(); ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
		<script src="<?php get_url(); ?>bootstrap/js/bootstrap.min.js"></script>
		<script src="<?php get_url(); ?>plugins/iCheck/icheck.min.js"></script>
		<script>
		$(function () {
			$('input').iCheck({
				checkboxClass: 'icheckbox_square-blue',
				radioClass: 'iradio_square-blue',
				increaseArea: '20%'
			});
		});
	</script>
	</body>
</html>

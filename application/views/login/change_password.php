<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>JobOrderISH | Log in</title>
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		<link rel="icon" href="<?php echo base_url();?>public/dist/img/favicon.ico" type="image/x-icon">
		<!-- Bootstrap 3.3.4 -->
		<link href="<?php echo base_url();?>public/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<!-- Font Awesome Icons -->
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<!-- Theme style -->
		<link href="<?php echo base_url();?>public/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
		<!-- iCheck -->
		<link href="<?php echo base_url();?>public/plugins/iCheck/square/red.css" rel="stylesheet" type="text/css" />

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body class="login-page">
	<div class="login-box">
		<div class="login-logo">
			<a href="<?php echo base_url();?>"><b>Job Order</b> <br/>ISH</a>
		</div><!-- /.login-logo -->
		<div class="login-box-body">
			<p class="login-box-msg">Change your password</p>
			<?php echo validation_errors(); ?>
			<?php echo form_open('verifylogin/change_password'); ?>
         <div class="form-group has-feedback">
				<input type="username" name="username" class="form-control" placeholder="User Name" value="<?php echo $username;?>" readonly/>
				<span class="glyphicon glyphicon-user form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="New Password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
            <input type="password" name="npassword" class="form-control" placeholder="Re-type Password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
           * Harap Login dan Change Password Menggunakan Laptop / PC Milik Anda <br> ** Seluruh Aktifitas Akan Tercatat dan Termonitor.
			</div>
			<div class="row">
				<div class="col-xs-8">    
					<div class="checkbox icheck">
						<label>
							<input type="checkbox"> 
						</label>
					</div>                        
				</div><!-- /.col -->
            <div class="col-xs-4">
					<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
			</div>

		</div><!-- /.login-box-body -->
	</div><!-- /.login-box -->

	<!-- jQuery 2.1.4 -->
	<script src="<?php echo base_url();?>public/plugins/jQuery/jQuery-2.1.4.min.js"></script>
	<!-- Bootstrap 3.3.2 JS -->
	<script src="<?php echo base_url();?>public/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<!-- iCheck -->
	<script src="<?php echo base_url();?>public/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
	<script>
		$(function () {
			$('input').iCheck({
				checkboxClass: 'icheckbox_square-blue',
				radioClass: 'iradio_square-blue',
				increaseArea: '20%' // optional
			});
		});
	</script>
</body>
</html>
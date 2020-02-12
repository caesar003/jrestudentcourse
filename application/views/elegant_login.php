<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<!-- Bootstrap stylesheet -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css'?>">
	<!-- Font awesome -->
  	<!--link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/font-awesome/css/font-awesome.min.css'?>"-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/fontawesome-5.12.0/css/fontawesome.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/fontawesome-5.12.0/css/brands.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/fontawesome-5.12.0/css/regular.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/fontawesome-5.12.0/css/solid.css'?>">
	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/login_style.css');?>">
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Sign In</h3>
			</div>
			<div class="card-body">
				<form autocomplete="off" action="<?php echo site_url('login/auth');?>" method="post">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-user"></i></span>
						</div>
						<input name="username" type="text" class="form-control" placeholder="Username" required>
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-key"></i></span>
						</div>
						<input name="password" type="password" class="form-control" placeholder="password" required>
					</div>
					<div class="form-group">
						<button type="submit" value="Login" class="btn float-right login_btn"><i class="fa fa-sign-in-alt"></i> Login</button>
					</div>
				</form>
				<span class="danger"><?php echo $this->session->flashdata('msg');?></span>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Copyright &copy; <a href="https://jollyrogereducation.com">Jolly Roger</a> 2020
				</div>
				<!--div class="d-flex justify-content-center">
					<a href="#">Forgot your password?</a>
				</div-->
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.4.1.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-dateformat.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/popper.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>

</body>
</html>
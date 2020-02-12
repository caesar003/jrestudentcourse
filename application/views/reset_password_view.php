<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Login Page</title>
	<!-- Bootstrap stylesheet -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css'?>">
	<!-- Font awesome -->
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
				<h3>Change Password</h3>
			</div>
			<div class="card-body">
				<form autocomplete="off" action="<?php echo site_url('reset_password/reset_password');?>" method="post">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-user"></i></span>
						</div>
						<input name="username" type="text" class="form-control" placeholder="Username" value="" required>
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-key"></i></span>
						</div>
						<input name="new_password" type="password" class="form-control" placeholder="Password" required>
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-key"></i></span>
						</div>
						<input name="new_password2" type="password" class="form-control" placeholder="Verify password" required>
					</div>
					<div class="form-group">
						<input type="hidden" name="id" value="<?php echo $this->session->userdata('id');?>">
						<a href="student" class="btn float-left goback_btn"><i class="fa fa-arrow-left"></i> Back</a>
						<button type="submit" value="Login" class="btn float-right login_btn"><i class="fa fa-undo"></i> Reset</button>
					</div>
				</form>
				 <span class="danger"><?php echo $this->session->flashdata('msg');?></span>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Copyright &copy; <a href="https://jollyrogereducation.com"> Jolly Roger </a>  2020
				</div>
				<!--div class="d-flex justify-content-center">
					<a href="#">Forgot your password?</a>
				</div-->
			</div>
		</div>
	</div>
</div>
<!--script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script-->
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.4.1.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-dateformat.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/popper.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>

</body>
</html>
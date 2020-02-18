<?php $user=$this->session->userdata('username');?>
<!DOCTYPE html>
<html lang="en-us">
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
      <?php include 'styles.php';?>
    </head> 
    <body>
      <nav class="navbar navbar-expand-md navbar-dark bg-primary"> 
        <a class="navbar-brand" href="student">
          <img height="35" width="35" class="rounded-circle" src="<?php echo base_url().'icon.jpg'?>"> <strong>Jolly Roger</strong>
        </a> 
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span> 
        </button> 
        <div class="collapse navbar-collapse" id="navbarsExample04"> 
          <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown"> 
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $user;?></a> 
              <div class="dropdown-menu" aria-labelledby="dropdown04"> 
                <a class="dropdown-item" href="<?php echo site_url('login/logout');?>"><i class="fas fa-sign-out-alt"></i> Sign Out</a> 
                <a class="dropdown-item" href="<?php echo site_url('reset_password');?>"><i class="fas fa-key"></i> Reset Password</a> 
              </div>
            </li>
            <?php if($this->session->userdata('level')==17):?>
            <li class="nav-item">
              <a href="<?php echo site_url('after_teaching');?>" class="nav-link">After Teaching </a>
            </li>
            <?php endif;?>
          </ul> 
        </div>
      </nav>
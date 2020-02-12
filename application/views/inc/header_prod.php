<?php $user=$this->session->userdata('username');?>
<!DOCTYPE html><html lang="en-us">
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="robots" content="noindex, nofollow">
    <title><?php echo $title;?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/cosmo/bootstrap.min.css"> 
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/fontawesome-5.12.0/css/fontawesome.min.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/fontawesome-5.12.0/css/solid.min.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/fontawesome-5.12.0/css/brands.min.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/fontawesome-5.12.0/css/regular.min.css'?>">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/css/jquery.dataTables.min.css"> 
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/css/dataTables.bootstrap4.min.css"> 
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/style.css'?>"> 
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url().'favicon.ico'?>"> 
    </head> 
    <body>
        <nav class="navbar navbar-expand-md navbar-dark bg-primary"> 
        <a class="navbar-brand" href="student"><img height="35" width="35" class="rounded-circle" src="<?php echo base_url().'icon.jpg'?>"> <strong>Jolly Roger</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation"> 
        <span class="navbar-toggler-icon"></span> 
        </button> 
        <div class="collapse navbar-collapse" id="navbarsExample04"> 
        <ul class="navbar-nav mr-auto"> 
        <li class="nav-item dropdown"> 
        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $user;?></a> 
        <div class="dropdown-menu" aria-labelledby="dropdown04"> 
        <a class="dropdown-item" href="<?php echo site_url('login/logout');?>"><i class="fas fa-sign-out-alt"></i> Sign Out</a> 
        <a class="dropdown-item" href="<?php echo site_url('reset_password');?>"><i class="fa fa-key"></i> Reset Password</a>
        </div>
        </li>
        </ul> 
        </div>
        </nav> 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('assets/css/style.css'); ?>" >
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('assets/css/bootstrap.css'); ?>" >
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('assets/css/fontawesome.css'); ?>" >
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('assets/css/solid.css'); ?>" >

</head>
<body>
<!--preloader-->
<div id="loader-section" style="width: 100%; height: 100%; position: fixed; background: #fff; top: 0;left: 0;z-index: 99999;">
    <div id="loader"></div>
</div>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">Rohit Textiles</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('/'); ?>">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('/index.php/products'); ?>">Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('/index.php/about'); ?>">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('/index.php/contact'); ?>">Contact</a>
      </li>
    </ul>
<!--      --><?php //if(isset($_SESSION['adminusername'])){ ?>
<!--      <ul class="navbar-nav nav-right">-->
<!--          <li class="nav-item">-->
<!--              <a class="nav-link" href="--><?php //echo base_url('/index.php/admin/dashboard'); ?><!--">Dashboard</a>-->
<!--          </li>-->
<!--          <li class="nav-item edit-profile">-->
<!--                  <a class="nav-link" href='javascript:void();'>--><?php //echo $_SESSION['adminusername'];?><!-- <i class="fas fa-caret-down"></i></a>-->
<!--              <ul class="dropdown-data" type="none">-->
<!--                  <li><a class="nav-link" href="--><?php //echo base_url('/index.php/admin/changeusername'); ?><!--">Change Username</a></li>-->
<!--                  <li><a class="nav-link" href="--><?php //echo base_url('/index.php/admin/changepassword'); ?><!--">Change Password</a></li>-->
<!--                  <li><a class="nav-link" href="--><?php //echo base_url('/index.php/admin/logout'); ?><!--">Logout</a></li>-->
<!--              </ul>-->
<!--          </li>-->
<!--      </ul>-->
<!--      --><?php //} ?>
  </div>
</nav>
<style>

</style>
<script>

</script>
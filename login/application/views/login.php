<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-reboot.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/index.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css'); ?>">
</head>
<body>
<div class="container">


<br/>
  
  <br/>
  <div class="col-lg-5 col-lg-offset-2"> 
  <div class="panel panel-default">
  <h1 class="text-center">Login</h1>
  <?php if(isset($_SESSION['success'])){?>
    <div class=" alert alert-success"><?php echo $_SESSION['success']; ?></div>
    <?php
} ?>
      <div class="panel-heading">
          <?php echo validation_errors() ;?>
      </div>
      <div class="panel-body">
          <form method="post" action="<?php echo base_url().'index.php/Auth/login'?>">
          <div class="form-group">
              <label for="">Username</label>
              <input type="text" name="username" class="form-control" id="username" >
          </div>

          <div class="form-group">
              <label for="">Password</label>
              <input type="password" name="password" class="form-control" id="password">
          </div>

          <div class="form-group text-center">
              <input type="submit" name="login" value="login" class="btn btn-primary"/>
          </div>
        </form>
      </div>
  </div>
  </div>


<script src="<?php echo base_url('assets/jquery/jquery-3.3.1.slim.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/jquery/jquery-3.1.1.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/jquery/popper.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/jquery/jquery-3.4.1.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/jquery/jquery-3.2.1.js'); ?>"></script>  
    <script src="<?php echo base_url('assets/jquery/jquery.min.js'); ?>"></script>  
</body>
</html>
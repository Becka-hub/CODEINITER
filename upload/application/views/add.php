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
    <form action="<?php echo base_url().'index.php/product/insert'?>" method="post" enctype="multipart/form-data">
    <p>Name</p>
    <p><input type="text" name="name"></p>
    <p>Price</p>
    <p><input type="text" name="price"></p>
    <p>Quantity</p>
    <p><input type="text" name="qty"></p>
    <p>Image</p>
    <p><input type="file" name="img"></p>
    <p><input type="submit"  value="Save" class="btn btn-info"></p>
    </form>
 <a href="<?php echo base_url().'index.php/product/view'?>" class="btn btn-success">Voir</a>
    </div>
<script src="<?php echo base_url('assets/jquery/jquery-3.3.1.slim.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/jquery/jquery-3.1.1.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/jquery/popper.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/jquery/jquery-3.4.1.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/jquery/jquery-3.2.1.js'); ?>"></script>  
    <script src="<?php echo base_url('assets/jquery/jquery.min.js'); ?>"></script> 
    <script>
        $(document).ready(function(){
        });
    </script> 
</body>
</html>
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
    <h2 class="text-center">Recherche en Ajax</h2>
    <div class="form-group">
        <div class="input-group">
            <span class="btn btn-outline-primary">Search</span>
            <input type="text" name="search_text" id="search_text" placeholder="Search by Customer Details" class="form-control"/>
        </div>
    </div>
    <div id="result">

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
<script>
    $(document).ready(function(){
        load_data();
     function load_data(query){
         $.ajax({
            url:"<?php echo base_url().'index.php/Cherche/fetch'?>",
            method:"POST",
            data:{query:query},
            success:function(data){
            $('#result').html(data);
            }
         });
     }
     $('#search_text').keyup(function(){
      var search=$(this).val();
      if(search !=''){
         load_data(search);
      }else{
         load_data();
      }
     });
    });
</script>
</body>
</html>
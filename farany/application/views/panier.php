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
    <div class="col-md-12">
    <h3 class="delete"></h3>
        <div id="response">

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
    
<script>
    $(document).ready(function(){
        affiche();
        setInterval(affiche,1000);
    function affiche(){
    $.ajax({
        url:"<?php echo base_url().'Shoping_cart/produit'?>",
        method:"GET",
        data:{cartItem:"cart_item"},
        success:function(response){
            $('#response').html(response);
        }
    });
    }

    $(document).on('click','#del',function(e){
        e.preventDefault();
        var del_id=$(this).attr("value");
        $.ajax({
            url:"<?php echo base_url().'Shoping_cart/delete'?>",
            type:'post',
            dataType:'json',
            data:{del_id:del_id},
            success:function(data){
             $('.delete').html(data.response);
             affiche();
            }
        });

    });
    $(document).on('click','#delele_all',function(e){
        e.preventDefault();
        $.ajax({
            url:"<?php echo base_url().'Shoping_cart/delete_all'?>",
            type:'post',
            dataType:'json',
            success:function(data){
             $('.delete').html(data.response);
             affiche();
            }
        });

    });

    });
</script>
</body>
</html>
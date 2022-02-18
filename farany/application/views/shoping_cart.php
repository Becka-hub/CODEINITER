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
        <div class="col-lg-12 col-md-12">
        <a href="<?php echo base_url().'Shoping_cart/voir'?>"><i class="fa fa-shopping-cart"></i><span id="cart-item" class="badge badge-danger"></span></a>
                <h3 align="center">CodeIngiter Shoping Cart width Ajax jquery</h3><br/>
               
                <div class="row">
                <?php
                foreach($product as $row){
                    echo '
                <div class="col-md-3">
				<div class="card shadow" style="width: 10rem;">
					<div class="inner">
						<img src="'.base_url().'upload/'.$row->image.'" alt="" width="200" height="200" class="img-thumbnail">
					</div>
					<div class="card-body text-center">
						<h5 class="card-title ">'.$row->name.'</h5>
                        <p class="text-danger">'.$row->price.'</p>
                        <input type="text" name="quantity" class="form-control quantity" id="'.$row->id.'"/>
                        <button type="button" name="add_cart" class="btn btn-outline-success add_cart" data-productname="'.$row->name.'"
                        data-productprice="'.$row->price.'" data-productid="'.$row->id.'" data-productimage="'.$row->image.'" />Add_cart</button>
					</div>
				</div>
			</div>';}
                ?>
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
        $('.add_cart').click(function(){
          var id=$(this).data("productid");
          var name=$(this).data("productname");
          var price=$(this).data("productprice");
          var image=$(this).data("productimage");
          var quantity=$('#'+id).val();
          if(quantity !='' && quantity>0){
           $.ajax({
            url:"<?php echo base_url().'Shoping_cart/add'?>",
            method:"POST",
            data:{id:id,name:name,price:price,image:image,quantity:quantity},
            success:function(data){
                alert("produit added into Cart");
                $('#cart-details').html(data);
                affiche();
            }
           });
          }else{
              alert("Entrer le quantiter s'il te plait");
          }

        });
        affiche();
        setInterval(affiche,1000);
    function affiche(){
    $.ajax({
        url:"<?php echo base_url().'Shoping_cart/fetch'?>",
        method:"GET",
        data:{cartItem:"cart_item"},
        success:function(response){
            $('#cart-item').html(response);
        }
    });
    }

    });
</script> 
</body>
</html>
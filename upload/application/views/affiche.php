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
    <div class="col-md-9">
        <h2 class="text-center">Produit</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>price</th>
                    <th>Quantity</th>
                    <th>image</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(isset($row)){
                     foreach($row as $r){ ?>
                        <tr>
                            <td><?php echo $r->id; ?></td>
                            <td><?php echo $r->name; ?></td>
                            <td><?php echo $r->price;?></td>
                            <td><?php echo $r->quantity;?></td>
                            <td><embed src="<?php echo base_url();?>upload/<?php echo $r->img; ?>"  width="200" height="200"></td>
                        </tr>
                        <?php }
                    }else{
                        echo " ts ao a";
                    } ?>

            </tbody>
        </table>
    </div>
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
        });
    </script> 
</body>
</html>
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
    <div class="row">
        <div class="col-md-12 mt-5">
            <h1 class="text-center">CodeIgniter Ajax Crud</h1>
            <hr style="background-color:black; color:black; height:1px;">
        </div>
    </div>
<div class="delete">

</div>
<div class="col-md-12 mt-2">
<button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Add Perso</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="response">
      <div class="modal-body">
        <form action="" method="post" id="form">
        
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name">
          </div>
          <div class="form-group">
            <label for="recipient-email" class="col-form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email">
          </div>
          
        </form>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-outline-primary btn-sm" id="add">Ajoute perso</button>
      </div>
      </div>
    </div>
  </div>

  
</div>




<div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="edit_response">
      <div class="modal-body">
        <form action="" method="post" id="edit_form">
        <input type="hidden" id="edit_modal_id" value="">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Name</label>
            <input type="text" class="form-control" id="edit_name" name="name">
          </div>
          <div class="form-group">
            <label for="recipient-email" class="col-form-label">Email</label>
            <input type="email" class="form-control" id="edit_email" name="email">
          </div>
          
        </form>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-outline-primary btn-sm" id="update">Edit perso</button>
      </div>
      </div>
    </div>
  </div>

  
</div>







<div class="row">
<div class="col-md-12 mt-3">
   <div id="table_response">

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
      readData();
     setInterval(readData,1000);
        $(document).on("click","#add",function(e){
         e.preventDefault();
         var name=$('#name').val();
         var email=$('#email').val();
         $.ajax({
            url:"<?php echo base_url().'index.php/Acceuil/insert'?>",
            type:'post',
            dataType:'json',
            data:{name:name,email:email},
            success:function(data){
             $('.response').html(data.message);
             readData();
            }

         });
         $('#form')[0].reset();
        });



        function readData(){
           var read = "read";
           $.ajax({
             url:"<?php echo base_url().'index.php/Acceuil/affiche'?>",
             method:"POST",
             data:{read:read},
             success:function(data){
              $('#table_response').html(data); 
             }
           });
        }



       $(document).on("click","#del",function(e){
         e.preventDefault();
        var del_id=$(this).attr("value");
        if(del_id==""){
            alert("Deleted id require");
        }else{
            $.ajax({
                url:"<?php echo base_url().'index.php/Acceuil/delete'?>",  
                type:'post',
                dataType:'json',
                data:{del_id:del_id},
                success:function(data){
                 $('.delete').html(data.response);
                 readData();
                }
            });
        }
       });



       $(document).on("click","#edit",function(e){
        e.preventDefault();
        var edit_id=$(this).attr("value");
        $.ajax({
          url:"<?php echo base_url().'index.php/Acceuil/edite'?>",
          type:"post",
          dataType:"json",
          data:{edit_id:edit_id},
          success:function(data){
            if(data.response=="success"){
              $("#edit_modal_id").val(data.post.id);
              $("#edit_name").val(data.post.name);
              $("#edit_email").val(data.post.email);
            }else{
              alert("error");
            }
          }
        });
       });

    $(document).on("click","#update",function(e){
      e.preventDefault();
     var edit_id=$("#edit_modal_id").val();
     var edit_name=$("#edit_name").val();
     var edit_email=$("#edit_email").val();
     if(edit_name=="" || edit_email==""){
       alert("remplir tous les champs");
     }else{
       $.ajax({
        url:"<?php echo base_url().'index.php/Acceuil/update'?>",
        type:"post",
        dataType:"json",
        data:{
          edit_id:edit_id,
          edit_name:edit_name,
          edit_email:edit_email
        },
        success:function(data){
          readData();
          $('.edit_response').html(data.message);

        }
       });
     }
    });

    </script>   
</body>
</html>
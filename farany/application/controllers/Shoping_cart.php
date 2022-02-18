<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Shoping_cart extends CI_Controller{
    function index(){
        $this->load->model("shoping_cart_model");
        $data['product']=$this->shoping_cart_model->fetch_all();
        $this->load->view('shoping_cart',$data);
    }
    function add(){
        $this->load->model("shoping_cart_model");
        $data=array(
            "idp"=>$_POST['id'],
            "name"=>$_POST['name'],
            "image"=>$_POST['image'],
            "quantity"=>$_POST['quantity'],
            "price"=>$_POST['price'],
            "Total"=>$_POST['quantity']*$_POST['price'],
            
        );
        $this->shoping_cart_model->ajouter($data);
        echo "Produit ajouter avec succes";
    }
    function fetch(){
        $this->load->model("shoping_cart_model");
        $data=$this->shoping_cart_model->count();
        echo $data;
    }
    function voir(){
        $this->load->view('panier');
    }
    function produit(){
        $this->load->model("shoping_cart_model");
        $rows=$this->shoping_cart_model->fetch_panier();
        if(isset($_GET['cartItem'])){
            $table='<table class="table table-bordered-danger table-striped">
            <tr>
            <td colspan="10">
            <button class="btn btn-outline-warning btn-sm" id="delele_all" ><i class="fa fa-trash">Vider la Cart</i></button>
            <td>
            </tr>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Image</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Total</th>
              <th>Delete</th>
            </tr>
            
            ';
            $grand_total=0;
            foreach($rows as $resultat){
                $table .='
                <tr>
                <td>'.$resultat['id'].'</td>
                <td>'.$resultat['name'].'</td>
                <td><img src="'.base_url().'upload/'.$resultat['image'].'" width="50px" height="50px"/></td>
                <td>'.$resultat['price'].'</td>
                <td>'.$resultat['quantity'].'</td>
                <td>'.$resultat['Total'].'</td>
                <td>
                <button class="btn btn-outline-warning btn-sm" id="del" value="'.$resultat['id'].'"><i class="fa fa-trash"></i></button>
                </td>
                </tr>
                ';
                $grand_total +=$resultat['Total'];
            }
                   $table .='<tr>
                     <td colspan="3"><a href="'.base_url().'Shoping_cart/index'.'" class="btn btn-success"><i class="fa fa-cart-plus">Voir autre produit</i></td>
                      <td colspan="2"><b>Grand Total</b></td>
                      <td><b>'.$grand_total."Ar".'</b></td>
                     </tr>
                   ';
             
            $table .='</table>';
            echo $table;
        }
    }
     function delete(){
        $this->load->model("shoping_cart_model");
         if($this->input->is_ajax_request()){
             $del_id=$this->input->post('del_id');
             if($this->shoping_cart_model->effacer($del_id)){
                 $data=array('response'=>"<P class='alert alert-success'>Deleted avec success</p>");
             }else{
                $data=array('response'=>"<P class='alert alert-success'>Deleted Error</p>");
             }

         }
         echo json_encode($data);
     }
     function delete_all(){
        $this->load->model("shoping_cart_model");
        if($this->input->is_ajax_request()){
            if($this->shoping_cart_model->effacer_tout()){
                $data=array('response'=>"<P class='alert alert-success'>Deleted avec success Panier vide</p>");
            }else{
               $data=array('response'=>"<P class='alert alert-success'>Deleted Error</p>");
            }
        }
        echo json_encode($data);
     }
}
?>
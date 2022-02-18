<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class productMod extends CI_Model{
function ins($x){
$name=$this->input->post('name');
$price=$this->input->post('price');
$qty=$this->input->post('qty');
$w=array(
    'name'=>$name,
    'price'=>$price,
    'quantity'=>$qty,
    'img'=>$x
);
$this->db->insert('produit',$w);
}

function show(){
    $q=$this->db->get('produit');
    $rs=$q->result();
    return $rs;
}

}
?>
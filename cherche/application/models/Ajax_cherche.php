<?php
class Ajax_cherche extends CI_Model{
    function fetch_data($query){
     $this->db->select("*");
     $this->db->from("produit");
     if($query != ''){
         $this->db->like('name',$query);
         $this->db->or_like('price',$query);  
     }
     $this->db->order_by('id','DESC');
     return $this->db->get();
    }
}

?>
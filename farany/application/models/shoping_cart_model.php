<?php
class shoping_cart_model extends CI_Model{
    function fetch_all(){
        $query=$this->db->get("produit");
        return $query->result();
    }
    function ajouter($data){
       $query=$this->db->insert('stokage',$data);
       return $query;
    }
    function count(){
        $sql="SELECT count(id) as id from stokage";
        $result=$this->db->query($sql);
        return $result->row()->id;
    }
    function fetch_panier(){
        $resultat=$this->db->order_by('id','DESC')->get('stokage')->result_array();
        return $resultat;
    }
    function effacer($id){
        return $this->db->delete('stokage',array('id'=>$id));
    }
    function effacer_tout(){
        return $this->db->empty_table('stokage');
    }
}
?>
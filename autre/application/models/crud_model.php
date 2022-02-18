<?php 
class crud_model extends CI_Model {


    public function insert_entry($data)
    {   
        //insert into crud
        return $this->db->insert('crud', $data);
    }
    public function get_entries()
    {
        $resulat=$this->db->order_by('id','DESC')->get('crud')->result_array();
        //select from crud order by id DESC
        return $resulat;
        
            
    }

    public function delete_entry($id){
     // delete form crud where id 
     return $this->db->delete('crud',array('id' =>$id));
    }


    public function single_entry($id){
        $this->db->select("*");
        $this->db->from("crud");
        $this->db->where("id",$id);
       $query=$this->db->get();
        if(count($query->result())>0){
            return $query->row();
        }
    }


    public function update_entry($data)
    {

           return $this->db->update('crud', $data, array('id' => $data['id']));
    }

}

?>
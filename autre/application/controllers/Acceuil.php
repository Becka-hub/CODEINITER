<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acceuil extends CI_Controller {
    public function __construct()
    {
     parent::__construct();
     $this->load->helper(array('form','url'));
     $this->load->library('form_validation');    
     $this->load->model('crud_model');
    }

	
	public function index()
	{
		$this->load->view('page');
    }


    public function insert(){

        if($this->input->is_ajax_request()){
            $this->form_validation->set_rules('name','Name','required');
            $this->form_validation->set_rules('email','Email','required');
            if ($this->form_validation->run() == FALSE)
            {
                    $data=array('response'=>'error','message'=>validation_errors());
            }
            else
            {
                $ajax_data=$this->input->post();
                if($this->crud_model->insert_entry($ajax_data)){
                    $data=array('response'=>'success','message'=>"<p class='alert alert-success'>Inserted successfull</p>");
                }else{
                    $data=array('response'=>'error','message'=>"<p class='alert alert-danger'>Inserted error</p>");
                }
            }
        }else{
            echo "non";
        }
        echo json_encode($data);
        
    }


    function affiche(){

        $rows=$this->crud_model->get_entries();
        if(isset($_POST['read'])){
            $table='<table class="table table-border-danger table-striped">
            <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Edit</th>
            <th>Delete</th>
            </tr>
            ';
            foreach($rows as $resultat){
                $table .='
                 <tr>
                 <td>'.$resultat['id'].'</td>
                 <td>'.$resultat['name'].'</td>
                 <td>'.$resultat['email'].'</td>
                 <td> <button class="btn  btn-outline-success btn-sm" id="edit" value="'.$resultat['id'].'" data-toggle="modal" data-target="#edit_modal"><i class="fa fa-edit"></i></button> </td>
                 <td> <button class="btn btn-outline-danger btn-sm" id="del" value="'.$resultat['id'].'"><i class="fa fa-trash"></i></button> </td>
                 </tr>
                ';
              
            }
            $table .='</table>';
            echo $table;
         }

    }



  
    function delete(){
        if($this->input->is_ajax_request()){
            $del_id=$this->input->post('del_id');
            if($this->crud_model->delete_entry($del_id)){
            $data=array('response'=>"<p class='alert alert-success'>Deleted avec succes</p>");
            }else{
                $data=array('response'=>"<p class='alert alert-warning'>Deleted error</p>");
            }
        }
        echo json_encode($data);
    }


public function edite(){
    if($this->input->is_ajax_request()){
        $edit_id=$this->input->post('edit_id');
        if($post=$this->crud_model->single_entry($edit_id)){
        $data=array('response'=>"success",'post'=>$post);
        }else{
            $data=array('response'=>"error",'message'=>'failed'); 
        }
    }
    echo json_encode($data);
}



public function update(){
    if($this->input->is_ajax_request()){
        $this->form_validation->set_rules('edit_name','Name','required');
        $this->form_validation->set_rules('edit_email','Email','required');
        if ($this->form_validation->run() == FALSE)
        {
                $data=array('response'=>'error','message'=>validation_errors());
        }
        else
        {
            $data['id']=$this->input->post('edit_id');
            $data['name']=$this->input->post('edit_name');
            $data['email']=$this->input->post('edit_email');
            if($this->crud_model->update_entry($data)){
                $data=array('response'=>'success','message'=>"<p class='alert alert-success'>Update successfull</p>");
            }else{
                $data=array('response'=>'error','message'=>"<p class='alert alert-danger'>Update error</p>");
            }
        }
    }else{
        echo "non";
    }
    echo json_encode($data);
}


}

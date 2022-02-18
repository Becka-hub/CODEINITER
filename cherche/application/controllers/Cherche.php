<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cherche extends CI_Controller{
    function index(){
        $this->load->view('tady');
    }
    function fetch(){
        $output='';
        $query='';
        $this->load->model('Ajax_cherche');
        if($this->input->post('query')){
            $query=$this->input->post('query');
        }
        $data=$this->Ajax_cherche->fetch_data($query);
        $output .='
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
            <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Price</th>
            <th>Image</th>
            </tr>
        ';
        if($data->num_rows()>0){
          foreach($data->result() as $row)
          {
              $output .='
              <tr>
              <td>'.$row->id.'</td>
              <td>'.$row->name.'</td>
              <td>'.$row->price.'</td>
              <td><img src="'.base_url().'upload/'.$row->image.'" width="50px" height="50px"/></td>
              </tr>
              ';
          }
        }else{
            $output .='<tr>
                    <td colspan="5">No Data Found</td>
                    </tr>
                  ';
        }
        $output .='</table>';
        $output .='</div>';
        echo $output;
    }
}
?>
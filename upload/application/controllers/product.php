<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class product extends CI_Controller{
    public function __construct()
    {
        parent:: __construct();
        $this->load->model('productMod');
    }
 function addproduit(){
$this->load->view('add');
 }
 public function view(){
    $res=$this->productMod->show();
    $w=array('row'=>$res);
    $this->load->view('affiche',$w);
    }
 function insert(){
$config['upload_path']='./upload';
$config['allowed_types']='png|jpg|jpeg|pdf|gif';
$config['max_size']=5000;
$this->load->library('upload',$config);
if(!$this->upload->do_upload('img')){
    echo"tena ts mety le izy";
}else{
    $fd=$this->upload->data();
    $fn=$fd['file_name'];
    $this->productMod->ins($fn);

}
 }




}
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class user extends CI_Controller{
    public function __construct(){
        parent::__construct();

    }
    function profile(){
        if($_SESSION['user_logged']==FALSE){
            $this->session->set_flashdata('error', 'please connected login');
            
            redirect("auth/login");
        }
        $this->load->view('profil');
    }
}
?>
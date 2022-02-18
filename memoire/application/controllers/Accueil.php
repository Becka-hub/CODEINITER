<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Accueil extends CI_Controller{
    function index(){
        $this->load->view('accueil');
    }
}
?>

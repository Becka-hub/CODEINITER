<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller{
    public function __construct(){
        parent::__construct();
    
    }


     function logout(){
         unset($_SESSION);
         session_destroy();
         redirect('auth/login','refresh');
     }

    function login(){
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','required');
        if($this->form_validation->run()==TRUE){
         $username=$_POST['username'];
         $password=md5($_POST['password']);
         
         $this->db->select('*');
         $this->db->from('user');
         $this->db->where(array('username'=>$username,'password'=>$password));
         $query=$this->db->get();
         $user=$query->row();
         if(isset($user->email)){
             //message tamporaire
             $this->session->set_flashdata('success', 'Vous êtes connecter');

             //les variable de session
             $_SESSION['user_logged']=TRUE;
             $_SESSION['username']=$user->username;
             $_SESSION['user_id']=$user->user_id;
             redirect('user/profile','refresh');

         }else{
             $this->session->set_flashdata('error', 'Ts miexiste le continaw');
             redirect('auth/login','refresh');
         }

        }
        $this->load->view('login');
    }
    function register(){
        if(isset($_POST['enregistrer'])){
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('password','Password','required');
        $this->form_validation->set_rules('password2','Confirme Password','required|matches[password]');
        $this->form_validation->set_rules('phone','Phone','required');
        // si la validation est vraie
        if($this->form_validation->run()==TRUE){
            $data=array(
            'username'=>$_POST['username'],
            'email'=>$_POST['email'],
            'password'=>md5($_POST['password']),
            'gender'=>$_POST['gender'],
            'created_date'=>date('Y-m-d'),
            'phone'=>$_POST['phone']
            );
        $this->db->insert('user',$data); 
        $this->session->set_flashdata('success'," Your conte is created");
        redirect('auth/login','refresh');
         
        }else{
        }}
        $this->load->view('registre');
     
        
    }
    
}
?>
<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PassageAdmin_controlleur extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/Passage_model');
		$this->load->model('admin/docteur/LoginDocteur_model');
		$this->load->model('admin/pharmacie/LoginPharmacie_model');
		$this->load->model('admin/clinique/LoginClinique_model');
	}
	// LIEN VERS LA VIEW PASSAGE
	function passageAdmin()
	{
		$this->load->view('admin/passageAdmin');
	}
	// FIN 

	// VALIDATION CLE ADMIN
	function validation()
	{


		if (isset($_POST['cle'])) {
			$cle = $_POST['cle'];
			$admin = $this->Passage_model->validationPassage($cle);
			if ($admin->CLEADMIN == $cle && $admin->TYPEADMIN == "admine") {

				$_SESSION['ADMIN_LOGGED'] = TRUE;
				$_SESSION['CODEADMIN'] = $admin->CLEADMIN;
				redirect('admin/PassageAdmin_controlleur/administration');

			} elseif ($admin->CLEADMIN == $cle && $admin->TYPEADMIN == "docteur") {

				$_SESSION['DOCTEUR_PASSAGE'] = TRUE;
				$_SESSION['CODEDOCTEUR'] = $admin->CLEADMIN;
				redirect('admin/PassageAdmin_controlleur/docteur');
				
			} elseif ($admin->CLEADMIN == $cle && $admin->TYPEADMIN == "pharmacie") {

				$_SESSION['PHARMACIE_PASSAGE'] = TRUE;
				$_SESSION['CODEPHARMACIE'] = $admin->CLEADMIN;
				redirect('admin/PassageAdmin_controlleur/pharmacie');

			} elseif ($admin->CLEADMIN == $cle && $admin->TYPEADMIN == "clinique") {

				$_SESSION['CLINIQUE_PASSAGE'] = TRUE;
				$_SESSION['CODECLINIQUE'] = $admin->CLEADMIN;
				redirect('admin/PassageAdmin_controlleur/clinique');

			} else {

				$this->session->set_flashdata('error', "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Votre clé est incorrect!</strong></div>");
				redirect('admin/PassageAdmin_controlleur/passageAdmin');

			}
		}
	}
	// FIN 


	// PASSAGE VERS DASBOARD ADMIN
	function administration()
	{
		if ($_SESSION['ADMIN_LOGGED'] = FALSE) {
			$this->session->set_flashdata('error', "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Entrer votre clé s'il te plait !</strong></div>");
			redirect('admin/PassageAdmin_controlleur/passageAdmin');
		} else {
			$this->load->view('admin/administration/dasboard');
		}
	}
	// FIN

	// PASSAGE VERS LOGIN DOCTEUR
	function docteur()
	{
		if ($_SESSION['DOCTEUR_PASSAGE'] = FALSE) {
			$this->session->set_flashdata('error', "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Entrer votre clé s'il te plait !</strong></div>");
			redirect('admin/PassageAdmin_controlleur/passageAdmin');
		} else {
			$rows = $this->LoginDocteur_model->selectProvince();
			$this->load->view('admin/docteur/login', array('province' => $rows));
		}
	}
	// FIN

	// PASSAGE VERS LOGIN PHARMACIE
	function pharmacie()
	{
		if ($_SESSION['PHARMACIE_PASSAGE'] = FALSE) {
			$this->session->set_flashdata('error', "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Entrer votre clé s'il te plait !</strong></div>");
			redirect('admin/PassageAdmin_controlleur/passageAdmin');
		} else {
			$rows = $this->LoginPharmacie_model->selectProvince();
			$this->load->view('admin/pharmacie/login', array('province' => $rows));
		}
	}
	// FIN

	// PASSAGE VERS LOGIN CLINIQUE
	function clinique()
	{
		if ($_SESSION['CLINIQUE_PASSAGE'] = FALSE) {
			$this->session->set_flashdata('error', "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Entrer votre clé s'il te plait !</strong></div>");
			redirect('admin/PassageAdmin_controlleur/passageAdmin');
		} else {
			$rows = $this->LoginClinique_model->selectProvince();
			$this->load->view('admin/clinique/login', array('province' => $rows));
		}
	}
	// FIN


	function accueil(){
		$this->load->view('accueil');
	}

}

<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login_controlleur extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/docteur/LoginDocteur_model');
	}


	// SELECT REGION AVEC ID PROVINCE
	function selectRegion()
	{
		if (isset($_POST['idProvince'])) {
			$id = $_POST['idProvince'];
			$rows = $this->LoginDocteur_model->selectRegion($id);
			$output = '
	 <option selected>Selects régions</option>
	 ';
			foreach ($rows->result() as $resultat) {
				$output .= '<option value="' . $resultat->IDREGION . '">' . $resultat->NOMREGION . '</option>';
			}
			echo $output;
		}
	}
	// FIN


	// SELECT DISTRICT AVEC ID REGION
	function selectDistrict()
	{
		if (isset($_POST['idRegion'])) {
			$id = $_POST['idRegion'];
			$rows = $this->LoginDocteur_model->selectDistrict($id);
			$output = '
	 <option selected>Selects districts</option>
	 ';
			foreach ($rows->result() as $resultat) {
				$output .= '<option value="' . $resultat->IDDISTRICT . '">' . $resultat->NOMDISTRICT . '</option>';
			}
			echo $output;
		}
	}
	// FIN


	// SELECT COMMUNE AVEC ID DISTRICT
	function selectCommune()
	{
		if (isset($_POST['idDistrict'])) {
			$id = $_POST['idDistrict'];
			$rows = $this->LoginDocteur_model->selectCommune($id);
			$output = '
		 <option selected>Selects communes</option>
		 ';
			foreach ($rows->result() as $resultat) {
				$output .= '<option value="' . $resultat->IDCOMMUNE . '">' . $resultat->NOMCOMMUNE . '</option>';
			}
			echo $output;
		}
	}
	// FIN

	// INSCRIPTION DOCTEUR
	function inscription()
	{
		if (isset($_POST['inscription'])) {

			if ($_POST['confirmPasswordDocteur'] != $_POST['passwordDocteur']) {
				$this->session->set_flashdata('error', "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Confirme mot de passer doit être égale a mot de passe</strong></div>");
				redirect('admin/PassageAdmin_controlleur/docteur');
			} else {
				if ($this->LoginDocteur_model->validationCode($_POST['codeDocteur'])) {
					$this->session->set_flashdata('error', "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Une clé contient une seul compte!!!</strong></div>");
					redirect('admin/PassageAdmin_controlleur/docteur');
				} else {
					$config['upload_path'] = './upload/docteur';
					$config['allowed_types'] = 'png|jpg|jpeg|gif';
					$config['max_size'] = 5000;
					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('photoDocteur')) {
						$this->session->set_flashdata('error', "<p class='alert alert-danger'>Selecter un photo,votre photo doit être inférieur a 5MB!</p>");
						redirect('admin/PassageAdmin_controlleur/docteur');
					} else {
						$fd = $this->upload->data();
						$fn = $fd['file_name'];
						$donner = array(
							"NOMDOCTEUR" => $_POST['nomDocteur'],
							"PRENOMDOCTEUR" => $_POST['prenomDocteur'],
							"ADRESSEDOCTEUR" => $_POST['adresseDocteur'],
							"TELEPHONEDOCTEUR" => $_POST['telephoneDocteur'],
							"MAILDOCTEUR" => $_POST['mailDocteur'],
							"CINDOCTEUR" => $_POST['cinDocteur'],
							"SPECIALISEDOCTEUR" => $_POST['specialiseDocteur'],
							"PHOTODOCTEUR" => $fn,
							"CLINIQUEDOCTEUR" => $_POST['cliniqueDocteur'],
							"ADRESSECLINIQUEDOCTEUR" => $_POST['adresseclinique'],
							"PROVINCEDOCTEUR" => $_POST['provinceDocteur'],
							"REGIONDOCTEUR" => $_POST['regionDocteur'],
							"DISTRICTDOCTEUR" => $_POST['districtDocteur'],
							"COMMUNEDOCTEUR" => $_POST['communeDocteur'],
							"MDPDOCTEUR" => md5($_POST['passwordDocteur']),
							"STATUSDOCTEUR" => "inactif",
							"CODEDOCTEUR" => $_POST['codeDocteur'],
						);

						if ($this->LoginDocteur_model->inscrire($donner)) {
							$this->session->set_flashdata('success', "<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Inscriptions avec success</strong></div>");
							redirect('admin/PassageAdmin_controlleur/docteur');
						} else {
							$this->session->set_flashdata('error', "<p class='alert alert-danger'>Inscriptions error!</p>");
							redirect('admin/PassageAdmin_controlleur/docteur');
						}
					}
				}
			}
		}
	}
	// FIN


	// VALIDATION DOCTEUR
	function validation()
	{
		$this->form_validation->set_rules('mailDocteur', 'Mail', 'required');
		$this->form_validation->set_rules('passwordDocteur', 'Mot de passe', 'required');
		if ($this->form_validation->run() == TRUE) {
			$mail = $_POST['mailDocteur'];
			$mdp = md5($_POST['passwordDocteur']);
			$docteur = $this->LoginDocteur_model->login($mail, $mdp);

			if (isset($docteur->IDDOCTEUR)) {
				$_SESSION['DOCTEUR_LOGGED'] = TRUE;
				$_SESSION['IDDOCTEUR'] = $docteur->IDDOCTEUR;
				$_SESSION['NOMDOCTEUR'] = $docteur->NOMDOCTEUR;
				$_SESSION['PRENOMDOCTEUR'] = $docteur->PRENOMDOCTEUR;
				$_SESSION['ADRESSEDOCTEUR'] = $docteur->ADRESSEDOCTEUR;
				$_SESSION['MAILDOCTEUR'] = $docteur->MAILDOCTEUR;
				$_SESSION['TELEPHONEDOCTEUR'] = $docteur->TELEPHONEDOCTEUR;
				$_SESSION['SPECIALISEDOCTEUR'] = $docteur->SPECIALISEDOCTEUR;
				$_SESSION['CINDOCTEUR'] = $docteur->CINDOCTEUR;
				$_SESSION['CLINIQUEDOCTEUR'] = $docteur->CLINIQUEDOCTEUR ;
				$_SESSION['ADRESSECLINIQUEDOCTEUR'] = $docteur->ADRESSECLINIQUEDOCTEUR;
				$_SESSION['PHOTODOCTEUR'] = $docteur->PHOTODOCTEUR;


				$provinceDocteur = $this->LoginDocteur_model->provinceDocteur($docteur->PROVINCEDOCTEUR);
				$_SESSION['PROVINCEDOCTEUR'] = $provinceDocteur->NOMPROVINCE;

				$regionDocteur = $this->LoginDocteur_model->regionDocteur($docteur->REGIONDOCTEUR);
				$_SESSION['REGIONDOCTEUR'] = $regionDocteur->NOMREGION;

				$districtDocteur = $this->LoginDocteur_model->districtDocteur($docteur->DISTRICTDOCTEUR);
				$_SESSION['DISTRICTDOCTEUR'] = $districtDocteur->NOMDISTRICT;

				$communeDocteur = $this->LoginDocteur_model->communeDocteur($docteur->COMMUNEDOCTEUR);
				$_SESSION['COMMUNEDOCTEUR'] = $communeDocteur->NOMCOMMUNE;



				$donner = array(
					"IDDOCTEUR" => $docteur->IDDOCTEUR,
					"STATUSDOCTEUR" => "actif",

				);
				$this->LoginDocteur_model->modifierDocteur($donner);


				redirect('admin/docteur/Login_controlleur/dasboard');
			} else {
				$this->session->set_flashdata('error', "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Mail ou mot de passe incorrect!</strong></div>");
				redirect('admin/PassageAdmin_controlleur/docteur');
			}
		} else {
			$this->session->set_flashdata('error', "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Remplir tous les champs!</strong></div>");
			redirect('admin/PassageAdmin_controlleur/docteur');
		}
	}
	// FIN


	// LOUGOUT PASSAGE
	function logoutPassage()
	{
		unset($_SESSION);
		session_destroy();
		redirect('admin/docteur/Login_controlleur/acceuil');
	}
	// FIN 

	function acceuil()
	{
		$this->load->view('admin/passageAdmin');
	}


	// DASBOARD DOCTEUR
	function dasboard()
	{
		if ($_SESSION['DOCTEUR_LOGGED'] == FALSE) {
			$this->session->set_flashdata('error', "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Connecter s'il te plait !</strong></div>");
			redirect('admin/PassageAdmin_controlleur/docteur');
		}
		$this->load->view('admin/docteur/dasboard');
	}
	// FIN





}

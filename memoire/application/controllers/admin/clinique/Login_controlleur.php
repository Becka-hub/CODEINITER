<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login_controlleur extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/clinique/LoginClinique_model');
	}


	// SELECT REGION AVEC ID PROVINCE
	function selectRegion()
	{
		if (isset($_POST['idProvince'])) {
			$id = $_POST['idProvince'];
			$rows = $this->LoginClinique_model->selectRegion($id);
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
			$rows = $this->LoginClinique_model->selectDistrict($id);
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
			$rows = $this->LoginClinique_model->selectCommune($id);
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

			if ($_POST['passwordClinique'] != $_POST['confirmPasswordClinique']) {
				$this->session->set_flashdata('error', "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Confirme mot de passer doit être égale a mot de passe</strong></div>");
				redirect('admin/PassageAdmin_controlleur/clinique');
			} else {
				if ($this->LoginClinique_model->validationCode($_POST['codeClinique'])) {
					$this->session->set_flashdata('error', "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Une clé contient une seul compte!!!</strong></div>");
					redirect('admin/PassageAdmin_controlleur/clinique');
				} else {
					$config['upload_path'] = './upload/clinique';
					$config['allowed_types'] = 'png|jpg|jpeg|gif';
					$config['max_size'] = 5000;
					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('logoClinique')) {
						$this->session->set_flashdata('error', "<p class='alert alert-danger'>Selecter un photo,votre photo doit être inférieur a 5MB!</p>");
						redirect('admin/PassageAdmin_controlleur/clinique');
					} else {
						$fd = $this->upload->data();
						$fn = $fd['file_name'];
						$donner = array(
							"NOMPROPRIETAIRECLINIQUE" => $_POST['nomProprietaireClinique'],
							"PRENOMPROPRIETAIRECLINIQUE" => $_POST['prenomProprietaireClinique'],
							"ADRESSEPROPRIETAIRECLINIQUE" => $_POST['adresseProprietaireClinique'],
							"TELEPHONEPROPRIETAIRECLINIQUE" => $_POST['telephoneProprietaireClinique'],
							"MAILPROPRIETAIRECLINIQUE" => $_POST['mailProprietaireClinique'],
							"CINPROPRIETAIRECLINIQUE" => $_POST['cinProprietaireClinique'],
							"CINPROPRIETAIRECLINIQUE" => $_POST['cinProprietaireClinique'],
							"NOMCLINIQUE" => $_POST['nomClinique'],
							"ADRESSECLINIQUE" => $_POST['adresseClinique'],
							"TELEPHONECLINIQUE" => $_POST['telephoneClinique'],
							"MAILCLINIQUE " => $_POST['mailClinique'],
							"SPECIALISECLINIQUE" => $_POST['specialiseClinique'],
							"HEUREOUVERTURECLINIQUE" => $_POST['heureOuvertureClinique'],
							"JOUROUVERTURECLINIQUE"=>$_POST['jourOuvertureClinique'],
							"PROVINCECLINIQUE"=>$_POST['provinceClinique'],
							"REGIONCLINIQUE"=>$_POST['regionClinique'],
							"DISTRICTCLINIQUE"=>$_POST['districtClinique'],
							"COMMUNECLINIQUE"=>$_POST['communeClinique'],
							"LOGOCLINIQUE"=>$fn,
							"MDPCLINIQUE" => md5($_POST['passwordClinique']),
							"STATUSCLINIQUE" => "inactif",
							"CODECLINIQUE" => $_POST['codeClinique'],
						);

						if ($this->LoginClinique_model->inscrire($donner)) {
							$this->session->set_flashdata('success', "<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Inscriptions avec success</strong></div>");
							redirect('admin/PassageAdmin_controlleur/clinique');
						} else {
							$this->session->set_flashdata('error', "<p class='alert alert-danger'>Inscriptions error!</p>");
							redirect('admin/PassageAdmin_controlleur/clinique');
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
		$this->form_validation->set_rules('mailClinique', 'Mail', 'required');
		$this->form_validation->set_rules('passwordClinique', 'Mot de passe', 'required');
		if ($this->form_validation->run() == TRUE) {
			$mail = $_POST['mailClinique'];
			$mdp = md5($_POST['passwordClinique']);
			$clinique = $this->LoginClinique_model->login($mail, $mdp);

			if (isset($clinique->IDCLINIQUE)) {
				$_SESSION['CLINIQUE_LOGGED'] = TRUE;
				$_SESSION['IDCLINIQUE'] = $clinique->IDCLINIQUE;
				$_SESSION['NOMPROPRIETAIRECLINIQUE'] = $clinique->NOMPROPRIETAIRECLINIQUE;
				$_SESSION['PRENOMPROPRIETAIRECLINIQUE'] = $clinique->PRENOMPROPRIETAIRECLINIQUE;
				$_SESSION['NOMCLINIQUE']=$clinique->NOMCLINIQUE;
				$_SESSION['ADRESSECLINIQUE'] = $clinique->ADRESSECLINIQUE;
				$_SESSION['MAILCLINIQUE'] = $clinique->MAILCLINIQUE;
				$_SESSION['TELEPHONECLINIQUE'] = $clinique->TELEPHONECLINIQUE;
				$_SESSION['SPECIALISECLINIQUE'] = $clinique->SPECIALISECLINIQUE;
				$_SESSION['HEUREOUVERTURECLINIQUE'] = $clinique->HEUREOUVERTURECLINIQUE;
				$_SESSION['JOUROUVERTURECLINIQUE'] = $clinique->JOUROUVERTURECLINIQUE;
				$_SESSION['LOGOCLINIQUE'] = $clinique->LOGOCLINIQUE;


				$provinceClinique = $this->LoginClinique_model->provinceClinique($clinique->PROVINCECLINIQUE);
				$_SESSION['PROVINCECLINIQUE'] = $provinceClinique->NOMPROVINCE;

				$regionClinique = $this->LoginClinique_model->regionClinique($clinique->REGIONCLINIQUE);
				$_SESSION['REGIONCLINIQUE'] = $regionClinique->NOMREGION;

				$districtClinique = $this->LoginClinique_model->districtClinique($clinique->DISTRICTCLINIQUE);
				$_SESSION['DISTRICTCLINIQUE'] = $districtClinique->NOMDISTRICT;

				$communeClinique = $this->LoginClinique_model->communeClinique($clinique->COMMUNECLINIQUE);
				$_SESSION['COMMUNECLINIQUE'] = $communeClinique->NOMCOMMUNE;



				$donner = array(
					"IDCLINIQUE" => $clinique->IDCLINIQUE,
					"STATUSCLINIQUE" => "actif",

				);
				$this->LoginClinique_model->modifierClinique($donner);


				redirect('admin/clinique/Login_controlleur/dasboard');
			} else {
				$this->session->set_flashdata('error', "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Mail ou mot de passe incorrect!</strong></div>");
				redirect('admin/PassageAdmin_controlleur/clinique');
			}
		} else {
			$this->session->set_flashdata('error', "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Remplir tous les champs!</strong></div>");
			redirect('admin/PassageAdmin_controlleur/clinique');
		}
	}
	// FIN


	// LOUGOUT PASSAGE
	function logoutPassage()
	{
		unset($_SESSION);
		session_destroy();
		redirect('admin/clinique/Login_controlleur/acceuil');
	}
	// FIN 

	function acceuil()
	{
		$this->load->view('admin/passageAdmin');
	}


	// DASBOARD DOCTEUR
	function dasboard()
	{
		if ($_SESSION['CLINIQUE_LOGGED'] == FALSE) {
			$this->session->set_flashdata('error', "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Connecter s'il te plait !</strong></div>");
			redirect('admin/PassageAdmin_controlleur/clinique');
		}
		$this->load->view('admin/clinique/dasboard');
	}
	// FIN





}

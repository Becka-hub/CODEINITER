<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login_controlleur extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/pharmacie/LoginPharmacie_model');
	}


	// SELECT REGION AVEC ID PROVINCE
	function selectRegion()
	{
		if (isset($_POST['idProvince'])) {
			$id = $_POST['idProvince'];
			$rows = $this->LoginPharmacie_model->selectRegion($id);
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
			$rows = $this->LoginPharmacie_model->selectDistrict($id);
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
			$rows = $this->LoginPharmacie_model->selectCommune($id);
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

	// INSCRIPTION PHARMACIE
	function inscription()
	{
		if (isset($_POST['inscription'])) {

			if ($_POST['confirmPasswordPharmacie'] != $_POST['passwordPharmacie']) {
				$this->session->set_flashdata('error', "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Error!!! Confirme mot de passer doit être égale a mot de passe</strong></div>");
				redirect('admin/PassageAdmin_controlleur/pharmacie');
			} else {
				if ($this->LoginPharmacie_model->validationCode($_POST['codePharmacie'])) {
					$this->session->set_flashdata('error', "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Ooops!!! Une clé contient une seul compte!!!</strong></div>");
					redirect('admin/PassageAdmin_controlleur/pharmacie');
				} else {
					$config['upload_path'] = './upload/pharmacie';
					$config['allowed_types'] = 'png|jpg|jpeg|gif';
					$config['max_size'] = 5000;
					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('logoPharmacie')) {
						$this->session->set_flashdata('error', "<p class='alert alert-danger'>Error!!! Selecter un photo,votre photo doit être inférieur a 5MB!</p>");
						redirect('admin/PassageAdmin_controlleur/pharmacie');
					} else {
						$fd = $this->upload->data();
						$fn = $fd['file_name'];
						$donner = array(
							"NOMPROPRIETAIREPHARMACIE" => $_POST['nomProprietairePharmacie'],
							"PRENOMPROPRIETAIREPHARMACIE" => $_POST['prenomProprietairePharmacie'],
							"ADRESSEPROPRIETAIREPHARMACIE" => $_POST['adresseProprietairePharmacie'],
							"TELEPHONEPROPRIETAIREPHARMACIE" => $_POST['telephoneProprietairePharmacie'],
							"MAILPROPRIETAIREPHARMACIE" => $_POST['mailProprietairePharmacie'],
							"CINPROPRIETAIREPHARMACIE" => $_POST['cinProprietairePharmacie'],
							"NOMPHARMACIE" => $_POST['nomPharmacie'],
							"ADRESSEPHARMACIE" => $_POST['adressePharmacie'],
							"TELEPHONEPHARMACIE" => $_POST['telephonePharmacie'],
							"MAILPHARMACIE" => $_POST['mailPharmacie'],
							"LOGOPHAMACIE" => $fn,
							"TYPEPHARMACIE" => $_POST['typePharmacie'],
							"JOUROUVERTUREPHARMACIE" => $_POST['jourOuverturePharmacie'],
							"HEUREOUVERTUREPHARMACIE" => $_POST['heureOuverturePharmacie'],
							"PROVINCEPHARMACIE" => $_POST['provincePharmacie'],
							"REGIONPHARMACIE" => $_POST['regionPharmacie'],
							"DISTRICTPHARMACIE" => $_POST['districtPharmacie'],
							"COMMUNEPHARMACIE" => $_POST['communePharmacie'],
							"MDPPHARMACIE" => md5($_POST['passwordPharmacie']),
							"STATUSPHARMACIE" => "inactif",
							"CODEPHARMACIE" => $_POST['codePharmacie'],
							
						);

						if ($this->LoginPharmacie_model->inscrire($donner)) {
							$this->session->set_flashdata('success', "<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Inscriptions avec success</strong></div>");
							redirect('admin/PassageAdmin_controlleur/pharmacie');
						} else {
							$this->session->set_flashdata('error', "<p class='alert alert-danger'>Inscriptions error!</p>");
							redirect('admin/PassageAdmin_controlleur/pharmacie');
						}
					}
				}
			}
		}
	}
	// FIN


	// VALIDATION PHARMACIE
	function validation()
	{
		$this->form_validation->set_rules('mailPharmacie', 'Mail', 'required');
		$this->form_validation->set_rules('passwordPharmacie', 'Mot de passe', 'required');
		if ($this->form_validation->run() == TRUE) {
			$mail = $_POST['mailPharmacie'];
			$mdp = md5($_POST['passwordPharmacie']);
			$pharmacie = $this->LoginPharmacie_model->login($mail, $mdp);

			if (isset($pharmacie->IDPHARMACIE)) {
				$_SESSION['PHARMACIE_LOGGED'] = TRUE;
				$_SESSION['IDPHARMACIE'] = $pharmacie->IDPHARMACIE;
				$_SESSION['NOMPHARMACIE'] = $pharmacie->NOMPHARMACIE;
				$_SESSION['ADRESSEPHARMACIE'] = $pharmacie->ADRESSEPHARMACIE;
				$_SESSION['TELEPHONEPHARMACIE'] = $pharmacie->TELEPHONEPHARMACIE;
				$_SESSION['MAILPHARMACIE'] = $pharmacie->MAILPHARMACIE;
				$_SESSION['TYPEPHARMACIE'] = $pharmacie->TYPEPHARMACIE;
				$_SESSION['JOUROUVERTUREPHARMACIE'] = $pharmacie->JOUROUVERTUREPHARMACIE;
				$_SESSION['HEUREOUVERTUREPHARMACIE'] = $pharmacie->HEUREOUVERTUREPHARMACIE;
				$_SESSION['LOGOPHAMACIE'] = $pharmacie->LOGOPHAMACIE;
				$_SESSION['NOMPROPRIETAIREPHARMACIE'] = $pharmacie->NOMPROPRIETAIREPHARMACIE;
				$_SESSION['PRENOMPROPRIETAIREPHARMACIE'] = $pharmacie->PRENOMPROPRIETAIREPHARMACIE;


				$provincePharmacie = $this->LoginPharmacie_model->provincePharmacie($pharmacie->PROVINCEPHARMACIE);
				$_SESSION['PROVINCEPHARMACIE'] = $provincePharmacie->NOMPROVINCE;

				$regionPharmacie = $this->LoginPharmacie_model->regionPharmacie($pharmacie->REGIONPHARMACIE);
				$_SESSION['REGIONPHARMACIE'] = $regionPharmacie->NOMREGION;

				$districtPharmacie = $this->LoginPharmacie_model->districtPharmacie($pharmacie->DISTRICTPHARMACIE);
				$_SESSION['DISTRICTPHARMACIE'] = $districtPharmacie->NOMDISTRICT;

				$communePharmacie = $this->LoginPharmacie_model->communePharmacie($pharmacie->COMMUNEPHARMACIE);
				$_SESSION['COMMUNEPHARMACIE'] = $communePharmacie->NOMCOMMUNE;



				$donner = array(
					"IDPHARMACIE" => $pharmacie->IDPHARMACIE,
					"STATUSPHARMACIE" => "actif",

				);
				$this->LoginPharmacie_model->modifierPharmacie($donner);


				redirect('admin/pharmacie/Login_controlleur/dasboard');
			} else {
				$this->session->set_flashdata('error', "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Error !!! Mail ou mot de passe incorrect!</strong></div>");
				redirect('admin/PassageAdmin_controlleur/pharmacie');
			}
		} else {
			$this->session->set_flashdata('error', "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Remplir tous les champs!</strong></div>");
			redirect('admin/PassageAdmin_controlleur/pharmacie');
		}
	}
	// FIN


	// LOUGOUT PASSAGE
	function logoutPassage()
	{
		unset($_SESSION);
		session_destroy();
		redirect('admin/pharmacie/Login_controlleur/acceuil');
	}
	// FIN 

	function acceuil()
	{
		$this->load->view('admin/passageAdmin');
	}


	// DASBOARD PHARMACIE
	function dasboard()
	{
		if ($_SESSION['PHARMACIE_LOGGED'] == FALSE) {
			$this->session->set_flashdata('error', "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Connecter s'il te plait !</strong></div>");
			redirect('admin/PassageAdmin_controlleur/pharmacie');
		}
		$this->load->view('admin/pharmacie/dasboard');
	}
	// FIN





}

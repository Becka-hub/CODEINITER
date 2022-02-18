<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login_controlleur extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('patient/LoginPatient_model');
	}
	// SELECT PROVINCE VERS LA VIEW LOGIN
	function loginPatient()
	{
		$rows = $this->LoginPatient_model->selectProvince();
		$this->load->view('patient/login', array('province' => $rows));
	}
	// FIN 

	// SELECT REGION AVEC ID PROVINCE
	function selectRegion()
	{
		if (isset($_POST['idProvince'])) {
			$id = $_POST['idProvince'];
			$rows = $this->LoginPatient_model->selectRegion($id);
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
			$rows = $this->LoginPatient_model->selectDistrict($id);
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
			$rows = $this->LoginPatient_model->selectCommune($id);
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

	// INSCRIPTION PATIENT
	function inscription()
	{
		if (isset($_POST['inscription'])) {

			if ($_POST['confirm'] != $_POST['mdp']) {
				$this->session->set_flashdata('error', "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Confirme mot de passer doit être égale a mot de passe</strong></div>");
				redirect('patient/Login_controlleur/loginPatient');
			} else {
				$config['upload_path'] = './upload/patient';
				$config['allowed_types'] = 'png|jpg|jpeg|gif';
				$config['max_size'] = 5000;
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('photo')) {
					$this->session->set_flashdata('error', "<p class='alert alert-danger'>Selecter un photo!</p>");
				} else {
					$fd = $this->upload->data();
					$fn = $fd['file_name'];
					$donner = array(
						"NOMPATIENT" => $_POST['nom'],
						"PRENOMPATIENT" => $_POST['prenom'],
						"ADRESSEPATIENT" => $_POST['adresse'],
						"MAILPATIENT" => $_POST['mail'],
						"TELEPHONEPATIENT" => $_POST['telephone'],
						"SEXEPATIENT" => $_POST['sexe'],
						"CINPATIENT" => $_POST['cin'],
						"DATENAISSANCEPATIENT" => $_POST['datenaissance'],
						"PROFESSIONPATIENT" => $_POST['profession'],
						"PROVINCEPATIENT" => $_POST['province'],
						"REGIONPATIENT" => $_POST['region'],
						"DISTRICTPATIENT" => $_POST['district'],
						"COMMUNEPATIENT" => $_POST['commune'],
						"PHOTOPATIENT" => $fn,
						"MDPPATIENT" => md5($_POST['mdp']),
						"STATUSPATIENT" => "inactif",
					);

					if ($this->LoginPatient_model->inscrire($donner)) {
						$this->session->set_flashdata('success', "<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Inscriptions avec success</strong></div>");
						redirect('patient/Login_controlleur/loginPatient');
					} else {
						$this->session->set_flashdata('error', "<p class='alert alert-danger'>Inscriptions error!</p>");
					}
				}
			}
		}
	}
	// FIN


	// VALIDATION PATIENT
	function validation()
	{
		$this->form_validation->set_rules('mail', 'Mail', 'required');
		$this->form_validation->set_rules('mdp', 'Mot de passe', 'required');
		if ($this->form_validation->run() == TRUE) {
			$mail = $_POST['mail'];
			$mdp = md5($_POST['mdp']);
			$patient = $this->LoginPatient_model->login($mail, $mdp);

			if (isset($patient->IDPATIENT)) {
				$_SESSION['PATIENT_LOGGED'] = TRUE;
				$_SESSION['IDPATIENT'] = $patient->IDPATIENT;
				$_SESSION['NOMPATIENT'] = $patient->NOMPATIENT;
				$_SESSION['PRENOMPATIENT'] = $patient->PRENOMPATIENT;
				$_SESSION['ADRESSEPATIENT'] = $patient->ADRESSEPATIENT;
				$_SESSION['MAILPATIENT'] = $patient->MAILPATIENT;
				$_SESSION['TELEPHONEPATIENT'] = $patient->TELEPHONEPATIENT;
				$_SESSION['SEXEPATIENT'] = $patient->SEXEPATIENT;
				$_SESSION['CINPATIENT'] = $patient->CINPATIENT;
				$_SESSION['DATENAISSANCEPATIENT'] = $patient->DATENAISSANCEPATIENT;
				$_SESSION['PROFESSIONPATIENT'] = $patient->PROFESSIONPATIENT;
				$_SESSION['PHOTOPATIENT'] = $patient->PHOTOPATIENT;


				$provincePatient = $this->LoginPatient_model->provincePatient($patient->PROVINCEPATIENT);
				$_SESSION['PROVINCEPATIENT'] = $provincePatient->NOMPROVINCE;

				$regionPatient = $this->LoginPatient_model->regionPatient($patient->REGIONPATIENT);
				$_SESSION['REGIONPATIENT'] = $regionPatient->NOMREGION;

				$districtPatient = $this->LoginPatient_model->districtPatient($patient->DISTRICTPATIENT);
				$_SESSION['DISTRICTPATIENT'] = $districtPatient->NOMDISTRICT;

				$communePatient = $this->LoginPatient_model->communePatient($patient->COMMUNEPATIENT);
				$_SESSION['COMMUNEPATIENT'] = $communePatient->NOMCOMMUNE;



				$donner = array(
					"IDPATIENT" => $patient->IDPATIENT,
					"STATUSPATIENT" => "actif",

				);
				$this->LoginPatient_model->modifierPatient($donner);


				redirect('patient/Login_controlleur/dasboard');
			} else {
				$this->session->set_flashdata('error', "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Mail ou mot de passe incorrect!</strong></div>");
				redirect('patient/Login_controlleur/loginPatient');
			}
		} else {
			$this->session->set_flashdata('error', "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Remplir tous les champs!</strong></div>");
			redirect('patient/Login_controlleur/loginPatient');
		}
	}
	// FIN

	// LIEN VERS ACCUEIL
	function accueil()
	{
		$this->load->view('accueil');
	}
	// FIN 

	// DASBOARD PATIENT
	function dasboard()
	{
		if ($_SESSION['PATIENT_LOGGED'] == FALSE) {
			$this->session->set_flashdata('error', "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Connecter s'il te plait !</strong></div>");
			redirect('patient/Login_controlleur/loginPatient');
		}

		$rows = $this->LoginPatient_model->selectProvince();
		$this->load->view('patient/dasboard', array('province' => $rows));
	}
	// FIN



}

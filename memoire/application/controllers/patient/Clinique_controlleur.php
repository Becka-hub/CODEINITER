<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Clinique_controlleur extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('patient/Clinique_model');
	}
	// DASBOARD PATIENT
	function dasboard()
	{
		if ($_SESSION['PATIENT_LOGGED'] == FALSE) {
			$this->session->set_flashdata('error', "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Connecter s'il te plait !</strong></div>");
			redirect('patient/Clinique_controlleur/loginPatient');
		}

		$rows = $this->Clinique_model->selectProvince();
		$this->load->view('patient/dasboard', array('province' => $rows));
	}
	// FIN

	// VERS LOGIN
	function loginPatient()
	{
		$rows = $this->Clinique_model->selectProvince();
		$this->load->view('patient/login', array('province' => $rows));
	}
	// FIN

	// AFFICHE AGENDA
	function afficheAgenda()
	{
		if (isset($_POST['afficheAgenda'])) {
			$idClinique = $_POST['idClinique'];
			$rows = $this->Clinique_model->afficheAgenda($idClinique);
			foreach ($rows->result() as $row) {
				$agenda = '
			  <div class="bloc_planings">
			  <h6><i class="fa fa-calendar-plus-o"></i> Date : ' . $row->DATEAGENDA . '</h6>
			  <hr style="border:1px solid rgb(0, 230, 0);">
			  <div class="row">
			  ';
				$heureAgenda = $this->Clinique_model->afficheHeureAgenda($row->IDAGENDA);
				foreach ($heureAgenda->result() as $heure) {
					if ($heure->STATUSHEUREAGENDA == "activer") {
						$agenda .= '
				<div class="col-6 col-sm-6 col-md-4 col-lg-4">
					<div class="card_heure">
						<h6 class="text-center">' . $heure->HEUREAGENDA . '</h6>
						<div class="action_heure d-flex justify-content-center mt-3">
							<button class="btn btn-sm" id="btn_on" value="' . $heure->IDHEUREAGENDA . '">Prendre <i class="fa fa-check-circle"></i></button>
						</div>
					</div>
				</div>
				';
					} else {
						$agenda .= '
				<div class="col-6 col-sm-6 col-md-4 col-lg-4">
				<div class="card_heure">
					<h6 class="text-center">' . $heure->HEUREAGENDA . '</h6>
					<div class="action_heure d-flex justify-content-center mt-3">
						<button class="btn btn-sm" id="btn_of">Désactiver <i class="fa fa-close"></i></button>
					</div>
				</div>
			    </div>
				';
					}
				}

				$agenda .= '
			  </div>
		  </div>
			  ';

				echo $agenda;
			}
		}
	}
	// FIN

	// AJOUTE HEURE
	function ajouteHeure()
	{
		if (isset($_POST['ajouteHeure'])) {
			$heure = $this->Clinique_model->selectHeure($_POST['idHeureAgenda']);
			$date = $this->Clinique_model->selectDate($heure->IDAGENDA);
			if ($this->Clinique_model->selectPanierAgenda($heure->HEUREAGENDA, $date->DATEAGENDA, $_POST['idPatient'])) {
				$message = "<div class='alert alert-danger alert-dismissible'>Vous avez déjà pris cette heure</div>";
			} else {
				$donner = array(
					'IDPATIENT' => $_POST['idPatient'],
					'DATEAGENDA' => $date->DATEAGENDA,
					'HEUREAGENDA' => $heure->HEUREAGENDA,
					'IDCLINIQUE' => $_POST['idClinique'],
				);
				if ($this->Clinique_model->ajoutePanierAgenda($donner)) {
					$message = "<div class='alert alert-success alert-dismissible'>Vous avez prie " . $date->DATEAGENDA . " " . $heure->HEUREAGENDA . "</div>";
				} else {
					$message = "Error";
				}
			}
			echo $message;
		}
	}
	// FIN

	// AFFICHE PANIER
	function affichePanier()
	{
		if (isset($_POST['affichePanier'])) {
			$idClinique = $_POST['idClinique'];
			$idPatient = $_POST['idPatient'];
			$rows = $this->Clinique_model->afficherPanier($idClinique, $idPatient);
			$agenda = '';
			foreach ($rows->result() as $row) {
				$agenda = '' . $row->DATEAGENDA . ' ' . $row->HEUREAGENDA;
				$card = '
			  <div class="card_prise mt-4">
			  <div class="d-flex justify-content-end">
				  <button class="btn btn_suprimer btn-sm" value="' . $row->IDPANIERAGENDA . '">X</button>
			  </div>
			  <h6 class="text-center">Date : ' . $row->DATEAGENDA . '</h6>
			  <h6 class="text-center">Heure : ' . $row->HEUREAGENDA . '</h6>
			  <div class="d-flex justify-content-center">
			      <input type="hidden" id="agendaPrise" value="' . $agenda . '">
				  <button class="btn btn_valider btn-sm"  value="' . $row->IDPANIERAGENDA . '">Valider</button>
			  </div>
		     </div>
			  ';
				echo $card;
			}
		}
	}
	// FIN

	// SUPRIMER PANIER
	function suprimerPanier()
	{
		if (isset($_POST['suprimerPanier'])) {
			$idClinique = $_POST['idClinique'];
			$idPatient = $_POST['idPatient'];
			$idPanier = $_POST['idPanier'];
			$this->Clinique_model->suprimerPanier($idPanier, $idPatient, $idClinique);
		}
	}
	// FIN

	// VALIDER PANIER
	function validerPanier()
	{
		if (isset($_POST['ValiderPanier'])) {
			$idPanier = $_POST['idPanier'];
			$panier = $this->Clinique_model->selectPanier($idPanier);
			$donner = array(
				'IDPATIENT' => $panier->IDPATIENT,
				'IDCLINIQUE' => $panier->IDCLINIQUE,
				'DATEPRISE' => $panier->DATEAGENDA,
				'HEUREPRISE' => $panier->HEUREAGENDA,
				'STATUSRESERVATION' => "0"
			);
			$this->Clinique_model->ajouteReservation($donner);
			$this->Clinique_model->suprimerPanier($idPanier, $panier->IDPATIENT, $panier->IDCLINIQUE);
		}
	}
	// FIN

	// AFFICHER RESERVATION
	function afficheReservation()
	{
		if (isset($_POST['afficheReservation'])) {
			$idClinique = $_POST['idClinique'];
			$idPatient = $_POST['idPatient'];
			$rows = $this->Clinique_model->afficheReservation($idClinique, $idPatient);
			foreach ($rows->result() as $row) {
				if ($row->HEUREPRISE != "" && $row->VALIDATIONRESERVATION == "") {
					$card = '
				   <div class="card_reservation">
				   <div class="d-flex justify-content-center">
					   <i class="fa fa-refresh"></i>
				   </div>
				   <h5 class="text-center">Merci pour votre réservation, attendez quelque minute pour sa validations !</h5>
				   <h5 class="text-center">' . $row->DATEPRISE . '</h5>
				   <h5 class="text-center">' . $row->HEUREPRISE . '</h5>
			       </div>
				   ';
				} elseif ($row->HEUREPRISE != "" && $row->VALIDATIONRESERVATION == "accepter") {
					$card = '
				   <div class="card_reservationValider">
				   <div classs="d-flex justify-content-end">
				   <button class="btn btn-info" id="suprimerReservation" value="' . $row->IDRESERVATION . '">X</button>
				  </div>
				   <div class="d-flex justify-content-center">
					   <i class="fa fa-thumbs-up"></i>
				   </div>
				   <h5 class="text-center">' . $row->REPONSEACCEPTER . '</h5>
				   <div class="d-flex justify-content-center">
				   <a href="' . base_url() . 'patient/Clinique_controlleur/download/' . $row->IDRESERVATION . '">
					   <button class="btn btn-sm">Télécharger le ticket</button>
					</a>
				   </div>
			       </div>
				   ';
				} elseif ($row->HEUREPRISE != "" && $row->VALIDATIONRESERVATION == "refuser") {
					$card = '
				<div class="card_reservationRefuser">
				<div classs="d-flex justify-content-end">
				<button class="btn btn-info" id="suprimerReservation" value="' . $row->IDRESERVATION . '">X</button>
			   </div>
				<div class="d-flex justify-content-center">
					<i class="fa fa-frown-o"></i>
				</div>
				<h5 class="text-center">' . $row->REPONSEREFUSER . '</h5>
			    </div>
				';
				} else {
					$card = '';
				}
				echo $card;
			}
		}
	}
	// FIN

	// SUPRIMER RESERVATION   
	function supprimerReservation(){
		if(isset($_POST['supprimerReservation'])){
           $idClinique=$_POST['idClinique'];
		   $idPatient=$_POST['idPatient'];
		   $idReservation=$_POST['idReservation'];
		   $this->Clinique_model->suprimerReservation($idClinique,$idPatient,$idReservation);
		}
	}
	// FIN

	function download($idReservation){
		if (!empty($idReservation)) {
			$this->load->helper('download');
			$ticket = $this->Clinique_model->afficheTicketReservation($idReservation);
			if ($ticket->num_rows() > 0) {
				foreach ($ticket->result() as $row) {
					$file = 'upload/patient/ticket/' . $row->TICKET;
					force_download($file, NULL);
				}
			}
		}
	}


}

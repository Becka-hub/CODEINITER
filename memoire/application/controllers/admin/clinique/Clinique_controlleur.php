<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Clinique_controlleur extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/clinique/Clinique_model');
		$this->load->library('pdf');
	}



	// AJOUTE AGENDA
	function ajouteAgenda()
	{
		if (isset($_POST['IDCLINIQUE'])) {
			$heure = $_POST['heure'];
			$donner = array(
				'IDCLINIQUE' => $_POST['IDCLINIQUE'],
				'DATEAGENDA' => $_POST['date'],
			);
			$this->Clinique_model->insertAgenda($donner);
			$agenda = $this->Clinique_model->getIDAgenda($_POST['IDCLINIQUE'], $_POST['date']);

			for ($i = 0; $i < sizeof($heure); $i++) {
				$data = array('IDAGENDA' => $agenda->IDAGENDA, 'HEUREAGENDA' => $heure[$i], 'STATUSHEUREAGENDA' => "activer");
				$this->Clinique_model->insertHeure($data);
			}
			echo "insertion planings avec success!";
		}
	}
	// FIN*

	// AFFICHE AGENDA
	function afficheAgenda()
	{
		if (isset($_POST['afficheAgenda'])) {
			$idClinique = $_POST['idClinique'];
			$agenda = $this->Clinique_model->selectAgenda($idClinique);
			foreach ($agenda->result() as $resultat) {
				$bloc = '
			  <div class="bloc_agenda">
			  <div class="agenda">
			  <div class="d-flex justify-content-between">
				  <h6><span>Date : </span>' . $resultat->DATEAGENDA . '</h6>
				  <div class="btn_agenda">
					  <button class="btn  btn-sm mb-2 modifier_agenda" data-toggle="modal" data-target="#modal_modifierAgenda" value="' . $resultat->IDAGENDA . '"><i class="fa fa-edit"></i></button>
					  <button class="btn  btn-sm mb-2 suprimer_agenda" value="' . $resultat->IDAGENDA . '"><i class="fa fa-trash-o"></i></button>
				  </div>
			  </div>
			  <hr>
		     </div>
			 <div class="heure_agenda">
			 <div class="row">
			 ';
				$heureAgenda = $this->Clinique_model->selectHeureAgenda($resultat->IDAGENDA);
				foreach ($heureAgenda->result() as $heure) {
					if ($heure->STATUSHEUREAGENDA == "activer") {
						$bloc .= '
					<div class="col-6 col-sm-4 col-md-3 col-lg-3">
						<div class="card_heure mt-2">
							<h6 class="text-center">' . $heure->HEUREAGENDA . '</h6>
							<div class="action_heure d-flex justify-content-between mt-3">
								<button class="btn btn-sm" id="btn_on" value="' . $heure->IDHEUREAGENDA . '">status <span>ON</span></button>
								<button class="btn btn-danger btn-sm" id="suprimerHeure" value="' . $heure->IDHEUREAGENDA . '"><i class="fa fa-trash-o"></i></button>
							</div>
						</div>
					</div>
				   ';
					} else {
						$bloc .= '
					<div class="col-6 col-sm-4 col-md-3 col-lg-3">
						<div class="card_heure mt-2">
							<h6 class="text-center">' . $heure->HEUREAGENDA . '</h6>
							<div class="action_heure d-flex justify-content-between mt-3">
								<button class="btn btn-sm" id="btn_off" value="' . $heure->IDHEUREAGENDA . '">status <span>OFF</span></button>
								<button class="btn btn-danger btn-sm" id="suprimerHeure" value="' . $heure->IDHEUREAGENDA . '"><i class="fa fa-trash-o"></i></button>
							</div>
						</div>
					</div>
				   ';
					}
				}
				$bloc .= ' 
			  </div>
		      </div>
			  </div>
			 ';

				echo $bloc;
			}
		}
	}
	// FIN

	// MODIFIER DATE
	function modifierDate()
	{
		if (isset($_POST['modifier_date'])) {
			$donner = array(
				'IDAGENDA' => $_POST['idAgenda'],
				'IDCLINIQUE' => $_POST['IDCLINIQUE'],
				'DATEAGENDA' => $_POST['modifier_date'],
			);

			if ($this->Clinique_model->modifierDate($donner)) {
				echo "Modification date avec success !";
			} else {
				echo "Modification date error !";
			}
		}
	}
	// FIN

	// SUPRIMER AGENDA
	function suprimerAgenda()
	{
		if (isset($_POST['suprimerAgenda'])) {
			$idAgenda = $_POST['idAgenda'];
			$idClinique = $_POST['idClinique'];
			if ($this->Clinique_model->suprimerAgenda($idAgenda, $idClinique)) {
				$this->Clinique_model->suprimerHeure($idAgenda);
				echo "Supréssion agenda avec success !";
			} else {
				echo "Supréssion agenda error !";
			}
		}
	}
	// FIN

	// DESACTIVER STATUS HEURE ON
	function modidiferStatusOn()
	{
		if (isset($_POST['modifierStatus'])) {
			$idHeure = $_POST['idHeure'];
			$donner = array(
				'IDHEUREAGENDA' => $idHeure,
				'STATUSHEUREAGENDA' => "desactiver",
			);
			if ($this->Clinique_model->modifierHeure($donner)) {
				echo "Heure désactiver";
			} else {
				echo "Désactivation heure error";
			}
		}
	}
	// FIN

	// ACTIVER STATUS HEURE OFF
	function modidiferStatusoff()
	{
		if (isset($_POST['modifierStatus'])) {
			$idHeure = $_POST['idHeure'];
			$donner = array(
				'IDHEUREAGENDA' => $idHeure,
				'STATUSHEUREAGENDA' => "activer",
			);
			if ($this->Clinique_model->modifierHeure($donner)) {
				echo "Heure activer";
			} else {
				echo "Activation heure error";
			}
		}
	}
	// FIN

	// SUPRIMER HEURE
	function suprimerHeure()
	{
		if (isset($_POST['suprimerHeure'])) {
			$idHeure = $_POST['idHeure'];
			if ($this->Clinique_model->deleteHeure($idHeure)) {
				echo "Heure suprimer avec success !";
			} else {
				echo "Heure supression error !";
			}
		}
	}
	// FIN

	// AFFICHE PATIENT
	function affichePatient()
	{
		if (isset($_POST['patient'])) {
			$query = '';
			$output = '';
			$query = $this->input->post('query');
			$data = $this->Clinique_model->patient($query);
			$output .= '	
			<div class="table-responsive">
			<table class="table table-bordered table-striped">
			<thead class="bg-thead">
			  <tr>
			  <th>Photo</th>
			  <th>Nom</th>
			  <th>Prénom</th>
			  <th>Avertissement</th>
			  <th>Actions</th>
			  <th>Actions</th>
			  <th>Actions</th>
			  </tr>
			</thead>
			<tbody>
				';
			if ($data->num_rows() > 0) {
				foreach ($data->result() as $row) {
					$countAversissement = $this->Clinique_model->countAvertissement($row->IDPATIENT);
					$output .= '
				<tr>
				<td><img src="' . base_url() . 'upload/patient/' . $row->PHOTOPATIENT . '" width="50px" height="40px" alt=""></td>
				<td>' . $row->NOMPATIENT . '</td>
				<td>' . $row->PRENOMPATIENT . '</td>
				<td><button type="button" class="btn btn-sm btn-avertissement"> <span class="badge badge-light">' . $countAversissement . '</span>
				  </button></td>
				<td><button class="btn btn-success btn-sm" value="' . $row->IDPATIENT . '" id="detailsPatient" data-toggle="modal"  data-target="#detailsPatients">Details</button></td>
				<td><button class="btn btn-success btn-sm" value="' . $row->IDPATIENT . '" id="notificationPatient" data-toggle="modal" data-target="#notifierPatients">Notifier</button></td>
				<td><button class="btn btn-danger btn-sm" value="' . $row->IDPATIENT . '" id="idPatientSuprimer">Suprimer</button></td>
				</tr>
					  ';
				}
			} else {
				$output .= '<tr>
							<td colspan="5">No Data Found</td>
							</tr>
						  ';
			}
			$output .= '
			</tbody>
			</table>
			</div>
			';

			echo $output;
		}
	}
	// FIN

	// AFFICHE DETAILS PATIENT
	function detailsPatient()
	{
		if (isset($_POST['idPatient'])) {
			$patient = $this->Clinique_model->detailsPatient($_POST['idPatient']);
			$provincePatient = $this->Clinique_model->selectProvince($patient->PROVINCEPATIENT);
			$regionPatient = $this->Clinique_model->selectRegion($patient->REGIONPATIENT);
			$districtPatient = $this->Clinique_model->selectDistrict($patient->DISTRICTPATIENT);
			$communePatient = $this->Clinique_model->selectCommune($patient->COMMUNEPATIENT);
			$message = '
					<div class="row">
					<div class="col-12 col-sm-6 col-md-6 col-lg-6">
					  <div class="image-patients">
						<img src="' . base_url() . 'upload/patient/' . $patient->PHOTOPATIENT . '" alt="">
					  </div>
					</div>
					<div class="col-12 col-sm-6 col-md-6 col-lg-6 descriptionsPatients">
					  <h6><span>Nom:</span>' . $patient->NOMPATIENT . '</h6>
					  <h6><span>Prénom:</span>' . $patient->PRENOMPATIENT . '</h6>
					  <h6><span>Sexe:</span>' . $patient->SEXEPATIENT . '</h6>
					  <h6><span>Date de naissance:</span>' . $patient->DATENAISSANCEPATIENT . '</h6>
					  <h6><span>Adresse:</span>' . $patient->ADRESSEPATIENT . '</h6>
					  <h6><span>Mail:</span>' . $patient->MAILPATIENT . '</h6>
					  <h6><span>Téléphone:</span>' . $patient->TELEPHONEPATIENT . '</h6>
					  <h6><span>CIN:</span>' . $patient->CINPATIENT . '</h6>
					  <h6><span>Professions:</span>' . $patient->PROFESSIONPATIENT . '</h6>
					</div>
				  </div>
				  <h6><span>Province:</span> ' . $provincePatient->NOMPROVINCE . ' - <span>Région:</span> ' . $regionPatient->NOMREGION . ' -
					<span>District:</span> ' . $districtPatient->NOMDISTRICT . ' - <span>Communes:</span> ' . $communePatient->NOMCOMMUNE . '
				  </h6>
		
					';

			echo $message;
		}
	}
	// FIN


	
		// SUPRIMER PATIENT
		function suprimerPatient(){
			if(isset($_POST['suprimerPatient'])){
				$idPatient=$_POST['idPatient'];
				$this->Clinique_model->dataPatientReservation($idPatient);
				$this->Clinique_model->dataPatientPanierAgenda($idPatient);
				$this->Clinique_model->dataPatientConsultation($idPatient);
				$this->Clinique_model->dataPatientPanier($idPatient);
				$this->Clinique_model->dataPatientObtenir($idPatient);
				$this->Clinique_model->dataPatientAchat($idPatient);
				$this->Clinique_model->dataPatientRendezVous($idPatient);
				$this->Clinique_model->dataPatientVente($idPatient);
				if($this->Clinique_model->suprimerPatient($idPatient)){
					echo "supression patient avec success";
				}else{
					echo "supression patient avec erreur";
				}
			}
		}
		//FIN SUPRIMER PATIENT

	// AJOUTE NOTIFICATION
	function ajouteNotification()
	{
		if (isset($_POST['ajouteNotif'])) {
			$datestring = '%Y/%m/%d - %h:%i %a';
			$time = time();
			$donner = array(
				"TYPENOTIFPATIENT" => $_POST['typeNotification'],
				"NOTIFPATIENT" => $_POST['messageNotification'],
				"ENVOYEURNOTIFPATIENT" => 'clinique',
				"DATENOTIFPATIENT" => mdate($datestring, $time),
				"NOMENVOYEURNOTIFPATIENT" => $_POST['nomCliniqueNotif'],
				"PHOTOENVOTEURNOTIFPATIENT" => $_POST['photoCliniqueNotif'],
				"STATUSNOTIFPATIENT" => "0"
			);
			$this->Clinique_model->ajouteNotif($donner);
			$notif = $this->Clinique_model->idNotif($_POST['messageNotification'], $_POST['typeNotification'], 'clinique', mdate($datestring, $time),$_POST['nomCliniqueNotif']);
			$donner2 = array(
				"IDPATIENT" => $_POST['idPatientNotif'],
				"IDNOTIFPATIENT" => $notif->IDNOTIFPATIENT,
			);
			$this->Clinique_model->ajouteNotif2($donner2);

			echo "Envoi notification avec success !";
		}
	}
	// FIN



	// LOUGOUT
	function logout()
	{
		$donner = array(
			"IDCLINIQUE" => $_SESSION['IDCLINIQUE'],
			"STATUSCLINIQUE" => "inactif",
		);
		$this->Clinique_model->modifierClinique($donner);
		unset($_SESSION);
		session_destroy();
		redirect('admin/clinique/Clinique_controlleur/passage');
	}
	// FIN 

	// LIEN VERS LA PÄGE PASSAGE ADMIN
	function passage()
	{
		$this->load->view('admin/passageAdmin');
	}
	// FIN

	// AFFICHE RESERVATION
	function afficheReservation(){
		if(isset($_POST['afficheReservation'])){
           $idClinique=$_POST['idClinique'];
		   $rows=$this->Clinique_model->selectReservation($idClinique);
		   $output='						
		   <div class="table_responsive">
		   <table class="table table-bordered table-striped">
			   <thead class="thead_bg">
				   <th>Patients</th>
				   <th>Numéro</th>
				   <th>Date prise</th>
				   <th>Heure prise</th>
				   <th>Ticket</th>
				   <th>Actions</th>
			   </thead>
			   <tbody>';
		   foreach ($rows->result() as $row) {
			   $patient=$this->Clinique_model->selectPatient($row->IDPATIENT);
			  if($row->VALIDATIONRESERVATION==''){
              $output .='
			  <tr>
				  <td align="center">'.$patient->NOMPATIENT.' '.$patient->PRENOMPATIENT.'</td>
				  <td align="center">'.$patient->TELEPHONEPATIENT.'</td>
				  <td align="center">'.$row->DATEPRISE.'</td>
				  <td align="center">'.$row->HEUREPRISE.'</td>
				  <td align="center">
				  <form action="' . base_url() . 'admin/clinique/Clinique_controlleur/ticket' . '" id="ticketForm" method="post">
				  <input type="hidden" value="'.$row->IDRESERVATION.'" name="idReservation">
				  <input type="hidden" value="ticket" name="ticket">
				  <button type="submit" class="btn btn_ticket btn-sm"><i class="fa fa-download"></i></button>
				  </form>
				  </td>
				  <td align="center"><button class="btn btn_validation btn-sm" value="'.$row->IDRESERVATION.'" data-toggle="modal" data-target="#modal_validation">Validations</button>
				  </td>
			  </tr>
			  ';
			}
		   }
		   $output .='
		   </tbody>
	   </table>
     </div>';
		}
	echo $output;
	}
	// FIN

	// CREATION TICKET
	function ticket(){
		if(isset($_POST['ticket'])){
          $idReservation=$_POST['idReservation'];
		  $reservation=$this->Clinique_model->reservation($idReservation);
		  $idClinique=$reservation->IDCLINIQUE;
		  $idPatient=$reservation->IDPATIENT;
		  $clinique=$this->Clinique_model->selectClinique($idClinique);
		  $patient=$this->Clinique_model->selectPatient($idPatient);


		  $ticket['datePrise']=$reservation->DATEPRISE;
		  $ticket['heurePrise']=$reservation->HEUREPRISE;
		  $ticket['nomClinique']=$clinique->NOMCLINIQUE;
		  $ticket['adresseClinique']=$clinique->ADRESSECLINIQUE;
		  $ticket['telephoneClinique']=$clinique->TELEPHONECLINIQUE;
		  $ticket['logoClinique']=$clinique->LOGOCLINIQUE;
		  $ticket['nomPatient']=$patient->NOMPATIENT;
		  $ticket['prenomPatient']=$patient->PRENOMPATIENT;
		  $ticket['adressePatient']=$patient->ADRESSEPATIENT;
		  $ticket['telephonePatient']=$patient->TELEPHONEPATIENT;
		  $html = $this->load->view('fichier/ticket', $ticket, true);
		  $mpdf = new \Mpdf\Mpdf();
		  $mpdf->SetHTMLHeader('
		  <div style="text-align: center; font-weight: bold; font-size:20px;">
		  TICKET DE RENDEZ-VOUS
		  </div>');
		  $mpdf->SetHTMLFooter('
		  <table width="100%">
		  <tr>
		  <td width="33%">{DATE j-m-Y}</td>
		  <td width="33%" align="center">{PAGENO}/{nbpg}</td>
		  <td width="33%" style="text-align: right;">' . $patient->PRENOMPATIENT . '</td>
		  </tr>
		  </table>');
		  $mpdf->SetWatermarkText('DOCTOPHARME');
		  $mpdf->showWatermarkText = true;
		  $mpdf->watermarkTextAlpha = 0.2;
		  $mpdf->WriteHTML($html);
		  $mpdf->Output();
		}
	}
	// FIN

	// VALIDATION RESERVATION
	function validationReservation(){
		if(isset($_POST['validation_select'])){
			if($_POST['validation_select']== 'accepter' && $_POST['reponseValider'] !=''){
				$fn = "";
				$config['upload_path'] = './upload/patient/ticket';
				$config['allowed_types'] = 'png|jpg|jpeg|pdf|JPEG|PNG|JPG|PDF';
				$config['max_size'] = 5000;
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('ticket')) {
					$this->session->set_flashdata('error', "<p class='alert alert-danger'>Sélecter un photo!</p>");
				} else {
					$fd = $this->upload->data();
					$fn = $fd['file_name'];
				}
				echo $fn;
				$donner=array(
				  'IDRESERVATION'=>$_POST['idReservation'],
                  'IDCLINIQUE'=>$_POST['IDCLINIQUE'],
				  'TICKET'=>$fn,
				  'VALIDATIONRESERVATION'=>$_POST['validation_select'],
				  'REPONSEACCEPTER'=>$_POST['reponseValider'],
				);
				$this->Clinique_model->modifierValidation($donner);
				$reservation=$this->Clinique_model->reservation($_POST['idReservation']);
				$anne = '%Y';
				$mois = '%m';
				$jour = '%d';
				$donnerReservation = array(
					'IDCLINIQUE' => $reservation->IDCLINIQUE,
					'DATERENDEZVOUS' => $reservation->DATEPRISE,
					'HEURERENDEZVOUS' => $reservation->HEUREPRISE,
					'STATUSRENDEZVOUS' => 'nonPasser',
					'IDPATIENT' => $reservation->IDPATIENT,
					'ANNE' => mdate($anne),
					'MOIS' => mdate($mois),
					'CREATED_AT' => mdate($jour),
				);
				$this->Clinique_model->insertRendezVous($donnerReservation);
			}elseif($_POST['validation_select']== 'refuser' && $_POST['reponseNonValider']!=''){
				$donner = array(
					'IDRESERVATION'=>$_POST['idReservation'],
					'IDCLINIQUE'=>$_POST['IDCLINIQUE'],
					'VALIDATIONRESERVATION'=>$_POST['validation_select'],
					'REPONSEREFUSER'=>$_POST['reponseNonValider']
				);
				$this->Clinique_model->modifierValidation($donner);
			}

		}
	}
	// FIN

	// AFFICHE RENDEZ VOUS
	function afficheRendezVous(){
		if(isset($_POST['rendezVous'])){
			$idClinique=$_POST['idClinique'];
			$rows=$this->Clinique_model->selectRendezVous($idClinique);
			$output='						
			<div class="table-responsive">
			<table class="table table-bordered table-striped">
				<thead class="bg-thead">
					<tr>
						<th>Patients</th>
						<th>Numéro</th>
						<th>Date prise</th>
						<th>Heure prise</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>';
			foreach ($rows->result() as $row) {
				$patient=$this->Clinique_model->selectPatient($row->IDPATIENT);
				if($row->STATUSRENDEZVOUS=='nonPasser'){
					$output .='
					<tr>
					<td align="center">'.$patient->NOMPATIENT.' '.$patient->PRENOMPATIENT.'</td>
					<td align="center">'.$patient->TELEPHONEPATIENT.'</td>
					<td align="center">'.$row->DATERENDEZVOUS.'</td>
					<td align="center">'.$row->HEURERENDEZVOUS.'</td>
					<td align="center">
					<button class="btn btn_nonPasser btn-sm" value="'.$row->IDRENDEZVOUS.'">Nonpasser</button>
					<button class="btn btn-sm btn_change" value="'.$row->IDRENDEZVOUS.'">Changer</button>
					<button class="btn btn_suprimerRendezVous btn-sm" value="'.$row->IDRENDEZVOUS.'"><i class="fa fa-trash-o"></i></button>
					</td>
				</tr>
					';
				}else{
					$output .='
					<tr>
					<td align="center">'.$patient->NOMPATIENT.' '.$patient->PRENOMPATIENT.'</td>
					<td align="center">'.$patient->TELEPHONEPATIENT.'</td>
					<td align="center">'.$row->DATERENDEZVOUS.'</td>
					<td align="center">'.$row->HEURERENDEZVOUS.'</td>
					<td align="center"><button class="btn btn_passer btn-sm">Passer</button></td>
				</tr>
					';
				}
			}
			$output .='
			</tbody>
			</table>
		    </div>
			';

			echo $output;
		}
	}
	// FIN

    // SELECT ANNE RENDEZ-VOUS
	function afficheAnne(){
		if(isset($_POST['anne'])){
          $idClinique=$_POST['idClinique'];
		  $rows=$this->Clinique_model->selectAnne($idClinique);
		  $option='
		  <option value="" selected> Select année</option>
		  ';
		  foreach ($rows->result() as $row) {
            $option .='
			<option value="'.$row->ANNE.'">'.$row->ANNE.'</option>
			';
		  }
		  echo $option;
		}
	}
	// FIN

	// SELECT MOIS RENDEZ VOUS
	function afficheMois(){
		if(isset($_POST['mois'])){
			$idClinique=$_POST['idClinique'];
			$rows=$this->Clinique_model->selectMois($idClinique);
			$option='
			<option value="" selected>Select mois</option>
			';
			foreach ($rows->result() as $row) {
				$option .='
				<option value="'.$row->MOIS.'">'.$row->MOIS.'</option>
				';
			}
			echo $option;
		  }
	}
	// FIN

	// SELECT JOURS
	function afficheJours(){
		if(isset($_POST['jours'])){
			$idClinique=$_POST['idClinique'];
			$rows=$this->Clinique_model->selectJours($idClinique);
			$option='
			<option value="" selected>Selects jours</option>
			';
			foreach ($rows->result() as $row) {
				$option .='
				<option value="'.$row->DATERENDEZVOUS.'">'.$row->DATERENDEZVOUS.'</option>
				';
			}
			echo $option;
		  }
	}
	// FIN

	// SELECT RENDEZ-VOUS DATE
        function afficheRendezVousDate(){
          if(isset($_POST['selectDate'])){
             $idClinique=$_POST['idClinique'];
			 $date=$_POST['jour'];
			 $rows=$this->Clinique_model->selectRendezVousDate($idClinique,$date);
			 $output='						
			 <div class="table-responsive">
			 <table class="table table-bordered table-striped">
				 <thead class="bg-thead">
					 <tr>
						 <th>Patients</th>
						 <th>Numéro</th>
						 <th>Date prise</th>
						 <th>Heure prise</th>
						 <th>Status</th>
					 </tr>
				 </thead>
				 <tbody>';
			 foreach ($rows->result() as $row) {
				 $patient=$this->Clinique_model->selectPatient($row->IDPATIENT);
				 if($row->STATUSRENDEZVOUS=='nonPasser'){
					 $output .='
					 <tr>
					 <td align="center">'.$patient->NOMPATIENT.' '.$patient->PRENOMPATIENT.'</td>
					 <td align="center">'.$patient->TELEPHONEPATIENT.'</td>
					 <td align="center">'.$row->DATERENDEZVOUS.'</td>
					 <td align="center">'.$row->HEURERENDEZVOUS.'</td>
					 <td align="center">
					 <button class="btn btn_nonPasser btn-sm" value="'.$row->IDRENDEZVOUS.'">Nonpasser</button>
					 <button class="btn btn-sm btn_change" value="'.$row->IDRENDEZVOUS.'">Changer</button>
					 <button class="btn btn_suprimerRendezVous btn-sm" value="'.$row->IDRENDEZVOUS.'"><i class="fa fa-trash-o"></i></button>
					 </td>
				 </tr>
					 ';
				 }else{
					 $output .='
					 <tr>
					 <td align="center">'.$patient->NOMPATIENT.' '.$patient->PRENOMPATIENT.'</td>
					 <td align="center">'.$patient->TELEPHONEPATIENT.'</td>
					 <td align="center">'.$row->DATERENDEZVOUS.'</td>
					 <td align="center">'.$row->HEURERENDEZVOUS.'</td>
					 <td align="center"><button class="btn btn_passer btn-sm">Passer</button></td>
				 </tr>
					 ';
				 }
			 }
			 $output .='
			 </tbody>
			 </table>
			 </div>
			 ';
 
			 echo $output;

		  }
		}
	// FIN

	// SUPRIMER RENDEZ-VOUS
	function suprimerRendezVous(){
		if(isset($_POST['suprimerRendezVous'])){
			$idClinique=$_POST['idClinique'];
			$idRendezVous=$_POST['idRendezVous'];
			if($this->Clinique_model->suprimerRendezVous($idClinique,$idRendezVous)){
				echo "Rendez-vous suprimer avec success!";
			}else{
				echo "Supression error";
			}
		}
	}
	// FIN

	// CHANGER RANDEZ-VOUS
	function changeRendezVous(){
		if(isset($_POST['changeRendezVous'])){
			$idClinique=$_POST['idClinique'];
			$idRendezVous=$_POST['idRendezVous'];
			$donner=array(
				'IDRENDEZVOUS'=>$idRendezVous,
				'IDCLINIQUE'=>$idClinique,
				'STATUSRENDEZVOUS'=>"passer"
			);
            if($this->Clinique_model->modifierRendezVous($donner)){
				echo "Changement rendez-vous avec success!";
			}else{
				echo "Changement rendez-vous error!";
			}
		}
	}
	// FIN

	// AFFICHE COUNT RESERVATION
	function afficheCount(){
		if(isset($_POST['afficheCount'])){
			$idClinique=$_POST['idClinique'];
			$countReservation=$this->Clinique_model->selectCountReservation($idClinique);
			if($countReservation!=0){
				echo $countReservation;
			}
		}
	}
	// FIN

	// MODIFIER COUNT
	function modifierCount(){
		if(isset($_POST['modifierCount'])){
			$idClinique=$_POST['idClinique'];
			$donner=array(
				'IDCLINIQUE'=>$idClinique,
				'STATUSRESERVATION'=>"1"
			);
			$this->Clinique_model->modifierCountReservation($donner);
		}
	}
	// FIN

}

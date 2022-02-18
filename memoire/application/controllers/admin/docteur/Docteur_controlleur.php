<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Docteur_controlleur extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/docteur/Docteur_model');
		$this->load->library('pdf');
	}





	// AFFICHE PATIENT ENVOI
	function affichePatient()
	{
		if (isset($_POST['afficheEnvoiMessage'])) {
			$rows = $this->Docteur_model->envoiMessage();
			$output = '
			<table class="table table-bordered table-striped">
			<thead class="bg-thead">
			<tr>
			    <th>Id</th>
				<th>Nom</th>
				<th>Prénom</th>
				<th>Adresse</th>
				<th>Téléphone</th>
				<th>Adresse mail</th>
				<th>Actions</th>
			</tr>
		   </thead>
			<tbody>
		  ';
			foreach ($rows->result() as $resultat) {
				if ($resultat->REPONSECONSULTATION == '') {
					$patient = $this->Docteur_model->affichePatient($resultat->IDPATIENT);
					$output .= '
				<tr>
				<td align="center">' . $patient->IDPATIENT . '</td>
				<td align="center">' . $patient->NOMPATIENT . '</td>
				<td align="center">' . $patient->PRENOMPATIENT . '</td>
				<td align="center">' . $patient->ADRESSEPATIENT . '</td>
				<td align="center">' . $patient->TELEPHONEPATIENT . '</td>
				<td align="center">' . $patient->MAILPATIENT . '</td>
				<td align="center"><button class="btn btn-sm" value="' . $resultat->IDCONSULTATION . '" id="messagePatient" data-toggle="modal" data-target="#reponseMessage">Répondre</button></td>
				  </tr>
			   ';
				}
			}

			$output .= '
			  </tbody>
			  </table>
			  ';

			echo $output;
		}
	}
	// FIN


	// AFFICHE MESSAGE
	function afficheMessage()
	{
		if (isset($_POST['idConsultation'])) {
			$idPatient = $this->Docteur_model->afficheIdPatient($_POST['idConsultation']);
			$rows = $this->Docteur_model->afficheMessage($idPatient->IDPATIENT, $_POST['idConsultation']);
			foreach ($rows->result() as $resultat) {
				$patient = $this->Docteur_model->affichePatient($resultat->IDPATIENT);
				$docteur = $this->Docteur_model->afficheDocteur($resultat->IDDOCTEUR);

				if ($patient->STATUSPATIENT == "inactif") {
					$message = '
                    <div class="message_patient">
                      <div class="patients_nom">
					  <img src="' . base_url() . 'upload/patient/' . $patient->PHOTOPATIENT . '" width="40px" alt="">
                        <i class="fa fa-circle inactif"></i>
                        <h6>' . $patient->NOMPATIENT . '</h6>
                      </div>
                      <div class="content_message">
                        <span>' . $resultat->MESSAGECONSULTATION . '</span>
                      </div>
                    </div>
				  ';
				} else {
					$message = '
                    <div class="message_patient">
                      <div class="patients_nom">
					  <img src="' . base_url() . 'upload/patient/' . $patient->PHOTOPATIENT . '" width="40px" alt="">
                        <i class="fa fa-circle actif"></i>
                        <h6>' . $patient->NOMPATIENT . '</h6>
                      </div>
                      <div class="content_message">
					  <span>' . $resultat->MESSAGECONSULTATION . '</span>
                      </div>
                    </div>
				  ';
				}

				if ($resultat->REPONSECONSULTATION != "" && $resultat->ORDONANCE != "" && $docteur->STATUSDOCTEUR == "actif") {
					$message .= '
                    <div class="d-flex justify-content-end">
                      <div class="message_docteur">
                        <div class="d-flex justify-content-end">
                          <div class="docteur_nom">
                            <img src="' . base_url() . 'upload/docteur/' . $docteur->PHOTODOCTEUR . '" width="40px" alt="">
                            <i class="fa fa-circle actif"></i>
                            <h6>Dr ' . $docteur->NOMDOCTEUR . '</h6>
                          </div>
                        </div>
                        <div class="content_message">
                          <span>' . $resultat->REPONSECONSULTATION . '</span>
                        </div>
                        <div class="d-flex justify-content-end">
						<a href="' . base_url() . 'admin/docteur/Docteur_controlleur/download/' . $resultat->IDCONSULTATION . '">
                          <div class="content_ordonance">
                            <h6>Ordonance</h6>
                            <i class="fa fa-building-o"></i>
                           </div>
						</a>
                        </div>

                      </div>
                    </div>
					';
				} elseif ($resultat->REPONSECONSULTATION != "" && $resultat->ORDONANCE != "" && $docteur->STATUSDOCTEUR == "inactif") {
					$message .= '
					<div class="d-flex justify-content-end">
					<div class="message_docteur">
					  <div class="d-flex justify-content-end">
						<div class="docteur_nom">
						<img src="' . base_url() . 'upload/docteur/' . $docteur->PHOTODOCTEUR . '" width="40px" alt="">
						<i class="fa fa-circle inactif"></i>
						<h6>Dr ' . $docteur->NOMDOCTEUR . '</h6>
						</div>
					  </div>
					  <div class="content_message">
					  <span>' . $resultat->REPONSECONSULTATION . '</span>
					  </div>
					  <div class="d-flex justify-content-end">
					  <a href="' . base_url() . 'admin/docteur/Docteur_controlleur/download/' . $resultat->IDCONSULTATION . '">
					      <div class="content_ordonance">
						     <h6>Ordonance</h6>
						    <i class="fa fa-building-o"></i>
					      </div>
					  </a>
					  </div>

					</div>
				  </div>

					';
				} elseif ($resultat->REPONSECONSULTATION != "" && $resultat->ORDONANCE == "" && $docteur->STATUSDOCTEUR == "actif") {
					$message .= '
				  <div class="d-flex justify-content-end">
				  <div class="message_docteur">
					<div class="d-flex justify-content-end">
					  <div class="docteur_nom">
						<img src="' . base_url() . 'upload/docteur/' . $docteur->PHOTODOCTEUR . '" width="40px" alt="">
						<i class="fa fa-circle actif"></i>
						<h6>Dr ' . $docteur->NOMDOCTEUR . '</h6>
					  </div>
					</div>
					<div class="content_message">
					  <span>' . $resultat->REPONSECONSULTATION . '</span>
					</div>
				  </div>
				</div>
				  ';
				} elseif ($resultat->REPONSECONSULTATION != "" && $resultat->ORDONANCE == "" && $docteur->STATUSDOCTEUR == "inactif") {
					$message .= '
					<div class="d-flex justify-content-end">
					<div class="message_docteur">
					  <div class="d-flex justify-content-end">
						<div class="docteur_nom">
						<img src="' . base_url() . 'upload/docteur/' . $docteur->PHOTODOCTEUR . '" width="40px" alt="">
						<i class="fa fa-circle inactif"></i>
						<h6>' . $docteur->NOMDOCTEUR . '</h6>
						</div>
					  </div>
					  <div class="content_message">
					  <span>' . $resultat->REPONSECONSULTATION . '</span>
					  </div>
					</div>
				  </div>
					';
				} else {
					$message .= '';
				}

				echo $message;
			}
		}
	}
	//FIN


	// DOWNLOAD ORDONNANCE
	function download($id)
	{
		if (!empty($id)) {
			$this->load->helper('download');
			$ordonnance = $this->Docteur_model->afficheOrdonnance($id);
			if ($ordonnance->num_rows() > 0) {
				foreach ($ordonnance->result() as $row) {
					$file = 'upload/ordonnance/' . $row->ORDONANCE;
					force_download($file, NULL);
				}
			}
		}
	}
	// FIN

	// LISTES PATIENTS
	function patient()
	{
		if (isset($_POST['patient'])) {
			$query = '';
			$output = '';
			$query = $this->input->post('query');
			$data = $this->Docteur_model->patient($query);
			$output .= '
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
		  <th>Actions</th>
		  </tr>
		</thead>
		<tbody>
			';
			if ($data->num_rows() > 0) {
				foreach ($data->result() as $row) {
					$countAversissement = $this->Docteur_model->countAvertissement($row->IDPATIENT);
					$output .= '
			<tr>
			<td><img src="' . base_url() . 'upload/patient/' . $row->PHOTOPATIENT . '" width="50px" height="40px" alt=""></td>
			<td>' . $row->NOMPATIENT . '</td>
			<td>' . $row->PRENOMPATIENT . '</td>
			<td><button type="button" class="btn btn-sm btn-avertissement"> <span class="badge badge-light">' . $countAversissement . '</span>
			  </button></td>
			<td><button class="btn btn-success btn-sm" value="' . $row->IDPATIENT . '" id="detailsPatient" data-toggle="modal"  data-target="#detailsPatients">Details</button></td>
			<td><button class="btn btn-success btn-sm" value="' . $row->IDPATIENT . '" id="notificationPatient" data-toggle="modal" data-target="#notifierPatients">Notifier</button></td>
			<td><button class="btn btn-success btn-sm" value="' . $row->IDPATIENT . '" id="ordonnancePatient" data-toggle="modal" data-target="#ordonancePatients">Ordonnance</button></td>
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
		</table>';

			echo $output;
		}
	}
	// FIN


		// SUPRIMER PATIENT
		function suprimerPatient(){
			if(isset($_POST['suprimerPatient'])){
				$idPatient=$_POST['idPatient'];
				$this->Docteur_model->dataPatientReservation($idPatient);
				$this->Docteur_model->dataPatientPanierAgenda($idPatient);
				$this->Docteur_model->dataPatientConsultation($idPatient);
				$this->Docteur_model->dataPatientPanier($idPatient);
				$this->Docteur_model->dataPatientObtenir($idPatient);
				$this->Docteur_model->dataPatientAchat($idPatient);
				$this->Docteur_model->dataPatientRendezVous($idPatient);
				$this->Docteur_model->dataPatientVente($idPatient);
				if($this->Docteur_model->suprimerPatient($idPatient)){
					echo "supression patient avec success";
				}else{
					echo "supression patient avec erreur";
				}
			}
		}
		//FIN SUPRIMER PATIENT




	// AFFICHE COUNT MESSAGE NON REPONSE
	function countMessage()
	{
		if (isset($_POST['countMessage'])) {
			$data = $this->Docteur_model->countMessage();
			echo $data;
		}
	}
	// FIN

	// AFFICHE DETAILS PATIENT
	function detailsPatient()
	{
		if (isset($_POST['idPatient'])) {
			$patient = $this->Docteur_model->detailsPatient($_POST['idPatient']);
			$provincePatient = $this->Docteur_model->selectProvince($patient->PROVINCEPATIENT);
			$regionPatient = $this->Docteur_model->selectRegion($patient->REGIONPATIENT);
			$districtPatient = $this->Docteur_model->selectDistrict($patient->DISTRICTPATIENT);
			$communePatient = $this->Docteur_model->selectCommune($patient->COMMUNEPATIENT);
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

	// AJOUTE NOTIFICATION
	function ajouteNotification()
	{
		if (isset($_POST['ajouteNotif'])) {
			$datestring = '%Y/%m/%d - %h:%i %a';
			$time = time();
			$donner = array(
				"TYPENOTIFPATIENT" => $_POST['typeNotification'],
				"NOTIFPATIENT" => $_POST['messageNotification'],
				"ENVOYEURNOTIFPATIENT" => 'docteur',
				"DATENOTIFPATIENT" => mdate($datestring, $time),
				"NOMENVOYEURNOTIFPATIENT" => 'Dr ' . $_POST['prenomDocteurNotif'],
				"PHOTOENVOTEURNOTIFPATIENT" => $_POST['photoDocteurNotif'],
				"STATUSNOTIFPATIENT" => "0"
			);
			$this->Docteur_model->ajouteNotif($donner);
			$notif = $this->Docteur_model->idNotif($_POST['messageNotification'], $_POST['typeNotification'], 'docteur', mdate($datestring, $time), 'Dr ' . $_POST['prenomDocteurNotif']);
			$donner2 = array(
				"IDPATIENT" => $_POST['idPatientNotif'],
				"IDNOTIFPATIENT" => $notif->IDNOTIFPATIENT,
			);
			$this->Docteur_model->ajouteNotif2($donner2);

			echo "Envoi notification avec success !";
		}
	}
	// FIN

	// CREATION ORDONNANCE
	function creerOrdonnance()
	{
		if (isset($_POST['creerOrdonnance'])) {
			$dateOrdonance = $_POST['dateOrdonance'];
			$delaisOrdonance = $_POST['delaisOrdonance'];
			$messageOrdonance = $_POST['messageOrdonance'];
			$nomDocteurOrdonnance = $_POST['nomDocteurOrdonnance'];
			$prenomDocteurOrdonance = $_POST['prenomDocteurOrdonance'];
			$cliniqueDocteurOrdonance = $_POST['cliniqueDocteurOrdonance'];
			$telephoneDocteurOrdonance = $_POST['telephoneDocteurOrdonance'];
			$patient = $this->Docteur_model->detailsPatient($_POST['idPatientOrdonnance']);
			$nomPatient = $patient->NOMPATIENT;
			$prenomPatient = $patient->PRENOMPATIENT;
			$adressePatient = $patient->ADRESSEPATIENT;
			$telephonePatient = $patient->TELEPHONEPATIENT;
			$mailPatient = $patient->MAILPATIENT;
			$cinPatient = $patient->CINPATIENT;
			$photoPatient = $patient->PHOTOPATIENT;

			$ordonnance['dateOrdonnance']=$dateOrdonance;
			$ordonnance['delaisOrdonnance']=$delaisOrdonance;
			$ordonnance['messageOrdonnance']=$messageOrdonance;
			$ordonnance['nomDoctuer']=$nomDocteurOrdonnance;
			$ordonnance['prenomDocteur']=$prenomDocteurOrdonance;
			$ordonnance['cliniqueDocteur']=$cliniqueDocteurOrdonance;
			$ordonnance['telephoneDocteur']=$telephoneDocteurOrdonance;
			$ordonnance['nomPatient']=$nomPatient;
			$ordonnance['prenomPatient']=$prenomPatient;
			$ordonnance['adressePatient']=$adressePatient;
			$ordonnance['telephonePatient']=$telephonePatient;
			$ordonnance['mailPatient']=$mailPatient;
			$ordonnance['photoPatient']=$photoPatient;
		$html=$this->load->view('fichier/ordonnance',$ordonnance,true);
		$mpdf = new \Mpdf\Mpdf();
		$mpdf->SetHTMLHeader('
        <div style="text-align: center; font-weight: bold; font-size:20px;">
        ORDONNANCE DOCTOPHARME
        </div>');
		$mpdf->SetHTMLFooter('
        <table width="100%">
        <tr>
        <td width="33%">{DATE j-m-Y}</td>
        <td width="33%" align="center">{PAGENO}/{nbpg}</td>
        <td width="33%" style="text-align: right;">'.$prenomPatient.'</td>
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

	// REPONSE CONSULTATION
	function modifierConsultation()
	{
		if (isset($_POST['reponseConsultation'])) {
			$fn = "";
			$config['upload_path'] = './upload/ordonnance';
			$config['allowed_types'] = 'png|jpg|jpeg|pdf|JPEG|PNG|PDF|JPG';
			$config['max_size'] = 5000;
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('ordonanceMessage')) {
				$this->session->set_flashdata('error', "<p class='alert alert-danger'>Sélecter un photo!</p>");
			} else {
				$fd = $this->upload->data();
				$fn = $fd['file_name'];
			}
			$reponseConsultation = $_POST['reponseMessageConsultation'];
			$idDocteurMessage = $_POST['idDocteurMessage'];
			$idConsultationMessage = $_POST['idConsultationMessage'];
			$donner = array(
				"IDCONSULTATION" => $idConsultationMessage,
				"IDDOCTEUR" => $idDocteurMessage,
				"REPONSECONSULTATION" => $reponseConsultation,
				"ORDONANCE" => $fn,
				"STATUSCONSULTATION" => "0",
			);
			if ($this->Docteur_model->modificationConsultation($donner)) {
				$data = "Réponse avec success!";
			} else {
				$data = "Réponse erreur!";
			}
			echo $data;
		}
	}
	// FIN

	// AJOUTE MESSAGE FORUM
	function ajouteForum()
	{
		if (isset($_POST['ajouteForum'])) {
			$datestring = '%Y/%m/%d - %h:%i %a';
			$time = time();
			$donner = array(
				"MESSAGEFORUM" => $_POST['messageforum'],
				"DATEMESSAGEFORUM" => mdate($datestring, $time),
			);
			$this->Docteur_model->ajouteForum($donner);
			$idForum = $this->Docteur_model->idForum($_POST['messageforum'], mdate($datestring, $time));
			$donner2 = array(
				"IDDOCTEUR" => $_POST['idDocteurForum'],
				"IDFORUM" => $idForum->IDFORUM,
			);
			$this->Docteur_model->ajouteForum2($donner2);
		}
	}
	// FIN

	// AFFICHE MESSAGE FORUM
	function afficheMessageForum()
	{
		if ($_POST['afficheMessageForum']) {
			$rows = $this->Docteur_model->afficheMessageForum();
			foreach ($rows->result() as $resultat) {
				$docteur = $this->Docteur_model->afficheDocteurForum($resultat->IDDOCTEUR);
				if ($resultat->IDDOCTEUR == $_POST['idDocteurForum']) {
					$Forum = '
					<div class="d-flex justify-content-end">
                    <div class="message_docteur_forum">
                      <span>' . $resultat->MESSAGEFORUM . '</span>
                    </div>
                    </div>
					';
				} elseif ($docteur->STATUSDOCTEUR == "actif") {
					$Forum = '
					<div class="membre_docteur_forum">
                    <div class="nom_membre_docteur_forum">
                      <img src="' . base_url() . 'upload/docteur/' . $docteur->PHOTODOCTEUR . '" width="35px" alt="">
                      <i class="fa fa-circle actif"></i>
                      <h6>Dr ' . $docteur->PRENOMDOCTEUR . '</h6>
                    </div>
                    <div class="content_membre_docteur_forum">
                      <span>' . $resultat->MESSAGEFORUM . '</span>
                    </div>
                  </div>
					';
				} elseif ($docteur->STATUSDOCTEUR == "inactif") {
					$Forum = '
				  <div class="membre_docteur_forum">
				  <div class="nom_membre_docteur_forum">
					<img src="' . base_url() . 'upload/docteur/' . $docteur->PHOTODOCTEUR . '" width="35px" alt="">
					<i class="fa fa-circle inactif"></i>
					<h6>Dr ' . $docteur->PRENOMDOCTEUR . '</h6>
				  </div>
				  <div class="content_membre_docteur_forum">
					<span>' . $resultat->MESSAGEFORUM . '</span>
				  </div>
				</div>
				  ';
				}

				echo $Forum;
			}
		}
	}
	// FIN

	// AFFICHE DOCTEUR
	function afficheDocteur()
	{
		if (isset($_POST['afficheDocteur'])) {
			$rows = $this->Docteur_model->afficheListeDocteur();
			foreach ($rows->result() as $resultat) {
				if ($resultat->STATUSDOCTEUR == "actif") {
					$docteur = '
				<div class="content_listes">
				<div class="nom_docteur">
				  <img src="' . base_url() . 'upload/docteur/' . $resultat->PHOTODOCTEUR . '" width="35px" alt="">
				  <h6>Dr ' . $resultat->PRENOMDOCTEUR . '</h6>
				</div>
				<i class="fa fa-circle actif"></i>
			  </div>
				';
				} elseif ($resultat->STATUSDOCTEUR == "inactif") {
					$docteur = '
				<div class="content_listes">
				<div class="nom_docteur">
				  <img src="' . base_url() . 'upload/docteur/' . $resultat->PHOTODOCTEUR . '" width="35px" alt="">
				  <h6>Dr ' . $resultat->PRENOMDOCTEUR . '</h6>
				</div>
				<i class="fa fa-circle inactif"></i>
			  </div>
				';
				}
				echo $docteur;
			}
		}
	}
	// FIN



	// LOUGOUT
	function logout()
	{
		$donner = array(
			"IDDOCTEUR" => $_SESSION['IDDOCTEUR'],
			"STATUSDOCTEUR" => "inactif",
		);
		$this->Docteur_model->modifierDocteur($donner);
		unset($_SESSION);
		session_destroy();
		redirect('admin/docteur/Docteur_controlleur/passage');
	}
	// FIN 

	
	// LIEN VERS LA PÄGE PASSAGE ADMIN
	function passage()
	{
		$this->load->view('admin/passageAdmin');
	}
	// FIN





}

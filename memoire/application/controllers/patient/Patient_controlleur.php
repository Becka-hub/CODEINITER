<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Patient_controlleur extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('patient/LoginPatient_model');
		$this->load->model('patient/Patient_model');
	}


	// SELECT REGION AVEC ID PROVINCE
	function selectRegion()
	{
		if (isset($_POST['idProvince'])) {
			$id = $_POST['idProvince'];
			$rows = $this->Patient_model->selectRegion($id);
			$output = '
	        <option value="">Selects régions</option>
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
			$rows = $this->Patient_model->selectDistrict($id);
			$output = '
	 <option value="">Selects districts</option>
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
			$rows = $this->Patient_model->selectCommune($id);
			$output = '
		 <option value="">Selects communes</option>
		 ';
			foreach ($rows->result() as $resultat) {
				$output .= '<option value="' . $resultat->IDCOMMUNE . '">' . $resultat->NOMCOMMUNE . '</option>';
			}
			echo $output;
		}
	}
	// FIN


	// AJOUTE MESSAGE
	function ajouteMessage()
	{
		if (isset($_POST['idPatient']) && isset($_POST['message'])) {
			$datestring = '%Y/%m/%d - %h:%i %a';
			$time = time();
			$donner = array(
				"IDPATIENT" => $_POST['idPatient'],
				"MESSAGECONSULTATION" => $_POST['message'],
				"DATECONSULTATION" => mdate($datestring, $time),
			);
			$this->Patient_model->ajouteMessage($donner);
		}
	}
	// FIN

	// AFFICHE MESSAGE
	function afficheMessage()
	{
		if (isset($_POST['afficheMessage'])) {
			$rows = $this->Patient_model->afficheMessage($_POST['idPatient']);
			foreach ($rows->result() as $resultat) {
				$docteur = $this->Patient_model->afficheDocteur($resultat->IDDOCTEUR);
				$message = '
				<div class="col-sm-12 col-md-12 col-lg-12 mb-1 mt-3 d-flex justify-content-end">
				<div class="body_message_envoyer">
					<div class="message_envoyer">
						<span class="text_consultation">' . $resultat->MESSAGECONSULTATION . '</span>
					</div>
				</div>
			     </div>
				';
				if ($resultat->REPONSECONSULTATION != "" && $resultat->ORDONANCE != "") {
					$message .= '										
                    <div class="col-sm-12 col-md-12 col-lg-12 mb-1">
											<div class="body_message_reponse">
												<div class="message_reponse">
													<div class="envoye_reponse">
														<img src="' . base_url() . 'upload/docteur/' . $docteur->PHOTODOCTEUR . '" width="35px" height="35px" />
														<h6>Dr ' . $docteur->PRENOMDOCTEUR . '</h6>
													</div>
													<div class="content_reponse mt-2">
														<span class="text_consultation ">' . $resultat->REPONSECONSULTATION . '</span>
													</div>
													<div class="content_ordonance mt-2">
														<div class="ordonance">
															<h6>Ordonance</h6>
															<i class="fa fa-building-o"></i>
														</div>
														<a href="' . base_url() . 'patient/Patient_controlleur/download/' . $resultat->IDCONSULTATION . '">
														<div class="download_ordonance">
															<i class="fa fa-download"></i>
														</div>
														</a>
													</div>
												</div>
										   </div>
				   </div>
				   ';
				} elseif ($resultat->REPONSECONSULTATION != "" && $resultat->ORDONANCE == "") {
					$message .= '										
                                        <div class="col-sm-12 col-md-12 col-lg-12 mb-1">
											<div class="body_message_reponse">
												<div class="message_reponse">
													<div class="envoye_reponse">
														<img src="' . base_url() . 'upload/docteur/' . $docteur->PHOTODOCTEUR . '" width="35px" height="35px" />
														<h6>Dr ' . $docteur->PRENOMDOCTEUR . '</h6>
													</div>
													<div class="content_reponse mt-2">
														<span class="text_consultation ">' . $resultat->REPONSECONSULTATION . '</span>
													</div>
												</div>
										    </div>
						                 </div>
				   ';
				}

				echo $message;
			}
		}
	}
	// FIN


	// DOWNLOAD ORDONNANCE
	function download($id)
	{
		if (!empty($id)) {
			$this->load->helper('download');
			$ordonnance = $this->Patient_model->afficheOrdonnance($id);
			if ($ordonnance->num_rows() > 0) {
				foreach ($ordonnance->result() as $row) {
					$file = 'upload/ordonnance/' . $row->ORDONANCE;
					force_download($file, NULL);
				}
			}
		}
	}
	// FIN


	// AFFICHE NOTIFICATION
	function afficheNotification()
	{
		if (isset($_POST['afficheNotification'])) {
			$rows = $this->Patient_model->afficheNotification($_POST['idPatient']);

			$notif = '';
			foreach ($rows->result() as $resultat) {
				if ($resultat->TYPENOTIFPATIENT == "message" && $resultat->ENVOYEURNOTIFPATIENT == "docteur") {
					$notif = '
				  <div class="notification_docteur mt-1">
                  <div class="media position-relative">
                    <div class="notification_icons">
                      <i class="fa fa-comments"></i>
                    </div>
                    <div class="media-body">
                      <div class="media_body_header">
                        <img src="' . base_url() . 'upload/docteur/' . $resultat->PHOTOENVOTEURNOTIFPATIENT . '" width="35px" alt="">
                        <h6>' . $resultat->NOMENVOYEURNOTIFPATIENT . '</h6>
                      </div>
                      <p>' . $resultat->NOTIFPATIENT . '</p>
                      <h6><i class="fa fa-clock-o"></i> ' . $resultat->DATENOTIFPATIENT . '</h6>
                    </div>
                  </div>
                </div>
				  ';
				} elseif ($resultat->TYPENOTIFPATIENT == "message" && $resultat->ENVOYEURNOTIFPATIENT == "pharmacie") {
					$notif = '
                <div class="notification_pharmacetique mt-1">
                  <div class="media position-relative">
                    <div class="notification_icons">
                      <i class="fa fa-medkit"></i>
                    </div>
                    <div class="media-body">
                      <div class="media_body_header">
                        <img src="' . base_url() . 'upload/pharmacie/' . $resultat->PHOTOENVOTEURNOTIFPATIENT . '" width="35px" alt="">
                        <h6>' . $resultat->NOMENVOYEURNOTIFPATIENT . '</h6>
                      </div>
                      <p>' . $resultat->NOTIFPATIENT . '</p>
                      <h6><i class="fa fa-clock-o"></i> ' . $resultat->DATENOTIFPATIENT . '</h6>
                    </div>
                  </div>
                </div>
				';
				} elseif ($resultat->TYPENOTIFPATIENT == "message" && $resultat->ENVOYEURNOTIFPATIENT == "clinique") {
					$notif = '
				<div class="notification_centre_medicale mt-1">
				<div class="media position-relative">
				  <div class="notification_icons">
					<i class="fa fa-ambulance"></i>
				  </div>
				  <div class="media-body">
					<div class="media_body_header">

					  <img src="' . base_url() . 'upload/clinique/' . $resultat->PHOTOENVOTEURNOTIFPATIENT . '" width="35px" alt="">
					  <h6>' . $resultat->NOMENVOYEURNOTIFPATIENT . '</h6>
					</div>
					<p>' . $resultat->NOTIFPATIENT . '</p>
					<h6><i class="fa fa-clock-o"></i> ' . $resultat->DATENOTIFPATIENT . '</h6>
				  </div>
				</div>
			  </div>
				';
				} elseif ($resultat->TYPENOTIFPATIENT == "avertissement" && $resultat->ENVOYEURNOTIFPATIENT == "docteur") {
					$notif = '
				<div class="notification_exclamation mt-1">
				<div class="media media_exclamation position-relative">
				  <div class="notification_icons">
				  <i class="fa fa-exclamation-triangle"></i>
				  </div>
				  <div class="media-body">
					<div class="media_body_header">

					  <img src="' . base_url() . 'upload/docteur/' . $resultat->PHOTOENVOTEURNOTIFPATIENT . '" width="35px" alt="">
					  <h6>' . $resultat->NOMENVOYEURNOTIFPATIENT . '</h6>
					</div>
					<p>' . $resultat->NOTIFPATIENT . '</p>
					<h6><i class="fa fa-clock-o"></i> ' . $resultat->DATENOTIFPATIENT . '</h6>
				  </div>
				</div>
			  </div>
				';
				} elseif ($resultat->TYPENOTIFPATIENT == "avertissement" && $resultat->ENVOYEURNOTIFPATIENT == "pharmacie") {
					$notif = '
					<div class="notification_exclamation mt-1">
					<div class="media media_exclamation position-relative">
					  <div class="notification_icons">
					  <i class="fa fa-exclamation-triangle"></i>
					  </div>
					  <div class="media-body">
						<div class="media_body_header">
	
						<img src="' . base_url() . 'upload/pharmacie/' . $resultat->PHOTOENVOTEURNOTIFPATIENT . '" width="35px" alt="">
						  <h6>' . $resultat->NOMENVOYEURNOTIFPATIENT . '</h6>
						</div>
						<p>' . $resultat->NOTIFPATIENT . '</p>
						<h6><i class="fa fa-clock-o"></i> ' . $resultat->DATENOTIFPATIENT . '</h6>
					  </div>
					</div>
				  </div>
				
				';
				} else {
					$notif = '
					<div class="notification_exclamation mt-1">
					<div class="media media_exclamation position-relative">
					  <div class="notification_icons">
					  <i class="fa fa-exclamation-triangle"></i>
					  </div>
					  <div class="media-body">
						<div class="media_body_header">
	
						  <img src="' . base_url() . 'upload/clinique/' . $resultat->PHOTOENVOTEURNOTIFPATIENT . '" width="35px" alt="">
						  <h6>' . $resultat->NOMENVOYEURNOTIFPATIENT . '</h6>
						</div>
						<p>' . $resultat->NOTIFPATIENT . '</p>
						<h6><i class="fa fa-clock-o"></i> ' . $resultat->DATENOTIFPATIENT . '</h6>
					  </div>
					</div>
				  </div>
				';
				}



				echo $notif;
			}
		}
	}
	// FIN

	// AFFICHE COUNT NOTIFICATION
	function afficheCountNotification()
	{
		if (isset($_POST['afficheCountNotif'])) {
			$countNotif = $this->Patient_model->countNotif($_POST['idPatient']);
			if ($countNotif != 0) {
				echo $countNotif;
			}
		}
	}
	// FIN

	// DELETE COUNT NOTIFICATION
	function deleteCountNotification()
	{
		if (isset($_POST['deleteCountNotif'])) {
			$rows = $this->Patient_model->afficheIdNotif($_POST['idPatient']);
			foreach ($rows->result() as $resultat) {
				$donner = array(
					"IDNOTIFPATIENT" => $resultat->IDNOTIFPATIENT,
					"STATUSNOTIFPATIENT" => '1',
				);
				$this->Patient_model->modificationNotif($donner);
			}
		}
	}
	// FIN

	// AFFICHE COUNT MESSAGE
	function afficheCountMessage()
	{
		if (isset($_POST['afficheCountMessage'])) {
			$countMessage = $this->Patient_model->countMessage($_POST['idPatient']);
			if ($countMessage != 0) {
				echo $countMessage;
			}
		}
	}
	// FIN

	// DELETE COUNT MESSAGE
	function deleteCountMessage()
	{
		if (isset($_POST['deleteCountMessage'])) {
			$donner = array(
				"IDPATIENT" => $_POST['idPatient'],
				"STATUSCONSULTATION" => '1',
			);
			$this->Patient_model->modificationMessage($donner);
		}
	}
	// FIN


	// AFFICHE DOCTEUR

	function afficheDocteur()
	{
		if (isset($_POST['selectDocteur'])) {
			$rows = $this->Patient_model->selectDocteur();
			foreach ($rows->result() as $resultat) {
				$card = '
				<div class="col-12 col-sm-6 col-md-3 col-lg-3">
				<div class="card_docteur">
					<div class="card_docteur_image">
						<img src="' . base_url() . 'upload/docteur/' . $resultat->PHOTODOCTEUR . '" alt="">
					</div>
					<div class="card_docteur_txt">
						<h4 class="text-center">Dr ' . $resultat->PRENOMDOCTEUR . '</h4>
						<p class="text-truncate">' . $resultat->SPECIALISEDOCTEUR . '</p>
						<div class="col d-flex justify-content-center">
							<a href="#" data-toggle="modal" data-target="#ModalDocteur" data-whatever="@mdo" value="' . $resultat->IDDOCTEUR . '" id="idDocteurApropos">A propos</a>
						</div>
					</div>
				</div>
			</div>
				';

				echo $card;
			}
		}
	}

	// FIN


	// SELECT REGION DOCTEUR
	function selectProvinceDocteur()
	{
		if (isset($_POST['selectDocteur'])) {
			$rows = $this->Patient_model->selectProvinceDocteur($_POST['id']);
			foreach ($rows->result() as $resultat) {
				$card = '
				<div class="col-12 col-sm-6 col-md-3 col-lg-3">
				<div class="card_docteur">
					<div class="card_docteur_image">
						<img src="' . base_url() . 'upload/docteur/' . $resultat->PHOTODOCTEUR . '" alt="">
					</div>
					<div class="card_docteur_txt">
						<h4 class="text-center">Dr ' . $resultat->PRENOMDOCTEUR . '</h4>
						<p class="text-truncate">' . $resultat->SPECIALISEDOCTEUR . '</p>
						<div class="col d-flex justify-content-center">
							<a href="#" data-toggle="modal" data-target="#ModalDocteur" data-whatever="@mdo" value="' . $resultat->IDDOCTEUR . '" id="idDocteurApropos">A propos</a>
						</div>
					</div>
				</div>
			</div>
				';

				echo $card;
			}
		}
	}
	// FIN


	// SELECT REGION DOCTEUR
	function selectRegionDocteur()
	{
		if (isset($_POST['selectDocteur'])) {
			$rows = $this->Patient_model->selectRegionDocteur($_POST['id']);
			foreach ($rows->result() as $resultat) {
				$card = '
					<div class="col-12 col-sm-6 col-md-3 col-lg-3">
					<div class="card_docteur">
						<div class="card_docteur_image">
							<img src="' . base_url() . 'upload/docteur/' . $resultat->PHOTODOCTEUR . '" alt="">
						</div>
						<div class="card_docteur_txt">
							<h4 class="text-center">Dr ' . $resultat->PRENOMDOCTEUR . '</h4>
							<p class="text-truncate">' . $resultat->SPECIALISEDOCTEUR . '</p>
							<div class="col d-flex justify-content-center">
								<a href="#" data-toggle="modal" data-target="#ModalDocteur" data-whatever="@mdo" value="' . $resultat->IDDOCTEUR . '" id="idDocteurApropos">A propos</a>
							</div>
						</div>
					</div>
				</div>
					';

				echo $card;
			}
		}
	}
	// FIN

	// SELECT DISTRICT DOCTEUR
	function selectDistrictDocteur()
	{
		if (isset($_POST['selectDocteur'])) {
			$rows = $this->Patient_model->selectDistrictDocteur($_POST['id']);
			foreach ($rows->result() as $resultat) {
				$card = '
						<div class="col-12 col-sm-6 col-md-3 col-lg-3">
						<div class="card_docteur">
							<div class="card_docteur_image">
								<img src="' . base_url() . 'upload/docteur/' . $resultat->PHOTODOCTEUR . '" alt="">
							</div>
							<div class="card_docteur_txt">
								<h4 class="text-center">Dr ' . $resultat->PRENOMDOCTEUR . '</h4>
								<p class="text-truncate">' . $resultat->SPECIALISEDOCTEUR . '</p>
								<div class="col d-flex justify-content-center">
									<a href="#" data-toggle="modal" data-target="#ModalDocteur" data-whatever="@mdo" value="' . $resultat->IDDOCTEUR . '" id="idDocteurApropos">A propos</a>
								</div>
							</div>
						</div>
					</div>
						';

				echo $card;
			}
		}
	}
	// FIN

	// SELECT COMMUNE DOCTEUR
	function selectCommuneDocteur()
	{
		if (isset($_POST['selectDocteur'])) {
			$rows = $this->Patient_model->selectCommuneDocteur($_POST['id']);
			foreach ($rows->result() as $resultat) {
				$card = '
					<div class="col-12 col-sm-6 col-md-3 col-lg-3">
					<div class="card_docteur">
						<div class="card_docteur_image">
							<img src="' . base_url() . 'upload/docteur/' . $resultat->PHOTODOCTEUR . '" alt="">
						</div>
						<div class="card_docteur_txt">
							<h4 class="text-center">Dr ' . $resultat->PRENOMDOCTEUR . '</h4>
							<p class="text-truncate">' . $resultat->SPECIALISEDOCTEUR . '</p>
							<div class="col d-flex justify-content-center">
								<a href="#" data-toggle="modal" data-target="#ModalDocteur" data-whatever="@mdo" value="' . $resultat->IDDOCTEUR . '" id="idDocteurApropos">A propos</a>
							</div>
						</div>
					</div>
				</div>
					';

				echo $card;
			}
		}
	}
	// FIN


	// APROPOS DOCTEUR
	function aproposDocteur()
	{
		if (isset($_POST['selectDocteur'])) {
			$rows = $this->Patient_model->aproposDocteur($_POST['id']);
			foreach ($rows->result() as $resultat) {
				$provinceDocteur = $this->Patient_model->nomProvinceDocteur($resultat->PROVINCEDOCTEUR);
				$regionDocteur = $this->Patient_model->nomRegionDocteur($resultat->REGIONDOCTEUR);
				$districtDocteur = $this->Patient_model->nomDistrictDocteur($resultat->DISTRICTDOCTEUR);
				$communeDocteur = $this->Patient_model->nomCommuneDocteur($resultat->COMMUNEDOCTEUR);
				$card = '
				<div class="row mt-2">
				<div class="col-12 col-sm-12 col-md-6 col-lg-6">
					<div class="modal_docteur_image">
						<img src="' . base_url() . 'upload/docteur/' . $resultat->PHOTODOCTEUR . '" alt="">
					</div>
				</div>
				<div class="col-12 col-sm-12 col-md-6 col-lg-6">
					<div class="modal_docteur_description">
						<h6>Nom : ' . $resultat->NOMDOCTEUR . '</h6>
						<hr style="border: 0.5px solid rgb(0, 230, 0);">
						<h6>Prénom : ' . $resultat->PRENOMDOCTEUR . '</h6>
						<hr style="border: 0.5px solid rgb(0, 230, 0);">
						<h6>Adresse : ' . $resultat->ADRESSEDOCTEUR . '</h6>
						<hr style="border: 0.5px solid rgb(0, 230, 0);">
						<h6>Téléphone : ' . $resultat->TELEPHONEDOCTEUR . '</h6>
						<hr style="border: 0.5px solid rgb(0, 230, 0);">
						<h6>Adresse mail : ' . $resultat->MAILDOCTEUR . '</h6>
						<hr style="border: 0.5px solid rgb(0, 230, 0);">
						<h6>Clinique : ' . $resultat->CLINIQUEDOCTEUR . '</h6>
						<hr style="border: 0.5px solid rgb(0, 230, 0);">
						<h6>Adresse clinique : ' . $resultat->ADRESSECLINIQUEDOCTEUR . '</h6>
						<hr style="border: 0.5px solid rgb(0, 230, 0);">
						<h6>Province: ' . $provinceDocteur->NOMPROVINCE . '- Région: ' . $regionDocteur->NOMREGION . ' - District: ' . $districtDocteur->NOMDISTRICT . ' - Communes: ' . $communeDocteur->NOMCOMMUNE . '
						</h6>
					</div>
				</div>
			</div>
			<div class="modal_docteur_text">
				<p>' . $resultat->SPECIALISEDOCTEUR . '.</p>
			</div>
					';

				echo $card;
			}
		}
	}
	// FIN


	// AFFICHE PHARMACIE 
	function affichePharmacie()
	{
		if (isset($_POST['selectPharmacie'])) {
			$rows = $this->Patient_model->selectPharmacie();
			foreach ($rows->result() as $resultat) {
				$card = '
				<div class="col-12 col-sm-6 col-md-3 col-lg-3 p-2 d-flex justify-content-center">
				<div class="card_pharmacie" style="width: 14.5rem;">
					<div class="card_image">
						<img src="' . base_url() . 'upload/pharmacie/' . $resultat->LOGOPHAMACIE . '" class="card-img-top" alt="...">
					</div>
					<div class="card_pharmacie_content">
						<div class="description_pharmacie">
							<h4 class="text-center">Pharmacie ' . $resultat->NOMPHARMACIE . '</h4>
							<h6 class="text-center type_pharmacie"><i class="fa fa-medkit"></i> ' . $resultat->TYPEPHARMACIE . '</h6>
						</div>
						<h6 class="mt-2"><i class="fa fa-calendar"></i> ' . $resultat->JOUROUVERTUREPHARMACIE . '</h6>
						<h6> <i class="fa fa-clock-o"></i> ' . $resultat->HEUREOUVERTUREPHARMACIE . '</h6>
						<h6> <i class="fa fa-map-marker"></i> ' . $resultat->ADRESSEPHARMACIE . '</h6>
						<div class="col d-flex justify-content-center">
							<a href="' . base_url() . 'patient/Patient_controlleur/pharmacie/' . $resultat->IDPHARMACIE . '">Suivre</a>
						</div>
					</div>
				</div>
			</div>
				';

				echo $card;
			}
		}
	}
	// FIN 

	// SELECT PROVINCE PHARMACIE 
	function selectProvincePharmacie()
	{
		if (isset($_POST['selectPharmacie'])) {
			$rows = $this->Patient_model->selectProvincePharmacie($_POST['id']);
			foreach ($rows->result() as $resultat) {
				$card = '
				<div class="col-12 col-sm-6 col-md-3 col-lg-3 p-2 d-flex justify-content-center">
				<div class="card_pharmacie" style="width: 14.5rem;">
					<div class="card_image">
						<img src="' . base_url() . 'upload/pharmacie/' . $resultat->LOGOPHAMACIE . '" class="card-img-top" alt="...">
					</div>
					<div class="card_pharmacie_content">
						<div class="description_pharmacie">
							<h4 class="text-center">Pharmacie ' . $resultat->NOMPHARMACIE . '</h4>
							<h6 class="text-center type_pharmacie"><i class="fa fa-medkit"></i> ' . $resultat->TYPEPHARMACIE . '</h6>
						</div>
						<h6 class="mt-2"><i class="fa fa-calendar"></i> ' . $resultat->JOUROUVERTUREPHARMACIE . '</h6>
						<h6> <i class="fa fa-clock-o"></i> ' . $resultat->HEUREOUVERTUREPHARMACIE . '</h6>
						<h6> <i class="fa fa-map-marker"></i> ' . $resultat->ADRESSEPHARMACIE . '</h6>
						<div class="col d-flex justify-content-center">
						<a href="' . base_url() . 'patient/Patient_controlleur/pharmacie/' . $resultat->IDPHARMACIE . '">Suivre</a>
						</div>
					</div>
				</div>
			</div>
				';

				echo $card;
			}
		}
	}
	// FIN


	// SELECT REGION PHARMACIE
	function selectRegionPharmacie()
	{
		if (isset($_POST['selectPharmacie'])) {
			$rows = $this->Patient_model->selectRegionPharmacie($_POST['id']);
			foreach ($rows->result() as $resultat) {
				$card = '
				<div class="col-12 col-sm-6 col-md-3 col-lg-3 p-2 d-flex justify-content-center">
				<div class="card_pharmacie" style="width: 14.5rem;">
					<div class="card_image">
						<img src="' . base_url() . 'upload/pharmacie/' . $resultat->LOGOPHAMACIE . '" class="card-img-top" alt="...">
					</div>
					<div class="card_pharmacie_content">
						<div class="description_pharmacie">
							<h4 class="text-center">Pharmacie ' . $resultat->NOMPHARMACIE . '</h4>
							<h6 class="text-center type_pharmacie"><i class="fa fa-medkit"></i> ' . $resultat->TYPEPHARMACIE . '</h6>
						</div>
						<h6 class="mt-2"><i class="fa fa-calendar"></i> ' . $resultat->JOUROUVERTUREPHARMACIE . '</h6>
						<h6> <i class="fa fa-clock-o"></i> ' . $resultat->HEUREOUVERTUREPHARMACIE . '</h6>
						<h6> <i class="fa fa-map-marker"></i> ' . $resultat->ADRESSEPHARMACIE . '</h6>
						<div class="col d-flex justify-content-center">
						<a href="' . base_url() . 'patient/Patient_controlleur/pharmacie/' . $resultat->IDPHARMACIE . '">Suivre</a>
						</div>
					</div>
				</div>
			</div>
					';

				echo $card;
			}
		}
	}
	// FIN 



	// SELECT DISTRICT PHARMACIE
	function selectDistrictPharmacie()
	{
		if (isset($_POST['selectPharmacie'])) {
			$rows = $this->Patient_model->selectDistrictPharmacie($_POST['id']);
			foreach ($rows->result() as $resultat) {
				$card = '
				<div class="col-12 col-sm-6 col-md-3 col-lg-3 p-2 d-flex justify-content-center">
				<div class="card_pharmacie" style="width: 14.5rem;">
					<div class="card_image">
						<img src="' . base_url() . 'upload/pharmacie/' . $resultat->LOGOPHAMACIE . '" class="card-img-top" alt="...">
					</div>
					<div class="card_pharmacie_content">
						<div class="description_pharmacie">
							<h4 class="text-center">Pharmacie ' . $resultat->NOMPHARMACIE . '</h4>
							<h6 class="text-center type_pharmacie"><i class="fa fa-medkit"></i> ' . $resultat->TYPEPHARMACIE . '</h6>
						</div>
						<h6 class="mt-2"><i class="fa fa-calendar"></i> ' . $resultat->JOUROUVERTUREPHARMACIE . '</h6>
						<h6> <i class="fa fa-clock-o"></i> ' . $resultat->HEUREOUVERTUREPHARMACIE . '</h6>
						<h6> <i class="fa fa-map-marker"></i> ' . $resultat->ADRESSEPHARMACIE . '</h6>
						<div class="col d-flex justify-content-center">
						<a href="' . base_url() . 'patient/Patient_controlleur/pharmacie/' . $resultat->IDPHARMACIE . '">Suivre</a>
						</div>
					</div>
				</div>
			</div>
						';

				echo $card;
			}
		}
	}
	// FIN


	// SELECT COMMUNE PHARMACIE
	function selectCommunePharmacie()
	{
		if (isset($_POST['selectPharmacie'])) {
			$rows = $this->Patient_model->selectCommunePharmacie($_POST['id']);
			foreach ($rows->result() as $resultat) {
				$card = '
				<div class="col-12 col-sm-6 col-md-3 col-lg-3 p-2 d-flex justify-content-center">
				<div class="card_pharmacie" style="width: 14.5rem;">
					<div class="card_image">
						<img src="' . base_url() . 'upload/pharmacie/' . $resultat->LOGOPHAMACIE . '" class="card-img-top" alt="...">
					</div>
					<div class="card_pharmacie_content">
						<div class="description_pharmacie">
							<h4 class="text-center">Pharmacie ' . $resultat->NOMPHARMACIE . '</h4>
							<h6 class="text-center type_pharmacie"><i class="fa fa-medkit"></i> ' . $resultat->TYPEPHARMACIE . '</h6>
						</div>
						<h6 class="mt-2"><i class="fa fa-calendar"></i> ' . $resultat->JOUROUVERTUREPHARMACIE . '</h6>
						<h6> <i class="fa fa-clock-o"></i> ' . $resultat->HEUREOUVERTUREPHARMACIE . '</h6>
						<h6> <i class="fa fa-map-marker"></i> ' . $resultat->ADRESSEPHARMACIE . '</h6>
						<div class="col d-flex justify-content-center">
						<a href="' . base_url() . 'patient/Patient_controlleur/pharmacie/' . $resultat->IDPHARMACIE . '">Suivre</a>
						</div>
					</div>
				</div>
			</div>
					';

				echo $card;
			}
		}
	}

	// FIN


	// PHARMACIE

	function pharmacie($id)
	{
		if ($_SESSION['PATIENT_LOGGED'] == FALSE) {
			$this->session->set_flashdata('error', "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Connecter s'il te plait !</strong></div>");
			redirect('patient/Patient_controlleur/loginPatient');
		}
		$rows = $this->Patient_model->pharmacie($id);
		foreach ($rows->result() as $resultat) {
			$idPharmacie = $resultat->IDPHARMACIE;
			$nomPharmacie = $resultat->NOMPHARMACIE;
			$adressePharmacie = $resultat->ADRESSEPHARMACIE;
			$telephonePharmacie = $resultat->TELEPHONEPHARMACIE;
			$mailPharmacie = $resultat->MAILPHARMACIE;
			$logoPharmacie = $resultat->LOGOPHAMACIE;
			$typePharmacie = $resultat->TYPEPHARMACIE;
			$jourPharmacie = $resultat->JOUROUVERTUREPHARMACIE;
			$heurePharmacie = $resultat->HEUREOUVERTUREPHARMACIE;
			$provincePharmacie = $this->Patient_model->nomProvincePharmacie($resultat->PROVINCEPHARMACIE);
			$regionPharmacie = $this->Patient_model->nomRegionPharmacie($resultat->REGIONPHARMACIE);
			$districtPharmacie = $this->Patient_model->nomDistrictPharmacie($resultat->DISTRICTPHARMACIE);
			$communePharmacie = $this->Patient_model->nomCommunePharmacie($resultat->COMMUNEPHARMACIE);
		}
		$this->load->view('patient/pharmacie', array(
			'idPharmacie' => $idPharmacie,
			'nomPharmacie' => $nomPharmacie,
			'adressePharmacie' => $adressePharmacie,
			'telephonePharmacie' => $telephonePharmacie,
			'mailPharmacie' => $mailPharmacie,
			'logoPharmacie' => $logoPharmacie,
			'typePharmacie' => $typePharmacie,
			'jourPharmacie' => $jourPharmacie,
			'heurePharmacie' => $heurePharmacie,
			'provincePharmacie' => $provincePharmacie->NOMPROVINCE,
			'regionPharmacie' => $regionPharmacie->NOMREGION,
			'districtPharmacie' => $districtPharmacie->NOMDISTRICT,
			'communePharmacie' => $communePharmacie->NOMCOMMUNE
		));
	}

	// FIN

	// VERS LOGIN
	function loginPatient()
	{
		$rows = $this->Patient_model->selectProvince();
		$this->load->view('patient/login', array('province' => $rows));
	}
	// FIN

	// AFFICHE MEDICAMENT
	function afficheMedicament()
	{
		if (isset($_POST['medicament'])) {
			$query = '';
			$query = $this->input->post('query');
			$data = $this->Patient_model->medicament($query);
			foreach ($data->result() as $row) {
				$pharmacie = $this->Patient_model->onePharmacie($row->IDPHARMACIE);
				$province = $this->Patient_model->oneProvince($pharmacie->PROVINCEPHARMACIE);
				$card = '
					<div class="col-12 col-sm-6 col-md-3 col-lg-3 d-flex justify-content-center">
					<div class="card" style="width: 14rem;">
					  <div class="card_image">
						 <img src="' . base_url() . 'upload/pharmacie/medicament/' . $row->PHOTOMEDICAMENT . '" class="card-img-top" alt="" />
					  </div>
					  <div class="card-body">
						 <h5 class="text-center">' . $row->NOMMEDICAMENT . '</h5>

						 <div class="pharmacie_medicament">
						 <h6 class="pharmacie_contenue text-center">Pharmacie ' . $pharmacie->NOMPHARMACIE . '</h6>
						 <h6 class="pharmacie_province text-center">' . $province->NOMPROVINCE . '</h6>
						 </div>
						 <div class="btn_card">
							 <button class="btn btn-sm btn_voir" data-toggle="modal" id="getMedicament" value="' . $row->IDMEDICAMENT . '" data-target="#modal_medicament"><i class="fa fa-eye"></i></button>
							 <button class="btn btn-sm btn_suivre"><a href="' . base_url() . 'patient/Patient_controlleur/pharmacie/' . $pharmacie->IDPHARMACIE . '">Suivre <i class="fa fa-arrow-right"></i></a></button>
						 </div>
					  </div>
					</div>
				  </div>
				   ';
				echo $card;
			}
		}
	}
	// FIN

	// SELECT MEDICAMENT
	function selectMedicament()
	{
		if (isset($_POST['medicament'])) {
			$idMedicament = $_POST['idMedicament'];
			$medicament = $this->Patient_model->selectMedicament($idMedicament);
			$pharmacie = $this->Patient_model->onePharmacie($medicament->IDPHARMACIE);
			$province = $this->Patient_model->oneProvince($pharmacie->PROVINCEPHARMACIE);
			$region = $this->Patient_model->oneRegion($pharmacie->REGIONPHARMACIE);
			$district = $this->Patient_model->oneDistrict($pharmacie->DISTRICTPHARMACIE);
			$commune = $this->Patient_model->oneCommune($pharmacie->COMMUNEPHARMACIE);
			$card = '
					<div class="row">
				    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
					   <div class="image_medicament">
					   <img src="' . base_url() . 'upload/pharmacie/medicament/' . $medicament->PHOTOMEDICAMENT . '"  alt="" />
					   </div>
					</div>
					<div class="col-12 col-sm-6 col-md-6 col-lg-6">
					   <div class="description_medicament">
					       <h5 class="text-center nomMedicament">' . $medicament->NOMMEDICAMENT . '</h5>
						   <p>' . $medicament->ARTICLEMEDICAMENT . '</p>
						   <h6>Prix : ' . $medicament->PRIXMEDICAMENT . ' Ar</h6>
						   <h6>Quantitées : ' . $medicament->QUANTITEMEDICAMENT . '</h6>
						   <h6 class="nom_pharmacie text-center">Pharmacie ' . $pharmacie->NOMPHARMACIE . '</h6>
						   <h6>Province : ' . $province->NOMPROVINCE . ', Région: ' . $region->NOMREGION . ', District: ' . $district->NOMDISTRICT . ', Commune : ' . $commune->NOMCOMMUNE . '</h6>
					   </div>
					</div>
				</div>
					';



			echo $card;
		}
	}
	// FIN


	// AFFICHE CLINIQUE
	function afficheClinique()
	{
		if (isset($_POST['selectClinique'])) {
			$rows = $this->Patient_model->selectClinique();
			foreach ($rows->result() as $resultat) {
				$card = '
				<div class="col-12 col-sm-6 col-md-3 col-lg-3 p-2 d-flex justify-content-center">
                <div class="card_clinique" style="width: 14.5rem;">
                  <div class="card_clinique_image">
                    <img src="' . base_url() . 'upload/clinique/' . $resultat->LOGOCLINIQUE . '" alt="">
                  </div>
                  <div class="card_clinique_content">
                    <div class="description_clinique">
                      <h4 class="text-center">' . $resultat->NOMCLINIQUE . '</h4>
                    </div>
                    <h6><i class="fa fa-calendar"></i> ' . $resultat->JOUROUVERTURECLINIQUE . '</h6>
                    <h6> <i class="fa fa-clock-o"></i> ' . $resultat->HEUREOUVERTURECLINIQUE . '</h6>
                    <h6> <i class="fa fa-map-marker"></i> ' . $resultat->ADRESSECLINIQUE . '</h6>
                    <div class="col d-flex justify-content-center">
					<a href="' . base_url() . 'patient/Patient_controlleur/clinique/' . $resultat->IDCLINIQUE . '">Suivre</a>
                    </div>
                  </div>
                </div>
              </div>
					';

				echo $card;
			}
		}
	}
	// FIN

	// SELECT PROVINCE CLINIQUE
	function selectProvinceClinique()
	{
		if (isset($_POST['selectClinique'])) {
			$rows = $this->Patient_model->selectProvinceClinique($_POST['id']);
			foreach ($rows->result() as $resultat) {
				$card = '
					<div class="col-12 col-sm-6 col-md-3 col-lg-3 p-2 d-flex justify-content-center">
					<div class="card_clinique" style="width: 14.5rem;">
					  <div class="card_clinique_image">
						<img src="' . base_url() . 'upload/clinique/' . $resultat->LOGOCLINIQUE . '" alt="">
					  </div>
					  <div class="card_clinique_content">
						<div class="description_clinique">
						  <h4 class="text-center">' . $resultat->NOMCLINIQUE . '</h4>
						</div>
						<h6><i class="fa fa-calendar"></i> ' . $resultat->JOUROUVERTURECLINIQUE . '</h6>
						<h6> <i class="fa fa-clock-o"></i> ' . $resultat->HEUREOUVERTURECLINIQUE . '</h6>
						<h6> <i class="fa fa-map-marker"></i> ' . $resultat->ADRESSECLINIQUE . '</h6>
						<div class="col d-flex justify-content-center">
						<a href="' . base_url() . 'patient/Patient_controlleur/clinique/' . $resultat->IDCLINIQUE . '">Suivre</a>
						</div>
					  </div>
					</div>
				  </div>
					';

				echo $card;
			}
		}
	}
	// FIN


	// SELECT REGION CLINIQUE
	function selectRegionClinique()
	{
		if (isset($_POST['selectClinique'])) {
			$rows = $this->Patient_model->selectRegionClinique($_POST['id']);
			foreach ($rows->result() as $resultat) {
				$card = '
					<div class="col-12 col-sm-6 col-md-3 col-lg-3 p-2 d-flex justify-content-center">
					<div class="card_clinique" style="width: 14.5rem;">
					  <div class="card_clinique_image">
						<img src="' . base_url() . 'upload/clinique/' . $resultat->LOGOCLINIQUE . '" alt="">
					  </div>
					  <div class="card_clinique_content">
						<div class="description_clinique">
						  <h4 class="text-center">' . $resultat->NOMCLINIQUE . '</h4>
						</div>
						<h6><i class="fa fa-calendar"></i> ' . $resultat->JOUROUVERTURECLINIQUE . '</h6>
						<h6> <i class="fa fa-clock-o"></i> ' . $resultat->HEUREOUVERTURECLINIQUE . '</h6>
						<h6> <i class="fa fa-map-marker"></i> ' . $resultat->ADRESSECLINIQUE . '</h6>
						<div class="col d-flex justify-content-center">
						<a href="' . base_url() . 'patient/Patient_controlleur/clinique/' . $resultat->IDCLINIQUE . '">Suivre</a>
						</div>
					  </div>
					</div>
				  </div>
						';

				echo $card;
			}
		}
	}
	// FIN

	// SELECT REGION CLINIQUE
	function selectDistrictClinique()
	{
		if (isset($_POST['selectClinique'])) {
			$rows = $this->Patient_model->selectDistrictClinique($_POST['id']);
			foreach ($rows->result() as $resultat) {
				$card = '
					<div class="col-12 col-sm-6 col-md-3 col-lg-3 p-2 d-flex justify-content-center">
					<div class="card_clinique" style="width: 14.5rem;">
					  <div class="card_clinique_image">
						<img src="' . base_url() . 'upload/clinique/' . $resultat->LOGOCLINIQUE . '" alt="">
					  </div>
					  <div class="card_clinique_content">
						<div class="description_clinique">
						  <h4 class="text-center">' . $resultat->NOMCLINIQUE . '</h4>
						</div>
						<h6><i class="fa fa-calendar"></i> ' . $resultat->JOUROUVERTURECLINIQUE . '</h6>
						<h6> <i class="fa fa-clock-o"></i> ' . $resultat->HEUREOUVERTURECLINIQUE . '</h6>
						<h6> <i class="fa fa-map-marker"></i> ' . $resultat->ADRESSECLINIQUE . '</h6>
						<div class="col d-flex justify-content-center">
						<a href="' . base_url() . 'patient/Patient_controlleur/clinique/' . $resultat->IDCLINIQUE . '">Suivre</a>
						</div>
					  </div>
					</div>
				  </div>
							';

				echo $card;
			}
		}
	}
	// FIN

	// SELECT COMMUNE CLINIQUE
	function selectCommuneClinique()
	{
		if (isset($_POST['selectClinique'])) {
			$rows = $this->Patient_model->selectCommuneClinique($_POST['id']);
			foreach ($rows->result() as $resultat) {
				$card = '
					<div class="col-12 col-sm-6 col-md-3 col-lg-3 p-2 d-flex justify-content-center">
					<div class="card_clinique" style="width: 14.5rem;">
					  <div class="card_clinique_image">
						<img src="' . base_url() . 'upload/clinique/' . $resultat->LOGOCLINIQUE . '" alt="">
					  </div>
					  <div class="card_clinique_content">
						<div class="description_clinique">
						  <h4 class="text-center">' . $resultat->NOMCLINIQUE . '</h4>
						</div>
						<h6><i class="fa fa-calendar"></i> ' . $resultat->JOUROUVERTURECLINIQUE . '</h6>
						<h6> <i class="fa fa-clock-o"></i> ' . $resultat->HEUREOUVERTURECLINIQUE . '</h6>
						<h6> <i class="fa fa-map-marker"></i> ' . $resultat->ADRESSECLINIQUE . '</h6>
						<div class="col d-flex justify-content-center">
						<a href="' . base_url() . 'patient/Patient_controlleur/clinique/' . $resultat->IDCLINIQUE . '">Suivre</a>
						</div>
					  </div>
					</div>
				  </div>
						';

				echo $card;
			}
		}
	}
	// FIN


	// CLINIQUE

	function clinique($id)
	{
		if ($_SESSION['PATIENT_LOGGED'] == FALSE) {
			$this->session->set_flashdata('error', "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Connecter s'il te plait !</strong></div>");
			redirect('patient/Patient_controlleur/loginPatient');
		}
		$rows = $this->Patient_model->clinique($id);
		foreach ($rows->result() as $resultat) {
			$idClinique = $resultat->IDCLINIQUE;
			$nomClinique = $resultat->NOMCLINIQUE;
			$adresseClinique = $resultat->ADRESSECLINIQUE;
			$telephoneClinique = $resultat->TELEPHONECLINIQUE;
			$mailClinique = $resultat->MAILCLINIQUE;
			$specialiseClinique = $resultat->SPECIALISECLINIQUE;
			$logoClinique = $resultat->LOGOCLINIQUE;
			$jourClinique = $resultat->JOUROUVERTURECLINIQUE;
			$heureClinique = $resultat->HEUREOUVERTURECLINIQUE;
			$provinceClinique = $this->Patient_model->nomProvinceClinique($resultat->PROVINCECLINIQUE);
			$regionClinique = $this->Patient_model->nomRegionClinique($resultat->REGIONCLINIQUE);
			$districtClinique = $this->Patient_model->nomDistrictClinique($resultat->DISTRICTCLINIQUE);
			$communeClinique = $this->Patient_model->nomCommuneClinique($resultat->COMMUNECLINIQUE);
		}
		$this->load->view('patient/clinique', array(
			'idClinique' => $idClinique,
			'nomClinique' => $nomClinique,
			'adresseClinique' => $adresseClinique,
			'telephoneClinique' => $telephoneClinique,
			'mailClinique' => $mailClinique,
			'specialiseClinique' => $specialiseClinique,
			'logoClinique' => $logoClinique,
			'jourClinique' => $jourClinique,
			'heureClinique' => $heureClinique,
			'provinceClinique' => $provinceClinique->NOMPROVINCE,
			'regionClinique' => $regionClinique->NOMREGION,
			'districtClinique' => $districtClinique->NOMDISTRICT,
			'communeClinique' => $communeClinique->NOMCOMMUNE
		));
	}

	// FIN


	// LOGOUT PATIENT
	function logout()
	{
		$donner = array(
			"IDPATIENT" => $_SESSION['IDPATIENT'],
			"STATUSPATIENT" => "inactif",

		);
		$this->LoginPatient_model->modifierPatient($donner);
		unset($_SESSION);
		session_destroy();
		redirect('patient/Login_controlleur/loginPatient');
	}
	// FIN



}

<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pharmacie_controlleur extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('patient/Pharmacie_model');
	}
	// DASBOARD PATIENT
	function dasboard()
	{
		if ($_SESSION['PATIENT_LOGGED'] == FALSE) {
			$this->session->set_flashdata('error', "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Connecter s'il te plait !</strong></div>");
			redirect('patient/Pharmacie_controlleur/loginPatient');
		}

		$rows = $this->Pharmacie_model->selectProvince();
		$this->load->view('patient/dasboard', array('province' => $rows));
	}
	// FIN

	// VERS LOGIN
	function loginPatient()
	{
		$rows = $this->Pharmacie_model->selectProvince();
		$this->load->view('patient/login', array('province' => $rows));
	}
	// FIN

	// AFFICHE PAYEMENT

	function affichePayement()
	{
		if (isset($_POST['affichePayementPharmacie'])) {
			$idPharmacie = $_POST['idPharmacie'];
			$rows = $this->Pharmacie_model->selectPayement($idPharmacie);
			foreach ($rows->result() as $row) {
				if ($row->OPERATEURPAYEMENT == "Mvola") {
					$output = '
					<div class="card">
					<div class="card-header" id="headingOne" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						<h2 class="mb-0 ">
							<img src="' . base_url() . 'assets/image/telma.png"> Mvola
						</h2>
					</div>
					<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
						<div class="card-body">
							<h6>Au nom de : ' . $row->APARTENANCEPAYEMENT . '</h6>
							<h6>Numéro : ' . $row->NUMERO . '</h6>
						</div>
					</div>
				</div>
				  ';
				} elseif ($row->OPERATEURPAYEMENT == "Airtel Money") {
					$output = '
					<div class="card">
					<div class="card-header collapsed" id="headingThree" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
						<h2 class="mb-0 ">
							<img src="' . base_url() . 'assets/image/airtel.jpg"> AirtelMoney
						</h2>
					</div>
					<div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordionExample">
						<div class="card-body">
							<h6>Au nom de : ' . $row->APARTENANCEPAYEMENT . '</h6>
							<h6>Numéro : ' . $row->NUMERO . '</h6>
						</div>
					</div>
				</div>
				  ';
				} else {
					$output = '
					<div class="card">
					<div class="card-header collapsed" id="headingTwo" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
						<h2 class="mb-0 ">
							<img src="' . base_url() . 'assets/image/orange.png"> OrangeMoney
						</h2>
					</div>
					<div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
						<div class="card-body">
							<h6>Au nom de : ' . $row->APARTENANCEPAYEMENT . '</h6>
							<h6>Numéro : ' . $row->NUMERO . '</h6>
						</div>
					</div>
				</div>
				  ';
				}
				echo $output;
			}
		}
	}

	// FIN


	// AFFICHE MEDICAMENT
	function afficheMedicament()
	{
		if (isset($_POST['medicament'])) {
			$query = '';
			$query = $this->input->post('query');
			$idPharmacie = $this->input->post('idPharmacie');
			$data = $this->Pharmacie_model->medicament($query, $idPharmacie);
			foreach ($data->result() as $row) {
				$card = '
			   
			   <div class="col-12 col-sm-6 col-md-6 col-lg-4">

			   <div class="card border-0 text-center">
				   <span class="position-absolute px-2 py-1 text-white quantite">' . $row->QUANTITEMEDICAMENT . '</span>
				   <img src="' . base_url() . 'upload/pharmacie/medicament/' . $row->PHOTOMEDICAMENT . '" class="img-fluid" alt="">
				   <div class="card-body">
					   <h5 class="card-title text-center font-weight-bold">
						   ' . $row->NOMMEDICAMENT . '
					   </h5>
					   <div class="article mb-2">
						   ' . $row->QUANTITEMEDICAMENT . '
					   </div>
					   <div class="card-text d-flex justify-content-center mt-1 mb-1">
						   <span class="prix_medicament position-relative">
							   <div class="h6 color_prix font-weight-bold">' . $row->PRIXMEDICAMENT . '.00 Ar</div>
						   </span>
					   </div>
					   <div class="button d-flex justify-content-between">
						   <button class="btn1" data-toggle="modal" data-target="#article_medicament" id="getMedicament" value="' . $row->IDMEDICAMENT . '">
							   <i class="fa fa-eye"></i>
							   <span>Détails</span>
						   </button>
						   <button class="btn2" id="ajoutePanier" value="' . $row->IDMEDICAMENT . '">
							   <i class="fa fa-plus-circle"></i>
							   <span>Panier</span>
						   </button>
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

	// SELECT ONE MEDICAMENT

	function oneMedicament()
	{
		if (isset($_POST['medicament'])) {
			$idPharmacie = $_POST['idPharmacie'];
			$idMedicament = $_POST['idMedicament'];
			$rows = $this->Pharmacie_model->oneMedicament($idMedicament, $idPharmacie);
			foreach ($rows->result() as $row) {
				$card = '
			<div class="row">
			<div class="col-12 col-sm-6 col-md-6 col-lg-6">
				<div class="img_article_medicament">
					<img src="' . base_url() . 'upload/pharmacie/medicament/' . $row->PHOTOMEDICAMENT . '" alt="image">
				</div>
			</div>
			<div class="col-12 col-sm-6 col-md-6 col-lg-6">
				<div class="description_article_medicament">
					<div class="articule_medicament_titre">
						<h6 class="text-center">' . $row->NOMMEDICAMENT . '</h6>
					</div>
					<div class="article_medicament_content">
						<p>' . $row->ARTICLEMEDICAMENT . '</p>
						<h6>Quantité : ' . $row->QUANTITEMEDICAMENT . '</h6>
						<span class="prix">Prix : ' . $row->PRIXMEDICAMENT . '.00 Ar</span>
						<div class="col d-flex justify-content-center">
							<button type="button" class="btn" value="' . $row->IDMEDICAMENT . '" id="ajoutePanier2">
								<i class="fa fa-plus-circle"></i>
								<span>Panier</span>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
			';
			}
			echo $card;
		}
	}

	// FIN

	// AJOUTE PANIER
	function ajoutePanier()
	{
		if (isset($_POST['ajoutePanier'])) {
			$idPharmacie = $_POST['idPharmacie'];
			$idMedicament = $_POST['idMedicament'];
			$idPatient = $_POST['idPatient'];
			if ($this->Pharmacie_model->verifieMedicament($idPatient, $idMedicament, $idPharmacie)) {
				$data = "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Médicament éxiste dans le panier!</strong></div>";
			} else {
				$rows = $this->Pharmacie_model->selectMedicament($idMedicament, $idPharmacie);
				$donner = array(
					'IDPATIENT' => $idPatient,
					'IDMEDICAMENT' => $rows->IDMEDICAMENT,
					'NOMMEDICAMENT' => $rows->NOMMEDICAMENT,
					'PRIXMEDICAMENT' => $rows->PRIXMEDICAMENT,
					'QUANTITEMEDICAMENT' => $rows->QUANTITEMEDICAMENT,
					'PHOTOMEDICAMENT' => $rows->PHOTOMEDICAMENT,
					'NOMBREMEDICAMENT' => 1,
					'IDPHARMACIE' => $idPharmacie,
				);
				$this->Pharmacie_model->ajoutePanier($donner);
				$data = "<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Médicament ajouter au panier!</strong></div>";
			}
			echo $data;
		}
	}
	// FIN AJOUTE PANIER


	// AFFICHE PANIER
	function affichePanier()
	{
		if (isset($_POST['affichePanierPharmacie'])) {
			$idPharmacie = $_POST['idPharmacie'];
			$idPatient = $_POST['idPatient'];
			$rows = $this->Pharmacie_model->selectPanier($idPatient, $idPharmacie);
			$output = "";
			$total = 0;
			$grand_total = 0;
			$medicament = '';
			if ($rows->num_rows() > 0) {
				foreach ($rows->result() as $row) {
					$total = $row->PRIXMEDICAMENT * $row->NOMBREMEDICAMENT;
					$output .= '
			 <div class="panier_items">
			 <div class="titre_panier_items d-flex justify-content-between">
			   <h6>' . $row->NOMMEDICAMENT . '</h6>
			   <button class="btn btn_suprimer" value="' . $row->IDPANIER . '">X</button>
			 </div>
			 <div class="description_panier_items">
			   <img src="' . base_url() . 'upload/pharmacie/medicament/' . $row->PHOTOMEDICAMENT . '" width="65px" height="55px">
			   <div class="sous_description_panier_items">
				 <h6>Quantité : ' . $row->QUANTITEMEDICAMENT . '</h6>
				 <h6>Prix : ' . $row->PRIXMEDICAMENT . '.00 Ar</h6>
			   </div>
			   <div class="prix_panier_items">
				  <input type="number" name="quantité"  class="form-control" id="qtyMedicament" value="' . $row->NOMBREMEDICAMENT . '">
				  <input type="hidden" id="idPanier" value="' . $row->IDPANIER . '">
				 <h6 class="mt-1">' . $total . '.00Ar</h6>
			   </div>
			 </div>
		   </div>
			 ';
					$grand_total += $total;
					$medicament .= $row->NOMMEDICAMENT . '(' . $row->NOMBREMEDICAMENT . ') : ' . $row->PRIXMEDICAMENT . '.00 Ar x ' . $row->NOMBREMEDICAMENT . ' = ' . $total . '.00 Ar,';
				}
				$output .= '
				<input type="hidden" value="' . $grand_total . '" id="GrandTotal">
				<input type="hidden" value="' . $medicament . '" id="medicamentAchat">
			<div class="panier_validations">
			<h6>Prix Total : ' . $grand_total . '.00 Ar</h6>
			<button class="btn btn_validations btn-sm" id="btn_validations" data-toggle="modal" data-target="#modalAchat">Acheter</button>
		  </div>
			';
			} else {
				$output .= '';
			}

			echo $output;
		}
	}
	// FIN

	// SUPRIMER PHARMACIE
	function suprimerPanier()
	{
		if (isset($_POST['suprimerPanier'])) {
			$idPharmacie = $_POST['idPharmacie'];
			$idPatient = $_POST['idPatient'];
			$idPanier = $_POST['idPanier'];
			$this->Pharmacie_model->deletePanier($idPanier, $idPatient, $idPharmacie);
		}
	}
	// FIN

	// AFFICHE COUNT PANIER
	function afficheCountePanier()
	{
		if (isset($_POST['countPanier'])) {
			$idPatient = $_POST['idPatient'];
			$idPharmacie = $_POST['idPharmacie'];
			$count = $this->Pharmacie_model->selectCountPanier($idPatient, $idPharmacie);
			echo $count;
		}
	}
	// FIN

	// MODIFIER NOMBRE MEDICAMENT
	function modifierNombreMedicament()
	{
		if (isset($_POST['nombreMedicament'])) {
			$idPatient = $_POST['idPatient'];
			$idPharmacie = $_POST['idPharmacie'];
			$nombreMedicament = $_POST['quantite'];
			$idPanier = $_POST['idPanier'];
			$donner = array(
				'IDPATIENT' => $idPatient,
				'NOMBREMEDICAMENT' => $nombreMedicament,
				'IDPHARMACIE' => $idPharmacie,
				'IDPANIER' => $idPanier
			);
			$this->Pharmacie_model->modifierNombreMedicament($donner);
		}
	}
	//

	// GET ACHATS
	function getAchat()
	{
		if (isset($_POST['getAchat'])) {
			$idPatient = $_POST['idPatient'];
			$idPharmacie = $_POST['idPharmacie'];
			$rows = $this->Pharmacie_model->getAchats($idPatient, $idPharmacie);
			$total = 0;
			$grand_total = 0;
			$card = '<h6>Votre achats <i class="fa fa-shopping-cart"></i></h6>';
			foreach ($rows->result() as $row) {
				$total = $row->PRIXMEDICAMENT * $row->NOMBREMEDICAMENT;
				$card .= '
					 <h6>' . $row->NOMMEDICAMENT . ' (' . $row->NOMBREMEDICAMENT . ')</h6>
					 ';
				$grand_total += $total;
			}
			$card .= '<h6>Prix Total : ' . $grand_total . '.00 Ar</h6>';

			echo $card;
		}
	}

	// FIN

	// AJOUTE VALIDATION
	function ajouteAchat()
	{
		if (isset($_POST['adresseLivraison'])) {
			$fn = "";
			$config['upload_path'] = './upload/patient/ordonnance';
			$config['allowed_types'] = 'png|jpg|jpeg|pdf|JPEG|PNG|JPG|PDF';
			$config['max_size'] = 5000;
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('ordonnance')) {
				$this->session->set_flashdata('error', "<p class='alert alert-danger'>Sélecter un photo!</p>");
			} else {
				$fd = $this->upload->data();
				$fn = $fd['file_name'];
			}
			$adresseLivraisson = $_POST['adresseLivraison'];
			$medicamentAcheter = $_POST['medicamentAcheter'];
			$prixTotal = $_POST['prixTotal'];
			$IDPHARMACIE = $_POST['IDPHARMACIE'];
			$IDPATIENT = $_POST['IDPATIENT'];

			$donner = array(
				"IDPHARMACIE" => $IDPHARMACIE,
				"IDPATIENT" => $IDPATIENT,
				"MEDICAMENTACHAT" => $medicamentAcheter,
				"TOTALACHAT" => $prixTotal,
				"ORDONANCE" => $fn,
				"ADRESSELIVRAISON" => $adresseLivraisson,
				"STATUSACHAT" => "0"
			);

			$this->Pharmacie_model->insertAchat($donner);

			$this->Pharmacie_model->suprimerPanier($IDPATIENT, $IDPHARMACIE);
		}
	}
	// FIN


	// SELECT ACHAT
	function afficheAchat()
	{
		if (isset($_POST['achat'])) {
			$rows = $this->Pharmacie_model->selectAchat($_POST['idPatient'], $_POST['idPharmacie']);
			$totalPrix = 0;
			foreach ($rows->result() as $row) {
				$totalPrix = $row->TOTALACHAT + $row->FRAISLIVRAISON;
				if ($row->MEDICAMENTACHAT != '' && $row->VALIDATIONACHAT == '') {
					$card = '
				<div class="card-validation">
				   <h5>Merci pour votre achats,attender pour sa validation <i class="fa fa-refresh"></i></h5>
				   <h6>Medicament acheter :</br> ' . $row->MEDICAMENTACHAT . '</h6>
				   <h6>Prix du médicament :</br> ' . $row->TOTALACHAT . '.00 Ar</h6>
				</div>
				';
				} elseif ($row->MEDICAMENTACHAT != '' && $row->VALIDATIONACHAT != '' && $row->VALIDATIONACHAT == 'accepter' && $row->REFERENCEPAYEMENT == '') {
					$card = '
				<div class="card-payement-validation">
				   <h5>Votre achat est valider avec success,passer a la procedure du payement. <i class="fa fa-child"></i></h5>
				   <h6>Frais de Livraison : ' . $row->FRAISLIVRAISON . '.00 AR</h6>
				   <h6>Prix Total : Prix Médicament + Frais de livraison : ' . $totalPrix . '.00 AR</h6>
				   <div class="d-flex justify-content-center">
				   <i class="fa fa-money"></i>
				   </div>
                   <div class="d-flex justify-content-center">
				     <button class="btn btn-success btn-sm" id="ajoutePayement" value="' . $row->IDACHAT . '" data-toggle="modal" data-target="#ajouteReference">Payements</button>
				   </div>
				</div>
				';
				} elseif ($row->MEDICAMENTACHAT != '' && $row->VALIDATIONACHAT != '' && $row->VALIDATIONACHAT == 'refuser' && $row->REFERENCEPAYEMENT == '') {
					$card = '
				<div class="card-payement-nonValidation">
				   <div classs="d-flex justify-content-end">
				    <button class="btn btn-info" id="suprimerAchat"value="' . $row->IDACHAT . '">X</button>
				   </div>
				   <h5>' . $row->REPONSENONVALIDER . '</h5>
				   <div class="d-flex justify-content-center">
				   <i class="fa fa-warning"></i>
				   </div>
				</div>
				';
				} elseif ($row->MEDICAMENTACHAT != '' && $row->VALIDATIONACHAT != '' && $row->VALIDATIONACHAT == 'accepter' && $row->REFERENCEPAYEMENT != '' && $row->VALIDATIONREFERENCE == '') {
					$card = '
				<div class="card-validationReference">
				   <h5>Merci pour votre payements,attender pour sa validation. <i class="fa fa-thumbs-o-up"></i></h5>
				   <div class="d-flex justify-content-center">
				   <i class="fa fa-money"></i>
				   </div>
				</div>
				';
				} elseif ($row->MEDICAMENTACHAT != '' && $row->VALIDATIONACHAT != '' && $row->VALIDATIONACHAT == 'accepter' && $row->REFERENCEPAYEMENT != '' && $row->VALIDATIONREFERENCE != '' && $row->VALIDATIONREFERENCE == 'accepter') {
					$card = '
				<div class="card-validationReferenceAccepter">
				<button class="btn btn-info" id="suprimerAchat"value="' . $row->IDACHAT . '">X</button>
				   <h5>La procedure du payement est effectue avec success.</h5>
				   <h6>' . $row->REPONSEREFERENCEACCEPTER . '</h6>
				   <div class="d-flex justify-content-center">
				    <i class="fa fa-child"></i>
				   </div>
				   <div class="d-flex justify-content-center">
				    
					<a href="' . base_url() . 'patient/Pharmacie_controlleur/download/' . $row->IDACHAT . '">
					<button class="btn btn-success btn-sm" id="telechargerRecue">Télécharger le reçue de votre achats</button>
					</a>
				   </div>
				</div>
				';
				} elseif ($row->MEDICAMENTACHAT != '' && $row->VALIDATIONACHAT != '' && $row->VALIDATIONACHAT == 'accepter' && $row->REFERENCEPAYEMENT != '' && $row->VALIDATIONREFERENCE != '' && $row->VALIDATIONREFERENCE == 'refuser') {
					$card = '
				<div class="card-validationReferenceRefuser">
				 <div class="col d-flex justify-content-end">
				 <button class="btn btn-info" id="suprimerAchat" value="' . $row->IDACHAT . '">X</button>
				 </div>
				   <h5>' . $row->REPONSENONREFERENCE . '</h5>
				   <div class="d-flex justify-content-center">
				   <i class="fa fa-warning"></i>
				   </div>
				</div>
				';
				}

				echo $card;
			}
		}
	}
	// FIN

	// SELECT OPERATEUR
	function afficheOperateur()
	{
		if (isset($_POST['operateurPharmacie'])) {
			$idPharmacie = $_POST['idPharmacie'];
			$rows = $this->Pharmacie_model->selectOperateur($idPharmacie);
			$option = '<option selected value="">Selects opérateurs</option>';
			foreach ($rows->result() as $row) {
				$option .= '<option value="' . $row->OPERATEURPAYEMENT . '">' . $row->OPERATEURPAYEMENT . '</option>';
			}
			echo $option;
		}
	}
	// FIN

	// AJOUTE REFERENCE
	function ajouteReference()
	{
		if (isset($_POST['referencePayement'])) {
			$donner = array(
				'IDACHAT' => $_POST['idAchat'],
				'IDPHARMACIE' => $_POST['IDPHARMACIE'],
				'IDPATIENT' => $_POST['IDPATIENT'],
				'REFERENCEPAYEMENT' => $_POST['referencePayement'],
				'OPERATEURPAYEMENT' => $_POST['operateurReference'],
				'NUMEROENVOYEREFERENCE'=>$_POST['numeroEnvoie'],
			);
			$this->Pharmacie_model->ajouteReference($donner);
		}
	}
	// FIN

	// DOWNLOAD RECUE
	function download($id)
	{
		if (!empty($id)) {
			$this->load->helper('download');
			$recue = $this->Pharmacie_model->afficheRecueAchat($id);
			if ($recue->num_rows() > 0) {
				foreach ($recue->result() as $row) {
					$file = 'upload/patient/recue/' . $row->RECUEACHAT;
					force_download($file, NULL);
				}
			}
		}
	}
	// FIN

	// SUPRIMER ACHAT
	function suprimerAchat(){
		if(isset($_POST['suprimerAchat'])){
          $idAchat=$_POST['idAchat'];
		  $idPharmacie=$_POST['idPharmacie'];
		  $this->Pharmacie_model->suprimerAchat($idAchat,$idPharmacie);
		}
	}
	// FIN

}

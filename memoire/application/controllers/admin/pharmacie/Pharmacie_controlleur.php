<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pharmacie_controlleur extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/pharmacie/Pharmacie_model');
	}
	// LIEN VERS LA PÄGE PASSAGE ADMIN
	function passage()
	{
		$this->load->view('admin/passageAdmin');
	}
	// FIN

	// AJOUTE MEDICAMENT
	function ajouteMedicament()
	{
		if (isset($_POST['ajouteMedicament'])) {
			$fn = "";
			$config['upload_path'] = './upload/pharmacie/medicament';
			$config['allowed_types'] = 'png|jpg|jpeg|JPEG|PNG|JPG';
			$config['max_size'] = 5000;
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('photoMedicament')) {
				$this->session->set_flashdata('error', "<p class='alert alert-danger'>Sélecter un photo!</p>");
			} else {
				$fd = $this->upload->data();
				$fn = $fd['file_name'];
			}
			$nomMedicament = $_POST['nomMedicament'];
			$quantiteMedicament = $_POST['quantiteMedicament'];
			$prixMedicament = $_POST['prixMedicament'];
			$articleMedicament = $_POST['articleMedicament'];
			$idPharmacie = $_POST['idPharmacie'];

			$donner = array(
				"IDPHARMACIE" => $idPharmacie,
				"NOMMEDICAMENT" => $nomMedicament,
				"PRIXMEDICAMENT" => $prixMedicament,
				"QUANTITEMEDICAMENT" => $quantiteMedicament,
				"ARTICLEMEDICAMENT" => $articleMedicament,
				"PHOTOMEDICAMENT" => $fn,
			);
			if ($this->Pharmacie_model->insertMedicament($donner)) {
				$data = "Insertion médicament avec success !!!";
			} else {
				$data = "Insertion médicament  Error !!!";
			}
			echo $data;
		}
	}

	// AJOUTE MEDICAMENT


	// AFFICHE MEDICAMENT

	function afficheMedicament()
	{
		if (isset($_POST['medicament'])) {
			$query = '';
			$query = $this->input->post('query');
			$idPharmacie = $this->input->post('idPharmacie');
			$data = $this->Pharmacie_model->medicament($query, $idPharmacie);
			$output = '
	  <table class="table table-bordered table-striped">
	  <thead class="bg-thead">
		<tr>
		  <th>Photo</th>
		  <th>Nom</th>
		  <th>Quantité</th>
		  <th>Prix</th>
		  <th>Détails</th>
		  <th>Modifier</th>
		  <th>Suprimer</th>
		</tr>
	  </thead>
	  <tbody>
	  ';
			if ($data->num_rows() > 0) {
				foreach ($data->result() as $row) {
					$output .= '
		  <tr>
		  <td align="center"><img src="' . base_url() . 'upload/pharmacie/medicament/' . $row->PHOTOMEDICAMENT . '" width="60px" height="40px" alt=""></td>
		  <td align="center">' . $row->NOMMEDICAMENT . '</td>
		  <td align="center">' . $row->QUANTITEMEDICAMENT . '</td>
		  <td align="center">' . $row->PRIXMEDICAMENT . '.00 Ar</td>
		  <td align="center"><button class="btn btn-sm btn_details" id="details_medicament" value="' . $row->IDMEDICAMENT . '" data-toggle="modal" data-target="#detailsMedicament">Détails</button></td>
		  <td align="center"><button class="btn btn-sm btn_modifier" id="modifier_medicament" value="' . $row->IDMEDICAMENT . '" data-toggle="modal" data-target="#modifierMedicament">Modifier</button>
		  </td>
		  <td align="center"><button class="btn btn-sm btn_suprimer" id="suprimer_medicament" value="' . $row->IDMEDICAMENT . '">Suprimer</button>
		  </td>
		</tr>
		  ';
				}
			} else {
				$output .= '<tr>
			<td colspan="5">Data Not Found</td>
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



	// AFFICHE DETAILS MEDICAMENT
	function detaileMedicament()
	{
		if (isset($_POST['detaileMedicament'])) {
			$idMedicament = $_POST['idMedicament'];
			$data = $this->Pharmacie_model->detaileMedicament($idMedicament);
			if ($data->num_rows() > 0) {
				foreach ($data->result() as $row) {
					$output = '
          <div class="row">
          <div class="col-12 col-sm-6 col-md-6 col-lg-6">
            <div class="image_medicament">
              <img src="' . base_url() . 'upload/pharmacie/medicament/' . $row->PHOTOMEDICAMENT . '" alt="">
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-6 col-lg-6">
            <div class="medicament_description">
              <div class="medicament_nom">
                <h6 class="text-center">' . $row->NOMMEDICAMENT . '</h6>
              </div>
              <div class="medicament_article">
                <p>' . $row->ARTICLEMEDICAMENT . '</p>
              </div>
              <div class="medicament_quantite">
                <h6>' . $row->QUANTITEMEDICAMENT . '</h6>
              </div>
              <div class="medicament_prix">
                <h6 class="text-center">Prix ' . $row->PRIXMEDICAMENT . '.00 Ar</h6>
              </div>
            </div>
          </div>
        </div>
          ';
				}
			} else {
				$output = 'No Data Found';
			}
			echo $output;
		}
	}
	// FIN

	// AFFICHE ONE MEDICAMENT
	function oneMedicament()
	{
		if ($this->input->is_ajax_request()) {
			$idMedicament = $this->input->post('idMedicament');
			if ($post = $this->Pharmacie_model->selectOneMedicament($idMedicament)) {
				$data = array('response' => "success", 'post' => $post);
			} else {
				$data = array('response' => "error", 'message' => 'failed');
			}
		}
		echo json_encode($data);
	}
	// FIN

	// MODIFIER MEDICAMENT

	function modifierMedicament()
	{
		if (isset($_POST['modifierIdMedicament'])) {
			$namePhoto = $_POST['namePhoto'];
			$fn = "";
			$config['upload_path'] = './upload/pharmacie/medicament';
			$config['allowed_types'] = 'png|jpg|jpeg|gif|JPEG|PNG|JPG';
			$config['max_size'] = 10000;
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('modifierPhotoMedicament')) {
				$this->session->set_flashdata('error', "<p class='alert alert-danger'>Selecter un photo!</p>");
				$donner = array(
					"IDMEDICAMENT" => $_POST['modifierIdMedicament'],
					"NOMMEDICAMENT" => $_POST['modifierNomMedicament'],
					"PRIXMEDICAMENT" => $_POST['modifierPrixMedicament'],
					"QUANTITEMEDICAMENT" => $_POST['modifierQuantiteMedicament'],
					"ARTICLEMEDICAMENT" => $_POST['modifierArticleMedicament'],
					"PHOTOMEDICAMENT" => $namePhoto,
				);
				$this->Pharmacie_model->modifierMedicament($donner);
				echo "Modification avec success!!!";
			} else {
				$fd = $this->upload->data();
				$fn = $fd['file_name'];
				$donner = array(
					"IDMEDICAMENT" => $_POST['modifierIdMedicament'],
					"NOMMEDICAMENT" => $_POST['modifierNomMedicament'],
					"PRIXMEDICAMENT" => $_POST['modifierPrixMedicament'],
					"QUANTITEMEDICAMENT" => $_POST['modifierQuantiteMedicament'],
					"ARTICLEMEDICAMENT" => $_POST['modifierArticleMedicament'],
					"PHOTOMEDICAMENT" => $fn,
				);
				$this->Pharmacie_model->modifierMedicament($donner);
				echo "Modification avec success !!!";
			}
		}
	}
	// FIN


	// SUPRIMER MEDICAMENT
	function suprimerMedicament()
	{
		if ($_POST['suprimerMedicament']) {
			$this->Pharmacie_model->suprimerMedicament($_POST['idMedicament']);
			echo "Supression avec success !!!";
		}
	}
	// FIN


	// INSERT PAYEMENT
	function ajoutePayement()
	{
		if (isset($_POST['operateurPharmacie'])) {
			$donner = array(
				'IDPHARMACIE' => $_POST['idPharmacie'],
				'OPERATEURPAYEMENT' => $_POST['operateurPharmacie'],
				'APARTENANCEPAYEMENT' => $_POST['nomAppartenancePharmacie'],
				'NUMERO' => $_POST['numeroPharmacie'],
			);
			if ($this->Pharmacie_model->insertPayement($donner)) {
				echo "Insertion payement avec success !!!";
			} else {
				echo "Insertion payement error !!!";
			}
		}
	}
	// FIN


	// AFFICHE PAYEMENT
	function affichePayement()
	{
		if (isset($_POST['affichePayement'])) {
			$rows = $this->Pharmacie_model->affichePayement($_POST['idPharmacie']);
			$output = '
		   <table class="table table-bordered table-striped">
		   <thead class="bg-thead">
			   <tr>
				   <th>Opérateur</th>
				   <th>Appartennance</th>
				   <th>Numéro</th>
				   <th>Actions</th>
				   <th>Actions</th>
			   </tr>
		   </thead>
		   <tbody>
	 ';
			if ($rows->num_rows() > 0) {
				foreach ($rows->result() as $row) {
					$output .= '
				   <tr>
				   <td align="center">' . $row->OPERATEURPAYEMENT . '</td>
				   <td align="center">' . $row->APARTENANCEPAYEMENT . '</td>
				   <td align="center">' . $row->NUMERO . '</td>
				   <td align="center"><button class="btn btn-success btn-sm" id="getPayement" value="' . $row->IDPAYEMENTPHARMACIE . '" data-toggle="modal" data-target="#modifierPayement">Modifier</button>
				   </td>
				   <td align="center"><button class="btn btn-danger btn-sm" id="suprimerPayement" value="' . $row->IDPAYEMENTPHARMACIE . '">Suprimer</button>
				   </td>
			   </tr>
		 ';
				}
			} else {
				$output .= '<tr>
		   <td colspan="5">Data Not Found</td>
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

	// AFFICHE ONE PAYEMENT
	function onePayement()
	{
		if (isset($_POST['idPayementPharmacie'])) {
			$idPayementPharmacie = $_POST['idPayementPharmacie'];
			if ($post = $this->Pharmacie_model->selectOnePayement($idPayementPharmacie)) {
				$data = array('response' => "success", 'post' => $post);
			} else {
				$data = array('response' => "error", 'message' => 'failed');
			}
			echo json_encode($data);
		}
	}
	// FIN


	// MODIFIER PAYEMENT

	function modifierPayement()
	{
		if (isset($_POST['modifierOperateurPharmacie'])) {
			$donner = array(
				'IDPAYEMENTPHARMACIE' => $_POST['modifierIdPayementPharmacie'],
				'OPERATEURPAYEMENT' => $_POST['modifierOperateurPharmacie'],
				'APARTENANCEPAYEMENT' => $_POST['modifierNomAppartenancePharmacie'],
				'NUMERO' => $_POST['modifierNumeroPharmacie'],
			);
			if ($this->Pharmacie_model->modifierPayement($donner)) {
				echo "Modification payement avec success !!!";
			} else {
				echo "Modification payement error !!!";
			}
		}
	}

	// FIN 

	// SUPRIMER PAYEMENT

	function suprimerPayement()
	{
		if (isset($_POST['suprimerPayement'])) {
			$idPayementPharmacie = $_POST['idPayementPharmacie'];
			if ($this->Pharmacie_model->suprimerPayement($idPayementPharmacie)) {
				echo "Supression evec success !!!";
			} else {
				echo "Supression error !!!";
			}
		}
	}

	// FIN


	// AFFICHE ACHAT
	function afficheAchat()
	{
		if (isset($_POST['afficheAchat'])) {
			$idPharmacie = $_POST['idPharmacie'];
			$rows = $this->Pharmacie_model->selectAchat($idPharmacie);
			$tableau = '';
			$totalPrix = 0;
			foreach ($rows->result() as $row) {
				$totalPrix = $row->TOTALACHAT + $row->FRAISLIVRAISON;
				$patient = $this->Pharmacie_model->selectPatient($row->IDPATIENT);
				if($row->MEDICAMENTACHAT != '' && $row->VALIDATIONACHAT == '' && $row->ORDONANCE ==""){
					$tableau = '
					 <div class="table-responsive">
					 <table class="table table-bordered table-striped">
						 <thead class="bg-thead">
							 <tr>
								 <th>Patients</th>
								 <th>Achats</th>
								 <th>Prix Total</th>
								 <th>Adresse Livraison</th>
								 <th>Actions</th>
							 </tr>
						 </thead>
						 <tbody>
							 <tr>
								 <td align="center">' . $patient->NOMPATIENT . ' ' . $patient->PRENOMPATIENT . '</td>
								 <td align="center">' . $row->MEDICAMENTACHAT . '</td>
								 <td align="center">' . $row->TOTALACHAT . '.00 Ar</td>
								 <td align="center">' . $row->ADRESSELIVRAISON . '</td>
								 <td align="center"><button class="btn btn-sm btn_validation" id="validationAchat" value="' . $row->IDACHAT . '" data-toggle="modal" data-target="#modal_achats">Validations</button>
								 </td>
							 </tr>
						 </tbody>
					 </table>
				 </div>
					 ';
				}
				elseif ($row->MEDICAMENTACHAT != '' && $row->VALIDATIONACHAT == '' && $row->ORDONANCE !="") {
					$tableau = '
					 <div class="table-responsive">
					 <table class="table table-bordered table-striped">
						 <thead class="bg-thead">
							 <tr>
								 <th>Patients</th>
								 <th>Achats</th>
								 <th>Prix Total</th>
								 <th>Ordonnance</th>
								 <th>Adresse Livraison</th>
								 <th>Actions</th>
							 </tr>
						 </thead>
						 <tbody>
							 <tr>
								 <td align="center">' . $patient->NOMPATIENT . ' ' . $patient->PRENOMPATIENT . '</td>
								 <td align="center">' . $row->MEDICAMENTACHAT . '</td>
								 <td align="center">' . $row->TOTALACHAT . '.00 Ar</td>
								 <td align="center"><button class="btn btn-sm btn_ordonnance" value="' . $row->IDACHAT . '" id="voirOrdonnance" data-toggle="modal" data-target="#ordonnance"><i class="fa fa-eye"></i> Voir</button></td>
								 <td align="center">' . $row->ADRESSELIVRAISON . '</td>
								 <td align="center"><button class="btn btn-sm btn_validation" id="validationAchat" value="' . $row->IDACHAT . '" data-toggle="modal" data-target="#modal_achats">Validations</button>
								 </td>
							 </tr>
						 </tbody>
					 </table>
				 </div>
					 ';
				} elseif ($row->MEDICAMENTACHAT != '' && $row->VALIDATIONACHAT != '' && $row->VALIDATIONACHAT == 'accepter' && $row->REFERENCEPAYEMENT == '') {
					$tableau = '
						<div class="table-responsive">
						<table class="table table-bordered table-striped">
							<thead class="bg-thead2">
								<tr>
									<th>Patients</th>
									<th>Achats</th>
									<th>Prix M + Frais</th>
									<th>Opérateur</th>
									<th>Réference</th>
									<th>N° Envoyeur</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td align="center">' . $patient->NOMPATIENT . ' ' . $patient->PRENOMPATIENT . '</td>
									<td align="center">' . $row->MEDICAMENTACHAT . '</td>
									<td align="center">' . $totalPrix . '.00 Ar</td>
									<td align="center">Vide</td>
									<td align="center">vide</td>
									<td align="center">vide</td>
								</tr>
							</tbody>
						</table>
					</div>
						';
				} elseif ($row->MEDICAMENTACHAT != '' && $row->VALIDATIONACHAT != '' && $row->VALIDATIONACHAT == 'accepter' && $row->REFERENCEPAYEMENT != '' && $row->VALIDATIONREFERENCE == '') {
					$tableau = '
						<div class="table-responsive">
						<table class="table table-bordered table-striped">
							<thead class="bg-thead3">
								<tr>
									<th>Patients</th>
									<th>Achats</th>
									<th>Médicaments </br> + </br>Frais</th>
									<th>Opérateur</th>
									<th>Réference</th>
									<th>N° Envoyeur</th>
									<th>Récue d\'achats</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td align="center">' . $patient->NOMPATIENT . ' ' . $patient->PRENOMPATIENT . '</td>
									<td align="center">' . $row->MEDICAMENTACHAT . '</td>
									<td align="center">' . $totalPrix . '.00 Ar</td>
									<td align="center">' . $row->OPERATEURPAYEMENT . '</td>
									<td align="center">' . $row->REFERENCEPAYEMENT . '</td>
									<td align="center">' . $row->NUMEROENVOYEREFERENCE . '</td>
									<td align="center">
									<form action="' . base_url() . 'admin/pharmacie/Pharmacie_controlleur/recue' . '" id="RecueForm" method="post">
									<input type="hidden" value="' . $row->IDACHAT . '" name="idAchat">
									<input type="hidden" value="recue" name="recue">
									<button type="submit" class="btn btn-sm" id="Recue"><i class="fa fa-download"></i></button>
									</form>
									</td>
									<td align="center"><button class="btn btn-sm btn_validation" value="' . $row->IDACHAT . '" id="validationReference" data-toggle="modal" data-target="#modal_reference">Validations</button>
								 </td>
								</tr>
							</tbody>
						</table>
					</div>
						';
				}

				echo $tableau;
			}
		}
	}
	// FIN

	// AFFICHE ORDONNANCE
	function afficheOrdonnance()
	{
		if (isset($_POST['voirOrdonnance'])) {
			$ordonnance = $this->Pharmacie_model->selectOrdonnance($_POST['idAchat']);
			$bloc = '<embed src="' . base_url() . 'upload/patient/ordonnance/' . $ordonnance->ORDONANCE . '" type="application/pdf" width="100%" height="500px">';
			echo $bloc;
		}
	}
	// FIN

	// VALIDATION ACHAT
	function validationAchat()
	{
		if (isset($_POST['reponseValidation'])) {
			if ($_POST['frais'] != '' && $_POST['reponseValidation'] == 'accepter' && $_POST['nonValider'] == '') {
				$donner = array(
					'IDACHAT' => $_POST['idAchatValidation'],
					'IDPHARMACIE' => $_POST['IDPHARMACIE'],
					'VALIDATIONACHAT' => $_POST['reponseValidation'],
					'FRAISLIVRAISON' => $_POST['frais'],
				);
				$this->Pharmacie_model->modifierAchatValidation($donner);
			} elseif ($_POST['nonValider'] != '' && $_POST['reponseValidation'] == 'refuser' && $_POST['frais'] == '') {
				$donner = array(
					'IDACHAT' => $_POST['idAchatValidation'],
					'IDPHARMACIE' => $_POST['IDPHARMACIE'],
					'VALIDATIONACHAT' => $_POST['reponseValidation'],
					'REPONSENONVALIDER' => $_POST['nonValider'],
				);
				$this->Pharmacie_model->modifierAchatValidation($donner);
			}
		}
	}
	// FIN

	// RECUE
	function recue()
	{
		if (isset($_POST['recue'])) {
			$idAchat = $_POST['idAchat'];
			$achat = $this->Pharmacie_model->achat($idAchat);
			$patient = $this->Pharmacie_model->selectPatient($achat->IDPATIENT);
			$pharmacie = $this->Pharmacie_model->pharmacie($achat->IDPHARMACIE);
			$recue['nomPatient'] = $patient->NOMPATIENT;
			$recue['prenomPatient'] = $patient->PRENOMPATIENT;
			$recue['medicament'] = $achat->MEDICAMENTACHAT;
			$recue['prix'] = $achat->TOTALACHAT;
			$recue['frais'] = $achat->FRAISLIVRAISON;
			$recue['operateur'] = $achat->OPERATEURPAYEMENT;
			$recue['reference'] = $achat->REFERENCEPAYEMENT;
			$recue['pharmacie'] = $pharmacie->NOMPHARMACIE;
			$recue['adressePharmacie'] = $pharmacie->ADRESSEPHARMACIE;
			$recue['telephonePharmacie'] = $pharmacie->TELEPHONEPHARMACIE;
			$recue['logoPharmacie'] = $pharmacie->LOGOPHAMACIE;
			$html = $this->load->view('fichier/recue', $recue, true);
			$mpdf = new \Mpdf\Mpdf();
			$mpdf->SetHTMLHeader('
			<div style="text-align: center; font-weight: bold; font-size:20px;">
			RECUE
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

	// VALIDATION REFERENCE
	function validationReference()
	{
		if (isset($_POST['validation_selectReference'])) {
			if ($_POST['reponseValiderReference'] != '' && $_POST['validation_selectReference'] == 'accepter' && $_POST['reponseNonValiderReference'] == '') {
				echo $_POST['reponseValiderReference'];
				echo $_POST['validation_selectReference'];
				$fn = "";
				$config['upload_path'] = './upload/patient/recue';
				$config['allowed_types'] = 'png|jpg|jpeg|pdf|JPEG|PNG|JPG|PDF';
				$config['max_size'] = 5000;
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('recueAchat')) {
					$this->session->set_flashdata('error', "<p class='alert alert-danger'>Sélecter un photo!</p>");
				} else {
					$fd = $this->upload->data();
					$fn = $fd['file_name'];
				}
				echo $fn;
				$donner = array(
					'IDACHAT' => $_POST['idReferenceValidation'],
					'IDPHARMACIE' => $_POST['IDPHARMACIE'],
					'VALIDATIONREFERENCE' => $_POST['validation_selectReference'],
					'REPONSEREFERENCEACCEPTER' => $_POST['reponseValiderReference'],
					'RECUEACHAT' => $fn,
				);
				$this->Pharmacie_model->modifierReferenceValidation($donner);
				$achat = $this->Pharmacie_model->selectAchatVente($_POST['idReferenceValidation']);
				$datestring = '%Y/%m/%d - %h:%i %a';
				$time = time();
				$anne = '%Y';
				$mois = '%m';
				$vente = array(
					'IDPHARMACIE' => $achat->IDPHARMACIE,
					'MEDICAMENTVENTE' => $achat->MEDICAMENTACHAT,
					'PRIXVENTE' => $achat->TOTALACHAT,
					'FRAISLIVRAISON' => $achat->FRAISLIVRAISON,
					'ORDONANCE' => $achat->ORDONANCE,
					'IDPATIENT' => $achat->IDPATIENT,
					'ANNE' => mdate($anne, $time),
					'MOIS' => mdate($mois, $time),
					'CREATED_AT' => mdate($datestring, $time),
				);
				$this->Pharmacie_model->insertVente($vente);
			} elseif ($_POST['reponseNonValiderReference'] != '' && $_POST['validation_selectReference'] == 'refuser' && $_POST['reponseValiderReference'] == '' && $_POST['recue'] == '') {
				echo $_POST['reponseNonValiderReference'];
				$donner = array(
					'IDACHAT' => $_POST['idReferenceValidation'],
					'IDPHARMACIE' => $_POST['IDPHARMACIE'],
					'VALIDATIONREFERENCE' => $_POST['validation_selectReference'],
					'REPONSENONREFERENCE' => $_POST['reponseNonValiderReference'],
				);
				$this->Pharmacie_model->modifierReferenceValidation($donner);
			}
		}
	}
	// FIN 


	// SELECT COUNT ACHAT
	function afficheCountAchat()
	{
		if (isset($_POST['afficheCountAchat'])) {
			$idPharmacie = $_POST['idPharmacie'];
			$data = $this->Pharmacie_model->selectCountAchat($idPharmacie);
			echo $data;
		}
	}
	// FIN

	// MODIFIER COUNT ACHAT
	function modifierCountAchat()
	{
		if (isset($_POST['modifierCountAchat'])) {
			$idPharmacie = $_POST['idPharmacie'];
			$donner = array(
				'IDPHARMACIE' => $idPharmacie,
				'STATUSACHAT' => '1'
			);
			$this->Pharmacie_model->modifierCountAchat($donner);
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
			$data = $this->Pharmacie_model->patient($query);
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
					$countAversissement = $this->Pharmacie_model->countAvertissement($row->IDPATIENT);
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
			$patient = $this->Pharmacie_model->detailsPatient($_POST['idPatient']);
			$provincePatient = $this->Pharmacie_model->selectProvince($patient->PROVINCEPATIENT);
			$regionPatient = $this->Pharmacie_model->selectRegion($patient->REGIONPATIENT);
			$districtPatient = $this->Pharmacie_model->selectDistrict($patient->DISTRICTPATIENT);
			$communePatient = $this->Pharmacie_model->selectCommune($patient->COMMUNEPATIENT);
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
			$this->Pharmacie_model->dataPatientReservation($idPatient);
			$this->Pharmacie_model->dataPatientPanierAgenda($idPatient);
			$this->Pharmacie_model->dataPatientConsultation($idPatient);
			$this->Pharmacie_model->dataPatientPanier($idPatient);
			$this->Pharmacie_model->dataPatientObtenir($idPatient);
			$this->Pharmacie_model->dataPatientAchat($idPatient);
			$this->Pharmacie_model->dataPatientRendezVous($idPatient);
			$this->Pharmacie_model->dataPatientVente($idPatient);
            if($this->Pharmacie_model->suprimerPatient($idPatient)){
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
				"ENVOYEURNOTIFPATIENT" => 'pharmacie',
				"DATENOTIFPATIENT" => mdate($datestring, $time),
				"NOMENVOYEURNOTIFPATIENT" => 'Pharmacie ' . $_POST['nomPharmacieNotif'],
				"PHOTOENVOTEURNOTIFPATIENT" => $_POST['photoPharmacieNotif'],
				"STATUSNOTIFPATIENT" => "0"
			);
			$this->Pharmacie_model->ajouteNotif($donner);
			$notif = $this->Pharmacie_model->idNotif($_POST['messageNotification'], $_POST['typeNotification'], 'pharmacie', mdate($datestring, $time), 'Pharmacie ' . $_POST['nomPharmacieNotif']);
			$donner2 = array(
				"IDPATIENT" => $_POST['idPatientNotif'],
				"IDNOTIFPATIENT" => $notif->IDNOTIFPATIENT,
			);
			$this->Pharmacie_model->ajouteNotif2($donner2);

			echo "Envoi notification avec success !";
		}
	}
	// FIN


	// AFFICHE VENTE
	function afficheVente()
	{
		if (isset($_POST['vente'])) {
			$idPharmacie = $_POST['idPharmacie'];
			$rows = $this->Pharmacie_model->selectVente($idPharmacie);
			$output = '
			<table class="table table-bordered table-striped">
								<thead class="bg-thead">
									<tr>
									<th>Acheteurs</th>
									<th>Télephone</th>
									<th>Médicaments</th>
									<th>Prix</th>
									<th>Frais</th>
									<th>Date</th>
									</tr>
								</thead>
								<tbody>
			';
			if ($rows->num_rows() > 0) {
				foreach ($rows->result() as $row) {
					$patient = $this->Pharmacie_model->selectPatientVente($row->IDPATIENT);
					$output .= '
				  <tr>
				  <td align="center">' . $patient->NOMPATIENT . ' ' . $patient->PRENOMPATIENT . '</td>
				  <td align="center">' . $patient->TELEPHONEPATIENT . '</td>
				  <td align="center">' . $row->MEDICAMENTVENTE . '</td>
				  <td align="center">' . $row->PRIXVENTE . '.00 Ar</td>
				  <td align="center">' . $row->FRAISLIVRAISON . '.00 Ar</td>
				  <td align="center">' . $row->CREATED_AT . '</td>
			      </tr>
				  ';
				}
			} else {
				$output .= '<tr>
				<td colspan="5">Pas de vente !</td>
				</tr>
			  ';
			}
			$output .= '
			</tbody>
			</table>
			';
			echo $output;
		}
	}
	// FIN

	// AFFICHE VENTE ANNE
	function afficheVenteAnne()
	{
		if (isset($_POST['anne'])) {
			$idPharmacie = $_POST['idPharmacie'];
			$anne = $_POST['anne'];
			$rows = $this->Pharmacie_model->selectVenteAnne($idPharmacie, $anne);
			$output = '
			<table class="table table-bordered table-striped">
								<thead class="bg-thead">
									<tr>
									<th>Acheteurs</th>
									<th>Télephone</th>
									<th>Médicaments</th>
									<th>Prix</th>
									<th>Frais</th>
									<th>Date</th>
									</tr>
								</thead>
								<tbody>
			';
			if ($rows->num_rows() > 0) {
				foreach ($rows->result() as $row) {
					$patient = $this->Pharmacie_model->selectPatientVente($row->IDPATIENT);
					$output .= '
				  <tr>
				  <td align="center">' . $patient->NOMPATIENT . ' ' . $patient->PRENOMPATIENT . '</td>
				  <td align="center">' . $patient->TELEPHONEPATIENT . '</td>
				  <td align="center">' . $row->MEDICAMENTVENTE . '</td>
				  <td align="center">' . $row->PRIXVENTE . '.00 Ar</td>
				  <td align="center">' . $row->FRAISLIVRAISON . '.00 Ar</td>
				  <td align="center">' . $row->CREATED_AT . '</td>
			      </tr>
				  ';
				}
			} else {
				$output .= '<tr>
				<td colspan="5">Pas de vente !</td>
				</tr>
			  ';
			}
			$output .= '
			</tbody>
			</table>
			';
			echo $output;
		}
	}
	// FIN 

	// AFFICHE VENTE MOIS
	function afficheVenteMois()
	{
		if (isset($_POST['mois'])) {
			$idPharmacie = $_POST['idPharmacie'];
			$mois = $_POST['mois'];
			$rows = $this->Pharmacie_model->selectVenteMois($idPharmacie, $mois);
			$output = '
			<table class="table table-bordered table-striped">
								<thead class="bg-thead">
									<tr>
									<th>Acheteurs</th>
									<th>Télephone</th>
									<th>Médicaments</th>
									<th>Prix</th>
									<th>Frais</th>
									<th>Date</th>
									</tr>
								</thead>
								<tbody>
			';
			if ($rows->num_rows() > 0) {
				foreach ($rows->result() as $row) {
					$patient = $this->Pharmacie_model->selectPatientVente($row->IDPATIENT);
					$output .= '
				  <tr>
				  <td align="center">' . $patient->NOMPATIENT . ' ' . $patient->PRENOMPATIENT . '</td>
				  <td align="center">' . $patient->TELEPHONEPATIENT . '</td>
				  <td align="center">' . $row->MEDICAMENTVENTE . '</td>
				  <td align="center">' . $row->PRIXVENTE . '.00 Ar</td>
				  <td align="center">' . $row->FRAISLIVRAISON . '.00 Ar</td>
				  <td align="center">' . $row->CREATED_AT . '</td>
			      </tr>
				  ';
				}
			} else {
				$output .= '<tr>
				<td colspan="5">Pas de vente !</td>
				</tr>
			  ';
			}
			$output .= '
			</tbody>
			</table>
			';
			echo $output;
		}
	}
	// FIN


	// PDF VENTE
	function pdfVente()
	{
		if (isset($_POST['exportPdf'])) {
			$idPharmacie = $_POST['IDPHARMACIE'];
			$anne = $_POST['anneVente'];
			$mois = $_POST['moisVente'];
			if ($anne != '' && $mois != '') {
				$data['data'] = $this->Pharmacie_model->selectVenteAnneMois($idPharmacie, $anne, $mois);
				$pharmacie = $this->Pharmacie_model->pharmacie($idPharmacie);
				$html = $this->load->view('fichier/vente_anne_mois', $data, true);
				$mpdf = new \Mpdf\Mpdf();
				$mpdf->SetHTMLHeader('
			   <div style="text-align: center; font-weight: bold; font-size:20px;">
			   PHARMACIE ' . $pharmacie->NOMPHARMACIE . ' vente ' . $anne . "/" . $mois . '
			   </div>');
				$mpdf->SetHTMLFooter('
			   <table width="100%">
			   <tr>
			   <td width="33%">{DATE j-m-Y}</td>
			   </tr>
			   </table>');
				$mpdf->SetWatermarkText('DOCTOPHARME');
				$mpdf->showWatermarkText = true;
				$mpdf->watermarkTextAlpha = 0.2;
				$mpdf->WriteHTML($html);
				$mpdf->Output();
			} elseif ($anne != '' && $mois == '') {
				$data['data'] = $this->Pharmacie_model->selectVenteAnne($idPharmacie, $anne);
				$pharmacie = $this->Pharmacie_model->pharmacie($idPharmacie);
				$html = $this->load->view('fichier/vente_anne_mois', $data, true);
				$mpdf = new \Mpdf\Mpdf();
				$mpdf->SetHTMLHeader('
			    <div style="text-align: center; font-weight: bold; font-size:20px;">
			    PHARMACIE ' . $pharmacie->NOMPHARMACIE . ' vente ' . $anne . '
			    </div>');
				$mpdf->SetHTMLFooter('
			    <table width="100%">
			    <tr>
			    <td width="33%">{DATE j-m-Y}</td>
			    </tr>
			    </table>');
				$mpdf->SetWatermarkText('DOCTOPHARME');
				$mpdf->showWatermarkText = true;
				$mpdf->watermarkTextAlpha = 0.2;
				$mpdf->WriteHTML($html);
				$mpdf->Output();
			}
		}
	}
	// FIN



	// LOUGOUT
	function logout()
	{
		$donner = array(
			"IDPHARMACIE" => $_SESSION['IDPHARMACIE'],
			"STATUSPHARMACIE" => "inactif",
		);
		$this->Pharmacie_model->modifierPharmacie($donner);
		unset($_SESSION);
		session_destroy();
		redirect('admin/Pharmacie/Pharmacie_controlleur/passage');
	}
	// FIN 
}

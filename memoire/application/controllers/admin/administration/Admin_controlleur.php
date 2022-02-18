<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin_controlleur extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/administration/Admin_model');
	}



	// AJOUTE PASSAGE 
	function ajoutePassage()
	{
		if (isset($_POST['typeAdmine']) && isset($_POST['mailAdmine']) && isset($_POST['cleAdmine'])) {
			$donner = array(
				"MAILADMIN" => $_POST['mailAdmine'],
				"CLEADMIN" => $_POST['cleAdmine'],
				"TYPEADMIN" => $_POST['typeAdmine'],
			);
			$this->Admin_model->ajoutePassage($donner);
			echo "Insertion passage " . $_POST['typeAdmine'] . " avec success !";
		}
	}
	// FIN



	// AJOUTE NOTIF 
	function ajouteNotif()
	{
		if (isset($_POST['notifboxes']) && isset($_POST['notifMessageBoxes'])) {
			$datestring = '%Y/%m/%d - %h:%i %a';
			$time = time();
			$donner = array(
				"NOTIFBOXE" => $_POST['notifMessageBoxes'],
				"TYPEBOXE" => $_POST['notifboxes'],
				"DATENOTIFBOXE" => mdate($datestring, $time),
			);
			$this->Admin_model->ajouteNotif($donner);
			echo "Insertion notification " . $_POST['notifboxes'] . " avec success !";
		}
	}
	// FIN


	function ajoutePayement()
	{
		if (isset($_POST['operateur']) && isset($_POST['nomAppartenance']) && isset($_POST['numeroOperateur'])) {

			$donner = array(
				"OPERATEURLOYERBOXE" => $_POST['operateur'],
				"APARTENANCELOYERBOXE" => $_POST['nomAppartenance'],
				"NUMEROLOYERBOXE" => $_POST['numeroOperateur'],
			);
			$this->Admin_model->ajoutePayement($donner);
			echo "Insertion payement " . $_POST['operateur'] . " avec success !";
		}
	}




	// LOGOUT ADMINE
	function logout()
	{
		unset($_SESSION);
		session_destroy();
		redirect('admin/administration/Admin_controlleur/acceuil');
	}
	// FIN



	// LIEN VERS ACCUEIL
	function acceuil()
	{
		$this->load->view('accueil');
	}
	// FIN


	function affichePayement()
	{
		if (isset($_POST['affichePayement'])) {
			$rows = $this->Admin_model->affichePayement();
			$output = '
			<table class="table table-bordered table-striped">
			<thead class="bg-thead">
				<tr>
					<th align="center">Opérateur</th>
					<th align="center">Au nom de</th>
					<th align="center">Numéro</th>
					<th align="center">Actions</th>
				</tr>
			</thead>
			<tbody>
		  ';
			foreach ($rows->result() as $resultat) {
				$output .= '
					<tr>
					<td align="center">' . $resultat->OPERATEURLOYERBOXE . '</td>
					<td align="center">' . $resultat->APARTENANCELOYERBOXE . '</td>
					<td align="center">' . $resultat->NUMEROLOYERBOXE . '</td>
					<td class="d-flex justify-content-center"><i class="fa fa-pencil-square-o" value="' . $resultat->IDLOYERBOXE . '" id="payement" data-toggle="modal" data-target="#modificationPayement"></i><i class="fa fa-trash-o ml-3" value="' . $resultat->IDLOYERBOXE . '" id="suprimerPayemet"></i></td>
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


	function suprimerPayement()
	{
		if (isset($_POST['idPayement'])) {
			$this->Admin_model->suprimerPayement($_POST['idPayement']);
			echo "Supression du payement avec success!";
		}
	}

	function afficheOnePayement()
	{
		if ($this->input->is_ajax_request()) {
			$idPayement = $this->input->post('idPayement');
			if ($post = $this->Admin_model->selectOnePayement($idPayement)) {
				$data = array('response' => "success", 'post' => $post);
			} else {
				$data = array('response' => "error", 'message' => 'failed');
			}
		}
		echo json_encode($data);
	}


	function modifierPayement()
	{
		if ($this->input->is_ajax_request()) {
			$idPayement = $this->input->post('idPayement');
			$data['OPERATEURLOYERBOXE'] = $this->input->post('operateur');
			$data['APARTENANCELOYERBOXE'] = $this->input->post('nomAppartenance');
			$data['NUMEROLOYERBOXE'] = $this->input->post('numeroOperateur');

			if ($this->Admin_model->modifierPayement($data, $idPayement)) {

				$data = "Modification avec success!";
			} else {
				$data = "Modification error!";
			}
			echo $data;
		}
	}
}

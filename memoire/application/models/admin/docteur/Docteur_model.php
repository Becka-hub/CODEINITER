<?php

class Docteur_model extends CI_Model
{
	function envoiMessage()
	{
		$this->db->select("*");
		$this->db->from("consultation");
		$query = $this->db->get();
		return $query;
	}
	function affichePatient($id)
	{
		$this->db->select("*");
		$this->db->from("patient");
		$this->db->where(array('IDPATIENT' => $id));
		$query = $this->db->get();
		if (count($query->result()) > 0) {
			return $query->row();
		}
	}

	function afficheDocteur($id)
	{
		$this->db->select("*");
		$this->db->from("docteur");
		$this->db->where(array('IDDOCTEUR' => $id));
		$query = $this->db->get();
		if (count($query->result()) > 0) {
			return $query->row();
		}
	}

	function afficheIdPatient($id)
	{
		$this->db->select("*");
		$this->db->from("consultation");
		$this->db->where(array('IDCONSULTATION' => $id));
		$query = $this->db->get();
		if (count($query->result()) > 0) {
			return $query->row();
		}
	}
	function afficheMessage($idPatient, $idConsultation)
	{
		$this->db->select("*");
		$this->db->from("consultation");
		$this->db->where('IDPATIENT', $idPatient);
		$this->db->where('IDCONSULTATION <=', $idConsultation);
		$query = $this->db->get();
		return $query;
	}
	function countMessage()
	{
		$sql = "SELECT count(IDCONSULTATION) as IDCONSULTATION from consultation WHERE REPONSECONSULTATION=''";
		$result = $this->db->query($sql);
		return $result->row()->IDCONSULTATION;
	}


	function patient($query)
	{
		$this->db->select("*");
		$this->db->from("patient");
		if ($query != '') {
			$this->db->like('IDPATIENT', $query);
			$this->db->or_like('NOMPATIENT', $query);
			$this->db->or_like('PRENOMPATIENT', $query);
		}
		$this->db->order_by('IDPATIENT', 'DESC');
		return $this->db->get();
	}





	function dataPatientReservation($id){
		return $this->db->delete('reservation', array('IDPATIENT' => $id));
	}
	
	function dataPatientPanierAgenda($id){
		return $this->db->delete('panieragenda', array('IDPATIENT' => $id));
	}

	function dataPatientConsultation($id){
		return $this->db->delete('consultation', array('IDPATIENT' => $id));
	}
	function dataPatientPanier($id){
		return $this->db->delete('panier', array('IDPATIENT' => $id));
	}
	function dataPatientObtenir($id){
		return $this->db->delete('obtenir1', array('IDPATIENT' => $id));
	}
	function dataPatientAchat($id){
		return $this->db->delete('achat', array('IDPATIENT' => $id));
	}
	function dataPatientRendezVous($id){
		return $this->db->delete('rendezvous', array('IDPATIENT' => $id));
	}
	function dataPatientVente($id){
		return $this->db->delete('vente', array('IDPATIENT' => $id));
	}
	function suprimerPatient($id){
		return $this->db->delete('patient', array('IDPATIENT' => $id));
	}
	



	function countAvertissement($id)
	{
		$sql = "SELECT count(IDNOTIFPATIENT) as IDNOTIFPATIENT from obtenir1 natural join notifpatient WHERE obtenir1.IDNOTIFPATIENT=notifpatient.IDNOTIFPATIENT AND notifpatient.TYPENOTIFPATIENT='avertissement' AND  obtenir1.IDPATIENT= $id";
		$result = $this->db->query($sql);
		return $result->row()->IDNOTIFPATIENT;
	}

	function detailsPatient($id)
	{
		$this->db->select("*");
		$this->db->from("patient");
		$this->db->where(array('IDPATIENT' => $id));
		$query = $this->db->get();
		if (count($query->result()) > 0) {
			return $query->row();
		}
	}

	function selectProvince($id)
	{
		$this->db->select("*");
		$this->db->from("province");
		$this->db->where("IDPROVINCE", $id);
		$query = $this->db->get();
		if (count($query->result()) > 0) {
			return $query->row();
		}
	}

	function selectRegion($id)
	{
		$this->db->select("*");
		$this->db->from("region");
		$this->db->where("IDREGION", $id);
		$query = $this->db->get();
		if (count($query->result()) > 0) {
			return $query->row();
		}
	}


	function selectDistrict($id)
	{
		$this->db->select("*");
		$this->db->from("district");
		$this->db->where("IDDISTRICT", $id);
		$query = $this->db->get();
		if (count($query->result()) > 0) {
			return $query->row();
		}
	}

	function selectCommune($id)
	{
		$this->db->select("*");
		$this->db->from("commune");
		$this->db->where("IDCOMMUNE", $id);
		$query = $this->db->get();
		if (count($query->result()) > 0) {
			return $query->row();
		}
	}

	function ajouteNotif($data)
	{
		return $this->db->insert('notifpatient', $data);
	}

	function idNotif($notif, $typeNotif, $envoiNotif, $dateNotif, $nomEnvoiNotif)
	{
		$this->db->select("*");
		$this->db->from("notifpatient");
		$this->db->where("NOTIFPATIENT", $notif);
		$this->db->where("TYPENOTIFPATIENT", $typeNotif);
		$this->db->where("ENVOYEURNOTIFPATIENT", $envoiNotif);
		$this->db->where("DATENOTIFPATIENT", $dateNotif);
		$this->db->where("NOMENVOYEURNOTIFPATIENT", $nomEnvoiNotif);
		$query = $this->db->get();
		if (count($query->result()) > 0) {
			return $query->row();
		}
	}

	function ajouteNotif2($data)
	{
		return $this->db->insert('obtenir1', $data);
	}

	function modificationConsultation($data)
	{
		return $this->db->update('consultation', $data, array('IDCONSULTATION' => $data['IDCONSULTATION']));
	}

	function ajouteForum($data)
	{
		return $this->db->insert('forum', $data);
	}

	function idForum($messageForum, $dateForum)
	{
		$this->db->select("*");
		$this->db->from("forum");
		$this->db->where("MESSAGEFORUM", $messageForum);
		$this->db->where("DATEMESSAGEFORUM", $dateForum);
		$query = $this->db->get();
		if (count($query->result()) > 0) {
			return $query->row();
		}
	}

	function ajouteForum2($data)
	{
		return $this->db->insert('discuter', $data);
	}

	function afficheMessageForum()
	{
		$this->db->select("*");
		$this->db->from('discuter');
		$this->db->join('forum', 'discuter.IDFORUM=forum.IDFORUM');
		$query = $this->db->get();
		return $query;
	}

	function afficheDocteurForum($id)
	{
		$this->db->select("*");
		$this->db->from("docteur");
		$this->db->where("IDDOCTEUR", $id);
		$query = $this->db->get();
		if (count($query->result()) > 0) {
			return $query->row();
		}
	}

	function afficheListeDocteur()
	{
		$this->db->select("*");
		$this->db->from('docteur');
		$query = $this->db->get();
		return $query;
	}

	function afficheOrdonnance($id)
	{

		$this->db->select("*");
		$this->db->from("consultation");
		$this->db->where("IDCONSULTATION", $id);
		$query = $this->db->get();
		return $query;
	}

	function modifierDocteur($data){
		return $this->db->update('docteur', $data, array('IDDOCTEUR' => $data['IDDOCTEUR']));
	}
}

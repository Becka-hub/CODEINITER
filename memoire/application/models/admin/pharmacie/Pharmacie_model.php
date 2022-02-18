<?php

class Pharmacie_model extends CI_Model
{

	function modifierPharmacie($data)
	{
		return $this->db->update('pharmacie', $data, array('IDPHARMACIE' => $data['IDPHARMACIE']));
	}

	function insertMedicament($data)
	{
		return $this->db->insert('medicament', $data);
	}

	function medicament($query, $idPharmacie)
	{

		if ($query != '') {
			$this->db->select("*");
			$this->db->from("medicament");
			$this->db->where('IDPHARMACIE', $idPharmacie);
			$this->db->like('NOMMEDICAMENT', $query);
			$this->db->or_like('PRIXMEDICAMENT', $query);
		    return $this->db->get();
		}else{
			$this->db->select("*");
			$this->db->from("medicament");
			$this->db->where('IDPHARMACIE', $idPharmacie);
		    return $this->db->get();
		}
	}

	function detaileMedicament($id)
	{
		$this->db->select("*");
		$this->db->from("medicament");
		$this->db->where("IDMEDICAMENT", $id);
		return $this->db->get();
	}

	function selectOneMedicament($id)
	{
		$this->db->select("*");
		$this->db->from("medicament");
		$this->db->where("IDMEDICAMENT", $id);
		$query = $this->db->get();
		if (count($query->result()) > 0) {
			return $query->row();
		}
	}

	function modifierMedicament($data)
	{
		return $this->db->update('medicament', $data, array('IDMEDICAMENT' => $data['IDMEDICAMENT']));
	}

	function suprimerMedicament($id){
		return $this->db->delete('medicament', array('IDMEDICAMENT' => $id));
	}

	function insertPayement($data){
		return $this->db->insert('payementpharmacie',$data);
	}
	function affichePayement($id){
		$this->db->select("*");
		$this->db->from("payementpharmacie");
		$this->db->where("IDPHARMACIE",$id);
		return $this->db->get();
	}

	function selectOnePayement($id){
		$this->db->select("*");
		$this->db->from("payementpharmacie");
		$this->db->where("IDPAYEMENTPHARMACIE",$id);
		$query = $this->db->get();
		if (count($query->result()) > 0) {
			return $query->row();
		}
	}

	function modifierPayement($data){
		return $this->db->update('payementpharmacie', $data, array('IDPAYEMENTPHARMACIE' => $data['IDPAYEMENTPHARMACIE']));
	}
	function suprimerPayement($id){
		return $this->db->delete('payementpharmacie', array('IDPAYEMENTPHARMACIE' => $id));
	}
	function selectAchat($idPharmacie){
		$this->db->select('*');
		$this->db->from('achat');
		$this->db->where('IDPHARMACIE',$idPharmacie);
		return $this->db->get();
	}
	function selectPatient($id){
       $this->db->select('*');
	   $this->db->from('patient');
	   $this->db->where('IDPATIENT',$id);
	   $query = $this->db->get();
	   if (count($query->result()) > 0) {
		   return $query->row();
	   }
	}
	function selectOrdonnance($idAchat){
		$this->db->select("*");
		$this->db->from("achat");
		$this->db->where("IDACHAT",$idAchat);
		$query = $this->db->get();
		if (count($query->result()) > 0) {
			return $query->row();
		}
	}
	function modifierAchatValidation($data){
		return $this->db->update('achat', $data, array('IDACHAT' => $data['IDACHAT'],'IDPHARMACIE'=>$data['IDPHARMACIE']));
	}
	function modifierReferenceValidation($data){
		return $this->db->update('achat', $data, array('IDACHAT' => $data['IDACHAT'],'IDPHARMACIE'=>$data['IDPHARMACIE']));
	}
	function selectCountAchat($idPharmacie)
	{
		$sql = "SELECT count(IDACHAT) as IDACHAT from achat WHERE IDPHARMACIE=$idPharmacie AND STATUSACHAT='0'";
		$result = $this->db->query($sql);
		return $result->row()->IDACHAT;
	}
	function modifierCountAchat($data){
		return $this->db->update('achat', $data, array('IDPHARMACIE'=>$data['IDPHARMACIE']));
	}
	function selectAchatVente($idAchat){
		$this->db->select('*');
		$this->db->from('achat');
        $this->db->where('IDACHAT',$idAchat);
		$query = $this->db->get();
		if (count($query->result()) > 0) {
			return $query->row();
		}
	}
	
	function insertVente($data){
		return $this->db->insert('vente',$data);
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

	function selectVente($idPharmacie){
		$this->db->select('*');
		$this->db->from('vente');
		$this->db->where('IDPHARMACIE',$idPharmacie);
		return $this->db->get();
	}
	function selectPatientVente($idPatient){
		$this->db->select('*');
		$this->db->from('patient');
		$this->db->where('IDPATIENT',$idPatient);
		$query = $this->db->get();
		if (count($query->result()) > 0) {
			return $query->row();
		}
	}
	function selectVenteAnne($idPharmacie,$anne){
		$this->db->select('*');
		$this->db->from('vente');
		$this->db->where(array('IDPHARMACIE'=>$idPharmacie,'ANNE'=>$anne));
		return $this->db->get();
	}
	function selectVenteMois($idPharmacie,$mois){
		$this->db->select('*');
		$this->db->from('vente');
		$this->db->where(array('IDPHARMACIE'=>$idPharmacie,'MOIS'=>$mois));
		return $this->db->get();
	}
	function achat($idAchat){
        $this->db->select('*');
		$this->db->from('achat');
		$this->db->where("IDACHAT",$idAchat);
		$query = $this->db->get();
		if (count($query->result()) > 0) {
			return $query->row();
		}
	}
	function pharmacie($idPharmacie){
		$this->db->select('*');
		$this->db->from('pharmacie');
		$this->db->where('IDPHARMACIE',$idPharmacie);
		$query = $this->db->get();
		if (count($query->result()) > 0) {
			return $query->row();
		}
	}

	function selectVenteAnneMois($idPharmacie,$anne,$mois){
		$this->db->select('*');
		$this->db->from('vente');
		$this->db->where(array('IDPHARMACIE'=>$idPharmacie,'ANNE'=>$anne,'MOIS'=>$mois));
		return $this->db->get();
	}

}

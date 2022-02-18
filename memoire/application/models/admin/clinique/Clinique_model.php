<?php

class Clinique_model extends CI_Model
{
    function modifierClinique($data){
		return $this->db->update('clinique', $data, array('IDCLINIQUE' => $data['IDCLINIQUE']));
	}

    function insertAgenda($data){
        return $this->db->insert('agenda',$data);
    }

    function getIDAgenda($idClinique,$date){
        $this->db->select('*');
        $this->db->from('agenda');
        $this->db->where(array('IDCLINIQUE'=>$idClinique,'DATEAGENDA'=>$date));
        $query = $this->db->get();
		if (count($query->result()) > 0) {
			return $query->row();
		}
    }
    function insertHeure($data){
        return $this->db->insert('heureagenda',$data);
    }

    function selectAgenda($idClinique){
        $this->db->select('*');
        $this->db->from('agenda');
        $this->db->where('IDCLINIQUE',$idClinique);
        $this->db->order_by('DATEAGENDA','ASC');
        $query = $this->db->get();
		return $query;
    }
    function selectHeureAgenda($idAgenda){
        $this->db->select('*');
        $this->db->from('heureagenda');
        $this->db->where('IDAGENDA',$idAgenda);
        $query = $this->db->get();
		return $query;
    }

    function modifierDate($data){
        return $this->db->update('agenda', $data, array('IDAGENDA' => $data['IDAGENDA'],'IDCLINIQUE'=>$data['IDCLINIQUE']));
    }
    function suprimerAgenda($idAgenda,$idClinique){
        return $this->db->delete('agenda',array('IDAGENDA'=>$idAgenda,'IDCLINIQUE'=>$idClinique));
    }
    function suprimerHeure($idAgenda){
        return $this->db->delete('agenda',array('IDAGENDA'=>$idAgenda));
    }
    function modifierHeure($data){
        return $this->db->update('heureagenda',$data,array('IDHEUREAGENDA'=>$data['IDHEUREAGENDA']));
    }
    function deleteHeure($idHeure){
        return $this->db->delete('heureagenda',array('IDHEUREAGENDA'=>$idHeure));
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

	function selectReservation($idClinique){
		$this->db->select('*');
		$this->db->from('reservation');
		$this->db->where('IDCLINIQUE',$idClinique);
		$query=$this->db->get();
		return $query;
	}
	function selectPatient($idPatient){
       $this->db->select('*');
	   $this->db->from('patient');
	   $this->db->where('IDPATIENT',$idPatient);
	   $query = $this->db->get();
	   if (count($query->result()) > 0) {
		   return $query->row();
	   }
	}
	function reservation($idReservation){
		$this->db->select('*');
		$this->db->from('reservation');
		$this->db->where('IDRESERVATION',$idReservation);
		$query = $this->db->get();
		if (count($query->result()) > 0) {
			return $query->row();
		}
	}
	function selectClinique($idClinique){
		$this->db->select('*');
		$this->db->from('clinique');
		$this->db->where('IDCLINIQUE',$idClinique);
		$query = $this->db->get();
		if (count($query->result()) > 0) {
			return $query->row();
		}
	}
	function modifierValidation($data){
		return $this->db->update('reservation',$data,array('IDRESERVATION'=>$data['IDRESERVATION'],'IDCLINIQUE'=>$data['IDCLINIQUE']));
	}
	function insertRendezVous($data){
		return $this->db->insert('rendezvous',$data);
	}
	function selectRendezVous($idClinique){
		$this->db->select('*');
		$this->db->from('rendezvous');
		$this->db->where('IDCLINIQUE',$idClinique);
		$this->db->order_by('DATERENDEZVOUS','ASC');
		$query=$this->db->get();
		return $query;
	}

	function selectJours($idClinique){
		$this->db->select('DATERENDEZVOUS');
		$this->db->from('rendezvous');
		$this->db->where('IDCLINIQUE',$idClinique);
		$this->db->group_by('DATERENDEZVOUS');
		$query=$this->db->get();
		return $query;
	}
    function selectRendezVousDate($idClinique,$date){
		$this->db->select('*');
		$this->db->from('rendezvous');
		$this->db->where(array('IDCLINIQUE'=>$idClinique,'DATERENDEZVOUS'=>$date));
		$this->db->order_by('DATERENDEZVOUS','ASC');
		$query=$this->db->get();
		return $query;
	}
	function suprimerRendezVous($idClinique,$idRendezVous){
		return $this->db->delete('rendezvous',array('IDCLINIQUE'=>$idClinique,'IDRENDEZVOUS'=>$idRendezVous));
	}
	function modifierRendezVous($data){
		return $this->db->update('rendezvous',$data,array('IDRENDEZVOUS'=>$data['IDRENDEZVOUS'],'IDCLINIQUE'=>$data['IDCLINIQUE']));
	}
	function selectCountReservation($idClinique){
		$sql = "SELECT count(IDRESERVATION ) as IDRESERVATION  from reservation WHERE IDCLINIQUE=$idClinique AND STATUSRESERVATION='0'";
		$result = $this->db->query($sql);
		return $result->row()->IDRESERVATION ;
	}
	function modifierCountReservation($data){
		return $this->db->update('reservation',$data,array('IDCLINIQUE'=>$data['IDCLINIQUE']));
	}
}

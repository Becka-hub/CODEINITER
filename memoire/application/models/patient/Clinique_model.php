<?php

class Clinique_model extends CI_Model
{
	function selectProvince()
	{
		$this->db->select("*");
		$this->db->from("province");
		$this->db->order_by('NOMPROVINCE', 'ASC');
		$query = $this->db->get();
		return $query;
	}
	function afficheAgenda($idClinique){
		$this->db->select("*");
		$this->db->from("agenda");
		$this->db->where("IDCLINIQUE",$idClinique);
		$this->db->order_by("DATEAGENDA","ASC");
		$query = $this->db->get();
		return $query;
	}

    function afficheHeureAgenda($idAgenga){
		$this->db->select("*");
		$this->db->from("heureagenda");
		$this->db->where("IDAGENDA",$idAgenga);
        $query = $this->db->get();
		return $query;
	}
	function selectHeure($idHeureAgenda){
		$this->db->select('*');
		$this->db->from('heureagenda');
		$this->db->where('IDHEUREAGENDA',$idHeureAgenda);
		$query = $this->db->get();
		if (count($query->result()) > 0) {
			return $query->row();
		}
	}
	function selectDate($idAgenga){
		$this->db->select('*');
		$this->db->from('agenda');
		$this->db->where('IDAGENDA',$idAgenga);
		$query = $this->db->get();
		if (count($query->result()) > 0) {
			return $query->row();
		}
	}
	function selectPanierAgenda($heure,$date,$idPatient){
		$this->db->select('*');
		$this->db->from('panieragenda');
		$this->db->where(array('HEUREAGENDA'=>$heure,'DATEAGENDA'=>$date,'IDPATIENT'=>$idPatient));
		$query = $this->db->get();
		if (count($query->result()) > 0) {
			return $query->row();
		}
	}

	function ajoutePanierAgenda($data){
		return $this->db->insert('panieragenda',$data);
	}
	function afficherPanier($idClinique,$idPatient){
		$this->db->select('*');
		$this->db->from('panieragenda');
        $this->db->where(array('IDCLINIQUE'=>$idClinique,'IDPATIENT'=>$idPatient));
		$query = $this->db->get();
		return $query;
	}

	function suprimerPanier($idPanier,$idPatient,$idClinique){
		return $this->db->delete('panieragenda',array('IDPANIERAGENDA'=>$idPanier,'IDPATIENT'=>$idPatient,'IDCLINIQUE'=>$idClinique));
	}
	function selectPanier($idPanier){
		$this->db->select('*');
		$this->db->from('panieragenda');
        $this->db->where('IDPANIERAGENDA',$idPanier);
		$query = $this->db->get();
		if (count($query->result()) > 0) {
			return $query->row();
		}
	}
	function ajouteReservation($data){
		return $this->db->insert('reservation',$data);
	}
	function afficheReservation($idClinique,$idPatient){
		$this->db->select('*');
		$this->db->from('reservation');
        $this->db->where(array('IDPATIENT'=>$idPatient,'IDCLINIQUE'=>$idClinique));
		$query = $this->db->get();
		return $query;
	}
	function suprimerReservation($idClinique,$idPatient,$idReservation){
      return $this->db->delete('reservation',array('IDRESERVATION'=>$idReservation,'IDCLINIQUE'=>$idClinique,'IDPATIENT'=>$idPatient));
	}
	function afficheTicketReservation($idReservation){
		$this->db->select('*');
		$this->db->from('reservation');
		$this->db->where('IDRESERVATION',$idReservation);
		$query=$this->db->get();
		return $query;
	}

}

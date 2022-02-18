<?php

class Patient_model extends CI_Model
{


	function selectProvince()
	{
		$this->db->select("*");
		$this->db->from("province");
		$this->db->order_by('NOMPROVINCE', 'ASC');
		$query = $this->db->get();
		return $query;
	}

	function selectRegion($id)
	{
		$this->db->select("*");
		$this->db->from("region");
		$this->db->where("IDPROVINCE", $id);
		$this->db->order_by('NOMREGION', 'ASC');
		$query = $this->db->get();
		return $query;
	}


	function selectDistrict($id)
	{
		$this->db->select("*");
		$this->db->from("district");
		$this->db->where("IDREGION", $id);
		$this->db->order_by('NOMDISTRICT', 'ASC');
		$query = $this->db->get();
		return $query;
	}

	function selectCommune($id)
	{
		$this->db->select("*");
		$this->db->from("commune");
		$this->db->where("IDDISTRICT", $id);
		$this->db->order_by('NOMCOMMUNE', 'ASC');
		$query = $this->db->get();
		return $query;
	}


	function ajouteMessage($data)
	{
		return $this->db->insert('consultation', $data);
	}

	function afficheMessage($id)
	{
		$this->db->select("*");
		$this->db->from("consultation");
		$this->db->where("IDPATIENT", $id);
		$query = $this->db->get();
		return $query;
	}

	function afficheDocteur($idDocteur)
	{
		$this->db->select("*");
		$this->db->from("docteur");
		$this->db->where("IDDOCTEUR", $idDocteur);
		$query = $this->db->get();
		if (count($query->result()) > 0) {
			return $query->row();
		}
	}

	function afficheOrdonnance($id)
	{

		$this->db->select("*");
		$this->db->from("consultation");
		$this->db->where("IDCONSULTATION", $id);
		$query = $this->db->get();
		return $query;
	}

	function afficheNotification($id)
	{
		$this->db->select("*");
		$this->db->from("obtenir1");
		$this->db->join('notifpatient', 'obtenir1.IDNOTIFPATIENT = notifpatient.IDNOTIFPATIENT');
		$this->db->where("IDPATIENT", $id);
		$this->db->order_by('notifpatient.IDNOTIFPATIENT', 'DESC');
		$query = $this->db->get();
		return $query;
	}

	function countNotif($id)
	{
		$sql = "SELECT count(IDNOTIFPATIENT) as IDNOTIFPATIENT from obtenir1 natural join notifpatient WHERE obtenir1.IDNOTIFPATIENT=notifpatient.IDNOTIFPATIENT AND notifpatient.STATUSNOTIFPATIENT='0' AND  obtenir1.IDPATIENT= $id";
		$result = $this->db->query($sql);
		return $result->row()->IDNOTIFPATIENT;
	}

	function afficheIdNotif($id)
	{
		$this->db->select("*");
		$this->db->from("obtenir1");
		$this->db->where("IDPATIENT", $id);
		$query = $this->db->get();
		return $query;
	}

	function modificationNotif($data)
	{
		return $this->db->update('notifpatient', $data, array('IDNOTIFPATIENT' => $data['IDNOTIFPATIENT']));
	}


	function countMessage($id)
	{
		$sql = "SELECT count(IDCONSULTATION) as IDCONSULTATION from consultation  WHERE  IDPATIENT= $id AND STATUSCONSULTATION='0'";
		$result = $this->db->query($sql);
		return $result->row()->IDCONSULTATION;
	}

	function modificationMessage($data)
	{
		return $this->db->update('consultation', $data, array('IDPATIENT' => $data['IDPATIENT']));
	}

	function selectDocteur()
	{
		$this->db->select("*");
		$this->db->from("docteur");
		$query = $this->db->get();
		return $query;
	}

	function selectProvinceDocteur($id)
	{
		$this->db->select("*");
		$this->db->from("docteur");
		$this->db->where("PROVINCEDOCTEUR", $id);
		$query = $this->db->get();
		return $query;
	}

	function selectRegionDocteur($id)
	{
		$this->db->select("*");
		$this->db->from("docteur");
		$this->db->where("REGIONDOCTEUR", $id);
		$query = $this->db->get();
		return $query;
	}

	function selectDistrictDocteur($id)
	{
		$this->db->select("*");
		$this->db->from("docteur");
		$this->db->where("DISTRICTDOCTEUR", $id);
		$query = $this->db->get();
		return $query;
	}
	function selectCommuneDocteur($id)
	{
		$this->db->select("*");
		$this->db->from("docteur");
		$this->db->where("COMMUNEDOCTEUR", $id);
		$query = $this->db->get();
		return $query;
	}

	function aproposDocteur($id)
	{
		$this->db->select("*");
		$this->db->from("docteur");
		$this->db->where("IDDOCTEUR", $id);
		$query = $this->db->get();
		return $query;
	}
	function nomProvinceDocteur($id)
	{
		$this->db->select('*');
		$this->db->from('province');
		$this->db->where('IDPROVINCE', $id);
		$query = $this->db->get();
		if (count($query->result()) > 0) {
			return $query->row();
		}
	}
	function nomRegionDocteur($id)
	{
		$this->db->select('*');
		$this->db->from('region');
		$this->db->where('IDREGION', $id);
		$query = $this->db->get();
		if (count($query->result()) > 0) {
			return $query->row();
		}
	}
	function nomDistrictDocteur($id)
	{
		$this->db->select('*');
		$this->db->from('district');
		$this->db->where('IDDISTRICT', $id);
		$query = $this->db->get();
		if (count($query->result()) > 0) {
			return $query->row();
		}
	}
	function nomCommuneDocteur($id)
	{
		$this->db->select('*');
		$this->db->from('commune');
		$this->db->where('IDCOMMUNE', $id);
		$query = $this->db->get();
		if (count($query->result()) > 0) {
			return $query->row();
		}
	}

	function selectPharmacie()
	{
		$this->db->select("*");
		$this->db->from("pharmacie");
		$query = $this->db->get();
		return $query;
	}
	function selectProvincePharmacie($id)
	{
		$this->db->select("*");
		$this->db->from("pharmacie");
		$this->db->where("PROVINCEPHARMACIE", $id);
		$query = $this->db->get();
		return $query;
	}
	function selectRegionPharmacie($id)
	{
		$this->db->select("*");
		$this->db->from("pharmacie");
		$this->db->where("REGIONPHARMACIE", $id);
		$query = $this->db->get();
		return $query;
	}
	function selectDistrictPharmacie($id)
	{
		$this->db->select("*");
		$this->db->from("pharmacie");
		$this->db->where("DISTRICTPHARMACIE", $id);
		$query = $this->db->get();
		return $query;
	}
	function selectCommunePharmacie($id)
	{
		$this->db->select("*");
		$this->db->from("pharmacie");
		$this->db->where("COMMUNEPHARMACIE", $id);
		$query = $this->db->get();
		return $query;
	}

	function pharmacie($id){
		$this->db->select("*");
		$this->db->from("pharmacie");
		$this->db->where("IDPHARMACIE",$id);
		$query=$this->db->get();
		return $query;
	}

	function nomProvincePharmacie($id)
	{
		$this->db->select('*');
		$this->db->from('province');
		$this->db->where('IDPROVINCE', $id);
		$query = $this->db->get();
		if (count($query->result()) > 0) {
			return $query->row();
		}
	}
	function nomRegionPharmacie($id)
	{
		$this->db->select('*');
		$this->db->from('region');
		$this->db->where('IDREGION', $id);
		$query = $this->db->get();
		if (count($query->result()) > 0) {
			return $query->row();
		}
	}
	function nomDistrictPharmacie($id)
	{
		$this->db->select('*');
		$this->db->from('district');
		$this->db->where('IDDISTRICT', $id);
		$query = $this->db->get();
		if (count($query->result()) > 0) {
			return $query->row();
		}
	}
	function nomCommunePharmacie($id)
	{
		$this->db->select('*');
		$this->db->from('commune');
		$this->db->where('IDCOMMUNE', $id);
		$query = $this->db->get();
		if (count($query->result()) > 0) {
			return $query->row();
		}
	}

	function medicament($query){
		if ($query != '') {
			$this->db->select("*");
			$this->db->from("medicament");
			$this->db->like('NOMMEDICAMENT', $query);
			$this->db->or_like('PRIXMEDICAMENT', $query);
			$this->db->order_by('NOMMEDICAMENT', 'ASC');
			return $this->db->get();
		} else {
			$this->db->select("*");
			$this->db->from("medicament");
			$this->db->order_by('NOMMEDICAMENT', 'ASC');
			return $this->db->get();
		}
	}

	function onePharmacie($idPharmacie){
		$this->db->select("*");
		$this->db->from('pharmacie');
		$this->db->where('IDPHARMACIE',$idPharmacie);
		$query = $this->db->get();
		if (count($query->result()) > 0) {
			return $query->row();
		}
	}

	function oneProvince($idProvince){
		$this->db->select("*");
		$this->db->from("province");
		$this->db->where("IDPROVINCE",$idProvince);
		$query = $this->db->get();
		if (count($query->result()) > 0) {
			return $query->row();
		}
	}

	function selectMedicament($idMedicament){
		$this->db->select("*");
		$this->db->from("medicament");
		$this->db->where("IDMEDICAMENT",$idMedicament);
		$query = $this->db->get();
		if (count($query->result()) > 0) {
			return $query->row();
		}
	}
	function oneRegion($idRegion){
		$this->db->select("*");
		$this->db->from("region");
		$this->db->where("IDREGION",$idRegion);
		$query = $this->db->get();
		if (count($query->result()) > 0) {
			return $query->row();
		}
	}
	function oneDistrict($idDisctrict){
		$this->db->select("*");
		$this->db->from("district");
		$this->db->where("IDDISTRICT",$idDisctrict);
		$query = $this->db->get();
		if (count($query->result()) > 0) {
			return $query->row();
		}
	}
	function oneCommune($idCommune){
		$this->db->select("*");
		$this->db->from("commune");
		$this->db->where("IDCOMMUNE",$idCommune);
		$query = $this->db->get();
		if (count($query->result()) > 0) {
			return $query->row();
		}
	}

	function selectClinique()
	{
		$this->db->select("*");
		$this->db->from("clinique");
		$query = $this->db->get();
		return $query;
	}
	function selectProvinceClinique($id)
	{
		$this->db->select("*");
		$this->db->from("clinique");
		$this->db->where("PROVINCECLINIQUE", $id);
		$query = $this->db->get();
		return $query;
	}
	function selectRegionClinique($id)
	{
		$this->db->select("*");
		$this->db->from("clinique");
		$this->db->where("REGIONCLINIQUE", $id);
		$query = $this->db->get();
		return $query;
	}
	function selectDistrictClinique($id)
	{
		$this->db->select("*");
		$this->db->from("clinique");
		$this->db->where("DISTRICTCLINIQUE", $id);
		$query = $this->db->get();
		return $query;
	}
	function selectCommuneClinique($id)
	{
		$this->db->select("*");
		$this->db->from("clinique");
		$this->db->where("COMMUNECLINIQUE", $id);
		$query = $this->db->get();
		return $query;
	}

	function clinique($id){
		$this->db->select("*");
		$this->db->from("clinique");
		$this->db->where("IDCLINIQUE",$id);
		$query=$this->db->get();
		return $query;
	}

	function nomProvinceClinique($id)
	{
		$this->db->select('*');
		$this->db->from('province');
		$this->db->where('IDPROVINCE', $id);
		$query = $this->db->get();
		if (count($query->result()) > 0) {
			return $query->row();
		}
	}
	function nomRegionClinique($id)
	{
		$this->db->select('*');
		$this->db->from('region');
		$this->db->where('IDREGION', $id);
		$query = $this->db->get();
		if (count($query->result()) > 0) {
			return $query->row();
		}
	}
	function nomDistrictClinique($id)
	{
		$this->db->select('*');
		$this->db->from('district');
		$this->db->where('IDDISTRICT', $id);
		$query = $this->db->get();
		if (count($query->result()) > 0) {
			return $query->row();
		}
	}
	function nomCommuneClinique($id)
	{
		$this->db->select('*');
		$this->db->from('commune');
		$this->db->where('IDCOMMUNE', $id);
		$query = $this->db->get();
		if (count($query->result()) > 0) {
			return $query->row();
		}
	}

}

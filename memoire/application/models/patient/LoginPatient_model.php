<?php

class LoginPatient_model extends CI_Model
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

	function inscrire($data)
	{
		return $this->db->insert('patient', $data);
	}

	function login($mail, $mdp)
	{
		$this->db->select("*");
		$this->db->from("patient");
		$this->db->where(array('MAILPATIENT' => $mail, 'MDPPATIENT' => $mdp));
		$query = $this->db->get();
		if (count($query->result()) > 0) {
			return $query->row();
		}
	}

	function modifierPatient($data)
	{
		return $this->db->update('patient', $data, array('IDPATIENT' => $data['IDPATIENT']));
	}



	function provincePatient($id)
	{
		$this->db->select("*");
		$this->db->from("province");
		$this->db->where("IDPROVINCE", $id);
		$query = $this->db->get();
		if (count($query->result()) > 0) {
			return $query->row();
		}
	}

	
	function regionPatient($id)
	{
		$this->db->select("*");
		$this->db->from("region");
		$this->db->where("IDREGION", $id);
		$query = $this->db->get();
		if (count($query->result()) > 0) {
			return $query->row();
		}
	}

		
	function districtPatient($id)
	{
		$this->db->select("*");
		$this->db->from("district");
		$this->db->where("IDDISTRICT", $id);
		$query = $this->db->get();
		if (count($query->result()) > 0) {
			return $query->row();
		}
	}

	function communePatient($id)
	{
		$this->db->select("*");
		$this->db->from("commune");
		$this->db->where("IDCOMMUNE", $id);
		$query = $this->db->get();
		if (count($query->result()) > 0) {
			return $query->row();
		}
	}



}

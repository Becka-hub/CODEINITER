<?php

class LoginDocteur_model extends CI_Model
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

	function validationCode($code)
	{
		$this->db->select("*");
		$this->db->from("docteur");
		$this->db->where(array('CODEDOCTEUR' => $code));
		$query = $this->db->get();
		if (count($query->result()) > 0) {
			return $query->row();
		}
	}

	function inscrire($data)
	{
		return $this->db->insert('docteur', $data);
	}


	function login($mail, $mdp)
	{
		$this->db->select("*");
		$this->db->from("docteur");
		$this->db->where(array('MAILDOCTEUR' => $mail, 'MDPDOCTEUR' => $mdp));
		$query = $this->db->get();
		if (count($query->result()) > 0) {
			return $query->row();
		}
	}

	function modifierDocteur($data)
	{
		return $this->db->update('docteur', $data, array('IDDOCTEUR' => $data['IDDOCTEUR']));
	}



	function provinceDocteur($id)
	{
		$this->db->select("*");
		$this->db->from("province");
		$this->db->where("IDPROVINCE", $id);
		$query = $this->db->get();
		if (count($query->result()) > 0) {
			return $query->row();
		}
	}

	
	function regionDocteur($id)
	{
		$this->db->select("*");
		$this->db->from("region");
		$this->db->where("IDREGION", $id);
		$query = $this->db->get();
		if (count($query->result()) > 0) {
			return $query->row();
		}
	}

		
	function districtDocteur($id)
	{
		$this->db->select("*");
		$this->db->from("district");
		$this->db->where("IDDISTRICT", $id);
		$query = $this->db->get();
		if (count($query->result()) > 0) {
			return $query->row();
		}
	}

	function communeDocteur($id)
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

<?php

class Pharmacie_model extends CI_Model
{
	function selectProvince()
	{
		$this->db->select("*");
		$this->db->from("province");
		$this->db->order_by('NOMPROVINCE', 'ASC');
		$query = $this->db->get();
		return $query;
	}
	function selectPayement($id)
	{
		$this->db->select("*");
		$this->db->from('payementpharmacie');
		$this->db->where('IDPHARMACIE', $id);
		$query = $this->db->get();
		return $query;
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
		} else {
			$this->db->select("*");
			$this->db->from("medicament");
			$this->db->where('IDPHARMACIE', $idPharmacie);
			return $this->db->get();
		}
	}

	function oneMedicament($idMedicament, $idPharmacie)
	{
		$this->db->select('*');
		$this->db->from('medicament');
		$this->db->where('IDMEDICAMENT', $idMedicament);
		$this->db->where('IDPHARMACIE', $idPharmacie);
		return $this->db->get();
	}

	function selectMedicament($idMedicament, $idPharmacie)
	{
		$this->db->select('*');
		$this->db->from('medicament');
		$this->db->where('IDMEDICAMENT', $idMedicament);
		$this->db->where('IDPHARMACIE', $idPharmacie);
		$query = $this->db->get();
		if (count($query->result()) > 0) {
			return $query->row();
		}
	}
	function verifieMedicament($idPatient, $idMedicament, $idPharmacie)
	{
		$this->db->select('*');
		$this->db->from('panier');
		$this->db->where(array('IDPATIENT' => $idPatient, 'IDMEDICAMENT' => $idMedicament, 'IDPHARMACIE' => $idPharmacie));
		$query = $this->db->get();
		if (count($query->result()) > 0) {
			return $query->row();
		};
	}

	function ajoutePanier($data)
	{
		return $this->db->insert('panier', $data);
	}

	function selectPanier($idPatient, $idPharmacie)
	{
		$this->db->select('*');
		$this->db->from('panier');
		$this->db->where(array('IDPATIENT' => $idPatient, 'IDPHARMACIE' => $idPharmacie));
		return $this->db->get();
	}
	function deletePanier($idPanier, $idPatient, $idPharmacie)
	{
		return $this->db->delete('panier', array('IDPANIER' => $idPanier, 'IDPATIENT' => $idPatient, 'IDPHARMACIE' => $idPharmacie));
	}

	function selectCountPanier($idPatient, $idPharmacie)
	{
		$sql = "SELECT count(IDPANIER) as IDPANIER from panier WHERE IDPATIENT=$idPatient AND  IDPHARMACIE=$idPharmacie";
		$result = $this->db->query($sql);
		return $result->row()->IDPANIER;
	}
	function modifierNombreMedicament($data)
	{
		return $this->db->update('panier', $data, array('IDPANIER' => $data['IDPANIER'], 'IDPATIENT' => $data['IDPATIENT'], 'IDPHARMACIE' => $data['IDPHARMACIE']));
	}
	function getAchats($idPatient, $idPharmacie)
	{
		$this->db->select('*');
		$this->db->from('panier');
		$this->db->where(array('IDPATIENT' => $idPatient, 'IDPHARMACIE' => $idPharmacie));
		return $this->db->get();
	}
	function insertAchat($data)
	{
		return $this->db->insert('achat', $data);
	}
	function suprimerPanier($idPatient, $idPharmacie)
	{
		return $this->db->delete('panier', array('IDPATIENT' => $idPatient, 'IDPHARMACIE' => $idPharmacie));
	}
	function selectAchat($idPatient, $idPharmacie)
	{
		$this->db->select('*');
		$this->db->from('achat');
		$this->db->where(array('IDPATIENT' => $idPatient, 'IDPHARMACIE' => $idPharmacie));
		return $this->db->get();
	}
	function selectOperateur($idPharmacie)
	{
		$this->db->select('*');
		$this->db->from('payementpharmacie');
		$this->db->where('IDPHARMACIE', $idPharmacie);
		return $this->db->get();
	}
	function ajouteReference($data)
	{
		return $this->db->update('achat', $data, array('IDACHAT' => $data['IDACHAT'], 'IDPHARMACIE' => $data['IDPHARMACIE'], 'IDPATIENT' => $data['IDPATIENT']));
	}
	function afficheRecueAchat($idAchat)
	{
		$this->db->select('*');
		$this->db->from('achat');
		$this->db->where('IDACHAT', $idAchat);
		return $this->db->get();
	}
	function suprimerAchat($idAchat, $idPharmacie)
	{
		return $this->db->delete('achat', array('IDACHAT' => $idAchat, 'IDPHARMACIE' => $idPharmacie));
	}

}

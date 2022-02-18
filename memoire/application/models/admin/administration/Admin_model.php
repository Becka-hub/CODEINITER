<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin_model extends CI_Model
{
	function ajoutePassage($data)
	{
		return $this->db->insert('passageadmine', $data);
	}

	function ajouteNotif($data)
	{
		return $this->db->insert('notifboxe', $data);
	}

	function ajoutePayement($data)
	{
		return $this->db->insert('loyerboxe', $data);
	}

	function affichePayement()
	{
		$this->db->select("*");
		$this->db->from("loyerboxe");
		$this->db->order_by('IDLOYERBOXE', 'DESC');
		$query = $this->db->get();
		return $query;
	}

	function suprimerPayement($id)
	{
		return $this->db->delete('loyerboxe', array('IDLOYERBOXE' => $id));
	}

	function selectOnePayement($id)
	{
		$this->db->select("*");
		$this->db->from("loyerboxe");
		$this->db->where("IDLOYERBOXE", $id);
		$query = $this->db->get();
		if (count($query->result()) > 0) {
			return $query->row();
		}
	}

	public function modifierPayement($data,$id)
    {
           return $this->db->update('loyerboxe', $data, array('IDLOYERBOXE' => $id));
    }
}

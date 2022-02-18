<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Passage_model extends CI_Model
{
	function validationPassage($cle)
	{
		$this->db->select("*");
		$this->db->from("passageadmine");
		$this->db->where(array('CLEADMIN' => $cle));
		$query = $this->db->get();
		if (count($query->result()) > 0) {
			return $query->row();
		}
	}
}

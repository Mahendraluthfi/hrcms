<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserpermissionModel extends CI_Model {

	public function get()
		{
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where('level', '2');			
			$db = $this->db->get();
			return $db;
		}	

	public function get_role()
		{
			$this->db->select('*');
			$this->db->from('modul');
			$this->db->where('modul_role', '1');			
			$this->db->where_not_in('modul_level', '2');			
			$db = $this->db->get();
			return $db;
		}	
}

/* End of file SettingModel.php */
/* Location: ./application/models/SettingModel.php */
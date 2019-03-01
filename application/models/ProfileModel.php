<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfileModel extends CI_Model {

	public function get($id)
	{
		$this->db->select('*');
		$this->db->from('employees');
		$this->db->join('positions', 'positions.position_id = employees.employee_position');
		$this->db->where('employee_id', $id);
		$db = $this->db->get();
		return $db;
	}

	public function update($data,$id)
	{
		$this->db->where('employee_id', $id);
		$this->db->update('employees', $data);
	}

}

/* End of file ProfileModel.php */
/* Location: ./application/models/ProfileModel.php */
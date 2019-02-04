<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SalaryModel extends CI_Model
{
	public function list_full()
	{
		$this->db->select('*');
		$this->db->from('employees');
		$this->db->where('employee_duration', 'Full Time');
		$db = $this->db->get();
		return $db;
	}

	public function list_part()
	{
		$this->db->select('*');
		$this->db->from('employees');
		$this->db->where('employee_duration', 'Part Time');
		$db = $this->db->get();
		return $db;
	}

}
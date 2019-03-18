<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SalaryModel extends CI_Model
{
	public function list_full()
	{
		$this->db->select('*');
		$this->db->from('employees');
		$this->db->join('positions', 'positions.position_id = employees.employee_position');
		$this->db->join('attendances_type', 'attendances_type.id = employees.employee_duration');
		$this->db->where('employee_duration', '1');
		$db = $this->db->get();
		return $db;
	}

	public function list_part()
	{
		$this->db->select('*');
		$this->db->from('employees');
		$this->db->join('positions', 'positions.position_id = employees.employee_position');		
		$this->db->where('employee_duration', 'Part Time');
		$db = $this->db->get();
		return $db;
	}
	
	public function list_emp($id)
	{
		$this->db->select('*');
		$this->db->from('salary_detail');
		$this->db->join('employees', 'employees.employee_id = salary_detail.employee_id');
		$this->db->where('salary_detail.employee_id', $id);
		$db =$this->db->get();
		return $db;
	}

	public function tot_allo($id)
	{
		$this->db->select('SUM(nominal) as total');
		$this->db->from('allowances');
		$this->db->where('id_allowance', $id);
		$db =$this->db->get();
		return $db;
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('allowances');
	}

	public function get_allo_id($id)
	{
		$this->db->select('*');
		$this->db->from('allowance_allocated');
		$this->db->join('allowances_master', 'allowances_master.id = allowance_allocated.allowance_id');
		$this->db->where('allowance_allocated.position_id', $id);
		$db = $this->db->get();
		return $db;
	}

}
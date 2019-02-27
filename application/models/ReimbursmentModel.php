<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReimbursmentModel extends CI_Model {

	public function get_all()
		{
			$this->db->select('*, reimbursment.status as sts');
			$this->db->from('reimbursment');
			$this->db->join('employees', 'employees.employee_id = reimbursment.employee_id');
			$this->db->join('reimbursment_category', 'reimbursment_category.id = reimbursment.id_category');	
			$this->db->order_by('reimbursment.date', 'desc');
			$db = $this->db->get();
			return $db;
		}	

	public function get_id($id)
		{
			$this->db->select('*, reimbursment.status as sts');
			$this->db->from('reimbursment');
			$this->db->join('employees', 'employees.employee_id = reimbursment.employee_id');
			$this->db->join('reimbursment_category', 'reimbursment_category.id = reimbursment.id_category');
			$this->db->where('reimbursment.employee_id', $id);
			$this->db->order_by('reimbursment.date', 'desc');
			$db = $this->db->get();
			return $db;
		}

	public function get_detail($id)
		{
			$this->db->select('*');
			$this->db->from('reimbursment');
			$this->db->join('employees', 'employees.employee_id = reimbursment.employee_id');
			$this->db->where('reimbursment.id_reimbursment', $id);			
			$db = $this->db->get();
			return $db;	
		}	
}

/* End of file ReimbursmentModel.php */
/* Location: ./application/models/ReimbursmentModel.php */
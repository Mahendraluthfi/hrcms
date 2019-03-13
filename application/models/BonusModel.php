<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BonusModel extends CI_Model {

	public function get()
		{
			$this->db->select('*');
			$this->db->from('bonus');
			$this->db->join('employees', 'bonus.employee_id = employees.employee_id');
			$this->db->order_by('bonus.bonus_id', 'desc');
			$db = $this->db->get();
			return $db;
		}	

}

/* End of file BonusModel.php */
/* Location: ./application/models/BonusModel.php */
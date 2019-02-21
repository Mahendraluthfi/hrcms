<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sick extends CI_Controller {

	public function __construct()
	{
		parent::__construct();		
		if($this->auth->is_logged_in() == false)
	    {	     
	        redirect('login');
	    }
	    if ($this->access->priv() == false ) {
	    $this->session->set_flashdata('msg', 
	    	'<div class="alert alert-danger" role="alert">
    			<strong>Sorry, You do not have access !
			</div>');	    
	        redirect('dashboard');	
	    }
		$this->load->model('LeaveModel');	    	    
	    
	}
	
	public function index()
	{
		$data['joined_values'] = $this->LeaveModel->getAllData('3');		
		$data['content'] = 'sick';
		$this->load->view('index', $data);					
	}

	public function get($id)
	{
		$data = $this->LeaveModel->get($id)->row();
		echo json_encode($data);
	}

	public function leave_rejected()
	{	
		$data['leave_reply_message'] = $this->input->post('rejection_reason');
		$data['leave_status'] = 'REJECTED';
		$data['action_timestamp'] = date('Y-m-d H:i:s');
		$id = $this->input->post('id');		
		$query = $this->LeaveModel->updateData($data, $id);
		if($query) {
			redirect('sick');	
		}		
	}

	public function leave_approval($id)
	{
		foreach ($this->db->get_where('leaves', array('leave_id' => $id))->result() as $key) {
			$ld = $key->leave_days;
			$id_e = $key->leave_employee;
		}

		$this->db->query("UPDATE employees SET employee_sick_rem = employee_sick_rem - '$ld' WHERE employee_id='$id_e'");			
		$data['leave_status'] = 'APPROVED';
		$data['action_timestamp'] = date('Y-m-d H:i:s');
		$id = $id;		
		$query = $this->LeaveModel->updateData2($data, $id);

		if($query) {
			redirect('sick');	
		}
	}

}

/* End of file Sick.php */
/* Location: ./application/controllers/Sick.php */
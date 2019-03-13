<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bonus extends CI_Controller {

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
	    $this->load->model('BonusModel'); 
	}

	public function index()
	{
		$data['get'] = $this->BonusModel->get()->result();
		$data['employee'] = $this->db->get_where('employees',array('employee_status' => '1'))->result();
		$data['content'] = 'bonus';
		$this->load->view('index', $data);	
	}

	function add()
	{
		$insert = array(
			'employee_id' => $this->input->post('employee'),					
			'bonus_date' => date('Y-m-d', strtotime($this->input->post('date'))),						
			'bonus_amount' => $this->input->post('amount'),								
			'bonus_text' => $this->input->post('text')								
		);		
		$data = $this->db->insert('bonus', $insert);
		echo json_encode($data);
	}

	function edit($id)
	{
		$insert = array(
			'employee_id' => $this->input->post('employee'),					
			'bonus_date' => date('Y-m-d', strtotime($this->input->post('date'))),						
			'bonus_amount' => $this->input->post('amount'),								
			'bonus_text' => $this->input->post('text')								
		);		
		$this->db->where('bonus_id', $id);
		$this->db->update('bonus', $insert);
		echo json_encode(array('status' => TRUE));	
	}

	function get($id)
	{
		$data = $this->db->get_where('bonus',array('bonus_id' => $id))->row();
		echo json_encode($data);
	}

	function delete($id)
	{
		$this->db->where('bonus_id', $id);
		$this->db->delete('bonus');
		redirect('bonus','refresh');
	}

}

/* End of file Bonus.php */
/* Location: ./application/controllers/Bonus.php */
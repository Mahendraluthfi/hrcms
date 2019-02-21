<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Allowances extends CI_Controller {

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
	}

	public function index()
	{
		$data['values'] = $this->db->get('allowances_master')->result();
		$data['content'] = 'allowances';
		$this->load->view('index', $data);	
	}

	public function add()
	{
		$insert = array(
			'allowance_name' => $this->input->post('allowance'),					
			'allowance_nominal' => $this->input->post('nominal')								
		);		
		$data = $this->db->insert('allowances_master', $insert);
		echo json_encode($data);
	}

	public function edit($id)
	{
		$insert = array(
			'allowance_name' => $this->input->post('allowance'),								
			'allowance_nominal' => $this->input->post('nominal')											
		);		
		$this->db->where('id', $id);
		$this->db->update('allowances_master', $insert);
		echo json_encode(array('status' => 'TRUE'));
	}

	public function get($id)
	{
		$data = $this->db->get_where('allowances_master', array('id' => $id))->row();
		echo json_encode($data);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->where('allowances');
		redirect('allowances','refresh');
	}


}

/* End of file Allowances.php */
/* Location: ./application/controllers/Allowances.php */
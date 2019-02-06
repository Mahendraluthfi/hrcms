<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salary_full extends CI_Controller {

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
	    $this->load->model('salarymodel');
	}

	public function index()
	{		
		$data['show'] = $this->salarymodel->list_full()->result();
		$data['content'] = 'salary_full';
		$this->load->view('index', $data);		
	}

	public function view($id)
	{
		
	}

}

/* End of file Salary_full.php */
/* Location: ./application/controllers/Salary_full.php */
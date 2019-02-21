<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salary_emp extends CI_Controller {

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
		$id = $this->session->userdata('iduser');
		$data['row'] = $this->salarymodel->list_emp($id)->result();
		$data['content'] = 'salary_emp';
		$this->load->view('index', $data);			
	}

}

/* End of file Salary_emp.php */
/* Location: ./application/controllers/Salary_emp.php */
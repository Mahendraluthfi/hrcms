<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bonus_emp extends CI_Controller {

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
		$data['get'] = $this->db->get_where('bonus', array('employee_id' => $this->session->userdata('iduser')))->result();
		$data['content'] = 'bonus_emp';
		$this->load->view('index', $data);		
	}

}

/* End of file Bonus_emp.php */
/* Location: ./application/controllers/Bonus_emp.php */
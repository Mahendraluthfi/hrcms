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
	}

	public function index()
	{
		$data['content'] = 'bonus';
		$this->load->view('index', $data);	
	}

}

/* End of file Bonus.php */
/* Location: ./application/controllers/Bonus.php */
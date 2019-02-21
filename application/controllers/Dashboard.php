<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->auth->is_logged_in() == false)
	    {	     
	        redirect('login');
	    }
	}

	public function index()
	{
		$data['content'] = 'home';
		$this->load->view('index', $data);		
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */
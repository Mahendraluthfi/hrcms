<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Att_list extends CI_Controller {

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
	    $this->load->model('AttendanceModel');
	}
		
	public function index()
	{

		$data['list'] = $this->AttendanceModel->getAlldata();
		$data['content'] = 'att_list';
		$this->load->view('index', $data);		
	}

	public function view_qr()
	{				
		$this->load->view('qr');			
	}

	public function generate()
	{
		$this->load->library('ciqrcode');		
		$params['data'] = date('Y-m-d');
		header("Content-Type: image/png");
		$this->ciqrcode->generate($params);
	}

}

/* End of file Att_list.php */
/* Location: ./application/controllers/Att_list.php */
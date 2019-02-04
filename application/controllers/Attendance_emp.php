<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance_emp extends CI_Controller {
	
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
	    $this->load->model('AttendanceModel_emp');
	}
		
	public function index()
	{
		$data['list'] = $this->AttendanceModel_emp->getalldata();
		$data['content'] = 'att_list_emp';
		$this->load->view('index', $data);		
	}
}

/* End of file Attendance_emp.php */
/* Location: ./application/controllers/Attendance_emp.php */
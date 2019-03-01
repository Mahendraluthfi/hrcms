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
		$full = $this->db->get_where('attendances_setting', array('attendance_name' => 'Full Time'))->row();
		$part = $this->db->get_where('attendances_setting', array('attendance_name' => 'Part Time'))->row();
		$data['shf']= date('Y-m-d').'%20'.$full->start_hours;
		$data['ehf']= date('Y-m-d').'%20'.$full->end_hours;
		$data['shp']= date('Y-m-d').'%20'.$part->start_hours;
		$data['ehp']= date('Y-m-d').'%20'.$part->end_hours;
		$data['list'] = $this->AttendanceModel->getalldata();
		$data['content'] = 'att_list';
		$this->load->view('index', $data);		
	}

	public function view_qr($type,$qr)
	{
		if ($type == 'shf') {
			$data['title'] = 'Start Hours Full Time';
		}elseif ($type == 'ehf') {
			$data['title'] = 'End Hours Full Time';
		}elseif ($type == 'shp') {
			$data['title'] = 'Start Hours Part Time';
		}else{
			$data['title'] = 'Start Hours Part Time';
		}
		$data['qr'] = $qr;
		$this->load->view('qr', $data);			
	}

	public function generate($text)
	{
		$this->load->library('ciqrcode');		
		$params['data'] = $text;
		header("Content-Type: image/png");
		$this->ciqrcode->generate($params);
	}

}

/* End of file Att_list.php */
/* Location: ./application/controllers/Att_list.php */
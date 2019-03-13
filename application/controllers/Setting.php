<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->auth->is_logged_in() == false)
	    {	     
	        redirect('login');
	    }
	    if (!$this->session->userdata('level') == "1") {
	    	redirect('login');
	    }
	    $this->load->model('SettingModel');
	}

	public function index()
	{
		$data['get'] = $this->SettingModel->get()->result();
		$data['content'] = 'setting';
		$this->load->view('index', $data);	
	}

	public function add()
	{
		$data['role'] = $this->SettingModel->get_role()->result();
		$data['content'] = 'setting_add';
		$this->load->view('index', $data);	
	}

	public function save()
	{
		$cb = $this->input->post('cb');
		print_r($cb);
	}
}

/* End of file Setting.php */
/* Location: ./application/controllers/Setting.php */
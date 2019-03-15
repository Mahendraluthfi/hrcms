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
	    if ($this->session->userdata('access') > 1) {
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

	public function edit($id)
	{
		$data['user'] = $this->db->get_where('users', array('user_id' => $id))->row();
		$data['role'] = $this->SettingModel->get_role()->result();
		$data['id'] = $id;
		$data['content'] = 'setting_edit';
		$this->load->view('index', $data);	
	}

	public function save()
	{
		$data = array(
			'user_id' => $this->input->post('username'),
			'username' => $this->input->post('username'),
			'name' => $this->input->post('name'),
			'password' => sha1($this->input->post('password')),
			'role' => '1',
			'level' => '2',
			'status' => '1'
		);
		$this->db->insert('users', $data);
		$cb = $this->input->post('cb');
		foreach ($cb as $key => $value) {
			$cek = $this->db->get_where('modul', array('modul_parent' => $key));
			if ($cek->num_rows() > 0) {
				foreach ($cek->result() as $value) {
					$this->db->insert('privilage', array(
						'user_id' => $this->input->post('username'),
						'modul_id' => $value->modul_id
					));
				}
			}
			$this->db->insert('privilage', array(
				'user_id' => $this->input->post('username'),
				'modul_id' => $key
			));
		}
		redirect('setting','refresh');
	}

	public function save_edit()
	{
		$id = $this->input->post('id');
		if (!empty($this->input->post('password')) && !empty($this->input->post('retype')))  {
			$data = array(							
				'name' => $this->input->post('name'),
				'password' => sha1($this->input->post('password')),	
			);			
		}else{
			$data = array(							
				'name' => $this->input->post('name')				
			);			
		}
			$this->db->where('user_id', $id);
			$this->db->update('users', $data);

			$this->db->where('user_id', $id);
			$this->db->delete('privilage');

		$cb = $this->input->post('cb');
		foreach ($cb as $key => $value) {
			$cek = $this->db->get_where('modul', array('modul_parent' => $key));
			if ($cek->num_rows() > 0) {
				foreach ($cek->result() as $value) {
					$this->db->insert('privilage', array(
						'user_id' => $id,
						'modul_id' => $value->modul_id
					));
				}
			}
			$this->db->insert('privilage', array(
				'user_id' => $id,
				'modul_id' => $key
			));
		}
		redirect('setting','refresh');
	}

	public function status($value,$id)
	{
		$this->db->where('user_id', $id);
		$this->db->update('users', array('status' => $value));
		 $this->session->set_flashdata('msg', 
	    	'<div class="alert alert-success" role="alert">
    			<strong>Done !
			</div>');	 
		redirect('setting','refresh');

	}
}

/* End of file Setting.php */
/* Location: ./application/controllers/Setting.php */
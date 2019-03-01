<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_emp extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->auth->is_logged_in() == false)
	    {	     
	        redirect('login');
	    }
	  //   if ($this->access->priv() == false ) {
	  //   $this->session->set_flashdata('msg', 
	  //   	'<div class="alert alert-danger" role="alert">
   //  			<strong>Sorry, You do not have access !
			// </div>');	    
	  //       redirect('dashboard');	
	  //   }	
	  	$this->load->model('ProfileModel');    		
	}	

	public function index()
	{
		$data['get'] = $this->ProfileModel->get($this->session->userdata('iduser'))->row();
		$data['content'] = 'profile_emp';
		$this->load->view('index', $data);	
	}

	public function edit()
	{
		$data['get'] = $this->ProfileModel->get($this->session->userdata('iduser'))->row();
		$data['content'] = 'profile_emp_edit';
		$this->load->view('index', $data);		
	}

	public function update_password()
	{
		$in = $this->input->post();
		$this->db->where('user_id', $this->session->userdata('iduser'));
		$this->db->update('users', array('password' => sha1($in['password'])));
		redirect('profile_emp/edit','refresh');
	}

	public function update()
	{
		$config['upload_path']          = './files/employee_pictures';
        $config['allowed_types']        = 'jpg|jpeg|png|PNG|JPG|JPEG';
        $config['max_size']             = 5000;
        $config['encrypt_name']         = true;

        $this->load->library('upload', $config);
    
		$id = $this->session->userdata('iduser');

		$emp_picture = $_FILES["emp_picture"]["name"];
		$emp_idcard = $_FILES["emp_idcard"]["name"];
		$emp_certificate = $_FILES["emp_certificate"]["name"];

		$data['employee_name'] = $this->input->post('emp_name');
		$data['employee_username'] = $this->input->post('emp_username');		
		$data['employee_phone'] = $this->input->post('emp_phone');
		$data['employee_gender'] = $this->input->post('emp_gender');		
		$data['employee_address'] = $this->input->post('emp_address');
		$data['employee_birth'] = $this->input->post('birth_date');		
		
		//if($this->)
			
		if (!empty($emp_picture)) {
			$this->upload->do_upload('emp_picture');
			$image_upload = $this->upload->data();

			$data['employee_picture'] = 'files/employee_pictures/'.$this->upload->file_name;
		}
		if (!empty($emp_idcard)) {
			$this->upload->do_upload('emp_idcard');
			$image_upload = $this->upload->data();

			$data['employee_idcard'] = 'files/employee_pictures/'.$this->upload->file_name;
		}
		if (!empty($emp_certificate)) {
			$this->upload->do_upload('emp_certificate');
			$image_upload = $this->upload->data();

			$data['employee_certificate'] = 'files/employee_pictures/'.$this->upload->file_name;
		}
		// $message = 'update';
		$this->db->where('user_id', $id);
		$this->db->update('users', array('username' => $this->input->post('emp_username')));
		$command = $this->ProfileModel->update($data, $id);			
		redirect('profile_emp','refresh');
	}

}

/* End of file Profile_emp.php */
/* Location: ./application/controllers/Profile_emp.php */

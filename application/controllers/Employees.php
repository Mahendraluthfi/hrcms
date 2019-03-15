<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employees extends CI_Controller {

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
	    $this->load->model('EmployeeModel');
		$this->load->model('PositionModel');
	}

	public function index()
	{
		$data['show'] = $this->EmployeeModel->getAllData();
		$data['content'] = 'employee';
		$this->load->view('index', $data);				
	}

	public function employee_form($id='')
	{		
		// echo "string";
		if ($id != '') {
			$data['value'] = $this->EmployeeModel->getDataWhere($id)->row();
			$data['title'] = "Edit Employee";

		} else {
			$data['value'] = '';
			$data['title'] = "Add New Employee";

		}
		
		$data['positions'] = $this->PositionModel->getAllData();
		$data['content'] = 'employee_form';
		$this->load->view('index', $data);
	}

	public function profile($id)
	{
		$this->authent->checkLogin();

		$data['value'] = $this->EmployeeModel->getDataWhere($id)->row();
		$data['title'] = "Employee Profile";
		$data['footer'] = $this->footer();
		$data['sidebar']= $this->sidebar();
		$data['header']= $this->header();
		$data['content'] = $this->load->view('employee', $data, true);
		$this->load->view('templates/main', $data);
	}

	public function update_password()
	{	
		$data['employee_password'] = sha1($this->input->post('password'));
		$id = $this->input->post('id');
		
		$command = $this->EmployeeModel->updateData($data, $id);

		redirect('/employees/employee_form/'.$id);
	}	

		public function update_employee($id='')
	{	
		$config['upload_path']          = './files/employee_pictures';
        $config['allowed_types']        = 'jpg|jpeg|png|PNG|JPG|JPEG';
        $config['max_size']             = 5000;
        $config['encrypt_name']         = true;

        $this->load->library('upload', $config);
    
		$id = $this->input->post('id');

		$emp_picture = $_FILES["emp_picture"]["name"];
		$emp_idcard = $_FILES["emp_idcard"]["name"];
		$emp_certificate = $_FILES["emp_certificate"]["name"];

		$data['employee_name'] = $this->input->post('emp_name');
		$data['employee_username'] = $this->input->post('emp_username');
		$data['employee_position'] = $this->input->post('emp_position');
		$data['employee_salary'] = $this->input->post('emp_salary');
		$data['employee_overtime'] = $this->input->post('emp_overtime');
		$data['employee_status'] = $this->input->post('emp_status');
		$data['employee_phone'] = $this->input->post('emp_phone');
		$data['employee_gender'] = $this->input->post('emp_gender');
		$data['employee_duration'] = $this->input->post('emp_duration');
		$data['employee_address'] = $this->input->post('emp_address');
		$data['employee_birth'] = $this->input->post('birth_date');
		$data['employee_start'] = $this->input->post('start_date');
		$data['employee_leave'] = $this->input->post('quota_leave');
		$data['employee_off'] = $this->input->post('quota_off');
		$data['employee_sick'] = $this->input->post('quota_sick');
		$data['employee_leave_rem'] = $this->input->post('quota_leave');
		$data['employee_off_rem'] = $this->input->post('quota_off');
		$data['employee_sick_rem'] = $this->input->post('quota_sick');
		$data['employee_start_leave'] = date('Y-m-d', strtotime(substr($this->input->post('daterange'), 0, 10)));
		$data['employee_end_leave'] = date('Y-m-d', strtotime(substr($this->input->post('daterange'), 13, 10)));
		$data['employee_start_off'] = date('Y-m-d', strtotime(substr($this->input->post('daterange2'), 0, 10)));
		$data['employee_end_off'] = date('Y-m-d', strtotime(substr($this->input->post('daterange2'), 13, 10)));
		$data['employee_start_sick'] = date('Y-m-d', strtotime(substr($this->input->post('daterange3'), 0, 10)));
		$data['employee_end_sick'] = date('Y-m-d', strtotime(substr($this->input->post('daterange3'), 13, 10)));
		
		//if($this->)

		if( is_numeric($id) ) {
			
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
			$message = 'update';
			$this->db->where('user_id', $id);
			$this->db->update('users', array('username' => $this->input->post('emp_username')));
			$command = $this->EmployeeModel->updateData($data, $id);
		} 
		else {
				$data['employee_password'] = sha1($this->input->post('emp_password'));
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
				$message = 'insert';		
				$command = $this->EmployeeModel->insertData($data);
				foreach ($this->db->get_where('employees', array('employee_username' => $this->input->post('emp_username')))->result() as $key) {
					$this->db->insert('users', array(
						'user_id' => $key->employee_id,
						'username' => $key->employee_username,
						'name' => $key->employee_name,
						'password' => $key->employee_password,
						'role' => '2',
						'status' => '1'
					));					
					foreach ($this->db->get_where('modul', array('modul_role' => '2'))->result() as $key1) {
						$this->db->insert('privilage', array(
							'user_id' => $key->employee_id,
							'modul_id' => $key1->modul_id
						));
					}
				}
		}

		if($message == 'insert') {
			//echo json_encode($message);
			redirect('/employees');
		} else {
			redirect('/employees');
		}
	}

	public function get($id)
	{
		$data = $this->EmployeeModel->get_id($id)->row();
		echo json_encode($data);
	}

	public function activation($status, $id)
	{	
		$data['employee_status'] = $status;
		$data2['status'] = $status;
		$activation = $this->EmployeeModel->updateData($data, $id);
		$activation = $this->EmployeeModel->updateData2($data2, $id);
		if( $activation ) {
		    $this->session->set_flashdata('msg', 
	    	'<div class="alert alert-danger" role="alert">
    			<strong>Success !
			</div>');	    

		} else {
			
		}

		redirect('/employees');
	}

	public function delete($id)
	{
		$del = $this->EmployeeModel->deleteData($id);
		$del2 = $this->EmployeeModel->deleteData2($id);
		if( $del && $del2) {
			//$this->session->set_flashdata('success', 'Data user berhasil dihapus');
			$this->session->set_flashdata('msg', 
	    	'<div class="alert alert-danger" role="alert">
    			<strong>Success !
			</div>');	    
		} else {
			//$this->session->set_flashdata('fail', 'Kesalahan penghapusan data terjadi.');
		}

		redirect('/employees');
	}
}

/* End of file Employees.php */
/* Location: ./application/controllers/Employees.php */
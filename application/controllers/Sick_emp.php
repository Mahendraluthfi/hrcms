<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sick_emp extends CI_Controller {

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
	    $this->load->model('LeaveModel_emp');
		$this->load->model('EmployeeModel');
		date_default_timezone_set("Asia/Bangkok");		
	}	

	public function index()
	{
		$cek_status = $this->LeaveModel_emp->cekstatus()->result();
		foreach ($cek_status as $key1) {
			$date=date_create($key1->leave_date_start);
			date_add($date,date_interval_create_from_date_string("2 days"));
			$at =  date_format($date,"Y-m-d H:i:s");
			$this->db->where('leave_id', $key1->leave_id);
			$this->db->update('leaves', array('leave_status' => 'EXPIRED', 'action_timestamp' => $at));
		}
		$us_id = $this->session->userdata('iduser');
		$quota = $this->db->get_where('employees', array('employee_id' => $us_id))->result();
		foreach ($quota as $key) {
			$data['total'] = $key->employee_sick;
			$data['rem'] = $key->employee_sick_rem;
			$data['val_start'] = date('d M Y', strtotime($key->employee_start_sick));
			$data['val_end'] = date('d M Y', strtotime($key->employee_end_sick));
		}
		$row = $this->db->get_where('leaves', array('leave_employee' => $us_id, 'leave_category' => '3'))->result();
		$data['row'] = $row;
		$data['content'] = 'sick_emp';
		$this->load->view('index', $data);		
	}

	public function get($id)
	{
		$data = $this->db->get_where('leaves', array('leave_id' => $id))->row();
		echo json_encode($data);
	}

	public function save()
	{
		$nmfile = 'IMG-'.date('dHis'); 		
		$config['upload_path']          = './files/attachment/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 2048;
        $config['max_width']            = 1900;
        $config['max_height']           = 1200;
        $config['file_name'] 			= $nmfile;         

        $this->load->library('upload', $config);

        if (!empty($_FILES['foto']['name'])) {
	        if ( ! $this->upload->do_upload('foto')){
	            $error = array('error' => $this->upload->display_errors());
	            //$this->load->view('upload_form', $error);
	            echo $error['error'];
	        }else{
	            $data = $this->upload->data();
	            $tmpname1 = $data['file_name'];
	            //$this->load->view('upload_success', $data);
	            //echo "sukses";
	        }
	    }else{
	    	$tmpname1 = '';
	    }

		$date1 = new DateTime(substr($this->input->post('startend'), 0, 10));
		$date2 = new DateTime(substr($this->input->post('startend'), 13, 10));
		$diff = $date2->diff($date1)->format("%a");
		$days = $diff + 1;
		$data = array(
			'leave_employee' => $this->session->userdata('iduser'),
			'leave_category' => '3',
			'leave_message' => $this->input->post('message'),
			'leave_date_start' => substr($this->input->post('startend'), 0, 10),
			'leave_date_end' => substr($this->input->post('startend'), 13, 10),			
			'leave_days' => $days,			
			'leave_status' => 'PENDING',
			'leave_attachment' => $tmpname1,
			'leave_timestamp' => date('Y-m-d H:i:s')			
		);
		$this->db->insert('leaves', $data);
		redirect('leave_emp','refresh');
	}

	public function cancel($id)
	{
		$timestamp = date('Y-m-d H:i:s');
		$this->db->where('leave_id', $id);
		$this->db->update('leaves', array('leave_status' => 'CANCELED', 'action_timestamp' => $timestamp));
		redirect('leave_emp','refresh');
	}


}

/* End of file Sick_emp.php */
/* Location: ./application/controllers/Sick_emp.php */
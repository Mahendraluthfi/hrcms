<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Att_setting extends CI_Controller {

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
		$data['holiday'] = $this->db->get('holiday')->result();
		$data['wh'] = $this->db->get_where('attendances_setting', array('attendance_id' => '1'))->row();
		$data['type'] = $this->db->get_where('attendances_type', array('attendance_type' => 'FULL TIME'))->row();
		$data['type2'] = $this->db->get_where('attendances_type', array('attendance_type' => 'PART TIME'))->row();
		$data['wd'] = $this->db->get('work_day')->result();
		$data['shift'] = $this->db->get_where('attendances_type', array('attendance_type' => 'SHIFT TIME', 'status' => '1'))->result();
		$data['content'] = 'att_setting';
		$this->load->view('index', $data);	
	}


	public function work()
	{
		$this->db->update('work_day', array('status' => '0'));
		$cb = $this->input->post('cb');
		foreach ($cb as $key => $value) {
			$this->db->where('id', $key);
			$this->db->update('work_day', array('status' => '1'));
		}		
		redirect('att_setting','refresh');		
		
	}

	public function work_part()
	{
		$this->db->update('work_day_part', array('status' => '0'));
		$cb = $this->input->post('cb');
		foreach ($cb as $key => $value) {
			$this->db->where('id', $key);
			$this->db->update('work_day_part', array('status' => '1'));
		}		
		redirect('att_setting/part','refresh');		
		
	}

	public function full_save()
	{
		$sh = $this->input->post('starttime');
		$eh = $this->input->post('endtime');		

		$sh1 = $this->input->post('starttimep');
		$eh1 = $this->input->post('endtimep');		

		$data1 = array(
			'start_time' => $sh,
			'end_time' => $eh,
		);

		$data2 = array(
			'start_time' => $sh1,
			'end_time' => $eh1,
		);

		$data = array(
			'tolerance' => $this->input->post('tol'),
			'calculation' => $this->input->post('cal'),
			'charge' => $this->input->post('charge')
		);

		$this->db->where('attendance_type', 'FULL TIME');
		$this->db->update('attendances_type', $data1);

		$this->db->where('attendance_type', 'PART TIME');
		$this->db->update('attendances_type', $data2);
		
		$this->db->update('attendances_setting', $data);
		redirect('att_setting','refresh');
	}


	public function holidate()
	{
		$data = array(
			'date' => $this->input->post('date'),
			'information' => $this->input->post('info')
		);
		$this->db->insert('holiday', $data);
		echo json_encode(array('status' => 'TRUE'));
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('holiday');
		redirect('att_setting','refresh');
	}

	public function shift_save()
	{
		$this->db->insert('attendances_type', array(
			'attendance_name' => $this->input->post('name'),
			'start_time' => $this->input->post('start'),
			'end_time' => $this->input->post('end'),
			'attendance_type' => 'SHIFT TIME'
		));
		echo json_encode(array('status' => TRUE));
	}

	public function shift_edit($id)
	{
		$this->db->where('id', $id);
		$this->db->update('attendances_type', array(
			'attendance_name' => $this->input->post('name'),
			'start_time' => $this->input->post('start'),
			'end_time' => $this->input->post('end')			
		));
		echo json_encode(array('status' => TRUE));
	}

	public function get_shift($id)
	{
		$data = $this->db->get_where('attendances_type', array('id' => $id))->row();
		echo json_encode($data);
	}

	public function delete_shift($id)
	{
		$this->db->where('id', $id);
		$this->db->update('attendances_type', array('status' => 0));
		redirect('att_setting','refresh');
	}

}
	// public function part_save()
	// {
	// 	$sh = $this->input->post('sh1').":".$this->input->post('sh2').":00";
	// 	$eh = $this->input->post('eh1').":".$this->input->post('eh2').":00";

	// 	$data = array(
	// 		'start_hours' => $sh,
	// 		'end_hours' => $eh,
	// 		'tolerance' => $this->input->post('tol'),
	// 		'calculation' => $this->input->post('cal'),
	// 		'charge' => $this->input->post('charge')
	// 	);

	// 	$this->db->where('attendance_name', 'Part Time');
	// 	$this->db->update('attendances_setting', $data);
	// 	redirect('att_setting/part','refresh');
	// }

	// public function full()
	// {		
	// 	$data['content'] = 'att_set_full';
	// 	$this->load->view('index', $data);	
	// }

	// public function part()
	// {
	// 	$data['wh'] = $this->db->get_where('attendances_setting', array('attendance_name' => 'Part Time'))->row();
	// 	$data['wd'] = $this->db->get('work_day_part')->result();
	// 	$data['content'] = 'att_set_part';
	// 	$this->load->view('index', $data);	
	// }

/* End of file Att_setting.php */
/* Location: ./application/controllers/Att_setting.php */
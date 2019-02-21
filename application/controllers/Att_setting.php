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
		$data['content'] = 'att_setting';
		$this->load->view('index', $data);	
	}

	public function full()
	{
		$data['holiday'] = $this->db->get('holiday')->result();
		$data['wh'] = $this->db->get_where('attendances_setting', array('attendance_name' => 'Full Time'))->row();
		$data['wd'] = $this->db->get('work_day')->result();
		$data['content'] = 'att_set_full';
		$this->load->view('index', $data);	
	}

	public function part()
	{
		$data['wh'] = $this->db->get_where('attendances_setting', array('attendance_name' => 'Part Time'))->row();
		$data['wd'] = $this->db->get('work_day_part')->result();
		$data['content'] = 'att_set_part';
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
		redirect('att_setting/full','refresh');		
		// echo print_r($cb);
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
		// echo print_r($cb);
	}

	public function full_save()
	{
		$sh = $this->input->post('sh1').":".$this->input->post('sh2').":00";
		$eh = $this->input->post('eh1').":".$this->input->post('eh2').":00";

		$data = array(
			'start_hours' => $sh,
			'end_hours' => $eh,
			'tolerance' => $this->input->post('tol')
		);

		$this->db->where('attendance_name', 'Full Time');
		$this->db->update('attendances_setting', $data);
		redirect('att_setting/full','refresh');
	}

	public function part_save()
	{
		$sh = $this->input->post('sh1').":".$this->input->post('sh2').":00";
		$eh = $this->input->post('eh1').":".$this->input->post('eh2').":00";

		$data = array(
			'start_hours' => $sh,
			'end_hours' => $eh,
			'tolerance' => $this->input->post('tol')
		);

		$this->db->where('attendance_name', 'Part Time');
		$this->db->update('attendances_setting', $data);
		redirect('att_setting/part','refresh');
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
		redirect('Att_setting/full','refresh');
	}
}

/* End of file Att_setting.php */
/* Location: ./application/controllers/Att_setting.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Position extends CI_Controller {

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
		$this->load->model('PositionModel');	    
	}

	public function index()
	{		
		$data['values'] = $this->PositionModel->getAllData();		
		$data['content'] = 'position';
		$this->load->view('index', $data);	
	}

	public function add()
	{
		$insert = array(
			'position_name' => $this->input->post('position'),					
			'position_status' => '1'					
		);		
		$data = $this->db->insert('positions', $insert);
		echo json_encode($data);
	}

	public function edit($id)
	{
		$insert = array(
			'position_name' => $this->input->post('position')								
		);		
		$this->db->where('position_id', $id);
		$this->db->update('positions', $insert);
		echo json_encode(array('status' => 'TRUE'));
	}

	public function get($id)
	{
		$data = $this->db->get_where('positions', array('position_id' => $id))->row();
		echo json_encode($data);
	}

	public function delete($id)
	{
		$this->db->where('position_id', $id);
		$this->db->update('positions', array('position_status' => '0'));
		redirect('position','refresh');
	}

	public function set_allowance($id)
	{
		$data['where'] = $this->db->get_where('positions', array('position_id' => $id))->row();
		$data['get_check'] = $this->PositionModel->get_check($id);
		$data['get_done'] = $this->PositionModel->get_done($id)->result();
		$data['content'] = 'set_allowance';
		$this->load->view('index', $data);	
	}

	public function save_allocated()
	{
		$cb = $this->input->post('cb');
		$id = $this->input->post('id');
		foreach ($cb as $key => $value) {
			$this->db->insert('allowance_allocated', array(
				'position_id' => $id,
				'allowance_id' => $key
			));
		}
		redirect('position/set_allowance/'.$id,'refresh');
	}

	public function delete_allocated($id,$pid)
	{
		$this->db->where('id', $id);
		$this->db->delete('allowance_allocated');
		redirect('position/set_allowance/'.$pid,'refresh');		
	}

	public function tes()
	{
		$hari_ini = date("Y-m-d");
		$tgl_pertama = date('Y-m-01', strtotime($hari_ini));
		$tgl_terakhir = date('Y-m-t', strtotime($hari_ini));
		echo "Tanggal Hari ini".$hari_ini;
		echo "<br/>";
		echo "Tanggal Pertama di Bulan :".$tgl_pertama;
		echo "<br/>";
		echo "Tanggal Akhir di Bulan ini ".$tgl_terakhir;
	}


}

/* End of file Position.php */
/* Location: ./application/controllers/Position.php */
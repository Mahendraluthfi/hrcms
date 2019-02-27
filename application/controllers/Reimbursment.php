<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reimbursment extends CI_Controller {

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
	    $this->load->model('ReimbursmentModel');
	}

	public function index()
	{
		$data['values']  = $this->ReimbursmentModel->get_all()->result();
		$data['content'] = 'reimbursment';
		$this->load->view('index', $data);		
	}

	public function get($id)
	{
		$data = $this->ReimbursmentModel->get_detail($id)->row();
		echo json_encode($data);
	}

	public function reimbursment_approval($id)
	{
		$this->db->where('id_reimbursment', $id);
		$this->db->update('reimbursment', array('status' => '1'));
		redirect('reimbursment','refresh');
	}

	public function reimbursment_rejected()
	{
		$id = $this->input->post('id');
		$this->db->where('id_reimbursment', $id);
		$this->db->update('reimbursment', array(
			'reject_reason' => $this->input->post('rejection_reason'),
			'status' => '2'));
		redirect('reimbursment','refresh');
	}

	function get_category(){
		$data = $this->db->get_where('reimbursment_category', array('status' => '1'))->result();
		echo json_encode($data);
	}

	function get_ctg_id($id){
		$data = $this->db->get_where('reimbursment_category', array('id' => $id))->row();
		echo json_encode($data);	
	}

	function save_ctg(){
		$this->db->insert('reimbursment_category', array(
			'category' => $this->input->post('ctg')
		));
		echo json_encode(array('status' => TRUE));
	}

	function edit_ctg($id){
		$this->db->where('id', $id);
		$this->db->update('reimbursment_category', array(
			'category' => $this->input->post('ctg')
		));
		echo json_encode(array('status' => TRUE));
	}

	function delete_ctg(){
		$id=$this->input->post('id');		
		$this->db->where('id', $id);
		$this->db->update('reimbursment_category', array('status' => '0'));
		echo json_encode(array('status' => TRUE));
	}

}

/* End of file Reimbursment.php */
/* Location: ./application/controllers/Reimbursment.php */

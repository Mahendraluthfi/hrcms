<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reimbursment_emp extends CI_Controller {

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
		$id = $this->session->userdata('iduser');
		$data['ctg'] = $this->db->get_where('reimbursment_category', array('status' => '1'))->result();
		$data['values']  = $this->ReimbursmentModel->get_id($id)->result();		
		$data['content'] = 'reimbursment_emp';
		$this->load->view('index', $data);		
	}

	public function get($id)
	{
		$data = $this->db->get_where('reimbursment', array('id_reimbursment' => $id))->row();
		echo json_encode($data);
	}

	public function delete($id,$foto='')
	{
		$file = "./files/attachment/".$foto;
		if (!empty($foto)) {
			unlink($file);
		}
		$this->db->where('id_reimbursment', $id);
		$this->db->delete('reimbursment');
		redirect('reimbursment_emp','refresh');
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
	            // echo $error['error'];
	             $this->session->set_flashdata('msg', 
			    	'<div class="alert alert-danger" role="alert">
		    			<strong>Sorry, File Attachment is too large !
					</div>');	    
	            redirect('reimbursment_emp','refresh');
	        }else{
	            $data = $this->upload->data();
	            $tmpname1 = $data['file_name'];
	            //$this->load->view('upload_success', $data);
	            //echo "sukses";
	        }
	    }else{
	    	$tmpname1 = '';
	    }
		$date = date('Y-m-d', strtotime($this->input->post('date')));
		$data = array(
			'employee_id' => $this->session->userdata('iduser'),
			'date' => $date,
			'description' => $this->input->post('description'),
			'foto' => $tmpname1,
			'id_category' => $this->input->post('ctg'),			
			'cost' => $this->input->post('cost')						
		);
		$this->db->insert('reimbursment', $data);
		redirect('reimbursment_emp','refresh');
	}

}

/* End of file Reimbursment_emp.php */
/* Location: ./application/controllers/Reimbursment_emp.php */
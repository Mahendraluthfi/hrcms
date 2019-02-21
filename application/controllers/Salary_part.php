<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salary_part extends CI_Controller {

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
	    $this->load->model('salarymodel');	    
	    
	}

	public function index()
	{
		$data['show'] = $this->salarymodel->list_part()->result();		
		$data['content'] = 'salary_part';
		$this->load->view('index', $data);				
	}

	public function acak($long)
	{
		$char = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		$string = '';
		for ($i=0; $i < $long; $i++) { 			
			$pos = rand(0, strlen($char)-1);
			$string .= $char{$pos};
		}
		return $string;
	}

	public function view($id)
	{
		$data['show'] = $this->db->get_where('employees', array('employee_id' => $id))->row();
		$data['result'] = $this->db->get_where('salary_detail', array('employee_id' => $id))->result();
		for ($i=1; $i < 13; $i++) { 
			$y = date('Y');
			$where = array(
				'year' => $y,
				'month' => $i,
				'employee_id' => $id
			);
			$cek = $this->db->get_where('salary_detail', $where)->num_rows();
			if (empty($cek)) {
				$data['get'.$i] = '<a href="'.base_url('salary_full/createsession/').$id.'/'.$i.'" class="btn btn-danger btn-sm"><i class="fas fa-donate"></i></a>';	
			}else{
				$data['get'.$i] = '<button type="button" class="btn btn-info btn-sm"><i class="ni ni-check-bold"></i></button>';
			}
			// $data['month'.$i] = "";
		}
		$data['year'] = date('Y');
		$data['content'] = 'salary_view';
		$this->load->view('index', $data);	
	}

	public function createsession($id,$month)
	{
		# code...
		$ses_allo = 'ID-'.$this->acak(7);
		$array = array(
			'allowance' => $ses_allo,
			'id' => $id,
			'month' => $month
		);		
		$this->session->set_userdata( $array );
		redirect('salary_full/generate','refresh');

	}

	public function generate()
	{
		$id = $this->session->userdata('id');
		$month = $this->session->userdata('month');
		// $data['tot_allo'] = $this->salarymodel->tot_allo($this->session->userdata('allowance'))->row();
		$data['show'] = $this->db->get_where('employees', array('employee_id' => $id))->row();			
		$data['month'] = $month;			
		$data['content'] = 'salary_generate';
		$this->load->view('index', $data);			
	}

	public function get()
	{
		$data = $this->db->get_where('allowances', array('id_allowance' => $this->session->userdata('allowance')))->result();
		echo json_encode($data);
	}

	public function get_allowance()
	{
		$data = $this->salarymodel->tot_allo($this->session->userdata('allowance'))->row();		
		echo json_encode($data);
	}

	function add_allowance(){		
		$insert = array(
			'id_allowance' => $this->session->userdata('allowance'),		
			'allowance_name' => $this->input->post('allowance'),			
			'nominal' => $this->input->post('nominal')
		);		
		$data = $this->db->insert('allowances', $insert);
		echo json_encode($data);
	}

	function delete(){
		$id=$this->input->post('id');		
		$data = $this->salarymodel->delete($id);
		echo json_encode($data);
	}

}

/* End of file Salary_part.php */
/* Location: ./application/controllers/Salary_part.php */
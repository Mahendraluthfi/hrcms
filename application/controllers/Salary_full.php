<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salary_full extends CI_Controller {

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
		$data['show'] = $this->salarymodel->list_full()->result();
		$data['content'] = 'salary_full';
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
		$this->db->where('id_allowance', $this->session->userdata('allowance'));
		$this->db->delete('allowances');
		$array = array(
			'ses_allo',
			'id',
			'month'
		);		
		$this->session->unset_userdata($array);
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
				$data['get'.$i] = '<a href="'.base_url('salary_full/createsession/').$id.'/'.$i.'" class="btn btn-danger btn-sm">Not Paid</a>';	
			}else{
				$data['get'.$i] = '<button type="button" class="btn btn-success btn-sm">Paid</button>';
			}			
		}
		$data['year'] = date('Y');
		$data['content'] = 'salary_view';
		$this->load->view('index', $data);	
	}

	public function createsession($id,$month)
	{
		$this->db->where('id_allowance', $this->session->userdata('allowance'));
		$this->db->delete('allowances');
		$array = array(
			'allowance',
			'id',
			'month'
		);		
		$this->session->unset_userdata($array);
		$ses_allo = 'ID-'.$this->acak(7);
		$array = array(
			'allowance' => $ses_allo,
			'id' => $id,
			'month' => $month
		);		
		$this->session->set_userdata( $array );
		$gidp = $this->db->get_where('employees', array('employee_id' => $id ))->row();
		$row = $this->salarymodel->get_allo_id($gidp->employee_position);
		foreach ($row->result() as $key) {
			$this->db->insert('allowances', array(
				'id_allowance' => $ses_allo,
				'allowance_name' => $key->allowance_name,
				'nominal' => $key->allowance_nominal				
			));
		}
		redirect('salary_full/generate','refresh');
	}
	
	public function get_deducted_leave()
	{
		$id = $this->session->userdata('id');		
		$month = $this->session->userdata('month');	

		$query = $this->db->query("SELECT SUM(leave_deducted) as deducted FROM leaves WHERE MONTH(leave_timestamp) = '$month' AND leave_employee = '$id'")->row();
		return $query->deducted;
	}

	public function get_deducted_attendance()
	{
		$id = $this->session->userdata('id');		
		$month = $this->session->userdata('month');	

		$query = $this->db->query("SELECT SUM(late_charge) as charge FROM attendances WHERE MONTH(attendance_timestamp) = '$month' AND attendance_employee = '$id'")->row();
		return $query->charge;
	}

	public function pay_per_day()
	{
		$id = $this->session->userdata('id');		
		$month = $this->session->userdata('month');				
		$get_salary = $this->db->get_where('employees', array('employee_id' => $id))->row();
		$a = date("Y-".$month."-01");		
		$b = date('Y-m-t', strtotime($a));
		$begin = new DateTime($a);
		$end = new DateTime($b);

		$daterange     = new DatePeriod($begin, new DateInterval('P1D'), $end);
		//mendapatkan range antara dua tanggal dan di looping
		$i=0;
		$x     =    0;
		$end     =    1;

		foreach($daterange as $date){
		    $daterange     = $date->format("Y-m-d");
		    $datetime     = DateTime::createFromFormat('Y-m-d', $daterange);
		    //Convert tanggal untuk mendapatkan nama hari
		    $day         = $datetime->format('D');
		    //Check untuk menghitung yang bukan hari sabtu dan minggu
		    if($day!="Sun" && $day!="Sat") {
		        //echo $i;
		        $x    +=    $end-$i;		        
		    }
		    $end++;
		    $i++;
		}    
		$tot = $x + 1;
		$deductedperday = $get_salary->employee_salary / $tot;
		return round($deductedperday, 2);		
	}

	public function generate()
	{
		$id = $this->session->userdata('id');
		$month = $this->session->userdata('month');
		$pay_per_day = $this->pay_per_day();
		$leave_deducted = $this->get_deducted_leave();
		$data['leave_deducted'] = $pay_per_day * $leave_deducted;		
		$data['attendance_deducted'] = $this->get_deducted_attendance();		
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
	
	public function get_detail($id){
		$data = $this->db->get_where('allowances', array('id_allowance' => $id))->result();
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

	function submit_salary(){
		$insert = array(
			'employee_id' => $this->session->userdata('id'),
			'id_allowance' => $this->session->userdata('allowance'),
			'year' => date('Y'),
			'month' => $this->session->userdata('month'),
			'date_release' => date('Y-m-d'),
			'salary' => $this->input->post('salary'),
			'deduct_attendance' => $this->input->post('ad'),
			'deduct_leave' => $this->input->post('ld'),
			'total_allowance' => $this->input->post('ta'),
			'total_salary' => $this->input->post('ts') 						
		);
		$data = $this->db->insert('salary_detail', $insert);
		$array = array(
			'allowance',
			'id',
			'month'
		);		
		$this->session->unset_userdata($array);
		echo json_encode($data);
	}
	

}

/* End of file Salary_full.php */
/* Location: ./application/controllers/Salary_full.php */
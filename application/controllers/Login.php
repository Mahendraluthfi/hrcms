<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		if($this->auth->is_logged_in() == false){          
        	$this->load->view('login');
        }else{
            redirect('dashboard','refresh');
        }		
        	
	}

	public function submit()
	{
		$username = $this->input->post('username');
        $password = sha1($this->input->post('password'));        
        $cek = $this->db->get_where('users', array('username' => $username,'password' => $password));
        if (!empty($cek->num_rows())) {
           
            $get = $cek->result();
            foreach ($get as $key) {            
                $ses_admin = array(
                    'iduser' => $key->user_id,
                    'username' => $key->username,                 
                    'name' => $key->name,                 
                    'level' => $key->role                 
                );
                $status = $key->status;
            }  
            if ($status == '1') {
                $this->session->set_userdata($ses_admin);            
                redirect('dashboard','refresh');                
            }else{
                $this->session->set_flashdata('msg','
                <div class="alert alert-danger" role="alert">
                  Account Deactived !
                </div>
                ');       
            redirect('login');    
            }
        }else{     
            $this->session->set_flashdata('msg','
                <div class="alert alert-danger" role="alert">
                  Username or Password Wrong
                </div>
                ');       
            redirect('login');
        }
	}
    
    public function cek()
    {
        echo $this->session->userdata('iduser');
        echo $this->session->userdata('username');
        echo $this->session->userdata('name');
        echo $this->session->userdata('level');
    }

	public function logout()
	{
		session_destroy();		
		redirect(base_url());
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Access
{
	var $ci = NULL;	

	public function __construct()
	{
        $this->ci =& get_instance();
	}

	function priv()
	{		
		$id = $this->ci->session->userdata('iduser');
		$uri = $this->ci->uri->segment(1);
		$set = $this->ci->db->query("SELECT * FROM privilage JOIN modul ON privilage.modul_id=modul.modul_id WHERE privilage.user_id= '$id' AND modul.modul_url= '$uri'");
		$row = $set->num_rows();
		if (!empty($row)) {
			return true;
		}else{
			return false;
		}

	}

	

}

/* End of file Access.php */
/* Location: .//U/Access.php */

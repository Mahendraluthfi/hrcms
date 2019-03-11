<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Qrimages extends CI_Controller {	
	
	public function index()
	{
		$this->load->view('qr');
	}

	public function generate($text)
	{
		$this->load->library('ciqrcode');
		// $config['cacheable']	= true; //boolean, the default is true
		// $config['cachedir']		= ''; //string, the default is application/cache/
		// $config['errorlog']		= ''; //string, the default is application/logs/
		// $config['quality']		= true; //boolean, the default is true
		// $config['size']			= ''; //interger, the default is 1024
		// $config['black']		= array(224,255,255); // array, default is array(255,255,255)
		// $config['white']		= array(70,130,180); // array, default is array(0,0,0)
		// $this->ciqrcode->initialize($config);
		$params['data'] = 'test';
		header("Content-Type: image/png");
		$this->ciqrcode->generate($params);
	}
}

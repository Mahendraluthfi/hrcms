<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Qrcode extends CI_Controller {

	public function index()
	{		 
 
        $this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './asset/'; //string, the default is application/cache/
        $config['errorlog']     = './asset/'; //string, the default is application/logs/
        $config['imagedir']     = './asset/images/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);        
 
        $params['data'] = 'tes'; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].'Coba.png'; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
       
	}

	

}

/* End of file Qrcode.php */
/* Location: ./application/controllers/Qrcode.php */
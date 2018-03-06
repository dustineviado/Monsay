<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sample_controller extends CI_Controller {

	public function index()
	{
		$data['title'] = "Sample";
		
		$this->load->view('templates/header',$data);	
		$this->load->view('vthesis/sample',$data);
		$this->load->view('templates/footer',$data);
	}

}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */
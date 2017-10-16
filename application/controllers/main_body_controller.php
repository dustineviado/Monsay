<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class main_body_controller extends CI_Controller {

	
	public function index()
	{
		$data['title'] = "Ramon Magsaysay High School";
		
		$this->load->view('templates/header',$data);
		$this->load->view('vthesis/main_body',$data);
		$this->load->view('templates/footer',$data);
		
	}
}
	
?>
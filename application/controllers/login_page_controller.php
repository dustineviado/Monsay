<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login_page_controller extends CI_Controller {

	
	public function index()
	{

		$data['title'] = "Login|Ramon Magsaysay High School";
		
		$this->load->view('templates/header',$data);
		$this->load->view('vthesis/login_page',$data);
		$this->load->view('templates/footer',$data);
	}
}

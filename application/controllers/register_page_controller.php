<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class register_page_controller extends CI_Controller {

	
	public function index()
	{
		$data['title'] = "Register | Ramon Magsaysay High School";
		
		$this->load->view('templates/header',$data);	
		$this->load->view('vthesis/register_page',$data);
		$this->load->view('templates/footer',$data);
		
	}
}
	
?>
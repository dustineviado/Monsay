<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class register_page_print_controller extends CI_Controller {

	
	public function index()
	{
		$data['title'] = "Register Print | Ramon Magsaysay High School";
		
		$this->load->view('vthesis/register_page_print',$data);

		
	}
}
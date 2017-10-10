<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login_page_controller extends CI_Controller {

	
	public function index()
	{


		$this->load->view('vthesis/login_page');
	}
}

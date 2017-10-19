<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Adminctrl extends CI_Controller{
		public function index()
	{
		$data['title'] = "Login|Ramon Magsaysay High School";
		$this->load->view('templates/header',$data);
		$this->load->view('vthesis/Adminview');
		$this->load->view('templates/footer',$data);
	}
}		
?>
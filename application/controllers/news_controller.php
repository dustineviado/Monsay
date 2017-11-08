<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class news_controller extends CI_Controller {

	
	public function index()
	{
		$data['title'] = "Ramon Magsaysay High School";
		
		$this->load->view('templates/header',$data);
		$this->load->view('vthesis/news',$data);
		$this->load->view('templates/footer',$data);
		
	}
}
	
?>
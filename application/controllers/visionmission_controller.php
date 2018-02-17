<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class visionmission_controller extends CI_Controller {

	
	public function index()
	{
		$data['title'] = "Haven of Virtue and Excellence Academy Inc.";
		
		$this->load->view('templates/header',$data);
		$this->load->view('vthesis/visionmission',$data);
		$this->load->view('templates/footer',$data);
		
	}
}
	
?>
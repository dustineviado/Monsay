<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Studlog_controller extends CI_Controller {

	public function index()
	{
		$data['title'] = "Ramon Magsaysay High School";
		
		$this->load->view('templates/header',$data);
		$this->load->view('vthesis/student_dashboard',$data);
		$this->load->view('templates/footer',$data);
	}



	










}

/* End of file studlog_controller.php */
/* Location: ./application/controllers/studlog_controller.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacherlog_controller extends CI_Controller {

	public function index()
	{
		$data['title'] = "Ramon Magsaysay High School";
		
		$this->load->view('templates/header',$data);
		$this->load->view('vthesis/teacher_dashboard',$data);
		$this->load->view('templates/footer',$data);
	}
}

/* End of file teacherlog_controller.php */
/* Location: ./application/controllers/teacherlog_controller.php */
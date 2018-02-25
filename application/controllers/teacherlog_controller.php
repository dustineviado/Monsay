<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacherlog_controller extends CI_Controller {

	public function index()
	{
		$data['title'] = "Haven of Virtue and Excellence Academy Inc.";
		$active['menu']='active';
		$this->load->view('templates/header',$data);
		$this->load->view('vthesis/teacher_dashboard',$active);
		$this->load->view('templates/footer',$data);
	}
}

/* End of file teacherlog_controller.php */
/* Location: ./application/controllers/teacherlog_controller.php */
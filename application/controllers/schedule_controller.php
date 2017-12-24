<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class schedule_controller extends CI_Controller {

	public function index()
	{
		$data['title'] = "Schedule | Ramon Magsaysay High School";

		$this->load->view('templates/header',$data);
		$this->load->view('vthesis/schedule',$data);
		$this->load->view('templates/footer',$data);
	}

}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */
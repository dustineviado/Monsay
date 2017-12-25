<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Preenrolcontrol extends CI_Controller {

	public function index()
	{ 
		$data ['title']= "Pre Enrollee";
		$this->load->view('templates/header', $data);
		$this->load->model('Pre_enrol_model');
		$prestud = $this->Pre_enrol_model->gettbl();
		$this->load->view('vthesis/Preenrolview',['prestud'=>$prestud]);
		$this->load->view('templates/footer', $data);
	}
	

}

/* End of file preenrolcontrol.php */
/* Location: ./application/controllers/preenrolcontrol.php */
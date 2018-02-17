<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class schoolyear_controller extends CI_Controller {

	public function __construct(){
       
        parent::__construct();
        $this->load->model('schoolyear_model','mdl');
        $this->load->helper('url_helper');

    }

	public function index()
	{
		$data['title'] = "Schoolyear | Haven of Virtue and Excellence Academy Inc.";

		$this->load->view('templates/header',$data);
		$this->load->view('vthesis/schoolyear',$data);
		$this->load->view('templates/footer',$data);
	}

	public function endschoolyear(){
		$sid = $this->input->post('sid');
		$this->mdl->schoolyearend($sid);
		echo 'School Year has been ended';

	}
}

/* End of file schoolyear_controller.php */
/* Location: ./application/controllers/schoolyear_controller.php */
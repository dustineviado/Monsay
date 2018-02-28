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
		$active['menu']='active';
		$this->load->view('templates/header',$data);
		$this->load->view('vthesis/schoolyear',$active);
		$this->load->view('templates/footer',$data);
		if($this->session->userdata('user_type') == 'Admin'){
		}
		else if($this->session->userdata('user_type') == 'Student'){
				redirect('studlog_controller','refresh');
			
		}
		else if($this->session->userdata('user_type') =='Teacher'){
				redirect('teacherlog_controller','refresh');
		}
		else if($this->session->userdata('user_type')==null){
			redirect('main_body_controller','refresh');
		}
    }
	

	public function endschoolyear(){
		$sid = $this->input->post('sid');
		$this->mdl->schoolyearend($sid);
		echo 'School Year has been ended';

	}
}

/* End of file schoolyear_controller.php */
/* Location: ./application/controllers/schoolyear_controller.php */
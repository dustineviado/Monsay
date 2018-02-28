<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class teacherlog_controller extends CI_Controller {

	public function __construct(){
       
        parent::__construct();
        $this->load->model('teacherlog_model','mdl');
        $this->load->helper('url_helper');
      
    }

	public function index()
	{
		
		$data['title'] = "Haven of Virtue and Excellence Academy Inc.";
		$active['menu']='active';
		$this->load->view('templates/header',$data);
		$this->load->view('vthesis/teacher_dashboard',$active);
		$this->load->view('templates/footer',$data);
		if($this->session->userdata('user_type') == 'Teacher'){
	}
	else if($this->session->userdata('user_type') == 'Student'){
				
				redirect('studlog_controller','refresh');
			
		}
		else if($this->session->userdata('user_type') =='Admin'){
				redirect('admin_controller','refresh');
		}
		else if($this->session->userdata('user_type')==null){

			redirect('main_body_controller','refresh');
		}
    }
	
	

	function getschedule()  
	      {    $sid = $this->session->userdata('login_session');
	           $data = $this->mdl->scheduleget($sid); 
	           echo json_encode($data);  
	      }
}

/* End of file teacherlog_controller.php */
/* Location: ./application/controllers/teacherlog_controller.php */
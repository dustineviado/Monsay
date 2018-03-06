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
				$output = array();
			    $sid = $_SESSION['id_number'];
	            $dataname= $this->mdl->nameget($sid);
	            foreach($dataname as $row){
	            	$output['fname'] = $row->fname;
	            	$output['mname'] = $row->mname;
	            	$output['lname'] = $row->lname;
	            }


	    $data['fullname'] = $output['fname'].' '.$output['mname'].' '.$output['lname'];
		$data['title'] = "Haven of Virtue and Excellence Academy Inc.";
		$data['menu']='active';
		$this->load->view('templates/header',$data);
		$this->load->view('vthesis/teacher_dashboard',$data);
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
	
	

	function getschedule(){    
			   $sid = $_SESSION['id_number'];
	           $data = $this->mdl->scheduleget($sid); 
	           echo json_encode($data);  
	      }

}

/* End of file teacherlog_controller.php */
/* Location: ./application/controllers/teacherlog_controller.php */
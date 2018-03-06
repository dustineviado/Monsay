<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Studlog_controller extends CI_Controller {

	public function __construct(){
       	
        parent::__construct();
        $this->load->model('studlog_model','mdl');
        $this->load->helper('url_helper');
      	 


    }

	public function index()
	{	

		if($this->session->userdata('user_type') == 'Student'){
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
		$this->load->view('vthesis/student_dashboard',$data);
		$this->load->view('templates/footer',$data);

       
		}
		else if($this->session->userdata('user_type') == 'Teacher'){
					
				redirect('teacherlog_controller', 'refresh');
			
		}
		else if($this->session->userdata('user_type') == 'Admin'){
				redirect('admin_controller','refresh');
		}
		else if($this->session->userdata('user_type')==null){

			redirect('main_body_controller','refresh');
		}

	}

	function getschedule()  
	      {    $sid = $_SESSION['id_number'];
	           $data = $this->mdl->scheduleget($sid); 
	           echo json_encode($data);  
	      }


}

/* End of file studlog_controller.php */
/* Location: ./application/controllers/studlog_controller.php */
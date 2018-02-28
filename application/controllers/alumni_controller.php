<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class alumni_controller extends CI_Controller {

	public function __construct(){
       
        parent::__construct();
        $this->load->model('alumni_model','mdl');
        $this->load->helper('url_helper');

    }

	public function index()
	{
		$data['title'] = "Alumni | Haven of Virtue and Excellence Academy Inc.";
		$active['menu']='active';
		$this->load->view('templates/header',$data);
		$this->load->view('vthesis/alumni.php',$active);
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
	

	function fetch_user(){  
           $this->load->model("alumni_model");  
           $fetch_data = $this->mdl->make_datatables();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = $row->id_num;  
                $sub_array[] = $row->fname.' '.$row->mname.' '.$row->lname;  
                $sub_array[] = '<button type="button" name="viewgrades" id="'.$row->id_num.'" class="btn alumnisubbtn btn-xs viewgrades">View Grades</button> <button type="button" name="print" id="'.$row->id_num.'" class="btn alumnisubbtn btn-xs printgrades">Print Grades</button>';
                $data[] = $sub_array;  
           }  
           $output = array(   
                "recordsTotal"          =>      $this->mdl->get_all_data(),  
                "recordsFiltered"     =>     $this->mdl->get_filtered_data(),  
                "data"                    =>     $data  
           );  
           echo json_encode($output);  
     }

     public function allyear(){
		$sid = $this->input->post('id_num');
		$data = $this->mdl->yearall($sid);
		echo json_encode($data);
	}

	public function allsubjects(){

		$sid = array(
		$this->input->post('id_num'),
		$this->input->post('schoolyear')
		);
		$data = $this->mdl->subjectsall($sid);

		echo json_encode($data); 
	}

	public function allgrades(){
		$sid = array(
		$this->input->post('id_num'),
		$this->input->post('schoolyear'),
		$this->input->post('subjectid')
		);

		$datas = $this->mdl->gradesall($sid);

		echo json_encode($datas);
	}

	public function printpage1(){

		$newdata = $this->input->post('id_num');

		$this->session->set_userdata('id',$newdata);

		echo json_encode($newdata);
	}
}

/* End of file alumni_controller.php */
/* Location: ./application/controllers/alumni_controller.php */
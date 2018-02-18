<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subject_controller extends CI_Controller {

	public function __construct(){
       
        parent::__construct();
        $this->load->model('subject_model','mdl');
        $this->load->helper('url_helper');

    }

	public function index(){

		$data['title'] = "Subjects | Ramon Magsaysay High School";

		$this->load->view('templates/header',$data);
		$this->load->view('vthesis/subject',$data);
		$this->load->view('templates/footer',$data);

	}

	function check_subid($key){
		$key = $this->input->post('subid');
		$this->load->model('subject_model');
		$brat = $this->subject_model->id_exist($key);
			echo $brat;
			
		
	}

	public function subjectaction(){
		$this->form_validation->set_rules('subjectidname', 'Subject ID', 'callback_check_subid');
		$this->form_validation->set_rules('subjectname', 'Subject Name', 'required');
		$this->form_validation->set_rules('subjectfaculty', 'Subject Faculty', 'required');
		$this->form_validation->set_rules('subjectlevel', 'Level', 'required');
		
		if($this->form_validation->run()){
			$hidden = $this->input->post('subjecthid');

	 		if($hidden == "Add"){
	                $insert_data = array(  
	                     'subid'=>$this->input->post('subjectidname'),
	                     'subject'=>$this->input->post('subjectname'),
	                     'faculty'=>$this->input->post('subjectfaculty'),
	                     'year_level'=>$this->input->post('subjectlevel'));  
	               	
	                $this->mdl->addsubject($insert_data);
	                echo 'Subject Added';
	           }
	           else if($hidden == "Edit"){
	           		$updated_data = array(  
	                     'subid'=>$this->input->post('subjectidname'),
	                     'subject'=>$this->input->post('subjectname'),
	                     'faculty'=>$this->input->post('subjectfaculty'),
	                     'year_level'=>$this->input->post('subjectlevel'));  
	               	
	                $this->mdl->subjectedit2($updated_data);
	                echo 'Subject Updated';
	           }
	           else{
	           		echo 'Error';
	           }
	        }
	        else{
	        	echo validation_errors();
	        }   
      	}

	public function deletesubject(){
		       $this->load->model("subject_model");  
	           $this->mdl->subjectdelete($_POST["sid"]);  
	           echo 'Subject Deleted';
	}

	function fetch_user(){  
           $this->load->model("subject_model");  
           $fetch_data = $this->mdl->make_datatables();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = $row->subid;  
                $sub_array[] = $row->subject;  
                $sub_array[] = $row->faculty;
                $sub_array[] = $row->year_level;
                $sub_array[] = '<button type="button" name="delete" id="'.$row->subid.'" class="btn addsubbtn3 btn-xs delete">Delete</button> <button type="button" name="edit" id="'.$row->subid.'" class="btn addsubbtn3 btn-xs edit">Edit</button>';
                $data[] = $sub_array;  
           }  
           $output = array(   
                "recordsTotal"          =>      $this->mdl->get_all_data(),  
                "recordsFiltered"     =>     $this->mdl->get_filtered_data(),  
                "data"                    =>     $data  
           );  
           echo json_encode($output);  
      }

  	     function fetch_single_user()  
	      {  
	           $output = array();  
	           $data = $this->mdl->subjectedit1($_POST["sid"]);  
	           foreach($data as $row)  
	           {  
	                $output['subjectidname'] = $row->subid;  
	                $output['subjectname'] = $row->subject;
	                $output['subjectfaculty'] = $row->faculty;
	                $output['subjectlevel'] = $row->year_level;
	           }  
	           echo json_encode($output);  
	      }    
 }  

/* End of file  subject_controller.php */
/* Location: ./application/controllers/ subject_controller.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class subject_controller2 extends CI_Controller {

	public function __construct(){
       
        parent::__construct();
        $this->load->model('subject_model2','mdl');
        $this->load->helper('url_helper');

    }

	public function index(){

		$data['title'] = "Subjects2 | Ramon Magsaysay High School";

		$this->load->view('templates/header',$data);
		$this->load->view('vthesis/subject2',$data);
		$this->load->view('templates/footer',$data);

	}

	public function subjectaction(){
			$hidden = $this->input->post('hidden');

			/*if($hidden == "Add"){
				print_r($_POST);
				print_r("Add Working");
			}
			else if($hidden == "Edit"){
				print_r($_POST);
				print_r("Edit Working");
			}
			else{
				print_r("fuck this shit");
			}*/


	 		if($hidden == "Add"){
	                $insert_data = array(  
	                     'subid'=>$this->input->post('id'),
	                     'subject'=>$this->input->post('name'),
	                     'faculty'=>$this->input->post('fac'),
	                     'year_level'=>$this->input->post('lvl'));  
	               	
	                $this->mdl->addsubject($insert_data);
	                echo 'Subject Added';
	           }
	           else if($hidden == "Edit"){
	           		$updated_data = array(  
	                     'subid'=>$this->input->post('id'),
	                     'subject'=>$this->input->post('name'),
	                     'faculty'=>$this->input->post('fac'),
	                     'year_level'=>$this->input->post('lvl'));  
	               	
	                $this->mdl->subjectedit2($updated_data);
	                echo 'Subject Updated';
	           }
	           else{
	           		echo 'Error';
	           }
      	}

	public function deletesubject(){
		       $this->load->model("subject_model2");  
	           $this->subject_model2->subjectdelete($_POST["sid"]);  
	           echo 'Subject Deleted';
	}

	function fetch_user(){  
           $this->load->model("subject_model2");  
           $fetch_data = $this->subject_model2->make_datatables();  
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
                "recordsTotal"          =>      $this->subject_model2->get_all_data(),  
                "recordsFiltered"     =>     $this->subject_model2->get_filtered_data(),  
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
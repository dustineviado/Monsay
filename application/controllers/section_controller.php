<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class section_controller extends CI_Controller {

	public function __construct(){
       
        parent::__construct();
        $this->load->model('section_model','mdl');
        $this->load->helper('url_helper');

    }

	public function index(){

		$data['title'] = "Sections | Ramon Magsaysay High School";

		$this->load->view('templates/header',$data);
		$this->load->view('templates/admin_sidebar', $data, 'refresh');
		$this->load->view('vthesis/section',$data);
		$this->load->view('templates/footer',$data);

	}

	public function sectionaction(){
			$hidden = $this->input->post('hidden');

	 		if($hidden == "Add"){
	                $insert_data = array(  
	                     'secid'=>$this->input->post('id'),
	                     'section_name'=>$this->input->post('name'),
	                     'year_level'=>$this->input->post('lvl'),
	                	 'scheid'=>$this->input->post('sceid'));  
	               	
	                $this->mdl->addsection($insert_data);
	                echo 'Section Added';
	           }
	           else if($hidden == "Edit"){
	           		$updated_data = array(  
	                     'secid'=>$this->input->post('id'),
	                     'section_name'=>$this->input->post('name'),
	                     'year_level'=>$this->input->post('lvl'),
	                 	 'scheid'=>$this->input->post('sceid'));  
	               	
	                $this->mdl->sectionedit2($updated_data);
	                echo 'Section Updated';
	           }
	           else{
	           		echo 'Error';
	           }
      	}

	public function deletesection(){
		       $this->load->model("section_model");  
	           $this->section_model->sectiondelete($_POST["sid"]);  
	           echo 'Section Deleted';
	}

	function fetch_user(){  
           $this->load->model("section_model");  
           $fetch_data = $this->section_model->make_datatables();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = $row->secid;
                $sub_array[] = $row->section_name; 
                $sub_array[] = $row->year_level;
                $sub_array[] = $row->scheid;   
                $sub_array[] = '<button type="button" name="delete" id="'.$row->secid.'" class="btn addsecbtn3 btn-xs delete">Delete</button> <button type="button" name="edit" id="'.$row->secid.'" class="btn addsecbtn3 btn-xs edit">Edit</button>';
                $data[] = $sub_array;  
           }  
           $output = array(   
                "recordsTotal"          =>      $this->section_model->get_all_data(),  
                "recordsFiltered"     =>     $this->section_model->get_filtered_data(),  
                "data"                    =>     $data  
           );  
           echo json_encode($output);  
      }

       function fetch_single_user()  
	      {  
	           $output = array();  
	           $data = $this->mdl->sectionedit1($_POST["sid"]);  
	           foreach($data as $row)  
	           {  
	                $output['sectionidname'] = $row->secid;  
	                $output['sectionname'] = $row->section_name;
	                $output['sectionlevel'] = $row->year_level;
	                $output['scheduleid'] = $row->scheid;
	           }  
	           echo json_encode($output);  
	      }    
 }  

/* End of file  subject_controller.php */
/* Location: ./application/controllers/ subject_controller.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class section_controller extends CI_Controller {

	public function __construct(){
       
        parent::__construct();
        $this->load->model('section_model','mdl');
        $this->load->helper('url_helper');

    }

	public function index(){

		$data['title'] = "Sections | Haven of Virtue and Excellence Academy Inc.";
		$active['menu']='active';
		$this->load->view('templates/header',$data);
		$this->load->view('vthesis/section',$active);
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

	

	public function checkcount(){
		$sid = $this->input->post('sid');

		$data = $this->mdl->countcheck($sid);

		echo json_encode($data);  
	    
	}
	public function check_teacher(){
		$sid = $this->input->post('sectadviser');
		$this->load->model('teacher_model');
		$exist = $this->teacher_model->id_exist($sid);
		// var_dump($exist);
		if($sid == $exist){
			echo 'true';
			// $this->sectionaction();
		}
		else if($sid != $exist){
			echo 'false';
		}
		// 	$this->form_validation->set_rules('sectionadviser', 'Teacher ID', 'required|is_unique[teacher.teacher_id]',
		// 	array('is_unique'=>'This Teacher ID is Valid.'));
		// if($this->form_validation->run()){
		// 	echo 'true'; 
		// }
		// else{			
		// 	echo validation_errors();
		// }
	}
	public function check_teacher2(){
		$teacherid = $this->input->post('sectadviser2');
		$this->load->model('teacher_model');
		$exist = $this->teacher_model->id_exist2($teacherid);
		// var_dump($exist);	
		if($teacherid == $exist){
			echo 'true';
		}
		else if($teacherid != $exist){
			echo 'false';
		}
	}
	public function check_sectid(){
		$this->form_validation->set_rules('sectid', 'Subject ID', 'required|is_unique[section.secid]',
			array('is_unique'=>'This Subject ID is already taken.'));
		if($this->form_validation->run()){
			echo 'true'; 
		}
		else{			
			echo validation_errors();
		}
	}

	public function sectionaction(){
			$hidden = $this->input->post('sectionhid');
			$scheid = $this->input->post('sectionidname');
			$scheid = 'sc'.$scheid;	
	 		if($hidden == "Add"){
	                $insert_data = array(  
	                     'secid'=>$this->input->post('sectionidname'),
	                     'section_name'=>$this->input->post('sectionname'),
	                     'year_level'=>$this->input->post('sectionlevel'),
	                     'teacher_id'=>$this->input->post('teacherid'),
	                	 'scheid'=> $scheid);  
	               	
	                $this->mdl->addsection($insert_data);
	                echo 'Section Added';
	                // redirect('section_controller', 'refresh');
	           }
	           
	           else{
	           		echo 'Error';
	           }
		// print_r($_POST);
      	}
    public function editsection(){
    		$sid = $this->input->post('hiddenid2');
    		$hidden = $this->input->post('sectionhid2');
    		$scheid = $this->input->post('sectionidname2');
    		$scheid = 'sc'.$scheid;
    			if($hidden == 'Edit'){
    				$updated_data = array(
    					'secid'=>$this->input->post('sectionidname2'),
    					'section_name'=>$this->input->post('sectionname2'),
    					'year_level'=>$this->input->post('sectionlevel2'),
    					'teacher_id'=>$this->input->post('teacherid2'),
    					'scheid'=>$scheid);
    				$this->mdl->sectionedit2($sid, $updated_data);
    				echo 'Section Updated';
    			}
    			else{
    				echo 'error';
    			}
    	// print_r($_POST);
    }

	public function deletesection(){
		       $this->load->model("section_model");
		       $sid = array(
		       			$this->input->post('sid'),
	                    $this->input->post('sid2')
		       );
	           $this->section_model->sectiondelete($sid);  
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
                $sub_array[] = $row->fname." ".$row->mname." ".$row->lname;
                $sub_array[] = $row->scheid;   
                $sub_array[] = '<button type="button" name="'.$row->scheid.'" id="'.$row->secid.'" class="btn addsecbtn3 btn-xs delete">Delete</button> <button type="button" name="edit" id="'.$row->secid.'" class="btn addsecbtn3 btn-xs edit">Edit</button> <button type="button" name="check" id="'.$row->secid.'" class="btn addsecbtn3 btn-xs check">Check</button>';
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
	                $output['sectionadviser'] = $row->teacher_id;
	                $output['scheduleid'] = $row->scheid;
	           }  
	           echo json_encode($output);  
	      }    
 }  

/* End of file  subject_controller.php */
/* Location: ./application/controllers/ subject_controller.php */
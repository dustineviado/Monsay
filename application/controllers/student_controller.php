<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class student_controller extends CI_Controller {
	public function __construct(){
       
        parent::__construct();
        $this->load->model('student_model','mdl');
        $this->load->helper('url_helper');
    }
	public function index(){
		$data['title'] = "Students | Ramon Magsaysay High School";
		$this->load->view('templates/header',$data);
		$this->load->view('vthesis/student',$data);
		$this->load->view('templates/footer',$data);
	}
	public function studentaction(){
			$hidden = $this->input->post('hidden');
	 		
	 		if($hidden == "Add"){
	                $insert_data = array(  
	                     'id_num'=>$this->input->post('id'),
	                     'studname'=>$this->input->post('name'),
	                     'email'=>$this->input->post('email'),
	                     'birthday'=>$this->input->post('bday'),
	                     'age'=>$this->input->post('age'),
	                     'contact'=>$this->input->post('cont'),
	                     'gender'=>$this->input->post('gend'),
	                     'religion'=>$this->input->post('rel'),
	                     'address'=>$this->input->post('addr'),
	                     'parent_guard'=>$this->input->post('pargua'),
	                     'pgcontact'=>$this->input->post('pgcont'),
	                     'year'=>$this->input->post('yr'),
	                     'section'=>$this->input->post('sect'),
	                     'status'=>$this->input->post('stat'));  
	               		
	                $this->mdl->addstudent($insert_data);
	                echo 'Student Added';
	           }
	           else if($hidden == "Edit"){
	           		$updated_data = array(  
	                     'id_num'=>$this->input->post('id'),
	                     'studname'=>$this->input->post('name'),
	                     'email'=>$this->input->post('email'),
	                     'birthday'=>$this->input->post('bday'),
	                     'age'=>$this->input->post('age'),
	                     'contact'=>$this->input->post('cont'),
	                     'gender'=>$this->input->post('gend'),
	                     'religion'=>$this->input->post('rel'),
	                     'address'=>$this->input->post('addr'),
	                     'parent_guard'=>$this->input->post('pargua'),
	                     'pgcontact'=>$this->input->post('pgcont'),
	                     'year'=>$this->input->post('yr'),
	                     'section'=>$this->input->post('sect'),
	                     'status'=>$this->input->post('stat'));
	                       
	               	
	                $this->mdl->studentedit2($updated_data);
	                echo 'student Updated';
	           }
	           else{
	           		echo 'Error';
	           }
      	}
	public function deletestudent(){
		       $this->load->model("student_model");  
	           $this->student_model->studentdelete($_POST["sid"]);  
	           echo 'student Deleted';
	}
	function fetch_user(){  
           $this->load->model("student_model");  
           $fetch_data = $this->student_model->make_datatables();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = $row->id_num;
                $sub_array[] = $row->studname;
                $sub_array[] = $row->year;
                $sub_array[] = $row->section;
                $sub_array[] = $row->status;   
                $sub_array[] = '<button type="button" name="delete" id="'.$row->id_num.'" class="btn addstubtn3 btn-xs delete">Delete</button> <button type="button" name="edit" id="'.$row->id_num.'" class="btn addstubtn3 btn-xs edit">Edit</button> <button type="button" name="view" id="'.$row->id_num.'" class="btn addstubtn3 btn-xs view">View</button>';
                $data[] = $sub_array;  
           }  
           $output = array(   
                "recordsTotal"          =>      $this->student_model->get_all_data(),  
                "recordsFiltered"     =>     $this->student_model->get_filtered_data(),  
                "data"                    =>     $data  
           );  
           echo json_encode($output);  
      }
       function fetch_single_user()  
	      {  
	           $output = array();  
	           $data = $this->mdl->studentedit1($_POST["sid"]);  
	           foreach($data as $row)  
	           {  
	                $output['studentidname'] = $row->id_num;
	                $output['studentname'] = $row->studname;
	                $output['studentemail'] = $row->email;
	                $output['studentbirthday'] = $row->birthday;
	                $output['studentage'] = $row->age;
	                $output['studentcontact'] = $row->contact;
	                $output['studentgender'] = $row->gender;
	                $output['studentreligion'] = $row->religion;
	                $output['studentaddress'] = $row->address;
	                $output['studentparentguard'] = $row->parent_guard;
	                $output['studentpgcontact'] = $row->pgcontact;
	                $output['studentyear'] = $row->year;
	                $output['studentsection'] = $row->section;
	                $output['studentstatus'] = $row->status;
	           }  
	           echo json_encode($output);  
	      }    
 }
   

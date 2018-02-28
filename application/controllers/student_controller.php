<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class student_controller extends CI_Controller {
	public function __construct(){
       
        parent::__construct();
        $this->load->model('student_model','mdl');
        $this->load->helper('url_helper');
    }
	public function index(){
		$data['title'] = "Students | Haven of Virtue and Excellence Academy Inc.";
		$active['menu']='active';
		$this->load->view('templates/header',$data);
		$this->load->view('vthesis/student',$active);
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
	public function studentaction(){
		
		// $this->form_validation->set_rules('studentfname','First Name','trim|required');
		// $this->form_validation->set_rules('studentmname','Middle Name','trim|required');
		// $this->form_validation->set_rules('studentlname','Last Name','trim|required');
		// $this->form_validation->set_rules('studentemail','Email','trim|required|valid_email|is_unique[pre_registration.email]', array('required'=>'You must provide a valid email address.','is_unique'=>'This email address already exists.'));
		// $this->form_validation->set_rules('studentcontact','Contact','trim|required|integer|min_length[7]|max_length[11]');
		// $this->form_validation->set_rules('studentreligion','Religion','trim|required');
		// $this->form_validation->set_rules('studentbirthday','Birthday','trim|required');
		// $this->form_validation->set_rules('studentgender','Gender','trim|required');
		// $this->form_validation->set_rules('studentaddress','Address','trim|required');
		// $this->form_validation->set_rules('studentparentguard','Parent/Guardian','trim|required');
		// $this->form_validation->set_rules('studentpgcontact','Parent/Guardian Contact','trim|required|integer|min_length[7]|max_length[11]');
		// $this->form_validation->set_error_delimiters('', '');
		// $this->form_validation->set_message('integer', 'The {field} must be a number');
		// $result = array();
			// if($this->form_validation->run()){
				$hidden = $this->input->post('studenthid');
					if($hidden == "Add"){
			 		        $insert_data = array(  
			                     'id_num'=>$this->input->post('studentidname'),
			                     'fname'=>$this->input->post('studentfname'),
			                     'mname'=>$this->input->post('studentmname'),
			                     'lname'=>$this->input->post('studentlname'),
			                     'email'=>$this->input->post('studentemail'),
			                     'birthday'=>$this->input->post('studentbirthday'),
			                     'contact'=>$this->input->post('studentcontact'),
			                     'gender'=>$this->input->post('studentgender'),
			                     'religion'=>$this->input->post('studentreligion'),
			                     'address'=>$this->input->post('studentaddress'),
			                     'parent_guard'=>$this->input->post('studentparentguard'),
			                     'pgcontact'=>$this->input->post('studentpgcontact'),
			                     'year'=>$this->input->post('studentyear'),
			                     'secid'=>$this->input->post('studentsection'),
			                     'status'=>$this->input->post('studentstatus'));  
			               		
			                $this->mdl->addstudent($insert_data);
			                // redirect('student_controller', 'refresh');
			        }
					else{
						echo 'Error';
					
				}
	}
	function check_email(){
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[student.email]',
			array('is_unique'=>'This Email is already taken.'));
		if($this->form_validation->run()){
			echo 'true'; 
		}
		else{			
			echo validation_errors();
		}
	}
	function check_studcontact(){
		$this->form_validation->set_rules('studcont','Contact','trim|required|integer|min_length[7]|max_length[11]');
		$this->form_validation->set_message('integer', 'The {field} must be a number');
		if($this->form_validation->run()){
			echo 'true';
		}
		else{
			echo validation_errors();
		}
	}
	function check_pgcontact(){
		$this->form_validation->set_rules('pgcont','Contact','trim|required|integer|min_length[7]|max_length[11]');
		$this->form_validation->set_message('integer', 'The {field} must be a number');
		if($this->form_validation->run()){
			echo 'true';
		}
		else{
			echo validation_errors();
		}
	}
	public function deletestudent(){
		       $this->load->model("student_model");  
	           $this->student_model->studentdelete($_POST["sid"]);  
	           echo 'student Deleted';
	}
	public function getoption(){
		$sid = $this->input->post('sid');
		$data = $this->mdl->optionget($sid);
		echo json_encode($data);

	}

	function fetch_user(){  
           $this->load->model("student_model");  
           $fetch_data = $this->student_model->make_datatables();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = $row->id_num;
                $sub_array[] = $row->fname;
                $sub_array[] = $row->mname;
                $sub_array[] = $row->lname;
                $sub_array[] = $row->year;
                $sub_array[] = $row->section_name;   
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
	                $output['studentfname'] = $row->fname;
	                $output['studentmname'] = $row->mname;
	                $output['studentlname'] = $row->lname;
	                $output['studentemail'] = $row->email;
	                $output['studentbirthday'] = $row->birthday;
	                $output['studentcontact'] = $row->contact;
	                $output['studentgender'] = $row->gender;
	                $output['studentreligion'] = $row->religion;
	                $output['studentaddress'] = $row->address;
	                $output['studentparentguard'] = $row->parent_guard;
	                $output['studentpgcontact'] = $row->pgcontact;
	                $output['studentyear'] = $row->year;
	                $output['studentsection'] = $row->secid;
	                $output['studentsectionname'] = $row->section_name;
	                $output['studentstatus'] = $row->status;
	           }  
	           echo json_encode($output);  
	      }
	   function editstudent(){
	   	$sid = $this->input->post('editID');
	   	$hidden = $this->input->post('edithid');

	    if($hidden == "Edit"){
			$updated_data = array(  
			'id_num'=>$this->input->post('studentidname3'),
			'fname'=>$this->input->post('studentfname3'),
			'mname'=>$this->input->post('studentmname3'),
			'lname'=>$this->input->post('studentlname3'),
			'email'=>$this->input->post('studentemail3'),
			'birthday'=>$this->input->post('studentbirthday3'),
			'contact'=>$this->input->post('studentcontact3'),
			'gender'=>$this->input->post('studentgender3'),
			'religion'=>$this->input->post('studentreligion3'),
			'address'=>$this->input->post('studentaddress3'),
			'parent_guard'=>$this->input->post('studentparentguard3'),
			'pgcontact'=>$this->input->post('studentpgcontact3'),
			'year'=>$this->input->post('studentyear3'),
			'secid'=>$this->input->post('studentsection3'),
			'status'=>$this->input->post('studentstatus3')); 
			               	
			$this->mdl->studentedit2($sid, $updated_data);
			echo 'Student Updated';
			}
		else{
			echo 'Error';
		}
	   }    
 }
   

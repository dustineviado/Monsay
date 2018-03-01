<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class teacher_controller extends CI_Controller {
	public function __construct(){
       
        parent::__construct();
        $this->load->model('teacher_model','mdl');
        $this->load->helper('url_helper');
    }
	public function index()
	{
		
		$data['title'] = "Teacher | Haven of Virtue and Excellence Academy Inc.";
		$active['menu']='active';
		$this->load->view('templates/header', $data);
		$this->load->view('vthesis/teacher', $active);
		$this->load->view('templates/footer', $data);
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
	
	
	public function autoid(){
		$idformat = $this->input->post('idformat');

		$result = $this->mdl->idauto($idformat);

		foreach($result as $data){
			$datar = $data->teacher_id;
		}

		echo json_encode($datar);
	}	

	public function teacheraction(){
			$hidden = $this->input->post('teacherhid');
			/*$postmalone = $_POST;
			if(isset($postmalone)){
				var_dump($postmalone); checking */
			
	 		if($hidden == "Add"){
	                $insert_data = array(  
	                     'teacher_id'=>$this->input->post('teacherid'),
	                     'fname'=>$this->input->post('teacherfname'),
	                     'mname'=>$this->input->post('teachermname'),
	                     'lname'=>$this->input->post('teacherlname'),
	                     'birthday'=>$this->input->post('bday'),
	                     'gender'=>$this->input->post('gender'),
	                     'email'=>$this->input->post('email'),
	                     'department'=>$this->input->post('department'),
	                     'address'=>$this->input->post('address'),
	                     'contact' =>$this->input->post('contact'),
	                     'status'=>$this->input->post('status'));
	               		
	                $this->mdl->addteacher($insert_data);

	                $insertaddacc = array(
	                	'user_type'=> 'Teacher',
	                	'id_number'=>$this->input->post('teacherid'),
	                	'email'=>$this->input->post('email'),
	                	'password'=> 'hveateachersdefaultpassword');

	                $this->mdl->insertaddacc($insertaddacc);

	                echo 'Teacher Added';
	           }
	        else {
	        	echo 'Error';
	        }      
      	}
    public function editteacher(){
    	$hidden = $this->input->post('teacherhid');

    	 if($hidden == "Edit"){
	           		$updated_data = array(  
	                     'teacher_id'=>$this->input->post('teacherid'),
	                     'fname'=>$this->input->post('teacherfname'),
	                     'mname'=>$this->input->post('teachermname'),
	                     'lname'=>$this->input->post('teacherlname'),
	                     'birthday'=>$this->input->post('bday'),
	                     'age'=>$this->input->post('age'),
	                     'gender'=>$this->input->post('gender'),
	                     'email'=>$this->input->post('email'),
	                     'department'=>$this->input->post('department'),
	                     'address'=>$this->input->post('address'),
	                     'contact' =>$this->input->post('contact'),
	                     'status'=>$this->input->post('status'));	
	                       
	               	
	                $this->mdl->teacheredit2($updated_data);
	                echo 'Teacher Updated';
	           }
	           else{
	           		echo 'Error';
	           }
    }

    public function check_email(){
    	$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[teacher.email]',
			array('is_unique'=>'This Email is already taken.'));
		if($this->form_validation->run()){
			echo 'true'; 
		}
		else{			
			echo validation_errors();
		}
    }
    public function check_contact(){
		$this->form_validation->set_rules('cont','Contact','trim|required|integer|min_length[7]|max_length[11]');
		$this->form_validation->set_message('integer', 'The {field} must be a number');
		if($this->form_validation->run()){
			echo 'true';
		}
		else{
			echo validation_errors();
		}
	}

	public function deleteteacher(){
		       $this->load->model("teacher_model");  
	           $this->teacher_model->teacherdelete($_POST["Tid"]);  
	           echo 'Teacher Deleted';



    }
	function fetch_user_teacher(){
		$this->load->model("teacher_model");
		$fetch_data_teacher = $this->teacher_model->make_datatables_teacher();
		$data = array(); 	
		foreach($fetch_data_teacher as $lalagyan)
		{
			$sub_array = array();
			$sub_array[] =$lalagyan->teacher_id;
			$sub_array[] =$lalagyan->fname;
			$sub_array[] =$lalagyan->lname;
			$sub_array[] =$lalagyan->department;
			$sub_array[] =$lalagyan->status;
			$sub_array[] = '<button type="button" name="delete" id="'.$lalagyan->teacher_id.'" class="btn addsubbtn3 btn-xs delete">Delete</button> <button type="button" name="edit" id="'.$lalagyan->teacher_id.'" class="btn addsubbtn3 btn-xs edit">Edit</button> <button type="button" name="view" id="'.$lalagyan->teacher_id.'" class="btn addsubbtn3 btn-xs view">View</button>';
			$data[] = $sub_array;
		}
		$output = array(
		"recordsTotal"          =>      $this->teacher_model->get_all_data(),  
                "recordsFiltered"     =>     $this->teacher_model->get_filtered_data(),  
                "data"                    =>     $data  
           );  
			echo json_encode($output);
		
	}



	 function fetch_single_user_teacher()  
	      {  
	           $output = array();  
	           $data = $this->mdl->teacheredit1($_POST["Tid"]);  
	           foreach($data as $lalagyan)  
	           {  
	                $output['teacher_id'] = $lalagyan->teacher_id;
	                $output['teacher_fname'] = $lalagyan->fname;
	                $output['teacher_mname'] = $lalagyan->mname;
	                $output['teacher_lname'] = $lalagyan->lname;
	                $output['teacherbday'] = $lalagyan->birthday;
	                $output['teacherage'] = $lalagyan->age;
	                $output['teachergender'] = $lalagyan->gender;
	                $output['teacheremail'] = $lalagyan->email;
	                $output['teacherdepartment'] = $lalagyan->department;
	                $output['teacheraddress'] = $lalagyan->address;
	                $output['teachercontact'] = $lalagyan->contact;
	                $output['teacherstatus'] = $lalagyan->status;
	           }  
	           echo json_encode($output);  
	      }    



 }


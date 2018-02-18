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
		$this->load->view('templates/header', $data);
		$this->load->view('vthesis/teacher', $data);
		$this->load->view('templates/footer', $data);
		$value = $this->input->post('selectlogin');
		if($this->session->userdata('login_session') == $value)
		{
			
		}
		else if($value == 'Student')
		{
			redirect(base_url() . 'login_controller');		
		}
		else if($value == 'Teacher'){
			redirect(base_url() . 'login_controller');

			
		}

	}
		
	public function teacheraction(){
			$hidden = $this->input->post('hidden');
			/*$postmalone = $_POST;
			if(isset($postmalone)){
				var_dump($postmalone); checking */
			
	 		if($hidden == "Add"){
	                $insert_data = array(  
	                     'teacher_id'=>$this->input->post('Tid'),
	                     'fname'=>$this->input->post('Tfname'),
	                     'mname'=>$this->input->post('Tmname'),
	                     'lname'=>$this->input->post('Tlname'),
	                     'birthday'=>$this->input->post('Tbday'),
	                     'age'=>$this->input->post('Tage'),
	                     'gender'=>$this->input->post('Tgender'),
	                     'email'=>$this->input->post('Temail'),
	                     'department'=>$this->input->post('Tdepartment'),
	                     'address'=>$this->input->post('Taddress'),
	                     'contact' =>$this->input->post('Tcontact'),
	                     'status'=>$this->input->post('Tstatus'));
	               		
	                $this->mdl->addteacher($insert_data);
	                echo 'Teacher Added';
	           }
	           else if($hidden == "Edit"){
	           		$updated_data = array(  
	                     'teacher_id'=>$this->input->post('Tid'),
	                     'fname'=>$this->input->post('Tfname'),
	                     'mname'=>$this->input->post('Tmname'),
	                     'lname'=>$this->input->post('Tlname'),
	                     'birthday'=>$this->input->post('Tbday'),
	                     'age'=>$this->input->post('Tage'),
	                     'gender'=>$this->input->post('Tgender'),
	                     'email'=>$this->input->post('Temail'),
	                     'department'=>$this->input->post('Tdepartment'),
	                     'address'=>$this->input->post('Taddress'),
	                     'contact' =>$this->input->post('Tcontact'),
	                     'status'=>$this->input->post('Tstatus'));	
	                       
	               	
	                $this->mdl->teacheredit2($updated_data);
	                echo 'Teacher Updated';
	           }
	           else{
	           		echo 'Error';
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


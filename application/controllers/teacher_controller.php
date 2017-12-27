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
		$data['title'] = "Teacher | Ramon Magsaysay High School";
		$this->load->view('templates/header', $data);
		$this->load->view('vthesis/teacher', $data);
		$this->load->view('templates/footer', $data);
		
    }
	function fetch_user_teacher(){
		$this->load->model("teacher_model");
		$fetch_data_teacher = $this->mdl->make_datatables_teacher();
		$data = array();
		foreach($fetch_data_teacher as $lalagyan)
		{
			$sub_array = array();
			$sub_array[] =$lalagyan->teacher_id;
			$sub_array[] =$lalagyan->fname;
			$sub_array[] =$lalagyan->mname;
			$sub_array[] =$lalagyan->lname;
			$sub_array[] =$lalagyan->birthday;
			$sub_array[] =$lalagyan->age;
			$sub_array[] =$lalagyan->gender;
			$sub_array[] =$lalagyan->email;
			$sub_array[] =$lalagyan->advisory;
			$sub_array[] =$lalagyan->subject;
			$sub_array[] =$lalagyan->address;
			$sub_array[] =$lalagyan->contact;
			$sub_array[] =$lalagyan->status;
			$data[] = $sub_array;
		}
		$output = array(
		"recordsTotal"          =>      $this->teacher_model->get_all_data(),  
                "recordsFiltered"     =>     $this->teacher_model->get_filtered_data(),  
                "data"                    =>     $data  
           );  
			echo json_encode($output);
		
	}
}
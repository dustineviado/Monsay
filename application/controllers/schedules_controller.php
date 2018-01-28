<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class schedules_controller extends CI_Controller {
	public function __construct(){
       
        parent::__construct();
        $this->load->model('schedules_model','mdl');
        $this->load->helper('url_helper');
    }
	public function index(){
		$data['title'] = "Schedules | Ramon Magsaysay High School";
		$this->load->view('templates/header',$data);
		$this->load->view('templates/admin_sidebar' ,$data);
		$this->load->view('vthesis/schedules',$data);
		$this->load->view('templates/footer',$data);
	}
	public function scheduleaction(){
			$hidden = $this->input->post('hidden');
	 		
	 		if($hidden == "Add"){
	                $insert_data = array(  
	                     'scheid'=>$this->input->post('schedid'));  
	               		
	                $this->mdl->addschedule($insert_data);
	                echo 'Schedule Added';
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
	                       
	               	
	                $this->mdl->scheduleedit2($updated_data);
	                echo 'schedule Updated';
	           }
	           else{
	           		echo 'Error';
	           }
      	}

    public function addschedulesubjectaction(){
    	$count = count($this->input->post('id'));
    	$id = $this->input->post('id');
    	$day = $this->input->post('day');
    	$time = $this->input->post('time');
    	$subid = $this->input->post('subid');
    	$teachid = $this->input->post('teachid');

	    	for($i=0; $i<$count; $i++){

			    	$schedule_data = array(  
				           'scheid'=>$id[$i],
				           'day'=>$day[$i],
				           'time'=>$time[$i],
				           'subid'=>$subid[$i],
				           'teacher_id'=>$teachid[$i]		
				       );

	    				$this->mdl->addschedulesubject($schedule_data);
	    			}
	     echo 'Schedule Subject Added';
    }

	public function deleteschedule(){
		       $this->load->model("schedules_model");  
	           $this->schedules_model->scheduledelete($_POST["sid"]);  
	           echo 'Schedule Deleted';
	}
	function fetch_user(){  
           $this->load->model("schedules_model");  
           $fetch_data = $this->schedules_model->make_datatables();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = $row->scheid;  
                $sub_array[] = '<button type="button" name="view" id="'.$row->scheid.'" class="btn addstubtn3 btn-xs view">View</button> <button type="button" name="addsched" id="'.$row->scheid.'" class="btn addstubtn3 btn-xs addsched">Add</button> <button type="button" name="delete" id="'.$row->scheid.'" class="btn addstubtn3 btn-xs delete">Delete</button> <button type="button" name="edit" id="'.$row->scheid.'" class="btn addstubtn3 btn-xs edit">Edit</button>';
                $data[] = $sub_array;  
           }  
           $output = array(   
                "recordsTotal"          =>      $this->schedules_model->get_all_data(),  
                "recordsFiltered"     =>     $this->schedules_model->get_filtered_data(),  
                "data"                    =>     $data  
           );  
           echo json_encode($output);  
      }
       function fetch_single_user()  
	      {    
	           $data = $this->mdl->scheduleedit1($_POST["sid"]); 
	           echo json_encode($data);  
	      }    
 }
   

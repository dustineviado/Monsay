<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class schedules_controller extends CI_Controller {
	public function __construct(){
       
        parent::__construct();
        $this->load->model('schedules_model','mdl');
        $this->load->helper('url_helper');
    }
	public function index(){
		$data['title'] = "Schedules | Haven of Virtue and Excellence Academy Inc.";
		$this->load->view('templates/header',$data);	
		$this->load->view('vthesis/schedules',$data);
		$this->load->view('templates/footer',$data);
		
	}

    public function addschedulesubjectaction(){
    	$count = count($this->input->post('id'));
    	$id = $this->input->post('id');
    	$day = $this->input->post('day');
    	$time = $this->input->post('time');
    	$subid = $this->input->post('subid');
    	$room = $this->input->post('room');
    	$teachid = $this->input->post('teachid');

	    	for($i=0; $i<$count; $i++){

			    	$schedule_data = array(  
				           'scheid'=>$id[$i],
				           'day'=>$day[$i],
				           'time'=>$time[$i],
				           'subid'=>$subid[$i],
				           'room'=>$room[$i],
				           'teacher_id'=>$teachid[$i]		
				       );

	    				$this->mdl->addschedulesubject($schedule_data);
	    			}
	     echo 'Schedule Subject Added';
    }

	public function deleteschedule(){
			   $sid=$this->input->post('sid');
		       $this->load->model("schedules_model");  
	           $this->schedules_model->scheduledelete($sid);  
	           echo 'Schedule Cleared';
	}

	public function editschedulesubject(){
		$count = count($this->input->post('id'));
    	$id = $this->input->post('id');
    	$day = $this->input->post('day');
    	$time = $this->input->post('time');
    	$subid = $this->input->post('subid');
    	$room = $this->input->post('room');
    	$teachid = $this->input->post('teachid');

	    	for($i=0; $i<$count; $i++){

			    	$scheduleedit_data = array(  
				           $id[$i],
				           $day[$i],
				           $time[$i],
				           $subid[$i],
				           $room[$i],
				           $teachid[$i]		
				       );

	    				$this->mdl->schedulesubjectedit($scheduleedit_data);
	    			}
	     echo 'Schedule Subject Added';
	}
	function fetch_user(){  
           $this->load->model("schedules_model");  
           $fetch_data = $this->schedules_model->make_datatables();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = $row->scheid;  
                $sub_array[] = '<button type="button" name="view" id="'.$row->scheid.'" class="btn addstubtn3 btn-xs view">View</button> <button type="button" name="addsched" id="'.$row->scheid.'" class="btn addstubtn3 btn-xs addsched">Add</button> <button type="button" name="delete" id="'.$row->scheid.'" class="btn addstubtn3 btn-xs delete">Clear</button> <button type="button" name="edit" id="'.$row->scheid.'" class="btn addstubtn3 btn-xs edit">Edit</button>';
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
	      {    $sid = $this->input->post('sid');
	           $data = $this->mdl->scheduleedit1($sid); 
	           echo json_encode($data);  
	      }    
 }
   

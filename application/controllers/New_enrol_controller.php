<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class New_enrol_controller extends CI_Controller {

	public function __construct(){
       
        parent::__construct();
        $this->load->model('New_enrol_model','mdl');
        $this->load->helper('url_helper');

    }

	public function index(){

		$data['title'] = "New Enrollee | Ramon Magsaysay High School";

		$this->load->view('templates/header',$data);
		$this->load->view('templates/admin_sidebar', $data, 'refresh');
		$this->load->view('vthesis/new_enrollee',$data);
		$this->load->view('templates/footer',$data);


	}	

	public function newStudAction(){
			$hidden = $this->input->post('hidden');

	 		if($hidden == "Edit"){
	           		$updated_data = array(  
	                     'fname'=>$this->input->post('name'),
	                     'email'=>$this->input->post('email'),
	                     'contact'=>$this->input->post('cont'),
	                     'religion'=>$this->input->post('rel'),
	                     'birthday'=>$this->input->post('bday'),
	                     'age'=>$this->input->post('age'),
	                     'gender'=>$this->input->post('gend'),
	                     'address'=>$this->input->post('addr'),
	                     'parent_guard'=>$this->input->post('pguard'),
	                     'pgcontact'=>$this->input->post('pgcont'));
	               	
	                $this->mdl->editEnrollee2($updated_data);
	                echo 'Enrollee Updated';
	           }
	           else{
	           		echo 'Error';
	           }
      	}

	public function removeEnrollee(){
		       $this->load->model("New_enrol_model");  
	           $this->New_enrol_model->deleteEnrollee($_POST["sid"]);  
	           echo 'Enrollee Deleted';
	}
	public function change_status($id){
		$status = array('ctrl_num' => $ctrl_num);
		$this->load->mdl("New_enrol_model");
		$this->New_enrol_model->change_status($status, 'pre_registration');
		redirect('New_enrol_controller', 'refresh');
	}

	function fetch_user(){  
           $this->load->model("New_enrol_model");  
           $fetch_data = $this->New_enrol_model->make_datatables();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = $row->ctrl_num;  
                $sub_array[] = $row->fname;  
                $sub_array[] = $row->contact;
                $sub_array[] = $row->status;
                $sub_array[] = '<button type="button" name="delete" id="'.$row->ctrl_num.'" class="btn addsubbtn3 btn-xs delete">Delete</button> <button type="button" name="edit" id="'.$row->ctrl_num.'" class="btn addsubbtn3 btn-xs edit">Edit</button> <button type="button" name="confirm" id="'.$row->ctrl_num.'" class="btn addstubtn3 btn-xs confirm">Confirm</button>';
                $data[] = $sub_array;  
           }  
           $output = array(   
                "recordsTotal"          =>      $this->New_enrol_model->get_all_data(),  
                "recordsFiltered"     =>     $this->New_enrol_model->get_filtered_data(),  
                "data"                    =>     $data  
           );  
           echo json_encode($output);  
      }

       function fetch_single_user(){  
	           $output = array();  
	           $data = $this->mdl->editEnrollee1($_POST["sid"]);  
	           foreach($data as $row)  
	           {  
	           		$output['ctrlid'] = $row->ctrl_num;
	                $output['fullname'] = $row->fname;  
	                $output['studemail'] = $row->email;
	                $output['studcontact'] = $row->contact;
	                $output['studreligion'] = $row->religion;
	                $output['studbirthday'] = $row->birthday;
	                $output['studage'] = $row->age;
	                $output['studgender'] = $row->gender;
	                $output['studaddress'] = $row->address;
	                $output['studparent_guard'] = $row->parent_guard;
	                $output['studpgcontact'] = $row->pgcontact;
	                $output['studstatus'] = $row->status;
	           }  
	           echo json_encode($output);  
	      }    
 }


/* End of file  New_enrol_controller.php */
/* Location: ./application/controllers/ New_enrol_controller.php */
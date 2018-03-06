<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class New_enrol_controller extends CI_Controller {

	public function __construct(){
       
        parent::__construct();
        $this->load->model('New_enrol_model','mdl');
        $this->load->helper('url_helper');

    }

	public function index(){

		$data['title'] = "New Enrollee | Haven of Virtue and Excellence Academy Inc.";
		$active['menu']='active';
		$this->load->view('templates/header',$data);
		$this->load->view('vthesis/new_enrollee',$active);
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
	

	public function autoid(){
		$idformat = $this->input->post('idformat');

		$result = $this->mdl->idauto($idformat);

		foreach($result as $data){
			$datar = $data->id_num;
		}

		echo json_encode($datar);
	}

	public function getoption(){
		$sid = $this->input->post('sid');
		$data = $this->mdl->optionget($sid);
		echo json_encode($data);

	}
	
	public function newStudAction(){
			$hidden = $this->input->post('hidden');

	 		if($hidden == "Edit"){
	           		$updated_data = array(  
	                     'fname'=>$this->input->post('fame'),
	                     'mname'=>$this->input->post('mame'),
	                     'lname'=>$this->input->post('lame'),
	                     'email'=>$this->input->post('email'),
	                     'contact'=>$this->input->post('cont'),
	                     'religion'=>$this->input->post('rel'),
	                     'birthday'=>$this->input->post('bday'),
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
	public function confirmEnrollee(){

	                $confirm_data = array(
	                	 'id_num'=>$this->input->post('userID'),
	                     'fname'=>$this->input->post('studfname2'),
	                     'mname'=>$this->input->post('studmname2'),
	                     'lname'=>$this->input->post('studlname2'),
	                     'email'=>$this->input->post('studemail2'),
	                     'birthday'=>$this->input->post('studbirthday2'),
	                     'contact'=>$this->input->post('studcontact2'),
	                     'gender'=>$this->input->post('studgender2'),
	                     'religion'=>$this->input->post('studreligion2'),
	                     'address'=>$this->input->post('studaddress2'),
	                     'parent_guard'=>$this->input->post('studparent_guard2'),
	                     'pgcontact'=>$this->input->post('studpgcontact2'),
	                     'year'=>$this->input->post('studyear2'),
	                     'secid'=>$this->input->post('studsection2'),
	                     'status'=>'Enrolled'); 

	                $ctrlid = $this->input->post('ctrlid'); 

		$this->load->model('New_enrol_model');
		$this->New_enrol_model->confirmation($confirm_data);
		$this->New_enrol_model->confirmationdelete($ctrlid);
		
		$insertaddacc = array(
	    'user_type'=> 'Student',
	    'id_number'=> $this->input->post('userID'),
	    'email'=>$this->input->post('studemail2'),
	    'password'=> '12345');
		 $this->mdl->insertaddacc($insertaddacc);

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
                $sub_array[] = $row->mname;
                $sub_array[] = $row->lname;
                $sub_array[] = $row->date_made;
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
	                $output['studfname'] = $row->fname;
	                $output['studmname'] = $row->mname;
	                $output['studlname'] = $row->lname;  
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
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
		$this->load->view('vthesis/new_enrollee',$data);
		$this->load->view('templates/footer',$data);

	}
		public function save(){
		
		$this->form_validation->set_rules('fullname','Name','trim|required');
		$this->form_validation->set_rules('studemail','Email','trim|required|valid_email|is_unique[pre_registration.email]', array('required'=>'You must provide a valid email address.','is_unique'=>'This email address already exists.'));
		$this->form_validation->set_rules('studcontact','Contact','trim|required|min_length[7]|max_length[11]');
		$this->form_validation->set_rules('studreligion','Religion','trim|required');
		$this->form_validation->set_rules('studbirthday','Birthday','trim|required');
		$this->form_validation->set_rules('studage','Age','trim|required');
		$this->form_validation->set_rules('studgender','Gender','trim|required');
		$this->form_validation->set_rules('studaddress','Address','trim|required');
		$this->form_validation->set_rules('studparent_guard','Parent/Guardian','trim|required');
		$this->form_validation->set_rules('studpgcontact','Contact','trim|required|min_length[7]|max_length[11]');
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
		if($this->form_validation->run()){
			 
			 $data = array(
		'fname'=>$this->input->post('fullname'),
		'email'=>$this->input->post('studemail'),
		'contact'=>$this->input->post('studcontact'),
		'religion'=>$this->input->post('studreligion'),
		'birthday'=>$this->input->post('studbirthday'),
		'age'=>$this->input->post('studage'),
		'birthday'=>$this->input->post('studbirthday'),
		'gender'=>$this->input->post('studgender'),
		'address'=>$this->input->post('studaddress'),
		'parent_guard'=>$this->input->post('studparent_guard'),
		'pgcontact'=>$this->input->post('studpgcontact'),
		'status'=>'Pending',);  
		$this->load->model('New_enrol_model');
		$this->New_enrol_model->addstudent($data);
		redirect('main_body_controller','refresh');
			
		}
		else{
			$data['title'] = "Register";
			$this->load->view('templates/header', $data);
			$this->load->view('vthesis/register_page');
			$this->load->view('templates/footer');
			}	
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
                $sub_array[] = '<button type="button" name="delete" id="'.$row->ctrl_num.'" class="btn addsubbtn3 btn-xs delete">Delete</button> <button type="button" name="edit" id="'.$row->ctrl_num.'" class="btn addsubbtn3 btn-xs edit">Edit</button>';
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
	           }  
	           echo json_encode($output);  
	      }    
 }


/* End of file  New_enrol_controller.php */
/* Location: ./application/controllers/ New_enrol_controller.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class register_page_controller extends CI_Controller {

	public function __construct(){
       
        parent::__construct();
        $this->load->model('New_enrol_model','mdl');
        $this->load->helper('url_helper');

    }

	public function index()
	{
		$data['title'] = "Register | Ramon Magsaysay High School";
		
		$this->load->view('templates/header',$data);	
		$this->load->view('vthesis/register_page',$data);
		$this->load->view('templates/footer',$data);
	}	
	public function save(){
		$validator = array('success' => false, 'messages' => array());

		$this->form_validation->set_rules('studfname','First Name','trim|required');
		$this->form_validation->set_rules('studmname','Middle Name','trim|required');
		$this->form_validation->set_rules('studlname','Last Name','trim|required');
		$this->form_validation->set_rules('studemail','Email','trim|required|valid_email|is_unique[pre_registration.email]', array('required'=>'You must provide a valid email address.','is_unique'=>'This email address already exists.'));
		$this->form_validation->set_rules('studcontact','Contact','trim|required|integer|min_length[7]|max_length[11]');
		$this->form_validation->set_rules('studreligion','Religion','trim|required');
		$this->form_validation->set_rules('studbirthday','Birthday','trim|required');
		$this->form_validation->set_rules('studgender','Gender','trim|required');
		$this->form_validation->set_rules('studaddress','Address','trim|required');
		$this->form_validation->set_rules('studparent_guard','Parent/Guardian','trim|required');
		$this->form_validation->set_rules('studpgcontact','Contact','trim|required|integer|min_length[7]|max_length[11]');
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
		$this->form_validation->set_message('integer', 'The {field} must be a number');
		if($this->form_validation->run())
		{
			$data = array(
				'fname'=>$this->input->post('studfname'),
				'mname'=>$this->input->post('studmname'),
				'lname'=>$this->input->post('studlname'),
				'email'=>$this->input->post('studemail'),
				'contact'=>$this->input->post('studcontact'),
				'religion'=>$this->input->post('studreligion'),
				'birthday'=>$this->input->post('studbirthday'),
				'birthday'=>$this->input->post('studbirthday'),
				'gender'=>$this->input->post('studgender'),
				'address'=>$this->input->post('studaddress'),
				'parent_guard'=>$this->input->post('studparent_guard'),
				'pgcontact'=>$this->input->post('studpgcontact'),
				'status'=>'Pending',
				'date_made'=>date('Y-m-d H:i:s', strtotime('+7 HOURS')));
			 	// echo "<script type = 'text/javascript'> alert('You have successfully registered!');</script>";
				$this->load->model('New_enrol_model');
				$this->New_enrol_model->addstudent($data);  
			
			
			 $validator['success'] = true;
			 // $validator['messages'] = 'Successfully Registered';
			
		
		}
		else
		{
			foreach($_POST as $key => $value){
				$validator['messages'][$key] = form_error($key);
			}
		}
		echo json_encode($validator);
	}

	function email_availability(){
		$data['title'] = "Register";

		$this->load->view('register_page', $data);
	}
	function check_email_availability(){
		if(!filter_val($_POST['studemail'], FILTER_VALIDATE_EMAIL))
		{
			echo '<label class="text-danger"><span class="glyphicon glyphicon-remove></span> Invalid Email</span></label>';
		}
		else
		{
			$this->load->model('New_enrol_model_enrol');
			if($this->New_enrol_model->is_email_available($_POST["studemail"]))
			{
				echo '<label class="text-danger"><span class="glyphicon glyphicon-remove></span>Email Already Exist</span></label>';
			}
			else
			{
				echo '<label class="text-danger"><span class="glyphicon glyphicon-ok></span>Email Available</span></label>';
			}
		}
	}
}

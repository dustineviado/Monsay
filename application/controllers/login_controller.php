<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login_controller extends CI_Controller {
	
	public function __construct(){

		parent::__construct();
		$this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
            $this->output->set_header('Cache-Control: no-store, no-cache, must-recan_login');
            $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
            $this->output->set_header('Pragma: no-cache');
	}

	public function index()
	{
		$data ['title'] = 'Login | Haven of Virtue and Excellence Academy Inc.';

		$this->load->view('vthesis/login_view',$data);
	
	}

	function login()
	{
		$data ['title'] = 'Login | Ramon Magsaysay High School';
		$this->load->view('login_view', $data);
	}

	
	function login_view(){
		echo('<script type="text/javascript">alert("You need to login!");</script>');
		redirect(base_url(). 'login_controller' ,'refresh');
	}
	function login_validation()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id_number', 'id_number', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if($this->form_validation->run())
		{
			$id_number = $this->input->post('id_number');
			$password = $this->input->post('password');
			$this->load->model('login_model');
			$value = $this->input->post('selectlogin');
			if($value == 'Student')
			{
				$data = $this->login_model->student_login($id_number, $password);
				$this->session->set_userdata($data[0]);
				
				//$this->session->set_userdata('login_session', $select);
				
				if($data == false){
					$this->session->set_flashdata('error', 'Invalid Id Number and Password');
				    redirect(base_url() . 'login_controller');
				}
				 else{

				 redirect(base_url() . 'studlog_controller' , 'refresh');
				}
			}

		
			else  if($value == 'Admin')
			{
				$data = $this->login_model->admin_login($id_number, $password);
				$this->session->set_userdata($data[0]);
				
				//$this->session->set_userdata('login_session', $select);
				
				if($data == false){
					$this->session->set_flashdata('error', 'Invalid Id Number and Password');
				    redirect(base_url() . 'login_controller');
				}
				else{
				redirect(base_url() . 'admin_controller' , 'refresh');
				}
			}
			
			else  if($value == 'Teacher')
			{
				$data = $this->login_model->teacher_login($id_number, $password);
				$this->session->set_userdata($data[0]);
				
				//$this->session->set_userdata('login_session', $select);
				
				if($data == false){
					$this->session->set_flashdata('error', 'Invalid Id Number and Password');
				    redirect(base_url() . 'login_controller');
				}
				else{
				 redirect(base_url() . 'teacherlog_controller' , 'refresh');
				}
			}
		}
		
	}
	function enter(){
		if($this->session->userdata('login_session') != '')
		{
			
		}
		else{
			
			redirect(base_url() . 'login_controller/login_view');
		}
	}
function logout()
	{
		
		$this->session->sess_destroy('login_session');
		$this->session->unset_userdata('login_session');	
		redirect(base_url() . 'main_body_controller', 'refresh');
		
	}

	
}


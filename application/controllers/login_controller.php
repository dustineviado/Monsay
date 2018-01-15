<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_controller extends CI_Controller {

	public function index()
	{

		$data ['title'] = 'Login | Ramon Magsaysay High School';
		$this->load->view('templates/header',$data);
		$this->load->view('vthesis/login_view',$data);
		$this->load->view('templates/footer',$data);	
	}

	function login()
	{
		$data ['title'] = 'Login | Ramon Magsaysay High School';
		$this->load->view('login_view', $data);
	}

	function login_validation()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if($this->form_validation->run())
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$this->load->model('login_model');
			if($this->login_model->can_login($username, $password))
			{
				$session_data = array(
					'username' => $username
				);
				$this->session->set_userdata('login_session',$session_data);
				redirect(base_url() . 'admin_controller');
			}
			else
			{
				 $this->session->set_flashdata('error', 'Invalid Username and Password');
				 redirect(base_url() . 'login_controller');
			}
		}
		else
		{
			$this->login();
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
		redirect(base_url() . 'main_body_controller', 'refresh');
	}
}


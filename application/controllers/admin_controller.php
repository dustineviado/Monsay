<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_controller extends CI_Controller {
	public function index()
	{
		$data['title'] = "Ramon Magsaysay High School";
		
		$this->load->view('templates/header',$data);
		$this->load->view('templates/admin_sidebar',$data);
		$this->load->view('vthesis/admin_dashboard',$data);
		$this->load->view('templates/footer',$data);
		
	}
	
	function logout()
	{
		
		$this->session->sess_destroy('login_session');
		redirect(base_url() . 'main_body_controller');
	}
}
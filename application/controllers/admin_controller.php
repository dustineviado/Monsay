<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_controller extends CI_Controller {
	public function index()
	{
		$data['title'] = "Haven of Virtue and Excellence Academy Inc.";
		
		$this->load->view('templates/header',$data);
		$this->load->view('vthesis/admin_dashboard',$data);
		$this->load->view('templates/footer',$data);
		// $value = $this->input->post('selectlogin');
		// if( $value == 'Admin')
		// {
		// 	echo('pumasok');
		// }
		// else if($value == 'Student')
		// {
		// 	redirect(base_url() . 'login_controller');		
		// }
		// else if($value == 'Teacher'){
		// 	redirect(base_url() . 'login_controller');

			
		// }
		
			
	}
}
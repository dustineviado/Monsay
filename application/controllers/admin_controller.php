<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_controller extends CI_Controller {
	public function index()
	{
		$data['title'] = "Haven of Virtue and Excellence Academy Inc.";
		$active['menu']='active';
		$this->load->view('templates/header',$data);
		$this->load->view('vthesis/admin_dashboard',$active);
		$this->load->view('templates/footer',$data);
		$wala = $this->session->userdata('login_session2');
		if($wala == 'Admin')
					{
						redirect('admin_controller' , 'refresh');
					}
					else if($wala == 'Student')
					{
						redirect('login_controller','refresh');
					}
		
	}
}


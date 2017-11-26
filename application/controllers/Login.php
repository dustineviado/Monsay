<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	
	public function index()
	{
		$data['title'] = "Login|Ramon Magsaysay High School";
		$this->load->view('templates/header',$data);
		$this->load->view('monsay/Login-view');
		$this->load->view('templates/footer',$data);
	}

	public function pasok(){
		$user = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
		);
	
		print_r($user);
		$this->load->model('model_login');
		$query=$this->model_login->read($user);
		if($query==false){
			echo 'walang ganun';
			
			
		}
		else{
		redirect('Adminprof','refresh');
	}
	}
	
	
}
?>
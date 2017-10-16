<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class regcontrol extends CI_Controller {
	public function index(){
		$data['title'] = "Register|Ramon Magsaysay High School";
		$this->load->view('templates/header',$data);
		$this->load->view('monsay/regview');
		$this->load->view('templates/footer',$data);
	}
	public function add(){
		$user = array(
			'name' => $name,
			'email' => $email,
			'contact' => $contact,
			'password' => $password
			);
	
		print_r($user);
		$this->load->model('model_login');
		$query=$this->model_login->read($user);
		if($query==false){
			echo 'walang ganun';
			
			
		}
		else{
			echo 'success bes';
	}
	}
	
}
?>
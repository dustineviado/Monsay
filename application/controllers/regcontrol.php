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
			'fullname' => $this->input->post('fullname'),
			'email' => $this->input->post('email'),
			'contact' => $this->input->post('contact'),
			'password' => $this->input->post('password')
			);
	
		print_r($user);
		$this->load->model('regmodel');
		$query=$this->regmodel->insertUser($user);
		if($query==false){
			echo 'may kaparehas bes';
		}
		else{
			echo 'success bes';
	}
	}
	
}
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class regcontrol extends CI_Controller {
	public function index(){
		$data['title'] = "Register|Haven of Virtue and Excellence Academy Inc.";
		$this->load->view('templates/header',$data);
		$this->load->view('monsay/regview');
		$this->load->view('templates/footer',$data);
	}
	public function add(){
		$user = array(
			'name' => $this->input->post('name'),
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
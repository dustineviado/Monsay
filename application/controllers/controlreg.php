<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controlreg extends CI_Controller {

	
	public function index()
	{
		$data['title'] = "Register | Ramon Magsaysay High School";
		
		$this->load->view('templates/header',$data);	
		$this->load->view('vthesis/regview',$data);
		$this->load->view('templates/footer',$data);	
	}
	public function add(){
		$user = array(
			'lname' => $this->input->post('lname'),
			'fname' => $this->input->post('fname'),
			'contact' => $this->input->post('contact'),
			'email' => $this->input->post('email'),
			'birthday' => $this->input->post('birthday'),
			'age' => $this->input->post('age'),
			'gender' => $this->input->post('sex'),
			'address' => $this->input->post('address')
			);
		print_r($user);
		$this->load->model('modelreg');
		$query=$this->modelreg->insertUser($user);

	}
}
	
?>
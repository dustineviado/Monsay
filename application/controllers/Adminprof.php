<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Adminprof extends CI_Controller{

	public function index(){
		$data['title'] = "Management";

		$this->load->view('templates/header', $data);
		$this->load->view('vthesis/adminindex');
		$this->load->view('templates/footer', $data);

	}

	public function save(){

		$this->form_validation->set_rules('fname','First Name','required');
		$this->form_validation->set_rules('mname','Middle  Name','required');
		$this->form_validation->set_rules('lname','Last Name','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('contact','Contact','required');
		$this->form_validation->set_rules('religion','Religion','required');
		$this->form_validation->set_rules('birthday','Birthday','required');
		$this->form_validation->set_rules('age','Age','required');
		$this->form_validation->set_rules('gender','Gender','required');
		$this->form_validation->set_rules('address','Address','required');
		$this->form_validation->set_rules('parent_guard','Parent/Guardian','required');
		$this->form_validation->set_rules('pgcontact','Contact','required');
		if($this->form_validation->run()){
			$data = array(
		'fname'=>$this->input->post('fname'),
		'mname'=>$this->input->post('mname'),
		'lname'=>$this->input->post('lname'),
		'email'=>$this->input->post('email'),
		'contact'=>$this->input->post('contact'),
		'religion'=>$this->input->post('religion'),
		'birthday'=>$this->input->post('birthday'),
		'age'=>$this->input->post('age'),
		'birthday'=>$this->input->post('birthday'),
		'gender'=>$this->input->post('gender'),
		'address'=>$this->input->post('address'),
		'parent_guard'=>$this->input->post('parent_guard'),
		'pgcontact'=>$this->input->post('pgcontact'),
		'status'=>'Pending');

		$this->load->model('pre_enrol_model');
		$this->pre_enrol_model->newStud($data);
		redirect('main_body_controller','refresh');
			
		}
		else{
		$data['title'] = "Register";
		$this->load->view('templates/header',$data);
		$this->load->view('vthesis/register_page');
		$this->load->view('templates/footer');
		}
		
	}

}
?>
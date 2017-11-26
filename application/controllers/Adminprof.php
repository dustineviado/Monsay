<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Adminprof extends CI_Controller{

	public function index(){
		$data['title'] = "Management";

		$this->load->view('templates/header', $data);
		$this->load->view('vthesis/adminindex');
		$this->load->view('templates/footer', $data);

	}
	public function preenrolindex(){ 
		$data ['title']= "Pre Enrollee";
		$this->load->view('templates/header', $data);
		$this->load->model('Pre_enrol_model');
		$prestud = $this->Pre_enrol_model->gettbl();
		$this->load->view('vthesis/Preenrolview',['prestud'=>$prestud]);
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
			$data = $this->input->post();
			$this->load->model('Pre_enrol_model');
			$this->Pre_enrol_model->newStud($data);
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
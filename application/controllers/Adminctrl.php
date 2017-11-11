<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Adminctrl extends CI_Controller{
		
	public function index(){

		$data['title'] = "Ramon Magsaysay High School";

		$this->load->view('templates/header',$data);
		$this->load->model('Adminmodel');
		$students = $this->Adminmodel->gettbl();
		$this->load->view('vthesis/Adminview',['students'=>$students]);
		$this->load->view('templates/footer',$data);
	}

	public function add(){
		$data['title'] = "Ramon Magsaysay High School";
		$this->load->view('templates/header',$data);
		$this->load->view('vthesis/Create');
		$this->load->view('templates/footer');
	}

	public function update($id){
		$data['title']="Ramon Magsaysay High School";
		$this->load->view('templates/header',$data);
		$this->load->model('Adminmodel');
		$upstud = $this->Adminmodel->getval($id);
		$this->load->view('vthesis/Adminupd',['upstud'=>$upstud]);
		$this->load->view('templates/footer');
	}
	public function save(){

		$this->form_validation->set_rules('fname','Your Name','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('contact','Contact','required');
		$this->form_validation->set_rules('birthday','Birthday','required');
		$this->form_validation->set_rules('age','Age','required');
		$this->form_validation->set_rules('gender','Gender','required');
		$this->form_validation->set_rules('address','Address','required');
		if($this->form_validation->run()){
			$data = $this->input->post();
			$this->load->model('Adminmodel');
			$this->Adminmodel->addStud($data);
			redirect('Adminctrl','refresh');	
			
		}
		else{
		$data['title'] = "Add Student";
		$this->load->view('templates/header',$data);
		$this->load->view('vthesis/Create');
		$this->load->view('templates/footer');
		}
		
	}
	public function change($id){

		$this->form_validation->set_rules('fname','Your Name','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('contact','Contact','required');
		$this->form_validation->set_rules('birthday','Birthday','required');
		$this->form_validation->set_rules('age','Age','required');
		$this->form_validation->set_rules('gender','Gender','required');
		$this->form_validation->set_rules('address','Address','required');
		if($this->form_validation->run()){
			$data =$this->input->post();
			$this->load->model('Adminmodel');
			$this->Adminmodel->UpdStud($data, $id);
			redirect('Adminctrl','refresh');
		}
		else{
			$data['title'] = "Update Student";
			$this->load->view('templates/header',$data);
			$this->load->view('vthesis/Adminupd');
			$this->load->view('templates/footer');

		}
	}
	public function delete($id){
		$this->load->model('Adminmodel');
		if($this->Adminmodel->bawas($id)){
			$this->session->set_flashdata('msg','Failed');	
		}
		else{
			$this->session->set_flashdata('msg','Data Successfully Deleted!');
		}	
		 redirect('Adminctrl','refresh');
	}


}		
?>
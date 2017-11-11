<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Adminctrl extends CI_Controller{
		
	public function index(){

		$data['title'] = "Ramon Magsaysay High School";

		$this->load->view('templates/header',$data);
		$this->load->model('Adminmodel');
		$posts = $this->Adminmodel->gettbl();
		$this->load->view('vthesis/Adminview',['posts'=>$posts]);
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
		$post = $this->Adminmodel->getval($id);
		$this->load->view('vthesis/Adminupd',['post'=>$post]);
		$this->load->view('templates/footer');
	}
	public function save(){
		$this->form_validation->set_rules('fname','fname','required');
		$this->form_validation->set_rules('email','email','required');
		$this->form_validation->set_rules('contact','contact','required');
		$this->form_validation->set_rules('birthday','birthday','required');
		$this->form_validation->set_rules('age','age','required');
		$this->form_validation->set_rules('gender','gender','required');
		$this->form_validation->set_rules('address','address','required');
		$data =$this->input->post();
		$this->load->model('Adminmodel');
		if($this->Adminmodel->addStud($data)){
			// $this->session->set_flashdata('msg','Data Successfully Saved');
			
		}
		else{
			$this->session->set_flashdata('msg','Hindi na-Save');
		}	
		return redirect('Adminctrl','refresh');
	}
	public function change($id){

		$this->form_validation->set_rules('fname','fname','required');
		$this->form_validation->set_rules('email','email','required');
		$this->form_validation->set_rules('contact','contact','required');
		$this->form_validation->set_rules('birthday','birthday','required');
		$this->form_validation->set_rules('age','age','required');
		$this->form_validation->set_rules('gender','gender','required');
		$this->form_validation->set_rules('address','address','required');
		$data =$this->input->post();
		$this->load->model('Adminmodel');
		if($this->Adminmodel->UpdStud($data, $id)){
			$this->session->set_flashdata('msg','Data Successfully Updated');
		}
		else{
			$this->session->set_flashdata('msg','Failed');
		}	
		return redirect('Adminctrl','refresh');
		
	}
	public function delete($id){
		$this->load->model('Adminmodel');
		if($this->Adminmodel->bawas($id)){
			$this->session->set_flashdata('msg','Failed');	
		}
		else{
			$this->session->set_flashdata('msg','Data Successfully Deleted!');
		}	
		return redirect('Adminctrl','refresh');
	}


}		
?>
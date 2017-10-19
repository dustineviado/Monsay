<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class register_page_controller extends CI_Controller {

	function __construct(){
			parent::__construct();
	}

	public function index()
	{
		$data['title'] = "Register | Ramon Magsaysay High School";
		
		$this->load->view('templates/header',$data);	
		$this->load->view('vthesis/register_page',$data);
		$this->load->view('templates/footer',$data);
	}	

	public function reg(){
		$regarr = array(
			'name' => $this->input->post('name1'),
			'email' => $this->input->post('email1'),
			'contact' => $this->input->post('contact1'),
			'date' => $this->input->post('date1'),
			'age' => $this->input->post('age1'),
			'sex' => $this->input->post('sex1'),
			'religion' => $this->input->post('religion1'),
			'address' => $this->input->post('address1'),
			'mname' => $this->input->post('mname1'),
			'fname' => $this->input->post('fname1'),
			'gname' => $this->input->post('gname1'),
			'pcontact' => $this->input->post('pcontact1')
			);

		$this->load->library('session');

		$this->session->set_userdata('name',$regarr['name']);
		$this->session->set_userdata('email',$regarr['email']);
		$this->session->set_userdata('contact',$regarr['contact']);
		$this->session->set_userdata('date',$regarr['date']);
		$this->session->set_userdata('age',$regarr['age']);
		$this->session->set_userdata('sex',$regarr['sex']);
		$this->session->set_userdata('religion',$regarr['religion']);
		$this->session->set_userdata('address',$regarr['address']);
		$this->session->set_userdata('mname',$regarr['mname']);
		$this->session->set_userdata('fname',$regarr['fname']);
		$this->session->set_userdata('gname',$regarr['gname']);
		$this->session->set_userdata('pcontact',$regarr['pcontact']);



		redirect('register_page_print_controller','refresh');
	}
}
	
?>
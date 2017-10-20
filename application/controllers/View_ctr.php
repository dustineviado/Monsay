<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View_ctr extends CI_Controller {
	function __construct(){
	parent:: __construct();
	}
	public function index()
	{
		$data['title'] = "Register | Ramon Magsaysay High School";
		$this->load->database();
		$this->load->model('View_model');
		$data['s']=$this->View_model->get_student();
		$this->load->view('vthesis/View_view',$data);
	}
	public function deletedata(){
	$id = $this->uri->segment(3);
	$this->load->model('View_model');
	$this->View_model->deletedata($id);
	redirect(base_url(). "View_ctr/deleted");
	}
	public function deleted()
	{
		$this->index();
	}
}
?>
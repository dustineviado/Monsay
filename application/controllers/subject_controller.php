<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class subject_controller extends CI_Controller {

	public function __construct(){
       
        parent::__construct();
        $this->load->model('subject_model');
        $this->load->helper('url_helper');
    }

	public function index(){

		$data['title'] = "Subjects | Ramon Magsaysay High School";
		$data['subjects'] = $this->subject_model->selectsubjects();
		

		$this->load->view('templates/header',$data);
		$this->load->view('vthesis/subject',$data);
		$this->load->view('templates/footer',$data);

	}
}
/* End of file  subject_controller.php */
/* Location: ./application/controllers/ subject_controller.php */
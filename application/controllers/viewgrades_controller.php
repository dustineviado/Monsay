<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class viewgrades_controller extends CI_Controller {
	
	public function __construct(){
       
        parent::__construct();
        $this->load->model('viewgrades_model','mdl');
        $this->load->helper('url_helper');
    }

	public function index()
	{
		$data['title'] = "View Grades | Haven of Virtue and Excellence Academy Inc.";
		$this->load->view('templates/header',$data);	
		$this->load->view('vthesis/viewgrades',$data);
		$this->load->view('templates/footer',$data);
	}

	public function gradedisplay(){
		$sid = '6';
		$data = $this->mdl->displaygrade($sid);
		echo json_encode($data);
	}

	public function gradedisplay2(){
		$sid = '6';
		$data = $this->mdl->displaygrade2($sid);
		echo json_encode($data);
	}

	public function modalgrades(){

		$sid = array(
		$this->input->post('id_num'),
		$this->input->post('schoolyear')
		);
		$data = $this->mdl->gradesmodal($sid);

		echo json_encode($data); 
	}

	public function checksubject(){
		$sid = array(
		$this->input->post('id_num'),
		$this->input->post('schoolyear'),
		$this->input->post('subjectid')
		);

		$datas = $this->mdl->subjectcheck($sid);

		echo json_encode($datas);
	}

	public function modalgrades2(){

		$sid = $this->input->post('id_num');
		$data = $this->mdl->gradesmodal2($sid);

		echo json_encode($data); 
	}

	public function checksubject2(){
		$sid = array(
		$this->input->post('id_num'),
		$this->input->post('subjectid')
		);

		$datas = $this->mdl->subjectcheck2($sid);

		echo json_encode($datas);
	}

}

/* End of file viewgrades_controller.php */
/* Location: ./application/controllers/viewgrades_controller.php */
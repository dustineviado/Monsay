<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class alumniprint138_controller extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('alumniprint138_model','mdl');
        $this->load->helper('url_helper');
    }

	public function index()
	{
		$data['title'] = "Print Grades | Haven of Virtue and Excellence Academy Inc.";	
		$this->load->view('vthesis/alumniprint138',$data);
	}

	public function getinfo(){
		
		$sid = $this->session->userdata('id');
		$data = $this->mdl->infoget($sid);

		$output = array();
		foreach($data as $row)  
	           {  
	                $output['id_num'] = $row->id_num;
	                $output['fname'] = $row->fname;
	                $output['mname'] = $row->mname;
	                $output['lname'] = $row->lname;
	           }  

	    echo json_encode($output);  
	}

	public function allyear(){
		$sid = $this->session->userdata('id');
		$data = $this->mdl->yearall($sid);
		echo json_encode($data);
	}

	public function allsubjects(){

		$sid = array(
		$this->session->userdata('id'),
		$this->input->post('schoolyear')
		);
		$data = $this->mdl->subjectsall($sid);

		echo json_encode($data); 
	}

	public function allgrades(){
		$sid = array(
		$this->session->userdata('id'),
		$this->input->post('schoolyear'),
		$this->input->post('subjectid')
		);

		$datas = $this->mdl->gradesall($sid);

		echo json_encode($datas);
	}

	public function printpage1(){

		$newdata = $this->input->post('id_num');

		$this->session->set_userdata('id',$newdata);

		echo json_encode($newdata);
	}

	function unset(){		
		$array_items = array('id', 'schoolyear');
		$this->session->unset_userdata($array_items);
	}

}

/* End of file s alumniprint138_controller.php */
/* Location: ./application/controllers/s alumniprint138_controller.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class printpage_controller extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('printpage_model','mdl');
        $this->load->helper('url_helper');
    }

	public function index()
	{
		$data['title'] = "Print Grades | Haven of Virtue and Excellence Academy Inc.";	
		$this->load->view('vthesis/printpage',$data);
	}

	public function getinfo(){
		
		$sid = array(
		$this->session->userdata('id'),
		$this->session->userdata('schoolyear')
		);
		$data = $this->mdl->infoget($sid);

		foreach($data as $row)  
	           {  
	                $output['id_num'] = $row->id_num;  
	                $output['schoolyear'] = $row->schoolyear;
	                $output['year'] = $row->year;
	                $output['fname'] = $row->fname;
	                $output['mname'] = $row->mname;
	                $output['lname'] = $row->lname;
	           }  

	    echo json_encode($output);  
	}

	public function modalgrades(){
		
		$sid = array(
		$this->session->userdata('id'),
		$this->session->userdata('schoolyear')
		);
		$data = $this->mdl->gradesmodal($sid);

		echo json_encode($data); 
	}

	public function checksubject(){
		$sid = array(
		$this->session->userdata('id'),
		$this->session->userdata('schoolyear'),
		$this->input->post('subjectid')
		);

		$datas = $this->mdl->subjectcheck($sid);

		echo json_encode($datas);
	}

	function unset(){		
		$array_items = array('id', 'schoolyear');
		$this->session->unset_userdata($array_items);
	}

}

/* End of file printpage_controller.php */
/* Location: ./application/controllers/printpage_controller.php */
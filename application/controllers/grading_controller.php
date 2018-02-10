<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class grading_controller extends CI_Controller {

	public function __construct(){
       
        parent::__construct();
        $this->load->model('grading_model','mdl');
        $this->load->helper('url_helper');

    }

	public function index(){
		$data['title'] = "Grading | Ramon Magsaysay High School";

		$this->load->view('templates/header',$data);	
		$this->load->view('vthesis/grading',$data);
		$this->load->view('templates/footer',$data);
	}

	public function displaysection(){
		$sid =$this->input->post('sid');
		$data = $this->mdl->sectiondisplay($sid);
		echo json_encode($data);

	}

	public function gettingstudents(){
		$sid=$this->input->post('sid');
		$data = $this->mdl->getstudent($sid);
		echo json_encode($data);
	}

	public function gradeaction(){
		$count = count($this->input->post('id'));
    	$id = $this->input->post('id');
    	$subid = $this->input->post('subid');
    	$yearnum = $this->input->post('yearnum');
    	$grade = $this->input->post('grade');
    	$quarter = $this->input->post('quarter');

	    	for($i=0; $i<$count; $i++){

			    	$grade_data = array(  
				           'id_num'=>$id[$i],
				           'subid'=>$subid[$i],
				           'year'=>$yearnum[$i],
				           'grade'=>$grade[$i],
				           'quarter'=>$quarter	
				       );

	    				$this->mdl->actiongrade($grade_data);
	    			}
	     echo 'Schedule Subject Added';
	}

}

/* End of file  grading_controller.php */
/* Location: ./application/controllers/ grading_controller.php */
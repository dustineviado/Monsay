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

	public function subjectadd(){

			$add = array(
			'subid' => $this->input->post('subjectidname'),
			'subject' => $this->input->post('subjectname'),
			'faculty' => $this->input->post('subjectfaculty'),
			'year_level' => $this->input->post('subjectlevel')
			);

			print_r($add);
			$this->load->model('subject_model');
			$query=$this->subject_model->addsubject($add);
			if($query==false){
				echo 'may kaparehas bes';
			}
			else{
				echo 'success bes';
			}

			redirect('subject_controller?selsub=all','refresh');
	}

	public function deletesubject(){
			$id = $this->input->get('id');
	        $this->subject_model->subjectdelete($id);
	        redirect('subject_controller?selsub=all','refresh');
	}

	/*public function subjectsubject(){
		$subjects = $this->subject_model->selectsubjects();
		echo json_encode($subjects);
	}*/
}
/* End of file  subject_controller.php */
/* Location: ./application/controllers/ subject_controller.php */
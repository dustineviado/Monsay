<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class grading_controller extends CI_Controller {

	public function index(){
		$data['title'] = "Grading | Ramon Magsaysay High School";

		$this->load->view('templates/header',$data);
		$this->load->view('templates/admin_sidebar', $data, 'refresh');	
		$this->load->view('vthesis/grading',$data);
		$this->load->view('templates/footer',$data);
	}

	public function displaysection(){
		$id = $this->input->post('idhere');

		echo "<script type='text/javascript'>alert($id);</script>";

		redirect('grading_controller','refresh');
	}

}

/* End of file  grading_controller.php */
/* Location: ./application/controllers/ grading_controller.php */
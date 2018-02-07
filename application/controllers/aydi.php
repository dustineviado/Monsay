<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class aydi extends CI_Controller {

	public function index(){

	$this->load->model('New_enrol_model');
	$data = $this->New_enrol_model->customid();

	foreach($data as $row){
		
		$id = $row->ctrl_num;
		$idformat = ("18"."-");

		$newid = $idformat.$id;
		echo $newid;
		}
	}




}
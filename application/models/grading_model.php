<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class grading_model extends CI_Model {

	
		function __construct(){
			parent::__construct();
		}

		function sectiondisplay($sid){
			$this->db->select('section.secid, section.section_name, section.year_level, subject.subject, subject.subid');  
          	$this->db->from('schedule_subject');
          	$this->db->join('section', 'section.scheid = schedule_subject.scheid');
          	$this->db->join('subject', 'subject.subid = schedule_subject.subid');
          	$this->db->where('schedule_subject.teacher_id', $sid);
          	$query=$this->db->get();  
           	return $query->result();
		}

		function getstudent($sid){
			$this->db->select('id_num, fname, mname, lname, year');
			$this->db->from('student');
			$this->db->where('secid',$sid);
			$query=$this->db->get();  
           	return $query->result();
		}

		function actiongrade($data){
			$this->db->insert('grading',$data);
		}
}

/* End of file grading_model.php */
/* Location: ./application/models/grading_model.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class printpage_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	function infoget($sid){
		$this->db->distinct();
		$this->db->select('archive_grading.id_num, student.fname, student.mname, student.lname, archive_grading.schoolyear, archive_grading.year');
		$this->db->from('archive_grading');
		$this->db->join('student', 'student.id_num = archive_grading.id_num');
		$this->db->where('archive_grading.id_num',$sid[0]);
		$this->db->where('archive_grading.schoolyear',$sid[1]);
		$query=$this->db->get();  
        return $query->result();
	}

	function gradesmodal($sid){
		$this->db->distinct();
		$this->db->select('archive_subject.subject, archive_grading.subid ');
		$this->db->from('archive_grading');
		$this->db->join('archive_subject', 'archive_subject.subid = archive_grading.subid');
		$this->db->where('id_num',$sid[0]);
		$this->db->where('archive_grading.schoolyear',$sid[1]);
		$this->db->where('archive_subject.schoolyear',$sid[1]);
		$this->db->order_by('archive_subject.subject');
		$this->db->order_by('quarter');
		$query=$this->db->get();  
        return $query->result();
	}

	function subjectcheck($sid){
		$this->db->select('grade');
		$this->db->from('archive_grading');
		$this->db->where('id_num',$sid[0]);
		$this->db->where('schoolyear',$sid[1]);
		$this->db->where('subid',$sid[2]);
		$this->db->order_by('quarter');
		$query=$this->db->get();  
        return $query->result();
	}
}

/* End of file printpage_model.php */
/* Location: ./application/models/printpage_model.php */
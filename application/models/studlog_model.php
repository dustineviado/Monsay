<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class studlog_model extends CI_Model {

	function __construct(){
			parent::__construct();
		}

	function scheduleget($sid){
          	 $this->db->select('schedule_subject.room, schedule_subject.day, schedule_subject.time, subject.subject, teacher.fname, teacher.mname, teacher.lname');  
          	 $this->db->from('schedule');
          	 $this->db->join('schedule_subject', 'schedule_subject.scheid = schedule.scheid');
          	 $this->db->join('subject', 'subject.subid = schedule_subject.subid');
          	 $this->db->join('teacher', 'teacher.teacher_id = schedule_subject.teacher_id');
          	 $this->db->join('section', 'section.scheid = schedule.scheid');
          	 $this->db->join('student', 'student.secid = section.secid');
          	 $this->db->where('student.id_num', $sid);
          	 $this->db->order_by('schedule_subject.time', 'asc');
          	 $query=$this->db->get();  
           	 return $query->result();
		}

}

/* End of file studlog_model.php */
/* Location: ./application/models/studlog_model.php */
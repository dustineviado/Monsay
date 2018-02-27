<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class teacherlog_model extends CI_Model {

	function __construct(){
			parent::__construct();
		}

	function scheduleget($sid){
          	 $this->db->select('schedule_subject.room, schedule_subject.day, schedule_subject.time, subject.subject, section.section_name, section.year_level');  
          	 $this->db->from('schedule');
          	 $this->db->join('schedule_subject', 'schedule_subject.scheid = schedule.scheid');
          	 $this->db->join('subject', 'subject.subid = schedule_subject.subid');
          	 $this->db->join('teacher', 'teacher.teacher_id = schedule_subject.teacher_id');
          	 $this->db->join('section', 'section.scheid = schedule.scheid');
          	 $this->db->where('schedule_subject.teacher_id', $sid);
          	 $this->db->order_by('schedule_subject.time', 'asc');
          	 $query=$this->db->get();  
           	 return $query->result();
		}

}

/* End of file teacherlog_model.php */
/* Location: ./application/models/teacherlog_model.php */
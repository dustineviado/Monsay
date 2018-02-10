<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class schoolyear_model extends CI_Model {

		function __construct(){
			parent::__construct();
		}

		function schoolyearend($sid){
			$gradingquery = $this->db->get('grading');
			foreach($gradingquery->result() as $row){
				$this->db->set('id_num',$row->id_num);
				$this->db->set('year',$row->year);
				$this->db->set('subid',$row->subid);
				$this->db->set('grade',$row->grade);
				$this->db->set('quarter',$row->quarter);
				$this->db->set('schoolyear',$sid);
				$this->db->insert('archive_grading');
			}
			

			$subjectquery = $this->db->get('subject');
			foreach($subjectquery->result() as $row){
				$this->db->set('subid',$row->subid);
				$this->db->set('subject',$row->subject);
				$this->db->set('faculty',$row->faculty);
				$this->db->set('year_level',$row->year_level);
				$this->db->set('schoolyear',$sid);
				$this->db->insert('archive_subject');
			}

			$schedulequery = $this->db->get('schedule');
			foreach($schedulequery->result() as $row){
				$this->db->set('scheid',$row->scheid);
				$this->db->set('schoolyear',$sid);
				$this->db->insert('archive_schedule');
			}

			$schedulesubjectquery = $this->db->get('schedule_subject');
			foreach($schedulesubjectquery->result() as $row){
				$this->db->set('scheid',$row->scheid);
				$this->db->set('day',$row->day);
				$this->db->set('time',$row->time);
				$this->db->set('subid',$row->subid);
				$this->db->set('teacher_id',$row->teacher_id);
				$this->db->set('schoolyear',$sid);
				$this->db->insert('archive_schedule_subject');
			}

			$sectionquery = $this->db->get('section');
			foreach($sectionquery->result() as $row){
				$this->db->set('secid',$row->secid);
				$this->db->set('section_name',$row->section_name);
				$this->db->set('year_level',$row->year_level);
				$this->db->set('teacher_id',$row->teacher_id);
				$this->db->set('scheid',$row->scheid);
				$this->db->set('schoolyear',$sid);
				$this->db->insert('archive_section');
			}

			$teacherquery = $this->db->get('teacher');
			foreach($teacherquery->result() as $row){
				$this->db->set('teacher_id',$row->teacher_id);
				$this->db->set('fname',$row->fname);
				$this->db->set('mname',$row->mname);
				$this->db->set('lname',$row->lname);
				$this->db->set('birthday',$row->birthday);
				$this->db->set('age',$row->age);
				$this->db->set('gender',$row->gender);
				$this->db->set('email',$row->email);
				$this->db->set('department',$row->department);
				$this->db->set('address',$row->address);
				$this->db->set('contact',$row->contact);
				$this->db->set('status',$row->status);
				$this->db->set('schoolyear',$sid);
				$this->db->insert('archive_teacher');
			}

			$studentquery = $this->db->get('student');
			foreach($studentquery->result() as $row){
				$this->db->set('id_num',$row->id_num);
				$this->db->set('fname',$row->fname);
				$this->db->set('mname',$row->mname);
				$this->db->set('lname',$row->lname);
				$this->db->set('email',$row->email);
				$this->db->set('birthday',$row->birthday);
				$this->db->set('age',$row->age);
				$this->db->set('contact',$row->contact);
				$this->db->set('gender',$row->gender);
				$this->db->set('religion',$row->religion);
				$this->db->set('address',$row->address);
				$this->db->set('parent_guard',$row->parent_guard);
				$this->db->set('pgcontact',$row->pgcontact);
				$this->db->set('year',$row->year);
				$this->db->set('secid',$row->secid);
				$this->db->set('status',$row->status);
				$this->db->set('schoolyear',$sid);
				$this->db->insert('archive_student');
			}
		}

}

/* End of file modelName.php */
/* Location: ./application/models/modelName.php */
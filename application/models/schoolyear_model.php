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
			

			// $subjectquery = $this->db->get('subject');
			// foreach($subjectquery->result() as $row){
			// 	$this->db->set('subid',$row->subid);
			// 	$this->db->set('subject',$row->subject);
			// 	$this->db->set('faculty',$row->faculty);
			// 	$this->db->set('year_level',$row->year_level);
			// 	$this->db->set('schoolyear',$sid);
			// 	$this->db->insert('archive_subject');
			// }

			// $schedulequery = $this->db->get('schedule');
			// foreach($schedulequery->result() as $row){
			// 	$this->db->set('scheid',$row->scheid);
			// 	$this->db->set('schoolyear',$sid);
			// 	$this->db->insert('archive_schedule');
			// }

			// $schedulesubjectquery = $this->db->get('schedule_subject');
			// foreach($schedulesubjectquery->result() as $row){
			// 	$this->db->set('scheid',$row->scheid);
			// 	$this->db->set('day',$row->day);
			// 	$this->db->set('time',$row->time);
			// 	$this->db->set('subid',$row->subid);
			//  $this->db->set('room',$row->room);
			// 	$this->db->set('teacher_id',$row->teacher_id);
			// 	$this->db->set('schoolyear',$sid);
			// 	$this->db->insert('archive_schedule_subject');
			// }

			// $sectionquery = $this->db->get('section');
			// foreach($sectionquery->result() as $row){
			// 	$this->db->set('secid',$row->secid);
			// 	$this->db->set('section_name',$row->section_name);
			// 	$this->db->set('year_level',$row->year_level);
			// 	$this->db->set('teacher_id',$row->teacher_id);
			// 	$this->db->set('scheid',$row->scheid);
			// 	$this->db->set('schoolyear',$sid);
			// 	$this->db->insert('archive_section');
			// }

			// $teacherquery = $this->db->get('teacher');
			// foreach($teacherquery->result() as $row){
			// 	$this->db->set('teacher_id',$row->teacher_id);
			// 	$this->db->set('fname',$row->fname);
			// 	$this->db->set('mname',$row->mname);
			// 	$this->db->set('lname',$row->lname);
			// 	$this->db->set('birthday',$row->birthday);
			// 	$this->db->set('age',$row->age);
			// 	$this->db->set('gender',$row->gender);
			// 	$this->db->set('email',$row->email);
			// 	$this->db->set('department',$row->department);
			// 	$this->db->set('address',$row->address);
			// 	$this->db->set('contact',$row->contact);
			// 	$this->db->set('status',$row->status);
			// 	$this->db->set('schoolyear',$sid);
			// 	$this->db->insert('archive_teacher');
			// }

			// $studentquery = $this->db->get('student');
			// foreach($studentquery->result() as $row){
			// 	$this->db->set('id_num',$row->id_num);
			// 	$this->db->set('fname',$row->fname);
			// 	$this->db->set('mname',$row->mname);
			// 	$this->db->set('lname',$row->lname);
			// 	$this->db->set('email',$row->email);
			// 	$this->db->set('birthday',$row->birthday);
			// 	$this->db->set('age',$row->age);
			// 	$this->db->set('contact',$row->contact);
			// 	$this->db->set('gender',$row->gender);
			// 	$this->db->set('religion',$row->religion);
			// 	$this->db->set('address',$row->address);
			// 	$this->db->set('parent_guard',$row->parent_guard);
			// 	$this->db->set('pgcontact',$row->pgcontact);
			// 	$this->db->set('year',$row->year);
			// 	$this->db->set('secid',$row->secid);
			// 	$this->db->set('status',$row->status);
			// 	$this->db->set('schoolyear',$sid);
			// 	$this->db->insert('archive_student');
			// }


			$this->db->select("id_num");
			$this->db->from('grading');
			$this->db->where('grade <', '75');
			$studentcheckquery = $this->db->get();
			$failstudents = '';
			foreach($studentcheckquery->result() as $row){
				$failstudents = $row->id_num;
			}

			$this->db->select('*');
			$this->db->from('student');
			$this->db->where_not_in('id_num', $failstudents);
			$checkstudentquery = $this->db->get();
			foreach ($checkstudentquery->result() as $row) {
						if($row->year == 'Kinder'){
							$this->db->set('year','Preparatory');
							$this->db->where('id_num', $row->id_num);
							$this->db->update('student');
						}
						else if($row->year == 'Preparatory'){
							$this->db->set('year','Grade 1');
							$this->db->where('id_num', $row->id_num);
							$this->db->update('student');
						}
						else if($row->year == 'Grade 1'){
							$this->db->set('year','Grade 2');
							$this->db->where('id_num', $row->id_num);
							$this->db->update('student');
						}
						else if($row->year == 'Grade 2'){
							$this->db->set('year','Grade 3');
							$this->db->where('id_num', $row->id_num);
							$this->db->update('student');
						}
						else if($row->year == 'Grade 3'){
							$this->db->set('year','Grade 4');
							$this->db->where('id_num', $row->id_num);
							$this->db->update('student');
						}
						else if($row->year == 'Grade 4'){
							$this->db->set('year','Grade 5');
							$this->db->where('id_num', $row->id_num);
							$this->db->update('student');
						}
						else if($row->year == 'Grade 5'){
							$this->db->set('year','Grade 6');
							$this->db->where('id_num', $row->id_num);
							$this->db->update('student');
						}
						else if($row->year == 'Grade 6'){
							$this->db->set('year','Grade 7');
							$this->db->where('id_num', $row->id_num);
							$this->db->update('student');
						}
						else if($row->year == 'Grade 7'){
							$this->db->set('year','Grade 8');
							$this->db->where('id_num', $row->id_num);
							$this->db->update('student');
						}
						else if($row->year == 'Grade 8'){
							$this->db->set('year','Grade 9');
							$this->db->where('id_num', $row->id_num);
							$this->db->update('student');
						}
						else if($row->year == 'Grade 9'){
							$this->db->set('year','Grade 10');
							$this->db->where('id_num', $row->id_num);
							$this->db->update('student');
						}
						else if($row->year == 'Grade 10'){
							$this->db->set('year','Grade 11');
							$this->db->where('id_num', $row->id_num);
							$this->db->update('student');
						}
						else if($row->year == 'Grade 11'){
							$this->db->set('year','Grade 12');
							$this->db->where('id_num', $row->id_num);
							$this->db->update('student');
						}
						else if($row->year == 'Grade 12'){
							$this->db->set('year','Graduated');
							$this->db->where('id_num', $row->id_num);
							$this->db->update('student');
						}
			
			}

			$this->db->select('*');
			$this->db->from('student');
			$this->db->join('section','section.secid = student.secid');
			$this->db->where_not_in('id_num', $failstudents);
			$checkstudentsection = $this->db->get();
			foreach ($checkstudentsection->result() as $row) {
				$this->db->select('secid');
				$this->db->from('section');
				$this->db->where('year_level', $row->year);
				$this->db->where('section_name', $row->section_name);
				$newsecid = $this->db->get();

				foreach($newsecid->result() as $wor){
					$this->db->set('secid', $wor->secid);
					$this->db->where('id_num', $row->id_num);
					$this->db->update('student');
				}
			}


			$this->db->set('status','Not Enrolled');
			$this->db->where('status','Enrolled');
			$this->db->update('student');

			//$this->db->truncate('schedule_subject');

		}

}

/* End of file modelName.php */
/* Location: ./application/models/modelName.php */
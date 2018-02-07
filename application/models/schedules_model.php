<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class schedules_model extends CI_Model {
		
		function __construct(){
			parent::__construct();
		}
		function addschedule($data){
			$this->db->insert('schedule',$data);
		}

		function addschedulesubject($data){
			$this->db->insert('schedule_subject',$data);
		}

		function schedulesubjectedit($data){
			$this->db->set('scheid',$data[0]);
			$this->db->set('day',$data[1]);
			$this->db->set('time',$data[2]);
			$this->db->set('subid',$data[3]);
			$this->db->set('teacher_id',$data[4]);
			$this->db->where('scheid', $data[0]);
			$this->db->where('subid', $data[3]);
			$this->db->update('schedule_subject');
		}
		function scheduledelete($sid){
	        $this->db->where('scheid', $sid);
	        $this->db->delete('schedule');
		}
		function scheduleedit1($sid){
          	 $this->db->select('schedule_subject.scheid, schedule_subject.day, schedule_subject.time, schedule_subject.subid, subject.subject, subject.year_level, teacher.teacher_id, teacher.fullname');  
          	 $this->db->from('schedule');
          	 $this->db->join('schedule_subject', 'schedule_subject.scheid = schedule.scheid');
          	 $this->db->join('subject', 'subject.subid = schedule_subject.subid');
          	 $this->db->join('teacher', 'teacher.teacher_id = schedule_subject.teacher_id');
          	 $this->db->where('schedule.scheid', $sid);
          	 $query=$this->db->get();  
           	 return $query->result();
		}
		function scheduleedit2($data){
			$hiddenid = $this->input->post('hidid');
			$this->db->where('id_num', $hiddenid);
			$this->db->update('schedule', $data);
		}
		  var $table = "schedule";  
	      var $select_column = array("scheid");  
	      var $order_column = array("scheid",null);  
	      
	      function make_query()  
	      {  
	           $this->db->select($this->select_column);  
	           $this->db->from($this->table);  
	           if(isset($_POST["search"]["value"]))  
	           {  
	                $this->db->like("scheid", $_POST["search"]["value"], 'after');  
	                   
	           } 
	            
	           if(isset($_POST["order"]))  
	           {  
	                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
	           }  
	           else  
	           {  
	                $this->db->order_by('scheid', 'ASC');  
	           }  
	      }  
	      function make_datatables(){  
	           $this->make_query();  
	           if($_POST["length"] != -1)  
	           {  
	                $this->db->limit($_POST['length'], $_POST['start']);  
	           }  
	           $query = $this->db->get();  
	           return $query->result();  
	      }  
	      function get_filtered_data(){  
	           $this->make_query();  
	           $query = $this->db->get();  
	           return $query->num_rows();  
	      }       
	      function get_all_data()  
	      {  
	           $this->db->select("*");  
	           $this->db->from($this->table);  
	           return $this->db->count_all_results();  
	      }  
}
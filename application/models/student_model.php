<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class student_model extends CI_Model {
		
		function __construct(){
			parent::__construct();
		}
		function addstudent($data){
			$this->db->insert('student',$data);
			$insert_id = $this->db->insert_id();
			return $insert_id;
		}

		function studentdelete($sid){
	        $this->db->where('id_num', $sid);
			$studentquery = $this->db->get('student');
			foreach($studentquery->result() as $row){
				$this->db->set('id_num',$row->id_num);
				$this->db->set('fname',$row->fname);
				$this->db->set('mname',$row->mname);
				$this->db->set('lname',$row->lname);
				$this->db->set('email',$row->email);
				$this->db->set('birthday',$row->birthday);
				$this->db->set('contact',$row->contact);
				$this->db->set('gender',$row->gender);
				$this->db->set('religion',$row->religion);
				$this->db->set('address',$row->address);
				$this->db->set('parent_guard',$row->parent_guard);
				$this->db->set('pgcontact',$row->pgcontact);
				$this->db->set('year',$row->year);
				$this->db->set('secid',$row->secid);
				$this->db->set('status','Leaved');
				$this->db->insert('archive_student');
			}

			$this->db->where('id_number', $sid);
			$studenttypequery = $this->db->get('type');
			foreach($studenttypequery->result() as $row){
				$this->db->set('user_type',$row->user_type);
				$this->db->set('email',$row->email);
				$this->db->set('id_number',$row->id_number);
				$this->db->set('password',$row->password);
				$this->db->insert('archive_type');
			}

			$this->db->where('id_num', $sid);
	        $this->db->delete('student');

	        $this->db->where('id_number', $sid);
	        $this->db->delete('type');
		}

		function optionget($sid){
			$this->db->select('secid, section_name');
			$this->db->from('section');
			$this->db->where('year_level', $sid);
			$query=$this->db->get();  
           	return $query->result();
		}
		function email_exist($email){
			$this->db->select('email');
			$this->db->from('student');
			$this->db->where('email', $email);
			$query = $this->db->get();
			if($query->num_rows() > 0){
				return true;
			}
			else{
				return false;
			}
			
		}
		function studentedit1($sid){
			$this->db->select('student.id_num, student.fname, student.mname, student.lname, student.email, student.birthday, student.contact, student.gender, student.religion, student.address, student.parent_guard, student.pgcontact, student.year, section.secid, section.section_name, student.status');
			$this->db->from('student');
			$this->db->join('section', 'section.secid = student.secid');
			 $this->db->where('id_num', $sid);  
          	 $query=$this->db->get();  
           	return $query->result();
		}
		function studentedit2($sid, $updated_data){
			$this->db->where('id_num', $sid);
			$this->db->update('student', $updated_data);
		}
		  var $table = "student";  
	      var $select_column = array("student.id_num", "student.fname", "student.mname", "student.lname", "student.year", "section.section_name");  
	      var $order_column = array("student.id_num", "student.fname", "student.mname", "student.lname",  "student.year", "section.section_name", null);  
	      
	      function make_query()  
	      {    

	           $this->db->select($this->select_column);  
	           $this->db->from($this->table);
	           $this->db->join('section', 'section.secid = student.secid');
	           if(isset($_POST["search"]["value"]))  
	           {  
	                $this->db->like("id_num", $_POST["search"]["value"], 'after');  
	                $this->db->or_like("fname", $_POST["search"]["value"], 'after');
	                $this->db->or_like("mname", $_POST["search"]["value"], 'after');
	                $this->db->or_like("lname", $_POST["search"]["value"], 'after');
	                $this->db->or_like("year", $_POST["search"]["value"], 'after');
	                $this->db->or_like("section_name", $_POST["search"]["value"], 'after');
	                   
	           } 
	            
	           if(isset($_POST["order"]))  
	           {  
	                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
	           }  
	           else  
	           {  
	                $this->db->order_by('id_num', 'ASC');  
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

	      function idauto($sid){
	      	$this->db->select_max('id_num');
	      	$this->db->like('id_num', $sid, 'after');
	      	$this->db->from('student');
			$query = $this->db->get();
			return $query->result();
	      }
	      
	      function insertaddacc($data){
			$this->db->insert('type',$data);
		  }   
}
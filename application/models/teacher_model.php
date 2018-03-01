<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class teacher_model extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	function addteacher($data){
			$this->db->insert('teacher',$data);
		}

		function teacherdelete($Tid){

			$this->db->where('teacher_id', $Tid);
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
				$this->db->insert('archive_teacher');
			}

			$this->db->where('id_number', $Tid);
			$teachertypequery = $this->db->get('type');
			foreach($teachertypequery->result() as $row){
				$this->db->set('user_type',$row->user_type);
				$this->db->set('email',$row->email);
				$this->db->set('id_number',$row->id_number);
				$this->db->set('password',$row->password);
				$this->db->insert('archive_type');
			}

	        $this->db->where('teacher_id', $Tid);
	        $this->db->delete('teacher');

	        $this->db->where('id_number', $Tid);
	        $this->db->delete('type');
		}

		function teacheredit1($Tid){
			 $this->db->where('teacher_id', $Tid);  
          	 $query=$this->db->get('teacher');  
           	return $query->result();
		}
		function teacheredit2($data){
			$hiddenid = $this->input->post('hiddenid');
			$this->db->where('teacher_id', $hiddenid);
			$this->db->update('teacher', $data);
		}



	var $table = "teacher";
	var $select_column_teacher = array("teacher_id", "fname", "lname", "department", "status");
	var $order_column_teacher = array("teacher_id", "fname", "lname", "department", "status", null);

	function make_query_teacher(){
		$this->db->select($this->select_column_teacher);
		$this->db->from($this->table);
		if(isset($_POST["search"]["value"]))
		{
			$this->db->like("teacher_id", $_POST["search"]["value"], 'after');
			$this->db->or_like("fname", $_POST["search"]["value"], 'after');
			$this->db->or_like("lname", $_POST["search"]["value"], 'after');
			$this->db->or_like("department", $_POST["search"]["value"], 'after');
			$this->db->or_like("status", $_POST["search"]["value"], 'after');

		}
		 if(isset($_POST["order"]))  
	           {  
	                $this->db->order_by($this->order_column_teacher[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
	           }  
	           else  
	           {  
	                $this->db->order_by('teacher_id', 'asc');  
	           }  
	      
	      }
	      function id_exist($sid){
			$this->db->select('teacher_id');
			$this->db->from('teacher');
			$this->db->where('teacher_id', $sid);
			$query = $this->db->get();
			if($query->num_rows() > 0){
				return true;
			}
			else{
				return false;
			}
			
		}
		 function id_exist2($teacherid){
			$this->db->select('teacher_id');
			$this->db->from('teacher');
			$this->db->where('teacher_id', $teacherid);
			$query = $this->db->get();
			if($query->num_rows() > 0){
				return true;
			}
			else{
				return false;
			}
			
		}
	      function make_datatables_teacher(){  
	           $this->make_query_teacher();  
	           if($_POST["length"] != -1);  
	           {  
	                $this->db->limit($_POST['length'], $_POST['start']);  
	           }  
	           $query = $this->db->get();  
	           return $query->result();  
	      }  
	      function get_filtered_data(){  
	           $this->make_query_teacher();  
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
	      	$this->db->select_max('teacher_id');
	      	$this->db->like('teacher_id', $sid, 'after');
	      	$this->db->from('teacher');
			$query = $this->db->get();
			return $query->result();
	      }

	      function insertaddacc($data){
			$this->db->insert('type',$data);
		  } 
	}

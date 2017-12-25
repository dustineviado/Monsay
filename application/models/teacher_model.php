<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher_model extends CI_Model {

	function_construc(){
		parent::__construct();
	}

	var $table = "teacher";
	var $select_column_teacher = array("teacher_id, fname, mname, lname, birthday, age, gender, email, advisory, subject, address, contact, status");
	var $order_column_teacher = array("teacher_id, fname, mname, lname, birthday, age, gender, email, advisory, subject, address, contact, status");
	}


	function make_query_teacher(){

		$this->db->select($this->select_column_teacher);
		$this->db->from($this->table);
		if(isset($_POST["search"]["value"]))
		{

			$this->db->like("teacher_id", $_POST["search"]["value"]);
			$this->db->or_like("fname", $_POST["search"]["value"]);
			$this->db->or_like("mname", $_POST["search"]["value"]);
			$this->db->or_like("lname", $_POST["search"]["value"]);
			$this->db->or_like("birthday", $_POST["search"]["value"]);
			$this->db->or_like("age", $_POST["search"]["value"]);
			$this->db->or_like("gender", $_POST["search"]["value"]);
			$this->db->or_like("email", $_POST["search"]["value"]);
			$this->db->or_like("advisory", $_POST["search"]["value"]);
			$this->db->or_like("subject", $_POST["search"]["value"]);
			$this->db->or_like("address", $_POST["search"]["value"]);
			$this->db->or_like("contact", $_POST["search"]["value"]);
			$this->db->or_like("status", $_POST["search"]["value"]);
		}

		 if(isset($_POST["order"]))  
	           {  
	                $this->db->order_by($this->order_column_teacher[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
	           }  
	           else  
	           {  
	                $this->db->order_by('teacher_id', 'DESC');  
	           }  
	      
	      function make_datatables_teacher(){  
	           $this->make_query_teacher();  
	           if($_POST["length"] != -1)  
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




	}

/* End of file teacher_model.php */
/* Location: ./application/models/teacher_model.php */	
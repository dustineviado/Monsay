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
	        $this->db->delete('teacher');
		}
		function teacheredit1($Tid){
			 $this->db->where('teacher_id', $Tid);  
          	 $query=$this->db->get('teacher');  
           	return $query->result();
		}
		function teacheredit2($data){
			$hiddenid = $this->input->post('hidid');
			$this->db->where('teacher_id', $hiddenid);
			$this->db->update('teacher', $data);
		}



	var $table = "teacher";
	var $select_column_teacher = array("teacher_id", "fullname", "advisory", "faculty",  "status");
	var $order_column_teacher = array("teacher_id", "fullname",   "email", "advisory", "contact", null, null);

	function make_query_teacher(){
		$this->db->select($this->select_column_teacher);
		$this->db->from($this->table);
		if(isset($_POST["search"]["value"]))
		{
			$this->db->like("teacher_id", $_POST["search"]["value"], 'after');
			$this->db->or_like("fullname", $_POST["search"]["value"], 'after');
			$this->db->or_like("advisory", $_POST["search"]["value"], 'after');
			$this->db->or_like("faculty", $_POST["search"]["value"], 'after');
			$this->db->or_like("status", $_POST["search"]["value"], 'after');

		}
		 if(isset($_POST["order"]))  
	           {  
	                $this->db->order_by($this->order_column_teacher[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
	           }  
	           else  
	           {  
	                $this->db->order_by('teacher_id', 'DESC');  
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
	}

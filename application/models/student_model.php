<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class student_model extends CI_Model {
		
		function __construct(){
			parent::__construct();
		}

		function addstudent($data){
			$this->db->insert('student',$data);
		}

		function studentdelete($sid){
	        $this->db->where('id_num', $sid);
	        $this->db->delete('student');
		}

		function studentedit1($sid){
			 $this->db->where('id_num', $sid);  
          	 $query=$this->db->get('student');  
           	return $query->result();
		}

		function studentedit2($data){
			$hiddenid = $this->input->post('hidid');
			$this->db->where('id_num', $hiddenid);
			$this->db->update('student', $data);
		}

		  var $table = "student";  
	      var $select_column = array("id_num", "studname", "email", "birthday", "age", "contact", "gender", "religion", "address", "parent_guard", "pgcontact", "year", "section", "status");  
	      var $order_column = array("id_num", "studname", "email", "birthday", "age", "contact", "gender", "religion", "address", "parent_guard", "pgcontact", "year", "section", "status", null);  
	      
	      function make_query()  
	      {  
	           $this->db->select($this->select_column);  
	           $this->db->from($this->table);  
	           if(isset($_POST["search"]["value"]))  
	           {  
	                $this->db->like("id_num", $_POST["search"]["value"], 'after');  
	                $this->db->or_like("studname", $_POST["search"]["value"], 'after');
	                $this->db->or_like("email", $_POST["search"]["value"], 'after');
	                $this->db->or_like("birthday", $_POST["search"]["value"], 'after');
	                $this->db->or_like("age", $_POST["search"]["value"], 'after');
	                $this->db->or_like("contact", $_POST["search"]["value"], 'after');
	                $this->db->or_like("gender", $_POST["search"]["value"], 'after');
	                $this->db->or_like("religion", $_POST["search"]["value"], 'after');
	                $this->db->or_like("address", $_POST["search"]["value"], 'after');
	                $this->db->or_like("parent_guard", $_POST["search"]["value"], 'after');
	                $this->db->or_like("pgcontact", $_POST["search"]["value"], 'after');
	                $this->db->or_like("year", $_POST["search"]["value"], 'after');
	                $this->db->or_like("section", $_POST["search"]["value"], 'after');
	                $this->db->or_like("status", $_POST["search"]["value"], 'after');
	                   
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
}
/* End of file subject_model.php */
/* Location: ./application/models/subject_model.php */
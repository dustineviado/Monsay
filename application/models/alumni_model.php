<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class alumni_model extends CI_Model {

		function __construct(){
			parent::__construct();
		}
	
		  var $table = "archive_student";  
	      var $select_column = array("id_num", "fname", "mname", "lname");  
	      var $order_column = array("id_num", "fname", "mname", "lname", null);  
	      
	      function make_query()  
	      {  
	           $this->db->select($this->select_column);  
	           $this->db->from($this->table);
	           $search = $_POST["search"]["value"];  
	           if(isset($search))  
	           {
	                $this->db->like("id_num", $search, 'after');  
	                $this->db->or_like("fname", $search, 'after');
	                $this->db->or_like("mname", $search, 'after');
	                $this->db->or_like("lname", $search, 'after'); 
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

	     function yearall($sid){
			$this->db->distinct();
			$this->db->select('year, schoolyear');
			$this->db->from('archive_grading');
			$this->db->where('id_num',$sid);
			$this->db->order_by("year", "asc");
			$query=$this->db->get();  
	        return $query->result();
		}

		function subjectsall($sid){
			$this->db->distinct();
			$this->db->select('archive_subject.subject, archive_grading.subid ');
			$this->db->from('archive_grading');
			$this->db->join('archive_subject', 'archive_subject.subid = archive_grading.subid');
			$this->db->where('id_num',$sid[0]);
			$this->db->where('archive_grading.schoolyear',$sid[1]);
			$this->db->where('archive_subject.schoolyear',$sid[1]);
			$this->db->order_by('archive_subject.subject');
			$this->db->order_by('quarter');
			$query=$this->db->get();  
	        return $query->result();
		}

		function gradesall($sid){
			$this->db->select('grade');
			$this->db->from('archive_grading');
			$this->db->where('id_num',$sid[0]);
			$this->db->where('schoolyear',$sid[1]);
			$this->db->where('subid',$sid[2]);
			$this->db->order_by('quarter');
			$query=$this->db->get();  
	        return $query->result();
		}
}

/* End of file alumni_model.php */
/* Location: ./application/models/alumni_model.php */
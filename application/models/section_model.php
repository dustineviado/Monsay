<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class section_model extends CI_Model {
		
		function __construct(){
			parent::__construct();
		}

		function addsection($data){

			$this->db->insert('section',$data);
		}

		function sectiondelete($sid){
	        $this->db->where('secid', $sid);
	        $this->db->delete('section');
		}

		function sectionedit1($sid){
			 $this->db->where('secid', $sid);  
          	 $query=$this->db->get('section');  
           	return $query->result();
		}

		function sectionedit2($data){
			$hiddenid = $this->input->post('hidid');
			$this->db->where('secid', $hiddenid);
			$this->db->update('section', $data);
		}

		  var $table = "section";  
	      var $select_column = array("section.secid", "section.section_name", "section.year_level", "teacher.fname", "teacher.mname", "teacher.lname", "section.scheid");  
	      var $order_column = array("section.secid", "section.section_name", "section.year_level", "section.scheid", null);  
	      
	      function make_query()  
	      {  
	           $this->db->select($this->select_column);  
	           $this->db->from($this->table);
	           $this->db->join('teacher', 'teacher.teacher_id = section.teacher_id');  
	           if(isset($_POST["search"]["value"]))  
	           {  
	                $this->db->like("secid", $_POST["search"]["value"]);  
	                $this->db->or_like("section_name", $_POST["search"]["value"]);
	                $this->db->or_like("year_level", $_POST["search"]["value"]);
	                $this->db->or_like("fname", $_POST["search"]["value"]);
	                $this->db->or_like("mname", $_POST["search"]["value"]);
	                $this->db->or_like("lname", $_POST["search"]["value"]);
	                $this->db->or_like("scheid", $_POST["search"]["value"]);   
	           }  
	           if(isset($_POST["order"]))  
	           {  
	                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
	           }  
	           else  
	           {  
	                $this->db->order_by('secid', 'ASC');  
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
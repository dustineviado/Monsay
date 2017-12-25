<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class subject_model extends CI_Model {
		
		function __construct(){
			parent::__construct();
		}

		function addsubject($data){

			$this->db->insert('subject',$data);
		}

		function subjectdelete($sid){
	        $this->db->where('subid', $sid);
	        $this->db->delete('subject');
		}

		function subjectedit1($sid){
			 $this->db->where('subid', $sid);  
          	 $query=$this->db->get('subject');  
           	return $query->result();
		}

		function subjectedit2($data){
			$hiddenid = $this->input->post('hidid');
			$this->db->where('subid', $hiddenid);
			$this->db->update('subject', $data);
		}

		 var $table = "subject";  
	      var $select_column = array("subid", "subject", "faculty", "year_level");  
	      var $order_column = array("subid", "subject", "faculty" , "year_level", null);  
	      
	      function make_query()  
	      {  
	           $this->db->select($this->select_column);  
	           $this->db->from($this->table);  
	           if(isset($_POST["search"]["value"]))  
	           {  
	                $this->db->like("subid", $_POST["search"]["value"]);  
	                $this->db->or_like("subject", $_POST["search"]["value"]);
	                $this->db->or_like("faculty", $_POST["search"]["value"]);
	                $this->db->or_like("year_level", $_POST["search"]["value"]);   
	           }  
	           if(isset($_POST["order"]))  
	           {  
	                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
	           }  
	           else  
	           {  
	                $this->db->order_by('subid', 'DESC');  
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
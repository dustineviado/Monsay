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
	           $search = $_POST["search"]["value"];  
	           if(isset($search))  
	           {
	                $this->db->like("subid", $search);  
	                $this->db->or_like("subject", $search);
	                $this->db->or_like("faculty", $search);
	                $this->db->or_like("year_level", $search); 
	           }

	           /*$key_array = explode("|",$search);
		       
	           if(isset($search))  
	           {	
	           		foreach($key_array as $kw){
		                $this->db->like("subid", $kw);  
		                $this->db->or_like("subject", $kw);
		                $this->db->or_like("faculty", $kw);
		                $this->db->or_like("year_level", $kw);
	                }   
	           }*/

	           if(isset($_POST["order"]))  
	           {  
	                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
	           }  
	           else  
	           {  
	                $this->db->order_by('subid', 'ASC');  
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
	      function id_exist($key){
	      	$this->db->select('subid');
	      	$this->db->where('subid', $key);
	      	$query = $this->db->get('subject');
	      	$row = $query->row();

	      	if($query->num_rows() > 0)
	      	{
	      		return $row;
	      	}
	      	else
	      	{
	      		echo'Does not exist';
	      	}
	}    	
}
/* End of file subject_model.php */
/* Location: ./application/models/subject_model.php */	 
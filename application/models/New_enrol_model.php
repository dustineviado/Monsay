<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class New_enrol_model extends CI_Model {
		
		function __construct(){
			parent::__construct();
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

		  function optionget($sid){
			$this->db->select('secid, section_name');
			$this->db->from('section');
			$this->db->where('year_level', $sid);
			$query=$this->db->get();  
           	return $query->result();
		}
		
		function addstudent($data){
		$this->db->insert('pre_registration', $data);
		}
		function is_email_available($studemail)
		{
			$this->db->where('email', $studemail);
			$query = $this->db-get('pre_registration');
			if($query->num_rows() > 0)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		function deleteEnrollee($sid){
	        $this->db->where('ctrl_num', $sid);
	        $this->db->delete('pre_registration');
		}

		function editEnrollee1($sid){
			 $this->db->where('ctrl_num', $sid);  
          	 $query=$this->db->get('pre_registration');  
           	 return $query->result();
		}

		function editEnrollee2($data){
			$hiddenid = $this->input->post('hidid');
			$this->db->where('ctrl_num', $hiddenid);
			$this->db->update('pre_registration', $data);
		}

		  var $table = "pre_registration";  
	      var $select_column = array("ctrl_num", "fname", "mname", "lname", "date_made", "status");  
	      var $order_column = array("ctrl_num", "fname", "mname", "lname", "date_made", "status", null);  
	      
	      function make_query()  
	      {  
	           $this->db->select($this->select_column);  
	           $this->db->from($this->table);  
	           if(isset($_POST["search"]["value"]))  
	           {  
	                $this->db->like("ctrl_num", $_POST["search"]["value"], 'after');  
	                $this->db->or_like("fname", $_POST["search"]["value"], 'after');
	                $this->db->or_like("mname", $_POST["search"]["value"], 'after');
	                $this->db->or_like("lname", $_POST["search"]["value"], 'after');
	                $this->db->or_like("date_made", $_POST["search"]["value"], 'after');     
	                $this->db->or_like("status", $_POST["search"]["value"], 'after');
	                   
	           } 
	           if(isset($_POST["order"]))  
	           {  
	                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
	           }  
	           else  
	           {  
	                $this->db->order_by('ctrl_num', 'ASC');  
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
	public function confirmation($data){
			$this->db->insert('student',$data);
			}		

	public function confirmationdelete($data){	
			$this->db->where('ctrl_num', $data);
			$this->db->delete('pre_registration');
			} 
}
/* End of file subject_model.php */
/* Location: ./application/models/subject_model.php */
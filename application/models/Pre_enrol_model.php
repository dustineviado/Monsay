<?php
class Pre_enrol_model extends CI_Model{
		
		public function gettbl(){
			$query = $this->db->get('pre_registration');
				if($query->num_rows()>0){
					return $query->result();
				}

	}
		public function newStud($data){
			return $this->db->insert('pre_registration', $data);
		}
		function deleteEnrollee($sid){	
	        $this->db->where('ctrl_num', $sid);
	        $this->db->delete('pre_registration');
		}
		function enrolleeInfo($sid){
			 $this->db->where('ctrl_num', $sid);  
          	 $query=$this->db->get('pre_registration');  
           	return $query->result();
           	}
          var $table = "pre_registration";  
	      var $select_column = array("ctrl_num", "fname", "email", "birthday", "age", "contact", "gender", "religion", "address", "parent_guard", "pgcontact", "status");  
	      var $order_column = array("ctrl_num", "fname", "email", "birthday", "age", "contact", "gender", "religion", "address", "parent_guard", "pgcontact", "status", null);
           	function make_query()  
	      {  
	           $this->db->select($this->select_column);  
	           $this->db->from($this->table);  
	           if(isset($_POST["search"]["value"]))  
	           {  
	                $this->db->like("ctrl_num", $_POST["search"]["value"], 'after');  
	                $this->db->or_like("fname", $_POST["search"]["value"], 'after');
	                $this->db->or_like("email", $_POST["search"]["value"], 'after');
	                $this->db->or_like("birthday", $_POST["search"]["value"], 'after');
	                $this->db->or_like("age", $_POST["search"]["value"], 'after');
	                $this->db->or_like("contact", $_POST["search"]["value"], 'after');
	                $this->db->or_like("gender", $_POST["search"]["value"], 'after');
	                $this->db->or_like("religion", $_POST["search"]["value"], 'after');
	                $this->db->or_like("address", $_POST["search"]["value"], 'after');
	                $this->db->or_like("parent_guard", $_POST["search"]["value"], 'after');
	                $this->db->or_like("pgcontact", $_POST["search"]["value"], 'after');
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
}
?>
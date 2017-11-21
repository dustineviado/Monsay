<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class subject_model extends CI_Model {
		
		function __construct(){
			parent::__construct();
		}
		
		function selectsubjects(){
		$option = $this->input->get('selsub');

			if ($option == 'all'){
				$query = $this->db->get('subject');
				return $query->result_array();
			}
			else if($option == 'Kinder'){
				$this->db->where('year_level',$option);
				$query = $this->db->get('subject');
				return $query->result_array();
			}
			else if($option == 'Preparatory'){
				$this->db->where('year_level',$option);
				$query = $this->db->get('subject');
				return $query->result_array();
			}
			else if($option == 'Grade 1'){
				$this->db->where('year_level',$option);
				$query = $this->db->get('subject');
				return $query->result_array();
			}
			else if($option == 'Grade 2'){
				$this->db->where('year_level',$option);
				$query = $this->db->get('subject');
				return $query->result_array();
			}
			else if($option == 'Grade 3'){
				$this->db->where('year_level',$option);
				$query = $this->db->get('subject');
				return $query->result_array();
			}
			else if($option == 'Grade 4'){
				$this->db->where('year_level',$option);
				$query = $this->db->get('subject');
				return $query->result_array();
			}	
			else if($option == 'Grade 5'){
				$this->db->where('year_level',$option);
				$query = $this->db->get('subject');
				return $query->result_array();
			}	
			else if($option == 'Grade 6'){
				$this->db->where('year_level',$option);
				$query = $this->db->get('subject');
				return $query->result_array();
			}	
			else if($option == 'Grade 7'){
				$this->db->where('year_level',$option);
				$query = $this->db->get('subject');
				return $query->result_array();
			}	
			else if($option == 'Grade 8'){
				$this->db->where('year_level',$option);
				$query = $this->db->get('subject');
				return $query->result_array();
			}	
			else if($option == 'Grade 9'){
				$this->db->where('year_level',$option);
				$query = $this->db->get('subject');
				return $query->result_array();
			}
			else if($option == 'Grade 10'){
				$this->db->where('year_level',$option);
				$query = $this->db->get('subject');
				return $query->result_array();
			}	
			else if($option == 'Grade 11'){
				$this->db->where('year_level',$option);
				$query = $this->db->get('subject');
				return $query->result_array();
			}	
			else if($option == 'Grade 12'){
				$this->db->where('year_level',$option);
				$query = $this->db->get('subject');
				return $query->result_array();
			}		
		}

		function addsubject($add){

			$this->db->insert('subject',$add);
			$this->db->where('subid !=',$add['subid']);
			$this->db->where('subject !=',$add['subject']);
			$this->db->where('faculty !=',$add['faculty']);

			$query = $this->db->get('subject');
			if($query->num_rows()!=0){
				return true;
			}
			else{
				return false;
			}
		}

		function subjectdelete(){
	        $id2 = $this->input->get('id');
	        $this->db->where('subid', $id2);
	        $this->db->delete('subject');
		}

}
/* End of file subject_model.php */
/* Location: ./application/models/subject_model.php */
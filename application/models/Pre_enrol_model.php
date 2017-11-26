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
}
?>
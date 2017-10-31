<?php
class Adminmodel extends CI_Model{
		
		public function gettbl(){
			$query = $this->db->get('student');
				if($query->num_rows()>0){
					return $query->result();
				}

	}
		public function addStud($data){
			return $this->db->insert('student', $data);
		}
		public function getval($id){
			$query = $this->db->get_where('student',array('id_num'=>$id));
			if($query->num_rows()>0){
					return $query->row();
				}
		}
		public function UpdStud($data, $id){
			return $this->db->where('id_num',$id)
				->update('student', $data);
		}
		public function bawas($id){
			$this->db->delete('student',['id_num'=>$id]);
		}

}		
?>
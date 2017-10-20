<?php
	class Model_login extends CI_Model{
		private $table = "user_login";
		
		public function read($user){
		$this->db->select('*');
		$this->db->where('username',$user['username']);
		$this->db->where('password',$user['password']);
		$query = $this->db->get($this->table);
		if($query->num_rows()==0){
			
			
			return false;
		}
		else{
		return true;
		
		}
		}
}	
	
?>
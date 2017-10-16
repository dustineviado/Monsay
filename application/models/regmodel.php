<?php
	class regmodel extends CI_Model{
		private $table ="register";
		
		function __construct(){
			parent::__construct();
		}
		function insertUser($user){
				$this->db->insert('register',$user);
				$this->db->where('fullname !=',$user['fullname']);
				$this->db->where('email !=',$user['email']);
				$this->db->where('contact !=',$user['contact']);
				$this->db->where('password !=',$user['password']);
				
				$query = $this->db->get($this->table);
				if($query->num_rows()!=0){
					return false;
				}
				else{
					return true;
				}
		}

}
?>
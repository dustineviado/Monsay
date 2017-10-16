<?php
	class regmodel extends CI_Model{
		private $table ="register";
		
		function __construct(){
			parent::__construct();
		}
		function insertUser($user){
				return $this->db->insert('register',$user);
				$query = $this->db->get($this->table);
				if($query->num_rows(==0)){
					
					return false;
				}
				else{
					return true;
				}
		}

}
?>
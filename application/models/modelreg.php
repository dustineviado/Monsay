<?php
class Modelreg extends CI_Model{
	private $table ="student";
	
	function __construct()
	{
	parent:: __construct();
	}
	function InsertUser($user){
		$this->db->insert('student', $user);
		
	}
}
?>
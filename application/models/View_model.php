<?php
class View_model extends CI_Model{
	private $table = "student";	
	function __construct()
	{
	parent:: __construct();
	}
	
    function get_student() {

        $query = $this->db->get('student');
		return $query;
    }
	function deletedata($id){
		$this->db->where('id_num',$id);
		$this->db->delete('student');
	}
}
	
?>
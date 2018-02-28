<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
	
function admin_login($id_number , $password)
{

	$this->db->where('id_number', $id_number);
	$this->db->where('password', $password);
	$this->db->where('user_type', 'Admin');
	$query = $this->db->get('type');

	if($query->num_rows() > 0)
	{	
		return $query->result_array();
	}
	else
	{
		return false;
	}
}
function student_login($id_number , $password)
{

	$this->db->where('id_number', $id_number);
	$this->db->where('password', $password);
	$this->db->where('user_type', 'Student');
	$query = $this->db->get('type');

	if($query->num_rows() > 0)
	{	
		return $query->result_array();
	}
	else
	{
		return false;
	}
}

function teacher_login($id_number , $password)
{

	$this->db->where('id_number', $id_number);
	$this->db->where('password', $password);
	$this->db->where('user_type', 'Teacher');
	$query = $this->db->get('type');

	if($query->num_rows() > 0)
	{	
		return $query->result_array();
	}
	else
	{
		return false;
	}
}
}

<?php
class User_model extends CI_Model 
{
	
	function User_Model()
	{
		parent::__construct();
	}
	
	function register_user($email, $firstname, $lastname, $class, $password)
	{
		$sha1_password = sha1($password);
		
		/*
		$query_str = "INSERT INTO user (email, firstname, lastname, class, password) VALUES (?, ?, ?, ?, ?)";
		
		$this->db->query($query_str, array($email, $firstname, $lastname, $class, $sha1_password));
		
		 * 
		 */
		$data = array(
	    	'E_Mail_Address' => $email,
			'First_Name' => $firstname,
			'Last_Name' => $lastname,
			'Class' => $class,
			'Password' => $sha1_password
		);

		if ($this->db->insert('user', $data))
		{
			return true;
		}
		else {
			return false;
		}
		
	}
	
	function get_new_Users()
	{
		$leerstring = null;
		$this->db->select('*');
 		$this->db->from('user');
		$this->db->where('Permission', '');
		$query = $this->db->get();
  		return $query->result_array();
	}
	
	function get_user_data($pUserNo)
	{
		$this->db->select('*');
 		$this->db->from('user');
		$this->db->where('No', $pUserNo);
		$query = $this->db->get();
		return $query->row_array();
	}
	
	function accept_user($pUserNo)
	{
		$normal = 'Normal';
		$data = array(
               'Permission' => $normal);
   		$this->db->where('No', (int)$pUserNo);	
		$this->db->update('user', $data); 	
	}
	
}

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
	
}

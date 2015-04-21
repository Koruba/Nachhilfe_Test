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
	
	function get_user_no($pUserMail)
	{
		$this->db->select('No');
		$this->db->from('user');
		$this->db->where('E_Mail_Address', $pUserMail);
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
	
	function get_classes()
	{
	    $query = $this->db->get('class'); 
	    foreach($query->result_array() as $row){
	        $return[$row['Name']] = $row['Name'];
	    }
	    return $return;
	}

	function login($email, $password)
 	{
		$this -> db -> select('No, E_Mail_Address, Password, Permission');
		$this -> db -> from('user');
		$this -> db -> where('E_Mail_Address', $email);
		$this -> db -> where('Password', sha1($password));
		$this -> db -> limit(1);
 
		$query = $this -> db -> get();
		 
		if($query -> num_rows() == 1)
		{
			return $query->row_array();
		}
		else
		{
			return false;
		}
	}
	
}

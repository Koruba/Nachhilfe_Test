<?php
class Course_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		$this->load->library('session');
	}
	
	public function get_courses()
	{
		$this->db->select('course.No AS queryCourseNo, course.Subject AS queryCourseSubject,
						   course.Name AS queryCourseName, 
						   course.Date_From AS queryCourseDateFrom, course.Date_To AS queryCourseDateTo,
						   course.Description AS queryCourseDescription, course.Maximum_Participants AS queryCourseMaximumParticipants,
						   course.Cost AS queryCourseCost, course.Accepted AS queryCourseAccepted,
						   user.First_Name AS queryUserFirstName, user.Last_Name AS queryUserLastName,
						   user.Class AS queryUserClass');
		$this->db->from('course');
		$this->db->where('Accepted', 1);
		$this->db->where('Date_To >=', date('Y-m-d',strtotime(str_replace('-', '/','now'))));
		$this->db->order_by('Date_Created ASC');
		$this->db->join('user', 'user.No = course.Instructor_No');		
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function get_courses_by_user($pAccepted = 1)
	{
		$this->db->select('*');
		$this->db->from('course');
		//$this->db->where('Accepted', $pAccepted);
		$this->db->where('Instructor_No', $this->session->userdata('userNo'));		
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function get_course_detail($pCourseNo, $pAccepted = 1)
	{
		$courseNo = (int)$pCourseNo;			
		$this->db->select('course.No AS queryCourseNo, course.Subject AS queryCourseSubject,
						   course.Name AS queryCourseName, course.Instructor_No AS queryUserInstructorNo,
						   course.Date_From AS queryCourseDateFrom, course.Date_To AS queryCourseDateTo,
						   course.Description AS queryCourseDescription, course.Maximum_Participants AS queryCourseMaximumParticipants,
						   course.Cost AS queryCourseCost, course.Accepted AS queryCourseAccepted,
						   user.First_Name AS queryUserFirstName, user.Last_Name AS queryUserLastName,
						   user.Class AS queryUserClass, user.E_Mail_Address AS queryUserEMail')
         		 ->from('course')
	 			 ->where('course.No = '.$courseNo)
				 ->where('course.Accepted', $pAccepted)
         		 ->join('user', 'user.No = course.Instructor_No');
		$query = $this->db->get();
  		return $query->row_array();
	}
	
	public function book_course($pCourseNo, $pUserID)
	{
		$data = array(
	    	'Course_No' => $pCourseNo,
			'User_No' => $pUserID,
		);
		
		$this->db->select('Maximum_Participants');
		$this->db->from('course');
		$this->db->where('No', $pCourseNo);
		$this->db->where('Accepted', 1);
		$query = $this->db->get();
		if ($this->db->count_all_results() == 0)
		{	
			return false;
			exit;
		} 
		else {
			$course = $query->row_array('Maximum_Participants');
		}
		
		$this->db->select('*');
		$this->db->from('course_entry');
		$this->db->where('Course_No', $pCourseNo);
		$this->db->where('User_No', $pUserID);
		if ($this->db->count_all_results() > 0)
		{
			return false;
			exit;
		}
		
		$this->db->select('*');
		$this->db->from('course_entry');
		$this->db->where('Course_No', $pCourseNo);
		if ((int)$this->db->count_all_results() >= (int)$course['Maximum_Participants'])
		{
			return false;
			exit;
		}
		$this->db->insert('course_entry', $data);
		return true;			
	}
	
	public function createNewCourse($pSubject, $pName, $pDateFrom, $pDateTo, $pCost, $pMaximum_Participants, $pDescription)
	{
		$courseData = array(
			'Subject' => $pSubject,
			'Name' => $pName,
			'Instructor_No' => $this->session->userdata('userNo'),
			'Date_From' => $pDateFrom,
			'Date_To' => $pDateTo,
			'Cost' => $pCost,
			'Maximum_Participants' => $pMaximum_Participants,
			'Description' => $pDescription			
		);
		
		return $this->db->insert('course', $courseData);
	}

	public function get_subjects()
	{ 
	    $query = $this->db->get('subject'); 
	    foreach($query->result_array() as $row){
	        $return[$row['Code']] = $row['Code'];
	    }
	    return $return;
	}
	
	public function get_new_courses()
	{
		$this->db->select('course.No AS queryCourseNo, course.Subject AS queryCourseSubject,
						   course.Name AS queryCourseName,
						   course.Date_From AS queryCourseDateFrom, course.Date_To AS queryCourseDateTo, 
						   user.First_Name AS queryUserFirstName, user.Last_Name AS queryUserLastName,
						   user.Class AS queryUserClass');
     	$this->db->from('course');
	 	$this->db->where('course.Accepted', 0);
	 	$this->db->join('user', 'user.No = course.Instructor_No');
		$query = $this->db->get();
  		return $query->result_array();
	}

	public function accept_course($pCourseNo)
	{
		$data = array(
               'Accepted' => 1);
   		$this->db->where('No', (int)$pCourseNo);	
		$this->db->update('course', $data); 
	}
	
	function dismiss_course($pCourseNo)
	{
		$this->db->where('No', $pCourseNo);
		$this->db->where('Accepted', 0);
		$this->db->delete('course');
	}
	
	function get_course_entries($pUserNo)
	{
		$this->db->select
		('
			course.No AS queryCourseNo, course.Subject AS queryCourseSubject,
		    course.Name AS queryCourseName, course.Cost AS queryCourseCost,
		    course.Date_From AS queryCourseDateFrom, course.Date_To AS queryCourseDateTo,
		');
		$this->db->from('course_entry');
		$this->db->join('course', 'course.No = course_entry.Course_No');
		$this->db->where('User_No', $pUserNo);
		
		$query = $this->db->get();
		return $query->result_array();
	}

	function count_course_entries($pCourseNo)
	{
		$this->db->where('Course_No', $pCourseNo);
		$this->db->from('course_entry');
		return $this->db->count_all_results();
	}
	
	function get_participants($pCourseNo)
	{
		$this->db->where('Course_No', $pCourseNo);
		$this->db->from('course_entry');
		$query = $this->db->get();
		return $query->result_array();
	}
}

?>
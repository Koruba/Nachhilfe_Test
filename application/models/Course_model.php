<?php
class Course_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		$this->load->library('session');
	}
	
	public function get_courses()
	{	
		$query = $this->db->get('course');
		return $query->result_array();
	}
	
	public function get_course_detail($pCourseNo)
	{
		$courseNo = (int)$pCourseNo;			
		$this->db->select('course.No AS queryCourseNo, course.Subject AS queryCourseSubject,
						   course.Name AS queryCourseName,
						   course.Date_From AS queryCourseDateFrom, course.Date_To AS queryCourseDateTo, 
						   user.First_Name AS queryUserFirstName, user.Last_Name AS queryUserLastName')
         		 ->from('course')
	 			 ->where('course.No = '.$courseNo)
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

		return $this->db->insert('course_entry', $data);
	}
	
	public function createNewCourse($pSubject, $pName, $pDateFrom, $pDateTo, $pCost, $pMaximum_Participants)
	{
		$courseData = array(
			'Subject' => $pSubject,
			'Name' => $pName,
			'Instructor_No' => 1,
			'Cost' => $pCost,
			'Maximum_Participants' => $pMaximum_Participants			
		);
		
		return $this->db->insert('course', $courseData);
	}

	public function get_subjects()
	{
	    //$return[''] = 'please select';
	    //$this->db->order_by('c_e_name', 'asc'); 
	    $query = $this->db->get('subject'); 
	    foreach($query->result_array() as $row){
	        $return[$row['Code']] = $row['Code'];
	    }
	    return $return;
	}
}
?>
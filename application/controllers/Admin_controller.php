<?php
class Admin_controller extends CI_Controller {

        public function __construct()
        {
			//error_reporting(0);	
			parent::__construct();
			
			$this->load->model('user_model');
			$this->load->model('Course_model');
									
	        $this->load->helper('url');			
			$this->load->helper('wizard_helper');
			$this->load->helper('form');
			
			$this->load->library('user_agent');			
			$this->load->library('template');
			$this->load->library('session');
			
			if ($this->session->userdata('admin') == FALSE)
			{
				header('Location: '.base_url());
				exit;
			}
			
			$this->template->add_css('./views/style.css');
			
			$this->template->write_view('navigation', 'templates/navigation_template_user.php');
			$this->template->write_view('footer', 'templates/footer_template');
        }
		
		public function registrations()
		{
			$data['newUsersList'] = $this->user_model->get_new_Users();
			$data['newCourseList'] = $this->Course_model->get_new_courses();
			$this->template->write_view('content','admin/admin_start_view', $data);	
			$this->template->render();
		}
		
		public function acceptuser($pUserNo)
		{
			$data['UserNo'] = $pUserNo;
			$data['User_Data'] = $this->user_model->get_user_data($pUserNo);	
			
			$this->template->write_view('content','admin/accept_user_view', $data);	
			$this->template->render();
		}
		
		function accepteduser($pUserNo)
		{
			$this->load->library('form_validation');	
				
			$this->form_validation->set_rules('UserNo', 'ERROR', 'required');
			
			if ($this->form_validation->run() == TRUE)
			{		
				$this->user_model->accept_user($pUserNo);
				$data['type'] = "Schüler";
				$this->template->write_view('content', 'admin/accept_successful_view', $data);
				$this->template->render();
			}
			else {
				echo "Fehler";
			}
		}
		
		function acceptcourse($pCourseNo)
		{
			$data['Course_Data'] = $this->Course_model->get_course_detail($pCourseNo, 0);
			$this->template->write_view('content','admin/accept_course_view', $data);	
			$this->template->render();
		}

		function acceptedcourse($pCourseNo)
		{
			$this->load->library('form_validation');	
				
			$this->form_validation->set_rules('CourseNo', 'ERROR', 'required');
			
			if ($this->form_validation->run() == TRUE)
			{		
				$this->Course_model->accept_course($pCourseNo);
				$data['type'] = "Kurs";
				$this->template->write_view('content', 'admin/accept_successful_view', $data);
				$this->template->render();
			}
			else {
				echo "Fehler";
			}
		}
		
		function dismisscourse($pCourseNo)
		{
			$data['Course_Data'] = $this->Course_model->get_course_detail($pCourseNo, 0);
			$this->template->write_view('content', 'admin/dismiss_course_view', $data);
			$this->template->render();
		}
		
		function dismissedcourse($pCourseNo)
		{
			$this->load->library('form_validation');	
				
			$this->form_validation->set_rules('CourseNo', 'ERROR', 'required');
			
			if ($this->form_validation->run() == TRUE)
			{		
				$this->Course_model->dismiss_course($pCourseNo);
				$data['type'] = "Kurs";
				$this->template->write_view('content', 'admin/dismiss_successful_view', $data);
				$this->template->render();
			}
			else {
				echo "Fehler";
			}
		}
		
		function dismissuser($pUserNo)
		{
			$data['UserNo'] = $pUserNo;
			$data['User_Data'] = $this->user_model->get_user_data($pUserNo);	
			
			$this->template->write_view('content','admin/dismiss_user_view', $data);	
			$this->template->render();
		}
		
		function dismisseduser($pUserNo)
		{
			$this->load->library('form_validation');	
				
			$this->form_validation->set_rules('UserNo', 'ERROR', 'required');
			
			if ($this->form_validation->run() == TRUE)
			{		
				$this->user_model->dismiss_user($pUserNo);
				$data['type'] = "Schüler";
				$this->template->write_view('content', 'admin/dismiss_successful_view', $data);
				$this->template->render();
			}
			else {
				echo "Fehler";
			}
		}
}
?>
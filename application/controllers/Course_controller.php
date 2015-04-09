<?php
class Course_controller extends CI_Controller {

        public function __construct()
        {
			error_reporting(0);	
			parent::__construct();
			$this->load->model('Course_model');
									
	        $this->load->helper('url');			
			$this->load->helper('wizard_helper');
			
			$this->load->library('user_agent');			
			$this->load->library('template');
			
			$this->template->add_css('./views/style.css');
			//$this->template->add_css('public/css/jquery-ui-1.10.3.custom.min.css');
			
			//$this->template->add_js('public/js/jquery-1.11.1.min.js');
			//$this->template->add_js('public/js/jquery-ui-1.10.3.custom.min.js');
			
			$this->template->write_view('navigation', 'navigation.php');
			$this->template->write_view('footer', 'footer');
        }
		
		public function overview()
		{				
			$data['course_list'] = $this->Course_model->get_courses();	
			$this->template->write_view('content','course_list', $data);	
			$this->template->render();
		}
		
		public function course($pCourseNo)
		{
			$data['course_detail'] = $this->Course_model->get_course_detail($pCourseNo);
			$this->template->write_view('content','course_details', $data);	
			$this->template->render();
		}
		
		public function confirmation($pCourseNo)
		{
			$data['course_detail'] = $this->Course_model->get_course_detail($pCourseNo);
			$this->template->write_view('content','booking_confirmation', $data);	
			$this->template->render();
		}
		
		private function book_course($pCourseNo)
		{
			$this->Course_model->book_course($pCourseNo, 2);
		}
		
		public function confirmed($pCourseNo)
		{
			$this->book_course($pCourseNo);				
			$this->template->write_view('content','booking_confirmed', $data);	
			$this->template->render();
		}
}

?>
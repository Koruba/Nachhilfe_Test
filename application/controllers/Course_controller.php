<?php
class Course_controller extends CI_Controller {

        public function __construct()
        {
			//error_reporting(0);	
			parent::__construct();
			$this->load->model('Course_model');
									
	        $this->load->helper('url');			
			$this->load->helper('wizard_helper');
			$this->load->helper('form');
			
			$this->load->library('user_agent');			
			$this->load->library('template');
			$this->load->library('session');
			
			$this->template->add_css('./views/style.css');
			//$this->template->add_css('public/css/jquery-ui-1.10.3.custom.min.css');
			
			//$this->template->add_js('public/js/jquery-1.11.1.min.js');
			//$this->template->add_js('public/js/jquery-ui-1.10.3.custom.min.js');
			
			$this->template->write_view('navigation', 'templates/navigation_template.php');
			$this->template->write_view('footer', 'templates/footer_template');
        }
		
		public function overview()
		{				
			$data['course_list'] = $this->Course_model->get_courses();	
			$this->template->write_view('content','course/course_list_view', $data);	
			$this->template->render();
		}
		
		public function detail($pCourseNo)
		{
			$data['course_detail'] = $this->Course_model->get_course_detail($pCourseNo);
			$this->template->write_view('content','course/course_details_view', $data);	
			$this->template->render();
		}
		
		public function confirmation($pCourseNo)
		{
			$data['course_detail'] = $this->Course_model->get_course_detail($pCourseNo);
			$this->template->write_view('content','course/booking_confirmation_view', $data);	
			$this->template->render();
		}
		
		public function confirmed($pCourseNo)
		{
			if($this->Course_model->book_course($pCourseNo, 2) == FALSE)
			{
				$data['error'] = TRUE;	
				$data['error_message'] = 'Sie haben diesen Kurs bereits gebucht.';
				$this->template->write_view('content','course/booking_confirmed_view', $data);	
				$this->template->render();
			}
			else{
				$data['error'] = FALSE;
				$data['error_message'] = '';
				$this->template->write_view('content','course/booking_confirmed_view', $data);	
				$this->template->render();
			}				

		}
		
		public function create()
		{
			if ($this->session->userdata('login') == TRUE)
			{
				$data['subject_list'] = $this->Course_model->get_subjects();	
				$this->template->write_view('content','course/create_course_view', $data);	
				$this->template->render();
			}
			else {
				//$this->overview();		
			}
		}
		
		public function createNewCourse()
		{
			$this->load->library('form_validation');
		
			$this->form_validation->set_rules('subject', 'Fach', 'trim|required|alpha');
			$this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[50]');
			//$this->form_validation->set_rules('date_from', 'Datum Von', 'trim|required|date');
			//$this->form_validation->set_rules('date_to', 'Datum Bis', 'trim|required|date');
			$this->form_validation->set_rules('cost', 'Kosten', 'trim|required|numeric');
			$this->form_validation->set_rules('maximum_participants', 'Maximale Teilnehmerzahle', 'trim|required|numeric');
			$this->form_validation->set_rules('description', 'Beschreibung', 'required|min_length[10]|max_length[600]');
			
			
			if ($this->form_validation->run() == FALSE)
			{
				$data['subject_list'] = $this->Course_model->get_subjects();
				$this->template->write_view('content', 'course/create_course_view', $data);
				$this->template->render();				
			}
			else {
				$subject = $this->input->post('subject');
				$name = $this->input->post('name');			
				$date_from = $this->input->post('date_from');
				$date_to = $this->input->post('date_to');
				$cost = $this->input->post('cost');
				$maximum_participants = $this->input->post('maximum_participants');
				$description = $this->input->post('description');
				
				$this->Course_model->createNewCourse($subject, $name, $date_from, $date_to, $cost, $maximum_participants, $description);
				$this->overview();
			}
		}
}

?>
<?php
class Admin_controller extends CI_Controller {

        public function __construct()
        {
			//error_reporting(0);	
			parent::__construct();
			
			$this->load->model('user_model');
									
	        $this->load->helper('url');			
			$this->load->helper('wizard_helper');
			$this->load->helper('form');
			
			$this->load->library('user_agent');			
			$this->load->library('template');
			$this->load->library('session');
			
			if ($this->session->userdata('admin') == FALSE)
			{
				header('Location: '.base_url().'/index.php/course');
				exit;
			}
			
			$this->template->add_css('./views/style.css');
			
			$this->template->write_view('navigation', 'templates/navigation_template.php');
			$this->template->write_view('footer', 'templates/footer_template');
        }
		
		public function registrations()
		{
			$data['newUsersList'] = $this->user_model->get_new_Users();
			
			$this->template->write_view('content','admin/admin_start_view', $data);	
			$this->template->render();
		}
		
		public function accept($pUserNo)
		{
			$data['UserNo'] = $pUserNo;
			$data['User_Data'] = $this->user_model->get_user_data($pUserNo);	
			
			$this->template->write_view('content','admin/accept_user_view', $data);	
			$this->template->render();
		}
		
		function accepted($pUserNo)
		{
			$this->load->library('form_validation');	
				
			$this->form_validation->set_rules('UserNo', 'ERROR', 'required');
			
			if ($this->form_validation->run() == TRUE)
			{		
				$this->user_model->accept_user($pUserNo);
				$this->template->write_view('content', 'admin/accept_successful_view');
				$this->template->render();
			}
			else {
				echo "Fehler";
			}
		} 
}
?>
<?php
class User extends CI_Controller{
	
	public function __construct()
	{
		parent::__construct();
		
		$this->view_data['base_url'] = base_url();
		
		$this->load->model('User_model');
		
		$this->load->library('template');
		$this->load->library('session');
		
		$this->template->write_view('navigation', 'templates/navigation_template.php');
		$this->template->write_view('footer', 'templates/footer_template');
	}
	
	function index()
	{
		$this->register();
	}
	
	function register()
	{
		//$this->load->view('view_register', $this->view_data);
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('email', 'E-Mail', 'trim|required|valid_email|is_unique[user.E_Mail_Address]');
		$this->form_validation->set_rules('firstname', 'Vorname', 'trim|required|alpha|max_length[20]');
		$this->form_validation->set_rules('lastname', 'Nachname', 'trim|required|alpha|max_length[20]');
		$this->form_validation->set_rules('password', 'Passwort', 'trim|required|alpha_numeric|max_length[50]');
		$this->form_validation->set_rules('confirmpassword', 'Passwort bestätigen', 'trim|required|alpha_numeric|max_length[50]|matches[password]');
		
		
		if ($this->form_validation->run() == FALSE)
		{
			echo "Fehler aufgetreten";
		 //	Es gibt Fehler bei der Validierung, wurde nicht gestartet.
			//$this->load->view('view_register', $this->view_data);
			$this->template->write_view('content','view_register');
			$this->template->render();			
		} 
		else
		{
			// Alles ist in Ordnung, schreibe Daten in die Datenbank
			$email = $this->input->post('email');
			$firstname = $this->input->post('firstname');			
			$lastname = $this->input->post('lastname');
			$class = $this->input->post('class');
			$password = $this->input->post('password');
			
			$this->User_model->register_user($email, $firstname, $lastname, $class, $password);
			$this->load->view('test');
			
		}		
	}
	
	function login()
	{
		$this->setUserLogin();					
		$this->template->write_view('content','user/login_view');	
		$this->template->render();		
	}
	
	private function setUserLogin()
	{
		$loginData = array
			(
				'login' => TRUE,
				'userNo' => 2 
			);		
		$this->session->set_userdata($loginData);
	}

	function logout()
	{
		$this->session->sess_destroy();
		header('Location: http://localhost/Nachhilfe_Test/index.php/course');
	}
}

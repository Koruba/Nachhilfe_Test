<?php
class User_controller extends CI_Controller{
	
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
		
		$data['class_list'] = $this->User_model->get_classes();
		
		$this->form_validation->set_rules('email', 'E-Mail', 'trim|required|valid_email|is_unique[user.E_Mail_Address]');
		$this->form_validation->set_rules('firstname', 'Vorname', 'trim|required|alpha|max_length[20]');
		$this->form_validation->set_rules('lastname', 'Nachname', 'trim|required|alpha|max_length[20]');
		$this->form_validation->set_rules('password', 'Passwort', 'trim|required|alpha_numeric|max_length[50]');
		$this->form_validation->set_rules('confirmpassword', 'Passwort bestätigen', 'trim|required|alpha_numeric|max_length[50]|matches[password]');
		
		
		if ($this->form_validation->run() == FALSE)
		{
			//echo "Fehler aufgetreten";
		 //	Es gibt Fehler bei der Validierung, wurde nicht gestartet.
			//$this->load->view('view_register', $this->view_data);
			$this->template->write_view('content','user/register_view', $data);
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
			
			$data['email'] = $email;
			
			$this->User_model->register_user($email, $firstname, $lastname, $class, $password);
			$this->template->write_view('content', 'course/registration_success_view', $data);
			$this->template->render();
			
		}		
	}
	
	function login()
	{
		//$this->setUserLogin();					
		$this->template->write_view('content','user/login_view');	
		$this->template->render();	
	}
	
	function loginerror()
	{
		$data['error'] = "Die eingegebene E-Mail oder das Passwort ist falsch.";	
		$this->template->write_view('content','user/login_view', $data);	
		$this->template->render();	
	}
	
	function accountNotAccepted()
	{
		$data['error'] = "Der Account wurde noch nicht freigeschaltet.";	
		$this->template->write_view('content','user/login_view', $data);	
		$this->template->render();
	}
	
	function setUserLogin()
	{
		 $email = $this->input->post('E_Mail_Address');
		 $password = $this->input->post('Password');
		 $this->check_login_input($email, $password); 
	}
	
	function logout()
	{
		$this->session->sess_destroy();
		header('Location: '.base_url().'index.php/course');
	}
	
	function check_login_input($pEmail, $pPassword)
	{
		$result = $this->User_model->login($pEmail, $pPassword);
	   
		if($result)
		{
			if ($result['Permission'] == '') 
			{
				header('Location: '.base_url().'/index.php/user/accountNotAccepted');
				exit;
			}
			if ($result['Permission'] == 'Normal') {
				$admin = FALSE;
			}
			else {
				$admin = TRUE;
			}
			
			$userNo = $result['No'];
			
			$loginData = array
			(
				'login' => TRUE,
				'userNo' => $userNo,
				'admin' => $admin 
			);		
			$this->session->set_userdata($loginData);	
			header('Location: '.base_url().'index.php/course');
		}
		else
		{
			header('Location: '.base_url().'/index.php/user/loginerror');
		}
	 }
}

<?php
class User_controller extends CI_Controller{
	
	public function __construct()
	{
		parent::__construct();
		
		$this->view_data['base_url'] = base_url();
		
		$this->load->model('User_model');
		
		$this->load->library('template');
		$this->load->library('session');
		
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
			$this->template->write_view('navigation', 'templates/navigation_template_register.php');
			$this->template->write_view('content','user/register_view', $data);
			$this->template->render();			
		} 
		else
		{
			$email = $this->input->post('email');
			$firstname = $this->input->post('firstname');			
			$lastname = $this->input->post('lastname');
			$class = $this->input->post('class');
			$password = $this->input->post('password');
			
			$data['email'] = $email;
			
			$this->User_model->register_user($email, $firstname, $lastname, $class, $password);
			$this->template->write_view('navigation', 'templates/navigation_template_register.php');
			$this->template->write_view('content', 'user/registration_success_view', $data);
			$this->template->render();		
		}		
	}
	
	function login()
	{
		//$this->setUserLogin();
		$this->template->write_view('navigation', 'templates/navigation_template_login.php');					
		$this->template->write_view('content','user/login_view');	
		$this->template->render();	
	}
	
	function loginerror($pErrorCode)
	{
		if ($pErrorCode == 1)
		{		
			$data['error'] = "Die eingegebene E-Mail oder das Passwort ist falsch.";	
		}
		if ($pErrorCode == 2)
		{		
			$data['error'] = "Der Account wurde noch nicht freigeschaltet.";	
		}
		$this->template->write_view('navigation', 'templates/navigation_template_login.php');
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
				header('Location: '.base_url().'/index.php/user/loginerror/2');
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
			header('Location: '.base_url().'index.php/user/loginerror/1');
		}
	}
	
	function show_user_details()
	{
		$this->load->model('Course_model');	
		$data['Booked_Courses'] = $this->Course_model->get_course_entries($this->session->userdata('userNo'));
		$data['User_Courses'] = $this->Course_model->get_courses_by_user();
		foreach ($data['User_Courses'] as $User_Course): 
			$data['Entry_Count'][$User_Course['No']] = $this->Course_model->count_course_entries($User_Course['No']);
		endforeach;
		$data['Course_Entries'] = '';
		$this->template->write_view('navigation', 'templates/navigation_template_user.php');					
		$this->template->write_view('content','user/user_details_view', $data);
		$this->template->render();
	}
	   
}

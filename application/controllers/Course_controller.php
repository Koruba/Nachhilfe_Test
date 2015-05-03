<?php
class Course_controller extends CI_Controller {

    public function __construct()
    {
		//error_reporting(0);	
		parent::__construct();
		$this->load->model('Course_model');
		
		ob_start();
								
        $this->load->helper('url');			
		$this->load->helper('wizard_helper');
		$this->load->helper('form');
		
		$this->load->library('user_agent');			
		$this->load->library('template');
		$this->load->library('session');
		$this->load->library("Pdf");
		
		$this->template->add_css('./views/style.css');
		//$this->template->add_css('public/css/jquery-ui-1.10.3.custom.min.css');
		
		//$this->template->add_js('public/js/jquery-1.11.1.min.js');
		//$this->template->add_js('public/js/jquery-ui-1.10.3.custom.min.js');
		
		$this->template->write_view('navigation', 'templates/navigation_template_start.php');
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
		$data['Entry_Count'] = $this->Course_model->count_course_entries($pCourseNo);
		$data['course_detail'] = $this->Course_model->get_course_detail($pCourseNo);
		if (!isset($data['course_detail']))
		{
			show_404();
		}
		$this->template->write_view('content','course/course_details_view', $data);	
		$this->template->render();
	}

	public function preview($pCourseNo)
	{
		$data['Entry_Count'] = $this->Course_model->count_course_entries($pCourseNo);
		$data['course_detail'] = $this->Course_model->get_course_detail($pCourseNo, 0);
		if (!isset($data['course_detail']))
		{
			show_404();
		}
		$this->template->write_view('content','course/course_details_view', $data);	
		$this->template->render();
	}
	
	public function confirmation($pCourseNo)
	{
		if (!$this->check_login_status())
		{
			header('Location: '.base_url());
		}	
		$data['course_detail'] = $this->Course_model->get_course_detail($pCourseNo);
		if (isset($data['course_detail']))
		{
			$this->template->write_view('content','course/booking_confirmation_view', $data);	
			$this->template->render();
		}
		else {
			show_404();
		}
	}
	
	public function confirmed($pCourseNo)
	{
		$CalledByView = $this->input->post('booking_confirmation');
		if ($CalledByView == 'confirmation')
		{	
			if($this->Course_model->book_course($pCourseNo, $this->session->userdata('userNo')) == FALSE)
			{
				$data['error'] = TRUE;	
				$data['error_message'] = 'Entweder haben sie diesen Kurs bereits gebucht, oder es sind keine Plätze mehr frei.';
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
		else
		{
			show_404();
		}
	}
	
	public function create()
	{
		if ($this->check_login_status())
		{
			$data['subject_list'] = $this->Course_model->get_subjects();
			$this->template->write_view('content','course/create_course_view', $data);	
			$this->template->render();
		}
		else {
			header('Location: '.base_url());		
		}
	}
	
	public function createNewCourse()
	{
		if (!$this->check_login_status())
		{
			header('Location: '.base_url());
		}
			
		$this->load->library('form_validation');
	
		$this->form_validation->set_rules('subject', 'Fach', 'trim|required|alpha');
		$this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[40]');
		//$this->form_validation->set_rules('date_from', 'Datum Von', 'trim|required|date');
		//$this->form_validation->set_rules('date_to', 'Datum Bis', 'trim|required|date');
		$this->form_validation->set_rules('cost', 'Kosten', 'trim|required|numeric');
		$this->form_validation->set_rules('maximum_participants', 'Maximale Teilnehmerzahl', 'trim|required|numeric');
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
			
			$this->Course_model->createNewCourse($subject, $name, date($date_from), date($date_to), $cost, $maximum_participants, $description);
			header('Location: '.base_url().'index.php/course/creation_successful');
		}
	}

	function course_creation_successful()
	{
		$this->template->write_view('content', 'course/course_creation_success_view');
		$this->template->render();
	}

	function check_login_status()
	{
		if ($this->session->userdata('login') != TRUE)
		{
			return false;
		}
		else {
			return true;
		}
	}

	function format_date($pDate)
	{
		$year = substr($pDate,0,4);
		$month = substr($pDate,5,2);
		$day = substr($pDate,8,2);
		$dateFormat = $day.'.'.$month.'.'.$year;
		return $dateFormat;
	}
<<<<<<< HEAD

	public function create_pdf() {
 
    // create new PDF document
    error_reporting(0);
	ob_start();
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);    
 
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Nicola Asuni');
    $pdf->SetTitle('TCPDF Example 001');
    $pdf->SetSubject('TCPDF Tutorial');
    $pdf->SetKeywords('TCPDF, PDF, example, test, guide');   
 
    // set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
    $pdf->setFooterData(array(0,64,0), array(0,64,128)); 
 
    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
 
    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 
 
    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);    
 
    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM); 
 
    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);  
 
    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        require_once(dirname(__FILE__).'/lang/eng.php');
        $pdf->setLanguageArray($l);
    }   
 
    // ---------------------------------------------------------    
 
    // set default font subsetting mode
    $pdf->setFontSubsetting(true);   
 
    // Set font
    // dejavusans is a UTF-8 Unicode font, if you only need to
    // print standard ASCII chars, you can use core fonts like
    // helvetica or times to reduce file size.
    $pdf->SetFont('dejavusans', '', 14, '', true);   
 
    // Add a page
    // This method has several options, check the source code documentation for more information.
    $pdf->AddPage(); 
 
    // set text shadow effect
    $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
 
    // Set some content to print
    /*
    $html = <<<EOD
    <h1>Welcome to <a href="http://www.tcpdf.org" style="text-decoration:none;background-color:#CC0000;color:black;">&nbsp;<span style="color:black;">TC</span><span style="color:white;">PDF</span>&nbsp;</a>!</h1>
    <i>This is the first example of TCPDF library.</i>
    <p>This text is printed using the <i>writeHTMLCell()</i> method but you can also use: <i>Multicell(), writeHTML(), Write(), Cell() and Text()</i>.</p>
    <p>Please check the source code documentation and other examples for further information.</p>
    <p style="color:#CC0000;">TO IMPROVE AND EXPAND TCPDF I NEED YOUR SUPPORT, PLEASE <a href="http://sourceforge.net/donate/index.php?group_id=128076">MAKE A DONATION!</a></p>
EOD;
	 * * 
	 */
	$data['Entry_Count'] = $this->Course_model->count_course_entries('4');
	$data['course_detail'] = $this->Course_model->get_course_detail('4');
	 $html1 = $this->load->view('course/course_details_view', $data);
	 $html = $html1;
    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
 
    // ---------------------------------------------------------    
 
    // Close and output PDF document
    // This method has several options, check the source code documentation for more information.
    $pdf->Output('example_001.pdf', 'I');    
 
    //============================================================+
    // END OF FILE
    //============================================================+
    }
=======
	
	function participant_list($pCourseNo)
	{
		$this->load->model('User_model');	
		$data['Course_Info'] = $this->Course_model->get_course_detail($pCourseNo);
		if ($data['Course_Info']['queryUserInstructorNo'] != $this->session->userdata('userNo'))
		{
			show_404();
			exit;
		}
		$data['Course_Entry'] = $this->Course_model->get_participants($pCourseNo);
		foreach ($data['Course_Entry'] as $course_entry):
			$data['Participant_Info'][$course_entry['User_No']] = $this->User_model->get_user_data($course_entry['User_No']);	
		endforeach;					
		$this->template->write_view('content','course/participant_list_view', $data);
		$this->template->render();
	}
>>>>>>> origin/master
}
 
/* End of file c_test.php */
/* Location: ./application/controllers/c_test.php */

?>


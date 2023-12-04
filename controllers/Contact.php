<?php
class Contact extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('User');
		$this->load->model('Commonmodel');
		$this->load->helper('content_page');
		$this->session->unset_userdata('whsale_section');
	}

	function index(){
		$data = $this->getCommonData();
		$row_content = $this->Commonmodel->getCompanyInfoRow();

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$this->form_validation->set_rules('cont_fname', 'First Name', 'required');
		$this->form_validation->set_rules('cont_lname', 'Last Name', 'required');
		$this->form_validation->set_rules('cont_email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('cont_desc', 'Description', 'required');
		$this->form_validation->set_rules('cont_pno', 'Phone Number', 'required');

		$error_message = ( ($this->form_validation->run() == FALSE) ? 'error' : 'sent' );
		$cont_fname = $this->input->post('cont_fname', TRUE);
		$cont_lname = $this->input->post('cont_lname', TRUE);
		$fullName = $cont_fname.' '.$cont_lname;

		$cont_email = $this->input->post('cont_email', TRUE);
		$cont_pno   = $this->input->post('cont_pno', TRUE);
		$cont_hear  = $this->input->post('cont_hear', TRUE);
		$cont_desc  = $this->input->post('cont_desc', TRUE);
		$data['error_message'] = '';

		$data['msg_notify'] = 0;
		$data['msg'] 		= '';

		if(isset($cont_fname)) {
			$data['error_message'] = $error_message;
			$tomail = SITE_EMAIL;
			$subject = "Contact Us Inquiry";
			$message = '<html>
				<head>
					<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
					<title></title>
				</head>
				<body>
					<table width="100%" border="0" cellspacing="2" cellpadding="2">
						<tr>
							<td width="20%"><strong>Contact Name:</strong></td>
							<td width="80%">'.$fullName.'</td>
						</tr>
						<tr>
							<td><strong>Email :</strong></td>
							<td>'.$cont_email.'</td>
						</tr>
						<tr>
							<td><strong>Phone No.</strong></td>
							<td>'.$cont_pno.'</td>
						</tr>
						<tr>
							<td><strong>Hear From:</strong></td>
							<td>'.$cont_hear.'</td>
						</tr>
						<tr>
							<td><strong>Description:</strong></td>
							<td>'.$cont_desc.'</td>
						</tr>
					</table>
				</body>
			</html>';

			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

			// More headers
			$headers .= 'From: <'.$cont_email.'>' . "\r\n";

			mail(SITE_EMAIL,$subject,$message,$headers);
			$data['msg'] 				= 'Successfully Send Your Request.';
			$data['msg_notify'] 		= 1;
		}
		$fileName = $this->config->item('template').'contact_us';

		$link_last_seg           = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$link_array_last_seg     = explode('/',$link_last_seg);
		$page_last_seg           = end($link_array_last_seg);
		$page_last_seg           = ucwords(str_replace('-',' ',$page_last_seg));

		$data['title']  = 'Contact Us';
		$output = $this->load->view('contact' , $data , true);
		$this->output($output, $data);	
	}

    private function getCommonData($banner=''){
		$data = array();
		$data = $this->Commonmodel->getPageCommonData();
		return $data;
    }

	function output($layout = null , $data = array() ,$left='', $isleft = true , $isright = true){
		$data['loginlink'] = $this->User->loginhtml();
		$output = $this->load->view($this->config->item('template').'header' , $data , true);

		$output .= $layout;
		if($isright)$output .= $this->load->view($this->config->item('template').'right' , $data , true);
		$output .= $this->load->view($this->config->item('template').'footer', $data , true);
		$this->output->set_output($output);
	}
}
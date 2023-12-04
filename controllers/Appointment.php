<?php 
class Appointment extends CI_Controller {
	function __construct(){
		parent::__construct();
	}

	function output($layout = null , $data = array() , $isleft = true , $isright = true){
		$output = $this->load->view($this->config->item('template').'eduheader' , $data , true);
		$output .= $layout;
		$output .= $this->load->view($this->config->item('template').'edufooter', $data , true);
		$this->output->set_output($output);
	}

	function index(){
		$data['title'] = 'Diamond and Jewelry Virtual Appointment';
		$data['meta_tags'] = '<meta name="title" content="Diamond and Jewelry Virtual Appointment">
		<meta name="ROBOTS" content="INDEX,FOLLOW">
		<meta name="description" content="Diamond and Jewelry Virtual Appointment">
		<meta name="abstract" content="Diamond and Jewelry Virtual Appointment">
		<meta name="keywords" content="Diamond and Jewelry Virtual Appointment">
		<meta name="author" content="'. get_site_contact_info('dashboard_title') .'">
		<meta name="publisher" content="'. get_site_contact_info('dashboard_title') .'">
		<meta name="copyright" content="'. get_site_contact_info('dashboard_title') .'">
		<link rel="canonical" href="'. SITE_URL .'virtual-appointment" />';

		$output = $this->load->view('appointment/index', $data, true);
		$this->output($output , $data);
	}

}
?>
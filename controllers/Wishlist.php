<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Wishlist extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model ( 'wishlistmodel' );
		$this->load->helper('url');
		$phone_from_admin = get_site_contact_info('contact_info'); 
		define('CONTACT_NO', $phone_from_admin);
	}

	private function getCommonData($banner=''){
		$data = array();
		$data = $this->commonmodel->getPageCommonData();
		return $data;
	}

	function output($layout = null , $data = array() , $isleft = true , $isright = true){
		$data['loginlink'] = $this->user->loginhtml();
		$output = $this->load->view($this->config->item('template').'header' , $data , true);
		if($isleft)
		$output .= $this->load->view($this->config->item('template').'left' , $data , true);

		$output .= $layout;
		if($isright)
		$output .= $this->load->view($this->config->item('template').'right' , $data , true);

		$output .= $this->load->view($this->config->item('template').'footer', $data , true);
		$this->output->set_output($output);
	}

	function index(){
		if(!$this->session->isLoggedin()){
			redirect('/account/membersignin' , 'refresh');
		}
		$delete	=	$this->input->post('delete');
		if($delete != ""){
			$this->wishlistmodel->deletwishlistitembyid($delete);
			echo "true";die;
		}
		$data = $this->getCommonData(); 
		$data['title'] = 'Your Account';
		$offset	= $this->uri->segment(4);
		if(!$offset) $offset = 0;

		$wishlists = $this->wishlistmodel->countItemsByUserId();
		$this->load->library('pagination');
		$config['base_url'] = config_item('base_url').'wishlist/index/page/';
		$config['total_rows'] = $wishlists[0]['total'];
		$config['cur_page']	=	$offset;
		$config['per_page'] = 15;
		$config['full_tag_open'] = '<div id="pagination">';
		$config['full_tag_close'] = '</div>';
		$this->pagination->initialize($config);
		$data['wishlist'] = $this->wishlistmodel->getitemsbyuserid($offset,15);
		$output = $this->load->view('wishlist/index' , $data , true);	
		$this->output($output , $data,false);
    }

	function home(){
		$data['title'] = 'Wishlist';		
		$output = $this->load->view('wishlist/home' , $data , true);
		$this->output($output , $data,false);
	}
}
?>
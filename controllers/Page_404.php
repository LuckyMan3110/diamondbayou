<?php
class Page_404 extends CI_Controller {
    function __construct(){
            parent::__construct();
            $this->load->model('jewelrymodel');
            $this->load->model('diamondmodel');
            $this->load->model('engagementmodel');
            $this->load->model('qualitymodel');
            $this->load->helper('ringsection');
            $this->load->model('braceletmodel');
            $this->session->unset_userdata('whsale_section');
    }	
    function index(){
        $data = $this->getCommonData(); 
        
        $link_last_seg           = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $link_array_last_seg     = explode('/',$link_last_seg);
        $page_last_seg           = end($link_array_last_seg);
        $page_last_seg           = ucwords(str_replace('-',' ',$page_last_seg));
    
        $data['title']  = '404! '.$page_last_seg.' Page Not Found';
        $output = $this->load->view('page_404' , $data , true);
        $this->output($output, $data);	
    }
    private function getCommonData($banner='')
    {
            $this->load->model('commonmodel');
            $data = array();
            $data = $this->commonmodel->getPageCommonData();
            return $data;
    }
    
    function output($layout = null , $data = array() ,$left='', $isleft = true , $isright = true){
            $this->load->model('user');
            $data['loginlink'] = $this->user->loginhtml();
            $output = $this->load->view($this->config->item('template').'header' , $data , true);
      
            $output .= $layout;
            if($isright)$output .= $this->load->view($this->config->item('template').'right' , $data , true);
            $output .= $this->load->view($this->config->item('template').'footer', $data , true);
            $this->output->set_output($output);
    }
  
}
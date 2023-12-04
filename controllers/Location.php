<?php
class Location extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->helper('contentsection');
        $this->load->helper('ringsection');
        $this->load->helper('locationpage_address');
        $this->session->unset_userdata('whsale_section');
    }	

    function _remap($test='')
    {		
	$segment_1 = $this->uri->segment(1);

	switch ($segment_1) {
		case null:
		case false:
		case '':
			$this->index();
		break;

//		case 'about':
//			$this->about();
//		break;		
	
	default:
		//This is just an example to show 
		//the 404 page if the page doesn't exist
		$this->location_pages($test);
	break;
	}
    }	

    function index()
    {
        die('You are not allowed to access this page direclty!');
    }
        
    function location_pages($topic = 'aboutus') {
        $this->load->helper('content_page');

        $data = $this->getCommonData($topic);
        $row_content = $this->commonmodel->getCompanyInfoRow($topic);
        $data['content'] = check_empty($row_content['content'], 'Coming Soon');
        $data['content_title'] = check_empty($row_content['description'], 'Coming Soon');
        $data['title'] = $this->pageTitle( $row_content );
        $data['page_address'] = '';
        $data['analytic_code'] = $row_content['analytic_code'];
        $data['collection_cate_id'] = ''; // this variable is define in heartdiamond file
        
        if( $topic === 'los-angeles' ) {
            $data['page_address'] = getLocationPageAddress(); // location_page hlper
        }
        
        $data['page_left_menus'] = $this->setLocationPagesList();
        $meta_keywords    = check_empty($row_content['meta_keywords'], $data['title']);
        $meta_description = check_empty($row_content['meta_description'], $data['title']);

        $data['meta_tags'] = '<meta name="description" content="'.$meta_description.'">
                              <meta name="keywords" content="'.$meta_keywords.'">';

        $output = $this->load->view('erd/location_pages_view', $data, true); 		
        $this->output($output, $data);		
    }
    
    function pageTitle($row=array()) {
        if( !empty($row['head_title']) ) 
        {
            $title = $row['head_title'];
        } 
        elseif( !empty($row['description']) ) 
        {
            $title = $row['description'];
        } 
        else 
        {
            $title = getadmin_contact_info('sites_title');
        }
        return $title;
    }
    
    function setLocationPagesList() {
        $rows = $this->commonmodel->getLocationsList();
        
        $page_list = '<ul>';
        
        foreach( $rows as $row ) {
            $page_list .= '<li><a href="'.SITE_URL.'location/'.$row['topicid'].'">'.$row['description'].'</a></li>';
        }
        
        $page_list .= '</ul>';
        
        return $page_list;
    }
    
    private function getCommonData() {   
        $data = array();
        $data = $this->commonmodel->getPageCommonData();
        return $data;
    }
    
    function output($layout = null , $data = array() , $isleft = true , $isright = true) {
        $data['loginlink'] = $this->user->loginhtml();
        $output = $this->load->view($this->config->item('template').'header' , $data , true);
        if($isleft)$output .= $this->load->view($this->config->item('template').'left' , $data , true);
        $output .= $layout;
        $output .= $this->load->view($this->config->item('template').'footer', $data , true);
        $this->output->set_output($output);
    }
}
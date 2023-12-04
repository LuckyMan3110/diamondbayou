<?php
class Content_pages extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('ringsection');
		$this->load->model('Commonmodel');
		$this->load->model('User');
		$this->session->unset_userdata('whsale_section');
	}	

    function index(){
		redirect('/');
    }

    function make_content_page_return($getSlug){
        $where_page_slug				=  array('page_slug' => $getSlug);
		$data['content_main_page']	    =  $this->Commonmodel->getdata_any_table_where($where_page_slug, 'content_man_page');
		$content_main_page	            =  $data['content_main_page'];
        $data['content_data']           = $content_main_page[0]->content;
        $data['banner_subtitle']        = $content_main_page[0]->title;
        $data['title']                  = $content_main_page[0]->title;

        return $data;
    }

	function about_carolls(){
		$data                           = $this->getCommonData(); 
		$data                           = $this->make_content_page_return('about-carolls');
		$output = $this->load->view('content_pages' , $data , true);
		$this->output($output, $data);	
	}

    function jewelry(){
		$data                           = $this->getCommonData(); 
		$data                           = $this->make_content_page_return('jewelry');
		$output = $this->load->view('content_pages' , $data , true);
		$this->output($output, $data);	
    }

    function find_your_right_size(){
        $data                           = $this->getCommonData(); 
        $data                           = $this->make_content_page_return('find-your-right-size');
        $output = $this->load->view('content_pages' , $data , true);
        $this->output($output, $data);	
    }

    function custom_jewelry_design_for_customers(){
        $data                           = $this->getCommonData(); 
        $data                           = $this->make_content_page_return('custom-jewelry-design-for-customers');
        $output = $this->load->view('content_pages' , $data , true);
        $this->output($output, $data);	
    }

    function custom_jewelry_design_for_business(){
        $data                           = $this->getCommonData(); 
        $data                           = $this->make_content_page_return('custom-jewelry-design-for-business');
        $output = $this->load->view('content_pages' , $data , true);
        $this->output($output, $data);	
    }

    function watches(){
        $data                           = $this->getCommonData(); 
        $data                           = $this->make_content_page_return('watches');
        $output = $this->load->view('content_pages' , $data , true);
        $this->output($output, $data);	
    }
    // New Page ----------------
    function media_partners(){
        $data                           = $this->getCommonData(); 
        
        $data                           = $this->make_content_page_return('payment-billing');
        $output = $this->load->view('content_pages', $data, true);
        $this->output($output, $data);	
    }
    // New Page ----------------
    function giving_back(){
        $data                           = $this->getCommonData(); 
        $data                           = $this->make_content_page_return('giving-back');
        $output = $this->load->view('content_pages' , $data , true);
        $this->output($output, $data);	
    }
    // New Page ----------------
    function history(){
        $data                           = $this->getCommonData(); 
        $data                           = $this->make_content_page_return('history');
        $output = $this->load->view('content_pages' , $data , true);
        $this->output($output, $data);	
    }
    // New Page ----------------
    function contact_us(){
        $data                           = $this->getCommonData(); 
        $data                           = $this->make_content_page_return('contact-us');
        $output = $this->load->view('content_pages' , $data , true);
        $this->output($output, $data);	
    }
    // New Page ----------------
    function privacy_cookies(){
        $data                           = $this->getCommonData(); 
        $data                           = $this->make_content_page_return('privacy-cookies');
        $output = $this->load->view('content_pages' , $data , true);
        $this->output($output, $data);	
    }

    // New Page ----------------
    function terms_and_conditions(){
        $data                           = $this->getCommonData(); 
        $data                           = $this->make_content_page_return('terms-and-conditions');
        $output = $this->load->view('content_pages' , $data , true);
        $this->output($output, $data);	
    }
    // New Page ----------------
    function faqs(){
        $data                           = $this->getCommonData(); 
        $data                           = $this->make_content_page_return('faqs');
        $output = $this->load->view('content_pages' , $data , true);
        $this->output($output, $data);	
    }
    // New Page ----------------
    function shipping_services(){
        $data                           = $this->getCommonData(); 
        $data                           = $this->make_content_page_return('shipping-services');
        $output = $this->load->view('content_pages' , $data , true);
        $this->output($output, $data);	
    }
    // New Page ----------------
    function return_and_exchanges(){
        $data                           = $this->getCommonData(); 
        $data                           = $this->make_content_page_return('return-and-exchanges');
        $output = $this->load->view('content_pages' , $data , true);
        $this->output($output, $data);	
    }
    // New Page ----------------
    function association(){
        $data                           = $this->getCommonData(); 
        $data                           = $this->make_content_page_return('promotions');
        $output = $this->load->view('content_pages' , $data , true);
        $this->output($output, $data);	
    }
    // New Page ----------------
    function affiliations(){
        $data                           = $this->getCommonData(); 
        $data                           = $this->make_content_page_return('affiliations');
        $output = $this->load->view('content_pages' , $data , true);
        $this->output($output, $data);	
    }
    // New Page ----------------
    function blog(){
        $data                           = $this->getCommonData(); 
        $data                           = $this->make_content_page_return('blog');
        $output = $this->load->view('content_pages' , $data , true);
        $this->output($output, $data);	
    }
    // New Page ----------------
    function events(){
        $data                           = $this->getCommonData(); 
        $data                           = $this->make_content_page_return('events');
        $output = $this->load->view('content_pages' , $data , true);
        $this->output($output, $data);	
    }
    // New Page ----------------
    function services(){
        $data                           = $this->getCommonData(); 
        $data                           = $this->make_content_page_return('services');
        $output = $this->load->view('content_pages' , $data , true);
        $this->output($output, $data);	
    }
    // New Page ----------------
    function site_map(){
        $data                           = $this->getCommonData(); 
        $data                           = $this->make_content_page_return('site_map');
        $output = $this->load->view('content_site_map_pages' , $data , true);
        $this->output($output, $data);	
    }
    // New Page ----------------
    function china_giftware_and_crystal_design_and_customization(){
        $data                           = $this->getCommonData(); 
        $data                           = $this->make_content_page_return('china-giftware-and-crystal-design-and-customization');
        $output = $this->load->view('content_pages' , $data , true);
        $this->output($output, $data);	
    }
    // New Page ----------------
    function four_cs_of_gemstones_and_diamonds(){
        $data                           = $this->getCommonData(); 
        $data                           = $this->make_content_page_return('four-cs-of-gemstones-and-diamonds');
        $output = $this->load->view('content_pages' , $data , true);
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

	function output2($layout = null , $data = array() ,$left='', $isleft = true , $isright = true){
		$output = $this->load->view($this->config->item('template').'header' , $data , true);
		$output .= $layout;
		$output .= $this->load->view($this->config->item('template').'footer', $data , true);
		$this->output->set_output($output);
	}

	function diamondsandcheese(){
        $data	= $this->getCommonData(); 
        $output = $this->load->view('diamondsandcheese', $data, true);
        $this->output2($output, $data);	
    }

	function blackfriday(){
        $data	= $this->getCommonData(); 
        $output = $this->load->view('blackfriday', $data, true);
        $this->output2($output, $data);	
    }

	function thanksgivingspromotion(){
        $data	= $this->getCommonData(); 
        $output = $this->load->view('thanksgivingspromotion', $data, true);
        $this->output2($output, $data);	
    }

	function landingpage(){
        $data	= $this->getCommonData();
		$data['title']	= 'Holiday Gifts';
        $output = $this->load->view('landingpage' , $data , true);
        $this->output($output, $data);	
    }

}
<?php 
class Send_unique_to_ebay extends CI_Controller
{
    function __construct()
    {
    	parent::__construct();
            $this->load->model( 'senduniquemodel' );
            $this->load->helper('url');
    }
    
    function index() {
        die('You are not allowed to access this page directly!');
    }
    
    function sendUniqueRingToEbay(){
        $d_id = $this->input->post('center_stone_id');
        $ring_id = $this->input->post('unique_ring_id');
        $cate_id = $this->input->post('ring_cate_id');
        
        $ret = $this->senduniquemodel->sendUniqueRingToEbay($d_id, $_POST);
        $this->session->set_userdata('return_message', $ret);
        //print_ar($ret);
        
        header('Location:'.SITE_URL.'admin/view_unique_detail/'.$cate_id.'/'.$ring_id);
    }
}
<?php 
class Diamond_section extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('commonmodel');
        $this->load->model('jewelrymodel');
        $this->load->model('user');        
        $this->load->model('diamondmodel');
        
        $phone_from_admin = get_site_contact_info('contact_info'); 
        define('CONTACT_NO', $phone_from_admin);
    }
    
    function index() {
        die('You are not allowed to access this page directly');
    }
    
    function get_diamond_shape() {
        echo $shape = $this->session->userdata('shape');
        $shape_list = explode(".", $shape);
        if( is_array($shape_list) ) {
            foreach ( $shape_list as $sh ) {
                $shape_ar[] = view_shape_value($img, $sh);
            }
            $shape_name = implode(", ", $shape_ar);
        } else {
            $shape_name = $shape_list;
        }
        echo $shape_name . ' Shape Diamond';
    }
}
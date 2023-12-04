<?php
class Rolexrings extends CI_Controller {
    function __construct(){
            parent::__construct();
            $this->load->model('jewelrymodel');
            $this->load->model('diamondmodel');
            $this->load->model('engagementmodel');
            $this->load->model('qualitymodel');
            $this->load->helper('ringsection');
            $this->load->model('rolexmodel_new');
            $this->session->unset_userdata('whsale_section');
            
            $phone_from_admin = get_site_contact_info('contact_info'); 
        define('CONTACT_NO', $phone_from_admin);
    }	
    function index()
    {
        die('You are not allowed to access this page!');
    }
    private function getCommonData($banner='')
    {
            $this->load->model('commonmodel');
            $data = array();
            $data = $this->commonmodel->getPageCommonData();
            return $data;
    }
    
    ///// category listings
    function rolex_rings_listing($cates_id = 0) {
        $data = $this->getCommonData(); 
		
        $data['title'] = 'Engagement Rings';
        $rolex_list = $this->rolexmodel_new->getRolexProductsList( $cates_id );
        $data['rolex_product_listing'] = $this->getRolexProductListing( $rolex_list );
        
        $this->detail_output('rolex_watches/rolex_rings_listing_view' , $data);
    }
    
    ///// category listings
    function rolex_watch_detail($watch_id = 0) {
        $data = $this->getCommonData(); 
		
        $data['results'] = $this->rolexmodel_new->getRolexWatchDetail( $watch_id );
        $data['watch_attribute'] = $this->watchAttriubteList( $data['results']['attributes'] );
        $data['title'] = $data['results']['title'];
        $this->detail_output('rolex_watches/rolex_watch_detail_page' , $data);
        
    }
    
    //// watch attriubte list
    function watchAttriubteList($attribute=  array()) {
        $attri_bute = explode(',', $attribute);
        
        $attr_list = '';
        if( count($attri_bute) > 0 ) {
            foreach($attri_bute as $attr) {
                $attr_list .= '<li class="attsUnnamedValue">'.$attr.'</li>';
            }            
        }
        
        return $attr_list;
    }
    //// get rolex product listing
    function getRolexProductListing($results=array()) {
        $prodList = '';
        $i = 1;
        
        if( count($results) > 0 ) {
            foreach ( $results as $rows ) {
                
                $detail_link = SITE_URL.'rolexrings/rolex_watch_detail/'.$rows['id'];
                $imageLink = SITE_URL . 'stuller/rolex/images_rolex/' . $rows['large_image'];
                $in_stock = ( $rows['in_stock'] == 'Yes' ? 'In Stock' : '2-3 weeks delivery' );
                $last_class = ( $i % 4 == 0 ? 'last' : '' );
                
            $prodList .= '<li class="product_item item col6 '.$last_class.'" data-style="'.$rows['style'].'" data-sku="'.$rows['id'].'" data-index="'.$i.'">
                            <div class="product_item_info">
                            <a href="'.$detail_link.'" class="product_image" data-style="'.$rows['style'].'" hidefocus="true">
                                    <span class="product_border">
                                            <img width="198" height="198" src="'.$imageLink.'" title="'.$rows['title'].'" alt="'.$rows['title'].'">
                            <span class="compare_item_active " data-icon="?" aria-hidden="true"></span>
                        </span>                
                        <span class="productDescription">'.$rows['title'].'</span> 
                            </a>                                
                </div>
                <p class="productPrice">SSP: $ '.$rows['price'].'  <b>?</b> '.$rows['style'].'</p> 
                        <p class="productStock red">'.$in_stock.'</p>
                </li>';
            
            $i++;
            
            }
        }
        
        return $prodList;
    }
    
    ///// stuller detail page viiew
    function detail_output($file_path='', $data_array=array()) {
        //$this->load->view('stuller_rings_views/stuller_detail_header' , $data_array);
        $this->load->view('erd/header' , $data_array);
        $this->load->view($file_path , $data_array);
        $this->load->view('erd/footer' , $data_array);
        //$this->load->view('stuller_rings_views/stuller_detail_footer' , $data_array);
    }
}
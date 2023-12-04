<?php
$CI = & get_instance();

function get_items_cate_list($type='', $filter_id=0, $category='') {
    $CI = & get_instance();
    $CI->load->model( 'itemjewelrymodel' );
    
    $results = $CI->itemjewelrymodel->getItemCategoryResults($type, $category);
        
    $dropDownLink = SITE_URL . 'admin_listings/heart_collection_items/view/' . $type . '/' . $filter_id . '/';
    $option_list = '<option value="'.$dropDownLink.'">-- Select Category --</option>';

    foreach ( $results as $rows ) {
        $cateLink = getItemCateListingLink($rows['category']);
        $drop_down_link = SITE_URL . $cateLink . '/heart_collection_items/view/' . $type . '/' . $filter_id . '/';
        $option_link = $drop_down_link . $rows['category'];
        $option_list .= '<option value="'.$option_link.'" '.selectedOption($rows['category'], $category).'>'.$rows['category'].'</option>';
    }
    
    $option_list .= '<option value="'.$dropDownLink.'missing_diamonds" '.selectedOption('missing_diamonds', $category).'>Missing Diamonds</option>';
    $option_list .= '<option value="'.$dropDownLink.'missing_imgs" '.selectedOption('missing_imgs', $category).'>Missing Images</option>';

    return $option_list;
}

    function stuller_fashion_cate_list($type='', $filter_id=0, $category='') {
        global $CI;
        $CI->load->model( 'stullerfashionmodel' );

        $results = $CI->stullerfashionmodel->getStullerCategoryResults();

        $drop_down_link = SITE_URL . 'stuller_fashion_jewelry/stuller_fashionjew_listing/view/' . $type . '/' . $filter_id . '/';
        $option_list = '<option value="'.$drop_down_link.'">-- Select Category --</option>';

        foreach ( $results as $rows ) {
            
            $cate_name = $rows['category_name'];
            $option_link = $drop_down_link . $rows['id'];
            $option_list .= '<option value="'.$option_link.'" '.selectedOption($rows['id'], $category).'>'.$cate_name.'</option>';
        }

        return $option_list;
    }

    function getItemCateListingLink($cate_name='') {
        $cateName = urldecode($cate_name);
        switch ($cateName) {
            case 'Band':
            case 'Band Eternity':
            case 'Bracelets':
            case 'Cross Pendant':
            case 'Pendant':
                $item_link = 'band_admin_listings';
                break;
            default :
                $item_link = 'admin_listings';
                break;
        }
        return $item_link;
    }
    
    function isadminlogin() {
        global $CI;
        
        if (($CI->session->isLoggedin()) && ($CI->session->userdata('usertype') == 'admin')) {
                return true;
        } else {
                return false;
        }
    }
    
    function getAdminDetails() {
        global $CI;
        
        if (($CI->session->isLoggedin()) && ($CI->session->userdata('usertype') == 'admin')) {
                return 'Administrator';
        } else {
                return '-1';
        }
    }
    
    function output_page($layout = null, $data = array()) {
        global $CI;
        $CI->load->model('user');
        
        $user = $CI->session->userdata('user');
        $data['user'] = $user;
        $data['loginlink'] = $CI->user->loginhtml('admin');
        $output = $CI->load->view('admin/header', $data, true);
        if ($CI->session->isLoggedin() && ($CI->session->userdata('usertype') == 'admin')) {
                $output .= $layout;
        } else {
                $output .= $CI->load->view('admin/login', $data, true);
        }
        $output .= $CI->load->view('admin/footer', $data, true);
        $CI->output->set_output($output);
    }
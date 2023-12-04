<?php
class Tvjonhy_watches extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('jewelrymodel');
        $this->load->model('diamondmodel');
        $this->load->model('engagementmodel');
        $this->load->model('qualitymodel');
        $this->load->helper('ringsection');
        $this->load->model('rolexmodel_new');
        $this->load->model('tvjohny_watchesmodel');
        $this->load->model('catemodel');
        $this->session->unset_userdata('whsale_section');
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
    
    function sorting_options_list($pagelink='', $sort='DESC') {
        $sort_options = array(
            'DESC' => 'Higher to Lower Price', 
            'ASC' => 'Lower to Higher Price'
            );
        $sort_list = '';
        
        foreach( $sort_options as $sort_key => $sort_value ) {
            $option_link = $pagelink.$sort_key;
            $sort_list .= '<option value="'.$option_link.'" '.selectedOption($sort, $sort_key).'>'.$sort_value.'</option>';
        }
        
        return $sort_list;
    }
    ///// category listings
    function rolex_watches_listing($cates_id = '', $page_limit=0, $sort_field='DESC') {
        $data = $this->getCommonData(); 
        $rolex_cate = $this->tvjohny_watchesmodel->getRolexCategoryRow( $cates_id ); //print_ar($rolex_cate);
	$cateTitle = ( !empty($rolex_cate['sub_sub_cate']) ? $rolex_cate['sub_sub_cate'] : $rolex_cate['sub_cate_name'] );
        $sort_link = SITE_URL . 'tvjonhy_watches/rolex_watches_listing/' . $cates_id . '/' . $page_limit . '/';
        $data['sorting_options'] = $this->sorting_options_list($sort_link, $sort_field);
        $data['sort_field'] = $sort_field;
        
        $data['title'] = ( !empty($cateTitle) ? $cateTitle : 'Rolex Watches Listings' );
        
        $data['sort_link'] = SITE_URL . 'tvjonhy_watches/rolex_watches_listing/'.$cates_id;
        $rolex_list = $this->tvjohny_watchesmodel->getRolexWatchesRows( $cates_id, $page_limit, $sort_field ); //print_ar($rolex_list);
        
        $data['rolex_product_listing'] = $this->getRolexWatchesListingsView( $rolex_list );
        $data['rolex_categories'] = getRolexSubCategoryList( $page_limit, $rolex_cate['cate_type'] ); //// ringsection helper
        $data['rolex_row'] = $rolex_list[0];
        
        $data['extraheader'] = '<link type="text/css" href="' . SITE_URL . 'css/johny_site_style.css" rel="stylesheet" /> ';
        $data['extraheader'] .= '<script src="'.SITE_URL.'js/jquery-1.8.2.min.js">';
        $data['extraheader'] .= '<script>var jQuery = jQuery.noConflict();</script>';
        $data['extraheader'] .= '<script type="text/javascript" src="'.SITE_URL.'js/right_popup_hover_product.js"></script>';
        
        $this->output('rolex_watches/rolex_newatches_page' , $data);
    }
    
    function item_finger_size_options($id=0, $size_id=0) {
        $results = $this->catemodel->getFingerSizeResult();
        $size_options = '';
        
        if( count($results) > 0 ) {
            foreach ( $results as $rows ) {
                $finger_size_link = SITE_URL . 'tvjonhy_watches/rolex_watches_detail/' . $id . '/' . $rows['id'];
                $size_options .= '<option value="'.$finger_size_link.'" '.selectedOption($size_id, $rows['id']).'>'.$rows['ring_size'].'</option>';
            }
        }
        return $size_options;
    }
    
    function getRolexWatchesListingsView($results=[]) {
        $prodList = '';
        $i = 1;
        
        if( count($results) > 0 ) {
            foreach ( $results as $rows ) {
                $third_cols = ( $i % 2 == 0 ? ' third_cols' : '' );
                
                $detail_link = SITE_URL.'tvjonhy_watches/rolex_watches_detail/'.$rows['id'];
                $imageLink = $this->tvjohnyWatchesImg( $rows, '' );
                $rid = $rows['id'];
                $ringTitle = $rows['Title'];
            
            //if( !empty($imageLink[0]) ) {
            $prodList .= '<li class="item'.$third_cols.'">
                <div class="product-grid-quick" onmouseover="showQuickView('.$rid.');" onmouseout="hideQuickView('.$rid.');" style="overflow:hidden;">        
                <div class="product-image"><a class="product-labels" href="'.$detail_link.'">        	
                    <img class="" src="'.$imageLink[0].'" itemprop="image" alt="" style="display: inline;"></a></div>
                    <div class="rolex_title">
                        '.$rows['SKU'].'<br>
                        '.$rows['Title'].'
                    </div>
                    <div class="detail_link_bk">
                        <span></span>
                        <span class="price_label">$'._nf($rows['Price'], 2).'</span>
                        <span class="detail_set_link"><a href="'.$detail_link.'"><img src="'.SITE_URL.'img/site_tv_img/view_detail_ic.jpg" alt="" /></a></span>
                        <div class="clear"></div>
                    </div>        	
                </div>
                <div class="box-detail-over " id="box-detail-over-'.$rid.'" style="display: none;">
                  <div class="column3">
                    <p>'.$ringTitle.'</p>
                        <div class="hover-price">
                          <div class="popup-prices">
                              <p class="old-price-qv">
                                <span class="price-label-qv">Sale Price:</span>
                                <span class="new-price-qv" id="product-price-'.$rid.'">
                                    $'._nf($rows['Price'], 2).'</span>
                          </p>
                          </div>
                            </div>
                            <div id="product_additional_data_'.$rid.'"><div class="product_additional_data"></div></div>
                          </div>
                        </div>
                      </li>';            
            $i++;
            //}    // end img check        
            }
        } else {
            $prodList .= '<div><b>NO Items Found of this category</b></div>';
        }
        
        return $prodList;
    }
    
    function listingdetail($id=0) {
        $rowsring = $this->tvjohny_watchesmodel->getRolexWatchesDetail( $id ); //print_ar($rowsring);
        $columnsList = getTvJonyTableFields(); /// ringsection helper
        
        $view_iteminfo = '';
        $view_iteminfo .= '<span id="item-info"><b>Item Information</b></span>
            <table id="item-tbl" class="data-table2" width="100%" cellspacing="0" cellpadding="0">
              <tbody>';
        $view_iteminfo .= '<tr class="first-row">
                        <th style="width:40%;color:#ff0000;font-weight:bold;">Item Code</th>
                        <td style="color:#ff0000;font-weight:bold;">'.$rowsring['SKU'].'</td>
                      </tr>';
        
        foreach( $columnsList as $column_name ) {
            $cols_lable = str_replace('_', ' ', $column_name);
            $cols_value = $rowsring[$column_name];
            
            if( !empty($cols_value) ) {
                $view_iteminfo .= '<tr class="first-row">
                                <th style="width:40%;">'.$cols_lable.'</th>
                                <td>'.$cols_value.'</td>
                              </tr>';
            }
        }
     
        $view_iteminfo .= '</tbody></table>';
 
        echo $view_iteminfo;        
    }
    
    function tvjohnyWatchesImg($rows=[], $listings='') {
        $img_rows = array();
        
        if( !empty($rows['Image_1']) ) {
            for( $i=1; $i <= 10; $i++ ) {
                $img_field_name = $rows['Image_'.$i];
                if( !empty($img_field_name) ) {
                    $image_link = SITE_URL . 'collection_images/'.$img_field_name;
                    if(getimagesize($image_link) ) {
                        $img_rows[] = $image_link;
                    }
                }
            }
        } else {
            if( !empty($listings) ) {
                $img_rows[] = '';
            } else {
                $img_rows[] = SITE_URL . 'img/no_image_found.jpg';
            }            
        }
        return $img_rows;
    }
    //// get commnets list
    function getProductReviews($rid=0) {
        ////// get user comments
	$rings_coments = $this->catemodel->getComentsListView($rid);
	$view_coments = '';
	
	if( count($rings_coments) > 0 ) {
		foreach($rings_coments as $row_coments) {
			$view_coments .= '<div class="reviews_block">
								<div class="reviews_label">
								  <div><img src="'.SITE_URL.'img/page_img/stars_icon.png" /></div>
								  <div class="dateLabel">'.date('d M, Y', strtotime($row_coments['coment_date'])).',</div>
								</div>
								<br />
								<div class="reviewHeading">This is comments review about '.$row_coments['parent_cate'].'</div>
								<div class="reviewData">'.$row_coments['post_comments'].'</div>
							  </div>';
		}
	} else {
		$view_coments = '<div class="reviewData">NO COMMENTS LIST ADDED</div>';
	}
        
        return $view_coments;
    }
    
    ///// category listings
    function rolex_watches_detail($watch_id = 0, $finger_size=1) {
        $data = $this->getCommonData(); 
        $fingers_size = $this->catemodel->getFingerSizeRow($finger_size);
        
        $data['results'] = $this->tvjohny_watchesmodel->getRolexWatchesDetail( $watch_id );
        $data['cate_row'] = $this->tvjohny_watchesmodel->getRolexCategoryRow( $data['results']['category_id'] );
        $data['item_price'] = $fingers_size['price_difference'] + $data['results']['Price'];	
        $data['item_retail_price'] = $data['item_price'] * RETAIL_PERCENT;	
        $data['title'] = $data['Title'];
        $data['item_ring_size'] = $fingers_size['ring_size'];
        $data['rolex_img_list'] = $this->rolexWatchImgList( $data['results'] );
        $data['rolex_listing_link'] = SITE_URL . 'tvjonhy_watches/rolex_watches_listing/' . setSlugTitle($data['results']['Subcategory_1']);
        $data['first_rolex_img'] = $this->tvjohnyWatchesImg($data['results']);
        $data['popular_listings'] = $this->getRolexSimilarListings( $data['results']['category_id'], $watch_id );
        $data['similar_listings'] = $this->getRolexSimilarListings( $data['results']['category_id'], $watch_id );
        $data['item_category'] = ( !empty($data['results']['Subcategory_1']) ? $data['results']['Subcategory_1'] : $data['results']['Category'] );
        $data['similar_products'] = $this->getRolexSimilarListings( $data['results']['category_id'], $watch_id );
        $data['view_coments'] = $this->getProductReviews( $watch_id );
        $data['item_finger_size'] = $this->item_finger_size_options( $watch_id, $finger_size );
        
        $data['watch_attribute'] = ''; //$this->watchAttriubteList( $data['results']['attributes'] );
        $data['watch_details'] = rolex_newwatches_details( $data['results']);  /// ringsection helper
        $ezvalue_row = $this->commonmodel->getEzOptionValues();
        $data['first_ez_value'] = $ezvalue_row[0]['ezvalue'];
        $data['second_ez_value'] = $ezvalue_row[1]['ezvalue'];
        
        $data['extra_headers'] = '<script language="javascript" src="'.SITE_URL.'js/jquery.popup.js" type="text/javascript"></script>';
        
        $this->detail_output('rolex_watches/rolexwatch_detail_page' , $data);
    }
    
    function getRolexSimilarListings($category_id=0, $watch_id=0) {
        $results = $this->tvjohny_watchesmodel->getRolexWatchesSimilarRows( $category_id, $watch_id, 20 );
        $similar_listing = '';
        $i = 1;
        if( count($results) > 0 ) {
            foreach ( $results as $rows ) {
                $imageLink = $this->tvjohnyWatchesImg( $rows, 'listings' );
                $detail_link = SITE_URL . 'tvjonhy_watches/rolex_watches_detail/' . $rows['id'];
                if( !empty($imageLink[0]) ) {
                    $similar_listing .= '<div class="product_colsbk col-sm-3">
                    <div class="productRingImg"><a href="'.$detail_link.'">
                    <img src="'.$imageLink[0].'" width="200" height="153" alt="'.$rows['Title'].'"></a></div>
                            <div><img src="'.SITE_URL.'img/david_home/diamond_search/rating_icon.jpg" alt=""><span class="reviewlabel">(86 Review)</span></div><br>
                            <div>$ '._nf($rows['Price'], 2).'</div>
                            <div class="setcolor_label">+ '.$rows['Subcategory_1'].'</div><br>
                            <div class="centerLabel"><a href="'.$detail_link.'">'.$rows['Title'].'</a></div>
                            <div class="setcolor_label"></div>
                        </div>';
                    
                    if( $i%4 === 0) { break; }
                    $i++;
                }
            }
        } 
        
        return $similar_listing;
    }
    
    function rolexWatchImgList($row=[]){
        $img_rows = $this->tvjohnyWatchesImg($row);
        $i = 1;
        $img_list = '';
        
        foreach ( $img_rows as $imglink ) {
            
            if( $i === 1 ) {
                $display_style = '';
                $active_class = ' active';
            } else {
                $display_style = 'display:none';
                $active_class = '';
            }
            $img_list .= '<img class="position'.$i.' product_image img-responsive" style="'.$display_style.'" alt="'.$row['Title'].'" width="500" height="500" src="'.$imglink.'" />
            <div class="image_btn'.$active_class.' position'.$i.'">'.$i.'</div>';
            
            $i++;
        }
        
        return $img_list;
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
    
    ///// stuller detail page viiew
    function detail_output($file_path='', $data_array=array()) {
        $this->load->view('stuller_rings_views/stuller_detail_header' , $data_array);
        $this->load->view($file_path , $data_array);
        $this->load->view('stuller_rings_views/stuller_detail_footer' , $data_array);
    }
    
    ///// stuller detail page viiew
    function output($file_path='', $data_array=array()) {
        $this->load->view('erd/header' , $data_array);
        $this->load->view($file_path , $data_array);
        $this->load->view('erd/footer' , $data_array);
    }
}
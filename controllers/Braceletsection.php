<?php
class Braceletsection extends CI_Controller {
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
    function index()
    {
        die('You are not allowed to access to this page!');		
    }
    private function getCommonData($banner='')
    {
            $this->load->model('commonmodel');
            $data = array();
            $data = $this->commonmodel->getPageCommonData();
            return $data;
    }
    
    ///// category listings
    function productReviews() {
        
        $data = $this->getCommonData(); 
		
        $data['title'] = 'hearts and diamond Gold Rings';
    
       $this->load->view('engagementringstrial/left_reviews_page' , $data);
    }
    
    ///// category listings
    function bracelet_listings($category_id=0, $start=0) 
     {
        
        $data = $this->getCommonData(); 
		
        $data['title'] = 'Bracelet Section';
        $ringsCate = $this->input->get('cate'); //get_var('cate');
        $ringCate = ( !empty($ringsCate) ? $ringsCate : 1 );
        $data['ringsCate'] = resetsSlugTitle($ringCate);
        $perpage = $this->input->get('pagelist');
        $perpage_no = $this->input->get('per_page');
        $sort = $this->input->get('sort');
        $metal_value = $this->getFieldValue('metal');
        $color_value = $this->getFieldValue('color');
        $sort_option =  ( ( isset($sort) && !empty($sort) ) ? $sort : 'ASC' );
        
        $config["per_page"] = ( $perpage > 0 ? $perpage : 20 );
        $config["num_links"] = 5;
        $config["uri_segment"] = 5;
        $config['use_page_numbers'] = TRUE;
        $startFrom = ( $perpage_no > 0 ? ( ( $perpage_no - 1 ) * $config["per_page"] ) : 0 );        
        $start_from =  ( $startFrom > 0 ? $startFrom : 1 );
        $bracelets = $this->braceletmodel->getBraceleteListings($category_id, $startFrom, $config["per_page"], '', '', $metal_value, $color_value, $sort_option);
        
        $config["total_rows"] = $bracelets['total'];
        $baseLink = SITE_URL.'braceletsection/bracelet_listings/'.$category_id.'/?sort='.$sort_option;
	$config["base_url"]   = $baseLink.'&pagelist='.$config["per_page"].'&metal='.$metal_value.'&color='.$color_value;
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><a class="active" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        
        $data['page_numb_hint'] = page_number_hint($config["per_page"], $bracelets['total'], $start_from); // custome helper
        
        $data['similar_products'] = $this->ringSimilarItems($category_id, '', 6, 'listings');
        $options = '';  
        $page_link = $baseLink; //( !empty( $perpage_no ) ? $baseLink.'&per_page='.$perpage_no : $baseLink);
        
            for( $page=10; $page <= 50; $page+=10 ) {
                $options .= '<option value="'.$page_link.'&pagelist='.$page.'" '.selectedOption($page,$config["per_page"]).'>'.$page.'</option>';
            }
        ///// sort options
        $sort_list = array('ASC' => 'Lowest Price', 'DESC' => 'Highest Price');
        $sort_link = $page_link.'?per_page='.$config["per_page"].'&sort=';
        $optionList = '';
        
        foreach( $sort_list as $sorting => $sort_value ) {
            $optionList .= '<option value="'.$config["base_url"].'&sort='.$sorting.'" '.selectedOption($sorting, $sort_option).'>'.$sort_value.'</option>';
        }
        
        
        
        $this->pagination->initialize($config); ///// initializ the pagination        
        $data['page_options']   = $options;
        $data['sorting_option'] = $optionList;
        $data['rings_metal']    = $this->getDefaultMetalCols($sort_link, $sort_option, 'metal');
        $data['bracelet_color'] = $this->getDefaultMetalCols($sort_link, $sort_option, 'color', 'default_color');
        $data['page_links']     = $this->pagination->create_links();
        $data['bracelet_menu']     = $this->getBraceletCateList($category_id);
        
        $data['ring_listings'] = $this->bracelet_section_listings_view($bracelets['results']);
        //$cate_name = $this->braceletsectiongetCateName( $category_id );
        $data['cate_name'] = $this->product_cate_list_link( $category_id );
        //$data['product_reviews'] = file_get_contents(SITE_URL.'stullerygoldrings/productReviews'); //left_menu_reviews();
        
        $output = $this->load->view('bracelet_pages/bracelet_listing_view' , $data , true);
        $this->output($output, $data);
    }
    
    // get default metal list
    function getDefaultMetalCols($sort_link='', $sort_option='', $getfield='', $field='default_metal' ) {
        $results_metal = $this->braceletmodel->getBraceletMetal( $field );
        $metal_link = $sort_link.$sort_option;
        $metal_list = '<option value="'.$metal_link.'&metal=">Select Metal</option>';
        $field_value = $this->getFieldValue($getfield);
        
        foreach( $results_metal as $rowmetal ) {
           $metal_list .= '<option value="'.$metal_link.'&'.$getfield.'='.urlencode( $rowmetal[$field] ).'" '.selectedOption($rowmetal[$field], $field_value).'>'.$rowmetal[$field].'</option>';
        }
        
        return $metal_list;
    }
    
    //// set the get field value
    function getFieldValue($field='') {
        $metal_val = check_empty( $this->input->get($field), '' );
        return ( !empty($metal_val) ? urldecode($metal_val) : '' );
    }
    //// get main and parent category name list
   function product_cate_list_link($catename='') {
       $cate_name = '<li><a href="' . SITE_URL . 'stullerygoldrings/stuller_ring_listings/?cate=1" alt="hearts and diamond Gold Rings">hearts and diamond Gold Rings</a></li>';
       $cate_name .= '<li><a href="'.SITE_URL.'stullerygoldrings/stuller_ring_listings/?cate='.setSlugTitle($catename).'">'.$catename.'</a></li>';
        
        $catelink['category_link'] = $cate_name;
        $catelink['category_name'] = $catename;
        
        return $catelink;
   }
   
   //// get bracelet category list
   function getBraceletCateList($cateid=0) {
       $parent_cate_id = $this->braceletmodel->getBraceletParentCateId( $cateid );
       $result = $this->braceletmodel->getBraceletCategory( );
       
       $list_link = SITE_URL . 'braceletsection/bracelet_listings/';
       
       $category_list = '<div id="accordian"><ul class="leftmenu-list">';
       
       foreach( $result as $category ) {
           $active_class = ( $parent_cate_id == $category['id'] ? 'class="active"' : '' );
           
           $child_category = $this->braceletmodel->getBraceletCategory( $category['id'] );           
           $cate_dtlink = ( count($child_category) == 0 ? $list_link . $category['id']  : '#javascript' );
           
           $category_list .= '<li '.$active_class.'><h3><a href="' . $cate_dtlink . '">'.$category['category_name'].'</a></h3>';
           
           if( count( $child_category ) > 0 ) {
               $category_list .= '<ul>';
                foreach( $child_category as $child ) {
                    $category_list .= '<li><a href="'.$list_link . $child['id'] . '">'.$child['category_name'].'</a></li>';
                }
                
              $category_list .= '</ul>';
           }
           
           $category_list .= '</li>';
       }
       
       $category_list .= '</ul></div>';
       
       return $category_list;
       
   }
    ///// product detail page
    function bracelet_detail($product_id=0, $price_field='gold_polished_1300') {
        $data = $this->getCommonData(); 
		
        $data['onload_class'] = 'catalog-product-view product-14k-gold-diamond-three-stone-engagement-ring-set-128c-p-24728 categorypath-diamond-engagement-rings-wholesale-preset-gold-diamond-engagement-rings-aspx category-diamond-engagement-rings-wholesale-preset-gold-diamond-engagement-rings';
        $this->session->set_userdata('page_view_type', 'bracelet_section');
        
        //$this->load->view('engagementringstrial/engagement_rings_details', $data);
        //$metal = '';
        //$rngsize = '';
        $ring_size = $this->input->get('ring_size');
        $get_ring_size = ( !empty($ring_size) ? $ring_size : 'NA' );
        $rsize_price = $this->catemodel->getFingerSizePrice( $ring_size );
        $data['set_ring_size'] = resetsSlugTitle($get_ring_size);
        
        $rowsring = $this->braceletmodel->getBraceleteDetail($product_id); //print_ar($rowsring);
        $data['buildring'] = $this->session->userdata('buildring');
        $data['rowsring'] = $rowsring;
        $priceMargin = $this->commonmodel->inventoryPriceMargin($rowsring['stuller_cate'], STULLER_OPTION);
        $bracelet_price = $rowsring[$price_field] * $priceMargin;
        
        $data['sales_price'] = $bracelet_price + $rsize_price;
        $data['retail_price'] = $data['sales_price'] * PRICE_PERCENT;
        $data['saving_percent'] = ( 100 - ( ( $data['sales_price'] / $data['retail_price'] ) * 100 ) );
        $data['buynow_link'] = htmlspecialchars(SITE_URL.'jewelleries/addtoshoppingcart/');
        $data['item_desc'] = $this->bracelet_title( $rowsring );
        
        $data['ringtitle'] = $data['item_desc'];
        $data['ringimg']   = $this->getBraceletImage($rowsring);
        $data['subcate_link'] = $this->product_cate_list_link( $rowsring['stuller_cate'] );
        $data['stuller_link'] = 'braceletsection/bracelet_detail/'.$product_id.'/?cate=1';
        $bracelet_cate = 0;
        
        $data['similar_items'] = $this->ringSimilarItems($bracelet_cate, $product_id);
        $data['similar_products'] = $this->ringSimilarItems($bracelet_cate, $product_id, 4);
        $data['popular_listings'] = $this->popularListings($rowsring['category_id'], $bracelet_cate, $product_id, 4);
        $data['more_bracelet_listings'] = $this->popularListings($rowsring['category_id'], $bracelet_cate, $product_id, 4);
        ////// get user comments
	    $data['view_coments'] = $this->getProductReviews( $product_id );
        
        $data['extra_headers'] = '';
        
        $data['extra_headers'] .= '<script language="javascript" src="'.SITE_URL.'js/jquery.popup.js" type="text/javascript"></script>';
        $ringresults = $this->catemodel->getFingerSizeResult();
        $base_link = SITE_URL.'braceletsection/bracelet_detail/'.$product_id.'/';
        $finger_size = '<option value="'.$base_link.'?ring_size=">Select Finger Size</option>';
        
        if( count($ringresults) > 0 ) {
            foreach( $ringresults as $rowsize ) {
                $rgsz = setRingSize($rowsize['ring_size']);
                $finger_size .= '<option value="'.$base_link.'?ring_size='.$rgsz.'" '.selectedOption($rgsz, $ring_size).'>'.$rowsize['ring_size'].'</option>';
            }
        }
        
        $data['finger_ring_size'] = $finger_size;
        $data['finished_level'] = $this->getFinishedLevel( $product_id, $price_field );
        ////// item thumbs
        $data['rings_thumb'] = $this->getProductThumb( $rowsring );
        //$data['suported_shapes'] = $this->getDimaondShapeImage( $rowsring );  /// get supplied stones shapes
        
        
        $data['title']      = 'Diamond Bracelet | '.$data['ringtitle'];
        
$data['meta_tags']  = '
<meta http-equiv="Content-Type" content="text/html; iso-8859-1">
<meta name="title" content="Loose Diamonds,Engagement Rings, Design Your Own Ring, Cheap Diamonds Ideal Scope, Customize Rings - Engagement Rings, '.$data['ringtitle'].' ">
<meta name="ROBOTS" content="INDEX,FOLLOW">
<meta name="description" content="Offers Loose Diamonds,Design Your Own Ring,Ideal Scope, Loose Diamond, Engagement Rings, Cheap Diamonds, Customize Rings,Diamond Tutorial, Diamond rings, Cheap Diamonds, Ideal Scope, Diamond district, Diamond Rings, Wholesale Diamonds, Estate Jewelry, Custom Engagement Rings, '.$data['ringtitle'].'">
<meta name="abstract" content="Diamond Rings, Wholesale Diamonds, Estate Jewelry, Custom Engagement Rings, New York, Chicago, California, Boston, Las Vegas, Columbia, Montgomery, '.$data['ringtitle'].'">
<meta name="keywords" content="diamonds, Loose diamonds, engagement ring usa, colored diamonds, engagement diamonds ring, wholesal diamond, diamond district, Diamond Rings, Wholesale Diamonds, Estate Jewelry, custom engagement rings, diamond ring usa, engagement rings diamond, '.$data['ringtitle'].'">
<meta name="author" content="'.get_site_contact_info('sites_title').'">
<meta name="publisher" content="'.get_site_contact_info('sites_title').'">
<meta name="copyright" content="'.get_site_contact_info('sites_title').'">
<meta http-equiv="Reply-to" content="">
<meta name="creation_Date" content="12/12/2008">
<meta name="expires" content="">
<meta name="revisit-after" content="7 days">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">';
        
        $output = $this->load->view('bracelet_pages/diamond_bracelet_detail' , $data , true);
        $this->output($output, $data);
    }
    
    //// finished level
    function getFinishedLevel($product_id=0, $field='') {
        $rowsring = $this->braceletmodel->getBraceleteDetail($product_id);
        
        $finishLevel = array(
            'gold_polished_1300' => 'Gold Polished $1300',
            'gold_complete_1300' => 'Gold Complete $1300',
            'gold_semi_mount_1300' => 'Gold Semi Mount $1300',
            'gold_polished_1700' => 'Gold Polished $1700',
            'gold_complete_1700' => 'Gold Complete $1700',
            'gold_semi_mount_1700' => 'Gold Semi Mount $1700',
            'silver_polished_40' => 'Silver Polished $40',
            'silver_complete_40' => 'Silver Complete $40',
            'silver_semi_mount_40' => 'Silver Semi Mount $40',
            'silver_polished_60' => 'Silver Polished $60',
            'silver_complete_60' => 'Silver Complete $60',
            'silver_semi_mount_60' => 'Silver Semi Mount $60',
            'platinum_polished_1200' => 'Platinum Polished $1200',
            'platinum_complete_1200' => 'Platinum Complete $1200',
            'platinum_semi_mount_1200' => 'Platinum Semi Mount $1200',
            'platinum_polished_1600' => 'Platinum Polished $1600',
            'platinum_complete_1600' => 'Platinum Complete $1600',
            'platinum_semi_mount_1600' => 'Platinum Semi Mount $1600'
        );
        
        $detail_link = SITE_URL . 'braceletsection/bracelet_detail/';
        
        $finish_list = '';
        foreach( $finishLevel as $finish_cols => $finish_label ) {
            if( $rowsring[$finish_cols] != 'Level N/A' ) {
              $finish_list .= '<option value="'.$detail_link.$product_id.'/'.$finish_cols.'" '.selectedOption($finish_cols,$field).'>'.$finish_label.'</option>';
            }
        }
        
        return $finish_list;
        
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
								  <div><img src="'.SITE_URL.'img/page_img/stars_icon.png"  alt="stars_icon"/></div>
								  <div class="dateLabel">'.date('d M, Y', strtotime($row_coments['coment_date'])).',</div>
								</div>
								<br />
								<div class="reviewHeading">This is comments review about '.$data['details']['parent_cate'].'</div>
								<div class="reviewData">'.$row_coments['post_comments'].'</div>
							  </div>';
		}
	} else {
		$view_coments = '<div class="reviewData">NO COMMENTS LIST ADDED</div>';
	}
        
        return $view_coments;
    }
    
    /// get product thumb
    function getProductThumb($rowaray=array(), $popup='') {
        $image_label = array('.alt', '.alt1', '-A.alt', '-A.alt1');
        $item_no = explode('-', $rowaray['item_number']);
        $itemTitle = $this->bracelet_title( $rowaray );
        
        $bracelet_image = array();
        $bracelet_image[] = $item_no[0].'.jpg';
        
        foreach ( $image_label as $label ) {
            $bracelet_image[] = $item_no[0] . $label . '.jpg';
        }
        
    foreach( $bracelet_image as $brimage_name ) {
        
            $brimage_link = SITE_URL . 'bracelet_img/images/'.$brimage_name;
            
        if( !empty($brimage_name) && getimagesize($brimage_link) ) {

           if( empty($popup) ) {
                   $getRingsThumb .= '<div class="smalimgview"><a href="#javascript;" onclick="ringThumbView(\''.$brimage_link.'\')">
                        <img src="'.$brimage_link.'" alt="'.$itemTitle.'"></a></div>';
               } else {
                   $getRingsThumb .= '<li><a href="javascript://" onclick="imageshow(\''.$brimage_link.'\');" title="'.$itemTitle.'"><img src="'.$brimage_link.'" width="31" alt="'.$itemTitle.'"></a> </li>';
               } 
        }
    }
        
        return $getRingsThumb;
    }
    //// get diamond shape
    function getDimaondShapeImage($rowshape=array()) {
        
        $getring_shape = getSuppliedStoneShape( $rowshape['supplied_stones'] );
    $center_stshapes = array('B'=>'round','H'=>'heart','E'=>'emerald','PR'=>'princess','R'=>'radiant','O'=>'oval','M'=>'marquise','AS'=>'asscher','P'=>'pear','C'=>'cushion');
    //// center stond shapes list
	$center_stshapes = array('B'=>'round','H'=>'heart','E'=>'emerald','PR'=>'princess','R'=>'radiant','O'=>'oval','M'=>'marquise','AS'=>'asscher','P'=>'pear','C'=>'cushion');
	$view_ctshape = '';
        
        $shapPath = SITE_URL.'img/diamond_shapes/';
	$ctstone_shape = $rowshape['additional_stones']; 
	$find_ctsahpe = getCenterStoneShape($ctstone_shape);
	
	//$getsp_shpe = unrings_diamond_shape($getring_shape);
	$getsp_shape = $center_stshapes[$getring_shape];
	//print_r($find_ctsahpe);
	//// supported shapes
	$data['suport_shape'] = ( !empty($ctstone_shape) ? strtoupper( implode(', ', $find_ctsahpe) ) : 'Support any shape' );
	$spstone_arlist = array($getsp_shape);
	
	$i=0;
	foreach($center_stshapes as $sid => $shap_list) {
		$shap_img = 'ct_'.$shap_list.'.jpg';
		$altitle = strtoupper($shap_list);
		
		if( !empty($ctstone_shape) ) {
			if(in_array($shap_list, $find_ctsahpe))
			$view_ctshape .= '<a href="#javascript;" class="currShape" alt="'.$altitle.'"><img src="'.$shapPath.$shap_img.'" id="'.$sid.'_sh" onclick="setShapeInCenterStone(\''.$sid.'_sh\')" alt="'.$altitle.'" /></a>';
		} else {
			$view_ctshape .= '<a href="#javascript;" class="currShape" alt="'.$altitle.'"><img src="'.$shapPath.$shap_img.'" id="'.$sid.'_sh" onclick="setShapeInCenterStone(\''.$sid.'_sh\')" alt="'.$altitle.'" /></a>';
		}
	}
        
        return $view_ctshape;
    }
    
    ///// rings similar items
    function ringSimilarItems($ring_cateid=0, $prod_id=0, $limit=5, $listing='') {
        
        $rowsring = $this->braceletmodel->getBraceleteListings($ring_cateid, 0, $limit, $listing, $prod_id);
                
        $similar_rings = '';
        $str = 150;
        
        if( count($rowsring['results']) > 0 ) {
            foreach( $rowsring['results'] as $rowring ) {
               $sid = $rowring['id'];
               
               $detaiLink = SITE_URL . 'braceletsection/bracelet_detail/' . $sid;
               $ringImageLink = $this->getBraceletImage($rowring);
               $retail_price  = $rowring['gold_polished_1300'] * PRICE_PERCENT;  //// PRICE_PERCENT : 3.5
               $ring_ourprice = $rowring['gold_polished_1300'];
               $saving_percent = ( 100 - ( ( $ring_ourprice / $retail_price ) * 100 ) );
               $popupLink = SITE_URL . 'braceletsection/bracelet_popup_detail/'.$sid . '/?keepThis=true&TB_iframe=true&width=800&height=550&modal=false';
               $ringBoxDesc = $this->bracelet_title( $rowring );
               $stullerTitle = ( strlen($ringBoxDesc) > $str ? substr($ringBoxDesc, $str).'...' : $ringBoxDesc );
               $ring_title = wordwrap($stullerTitle,25,"<br>\n");
               
            if( empty($listing) ) {
               $similar_rings .= '<div class="prdSection col-sm-3" id="'.$sid.'">
                                    <a href="'.$detaiLink.'" class="alsoviwed-product-img">
                                            <img class="" src="'.$ringImageLink.'" width="200" alt="'.$ring_title.'" title="'.$ring_title.'" style="display: inline; width:144px;">
                                    </a><br><br>
                                    <a class="prdName" title="'.$ring_title.'" href="'.$detaiLink.'">'.$ring_title.'</a>
                                    <div class="price-box">
                                            <p class="old-price"><span>Retail Price:</span>
                                            <span style="text-decoration: line-through;"> $'._nf($retail_price, 2).'</span></p>
                                            <p class="our-price"><span>Our Price:</span><span> $'._nf($ring_ourprice, 2).'</span><br></p>
                                            <!-- <a class="viewItem" href="">View Item</a> -->
                                    </div>
				</div>'; 
                } else {
                   $similar_rings .= '<li class="item first">
			<div class="product-grid-quick" onmouseover="showTopQuickView('.$sid.');" onmouseout="hideTopQuickView('.$sid.');" style="overflow:hidden;">
				<a title="'.$ring_title.'" href="'.$detaiLink.'"><img alt="'.$ring_title.'" class="" src="'.$ringImageLink.'" width="200" style="display: inline;"></a>
				<h2 class="product-name"><a title="'.$ring_title.'" href="'.$detaiLink.'">'.$ring_title.'</a></h2>
                            <div id="top-quickview'.$sid.'" style="display: none; position: relative;">
					<a href="Javascript:;" onclick="show_quick_view(\''.$popupLink.'\', \'Quick View\', \'nofollow\');" title="Quick View'.$ring_title.'" class="quick-view thickbox" rel="nofollow"><span>Quick View</span></a>
				</div>
                                
				<div class="price-box">
                                    <p class="old-price"><span class="price-label">Retail Price:</span> 
                                    <span id="old-price-802865" class="price">$'._nf($retail_price, 2).'</span></p>
				<p class="our-price"><span class="price-label">Our Price:</span> 
                                <span id="product-price-'.$sid.'">$'._nf($ring_ourprice, 2).'</span><br>
                                    </p>
				</div>
				<ul class="add-to-links-details">
					<li><a class="view-item" href="'.$detaiLink.'">View Item</a></li>
				</ul>
			</div>
			<!-- Mouse Hover DIV STARTS here -->
			<div class="box-detail-over right-box" id="top-box-detail-over-'.$sid.'" style="display: none;">
				<div class="column3">
					<p>'.$ring_title.'</p>
					<div class="hover-price">
						<div class="popup-prices">
                                                <p class="old-price-qv"><span class="price-label-qv">Retail Price:</span> 
                                                <span id="old-price-'.$sid.'" class="price-qv">$'._nf($retail_price, 2).'</span></p>
							<p class="old-price-qv"><span class="price-label-qv">Our Price:</span> <span id="product-price-'.$sid.'" class="new-price-qv">$'._nf($ring_ourprice, 2).'</span> <span class="special-price-label-qv">(Savings: '.round($saving_percent).'%)</span></p>
</div>
					</div>
					<div id="top-product_additional_data_'.$sid.'"></div>
				</div>
			</div>
			<!-- Mouse Hover DIV ENDS here -->
		</li>';     
                }
            }
        }
        
        return $similar_rings;
    }
    
    function popularListings($ring_cateid=0, $prod_id=0, $limit=4, $listing='') {
        
        $rowsring = $this->braceletmodel->getBraceleteListings($ring_cateid, 0, $limit, $listing, $prod_id);
        
        $similar_rings = '';
        $str = 150;
        
        if( count($rowsring['results']) > 0 ) {
            foreach( $rowsring['results'] as $rowring ) {
               $sid = $rowring['id'];
               
               $detaiLink = SITE_URL . 'braceletsection/bracelet_detail/' . $sid;
               $ringImageLink = $this->getBraceletImage($rowring);
               $retail_price  = $rowring['gold_polished_1300'] * PRICE_PERCENT;  //// PRICE_PERCENT : 3.5
               $ring_ourprice = $rowring['gold_polished_1300'];
               $saving_percent = ( 100 - ( ( $ring_ourprice / $retail_price ) * 100 ) );
               $popupLink = SITE_URL . 'braceletsection/bracelet_popup_detail/'.$sid . '/?keepThis=true&TB_iframe=true&width=800&height=550&modal=false';
               $ringBoxDesc = $this->bracelet_title( $rowring );
               $stullerTitle = ( strlen($ringBoxDesc) > $str ? substr($ringBoxDesc, $str).'...' : $ringBoxDesc );
               $ring_title = wordwrap($stullerTitle,25,"<br>\n");
               $detailDesc = $this->bracelet_title( $rowring );
               
            $similar_rings .= '<div class="product_colsbk col-sm-3">
                <div class="productRingImg"><a href="'.$detaiLink.'"><img src="'.$ringImageLink.'" width="200" height="153" alt="'.$stullerTitle.'"></a></div>
                        <div><img src="'.IMGSRC_LINK.'rating_icon.jpg" alt=""><span class="reviewlabel">(86 Review)</span></div><br>
                        <div>$ '. _nf($ring_ourprice, 2).'</div>
                        <div class="setcolor_label">+ '.$rowring['ProductType'].'</div><br>
                        <div class="centerLabel"><a href="'.$detaiLink.'">'.$stullerTitle.'</a></div>
                        <div class="setcolor_label">'.$detailDesc.'</div>
                    </div>';
            }
        }
        
        return $similar_rings;
    }
    ///// get rings listings view according to the category id
    function bracelet_section_listings_view( $results = array()) {
        $ringlistings = '';
        $str = 150;
        
        if( count($results) > 0 ) {
            foreach( $results as $rowrings ) {
                $ringDetail = SITE_URL . 'braceletsection/bracelet_detail/' . $rowrings['id'];
                $ringsImg = $this->getBraceletImage($rowrings);
                $ringBoxDesc = $this->bracelet_title( $rowrings );
                $ringTitle = ( strlen($ringBoxDesc) > $str ? substr($ringBoxDesc, $str).'...' : $ringBoxDesc );
                $priceMargin = 1; //$this->commonmodel->inventoryPriceMargin($rowrings['stuller_cate'], STULLER_OPTION);
                $bracelet_price = $rowrings['gold_polished_1300'] * $priceMargin;
                
                $retailPrice = _nf($bracelet_price * PRICE_PERCENT, 2);
                $ourPrice = _nf($bracelet_price, 2);
                $rid = $rowrings['id'];
                
                $popupLink = SITE_URL . 'braceletsection/bracelet_popup_detail/' . $rid . '/?keepThis=true&TB_iframe=true&width=800&height=550&modal=false';
                
                $ringlistings .= '<li class="item" data-url="'.$ringDetail.'">
      <div class="product-grid-quick" onmouseover="showQuickView('.$rid.');" onmouseout="hideQuickView('.$rid.');" style="overflow:hidden;">
        <div class="product-image"><a class="product-labels" href="'.$ringDetail.'" title="'.$ringTitle.'">
        	
        	<img class="" src="'.$ringsImg.'" itemprop="image" alt="'.$ringTitle.'" width="400" style="display: inline;"></a></div>
        	
		<h3><a href="'.$ringDetail.'" title="'.$ringTitle.'"> <span>' .  $ringTitle . '</span></a></h3>
          <div id="quickview'.$rid.'" style="display: none;"> 
        	<a href="Javascript:;" onclick="show_quick_view(\''.$popupLink.'\',\'Quick View\',\'nofollow\');" title="'.$ringTitle.'" class="quick-view thickbox" rel="nofollow"><span>Quick View</span></a>
        </div>
    <div class="price-box">
                                
                    <p class="old-price">
                <span class="price-label">Retail Price:</span>
                <span class="price" id="old-price-'.$rid.'">
                    $'.$retailPrice.'                </span>
            </p>
                        <p class="our-price">
                <span class="price-label">Our Price:</span>
                <span id="product-price-'.$rid.'">
                    $'.$ourPrice.'                </span><br>
                <span>Item #: '.$rowrings['item_number'].'</span>
            </p>
		<p class="special-price">
			<!--<span class="price-label">(Savings: 
			%)
			</span>-->
		</p>
        </div>
        <div class="actions">
                    <a href="'.$ringDetail.'" class="view-item" title="'.$ringTitle.'">View Item</a>
          				
	<div class="ratings">
                    <div class="rating-box">
                <div class="rating" style="width:100%"></div>
            </div>
                <span class="amount"><a href="'.$ringDetail.'#prod_detail">4 Review(s)</a></span>
    </div>
	</div>
      </div>
      <div class="box-detail-over " id="box-detail-over-'.$rid.'" style="display: none;">
        <div class="column3">
          <p>'.$ringTitle.'</p>
                    <div class="hover-price">
    <div class="popup-prices">
            <p class="old-price-qv">
                <span class="price-label-qv">Retail Price:</span>
                <span class="price-qv" id="old-price-'.$rid.'">
                    $'.$retailPrice.'                </span>
            </p>
                        <p class="old-price-qv">
                <span class="price-label-qv">Our Price:</span>
                <span class="new-price-qv" id="product-price-'.$rid.'">
                    $'.$ourPrice.'                </span>
          
            			
			<span class="special-price-label-qv">(Savings: 64%)</span>
			  </p>
        </div>
          </div>
          <div id="product_additional_data_'.$rid.'"><div class="product_additional_data"></div></div>
        </div>
      </div>
    </li>';
                
    }
        } else {
            $ringlistings .= '<div>NO Rrings List Found!</div>';
        }
        
        return $ringlistings;
    }
    ////// get the category list view
    function category_cols_list_view( $ringresults=array() ) {
        
        $catelist_view = '';
        
        if( count($ringresults) > 0 ) {
            foreach( $ringresults as $rowcate ) {
                $cateImgLink = RINGS_IMAGE.'crone/'.$rowcate['image'];
                $detaiLink = SITE_URL.'stullerygoldrings/qualitycate/'.$rowcate['id'];
                $cateImgLink = SITE_URL.'images/no_img_found.jpg';
                
                if( !empty($rowcate['image']) ) {
                    if( getimagesize( QUALITY_IMGS . $rowcate['image'] ) ) {
                        $cateImgLink = QUALITY_IMGS . $rowcate['image'];
                    }
                }
                
                $ringTitle = $rowcate['title'];
                
                $cateDesc = 'We have taken care of your engagement rush by creating a breathtaking collection of the <a href="'.$detaiLink.'" style="text-decoration: none;"><strong>'.$ringTitle.'</strong></a> available in 14k or 18k yellow, rose, white gold or Platinum our pre-set diamond engagement rings are made to impress and for any budget:  from unique engagement rings to solitaire engagement rings to very cheap engagement rings.
            					';
                
                $catelist_view .= '<div class="cat-list"><div class="cat-row-inner"><span class="cat-name"><a href="'.$detaiLink.'" alt="" title="'.$ringTitle.'" onclick="setrefrenceurl(371,\'\');">'.$ringTitle.'</a></span><div class="cat-image"><a href="'.$detaiLink.'" alt="'.$ringTitle.'" title="'.$ringTitle.'" onclick="setrefrenceurl(371,\'\');">	<img class="" src="'.$cateImgLink.'" alt="'.$ringTitle.'" title="'.$ringTitle.'" border="0" style="display: block;">
	</a></div>
                <div class="sm-desc ">
		  <div class="cat-view-more">'.$cateDesc.'</div>
			<a href="'.$detaiLink.'" class="more-btn" title="'.$ringTitle.'" alt="'.$ringTitle.'" onclick="setrefrenceurl(371,\'\');"></a>
			</div>
		</div></div>';
            }
        } else {
            $catelist_view .= 'false';
        }
        
        return $catelist_view;
    }
    
    ///// get category name
    function getCateName( $cid=0 ) {
        $catevalue = array();
        
        $catevalue['main_cname'] = $this->catemodel->getRingCategoryName( $cid );
        $subparent = $this->catemodel->getparentCateID( $cid );
        $catevalue['sub_cname'] = $this->catemodel->getRingCategoryName($subparent);
        
        return $catevalue;
    }
    function output($layout = null , $data = array() ,$left='', $isleft = true , $isright = true)
    {
            $this->load->model('user');
            $data['loginlink'] = $this->user->loginhtml();
            $output = $this->load->view($this->config->item('template').'header' , $data , true);
      
            $output .= $layout;
            if($isright)$output .= $this->load->view($this->config->item('template').'right' , $data , true);
            $output .= $this->load->view($this->config->item('template').'footer', $data , true);
            $this->output->set_output($output);
    }
    
    //// get supported shape
    function getSuportedShape( $rowring ) {
        $ctstone_shape = $rowring['additional_stones']; 
	$find_ctsahpe = getCenterStoneShape($ctstone_shape);
        $suport_shape = ( !empty($ctstone_shape) ? strtoupper( implode(', ', $find_ctsahpe) ) : 'Support any shape' );
        
        return $suport_shape;
    }
    ////// get product detail
    function listingdetail($id=0, $popup='') {
        $rowsring = $this->braceletmodel->getBraceleteDetail($id);
        
        $viewSetting = '<span id="item-info"><b>Item Information</b></span>
<table id="item-tbl" class="data-table2" width="100%" cellspacing="0" cellpadding="0">
  <tbody>';
        $viewSetting .= '<tr class="first-row">
                            <th style="width:40%;color:#ff0000;font-weight:bold;">Item Code</th>
                            <td style="color:#ff0000;font-weight:bold;">'.$rowsring['item_number'].'</td>
                          </tr>';
          $viewSetting .= '<tr class="first-row">
                            <th>Stuller Category</th>
                            <td>'.$rowsring['categories'].'</td>
                          </tr>';
                      
        if( !empty($rowsring['catalog_supplement']) ) {  
          $viewSetting .= '<tr class="first-row">
                            <th>Catalog Supplement</th>
                            <td>'.$rowsring['catalog_supplement'].'</td>
                          </tr>';
        }                 
        if( !empty($rowsring['default_metal']) ) {  
          $viewSetting .= '<tr class="first-row">
                            <th>Default Metal</th>
                            <td>'.$rowsring['default_metal'].'</td>
                          </tr>';
        }                 
        if( !empty($rowsring['default_color']) ) {  
          $viewSetting .= '<tr class="first-row">
                            <th>Default Color</th>
                            <td>'.$rowsring['default_color'].'</td>
                          </tr>';
        }                 
        if( !empty($rowsring['approxi_smei_mount']) ) {  
          $viewSetting .= '<tr class="first-row">
                            <th>App. Smei Mount</th>
                            <td>'.$rowsring['approxi_smei_mount'].'</td>
                          </tr>';
        }                 
        if( !empty($rowsring['pc_casting']) ) {  
          $viewSetting .= '<tr class="first-row">
                            <th style="width:40%;">PC Casting</th>
                            <td>'.$rowsring['pc_casting'].'</td>
                          </tr>';
        }                 
        if( !empty($rowsring['MerchandisingCategory5']) ) {  
          $viewSetting .= '<tr class="first-row">
                            <th>Stone Break Down</th>
                            <td>'.$rowsring['stone_break_down'].'</td>
                          </tr>';
        }                 
        if( !empty($rowsring['diamond_cttw_provided']) ) {  
          $viewSetting .= '<tr class="first-row">
                            <th>Diamond CTTW Provided</th>
                            <td>'.$rowsring['diamond_cttw_provided'].'</td>
                          </tr>';
        }                 
        if( !empty($rowsring['diamond_quality_prices_based']) ) {  
          $viewSetting .= '<tr class="first-row">
                            <th>Diamond quality that prices are based at</th>
                            <td>'.$rowsring['diamond_quality_prices_based'].'</td>
                          </tr>';
        }                 
        if( $rowsring['gold_polished_1300'] != 'Level N/A' ) {  
          $viewSetting .= '<tr class="first-row">
                            <th>Gold Polished $1300</th>
                            <td>$ '.$rowsring['gold_polished_1300'].'</td>
                          </tr>';
        }                 
        if( $rowsring['gold_complete_1300'] != 'Level N/A' ) {  
          $viewSetting .= '<tr class="first-row">
                            <th>Gold Complete $1300</th>
                            <td>$ '.$rowsring['gold_complete_1300'].'</td>
                          </tr>';
        }                 
        if( $rowsring['gold_semi_mount_1300'] != 'Level N/A' ) {  
          $viewSetting .= '<tr class="first-row">
                            <th>Gold Semi Mount $1300</th>
                            <td>$ '.$rowsring['gold_semi_mount_1300'].'</td>
                          </tr>';
        }
        
        if( $rowsring['gold_polished_1700'] != 'Level N/A' ) {  
          $viewSetting .= '<tr class="first-row">
                            <th>Gold Polished $1700</th>
                            <td>$ '.$rowsring['gold_polished_1700'].'</td>
                          </tr>';
        }                 
        if( $rowsring['gold_complete_1700'] != 'Level N/A' ) {  
          $viewSetting .= '<tr class="first-row">
                            <th>Gold Complete $1700</th>
                            <td>$ '.$rowsring['gold_complete_1700'].'</td>
                          </tr>';
        }                 
        if( $rowsring['gold_semi_mount_1700'] != 'Level N/A' ) {  
          $viewSetting .= '<tr class="first-row">
                            <th>Gold Semi Mount $1700</th>
                            <td>$ '.$rowsring['gold_semi_mount_1700'].'</td>
                          </tr>';
        }
     
 $viewSetting .= '</tbody></table>';
 
        if( empty($popup) ) {
            echo $viewSetting;
        } else {
            return $viewSetting;
        }
        
    }
    
    /// get bracelete image
    function getBraceletImage($rows=  array()) {
        $item_no = explode('-', $rows['item_number']);
        
        return SITE_URL . 'bracelet_img/images/'.$item_no[0].'.jpg';
    }
    function bracelet_title($rows=array()) {
      return $rows['diamond_cttw_provided'].' '.$rows['default_metal'].' '.$rows['default_color'].' Bracelet '.$rows['stone_break_down'];  
    }
    //// product popup detail
    function bracelet_popup_detail($id=0) {
       $data = $this->getCommonData();
       $rowsring = $this->braceletmodel->getBraceleteDetail($id);
       $data['ringimg'] = $this->getBraceletImage($rowsring);
        
       $data['title'] = $this->bracelet_title( $rowsring );
       $data['listings_detail'] = $this->listingdetail( $id, 'popup' );
       $data['ring_title'] = $data['title'];
       $data['rings_thumb'] = $this->getProductThumb( $rowsring, 'popup' );
       $data['rowsring']   = $rowsring;
       $data['retail_price']  = $rowsring['gold_polished_1300'] * PRICE_PERCENT;  //// PRICE_PERCENT : 3.5
       $data['salesprice'] = $rowsring['gold_polished_1300'];
       $data['saving_percent'] = ( 100 - ( ( $data['salesprice'] / $data['retail_price'] ) * 100 ) );
       
       $this->load->view('bracelet_pages/bracelet_popup_detail', $data);
        //$this->output($output, $data);
        
    }
}
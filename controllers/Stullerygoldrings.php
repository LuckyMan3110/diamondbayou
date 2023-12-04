<?php
class Stullerygoldrings extends CI_Controller {
    function __construct(){
            parent::__construct();
            $this->load->model('jewelrymodel');
            $this->load->model('diamondmodel');
            $this->load->model('engagementmodel');
            $this->load->model('qualitymodel');
            $this->load->helper('ringsection');
            $this->session->unset_userdata('whsale_section');
    }	
    function index()
    {
        $data = $this->getCommonData(); 
        $data['title'] = 'Jewelry';
        $output = $this->load->view('jewelry/index' , $data , true);
        $this->output($output , $data);		
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
		
        $data['title'] = 'Stuller Gold Rings';
    
       $this->load->view('engagementringstrial/left_reviews_page' , $data);
    }
    
    ///// category listings
    function stuller_ring_listings($category_id=0, $start=0) 
     {
        //parse_str(substr(strrchr($_SERVER['REQUEST_URI'], "?"), 1), $_GET);
        
        $data = $this->getCommonData(); 
        
        $ringsCate = $this->input->get('cate'); //get_var('cate');
        $ringCate = ( !empty($ringsCate) ? $ringsCate : 1 );
        $data['ringsCate'] = resetsSlugTitle($ringCate);
        $perpage = $this->input->get('pagelist');
        $perpage_no = $this->input->get('per_page');
        $sort = $this->input->get('sort');
        $metal_val = check_empty( $this->input->get('metal'), '' );
        $metal_value = ( !empty($metal_val) ? urldecode($metal_val) : '' );
        $sort_option =  ( ( isset($sort) && !empty($sort) ) ? $sort : 'ASC' );
        
        $config["per_page"] = ( $perpage > 0 ? $perpage : 20 );
        $config["num_links"] = 5;
        $config["uri_segment"] = 5;
        $config['use_page_numbers'] = TRUE;
        $startFrom = ( $perpage_no > 0 ? ( ( $perpage_no - 1 ) * $config["per_page"] ) : 0 );        
        $start_from =  ( $startFrom > 0 ? $startFrom : 1 );
        $ringresults = $this->qualitymodel->stullerGoldRings($data['ringsCate'], $startFrom, $config["per_page"], '', '', $metal_value, $sort_option);
        
        $config["total_rows"] = $ringresults['total'];
        $baseLink = SITE_URL.'stullerygoldrings/stuller_ring_listings/?cate='.$ringCate.'&sort='.$sort_option;
	$config["base_url"]   = $baseLink.'&pagelist='.$config["per_page"].'&metal='.$metal_value;
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><a class="active" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        
        $data['page_numb_hint'] = page_number_hint($config["per_page"], $ringresults['total'], $start_from); // custome helper
        
        $data['similar_products'] = $this->ringSimilarItems($data['ringsCate'], '', 6, 'listings');
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
            $optionList .= '<option value="'.$sort_link.$sorting.'" '.selectedOption($sorting, $sort_option).'>'.$sort_value.'</option>';
        }
        
        $results_metal = $this->qualitymodel->stullerMetalList( $data['ringsCate'] );
        $metal_link = $sort_link.$sort_option;
        $metal_list = '<option value="'.$metal_link.'&metal=">Select Metal</option>';
        
        foreach( $results_metal as $rowmetal ) {
           $metal_list .= '<option value="'.$metal_link.'&metal='.urlencode( $rowmetal['metal'] ).'" '.selectedOption($rowmetal['metal'], $metal_value).'>'.$rowmetal['metal'].'</option>';
        }
        
        $this->pagination->initialize($config); ///// initializ the pagination        
        $data['page_options']   = $options;
        $data['sorting_option'] = $optionList;
        $data['rings_metal']    = $metal_list;
        $data['page_links']     = $this->pagination->create_links();
        
        $data['ring_listings'] = $this->stuller_ring_lisitngs_view($ringresults['results']);
        //$cate_name = $this->qualitymodel->getCateName( $category_id );
        $data['cate_name'] = $this->product_cate_list_link( $category_id );
        //$data['product_reviews'] = file_get_contents(SITE_URL.'stullerygoldrings/productReviews'); //left_menu_reviews(); 
        $data['title'] = ( $data['ringsCate'] != 1 ? $data['ringsCate'] : 'hearts and diamond Gold Rings' );
        
         $data['meta_tags']  = '
<meta http-equiv="Content-Type" content="text/html; iso-8859-1">
<meta name="title" content="Loose Diamonds,Engagement Rings, Design Your Own Ring, Cheap Diamonds Ideal Scope, Customize Rings - Engagement Rings, '.$data['title'].' ">
<meta name="ROBOTS" content="INDEX,FOLLOW">
<meta name="description" content="Offers Loose Diamonds,Design Your Own Ring,Ideal Scope, Loose Diamond, Engagement Rings, Cheap Diamonds, Customize Rings,Diamond Tutorial, Diamond rings, Cheap Diamonds, Ideal Scope, Diamond district, Diamond Rings, Wholesale Diamonds, Estate Jewelry, Custom Engagement Rings, '.$data['title'].'">
<meta name="abstract" content="Diamond Rings, Wholesale Diamonds, Estate Jewelry, Custom Engagement Rings, New York, Chicago, California, Boston, Las Vegas, Columbia, Montgomery, '.$data['title'].'">
<meta name="keywords" content="diamonds, Loose diamonds, engagement ring usa, colored diamonds, engagement diamonds ring, wholesal diamond, diamond district, Diamond Rings, Wholesale Diamonds, Estate Jewelry, custom engagement rings, diamond ring usa, engagement rings diamond, '.$data['title'].'">
<meta name="author" content="'.get_site_contact_info('sites_title').'">
<meta name="publisher" content="'.get_site_contact_info('sites_title').'">
<meta name="copyright" content="'.get_site_contact_info('sites_title').'">
<meta http-equiv="Reply-to" content="">
<meta name="creation_Date" content="12/12/2008">
<meta name="expires" content="">
<meta name="revisit-after" content="7 days">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">';
        
        $output = $this->load->view('engagementringstrial/stuller_listing_view' , $data , true);
        $this->output($output, $data);
    }
    
    //// get main and parent category name list
   function product_cate_list_link($catename='') {
       $cate_name = '<li><a href="' . SITE_URL . 'stullerygoldrings/stuller_ring_listings/?cate=1" alt="Stuller Gold Rings">Stuller Gold Rings</a></li>';
       $cate_name .= '<li><a href="'.SITE_URL.'stullerygoldrings/stuller_ring_listings/?cate='.setSlugTitle($catename).'">'.$catename.'</a></li>';
        
        $catelink['category_link'] = $cate_name;
        $catelink['category_name'] = $catename;
        
        return $catelink;
   }
    ///// product detail page
    function stuller_ring_detail($product_id=0) {
        $data = $this->getCommonData();
        
        $data['onload_class'] = 'catalog-product-view product-14k-gold-diamond-three-stone-engagement-ring-set-128c-p-24728 categorypath-diamond-engagement-rings-wholesale-preset-gold-diamond-engagement-rings-aspx category-diamond-engagement-rings-wholesale-preset-gold-diamond-engagement-rings';
        
        //$this->load->view('engagementringstrial/engagement_rings_details', $data);
        //$metal = '';
        //$rngsize = '';
        $ring_size = $this->input->get('ring_size');
        $get_ring_size = ( !empty($ring_size) ? $ring_size : 'NA' );
        $rsize_price = $this->catemodel->getFingerSizePrice( $ring_size );
        $data['set_ring_size'] = resetsSlugTitle($get_ring_size);
        
        $rowsring = $this->qualitymodel->stullerRingsDetail($product_id); //print_ar($rowsring);
        $ctstone_shape = $rowsring['additional_stones']; 
	$find_ctsahpe = getCenterStoneShape($ctstone_shape);
        $data['suport_shape'] = ( !empty($ctstone_shape) ? strtoupper( implode(', ', $find_ctsahpe) ) : 'Support any shape' );
        $data['buildring'] = $this->session->userdata('buildring');
        $data['rowsring'] = $rowsring;
        $priceMargin = $this->commonmodel->inventoryPriceMargin($rowsring['stuller_cate'], STULLER_OPTION);
        $rowsring['Price'] = $rowsring['Price'] * $priceMargin;
        
        $data['sales_price'] = $rowsring['Price'] + $rsize_price;
        $data['retail_price'] = $data['sales_price'] * PRICE_PERCENT;
        $data['saving_percent'] = ( 100 - ( ( $data['sales_price'] / $data['retail_price'] ) * 100 ) );
        $data['buynow_link'] = htmlspecialchars(SITE_URL.'jewelleries/addtoshoppingcart/');
        $data['item_desc'] = get_site_title().' stunning '.$rowsring['Description'] . ' <br>can be yours for <span id="viewDyPrice">$'._nf($rowsring['Price'], 2).'</span>.';
        
        $cate = $rowsring['stuller_cate'];
        
        $data['ringtitle'] = $rowsring['Description'];		
        $data['title'] = $data['ringtitle'];
        $data['ringimg']   = getStullerImage($rowsring);
        $data['setingtype']   = $cate['sub_cname'];
        $data['maincate_name'] = $cate['main_cname'];
        $data['subcate_link'] = $this->product_cate_list_link( $rowsring['stuller_cate'] );
        //$data['sales_price'] = $rowsring['Price'];
        $data['stuller_link'] = 'stullerygoldrings/stuller_ring_detail/'.$product_id.'/?cate=1';
        //$data['check_rings_cate'] = strchr($rowsring['stuller_cate'], 'Ring');
        
        $data['similar_items'] = $this->ringSimilarItems($rowsring['stuller_cate'], $product_id);
        $data['similar_products'] = $this->ringSimilarItems($rowsring['stuller_cate'], $product_id, 4);
        $data['popular_listings'] = $this->popularListings($rowsring['stuller_cate'], $product_id, 4);
        $data['more_stuller_listings'] = $this->popularListings($rowsring['stuller_cate'], $product_id, 4);
        ////// get user comments
	    $data['view_coments'] = $this->getProductReviews( $product_id );
        
        $data['extra_headers'] = '';
        
        $data['extra_headers'] .= '<script language="javascript" src="'.SITE_URL.'js/jquery.popup.js" type="text/javascript"></script>';
        $ringresults = $this->catemodel->getFingerSizeResult();
        $base_link = SITE_URL.'stullerygoldrings/stuller_ring_detail/'.$product_id.'/';
        $finger_size = '<option value="'.$base_link.'?ring_size=">Select Finger Size</option>';
        
        if( count($ringresults) > 0 ) {
            foreach( $ringresults as $rowsize ) {
                $rgsz = setRingSize($rowsize['ring_size']);
                $finger_size .= '<option value="'.$base_link.'?ring_size='.$rgsz.'" '.selectedOption($rgsz, $ring_size).'>'.$rowsize['ring_size'].'</option>';
            }
        }
        
        $data['finger_ring_size'] = $finger_size;
        ////// item thumbs
        $data['rings_thumb'] = $this->getProductThumb( $rowsring );
        //$data['suported_shapes'] = $this->getDimaondShapeImage( $rowsring );  /// get supplied stones shapes
        
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
        
        $output = $this->load->view('engagementringstrial/stullering_detail_view' , $data , true);
        $this->output($output, $data);
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
        $getRingsThumb = '';
        $thumblist = array();
        
	$thumsList = ( !empty($rowaray['Images']) ? json_decode($rowaray['Images']) : json_decode($rowaray['GroupImages']) );
        $ttThumbs  = count($thumsList);
        $itemTitle = $rowaray['Description']; //cleanString($rowaray['Description']);
        
        if( count($thumsList) > 0 ) {
            $s = 1;
        foreach ($thumsList as $sthumb) {  /// $st: stuller thumb
                    if( $ttThumbs >= 10 ) { 
                        if( $s % 2 == 0 ) {
                            $thumblist[] = array( 'view_image'=> $sthumb->ZoomUrl, 'thumbs' => $sthumb->ThumbnailUrl );
                        }
                    } else {
                        $thumblist[] = array( 'view_image'=> $sthumb->ZoomUrl, 'thumbs' => $sthumb->ThumbnailUrl );   
                    }

                   $s++;
                }
            } else {
              $thumblist[] = array( 'view_image'=> $rowaray['Image1'], 'thumbs' => $rowaray['Image1'] );
            }
        
        if( count($thumblist) > 0) {
            foreach( $thumblist as $rowthumb ) {
               if( empty($popup) ) {
                   $getRingsThumb .= '<div class="smalimgview"><a href="#javascript;" onclick="ringThumbView(\''.$rowthumb['view_image'].'\')">
			<img src="'.$rowthumb['thumbs'].'" alt="'.$itemTitle.'"></a></div>';
               } else {
                   $getRingsThumb .= '<li><a href="javascript://" onclick="imageshow(\''.$rowthumb['view_image'].'\');" title="'.$itemTitle.'"><img src="'.$rowthumb['thumbs'].'" width="31" alt="'.$itemTitle.'"></a> </li>';
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
        
        $rowsring = $this->qualitymodel->stullerGoldRings($ring_cateid, 0, $limit, $listing, $prod_id);
                
        $similar_rings = '';
        $str = 150;
        
        if( count($rowsring['results']) > 0 ) {
            foreach( $rowsring['results'] as $rowring ) {
               $sid = $rowring['stuller_id'];
               
               $priceMargin = $this->commonmodel->inventoryPriceMargin($rowring['stuller_cate'], STULLER_OPTION);
               $rowring['Price'] = $rowring['Price'] * $priceMargin;
               
               $detaiLink = SITE_URL . 'stullerygoldrings/stuller_ring_detail/' . $sid;
               $ringImageLink = getStullerImage($rowring);
               $retail_price  = $rowring['Price'] * PRICE_PERCENT;  //// PRICE_PERCENT : 3.5
               $ring_ourprice = $rowring['Price'];
               $saving_percent = ( 100 - ( ( $ring_ourprice / $retail_price ) * 100 ) );
               $popupLink = SITE_URL . 'stullerygoldrings/stuller_popup_detail/'.$sid . '/?keepThis=true&TB_iframe=true&width=800&height=550&modal=false';
               $ringBoxDesc = cleanString($rowring['Description']);
               $stullerTitle = ( strlen($ringBoxDesc) > $str ? substr($ringBoxDesc, $str).'...' : $ringBoxDesc );
               $ring_title = wordwrap($stullerTitle,25,"<br>\n");
               
            if( empty($listing) ) {
               $similar_rings .= '<div class="prdSection col-sm-3" id="'.$sid.'">
                                    <a href="'.$detaiLink.'" class="alsoviwed-product-img">
                                            <img class="" src="'.$ringImageLink.'" width="200" alt="'.$ring_title.'" title="'.$ring_title.'" style="display: inline;">
                                    </a><br><br>
                                    <a class="prdName" title="'.$ring_title.'" href="'.$detaiLink.'">'.$ring_title.'</a>
                                    <div class="price-box">
                                            <p class="old-price"><span>Retail Price:</span>
                                            <span style="text-decoration: line-through;"> $'._nf($retail_price, 2).'</span></p>
                                            <p class="our-price"><span>Our Price:</span><span> $'._nf($ring_ourprice, 2).'</span><br>
                                <span><img src="'.SITE_URL.'demo_retail/images/logo-getfinancing.png" width="150" alt="logo-getfinancing"/></span></p>
                                            <!-- <a class="viewItem" href="">View Item</a> -->
                                    </div>
				</div>'; 
                } else {
                   $similar_rings .= '<li class="item first">
			<div class="product-grid-quick" onmouseover="showTopQuickView('.$sid.');" onmouseout="hideTopQuickView('.$sid.');" style="overflow:hidden;">
				<a title="'.$ring_title.'" href="'.$detaiLink.'"><img alt="'.$ring_title.'" class="" src="'.$ringImageLink.'" width="200" style="display: inline;"></a>
				<h2 class="product-name"><a title="'.$ring_title.'" href="'.$detaiLink.'">'.$ring_title.'</a></h2>
				<div class="price-box">
				<div id="top-quickview'.$sid.'" class="ring_bk_setting" style="display: none; position: relative;">
					<a href="Javascript:;" onclick="show_quick_view(\''.$popupLink.'\', \'Quick View\', \'nofollow\');" title="Quick View'.$ring_title.'" class="quick-view thickbox" rel="nofollow"><span>Quick View</span></a>
				</div>
                                
                                    <p class="old-price"><span class="price-label">Retail Price:</span> 
                                    <span id="old-price-802865" class="price">$'._nf($retail_price, 2).'</span></p>
				<p class="our-price"><span class="price-label">Our Price:</span> 
                                <span id="product-price-'.$sid.'">$'._nf($ring_ourprice, 2).'</span><br>
                                <span><img src="'.SITE_URL.'demo_retail/images/logo-getfinancing.png" width="150" alt="logo-getfinancing"/></span>
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
        
        $rowsring = $this->qualitymodel->stullerGoldRings($ring_cateid, 0, $limit, $listing, $prod_id);
        
        $similar_rings = '';
        $str = 150;
        
        if( count($rowsring['results']) > 0 ) {
            foreach( $rowsring['results'] as $rowring ) {
               $sid = $rowring['stuller_id'];
               
               $detaiLink = SITE_URL . 'stullerygoldrings/stuller_ring_detail/' . $sid;
               
               $priceMargin = $this->commonmodel->inventoryPriceMargin($rowring['stuller_cate'], STULLER_OPTION);
               $rowring['Price'] = $rowring['Price'] * $priceMargin;
               
               $ringImageLink = getStullerImage($rowring);
               $retail_price  = $rowring['Price'] * PRICE_PERCENT;  //// PRICE_PERCENT : 3.5
               $ring_ourprice = $rowring['Price'];
               $saving_percent = ( 100 - ( ( $ring_ourprice / $retail_price ) * 100 ) );
               $popupLink = SITE_URL . 'stullerygoldrings/stuller_popup_detail/'.$sid . '/?keepThis=true&TB_iframe=true&width=800&height=550&modal=false';
               $ringBoxDesc = $rowring['Description'];
               $stullerTitle = ( strlen($ringBoxDesc) > $str ? substr($ringBoxDesc, $str).'...' : $ringBoxDesc );
               $ring_title = wordwrap($stullerTitle,25,"<br>\n");
               $detailDesc = $rowring['SearchFilterValue1']. ' Metal '. $rowring['SearchFilterValue2'].' '. $rowring['SearchFilterValue3'].' '.$rowring['ProductType'];
               
            $similar_rings .= '<div class="product_colsbk col-sm-3">
                <div class="productRingImg"><a href="'.$detaiLink.'"><img src="'.$ringImageLink.'" width="200" height="153" alt="'.$stullerTitle.'"></a></div>
                        <div><img src="'.IMGSRC_LINK.'rating_icon.jpg" alt="rating_icon"><span class="reviewlabel">(86 Review)</span></div><br>
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
    function stuller_ring_lisitngs_view( $results = array()) {
        $ringlistings = '';
        $str = 150;
        
        if( count($results) > 0 ) {
            foreach( $results as $rowrings ) {
                $ringDetail = SITE_URL . 'stullerygoldrings/stuller_ring_detail/' . $rowrings['stuller_id'];
                $ringsImg = getStullerImage($rowrings);
                $ringBoxDesc = cleanString($rowrings['Description']);
                $ringTitle = ( strlen($ringBoxDesc) > $str ? substr($ringBoxDesc, $str).'...' : $ringBoxDesc );
                $priceMargin = $this->commonmodel->inventoryPriceMargin($rowrings['stuller_cate'], STULLER_OPTION);
                $rowrings['Price'] = $rowrings['Price'] * $priceMargin;
                
                $retailPrice = _nf($rowrings['Price'] * PRICE_PERCENT, 2);
                $ourPrice = _nf($rowrings['Price'], 2);
                $rid = $rowrings['stuller_id'];
                
                $popupLink = SITE_URL . 'stullerygoldrings/stuller_popup_detail/' . $rid . '/?keepThis=true&TB_iframe=true&width=800&height=550&modal=false';
                
                $ringlistings .= '<li class="item" data-url="'.$ringDetail.'">
      <div class="product-grid-quick" onmouseover="showQuickView('.$rid.');" onmouseout="hideQuickView('.$rid.');" style="overflow:hidden;">
        <div class="product-image"><a class="product-labels" href="'.$ringDetail.'" title="'.$ringTitle.'">
        	
        	<img class="" src="'.$ringsImg.'" itemprop="image" alt="'.$ringTitle.'" style="display: inline;"></a></div>
        	
		<h3><a href="'.$ringDetail.'" title="'.$ringTitle.'"> <span>' .  $ringTitle . '</span></a></h3>
          
    <div class="price-box">
        <div id="quickview'.$rid.'" class="ring_bk_setting" style="display: none;"> 
        	<a href="Javascript:;" onclick="show_quick_view(\''.$popupLink.'\',\'Quick View\',\'nofollow\');" title="'.$ringTitle.'" class="quick-view thickbox" rel="nofollow"><span>Quick View</span></a>
        </div>                        
                    <p class="old-price">
                <span class="price-label">Retail Price:</span>
                <span class="price" id="old-price-'.$rid.'">
                    $'.$retailPrice.'                </span>
            </p>
                        <p class="our-price">
                <span class="price-label">Our Price:</span>
                <span id="product-price-'.$rid.'">
                    $'.$ourPrice.'                </span><br>
                <span><img src="'.SITE_URL.'demo_retail/images/logo-getfinancing.png" width="150" alt="logo-getfinancing"/></span>
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
    
    //// get ring title
    function getRingTitle($rowring=array()) {
        $cate   = $this->getCateName( $rowring['catid'] );         
        $rtitle = $rowring['matalType'].' '.$cate['main_cname'].' Cut Diamond Unique Engagement Ring '.$rowring['stone_weight'].' '.$cate['sub_cname'] .' Style';
        
        return $rtitle;
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
        $rowsring = $this->qualitymodel->stullerRingsDetail($id);
        
        $viewSetting = '<span id="item-info"><b>Item Information</b></span>
<table id="item-tbl" class="data-table2" width="100%" cellspacing="0" cellpadding="0">
  <tbody>';
        $viewSetting .= '<tr class="first-row">
                            <th style="width:40%;color:#ff0000;font-weight:bold;">Item Code</th>
                            <td style="color:#ff0000;font-weight:bold;">'.$rowsring['Sku'].'</td>
                          </tr>';
          $viewSetting .= '<tr class="first-row">
                            <th>Stuller Category</th>
                            <td>'.$rowsring['stuller_cate'].'</td>
                          </tr>';
                      
        if( !empty($rowsring['GroupDescription']) ) {  
          $viewSetting .= '<tr class="first-row">
                            <th>Group Description</th>
                            <td>'.$rowsring['GroupDescription'].'</td>
                          </tr>';
        }                 
        if( !empty($rowsring['MerchandisingCategory1']) ) {  
          $viewSetting .= '<tr class="first-row">
                            <th>Category1</th>
                            <td>'.$rowsring['MerchandisingCategory1'].'</td>
                          </tr>';
        }                 
        if( !empty($rowsring['MerchandisingCategory2']) ) {  
          $viewSetting .= '<tr class="first-row">
                            <th>Category2</th>
                            <td>'.$rowsring['MerchandisingCategory2'].'</td>
                          </tr>';
        }                 
        if( !empty($rowsring['MerchandisingCategory3']) ) {  
          $viewSetting .= '<tr class="first-row">
                            <th>Category3</th>
                            <td>'.$rowsring['MerchandisingCategory3'].'</td>
                          </tr>';
        }                 
        if( !empty($rowsring['MerchandisingCategory4']) ) {  
          $viewSetting .= '<tr class="first-row">
                            <th style="width:40%;">Category4</th>
                            <td>'.$rowsring['MerchandisingCategory4'].'</td>
                          </tr>';
        }                 
        if( !empty($rowsring['MerchandisingCategory5']) ) {  
          $viewSetting .= '<tr class="first-row">
                            <th>Category4</th>
                            <td>'.$rowsring['MerchandisingCategory5'].'</td>
                          </tr>';
        }                 
        if( !empty($rowsring['Weight']) ) {  
          $viewSetting .= '<tr class="first-row">
                            <th>Weight</th>
                            <td>'.$rowsring['Weight'].'</td>
                          </tr>';
        }                 
        if( !empty($rowsring['Status']) ) {  
          $viewSetting .= '<tr class="first-row">
                            <th>Status</th>
                            <td>'.$rowsring['Status'].'</td>
                          </tr>';
        }                 
        if( !empty($rowsring['GramWeight']) ) {  
          $viewSetting .= '<tr class="first-row">
                            <th>Gram Weight</th>
                            <td>'.$rowsring['GramWeight'].'</td>
                          </tr>';
        }                 
        if( !empty($rowsring['AGTA']) ) {  
          $viewSetting .= '<tr class="first-row">
                            <th>AGTA</th>
                            <td>'.$rowsring['AGTA'].'</td>
                          </tr>';
        }                 
        if( !empty($rowsring['DescriptiveElementGroup']) ) {  
          $viewSetting .= '<tr class="first-row">
                            <th>Desc. Element Group</th>
                            <td>'.$rowsring['DescriptiveElementGroup'].'</td>
                          </tr>';
        }
        for($r=1; $r<=15; $r++) {
            if( !empty($rowsring['DescriptiveElementName'.$r]) ) {  
              $viewSetting .= '<tr class="first-row">
                                <th>'.$rowsring['DescriptiveElementName'.$r].'</th>
                                <td>'.$rowsring['DescriptiveElementValue'.$r].'</td>
                              </tr>';
            } 
        }
        for($s=1; $s<=6; $s++) {
            if( !empty($rowsring['SearchFilterName'.$s]) ) {  
              $viewSetting .= '<tr class="first-row">
                                <th>'.$rowsring['SearchFilterName'.$s].'</th>
                                <td>'.$rowsring['SearchFilterValue'.$s].'</td>
                              </tr>';
            } 
        }
        if( !empty($rowsring['CountryOfOrgin']) ) {  
          $viewSetting .= '<tr class="first-row">
                            <th>Country of Orignin</th>
                            <td>'.$rowsring['CountryOfOrgin'].'</td>
                          </tr>';
        }                 
        if( !empty($rowsring['CreationDate']) ) {  
          $viewSetting .= '<tr class="first-row">
                            <th>Creation Date</th>
                            <td>'.$rowsring['CreationDate'].'</td>
                          </tr>';
        }                 
        if( !empty($rowsring['LeadTime']) ) {  
          $viewSetting .= '<tr class="first-row">
                            <th>Lead Time</th>
                            <td>'.$rowsring['LeadTime'].'</td>
                          </tr>';
        }
     
 $viewSetting .= '</tbody></table>';
 
        if( empty($popup) ) {
            echo $viewSetting;
        } else {
            return $viewSetting;
        }
        
    }
    //// product popup detail
    function stuller_popup_detail($id=0) {
       $data = $this->getCommonData();
       $rowsring = $this->qualitymodel->stullerRingsDetail($id);
       $data['ringimg'] = getStullerImage($rowsring);
        
       $data['title'] = $rowsring['Description'];
       $data['listings_detail'] = $this->listingdetail( $id, 'popup' );
       $data['ring_title'] = $rowsring['Description'];
       $data['rings_thumb'] = $this->getProductThumb( $rowsring, 'popup' );
       $data['rowsring']   = $rowsring;
       $data['retail_price']  = $rowsring['Price'] * PRICE_PERCENT;  //// PRICE_PERCENT : 3.5
       $data['salesprice'] = $rowsring['Price'];
       $data['saving_percent'] = ( 100 - ( ( $data['salesprice'] / $data['retail_price'] ) * 100 ) );
       
       $this->load->view('engagementringstrial/stuller_ring_popup_detail', $data);
        //$this->output($output, $data);
        
    }
}
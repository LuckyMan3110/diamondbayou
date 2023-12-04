<?php
class Qualitygoldrings extends CI_Controller {
    function __construct(){
            parent::__construct();
            $this->load->model('jewelrymodel');
            $this->load->model('diamondmodel');
            $this->load->model('engagementmodel');
            $this->load->model('qualitymodel');
            $this->load->helper('ringsection');
            $this->session->unset_userdata('whsale_section');
            
            $phone_from_admin = get_site_contact_info('contact_info'); 
            define('CONTACT_NO', $phone_from_admin);
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
    function qualitycate($cates_id = 40) {
        $data = $this->getCommonData();
        
        //$cates_id = 40;
        
        $data['ring_categoies'] = $this->category_cols_list_view($cates_id);
        $rings_cate = array(281, 283, 283, 284, 285);
        
        $cateid_list = array_rand( $rings_cate, 4 );
        $setcateid = $rings_cate[$cateid_list[0]];
        $data['bread_crumb_link'] = $this->cate_break_crumb($cates_id);
        $cateTitle = $this->qualitymodel->getCateName( $cates_id );
        
        $data['category_title'] = cate_title_set($cates_id, $cateTitle['title']);
        
        $data['similar_products']   = $this->ringSimilarItems($setcateid, '', 6, 'listings');
        $data['cate_name']          = $this->qualitymodel->getCateName( $cates_id );
        $data['title']              = $data['category_title']['cate_title'];

        $data['meta_tags']  = '
<meta http-equiv="Content-Type" content="text/html; iso-8859-1">
<meta name="title" content="Loose Diamonds,Engagement Rings, Design Your Own Ring, Cheap Diamonds Ideal Scope, Customize Rings - Engagement Rings, '.$data['title'].' ">
<meta name="ROBOTS" content="INDEX,FOLLOW">
<meta name="description" content="Offers Loose Diamonds,Design Your Own Ring,Ideal Scope, Loose Diamond, Engagement Rings, Cheap Diamonds, Customize Rings,Diamond Tutorial, Diamond rings, Cheap Diamonds, Ideal Scope, Diamond district, Diamond Rings, Wholesale Diamonds, Estate Jewelry, Custom Engagement Rings, '.$data['category_title']['cate_title'].'">
<meta name="abstract" content="Diamond Rings, Wholesale Diamonds, Estate Jewelry, Custom Engagement Rings, New York, Chicago, California, Boston, Las Vegas, Columbia, Montgomery, '.$data['title'].'">
<meta name="keywords" content="diamonds, Loose diamonds, engagement ring usa, colored diamonds, engagement diamonds ring, wholesal diamond, diamond district, Diamond Rings, Wholesale Diamonds, Estate Jewelry, custom engagement rings, diamond ring usa, engagement rings diamond, '.$data['category_title']['cate_title'].'">
<meta name="author" content="'.get_site_contact_info('sites_title').'">
<meta name="publisher" content="'.get_site_contact_info('sites_title').'">
<meta name="copyright" content="'.get_site_contact_info('sites_title').'">
<meta http-equiv="Reply-to" content="">
<meta name="creation_Date" content="12/12/2008">
<meta name="expires" content="">
<meta name="revisit-after" content="7 days">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">';
        
        
        $data['bread_crumb_link'] = $this->cate_break_crumb($cates_id);
        
        if( $data['ring_categoies'] != 'false' ) {
            $output = $this->load->view('engagementringstrial/quality_ring_cate' , $data , true);
            $this->output($output, $data);
        } else {
            header('Location:' . SITE_URL . 'qualitygoldrings/quality_ring_listings/' . $cates_id);
        }
    }
    
    function cate_break_crumb($cates_id=0) {
        $rowcate    = $this->qualitymodel->getCateName( $cates_id ); //print_ar($rowcate);
        $rowcate1    = $this->qualitymodel->getCateName( $rowcate['pid'] );
        $rowcate2    = $this->qualitymodel->getCateName( $rowcate1['pid'] );
        $rowcate3    = $this->qualitymodel->getCateName( $rowcate2['pid'] );
        $rowcate4    = $this->qualitymodel->getCateName( $rowcate3['pid'] );
        $rowcate5    = $this->qualitymodel->getCateName( $rowcate5['pid'] );
        
        $bread_crumb = '';
        $bread_crumb .= $this->breadCrumbLink( $rowcate5 );
        $bread_crumb .= $this->breadCrumbLink( $rowcate4 );
        $bread_crumb .= $this->breadCrumbLink( $rowcate3 );
        $bread_crumb .= $this->breadCrumbLink( $rowcate2 );
        $bread_crumb .= $this->breadCrumbLink( $rowcate1 );
        $bread_crumb .= $this->breadCrumbLink( $rowcate );
        
        
        return $bread_crumb;
    }
    
    function breadCrumbLink($rowcate=array()) {
        $not_allow = array('Collections', 'Branded Collections', 'Majestik');
        $cate_bread_link = '';
        
        if( !empty($rowcate['title']) && !in_array($rowcate['title'], $not_allow) ) {
            $cate_title = cate_title_set($rowcate['id'], $rowcate['title']);
            $cate_bread_link = '<li> <a href="'.SITE_URL.'qualitygoldrings/qualitycate/'.$rowcate['id'].'" title="'.$rowcate['title'].'">'.$cate_title['cate_title'].'</a> </li> > ';
        }
        
        return $cate_bread_link;
    }
    ///// category listings
    function quality_ring_listings($category_id=0, $start=0) {
        $data = $this->getCommonData(); 
		
        $data['title'] = ( $category_id == 84 ? 'Diamonds' : 'Engagement Rings' );
        $data['cate_title'] = cate_title_set($category_id);
        $perpage = $this->input->get('pagelist');
        $perpage_no = $this->input->get('per_page');
        $sort = $this->input->get('sort');
        $metal_val = check_empty( $this->input->get('metal'), '' );
        $metal_value = ( !empty($metal_val) ? urldecode($metal_val) : '' );
        $sort_option =  ( ( isset($sort) && !empty($sort) ) ? $sort : 'ASC' );
        
        $config["per_page"] = ( $perpage > 0 ? $perpage : 20 );
        $config["num_links"] = 50;
        $config["uri_segment"] = 15;
        $config['use_page_numbers'] = TRUE;        
        $startFrom = ( $perpage_no > 0 ? ( ( $perpage_no - 1 ) * $config["per_page"] ) : 0 );        
        $start_from =  ( $startFrom > 0 ? $startFrom : 1 );
        
        $ringresults = $this->qualitymodel->qualityGoldProdList($category_id, $startFrom, $config["per_page"], $metal_value, $sort_option);
        $config["total_rows"] = $ringresults['total'];
        $baseLink = SITE_URL.'qualitygoldrings/quality_ring_listings/'.$category_id.'/?sort='.$sort_option;
	$config["base_url"]   = $baseLink.'&pagelist='.$config["per_page"].'&metal='.$metal_value;
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><a class="active" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $data['page_numb_hint'] = page_number_hint($config["per_page"], $ringresults['total'], $start_from); // custome helper
        
        $options = '';  
        $page_link = $baseLink; //( !empty( $perpage_no ) ? $baseLink.'&per_page='.$perpage_no : $baseLink);
        
            for( $page=10; $page <= 50; $page+=10 ) {
                $options .= '<option value="'.$page_link.'&pagelist='.$page.'" '.selectedOption($page,$config["per_page"]).'>'.$page.'</option>';
            }
        ///// sort options
        $sort_list = array('ASC' => 'Lowest Price', 'DESC' => 'Highest Price', 'Name' => 'Name');
        $sort_link = $page_link.'?per_page='.$config["per_page"].'&sort=';
        $optionList = '';
        
        foreach( $sort_list as $sorting => $sort_value ) {
            $optionList .= '<option value="'.$sort_link.$sorting.'" '.selectedOption($sorting, $sort_option).'>'.$sort_value.'</option>';
        }
        
        $results_metal = $this->qualitymodel->qualityMetalViaCate( $category_id );
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
        
        $data['similar_products'] = $this->ringSimilarItems($category_id, '', 6, 'listings');
        
        $data['ring_listings'] = $this->quality_ring_lisitngs_view($ringresults['results']);
        //$cate_name = $this->qualitymodel->getCateName( $category_id );
        $data['cate_name'] = $this->product_cate_list_link( $category_id );
        $data['category_link'] = $this->cate_break_crumb( $category_id );
        $data['title'] = $data['cate_name']['category_name'];
        
        $output = $this->load->view('engagementringstrial/qualityring_listing_view' , $data , true);
        $this->output($output, $data);
    }
    
    //// get main and parent category name list
   function product_cate_list_link($cid=0) {
       $cate_name = '<li><a href="' . SITE_URL . 'qualitygoldrings/qualitycate/4" alt="Quality Gold Jewelry">Quality Gold Jewelry</a></li>';
       
        $rowcate    = $this->qualitymodel->getCateName( $cid );
        $parentcate = $this->qualitymodel->getCateName( $rowcate['pid'] );
        
        if( !empty($parentcate['title']) ) {
            $cate_name .= '<li><a href="' . SITE_URL . 'qualitygoldrings/qualitycate/'.$parentcate['id'].'">'.$parentcate['title'].'</a></li>';
        } else {
            $cate_name .= '';
        }
        $cate_name .= '<li><a href="' . SITE_URL . 'qualitygoldrings/qualitycate/'.$cid.'">'.$rowcate['title'].'</a></li>';
        
        $catelink['category_link'] = $cate_name;
        $catelink['category_name'] = $rowcate['title'];
        
        return $catelink;
   }
    ///// product detail page
    function quality_ring_detail($product_id=0) {
        $data = $this->getCommonData(); 
	
        $data['onload_class'] = 'catalog-product-view product-14k-gold-diamond-three-stone-engagement-ring-set-128c-p-24728 categorypath-diamond-engagement-rings-wholesale-preset-gold-diamond-engagement-rings-aspx category-diamond-engagement-rings-wholesale-preset-gold-diamond-engagement-rings';
        
        //$this->load->view('engagementringstrial/engagement_rings_details', $data);
        //$metal = '';
        //$rngsize = '';
        $ring_size = $this->input->get('ring_size');
        $rsize_price = $this->catemodel->getFingerSizePrice( $ring_size );
        $get_ring_size = ( !empty($ring_size) ? $ring_size : 'NA' );
        $data['set_ring_size'] = resetsSlugTitle($get_ring_size);
        
        $rowsring = $this->qualitymodel->qualityProductDetail($product_id);
        $data['bread_crumb_link'] = $this->cate_break_crumb($rowsring['catid']);
        $data['cate_title'] = cate_title_set($rowsring['catid']);
        $ctstone_shape = $rowsring['additional_stones']; 
	$find_ctsahpe = getCenterStoneShape($ctstone_shape);
        $data['suport_shape'] = ( !empty($ctstone_shape) ? strtoupper( implode(', ', $find_ctsahpe) ) : 'Support any shape' );
        $data['buildring'] = $this->session->userdata('buildring');
        $data['rowsring'] = $rowsring;
        $priceMargin = $this->commonmodel->inventoryPriceMargin($rowsring['catid'], QUALITY_OPTION);
        $rowsring['price'] = $rowsring['price'] * $priceMargin;
        
        $data['sales_price'] = $rowsring['price'] + $rsize_price;
        $data['retail_price'] = $data['sales_price'] * PRICE_PERCENT;
        $data['saving_percent'] = ( 100 - ( ( $data['sales_price'] / $data['retail_price'] ) * 100 ) );
        $data['buynow_link'] = htmlspecialchars(config_item('base_url').'jewelleries/addtoshoppingcart/');
        $data['item_desc'] = get_site_title().' stunning '.$rowsring['title'] . ' can be yours for $'._nf($rowsring['price'], 2).'.';
        
        $cate = $this->getCateName( $rowsring['catid'] );
        $rowcate = $this->qualitymodel->getCateName( $rowsring['catid'] );
        
        $data['ringtitle'] = $rowsring['title'];	
        $data['title'] = $data['ringtitle'];
        $data['quality_cate_name'] = $rowcate['title'];
        $data['ringimg']   = QUALITY_IMGS.$rowsring['large_image'];
        $data['setingtype']   = $cate['sub_cname'];
        $data['maincate_name'] = $cate['main_cname'];
        $data['subcate_link'] = $this->product_cate_list_link( $rowsring['catid'] );
        
        $data['similar_items'] = $this->ringSimilarItems($rowsring['catid'], $product_id);
        $data['similar_products'] = $this->ringSimilarItems($rowsring['catid'], $product_id, 4);
        $data['popular_listings'] = $this->popularListings($rowsring['catid'], $product_id, 4);
        $data['more_engagement_listings'] = $this->popularListings($rowsring['catid'], $product_id, 4);
        ////// get user comments
	    $data['view_coments'] = $this->getProductReviews( $product_id );
        
        $data['extra_headers'] = '';
        $data['extra_headers'] .= '<script language="javascript" src="'.SITE_URL.'js/jquery.popup.js" type="text/javascript"></script>';
        $ringresults = $this->catemodel->getFingerSizeResult();
        $base_link = SITE_URL.'qualitygoldrings/quality_ring_detail/'.$product_id.'/';
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
        
        $output = $this->load->view('engagementringstrial/qualityring_detail_view' , $data , true);
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
								  <div><img src="'.SITE_URL.'img/page_img/stars_icon.png" /></div>
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
	$check_thumb = array();
	
	if( !empty($rowaray['large_image']) ) {
            $large_image = QUALITY_IMGS.$rowaray['large_image'];
            $small_image = QUALITY_IMGS.$rowaray['small_image'];
            
            if( getimagesize($large_image) ) {
                        
		if( empty($popup) ) {
				$getRingsThumb .= '<div class="smalimgview"><a href="#javascript;" onclick="ringThumbView(\''.$large_image.'\')">
			<img src="'.$small_image.'" alt="'.$rowaray['title'].'"></a></div>';
                            } else {
                                $getRingsThumb .= '<li><a href="javascript://" onclick="imageshow(\''.$large_image.'\');" title="'.$rowaray['title'].'"><img src="'.$small_image.'" width="31" alt="'.$rowaray['title'].'"></a> </li>';
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
    
    ///// rings similar items popularListings
    function ringSimilarItems($ring_cateid=0, $prod_id=0, $limit=5, $listing='') {
        $rowsring = $this->qualitymodel->qualitySimilartProduct($prod_id, $ring_cateid, $limit);
                
        $similar_rings = '';
        
        if( count($rowsring) > 0 ) {
            foreach( $rowsring as $rowring ) {
               $detaiLink = SITE_URL . 'qualitygoldrings/quality_ring_detail/' . $rowring['id'];
               $ringImageLink = QUALITY_IMGS.$rowring['small_image'];
               $ring_title = wordwrap($rowring['title'],25,"<br>\n");
               
               $priceMargin = $this->commonmodel->inventoryPriceMargin($rowring['catid'], QUALITY_OPTION);
               $rowring['price'] = $rowring['price'] * $priceMargin;
                
               $retail_price  = $rowring['price'] * PRICE_PERCENT;  //// PRICE_PERCENT : 3.5
               $ring_ourprice = $rowring['price'];
               $saving_percent = ( 100 - ( ( $ring_ourprice / $retail_price ) * 100 ) );
               $popupLink = SITE_URL . 'qualitygoldrings/quality_popup_detail/'.$rowring['id'] . '/?keepThis=true&TB_iframe=true&width=800&height=550&modal=false';
               
            if( empty($listing) ) {
               $similar_rings .= '<div class="prdSection col-sm-3" id="'.$rowring['ring_id'].'">
                                    <a href="'.$detaiLink.'" class="alsoviwed-product-img">
                                            <img class="" src="'.$ringImageLink.'" width="200" alt="'.$ring_title.'" title="'.$ring_title.'" style="display: inline;">
                                    </a><br><br>
                                    <a class="prdName" title="'.$ring_title.'" href="'.$detaiLink.'">'.$ring_title.'</a>
                                    <div class="price-box">
                                            <p class="old-price"><span>Retail Price:</span>
                                            <span style="text-decoration: line-through;"> $'._nf($retail_price, 2).'</span></p>
                                            <p class="our-price"><span>Our Price:</span><span> $'._nf($ring_ourprice, 2).'</span></p>
                                            <!-- <a class="viewItem" href="">View Item</a> -->
                                    </div>
				</div>'; 
                } else {
                   $similar_rings .= '<li class="item first">
			<div class="product-grid-quick" onmouseover="showTopQuickView('.$rowring['id'].');" onmouseout="hideTopQuickView('.$rowring['id'].');" style="overflow:hidden;">
				<a title="'.$ring_title.'" href="'.$detaiLink.'"><img alt="'.$ring_title.'" class="" src="'.$ringImageLink.'" width="200" style="display: inline;"></a>
				<h2 class="product-name"><a title="'.$ring_title.'" href="'.$detaiLink.'">'.$ring_title.'</a></h2>
				<div class="price-box">                                
				<div id="top-quickview'.$rowring['id'].'" class="ring_bk_setting" style="display: none; position: relative;">
					<a href="Javascript:;" onclick="show_quick_view(\''.$popupLink.'\', \'Quick View\', \'nofollow\');" title="Quick View'.$ring_title.'" class="quick-view thickbox" rel="nofollow"><span>Quick View</span></a>
				</div>
                                
                                    <p class="old-price"><span class="price-label">Retail Price:</span> 
                                    <span id="old-price-802865" class="price">$'._nf($retail_price, 2).'</span></p>
				<p class="our-price"><span class="price-label">Our Price:</span> 
                                <span id="product-price-'.$rowring['id'].'">$'._nf($ring_ourprice, 2).'</span>
                                    </p>
				</div>
				<ul class="add-to-links-details">
					<li><a class="view-item" href="'.$detaiLink.'">View Item</a></li>
				</ul>
			</div>
			<!-- Mouse Hover DIV STARTS here -->
			<div class="box-detail-over right-box" id="top-box-detail-over-'.$rowring['id'].'" style="display: none;">
				<div class="column3">
					<p>'.$ring_title.'</p>
					<div class="hover-price">
						<div class="popup-prices">
                                                <p class="old-price-qv"><span class="price-label-qv">Retail Price:</span> 
                                                <span id="old-price-'.$rowring['id'].'" class="price-qv">$'._nf($retail_price, 2).'</span></p>
							<p class="old-price-qv"><span class="price-label-qv">Our Price:</span> <span id="product-price-'.$rowring['id'].'" class="new-price-qv">$'._nf($ring_ourprice, 2).'</span> <span class="special-price-label-qv">(Savings: '.round($saving_percent).'%)</span></p>
</div>
					</div>
					<div id="top-product_additional_data_'.$rowring['id'].'"></div>
				</div>
			</div>
			<!-- Mouse Hover DIV ENDS here -->
		</li>';     
                }
            }
        }
        
        return $similar_rings;
    }
    ///// rings popular items 
    function popularListings($ring_cateid=0, $prod_id=0, $limit=5, $listing='') {
        $rowsring = $this->qualitymodel->qualitySimilartProduct($prod_id, $ring_cateid, $limit);
                
        $similar_rings = '';
        
        if( count($rowsring) > 0 ) {
            foreach( $rowsring as $rowring ) {
               $detaiLink = SITE_URL . 'qualitygoldrings/quality_ring_detail/' . $rowring['id'];
               $ringImageLink = QUALITY_IMGS.$rowring['small_image'];
               $ring_title = wordwrap($rowring['title'],25,"<br>\n");
               $priceMargin = $this->commonmodel->inventoryPriceMargin($rowring['catid'], QUALITY_OPTION);
               $rowring['price'] = $rowring['price'] * $priceMargin;
               
               //$retail_price  = $rowring['price'] * PRICE_PERCENT;  //// PRICE_PERCENT : 3.5
               $ring_ourprice = $rowring['price'];
               //$saving_percent = ( 100 - ( ( $ring_ourprice / $retail_price ) * 100 ) );
             //$popupLink = SITE_URL . 'qualitygoldrings/quality_popup_detail/'.$rowring['id'] . '/?keepThis=true&TB_iframe=true&width=800&height=550&modal=false';
               
               $detailDesc = 'Metal ' . $rowring['material_primary'] . ' ' . $rowring['metal'] . ' Weight ' . $rowring['average_weight'];
               
            $similar_rings .= '<div class="product_colsbk col-sm-3">
                <div class="productRingImg"><a href="'.$detaiLink.'"><img src="'.$ringImageLink.'" width="200" height="153" alt="'.$ring_title.'"></a></div>
                        <div><img src="'.IMGSRC_LINK.'rating_icon.jpg" alt=""><span class="reviewlabel">(86 Review)</span></div><br>
                        <div>$ '. _nf($ring_ourprice, 2).'</div>
                        <div class="setcolor_label">+ '.$rowring['product_type'].'</div><br>
                        <div class="centerLabel"><a href="'.$detaiLink.'">'.$ring_title.'</a></div>
                        <div class="setcolor_label">'.$detailDesc.'</div>
                    </div>';
            }
        }
        
        return $similar_rings;
    }
    ///// get rings listings view according to the category id
    function quality_ring_lisitngs_view( $results = array()) {
        $ringlistings = '';
        $str = 150;
        
        if( count($results) > 0 ) {
            foreach( $results as $rowrings ) {
                $ringDetail = SITE_URL . 'qualitygoldrings/quality_ring_detail/' . $rowrings['id'];
                $ringsImg = QUALITY_IMGS . $rowrings['large_image'];
                $ringBoxDesc = cleanString($rowrings['title']);
                $ringTitle = ( strlen($ringBoxDesc) > $str ? substr($ringBoxDesc, $str).'...' : $ringBoxDesc );
                $priceMargin = $this->commonmodel->inventoryPriceMargin($rowrings['catid'], QUALITY_OPTION);
                $rowrings['price'] = $rowrings['price'] * $priceMargin;
                    
                $retailPrice = _nf($rowrings['price'] * PRICE_PERCENT, 2);
                $ourPrice = _nf($rowrings['price'], 2);
                $rid = $rowrings['id'];
                
                $popupLink = SITE_URL . 'qualitygoldrings/quality_popup_detail/' . $rid . '/?keepThis=true&TB_iframe=true&width=800&height=550&modal=false';
                
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
                    $'.$ourPrice.'                </span>
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
    function category_cols_list_view($cid=0) {
        
        $ringresults = $this->qualitymodel->qualityGoldCateList( $cid );
        //print_ar($ringresults);
        
        $catelist_view = '';
        
        if( count($ringresults) > 0 ) {
            foreach( $ringresults as $rowcate ) {
                $cateImgLink = RINGS_IMAGE.'crone/'.$rowcate['image'];
                $detaiLink = SITE_URL.'qualitygoldrings/qualitycate/'.$rowcate['id'];
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
        $rowsring = $this->qualitymodel->qualityProductDetail($id);
        
        $view_iteminfo = '';
        $view_iteminfo .= '<span id="item-info"><b>Item Information</b></span>
<table id="item-tbl" class="data-table2" width="100%" cellspacing="0" cellpadding="0">
  <tbody>';
    $view_iteminfo .= '<tr class="first-row">
                        <th style="width:40%;color:#ff0000;font-weight:bold;">Item Code</th>
                        <td style="color:#ff0000;font-weight:bold;">'.$rowsring['style'].'</td>
                      </tr>';
    $view_iteminfo .= '<tr class="first-row">
                                <th style="width:40%;">Average Weight</th>
                                <td>'.$rowsring['average_weight'].'</td>
                              </tr>';
    
    if( !empty($rowsring['metal']) ) {
      $view_iteminfo .= '<tr class="first-row">
                            <th style="width:40%;">Metal</th>
                            <td>'.$rowsring['metal'].'</td>
                          </tr>';
    }
    if( !empty($rowsring['item_length']) && $rowsring['item_length'] != 'null' ) {
      $view_iteminfo .= '<tr class="first-row">
                            <th style="width:40%;">Item Length</th>
                            <td>'.$rowsring['item_length'].'</td>
                          </tr>';
    }
    if( !empty($rowsring['status']) ) {
      $view_iteminfo .= '<tr class="first-row">
                            <th style="width:40%;">Status</th>
                            <td>'.$rowsring['status'].'</td>
                          </tr>';
    }
    if( !empty($rowsring['country']) ) {
      $view_iteminfo .= '<tr class="first-row">
                            <th style="width:40%;">Country</th>
                            <td>'.$rowsring['country'].'</td>
                          </tr>';
    }
    if( !empty($rowsring['product_type']) ) {
      $view_iteminfo .= '<tr class="first-row">
                            <th style="width:40%;">Product Type</th>
                            <td>'.$rowsring['product_type'].'</td>
                          </tr>';
    }
    if( !empty($rowsring['jewelry_type']) ) {
      $view_iteminfo .= '<tr class="first-row">
                            <th style="width:40%;">Jewelry Type</th>
                            <td>'.$rowsring['jewelry_type'].'</td>
                          </tr>';
    }
    if( !empty($rowsring['material_primary']) ) {
      $view_iteminfo .= '<tr class="first-row">
                            <th style="width:40%;">Primary Material</th>
                            <td>'.$rowsring['material_primary'].'</td>
                          </tr>';
    }
    if( !empty($rowsring['material_primary_color']) ) {
      $view_iteminfo .= '<tr class="first-row">
                            <th style="width:40%;">Primary Material Color</th>
                            <td>'.$rowsring['material_primary_color'].'</td>
                          </tr>';
    }
    if( !empty($rowsring['material_purity']) ) {
      $view_iteminfo .= '<tr class="first-row">
                            <th style="width:40%;">Material Purity</th>
                            <td>'.$rowsring['material_purity'].'</td>
                          </tr>';
    }
    if( !empty($rowsring['length_of_item']) ) {
      $view_iteminfo .= '<tr class="first-row">
                            <th style="width:40%;">Length of Item</th>
                            <td>'.$rowsring['length_of_item'].'</td>
                          </tr>';
    }
    if( !empty($rowsring['catalogs']) ) {
      $view_iteminfo .= '<tr class="first-row">
                            <th style="width:40%;">Catalogs</th>
                            <td>'.$rowsring['catalogs'].'</td>
                          </tr>';
    }
     
 $view_iteminfo .= '</tbody></table>';
 
        if( empty($popup) ) {
            echo $view_iteminfo;
        } else {
            return $view_iteminfo;
        }
        
    }
    //// product popup detail
    function quality_popup_detail($id=0) {
       $data = $this->getCommonData();
       $rowsring = $this->qualitymodel->qualityProductDetail($id);
       
       $data['title'] = $rowsring['title'];
       $data['listings_detail'] = $this->listingdetail( $id, 'popup' );
       $data['ring_title'] = $this->getRingTitle($rowsring);
       $data['rings_thumb'] = $this->getProductThumb( $rowsring, 'popup' );
       $data['ringimg']   = QUALITY_IMGS.$rowsring['large_image'];
       $data['rowsring']   = $rowsring;
       $data['retail_price']  = $rowsring['price'] * PRICE_PERCENT;  //// PRICE_PERCENT : 3.5
       $data['salesprice'] = $rowsring['price'];
       $data['saving_percent'] = ( 100 - ( ( $data['salesprice'] / $data['retail_price'] ) * 100 ) );
       
       $this->load->view('engagementringstrial/qualityjw_popup_detail', $data);
        //$this->output($output, $data);
        
    }
}
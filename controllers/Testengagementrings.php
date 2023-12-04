<?php
class Testengagementrings extends CI_Controller {
    function __construct(){
            parent::__construct();
            //$this->ci = & get_instance ();
            
            $this->load->model('jewelrymodel');
            $this->load->model('diamondmodel');
            $this->load->model('engagementmodel');
            $this->load->helper('ringsection');
            $this->load->helper('contentsection');
            $this->load->model('hderingitemsmodel');
            $this->load->library('session');
            //$this->output->enable_profiler(TRUE);
            //$this->session->unset_userdata('whsale_section');
            
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
    function engagementrings($cates_id = 40) {

        $data = $this->getCommonData(); 

        //$data['category_id'] = $cates_id;
        //$cates_id = 40;
        
        //echo $cates_id; exit();

        $data['cate_name']          = $this->getCateName($cates_id);
        $rings_cate                 = $this->category_cols_list_view($cates_id);
        $data['ring_categoies']     = $rings_cate['cate_list_view'];


        //$cateid_list = array_rand( $rings_cate['cateid'], count($rings_cate['cateid']) );
        //$setcateid = $rings_cate['cateid'][$cateid_list[0]];

        $caterow                    = $this->catemodel->getRingCategoryRow( $cates_id );
        $cate_name                  = $this->catemodel->getRingCategoryName( $cates_id );
        $data['category_name']      = $cate_name.' Diamond';

        //echo '<pre>'; print_r($data);
        //echo $cates_id; exit();

        if( $cates_id == 67 ){
            $data['title'] = 'Womens Wedding Bands';
        }else{
            $data['title'] = $data['category_name'] . '';
        }  

        if( !empty($caterow['meta_description']) ) {
            $data['meta_tags'] = '<meta name="description" content="'.$caterow['meta_description'].'">';
        }
        
        //$data['similar_products'] = $this->ringSimilarItems($setcateid, '', 6, 'listings');
        
        $data['meta_tags']  = '
<meta http-equiv="Content-Type" content="text/html; iso-8859-1">
<meta name="title" content="Loose Diamonds,Engagement Rings, Design Your Own Ring, Cheap Diamonds Ideal Scope, Customize Rings - Engagement Rings, '.$data['title'].' ">
<meta name="ROBOTS" content="INDEX,FOLLOW">
<meta name="description" content="Offers Loose Diamonds,Design Your Own Ring,Ideal Scope, Loose Diamond, Engagement Rings, Cheap Diamonds, Customize Rings,Diamond Tutorial, Diamond rings, Cheap Diamonds, Ideal Scope, Diamond district, Diamond Rings, Wholesale Diamonds, Estate Jewelry, Custom Engagement Rings, '.$data['category_name'].'">
<meta name="abstract" content="Diamond Rings, Wholesale Diamonds, Estate Jewelry, Custom Engagement Rings, New York, Chicago, California, Boston, Las Vegas, Columbia, Montgomery, '.$data['title'].'">
<meta name="keywords" content="diamonds, Loose diamonds, engagement ring usa, colored diamonds, engagement diamonds ring, wholesal diamond, diamond district, Diamond Rings, Wholesale Diamonds, Estate Jewelry, custom engagement rings, diamond ring usa, engagement rings diamond, '.$data['category_name'].'">
<meta name="author" content="'.get_site_contact_info('sites_title').'">
<meta name="publisher" content="'.get_site_contact_info('sites_title').'">
<meta name="copyright" content="'.get_site_contact_info('sites_title').'">
<meta http-equiv="Reply-to" content="">
<meta name="creation_Date" content="12/12/2008">
<meta name="expires" content="">
<meta name="revisit-after" content="7 days">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">';
        
        if( $data['ring_categoies'] != 'false' ){
            $output = $this->load->view('engagementringstrial/engagement_trials' , $data , true);
            $this->output($output, $data);
        }else{
            header('Location:' . SITE_URL . 'testengagementrings/engagement_ring_listings/' . $cates_id);
        }

    }
    



    ///// category listings
    function engagement_ring_listings($category_id=0, $start=0) {
        $data = $this->getCommonData();
        $this->load->library('pagination');
       
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
        
        $ringresults = $this->catemodel->getRingsByCateory($category_id, $startFrom, $config["per_page"], '', $metal_value, $sort_option); //
        //print_ar($ringresults); exit();
        $config["total_rows"] = $ringresults['total'];
        $baseLink = SITE_URL.'testengagementrings/engagement_ring_listings/'.$category_id.'/?sort='.$sort_option;
	    $config["base_url"]   = $baseLink.'&pagelist='.$config["per_page"].'&metal='.$metal_value;
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><a class="active" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $data['page_numb_hint'] = page_number_hint($config["per_page"], $ringresults['total'], $start_from); // custome helper
        
        $data['similar_products'] = $this->ringSimilarItems($category_id, '', 6, 'listings');        
        $sort_option_link = SITE_URL . 'testengagementrings/engagement_ring_listings/'.$category_id.'/?pagelist='.$config["per_page"].'&per_page='.$startFrom.'&sort=';
        $data['sort_option_link'] = page_sort_listing($sort_option_link, $sort_option); /// ring section helper
        
        $ring_result = $this->get_unique_ring_listing($ringresults['results']);



        $data['ring_listings'] = '<ul class="products-grid prduct-list first last odd">'.$ring_result['ring_listing'].'</ul>' . $ring_result['popup_block'];
        
        $cate_name = $this->catemodel->getRingCategoryName( $category_id );
        $data['catename_title'] = $cate_name.' Diamond Engagement Rings'; 
        $options = '';  
        $page_link = $baseLink; //( !empty( $perpage_no ) ? $baseLink.'&per_page='.$perpage_no : $baseLink);
        
            for( $page=10; $page <= 50; $page+=10 ) {
                $options .= '<option value="'.$page_link.'&pagelist='.$page.'" '.selectedOption($page,$config["per_page"]).'>'.$page.'</option>';
            }
        ///// sort options
        $sort_list = array( 'ASC' => 'Lowest Price', 'DESC' => 'Highest Price');
        $sort_link = $page_link.'?per_page='.$config["per_page"].'&sort=';
        $optionList = '';
        
        foreach( $sort_list as $sorting => $sort_value ) {
            $optionList .= '<option value="'.$sort_link.$sorting.'" '.selectedOption($sorting, $sort_option).'>'.$sort_value.'</option>';
        }
        
        $results_metal = $this->catemodel->getRingsMetalByCate( $category_id );
        $metal_link = $sort_link.$sort_option;
        $metal_list = '<option value="'.$metal_link.'&metal=">Select Metal</option>';
        
        foreach( $results_metal as $rowmetal ) {
           $metal_list .= '<option value="'.$metal_link.'&metal='.urlencode( $rowmetal['rings_metal'] ).'" '.selectedOption($rowmetal['rings_metal'], $metal_value).'>'.$rowmetal['rings_metal'].'</option>';
        }
        
        $this->pagination->initialize($config); ///// initializ the pagination        
        $data['page_options'] = $options;
        $data['sorting_option'] = $optionList;
        $data['rings_metal'] = $metal_list;
        $data['main_category_id'] = $category_id;
        $data['parent_cateid'] = $this->catemodel->getparentCateID($category_id);
        $data['page_links']   = $this->pagination->create_links();
        $data['ring_cate_name']   = $this->getCateName( $category_id ); //print_ar($data['ring_cate_name']);
        //$output = $this->load->view('engagementringstrial/engagement_trials_listings' , $data , true);
        
         $data['title'] = 'Engagement Rings '.$cate_name;
        
        $data['meta_tags']  = '
<meta http-equiv="Content-Type" content="text/html; iso-8859-1">
<meta name="title" content="Loose Diamonds,Engagement Rings, Design Your Own Ring, Cheap Diamonds Ideal Scope, Customize Rings - Engagement Rings, '.$data['title'].' ">
<meta name="ROBOTS" content="INDEX,FOLLOW">
<meta name="description" content="Offers Loose Diamonds,Design Your Own Ring,Ideal Scope, Loose Diamond, Engagement Rings, Cheap Diamonds, Customize Rings,Diamond Tutorial, Diamond rings, Cheap Diamonds, Ideal Scope, Diamond district, Diamond Rings, Wholesale Diamonds, Estate Jewelry, Custom Engagement Rings, '.$data['title'].'">
<meta name="abstract" content="Diamond Rings, Wholesale Diamonds, Estate Jewelry, Custom Engagement Rings, New York, Chicago, California, Boston, Las Vegas, Columbia, Montgomery, '.$data['title'].'">
<meta name="keywords" content="diamonds, Loose diamonds, engagement ring usa, colored diamonds, engagement diamonds ring, wholesal diamond, diamond district, Diamond Rings, Wholesale Diamonds, Estate Jewelry, custom engagement rings, diamond ring usa, engagement rings diamond, '.$data['category_name'].'">
<meta name="author" content="'.get_site_contact_info('sites_title').'">
<meta name="publisher" content="'.get_site_contact_info('sites_title').'">
<meta name="copyright" content="'.get_site_contact_info('sites_title').'">
<meta http-equiv="Reply-to" content="">
<meta name="creation_Date" content="12/12/2008">
<meta name="expires" content="">
<meta name="revisit-after" content="7 days">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">';
        
        $output = $this->load->view('engagementringstrial/engagement_unique_listings' , $data , true);
        $this->output($output, $data);
    }
    
    /// view diamond detail in popup
    function getDiamondDetail($lot=0) {
        $lot = urldecode($lot);
        
        $row_detail = $this->diamondmodel->getDetailsByLot($lot);
        $data['row_detail'] = $row_detail;
        $data['diamond_type'] = 'White Diamond';
        $image_path = SITE_URL.'images/shapes_images/';
        $data['diamond_shape'] = view_shape_value($view_diamondimg, $row_detail['shape']);
        $data['view_shapeimage'] = $image_path.$view_diamondimg;
        $data['detail_pglink'] = '#';
        
        $this->load->view('engagementringstrial/view_diamondlist_details', $data);
    }
    function get_page_content($topic='') {
        $row_content = $this->commonmodel->getCompanyInfoRow($topic);
        $page_content = check_empty($row_content['content'], 'Coming Soon');
        return $page_content;
    }
    ///// product detail page
    function engagement_ring_detail($prod_id=0, $ring_size='', $ring_metal='14KP', $avsizes='') {
        
        $product_id = $prod_id; //$this->catemodel->get_unique_middle_gram_weight($prod_id); 
        
        //$data = $this->getCommonData(); 
        //$this->session->unset_userdata('product_id');
        //$this->session->set_userdata('product_id', $product_id);
        
        $data['onload_class'] = 'catalog-product-view product-14k-gold-diamond-three-stone-engagement-ring-set-128c-p-24728 categorypath-diamond-engagement-rings-wholesale-preset-gold-diamond-engagement-rings-aspx category-diamond-engagement-rings-wholesale-preset-gold-diamond-engagement-rings';
        
        //$this->load->view('engagementringstrial/engagement_rings_details', $data);
        //$metal = '';
        //$rngsize = '';
        
        $ezvalue_row = $this->commonmodel->getEzOptionValues();
        $data['first_ez_value'] = $ezvalue_row[0]['ezvalue'];
        $data['second_ez_value'] = $ezvalue_row[1]['ezvalue'];
        
        $ringresults = $this->catemodel->getFingerSizeResult();
        $finger_size = '<option value="'.$base_link.'?ring_size=">Select Finger Size</option>';
        
        
        if( count($ringresults) > 0 ) {
            foreach( $ringresults as $rowsize ) {
                $rgsz = setRingSize($rowsize['ring_size']);
                
                
                $selected = '';
                $ring_size_link = $base_link.'?diamond_lot='.$data['diamond_lot'].'&ring_size='.$rgsz;
                if(isset($_GET['ring_size'])){ if($rgsz == $_GET['ring_size']){ $selected = 'selected="selected"';} }
                
                $finger_size .= '<option value="'.$ring_size_link.'" '.$selected.' '.selectedOption($rgsz, $ring_size).'>'.$rowsize['ring_size'].'</option>';
            }
        }
        $data['finger_ring_size'] = $finger_size;
        
        
        $rowsring = $this->catemodel->getRingsDetailViaId($product_id, $ring_metal, $ring_size); //
        //print_ar($rowsring); exit(); 
        $data["getparent_cate"] = getMainCatParentCateID($rowsring['catid']);
        $data['shipping_policy'] = $this->get_page_content('shipping-policy');
        $data['finance_policy'] = $this->get_page_content('finance-policy');
        $data['wedding_band'] = strchr( $rowsring['parent_cate'], 'Bands' );
        //print_ar($rowsring)
    
        //echo $data['heart_title']; exit();

        $ctstone_shape = $rowsring['additional_stones']; 
	    $find_ctsahpe = getCenterStoneShape($ctstone_shape);
        $data['suport_shape'] = ( !empty($ctstone_shape) ? strtoupper( implode(', ', $find_ctsahpe) ) : 'Support any shape' );
        $suport_shape_img = view_shape_value($diamond_shape_img, ucwords( strtolower( $data['suport_shape'] ) ) );
        $data['supported_shape'] = SITE_URL . 'images/shapes_images/' . $diamond_shape_img;
        $data['buildring'] = $this->session->userdata('buildring');
        $data['rowsring'] = $rowsring;
        //$priceMargin = $this->commonmodel->inventoryPriceMargin($rowsring['catid'], UNIQUE_OPTION);
        //$rowsring['priceRetail'] = $rowsring['priceRetail'] * $priceMargin;
        $data['rowsring']['priceRetail'] = $rowsring['priceRetail'];
        
        $data['retail_price'] = $rowsring['priceRetail'] * PRICE_PERCENT;
        $data['saving_percent'] = calc_save_percent( $rowsring['priceRetail'] );
        $data['buynow_link']    = htmlspecialchars(config_item('base_url').'jewelleries/addtoshoppingcart/');
        
        $cate = $this->getCateName( $rowsring['catid'] );

        
        $data['ringtitle'] = $rowsring['matalType'].' '.$cate['main_cname'].' Cut Diamond Unique Engagement Ring ';
        $results['item_thumbs'] = $this->catemodel->getRingThumbs( $rowsring['name'] );
        $data['product_circle'] = $this->getProductThumb( $results, 'listing', $rowsring['name'], $data['ringtitle'], '400', '', 'details');
        $data['product_thums'] = $data['product_circle']['thumb_image'];


        /*$get_diamond_price = 0;
        $get_cert_no       = '';
        $get_lab           = 'GA';
        $get_color         = 'D to L';
        $get_clarity       = 'F';*/

        $data['ringimg']   = SITE_URL . 'scrapper/imgs/'.$rowsring['ImagePath'];
        $data['setingtype']   = $cate['sub_cname'];
        $data['maincate_name'] = $cate['main_cname'];
        
        
        $data['subcate_link'] = '<a href="'.SITE_URL.'testengagementrings/engagement_ring_listings/'.$rowsring['catid'].'" title="">'.$cate['main_cname'].' Diamond Engagement Rings</a>';
        
        
        $data['similar_items'] = $this->ringSimilarItems($rowsring['catid'], $product_id);
        //echo 'test13'; exit();
        $data['similar_products'] = $this->ringSimilarItems($rowsring['catid'], $product_id, 4);
        $data['popular_listings'] = $this->popularListings($rowsring['catid'], $product_id, 4);
        $data['more_engagement_listings'] = $this->popularListings($rowsring['catid'], $product_id, 4);
        ////// get user comments
	    $data['view_coments'] = $this->getProductReviews( $product_id );

        $data['extra_headers'] = '';
        $data['extra_headers'] .= '<script language="javascript" src="'.SITE_URL.'js/jquery.popup.js" type="text/javascript"></script>';
        $data['extraheader'] = '<link type="text/css" href="' . SITE_URL . 'css/magnify_zoom.css" rel="stylesheet" />';
        $data['extraheader'] .= '<link type="text/css" href="' . SITE_URL . 'css/magnific-popup.css" rel="stylesheet" />';
        
        ///// get ring thumb
        ////// item thumbs
        $rings_thumb = $this->getProductThumb( $rowsring );
        $data['rings_thumb'] = $rings_thumb['thumb_circle'];
        $data['suported_shapes'] = $this->getDimaondShapeImage( $rowsring );  /// get supplied stones shapes
        
        ///// managed center diamond stones
        $getring_shape = getSuppliedStoneShape( $rowsring['supplied_stones'] );
	    $aditional_ratios = getAdditonalStonesRatio( $rowsring['additional_stones'] );


    if( empty($rowsring['additional_stones']) ) {
		$this->session->set_userdata('shape', $getring_shape.'.');
		$this->session->unset_userdata('length');
		$this->session->unset_userdata('width');
		$this->session->unset_userdata('carat');
	} else {
		$this->session->set_userdata('shape_stone', $aditional_ratios['size_shape'].'.');
		$this->session->set_userdata('length', $aditional_ratios['length']);
		$this->session->set_userdata('width', $aditional_ratios['width']);
		$this->session->set_userdata('ringcarat', $aditional_ratios['carat']);
	} 
        $ringsMetal = $rowsring['ringsMetal'];
        $defaultMetal = ( !empty( $ring_metal )  ? $ring_metal : $ringsMetal[0]['matalType'] );
	$defaultRingSz = ( !empty( $ring_size )  ? $ring_size : $rowsring['ringSize'] );
        $data['default_metal'] = $defaultMetal;
        $data['set_ring_size'] = resetsSlugTitle($defaultRingSz);
        
	$setsizes = explode('|', $rowsring['availblesize']);
        $trimmedArray = array_map('trim', $setsizes);
        array_filter($trimmedArray);
        $ringWeight = '';


	//print_ar($setsizes);
	$metaList = array();
	$testar = array();
	$availableSizs = array();
	$available_insizes = ''; 
	foreach($trimmedArray as $rows_avsize) {
			if( !empty($rows_avsize) ) :
			$metailWeight = $this->catemodel->getMetalRingWeight($rows_avsize);
			$availableSizs[] = $rows_avsize;
			if(!in_array($metailWeight['metal_weight'], $testar)) {
			
				$metaList[] = array('ring_id'=>$metailWeight['id'], 'ring_metal'=>$metailWeight['metal_weight']);
				$testar[]  = $metailWeight['metal_weight'];
			}
			endif;
			}
			
		if( empty($avsizes) ) {
			$this->session->set_userdata('setmetal_list', $metaList);
		}
		
		$currMetalSizes = $this->session->userdata('setmetal_list'); //print_ar($currMetalSizes);
		if( count($currMetalSizes) > 0 ) {
			$ringWeight .= '<option value="">Available Sizes</option>';
		foreach($currMetalSizes as $rows_avsize) {
			$metaLink = SITE_URL.'testengagementrings/engagement-ring-detail/'.trim($rows_avsize['ring_id']).'/'.$defaultRingSz.'/'.$defaultMetal.'/'.$product_id;			
			$ringWeight .= '<option value="'.$metaLink.'" '.selectedOption($rows_avsize['ring_id'], $product_id).'>'.$rows_avsize['ring_metal'].'</option>';
			$available_insizes .= '<div class="tabsRow">
                        <div class="metaLeft">Size:
                         <span class="sizeBlock"><a href="'.$metaLink.'">'.$rows_avsize['ring_metal'].'</a></span>
                        </div>
                      </div>';
			
			}
		} else {
		 	$ringWeight .= '<option value="">Available Sizes</option>';
		}
                
        //////////////////////////////////////////////////////////
        
        $getRingsSize = ''; //print_ar($rowsring);
        if( count($rowsring['ringsSizes']) > 0 ) {
		foreach($rowsring['ringsSizes'] as $rng_size) {
			$rgsz = setRingSize($rng_size['ringSize']);
			$rings_rdlink = SITE_URL.'testengagementrings/engagement-ring-detail/'.$product_id.'/'.$rgsz.'/'.$defaultMetal;
			$getRingsSize .= '<option value="'.$rings_rdlink.'" '.selectedOption($rgsz, $ring_size).'>'.$rng_size['ringSize'] . ' (+$'.$rng_size['priceRetail'].')' .'</option>';
		}
	} else {
         $getRingsSize .= '<option value="">Ring Sizes</option>';
        }
        $getRingsMetal = '';
	if( count($rowsring['ringsMetal']) > 0 ) {
		foreach($rowsring['ringsMetal'] as $rings_metal) {
                    if( $rings_metal['matalType'] != 'PDIUM' ) {
			$metal_rdlink = SITE_URL.'testengagementrings/engagement-ring-detail/'.$product_id.'/'.$defaultRingSz.'/'.trim($rings_metal['matalType']);
			$getRingsMetal .= '<option value="'.$metal_rdlink.'" '.selectedOption($rings_metal['matalType'], $ring_metal).'>'.set_ring_metal($rings_metal['matalType']).'</option>';
                    }
		}
	} else {
         $getRingsMetal .= '<option value="">Metal Type</option>';
        }
        
        $data['ringsmetail'] = $getRingsMetal;
	$data['ring_weight']   = $ringWeight;
	
	$data['defaultMetal']      = $defaultMetal;
	$data['available_insizes'] = $available_insizes;

	$data['title'] = $data['ringtitle'].', '.$data['rowsring']['supplied_stones'].', '.$data['rowsring']['stone_weight'];

	$data['meta_tags'] = '<meta name="ROBOTS" content="INDEX,FOLLOW">
	<meta name="description" content="Buy online emerald cut diamond rings, three stone diamond rings, 3 stone diamond ring, antique diamond ring, set engagement ring, tension engagement rings, affordable engagement ring, 3 stone diamond ring, antique diamond ring, set engagement ring, pave diamond rings, '.$data['title'].'">
	<meta name="keywords" content="emerald cut diamond rings, three stone diamond rings, 3 stone diamond ring, antique diamond ring, set engagement ring, tension engagement rings, affordable engagement ring, 3 stone diamond ring, antique diamond ring, set engagement ring, pave diamond rings, '.$data['title'].'">
	<meta name="author" content="'.get_site_contact_info('sites_title').'">
	<meta name="publisher" content="'.get_site_contact_info('sites_title').'">
	<meta name="copyright" content="'.get_site_contact_info('sites_title').'">
	<meta http-equiv="Reply-to" content="">
	<meta name="creation_Date" content="12/12/2008">
	<meta name="expires" content="">
	<meta name="revisit-after" content="7 days">
	';
        
        $data['ringsize_option'] = $getRingsSize;
        $data['row_cate'] = $this->getCateName($rowsring['catid']);
        //$data['stones_list'] = $this->getCenterStoneList();
        //$output = $this->load->view('engagementringstrial/engagement_rings_details' , $data , true);
        $output = $this->load->view('engagementringstrial/engagement_unique_details' , $data , true);
        
        $this->output($output, $data);
    }
    
    
    
    function getCenterStoneList($ringid=0) {
        
        $rowsring = $this->catemodel->getRingsDetailViaId($ringid, '', '');
        ///// managed center diamond stones
        $getring_shape = getSuppliedStoneShape( $rowsring['supplied_stones'] );
	$ratios = getAdditonalStonesRatio( $rowsring['additional_stones'] );
        
        if( empty($rowsring['additional_stones']) ) {
            $diamond_shape = $getring_shape;
            $dmlength = '';
            $dmwidth = '';
            $dmcarat = '';    
            
        } else {
            
            $diamond_shape = $ratios['size_shape'];
            $dmlength = $ratios['length'];
            $dmwidth = $ratios['width'];
            $dmcarat = $ratios['carat'];
	}
        
        $results = $this->catemodel->getRapnetListResult($diamond_shape, $dmlength, $dmwidth, $dmcarat);      
        
        return $results;
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
    function getProductThumb($rowaray=array(), $popup='', $item_id='', $item_title='', $width=215, $height=215, $detail='') {
        $getRingsThumb = '';
	$check_thumb = array();
	$ring_title = $this->getRingTitle( $rowaray );
        $i = 1;
        $itemID = trim( $item_id );
        $set_ring_thumb = '';
        $set_popup_thumb = '';
        
	if( count($rowaray['item_thumbs']) > 0 ) {
		foreach( $rowaray['item_thumbs'] as $rng_thumb ) {
                    $unique_id = 'bk_'.$i.'_'.$item_id;
			$ringsThumb = SITE_URL.'scrapper/imgs/'.$rng_thumb['ImagePathThumb'];
			$ringsView = SITE_URL.'scrapper/imgs/'.$rng_thumb['ImagePath'];
			
			if( !in_array($rng_thumb['ImagePathThumb'], $check_thumb) ) {
                            if( empty($popup) ) {
				$getRingsThumb .= '<div class="smalimgview"><a href="#javascript;" onclick="ringThumbView(\''.$ringsView.'\')">
			<img src="'.$ringsThumb.'" alt=""></a></div>';
                            } else {
                                
                                if( $popup == 'listing' ) { //// if popup is listing then show these thumbs with dots in linsting page
                                    $getRingsThumb .= '<li id="'.$i.'"><a href="javascript://" onclick="ringsThumbView(\''.$ringsView.'\', \''.$itemID.'\', \''.$i.'\');" title="'.$ring_title.'" onmouseover="ringsThumbView(\''.$ringsView.'\', \''.$itemID.'\', \''.$i.'\');" title="'.$ring_title.'">'
                                            . '<img src="'.SITE_URL.'img/heart_diamond/in_active_circle.jpg" width="9" height="9" alt="'.$ring_title.'"></a>'
                                            . '</li>';
                                } else {
                                    $getRingsThumb .= '<li><a href="javascript://" onclick="ringThumbView(\''.$ringsView.'\');" title="'.$ring_title.'"><img src="'.$ringsThumb.'" width="31" alt="'.$ring_title.'"></a> </li>';
                                }
                                
                            }
                            $active_class = ( $i == 2 ? 'active_view' : 'hide_imgbk' );
                            
                            if( empty($detail) ) { //// check unique detail page
                               //$set_ring_thumb .= '<img src="'.$ringsView.'" width="'.$width.'" height="'.$height.'" alt="'.$item_title.'" /></div>';  
                               
                               if( $i == 2 ) {
                                    $set_ring_thumb = '<img src="'.$ringsView.'" width="'.$width.'" height="'.$height.'" alt="'.$item_title.'" />'; 
                                }
                               
                               
                            } else {
                                $set_ring_thumb .= '<div class="sp '.$active_class.'" id="'.$unique_id.'"><img src="'.$ringsView.'" onmouseover="show_magnify_affect(\''.$unique_id.'\')" width="'.$width.'" height="'.$height.'" alt="'.$item_title.'" /></div>';
                                
                                if( $i == 1 ) {
                                    $set_popup_thumb .= '<a href="'.$ringsView.'"><img src="'.SITE_URL.'img/search_plus_ic.png" alt="" width="28" /></a>';
                                } else {
                                    $set_popup_thumb .= '<a href="'.$ringsView.'"></a>';
                                }
                            }
                            
			}
					
			$check_thumb[] = $rng_thumb['ImagePathThumb'];
                        
                        $i++;
		}
	} else {
         $getRingsThumb .= '';
        }
        
        $return['thumb_circle'] = $getRingsThumb;
        $return['thumb_image']  = $set_ring_thumb;
        $return['thumbs_popup'] = $set_popup_thumb;
        
        return $return;
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
        ///echo 'FF'; //exit(); //
        return;
        $rowsring = $this->catemodel->getRingsByCateory($ring_cateid, 0, $limit, $prod_id);
        
        $similar_rings = '';
        $popupBlock = '';
        if( count($rowsring['results']) > 0 ) {
            foreach( $rowsring['results'] as $rowring ) {
                
               $detaiLink = SITE_URL . 'testengagementrings/engagement-ring-detail/' . $rowring['ring_id'];
               $ringImageLink = SITE_URL . 'scrapper/imgs/' . $rowring['ImagePath'];
               $ring_title = $this->getRingTitle($rowring);
               $retail_price  = $rowring['priceRetail'] * PRICE_PERCENT;  //// PRICE_PERCENT : 3.5
               $ring_ourprice = $rowring['priceRetail'];
               $saving_percent = ( 100 - ( ( $ring_ourprice / $retail_price ) * 100 ) );
               $popupBlock .= $this->product_popup_detail( $rowring['ring_id'] );
               $popupLink = SITE_URL . 'testengagementrings/product_popup_detail/'.$rowring['ring_id'] . '/?keepThis=true&TB_iframe=true&width=900&height=600&modal=false';
               
            if( empty($listing) ) {
                
               $similar_rings .= '<div class="prdSection col-sm-3" id="'.$rowring['ring_id'].'">
                                    <a href="'.$detaiLink.'" class="alsoviwed-product-img">
                                            <img class="" src="'.$ringImageLink.'" width="200" alt="'.$ring_title.'" title="'.$ring_title.'" style="display: inline;">
                                    </a>
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
			<div class="product-grid-quick col-sm-3" onmouseover="showTopQuickView('.$rowring['ring_id'].');" onmouseout="hideTopQuickView('.$rowring['ring_id'].');" style="overflow:hidden;">
				<div id="top-quickview'.$rowring['ring_id'].'" style="display: none; position: relative;">
					<a href="Javascript:;" onclick="show_quick_view(\''.$popupLink.'\', \'\', \'nofollow\');" title="Quick View'.$ring_title.'" class="quick-view thickbox" rel="nofollow"><span>Quick View</span></a>
				</div>
				<a title="'.$ring_title.'" href="'.$detaiLink.'"><img alt="'.$ring_title.'" class="" src="'.$ringImageLink.'" width="200" style="display: inline;"></a>
				<h2 class="product-name"><a title="'.$ring_title.'" href="'.$detaiLink.'">'.$ring_title.'</a></h2>
				<div class="price-box">
                                    <p class="old-price"><span class="price-label">Retail Price:</span> 
                                    <span id="old-price-802865" class="price">$'._nf($retail_price, 2).'</span></p>
				<p class="our-price"><span class="price-label">Our Price:</span> 
                                <span id="product-price-'.$rowring['ring_id'].'">$'._nf($ring_ourprice, 2).'</span>
                                    </p>
				</div>
				<ul class="add-to-links-details">
					<li><a class="view-item" href="'.$detaiLink.'">View Item</a></li>
				</ul>
			</div>
			<!-- Mouse Hover DIV STARTS here -->
			<div class="box-detail-over right-box" id="top-box-detail-over-'.$rowring['ring_id'].'" style="display: none;">
				<div class="column3">
					<p>'.$ring_title.'</p>
					<div class="hover-price">
						<div class="popup-prices">
                                                <p class="old-price-qv"><span class="price-label-qv">Retail Price:</span> 
                                                <span id="old-price-'.$rowring['ring_id'].'" class="price-qv">$'._nf($retail_price, 2).'</span></p>
							<p class="old-price-qv"><span class="price-label-qv">Our Price:</span> <span id="product-price-'.$rowring['ring_id'].'" class="new-price-qv">$'._nf($ring_ourprice, 2).'</span> <span class="special-price-label-qv">(Savings: '.round($saving_percent).'%)</span></p>
</div>
					</div>
					<div id="top-product_additional_data_'.$rowring['ring_id'].'"></div>
				</div>
			</div>
			<!-- Mouse Hover DIV ENDS here -->engagement-ring-detail
		</li>';  
		
	
                }
                $similar_rings .= $popupBlock;
                
                
            }
        }
        return $similar_rings;
    }
    
    //// popular listings
    function popularListings($ring_cateid=0, $prod_id=0, $limit=5, $listing='') {
        $rowsring = $this->catemodel->getRingsByCateory($ring_cateid, 0, $limit, $prod_id);
        $similar_rings = '';
        
        if( count($rowsring['results']) > 0 ) {
            foreach( $rowsring['results'] as $rowring ) {
               $detaiLink = SITE_URL . 'testengagementrings/engagement-ring-detail/' . $rowring['ring_id'];
               $ringImageLink = SITE_URL . 'scrapper/imgs/' . $rowring['ImagePath'];
               $ring_title = $this->getRingTitle($rowring, 'similar');
               $retail_price  = $rowring['priceRetail'] * PRICE_PERCENT;  //// PRICE_PERCENT : 3.5
               $ring_ourprice = $rowring['priceRetail'];
               //$saving_percent = ( 100 - ( ( $ring_ourprice / $retail_price ) * 100 ) );
               $popupBlock = $this->product_popup_detail( $rowring['ring_id'] );
               $popupLink = SITE_URL . 'testengagementrings/product_popup_detail/'.$rowring['ring_id'] . '/?keepThis=true&TB_iframe=true&width=900&height=600&modal=false';
               $cate = $this->getCateName( $rowring['catid'] );
               //$detailDesc = 'Metal '. $rowring['matalType'] . ' ' . $rowring['metal_weight']. ' Stone '. $rowring['stone_weight'];
               $results['item_thumbs'] = $this->catemodel->getRingThumbs( $rowring['name'] );
               $product_circle = $this->getProductThumb( $results, 'listing', $rowring['name'], $ring_title);
              
                if($rowring['additional_stones'] == ''){
                    $where_dev_index             = array('carat' => '0.25', 'price !=' => '', 'color !=' => '');
                    $get_dev_index_info          = $this->catemodel->getdata_any_table_limit_order_where('dev_index', $where_dev_index, '1', '0', 'price');
                }else{
            
                    $additional_stones_ex = explode('/', $rowring['additional_stones']);
                    $additional_stones_first_item   = explode('-', $additional_stones_ex['0']);
                    $additional_stones_first_item2   = $additional_stones_first_item['1']; 
                    
                    $check_count = 0;
                    for($i=1; $i<5; $i++){
                        $where_dev_index             = array('price !=' => '', 'color !=' => '');
                        $get_dev_index_info          = $this->catemodel->getdata_any_table_limit_order_by_where_like_after('dev_index', $where_dev_index, $i, $check_count, $additional_stones_first_item2, 'Meas');
                        
                        $additional_meas_ex         = explode('x', $get_dev_index_info->Meas);
                        $dev_index_meas             = str_replace('.', 'x', $additional_meas_ex['0']);
                        $result_new_index_meas      = substr($dev_index_meas['0'], 0, 3);
                        
                        $check_count = $check_count + 1;
                        
                        if($additional_stones_first_item2 == $result_new_index_meas){
                            break;
                        }
                        
                    } 
                    
                    if(empty($get_dev_index_info)){
                        $where_dev_index             = array('carat' => '0.25', 'price !=' => '', 'color !=' => '');
                        $get_dev_index_info          = $this->catemodel->getdata_any_table_limit_order_where('dev_index', $where_dev_index, '1', '0', 'price');
                    }
                } 
                $get_diamond_price  = $get_dev_index_info['0']->price;
                $get_diamond_price  = $get_diamond_price * 1.10;

                $ourPriceNew = _nf($ring_ourprice + $get_diamond_price, 2);
               
//            $similar_rings .= '<div class="product_colsbk">
//                <div class="productRingImg"><a href="'.$detaiLink.'"><img src="'.$ringImageLink.'" width="200" height="153" alt="'.$ring_title.'"></a></div>
//                        <div><img src="'.IMGSRC_LINK.'rating_icon.jpg" alt=""><span class="reviewlabel">(86 Review)</span></div><br>
//                        <div>$ '. _nf($ring_ourprice, 2).'</div>
//                        <div class="setcolor_label">+ Engagement Ring</div><br>
//                        <div class="centerLabel"><a href="'.$detaiLink.'">'.$ring_title.'</a></div>
//                        <div class="setcolor_label">'.$detailDesc.'</div>
//                    </div>';
               $similar_rings .= '<div class="ring_cols col-sm-3" onmouseover="show_collection_block(\'hover_'.$rowring['ring_id'].'\')" onmouseout="hide_block(\'hover_'.$rowring['ring_id'].'\')">
                    <div><a href="'.$detaiLink.'">
                    <div class="set_thumb_img" id="'.$rowring['ring_id'].'">
                        '.$product_circle['thumb_image'].'
                    </div>    
                    </a></div>
                    <div class="clear"></div>
                    <div>'.$ring_title.'</div>
                    <div style="display:none;"><img src="'.SITE_URL.'img/heart_diamond/matching_ring_star.jpg" alt="" /></div><br>
                    <div class="ring_price_label">$'. $ourPriceNew.'</div>
                    <div>Complementary Match</div>
                    ' . $this->get_ring_hover_view($rowring, $cate['sub_cname'], $rowring['ring_id'], $ringImageLink, $ring_title, $results, $popupLink) . '
                </div>' . $popupBlock;
            
            }
        }
        
        return $similar_rings;
    }
    ///// get rings listings view according to the category id
    function ring_lisitngs_view( $results = array()) {
        $ringlistings = '';
        
        if( count($results) > 0 ) {
            foreach( $results as $rowrings ) {
                $ringDetail = SITE_URL . 'testengagementrings/engagement-ring-detail/' . $rowrings['ring_id'];
                $ringsImg = SITE_URL . 'scrapper/imgs/' . $rowrings['ImagePath'];
                $priceMargin = $this->commonmodel->inventoryPriceMargin($rowrings['catid'], UNIQUE_OPTION);
                $rowrings['priceRetail'] = $rowrings['priceRetail'] * $priceMargin;
                $retailPrice = _nf($rowrings['priceRetail'] * PRICE_PERCENT, 2);
                $ourPrice = _nf($rowrings['priceRetail'], 2);
                $rid = $rowrings['ring_id'];
                //$cate = $this->getCateName( $rowrings['catid'] );  
        
                $ringTitle = $this->getRingTitle($rowrings);
                $popupLink = SITE_URL . 'testengagementrings/product_popup_detail/' . $rid . '/?keepThis=true&TB_iframe=true&width=900&height=600&modal=false';
                
                $ringlistings .= '<li class="item" data-url="'.$ringDetail.'">
      <div class="product-grid-quick" onmouseover="showQuickView('.$rid.');" onmouseout="hideQuickView('.$rid.');" style="overflow:hidden;">
        <div id="quickview'.$rid.'" style="display: none;"> 
        	<a href="Javascript:;" onclick="show_quick_view(\''.$popupLink.'\',\'\',\'nofollow\');" title="'.$ringTitle.'" class="quick-view thickbox" rel="nofollow"><span>Quick View</span></a>
        </div>
        <div class="product-image"><a class="product-labels" href="'.$ringDetail.'" title="'.$ringTitle.'">
        	
        	<img class="" src="'.$ringsImg.'" itemprop="image" alt="'.$ringTitle.'" style="display: inline;"></a></div>
        	
		<h3><a href="'.$ringDetail.'" title="'.$ringTitle.'"> <span>' .  $ringTitle . '</span></a></h3>
          
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
      <div class="box-detail-over " id="hover_'.$rid.'" style="display: none;">
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
    
    ///// get rings listings view according to the category id
    function get_unique_ring_listing( $results = array()) {

        $ringlistings        = '';
        $popup_block = '';

        if (empty($results)) {
            $ringlistings .= '<div>NO Ring List Found!</div>';
            $popup_block  .= '';
            
            $return['ring_listing'] = $ringlistings;
            $return['popup_block'] = $popup_block;

            return $return;
        }
        
        if( count($results) == 0 ) {
            $ringlistings .= '<div>NO Ring List Found!</div>';
            
            return $ringlistings;
        }
        $total_records = count( $results );
        $i = 1;
        
        
        foreach( $results as $rowrings ) {
            if( $i <= 4 ) {
                $ringlistings .= $this->rings_block( $rowrings );
                $popup_block .= $this->product_popup_detail($rowrings['ring_id']);
            }
            
            $i++;

        }
        
        if( $total_records >= 5 ) {
            $ringlistings .= '<div class="half_block_cols col-sm-6">';
            $j = 1;
            foreach( $results as $rowrings ) {
                if( $j > 4 && $j <= 8 ) {
                    $ringlistings .= $this->rings_block( $rowrings );
                    $popup_block .= $this->product_popup_detail($rowrings['ring_id']);
                }
               $j++;
            }
            $ringlistings .= '</div>';

            $ringlistings .= '<div class="half_block_cols col-sm-6" style="width:518px;height:548px;padding-top:20%;text-transform:uppercase;color:#ffffff;background-color:#000000;text-align:center;font-size:40px;">'.get_site_contact_info('sites_title').'';
            $ringlistings .= '</div>';
            $ringlistings .= '<div class="clear"></div>';
        }
        
        if( $total_records >= 9 ) {
            $k = 1;
            foreach( $results as $rowrings ) {
                if( $k >= 9 && $k <= 16 ) {
                     $ringlistings .= $this->rings_block( $rowrings );
                     $popup_block .= $this->product_popup_detail($rowrings['ring_id']);
                }
                
                $k++;
            }
        }
        
        if( $total_records >= 17 ) {
            $ringlistings .= '<div class="half_block_cols col-sm-6" style="width:518px;height:548px;padding-top:20%;text-transform:uppercase;color:#ffffff;background-color:#000000;text-align:center;font-size:40px;">'.get_site_contact_info('sites_title').'';
            $ringlistings .= '</div>';

            $ringlistings .= '<div class="half_block_cols col-sm-6">';
            $m = 1;
            foreach( $results as $rowrings ) {
                if( $m >= 17 && $m <= 20 ) {
                    $ringlistings .= $this->rings_block( $rowrings ); 
                    $popup_block .= $this->product_popup_detail($rowrings['ring_id']);
                }
            
               $m++;
            }
            $ringlistings .= '</div>';
        }
        
        if( $total_records > 20 ) {
            $p = 1;
            
            foreach( $results as $rowrings ) {
                if( $p > 20 ) {
                    $ringlistings .= $this->rings_block( $rowrings );
                    $popup_block .= $this->product_popup_detail($rowrings['ring_id']);
                }

                $p++;

            }
        }
        
        $return['ring_listing'] = $ringlistings;
        $return['popup_block'] = $popup_block;
        
        return $return;
    }
    
    //// rings block
    function rings_block($rowrings=array()) {
        $ringDetail = SITE_URL . 'testengagementrings/engagement-ring-detail/' . $rowrings['ring_id'];
        $ringsImg = SITE_URL . 'scrapper/imgs/' . $rowrings['ImagePath'];
        $priceMargin = $this->commonmodel->inventoryPriceMargin($rowrings['catid'], UNIQUE_OPTION);
        $rowrings['priceRetail'] = $rowrings['priceRetail'] * $priceMargin;
        $retailPrice = $rowrings['priceRetail'] * PRICE_PERCENT;
        $ourPrice = _nf($rowrings['priceRetail'], 2);
        $rid = $rowrings['ring_id'];
        $saving_percent = calc_save_percent( $rowrings['priceRetail'] );
        $cate = $this->getCateName( $rowrings['catid'] );
        $ringTitle = $rowrings['matalType'].' '.$cate['main_cname'] . ' ' . $rowrings['stone_weight'] . ' ' . $cate['sub_cname'] . '';
        //$ringTitle = $this->getRingTitle($rowrings);
        $popupLink = SITE_URL . 'testengagementrings/product_popup_detail/' . $rid . '/?keepThis=true&TB_iframe=true&width=850&height=600&modal=false';
        $results['item_thumbs'] = $this->catemodel->getRingThumbs( $rowrings['name'] );
        $product_circle = $this->getProductThumb( $results, 'listing', $rowrings['name'], $ringTitle);
        
        if($rowrings['additional_stones'] == ''){
            $where_dev_index             = array('carat' => '0.25', 'price !=' => '', 'color !=' => '');
            $get_dev_index_info          = $this->catemodel->getdata_any_table_limit_order_where('dev_index', $where_dev_index, '1', '0', 'price');
        }else{
    
            $additional_stones_ex = explode('/', $rowrings['additional_stones']);
            $additional_stones_first_item   = explode('-', $additional_stones_ex['0']);
            $additional_stones_first_item2   = $additional_stones_first_item['1']; 
            
            $check_count = 0;
            for($i=1; $i<5; $i++){
                $where_dev_index             = array('price !=' => '', 'color !=' => '');
                $get_dev_index_info          = $this->catemodel->getdata_any_table_limit_order_by_where_like_after('dev_index', $where_dev_index, $i, $check_count, $additional_stones_first_item2, 'Meas');
                
                $additional_meas_ex         = explode('x', $get_dev_index_info->Meas);
                $dev_index_meas             = str_replace('.', 'x', $additional_meas_ex['0']);
                $result_new_index_meas      = substr($dev_index_meas['0'], 0, 3);
                
                $check_count = $check_count + 1;
                
                if($additional_stones_first_item2 == $result_new_index_meas){
                    break;
                }
                
            } 
            
            if(empty($get_dev_index_info)){
                $where_dev_index             = array('carat' => '0.25', 'price !=' => '', 'color !=' => '');
                $get_dev_index_info          = $this->catemodel->getdata_any_table_limit_order_where('dev_index', $where_dev_index, '1', '0', 'price');
            }
        }    
        $get_diamond_price      = $get_dev_index_info['0']->price;
        $get_dev_index_price    = $get_diamond_price * 1.10; 
        
        //echo $get_dev_index_info['0']->carat; exit();
        
        $total_carat = $rowrings['stone_weight'] + $get_dev_index_info['0']->carat;
            
        $ringTitle = $rowrings['matalType'].' '.$cate['main_cname'] . ' ' . $total_carat . ' ' . $cate['sub_cname'] . '';
        
            //onClick="submitCartForm(\''.SITE_URL.'jewelleries/addtoshoppingcart/\', \''.$rid.'\')"
            //echo $get_dev_index_info['0']->price;
            //echo '<pre>'; print_r($get_dev_index_info); exit();
           
           $ourPriceNew = _nf($rowrings['priceRetail'] + $get_dev_index_price, 2);
           $retailPrice = $retailPrice + $get_dev_index_price;
                
                $ringlistings = '<li class="item rings_cols col-sm-3" data-url="'.$ringDetail.'" onmouseover="show_collection_block(\'hover_'.$rid.'\')" onmouseout="hide_block(\'hover_'.$rid.'\')">
      <div class="product-grid-quick" onmouseover="showQuickView('.$rid.');" onmouseout="hideQuickView('.$rid.');" style="overflow:hidden;">
        <div class="product-image"><a class="product-labels" href="'.$ringDetail.'" id="'. trim($rowrings['name']) .'" title="'.$ringTitle.'">        	
        	<div class="set_thumb_img" id="'.$rowrings['ring_id'].'">
                    '.$product_circle['thumb_image'].'
                </div>                 
                </a>
            </div>
        	<div><ul class="ringsThumb" id="' . trim( $rowrings['name'] ) . '">'.$product_circle['thumb_circle'].'</ul><div class="clear"></div></div>
		<h3><a href="'.$ringDetail.'" title="'.$ringTitle.'"> <span>' .  $ringTitle . '</span></a></h3> 
        <div class="set_item_info">
            <div class="ring_view_rating" style="display:none;"><img src="'.SITE_URL.'img/heart_diamond/rating_icong_view.jpg" alt="" /></div>
            <div class="priceLable">$ ' . _nf($rowrings['priceRetail'] + $get_dev_index_price, 2) . '</div>
         </div>
         <div class="addto_cart_icon">
            <a href="'.$ringDetail.'">View Details</a>   
            
         </div>
      </div>
      <div class="box-detail-over" id="hover_'.$rid.'" style="display: none;">
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
                    $'.$ourPriceNew.'                </span>
		    <span class="special-price-label-qv">(Savings: '.$saving_percent.'%)</span>
                </p>
        </div>
          </div>
          <div id="product_additional_data_'.$rid.'"><div class="product_additional_data">
          
          <span id="item-info"><b>Item Information</b></span>
            <table id="item-tbl" class="data-table2" width="100%" cellspacing="0" cellpadding="0">
              <tbody>';

                    $rowsring = $rowrings;
                
                    $ringlistings .= '    
                        <tr class="first-row">
                          <th style="width:40%;color:#ff0000;font-weight:bold;">Item Code</th>
                          <td style="color:#ff0000;font-weight:bold;">'.$rowsring['style_group'].'</td>
                        </tr>
                        <tr class="second-row">
                          <th style="width:40%;">Approx. Weight</th>
                          <td>'.$rowsring['metal_weight'].'</td>
                        </tr>
                        <tr class="first-row">
                          <th style="width:40%;">Measurements</th>
                          <td>Top Width: '.$rowsring['top_width'].' mm, Bottom Width: '.$rowsring['bottom_width'].' mm, Top Height: '.$rowsring['top_height'].' mm, Bottom Height: '.$rowsring['bottom_height'].' mm</td>
                        </tr>
                        <tr class="second-row">
                          <th style="width:40%;">Metal</th>
                          <td>'.$rowsring['matalType'].'</td>
                        </tr>
                        <tr class="first-row">
                          <th style="width:40%;">Style Name:</th>
                          <td>'.$rowsring['name'].'</td>
                        </tr>
                        <tr class="first-row">
                          <th style="width:40%;">Style Group Name:</th>
                          <td>'.$rowsring['style_group'].'</td>
                        </tr>
                        <tr class="first-row">
                          <th style="width:40%;">Supplied Stones:</th>
                          <td>'.$rowsring['supplied_stones'].'</td>
                        </tr>
                        <tr class="first-row">
                          <th style="width:40%;">Supplied Stone Weight:</th>
                          <td>'.$rowsring['stone_weight'].'</td>
                        </tr>
                        <tr class="first-row">
                          <th style="width:40%;">Center Stone Sold Separately:</th>
                          <td>'.$rowsring['additional_stones'].'</td>
                        </tr>';
              
            $ringlistings .=  '</tbody>
            </table>  
          
          </div></div>
        </div>
      </div>
        ' . $this->get_ring_hover_view($rowrings, $cate['sub_cname'], $rid, $ringsImg, $ringTitle, $results, $popupLink) . '
    </li>';
            
        return $ringlistings;
    }
    
    
    
    
    
    //// ring hover block
    //<div class="quick_view"><a href="Javascript:;" onclick="view_simple_popup(\''.$rid.'\')" title="'.$ringTitle.'" rel="nofollow">Quick <br> View #</a></div>
    function get_ring_hover_view($rowrings=array(), $style_name='', $rid=0, $ringsImg='', $ringTitle='', $results='', $popupLink='') {
        
        
        
        $ring_hover = '<div class="collection_hover_bk" id="hover_'.$rid.'">
        <div class="view_count">1/'.count($results['item_thumbs']).'</div>
        <div class="quick_view"><a href=" '.SITE_URL().'testengagementrings/engagement-ring-detail/'.$rid.'" title="'.$ringTitle.'" rel="nofollow">Quick <br> View</a></div>
        <div class="left_arrow_view"><a href="#javascript" onclick="button_previous(\''.$rowrings['ring_id'].'\'); show_number_count(\'hover_'.$rowrings['ring_id'].'\', \''.count($results['item_thumbs']).'\', \'back\')"><img src="'.SITE_URL.'img/heart_diamond/left_arrow_icon.jpg" alt="" /></a></div>
        <div class="right_arrow_view"><a href="#javascript" onclick="button_next(\''.$rowrings['ring_id'].'\'); show_number_count(\'hover_'.$rowrings['ring_id'].'\', \''.count($results['item_thumbs']).'\', \'\')"><img src="'.SITE_URL.'img/heart_diamond/right_arrow_icon.jpg" alt="" /></a></div>
             <form name="form1" id="form_'.$rid.'" method="post">
             <input type="hidden" name="txt_rstyle" id="txt_rstyle" value="'.$style_name.'" />
             <input type="hidden" name="3ez_price" value="" />
             <input type="hidden" name="5ez_price" value="" />
             <input type="hidden" name="main_price" value="'.$rowrings['priceRetail'].'" />
             <input type="hidden" name="price" value="'.$rowrings['priceRetail'].'" />
             <input type="hidden" name="vender" value="unique" />
             <input type="hidden" name="url" value="'.$ringsImg.'" />
             <input type="hidden" name="prodname" value="'.$ringTitle.'" />
             <input type="hidden" name="diamnd_count" value="'.$rowrings['supplied_stones'].'" />
             <input type="hidden" name="ring_shape" value="" />
             <input type="hidden" name="ring_carat" value="" />
             <input type="hidden" name="prid" id="prid" value="'.trim($rowrings['ring_id']).'" />
             <input type="hidden" name="txt_ringtype" value="generic_ring" />
             <input type="hidden" name="txt_ringsize" value="" />
             <input type="hidden" name="txt_metal" value="'.$rowrings['metal'].'" />
             <input type="hidden" name="metals_weight" value="'.$rowrings['weight'].'" />
             <input type="hidden" name="vendors_name" value="Unique Jewelry" />
             <input type="hidden" name="center_stone_id" id="center_stone_id" />
             <input type="hidden" name="txt_qty" value="1" />
             </form>
        </div>';
        
        return $ring_hover;
    }
    
    function rings_block_old($rowrings=array()) {
            $ringDetail = SITE_URL . 'testengagementrings/engagement-ring-detail/' . $rowrings['ring_id'];
            $ringsImg = SITE_URL . 'scrapper/imgs/' . $rowrings['ImagePath'];
            $priceMargin = $this->commonmodel->inventoryPriceMargin($rowrings['catid'], UNIQUE_OPTION);
            $rowrings['priceRetail'] = $rowrings['priceRetail'] * $priceMargin;
            //$retailPrice = _nf($rowrings['priceRetail'] * PRICE_PERCENT, 2);
            $ourPrice = _nf($rowrings['priceRetail'], 2);
            //$rid = $rowrings['ring_id'];
            //$cate = $this->getCateName( $rowrings['catid'] );
            $results['item_thumbs'] = $this->catemodel->getRingThumbs( $rowrings['name'] );
            $product_circle = $this->getProductThumb( $results, 'listing', $rowrings['name'] );

            $ringTitle = $this->getRingTitle($rowrings);

            $ringlistings .= '<div class="rings_cols">
            <div class="">
                <a href="'.$ringDetail.'" id="'. trim($rowrings['name']) .'" class="img_block"><img src="'.$ringsImg.'" alt="'.$ringTitle.'" width="175" height="159" /></a><br><br>
                <ul class="ringsThumb" id="' . trim( $rowrings['name'] ) . '">'.$product_circle['thumb_circle'].'</ul>
            </div><br>
            <div class="detail_row">
                '.$ringTitle.'<br>
                $'.$ourPrice.'<br>
            </div>
        </div>';
            
        return $ringlistings;
        
    }
    
    function unique_cate_image($ring_image='') {

        $cate_img_link = RINGS_IMAGE.'crone/'.$ring_image;
        if( !empty($ring_image) ) {
    
            if($ring_image == 'imgcats/ Color Stones_PD%201181_thumb_160.jpg'){
                $cate_img_link = 'http://www.uniquesettings.com/product_images/style_attribute_image/45/337/PD%201181_thumb_160.jpg?2012';
            }
        
            $cateImgLink = $cate_img_link; //( getimagesize($cate_img_link) ? $cate_img_link : SITE_URL.'images/no_img_found.jpg' );
        } else {
            $cateImgLink = SITE_URL.'images/no_img_found.jpg';
        }
        return $cateImgLink;
    }
    ////// get the category list view
    function category_cols_list_view($cid=0) {
        
        $ringresults = $this->catemodel->getSubCategory($cid);
        //print_ar($ringresults);
        
        $catelist_view = '';
        $cateID = array();
        
        if( count($ringresults) > 0 ) {
            foreach( $ringresults as $rowcate ) {
                
                $cateImgLink = $this->unique_cate_image( $rowcate['image'] );
                //$detaiLink = SITE_URL.'testengagementrings/engagement_ring_listings/'.$rowcate['id'];
                $detaiLink = SITE_URL.'testengagementrings/engagementrings/'.$rowcate['id'];
                
                $ringTitle = $rowcate['catname'] . ' Diamond';
                
                $catelist_view .= '<div class="rings_cols col-sm-3">
                            <div class="">
                                <a href="'.$detaiLink.'" class="img_block"><img src="'.$cateImgLink.'" alt="'.$ringTitle.'" width="175" height="159" /></a><br><br>
                            </div><br>
                            <div class="detail_row">
                                '.$ringTitle.'<br>
                            </div>
                        </div>';
                $cateID[] = $rowcate['id'];
            }
        } else {
            $catelist_view .= 'false';
        }
        
        $catelist['cate_list_view'] = $catelist_view;
        $catelist['cateid'] = $cateID;
                
        return $catelist;
    }
    
    //// get ring title
function getRingTitle($rowring=array(), $similar='') {
    $cate   = $this->getCateName( $rowring['catid'] ); 
    if( empty($similar) ) {
        $rtitle = $rowring['matalType'].' '.$cate['main_cname'].' Cut Diamond Unique Engagement Ring '.$rowring['stone_weight'].' '.$cate['sub_cname'] .' Style';
    } else {
      $rtitle = $rowring['matalType'].' '.$cate['main_cname'].' Cut Diamond Unique <br>Engagement Ring '.$rowring['stone_weight'].' '.$cate['sub_cname'] .' Style';
    }   
       return $rtitle;
    }
    ///// get category name
    function getCateName( $cid=0 ) {
        $catevalue = array();
        
        $subparent = $this->catemodel->getparentCateID( $cid );
        $parent_cid = $this->catemodel->get_unique_main_cate_id( $cid );
        $catevalue['main_cname'] = $this->catemodel->getRingCategoryName( $cid );
        $catevalue['sub_cname'] = $this->catemodel->getRingCategoryName($subparent);        
        $catevalue['main_cid'] = $cid;
        
        $catevalue['sub_cid']  = $subparent;
        if( $cid == 40 || $subparent == 40 ) {
            $catevalue['main_cate_name'] = 'Engagement Rings';
            $catevalue['main_cate_id'] = 40;
        } else if( $cid == 57 || $subparent == 57 ) {
            $catevalue['main_cate_name'] = 'Necklace and Pendants';
            $catevalue['main_cate_id'] = 57;
        } else if( $parent_cid == 63 ) {
            $catevalue['main_cate_name'] = 'Bands';
            $catevalue['main_cate_id'] = 63;
        } else if( $parent_cid == 7 ) {
            $catevalue['main_cate_name'] = 'Engagement Rings';
            $catevalue['main_cate_id'] = 7;
        } else {
            $catevalue['main_cate_name'] = '';
            $catevalue['main_cate_id'] = 0;
        }
        $catevalue['parent_cid'] = $parent_cid;
        //print_ar($catevalue);
        
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
    function listingdetail($id=0, $popup='', $setcols='') {
        $rowsring = $this->catemodel->getRingsDetailViaId($id, '', ''); //print_ar($rowsring);
        $suport_shape = $this->getSuportedShape( $rowsring );
        $suported_shapes = $this->getDimaondShapeImage( $rowsring );
        
        $view_itemdetail = '';
        $view_itemdetail .= '<span id="item-info"><b>Item Information</b></span>
<table id="item-tbl" class="data-table2" width="100%" cellspacing="0" cellpadding="0">
  <tbody>
    <tr class="first-row">
      <th style="width:40%;color:#ff0000;font-weight:bold;">Item Code</th>
      <td style="color:#ff0000;font-weight:bold;">'.$rowsring['style_group'].'</td>
    </tr>
    <tr class="second-row">
      <th style="width:40%;">Approx. Weight</th>
      <td>'.$rowsring['metal_weight'].'</td>
    </tr>
    <tr class="first-row">
      <th style="width:40%;">Measurements</th>
      <td>Top Width: '.$rowsring['top_width'].' mm, Bottom Width: '.$rowsring['bottom_width'].' mm, Top Height: '.$rowsring['top_height'].' mm, Bottom Height: '.$rowsring['bottom_height'].' mm</td>
    </tr>
    <tr class="second-row">
      <th style="width:40%;">Metal</th>
      <td>'.$rowsring['matalType'].'</td>
    </tr>
    <tr class="first-row">
      <th style="width:40%;">Style Name:</th>
      <td>'.$rowsring['name'].'</td>
    </tr>
    <tr class="first-row">
      <th style="width:40%;">Style Group Name:</th>
      <td>'.$rowsring['style_group'].'</td>
    </tr>
    <tr class="first-row">
      <th style="width:40%;">Supplied Stones:</th>
      <td>'.$rowsring['supplied_stones'].'</td>
    </tr>
    <tr class="first-row">
      <th style="width:40%;">Supplied Stone Weight:</th>
      <td>'.$rowsring['stone_weight'].'</td>
    </tr>
    <tr class="first-row">
      <th style="width:40%;">Center Stone Sold Separately:</th>
      <td>'.$rowsring['additional_stones'].'</td>
    </tr>
    <tr class="first-row">
      <th style="width:40%;">Diamond Shapes:</th>
      <td>'.$suport_shape.'</td>
    </tr>';
        
    if( !empty( $suported_shapes) ) {
   $view_itemdetail .= '<tr class="first-row">
      <th style="width:40%;">Diamond Shapes View:</th>
      <td>'.$suported_shapes.'</td>
    </tr>';
    }
     $cate = $this->getCateName( $rowsring['catid'] );
     $view_diamond_info = '';
     
 $view_itemdetail .= '</tbody></table>';
 $view_diamond_info .= '<div><span id="item-diamond"><b>Diamond Information</b></span></div>
                        <table id="diamond-tbl" class="data-table2" width="100%" cellspacing="0" cellpadding="0">
                          <tbody>
                            <tr class="first-row">
                              <th style="width:40%;">Setting Type</th>
                              <td>'.$cate['main_cname'].'</td>
                            </tr>
                            <tr class="second-row">
                              <th style="width:40%;">Supplied Stones</th>
                              <td>'.$rowsring['supplied_stones'].'</td>
                            </tr>
                            <tr class="first-row">
                              <th style="width:40%;">Supplied Stone Weight</th>
                              <td>'.$rowsring['stone_weight'].'</td>
                            </tr>
                            <tr class="second-row">
                              <th style="width:40%;">Diamond Shapes</th>
                              <td>'.$suport_shape.'</td>
                            </tr>
                            <tr class="second-row">
                              <th style="width:40%;">Clarity</th>
                              <td>VVS1 to SI2</td>
                            </tr>
                            <tr class="second-row">
                              <th style="width:40%;">Color</th>
                              <td>D to L</td>
                            </tr>
                          </tbody>
                        </table>';
 
       if( empty($setcols) ) {
           $item_detail = $view_itemdetail . $view_diamond_info;
       } else {
           $item_detail['item_information'] = $view_itemdetail;
           $item_detail['diamond_information'] = $view_diamond_info;
       }
 
        if( empty($popup) ) {
            echo $view_itemdetail . $view_diamond_info;
        } else {
            
            return $item_detail;
        }
        
    }
    //// product popup detail
    function product_popup_detail($id=0) {
       
       //echo 'FFF'; exit(); //
       return;
        
       $data = $this->getCommonData();
       $rowsring = $this->catemodel->getRingsDetailViaId($id, '', ''); //print_ar($rowsring);
       
       $data['title'] = 'Engagement Rings';
       $data['listings_detail'] = $this->listingdetail( $id, 'popup', 'info' );
       $data['ring_title'] = $this->getRingTitle($rowsring);
       $rings_thumb = $this->getProductThumb( $rowsring, 'popup' );
       $data['rings_thumb'] = $rings_thumb['thumb_circle'];
       $data['ringimg']   = SITE_URL . 'scrapper/imgs/'.$rowsring['ImagePath'];
       $data['rowsring']   = $rowsring;
       $retail_price  = $rowsring['priceRetail'] * PRICE_PERCENT;  //// PRICE_PERCENT : 3.5
       $salesprice = $rowsring['priceRetail'];
       $saving_percent = ''; //calc_save_percent( $rowsring['priceRetail'] );
       $results['item_thumbs'] = $this->catemodel->getRingThumbs( $rowsring['name'] );
       $product_circle = $this->getProductThumb( $results, 'listing', $rowsring['name'], $data['ring_title'], '400', '', 'details');
       $data['product_thums'] = $product_circle['thumb_image'];
       $cate = $this->getCateName( $rowsring['catid'] );
       
       //echo $data['product_thums']; exit();
       
       $ring_detail_bk = '<div id="pop_'.$id.'" class="simplePopup collection_view">';
       $ring_detail_bk .= '<div class="col-sm-5 imgleft_block"><div class="product-image product-image-zoom zoomright" id="ringsthumb_view yy">
                    <div class="set_thumb_img" id="popup_'.$rowsring['ring_id'].'">                                
                            <div class="" id="show_thumb_view"></div>
                                  '.$data['product_thums'].'
                            </div>
                    <div class="left_arrow_view"><a href="#javascript" onclick="button_previous(\'popup_'.$rowsring['ring_id'].'\')"><img src="'.SITE_URL.'img/heart_diamond/left_arrow_view_ic.jpg" alt="" /></a></div>
        <div class="right_arrow_view"><a href="#javascript" onclick="button_next(\'popup_'.$rowsring['ring_id'].'\')"><img src="'.SITE_URL.'img/heart_diamond/right_arrow_view_ic.jpg" alt="" /></a></div>
                </div>';
       $ring_detail_bk .= '<div class="clear"></div><br>
                <div>
                    '.$data['listings_detail']['diamond_information'].'
                </div></div>';
       $ring_detail_bk .= '<div class="col-sm-6 pull-right"><br></br>
          <div class="price-box">
              <div class="product-name"><h1>'.$data['ring_title'].'</h1></div>
              <p class="old-price fb-old-price f-fix"> 
                  <span class="price-label">Item Code:</span> <span>'.$rowsring['name'].'</span> 
              </p>
            <p class="old-price"> <span class="retail-label">Retail Price:</span> <span class="price" id="old-price-'.$rowsring['ring_id'].'">$'._nf($retail_price, 2).'</span> <span class="pnotify"> <a href="#" id="productupdates-button4" onmouseover="new Productupdates();"> <i></i>Get Price Update </a> </span> </p>
            <p class="old-price"> <span class="ourprice-label">Our Price:</span> <span class="new-price" id="product-price-'.$rowsring['ring_id'].'">$'._nf($salesprice, 2).'</span> <span class="special-price-label" id="old_price">(Savings:<?php echo $saving_percent; ?>%)</span> <span id="google_discount"></span> <span id="twitter_discount"></span> <span id="facebook_discount"></span> <span id="pinterest_discount"></span> <span id="total_price"></span> 
              <!-- // customm code for shipping free text --> 
              <strong><a class="freeShip" href="#" target="_blank">Ships for free&nbsp;*</a></strong> 
              <!-- // End customm code --> 
            </p>
          </div>
          <form id="'.$id.'" action="" method="">
          <label for="qty">QUANTITY:</label>
          <input type="text" name="qty" id="qty" maxlength="12" value="1" title="Qty" class="input-text qty required-entry">
          <div class="product-options-bottom">
            <div class="add-to-cart-1">
                <input type="hidden" name="txt_rstyle" id="txt_rstyle" value="'.$cate['sub_cname'].'">
                <input type="hidden" name="3ez_price" value="0">
                <input type="hidden" name="5ez_price" value="0">
                <input type="hidden" name="main_price" id="main_price" value="'.$rowsring['priceRetail'].'">
                <input type="hidden" name="price" value="'.$rowsring['priceRetail'].'">
                <input type="hidden" name="vender" value="unique" />
                <input type="hidden" name="url" value="'.$data['ringimg'].'">
                <input type="hidden" name="prodname" value="'.$rowsring['name'].'">
                <input type="hidden" name="diamnd_count" value="'.$rowsring['supplied_stones'].'">
                <input type="hidden" name="ring_shape" value="">
                <input type="hidden" name="ring_carat" value="'.$rowsring['metal_weight'].'">
                <input type="hidden" name="prid" id="prid" value="'.$rowsring['ring_id'].'">
                <input type="hidden" name="txt_ringtype" value="generic_ring">
                <input type="hidden" name="txt_ringsize" value="">
                <input type="hidden" name="txt_metal" value="">
                <input type="hidden" name="metals_weight" value="'.$rowsring['metal_weight'].'">
                <input type="hidden" name="vendors_name" value="Unique Jewelry" />
                <input type="hidden" name="center_stone_id" id="center_stone_id" />
                <input type="hidden" name="txt_qty" value="1" />                          
                <div>
                    <a href="#javascript" onclick="add_to_cart_form(\''.SITE_URL.'jewelleries/addtoshoppingcart/\', \''.$id.'\')" class="add_to_cart_btn" id="addtoshopping">Add To Cart</a>
                </div>
            </div>
          </div>
          </form>
          <br clear="all">
          <div style="clear:both;width:100%;">
            <div class="box-collateral box-additional"> <br clear="all">
                    '.$data['listings_detail']['item_information'].'
              <div class="other_button_links">
                  <a href="#"><img src="'.SITE_URL.'img/heart_diamond/add_to_wish_list.jpg" alt="Add To Wishlist" /></a>
                  <a href="#"><img src="'.SITE_URL.'img/heart_diamond/add_to_compare_ic.jpg" alt="Add to Compare" /></a>
                  <a href="#"><img src="'.SITE_URL.'img/heart_diamond/email_to_friend_ic.jpg" alt="Email to Friend" /></a>
              </div>
            </div>
          </div>
        </div>';
       $ring_detail_bk .= '</div>';
       
       return $ring_detail_bk;
       //$this->load->view('engagementringstrial/product_popup_detail', $data);
        //$this->output($output, $data);        
    }
    
    
    
    ///// view center stone diamond
    function viewCenterStone($ring_id=0) {
    //$view_rappnet = '';
    $data['stones_list'] = $this->getCenterStoneList( $ring_id );
    //$image_path = SITE_URL.'images/shapes_images/';
    //var_dump( $this->ci->session->all_userdata()  );
    
    $this->load->view('engagementringstrial/view_center_stone_list', $data);
    
    }
    
    ///// view center stone diamond
    function ViewDiamondResult($ring_id=0) {
        $data['stones_list'] = $this->getCenterStoneList( $ring_id );
        $data['row_detail'] = $data['stones_list'][0];

        $this->load->view('engagementringstrial/view_diamond_result_list', $data);
    
    }
    
    ///// view center stone diamond
    function getDiamondResultDetail($ring_id=0, $type='ring') {
        $data['stones_list'] = $this->getCenterStoneList( $ring_id );
        
        if( $type === 'diamond' ) {
            $lotid = urldecode($ring_id);
            $lot_id = str_replace('_slash_', '/', $lotid);
        
            $data['row_detail'] = $this->diamondmodel->getDetailsByLot($lot_id);
            
        } else {
            $data['row_detail'] = $data['stones_list'][0];
        }        

        $this->load->view('engagementringstrial/view_diamond_result_detail', $data);
    
    }
    
    ///// get the ring diamond detail
    function getDiamondListDetail($lot_id=0) {
        $lot_id = urldecode($lot_id);
        $lot_id = str_replace('_slash_', '/', $lot_id);
        
        $data['row_detail'] = $this->diamondmodel->getDetailsByLot($lot_id);

        $this->load->view('engagementringstrial/ring_diamond_detail', $data);
    
    }
    
    ///// show the carat graph
    function showCaratGraph($lot_id=0) {
        $lot_id = urldecode($lot_id);
        $lot_id = str_replace('_slash_', '/', $lot_id);
        
        $data['row_detail'] = $this->diamondmodel->getDetailsByLot($lot_id);

        $this->load->view('engagementringstrial/carat_graph_page', $data);
    
    }
    
    function plus_count($total=0, $back='') {
       
        if( empty($back) ) {
            if( $_SESSION['count'] >= $total  ) {
                $_SESSION['count'] = 0;
            }

            $_SESSION['count'] = $_SESSION['count'] + 1;
        } else {
            if( $_SESSION['count'] <= 1  ) {
                $_SESSION['count'] = $total + 1;
            }

            $_SESSION['count'] = $_SESSION['count'] - 1;
        }
        
        
        echo $_SESSION['count'] . '/' . $total;
    }
}
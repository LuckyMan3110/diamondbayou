<?php
class Selection extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('ringsection');
		$this->load->helper('contentsection');
		$this->load->model('Commonmodel');
		$this->load->model('Catemodel');
		$this->load->model('Diamondmodel');
		$this->load->model('Engagementringsbetamodel');
		$this->load->model('Davidsternmodel');
		$this->load->model('User');
		$this->load->library('session');
	}

	function index(){
		$data = $this->getCommonData(); 
		$data['title'] = 'Jewelry';
		$output = $this->load->view('jewelry/index' , $data , true);
		$this->output($output , $data);
	}

    private function getCommonData($banner=''){
		$data = array();
		$data = $this->Commonmodel->getPageCommonData();
		return $data;
    }

	/* View diamond detail in popup */
	function getDiamondDetail($lot=0) {
		$lot = urldecode($lot);
		$row_detail = $this->Diamondmodel->getDetailsByLot($lot);
		$data['row_detail'] = $row_detail;
		$data['diamond_type'] = 'White Diamond';
		$image_path = SITE_URL.'images/shapes_images/';
		$data['diamond_shape'] = view_shape_value($view_diamondimg, $row_detail['shape']);
		$data['view_shapeimage'] = $image_path.$view_diamondimg;
		$data['detail_pglink'] = '#';

		$this->load->view('engagementringstrial/view_diamondlist_details', $data);
	}

	function get_page_content($topic='') {
		$row_content = $this->Commonmodel->getCompanyInfoRow($topic);
		if(isset($row_content['content'])){
		$page_content = check_empty($row_content['content'], 'Coming Soon');
		}else{
		$page_content = 'Coming Soon';	
		}
		return $page_content;
	}

	/* Category listings */
	function engagementrings($cates_id = 40) {
		$data = $this->getCommonData();
		$data['cate_name']          = $this->getCateName($cates_id);
		$rings_cate                 = $this->category_cols_list_view($cates_id);
		$data['ring_categoies']     = $rings_cate['cate_list_view'];
		$caterow                    = $this->Catemodel->getRingCategoryRow( $cates_id );
		$cate_name                  = $this->Catemodel->getRingCategoryName( $cates_id );
		$data['category_name']      = $cate_name.' Diamond';

		if( $cates_id == 67 ){
			$data['title'] = 'Womens Wedding Bands';
		}else{
			$data['title'] = $data['category_name'] . '';
		}  

		if( !empty($caterow['meta_description']) ) {
			$data['meta_tags'] = '<meta name="description" content="'.$caterow['meta_description'].'">';
		}

		$data['show_footer_to_bar']        = 1;
		$data['top_inner_banner']          = 'images/collection_img/inner-page-banner1.png';
		$data['top_inner_banner_content']  = '<h4>Engagement Rings</h4>             
		<h5>'.$data['title'].'</h5>
		<p>Celebrate forever with a stunning diamond eternity band or anniversary ring.</p>';
        $data['meta_tags']  = '<meta name="title" content="Loose Diamonds,Engagement Rings, Design Your Own Ring, Cheap Diamonds Ideal Scope, Customize Rings - Engagement Rings, '.$data['title'].' ">
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
		<meta name="revisit-after" content="7 days">';

		if( $data['ring_categoies'] != 'false' ){
			$output = $this->load->view('engagementringstrial/engagement_trials' , $data , true);
			$this->output($output, $data);
		}else{
			header('Location:' . SITE_URL . 'selection/engagement_ring_listings/' . $cates_id);
		}
    }

	/* Category listings */
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
        
        $sort_value = $this->input->get('sort_value');
        $field      = $this->input->get('field');
        
        $ringresults = $this->Catemodel->getRingsByCateory($category_id, $startFrom, $config["per_page"], '', $metal_value, $sort_option, '', '', $sort_value, $field);
        $config["total_rows"] = $ringresults['total'];
        $baseLink = SITE_URL.'selection/engagement_ring_listings/'.$category_id.'/?sort='.$sort_option;
	    $config["base_url"]   = $baseLink.'&pagelist='.$config["per_page"].'&metal='.$metal_value;
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><a class="active" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $data['page_numb_hint'] = page_number_hint($config["per_page"], $ringresults['total'], $start_from);
        $data['similar_products'] = $this->ringSimilarItems($category_id, '', 6, 'listings');        
        $sort_option_link = SITE_URL . 'selection/engagement_ring_listings/'.$category_id.'/?pagelist='.$config["per_page"].'&per_page='.$startFrom.'&sort=';
        $data['sort_option_link'] = page_sort_listing($sort_option_link, $sort_option);
        $ring_result = $this->get_unique_ring_listing($ringresults['results']);
        $data['ring_listings'] = '<ul class="products-grid prduct-list first last odd">'.$ring_result['ring_listing'].'</ul>' . $ring_result['popup_block'];
        $cate_name = $this->Catemodel->getRingCategoryName( $category_id );
        $data['catename_title'] = $cate_name.' Diamond Engagement Rings'; 
        $options = '';  
        $page_link = $baseLink;

		for( $page=10; $page <= 50; $page+=10 ) {
			$options .= '<option value="'.$page_link.'&pagelist='.$page.'" '.selectedOption($page,$config["per_page"]).'>'.$page.'</option>';
		}

		/* Sort options */
        $sort_list = array( 'ASC' => 'Lowest Price', 'DESC' => 'Highest Price');
        $sort_link = $page_link.'?per_page='.$config["per_page"].'&sort=';
        $optionList = '';
        foreach( $sort_list as $sorting => $sort_value ) {
			$optionList .= '<option value="'.$sort_link.$sorting.'" '.selectedOption($sorting, $sort_option).'>'.$sort_value.'</option>';
        }

        $results_metal = $this->Catemodel->getRingsMetalByCate( $category_id );
        $metal_link = $sort_link.$sort_option;
        $metal_list = '<option value="'.$metal_link.'&metal=">Select Metal</option>';
        foreach( $results_metal as $rowmetal ) {
           $metal_list .= '<option value="'.$metal_link.'&metal='.urlencode( $rowmetal['rings_metal'] ).'" '.selectedOption($rowmetal['rings_metal'], $metal_value).'>'.$rowmetal['rings_metal'].'</option>';
        }

		$this->pagination->initialize($config);
		$data['page_options'] = $options;
		$data['sorting_option'] = $optionList;
		$data['rings_metal'] = $metal_list;
		$data['main_category_id'] = $category_id;
		$data['parent_cateid'] = $this->Catemodel->getparentCateID($category_id);
		$data['page_links']   = $this->pagination->create_links();
		$data['ring_cate_name']   = $this->getCateName( $category_id );
		$data['title']                     = 'Engagement Rings '.$cate_name;
		$data['show_footer_to_bar']        = 1;
		$data['top_inner_banner']          = 'images/collection_img/inner-page-banner1.png';
		$data['top_inner_banner_content']  = '<h4>Engagement Rings</h4> <h5>'.$cate_name.'</h5> <p>Celebrate forever with a stunning diamond eternity band or anniversary ring.</p>';
		$data['meta_tags']  = '
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
		<meta name="revisit-after" content="7 days">';

        $output = $this->load->view('engagementringstrial/engagement_unique_listings' , $data , true);
        $this->output($output, $data);
		$this->output->cache(120);
    }

	function get_metal_type($link='', $metal_val='') {
        $metals = array('14k_gold' => '14K Gold', '18k_gold' => '18K Gold', 'platinum' => 'Platinum');
        $metal_options = '';
        foreach( $metals as $metalkey => $metal_value ) {
            $metal_options .= '<option value="' . $link . $metalkey . '" '.selectedOption($metalkey, $metal_val).'>'.$metal_value.'</option>';
        }
        return $metal_options;
    }
	
	function set_metal_links($ring_id=0, $ringstyle=0, $metal_type='', $metal_color='') {
        $metal_ic = $metal_ic = array(
			array('ring_id' => 0, 'icon' => 'yellow_14kgold_ic.jpg', 'metal' => 'Yellow Gold', 'carat' => '14','metal_type' =>'14k_gold','color'=>'Yellow'),
			array('ring_id' => 0, 'icon' => 'yellow_gold_ic.jpg', 'metal' => 'Yellow Gold', 'carat' => '18', 'metal_type' => '18k_gold','color'=>'Yellow'),
			array('ring_id' => 0, 'icon' => 'white_gold_ic.jpg', 'metal' => 'White Gold', 'carat' => '14', 'metal_type' => '14k_gold','color'=>'White'),
			array('ring_id' => 0, 'icon' => 'white_18gold_ic.jpg', 'metal' => 'White Gold', 'carat' => '18', 'metal_type' => '18k_gold','color'=>'White'),
			array('ring_id' => 0, 'icon' => 'rose_gold_ic.jpg', 'metal' => 'Rose Gold', 'carat' => '14', 'metal_type' => '14k_gold','color'=>'Rose'),
			array('ring_id' => 0, 'icon' => 'rose_18gold_ic.jpg', 'metal' => 'Rose Gold', 'carat' => '18', 'metal_type' => '18k_gold','color'=>'Rose'),
			array('ring_id' => 0, 'icon' => 'platinum_ic.jpg', 'metal' => 'Platinum', 'carat' => '', 'metal_type' => 'platinum','color'=>'')
		);
		$metal_list = '<ul>';
		$i = 1;
		foreach( $metal_ic as $metalrow ) {
			$metal_link = SITE_URL . 'collection/collection-detail/'.$ring_id . '/' . $metalrow['metal_type'];
			
			if( $metalrow['color'] == $metal_color && !empty($metal_color) ) { 
				//$this->get_metal_color_link($ringstyle, $metalrow['metal'], $metalrow['carat']);
				if( $i == 2 ) {
				$metal_list .= '<li><a href="'.SITE_URL . 'collection/collection-detail/'.$ring_id.'/platinum"><img src="'.SITE_URL.'images/platinum_ic.jpg" /></a></li>';
				}
				
				$metal_list .= '<li><a href="'.$metal_link.'"><img src="'.SITE_URL.'images/'.$metalrow['icon'].'" /></a></li>';
			
				$i++;   
			 }
			
		}
		$metal_list .= '</ul>';
                
        return $metal_list;
    }
	
	/* Wedding bands detail page */
	function wedding_bands_detail($prod_id=0, $ring_size='6', $ring_metal='14KW', $avsizes=''){
		$product_id = $prod_id;
		$data['onload_class'] = 'catalog-product-view product-14k-gold-diamond-three-stone-engagement-ring-set-128c-p-24728 categorypath-diamond-engagement-rings-wholesale-preset-gold-diamond-engagement-rings-aspx category-diamond-engagement-rings-wholesale-preset-gold-diamond-engagement-rings';
		$base_link = SITE_URL.'selection/wedding-bands-detail/'.$product_id.'/';
		$ezvalue_row = $this->Engagementringsbetamodel->getEzOptionValues();
		$data['first_ez_value'] = $ezvalue_row[0]['ezvalue'];
		$data['second_ez_value'] = $ezvalue_row[1]['ezvalue'];

		$ringresults = $this->Engagementringsbetamodel->getFingerSizeResult();
		$finger_size = '<option value="'.$base_link.'?ring_size=">Select Finger Size</option>';

		if( count((array)$ringresults) > 0 ) {
			$req_param = '';
			if(!empty($_GET['carat'])){
				if(!empty($_GET)){
					$req_param .= '&carat='.$_GET['carat'];
				}else{
					$req_param = '?carat='.$_GET['carat'];
				}
			}
			foreach( $ringresults as $rowsize ) {
				$rgsz = setRingSize($rowsize['ring_size']);
				$selected = '';
				$ring_size_link = $base_link.'?ring_size='.$rgsz.$req_param;
				if(isset($_GET['ring_size'])){ if($rgsz == $_GET['ring_size']){ $selected = 'selected="selected"';} }
				$finger_size .= '<option value="'.$ring_size_link.'" '.$selected.' '.selectedOption($rgsz, $ring_size).'>'.$rowsize['ring_size'].'</option>';
			}
		}
		$data['finger_ring_size'] = $finger_size;
		$rowsring = $this->Engagementringsbetamodel->getRingsDetailViaId($product_id);
		$rowsring['prd_id'] = $prod_id;
		$data["getparent_cate"] = getMainCatParentCateID($rowsring['catid']);
		$data['shipping_policy'] = $this->get_page_content('shipping-policy');
		$data['finance_policy'] = $this->get_page_content('finance-policy');
		$data['wedding_band'] = strchr( $rowsring['parent_cate'], 'Bands' );
		$ctstone_shape = $rowsring['additional_stones']; 
		$find_ctsahpe = getCenterStoneShape($ctstone_shape);
		$data['suport_shape'] = ( !empty($ctstone_shape) ? strtoupper( implode(', ', $find_ctsahpe) ) : 'Support any shape' );
		$suport_shape_img = view_shape_value($diamond_shape_img, ucwords( strtolower( $data['suport_shape'] ) ) );
		$data['supported_shape'] = SITE_URL . 'images/shapes_images/' . $diamond_shape_img;
		$data['buildring'] = $this->session->userdata('buildring');
		$data['rowsring'] = $rowsring;
		$data['rowsring']['priceRetail'] = $rowsring['priceRetail'];
		$data['retail_price'] = $rowsring['priceRetail'];
		$data['saving_percent'] = 45.43;
		$data['ring_id'] = $product_id;
		$this->session->set_userdata('ringID',$product_id);
		$d_id = $this->session->userdata('diamnd_id');
		$dm_id = ( !empty($d_id) ? $d_id : 'false' );
		$data['addtoring_link'] = htmlspecialchars(config_item('base_url').'engagement/complete_youring/'.$dm_id.'/'.$product_id.'/addtoring/');
		$data['buynow_link']    = htmlspecialchars(config_item('base_url').'jewelleries/addtoshoppingcart/');
		$cate = $this->getCateName( $rowsring['catid'] );
		if($rowsring['matalType'] == '14KP'){
			$matalTypes = '14 Karat Pink Gold';
		}elseif($rowsring['matalType'] == '14KY'){
			$matalTypes = '14 Karat Yellow Gold';
		}elseif($rowsring['matalType'] == '18KP'){
			$matalTypes = '18 Karat Pink Gold';
		}elseif($rowsring['matalType'] == '18KW'){
			$matalTypes = '18 Karat White Gold';
		}elseif($rowsring['matalType'] == '18KY'){
			$matalTypes = '18 Karat Yellow Gold';
		}elseif($rowsring['matalType'] == 'PLAT'){
			$matalTypes = 'Platinum';
		}else{
			$matalTypes = '14 Karat White Gold';
		}
		$data['ringtitle'] = $matalTypes.' '.$cate['main_cname'].' Cut Diamond Unique Wedding bands';
		$results['item_thumbs'] = $this->Engagementringsbetamodel->getRingThumbs( $rowsring['name'] );
		$data['product_circle'] = $this->getProductThumbNEW( $results, 'listing', $rowsring['name'], $data['ringtitle'], '400', '', 'details');
		$data['product_thums'] = $data['product_circle']['thumb_circle'];
		$data['thumbs_count'] = $data['product_circle']['thumbs_count']-2;
		$data['ringimg']   = $rowsring['ImagePath'];
		$data['setingtype']   = $cate['sub_cname'];
		$data['maincate_name'] = $cate['main_cname'];
		$data['subcate_link'] = '<a href="'.SITE_URL.'selection/engagement_ring_listings/'.$rowsring['catid'].'" title="">'.$cate['main_cname'].' Diamond Engagement Rings</a>';
		if(isset($_GET['carat'])){
			$carats = $_GET['carat'];
		}else{
			$carats = str_replace(" CT.","",$rowsring['stone_weight']);
		}
		$data['extra_headers'] = '';
		$data['extra_headers'] .= '<script language="javascript" src="'.SITE_URL.'js/jquery.popup.js" type="text/javascript"></script>';
		$data['extraheader'] = '<link type="text/css" href="' . SITE_URL . 'css/magnify_zoom.css" rel="stylesheet" />';
		$data['extraheader'] .= '<link type="text/css" href="' . SITE_URL . 'css/magnific-popup.css" rel="stylesheet" />';
		$rings_thumb = $this->getProductThumbNEW( $rowsring );
		$data['rings_thumb'] = $rings_thumb['thumb_circle'];
		$data['suported_shapes'] = $this->getDimaondShapeImage( $rowsring );
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
		$metaList = array();
		$testar = array();
		$availableSizs = array();
		$available_insizes = ''; 
		foreach($trimmedArray as $rows_avsize) {
			if( !empty($rows_avsize) ) :
				$metailWeight = $this->Engagementringsbetamodel->getMetalRingWeight($rows_avsize);
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
		if( count((array)$currMetalSizes) > 0 ) {
			$req_param = '';
			if(!empty($_GET['carat'])){
				if(!empty($req_param)){
					$req_param .= '&carat='.$_GET['carat'];
				}else{
					$req_param = '?carat='.$_GET['carat'];
				}
			}
			$ringWeight .= '<option value="">Available Sizes</option>';
			foreach($currMetalSizes as $rows_avsize) {
				$metaLink = SITE_URL.'selection/engagement-rings-detail/'.trim($rows_avsize['ring_id']).'/'.$defaultRingSz.'/'.$defaultMetal.'/'.$product_id.$req_param;			
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

		$req_param = '';
		if(!empty($_GET['carat'])){
			if(!empty($req_param)){
				$req_param .= '&carat='.$_GET['carat'];
			}else{
				$req_param = '?carat='.$_GET['carat'];
			}
		}
		$getRingsSize = '';
		if( count((array)$rowsring['ringsSizes']) > 0 ) {
			foreach($rowsring['ringsSizes'] as $rng_size) {
				$rgsz = setRingSize($rng_size['ringSize']);
				$rings_rdlink = SITE_URL.'selection/engagement-rings-detail/'.$product_id.'/'.$rgsz.'/'.$defaultMetal.$req_param;
				$getRingsSize .= '<option value="'.$rings_rdlink.'" '.selectedOption($rgsz, $ring_size).'>'.$rng_size['ringSize'] . ' (+$'.$rng_size['priceRetail'].')' .'</option>';
			}
		} else {
			$getRingsSize .= '<option value="">Ring Sizes</option>';
		}
		$getRingsMetal = '';
		if( count((array)$rowsring['ringsMetal']) > 0 ) {
			$req_param = '';
				$seg1 = $this->uri->segment(1);
						$seg2 = $this->uri->segment(2);
			if(!empty($_GET['diamond_lot'])){
				$req_param = '?diamond_lot='.$_GET['diamond_lot'];
			}
			if(!empty($_GET['ring_size'])){
				if(!empty($req_param)){
					$req_param .= '&ring_size='.$_GET['ring_size'];
				}else{
					$req_param = '?ring_size='.$_GET['ring_size'];
				}
			}
			if(!empty($_GET['carat'])){
				if(!empty($req_param)){
					$req_param .= '&carat='.$_GET['carat'];
				}else{
					$req_param = '?carat='.$_GET['carat'];
				}
			}
			foreach($rowsring['ringsMetal'] as $rings_metal) {
				$req_add = '';
				if( $rings_metal['matalType'] != 'PLAT' ) {
					$req_add = 'Gold';
				}

				if( $rings_metal['matalType'] != 'PDIUM' ) {
					$metal_rdlink = SITE_URL.$seg1.'/'.$seg2.'/'.$prod_id.'/'.$defaultRingSz.'/'.trim($rings_metal['matalType']).$req_param;
					$getRingsMetal .= '<option value="'.$metal_rdlink.'" '.selectedOption($rings_metal['matalType'], $ring_metal).'>'.set_ring_metal($rings_metal['matalType']).' '.$req_add.'</option>';
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
		//printr($data);
		$data['meta_tags'] = '<meta name="ROBOTS" content="INDEX,FOLLOW">
		<meta name="description" content="Buy online emerald cut diamond rings, three stone diamond rings, 3 stone diamond ring, antique diamond ring, set engagement ring, tension engagement rings, affordable engagement ring, 3 stone diamond ring, antique diamond ring, set engagement ring, pave diamond rings, '.$data['title'].'">
		<meta name="keywords" content="emerald cut diamond rings, three stone diamond rings, 3 stone diamond ring, antique diamond ring, set engagement ring, tension engagement rings, affordable engagement ring, 3 stone diamond ring, antique diamond ring, set engagement ring, pave diamond rings, '.$data['title'].'">
		<meta name="author" content="'.get_site_contact_info('sites_title').'">
		<meta name="publisher" content="'.get_site_contact_info('sites_title').'">
		<meta name="copyright" content="'.get_site_contact_info('sites_title').'">
		<meta http-equiv="Reply-to" content="">
		<meta name="creation_Date" content="12/12/2008">
		<meta name="expires" content="">
		<meta name="revisit-after" content="7 days">';
		$data['ringsize_option'] = $getRingsSize;
		$data['row_cate'] = $this->getCateName($rowsring['catid']);

		$output = $this->load->view('engagementringstrial/unique_wedding_bands_detail' , $data , true);
		$this->output($output, $data);
		$this->output->cache(n);
	}
	
	function heart_diamond_collection_similler_list($cid=0, $subcid=0,  $start=0, $limit=4, $cols=2, $type='') {
        $rowrings = $this->Davidsternmodel->get_jewelry_new_similler_list( $cid,$subcid, $start, $limit, $type );
        
        //echo '<pre>'; print_r($rowrings); exit();
        
        $ring_listing = '';
        
        if( $cols == 3 || $cols == 2 ) {
            $block_cols = 'col-sm-3';
        } else if( $cols == 6 ) {
            $block_cols = 'col-sm-3';
        } else {
            $block_cols = 'col-sm-2';
        }
        $popup_block = '';
        
		if( count((array)$rowrings['results']) > 0 ) {
			foreach( $rowrings['results'] as $rows ) {
				$ring_price = ( $rows['g14_wh_price'] > 0 ? $rows['g14_wh_price'] : $rows['ring_price'] );
				$ringPrice = ( $ring_price > 0 ? $ring_price : 'Please Call '.CONTACT_NO.' for price' );
				$detaiLink = SITE_URL.'collection/collection-detail/'.$rows['stock_number'];
				$popupLink = SITE_URL . 'collection/heart_collection_popup_detail/'.$rows['stock_number'] . '/?keepThis=true&TB_iframe=true&width=900&height=550&modal=false';
				$thumbs = $this->heart_collection_images($rows, SITES_NAME);
				$popup_block .= $this->heart_collection_popup_detail($rows['stock_number']);
				if($rows['is_carol'] == 1){
					if( file_exists(''.$rows['image1']) ) {
						$ringImage   = SITE_URL.''.$rows['image1'];
					} else {
						$ringImage   = SITE_URL.''.$rows['image2'];
					}
				}elseif($rows['is_oneil'] == 1){
					if( file_exists(str_replace("THUMBNAIL/","",$rows['image1'])) ) {
						$ringImage   = SITE_URL .str_replace("THUMBNAIL/","",$rows['image1']);
					} else {
						$ringImage   = SITE_URL .str_replace("THUMBNAIL/","",$rows['image2']);
					}
				}else{
					if( !empty($rows['image1']) ) {
						$ringImage   = $rows['image1'];
					} else {
						$ringImage   = $rows['image2'];
					}
				}

				$ring_listing .= '<div class="'.$block_cols.' set_bk_height" onmouseover="show_collection_block(\''.$rows['stock_number'].'\')" onmouseout="hide_block(\''.$rows['stock_number'].'\')">'
					. '<div>
						<a href="'.$detaiLink.'">
							<div class="set_thumb_img similar_collection" id="thumb_'.$rows['stock_number'].'">
								<div class="sp active_view set_position" id="video_show_div_1"><img src="'.$ringImage.'" width="200" height="153" alt="Yadegar Diamonds"></div>
							</div>
						</a>
					</div>
					' . $this->collection_hover_block($rows, $ringPrice, $ringImage, $popupLink, $thumbs['total']) . '
				</div>';
            }
        } else {
            //$ring_listing .= '<div>No Hearts and Diamonds Colleciton Found</div>';
        }
        //$return['total_rows'] = $i;
        $return['listings'] = $ring_listing;
        $return['popup_block'] = $popup_block;
        
        return $return;
    }

	function heart_collection_images($rows=array(), $ring_title='', $detail='', $recent='') {
        $collection = array();
        $flderPath = COLLECTION_FOLDER;
        //$collections_link = 'http://173.230.130.50:8888/Images/';
        $collections_link = 'http://www.thegoldsourcejewelry.com/images/';
        
        if( empty($detail) ) {
            $lightbox_class = '';
            $res_class      = '';
        } else {
            $lightbox_class = 'portfolio-box';
            $res_class      = 'img-responsive';
        }
        
        //echo '<pre>'; print_r($rows); exit();
        
        for( $i=1; $i <= 6; $i++ ) {
            if( !empty($rows['image'.$i]) ) {
                $collection[] = $rows['image'.$i];
            }
        }
        
        $jewelryImage = $this->get_collection_img( $rows['global_fields'] );
        
        if( count((array)$jewelryImage) > 0 ) {
            $collection_thumb = $jewelryImage;
        } else {
            $collection_thumb = $this->get_image_via_folder($rows['item_sku'], $rows['different_imglist']);
        }
        
        $tt_count = count((array)$collection_thumb);
        $j = 1;
        $tt_count = 1;
        $set_ring_thumb = '';
        $set_popup_thumb = '';
        $set_ring_small_thumb = '';
        
       /*if( $tt_count > 0 ) {
            foreach ($collection_thumb as $imgs ) {
                $active_class = ( $j == 1 ? 'active_view' : 'hide_imgbk' );
                if( count((array)$jewelryImage) > 0 ) {
                    $ringImageLink = $collections_link.$imgs;
                            //( (getimagesize($collections_link.$imgs)) ? $collections_link.$imgs : SITE_URL.'img/no_image_found.jpg' );
                } else {
                    $ringImageLink = ( (file_exists($flderPath.$imgs)) ? SITE_URL.$flderPath.$imgs : SITE_URL.'img/no_image_found.jpg' );
                }
                
                
                if( !empty($recent) ) {
                    $set_ring_thumb = '<img src="'.$ringImageLink.'" alt="'.$ring_title.'" />';
                    break;
                }
                $set_ring_thumb .= '<div class="sp '.$active_class.'"><img src="'.$ringImageLink.'" width="200" height="153" class="'.$res_class.'" alt="'.$ring_title.'" /></div>';
                
                if( !empty($detail) ) {
                    if( $j == 1 ) {
                        $set_popup_thumb .= '<a href="'.$ringImageLink.'"><img src="'.SITE_URL.'img/search_plus_ic.png" alt="" width="28" /></a>';
                    } else {
                        $set_popup_thumb .= '<a href="'.$ringImageLink.'"></a>';
                    }                    
                }
                
                $j++;
            }
        } else {
          $set_ring_thumb .= '<div class="sp active_view set_position"><img src="'.SITE_URL.'img/no_image_found.jpg" width="200" height="153" alt="'.$ring_title.'" /></div>';
          if( !empty($recent) ) {
                $set_ring_thumb = '<img src="'.SITE_URL.'img/no_image_found.jpg" alt="'.$ring_title.'" />';
            }
        }*/
        
        
        if( !empty($rows['image1']) ) {
            //echo $detail;
            if($detail == 'detail'){
            
                for( $i=1; $i <= 6; $i++ ) {
                    if( !empty($rows['image'.$i]) ) {
                        
                        $set_ring_thumb .= '<div class="sp active_view set_position" id="video_show_div_'.$i.'"><img src="'.$rows['image'.$i].'" width="200" height="153" alt="Diamond Image" /></div>';
                        
                        $set_ring_small_thumb .= '<a href="#javascript" onclick="show_video_image(\'video_show_div_'.$i.'\')">
                                <img src="'.$rows['image'.$i].'" width="80" height="80" alt="Diamond Image" style="margin-left: 15px;border: solid 1px #cccccc;margin-right: 15px;" />
                                </a>';  
                    }
                }
            
            }else{
            
                for( $i=1; $i <= 6; $i++ ) {
                    if( !empty($rows['image'.$i]) ) {
                        if($i == 1){
                            $set_ring_thumb .= '<div class="sp active_view set_position" id="video_show_div_'.$i.'"><img src="'.$rows['image'.$i].'" width="200" height="153" alt="'.$ring_title.'" /></div>';
                        
                            $set_ring_small_thumb .= '<a href="#javascript" onclick="show_video_image(\'video_show_div_'.$i.'\')">
                                <img src="'.$rows['image'.$i].'" width="80" height="80" alt="'.$ring_title.'" style="margin-left: 15px;border: solid 1px #cccccc;margin-right: 15px;" />
                                </a>';
                        }        
                        //$fdsfsd++;
                    }
                }
            
            }
            
            if($rows['comment'] != '' AND $detail == 'detail'){
                $set_ring_small_thumb .= '<a href="#javascript" onclick="show_video_image(\'video_show_div\')">
                                    <img src="'.SITE_URL.'images/360-spin-button_white.jpg" width="80" height="80" alt="video" style="margin-left: 15px;border: solid 1px #cccccc;margin-right: 15px;" />
                                    </a>';
                
                $set_ring_thumb .= '<div id="video_show_div" class="sp active_view set_position" style="position: absolute; overflow: hidden; display: none;width: 98%;">
                <video controls style="position: relative; left: 0px; top: 0px; width: 100%; height: 100%; margin: 0px; padding: 0px; max-width: none; max-height: none; border: medium none; line-height: 0; visibility: visible;" src="'.SITE_URL.'images/'.$rows['comment'].'"></video>
                </div>';
            }
        
        }else{
            $set_ring_thumb = '<div class="sp active_view set_position"><img src="'.SITE_URL.'img/no_image_found.jpg" width="200" height="153" alt="'.$ring_title.'" /></div>';
        }
        
        /*<video width="100%" controls>
          <source src="'.SITE_URL.'images/morrins-videos/50277-E-10KR.mp4" type="video/mp4">
          Your browser does not support HTML5 video.
        </video>*/
        
        $returns['small_thumbs']    = $set_ring_small_thumb;
        $returns['thumbs']          = $set_ring_thumb;
        $returns['popup_thumbs']    = $set_popup_thumb;
        $returns['total']           = $tt_count;
        
        return $returns;        
    }
	
	function get_collection_img($serialField='') {
        
        $imgList = array();
        if( !empty($serialField) ) {
            $globalFields = unserialize( $serialField );

            foreach( $globalFields as $rows ) {
                if( strchr($rows[1], 'Image') != '' ) {
                    $imgList[] = $rows[1];
                }
            }
        }
        
       return $imgList;
    }
	
	function get_image_via_folder($item_sku='', $imgFields='') {
        foreach(glob('webimages/completed_images/*') as $filename){
            $folderImageName = basename($filename);
            $check_str = strchr($folderImageName, $item_sku);
            if( !empty($check_str) ) {
                $imagesName[] = $folderImageName;
            }
        }
        $other_img = $this->set_multi_color_img($imgFields);
        
        if( count((array) $other_img ) > 0 ) {
            return $other_img;
        } else {
            return isset($imagesName)?$imagesName:'';
        }        
    }

	function set_multi_color_img($img_fields='', $color='Y') {
        $view_img = array();
        
        if( !empty($img_fields) ) {
            $img_list = unserialize( $img_fields );
            if( count((array)$img_list) > 0 ) {
                foreach( $img_list as $img ) {
                    if( strchr($img, $color) ) {
                        $view_img[] = $img;
                    }                    
                }
            }
        }
        return $view_img;
    }
	
	function heart_collection_popup_detail($id=0) {
       $data = $this->getCommonData();
       $rowsring = $this->Davidsternmodel->getSternCollectionDetail($id);
        $data['category_name'] = jewelry_cate_name( $rowsring['category'] );
        $data['rowsring'] = $rowsring;
        //$sales_price = $rowsring['price'];
        $sales_price = ( $rowsring['g14_wh_price'] > 0 ? $rowsring['g14_wh_price'] : $rowsring['price_website'] );
        $retail_price = $sales_price * PRICE_PERCENT;
        $saving_percent = _nf( ( 100 - ( ( $sales_price / $retail_price ) * 100 ) ), 2 );
        $data['buynow_link'] = htmlspecialchars(SITE_URL.'jewelleries/addtoshoppingcart/');
        $data['item_desc'] = get_site_title().' Jewelry can be yours for $'._nf($rowsring['price_website'], 2).'.';

        $ringBoxDesc = $data['category_name'] . ' ' . $rowsring['metal_purity'];
        $ring_title = $ringBoxDesc. ' Item ID: '. $rowsring['stock_real_number'];
        $ringimg   = SITE_URL.'images/'.$rowsring['image1'];

       $data['title'] = $ring_title;
       $listings_detail = '';
       $product_thumbs = $this->heart_collection_images( $rowsring, $ring_title );

       $where_dev_ebaycategories_cat    = array('category_id' => $rowsring['subcategory']);
       $dev_ebaycategories_data         = $this->Catemodel->getdata_any_table_where($where_dev_ebaycategories_cat, 'dev_ebaycategories');
	   $categoryNamed1 = isset($dev_ebaycategories_data['0']->category_name)?$dev_ebaycategories_data['0']->category_name:'';

       $where_dev_ebaycategories_cat2    = array('category_id' => $rowsring['category']);
       $dev_ebaycategories_data2         = $this->Catemodel->getdata_any_table_where($where_dev_ebaycategories_cat2, 'dev_ebaycategories');
	   $categoryNamed2 = isset($dev_ebaycategories_data2['0']->category_name)?$dev_ebaycategories_data2['0']->category_name:'';

	   $data_heart_title = 'Yadegar Diamonds '. $categoryNamed1 .' '.$categoryNamed2.' '.$rowsring['item_title']; 

       $ring_detail_bk = '<div id="pop_'.$id.'" class="simplePopup collection_view">';
       $ring_detail_bk .= '<div class="col-sm-5">
                  <div class="product-image product-image-zoom zoomright" id="ringsthumb_view">
                    <div class="set_thumb_img" id="popup_'.$rowsring['stock_number'].'">                                
                            <div class="" id="show_thumb_view"></div>
                                <a href="'.SITE_URL.'collection/collection-detail/'.$rowsring['stock_number'].'">
                                  '.$product_thumbs['thumbs'].'
                                </a>
                            </div>
                    <div class="left_arrow_view" style="display:none;"><a href="#javascript" onclick="button_previous(\'popup_'.$rowsring['stock_number'].'\')"><img src="'.SITE_URL.'img/heart_diamond/left_arrow_view_ic.jpg" alt="" /></a></div>
        <div class="right_arrow_view" style="display:none;"><a href="#javascript" onclick="button_next(\'popup_'.$rowsring['stock_number'].'\')"><img src="'.SITE_URL.'img/heart_diamond/right_arrow_view_ic.jpg" alt="" /></a></div>
                </div>
                <div class="more-views"></div>
              </div>';
       $ring_detail_bk .= '<form id="form_'.$rowsring['stock_number'].'" action="" method="">
           <div class="col-sm-6 pull-right">
          <div class="price-box">
              <div class="product-name"><h1>'.$data_heart_title.'</h1></div>
              <p class="old-price fb-old-price f-fix"> 
                  <span class="price-label">Item Code:</span> <span>'.$rowsring['stock_number'].'</span> 
              </p>
              <p class="old-price fb-old-price f-fix"> 
                  <span class="price-label">Category Type:</span> <span>'.$categoryNamed2.'</span> 
              </p>
              <p class="old-price fb-old-price f-fix"> 
                  <span class="price-label">Category Sub Type:</span> <span>'. $categoryNamed1 .'</span> 
              </p>
              <p class="old-price fb-old-price f-fix"> 
                  <span class="price-label">Style:</span> <span>'.$rowsring['item_title'].'</span> 
              </p>
              <p class="old-price fb-old-price f-fix"> 
                  <span class="price-label">Stock Number:</span> <span>'.$rowsring['stock_real_number'].'</span> 
              </p>
              ';
            if($retail_price > 0 ) {
            $ring_detail_bk .= '<p class="old-price"> <span class="retail-label">Retail Price:</span> <span class="price" id="old-price-'.$rowsring['stock_number'].'">$'._nf($retail_price, 2).'</span> <span class="pnotify"> <a href="#" id="productupdates-button4" onmouseover="new Productupdates();"> <i></i>Get Price Update </a> </span> </p>
            <p class="old-price"> <span class="ourprice-label">Our Price:</span> <span class="new-price" id="product-price-'.$rowsring['stock_number'].'">$'._nf($sales_price, 2).'</span> <span class="special-price-label" id="old_price">(Savings:'.$saving_percent.'%)</span> <span id="google_discount"></span> <span id="twitter_discount"></span> <span id="facebook_discount"></span> <span id="pinterest_discount"></span> <span id="total_price"></span> 
              <!-- // customm code for shipping free text --> 
              <strong><a class="freeShip" href="#" target="_blank">Ships for free&nbsp;*</a></strong> 
              <!-- // End customm code --> 
            </p>';
            }
          $ring_detail_bk .= '</div>
          <label for="qty">QUANTITY:</label>
          <input type="text" name="qty" id="qty" maxlength="12" value="1" title="Qty" class="input-text qty required-entry">
          <div class="product-options-bottom">
            <div class="add-to-cart-1">
                <input type="hidden" name="txt_rstyle" id="txt_rstyle" value="'.$rowsring['ring_style'].'">
                <input type="hidden" name="3ez_price" value="" />
                <input type="hidden" name="5ez_price" value="" />
                <input type="hidden" name="main_price" value="'.$rowsring['price_website'].'" />
                <input type="hidden" name="price" value="'.$rowsring['price_website'].'" />
                <input type="hidden" name="vender" value="diamond_agency_jewelers_collection">
                <input type="hidden" name="url" value="'.$ringimg.'">
                <input type="hidden" name="prodname" value="'.$rowsring['item_title'].'" />
                <input type="hidden" name="diamnd_count" value="'.$rowsring['diamond_count'].'">
                <input type="hidden" name="ring_shape" value="'.$rowsring['shape'].'" />
                <input type="hidden" name="ring_carat" value="'.$rowsring['carat'].'" />
                <input type="hidden" name="prid" id="prid" value="'.$rowsring['stock_number'].'" />
                <input type="hidden" name="stock_number" id="stock_number" value="'.$rowsring['stock_real_number'].'" />
                <input type="hidden" name="txt_ringtype" value="generic_ring" />
                <input type="hidden" name="txt_ringsize" value="" />
                <input type="hidden" name="txt_metal" value="'.$rowsring['metal_type'].'" />
                <input type="hidden" name="metals_weight" value="'.$rowsring['width'].'" />
                
                <input type="hidden" name="vendors_name" value="'.$rowsring['vendor_name'].'" />
                <input type="hidden" name="vendor_number" value="'.$rowsring['vendor_sku'].'" />
                <input type="hidden" name="table_name" value="dev_jewelries" />
                <input type="hidden" name="item_title" value="'.$rowsring['item_title'].'" />
                <input type="hidden" name="item_url" value="'.SITE_URL.'collection/collection-detail/'.$rowsring['stock_number'].'" />
                <input type="hidden" name="product_type" value="'. $categoryNamed1 .'" />
                
                <input type="hidden" name="txt_addoption" value="diamond_agency_jewelers_collection" />
                <input type="hidden" name="center_stone_id" id="center_stone_id" />
                <input type="hidden" name="txt_qty" value="1" />
                          
                <div>
                    <a href="#javascript" onclick="add_to_cart_form(\''.SITE_URL.'jewelleries/addtoshoppingcart/\', \''.$rowsring['stock_number'].'\')" class="add_to_cart_btn" id="addtoshopping">Add To Cart</a>
                </div>
            </div>
          </div>
          <br clear="all">
          <div class="set_row_width">
            <div class="box-collateral box-additional"> <br clear="all">
                    '.$listings_detail.'
              <div class="other_button_links">
                  <a href="#"><img src="'.SITE_URL.'img/heart_diamond/add_to_wish_list.jpg" alt="Add To Wishlist" /></a>
                  <a href="#"><img src="'.SITE_URL.'img/heart_diamond/add_to_compare_ic.jpg" alt="Add to Compare" /></a>
                  <a href="#"><img src="'.SITE_URL.'img/heart_diamond/email_to_friend_ic.jpg" alt="Email to Friend" /></a>
              </div>
            </div>
          </div>
        </div></form>';
       $ring_detail_bk .= '</div>';
       
       //$this->load->view('engagementringstrial/heart_collection_popup_detail', $data);
        //$this->output($output, $data);
        
       return $ring_detail_bk;
    }
	
	function collection_hover_block($rows=array(), $ringPrice=0, $ringImage='', $popupLink='', $total_img = 1, $listing='', $viewtype='') {
        
        $where_dev_ebaycategories_cat2    = array('category_id' => $rows['category']);
        $dev_ebaycategories_data2         = $this->Catemodel->getdata_any_table_where($where_dev_ebaycategories_cat2, 'dev_ebaycategories');
		$categoryNamed2 = isset($dev_ebaycategories_data2['0']->category_name)?$dev_ebaycategories_data2['0']->category_name:'';
            
        $block_id = $rows['stock_number'];
        $form_name = 'form_'.$block_id;
        $ring_price_view = ( $ringPrice > 0 ? '$' . _nf($ringPrice, 2) : ' Please call' . CONTACT_NO . ' for price' );
        $collection_title = ( empty($listing) ? $this->get_heart_title( $rows ) : $rows['item_title'] );
        if( empty($viewtype) ) {
			$hover_block = '<div class="item_info_view">
				<div class="item_lable_style"><a href="'.SITE_URL.'collection/collection-detail/'.$rows['stock_number'].'">'. $collection_title .'<br> '.SITES_NAME.' </a></div>
				<div class="ring_view_rating"><img src="'.SITE_URL.'img/heart_diamond/rating_icong_view.jpg" style="display:none;"></div>
				<div class="priceLable">'.$ring_price_view.'</div>
			</div>
			<div class="addtocart_icon"><a href="#javascript" onClick="submitCartForm(\''.SITE_URL.'jewelleries/addtoshoppingcart/\', \''.$block_id.'\')">Add to Cart</a></div>';
		}
		$suppliedStones = isset($rows['supplied_stones'])?$rows['supplied_stones']:'';
		$suportShape = isset($suport_shape)?$suport_shape:'';
		$metalWeight = isset($rows['metal_weight'])?$rows['metal_weight']:'';
		$hover_block .= '<div class="collection_hover_bk" id="'.$rows['stock_number'].'">
                           <div class="view_count">1/'.$total_img.'</div>
                           <div class="quick_view"><a href="Javascript:;" onclick="view_simple_popup(\''.$rows['stock_number'].'\')" title="Quick View'.$rows['stock_number'].'" rel="nofollow">Quick <br> View</a></div>
                          <div class="left_arrow_view"><a href="#javascript" onclick="button_previous(\'thumb_'.$rows['stock_number'].'\'); show_number_count(\''.$block_id.'\', \''.$total_img.'\', \'back\')"><img src="'.SITE_URL.'img/heart_diamond/left_arrow_icon.jpg"></a></div>
                    <div class="right_arrow_view"><a href="#javascript" onclick="button_next(\'thumb_'.$rows['stock_number'].'\'); show_number_count(\''.$block_id.'\', \''.$total_img.'\', \'\')"><img src="'.SITE_URL.'img/heart_diamond/right_arrow_icon.jpg" alt=""></a></div>
                           
                                <form name="'.$form_name.'" id="'.$form_name.'" method="post">

                                  <input type="hidden" name="txt_rstyle" id="txt_rstyle" value="0">
					              <input type="hidden" name="3ez_price" value="0">
					              <input type="hidden" name="5ez_price" value="0">
					              <input type="hidden" name="main_price" id="main_price" value="'.$rows['price_website'].'" />
					              <input type="hidden" name="price" value="'.$rows['price_website'].'" />
					              <input type="hidden" name="vender" value="goldsourcejewelry_diamond_collection">
					              <input type="hidden" name="url" value="'.SITE_URL.'images/'.$rows['image1'].'">
					              <input type="hidden" name="prodname" value="'.$rows['item_title'].'">
					              <input type="hidden" name="diamnd_count" value="'.$suppliedStones.'">
					              <input type="hidden" name="ring_shape" value="'.$suportShape.'">
					              <input type="hidden" name="ring_carat" value="'.$metalWeight.'">
					              <input type="hidden" name="prid" id="prid" value="'.$rows['stock_number'].'">
					              <input type="hidden" name="stock_number" id="stock_number" value="'.$rows['stock_real_number'].'">
					              <input type="hidden" name="txt_ringtype" value="'.$rows['category_type'].'">
					              <input type="hidden" name="txt_ringsize" value="" />
					              <input type="hidden" name="txt_metal" value="'.$rows['metal_type'].'" />
					              <input type="hidden" name="metals_weight" value="'.$rows['width'].'" />
					              
					                <input type="hidden" name="vendors_name" value="'.$rows['vendor_name'].'" />
                                    <input type="hidden" name="vendor_number" value="'.$rows['vendor_sku'].'" />
                                    <input type="hidden" name="table_name" value="dev_jewelries" />
                                    <input type="hidden" name="item_title" value="'.$rows['item_title'].'" />
                                    <input type="hidden" name="item_url" value="'.SITE_URL.'collection/collection-detail/'.$rows['stock_number'].'" />
                                    <input type="hidden" name="product_type" value="'.$categoryNamed2.'" />
					              
					              <input type="hidden" name="center_stone_id" id="center_stone_id" />
					              <input type="hidden" name="txt_qty" value="1" />
					              
                                </form>
                           </div>';
        
        return $hover_block;
    }
	
	function get_heart_title($row=array(), $metalType='') {
        if( !empty($metalType) ) {
            $metal = ucwords( str_replace('k_', ' ', $metalType) );
        } else {
            $metal = $row['carat'] . ' ' . $row['metal'];
        }
        $heartitle = $metal . ' ' .$row['item_title'];
        return $heartitle;
    }
	
	function finishlevel($rid='', $metal='gold', $level='') {

        $rowsring = $this->Davidsternmodel->sternProductDetail( $rid );
        
        $field_figur = $this->getFinishedLevel( $metal );
        //// price fields
        $finishOptions = array(
            $metal.'_polished'.$field_figur => 'Polished',
            $metal.'_semimount'.$field_figur => 'Semi Mount',
            $metal.'_complete'.$field_figur => 'complete'
        );
        
        $options = '';
        $i = 1;
        foreach( $finishOptions as $fskey => $fsvalue ) {
            if(isset($rowsring[$fskey]) && $rowsring[$fskey] > 0 ) {
                $optionValue = ( $fsvalue === 'Semi Mount' ? 'semimount' : setSlugTitle($fsvalue) );
                $options .= '<option value="'.$optionValue.'" '.selectedOption(1, $i).'>'.$fsvalue.'</option>';
                
                $i++;
            }
        }
        $return['prices'] = isset($rowsring[$metal.'_polished'.$field_figur])?$rowsring[$metal.'_polished'.$field_figur]:'';
        $return['metal_list'] = $options;
        
        if( $level === 'finish' ) {
            echo $return['prices'] . '_' . $options;
        } else {
            return $options;
        } 
        //echo $return['prices'] . '_' . $options;
    }

	function getFinishedLevel($metal='gold') {
        $field_figur = '';
        if( $metal == 'gold' ) {
            $field_figur = '_1300';
        } elseif( $metal == 'silver' ) {
            $field_figur = '_40';
        } elseif( $metal == 'platinum' ) {
            $field_figur = '_1200';
        }
        
        return $field_figur;
    }
	
	function collection_diamond_options() {
        $center_stone = $this->session->userdata('center_stone');
        $str = explode('=', $center_stone);
        $return['carat'] = isset($str[1])?$str[1]:'';
        $return['shape'] = substr($str[0], -2);
        $return['diamond_count'] = substr($str[0], 0, -2);
        
        return $return;
    }

	function collectionSimilarLististing($cid=0, $prod_id=0, $limit=5, $type='similar') {
        $rowsring = $this->Davidsternmodel->colectionSimilarProduct($cid, $prod_id, $limit);
                
        $similar_rings = '';
        $popupBlock = '';
        
        if( count((array)$rowsring) > 0 ) {
            foreach( $rowsring as $rowring ) {
               $detaiLink = SITE_URL . 'collection/collection-detail/' . $rowring['stock_number'];
               $ringImageLink = $this->set_collection_img($rowring['image1'], $rowring['item_sku'], $rows['different_imglist']);
               $ring_title = $this->heart_ring_title( $rowring );
               $ring_ourprice = $this->get_collection_price( $rowring );
               $detailDesc = 'Metal Purity ' . $rowring['metal_purity'] . ' Metal Color ' . $rowring['metal_color'];
               $prodRingPrice = ( $ring_ourprice > 0 ? '$ '._nf($ring_ourprice, 2) : '<div class="setprice_label">PLEASE CALL '.CONTACT_NO.' FOR PRICE</div>');
               $popupLink = SITE_URL . 'collection/heart_collection_popup_detail/'.$rowring['stock_number'] . '/?keepThis=true&TB_iframe=true&width=900&height=550&modal=false';
               $popupBlock .= $this->heart_collection_popup_detail($rowring['stock_number']);
               $hover_id_bk = $type . '_' . $rowring['stock_number'];
               $thumbs = $this->heart_collection_images($rowring, $ring_title);
            $similar_rings .= '<div class="product_colsbk col-sm-6" onmouseover="show_collection_block(\''.$hover_id_bk.'\')" onmouseout="hide_block(\''.$hover_id_bk.'\')">
                <div class="productRingImg"><a href="'.$detaiLink.'">
                        <!-- <img src="'.$ringImageLink.'" width="200" height="153" alt="'.$ring_title.'"> -->
                        <div class="set_thumb_img similar_collection" id="view_'.$hover_id_bk.'">
                            ' . $thumbs['thumbs'] . '
                        </div>
                    </a>
                </div>
                        <div><img src="'.SITE_URL.'img/heart_diamond/ratings_reviews.jpg" alt=""> 5.0<span class="reviewlabel">(2 Review)</span></div><br>';
            if( !empty($rowring['product_type']) ) {
                $similar_rings .= '<div class="setcolor_label">+ '.$rowring['product_type'].'</div><br>';
            }
                $similar_rings .= '<div class="centerLabel"><a href="'.$detaiLink.'">This is '.$ring_title.'</a></div>
                        <div class="setcolor_label">'.$detailDesc.'</div>                     
                        <div class="setcolor_label">Item ID: '.$rowring['item_sku'].'</div><br>
                        <div>'. $prodRingPrice .'</div>
                           ' . $this->collection_detail_hover_block($rowring, $ring_ourprice, $ringImageLink, $popupLink, $type, $thumbs['total']) . ' 
                    </div>';
            }
        }
        
        $return['similar_listing'] = $similar_rings;
        $return['popup_link'] = $popupBlock;
        
        return $return;
    }
	
	function star_collection_detail($prod_id=0, $ring_size='6', $ring_metal='14KW', $avsizes=''){
		$product_id = $prod_id;
		$data['onload_class'] = 'catalog-product-view product-14k-gold-diamond-three-stone-engagement-ring-set-128c-p-24728 categorypath-diamond-engagement-rings-wholesale-preset-gold-diamond-engagement-rings-aspx category-diamond-engagement-rings-wholesale-preset-gold-diamond-engagement-rings';
		$base_link = SITE_URL .'selection/star-collection-detail/'.$product_id;
		$ezvalue_row = $this->Engagementringsbetamodel->getEzOptionValues();
		$data['first_ez_value'] = $ezvalue_row[0]['ezvalue'];
		$data['second_ez_value'] = $ezvalue_row[1]['ezvalue'];

		$ringresults = $this->Engagementringsbetamodel->getFingerSizeResult();
		$finger_size = '<option value="'.$base_link.'?ring_size=">Select Finger Size</option>';
		if( count((array)$ringresults) > 0 ) {
			$req_param = '';
			if(!empty($_GET['carat'])){
				if(!empty($_GET)){
					$req_param .= '&carat='.$_GET['carat'];
				}else{
					$req_param = '?carat='.$_GET['carat'];
				}
			}
			foreach( $ringresults as $rowsize ) {
				$rgsz = setRingSize($rowsize['ring_size']);
				$selected = '';
				$ring_size_link = $base_link.'?ring_size='.$rgsz.$req_param;
				if(isset($_GET['ring_size'])){ if($rgsz == $_GET['ring_size']){ $selected = 'selected="selected"';} }
				$finger_size .= '<option value="'.$ring_size_link.'" '.$selected.' '.selectedOption($rgsz, $ring_size).'>'.$rowsize['ring_size'].'</option>';
			}
		}
		$data['finger_ring_size'] = $finger_size;

		$rowsring = $this->Engagementringsbetamodel->getStarCollectionDetailViaId($product_id);
		$rowsring['prd_id'] = $prod_id;
		$data["getparent_cate"] = $rowsring['parent_cate'];
		$data['shipping_policy'] = $this->get_page_content('shipping-policy');
		$data['finance_policy'] = $this->get_page_content('finance-policy');
		$data['suport_shape'] = (!empty($rowsring['recommended_diamond_shapes'])?$rowsring['recommended_diamond_shapes']:'Support any shape' );
		$data['supported_shape'] = SITE_URL . 'images/shapes_images/' . $diamond_shape_img;
		$data['buildring'] = $this->session->userdata('buildring');
		$data['rowsring'] = $rowsring;
		$data['rowsring']['priceRetail'] = $rowsring['priceRetail'];
		$data['retail_price'] = $rowsring['priceRetail'];
		$data['saving_percent'] = 45.43;
		$data['ring_id'] = $product_id;
		$this->session->set_userdata('ringID',$product_id);
		$d_id = $this->session->userdata('diamnd_id');
		$dm_id = ( !empty($d_id) ? $d_id : 'false' );
		$data['addtoring_link'] = htmlspecialchars(config_item('base_url').'engagement/complete_youring/'.$dm_id.'/'.$product_id.'/addtoring/');
		$data['buynow_link']    = htmlspecialchars(config_item('base_url').'jewelleries/addtoshoppingcart/');
		$data['ringtitle'] = $rowsring['matalType'].' '.$rowsring['metal_color'].' '.$rowsring['finish_option'].' '.$rowsring['category_name'].' Cut Diamond Unique Star Collection';
		$data['product_circle'] = $this->getProductThumbSC( $rowsring, 'listing', $rowsring['product'], $data['ringtitle'], '400', '', 'details');
		$data['product_thums'] = $data['product_circle']['thumb_circle'];
		$data['thumbs_count'] = $data['product_circle']['thumbs_count']-2;
		if(isset($rowsring['item_thumbs'][0]['ImagePath']) && file_exists('scrapper/imgs/'. $rowsring['item_thumbs'][0]['ImagePath'] .'')){
			$data['ringimg']   = SITE_URL.'scrapper/imgs/'.$rowsring['item_thumbs'][0]['ImagePath'];
		}elseif(isset($rowsring['item_thumbs'][1]['ImagePath']) && file_exists('scrapper/imgs/'. $rowsring['item_thumbs'][1]['ImagePath'] .'')){
			$data['ringimg']   = SITE_URL.'scrapper/imgs/'.$rowsring['item_thumbs'][1]['ImagePath'];
		}else{
			$data['ringimg']   = SITE_URL . 'images/no_image.jpeg';
		}
		$data['setingtype']   = $rowsring['subcategory_name'];
		$data['maincate_name'] = $rowsring['category_name'];
		/* $data['popular_listings'] = $this->popularListingsUnique($rowsring['catid'], $product_id, $carats, $rowsring['matalType'], 4);
		$data['more_engagement_listings'] = $this->popularListingsUnique($rowsring['catid'], $product_id, $carats, $rowsring['matalType'], 4); */
		$data['extra_headers'] = '';
		$data['extra_headers'] .= '<script language="javascript" src="'.SITE_URL.'js/jquery.popup.js" type="text/javascript"></script>';
		$data['extraheader'] = '<link type="text/css" href="' . SITE_URL . 'css/magnify_zoom.css" rel="stylesheet" />';
		$data['extraheader'] .= '<link type="text/css" href="' . SITE_URL . 'css/magnific-popup.css" rel="stylesheet" />';
		$rings_thumb = $this->getProductThumbSC( $rowsring );
		$data['rings_thumb'] = $rings_thumb['thumb_circle'];
		$data['suported_shapes'] = $this->getDimaondShapeImage( $rowsring );
		$getring_shape = getSuppliedStoneShape( $rowsring['supplied_side_stone'] );
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

		$defaultMetal = $rowsring['matalType'];
		$defaultRingSz = $rowsring['ringSize'];
		$data['default_metal'] = $defaultMetal;
		$data['set_ring_size'] = resetsSlugTitle($defaultRingSz);

		$setsizes = explode('|', $rowsring['available_ring_size']);
		$trimmedArray = array_map('trim', $setsizes);
		array_filter($trimmedArray);
		$ringWeight = '';
		$metaList = array();
		$testar = array();
		$availableSizs = array();
		$available_insizes = ''; 
		foreach($trimmedArray as $rows_avsize) {
			if( !empty($rows_avsize) ) :
				$metailWeight = $this->Engagementringsbetamodel->getMetalRingWeight($rows_avsize);
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

		$ringsMetal = array('14KT','18KT','PLATINUM','PALLADIUM');
		$getRingsMetal = '';
		if( count((array)$ringsMetal) > 0 ) {
			$ring_metal = '14KT';
			foreach($ringsMetal as $rings_metal) {
				$getRingsMetal .= '<option value="'.trim($rings_metal).'" '.selectedOption($rings_metal, $ring_metal).'>'.set_ring_metal($rings_metal).'</option>';
			}
		} else {
			$getRingsMetal .= '<option value="">Metal Type</option>';
		}

		$getRingsMetalColor = '';
		if(count((array)$rowsring['ringsColor']) > 0 ) {
			$ring_color = 'WHITE GOLD';
			foreach($rowsring['ringsColor'] as $rings_mcolor) {
				$getRingsMetalColor .= '<option value="'.trim($rings_mcolor['metal_color']).'" '.selectedOption($rings_mcolor['metal_color'], $ring_color).'>'.set_ring_metal($rings_mcolor['metal_color']).'</option>';
			}
		} else {
			$getRingsMetalColor .= '<option value="">Metal Color</option>';
		}

		$ringsFinish = array('Finished With Stone');
		$getRingsFinishoption = '';
		if( count((array)$ringsFinish) > 0 ) {
			$rings_finishoption = 'Finished With Stone';
			foreach($ringsFinish as $rings_finished) {
				$getRingsFinishoption .= '<option value="'.trim($rings_finished).'" '.selectedOption($rings_finished, $rings_finishoption).'>'.set_ring_metal($rings_finished).'</option>';
			}
		} else {
			$getRingsFinishoption .= '<option value="">Metal Finish option</option>';
		}

		$getRingsMetalQuality = '';
		if( count((array)$rowsring['ringsQuality']) > 0 ) {
			$ring_quality = 'FG-VVS';
			foreach($rowsring['ringsQuality'] as $rings_quality) {
				$getRingsMetalQuality .= '<option value="'.trim($rings_quality['quality']).'" '.selectedOption($rings_quality['quality'], $ring_quality).'>'.set_ring_metal($rings_quality['quality']).'</option>';
			}
		} else {
			$getRingsMetalQuality .= '<option value="">Metal Quality</option>';
		}

		$data['ringsmetail'] = $getRingsMetal;
		$data['ringsMetalColor'] = $getRingsMetalColor;
		$data['ringsFinishoption'] = $getRingsFinishoption;
		$data['ringsQuality'] = $getRingsMetalQuality;
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
		<meta name="revisit-after" content="7 days">';
		$data['row_cate'] = $rowsring['category_name'];
		$output = $this->load->view('engagementringstrial/star_collection_detail', $data, true);
		$this->output($output, $data);
		//$this->output->cache(120);
	}

	function getProductThumbSC($rowaray=array(), $popup='',$item_id='', $item_title='', $width=215, $height=215, $detail=''){
		$ring_title = $rowaray['matalType'].$rowaray['metal_color'].$rowaray['finish_option'].' '.$rowaray['category_name'].' Cut Diamond Unique Star Collection';
        if(isset($rowaray['item_thumbs']) && count((array)$rowaray['item_thumbs']) > 0){
			$i = 1;
			foreach($rowaray['item_thumbs'] as $rng_thumb){
				$ringsView = SITE_URL.'scrapper/imgs/'.$rng_thumb['ImagePath'];
				$getRingsThumb .= '<li style="overflow: hidden; float: none; width: 58px; height: 58px;" onclick="chang_img(\''.$ringsView.'\')"><a data-img="'.$ringsView.'" class="ring_imges"><img src="'.$ringsView.'" width="64" height="64" alt="'.$item_title.'"></a></li>';
				$i++;
			}
		} else {
			$getRingsThumb .= '';
		}

        $return['thumb_circle'] = $getRingsThumb;
		$return['thumbs_count'] = $i;
        return $return;
    }

	function wedding_band_detail($prod_id=0, $ring_size='6', $ring_metal='14KW', $avsizes=''){
		$product_id = $prod_id;
        $data['onload_class'] = 'catalog-product-view product-14k-gold-diamond-three-stone-wedding-band-set-128c-p-24728 categorypath-diamond-wedding-band-wholesale-preset-gold-diamond-wedding-band-aspx category-diamond-wedding-band-wholesale-preset-gold-diamond-wedding-band';
		$base_link = SITE_URL .'selection/wedding-band-detail/'.$product_id;
		$ringtype = $this->Engagementringsbetamodel->checkRingType($product_id);
		
		$data['onload_class'] = 'catalog-product-view product-14k-gold-diamond-three-stone-wedding-band-set-128c-p-24728 categorypath-diamond-wedding-band-wholesale-preset-gold-diamond-wedding-band-aspx category-diamond-wedding-band-wholesale-preset-gold-diamond-wedding-band';

		$ezvalue_row = $this->Engagementringsbetamodel->getEzOptionValues();
		$data['first_ez_value'] = $ezvalue_row[0]['ezvalue'];
		$data['second_ez_value'] = $ezvalue_row[1]['ezvalue'];

		$ringresults = $this->Engagementringsbetamodel->getFingerSizeResult();
		$finger_size = '<option value="'.$base_link.'?ring_size=">Select Finger Size</option>';
		if(count((array)$ringresults) > 0){
			$req_param = '';
			if(!empty($_GET['carat'])){
				if(!empty($_GET)){
					$req_param .= '&carat='.$_GET['carat'];
				}else{
					$req_param = '?carat='.$_GET['carat'];
				}
			}

			foreach($ringresults as $rowsize ){
				$rgsz = setRingSize($rowsize['ring_size']);
				$selected = '';
				//$ring_size_link = $base_link.'?diamond_lot='.$data['diamond_lot'].'&ring_size='.$rgsz.$req_param;
				$ring_size_link = $base_link.'?ring_size='.$rgsz.$req_param;
				if(isset($_GET['ring_size'])){ if($rgsz == $_GET['ring_size']){ $selected = 'selected="selected"';} }

				$finger_size .= '<option value="'.$ring_size_link.'" '.$selected.' '.selectedOption($rgsz, $ring_size).'>'.$rowsize['ring_size'].'</option>';
			}
		}

		$data['finger_ring_size'] = $finger_size;
		$rowsring = $this->Engagementringsbetamodel->getRingsDetails($product_id, $ring_metal, $ring_size);
		$data['rowsring'] = $rowsring[0];
		$data['retail_price'] = $rowsring[0]['retail_price'];
		$data['our_price'] = $rowsring[0]['price'];
		$data['saving_percent'] = calc_save_percent($rowsring[0]['retail_price'] * PRICE_PERCENT);
		$this->session->set_userdata('ringID',$product_id);
		$d_id = $this->session->userdata('diamnd_id');
		$dm_id = ( !empty($d_id) ? $d_id : 'false' );
		$data['addtoring_link'] = htmlspecialchars(config_item('base_url').'engagement/complete_youring/'.$dm_id.'/'.$product_id.'/addtoring/');
		$data['buynow_link']    = htmlspecialchars(config_item('base_url').'jewelleries/addtoshoppingcart/');
		$data['setingtype']   = $rowsring[0]['sub_category'];
		$data['maincate_name'] = $rowsring[0]['category'];
		$images = explode(";",$rowsring[0]['image']);
		if(!empty($images[0])){
			$data['ringimg'] = $images[0];
		}elseif(!empty($images[1])){
			$data['ringimg'] = $images[1];
		}else{
			$data['ringimg'] = SITE_URL .'images/no_image.jpeg';
		}
		$data['addition_images'] = $rowsring[0]['image'];
		$data['image_path'] =  'images/'. $rowsring[0]['image_path'];
		$data['row_cate'] = $this->getCateName(8);
		$data['shipping_policy'] = $this->get_page_content('shipping-policy');
		$data['finance_policy'] = $this->get_page_content('finance-policy');
		$ringsMetal = $rowsring['ringsMetal'];
		$defaultMetal = ( !empty( $ring_metal )  ? $ring_metal : $ringsMetal[0]['matalType'] );
		$defaultRingSz = ( !empty( $ring_size )  ? $ring_size : $rowsring['ringSize'] );
		$data['default_metal'] = $defaultMetal;
		$data['set_ring_size'] = resetsSlugTitle($defaultRingSz);
		$availblesized = isset($rowsring['availblesize'])?$rowsring['availblesize']:'';
		$setsizes = explode('|', $availblesized);
		$trimmedArray = array_map('trim', $setsizes);
		array_filter($trimmedArray);

		$ringWeight = '';
		$metaList = array();
		$testar = array();
		$availableSizs = array();
		$available_insizes = ''; 
		foreach($trimmedArray as $rows_avsize) {
			if( !empty($rows_avsize) ) :
				$metailWeight = $this->Engagementringsbetamodel->getMetalRingWeight($rows_avsize);
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

		$currMetalSizes = $this->session->userdata('setmetal_list');
		if( count((array)$currMetalSizes) > 0 ) {
			$ringWeight .= '<option value="">Available Sizes</option>';
			foreach($currMetalSizes as $rows_avsize) {
				$metaLink = SITE_URL.'selection/wedding-band-detail/'.trim($rows_avsize['ring_id']).'/'.$defaultRingSz.'/'.$defaultMetal.'/'.$product_id;			
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

		$req_param = '';
		if(!empty($_GET['carat'])){
			if(!empty($_GET)){
				$req_param .= '&carat='.$_GET['carat'];
			}else{
				$req_param = '?carat='.$_GET['carat'];
			}
		}

		$getRingsSize = '';
		if( count((array)$rowsring['ringsSizes']) > 0 ) {
			foreach($rowsring['ringsSizes'] as $rng_size) {
				$rgsz = setRingSize($rng_size['ringSize']);
				$rings_rdlink = SITE_URL.'selection/wedding-band-detail/'.$product_id.'/'.$rgsz.'/'.$defaultMetal.$req_param;
				$getRingsSize .= '<option value="'.$rings_rdlink.'" '.selectedOption($rgsz, $ring_size).'>'.$rng_size['ringSize'] . ' (+$'.$rng_size['priceRetail'].')' .'</option>';
			}
		} else {
			$getRingsSize .= '<option value="">Ring Sizes</option>';
		}

		$getRingsMetal = '';
		if( count((array)$rowsring['ringsMetal']) > 0 ) {
			$req_param = '';
			if(!empty($_GET['diamond_lot'])){
				$req_param = '?diamond_lot='.$_GET['diamond_lot'];
			}
			if(!empty($_GET['ring_size'])){
				if(!empty($req_param)){
					$req_param .= '&ring_size='.$_GET['ring_size'];
				}else{
					$req_param = '?ring_size='.$_GET['ring_size'];
				}
			}
			if(!empty($_GET['carat'])){
				if(!empty($req_param)){
					$req_param .= '&carat='.$_GET['carat'];
				}else{
					$req_param = '?carat='.$_GET['carat'];
				}
			}
			foreach($rowsring['ringsMetal'] as $rings_metal) {
				$req_add = '';
				if( $rings_metal['matalType'] != 'PLAT' ) {
					$req_add = 'Gold';
				}
				if( $rings_metal['matalType'] != 'PDIUM' ) {
					$metal_rdlink = SITE_URL.'selection/wedding-band-detail/'.$product_id.'/'.$defaultRingSz.'/'.trim($rings_metal['matalType']).$req_param;
					$getRingsMetal .= '<option value="'.$metal_rdlink.'" '.selectedOption($rings_metal['matalType'], $ring_metal).'>'.set_ring_metal($rings_metal['matalType']).' '.$req_add.'</option>';
				}
			}
		} else {
			$getRingsMetal .= '<option value="">Metal Type</option>';
		}

		$data['ringsmetail'] = $getRingsMetal;
		$data['ring_weight']   = $ringWeight;
		$data['defaultMetal']      = $defaultMetal;
		$data['available_insizes'] = $available_insizes;
		$data['title'] = $rowsring[0]['name'];

		$data['meta_tags'] = '<meta name="ROBOTS" content="INDEX,FOLLOW">
		<meta name="description" content="Buy online emerald cut diamond rings, three stone diamond rings, 3 stone diamond ring, antique diamond ring, set wedding band, tension wedding bands, affordable wedding band, 3 stone diamond ring, antique diamond ring, set wedding band, pave diamond rings, '.$data['title'].'">
		<meta name="keywords" content="emerald cut diamond rings, three stone diamond rings, 3 stone diamond ring, antique diamond ring, set wedding band, tension wedding bands, affordable wedding band, 3 stone diamond ring, antique diamond ring, set wedding band, pave diamond rings, '.$data['title'].'">
		<meta name="author" content="'.get_site_contact_info('sites_title').'">
		<meta name="publisher" content="'.get_site_contact_info('sites_title').'">
		<meta name="copyright" content="'.get_site_contact_info('sites_title').'">
		<meta http-equiv="Reply-to" content="">
		<meta name="creation_Date" content="12/12/2008">
		<meta name="expires" content="">
		<meta name="revisit-after" content="7 days">';
		$output = $this->load->view('engagementringstrial/wedding_band_detail' , $data , true);
		$this->output($output, $data);
		$this->output->cache(n);
	}

	/* Product detail page */
	function engagement_rings_detail($prod_id=0, $ring_size='6', $ring_metal='14KW', $avsizes=''){
		$product_id = $prod_id;
        $data['onload_class'] = 'catalog-product-view product-14k-gold-diamond-three-stone-engagement-ring-set-128c-p-24728 categorypath-diamond-engagement-rings-wholesale-preset-gold-diamond-engagement-rings-aspx category-diamond-engagement-rings-wholesale-preset-gold-diamond-engagement-rings';
		$base_link = SITE_URL .'selection/engagement-rings-detail/'.$product_id;
		$ringtype = $this->Engagementringsbetamodel->checkRingType($product_id);
		
		$data['onload_class'] = 'catalog-product-view product-14k-gold-diamond-three-stone-engagement-ring-set-128c-p-24728 categorypath-diamond-engagement-rings-wholesale-preset-gold-diamond-engagement-rings-aspx category-diamond-engagement-rings-wholesale-preset-gold-diamond-engagement-rings';

		$ezvalue_row = $this->Engagementringsbetamodel->getEzOptionValues();
		$data['first_ez_value'] = $ezvalue_row[0]['ezvalue'];
		$data['second_ez_value'] = $ezvalue_row[1]['ezvalue'];

		$ringresults = $this->Engagementringsbetamodel->getFingerSizeResult();
		$finger_size = '<option value="'.$base_link.'?ring_size=">Select Finger Size</option>';
		if(count((array)$ringresults) > 0){
			$req_param = '';
			if(!empty($_GET['carat'])){
				if(!empty($_GET)){
					$req_param .= '&carat='.$_GET['carat'];
				}else{
					$req_param = '?carat='.$_GET['carat'];
				}
			}

			foreach($ringresults as $rowsize ){
				$rgsz = setRingSize($rowsize['ring_size']);
				$selected = '';
				//$ring_size_link = $base_link.'?diamond_lot='.$data['diamond_lot'].'&ring_size='.$rgsz.$req_param;
				$ring_size_link = $base_link.'?ring_size='.$rgsz.$req_param;
				if(isset($_GET['ring_size'])){ if($rgsz == $_GET['ring_size']){ $selected = 'selected="selected"';} }

				$finger_size .= '<option value="'.$ring_size_link.'" '.$selected.' '.selectedOption($rgsz, $ring_size).'>'.$rowsize['ring_size'].'</option>';
			}
		}

		$data['finger_ring_size'] = $finger_size;
		$rowsring = $this->Engagementringsbetamodel->getRingsDetails($product_id, $ring_metal, $ring_size);
		$sqlrgsizes = "SELECT style_group,metal_weight as metal_weights,top_width,bottom_width,top_height,bottom_height, supplied_stones,stone_weight,additional_stones FROM `dev_us` WHERE `name` LIKE '".$rowsring[0]['name']."'";
		$resultergsizes = $this->db->query($sqlrgsizes);
		$results2 = $resultergsizes->result_array();
		if(!empty($results2)){
			$data['rowsring'] = array_merge($rowsring[0],$results2);
		}else{
			$data['rowsring'] = $rowsring[0];
		}
		$data['retail_price'] = $rowsring[0]['retail_price'];
		$data['our_price'] = $rowsring[0]['price'];
		$data['saving_percent'] = calc_save_percent($rowsring[0]['retail_price'] * PRICE_PERCENT);
		$this->session->set_userdata('ringID',$product_id);
		$d_id = $this->session->userdata('diamnd_id');
		$dm_id = ( !empty($d_id) ? $d_id : 'false' );
		$data['addtoring_link'] = htmlspecialchars(config_item('base_url').'engagement/complete_youring/'.$dm_id.'/'.$product_id.'/addtoring/');
		$data['buynow_link']    = htmlspecialchars(config_item('base_url').'jewelleries/addtoshoppingcart/');
		$data['setingtype']   = $rowsring[0]['sub_category'];
		$data['maincate_name'] = $rowsring[0]['category'];
		$images = explode(";",$rowsring[0]['image']);
		//$images = array_reverse($imaged);
		if(!empty($images[0])){
			$data['ringimg'] = $images[0];
		}elseif(!empty($images[1])){
			$data['ringimg'] = $images[1];
		}else{
			$data['ringimg'] = SITE_URL .'images/no_image.jpeg';
		}
		$data['addition_images'] = $rowsring[0]['image'];
		$data['image_path'] =  'images/'. $rowsring[0]['image_path'];
		$data['row_cate'] = $this->getCateName(8);
		$data['shipping_policy'] = $this->get_page_content('shipping-policy');
		$data['finance_policy'] = $this->get_page_content('finance-policy');
		$ringsMetal = $rowsring['ringsMetal'];
		$defaultMetal = ( !empty( $ring_metal )  ? $ring_metal : $ringsMetal[0]['matalType'] );
		$defaultRingSz = ( !empty( $ring_size )  ? $ring_size : $rowsring['ringSize'] );
		$data['default_metal'] = $defaultMetal;
		$data['set_ring_size'] = resetsSlugTitle($defaultRingSz);
		$availblesized = isset($rowsring['availblesize'])?$rowsring['availblesize']:'';
		$setsizes = explode('|', $availblesized);
		$trimmedArray = array_map('trim', $setsizes);
		array_filter($trimmedArray);

		$ringWeight = '';
		$metaList = array();
		$testar = array();
		$availableSizs = array();
		$available_insizes = ''; 
		foreach($trimmedArray as $rows_avsize) {
			if( !empty($rows_avsize) ) :
				$metailWeight = $this->Engagementringsbetamodel->getMetalRingWeight($rows_avsize);
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

		$currMetalSizes = $this->session->userdata('setmetal_list');
		if( count((array)$currMetalSizes) > 0 ) {
			$ringWeight .= '<option value="">Available Sizes</option>';
			foreach($currMetalSizes as $rows_avsize) {
				$metaLink = SITE_URL.'selection/engagement-ring-detail/'.trim($rows_avsize['ring_id']).'/'.$defaultRingSz.'/'.$defaultMetal.'/'.$product_id;			
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

		$req_param = '';
		if(!empty($_GET['carat'])){
			if(!empty($_GET)){
				$req_param .= '&carat='.$_GET['carat'];
			}else{
				$req_param = '?carat='.$_GET['carat'];
			}
		}

		$getRingsSize = '';
		if( count((array)$rowsring['ringsSizes']) > 0 ) {
			foreach($rowsring['ringsSizes'] as $rng_size) {
				$rgsz = setRingSize($rng_size['ringSize']);
				$rings_rdlink = SITE_URL.'selection/engagement-ring-detail/'.$product_id.'/'.$rgsz.'/'.$defaultMetal.$req_param;
				$getRingsSize .= '<option value="'.$rings_rdlink.'" '.selectedOption($rgsz, $ring_size).'>'.$rng_size['ringSize'] . ' (+$'.$rng_size['priceRetail'].')' .'</option>';
			}
		} else {
			$getRingsSize .= '<option value="">Ring Sizes</option>';
		}

		$getRingsMetal = '';
		if( count((array)$rowsring['ringsMetal']) > 0 ) {
			$req_param = '';
			if(!empty($_GET['diamond_lot'])){
				$req_param = '?diamond_lot='.$_GET['diamond_lot'];
			}
			if(!empty($_GET['ring_size'])){
				if(!empty($req_param)){
					$req_param .= '&ring_size='.$_GET['ring_size'];
				}else{
					$req_param = '?ring_size='.$_GET['ring_size'];
				}
			}
			if(!empty($_GET['carat'])){
				if(!empty($req_param)){
					$req_param .= '&carat='.$_GET['carat'];
				}else{
					$req_param = '?carat='.$_GET['carat'];
				}
			}
			foreach($rowsring['ringsMetal'] as $rings_metal) {
				$req_add = '';
				if( $rings_metal['matalType'] != 'PLAT' ) {
					$req_add = 'Gold';
				}
				if( $rings_metal['matalType'] != 'PDIUM' ) {
					$metal_rdlink = SITE_URL.'selection/engagement-ring-detail/'.$product_id.'/'.$defaultRingSz.'/'.trim($rings_metal['matalType']).$req_param;
					$getRingsMetal .= '<option value="'.$metal_rdlink.'" '.selectedOption($rings_metal['matalType'], $ring_metal).'>'.set_ring_metal($rings_metal['matalType']).' '.$req_add.'</option>';
				}
			}
		} else {
			$getRingsMetal .= '<option value="">Metal Type</option>';
		}

		$data['ringsmetail'] = $getRingsMetal;
		$data['ring_weight']   = $ringWeight;
		$data['defaultMetal']      = $defaultMetal;
		$data['available_insizes'] = $available_insizes;
		$data['title'] = $rowsring[0]['name'];
		
		$data['meta_tags'] = '<meta name="ROBOTS" content="INDEX,FOLLOW">
		<meta name="description" content="Buy online emerald cut diamond rings, three stone diamond rings, 3 stone diamond ring, antique diamond ring, set engagement ring, tension engagement rings, affordable engagement ring, 3 stone diamond ring, antique diamond ring, set engagement ring, pave diamond rings, '.$data['title'].'">
		<meta name="keywords" content="emerald cut diamond rings, three stone diamond rings, 3 stone diamond ring, antique diamond ring, set engagement ring, tension engagement rings, affordable engagement ring, 3 stone diamond ring, antique diamond ring, set engagement ring, pave diamond rings, '.$data['title'].'">
		<meta name="author" content="'.get_site_contact_info('sites_title').'">
		<meta name="publisher" content="'.get_site_contact_info('sites_title').'">
		<meta name="copyright" content="'.get_site_contact_info('sites_title').'">
		<meta http-equiv="Reply-to" content="">
		<meta name="creation_Date" content="12/12/2008">
		<meta name="expires" content="">
		<meta name="revisit-after" content="7 days">';
		$output = $this->load->view('engagementringstrial/engagement_rings_detail' , $data , true);
		$this->output($output, $data);
		$this->output->cache(n);
	}

	/* Ring product detail page */
    function engagement_ring_detail($prod_id=0, $ring_size='6', $ring_metal='14KW', $avsizes=''){
		$product_id = $prod_id;
		$data['onload_class'] = 'catalog-product-view product-14k-gold-diamond-three-stone-engagement-ring-set-128c-p-24728 categorypath-diamond-engagement-rings-wholesale-preset-gold-diamond-engagement-rings-aspx category-diamond-engagement-rings-wholesale-preset-gold-diamond-engagement-rings';

		$ezvalue_row = $this->Commonmodel->getEzOptionValues();
        $data['first_ez_value'] = $ezvalue_row[0]['ezvalue'];
        $data['second_ez_value'] = $ezvalue_row[1]['ezvalue'];

        $ringresults = $this->Catemodel->getFingerSizeResult();
        $finger_size = '<option value="'.$base_link.'?ring_size=">Select Finger Size</option>';
		if( count((array)$ringresults) > 0 ) {
			$req_param = '';
			if(!empty($_GET['carat'])){
				if(!empty($_GET)){
					$req_param .= '&carat='.$_GET['carat'];
				}else{
					$req_param = '?carat='.$_GET['carat'];
				}
			}

			foreach( $ringresults as $rowsize ) {
				$rgsz = setRingSize($rowsize['ring_size']);
				$selected = '';
				$ring_size_link = $base_link.'?diamond_lot='.$data['diamond_lot'].'&ring_size='.$rgsz.$req_param;
				if(isset($_GET['ring_size'])){ if($rgsz == $_GET['ring_size']){ $selected = 'selected="selected"';} }
				$finger_size .= '<option value="'.$ring_size_link.'" '.$selected.' '.selectedOption($rgsz, $ring_size).'>'.$rowsize['ring_size'].'</option>';
			}
		}
		$data['finger_ring_size'] = $finger_size;

        $rowsring = $this->Catemodel->getRingsDetailViaId($product_id, $ring_metal, $ring_size);

        $data["getparent_cate"] = getMainCatParentCateID($rowsring['catid']);
        $data['shipping_policy'] = $this->get_page_content('shipping-policy');
        $data['finance_policy'] = $this->get_page_content('finance-policy');
        $data['wedding_band'] = strchr( $rowsring['parent_cate'], 'Bands' );

		$ctstone_shape = $rowsring['additional_stones']; 
	    $find_ctsahpe = getCenterStoneShape($ctstone_shape);
        $data['suport_shape'] = ( !empty($ctstone_shape) ? strtoupper( implode(', ', $find_ctsahpe) ) : 'Support any shape' );
        $suport_shape_img = view_shape_value($diamond_shape_img, ucwords( strtolower( $data['suport_shape'] ) ) );
        $data['supported_shape'] = SITE_URL . 'images/shapes_images/' . $diamond_shape_img;
        $data['buildring'] = $this->session->userdata('buildring');
        $data['rowsring'] = $rowsring;
		$data['rowsring']['priceRetail'] = $rowsring['priceRetail'];
		$data['saving_percent'] = 45.43;
		$cur_stones1 = explode(',',$rowsring['supplied_stones']);
		$req_tot = 0;
		if(!empty($cur_stones1)){
			foreach($cur_stones1 as $cur_stone1){
				$req_data = explode('-',$cur_stone1);
				$req_tot = $req_tot + (int)$req_data[0];
			}
			$req_tot = $req_tot +1;
		}
		$metalprc = 0; $weightigrm = str_replace(" grams","",$rowsring['metal_weight']);
		if($rowsring['matalType'] == '14KP'){
			$metalprc = 70*$weightigrm;
		}							
		if($rowsring['matalType'] == '14KW'){
			$metalprc = 70*$weightigrm;
		}
		if($rowsring['matalType'] == '14KY'){
			$metalprc = 70*$weightigrm;
		}
		if($rowsring['matalType'] == '18KP'){
			$metalprc = 97.9*$weightigrm;
		}
		if($rowsring['matalType'] == '18KW'){
			$metalprc = 97.9*$weightigrm;
		}
		if($rowsring['matalType'] == '18KY'){
			$metalprc = 97.9*$weightigrm;
		}
		if($rowsring['matalType'] == 'PLAT'){
			$metalprc = 121*$weightigrm;
		}
		if($rowsring['catid'] == 86 || $rowsring['catid'] == 204){
			$stonprc = 85*$req_tot;
		}else{
			$stonprc = 14*$req_tot;
		}
		$semiMountprce = $metalprc+$stonprc;
		$finalsemiMountprce = $semiMountprce*1.5;

		$data['retail_price'] = $finalsemiMountprce+225;
		$data['ring_id'] = $product_id;
		$this->session->set_userdata('ringID',$product_id);
		$d_id = $this->session->userdata('diamnd_id');
		$dm_id = ( !empty($d_id) ? $d_id : 'false' );
		$data['addtoring_link'] = htmlspecialchars(config_item('base_url').'engagement/complete_youring/'.$dm_id.'/'.$product_id.'/addtoring/');
		$data['buynow_link']	= htmlspecialchars(config_item('base_url').'jewelleries/addtoshoppingcart/');

		$cate = $this->getCateName( $rowsring['catid'] );
		if($rowsring['matalType'] == '14KP'){
			$matalTypes = '14 Karat Pink Gold';
		}elseif($rowsring['matalType'] == '14KY'){
			$matalTypes = '14 Karat Yellow Gold';
		}elseif($rowsring['matalType'] == '18KP'){
			$matalTypes = '18 Karat Pink Gold';
		}elseif($rowsring['matalType'] == '18KW'){
			$matalTypes = '18 Karat White Gold';
		}elseif($rowsring['matalType'] == '18KY'){
			$matalTypes = '18 Karat Yellow Gold';
		}elseif($rowsring['matalType'] == 'PLAT'){
			$matalTypes = 'Platinum';
		}else{
			$matalTypes = '14 Karat White Gold';
		}
		$data['ringtitle'] = $matalTypes.' '.$cate['main_cname'].' Cut Diamond Unique Engagement Ring ';
		$results['item_thumbs'] = $this->Catemodel->getRingThumbs( $rowsring['name'] );
		$data['product_circle'] = $this->getProductThumb( $results, 'listing', $rowsring['name'], $data['ringtitle'], '400', '', 'details');
		$data['product_thums'] = $data['product_circle']['thumb_image'];
		$data['thumbs_count'] = $data['product_circle']['thumbs_count']-2;
		$data['ringimg']   = SITE_URL . 'scrapper/imgs/'.$rowsring['ImagePath'];
		$data['setingtype']   = $cate['sub_cname'];
		$data['maincate_name'] = $cate['main_cname'];
		$data['subcate_link'] = '<a href="'.SITE_URL.'selection/engagement_ring_listings/'.$rowsring['catid'].'" title="">'.$cate['main_cname'].' Diamond Engagement Rings</a>';
        $data['extra_headers'] = '';
        $data['extra_headers'] .= '<script language="javascript" src="'.SITE_URL.'js/jquery.popup.js" type="text/javascript"></script>';
        $data['extraheader'] = '<link type="text/css" href="' . SITE_URL . 'css/magnify_zoom.css" rel="stylesheet" />';
        $data['extraheader'] .= '<link type="text/css" href="' . SITE_URL . 'css/magnific-popup.css" rel="stylesheet" />';

		/* get ring thumb item thumbs */
		$rings_thumb = $this->getProductThumb( $rowsring );
        $data['rings_thumb'] = $rings_thumb['thumb_circle'];
        $data['suported_shapes'] = $this->getDimaondShapeImage( $rowsring );

		/* managed center diamond stones */
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
		$metaList = array();
		$testar = array();
		$availableSizs = array();
		$available_insizes = ''; 
		foreach($trimmedArray as $rows_avsize) {
			if( !empty($rows_avsize) ) :
				$metailWeight = $this->Catemodel->getMetalRingWeight($rows_avsize);
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

		$currMetalSizes = $this->session->userdata('setmetal_list');
		if( count((array)$currMetalSizes) > 0 ) {
			$ringWeight .= '<option value="">Available Sizes</option>';
			foreach($currMetalSizes as $rows_avsize) {
				$metaLink = SITE_URL.'selection/engagement-ring-detail/'.trim($rows_avsize['ring_id']).'/'.$defaultRingSz.'/'.$defaultMetal.'/'.$product_id;			
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

		$req_param = '';
        if(!empty($_GET['carat'])){
			if(!empty($_GET)){
				$req_param .= '&carat='.$_GET['carat'];
			}else{
				$req_param = '?carat='.$_GET['carat'];
			}
		}

		$getRingsSize = '';
		if( count((array)$rowsring['ringsSizes']) > 0 ) {
			foreach($rowsring['ringsSizes'] as $rng_size) {
				$rgsz = setRingSize($rng_size['ringSize']);
				$rings_rdlink = SITE_URL.'selection/engagement-ring-detail/'.$product_id.'/'.$rgsz.'/'.$defaultMetal.$req_param;
				$getRingsSize .= '<option value="'.$rings_rdlink.'" '.selectedOption($rgsz, $ring_size).'>'.$rng_size['ringSize'] . ' (+$'.$rng_size['priceRetail'].')' .'</option>';
			}
		} else {
			$getRingsSize .= '<option value="">Ring Sizes</option>';
		}

		$getRingsMetal = '';
		if( count((array)$rowsring['ringsMetal']) > 0 ) {
			$req_param = '';
			if(!empty($_GET['diamond_lot'])){
				$req_param = '?diamond_lot='.$_GET['diamond_lot'];
			}
			if(!empty($_GET['ring_size'])){
				if(!empty($req_param)){
					$req_param .= '&ring_size='.$_GET['ring_size'];
				}else{
					$req_param = '?ring_size='.$_GET['ring_size'];
				}
			}
			if(!empty($_GET['carat'])){
				if(!empty($req_param)){
					$req_param .= '&carat='.$_GET['carat'];
				}else{
					$req_param = '?carat='.$_GET['carat'];
				}
			}
			foreach($rowsring['ringsMetal'] as $rings_metal) {
				$req_add = '';
				if( $rings_metal['matalType'] != 'PLAT' ) {
					$req_add = 'Gold';
				}
				if( $rings_metal['matalType'] != 'PDIUM' ) {
					$metal_rdlink = SITE_URL.'selection/engagement-ring-detail/'.$product_id.'/'.$defaultRingSz.'/'.trim($rings_metal['matalType']).$req_param;
					$getRingsMetal .= '<option value="'.$metal_rdlink.'" '.selectedOption($rings_metal['matalType'], $ring_metal).'>'.set_ring_metal($rings_metal['matalType']).' '.$req_add.'</option>';
				}
			}
		} else {
			$getRingsMetal .= '<option value="">Metal Type</option>';
		}

		if(isset($_GET['carat'])){
			$carats = $_GET['carat'];
		}else{
			$carats = str_replace(" CT.","",$rowsring['stone_weight']);
		}
		$data['popular_listings'] = $this->popularListingsUnique($rowsring['catid'], $product_id, $carats, $rowsring['matalType'], 4);
		$data['more_engagement_listings'] = $this->popularListingsUnique($rowsring['catid'], $product_id, $carats, $rowsring['matalType'], 4);
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
		<meta name="revisit-after" content="7 days">';
		$data['ringsize_option'] = $getRingsSize;
        $data['row_cate'] = $this->getCateName($rowsring['catid']);

		$output = $this->load->view('engagementringstrial/engagement_unique_details' , $data , true);
		$this->output($output, $data);
		$this->output->cache(120);
	}

	function getCenterStoneList($ringid=0) {
		$rowsring = $this->Catemodel->getRingsDetailViaId($ringid, '', '');
		/* managed center diamond stones */
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
		$results = $this->Catemodel->getRapnetListResult($diamond_shape, $dmlength, $dmwidth, $dmcarat);      
		return $results;
	}

	/* get commnets list */
	function getProductReviews($rid=0) {
		/* get user comments */
		$rings_coments = $this->Catemodel->getComentsListView($rid);

		$view_coments = '';
		if( count((array)$rings_coments) > 0 ) {
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
	
	function getProductThumbUER($rowaray=array(), $popup='', $item_id='', $item_title='', $width=215, $height=215, $detail='') {
		$ring_title = $this->getRingTitle( $rowaray );
        if(isset($rowaray['item_thumbs']) && count((array)$rowaray['item_thumbs']) > 0){
			$i = 1;
			foreach($rowaray['item_thumbs'] as $rng_thumb){
				$ringsView = SITE_URL.'scrapper/imgs/'.$rng_thumb['ImagePath'];
				$getRingsThumb .= '<li style="overflow: hidden; float: none; width: 58px; height: 58px;" onclick="chang_img(\''.$ringsView.'\')"><a data-img="'.$ringsView.'" class="ring_imges"><img src="'.$ringsView.'" width="64" height="64" alt="'.$item_title.'"></a></li>';
				$i++;
			}
		} else {
			$getRingsThumb .= '';
		}

        $return['thumb_circle'] = $getRingsThumb;
		$return['thumbs_count'] = $i;
        return $return;
    }

	function getProductThumbNEW($rowaray=array(), $popup='', $item_id='', $item_title='', $width=215, $height=215, $detail='') {
		$ring_title = $this->getRingTitle( $rowaray );
        if(isset($rowaray['item_thumbs']) && count((array)$rowaray['item_thumbs']) > 0){
			$i = 1;
			foreach($rowaray['item_thumbs'] as $rng_thumb){
				$ringsView = $rng_thumb['ImagePath'];
				$getRingsThumb .= '<li style="overflow: hidden; float: none; width: 58px; height: 58px;" onclick="chang_img(\''.$ringsView.'\')"><a data-img="'.$ringsView.'" class="ring_imges"><img src="'.$ringsView.'" width="64" height="64" alt="'.$item_title.'"></a></li>';
				$i++;
			}
		} else {
			$getRingsThumb .= '';
		}

        $return['thumb_circle'] = $getRingsThumb;
		$return['thumbs_count'] = $i;
        return $return;
    }

	/* get product thumb */
	function getProductThumb($rowaray=array(), $popup='', $item_id='', $item_title='', $width=215, $height=215, $detail='') {
		$getRingsThumb = '';
		$check_thumb = array();
		$ring_title = $this->getRingTitle( $rowaray );
		$i = 1;
		$itemID = trim( $item_id );
		$set_ring_thumb = '';
		$set_popup_thumb = '';

		$new_array_for_image  = array();
        if(isset($rowaray['item_thumbs']) && count((array)$rowaray['item_thumbs']) > 0){
			foreach($rowaray['item_thumbs'] as $rng_thumb){
				if($detail == 'details'){
					$ringsView = SITE_URL.'scrapper/imgs/'.$rng_thumb['ImagePath'];
					if($i == 2){
						$new_array_for_image[] = '<a class="lightbox" id="light_a" href="'.$ringsView.'"><img id="light_img" src="'.$ringsView.'" style="margin: 0px 0px;width:100%;" alt="'.$item_title.'" /></a><br><br>';
					}else{
						$new_array_for_image[] = '<a class="lightbox" onclick="ch_imgs(\''.$ringsView.'\')"><img src="'.$ringsView.'" style="width:100px;height:100px;display:inherit;margin: 5px;" alt="'.$item_title.'" /></a>';
					}
				}else{
					$unique_id = 'bk_'.$i.'_'.$item_id;
					$ringsThumb = SITE_URL.'scrapper/imgs/'.$rng_thumb['ImagePathThumb'];
					$ringsView = SITE_URL.'scrapper/imgs/'.$rng_thumb['ImagePath'];

					if(!in_array($rng_thumb['ImagePathThumb'], $check_thumb)){
						if(empty($popup)){
							$getRingsThumb .= '<div class="smalimgview">
								<a href="#javascript;" onclick="ringThumbView(\''.$ringsView.'\')"><img src="'.$ringsThumb.'" alt=""></a>
							</div>';
						} else {
							if($popup == 'listing'){
								$getRingsThumb .= '<li id="'.$i.'"><a href="javascript://" onclick="ringsThumbView(\''.$ringsView.'\', \''.$itemID.'\', \''.$i.'\');" title="'.$ring_title.'" onmouseover="ringsThumbView(\''.$ringsView.'\', \''.$itemID.'\', \''.$i.'\');" title="'.$ring_title.'">'. '<img src="'.SITE_URL.'img/heart_diamond/in_active_circle.jpg" width="9" height="9" alt="'.$ring_title.'"></a>'. '</li>';
							} else {
								$getRingsThumb .= '<li><a href="javascript://" onclick="ringThumbView(\''.$ringsView.'\');" title="'.$ring_title.'"><img src="'.$ringsThumb.'" width="31" alt="'.$ring_title.'"></a> </li>';
							}
						}

						$active_class = ( $i == 2 ? 'active_view' : 'hide_imgbk' );
						if( empty($detail) ) {
							if( $i == 2 ) {
								$set_ring_thumb = '<img src="'.$ringsView.'" width="'.$width.'" height="'.$height.'" alt="'.$item_title.'" />'; 
							}
						} else {
							$set_ring_thumb .= '<div class="sp '.$active_class.'" id="'.$unique_id.'"><img src="'.$ringsView.'" onmouseover="show_magnify_affect(\''.$unique_id.'\')" width="'.$width.'" height="'.$height.'" alt="'.$item_title.'" /></div>';
							if( $i == 2 ) {
								$set_popup_thumb .= '<a href="'.$ringsView.'"><img src="'.SITE_URL.'img/search_plus_ic.png" alt="" width="28" /></a>';
							} else {
								$set_popup_thumb .= '<a href="'.$ringsView.'"></a>';
							}
						}
					}
					$check_thumb[] = $rng_thumb['ImagePathThumb'];
				}
				$i++;
			}
		} else {
			$getRingsThumb .= '';
		}

        if($new_array_for_image){
            $increeee = 1;
            $our_swap_back          = $new_array_for_image[0];
            $new_array_for_image[0] = $new_array_for_image[1];
            $new_array_for_image[1] = $our_swap_back;
            foreach ($new_array_for_image as $new_arrayimage) {
                $set_ring_thumb .= $new_arrayimage; 
                $increeee++;
            }
        }
        $return['thumb_circle'] = $getRingsThumb;
        $return['thumb_image']  = $set_ring_thumb;
        $return['thumbs_popup'] = $set_popup_thumb;
		$return['thumbs_count'] = $i;
        return $return;
    }

	/* Get diamond shape */
    function getDimaondShapeImage($rowshape=array()) {
		$getring_shape = getSuppliedStoneShape( $rowshape['supplied_stones'] );
		$center_stshapes = array('B'=>'round','H'=>'heart','E'=>'emerald','PR'=>'princess','R'=>'radiant','O'=>'oval','M'=>'marquise','AS'=>'asscher','P'=>'pear','C'=>'cushion');

		$center_stshapes = array('B'=>'round','H'=>'heart','E'=>'emerald','PR'=>'princess','R'=>'radiant','O'=>'oval','M'=>'marquise','AS'=>'asscher','P'=>'pear','C'=>'cushion');
		$view_ctshape = '';

		$shapPath = SITE_URL.'img/diamond_shapes/';
		$ctstone_shape = $rowshape['additional_stones']; 
		$find_ctsahpe = getCenterStoneShape($ctstone_shape);

		//$getsp_shape = $center_stshapes[$getring_shape];
		$data['suport_shape'] = ( !empty($ctstone_shape) ? strtoupper( implode(', ', $find_ctsahpe) ) : 'Support any shape' );
		//$spstone_arlist = array($getsp_shape);

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

	/* rings similar items */
	function ringSimilarItems($ring_cateid=0, $prod_id=0, $limit=5, $listing='') {
		return;
		$rowsring = $this->Catemodel->getRingsByCateory($ring_cateid, 0, $limit, $prod_id);
        $similar_rings = '';
        $popupBlock = '';
		if( count((array)$rowsring['results']) > 0 ) {
			foreach( $rowsring['results'] as $rowring ) {
				$detaiLink = SITE_URL . 'selection/engagement-ring-detail/' . $rowring['ring_id'];
				$ringImageLink = SITE_URL . 'scrapper/imgs/' . $rowring['ImagePath'];
				$ring_title = $this->getRingTitle($rowring);
				$retail_price  = $rowring['priceRetail'] * PRICE_PERCENT;  //// PRICE_PERCENT : 3.5
				$ring_ourprice = $rowring['priceRetail'];
				$saving_percent = ( 100 - ( ( $ring_ourprice / $retail_price ) * 100 ) );
				$popupBlock .= $this->product_popup_detail( $rowring['ring_id'] );
				$popupLink = SITE_URL . 'selection/product_popup_detail/'.$rowring['ring_id'] . '/?keepThis=true&TB_iframe=true&width=900&height=600&modal=false';

				if( empty($listing) ) {
					$similar_rings .= '<div class="prdSection col-sm-3" id="'.$rowring['ring_id'].'">
					<a href="'.$detaiLink.'" class="alsoviwed-product-img">
					<img class="" src="'.$ringImageLink.'" width="200" alt="'.$ring_title.'" title="'.$ring_title.'" style="display: inline;">
					</a>
					<a class="prdName" title="'.$ring_title.'" href="'.$detaiLink.'">'.$ring_title.'</a>
					<div class="price-box">
					<p class="old-price"><span>Retail Price:</span>
					<span style="text-decoration: line-through;"> $'._nf($retail_price).'</span></p>
					<p class="our-price"><span>Our Price:</span><span> $'._nf($ring_ourprice).'</span></p>
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
					<span id="old-price-802865" class="price">$'._nf($retail_price).'</span></p>
					<p class="our-price"><span class="price-label">Our Price:</span> 
					<span id="product-price-'.$rowring['ring_id'].'">$'._nf($ring_ourprice).'</span>
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
					<span id="old-price-'.$rowring['ring_id'].'" class="price-qv">$'._nf($retail_price).'</span></p>
					<p class="old-price-qv"><span class="price-label-qv">Our Price:</span> <span id="product-price-'.$rowring['ring_id'].'" class="new-price-qv">$'._nf($ring_ourprice).'</span> <span class="special-price-label-qv">(Savings: '.round($saving_percent).'%)</span></p>
					</div>
					</div>
					<div id="top-product_additional_data_'.$rowring['ring_id'].'"></div>
					</div>
					</div>
					</li>';
				}
				$similar_rings .= $popupBlock;
            }
        }
        return $similar_rings;
    }
    
	/* popular listings */
	function popularListings($ring_cateid=0, $prod_id=0, $limit=5, $listing='') {
		$rowsring = $this->Catemodel->getRingsByCateory($ring_cateid, 0, $limit, $prod_id);
		$similar_rings = '';
		if( count((array)$rowsring['results']) > 0 ) {
			foreach( $rowsring['results'] as $rowring ) {
				$detaiLink = SITE_URL . 'selection/engagement-ring-detail/' . $rowring['ring_id'];
				$ringImageLink = SITE_URL . 'scrapper/imgs/' . $rowring['ImagePath'];
				$ring_title = $this->getRingTitle($rowring, 'similar');
				$retail_price  = $rowring['priceRetail'] * PRICE_PERCENT;
				$ring_ourprice = $rowring['priceRetail'];

				$popupBlock = $this->product_popup_detail( $rowring['ring_id'] );
				$popupLink = SITE_URL . 'selection/product_popup_detail/'.$rowring['ring_id'] . '/?keepThis=true&TB_iframe=true&width=900&height=600&modal=false';
				$cate = $this->getCateName( $rowring['catid'] );
				$results['item_thumbs'] = $this->Catemodel->getRingThumbs( $rowring['name'] );
				$product_circle = $this->getProductThumb( $results, 'listing', $rowring['name'], $ring_title);
              
				if($rowring['additional_stones'] == ''){
					$where_dev_index = array('carat' => '0.25', 'price !=' => '', 'color !=' => '');
					$get_dev_index_info = $this->Catemodel->getdata_any_table_limit_order_where('dev_index', $where_dev_index, '1', '0', 'price');
				}else{
                    $additional_stones_ex = explode('/', $rowring['additional_stones']);
                    $additional_stones_first_item   = explode('-', $additional_stones_ex['0']);
                    $additional_stones_first_item2   = $additional_stones_first_item['1']; 
                    $check_count = 0;
                    for($i=1; $i<5; $i++){
                        $where_dev_index             = array('price !=' => '', 'color !=' => '');
                        $get_dev_index_info          = $this->Catemodel->getdata_any_table_limit_order_by_where_like_after('dev_index', $where_dev_index, $i, $check_count, $additional_stones_first_item2, 'Meas');
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
                        $get_dev_index_info          = $this->Catemodel->getdata_any_table_limit_order_where('dev_index', $where_dev_index, '1', '0', 'price');
                    }
                }
				$get_diamond_price  = $get_dev_index_info['0']->price;
				$get_diamond_price  = $get_diamond_price * 1.10;
				$ourPriceNew = _nf($ring_ourprice + $get_diamond_price);
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
				<div>Setting Price</div>
				' . $this->get_ring_hover_view($rowring, $cate['sub_cname'], $rowring['ring_id'], $ringImageLink, $ring_title, $results, $popupLink) . '
				</div>' . $popupBlock;
			}
		}
        return $similar_rings;
    }

	/* popular listings for Costar Ring */
	function popularRingListingsCostar($ring_cateid=0, $prod_id=0, $metal=0, $quality=0, $carat=0, $limit=5) {
		$rowsring = $this->Catemodel->getRingsByCostar($ring_cateid, $prod_id, $metal, $quality, $carat, 0, $limit);
		$similar_rings = '';
		if( count((array)$rowsring['results']) > 0 ) {
			foreach($rowsring['results'] as $rowring){
				$detaiLink = SITE_URL . 'selection/engagement-rings-detail/' . $rowring['id'];
				$ringImageLink = '';
				if(!empty($rowring['image'])){
					$images = explode(";",$rowring['image']);
					if(file_exists('images/'. $rowring['image_path'].$images[0].'')){
						$ringImageLink = SITE_URL .'images/'. $rowring['image_path'].$images[0];
					}else{
						$ringImageLink = SITE_URL .'images/'. $rowring['image_path'].$images[1];
					}
				}
				$ring_title = $rowring['metal'].' '.$rowring['category'].' Cut Diamond Engagement Ring '.$rowring['side_stone_weight'] .' '.$rowring['sub_category'] .' Style';
				$retail_price  = $rowring['retail_price'];
				$ring_ourprice = $rowring['price'];
				$popupBlock = $this->product_popup_detail_costar($rowring['id']);
				$popupLink = SITE_URL . 'selection/product_popup_detail/'.$rowring['id'] . '/?keepThis=true&TB_iframe=true&width=900&height=600&modal=false';
				$cate = $rowring['category'];
				$results = array();
				$similar_rings .= '<div class="ring_cols col-sm-3" onmouseover="show_collection_block(\'hover_'.$rowring['id'].'\')" onmouseout="hide_block(\'hover_'.$rowring['id'].'\')">
					<div>
						<a href="'.$detaiLink.'">
							<div class="set_thumb_img" id="'.$rowring['id'].'">
								<img src="'.$ringImageLink.'" style="width:215px;height:215px;" alt="'.$ring_title.'">
							</div>    
						</a>
					</div>
					<div class="clear"></div>
					<div>'.$ring_title.'</div><br>
					<div class="ring_price_label">Band Price: $'. _nf($retail_price).'</div>
					<div class="ring_price_label">Setting Price: $'. _nf($ring_ourprice).'</div>
					' . $this->get_ring_hover_view($rowring, $cate, $rowring['id'], $ringImageLink, $ring_title, $results, $popupLink) . '
				</div>'. $popupBlock;
			}
		}
        return $similar_rings;
    }
	
	/* product popup detail for Overnight Ring */
	function product_popup_detail_costar($id=0) {
		$rowsring = $this->Catemodel->getovernightRingsDetails($id, '', '');
		$data['title'] = 'Engagement Rings';
		$data['ring_title'] = $rowsring['description'];
		$gallery_imgs1 = explode(";",$rowsring['image']);
		$gallery_imgs = array_unique($gallery_imgs1);
		$data['ringimg']   = SITE_URL .'images/'.$rowsring['image_path'].$gallery_imgs[0];
		$data['rowsring']   = $rowsring;
		$saving_percent = '';
		$main_amount = $rowsring['price'];
		$band_amount = $rowsring['retail_price'];
		$product_thums = '';
		if(!empty($gallery_imgs)){
			$m=1;
			foreach($gallery_imgs as $gallery_img1){
				if (strpos($gallery_img1, '.jpg') !== false) {
					if(file_exists('images/'.$rowsring['image_path'].$gallery_img1)){
						if($m == 1){
							$product_thums .= '<a class="lightbox" id="light_a" href="javascript:void(0);" onclick="ch_imgs'.$rowsring['id'].'(\''. SITE_URL .'images/'.$rowsring['image_path'].$gallery_img1 .'\')"> <img id="light_img" src="'. SITE_URL .'images/'.$rowsring['image_path'].$gallery_img1 .'" style="margin: 0px 0px;width:100%;" alt="'.$rowsring['description'].'" /></a>';
						}else{
							$product_thums .= '<a href="javascript:void(0);" onclick="ch_imgs'.$rowsring['id'].'(\''. SITE_URL .'images/'.$rowsring['image_path'].$gallery_img1 .'\')"> <img src="'. SITE_URL .'images/'.$rowsring['image_path'].$gallery_img1 .'" style="width:55px;height:55px;display: inherit;" alt="'.$rowsring['description'].'" /></a>';
						}
						$m++;
					}
				}
			}
		}

		$ring_detail_bk = '<div id="pop_'.$id.'" class="simplePopup collection_view">';
			$ring_detail_bk .= '<div class="col-sm-5 imgleft_block">
				<div class="product-image product-image-zoom zoomright" id="ringsthumb_view yy">
					<div class="set_thumb_img" id="popup_'.$rowsring['id'].'">                                
						<div class="" id="show_thumb_view"></div>
						'.$product_thums.'
					</div>
					<div class="left_arrow_view"><a href="#javascript" onclick="button_previous(\'popup_'.$rowsring['id'].'\')"><img src="'.SITE_URL.'img/heart_diamond/left_arrow_view_ic.jpg" alt="" /></a></div>
					<div class="right_arrow_view"><a href="#javascript" onclick="button_next(\'popup_'.$rowsring['id'].'\')"><img src="'.SITE_URL.'img/heart_diamond/right_arrow_view_ic.jpg" alt="" /></a></div>
				</div>';
				$ring_detail_bk .= '<div class="clear">
			</div><br>
		</div>';
		$ring_detail_bk .= '<div class="col-sm-6 pull-right"><br></br>
			<div class="price-box">
				<div class="product-name"><h1>'.$rowsring['description'].'</h1></div>
				<p class="old-price fb-old-price f-fix"><span class="price-label">Item Code:</span> <span>'.$rowsring['item_number'].'</span> </p>
				<p class="old-price"><span class="ourprice-label">Setting Price:</span> <span class="new-price" id="product-price-'.$rowsring['id'].'">$'._nf($main_amount).'</span></p>
			</div>
			<form id="'.$id.'" action="" method="">
				<label for="qty">QUANTITY:</label>
				<input type="text" name="qty" id="qty" maxlength="12" value="1" title="Qty" class="input-text qty required-entry">
				<div class="product-options-bottom">
					<div class="add-to-cart-1">
						<input type="hidden" name="txt_rstyle" id="txt_rstyle" value="'.$rowsring['sub_category'].'">
						<input type="hidden" name="3ez_price" value="0">
						<input type="hidden" name="5ez_price" value="0">
						<input type="hidden" name="main_price" id="main_price" value="'.$rowsring['retail_price'].'">
						<input type="hidden" name="price" value="'.$rowsring['price'].'">
						<input type="hidden" name="vender" value="unique" />
						<input type="hidden" name="url" value="'.$data['ringimg'].'">
						<input type="hidden" name="prodname" value="'.$rowsring['name'].'">
						<input type="hidden" name="diamnd_count" value="'.$rowsring['diamond_weight'].'">
						<input type="hidden" name="ring_shape" value="">
						<input type="hidden" name="ring_carat" value="'.$rowsring['metal'].'">
						<input type="hidden" name="prid" id="prid" value="'.$rowsring['id'].'">
						<input type="hidden" name="txt_ringtype" value="generic_ring">
						<input type="hidden" name="txt_ringsize" value="">
						<input type="hidden" name="txt_metal" value="">
						<input type="hidden" name="metals_weight" value="'.$rowsring['metal'].'">
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
					<br clear="all">
					<span id="item-info"><b>Product Details</b></span>
					<table id="item-tbl" class="data-table2" width="100%" cellspacing="0" cellpadding="0">
						<tbody>
							<tr class="first-row">
								<th style="width:40%;color:#ff0000;font-weight:bold;">Item Code</th>
								<td style="color:#ff0000;font-weight:bold;">'.$rowsring['item_number'].'</td>
							</tr>
							<tr class="second-row">
								<th style="width:40%;">Carat Weight</th>
								<td>'.$rowsring['side_stone_weight'].'</td>
							</tr>
							<tr class="first-row">
								<th style="width:40%;">Center Stone Shape</th>
								<td>'.$rowsring['category'].'</td>
							</tr>
							<tr class="first-row">
								<th style="width:40%;">Center Stone Size</th>
								<td>'.$rowsring['diamond_weight'].'</td>
							</tr>
							<tr class="first-row">
								<th style="width:40%;">Center Stone Dimension</th>
								<td>'.$rowsring['ring_size'].'</td>
							</tr>
							<tr class="first-row">
								<th style="width:40%;">Side Stone Quality</th>
								<td>'.$rowsring['diamond_quality'].'</td>
							</tr>
							<tr class="first-row">
								<th style="width:40%;">Metal Type</th>
								<td>'.$rowsring['metal'].'</td>
							</tr>
						</tbody>
					</table>
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
    }

	/* popular listings for Overnight Ring */
	function popularRingListingsOvernight($ring_cateid=0, $prod_id=0, $metal=0, $quality=0, $carat=0, $limit=5) {
		$rowsring = $this->Catemodel->getRingsByOvernight($ring_cateid, $prod_id, $metal, $quality, $carat, 0, $limit);
		$similar_rings = '';
		if( count((array)$rowsring['results']) > 0 ) {
			foreach( $rowsring['results'] as $rowring ) {
				$detaiLink = SITE_URL . 'selection/engagement-rings-detail/' . $rowring['id'];
				$ringImageLink = '';
				if(!empty($rowring['image'])){
					$images = explode(";",$rowring['image']);
					if(file_exists('images/'. $rowring['image_path'].str_replace("THUMBNAIL/","",$images[0]).'')){
						$ringImageLink = SITE_URL .'images/'. $rowring['image_path'].str_replace("THUMBNAIL/","",$images[0]);
					}else{
						$ringImageLink = SITE_URL .'images/'. $rowring['image_path'].str_replace("THUMBNAIL/","",$images[1]);
					}
				}
				$ring_title = $rowring['metal'].' '.$rowring['category'].' Cut Diamond Engagement Ring '.$rowring['side_stone_weight'] .' '.$rowring['sub_category'] .' Style';
				$retail_price  = $rowring['retail_price'];
				$ring_ourprice = $rowring['price'];
				$popupBlock = $this->product_popup_detail_overnight($rowring['id']);
				$popupLink = SITE_URL . 'selection/product_popup_detail/'.$rowring['id'] . '/?keepThis=true&TB_iframe=true&width=900&height=600&modal=false';
				$cate = $rowring['category'];
				$results = array();
				$similar_rings .= '<div class="ring_cols col-sm-3" onmouseover="show_collection_block(\'hover_'.$rowring['id'].'\')" onmouseout="hide_block(\'hover_'.$rowring['id'].'\')">
					<div>
						<a href="'.$detaiLink.'">
							<div class="set_thumb_img" id="'.$rowring['id'].'">
								<img src="'.$ringImageLink.'" style="width:215px;height:215px;" alt="'.$ring_title.'">
							</div>    
						</a>
					</div>
					<div class="clear"></div>
					<div>'.$ring_title.'</div><br>
					<div class="ring_price_label">Setting Price: $'. _nf($ring_ourprice).'</div>
					' . $this->get_ring_hover_view($rowring, $cate, $rowring['id'], $ringImageLink, $ring_title, $results, $popupLink) . '
				</div>'. $popupBlock;
			}
		}
        return $similar_rings;
    }

	/* product popup detail for Overnight Ring */
	function product_popup_detail_overnight($id=0) {
		$rowsring = $this->Catemodel->getovernightRingsDetails($id, '', '');
		$data['title'] = 'Engagement Rings';
		$data['ring_title'] = $rowsring['description'];
		$gallery_imgs1 = explode(";",$rowsring['image']);
		$gallery_imgs = array_unique($gallery_imgs1);
		$data['ringimg']   = SITE_URL .'images/'.$rowsring['image_path'].str_replace("THUMBNAIL/","",$gallery_imgs[0]);
		$data['rowsring']   = $rowsring;
		$saving_percent = '';
		$main_amount = $rowsring['price'];
		$product_thums = '';
		if(!empty($gallery_imgs)){
			$m=1;
			foreach($gallery_imgs as $gallery_img1){
				if (strpos($gallery_img1, '.jpg') !== false) {
					if(file_exists('images/'.$rowsring['image_path'].str_replace("THUMBNAIL/","",$gallery_img1))){
						if($m == 1){
							$product_thums .= '<a class="lightbox" id="light_a" href="javascript:void(0);" onclick="ch_imgs'.$rowsring['id'].'(\''. SITE_URL .'images/'.$rowsring['image_path'].str_replace("THUMBNAIL/","",$gallery_img1) .'\')"> <img id="light_img" src="'. SITE_URL .'images/'.$rowsring['image_path'].str_replace("THUMBNAIL/","",$gallery_img1) .'" style="margin: 0px 0px;width:100%;" alt="'.$rowsring['description'].'" /></a>';
						}else{
							$product_thums .= '<a href="javascript:void(0);" onclick="ch_imgs'.$rowsring['id'].'(\''. SITE_URL .'images/'.$rowsring['image_path'].str_replace("THUMBNAIL/","",$gallery_img1) .'\')"> <img src="'. SITE_URL .'images/'.$rowsring['image_path'].str_replace("THUMBNAIL/","",$gallery_img1) .'" style="width:55px;height:55px;display: inherit;" alt="'.$rowsring['description'].'" /></a>';
						}
						$m++;
					}
				}
			}
		}

		$ring_detail_bk = '<div id="pop_'.$id.'" class="simplePopup collection_view">';
			$ring_detail_bk .= '<div class="col-sm-5 imgleft_block">
				<div class="product-image product-image-zoom zoomright" id="ringsthumb_view yy">
					<div class="set_thumb_img" id="popup_'.$rowsring['id'].'">                                
						<div class="" id="show_thumb_view"></div>
						'.$product_thums.'
					</div>
					<div class="left_arrow_view"><a href="#javascript" onclick="button_previous(\'popup_'.$rowsring['id'].'\')"><img src="'.SITE_URL.'img/heart_diamond/left_arrow_view_ic.jpg" alt="" /></a></div>
					<div class="right_arrow_view"><a href="#javascript" onclick="button_next(\'popup_'.$rowsring['id'].'\')"><img src="'.SITE_URL.'img/heart_diamond/right_arrow_view_ic.jpg" alt="" /></a></div>
				</div>';
				$ring_detail_bk .= '<div class="clear">
			</div><br>
		</div>';
		$ring_detail_bk .= '<div class="col-sm-6 pull-right"><br></br>
			<div class="price-box">
				<div class="product-name"><h1>'.$rowsring['description'].'</h1></div>
				<p class="old-price fb-old-price f-fix"><span class="price-label">Item Code:</span> <span>'.$rowsring['item_number'].'</span> </p>
				<p class="old-price"><span class="ourprice-label">Setting Price:</span> <span class="new-price" id="product-price-'.$rowsring['id'].'">$'._nf($main_amount).'</span></p>
			</div>
			<form id="'.$id.'" action="" method="">
				<label for="qty">QUANTITY:</label>
				<input type="text" name="qty" id="qty" maxlength="12" value="1" title="Qty" class="input-text qty required-entry">
				<div class="product-options-bottom">
					<div class="add-to-cart-1">
						<input type="hidden" name="txt_rstyle" id="txt_rstyle" value="'.$rowsring['sub_category'].'">
						<input type="hidden" name="3ez_price" value="0">
						<input type="hidden" name="5ez_price" value="0">
						<input type="hidden" name="main_price" id="main_price" value="'.$rowsring['retail_price'].'">
						<input type="hidden" name="price" value="'.$rowsring['price'].'">
						<input type="hidden" name="vender" value="unique" />
						<input type="hidden" name="url" value="'.$data['ringimg'].'">
						<input type="hidden" name="prodname" value="'.$rowsring['name'].'">
						<input type="hidden" name="diamnd_count" value="'.$rowsring['diamond_weight'].'">
						<input type="hidden" name="ring_shape" value="">
						<input type="hidden" name="ring_carat" value="'.$rowsring['metal'].'">
						<input type="hidden" name="prid" id="prid" value="'.$rowsring['id'].'">
						<input type="hidden" name="txt_ringtype" value="generic_ring">
						<input type="hidden" name="txt_ringsize" value="">
						<input type="hidden" name="txt_metal" value="">
						<input type="hidden" name="metals_weight" value="'.$rowsring['metal'].'">
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
					<br clear="all">
					<span id="item-info"><b>Item Information</b></span>
					<table id="item-tbl" class="data-table2" width="100%" cellspacing="0" cellpadding="0">
						<tbody>
							<tr class="first-row">
								<th style="width:40%;color:#ff0000;font-weight:bold;">Item Code</th>
								<td style="color:#ff0000;font-weight:bold;">'.$rowsring['item_number'].'</td>
							</tr>
							<tr class="second-row">
								<th style="width:40%;">Metal</th>
								<td>'.$rowsring['metal'].'</td>
							</tr>
							<tr class="first-row">
								<th style="width:40%;">Style Name:</th>
								<td>'.$rowsring['item_number'].'</td>
							</tr>
							<tr class="first-row">
								<th style="width:40%;">Style Group Name:</th>
								<td>'.$rowsring['item_number'].'</td>
							</tr>
						</tbody>
					</table>
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
    }

	/* popular listings for Unique Ring */
	function popularListingsUnique($ring_cateid=0, $prod_id=0, $carat=0, $matalType='', $limit=5, $listing='') {
		/* $rowsring = $this->Catemodel->getRingsByUnique($ring_cateid, 0, $limit, $prod_id, $carat, $matalType); */
		$rowsring = $this->Catemodel->getRingsByUnique($ring_cateid, 0, $limit, $prod_id);
		$similar_rings = '';
		if( count((array)$rowsring['results']) > 0 ) {
			foreach( $rowsring['results'] as $rowring ) {
				$cur_stones1 = explode(',',$rowring['supplied_stones']);
				$req_tot = 0;
				if(!empty($cur_stones1)){
					foreach($cur_stones1 as $cur_stone1){
						$req_data = explode('-',$cur_stone1);
						$req_tot = $req_tot + (int)$req_data[0];
					}
					$req_tot = $req_tot +1;
				}
				$weightigrm = str_replace(" grams","",$rowring['metal_weight']);
				$metalprc = 70*$weightigrm;
				if($rowring['catid'] == 86 || $rowring['catid'] == 204){
					$stonprc = 85*$req_tot;
				}else{
					$stonprc = 14*$req_tot;
				}
				$semiMountprce = $metalprc+$stonprc;
				$finalsemiMountprce = $semiMountprce*1.5;
				$main_amount = $finalsemiMountprce;

				$detaiLink = SITE_URL . 'selection/engagement-ring-detail/' . $rowring['ring_id'];
				$ringImageLink = SITE_URL . 'scrapper/imgs/' . $rowring['ImagePath'];
				$ring_title = $this->getRingTitle($rowring, 'similar');
				$retail_price  = $rowring['priceRetail'] * PRICE_PERCENT;
				$ring_ourprice = $rowring['priceRetail'];

				$popupBlock = $this->product_popup_detail_unique( $rowring['ring_id'] );
				$popupLink = SITE_URL . 'selection/product_popup_detail/'.$rowring['ring_id'] . '/?keepThis=true&TB_iframe=true&width=900&height=600&modal=false';
				$cate = $this->getCateName( $rowring['catid'] );
				$results['item_thumbs'] = $this->Catemodel->getRingThumbs( $rowring['name'] );
				$product_circle = $this->getProductThumb( $results, 'listing', $rowring['name'], $ring_title);

				$similar_rings .= '<div class="ring_cols col-sm-3" onmouseover="show_collection_block(\'hover_'.$rowring['ring_id'].'\')" onmouseout="hide_block(\'hover_'.$rowring['ring_id'].'\')">
					<div>
						<a href="'.$detaiLink.'">
							<div class="set_thumb_img" id="'.$rowring['ring_id'].'">
								'.$product_circle['thumb_image'].'
							</div>
						</a>
					</div>
					<div class="clear"></div>
					<div>'.$ring_title.'</div>
					<div style="display:none;"><img src="'.SITE_URL.'img/heart_diamond/matching_ring_star.jpg" alt="" /></div><br>
					<div class="ring_price_label">$'. _nf($main_amount).'</div>
					<div>Setting Price</div>
					' . $this->get_ring_hover_view($rowring, $cate['sub_cname'], $rowring['ring_id'], $ringImageLink, $ring_title, $results, $popupLink) . '
				</div>'. $popupBlock;
			}
		}
		return $similar_rings;
	}
	
	/* product popup detail for Unique Ring */
	function product_popup_detail_unique($id=0) {
		$rowsring = $this->Catemodel->getRingsDetailViaId($id, '', '');
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
		$results['item_thumbs'] = $this->Catemodel->getRingThumbs( $rowsring['name'] );
		$product_circle = $this->getProductThumb( $results, 'listing', $rowsring['name'], $data['ring_title'], '400', '', 'details');
		$data['product_thums'] = $product_circle['thumb_image'];
		$cate = $this->getCateName( $rowsring['catid'] );
		$cur_stones1 = explode(',',$rowsring['supplied_stones']);
		$req_tot = 0;
		if(!empty($cur_stones1)){
			foreach($cur_stones1 as $cur_stone1){
				$req_data = explode('-',$cur_stone1);
				$req_tot = $req_tot + (int)$req_data[0];
			}
			$req_tot = $req_tot +1;
		}
		$weightigrm = str_replace(" grams","",$rowsring['metal_weight']);
		$metalprc = 70*$weightigrm;
		$stonprc = 14*$req_tot;
		$semiMountprce = $metalprc+$stonprc;
		$finalsemiMountprce = $semiMountprce*1.5;
		$main_amount = $finalsemiMountprce;

		$ring_detail_bk = '<div id="pop_'.$id.'" class="simplePopup collection_view">';
			$ring_detail_bk .= '<div class="col-sm-5 imgleft_block">
				<div class="product-image product-image-zoom zoomright" id="ringsthumb_view yy">
					<div class="set_thumb_img" id="popup_'.$rowsring['ring_id'].'">                                
						<div class="" id="show_thumb_view"></div>
						'.$data['product_thums'].'
					</div>
					<div class="left_arrow_view"><a href="#javascript" onclick="button_previous(\'popup_'.$rowsring['ring_id'].'\')"><img src="'.SITE_URL.'img/heart_diamond/left_arrow_view_ic.jpg" alt="" /></a></div>
					<div class="right_arrow_view"><a href="#javascript" onclick="button_next(\'popup_'.$rowsring['ring_id'].'\')"><img src="'.SITE_URL.'img/heart_diamond/right_arrow_view_ic.jpg" alt="" /></a></div>
				</div>';
				$ring_detail_bk .= '<div class="clear">
			</div><br>
			<div>
				'.$data['listings_detail']['diamond_information'].'
			</div>
		</div>';
		$ring_detail_bk .= '<div class="col-sm-6 pull-right"><br></br>
			<div class="price-box">
				<div class="product-name"><h1>'.$data['ring_title'].'</h1></div>
				<p class="old-price fb-old-price f-fix"><span class="price-label">Item Code:</span> <span>'.$rowsring['name'].'</span> </p>
				<p class="old-price"><span class="ourprice-label">Setting Price:</span> <span class="new-price" id="product-price-'.$rowsring['ring_id'].'">$'._nf($main_amount).'</span></p>
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
    }

	function popularRingListings($ring_cateid=0, $prod_id=0, $limit=5, $listing='') {
		$rowsring = $this->Catemodel->getRingbyCateory($ring_cateid, 0, $limit, $prod_id);
		$similar_rings = '';
		if( count((array)$rowsring['results']) > 0 ) {
			foreach( $rowsring['results'] as $rowring ) {
				$detaiLink = SITE_URL . 'selection/engagement-rings-detail/'. $rowring['id'];
				if(!empty($rowring['image'])){
					$images = explode(";",$rowring['image']);
					$ringImageLink = SITE_URL .'images/'. $rowring['image_path'].$images[0];
				}else{
					$ringImageLink = '';
				}
				$ring_title = $this->getRingsTitle($rowring, 'similar');
				$retail_price  = $rowring['retail_price'] * PRICE_PERCENT;
				$ring_ourprice = $rowring['retail_price'];

				$popupBlock = $this->product_popup_detail( $rowring['id'] );
				$popupLink = SITE_URL . 'selection/product_popup_detail/'.$rowring['id'] . '/?keepThis=true&TB_iframe=true&width=900&height=600&modal=false';

				$similar_rings .= '<div class="ring_cols col-sm-3" onmouseover="show_collection_block(\'hover_'.$rowring['id'].'\')" onmouseout="hide_block(\'hover_'.$rowring['id'].'\')">
				<div><a href="'.$detaiLink.'">
				<div class="set_thumb_img" id="'.$rowring['id'].'">
				<img src="'.$ringImageLink.'" alt="'.$ring_title.'" style="height:235px;" />
				</div>    
				</a></div>
				<div class="clear"></div>
				<div>'.$ring_title.'</div>
				<div class="ring_price_label">$'. $rowring['price'].'</div>
				<div>Setting Price</div>
				</div>';
			}
		}
        return $similar_rings;
    }

	/* get rings listings view according to the category id */
    function ring_lisitngs_view( $results = array()) {
        $ringlistings = '';
        if( count((array)$results) > 0 ) {
            foreach( $results as $rowrings ) {
                $ringDetail = SITE_URL . 'selection/engagement-ring-detail/' . $rowrings['ring_id'];
                $ringsImg = SITE_URL . 'scrapper/imgs/' . $rowrings['ImagePath'];
                $priceMargin = $this->Commonmodel->inventoryPriceMargin($rowrings['catid'], UNIQUE_OPTION);
                $rowrings['priceRetail'] = $rowrings['priceRetail'] * $priceMargin;
                $retailPrice = _nf($rowrings['priceRetail'] * PRICE_PERCENT, 2);
                $ourPrice = _nf($rowrings['priceRetail']);
                $rid = $rowrings['ring_id'];

				$ringTitle = $this->getRingTitle($rowrings);
				$popupLink = SITE_URL . 'selection/product_popup_detail/' . $rid . '/?keepThis=true&TB_iframe=true&width=900&height=600&modal=false';
				$ringlistings .= '<li class="item" data-url="'.$ringDetail.'">
				<div class="product-grid-quick" onmouseover="showQuickView('.$rid.');" onmouseout="hideQuickView('.$rid.');" style="overflow:hidden;">
				<div id="quickview'.$rid.'" style="display: none;"> 
				<a href="Javascript:;" onclick="show_quick_view(\''.$popupLink.'\',\'\',\'nofollow\');" title="'.$ringTitle.'" class="quick-view thickbox" rel="nofollow"><span>Quick View</span></a>
				</div><div class="product-image"><a class="product-labels" href="'.$ringDetail.'" title="'.$ringTitle.'"><img class="" src="'.$ringsImg.'" itemprop="image" alt="'.$ringTitle.'" style="display: inline;"></a></div><h3><a href="'.$ringDetail.'" title="'.$ringTitle.'"> <span>' .  $ringTitle . '</span></a></h3><div class="price-box">
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
				$'.$ourPrice.'</span>
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

	/* get rings listings view according to the category id */
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

        if( count((array)$results) == 0 ) {
            $ringlistings .= '<div>NO Ring List Found!</div>';
            return $ringlistings;
        }

        $total_records = count((array) $results );
        $i = 1;
        foreach( $results as $rowrings ) {
            if( $i <= 4 ) {
                $ringlistings .= $this->rings_block( $rowrings );
                $popup_block .= $this->product_popup_detail($rowrings['ring_id']);
            }
            $i++;
        }

        if( $total_records >= 5 ) {
            $j = 1;
            foreach( $results as $rowrings ) {
                if( $j > 4 && $j <= 8 ) {
                    $ringlistings .= $this->rings_block( $rowrings );
                    $popup_block .= $this->product_popup_detail($rowrings['ring_id']);
                }
               $j++;
            }
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
            $m = 1;
            foreach( $results as $rowrings ) {
                if( $m >= 17 && $m <= 20 ) {
                    $ringlistings .= $this->rings_block( $rowrings ); 
                    $popup_block .= $this->product_popup_detail($rowrings['ring_id']);
                }
               $m++;
            }
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
    
	/* Rings block */
    function rings_block($rowrings=array()) {
		$ringDetail = SITE_URL . 'selection/engagement-ring-detail/' . $rowrings['ring_id'];
		$ringsImg = SITE_URL . 'scrapper/imgs/' . $rowrings['ImagePath'];
		$priceMargin = $this->Commonmodel->inventoryPriceMargin($rowrings['catid'], UNIQUE_OPTION);
		$rowrings['priceRetail'] = $rowrings['priceRetail'] * $priceMargin;
		$retailPrice = $rowrings['priceRetail'] * PRICE_PERCENT;
		$ourPrice = _nf($rowrings['priceRetail']);
		$rid = $rowrings['ring_id'];
		$saving_percent = calc_save_percent( $rowrings['priceRetail'] );
		$cate = $this->getCateName( $rowrings['catid'] );
		$ringTitle = $rowrings['matalType'].' '.$cate['main_cname'] . ' ' . $rowrings['stone_weight'] . ' ' . $cate['sub_cname'] . '';
		$popupLink = SITE_URL . 'selection/product_popup_detail/' . $rid . '/?keepThis=true&TB_iframe=true&width=850&height=600&modal=false';
		$results['item_thumbs'] = $this->Catemodel->getRingThumbs( $rowrings['name'] );
		$product_circle = $this->getProductThumb( $results, 'listing', $rowrings['name'], $ringTitle);
        if($rowrings['additional_stones'] == ''){
			$where_dev_index = array('carat' => '0.25', 'price !=' => '', 'color !=' => '');
			$get_dev_index_info = $this->Catemodel->getdata_any_table_limit_order_where('dev_index', $where_dev_index, '1', '0', 'price');
        }else{
			$additional_stones_ex = explode('/', $rowrings['additional_stones']);
			$additional_stones_first_item   = explode('-', $additional_stones_ex['0']);
			$additional_stones_first_item2   = $additional_stones_first_item['1']; 

			$check_count = 0;
			for($i=1; $i<5; $i++){
				$where_dev_index             = array('price !=' => '', 'color !=' => '');
				$get_dev_index_info          = $this->Catemodel->getdata_any_table_limit_order_by_where_like_after('dev_index', $where_dev_index, $i, $check_count, $additional_stones_first_item2, 'Meas');

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
                $get_dev_index_info          = $this->Catemodel->getdata_any_table_limit_order_where('dev_index', $where_dev_index, '1', '0', 'price');
            }
        }
        $get_diamond_price      = $get_dev_index_info['0']->price;
        $get_dev_index_price    = $get_diamond_price * 1.10; 

        $total_carat = $rowrings['stone_weight'] + $get_dev_index_info['0']->carat;
        $ringTitle = $rowrings['matalType'].' '.$cate['main_cname'] . ' ' . $total_carat . ' ' . $cate['sub_cname'] . '';

		$ourPriceNew = _nf($rowrings['priceRetail'] + $get_dev_index_price);
		$retailPrice = $retailPrice + $get_dev_index_price;

		if($rowrings['catid'] == 70 OR $rowrings['catid'] == 58 OR $rowrings['catid'] == 80 OR $rowrings['catid'] == 83 OR $rowrings['catid'] == 79 OR $rowrings['catid'] == 206 OR $rowrings['catid'] == 205 OR $rowrings['catid'] == 82 OR $rowrings['catid'] == 81 OR $rowrings['catid'] == 201 OR $rowrings['catid'] == 192 OR $rowrings['catid'] == 91 OR $rowrings['catid'] == 119 OR $rowrings['catid'] == 118 OR $rowrings['catid'] == 117 OR $rowrings['catid'] == 116 OR $rowrings['catid'] == 111 OR $rowrings['catid'] == 110 OR $rowrings['catid'] == 191 OR $rowrings['catid'] == 190 OR $rowrings['catid'] == 189 OR $rowrings['catid'] == 114 OR $rowrings['catid'] == 68 OR $rowrings['catid'] == 85 OR $rowrings['catid'] == 84 OR $rowrings['catid'] == 188 OR $rowrings['catid'] == 187  OR $rowrings['catid'] == 186){
			$main_price = $rowrings['priceRetail'];
		}else{
			$main_price = $rowrings['priceRetail'] + $get_dev_index_price;
		}

		if($rowrings['ring_id'] == 22877){
			$main_price = 102;
		}
                
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
		<div class="priceLable">$ ' . _nf($main_price) . '</div>
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
		$'.$main_price.'                </span>
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

	/* Ring hover block */
	function get_ring_hover_view($rowrings=array(), $style_name='', $rid=0, $ringsImg='', $ringTitle='', $results='', $popupLink='') {
		if(isset($results['item_thumbs'])){
			$cuntr = count((array)$results['item_thumbs']);
		}else{
			$cuntr = 0;
		}
		$priceRetail = isset($rowrings['priceRetail'])?$rowrings['priceRetail']:'';
		$supplied_stones = isset($rowrings['supplied_stones'])?$rowrings['supplied_stones']:'';
		$metal = isset($rowrings['metal'])?$rowrings['metal']:'';
		$weight = isset($rowrings['weight'])?$rowrings['weight']:'';

		$ring_hover = '<div class="collection_hover_bk" id="hover_'.$rid.'">
			<div class="view_count">1/'.$cuntr.'</div>
			<div class="quick_view"><a href="Javascript:;" onclick="view_simple_popup(\''.$rid.'\');" title="Quick View'.$rid.'" rel="nofollow">Quick <br> View</a></div>
			<div class="left_arrow_view"><a href="#javascript" onclick="button_previous(\''.$rid.'\'); show_number_count(\'hover_'.$rid.'\', \''.$cuntr.'\', \'back\')"><img src="'.SITE_URL.'img/heart_diamond/left_arrow_icon.jpg" alt="" /></a></div>
			<div class="right_arrow_view"><a href="#javascript" onclick="button_next(\''.$rid.'\'); show_number_count(\'hover_'.$rid.'\', \''.$cuntr.'\', \'\')"><img src="'.SITE_URL.'img/heart_diamond/right_arrow_icon.jpg" alt="" /></a></div>
			<form name="form1" id="form_'.$rid.'" method="post">
				<input type="hidden" name="txt_rstyle" id="txt_rstyle" value="'.$style_name.'" />
				<input type="hidden" name="3ez_price" value="" />
				<input type="hidden" name="5ez_price" value="" />
				<input type="hidden" name="main_price" value="'. $priceRetail .'" />
				<input type="hidden" name="price" value="'. $priceRetail .'" />
				<input type="hidden" name="vender" value="unique" />
				<input type="hidden" name="url" value="'.$ringsImg.'" />
				<input type="hidden" name="prodname" value="'.$ringTitle.'" />
				<input type="hidden" name="diamnd_count" value="'. $supplied_stones .'" />
				<input type="hidden" name="ring_shape" value="" />
				<input type="hidden" name="ring_carat" value="" />
				<input type="hidden" name="prid" id="prid" value="'.trim($rid).'" />
				<input type="hidden" name="txt_ringtype" value="generic_ring" />
				<input type="hidden" name="txt_ringsize" value="" />
				<input type="hidden" name="txt_metal" value="'. $metal .'" />
				<input type="hidden" name="metals_weight" value="'. $weight .'" />
				<input type="hidden" name="vendors_name" value="Unique Jewelry" />
				<input type="hidden" name="center_stone_id" id="center_stone_id" />
				<input type="hidden" name="txt_qty" value="1" />
			</form>
		</div>';

        return $ring_hover;
    }

	function rings_block_old($rowrings=array()) {
		$ringDetail = SITE_URL . 'selection/engagement-ring-detail/' . $rowrings['ring_id'];
		$ringsImg = SITE_URL . 'scrapper/imgs/' . $rowrings['ImagePath'];
		$priceMargin = $this->Commonmodel->inventoryPriceMargin($rowrings['catid'], UNIQUE_OPTION);
		$rowrings['priceRetail'] = $rowrings['priceRetail'] * $priceMargin;
		$ourPrice = _nf($rowrings['priceRetail']);
		$results['item_thumbs'] = $this->Catemodel->getRingThumbs( $rowrings['name'] );
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
			$cateImgLink = $cate_img_link;
		} else {
			$cateImgLink = SITE_URL.'images/no_img_found.jpg';
		}
		return $cateImgLink;
	}

	/* get the category list view */
	function category_cols_list_view($cid=0) {
		$ringresults = $this->Catemodel->getSubCategory($cid);
		$catelist_view = '';
		$cateID = array();
		if( count($ringresults) > 0 ) {
			foreach( $ringresults as $rowcate ) {
				$cateImgLink = $this->unique_cate_image( $rowcate['image'] );
				$detaiLink = SITE_URL.'selection/engagementrings/'.$rowcate['id'];

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

	/* get ring title */
	function getRingTitle($rowring=array(), $similar=''){
		if(isset($rowring) && !empty($rowring)){
			$catId = isset($rowring['catid'])?$rowring['catid']:0;
			$matalType = isset($rowring['matalType'])?$rowring['matalType']:'';
			$stoneWeight = isset($rowring['stone_weight'])?$rowring['stone_weight']:'';
			$cate = $this->getCateName($catId);
			if($matalType == '14KP'){
				$matalTypes = '14 Karat Pink Gold';
			}elseif($matalType == '14KY'){
				$matalTypes = '14 Karat Yellow Gold';
			}elseif($matalType == '18KP'){
				$matalTypes = '18 Karat Pink Gold';
			}elseif($matalType == '18KW'){
				$matalTypes = '18 Karat White Gold';
			}elseif($matalType == '18KY'){
				$matalTypes = '18 Karat Yellow Gold';
			}elseif($matalType == 'PLAT'){
				$matalTypes = 'Platinum';
			}else{
				$matalTypes = '14 Karat White Gold';
			}
			if( empty($similar) ) {
				$rtitle = $stoneWeight.' '.$matalTypes.' '.$cate['main_cname'].' Cut Diamond Engagement Ring '.$cate['sub_cname'] .' Style';
			} else {
				$rtitle = $stoneWeight.' '.$matalTypes.' '.$cate['main_cname'].' Cut Diamond <br>Engagement Ring '.$cate['sub_cname'] .' Style';
			}
			return $rtitle;
		}else{
			return;
		}
	}

	function getRingsTitle($rowring=array(), $similar='') {
		$cate   = $this->getCateName( $rowring['catid'] ); 
		$rtitle = $rowring['description'];
		return $rtitle;
    }

	/* get category name */
	function getCateName( $cid=0 ) {
		$catevalue = array();
		$subparent = $this->Catemodel->getparentCateID( $cid );
		$parent_cid = $this->Catemodel->get_unique_main_cate_id( $cid );
		$catevalue['main_cname'] = $this->Catemodel->getRingCategoryName( $cid );
		$catevalue['sub_cname'] = $this->Catemodel->getRingCategoryName($subparent);        
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

        return $catevalue;
	}

	function output($layout = null , $data = array() ,$left='', $isleft = true , $isright = true){
		$data['loginlink'] = $this->User->loginhtml();
		$output = $this->load->view($this->config->item('template').'header' , $data , true);

		$output .= $layout;
		if($isright)$output .= $this->load->view($this->config->item('template').'right' , $data , true);
		$output .= $this->load->view($this->config->item('template').'footer', $data , true);
		$this->output->set_output($output);
		//$this->output->cache(120);
	}

	/* get supported shape */
	function getSuportedShape( $rowring ) {
		$ctstone_shape = $rowring['additional_stones']; 
		$find_ctsahpe = getCenterStoneShape($ctstone_shape);
		$suport_shape = ( !empty($ctstone_shape) ? strtoupper( implode(', ', $find_ctsahpe) ) : 'Support any shape' );

		return $suport_shape;
	}

	/* get product detail */
	function listingdetail($id=0, $popup='', $setcols='') {
		$rowsring = $this->Catemodel->getRingsDetailViaId($id, '', ''); //print_ar($rowsring);
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

	/* product popup detail */
	function product_popup_detail($id=0) {
		return;
		$data = $this->getCommonData();
		$rowsring = $this->Catemodel->getRingsDetailViaId($id, '', ''); //print_ar($rowsring);
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
		$results['item_thumbs'] = $this->Catemodel->getRingThumbs( $rowsring['name'] );
		$product_circle = $this->getProductThumb( $results, 'listing', $rowsring['name'], $data['ring_title'], '400', '', 'details');
		$data['product_thums'] = $product_circle['thumb_image'];
		$cate = $this->getCateName( $rowsring['catid'] );

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
		<p class="old-price"> <span class="retail-label">Retail Price:</span> <span class="price" id="old-price-'.$rowsring['ring_id'].'">$'._nf($retail_price).'</span> <span class="pnotify"> <a href="#" id="productupdates-button4" onmouseover="new Productupdates();"> <i></i>Get Price Update </a> </span> </p>
		<p class="old-price"> <span class="ourprice-label">Our Price:</span> <span class="new-price" id="product-price-'.$rowsring['ring_id'].'">$'._nf($salesprice).'</span> <span class="special-price-label" id="old_price">(Savings:<?php echo $saving_percent; ?>%)</span> <span id="google_discount"></span> <span id="twitter_discount"></span> <span id="facebook_discount"></span> <span id="pinterest_discount"></span> <span id="total_price"></span> 
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
    }

	/* View center stone diamond */
	function viewCenterStone($ring_id=0) {
		$data['stones_list'] = $this->getCenterStoneList( $ring_id );

		$this->load->view('engagementringstrial/view_center_stone_list', $data);
    }

	/* view center stone diamond */
	function ViewDiamondResult($ring_id=0) {
		$data['stones_list'] = $this->getCenterStoneList( $ring_id );
		$data['row_detail'] = $data['stones_list'][0];

		$this->load->view('engagementringstrial/view_diamond_result_list', $data);
    }

	/* view center stone diamond */
    function getDiamondResultDetail($ring_id=0, $type='ring') {
		$data['stones_list'] = $this->getCenterStoneList( $ring_id );
		if( $type === 'diamond' ) {
			$lotid = urldecode($ring_id);
			$lot_id = str_replace('_slash_', '/', $lotid);

			$data['row_detail'] = $this->Diamondmodel->getDetailsByLot($lot_id);
		} else {
			$data['row_detail'] = $data['stones_list'][0];
		}        

		$this->load->view('engagementringstrial/view_diamond_result_detail', $data);
    }

	/* Get the ring diamond detail */
    function getDiamondListDetail($lot_id=0) {
        $lot_id = urldecode($lot_id);
        $lot_id = str_replace('_slash_', '/', $lot_id);
        $data['row_detail'] = $this->Diamondmodel->getDetailsByLot($lot_id);

        $this->load->view('engagementringstrial/ring_diamond_detail', $data);
    }

	/* Show the carat graph */
    function showCaratGraph($lot_id=0) {
		$lot_id = urldecode($lot_id);
		$lot_id = str_replace('_slash_', '/', $lot_id);
		$data['row_detail'] = $this->Diamondmodel->getDetailsByLot($lot_id);

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
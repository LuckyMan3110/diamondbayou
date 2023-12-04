<?php
class Testmmengagementrings extends CI_Controller {
    function __construct(){
            parent::__construct();
            //$this->ci = & get_instance ();
            
            $this->load->model('jewelrymodel');
            $this->load->model('diamondmodel');
            $this->load->model('engagementmodel');
            $this->load->helper('ringsection');
            $this->load->library('session');
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
		
        $data['title'] = 'Engagement Rings';
        $data['category_id'] = $cates_id;
        //$cates_id = 40;
        
        $rings_cate   = $this->category_cols_list_view($cates_id);
        $data['ring_categoies']   = $rings_cate['cate_list_view'];
        $cateid_list = array_rand( $rings_cate['cateid'], count($rings_cate['cateid']) );
        $setcateid = $rings_cate['cateid'][$cateid_list[0]];
        
        $data['similar_products'] = $this->ringSimilarItems($setcateid, '', 6, 'listings');
        
        if( $data['ring_categoies'] != 'false' ) {
            $output = $this->load->view('engagementringstrial/engagement_trials' , $data , true);
            $this->output($output, $data);
        } else {
            header('Location:' . SITE_URL . 'testengagementrings/engagement_ring_listings/' . $cates_id);
        }
    }
    
    ///// category listings
    function engagement_ring_listings($category_id=0, $start=0) {
        $data = $this->getCommonData();
        $this->load->library('pagination');
		
        $data['title'] = 'Engagement Rings';
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
        
        $ringresults = $this->catemodel->getRingsByCateory($category_id, $startFrom, $config["per_page"], '', $metal_value, $sort_option);
        $config["total_rows"] = $ringresults['total'];
        $baseLink = SITE_URL.'testengagementrings/engagement_ring_listings/'.$category_id.'/?sort='.$sort_option;
	$config["base_url"]   = $baseLink.'&pagelist='.$config["per_page"].'&metal='.$metal_value;
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><a class="active" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $data['page_numb_hint'] = page_number_hint($config["per_page"], $ringresults['total'], $start_from); // custome helper
        
        $data['similar_products'] = $this->ringSimilarItems($category_id, '', 6, 'listings');
        
        $data['ring_listings'] = $this->ring_lisitngs_view($ringresults['results']);
        $cate_name = $this->catemodel->getRingCategoryName( $category_id );
        $data['catename_title'] = $cate_name.' Diamond Engagement Rings';
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
        
        $output = $this->load->view('engagementringstrial/engagement_trials_listings' , $data , true);
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
    ///// product detail page
    function engagement_ring_detail($product_id=0, $ring_size='', $ring_metal='', $avsizes='') {
        $data = $this->getCommonData(); 
        $this->session->set_userdata('product_id', $product_id);
		
        $data['title'] = 'Engagement Rings Detail';
        $data['onload_class'] = 'catalog-product-view product-14k-gold-diamond-three-stone-engagement-ring-set-128c-p-24728 categorypath-diamond-engagement-rings-wholesale-preset-gold-diamond-engagement-rings-aspx category-diamond-engagement-rings-wholesale-preset-gold-diamond-engagement-rings';
        
        //$this->load->view('engagementringstrial/engagement_rings_details', $data);
        //$metal = '';
        //$rngsize = '';
        
        $rowsring = $this->catemodel->getRingsDetailViaId($product_id, $ring_metal, $ring_size); 
        $data["getparent_cate"] = getMainCatParentCateID($rowsring['catid']);
        //print_ar($rowsring);
        
        $ctstone_shape = $rowsring['additional_stones']; 
	$find_ctsahpe = getCenterStoneShape($ctstone_shape);
        $data['suport_shape'] = ( !empty($ctstone_shape) ? strtoupper( implode(', ', $find_ctsahpe) ) : 'Support any shape' );
        $data['buildring'] = $this->session->userdata('buildring');
        $data['rowsring'] = $rowsring;
        $data['retail_price'] = $rowsring['priceRetail'] * PRICE_PERCENT;
        $data['saving_percent'] = ( 100 - ( ( $rowsring['priceRetail'] / $data['retail_price'] ) * 100 ) );
        $data['buynow_link']    = htmlspecialchars(config_item('base_url').'jewelleriesm/addtoshoppingcart/');
        
        $cate = $this->getCateName( $rowsring['catid'] );
        
        $data['ringtitle'] = $rowsring['matalType'].' '.$cate['main_cname'].' Cut Diamond Unique Engagement Ring '.$rowsring['stone_weight'];
        $data['ringimg']   = SITE_URL . 'scrapper/imgs/'.$rowsring['ImagePath'];
        $data['setingtype']   = $cate['sub_cname'];
        $data['maincate_name'] = $cate['main_cname'];
        $data['subcate_link'] = '<a href="'.SITE_URL.'testengagementrings/engagement_ring_listings/'.$rowsring['catid'].'" title="">'.$cate['main_cname'].' Diamond Engagement Rings</a>';
        $data['similar_items'] = $this->ringSimilarItems($rowsring['catid'], $product_id);
        $data['similar_products'] = $this->ringSimilarItems($rowsring['catid'], $product_id, 4);
        $data['popular_listings'] = $this->popularListings($rowsring['catid'], $product_id, 4);
        $data['more_engagement_listings'] = $this->popularListings($rowsring['catid'], $product_id, 4);
        ////// get user comments
	$data['view_coments'] = $this->getProductReviews( $product_id );
        
        $data['extra_headers'] = '';
        $data['extra_headers'] .= '<script language="javascript" src="'.SITE_URL.'js/jquery.popup.js" type="text/javascript"></script>';
        
        ///// get ring thumb
        ////// item thumbs
        $data['rings_thumb'] = $this->getProductThumb( $rowsring );
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
			$metaLink = SITE_URL.'testengagementrings/engagement_ring_detail/'.trim($rows_avsize['ring_id']).'/'.$defaultRingSz.'/'.$defaultMetal.'/'.$product_id;			
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
        
        $getRingsSize = '';
        if( count($rowsring['ringsSizes']) > 0 ) {
		foreach($rowsring['ringsSizes'] as $rng_size) {
			$rgsz = setRingSize($rng_size['ringSize']);
			$rings_rdlink = SITE_URL.'testengagementrings/engagement_ring_detail/'.$product_id.'/'.$rgsz.'/'.$defaultMetal;
			$getRingsSize .= '<option value="'.$rings_rdlink.'" '.selectedOption($rgsz, $ring_size).'>'.$rng_size['ringSize'].'</option>';
		}
	} else {
         $getRingsSize .= '<option value="">Ring Sizes</option>';
        }
        $getRingsMetal = '';
	if( count($rowsring['ringsMetal']) > 0 ) {
		foreach($rowsring['ringsMetal'] as $rings_metal) {
			$metal_rdlink = SITE_URL.'testengagementrings/engagement_ring_detail/'.$product_id.'/'.$defaultRingSz.'/'.trim($rings_metal['matalType']).'/';
			$getRingsMetal .= '<option value="'.$metal_rdlink.'" '.selectedOption($rings_metal['matalType'], $ring_metal).'>'.$rings_metal['matalType'].'</option>';
		}
	} else {
         $getRingsMetal .= '<option value="">Metal Type</option>';
        }
        
        $data['ringsmetail'] = $getRingsMetal;
	$data['ring_weight'] = $ringWeight;
	$data['defaultMetal'] = $defaultMetal;
	$data['available_insizes'] = $available_insizes;
        
        $data['ringsize_option'] = $getRingsSize;
        $data['stones_list'] = $this->getCenterStoneList();
        $output = $this->load->view('engagementringstrial/mmengagement_rings_details' , $data , true);
        $this->output($output, $data);
    }


  function get_financing_notification(){
   
  
  
  }

    function getfinancecall(){
	
	$return_data = array();
	$pr_id = $this->input->post('pr_id');
	$product[] = $pr_id ;
	$this->session->set_userdata('finance_product_arr', $product);
	$return_data['success'] = 1 ;
	echo json_encode($return_data);

    }


    function getfinancecall1(){
	
	$return_data = array();
	$finance_data = $this->input->post('finance_data');
	$cart_new = array();
	$pr_price = 0 ;
    
	if($finance_data != ""){
        	//$fields = explode(',', $finance_data);
        	foreach ($finance_data as $data) {
			#PRICE#
			//echo $value ;
				//$filter_value = explode('#PRICE#', $value) ;
				//$product_name  = $fields_arr[ $filter_value[0] ];
				//$values = explode(',',$filter_value[1]);
				$product_sku  = $data['sku'];
				$product_price = $data['uprice'];
				$product_name = $data['name'];
				$pr_price += $product_price ;
				$cart_new[] = array("sku"=>$product_sku,"display_name"=>$product_name,"quantity"=>1,"unit_price"=>$product_price );

		}
	}
    // print_r($cart_new);
    // exit();
	//$pr_name = "some diamond ring abi1";//$this->input->post('pr_name');
	//$pr_price = 5001; //$this->input->post('pr_price');

	$fname = 'Criscel';
	$lname = 'Abayon';
	$email = "mukesh.swami".time()."29@gmail.com";//"Jewelercart1@gmail.com";
	$billing_adres1 = 'WY HERITAGE 2437';
	$billing_country = "USA";//$info->billing_country;
	$billing_city = 'Union City';
	$billing_province = 'CA';
	$billing_postcode = '94587';

    //cannot find a lender now
    // $fname = 'Anita';
    // $lname = 'Abdo';
    // $email = "mukesh.swami".time()."29@gmail.com";//"tp.jigar@gmail.com";
    // $billing_adres1 = '4269 Deeboyer Av';
    // $billing_country = "USA";//$info->billing_country;
    // $billing_city = 'Lakewood';
    // $billing_province = 'CA';
    // $billing_postcode = '90712';


	$curlurl = "https://api.getfinancing.com/merchant/3828/requests";
	$headers = array(
		    'Content-Type: application/json',		    
		    'Accept: application/json',
		    'Authorization: Basic Y2R4X2Rhdmlkc3Rlcm5maW5lamV3ZWxyeWluYzplbXVaZWlyOQ=='
		);
	$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $curlurl);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			
	$cart = array();
    //$cart[] = array("sku"=>$product_sku,"display_name"=>$product_name,"quantity"=>1,"unit_price"=>$product_price );
	//$cart[] = array("sku"=>"ref12324","display_name"=>$pr_name,"quantity"=>1,"unit_price"=>$pr_price);
	$address = array("street1"=>$billing_adres1,"city"=>$billing_city,"state"=>$billing_province,"zipcode"=>$billing_postcode ) ;
	$data = array(
			"first_name"=>$fname,
			"last_name"=>$lname,
			"amount"=>$pr_price,
			"shipping_address"=>$address,
			"billing_address"=>$address,
			"email" => $email, 
			//"shipping_amount"=>100,
			"version"=>"1.9",
			"cart_items"=>$cart_new,
			"merchant_transaction_id"=>"order_".time(),
	        //"success_url" => "https://www.google.co.in",
            //"failure_url" => "https://www.facebook.com"
            //"postback_url" => ""
		    );                  
	$data_string = json_encode($data);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
			//echo "<pre>";
	$result = curl_exec($ch);
    	if ($result === FALSE) {
        	$return_data['info'] = "" ;
        	//die('Curl failed: ' . curl_error($ch));
    	}else{
    		$decode = json_decode($result,true);
    		// print_r($decode);
		$return_data['info'] = $decode['href']  ;
	    	 	//echo "----".$decode['href'] ;
	}
	curl_close($ch);
	//$return_data['info'] = $data ;
	$return_data['success'] = 1 ;
    
    echo json_encode($return_data);

    }

    function getuserdata(){
	$return_data = array();
	$pr_id = $this->input->post('pr_id');
	$pr_name = $this->input->post('pr_name');
	$pr_price = 3000; //$this->input->post('pr_price');
	if($this->session->isLoggedin()){
		$info 	 = $_SESSION['user'] ; //$this->session->all_userdata() ;
		//print_r($info);
        	if(!isset($info) || !count($info)>0){
			$return_data['success'] = 2 ;
		}else if($info->billing_adres1 =="" || $info->billing_country =="" || $info->billing_city == "" || $info->billing_province=="" || $info->billing_postcode == "" || $info->email==""  ){
			$return_data['success'] = 3 ;
		}else{
			$fname = 'Criscel';//$info->fname;
			$lname = 'Abayon';//$info->lname;
			$email = $info->email;
			$billing_adres1 = 'WY HERITAGE 2437';//$info->billing_adres1;
			$billing_country = $info->billing_country;
			$billing_city = 'Union City';//$info->billing_city;
			$billing_province = 'CA';//$info->billing_province;
			$billing_postcode = '94587';//$info->billing_postcode;
			$billing_phone = $info->billing_phone;
			//$email = $info->email;

			$curlurl = "https://api.getfinancing.com/merchant/3828/requests";
			$headers = array(
			    'Content-Type: application/json',		    
			    'Accept: application/json',
			    'Authorization: Basic Y2R4X2Rhdmlkc3Rlcm5maW5lamV3ZWxyeWluYzplbXVaZWlyOQ=='
			);
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $curlurl);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			
			$cart = array();
			$cart[] = array("sku"=>$pr_id,"display_name"=>$pr_name,"quantity"=>1,"unit_price"=>$pr_price);
			$address = array("street1"=>$billing_adres1,"city"=>$billing_city,"state"=>$billing_province,"zipcode"=>$billing_postcode ) ;
			$data = array(
				"first_name"=>$fname,
				"last_name"=>$lname,
				"amount"=>$pr_price,
				"shipping_address"=>$address,
				"billing_address"=>$address,
				"email" => $email, 
				//"shipping_amount"=>,
				"version"=>"1.9",
				"cart_items"=>$cart,
				"merchant_transaction_id"=>"order_1234"
			
			    );                  
			$data_string = json_encode($data);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);

			//echo "<pre>";
			$result = curl_exec($ch);
		    	if ($result === FALSE) {
		        	$return_data['info'] = "" ;
		        	//die('Curl failed: ' . curl_error($ch));
		    	}else{
		    		$decode = json_decode($result,true);
		    		// print_r($decode);
				$return_data['info'] = $decode['href']  ;
		    	 	//echo "----".$decode['href'] ;
			}
			curl_close($ch);
			//$return_data['info'] = $data ;
			$return_data['success'] = 1 ;
            	}           
          	

        	//$data['info'] = $curldata['href'] ;
		
	} else
	{
		$return_data['success'] = 2 ;
	}
	echo json_encode($return_data);
    
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
								  <div><img src="'.SITE_URL.'img/page_img/stars_icon.png" alt="stars_icon"/></div>
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
	
	if( count($rowaray['item_thumbs']) > 0 ) {
		foreach( $rowaray['item_thumbs'] as $rng_thumb ) {
			$ringsThumb = SITE_URL.'scrapper/imgs/'.$rng_thumb['ImagePathThumb'];
			$ringsView = SITE_URL.'scrapper/imgs/'.$rng_thumb['ImagePath'];
			
			if( !in_array($rng_thumb['ImagePathThumb'], $check_thumb) ) {
                            if( empty($popup) ) {
				$getRingsThumb .= '<div class="smalimgview"><a href="#javascript;" onclick="ringThumbView(\''.$ringsView.'\')">
			<img src="'.$ringsThumb.'" alt=""></a></div>';
                            } else {
                                $getRingsThumb .= '<li><a href="javascript://" onclick="imageshow(\''.$ringsView.'\');" title="'.$ring_title.'"><img src="'.$ringsThumb.'" width="31" alt="'.$ring_title.'"></a> </li>';
                            }
			}
					
			$check_thumb[] = $rng_thumb['ImagePathThumb'];
		}
	} else {
         $getRingsThumb .= '';
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
        $rowsring = $this->catemodel->getRingsByCateory($ring_cateid, 0, $limit, $prod_id);
        $similar_rings = '';
        
        if( count($rowsring['results']) > 0 ) {
            foreach( $rowsring['results'] as $rowring ) {
               $detaiLink = SITE_URL . 'testengagementrings/engagement_ring_detail/' . $rowring['ring_id'];
               $ringImageLink = SITE_URL . 'scrapper/imgs/' . $rowring['ImagePath'];
               $ring_title = $this->getRingTitle($rowring);
               $retail_price  = $rowring['priceRetail'] * PRICE_PERCENT;  //// PRICE_PERCENT : 3.5
               $ring_ourprice = $rowring['priceRetail'];
               $saving_percent = ( 100 - ( ( $ring_ourprice / $retail_price ) * 100 ) );
               $popupLink = SITE_URL . 'testengagementrings/product_popup_detail/'.$rowring['ring_id'] . '/?keepThis=true&TB_iframe=true&width=800&height=550&modal=false';
               
            if( empty($listing) ) {
               $similar_rings .= '<div class="prdSection" id="'.$rowring['ring_id'].'">
                                    <a href="'.$detaiLink.'" class="alsoviwed-product-img">
                                            <img class="" src="'.$ringImageLink.'" width="200" alt="'.$ring_title.'" title="'.$ring_title.'" style="display: inline;">
                                    </a>
                                    <a class="prdName" title="'.$ring_title.'" href="'.$detaiLink.'">'.$ring_title.'</a>
                                    <div class="price-box">
                                            <p class="old-price"><span>Retail Price:</span>
                                            <span style="text-decoration: line-through;"> $'._nf($retail_price, 2).'</span></p>
                                            <p class="our-price"><span>Our Price:</span><span> $'._nf($ring_ourprice, 2).'</span><br>
                                <span><img src="'.SITE_URL.'demo_retail/images/logo-getfinancing.png" width="150"  alt="stars_icon"/></span></p>
                                            <!-- <a class="viewItem" href="">View Item</a> -->
                                    </div>
				</div>'; 
                } else {
                   $similar_rings .= '<li class="item first">
			<div class="product-grid-quick" onmouseover="showTopQuickView('.$rowring['ring_id'].');" onmouseout="hideTopQuickView('.$rowring['ring_id'].');" style="overflow:hidden;">
				<div id="top-quickview'.$rowring['ring_id'].'" style="display: none; position: relative;">
					<a href="Javascript:;" onclick="show_quick_view(\''.$popupLink.'\', \'Quick View\', \'nofollow\');" title="Quick View'.$ring_title.'" class="quick-view thickbox" rel="nofollow"><span>Quick View</span></a>
				</div>
				<a title="'.$ring_title.'" href="'.$detaiLink.'"><img alt="'.$ring_title.'" class="" src="'.$ringImageLink.'" width="200" style="display: inline;" alt="stars_icon"></a>
				<h2 class="product-name"><a title="'.$ring_title.'" href="'.$detaiLink.'">'.$ring_title.'</a></h2>
				<div class="price-box">
                                    <p class="old-price"><span class="price-label">Retail Price:</span> 
                                    <span id="old-price-802865" class="price">$'._nf($retail_price, 2).'</span></p>
				<p class="our-price"><span class="price-label">Our Price:</span> 
                                <span id="product-price-'.$rowring['ring_id'].'">$'._nf($ring_ourprice, 2).'</span><br>
                                <span><img src="'.SITE_URL.'demo_retail/images/logo-getfinancing.png" width="150"  alt="stars_icon"/></span>
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
			<!-- Mouse Hover DIV ENDS here -->
		</li>';     
                }
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
               $detaiLink = SITE_URL . 'testengagementrings/engagement_ring_detail/' . $rowring['ring_id'];
               $ringImageLink = SITE_URL . 'scrapper/imgs/' . $rowring['ImagePath'];
               $ring_title = $this->getRingTitle($rowring, 'similar');
               $retail_price  = $rowring['priceRetail'] * PRICE_PERCENT;  //// PRICE_PERCENT : 3.5
               $ring_ourprice = $rowring['priceRetail'];
               $saving_percent = ( 100 - ( ( $ring_ourprice / $retail_price ) * 100 ) );
               $popupLink = SITE_URL . 'testengagementrings/product_popup_detail/'.$rowring['ring_id'] . '/?keepThis=true&TB_iframe=true&width=800&height=550&modal=false';
               $detailDesc = 'Metal '. $rowring['matalType'] . ' ' . $rowring['metal_weight']. ' Stone '. $rowring['stone_weight'];
               
            $similar_rings .= '<div class="product_colsbk">
                <div class="productRingImg"><a href="'.$detaiLink.'"><img src="'.$ringImageLink.'" width="200" height="153" alt="'.$ring_title.'"></a></div>
                        <div><img src="'.IMGSRC_LINK.'rating_icon.jpg"  alt="stars_icon"><span class="reviewlabel">(86 Review)</span></div><br>
                        <div>$ '. _nf($ring_ourprice, 2).'</div>
                        <div class="setcolor_label">+ Engagement Ring</div><br>
                        <div class="centerLabel"><a href="'.$detaiLink.'">'.$ring_title.'</a></div>
                        <div class="setcolor_label">'.$detailDesc.'</div>
                    </div>';
            
            }
        }
        
        return $similar_rings;
    }
    ///// get rings listings view according to the category id
    function ring_lisitngs_view( $results = array()) {
        $ringlistings = '';
        
        if( count($results) > 0 ) {
            foreach( $results as $rowrings ) {
                $ringDetail = SITE_URL . 'testengagementrings/engagement_ring_detail/' . $rowrings['ring_id'];
                $ringsImg = SITE_URL . 'scrapper/imgs/' . $rowrings['ImagePath'];
                $retailPrice = _nf($rowrings['priceRetail'] * PRICE_PERCENT, 2);
                $ourPrice = _nf($rowrings['priceRetail'], 2);
                $rid = $rowrings['ring_id'];
                $cate = $this->getCateName( $rowrings['catid'] );  
        
                $ringTitle = $this->getRingTitle($rowrings);
                $popupLink = SITE_URL . 'testengagementrings/product_popup_detail/' . $rid . '/?keepThis=true&TB_iframe=true&width=800&height=550&modal=false';
                
                $ringlistings .= '<li class="item" data-url="'.$ringDetail.'">
      <div class="product-grid-quick" onmouseover="showQuickView('.$rid.');" onmouseout="hideQuickView('.$rid.');" style="overflow:hidden;">
        <div id="quickview'.$rid.'" style="display: none;"> 
        	<a href="Javascript:;" onclick="show_quick_view(\''.$popupLink.'\',\'Quick View\',\'nofollow\');" title="'.$ringTitle.'" class="quick-view thickbox" rel="nofollow"><span>Quick View</span></a>
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
                <span><img src="'.SITE_URL.'demo_retail/images/logo-getfinancing.png" width="150" /></span>
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
        
        $ringresults = $this->catemodel->getSubCategory($cid);
        //print_ar($ringresults);
        
        $catelist_view = '';
        $cateID = array();
        
        if( count($ringresults) > 0 ) {
            foreach( $ringresults as $rowcate ) {
                $cateImgLink = RINGS_IMAGE.'crone/'.$rowcate['image'];
                //$detaiLink = SITE_URL.'testengagementrings/engagement_ring_listings/'.$rowcate['id'];
                $detaiLink = SITE_URL.'testengagementrings/engagementrings/'.$rowcate['id'];
                
                $ringTitle = $rowcate['catname'] . ' Diamond Engagement Rings';
                $cateDesc = 'We have taken care of your engagement rush by creating a breathtaking collection of the <a href="'.$detaiLink.'" style="text-decoration: none;"><strong>'.$ringTitle.'</strong></a> available in 14k or 18k yellow, rose, white gold or Platinum our pre-set diamond engagement rings are made to impress and for any budget:  from unique engagement rings to solitaire engagement rings to very cheap engagement rings.
            					';
                
                $catelist_view .= '<div class="cat-list"><div class="cat-row-inner"><span class="cat-name"><a href="'.$detaiLink.'" alt="" title="'.$ringTitle.'" onclick="setrefrenceurl(371,\'\');">'.$ringTitle.'</a></span><div class="cat-image"><a href="'.$detaiLink.'" alt="'.$ringTitle.'" title="'.$ringTitle.'" onclick="setrefrenceurl(371,\'\');">	<img class="" src="'.$cateImgLink.'" alt="'.$ringTitle.'" title="'.$ringTitle.'" border="0" style="display: block;">
	</a></div>
                <div class="sm-desc ">
		  <div class="cat-view-more">'.$cateDesc.'</div>
			<a href="'.$detaiLink.'" class="more-btn" title="'.$ringTitle.'" alt="'.$ringTitle.'" onclick="setrefrenceurl(371,\'\');"></a>
			</div>
		</div></div>';
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
     
 $view_itemdetail .= '</tbody></table>
                        <span id="item-diamond"><b>Diamond Information</b></span>
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
 
        if( empty($popup) ) {
            echo $view_itemdetail;
        } else {
            return $view_itemdetail;
        }
        
    }
    //// product popup detail
    function product_popup_detail($id=0) {
       $data = $this->getCommonData();
       $rowsring = $this->catemodel->getRingsDetailViaId($id, '', ''); //print_ar($rowsring);
       
       $data['title'] = 'Engagement Rings';
       $data['listings_detail'] = $this->listingdetail( $id, 'popup' );
       $data['ring_title'] = $this->getRingTitle($rowsring);
       $data['rings_thumb'] = $this->getProductThumb( $rowsring, 'popup' );
       $data['ringimg']   = SITE_URL . 'scrapper/imgs/'.$rowsring['ImagePath'];
       $data['rowsring']   = $rowsring;
       $data['retail_price']  = $rowsring['priceRetail'] * PRICE_PERCENT;  //// PRICE_PERCENT : 3.5
       $data['salesprice'] = $rowsring['priceRetail'];
       $data['saving_percent'] = ( 100 - ( ( $data['salesprice'] / $data['retail_price'] ) * 100 ) );
       
       $this->load->view('engagementringstrial/product_popup_detail', $data);
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
}

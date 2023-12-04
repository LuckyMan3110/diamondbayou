<?php
/**
* class used for displaying jewelleries entered by the sellers...
* @param string
* @return string
* @since 24, March 2013
* @Author Maninder Singh
*/
class Qualitystuller extends CI_Controller{
	public $getHaloJewleries='Halo Category';
	public $uniqueProd = FALSE;
	
	function __construct(){
		
        parent::__construct();
        $this->load->library("pagination");
        $this->load->model("qualitymodel");
        $this->load->model("catemodel");
        $this->load->helper("url");
        $this->load->helper("t_helper");
        $this->load->helper('directory');
        
	}
        
    //// view rings via category list
    function quality_gold_rings($cates_id="", $start=0)
    {
        parse_str(substr(strrchr($_SERVER['REQUEST_URI'], "?"), 1), $_GET);
        //$this->output->cache(5); // Will expire in 60 minutes	
        
        $data = $this->getCommonData();
        $perPage = get_var('per_page');
        $catID   = get_var('quality');
        $baseLinkCate = ( !empty($catID) ? '&quality='.$catID : '' );
        $data['quality_cate'] = ( ( !empty($catID) && $catID != 's' )  ? '<li>'.qualityCate($catID).'</li>' : '' );
        $data['cat_id'] = $catID;
        
        $this->session->unset_userdata('buildring');

        $config["per_page"] = 12;
        $config["num_links"] = 5;
        $config["uri_segment"] = 5;
        $config['use_page_numbers'] = TRUE;
        $startListing = ( !empty($perPage) ? $perPage * $config["per_page"] : 0 );

        $ringresults = $this->qualitymodel->qualityGoldRings($catID, $startListing, $config["per_page"]);
        
        $config["total_rows"] = $ringresults['total'];
        $config["base_url"] = config_item('base_url')."qualitystuller/quality_gold_rings/?s=1".$baseLinkCate;
        $config['display_pages'] = TRUE;
        $total_pages = ceil( $config["total_rows"] / $config["per_page"]);
        $lastPage = $config["per_page"] * ($total_pages  - 1);

        $getparent_cate = '';
        $style_cateid = '';
        $data["maincate_name"] = '';
        $data["cates_name"] = '';
        $data["cates_stnam"] = '';
        $data["cates_stname"] = '';
        $data["ttpages"] = '';
        $data["getparent_cate"] = '';

        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><a class="active" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        ////// unique collections fields and functionality
        $offs_se = $this->session->set_userdata('some_name', $off_set);

        $data['results_rings'] = $ringresults['results'];

        $data ['extraheader'] = '<script language="javascript" src="' . config_item('base_url') . 'js/hover_prodetail.js"></script>';
        $data ['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'css/jquery.popup.css" rel="stylesheet" />';
        $data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/jquery.popup.js" type="text/javascript"></script>';
        $data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/common_function.js" type="text/javascript"></script>';
        $this->pagination->initialize($config); 
        $data['pagination_links'] = '';
        $data['paginate_links'] = $this->pagination->create_links();;
        $paginate = '';
        ///// $this->pagination->create_links()

        if($config["total_rows"] > 0) {
        $data['pagination_links'] = '<li><a href="'.$config["base_url"].'">First</a>&nbsp; < </li>';

        for($i=1; $i<=$total_pages; $i++) {
                $j = $i - 1;
                $page_start = $j * $config["per_page"];
                $startLimit = ( $i == 1 ? $i : $page_start );			
                        $paginate .= '<option value="'.$config["base_url"].$startLimit.'" '.selectedOption($startLimit, $start).'>'.$i.'</option>';
                        $data['pagination_links'] .= '<li><a href="'.$config["base_url"].$startLimit.'">'.$i.'</a></li>';

                }
                $data['pagination_links'] .= '<li><a href="'.$config["base_url"].$lastPage.'">Last</a></li>';
        } else {
                $paginate = '<option>1</option>';
        }
        $data["paginate"] = $paginate;
        
        $this->session->unset_userdata('search_string');
        $output = $this->load->view('qualitygold/qualitylistings', $data, true);//new
        $this->output($output, $data);
    }
    //// view rings via category list
    function stuller_gold_rings($cates_id="", $start=0)
    {
        parse_str(substr(strrchr($_SERVER['REQUEST_URI'], "?"), 1), $_GET);
        //$this->output->cache(5); // Will expire in 60 minutes	
        
        $data = $this->getCommonData();
        $perPage = get_var('per_page');
        $ringCate = get_var('cate');
        $data['ringsCate'] = resetsSlugTitle($ringCate);
        $data['leftring_category'] = accordian_left_menu();
        $baseLinkCate = ( !empty($ringCate) ? '&cate='.$ringCate : '' );

        $this->session->unset_userdata('buildring');

        $config["per_page"] = 12;
        $config["num_links"] = 5;
        $config["uri_segment"] = 5;
        $config['use_page_numbers'] = TRUE;
        $startListing = ( !empty($perPage) ? $perPage * $config["per_page"] : 0 );

        $ringresults = $this->qualitymodel->stullerGoldRings($data['ringsCate'], $startListing, $config["per_page"]);
        
        $config["total_rows"] = $ringresults['total'];
        $config["base_url"] = config_item('base_url')."qualitystuller/stuller_gold_rings/?s=1".$baseLinkCate;
        $config['display_pages'] = TRUE;
        $total_pages = ceil( $config["total_rows"] / $config["per_page"]);
        $lastPage = $config["per_page"] * ($total_pages  - 1);

        $getparent_cate = '';
        $style_cateid = '';
        $data["maincate_name"] = '';
        $data["cates_name"] = '';
        $data["cates_stnam"] = '';
        $data["cates_stname"] = '';
        $data["ttpages"] = '';
        $data["getparent_cate"] = '';

        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><a class="active" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        ////// unique collections fields and functionality
        $offs_se = $this->session->set_userdata('some_name', $off_set);

        $data['results_rings'] = $ringresults['results'];

        $data ['extraheader'] = '<script language="javascript" src="' . config_item('base_url') . 'js/hover_prodetail.js"></script>';
        $data ['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'css/jquery.popup.css" rel="stylesheet" />';
        $data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/jquery.popup.js" type="text/javascript"></script>';
        $data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/common_function.js" type="text/javascript"></script>';
        $this->pagination->initialize($config); 
        $data['pagination_links'] = '';
        $data['paginate_links'] = $this->pagination->create_links();;
        $paginate = '';
        ///// $this->pagination->create_links()

        if($config["total_rows"] > 0) {
        $data['pagination_links'] = '<li><a href="'.$config["base_url"].'">First</a>&nbsp; < </li>';

        for($i=1; $i<=$total_pages; $i++) {
                $j = $i - 1;
                $page_start = $j * $config["per_page"];
                $startLimit = ( $i == 1 ? $i : $page_start );			
                        $paginate .= '<option value="'.$config["base_url"].$startLimit.'" '.selectedOption($startLimit, $start).'>'.$i.'</option>';
                        $data['pagination_links'] .= '<li><a href="'.$config["base_url"].$startLimit.'">'.$i.'</a></li>';

                }
                $data['pagination_links'] .= '<li><a href="'.$config["base_url"].$lastPage.'">Last</a></li>';
        } else {
                $paginate = '<option>1</option>';
        }
        $data["paginate"] = $paginate;
        //$data["sub_ex"] = $view_cate;
        $this->session->unset_userdata('search_string');
        $output = $this->load->view('qualitygold/stullerlisting', $data, true);//new
        $this->output($output, $data);
    }
    
    ///////
    //// rngsize : Ring Size
   function qualityringsdetail($id=0)
   {
   $this->session->unset_userdata('shape');
   //$this->output->cache(5);
   $burl = config_item('base_url');
   $catID   = get_var('quality');
   
   	$data = $this->getCommonData();
        $data['quality_cate'] = '<li><a href="'.SITE_URL.'qualitystuller/quality_gold_rings/?quality='.$catID.'">'.qualityCate($catID).'</a></li>';
   	$rowquality = $this->qualitymodel->qualityRingsDetail($id);
	
	$burl = SITE_URL;
	$data['seting_type'] = 'Setting Type';
	$data['style_group'] = $st;
	$data['ring_id'] = $id;
	$data['quality_link'] = 'qualitystuller/qualityringsdetail/'.$id.'/?quality='.$catID;
	$this->session->set_userdata('ringID',$id);
	$d_id = $this->session->userdata('diamnd_id');
	$dm_id = ( !empty($d_id) ? $d_id : 'false' );
	
	$data['sbparent_catename'] = '';
	$data['sbparent_style'] = '';
	
	if( strcmp( 'Three Stones', $sbparent_catename ) === 0 ) 
	{
		$data['addtoring_link'] = htmlspecialchars(config_item('base_url').'diamonds/search/true/false/tothreestone/true/'.$id);
		$this->session->set_userdata('build_3stone', 'unique');
	} else {
		$data['addtoring_link'] = htmlspecialchars(config_item('base_url').'engagement/complete_youring/'.$dm_id.'/'.$id.'/addtoring/');
	}
	$data['catgory_id']  = '';
	$data['buynow_link'] = htmlspecialchars(config_item('base_url').'jewelleries/addtoshoppingcart/');
	
	if(!empty($st)) {
            $data['seting_type'] = ucwords( str_replace('_', ' ', $st) );
	}
	
	///////////
   	$data['uniqueprice'] = $rowquality['Price'];
	$data['ring_sizes'] = '';
   	//echo $data['details']['data'][0]['style_group'];
	//$data['radomprodects'] = $this->jewelleriesmodel->getrandomproduct($id);//for random product display on right
	$data['cuprice'] = $rowquality['Price'];
	$data['subparent_id'] = $subparent;
        
        $data ['extraheader'] = '<link type="text/css" href="' . config_item('base_url') . 'css/tabs_style.css" rel="stylesheet" />';
        $data ['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'css/nanoscroller.css" rel="stylesheet" />';
        $data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/organictabs.jquery.js" type="text/javascript"></script>';
        $data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/jquery.nanoscroller.js" type="text/javascript"></script>';
        $data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/angular.min.js" type="text/javascript"></script>';
        $data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/jquery.popup.js" type="text/javascript"></script>';
        $data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/common_function.js" type="text/javascript"></script>';
        $data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/jquery.elevatezoom.js" type="text/javascript"></script>';
        $data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/jscmagnifier.js" type="text/javascript"></script>';
	$measurementvalues = array();
        
	////// get rings metal list
	$getRingsMetal = '';	
	$getRingsSize = '';
		
	////// item thumbs
	$getRingsThumb = '';
	$check_thumb = array();
        
    $getRingsThumb .= '<a href="#javascript;" onclick="ringThumbView(\''.$detail['ImageLink_500'] .'\')"><img src="'.$detail['ImageLink_100'].'" alt="" /></a>';
	
	array_filter($trimmedArray);
	$ringWeight = '';
	$metaList = array();
	$testar = array();
	$availableSizs = array();
	$available_insizes = '';
        
	$data['defaultMetal'] = $defaultMetal;
	$data['defaultRingSz'] = $defaultRingSz;
	$data['ringsmetail'] = $getRingsMetal;
	$data['ring_vsizes'] = $getRingsSize;
	$data['ring_thumbs'] = $getRingsThumb;
	$data['ring_weight'] = $ringWeight;
	$data['defaultMetal'] = $defaultMetal;
	$data['available_insizes'] = $available_insizes;
	$data['details'] = $rowquality;
	$data['ringPriceView'] = $rowquality['Price'];
	$data['ring_id'] = $rowquality['qg_id'];
	$setAvailableSize = implode("','", $availableSizs);
	$getSimilarProd = $this->qualitymodel->qualitySimilarRings($id);
	$similarProdList = '';
	
	if( count($getSimilarProd) > 0 ) {
		foreach($getSimilarProd as $rowsimilar) {
		
			$detailRingLink = SITE_URL.'qualitystuller/qualityringsdetail/'.$rowsimilar['qg_id'].'/?quality='.$catID;
			
			$similarProdList .= '<div class="prodBlock col-sm-4">
                        <div class="imgBlock"><a href="'.$detailRingLink.'"><img src="'.$rowsimilar['ImageLink_275'].'" alt="'.$rowsimilar['Description'].'" width="155" hight="144"></a></div>
                        <div class="prodLable">'.wordwrap($rowsimilar['Description'],25,"<br>\n").'<br />
                          <span>';
						  	if($rowsimilar['Price'] > 0) {
								$unPrice = 'Price: $ '.$rowsimilar['Price'];
							} else {
								$unPrice = 'Call: 415.626.5035 For Price';
							}
							
						  
                          $similarProdList .= $unPrice .'</span> 
                          
                          </div>
                      </div>';
		}
	} else {
		$similarProdList .= '<div></div>';
	}
	
	//// center stond shapes list
	$center_stshapes = array('B'=>'round','H'=>'heart','E'=>'emerald','PR'=>'princess','R'=>'radiant','O'=>'oval','M'=>'marquise','AS'=>'asscher','P'=>'pear','C'=>'cushion');
	$view_ctshape = '';
	$shapPath = config_item('base_url').'img/diamond_shapes/';
	$ctstone_shape = $data['details']['additional_stones']; 
	$find_ctsahpe = getCenterStoneShape($ctstone_shape);
	
	$getsp_shpe = unrings_diamond_shape($getring_shape);
	$getsp_shape = $center_stshapes[$getring_shape];
	//print_r($find_ctsahpe);
	//// supported shapes
	$data['suport_shape'] = ( !empty($ctstone_shape) ? strtoupper( implode(', ', $find_ctsahpe) ) : 'Support any shape' );
	$spstone_arlist = array($getsp_shape);
	
	$i=0;
//	foreach($center_stshapes as $sid => $shap_list) {
//		$shap_img = 'ct_'.$shap_list.'.jpg';
//		$altitle = strtoupper($shap_list);
//		
//		if( !empty($ctstone_shape) ) {
//			if(in_array($shap_list, $find_ctsahpe))
//			$view_ctshape .= '<a href="#javascript;" class="currShape" alt="'.$altitle.'"><img src="'.$shapPath.$shap_img.'" id="'.$sid.'_sh" onclick="setShapeInCenterStone(\''.$sid.'_sh\')" alt="'.$altitle.'" /></a>';
//		} else {
//			$view_ctshape .= '<a href="#javascript;" class="currShape" alt="'.$altitle.'"><img src="'.$shapPath.$shap_img.'" id="'.$sid.'_sh" onclick="setShapeInCenterStone(\''.$sid.'_sh\')" alt="'.$altitle.'" /></a>';
//		}
//	}
	
	////// get user comments
	$rings_coments = $this->catemodel->getComentsListView($id);
	$view_coments = '';
	
	if( count($rings_coments) > 0 ) {
		foreach($rings_coments as $row_coments) {
			$view_coments .= '<div class="reviews_block">
                                            <div class="reviews_label">
                                              <div><img src="'.SITE_URL.'img/page_img/stars_icon.png" /></div>
                                              <div class="dateLabel">'.date('d M, Y', strtotime($row_coments['coment_date'])).',</div>
                                            </div>
                                            <br />
                                            <div class="reviewHeading">This is comments review about</div>
                                            <div class="reviewData">'.$row_coments['post_comments'].'</div>
                                      </div>';
		}
	} else {
		$view_coments = '<div class="reviewData">NO COMMENTS LIST ADDED</div>';
	}
	
	 //// get customer info
	$this->load->model('user');
	$data['row_cust'] = $this->user->saveCustomerInfo('view'); 
	$data['view_coments'] = $view_coments;
	$data['view_ctshape'] = $view_ctshape;
	$data['similarProdList'] = $similarProdList;
	$data['buildring'] = $this->session->userdata('buildring');
	$this->load->view($this->config->item('template').'header' , $data);
	$this->load->view('qualitygold/qualitydetails_ringsview' , $data);
	$this->load->view($this->config->item('template').'footer', $data);
	
   	//$this->output($out , $data);
   }
   
    //// rngsize : Ring Size
   function stullerringsdetail($id=0)
   {
   $this->session->unset_userdata('shape');
   //$this->output->cache(5);
   $burl = config_item('base_url');
   
   	$data = $this->getCommonData();
   	$rowstuller = $this->qualitymodel->stullerRingsDetail($id);
	
	$burl = SITE_URL;
	$data['seting_type'] = 'Setting Type';
	$data['style_group'] = $st;
	$data['ring_id'] = $id;
        $stullerCate = $rowstuller['MerchandisingCategory1'];
	$data['category_link'] = '<li><a href="'.SITE_URL.'qualitystuller/stuller_gold_rings/?cate='.setSlugTitle($rowstuller['stuller_cate']).'">'.$rowstuller['stuller_cate'].'</a></li>';
	$data['stuller_link'] = 'qualitystuller/stullerringsdetail/'.$id.'/?cate=1';
	$this->session->set_userdata('ringID',$id);
	$d_id = $this->session->userdata('diamnd_id');
	$dm_id = ( !empty($d_id) ? $d_id : 'false' );
	
	$data['sbparent_catename'] = '';
	$data['sbparent_style'] = '';
	
	if( strcmp( 'Three Stones', $sbparent_catename ) === 0 ) 
	{
		$data['addtoring_link'] = htmlspecialchars(config_item('base_url').'diamonds/search/true/false/tothreestone/true/'.$id);
		$this->session->set_userdata('build_3stone', 'unique');
	} else {
		$data['addtoring_link'] = htmlspecialchars(config_item('base_url').'engagement/complete_youring/'.$dm_id.'/'.$id.'/addtoring/');
	}
	$data['catgory_id']  = '';
	$data['buynow_link'] = htmlspecialchars(config_item('base_url').'jewelleries/addtoshoppingcart/');
	
	if(!empty($st)) {
            $data['seting_type'] = ucwords( str_replace('_', ' ', $st) );
	}
	
	///////////
   	$data['uniqueprice'] = $rowstuller['Price'];
	$data['ring_sizes'] = '';
   	//echo $data['details']['data'][0]['style_group'];
	//$data['radomprodects'] = $this->jewelleriesmodel->getrandomproduct($id);//for random product display on right
	$data['cuprice'] = $rowstuller['Price'];
	$data['subparent_id'] = $subparent;
        
        $data ['extraheader'] = '<link type="text/css" href="' . config_item('base_url') . 'css/tabs_style.css" rel="stylesheet" />';
        $data ['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'css/nanoscroller.css" rel="stylesheet" />';
        $data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/organictabs.jquery.js" type="text/javascript"></script>';
        $data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/jquery.nanoscroller.js" type="text/javascript"></script>';
        $data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/angular.min.js" type="text/javascript"></script>';
        $data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/jquery.popup.js" type="text/javascript"></script>';
        $data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/common_function.js" type="text/javascript"></script>';
        $data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/jquery.elevatezoom.js" type="text/javascript"></script>';
        $data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/jscmagnifier.js" type="text/javascript"></script>';
	$measurementvalues = array();
        
	////// get rings metal list
	$getRingsMetal = '';	
	$getRingsSize = '';
		
	////// item thumbs
	$getRingsThumb = '';
	$check_thumb = array();
        $thumsList = ( !empty($rowstuller['Images']) ? json_decode($rowstuller['Images']) : json_decode($rowstuller['GroupImages']) );
        $ttThumbs = count($thumsList);
        
        if( count($thumsList) > 0 ) {
            $s = 1;
    foreach ($thumsList as $sthumb) {  /// $st: stuller thumb
       if( $ttThumbs >= 10 ) { 
           if( $s % 2 == 0 ) { 
               $getRingsThumb .= '<a href="#javascript;" onclick="ringThumbView(\''.$sthumb->ZoomUrl .'\')"><img src="'.$sthumb->ThumbnailUrl.'" alt="" /></a>';
           }
       } else {
        $getRingsThumb .= '<a href="#javascript;" onclick="ringThumbView(\''.$sthumb->ZoomUrl .'\')"><img src="'.$sthumb->ThumbnailUrl.'" alt="" /></a>';   
       }
               $check_thumb[] = $sthumb->ThumbnailUrl;
            
               $s++;
            }
        } else {
          $getRingsThumb .= '<a href="#javascript;" onclick="ringThumbView(\''.$detail['Image1'] .'\')"><img src="'.$detail['Image1'].'" alt="" /></a>';  
        }
        
        //print_ar( array_unique( $check_thumb ) );
        
    //$getRingsThumb .= '<a href="#javascript;" onclick="ringThumbView(\''.$detail['Image1'] .'\')"><img src="'.$detail['Image1'].'" alt="" /></a>';
    //$getRingsThumb .= '<a href="#javascript;" onclick="ringThumbView(\''.$detail['Image2'] .'\')"><img src="'.$detail['Image2'].'" alt="" /></a>';
    //$getRingsThumb .= '<a href="#javascript;" onclick="ringThumbView(\''.$detail['Image3'] .'\')"><img src="'.$detail['Image3'].'" alt="" /></a>';
	
	array_filter($trimmedArray);
	$ringWeight = '';
	$metaList = array();
	$testar = array();
	$availableSizs = array();
	$available_insizes = '';
        
	$data['defaultMetal'] = $defaultMetal;
	$data['defaultRingSz'] = $defaultRingSz;
	$data['ringsmetail'] = $getRingsMetal;
	$data['ring_vsizes'] = $getRingsSize;
	$data['ring_thumbs'] = $getRingsThumb;
	$data['ring_weight'] = $ringWeight;
	$data['defaultMetal'] = $defaultMetal;
	$data['available_insizes'] = $available_insizes;
	$data['details'] = $rowstuller;
	$data['ringPriceView'] = $rowstuller['Price'];
	$data['ring_id'] = $rowstuller['stuller_id'];
	$setAvailableSize = implode("','", $availableSizs);
	$getSimilarProd = $this->qualitymodel->stullerSimilarRings($id, $rowstuller['stuller_cate']);
	$similarProdList = '';
	
	if( count($getSimilarProd) > 0 ) {
		foreach($getSimilarProd as $rowsimilar) {
		$stulerImage = ( !empty($rowsimilar['Images']) ? json_decode($rowsimilar['Images']) : json_decode($rowsimilar['GroupImages']) );
			$detailRingLink = SITE_URL.'qualitystuller/stullerringsdetail/'.$rowsimilar['stuller_id'].'/?cate=1';
			
			$similarProdList .= '<div class="prodBlock col-sm-4">
                        <div class="imgBlock"><a href="'.$detailRingLink.'"><img src="'.$stulerImage[0]->FullUrl.'" alt="'.$rowsimilar['Description'].'" width="155" hight="144"></a></div>
                        <div class="prodLable">'.wordwrap($rowsimilar['Description'],25,"<br>\n").'<br />
                          <span>';
						  	if($rowsimilar['Price'] > 0) {
								$unPrice = 'Price: $ '.number_format($rowsimilar['Price'],2);
							} else {
								$unPrice = 'Call: 415.626.5035 For Price';
							}
							
						  
                          $similarProdList .= $unPrice .'</span> 
                          
                          </div>
                      </div>';
		}
	} else {
		$similarProdList .= '<div></div>';
	}
	
	//// center stond shapes list
	$center_stshapes = array('B'=>'round','H'=>'heart','E'=>'emerald','PR'=>'princess','R'=>'radiant','O'=>'oval','M'=>'marquise','AS'=>'asscher','P'=>'pear','C'=>'cushion');
	$view_ctshape = '';
	$shapPath = config_item('base_url').'img/diamond_shapes/';
	$ctstone_shape = $data['details']['additional_stones']; 
	$find_ctsahpe = getCenterStoneShape($ctstone_shape);
	
	$getsp_shpe = unrings_diamond_shape($getring_shape);
	$getsp_shape = $center_stshapes[$getring_shape];
	//print_r($find_ctsahpe);
	//// supported shapes
	$data['suport_shape'] = ( !empty($ctstone_shape) ? strtoupper( implode(', ', $find_ctsahpe) ) : 'Support any shape' );
	$spstone_arlist = array($getsp_shape);
	
	$i=0;
//	foreach($center_stshapes as $sid => $shap_list) {
//		$shap_img = 'ct_'.$shap_list.'.jpg';
//		$altitle = strtoupper($shap_list);
//		
//		if( !empty($ctstone_shape) ) {
//			if(in_array($shap_list, $find_ctsahpe))
//			$view_ctshape .= '<a href="#javascript;" class="currShape" alt="'.$altitle.'"><img src="'.$shapPath.$shap_img.'" id="'.$sid.'_sh" onclick="setShapeInCenterStone(\''.$sid.'_sh\')" alt="'.$altitle.'" /></a>';
//		} else {
//			$view_ctshape .= '<a href="#javascript;" class="currShape" alt="'.$altitle.'"><img src="'.$shapPath.$shap_img.'" id="'.$sid.'_sh" onclick="setShapeInCenterStone(\''.$sid.'_sh\')" alt="'.$altitle.'" /></a>';
//		}
//	}
	
	////// get user comments
	$rings_coments = $this->catemodel->getComentsListView($id);
	$view_coments = '';
	
	if( count($rings_coments) > 0 ) {
		foreach($rings_coments as $row_coments) {
			$view_coments .= '<div class="reviews_block">
                                            <div class="reviews_label">
                                              <div><img src="'.SITE_URL.'img/page_img/stars_icon.png" /></div>
                                              <div class="dateLabel">'.date('d M, Y', strtotime($row_coments['coment_date'])).',</div>
                                            </div>
                                            <br />
                                            <div class="reviewHeading">This is comments review about</div>
                                            <div class="reviewData">'.$row_coments['post_comments'].'</div>
                                      </div>';
		}
	} else {
		$view_coments = '<div class="reviewData">NO COMMENTS LIST ADDED</div>';
	}
	
	 //// get customer info
	$this->load->model('user');
	$data['row_cust'] = $this->user->saveCustomerInfo('view'); 
	$data['view_coments'] = $view_coments;
	$data['view_ctshape'] = $view_ctshape;
	$data['similarProdList'] = $similarProdList;
	$data['buildring'] = $this->session->userdata('buildring');
	$this->load->view($this->config->item('template').'header' , $data);
	$this->load->view('qualitygold/stullerdetails_ringsview' , $data);
	$this->load->view($this->config->item('template').'footer', $data);
	
   	//$this->output($out , $data);
   }
   
    private function getCommonData($banner = '') {

        $data = array();
        $data = $this->commonmodel->getPageCommonData();
        return $data;
    }
    function output($layout = null, $data = array(), $isleft = true, $isright = true) {

        $data['loginlink'] = $this->user->loginhtml();
        $output = $this->load->view($this->config->item('template') . 'header', $data, true);
        $output .= $layout;
        if ($isright)
            $output .= $this->load->view($this->config->item('template') . 'right', $data, true);
        $output .= $this->load->view($this->config->item('template') . 'footer', $data, true);
        $this->output->set_output($output);
    }
}

?>
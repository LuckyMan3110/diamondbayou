<?php
function signup_form() {
	$sign_upfrm = '';
	return $sign_upfrm;	
}

function home_signup_form() {
	$home_sgform = '<div id="sign-up">
		<h2 id="sup">SIGN ME UP!</h2>
		<div id="" class="enter_col">Enter your e-mail for news and updates, plus special offers that you\'\ll only get in your inbox!</div>
		<div class="enter_label">Enter your Email for News & Updates</div>
		<div class="subs_form">
			<form name="subscription" method="post" action="#">
				<input type="text" name="txt_subsemail" id="subscribe_email" class="subs_field" />
				<!--<input type="submit" name="btn_submit" class="subscribe_btn" value="Subscribe Me!" />-->
				<a class="initialism biolist_open btn btn-success subscribe_btn" href="#biolist">Subscribe Me!</a>
			</form>
		</div>
	</div>';
	return $home_sgform;
}

function accordian_left_menu($var='', $cateid='') {
	$CI = & get_instance();

	$base_url = config_item('base_url');
	$view_lfmenu = '';
	$engage_ar = array('classic','sidestone','vintage','halo','three_stone','bridal_rings','solitaire','antique','color_stones','fancy','semi_mount','engraved','petite');
	$engrave_active = ( in_array($var, $engage_ar) ? 'active' : '');
	$wedd_active = ($var == 'wedding' ? 'active' : '');
	$diam_active = ($var == 'diamond' ? 'active' : '');
	$pendant_active = ($var == 'pendants' ? 'active' : '');
	$braclet_active = ($var == 'bracelet' ? 'active' : '');
	$whsale_section = $CI->session->userdata('whsale_section');
	$parentCateID = getMainCatParentCateID($cateid); 

	if($whsale_section == 'whsale') {
		$catelist_view = 'rings/rings_view_category/';
		$ringlist_view = 'rings/rings_view_list/';
	} else {
		$catelist_view = 'testengagementrings/engagementrings/';
		$ringlist_view = 'testengagementrings/engagement_ring_listings/';
	}
		
	$default_list = array($engrave_active, $wedd_active,$diam_active,$pendant_active,$braclet_active);
	$default_ac = ( ( count($default_list) == 0 || $var == '' ) ? 'active' : '' );
	$view_lfmenu .= '<div id="accordian">
		<ul class="leftmenu-list">';
		$results_cate = $CI->Catemodel->getMainCategory();
		$c = 1;
		$activeClass = '';
		$cate_idlist = array(7,63,66,67,69);
		$sbcate_list = array(7,59,63,66,67,69,71,73,74);
		$stCate = get_var('cate');
		$quCate = $var;
		foreach($results_cate as $caterow) {
		 if( in_array($caterow['id'], $cate_idlist) ) {
			if($caterow['id'] == $parentCateID || $cateid == $caterow['id']) {
				$activeClass = 'active';
			} else {
				//$activeClass = ( ( $c == 1 && $parentCateID == '' ) ? 'active' : '' );
                                $activeClass = ( ( $c == 1 && $parentCateID == '' && $stCate == '' && $quCate == '' ) ? 'active' : '' );
			}
			$view_lfmenu .= '<li class="'.$activeClass.'"><h3>'.$caterow['catname'].'</h3>';
			//$subcate_api = 'webserviceapi/getSubCategoryList/';
			//$subcate_api = 'webservice_apis/index.php?type=subcate&cateid=';			
			$results_subcate = $CI->Catemodel->getSubCategory($caterow['id']);			
			
			if(count($results_subcate) > 0) {
				$view_lfmenu .= '<ul>';
				foreach($results_subcate as $subcaterow) {
					//$subcate_service = 'webserviceapi/getSubCategoryList/';
//					$rings_service   = 'webserviceapi/getRingsViaCategory/';
					$subcate_service = 'webservice_apis/index.php?type=subcate&cateid=';
					$rings_service   = 'webservice_apis/index.php?type=ringsview&cateid=';
					//$checkProd = file_get_contents($base_url.'webservice_apis/index.php?type=checkprod&cateid='.$caterow->id);
					//$checkProd = $CI->Catemodel->checkProductsExist($subcaterow['id']);
					
					$check_subcate = $CI->Catemodel->getSubCategory($subcaterow['id']);
					$checkring_list= $CI->Catemodel->checkCateRingsExist($subcaterow['id']);
					
						if( count($check_subcate) == 0) {
							$furtherLink = $base_url.$ringlist_view.$subcaterow['id'];
						} else {
							$furtherLink = $base_url.$catelist_view.$subcaterow['id'];
						}
						if( (in_array($caterow['id'], $sbcate_list) || $subcaterow['id'] == 85) && $subcaterow['id'] != 179) {
							$view_lfmenu .= '<li><a href="'.$furtherLink.'">'.$subcaterow['catname'].'</a></li>';
						}
				}
				
				$view_lfmenu .= '</ul>';
			}
			$view_lfmenu .= '</li>';
			//break;
			$c++;
		 }
		}
                
                 $CI->load->model("Qualitymodel");    
            $results_cate = $CI->Qualitymodel->stullerCategories();
            $qualityCate  = $CI->Qualitymodel->qualityGoldCateList(0);
            
            $activsClass = ( $quCate === 'quality' ? 'active' : '' );
            $activClass  = ( !empty($stCate) ? 'active' : '' );
            ///// quality gold
            //$view_lfmenu .= '<li class="'.$activsClass.'"><h3>Quality Jewelry</h3><ul>';
            /*$view_lfmenu .= '<li><a href="'.SITE_URL.'qualitystuller/quality_gold_rings/?quality=1">Bridal 2015-2016</a></li>';
            $view_lfmenu .= '<li><a href="'.SITE_URL.'qualitystuller/quality_gold_rings/?quality=2">Bridal Colorful Bands 2014</a></li>';*/
            
            if( count($qualityCate) > 0 ) {
                foreach($qualityCate as $rowcate) {
                    $sbcateid = ( $rowcate['id'] == 3 ? 4 : $rowcate['id'] );
                    //$view_lfmenu .= '<li><a href="'.SITE_URL.'qualitygoldrings/qualitycate/'.$sbcateid.'">'.$rowcate['title'].'</a></li>';
                }
            }
            //$view_lfmenu .= '</ul></li>';
            
            ////// stuller gold jewelry
            //$view_lfmenu .= '<li class="'.$activClass.'"><h3>Stuller Jewelry</h3><ul>';
            $stullerCategory = stuller_cate_list();
            
            foreach($stullerCategory as $caterow) 
            {
                //$view_lfmenu .= '<li><a href="'.SITE_URL.'stullerygoldrings/stuller_ring_listings/?cate='.setSlugTitle($caterow).'">'.$caterow.'</a></li>';
            }

            //$view_lfmenu .= '</ul></li>';
		$calas = $CI->router->fetch_class();
		
		if($calas != 'rings') {
			//$view_lfmenu .= '<li><a href="'.$base_url.'jewelleries/engagmentRingsListView/39">Engagement Rings</a></li>';
//			$view_lfmenu .= '<li><a href="'.$base_url.'jewelleries/getfinding_ringlist">Diamond Stud Heads</a></li>';
//			$view_lfmenu .= '<li><a href="'.$base_url.'diamonds/search/true/B">Loose Diamonds</a></li>';
//			$view_lfmenu .= '<li><a href="'.$base_url.'engagement/search">Build your Own Ring</a></li>';
//			$view_lfmenu .= '<li><a href="'.$base_url.'jewelry/buildthree_stonesring">Build your Own <br>Three Stone Ring</a></li>';
//			$view_lfmenu .= '<li><a href="'.$base_url.'jewelry/buildiamond_pendant">Build your Own Pendant</a></li>';
//			$view_lfmenu .= '<li><a href="'.$base_url.'jewelry/build_earings">Build your own <br>Diamond Stud Earrings</a></li>';	
		}
		
		$view_lfmenu .= '</ul>
	  </div>';
	  
	  /*$CI->apcache->setData('view_lfmenu', $view_lfmenu);
	  $viewleftMenu = $CI->apcache->getData('view_lfmenu');*/
	  
	  //return $view_lfmenu;
	  return '';
	}
    ///// stuller category array
    function stuller_cate_list($option='') {
        $scategory = array('Akoya Pearls',
                    'Freshwater Pearls',
                    'Bridal Rings',
                    'Eternity Bands',
                    'Ladies Wedding Bands',
                    'Mens Rings',
                    'Diamond Earrings',
                    'Pendants',
                    'Charm Bracelet',
                    'Hersey Kisses',
                    'Bfly Items',
                    'Bangles',
                    'Gemstone Earrings',
                    'Watches',
                    'Two Stone',
                    'Halo Rings',
                    'Sculptural',
                    'Engagement Sets',
                    'Solitaire with Accent',
                    'New Products',
                    'Vintage and Floral',
                    '3-Stone',
                    'Engagement Bases',
                    'Cathedral'
                );
        
        sort( $scategory );
        
        $options_list = '';
        //$stullerCategory = sort( $scategory );
        foreach($scategory as $stuler_cate) {
            $options_list .= '<option value="'.$stuler_cate.'">'.$stuler_cate.'</option>';
        }
        if( empty($option) ) {
            return $scategory;
        } else {
            return $options_list;
        }
        
        //return $scategory;
    }
    function stuller_left_categories($pagenum='') {
        $CI = & get_instance();

        $base_url = config_item('base_url');
        $view_lfmenu = '';
        $CI->load->model("Qualitymodel");

            $view_lfmenu .= '<div id="accordian">
                <div class="setcateImg"><img src="'.UNITED_IMGDR.'categories_un.jpg" alt="categories_un"></div>
            <ul class="leftmenu-list">';

            $results_cate = $CI->Qualitymodel->stullerCategories();

            foreach($results_cate as $caterow) 
            {
                $view_lfmenu .= '<li class=""><h3><a href="'.SITE_URL.'qualitystuller/stuller_gold_rings/?cate='.setSlugTitle($caterow['MerchandisingCategory1']).'">'.$caterow['MerchandisingCategory1'].'</a></h3></li>';
                
                //$c++;
            }

            $view_lfmenu .= '</ul>
      </div>';

      return $view_lfmenu;
    }
    
    function setSlugTitle($str='') {
        $cateSlug = str_replace(' ', '_', $str);
        $cateSlug = strtolower($cateSlug);
        return $cateSlug;
    }
    function resetsSlugTitle($str='') {
        $cateSlug = str_replace('_', ' ', $str);
        $cateSlug = ucwords($cateSlug);
        return $cateSlug;
    }
    
	///// get category parent ID
	function getMainCatParentCateID($cid) {
	 $CI = & get_instance();
		 $cate1 = $CI->Catemodel->getparentCateID($cid);
		 $cate2 = $CI->Catemodel->getparentCateID($cate1);
		 $cate3 = $CI->Catemodel->getparentCateID($cate2);
		 $cate4 = $CI->Catemodel->getparentCateID($cate3);
		 $cate5 = $CI->Catemodel->getparentCateID($cate4);
		 $cate_id = $cate1;
		 
		if($cate5 == '' || $cate5 == 0) {
			$cate_id = $cate4;
			if($cate4 == '' || $cate4 == 0) {
				$cate_id = $cate3;
				if($cate3 == '' || $cate3 == 0) {
					$cate_id = $cate2;
					if($cate2 == '' || $cate2 == 0) {
						$cate_id = $cate1;
					}
				}
			}
		}
		
		return trim($cate_id);
	}
	//// sort multidimensinal array
	function array_sort_by_column(&$arr, $col, $dir = SORT_ASC) {
		$sort_col = array();
		foreach ($arr as $key=> $row) {
		$sort_col[$key] = $row[$col];
		}
		array_multisort($sort_col, $dir, $arr);
	}
	////// breadcrum for left menu
	function breadcrumTitle($title) {
		
		switch($title) {
		case 'wedding' :
			$bread_title = 'Wedding and Anniversary Brands';
			break;
		case 'diamond' :
			$bread_title = 'Diamond Earrings';
			break;
		case 'pendants' :
			$bread_title = 'Diamond Pendants';
			break;
		case 'bracelet' :
			$bread_title = 'Diamond Bracelets';
			break;
		default :
			$bread_title = 'Engagement Rings';
			break;
		}
		return $bread_title;	
	}
	
	//////// view shape value
	function view_shape_value(&$image_shape, $shapes='') {
		
		switch ($shapes){
			case 'B':
				$shape = 'Round';
				$image_shape = 'actual-dime.jpg';
				break;
			case 'PR':
				$shape = 'Princess';
				$image_shape = 'princesss.jpg';
				break;
			case 'R':
				$shape = 'Radiant';
				$image_shape = 'radiant.jpg';
				break;
			case 'E':
				$shape = 'Emerald';
				$image_shape = 'emeraled.jpg';
				break;
			case 'AS':
				$shape = 'Asscher';
				$image_shape = 'asscher.jpg';
				break;
			case 'O':
				$shape = 'Oval';
				$image_shape = 'oval.jpg';
				break;
			case 'M':
				$shape = 'Marquise';
				$image_shape = 'marquise.jpg';
				break;
			case 'P':
				$shape = 'Pear';
				$image_shape = 'pear.jpg';
				break;
			case 'H':
				$shape = 'Heart';
				$image_shape = 'heart.jpg';
				break;
			case 'C':
				$shape = 'Cushion';
				$image_shape = 'cushion_cut_diamond.jpg';
				break;								  	
			default:
				$shape = 'Round';
				$image_shape = 'actual-dime.jpg';
				break;
		  }	
		  return $shape;
	}
	//////// view shape value
	function pair_shape_value($shapes='') {
		
		switch ($shapes){
			case 'B':
				$shape = 'Round';
				$image_shape = 'round_pair.jpg';
				break;
			case 'PR':
				$shape = 'Princess';
				$image_shape = 'princes_pair.jpg';
				break;
			case 'R':
				$shape = 'Radiant';
				$image_shape = 'radiant_pair.jpg';
				break;
			case 'E':
				$shape = 'Emerald';
				$image_shape = 'emearld_pair.jpg';
				break;
			case 'AS':
				$shape = 'Ascher';
				$image_shape = 'asscher_pair.jpg';
				break;
			case 'O':
				$shape = 'Oval';
				$image_shape = 'oval_pear.jpg';
				break;
			case 'M':
				$shape = 'Marquise';
				$image_shape = 'marquise_pair.jpg';
				break;
			case 'P':
				$shape = 'Pear';
				$image_shape = 'pear_pair.jpg';
				break;
			case 'H':
				$shape = 'Heart';
				$image_shape = 'heart_pair.jpg';
				break;
			case 'C':
				$shape = 'Cushion';
				$image_shape = 'custion_pair.jpg';
				break;								  	
			default:
				$shape = 'Round';
				$image_shape = 'round_pair.jpg';
				break;
		  }
		  
		  $shappaire_image = 'img/shapes_paire/'.$image_shape;
		  
		  return $shappaire_image;
	}
	
	//////// view original shape value
	function diamond_shape_value($shape='') {
		
		switch ($shape){
			case 'Round':
				$shape = 'B';
				break;
			case 'Princess':
				$shape = 'PR';
				break;
			case 'Emerald':
				$shape = 'E';
				break;
			case 'Oval':
				$shape = 'O';
				break;
			case 'Marquise':
				$shape = 'M';
				break;
			case 'Pear':
				$shape = 'P';
				break;
			case 'Heart':
				$shape = 'H';
				break;
			case 'Trillion':
				$shape = 'Trilliant';
				break;
			default:
				$shape = 'B';
				break;
		  }
		  
		  return $shape;
	}
	
	//// view metal value
	function metal_label($metal) {
		
		switch($metal) {
			case 'platinum':
				$view_metal = 'Platinum';
			break;
			case '18kwhitegold':
				$view_metal = '18K White Gold';
			break;
			case '18kyellowgold':
				$view_metal = '18K Yellow Gold';
			break;
			default:
				$view_metal = 'Platinum';
			break;
		}
		return $view_metal;
	}
	function metal_ringlabel($metal) {
		
		switch($metal) {
			case 'Platinum':
				$view_metal = 'Platinum';
				$price_column = 'price';
			break;
			case 'WhiteGold':
				$view_metal = 'White Gold';
				$price_column = 'white_gold_price';
			break;
			default:
				$view_metal = 'Yellow Gold';
				$price_column = 'yellow_gold_price';
			break;
		}
		$dtcols['view_metal']   = $view_metal;
		$dtcols['price_column'] = $price_column;
		
		return $dtcols;
	}
	//// selected option
	function selectedOption($select,$select2) {
		$rt = ( $select == $select2 ? 'selected' : '' );
		return $rt;
	}
	function checkedOption($ck,$ck1) {
		$rt = ( $ck == $ck1 ? 'checked' : '' );
		return $rt;
	}
	//// selected option
    function checkedBox($value1,$value2) {
            $checked = ( $value1 === $value2 ? 'checked=\"checked\"' : '' );
            return $checked;
    }
	///// diamond color
	function getDiamondColr($color) {
		switch($color) {
			case 'Yellow' :
				$diamond_colr = 'yl';
			break;
			case 'Red' :
				$diamond_colr = 'rd';
			break;
			case 'Pink' :
				$diamond_colr = 'pk';
			break;
			case 'Orange' :
				$diamond_colr = 'or';
			break;
			case 'Green' :
				$diamond_colr = 'gr';
			break;
			case 'Champagne' :
				$diamond_colr = 'ch';
			break;
			case 'Chameleon' :
				$diamond_colr = 'cm';
			break;
			case 'Brown' :
				$diamond_colr = 'br';
			break;
			case 'Blue' :
				$diamond_colr = 'bl';
			break;
			case 'Black' :
				$diamond_colr = 'bk';
			break;
			default :
				$diamond_colr = 'NA';
		}
		return $diamond_colr;
	}
	///// print array
	function print_ar($ar) {
		echo '<pre>';
		print_r($ar);
		echo '</pre>';
		die();	
	}
	//// number format
	function _nf($nf, $digit=0){		
		return number_format((float)$nf, $digit);
	}
	///// set title name
	function set_title($title=''){
		$tt = str_replace('_',' ',ucwords($title));
		return $tt;
	}
	function cleans($strings) {
		$strings = str_replace(array('`', "'"), '', $strings);
		return $strings;
	}
	function dmLink($str, $contr='diamonds') {
		$link = config_item('base_url').$contr.'/search/true/'.$str;
		return $link;
	}
	///// set selected
	function isSelected($id, $id1) {
		$selected = ( ( $id == $id1 ) ? 'selected' : '');
		return $selected;
	}
	/// get cut value
	function getCutValue($cut) {
		switch($cut) {
			case 'VG' :
				$cutValue = 'Very Good';
			break;
			case 'EX' :
				$cutValue = 'Excellent';
			break;
			case 'Fair' :
				$cutValue = 'Fair';
			break;
			case 'GD' :
				$cutValue = 'Good';
			break;
			case 'ID' :
				$cutValue = 'Ideal';
			break;
			case 'Poor' :
				$cutValue = 'Poor';
			break;
			default:
				$cutValue = 'N/A';
			break;			
		}
		return $cutValue;
	}
	//// next order delivery date
	function nextDate() {
		$deliveryDate = date("l, F d",strtotime("+10 days"));
		return $deliveryDate;	
	}
	
	////// build pendant steps
	function stepsRowBuildPendant($step='1', $addoption='solitaire') {
		$step1 = ( $step == 1 ? ' active_steps' : '' );
		$step2 = ( $step == 2 ? ' active_steps' : '' );
		$step3 = ( $step == 3 ? ' active_steps' : '' );
		$step4 = ( $step == 4 ? ' active_steps' : '' );
		$url = config_item('base_url');
		$CI = & get_instance();
		$select_style = $url.'jewelry/build_diamond_pendant';
		$view_setting = $CI->session->userdata('pendant_uri');
		$pendant_diamond = $CI->session->userdata('pendant_diamond');
		$sidestone_diamond = $CI->session->userdata('sidestone_diamond');
		$diamond_view     = $CI->session->userdata('diamond_view');
		$change_diamond   = $CI->session->userdata('change_diamond');
		$sidestone_detail = $CI->session->userdata('sidestone_detail');
		
		$steps_row = '<div class="steps_rowst row-fluid">
				<div class="cols_box'.$step1.' col-sm-3">
					<h3>Select Style</h3>
					<div><a href="'.check_empty($view_setting,'#').'">View</a> | <a href="'.check_empty($select_style,'#').'">Change</a></div>
					<div class="steps_rgarow"></div>
				</div>
				<div class="cols_box'.$step2.' col-sm-3">
					<h3>Select Diamond</h3>
					<div><a href="'.check_empty($diamond_view,'#').'">View</a> | <a href="'.check_empty($change_diamond,'#').'">Change</a></div>
					<div class="steps_rgarow"></div>
				</div>
				<div class="cols_box'.$step3.' col-sm-3">
					<h3>Sidestones</h3>
					<div><a href="'.check_empty($sidestone_detail,'#').'">View</a> | <a href="'.check_empty($sidestone_diamond,'#').'">Change</a></div>
					<div class="steps_rgarow"></div>
				</div>
				<div class="cols_box'.$step4.' col-sm-3">
					<h3>Complete</h3>
					<div>Select Pendant Size</div>
				</div>
				<div class="clear"></div>
			  </div>';
			  
	  $solitair_steps = '<div class="steps_rowst solistairRow row-fluid">';
	  /*$solitair_steps = '<div class="cols_box'.$step1.' col-sm-4">
          <h3>Select Style</h3>
          <div><a href="'.check_empty($select_style,'#').'">View</a> | <a href="'.check_empty($view_setting,'#').'">Change</a></div>
          <div class="steps_rgarow"></div>
        </div>';*/
		
	if( strcmp('toearring', $addoption) === 0) {
		$solitair_steps .= '<div class="cols_box'.$step3.' col-sm-4">
					<h3>Sidestones</h3>
					<div><a href="'.check_empty($sidestone_diamond,'#').'">View</a> | <a href="'.check_empty($sidestone_diamond,'#').'">Change</a></div>
					<div class="steps_rgarow"></div>
				</div>';
		$setlabel = 'Earring';
	} else {
		$solitair_steps .= '<div class="cols_box'.$step2.' col-sm-4">
          <h3>Select Diamond</h3>
          <div><a href="'.check_empty($pendant_diamond,'#').'">Views</a> | <a href="'.check_empty($pendant_diamond,'#').'">Changess</a></div>
          <div class="steps_rgarow"></div>
        </div>';
		$setlabel = 'Pendant';
	}
		
         $solitair_steps .= '<div class="cols_box'.$step3.' col-sm-4">
          <h3>Complete</h3>
          <div>Select '.$setlabel.' Size</div>
        </div>
        <div class="clear"></div>
      </div>';
			
		$return_steps = ( $addoption == 'threestone' ? $steps_row : $solitair_steps ); 
		
		return $return_steps;
	}
    ///// three stone steps
    ////// build pendant steps
    function stepsBuildToThrestone($step='1', $addoption='tothreestone', $r_id=0, $lot=0, $s_id1=0, $s_id2=0) {
        $step1 = ( $step == 1 ? ' active_steps' : '' );
        $step2 = ( $step == 2 ? ' active_steps' : '' );
        $step3 = ( $step == 3 ? ' active_steps' : '' );
        $step4 = ( $step == 4 ? ' active_steps' : '' );
        $ring_id_link = ( $r_id > 0 ? SITE_URL.'site/engagementRingDetail/NA/'.$r_id : '#' );
        $lot_id_link = ( $lot > 0 ? SITE_URL.'diamonds/diamond_detail/'.$lot.'/tothreestone/'.$r_id : '#' );
        $side_stone_link = ( $s_id1 > 0 ? SITE_URL.'diamonds/diamondpair_moredetail/'.$s_id1.'/tothreestone/'.$lot.'/'.$s_id2 : '#' );
        $CI = & get_instance();
        $CI->load->model('diamondmodel');
        $CI->load->helper('ringsection');
        
        $unique_row = $CI->diamondmodel->get_uniqueitem_row($r_id);
        $diamond_shape = get_unique_ring_diamond_shape(isset($unique_row['additional_stones'])?$unique_row['additional_stones']:'');
        $shape_img = view_shape_value($dimond_shape_img, $diamond_shape);
        
        $supplied_stones = $CI->session->userdata('supplied_stones');

        $return_steps = '<div class="steps_rowst row-fluid">
                        <div class="cols_box'.$step1.' col-sm-3">
                                <h3>Select Style</h3>
                                <div><a href="'.$ring_id_link.'">View</a> | <a href="'.SITE_URL.'jewelry/build_three_stone_ring/56">Change</a></div>
                                <div class="steps_rgarow"></div>
                        </div>
                        <div class="cols_box'.$step2.' col-sm-3">
                                <h3>Select Diamond</h3>
                                <div><a href="'.$lot_id_link.'">View</a> | <a href="'.SITE_URL.'search/true/false/tothreestone/true/'.$r_id.'">Change</a></div>
                                <div class="steps_rgarow"><img src="'.SITE_URL.'images/shapes_images/'.$dimond_shape_img.'" alt="" /></div>
                        </div>
                        <div class="cols_box'.$step3.' col-sm-3">
                                <h3>Sidestones</h3>
                                <div><a href="'.$side_stone_link.'">View</a> | <a href="'.SITE_URL.'diamonds/search/true/false/tothree_stone/false/'.$lot.'">Change</a></div>
                                <div class="steps_rgarow"></div>
                        </div>
                        <div class="cols_box'.$step4.' col-sm-3">
                                <h3>Complete</h3>
                                <div>Select Ring Size</div>
                        </div>
                        <div class="clear"></div>
                  </div>';
        
        $supplied_stone_steps = '<div class="steps_rowst supplied_stone row-fluid">
                        <div class="cols_box'.$step1.' col-sm-3">
                            <h3>Select Style</h3>
                            <div><a href="'.$ring_id_link.'">View</a> | <a href="'.SITE_URL.'jewelry/build_three_stone_ring/56">Change</a></div>
                            <div class="steps_rgarow"></div>
                        </div>
                        <div class="cols_box'.$step3.' col-sm-3">
                            <h3>Sidestones</h3>
                            <div class="steps_rgarow"></div>
                        </div>
                        <div class="cols_box'.$step2.' col-sm-3">
                            <h3>Select Diamond</h3>
                            <div><a href="'.$lot_id_link.'">View</a> | <a href="'.SITE_URL.'search/true/false/tothreestone/true/'.$r_id.'">Change</a></div>
                            <div class="steps_rgarow"><img src="'.SITE_URL.'images/shapes_images/'.$dimond_shape_img.'" alt="" /></div>
                        </div>
                        <div class="cols_box'.$step4.' col-sm-3">
                            <h3>Complete</h3>
                            <div>Select Ring Size</div>
                        </div>
                        <div class="clear"></div>
                  </div>';

        if( !empty($supplied_stones) ) {
            return $supplied_stone_steps;
        } else {
            return $return_steps;
        }
    }
	//// check empty value
	function check_empty($field,$na='NA') {
		$return = ( !empty($field) ? $field : $na );
		return $return;
	}
	//// set add options vlaue
	function setOptionValue($addoption) {
		switch($addoption) {
			case 'tothreestone':
			$option_setting = 'tothree_stone';
			break;
			case 'addpendantsetings3stone':
			$option_setting = 'addpendantsetings_3stone';
			break;
			default:
			$option_setting = $addoption;
			break;
		}
		return $option_setting;
	}
	function resetOptionValue($addoption) {
		switch($addoption) {
			case 'tothree_stone':
			$option_setting = 'tothreestone';
			break;
			case 'addpendantsetings_3stone':
			$option_setting = 'addpendantsetings3stone';
			break;
			default:
			$option_setting = $addoption;
			break;
		}
		return $option_setting;
	}
	//////////////////////////////// additional functions ////////////////////////////////////
	//// show default text besides diamond list
	function defaultView() {
		$default_view = '<div class="quest_icon"><img src="'.config_item('base_url').'img/page_img/no-info50x50.png" alt="no-info50x50"/></div>
        <div class="rgHead">Hover over and click diamond details to see further details and shipping information.</div>';
		return $default_view;
	}
	//// diamond detail link
	function diamond_detail_link($lot,$addoption,$setting) {
		$url = config_item('base_url').'diamonds/diamond_detail/'.$lot.'/'.$addoption.'/'.$setting;
		return $url;
	}
	////// calculate wire price
	function wire_price($price=0) {
		$wirepr = $price * 0.03;
		$wireprice = $price - $wirepr;
		return $wireprice;
	}
	///// loose diamond title
	function loose_diamond_title($details) {
		$item_title = $details['carat'].' Carat '.$details['cut'].' Cut '.$details['lab'].' Report Natural Diamond <br>'.$details['Meas'].'mm';
		return $item_title;
	}
	///// check login
	function check_ulogin() {
		$CI = & get_instance();
		
		if (!$CI->session->isLoggedin()) {
            $CI->load->helper('url');
            //redirect('/account/membersignin', 'refresh');
			//redirect('account/membersignin', 'refresh');
			header('location:'.config_item('base_url').'account/membersignin');
        }	
	}
	
	////// view payment method
	function view_payment_method($method) {
		switch($method) {
			case 'payment_card' :
				$payment_method = 'Payment Via Card';
			break;
			case 'payment_bankwire' :
				$payment_method = 'Bank Wire';
			break;
			case 'payment_byphone' :
				$payment_method = 'Pay By Telephone';
			break;
			case 'getfinancing' :
				$payment_method = 'Pay By Getfinancing';
			break;
			case 'paypal' :
				$payment_method = 'Pay By Paypal';
			break;
			default :
				$payment_method = 'Bank Wire';
			break;
		}
		return $payment_method;
	}
	//////
	function setCarat($carat='', $perent=0.50) {
		$ct = $carat * $perent;
		return $ct;
	}
	//// metal price columns
	function metal_price_cols($metal) {
		
		switch($metal) {
			case 'WhiteGold' :
			$price_field = 'white_gold_price';
			break;
			case 'Platinum' :
			$price_field = 'platinum_price';
			break;
			default :
			$price_field = 'price';
			break;
		}
		return $price_field;
	}
	function _ud($ud) {
		return urldecode($ud);	
	}
	function _ue($ud) {
		return urlencode($ud);	
	}
	
	////// list down the similar diamonds
	function getSimilarDiamondsListRows($lot, $lot2, $addoption, $settingid, $option='diamond') {
		$CI = & get_instance();
		$CI->load->model('diamondmodel');
		$similar_result = $CI->diamondmodel->listPairSimilarDiamonds($lot, $lot2);
		$similar_diamondpair = '';
		if(count($similar_result)) {
			$s = 1;
			foreach($similar_result as $smpairs) {
				$similar_dmshape = view_shape_value($view_diamondimg, $smpairs['shape']);
				$smpairs2 = $CI->diamondmodel->getEarRingSideStone($smpairs);
				if(!empty($smpairs2['lot'])) {
					$smtotalPrice = $smpairs['price'] + $smpairs2['price'];
					if($option == 'earrings') {
						$smdetaiLink = config_item('base_url').'jewelry/complete_earings/'._ud($settingid).'/'._ud($smpairs['lot']).'/'._ud($smpairs2['lot']).'/'.$addoption;	
					} else {
						$smdetaiLink = config_item('base_url').'diamonds/diamondpair_moredetail/'._ud($smpairs['lot']).'/'.$addoption.'/'._ud($settingid).'/'._ud($smpairs2['lot']);
					}
					
					$ttCarat = $smpairs['carat'] + $smpairs2['carat'];
					
					$similar_diamondpair .= '<tr>
							<td>'.$similar_dmshape.'</td>
							<td>'.$ttCarat.'</td>
							<td>'.$smpairs['color'] .'<br>'. $smpairs2['color'].'</td>
							<td>'.$smpairs['clarity'] .'<br>'. $smpairs2['clarity'].'</td>
							<td>'.$smpairs['ratio'] .'<br>'. $smpairs2['ratio'].'</td>
							<td>'.$smpairs['cut'] .'<br>'. $smpairs2['cut'].'</td>
							<td>'.$smpairs['Cert'] .'<br>'. $smpairs2['Cert'].'</td>
							<td>'.$smpairs['Polish'] .'<br>'. $smpairs2['Polish'].'</td>
							<td>'.$smpairs['Sym'] .'<br>'. $smpairs2['Sym'].'</td>
							<td>'.$smpairs['Flour'] .'<br>'. $smpairs2['Flour'].'</td>
							<td>$'. _nf($smtotalPrice) .'</td>
							<td><a href="'.$smdetaiLink.'">Details</a></td>
						</tr>';
					
					if($s == 9) { break;}
					$s++;
					}
				}
		}
		return $similar_diamondpair;	
	}

	///// set color color and clarity array
	function colorClarityValues($indx, $cols='color') {
		$colorary = array(
			'D' => "color in ('D','E')",
			'E' => "color in ('D','E','F')",
			'F' => "color in ('E','F','G')",
			'G' => "color in ('F','G','H')",
			'H' => "color in ('G','H','I')",
			'I' => "color in ('H','I','J')",
			'J' => "color in ('I','J','K')",
			'K' => "color in ('J','K','L')",
			'L' => "color in ('K','L','M')",
			'M' => "color in ('L','M','N')",
			'N' => "color in ('M','N','O')",
			'O' => "color in ('N','O','P')",
			'P' => "color in ('O','P','Q')",
			'Q' => "color in ('P','Q','R')",
			'R' => "color in ('Q','R','S')",
			'S' => "color in ('R','S','T')",
			'T' => "color in ('S','T','U')",
			'U' => "color in ('T','U','V')",
			'V' => "color in ('U','V','W')",
			'W' => "color in ('V','W','X')",
			'X' => "color in ('W','X','Y')",
			'Y' => "color in ('X','Y','Z')",
			'Z' => "color in ('Y','Z')"
		);
		$clarityary = array(
			'IF' 	=> "clarity in ('IF','VVS1')",
			'VVS1' 	=> "clarity in ('IF','VVS1','VVS2')",
			'VVS2' 	=> "clarity in ('VVS1','VVS2','VS1')",
			'VS1' 	=> "clarity in ('VVS2','VS1','VS2')",
			'VS2' 	=> "clarity in ('VS1','VS2','SI1')",
			'SI1' 	=> "clarity in ('VS2','SI1','SI2')",
			'SI2' 	=> "clarity in ('SI1','SI2','SI3')",
			'SI3' 	=> "clarity in ('SI2','SI3','I1')",
			'I1' 	=> "clarity in ('SI3','I1','I2')",
			'I2' 	=> "clarity in ('I1','I2','I3')",
			'I3' 	=> "clarity in ('I2','I3')"
		);
		$colsaray = ( $cols == 'color' ? $colorary : $clarityary );
		if(isset($colsaray[$indx])){
			return $colsaray[$indx];
		}else{
			return;
		}
	}

	//// set json response
	function setfile_response($url='') {
		$returns = '';
		if( !empty($url) ) {
			$mainmenu_cate = file_get_contents($url);
			$returns = json_decode($mainmenu_cate);	
		}
		return $returns;
	}
	function getUrlResponse($link, $dc='') {
		$curl = curl_init();
		// Set some options - we are passing in a useragent too here
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => $link,
		CURLOPT_USERAGENT => 'Codular Sample cURL Request'
		));
		// Send the request & save response to $resp
		$resp = curl_exec($curl);
		// Close request to clear up some resources
		curl_close($curl);
		
		return ( empty($dc) ? json_decode($resp) : $resp );	
	}
	function setRingSize($size) {
		$rgsz = str_replace(' ', '_', $size);
		$rgsz = str_replace('/', '-', $rgsz);
		return $rgsz;
	}
	function resetRingSize($size) {
		$rgsz = str_replace('_', ' ', $size);
		$rgsz = str_replace('-', '/', $rgsz);
		return $rgsz;
	}
	function setURLValue($url='',$idex) {
		if( !empty($url) ) {
			$setvalue = explode('/', $url);
			$setvalues = ( !empty($setvalue[$idex]) ? $setvalue[$idex] : $url );
			return $setvalues;
		}
		return false;
	}
	function getCateNameById($id='') {
		$CI = & get_instance();
		$cateName = $CI->Catemodel->getRingCategoryName($id);
		return $cateName;
	}
	function getSuppliedStoneShape($supplied_stones) {
		$shapeview = '';
		$str = explode('/', $supplied_stones);
		if(isset($str[1])){
			$str1 = explode(",", $str[1]);
			$shapeview = ( !empty($str1[0]) ? $str1[0] : $str[1] );
		}
		return unrings_diamond_shape($shapeview);
	}
    function solitairesCateID() {
        return array(52,53,54,55,97,98,99,100,101,102,103);
    }
	function getAdditonalStonesRatio($st='') 
	{
		$return = array();
		if( !empty($st) ) :
			$setstring = explode(',', $st);
		
			if( !empty($setstring[0]) ) {
				$str = explode('-', trim($setstring[0]));
			} else {
				$str = explode('-', $st);
			}
			$str1 = explode('/', $str[1]);
			$ratio_size = $str1[0];
			$size_shape = $str1[1];
			
			$check_ratio = strstr($ratio_size, 'x', true);
			
			if( !empty($check_ratio) ) {
				$getratio = explode('x', $ratio_size);
				$length = $getratio[0];
				$width  = $getratio[1];
				$carat = '';
			} else {
				$width  = '';
				$length = '';
				$carat = $ratio_size;
			}
			
			$return['length'] = $length;
			$return['width']  = $width;
			$return['carat']  = $carat;
			$return['size_shape'] = unrings_diamond_shape($size_shape);	
		endif;
		
		return $return;
	}
	
	function unrings_diamond_shape($shapes='') {
		
		switch ($shapes){
			case 'RD':
			case 'B':
				$shape = 'B';
				break;
			case 'PR':
				$shape = 'PR';
				break;
			case 'SB':
				$shape = 'SB';
			case 'AS':
				$shape = 'AS';
				break;
			case 'EC':
				$shape = 'E';
				break;
			case 'OV':
				$shape = 'O';
				break;
			case 'TB':
				$shape = 'TB';
				break;
			case 'TR':
				$shape = 'TR';
				break;
			case 'MA':
				$shape = 'M';
				break;
			case 'PE':
				$shape = 'P';
				break;
			case 'CU':
				$shape = 'C';
				break;
			case 'HM':
			case 'HR':
				$shape = 'H';
				break;
			case 'TRAP':
				$shape = 'TRAP';
				break;								  	
			default:
				$shape = '';
				break;
		  }
		  
		  return $shape;
	}
    function getMetalValue($metals='') {
    switch($metals) {
        case '14KW':
            $metal_value = '14K White Gold  ';
            break;
        case '14KY':
            $metal_value = '14K Yellow Gold';
            break;
        case '18KY':
            $metal_value = '18k Yellow Gold';
            break;
        case '18KW':
            $metal_value = '18k White Gold';
            break;
        case 'PDIUM':
            $metal_value = 'Palladium';
            break;
        case 'PLAT':
            $metal_value = 'Platinum';
            break;
        default :
            $metal_value = $metals;
            break;
        }
        return $metal_value;
    }
	function getShapeName($string) {
		$st = unrings_diamond_shape($string);
		$str = strtolower( view_shape_value($shapeimg, $st) );
		return $str;
	}
	//// get center stond shapes
	function getCenterStoneShape($st) {
		$str = explode(",", $st);
		$shape = array();
		
		if(is_array($str)) {
		foreach($str as $sring) {
		$st_str = explode('/', $sring);
		$shapname = getShapeName(isset($st_str[1])?$st_str[1]:'');
			if(in_array($shapname, $shape)) 
			{
				continue;
			} 
					else 
					{
						$shape[] = $shapname;	
					}
				}
			} else { 
			$st_str = explode('/', $st);			
			$shape[] = getShapeName($st_str[1]);
		}
		return $shape;
	}
	//// get payment method
	function getPaymentMethod($method='') {
		
		switch($method) {
			case 'payment_card':
				$rt_method = 'PAY ONLINE WITH A CREDIT CARD';
			break;
			case 'payment_bankwire':
				$rt_method = 'PAY WITH A BANK WIRE';
			break;
			case 'payment_byphone':
				$rt_method = 'PAY BY TELEPHONE';
			break;
			case 'getfianancing':
				$rt_method = 'PAY BY GETFINANCING';
			break;
			default:
				$rt_method = 'PAY BY TELEPHONE';
			break;
		}
		return $rt_method;
	}
	//////// user account menu
	function user_account_menu() {
		$accunt_menu = '<li><a href="'.SITE_URL.'account/myaccount">Orders</a></li>
			<li><a href="'.SITE_URL.'account/order_returns">Returns</a></li>
			<li><a href="'.SITE_URL.'wishlist">Wish list</a></li>
			<li><a href="'.SITE_URL.'account/diamond_compare">Diamond Comparison</a></li>
			<li><a href="'.SITE_URL.'account/address_book">Address Book</a></li>
			<li><a href="'.SITE_URL.'account/account_setting">Account Settings</a></li>
			<li><a href="'.SITE_URL.'account/account_payment">Payment</a></li>';
		return $accunt_menu;
	}
	function clean_string($string) {
		//$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
		//$string = preg_replace('/-+/', '-', $string);
		$clear = trim(preg_replace('/ +/', ' ', preg_replace('/[^A-Za-z0-9 ]/', ' ', urldecode(html_entity_decode(strip_tags($string))))));
		
		return strip_tags($clear); // Replaces multiple hyphens with single one.
	}
	///// 
	function check_diamond_page() {
		$CI = & get_instance();
		$mt = $CI->router->fetch_method();
		$clas = $CI->router->fetch_class();
		$claslist = array('diamonds', 'diamondslist');
		//$method_list = array('choose_urdiamond','build_diamond_pendant','build_owndiamond_pendant','pendants_detail' );
		$method_list = array('search' );
                 
		if( ( !in_array($clas, $claslist) || $mt == 'index' ) && !in_array($mt, $method_list) )
		{
			return true;
		}
		return false;
	}
	
	/////// count cart item
	function count_cart_item() {
		$CI = & get_instance();
		//$CI->locad->model('cartmodel');
		$cartItems = 0;
		
		$total_item = $CI->cartmodel->getitemsbysessionid();
		$cartItems = ( ( isset($total_item) && count($total_item) ) > 0 ? count($total_item) : 0 );
		
		return '('.$cartItems.')';		
	}
	
	////// get the sites title
	function get_site_title($field_name='sites_title') {
		$CI = & get_instance();
		$CI->load->model('commonmodel');
		$sites_title = $CI->commonmodel->getAdminProfileSetting();
		
		return ( !empty($sites_title[$field_name]) ? $sites_title[$field_name] : getadmin_contact_info($field_name) );
	}
	
	function welcome_note_title() {
		$welcome = ( get_site_title('sites_title') != '' ? get_site_title('sites_title') : 'Jewelercart.com 5.0 7 day Trial version' );
		return $welcome;
	}
	
	//// get admin contact info
	function getadmin_contact_info($field_name='sites_title') {
		$CI = & get_instance();
		$CI->load->model('commonmodel');
		$rowuser = $CI->commonmodel->getMainAdminProfileDetail();	
		
		return $rowuser[$field_name];
	}
	
	
	//// get site contact info
	function get_site_contact_info($field_name='company_name') {
		$CI = & get_instance();
		$CI->load->model('commonmodel');
		$rowuser = $CI->commonmodel->getMainSiteDetail();	
		
		return $rowuser[$field_name];
	}
	
	
	//// get admin dashboard title
	/*function getadmin_dashboard_title() {	
		
		return ( get_site_title('dashboard_title') != 'SITES TITLE' ? get_site_title('dashboard_title') : getadmin_contact_info('dashboard_title') );
	}*/
	
	//// get sales tax city / country
	function getSalesTaxCount($percent='') {
		$salestax_count = getadmin_contact_info('salestax_city');
		if( empty($percent) ) {
			$salesTaxCountValue = ( !empty($salestax_count) ? $salestax_count : 'California' );
		} else {
			$salestax_percent = getadmin_contact_info('salestax_percent');
			$salesTaxCountValue = ( !empty($salestax_percent) ? $salestax_percent : 10 );
		}
		
		return $salesTaxCountValue;
	}
	
	///////// custom helper code///// get totla dimanond count
	function get_diamond_count($spstones) {
		$spst = explode(',',$spstones);
		$ck_countar = ( is_array($spst) ? $spst[0] : $spstones );
		$dm_count = explode('-', $ck_countar);
		$view_count = isset($dm_count[0])?$dm_count[0]:0+1;
		
		return $view_count;
	}
	
	//// get trial user logo image
	function get_trial_user_logo($width='') {
		$headerLogo = '';
		  /* if( getimagesize( SITE_URL.'uploads/'.get_site_title('sites_logo') ) ){
			  $logoImageUrl = '<img src="'.SITE_URL.'uploads/'.get_site_title('sites_logo').'" width="'.$width.'" alt="'.get_site_title().'">';
		  } else if( getimagesize( SITE_URL.'uploads/'.getadmin_contact_info('sites_logo') ) &&  count_trial_user_days() == 0 ){
			  $logoImageUrl = '<img src="'.SITE_URL.'uploads/'.getadmin_contact_info('sites_logo').'" width="'.$width.'" alt="'.getadmin_contact_info().'">';
		  }else {
			   $logoImageUrl = '<div class="setcomp_name">'.get_site_title('company_name').'</div>';
		  }	 */
		  $logoImageUrl = '<div class="setcomp_name">'.get_site_title('company_name').'</div>';
		  return $logoImageUrl;
	}
	
	////// generate order No.
	function generate_order_id($id) {
		
		if($id >= 1 && $id < 10) {
			$return_no = '100'.$id;
		} elseif($id >= 10 && $id < 100) {
			$return_no = '10'.$id;
		} elseif($id >= 100 && $id < 999) {
			$return_no = '1'.$id;
		} elseif($id > 999) {
			$return_no = $id;
		} else {
			$return_no = 1001;
		}
		return $return_no;
	}
	
	///// count trial days
	function count_trial_user_days() {
		$getsIP = get_client_ip_server();
		$CI = & get_instance();
		
		$sql = "SELECT datediff(`trial_exp_date`, CURDATE()) remaining_days from dev_user WHERE `trial_exp_date` >= CURDATE() AND system_ipadres = '".$getsIP."' ORDER BY id DESC LIMIT 1";
		$query = $CI->db->query($sql);
		$row = $query->result_array();
		$rtDays = isset($row[0]['remaining_days'])?$row[0]['remaining_days']:'';
		
		return ((isset($rtDays) && !empty($rtDays) && $rtDays > 0 ) ? $rtDays : 0 );
	}
	
	function getWatchIdType($id=1) {
		
		switch($id) {
			case 1:
				$id_type = 'ASIN';
			break;
			case 2:
				$id_type = 'ISBN';
			break;
			case 3:
				$id_type = 'UPC(12)';
			break;
			case 4:
				$id_type = 'EAN(13)';
			break;
			default:
				$id_type = 'ASIN';
			break;
		}
		return $id_type;
	}
	
	function watchCaseValue($case_id='ss') {
		$case_array = array('ss' => 'Stainless Steel',
							'gold_ss' => 'Stainless Steel and Gold',
							'gold' => 'Gold',
							'Plastic' => 'Plastic',
							'Resin' => 'Resin',
							'other' => 'Other'
							);
							
		return $case_array[$case_id];	
	}

    /* get main category list */
	function getMainMenuCateList() {
		$cates_list = '';
		/* $CI = & get_instance();
		$results_cate = $CI->Catemodel->getMainCategory();
		$cate_idlist = array(7,59,63,66,67,69,71,73,74);
		$cates_list = '';
		foreach($results_cate as $caterow) {
			if( in_array($caterow['id'], $cate_idlist) ) {
				$cates_list .= '<li><a href="'.SITE_URL.'rings/ringsMainCategory/'.$caterow['id'].'">'.$caterow['catname'].'</a></li>';
			}
		} */
		$cates_list .= '<li><a href="'.SITE_URL.'rings/ringsMainCategory/901">Engagement Rings</a></li>
		<li><a href="'.SITE_URL.'rings/ringsMainCategory/902">Wedding Bands</a></li>
		<li><a href="'.SITE_URL.'rings/ringsMainCategory/903">Mens Wedding Bands</a></li>
		<li><a href="'.SITE_URL.'rings/ringsMainCategory/904">Tennis Bracelet</a></li>
		<li><a href="'.SITE_URL.'rings/ringsMainCategory/905">Diamond Stud Earrings</a></li>
		<li><a href="'.SITE_URL.'rings/ringsMainCategory/906">Fashion Rings</a></li>
		<li><a href="'.SITE_URL.'rings/ringsMainCategory/907">Diamond Hoop Earrings</a></li>
		<li><a href="'.SITE_URL.'rings/ringsMainCategory/908">Eternity Bands</a></li>
		<li><a href="'.SITE_URL.'rings/ringsMainCategory/909">Diamond Wedding Bands</a></li>
		<li><a href="'.SITE_URL.'rings/ringsMainCategory/910">Stackable Rings</a></li>
		<li><a href="'.SITE_URL.'rings/ringsMainCategory/911">Mens Diamond Wedding Bands</a></li>
		<li><a href="'.SITE_URL.'rings/ringsMainCategory/912">Diamonds</a></li>
		<li><a href="'.SITE_URL.'rings/ringsMainCategory/913">Lab Diamonds</a></li>';

		return $cates_list;
	}

	///// check wholesalre login
	function check_whuser_login() 
	{
		$CI = & get_instance();
		$wh_user_id = $CI->session->userdata('wh_user_id');
		$mt = $CI->router->fetch_method();
		$allowed_method = array('account_login', 'index', 'addtoshoppingcart');
		
		if( !in_array($mt, $allowed_method) ) {
			if( empty($wh_user_id) ) {
				header('Location:'.SITE_URL.'Affiliate/account_login');	
			}
		}
	}
	
	///// set date formate
	function _df($date='0000-00-00') {
		return date('d/m/Y', strtotime($date));
	}
	
    //// get order status
    function getOrderStatus($order_status='') {
        switch ($order_status) {
            case 'IN' :
                $status = 'In Process';
                break;
            case 'MF' :
                $status = 'In Manufacturing';
                break;
            case 'SH' :
                $status = 'Shipped';
                break;
            default :
                $status = $order_status;
                break;
        }
        return $status;
    }
	
	//// payment method
	function getPaymntMode($id='') {
		$pm = array('payment_card'=>'Paypal','payment_bankwire'=>'Bank Wire','payment_byphone'=>'By Telephone');;
		return ( $id == '' ? $pm : $pm[$id] );
	}
	
	/////// get order status
	function getOrdrStatus($id='') {
		$orderSt = array('IN'=>'In Process','MF'=>'In Manufacturing','SH'=>'Shipped');
		return ( $id == '' ? $orderSt : $orderSt[$id] );
	}
	
	/////// get payment status
	function getPaymntStatus($id='') {
		$paymentSt = array('PD'=>'Paid','NP'=>'Not Paid');
		return ( $id == '' ? $paymentSt : $paymentSt[$id] );
	}
	
	///// get unique random number
	function uniqueRandomeNumber($min=10, $max=99, $quantity=4) {
		$numbers = range($min, $max);
		shuffle($numbers);
		$arnumber = array_slice($numbers, 0, $quantity);
		
		return implode('', $arnumber);
	}
	
	////// upload file
	//// upload file
	function upload_file($field, $hint='showth', $ar=array('shows', 'upload_img', 'id', '0'), $path='uploads/') {
		$rd = rand(99,999);
		$fileName = '';
		$CI = & get_instance();
		
		//$this->load->model('section_adminmodel','section_model');
		
		$tableName 	  = $ar[0];
		$updatedField = $ar[1];
		$pkID 		  = $ar[2];
		$id_value     = $ar[3];
		
		if($_FILES[$field]['name'] != '') {
			$fileName = $id_value.'_'.$hint.'_'.$_FILES[$field]['name'];
			
			//// deleted old uploaded file
			$row_list = getTablRowLine($id_value, $tableName);
			if( !empty($row_list[$updatedField]) ) {
				unlink($path.$row_list[$updatedField]);
			}
			
			$sql = "UPDATE " . $CI->config->item('table_perfix') . "$tableName set $updatedField = '".$fileName."' WHERE $pkID = '".$id_value."'";
			$result = $CI->db->query($sql);
			
			move_uploaded_file($_FILES[$field]['tmp_name'], $path.$fileName);
		}
		return $fileName;
	}
	
	function check_post_field($post_field, $db_vlaue) {
		$psfield = isset($_POST[$post_field])?$_POST[$post_field]:'';
		
		return ( !empty($psfield) ? $psfield : $db_vlaue );
	}
	
	function getTablRowLine($id='', $table='shows')
	{
		$CI = & get_instance();
		$qry = "SELECT *
				FROM ".config_item('table_perfix')."$table WHERE id = '".$id."' ORDER BY id DESC LIMIT 1";
		$return = 	$CI->db->query($qry);
		$result = $return->result_array();	
		return isset($result) ? $result[0] : false;
	}
	
	///////
	function setDate($dt='0000-00-00') {
		return mdate("%Y-%d-%m", strtotime($dt));
	}
        
    function cleanString($text) {
    $utf8 = array(
        '/[áàâãªä]/u'   =>   'a',
        '/[\C3?ÀÂÃÄ]/u'    =>   'A',
        '/[\C3?ÌÎ\C3?]/u'     =>   'I',
        '/[íìîï]/u'     =>   'i',
        '/[éèêë]/u'     =>   'e',
        '/[ÉÈÊË]/u'     =>   'E',
        '/[óòôõºö]/u'   =>   'o',
        '/[ÓÒÔÕÖ]/u'    =>   'O',
        '/[úùûü]/u'     =>   'u',
        '/[ÚÙÛÜ]/u'     =>   'U',
        '/ç/'           =>   'c',
        '/Ç/'           =>   'C',
        '/ñ/'           =>   'n',
        '/Ñ/'           =>   'N',
        '/–/'           =>   '-', // UTF-8 hyphen to "normal" hyphen
        '/[’‘‹›‚]/u'    =>   ' ', // Literally a single quote
        '/[“\E2\80?«»„]/u'    =>   ' ', // Double quote
        '/ /'           =>   ' ', // nonbreaking space (equiv. to 0x160)
    );
    return preg_replace(array_keys($utf8), array_values($utf8), $text);
}
///// qulaity category list
function qualityCate($cate='') {
    switch ($cate) {
        case 1:
            $cateName = 'Bridal 2015-2016';
        break;
        case 2:
            $cateName = 'Bridal Colorful Bands 2014';
        break;
        default :
            $cateName = '';
        break;
    }
    return $cateName;
}
function get_var($fd) {
		$field_vl = '';
		
		if(isset($_GET[$fd]) && !empty($_GET[$fd])) {
			$field_vl = $_GET[$fd];
		}		
		return $field_vl;
	}
///// set category and rings page baner
function rings_page_baner($imagename='', $title='') {
    $catebaners = SITE_URL.'img/banners/'.setSlugTitle($imagename).'.jpg';
    $cateTitle = ( empty($title) ? $imagename : $title );
    $setimgview = '';
    
    if(getimagesize($catebaners)) {
        $setimgview .= '<div class="mainpg1_baner"><img src="'.$catebaners.'" alt="'.$cateTitle.'"></div>';
    }
    return $setimgview;
}
//// reset diamond filters
function reset_diamond_filters($search='') {
    $array_items = array(
                //'shape' => '',
                'depthmin' => '',
                'shape' => '',
                'depthmax' => '',
                'tablemin' => '',
                'tablemax' => '',
                'cutmin' => '',
                'cutmax' => '',
                'colormin' => '',
                'colormax' => '',
                'fluromin' => '',
                'fluromax' => '',
                'polismin' => '',
                'polismax' => '',
                'symmetmin' => '',
                'symmetmax' => '',
                'pricePerCaratmin' => '',
                'pricePerCaratmax' => '',
                'caratmin' => '',
                'caratmax' => '',
                'claritymin' => '',
                'claritymax' => '',
                'mydiamond' => '',
                'searchminprice' => '',
                'searchmaxprice' => '',
                'length' => '',
                'width' => '',
                'backs_page' => '',
                'last_pgno' => '',
                'diamnd_listid' => '',
                'curr_pageno' => '',
                'grid_pageno' => '',
                'filter_page' => '',        
                'cut_value' => '',
                'clarity_value' => '',
                'color_value' => '',
                'polish_value' => '',
                'symtry_value' => '',
                'flour_name' => '',
                'default_metal' => '',
                'default_ringsize' => '',
                'ispremium' => false);
    
    $CI = & get_instance();
    $CI->session->unset_userdata($array_items);

        return true;
}

//// get stuller img
function getStullerImage($row=array()) {
    if( !empty($row['GroupImage1']) ) {
        $viewRingImg = $row['GroupImage1'];
    } elseif( !empty($row['Image1']) ) {
        $viewRingImg = $row['Image1'];
    } else {
        $stulerImage = ( !empty($row['Images']) ? json_decode($row['Images']) : json_decode($row['GroupImages']) );
        $viewRingImg = $stulerImage[0]->FullUrl; //$rows_rings['Image1'];
    }
    return $viewRingImg;
}

///// set sales tax in total order amount
function getSalesTeaxPercent($country='') {
    $CI = & get_instance();
    $salesTaxPercnt = 0;
    if( !empty($country) ) {
        $salesTaxPercnt = ( $country === getSalesTaxCount() ? getSalesTaxCount('sales_tax_percent') : 0 );
    }
        $CI->session->set_userdata('sales_tax_percent',$salesTaxPercnt);
        
    return $salesTaxPercnt;
}

//// calculate sales tax amount
function getSalesTaxAmount($total=0, $percent=0) {
    $amount['taxamount'] = $total * ( $percent / 100 );   /// calculate tax amount
    $amount['total_amount'] = $total + $amount['taxamount'];
    return $amount;
}
///// retial custom left menu
function retail_left_menu() {
    $cate_listings = array( 'Engagement Rings' => array(
    39 => 'Antique',
    8 => 'Fancy',
    40 => 'Halo',
    49 => 'Petite',
    9 => 'Semi Mount',
    52 => 'Solitaires',
    56 => 'Three Stones',
),  
    'Wedding Bands' => array(
    91 => 'Baguette',
    119 => 'Combinations',
    117 => 'Emerald',
    118 => 'Marquise',
    116 => 'Oval',
    111 => 'Princess',
    110 => 'Round'
),
    'Eternity Wedding Bands' => array(
        68 => 'Round',
        85 => 'Combinations',
        84 => 'Emerald/ Baquette',
        188 => 'Marquise',
        187 => 'Oval',
        186 => 'Princess'
    ),
    'Engagement Sets' => array(
        169 => 'Antique',
        182 => 'Engraved Collection',
        139 => 'Fancy',
        170 => 'Halo',
        140 => 'Semi Mount',
        128 => 'Solitaires',
        121 => 'Three Stones'
    ),
    'Wedding Band Sets' => array(
        191 => 'Baguette',
        190 => 'Princess',
        189 => 'Round'
    )
    );
    
    $viewleft_listing = '';
            $i = 1;
            
            foreach( $cate_listings as $main_listing => $sublisting ) 
            {
                $viewleft_listing .= '<li class="scurrent">
                    <a href="" onmouseout="mclosetime()" onmouseover="mopen(\'smoothmenu'.$i.'\');" title="Diamond Engagement Ring Sets">'.$main_listing.'</a>';
            $viewleft_listing .= '<div id="smoothmenu'.$i.'" onmouseout="mclosetime()" onmouseover="mcancelclosetime()" class="show-submenu" style="visibility: hidden;"><ul>';
            foreach( $sublisting as $subid => $subtitle ) {
                $detail_link = SITE_URL . 'testengagementrings/engagementrings/'.$subid;
                $viewleft_listing .= '<li><a href="'.$detail_link.'" title="'.$subtitle.'">'.$subtitle.'</a></li>';
            }            
            
        $viewleft_listing .= '</ul></div>';
            
        $viewleft_listing .= '</li>';
       
        $i++; 
    }
    $stullerCategory = stuller_cate_list(); /// stuller category list is store in an array
    
    $viewleft_listing .= '<li class="scurrent">
                    <a href="" onmouseout="mclosetime()" onmouseover="mopen(\'smoothmenu6\');" title="Stuller Gold Rings">Stuller Gold Rings</a>';
            $viewleft_listing .= '<div id="smoothmenu6" onmouseout="mclosetime()" onmouseover="mcancelclosetime()" class="show-submenu" style="visibility: hidden;"><ul>';
            
    foreach($stullerCategory as $caterow) 
    {
        $viewleft_listing .= '<li><a href="'.SITE_URL.'stullerygoldrings/stuller_ring_listings/?cate='.setSlugTitle($caterow).'">'.$caterow.'</a></li>';
    }
    $viewleft_listing .= '</ul></div></li>';
    
    return $viewleft_listing;
}

///// david stern collection left menu
function davidstern_left_menu($cate_id=0) {
    $CI = & get_instance();
    $CI->load->model('davidsternmodel');
    
    $main_cate = $CI->davidsternmodel->getCateList(); /// query in davidsternmodel
    $parent_id = $CI->davidsternmodel->getParentCateID( $cate_id ); /// category parent id
    $sparent_id = $CI->davidsternmodel->getParentCateID( $parent_id ); /// category another parent id
    $not_shown_id = array(1, 501, 502, 503);
    
    $viewleft_listing = '';
            $i = 1;
            
            foreach( $main_cate as $rowcate ) 
            {
              if( !in_array($rowcate['id'], $not_shown_id) ) {
                $id_list = array($cate_id, $parent_id, $sparent_id);
                $details_link = SITE_URL . 'davidsternrings/stern_collection_cate/'.$rowcate['id'];
                $setBlock = ( in_array($rowcate['id'], $id_list) ? 'style="display:block;"' : 'style="display:none;"' );
                $viewleft_listing .= '<li><a href="'.$details_link.'" title="'.$rowcate['cate_name'].'">'.$rowcate['cate_name'].'</a>';
            $viewleft_listing .= '<div '.$setBlock.'><ul>';
            
            $substern_cate = $CI->davidsternmodel->getCateList( $rowcate['id'] );
            
            foreach( $substern_cate as $subid ) {
                $detail_link = SITE_URL . 'davidsternrings/stern_collection_cate/'.$subid['id'];
                $check_product = $CI->davidsternmodel->checkProductList( $subid['id'] );
                if( $check_product > 0 && $subid['id'] != 36 ) {
                $viewleft_listing .= '<li><a href="'.$detail_link.'" title="'.$subid['cate_name'].'">'.$subid['cate_name'].'</a>';
                
                $child_cate = $CI->davidsternmodel->getCateList( $subid['id'] );
                
                if( count($child_cate) > 0 ) {
                    $setsBlock = ( in_array($subid['id'], $id_list) ? 'style="display:block;"' : 'style="display:none;"' );
                    
                    $viewleft_listing .= '<div '.$setsBlock.'><ul>';
                    foreach( $child_cate as $childrow ) {
                        $check_prod = $CI->davidsternmodel->sternProductDetail( 0, $childrow['id'], '' );
                        if( count($check_prod) > 0 ) {  /// if product found then display following category
                            $details_link = SITE_URL . 'davidsternrings/stern_collection_cate/'.$childrow['id'];
                            $viewleft_listing .= '<li><a href="'.$details_link.'" title="'.$childrow['cate_name'].'">'.$childrow['cate_name'].'</a></li>';
                        }
                        
                    } /// end child category foreach
                     $viewleft_listing .= '</ul></div>';
                }
                
                $viewleft_listing .= '</li>';
              }   //// end subcategory check product list if
            }  //// end sub category foreach         
            
        $viewleft_listing .= '</ul></div>';
            
        $viewleft_listing .= '</li>';
       
        $i++; 
      } //// end if after foreach loop
    } /// end main foreach loop
    
    return $viewleft_listing;
}

//// check test engagement class to apply container in page content
function setContainer($check='') {
    $CI = & get_instance();
    $checkclass = $CI->router->fetch_class();
    $mt = $CI->router->fetch_method();
    $classlist = array('testengagementrings', 'qualitygoldrings', 'stullerygoldrings', 'davidsternrings', 'braceletsection');
    $methodlist = array('diamond_detail');
    
    $div = '';
    
    if( !in_array($checkclass, $classlist) && !in_array($mt, $methodlist) ) {
        $div = ( empty($check) ? '<div class="container main_wraper">' : '</div>' );
    }
    
    
    return $div;
}

//// get left menu reviews
function left_menu_reviews() {
    $CI = & get_instance();
    
    $pagecontant = file_get_contents(SITE_URL.'stullerygoldrings/productReviews');  /// stuller ring controller
    
    return $pagecontant;  
    
}

function getYelpView() {
    $yelpview = '<br>
                <div class="rateabiz-logo-container" align="center"> 
                    <a href="http://www.yelp.com/biz/david-stern-fine-jewelry-and-jewelry-appraisers-boca-raton" target="_blank">
                        <img src="'.DEMO_RETAIL_URL.'leftmenu/img/yelp_icon.png" alt="" width="208" /> <br><br>
                    <img src="'.DEMO_RETAIL_URL.'leftmenu/img/yelpstars_ic.png" alt="" /> 
                    </a>
                    <br><br>
                </div>';
    
    return $yelpview;
}

////// set diamond search filters box
function viewFilterBoxOptions($cutlist=array(), $mainblock='cutfilter_block', $active_class='activecutbox', $sess_var='cut_value') {
    $cutview = '';
    $c = 1;
    $two_diamension_aray = array('cutfilter_block', 'polish_block', 'symtry_block', 'flour_block');
    
    if( in_array($mainblock, $two_diamension_aray) ) {
        foreach( $cutlist as $cutkey => $cutvalue ) {
            $cutactive = ( $c == 1 ? $active_class : '' );

            $cutview .= '<div class="cutboxs '.$cutactive.'" id="'.$cutkey.'" onclick="setRectangleBox(\''.$cutkey.'\', \''.$mainblock.'\', \''.$active_class.'\', \''.$sess_var.'\')">'.$cutvalue.'</div>';

            $c++;
        }
    } else {
       foreach( $cutlist as $field_key ) {
            $cutactive = ( $c == 1 ? $active_class : '' );
            $keyvalue = ( $mainblock == 'colrblock' ? str_replace('color_', '', $field_key) : $field_key );

            $cutview .= '<div class="cutboxs '.$cutactive.'" id="'.$field_key.'" onclick="setRectangleBox(\''.$field_key.'\', \''.$mainblock.'\', \''.$active_class.'\', \''.$sess_var.'\')">'.$keyvalue.'</div>';

            $c++;
        } 
    }
    
    return $cutview;
}

//// return filter value
function getFilterValues($strvalue='') {
    $rplace = array('color_', 'polish_', 'symmtry_', 'flour_');
    $str = str_replace($rplace, '', $strvalue);

    $getstr = explode('.', $str);
    $getstr = array_filter($getstr);
    $finalstr = '';
    
    if( !empty($getstr) ) {
        $finalstr = "'".implode("','", $getstr)."'";
    }
    
    return $finalstr;
    
}

//// page numbering label hint
function page_number_hint($perpage=20, $total_records=0, $startfrom=0) {
    $totalOf = ( $perpage < $total_records ? $perpage : $total_records );
    $startTo = ( $totalOf > $startfrom ? $totalOf : ( $startfrom + $perpage ) );
    $start_to = ( $startTo > $total_records ? $total_records : $startTo );
    $start_from = ( $startfrom > 1 ? ( $startfrom + 1 ) : $startfrom );
    
    return ( 'Items '.$start_from.' to '.$start_to.' of '.$total_records.' Total' );
    
}

//// jewelry category name
function jewelry_cate_name($cid) {
    switch($cid) {
        case 3292598018:
            $category= 'Rings';
        break;
        case 3292601018:
            $category= 'Earings';
        break;
        case 3292603018:
            $category= 'Pendants';
        break;
        case 3292605018:
            $category= 'Necklaces';
        break;
        case 3292607018:
            $category= 'Braclets';
        break;
        default:
            $category= 'Jewelry';
        break;
    }
    return $category;
}

///// david stern collection filter by link
function david_stern_filter_link() {
    $filer_link = '<li><a href="'.SITE_URL.'heartdiamond/heart_collection_listing/740520027">Rings</a></li>
                    <li><a href="'.SITE_URL.'heartdiamond/heart_collection_listing/740520028">Rings and Bands</a></li>
                    <li><a href="'.SITE_URL.'heartdiamond/heart_collection_listing/740520029">Earrings</a></li>
                    <li><a href="'.SITE_URL.'heartdiamond/heart_collection_listing/740520030">Wedding Bands</a></li>
                    <li><a href="#"></a></li>';
    
    return $filer_link;
}

///// generate the n lenght digits numbers
function getRandowNumber($len=4) {
    $numb = '';
    
    for($i=1; $i <= $len; $i++ ) {
        $numb .= rand(0, 9);
    }
    
    return $numb;
}

//// get gender value
function getGenderValue($gender='') {
    switch ($gender) {
        case 'F':
        case 'W':
            $gender_value = 'Women\'s';
        break;
        case 'M':
            $gender_value = 'Men\'s';
        break;
        case 'U':
            $gender_value = 'Unisex';
        break;
        case 'C':
            $gender_value = 'Children';
        break;
        case 'E':
            $gender_value = 'Estate';
        break;
        case 'D':
            $gender_value = 'Designers';
        break;
        case 'R':
            $gender_value = 'Religious';
        break;
        case 'CH':
            $gender_value = 'Charms';
        break;
        case 'CL':
            $gender_value = 'Clearance';
        break;
        case 'S':
            $gender_value = 'Services';
        break;
        case 'CS':
            $gender_value = 'Colored Gemstones';
        break;
    default :
         $gender_value = 'Men\'s';
        break;
    }
    
    return $gender_value;
}

///// get carat margin to set and highlight the circle
function getCaratMargin($carat_value=0) {
    $more_margin = ( ($carat_value > 0.75 && $carat_value <= 1) ? -1.10 : ($carat_value >= 1.25 ? 5.9 : 5.5) );
    $carat_digit = ( ( ( ( $carat_value / 0.25 ) - 1 ) * 9 ) + $more_margin );

    if( $carat_value < 0.25) {
        $margin_value = '2.8em';
    } elseif( $carat_value >= 1.5 && $carat_value < 1.75 ) {
        $margin_value = ( $carat_digit + 0.4 ) . 'em';
    } elseif( $carat_value >= 1.75 && $carat_value < 2 ) {
        $margin_value = ( $carat_digit + 0.6 ) . 'em';
    } elseif( $carat_value > 2) {
        $margin_value = '73em';
    } elseif( $carat_value == 2) {
        $margin_value = '69.8em';
    } else {
        $margin_value = $carat_digit.'em';
    }
    
    return $margin_value;
}

function getCaratMargin2($carat_value=0) {
    $more_margin = ( ($carat_value > 0.75 && $carat_value <= 1) ? -1.10 : ($carat_value >= 1.25 ? 5.9 : 5.5) );
    $carat_digit = ( ( ( ( $carat_value / 0.25 ) - 1 ) * 9 ) + $more_margin );

    if( $carat_value < 0.24) {
        $margin_value = '0em';
    } elseif( $carat_value >= 0.25 && $carat_value < 0.50 ) {
        $margin_value = ( $carat_digit - 5.3 ) . 'em';
    }elseif( $carat_value >= 0.51 && $carat_value < 0.75 ) {
        $margin_value = ( $carat_digit - 6.3 ) . 'em';
    }elseif( $carat_value == 1.00) {
        $margin_value = '25em';
    } elseif( $carat_value >= 1.01 && $carat_value < 1.49 ) {
        $margin_value = ( $carat_digit - 7.6 ) . 'em';
    } elseif( $carat_value >= 1.50 && $carat_value < 1.75 ) {
        $margin_value = ( $carat_digit - 9.6 ) . 'em';
    } elseif( $carat_value >= 1.76 && $carat_value < 2 ) {
        $margin_value = ( $carat_digit + 0.6 ) . 'em';
    } elseif( $carat_value > 2) {
        $margin_value = '61em';
    } elseif( $carat_value == 2) {
        $margin_value = '57.5em';
    } else {
        $margin_value = ($carat_digit) .'em';
    }
    
    return $margin_value;
}

/// set unique price markup maring
/*
 * 7   -> Engagement Rings
 * 66  -> Engagement Sets
 * 65  -> Three Stone Rings
 * 74  -> Mens rings
 */
function setUniquePriceMarkup($cid=0) {
    $cate_id = array(7, 65, 74);
    $price_markup = 0;
    
    if( $cid == 66 ) {
        $price_markup = 1500;
    } else if( in_array($cid, $cate_id) ) {
        $price_markup = PRICE_MARKUP;
    }
    
    return $price_markup;
}

//// quality list
function stuller_quality_list() {
    return array('14kt Rose', '14kt White', '14kt Yellow', '18kt White', 'Platinum');
}

function get_pagination_links($perpage=0, $total=0, $pageLink='', $sort='ASC') {
    $CI = & get_instance();
    
    $config["per_page"] = $perpage;
    $config["num_links"] = 5;
    $config["uri_segment"] = 10;
    $config['use_page_numbers'] = TRUE;

    $config["total_rows"] = $total;
    $config["base_url"]   = SITE_URL.$pageLink.'?pagelist='.$config["per_page"].'&sort='.$sort;
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li><a class="active" href="#">';
    $config['cur_tag_close'] = '</a></li>';
    
    $CI->pagination->initialize($config); ///// initializ the pagination
    $page_links   = $CI->pagination->create_links();
    
    return $page_links;
    
}

//// calculate saving percent
    function calc_save_percent($price=0) {
        $retailPrice = $price * PRICE_PERCENT;
        return ( 100 - _nf( ( ( $price / $retailPrice ) * 100 ), 2) );
    }
    
 //// get product title
function cate_title_set($c_id='', $title='') {
    switch ($c_id) {
        case 2067:
            $return['cate_title'] = 'Jewelry $1500 & Under';
            $return['category_id'] = 2067;
            break;
        case 1531:
            $return['cate_title'] = 'Jewelry $500 & Under';
            $return['category_id'] = 1531;
            break;
        default:
            $return['cate_title'] = $title;
            $return['category_id'] = 0;
            break;
    }
    return $return;
}
function viewDmShapes($shap='') 
{
    if( $shap == '') { return false;}
 
    $shapes = trim($shap);

    switch($shapes) {
        case 'AS':
            $shap_name = 'Asscher';
        break;
        case 'C':
        case 'CU':
            $shap_name = 'Cushion';
        break;
        case 'E':
            $shap_name = 'Emerald';
        break;
        case 'H':
            $shap_name = 'Heart';
        break;
        case 'M':
            $shap_name = 'Marquise';
        break;
        case 'O':
            $shap_name = 'Oval';
        break;
        case 'PR':
            $shap_name = 'Princess';
        break;
        case 'P':
            $shap_name = 'Pear';
        break;
        case 'R':
        case 'RAD':
            $shap_name = 'Radiant';
        break;
        case 'B':
            $shap_name = 'Round';
        break;
        case 'BRIOLETTE':
            $shap_name = 'BRIOLETTE';
        break;
        case 'Shield':
            $shap_name = 'Shield';
        break;
        case 'T':
            $shap_name = 'Trilliant';
        break;
        default :
            $shap_name = 'Round';
        break;
    }
    return $shap_name;
}
function getColorValue($colrs='') {
        if ($colrs == 'D') {
            $color = $colrs . ' (colorless)';
        } elseif ($colrs == 'E') {
            $color = $colrs . ' (colorless)';
        } elseif ($colrs == 'F') {
            $color = $colrs . ' (colorless)';
        } elseif ($colrs == 'G') {
            $color = $colrs . ' (very white)';
        } elseif ($colrs == 'H') {
            $color = $colrs . ' (white)';
        } elseif ($colrs == 'I') {
            $color = $colrs . ' (white)';
        } elseif ($colrs == 'J') {
            $color = $colrs . ' (white face up)';
        } else {
            $color = $colrs;
        }
        return $color;
    }
    function getClarityRange($clarity='') {
        if ($clarity == 'SI1' || $clarity == 'SI2') {
            $clarityRange = $clarity . ' (clean to the naked eye)';
        }
        if ($clarity == 'FL' || $clarity == 'IF') {
            if ($clarity == 'IF') {
                $clarityRange = $clarity . ' (internally flawless)';
            } else {
                $clarityRange = $clarity . ' (flawless)';
            }
        }
        if ($clarity == 'VS1' || $clarity == 'VS2') {
            $clarityRange = $clarity . ' (very clean under 10x magnification; clean to the naked eye)';
        }
        if ($clarity == 'VVS1' || $clarity == 'VVS2') {
            $clarityRange = $clarity . ' (completely clean under 10x magnification; clean to the naked eye)';
        }
        if ($clarity == 'I1' || $clarity == 'I3') {
            $clarityRange = $clarity;
        }
        if ($clarity == 'SI3') {
            $clarityRange = $clarity;
        }
        if (empty($clarityRange)) {
            $clarityRange = $clarity;
        }
        return $clarityRange;
    }
    // get carat range
    function getCaratRange($carat=0) {
        if ($carat <= '0.29') {
            $caratRange = ' 0.29 &amp; Under';
        }
        if ($carat >= '0.30' && $carat <= '0.45') {
            $caratRange = ' 0.30 - 0.45';
        }
        if ($carat >= '0.46' && $carat <= '0.69') {
            $caratRange = ' 0.46 - 0.69';
        }
        if ($carat >= '0.70' && $carat <= '0.89') {
            $caratRange = ' 0.70 - 0.89';
        }
        if ($carat >= '0.90' && $carat <= '1.39') {
            $caratRange = ' 0.90 - 1.39';
        }
        if ($carat >= '1.40' && $carat <= '1.79') {
            $caratRange = ' 1.40 - 1.79';
        }
        if ($carat >= '1.80' && $carat <= '2.79') {
            $caratRange = ' 1.80 - 2.79';
        }
        if ($carat >= '2.80') {
            $caratRange = ' 2.80 &amp; Larger';
        }
        return $caratRange;
    }
    function replace_and($description='') {
       $desc = str_replace('&', 'and', $description);
       
       return $desc;
   }

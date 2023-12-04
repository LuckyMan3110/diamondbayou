<?php
class Jewelry extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('contentsection');
		$this->load->helper('url');
		$this->load->model('Commonmodel');
		$this->load->model('User');
		$this->load->model('Diamondmodel');
		$this->load->model('Engagementmodel');
		$this->load->model('Jewelrymodel');
		$this->load->model('Catemodel');
		$this->session->unset_userdata('whsale_section');
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

	function output($layout = null , $data = array() ,$left='', $isleft = true , $isright = true){
		$data['loginlink'] = $this->User->loginhtml();
		$output = $this->load->view($this->config->item('template').'header' , $data , true);
		$output .= $layout;
		if($isright)$output .= $this->load->view($this->config->item('template').'right' , $data , true);
		$output .= $this->load->view($this->config->item('template').'footer', $data , true);
		$this->output->set_output($output);
	}

	function search($lot='', $addoption='', $settingid='', $lot2=''){
		$data = $this->getCommonData(); 
		$lot	= urldecode($lot);
		$addoption	= urldecode($addoption);
		$settingid	= urldecode($settingid);
		$lot2	= urldecode($lot2);

		$data['title'] = 'Build Your Own Earring';
		$data['show_footer_to_bar']        = 1;
		$earringsettings = $this->Jewelrymodel->getEarringSettingsList();
		$viewer_list = '';
		$i = 1;
		if(count($earringsettings) > 0) {
			foreach($earringsettings as $rowearring){
				//$earing_dtlink = SITE_URL.'jewelry/jewelry_detail/'.$rowearring['id'];
				$earing_dtlink = SITE_URL.'jewelry/jewelry_detail/'.$rowearring['id'].'/'.$addoption.'/'.$settingid.'/toearring';
				$earing_imglink = SITE_URL.$rowearring['small_image'];
				$getstyle = ucwords( str_replace('-',' ',$rowearring['style']) );
				$earing_desc = metal_label( $rowearring['metal'] ). ' ' .$getstyle.' '. view_shape_value( $img, $rowearring['shape'] ) . ' Diamond Stud Earrings';
				$viewer_list .= '<div class="engagement-product col-sm-4">
					<div class="image-engagement"><a href="'.$earing_dtlink.'"><img style="width:130px;height:130px" src="'.$earing_imglink.'" alt="earing_imglink"></a></div>
					<div class="prodDescLabel">'.$earing_desc.'</div>
					<div class="jewlry_price">$'._nf($rowearring['price']).'</div>
				</div>';
				$i++;
			}
			$viewer_list .= '<div class="clear"></div>';
		}
		$data['viewer_list'] = $viewer_list;
		$this->session->unset_userdata('earringstyle','');

	    $output = $this->load->view('jewelry/search' , $data , true);
		$this->output($output , $data);	
	}

	/* build earing */
	function build_earings(){
		$data = $this->getCommonData(); 
		$data['title'] = 'Build Earrings';
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

		$data['sign_upform'] = signup_form();
		reset_diamond_filters();

		$output = $this->load->view('jewelry/builds_ownearing' , $data , true);
		$this->output($output , $data);	
	}

	/* build diamond pendant */
	function buildiamond_pendant(){
		$data = $this->getCommonData(); 
		$data['title'] = 'Build Diamond Pendant';
		$data['sign_upform'] = signup_form();
		reset_diamond_filters(); /// reset diamonds filters and shapes

		$output = $this->load->view('jewelry/builds_diamondpendant' , $data , true);
		$this->output($output , $data);	
	}

	/* build three stone ring */
	function buildthree_stonesring(){
		$data = $this->getCommonData(); 
		$data['title'] = 'Build Three Stone Rings';
		$data['sign_upform'] = signup_form();
		reset_diamond_filters(); /// reset diamonds filters and shapes

		$output = $this->load->view('jewelry/buildthree_stonering' , $data , true);
		$this->output($output , $data);	
	}

	function jewelry_detail($id='',$addoption='', $settingid='', $lot2=''){
		$data = $this->getCommonData(); 
		$data['title'] = 'Build Your Own Earring - Detail';
		$row_earing = $this->Jewelrymodel->getEarringSettingsById($id);
		$similar_earing = $this->Jewelrymodel->getSimilarEarringSettings($row_earing);
		$this->session->unset_userdata('unique_finding');

		$getstyle = ucwords( str_replace('-',' ',$row_earing['style']) );
		$earing_dmshape = view_shape_value( $img, $row_earing['shape'] );
		$data['earing_dtdesc'] = $earing_dmshape . ' <br>Diamond Stud Earrings';
		$data['earing_metal'] = metal_label( $row_earing['metal'] );
		$data['row_earing'] = $row_earing;
		$data['earing_style'] = ucwords( str_replace('-',' ',$row_earing['style']) );
		$data['earing_dshape'] = $earing_dmshape;
		$data['earing_dshapimg'] = $img;
		$data['earing_detilink'] = SITE_URL.'jewelry/complete_earings/'.$id.'/'.$addoption.'/'.$settingid.'/'.$lot2;
		//$data['earing_detilink'] = SITE_URL.'diamonds/search/true/false/toearring/false/'.$id;
		$data['earing_dimglink'] = SITE_URL.$row_earing['small_image'];
		$data['earing_mrdesc'] = 'A beautifully matched pair of '.$earing_dmshape.' diamonds secured in classic, '.$getstyle.' basket settings with comfortable screw-bask posts for pierced ears.';

		$data['next_date'] = nextDate();
		$data ['extraheader'] = '';
		$data ['extraheader'] .= '<script src="' . SITE_URL . 'js/accordian_tabsjs.js" type="text/javascript"></script>';
		$data ['extraheader'] .= '<link type="text/css" href="' . SITE_URL . 'css/tabs_style.css" rel="stylesheet" />';

		$similar_settings = '';
		if( count($similar_earing) > 0 ) {
			foreach($similar_earing as $rowseting) {
				$seting_dtlink = SITE_URL.'jewelry/jewelry_detail/'.$rowseting['id'];
				$seting_image = SITE_URL.$rowseting['small_image'];
				$setings_desc = $this->settingDesc($rowseting);
				$similar_settings .= '<div class="engagement-product">
					<div class="image-engagement"><a href="'.$seting_dtlink.'"><img style="width:130px;height:130px" src="'.$seting_image.'" alt="earing_imglink"></a></div>
					<div class="prodDescLabel">'.$setings_desc.' </div>
					<div class="jewlry_price">$'.$rowseting['price'].'</div>
				</div>';
			}
			$similar_settings .= '<div class="clear"></div>';
		}
		$data['similar_settings'] = $similar_settings;
	    $output = $this->load->view('jewelry/jewelry_detail' , $data , true);
		$this->output($output , $data);	
	}

	function settingDesc($rows) {
		$seting_dmshape = view_shape_value( $imgs, $rows['shape'] );
		$seting_metal   = metal_label( $rows['metal'] );
		$seting_style = ucwords( str_replace('-',' ',$rows['style']) );
		$seting_desc = $seting_metal.' '.$seting_style.' '.$seting_dmshape.' Diamond Stud Earrings';
		return $seting_desc;
	}

	/* complete earings */
	function complete_earings($id='',$lot='',$lot2='',$adoption=''){
		$data = $this->getCommonData();
		$id   = urldecode($id);
		$lot  = urldecode($lot);
		$lot2 = urldecode($lot2);
		//$data['simlars_diamondpair'] = getSimilarDiamondsListRows($lot, $lot2, $adoption, $id, 'earrings');
		$unique_finding = $this->session->userdata('unique_finding');
		
		/// set the earings and findings details
		if( !empty($unique_finding) && $unique_finding == 'findings' ) {
			$viewearings_page = 'complete_earingdetail'; //'completefindings_earingdetail';
			$row_earing = $this->findingsmodel->getFindingsRingDetails($id);
			$getstyle = $row_earing['head_style_name'];
			$earing_dmshape = $row_earing['stone_type'];
			$findings_dmshp = view_shape_value( $img, diamond_shape_value($row_earing['stone_type']) );
			$data['earing_dtdesc'] = $earing_dmshape . ' <br>Diamond Stud Earrings';
			$data['earing_metal'] = $row_earing['metal_type'];
			$data['row_earing'] = $row_earing;
			$data['earing_style'] = ucwords( $row_earing['head_style_name'] );
			$data['earing_dshape'] = $earing_dmshape;
			$data['earing_dshapimg'] = $img;
			$earings_price = $row_earing['priceRetail'];
			$data['earing_detilink'] = SITE_URL.'diamonds/search/true/false/toearring/false/'.$id;
			$data['earing_dimglink'] = RINGS_IMAGE.'crone/imgs/'.$row_earing['ImagePath'];
			$data['earing_mrdesc'] = 'A beautifully matched pair of '.$earing_dmshape.' diamonds secured in classic, '.$getstyle.' basket settings with comfortable screw-bask posts for pierced ears.';
		} else {
			$viewearings_page = 'complete_earingdetail';
			$row_earing = $this->Jewelrymodel->getEarringSettingsById($id);
			$getstyle = ucwords( str_replace('-',' ',$row_earing['style']) );
			$earing_dmshape = view_shape_value( $img, $row_earing['shape'] );
			$data['earing_dtdesc'] = $earing_dmshape . ' <br>Diamond Stud Earrings';
			$data['earing_metal'] = metal_label( $row_earing['metal'] );
			$data['row_earing'] = $row_earing;
			$data['earing_style'] = ucwords( str_replace('-',' ',$row_earing['style']) );
			$data['earing_dshape'] = $earing_dmshape;
			$data['earing_dshapimg'] = $img;
			$earings_price = $row_earing['price'];
			$data['earing_detilink'] = SITE_URL.'diamonds/search/true/false/toearring/false/'.$id;
			$data['earing_dimglink'] = SITE_URL.$row_earing['small_image'];
			$data['earing_mrdesc'] = 'A beautifully matched pair of '.$earing_dmshape.' diamonds secured in classic, '.$getstyle.' basket settings with comfortable screw-bask posts for pierced ears.';
		}
		
		$data['earing_price']    = '$ '._nf($earings_price);
		$data['title'] = 'Build Your Own Earring';
		
		$data['earingid'] = $id;
		$data['lot'] 	  = $lot;
		$data['lot2'] 	  = $lot2;
		$data['addoption'] = $adoption;
		$data['dmrow_detail'] = $this->Diamondmodel->getDetailsByLot($lot);
		$data['dmrow_detail2'] = $this->Diamondmodel->getDetailsByLot($lot2);
		$data['diamond1_detail'] = getCutValue($data['dmrow_detail']['cut']).' CUT . '.$data['dmrow_detail']['color'].' COLOR . '.$data['dmrow_detail']['clarity'].' CLARITY';
		$data['diamond2_detail'] = getCutValue($data['dmrow_detail2']['cut']).' CUT . '.$data['dmrow_detail2']['color'].' COLOR . '.$data['dmrow_detail2']['clarity'].' CLARITY';
		$data['total_dmprice'] = '$ '._nf($data['dmrow_detail']['price'] + $data['dmrow_detail2']['price']);
		$data['next_date'] = nextDate();
		$data['diamond1_shape'] = view_shape_value($view_diamondimg, $data['dmrow_detail']['shape']);
		$data['diamond2_shape'] = view_shape_value($view_diamondimg1, $data['dmrow_detail2']['shape']);
		//$data['clarity_box'] = $this->clarityBox($data['dmrow_detail']['clarity']);
		//$data['clarity2_box'] = $this->clarityBox($data['dmrow_detail2']['clarity']);
		//$data['color_box'] = $this->setColor($data['dmrow_detail']['color']);
		//$data['color2_box'] = $this->setColor($data['dmrow_detail2']['color']);
		//$data['cut_box'] = $this->cutBox($data['dmrow_detail']['cut']);
		//$data['cut2_box'] = $this->cutBox($data['dmrow_detail2']['cut']);
		$data['totalear_price'] = $data['dmrow_detail']['price'] + $data['dmrow_detail2']['price'] + $earings_price;
		$data['total_earprice'] = '$ '._nf($data['totalear_price']);
		$data['total_carat'] = $data['dmrow_detail']['carat'] + $data['dmrow_detail2']['carat'];
		$data['earing_desc'] = $data['earing_style'].' '.$earing_dmshape.' shape earing in '.$data['earing_metal'];
		
		//// get metal from earings
		$getEaringLIst = $this->Jewelrymodel->getEarringMetaList();
		$select_metalist = '';
				
		foreach($getEaringLIst as $rowmetal) {
			$earingMetal = metal_label($rowmetal['metal']);
			$setting_rdlink = SITE_URL.'jewelry/complete_earings/'.$rowmetal['id'].'/'.$lot.'/'.$lot2.'/'.$adoption;
			
			$select_metalist .= '<option value="'.$setting_rdlink.'" '.selectedOption($rowmetal['metal'],$row_earing['metal']).'>'.$earingMetal.'</option>';
		}
				
		$data['select_metalist'] = $select_metalist;
		$data['next_date'] = nextDate();
		
		$data ['extraheader'] = '<script src="' . SITE_URL . 'js/jquery.min.js" type="text/javascript"></script>';
		$data ['extraheader'] = '<script src="' . SITE_URL . 'js/accordian_tabsjs.js" type="text/javascript"></script>';
		$data ['extraheader'] .= '<link type="text/css" href="' . SITE_URL . 'css/tabs_style.css" rel="stylesheet" />';
		
	    $output = $this->load->view('jewelry/'.$viewearings_page , $data , true);
		$this->output($output , $data);	
	}

	/* set string value */
	function setStrings($shapes_list) {
		$srt = str_replace('false','', $shapes_list);
		$myarray = explode('_', $srt);
		$myarray = array_filter($myarray, 'strlen');  //removes null values but leaves "0"
		$myarray = array_filter($myarray);
		$shapes_values = "('".implode("','", $myarray)."')";

		return $shapes_values;	
	}

	/* set earrings metal */
	function setEaringStyles($platin='', $whgold='', $ylgold='', $rdsh='', $prsh='', $rg_showall='', $rg_499='', $rg_999='', $rg_1999='', $rg_2999='', $rg_3000='',$shape_list='false'
	, $setmt='') {
		$setingIDs = explode("/",$_SESSION['sidestone_dtview']);
		$setingID1 = !empty($setingIDs[5])?$setingIDs[5]:end($setingIDs);
		$setingID2 = end($setingIDs);
			
		$earingCondit = array(
			'metal'=>array($platin,$whgold,$ylgold), 
			'shape'=>array($rdsh,$prsh), 
			$rg_showall, 
			'price_range'=>array($rg_499,$rg_999,$rg_1999,$rg_2999,$rg_3000)
		);

		$shapes_values = $this->setStrings($shape_list);
		$ringmetal_list = $this->setStrings($setmt);
		
		$this->session->set_userdata('earings_condition',$earingCondit);
		
		$metalsIn = $this->getEaringValue($earingCondit['metal']);
		$shapesIn = $this->getEaringValue($earingCondit['shape']);
		
		$sql = "SELECT * FROM dev_earringsettings WHERE 1=1";
		
		if( !empty($metalsIn) ){
			$sql .= " AND metal IN $metalsIn";
		}
		if( !empty($shapesIn) ){
			$sql .= " AND shape IN $shapesIn";
		}
		///// set price conditions
		$rang_499 = explode('-', $rg_499);
		$rang_999 = explode('-', $rg_999);
		$rang_1999 = explode('-', $rg_1999);
		$rang_299 = explode('-', $rg_2999);

		$price_rgar = array_filter ( array(0, $this->ckFalse($rang_499[0]), $rang_499[1], $this->ckFalse($rang_999[0]), $rang_999[1], $this->ckFalse($rang_1999[0]), $rang_1999[1], $this->ckFalse($rang_299[0]), $rang_299[1], $this->ckFalse($rg_3000)) );

		$minPrice = min($price_rgar);
		$maxPrice = max($price_rgar);
		$miniPrice = ( $minPrice == $maxPrice ? 0 : $minPrice );
		if($rg_showall == 'false') {
			if($miniPrice == 0) {
				$sql .= " AND price > 0 AND price <= '$maxPrice'";	
			} else {
				$sql .= " AND price >= '$miniPrice' AND price <= '$maxPrice'";
			}
		} else {
			$sql .= " AND price > 0";
		}

		$return = 	$this->db->query($sql);
		$earringsettings = $return->result_array();

		$viewer_list = '';
		$i = 1;
		if(count($earringsettings) > 0) {
			foreach ($earringsettings as $rowearring){
				if(!empty($setingID1)){
					$earing_dtlink = SITE_URL.'jewelry/complete_earings/'.$rowearring['id'].'/'.$setingID1.'/'.$setingID2.'/toearring';
				}else{
					$earing_dtlink = SITE_URL.'jewelry/jewelry_detail/'.$rowearring['id'];
				}
				$earing_imglink = SITE_URL.$rowearring['small_image'];
				$getstyle = ucwords( str_replace('-',' ',$rowearring['style']) );
				$earing_desc = metal_label( $rowearring['metal'] ). ' ' .$getstyle.' '. view_shape_value( $img, $rowearring['shape'] ) . ' Diamond Stud Earrings';

				$viewer_list .= '<div class="engagement-product col-sm-4">
					<div class="image-engagement"><a href="'.$earing_dtlink.'"><img style="width:130px;height:130px" src="'.$earing_imglink.'" alt="earing_imglink"></a></div>
					<div class="prodDescLabel">'.$earing_desc.'</div>
					<div class="jewlry_price">$'._nf($rowearring['price']).'</div>
				</div>';
				if($i%3 == 0) { $viewer_list .= '<div class="clear"></div>'; }
				$i++;
			}
		} else {
			$viewer_list = '<div class="norecStyle">No record Found</div>';
		}

		$result_rings = $this->findingsmodel->getFindingsRingList($shapes_values, $ringmetal_list, $miniPrice, $maxPrice);

		$viewearing_list = '';
		foreach($result_rings['result'] as $rowfindings) {
			$viewRingImg = RINGS_IMAGE.'crone/imgs/'.$rowfindings['ImagePath'];
			$findings_dtlink = SITE_URL.'site/uniquefindings_detail/'.$rowfindings['catid'].'/'.$rowfindings['findings_id'];

			$viewearing_list .= '<div class="engagement-product col-sm-4">
				<div class="image-engagement"><a href="'.$findings_dtlink.'"><img style="width:130px;height:130px" src="'.$viewRingImg.'" alt="viewRingImg"></a></div>
				<div class="prodDescLabel">'.$rowfindings['name'].'<br><a href="'.$findings_dtlink.'" class="underline">View Details</a></div>
				<div class="jewlry_price">$'.$rowfindings['priceRetail'].'</div>
		  </div>';
		}
		echo $viewer_list;
	}

	/* check false vlaue */
	function ckFalse($field) {
		return ($field == 'false' ? '' : $field);
	}

	//// set array
	function getEaringValue($cols) {
		$metaList = str_replace( 'false', '', $cols );
		$metaList = array_filter($metaList);
		$metalIn = ( count($metaList) > 0 ? "('".implode("','", $metaList)."')" : '' );
		return $metalIn;
	}

	function searchdiamonds(){
		$data = $this->getCommonData();
		$data['tabhtml'] = '';
		$minprice =  $this->Diamondmodel->getMinPrice();
		$maxprice =  $this->Diamondmodel->getMaxPrice();		

		$minprice = ($this->session->userdata('searchminprice') && ($this->session->userdata('searchminprice')>$minprice) && ($this->session->userdata('searchminprice')<$maxprice)) ? ($this->session->userdata('searchminprice')) : $minprice;
		$maxprice = ($this->session->userdata('searchmaxprice') && ($this->session->userdata('searchmaxprice')<$maxprice) && ($this->session->userdata('searchmaxprice')>$minprice)) ? ($this->session->userdata('searchmaxprice')) : $maxprice;
		$data ['totaldiamond'] = $this->Diamondmodel->getCountDiamond ( $minprice, $maxprice );
		$data['minprice'] = $minprice;
		$data['maxprice'] = $maxprice;
		$data['settingsid'] = '';
		if(isset($_POST)){
			if(isset($_POST['hid'])){
				$data['title'] = 'Build Your Own Earring: Choose diamonds';
				$data['settingsid'] = $_POST['hid'];
				$settingsid = $data['settingsid'];
				$data['tabhtml'] = $this->Commonmodel->earringTab('diamonds',$settingsid);
				
				$output = $this->load->view('jewelry/searchdiamonds' , $data , true);
			}
		}
		else {
			$data['title'] = 'Search Earring Style';
			
			 $output = $this->load->view('jewelry/searchearringstyle' , $data , true);
		}	
	    
		$output = $this->load->view('jewelry/searchdiamonds' , $data , true);
		$data['title'] = 'Build Your Own Earring: Choose diamonds';
		$this->output($output , $data);	
	}	
	
	function build_diamond_pendant(){
		$data = $this->getCommonData();
		$data['show_footer_to_bar']	= 1;
		$data['title'] = "Build Diamond Pendant|Build Your Own Diamond Pendant|Buy Diamond Pendant Online";
		$data['onloadextraheader'] = "getpendantsettingsresult(0);";
		$data['meta_tags'] = '<meta http-equiv="Content-Type" content="text/html; iso-8859-1">
		<meta name="title" content="Build Diamond Pendant|Build Your Own Diamond Pendant|Buy Diamond Pendant Online">
		<meta name="ROBOTS" content="INDEX,FOLLOW">
		<meta name="description" content="Build Diamond Pendant, Build Your Own Diamond Pendant, Buy Diamond Pendant Online, cubic zirconia engagement ring, discount engagement ring, engagement ring mountings, engagement rings cheap, mens engagement rings, pave engagement ring online">
		<meta name="abstract" content="Diamond Rings, Wholesale Diamonds, Estate Jewelry, Custom Engagement Rings, New York, Chicago, California, Boston, Las Vegas, Columbia, Montgomery">
		<meta name="keywords" content="Build Diamond Pendant, Build Your Own Diamond Pendant, Buy Diamond Pendant Online, cubic zirconia engagement ring, discount engagement ring, engagement ring mountings, engagement rings cheap, mens engagement rings, pave engagement ring online">
		<meta name="author" content="Heartsanddiamonds">
		<meta name="publisher" content="Heartsanddiamonds">
		<meta name="copyright" content="Heartsanddiamonds">
		<meta http-equiv="Reply-to" content="">
		<meta name="creation_Date" content="12/12/2008">
		<meta name="expires" content="">
		<meta name="revisit-after" content="7 days">
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">';

		$output = $this->load->view('jewelry/diamondpendant' , $data , true);
		$this->output($output , $data);	
	}

	function getpendantresult(){
		$returnhtml = '';
		$results = $this->Jewelrymodel->getPendants();
		$count = 0;
		$returnhtml .='<div>';
		if(isset($results)){
			foreach ($results as $result){
				 $img = file_exists(config_item('base_path').'images/rings/'.$result['small_image']) ? SITE_URL.'images/rings/'.$result['small_image'] : SITE_URL.'images/rings/noimage.jpg';
				if(($count%3) == 0)$returnhtml .='</div><div class="clear"></div><div style="border-bottom:5px #D6DEFC solid;"> ';
				$returnhtml .='
									<div  class="floatl ringbox2 txtcenter2"> 				      		
						      			<a href="#" onclick="viewpendantdetails('.$result['stock_number'].')"><img src="'.$img.'" alt="imgage"> </a><br>
						      			'.substr($result['description'],0,50).'......<br>
						      			<b>Price:</b> $'.$result['price'].'<br>
						      			<a href="#" onclick="viewpendantdetails('.$result['stock_number'].')" class="underline">View Details</a>
						      		</div>
								';
				 
				$count++;
			}
			$returnhtml .='</div>';
			$returnhtml .= '<div class="clear"></div>';
		}
		
		echo $returnhtml;
	}
	
	function getpendantsettingsresult($isPlatinum = '', $isYellowgold = '', $isWhitegold = '', $isSolitaire = '', $isThreestone = '', $isWhitegd18k = '', $isYellowgd18k = '', $pricRange=''){
		$returnhtml = '';
		$pth = FCPATH; //substr(FCPATH,0,-10);
		$results = $this->Jewelrymodel->getAllPendantSettings($isPlatinum, $isYellowgold, $isWhitegold, $isSolitaire, $isThreestone, $isWhitegd18k, $isYellowgd18k, $pricRange);
		$count = 0;
		
		$returnhtml .='<div>';
		if(count($results) > 0) {
			if(isset($results)){
				foreach ($results as $result){
				$detaiLink = SITE_URL.'jewelry/pendants_detail/'.$result['id'].'/'.$result['style'].'/'.$result['metal'];
				
					$img = file_exists($pth.'/'.$result['small_image']) ? SITE_URL.$result['small_image'] : SITE_URL.'images/rings/noimage.jpg';
					if(($count%3) == 0)$returnhtml .='';
					$returnhtml .='
					<div class="engagement-product item-'.$result['id'].' col-sm-4">
				<div class="image-engagement"><a href="'.$detaiLink.'"><img style="width:130px;height:130px" src="'.$img.'" alt="detaiLink"></a></div>
				<div class="prodDescLabel">'.substr($result['description'],0,30).'.... <br><span>Starting at $'.$result['price'].'</span><br><a href="'.$detaiLink.'" class="underline">View Details</a></div>
			  </div>';
					
					/*$returnhtml .= '<div class="item-product"> 				      		
											<a href="#" onclick="viewpendantdetails('.$result['id'].',\''.$result['style'].'\')"><img style="width:130px;height:130px" src="'.$img.'"> </a><br>
											'.substr($result['description'],0,50).'......<br>
											<b>Price:</b> $'.$result['price'].'<br>
											<a href="#" onclick="viewpendantdetails('.$result['id'].',\''.$result['style'].'\')" class="underline">View Details</a>
										</div>';*/
					 
					$count++;
				}
				$returnhtml .='</div>';
				$returnhtml .= '<div class="clear"></div>';
			}
		} else {
			$returnhtml .= '<h3>No Record Found For this selection</h3>';
		}
		echo $returnhtml;
	}
	
	function pendantdetailsajax($id = '',$style = '' ){
 
		$data = $this->getCommonData();		
		$data['title'] = 'Pendant Details';		
		
		$data['style'] = $style;		
		$data['details'] = $this->Jewelrymodel->getPendentSettingsById($id); 
			
	    $output = $this->load->view('jewelry/pendantsettingsdetails' , $data , true);		
		echo $output;
	}
	
	function pendants_detail($id = '',$style = '', $metal='', $option=''){
 
		$data = $this->getCommonData();	
		
		$data['style'] = $style;		
		$data['details'] = $this->Jewelrymodel->getPendentSettingsById($id); 
		$row_metals = $this->Jewelrymodel->getPendtantsMetals($style);
		$data['order_ddate'] = date("l, F d",strtotime("+10 days")); 
 
		$data['title'] = "Build Diamond Pendant|Build Your Own Diamond Pendant|Buy Diamond Pendant Online";
		$data['onloadextraheader'] = "getpendantsettingsresult(0);";
		$data['meta_tags'] = '<meta http-equiv="Content-Type" content="text/html; iso-8859-1">
	<meta name="title" content="Build Diamond Pendant|Build Your Own Diamond Pendant|Buy Diamond Pendant Online">
	<meta name="ROBOTS" content="INDEX,FOLLOW">
	<meta name="description" content="Build Diamond Pendant, Build Your Own Diamond Pendant, Buy Diamond Pendant Online, cubic zirconia engagement ring, discount engagement ring, engagement ring mountings, engagement rings cheap, mens engagement rings, pave engagement ring online">
	<meta name="abstract" content="Diamond Rings, Wholesale Diamonds, Estate Jewelry, Custom Engagement Rings, New York, Chicago, California, Boston, Las Vegas, Columbia, Montgomery">
	<meta name="keywords" content="Build Diamond Pendant, Build Your Own Diamond Pendant, Buy Diamond Pendant Online, cubic zirconia engagement ring, discount engagement ring, engagement ring mountings, engagement rings cheap, mens engagement rings, pave engagement ring online">
	<meta name="author" content="Heartsanddiamonds">
	<meta name="publisher" content="Heartsanddiamonds">
	<meta name="copyright" content="Heartsanddiamonds">
	<meta http-equiv="Reply-to" content="">
	<meta name="creation_Date" content="12/12/2008">
	<meta name="expires" content="">
	<meta name="revisit-after" content="7 days">
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">';
	
	if($metal !='' && $option === '') {
		$this->session->set_userdata('metal', $metal);
	}
	$option_metal = $this->session->userdata('metal');
	
	$view_mtoptions = ''; //'<option value="'.SITE_URL.'jewelry/pendants_detail/'.$id.'/'.$style.'/'.$option_metal.'">Select Metal</option>';
		if(count($row_metals) > 0) {
			foreach($row_metals as $row_mt) {
				$rd_link = SITE_URL.'jewelry/pendants_detail/'.$row_mt['id'].'/'.$row_mt['style'].'/'.$row_mt['metal'].'/true';
				$view_mtoptions .= '<option value="'.$rd_link.'" ' . isSelected($row_mt['metal'], $metal) . '>'.ucwords($row_mt['metal']).'</option>';
			}
		} else {
			$view_mtoptions .= '<option value="">No Metal Found</option>';
		}
		$data['view_mtoptions'] = $view_mtoptions;
		$data['addoption'] = $style;
		
		$uri = current_url();
		
		if($style == 'solitaire' || $style == 'threestone') {
			$this->session->set_userdata('pendant_option',$style );
			$this->session->set_userdata('pendant_uri',$uri);
		}
		//// save setting id
		if(isset($id) && !empty($id)) {
			$this->session->set_userdata('setings_id', $id);
		}
            
            $this->session->set_userdata('set_page_title', $data['title']);
	    $output = $this->load->view('jewelry/pendant_detailsview' , $data , true);
	    $this->output($output , $data);
	}
    //// build three stone ring with supplied stone
    function build_three_supplied_stone_ring($side_stone1 = '', $add_option='',$settings_id='') {
        $data = $this->getCommonData();
        $lot = urldecode($side_stone1);
        $sidestone1  = urldecode($side_stone1);
        $setting_id  = urldecode($settings_id);
        $data['lot'] = $lot;
        
        //$data['details'] = $this->Jewelrymodel->getPendentSettingsById($id);
        $row_detail = $this->Diamondmodel->getDetailsByLot($sidestone1);
        $data['row_detail'] = $row_detail;

        $data['title'] = "Build Diamond Pendant|Build Your Own Diamond Pendant|Buy Diamond Pendant Online";
        $data['onloadextraheader'] = "getpendantsettingsresult(0);";
        $data['meta_tags'] = '<meta http-equiv="Content-Type" content="text/html; iso-8859-1">
        <meta name="title" content="Build Diamond Pendant|Build Your Own Diamond Pendant|Buy Diamond Pendant Online">
        <meta name="ROBOTS" content="INDEX,FOLLOW">
        <meta name="description" content="Build Diamond Pendant, Build Your Own Diamond Pendant, Buy Diamond Pendant Online, cubic zirconia engagement ring, discount engagement ring, engagement ring mountings, engagement rings cheap, mens engagement rings, pave engagement ring online">
        <meta name="abstract" content="Diamond Rings, Wholesale Diamonds, Estate Jewelry, Custom Engagement Rings, New York, Chicago, California, Boston, Las Vegas, Columbia, Montgomery">
        <meta name="keywords" content="Build Diamond Pendant, Build Your Own Diamond Pendant, Buy Diamond Pendant Online, cubic zirconia engagement ring, discount engagement ring, engagement ring mountings, engagement rings cheap, mens engagement rings, pave engagement ring online">
        <meta name="author" content="Heartsanddiamonds">
        <meta name="publisher" content="Heartsanddiamonds">
        <meta name="copyright" content="Heartsanddiamonds">
        <meta http-equiv="Reply-to" content="">
        <meta name="creation_Date" content="12/12/2008">
        <meta name="expires" content="">
        <meta name="revisit-after" content="7 days">
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">';
        $data['order_ddate'] = date("l, F d",strtotime("+10 days"));
        $build_3stone = $this->session->userdata('build_3stone');

        if($build_3stone == 'unique'){
			$default_metal = $this->session->userdata('default_metal');
			$default_ringsize = $this->session->userdata('default_ringsize');
			$rowun_dtring = $this->Catemodel->getRingsDetailViaId($setting_id, $default_metal, $default_ringsize);
			$settingsprice = $rowun_dtring['priceRetail'];
			$data['rowun_dtring'] = $rowun_dtring;
			$data['unique_ringimg'] = SITE_URL.'scrapper/imgs/'.$rowun_dtring['ImagePath'];
			$data['unique_ringdesc'] = $rowun_dtring['parent_cate'].' '.$rowun_dtring['category_name'];
        } else {
			$details = $this->Jewelrymodel->getPendentSettingsById($setting_id);
			$settingsprice = $details['price'];
			$data['details'] = $details;
        }

        $data['nexturl'] = '#';
        $data['onclickfunction'] = '';
        $side1price = 0;
        $sidestone1_desc = '';
        $centerdiamond = $row_detail;

        if($sidestone1 != '' && $sidestone1 != 'false'){
            $side1 = $row_detail;
            $dm1_shape = view_shape_value($shape1_image, $side1['shape']);

            $sidestone1_desc = '<div><span class="green_text">'.getCutValue($side1['cut']).'-cut, '.$side1['color'].'-color, '.$side1['clarity'].'-clarity, '.$dm1_shape.', '.$side1['carat'].'-carat Diamond</span> <span class="price_sectionbk">$'._nf($side1['price']).'</span><div class="clear"></div> Stock #: '.$side1['Stock_n'].'</div><br>';

            $side1price = $side1['price'];
        }
        $data['sidestones_desc'] = $sidestone1_desc;

        $totalprice = $settingsprice + $side1price;


        $options_arlist = array('addpendantsetings_3stone','addpendantsetings3stone');
        if(strcmp($add_option,'tothreestone') === 0) {
            $this->session->set_userdata('vendorname', 'Build 3 Stone Unique');

            $data['pendan_stepsbar'] = '<br>' . stepsBuildToThrestone(4, 'tothreestone', $settings_id);
            $pagefile_name = ( $build_3stone == 'unique' ? 'buildown_unique_3stone' : 'buildown_3stone' );

            $rowdt_ring = $this->Jewelrymodel->getAllByStock($setting_id);
            $data['flashfiles']	= $this->Engagementmodel->getFlashByStockId($setting_id);
            $data['rowdt_ring'] = $rowdt_ring;
            $data['ring_mtprice'] = $this->ringMetalPrice($rowdt_ring);
            $data['total_ringprice'] = $totalprice + $data['ring_mtprice'];

            //// ring detail
            $flashfiles = $data['flashfiles'];
            $pth = FCPATH;
            if (isset($flashfiles['image180']) && $flashfiles['image180']) {
            $image180 = 'images/rings/icons/180' . $flashfiles['image180'];
            $image180 = (file_exists($pth.'/'. $image180)) ? SITE_URL . $image180 : SITE_URL . 'images/rings/icons/180/180degree.jpg';
            }else{
			$image180 = SITE_URL.'images/rings/noimage_sm.jpg';
			}
            $data['image180'] = $image180;
            /////////

		} else {
            if(in_array($add_option,$options_arlist)) {
                    $data['pendan_stepsbar'] = '<br>' . stepsRowBuildPendant(4, 'threestone');
            } else {
                    $data['pendan_stepsbar'] = '<br>' . stepsRowBuildPendant(3, 'solitaire');
            }
            $pagefile_name = 'build_ownpendant_detail';
            $pendantOption = ( $add_option == 'addpendantsetings' ? 'Build Pendant' : 'Build 3 Stone Pendant' );
            $this->session->set_userdata('vendorname', $pendantOption);
    }
            $getRingMetal = $this->session->userdata('rings_metal');

            switch ($add_option) {
                    case 'addpendantsetings': 
                            $data['onclickfunction'] = 'addtocart(\''.$add_option.'\',\''.$sidestone1.'\',false,false,\''.$setting_id.'\',\''.$totalprice.'\',\''.$centerdiamond['Meas'].'\', false,\'image_url\')';
                            break;
                    case 'addpendantsetings3stone': 
                            $data['onclickfunction'] = 'addtocart(\'addpendantsetings3stone\',\''.$lot.'\',\''.$sidestone1.'\',\''.$sidestone2.'\',\''.$setting_id.'\',\''.$totalprice.'\',\''.$centerdiamond['Meas'].'\', false,\'image_url\')';
                            break;
                    case 'addpendantsetings_3stone': 
                            $data['onclickfunction'] = 'addtocart(\'addpendantsetings3stone\',\''.$lot.'\',\''.$sidestone1.'\',\''.$sidestone2.'\',\''.$setting_id.'\',\''.$totalprice.'\',\''.$centerdiamond['Meas'].'\', false,\'image_url\')';
                            break;
                    case 'tothreestone': 
                            $data['onclickfunction'] = 'addtocart(\'tothree_supplied_stone\',\'false\',\''.$sidestone1.'\',\'false\',\''.$setting_id.'\',\''.$data['total_ringprice'].'\',\''.$centerdiamond['Meas'].'\', \''.$getRingMetal.'\',\'image_url\')';
                            break;
                    default:
                            break;
            }
            $this->session->set_userdata('settings_imgurl', $image180);
            $data['extraheader'] = '<script src="' . SITE_URL . 'js/swfobject.js" type="text/javascript"></script>';

            $output = $this->load->view('jewelry/build_three_stone_supplied_stone' , $data , true);
            $this->output($output , $data);
	}
        
	//// build your own diamond pendant
	function build_owndiamond_pendant($sidestone1 = '', $add_option='',$setting_id='', $lot='', $sidestone2 = ''){
 
		$data = $this->getCommonData();	
		
		$lot 		= urldecode($lot);
		$sidestone1 = urldecode($sidestone1);
		$sidestone2	= urldecode($sidestone2);
		$setting_id	= urldecode($setting_id);
		$data['lot'] 		= $lot;
		$data['sidestone1'] = $sidestone1;
		$data['sidestone2'] = $sidestone2;
		$data['setting_id'] = $setting_id;
		
		$data['style'] = isset($style)?$style:'';		
		//$data['details'] = $this->Jewelrymodel->getPendentSettingsById($id);
		$row_detail = $this->Diamondmodel->getDetailsByLot($lot);
		$data['row_detail'] = $row_detail;
		$dm_shape = view_shape_value($shape_image, isset($row_detail['shape'])?$row_detail['shape']:'');
		//$data['dm_shape'] = $dm_shape;
		$cut_value = getCutValue(isset($row_detail['cut'])?$row_detail['cut']:'');
		$cutValue = isset($cut_value)?$cut_value:'';
		$colors = isset($row_detail['color'])?$row_detail['color']:'';
		$claritys = isset($row_detail['clarity'])?$row_detail['clarity']:'';
		$carats = isset($row_detail['carat'])?$row_detail['carat']:'';
		$prices = isset($row_detail['price'])?$row_detail['price']:'';
		$data['diam_desc'] = '<span class="green_text">'.$cutValue.'-cut, '.$colors.'-color, '.$claritys.'-clarity, '.$carats.'-carat Diamond</span> <span class="price_sectionbk">$'._nf($prices).'</span>';
 
		$data['title'] = "Build Diamond Pendant|Build Your Own Diamond Pendant|Buy Diamond Pendant Online";
		$data['onloadextraheader'] = "getpendantsettingsresult(0);";
		$data['meta_tags'] = '<meta http-equiv="Content-Type" content="text/html; iso-8859-1">
	<meta name="title" content="Build Diamond Pendant|Build Your Own Diamond Pendant|Buy Diamond Pendant Online">
	<meta name="ROBOTS" content="INDEX,FOLLOW">
	<meta name="description" content="Build Diamond Pendant, Build Your Own Diamond Pendant, Buy Diamond Pendant Online, cubic zirconia engagement ring, discount engagement ring, engagement ring mountings, engagement rings cheap, mens engagement rings, pave engagement ring online">
	<meta name="abstract" content="Diamond Rings, Wholesale Diamonds, Estate Jewelry, Custom Engagement Rings, New York, Chicago, California, Boston, Las Vegas, Columbia, Montgomery">
	<meta name="keywords" content="Build Diamond Pendant, Build Your Own Diamond Pendant, Buy Diamond Pendant Online, cubic zirconia engagement ring, discount engagement ring, engagement ring mountings, engagement rings cheap, mens engagement rings, pave engagement ring online">
	<meta name="author" content="Heartsanddiamonds">
	<meta name="publisher" content="Heartsanddiamonds">
	<meta name="copyright" content="Heartsanddiamonds">
	<meta http-equiv="Reply-to" content="">
	<meta name="creation_Date" content="12/12/2008">
	<meta name="expires" content="">
	<meta name="revisit-after" content="7 days">
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">';
	
	$data['order_ddate'] = date("l, F d",strtotime("+10 days"));
	
	$build_3stone = $this->session->userdata('build_3stone');
	
	if( $build_3stone == 'unique' ){
		$default_metal = $this->session->userdata('default_metal');
		$default_ringsize = $this->session->userdata('default_ringsize');
	
		$rowun_dtring = $this->Catemodel->getRingsDetailViaId($setting_id, $default_metal, $default_ringsize); 
		$settingsprice = $rowun_dtring['priceRetail'];
		$data['rowun_dtring'] = $rowun_dtring;
		$data['unique_ringimg'] = SITE_URL.'scrapper/imgs/'.$rowun_dtring['ImagePath'];
		$data['unique_ringdesc'] = $rowun_dtring['parent_cate'].' '.$rowun_dtring['category_name'];
	} else {
		$details = $this->Jewelrymodel->getPendentSettingsById($setting_id);
		$settingsprice = $details['price'];
		$data['details'] = $details;
	}

		$data['nexturl'] = '#';
		$data['onclickfunction'] = '';
		$side1price = 0;
		$side2price = 0;
		$sidestone1_desc = '';
		$sidestone2_desc = '';
		
		$centerdiamond = $this->Diamondmodel->getDetailsByLot($lot);
		$centerprice = isset($centerdiamond['price'])?$centerdiamond['price']:0;
		
		if($sidestone1 != '' && $sidestone1 != 'false'){
			$side1 = $this->Diamondmodel->getDetailsByLot($sidestone1);
			$dm1_shape = view_shape_value($shape1_image, $side1['shape']);
			
			$sidestone1_desc = '<div><span class="green_text">'.getCutValue($side1['cut']).'-cut, '.$side1['color'].'-color, '.$side1['clarity'].'-clarity, '.$dm1_shape.', '.$side1['carat'].'-carat Diamond</span> <span class="price_sectionbk">$'._nf($side1['price']).'</span><div class="clear"></div> Stock #: '.$side1['Stock_n'].'</div><br>';
			
			$side1price = $side1['price'];
		}
		if($sidestone2 != '' && $sidestone2 != 'false'){
			$side2 = $this->Diamondmodel->getDetailsByLot($sidestone2);
			$dm2_shape = view_shape_value($shape2_image, $side2['shape']);
			$sidestone2_desc = '<div><span class="green_text">'.getCutValue($side2['cut']).'-cut, '.$side2['color'].'-color, '.$side2['clarity'].'-clarity, '.$dm2_shape.', '.$side2['carat'].'-carat Diamond</span> <span class="price_sectionbk">$'._nf($side2['price']).'</span><div class="clear"></div>Stock #: '.$side2['Stock_n'].'</div><br>';
			
			$side2price = $side2['price'];
		} 
		$data['sidestones_desc'] = $sidestone1_desc.$sidestone2_desc;
			 
		$totalprice = $centerprice + $settingsprice + $side1price + $side2price;
		$data['diamondprice'] = $centerprice;
		$data['side1price'] = $side1price;
		$data['side2price'] = $side2price;
		$data['settingsprice'] = $settingsprice;
		$data['totalprice'] = $totalprice;
		
		
		$options_arlist = array('addpendantsetings_3stone','addpendantsetings3stone');
		if(strcmp($add_option,'tothreestone') === 0) {
			$this->session->set_userdata('vendorname', 'Build 3 Stone Unique');
			$data['pendan_stepsbar'] = '<br>' . stepsBuildToThrestone(4, 'tothreestone');
			$pagefile_name = ( $build_3stone == 'unique' ? 'buildown_unique_3stone' : 'buildown_3stone' );
			
			$rowdt_ring = $this->Jewelrymodel->getAllByStock($setting_id);
			$data['flashfiles']	= $this->Engagementmodel->getFlashByStockId($setting_id);
			$data['rowdt_ring'] = $rowdt_ring;
			$data['ring_mtprice'] = $this->ringMetalPrice($rowdt_ring);
			$data['total_ringprice'] = $totalprice + $data['ring_mtprice'];
			
			//// ring detail
			$flashfiles = $data['flashfiles'];
			$pth = FCPATH;
			$img = file_exists($pth.'/'.$rowdt_ring['small_image']) ? SITE_URL.$rowdt_ring['small_image'] : SITE_URL.'images/rings/noimage_sm.jpg';
			if ($flashfiles['image180']) {
			$image180 = 'images/rings/icons/180' . $flashfiles['image180'];
			$image180 = (file_exists($pth.'/'. $image180)) ? SITE_URL . $image180 : SITE_URL . 'images/rings/icons/180/180degree.jpg';
			}
			$data['image180'] = $image180;
		} else {
			if(in_array($add_option,$options_arlist)) {
				$data['pendan_stepsbar'] = '<br>' . stepsRowBuildPendant(4, 'threestone');
			} else {
				$data['pendan_stepsbar'] = '<br>' . stepsRowBuildPendant(3, 'solitaire');
			}
			$pagefile_name = 'build_ownpendant_detail';
			$pendantOption = ( $add_option == 'addpendantsetings' ? 'Build Pendant' : 'Build 3 Stone Pendant' );
			$this->session->set_userdata('vendorname', $pendantOption);
			$data['image180'] = '';
		}
		$getRingMetal = $this->session->userdata('rings_metal');
		$mesded = isset($centerdiamond['Meas'])?$centerdiamond['Meas']:'';
		switch ($add_option) {
			case 'addpendantsetings': 
				$data['onclickfunction'] = 'addtocart(\''.$add_option.'\',\''.$sidestone1.'\',false,false,\''.$setting_id.'\',\''.$totalprice.'\',\''.$mesded.'\', false,\'image_url\')';
				break;
			case 'addpendantsetings3stone': 
				$data['onclickfunction'] = 'addtocart(\'addpendantsetings3stone\',\''.$lot.'\',\''.$sidestone1.'\',\''.$sidestone2.'\',\''.$setting_id.'\',\''.$totalprice.'\',\''.$mesded.'\', false,\'image_url\')';
				break;
			case 'addpendantsetings_3stone': 
				$data['onclickfunction'] = 'addtocart(\'addpendantsetings3stone\',\''.$lot.'\',\''.$sidestone1.'\',\''.$sidestone2.'\',\''.$setting_id.'\',\''.$totalprice.'\',\''.$mesded.'\', false,\'image_url\')';
				break;
			case 'tothreestone': 
				$data['onclickfunction'] = 'addtocart(\'tothreestone\',\''.$lot.'\',\''.$sidestone1.'\',\''.$sidestone2.'\',\''.$setting_id.'\',\''.$data['total_ringprice'].'\',\''.$mesded.'\', \''.$getRingMetal.'\',\'image_url\')';
				break;
			default:
				break;
		}
		$this->session->set_userdata('settings_imgurl', $data['image180']);
		$data['extraheader'] = '<script src="' . SITE_URL . 'js/swfobject.js" type="text/javascript"></script>';
		
	    $output = $this->load->view('jewelry/'.$pagefile_name , $data , true);
		$this->output($output , $data);
	}
	///// get metal price
	function ringMetalPrice($details) {
		switch ($details['metal']) {
		case 'Platinum':
			$metalprice = $details['price'];
		break;
		case 'yellowgold':
			$metalprice = $details['yellow_gold_price'];
		break;
		case 'WhiteGold':
		$metalprice = $details['price'];
		break;
		default:
		$metalprice = $details['price'];
		break;
		}
		return $metalprice;	
	}

	function build_three_stone_ring($details = false, $metal=false, $sort='DESC'){		
		$data = $this->getCommonData();
		$data['title'] = 'Build Your Own Three-Stone Ring';
		$data['tabhtml'] = $this->Commonmodel->getThreeStoneTab('diamonds');		 
		$data['signatur_data'] = '';
		$data['signatur_option'] = $details;
		$data['metals_option'] = $metal;
		$burl = SITE_URL;
		$data['cateview_list'] = '';
		$data['show_footer_to_bar']	= 1;
		if($details){
			$minprice =  250;
			$maxprice =  1000000;
			$minprice = ($this->session->userdata('searchminprice') && ($this->session->userdata('searchminprice')>$minprice) && ($this->session->userdata('searchminprice')<$maxprice)) ? ($this->session->userdata('searchminprice')) : $minprice;
			$maxprice = ($this->session->userdata('searchmaxprice') && ($this->session->userdata('searchmaxprice')<$maxprice) && ($this->session->userdata('searchmaxprice')>$minprice)) ? ($this->session->userdata('searchmaxprice')) : $maxprice;
			$data['minprice'] = $minprice;
			$data['maxprice'] = $maxprice;
			$data['totaldiamond'] = $this->Diamondmodel->getCountDiamond($minprice,$maxprice);
			$data['totaldiamond'] = '<div class="norec_found">no rings found</div>';
			$cateview_list = $this->unique_cate_list( $details );
			if( is_numeric($details) ) {
				$uniqu_section = $this->unique_section_products( $details );
				if(!empty($uniqu_section['product_list'])){
					$cateview_list = $uniqu_section['product_list'];
					$unique_price_list = $uniqu_section['price_list'];
				}
			}
			$data['cateview_list'] = $cateview_list;		
		}else{
			$minprice =  250; //$this->Diamondmodel->getMinPrice();
			$maxprice =  1000000; //$this->Diamondmodel->getMaxPrice();
			$minprice = ($this->session->userdata('searchminprice') && ($this->session->userdata('searchminprice')>$minprice) && ($this->session->userdata('searchminprice')<$maxprice)) ? ($this->session->userdata('searchminprice')) : $minprice;
			$maxprice = ($this->session->userdata('searchmaxprice') && ($this->session->userdata('searchmaxprice')<$maxprice) && ($this->session->userdata('searchmaxprice')>$minprice)) ? ($this->session->userdata('searchmaxprice')) : $maxprice;
			$data['minprice'] = $minprice;
			$data['maxprice'] = $maxprice;
			$this->session->set_userdata('searchminprice',$data['minprice'] );
			$this->session->set_userdata('searchmaxprice',$data['maxprice']);
			$this->session->set_userdata ( 'caratmin', .5 );
			$this->session->set_userdata ( 'caratmax', 3.50 );
			$data['totaldiamond'] = $this->Diamondmodel->getCountDiamond($data['minprice'],$data['maxprice']);
			 
		}
		$data['title'] = "Build Three Stone Ring|Gold Engagement Rings|Three Stone Princess Cut Engagement Ring";
		$data['meta_tags'] = '<meta http-equiv="Content-Type" content="text/html; iso-8859-1">
		<meta name="title" content="Build Three Stone Ring|Gold Engagement Rings|Three Stone Princess Cut Engagement Ring">
		<meta name="ROBOTS" content="INDEX,FOLLOW">
		<meta name="description" content="Build Three Stone Ring, Gold Engagement Rings, Three Stone Princess Cut Engagement Ring, diamond solitaire engagement rings, princess cut engagement ring, engagement rings princess cut, designing engagement rings, two tone engagement rings online at discounted rate">
		<meta name="abstract" content="Diamond Rings, Wholesale Diamonds, Estate Jewelry, Custom Engagement Rings, New York, Chicago, California, Boston, Las Vegas, Columbia, Montgomery">
		<meta name="keywords" content="Build Three Stone Ring, Gold Engagement Rings, Three Stone Princess Cut Engagement Ring, diamond solitaire engagement rings, princess cut engagement ring, engagement rings princess cut, designing engagement rings, two tone engagement rings online at discounted rate">
		<meta name="author" content="Heartsanddiamonds">
		<meta name="publisher" content="Heartsanddiamonds">
		<meta name="copyright" content="Heartsanddiamonds">
		<meta http-equiv="Reply-to" content="">
		<meta name="creation_Date" content="12/12/2008">
		<meta name="expires" content="">
		<meta name="revisit-after" content="7 days">
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">';
        $data['threestonerings'] = $this->Jewelrymodel->getAllThreestoneRing($metal,$sort);
        $data['platinum_count'] = count( $this->Jewelrymodel->getAllThreestoneRing('Platinum') );
        $data['whitegold_count'] =  count( $this->Jewelrymodel->getAllThreestoneRing('WhiteGold') );
        $data['curr1_page'] = SITE_URL.'jewelry/build_three_stone_ring';
        $data['curr_page'] = SITE_URL.'jewelry/build_three_stone_ring/false/';
        $setMetal = ( $metal ? $metal : 'false' );
        $data['price_sort'] = $data['curr_page'].$setMetal.'/';
		$data['extraheader'] = '<link type="text/css" href="' . SITE_URL . 'css/jquery-ui_3stone.css" rel="stylesheet" />';
		/*$data['extraheader'] .= '<script src="' . SITE_URL . 'js/jquery-1.10.2.js" type="text/javascript"></script>';*/
		$data['extraheader'] .= '<script src="' . SITE_URL . 'js/jquery-ui.js" type="text/javascript"></script>';
		if(isset($unique_price_list) && count($unique_price_list) > 0 ) {
			$data['minslide_price'] = round( min($unique_price_list) );
			$data['maxslide_price'] = round( max($unique_price_list) );
		} else {
			$data['minslide_price'] = $this->Jewelrymodel->getMinMaxPrice($metal);
			$data['maxslide_price'] = $this->Jewelrymodel->getMinMaxPrice($metal,'max');
		}
		$data['detail_list'] = $this->threed_rings_list( $data['threestonerings'], $metal );
	    $output = $this->load->view('jewelry/threestonering' , $data , true);
	    $this->output($output , $data,false);	
	}

    function unique_cate_list($cate_id=0) {
        $results_subcate = $this->Catemodel->getSubCategory($cate_id);
        
        $cateview_list = '';       

        if( count($results_subcate) > 0 ) {
            foreach($results_subcate as $rowcate) {
                $cateImgLink = RINGS_IMAGE.'crone/'.$rowcate['image'];
                $catedt_link = SITE_URL . 'jewelry/build_three_stone_ring/'.$rowcate['id'];

                $cateview_list .= '<div class="product_column col-sm-3">
                            <div class="product_imgcols">
                            <a href="'.$catedt_link.'">
                            <img src="'.$cateImgLink.'" alt="'.$rowcate['catname'].'"></a></div>
                            <div class="desc_seting">
                            <div><p>'.$rowcate['catname'].' </p></div>
                            </div>
                        </div>';
            }
        } else {
             $cateview_list .= '<h4>No Cate/Rings Records Found</h4>';
        }
        
        return $cateview_list;
    }

    /// unique section product list via category
	function unique_section_products($category_id=0) {
		$ringresults = $this->Catemodel->getRingsByCateory($category_id, 0, 100, '', '', '', 'supplied_stone', 'build');
		$cateview_list = '';
		$priceList = array();
		if( count($ringresults['results']) > 0 ) {
			foreach($ringresults['results'] as $rowrings) {
				$cur_stones1 = explode(',',$rowrings['supplied_stones']);
				$req_tot = 0;
				if(!empty($cur_stones1)){
					foreach($cur_stones1 as $cur_stone1){
						$req_data = explode('-',$cur_stone1);
						$req_tot = $req_tot + (int)$req_data[0];
					}
					$req_tot = $req_tot +1;
				}
				$weightigrm = str_replace(" grams","",$rowrings['metal_weight']);
				$metalprc = 70*$weightigrm;
				$stonprc = 14*$req_tot;
				$semiMountprce = $metalprc+$stonprc;
				$finalsemiMountprce = $semiMountprce*1.5;
				$main_amount = $finalsemiMountprce;
				$ringImgLink = SITE_URL . 'scrapper/imgs/'.$rowrings['ImagePath'];
				$ringdt_link = SITE_URL . 'site/engagementRingDetail/'.$rowrings['catid'].'/'.$rowrings['ring_id'];
				$priceList[] = $main_amount;
				$cateview_list .= '<div class="product_column col-sm-3">
					<div class="product_imgcols">
						<a href="'.$ringdt_link.'">
						<img src="'.$ringImgLink.'" width="155" height="144" alt="'.$rowrings['name'].'"></a>
					</div>
					<div class="desc_seting">
                        <div><p>Three Stone Ring - '.$rowrings['name'].' </p></div>
						<span class="price_label" style="float:none;">$'._nf($main_amount).'</span><br>
						<span style="color:#66ba96;font-size:16px;font-weight:700;display:inline-block;margin:5px 0 0 0;">Setting Price</span><br>
					</div>
				</div>';
			}
		}
		$return['product_list'] = $cateview_list;
		$return['price_list']   = $priceList;

		return $return;
    }

	function threed_rings_list($threestonerings=array(), $metals_option='') {
		$product_lists = '';
		$price_list = array();

		if(isset($threestonerings) && count($threestonerings) > 0){
			foreach ($threestonerings as $threestone){ 
               if( trim(strip_tags($threestone['description'])) != 'test' ) {
               $price_cols = metal_price_cols($metals_option);

                   if( trim($threestone['small_image'])!='' &&  file_exists('images/rings/'.$threestone['small_image']) ) {
                       $ring_image = SITE_URL . 'images/rings/'.$threestone['small_image'];
                   } else {
                       $ring_image = SITE_URL . 'images/rings/noimage.jpg';
                   }
                   $price_list[] = $threestone[$price_cols];
                   
                $product_lists .= '<div class="product_column col-sm-3">
                    <div class="product_imgcols">
                    <a href="'.SITE_URL.'jewelry/tothree_stonedetail/'.$threestone['stock_number'].'">
                    <img src="'.$ring_image.'" alt="Ring Title" /></a></div>
                    <div class="desc_seting">
                    <div>'.substr($threestone['description'],0,45).'</div>
                    <span class="price_label" style="float:none;">$'._nf($threestone[$price_cols]).'</span><br>
					<span style="color:#66ba96;font-size:16px;font-weight:700;display:inline-block;margin:5px 0 0 0;">Setting Price</span>
                   </div>
                </div>';
                
                    if( $i%4 == 0) { $product_lists .= '<div class="clear"></div>'; }				 
                        $i++; 
                    }
                  }
                } else { 
                    $product_lists .= 'No Ring Records Found';
                }
                
                $return['product_lists'] = $product_lists;
                $return['price_lists']   = $price_list;
                
            return $return;
        }
	///// get 3stone jewellery list
	function get3StoneJewellery($view_type='columns', $mtal_value='') {
		$minimm_price = $this->session->userdata('minimm_price');
		$maximm_price = $this->session->userdata('maximm_price');
		
		$metal_value = ( ( $mtal_value != '' && $mtal_value != 'columns' ) ? $mtal_value : 'false');
		$views_type = ( $view_type != '' ? $view_type : 'columns');
		
		
		$thre_stonering = $this->Jewelrymodel->getPriceSliderRings($metal_value);
		$threstone_ringlist = '';
		
		$threstone_ringlist .= '<div class="product_block">';
		$i = 1;
		if( count($thre_stonering) > 0 ) {
			if($views_type === 'columns') {
				foreach ($thre_stonering as $threestone){ 
				
				if( trim(strip_tags($threestone['description'])) != 'test' ) 
					{
					$price_cols = metal_price_cols($metal_value);
					if( trim($threestone['small_image'])!='' &&  file_exists('images/rings/'.$threestone['small_image']) )
							$ring_image =SITE_URL.'images/rings/'.$threestone['small_image'];															
						else	
							$ring_image = SITE_URL.'images/rings/noimage.jpg';
										
					$threstone_ringlist .= '<div class="product_column">
							<div class="product_imgcols">
							<a href="'.SITE_URL.'jewelry/tothree_stonedetail/'.$threestone['stock_number'].'">
							<img src="'.$ring_image.'" alt="Ring Title" /></a></div>
							<div class="desc_seting">
							<div>'.substr($threestone['description'],0,45).'</div>
							<span class="price_label" style="float:none;">$'._nf($threestone[$price_cols]).'</span><br>
							<span style="color:#66ba96;font-size:16px;font-weight:700;display:inline-block;margin:5px 0 0 0;">Setting Price</span>
							</div>
						</div>';
						if( $i%4 == 0) { $threstone_ringlist .= '<div class="clear"></div>'; }
						$i++;
					}
				}
			} else {
				foreach ($thre_stonering as $row_threstone){
					$details = $this->Jewelrymodel->getAllByStock($row_threstone['stock_number']);
					$detail_title = $details['style'].' '.$details['shape'].' Diamond Engagement Ring <span>in '.$details['metal'].' ('.$details['total_carats'].' tw.)</span>';
					$price_colm = metal_price_cols($metal);
					
					if( trim($row_threstone['small_image'])!='' &&  file_exists('images/rings/'.$row_threstone['small_image']) ) {
							$rings_image =SITE_URL.'images/rings/'.$row_threstone['small_image'];															
						} else {	
							$rings_image = SITE_URL.'images/rings/noimage.jpg';
						}
					
					$threstone_ringlist .= '<div class="prodblock_row">
							<div class="prodleft_cols">
							<div class="product_imgcols">
								<a href="'.SITE_URL.'jewelry/tothree_stonedetail/'.$row_threstone['stock_number'].'">
								<img src="'.$rings_image.'" alt="Ring Title"></a></div>
							</div>
							<div class="descright_cols">
								<div class="prodHeading">'.$detail_title.'</div>
								<div>Setting Price: $'.$row_threstone[$price_colm].'</div><br>
								<div>'.check_empty($row_threstone['description'], 'N/A').'</div><br>
							</div>
							<div class="clear"></div>
						 </div>';
						 
				} /// end detail view foreach
			} //// end view type else
		} else {
			 $threstone_ringlist .= '<div><h3>No Records Found!</h3></div>';
		}
			$threstone_ringlist .= '</div>';
		
		echo $threstone_ringlist;
	}
	function setSessValue($minprice, $maxprice) {
		$this->session->set_userdata('minimm_price', $minprice);
		$this->session->set_userdata('maximm_price', $maxprice);
	}
	///// tothree stone detail
	function tothree_stonedetail($stockno='', $ringmetal=''){
		$stockno = urldecode($stockno);
		$pth = FCPATH;
		$data = $this->getCommonData(); 
		$data['title'] = 'Build Your Own Three-Stone Ring Detail';
		$data['addthis_setting'] = SITE_URL.'diamonds/search/true/false/tothreestone/true/'.$stockno;
		$this->session->unset_userdata('build_3stone');
		$details = $this->Jewelrymodel->getAllByStock($stockno);
		$similar_rings = $this->Jewelrymodel->getSimilarRings($stockno,$details['metal']);
		
		$data['details'] = $details;
		$data['detail_title'] = $details['style'].' '.$details['shape'].' Diamond Engagement Ring <span>in '.$details['metal'].' ('.$details['total_carats'].' tw.)</span>';
		$data['seting_length'] = ( $details['length']!= '' ? $details['length'].' mm' : 'NA' );
		$data['seting_width']  = ( $details['width']!= '' ? $details['width'].' mm' : 'NA' );
					
		$data['detail_desc'] = $details['description'];
		
		$data['stockno'] = $stockno;
		//$data['ringoption'] = $ringoption;
		$data['centreid'] = $centerid;
		$data['sidestoneid1'] = $sidestone1;
		$data['sidestoneid2'] = $sidestoen2;
		
		$data['flashfiles']	= $this->Engagementmodel->getFlashByStockId($stockno);
				
		$data['centerStoneDetails']  = $this->Jewelrymodel->getDetailsByLot($centerid);
		$data['sideStone1Details']  = $this->Jewelrymodel->getDetailsByLot($sidestone1);
		
		$data['sideStone2Details']  = $this->Jewelrymodel->getDetailsByLot($sidestoen2);
		
		///// get similar rings list
		$getsimilar_rings = '';
		if(count($similar_rings) > 0) {
			 $image180 = SITE_URL . 'images/rings/icons/180/180degree.jpg';
			 
			foreach($similar_rings as $row_smring) {
				$flashfiles = $this->Engagementmodel->getFlashByStockId($row_smring['stock_number']);
				$similar_rglink = SITE_URL.'jewelry/tothree_stonedetail/'.$row_smring['stock_number'];
				$image90_bg = 'images/rings/icons/90' . $flashfiles['image90_bg'];
				if ($flashfiles['image180']) {
						$image180 = 'images/rings/icons/180' . $flashfiles['image180'];
						$image180 = (file_exists($pth.'/'. $image180)) ? SITE_URL . $image180 : SITE_URL . 'img/threstone/rw2_noimg.jpg';
					}
							
				$getsimilar_rings .= '<div class="product_bkcols">
                <div class="prodimgBlock"><a href="'.$similar_rglink.'"><img src="'.$image180.'" alt="" /></a></div>
                <div class="descRow">Shown with: '.$row_smring['total_carats'].' '.$row_smring['shape'].' '.$row_smring['name'].'</div>
                <div class="price_label">$'._nf($row_smring['price']).'</div>
                </div>';
			}
		}
		
		$data['getsimilar_rings'] = $getsimilar_rings;
		
		$uri = current_url();
		if($stockno != 'images' && $stockno != 'inner_Diamonds_05.jpg' && $stockno != 'images/inner_Diamonds_05.jpg') {
			$this->session->set_userdata('pendant_uri',$uri);
			$this->session->set_userdata('setings_id', $stockno);
		}
		
		//// metals options
		$metal_options = array('WhiteGold'=>'White Gold','YellowGold'=>'Yellow Gold','Platinum'=>'Platinum');
		
		$metal_list = '';
		foreach($metal_options as $metal_key => $metal_value) {
			$ring_link = SITE_URL.'jewelry/tothree_stonedetail/'.$stockno.'/'.$metal_key;
			if($metal_key != $ringmetal )
			$metal_list .= '<span class="chain_colst"><a href="'.$ring_link.'">'.$metal_value.'</a></span>';
		}
		
		$rings_metal = ( $ringmetal == '' ? $details['metal'] : $ringmetal );
		$metal_cols = metal_ringlabel($rings_metal);
		$data['rings_metal'] = $metal_cols['view_metal'];
		$data['ringmt_price'] = $details[$metal_cols['price_column']];
		
		$data['metal_list']	= $metal_list;
		$data['extraheader'] = '<script src="' . SITE_URL . 'js/swfobject.js" type="text/javascript"></script>';
		
		if($stockno != '') {
	    
		$this->session->set_userdata('rings_metal', $rings_metal);
		$output = $this->load->view('jewelry/threestonering_vdetail' , $data , true);
		$this->output($output , $data);	
		
		} else {
			redirect(SITE_URL, 'refresh');	
		}
	}
	function getMaxPrice(){
		$qry = "SELECT max( price ) AS max FROM ".config_item('table_perfix')."products_old";
		$result = 	$this->db->query($qry);
		$price = $result->result_array();	
		var_dump($price);
	}
	
	function getMaxPricePerCarat(){
		$qry = "SELECT max( pricepercrt ) AS max FROM ".config_item('table_perfix')."products";
		$result = 	$this->db->query($qry);
		$price = $result->result_array();	
		var_dump($price[0]['max']);
	}
	
	function bracelets()
	{
		$data = $this->getCommonData(); 
		$data['title'] = 'Bracelets';
	    $output = $this->load->view('jewelry/bracelets' , $data , true);
		$this->output($output , $data);		
	}
	
	function diamond(){
		
		$data = $this->getCommonData(); 
		$data['title'] = 'Diamond Jewelry';
	    $output = $this->load->view('jewelry/diamondjewelry' , $data , true);
		$this->output($output , $data);	
	}
	
	function earrings(){
		
		$data = $this->getCommonData(); 
		$data['title'] = 'Earrings';
	    $output = $this->load->view('jewelry/earrings' , $data , true);
		$this->output($output , $data);	
	}
	
	function gold(){
		
		$data = $this->getCommonData(); 
		$data['title'] = 'Gold Jewelry';
	    $output = $this->load->view('jewelry/gold' , $data , true);
		$this->output($output , $data);	
	}
	
	function necklaces(){
		
		$data = $this->getCommonData(); 
		$data['title'] = 'Necklaces & Pendants';
	    $output = $this->load->view('jewelry/necklaces' , $data , true);
		$this->output($output , $data);	
	}
	
	function pearls(){
		
		$data = $this->getCommonData(); 
		$data['title'] = 'Pearl Jewelry';
	    $output = $this->load->view('jewelry/pearls' , $data , true);
		$this->output($output , $data);	
	}
	
	function platinum(){
		
		$data = $this->getCommonData(); 
		$data['title'] = 'Platinum Jewelry';
	    $output = $this->load->view('jewelry/platinum' , $data , true);
		$this->output($output , $data);	
	}
	
	function silver(){
		
		$data = $this->getCommonData(); 
		$data['title'] = 'Sterling Silver Jewelry';
	    $output = $this->load->view('jewelry/silver' , $data , true);
		$this->output($output , $data);	
	}
	
	function watches(){
		
		$data = $this->getCommonData(); 
		$data['title'] = 'Watches & Accessories';
	    $output = $this->load->view('jewelry/watch' , $data , true);
		$this->output($output , $data);	
	}
	
	function weddings(){
		
		$data = $this->getCommonData(); 
		$data['title'] = 'Wedding Rings & Anniversary';
	    $output = $this->load->view('jewelry/weddings' , $data , true);
		$this->output($output , $data);	
	}
	function earringdiamondsajax($lot = '',$lot2='', $settingsid = '',$addoption = ''){
		$data = $this->getCommonData();
		$data['title'] = 'Earring Diamond Details'; 		
		$data['settingsid'] = $settingsid;		 
		$data['addoption'] = $addoption;		
		$data['lot'] = $lot;
		
		$diamond = $this->Diamondmodel->getDetailsByLot($lot);
		$data['diamond'] = $diamond;
		$data['sidestone1'] = $this->Diamondmodel->getDetailsByLot($lot);
		$data['sidestone2'] = $this->Diamondmodel->getDetailsByLot($lot2);
			
		$depth = $diamond['Depth'];
		$table = $diamond['TablePercent'];
		
		$tablemin = $table - 1;
		$tablemax = $table + 1;
		$depthmin = $depth - 1.5;
		$depthmax = $depth + 1.5;
		
		$tablecon = " TablePercent >= '".$tablemin."' and TablePercent <= '".$tablemax."' ";
		$depthcon = " Depth >= '".$depthmin."' and Depth <= '".$depthmax."' ";
		
		$data['pairdiamond'] = $this->Diamondmodel->getPairSidestone($diamond['carat'], $diamond['color'], $diamond['clarity'],$tablecon, $depthcon);
			
	    $output = $this->load->view('jewelry/earringstonedetails' , $data , true);		
		echo $output;
	}

	function earringdetailsview($addoption = '', $settingsid = '', $lot = '', $lot2 = ''){
		$data = $this->getCommonData(); 
		$data['title'] = 'Earring Jewelry';
		$data['settingsid'] = $settingsid;		 
		$data['addoption'] = $addoption;		
		$data['lot'] = $lot;
		$data['settingsdetails'] = $this->Jewelrymodel->getEarringSettingsById($settingsid);
		$diamond = $this->Diamondmodel->getDetailsByLot($lot);
		$data['diamond'] = $diamond;
		$data['sidestone1'] = $this->Diamondmodel->getDetailsByLot($lot);
		$data['sidestone2'] = $this->Diamondmodel->getDetailsByLot($lot2);

		$depth = $diamond['Depth'];
		$table = $diamond['TablePercent'];

		$tablemin = $table - 1;
		$tablemax = $table + 1;
		$depthmin = $depth - 1.5;
		$depthmax = $depth + 1.5;

		$tablecon = " TablePercent >= '".$tablemin."' and TablePercent <= '".$tablemax."' ";
		$depthcon = " Depth >= '".$depthmin."' and Depth <= '".$depthmax."' ";
		
		$data['pairdiamond'] = $this->Diamondmodel->getPairSidestone($diamond['carat'], $diamond['color'], $diamond['clarity'],$tablecon, $depthcon);
		
	    $output = $this->load->view('jewelry/earringdetailsview' , $data , true);
		$this->output($output , $data);	
		
	}
	
	function addbasket($addoption = '',$settings = '', $lot = ''){
		$data = $this->getCommonData(); 
		$data['title'] = 'Jewelry';
		
		header('location:'.SITE_URL.'addtocart/false/false');
	    //$output = $this->load->view('jewelry/index' , $data , true);
		//$this->output($output , $data);	
	}
	
	function searchearringstyle(){		
		$data = $this->getCommonData(); 
		$data['title'] = 'Search Earring Style';
		$data['tabhtml'] = $this->Commonmodel->earringTab('style');
						
	    $output = $this->load->view('jewelry/searchearringstyle' , $data , true);
		$this->output($output , $data);		
	}
	
	//----------------------------------------jewelry earring-----------------------------------------------
	
	function getStyleResult($shape ='', $metal = '', $style = ''){
		$metalhtml = '';
		$stylehtml= '';
		if($shape != ''){
			$metalhtml = $this->getMetalHtml($shape);
		}
		if($metal != ''){
			$earringsettings = $this->Jewelrymodel->getEarringSettingsByShapeMetal($shape, $metal);			
			$stylehtml = $this->getStyleHtmls($metal, $shape);
		}
	}
	
	function getStyleHtmlResult($metal, $shape){
		$stylehtml = $this->getStyleHtmls($metal, $shape);
	}
	
	function getMetalHtml($shape = '' , $isajax = true){
		if($shape == 'B'){
			$returnhtml = '
						<div class="commonheader white">2. Select Your Metal</div>
							<div style="margin-top:10px;">
					   				<div class="floatl smallbox txtcenter" style="color:black; width:120px;">
							   				<label for="platinum"><img src="'.SITE_URL.'images/tamal/jewelry/roundplat.jpg"></label> <br>
							   				<input type="radio" name="Bmetal" id="platinum" onclick="getstyleresult(this,\''.$shape.'\'); genericshowhide(\'buttondiv\',\'false\')" >Platinum
							   		</div>						   		
							   		<div class="floatl smallbox txtcenter" style="color:black; width:120px;">
							   				<label for="18kwhitegold"><img src="'.SITE_URL.'images/tamal/jewelry/roundwg.jpg"></label> <br>
							   				<input type="radio" name="Bmetal" id="18kwhitegold" onclick="getstyleresult(this,\''.$shape.'\'); genericshowhide(\'buttondiv\',\'false\')">18k White Gold
							   		</div>
							   		<div class="floatl smallbox txtcenter" style="color:black; width:120px;">
							   				<label for="18kyellowgold"><img src="'.SITE_URL.'images/tamal/jewelry/roundyg.jpg"></label> <br>
							   				<input type="radio" name="Bmetal" id="18kyellowgold" onclick="getstyleresult(this,\''.$shape.'\'); genericshowhide(\'buttondiv\',\'false\')">18k Yellow Gold
							   		</div>
							   		<div class="clear"></div>
					   		</div>
							';
		}
		elseif($shape == 'PR'){
			$returnhtml = '
							<div class="commonheader white">2. Select Your Metal</div>
					   		<div style="margin-top:10px;">
					   				<div class="floatl smallbox txtcenter" style="color:black; width:120px;">
							   				<label for="platinum"><img src="'.SITE_URL.'images/tamal/jewelry/princessplat.jpg"></label> <br>
							   				<input type="radio" name="PRmetal" id="platinum" onclick="getstyleresult(this,\''.$shape.'\'); genericshowhide(\'buttondiv\',\'false\')" >Platinum
							   		</div>
							   		<div class="floatl smallbox txtcenter" style="color:black; width:120px;">
							   				<label for="18kyellowgold"><img src="'.SITE_URL.'images/tamal/jewelry/princessyg.jpg"></label> <br>
							   				<input type="radio" name="PRmetal" id="18kyellowgold" onclick="getstyleresult(this,\''.$shape.'\'); genericshowhide(\'buttondiv\',\'false\')" >18k Yellow Gold
							   		</div>
							   		<div class="floatl smallbox txtcenter" style="color:black; width:120px;">
							   				<label for="18kwhitegold"><img src="'.SITE_URL.'images/tamal/jewelry/princesswg.jpg"></label> <br>
							   				<input type="radio" name="PRmetal" id="18kwhitegold" onclick="getstyleresult(this,\''.$shape.'\'); genericshowhide(\'buttondiv\',\'false\')" >18k White Gold
							   		</div>
							   		<div class="clear"></div>
					   		</div>	
			
			';
			
		}
		elseif($shape == 'E'){
			$returnhtml = '
							<div class="commonheader white">2. Select Your Metal</div>
					   		<div>
					   				<div class="floatl smallbox txtcenter" style="color:black;">
							   				<label for="platinum"><img src="'.SITE_URL.'images/tamal/jewelry/sel_metal_pl.jpg"></label> <br>
							   				<input type="radio" name="Emetal" id="platinum" onclick="getstyleresult(this,\''.$shape.'\'); genericshowhide(\'buttondiv\',\'false\')"  >Platinum
							   		</div>
							   		<div class="floatl smallbox txtcenter" style="color:black;">
							   				<label for="18kyellowgold"><img src="'.SITE_URL.'images/tamal/jewelry/sel_metal_18y.jpg"></label> <br>
							   				<input type="radio" name="Emetal" id="18kyellowgold" onclick="getstyleresult(this,\''.$shape.'\'); genericshowhide(\'buttondiv\',\'false\')" >18k Yellow Gold
							   		</div>
							   		<div class="floatl smallbox txtcenter" style="color:black;">
							   				<label for="18kwhitegold"><img src="'.SITE_URL.'images/tamal/jewelry/sel_metal_pl.jpg"></label> <br>
							   				<input type="radio" name="Emetal" id="18kwhitegold" onclick="getstyleresult(this,\''.$shape.'\'); genericshowhide(\'buttondiv\',\'false\')" >18k White Gold
							   		</div>
							   		<div class="clear"></div>
					   		</div>	
			
			';
		}
		else $returnhtml = '';
		$returnhtml .= '<div id="styleresult"></div>
						<div class="dbr"></div> ';
		if($isajax) echo $returnhtml;
		else return $returnhtml;
			
	}
	
	function getStyleHtml($metal = '', $shape = '', $isajax = true){
		if($shape == 'B'){
			if($metal == 'platinum'){
				$returnhtml = '
								<div class="commonheader white">3. Select Your Stylea</div>
						   		<div>	   		
						   				<div class="floatl smallbox txtcenter">
								   				<label for="Bfpr_pl"><img src="'.SITE_URL.'images/tamal/jewelry/sel_metal_pl_r.jpg"></label> <br>
								   				<input type="radio" name="Bstyle" id="Bfpr_pl" onclick="genericshowhide(\'buttondiv\',\'true\'); getearringsettings(\''.$shape.'\',\''.$metal.'\')">Four-Prong								   				
								   		</div>
								   		<div class="floatl smallbox txtcenter">
								   				<label for="Bbz_pl"><img src="'.SITE_URL.'images/tamal/jewelry/sel_style_bezel_r.jpg"></label> <br>
								   				<input type="radio" name="Bstyle" id="Bbz_pl" onclick="genericshowhide(\'buttondiv\',\'true\')">Bezel-Set 
								   		</div>	
								   		<div class="clear"></div> 
						   		</div>
				
				';
			}
			elseif($metal == '18kwhitegold'){
				$returnhtml = '
				
								<div class="commonheader">3. Select Your Style</div>
								<div>	   		
						   				<div class="floatl smallbox txtcenter">
								   				<label for="Bfpr_18wg"><img src="'.SITE_URL.'images/tamal/jewelry/sel_metal_pl_r.jpg"></label> <br>
								   				<input type="radio" name="Bstyle" id="Bfpr_18wg" onclick="genericshowhide(\'buttondiv\',\'true\')">Four-Prong
								   		</div>
								   		<div class="floatl smallbox txtcenter">
								   				<label for="Bbz_18wg"><img src="'.SITE_URL.'images/tamal/jewelry/sel_style_bezel_r.jpg"></label> <br>
								   				<input type="radio" name="Bstyle" id="Bbz_18wg" onclick="genericshowhide(\'buttondiv\',\'true\')">Bezel-Set 
								   		</div>
								   		<div class="clear"></div> 
						   		</div>
				';
			}
			elseif($metal == '18kyellowgold'){
				$returnhtml = '
								<div class="commonheader">3. Select Your Style</div>
								<div>   		
						   				<div class="floatl smallbox txtcenter">
								   				<label for="Bfpr_18yg"><img src="'.SITE_URL.'images/tamal/jewelry/sel_style_4prong_yg_r.jpg"></label> <br>
								   				<input type="radio" name="Bstyle" id="Bfpr_18yg" onclick="genericshowhide(\'buttondiv\',\'true\')">Four-Prong
								   		</div>
								   		<div class="floatl smallbox txtcenter">
								   				<label for="Bbz_18yg"><img src="'.SITE_URL.'images/tamal/jewelry/sel_style_bez_yg_r.jpg"></label> <br>
								   				<input type="radio" name="Bstyle" id="Bbz_18yg" onclick="genericshowhide(\'buttondiv\',\'true\')">Bezel-Set 
								   		</div>	
								   		<div class="clear"></div> 
						   		</div>
				';
			}
			else $returnhtml = '';
		}
		elseif ($shape == 'PR'){
			if($metal == 'platinum'){
				$returnhtml = '
								<div class="commonheader">3. Select Your Style</div>
						   		<center>	   		
						   				<div class="smallbox">
								   				<label for="PRfpr_pl"><img src="'.SITE_URL.'images/tamal/jewelry/sel_metal_pl.jpg"></label> <br>
								   				<input type="radio" name="PRstyle" id="PRfpr_pl" onclick="genericshowhide(\'buttondiv\',\'true\')">Four-Prong
								   		</div> 				   		
						   		</center>
				
				';
			}
			elseif($metal == '18kwhitegold' ){
				$returnhtml = '
								<div class="commonheader">3. Select Your Style</div>
						   		<center> 
										<div class="smallbox">
								   				<label for="PRfpr_wg"><img src="'.SITE_URL.'images/tamal/jewelry/sel_metal_pl.jpg"></label> <br>
								   				<input type="radio" name="PRstyle" id="PRfpr_wg" onclick="genericshowhide(\'buttondiv\',\'true\')">Four-Prong
								   		</div> 				   		
						   		</center>
				
				';
			}
			elseif ($metal == '18kyellowgold'){
				$returnhtml = '
								<div class="commonheader">3. Select Your Style</div>
						   		<center>  
										<div class="smallbox">
								   				<label for="PRfpr_yg"><img src="'.SITE_URL.'images/tamal/jewelry/sel_metal_18y.jpg"></label> <br>
								   				<input type="radio" name="PRstyle" id="PRfpr_yg" onclick="genericshowhide(\'buttondiv\',\'true\')">Four-Prong
								   		</div>
																   		
						   		</center>
				
				';
			}
			else $returnhtml = '';
		}
		elseif($shape == 'E'){
			if($metal == 'platinum'){
				$returnhtml = '
								<div class="commonheader">3. Select Your Style</div>
						   		<center> 		
						   				<div class="smallbox">
								   				<label for="Efpr_pl"><img src="'.SITE_URL.'images/tamal/jewelry/sel_metal_pl.jpg"></label> <br>
								   				<input type="radio" name="Estyle" id="Efpr_pl" onclick="genericshowhide(\'buttondiv\',\'true\')">Four-Prong
								   		</div> 				   		
						   		</center>
				
				';
			}
			elseif($metal == '18kwhitegold'){
				$returnhtml = '
								<div class="commonheader">3. Select Your Style</div>
						   		<center>  
										<div class="smallbox">
								   				<label for="Efpr_wg"><img src="'.SITE_URL.'images/tamal/jewelry/sel_metal_pl.jpg"></label> <br>
								   				<input type="radio" name="Estyle" id="Efpr_wg" onclick="genericshowhide(\'buttondiv\',\'true\')">Four-Prong
								   		</div> 			   		
						   		</center>
				
				';
			}
			elseif ($metal == '18kyellowgold'){
				$returnhtml = '
								<div class="commonheader">3. Select Your Style</div>
						   		<center> 
										<div class="smallbox">
								   				<label for="Efpr_yg"><img src="'.SITE_URL.'images/tamal/jewelry/sel_metal_18y.jpg"></label> <br>
								   				<input type="radio" name="Estyle" id="Efpr_yg" onclick="genericshowhide(\'buttondiv\',\'true\')">Four-Prong
								   		</div>						   		
						   		</center>
				
				';
			}
			else $returnhtml = ''; 
		}
		 
			
		
		if($isajax) echo $returnhtml;
		else return $returnhtml;
	}
	
	function getStyleHtmls($metal, $shape, $isajax = true){  
		$returnhtml = '';
		$earringsettings = $this->Jewelrymodel->getEarringSettingsByShapeMetal($shape, $metal);	
		 
		if(isset($earringsettings)){
			$returnhtml = '<div class="clear"></div>
							<div class="commonheader white" style="margin-top:10px; margin-bottom:10px;">3. Select Your Style</div>
							<div>';
			
			foreach ($earringsettings as $earring){
				$returnhtml .= '
										<div class="floatl smallbox txtcenter" style="color:black; width:150px;">
								   				<label for="'.$earring['style'].'"><img src="'.SITE_URL.$earring['small_image'].'"></label> <br>
								   				<input type="radio" name="Bstyle" id="'.$earring['style'].'" onclick="genericshowhide(\'buttondiv\',\'true\'); selectsettingsid('.$earring['id'].')">'.$earring['style'].'
								   				<br> $'.$earring['price'].'
								   		</div>								
								';
			}
			
			$returnhtml .= '		<div class="clear"></div>
								</div>
							';
		}
		
		if($isajax) echo $returnhtml;
		else return $returnhtml;
	} 
	 
	//-----------------------------------------earring end--------------------------------------------------
	
	function diamondstudearring(){
		$data = $this->getCommonData(); 
		$data['title'] = 'Jewelry: Diamond Stud Earring';
		
		$data['collections'] = $this->Jewelrymodel->getNameBySection('Diamond Stud Earrings');
		
	    $output = $this->load->view('jewelry/diamondstudearring' , $data , true);
		$left=1;
		$this->output($output , $data,$left);		
	}
	
	function earringstuddetailsajax($stockno = '', $addoption = '',$price = ''){
		$data = $this->getCommonData();		
		$data['title'] = 'Earring Stud Details';
		$data['addoption'] = $addoption;
		$data['price'] = $price;
		
		$data['details'] = $this->Jewelrymodel->getByStock($stockno); 			
	    $output = $this->load->view('jewelry/earringstuddetails' , $data , true);		
		echo $output;
	}
	
	function addtobasket($stockno=''){		
		$data = $this->getCommonData();
		$data['title'] = 'Basket'; 
		
		header('location:'.SITE_URL.'addtocart');
	}
	
	function pendantdetailsview($addoption = '',$lot = '', $settings = '', $sidestone1 = '', $sidestone2 = ''){
		$data = $this->getCommonData();
		$data['title'] = 'Jewelry: Pendant Details';
		$data['details'] = $this->Jewelrymodel->getPendentSettingsById($settings);
		$details = $data['details'];
		
		$data['nexturl'] = '#';
		$data['onclickfunction'] = '';
		$side1price = 0;
		$side2price = 0; 
		
		$centerdiamond = $this->Diamondmodel->getDetailsByLot($lot);
		$centerprice = $centerdiamond['price'] ;
		
		if($sidestone1 != '' && $sidestone1 != 'false'){
			$side1 = $this->Diamondmodel->getDetailsByLot($sidestone1);
			$side1price = $side1['price'];
		}
		if($sidestone2 != '' && $sidestone2 != 'false'){
			$side2 = $this->Diamondmodel->getDetailsByLot($sidestone2);
			$side2price = $side2['price'];
		} 
		
		$settingsprice = $details['price'];		 
		$totalprice = $centerprice + $settingsprice + $side1price + $side2price;
		$data['diamondprice'] = $centerprice;
		$data['side1price'] = $side1price;
		$data['side2price'] = $side2price;
		$data['settingsprice'] = $settingsprice;
		$data['totalprice'] = $totalprice;
		
		switch ($addoption) {
			case 'addpendantsetings': 
				$data['onclickfunction'] = 'addtocart(\''.$addoption.'\',\''.$lot.'\',false,false,\''.$settings.'\',\''.$totalprice.'\')';
				break;
			default:
				break;
		}
		
	    $output = $this->load->view('jewelry/pendantdetailsview' , $data , true);
		$this->output($output , $data);	
	}
	function jewelrybymenu(){
		$data = $this->getCommonData(); 
		$data['title'] = 'Jewelry';
		$data['jewalry'] = $this->Jewelrymodel->getJewelryByMenu($this->uri->rsegment(3));
		$output = $this->load->view('jewelry/jewelrybymenu' , $data , true);
		$this->output($output , $data);
	}
	function jewelrydetailview(){
		$data = $this->getCommonData(); 
		$data['title'] = 'Jewelry';
		$data['jewalry'] = $this->Jewelrymodel->getJewelryByStockNumber($this->uri->rsegment(3));
		$this->load->view('jewelry/jewelrydetail' , $data);
	}
}
?>
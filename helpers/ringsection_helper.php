<?php
function askQuestionForm() {
	$questionAsk = '<div class="prdTabs" style="display: block;" id="tab7">
		<span>Contact us 24/7 using <a href="javascript:void" onclick="javascript: liveChat();">Live Chat</a>, call us Mon-Fri 10am-9pm EST toll free in USA: '.SITE_EMAIL.', outside USA: '.CONTACT_NO.', email us at <a href="mailto:'.SITE_EMAIL.'">'.SITE_EMAIL.'</a> or use the form below:</span>
		<a name="question-form"></a>
		<form action="" id="questionForm" method="post">
			<ul id="msg-area" class="messages"></ul>
			<span class="fieldset">
				<ul class="form-list">
					<li class="fields">
						<span class="field">
							<label for="name" class="required"><em>*</em>Name</label>
							<span class="input-box">
								<input name="name" id="name" title="Name" value="" class="input-text required-entry" type="text">
							</span>
						</span>
						<span class="field">
							<label for="phone" class="required">Phone</label>
							<span class="input-box">
								<input name="phone" id="phone" title="Phone" value="" class="input-text" type="text">
							</span>
						</span>
					</li>
					<li class="fields">
						<span class="field">
							<label for="email" class="required"><em>*</em>Email</label>
							<span class="input-box">
								<input name="email" id="" title="Email" value="" class="input-text required-entry validate-email" type="text">
							</span>
						</span>
						<span class="field">
							<label for="email" class="required"><em>*</em>Retype Email</label>
							<span class="input-box">
								<input name="retypeemail" id="retypeemail" title="Retype Email" value="" class="input-text required-entry validate-cemail" type="text">
							</span>
						</span>
					</li>
					<li class="fields">
						<span class="field">
							<label for="comment" class="required"><em>*</em>Your Question</label>
							<span class="input-box">
								<textarea name="question" id="question" title="Question" class="required-entry input-text" cols="5" rows="3" style="height:6em;width: 232px;"></textarea>
							</span>
						</span>
						<span class="field">
							<span id="captcha-loader" style="display:none;margin-top:10px;"></span>
							<br>
							<label for="message" class="required"><em>*</em>Enter code</label>
							<span class="input-box">
								<input id="6_letters_code" name="6_letters_code" type="text" class="input-text required-entry">
								<br>
								<small style="color:#555555;font-size:0.9em;font-style:italic;">Can\'t read the image? click <a href="javascript: refreshCaptcha();">here</a> to refresh</small>
							</span>
						</span>
					</li>
				</ul>
			</span>
			<span class="buttons-set"> 
				<a href="#javascript;" onclick="postComents()" class="commentBtn">Send Your Question</a>
				<button style="display:none" type="submit" id="submitme" title="submit me" class="button form-button"><span><span>submit me</span></span></button>
			</span>
		</form>
	</div>';
    return $questionAsk;
}

function page_sort_listing($sort_link='', $sort='ASC') {
	$sorting = '<option value="'.$sort_link.'ASC" '.selectedOption('ASC', $sort).'>Low To High Price</option>
	<option value="'.$sort_link.'DESC" '.selectedOption('DESC', $sort).'>High To Low Price</option>';
	return $sorting;
}

function collection_cate_name($c_id=0) {
	switch ($c_id) {
		case 740520027:
			$rowcate = 'Rings';
			break;
		case 740520028:
			$rowcate = 'Rings and Bands';
			break;
		case 740520029:
			$rowcate = 'Earrings';
			break;
		case 740520030:
			$rowcate = 'Wedding Bands';
			break;
		default :
			$rowcate = 'Rings';
			break;
	}
	return $rowcate;
}

function unique_section_bread_crumb($rowcate=array(), $main='') {
	$bread_crumb = '';
	if( !empty($rowcate['main_cate_name']) ) {
		if( $rowcate['main_cate_id'] != 7 ) {
			$bread_crumb .= '<li><a href="'.SITE_URL.'heartdiamond/heart_collection">The Gold Source Collection</a></li> >';
		}
		$bread_crumb .= '<li><a href="'.SITE_URL.'selection/engagementrings/'.$rowcate['main_cate_id'].'">'.$rowcate['main_cate_name'].'</a></li>';
	}
	$not_allow = array('Halo', 'Wedding Bands', 'Pendants', 'Engagement Rings');

	if( !empty($main) ) {
		if( !empty($rowcate['main_cname']) &&  !in_array($rowcate['main_cname'], $not_allow) ) {
			$bread_crumb .= ' > <li><a href="#">'.$rowcate['main_cname'].'</a></li>';
		}
	} else {
		if( !empty($rowcate['sub_cname']) && !in_array($rowcate['sub_cname'], $not_allow) ) {
			$bread_crumb .= ' > <li><a href="'.SITE_URL.'selection/engagementrings/'.$rowcate['sub_cid'].'">'.$rowcate['sub_cname'].'</a></li>';
		}
		if( !empty($rowcate['main_cname']) ) {
			$bread_crumb .= ' > <li><a href="'.SITE_URL.'selection/engagement_ring_listings/'.$rowcate['main_cid'].'">'.$rowcate['main_cname'].'</a></li>';
		}
	}
	return $bread_crumb;
}

function getDiamondShape($shape='') {
	$diamond_shape = trim( strtoupper($shape) );
	switch ($diamond_shape) {
		case 'RD':
		case 'ROUND':
			$diamonds_shape = 'B';
			break;
		case 'CU':
		case 'CUSHION':
			$diamonds_shape = 'C';
			break;
		case 'OV':
		case 'OVAL':
			$diamonds_shape = 'O';
			break;
		case 'EM':
		case 'EMERALD':
			$diamonds_shape = 'E';
			break;
		case 'HS':
		case 'HEART':
			$diamonds_shape = 'H';
			break;
		case 'RA':
		case 'RADIANT':
			$diamonds_shape = 'R';
			break;
		case 'BG':
			$diamonds_shape = 'BG';
			break;
		case 'PS':
			$diamonds_shape = 'PS';
			break;
		case 'PRINCESS':
			$diamonds_shape = 'PR';
			break;
		case 'PEAR':
			$diamonds_shape = 'P';
			break;
		case 'MARQUISE':
			$diamonds_shape = 'M';
			break;
		case 'Combination':
			$diamonds_shape = 'false';
			break;
		default:
			$diamonds_shape = $shape;
			break;
	}
	return $diamonds_shape;
}

/* set metal name */
function set_ring_metal($metal='') {
	switch ($metal) {
	   case '14KP':
		   $metal_name = '14 Karat Pink';
		   break;
	   case '14KW':
		   $metal_name = '14 Karat White';
		   break;
	   case '14KY':
		   $metal_name = '14 Karat Yellow';
		   break;
	   case '18KP':
		   $metal_name = '18 Karat Pink';
		   break;
	   case '18KW':
		   $metal_name = '18 Karat White';
		   break;
	   case '18KY':
		   $metal_name = '18 Karat Yellow';
		   break;
	   case 'PDIUM':
		   $metal_name = 'Pladium';
		   break;
	   case 'PLAT':
		   $metal_name = 'Platinum';
		   break;
	   default :
		   $metal_name = $metal;
		   break;
	}
	return $metal_name;
}

/* set jewelry metal name */
function set_jew_metal($metal, $carat) {
	$metal_carat = '';
	if( !empty($carat) ) {
		if( $carat == 14 || $carat == 18 ) {
			$metal_carat = $carat . 'k_';
		}
	}
	$jewMetal = 'NA';
	if( !empty($metal) ) {
		$jewMetal = $metal_carat . strtolower($metal);
	}
	return $jewMetal;
}

function get_unique_ring_diamond_shape($center_stone='') {
	$stone_ar = explode('/', $center_stone);
	if(isset($stone_ar[1])){
		$shape_str = explode(', ', $stone_ar[1]);
		switch ($shape_str[0]) {
			case 'RD' :
				$shape_value = 'B';
				break;
			case 'OV' :
				$shape_value = 'O';
				break;
			case 'HR' :
				$shape_value = 'H';
				break;
			case 'PR' :
				$shape_value = 'PR';
				break;
			case 'MA' :
				$shape_value = 'M';
				break;
			case 'PE' :
				$shape_value = 'P';
				break;
			case 'EC' :
				$shape_value = 'E';
				break;
			case 'CU' :
				$shape_value = 'C';
				break;
			case 'AS' :
				$shape_value = 'AS';
				break;
			case 'RAD' :
				$shape_value = 'R';
				break;
			default :
				$shape_value = 'false';
				break;
		}
	}else{
		$shape_value = 'false';
	}
	return $shape_value;
}

function getRolexSubCategoryList($perPage=0, $cate_type='', $cate_id=0, $sort_field='ASC') {
	$CI = & get_instance();
	$CI->load->model('tvjohny_watchesmodel');

	$results = $CI->tvjohny_watchesmodel->rolexWatchesCategoryRows($cate_type);
	$cate_list = '';
	$not_allowid = array(1, 2, 17);
	$cate_options = '';

	foreach( $results as $rows ) {
		$cate_title = ( !empty($rows['sub_sub_cate']) ? $rows['sub_sub_cate'] : $rows['sub_cate_name'] );
		if( !in_array($rows['id'], $not_allowid) ) {
			$cate_list_link = SITE_URL . 'tvjonhy_watches/rolex_watches_listing/' . $rows['id'] . '/' . $perPage.'/?sort_option='.$sort_field;
			$cate_list .= '<li><a href="'.$cate_list_link.'">'.$cate_title.'</a></li>';
			$cate_options .= '<option value="'.$cate_list_link.'" '.selectedOption($cate_id, $rows['id']).'>'.$cate_title.'</option>';
		}            
	}
	$returns['cate_list'] = $cate_list;
	$returns['cate_options'] = $cate_options;

	return $returns;
}

function rolex_newwatches_details($rows=[], $listing_detail='') {
	$columns_list = getTvJonyTableFields();

	$item_details = '';
	$listingDetail = '';

	foreach( $columns_list as $column_name ) {
		$cols_lable = str_replace('_', ' ', $column_name);
		$cols_value = $rows[$column_name];

		if( !empty($cols_value) ) {
			$item_details .= '<li><span class="property">'.$cols_lable.':</span> <span class="value">'.$cols_value.'</span></li>';
			$listingDetail .= '<tr class="first-row">
			<th style="width:40%;">'.$cols_lable.':</th>
			<td>'.$cols_value.'</td>
			</tr>';
		}
	}

	if( !empty($listing_detail) ) {
		return $listingDetail;
	} else {
		return $item_details;
	}
}

/* soptlight random products list */
function spotlight_random_products() {
	$CI = & get_instance();
	$CI->load->model('tvjohny_watchesmodel');

	$random_prod = '';
	$results = $CI->tvjohny_watchesmodel->getTvJonhyRandomProducts();
	foreach( $results as $rows ) {
		$detail_link = SITE_URL . 'tvjonhy_watches/rolex_watches_detail/' . $rows['id'];
		$imageLink = getTvJohnyItemFirstImg( $rows['Image_1'] ); /// common_script helper

		$random_prod .= '<div class="rightrow">
			<div class="right_leftcols"><a href="'.$detail_link.'"><img src="'.$imageLink.'" alt="'.$rows['Title'].'" /></a></div>
			<div class="right_rightcols">
				<div>'.$rows['Title'].'</div>
				<div class="set_price_label">$'._nf($rows['Price'], 2).'</div>
			</div>
			<div class="clear"></div>
		</div>';
	}
	return ''; //$random_prod;
}

function getTvJonyTableFields() {
	$columns_list = array(
		'SKU',
		'Diamond_Quality_and_Carat_Weight',
		'Metal_Type',
		'Gold_Plating_Color',
		'Category',
		'Subcategory_1',
		'Subcategory_2',
		'Item_Length',
		'CZ_Color',
		'CZ_Shape',
		'Diamond_Clarity',
		'Gold_Type',
		'Gold_Color',
		'Item_Weight',
		'Carat_Weight',
		'Diamond_Color',
		'Size',
		'Diamond_Weight',
		'Length',
		'Item_Width',
		'Total_Carats',
		'Diamond_Size',
		'Diamond_Shape',
		'Total_Carat_Weight',
		'Diamond',
		'Gold_type2',
		'Ruby_ct_weight',
		'Diamond_ct_weight',
		'Warranty',
		'Case',
		'Band_Length',
		'Item_Size',
		'Number_Of_Engraved_Teeth',
		'Back_Bar',
		'Dial_Color',
		'Bezel',
		'Bezel',
		'Band_Type',
		'Water_Resistant',
		'CZ',
		'Width',
		'Band',
		'Crystal',
		'Movement',
		'Item_Color',
		'Item_size2',
		'Stone',
		'Stone_Shape',
		'Plating_Color',
		'Dial',
		'Water_Resistance',
		'Movements',
		'Strap_Size',
		'Total_Item_Weight',
		'Stone_Type',
		'Diamond_Carrat',
		'Gold',
		'Earring_Back_Type',
		'Length_and_Width',
		'Diamond_color2',
		'Item_Height',
		'Item_weight2',
		'Appx_Carat_Weight',
		'Stone_Color',
		'Stone_Weight',
		'Grill_Metal',
		'Width_Size',
		'Clasp',
		'Case_Diameter',
		'Stone_Clarity',
		'Height',
		'Weight',
		'Ring_size',
		'Ring_weight',
		'Diamond_Cuts',
		'Pink_Sapphire_Weight',
		'Center_Stone_Color',
		'CaratWeight',
		'Number_of_engraved_teeth2',
		'Gold_Clarity',
		'Warrnty',
		'CZ_Clarity',
		'Necklace_Length',
		'Color',
		'Blue_Topaz_ct_weight',
		'Crystal_Color',
		'Crystal_Shape',
		'Diamond_shape2',
		'Diamond_Carat_Weight',
		'Ring_Size2',
		'Width_and_Length',
		'Red_Ruby_Weight',
		'Total',
		'Chain_Length',
		'Diamomd_Shape',
		'Pendant_Length',
		'Pendant_Width',
		'Band_Width',
		'Engraving',
		'Center_Stone',
		'Diamond_clarity_2',
		'Plating_Type',
		'Clarity',
		'Measurements',
		'Number_of_Teeth',
		'Chain_length2',
		'Item_Length_and_Width',
		'Thickness',
		'Apprx_Length',
		'Apprx_Width',
		'Hour_Markers',
		'Case_Material',
		'Diamond_Color_Stones',
		'Center_Carat_Size',
		'Earrings_back_type',
		'Red_Ruby_Carat_Weight',
		'Chain_Color',
		'Number_of_3D_Images',
		'Appx_Weight',
		'Ruby_Total_Carat_Weight',
		'Diamond_Total_Carat_Weight',
		'Engraved',
		'Diamond_CTW',
		'Primary_Stone_Style',
		'Primary_Stone_Size',
		'Gemstone',
		'Total_Weight',
		'Diamonds_and_Stones',
		'Plating',
		'Gold_color2',
		'Total_Ct_Weight',
		'Jewelry_Metal',
		'Metal_Color',
		'Width_of_Coin',
		'Casing',
		'Bluetooth',
		'Camera',
		'Phone_Calls',
		'USB_Cord',
		'Enamel_Color',
		'Garnet_ct_weight',
		'Citrine_ct_weight',
		'Chain_Size',
		'Damond_Clarity',
		'Diamond_Colors',
		'Jewlery_Description',
		'Extended_Fangs',
		'Number_of_Engraved_Teeth3',
		'Tooth_Ring',
		'Number_of_Engraved_Teeth4',
		'Necklace',
		'Brand_Name_Model_Number',
		'Diampnd_Color',
		'Diamond_Type',
		'Citrinect_weight',
		'Setting',
		'Item_Thickness',
		'Diamond_Stone_Color',
		'Diamond_Stone_Color',
		'Main_Color',
		'Item_Length_Width',
		'Carats',
		'Diameter',
		'Diamond_Shapes'
	);
	return $columns_list;
}

function getRolexWacthesLabelFieldsValue($rows=[]) {
	$fields_list = array(
		'Status' => $rows['status'],
		'Average Weight' => $rows['average_weight'],
		'Country of Origin' => $rows['country'],
		'Metal' => $rows['metal'],
		'Product Type' => $rows['product_type'],
		'Watch Type' => $rows['watch_type'],
		'Length of Item' => $rows['length_of_item'],
		'Sold By Unit' => $rows['sold_by_unit'],
		'Bezel Type' => $rows['bezel_type'],
		'Case Material' => $rows['case_material'],
		'Caseback Material' => $rows['case_back_material'],
		'Clasp /Connector' => $rows['clasp_connector'],
		'Crown Type' => $rows['crown_type'],
		'Crystal Material' => $rows['crystal_material'],
		'Finish' => $rows['finish'],
		'Gender' => $rows['gender'],
		'Movement Country of Origin' => $rows['movement_country'],
		'Movement Descriptor' => $rows['movement_descriptor'],
		'Packaging' => $rows['packaging'],
		'Warranty' => $rows['warranty'],
	);
	return $fields_list;
}

function getTvJohnyProductImg($rows=[]) {
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
		$img_rows[] = SITE_URL . 'img/no_image_found.jpg';
	}
	return $img_rows;
}

function getRandomProdImgViaCateID($cate_id=0, $metal_color='', $metal_type='') {
	$CI = & get_instance();
	$CI->load->model('tvjohny_watchesmodel');

	$results = $CI->tvjohny_watchesmodel->getRandomRowViaCateID($cate_id, $metal_color, $metal_type);
	$imageLink = getTvJohnyProductImg( $results );  /// ringsection helper

	if(getimagesize($imageLink[0]) ) {
		$imgLink = $imageLink[0];
	} else {
		$imgLink = SITE_URL . 'img/no_image_found.jpg';
	}
	return $imgLink;
}

function footer_random_products() {
	$CI = & get_instance();
	$CI->load->model('tvjohny_watchesmodel');

	$results = $CI->tvjohny_watchesmodel->getTvJohnyRandomProducts('', 2);
	$release_view = '';
	foreach( $results as $rows ) {
		$imageLink = getTvJohnyProductImg( $rows );  /// ringsection helper
		$detail_link = SITE_URL . 'tvjonhy_watches/rolex_watches_detail/' . $rows['id'];
		$release_view .= '<div class="footer_prod_row">
			<div class="col-sm-3"><a href="'.$detail_link.'"><img src="'.$imageLink[0].'" alt="'.$rows['Title'].'" /></a></div>
			<div class="col-sm-8 pull-right">
				<div>'.$rows['Title'].'</div>
				<div class="footer_item_price">$'._nf($rows['Price'], 2).'</div>
			</div>
			<div class="clear"></div>
		</div><br>';
	}
	return $release_view;
}

function cart_item_detail_list() {
	$CI = & get_instance();
	$CI->load->model('cartmodel');

	$allitems = $CI->cartmodel->getitemsbysessionid();
	$total_items = count($allitems);

	$total_price = 0;
	$totalPrice = 0;
        
	if( $total_items > 0 ) {
		foreach( $allitems as $row ) {
			$total_price = ( ( $total_price + $row['totalprice'] ) * $row['quantity'] );
		}
		$shipping_price = get_shiping_price(); // ringsection helper
		$total_items_price = $total_price + $shipping_price;

		$totalPrice = _nf($total_items_price, 2);
	} else {
		$CI->session->unset_userdata('sets_ship_method');
	}
	$cart_detail = '$'.$totalPrice . ' ('.$total_items.' Items)';
	return $cart_detail;
}

function get_shiping_price() {
	$CI = & get_instance();
	$sets_ship_method = $CI->session->userdata('sets_ship_method');
	$ship_method = check_empty($sets_ship_method, 'usps_ground');

	$ship_options = shipping_option_price($ship_method); // ringsection helper

	return $ship_options['ship_price'];
}

function custom_cate_menu_list() {
	$CI = & get_instance();
	$CI->load->model('tvjohny_watchesmodel');

	$results = $CI->tvjohny_watchesmodel->customCategoryRows();
	$cate_list = '';

	foreach( $results as $rows ) {
		$detail_link = SITE_URL . 'tv_johnny_dang_collection/custom_item_page/' . $rows['id'];
		$cate_list .= '<li><a href="'.$detail_link.'">'.$rows['sub_sub_cate'].'</a></li>';
	}
	$cate_list .= '<li><a href="'.SITE_URL.'tv_johnny_dang_collection/men_watches_newpage/14/0/?sort_option=ASC">Johnny Dang Collection</a></li>';
	return $cate_list;
}

function shipping_option_price($ship_option='') {
	switch ($ship_option) {
		case 'usps_ground':
			$shipping_price = 9.99;
			$shipping_method = 'USPS Ground Shipping 5-7 business days';
			break;
		case 'fedx_express':
			$shipping_price = 18.99;
			$shipping_method = 'Fed X 3-4 Express Domestic';
			break;
		case 'two_day_shipping':
			$shipping_price = 24.99;
			$shipping_method = 'Two-Day Shipping 1-2 Business Days';
			break;
		case 'fedx_overnight':
			$shipping_price = 29.99;
			$shipping_method = 'Fed X Overnight 1 Business Day';
			break;
		default :
			$shipping_price = 9.99;
			$shipping_method = 'USPS Ground Shipping 5-7 business days';
			break;
	}
	$returns['ship_price']  = $shipping_price;
	$returns['ship_method'] = $shipping_method;

	return $returns;
}

/* get home page img block content detail */
function get_home_imgcontent($id=0) {
	$CI = & get_instance();
	$CI->load->model('homepage_content_model');

	$row = $CI->homepage_content_model->home_content_row($id);
	$block_img = SITE_URL . 'uploads/home_page_img/' . $row['block_img'];

	if(getimagesize($block_img) ) {
		$return['block_img'] = $block_img;
	} else {
		$return['block_img'] = SITE_URL . 'img/no_image_found.jpg'; 
	}        
	$return['block_label'] = $row['block_label'];
	$return['block_link'] = $row['block_link'];

	return $return;
}

/* get home page img block content detail */
function gethome_imgcontent() {
	$CI = & get_instance();
	$CI->load->model('homepage_content_model');

	$results = $CI->homepage_content_model->home_page_content_rows();
	$return = array();
	if( count($results) > 0 ) {
		foreach( $results as $row ) {
			$block_img = SITE_URL . 'uploads/home_page_img/' . $row['block_img'];
			if(getimagesize($block_img) ) {
				$return['block_img'][$row['id']] = $block_img;
			} else {
			   $return['block_img'][$row['id']]  = SITE_URL . 'img/no_image_found.jpg'; 
			}        
			$return['block_label'][$row['id']]  = $row['block_label'];
			$return['block_link'][$row['id']]   = $row['block_link'];
		}
	}
	return $return;
}

function set_finish_level($finish_level='') {
	$finishLevel = '';
	if( !empty($finish_level) ) {
		$finishLevel = ucwords( str_replace('_', ' ', $finish_level) );
	}
	return $finishLevel;
}

/* get coupon manufacturer type */
function getCouponManuFactType($option_type='') {
	switch ($option_type) {
		case 'tvjohny_collection_item' :
			$manufact_type = TVJOHNY_OPTION;
			break;
		case 'addunique' :
			$manufact_type = UNIQUE_OPTION;
			break;
		case 'addjewelry' :
		case 'rolex_watch' :
		case 'wb_classic' :
		case 'wb_mens' :
		case 'wb_studs' :
		case 'wb_hoops' :
		case 'gemstone' :
		case 'diamond_bracelet' :
			$manufact_type = OTHERS_MANUFACT;
			break;
		default :
			$manufact_type = OTHERS_MANUFACT;
			break;
	}
	return $manufact_type;
}

function printr($data = []){
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

function getVariants($column_name,$item_number,$categry,$subCat){
	$CI = & get_instance();
    $CI->load->model('engagementringsbetamodel');

    $results = $CI->engagementringsbetamodel->getRingVariants($column_name,$item_number,$categry,$subCat);
	$option_list = '<option value="">Select Variation</option>';
	if(!empty($results)){
		foreach ($results as $rows){
			$option_list .= '<option value="'.$rows[''.$column_name.''].'">'.$rows[''.$column_name.''].'</option>';
		}
	}
    return $option_list;
}

function getMetalVariants($column_name,$item_number,$categry,$subCat,$metal){
	$CI = & get_instance();
    $CI->load->model('engagementringsbetamodel');

    $results = $CI->engagementringsbetamodel->getRingVariants($column_name,$item_number,$categry,$subCat);
	if(!empty($metal)){
		$option_list = '';
	}else{
		$option_list = '<option value="">Select Metal Type</option>';
	}
	if(!empty($results)){
		foreach ($results as $rows){
			if($metal == $rows[''.$column_name.'']){
				$option_list .= '<option value="'.$rows[''.$column_name.''].'" selected="selected">'.$rows[''.$column_name.''].'</option>';
			}else{
				$option_list .= '<option value="'.$rows[''.$column_name.''].'">'.$rows[''.$column_name.''].'</option>';
			}
		}
	}
    return $option_list;
}

function getMetalCVariants($column_name,$item_number,$categry,$subCat,$metalc){
	$CI = & get_instance();
    $CI->load->model('engagementringsbetamodel');

    $results = $CI->engagementringsbetamodel->getRingVariants($column_name,$item_number,$categry,$subCat);
	if(!empty($metalc)){
		$option_list = '';
	}else{
		$option_list = '<option value="">Select Metal Color</option>';
	}
	if(!empty($results)){
		foreach ($results as $rows){
			if($metalc == $rows[''.$column_name.'']){
				$option_list .= '<option value="'.$rows[''.$column_name.''].'" selected="selected">'.$rows[''.$column_name.''].'</option>';
			}else{
				$option_list .= '<option value="'.$rows[''.$column_name.''].'">'.$rows[''.$column_name.''].'</option>';
			}
		}
	}
    return $option_list;
}

function getFinishVariants($column_name,$item_number,$categry,$subCat,$finish){
	$CI = & get_instance();
    $CI->load->model('engagementringsbetamodel');

    $results = $CI->engagementringsbetamodel->getRingVariants($column_name,$item_number,$categry,$subCat);
	if(!empty($finish)){
		$option_list = '';
	}else{
		$option_list = '<option value="">Select Finish Level</option>';
	}
	if(!empty($results)){
		foreach ($results as $rows){
			if($finish == $rows[''.$column_name.'']){
				$option_list .= '<option value="'.$rows[''.$column_name.''].'" selected="selected">'.$rows[''.$column_name.''].'</option>';
			}else{
				$option_list .= '<option value="'.$rows[''.$column_name.''].'">'.$rows[''.$column_name.''].'</option>';
			}
		}
	}
    return $option_list;
}

function getDQualityVariants($column_name,$item_number,$categry,$subCat,$quality){
	$CI = & get_instance();
    $CI->load->model('engagementringsbetamodel');

    $results = $CI->engagementringsbetamodel->getRingVariants($column_name,$item_number,$categry,$subCat);
	if(!empty($quality)){
		$option_list = '';
	}else{
		$option_list = '<option value="">Select Diamond Quality</option>';
	}
	if(!empty($results)){
		foreach ($results as $rows){
			if($quality == $rows[''.$column_name.'']){
				$option_list .= '<option value="'.$rows[''.$column_name.''].'" selected="selected">'.$rows[''.$column_name.''].'</option>';
			}else{
				$option_list .= '<option value="'.$rows[''.$column_name.''].'">'.$rows[''.$column_name.''].'</option>';
			}
		}
	}
    return $option_list;
}
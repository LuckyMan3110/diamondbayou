<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
function view_order_details_content($o_id='', $option='', $manfact = '', $xml_content='', $view_price='') {
	$CI = & get_instance();
	$CI->load->helper('stullering');
	$CI->load->helper('collections_section');
	$CI->load->model('Diamondmodel');
	$CI->load->model('Jewelrymodel');
	$CI->load->model('Commonmodel');
	$CI->load->model('Catemodel');
	$CI->load->model('Qualitymodel');
	$CI->load->model('Davidsternmodel');
	$rowitemdt = $CI->Commonmodel->getOrderItemDetail($o_id);
	$itemDetails = '';
	if($option == ''){
		$itemDetails .= '<table>';
	} else {
		$itemDetails .= "<table width=\"100%\" border=\"1\" style=\"border-collapse:collapse; border:1px solid #ccc; border-color:#ccc; \" cellspacing=\"0\" cellpadding=\"5\">";	
	}

	$r = 1;
	$aq = 1;
	$aj = 1;
	$ar = 1;
	$ae = 1;
	$pd = 1;
	$st = 1;
	$ap = 1;
	$order_ttprice = 0;
	$adjtotal_price = 0;
	$adtoring_price = 0;
	$adtoearing_price = 0;
	$ad3stone_pendantprice = 0;
	$ad3stone_ringprice = 0;
	$adpendant_totalprice = 0;
	$imgwidth = 100;
	$order_xml_content = '';
	$shape_imgurl = config_item('base_url').'images/shapes_images/';
	if( count($rowitemdt) > 0 )	{
		foreach($rowitemdt as $row_itdt) {
			if($row_itdt['ezpay'] > 0){
				$row_itdt['totalprice'] = $row_itdt['ezpay'];
			}

			$ttPrice = $row_itdt['quantity'] * $row_itdt['totalprice'];
			$item_rings_features = itemFeatures( $row_itdt );
			$xml_item_features = xmlItemFeatures( $row_itdt );
			switch($row_itdt['addoption']) {
				case 'addunique':
					$rowrings_test = $CI->Catemodel->getRingsDetailViaId($row_itdt['lot']);
					$stock_real_number = 'N/A';
					if($row_itdt['venderinfo'] == 'unique'){
						if(isset($rowrings_test) && !empty($rowrings_test)){
							$ImagePath = isset($rowrings_test['ImagePath'])?$rowrings_test['ImagePath']:'';
							$top_width = isset($rowrings_test['top_width'])?$rowrings_test['top_width']:'';
							$bottom_width = isset($rowrings_test['bottom_width'])?$rowrings_test['bottom_width']:'';
							$top_height = isset($rowrings_test['top_height'])?$rowrings_test['top_height']:'';
							$bottom_height = isset($rowrings_test['bottom_height'])?$rowrings_test['bottom_height']:'';
							$image_url = SITE_URL.'scrapper/imgs/'.$ImagePath;
							$measurement = $top_width.'x'.$bottom_width.'x'.$top_height.'x'.$bottom_height;
							$stock_item_title_number = '';
						}else{
							$measurement = '';
							$stock_item_title_number = '';
						}
					}else{
					    $where_dev_jew_cat	= array('stock_number' => $row_itdt['lot']);
                        $dev_jewelries_data	= $CI->Catemodel->getdata_any_table_where($where_dev_jew_cat, 'dev_jewelries');
						if(isset($dev_jewelries_data[0]) && !empty($dev_jewelries_data[0])){
							$image_url = SITE_URL.'images/'.$dev_jewelries_data[0]->image1;
							$measurement = $dev_jewelries_data[0]->diamond_size.', '.$dev_jewelries_data[0]->weight.', '.$dev_jewelries_data[0]->chain_weight;
							$stock_real_number = $dev_jewelries_data[0]->stock_real_number;
							$stock_item_title_number = $dev_jewelries_data[0]->item_title;
						}else{
							$measurement = '';
							$stock_item_title_number = '';
						}
					}

					if($row_itdt['table_name'] == 'jewelry_unlimited_products'){
						$rowjewelry = $CI->Catemodel->getjewelryImages($row_itdt['lot']);
						if((strpos($rowjewelry->ImagePath, 'http://') !== false) || (strpos($rowjewelry->ImagePath, 'https://') !== false)){
							$image_url = $rowjewelry->ImagePath;
						}else{
							$image_url = config_item('base_url').$rowjewelry->ImagePath;
						}
					}elseif($row_itdt['table_name'] == 'itshot_products'){
						$rowitshot = $CI->Catemodel->getitshotImages($row_itdt['lot']);
						if((strpos($rowitshot->ImagePath, 'http://') !== false) || (strpos($rowitshot->ImagePath, 'https://') !== false)){
							$image_url = $rowitshot->ImagePath;
						}else{
							$image_url = config_item('base_url').$rowitshot->ImagePath;
						}
					}elseif($row_itdt['table_name'] == 'dev_diamonds'){
						$rowindex = $CI->Catemodel->getindexImages($row_itdt['lot']);
						if($rowindex->is_lab_diamond == 1){
							$image_url	= $rowindex->ImagePath;
						}elseif($rowindex->ImagePath != '' && file_exists($rowindex->ImagePath)){
							$image_url	= SITE_URL.$rowindex->ImagePath;
						}else{
							if($rowindex->shape == 'B' || $rowindex->shape == 'Round'){
								$image_url    = ''.SITE_URL.'images/shapes_images/actual-dime.jpg';
							}else if($rowindex->shape == 'PR' || $rowindex->shape == 'Princess'){
								$image_url    = ''.SITE_URL.'images/shapes_images/princesss.jpg';
							}else if($rowindex->shape == 'C' || $rowindex->shape == 'Cushion'){
								$image_url    = ''.SITE_URL.'images/shapes_images/cushion_cut_diamond.jpg';
							}else if($rowindex->shape == 'R' || $rowindex->shape == 'Radiant'){
								$image_url    = ''.SITE_URL.'images/shapes_images/radiant.jpg';
							}else if($rowindex->shape == 'E' || $rowindex->shape == 'Emerald'){
								$image_url    = ''.SITE_URL.'images/shapes_images/emeraled.jpg';
							}else if($rowindex->shape == 'P' || $rowindex->shape == 'Pear'){
								$image_url    = ''.SITE_URL.'images/shapes_images/pear.jpg';
							}else if($rowindex->shape == 'P' || $rowindex->shape == 'Oval'){
								$image_url    = ''.SITE_URL.'images/shapes_images/oval.jpg';
							}else if($rowindex->shape == 'AS' || $rowindex->shape == 'Asscher'){
								$image_url    = ''.SITE_URL.'images/shapes_images/asscher.jpg';
							}else if($rowindex->shape == 'M' || $rowindex->shape == 'Marquise'){
								$image_url    = ''.SITE_URL.'images/shapes_images/marquise.jpg';
							}else if($rowindex->shape == 'H' || $rowindex->shape == 'Heart'){
								$image_url    = ''.SITE_URL.'images/shapes_images/heart.jpg';
							}else{
								$image_url    = ''.SITE_URL.'img/diamond_shapes/dm_noimage.jpg';
							}
						}
					}else{
						$rowimaged = $CI->Catemodel->getbandsImages($row_itdt['stock_number']);
						if(!empty($rowimaged)){
							if(strpos($rowimaged->ImagePath, 'images/overnightmount') !== false){
								$image_url = config_item('base_url').$rowimaged->ImagePath;
							}else{
								$image_url = config_item('base_url').'scrapper/imgs/'.$rowimaged->ImagePath;
							}
						}else{
							$rowimages = $CI->Catemodel->getfineImages($row_itdt['lot']);
							if(isset($rowimages->image1) && ((strpos($rowimages->image1, 'http://') !== false) || (strpos($rowimages->image1, 'https://') !== false))){
								$image_url = $rowimages->image1;
							}else{
								if(isset($rowimages->image1) && file_exists(''.$rowimages->image1 .'')){
									$image_url = SITE_URL.''.str_replace("THUMBNAIL/","",$rowimages->image1) .'';
								}elseif(isset($rowimages->image1)){
									$image_url = SITE_URL.''.str_replace("THUMBNAIL/","",$rowimages->image2) .'';
								}
							}
						}
					}
					if( !empty( $row_itdt['vendorname'] ) && empty($manfact) ) {
						$itemDetails .= '<tr>
							<td><b>Stock#</b></td>
							<td colspan="5">'.$row_itdt['stock_number'].'</td>
						</tr>
						<tr>
							<td><b>Manufacturer</b></td>
							<td colspan="5">'.$row_itdt['vendorname'].'</td>
						</tr>
						<tr>
							<td><b>Telephone Number</b></td>
							<td colspan="5">'.$row_itdt['vendor_number'].'</td>
						</tr>';
					}
					if($aq == 1){
						$itemDetails .= '<tr>
							<td>Item List</td>
							<td>Item Type</td>
							<td>Setting Type</td>
							<td>Product ID</td>
							<td>Qty</td>
							<td>Price</td>
						</tr>';
					}
					$rowtestname = isset($rowrings_test['name'])?$rowrings_test['name']:'';
					$rowteststyle = isset($rowrings_test['style_group'])?$rowrings_test['style_group']:'';
					$itemDetails .= '<tr>
						<td>'.$r.'</td>
						<td><div><a href="'.$row_itdt['item_url'].'" target="_blank"><img src="'.$image_url.'" alt="'.$rowtestname.'" width="'.$imgwidth.'" /></a><br>'.$row_itdt['vendorname'].'</div>';
						$itemDetails .= $item_rings_features;
						if(isset($rowrings_test['style_group']) && empty($rowrings_test['style_group']) ){
							$rowrings_test_style_group = $stock_real_number;
						}else{
							$rowrings_test_style_group = $rowteststyle;
						}
						if(isset($rowrings_test['category_name']) && empty($rowrings_test['category_name']) ){
							$rowrings_test_category_name = $stock_item_title_number;
						}else{
							$rowrings_test_category_name = $rowrings_test['category_name'];
						}
						$itemDetails .= '</td>';
						$itemDetails .= '<td>'.$row_itdt['item_title'].'</td>
						<td>'.$row_itdt['stock_number'].'</td>
						<td>'.$row_itdt['quantity'].'</td>
						<td>$'._nf($row_itdt['totalprice'],2).'</td>
					</tr>';
					$ctdiamond['price'] = 0;
					if( !empty($row_itdt['sidestone1']) ) {
						$image_path = SITE_URL.'images/shapes_images/';
						$ctdiamond = $CI->Diamondmodel->getDetailsByLot($row_itdt['sidestone1']);
						$diamond_shape = view_shape_value($view_diamondimg, $ctdiamond['shape']);
						if( empty($diamond_shape) ){
							$diamond_shape = $stock_real_number;
						}
						$itemDetails .= '<tr>
							<td>Item List</td>
							<td>Stock#</td>
							<td>Carat</td>
							<td>Shape</td>
							<td>Qty</td>
							<td>Price</td>
						</tr>
						<tr>
							<td>'.$r.'</td>
							<td><div><img src="'.$image_path.$view_diamondimg.'" alt="'.$diamond_shape.'" width="'.$imgwidth.'" /><br>'.$ctdiamond['vendorname'].'</div></td>
							<td>'.$ctdiamond['carat'].'</td>
							<td>'.$diamond_shape.'</td>
							<td>'.$row_itdt['quantity'].'</td>
							<td>$'._nf($ctdiamond['price'],2).'</td>
						</tr>'; 
					}
					$order_ttprice = $order_ttprice + $ctdiamond['price'] + $row_itdt['totalprice'];
					$aq++;
				break;
				case 'addwatch':
					$rowatch = $CI->Jewelrymodel->getWatchByStock($row_itdt['lot']);
					$watchImageLink = SITE_URL.$rowatch['thumb'];
					$image_url = ( getimagesize($watchImageLink) ? $watchImageLink : SITE_URL.'images/no_image_found.jpg' );
					$itemName = $rowatch['productName'].' '.getWatchIdType($rowatch['id_type']).' '.$rowatch['case_diameter'];
					if( !empty( $row_itdt['vendorname'] ) && empty($manfact) ) {
						$itemDetails .= '<tr>
							<td><b>Stock#</b></td>
							<td colspan="5"></td>
						</tr>
						<tr>
							<td><b>Manufacturer</b></td>
							<td colspan="5">'.$row_itdt['vendorname'].'</td>
						</tr>
						<tr>
							<td><b>Telephone Number</b></td>
							<td colspan="5"></td>
						</tr>';
					}
					if($aq == 1) {
						$itemDetails .= '<tr>
							<td>Item List</td>
							<td>Item Type</td>
							<td>Description</td>
							<td>Product ID</td>
							<td>Model Number</td>
							<td>Qty</td>
							<td>Price</td>
						</tr>';
					}
					$itemDetails .= '<tr>
						<td>'.$r.'</td>
						<td><div><img src="'.$image_url.'" alt="'.$itemName.'" width="'.$imgwidth.'" /><br>'.getWatchIdType($rowatch['id_type']).'</div></td>
						<td>'.$itemName.'</td>
						<td>'.$rowatch['upc'].'</td>
						<td>'.check_empty($rowatch['model_number'], 'NA').'</td>
						<td>'.$row_itdt['quantity'].'</td>
						<td>$'._nf($rowatch['price1'],2).'</td>
					</tr>';
					$order_ttprice = $order_ttprice + $row_itdt['totalprice'];
					$aq++;
				break;
				case 'sterncollection':
				case 'heart_diamond_collection':
					$rowrings_test = $CI->Davidsternmodel->getSternCollectionDetail($row_itdt['lot']);
					$image_url = setCollectionImgLink($rowrings_test['image1'], $rowrings_test['item_sku'], $rowrings_test['different_imglist']);
					$category_name = jewelry_cate_name( $rowrings_test['category'] );
					$itemName = $category_name . ' ' . $rowrings_test['metal_purity']. ' Item ID: '. $rowrings_test['stock_number'];
					$ring_type = ( !empty($rowrings_test['ringtype']) ? $rowrings_test['ringtype'] : 'Ring' );
					$ringPrice = _nf( ( $row_itdt['totalprice'] / $row_itdt['quantity'] ) , 2 );
					if( !empty( $row_itdt['vendorname'] ) && empty($manfact) ) {
						$itemDetails .= '<tr>
							<td><b>Stock#</b></td>
							<td colspan="5"></td>
							</tr>
							<tr>
							<td><b>Manufacturer</b></td>
							<td colspan="5">'.$row_itdt['vendorname'].'</td>
							</tr>
							<tr>
							<td><b>Telephone Number</b></td>
							<td colspan="5"></td>
						</tr>';
					}
					if($aq == 1) {
						$itemDetails .= '<tr>
							<td>Item List</td>
							<td>Item Type</td>
							<td>Description</td>
							<td>Product ID</td>
							<td>Metal Description</td>
							<td>Qty</td>
							<td>Price</td>
						</tr>';
					}
					$itemDetails .= '<tr>
						<td>'.$r.'</td>
						<td><div><img src="'.$image_url.'" alt="'.$itemName.'" width="'.$imgwidth.'" /><br>'.$ring_type.'</div>';
						$itemDetails .= $item_rings_features;
						$itemDetails .= '</td>
						<td>'.$itemName.'</td>
						<td>'.$rowrings_test['stock_number'].'</td>
						<td>'.$rowrings_test['metal'].'</td>
						<td>'.$row_itdt['quantity'].'</td>
						<td>$'.$ringPrice.'</td>
					</tr>';
					$order_xml_content .= '<order_detail>';
					$order_xml_content .= '<item_detail>';
					$order_xml_content .= '<order_id>'.$row_itdt['orderid'].'</order_id>';
					$order_xml_content .= '<product_id>'.$rowrings_test['stock_number'].'</product_id>';
					$order_xml_content .= '<setting_type>'.$ring_type.'</setting_type>';
					$order_xml_content .= '<measurement>NA</measurement>';
					$order_xml_content .= '<name>'.$itemName.'</name>';
					$order_xml_content .= '<description>'.$rowrings_test['description'].'</description>';
					$order_xml_content .= $xml_item_features;
					$order_xml_content .= '<quantity>'.$row_itdt['quantity'].'</quantity>';
					$order_xml_content .= '<totalprice>'.$row_itdt['totalprice'].'</totalprice>';
					$order_xml_content .= '<addoption>'.$row_itdt['addoption'].'</addoption>';
					$order_xml_content .= '<image_link>'.$image_url.'</image_link>';
					$order_xml_content .= '</item_detail>';
					$order_xml_content .= '</order_detail>';
					$order_ttprice = $order_ttprice + $row_itdt['totalprice'];
					$aq++;
				break;
				case 'sterncolectionjewelry':
					$rowrings_test = $CI->Davidsternmodel->sternProductDetail($row_itdt['lot']);
					$image_url = STERN_IMGS.$rowrings_test['item_id'].'.jpg';
					$prodType = explode("/", $rowrings_test['categories_name']);
					$ringBoxDesc = str_replace("/", ', ', $rowrings_test['categories_name']);
					$ringPrice = _nf( ( $row_itdt['totalprice'] / $row_itdt['quantity'] ) , 2 );
					if( !empty( $row_itdt['vendorname'] ) && empty($manfact) ) {
						$itemDetails .= '<tr>
							<td><b>Stock#</b></td>
							<td colspan="5"></td>
						</tr>
						<tr>
							<td><b>Manufacturer</b></td>
							<td colspan="5">'.$row_itdt['vendorname'].'</td>
						</tr>
						<tr>
							<td><b>Telephone Number</b></td>
							<td colspan="5"></td>
						</tr>';
					}
					if($aq == 1) {
						$itemDetails .= '<tr>
							<td>Item List</td>
							<td>Item Type</td>
							<td>Description</td>
							<td>Product ID</td>
							<td>Metal Description</td>
							<td>Qty</td>
							<td>Price</td>
						</tr>';
					}
					$itemDetails .= '<tr>
						<td>'.$r.'</td>
						<td><div><img src="'.$image_url.'" alt="'.$ringBoxDesc.'" width="'.$imgwidth.'" /><br>'.$prodType[0].'</div>';
						$itemDetails .= $item_rings_features;
						$itemDetails .= '</td>
						<td>'.$ringBoxDesc.'</td>
						<td>'.$rowrings_test['item_id'].'</td>
						<td>'.$rowrings_test['default_metal'].'</td>
						<td>'.$row_itdt['quantity'].'</td>
						<td>$'.$ringPrice.'</td>
					</tr>';
					$styles = isset($rowrings_test['style'])?$rowrings_test['style']:'';
					$titls = isset($rowrings_test['title'])?$rowrings_test['title']:'';
					$metals = isset($rowrings_test['metal'])?$rowrings_test['metal']:'';
					$prices = isset($rowrings_test['price'])?$rowrings_test['price']:'';
					$order_xml_content .= '<order_detail>';
					$order_xml_content .= '<item_detail>';
					$order_xml_content .= '<order_id>'.$row_itdt['orderid'].'</order_id>';
					$order_xml_content .= '<product_id>'.$styles.'</product_id>';
					$order_xml_content .= '<setting_type>NA</setting_type>';
					$order_xml_content .= '<measurement>NA</measurement>';
					$order_xml_content .= '<name>'.$titls.'</name>';
					$order_xml_content .= '<description>'.$metals.'</description>';
					$order_xml_content .= $xml_item_features;
					$order_xml_content .= '<quantity>'.$row_itdt['quantity'].'</quantity>';
					$order_xml_content .= '<price>'.$prices.'</price>';
					$order_xml_content .= '<totalprice>'.$row_itdt['totalprice'].'</totalprice>';
					$order_xml_content .= '<addoption>'.$row_itdt['addoption'].'</addoption>';
					$order_xml_content .= '<image_link>'.$image_url.'</image_link>';
					$order_xml_content .= '</item_detail>';
					$order_xml_content .= '</order_detail>';

					$order_ttprice = $order_ttprice + $row_itdt['totalprice'];
					$aq++;
				break;
				case 'qualityrings':
					$rowrings_test = $CI->Qualitymodel->qualityProductDetail($row_itdt['lot']);
					$image_url = QUALITY_IMGS.$rowrings_test['small_image'];
					if( !empty( $row_itdt['vendorname'] ) && empty($manfact) ) {
						$itemDetails .= '<tr>
							<td><b>Stock#</b></td>
							<td colspan="5"></td>
						</tr>
						<tr>
							<td><b>Manufacturer</b></td>
							<td colspan="5">'.$row_itdt['vendorname'].'</td>
						</tr>
						<tr>
							<td><b>Telephone Number</b></td>
							<td colspan="5"></td>
						</tr>';
					}
					if($aq == 1) {
						$itemDetails .= '<tr>
							<td>Item List</td>
							<td>Item Type</td>
							<td>Description</td>
							<td>Product ID</td>
							<td>Metal Description</td>
							<td>Qty</td>
							<td>Price</td>
						</tr>';
					}
					$itemDetails .= '<tr>
						<td>'.$r.'</td>
						<td><div><img src="'.$image_url.'" alt="'.$rowrings_test['title'].'" width="'.$imgwidth.'" /><br>'.$rowrings_test['product_type'].'</div>';
						$itemDetails .= $item_rings_features;
						$itemDetails .= '</td>
						<td>'.$rowrings_test['title'].'</td>
						<td>'.$rowrings_test['style'].'</td>
						<td>'.$rowrings_test['metal'].'</td>
						<td>'.$row_itdt['quantity'].'</td>
						<td>$'._nf($rowrings_test['price'],2).'</td>
					</tr>';
					$order_xml_content .= '<order_detail>';
					$order_xml_content .= '<item_detail>';
					$order_xml_content .= '<order_id>'.$row_itdt['orderid'].'</order_id>';
					$order_xml_content .= '<product_id>'.$rowrings_test['style'].'</product_id>';
					$order_xml_content .= '<setting_type>NA</setting_type>';
					$order_xml_content .= '<measurement>NA</measurement>';
					$order_xml_content .= '<name>'.$rowrings_test['title'].'</name>';
					$order_xml_content .= '<description>'.$rowrings_test['metal'].'</description>';
					$order_xml_content .= $xml_item_features;
					$order_xml_content .= '<quantity>'.$row_itdt['quantity'].'</quantity>';
					$order_xml_content .= '<price>'.$rowrings_test['price'].'</price>';
					$order_xml_content .= '<totalprice>'.$row_itdt['totalprice'].'</totalprice>';
					$order_xml_content .= '<addoption>'.$row_itdt['addoption'].'</addoption>';
					$order_xml_content .= '<image_link>'.$image_url.'</image_link>';
					$order_xml_content .= '</item_detail>';
					$order_xml_content .= '</order_detail>';
					$order_ttprice = $order_ttprice + $row_itdt['totalprice'];
					$aq++;
				break;
				case 'stullerrings':
					$rowrings_test = $CI->Qualitymodel->stullerRingsDetail($row_itdt['lot']);
					$image_url = getStullerImage($rowrings_test);
					$itemCategory = $rowrings_test['MerchandisingCategory1'];
					if( !empty( $row_itdt['vendorname'] ) && empty($manfact) ) {
						$itemDetails .= '<tr>
							<td><b>Stock#</b></td>
							<td colspan="5"></td>
						</tr>
						<tr>
							<td><b>Manufacturer</b></td>
							<td colspan="5">'.$row_itdt['vendorname'].'</td>
						</tr>
						<tr>
							<td><b>Telephone Number</b></td>
							<td colspan="5"></td>
						</tr>';
					}
					if($aq == 1) {
						$itemDetails .= '<tr>
								<td>Item List</td>
								<td>Item Type</td>
								<td>Description</td>
								<td>Product ID</td>
								<td>Weight</td>
								<td>Qty</td>
								<td>Price</td>
						  </tr>';
					}

						$itemDetails .= '<tr>
						<td>'.$r.'</td>
						<td><div><img src="'.$image_url.'" alt="'.$rowrings_test['Description'].'" width="'.$imgwidth.'" /><br>'.$itemCategory.'</div>';

						$itemDetails .= $item_rings_features;
						$itemDetails .= '</td>
						<td>'.$rowrings_test['Description'].'</td>
						<td>'.$rowrings_test['Sku'].'</td>
						<td>'.$rowrings_test['Weight'].'</td>
						<td>'.$row_itdt['quantity'].'</td>
						<td>$'._nf($rowrings_test['Price'],2).'</td>
						</tr>';

						$order_xml_content .= '<order_detail>';
						$order_xml_content .= '<item_detail>';
						$order_xml_content .= '<order_id>'.$row_itdt['orderid'].'</order_id>';
						$order_xml_content .= '<product_id>'.$rowrings_test['stuller_id'].'</product_id>';
						$order_xml_content .= '<setting_type>'.$itemCategory.'</setting_type>';
						$order_xml_content .= '<measurement>NA</measurement>';
						$order_xml_content .= '<name>'.$rowrings_test['Description'].'</name>';
						$order_xml_content .= '<description>'.$rowrings_test['Description'].'</description>';
						$order_xml_content .= $xml_item_features;
						$order_xml_content .= '<quantity>'.$row_itdt['quantity'].'</quantity>';
						$order_xml_content .= '<price>'.$rowrings_test['Price'].'</price>';
						$order_xml_content .= '<totalprice>'.$row_itdt['totalprice'].'</totalprice>';
						$order_xml_content .= '<addoption>'.$row_itdt['addoption'].'</addoption>';
						$order_xml_content .= '<image_link>'.str_replace('&', '&#38;', $image_url).'</image_link>';
						$order_xml_content .= '</item_detail>';
						$order_xml_content .= '</order_detail>';

						$order_ttprice = $order_ttprice + $row_itdt['totalprice'];
						$aq++;

						break;					
					////// buy diamond detail
					case 'addjewelry':

					$dmdetails = $CI->Diamondmodel->getDetailsByLot($row_itdt['lot']);
					$lotdm_shape = view_shape_value($lot_image, $dmdetails['shape']);
					//$lotdm_image = $shape_imgurl.$lotdm_shape;
					
					if( !empty($dmdetails['fcolor_value']) ) 
					{
						$diam_type = 'Color Diamond';
						$viewdtLink = diamond_detail_link($row_itdt['lot'],$row_itdt['addoption'],'fancy_color');
					} else {
						$diam_type = 'White Diamond';
						$viewdtLink = diamond_detail_link($dmdetails['lot'],'false','');
					}
					$itemName = $row_itdt['item_title'];
					$wirePrice = wire_price($row_itdt['price']*$row_itdt['quantity']);
					
					if((strpos($dmdetails['image_url'], config_item('base_url')) !== false)){
						$imgUrljw = config_item('base_url').str_replace(config_item('base_url'),"",$dmdetails['image_url']);
					}elseif((strpos($dmdetails['image_url'], 'http://') !== false) || (strpos($dmdetails['image_url'], 'https://') !== false)){
						$imgUrljw = str_replace(config_item('base_url'),"",$dmdetails['image_url']);
					}else{
						$imgUrljw = config_item('base_url').str_replace(config_item('base_url'),"",$dmdetails['image_url']);
					}
                                if( !empty( $row_itdt['vendorname'] ) && empty($manfact) ) {
                                        $itemDetails .= '<tr>
                                                            <td><b>Stock#</b></td>
                                                            <td colspan="5">'.$row_itdt['stock_number'].'</td>
                                                      </tr>
                                                      <tr>
                                                            <td><b>Manufacturer</b></td>
                                                            <td colspan="5">'.$row_itdt['vendorname'].'</td>
                                                      </tr>
                                                      <tr>
                                                            <td><b>Telephone Number</b></td>
                                                            <td colspan="5">'.$row_itdt['vendor_number'].'</td>
                                                      </tr>';
                                }					
					if($aj == 1) {
					$itemDetails .= '<tr>
										<td>Item List</td>
										<td>Diamond Shape</td>
										<td>Diamond Detail</td>
										<td>Product ID</td>
										<td>Qty</td>
										<td>Price</td>
									  </tr>';
					}
                      $testName = isset($rowrings_test['name'])?$rowrings_test['name']:'';                  
    $itemDetails .= '<tr>
                                    <td>'.$r.'</td>
                                    <td><div><a href="'.$row_itdt['item_url'].'"><img src="'.$imgUrljw.'" alt="'.$testName.'" width="'.$imgwidth.'" /></a><br>'.$lotdm_shape.'</div>';
    
    $itemDetails .= $item_rings_features;
    $itemDetails .= '</td>
                                    <td>'.$itemName.'</td>
                                    <td>'.$row_itdt['stock_number'].'</td>
                                    <td>'.$row_itdt['quantity'].'</td>
                                    <td>$'._nf($row_itdt['totalprice'],2).'</td>
                              </tr>';
    
    $order_xml_content .= '<order_detail>';
    $order_xml_content .= '<item_detail>';
    $order_xml_content .= '<order_id>'.$row_itdt['orderid'].'</order_id>';
    $order_xml_content .= '<product_id>'.$dmdetails['lot'].'</product_id>';
    $order_xml_content .= '<setting_type>NA</setting_type>';
    $order_xml_content .= '<shape>'.$lotdm_shape.'</shape>';
    $order_xml_content .= '<carat>'.$dmdetails['carat'].'</carat>';
    $order_xml_content .= '<measurement>'.$dmdetails['Meas'].'</measurement>';
    $order_xml_content .= '<name>NA</name>';
    $order_xml_content .= '<description>NA</description>';
    $order_xml_content .= $xml_item_features;
    $order_xml_content .= '<quantity>'.$row_itdt['quantity'].'</quantity>';
    $order_xml_content .= '<price>'.$row_itdt['totalprice'].'</price>';
    $order_xml_content .= '<totalprice>'.$ttPrice.'</totalprice>';
    $order_xml_content .= '<addoption>'.$row_itdt['addoption'].'</addoption>';
    $order_xml_content .= '<image_link>'.$imgUrljw.'</image_link>';
    $order_xml_content .= '</item_detail>';
    $order_xml_content .= '</order_detail>';
    
					$adjtotal_price = $adjtotal_price + $ttPrice;
					$aj++;
					break;
					
    case 'wb_platinum':
        
					$dmdetails = $CI->Diamondmodel->getDetailsByLot($row_itdt['lot']);
					$lotdm_shape = view_shape_value($lot_image, $dmdetails['shape']);
					$lotdm_image = $shape_imgurl.$lotdm_shape;
					
					if( !empty($dmdetails['fcolor_value']) ) 
					{
						$diam_type = 'Color Diamond';
						$viewdtLink = diamond_detail_link($row_itdt['lot'],$row_itdt['addoption'],'fancy_color');
					} else {
						$diam_type = 'White Diamond';
						$viewdtLink = diamond_detail_link($dmdetails['lot'],'false','');
					}
					
					$itemName = loose_diamond_title($details);
					$itemName = $row_itdt['item_title'];
					
					$wirePrice = wire_price($row_itdt['price']*$row_itdt['quantity']);
					
					$image_url = SITE_URL.$row_itdt['item_picture'];

                                if( !empty( $row_itdt['vendorname'] ) && empty($manfact) ) {
                                        $itemDetails .= '<tr>
                                                            <td><b>Stock#</b></td>
                                                            <td colspan="5"></td>
                                                      </tr>
                                                      <tr>
                                                            <td><b>Manufacturer</b></td>
                                                            <td colspan="5">'.$row_itdt['vendorname'].'</td>
                                                      </tr>
                                                      <tr>
                                                            <td><b>Telephone Number</b></td>
                                                            <td colspan="5">'.$row_itdt['vendor_number'].'</td>
                                                      </tr>';
                                }					
					if($aj == 1) {
					$itemDetails .= '<tr>
										<td>Item List</td>
										<td>Diamond Shape</td>
										<td>Diamond Detail</td>
										<td>Product ID</td>
										<td>Qty</td>
										<td>Price</td>
									  </tr>';
					}
                                        
    $itemDetails .= '<tr>
                                    <td>'.$r.'</td>
                                    <td><div><a href="'.$row_itdt['item_url'].'"><img src="'.$image_url.'" alt="'.$rowrings_test['name'].'" width="'.$imgwidth.'" /></a><br>'.$lotdm_shape.'</div>';
    
    $itemDetails .= $item_rings_features;
    $itemDetails .= '</td>
                                    <td>'.$itemName.'</td>
                                    <td>'.$row_itdt['stock_number'].'</td>
                                    <td>'.$row_itdt['quantity'].'</td>
                                    <td>$'._nf($row_itdt['totalprice'],2).'</td>
                              </tr>';
    
    $order_xml_content .= '<order_detail>';
    $order_xml_content .= '<item_detail>';
    $order_xml_content .= '<order_id>'.$row_itdt['orderid'].'</order_id>';
    $order_xml_content .= '<product_id>'.$dmdetails['lot'].'</product_id>';
    $order_xml_content .= '<setting_type>NA</setting_type>';
    $order_xml_content .= '<shape>'.$lotdm_shape.'</shape>';
    $order_xml_content .= '<carat>'.$dmdetails['carat'].'</carat>';
    $order_xml_content .= '<measurement>'.$dmdetails['Meas'].'</measurement>';
    $order_xml_content .= '<name>NA</name>';
    $order_xml_content .= '<description>NA</description>';
    $order_xml_content .= $xml_item_features;
    $order_xml_content .= '<quantity>'.$row_itdt['quantity'].'</quantity>';
    $order_xml_content .= '<price>'.$row_itdt['totalprice'].'</price>';
    $order_xml_content .= '<totalprice>'.$ttPrice.'</totalprice>';
    $order_xml_content .= '<addoption>'.$row_itdt['addoption'].'</addoption>';
    $order_xml_content .= '<image_link>'.$image_url.'</image_link>';
    $order_xml_content .= '</item_detail>';
    $order_xml_content .= '</order_detail>';
    
					$adjtotal_price = $adjtotal_price + $ttPrice;
					$aj++;
					break;
					
   ////// buy diamond detail
    case 'hearts_diamond_collection':
        //$details = $CI->Davidsternmodel->getSternCollectionDetail($item['lot']); //print_ar($details);
        //$image_url = SITE_URL.'images/shapes_images/'.$lot_image;

        if( !empty( $row_itdt['vendorname'] ) && empty($manfact) ) {
                $itemDetails .= '<tr>
                                    <td><b>Stock#</b></td>
                                    <td colspan="5">NA</td>
                              </tr>
                              <tr>
                                    <td><b>Manufacturer</b></td>
                                    <td colspan="5">'.$row_itdt['vendorname'].'</td>
                              </tr>
                              <tr>
                                    <td><b>Telephone Number</b></td>
                                    <td colspan="5">NA</td>
                              </tr>';
        }
        
        if($aj == 1) {
        $itemDetails .= '<tr>
                            <td>Item List</td>
                            <td>Collection Shape</td>
                            <td>Product Detail</td>
                            <td>Product ID</td>
                            <td>Metal</td>
                            <td>Qty</td>
                            <td>Price</td>
                      </tr>';
        }
                                        
    $itemDetails .= '<tr>
                        <td>'.$r.'</td>
                        <td><div><img src="'.$image_url.'" alt="'.$rowrings_test['name'].'" width="'.$imgwidth.'" /><br>'.$lotdm_shape.'</div>';    
    $itemDetails .= $item_rings_features;
    $itemDetails .= '</td>
                        <td>'.$itemName.'</td>
                        <td>'.$dmdetails['lot'].'</td>
                        <td>'.$dmdetails['carat'].'</td>
                        <td>'.$row_itdt['quantity'].'</td>
                        <td>$'._nf($row_itdt['totalprice'],2).'</td>
                    </tr>';
    
    $order_xml_content .= '<order_detail>';
    $order_xml_content .= '<item_detail>';
    $order_xml_content .= '<order_id>'.$row_itdt['orderid'].'</order_id>';
    $order_xml_content .= '<product_id>'.$dmdetails['lot'].'</product_id>';
    $order_xml_content .= '<setting_type>NA</setting_type>';
    $order_xml_content .= '<shape>'.$lotdm_shape.'</shape>';
    $order_xml_content .= '<carat>'.$dmdetails['carat'].'</carat>';
    $order_xml_content .= '<measurement>'.$dmdetails['Meas'].'</measurement>';
    $order_xml_content .= '<name>NA</name>';
    $order_xml_content .= '<description>NA</description>';
    $order_xml_content .= $xml_item_features;
    $order_xml_content .= '<quantity>'.$row_itdt['quantity'].'</quantity>';
    $order_xml_content .= '<price>'.$row_itdt['totalprice'].'</price>';
    $order_xml_content .= '<totalprice>'.$ttPrice.'</totalprice>';
    $order_xml_content .= '<addoption>'.$row_itdt['addoption'].'</addoption>';
    $order_xml_content .= '<image_link>'.$image_url.'</image_link>';
    $order_xml_content .= '</item_detail>';
    $order_xml_content .= '</order_detail>';
    
    $adjtotal_price = $adjtotal_price + $ttPrice;
    $aj++;
    break;
					
					////// build your own ring
					case 'addtoring':
					$diamond = $CI->Diamondmodel->getDetailsByLot($row_itdt['lot']);
					$lotdm_shape = view_shape_value($ringst_img, $diamond['shape']);
					
					$dprice = $diamond['price'];
					$ringst_shape = view_shape_value($ringst_img, $diamond['shape']);
					$ringst_image  = $shape_imgurl.$ringst_img;
					
					$setttings = $CI->Catemodel->getRingsDetailViaId($row_itdt['ringsetting']);
					$ringset_price = floatval(isset($row_itdt['setting_price'])?$row_itdt['setting_price']:0)*$row_itdt['quantity'];
					$sprice = isset($setttings['priceRetail'])?$setttings['priceRetail']:0;
					$itemPriceQty = ( ( floatval($dprice)*$row_itdt['quantity'] ) + $ringset_price );

					$setting_imgurl = '';
					$rings_image = $CI->Catemodel->getengRingsImgViaId($row_itdt['ringsetting']);
					if(!empty($rings_image['image'])){
						$images = explode(";",$rings_image['image']);
						if(@getimagesize($images[0]) && $images[0] != ""){
							$setting_imgurl = $images[0];
						}elseif(@getimagesize($images[1]) && $images[1] != ""){
							$setting_imgurl = $images[1];
						}elseif(@getimagesize($images[2]) && $images[2] != ""){
							$setting_imgurl = $images[2];
						}elseif(@getimagesize($images[3]) && $images[3] != ""){
							$setting_imgurl = $images[3];
						}elseif(@getimagesize($images[4]) && $images[4] != ""){
							$setting_imgurl = $images[4];
						}else{
							$setting_imgurl = SITE_URL .'images/no_image.jpeg';
						}
					}else{
						$setting_imgurl = SITE_URL .'images/no_image.jpeg';
					}
					$ring_desc = $setttings['category_name'].' '.$setttings['parent_cate'];

                                if( !empty( $row_itdt['vendorname'] ) && empty($manfact) ) {
                                        $itemDetails .= '<tr>
                                                            <td><b>Stock#</b></td>
                                                            <td colspan="5"></td>
                                                      </tr>
                                                      <tr>
                                                            <td><b>Manufacturer</b></td>
                                                            <td colspan="5">'.$row_itdt['vendorname'].'</td>
                                                      </tr>
                                                      <tr>
                                                            <td><b>Telephone Number</b></td>
                                                            <td colspan="5"></td>
                                                      </tr>';
                                }					
					if($ar == 1) {
					$itemDetails .= '<tr>
										<td>Item List</td>
										<td>Ring Image</td>
										<td>Description</td>
										<td>Product ID <b>-</b> Diamond ID</td>
										<td>Qty</td>
										<td>Price</td>
									  </tr>';
					}
                                        
    $itemDetails .= '<tr>
                        <td>'.$r.'</td>
                        <td><div><img src="'.$setting_imgurl.'" alt="'.$row_itdt['lot'].'" width="'.$imgwidth.'" /><br>'.$lotdm_shape.'</div>';
    
    $itemDetails .= $item_rings_features;
    $itemDetails .= '</td>
                        <td>'.$ring_desc.'</td>
                        <td>'.$row_itdt['ringsetting'].' <b>-</b> '.$row_itdt['lot'].'</td>
                        <td>'.$row_itdt['quantity'].'</td>
                        <td>$'._nf($row_itdt['totalprice'],2).'</td>
                  </tr>';
					$adtoring_price = $adtoring_price + $ttPrice;
					$ar++;
					break;
					
					////// build your earing
					case 'toearring':
					$side1 = $CI->Diamondmodel->getDetailsByLot($row_itdt['lot']);
					$s1price = $side1['price'];
					$side_shape = view_shape_value($side1_image, $side1['shape']);
					$side_image1 = $shape_imgurl.$side1_image;
					$side1_detail = $detail_link.$side1['lot'].'/'.$row_itdt['addoption'].'/'.$row_itdt['ringsetting'];
					
					$side2 = $CI->Diamondmodel->getDetailsByLot($row_itdt['sidestone2']);
					$total_sdcarat = $side1['carat'] + $side2['carat'];
					$s2price = $side2['price'];
					$side2_shape  = view_shape_value($side2_image, $side2['shape']);
					$side_image2  = $shape_imgurl.$side2_image;
					$side2_detail = $detail_link.$side2['lot'].'/'.$row_itdt['addoption'].'/'.$row_itdt['ringsetting'];
					
					$setttings = $CI->Jewelrymodel->getEarringSettingsById($row_itdt['earringsetting']);
					$vimage_urlink = config_item('base_url').$setttings['small_image'];
					$sprice = $setttings['price'];
					$earingMetal = metal_label($setttings['metal']);
					$earingStyle = ucwords( str_replace('-', ' ', $setttings['style']) );
					$stud_title = $earingMetal.' Diamond Stud Earrings';

                                if( !empty( $row_itdt['vendorname'] ) && empty($manfact) ) {
                                        $itemDetails .= '<tr>
                                                            <td><b>Stock#</b></td>
                                                            <td colspan="5"></td>
                                                      </tr>
                                                      <tr>
                                                            <td><b>Manufacturer</b></td>
                                                            <td colspan="5">'.$row_itdt['vendorname'].'</td>
                                                      </tr>
                                                      <tr>
                                                            <td><b>Telephone Number</b></td>
                                                            <td colspan="5"></td>
                                                      </tr>';
                                }					
					if($ae == 1) {
					$itemDetails .= '<tr>
										<td>Item List</td>
										<td>Ring Image</td>
										<td>Description</td>
										<td>Measurements</td>
										<td>Total Carat</td>
										<td>Qty</td>
										<td>Price</td>
									  </tr>';
					}
                                        
					$itemDetails .= '<tr>
									<td>'.$r.'</td>
									<td><div><img src="'.$vimage_urlink.'" alt="'.$stud_title.'" width="'.$imgwidth.'" /><br>'.$stud_title.'</div></td>
									<td>'.$stud_title.'
									<div>Stone1: '.$side1['lot'].'</div>
									<div>Stone2: '.$side2['lot'].'</div>
									</td>
									<td>
									<div>Stone1: '.$side1['Meas'].'</div>
									<div>Stone2: '.$side2['Meas'].'</div>
									</td>
									<td>'.$total_sdcarat.'</td>
									<td>'.$row_itdt['quantity'].'</td>
									<td>$'._nf($row_itdt['totalprice'],2).'</td>
								  </tr>';
                                        
    $order_xml_content .= '<order_detail>';
    $order_xml_content .= '<item_detail>';
    $order_xml_content .= '<order_id>'.$row_itdt['orderid'].'</order_id>';
    $order_xml_content .= '<product_id>'.$row_itdt['earringsetting'].'</product_id>';
    $order_xml_content .= '<setting_type>'.$setttings['style'].'</setting_type>';
    $order_xml_content .= '<shape>'.$side_shape.'</shape>';
    $order_xml_content .= '<stone1>'.$side1['lot'].'</stone1>';
    $order_xml_content .= '<stone2>'.$side2['lot'].'</stone2>';
    $order_xml_content .= '<carat1>'.$side1['carat'].'</carat1>';
    $order_xml_content .= '<carat2>'.$side2['carat'].'</carat2>';
    $order_xml_content .= '<measurement1>'.$side1['Meas'].'</measurement1>';
    $order_xml_content .= '<measurement2>'.$side2['Meas'].'</measurement2>';
    $order_xml_content .= '<name>'.$stud_title.'</name>';
    $order_xml_content .= '<description>'.$stud_title.'</description>';
    $order_xml_content .= $xml_item_features;
    $order_xml_content .= '<quantity>'.$row_itdt['quantity'].'</quantity>';
    $order_xml_content .= '<price>'.$row_itdt['totalprice'].'</price>';
    $order_xml_content .= '<totalprice>'.$ttPrice.'</totalprice>';
    $order_xml_content .= '<addoption>'.$row_itdt['addoption'].'</addoption>';
    $order_xml_content .= '<image_link>'.$vimage_urlink.'</image_link>';
    $order_xml_content .= '</item_detail>';
    $order_xml_content .= '</order_detail>';
    
					$adtoearing_price = $adtoearing_price + $ttPrice;
					$ae++;
					break;
					
					////// build your 3stone pendant
					case 'addpendantsetings3stone':
					$diamond = $CI->Diamondmodel->getDetailsByLot($row_itdt['lot']);
					$dprice = $diamond['price'];
					$diam_shape = view_shape_value($d1_image, $diamond['shape']);
					$diam_image1 = $shape_imgurl.$d1_image;
					
					$side1 = $CI->Diamondmodel->getDetailsByLot($row_itdt['sidestone1']);
					$s1price = $side1['price'];
					$diam1_shape = view_shape_value($dm1_image, $side1['shape']);
					$diamnd_image1 = $shape_imgurl.$dm1_image;
					
					$side2 = $CI->Diamondmodel->getDetailsByLot($row_itdt['sidestone2']);
					$s2price = $side2['price'];
					$diam2_shape = view_shape_value($dm2_image, $side2['shape']);
					$diam2_shape = $shape_imgurl.$dm2_image;
					
					$setttings = $CI->Jewelrymodel->getPendentSettingsById($row_itdt['pendantsetting']);
					$sprice = $setttings['price'];
					$pendante_image = config_item('base_url').$setttings['small_image'];
					$centerdm_link = diamond_detail_link($diamond['lot'],$row_itdt['addoption'],$row_itdt['pendantsetting']);
					$side1_link = diamond_detail_link($side1['lot'],$row_itdt['addoption'],$row_itdt['pendantsetting']);
					$side2_link = diamond_detail_link($side2['lot'],$row_itdt['addoption'],$row_itdt['pendantsetting']);
					$ringTitle = 'Beta 256a '.$diam_shape.' <br>Diamond Engagement Ring';
					$pend3stone_wirepr = wire_price($row_itdt['totalprice']);
					$pend3stone_detail = config_item('base_url').'jewelry/pendants_detail/'.$row_itdt['pendantsetting'].'/threestone/'.$setttings['metal'].'/true';
					$total_dmcarat = $side1['carat'] + $side2['carat'] + $diamond['carat'];

                                if( !empty( $row_itdt['vendorname'] ) && empty($manfact) ) {
                                        $itemDetails .= '<tr>
                                                            <td><b>Stock#</b></td>
                                                            <td colspan="5"></td>
                                                      </tr>
                                                      <tr>
                                                            <td><b>Manufacturer</b></td>
                                                            <td colspan="5">'.$row_itdt['vendorname'].'</td>
                                                      </tr>
                                                      <tr>
                                                            <td><b>Telephone Number</b></td>
                                                            <td colspan="5"></td>
                                                      </tr>';
                                }					
					if($pd == 1) {
					$itemDetails .= '<tr>
										<td>Item List</td>
										<td>Three Stone Pendant</td>
										<td>Description</td>
										<td>Measurements</td>
										<td>Total Carat</td>
										<td>Qty</td>
										<td>Price</td>
									  </tr>';
					}

$itemDetails .= '<tr>
                    <td>'.$r.'</td>
                    <td><div><img src="'.$pendante_image.'" alt="'.$ringTitle.'" width="'.$imgwidth.'" /><br>'.$ringTitle.'</div>';

$itemDetails .= $item_rings_features;
$itemDetails .= '</td>
                    <td>'.$ringTitle.'
                    <div>Stone1: '.$side1['lot'].'</div>
                    <div>Stone2: '.$side2['lot'].'</div>
                    <div>Center Stone: '.$diamond['lot'].'</div>
                    </td>
                    <td>
                    <div>Stone1: '.$side1['Meas'].'</div>
                    <div>Stone2: '.$side2['Meas'].'</div>
                    <div>Center Stone: '.$diamond['Meas'].'</div>
                    </td>
                    <td>'.$total_dmcarat.'</td>
                    <td>'.$row_itdt['quantity'].'</td>
                    <td>$'._nf($row_itdt['totalprice'],2).'</td>
              </tr>';
    $order_xml_content .= '<order_detail>';
    $order_xml_content .= '<item_detail>';
    $order_xml_content .= '<order_id>'.$row_itdt['orderid'].'</order_id>';
    $order_xml_content .= '<product_id>NA</product_id>';
    $order_xml_content .= '<setting_type>'.$setttings['style'].'</setting_type>';
    $order_xml_content .= '<shape>'.$diam_shape.'</shape>';
    $order_xml_content .= '<stone1>'.$side1['lot'].'</stone1>';
    $order_xml_content .= '<stone2>'.$side2['lot'].'</stone2>';
    $order_xml_content .= '<carat1>'.$side1['carat'].'</carat1>';
    $order_xml_content .= '<carat2>'.$side2['carat'].'</carat2>';
    $order_xml_content .= '<measurement1>'.$side1['Meas'].'</measurement1>';
    $order_xml_content .= '<measurement2>'.$side2['Meas'].'</measurement2>';
    $order_xml_content .= '<name>'.$ringTitle.'</name>';
    $order_xml_content .= '<description>'.$ringTitle.'</description>';
    $order_xml_content .= $xml_item_features;
    $order_xml_content .= '<quantity>'.$row_itdt['quantity'].'</quantity>';
    $order_xml_content .= '<price>'.$row_itdt['totalprice'].'</price>';
    $order_xml_content .= '<totalprice>'.$ttPrice.'</totalprice>';
    $order_xml_content .= '<addoption>'.$row_itdt['addoption'].'</addoption>';
    $order_xml_content .= '<image_link>'.$pendante_image.'</image_link>';
    $order_xml_content .= '</item_detail>';
    $order_xml_content .= '</order_detail>';
					$ad3stone_pendantprice = $ad3stone_pendantprice + $ttPrice;
					$pd++;
					break;
					
					////// build your solitaires pendant
					case 'addpendantsetings':
					$diamond = $CI->Diamondmodel->getDetailsByLot($row_itdt['lot']);
					$ringst_shape = view_shape_value($pendant_dmimg, $diamond['shape']);
					$pndt_image  = $shape_imgurl.$pendant_dmimg;
					
					$dprice = intval(number_format($diamond['price'],0,'.',''));
					//$item['quantity'] = intval($item['quantity']);
					//$item['totalprice'] = intval(number_format($item['totalprice'],0,'.',''));
					$dmPrice = intval($item['quantity'])*$diamond['price'];
					
					$setttings = $CI->Jewelrymodel->getPendentSettingsById($row_itdt['pendantsetting']);
					$sprice = intval(number_format($setttings['price'],0,'.',''));
					$pendant_imgurl = config_item('base_url').$setttings['small_image'];
					$solitiar_title = 'Solitaire '.$setttings['metal'].' Pendant';
					//$ttPrice = $row_itdt['quantity'] * $row_itdt['totalprice'];
					
                                if( !empty( $row_itdt['vendorname'] ) && empty($manfact) ) {
                                        $itemDetails .= '<tr>
                                                            <td><b>Stock#</b></td>
                                                            <td colspan="5"></td>
                                                      </tr>
                                                      <tr>
                                                            <td><b>Manufacturer</b></td>
                                                            <td colspan="5">'.$row_itdt['vendorname'].'</td>
                                                      </tr>
                                                      <tr>
                                                            <td><b>Telephone Number</b></td>
                                                            <td colspan="5"></td>
                                                      </tr>';
                                }
					if($ap == 1) {
					$itemDetails .= '<tr>
										<td>Item List</td>
										<td>Solitaire Pendant</td>
										<td>Description</td>
										<td>Measurements</td>
										<td>Total Carat</td>
										<td>Qty</td>
										<td>Price</td>
									  </tr>';
					}
                                        
$itemDetails .= '<tr>
                    <td>'.$r.'</td>
                    <td><div><img src="'.$pendant_imgurl.'" alt="'.$solitiar_title.'" width="'.$imgwidth.'" /><br>'.$solitiar_title.'</div>';

$itemDetails .= $item_rings_features;

$itemDetails .= '</td>
                    <td>'.$setttings['description'].'</td>
                    <td><div>'.$diamond['Meas'].'</div></td>
                    <td>'.$diamond['carat'].'</td>
                    <td>'.$row_itdt['quantity'].'</td>
                    <td>$'._nf($row_itdt['totalprice'],2).'</td>
              </tr>';
    $order_xml_content .= '<order_detail>';
    $order_xml_content .= '<item_detail>';
    $order_xml_content .= '<order_id>'.$row_itdt['orderid'].'</order_id>';
    $order_xml_content .= '<product_id>NA</product_id>';
    $order_xml_content .= '<setting_type>NA</setting_type>';
    $order_xml_content .= '<shape>'.$ringst_shape.'</shape>';
    $order_xml_content .= '<stone>'.$diamond['lot'].'</stone>';
    $order_xml_content .= '<carat>'.$diamond['carat'].'</carat>';
    $order_xml_content .= '<measurement>'.$diamond['Meas'].'</measurement>';
    $order_xml_content .= '<name>'.$solitiar_title.'</name>';
    $order_xml_content .= '<description>'.$setttings['description'].'</description>';
    $order_xml_content .= $xml_item_features;
    $order_xml_content .= '<quantity>'.$row_itdt['quantity'].'</quantity>';
    $order_xml_content .= '<price>'.$row_itdt['totalprice'].'</price>';
    $order_xml_content .= '<totalprice>'.$row_itdt['totalprice'].'</totalprice>';
    $order_xml_content .= '<addoption>'.$row_itdt['addoption'].'</addoption>';
    $order_xml_content .= '<image_link>'.$pendant_imgurl.'</image_link>';
    $order_xml_content .= '</item_detail>';
    $order_xml_content .= '</order_detail>';

					$adpendant_totalprice = $adpendant_totalprice + $row_itdt['totalprice'];
					$ap++;
					break;
					
    ////// build your 3stone ring
    case 'tothreestone':
        $diamond = $CI->Diamondmodel->getDetailsByLot($row_itdt['sidestone1']);
        $dprice = $diamond['price'];
        $diam_shape = view_shape_value($d1_image, $diamond['shape']);
        $diam_image1 = $shape_imgurl.$d1_image;

        //// unique 3stone ring
        $build_3stone = $row_itdt['stone_type'];
        $default_ringsize = '';
        if( $build_3stone == 'unique' ){
            $setting_metal = $row_itdt['default_metal'];
            $default_ringsize = $row_itdt['default_ringsize'];

            $rowun_dtring = $CI->Catemodel->getRingsDetailViaId($row_itdt['ringsetting'], $setting_metal, $default_ringsize);
            $sprice= $rowun_dtring['priceRetail'];
            $data['rowun_dtring'] = $rowun_dtring;
            $unique_ringimg = SITE_URL.'scrapper/imgs/'.$rowun_dtring['ImagePath'];
            $thestone_setinglink = config_item('base_url').'site/engagementRingDetail/'.$rowun_dtring['catid'].'/'.$row_itdt['ringsetting'];
        } else {
            $setttings = $CI->Jewelrymodel->getAllByStock($row_itdt['ringsetting']);
            $sprice = $setttings['price'];
            $unique_ringimg = $row_itdt['image_url'];
            $thestone_setinglink = config_item('base_url').'jewelry/tothree_stonedetail/'.$row_itdt['ringsetting'];
            $setting_metal = ( $setttings['metal'] == 'WhiteGold' ? 'White Gold' : $setttings['metal'] );
        }
        $setingring_size = ( !empty($row_itdt['chain_size']) ? $row_itdt['chain_size'] : $default_ringsize );
        $lot3stone_link = SITE_URL . 'diamonds/diamond_detail/'.$diamond['lot'].'/tothreestone/'.$row_itdt['ringsetting'];
        $threstone_ringname = $details['style'].' '.$setttings['shape'].' Diamond Engagement Ring';
        $threstone_ringname = ( !empty($threstone_ringname) ?  $threstone_ringname : 'Three-Stone Ring' );
        $itemtitle_3stone = 'Beta 256a Three Stone '.$diam_shape.' <br>Diamond Engagement Ring';
        $threstone_wireprice = wire_price($row_itdt['totalprice']);
        $totals_dmcarat = _nf($diamond['carat'], 2);
					
        if( !empty( $row_itdt['vendorname'] ) && empty($manfact) ) {
                $itemDetails .= '<tr>
                                    <td><b>Stock#</b></td>
                                    <td colspan="5"></td>
                              </tr>
                              <tr>
                                    <td><b>Manufacturer</b></td>
                                    <td colspan="5">'.$row_itdt['vendorname'].'</td>
                              </tr>
                              <tr>
                                    <td><b>Telephone Number</b></td>
                                    <td colspan="5"></td>
                              </tr>';
        }
    if($st== 1) {
        $itemDetails .= '<tr>
                            <td>Item List</td>
                            <td>Three Stone Ring</td>
                            <td>Description</td>
                            <td>Measurements</td>
                            <td>Total Carat</td>
                            <td>Qty</td>
                            <td>Price</td>
                      </tr>';
    }
                                        
    $itemDetails .= '<tr>
                    <td>'.$r.'</td>
                    <td><div><img src="'.$unique_ringimg.'" alt="'.$itemtitle_3stone.'" width="'.$imgwidth.'" /><br>'.$itemtitle_3stone.'</div>';

    $itemDetails .= $item_rings_features;
    $itemDetails .= '</td>
                        <td>'.$itemtitle_3stone.'
                        <div>Center Stone: '.$diamond['lot'].'</div>
                        </td>
                        <td>
                        <div>Center Stone: '.$diamond['Meas'].'</div>
                        </td>
                        <td>'.$totals_dmcarat.'</td>
                        <td>'.$row_itdt['quantity'].'</td>
                        <td>$'._nf($row_itdt['totalprice'],2).'</td>
                  </tr>';

        $itemtitle_3stone = 'Beta 256a Three Stone '.$diam_shape.' Diamond Engagement Ring';
        $order_xml_content .= '<order_detail>';
        $order_xml_content .= '<item_detail>';
        $order_xml_content .= '<order_id>'.$row_itdt['orderid'].'</order_id>';
        $order_xml_content .= '<product_id>'.$rowun_dtring['style_group'].'</product_id>';
        $order_xml_content .= '<setting_type>NA</setting_type>';
        $order_xml_content .= '<shape>'.$diam_shape.'</shape>';
        $order_xml_content .= '<stone1>'.$side1['lot'].'</stone1>';
        $order_xml_content .= '<carat1>'.$side1['carat'].'</carat1>';
        $order_xml_content .= '<measurement1>'.$side1['Meas'].'</measurement1>';
        $order_xml_content .= '<name>'.$itemtitle_3stone.'</name>';
        $order_xml_content .= '<description>'.$itemtitle_3stone.'</description>';
        $order_xml_content .= $xml_item_features;
        $order_xml_content .= '<quantity>'.$row_itdt['quantity'].'</quantity>';
        $order_xml_content .= '<price>'.$row_itdt['totalprice'].'</price>';
        $order_xml_content .= '<totalprice>'.$ttPrice.'</totalprice>';
        $order_xml_content .= '<addoption>'.$row_itdt['addoption'].'</addoption>';
        $order_xml_content .= '<image_link>'.$unique_ringimg.'</image_link>';
        $order_xml_content .= '</item_detail>';
        $order_xml_content .= '</order_detail>';
    
    $ad3stone_ringprice = $ad3stone_ringprice + $ttPrice;
    $st++;
    break;
                                        
					////// build your 3stone ring
					case 'tothreestone':
					$diamond = $CI->Diamondmodel->getDetailsByLot($row_itdt['lot']);
					$dprice = $diamond['price'];
					$diam_shape = view_shape_value($d1_image, $diamond['shape']);
					$diam_image1 = $shape_imgurl.$d1_image;
					
					$side1 = $CI->Diamondmodel->getDetailsByLot($row_itdt['sidestone1']);
					$s1price = $side1['price'];
					$diam1_shape = view_shape_value($dm1_image, $side1['shape']);
					$diamnd_image1 = $shape_imgurl.$dm1_image;
					
					$side2 = $CI->Diamondmodel->getDetailsByLot($row_itdt['sidestone2']);
					$s2price = $side2['price'];
					$diam2_shape = view_shape_value($dm2_image, $side2['shape']);
					$diamnd_image2 = $shape_imgurl.$dm2_image;
					
					//// unique 3stone ring
					$build_3stone = $row_itdt['stone_type'];
					$default_ringsize = '';
					if( $build_3stone == 'unique' ){
						$setting_metal = $row_itdt['default_metal'];
						$default_ringsize = $row_itdt['default_ringsize'];
						$rowun_dtring = $CI->Catemodel->getRingsDetailViaId($row_itdt['ringsetting'], $setting_metal, $default_ringsize);
						$sprice= $rowun_dtring['priceRetail'];
						$data['rowun_dtring'] = $rowun_dtring;
						$unique_ringimg = SITE_URL.'scrapper/imgs/'.$rowun_dtring['ImagePath'];
						$thestone_setinglink = config_item('base_url').'site/engagementRingDetail/'.$rowun_dtring['catid'].'/'.$row_itdt['ringsetting'];
					} else {
						$setttings = $CI->Jewelrymodel->getAllByStock($row_itdt['ringsetting']);
						$sprice = $setttings['price'];
						$unique_ringimg = $row_itdt['image_url'];
						$thestone_setinglink = config_item('base_url').'jewelry/tothree_stonedetail/'.$row_itdt['ringsetting'];
						$setting_metal = ( $setttings['metal'] == 'WhiteGold' ? 'White Gold' : $setttings['metal'] );
					}
					
					$setingring_size = ( !empty($row_itdt['chain_size']) ? $row_itdt['chain_size'] : $default_ringsize );
					
					$lot3stone_link = diamond_detail_link($diamond['lot'],$row_itdt['addoption'],$row_itdt['ringsetting']);
					$stone1_3stone = diamond_detail_link($side1['lot'],$row_itdt['addoption'],$row_itdt['ringsetting']);
					$stone2_3stone = diamond_detail_link($side2['lot'],$row_itdt['addoption'],$row_itdt['ringsetting']);
					
					//$threstone_ringname = $details['style'].' '.$setttings['shape'].' Diamond Engagement Ring <span>in '.$setttings['metal'].' ('.$setttings['total_carats'].' tw.)</span>';
					$threstone_ringname = $details['style'].' '.$setttings['shape'].' Diamond Engagement Ring';
					$threstone_ringname = ( !empty($threstone_ringname) ?  $threstone_ringname : 'Three-Stone Ring' );
					$itemtitle_3stone = 'Beta 256a Three Stone '.$diam_shape.' <br>Diamond Engagement Ring';
					$threstone_wireprice = wire_price($row_itdt['totalprice']);
					$totals_dmcarat = $side1['carat'] + $side2['carat'] + $diamond['carat'];
					
                                if( !empty( $row_itdt['vendorname'] ) && empty($manfact) ) {
                                        $itemDetails .= '<tr>
                                                            <td><b>Stock#</b></td>
                                                            <td colspan="5"></td>
                                                      </tr>
                                                      <tr>
                                                            <td><b>Manufacturer</b></td>
                                                            <td colspan="5">'.$row_itdt['vendorname'].'</td>
                                                      </tr>
                                                      <tr>
                                                            <td><b>Telephone Number</b></td>
                                                            <td colspan="5"></td>
                                                      </tr>';
                                }
					if($st== 1) {
					$itemDetails .= '<tr>
										<td>Item List</td>
										<td>Three Stone Ring</td>
										<td>Description</td>
										<td>Measurements</td>
										<td>Total Carat</td>
										<td>Qty</td>
										<td>Price</td>
									  </tr>';
					}
                                        
$itemDetails .= '<tr>
                    <td>'.$r.'</td>
                    <td><div><img src="'.$unique_ringimg.'" alt="'.$itemtitle_3stone.'" width="'.$imgwidth.'" /><br>'.$itemtitle_3stone.'</div>';

$itemDetails .= $item_rings_features;

$itemDetails .= '</td>
                    <td>'.$itemtitle_3stone.'
                    <div>Stone1: '.$side1['lot'].'</div>
                    <div>Stone2: '.$side2['lot'].'</div>
                    <div>Center Stone: '.$diamond['lot'].'</div>
                    </td>
                    <td>
                    <div>Stone1: '.$side1['Meas'].'</div>
                    <div>Stone2: '.$side2['Meas'].'</div>
                    <div>Center Stone: '.$diamond['Meas'].'</div>
                    </td>
                    <td>'.$totals_dmcarat.'</td>
                    <td>'.$row_itdt['quantity'].'</td>
                    <td>$'._nf($row_itdt['totalprice'],2).'</td>
              </tr>';

                    $itemtitle_3stone = 'Beta 256a Three Stone '.$diam_shape.' Diamond Engagement Ring';
                    $order_xml_content .= '<order_detail>';
                    $order_xml_content .= '<item_detail>';
                    $order_xml_content .= '<order_id>'.$row_itdt['orderid'].'</order_id>';
                    $order_xml_content .= '<product_id>'.$rowun_dtring['style_group'].'</product_id>';
                    $order_xml_content .= '<setting_type>NA</setting_type>';
                    $order_xml_content .= '<shape>'.$diam_shape.'</shape>';
                    $order_xml_content .= '<stone1>'.$side1['lot'].'</stone1>';
                    $order_xml_content .= '<stone2>'.$side2['lot'].'</stone2>';
                    $order_xml_content .= '<carat1>'.$side1['carat'].'</carat1>';
                    $order_xml_content .= '<carat2>'.$side2['carat'].'</carat2>';
                    $order_xml_content .= '<measurement1>'.$side1['Meas'].'</measurement1>';
                    $order_xml_content .= '<measurement2>'.$side2['Meas'].'</measurement2>';
                    $order_xml_content .= '<name>'.$itemtitle_3stone.'</name>';
                    $order_xml_content .= '<description>'.$itemtitle_3stone.'</description>';
                    $order_xml_content .= $xml_item_features;
                    $order_xml_content .= '<quantity>'.$row_itdt['quantity'].'</quantity>';
                    $order_xml_content .= '<price>'.$row_itdt['totalprice'].'</price>';
                    $order_xml_content .= '<totalprice>'.$ttPrice.'</totalprice>';
                    $order_xml_content .= '<addoption>'.$row_itdt['addoption'].'</addoption>';
                    $order_xml_content .= '<image_link>'.$unique_ringimg.'</image_link>';
                    $order_xml_content .= '</item_detail>';
                    $order_xml_content .= '</order_detail>';
    
					$ad3stone_ringprice = $ad3stone_ringprice + $ttPrice;
					$st++;
					break;
				}
			$r++;
			}
			$orders_totalprice = $adjtotal_price + $order_ttprice + $adtoring_price + $adtoearing_price + $ad3stone_pendantprice + $ad3stone_ringprice + $adpendant_totalprice;
			
			$engCost = 0;
			$totalnet_amount = $orders_totalprice;
			
			            $where_dev_order_oid    = array('orders_id' => $o_id);
                        $dev_order_data         = $CI->Catemodel->getdata_any_table_where($where_dev_order_oid, 'dev_order'); 
                        
                        $totalnet_amount        = $dev_order_data[0]->totalprice;
                        
                        $itemOrder      = $CI->Commonmodel->getOrderDetail($o_id, 'processingfee');
                        $orderamount    = getSalesTaxAmount($totalnet_amount, $itemOrder['salestax_percent']);
                        
                        $processingFee = 0;
                        if( $itemOrder['processingfee'] > 0 ) {
                            $processingFee = $itemOrder['processingfee'];
                            $itemDetails .= '<tr>
                                                <td colspan="5">Processing Fee</td>
                                                <td>$'.$itemOrder['processingfee'].'</td>
                                            </tr>';
                        }
                        $totalOrderAmount = $orders_totalprice + $processingFee;
                        
                        if( $itemOrder['salestax_percent'] > 0 ) {
                            $itemDetails .= '<tr>
                                                <td colspan="55">Total Item Amount</td>
                                                <td>$'._nf($totalnet_amount,2).'</td>
                                            </tr><tr>
                                                <td colspan="5">Sales Tax '.$itemOrder['salestax_percent'].'%</td>
                                                <td>$'.number_format($orderamount['taxamount'], 2).'</td>
                                            </tr>';
                        }
                        $itemDetails .= '<tr>
							<td colspan="5">Total Order Amount</td>
							<td>$'._nf($orderamount['total_amount'],2).'</td>
						  </tr>
                                                  <tr style="display:none;">
							<td colspan="5" style="display:none;">Total Wire Amount</td>
							<td style="display:none;">$'._nf( wire_price($orderamount['total_amount']),2).'</td>
						  </tr>';
                        
			if( !empty($row_itdt['engraved_text']) ) 
			{
			$engCost = 30;
			$totalnet_amount = $orderamount['total_amount'] + $engCost;
			
			$itemDetails .= '<tr>
							<td colspan="5">Engraved Cost</td>
							<td>$'.$engCost.'</td>
						  </tr>
						  <tr>
							<td colspan="5">Total Amount</td>
							<td>$'._nf($totalnet_amount,2).'</td>
						  </tr>';
			}
			
			//$order_wireamount = wire_price( $totalnet_amount );
			$net_order_amount = $orderamount['total_amount'] + $engCost;
			/*$itemDetails .= '<tr>
							<td colspan="5">Wire Amount</td>
							<td>$'._nf($order_wireamount,2).'</td>
						  </tr>';*/
		} else {
                        $net_order_amount = 0;
			$itemDetails .= '<tr><td colspan="8">No Item Detail Found</td></tr>';
		}
						  
			$itemDetails .=	'</table>';
                        
                if( !empty($view_price) ) {
                   return $net_order_amount;
               } else if( !empty( $xml_content ) ) {
                   return $order_xml_content;
               } else {
                   return $itemDetails;
               }
	}
        
    //// additional item features
    function itemFeatures($rows=array()) {
        $item_features = '';
        
        if( !empty($rows['default_ringsize']) ) {
             $item_features .= '<div style="display:none;"><b>Ring Size:</b> ' . $rows['default_ringsize'] . '</div>';
        }
        if( !empty($rows['item_metal']) ) {
             $item_features .= '<div style="display:none;"><b>Ring Metal:</b> ' . $rows['item_metal'] . '</div>';
        }
        if( !empty($rows['metal_weight']) ) {
             $item_features .= '<div style="display:none;"><b>Metal Weight:</b> ' . $rows['metal_weight'] . '</div>';
        }
        if( !empty($rows['finish_level']) ) {
             $item_features .= '<div style="display:none;"><b>Finish Level:</b> ' . resetsSlugTitle($rows['finish_level']) . '</div>';
        }
        
       return $item_features;
    }
    function xmlItemFeatures($rows=array()) {
        $item_features = '';
        
        $item_features .= '<item_metal>' . $rows['item_metal'] . '</item_metal>';
        $item_features .= '<metal_weight>' . $rows['metal_weight'] . '</metal_weight>';
        $item_features .= '<finish_level>' . resetsSlugTitle($rows['finish_level']) . '</finish_level>';
        
       return $item_features;
    }
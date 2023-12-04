<?php
class Csvfileadmin extends CI_Controller {
	function __construct() {
		parent::__construct();

		$this->load->model('csvadminmodel');
		$this->load->model('adminmodel');
	}

	function csvTemplateDownloadForSears($id) {
		$fileName = 'sears_data_'.time().'.xls';

		header("Content-type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=$fileName");
		$dataColumns = array(
			'Item ID',
			'Action Flag',
			'Active',
			'FBS Item',
			'Variation Group ID',
			'Title',
			'Short Description',
			'Long Description',
			'Seller Categories',
			'Packing Slip Description',
			'UPC',
			'Manufacturer Model #',
			'Publish Start Date',
			'Cost',
			'Price',
			'Sale Price',
			'MSRP',
			'Sale Start Date',
			'Sale End Date',
			'Promotional Text',
			'Shipping Override',
			'Free Shipping Start Date',
			'Free Shipping End Date',
			'Free Shipping Promotional Text',
			'Low Inventory Alert',
			'MAP Price Indicator',
			'Brand Name',
			'Shipping Length',
			'Shipping Width',
			'Shipping Height',
			'Shipping Weight',
			'Shipping Restrictions',
			'Shipping Cost: Ground',
			'Shipping Cost: 2 day',
			'Shipping Cost: Next Day',
			'Choking Hazard: small parts',
			'Choking Hazard: balloons',
			'Choking Hazard: small ball',
			'Choking Hazard: contains small ball',
			'Choking Hazard: contains marble',
			'Choking Hazard: other',
			'Safety Warning: other',
			'No Warning',
			'Good HouseKeeping',
			'Aerosol',
			'Chemical',
			'Batteries',
			'Pesticide',
			'California Emissions',
			'Web Exclusive',
			'Product Image URL',
			'Condition',
			'Condition Notes',
			'Condition Specific Image URL',
			'Energy Guide URL',
			'This product does not have a warranty',
			'English Owner Manual URL',
			'Product Warranty URL',
			'Spanish Owner Manual URL',
			'Spanish Warranty URL',
			'Mature Content',
			'Gift Messaging Available',
			'Swatch Image URL',
			'Feature Image URL #1',
			'Feature Image URL #2',
			'Feature Image URL #3',
			'Feature Image URL #4',
			'Feature Image URL #5',
			'Feature Image URL #6',
			'Tags',
			'Disclosures(Jewelry Disclosures) [30201] - important attribute',
			'Diamond Clarity(Diamond Clarity) [888310] - important search attribute',
			'Diamond Color(Diamond Color) [888410] - important search attribute',
			'Stone Shape(Stone Shape) [888510] - important search attribute',
			'Lab Created or Natural(Lab Created) [978610] -  attribute',
			'Total Carat Weight*(Total Carat Weight*) [3509] - important attribute'
		);
		$filerHeader = addTabToAray($dataColumns);
		echo $filerHeader;

		$fileRows = '';
		$resultsdata = $this->csvadminmodel->getExportedDiamondList($id);    
		$publisDate = date('Y-m-d');
		$saleEndDate = date('Y-m-d', strtotime("+30 days"));

		foreach($resultsdata as $row) {
			$diamondShape = viewDmShape($row['shape']);
			$imgColsValue = $this->adminmodel->getColorImgColmn($row['fancy_color'], $diamondShape);

			if(!empty($row['fancy_color'])) {
				$colored_dmwh = 'Colored diamond';
				$diamondColor = getFancyColorName($row['fancy_color']);
			} else {
				$diamondColor = $row['color'];
				$colored_dmwh = 'Colorless '.$row['color'];
			}

			$cert_img = explode(' ', $row['Cert']);
			$sql = "SELECT cert_img FROM " . $this->config->item('table_perfix') . "cert  WHERE cert_name = '" . trim($cert_img[0]) . "'";
			$query = $this->db->query($sql);
			$result = $query->result_array();
			$certimageview =  ( !empty($result[0]['cert_img']) ? $result[0]['cert_img'] : '' );
			$diamondType = $this->adminmodel->getDiamondType($row['lot']);

			$clarityEnhanc = '';
			if($diamondType['colorresult'] > 0){
				$typeDescription = "100% Natural Colored Diamond; No Artificial Enhancement of Any Kind!";
			}
			if($diamondType['clarityresult'] > 0){
				$typeDescription = "100% Natural Diamond; Artificial Clarity Enhancement!";
				$clarityEnhanc = ' Clarity Enhanced ';
			}
			if($diamondType['whiteresult'] > 0){
				$typeDescription = "100% Natural Diamond; No Artificial Enhancement of Any Kind!";
			}

			if( !empty($row['fancy_color']) ) {
				$viewhtmlTitle = $row['carat'] . ' CT ' . $diamondShape . ' ' . $row['clarity'] . ' '.getFancyColorName($row['fancy_color']).' Fancy Loose Diamond! ' . $row['cert'];           
			} else {
				$viewhtmlTitle = $row['carat'] . ' CT ' . $diamondShape . ' ' . $row['color'] . ' ' . $row['clarity'] . ' '.$clarityEnhanc.'Loose Diamond! ' . $row['cert'];
			}

			$rowslist['item_id']              = $row['lot'];
			$rowslist['action_flag']          = '';
			$rowslist['active_value']         = 'Y';
			$rowslist['fbs_item']             = 'N';
			$rowslist['variation_group_id']   = '';
			$rowslist['diamond_title']        = $viewhtmlTitle;
			$rowslist['short_description']    = $rowslist['diamond_title'];
			$rowslist['long_description']     = $typeDescription;
			$rowslist['seller_categories']		= 'Loose Diamonds & Gemstones-Loose Diamonds-Colored Natural Diamonds';
			$rowslist['packing_slip_desc']                 = ''; //$diamondType['diamnd_type'];
			$rowslist['upc']                               = '';
			$rowslist['manufacture_model_no']              = $rowslist['item_id'];
			$rowslist['publish_start_date']                = $publisDate;
			$rowslist['cost']                              = $row['ourprice'];
			$rowslist['price']                             = $row['ourprice'];
			$rowslist['sale_price']                        = $row['ourprice'];
			$rowslist['msrp']                              = $row['ourprice'];
			$rowslist['sale_start_date']                   = $publisDate;
			$rowslist['sale_end_date']                     = $saleEndDate;
			$rowslist['promotional_text']                  = '';
			$rowslist['shiping_override']                  = 0.00;
			$rowslist['free_shipping_start_date']          = $publisDate;
			$rowslist['free_shipping_end_date']            = $saleEndDate;
			$rowslist['free_ship_promotional_text']        = '';
			$rowslist['low_inventory_alert']               = 0;
			$rowslist['map_price_indicator']               = '';
			$rowslist['brand_name']                        = 'Certed Diamonds';
			$rowslist['shipping_length']                   = ckempty($row['length'],0);
			$rowslist['shipping_width']                    = ckempty($row['width'], 0);
			$rowslist['shipping_height']                   = ckempty($row['height'], 0);
			$rowslist['shipping_weight']                   = ckempty($row['carat'], 0);
			$rowslist['shipping_restrictions']             = '';
			$rowslist['shipping_cost_ground']              = '';
			$rowslist['shipping_cost_2day']                = '';
			$rowslist['shipping_cost_nextday']             = '';
			$rowslist['choking_hazard_small_parts']        = 'N';
			$rowslist['choking_hazard_ballons']            = 'N';
			$rowslist['choking_hazard_small_ball']         = 'N';
			$rowslist['choking_hazard_contain_small_ball'] = 'N';
			$rowslist['choking_hazard_contains_marble']    = 'N';
			$rowslist['choking_hazard_other']              = 'N';
			$rowslist['safety_warning_other']              = 'N';
			$rowslist['no_warning']                        = 'N';
			$rowslist['good_housekeeping']                 = 'N';
			$rowslist['aerosol']                           = 'N';
			$rowslist['chemical']                          = 'N';
			$rowslist['batteries']                         = 'N';
			$rowslist['pesticide']                         = 'N';
			$rowslist['california_emissoins']              = 'N';
			$rowslist['web_exclusive']                     = 'N';
			$rowslist['product_image_url']                 = $imgColsValue;
			$rowslist['condition']                         = 'New';
			$rowslist['condition_notes']                   = '';
			$rowslist['condition_specific_imgurl']         = '';
			$rowslist['energy_guide_url']                  = '';
			$rowslist['product_nothave_waranty']           = 'N';
			$rowslist['english_owner_manual_url']          = '';
			$rowslist['product_waranty_url']               = '';
			$rowslist['spanish_owner_manual_url']          = '';
			$rowslist['spanish_waranty_url']               = '';
			$rowslist['mature_content']                    = 'N';
			$rowslist['gift_messaging_available']          = 'N';
			$rowslist['swatch_image_url']                  = $imgColsValue;
			$rowslist['feature_image_1']                   = '';
			$rowslist['feature_image_2']                   = $certimageview;
			$rowslist['feature_image_3']                   = '';
			$rowslist['feature_image_4']                   = '';
			$rowslist['feature_image_5']                   = '';
			$rowslist['feature_image_6']                   = '';
			$rowslist['tags']                              = $diamondType['diamnd_type'];
			$rowslist['disclosure_jw_disc']                = 'Enhanced';
			$rowslist['diamond_clarity']                   = $row['clarity'];
			$rowslist['diamond_color']                     = $colored_dmwh;
			$rowslist['stone_shape']                       = $diamondShape;
			$rowslist['lab_created_ornatural']             = ( !empty($row['clarity']) ? 'Lab created' : 'Natural' );
			$rowslist['total_carat_weight']                = $row['carat'];

			$fileRows .= addTabToAray($rowslist);
		}
		echo $fileRows;
		exit;
	}

	function csvTemplateDownlaodForAmazon($id) {
		$fileName = 'amzon_data_'.time().'.txt';
		$handle = fopen($fileName, "a") or die("Unable to open file!");
		$fileDataHeader = file_get_contents("amazon_file_data.txt");
		fwrite($handle, $fileDataHeader."\r\n");

		$resultsdata = $this->csvadminmodel->getExportedDiamondList($id, 'amazon', 'amazon');
		$publisDate = date('Y-m-d');
		$saleEndDate = date('Y-m-d', strtotime("+30 days"));

		$dataList = array();
		foreach($resultsdata as $row) {
			$diamondShape = viewDmShape($row['shape']);
			$imgColsValue = $this->adminmodel->getColorImgColmn($row['fancy_color'], $diamondShape, '', 'amazon');

			if( !empty($row['fancy_color']) ) {
				$diamond_type = 'Fancy Colored Diamond';
				$diamondColor = getFancyColorName($row['fancy_color']);
				$member_coment = ( ( !empty($row['Comment']) && $row['Cert'] == 'GIA' ) ? $row['Comment'] : '' );
				$stones_color = $row['fancy_color'];
				$gemType = 'colored-diamond';
			} else {
				$diamondColor = $row['color'];
				$diamond_type = 'White Diamond';
				$member_coment = '';
				$stones_color = $row['color'];
				$gemType = 'white-diamond';
			}

			$cert_img = explode(' ', $row['Cert']);
			$sql = "SELECT cert_img FROM " . $this->config->item('table_perfix') . "cert  WHERE cert_name = '" . trim($cert_img[0]) . "'";
			$query = $this->db->query($sql);
			$result = $query->result_array();
			$certimageview =  ( !empty($result[0]['cert_img']) ? $result[0]['cert_img'] : '' );
			$diamondType = $this->adminmodel->getDiamondType($row['lot']);
			$listingPrice = (string)round($row['discountPrice'],2);
			$rowother = $this->adminmodel->getDiamondShapeRow($row['lot']);

			$clarityEnhanc = '';
			$clarityCheck = '';
			if($diamondType['colorresult'] > 0){
				$typeDescription = "100% Natural Colored Diamond";
			}
			if($diamondType['clarityresult'] > 0){
				$typeDescription = "100% Natural Diamond; Artificial Clarity Enhancement!";
				$clarityEnhanc = ' Clarity Enhanced ';
				$clarityCheck = 'clarity-enhanced';
			}
			if($diamondType['whiteresult'] > 0){
				$typeDescription = "100% Natural Diamond";
			}

			$setGemType = ( !empty($clarityCheck) ? $clarityCheck : $gemType );
			$row['carat'] = number_format($row['carat'], 2);
			$certLabel = ( ( $row['Cert'] == 'EGL' || $row['Cert'] == 'EGL OTHER' ) ? 'EGL' : $row['Cert'] );
			$certCertified = ( ( !empty($certLabel) && $certLabel != 'NONE' ) ? $certLabel : '' );

			if( !empty($row['fancy_color']) ) {
				$color_overtone = ( !empty($row['fancy_color_ot']) ? $row['fancy_color_ot'] . ' ' : '' );
				$viewhtmlTitle = $row['carat'] . ' CT ' . $diamondShape . ' ' . $row['clarity'] . ' ' . $color_overtone .getFancyColorName($row['fancy_color']) .' Fancy Loose Diamond! ' . $certCertified;           
			} else {
				$viewhtmlTitle = $row['carat'] . ' CT ' . $diamondShape . ' ' . $row['color'] . ' ' . $row['clarity'] . ' '.$clarityEnhanc.'Loose Diamond! ' . $certCertified;
			}
			$salePrice = $this->adminmodel->getLooseFiltersDiscount($row['discountPrice'], 'Amazon');
			$salesPrice = (string)round($salePrice,2);

			$rowslist['item_sku']      = $row['lot'];
			$rowslist['item_name']     = $viewhtmlTitle;
			$rowslist['manufacturer']                    = $row['owner'];
			$rowslist['model']                           = $row['Stock_n'];
			$rowslist['feed_product_type']               = 'FineOther'; //$diamondType['diamnd_type'];
			$rowslist['item_type']                       = 'loose-gemstones'; //$diamondType['diamnd_type'];
			$rowslist['brand_name']                      = 'CERTED DIAMONDS'; //$rowslist['item_name'];
			$rowslist['update_delete']                   = 'Update';
			$rowslist['external_product_id']             = ''; //Diamond Category';
			$rowslist['external_product_id_type']        = '';
			$rowslist['product_description']             = $rowslist['item_name'];
			$rowslist['standard_price']                  = $listingPrice;
			$rowslist['quantity']                        = '1';
			$rowslist['product_site_launch_date']        = $publisDate;
			$rowslist['product_tax_code']                = '';
			$rowslist['list_price']                      = $listingPrice;
			$rowslist['sale_price']                      = $salesPrice;
			$rowslist['sale_from_date']                  = $publisDate;
			$rowslist['sale_end_date']                   = $saleEndDate;
			$rowslist['merchant_release_date']           = $publisDate;
			$rowslist['item_package_quantity']           = '1';
			$rowslist['fulfillment_latency']             = '';
			$rowslist['restock_date']                    = $publisDate;
			$rowslist['max_aggregate_ship_quantity']     = '1';
			$rowslist['offering_can_be_gift_messaged']   = '';
			$rowslist['offering_can_be_giftwrapped']     = '';
			$rowslist['is_discontinued_by_manufacturer'] = '';
			$rowslist['missing_keyset_reason']           = '';
			$rowslist['merchant_shipping_group_name']    = '';
			$rowslist['website_shipping_weight']          = $row['carat'];
			$rowslist['website_shipping_weight_unit_of_measure'] = 'OZ';
			$rowslist['display_dimensions_unit_of_measure']      = '';
			$rowslist['item_display_width']                      = $row['width'];
			$rowslist['item_display_length']                     = $row['length'];
			$rowslist['item_length']                             = $row['length'];
			$rowslist['item_width']                              = $row['width'];
			$rowslist['item_height']                             = $row['height'];
			$rowslist['item_dimensions_unit_of_measure']         = '';
			$rowslist['bullet_point1']                           = $rowslist['item_name'];
			$rowslist['bullet_point2']                           = $diamond_type; //$diamondType['diamnd_type'];
			$rowslist['bullet_point3']                           = 'Comment: '.$member_coment; //$diamond_type;
			$rowslist['bullet_point4']                           = ''; //$member_coment;
			$rowslist['bullet_point5']                           = '';
			$rowslist['target_audience_keywords1']               = '';
			$rowslist['target_audience_keywords2']               = '';
			$rowslist['target_audience_keywords3']               = '';
			$rowslist['catalog_number']                          = '';
			$rowslist['specific_uses_keywords1']                 = '';
			$rowslist['specific_uses_keywords2']          = '';
			$rowslist['specific_uses_keywords3']          = '';
			$rowslist['specific_uses_keywords4']          = '';
			$rowslist['specific_uses_keywords5']          = '';
			$rowslist['thesaurus_subject_keywords1']      = '';
			$rowslist['thesaurus_subject_keywords2']      = '';
			$rowslist['thesaurus_subject_keywords3']      = '';
			$rowslist['thesaurus_subject_keywords4']      = '';
			$rowslist['thesaurus_subject_keywords5']      = '';
			$rowslist['generic_keywords']                 = '';
			$rowslist['main_image_url']                   = $imgColsValue;
			$rowslist['swatch_image_url']                 = $certimageview;
			$rowslist['other_image_url1']                 = $rowother['amazon_img1'];
			$rowslist['other_image_url2']                 = $rowother['amazon_img2'];
			$rowslist['other_image_url3']                 = $rowother['amazon_img3'];
			$rowslist['fulfillment_center_id']            = '';
			$rowslist['package_width']                    = $row['width'];
			$rowslist['package_weight_unit_of_measure']   = 'GR';
			$rowslist['package_weight']                   = $row['carat'];
			$rowslist['package_length']                   = $row['length'];
			$rowslist['package_height']                   = $row['heigth'];
			$rowslist['package_dimensions_unit_of_measure'] = '';
			$rowslist['parent_child']                       = '';
			$rowslist['parent_sku']                         = '';
			$rowslist['relationship_type']                  = '';
			$rowslist['variation_theme']                    = '';
			$rowslist['country_of_origin']                  = 'US';
			$rowslist['consumer_notice_prop65']             = '';
			$rowslist['cpsia_cautionary_statement1']        = '';
			$rowslist['cpsia_cautionary_statement2']        = '';
			$rowslist['cpsia_cautionary_statement3']        = '';
			$rowslist['cpsia_cautionary_statement4']        = '';
			$rowslist['cpsia_cautionary_description']       = '';
			$rowslist['department_name']                    = 'womens';
			$rowslist['thesaurus_attribute_keywords1']      = '';
			$rowslist['thesaurus_attribute_keywords2']      = '';
			$rowslist['thesaurus_attribute_keywords3']      = '';
			$rowslist['thesaurus_attribute_keywords4']      = '';
			$rowslist['thesaurus_attribute_keywords5']      = '';
			$rowslist['total_diamond_weight']               = $row['carat'];
			$rowslist['total_diamond_weight_unit_of_measure'] = 'CARATS';
			$rowslist['total_gem_weight']                   = '';
			$rowslist['total_gem_weight_unit_of_measure']   = 'CARATS';
			$rowslist['material_type']                      = '';
			$rowslist['metal_type']                         = 'no-metal-type';
			$rowslist['metal_stamp']                        = 'no-metal-stamp';
			$rowslist['setting_type']                       = '';
			$rowslist['number_of_stones']                   = '';
			$rowslist['clasp_type']                         = '';
			$rowslist['chain_type']                         = '';
			$rowslist['ring_size']                          = '';
			$rowslist['ring_sizing_lower_range']            = '';
			$rowslist['ring_sizing_upper_range']            = '';
			$rowslist['back_finding']                       = '';
			$rowslist['gem_type1']                          = $setGemType; //( $row['Stones'] != '' ? $row['Stones'] : 1 );
			$rowslist['gem_type2']                          = $setGemType;
			$rowslist['gem_type3']                          = $setGemType;
			$rowslist['stone_cut']                          = $this->cutValue($row['cut']);
			$rowslist['stone_color1']                       = $diamondColor;
			$rowslist['stone_color2']                       = '';
			$rowslist['stone_clarity1']                     = $row['clarity'];
			$rowslist['stone_clarity2']                     = '';
			$rowslist['stone_shape1']                       = $diamondShape;
			$rowslist['stone_shape2']                       = '';
			$rowslist['stone_creation_method1']             = 'Natural';
			$rowslist['stone_creation_method2']             = '';
			$rowslist['stone_treatment_method1']            = '';
			$rowslist['stone_treatment_method2']            = '';
			$rowslist['stone_weight1']                      = $row['carat'];
			$rowslist['stone_weight2']                      = '';
			$rowslist['pearl_type']                         = '';
			$rowslist['pearl_minimum_color']                = '';
			$rowslist['pearl_lustre']                       = '';
			$rowslist['pearl_shape']                        = '';
			$rowslist['pearl_uniformity']                   = '';
			$rowslist['pearl_surface_blemishes']            = '';
			$rowslist['pearl_stringing_method']             = '';
			$rowslist['size_per_pearl']                     = '';
			$rowslist['number_of_pearls']                   = '';
			$rowslist['style_name']                         = '';
			$rowslist['color_name']                         = $diamondColor;
			$rowslist['total_metal_weight']                 = '';
			$rowslist['total_metal_weight_unit_of_measure'] = '';
			$rowslist['certificate_type']                   = $row['lab'];
			$dataString = implode("_arcols_", $rowslist);
			$data_strings = str_replace('_arcols_', "\t", $dataString);
			fwrite($handle, $data_strings."\r\n");
		}
		fclose($handle);

		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename='.basename($fileName));
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize($fileName));
		readfile($fileName);

		unlink($fileName);
		exit;
	}

	/* set cut value */
	function cutValue($cuts='') {
		switch ($cuts) {
			case 'EX':
				$cutvalue = 'Excellent';
				break;
			case 'Fair':
				$cutvalue = 'Fair';
				break;
			case 'G':
				$cutvalue = 'Good';
				break;
			case 'ID':
				$cutvalue = 'Ideal';
				break;
			case 'N':
				$cutvalue = 'NONE';
				break;
			case 'Poor':
				$cutvalue = 'Poor';
				break;
			case 'VG':
				$cutvalue = 'Very Good';
				break;
			default :
				$cutvalue = 'NONE';
				break;
		}
		return $cutvalue;
	}

}
?>
<?php
class RingItemAmazonTemplate extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('csvadminmodel');
		$this->load->model('itemjewelrymodel');
		$this->load->model('adminmodel');
		$this->load->helper('item_jewelry_section');
	}

	/* download text file (tab delimited file) file to upload it on amazon start from here */
	function txtTemplateDownlaodForAmazon($viewType='', $id=0) {
		$resultsdata = $this->itemjewelrymodel->getCollectionItemListings($viewType, $id);
		$fileName = 'amzon_data_'.time().'.txt';
		$handle = fopen($fileName, "a") or die("Unable to open file!");
		$fileDataHeader = file_get_contents("rings_item_amazon_file_data.txt"); 
		fwrite($handle, $fileDataHeader."\r\n");

		$publisDate = date('Y-m-d');
		$saleEndDate = date('Y-m-d', strtotime("+30 days"));
		foreach($resultsdata as $row) {
			$diamondShape = viewDmShape($row['shape']);
			$imgColsValue = item_section_img_src($row['id'], 'amazon');
			$details = $this->itemjewelrymodel->getItemSpecification($row['id'], 'dev_ebay_details');
			$item_id = ( !empty($details['random_item_id']) ? $details['random_item_id'] : $details['item_id'] );

			$gemType = 'white-diamond';
			$listingPrice = (string)round($row['price'],2);
			$setGemType = $gemType;
			$row['carat'] = number_format($row['carat'], 2);

			if( !empty($row['amazon_type']) ) {
				$viewhtmlTitle = $row['gender_name'] . ' ' . $row['category'] . ' ' . $row['sub_category'] . ' Itme ID: ' . $row['product_name'];
				$diamondShape = getGlobalFieldsValue($row['global_fields'], 'S-SHAPE');
			} else {
				$cate = explode(' ', $row['category']);
				$diamondShape = $cate[0];
				$viewhtmlTitle = item_jew_title( $row, 'Hearts and Diamonds' );
			}         

			$salesPrice = $listingPrice;
			$rowslist['item_type']               = 'rings';
			$rowslist['item_sku']                = $item_id;
			$rowslist['external_product_id']     = '';
			$rowslist['external_product_id_type'] = '';
			$rowslist['brand_name']               = 'HeartsandDiamonds';
			$rowslist['item_name']                = $viewhtmlTitle;
			$rowslist['manufacturer']             = 'HeartsandDiamonds';
			$rowslist['model']                    = $item_id;
			$rowslist['feed_product_type']        = 'FashionRing';
			$rowslist['department_name']          = 'womens';
			$rowslist['metal_type']               = 'no-metal-type';
			$rowslist['metal_stamp']              = 'no-metal-stamp';
			$rowslist['ring_size']                = $details['available_sizes'];
			$rowslist['gem_type1']                = $setGemType;
			$rowslist['gem_type2']                = $setGemType;
			$rowslist['gem_type3']                = $setGemType;
			$rowslist['display_dimensions_unit_of_measure'] = 'MM';
			$rowslist['standard_price']           = $salesPrice;
			$rowslist['quantity']                 = '1';
			$rowslist['merchant_shipping_group_name'] = 'Migrated Template';
			$rowslist['main_image_url']               = $imgColsValue[0];
			$rowslist['material_type']                = 'NA';
			$rowslist['setting_type']                 = '';
			$rowslist['stone_shape1']            = $imgColsValue[1];
			$rowslist['stone_shape2']            = $imgColsValue[2];
			$rowslist['pearl_type']              = 'NA';
			$rowslist['fulfillment_center_id']   = 'AMAZON_NA';
			$rowslist['package_length']          = '';
			$rowslist['package_height']          = $details['band_height'];
			$rowslist['package_width']           = $details['band_width'];
			$rowslist['package_dimensions_unit_of_measure'] = 'MM';
			$rowslist['package_weight']                     = $details['total_carat_weight'];
			$rowslist['package_weight_unit_of_measure']     = 'OZ';
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
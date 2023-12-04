<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Make_item_list_excel_file extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('adminmodel');
		$this->load->model('user');
		$this->load->model('sitepaging');
		$this->load->model('commonmodel');
		$this->load->model('davidsternmodel');
		$this->load->helper('admin_libs');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('item_jewelry_section');
		$this->load->model('itemjewelrymodel');

		$cu = current_url();
		$url = explode('/', $cu);
		$uri = ( isset($url[4]) ? $url[4] : '' );
		$this->session->set_userdata('pages_name', $uri);
	}

	function download_item_listings_excel($view_type='ERPHD', $filter_id=0) {
        date_default_timezone_set('Asia/Karachi');
		require('excel_libs/PHPExcel.php');

		$results = $this->itemjewelrymodel->getCollectionItemListings($view_type, $filter_id); //print_ar($results);

		$objPHPExcel = new PHPExcel;
		$objPHPExcel->getDefaultStyle()->getFont()->setName('Calibri');
		$objPHPExcel->getDefaultStyle()->getFont()->setSize(11);
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel2007");

		$currencyFormat = '#,#0.## \€;[Red]-#,#0.## \€';
		$numberFormat = '#,#0.##;[Red]-#,#0.##';
		$objSheet = $objPHPExcel->getActiveSheet();
		$objSheet->setTitle('Heart Market Items Listings');
		$objSheet->getStyle('A1:CN1')->getFont()->setBold(true)->setSize(11);

		$header_fields = array(
			'A' => 'Item SKU',
			'B' => 'Item Title',
			'C' => 'Gender',
			'D' => 'Category',
			'E' => 'Final Price',
			'F' => 'Material',
			'G' => 'Overview',
			'H' => 'Description',
			'I' => 'Metal',
			'J' => 'Ring Size',
			'K' => 'Appraised Value',
			'L' => 'Main Stone',
			'M' => 'Total Carat',
			'N' => 'Center Carat',
			'O' => 'Shape',
			'P' => 'Ring Color',
			'Q' => 'Ring Clarity',
			'R' => 'Additional Stones',
			'S' => 'Minimum Carat',
			'T' => 'Diamond Color',
			'U' => 'Diamond Clarity',
			'V' => 'Diamond Cut',
			'W' => 'Call it Handling Time',
			'X' => 'Image 1',
			'Y' => 'Image 2',
			'Z' => 'Image 3',
			'AA' => 'Image 4',
			'AB' => 'Image 5',
			'AC' => 'Image 6',
			'AD' => 'Image 7',
			'AE' => 'Image 8',
			'AF' => 'Image 9',
			'AG' => 'Image 10',
			'AH' => 'Image 11',
			'AI' => 'Image 12'
		);

		$headers_cols_list = $header_fields;
		foreach($headers_cols_list as $header_key => $column_name) {
			$objSheet->getCell($header_key.'1')->setValue($column_name);
			$objSheet->getColumnDimension($header_key)->setAutoSize(true);
		}

		$i = 2;
		$img_col_id = array('X', 'Y', 'Z', 'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI');
		$imgs_link = SITE_URL . 'images/';

		foreach( $results as $rows ) {
			$item_detail = $this->itemjewelrymodel->getItemSpecification($rows['id'], 'dev_ebay_details', '', $rows['item_id']);
			$ring_color = check_empty($rows['idex_fw'], $item_detail['color']);
			$images_row = $this->itemjewelrymodel->get_item_imgs($rows['id']);
			$net_total_carat = item_total_carat_value($item_detail);
			$item_title = item_jew_title($rows, $net_total_carat);
			$item_description = 'Heartsanddiamonds.com presents this stunning '.item_jew_title($rows, $net_total_carat, '').' diamond '.$rows['gender_name'].' '.$rows['category'].'. Made by HeartsandDiamonds.com a premier Designer and Brand in Lose Angeles California.';
			$item_shape = getItemDiamondShape( $rows['category'], $rows['global_fields'] );
			$center_diamond_carat = check_empty($item_detail['new_center_carat'], $item_detail['center_stone_size']);

			if( !empty($net_total_carat) ) {
				$diamond_row = $this->itemjewelrymodel->getIndexDiamondDetail($item_detail['diamond_lot_id'], 'lot');
				$ring_item_shape = get_diamond_shape( $item_shape ); // custome helper
				$ring_total_price = $rows['price'] + $diamond_row['price'];  /// ring_total_price = ring_price + diamond_price
				$appraised_value = $ring_total_price * 1.7;
				$ring_fancy_color = check_empty($diamond_row['fcolor_value'], $diamond_row['color']);

				$objSheet->getCell('A'.$i)->setValue($rows['item_id']); // item sku
				$objSheet->getCell('B'.$i)->setValue($item_title);
				$objSheet->getCell('C'.$i)->setValue($rows['gender_name']);
				$objSheet->getCell('D'.$i)->setValue($rows['category']);
				$objSheet->getCell('E'.$i)->setValue($ring_total_price);
				$objSheet->getCell('F'.$i)->setValue('Platinum');
				$objSheet->getCell('G'.$i)->setValue('Handmade item, Occasion:Enagagement, Material:Platinum, Natural Diamonds,made to order');
				$objSheet->getCell('H'.$i)->setValue($item_description);
				$objSheet->getCell('I'.$i)->setValue('Platinum');
				$objSheet->getCell('J'.$i)->setValue('4'); // ring size
				$objSheet->getCell('K'.$i)->setValue($appraised_value);
				$objSheet->getCell('L'.$i)->setValue('Diamond');
				$objSheet->getCell('M'.$i)->setValue($net_total_carat); /// total carat
				$objSheet->getCell('N'.$i)->setValue($center_diamond_carat); /// center carat
				$objSheet->getCell('O'.$i)->setValue($ring_item_shape);
				$objSheet->getCell('P'.$i)->setValue($ring_color);   // ring color
				$objSheet->getCell('Q'.$i)->setValue($item_detail['clarity']);
				$objSheet->getCell('R'.$i)->setValue('100% Natural Diamonds');
				$objSheet->getCell('S'.$i)->setValue($diamond_row['carat']);
				$objSheet->getCell('T'.$i)->setValue($ring_fancy_color);
				$objSheet->getCell('U'.$i)->setValue($diamond_row['clarity']);
				$objSheet->getCell('V'.$i)->setValue($diamond_row['cut']);
				$objSheet->getCell('W'.$i)->setValue('This engagement ring is delicate and with nice presence on the finger.
				Item will be sent in a elegant jewelry gift box.
				Handling time is 10-12 business days, delivery time is 3-5 business days , this is an international shipping through FedEx Express, free of charge.
				Other shipping methods are available please feel free contact us.
				Thank you for visiting us.');
				for( $j=0; $j < 12; $j++ ) {
					if( !empty($images_row[$j]['image']) ) {
						$objSheet->getCell($img_col_id[$j].$i)->setValue($imgs_link.$images_row[$j]['image']);
					}
				}
                $i++;
			}
		}

		$file_name = 'item_listings_' . time() . '.xlsx';
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'.$file_name.'"');
		header('Cache-Control: max-age=0');

		$objWriter->save('php://output');
	}
}
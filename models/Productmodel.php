<?php 
 class Productmodel extends CI_Model {
 	
 	function __construct(){
 		parent::__construct();
 	}
 	
 	function getFieldHeadingLayout($categoryarray){
 		 $section = $categoryarray['category_name'];
 		switch($section){
			case 'Loose_Diamonds' :
				
				$view = "{display: 'ID', name : 'qtype', width : 110, sortable : false, align: 'left'}, {display: 'Shape', name : 'shape', width : 70, sortable : true, align: 'center'}, {display: 'Carat', name : 'carat', width : 55, sortable : true, align: 'center'}, {display: 'Color', name : 'color', width : 55, sortable : true, align: 'center'}, {display: 'Clarity', name : 'clarity', width : 55, sortable : true, align: 'center'}, {display: 'Price', name : 'price', width : 90, sortable : true, align: 'center'}, {display: 'Ratio', name : 'ratio', width : 65, sortable : true, align: 'center'}, {display: 'Cut', name : 'cut', width : 70, sortable : true, align: 'center'}, {display: 'Culet', name : 'culet', width : 45, sortable : true, align: 'center'},{display: 'Cert', name : 'lab', width : 45, sortable : true, align: 'center'} ";
				
				break;
			default :

				$view = "{display: 'ID', name : 'id', width : 110, sortable : false, align: 'left'}, {display: 'Product Name', name : 'product_name', width : 350, sortable : true, align: 'center'}";
				
				break;
		}

		return $view;
 	}

	function defineViewFieldValue($categoryarray){
 		$section = $categoryarray['category_name']; 
 		switch($section){
			case 'Loose_Diamonds' :
				
			$viewField = array('0' => array('type'=>'shape', 'field'=>'shape', 'align'=>'center'),
							  '1' => array('type'=>'text', 'field'=>'carat', 'align'=>'center'),
				              '2' => array('type'=>'text', 'field'=>'color', 'align'=>'center'),
				              '3' => array('type'=>'text', 'field'=>'clarity', 'align'=>'center'),
				              '4' => array('type'=>'price', 'field'=>'price', 'align'=>'center'),
				              '5' => array('type'=>'text', 'field'=>'ratio', 'align'=>'center'),
				              '6' => array('type'=>'text', 'field'=>'cut', 'align'=>'center'),
							  '7' => array('type'=>'text', 'field'=>'Culet', 'align'=>'center'),
				              '8' => array('type'=>'link', 'field'=>'lab', 'align'=>'center' )
									);
				
				break;
			default :
			$viewField = array('0' => array('type'=>'text', 'field'=>'Name', 'align'=>'center'),
				              '1' => array('type'=>'price', 'field'=>'SalePriceProduct ', 'align'=>'center'),
				              '2' => array('type'=>'image', 'field'=>'ImageFilenameOverride ', 'align'=>'center')
									);
				break;
		}

		return $viewField;
 	}
 	
	function getProductImage($filepath){

 		$path = config_item('base_path').$filepath;
		if($filepath != ''){
		
			if(file_exists($path))
				$img = "<img src=\'".config_item('base_url').$filepath."\' width=\'150px\' height=\'150px\' >";
			 else 
				$img = "<img src=\'".config_item('base_url')."images/rings/noringimage.png\' width=\'80\'>";
		} else {
			$img = "<img src=\'".config_item('base_url')."images/rings/noringimage.png\' width=\'80\'>";
		}
		
		return $img;
 	}

	function getLink($categoryarray, $linktext, $row){
 		$section = $categoryarray['category_name']; 
 		switch($section){
			case 'Loose Diamonds' :
				$link =   "<a class=\"blue\"  onclick=\"viewChart(\'" . $row ['lot'] . "\')\"  href=\"#\" >" . addslashes ( $linktext ) . "</a>";
				break;
			default :
				$link =  "<a class=\"blue\"  href=\"#\" >" . addslashes ( $linktext ) . "</a>";
				break;
		}
		return $link;
		
 	}

	function defineAddField($categoryarray){
		
		$category_name = $this->getRootParent($categoryarray);
		$section = $category_name; 
		//echo($section);
		//echo '<pre>';				 
 		switch($section){
			case 'Semi_Mounts' :
			if($categoryarray['category_name']=='White_Gold') {
				$viewField = array('0' => array('type'=>'select', 'label'=>'Metal', 'field'=>'metal', 'options'=>array('14K WG'=>'14K White Gold')),
								   '1' => array('type'=>'text', 'label'=>'WEIGHT OF METAL', 'field'=>'metal_weight', 'align'=>'center'),
								   '2' => array('type'=>'select', 'label'=>'ITEM INFO', 'field'=>'item_info', 'options'=>array('CERTIFICATE APPRAISAL'=>'CERTIFICATE APPRAISAL')),
								   '3' => array('type'=>'select', 'label'=>'DIAMONDS SHAPE', 'field'=>'diamond_shape', 									    'options'=>array('Asscher'=>'Asscher','Cushion'=>'Cushion','Emerald'=>'Emerald','Heart'=>'Heart','Marquise'=>'Marquise','Oval'=>'Oval','Pear'=>'Pear','Princess'=>'Princess','Radiant'=>'Radiant','Round'=>'Round')),
								   '4' => array('type'=>'text', 'label'=>'DIAMONDS WEIGHT', 'field'=>'diamond_weight', 'align'=>'center'),
								   '5' => array('type'=>'text', 'label'=>'CLARITY', 'field'=>'clarity', 'align'=>'center'),
								   '6' => array('type'=>'text', 'label'=>'COLOR', 'field'=>'color', 'align'=>'center'),
								   '7' => array('type'=>'text', 'label'=>'TOTAL DIAMONDS', 'field'=>'total_diamonds', 'align'=>'center'),
								   '8' => array('type'=>'select', 'label'=>'DIAMOND SETTING', 'field'=>'diamond_setting', 'options'=>array('Invisble'=>'Invisible','Channel'=>'Channel','Pave'=>'Pave')),
								   '9' => array('type'=>'select', 'label'=>'OTHER DIAMONDS SHAPE', 'field'=>'other_diamond_shape', 'options'=>array('-1'=>'Select if Any Diamond Set There', 'Asscher'=>'Asscher','Cushion'=>'Cushion','Emerald'=>'Emerald','Heart'=>'Heart','Marquise'=>'Marquise','Oval'=>'Oval','Pear'=>'Pear','Princess'=>'Princess','Radiant'=>'Radiant','Round'=>'Round')),
								   '10' => array('type'=>'text', 'label'=>'OTHER DIAMONDS WEIGHT', 'field'=>'main_diamond_weight', 'align'=>'center'),
								   '11' => array('type'=>'text', 'label'=>'OTHER CLARITY', 'field'=>'mian_diamond_clarity', 'align'=>'center'),
						
								   '12' => array('type'=>'text', 'label'=>'OTHER TOTAL DIAMONDS', 'field'=>'other_total_diamond', 'align'=>'center'),
								   '13' => array('type'=>'select', 'label'=>'OTHER DIAMOND SETTING', 'field'=>'other_diamond_setting', 'options'=>array('-1'=>'Select if Any Diamond Setting','Channel'=>'Channel','Pave'=>'Pave')),
								   '14' => array('type'=>'text', 'label'=>'WIDTH OF BAND', 'field'=>'band_width', 'align'=>'center'),
							       '15' => array('type'=>'text', 'label'=>'POLISH', 'field'=>'polish', 'align'=>'center'),
								   '16' => array('type'=>'select', 'label'=>'CONDITION', 'field'=>'condition', 'options'=>array('New'=>'100% BRAND NEW')),
								   
				 	'17' => array('type'=>'text', 'label'=>'Item No', 'field'=>'item_number', 'align'=>'center'),
					'18' => array('type'=>'text', 'label'=>'No of Diamonds', 'field'=>'noofdiamonds', 'align'=>'center'),
					'19' => array('type'=>'text', 'label'=>'Stone Treatment', 'field'=>'StoneTreatment', 'align'=>'center'),
					'20' => array('type'=>'text', 'label'=>'Main Stone', 'field'=>'MainStone', 'align'=>'center'),
					'21' => array('type'=>'text', 'label'=>'Metal Purity', 'field'=>'MetalPurity', 'align'=>'center'),
					'22' => array('type'=>'text', 'label'=>'Total Carat Weight', 'field'=>'total_weight','align'=>'center'),
					'23' => array('type'=>'text', 'label'=>'Style', 'field'=>'Style', 'align'=>'center'),
					'24' => array('type'=>'text', 'label'=>'Certificate', 'field'=>'certificate', 'align'=>'center'),
					'25' => array('type'=>'text', 'label'=>'Product Name', 'field'=>'product_name', 'align'=>'center'),
					'26' => array('type'=>'textarea', 'label'=>'Product Description', 'field'=>'product_description', 'align'=>'center'),
					'27' => array('type'=>'text', 'label'=>'Exact Total Carat Weight', 'field'=>'exact_total','align'=>'center'),
					'28' => array('type'=>'text', 'label'=>'Main Stone Color', 'field'=>'main_color', 'align'=>'center'),
				    '29' => array('type'=>'text', 'label'=>'RETAIL VALUE', 'field'=>'retail_price', 'align'=>'center'),
				    '30' => array('type'=>'text', 'label'=>'OUR PRICE', 'field'=>'store_price', 'align'=>'center'),
					'31' => array('type'=>'preselect', 'label'=>'Category', 'field'=>'categoryid', 'align'=>'center'),
					'32' => array('type'=>'file', 'label'=>'Small Image ', 'field'=>'thumbnail_pic', 'align'=>'center'),
				    '33' => array('type'=>'file', 'label'=>'Big Image', 'field'=>'main_pic', 'align'=>'center' ),
				   '34' => array('type'=>'textarea', 'label'=>'eBay Html', 'field'=>'ebay', 'align'=>'center'),
				   
									);
					} 
					elseif ($categoryarray['category_name']=='Yellow_Gold') {
				$viewField = array('0' => array('type'=>'select', 'label'=>'METAL', 'field'=>'metal', 'options'=>array('14K YG'=>'14K Yellow Gold')),
								   '1' => array('type'=>'text', 'label'=>'WEIGHT OF METAL', 'field'=>'metal_weight', 'align'=>'center'),
								   '2' => array('type'=>'select', 'label'=>'ITEM INFO', 'field'=>'item_info', 'options'=>array('CERTIFICATE APPRAISAL'=>'CERTIFICATE APPRAISAL')),
								   '3' => array('type'=>'select', 'label'=>'DIAMONDS SHAPE', 'field'=>'diamond_shape', 									    'options'=>array('Asscher'=>'Asscher','Cushion'=>'Cushion','Emerald'=>'Emerald','Heart'=>'Heart','Marquise'=>'Marquise','Oval'=>'Oval','Pear'=>'Pear','Princess'=>'Princess','Radiant'=>'Radiant','Round'=>'Round')),
								   '4' => array('type'=>'text', 'label'=>'DIAMONDS WEIGHT', 'field'=>'diamond_weight', 'align'=>'center'),
								   '5' => array('type'=>'text', 'label'=>'CLARITY', 'field'=>'clarity', 'align'=>'center'),
								   '6' => array('type'=>'text', 'label'=>'COLOR', 'field'=>'color', 'align'=>'center'),
								   '7' => array('type'=>'text', 'label'=>'Total DIAMONDS', 'field'=>'total_diamonds', 'align'=>'center'),
								   '8' => array('type'=>'select', 'label'=>'DIAMOND SETTING', 'field'=>'diamond_setting', 'options'=>array('Channel'=>'Channel','Pavet'=>'Pavet')),
								   '9' => array('type'=>'text', 'label'=>'WIDTH OF BAND', 'field'=>'band_width', 'align'=>'center'),
							       '10' => array('type'=>'text', 'label'=>'POLISH', 'field'=>'polish', 'align'=>'center'),
								   '11' => array('type'=>'select', 'label'=>'CONDITION', 'field'=>'condition', 'options'=>array('New'=>'100% BRAND NEW')),
					 '12' => array('type'=>'text', 'label'=>'Item No', 'field'=>'item_number', 'align'=>'center'),
					 '13' => array('type'=>'text', 'label'=>'No of Diamonds', 'field'=>'noofdiamonds', 'align'=>'center'),
					'14' => array('type'=>'text', 'label'=>'Stone Treatment', 'field'=>'StoneTreatment', 'align'=>'center'),
					'15' => array('type'=>'text', 'label'=>'Main Stone', 'field'=>'MainStone', 'align'=>'center'),
					'16' => array('type'=>'text', 'label'=>'Metal Purity', 'field'=>'MetalPurity', 'align'=>'center'),
					'17' => array('type'=>'text', 'label'=>'Total Carat Weight', 'field'=>'total_weight','align'=>'center'),
					'18' => array('type'=>'text', 'label'=>'Style', 'field'=>'Style', 'align'=>'center'),
					'19' => array('type'=>'text', 'label'=>'Certificate', 'field'=>'certificate', 'align'=>'center'),
					'20' => array('type'=>'text', 'label'=>'Exact Total Carat Weight', 'field'=>'exact_total','align'=>'center'),
					'21' => array('type'=>'text', 'label'=>'Main Stone Color', 'field'=>'main_color', 'align'=>'center'),
				    '22' => array('type'=>'text', 'label'=>'RETAIL VALUE', 'field'=>'retail_price', 'align'=>'center'),
				    '23' => array('type'=>'text', 'label'=>'OUR PRICE', 'field'=>'store_price', 'align'=>'center'),
					'24' => array('type'=>'preselect', 'label'=>'Category', 'field'=>'categoryid', 'align'=>'center'),
					 '25' => array('type'=>'text', 'label'=>'Product Name', 'field'=>'product_name', 'align'=>'center'),
					 '26' => array('type'=>'textarea', 'label'=>'Product Description', 'field'=>'product_description', 'align'=>'center'),
					 '27' => array('type'=>'file', 'label'=>'Small Image ', 'field'=>'thumbnail_pic', 'align'=>'center'),
				     '28' => array('type'=>'file', 'label'=>'Big Image', 'field'=>'main_pic', 'align'=>'center' ),
				   '29' => array('type'=>'textarea', 'label'=>'eBay Html', 'field'=>'ebay', 'align'=>'center')
				   
									);
			} else {
				$viewField = array('0' => array('type'=>'select', 'label'=>'METAL', 'field'=>'metal', 'options'=>array('14K YG'=>'14K Yellow Gold')),
								   '1' => array('type'=>'text', 'label'=>'WEIGHT OF METAL', 'field'=>'metal_weight', 'align'=>'center'),
								   '2' => array('type'=>'select', 'label'=>'ITEM INFO', 'field'=>'item_info', 'options'=>array('CERTIFICATE APPRAISAL'=>'CERTIFICATE APPRAISAL')),
								   '3' => array('type'=>'select', 'label'=>'DIAMONDS SHAPE', 'field'=>'diamond_shape', 									    'options'=>array('Asscher'=>'Asscher','Cushion'=>'Cushion','Emerald'=>'Emerald','Heart'=>'Heart','Marquise'=>'Marquise','Oval'=>'Oval','Pear'=>'Pear','Princess'=>'Princess','Radiant'=>'Radiant','Round'=>'Round')),
								   '4' => array('type'=>'text', 'label'=>'DIAMONDS WEIGHT', 'field'=>'diamond_weight', 'align'=>'center'),
								   '5' => array('type'=>'text', 'label'=>'CLARITY', 'field'=>'clarity', 'align'=>'center'),
								   '6' => array('type'=>'text', 'label'=>'COLOR', 'field'=>'color', 'align'=>'center'),
								   '7' => array('type'=>'text', 'label'=>'Total DIAMONDS', 'field'=>'total_diamonds', 'align'=>'center'),
								   '8' => array('type'=>'select', 'label'=>'DIAMOND SETTING', 'field'=>'diamond_setting', 'options'=>array('Channel'=>'Channel','Pavet'=>'Pavet')),
								  '9' => array('type'=>'text', 'label'=>'WIDTH OF BAND', 'field'=>'band_width', 'align'=>'center'),
							       '10' => array('type'=>'text', 'label'=>'POLISH', 'field'=>'polish', 'align'=>'center'),
								   '11' => array('type'=>'select', 'label'=>'CONDITION', 'field'=>'condition', 'options'=>array('New'=>'100% BRAND NEW')),
								   
					 '12' => array('type'=>'text', 'label'=>'Item No', 'field'=>'item_number', 'align'=>'center'),
					 '13' => array('type'=>'text', 'label'=>'No of Diamonds', 'field'=>'noofdiamonds', 'align'=>'center'),
					'14' => array('type'=>'text', 'label'=>'Stone Treatment', 'field'=>'StoneTreatment', 'align'=>'center'),
					'15' => array('type'=>'text', 'label'=>'Main Stone', 'field'=>'MainStone', 'align'=>'center'),
					'16' => array('type'=>'text', 'label'=>'Metal Purity', 'field'=>'MetalPurity', 'align'=>'center'),
					'17' => array('type'=>'text', 'label'=>'Total Carat Weight', 'field'=>'total_weight','align'=>'center'),
					'18' => array('type'=>'text', 'label'=>'Style', 'field'=>'Style', 'align'=>'center'),
					'19' => array('type'=>'text', 'label'=>'Certificate', 'field'=>'certificate', 'align'=>'center'),
					'20' => array('type'=>'text', 'label'=>'Exact Total Carat Weight', 'field'=>'exact_total','align'=>'center'),
					'21' => array('type'=>'text', 'label'=>'Main Stone Color', 'field'=>'main_color', 'align'=>'center'),
				    '22' => array('type'=>'text', 'label'=>'RETAIL VALUE', 'field'=>'retail_price', 'align'=>'center'),
				    '23' => array('type'=>'text', 'label'=>'OUR PRICE', 'field'=>'store_price', 'align'=>'center'),
					'24' => array('type'=>'preselect', 'label'=>'Category', 'field'=>'categoryid', 'align'=>'center'),
					 '25' => array('type'=>'text', 'label'=>'Product Name', 'field'=>'product_name', 'align'=>'center'),
					 '26' => array('type'=>'textarea', 'label'=>'Product Description', 'field'=>'product_description', 'align'=>'center'),
					 '27' => array('type'=>'file', 'label'=>'Small Image ', 'field'=>'thumbnail_pic', 'align'=>'center'),
				     '28' => array('type'=>'file', 'label'=>'Big Image', 'field'=>'main_pic', 'align'=>'center' ),
					'29' => array('type'=>'textarea', 'label'=>'eBay Html', 'field'=>'ebay', 'align'=>'center'),
					
									);
			}

			
				
				break;
				case 'Mens_Diamond_Bands' :
					if($categoryarray['category_name']=='White_Gold') {
						$options = array('14KT WG'=>'14K White Gold','18KT WG'=>'18KT White Gold');
					} elseif ($categoryarray['category_name']=='Yellow_Gold') {
						$options = array('14KT YG'=>'14K Yellow Gold','18KT YG'=>'18KT Yellow Gold');
					} else {
						$options = array('14KT WG'=>'14K White Gold','18KT WG'=>'18KT White Gold','14KT YG'=>'14K Yellow Gold','18KT YG'=>'18KT Yellow Gold');				
					}
					$viewField = array('0' => array('type'=>'select', 'label'=>'METAL', 'field'=>'metal', 'options'=>$options),
								   '1' =>  array('type'=>'select', 'label'=>'ITEM INFO', 'field'=>'item_info', 'options'=>array('CERTIFICATE APPRAISAL'=>'CERTIFICATE APPRAISAL')),
								   '2' => array('type'=>'select', 'label'=>'CENTER DIAMONDS SHAPE', 'field'=>'diamond_shape', 									    'options'=>array('Asscher'=>'Asscher','Cushion'=>'Cushion','Emerald'=>'Emerald','Heart'=>'Heart','Marquise'=>'Marquise','Oval'=>'Oval','Pear'=>'Pear','Princess'=>'Princess','Radiant'=>'Radiant','Round'=>'Round')),
								   '3' => array('type'=>'text', 'label'=>'DIAMONDS WEIGHT', 'field'=>'diamond_weight', 'align'=>'center'),
								   '4' => array('type'=>'text', 'label'=>'CLARITY', 'field'=>'clarity', 'align'=>'center'),
								   '5' => array('type'=>'text', 'label'=>'COLOR', 'field'=>'color', 'align'=>'center'),
								   '6' => array('type'=>'select', 'label'=>'POLISH', 'field'=>'polish',  'options'=>array('EXCELLENT TO VERY GOOD'=>'EXCELLENT TO VERY GOOD')),
								   '7' => array('type'=>'select', 'label'=>'SYMMETRY', 'field'=>'symetry', 'options'=>array('EXCELLENT TO VERY GOOD'=>'EXCELLENT TO VERY GOOD')),
								   '8' => array('type'=>'select', 'label'=>'CUT', 'field'=>'cut', 'options'=>array('EXCELLENT TO VERY GOOD'=>'EXCELLENT TO VERY GOOD')),
								   '9' => array('type'=>'text', 'label'=>'MEASUREMENT', 'field'=>'band_width', 'align'=>'center'),
							       '10' => array('type'=>'select', 'label'=>'TOTAL DIAMONDS', 'field'=>'total_diamonds', 'options'=>array('1'=>'1 INDIVIDUAL')),
								   '11' => array('type'=>'select', 'label'=>'METAL POLISH', 'field'=>'other_polish',  'options'=>array('EXCELLENT'=>'EXCELLENT HIGH')),
								   '12' => array('type'=>'select', 'label'=>'DIAMOND SETTING', 'field'=>'diamond_setting', 'options'=>array('Channel'=>'Channel')),
								   '13' => array('type'=>'select', 'label'=>'CONDITION', 'field'=>'condition', 'options'=>array('New'=>'100% BRAND NEW')),
								   
				     '14' => array('type'=>'text', 'label'=>'Item No', 'field'=>'item_number', 'align'=>'center'),
					 '15' => array('type'=>'text', 'label'=>'No of Diamonds', 'field'=>'noofdiamonds', 'align'=>'center'),
					'16' => array('type'=>'text', 'label'=>'Stone Treatment', 'field'=>'StoneTreatment', 'align'=>'center'),
					'17' => array('type'=>'text', 'label'=>'Main Stone', 'field'=>'MainStone', 'align'=>'center'),
					'18' => array('type'=>'text', 'label'=>'Metal Purity', 'field'=>'MetalPurity', 'align'=>'center'),
					'19' => array('type'=>'text', 'label'=>'Total Carat Weight', 'field'=>'total_weight','align'=>'center'),
					'20' => array('type'=>'text', 'label'=>'Style', 'field'=>'Style', 'align'=>'center'),
					'21' => array('type'=>'text', 'label'=>'Certificate', 'field'=>'certificate', 'align'=>'center'),
					'22' => array('type'=>'text', 'label'=>'Exact Total Carat Weight', 'field'=>'exact_total','align'=>'center'),
					'23' => array('type'=>'text', 'label'=>'Main Stone Color', 'field'=>'main_color', 'align'=>'center'),
				    '24' => array('type'=>'text', 'label'=>'RETAIL VALUE', 'field'=>'retail_price', 'align'=>'center'),
				    '25' => array('type'=>'text', 'label'=>'OUR PRICE', 'field'=>'store_price', 'align'=>'center'),
					'26' => array('type'=>'preselect', 'label'=>'Category', 'field'=>'categoryid', 'align'=>'center'),
					 '27' => array('type'=>'text', 'label'=>'Product Name', 'field'=>'product_name', 'align'=>'center'),
					 '28' => array('type'=>'textarea', 'label'=>'Product Description', 'field'=>'product_description', 'align'=>'center'),
					 '29' => array('type'=>'file', 'label'=>'Small Image ', 'field'=>'thumbnail_pic', 'align'=>'center'),
				    '30' => array('type'=>'file', 'label'=>'Big Image', 'field'=>'main_pic', 'align'=>'center' ),
					'31' => array('type'=>'textarea', 'label'=>'eBay Html', 'field'=>'ebay', 'align'=>'center')
					
									);
					break;
				case 'Diamond_Solitaire_Pendants' :
					if($categoryarray['category_name']=='Round_Diamond_Solitaires') {
						$options = array('Princess'=>'Princess');
					} elseif ($categoryarray['category_name']=='Princess_Diamond_Solitaires') {
						$options = array('Round'=>'Round');
					} else {
						$options = array('Asscher'=>'Asscher','Cushion'=>'Cushion','Emerald'=>'Emerald','Heart'=>'Heart','Marquise'=>'Marquise','Oval'=>'Oval','Pear'=>'Pear','Princess'=>'Princess','Radiant'=>'Radiant','Round'=>'Round');		
					}
					$viewField = array('0' => array('type'=>'select', 'label'=>'METAL', 'field'=>'metal', 'options'=>array('14KT WG'=>'14K White Gold','18KT WG'=>'18KT White Gold')),
								   '1' =>  array('type'=>'select', 'label'=>'ITEM INFO', 'field'=>'item_info', 'options'=>array('CERTIFICATE APPRAISAL'=>'CERTIFICATE APPRAISAL')),
								   '2' => array('type'=>'select', 'label'=>'CENTER DIAMONDS SHAPE', 'field'=>'diamond_shape', 'options'=>$options),
								   '3' => array('type'=>'text', 'label'=>'DIAMONDS WEIGHT', 'field'=>'diamond_weight', 'align'=>'center'),
								   '4' => array('type'=>'text', 'label'=>'CLARITY', 'field'=>'clarity', 'align'=>'center'),
								   '5' => array('type'=>'text', 'label'=>'COLOR', 'field'=>'color', 'align'=>'center'),
								   '6' => array('type'=>'select', 'label'=>'POLISH', 'field'=>'polish',  'options'=>array('EXCELLENT TO VERY GOOD'=>'EXCELLENT TO VERY GOOD')),
								   '7' => array('type'=>'select', 'label'=>'SYMMETRY', 'field'=>'symetry', 'options'=>array('EXCELLENT TO VERY GOOD'=>'EXCELLENT TO VERY GOOD')),
								   '8' => array('type'=>'select', 'label'=>'CUT', 'field'=>'cut', 'options'=>array('EXCELLENT TO VERY GOOD'=>'EXCELLENT TO VERY GOOD')),
								   '9' => array('type'=>'text', 'label'=>'MEASUREMENT', 'field'=>'band_width', 'align'=>'center'),
							       '10' => array('type'=>'select', 'label'=>'TOTAL DIAMONDS', 'field'=>'total_diamonds', 'options'=>array('1'=>'1 INDIVIDUAL')),
						           '11' => array('type'=>'checkbox','label'=>'FREE CHAIN?', 'field'=>'has_chain', 'align'=>'center'),
								   '11' => array('type'=>'select', 'label'=>'METAL POLISH', 'field'=>'other_polish',  'options'=>array('EXCELLENT'=>'EXCELLENT HIGH')),
								   '12' => array('type'=>'select', 'label'=>'DIAMOND SETTING', 'field'=>'diamond_setting', 'options'=>array('4 PRONG'=>'4 PRONG')),
								   '13' => array('type'=>'select', 'label'=>'CONDITION', 'field'=>'condition', 'options'=>array('New'=>'100% BRAND NEW')),
								   
					 '14' => array('type'=>'text', 'label'=>'Item No', 'field'=>'item_number', 'align'=>'center'),
					 '15' => array('type'=>'text', 'label'=>'No of Diamonds', 'field'=>'noofdiamonds', 'align'=>'center'),
					'16' => array('type'=>'text', 'label'=>'Stone Treatment', 'field'=>'StoneTreatment', 'align'=>'center'),
					'17' => array('type'=>'text', 'label'=>'Main Stone', 'field'=>'MainStone', 'align'=>'center'),
					'18' => array('type'=>'text', 'label'=>'Metal Purity', 'field'=>'MetalPurity', 'align'=>'center'),
					'19' => array('type'=>'text', 'label'=>'Total Carat Weight', 'field'=>'total_weight','align'=>'center'),
					'20' => array('type'=>'text', 'label'=>'Style', 'field'=>'Style', 'align'=>'center'),
					'21' => array('type'=>'text', 'label'=>'Certificate', 'field'=>'certificate', 'align'=>'center'),
					'22' => array('type'=>'text', 'label'=>'Exact Total Carat Weight', 'field'=>'exact_total','align'=>'center'),
					'23' => array('type'=>'text', 'label'=>'Main Stone Color', 'field'=>'main_color', 'align'=>'center'),
				    '24' => array('type'=>'text', 'label'=>'RETAIL VALUE', 'field'=>'retail_price', 'align'=>'center'),
				    '25' => array('type'=>'text', 'label'=>'OUR PRICE', 'field'=>'store_price', 'align'=>'center'),
					'26' => array('type'=>'preselect', 'label'=>'Category', 'field'=>'categoryid', 'align'=>'center'),
					'27' => array('type'=>'text', 'label'=>'Product Name', 'field'=>'product_name', 'align'=>'center'),
					'28' => array('type'=>'textarea', 'label'=>'Product Description', 'field'=>'product_description', 'align'=>'center'),
					'29' => array('type'=>'file', 'label'=>'Small Image ', 'field'=>'thumbnail_pic', 'align'=>'center'),
				    '30' => array('type'=>'file', 'label'=>'Big Image', 'field'=>'main_pic', 'align'=>'center' ),
					'31' => array('type'=>'textarea', 'label'=>'eBay Html', 'field'=>'ebay', 'align'=>'center'),
					
									);
					break;
				case 'Ladies_Diamond_Necklaces' :
					if($categoryarray['category_name']=='white_gold') {
						$options = array('14KT WG'=>'14K White Gold');
					} elseif ($categoryarray['category_name']=='yellow_gold') {
						$options = array('14KT YG'=>'14K Yellow Gold');
					} else {
						$options = array('14KT WG'=>'14K White Gold','14KT YG'=>'14K Yellow Gold');				
					}
					$viewField = array('0' => array('type'=>'select', 'label'=>'METAL', 'field'=>'metal', 'options'=>$options),
								   '1' =>  array('type'=>'select', 'label'=>'ITEM INFO', 'field'=>'item_info', 'options'=>array('CERTIFICATE APPRAISAL'=>'CERTIFICATE APPRAISAL')),
								   '2' => array('type'=>'text', 'label'=>'DIAMONDS WEIGHT', 'field'=>'diamond_weight', 'align'=>'center'),
								   '3' => array('type'=>'text', 'label'=>'CLARITY', 'field'=>'clarity', 'align'=>'center'),
								   '4' => array('type'=>'text', 'label'=>'COLOR', 'field'=>'color', 'align'=>'center'),
						           '5' => array('type'=>'text', 'label'=>'NECKLACE MEASUREMENT', 'field'=>'band_width', 'align'=>'center'),
								   '6' => array('type'=>'text', 'label'=>'TOTAL DIAMONDS', 'field'=>'total_diamonds'),
								   '7' => array('type'=>'select', 'label'=>'POLISH', 'field'=>'polish',  'options'=>array('EXCELLENT'=>'EXCELLENT HIGH')),
								   '8' => array('type'=>'select', 'label'=>'DIAMOND SETTING', 'field'=>'SettingType', 'options'=>array('BEZEL'=>'BEZEL')),
								   '9' => array('type'=>'select', 'label'=>'BRACLET STYLE', 'field'=>'braclet_style', 'options'=>array('DIAMOND BY THE YARD'=>'DIAMOND BY THE YARD')),
								   '10' => array('type'=>'text', 'label'=>'SPACING', 'field'=>'spacing', 'align'=>'center'),
							       '11' => array('type'=>'select', 'label'=>'CLASP TYPE', 'field'=>'clasp_type',  'options'=>array('LOBSTER'=>'LOBSTER')),
								   '12' => array('type'=>'select', 'label'=>'CONDITION', 'field'=>'condition', 'options'=>array('New'=>'100% BRAND NEW')),
								   '13' => array('type'=>'text', 'label'=>'RETAIL VALUE', 'field'=>'retail_price', 'align'=>'center'),
								   '14' => array('type'=>'text', 'label'=>'OUR PRICE', 'field'=>'store_price', 'align'=>'center'),
								   '15' => array('type'=>'text', 'label'=>'Item No', 'field'=>'item_number', 'align'=>'center'),
					 '16' => array('type'=>'text', 'label'=>'No of Diamonds', 'field'=>'noofdiamonds', 'align'=>'center'),
					'17' => array('type'=>'text', 'label'=>'Stone Treatment', 'field'=>'StoneTreatment', 'align'=>'center'),
					'18' => array('type'=>'text', 'label'=>'Main Stone', 'field'=>'MainStone', 'align'=>'center'),
					'19' => array('type'=>'text', 'label'=>'Metal Purity', 'field'=>'MetalPurity', 'align'=>'center'),
					'20' => array('type'=>'text', 'label'=>'Total Carat Weight', 'field'=>'total_weight','align'=>'center'),
					'21' => array('type'=>'text', 'label'=>'Style', 'field'=>'Style', 'align'=>'center'),
					'22' => array('type'=>'text', 'label'=>'Certificate', 'field'=>'certificate', 'align'=>'center'),
					'23' => array('type'=>'text', 'label'=>'Exact Total Carat Weight', 'field'=>'exact_total','align'=>'center'),
					'24' => array('type'=>'text', 'label'=>'Main Stone Color', 'field'=>'main_color', 'align'=>'center'),
					'25' => array('type'=>'preselect', 'label'=>'Category', 'field'=>'categoryid', 'align'=>'center'),
					'26' => array('type'=>'text', 'label'=>'Product Name', 'field'=>'product_name', 'align'=>'center'),
					'27' => array('type'=>'textarea', 'label'=>'Product Description', 'field'=>'product_description', 'align'=>'center'),
					'28' => array('type'=>'file', 'label'=>'Small Image ', 'field'=>'thumbnail_pic', 'align'=>'center'),
				    '29' => array('type'=>'file', 'label'=>'Big Image', 'field'=>'main_pic', 'align'=>'center' ),
					'30' => array('type'=>'textarea', 'label'=>'eBay Html', 'field'=>'ebay', 'align'=>'center'),
					
									);
					break;
					
				
				case 'Diamond_Cross' :
					if($categoryarray['category_name']=='White_Gold') {
						$options = array('14KT WG'=>'14K White Gold','18KT WG'=>'18KT White Gold');
					} elseif ($categoryarray['category_name']=='Yellow_Gold') {
						$options = array('14KT YG'=>'14K Yellow Gold','18KT YG'=>'18KT Yellow Gold');
					} else {
						$options = array('14KT WG'=>'14K White Gold','18KT WG'=>'18KT White Gold','14KT YG'=>'14K Yellow Gold','18KT YG'=>'18KT Yellow Gold');				
					}
					$viewField = array('0' => array('type'=>'select', 'label'=>'METAL', 'field'=>'metal', 'options'=>$options),
								   '1' =>  array('type'=>'select', 'label'=>'ITEM INFO', 'field'=>'item_info', 'options'=>array('CERTIFICATE APPRAISAL'=>'CERTIFICATE APPRAISAL')),
								 '2' => array('type'=>'text', 'label'=>'METAL WEIGHT', 'field'=>'metal_weight', 'align'=>'center'),
								   '3' => array('type'=>'select', 'label'=>'DIAMONDS SHAPE', 'field'=>'diamond_shape', 									    'options'=>array('Asscher'=>'Asscher','Cushion'=>'Cushion','Emerald'=>'Emerald','Heart'=>'Heart','Marquise'=>'Marquise','Oval'=>'Oval','Pear'=>'Pear','Princess'=>'Princess','Radiant'=>'Radiant','Round'=>'Round')),
								   '4' => array('type'=>'text', 'label'=>'DIAMONDS WEIGHT', 'field'=>'diamond_weight', 'align'=>'center'),
								   '5' => array('type'=>'text', 'label'=>'CLARITY', 'field'=>'clarity', 'align'=>'center'),
								   '6' => array('type'=>'text', 'label'=>'COLOR', 'field'=>'color', 'align'=>'center'),
								   '7' => array('type'=>'text', 'label'=>'TOTAL DIAMONDS', 'field'=>'total_diamonds', 'align'=>'center'),
								   '8' => array('type'=>'select', 'label'=>'DIAMOND SETTING', 'field'=>'SettingType', 'options'=>array('Channel'=>'Channel','Invisible'=>'Invisible','Prong'=>'Prong')),
								   '9' => array('type'=>'text', 'label'=>'SIZE', 'field'=>'item_size', 'align'=>'center', 'help'=>'X*Y'),	
								   '10' => array('type'=>'text', 'label'=>'WIDTH', 'field'=>'item_width', 'align'=>'center'),
								   '11' => array('type'=>'select', 'label'=>'POLISH', 'field'=>'polish',  'options'=>array('-1'=>'SELECT POLISH','EXCELLENT HIGH POLISH'=>'EXCELLENT HIGH POLISH')),
								   '12' => array('type'=>'text', 'label'=>'CROSS MEASUREMENT', 'field'=>'cross_measurement', 'align'=>'center'),
								   '13' => array('type'=>'text', 'label'=>'DIAMOND MEASUREMENT', 'field'=>'diamond_size', 'align'=>'center'),
								   '14' => array('type'=>'select', 'label'=>'CONDITION', 'field'=>'condition', 'options'=>array('New'=>'100% BRAND NEW')),
					 '15' => array('type'=>'text', 'label'=>'Item No', 'field'=>'item_number', 'align'=>'center'),
					 '16' => array('type'=>'text', 'label'=>'No of Diamonds', 'field'=>'noofdiamonds', 'align'=>'center'),
					'17' => array('type'=>'text', 'label'=>'Stone Treatment', 'field'=>'StoneTreatment', 'align'=>'center'),
					'18' => array('type'=>'text', 'label'=>'Main Stone', 'field'=>'MainStone', 'align'=>'center'),
					'19' => array('type'=>'text', 'label'=>'Metal Purity', 'field'=>'MetalPurity', 'align'=>'center'),
					'20' => array('type'=>'text', 'label'=>'Total Carat Weight', 'field'=>'total_weight','align'=>'center'),
					'21' => array('type'=>'text', 'label'=>'Style', 'field'=>'Style', 'align'=>'center'),
					'22' => array('type'=>'text', 'label'=>'Pendent Style', 'field'=>'pstyle', 'align'=>'center'),
					'23' => array('type'=>'text', 'label'=>'Certificate', 'field'=>'certificate', 'align'=>'center'),
					'24' => array('type'=>'text', 'label'=>'Exact Total Carat Weight', 'field'=>'exact_total','align'=>'center'),
					'25' => array('type'=>'text', 'label'=>'Main Stone Color', 'field'=>'main_color', 'align'=>'center'),
					'26' => array('type'=>'text', 'label'=>'RETAIL VALUE', 'field'=>'retail_price', 'align'=>'center'),
					'27' => array('type'=>'text', 'label'=>'OUR PRICE', 'field'=>'store_price', 'align'=>'center'),
					'28' => array('type'=>'preselect', 'label'=>'Category', 'field'=>'categoryid', 'align'=>'center'),
					'29' => array('type'=>'text', 'label'=>'Product Name', 'field'=>'product_name', 'align'=>'center'),
					'30' => array('type'=>'textarea', 'label'=>'Product Description', 'field'=>'product_description', 'align'=>'center'),
					'31' => array('type'=>'file', 'label'=>'Small Image ', 'field'=>'thumbnail_pic', 'align'=>'center'),
				    '32' => array('type'=>'file', 'label'=>'Big Image', 'field'=>'main_pic', 'align'=>'center' ),
					'33' => array('type'=>'textarea', 'label'=>'eBay Html', 'field'=>'ebay', 'align'=>'center'),
					
									);
					break;

				case 'Clearance_Vault' :
					$viewField = array('0' => array('type'=>'text', 'label'=>'Product Name', 'field'=>'product_name', 'align'=>'center'),
				              '1' => array('type'=>'textarea', 'label'=>'Product Description', 'field'=>'product_description', 'align'=>'center'),
				              '2' => array('type'=>'preselect', 'label'=>'Category', 'field'=>'categoryid', 'align'=>'center'),
				              '3' => array('type'=>'select', 'label'=>'Product Type', 'field'=>'type', 'align'=>'center', 'options'=>array('Ear Rings'=>'Ear Rings', 'Ring'=>'Ring','Pendant'=>'Pendant')),
							  '4' => array('type'=>'price', 'label'=>'Price', 'field'=>'price', 'align'=>'center'),
				              '5' => array('type'=>'file', 'label'=>'Small Image ', 'field'=>'thumbnail_pic', 'align'=>'center'),
				              '6' => array('type'=>'file', 'label'=>'Big Image', 'field'=>'main_pic', 'align'=>'center' ),
							  '7' => array('type'=>'checkbox', 'label'=>'Has Backing', 'field'=>'has_backing', 'align'=>'center'),
				              '8' => array('type'=>'checkbox', 'label'=>'Has Setting', 'field'=>'has_setting', 'align'=>'center'),
				              '9' => array('type'=>'checkbox', 'label'=>'Has Ring Size', 'field'=>'has_ring_setting', 'align'=>'center'),
				              '10' => array('type'=>'checkbox', 'label'=>'Has Necklace', 'field'=>'has_necklace', 'align'=>'center'),
				              	);
					break;
					case 'Black_Diamond_Necklaces' :
					$viewField = array('0' => array('type'=>'text', 'label'=>'Product Name', 'field'=>'product_name', 'align'=>'center'),
				              '1' => array('type'=>'textarea', 'label'=>'Product Description', 'field'=>'product_description', 'align'=>'center'),
				              '2' => array('type'=>'preselect', 'label'=>'Category', 'field'=>'categoryid', 'align'=>'center'),
				              '3' => array('type'=>'price', 'label'=>'Price', 'field'=>'price', 'align'=>'center'),
				              '4' => array('type'=>'file', 'label'=>'Small Image ', 'field'=>'thumbnail_pic', 'align'=>'center'),
				              '5' => array('type'=>'file', 'label'=>'Big Image', 'field'=>'main_pic', 'align'=>'center' ),
							  '6' => array('type'=>'select', 'label'=>'Select Metal', 'field'=>'metal', 'align'=>'center', 'options'=>array('White Gold'=>'White Gold', 'Yellow Gold'=>'Yellow Gold')),
							  '7' => array('type'=>'text', 'label'=>'Total Carat Weight', 'field'=>'total_weight'),
     						  );
					break;
					case 'LADY_DIAMOND_BAND_ETERNITY' :
					$viewField = array('0' => array('type'=>'text', 'label'=>'Item No', 'field'=>'item_number', 'align'=>'center'),
						'1' => array('type'=>'text', 'label'=>'Metal', 'field'=>'metal', 'align'=>'center'),
						'2' => array('type'=>'text', 'label'=>'Waight of Metal', 'field'=>'metal_weight', 'align'=>'center'),
						'3' => array('type'=>'text', 'label'=>'Item Info', 'field'=>'item_info', 'align'=>'center'),
						'4' => array('type'=>'text', 'label'=>'Shape of Diamond', 'field'=>'diamond_shape', 'align'=>'center'),
						'5' => array('type'=>'text', 'label'=>'Waight of diamond', 'field'=>'diamond_weight', 'align'=>'center'),
					    '6' => array('type'=>'text', 'label'=>'Clarity', 'field'=>'clarity', 'align'=>'center'),
						'7' => array('type'=>'text', 'label'=>'Color', 'field'=>'color', 'align'=>'center'),
						'8' => array('type'=>'text', 'label'=>'No of Diamonds', 'field'=>'noofdiamonds', 'align'=>'center'),
						'9' => array('type'=>'text', 'label'=>'Shape of Gem', 'field'=>'ShapeofGem', 'align'=>'center'),
					   '10' => array('type'=>'text', 'label'=>'Waight of Gem', 'field'=>'WaightofGem', 'align'=>'center'),
					   '11' => array('type'=>'text', 'label'=>'No of Gem Stones', 'field'=>'NoofGemStones', 'align'=>'center'),
					   '12' => array('type'=>'text', 'label'=>'Ring Size Available', 'field'=>'RingSizeAvailable', 'align'=>'center'),
					   '13' => array('type'=>'text', 'label'=>'Width of Band', 'field'=>'WidthofBand', 'align'=>'center'),
					   '14' => array('type'=>'text', 'label'=>'Setting Type', 'field'=>'SettingType', 'align'=>'center'),
					   '15' => array('type'=>'text', 'label'=>'Condition', 'field'=>'condition', 'align'=>'center'),
					   '16' => array('type'=>'text', 'label'=>'Estimated Value', 'field'=>'EstimatedValue', 'align'=>'center'),
					   '17' => array('type'=>'text', 'label'=>'Ring Size', 'field'=>'RingSize', 'align'=>'center'),
					   '18' => array('type'=>'text', 'label'=>'Stone Treatment', 'field'=>'StoneTreatment', 'align'=>'center'),
					   '19' => array('type'=>'text', 'label'=>'Main Stone', 'field'=>'MainStone', 'align'=>'center'),
					   '20' => array('type'=>'text', 'label'=>'Jewelry Type', 'field'=>'JewelryType', 'align'=>'center'),
					   '21' => array('type'=>'text', 'label'=>'Gender', 'field'=>'Gender', 'align'=>'center'),
					   '22' => array('type'=>'text', 'label'=>'Style', 'field'=>'Style', 'align'=>'center'),
					   '23' => array('type'=>'text', 'label'=>'Metal Purity', 'field'=>'MetalPurity', 'align'=>'center'),
					   '24' => array('type'=>'text', 'label'=>'Product Name', 'field'=>'product_name', 'align'=>'center'),
				       '25' => array('type'=>'textarea', 'label'=>'Product Description', 'field'=>'product_description', 'align'=>'center'),
				       '26' => array('type'=>'preselect', 'label'=>'Category', 'field'=>'categoryid', 'align'=>'center'),
				       '27' => array('type'=>'price', 'label'=>'Price', 'field'=>'retail_price', 'align'=>'center'),
				       '28' => array('type'=>'file', 'label'=>'Small Image ', 'field'=>'thumbnail_pic', 'align'=>'center'),
				       '29' => array('type'=>'file', 'label'=>'Big Image', 'field'=>'main_pic', 'align'=>'center' ),
					   '30' => array('type'=>'select', 'label'=>'Select Metal', 'field'=>'metal1', 'align'=>'center', 'options'=>array('White Gold'=>'White Gold', 'Yellow Gold'=>'Yellow Gold')),
					   '31' => array('type'=>'text', 'label'=>'Total Carat Weight', 'field'=>'total_weight'),
					  '32' => array('type'=>'text', 'label'=>'OUR PRICE', 'field'=>'store_price', 'align'=>'center'),
					   '33' => array('type'=>'textarea', 'label'=>'eBay Html', 'field'=>'ebay', 'align'=>'center')
     						  );
					break;
					case 'Gemstones' :
					$viewField = array('0' => array('type'=>'text', 'label'=>'Item No', 'field'=>'item_number', 'align'=>'center'),
						'1' => array('type'=>'text', 'label'=>'Metal', 'field'=>'metal', 'align'=>'center'),
						'2' => array('type'=>'text', 'label'=>'Waight of Metal', 'field'=>'metal_weight', 'align'=>'center'),
						'3' => array('type'=>'text', 'label'=>'Item Info', 'field'=>'item_info', 'align'=>'center'),
						'4' => array('type'=>'text', 'label'=>'Shape of Diamond', 'field'=>'diamond_shape', 'align'=>'center'),
						'5' => array('type'=>'text', 'label'=>'Waight of diamond', 'field'=>'diamond_weight', 'align'=>'center'),
					    '6' => array('type'=>'text', 'label'=>'Clarity', 'field'=>'clarity', 'align'=>'center'),
						'7' => array('type'=>'text', 'label'=>'Color', 'field'=>'color', 'align'=>'center'),
						'8' => array('type'=>'text', 'label'=>'No of Diamonds', 'field'=>'noofdiamonds', 'align'=>'center'),
						'9' => array('type'=>'text', 'label'=>'Shape of Rubies', 'field'=>'shapeofrubies', 'align'=>'center'),
					   '10' => array('type'=>'text', 'label'=>'Waight of Sapphires', 'field'=>'Waightofsapphires', 'align'=>'center'),
					   '11' => array('type'=>'text', 'label'=>'No of Sapphires', 'field'=>'Noofsapphires', 'align'=>'center'),
					   '12' => array('type'=>'text', 'label'=>'Ring Size Available', 'field'=>'RingSizeAvailable', 'align'=>'center'),
					   '13' => array('type'=>'text', 'label'=>'Width of Band', 'field'=>'WidthofBand', 'align'=>'center'),
					   '14' => array('type'=>'text', 'label'=>'Setting Type', 'field'=>'SettingType', 'align'=>'center'),
					   '15' => array('type'=>'text', 'label'=>'Condition', 'field'=>'condition', 'align'=>'center'),
					   '16' => array('type'=>'text', 'label'=>'Estimated Value', 'field'=>'EstimatedValue', 'align'=>'center'),
					   '17' => array('type'=>'text', 'label'=>'Ring Size', 'field'=>'RingSize', 'align'=>'center'),
					   '18' => array('type'=>'text', 'label'=>'Stone Treatment', 'field'=>'StoneTreatment', 'align'=>'center'),
					   '19' => array('type'=>'text', 'label'=>'Main Stone', 'field'=>'MainStone', 'align'=>'center'),
					   '20' => array('type'=>'text', 'label'=>'Jewelry Type', 'field'=>'JewelryType', 'align'=>'center'),
					   '21' => array('type'=>'text', 'label'=>'Gender', 'field'=>'Gender', 'align'=>'center'),
					   '22' => array('type'=>'text', 'label'=>'Style', 'field'=>'Style', 'align'=>'center'),
					   '23' => array('type'=>'text', 'label'=>'Metal Purity', 'field'=>'MetalPurity', 'align'=>'center'),
					   '24' => array('type'=>'text', 'label'=>'Product Name', 'field'=>'product_name', 'align'=>'center'),
				       '25' => array('type'=>'textarea', 'label'=>'Product Description', 'field'=>'product_description', 'align'=>'center'),
				       '26' => array('type'=>'preselect', 'label'=>'Category', 'field'=>'categoryid', 'align'=>'center'),
				       '27' => array('type'=>'price', 'label'=>'Price', 'field'=>'retail_price', 'align'=>'center'),
					   '28' => array('type'=>'select', 'label'=>'Select Metal', 'field'=>'metal1', 'align'=>'center', 'options'=>array('White Gold'=>'White Gold', 'Yellow Gold'=>'Yellow Gold')),
					   '29' => array('type'=>'select', 'label'=>'POLISH', 'field'=>'polish',  'options'=>array('-1'=>'SELECT POLISH','EXCELLENT HIGH POLISH'=>'EXCELLENT HIGH POLISH')),
					   '30' => array('type'=>'text', 'label'=>'Certificate', 'field'=>'certificate', 'align'=>'center'),
					   '31' => array('type'=>'text', 'label'=>'Total Carat Weight', 'field'=>'total_weight'),
					   '32' => array('type'=>'file', 'label'=>'Small Image ', 'field'=>'thumbnail_pic', 'align'=>'center'),
				       '33' => array('type'=>'file', 'label'=>'Big Image', 'field'=>'main_pic', 'align'=>'center' ),
					   '34' => array('type'=>'textarea', 'label'=>'eBay Html', 'field'=>'ebay', 'align'=>'center')
     						  );
					break;
					
					case 'Diamond_Pendants' :
					$viewField = array('0' => array('type'=>'text', 'label'=>'Item No', 'field'=>'item_number', 'align'=>'center'),
						'1' => array('type'=>'text', 'label'=>'Metal', 'field'=>'metal', 'align'=>'center'),
						'2' => array('type'=>'text', 'label'=>'Waight of Metal', 'field'=>'metal_weight', 'align'=>'center'),
						'3' => array('type'=>'text', 'label'=>'Item Info', 'field'=>'item_info', 'align'=>'center'),
						'4' => array('type'=>'text', 'label'=>'Shape of Diamond', 'field'=>'diamond_shape', 'align'=>'center'),
						'5' => array('type'=>'text', 'label'=>'Waight of diamond', 'field'=>'diamond_weight', 'align'=>'center'),
					    '6' => array('type'=>'text', 'label'=>'Clarity', 'field'=>'clarity', 'align'=>'center'),
						'7' => array('type'=>'text', 'label'=>'Color', 'field'=>'color', 'align'=>'center'),
						'8' => array('type'=>'text', 'label'=>'No of Diamonds', 'field'=>'noofdiamonds', 'align'=>'center'),
					   '9' => array('type'=>'text', 'label'=>'Waight of Gold', 'field'=>'goldwaight', 'align'=>'center'),
					  '10' => array('type'=>'text', 'label'=>'CROSS MEASUREMENT', 'field'=>'cross_measurement', 'align'=>'center'),
					   '11' => array('type'=>'text', 'label'=>'DIAMOND MEASUREMENT', 'field'=>'diamond_size', 'align'=>'center'),
					   '12' => array('type'=>'text', 'label'=>'Width of Band', 'field'=>'WidthofBand', 'align'=>'center'),
					   '13' => array('type'=>'text', 'label'=>'Setting Type', 'field'=>'SettingType', 'align'=>'center'),
					   '14' => array('type'=>'text', 'label'=>'Condition', 'field'=>'condition', 'align'=>'center'),
					   '15' => array('type'=>'text', 'label'=>'Estimated Value', 'field'=>'EstimatedValue', 'align'=>'center'),
					   '16' => array('type'=>'text', 'label'=>'Ring Size', 'field'=>'RingSize', 'align'=>'center'),
					   '17' => array('type'=>'text', 'label'=>'Stone Treatment', 'field'=>'StoneTreatment', 'align'=>'center'),
					   '18' => array('type'=>'text', 'label'=>'Main Stone', 'field'=>'MainStone', 'align'=>'center'),
					  '19' => array('type'=>'text', 'label'=>'Exact Total Carat Weight', 'field'=>'exact_total','align'=>'center'),
					   '20' => array('type'=>'text', 'label'=>'Jewelry Type', 'field'=>'JewelryType', 'align'=>'center'),
					   '21' => array('type'=>'text', 'label'=>'Gender', 'field'=>'Gender', 'align'=>'center'),
					   '22' => array('type'=>'text', 'label'=>'Style', 'field'=>'Style', 'align'=>'center'),
					   '23' => array('type'=>'text', 'label'=>'Pendent Style', 'field'=>'pstyle', 'align'=>'center'),
					   '24' => array('type'=>'text', 'label'=>'Metal Purity', 'field'=>'MetalPurity', 'align'=>'center'),
					   '25' => array('type'=>'text', 'label'=>'Product Name', 'field'=>'product_name', 'align'=>'center'),
				       '26' => array('type'=>'textarea', 'label'=>'Product Description', 'field'=>'product_description', 'align'=>'center'),
				       '27' => array('type'=>'preselect', 'label'=>'Category', 'field'=>'categoryid', 'align'=>'center'),
				       '28' => array('type'=>'price', 'label'=>'Price', 'field'=>'retail_price', 'align'=>'center'),
				 
					   '29' => array('type'=>'select', 'label'=>'Select Metal', 'field'=>'metal1', 'align'=>'center', 'options'=>array('White Gold'=>'White Gold', 'Yellow Gold'=>'Yellow Gold')),
					   '30' => array('type'=>'select', 'label'=>'POLISH', 'field'=>'polish',  'options'=>array('-1'=>'SELECT POLISH','EXCELLENT HIGH POLISH'=>'EXCELLENT HIGH POLISH')),
					   '31' => array('type'=>'text', 'label'=>'Certificate', 'field'=>'certificate', 'align'=>'center'),
					   '32' => array('type'=>'text', 'label'=>'Total Carat Weight', 'field'=>'total_weight'),
					   '33' => array('type'=>'file', 'label'=>'Small Image ', 'field'=>'thumbnail_pic', 'align'=>'center'),
				       '34' => array('type'=>'file', 'label'=>'Big Image', 'field'=>'main_pic', 'align'=>'center' ),
					   '35' => array('type'=>'textarea', 'label'=>'eBay Html', 'field'=>'ebay', 'align'=>'center')
     						  );
					break;
				default :
					$viewField = array('0' => array('type'=>'text', 'label'=>'Product Name', 'field'=>'Name', 'align'=>'center'),
				              '1' => array('type'=>'textarea', 'label'=>'Product Description', 'field'=>'Description', 'align'=>'center'),
				              '2' => array('type'=>'preselect', 'label'=>'Category', 'field'=>'categoryid', 'align'=>'center'),
				              '3' => array('type'=>'price', 'label'=>'Price', 'field'=>'SalePriceProduct', 'align'=>'center')
				          
									);
				break;
		}

		return $viewField;
 	}

	function getRootParent($categoryarray){
		
		if($categoryarray['parentid'] == 0) {
			return $categoryarray['category_name']; 
		} else {
			//$category_name = $this->getRootParent($categoryarray['parentid']);
			//$section = $category_name; 
		
			$qry = "SELECT * FROM ".config_item('table_perfix')."category 
					WHERE id = '".$categoryarray[parentid]."'  				
					";
			$return = 	$this->db->query($qry);
			$result = $return->result_array();	
			foreach($result as $key=>$value) {
				if($value['parentid'] == 0) {
					return $value['category_name'];
				} else {
					getRootParent($value);
				}
			}

		}
 	}

 	function getAllByCollectionName($collectionname){
 		$qry = "SELECT * FROM ".config_item('table_perfix')."rolex 
 				WHERE collection = '".$collectionname."'  				
				";
		$return = 	$this->db->query($qry);
		$result = $return->result_array();	
		return isset($result) ? $result : false;
 	}
 	
 	function getAllByStock($stockno){
 		$qry = "SELECT * FROM ".config_item('table_perfix')."new_product 
 				WHERE id = '".$stockno."'  				
				";
		$return = 	$this->db->query($qry);
		$result = $return->result_array();	
		return isset($result[0]) ? $result[0] : false;
 	}
	
	function getAllByStock1($stockno){
 		$qry = "SELECT * FROM products 
 				WHERE ProductID = '".$stockno."'  				
				";
		$return = 	$this->db->query($qry);
		$result = $return->result_array();	
		return isset($result[0]) ? $result[0] : false;
 	}
 	
	function getProductShape($shapecode){

			switch($shapecode) {	
				case 'B' :
					$shape = 'Round';
					break;
				case 'PR' :
					$shape = 'Princess';
					break;
				case 'R' :

					$shape = 'Radiant';
					break;
				case 'E' :
					$shape = 'Emerald';
					break;
				case 'AS' :
					$shape = 'Ascher';
					break;
				case 'O' :
					$shape = 'Oval';
					break;
				case 'M' :
					$shape = 'Marquise';
					break;
				case 'P' :
					$shape = 'Pear shape';
					break;
				case 'H' :
					$shape = 'Heart';
					break;
				case 'C' :
					$shape = 'Cushion';
					break;
				default :
					$shape = $shapecode;
					break;
		}
		return $shape;
	}

	function getHeaderButton($categoryarray){
		
		$category_name = $this->getRootParent($categoryarray);
		$section = $category_name; 
						 
 		switch($section){
			case 'Loose_Diamonds' :
				$headerRow = "";
				break;
			case 'Featured_Collection' :
			case 'Clearance_Vault' :	
				$headerRow = "{name: 'Delete', bclass: 'delete', onpress : test},
					{separator: true}";
				break;
			default :
				$headerRow = "{name: 'Add', bclass: 'add', onpress : test},
					{name: 'Delete', bclass: 'delete', onpress : test},
					{separator: true}";
				break;

		}

		return $headerRow;
	}
}

?>
<?php

///// get fancy color nanme vlaue
//B-blue
//BK-black
//BN-blue
//CHAMELEON-same
//CHAMPAGNE-cm
//CM-CHAMPAGNE
//G-green
//GY-gray
//O-orange
//P-pink
//PL-purple
//R-red
//Y-yellow

function setImplodValue($field='') 
    {
        $returnValue = '';
        if( !empty($field) ) {
            $returnValue = implode("','", $field);
        }
        return $returnValue;
    }

    function ckempty($field='', $val='NA') {
        $value = ( !empty($field) ? $field : $val );
        return $value;
    }

//// add tab in string    
function addTabToAray($datar=array()) {
   $datalist = implode("_arcols_", $datar);
   $datalist1 = str_replace("_arcols_", "\t", $datalist);
   
   return $datalist1."\r\n";
}
    ////////////// download the amazon text file
    function downloadAmazonPlainTextFile() {

    // output headers so that the file is downloaded rather than displayed
    //header('Content-Type: text/html');
    //header('Content-Disposition: attachment; filename='.$fileName);

    // create a file pointer connected to the output stream

    //$handle = fopen($fileName, "a") or die("Unable to open file!");
    
    $fileDataHeader = 'TemplateType=jewelry	Version=2015.1203	The top 3 rows are for Amazon.com use only. Do not modify or delete the top 3 rows.									Offer-These attributes are required to make your item buyable for customers on the site																		Dimensions-These attributes specify the size and weight of a product									Discovery-These attributes have an effect on how customers can find your product on the site using browse or search																				Images-These attributes provide links to images for a product					Fulfillment-Use these columns to provide fulfillment-related information for either Amazon-fulfilled (FBA) or seller-fulfilled orders.							Variation-Populate these attributes if your product is available in different variations (for example color or wattage)				Compliance-Attributes used to comply with consumer laws in the country or region where the item is sold							Ungrouped - These attributes create rich product listings for your buyers.																																																		
'."\r\n".'Seller SKU	Title	Manufacturer	Model Number	Product Type	Item Type Keyword	Brand Name	Update Delete	Product ID	Product ID Type	Product Description	Standard Price	Quantity	Launch Date	Product Tax Code	Manufacturer\'s Suggested Retail Price	Sale Price	Sale Start Date	Sale End Date	Release Date	Package Quantity	Fulfillment Latency	Restock Date	Max Aggregate Ship Quantity	Offering Can Be Gift Messaged	Is Gift Wrap Available	Is Discontinued by Manufacturer	Registered Parameter	Shipping-Template	Shipping Weight	Website Shipping Weight Unit Of Measure	Display Dimensions Unit Of Measure	Width	Item Display Length	Item Length	Item Width	Item Height	Item Dimensions Unit Of Measure	Key Product Features	Key Product Features	Key Product Features	Key Product Features	Key Product Features	Target Audience	Target Audience	Target Audience	Catalog Number	Intended Use	Intended Use	Intended Use	Intended Use	Intended Use	Subject Matter	Subject Matter	Subject Matter	Subject Matter	Subject Matter	Search Terms	Main Image URL	Swatch Image URL	Other Image URL	Other Image URL	Other Image URL	Fulfillment Center ID	Package Width	Package Weight Unit Of Measure	Package Weight	Package Length	Package Height	Package Dimensions Unit Of Measure	Parentage	Parent SKU	Relationship Type	Variation Theme	Country of Publication	Consumer Notice	Cpsia Warning	Cpsia Warning	Cpsia Warning	Cpsia Warning	CPSIA Warning Description	Gender	Other Attributes	Other Attributes	Other Attributes	Other Attributes	Other Attributes	Total Diamond Weight	Total Diamond Weight Unit Of Measure	Total Gem Weight	Total Gem Weight Unit Of Measure	Material Type	Metal Type	Metal Stamp	Setting Type	Number Of Stones	Clasp Type	Chain Type	Ring Size	Ring Sizing Lower Range	Ring Sizing Upper Range	Back Finding	Gem Type	Gem Type	Gem Type	Stone Cut	Stone Color	Stone Color	Stone Clarity	Stone Clarity	Stone Shape	Stone Shape	Stone Creation Method	Stone Creation Method	Stone Treatment Method	Stone Treatment Method	Stone Weight	Stone Weight	Pearl Type	Pearl Minimum Color	Pearl Lustre	Pearl Shape	Pearl Uniformity	Pearl Surface Blemishes	Pearl Stringing Method	Size Per Pearl	Number Of Pearls	Style	Color	Total Metal Weight	Total Metal Weight Unit Of Measure	Certificate Type
item_sku	item_name	manufacturer	model	feed_product_type	item_type	brand_name	update_delete	external_product_id	external_product_id_type	product_description	standard_price	quantity	product_site_launch_date	product_tax_code	list_price	sale_price	sale_from_date	sale_end_date	merchant_release_date	item_package_quantity	fulfillment_latency	restock_date	max_aggregate_ship_quantity	offering_can_be_gift_messaged	offering_can_be_giftwrapped	is_discontinued_by_manufacturer	missing_keyset_reason	merchant_shipping_group_name	website_shipping_weight	website_shipping_weight_unit_of_measure	display_dimensions_unit_of_measure	item_display_width	item_display_length	item_length	item_width	item_height	item_dimensions_unit_of_measure	bullet_point1	bullet_point2	bullet_point3	bullet_point4	bullet_point5	target_audience_keywords1	target_audience_keywords2	target_audience_keywords3	catalog_number	specific_uses_keywords1	specific_uses_keywords2	specific_uses_keywords3	specific_uses_keywords4	specific_uses_keywords5	thesaurus_subject_keywords1	thesaurus_subject_keywords2	thesaurus_subject_keywords3	thesaurus_subject_keywords4	thesaurus_subject_keywords5	generic_keywords	main_image_url	swatch_image_url	other_image_url1	other_image_url2	other_image_url3	fulfillment_center_id	package_width	package_weight_unit_of_measure	package_weight	package_length	package_height	package_dimensions_unit_of_measure	parent_child	parent_sku	relationship_type	variation_theme	country_of_origin	prop_65	cpsia_cautionary_statement1	cpsia_cautionary_statement2	cpsia_cautionary_statement3	cpsia_cautionary_statement4	cpsia_cautionary_description	department_name	thesaurus_attribute_keywords1	thesaurus_attribute_keywords2	thesaurus_attribute_keywords3	thesaurus_attribute_keywords4	thesaurus_attribute_keywords5	total_diamond_weight	total_diamond_weight_unit_of_measure	total_gem_weight	total_gem_weight_unit_of_measure	material_type	metal_type	metal_stamp	setting_type	number_of_stones	clasp_type	chain_type	ring_size	ring_sizing_lower_range	ring_sizing_upper_range	back_finding	gem_type1	gem_type2	gem_type3	stone_cut	stone_color1	stone_color2	stone_clarity1	stone_clarity2	stone_shape1	stone_shape2	stone_creation_method1	stone_creation_method2	stone_treatment_method1	stone_treatment_method2	stone_weight1	stone_weight2	pearl_type	pearl_minimum_color	pearl_lustre	pearl_shape	pearl_uniformity	pearl_surface_blemishes	pearl_stringing_method	size_per_pearl	number_of_pearls	style_name	color_name	total_metal_weight	total_metal_weight_unit_of_measure	certificate_type'."\r\n";
    
    return $fileDataHeader;
    
    //fwrite($handle, $fileDataHeader);
    
//    $row['id'] = '123456';
//    $row['name'] = 'Full name';
//    $row['adress'] = '';
//    $row['contact'] = '0123456789';
    
//    foreach($datar as $rowdata) {
//    
//        $dataString = implode(",", $rowdata);
//        $data_strings = str_replace(",", "\t", $dataString);
//
//
//        fwrite($handle, $data_strings."\r\n");
//    
//    }
//    
//    fclose($handle);
//    
//    header('Content-Type: application/octet-stream');
//    header('Content-Disposition: attachment; filename='.basename($fileName));
//    header('Expires: 0');
//    header('Cache-Control: must-revalidate');
//    header('Pragma: public');
//    header('Content-Length: ' . filesize($fileName));
//    readfile($fileName);
//    
//    unlink($fileName); // text file be deleted after download the text file
//    //return true;
//    
//    exit;
    
    }
    
    ///// show image according to the value
    function showDiamondShape($imgvalue='', $delink='') {
        $delete_link = ( !empty($delink) ? '<br><a href="'.$delink.'">Delete</a>' : '' );
        $img_value = ( !empty($imgvalue) ? '<img src="'.$imgvalue.'" width="80" />'.$delete_link : '' );
        return $img_value;
    }
    
    ///// get sym
    function getSym($symt) {
        switch ($symt) {
            case 'VG':
                $sym = 'Very Good';
                break;
            case 'GD':
                $sym = 'Good';
                break;
            case 'EX':
                $sym = 'Excellent';
                break;
            case 'ID':
                $sym = 'Ideal';
                break;
            case 'P':
                $sym = 'Premium';
                break;
            default:
                $sym = $symt;
                break;
        }
        return $sym;
    }
    //// get polish
    function getPolish($polishv='') {
        switch ($polishv) {
            case 'VG':
                $polish = 'Very Good';
                break;
            case 'GD':
                $polish = 'Good';
                break;
            case 'EX':
                $polish = 'Excellent';
                break;
            case 'ID':
                $polish = 'Ideal';
                break;
            default:
                $polish = $polishv;
                break;
        }
        return $polish;
    }
    ///// get color
    function getColor($colrs) {
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
    //// get carat
    function getCarat($carats) {
        if ($carats <= '0.29') {
            $caratRange = ' 0.29 &amp; Under';
        }
        if ($carats >= '0.30' && $carats <= '0.45') {
            $caratRange = ' 0.30 - 0.45';
        }
        if ($carats >= '0.46' && $carats <= '0.69') {
            $caratRange = ' 0.46 - 0.69';
        }
        if ($carats >= '0.70' && $carats <= '0.89') {
            $caratRange = ' 0.70 - 0.89';
        }
        if ($carats >= '0.90' && $carats <= '1.39') {
            $caratRange = ' 0.90 - 1.39';
        }
        if ($carats >= '1.40' && $carats <= '1.79') {
            $caratRange = ' 1.40 - 1.79';
        }
        if ($carats >= '1.80' && $carats <= '2.79') {
            $caratRange = ' 1.80 - 2.79';
        }
        if ($carats >= '2.80') {
            $caratRange = ' 2.80 &amp; Larger';
        }
        return $caratRange;
    }
    
    //// get the full diamond cut values
    function cutsValue($cuts='') {
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
    
    function ckDiscount($field=array()) {
        $value = array_filter($field);
        return ( !empty($value) ? $value : '' );
    }
    
    function setSelected($val1, $val2) {
        return ( $val1 == $val2 ? 'selected' : '' );
    }
    
    function arOptSelected($val1, $val2) {
        return ( in_array($val1, $val2) ? 'selected' : '' );
    }
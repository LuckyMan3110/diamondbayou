<?php

function itemJewelerySpecList($results=array()) {
    $specList = array(
            'Brand' => $results['brand'],
            'Certification' => $results['certification'],
            'Clarity' => $results['clarity'],
            'Condition' => $results['condition'],
            'Country' => $results['country'],
            'Diameter' => $results['diameter'],
            'Diamond Color' => $results['diamond_color'],
            'Fancy Diamond Color' => $results['fancy_diamond_color'],
            'Fastening' => $results['fastening'],
            'Gender' => $results['gender'],
            'Main Stone' => $results['main_stone'],
            'Main Stone Color' => $results['main_stone_color'],
            'Main Stone Creation' => $results['main_stone_creation'],
            'Main Stone Shape' => $results['main_stone_shape'],
            'Main Stone Treatment' => $results['main_stone_treatment'],
            'Metal' => $results['metal'],
            'Metal Purity' => $results['metal_purity'],
            'Natural Lab Created' => $results['natural_lab_created'],
            'Ring Size' => $results['ring_size'],
            'Sizable' => $results['sizable'],
            'Style' => $results['style'],
            'Total Carat Weight' => $results['total_carat_weight']
        );
    
    return $specList;
}

function get_item_total_carat($item_id=0) {
    $CI = & get_instance();
    $CI->load->model( 'itemjewelrymodel' );
    
    $rowsring = $CI->itemjewelrymodel->getItemDetailViaID($item_id); //print_ar($rowsring);
    $total_carat = get_global_field_value($rowsring['global_fields'], 'CARAT', 'sum_carat');
    
    return $total_carat;
}

    function get_diamond_detail_row($item_id=0, $diamond_id='') {
        $CI = & get_instance();
        $CI->load->model( 'itemjewelrymodel' );
        $details = $CI->itemjewelrymodel->getItemSpecification($item_id, 'dev_ebay_details');
        $diamond_lot_id = check_empty( $diamond_id, $details['diamond_lot_id'] );
        $diamond_row = $CI->itemjewelrymodel->getIndexDiamondDetail($diamond_lot_id, 'lot');
        
        return $diamond_row;
    }

    function set_ring_diamond_price($results=[], $diamond_id='', $price_field='g14_whsale_price') {
        $diamond_row = get_diamond_detail_row($results['pid'], $diamond_id); //// same file
        $ebay_price = $diamond_row['price'] * 1.10;
        $item_price = $results[$price_field] + $ebay_price;
        
        return $item_price;
    }
    
function itemJeweleryDetailsList($results=array(), $our_price=0, $new_price=0, $total_carat='') {
    
    $item_id = check_empty($results['random_item_id'], $results['item_id']);
    $diamond_row = get_diamond_detail_row($results['pid']); //// same file
    $ebay_price = $diamond_row['price'] * 1.10;
    $item_price = $ebay_price + $our_price;     
    $newPrice = $item_price * 1.7; //( $new_price > 0 ? $new_price : $our_price );
    if( !empty($total_carat) ) {
        $new_total_carat = $results['total_carat_weight'];
    } else {
        $new_total_carat = $results['new_center_carat'] + $results['semi_mount_weight'];
    }    
    
    //$total_carat = get_item_total_carat($results['pid']);
    
    $detail_list = array(
            'Metal' => 'Platinum',
            'Gram' => $results['mplat_gr'],
            'Mounting Metal Type' => $results['mounting_metal_type'],
            'Diamond Weight' => $results['diamond_weight'],
            'Total Carat' => $new_total_carat,
            'Clarity' => $results['clarity'],
            'Color' => $results['color'],
            'Set Type' => $results['set_type'],
            'Certificate #' => $results['certificate'],
            'New Certificate #' => $results['index_diamond_cert'],
            'Band Fit' => $results['band_fit'],
            'Band Width' => $results['band_width'],
            'Diameter' => $results['diameter'],
            'Lock' => $results['lock'],
            'Material' => $results['material'],
            'Metal Finish' => $results['metal_finish'],
            'Metal Type' => 'Platinum',
            'TOTAL-DIAM-PCS' => $results['total_diam_pcs'],
            'Appraisal Value' => $results['appraisal_value'],
            'Our Price' => '$'._nf($item_price, 2),
            'Retail Price' => '$'._nf($newPrice, 2),
        );
    
    return $detail_list;
}

    function getEbayItemDetailsRow($item_id=0) {
        $CI = & get_instance();
        $CI->load->model( 'itemjewelrymodel' );
        $details = $CI->itemjewelrymodel->getItemSpecification($item_id, 'dev_ebay_details');
        
        return $details;
    }

function item_jew_title($results=[], $total_carat=0, $market='Heartsanddiamonds.com', $metal_name='Platinum', $diamond_id='') {
    //$diamond_carat = check_empty($results['total_carat_weight'], $results['center_carat']);
    //$center_stone_shape = $results['center_stone_shape'];
    $itemDetails = getEbayItemDetailsRow( $results['id'] ); // same file
    //$item_total_carat = $itemDetails['new_center_carat'] + $itemDetails['side_carat'];
    $diamond_detail = get_diamond_detail_row($results['pid'], $diamond_id); //print_ar($results);
    if( !empty($diamond_id) ) {
        $item_total_carat = $diamond_detail['carat'] + $results['semi_mount_weight'];
    } else {
        $item_total_carat = $results['new_center_carat'] + $results['semi_mount_weight'];
    }
    
    $final_total_carat = ( $total_carat > 0 ? $total_carat : $item_total_carat );
    
    $other_fields = heart_items_other_fields($results['global_fields']);
    $check_cate = strchr($results['category'], 'Band');
    
    if( !empty($check_cate) ) {
        $title_cate = 'Wedding ' . $results['category'];
    } else {
        $title_cate = ( $results['category'] == 'Ring' ? 'Engagement ' . $results['category'] : $results['category'] );
    }
    
    $item_clarity = set_color_clarity($other_fields['clarity'], $other_fields['clarity_to'], 'Clarity');
    $item_color = set_color_clarity($other_fields['color'], $other_fields['color_to'], 'Color');
    
    if( !empty($diamond_detail['lot']) && $results['category'] != 'Band' ) {
        $diamond_shape = view_shape_value( $d_img, $diamond_detail['shape'] ); /// custome helper
        $diamond_cert = $diamond_detail['Cert_n'] . ' by ' . $diamond_detail['Cert'];
        $ring_fancy_color = check_empty($diamond_detail['fcolor_value'], $diamond_detail['color']);
        $color_clarity = $ring_fancy_color . ' Color ' . $diamond_detail['clarity'] . ' Clarity ';
        
        $item_title = $market. ' ' . _nf($item_total_carat, 2) . ' carat '.$metal_name.' '.$color_clarity.$diamond_shape.' '.$diamond_cert . ' ' .$other_fields['type'].' ' . $title_cate;
    } else {
        if( $results['category'] == 'Band' ) {
            $item_title = $market. ' ' . $metal_name . ' ' .$other_fields['shape'].' ' . $other_fields['type'].' ' . $title_cate;
        } else {
            $item_title = $market. ' ' . $metal_name . ' ' .$other_fields['shape'].' '.$item_clarity . $item_color . $other_fields['type'].' ' . $title_cate;
        }        
    }
    
    return $item_title;
}

    function set_color_clarity($field1='', $field2='', $type='') {
        $item_field = '';
    
        if( !empty($field2) ) {
            $item_field = $field1 . ' - ' . $field2;
        } else {
            if( !empty($field1) ) {
                $item_field = $field1 . ' - ' . $field1;
            }        
        }
        $view_field = '';
        
        if( !empty($item_field) ) {
            $view_field = $item_field . ' ' . $type . ' ';
        }
        return $view_field;
    }

    function heart_items_other_fields($global_fields='') {
    
        $return['type'] = get_global_field_value($global_fields, 'TYPE');
        $return['shape'] = get_global_field_value($global_fields, 'SHAPE');
        $return['clarity'] = get_global_field_value($global_fields, 'CLARITY');
        $return['clarity_to'] = get_global_field_value($global_fields, 'CLARITYTO');
        $return['color'] = get_global_field_value($global_fields, 'COLOR');
        $return['color_to'] = get_global_field_value($global_fields, 'COLORTO');
        
        return $return;
    }
    
    function get_global_field_value($globalFields='', $field_label='SHAPE', $sum_carat='') {
        if( $field_label == 'CARAT' ) {
            $field_value = 0;
        } else {
            $field_value = '';
        }        
        
        if( !empty($globalFields) ) {
            $results = unserialize($globalFields);
            foreach( $results as $cols_value ) {
                $check_field = strchr($cols_value[0], $field_label);
                
                if( !empty($check_field) && !empty($cols_value[1]) ) {
                    if( empty($sum_carat) ) {
                        $field_value = $cols_value[1];
                        break;
                    } else {
                        $field_value = $field_value + $cols_value[1];
                    }
                    
                }
            }
        }
        
        if( $field_label == 'CARAT' ) {
            if( $field_value > 0 ) {
                return $field_value;
            } else {
                return '';
            }
        } else {
            return $field_value;
        }        
    }

    function item_cate_shape_value($global_fields='') {
        $item_shape = get_global_field_value($global_fields, 'SHAPE'); // same file
        $items_shape = '';
        
        if( !empty($item_shape) ) {
            $items_shape = ucwords( strtolower($item_shape) ) . ' Rings';
        }
        return $items_shape;
    }
    
function setArrayImplodeStrin($field='', $ck='') 
    {
        $returnValue = '';
        if( !empty($field) ) {
            if( empty($ck) ) {
                $returnValue = implode("','", $field);
            } else {
                $returnValue = "'".implode("','", $field)."'";
            }
        }
        return $returnValue;
    }
    
    function getMarketMoreImgView($imgField='') {
        $image_view = '';
        
        if( !empty($imgField) ) {
            $image_view = '<img src="'.$imgField.'" width="80" />';
        }
        
        return $image_view;
    }
    
    function getMarketMoreImgListView($item_id=0, $type='ebay') {
        $CI = & get_instance();
        /* $CI->load->model( 'itemjewelrymodel' );
        $results = $CI->itemjewelrymodel->getMoreItemImgList($item_id); */
		$CI->load->model('hderingitemsmodel');
		$results = $CI->hderingitemsmodel->getMoreItemImgList($item_id);
        $img_src_link = array();
        
        for( $i=1; $i <= 6; $i++ ) {
            $field_title = ( $type === 'ebay' ? 'ebay_img' : 'amazon_img' );
            $img_field_value = $results[$field_title.$i];
            
            if( !empty($img_field_value) ) {
                $img_src_link[] = $img_field_value;
            }
        }
        return $img_src_link;
    }
    
    function item_section_img_src($itemID=0, $type='') {
        
        $img_list = getMarketMoreImgListView($itemID, $type);  /// same file
        $other_img_list = getItemMoreImagesList($itemID); /// same file
        
        if( count($other_img_list) > 0 ) {
            $total_img_list = array_merge($img_list, $other_img_list);
        } else {
            $total_img_list = $img_list;
        }
        
        return $total_img_list;
    }
    
    //// collection item img
    function getItemMoreImagesList($item_id=0) {
        $CI = & get_instance();
        $CI->load->model( 'itemjewelrymodel' );
        
        $results = $CI->itemjewelrymodel->get_item_imgs( $item_id );
        
        $item_image = array();
        
        if( count($results) > 0 ) {
            foreach( $results as $rows ) {
                $img_link_hd = SITE_URL . $rows['image'];
                $img_link = HEART_LINK . $rows['image'];
                $erphd_img_link = ERPHD_LINK . $rows['image'];
                
                if( getimagesize($img_link_hd) ) 
                    {
                        $item_image[] = $img_link_hd;
                    } 
                    else if( getimagesize($img_link) ) 
                    {
                        $item_image[] = $img_link;
                    } 
                    else if( getimagesize($erphd_img_link) ) 
                    {
                        $item_image[] = $erphd_img_link;
                    } 
                    else 
                    {
                        $item_image[] = '';
                        break;
                    }
                }
        } else {
            $item_image[] = '';
        }
        
        return $item_image;
    }
    
    function getGlobalFieldsValue($globalField='', $field_label='S-SHAPE') {
        $item_shape = '';
        
        if( !empty($globalField) ) {
            $str = unserialize($globalField);
            foreach($str as $rows) {
                $check_shape = strchr($rows[0], $field_label);

                if( !empty($check_shape) ) {
                   $item_shape = $rows[1]; 
                   break;   
                 }
              }
        }
        
        
        return $item_shape;
    }
    
    /// set ebay store id and primary category id according to the item category
    function set_ebay_category_id($category_name='Band') {
        switch ($category_name) {
            case 'Band':
            case 'Band Eternity':
                $store_cate_id   = '19670148017';
                $primary_cate_id = '92853';
                break;
            case 'Earrings':
                $store_cate_id   = '19670144017';
                $primary_cate_id = '10986';
                break;
            case 'Bracelets':
                $store_cate_id   = '19670147017';
                $primary_cate_id = '10976';
                break;
            case 'Pendant':
            case 'Cross Pendant':
                $store_cate_id   = '19670146017';
                $primary_cate_id = '164331';
                break;
            case 'Round Rings':
                //$store_cate_id   = '19670100017';
                $store_cate_id   = '19670105017';
                $primary_cate_id = '164306';
                break;
            case 'Princess Rings':
                $store_cate_id   = '19670106017';
                $primary_cate_id = '164306';
                break;
            case 'Cushion Rings':
                $store_cate_id   = '19670107017';
                $primary_cate_id = '164306';
                break;
            case 'Pear Rings':
                $store_cate_id   = '19670109017';
                $primary_cate_id = '164306';
                break;
            case 'Radiant Rings':
                $store_cate_id   = '19670111017';
                $primary_cate_id = '164306';
                break;
            case 'Oval Rings':
                $store_cate_id   = '19670112017';
                $primary_cate_id = '164306';
                break;
            case 'Marquise Rings':
                $store_cate_id   = '19670113017';
                $primary_cate_id = '164306';
                break;
            default:
                $store_cate_id   = '19670148017';
                $primary_cate_id = '92853';
                break;
        }
        
        $returns['store_cate_id']   = $store_cate_id;
        $returns['primary_cate_id'] = $primary_cate_id;
        
        return $returns;
    }
    
    function getEbayRingItemCertVerifiyLink($labels='', $oldCertNo='', $newCertNo='') {
        $certstr = explode(' ', $newCertNo);
        
        if( !empty($newCertNo) && !empty($certstr[0]) ) {
            $cert_string = $newCertNo;
        } else {
            $cert_string = $oldCertNo;
        }

        $cert_nostr = explode(' ', $cert_string);

        if( $cert_nostr[2] === 'GIA' ) {
            $view_certlink = '<a href="https://www.gia.edu/report-check?reportno='.$cert_nostr[0].'" target="_blank"><b>Click here to View Certificate</b></a>';
        } else if( $cert_nostr[2] === 'EGL' ) {
            if( empty($cert_nostr[3]) || $cert_nostr[3] === 'USA' ) {
                $view_certlink = '<a href="http://www.eglusa.com/verify-a-report-results/?st_num='.$cert_nostr[0].'" target="_blank">'
                        . '<b>Click here to View Certificate</b></a>';
            } else {
                $view_certlink = '<b>Call '.CONTACT_NO.' for More Details</b>';
            }
        } else {
            $view_certlink = '<b>Call '.CONTACT_NO.' for More Details</b>';
        }
        
        if( $labels === 'New Certificate #' ) {
            $verifyCertLink = ' '.$view_certlink;
        } else {
            $verifyCertLink = '';
        }
        
        return $verifyCertLink;
    }
    
    //// items listings details excel collmns lists
    function global_fields_colmns_list() {
        $fields_list = array(
            'CO' => 'S-TYPE1',
            'CP' => 'S-CENTER1',
            'CQ' => 'S-DESCRIPTION1',
            'CR' => 'S-SHAPE1',
            'CS' => 'S-SIZE1',
            'CT' => 'S-COLOR1',
            'CU' => 'S-COLORTO1',
            'CV' => 'S-CLARITY1',
            'CW' => 'S-CLARITYTO1',
            'CX' => 'S-PIECES1',
            'CY' => 'S-CARAT1',
            'CO' => 'S-TYPE2',
            'CP' => 'S-CENTER2',
            'CQ' => 'S-DESCRIPTION2',
            'CR' => 'S-SHAPE2',
            'CS' => 'S-SIZE2',
            'CT' => 'S-COLOR2',
            'CU' => 'S-COLORTO2',
            'CV' => 'S-CLARITY2',
            'CW' => 'S-CLARITYTO2',
            'CX' => 'S-PIECES2',
            'CY' => 'S-CARAT2',
            'CZ' => 'S-TYPE3',
            'DA' => 'S-CENTER3',
            'DB' => 'S-DESCRIPTION3',
            'DC' => 'S-SHAPE3',
            'DD' => 'S-SIZE3',
            'DE' => 'S-COLOR3',
            'DF' => 'S-COLORTO3',
            'DG' => 'S-CLARITY3',
            'DH' => 'S-CLARITYTO3',
            'DI' => 'S-PIECES3',
            'DJ' => 'S-CARAT3',
            'DK' => 'S-TYPE4',
            'DL' => 'S-CENTER4',
            'DM' => 'S-DESCRIPTION4',
            'DN' => 'S-SHAPE4',
            'DO' => 'S-SIZE4',
            'DP' => 'S-COLOR4',
            'DQ' => 'S-COLORTO4',
            'DR' => 'S-CLARITY4',
            'DS' => 'S-CLARITYTO4',
            'DT' => 'S-PIECES4',
            'DU' => 'S-CARAT4',
            'DV' => 'S-TYPE5',
            'DW' => 'S-CENTER5',
            'DX' => 'S-DESCRIPTION5',
            'DZ' => 'S-SHAPE5',
            'EA' => 'S-SIZE5',
            'EB' => 'S-COLOR5',
            'EC' => 'S-COLORTO5',
            'ED' => 'S-CLARITY5',
            'EE' => 'S-CLARITYTO5',
            'EF' => 'S-PIECES5',
            'EG' => 'S-CARAT5',
            'EH' => 'S-TYPE6',
            'EI' => 'S-CENTER6',
            'EJ' => 'S-DESCRIPTION6',
            'EK' => 'S-SHAPE6',
            'EL' => 'S-SIZE6',
            'EM' => 'S-COLOR6',
            'EN' => 'S-COLORTO6',
            'EO' => 'S-CLARITY6',
            'EP' => 'S-CLARITYTO6',
            'EQ' => 'S-PIECES6',
            'ER' => 'S-CARAT6',
            'ES' => 'S-TYPE7',
            'ET' => 'S-CENTER7',
            'EU' => 'S-DESCRIPTION7',
            'EV' => 'S-SHAPE7',
            'EW' => 'S-SIZE7',
            'EX' => 'S-COLOR7',
            'EY' => 'S-COLORTO7',
            'EZ' => 'S-CLARITY7',
            'FA' => 'S-CLARITYTO7',
            'FB' => 'S-PIECES7',
            'FC' => 'S-CARAT7',
            'FD' => 'S-TYPE8',
            'FE' => 'S-CENTER8',
            'FF' => 'S-DESCRIPTION8',
            'FG' => 'S-SHAPE8',
            'FH' => 'S-SIZE8',
            'FI' => 'S-COLOR8',
            'FJ' => 'S-COLORTO8',
            'FK' => 'S-CLARITY8',
            'FL' => 'S-CLARITYTO8',
            'FM' => 'S-PIECES8',
            'FN' => 'S-CARAT8',
            'FO' => 'L-DESCRIPTION1',
            'FP' => 'L-PIECES1',
            'FQ' => 'L-DESCRIPTION2',
            'FR' => 'L-PIECES2',
            'FS' => 'L-DESCRIPTION3',
            'FT' => 'L-PIECES3',
            'FU' => 'L-DESCRIPTION4',
            'FV' => 'L-PIECES4',
            'FW' => 'L-DESCRIPTION5',
            'FX' => 'L-PIECES5',
            'FY' => 'Item Title',
            'FZ' => 'Item Description'
        );
        
        return $fields_list;
    }
    
    function set_carat_value($carats=0) {
        $str1 = explode('.', $carats);
        
        if(empty($str1[0]) ) {
            $carat_value = '0.' . $str1[1];
          } else {
            $carat_value = $str1[0] . '.' . $str1[1];
          }
          
          return $carat_value;
    }
    
    /*
     * ThumbnailUrl : small img size
     * FullUrl : medimum img size
     * ZoomUrl : large img size
     */
    
    //// get stuller fashion jewelry img links
    function stuller_fashionjew_imgs($imgString='', $rowCols='ThumbnailUrl', $view_type='') {
        $img_links = array();
        if( !empty($imgString) ) {
            $img_string = json_decode($imgString, TRUE);  /// second parameter true set string from object to array
            
            foreach( $img_string as $rows ) {
                $img_links[] = $rows[$rowCols];
            }
        } else {
            if( empty($view_type) ) {
                $img_links[] = SITE_URL . 'images/cert/12_541_no_image_thumb.gif';
            }            
        }
        
        return $img_links;
    }
    
    function stuller_imglinks_list($rowsring=[], $view_type='FullUrl') {
        $imgs_rows1 = stuller_fashionjew_imgs($rowsring['Images'], $view_type); /// item jewelry section helper
        $imgs_rows2 = stuller_fashionjew_imgs($rowsring['GroupImages'], $view_type, 'empty'); /// item jewelry section helper
        $imgs_rows = array_merge($imgs_rows1, $imgs_rows2);
        
        return $imgs_rows;
    }
    
    function stuller_fashion_jewelry_fields($rows=[]) {
        $fileds_list = array(
            'Sku' => $rows['Sku'],
            'Description' => $rows['Description'],
            'Short Description' => $rows['ShortDescription'],
            'Group Description' => $rows['GroupDescription'],
            'MerchandisingCategory1' => $rows['MerchandisingCategory1'],
            'MerchandisingCategory2' => $rows['MerchandisingCategory2'],
            'MerchandisingCategory3' => $rows['MerchandisingCategory3'],
            'MerchandisingCategory4' => $rows['MerchandisingCategory4'],
            'MerchandisingCategory5' => $rows['MerchandisingCategory5'],
            'Web Categories' => $rows['WebCategories'],
            'Product Type' => $rows['productType'],
            'Collection' => $rows['Collection'],
            'On Hand' => $rows['OnHand'],
            'Status' => $rows['Status'],
            'Price' => '$ ' . _nf($rows['Price'], 2),
            'Currency Label' => $rows['currency_label'],
            'Unit Of Sale' => $rows['UnitOfSale'],
            'Weight' => $rows['Weight'],
            'Weight Unit Of Measure' => $rows['WeightUnitOfMeasure'],
            'Gram Weight' => $rows['GramWeight'],
            'Ring Size' => $rows['RingSize'],
            'Ring Sizable' => $rows['RingSizable'],
            'Ring Size Type' => $rows['RingSizeType'],
            'Lead Time' => $rows['LeadTime'],
            'AGTA' => $rows['AGTA'],
            $rows['DescriptiveElementName1'] => $rows['DescriptiveElementValue1'],
            $rows['DescriptiveElementName2'] => $rows['DescriptiveElementValue2'],
            $rows['DescriptiveElementName3'] => $rows['DescriptiveElementValue3'],
            $rows['DescriptiveElementName4'] => $rows['DescriptiveElementValue4'],
            $rows['DescriptiveElementName5'] => $rows['DescriptiveElementValue5'],
            $rows['DescriptiveElementName6'] => $rows['DescriptiveElementValue6'],
            $rows['DescriptiveElementName7'] => $rows['DescriptiveElementValue7'],
            $rows['DescriptiveElementName8'] => $rows['DescriptiveElementValue8'],
            $rows['DescriptiveElementName9'] => $rows['DescriptiveElementValue9'],
            $rows['DescriptiveElementName10'] => $rows['DescriptiveElementValue10'],
            $rows['DescriptiveElementName11'] => $rows['DescriptiveElementValue11'],
            $rows['DescriptiveElementName12'] => $rows['DescriptiveElementValue12'],
            $rows['DescriptiveElementName13'] => $rows['DescriptiveElementValue13'],
            $rows['DescriptiveElementName14'] => $rows['DescriptiveElementValue14'],
            $rows['DescriptiveElementName15'] => $rows['DescriptiveElementValue15'],
            'Ready To Wear' => $rows['ReadyToWear'],
            'Specification' => $rows['Specification'],
            'Publications' => $rows['Publications'],
            'Set With' => $rows['SetWith'],
            'Made With' => $rows['MadeWith'],
            'Group Videos' => $rows['GroupVideos'],
            $rows['SearchFilterName1'] => $rows['SearchFilterValue1'],
            $rows['SearchFilterName2'] => $rows['SearchFilterValue2'],
            $rows['SearchFilterName3'] => $rows['SearchFilterValue3'],
            $rows['SearchFilterName4'] => $rows['SearchFilterValue4'],
            $rows['SearchFilterName5'] => $rows['SearchFilterValue5'],
            $rows['SearchFilterName6'] => $rows['SearchFilterValue6'],
            'Country Of Orgin' => $rows['CountryOfOrgin'],
            'Creation Date' => $rows['CreationDate'],
            'Desc. Element Group' => $rows['DescriptiveElementGroup']
        );
        
        return $fileds_list;
    }
    
    function stuller_item_details_rows($details=[]) {
        $view_details = '';
        
        $item_fields = stuller_fashion_jewelry_fields($details);
        
        foreach( $item_fields as $labels => $cols_values ) {
            if( !empty($cols_values) ) {
                $view_details .= '<div class="item_rows">
                            <span>'.$labels.' :</span>
                            <span>'.$cols_values.'</span>
                            <div class="clear"></div>
                        </div>';
                }
        }
        
        $desc_element = json_decode($details['DescriptiveElements'], TRUE); //print_ar($desc_element);
        
        foreach( $desc_element as $fieldrows ) {
            $view_details .= '<div class="item_rows">
                            <span>'.$fieldrows['Name'].' :</span>
                            <span>'.$fieldrows['DisplayValue'].'</span>
                            <div class="clear"></div>
                        </div>';
        }
        
        if( !empty($details['ConfigurationModel']) ) {
            $i = 1;
            $config_model = json_decode($details['ConfigurationModel'], true);
            foreach( $config_model['RingSizeOptions'] as $configrows ) {
                $view_details .= '<div class="item_rows">
                            <span>Ring Size'.$i.' :</span>
                            <span>'.$configrows['Size'].' (Price: ($ '.$configrows['Price']['Value'].'))</span>
                            <div class="clear"></div>
                        </div>';
                $i++;
            }
        }
        
        
        return $view_details;
    }
    
    
     function jcart_item_details_rows($details=[]) {
        $view_details = '';

        $view_details .= '<div class="item_rows"><span>Item Title :</span><span>'.$details['item_title'].'</span><div class="clear"></div></div>';
        $view_details .= '<div class="item_rows"><span>Metal Purity :</span><span>'.$details['metal_purity'].'</span><div class="clear"></div></div>';
        $view_details .= '<div class="item_rows"><span>Vendor Name :</span><span>'.$details['vendor_name'].'</span><div class="clear"></div></div>';
        $view_details .= '<div class="item_rows"><span>Item SKU :</span><span>'.$details['item_sku'].'</span><div class="clear"></div></div>';
        $view_details .= '<div class="item_rows"><span>Price Amazon :</span><span>'.$details['price_amazon'].'</span><div class="clear"></div></div>';
        $view_details .= '<div class="item_rows"><span>Price Ebay :</span><span>'.$details['price_ebay'].'</span><div class="clear"></div></div>';
        $view_details .= '<div class="item_rows"><span>Price Website :</span><span>'.$details['price_website'].'</span><div class="clear"></div></div>';
        $view_details .= '<div class="item_rows"><span>Category Type :</span><span>'.$details['category_type'].'</span><div class="clear"></div></div>';
        $view_details .= '<div class="item_rows"><span>Ring Size :</span><span>'.$details['ring_size'].'</span><div class="clear"></div></div>';
        $view_details .= '<div class="item_rows"><span>Gemstone Type :</span><span>'.$details['gemstone_type'].'</span><div class="clear"></div></div>';

        
        return $view_details;
    }
    
    function jcart_watch_item_details_rows($details=[]) {
        $view_details = '';

        $view_details .= '<div class="item_rows"><span>Item Title :</span><span>'.$details['productName'].'</span><div class="clear"></div></div>';
        $view_details .= '<div class="item_rows"><span>Price :</span><span>'.$details['price1'].'</span><div class="clear"></div></div>';
        $view_details .= '<div class="item_rows"><span>Gender :</span><span>'.$details['gender'].'</span><div class="clear"></div></div>';
        $view_details .= '<div class="item_rows"><span>Metal :</span><span>'.$details['metal'].'</span><div class="clear"></div></div>';
        $view_details .= '<div class="item_rows"><span>Brand :</span><span>'.$details['brand'].'</span><div class="clear"></div></div>';
        $view_details .= '<div class="item_rows"><span>Width :</span><span>'.$details['width'].'</span><div class="clear"></div></div>';
        $view_details .= '<div class="item_rows"><span>Band Lengthe :</span><span>'.$details['band_length'].'</span><div class="clear"></div></div>';
        $view_details .= '<div class="item_rows"><span>Movement :</span><span>'.$details['movement'].'</span><div class="clear"></div></div>';
        $view_details .= '<div class="item_rows"><span>Width :</span><span>'.$details['width'].'</span><div class="clear"></div></div>';

        
        return $view_details;
    }
    
    function stuller_ebay_cate_id($cate_name='') {
        switch ($cate_name) {
            case 'Accessories' :
                $store_cate_id   = '1237190967';
                $primary_cate_id = '499';
                break;
            case 'Bracelets' :
                $store_cate_id   = '1237190967';
                $primary_cate_id = '50637';
                break;
            case 'Earrings' :
                $store_cate_id   = '1237190967';
                $primary_cate_id = '50637';
                break;
            case 'Fancy' :
                $store_cate_id   = '1237190967';
                $primary_cate_id = '499';
                break;
            case 'Hoops' :
                $store_cate_id   = '1237190967';
                $primary_cate_id = '50647';
                break;
            case 'Mounting Components' :
                $store_cate_id   = '1237190967';
                $primary_cate_id = '499';
                break;
            case 'Necklace Centers' :
                $store_cate_id   = '1237190967';
                $primary_cate_id = '155101';
                break;
            case 'Necklaces' :
                $store_cate_id   = '1237190967';
                $primary_cate_id = '155101';
                break;
            case 'Pendants' :
                $store_cate_id   = '1237190967';
                $primary_cate_id = '155101';
                break;
            case 'Pendants With Bail' :
                $store_cate_id   = '1237190967';
                $primary_cate_id = '155101';
                break;
            case 'Pendants With Chain' :
                $store_cate_id   = '1237190967';
                $primary_cate_id = '155101';
                break;
            case 'Rings' :
                $store_cate_id   = '1237190967';
                $primary_cate_id = '6768';
                break;
            default :
                $store_cate_id   = '1237190967';
                $primary_cate_id = '155101';
                break;
        }
        
        $returns['store_cate_id']   = $store_cate_id;
        $returns['primary_cate_id'] = $primary_cate_id;
        
        return $returns;
    }
    
    //// collection item img
    function getEbayItemImgLinks($results=0) {
        $item_image = array();
        
        if( count($results) > 0 ) {
            foreach( $results as $rows ) {
              if( !empty($rows['image']) ) {
                $img_link_hd = SITE_URL . $rows['image'];
                //$img_link = HEART_LINK . $rows['image'];
                //$erphd_img = ERPHD_LINK . $rows['image'];
                $item_image[] = $img_link_hd;
                
//                if( getimagesize($img_link_hd) ) {
//                    $item_image[] = $img_link_hd;
//                } else if( getimagesize($img_link) ) {
//                    $item_image[] = $img_link;
//                } else if( getimagesize($erphd_img) ) {
//                    $item_image[] = $erphd_img;
//                } else {
//                   $item_image[] = SITE_URL . 'images/cert/12_541_no_image_thumb.gif';
//                   break;
//                }
              }
            }
        } else {
            $item_image[] .= SITE_URL . 'images/cert/12_541_no_image_thumb.gif';
        }
        return $item_image;
    }
    
    function item_total_carat_value($item_detail=[]) {
        $new_total_carat = $item_detail['new_center_carat'] + $item_detail['semi_mount_weight'];
        $center_stone_size = ''; //$item_detail['center_stone_size'];
            
        if( $new_total_carat == 0 || empty($new_total_carat) ) {
            $newTotalCarat = $item_detail['total_carat_weight'];
        } elseif( $new_total_carat > 0 || !empty($new_total_carat) ) {
            $newTotalCarat = $new_total_carat;
        } else {
            $newTotalCarat = $center_stone_size;
        }

        if( empty($newTotalCarat) || $newTotalCarat == 0 ) {
            $net_total_carat = $center_stone_size;
        } else {
            $net_total_carat = $newTotalCarat;
        }
        
        return $net_total_carat;
    }
    
    function get_global_field_val($fields='', $label='S-TYPE1') {
        $field_value = '';
        
        if( !empty($fields) ) {
            $global_fields = unserialize( $fields );
            foreach( $global_fields as $rows ) {
                if( $rows[0] == $label ) {
                    $field_value = $rows[1];
                    break;
                }                
            }
        }
        return $field_value;
    }

	function getItemDiamondShape($category='', $global_fields='') {
        $item_shape = jitem_diamond_shape($category);
        
        if( !empty($item_shape) ) {
            $set_item_shape = $item_shape;
        } else {
            $get_item_cate = item_cate_shape_value($global_fields); /// item_jewelry_section helper
            $set_item_shape = jitem_diamond_shape($get_item_cate);
        }
        
        return $set_item_shape;
    }
	
	function jitem_diamond_shape($cate='') {
    switch ($cate) {
        case 'Asscher Rings':
            $item_shape = 'AS';
            break;
        case 'Cushion Rings':
            $item_shape = 'C';
            break;
        case 'Emerald Rings':
            $item_shape = 'E';
            break;
        case 'Marquise Rings':
            $item_shape = 'M';
            break;
        case 'Oval Rings':
            $item_shape = 'O';
            break;
        case 'Pear Rings':
            $item_shape = 'P';
            break;
        case 'Princess Rings':
            $item_shape = 'PR';
            break;
        case 'Radiant Rings':
            $item_shape = 'R';
            break;
        case 'Round Rings':
            $item_shape = 'B';
            break;
        default :
            $item_shape = '';
            break;
    }
    
    return $item_shape;
}

function viewDmShape($shap='') {
	if( $shap == '') {
		return false;
	}

	$shap = trim($shap);
	switch($shap) {
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
			$shap_name = 'Trillion';
			break;
		default :
			$shap_name = 'Round';
			break;
	}
	return $shap_name;
}

function popupsOtherBlockDataii() {
		
		$view_data = '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <form name="taskForm" id="taskForm" method="post">
				<div class="modal-dialog">
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					  <h4 class="modal-title" id="myModalLabel">Compose New Task</h4>
					</div>
					<div class="modal-body">
					  <div id="viewErorMsg"></div>
					  <div>
						<input type="text" name="task_heading" id="task_heading" class="form-control" placeholder="Task Heading">
					  </div>
					  <br>
					  <div>
						<textarea name="task_detail" placeholder="Task Detail" id="task_detail" class="form-control"></textarea>
					  </div>
					  <br>
					  <div>
						<input type="checkbox" name="cb_imptask" id="cb_imptask" value="Y" /><label for="cb_imptask">Important Task</label>
					  </div>
					</div>
					<div class="modal-footer">
					  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					  <button type="button" class="btn btn-primary" onclick="saveTaskDetail()">Save changes</button>
					</div>
				  </div>
				</div>
			  </form>
			</div>
			<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Compose New Task</h4>
				  </div>
				  <div class="modal-body"> sgxdfgxfg </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				  </div>
				</div>
			  </div>
			</div>
			<!-- sidebar chats -->
			<nav class="atm-spmenu atm-spmenu-vertical atm-spmenu-right side-chat">
			  <div class="header">
				<input type="text" class="form-control chat-search" placeholder=" Search">
			  </div>
			  <div href="#" class="sub-header">
				<div class="icon"><i class="fa fa-user"></i></div>
				<p>Online (4)</p>
			  </div>
			  <div class="content">
				<p class="title">Family</p>
				<ul class="nav nav-pills nav-stacked contacts">
				  <li class="online"><a href="#"><i class="fa fa-circle-o"></i> Steven Smith</a></li>
				  <li class="online"><a href="#"><i class="fa fa-circle-o"></i> John Doe</a></li>
				  <li class="online"><a href="#"><i class="fa fa-circle-o"></i> Michael Smith</a></li>
				  <li class="busy"><a href="#"><i class="fa fa-circle-o"></i> Chris Rogers</a></li>
				</ul>
				<p class="title">Friends</p>
				<ul class="nav nav-pills nav-stacked contacts">
				  <li class="online"><a href="#"><i class="fa fa-circle-o"></i> Vernon Philander</a></li>
				  <li class="outside"><a href="#"><i class="fa fa-circle-o"></i> Kyle Abbott</a></li>
				  <li><a href="#"><i class="fa fa-circle-o"></i> Dean Elgar</a></li>
				</ul>
				<p class="title">Work</p>
				<ul class="nav nav-pills nav-stacked contacts">
				  <li><a href="#"><i class="fa fa-circle-o"></i> Dale Steyn</a></li>
				  <li><a href="#"><i class="fa fa-circle-o"></i> Morne Morkel</a></li>
				</ul>
			  </div>
			  <div id="chat-box">
				<div class="header"> <span>Richard Avedon</span> <a class="close"><i class="fa fa-times"></i></a> </div>
				<div class="messages nano nscroller has-scrollbar">
				  <div class="content" tabindex="0" style="right: -17px;">
					<ul class="conversation">
					  <li class="odd">
						<p>Hi John, how are you?</p>
					  </li>
					  <li class="text-right">
						<p>Hello I am also fine</p>
					  </li>
					  <li class="odd">
						<p>Tell me what about you?</p>
					  </li>
					  <li class="text-right">
						<p>Sorry, Im late... see you</p>
					  </li>
					  <li class="odd unread">
						<p>OK, call me later...</p>
					  </li>
					</ul>
				  </div>
				  <div class="pane" style="display: none;">
					<div class="slider" style="height: 20px; top: 0px;"></div>
				  </div>
				</div>
				<div class="chat-input">
				  <div class="input-group">
					<input type="text" placeholder="Enter a message..." class="form-control">
					<span class="input-group-btn">
					<button class="btn btn-danger" type="button">Send</button>
					</span> </div>
				</div>
			  </div>
			</nav>
			<!-- /sidebar chats -->';
			
			return $view_data;
	}
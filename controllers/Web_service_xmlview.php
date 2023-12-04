<?php 
class Web_service_xmlview extends CI_Controller {
    public $sign_upform = '';
    public $shape_link = '';
	
    public function __construct() {
        parent::__construct();
        $this->load->model('adminmodel');
        $this->load->model('user');
        $this->load->model('catemodel');
        $this->load->model('diamondmodel');
        $this->load->model('qualitymodel');
        $this->load->model('stulleringsmodel');
        $this->load->model('jewelrymodel');
        $this->load->model('rolexmodel_new');
        $this->load->model('adminsectionmodels');
        $this->load->model('davidsternmodel');
        $this->load->helper('form');
        $this->load->helper('url');
        //$this->load->helper('admins_section_set');
        $this->load->helper('ordrs_detail');
        $this->load->helper('stullering');
        $this->load->helper('collections_section');
        
        $this->shape_link = SITE_URL.'images/shapes_images/';
   }
   
   function customer_info_xmlfile($cid=0, $list_view='') {
       $row = $this->adminmodel->getCustomerDetailViaID( $cid ); //print_ar($row);
       
        $xml = '<customer>';
        $xml .= '<customer_id>'.$cid.'</customer_id>';
        $xml .= '<shipping_detail>';
        $xml .= '<full_name>'.$row['fname'] . ' ' . $row['lname'] .'</full_name>';
        $xml .= '<email>'.$row['email'].'</email>';
        $xml .= '<phone>'.$row['phone'].'</phone>';
        $xml .= '<address1>'.$row['address'].'</address1>';
        $xml .= '<address2>'.$row['address2'].'</address2>';
        $xml .= '<city>'.$row['city'].'</city>';
        $xml .= '<postcode>'.$row['postcode'].'</postcode>';
        $xml .= '<province>'.$row['province'].'</province>';
        $xml .= '<country>'.$row['country'].'</country>';
        $xml .= '</shipping_detail>';
        $xml .= '<biling_detail>';
        $xml .= '<full_name>'.$row['billing_fname'] . ' ' . $row['billing_lname'] .'</full_name>';
        $xml .= '<email>'.$row['billing_email'].'</email>';
        $xml .= '<phone>'.$row['billing_phone'].'</phone>';
        $xml .= '<address1>'.$row['billing_adres1'].'</address1>';
        $xml .= '<address2>'.$row['billing_adres2'].'</address2>';
        $xml .= '<city>'.$row['billing_city'].'</city>';
        $xml .= '<postcode>'.$row['billing_postcode'].'</postcode>';
        $xml .= '<province>'.$row['billing_province'].'</province>';
        $xml .= '<country>'.$row['billing_country'].'</country>';
        $xml .= '</biling_detail>';
        $xml .= '</customer>';
        
        if( empty($list_view) ) {
            $xmlobj = new SimpleXMLElement($xml);        
            header('Content-type: text/xml');
            print ($xmlobj->asXML());
        } else {
            return $xml;
        }
        
        
        //$xmlobj->asXML('web_service_files/customer_row_details.xml');
    }
    
    function customer_records_inxml() {
        $results = $this->adminmodel->getCustomerResults(); //print_ar($results);
        
        $xml_contents_list = '<customer_list>';
        
        foreach( $results as $rows ) {
            $xml_contents_list .= $this->customer_info_xmlfile( $rows['id'], 'list');
        }
        
        $xml_contents_list .= '</customer_list>';
        
        $xmlobj = new SimpleXMLElement($xml_contents_list);        
        header('Content-type: text/xml');
        print ($xmlobj->asXML());
    }
    
   function order_detail_xmlfile($order_id=0, $list_view='') {
       $roworder = $this->adminmodel->getorderonly( $order_id );
       $row = (array) $roworder; //print_ar($row);
       $order_status = getOrderStatus( $row['order_status'] ); // custome helper
       $order_details_rows = view_order_details_content( $row['orders_id'], '', '', 'xml' ); // ordrs_detail helper
       $shipping_lable = check_empty($row['p_shipping_label'], '#');
       $order_total_price = view_order_details_content($row['orders_id'], '', '', '', 'price'); //ordrs detail helper
       $order_wire_price = wire_price($order_total_price);
       
        $xml = '<orders>';
        $xml .= '<order_info>';
        $xml .= '<orders_id>'.$row['orders_id'].'</orders_id>';
        $xml .= '<currency_code>USD</currency_code>';
        $xml .= '<shiping_price>'.$row['shiping_price'].'</shiping_price>';
        $xml .= '<total_order_price>'.$order_total_price.'</total_order_price>';
        $xml .= '<total_wire_amount>'.$order_wire_price.'</total_wire_amount>';
        $xml .= '<paymentmethod>'.$row['paymentmethod'].'</paymentmethod>';
        $xml .= '<shiping_method>'.$row['shiping_method'].'</shiping_method>';
        $xml .= '<orderdate>'.$row['orderdate'].'</orderdate>';
        $xml .= '<deliverydate>'.$row['deliverydate'].'</deliverydate>';
        $xml .= '<order_status>'. $order_status .'</order_status>';
        $xml .= '<payment_status>'.$row['payment_status'].'</payment_status>';
        $xml .= '<po_number>'.$row['po_number'].'</po_number>';
        $xml .= '<invoice_no>'.$row['invoice_no'].'</invoice_no>';
        $xml .= '<shipping_label>'.$shipping_lable.'</shipping_label>';
        $xml .= '</order_info>';
        $xml .= $order_details_rows;
        $xml .= '</orders>';
        
        if( empty($list_view) ) {
            $xmlobj = new SimpleXMLElement($xml);        
            header('Content-type: text/xml');
            print ($xmlobj->asXML());
        } else {
            return $xml;
        }
        
        //$xmlobj->asXML('web_service_files/customer_row_details.xml');
    }
    
    function order_products_detail_xmlview($order_id=0, $list_view='') {  
       $roworder = $this->adminmodel->getorderonly( $order_id ); 
       $row = (array) $roworder;
       
        $xml = $this->getOrderedProductsDetsil( $row['orders_id'] );
        
        if( empty($list_view) ) {
            $xmlobj = new SimpleXMLElement($xml);        
            header('Content-type: text/xml');
            print ($xmlobj->asXML());
        } else {
            return $xml;
        }        
        
        //$xmlobj->asXML('web_service_files/customer_row_details.xml');
    }
    
    function get_order_details_list_inxml() {
        ini_set('max_execution_time', 20000);
        ini_set('max_input_time', 20000);
        ini_set('memory_limit', '1024M');
            
        $results = $this->adminsectionmodels->getOrderResults(); //print_ar($results);
        
        $xml_contents_list = '<order_list>';
        $r = 1;
        
        foreach( $results as $rows ) {
            $xml_contents_list .= '<order_info_row>';
            $xml_contents_list .= $this->order_detail_xmlfile( $rows['id'], 'list');
            $xml_contents_list .= $this->customer_info_xmlfile( $rows['customerid'], 'list');
            $xml_contents_list .= $this->order_products_detail_xmlview( $rows['id'], 'list');
            $xml_contents_list .= '</order_info_row>';
            
            //if( $r == 60 ) { break; }
            $r++;
        }
        
        $xml_contents_list .= '</order_list>';
        
        $xmlobj = new SimpleXMLElement($xml_contents_list);        
        header('Content-type: text/xml');
        print ($xmlobj->asXML());
            
    }
    
    function rapnet_diamonds_rows_inxml() {
        $results = $this->diamondmodel->getDiamondReuslts(); //print_ar($results);
        
        $xml_contents_list = '<diamonds>';
        $xml_contents_list .= '<addoption>addjewelry</addoption>';
        
        foreach( $results as $rows ) {
            $xml_contents_list .= $this->rappnet_diamond_detail_inxmlformat($rows['lot'], 'diamond_row');
        }
        
        //$xml_contents_list .= $this->rappnet_diamond_detail_inxmlformat('ZZ666', 'diamond_row');
        
        $xml_contents_list .= '</diamonds>';
        
        $xmlobj = new SimpleXMLElement($xml_contents_list);        
        header('Content-type: text/xml');
        print ($xmlobj->asXML());
        
    }
    
    function getOrderedProductsDetsil($order_id=0) {
       $rowitemdt = $this->commonmodel->getOrderItemDetail($order_id); //print_ar($rowitemdt);
       $shape_imgurl = SITE_URL.'images/shapes_images/';
       $xml_contents_view = '<products>';
       
       foreach( $rowitemdt as $row_itdt ){
           $main_item_features = $this->mainItemFeatures( $row_itdt );
           switch($row_itdt['addoption']) {
               case 'addunique':
                   $rowrings = $this->catemodel->getRingsDetailViaId($row_itdt['lot']); //print_ar($rowrings);
                   $image_url = SITE_URL.'scrapper/imgs/'.$rowrings['ImagePath'];
                   $measurement = $rowrings['top_width'].'x'.$rowrings['bottom_width'].'x'.$rowrings['top_height'].'x'.$rowrings['bottom_height'];
                   $xml_contents_view .= '<product>';
                   $xml_contents_view .= '<order_id>'.$order_id.'</order_id>';
                   $xml_contents_view .= '<addoption>'.$row_itdt['addoption'].'</addoption>';
                   $xml_contents_view .= '<item>';
                   $xml_contents_view .= '<product_id>'.$rowrings['ring_id'].'</product_id>';
                   $xml_contents_view .= '<category_id>'.$rowrings['catid'].'</category_id>';
                   $xml_contents_view .= '<name>'.$rowrings['name'].'</name>';
                   $xml_contents_view .= '<style_group>'.$rowrings['style_group'].'</style_group>';
                   $xml_contents_view .= '<metal_weight>'.$rowrings['metal_weight'].'</metal_weight>';
                   $xml_contents_view .= '<bail_info>'.$rowrings['bail_info'].'</bail_info>';
                   $xml_contents_view .= '<stone_weight>'.$rowrings['stone_weight'].'</stone_weight>';
                   $xml_contents_view .= '<supplied_stones>'.$rowrings['supplied_stones'].'</supplied_stones>';
                   $xml_contents_view .= '<additional_stones>'.$rowrings['additional_stones'].'</additional_stones>';
                   $xml_contents_view .= '<measurement>'.$measurement.'</measurement>';
                   $xml_contents_view .= '<matalType>'.$rowrings['matalType'].'</matalType>';
                   $xml_contents_view .= '<ringSize>'.$rowrings['ringSize'].'</ringSize>';
                   $xml_contents_view .= $main_item_features;
                   //$xml_contents_view .= '<priceRetail>'.$rowrings['priceRetail'].'</priceRetail>';
                   $xml_contents_view .= '<totalprice>'.$row_itdt['totalprice'].'</totalprice>';
                   $xml_contents_view .= '<category_name>'.$rowrings['category_name'].'</category_name>';
                   $xml_contents_view .= '<parent_cate>'.$rowrings['parent_cate'].'</parent_cate>';
                   $xml_contents_view .= '<image_link>'.$image_url.'</image_link>';
                   $xml_contents_view .= '</item>';
                   
               case 'heart_diamond_collection':
                   $rowrings = $this->davidsternmodel->getSternCollectionDetail($row_itdt['lot']);
                   $image_url = setCollectionImgLink($rowrings['image1'], $rowrings['item_sku'], $rowrings['different_imglist']);
                    //collections section helper
                   $xml_contents_view .= '<product>';
                   $xml_contents_view .= '<order_id>'.$order_id.'</order_id>';
                   $xml_contents_view .= '<addoption>'.$row_itdt['addoption'].'</addoption>';
                   $xml_contents_view .= '<item>';
                   $xml_contents_view .= '<product_id>'.$rowrings['stock_number'].'</product_id>';
                   $xml_contents_view .= $this->heart_collection_product_detail($rowrings);
                   $xml_contents_view .= '<totalprice>'.$row_itdt['totalprice'].'</totalprice>';
                   $xml_contents_view .= '<image_link>'.$image_url.'</image_link>';
                   $xml_contents_view .= '</item>';
                   
            if( !empty($row_itdt['sidestone1']) ) {
                $xml_contents_view .= $this->rappnet_diamond_detail_inxmlformat($row_itdt['sidestone1'], 'diamond_info');
            }
                //$xml_contents_view .= $this->rappnet_diamond_detail_inxmlformat($row_itdt['sidestone1'], 'sidestone');
                $xml_contents_view .= '</product>';
                   
                break;
                
               case 'rolex_watch' :
                   
                    $xml_contents_view .= '<product>';
                    $xml_contents_view .= '<order_id>'.$order_id.'</order_id>';
                    $xml_contents_view .= '<addoption>'.$row_itdt['addoption'].'</addoption>';
                    $xml_contents_view .= '<item>';
                    $xml_contents_view .= '<product_id>'.$row_itdt['lot'].'</product_id>';
                    $xml_contents_view .= '<totalprice>'.$row_itdt['totalprice'].'</totalprice>';
                    $xml_contents_view .= $this->rolex_watch_detail_inxml( $row_itdt['lot'] );
                    $xml_contents_view .= '</item>';
                    $xml_contents_view .= '</product>';
                   break;
               
               case 'addjewelry' :
                   
                   $xml_contents_view .= '<product>';
                   $xml_contents_view .= '<order_id>'.$order_id.'</order_id>';
                   $xml_contents_view .= '<addoption>'.$row_itdt['addoption'].'</addoption>';
                   $xml_contents_view .= '<item>';
                   $xml_contents_view .= '<product_id>'.$row_itdt['lot'].'</product_id>';
                   $xml_contents_view .= '<totalprice>'.$row_itdt['totalprice'].'</totalprice>';
                   $xml_contents_view .= $this->rappnet_diamond_detail_inxmlformat($row_itdt['lot'], 'item_detail');
                   $xml_contents_view .= '</item>';
                   $xml_contents_view .= '</product>';
        
                   break;
               
               case 'toearring' :
                   
                   $setttings = $this->jewelrymodel->getEarringSettingsById($row_itdt['earringsetting']);
		   $vimage_urlink = SITE_URL.$setttings['small_image'];
                   $itemTitle = ucwords( $setttings['metal'] . ' ' . $setttings['style']) . ' Earring';
                   
                   $xml_contents_view .= '<product>';
                   $xml_contents_view .= '<order_id>'.$order_id.'</order_id>';
                   $xml_contents_view .= '<addoption>'.$row_itdt['addoption'].'</addoption>';
                   $xml_contents_view .= '<item>';
                   $xml_contents_view .= '<product_id>'.$row_itdt['earringsetting'].'</product_id>';
                   $xml_contents_view .= '<name>'.$itemTitle.'</name>';
                   $xml_contents_view .= '<setting_type>Earring</setting_type>';
                   $xml_contents_view .= '<earring_shape>'.$setttings['shape'].'</earring_shape>';
                   $xml_contents_view .= '<description>'.$itemTitle.'</description>';
                   $xml_contents_view .= '<image_link>'.$vimage_urlink.'</image_link>';
                   $xml_contents_view .= '<item_price>'.$setttings['price'].'</item_price>';
                   $xml_contents_view .= '</item>';
                   $xml_contents_view .= $this->rappnet_diamond_detail_inxmlformat($row_itdt['lot'], 'sidestone1');
                   $xml_contents_view .= $this->rappnet_diamond_detail_inxmlformat($row_itdt['sidestone2'], 'sidestone2');
                   $xml_contents_view .= '</product>';
        
                   break;
               
               case 'stullerrings' :
                   
                   $xml_contents_view .= '<product>';
                   $xml_contents_view .= '<order_id>'.$order_id.'</order_id>';
                   $xml_contents_view .= '<addoption>'.$row_itdt['addoption'].'</addoption>';
                   $xml_contents_view .= '<item>';
                   $xml_contents_view .= $this->stuller_detail_inxml( $row_itdt['lot'] );                   
                   $xml_contents_view .= '</item>';
                   $xml_contents_view .= '</product>';
        
                   break;
               
            case 'wb_diamond':
            case 'wb_ladies':
            case 'wb_platinum':
            case 'wb_mens':
            case 'wb_studs':
            case 'wb_hoops':
            case 'gemstone':
                $tablesName = getStulerTable( $row_itdt['addoption'] );    // stullering helper     
                $details = $this->stulleringsmodel->getStulleRingDetail( $row_itdt['lot'], $tablesName['product'] );
                $stuller_img = $this->stulleringsmodel->getStullerImages( $row_itdt['lot'], $tablesName['product'], $tablesName['images'] );
                $image_url = SITE_URL . 'stuller/' . $tablesName['folder'] . '/' . $stuller_img[0]['product_image'];
                $ringPrice = _nf( ( $row_itdt['totalprice'] / $row_itdt['quantity'] ) , 2 );
                
                $xml_contents_view .= '<product>';
                $xml_contents_view .= '<order_id>'.$order_id.'</order_id>';
                $xml_contents_view .= '<addoption>'.$row_itdt['addoption'].'</addoption>';
                $xml_contents_view .= '<item>';
                $xml_contents_view .= '<product_id>'.$details['id'].'</product_id>';
                $xml_contents_view .= '<name>'.$details['name'].'</name>';
                $xml_contents_view .= '<item_type>'.$details['quality'].'</item_type>';
                $xml_contents_view .= '<description>'.$details['name'].'</description>';
                $xml_contents_view .= '<image_link>'.$image_url.'</image_link>';
                $xml_contents_view .= '<totalprice>'.$ringPrice.'</totalprice>';
                $xml_contents_view .= '</item>';
                $xml_contents_view .= '</product>';
                
                break;
            
               default :
                    $xml_contents_view .= '<product>';
                    $xml_contents_view .= '<order_id>'.$order_id.'</order_id>';
                    $xml_contents_view .= '<addoption>'.$row_itdt['addoption'].'</addoption>';
                    $xml_contents_view .= '<item>';
                    $xml_contents_view .= '<product_id>'.$row_itdt['lot'].'</product_id>';
                    $xml_contents_view .= '</item>';
                    $xml_contents_view .= '</product>';
                
                break;
           }
       }
        
       $xml_contents_view .= '</products>';
       
       return $xml_contents_view;
    }
    
    function mainItemFeatures($rows=[]) {
        $item_features = '<default_ringsize>' . $rows['default_ringsize'] . '</default_ringsize>';
        $item_features .= '<item_metal>' . $rows['item_metal'] . '</item_metal>';
        $item_features .= '<metal_weight>' . $rows['metal_weight'] . '</metal_weight>';
        $item_features .= '<finish_level>' . resetsSlugTitle($rows['finish_level']) . '</finish_level>';
        
        return $item_features;
    }
    
    function rolex_watch_detail_inxml($item_id=0) {
        $details = $this->rolexmodel_new->getRolexWatchDetail($item_id); //print_ar($details);
        $imageLink = SITE_URL . 'stuller/rolex/images_rolex/' . $details['large_image'];
        
        $cols_list = array('title', 'style', 'in_stock', 'status', 'average_weight', 'country', 'metal', 'diamond_weight', 'product_type', 'watch_type', 'material_primary', 'material_primary_color', 'material_accents', 'material_accent_color1', 'length_of_item', 'sold_by_unit', 'bezel_type', 'case_material', 'case_back_material', 'clasp_connector', 'crown_type', 'crystal_material', 'finish', 'gender', 'movement_country', 'movement_descriptor', 'packaging', 'warranty', 'watch_band_material', 'watch_band_width', 'watch_band_width_um', 'watch_case_size', 'watch_dial_color', 'watch_face_length', 'watch_face_thickness', 'watch_face_width', 'watch_function', 'water_movement_type', 'water_movement_warranty', 'water_resistant');
        $xml_contents_view = '<img_link>'.$imageLink.'</img_link>';
        
        foreach( $cols_list as $column_name ) {
            $xml_contents_view .= '<'.$column_name.'>'. str_replace('&', 'and', $details[$column_name]).'</'.$column_name.'>';
        }
        
        return $xml_contents_view;
    }
    
    function heart_collection_product_detail($rows=[]) {
        $field_list = array('carat', 'shape', 'metal', 'finger_size', 'diamond_count', 'diamond_size', 'total_carats', 'pearl_lenght', 'pearl_mm', 'semi_mounted', 'description', 'description2', 'style', 'white_gold_price', 'yellow_gold_price', 'platinum_price', 'category', 'subcategory', 'metal_purity', 'item_title', 'item_sku', 'ring_style', 'made_in', 'vendor_no', 'vend_style_no', 'vend_inv_no', 'on_handmemo_qty', 'on_travel', 'band_width', 'ring_height', 'head_dimensions', 'center_stone_sizes', 'sizeable', 'comment', 'g14_wh_price', 'g18_wh_price', 'plat_wh_price', 'mg14_gr', 'mg14_price', 'mg18_gr', 'mg18_price', 'mplat_gr', 'mplat_price', 'jew_design');
        
        $xml_contents_view = '';        
        foreach( $field_list as $column_name ) {
            $xml_contents_view .= '<'.$column_name.'>'. str_replace('&', 'and', $rows[$column_name]).'</'.$column_name.'>';
        }
        return $xml_contents_view;
    }
    
    function stuller_detail_inxml($itemID=0) {
        $stullerrow = $this->qualitymodel->stullerRingsDetail($itemID);
        
        $cols_list = array('ShortDescription', 'GroupDescription', 'MerchandisingCategory1', 'MerchandisingCategory2', 'MerchandisingCategory3', 'MerchandisingCategory4', 'MerchandisingCategory5', 'ProductType', 'Collection', 'OnHand', 'Status', 'CurrencyCode', 'UnitOfSale', 'Weight', 'WeightUnitOfMeasure', 'GramWeight', 'RingSizable', 'RingSize', 'RingSizeype', 'LeadTime', 'AGTA', 'ReadyToWear');
        $image_url = getStullerImage($stullerrow); // custome helper
        $item_desc = replace_and($stullerrow['Description']); // custome helper;
        
        $xml_contents_view = '<product_id>'.$stullerrow['stuller_id'].'</product_id>';
        $xml_contents_view .= '<name>'.$item_desc.'</name>';
        $xml_contents_view .= '<description>'. $item_desc .'</description>';
        $xml_contents_view .= '<setting_type>'.$stullerrow['stuller_cate'].'</setting_type>';
        $xml_contents_view .= '<sku>'.$stullerrow['Sku'].'</sku>';
        
        foreach( $cols_list as $column_name ) {
            $column_value = replace_and($stullerrow[$column_name]); // custome helper
            $xml_contents_view .= '<'.$column_name.'>'.$column_value.'</'.$column_name.'>';
        }

        $xml_contents_view .= '<DescriptiveElementGroup>'.$stullerrow['DescriptiveElementGroup'].'</DescriptiveElementGroup>';
        for($i=1; $i <= 15; $i++) {
            $desc_element_value = replace_and( $stullerrow['DescriptiveElementValue'.$i]); // custome helper
            $xml_contents_view .= '<DescriptiveElementName'.$i.'>'.$stullerrow['DescriptiveElementName'.$i].'</DescriptiveElementName'.$i.'>';
            $xml_contents_view .= '<DescriptiveElementValue'.$i.'>'.$desc_element_value.'</DescriptiveElementValue'.$i.'>';
        }
        for($j=1; $j <= 6; $j++) {
            $search_filter_value = replace_and( $stullerrow['SearchFilterValue'.$j] ); // custome helper
            $xml_contents_view .= '<SearchFilterName'.$j.'>'.$stullerrow['SearchFilterName'.$j].'</SearchFilterName'.$j.'>';
            $xml_contents_view .= '<SearchFilterValue'.$j.'>'.$search_filter_value.'</SearchFilterValue'.$j.'>';
        }

//        $xml_contents_view .= '<image_link>'.$image_url.'</image_link>';
        $xml_contents_view .= '<item_price>'.$stullerrow['Price'].'</item_price>';
        $xml_contents_view .= '<CountryOfOrgin>'.$stullerrow['CountryOfOrgin'].'</CountryOfOrgin>';
        $xml_contents_view .= '<CreationDate>'.$stullerrow['CreationDate'].'</CreationDate>';
        
        return $xml_contents_view;
    }
    
    function rappnet_diamond_detail_inxmlformat($diamond_id='', $itemTags='') {
        $side_detail = $this->diamondmodel->getDetailsByLot($diamond_id); //print_ar($side_detail);
        $side_shape  = view_shape_value($side1_image, $side_detail['shape']);  /// custome helper
        $side_image1 = $this->shape_link.$side1_image;
        
        $xml_contents_view = '<'.$itemTags.'>';
        $xml_contents_view .= '<stock_numb>'.$side_detail['Stock_n'].'</stock_numb>';
        $xml_contents_view .= '<shape>'.$side_shape.'</shape>';
        $xml_contents_view .= '<carat>'.$side_detail['carat'].'</carat>';
        $xml_contents_view .= '<color>'.$side_detail['color'].'</color>';
        $xml_contents_view .= '<fancy_color>'.$side_detail['fancy_color'].'</fancy_color>';
        $xml_contents_view .= '<fancy_color_ot>'.$side_detail['fancy_color_ot'].'</fancy_color_ot>';
        $xml_contents_view .= '<clarity>'.$side_detail['clarity'].'</clarity>';
        $xml_contents_view .= '<price>'.$side_detail['price'].'</price>';
        $xml_contents_view .= '<cert>'.$side_detail['Cert'].'</cert>';
        $xml_contents_view .= '<depth>'.$side_detail['Depth'].'</depth>';
        $xml_contents_view .= '<table_percent>'.$side_detail['TablePercent'].'</table_percent>';
        $xml_contents_view .= '<girdle>'.$side_detail['Girdle'].'</girdle>';
        $xml_contents_view .= '<culet>'.$side_detail['Culet'].'</culet>';
        $xml_contents_view .= '<polish>'.$side_detail['Polish'].'</polish>';
        $xml_contents_view .= '<sym>'.$side_detail['Sym'].'</sym>';
        $xml_contents_view .= '<flour>'.$side_detail['Flour'].'</flour>';
        $xml_contents_view .= '<measurement>'.$side_detail['Meas'].'</measurement>';
        $xml_contents_view .= '<comment>'.$side_detail['Comment'].'</comment>';
        $xml_contents_view .= '<make>'.$side_detail['Make'].'</make>';
        $xml_contents_view .= '<date>'.$side_detail['Date'].'</date>';
        $xml_contents_view .= '<city>'.$side_detail['City'].'</city>';
        $xml_contents_view .= '<state>'.$side_detail['State'].'</state>';
        $xml_contents_view .= '<country>'.$side_detail['Country'].'</country>';
        $xml_contents_view .= '<ratio>'.$side_detail['ratio'].'</ratio>';
        $xml_contents_view .= '<cut>'.$side_detail['cut'].'</cut>';
        $xml_contents_view .= '<tbl>'.$side_detail['tbl'].'</tbl>';
        $xml_contents_view .= '<pricepercrt>'.$side_detail['pricepercrt'].'</pricepercrt>';
        $xml_contents_view .= '<certimage>'.$side_detail['certimage'].'</certimage>';
        $xml_contents_view .= '<length>'.$side_detail['length'].'</length>';
        $xml_contents_view .= '<width>'.$side_detail['width'].'</width>';
        $xml_contents_view .= '<height>'.$side_detail['height'].'</height>';
        $xml_contents_view .= '<lab>'.$side_detail['lab'].'</lab>';
        $xml_contents_view .= '<fancy_color_intens>'.$side_detail['fancy_color_intens'].'</fancy_color_intens>';
        $xml_contents_view .= '<crown>'.$side_detail['crown'].'</crown>';
        $xml_contents_view .= '<pavilion>'.$side_detail['pavilion'].'</pavilion>';
        $xml_contents_view .= '<pavilion_angle>'.$side_detail['pavilion_angle'].'</pavilion_angle>';
        $xml_contents_view .= '<crown_angle>'.$side_detail['crown_angle'].'</crown_angle>';
        $xml_contents_view .= '<cutgrade>'.$side_detail['cutgrade'].'</cutgrade>';
        $xml_contents_view .= '<girdle_thin>'.$side_detail['girdle_thin'].'</girdle_thin>';
        $xml_contents_view .= '<girdle_thick>'.$side_detail['girdle_thick'].'</girdle_thick>';
        $xml_contents_view .= '<culet_condition>'.$side_detail['culet_condition'].'</culet_condition>';
        $xml_contents_view .= '<parcelStoneCount>'.$side_detail['parcelStoneCount'].'</parcelStoneCount>';
        $xml_contents_view .= '<pair_separable>'.$side_detail['pair_separable'].'</pair_separable>';
        $xml_contents_view .= '<pair_no>'.$side_detail['pair_no'].'</pair_no>';
        $xml_contents_view .= '<keyto_symb>'.$side_detail['keyto_symb'].'</keyto_symb>';
        $xml_contents_view .= '<star_length>'.$side_detail['star_length'].'</star_length>';
        $xml_contents_view .= '<image_link>'.$side_image1.'</image_link>';
        $xml_contents_view .= '</'.$itemTags.'>';
     
        return $xml_contents_view;
    }
}
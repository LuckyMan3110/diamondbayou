<?php
/**
* model class used for displaying jewelleries entered by the sellers...
* @param string
* @return string
* @since 24, Feb 2017
* @Author Muhammad Safdar
*/
class Hderingitemsmodel extends CI_Model{
    function __construct(){

            parent::__construct();
            $this->load->model('adminmodel');
            $this->load->helper('item_jewelry_section');
    }
    
    function getItemSpecification($id=0, $tableName='dev_ebay_specs', $type='') {
        if( empty($type) ) {
            $table_name = $tableName;
        } else {
            $table_name = $tableName.$type;
        }
        
        $sql = "SELECT * FROM $table_name WHERE pid = '{$id}' ORDER BY id ASC LIMIT 1";    
        $query    = $this->db->query($sql);
        $results  = $query->result_array();
        
        return $results[0];
    }
    
    //// collection similar jewelry product
    function collection_similar_product($cid=0, $product_id=0, $limit=4) {
        $sql = "SELECT * FROM dev_ebay_items ei INNER JOIN dev_ebay_details ed ON ei.id = ed.pid WHERE ei.id != '{$product_id}' AND ei.`item_type` = 'ERPHD' AND category = '{$cid}' ORDER BY RAND() LIMIT $limit";
        
        $query    = $this->db->query($sql);
        $results  = $query->result_array();
        
        return $results;
    }
    //// collection similar jewelry product
    function recently_purchased_products($c_id=0) {
        $sql      = "SELECT * FROM dev_ebay_items jw INNER JOIN dev_cart ct ON jw.id = ct.lot WHERE ct.addoption = 'hdering_diamond_collection' AND jw.category= '{$c_id}' GROUP BY ct.lot ORDER BY ct.id DESC LIMIT 4";
        /// AND price_website > 0
        
        $query    = $this->db->query($sql);
        $results  = $query->result_array();
        
        return $results;
    }
    
    //// collection similar jewelry product
    function get_ebay_items_cate_id($search_text=0) {
        $field_value = ucwords(trim($search_text) );
        $sql = "SELECT id FROM dev_ebayitems_cate WHERE 1 = 1 AND category_name LIKE '%{$field_value}%' OR sub_category_name LIKE '%{$field_value}%' ORDER BY id ASC LIMIT 1";
        
        $query    = $this->db->query($sql);
        $results  = $query->result_array();
        $category_name = $this->match_cate_words( $field_value );
        
        return ( !empty($category_name) ? $category_name : $results[0]['id'] );
    }
    
    function match_cate_words($category='') {
        switch ($category) {
            case 'Ring' :
            case 'Band' :
            case 'Pendant' :
            case 'Earring' :
            case 'Earrings' :
            case 'Bracelet' :
                $cate_name = $category;
                break;
            case 'Halo' :
                $cate_name = 18;
                break;
            default :
                $cate_name = '';
                break;
        }
        return $cate_name;
    }
    
    function get_item_index_diamond_rows($shape='B', $diamond_color='', $start_limit=0) {
        
        $sql = "SELECT `lot` FROM `dev_index_comp` WHERE 1 = 1 AND `shape` = '{$shape}' AND `Cert_n` != '' AND `Cert` IN ('GIA', 'EGL') AND `price` > '0'";
        $not_allowed_color = array('amethist', 'color stone', 'white');
        
        if( !empty($diamond_color) ) {
            if( !in_array($diamond_color, $not_allowed_color) ) {
                $sql .= " AND `fcolor_value` LIKE '%{$diamond_color}%'";
            } else {
                $sql .= " AND `color` IN ('D', 'E', 'F', 'G', 'H', 'I', 'J')";
            }            
        }
        $sql .= " AND `clarity` IN ('SI2', 'SI1', 'VS2', 'VS1', 'VVS2', 'VVS1', 'FL', 'IF')";
        $sql .= " AND `carat` >= 0.25";
        
        $query1   = $this->db->query($sql);
        $total_rows  = $query1->result_array();
        //$start_from = ( $start_limit > 0 ? $start_limit : 0 );
        
        $sql .= " ORDER BY RAND() ASC LIMIT 500";
        $query2    = $this->db->query($sql);
        $results2  = $query2->result_array();
        $diamond_id_list = array();
        
        foreach( $results2 as $rows ) {
            $diamond_id_list[] = $rows['lot'];
        }
        
        $diamond_lot_id = "('" . implode("', '", $diamond_id_list) . "')";
        
        $sql2 = "SELECT * FROM `dev_index_comp` WHERE `lot` IN $diamond_lot_id ORDER BY CAST(price as DECIMAL(15, 5)) ASC";
        //echo $sql2; exit;
        
        $query    = $this->db->query($sql2);
        $returns['results']  = $query->result_array();        
        $returns['total_rows'] = count($total_rows);
        
        return $returns;
    }
    //// jewelry list
    function getCollectionJewelryList($catid=3292598018, $start=0, $limit=4, $type='', $empty='', $sort_val='', $recent='') {
        $category_name = urldecode($catid);
        
        if( $category_name == 'Band' ) {
            $sql  = "SELECT *, ei.id AS items_id, ei.price item_price, ei.`price` AS net_price, ei.price FROM dev_ebay_items ei INNER JOIN dev_ebay_details ed ON ei.id = ed.pid WHERE 1 = 1";
        } else {
            $sql  = "SELECT *, ei.id AS items_id, ei.price item_price, ei.`price` + idex.`price` AS net_price, ei.price, idex.price AS diamond_price FROM dev_ebay_items ei INNER JOIN dev_ebay_details ed ON ei.id = ed.pid INNER JOIN dev_index_comp idex ON ed.diamond_lot_id = idex.lot WHERE 1 = 1";
        }
        //$sql  = "SELECT * FROM dev_ebay_items ei INNER JOIN dev_ebay_details ed ON ei.id = ed.pid WHERE 1 = 1";
        
        //$sql .= " AND ei.`erphd_view_set` = 'ERPHD_VIEW'";
        $sql .= " AND ei.`item_type` = 'ERPHD'";
        if( !empty($category_name) ) {
            $sql .= " AND ei.`category_id` IN (SELECT id FROM dev_ebayitems_cate WHERE id = '{$category_name}') OR ei.`category` = '{$category_name}'";
        }
        
//        if( !empty($recent) ) {
//         $sql .= " INNER JOIN dev_cart ct ON jw.stock_number = ct.lot WHERE ct.addoption = 'heart_diamond_collection' AND jw.category= '{$recent}' ";
//         $goup_by = " GROUP BY ct.lot";
//        } else {
//            $sql .= " WHERE 1 = 1";
//        }        
//        $sql .= " AND jw.have_img = 'Y'";
        
//        if( $catid != 'newarrivals' ) {
//            if( empty($type) ) {
//                 $sql .= " AND jw.category IN ( '{$catid}' )";
//            } else {
//                 $sql .= " AND jw.category IN ( '{$catid}', '3292605018' )";
//            }
//            $sql .= " OR jw.subcategory = '{$catid}' AND jw.have_img = 'Y'";
//        } else {
//            //$sql .= " AND have_img = 'Y'";
//        }
        
       $sort_list = array('ASC', 'DESC');
       
        if( !empty($sort_val) && in_array($sort_val, $sort_list) ) {
            $sql .= " ORDER BY net_price $sort_val";
        } else {
            $sql .= " ORDER BY ei.id DESC, ei.add_date DESC";
        }
        
        $querys    = $this->db->query($sql);
        $return['total']  = $querys->num_rows();
        $start_record = ( $start == 1 ? 0 : $start );
        if( !empty($limit) ) {
            $sql .= " LIMIT $start_record, $limit";
        }
        //echo $sql; exit;
        
        $query    = $this->db->query($sql);
        $return['results']  = $query->result_array();
        
        return $return;
    }
    
    function ebayitem_cate_row($id=0) {
        $sql = "SELECT * FROM dev_ebayitems_cate WHERE id = '{$id}'";
        $query    = $this->db->query($sql);
        $results  = $query->result_array();
        
        return $results[0];
    }
    
    function get_heart_marekt_idex_diamond($carat=0.25, $shape='B', $diamond_color='') {
        $sql = "SELECT lot, carat, Cert, price, color FROM `dev_index_comp` WHERE `carat` = {$carat} AND `shape` = '{$shape}' AND `Cert_n` != '' AND `Cert` = 'GIA' AND `price` > '0'";
        $not_allowed_color = array('amethist', 'color stone', 'white');
        
        if( !empty($diamond_color) ) {
            if( !in_array($diamond_color, $not_allowed_color) ) {
                $sql .= " AND `fcolor_value` LIKE '%{$diamond_color}%'";
            }            
        }        
        $sql .= " ORDER BY CAST(price as DECIMAL(10, 5)) ASC LIMIT 1";
        
        $query    = $this->db->query($sql);
        $results  = $query->result_array();
        
        return $results[0]['lot'];
    }
    
    function getCollectionJewListing($viewType='', $filter_id=0, $category='', $page = 1, $rp = 8, $sortname = 'id', $sortorder = 'desc', $query = '', $qtype = 'id', $oid = '') {
        $results = array();
	$qwhere = '';
        $category_name = urldecode($category);
        $filters_cols = $this->adminmodel->getSinglelooseSearch($filter_id);
        $filterView = unserialize($filters_cols['search_string']);
        $cert_string = setArrayImplodeStrin($filterView['cert'], 'ck');
        
        if( !empty($category_name) ) {
            $qwhere .= " AND category = '{$category_name}'";
        }
        if( $viewType === 'HD' ) {
            $qwhere .= " AND id IN (SELECT pid FROM dev_ebay_details WHERE embed_link != 'NULL')";
        } else if( $viewType === 'HDERING' ) {
            $qwhere .= " AND id IN (SELECT pid FROM dev_ebay_details WHERE `view_type` = 'HDERING')";
        } else if( $viewType === 'AMAZON' ) {
            $qwhere .= " AND `amazon_type` != ''";
        } else {
            $qwhere .= " AND `amazon_type` = '' AND id IN (SELECT pid FROM dev_ebay_details WHERE embed_link = 'NULL')";
        }
        if( $filter_id > 0 && !empty($cert_string) ) {
            $qwhere .= " AND id IN (SELECT pid FROM dev_ebay_details WHERE diamond_cert IN ($cert_string))";
        }
        
        $sort = "ORDER BY $sortname $sortorder";
        $start = $page;
        $limit = " LIMIT $start, $rp";
	   
	   if($query){
		$results['count'] = 1;
		mysql_query("RESET QUERY CACHE");
                    $result = mysql_query("SELECT * FROM `dev_ebay_items` WHERE `id`='".$query."'");
                    if(mysql_num_rows($result)){
                        $results['result'][]=mysql_fetch_array($result);
                    }
		return $results;
	   }
           
        $sql = 'SELECT  * FROM  dev_ebay_items where 1=1 ' . $qwhere . ' ' . $sort . ' ' . $limit; //echo $sql; exit;

        $result = $this->db->query($sql);
        $results['result'] = $result->result_array();
        $sql2 = 'SELECT id FROM  dev_ebay_items  where 1=1 ' . $qwhere;
        $result2 = $this->db->query($sql2);
        $results['count'] = $result2->num_rows();
        return $results;
    }
    
    function getCollectionItemListings($viewType='', $filter_id=0) {
        
	$qwhere = '';
        $filters_cols = $this->adminmodel->getSinglelooseSearch($filter_id);
        $filterView = unserialize($filters_cols['search_string']);
        $cert_string = setArrayImplodeStrin($filterView['cert'], 'ck');
        
        if( $viewType === 'HD' ) {
            $qwhere .= " AND id IN (SELECT pid FROM dev_ebay_details WHERE embed_link != 'NULL')";
        } else if( $viewType === 'HDERING' ) {
            $qwhere .= " AND id IN (SELECT pid FROM dev_ebay_details WHERE `view_type` = 'HDERING')";
        } else if( $viewType === 'AMAZON' ) {
            $qwhere .= " AND `amazon_type` != ''";
        } else {
            $qwhere .= " AND `amazon_type` = '' AND id IN (SELECT pid FROM dev_ebay_details WHERE embed_link = 'NULL')";
        }
        if( $filter_id > 0 && !empty($cert_string) ) {
            $qwhere .= " AND id IN (SELECT pid FROM dev_ebay_details WHERE diamond_cert IN ($cert_string))";
        }
        
        $sort = "ORDER BY id DESC";
           
        $sql = 'SELECT * FROM  dev_ebay_items where 1=1 ' . $qwhere . ' ' . $sort;

        $result = $this->db->query($sql);
        $results = $result->result_array();
        return $results;
    }
    
    /// get colection item imgs
    function get_item_imgs($product_id=0) {
        $sql = "SELECT `image` FROM dev_ebay_images WHERE pid = '{$product_id}'";
        $result = $this->db->query($sql);
	$results  = $result->result_array();
        
        return $results;
    }
    
    /// get colection item imgs
    function getItemDetailViaID($product_id=0) {
        $sql = "SELECT * FROM dev_ebay_items WHERE id = '{$product_id}'";
        $result = $this->db->query($sql);
	$results  = $result->result_array();
        
        return $results[0];
    }
    
    /// get colection item imgs
    function getEbayItemDetailsViaID($product_id=0, $search='') {
        $sql = "SELECT * FROM dev_ebay_items ei INNER JOIN dev_ebay_details ed ON ei.id = ed.pid WHERE 1 = 1";
        
        if( empty($search) ) {
            $sql .= " AND ed.`pid` = '{$product_id}'";
        } else {
            $sql .= " AND ed.`item_id` = '{$product_id}'";
        }
        //echo $sql; exit;
        
        $result = $this->db->query($sql);
	$results  = $result->result_array();
        
        return isset($results[0])?$results[0]:array();
    }
    
    /// get colection item imgs
    function updateJewelryItemPrice($product_id=0, $item_price=0) {
        $sql = "UPDATE dev_ebay_items set `ring_price` = '{$item_price}' WHERE id = '{$product_id}'";
        $this->db->query($sql);
    }
    
    /// get item new price
    function updateNewPrice($product_id=0, $item_price=0) {
        $sql = "UPDATE dev_ebay_items set `new_price` = '{$item_price}' WHERE id = '{$product_id}'";
        $this->db->query($sql);
    }
    
    /// get colection item imgs
    function getItemCategoryResults() {
        $sql = "SELECT category FROM dev_ebay_items GROUP BY category ORDER BY category";
        $result = $this->db->query($sql);
	$results  = $result->result_array();
        
        return $results;
    }
    
    /// get colection item imgs
    function getCenterDiamondFilterResults($gets='', $item_id=0, $item_shape='B', $itemPrice='', $itemCarat=0, $min_price=0, $max_price=0, $mincarat=0, $maxcarat=0) {
        $details = $this->getItemSpecification($item_id, 'dev_ebay_details');
        $clarity = explode(' ', trim($details['clarity']));
        //$cert = explode(' ', $details['certificate']);
        //$carat = str_replace('ct', '', $details['diamond_weight']);
        //$min_carat = $carat - 0.20;
        //$max_carat = $carat + 0.10;
        $new_min_carat   = $gets['new_min_carat'];
        $new_max_carat = $gets['new_max_carat'];
        $new_min_price = $gets['new_min_price'];
        $new_max_price = $gets['new_max_price'];
        
        $sql = "SELECT * FROM `dev_index_comp` WHERE 1 = 1";
        
        $query_condition = " AND `shape` = '{$item_shape}'";
        
        if( empty($new_max_carat) && empty($new_max_price) ) {
            $query_condition .= " AND `color` = '{$details['color']}' AND `clarity` = '{$clarity[0]}'";
        }
        
        if( $new_max_carat > 0 ) {
            $mins_carat = $new_min_carat - 0.10;
            $maxs_carat = $new_max_carat + 0.05;
            $query_condition .= " AND `carat` >= $mins_carat AND `carat` <= $maxs_carat";
            $order_by = " ORDER BY `carat` DESC";
        } else {
            if( !empty($itemCarat) && $itemCarat > 0  && $min_price <= 0 && $mincarat == 0 ) {
            $min_carat = $itemCarat - 0.10;
            $max_carat = $itemCarat + 0.05;
            $query_condition .= " AND `carat` >= $min_carat AND `carat` <= $max_carat";
            $order_by = " ORDER BY `carat` DESC";
            } else {
                if( $mincarat > 0 && $maxcarat > 0 ) {
                    $query_condition .= " AND `carat` >= $mincarat AND `carat` <= $maxcarat";
                }
                $order_by = " ORDER BY `price` DESC";
            }
        }
        
        $minPrice = ( $itemPrice / 2 );
        
        if( $new_min_price > 0 ) {
            $query_condition .= " AND `price` >= $new_min_price AND `price` <= ".$new_max_price;
        } else {
           if( $min_price > 0 ) {
                $query_condition .= " AND `price` >= " . trim($min_price) . " AND `price` <= ". trim($max_price);
            } else {
                $query_condition .= " AND `price` >= $minPrice AND `price` <= ".$itemPrice;
            } 
        }        
        
        $query_condition .= $this->applyDiamondCertCondition($details['diamond_cert'], $new_max_carat);
        
        $orderBy = $order_by;
                
        $sql_result = $sql . $query_condition . $orderBy;
        
        $result = $this->db->query($sql_result);
	$results  = $result->result_array();
        
        return $results;
    }
    
    function applyDiamondCertCondition($ring_cert='GIA', $new_maxcarat=0) {
        $eglCert = strchr($ring_cert, 'EGL');
        $query_condition = '';
        
        if( $new_maxcarat == 0 || empty($new_maxcarat) ) {
            if( $ring_cert === 'GIA' ) {
                $query_condition .= " AND `Cert` = 'GIA'";
            } else if( !empty($eglCert) ) {
                $query_condition .= " AND `Cert` = 'EGL USA'";
            }
        } else {
            $query_condition .= " AND `Cert` IN ('GIA', 'EGL USA')";
        }
        $query_condition .= " AND `Cert_n` != ''";
        
        return $query_condition;
    }
    
    function getItemCenterCarat() {
        $sql = "SELECT center_carat, center_carat - 0.10 AS centerCarat FROM dev_ebay_details WHERE center_carat != '' ORDER BY center_carat DESC LIMIT 1";
        $result = $this->db->query($sql);
	$results  = $result->result_array();
        
        return ( !empty($results[0]['centerCarat']) ? $results[0]['centerCarat'] : 0 );
    }
    /// get colection item imgs
    function getSimilarItemLists($item_id=0, $item_shape='B', $itemPrice='') {
        $details = $this->getItemSpecification($item_id, 'dev_ebay_details');
        $center_carat = $this->getItemCenterCarat();
        
        $clarity = explode(' ', trim($details['clarity']));
        //$cert = explode(' ', $details['certificate']);
        //$carat = str_replace('ct', '', $details['diamond_weight']);
        //$min_carat = $carat - 0.20;
        //$max_carat = $carat + 0.10;
        $carat_weight = ( $details['center_carat'] > 0 ? $details['center_carat'] : $center_carat );
        $carat_range = $carat_weight + 0.05;
        
        $sql = "SELECT * FROM `dev_index_comp` WHERE 1 = 1";
        
        $query_condition = " AND `shape` = '{$item_shape}' AND `color` = '{$details['color']}'  AND `clarity` = '{$clarity[0]}'";
        $query_condition .= $this->applyDiamondCertCondition($details['diamond_cert']);
        
        //$query_condition .= " AND `Cert` LIKE '%{$details['diamond_cert']}%'";
        
        //$query_condition .= " AND `price` > 0 AND `price` <= ".$itemPrice."";
        
//        $sql_max = "SELECT max(price) max_price FROM dev_index_comp WHERE 1 = 1" . $query_condition;
//        $result_max = $this->db->query($sql_max);
//	$results_max  = $result_max->result_array();
        //$maxPrice = ( $results_max[0]['max_price'] / 2 );
        $maxPrice = ( $itemPrice / 2 );
        
        if( $maxPrice > 0  && $itemPrice > 0 ) {
            $query_condition .= " AND `price` >= $maxPrice AND `price` <= ".$itemPrice;
        } else {
            $query_condition .= " AND `price` > 0";
        }      
        //$query_condition .= " AND `carat` >= '{$min_carat}' AND `carat` <= '{$max_carat}'";
        $orderBy = " AND `carat` <= '{$carat_range}' ORDER BY `carat` DESC LIMIT 20";
                
        $sql_result = $sql . $query_condition . $orderBy;
        
        
        
        //$carat_sql = " AND `carat` = '{$carat}'";
        //$carat_sql = " AND `carat` >= '{$min_carat}' AND `carat` <= '{$max_carat}'";
        
        //$sql_query = $sql . $carat_sql;
        //$sql .= " AND `Cert` IN ('GIA', 'EGL', 'AGS')";
        
        //echo $sql_result; exit;
        
        $result = $this->db->query($sql_result);
	$results  = $result->result_array();
        
//        if( count($results) > 0 ) {
//            $returns['results'] = $results;
//            $returns['found'] = '';
//        } else {
//            $min_carat = $carat - 0.5;
//            $max_carat = $carat + 0.5;
//            $carats_sql = " AND `carat` >= '{$min_carat}' AND `carat` <= '{$max_carat}'";
//            $carat_query = $sql . $carats_sql;
//            $carat_result   = $this->db->query($carat_query);
//            $carat_results  = $carat_result->result_array();
//            $returns['results'] = $carat_results;
//            $returns['found'] = 'not_found';
//        
//        }
        
        return $results;
    }
    
    function updateTotalCaratInProductName($item_id=0, $new_total_carat=0) {
        
        $itemdetail = $this->getItemDetailViaID($item_id);
        $ebay_details = $this->getItemSpecification($item_id, 'dev_ebay_details');
        $diamond_weight = ( $ebay_details['newdiamond_weight'] > 0 ? $ebay_details['newdiamond_weight'] : $ebay_details['diamond_weight'] );
        $product_name = str_replace($diamond_weight, $new_total_carat, $itemdetail['product_name']);
        
        return $product_name;
    }
    
    function updateItemDMInfo($item_id=0, $diamond_id=0) {
        $details = $this->getIndexDiamondDetail($diamond_id);
        $ebay_details = $this->getItemSpecification($item_id, 'dev_ebay_details');
        $new_total_carat = $details['carat'] + $ebay_details['side_carat'];
        $product_name = $this->updateTotalCaratInProductName($item_id, $new_total_carat);
        
        //file_put_contents('prod_name.txt', $ebay_details['diamond_weight']. '=total=' . $new_total_carat.'=' . $product_name);
        
        $prod_name = explode('(', $product_name);
        
        if( !empty($prod_name[1]) ) {
            if( !empty($details['Cert_n']) ) {
                $products_name = str_replace($prod_name[1], $details['Cert_n'].')', $product_name);
            } else {
                $products_name = $product_name;
            }
        } else {
            $products_name = $product_name;
        }
        
        $this->db->query("UPDATE dev_ebay_items set `product_name` = '{$products_name}' WHERE id = '{$item_id}'");  
        
        $item_cert = $details['Cert_n'] . ' by ' . $details['Cert'];
        
        //$sql = "UPDATE dev_ebay_details set `item_id` = '{$details['lot']}', `certificate` = '{$item_cert}' WHERE pid = '{$item_id}'";
        $sql = "UPDATE dev_ebay_details set `diamond_lot_id` = '{$details['lot']}', `newdiamond_weight` = '{$new_total_carat}', `new_center_carat` = '{$details['carat']}'";
        
        if( !empty($details['Cert_n']) ) {
            $sql .= ", `index_diamond_cert` = '{$item_cert}'";
        }
        $sql .= " WHERE pid = '{$item_id}'";
        
        $this->db->query($sql);
        
    }
    
    /// get colection item imgs
    function getIndexDiamondDetail($d_id=0, $field='uid') {
        $sql = "SELECT * FROM dev_index_comp WHERE $field = '{$d_id}' LIMIT 1";
        $result = $this->db->query($sql);
	$results  = $result->result_array();
        
        return $results[0];
    }
    
/// get colection item imgs
    function updateJewelryItemEmbedLink($item_id=0, $embedLink='') {
        $sql = "UPDATE dev_ebay_items SET embed_link = '{$embedLink}' WHERE id = '{$item_id}'";
        
        $this->db->query($sql);
    }
    
    function updateJewItemCarat($item_id=0, $centerCarat='', $sideCarat='') {
        $new_total_carat = $centerCarat + $sideCarat;
        $product_name = $this->updateTotalCaratInProductName($item_id, $new_total_carat);
        
        $this->db->query("UPDATE dev_ebay_items set `product_name` = '{$product_name}' WHERE id = '{$item_id}'");
        
        $sql = "UPDATE dev_ebay_details SET new_center_carat = '{$centerCarat}', side_carat = '{$sideCarat}', newdiamond_weight = '{$new_total_carat}' WHERE pid = '{$item_id}'";
        
        $this->db->query($sql);
    }
    
    //// update the radom_item_id column with unique random numbers in dev_ebay_details table
    function update_item_detail_itemid() {
        $result = $this->db->query("SELECT id FROM dev_ebay_details ORDER BY id ASC");
	$results  = $result->result_array();
        
        foreach( $results as $row ) {
            $rand_numb = 'caljewelers' . rand(1111, 9999);
            
            //$this->db->query("UPDATE dev_ebay_details SET random_item_id = '{$rand_numb}' WHERE id = '{$row['id']}'");
        }
        
        return true;
    }
    
    function getItemEbayDetailResult() {
        $query   = $this->db->query("SELECT * FROM dev_ebay_details ORDER BY id ASC");
	$results = $query->result_array();
        
        return $results;
    }
    
    function updateItemProductName($prodID='', $itemName='') {
        
        $this->db->query("UPDATE dev_ebay_items SET product_name = '{$itemName}' WHERE id = '{$prodID}'");
        
    }
    
    ////// upload item photo gallery
    function uploadItemPhotoGallery($lists_id=array()) {
     
        array_filter($lists_id);
        if( count($lists_id) > 0) {
        $file_up['message'] = 'Success';
        foreach($lists_id as $list_id) {
            if( !empty($list_id)) {
                $list_id = trim($list_id);
                $rt = $this->addItemImageRow($list_id);   ///// insert new shapes row if not inserted
                for($f=1; $f<=6; $f++) {
                    //$uploaded_file = 'ebay_img'.$f;
                    $fieldsName = 'eb'.$f.'_'.$list_id;
                    
                    if( !empty($_FILES[$fieldsName]['name']) ) {
                        $fieldsName    = 'eb'.$f.'_'.$list_id;
                        $uploaded_file = 'ebay_img'.$f;
                        $file_up['page'] = 'photogallery';
                    } 
                        else 
                    {
                        $fieldsName    = 'amazon'.$f.'_'.$list_id;  //// input file name
                        $uploaded_file = 'amazon_img'.$f; //// db column name
                        $file_up['page'] = 'amazongallery';
                    }
                    
                    //echo $_FILES[$fieldsName]['name'].'<br>';exit;
           ////// upload shapes img    
           $this->adminmodel->uploadfile($_FILES, $fieldsName, 'images/market_pictures', 'jpeg,gif,jpg,bmp,png', 'images/market_pictures', 'ebimge', 'ebay_more_images', 'item_id', $list_id, $uploaded_file);
                }
            }
        }
    } else {
      $file_up['message'] = 'Plz checked the checkbox to upload file';      
    }
        return $file_up;
      //$this->uploadfile($_FILES, 'eb2_26210', 'images/pictures', 'jpeg,gif,jpg,bmp,png', 'images/pictures', 'ebimge', 'rappimages', 'diamond_id', $value, 'ebay_img2');  
    }
    
    ///// add rap image data
    function addItemImageRow($id=0) {
        $slq = $this->db->query("SELECT id FROM dev_ebay_more_images WHERE item_id = '".$id."'");
        $count_img = $slq->num_rows();
        
        if($count_img == 0) {
           $this->db->query("INSERT INTO `dev_ebay_more_images` (`item_id`) VALUES ('".$id."')");
        }
        return true;
    }
    
///// add rap image data
    function getMoreItemImgList($id=0) {
        $query   = $this->db->query("SELECT * FROM dev_ebay_more_images WHERE item_id = '{$id}'");
        $results = $query->result_array();
        
        return $results[0];
    }
}       
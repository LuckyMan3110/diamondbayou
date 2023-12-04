<?php
/**
* model class used for displaying jewelleries entered by the sellers...
* @param string
* @return string
* @since 24, Feb 2017
* @Author Muhammad Safdar
*/
class Jcartwfashionmodel extends CI_Model{
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
    
    /// get colection item imgs
    function get_item_imgs($product_id=0) {
        $sql = "SELECT `image` FROM dev_ebay_images WHERE pid = '{$product_id}'";
        $result = $this->db->query($sql);
	$results  = $result->result_array();
        
        return $results;
    }
    
    function getStullerItemRows($viewType='', $filter_id=0, $category='', $page = 0, $rp = 8, $sortname = 'productID', $sortorder = 'desc', $query = '', $qtype = 'productID', $oid = '') {
/*        $results = array();
	    $qwhere = '';
        $category_id = urldecode($category);
        //$filters_cols = $this->adminmodel->getSinglelooseSearch($filter_id);
        //$filterView = unserialize($filters_cols['search_string']);
        //$cert_string = setArrayImplodeStrin($filterView['cert'], 'ck');
        
        if( !empty($category_id) ) {
            $qwhere .= " AND `category_id` = '{$category_id}'";
        }
        
        $sort = "ORDER BY $sortname $sortorder";
        $start = $page;
        $limit = " LIMIT $start, $rp";
	   
	   if($query){
		$results['count'] = 1;
		mysql_query("RESET QUERY CACHE");
                    $result = mysql_query("SELECT * FROM `dev_stuller_fashionjew` WHERE `id`='".$query."'");
                    if(mysql_num_rows($result)){
                        $results['result'][]=mysql_fetch_array($result);
                    }
		return $results;
	   }
           
        $sql = 'SELECT * FROM `dev_stuller_fashionjew` where 1 = 1 ' . $qwhere . ' ' . $sort . ' ' . $limit;

        $result = $this->db->query($sql);
        $results['result'] = $result->result_array();
        $sql2 = 'SELECT `id` FROM `dev_stuller_fashionjew` where 1 = 1 ' . $qwhere;
        $result2 = $this->db->query($sql2);
        $results['count'] = $result2->num_rows();
        return $results;*/
        
        $results = array();

        $sort = "ORDER BY $sortname $sortorder";

        $start = (($page - 1) * $rp);

        // $rp=100;
        $limit = "LIMIT $start, $rp";
        $qwhere = "";
        if ($query)
            $qwhere .= " AND $qtype LIKE '%$query%' ";
        if ($oid != '')
            $qwhere .= " AND id = $oid";
            
        if( !empty($category) ) {
            $category2 =  str_replace("%20", " ", $category);
            $qwhere .= " AND `brand` = '{$category2}'";
        }


        $sql = 'SELECT  * FROM  ' . $this->config->item('table_perfix') . 'watches where 1=1 ' . $qwhere . ' ' . $sort . ' ' . $limit;
        //var_dump($sql); exit();
        $result = $this->db->query($sql);
        $results['result'] = $result->result_array();
        $sql2 = 'SELECT productID FROM  ' . $this->config->item('table_perfix') . 'watches where 1=1 ' . $qwhere;
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
        } else if( $viewType === 'ERPHD' ) {
            $qwhere .= " AND `item_type` = 'ERPHD'";
        } else {
            $qwhere .= " AND `amazon_type` = '' AND id IN (SELECT pid FROM dev_ebay_details WHERE embed_link = 'NULL')";
        }
        if( $filter_id == 'Band' ) {
            $qwhere .= " AND `category` = 'Band'";
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
    
    /// update market id values according to the market
    function updateMarketID($id=0, $field_name='ebay_field', $field_value=0) {
        
        $this->db->query( "UPDATE `dev_ebay_items` set  $field_name = '{$field_value}' WHERE id = '{$id}'" );
    }
    
    /// get colection item imgs
    function getStullerItemDetailViaID($product_id=0) {
        $sql = "SELECT * FROM `dev_watches` WHERE productID = '{$product_id}'";
        $result = $this->db->query($sql);
	$results  = $result->result_array();
        
        return $results[0];
    }
    
    /// get colection item imgs
    function getItemColsValue($product_id=0, $column_name='idex_fw') {
        $sql = "SELECT $column_name FROM dev_ebay_items WHERE id = '{$product_id}'";
        $result = $this->db->query($sql);
	$results  = $result->result_array();
        
        return $results[0][$column_name];
    }
    
    /// get colection item imgs
    function updateJewelryItemPrice($product_id=0, $item_price=0) {
        $sql = "UPDATE dev_ebay_items set `ring_price` = '{$item_price}' WHERE id = '{$product_id}'";
        $this->db->query($sql);
    }
    
    /// get item new price
    function updateNewPrice($product_id=0, $item_price=0, $field='new_price') {
        $sql = "UPDATE dev_ebay_items set `$field` = '{$item_price}' WHERE id = '{$product_id}'";
        $this->db->query($sql);
    }
    
    /// get colection item imgs
    function getStullerCategoryResults() {
        $sql = "SELECT * FROM `dev_stuller_fashion_cate` ORDER BY `category_name` ASC";
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
    
    function getIdexCenterStoneDiamond($item_id=0, $item_shape='B', $cert='GIA') {
        $details = $this->getItemSpecification($item_id, 'dev_ebay_details');
        $item_row = $this->getItemDetailViaID($item_id);
        $clarity = explode(' ', trim($details['clarity']));
        $center_stone = trim($details['center_stone_size']);        
        $total_diam_weight = trim($details['total_carat_weight']);
        $carats_range = explode('-', $center_stone);
        $min_carat = set_carat_value($carats_range[0]); // item jewelry section helper
        $max_carat = set_carat_value($carats_range[1]); // item jewelry section helper
        $color_values = array('color stone');
        
        $sql = "SELECT * FROM `dev_index_comp` WHERE 1 = 1 AND `shape` = '{$item_shape}'";
        
        if( !empty($details['color']) ) {
            $sql .= " AND `color` = '{$details['color']}'";
        }            
        if( !empty($details['clarity']) ) {
            $sql .= " AND `clarity` = '{$clarity[0]}'";
        }
        if( !empty($center_stone) && $min_carat > 0 ) {
            $sql .= " AND `carat` >= '{$min_carat}' AND `carat` <= '{$max_carat}'";
        } else {
            if( !empty($total_diam_weight) ) {
                $sql .= " AND `carat` <= '{$total_diam_weight}'";
            }            
        }
        
        if( !empty($item_row['idex_fw']) && !in_array($item_row['idex_fw'], $color_values)) {
            $sql .= " AND `fcolor_value` = '{$item_row['idex_fw']}'";
        }
        
        $sql .= " AND `Cert` LIKE '%{$cert}%' ";
        $sql .= " ORDER BY `carat` ASC LIMIT 1"; //echo $sql; exit;
        
        $query    = $this->db->query($sql);
	$results  = $query->result_array();
        
        return $results[0];
    }
    /// update center idex diamond in item jewelry
    function updateIdexCenterDiamondToItem($item_id=0, $item_shape='B') {
        $item_idex = $this->getItemColsValue($item_id);
        $details = $this->getIdexCenterStoneDiamond($item_id, $item_shape, 'GIA');
        
        if( count($details) > 0 ) {
            $diamond_detail = $details;
        } else {
            $diamond_detail = $this->getIdexCenterStoneDiamond($item_id, $item_shape, 'EGL');
        }
        //print_ar($diamond_detail);
        
        if( $item_idex != 'color stone' ) {
            if( count($diamond_detail) > 0 ) {
                $this->updateItemDMInfo($item_id, $diamond_detail['uid']);
            } else {
               return 'Center Diamond <br>is not found!';
            }
        } else {
            return 'color stone <br>is not <br>correct value.';
        }
        
        
        //$this->updateItemDMInfo($item_id, $diamond_detail['uid']);
        
    }
    
    /// get colection item imgs
    function getCenterDiamondFilterResults($gets='', $item_id=0, $item_shape='B', $itemPrice='', $itemCarat=0, $min_price=0, $max_price=0, $mincarat=0, $maxcarat=0) {
        $details = $this->getItemSpecification($item_id, 'dev_ebay_details');
        $clarity = explode(' ', trim($details['clarity']));
        $carats_range = explode('-', trim($details['center_stone_size']));
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
            if( !empty($details['color']) ) {
                $query_condition .= " AND `color` = '{$details['color']}'";
            }            
            if( !empty($details['clarity']) ) {
                $query_condition .= " AND `clarity` = '{$clarity[0]}'";
            }            
        }
        
        if( $carats_range[0] > 0 ) {
            $query_condition .= " AND `carat` >= '{$carats_range[0]}' AND `carat` <= '{$carats_range[1]}'";
            $order_by = " ORDER BY `carat` DESC";
        } else if( $new_max_carat > 0 ) {
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
        
        $orderBy = $order_by . ' LIMIT 0, 500';
                
        $sql_result = $sql . $query_condition . $orderBy; //echo $sql_result; exit;
        
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
        
        if( !empty($itemPrice) && $itemPrice > 0 ) {
            $query_condition .= " AND `price` >= $maxPrice AND `price` <= ".$itemPrice;
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
        
        if( !empty($ebay_details['center_stone_size']) ) {
            $this->db->query("UPDATE dev_ebay_items set `product_name` = '{$products_name}' WHERE id = '{$item_id}'");
            $item_cert = $details['Cert_n'] . ' by ' . $details['Cert'];
        
            //$sql = "UPDATE dev_ebay_details set `item_id` = '{$details['lot']}', `certificate` = '{$item_cert}' WHERE pid = '{$item_id}'";
            $sql = "UPDATE dev_ebay_details set `diamond_lot_id` = '{$details['lot']}', `newdiamond_weight` = '{$new_total_carat}', `new_center_carat` = '{$details['carat']}'";
            if( !empty($details['Cert_n']) ) {
                $sql .= ", `index_diamond_cert` = '{$item_cert}'";
            }
            
        } else {
            $sql = "UPDATE dev_ebay_details set `diamond_lot_id` = ''";
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
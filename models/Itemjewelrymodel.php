<?php
class Itemjewelrymodel extends CI_Model{
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

	/* function getCollectionJewListing($category='', $page = 1, $rp = 8, $sortname = 'id', $sortorder = 'desc', $query = '', $qtype = 'id', $oid = '') { */
	function getCollectionJewListing($viewType='', $filter_id=0, $category='', $page = 0, $rp = 8, $sortname = 'id', $sortorder = 'desc', $query = '', $qtype = 'id', $oid = '') {
		$results = array();
		$qwhere = '';
		$category_name = urldecode($category);

		if( !empty($category_name) ) {
			$qwhere .= " AND category = '{$category_name}'";
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

		$sql = 'SELECT  * FROM  dev_ebay_items where 1=1 ' . $qwhere . ' ' . $sort . ' ' . $limit;
		$result = $this->db->query($sql);
		$results['result'] = $result->result_array();
		$sql2 = 'SELECT id FROM  dev_ebay_items  where 1=1 ' . $qwhere;
		$result2 = $this->db->query($sql2);
		$results['count'] = $result2->num_rows();

        return $results;
	}

	function getMoreItemImgList($id=0) {
        $query   = $this->db->query("SELECT * FROM dev_ebay_more_images WHERE item_id = '{$id}'");
        $results = $query->result_array();
        
        return $results[0];
    }

	/* get colection item imgs */
	function get_item_imgs($product_id=0) {
		$sql = "SELECT `image` FROM dev_ebay_images WHERE pid = '{$product_id}'";
		$result = $this->db->query($sql);
		$results  = $result->result_array();

		return $results;
	}

	/* get colection item imgs */
	function getItemDetailViaID($product_id=0) {
		$sql = "SELECT * FROM dev_ebay_items WHERE id = '{$product_id}'";
		$result = $this->db->query($sql);
		$results  = $result->result_array();

		return $results[0];
	}

	/* get colection item imgs */
	function updateJewelryItemPrice($product_id=0, $item_price=0) {
		$sql = "UPDATE dev_ebay_items set `ring_price` = '{$item_price}' WHERE id = '{$product_id}'";
		$this->db->query($sql);
	}

	/* get colection item imgs */
	function getItemCategoryResults() {
		$sql = "SELECT category FROM dev_ebay_items GROUP BY category ORDER BY category";
		$result = $this->db->query($sql);
		$results  = $result->result_array();

		return $results;
	}

	/* get colection item imgs */
	function getCenterDiamondFilterResults($item_id=0, $item_shape='B', $itemPrice='', $itemCarat=0) {
		$details = $this->getItemSpecification($item_id, 'dev_ebay_details');
		$clarity = explode(' ', trim($details['clarity']));
		$sql = "SELECT * FROM `dev_index_comp` WHERE 1 = 1";
		$query_condition = " AND `shape` = '{$item_shape}' AND `color` = '{$details['color']}' AND `clarity` = '{$clarity[0]}'";
		if( !empty($itemCarat) && $itemCarat > 0 ) {
			$min_carat = $itemCarat - 0.10;
			$max_carat = $itemCarat + 0.05;
			$query_condition .= " AND `carat` >= $min_carat AND `carat` <= $max_carat";
			$order_by = " ORDER BY `carat` DESC";
		} else {
			$order_by = " ORDER BY `price` DESC";
		}
        
		$minPrice = ( $itemPrice / 2 );
		$query_condition .= " AND `price` >= $minPrice AND `price` <= ".$itemPrice;
		$orderBy = $order_by;
		$sql_result = $sql . $query_condition . $orderBy;
		$result = $this->db->query($sql_result);
		$results  = $result->result_array();

        return $results;
	}

	function getItemCenterCarat() {
		$sql = "SELECT center_carat, center_carat - 0.10 AS centerCarat FROM dev_ebay_details WHERE center_carat != '' ORDER BY center_carat DESC LIMIT 1";
		$result = $this->db->query($sql);
		$results  = $result->result_array();

		return ( !empty($results[0]['centerCarat']) ? $results[0]['centerCarat'] : 0 );
	}

	/* get colection item imgs */
    /* function getSimilarItemLists($item_id=0, $item_shape='B', $itemPrice='') {
		$details = $this->getItemSpecification($item_id, 'dev_ebay_details');
		$center_carat = $this->getItemCenterCarat();

		$clarity = explode(' ', trim($details['clarity']));
		$carat_weight = ( $details['center_carat'] > 0 ? $details['center_carat'] : $center_carat );
		$carat_range = $carat_weight + 0.05;

		$sql = "SELECT * FROM `dev_index_comp` WHERE 1 = 1";
		$query_condition = " AND `shape` = '{$item_shape}' AND `color` = '{$details['color']}' AND `clarity` = '{$clarity[0]}'";
		$maxPrice = ( $itemPrice / 2 );
		$query_condition .= " AND `price` >= $maxPrice AND `price` <= ".$itemPrice;
		$orderBy = " AND `carat` <= '{$carat_range}' ORDER BY `carat` DESC LIMIT 20";
		$sql_result = $sql . $query_condition . $orderBy;
		$result = $this->db->query($sql_result);
		$results  = $result->result_array();

		return $results;
    } */

	function getSimilarItemLists($item_id=0, $item_shape='B', $itemPrice='') {
		$details = $this->getItemSpecification($item_id, 'dev_ebay_details');
		$center_carat = $this->getItemCenterCarat();
		$clarity = explode(' ', trim($details['clarity']));
        $carat_weight = ( $details['center_carat'] > 0 ? $details['center_carat'] : $center_carat );
        $carat_range = $carat_weight + 0.05;

        $sql = "SELECT * FROM `dev_index_comp` WHERE 1 = 1";
        $query_condition = " AND `shape` = '{$item_shape}' AND `color` = '{$details['color']}'  AND `clarity` = '{$clarity[0]}'";
        $query_condition .= $this->applyDiamondCertCondition($details['diamond_cert']);
        $maxPrice = ( $itemPrice / 2 );
        if( !empty($itemPrice) && $itemPrice > 0 ) {
            $query_condition .= " AND `price` >= $maxPrice AND `price` <= ".$itemPrice;
        }
		$orderBy = " AND `carat` <= '{$carat_range}' ORDER BY `carat` DESC LIMIT 20";
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

	function updateItemDMInfo($item_id=0, $diamond_id=0) {
		$details = $this->getIndexDiamondDetail($diamond_id);
		$item_cert = $details['Cert_n'] . ' by ' . $details['Cert'];

		$sql = "UPDATE dev_ebay_details set `item_id` = '{$details['lot']}', `certificate` = '{$item_cert}' WHERE pid = '{$item_id}'";

		$this->db->query($sql);
	}

	/* get index diamond detials row */
	function getIndexDiamondDetail($d_id=0, $field='uid') {
		$sql = "SELECT * FROM dev_index_comp WHERE $field = '{$d_id}' LIMIT 1";
		$result = $this->db->query($sql);
		$results  = $result->result_array();

		return $results[0];
	}

	/* get colection item imgs */
	function updateJewelryItemEmbedLink($item_id=0, $embedLink='') {
		$sql = "UPDATE dev_ebay_items SET embed_link = '{$embedLink}' WHERE id = '{$item_id}'";
		$this->db->query($sql);
	}

	function updateJewItemCarat($item_id=0, $centerCarat='', $sideCarat='') {
		$sql = "UPDATE dev_ebay_details SET center_carat = '{$centerCarat}', side_carat = '{$sideCarat}' WHERE pid = '{$item_id}'";
		$this->db->query($sql);
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

        $item_id_list = $this->getHeartItemIDRows();
        $qwhere .= " AND `id` IN $item_id_list";
        $sort = "ORDER BY id ASC";
        $sql = 'SELECT * FROM  dev_ebay_items where 1=1 ' . $qwhere . ' ' . $sort;
        $result = $this->db->query($sql);
        $results = $result->result_array();

        return $results;
    }

	function getHeartItemIDRows($cate_id='') {
		$sql = "SELECT * FROM `dev_ebay_items` WHERE `item_type` = 'ERPHD'";
		$query    = $this->db->query($sql);
		$results  = $query->result_array();

		$item_result = array();
		foreach( $results as $rows ) {
			$item_detail = $this->getItemSpecification($rows['id'], 'dev_ebay_details');
			$item_shape = getItemDiamondShape($rows['category'], $rows['global_fields']);
			$total_diamond = $this->updateIdexCenterDiamondToItem($rows['id'], $item_shape, $item_detail['total_carat_updated'], 'count');
			$allowed_type_option = array('missing_diamonds', 'missing_imgs');
            if( in_array($cate_id, $allowed_type_option)){
				if(($total_diamond == 0 && !empty($item_detail['center_stone_size'])) && $item_detail['diamond_lot_id'] == 0){
					$item_result[] = $rows['id'];
                }                    
            } else {
                if($item_detail['diamond_lot_id'] != 0){
					$item_result[] = $rows['id'];
                }                    
            }                
        }
        $item_set_id = "('" . implode("', '", $item_result) . "')";

        return $item_set_id;
    }

	function updateIdexCenterDiamondToItem($item_id=0, $item_shape='', $total_updated_carat='Y', $total_count='') {
		$item_idex = $this->getItemColsValue($item_id);
		$item_details = $this->getItemSpecification($item_id, 'dev_ebay_details');
		$details = $this->getIdexCenterStoneDiamond($item_id, $item_shape, 'GIA');
		$diamond_colors = array('black', 'Blue', 'brown', 'Chameleon', 'Champagne', 'Cognac', 'Gray', 'green', 'Orange', 'Other', 'Pink', 'pink', 'Red', 'white', 'yellow');
		if( count($details) > 0 ) {
			$diamond_detail = $details;
		} else {
			$diamond_detail = $this->getIdexCenterStoneDiamond($item_id, $item_shape, 'EGL');
		}
		$check_diamond = '';
		$return_msg = '<div class="text-center">';
		$total_diamond_found = 0;
        $other_mesage = '';
        if( empty($item_details['center_stone_size']) ) {
            $other_mesage .= '<b>Center Stone <br>Range is not <br>available</b><br></div>';
        }
        if( empty($item_shape) ) {
            $other_mesage .= '<b>Center Diamond <br>Shape is not <br>available</b><br></div>';
        }
        
        if( $item_idex != 'color stone' ) {
            if( count($diamond_detail) > 0 ) {
                $this->updateItemDMInfo($item_id, $diamond_detail['uid']);
                $check_diamond = 'found';
                $total_diamond_found = 1;
            } else {
               $return_msg .= 'Center Diamond <br>is not found!';
               $total_diamond_found = 0;
            }
        } else {
            if( !in_array($item_idex, $diamond_colors) || empty($item_idex) ) {
                $return_msg .= '<b>Item Color <br>'.$item_idex.' is <br>not available</b><br>';
            } else {
                $return_msg .= 'Color Stone <br>is not <br>available';
            }            
            $total_diamond_found = 0;
        }
        $return_msg .= '</div>';
        if( empty($check_diamond) || $total_updated_carat == 'N' ) {
        }

        if( !empty($total_count) ) {
            return count($diamond_detail); //$total_diamond_found;
        } else {
            if( !empty($other_mesage) ) {
                return $other_mesage;
            } else {
                return $return_msg;
            }
        }
    }

	/* get colection item imgs */
    function getItemColsValue($product_id=0, $column_name='idex_fw') {
		$sql = "SELECT $column_name FROM dev_ebay_items WHERE id = '{$product_id}'";
		$result = $this->db->query($sql);
		$results  = $result->result_array();

		return $results[0][$column_name];
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
		$color_values = array('color stone', '');

		$sql = "SELECT * FROM `dev_index_comp` WHERE 1 = 1 AND `shape` = '{$item_shape}'";
        if( !empty($details['color']) ) {
            $sql .= " AND `color` = '{$details['color']}'";
        }            
        if( !empty($details['clarity']) ) {
            $sql .= " AND `clarity` = '{$clarity[0]}'";
        }
        if( !empty($total_diam_weight) && $details['total_carat_updated'] == 'N' && empty($center_stone) ) {
                $sql .= " AND `carat` <= $total_diam_weight";
        } else {
            if( !empty($center_stone) && $min_carat > 0 && $max_carat > 0 ) {
                $sql .= " AND `carat` >= $min_carat AND `carat` <= $max_carat";
            }
        }
        if( !empty($item_row['idex_fw']) && !in_array($item_row['idex_fw'], $color_values)) {
            if( $item_row['idex_fw'] == 'white' || empty($item_row['idex_fw']) ) {
                $sql .= " AND `fcolor_value` = '' AND `color` IN ('D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z')";
            } else {
                $sql .= " AND `fcolor_value` = '{$item_row['idex_fw']}'";
            }            
        }

        $sql .= " AND `Cert` LIKE '%{$cert}%' AND `price` > 0";
        $sql .= " ORDER BY `carat` ASC LIMIT 1";
        $query    = $this->db->query($sql);
		$results  = $query->result_array();

        return $results[0];
    }

}       
<?php 
class Ringmodel extends CI_Model {
    function __construct(){
        parent::__construct();
    }

	function getDetailsByLot($lot){
		$sql = "SELECT * FROM ".config_item('table_perfix')."index WHERE 1=1 AND lot LIKE '{$lot}' OR Stock_n LIKE '{$lot}' ORDER BY lot DESC LIMIT 1";
		$query = $this->db->query($sql);
		$results = $query->result_array();

		return isset($results[0]) ? $results[0] : false;
	}

	function getNewSimilarDiamonds($rowrepnet) {
		$field = explode('x', $rowrepnet['Meas']);
		$width  = $field[0] - 0.10;
		$width1 = $field[0] + 0.10;
		$height  = $field[1] - 0.10;
		$height1 = $field[1] + 0.10;
		$maxcarat = explode('.', $rowrepnet['carat']);
		$maxim_carat = $maxcarat[0].'.99';

		$minmeas = _nf($width,2).' x '._nf($height,2).' x '.$field[2];
		$maxmeas = _nf($width1,2).' x '._nf($height1,2).' x '.$field[2];
		$dmcolor = colorClarityValues($rowrepnet['color']);
		$dmclarity = colorClarityValues($rowrepnet['clarity'], 'clarity');
        if($rowrepnet['fcolor_value']){
            $qry = "SELECT * FROM ".config_item('table_perfix')."index WHERE lot != '".$rowrepnet['lot']."' AND fcolor_value = '".$rowrepnet['fcolor_value']."' AND shape = '".$rowrepnet['shape']."' AND Cert = '".$rowrepnet['Cert']."' AND carat BETWEEN '".$rowrepnet['carat']."' AND '".$maxim_carat."' AND Meas BETWEEN '".$minmeas."' AND '".$maxmeas."'";
        }else{
            $qry = "SELECT * FROM ".config_item('table_perfix')."index WHERE lot != '".$rowrepnet['lot']."' AND shape = '".$rowrepnet['shape']."' AND carat = '".$rowrepnet['carat']."' AND color = '".$rowrepnet['color']."' AND clarity = '".$rowrepnet['clarity']."' AND Cert = '".$rowrepnet['Cert']."'";
        }
		$qry .= " ORDER BY lot DESC LIMIT 6";
		$result = 	$this->db->query($qry);
		$return = $result->result_array();

		return $return;
	}

	function getSternCollectionDetail($product_id=0, $metal='', $search='') {
        $sql = "SELECT * FROM dev_jewelries_new WHERE 1 = 1";
        if( !empty($search) ) {
            $sql .= " AND item_sku LIKE '{$product_id}'";
        } else {
            $sql .= " AND stock_number = '{$product_id}'";
        }
        $query    = $this->db->query($sql);
        $results  = $query->result_array();

        return isset($results[0])?$results[0]:array();
    }

	function getSternCollectionDetail360Item($style=0, $metal_type='', $quality='', $carat_item='', $ring_size='',  $gender='', $diamond_size = '', $chain_weight, $avail_size) {
        $sql      = "SELECT * FROM dev_jewelries_new WHERE 1 = 1";
        if( !empty($style) ) {
            $sql .= " AND subcategory = '{$style}'";
        }
        if( !empty($metal_type)) {
            $sql .= " AND metal_type = '{$metal_type}'";
        }
        if( !empty($quality) ) {
            $sql .= " AND quality = '{$quality}'";
        }
        if( !empty($ring_size) ) {
            $sql .= " AND ring_size = '{$ring_size}'";
        }
        if( !empty($carat_item) ) {
            $sql .= " AND center_stone_sizes = '{$carat_item}'";
        }
        if( !empty($gender) ) {
            $sql .= " AND gender = '{$gender}'";
        }
        if( !empty($diamond_size) ) {
            $sql .= " AND diamond_size = '{$diamond_size}'";
        }
        if( !empty($chain_weight) ) {
            $sql .= " AND chain_weight = '{$chain_weight}'";
        }
        if( !empty($avail_size) ) {
            $sql .= " AND avail_size = '{$avail_size}'";
        }
        $sql    .= ' GROUP BY ring_style_bk';
        $query    = $this->db->query($sql);
        $results  = $query->result_array();

        return isset($results[0])?$results[0]:array();
    }

	function getSternDistinctCollectionDetail360Item($subcategory='', $center_stone_sizes='', $quality='', $gender='', $diamond_size='', $chain_weight='', $ring_size) {
        $sql = "SELECT DISTINCT(metal_type) FROM dev_jewelries_new WHERE 1 = 1";
        if( !empty($subcategory) ) { $sql .= " AND subcategory = '{$subcategory}'"; }
        if( !empty($gender) ) { $sql .= " AND gender = '{$gender}'"; }
        $sql    .= ' GROUP BY ring_style_bk';
        $query    = $this->db->query($sql);
        $results  = $query->result_array();

        return $results;
    }

	function get_ebay_cat_name($cid=0) {
        $sql = "SELECT category_name FROM dev_ebaycategories WHERE category_id = '{$cid}' ORDER BY cat_id DESC LIMIT 1";
        $sqlrings = $this->db->query($sql);
        $return   = $sqlrings->result_array();
        return isset($return[0]['category_name'])?$return[0]['category_name']:'';
    }

	function colectionSimilarProduct($cid=0, $product_id=0, $limit=4) {
        $sql      = "SELECT * FROM dev_jewelries_new WHERE stock_number != '{$product_id}' AND category = '{$cid}' AND have_img = 'Y' ORDER BY RAND() LIMIT $limit";
        $query    = $this->db->query($sql);
        $results  = $query->result_array();

        return $results;
    }

	function get_jewelry_new_similler_list($catid='', $subcatid='', $start=0, $limit=4, $type='', $empty='', $sort_val='', $recent='') {
		$sql  = "SELECT *, jw.price_website AS ring_price FROM dev_jewelries_new jw";
		$goup_by = '';
		if( !empty($recent) ) {
			$sql .= " INNER JOIN dev_cart ct ON jw.stock_number = ct.lot WHERE ct.addoption = 'heart_diamond_collection' ";
			$goup_by = " GROUP BY ct.lot";
		} else {
			$sql .= " WHERE 1 = 1";
		}
		if( !empty($catid) ) {
			$sql .= " AND jw.category IN ( '{$catid}' )";
			$sql .= " AND jw.subcategory IN ( '{$subcatid}' )";
		}
		$sort = 'ASC';
		if( !empty($empty) && $catid != 'newarrivals' ) {
			$sql .= " AND jw.image1 != ''";
			$sort = 'ASC';
		}
		$sort_list = array('ASC', 'DESC');
		$sql .= $goup_by;
		if( !empty($sort_val) && in_array($sort_val, $sort_list) ) {
			$sql .= " ORDER BY jw.g14_wh_price $sort_val, jw.price $sort_val";
		} else {
			$sql .= " ORDER BY jw.stock_number DESC, jw.add_date DESC";
		}
        $querys    = $this->db->query($sql);
        $return['total']  = $querys->num_rows();
        $start_record = ( $start == 1 ? 0 : $start );
        if( !empty($limit) ) {
            $sql .= " LIMIT $start_record, $limit";
        }
        $query    = $this->db->query($sql);
        $return['results']  = $query->result_array();
        return $return;
    }

	function getMetalRingWeight($id) {
		$sqlmetal = "SELECT id, catid, metal_weight FROM `dev_us` WHERE `name` LIKE '%".$id."%'";
		$resultemetal = $this->db->query($sqlmetal);
		$armetal = $resultemetal->result_array();

		return $armetal[0];
	}

	function getRingThumbs( $itemNumber='' ) {
		$sqlthumb = "SELECT ImagePath, ImagePathThumb FROM images WHERE ItemNumber LIKE '%".trim($itemNumber)."' GROUP BY ImagePath";
		$resulthumb = $this->db->query($sqlthumb);
		$arthumb = $resulthumb->result_array();

		return $arthumb;
	}

	function sternProductDetail($id=0, $cid=0, $search='') {
		$sql = "SELECT * FROM dev_overnight ov INNER JOIN dev_overnight_temp tp ON ov.id = tp.product_id WHERE 1 = 1";
		if( $cid > 0 ) {
			$sql .= " AND category_id = '{$cid}'";
		} else {
			if( !empty($search) ) {
				$sql .= " AND item_id = '" . urldecode( trim( $id ) ) . "'";
			} else {
				$sql .= " AND id = '{$id}'";
			}
		}
        $sql .= " AND ov.stone_breakdown != 'No stones'";
        $sql .= " ORDER BY gold_polished_1300 ASC LIMIT 1";
        $prod    = $this->db->query($sql);
        $results = $prod->result_array();

        return isset($results[0])?$results[0]:array();
    }
}
?>
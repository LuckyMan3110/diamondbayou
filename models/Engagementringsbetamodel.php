<?php 
class Engagementringsbetamodel extends CI_Model {
    function __construct(){
        parent::__construct();
        $this->load->helper('ringsection');
    }

	function getengagedringData($table_name, $where, $wherein1, $wherein2, $wherein3, $wherein4, $wherein5, $wherein6, $wherein7, $wherein8, $wherein9, $limit, $offset, $order, $field){
		$sql = 'SELECT * FROM '.$table_name.' WHERE ';
		$i = 0;
		foreach($where as $key=>$value){
			if($i == 0){
				$sql .= $key.' '.$value;
			}else{
				$sql .= ' AND '.$key.' '.$value;
			}
			$i++;
		}
		if(empty($wherein1) && empty($wherein2) && empty($wherein3) && empty($wherein4) && empty($wherein5) && empty($wherein6) && empty($wherein7) && empty($wherein8) && empty($wherein9)){
			$sql .= ' AND status = 1 ';
		}else{
			$sql .= ' AND status = 1 AND (';
			if(!empty($wherein1)){
				$sql .= ' OR category IN (\''.implode("','",$wherein1).'\')';
			}
			if(!empty($wherein2)){
				$sql .= ' OR stone_shape IN (\''.implode("','",$wherein2).'\')';
			}
			if(!empty($wherein3)){
				$sql .= ' OR color IN (\''.implode("','",$wherein3).'\')';
			}
			if(!empty($wherein4)){
				$sql .= ' OR clarity IN (\''.implode("','",$wherein4).'\')';
			}
			if(!empty($wherein5)){
				$sql .= ' OR ring_size IN (\''.implode("','",$wherein5).'\')';
			}
			if(!empty($wherein6)){
				$sql .= ' OR setting IN (\''.implode("','",$wherein6).'\')';
			}
			if(!empty($wherein7)){
				$sql .= ' OR setting_style IN (\''.implode("','",$wherein7).'\')';
			}
			if(!empty($wherein8)){
				$sql .= ' OR metal IN (\''.implode("','",$wherein8).'\')';
			}
			if(!empty($wherein9)){
				$sql .= ' OR diamond_weight IN (\''.implode("','",$wherein9).'\')';
			}
			$sql .= ')';
		}
		$sql .= ' ORDER BY '.$order.'';
		$sql .= ' LIMIT '.$offset.','.$limit.'';
		$qfinal = str_replace("AND ( OR","AND (",$sql);
		$result = $this->db->query($qfinal);
		return $results = $result->result_array();
	}

	function countengagedring($where, $wherein1, $wherein2, $wherein3, $wherein4, $wherein5, $wherein6, $wherein7, $wherein8, $wherein9, $table_name, $field){
		$sql = 'SELECT DISTINCT('.$field.' ) FROM '.$table_name.' WHERE ';
		$i = 0;
		foreach($where as $key=>$value){
			if($i == 0){
				$sql .= $key.' '.$value;
			}else{
				$sql .= ' AND '.$key.' '.$value;
			}
			$i++;
		}
		if(empty($wherein1) && empty($wherein2) && empty($wherein3) && empty($wherein4) && empty($wherein5) && empty($wherein6) && empty($wherein7) && empty($wherein8) && empty($wherein9)){
			$sql .= ' AND status = 1 ';
		}else{
			$sql .= ' AND status = 1 AND (';
			if(!empty($wherein1)){
				$sql .= ' OR category IN (\''.implode("','",$wherein1).'\')';
			}
			if(!empty($wherein2)){
				$sql .= ' OR stone_shape IN (\''.implode("','",$wherein2).'\')';
			}
			if(!empty($wherein3)){
				$sql .= ' OR color IN (\''.implode("','",$wherein3).'\')';
			}
			if(!empty($wherein4)){
				$sql .= ' OR clarity IN (\''.implode("','",$wherein4).'\')';
			}
			if(!empty($wherein5)){
				$sql .= ' OR ring_size IN (\''.implode("','",$wherein5).'\')';
			}
			if(!empty($wherein6)){
				$sql .= ' OR setting IN (\''.implode("','",$wherein6).'\')';
			}
			if(!empty($wherein7)){
				$sql .= ' OR setting_style IN (\''.implode("','",$wherein7).'\')';
			}
			if(!empty($wherein8)){
				$sql .= ' OR metal IN (\''.implode("','",$wherein8).'\')';
			}
			if(!empty($wherein9)){
				$sql .= ' OR diamond_weight IN (\''.implode("','",$wherein9).'\')';
			}
			$sql .= ')';
		}
		$qfinal = str_replace("AND ( OR","AND (",$sql);
		$result = $this->db->query($qfinal);
		return $result->num_rows();
	}

	function checkRingType($pid) {
		$sql = "SELECT costar_id,overnight_id,dev_us_id,stuller_id FROM `dev_engagement_rings` WHERE id = '".$pid."'";        
		$query = $this->db->query($sql);
		$results = $query->row();
       // echo $this->db->last_query();
		return $results;
	}

	function getEzOptionValues() {
        $sql = "SELECT ezvalue FROM ezpayvalue WHERE 1 = 1 ORDER BY id ASC";
        $result  = $this->db->query($sql);
        $content = $result->result_array();

        return $content;
    }

	function getFingerSizeResult() {
		$sql = "SELECT `id`, `ring_size`, `priceRetail` FROM `dev_fingersize_temp` ORDER BY `ring_size_value` ASC";        
		$query = $this->db->query($sql);
		$results = $query->result_array();

		return $results;
	}

	function getRingsDetails($ringid, $rgmetal='', $ring_sze='', $search='') {
		$sqlrgsize = "SELECT * FROM `dev_engagement_rings` WHERE `id` = '".$ringid."'";
		$resultergsize = $this->db->query($sqlrgsize);
		$results = $resultergsize->result_array();
		$itemNumber = trim($results[0]['name']);

		/// get ring metal
		$sqlmetal = "SELECT matalType FROM dev_us_prices WHERE productId = '".$itemNumber."' GROUP BY matalType ORDER BY matalType ASC";
		$resultemetal = $this->db->query($sqlmetal);
		$armetal = $resultemetal->result_array();

		$rngMetal = ( !empty($rgmetal) ? $rgmetal : $armetal[0]['matalType'] );
		//// rings sizes according to the metal
		$sqlrgsize = "SELECT `ringSize`, `priceRetail` FROM `dev_us_prices` WHERE `productId` = '".$itemNumber."' AND matalType = '".$rngMetal."'";
		$resultergsize = $this->db->query($sqlrgsize);
		$aringsize = $resultergsize->result_array();

		$parentCate_ar = array( 
			'ringsMetal'=>$armetal,
			'ringsSizes'=>$aringsize
		);
		$ringsDetail = array_merge($results,$parentCate_ar);

		return $ringsDetail;
	}
	function inventory_pric_margin($categoryid=0, $option='') {
		$sql = "SELECT max_percent FROM dev_inventoryprices where category_id = '{$categoryid}' AND manufacture_type = '{$option}' ORDER BY id DESC LIMIT 1";
		$result  = $this->db->query($sql);
		$content = $result->result_array();
		$price_margin = (isset($content[0]['max_percent']) && $content[0]['max_percent'] > 0 ? $content[0]['max_percent'] : 0 );
		$price_margin1 = 1 + ( $price_margin / 100 );

		return $price_margin1;
	}

	function getMetalRingWeight($id) {
		$sqlmetal = "SELECT id, catid, metal_weight FROM `dev_us` WHERE `name` LIKE '%".$id."%'";
		$resultemetal = $this->db->query($sqlmetal);
		$armetal = $resultemetal->result_array();

		return $armetal[0];
	}
    function get_unique_cate_id($pid=0) {
		$rsring = $this->db->query( "SELECT catid FROM dev_us WHERE id = '{$pid}' ORDER BY id DESC LIMIT 1" );
		$result = $rsring->result_array();

		return $result[0]['catid'];
	}
	///// get rings img
	function getRingsImgViaId($style_id='') {
		$response = '';
		if($style_id != '') {
			$sql = "SELECT `ImagePath` FROM `images` WHERE `ItemNumber` = '".trim($style_id)."' LIMIT 1,1";
			$result = $this->db->query($sql);	
			$response = $result->result_array();						
		}
		return $response[0];	
	}
	///// get parent cate ID by its sub cate
	function getparentCateID($id) {
		$sql = "SELECT pid FROM dev_us_catagories WHERE id = '".$id."' ORDER BY id DESC LIMIT 1";
		$result = $this->db->query($sql);	
		$row = $result->result_array();	
		if(isset($row[0]['pid'])){
			return $row[0]['pid'];
		}else{
			return false;
		}
	}
	 ///// get category name
	function getRingCategoryName($id) {
		$sql = "SELECT catname FROM dev_us_catagories WHERE id = '".$id."' ORDER BY id DESC LIMIT 1";
		$result = $this->db->query($sql);	
		$row = $result->result_array();	

		if($row[0]){
			return $row[0]['catname'];
		}else{
			return '';
		}
    }
	//// get category parent ID
	function getCategoryParentId($cid) {
		$cate1 = $this->getparentCateID($cid);
		$cate2 = $this->getparentCateID($cate1);
		$cate3 = $this->getparentCateID($cate2);
		$cate4 = $this->getparentCateID($cate3);
		$cate5 = $this->getparentCateID($cate4);
		$cate_id = $cate1;

		if($cate5 == '' || $cate5 == 0) {
			$cate_id = $cate4;
			if($cate4 == '' || $cate4 == 0) {
				$cate_id = $cate3;
				if($cate3 == '' || $cate3 == 0) {
					$cate_id = $cate2;
					if($cate2 == '' || $cate2 == 0) {
						$cate_id = $cate1;
					}
				}
			}
		}

		return trim($cate_id);
	}

	function getRingsDetailViaId($ringid, $rgmetal='', $ring_sze='', $search='') {
		$product_cid = $this->get_unique_cate_id( $ringid );   // get product category id according to the product id
		$priceMargin = $this->inventory_pric_margin($product_cid, UNIQUE_OPTION);

		$sqlring = "SELECT *, ud.id ring_id, ur.priceRetail AS priceRetail  FROM dev_us AS ud INNER JOIN dev_us_prices AS ur ON ud.`name` = ur.productId WHERE 1 = 1";

		if( !empty($search) ) {
			$sqlring .= " AND ud.style_group = '{$ringid}' OR ud.name = '{$ringid}'";
			$order_by = " ud.name ASC";
		} else {
			$sqlring .= " AND ud.id = '{$ringid}'";
			$order_by = " ud.id DESC";
		}

		$getRingSize = resetRingSize($ring_sze);
		if( !empty($rgmetal) ) {
			$sqlring .= " AND ur.matalType LIKE '%".$rgmetal."%'";
		}
		if( !empty($getRingSize) ) {
			$sqlring .= " AND ur.ringSize IN ('".$getRingSize."')";
		}

		$sqlring .= " GROUP BY ur.productId ORDER BY $order_by LIMIT 1";
		$rsring = $this->db->query($sqlring);
		$resut = $rsring->result_array();
		$results = $resut[0];
		$itemNumber = trim($results['name']);
       
		//// rings thumbs
		$sqlthumb = "SELECT ImagePath, ImagePathThumb FROM images WHERE ItemNumber LIKE '%".$itemNumber."'";
		$resulthumb = $this->db->query($sqlthumb);
		$arthumb = $resulthumb->result_array();

		/// get ring metal
		$sqlmetal = "SELECT matalType FROM dev_us_prices WHERE productId = '".$itemNumber."' GROUP BY matalType ORDER BY matalType ASC";
		$resultemetal = $this->db->query($sqlmetal);
		$armetal = $resultemetal->result_array();

		$rngMetal = ( !empty($rgmetal) ? $rgmetal : $armetal[0]['matalType'] );
		//// rings sizes according to the metal
		$sqlrgsize = "SELECT `ringSize`, `priceRetail` FROM `dev_us_prices` WHERE `productId` = '".$itemNumber."' AND matalType = '".$rngMetal."'";
		$resultergsize = $this->db->query($sqlrgsize);
		$aringsize = $resultergsize->result_array();

		$ringsImage = $this->getRingsImgViaId($results['name']);
		$parentCate = $this->getCategoryParentId($results['catid']);
		$category_name = $this->getRingCategoryName($results['catid']);
		$parent_cate   = $this->getRingCategoryName($parentCate);
		$categorys_name = ( !empty($category_name) ? $category_name : '' );
		$parents_cate = ( !empty($parent_cate) ? $parent_cate : '' );
		$rings_image = ( !empty($ringsImage) ? $ringsImage : array() );

		$parentCate_ar = array( 
			'pcate_id'=>$parentCate,
			'category_name'=>$categorys_name,
			'parent_cate'=>$parents_cate, 
			'item_thumbs'=>$arthumb,
			'ringsMetal'=>$armetal,
			'ringsSizes'=>$aringsize
		);
		$ringsDetail = array_merge($results,$parentCate_ar,$rings_image);
 
		return $ringsDetail;
	}

	function getStarCollectionDetailViaId($ringid){
		$sqlring = "SELECT p.*, p.id as ring_id, i.id as iId, i.*, sc.name as subcategory_name, c.id as category_id, c.name as category_name, ur.final_price*1.5 as priceRetail, co.metal_type as matalType, co.metal_color, co.finish_option, co.quality FROM us_product p LEFT JOIN us_item_basic i ON p.id = i.id LEFT JOIN us_sub_category sc ON p.id_sub_category = sc.id LEFT JOIN us_category c ON sc.id_cat = c.id LEFT JOIN us_price AS ur ON p.`id` = ur.id_item LEFT JOIN us_configuration AS co ON ur.id_config = co.id WHERE p.id = '".$ringid."'";
		if((isset($_GET['metal_type']) && !empty($_GET['metal_type'])) || (isset($_GET['metal_color']) && !empty($_GET['metal_color'])) || (isset($_GET['metal_finished']) && !empty($_GET['metal_finished'])) || (isset($_GET['metal_quality']) && !empty($_GET['metal_quality']))){
			if(!empty($_GET['metal_type'])){
				$sqlring .= " AND co.metal_type LIKE '".$_GET['metal_type']."'";
			}
			if(!empty($_GET['metal_color'])){
				$sqlring .= " AND co.metal_color LIKE '".$_GET['metal_color']."'";
			}
			if(!empty($_GET['metal_finished'])){
				$sqlring .= " AND co.finish_option LIKE '".$_GET['metal_finished']."'";
			}
			if(!empty($_GET['metal_quality'])){
				$sqlring .= " AND co.quality LIKE '".$_GET['metal_quality']."'";
			}
		}else{
			$sqlring .= " AND ur.id_config = 3";
		}
		$rsring = $this->db->query($sqlring);
		$resut = $rsring->result_array();
		$results = $resut[0];
		$itemNumber = trim($results['product']);

		$sqlthumb = "SELECT ImagePath FROM us_images WHERE ItemNumber LIKE '".$itemNumber."'";
		$resulthumb = $this->db->query($sqlthumb);
		$arthumb = $resulthumb->result_array();

		$ringsImage = $this->getStarCollectionImgViaId($results['product']);
		$rings_image = ( !empty($ringsImage) ? $ringsImage : array() );

		$sqlcolor = "SELECT metal_color FROM us_configuration GROUP BY metal_color ORDER BY id ASC";
		$resultcolor = $this->db->query($sqlcolor);
		$arcolor = $resultcolor->result_array();

		$sqlquality = "SELECT quality FROM us_configuration GROUP BY quality ORDER BY id ASC";
		$resultquality = $this->db->query($sqlquality);
		$arquality = $resultquality->result_array();

		$parentCate_ar = array( 
			'pcate_id' => $results['category_id'],
			'category_name' => $results['subcategory_name'],
			'parent_cate' => $results['category_name'], 
			'item_thumbs' => $arthumb,
			'ringsColor' => $arcolor,
			'ringsQuality' => $arquality,
			'ringsSizes' => 6
		);
		$ringsDetail = array_merge($results,$parentCate_ar,$rings_image);

		return $ringsDetail;
	}

	function getStarCollectionImgViaId($style_id='') {
		$response = '';
		if($style_id != '') {
			$sql = "SELECT `ImagePath` FROM `us_images` WHERE `ItemNumber` LIKE '".trim($style_id)."' LIMIT 1,1";
			$result = $this->db->query($sql);
			$response = $result->result_array();
		}
		return $response[0];
	}

	function getRingThumbs( $itemNumber='' ) {
		$sqlthumb = "SELECT ImagePath, ImagePathThumb FROM images WHERE ItemNumber LIKE '%".trim($itemNumber)."' GROUP BY ImagePath";
		$resulthumb = $this->db->query($sqlthumb);
		$arthumb = $resulthumb->result_array();

		return $arthumb;
	}

	function getRingVariants($column_name,$item_number,$categry,$subCat){
		if($column_name == 'metal_color'){
			$sqlmetal = "SELECT * FROM `dev_overnight_variant` WHERE (category LIKE '".$categry."' OR subcategory LIKE '".$categry."') AND `product_id` LIKE '".$item_number."' AND `metal_color` NOT LIKE 'Pink' AND `metal_color` NOT LIKE 'Null' GROUP BY metal_color ORDER BY metal_color DESC";
		}elseif($column_name == 'finish_level'){
			$sqlmetal = "SELECT * FROM `dev_overnight_variant` WHERE (category LIKE '".$categry."' OR subcategory LIKE '".$categry."') AND `product_id` LIKE '".$item_number."' AND `finish_level` NOT LIKE 'Polished Blank (no stones)' AND `finish_level` NOT LIKE 'Null' GROUP BY finish_level ORDER BY finish_level DESC";
		}elseif($column_name == 'metal_type'){
			$sqlmetal = "SELECT * FROM `dev_overnight_variant` WHERE (category LIKE '".$categry."' OR subcategory LIKE '".$categry."') AND `product_id` LIKE '".$item_number."' AND `metal_type` NOT LIKE 'Palladium' AND `metal_type` NOT LIKE 'Silver' AND `metal_type` NOT LIKE 'Null' GROUP BY metal_type ORDER BY metal_type ASC";
		}elseif($column_name != 'diamond_quality'){
			$sqlmetal = "SELECT ".$column_name." FROM `dev_overnight_variant` WHERE (category LIKE '".$categry."' OR subcategory LIKE '".$categry."') AND `product_id` LIKE '".$item_number."' AND `".$column_name."` NOT LIKE 'Null' GROUP BY ".$column_name."";
		}else{
			$sqlmetal = "SELECT * FROM `dev_overnight_variant` WHERE (category LIKE '".$categry."' OR subcategory LIKE '".$categry."') AND `product_id` LIKE '".$item_number."' AND `".$column_name."` NOT LIKE 'Null' GROUP BY ".$column_name." ORDER BY ".$column_name." DESC";
		}
		$resultemetal = $this->db->query($sqlmetal);
		$armetal = $resultemetal->result_array();
		return $armetal;
	}

}
?>
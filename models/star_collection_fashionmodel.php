<?php
class Star_collection_fashionmodel extends CI_Model{
    function __construct(){
		parent::__construct();
    }

	function getStarCollectionCategoryResults(){
		$sql = "SELECT * FROM `us_category` ORDER BY `sort_order` ASC";
        $result = $this->db->query($sql);
		$results  = $result->result_array();

		return $results;
    }

	function getSubCategory($cat_id){
		$sql = "SELECT * FROM `us_sub_category` WHERE id_cat = '".$cat_id."' ORDER BY `name` ASC";
        $result = $this->db->query($sql);
		$results  = $result->result_array();

		return $results;
    }

	function getStarCollectionItemRows($viewType='', $filter_id=0, $category='', $page = 0, $rp = 8, $sortname = 'p.name', $sortorder = 'desc', $query = '', $qtype = 'p.id', $sub_cate_id = '') {
        $results = array();
		$sqlring = "SELECT p.*, p.id as ring_id, i.id as iId, i.*, sc.name as subcategory_name, c.id as catid, c.name as category_name, ur.final_price as priceRetail, co.metal_type as matalType, co.metal_color, co.finish_option, co.quality FROM us_product p LEFT JOIN us_item_basic i ON p.id = i.id LEFT JOIN us_sub_category sc ON p.id_sub_category = sc.id LEFT JOIN us_category c ON sc.id_cat = c.id LEFT JOIN us_price AS ur ON p.`id` = ur.id_item LEFT JOIN us_configuration AS co ON ur.id_config = co.id WHERE 1 = 1";
		if($query){
			$sqlring .= " AND $qtype LIKE '%$query%'";
        }
        if(!empty($category) && !empty($sub_cate_id)){
            $sqlring .= " AND `p.id_sub_category` = '{$sub_cate_id}'";
        }else{
            if( !empty($category) ) {
                $sqlring .= " AND `sc.id_cat` = '{$category}'";
            }  
        }
		$sqlring .= " AND ur.id_config = 3";
		$sqlring .= " ORDER BY $sortname $sortorder";
		$start = (($page - 1) * $rp);
		$sqlring .= " LIMIT $start, $rp";
		$rsring = $this->db->query($sqlring);
		$results['result'] = $rsring->result_array();
		
		$sql2 = "SELECT p.id as ring_id FROM us_product p LEFT JOIN us_item_basic i ON p.id = i.id LEFT JOIN us_sub_category sc ON p.id_sub_category = sc.id LEFT JOIN us_category c ON sc.id_cat = c.id LEFT JOIN us_price AS ur ON p.`id` = ur.id_item LEFT JOIN us_configuration AS co ON ur.id_config = co.id WHERE 1 = 1";
		if($query){
			$sql2 .= " AND $qtype LIKE '%$query%'";
        }
        if(!empty($category) && !empty($sub_cate_id)){
            $sql2 .= " AND `p.id_sub_category` = '{$sub_cate_id}'";
        }else{
            if( !empty($category) ) {
                $sql2 .= " AND `sc.id_cat` = '{$category}'";
            }  
        }
		$sql2 .= " AND ur.id_config = 3";
		$result2 = $this->db->query($sql2);
		$results['count'] = $result2->num_rows();

		return $results;
    }

	function getStarCollectionDetailViaId($ringid){
		$sqlring = "SELECT p.*, p.id as ring_id, i.id as iId, i.*, sc.name as subcategory_name, c.id as catid, c.name as category_name, ur.final_price as priceRetail, co.metal_type as matalType, co.metal_color, co.finish_option, co.quality FROM us_product p LEFT JOIN us_item_basic i ON p.id = i.id LEFT JOIN us_sub_category sc ON p.id_sub_category = sc.id LEFT JOIN us_category c ON sc.id_cat = c.id LEFT JOIN us_price AS ur ON p.`id` = ur.id_item LEFT JOIN us_configuration AS co ON ur.id_config = co.id WHERE p.id = '".$ringid."'";
		$sqlring .= " AND ur.id_config = 3";
		$rsring = $this->db->query($sqlring);
		$resut = $rsring->result_array();
		$results = $resut[0];
		$itemNumber = trim($results['product']);

		$sqlthumb = "SELECT ImagePath FROM us_images WHERE ItemNumber LIKE '".$itemNumber."'";
		$resulthumb = $this->db->query($sqlthumb);
		$arthumb = $resulthumb->result_array();

		$ringsImage = $this->getStarCollectionImgViaId($results['name']);
		$rings_image = ( !empty($ringsImage) ? $ringsImage : array() );

		$sqlmetal = "SELECT metal_type FROM us_configuration GROUP BY metal_type ORDER BY id ASC";
		$resultemetal = $this->db->query($sqlmetal);
		$armetal = $resultemetal->result_array();

		$parentCate_ar = array( 
			'pcate_id' => $results['category_id'],
			'category_name' => $results['subcategory_name'],
			'parent_cate' => $results['category_name'], 
			'item_thumbs' => $arthumb,
			'ringsMetal' => $armetal,
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
		return $response;
	}

	function getMoreItemImgList($id=0) {
        $query   = $this->db->query("SELECT * FROM us_images WHERE ItemNumber LIKE '{$id}'");
        $results = $query->result_array();

        return $results;
    }

}
<?php 
 class Categorymodel extends CI_Model {
 	
 	function __construct(){
 		parent::__construct();
 	}
 	
 	function getCategoryName($categoryid){
 		 
 		$qry = "SELECT * FROM ".config_item('table_perfix')."category 
 				WHERE id = '".$categoryid."' 
 				";	
 		
		$return = 	$this->db->query($qry);
		$result = $return->result_array();	
		return isset($result[0]) ? $result[0] : false;
 	}
 	
	function getAllByStock($stockno){
 		$qry = "SELECT * FROM ".config_item('table_perfix')."category 
 				WHERE id = '".$stockno."'  				
				";
		$return = 	$this->db->query($qry);
		$result = $return->result_array();	
		return isset($result[0]) ? $result[0] : false;
 	}

	function getProductsByCategoryID($categoryid){
 		$qry = "SELECT * FROM ".config_item('table_perfix')."new_product 
 				WHERE categoryid = '".$categoryid."' ORDER BY price 				
				";
		$result = 	$this->db->query($qry);
		$return = $result->result_array();
		return isset($return) ? $return : false;
 	}

	function getProductsByCategoryIDPaging($start = 0 , $rp =20,  $categoryid){

		$results = array();
		     
		$limit = "LIMIT $start, $rp";
		$qwhere = " AND categoryid = $categoryid" ;

		$sql = 'SELECT  * FROM  '. $this->config->item('table_perfix').'new_product where 1=1 '. $qwhere . ' order by price desc '. $limit;
	//var_dump($sql); 
	//	exit(0);
	 	$result = $this->db->query($sql);
		$results['result']  = $result->result_array();	
		$sql2 = 'SELECT  * FROM  '. $this->config->item('table_perfix').'new_product  where 1=1 '. $qwhere;
		$result2 = $this->db->query($sql2);
    	$results['count']  = $result2->num_rows();
 		
		//var_dump($results); 
		//exit(0);
    	return $results;

 		
 	}
	
	function getEarringSettingsByMetal($metal, $categoryId) {
		 $qry = "SELECT distinct(setting) AS setting 
					FROM ".config_item('table_perfix')."new_product 
					WHERE categoryid = '".$categoryId."' AND metal = '".$metal."' AND setting != ''
					ORDER BY id";
			$return = 	$this->db->query($qry);
			$result = $return->result_array();	
			//var_dump($result);
			return isset($result) ? $result : false;

	}
	
	function getBlackDiamondStuds($metal, $style, $categoryId) {
		  $qry = "SELECT *
					FROM ".config_item('table_perfix')."new_product 
					WHERE categoryid = '".$categoryId."' AND metal = '".$metal."' AND setting = '$style'
					ORDER BY id";
			$return = 	$this->db->query($qry);
			$result = $return->result_array();	
			//var_dump($result);
			return isset($result) ? $result : false;

	}

	function getBlackNecklace($metal, $categoryId) {
		  $qry = "SELECT *
					FROM ".config_item('table_perfix')."new_product 
					WHERE categoryid = '".$categoryId."' AND metal = '".$metal."'
					ORDER BY id";
			$return = 	$this->db->query($qry);
			$result = $return->result_array();	
			//var_dump($result);
			return isset($result) ? $result : false;

	}

	function getCaratMargrita($categoryId) {
		 $qry = "SELECT distinct(total_weight) AS carat 
					FROM ".config_item('table_perfix')."new_product 
					WHERE categoryid = '".$categoryId."'
					ORDER BY id";
			$return = 	$this->db->query($qry);
			$result = $return->result_array();	
			//var_dump($result);
			return isset($result) ? $result : false;

	}

	function getMargritaStuds($categoryid, $total_weight, $clarity, $color) {
		$qry = "SELECT *  
					FROM ".config_item('table_perfix')."new_product 
					WHERE categoryid = '".$categoryid."' AND  total_weight ='$total_weight' 
					AND clarity = '$clarity' AND color = '$color'
					ORDER BY id";
			$return = 	$this->db->query($qry);
			$result = $return->result_array();	
			//var_dump($result);
			return isset($result) ? $result : false;

	}
	function getByProductID($productid) {
		
		$qry = "SELECT *  
					FROM ".config_item('table_perfix')."new_product 
					WHERE id = '".$productid."'";

		$return = 	$this->db->query($qry);
		$result = $return->result_array();	
		//var_dump($result);
		return isset($result) ? $result[0] : false;

	}
	function getParentCategory($catArray) {
		
		if($catArray['parentid'] == 0) {
			return $catArray['category_name'];
		} else {
			$qry = "SELECT *  
					FROM ".config_item('table_perfix')."category 
					WHERE id = '".$catArray[parentid]."'";

			$return = 	$this->db->query($qry);
			$result = $return->result_array();	
			if($result[0][parentid] == '0') {
				return $result[0]['category_name'];
			} else {
				$this->getParentCategory($result[0]);
			}
		

		}
	}

	function getFeaturedClearanceProducts($start = 0 , $rp =20,  $categoryid, $isFeatured){

		$results = array();
		     
		$limit = "LIMIT $start, $rp";
		
		if($isFeatured) {
			$qwhere = " AND is_featured = 1" ;
		} else {
			$qwhere = " AND is_on_clearance = 1" ;
		}

		$sql = 'SELECT  * FROM  '. $this->config->item('table_perfix').'new_product where 1=1 '. $qwhere . ' order by price desc '. $limit;
		
	//var_dump($sql); 
	//	exit(0);
	 	$result = $this->db->query($sql);
		$results['result']  = $result->result_array();	
		$sql2 = 'SELECT  * FROM  '. $this->config->item('table_perfix').'new_product  where 1=1 '. $qwhere;
		$result2 = $this->db->query($sql2);
    	$results['count']  = $result2->num_rows();
 		
		//var_dump($results); 
		//exit(0);
    	return $results;

 		
 	}

 }


?>
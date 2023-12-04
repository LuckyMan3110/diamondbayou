<?php  
class Catemodel extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	/* dev_engagement_rings */
	function getSearchResultForEngagementRings($search_field='',$diamond_weight='',$greaterThan_price='',$lessThan_price='',$stone_shape='',$style='',$limit,$offset,$sortby) {
		$sql = "SELECT id,image,costar_id,image_path,overnight_id,dev_us_id,name,price,description,item_number FROM dev_engagement_rings WHERE 1 = 1";
		if(empty($style)){
		$sql .= " AND (item_number LIKE '%{$search_field}%' OR category LIKE '%{$search_field}%' OR sub_category LIKE '%{$search_field}%' OR name LIKE '%{$search_field}%' OR metal LIKE '%{$search_field}%' OR stone_shape LIKE '%{$search_field}%' OR stone LIKE '%{$search_field}%' OR description LIKE '%{$search_field}%') ";
		}
		if(!empty($diamond_weight)){
			foreach($diamond_weight as $carat){
				$sql .= " AND (diamond_weight != ''";
				if($carat == '1'){
					$sql .= " OR `diamond_weight` BETWEEN '0.25' AND '1.00'";
				}elseif($carat == '2.00'){
					$sql .= " OR `diamond_weight` BETWEEN '1.01' AND '2.00'";
				}elseif($carat == '3.00'){
					$sql .= " OR `diamond_weight` BETWEEN '2.01' AND '3.00'";
				}elseif($carat == '4.00'){
					$sql .= " OR `diamond_weight` BETWEEN '3.01' AND '4.00'";
				}elseif($carat == '5.00'){
					$sql .= " OR `diamond_weight` BETWEEN '4.01' AND '5.00'";
				}else{
					$sql .= " OR `diamond_weight` BETWEEN '5.01' AND '11.00'";
				}
				$sql .= ")";
			}
		}
		if($greaterThan_price!='' && $lessThan_price!=''){
		$sql .= " AND (price > {$greaterThan_price} AND price < {$lessThan_price})";
		}
		if(!empty($stone_shape)){
		$sql .= " AND (stone_shape IN('". implode("','",$stone_shape)."'))";
		}
		$sql .= " ORDER BY RAND()";
		$sql .= ' LIMIT '.$offset.','.$limit.'';
		//echo $sql;
		$rsring = $this->db->query($sql);
		$results = $rsring->result_array();

		return $results;
	}

	function countSearchResultForEngagementRings($search_field='',$diamond_weight='',$greaterThan_price='',$lessThan_price='',$stone_shape='',$style='') {
		$sql = "SELECT id FROM dev_engagement_rings WHERE 1 = 1";
		if(empty($style)){
		$sql .= " AND (item_number LIKE '%{$search_field}%' OR category LIKE '%{$search_field}%' OR sub_category LIKE '%{$search_field}%' OR name LIKE '%{$search_field}%' OR metal LIKE '%{$search_field}%' OR stone_shape LIKE '%{$search_field}%' OR stone LIKE '%{$search_field}%' OR description LIKE '%{$search_field}%') ";
		}
		if(!empty($diamond_weight)){
			foreach($diamond_weight as $carat){
				$sql .= " AND (diamond_weight != ''";
				if($carat == '1'){
					$sql .= " OR `diamond_weight` BETWEEN '0.25' AND '1.00'";
				}elseif($carat == '2.00'){
					$sql .= " OR `diamond_weight` BETWEEN '1.01' AND '2.00'";
				}elseif($carat == '3.00'){
					$sql .= " OR `diamond_weight` BETWEEN '2.01' AND '3.00'";
				}elseif($carat == '4.00'){
					$sql .= " OR `diamond_weight` BETWEEN '3.01' AND '4.00'";
				}elseif($carat == '5.00'){
					$sql .= " OR `diamond_weight` BETWEEN '4.01' AND '5.00'";
				}else{
					$sql .= " OR `diamond_weight` BETWEEN '5.01' AND '11.00'";
				}
				$sql .= ")";
			}
		}
		if($greaterThan_price!='' && $lessThan_price!=''){
		$sql .= " AND (price > {$greaterThan_price} AND price < {$lessThan_price})";
		}
		if(!empty($stone_shape)){
		$sql .= " AND (stone_shape IN('". implode("','",$stone_shape)."'))";
		}
		$sql .= " ORDER BY RAND()";
		$rsring = $this->db->query($sql);
		$results = $rsring->result_array();

		return $results;
	}

	function getshapeForEngagementRings() {
		$sql = "SELECT stone_shape as shape FROM dev_engagement_rings WHERE stone_shape != '' AND stone_shape != 'Null' GROUP BY stone_shape ORDER BY stone_shape ASC";
		$result = $this->db->query($sql);

		return $result->result_array();
	}

	function getstyleForEngagementRings($style){		
		$sql = "SELECT category as style FROM dev_engagement_rings WHERE (category != '' AND category != 'Null') OR category LIKE '%".$style."%' GROUP BY category ORDER BY RAND() LIMIT 0,4";
		$result = $this->db->query($sql);

		return $result->result_array();
	}

	function getcaratForEngagementRings() {		
		$sql = "SELECT diamond_weight as carat FROM dev_engagement_rings WHERE diamond_weight != '' AND diamond_weight != 'Null' GROUP BY diamond_weight ORDER BY diamond_weight ASC";
		$result = $this->db->query($sql);

		return $result->result_array();
	}

	function getResultFor401Cat($limit,$offset){
		$sql = "SELECT * FROM dev_engagement_rings WHERE 1 = 1";
		$sql .= " ORDER BY RAND()";
		$sql .= ' LIMIT '.$offset.','.$limit.'';
		$rsring = $this->db->query($sql);
		$results = $rsring->result_array();

		return $results;
	}

	function countResultFor401Cat(){
		$sql = "SELECT id FROM dev_engagement_rings WHERE 1 = 1";
		$sql .= " ORDER BY RAND()";
		$rsring = $this->db->query($sql);
		$results = $rsring->result_array();

		return $results;
	}

	function getResultFor402Cat($limit,$offset){
		$sql = "SELECT *, ud.id as ring_id, ur.priceRetail FROM dev_us AS ud INNER JOIN dev_us_prices AS ur ON ud.`name` = ur.productId WHERE ud.catid IN (86,204,335,336)";
		$sql .= ' GROUP BY ur.productId';
		$sql .= " ORDER BY RAND()";
		$sql .= ' LIMIT '.$offset.','.$limit.'';
		$result = $this->db->query($sql);

		return $results = $result->result_array();
	}

	function countResultFor402Cat(){
		$sql = "SELECT ud.id as ring_id FROM dev_us AS ud INNER JOIN dev_us_prices AS ur ON ud.`name` = ur.productId WHERE ud.catid IN (86,204,335,336)";
		$sql .= ' GROUP BY ur.productId';
		$sql .= " ORDER BY RAND()";
		$result = $this->db->query($sql);

		return $results = $result->result_array();
	}

	function getResultFor403Cat($limit,$offset){
		$sql = "SELECT *, ud.id as ring_id, ur.priceRetail FROM dev_us AS ud INNER JOIN dev_us_prices AS ur ON ud.`name` = ur.productId WHERE ud.catid IN (204)";
		$sql .= ' GROUP BY ur.productId';
		$sql .= " ORDER BY RAND()";
		$sql .= ' LIMIT '.$offset.','.$limit.'';
		$result = $this->db->query($sql);

		return $results = $result->result_array();
	}

	function countResultFor403Cat(){
		$sql = "SELECT ud.id as ring_id FROM dev_us AS ud INNER JOIN dev_us_prices AS ur ON ud.`name` = ur.productId WHERE ud.catid IN (204)";
		$sql .= ' GROUP BY ur.productId';
		$sql .= " ORDER BY RAND()";
		$result = $this->db->query($sql);

		return $results = $result->result_array();
	}

	function getResultFor404Cat($limit,$offset){
		$sql = "SELECT * FROM dev_jewelries_new WHERE category LIKE 'Bracelets'";
		$sql .= " ORDER BY RAND()";
		$sql .= ' LIMIT '.$offset.','.$limit.'';
		$rsring = $this->db->query($sql);
		$results = $rsring->result_array();

		return $results;
	}

	function countResultFor404Cat(){
		$sql = "SELECT stock_number FROM dev_jewelries_new WHERE category LIKE 'Bracelets'";
		$sql .= " ORDER BY RAND()";
		$rsring = $this->db->query($sql);
		$results = $rsring->result_array();

		return $results;
	}

	function getResultFor406Cat($limit,$offset){
		$sql = "SELECT * FROM dev_jewelries_new WHERE category LIKE 'Color Fashion'";
		$sql .= " ORDER BY RAND()";
		$sql .= ' LIMIT '.$offset.','.$limit.'';
		$rsring = $this->db->query($sql);
		$results = $rsring->result_array();

		return $results;
	}

	function countResultFor406Cat() {
		$sql = "SELECT stock_number FROM dev_jewelries_new WHERE category LIKE 'Color Fashion'";
		$sql .= " ORDER BY RAND()";
		$rsring = $this->db->query($sql);
		$results = $rsring->result_array();

		return $results;
	}

	function getResultFor407Cat($limit,$offset){
		$sql = "SELECT * FROM dev_jewelries_new WHERE category LIKE 'Necklaces'";
		$sql .= " ORDER BY RAND()";
		$sql .= ' LIMIT '.$offset.','.$limit.'';
		$rsring = $this->db->query($sql);
		$results = $rsring->result_array();

		return $results;
	}

	function countResultFor407Cat() {
		$sql = "SELECT stock_number FROM dev_jewelries_new WHERE category LIKE 'Necklaces'";
		$sql .= " ORDER BY RAND()";
		$rsring = $this->db->query($sql);
		$results = $rsring->result_array();

		return $results;
	}

	function getResultFor409Cat($limit,$offset){
		$sql = "SELECT *, ud.id as ring_id, ur.priceRetail FROM dev_us AS ud INNER JOIN dev_us_prices AS ur ON ud.`name` = ur.productId WHERE ud.catid IN (335,336)";
		$sql .= ' GROUP BY ur.productId';
		$sql .= " ORDER BY RAND()";
		$sql .= ' LIMIT '.$offset.','.$limit.'';
		$result = $this->db->query($sql);

		return $results = $result->result_array();
	}

	function countResultFor409Cat(){
		$sql = "SELECT ud.id as ring_id FROM dev_us AS ud INNER JOIN dev_us_prices AS ur ON ud.`name` = ur.productId WHERE ud.catid IN (335,336)";
		$sql .= ' GROUP BY ur.productId';
		$sql .= " ORDER BY RAND()";
		$result = $this->db->query($sql);

		return $results = $result->result_array();
	}

	function getResultFor410Cat($limit,$offset){
		$sql = "SELECT *, ud.id as ring_id, ur.priceRetail FROM dev_us AS ud INNER JOIN dev_us_prices AS ur ON ud.`name` = ur.productId WHERE ud.catid IN (86,204)";
		$sql .= ' GROUP BY ur.productId';
		$sql .= " ORDER BY RAND()";
		$sql .= ' LIMIT '.$offset.','.$limit.'';
		$result = $this->db->query($sql);
		$results = $result->result_array();
		return $results;
	}

	function countResultFor410Cat(){
		$sql = "SELECT ud.id as ring_id FROM dev_us AS ud INNER JOIN dev_us_prices AS ur ON ud.`name` = ur.productId WHERE ud.catid IN (86,204)";
		$sql .= ' GROUP BY ur.productId';
		$sql .= " ORDER BY RAND()";
		$result = $this->db->query($sql);
		$results = $result->result_array();
		return $results;
	}

	function getResultFor413Cat($limit,$offset){
		$sql = "SELECT * FROM dev_index WHERE is_lab_diamond = 0";
		$sql .= " ORDER BY RAND()";
		$sql .= ' LIMIT '.$offset.','.$limit.'';
		$rsring = $this->db->query($sql);
		$results = $rsring->result_array();

		return $results;
	}

	function countResultFor413Cat(){
		$sql = "SELECT * FROM dev_index WHERE is_lab_diamond = 0";
		$sql .= " ORDER BY RAND()";
		$rsring = $this->db->query($sql);
		$results = $rsring->result_array();

		return $results;
	}

	function getResultFor414Cat($limit,$offset){
		$sql = "SELECT * FROM dev_index WHERE is_lab_diamond = 1";
		$sql .= " ORDER BY RAND()";
		$sql .= ' LIMIT '.$offset.','.$limit.'';
		$rsring = $this->db->query($sql);
		$results = $rsring->result_array();

		return $results;
	}

	function countResultFor414Cat(){
		$sql = "SELECT * FROM dev_index WHERE is_lab_diamond = 1";
		$sql .= " ORDER BY RAND()";
		$rsring = $this->db->query($sql);
		$results = $rsring->result_array();

		return $results;
	}

	/* dev_jewelries_new */
	function getSearchResultForJewelries($search_field='',$carat='',$greaterThan_price='',$lessThan_price='',$stone_shape='',$style='',$limit,$offset,$sortby){
		$sql = "SELECT stock_number,is_carol,image1,is_oneil,name,price_website,stock_real_number FROM dev_jewelries_new WHERE 1 = 1";
		if(empty($style)){
		$sql .= " AND (stock_number LIKE '%{$search_field}%' OR category LIKE '%{$search_field}%' OR subcategory LIKE '%{$search_field}%' OR name LIKE '%{$search_field}%' OR shape LIKE '%{$search_field}%') ";
		}
		if(!empty($carat)){
			foreach($carat as $crt){
				$sql .= " AND (carat != ''";
				if($crt == '1'){
					$sql .= " OR `carat` BETWEEN '0.25' AND '1.00'";
				}elseif($crt == '2.00'){
					$sql .= " OR `carat` BETWEEN '1.01' AND '2.00'";
				}elseif($crt == '3.00'){
					$sql .= " OR `carat` BETWEEN '2.01' AND '3.00'";
				}elseif($crt == '4.00'){
					$sql .= " OR `carat` BETWEEN '3.01' AND '4.00'";
				}elseif($crt == '5.00'){
					$sql .= " OR `carat` BETWEEN '4.01' AND '5.00'";
				}else{
					$sql .= " OR `carat` BETWEEN '5.01' AND '11.00'";
				}
				$sql .= ")";
			}
		}
		if($greaterThan_price!='' && $lessThan_price!=''){
		$sql .= " AND (price_website > {$greaterThan_price} AND price_website < {$lessThan_price})";
		}
		if(!empty($stone_shape)){
		$sql .= " AND (shape IN('". implode("','",$stone_shape)."'))";
		}
		if(!empty($style) && (in_array("Bracelets", $style) || in_array("Earrings", $style) || in_array("Necklaces", $style))){
			$sql .= " AND (category IN('". implode("','",$style)."'))";
			$sql .= " AND (is_oneil = 1)";
		}elseif(!empty($style) && (in_array("Color Fashion", $style) || in_array("Diamond Fashion", $style) || in_array("Bridal Completes", $style) || in_array("New Arrivals", $style))){
			$sql .= " AND (category IN('". implode("','",$style)."'))";
			$sql .= " AND (is_carol = 1)";
		}
		$sql .= " ORDER BY RAND()";
		$sql .= ' LIMIT '.$offset.','.$limit.'';
		//echo $sql;
		$rsring = $this->db->query($sql);
		$results = $rsring->result_array();

		return $results;
	}

	function countSearchResultForJewelries($search_field='',$carat='',$greaterThan_price='',$lessThan_price='',$stone_shape='',$style=''){
		$sql = "SELECT stock_number FROM dev_jewelries_new WHERE 1 = 1";
		if(empty($style)){
		$sql .= " AND (stock_number LIKE '%{$search_field}%' OR category LIKE '%{$search_field}%' OR subcategory LIKE '%{$search_field}%' OR name LIKE '%{$search_field}%' OR shape LIKE '%{$search_field}%') ";
		}
		if(!empty($carat)){
			foreach($carat as $crt){
				$sql .= " AND (carat != ''";
				if($crt == '1'){
					$sql .= " OR `carat` BETWEEN '0.25' AND '1.00'";
				}elseif($crt == '2.00'){
					$sql .= " OR `carat` BETWEEN '1.01' AND '2.00'";
				}elseif($crt == '3.00'){
					$sql .= " OR `carat` BETWEEN '2.01' AND '3.00'";
				}elseif($crt == '4.00'){
					$sql .= " OR `carat` BETWEEN '3.01' AND '4.00'";
				}elseif($crt == '5.00'){
					$sql .= " OR `carat` BETWEEN '4.01' AND '5.00'";
				}else{
					$sql .= " OR `carat` BETWEEN '5.01' AND '11.00'";
				}
				$sql .= ")";
			}
		}
		if($greaterThan_price!='' && $lessThan_price!=''){
		$sql .= " AND (price_website > {$greaterThan_price} AND price_website < {$lessThan_price})";
		}
		if(!empty($stone_shape)){
		$sql .= " AND (shape IN('". implode("','",$stone_shape)."'))";
		}
		if(!empty($style) && (in_array("Bracelets", $style) || in_array("Earrings", $style) || in_array("Necklaces", $style))){
			$sql .= " AND (category IN('". implode("','",$style)."'))";
			$sql .= " AND (is_oneil = 1)";
		}elseif(!empty($style) && (in_array("Color Fashion", $style) || in_array("Diamond Fashion", $style) || in_array("Bridal Completes", $style) || in_array("New Arrivals", $style))){
			$sql .= " AND (category IN('". implode("','",$style)."'))";
			$sql .= " AND (is_carol = 1)";
		}
		$sql .= " ORDER BY RAND()";
		$rsring = $this->db->query($sql);
		$results = $rsring->result_array();

		return $results;
	}

	function getshapeForJewelries(){
		$sql = "SELECT shape FROM dev_jewelries_new WHERE shape != '' AND shape != 'Null' GROUP BY shape ORDER BY shape ASC";
		$result = $this->db->query($sql);

		return $result->result_array();
	}

	function getstyleForJewelries($style){
		$sql = "SELECT category as style FROM dev_jewelries_new WHERE (category != '' AND category != 'Null') OR category LIKE '%".$style."%' GROUP BY category ORDER BY RAND() LIMIT 0,4";
		$result = $this->db->query($sql);

		return $result->result_array();
	}

	function getcaratForJewelries(){
		$sql = "SELECT carat FROM dev_jewelries_new WHERE carat != '' AND carat != 'Null' GROUP BY carat ORDER BY carat ASC";
		$result = $this->db->query($sql);

		return $result->result_array();
	}

	/* dev_Index */
	function getSearchResultForDev_Index($search_field='',$carat='',$greaterThan_price='',$lessThan_price='',$stone_shape='',$style='',$limit,$offset,$sortby){
		$sql = "SELECT uid,is_lab_diamond,image_url,shape,carat,lot,price FROM dev_index WHERE 1 = 1";
		if(empty($style)){
			$sql .= " AND (lot LIKE '%{$search_field}%' OR Stock_n LIKE '%{$search_field}%' OR carat LIKE '%{$search_field}%' OR shape LIKE '%{$search_field}%')";
		}
		if(!empty($carat)){
			foreach($carat as $crt){
				$sql .= " AND (carat != ''";
				if($crt == '1'){
					$sql .= " OR `carat` BETWEEN '0.25' AND '1.00'";
				}elseif($crt == '2.00'){
					$sql .= " OR `carat` BETWEEN '1.01' AND '2.00'";
				}elseif($crt == '3.00'){
					$sql .= " OR `carat` BETWEEN '2.01' AND '3.00'";
				}elseif($crt == '4.00'){
					$sql .= " OR `carat` BETWEEN '3.01' AND '4.00'";
				}elseif($crt == '5.00'){
					$sql .= " OR `carat` BETWEEN '4.01' AND '5.00'";
				}else{
					$sql .= " OR `carat` BETWEEN '5.01' AND '11.00'";
				}
				$sql .= ")";
			}
		}
		if($greaterThan_price!='' && $lessThan_price!=''){
		$sql .= " AND (price > {$greaterThan_price} AND price < {$lessThan_price})";
		}
		if(!empty($stone_shape)){
		$sql .= " AND (shape IN('". implode("','",$stone_shape)."'))";
		}
		$sql .= " ORDER BY RAND()";
		$sql .= ' LIMIT '.$offset.','.$limit.'';
		//echo $sql;
		$rsring = $this->db->query($sql);
		$results = $rsring->result_array();
		return $results;
	}

	function countSearchResultForDev_Index($search_field='',$carat='',$greaterThan_price='',$lessThan_price='',$stone_shape='',$style=''){
		$sql = "SELECT uid FROM dev_index WHERE 1 = 1";
		if(empty($style)){
		$sql .= " AND (lot LIKE '%{$search_field}%' OR Stock_n LIKE '%{$search_field}%' OR carat LIKE '%{$search_field}%' OR shape LIKE '%{$search_field}%')";
		}
		if(!empty($carat)){
			foreach($carat as $crt){
				$sql .= " AND (carat != ''";
				if($crt == '1'){
					$sql .= " OR `carat` BETWEEN '0.25' AND '1.00'";
				}elseif($crt == '2.00'){
					$sql .= " OR `carat` BETWEEN '1.01' AND '2.00'";
				}elseif($crt == '3.00'){
					$sql .= " OR `carat` BETWEEN '2.01' AND '3.00'";
				}elseif($crt == '4.00'){
					$sql .= " OR `carat` BETWEEN '3.01' AND '4.00'";
				}elseif($crt == '5.00'){
					$sql .= " OR `carat` BETWEEN '4.01' AND '5.00'";
				}else{
					$sql .= " OR `carat` BETWEEN '5.01' AND '11.00'";
				}
				$sql .= ")";
			}
		}
		if($greaterThan_price!='' && $lessThan_price!=''){
		$sql .= " AND (price > {$greaterThan_price} AND price < {$lessThan_price})";
		}
		if(!empty($stone_shape)){
		$sql .= " AND (shape IN('". implode("','",$stone_shape)."'))";
		}
		$sql .= " ORDER BY RAND()";
		$rsring = $this->db->query($sql);
		$results = $rsring->result_array();

		return $results;
	}

	function getshapeForDev_Index(){
		$sql = "SELECT shape FROM dev_index WHERE shape != '' AND shape != 'Null' GROUP BY shape ORDER BY shape ASC";
		$result = $this->db->query($sql);

		return $result->result_array();
	}

	function getcaratForDev_Index(){
		$sql = "SELECT carat FROM dev_index WHERE carat != '' AND carat != 'Null' GROUP BY carat ORDER BY carat ASC";
		$result = $this->db->query($sql);

		return $result->result_array();
	}

	/* dev_us */
	function getSearchResultForDev_US($search_field='',$stone_weight='',$greaterThan_price='',$lessThan_price='',$stone_shape='',$limit,$offset,$sortby) {
		$sql = "SELECT ud.id ring_id,ud.name,ud.catid,ud.supplied_stones,ud.metal_weight, ur.priceRetail FROM dev_us AS ud INNER JOIN dev_us_prices AS ur ON ud.`name` = ur.productId WHERE 1 = 1";
		if($greaterThan_price!='' && $lessThan_price!=''){
		$sql .= " AND (ur.priceRetail > {$greaterThan_price} AND ur.priceRetail < {$lessThan_price})";
		}
		if(!empty($stone_weight)){
			foreach($stone_weight as $carat){
				$sql .= " AND (";
				if($carat == '1'){
					$sql .= " OR `ud.stone_weight_bk` BETWEEN '0.25' AND '1.00'";
				}elseif($carat == '2.00'){
					$sql .= " OR `ud.stone_weight_bk` BETWEEN '1.01' AND '2.00'";
				}elseif($carat == '3.00'){
					$sql .= " OR `ud.stone_weight_bk` BETWEEN '2.01' AND '3.00'";
				}elseif($carat == '4.00'){
					$sql .= " OR `ud.stone_weight_bk` BETWEEN '3.01' AND '4.00'";
				}elseif($carat == '5.00'){
					$sql .= " OR `ud.stone_weight_bk` BETWEEN '4.01' AND '5.00'";
				}else{
					$sql .= " OR `ud.stone_weight_bk` BETWEEN '5.01' AND '11.00'";
				}
				$sql .= ")";
			}
		}
		if(!empty($stone_shape)){
			foreach($stone_shape as $shape){
				$sql .= " AND (ud.supplied_stones_shape != ''";
				if($shape == 'Emerald'){
					$sql .= " OR `ud.supplied_stones_shape` LIKE 'EC'";
				}elseif($shape == 'Round'){
					$sql .= " OR `ud.supplied_stones_shape` LIKE 'RD'";
				}elseif($shape == 'Princess'){
					$sql .= " OR `ud.supplied_stones_shape` LIKE 'PR'";
				}elseif($shape == 'Semi Mount'){
					$sql .= " OR `ud.supplied_stones_shape` LIKE 'SB'";
				}elseif($shape == 'Trillion'){
					$sql .= " OR `ud.supplied_stones_shape` LIKE 'TR'";
				}elseif($shape == 'Oval'){
					$sql .= " OR `ud.supplied_stones_shape` LIKE 'OV'";
				}elseif($shape == 'Pear'){
					$sql .= " OR `ud.supplied_stones_shape` LIKE 'PE'";
				}else{
					$sql .= " OR `ud.supplied_stones_shape` LIKE '{$shape}'";
				}
				$sql .= ")";
			}
		}
		$sql .= " AND ud.catid IN (86,204,335,336)";
		$sql .= ' GROUP BY ur.productId';
		$sql .= " ORDER BY RAND()";
		$sql .= ' LIMIT '.$offset.','.$limit.'';
		$result = $this->db->query($sql);

		return $results = $result->result_array();
	}

	function countSearchResultForDev_US($search_field='',$stone_weight='',$greaterThan_price='',$lessThan_price='',$stone_shape='') {
		$sql = "SELECT ud.id ring_id FROM dev_us AS ud INNER JOIN dev_us_prices AS ur ON ud.`name` = ur.productId WHERE 1 = 1";
		if($greaterThan_price!='' && $lessThan_price!=''){
		$sql .= " AND (ur.priceRetail > {$greaterThan_price} AND ur.priceRetail < {$lessThan_price})";
		}
		if(!empty($stone_weight)){
			foreach($stone_weight as $carat){
				$sql .= " AND (ud.stone_weight_bk != ''";
				if($carat == '1'){
					$sql .= " OR `ud.stone_weight_bk` BETWEEN '0.25' AND '1.00'";
				}elseif($carat == '2.00'){
					$sql .= " OR `ud.stone_weight_bk` BETWEEN '1.01' AND '2.00'";
				}elseif($carat == '3.00'){
					$sql .= " OR `ud.stone_weight_bk` BETWEEN '2.01' AND '3.00'";
				}elseif($carat == '4.00'){
					$sql .= " OR `ud.stone_weight_bk` BETWEEN '3.01' AND '4.00'";
				}elseif($carat == '5.00'){
					$sql .= " OR `ud.stone_weight_bk` BETWEEN '4.01' AND '5.00'";
				}else{
					$sql .= " OR `ud.stone_weight_bk` BETWEEN '5.01' AND '11.00'";
				}
				$sql .= ")";
			}
		}
		if(!empty($stone_shape)){
			foreach($stone_shape as $shape){
				$sql .= " AND (";
				if($shape == 'Emerald'){
					$sql .= " OR `ud.supplied_stones_shape` LIKE 'EC'";
				}elseif($shape == 'Round'){
					$sql .= " OR `ud.supplied_stones_shape` LIKE 'RD'";
				}elseif($shape == 'Princess'){
					$sql .= " OR `ud.supplied_stones_shape` LIKE 'PR'";
				}elseif($shape == 'Semi Mount'){
					$sql .= " OR `ud.supplied_stones_shape` LIKE 'SB'";
				}elseif($shape == 'Trillion'){
					$sql .= " OR `ud.supplied_stones_shape` LIKE 'TR'";
				}elseif($shape == 'Oval'){
					$sql .= " OR `ud.supplied_stones_shape` LIKE 'OV'";
				}elseif($shape == 'Pear'){
					$sql .= " OR `ud.supplied_stones_shape` LIKE 'PE'";
				}else{
					$sql .= " OR `ud.supplied_stones_shape` LIKE '{$shape}'";
				}
				$sql .= ")";
			}
		}
		$sql .= " AND ud.catid IN (86,204,335,336)";
		$sql .= ' GROUP BY ur.productId';
		$sql .= " ORDER BY RAND()";
		$result = $this->db->query($sql);

		return $results = $result->result_array();
	}

	function getSearchResultForDevIndex($search_field='',$carat='',$greaterThan_price='',$lessThan_price='',$stone_shape='',$style='',$limit,$offset,$sortby){
		$sql = "SELECT uid,is_lab_diamond,image_url,shape,carat,lot,price FROM dev_index WHERE 1 = 1";
		if(empty($stone_shape)){
			$sql .= " AND (lot LIKE '%{$search_field}%' OR Stock_n LIKE '%{$search_field}%' OR carat LIKE '%{$search_field}%' OR carat LIKE '%". number_format($search_field,2) ."%' OR shape LIKE '%{$search_field}%')";
			if (strpos($search_field, 'round') !== false){
				$sql .= " OR (shape LIKE 'Round')";
			}elseif (strpos($search_field, 'Round') !== false){
				$sql .= " OR (shape LIKE 'Round')";
			}elseif (strpos($search_field, 'asscher') !== false){
				$sql .= " OR (shape LIKE 'Asscher')";
			}elseif (strpos($search_field, 'Asscher') !== false){
				$sql .= " OR (shape LIKE 'Asscher')";
			}elseif (strpos($search_field, 'cushion') !== false){
				$sql .= " OR (shape LIKE 'Cushion' || shape LIKE 'Cushion Modified Brilliant')";
			}elseif (strpos($search_field, 'Cushion') !== false){
				$sql .= " OR (shape LIKE 'Cushion' || shape LIKE 'Cushion Modified Brilliant')";
			}elseif (strpos($search_field, 'emerald') !== false){
				$sql .= " OR (shape LIKE 'Emerald')";
			}elseif (strpos($search_field, 'Emerald') !== false){
				$sql .= " OR (shape LIKE 'Emerald')";
			}elseif (strpos($search_field, 'heart') !== false){
				$sql .= " OR (shape LIKE 'Heart')";
			}elseif (strpos($search_field, 'Heart') !== false){
				$sql .= " OR (shape LIKE 'Heart')";
			}elseif (strpos($search_field, 'marquise') !== false){
				$sql .= " OR (shape LIKE 'Marquise')";
			}elseif (strpos($search_field, 'Marquise') !== false){
				$sql .= " OR (shape LIKE 'Marquise')";
			}elseif (strpos($search_field, 'oval') !== false){
				$sql .= " OR (shape LIKE 'Oval' || shape LIKE 'OV')";
			}elseif (strpos($search_field, 'Oval') !== false){
				$sql .= " OR (shape LIKE 'Oval' || shape LIKE 'OV')";
			}elseif (strpos($search_field, 'pear') !== false){
				$sql .= " OR (shape LIKE 'Pear')";
			}elseif (strpos($search_field, 'Pear') !== false){
				$sql .= " OR (shape LIKE 'Pear')";
			}elseif (strpos($search_field, 'princess') !== false){
				$sql .= " OR (shape LIKE 'Princess')";
			}elseif (strpos($search_field, 'Princess') !== false){
				$sql .= " OR (shape LIKE 'Princess')";
			}elseif (strpos($search_field, 'radiant') !== false){
				$sql .= " OR (shape LIKE 'Radiant')";
			}elseif (strpos($search_field, 'Radiant') !== false){
				$sql .= " OR (shape LIKE 'Radiant')";
			}
		}
		if(!empty($carat)){
			foreach($carat as $crt){
				$sql .= " AND (carat != ''";
				if($crt == '1'){
					$sql .= " OR `carat` BETWEEN '0.25' AND '1.00'";
				}elseif($crt == '2.00'){
					$sql .= " OR `carat` BETWEEN '1.01' AND '2.00'";
				}elseif($crt == '3.00'){
					$sql .= " OR `carat` BETWEEN '2.01' AND '3.00'";
				}elseif($crt == '4.00'){
					$sql .= " OR `carat` BETWEEN '3.01' AND '4.00'";
				}elseif($crt == '5.00'){
					$sql .= " OR `carat` BETWEEN '4.01' AND '5.00'";
				}else{
					$sql .= " OR `carat` BETWEEN '5.01' AND '11.00'";
				}
				$sql .= ")";
			}
		}
		if($greaterThan_price!='' && $lessThan_price!=''){
		$sql .= " AND (price > {$greaterThan_price} AND price < {$lessThan_price})";
		}
		if(!empty($stone_shape)){
		$sql .= " AND (shape IN('". implode("','",$stone_shape)."'))";
		}
		$sql .= " ORDER BY RAND()";
		$sql .= ' LIMIT '.$offset.','.$limit.'';
		//echo $sql;
		$rsring = $this->db->query($sql);
		$results = $rsring->result_array();
		return $results;
	}

	function countSearchResultForDevIndex($search_field='',$carat='',$greaterThan_price='',$lessThan_price='',$stone_shape='',$style=''){
		$sql = "SELECT uid FROM dev_index WHERE 1 = 1";
		if(empty($stone_shape)){
			$sql .= " AND (lot LIKE '%{$search_field}%' OR Stock_n LIKE '%{$search_field}%' OR carat LIKE '%{$search_field}%' OR carat LIKE '%". number_format($search_field,2) ."%' OR shape LIKE '%{$search_field}%')";
			if (strpos($search_field, 'round') !== false){
				$sql .= " OR (shape LIKE 'Round')";
			}elseif (strpos($search_field, 'Round') !== false){
				$sql .= " OR (shape LIKE 'Round')";
			}elseif (strpos($search_field, 'asscher') !== false){
				$sql .= " OR (shape LIKE 'Asscher')";
			}elseif (strpos($search_field, 'Asscher') !== false){
				$sql .= " OR (shape LIKE 'Asscher')";
			}elseif (strpos($search_field, 'cushion') !== false){
				$sql .= " OR (shape LIKE 'Cushion' || shape LIKE 'Cushion Modified Brilliant')";
			}elseif (strpos($search_field, 'Cushion') !== false){
				$sql .= " OR (shape LIKE 'Cushion' || shape LIKE 'Cushion Modified Brilliant')";
			}elseif (strpos($search_field, 'emerald') !== false){
				$sql .= " OR (shape LIKE 'Emerald')";
			}elseif (strpos($search_field, 'Emerald') !== false){
				$sql .= " OR (shape LIKE 'Emerald')";
			}elseif (strpos($search_field, 'heart') !== false){
				$sql .= " OR (shape LIKE 'Heart')";
			}elseif (strpos($search_field, 'Heart') !== false){
				$sql .= " OR (shape LIKE 'Heart')";
			}elseif (strpos($search_field, 'marquise') !== false){
				$sql .= " OR (shape LIKE 'Marquise')";
			}elseif (strpos($search_field, 'Marquise') !== false){
				$sql .= " OR (shape LIKE 'Marquise')";
			}elseif (strpos($search_field, 'oval') !== false){
				$sql .= " OR (shape LIKE 'Oval' || shape LIKE 'OV')";
			}elseif (strpos($search_field, 'Oval') !== false){
				$sql .= " OR (shape LIKE 'Oval' || shape LIKE 'OV')";
			}elseif (strpos($search_field, 'pear') !== false){
				$sql .= " OR (shape LIKE 'Pear')";
			}elseif (strpos($search_field, 'Pear') !== false){
				$sql .= " OR (shape LIKE 'Pear')";
			}elseif (strpos($search_field, 'princess') !== false){
				$sql .= " OR (shape LIKE 'Princess')";
			}elseif (strpos($search_field, 'Princess') !== false){
				$sql .= " OR (shape LIKE 'Princess')";
			}elseif (strpos($search_field, 'radiant') !== false){
				$sql .= " OR (shape LIKE 'Radiant')";
			}elseif (strpos($search_field, 'Radiant') !== false){
				$sql .= " OR (shape LIKE 'Radiant')";
			}
		}
		if(!empty($carat)){
			foreach($carat as $crt){
				$sql .= " AND (carat != ''";
				if($crt == '1'){
					$sql .= " OR `carat` BETWEEN '0.25' AND '1.00'";
				}elseif($crt == '2.00'){
					$sql .= " OR `carat` BETWEEN '1.01' AND '2.00'";
				}elseif($crt == '3.00'){
					$sql .= " OR `carat` BETWEEN '2.01' AND '3.00'";
				}elseif($crt == '4.00'){
					$sql .= " OR `carat` BETWEEN '3.01' AND '4.00'";
				}elseif($crt == '5.00'){
					$sql .= " OR `carat` BETWEEN '4.01' AND '5.00'";
				}else{
					$sql .= " OR `carat` BETWEEN '5.01' AND '11.00'";
				}
				$sql .= ")";
			}
		}
		if($greaterThan_price!='' && $lessThan_price!=''){
		$sql .= " AND (price > {$greaterThan_price} AND price < {$lessThan_price})";
		}
		if(!empty($stone_shape)){
		$sql .= " AND (shape IN('". implode("','",$stone_shape)."'))";
		}
		$sql .= " ORDER BY RAND()";
		$rsring = $this->db->query($sql);
		$results = $rsring->result_array();

		return $results;
	}

	function getMainCategory() {		
		$sql = "SELECT * FROM dev_us_catagories WHERE pid = '0' ORDER BY sortcate ASC";
		$result = $this->db->query($sql);

		return $result->result_array();
	}

	///// get ring ENR ID
    function get_unique_rings_search_result($search_field='') {
        $sql = "SELECT * FROM dev_us WHERE 1 = 1";
        $sql .= " AND (name LIKE '%{$search_field}%' OR style_group LIKE '%{$search_field}%')";
        $sql .= " ORDER BY RAND() LIMIT 20";

        $rsring = $this->db->query($sql);
        $results = $rsring->result_array();

        return $results;
    }

    ///// get ring ENR ID
    function get_jewelery_cate_result($search_field='') {
        $sql = "SELECT * FROM dev_jewelries WHERE 1 = 1";
        $sql .= " AND (stock_number LIKE '%{$search_field}%' OR item_title LIKE '%{$search_field}%') ";
        $sql .= " ORDER BY RAND() LIMIT 5";
        $rsring = $this->db->query($sql);
        $results = $rsring->result_array();

        return $results;
    }
	
	/* get diamond search result */
    function get_diamond_result($search_field='') {
        $sql = "SELECT * FROM dev_index WHERE 1 = 1";
        $sql .= " AND (lot LIKE '%{$search_field}%' OR Stock_n LIKE '%{$search_field}%' OR carat LIKE '%{$search_field}%')";
        $sql .= " ORDER BY RAND() LIMIT 5";
        $rsring = $this->db->query($sql);
        $results = $rsring->result_array();

        return $results;
    }

	/* get fine jewelry search result */
    function get_fine_jewelry_result($search_field='') {
        $sql = "SELECT * FROM dev_jewelries_new WHERE 1 = 1";
        $sql .= " AND (stock_real_number LIKE '%{$search_field}%' OR item_title LIKE '%{$search_field}%' OR item_sku LIKE '%{$search_field}%' OR productSKU LIKE '%{$search_field}%')";
        $sql .= "GROUP BY stock_real_number ORDER BY RAND() LIMIT 5";
        $rsring = $this->db->query($sql);
        $results = $rsring->result_array();

        return $results;
    }

	/* get Women search result */
    function get_hip_hop_jewelry_result($search_field='') {
        $sql = "SELECT * FROM jewelry_unlimited_products WHERE 1 = 1";
        $sql .= " AND (product_name LIKE '%{$search_field}%' OR product_sku LIKE '%{$search_field}%' OR product_category LIKE '%{$search_field}%')";
        $sql .= " ORDER BY RAND() LIMIT 5";
        $rsring = $this->db->query($sql);
        $results = $rsring->result_array();

        return $results;
    }

	/* get Men search result */
    function get_men_diamond_rings_result($search_field='') {
        $sql = "SELECT * FROM itshot_products WHERE 1 = 1";
        $sql .= " AND (product_name LIKE '%{$search_field}%' OR product_sku LIKE '%{$search_field}%' OR product_category LIKE '%{$search_field}%')";
        $sql .= " ORDER BY RAND() LIMIT 5";
        $rsring = $this->db->query($sql);
        $results = $rsring->result_array();

        return $results;
    }

	/* get engagement Ring ID */
    function get_engagement_cate_result($search_field='') {
        $sql = "SELECT * FROM dev_engagement_rings WHERE 1 = 1";
        $sql .= " AND (item_number LIKE '%{$search_field}%' OR category LIKE '%{$search_field}%' OR name LIKE '%{$search_field}%' OR metal LIKE '%{$search_field}%' OR setting LIKE '%{$search_field}%' OR stone_shape LIKE '%{$search_field}%' OR ring_size LIKE '%{$search_field}%') ";
        $sql .= " ORDER BY RAND() LIMIT 5";
        $rsring = $this->db->query($sql);
        $results = $rsring->result_array();

        return $results;
    }
	
	/* get engagement Ring ID */
    function getengagementresult($search_field='') {
        $sql = "SELECT * FROM dev_engagement_rings WHERE 1 = 1";
        $sql .= " AND (item_number LIKE '%{$search_field}%' OR category LIKE '%{$search_field}%' OR sub_category LIKE '%{$search_field}%' OR name LIKE '%{$search_field}%' OR metal LIKE '%{$search_field}%' OR stone_shape LIKE '%{$search_field}%' OR stone LIKE '%{$search_field}%' OR description LIKE '%{$search_field}%') ";
        $sql .= " ORDER BY RAND()";
        $rsring = $this->db->query($sql);
        $results = $rsring->result_array();

        return $results;
    }

    // Data insert into any table
	function insert_into_any_table($data, $table_name){
		$this->db->insert($table_name, $data);
		$insert_id = $this->db->insert_id();

   		return  $insert_id;
	}

    ///// get ring ENR ID
    function get_watches_cate_result($search_field='') {
        $sql = "SELECT * FROM dev_watches WHERE 1 = 1";
        $sql .= " AND (stock_real_number LIKE '%{$search_field}%' OR productID LIKE '%{$search_field}%' OR productName LIKE '%{$search_field}%')";
        $sql .= " ORDER BY RAND() LIMIT 20";
        $rsring = $this->db->query($sql);
        $results = $rsring->result_array();

        return $results;
    }

    ///// get ring ENR ID
    function get_unique_cate_result($search_field='') {
        $sql = "SELECT * FROM dev_us_catagories WHERE 1 = 1";
        $sql .= " AND catname LIKE '%{$search_field}%'";
        $sql .= " ORDER BY RAND() LIMIT 20";
        $rsring = $this->db->query($sql);
        $results = $rsring->result_array();

        return $results;
    }

	///// get the finger size resultes
	function getFingerSizeRow($size_id=0) {
		$sql = "SELECT id, price_difference, ring_size FROM `dev_fingersize_temp` WHERE id = '{$size_id}' ORDER BY `id` DESC LIMIT 1";        
        $query = $this->db->query($sql);
        $results = $query->result_array();

        return $results[0];
	}
   
	// Data count from any table
	function count_any_table($where, $table_name){
		$this->db->where($where);
	    $this->db->from($table_name);

	    return $this->db->count_all_results();
	}

    ///// sub category
	function getSubCategory($cateid='') {
        if($cateid != 0) {
            $sql = "SELECT * FROM dev_us_catagories WHERE pid = '".$cateid."'";
             if( $cateid == 56 ) {
                 $sql .= " ORDER BY `sortcate` ASC";
             } else {
                 $sql .= " ORDER BY catname ASC";
             }
            $result = $this->db->query($sql);	
            return $result->result_array();
        }			
        return FALSE;	
    }

    ///// get category name
    function getRingCategoryRow($id) {
        $sql = "SELECT * FROM dev_us_catagories WHERE id = '".$id."' ORDER BY id DESC LIMIT 1";
        $result = $this->db->query($sql);	
        $row = $result->result_array();	

        return $row[0];
    }

    ///// get category name
	function getRingCategoryName($id) {
		$sql = "SELECT catname FROM dev_us_catagories WHERE id = '".$id."' ORDER BY id DESC LIMIT 1";
		$result = $this->db->query($sql);	
		$row = $result->result_array();	

		if(isset($row[0])){
			return $row[0]['catname'];
		}else{
			return '';
		}
    }

    ///// get category name
	function getCollectionCateName($id) {
        $sql = "SELECT category_name FROM `dev_ebaycategories` WHERE `category_id` = '{$id}'";
        $result = $this->db->query($sql);	
        $row = $result->result_array();	
		
        return isset($row[0]['category_name'])?$row[0]['category_name']:'';
    }

    ///// sub category
    function uniquePriceRange($priceamount=0) {
        if( $priceamount > 0 ) {
            $sql = "SELECT rate FROM dev_unique_prices WHERE $priceamount BETWEEN pricefrom AND priceto ORDER BY rowid DESC LIMIT 1";
            $result = $this->db->query($sql);
            $row = $result->result_array();
            return $row[0]['rate'];		
        }
        return 0;	
    }

	///// get parent cate ID by its sub cate
	function getparentCateID($id) {
		$sql = "SELECT pid FROM dev_us_catagories WHERE id = '".$id."' ORDER BY id DESC LIMIT 1";
		$result = $this->db->query($sql);	
		$row = $result->result_array();	
		if(isset($row[0])){
			return $row[0]['pid'];
		}else{
			return false;
		}
	}

	/// get unique parent category id
	function get_unique_main_cate_id($id=0) {
        $c_id = $this->getparentCateID($id);
        if( $c_id > 0 ) {
            return $this->get_unique_main_cate_id($c_id);
        } else {
            return $id;
        }
    }

	function checkCateRingsExist($cateid) {
		$sqlring = "SELECT id FROM dev_us WHERE catid = '".$cateid."'";
		$rsring = $this->db->query($sqlring);
		$results = $rsring->result_array();

		return $results;
	}

	/* get ring ENR ID */
	function getUniqueRingID($ring_id) {
		$sqlring = "SELECT name FROM dev_us WHERE id = '".$ring_id."'";
		$rsring = $this->db->query($sqlring);
		$results = $rsring->result_array();
		return isset($results[0]['name'])?$results[0]['name']:'';
	}

	function getOvrmountRingID($ring_id) {
		$sqlring = "SELECT item_number FROM dev_engagement_rings WHERE id = '".$ring_id."'";
		$rsring = $this->db->query($sqlring);
		$results = $rsring->result_array();
		return isset($results[0]['item_number'])?$results[0]['item_number']:'';
	}

    //// get rings id according to the middle gram weight
    function get_unique_middle_gram_weight($id=0) {
        $sql = "SELECT style_group FROM dev_us WHERE id = '{$id}' ORDER BY id DESC LIMIT 1";   /// get gram weight style group
        $rsring = $this->db->query($sql);
        $results = $rsring->result_array();
        
        //// get gram weight start limit
        $sql_1 = "SELECT id, floor( count(*) / 2 ) start_limit FROM dev_us WHERE style_group = '{$results[0]['style_group']}'";
        $query_1 = $this->db->query($sql_1);
        $result_1 = $query_1->result_array();
        
        //// get gram weight ring id
        $sql_2 = "SELECT id, name, style_group, metal_weight, metal_weight_bk FROM dev_us WHERE style_group = '{$results[0]['style_group']}' ORDER BY metal_weight_bk ASC  LIMIT ".$result_1[0]['start_limit'].", 1";
        
        $query_2 = $this->db->query($sql_2);
        $result_2 = $query_2->result_array();
        
        return (isset($result_2[0]['id']) && $result_2[0]['id'] > 0 ? $result_2[0]['id'] : $id );
        
    }

	//// get ring metals
	function getRingsMetalByCate($cid=0) {
		$sqlring = "SELECT pr.matalType rings_metal FROM dev_us us INNER JOIN dev_us_prices pr ON us.name = pr.productId WHERE us.catid = '{$cid}'  AND pr.matalType <> '' GROUP BY pr.matalType ORDER BY pr.matalType";
		$rsring = $this->db->query($sqlring);
		$results = $rsring->result_array();

		return $results;
	}

	function getRingsByCateory($cateid='', $offset=0, $limit=15, $ring_vid='', $metalvalue='', $sort='', $supplied_stone='', $build='') {
		$rs_ring = array();
		$resultRings = array();
		$resultsview = array();
		$priceMargin = $this->inventory_pric_margin($cateid, UNIQUE_OPTION);
		if($cateid != 0) {
			$sqlring = "SELECT `id`, `name`, `availblesize`,`additional_stones` FROM `dev_us` WHERE `catid` ='".$cateid."'"; 
			$rsring = $this->db->query($sqlring);
			$results = $rsring->result_array();
			foreach($results as $rowring) {
				$ringsImage = $this->getRingsImgViaId($rowring['name']);
				$availablesize = explode('|', trim($rowring['availblesize']));
				$availablesz = array_filter ( $availablesize );
				array_shift( $availablesz  );
				if( count($availablesz) > 0 && in_array(trim($rowring['name']), $availablesz)) {
					continue;
				} else {
					if( !empty($ringsImage) && $ring_vid != $rowring['id'] ) {
						if($rowring['additional_stones'] == ''){
							$rs_ring[] = $rowring['id'];
						}else{ 
							$additional_stones_ex = explode('/', $rowring['additional_stones']);
							$additional_stones_first_item   = explode('-', $additional_stones_ex['0']);
							$additional_stones_first_item2   = $additional_stones_first_item['1']; 

							$additional_stones_first_item21 =  explode('x',$additional_stones_first_item2);
							$frt_like = isset($additional_stones_first_item21[0])?$additional_stones_first_item21[0]:'';
							$sec_like = isset($additional_stones_first_item21[1])?'x '.$additional_stones_first_item21[1]:'';

							$req_sql = "SELECT * FROM (`dev_index`) WHERE `price` != '' AND `price` > '0' AND `color` != '' and (color='d' or color='e' or color='f' or color='g' or color='h' or color='i' or color='j') and (clarity = 'FL' OR clarity = 'IF' OR clarity = 'VVS1' OR clarity = 'VVS2' OR clarity = 'VS1' OR clarity = 'VS2' OR clarity = 'Si1') and `carat` like '0.25%'  LIMIT 1";

							$res_qry = $this->db->query($req_sql);
							$get_dev_index_info = $res_qry->result();
							if(!empty($get_dev_index_info)){
								$rs_ring[] = $rowring['id'];
							}
						}
					}
				}
			}

			$search_string = $this->session->userdata('search_string');
			$ringsIDList = "('".implode("','", $rs_ring)."')";
			$sqlsring = "SELECT *, ud.id ring_id, ur.priceRetail * $priceMargin * 1.7 AS priceRetail  FROM dev_us AS ud INNER JOIN dev_us_prices AS ur ON ud.`name` = ur.productId WHERE 1=1 AND ur.priceRetail >= 100 ";
			if( !empty($search_string) ) {
				$sqlsring .= " AND `name` LIKE '%".$search_string."%'";
			} else {
				$sqlsring .= " AND ud.id IN $ringsIDList";	
			}
			if( !empty($metalvalue) ) {
				$sqlsring .= " AND ur.`matalType` LIKE '{$metalvalue}'";
			}
			if( !empty($supplied_stone) ) {
				$sqlsring .= " AND ud.`supplied_stones` != ''";
			}
			if( !empty($build) ) {
				$sqlsring .= " AND ud.`found_diamond` = 'Y'";
			}
			$sqlsring .= " GROUP BY ur.productId";
			$count_sql = $sqlsring;
			$count_qr = $this->db->query($count_sql);
			$resultsview['total'] = $count_qr->num_rows();
			if($sort == 'Random'){
				$sqlsring .= " ORDER BY RAND() LIMIT $limit";
			}else{
				if( !empty( $sort ) ) {
					$sort_options = ( $sort == 'Name' ? "ud.name ASC" : "ur.priceRetail $sort" );
					$sqlsring .= " ORDER BY $sort_options LIMIT $offset, $limit";
				} else {
					$sqlsring .= ( empty($ring_vid) ? " ORDER BY ud.name ASC LIMIT $offset, $limit" : " ORDER BY RAND() LIMIT $limit" ); 
				}
			}  
			$sqlrings = $this->db->query($sqlsring);
			$results_rings = $sqlrings->result_array();
			foreach($results_rings as $rowsring) {
				$ring_image = $this->getRingsImgViaId($rowsring['name']);
				$resultRings[] = array_merge($rowsring, $ring_image);
			}
		}
		$resultsview['results'] = $resultRings;
		return $resultsview;
	}
	
	function getRingsByUnique($cateid='', $offset=0, $limit=15, $ring_vid='', $caratvalue='', $matalType='', $sort='', $supplied_stone='', $build='') {
		$rs_ring = array();
		$resultRings = array();
		$resultsview = array();
		$priceMargin = $this->inventory_pric_margin($cateid, UNIQUE_OPTION);
		if($cateid != 0) {
			$sqlring = "SELECT `id`, `name`, `availblesize`,`additional_stones` FROM `dev_us` WHERE `catid` ='".$cateid."'"; 
			$rsring = $this->db->query($sqlring);
			$results = $rsring->result_array();
			foreach($results as $rowring) {
				$ringsImage = $this->getRingsImgViaId($rowring['name']);
				$availablesize = explode('|', trim($rowring['availblesize']));
				$availablesz = array_filter ( $availablesize );
				array_shift( $availablesz  );
				if( count($availablesz) > 0 && in_array(trim($rowring['name']), $availablesz)) {
					continue;
				} else {
					if( !empty($ringsImage) && $ring_vid != $rowring['id'] ) {
						if($rowring['additional_stones'] == ''){
							$rs_ring[] = $rowring['id'];
						}else{ 
							$additional_stones_ex = explode('/', $rowring['additional_stones']);
							$additional_stones_first_item   = explode('-', $additional_stones_ex['0']);
							$additional_stones_first_item2   = $additional_stones_first_item['1']; 

							$additional_stones_first_item21 =  explode('x',$additional_stones_first_item2);
							$frt_like = isset($additional_stones_first_item21[0])?$additional_stones_first_item21[0]:'';
							$sec_like = isset($additional_stones_first_item21[1])?'x '.$additional_stones_first_item21[1]:'';

							$req_sql = "SELECT * FROM (`dev_index`) WHERE `price` != '' AND `price` > '0' AND `color` != '' and (color='d' or color='e' or color='f' or color='g' or color='h' or color='i' or color='j') and (clarity = 'FL' OR clarity = 'IF' OR clarity = 'VVS1' OR clarity = 'VVS2' OR clarity = 'VS1' OR clarity = 'VS2' OR clarity = 'Si1') and `carat` like '0.25%'  LIMIT 1";

							$res_qry = $this->db->query($req_sql);
							$get_dev_index_info = $res_qry->result();
							if(!empty($get_dev_index_info)){
								$rs_ring[] = $rowring['id'];
							}
						}
					}
				}
			}

			$search_string = $this->session->userdata('search_string');
			$ringsIDList = "('".implode("','", $rs_ring)."')";
			$sqlsring = "SELECT *, ud.id ring_id, ur.priceRetail * $priceMargin * 1.7 AS priceRetail  FROM dev_us AS ud INNER JOIN dev_us_prices AS ur ON ud.`name` = ur.productId WHERE 1=1 AND ur.priceRetail >= 100 ";
			if( !empty($search_string) ) {
				$sqlsring .= " AND `name` LIKE '%".$search_string."%'";
			} else {
				$sqlsring .= " AND ud.id IN $ringsIDList";	
			}
			if( !empty($caratvalue) ) {
				$sqlsring .= " AND ud.`stone_weight` LIKE '{$caratvalue} CT.'";
			}
			if( !empty($matalType) ) {
				$sqlsring .= " AND ur.`matalType` LIKE '{$matalType}'";
			}
			if( !empty($supplied_stone) ) {
				$sqlsring .= " AND ud.`supplied_stones` != ''";
			}
			if( !empty($build) ) {
				$sqlsring .= " AND ud.`found_diamond` = 'Y'";
			}
			$sqlsring .= " GROUP BY ur.productId";
			$count_sql = $sqlsring;
			$count_qr = $this->db->query($count_sql);
			$resultsview['total'] = $count_qr->num_rows();
			if($sort == 'Random'){
				$sqlsring .= " ORDER BY RAND() LIMIT $limit";
			}else{
				if( !empty( $sort ) ) {
					$sort_options = ( $sort == 'Name' ? "ud.name ASC" : "ur.priceRetail $sort" );
					$sqlsring .= " ORDER BY $sort_options LIMIT $offset, $limit";
				} else {
					$sqlsring .= ( empty($ring_vid) ? " ORDER BY ud.name ASC LIMIT $offset, $limit" : " ORDER BY RAND() LIMIT $limit" ); 
				}
			}
			//echo $sqlsring;
			$sqlrings = $this->db->query($sqlsring);
			$results_rings = $sqlrings->result_array();
			foreach($results_rings as $rowsring) {
				$ring_image = $this->getRingsImgViaId($rowsring['name']);
				$resultRings[] = array_merge($rowsring, $ring_image);
			}
		}
		$resultsview['results'] = $resultRings;
		return $resultsview;	
	}
	
	function getRingsByCostar($cateid='', $ring_vid='', $metalvalue='', $qualityvalue='', $carat, $offset=0, $limit=5) {
		$sqlring = "SELECT * FROM `dev_engagement_rings` WHERE costar_id > 0 AND id != '".$ring_vid."' AND category LIKE '".$cateid."' AND metal LIKE '".$metalvalue."' AND diamond_quality LIKE '".$qualityvalue."' LIMIT ".$offset.",".$limit.""; 
		$rsring = $this->db->query($sqlring);
		$results = $rsring->result_array();
		$resultsview['results'] = $results;

		return $resultsview;
	}

	function getRingsByOvernight($cateid='', $ring_vid='', $metalvalue='', $qualityvalue='', $carat, $offset=0, $limit=5) {
		$sqlring = "SELECT * FROM `dev_engagement_rings` WHERE overnight_id > 0 AND id != '".$ring_vid."' AND category LIKE '".$cateid."' AND metal LIKE '".$metalvalue."' LIMIT ".$offset.",".$limit.""; 
		$rsring = $this->db->query($sqlring);
		$results = $rsring->result_array();
		$resultsview['results'] = $results;

		return $resultsview;
	}

    ////// set inventory price margin
    function inventory_price_margin($categoryid=0, $option='') {
        $sql = "SELECT max_percent FROM dev_inventoryprices where category_id = '{$categoryid}' AND manufacture_type = '{$option}' ORDER BY id DESC LIMIT 1";
        $result  = $this->db->query($sql);
        $content = $result->result_array();
        $price_margin = ( $content[0]['max_percent'] > 0 ? $content[0]['max_percent'] : 0 );
        $price_margin1 = 1 + ( $price_margin / 100 );

        return $price_margin1;
    }
        
	///// get product category id
	function getProductCategoryId($pid=0) {
		$rsring = $this->db->query( "SELECT catid FROM dev_us WHERE id = '{$pid}' ORDER BY id DESC LIMIT 1" );
		$result = $rsring->result_array();
		$getparent_cate = getMainCatParentCateID( $result[0]['catid'] );

		return $getparent_cate;
	}

	function get_unique_cate_id($pid=0) {
		$rsring = $this->db->query( "SELECT catid FROM dev_us WHERE id = '{$pid}' ORDER BY id DESC LIMIT 1" );
		$result = $rsring->result_array();

		return isset($result[0]['catid'])?$result[0]['catid']:'';
	}

	function inventory_pric_margin($categoryid=0, $option='') {
		$sql = "SELECT max_percent FROM dev_inventoryprices where category_id = '{$categoryid}' AND manufacture_type = '{$option}' ORDER BY id DESC LIMIT 1";
		$result  = $this->db->query($sql);
		$content = $result->result_array();
		$price_margin = (isset($content[0]['max_percent']) && $content[0]['max_percent'] > 0 ? $content[0]['max_percent'] : 0 );
		$price_margin1 = 1 + ( $price_margin / 100 );

		return $price_margin1;
	}

	// Data get with where from any table
	function update_any_table($wheredata, $table_name, $id_name, $edited_id){
		$this->db->where($id_name, $edited_id);
		$this->db->update($table_name, $wheredata); 

		return true;
	}

	// Data get with where from any table
	function update_any_table_where($wheredata, $table_name, $wheredata_id){
		$this->db->where($wheredata_id);
		$this->db->update($table_name, $wheredata); 

		return true;
	}

	//// get ring detail
	function getRingsDetailViaId($ringid, $rgmetal='', $ring_sze='', $search='') {
		$product_cid = $this->get_unique_cate_id( $ringid );   // get product category id according to the product id
		$priceMargin = $this->inventory_pric_margin($product_cid, UNIQUE_OPTION);

		$sqlring = "SELECT *, ud.id ring_id, ur.priceRetail * $priceMargin * 1.7 AS priceRetail  FROM dev_us AS ud INNER JOIN dev_us_prices AS ur ON ud.`name` = ur.productId WHERE 1 = 1";

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
		$results = isset($resut[0])?$resut[0]:array();
		$itemNumber = isset($results['name'])?trim($results['name']):'';

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

		$ringsImage = $this->getRingsImgViaId(isset($results['name'])?$results['name']:'');
		$parentCate = $this->getCategoryParentId(isset($results['catid'])?$results['catid']:0);
		$category_name = $this->getRingCategoryName(isset($results['catid'])?$results['catid']:0);
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

	function getovernightRingsDetails($ringid, $rgmetal='', $ring_sze='', $search='') {
		$sqlrgsize = "SELECT * FROM `dev_engagement_rings` WHERE `id` = '".$ringid."'";
		$resultergsize = $this->db->query($sqlrgsize);
		$results = $resultergsize->result_array();
		$itemNumber = trim($results[0]['name']);
		
		$gallery_imgs1 = explode(";",$results[0]['image']);
		$gallery_imgs = array_unique($gallery_imgs1);

		$parentCate_ar = array( 
			'category_name'	=> $results[0]['sub_category'],
			'parent_cate'	=> $results[0]['category'],
			'item_thumbs'	=> count($gallery_imgs),
			'ringsMetal'	=> $results[0]['metal'],
			'ringsSizes'	=> $results[0]['ring_size'],
		);
		$ringsDetail = array_merge($results[0],$parentCate_ar);

		return $ringsDetail;
	}

	//// Get engagement ring detail
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

	function getRingsDetailViaIdEdit($ringid, $rgmetal='', $ring_sze='', $search='') {
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

	//// get rings thumbs
	function getRingThumbs( $itemNumber='' ) {
		$sqlthumb = "SELECT ImagePath, ImagePathThumb FROM images WHERE ItemNumber LIKE '%".trim($itemNumber)."'";
		$resulthumb = $this->db->query($sqlthumb);
		$arthumb = $resulthumb->result_array();

		return $arthumb;
	}

	///// search unique rings
	function searchUniqueRings($id) {
		$sqlmetal = "SELECT id, catid, name FROM `dev_us` WHERE `name` LIKE '%".$id."%'";
		$resultemetal = $this->db->query($sqlmetal);
		$results['total'] = $resultemetal->num_rows();
		$results['results'] = $resultemetal->result_array();
		$results['results'] = $resultemetal->result_array();
		$results['cateid'] = $results['results'][0]['catid'];

		return $results;
	}

	//// get single column value
	function getMetalRingWeight($id) {
		$sqlmetal = "SELECT id, catid, metal_weight FROM `dev_us` WHERE `name` LIKE '%".$id."%'";
		$resultemetal = $this->db->query($sqlmetal);
		$armetal = $resultemetal->result_array();

		return $armetal[0];
	}

	//// get similar products
	function getSimilarRingsList($cateid, $id, $idlist='') {
		$sqlmetal = "SELECT *, ud.id ring_id, ur.priceRetail FROM dev_us AS ud INNER JOIN dev_us_prices AS ur ON ud.`name` = ur.productId WHERE ud.id <> '".$id."' 
		AND ud.catid = '".$cateid."'";
		if( !empty($idlist) ) {
			$sqlmetal .= " AND name NOT IN ('".$idlist."')";
		}
		$sqlmetal .= " GROUP BY ur.productId ORDER BY ud.name ASC LIMIT 3";
		$resultemetal = $this->db->query($sqlmetal);
		$results = $resultemetal->result_array();

		return $results;
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

	function getRingImgViaId($style_id='') {
		$results = '';
		if($style_id != '') {
			$sql = "SELECT `ImagePath` FROM `images` WHERE `ItemNumber` = '".trim($style_id)."' LIMIT 0,1";
			$rsring = $this->db->query($sqlring);
			$results = $rsring->result_array();							
		}
		return $results;	
	}

	/// check either products exists of a particular category
	function checkProductsExist($cateid) {
		$sql = "SELECT trim(name) AS style_num FROM dev_us WHERE catid = '".$cateid."' OR catid IN (select id FROM dev_us_catagories WHERE pid = '".$cateid."') GROUP BY catid LIMIT 1";	
		$rsring = $this->db->query($sql);
		$row = $rsring->result_array();	
		return $row[0]['style_num'];
	}

	////// get rings by category
	function getRingsViaCate($cateid='', $offset=0, $perpage=24) {
		$rs_ring = array();
		$start = ( !empty($offset) ? $offset : 0 );
		if($cateid != 0) {
			$sql = "SELECT * FROM dev_us WHERE catid = '".$cateid."' ORDER BY name ASC LIMIT $start, $perpage";
			$result = $this->db->query($sql);	
			$response = $result->result_array();
			foreach($response as $rowring) {
				$ringsImage = $this->getRingsImgViaId($rowring['name']);
				$availablesize = explode('|', trim($rowring['availblesize']));
				$availablesz = array_filter ( $availablesize );
				array_shift( $availablesz  );
				if( count($availablesz) > 0 && in_array(trim($rowring['name']), $availablesz)) {
					continue;
				} else {
					if( !empty($ringsImage) ) {
						$rs_ring[] = array_merge($rowring, $ringsImage);
					}
				}
			}
		}
		$rings_json = $this->jsonFormate($rs_ring);
		return $rings_json;	
	}

	///// get rings img
	function getRingsImgViaId($style_id='') {
		$response = '';
		if($style_id != '') {
			$sql = "SELECT `ImagePath` FROM `images` WHERE `ItemNumber` = '".trim($style_id)."' LIMIT 1,1";
			$result = $this->db->query($sql);	
			$response = $result->result_array();
		}
		return isset($response[0])?$response[0]:array();	
	}

	function getengRingsImgViaId($style_id='') {
		$response = '';
		if($style_id != '') {
			$sql = "SELECT `image`, `image_path` FROM `dev_engagement_rings` WHERE `id` = '".trim($style_id)."' OR `dev_us_id` = '".trim($style_id)."' LIMIT 0,1";
			$result = $this->db->query($sql);	
			$response = $result->result_array();
		}
		return isset($response[0])?$response[0]:array();		
	}

	///// get comments list
	function getComentsListView($rid='') {
		$sql = "SELECT * FROM `dev_comments` WHERE ring_id = '".$rid."' AND status = 'AP' ORDER BY id DESC";
		$result = $this->db->query($sql);
		$response = $result->result_array();

		return $response;
	}

	function jsonFormate($ar) {
		header('Content-Type: application/json; charset=utf-8');
		$rt = json_encode($ar);

		return $rt;
	}

	///// get rapnet list when finish lievel is complete in unique
	function getRapnetListResult($shape='', $length='', $width='', $carat='') {
		$sql = "SELECT * FROM dev_rapproduct WHERE 1 = 1";
		if( !empty($shape) ) {
			$sql .= " AND shape ='{$shape}'";
		}
		if( !empty($length) ) {
			$sql .= " AND length LIKE '%{$length}%'";
		}
		if( !empty($width) ) {
			$sql .= " AND width LIKE '%{$width}%'";
		}
		if( !empty($carat) ) {
			$sql .= " AND carat ='{$carat}'";
		}

		$sql .= " AND price > 0 AND fcolor_value = '' AND Cert IN ('GIA','AGS')";
		$sql .= " ORDER BY price ASC LIMIT 1000";

        file_put_contents('rapnet_comp.txt', $sql);
        $query = $this->db->query($sql);
        $results = $query->result_array();

        return $results;
	}

	///// get rapnet list when finish lievel is complete in unique
	function get_rapnet_diamond_list($shape='', $carat='', $diamond_count=0) {
		$sql = "SELECT * FROM dev_rapproduct WHERE 1 = 1";
		if( !empty($shape) ) {
			$sql .= " AND shape ='{$shape}'";
		}
		if( !empty($carat) ) {
			$sql .= " AND carat ='{$carat}'";
		}

		$sql .= " AND price > 0 AND fcolor_value = '' AND Cert IN ('GIA','AGS')";
		$sql .= " ORDER BY price ASC LIMIT 1000";

		file_put_contents('rapnet_comp.txt', $sql);

		$query = $this->db->query($sql);
		$results = $query->result_array();

		return $results;
	}

	///// get rapnet list when finish lievel is complete in unique
	function get_center_match_stonelist($rows=array()) {
		$sql = "SELECT * FROM dev_rapproduct WHERE 1 = 1 AND lot != '{$rows['lot']}' AND shape = '{$rows['shape']}' AND carat = '{$rows['carat']}' AND cut = '{$rows['cut']}' AND clarity = '{$rows['clarity']}' AND Cert = '{$rows['Cert']}'";
		$sql .= " AND price > 0 AND fcolor_value = ''";
		$sql .= " ORDER BY lot ASC LIMIT 1";
        $query = $this->db->query($sql);
        $results = $query->result_array();

        return $results[0];
	}

	///// get the finger size resultes
	function getFingerSizeResult() {
		$sql = "SELECT `id`, `ring_size`, `priceRetail` FROM `dev_fingersize_temp` ORDER BY `ring_size_value` ASC";        
		$query = $this->db->query($sql);
		$results = $query->result_array();

		return $results;
	}

	// Data get with where from any table
	function delete_any_table($table_name, $id_name, $edited_id){
		$this->db->where($id_name, $edited_id);
   		$this->db->delete($table_name); 

		return true;
	}

	// Data get with where from any table
	function getdata_any_table_where($where = '', $table_name){
		$this->db->select('*');
		$this->db->where($where);
		$this->db->from($table_name);
		$query = $this->db->get();
		if ( $query->num_rows() > 0 ){
			return $query->result();
		}
	}

	// Data get with where from any table
	function getdata_any_table_where_asc($where = '', $table_name){
		$this->db->select('*');
		$this->db->where($where);
		$this->db->from($table_name);
		$this->db->order_by('sl', 'ASC');
		$query = $this->db->get();

	    if ( $query->num_rows() > 0 ){
	        return $query->result();
	    }
	}

	// Data get from without where any table
	function getdata_any_table_limit_order_where($table_name, $where, $limit, $offset, $order){
		$this->db->select('*');
		$this->db->where($where);
		$this->db->from($table_name);
		$this->db->limit($limit, $offset);
		$this->db->order_by($order, 'DESC');
		$query = $this->db->get();

	    if ( $query->num_rows() > 0 ){
			return $query->result();
	    }
	}

	// Data get from without where any table like
	function getdata_any_table_limit_order_by_where_like($table_name, $where, $limit, $offset, $order, $by, $like, $likeBy){
		$this->db->select('*');
		$this->db->where($where);
		$this->db->from($table_name);
		$this->db->like($likeBy,$like); //('value' , 'query date')
		$this->db->limit($limit, $offset);
		$this->db->order_by($order, $by);
		$query = $this->db->get();

		if ( $query->num_rows() > 0 ){
			return $query->result();
		}
	}

	// Data get from without where any table like
	function getdata_any_table_limit_order_by_where_like_after($table_name, $where, $limit, $offset, $like, $likeBy){
		$this->db->select('*');
		$this->db->where($where);
		$this->db->from($table_name);
		$this->db->like($likeBy,$like, 'after'); //('value' , 'query date')
		$this->db->limit($limit, $offset);
		$query = $this->db->get();

		if ( $query->num_rows() > 0 ){
			return $query->result();
		}
	}

	//// get finger size price
	function getFingerSizePrice($rsize ='') {
		$size_price = 0;
		if( !empty( $rsize ) ) {
			$ring_size = resetRingSize($rsize);

			$sql = "SELECT priceRetail FROM `dev_fingersize_temp` WHERE ring_size = '{$ring_size}' ORDER BY id DESC LIMIT 1";
			$query = $this->db->query($sql);
			$results = $query->result_array();
			$size_price = $results[0]['priceRetail']; // old price field: price_difference
		}
		return $size_price;
	}

	///// get stern parent category id
	function  stern_parent_cateid($cid=0) {
		$sql = "SELECT sub_cateid FROM `dev_overnight_cate` WHERE id = '{$cid}' ORDER BY id DESC LIMIT 1";        
		$query = $this->db->query($sql);
		$results = $query->result_array();

		return $results[0]['sub_cateid'];
	}

	function stern_main_parent_cid($cid=0) {
		$pid = $this->stern_parent_cateid($cid);
		$pid1 = $this->stern_parent_cateid($pid);
		$pid2 = $this->stern_parent_cateid($pid1);

		if( $pid2 > 0 ) {
			return $pid2;
		}
		if( $pid1 > 0 ) {
			return $pid1;
		}
		if( $pid > 0 ) {
			return $pid;
		}
	}

	function getRingbyCateory($cateid='', $offset=0, $limit=15, $ring_vid='', $metalvalue='', $sort='', $supplied_stone='', $build='') {
		$rs_ring = array();
		$resultRings = array();
		$resultsview = array();
		$priceMargin = $this->inventory_pric_margin($cateid, UNIQUE_OPTION);
		if($cateid != 0) {
			$sqlsring = "SELECT * FROM dev_engagement_rings WHERE 1=1 AND retail_price >= 100 ";
			if( !empty($search_string) ) {
				$sqlsring .= " AND `name` LIKE '%".$search_string."%'";
			}
			if( !empty($metalvalue) ) {
				$sqlsring .= " AND metal LIKE '{$metalvalue}'";
			}
			if( !empty($supplied_stone) ) {
				$sqlsring .= " AND stone_shape != ''";
			}
			if( !empty($build) ) {
				$sqlsring .= " AND diamond_weight != ''";
			}
			$count_sql = $sqlsring;
			$count_qr = $this->db->query($count_sql);
			$resultsview['total'] = $count_qr->num_rows();
			if($sort == 'Random'){
				$sqlsring .= " ORDER BY RAND() LIMIT $limit";
			}else{
				if( !empty( $sort ) ) {
					$sort_options = ( $sort == 'Name' ? "name ASC" : "retail_price $sort" );
					$sqlsring .= " ORDER BY $sort_options LIMIT $offset, $limit";
				} else {
					$sqlsring .= ( empty($ring_vid) ? " ORDER BY name ASC LIMIT $offset, $limit" : " ORDER BY RAND() LIMIT $limit" ); 
				}
			}  
			$sqlrings = $this->db->query($sqlsring);
			$results_rings = $sqlrings->result_array();
			foreach($results_rings as $rowsring) {
				$resultRings[] = $rowsring;
			}
		}
		$resultsview['results'] = $resultRings;
		return $resultsview;	
	}

	function checkRingType($pid) {
		$sql = "SELECT costar_id,overnight_id,dev_us_id FROM `dev_engagement_rings` WHERE id = '".$pid."'";        
		$query = $this->db->query($sql);
		$results = $query->row();

		return $results;
	}

	function getfineImages($pid) {
		$sql = "SELECT image1,image2 FROM `dev_jewelries_new` WHERE stock_number = '".$pid."'";        
		$query = $this->db->query($sql);
		$results = $query->row();

		return $results;
	}

	function getbandsImages($pid) {
		$sql = "SELECT ImagePath FROM `images` WHERE ItemNumber = '".$pid."'";        
		$query = $this->db->query($sql);
		$results = $query->row();

		return $results;
	}

}
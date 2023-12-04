<?php 
class Searchresultmodel extends CI_Model {

	function __construct(){
		parent::__construct();
	}	

	function getAllSearchResultByKey($inputkey){
		$qry = "SELECT * FROM ".config_item('table_perfix')."search WHERE keyfield like '%".$inputkey."%'";
		$return = 	$this->db->query($qry);
		$result = $return->result_array(); 
		return isset($result) ? $result : false;
	}

	function getSearchResult($per_pg, $offset,$inputkey='',$price='',$sort=''){
		if(!is_numeric($inputkey)){
			if($offset==""){
				$offset=0;
			}

			if($price=='') { $pricesql=''; }
			else{
				$pricefrom = $price - 999;
				$pricesql = " AND MSRP BETWEEN $pricefrom AND $price ";
			}

			if($sort=='') { $sort=''; }
			else{
				$sortsql = " ORDER BY '$sort' ";
			}

			$limit=" LIMIT ".$offset.",".$per_pg;
			$query = "SELECT * FROM ".config_item('table_perfix')."qg WHERE Item LIKE '%$inputkey%' OR Description LIKE '%$inputkey%' OR Attributes LIKE '%$inputkey%' OR Metal_Desc LIKE '%$inputkey%' OR qg_id = '$inputkey'".$sortsql.$pricesql.$limit;
			$return = 	$this->db->query($query);
			$result = $return->result_array();
			return $result;
		}else{
			if($offset==""){
				$offset=0;
			}

			if($price=='') { $pricesql=''; }
			else{
				$pricefrom = $price - 999;
				$pricesql = " AND MSRP BETWEEN $pricefrom AND $price ";
			}

			if($sort=='') { $sort=''; }
			else{
				$sortsql = " ORDER BY '$sort' ";
			}

			$limit=" LIMIT ".$offset.",".$per_pg;
			$inputkey = trim($inputkey);
			$query = "SELECT * FROM ".config_item('table_perfix')."qg WHERE qg_id = '$inputkey'".$sortsql.$pricesql.$limit;
			$return = 	$this->db->query($query);
			$result = $return->result_array();
			return $result;
		}
	}

	function numofrowsquality($inputkey){
		$sql = "SELECT  COUNT(*) as records FROM ".config_item('table_perfix')."qg WHERE Description LIKE '%$inputkey%' OR Attributes LIKE '%$inputkey%' OR Metal_Desc LIKE '%$inputkey%' OR qg_id LIKE '%$inputkey%'";
		$result = $this->db->query($sql);
		$result = $result->result_array();
		return $result[0]['records'];
	}

	function getezvalue(){
		$sql = "SELECT * FROM ezpayvalue";
		$result = $this->db->query($sql);
		return $result->result_array();
	}
}
?>
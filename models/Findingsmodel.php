<?php  
	class Findingsmodel extends CI_Model {
	var $dbf;
	
	function __construct()
	{
		parent::__construct();
		//$database1 = $this->load->database('findings', TRUE);
		//$this->dbf = $database1;
		
	}
	
	function getFindingsRingList($shtype='', $metals='', $min_price=0, $max_price=0) {		
		
		/// $ofset=0, $limit=12
		$results = array();
		$pos = strpos($shtype, '(');
		
		$sql = "SELECT *, df.id AS findings_id FROM z_dev_us_findings df INNER JOIN z_dev_us_findings_details fd ON df.name = fd.product_id INNER JOIN z_images di ON df.name = di.ItemNumber";
		$sql .= " WHERE 1=1";
		
		if( !empty($shtype) )
		{
			if(is_array($shtype) || $pos !== false) {
				$sql .= " AND df.stone_type IN ".$shtype;
			} else {
				$sql .= " AND df.stone_type ='".$shtype."'";	
			}
		}
		if( !empty($metals) ) {
				$sql .= " AND fd.metal_type IN ".$metals;
		}
		if($min_price == 0 && $max_price == 0) {
			$sql .= " AND fd.priceRetail > 0";
		} else {
			if($max_price > 0) {
				$sql .= " AND fd.priceRetail BETWEEN $min_price AND $max_price";
			}
		}
		$sql .= " GROUP BY fd.product_id, di.ItemNumber ORDER BY fd.metal_type ASC";
		$query = $sql;
		$total_rs = $this->db->query($query);
		$results['total']  = $total_rs->num_rows();
		//echo $sql;
		//$sql .= " LIMIT $ofset, $limit";
		$result = $this->db->query($sql);
		$results['result'] = $result->result_array();
		
		return $results;
	}
	
	function getFindingsRingDetails($id) {
		
		$query = "SELECT *, df.id AS findings_id FROM z_dev_us_findings df INNER JOIN z_dev_us_findings_details fd ON df.name = fd.product_id INNER JOIN z_images di 
		ON df.name = di.ItemNumber WHERE df.id = '".$id."' GROUP BY fd.product_id, di.ItemNumber
		ORDER BY fd.metal_type ASC";
		$rs 	 = $this->db->query($query);
		$results = $rs->result_array();
		
		return $results[0];
	}
	
	///// get similar findings earing list
	function getSimilarFindingsEaring($rowfd='') {
		
		$results = '';
		
		if( !empty($rowfd) )
		{
			$query = "SELECT *, df.id AS findings_id FROM z_dev_us_findings df INNER JOIN z_dev_us_findings_details fd ON df.name = fd.product_id INNER JOIN z_images di 
			ON df.name = di.ItemNumber WHERE df.id <> '".$rowfd['findings_id']."' AND df.stone_type = '".$rowfd['stone_type']."' AND fd.metal_type = '".$rowfd['metal_type']."' GROUP BY fd.product_id, di.ItemNumber
			ORDER BY fd.metal_type ASC LIMIT 3";
			$rs 	 = $this->db->query($query);
			$results = $rs->result_array();
		}
		
		return $results;
	}
		 
}
?>

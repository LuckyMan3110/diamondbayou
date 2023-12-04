<?php  
	class Webservicemodel extends CI_Model {
		//public $wbdb;
	
	function __construct()
	{
		parent::__construct();
		//$this->wbdb = $this->load->database('scraper', TRUE);
		$this->wbdb = $this->load->database('websrvicedb', TRUE);
	}
	
	function getMainCateViewList() {
		
		
		$sql = "SELECT * FROM dev_us_catagories WHERE pid = '0' ORDER BY catname ASC";
		$result = $this->db->query($sql);	
		$response = $result->result_array();
		
		var_dump($sql); echo '<br>';
		var_dump($result);echo '<br>';
		var_dump($response);echo '<br>';
		
		$this->db->close();
		$this->wbdb->close();
		
		print_ar($response);
		
		$caterow = $this->jsonFormate($response);
		return $caterow;
	}
	
	///// sub category
	function getSubCategory($cateid='') {
		$response = array();
		
		if($cateid != 0) {
				$sql = "SELECT * FROM dev_us_catagories WHERE pid = '".$cateid."' ORDER BY catname ASC";
				$result = $this->wbdb->query($sql);	
				$response = $result->result_array();						
				
			}
			
		$rows_json = $this->jsonFormate($response);
		return $rows_json;	
	}
	 
	////// get rings by category
	function getRingsViaCate($cateid='', $offset=0, $perpage=24) {
		$rs_ring = array();
		$start = ( !empty($offset) ? $offset : 0 );
		
		if($cateid != 0) {
				$sql = "SELECT * FROM dev_us WHERE catid = '".$cateid."' ORDER BY name ASC LIMIT $start, $perpage";
				$result = $this->wbdb->query($sql);	
				$response = $result->result_array();
				
				foreach($response as $rowring) {
					$ringsImage = $this->getRingsImgViaId($rowring['name']);
					
					$availablesize = explode('|', trim($rowring['availblesize']));
					$availablesz = array_filter ( $availablesize );
					array_shift( $availablesz  );
					//if( count($availablesz) > 0 ) {
						if( count($availablesz) > 0 && in_array(trim($rowring['name']), $availablesz)) {
							continue;
						} else {
							if( !empty($ringsImage) ) {
								$rs_ring[] = array_merge($rowring, $ringsImage);
							}
						}
					}
			}
			//print_ar($rs_ring);
		$rings_json = $this->jsonFormate($rs_ring);
		return $rings_json;	
	}
	
	///// get rings img
	///// sub category
	function getRingsImgViaId($style_id='') {
		$response = '';
		if($style_id != '') {
				$sql = "SELECT `ImagePath` FROM `images` WHERE `ItemNumber` LIKE '%".trim($style_id)."%' LIMIT 0,1";
				$result = $this->wbdb->query($sql);	
				$response = $result->result_array();						
				
			}
			
		return $response[0];	
	}
	
	function jsonFormate($ar) {
		header('Content-Type: application/json; charset=utf-8');
		
		$rt = json_encode($ar);
		return $rt;
	}
		 
}
?>

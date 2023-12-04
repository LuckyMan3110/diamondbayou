<?php 

class Searchresultmodel extends CI_Model {

	function __construct(){
		parent::__construct();
	}	
	
	function addQualityData(){
	$isinsert = $this->db->insert($this->config->item('table_perfix') . 'us_prices', array(
                'productId' => $data[0],
                'matalType' => $data[1],
                'ringSize' => $data[2],
                'price' => $data[3],
                'polishOn' => $data[4],
                'tumbleOn' => $data[5],
                    ));
	}
}
?>

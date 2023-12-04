<?php
class Csvadminmodel extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	/* get single row of loose search */
	function getSingleloseSearch($id) {
		$sql_sr = "SELECT id, search_string FROM dev_saveloosesearch WHERE id = '".$id."' ORDER BY id DESC LIMIT 1";
		$search_filtr = $this->db->query($sql_sr);
		$results = $search_filtr->result_array();

		return $results[0];
	}

	function getExportedDiamondList($id, $searsck='', $options='') {
		$saveFilterList = $this->getSingleloseSearch($id); 

		$filterView = unserialize($saveFilterList['search_string']);
		$custfilter['diamondscat'] = !empty($filterView['diamondscat']) ? $filterView['diamondscat'] : '';
		$custfilter['caratmin'] = !empty($filterView['caratmin']) ? $filterView['caratmin'] : '';
		$custfilter['caratmax'] = !empty($filterView['caratmax']) ? $filterView['caratmax'] : '';
		$custfilter['color'] = !empty($filterView['color']) ? setImplodValue($filterView['color']) : '';
		$custfilter['cut'] = !empty($filterView['cut']) ? setImplodValue($filterView['cut']) : '';
		$custfilter['shape'] = !empty($filterView['shape']) ? setImplodValue($filterView['shape']) : '';
		$custfilter['clarity'] = !empty($filterView['clarity']) ? setImplodValue($filterView['clarity']) : 0;
		$custfilter['cert'] = !empty($filterView['cert']) ? setImplodValue($filterView['cert']) : '';
		$custfilter['fancy_color'] = !empty($filterView['fancycolor']) ? setImplodValue($filterView['fancycolor']) : '';

		$custom_filter_string = "";
		if($custfilter['diamondscat'] == "White Diamonds"){
			$custom_filter_string.=" AND fancy_color = '' AND member_coment != 'CLARITY ENHANCED'";
		}else if($custfilter['diamondscat'] == "Clarity Diamonds"){	
			$custom_filter_string.=" AND member_coment = 'CLARITY ENHANCED'";
		}else if($custfilter['diamondscat'] == "Colored Diamonds"){	
			$custom_filter_string.=" AND fancy_color != ''";
		}

		if( !empty($custfilter['shape']) ) {
			$custom_filter_string.=" AND shape IN ('" . $custfilter['shape'] . "') ";
		}

		if( !empty($custfilter['cut']) ) {
			$custom_filter_string.=" AND cut IN ('" . $custfilter['cut'] . "') ";
		}

		if( !empty($custfilter['color']) ) {
			$custom_filter_string.=" AND color IN ('" . $custfilter['color'] . "') ";
		}

		if( !empty($custfilter['clarity']) ) {
			$custom_filter_string.=" AND clarity IN ('" . $custfilter['clarity'] . "') ";
		}
		$certlist = array('EGL', 'EGL OTHER');

		if( !empty($custfilter['cert']) ) {
			$custom_filter_string.=" AND Cert IN ('" . $custfilter['cert'] . "') ";
			if( in_array($custfilter['cert'], $certlist)) {
				$custom_filter_string.= " OR Cert LIKE 'EGL OTHER'";
			}
		}

		if( !empty($custfilter['fancy_color']) ) {
			$custom_filter_string.=" AND fancy_color IN ('" . $custfilter['fancy_color'] . "') ";
		}

		if( !empty($custfilter['caratmax']) ) {
			$custom_filter_string.=" AND carat >= '" . $custfilter['caratmin'] . "' AND carat <= '" . $custfilter['caratmax'] . "'";
		}

		/* prices for sears and amazon marketplaces */
		if( !empty($options) ) {
			$priceForSearsAmazon = " ( (price*carat*6) )";   
		} else {
			$priceForSearsAmazon = " ( (price*carat*6) )";
		}

		if( !empty($searsck) && $searsck != 'amazon' ) {
			$custom_filter_string.=" AND $priceForSearsAmazon <= 99999.99 AND shape <> 'BRIOLETTE'";
		}
		if( !empty($options) && $options == 'buy' ) {
			$custom_filter_string.=" AND color != 'W' AND shape <> 'BRIOLETTE'";
		}

		$sql_csv = "SELECT *, (price*carat*6) ourprice, $priceForSearsAmazon discountPrice FROM dev_rapproduct rp WHERE 1 = 1 ".$custom_filter_string;    
		$sqlcsv = $this->db->query($sql_csv);
		$resultsdata = $sqlcsv->result_array();

		return $resultsdata;
    }
}
?>
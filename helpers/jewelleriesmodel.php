<?php
/**
* model class used for displaying jewelleries entered by the sellers...
* @param string
* @return string
* @since 24, March 2013
* @Author Maninder Singh
*/
class Jewelleriesmodel extends CI_Model{
	public $diamond_metal = '', $scrap_db;
	function __construct(){
	
		parent::__construct();
		//$this->scrap_db = $this->load->database('scraper', TRUE);
	}
	/**
	* model class used for displaying jewelleries entered by the sellers...
	* @param string
	* @return string
	* @since 24, March 2013
	* @Author Maninder Singh
	*/
	function getUniqueScrap()
	{
		$sql = "SELECT  * FROM  dev_us WHERE name = 'ENR8269'";
		$result = $this->db->query($sql);
		$results['result'] = $result->result_array();
		return $results;
	}
	///// unique section fetch from scrap
	function getUniqueCategory($pid)
	{
		$sql = "SELECT  * FROM  dev_us_catagories WHERE pid = '".$pid."' ORDER BY cate_sort ASC";
		$result = $this->db->query($sql);
		$results = $result->result_array();
		return $results;
	}
	function getNumUniquEngageQuality($catname)
	{
		$sql = "SELECT  COUNT(*) as records FROM dev_us WHERE name like '%".str_replace('_', ' ', $catname)."%'";
		$result = $this->db->query($sql);
		$result = $result->result_array();
		return $result[0]['records'];
	}
	function numOfRowsofUnique($catid)
	{
		$sql = 'SELECT  COUNT(*) as records FROM dev_us WHERE catid='.$catid.'';
		$result = $this->db->query($sql);
		$result = $result->result_array();
		return $result[0]['records'];
	}
	function getUniqueFromScrap($per_pg,$offset,$catname,$carat='')
	{
		if($carat=='') { $caratsql='';}
		else{
			$caratfrom = $carat - 0.24;
			$caratsql = " AND metal_weight BETWEEN $caratfrom AND $carat ";
		}
		
		if($offset==""){
			$offset=0;
		}
		$limit=" LIMIT ".$offset.",".$per_pg;
		$sql = "SELECT  * FROM dev_us WHERE id <> '' AND image <> '' AND catid=".$catname.''.$caratsql.$limit;
		$result = $this->db->query($sql);
		$results['result'] = $result->result_array();
		//echo $sql;exit;
		return $results;
	}
	function getEngagementQualityFromScrap($per_pg, $offset,$catname,$carat='',$sort='ASC')
	{
		if($carat=='') { $caratsql='';}
		else{
			$caratfrom = $carat - 0.24;
			$caratsql = " AND ds.metal_weight BETWEEN '$caratfrom gr.' AND '$carat gr.' ";
		}
		//$caratsql .= " AND image <> '' AND id <> ''";
		
		if($offset==""){
			$offset=198;
		}
		$limit=" LIMIT ".$offset.",".$per_pg;
		$sql = 'SELECT  * FROM dev_us WHERE name like "%'.str_replace('_', ' ', $catname).'%"'.$caratsql.$limit;
		/*$sql = "SELECT ds.id, ds.catid, ds.image, ds.metal_weight, ds.`name`, ds.ring_size, ds.style_group, ds.top_height, ds.top_width, ds.bottom_height, 
				ds.bottom_width, dp.price AS ring_price FROM dev_us ds LEFT JOIN dev_us_prices dp ON ds.style_group = dp.productID
				WHERE dp.matalType = '18K White' AND dp.ringSize = '6' AND ds.name like '%".str_replace('_', ' ', $catname)."%' AND ds.image <> '' AND ds.id <> ''".$caratsql." 
				ORDER BY dp.price $sort".$limit;*/

		$result = $this->db->query($sql);
		$results['result'] = $result->result_array();
		return $results;
	}
	function saveRingComments($post) {
		$rings_id   = $post['rings_id'];
		$full_name   = $post['full_name'];
		$email_adres = $post['email_adres'];
		$cmb_rating  = $post['cmb_rating'];
		$tr_comments = $post['tr_comments'];
		$coment_date = date('Y-m-d');
		$userID = (  $this->session->isLoggedin() ? $this->session->userdata('userid') : '' );
		
		$sql_check = "SELECT * FROM dev_comments WHERE ring_id = '".$rings_id."' AND user_id = '".$userID."'";
		$query = $this->db->query($sql_check);
		
		if($query->num_rows() == 0 || $userID == '')
		{
		$sql = "INSERT INTO dev_comments (ring_id, user_id, full_name, email_adress, post_comments, coments_rating, coment_date) VALUES ('".$rings_id."','".$userID."','".$full_name."', '".$email_adres."', '".$tr_comments."', '".$cmb_rating."', '".$coment_date."')";
		$this->db->query($sql);
			
			return true;
		}
		
		return false;
	}
	///// fetch comments
	function getRingComments($id) {
				
		$sql = "SELECT * FROM dev_comments WHERE ring_id = '".$id."'";
		$query = $this->db->query($sql);
		$results = $query->result_array();
		
		return $results;
	}
	//////////////
	function getuniqueproductFromScrap($per_pg,$offset,$catname,$carat='')
	{
		if($carat=='') { $caratsql='';}
		else{
			$caratfrom = $carat - 0.24;
			$caratsql = " AND metal_weight BETWEEN $caratfrom AND $carat ";
		}
		
		if($offset==""){
			$offset=0;
		}
		$limit=" LIMIT ".$offset.",".$per_pg;
		$sql = "SELECT  * FROM dev_us WHERE image <> '' AND id <> '' AND catid=".$catname.''.$caratsql.$limit;
		$result = $this->db->query($sql);
		$results['result'] = $result->result_array();
		return $results;
	}
	function getAlluniquecat21FromScrap()
	{
		
		$sql = 'SELECT DISTINCT catname,pid,id FROM dev_us_catagories WHERE id NOT IN (230,119,466) AND pid=0 LIMIT 7';
		$result = $this->db->query($sql);
		$results['result'] = $result->result_array();
		return $results;
	}
	function buildChildFromScrap($oldID)			// Recursive function to get all of the children...unlimited depth
	{
		$sql = 'SELECT * FROM dev_us_catagories WHERE pid='.$oldID;
		$result = $this->db->query($sql);
		$results['result'] = $result->result_array();
		return $results;
	}
	function getRingMetalsFromScrap($id_list){
		$results = '';
		if(count($id_list) > 0) {	
			$prodID = "'".implode("','", $id_list)."'";
			
			$sql = "SELECT matalType FROM dev_us_prices WHERE productId IN ($prodID) GROUP BY matalType ORDER BY matalType ASC";
			$result = $this->db->query($sql);
			$results = $result->result_array();
			return $results;
		}
	}
	function getPricesUniqueFromScrap($id){
		$sql = "SELECT price FROM dev_us_prices where productid = '$id' and matalType = '18K White' and ringSize = '6' limit 1";
		$result = $this->db->query($sql);
		$results=$result->result_array();
		return $results[0];
	}
	//////////////////////
	function getAlluniquecat()
	{
		$sql = 'SELECT  * FROM  dev_us_catagories';
		$result = $this->db->query($sql);
		$results['result'] = $result->result_array();
		return $results;
	}
	function  cat_namebyid($id){
		$sql = 'SELECT DISTINCT catname,pid,id FROM  dev_us_catagories where id='.$id;
		$result = $this->db->query($sql);
		$results['result'] = $result->result_array();
		return $results;
	}
	function getAlluniquecat21()
	{
		
		$sql = 'SELECT DISTINCT catname,pid,id FROM dev_us_catagories WHERE id NOT IN (230,119,466) AND pid=0 LIMIT 7';
		$result = $this->db->query($sql);
		$results['result'] = $result->result_array();
		return $results;
	}
	function build_child($oldID)			// Recursive function to get all of the children...unlimited depth
	{
		$sql = 'SELECT * FROM dev_us_catagories WHERE pid='.$oldID;
		$result = $this->db->query($sql);
		$results['result'] = $result->result_array();
		return $results;
	}
	function numofrowsunique2($catname)
	{
		 $sql = 'SELECT  COUNT(*) as records FROM dev_us WHERE catid='.$catname.'';
		$result = $this->db->query($sql);
		$result = $result->result_array();
		return $result[0]['records'];
	}
	function getnumberofus($catname)
	{
		echo $sql = 'SELECT  COUNT(*) as records FROM dev_us WHERE catid='.$catname.'';
		
		$result = $this->db->query($sql);
		$result = $result->result_array();
		return $result[0]['records'];
	}
	function numofrowsunique($catname)
	{
		$sql = 'SELECT  COUNT(*) as records FROM dev_us WHERE catid='.$catname.'';
		$result = $this->db->query($sql);
		$result = $result->result_array();
		return $result[0]['records'];
	}
	function getuniqueproduct($per_pg,$offset,$catname,$carat='')
	{
		if($carat=='') { $caratsql='';}
		else{
			$caratfrom = $carat - 0.24;
			$caratsql = " AND metal_weight BETWEEN $caratfrom AND $carat ";
		}
		
		if($offset==""){
			$offset=0;
		}
		$limit=" LIMIT ".$offset.",".$per_pg;
		$sql = "SELECT  * FROM dev_us WHERE image <> '' AND id <> '' AND catid=".$catname.''.$caratsql.$limit;
		$result = $this->db->query($sql);
		$results['result'] = $result->result_array();
		return $results;
	}
	//// get jewelleries
	function getUnProdList($per_pg, $offset,$cate_idar, $halo, $bridal, $slide, $ck)
	{
		if(!empty($halo) || !empty($bridal)) {
			$ofset_rg = 198;
		} else {
			$ofset_rg = 0;
		}
		$pageGap = (!empty($offset) ? $offset : $ofset_rg);
		$limit=" LIMIT ".$pageGap.",".$per_pg;
		
		$sql_qr = "SELECT `catid`,`name`,`image`,`style_group`,`ezstatus` FROM dev_us WHERE 1=1 ";
		$sql_ck = $sql_qr." AND catid IN (SELECT id FROM dev_us_catagories WHERE pid IN ( $cate_idar ))";
		
		$check_rc = $this->check_ringrc($sql_ck);
		if($check_rc > 0) {
			$sq = " AND catid IN (SELECT id FROM dev_us_catagories WHERE pid IN ( $cate_idar ))";
		} else {
			if(count($cate_idar) > 0) { 
			$sq = " AND catid IN ($cate_idar)";
			} else {
			$sq = " AND catid IN ('')";	
			}
		}
		$sql .= $sql_qr.$sq;
		if(!empty($halo)) {
			$sql .= " OR name LIKE '%Engagement Rings%'";
		}
		if(!empty($bridal)) {
			$sql .= " OR name LIKE '%Bridal Ring%'";
		}
		if(!empty($slide) && count($ck) == 1) {
			$off_set = ($offset == 0 ? 18 : $offset);
			$sql .= " OR name LIKE '%Engagement Rings%' LIMIT $off_set,$per_pg";
		} else {
			$sql .= " $limit";
		}
		
		$result = $this->db->query($sql);
		$results['result'] = $result->result_array();
		return $results;
	}
	//// cehck count for tripple x cut
	function checkTripleXCut($color) {
		$sql = "select shape FROM dev_rapproduct WHERE fcolor_value = '".$color."' AND Polish = 'EX' AND cut = 'EX' AND Sym = 'EX' AND cert IN ('GIA','AGS') GROUP BY shape";
		$query = $this->db->query($sql);
		$total_recr = $query->num_rows();
		return $total_recr;
	}
	////// count total records
	function getTotalRingRecord($ids, $halo, $bridal, $slide, $check) {
		
		$sql_qr = "SELECT * FROM dev_us WHERE 1=1 ";
		$sql_ck = $sql_qr." AND catid IN (SELECT id FROM dev_us_catagories WHERE pid IN ( $ids ))";
		
		$check_rc = $this->check_ringrc($sql_ck);
		if($check_rc > 0) {
			$sq = " AND catid IN (SELECT id FROM dev_us_catagories WHERE pid IN ( $ids ))";
		} else {
			if(is_numeric($ids)) { 
			$sq = " AND catid IN ($ids)";
			} else {
			$sq = " AND catid IN ('')";	
			}
		}
		$sql .= $sql_qr.$sq;
		
		if(!empty($halo)) {
			$sql .= " OR name LIKE '%Engagement Rings%'";
		}
		if(!empty($bridal)) {
			$sql .= " OR name LIKE '%Bridal Ring%'";
		}
		if(!empty($slide) && count($check) == 1) {
			$sql .= " OR name LIKE '%Engagement Rings%' LIMIT 18,500000";
		}
		
		$query = $this->db->query($sql);
		$total_recr = $query->num_rows();

		return $total_recr;
	}
	//// get category parent id
	function getParentId($cid) {
		$query = $this->db->query("SELECT pid FROM dev_us_catagories WHERE id = '$cid' LIMIT 1");

		$row = $query->row();
		return $row->pid;
	}
	/// get rapnnet column values
	function getRappnetColumnValue($cols='fancy_color_ot') {
		$diamIntensity = $this->session->userdata('diamond_intensity');
		$diamColor = $this->session->userdata('diamond_colrname');
		
		$sql = "SELECT $cols FROM dev_rapproduct WHERE $cols != '' AND $cols != 'None'";
		
		if( $cols == 'fancy_color_ot' ) {
			if( !empty($diamIntensity) ) {
				$sql .= " AND fancy_color_intens LIKE '".$diamIntensity."'";
			}
		}
		if( $cols != 'fcolor_value' && !empty($diamColor) ) {
			$sql .= " AND fcolor_value = '".$diamColor."'";
		}
		$sql .= " GROUP BY $cols ORDER BY $cols ASC";
		
		$result = $this->db->query($sql);
		$results = $result->result_array();
		return $results;
	}
	/// get rapnnet column values
	///// Note: $where[0] get the db column name and $where[1] get the dynamic value
	function getRappnetShapesValue($field='shape', $where=array(), $qry='') {
		$shape_query = $this->session->userdata( 'getShapeQuery' );
		if($qry === '' || $shape_query) {
				$sql = "SELECT $field FROM dev_rapproduct WHERE $where[0] = '$where[1]' ";
			if($field == 'shape') {
				$sql .= " AND cert IN ('GIA','AGS') AND clarity in ('FL','IF','VVS1','VVS2','VS1','VS2','SI1','SI2','SI3', 'I1') AND cut in ('Ex','VG','G','F','','I')";
			}
			$sql .= " GROUP BY $field ORDER BY $where[0] ASC";
		} else {
			$sql = str_replace("fcolor_value = 'Orange'", "$where[0] = '$where[1]'", $this->session->userdata( 'getShapeQuery' )). " GROUP BY $field ";
		}
		$result = $this->db->query($sql);
		$results = $result->result_array();
		return $results;
	}
	function check_ringrc($sql) {
		$query = $this->db->query($sql);
		$nums  = $query->num_rows();
		return $nums;	
	}
	////// get sub categories of all unique collections styles
	function getAllUniqueCategories($cid, $start, $ppage, $pg='')
	{
		if(!empty($cid)) {
			$catesID = $cid;
		} else {
			$catesID = "'171', '213', '69', '10', '264', '199', '200', '226', '223'";
		}
		$sql = "SELECT DISTINCT catname,pid,id FROM `dev_us_catagories` WHERE `pid` IN ( $catesID )";
		if(empty($pg)) {
			$sql .= " LIMIT $start, $ppage";
		}
		$result = $this->db->query($sql);
		$results['result'] = $result->result_array();
		return $results;
	}
	function getAlluniquecat2()
	{
		
		$sql = 'SELECT DISTINCT catname,pid,id FROM dev_us_catagories WHERE id NOT IN (230,119,466) AND pid=0 LIMIT 7';
		$result = $this->db->query($sql);
		$results['result'] = $result->result_array();
		return $results;
	}
	function getAllstullermyinfo($per_pg, $offset,$catname)
	{
		if($offset==""){
			$offset=0;
		}
		$limit=" LIMIT ".$offset.",".$per_pg;
		
		$sql = 'SELECT  * FROM dev_stuller WHERE Videos != "" '.$limit;
		
		
		$result = $this->db->query($sql);
		$results['result'] = $result->result_array();
		return $results;
	}
	/////// get metal according to the ring
	function getRingMetals($id_list){
		$results = '';
		if(count($id_list) > 0) {	
			$prodID = "'".implode("','", $id_list)."'";
			
			$sql = "SELECT matalType FROM dev_us_prices WHERE productId IN ($prodID) GROUP BY matalType ORDER BY matalType ASC";
			$result = $this->db->query($sql);
			$results = $result->result_array();
			return $results;
		}
	}
	function getminestuller($per_pg, $offset,$catname,$carat='',$price='')
	{
		if($carat=='') { $caratsql='';}
		else{
			$caratfrom = $carat - 0.24;
			$caratsql = " AND Weight BETWEEN $caratfrom AND $carat ";
		}
		if($price=='') { $pricesql=''; }
		else{
			$pricefrom = $price - 999;
			$pricesql = " AND Price BETWEEN $pricefrom AND $price ";
		}

		if($offset==""){
			$offset=0;
		}
		$limit=" LIMIT ".$offset.",".$per_pg;
		
			$sql = 'SELECT  * FROM dev_stuller WHERE MerchandisingCategory1 = "'.str_replace('_', ' ', $catname).'" '.$caratsql.$pricesql.$limit;
		
		
		$result = $this->db->query($sql);
		$results['result'] = $result->result_array();
		return $results;
	}
	function getallstullerandquantity($per_pg, $offset,$carat='',$price='',$status='')
	{	

		if($status=='' || is_numeric($status)) 
		{ 
			$sstatussql="WHERE Status = 'Special Order' OR Status = 'Made To Order' OR Status = 'Limited Availability' OR Status = 'While supplies last' "; 
			$qstatussql="WHERE Status = 'CloseOut' "; 
			$con = "WHERE";
		}
		else{
			$con = "AND";
			$status = str_replace('_', ' ', $status);
			$sstatussql = " WHERE Status = '$status' ";
			$qstatussql = " WHERE Status = '$status' ";
		}

		if($carat=='') { $caratsql='';}
		else{
			$caratfrom = $carat - 0.24;
			$caratsql = " $con Weight BETWEEN $caratfrom AND $carat ";
		}
		if($price=='') { $pricesql=''; }
		else{
			$pricefrom = $price - 999;
			$pricesql = " $con Price BETWEEN $pricefrom AND $price ";
		}		

		if($offset==""){
			$offset=0;
		}
		$limit=" LIMIT ".$offset.",".$per_pg;
	
		$sql = 'SELECT  * FROM dev_stuller '.$sstatussql.$caratsql.$pricesql.$limit;
	 	$result = $this->db->query($sql);
		$results['result'] = $result->result_array();
		$j = count($results['result']);
		$sql = 'SELECT  * FROM dev_qg '.$qstatussql.$caratsql.$pricesql.$limit;
		$result2 = $this->db->query($sql);
		
		$result2 = $result2->result_array();
		for($i = 0; $i < count($result2); $i++) {
			$results['result'][$i + $j] = $result2[$i];
		}
		return $results;
	}
	/////// get depth min and max
	function getDepthMinMax($shapelist = '') {
        $shapemax = '';
        $shapemin = '';
        $min = 100;
        $max = 0;
        if (($this->session->userdata('shape'))) {

            $shapes = $this->session->userdata('shape');
            $shapelist = explode('.', $shapes);

            if (sizeof($shapelist > 0)) {
                foreach ($shapelist as $val) {
                    if ($val != '') {
                        switch ($val) {
                            case 'B' :
                                $shapemin = '56.5';
                                $shapemax = '67';
                                break;
                            case 'PR' :
                                $shapemin = '55';
                                $shapemax = '86';
                                break;
                            case 'R' :
                                $shapemin = '55';
                                $shapemax = '86';
                                break;
                            case 'E' :
                                $shapemin = '54';
                                $shapemax = '79';
                                break;
                            case 'AS' :
                                $shapemin = '54';
                                $shapemax = '79';
                                break;
                            case 'O' :
                                $shapemin = '50';
                                $shapemax = '74';
                                break;
                            case 'M' :
                                $shapemin = '50';
                                $shapemax = '74';
                                break;
                            case 'P' :
                                $shapemin = '50';
                                $shapemax = '74';
                                break;
                            case 'H' :
                                $shapemin = '45';
                                $shapemax = '65';
                                break;
                            case 'C' :
                                $shapemin = '54';
                                $shapemax = '73';
                                break;
                            default :
                                $shapemin = '10';
                                $shapemax = '100';
                                break;
                        }
                        if ($shapemin < $min)
                            $min = $shapemin;
                        if ($shapemax > $max)
                            $max = $shapemax;
                    }
                }
            } else {
                $min = '10';
                $max = '100';
            }
        } else {
            $min = '10';
            $max = '100';
        }
        return array(
            $min,
            $max);
    }
	////// get table min and max
	function getTableMinMax($shapelist = '') {
        $shapemax = '';
        $shapemin = '';
        $min = 100;
        $max = 0;
        if (($this->session->userdata('shape'))) {

            $shapes = $this->session->userdata('shape');
            $shapelist = explode('.', $shapes);
            if (sizeof($shapelist > 0)) {
                foreach ($shapelist as $val) {
                    if ($val != '') {
                        switch ($val) {
                            case 'B' :
                                $shapemin = '50';
                                $shapemax = '67';
                                break;
                            case 'PR' :
                                $shapemin = '51';
                                $shapemax = '89';
                                break;
                            case 'R' :
                                $shapemin = '51';
                                $shapemax = '89';
                                break;
                            case 'E' :
                                $shapemin = '51';
                                $shapemax = '79';
                                break;
                            case 'AS' :
                                $shapemin = '51';
                                $shapemax = '79';
                                break;
                            case 'O' :
                                $shapemin = '50';
                                $shapemax = '71';
                                break;
                            case 'M' :
                                $shapemin = '50';
                                $shapemax = '71';
                                break;
                            case 'P' :
                                $shapemin = '50';
                                $shapemax = '71';
                                break;
                            case 'H' :
                                $shapemin = '51';
                                $shapemax = '70';
                                break;
                            case 'C' :
                                $shapemin = '49';
                                $shapemax = '71';
                                break;
                            default :
                                $shapemin = '10';
                                $shapemax = '100';
                                break;
                        }
                        if ($shapemin < $min)
                            $min = $shapemin;
                        if ($shapemax > $max)
                            $max = $shapemax;
                    }
                }
            } else {
                $min = '10';
                $max = '100';
            }
        } else {
            $min = '10';
            $max = '100';
        }
        return array(
            $min,
            $max);
    }
	/////////////////////
	function getminestullerwithsub($per_pg, $offset,$catname,$maincat,$carat='',$price='',$status='')
	{
		if($carat=='') { $caratsql='';}
		else{
			$caratfrom = $carat - 0.24;
			$caratsql = " AND Weight BETWEEN $caratfrom AND $carat ";
		}
		if($price=='') { $pricesql=''; }
		else{
			$pricefrom = $price - 999;
			$pricesql = " AND Price BETWEEN $pricefrom AND $price ";
		}

		if($status=='' || is_numeric($status)) { $statussql=''; }
		else{
			$status = str_replace('_', ' ', $status);
			$statussql = " AND Status = '$status' ";
		}

		if($offset==""){
			$offset=0;
		}
		$limit=" LIMIT ".$offset.",".$per_pg;
	
		 $sql = 'SELECT  * FROM dev_stuller WHERE MerchandisingCategory1 = "'.str_replace('_', ' ', $catname).'" AND Description!="" AND MerchandisingCategory2="'.$maincat.'s"'.$caratsql.$statussql.$pricesql.' group by Description '.$limit;

		/*echo $sql;
		die;*/
		$result = $this->db->query($sql);
		$results['result'] = $result->result_array();
		return $results;
	}
	///// get stuller records
	function getStullerRecordsList($per_pg, $offset=0, $catname) {
		$offset = ( !empty($offset) ? $offset : 0  );
		$limit=" LIMIT ".$offset.",".$per_pg;
		$secondCate = ucwords ( trim($catname) );
		
		$cateList = 'SELECT MerchandisingCategory2 FROM dev_stuller WHERE MerchandisingCategory1 <> "" AND MerchandisingCategory2 <> "" AND Description!="" GROUP BY MerchandisingCategory2';
		$catelist_qr = $this->db->query($cateList);
		$results_catelist = $catelist_qr->result_array();
		
		$sql = 'SELECT  * FROM dev_stuller WHERE MerchandisingCategory1 = "'.str_replace('_', ' ', $catname).'" AND MerchandisingCategory2 <> "" AND Description!=""';
		
		$result = $this->db->query($sql);
		$results = $result->result_array();
		
		if( in_array($secondCate, $results_catelist) ) {
			$sql_new = 'SELECT * FROM dev_stuller WHERE MerchandisingCategory2 LIKE "'.$secondCate.'%" AND MerchandisingCategory1 <> "" AND Description!=""';
		} else {
			if(count($results) > 0) {
			$sql_new = $sql;
			} else {
				$sql_new = 'SELECT  * FROM dev_stuller WHERE MerchandisingCategory2 LIKE "'.$secondCate.'%" AND MerchandisingCategory1 <> "" AND Description!=""';
			}	
		}
		
		
		$sql_new .= " group by Description ";
		$result_count = $this->db->query($sql_new);
		$resultsnew['total_records'] = $result_count->num_rows();
		$sql_new .= $limit;
		
		//echo $sql_new;
		
		$result_new = $this->db->query($sql_new);
		$resultsnew['results'] = $result_new->result_array();
		
		return $resultsnew;
	}
	///// get unique in search list
	function getUniqueInSearchList($per_pg, $offset, $inputstring='') {
				
		if($offset==""){
			$offset=198;
		}
		$limit = " LIMIT ".$offset.",".$per_pg;
		$inputstring = trim($inputstring);
		
		$sql = 'SELECT * FROM dev_us WHERE style_group like "'.$inputstring.'"';
		$result = $this->db->query($sql);
		$results_count = $result->num_rows();
		
		if($results_count > 0) {
			$sqlnew = $sql;
		} else {
			$sqlnew = 'SELECT * FROM dev_us WHERE name like "%'.str_replace('_', ' ', $catname).'%"';
		}
		
		$resultcount = $this->db->query($sqlnew);		
		$return['total_records'] = $resultcount->num_rows();
		
		$sqlnew .= $limit;
									
		$resultnew = $this->db->query($sqlnew);
		$return['results'] = $result->result_array();
		
		return $return;
	}
	
	////// get similar diamond stuller products
	function getSimillarStuller($id, $cate1, $cate2){
		$sql = "SELECT * FROM dev_stuller WHERE MerchandisingCategory1 = '".$cate1."' AND Description != '' AND MerchandisingCategory2 = '".$cate2."s' AND stuller_id != '".$id."' group by Description ORDER BY stuller_id DESC LIMIT 3";
		$result = $this->db->query($sql);
		$results = $result->result_array();
		return $results;
	}
	function getminestullerwithsub_max($catname,$maincat)
	{
	
		$sql = 'SELECT Price FROM dev_stuller WHERE MerchandisingCategory1 = "'.str_replace('_', ' ', $catname).'" AND Description!="" AND MerchandisingCategory2="'.$maincat.'s"';
/*
		echo $sql;
		die;*/
		$result = $this->db->query($sql);
		$results['result'] = $result->result_array();
		return $results;
	}
	
	function getminestullerwithsub_carat($catname,$maincat)
	{
	
		$sql = 'SELECT Weight FROM dev_stuller WHERE MerchandisingCategory1 = "'.str_replace('_', ' ', $catname).'" AND Description!="" AND MerchandisingCategory2="'.$maincat.'s"';
/*
		echo $sql;
		die;*/
		$result = $this->db->query($sql);
		$results['result'] = $result->result_array();
		return $results;
	}
	
	function getminesubstuller($per_pg, $offset,$catname)
	{
		if($offset==""){
			$offset=0;
		}
		$limit=" LIMIT ".$offset.",".$per_pg;
	
		 $sql = 'SELECT  * FROM dev_stuller WHERE MerchandisingCategory2="'.str_replace('_', ' ', $catname).'" '.$limit;
	
	
		$result = $this->db->query($sql);
		$results['result'] = $result->result_array();
		return $results;
	}
	
	
	function getAllqualityinfofur($per_pg, $offset,$catname,$maincat,$carat='',$price='',$status='')
	{
		if($carat=='') { $caratsql='';}
		else{
			$caratfrom = $carat - 0.24;
			$caratsql = " AND CT_Weight BETWEEN $caratfrom AND $carat ";
		}
		if($price=='') { $pricesql=''; }
		else{
			$pricefrom = $price - 999;
			$pricesql = " AND MSRP BETWEEN $pricefrom AND $price ";
		}

		if($status=='' || is_numeric($status)) { $statussql=''; }
		else{
			$status = str_replace('_', ' ', $status);
			$statussql = " AND Status = '$status' ";
		}
		
		if($offset==""){
			$offset=0;
		}
		$limit=" LIMIT ".$offset.",".$per_pg;
		if($maincat=="Ring"){
			$sql = 'SELECT  * FROM dev_qg WHERE Metal_Desc = "'.str_replace('_', ' ', $catname).'" AND Description LIKE "%'.$maincat.'%" AND Description NOT LIKE "%Earrings%" '.$caratsql.$pricesql.$statussql;
		}else{
			$sql = 'SELECT  * FROM dev_qg WHERE Metal_Desc = "'.str_replace('_', ' ', $catname).'" AND Description LIKE "%'.$maincat.'%"'.$caratsql.$pricesql.$statussql;
		}
		$sql .= $limit;
		$this->diamond_metal = $sql;
		//echo $sql;die();
		$result = $this->db->query($sql);
		$results['result'] = $result->result_array();
		return $results;
	}
	
	//////// get similar products
	function getDiaondSimilarProd($id, $metal_desc, $desc) {
		$sql = 'SELECT  * FROM dev_qg WHERE Metal_Desc = "'.$metal_desc.'" AND Description LIKE "%'.$desc.'%" AND qg_id <> "'.$id.'" ORDER BY qg_id DESC LIMIT 0, 3';
		
		$result = $this->db->query($sql);
		$results['result'] = $result->result_array();
		return $results;	
	}
	function getAllqualityinfofur_max($catname,$maincat)
	{
		if($maincat=="Ring"){
			$sql = 'SELECT MSRP FROM dev_qg WHERE Metal_Desc = "'.str_replace('_', ' ', $catname).'" AND Description LIKE "%'.$maincat.'%" AND Description NOT LIKE "%Earrings%" ';
		}else{
			$sql = 'SELECT MSRP FROM dev_qg WHERE Metal_Desc = "'.str_replace('_', ' ', $catname).'" AND Description LIKE "%'.$maincat.'%"';
		}
		
		$result = $this->db->query($sql);
		$results['result'] = $result->result_array();
		return $results;
	}
	
	function getAllqualityinfofur_max_carat($catname,$maincat)
	{
		if($maincat=="Ring"){
			$sql = 'SELECT CT_Weight FROM dev_qg WHERE Metal_Desc = "'.str_replace('_', ' ', $catname).'" AND Description LIKE "%'.$maincat.'%" AND Description NOT LIKE "%Earrings%" ';
		}else{
			$sql = 'SELECT CT_Weight FROM dev_qg WHERE Metal_Desc = "'.str_replace('_', ' ', $catname).'" AND Description LIKE "%'.$maincat.'%"';
		}
		
		$result = $this->db->query($sql);
		$results['result'] = $result->result_array();
		return $results;
	}
	
	function getAllmystullerinfo($per_pg, $offset,$catname)
	{
		if($offset==""){
			$offset=0;
		}
		$limit=" LIMIT ".$offset.",".$per_pg;
		$sql = 'SELECT  * FROM dev_stuller '.$limit;
		$result = $this->db->query($sql);
		$results['result'] = $result->result_array();
		return $results;
	}
	function getAllqualityinfo($per_pg, $offset,$catname)
	{
		if($offset==""){
			$offset=0;
		}
		$limit=" LIMIT ".$offset.",".$per_pg;
		 $sql = 'SELECT  * FROM dev_qg WHERE Description LIKE "%'.$catname.'%" AND Description NOT LIKE "%Earrings%" '.$limit;
		$result = $this->db->query($sql);
		$results['result'] = $result->result_array();
		return $results;
	}
	function getAllstullerinfo()
	{
		
		$sql = 'SELECT  DISTINCT `MerchandisingCategory1` FROM dev_stuller';
		$result = $this->db->query($sql);
		$results['result'] = $result->result_array();
		return $results;
	}
	function numofrowsallstullerandquantity()
	{
	
		$sql = 'SELECT  COUNT(*) as records FROM dev_stuller';
		$result = $this->db->query($sql);
		$result = $result->result_array();
		$r = $result[0]['records'];
		$sql = 'SELECT  COUNT(*) as records FROM dev_qg';
		$result = $this->db->query($sql);
		$result = $result->result_array();		
		$t = $result[0]['records'];
		return $r + $t;
	}
	function numofrowsstuller($catname)
	{
		$sql = 'SELECT  COUNT(*) as records FROM dev_stuller WHERE MerchandisingCategory1 LIKE "%Wedding Bands%"';
		$result = $this->db->query($sql);
		$result = $result->result_array();
		return $result[0]['records'];
	}
	function numofrowsmystullerfur($catname)
	{
		
		$sql = 'SELECT  COUNT(*) as records FROM dev_stuller WHERE MerchandisingCategory1 ="'.str_replace('_', ' ', $catname).'"';
		$result = $this->db->query($sql);
		$result = $result->result_array();
		return $result[0]['records'];
	}
	function numofrowsmystullerfurwithsub($catname,$main)
	{
	
		$sql = 'SELECT  COUNT(*) as records FROM dev_stuller WHERE MerchandisingCategory1 ="'.str_replace('_', ' ', $catname).'" AND MerchandisingCategory2="'.str_replace('_', ' ', $main).'"';
		$result = $this->db->query($sql);
		$result = $result->result_array();
		return $result[0]['records'];
	}
	function numofrowsmysubstullerfur($catname)
	{
	
		 $sql = 'SELECT  COUNT(*) as records FROM dev_stuller WHERE MerchandisingCategory2 ="'.str_replace('_', ' ', $catname).'"';
		$result = $this->db->query($sql);
		$result = $result->result_array();
		return $result[0]['records'];
	}
	function numofrowsqualityfur($catname,$maincat)
	{
		if($maincat=="Ring")
		{
			$sql = 'SELECT  COUNT(*) as records FROM dev_qg WHERE Metal_Desc ="'.str_replace('_', ' ', $catname).'" AND Description LIKE "%'.$maincat.'%" AND Description NOT LIKE "%Earrings%"';
		}else
		{
			$sql = 'SELECT  COUNT(*) as records FROM dev_qg WHERE Metal_Desc ="'.str_replace('_', ' ', $catname).'" AND Description LIKE "%'.$maincat.'%"';
		}
		
		$result = $this->db->query($sql);
		$result = $result->result_array();
		return $result[0]['records'];
	}
	function numofrowsmystuller($catname)
	{
		$sql = 'SELECT  COUNT(*) as records FROM dev_stuller';
		$result = $this->db->query($sql);
		$result = $result->result_array();
		return $result[0]['records'];
	}
	function numofrowsquality($catname)
	{
		$sql = 'SELECT  COUNT(*) as records FROM dev_qg WHERE Description LIKE "%'.$catname.'%"';
		$result = $this->db->query($sql);
		$result = $result->result_array();
		return $result[0]['records'];
	}
	public function getstullerdetail($id){
		$sql = 'SELECT * FROM dev_stuller where stuller_id='.$id;
		$result = $this->db->query($sql);
		$results['data']=$result->result_array();
		return $results;
	}
	public function getqualitydetail($id){
		 $sql = 'SELECT * FROM dev_qg where qg_id='.$id;
		$result = $this->db->query($sql);
		$results['data']=$result->result_array();
		return $results;
	}
	//// get quality detail in search
	public function getQualityItemDetail($id){
		$sql = "SELECT * FROM dev_qg where Item='".$id."'";
		$result = $this->db->query($sql);
		$results = $result->result_array();
		return $results[0];
	}
	public function getuniquedetail($id){
		$sql = 'SELECT * FROM dev_us where id='.$id;
		$result = $this->db->query($sql);
		$results['data']=$result->result_array();
		return $results;
	}
	function getAlluniqueproducts()
	{
		$sql = 'SELECT  * FROM  dev_us ORDER BY RAND() LIMIT 20';
		$result = $this->db->query($sql);
		$results['result'] = $result->result_array();
		return $results;
	}
	public function getAlljewelleries($per_pg, $offset, $gender, $catid, $subcatid, $metaltype, $style, $price)
    {
	$qwhere="";
	$metaltype=str_replace("%20"," ",$metaltype);
	$style=str_replace("%20"," ",$style);
	if($gender!="none" && $gender!=""){
	$qwhere.=" AND gender='".$gender."'";
	}
	if($catid!="none" && $catid!=""){
	$qwhere.=" AND category='".$catid."'";
	}
	if($subcatid!="none" && $subcatid!=""){
	$qwhere.=" AND subcategory='".$subcatid."'";
	}
	if($metaltype!="none" && $metaltype!=""){
	$qwhere.=" AND metal_purity='".$metaltype."'";
	}
	if($style!="none" && $style!=""){
	$qwhere.=" AND metal_color='".$style."'";
	}
	if($price=="none"){
	$orderby="stock_number";
	$ordertype="desc";
	$sort=" ORDER BY ".$orderby." ".$ordertype;
//	$price=" AND price_website='".$price."'";
	}
	else{
	$orderby="price";
	$ordertype=$price;
	$sort=" ORDER BY ".$orderby." ".$ordertype;
	}
	if($offset==""){
	$offset=0;
	}
	$limit=" LIMIT ".$offset.",".$per_pg;
 		/* $this->db->order_by($orderby,$ordertype);
		$tablename=$this->config->item('table_perfix') . "jewelries ";
		$this->db->where('metal_type',$metaltype);
		$this->db->where('style',$style);
        $query=$this->db->get($tablename,$per_pg,$offset);
        return $query->result(); */
		$sql = 'SELECT  * FROM  ' . $this->config->item('table_perfix') . 'jewelries where 1=1 ' . $qwhere . ' ' . $sort . ' ' . $limit;
		$result = $this->db->query($sql);
		$results['result'] = $result->result_array();
		return $results;
		
    }
    public function jewellery_count($gender, $catid, $subcatid, $metaltype, $style, $price)
    {
		
		$qwhere="";
		$metaltype=str_replace("%20"," ",$metaltype);
	$style=str_replace("%20"," ",$style);
	if($gender!="none" && $gender!=""){
	$qwhere.=" AND gender='".$gender."'";
	}
	if($catid!="none" && $catid!=""){
	$qwhere.=" AND category='".$catid."'";
	}
	if($subcatid!="none" && $subcatid!=""){
	$qwhere.=" AND subcategory='".$subcatid."'";
	}
		if($metaltype!="none" && $metaltype!=""){
			$qwhere.=" AND metal_purity='".$metaltype."'";
		}
		if($style!="none" && $style!=""){
			$qwhere.=" AND metal_color='".$style."'";
		}
		$sql = 'SELECT  count(*) as records FROM  ' . $this->config->item('table_perfix') . 'jewelries where 1=1 ' . $qwhere;
        $result = $this->db->query($sql);
		$result = $result->result_array();
		return $result[0]['records'];		
    }	
	public function getJewellerydetailByID($id){
		$sql = 'SELECT  * FROM  ' . $this->config->item('table_perfix') . 'jewelries where stock_number='. $id;
		$result = $this->db->query($sql);
		$results['data']=$result->result_array();
		return $results;
	}
	public function getUserdetailByID($id){
		$sql = 'SELECT  * FROM  ' . $this->config->item('table_perfix') . 'customerinfo where id='. $id;
		$result = $this->db->query($sql);
		$results['data']=$result->result_array();
		return $results;
	}
	public function getmetalpurity($id){
		$sql = "SELECT  DISTINCT metal_purity FROM  " . $this->config->item('table_perfix') . "jewelries where gender='".$id."'";
		$result = $this->db->query($sql);
		$results['data']=$result->result_array();
		return $results;
	}
	public function getmetalcolor($id){
		$sql = "SELECT  DISTINCT metal_color FROM  " . $this->config->item('table_perfix') . "jewelries where gender='".$id."'";
		$result = $this->db->query($sql);
		$results['data']=$result->result_array();
		return $results;
	}
	public function addtoshoppingcartmode($post, $type='R')
	{
		$sessionid = $this->session->session_data['session_id'];
		$pos = strpos($post['price'],',');
		$strlength = strlen( $post['price'] );
		$prices = substr($post['price'],0,$pos);
		$price = ( ( !empty( $prices ) && $prices > 0 ) ? $prices : $post['price'] );
                
		$ezpay = substr($post['price'],++$pos,$strlength);
                $finger_size = '';
                
                if( !empty($post['txt_ringsize']) ) {
                    $finger_size = $post['txt_ringsize'];
                }
                
		$finish_level = ( $post['finish_level'] !='' ? $post['finish_level'] : 'NA' );
		$itm_metal = ( $post['txt_metal'] !='' ? $post['txt_metal'] : 'NA' );
		$itemring_size = resetRingSize($finger_size);
                $center_stone_id = ( !empty($post['center_stone_id']) ? $post['center_stone_id'] : '' );
                $metals_weight   = ( !empty($post['metals_weight']) ? $post['metals_weight'] : '' );
		
		/*if( $itm_size != 'NA' ) { //
			$items_size = explode('/', $itm_size);
			$item_size = ( !empty($items_size[8]) ? $items_size[8] : $itm_size );
		}
		if( $itm_metal != 'NA' ) { //
			$items_mt = explode('/', $itm_metal);
			$item_metal = ( !empty($items_mt[7]) ? $items_mt[7] : $itm_metal );
		}*/
		
		$item_type  = ( $post['item_type'] !='' ? $post['item_type'] : 'NA' );
		$uniqe_link = $this->session->userdata('unique_ringid');
		$uniqe_link = ( !empty($uniqe_link) ? $uniqe_link : '' );
		$netOrignalPrice = $post['price'];
		$unique_pagelink = $post['unique_pagelink'];
		$uniquepage_link = ( !empty($unique_pagelink) ? $unique_pagelink : $uniqe_link );
		
		$cart_adoption = ( ( isset($post['txt_addoption']) && !empty($post['txt_addoption']) ) ? $post['txt_addoption'] : 'addunique' );
                $vendors_name = ( ( isset($post['vendors_name']) && !empty($post['vendors_name']) ) ? $post['vendors_name'] : 'Unique' );
		$qty = ($post['txt_qty'] == '')? 1 : $post['txt_qty'];
                $cartWirePrice = $price * $qty;

		$sql = "INSERT INTO " . $this->config->item('table_perfix') . "cart (sessionid, lot, sidestone1, ezpay, venderinfo, vendorname, price, quantity, addoption, totalprice, dsize, `name`, image_url, item_metal, item_type, `unique_urlink`, `netorder_price`, `engraved_text`, `engraved_font`, `order_type`, `default_ringsize`, `finish_level`, `metal_weight`) 
		VALUES ('$sessionid', '{$post['prid']}', '{$center_stone_id}' ,'$ezpay', '{$post['vender']}', '{$vendors_name}', '$price', '$qty','$cart_adoption', '$cartWirePrice','$itemring_size', '{$post['prodname']}', '{$post['url']}', '$itm_metal', '$item_type', '$uniquepage_link', '$netOrignalPrice', '{$post['txt_engtext']}', '{$post['font_style']}', '$type', '{$finger_size}', '{$finish_level}', '{$metals_weight}')";
                $this->db->query($sql);

	}

	public function getrandomproduct($id)
	{
		//$sql = "SELECT * FROM dev_qg where qg_id=".$id." ORDER BY RAND() LIMIT 3";
		$sql = "SELECT * FROM dev_qg ORDER BY RAND() LIMIT 3";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getrandomproductstuller($id)
	{
		$sql = "SELECT * FROM dev_stuller ORDER BY RAND() LIMIT 3";
		$result = $this->db->query($sql);
		return $result->result_array();
	}
	function getezvalue()
	{
		$sql = "SELECT * FROM ezpayvalue";
		$result = $this->db->query($sql);
		return $result->result_array();
	}
	function getfilterprice()
	{ 
		$sql = "SELECT * FROM dev_price_filter";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	function getnumengagementQuality($catname)
	{
		$sql = "SELECT  COUNT(*) as records FROM dev_us WHERE name like '%".str_replace('_', ' ', $catname)."%'";
		$result = $this->db->query($sql);
		$result = $result->result_array();
		return $result[0]['records'];
	}
	function getallengagementQuality($per_pg, $offset,$catname,$carat='',$sort='ASC')
	{
		if($carat=='') { $caratsql='';}
		else{
			$caratfrom = $carat - 0.24;
			$caratsql = " AND ds.metal_weight BETWEEN '$caratfrom gr.' AND '$carat gr.' ";
		}
		//$caratsql .= " AND image <> '' AND id <> ''";
		
		if($offset==""){
			$offset=198;
		}
		$limit=" LIMIT ".$offset.",".$per_pg;
		$sql = 'SELECT  * FROM dev_us WHERE name like "%'.str_replace('_', ' ', $catname).'%"'.$caratsql.$limit;
		/*$sql = "SELECT ds.id, ds.catid, ds.image, ds.metal_weight, ds.`name`, ds.ring_size, ds.style_group, ds.top_height, ds.top_width, ds.bottom_height, 
				ds.bottom_width, dp.price AS ring_price FROM dev_us ds LEFT JOIN dev_us_prices dp ON ds.style_group = dp.productID
				WHERE dp.matalType = '18K White' AND dp.ringSize = '6' AND ds.name like '%".str_replace('_', ' ', $catname)."%' AND ds.image <> '' AND ds.id <> ''".$caratsql." 
				ORDER BY dp.price $sort".$limit;*/
				
		$result = $this->db->query($sql);
		$results['result'] = $result->result_array();
		return $results;
	}
	
	function getuniquedetail2($id){
		 $sql = "SELECT * FROM dev_us where id = '$id'";
		$result = $this->db->query($sql);
		$results['data']=$result->result_array();
		return $results;
	}
	
	function getUniquePrice($id){
		$sql = "SELECT distinct matalType FROM dev_us_prices where productid = '$id'";
		$result = $this->db->query($sql);
		$results=$result->result_array();
		return $results;
	}
	///// get all ring sizes
	function getAllRingSize($id){
		$sql = "SELECT distinct ringSize FROM dev_us_prices where productid = '$id'";
		$result = $this->db->query($sql);
		$results=$result->result_array();
		return $results;
	}
	
	function getRingSizes($id){
		$sql = "SELECT min(ringSize) AS minimum_rsize, max(trim(LEFT(ringSize, 2))) AS maximum_rsize FROM dev_us_prices where productid = '$id' AND ringSize <> 'STK'";
		$result = $this->db->query($sql);
		$results=$result->result_array();
		return $results;
	}
	
	function uniqeDetailMetalAjax($metal,$id)
	{
		$sql = "SELECT ringSize FROM dev_us_prices where productid = '$id' and matalType = '$metal'";
		$result = $this->db->query($sql);
		$results=$result->result_array();
		return $results;
	}
	
	function getUniquePriceAjax($metal, $ring,$id){
		$sql = "SELECT price FROM dev_us_prices where productid = '$id' and matalType = '$metal' and ringSize = '$ring' limit 1";
		$result = $this->db->query($sql);
		$results=$result->result_array();
		return $results[0];
	}
	
	function getPricesUnique($id){
		$sql = "SELECT priceRetail FROM dev_us_prices where productid LIKE '%".$id."%' ORDER BY matalType ASC limit 1";
		$result = $this->db->query($sql);
		$results=$result->result_array();
		return $results[0];
	}
	
	///// get unique price
	function getUniqueRingPrice($id,$metal,$size){
		$sql = "SELECT price FROM dev_us_prices where productid = '$id' and matalType = '$metal' and ringSize = '$size' limit 1";
		$result = $this->db->query($sql);
		$results=$result->result_array();
		$unRgPrice = $results[0]['price'];
		return $unRgPrice;
	}
	
	//Add to wishlist Thursday, November 28 2013
	function addWishList($post)
	{
		if($this->session->isLoggedin()){
			$userid = $this->session->userdata("userid");
			$pos = strpos($post['price'],',');
			$strlength = strlen( $post['price'] );
			$price = substr($post['price'],0,$pos);
			$ezpay = substr($post['price'],++$pos,$strlength);
			$isChekout = false;
			$sql = "INSERT INTO " . $this->config->item('table_perfix') . "wishlist (userid, lot, ezpay, venderinfo, price, quantity, addoption, totalprice, dsize, name, url,isChekout) VALUES ('$userid', '{$post['prid']}', '$ezpay', '{$post['vender']}', '$price', '1', 'addjewelry', '{$post['price']}','0', '{$post['prodname']}','{$post['url']}','$isChekout')";
			$this->db->query($sql);
			$result = true;
		}
		else{
			$result = false;
		}
		return $result;
	}
	///// get style name
	function get_style_name($id) {
	$field = '';
		switch($id) {
			case '171':
			$field = 'Classic Collection';
			break;
			case '7':
			$field = 'Sidestone Collection';
			break;
			case '22':
			$field = 'Halo Collection';
			break;
			case '69':
			$field = 'Three Stone Collection';
			break;
			case '224':
			$field = 'Bridal Ring';
			break;
			case '10':
			$field = 'Solitaire Collection';
			break;
			case '213':
			$field = 'Antique Collection';
			break;
			case '264':
			$field = 'Color Stones';
			break;
			case '247':
			$field = 'Fancy Collection';
			break;
			case '200':
			$field = 'Semi Mount';
			break;
			case '226':
			$field = 'Engraved Collection';
			break;
			case '223':
			$field = 'Petite Collection';
			break;
			default :
			$field = 'Unique Collection';
			break;
		}
		return $field;
	}
}
?>

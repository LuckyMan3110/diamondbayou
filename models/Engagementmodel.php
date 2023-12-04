<?php 
class Engagementmodel extends CI_Model {
	function __construct(){
		parent::__construct();
	} 
	function checkRingType($pid) {
		$sql = "SELECT costar_id,overnight_id,dev_us_id FROM `dev_engagement_rings` WHERE id = '".$pid."'";        
		$query = $this->db->query($sql);
		$results = $query->row();

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
	function getRings($start = 0 , $rp =20, $isPave = false , $Solitaire = false , $Sidestone = false ,$platinum = true, $gold = true,$whitegold = true,$isAnniversary=true , $isWeddingband=true ,$minprice = 0 , $maxprice = 1000000 , $shape = 'all', $isMarkt = false, $isErd = false, $isVatche = false, $isDaussi = false, $isAntique = false,$isThreestone = false, $isHalo = false, $isMatching = false ){

		    $results = array();
		     
			$limit = "LIMIT $start, $rp";
			 
			$qwhere = "";
			 
			  $qwhere .= " AND price >= ". str_replace('_','.',$minprice);
			  $qwhere .= " AND price <= ". str_replace('_','.',$maxprice);

			  
			  $instr = '';
			  $instr .= ($isMarkt == 'marktcollection') 	? "'Milano Collection',"  	: '';
			  $instr .= ($isErd == 'erdcollection') 		? "'erd_collection'," 		: '';
			  $instr .= ($isVatche == 'vatchecollection') 	? "'vatche_collection',"  	: '';
			  $instr .= ($isDaussi == 'daussicollection') 	? "'daussi_collection',"  	: '';
			  $instr .= ($isAntique == 'antiquecollection') ? "'antiqu_ecollection',"  	: '';
			  $design = 0;
			  if($instr != ''){
			  		$instr = substr($instr , 0 , (strlen($instr) -1));
				  	$qwhere .=  " AND collection in (".$instr.")";
				  	$design = 1;				  	
			  } 
			  
			  $instr = '';
			  $instr .= ($isPave == 'pave') ? "'Pave',"  : '';
			  $instr .= ($Solitaire == 'solitaire') ? "'Solitaire',"  : '';
			  $instr .= ($Sidestone == 'sidestones') ?  "'Sidestones'," : ''; 
			  
			  $instr .= ($isThreestone == 'threestone') ?  "'Three Stones'," : ''; 
			  $instr .= ($isHalo == 'halo') ?  "'Halo'," : ''; 
			  $instr .= ($isMatching == 'matching') ?  "'MatchingSet'," : ''; 
			  $instr .= ($isAnniversary == 'anniversary') ?  "'Anniversary Ring'," : ''; 
			  $instr .= ($isWeddingband == 'weddingband') ?  "'Wedding Bands'," : ''; 
			  
			  if($instr != ''){
				  $instr = substr($instr , 0 , (strlen($instr) -1));
				  $qwhere .=  " AND style in (".$instr.")"  ;
				  $design = 1;
			  }
			   
			 
			  $instr = '';
			  $instr .= ($platinum == 'platinum') ? "'Platinum','platinum','.950 platinum','950 Platinum',"  : '';
			  $instr .= ($gold == 'gold') ? "'Yellow Gold','18 kt. Yellow Gold','18 Yellow Gold','YellowGold',"  : '';
			  $instr .= ($whitegold == 'whitegold') ?  "'white gold','18 kt. White Gold', 'WhiteGold'," : '';
			  if($instr != ''){
				  $instr = substr($instr , 0 , (strlen($instr) -1));
				  $qwhere .=  " AND metal in (".$instr.")"  ;
				  $design = 1;
			  } 
			  
			  if($shape != 'all' && $shape != 'undefined'){
			   $qwhere .=  " AND shape ='".$shape."'"  ;
			   
			  }
			  
			  if($design==0)
			  {
			      $qwhere .=  " AND collection in ('')";
				  $qwhere .=  " AND style in ('')"  ;
				  $qwhere .=  " AND metal in ('')"  ;
				  
			  }
			  			    
			 
		$sql = 'SELECT  * FROM  '. $this->config->item('table_perfix').'jewelries where 1=1 '. $qwhere . ' order by price desc '. $limit;
	//var_dump($sql); 
	//	exit(0);
	 	$result = $this->db->query($sql);
		$results['result']  = $result->result_array();	
		$sql2 = 'SELECT  stock_number FROM  '. $this->config->item('table_perfix').'jewelries  where 1=1 '. $qwhere;
		$result2 = $this->db->query($sql2);
    	$results['count']  = $result2->num_rows();
 		
		//var_dump($results); 
		//exit(0);
		//print_ar($results);
		
    	return $results;
		
	}
	///// get generice products list
	function getGenericProducts($sid='', $signate_shape, $ringsshape, $other_design) {
		
		$sqlcate = "SELECT * FROM dev_us_catagories WHERE pid = '".$sid."' AND pid <> 0 ORDER BY catname ASC";
		$rscate = $this->db->query($sqlcate);
		$ckcate = $rscate->num_rows();
		
		if( $ckcate > 0 ) {
			$results['cate'] = $rscate->result_array();
		}
		
		$sql = "SELECT *, ud.id ring_id, ur.priceRetail FROM dev_us AS ud INNER JOIN dev_us_prices AS ur ON ud.`name` = ur.productId WHERE 1=1";
		
		if( $signate_shape != 'false' || $ringsshape != 'false' || $other_design != 'false') 
		{
			if($other_design != 'false') {
				$sql .= " AND ud.additional_stones NOT LIKE '%x%' AND ud.additional_stones <> ''";
			}
			if($ringsshape != 'false') {
				$sql .= " AND ud.additional_stones = '' AND ud.supplied_stones = ''";
			} else {
				$sql .= " AND ud.additional_stones <> ''";
			}
			$results['cate'] = array();
		} else {
				$sql .= " AND ud.catid = '".$sid."'";
			}
		
		$sql .= " GROUP BY ur.productId ORDER BY ud.name ASC LIMIT 1, 15";
		
		$result = $this->db->query($sql);
		$results['result']  = $result->result_array();
		
		$sql2 = 'SELECT *, ud.id ring_id, ur.priceRetail FROM dev_us AS ud INNER JOIN dev_us_prices AS ur ON ud.`name` = ur.productId WHERE catid IN (51)  
		GROUP BY ur.productId ORDER BY ud.name ASC';
		$result2 = $this->db->query($sql2);
    	$results['count']  = $result2->num_rows();
		return $results;
	}
	function getproduct($id,$start = 0 , $rp =20 , $extra =CategoryID){
		    
			$start=1;
			$val_array=array();
			$pass_array=array();
			$pass_array = explode('&',$id);
			foreach($pass_array as $val)
			{
			   $v_array =  explode("=",$val);
			   $val_array[$v_array[0]]=$v_array[1];
			  }
			//print_r($val_array);  
			$results = array();
		    $id=1;
			if($val_array['price']!="")
		     	$limit = " order by 	SalePriceProduct  $val_array[price] LIMIT 0, 6";
			else 
			    $limit = "LIMIT 0, 6";
			$qwhere = "";
			  if($minprice!="")
			  $qwhere .= " AND price >= ". str_replace('_','.',$minprice);
			   if($maxprice!="")
			  $qwhere .= " AND price <= ". str_replace('_','.',$maxprice);

			  
			  $instr = '';
			  $instr .= ($isMarkt == 'marktcollection') 	? "'International Collection',"  	: '';
			  $instr .= ($isErd == 'erdcollection') 		? "'erd_collection'," 		: '';
			  $instr .= ($isVatche == 'vatchecollection') 	? "'vatche_collection',"  	: '';
			  $instr .= ($isDaussi == 'daussicollection') 	? "'daussi_collection',"  	: '';
			  $instr .= ($isAntique == 'antiquecollection') ? "'antiqu_ecollection',"  	: '';
			  $design = 0;
			  if($instr != ''){
			  		$instr = substr($instr , 0 , (strlen($instr) -1));
				  	$qwhere .=  " AND collection in (".$instr.")";
				  	$design = 1;				  	
			  } 
			  
			  $instr = '';
			  $instr .= ($val_array[jewProductCategoryId] == 'pave') ? "'Pave',"  : '';
			  $instr .= ($val_array[jewProductCategoryId] == 'solitaire') ? "'Solitaire',"  : '';
			  $instr .= ($val_array[jewProductCategoryId] == 'sidestones') ?  "'Sidestones'," : ''; 
			  
			  $instr .= ($val_array[jewProductCategoryId] == 'threestone') ?  "'Three Stones'," : ''; 
			  $instr .= ($val_array[jewProductCategoryId] == 'halo') ?  "'Halo'," : ''; 
			  $instr .= ($val_array[jewProductCategoryId] == 'matching') ?  "'MatchingSet'," : ''; 
			  $instr .= ($val_array[jewProductCategoryId]== 'anniversary') ?  "'Anniversary Ring'," : ''; 
			  $instr .= ($val_array[jewProductCategoryId]== 'weddingband') ?  "'Wedding Bands'," : ''; 
			  
			  if($instr != ''){
				  $instr = substr($instr , 0 , (strlen($instr) -1));
				  $qwhere .=  " AND style in (".$instr.")"  ;
				  $design = 1;
			  }
			   
			   
			  
			  $instr = '';
			  $instr .= ($val_array[jewShapeVal] == 'Round') ? "'Round',"  : '';
			  $instr .= ($val_array[jewShapeVal] == 'Princess') ? "'Princess',"  : '';
			  $instr .= ($val_array[jewShapeVal] == 'Oval') ?  "'Oval'," : ''; 
			  $instr .= ($val_array[jewShapeVal] == 'Asscher') ?  "'Asscher'," : ''; 
			  $instr .= ($val_array[jewShapeVal] == 'Cushion') ?  "'Cushion'," : ''; 
			  $instr .= ($val_array[jewShapeVal] == 'Emerald') ?  "'Emerald'," : ''; 
			  $instr .= ($val_array[jewShapeVal]== 'Radiant') ?  "'Radiant'," : ''; 
			  $instr .= ($val_array[jewShapeVal]== 'Pear') ?  "'Pear'," : ''; 
			  $instr .= ($val_array[jewShapeVal]== 'Marquise') ?  "'Marquise'," : ''; 
			  $instr .= ($val_array[jewShapeVal]== 'Trillion') ?  "'Trillion'," : ''; 
			  
			  if($instr != ''){
				  $instr = substr($instr , 0 , (strlen($instr) -1));
				  $qwhere .=  " AND LDShape in (".$instr.")"  ;
				  $design = 1;
			  }
			  else
			  {
			     $qwhere .=  " AND LDShape =''"  ;
				  $design = 1;
			  
			  }
			   

			  $instr = '';
			  $instr .= ($val_array[metalTypeVal] == 'platinum') ? "'Platinum','platinum','.950 platinum','950 Platinum',"  : '';
			  $instr .= ($val_array[metalTypeVal] == 'gold') ? "'Yellow Gold','18 kt. Yellow Gold','18 Yellow Gold',"  : '';
			  $instr .= ($val_array[metalTypeVal] == 'whitegold') ?  "'white gold','18 kt. White Gold'," : '';
			  if($instr != ''){
				  $instr = substr($instr , 0 , (strlen($instr) -1));
				  $qwhere .=  " AND metal in (".$instr.")"  ;
				  $design = 1;
			  } 
			  

		/* 	  if($design==0)
			  {
			      $qwhere .=  " AND collection in ('')";
				  $qwhere .=  " AND style in ('')"  ;
				  $qwhere .=  " AND metal in ('')"  ;
				  
			  } */
			  			    
			 
	//	$sql = 'select * from products,ProductCategory where  products.ProductID=ProductCategory.ProductID and ProductCategory.CategoryID= '.$id. "  ".$qwhere  .' '. $limit;
	    $sql = 'select * from products,ProductCategory where  products.ProductID=ProductCategory.ProductID and ProductCategory.CategoryID= '.$id. "  ".$qwhere  .' '. $limit;
	//var_dump($sql); 
	//	exit(0);
	 	$result = $this->db->query($sql);
		$results['result']  = $result->result_array();	
		$sql2 = ' select * from products,ProductCategory where  products.ProductID=ProductCategory.ProductID and ProductCategory.CategoryID= '.$id. $qwhere."limit 0,6";
		$result2 = $this->db->query($sql2);
    	$results['count']  = $result2->num_rows();
 		
		//var_dump($results); 
		//exit(0);
    	return $results;
		
	}
	
	function getRingByStockId($stockno = ''){
		$qry = "SELECT *
				FROM ".config_item('table_perfix')."rings
				WHERE stock_number = '".$stockno."'
				";
		$return = 	$this->db->query($qry);
		$result = $return->result_array();	
		return isset($result[0]) ? $result[0] : false;
	}
	
	function getShapeByStockId($stockid){
		$qry = "SELECT DISTINCT(shape),id,image 
				FROM ".config_item('table_perfix')."ringimages 
				WHERE stock_number = '".$stockid."'GROUP BY shape
				";
		$return = 	$this->db->query($qry);
		$result = $return->result_array();	
		return isset($result) ? $result : false;
	}
		
	function getShapeBycatId($categoryid){
		$qry = "SELECT *
				FROM ".config_item('table_perfix')."new_product 
				WHERE categoryid = '".$categoryid."'GROUP BY categoryid
				";
		$return = 	$this->db->query($qry);
		$result = $return->result_array();	
		return isset($result) ? $result : false;
	}
			
		
		
		
	function getFlashByStockId($stockid){
		$qry = "SELECT id,flash1, flash2 , flash3 ,image45 , image90, image180 ,image45_bg , image90_bg, image180_bg
				FROM ".config_item('table_perfix')."ringanimation 
				WHERE stock_num = '".$stockid."'
				";
		$return = 	$this->db->query($qry);
		$result = $return->result_array();	
		return isset($result[0]) ? $result[0] : false;
	}
	
	function getImageByStockAndShapeId($stockid, $shape, $id){
		$qry = "SELECT shape
				FROM ".config_item('table_perfix')."ringimages
				WHERE stock_number = '".$stockid." and shape=".$shape." and id=".$id."'
				";
		$return = 	$this->db->query($qry);
		$result = $return->result_array();	
		return isset($result[0]) ? $result[0] : false;
	}
	
	function getAllThreestoneRing(){
		$qry = "SELECT *
				FROM ".config_item('table_perfix')."rings
				WHERE style = 'three stones'
				";
		$return = 	$this->db->query($qry);
		$result = $return->result_array();	
		return isset($result) ? $result : false;
	}
	 
}
?>
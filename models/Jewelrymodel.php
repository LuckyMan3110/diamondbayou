<?php 
 class Jewelrymodel extends CI_Model {
 	
 	function __construct(){
 		parent::__construct();
 	}
 	
	function get_update_price($price, $table) {
        $query = $this->db->query("select rate from  $table where   $price>=pricefrom  and $price<=priceto");
        $row = $query->row_array();
        $update_price = $row['rate'] * $price;
        return $update_price;
    }
    
    
    // Data insert into any table
	function insert_into_any_table($data, $table_name){
		// Inserting in Table (customer) 
		$this->db->insert($table_name, $data);

		$insert_id = $this->db->insert_id();
   		return  $insert_id;
	}
	
 	function getCollectionNameBySection($section){
 		 
 		$qry = "SELECT * FROM ".config_item('table_perfix')."jewelries 
 				WHERE section = '".$section."' 
 				GROUP BY collection
				";	
 		
		$return = 	$this->db->query($qry);
		$result = $return->result_array();	
		return isset($result) ? $result : false;
 	}
 	
 	function getAllByCollectionName($collectionname){
 		$qry = "SELECT * FROM ".config_item('table_perfix')."jewelries 
 				WHERE collection = '".$collectionname."'  				
				";
		$return = 	$this->db->query($qry);
		$result = $return->result_array();	
		return isset($result) ? $result : false;
 	}
 	
 	function getAllByStock($stockno){
 		$qry = "SELECT * FROM ".config_item('table_perfix')."jewelries WHERE stock_number = '".$stockno."'";
		$return = 	$this->db->query($qry);
		$result = $return->result_array();	
		return isset($result[0]) ? $result[0] : false;
 	}
	function getSimilarRings($stockno, $ringmetal){
 	$qry = "SELECT * FROM ".config_item('table_perfix')."jewelries WHERE stock_number != '".$stockno."' AND style = 'Three Stones' AND metal = '".$ringmetal."' ORDER BY price DESC LIMIT 5";
	
		$return = 	$this->db->query($qry);
		$result = $return->result_array();	
		return isset($result) ? $result : false;
 	}
	function getAllByRindID($id){
 		$qry = "SELECT * FROM ".config_item('table_perfix')."us WHERE id = '".$id."'";
		$return = $this->db->query($qry);
		$result = $return->result_array();	
		return isset($result[0]) ? $result[0] : false;
 	}
	function getAllBycategoryid($categoryid){
 		$qry = "SELECT * FROM ".config_item('table_perfix')."new_product 
 				WHERE categoryid = '".$categoryid."'  				
				";
		$return = 	$this->db->query($qry);
		$result = $return->result_array();	
		return isset($result[0]) ? $result[0] : false;
 	}
 	
 	function getMaxPrice(){
		$qry = "SELECT max( price ) AS max
				FROM ".config_item('table_perfix')."jewelries";
		$result = 	$this->db->query($qry);
		$price = $result->result_array();	
		return $price[0]['max'];
	}
	
	function getMinPrice(){
		$qry = "SELECT min( price ) AS min
				FROM ".config_item('table_perfix')."jewelries";
		$result = 	$this->db->query($qry);
		$price = $result->result_array();	
		return $price[0]['min'];
	}
	
	function getAllThreestoneRing($metal_name='',$sort='DESC'){
		$priceField = metal_price_cols($metal_name);
		
		$qry = "SELECT *
				FROM ".config_item('table_perfix')."jewelries
				WHERE style = 'Three Stones' AND $priceField >= 999";
				
		if($metal_name && $metal_name != 'false') {
			$qry .= " AND metal = '".$metal_name."'";
		}
		if($sort != '') {
			$qry .= " ORDER BY price $sort";
		}
		$return = 	$this->db->query($qry);
		$result = $return->result_array();	
		return isset($result) ? $result : false;
	}
	
	///// get min and max prices
	function getMinMaxPrice($metal_name='', $options='min'){
		
		$priceField = metal_price_cols($metal_name);
		
		$priceValue = ( $options == 'min' ? "MIN($priceField)" : "MAX($priceField)" );
		
		$qry = "SELECT $priceValue AS price_amount
				FROM ".config_item('table_perfix')."jewelries
				WHERE style = 'Three Stones'
				";
		if($metal_name && $metal_name != 'false') {
			$qry .= " AND metal = '".$metal_name."'";
		}
		$return = 	$this->db->query($qry);
		$result = $return->result_array();
		$priceOptionValue = $result[0]['price_amount'];			
		//print_ar($qry);
		
		return $priceOptionValue;
	}
	
	///// get rings detail accroding to the price slider
	///// get min and max prices
	function getPriceSliderRings($metal_name, $sort='DESC'){
		
		$priceField = metal_price_cols($metal_name);
		$minimm_price = $this->session->userdata('minimm_price');
		$maximm_price = $this->session->userdata('maximm_price');
				
		$qry = "SELECT *
				FROM ".config_item('table_perfix')."jewelries
				WHERE style = 'Three Stones' AND $priceField >= 10";
				
		if(!empty($minimm_price) && !empty($maximm_price)) {
			$qry .= " AND $priceField BETWEEN $minimm_price AND $maximm_price";
		}
		if($metal_name && $metal_name != 'false' && $metal_name != 'details') {
			$qry .= " AND metal = '".$metal_name."'";
		}
		
		if($sort != '') {
			$qry .= " ORDER BY price $sort";
		}
		//echo $qry;
		$return = 	$this->db->query($qry);
		$result = $return->result_array();	
		return isset($result) ? $result : false;
	}
	
	////////// manage email subscription
	function manageEmailSubs() {
		$dt = date('Y-m-d H:i:s');
		$subsc_email = $this->input->post('subsc_email');
		$subsc_fname = $this->input->post('subsc_fname');
		
		$sql = "SELECT * FROM ". $this->config->item('table_perfix')."emailsubs where email_adres ='". $subsc_email."' ORDER BY id DESC LIMIT 1";
		$result 	= 	$this->db->query($sql);
		
		if ($result->num_rows() == 0) {
			if(isset($subsc_email) && !empty($subsc_email) && !empty($subsc_fname)) {
				$data = array(
					'first_name' => $subsc_fname,
					'last_name' => $this->input->post('subsc_lname'),
					'email_adres' => $subsc_email,
					'phone_no' => $this->input->post('subsc_pno'),
					'subs_city' => $this->input->post('subsc_city'),
					'subs_state' => $this->input->post('subsc_state'),
					'subs_country' => $this->input->post('subsc_country'),
					'subs_date' => $dt
				);
				$this->db->insert($this->config->item('table_perfix').'emailsubs', $data);
				$last_id = $this->db->insert_id();
				
				return $last_id;
			}
		}
		return false;	
	}

	/* manage Pick Cause subscription */
	function manageCauseSubs() {
		$dt = date('Y-m-d H:i:s');
		$pcemail = $this->input->post('pcemail');
		$pcfirstname = $this->input->post('pcfirstname');

		$sql = "SELECT * FROM ". $this->config->item('table_perfix')."emailsubs where email_adres ='". $pcemail."' ORDER BY id DESC LIMIT 1";
		$result = $this->db->query($sql);

		if($result->num_rows() == 0){
			if(isset($pcemail) && !empty($pcemail) && !empty($pcfirstname)){
				$data = array(
					'first_name' => $pcfirstname,
					'last_name' => $this->input->post('pclastname'),
					'email_adres' => $pcemail,
					'subs_date' => $dt
				);
				$this->db->insert($this->config->item('table_perfix').'emailsubs', $data);
				$last_id = $this->db->insert_id();
				return $last_id;
			}
		}
		return false;	
	}

	function getPendants(){
		$qry = "SELECT *
				FROM ".config_item('table_perfix')."jewelries
				WHERE section = 'Jewelry' AND collection = 'Pendants'
				";
		$return = 	$this->db->query($qry);
		$result = $return->result_array();	
		return isset($result) ? $result : false;
	}
	
	function getAllPendantSettings($isPlatinum = false, $isYellowgold = false, $isWhitegold = false, $isSolitaire = false, $isThreestone = false, $isWhitegd18k = false, $isYellowgd18k = false, $pricRange=''){
		
		$qwhere = "";
			 
		  		  
		  $instr = '';
		  $instr .= ($isPlatinum == 'platinum') 	? "'platinum',"  	: '';
		  $instr .= ($isYellowgold == 'yellowgold') ? "'yellowgold'," 	: '';
		  $instr .= ($isWhitegold == 'whitegold') 	? "'whitegold',"  	: '';
		  if($instr != ''){
		  		$instr = substr($instr , 0 , (strlen($instr) -1));
			  	$qwhere .=  " AND p.metal in (".$instr.")";
			  	$design = 1;				  	
		  } 
		  
		  if($isWhitegd18k == '18kwhite') {
			  $qwhere .= " AND description like '%18k White Gold%'";
		  }
		  if($isYellowgd18k == '18kyellow') {
			  $orOperate = ( $isWhitegd18k == '18kwhite' ? 'OR' : 'AND');
			  $qwhere .= " $orOperate description like '%18k Yellow Gold%'";
		  }
		  
		  $stylestr = '';
		  $stylestr .= ($isSolitaire == 'solitaire') 	? "'solitaire',"  	: '';
		  $stylestr .= ($isThreestone == 'threestone') ? "'threestone',"  	: '';
		  $design = 0;
		  if($stylestr != ''){
		  		$stylestr = substr($stylestr , 0 , (strlen($stylestr) -1));
			  	$qwhere .=  " AND p.style in (".$stylestr.")";
			  	$design = 1;				  	
		  } 
		  
		  if($pricRange != '') {
			  $rowPrice = explode('-',$pricRange);
			  $qwhere .=  " AND p.price BETWEEN '".$rowPrice[0]."' AND '".$rowPrice[1]."'";
		  }
		
		/*$qry = "SELECT j.stock_number,						
						p.id,
						p.shape,
						p.description,
						p.price,
						p.metal,
						p.style,
						p.small_image,
						p.big_image
				FROM dev_jewelries AS j
				INNER JOIN dev_pendantsettings AS p 
				ON j.stock_number = p.stock_number ".$qwhere."
				";*/
		
		$qry = "SELECT 				
						p.id,
						p.shape,
						p.description,
						p.price,
						p.metal,
						p.style,
						p.small_image,
						p.big_image
				FROM ".config_item('table_perfix')."pendantsettings AS p 
				where 1=1 ".$qwhere."
				";
		
		$return = 	$this->db->query($qry);
		/*var_dump($qry); 
		exit(0);*/
		$result = $return->result_array();	
		return isset($result) ? $result : false;
	}
	
	function getPendentSettingsById($id = ''){
		$qry = "SELECT
						p.id,
						p.stock_number,
						p.shape,
						p.description,
						p.price,
						p.metal,
						p.style,
						p.small_image,
						p.big_image
				FROM ".config_item('table_perfix')."pendantsettings AS p 
				WHERE p.id = '".$id."'
				";
		$return = 	$this->db->query($qry);
		$result = $return->result_array();	
		return isset($result[0]) ? $result[0] : false;
	}
	///// get pendants metals
	function getPendtantsMetals($style) {
		$qry = "SELECT id, style, metal FROM ".config_item('table_perfix')."pendantsettings WHERE style = '".$style."' GROUP BY metal ORDER BY metal ASC";
		$return = 	$this->db->query($qry);
		$result = $return->result_array();	
		return isset($result) ? $result : false;
	}
	
	function getEarringSettingsByShapeMetal($shape ='', $metal = ''){
		$qry = "SELECT * 
				FROM ".config_item('table_perfix')."earringsettings 
				WHERE style != ''";
				
		if(!empty($shape) || !empty($metal)) {
			$qry .= " AND shape = '".$shape."' AND metal = '".$metal."'";
		}
		$qry .= " ORDER BY id";
		$return = 	$this->db->query($qry);
		$result = $return->result_array();	
		//var_dump($result);
		return isset($result) ? $result : false;
	}
	function getEarringSettingsList($sort='id'){
		$qry = "SELECT * 
				FROM ".config_item('table_perfix')."earringsettings 
				WHERE style != ''";
				
		$qry .= " ORDER BY $sort";
		$return = 	$this->db->query($qry);
		$result = $return->result_array();	
		//var_dump($result);
		return $result; //isset($result) ? $result : false;
	}
	function getEarringMetaList(){
		$qry = "SELECT * FROM ".config_item('table_perfix')."earringsettings WHERE style != ''";
				
		$qry .= " GROUP BY metal ORDER BY metal";
		$return = 	$this->db->query($qry);
		$result = $return->result_array();	
		//var_dump($result);
		return isset($result) ? $result : false;
	}
	
	function getEarringSettingsById($id = ''){
		$qry = "SELECT * 
				FROM ".config_item('table_perfix')."earringsettings 
				WHERE id = ".$id."
				";
		$return = 	$this->db->query($qry);
		$result = $return->result_array(); 
		return isset($result[0]) ? $result[0] : false;
	}
	
	///// get similar settings
	function getSimilarEarringSettings($row=array()){
		
		if( count($row) > 0 ) {
			$qry = "SELECT * FROM ".config_item('table_perfix')."earringsettings 
				WHERE id <> '".$row['id']."' AND price > 0 AND metal LIKE '%".$row['metal']."%' AND shape = '".$row['shape']."' ORDER BY metal ASC LIMIT 3";
			$return = $this->db->query($qry);
			$result = $return->result_array();
			return $result;
		}		 
		return FALSE;
	}
		
	function getRings($section = '', $metal = 'all', $sortby = 'all'){
		$qry = "SELECT * FROM ".config_item('table_perfix')."jewelries 
 				WHERE 1 = 1 
				";
		$qwhere = "";
		$orderby = "";
		
		
		
		if($section != '' && $section != 'false'){
			$section = str_replace('_', ' ', $section);
			$qwhere .= " AND section = '".$section."'";
		}
		
		
		
		if($metal != 'all' && $metal != 'false')  {
			$metal = str_replace('_', ' ', $metal);
			switch ($metal){
				case 'platinum':
					$metal = "'Platinum','platinum','.950 platinum','950 Platinum'";
					break;
				case 'whitegold':
					$metal = "'white gold','18 kt. White Gold'";
					break;
				case 'gold':
					$metal = "'Yellow Gold','18 kt. Yellow Gold','18 Yellow Gold'";
					break;
				default:
					$metal;
					break;
			}
			$qwhere .= " AND metal in (".$metal.")";
		}
		
		
		
		
		if($sortby != '' && $sortby != 'false'){			
			switch ($sortby){
				case 'priceasc':
					$orderby = " ORDER BY price ASC";
					break;
				case 'pricedec':
					$orderby = " ORDER BY price DESC";
					break;
				default:
					break;
			}
		}
		
		
		
 		
		echo $qry = $qry.$qwhere.$orderby;
		 
		$return = 	$this->db->query($qry);
		$result = $return->result_array();	
		return isset($result) ? $result : false;
	}

	function getNameBySection($section){
 		 
 		$qry = "SELECT * FROM ".config_item('table_perfix')."diamondstudearring 
 				WHERE section = '".$section."' 
 				GROUP BY collection
				";	
 		
		$return = 	$this->db->query($qry);
		$result = $return->result_array();	
		return isset($result) ? $result : false;
 	}
 	
 	function getByCollectionName($collectionname){
 		$qry = "SELECT * FROM ".config_item('table_perfix')."diamondstudearring 
 				WHERE collection = '".$collectionname."'  				
				";
		$return = 	$this->db->query($qry);
		$result = $return->result_array();	
		return isset($result) ? $result : false;
 	}
 	
 	function getByStock($stockno){
 		$qry = "SELECT * FROM ".config_item('table_perfix')."diamondstudearring 
 				WHERE stock_number = '".$stockno."'  				
				";
		$return = 	$this->db->query($qry);
		$result = $return->result_array();	
		return isset($result[0]) ? $result[0] : false;
 	}

	function getWatchByStock($stockno){
 		$qry = "SELECT * FROM ".config_item('table_perfix')."watches 
 				WHERE productID = '".$stockno."'  				
				";
		$return = 	$this->db->query($qry);
		$result = $return->result_array();	
		return isset($result[0]) ? $result[0] : false;
 	}

	function getDetailsByLot($lot){
		$qry = "SELECT *
				FROM ".config_item('table_perfix')."products
				WHERE lot = '".$lot."'
				";
//echo($qry);
		$result = 	$this->db->query($qry);
		$return = $result->result_array();	
		return isset($return[0]) ? $return[0] : false;
	}
	
	
	//new  added
		function getstullerlevel1(){
		$stullerFirstLevelSql = "SELECT distinct(`Level1`) as items FROM StullerData ";
		$StullerFirstLevelArray = 	$this->db->query($stullerFirstLevelSql);
		$StullerFirstLevelArray = $StullerFirstLevelArray->result_array();
		return isset($StullerFirstLevelArray) ? $StullerFirstLevelArray : false;
		
	}
	function getstullerlevel2($item){
		
		$StullerFirstLevelArray = 	$this->db->query('SELECT distinct(Level2) as items FROM StullerData where level1="'.$item.'" ');
		return $StullerFirstLevelArray->result_array();	
	}
	function getstullerlevel3($item,$item1){
		
		$StullerFirstLevelArray = 	$this->db->query('SELECT distinct(Level3) as items FROM StullerData where level1="'.$item.'"and level2="'.$item1.' "');
		return $StullerFirstLevelArray->result_array();	
	}
	
	
	
	
	function getstullerlevelsByTopLevelName($n){
		$stullerFirstLevelSql = "SELECT * FROM StullerData where Level1 = '".$n."'";
		$StullerFirstLevelArray = 	$this->db->query($stullerFirstLevelSql);
		$StullerFirstLevelArray = $StullerFirstLevelArray->result_array();
		return isset($StullerFirstLevelArray) ? $StullerFirstLevelArray : false;
	}
	function getstuller_sub_level_sub($item,$item1,$level)
		{
		
			 $cat_arr  =  $this->uri->segment_array();
			 $arr_length = count($cat_arr);
			 for($i=3;$i<= $arr_length;$i++)
					$con[] ='sd.Level'.($i-2).' = "'.urldecode($this->uri->segment($i)).'"';
			$con[] ='sd.Level'.($level-1).' = "'.$item.'"';	 
			$con[] ='sd.Level'.($level).' = "'.$item1.'"';	 
			 if(count($con)>0)
					$condition = implode(" and ",$con);
			
			 $StullerFirstLevelArray = 	$this->db->query('SELECT distinct(sd.Level'.($level+1).') as items FROM StullerData as sd where '.$condition.' ');
			  return $StullerFirstLevelArray->result_array();	
			  
		}
	function getstuller_sub_level($item,$level)
		{
			 $cat_arr  =  $this->uri->segment_array();
			 $arr_length = count($cat_arr);
			 for($i=3;$i<= $arr_length;$i++)
					$con[] ='sd.Level'.($i-2).' = "'.urldecode($this->uri->segment($i)).'"';
			$con[] ='sd.Level'.($level).' = "'.$item.'"';	 
			 if(count($con)>0)
					$condition = implode(" and ",$con);
			
			 $StullerFirstLevelArray = 	$this->db->query('SELECT distinct(sd.Level'.($level+1).') as items FROM StullerData as sd where '.$condition.' ');
			  return $StullerFirstLevelArray->result_array();	
			  
		}
	function getstuller_cat_level()
	{
         $cat_arr  =  $this->uri->segment_array();
		 $arr_length = count($cat_arr);
		 for($i=3;$i<= $arr_length;$i++)
		        $con[] ='sd.Level'.($i-2).' = "'.urldecode($this->uri->segment($i)).'"';
			 
	     if(count($con)>0)
		        $condition = implode(" and ",$con);
		 $StullerFirstLevelArray = 	$this->db->query('SELECT distinct(sd.Level'.($i-2).') as items FROM StullerData as sd where '.$condition.' ');
		  return $StullerFirstLevelArray->result_array();	
		  
	}
	function GetProductsByLevels(){
	     $cat_arr  =  $this->uri->segment_array();
		 $arr_length = count($cat_arr);
		 for($i=3;$i<= $arr_length;$i++)
		     $con[] ='sd.Level'.($i-2).' = "'.urldecode($this->uri->segment($i)).'"';
			 
	      if(count($con)>0)
		   $condition =  " where ".implode(" and ",$con); 
           $stullerFirstLevelSql = 'SELECT StoneMapImageFile,Level1,	Description,ItemNumber,	RetailPrice	,PrimaryMetalComposition,Quality  FROM StullerData sd   '.$condition. ' order  by ItemNumber limit 0,100 ';	 

		$StullerFirstLevelArray = 	$this->db->query($stullerFirstLevelSql);
		$StullerFirstLevelArray = $StullerFirstLevelArray->result_array();
		$image_arry=array();
		for($k=0; $k<sizeof($StullerFirstLevelArray); $k++){
		
			$imageSql = "SELECT ImagePath,ImageFile  FROM Images i  where  i.ItemNumber = '".$StullerFirstLevelArray[$k]["ItemNumber"]."' LIMIT 0,1";
			$imageArray = 	$this->db->query($imageSql);
			$images = $imageArray->result_array();
			$f_iamge =  str_replace("\\","/", lcfirst($images[0]['ImagePath'])).trim($images[0]["ImageFile"]);
			if(!in_array($f_iamge,$image_arry))
			{
				$StullerFirstLevelArray[$k]["StoneMapImageFile"] = str_replace("\\","/", lcfirst($images[0]['ImagePath'])).trim($images[0]["ImageFile"]);
				$image_arry[] =$f_iamge;
			}
		}
		return isset($StullerFirstLevelArray) ? $StullerFirstLevelArray : false;
	}
	function getstullerlevel_product($level,$item1,$item2,$item3)
	{
	     $cat_arr  =  $this->uri->segment_array();
		 $arr_length = count($cat_arr);
		 for($i=3;$i<= $arr_length;$i++)
		     $con[] ='sd.Level'.($i-2).' = "'.urldecode($this->uri->segment($i)).'"';
		if($item1!="")
             $con[] ='sd.Level'.($level).' = "'.$item1.'"';	
			 
		if($item2!="")
             $con[] ='sd.Level'.($level+1).' = "'.$item2.'"';	
			 
        if($item3!="")
             $con[] ='sd.Level'.($level+2).' = "'.$item3.'"';				 
	    if(count($con)>0)
		   $condition =  " where ".implode(" and ",$con); 
        $stullerFirstLevelSql = 'SELECT StoneMapImageFile,Level1,	Description,ItemNumber,	RetailPrice	,PrimaryMetalComposition,Quality   FROM StullerData sd   '.$condition. ' order  by ItemNumber limit 0,100';	 

		$StullerFirstLevelArray = 	$this->db->query($stullerFirstLevelSql);
		$StullerFirstLevelArray = $StullerFirstLevelArray->result_array();
		$image_arry=array();
		for($k=0; $k<sizeof($StullerFirstLevelArray); $k++){
			$imageSql = "SELECT ImagePath,ImageFile  FROM Images i  where  i.ItemNumber = '".$StullerFirstLevelArray[$k]["ItemNumber"]."' LIMIT 0,1";
			$imageArray = 	$this->db->query($imageSql);
			$images = $imageArray->result_array();
		   $f_iamge =  str_replace("\\","/", lcfirst($images[0]['ImagePath'])).trim($images[0]["ImageFile"]);
			if(!in_array($f_iamge,$image_arry))
			{
				$StullerFirstLevelArray[$k]["StoneMapImageFile"] = str_replace("\\","/", lcfirst($images[0]['ImagePath'])).trim($images[0]["ImageFile"]);
				$image_arry[] =$f_iamge;
			}
		
		}
		return isset($StullerFirstLevelArray) ? $StullerFirstLevelArray : false;
	}
	//end
	function GetProductsByLevels_new(){
	     $cat_arr  =  $this->uri->segment_array();
		 $arr_length = count($cat_arr);
		 for($i=3;$i<= $arr_length;$i++)
		     $con[] ='sd.Level'.($i-2).' = "'.urldecode($this->uri->segment($i)).'"';
			 
	      if(count($con)>0)
		   $condition =  " and " . implode(" and ",$con); 
          $stullerFirstLevelSql = 'SELECT Level1,	Description,im.*,	RetailPrice	,PrimaryMetalComposition,Quality  FROM stullerdata_new  sd ,images_new as im where im.ItemNumber =sd.ItemNumber '.$condition. ' order  by sd.ItemNumber limit 0,100 ';	 

		$StullerFirstLevelArray = 	$this->db->query($stullerFirstLevelSql);
		$StullerFirstLevelArray = $StullerFirstLevelArray->result_array();
		/* for($k=0; $k<sizeof($StullerFirstLevelArray); $k++){
			$imageSql = "SELECT ImagePath,ImageFile  FROM Images i  where  i.ItemNumber = '".$StullerFirstLevelArray[$k]["ItemNumber"]."' LIMIT 0,1";
			$imageArray = 	$this->db->query($imageSql);
			$images = $imageArray->result_array();
			$StullerFirstLevelArray[$k]["StoneMapImageFile"] = str_replace("\\","/", lcfirst($images[0]['ImagePath'])).trim($images[0]["ImageFile"]);
		} */
		return isset($StullerFirstLevelArray) ? $StullerFirstLevelArray : false;
	}
	function getstullerlevel_product_new($level,$item1,$item2,$item3)
	{
	     $cat_arr  =  $this->uri->segment_array();
		 $arr_length = count($cat_arr);
		 for($i=3;$i<= $arr_length;$i++)
		     $con[] ='sd.Level'.($i-2).' = "'.urldecode($this->uri->segment($i)).'"';
		if($item1!="")
             $con[] ='sd.Level'.($level).' = "'.$item1.'"';	
			 
		if($item2!="")
             $con[] ='sd.Level'.($level+1).' = "'.$item2.'"';	
			 
        if($item3!="")
             $con[] ='sd.Level'.($level+2).' = "'.$item3.'"';				 
	    if(count($con)>0)
		   $condition =  " and " .implode(" and ",$con); 
        $stullerFirstLevelSql = 'SELECT Level1,	Description,im.*,	RetailPrice	,PrimaryMetalComposition,Quality  FROM stullerdata_new  sd ,images_new as im where im.ItemNumber =sd.ItemNumber '.$condition. ' order  by sd.ItemNumber limit 0,10 ';	 

		$StullerFirstLevelArray = 	$this->db->query($stullerFirstLevelSql);
		$StullerFirstLevelArray = $StullerFirstLevelArray->result_array();
	/* 	for($k=0; $k<sizeof($StullerFirstLevelArray); $k++){
			$imageSql = "SELECT ImagePath,ImageFile  FROM Images i  where  i.ItemNumber = '".$StullerFirstLevelArray[$k]["ItemNumber"]."' LIMIT 0,1";
			$imageArray = 	$this->db->query($imageSql);
			$images = $imageArray->result_array();
			$StullerFirstLevelArray[$k]["StoneMapImageFile"] = str_replace("\\","/", lcfirst($images[0]['ImagePath'])).trim($images[0]["ImageFile"]);
		} */
		return isset($StullerFirstLevelArray) ? $StullerFirstLevelArray : false;
	}
	function getstullerlevel1_new(){
		$stullerFirstLevelSql = "SELECT distinct(`Level1`) as items FROM stullerdata_new ";
		$StullerFirstLevelArray = 	$this->db->query($stullerFirstLevelSql);
		$StullerFirstLevelArray = $StullerFirstLevelArray->result_array();
		return isset($StullerFirstLevelArray) ? $StullerFirstLevelArray : false;
		
	}
	function getstullerlevel2_new($item){
		
		$StullerFirstLevelArray = 	$this->db->query('SELECT distinct(Level2) as items FROM stullerdata_new where level1="'.$item.'" ');
		return $StullerFirstLevelArray->result_array();	
	}
	function getstullerlevel3_new($item,$item1){
		
		$StullerFirstLevelArray = 	$this->db->query('SELECT distinct(Level3) as items FROM stullerdata_new where level1="'.$item.'"and level2="'.$item1.' "');
		return $StullerFirstLevelArray->result_array();	
	}
	function getstuller_cat_level_new()
	{
         $cat_arr  =  $this->uri->segment_array();
		 $arr_length = count($cat_arr);
		 for($i=3;$i<= $arr_length;$i++)
		        $con[] ='sd.Level'.($i-2).' = "'.urldecode($this->uri->segment($i)).'"';
			 
	     if(count($con)>0)
		        $condition = " where " .implode(" and ",$con);
		 $StullerFirstLevelArray = 	$this->db->query('SELECT distinct(sd.Level'.($i-2).') as items FROM stullerdata_new as sd  '.$condition.' ');
		  return $StullerFirstLevelArray->result_array();	
		  
	}
	
	function getstuller_sub_level_sub_new($item,$item1,$level)
		{
		
			 $cat_arr  =  $this->uri->segment_array();
			 $arr_length = count($cat_arr);
			 for($i=3;$i<= $arr_length;$i++)
					$con[] ='sd.Level'.($i-2).' = "'.urldecode($this->uri->segment($i)).'"';
			$con[] ='sd.Level'.($level-1).' = "'.$item.'"';	 
			$con[] ='sd.Level'.($level).' = "'.$item1.'"';	 
			 if(count($con)>0)
					$condition = " where " . implode(" and ",$con);
			
			 $StullerFirstLevelArray = 	$this->db->query('SELECT distinct(sd.Level'.($level+1).') as items FROM stullerdata_new as sd  '.$condition.' ');
			  return $StullerFirstLevelArray->result_array();	
			  
		}
	function getstuller_sub_level_new($item,$level)
		{
			 $cat_arr  =  $this->uri->segment_array();
			 $arr_length = count($cat_arr);
			 for($i=3;$i<= $arr_length;$i++)
					$con[] ='sd.Level'.($i-2).' = "'.urldecode($this->uri->segment($i)).'"';
			$con[] ='sd.Level'.($level).' = "'.$item.'"';	 
			 if(count($con)>0)
					$condition = " where " . implode(" and ",$con);
			
			 $StullerFirstLevelArray = 	$this->db->query('SELECT distinct(sd.Level'.($level+1).') as items FROM stullerdata_new as sd  '.$condition.' ');
			  return $StullerFirstLevelArray->result_array();	
			  
		}
	function GetProductDetail_new($lot)
      {	
		
	    $stullerFirstLevelSql = "SELECT sd.*,sdi.* FROM stullerdata_new  sd , images_new as sdi  where sd.ItemNumber = sdi.ItemNumber  and  sd.ItemNumber = '".urldecode($lot)."'";
		$StullerFirstLevelArray = 	$this->db->query($stullerFirstLevelSql);
		$StullerFirstLevelArray = $StullerFirstLevelArray->row_array();
		return isset($StullerFirstLevelArray) ? $StullerFirstLevelArray : false;
	
	}

 function GetProductDetail($lot)
      {	
		
		$stullerFirstLevelSql = "SELECT sd.*,sdi.* FROM StullerData sd , Images as sdi  where sd.itemnumber = sdi.ItemNumber  and  sd.itemnumber = '".urldecode($lot)."'";
		$StullerFirstLevelArray = 	$this->db->query($stullerFirstLevelSql);
		$StullerFirstLevelArray = $StullerFirstLevelArray->row_array();
		return isset($StullerFirstLevelArray) ? $StullerFirstLevelArray : false;
	
	}	
  function getqualitygoldByID($id) {
        $qry = "SELECT * FROM `dev_qg`
                                WHERE qg_id = '" . $id . "'
                                ";
        $return = $this->db->query($qry);
        $result = $return->result_array();
        return isset($result[0]) ? $result[0] : false;
    }
	function getqualitygold($page = 1, $rp = 8, $sortname = 'itemid', $sortorder = 'desc', $query = '', $qtype = 'itemid', $oid = '') {
        $results = array();

        $sort = "ORDER BY $sortname $sortorder";

        //$start = (($page - 1) * $rp);
        //$start = (int)($page /8);
        //$start = $start
        $start = $page;
        $limit = "LIMIT $start, $rp";

        /*      $qwhere = "";
          if ($query)
          $qwhere .= " AND $qtype LIKE '%$query%' ";
          if ($oid != '')
          $qwhere .= " AND qg_id = $oid";
         */

        $oid = str_replace("*", "/", $oid);

        if (!empty($oid)) {
            $qwhere .= "  AND folder LIKE '" . $oid . "%'";
        }
        $sql = 'SELECT  * FROM  dev_qg where 1=1 ' . $qwhere . ' ' . $sort . ' ' . $limit;

        $result = $this->db->query($sql);
        $results['result'] = $result->result_array();
        $sql2 = 'SELECT  qg_id FROM  dev_qg  where 1=1 ' . $qwhere;
        $result2 = $this->db->query($sql2);
        $results['count'] = $result2->num_rows();
        return $results;
    }
	
	function getJewelryByMenu($val)
	{	
		/*condition for bridal menu*/
		if($val==1)
		{ $where = 'WHERE gender="F" AND category="3292598018" AND subcategory="3292618018"';}
		elseif($val==2)
		{$where = 'WHERE gender="F" AND category="3292598018" AND subcategory="3292613018"';}
		elseif($val==3)
		{$where = 'WHERE gender="F" AND category="3292598018" AND subcategory="3292616018"';}
		elseif($val==4)
		{$where = 'WHERE gender="F" AND category="3292598018" AND subcategory="3292623018"';}
		/*condition for ladies menu*/
		elseif($val==5)/*Earring*/
		{$where = 'WHERE gender="F" AND category="3292601018"';}
		elseif($val==6)
		{$where = 'WHERE gender="F" AND category="3292601018" AND (subcategory="3292633018" || subcategory="3292635018" || subcategory="3292637018" || subcategory="3292639018" || subcategory="3292641018")';}
		elseif($val==7)
		{$where = 'WHERE gender="F" AND category="3292601018" AND subcategory="3292643018"';}
		elseif($val==8)
		{$where = 'WHERE gender="F" AND category="3292601018" AND subcategory="3292645018"';}
		elseif($val==9)/*Pendants*/
		{$where = 'WHERE gender="F" AND category="3292603018"';}
		elseif($val==10)
		{$where = 'WHERE gender="F" AND category="3292603018" AND (subcategory="3292651018" || subcategory="3292653018" || subcategory="3292655018" || subcategory="3292657018" || subcategory="3292659018" || subcategory="3292661018" || subcategory="3292663018")';}
		elseif($val==11)
		{$where = 'WHERE gender="F" AND category="3292603018" AND subcategory="3292665018"';}
		elseif($val==12)
		{$where = 'WHERE gender="F" AND category="3292603018" AND subcategory="3292667018"';}
		elseif($val==13)/*Necklaces*/
		{$where = 'WHERE gender="F" AND category="3292605018"';}
		elseif($val==14)
		{$where = 'WHERE gender="F" AND category="3292605018" AND (subcategory="3292671018")';}
		elseif($val==15)
		{$where = 'WHERE gender="F" AND category="3292605018" AND subcategory="3292673018"';}
		elseif($val==16)
		{$where = 'WHERE gender="F" AND category="3292605018" AND subcategory="3292675018"';}
		elseif($val==17)/*rings*/
		{$where = 'WHERE gender="F" AND category="3292598018"';}
		elseif($val==18)
		{$where = 'WHERE gender="F" AND category="3292598018" AND (subcategory="3292613018" || subcategory="3292616018" || subcategory="3292618018" || subcategory="3292620018" || subcategory="3292623018" || subcategory="3292625018" || subcategory="3292627018" || subcategory="3292629018")';}
		elseif($val==19)
		{$where = 'WHERE gender="F" AND category="3292598018" AND subcategory="3709266018"';}
		elseif($val==20)
		{$where = 'WHERE gender="F" AND category="3292598018" AND subcategory="3709267018"';}
		elseif($val==21)/*Bracelets*/
		{$where = 'WHERE gender="F" AND category="3292607018"';}
		elseif($val==22)
		{$where = 'WHERE gender="F" AND category="3292607018" AND (subcategory="3292683018" || subcategory="3292685018")';}
		elseif($val==23)
		{$where = 'WHERE gender="F" AND category="3292607018" AND subcategory="3292687018"';}
		elseif($val==24)
		{$where = 'WHERE gender="F" AND category="3292607018" AND subcategory="3292689018"';}
		/*condition for mens menu*/
		elseif($val==25)/*wedding brands*/
		{$where = 'WHERE gender="M" AND metal_purity="10k white gold" || metal_purity="10 yellow gold" || metal_purity="14k white gold" || metal_purity="14k yellow gold" || metal_purity="18k white gold" || metal_purity="18k yellow gold" || metal_purity="10k two-tone" || metal_purity="14k two-tone" || metal_purity="18k two-tone" || metal_purity="22k two-tone" || metal_purity="24k two-tone"';}
		elseif($val==26)
		{$where = 'WHERE gender="M" AND metal_purity="PLATINUM"';}
		elseif($val==27)
		{$where = 'WHERE gender="M" AND metal_purity="TUNGSTEN"';}
		elseif($val==28)
		{$where = 'WHERE gender="M" AND metal_purity="SILVER"';}
		elseif($val==29)
		{$where = 'WHERE gender="M" AND metal_purity="STAINLESS STEEL"';}
		elseif($val==30)/*gold and silver*/
		{$where = 'WHERE gender="M" AND category="3292577018"';}
		elseif($val==31)
		{$where = 'WHERE gender="M" AND category="3292498018"';}
		elseif($val==32)
		{$where = 'WHERE gender="M" AND category="3291875018"';}
		elseif($val==33)
		{$where = 'WHERE gender="M" AND category="3292560018"';}
		elseif($val==34)
		{$where = 'WHERE gender="M" AND category="3291962018"';}
		elseif($val==35)
		{$where = 'WHERE gender="M" AND category="3709041018"';}
		elseif($val==40)
		{$where = 'WHERE gender="C" AND category="3291859021"';}
		elseif($val==41)
		{$where = 'WHERE gender="C" AND category="3291859021" AND subcategory="3291879019"';}
		elseif($val==42)
		{$where = 'WHERE gender="C" AND category="3291859021" AND subcategory="3291879020"';}
		elseif($val==43)
		{$where = 'WHERE gender="C" AND category="3291859021" AND subcategory="3291879021"';}
		elseif($val==44)
		{$where = 'WHERE gender="C" AND category="3291859022"';}
		elseif($val==50)  //earings
		{$where = 'WHERE gender="E" AND category="3291859028"';}
		elseif($val==51)
		{$where = 'WHERE gender="E" AND category="3291859028" AND subcategory="3291879070"';} //sub category Diamond Studs
		elseif($val==52)
		{$where = 'WHERE gender="E" AND category="3291859028" AND subcategory="3291879071"';} //sub category Diamond Solitaire
		elseif($val==53)
		{$where = 'WHERE gender="E" AND category="3291859028" AND subcategory="3291879072"';} //sub category Diamond Earrings
		elseif($val==54)
		{$where = 'WHERE gender="E" AND category="3291859028" AND subcategory="3291879073"';} //sub category Color Diamond Earrings
	
		
		elseif($val==55)  //pendants
		{$where = 'WHERE gender="E" AND category="3291859026"';}
		elseif($val==56)
		{$where = 'WHERE gender="E" AND category="3291859026" AND subcategory="3291879050"';} //sub category 
		elseif($val==57)
		{$where = 'WHERE gender="E" AND category="3291859026" AND subcategory="3291879051"';} //sub category 
		elseif($val==58)
		{$where = 'WHERE gender="E" AND category="3291859026" AND subcategory="3291879053"';} //sub category 
	
		elseif($val==59)  //Rings
		{$where = 'WHERE gender="E" AND category="3291859024"';}
		elseif($val==60)  //Diamond Wedding Bands
		{$where = 'WHERE gender="E" AND category="3291859024" AND subcategory="3291879030"';}
		elseif($val==61)  
		{$where = 'WHERE gender="E" AND category="3291859024" AND subcategory="3291879031"';}
		elseif($val==62)  
		{$where = 'WHERE gender="E" AND category="3291859024" AND subcategory="3291879032"';}
		elseif($val==63)  
		{$where = 'WHERE gender="E" AND category="3291859024" AND subcategory="3291879033"';}
		elseif($val==64)  
		{$where = 'WHERE gender="E" AND category="3291859024" AND subcategory="3291879034"';}
		elseif($val==65)  
		{$where = 'WHERE gender="E" AND category="3291859024" AND subcategory="3291879035"';}
		elseif($val==66)  
		{$where = 'WHERE gender="E" AND category="3291859024" AND subcategory="3291879036"';}
		
		//3291859027
		elseif($val==67)
		{$where = 'WHERE gender="E" AND category="3291859027"';}
		elseif($val==68)  
		{$where = 'WHERE gender="E" AND category="3291859027" AND subcategory="3291879060"';}
		
		elseif($val==69)  
		{$where = 'WHERE gender="E" AND category="3291859027" AND subcategory="3291879061"';}
		
		elseif($val==70)  
		{$where = 'WHERE gender="E" AND category="3291859027" AND subcategory="3291879062"';}
		elseif($val==71)  
		{$where = 'WHERE gender="E" AND category="3291859027" AND subcategory="3291879063"';}
		
		elseif($val==72)  //earring
		{$where = 'WHERE gender="D" AND category="3291859046"';}
		elseif($val==73)  
		{$where = 'WHERE gender="D" AND category="3291859046" AND subcategory="3291879400"';}
		elseif($val==74)  
		{$where = 'WHERE gender="D" AND category="3291859046" AND subcategory="3291879401"';}
		
		elseif($val==75)  
		{$where = 'WHERE gender="D" AND category="3291859046" AND subcategory="3291879402"';}
		elseif($val==76)  
		{$where = 'WHERE gender="D" AND category="3291859046" AND subcategory="3291879403"';}
		
		
		elseif($val==77)  //pendant
		{$where = 'WHERE gender="D" AND category="3291859044"';}
		elseif($val==78)  //pendant
		{$where = 'WHERE gender="D" AND category="3291859044" AND subcategory="3291879200"';}
		elseif($val==79)  //pendant
		{$where = 'WHERE gender="D" AND category="3291859044" AND subcategory="3291879201"';}
		elseif($val==80)  //pendant
		{$where = 'WHERE gender="D" AND category="3291859044" AND subcategory="3291879202"';}
		
		elseif($val==81)  //Ring
		{$where = 'WHERE gender="D" AND category="3291859042"';}
		elseif($val==82)  
		{$where = 'WHERE gender="D" AND category="3291859042" AND subcategory="3291879100"';}
		elseif($val==83) 
		{$where = 'WHERE gender="D" AND category="3291859042" AND subcategory="3291879101"';}
		elseif($val==84)  
		{$where = 'WHERE gender="D" AND category="3291859042" AND subcategory="3291879102"';}
		
		elseif($val==85) 
		{$where = 'WHERE gender="D" AND category="3291859042" AND subcategory="3291879103"';}
		elseif($val==86)  
		{$where = 'WHERE gender="D" AND category="3291859042" AND subcategory="3291879104"';}
		elseif($val==87) 
		{$where = 'WHERE gender="D" AND category="3291859042" AND subcategory="3291879105"';}
		
		elseif($val==88)  //bracelates
		{$where = 'WHERE gender="D" AND category="3291859045"';}
		
		elseif($val==89)  
		{$where = 'WHERE gender="D" AND category="3291859045" AND subcategory="3291879300"';}
		elseif($val==90) 
		{$where = 'WHERE gender="D" AND category="3291859045" AND subcategory="3291879301"';}
		elseif($val==91) 
		{$where = 'WHERE gender="D" AND category="3291859045" AND subcategory="3291879302"';}
		elseif($val==92)  
		{$where = 'WHERE gender="D" AND category="3291859045" AND subcategory="3291879303"';}
		
		elseif($val==119)  
		{$where = 'WHERE gender="R" AND category="3291859051" ';}
		
		elseif($val==120)  
		{$where = 'WHERE gender="R" AND category="3291859051" AND subcategory="3291879800"';}
		
		elseif($val==121)  
		{$where = 'WHERE gender="R" AND category="3291859051" AND subcategory="3291879801"';}
		elseif($val==322)  
		{$where = 'WHERE gender="R" AND category="3291859051" AND subcategory="3291879803"';}
		elseif($val==804)  
		{$where = 'WHERE gender="R" AND category="3291859051" AND subcategory="3291879804"';}
		elseif($val==805)  
		{$where = 'WHERE gender="R" AND category="3291859051" AND subcategory="3291879805"';}
		elseif($val==806)  
		{$where = 'WHERE gender="R" AND category="3291859051" AND subcategory="3291879806"';}
		elseif($val==807)  
		{$where = 'WHERE gender="R" AND category="3291859051" AND subcategory="3291879807"';}
		elseif($val==808)  
		{$where = 'WHERE gender="R" AND category="3291859051" AND subcategory="3291879808"';}
		elseif($val==809)  
		{$where = 'WHERE gender="R" AND category="3291859051" AND subcategory="3291879809"';}
		elseif($val==810)  
		{$where = 'WHERE gender="R" AND category="3291859051" AND subcategory="3291879810"';}
		elseif($val==811)  
		{$where = 'WHERE gender="R" AND category="3291859051" AND subcategory="3291879811"';}
		elseif($val==9052)  
		{$where = 'WHERE gender="R" AND category="3291859052"';}
		elseif($val==901)  
		{$where = 'WHERE gender="R" AND category="3291859052" AND subcategory="3291879901"';}
		elseif($val==902)  
		{$where = 'WHERE gender="R" AND category="3291859052" AND subcategory="3291879902"';}
		elseif($val==903)  
		{$where = 'WHERE gender="R" AND category="3291859052" AND subcategory="3291879903"';}
		elseif($val==904)  
		{$where = 'WHERE gender="R" AND category="3291859052" AND subcategory="3291879904"';}
		elseif($val==905)  
		{$where = 'WHERE gender="R" AND category="3291859052" AND subcategory="3291879905"';}
		elseif($val==906)  
		{$where = 'WHERE gender="R" AND category="3291859052" AND subcategory="3291879906"';}
		
		elseif($val==907)  
		{$where = 'WHERE gender="R" AND category="3291859052" AND subcategory="3291879907"';}
		elseif($val==908)  
		{$where = 'WHERE gender="R" AND category="3291859052" AND subcategory="3291879908"';}
		elseif($val==909)  
		{$where = 'WHERE gender="R" AND category="3291859052" AND subcategory="3291879909"';}
		elseif($val==910)  
		{$where = 'WHERE gender="R" AND category="3291859052" AND subcategory="3291879910"';}
		elseif($val==911)  
		{$where = 'WHERE gender="R" AND category="3291859052" AND subcategory="3291879911"';}
		
		elseif($val==9060)  
		{$where = 'WHERE gender="CH" AND category="3291859061"';}
		elseif($val==9061)  
		{$where = 'WHERE gender="CH" AND category="3291859061" AND subcategory="3291879912"';}
		elseif($val==9062)  
		{$where = 'WHERE gender="CH" AND category="3291859061" AND subcategory="3291879913"';}
		elseif($val==9063)  
		{$where = 'WHERE gender="CH" AND category="3291859061" AND subcategory="3291879914"';}
		elseif($val==9064)  
			{$where = 'WHERE gender="CH" AND category="3291859061" AND subcategory="3291879915"';}
		elseif($val==9065)  
			{$where = 'WHERE gender="CH" AND category="3291859061" AND subcategory="3291879916"';}
		elseif($val==9066)  
			{$where = 'WHERE gender="CH" AND category="3291859061" AND subcategory="3291879917"';}
		
		elseif($val==9067)  
			{$where = 'WHERE gender="CH" AND category="3291859061" AND subcategory="3291879918"';}
		elseif($val==9068)  
			{$where = 'WHERE gender="CH" AND category="3291859061" AND subcategory="3291879919"';}
		elseif($val==9069)  
			{$where = 'WHERE gender="CH" AND category="3291859061" AND subcategory="3291879920"';}
		elseif($val==9070)  
			{$where = 'WHERE gender="CH" AND category="3291859061" AND subcategory="3291879921"';}
		elseif($val==9071)  
			{$where = 'WHERE gender="CH" AND category="3291859061" AND subcategory="3291879922"';}
		
		elseif($val==9080)  
		{$where = 'WHERE gender="CH" AND category="3291859062"';}
		elseif($val==9081)  
		{$where = 'WHERE gender="CH" AND category="3291859062" AND subcategory="3291879932"';}
		elseif($val==9082)  
		{$where = 'WHERE gender="CH" AND category="3291859062" AND subcategory="3291879933"';}
		elseif($val==9083)  
		{$where = 'WHERE gender="CH" AND category="3291859062" AND subcategory="3291879934"';}
		elseif($val==9084)  
			{$where = 'WHERE gender="CH" AND category="3291859062" AND subcategory="3291879935"';}
		elseif($val==9085)  
			{$where = 'WHERE gender="CH" AND category="3291859062" AND subcategory="3291879936"';}
		elseif($val==9086)  
			{$where = 'WHERE gender="CH" AND category="3291859062" AND subcategory="3291879937"';}
		
		elseif($val==9087)  
			{$where = 'WHERE gender="CH" AND category="3291859062" AND subcategory="3291879938"';}
		elseif($val==9088)  
			{$where = 'WHERE gender="CH" AND category="3291859062" AND subcategory="3291879939"';}
		elseif($val==9089)  
			{$where = 'WHERE gender="CH" AND category="3291859062" AND subcategory="3291879940"';}
		elseif($val==9090)  
			{$where = 'WHERE gender="CH" AND category="3291859062" AND subcategory="3291879941"';}
		elseif($val==9091)  
			{$where = 'WHERE gender="CH" AND category="3291859062" AND subcategory="3291879942"';}
		elseif($val==9100)  
			{$where = 'WHERE gender="CL" AND category="3291859071"';}
		elseif($val==9101)  
			{$where = 'WHERE gender="CL" AND category="3291859071" AND subcategory="3291879972"';}
		elseif($val==9102)  
			{$where = 'WHERE gender="CL" AND category="3291859071" AND subcategory="3291879973"';}
		elseif($val==9103)  
			{$where = 'WHERE gender="CL" AND category="3291859071" AND subcategory="3291879974"';}
		elseif($val==9104)  
			{$where = 'WHERE gender="CL" AND category="3291859071" AND subcategory="3291879975"';}
		//3291859072
		
		elseif($val==9110)  
			{$where = 'WHERE gender="CL" AND category="3291859072"';}
		elseif($val==9111)  
			{$where = 'WHERE gender="CL" AND category="3291859072" AND subcategory="3291879959"';}
		elseif($val==9112)  
			{$where = 'WHERE gender="CL" AND category="3291859072" AND subcategory="3291879960"';}
		elseif($val==9113)  
			{$where = 'WHERE gender="CL" AND category="3291859072" AND subcategory="3291879961"';}
	
		//3291859073
		elseif($val==9120)  
			{$where = 'WHERE gender="CL" AND category="3291859073"';}
		elseif($val==9121)  
			{$where = 'WHERE gender="CL" AND category="3291859073" AND subcategory="3291879976"';}
		elseif($val==9122)  
			{$where = 'WHERE gender="CL" AND category="3291859073" AND subcategory="3291879977"';}
		elseif($val==9123)  
			{$where = 'WHERE gender="CL" AND category="3291859073" AND subcategory="3291879978"';}
			
		elseif($val==9130)  
			{$where = 'WHERE gender="CL" AND category="3291859074"';}
		elseif($val==9131)  
			{$where = 'WHERE gender="CL" AND category="3291859074" AND subcategory="3291879950"';}
		elseif($val==9132)  
			{$where = 'WHERE gender="CL" AND category="3291859074" AND subcategory="3291879951"';}
		elseif($val==9133)  
			{$where = 'WHERE gender="CL" AND category="3291859074" AND subcategory="3291879952"';}	
		elseif($val==9134)  
			{$where = 'WHERE gender="CL" AND category="3291859074" AND subcategory="3291879953"';}	
		elseif($val==9135)  
			{$where = 'WHERE gender="CL" AND category="3291859074" AND subcategory="3291879955"';}	
		elseif($val==3291859075)
			{$where = 'WHERE gender="CL" AND category="3291859075"';}	
		
		elseif($val==3291879962)
			{$where = 'WHERE gender="CL" AND category="3291859075"  AND subcategory="3291879962"';}	
		elseif($val==3291879963)
			{$where = 'WHERE gender="CL" AND category="3291859075"  AND subcategory="3291879963"';}	
			elseif($val==3291879964)
			{$where = 'WHERE gender="CL" AND category="3291859075"  AND subcategory="3291879964"';}	
			elseif($val==3291879965)
			{$where = 'WHERE gender="CL" AND category="3291859075"  AND subcategory="3291879965"';}	
			
			elseif($val==3291859076)
			{$where = 'WHERE gender="CL" AND category="3291859076" ';}	
			elseif($val==3291859077)
			{$where = 'WHERE gender="CL" AND category="3291859077"';}	
			elseif($val==3291879956)
			{$where = 'WHERE gender="CL" AND category="3291859077" AND subcategory="3291879956"';}	
		elseif($val==3291859200)
			{$where = 'WHERE gender="CG" AND category="3291859200"';}
			
			elseif($val==3291879700)
			{$where = 'WHERE gender="CG" AND category="3291859200" AND subcategory="3291879700"';}		
		
		elseif($val==3291879701)
			{$where = 'WHERE gender="CG" AND category="3291859200" AND subcategory="3291879701"';}	
		elseif($val==3291879704)
			{$where = 'WHERE gender="CG" AND category="3291859200" AND subcategory="3291879704"';}		
			elseif($val==3291879705)
			{$where = 'WHERE gender="CG" AND category="3291859200" AND subcategory="3291879705"';}	
			elseif($val==3291879709)
			{$where = 'WHERE gender="CG" AND category="3291859200" AND subcategory="3291879709"';}
			elseif($val==3291879710)
			{$where = 'WHERE gender="CG" AND category="3291859200" AND subcategory="3291879710"';}
		elseif($val==3291859201)
			{$where = 'WHERE gender="CG" AND category="3291859201"';}
			
			elseif($val==3291879597)
			{$where = 'WHERE gender="CG" AND category="3291859201" AND subcategory="3291879597"';}	
			elseif($val==3291879598)
			{$where = 'WHERE gender="CG" AND category="3291859201" AND subcategory="3291879598"';}		
				elseif($val==3291879599)
			{$where = 'WHERE gender="CG" AND category="3291859201" AND subcategory="3291879599"';}
				elseif($val==3291879600)
			{$where = 'WHERE gender="CG" AND category="3291859201" AND subcategory="3291879600"';}
				elseif($val==3291879602)
			{$where = 'WHERE gender="CG" AND category="3291859201" AND subcategory="3291879602"';}
				elseif($val==3291879603)
			{$where = 'WHERE gender="CG" AND category="3291859201" AND subcategory="3291879603"';}
			
		elseif($val==3291859202)
			{$where = 'WHERE gender="CG" AND category="3291859202"';}	
		elseif($val==3291879590)
			{$where = 'WHERE gender="CG" AND category="3291859202" AND subcategory="3291879590"';}
		elseif($val==3291879591)
			{$where = 'WHERE gender="CG" AND category="3291859202" AND subcategory="3291879591"';}
		elseif($val==3291879592)
			{$where = 'WHERE gender="CG" AND category="3291859202" AND subcategory="3291879592"';}	
		elseif($val==3291879593)
			{$where = 'WHERE gender="CG" AND category="3291859202" AND subcategory="3291879593"';}	
		elseif($val==3291879595)
			{$where = 'WHERE gender="CG" AND category="3291859202" AND subcategory="3291879595"';}
		elseif($val==3291879596)
			{$where = 'WHERE gender="CG" AND category="3291859202" AND subcategory="3291879596"';}
			
			
			
			
			
		elseif($val==3291859203)
			{$where = 'WHERE gender="CG" AND category="3291859203"';}	
		elseif($val==3291879580)
			{$where = 'WHERE gender="CG" AND category="3291859203" AND subcategory="3291879580"';}
		elseif($val==3291879581)
			{$where = 'WHERE gender="CG" AND category="3291859203" AND subcategory="3291879581"';}
		elseif($val==3291879582)
			{$where = 'WHERE gender="CG" AND category="3291859203" AND subcategory="3291879582"';}	
		elseif($val==3291879583)
			{$where = 'WHERE gender="CG" AND category="3291859203" AND subcategory="3291879583"';}	
		elseif($val==32918795802)
			{$where = 'WHERE gender="CG" AND category="3291859203" AND subcategory="32918795802"';}
		elseif($val==32918795803)
			{$where = 'WHERE gender="CG" AND category="3291859203" AND subcategory="32918795803"';}	
			
			
		elseif($val==3291859204)
			{$where = 'WHERE gender="CG" AND category="3291859204"';}	
		elseif($val==3291879700)
			{$where = 'WHERE gender="CG" AND category="3291859204" AND subcategory="3291879700"';}
		elseif($val==3291879701)
			{$where = 'WHERE gender="CG" AND category="3291859204" AND subcategory="3291879701"';}
		elseif($val==3291879702)
			{$where = 'WHERE gender="CG" AND category="3291859204" AND subcategory="3291879702"';}	
		elseif($val==3291879703)
			{$where = 'WHERE gender="CG" AND category="3291859204" AND subcategory="3291879703"';}	
		elseif($val==3291879605)
			{$where = 'WHERE gender="CG" AND category="3291859204" AND subcategory="3291879605"';}
			
			
	elseif($val==3291859205)
			{$where = 'WHERE gender="CG" AND category="3291859205"';}	
		elseif($val==3291879600)
			{$where = 'WHERE gender="CG" AND category="3291859205" AND subcategory="3291879600"';}
		elseif($val==3291879601)
			{$where = 'WHERE gender="CG" AND category="3291859205" AND subcategory="3291879601"';}
		elseif($val==3291879602)
			{$where = 'WHERE gender="CG" AND category="3291859205" AND subcategory="3291879602"';}	
		elseif($val==3291879603)
			{$where = 'WHERE gender="CG" AND category="3291859205" AND subcategory="3291879603"';}	
		elseif($val==3291879604)
			{$where = 'WHERE gender="CG" AND category="3291859205" AND subcategory="3291879604"';}	
			elseif($val==3291879605)
			{$where = 'WHERE gender="CG" AND category="3291859205" AND subcategory="3291879605"';}	
			
	elseif($val==3291859206)
			{$where = 'WHERE gender="CG" AND category="3291859206"';}	
		elseif($val==3291879500)
			{$where = 'WHERE gender="CG" AND category="3291859206" AND subcategory="3291879500"';}
		elseif($val==3291879501)
			{$where = 'WHERE gender="CG" AND category="3291859206" AND subcategory="3291879501"';}
		elseif($val==3291879502)
			{$where = 'WHERE gender="CG" AND category="3291859206" AND subcategory="3291879502"';}	
		elseif($val==3291879503)
			{$where = 'WHERE gender="CG" AND category="3291859206" AND subcategory="3291879503"';}	
		elseif($val==3291879504)
			{$where = 'WHERE gender="CG" AND category="3291859206" AND subcategory="3291879504"';}	
			elseif($val==3291879505)
			{$where = 'WHERE gender="CG" AND category="3291859206" AND subcategory="3291879505"';}				
	elseif($val==32918592006)
			{$where = 'WHERE gender="CG" AND category="32918592006"';}	
		elseif($val==3291879550)
			{$where = 'WHERE gender="CG" AND category="32918592006" AND subcategory="3291879550"';}
		elseif($val==3291879551)
			{$where = 'WHERE gender="CG" AND category="32918592006" AND subcategory="3291879551"';}
		elseif($val==3291879502)
			{$where = 'WHERE gender="CG" AND category="32918592006" AND subcategory="3291879502"';}	
		elseif($val==3291879503)
			{$where = 'WHERE gender="CG" AND category="32918592006" AND subcategory="3291879503"';}	
		elseif($val==3291879554)
			{$where = 'WHERE gender="CG" AND category="32918592006" AND subcategory="3291879554"';}	
			elseif($val==3291879555)
			{$where = 'WHERE gender="CG" AND category="32918592006" AND subcategory="3291879555"';}				
		
		elseif($val==3291859207)
			{$where = 'WHERE gender="CG" AND category="3291859207"';}	
		elseif($val==3291879540)
			{$where = 'WHERE gender="CG" AND category="3291859207" AND subcategory="3291879540"';}
		elseif($val==3291879541)
			{$where = 'WHERE gender="CG" AND category="3291859207" AND subcategory="3291879541"';}
		elseif($val==3291879542)
			{$where = 'WHERE gender="CG" AND category="3291859207" AND subcategory="3291879542"';}	
		elseif($val==3291879543)
			{$where = 'WHERE gender="CG" AND category="3291859207" AND subcategory="3291879543"';}	
		elseif($val==3291879544)
			{$where = 'WHERE gender="CG" AND category="3291859207" AND subcategory="3291879544"';}	
			elseif($val==3291879545)
			{$where = 'WHERE gender="CG" AND category="3291859207" AND subcategory="3291879545"';}	
		
		elseif($val==3291859208)
			{$where = 'WHERE gender="CG" AND category="3291859208"';}	
		elseif($val==3291879530)
			{$where = 'WHERE gender="CG" AND category="3291859208" AND subcategory="3291879530"';}
		elseif($val==3291879531)
			{$where = 'WHERE gender="CG" AND category="3291859208" AND subcategory="3291879531"';}
		elseif($val==3291879532)
			{$where = 'WHERE gender="CG" AND category="3291859208" AND subcategory="3291879532"';}	
		elseif($val==3291879533)
			{$where = 'WHERE gender="CG" AND category="3291859208" AND subcategory="3291879533"';}	
		elseif($val==3291879534)
			{$where = 'WHERE gender="CG" AND category="3291859208" AND subcategory="3291879534"';}	
			elseif($val==3291879535)
			{$where = 'WHERE gender="CG" AND category="3291859208" AND subcategory="3291879535"';}					
		
			
		elseif($val==3291859209)
			{$where = 'WHERE gender="CG" AND category="3291859209"';}	
		elseif($val==3291879520)
			{$where = 'WHERE gender="CG" AND category="3291859209" AND subcategory="3291879520"';}
		elseif($val==3291879521)
			{$where = 'WHERE gender="CG" AND category="3291859209" AND subcategory="3291879521"';}
		elseif($val==3291879522)
			{$where = 'WHERE gender="CG" AND category="3291859209" AND subcategory="3291879522"';}	
		elseif($val==3291879523)
			{$where = 'WHERE gender="CG" AND category="3291859209" AND subcategory="3291879523"';}	
		elseif($val==3291879524)
			{$where = 'WHERE gender="CG" AND category="3291859209" AND subcategory="3291879524"';}	
			elseif($val==3291879525)
			{$where = 'WHERE gender="CG" AND category="3291859209" AND subcategory="3291879525"';}	
	
	elseif($val==3291859210)
			{$where = 'WHERE gender="CG" AND category="3291859210"';}	
		elseif($val==3291879510)
			{$where = 'WHERE gender="CG" AND category="3291859210" AND subcategory="3291879510"';}
		elseif($val==3291879511)
			{$where = 'WHERE gender="CG" AND category="3291859210" AND subcategory="3291879511"';}
		elseif($val==3291879512)
			{$where = 'WHERE gender="CG" AND category="3291859210" AND subcategory="3291879512"';}	
		elseif($val==3291879513)
			{$where = 'WHERE gender="CG" AND category="3291859210" AND subcategory="3291879513"';}	
		elseif($val==3291879514)
			{$where = 'WHERE gender="CG" AND category="3291859210" AND subcategory="3291879514"';}	
			elseif($val==3291879515)
			{$where = 'WHERE gender="CG" AND category="3291859210" AND subcategory="3291879515"';}							
				
		elseif($val==3291859211)
			{$where = 'WHERE gender="CG" AND category="3291859211"';}	
		elseif($val==3291879540)
			{$where = 'WHERE gender="CG" AND category="3291859211" AND subcategory="3291879500"';}
		elseif($val==3291879541)
			{$where = 'WHERE gender="CG" AND category="3291859211" AND subcategory="3291879501"';}
		elseif($val==3291879542)
			{$where = 'WHERE gender="CG" AND category="3291859211" AND subcategory="3291879502"';}	
		elseif($val==3291879543)
			{$where = 'WHERE gender="CG" AND category="3291859211" AND subcategory="3291879503"';}	
		elseif($val==3291879544)
			{$where = 'WHERE gender="CG" AND category="3291859211" AND subcategory="3291879504"';}	
			elseif($val==3291879545)
			{$where = 'WHERE gender="CG" AND category="3291859211" AND subcategory="3291879505"';}							
				
						
		$qry = "SELECT * FROM ".config_item('table_perfix')."jewelries ".$where;	
		$return = $this->db->query($qry);
		$result = $return->result_array();
		return isset($result) ? $result : false;
	}

	function getJewelryByStockNumber($val){	
		$qry = "SELECT * FROM ".config_item('table_perfix')."jewelries WHERE stock_number=".$val;	
		$return = $this->db->query($qry);
		$result = $return->result_array();
		return isset($result) ? $result : false;
	}

	function manageOfferEmail() {
		$dt = date('Y-m-d H:i:s');
		$emailAddress = $this->input->post('email_address');
		$price = $this->input->post('price');
		$color = $this->input->post('color');
		$cut = $this->input->post('cut');
		$clairty = $this->input->post('clairty');
		$omessage = $this->input->post('message');
		$videoId = $this->input->post('video_id');
		$videoName = $this->input->post('video_name');

		$sql = "SELECT * FROM ". $this->config->item('table_perfix')."make_offers WHERE email_address LIKE '". $emailAddress."' AND video_id LIKE '". $videoId."' ORDER BY id DESC LIMIT 1";
		$result = $this->db->query($sql);
		if ($result->num_rows() == 0) {
			$data = array(
				'email_address' => $emailAddress,
				'price' => $price,
				'color' => $color,
				'cut' => $cut,
				'clairty' => $clairty,
				'message' => $omessage,
				'video_id' => $videoId,
				'video_name' => $videoName,
				'date_added' => $dt
			);
			$this->db->insert($this->config->item('table_perfix').'make_offers', $data);
			$last_id = $this->db->insert_id();

			return $last_id;
		}
		return false;
	}

}
?>
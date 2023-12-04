<?php  //ini_set("display_errors", 1);

/*
https://62.210.247.181:2083/
elandiamond
_ue$;T*h8?.D
*/

//error_reporting(E_ALL);
 class Cronrapnetmodel extends CI_Model {
 	
 	function __construct()
	{
 		parent::__construct(); 		
 	}
 	
 	// 	function cleans($strings) {
	// 	$strings = str_replace(array('`', "'"), '', $strings);
	// 	return $strings;
	// }	
 	
 	function gethelixinclude()
	{
		$qry = "SELECT value FROM ".config_item('table_perfix')."helix_rules where variable = 'helixinclude'";
		$result = 	$this->db->query($qry);
		$ret = $result->result_array();	
		 
		return isset($ret[0]) ? $ret[0]['value'] : '';
	}
	
	function gethelixexclude()
	{
		$qry = "SELECT value FROM ".config_item('table_perfix')."helix_rules where variable = 'helixexclude'";
		$result = 	$this->db->query($qry);
		$ret = $result->result_array();	
		 
		return isset($ret[0]) ? $ret[0]['value'] : '';
	}
	
	function emptyhelix()
	{
		return $this->db->query('TRUNCATE TABLE '.config_item('table_perfix') . 'rapproduct');
	}
	
	function saveinhelix($cols)
	{
	$shapeArray = array('RO'=>'B','ROUND'=>'B','PR'=>'PR','PRINCESS'=>'PR','RA'=>'R','RADIANT'=>'R','EM'=>'E','EMERALD'=>'E','AS'=>'AS','ASSCHER'=>'AS','OV'=>'O','OVAL'=>'O','MA'=>'M','MARQUISE'=>'M','PE'=>'P','PEAR'=>'P','HE'=>'H','HEART'=>'H','CU'=>'C','CUSHION'=>'C');
	  if(is_array($cols))
	  {
	  	$carat  		= isset($cols[0]) ? $cols[0] : '0';
	  	$Cert  			= isset($cols[1]) ? $cols[1] : '';
	  	$Cert_n  		= isset($cols[2]) ? $cols[2] : '';
		$clarity  		= isset($cols[3]) ? $cols[3] : '';
	  	$color  		= isset($cols[4]) ? $cols[4] : '';
	  	$Comment  		= isset($cols[5]) ? $cols[5] : '';
	  	$Country   		= isset($cols[6]) ? $cols[6] : '';
		$City    		= isset($cols[7]) ? $cols[7] : '';
		$Girdle  		= isset($cols[8]) ? $cols[8] : '';
	  	$Culet  		= isset($cols[9]) ? $cols[9] : '';
	  	$cut            = isset($cols[10]) ? $cols[10] : 0;
		$Depth  		= isset($cols[11]) ? $cols[11] : '0';
	  	$Flour  		= isset($cols[12]) ? $cols[12] : '';
	  	$lot 			= isset($cols[13]) ? $cols[13] : 0;
	  	$Meas  			= isset($cols[14]) ? str_replace('-','x',$cols[14]) : '0';
	  	$Polish  		= isset($cols[15]) ? $cols[15] : '';
	  	$price  		= isset($cols[16]) ? $cols[16] : '250';
	  	$Rap  	    	= isset($cols[17]) ? $cols[17] : '0';
	  	$Make    		= isset($cols[18]) ? $cols[18] : '';
	  	$ratio    		= isset($cols[19]) ? $cols[19] : '';
	  	$owner  		= isset($cols[20]) ? $cols[20] : 'NA';
	  	$shape  		= isset($cols[21]) ? $shapeArray[strtoupper($cols[21])] : '';
		//$shape  		= isset($cols[21]) ? strtoupper($cols[21]) : '';
	    $State   		= isset($cols[22]) ? $cols[22] : '';
	  	$Stock_n    	= isset($cols[23]) ? $cols[23] : '';
	  	$Sym  			= isset($cols[24]) ? $cols[24] : '';
	  	$TablePercent  	= isset($cols[25]) ? $cols[25] : 'NA';
	  	$Stones  		= isset($cols[26]) ? $cols[26] : '';
	  	$CertImage   	= isset($cols[27]) ? $cols[27] : '';
	  	$Date    		= isset($cols[28]) ? $cols[28]  : '';
		$MeasArray		= explode('x', $Meas);
	  	 if(strcmp($cut,'')===0) 
		   $cut='G';
				
		
		$shapeCode = strtoupper($cols[21]);
	  	 
	  	$Cert = strtoupper($Cert);
	  	$ratio = ( isset($ratio) && $ratio != null) ? $ratio : ' ';
	  	$price = $this->erdprice($price * $carat) ;
	  	if(array_key_exists($shapeCode, $shapeArray)) {
		if(is_numeric($Depth) && is_numeric($TablePercent))
		{
		$helixInclude = strtolower (trim($this->gethelixinclude()));	
		$helixIncludeArray = explode(',', $helixInclude);
	    $tempowner = strtolower(trim($owner));
		if(in_array($tempowner,  $helixIncludeArray)) 
		{
		  $isinsert = $this->db->insert($this->config->item('table_perfix').'rapproduct',
					array('lot'    =>  $lot,
					       'owner' =>  $owner,
					       'shape' =>  $shape,
					       'carat' => $carat,
					       'color' => $color,
					       'clarity' => $clarity,
					       'cut'   => $cut,
					       'price' => $price,
					       'Rap'   => $Rap,
					       'Cert'  			=> $Cert,
					       'Depth' 			=> $Depth,
					       'TablePercent' 	=> $TablePercent,
					       'Girdle' 		=> $Girdle,
					       'Culet' 	=> $Culet,
					       'Polish' => $Polish,
					       'Sym' 	=> $Sym,
					       'Flour' 	=> $Flour,
					       'Meas' 	=> $Meas,
					       'Comment' 	=> $Comment,
					       'Stones' 	=> $Stones,
					       'Cert_n' 	=> $Cert_n,
					       'Stock_n' 	=> $Stock_n,
					       'Make' 	=> $Make,
					       'Date' 	=> $Date,
					       'City' 	=> $City,
					       'State' 	=> $State,
					       'Country' => $Country,
					       'ratio'  => $ratio,
					       'tbl'	=> config_item('base_url').'diamonds/search/true/true/false/false/false/'.$lot,
						   'certimage' => $CertImage,
						   'length' => $MeasArray[0],
						   'width' => $MeasArray[1],
						   'height' => $MeasArray[2]
						));
				if(!$isinsert)
				{
					return false;
				}
				else 
				    return true;	
				}
			}

			}
	    }
	}

function SaveRapnetRingsDiamondIntoDB($cols, $row) {
    $action='';
    //print_ar($cols);
    $email_content = '';
	if(is_array($cols)) {	  		  
        $lot 		= isset($cols[72]) ? $cols[72] : '0';
        $owner 		= isset($cols[0]) ? $cols[0] : '';
        $Make 		= isset($cols[50]) ? $cols[50] : '';
        $Rap 		= isset($cols[1]) ? $cols[1] : '0';
        $name_code      = isset($cols[2]) ? $cols[2] : '0';  //// add column in insert query
        $shape 		= isset($cols[3]) ? $cols[3] : '';
        $carat 		= isset($cols[4]) ? $cols[4] : '0';
        $color	 	= isset($cols[5]) ? $cols[5] : '';
        $clarity 	= isset($cols[6]) ? $cols[6] : '';
        $fancy_color    = isset($cols[7]) ? $cols[7] : '';
        $fcolor_intens  = isset($cols[8]) ? $cols[8] : '';
        $fancy_color_ot = isset($cols[9]) ? $cols[9] : '';
        $cut 		= isset($cols[10]) ? $cols[10] : '0';
        $Polish 	= isset($cols[11]) ? $cols[11] : '';
        $Sym 		= isset($cols[12]) ? $cols[12] : '';
        $Flour_color    = isset($cols[13]) ? $cols[13] : '';        //// add column in insert query
        $Flour 		= isset($cols[14]) ? $cols[14] : '';
        $Meas 		= isset($cols[15]) ? $cols[15] : '0';
        $length 	= isset($cols[16]) ? $cols[16] : '';
        $width 		= isset($cols[17]) ? $cols[17] : '';
        $ratio 		= isset($cols[19]) ? $cols[19] : '';
        $lab 		= isset($cols[20]) ? $cols[20] : '';
        $Cert 		= isset($cols[20]) ? $cols[20] : '0';
        $Cert_n 	= isset($cols[21]) ? $cols[21] : '';
        $Stock_n 	= isset($cols[22]) ? $cols[22] : '';
        $pricepercrt = isset($cols[23]) ? $cols[23] : '0';
        $price 		= isset($cols[25]) ? $cols[25] : '0';
        $availability   = isset($cols[29]) ? $cols[29] : '0';
        $Depth          = isset($cols[30]) ? $cols[30] : '0';
        $tbl 		= isset($cols[31]) ? $cols[31] : '';
        $Girdle 	= isset($cols[32]) ? $cols[32] : '';
        $Culet 		= isset($cols[35]) ? $cols[35] : '';
        $Culet_size 	 = isset($cols[36]) ? $cols[36] : '';  /// add column in instert
        $Culet_condition = isset($cols[37]) ? $cols[37] : ''; /// add column in instert
        $crown 		= isset($cols[38]) ? $cols[38] : '';
        $pavilion 	= isset($cols[39]) ? $cols[39] : '';
        $Comment 	= isset($cols[40]) ? $cols[40] : '';
        $member_coments	= isset($cols[41]) ? $cols[41] : ''; /// add column in instert
        $City 		= isset($cols[42]) ? $cols[42] : '';
        $State 		= isset($cols[43]) ? $cols[43] : '';
        $Country 	= isset($cols[44]) ? $cols[44] : '';
        $isMatched 	= isset($cols[45]) ? $cols[45] : ''; /// add column in instert
        $isMatched_separ = isset($cols[46]) ? $cols[46] : ''; /// add column in instert
        $Stones 	= isset($cols[48]) ? $cols[48] : '';
        $certimage  = isset($cols[49]) ? $cols[49] : '';
        $imageurl   = isset($cols[50]) ? $cols[50] : ''; /// add column in instert
        $rapSpec        = isset($cols[51]) ? $cols[51] : '';
        $Date 		= isset($cols[52]) ? $cols[52] : '';
        $pavilion_depth = isset($cols[63]) ? $cols[63] : ''; /// add column in instert
        $paviil_angle   = isset($cols[64]) ? $cols[64] : '';
        $TablePercent = isset($cols[65]) ? $cols[65] : 'NA';
        $suplier_country  = isset($cols[66]) ? $cols[66] : ''; /// add column in instert
        $depth_percent    = isset($cols[67]) ? $cols[67] : ''; /// add column in instert
        $crown_angle = isset($cols[68]) ? $cols[68] : '';
        $girdle_condition   = isset($cols[71]) ? $cols[71] : ''; /// add column in instert
        $height 	= $Depth; //isset($cols[18]) ? $cols[18] : '';

        $Date = date("Y-m-d H:i:s",strtotime($Date));
        $MeasArray		= explode('x', $Meas);
        $Stock_n = $Stock_n; //.($this->random(2));
		         
        if(strcmp($cut,'')===0)
		$cut='';		
        $shapeCode = strtoupper($cols[3]);
	  	$Cert = strtoupper($Cert);
		
	  	$ratio = ( isset($ratio) && $ratio != null) ? $ratio : ' ';	  
		$os = array('D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');

       //if (in_array($color , $os)) {
            //if (in_array($owner , $ownerArr)) {
        $qry = "SELECT Stock_n FROM dev_rapproduct where Stock_n = '" . $Stock_n . "'";
        $result = 	$this->db->query($qry);
        $ret_lot = $result->result_array();
		$cerstr = substr($Cert,0,5);
              //      if(($cerstr == 'GIA' || $cerstr == 'EGL I' || $cerstr == 'EGL U') && !empty($Cert_n) &&  ($price > 0 ) ){
       $email_content .= "<tr><td>".$lot."</td>
       						  <td>".$owner."</td>
       						  <td>".$shape."</td>
       						  <td>".$price."<td>
       						  <td>".$Cert."</td></tr>";

       	//$this->load->helper('custome_helper');
 					 					 
		$in = " (lot, owner, shape, carat, color, fancy_color, fancy_color_ot, clarity, price, Rap, Cert, Depth, TablePercent, Girdle, Culet, Polish, Sym, Flour, Meas, Comment, Stones, Cert_n, Stock_n, Make, Date, City, State, Country, ratio, cut, tbl, pricepercrt, certimage, length, width, height) ";
		//if(!empty(cleans($lot))) {		
		if(!empty($lot)) {		
			$rappnet_values = "('".cleans($lot)."', '".cleans($owner)."', '".cleans($name_code)."', '".cleans($shape)."', '".cleans($carat)."', '".cleans($color)."', '".cleans($fancy_color)."', '".cleans($fancy_color_ot)."', '".cleans($clarity)."', '".cleans($price)."', '".cleans($price)."', '".cleans($Rap)."', '".cleans($Cert)."', '".cleans($Depth)."', '".cleans($TablePercent)."', '".cleans($Girdle)."', '".cleans($Culet)."', '".cleans($Polish)."', '".cleans($Sym)."', '".cleans($Flour)."', '".cleans($Meas)."', '".cleans($Comment)."', '".cleans($Stones)."', '".cleans($Cert_n)."', '".cleans($Stock_n)."', '".cleans($Make)."', '".cleans($Date)."', '".cleans($City)."', '".cleans($State)."', '".cleans($Country)."', '".cleans($ratio)."', '".cleans($cut)."', '".cleans($tbl)."', '".cleans($pricepercrt)."', '".cleans($certimage)."', '".cleans($length)."', '".cleans($width)."', '".cleans($height)."', '".cleans($lab)."', '".cleans($fcolor_intens)."', '".cleans($crown)."', '".cleans($crown_angle)."', '".cleans($pavilion)."', '".cleans($paviil_angle)."', '".cleans($Flour_color)."', '".cleans($Culet_size)."', '".cleans($Culet_condition)."', '".cleans($member_coments)."', '".cleans($isMatched)."', '".cleans($isMatched_separ)."', '".cleans($imageurl)."', '".cleans($pavilion_depth)."', '".cleans($suplier_country)."', '".cleans($depth_percent)."', '".cleans($girdle_condition)."')";
			return $rappnet_values;
        }
    }
} /// end function
	
function fixhelix()
{
		$qry = "Update ". $this->config->item('table_perfix') ."rapproduct set Polish= 'GD' where Polish='G'";
		$this->db->query($qry);
		$qry = "Update ". $this->config->item('table_perfix') ."rapproduct set Polish= 'ID' where Polish='I'";
		$this->db->query($qry);
		
		/// fix fluro
		$qry = "Update ". $this->config->item('table_perfix') ."rapproduct set Flour= 'NO' where Flour='N'";
		$this->db->query($qry);
		$qry = "Update ". $this->config->item('table_perfix') ."rapproduct set Flour= 'MED' where Flour='M'";
		$this->db->query($qry);
		$qry = "Update ". $this->config->item('table_perfix') ."rapproduct set Flour= 'ST BLUE' where Flour='SB'";
		$this->db->query($qry);
		$qry = "Update ". $this->config->item('table_perfix') ."rapproduct set Flour= 'VST BLUE' where Flour='VSLB'";
		$this->db->query($qry);

		// fix SYMMETRY
		$qry = "Update ". $this->config->item('table_perfix') ."rapproduct set Sym= 'GD' where Sym='G'";
		$this->db->query($qry);
		$qry = "Update ". $this->config->item('table_perfix') ."rapproduct set Sym= 'ID' where Sym='I'";
		$this->db->query($qry);
		 
		// fix CULET
		$qry = "Update ". $this->config->item('table_perfix') ."rapproduct set Culet= 'NO' where Culet='N'";
		$this->db->query($qry);
		$qry = "Update ". $this->config->item('table_perfix') ."rapproduct set Culet= 'VS' where Culet='V'";
		$this->db->query($qry);
		$qry = "Update ". $this->config->item('table_perfix') ."rapproduct set Culet= 'SM' where Culet='S'";
		$this->db->query($qry);
		$qry = "Update ". $this->config->item('table_perfix') ."rapproduct set Culet= 'PN' where Culet='P'";
		$this->db->query($qry);
		$qry = "Update ". $this->config->item('table_perfix') ."rapproduct set Culet= 'ME' where Culet='M'";
		$this->db->query($qry);
		$qry = "Update ". $this->config->item('table_perfix') ."rapproduct set Culet= 'LR' where Culet='L'";
		$this->db->query($qry);
		
		// fix cut
		$qry = "Update ". $this->config->item('table_perfix') ."rapproduct set cut= 'Good' where cut='G'";
		$this->db->query($qry);
		$qry = "Update ". $this->config->item('table_perfix') ."rapproduct set cut= 'Very Good' where cut='VG'";
		$this->db->query($qry);
		$qry = "Update ". $this->config->item('table_perfix') ."rapproduct set cut= 'Premium' where cut='EX'";
		$this->db->query($qry);
		$qry = "Update ". $this->config->item('table_perfix') ."rapproduct set cut= 'Ideal' where cut='I'";
		$this->db->query($qry);
		
		/*
		// fix clarity 
		$qry = "Update ". $this->config->item('table_perfix') ."rapproduct set clarity= '0' where clarity='IF'";
		$this->db->query($qry);
		$qry = "Update ". $this->config->item('table_perfix') ."rapproduct set clarity= '1' where clarity='VVS1'";
		$this->db->query($qry);
		$qry = "Update ". $this->config->item('table_perfix') ."rapproduct set clarity= '2' where clarity='VVS2'";
		$this->db->query($qry);
		$qry = "Update ". $this->config->item('table_perfix') ."rapproduct set clarity= '3' where clarity='VS1'";
		$this->db->query($qry);
		$qry = "Update ". $this->config->item('table_perfix') ."rapproduct set clarity= '4' where clarity='VS2'";
		$this->db->query($qry);
		$qry = "Update ". $this->config->item('table_perfix') ."rapproduct set clarity= '5' where clarity='SI1'";
		$this->db->query($qry);
		$qry = "Update ". $this->config->item('table_perfix') ."rapproduct set clarity= '6' where clarity='SI2'";
		$this->db->query($qry);
		
		  
		$DELETE  = "DELETE FROM ". $this->config->item('table_perfix') ."rapproduct WHERE ";
		$DELETE  .= " Cert  NOT IN('AGS', 'GIA')";
		$DELETE  .= " OR cut NOT IN('Good','Very Good','Premium','Ideal') "; 
		$DELETE  .= " OR clarity NOT IN('0','1','2','3','4','5','6') ";
		$DELETE  .= " OR Polish NOT IN('GD','VG','EX','ID','F') ";
		$DELETE  .= " OR Sym NOT IN('GD','VG','EX','ID','F') ";
		$DELETE  .= " OR Flour NOT IN('NO','FB','F','MB','MED','S','ST BLUE','VSL','VST BLUE') ";
		$DELETE  .= " OR Culet NOT IN('NO','VS','SM','PN','ME','LR') ";
		$DELETE  .= " OR price < 250";
		$DELETE  .= " OR color NOT IN('D','E','F','G','H','I','J') ";
		$DELETE  .= " OR sym NOT IN('EX','GD','ID','VG','F') ";
		$DELETE  .= " OR shape NOT IN('B','PR','R','E','AS','O','M','P','H','C') ";
		$this->db->query($DELETE);
		*/
	}
	
	function erdprice($price = 250){
 	if(trim(floatval($price)) < 1) $price = 0;
	$price=floatval($price);
 	$qry = "SELECT rate from ".config_item('table_perfix')."helix_prices
				WHERE  pricefrom <= $price and priceto >= $price
				";
		$result = 	$this->db->query($qry);
		$return = $result->result_array();	
		if(isset($return[0]))
		{
			//$price += $price * ($return[0]['rate']/100);
			$price = $price * $return[0]['rate'];
		}
		
		return $price;
 }

 function getDiamondByLOT($sku = ''){
		$qry = "SELECT *
				FROM ".config_item('table_perfix')."rapproduct
				WHERE lot = '".$sku."'
				";
		$return = 	$this->db->query($qry);
		$result = $return->result_array();	
		return isset($result[0]) ? $result[0] : false;
	}
	
	function getRoundStoreCategoryID($carat) {
		if($carat >= 0.20 && $carat < 0.40) {
			$storeCatID = 1206795010;
		} else if($carat >= 0.40 && $carat < 0.70) {
			$storeCatID = 18253467;
		} else if($carat >= 0.70 && $carat < 0.90) {
			$storeCatID = 18253468;
		} else if($carat >= 0.90 && $carat < 1.00) {
			$storeCatID = 18253469;
		} else if($carat >= 1.00 && $carat < 1.50) {
			$storeCatID = 18253470;
		} else if($carat >= 1.50 && $carat < 2.00) {
			$storeCatID = 18253471;
		} else if($carat >= 2.00 && $carat < 3.00) {
			$storeCatID = 18253472;
		} else if($carat >= 3.00 && $carat < 4.00) {
			$storeCatID = 18253473;
		} else  {
			$storeCatID = 18253474;
		}
			
			return $storeCatID;
	
	}

	function getPrincessStoreCategoryID($carat) {
		if($carat >= 0.20 && $carat < 0.40) {
			$storeCatID = 1206796010;
		} else if($carat >= 0.40 && $carat < 0.70) {
			$storeCatID = 18429729;
		} else if($carat >= 0.70 && $carat < 0.90) {
			$storeCatID = 18429730;
		} else if($carat >= 0.90 && $carat < 1.00) {
			$storeCatID = 18429731;
		} else if($carat >= 1.00 && $carat < 1.50) {
			$storeCatID = 18429732;
		} else if($carat >= 1.50 && $carat < 2.00) {
			$storeCatID = 18429733;
		} else if($carat >= 2.00 && $carat < 3.00) {
			$storeCatID = 18429734;
		} else if($carat >= 3.00 && $carat < 4.00) {
			$storeCatID = 18429735;
		} else  {
			$storeCatID = 18429736;
		}
			
			return $storeCatID;
	
	}
	 
	function getPearStoreCategoryID($carat) {
		if($carat >= 0.20 && $carat < 0.40) {
			$storeCatID = 1548066010;
		} else if($carat >= 0.40 && $carat < 0.70) {
			$storeCatID = 785096010;
		} else if($carat >= 0.70 && $carat < 0.90) {
			$storeCatID = 785097010;
		} else if($carat >= 0.90 && $carat < 1.00) {
			$storeCatID = 785098010;
		} else if($carat >= 1.00 && $carat < 1.50) {
			$storeCatID = 785099010;
		} else if($carat >= 1.50 && $carat < 2.00) {
			$storeCatID = 785100010;
		} else if($carat >= 2.00 && $carat < 3.00) {
			$storeCatID = 785101010;
		} else if($carat >= 3.00 && $carat < 4.00) {
			$storeCatID = 785102010;
		} else  {
			$storeCatID = 785103010;
		}
		return $storeCatID;
	}
	
	function getEmeraldStoreCategoryID($carat) {
		if($carat >= 0.20 && $carat < 0.40) {
			$storeCatID = 1548064010;
		} else if($carat >= 0.40 && $carat < 0.70) {
			$storeCatID = 785113010;
		} else if($carat >= 0.70 && $carat < 0.90) {
			$storeCatID = 785114010;
		} else if($carat >= 0.90 && $carat < 1.00) {
			$storeCatID = 785115010;
		} else if($carat >= 1.00 && $carat < 1.50) {
			$storeCatID = 785116010;
		} else if($carat >= 1.50 && $carat < 2.00) {
			$storeCatID = 785117010;
		} else if($carat >= 2.00 && $carat < 3.00) {
			$storeCatID = 785118010;
		} else if($carat >= 3.00 && $carat < 4.00) {
			$storeCatID = 785119010;
		} else  {
			$storeCatID = 785120010;
		}
		return $storeCatID;
	}

	function getOvalStoreCategoryID($carat) {
		if($carat >= 0.20 && $carat < 0.40) {
			$storeCatID = 1548068010;
		} else if($carat >= 0.40 && $carat < 0.70) {
			$storeCatID = 785188010;
		} else if($carat >= 0.70 && $carat < 0.90) {
			$storeCatID = 785189010;
		} else if($carat >= 0.90 && $carat < 1.00) {
			$storeCatID = 785190010;
		} else if($carat >= 1.00 && $carat < 1.50) {
			$storeCatID = 785191010;
		} else if($carat >= 1.50 && $carat < 2.00) {
			$storeCatID = 785192010;
		} else if($carat >= 2.00 && $carat < 3.00) {
			$storeCatID = 785193010;
		} else if($carat >= 3.00 && $carat < 4.00) {
			$storeCatID = 785194010;
		} else  {
			$storeCatID = 785195010;
		}
		return $storeCatID;
	}

	function getMarquiseStoreCategoryID($carat) {
		if($carat >= 0.20 && $carat < 0.40) {
			$storeCatID = 1548074010;
		} else if($carat >= 0.40 && $carat < 0.70) {
			$storeCatID = 785163010;
		} else if($carat >= 0.70 && $carat < 0.90) {
			$storeCatID = 785164010;
		} else if($carat >= 0.90 && $carat < 1.00) {
			$storeCatID = 785165010;
		} else if($carat >= 1.00 && $carat < 1.50) {
			$storeCatID = 785166010;
		} else if($carat >= 1.50 && $carat < 2.00) {
			$storeCatID = 785167010;
		} else if($carat >= 2.00 && $carat < 3.00) {
			$storeCatID = 785168010;
		} else if($carat >= 3.00 && $carat < 4.00) {
			$storeCatID = 785169010;
		} else  {
			$storeCatID = 785170010;
		}
		return $storeCatID;
	}
	
	function getAsscherStoreCategoryID($carat) {
		if($carat >= 0.20 && $carat < 0.40) {
			$storeCatID = 1001021010;
		} else if($carat >= 0.40 && $carat < 0.70) {
			$storeCatID = 1001022010;
		} else if($carat >= 0.70 && $carat < 0.90) {
			$storeCatID = 1001023010;
		} else if($carat >= 0.90 && $carat < 1.00) {
			$storeCatID = 1001024010;
		} else if($carat >= 1.00 && $carat < 1.50) {
			$storeCatID = 1001025010;
		} else if($carat >= 1.50 && $carat < 2.00) {
			$storeCatID = 1001026010;
		} else if($carat >= 2.00 && $carat < 3.00) {
			$storeCatID = 1001027010;
		} else if($carat >= 3.00 && $carat < 4.00) {
			$storeCatID = 1548224010;
		} else  {
			$storeCatID = 1548225010;
		}
		return $storeCatID;
	}
	
	function getCushionStoreCategoryID($carat) {
		if($carat >= 0.20 && $carat < 0.40) {
			$storeCatID = 1548246010;
		} else if($carat >= 0.40 && $carat < 0.70) {
			$storeCatID = 1548247010;
		} else if($carat >= 0.70 && $carat < 0.90) {
			$storeCatID = 1548248010;
		} else if($carat >= 0.90 && $carat < 1.00) {
			$storeCatID = 1548249010;
		} else if($carat >= 1.00 && $carat < 1.50) {
			$storeCatID = 1548250010;
		} else if($carat >= 1.50 && $carat < 2.00) {
			$storeCatID = 1548251010;
		} else if($carat >= 2.00 && $carat < 3.00) {
			$storeCatID = 1548252010;
		} else if($carat >= 3.00 && $carat < 4.00) {
			$storeCatID = 1548253010;
		} else  {
			$storeCatID = 1548254010;
		}
		return $storeCatID;
	}

	function getRadiantStoreCategoryID($carat) {
		if($carat >= 0.20 && $carat < 0.40) {
			$storeCatID = 1001066010;
		} else if($carat >= 0.40 && $carat < 0.70) {
			$storeCatID = 1001067010;
		} else if($carat >= 0.70 && $carat < 0.90) {
			$storeCatID = 1001068010;
		} else if($carat >= 0.90 && $carat < 1.00) {
			$storeCatID = 1001069010;
		} else if($carat >= 1.00 && $carat < 1.50) {
			$storeCatID = 1001070010;
		} else if($carat >= 1.50 && $carat < 2.00) {
			$storeCatID = 1001071010;
		} else if($carat >= 2.00 && $carat < 3.00) {
			$storeCatID = 1001072010;
		} else if($carat >= 3.00 && $carat < 4.00) {
			$storeCatID = 1548229010;
		} else  {
			$storeCatID = 1548230010;
		}
		return $storeCatID;
	}
	
	function getHeartStoreCategoryID($carat) {
		if($carat >= 0.20 && $carat < 0.40) {
			$storeCatID = 1548270010;
		} else if($carat >= 0.40 && $carat < 0.70) {
			$storeCatID = 1548271010;
		} else if($carat >= 0.70 && $carat < 0.90) {
			$storeCatID = 1548272010;
		} else if($carat >= 0.90 && $carat < 1.00) {
			$storeCatID = 1548273010;
		} else if($carat >= 1.00 && $carat < 1.50) {
			$storeCatID = 1548274010;
		} else if($carat >= 1.50 && $carat < 2.00) {
			$storeCatID = 1548275010;
		} else if($carat >= 2.00 && $carat < 3.00) {
			$storeCatID = 1548276010;
		} else if($carat >= 3.00 && $carat < 4.00) {
			$storeCatID = 1548277010;
		} else  {
			$storeCatID = 1548278010;
		}
		return $storeCatID;
	}

	function getItemSpecification($detail){
		
				switch ($detail['shape']){
			case 'B':
				$shape = 'Round';
			break;
			case 'PR':
				$shape = 'Princess';
			break;
			case 'R':
				$shape = 'Radiant';
				break;
			case 'E':
				$shape = 'Emerald';
				break;
			case 'AS':
				$shape = 'Asscher';
				break;
			case 'O':
				$shape = 'Oval';
				break;
			case 'M':
				$shape = 'Marquise';
				break;
			case 'P':
				$shape = 'Pear';
				break;
			case 'H':
				$shape = 'Heart';
				break;
			case 'C':
				$shape = 'Cushion';
				break;								  	
			default:
				$shape = $detail['shape'];
				break;
		 }	
		$specification = '<ItemSpecifics> 
					  <NameValueList> 
						<Name>Ring Size</Name> 
						<Value>Size Selectable</Value> 
					  </NameValueList> 
					  <NameValueList> 
						<Name>Metal</Name> 
						<Value>White Gold</Value> 
					  </NameValueList> 
					  <NameValueList> 
						<Name>Metal Purity</Name> 
						<Value>14k</Value> 
					  </NameValueList> 
					  <NameValueList> 
						<Name>Clarity</Name> 
						<Value>'.$detail['clarity'].'</Value> 
					  </NameValueList> 
					  <NameValueList> 
						<Name>Stone Shape</Name> 
						<Value>'.$shape.'</Value> 
					  </NameValueList> 
					 <NameValueList> 
						<Name>Exact Carat Total Weight</Name> 
						<Value>'.$detail['carat'].'</Value> 
					  </NameValueList> 
					<NameValueList> 
						<Name>Certification/Grading</Name> 
						<Value>'.$detail['Cert'].'</Value> 
					  </NameValueList> 
					<NameValueList> 
						<Name>Color</Name> 
						<Value>'.$detail['color'].'</Value> 
					  </NameValueList>
					<NameValueList>
					  <Name>Main Stone Treatment</Name> 
					  <Value>Not Enhanced</Value> 
				  </NameValueList>

					</ItemSpecifics>';

		$specification .= '<ConditionID>1000</ConditionID>';
					  
		return $specification;

	}
	function get_attribute($detail) {
		$requestXmlBody .= '<AttributeSetArray> 
							  <AttributeSet attributeSetID="2426"> 
								<Attribute attributeID="10244"> 
								  <Value> 
									<ValueID>10425</ValueID> 
								  </Value> 
								</Attribute>

								<Attribute attributeID="26177"> 
								  <Value> 
									<ValueID>93464</ValueID> 
								  </Value> 
								</Attribute>

								<Attribute attributeID="26176"> 
								  <Value> 
									<ValueID>26247</ValueID> 
								  </Value> 
								</Attribute>

								<Attribute attributeID="47013"> 
								  <Value> 
									<ValueID>46802</ValueID> 
								  </Value> 
								</Attribute>

								<Attribute attributeID="26178"> 
								  <Value> 
									<ValueID>'.$this->getClarity($detail['clarity']).'</ValueID> 
								  </Value> 
								</Attribute>
								
								<Attribute attributeID="83057"> 
								  <Value> 
									<ValueID>'.$this->getEbayCarat($detail['carat']).'</ValueID> 
								  </Value> 
								</Attribute>

								<Attribute attributeID="26350"> 
								  <Value> 
									<ValueID>-3</ValueID> 
								  </Value> 
								</Attribute>

								<Attribute attributeID="26175"> 
								  <Value> 
									<ValueID>'.$this->getEbayShape($detail['shape']).'</ValueID> 
								  </Value> 
								</Attribute>

								<Attribute attributeID="35939"> 
								  <Value> 
									<ValueID>'.$this->getEbayCertificate($detail['Cert']).'</ValueID> 
								  </Value> 
								</Attribute>
							 
								<Attribute attributeID="26353"> 
								  <Value> 
									<ValueID>'.$this->getEbayColor($detail['color']).'</ValueID> 
								  </Value> 
								</Attribute>
							  </AttributeSet> 
							</AttributeSetArray>';
		
		return $requestXmlBody;
	}

	function getClarity($clarity) {

		switch(strtoupper($clarity)) {
			case 'VS2' :
				$value = 26342;
			break;
			case 'VVS2' :
				$value = 26340;
			break;
			case 'VVS1' :
				$value = 26340;
			break;
			case 'VS1' :
				$value = 26342;
			break;
			case 'SI1' :
				$value = 26347;
			break;
			case 'I1' :
				$value = 26344;
			break;
			case 'SI2' :
				$value = 26347;
			break;
			case 'IF' :
				$value = 26338;
			break;
			case 'SI3' :
				$value = -6;
			break;
			case 'I2' :
				$value = 26344;
			break;
			case '' :
				$value = -10;
			break;
			case 'I3' :
				$value = 26344;
			break;
			case 'FL' :
				$value = 26338;
			break;
			default :
				$value = -6;
			break;
		}

		return $value;

	}

	function getEbayCarat($carat) {
		if($carat < 0.30) {
			$value = 26300;
		} else if($carat >= 0.30 && $carat < 0.46) {
			$value = 80924;
		} else if($carat >= 0.46 && $carat < 0.70) {
			$value = 80925;
		} else if($carat >= 0.70 && $carat < 0.90) {
			$value = 80927;
		} else if($carat >= 0.90 && $carat < 1.40) {
			$value = 80929;
		} else if($carat >= 1.40 && $carat < 1.80) {
			$value = 80931;
		} else if($carat >= 1.80 && $carat < 2.80) {
			$value = 80933;
		} else if($carat >= 2.80) {
			$value = 80935;
		} else  {
			$value = -6;
		}
		
		return $value;
	}

	function getEbayShape($shape) {

		switch(strtoupper($shape)) {
			case 'B':
				$value = 26241;
			break;
			case 'PR':
				$value = 26242;
			break;
			case 'R':
				$value = 26240;
				break;
			case 'E':
				$value = 26179;
				break;
			case 'AS':
				$value = 26238;
				break;
			case 'O':
				$value = 26186;
				break;
			case 'M':
				$value = 26185;
				break;
			case 'P':
				$value = 26239;
				break;
			case 'H':
				$value = 26181;
				break;
			case 'C':
				$value = 35943;
				break;								  	
			default:
				$value = -6;
				break;
		}

		return $value;

	}

	function getEbayCertificate($certificate) {

		switch(strtoupper($certificate)) {
			case 'AGS':
				$value = 35957;
			break;
			case 'EGL USA':
			case 'EGL U':
				$value = 35958;
			break;
			case 'GIA':
				$value = 35959;
				break;
			case 'IGI':
				$value = 35960;
				break;
			default:
				$value = -6;
				break;
		}

		return $value;

	}

	function getEbayColor($color) {

		switch(strtoupper($color)) {
			case 'D':
				$value = 26314;
			break;
			case 'E':
				$value = 26315;
			break;
			case 'F':
				$value = 26316;
				break;
			case 'G':
				$value = 26317;
				break;
			case 'H':
				$value = 26318;
				break;
			case 'I':
				$value = 26319;
				break;
			case 'J':
				$value = 26320;
				break;
			case 'K':
			case 'L':
			case 'M':
				$value = 94971;
				break;
			case 'N':
			case 'O':
			case 'P':
			case 'Q':
			case 'R':
				$value = 94972;
				break;
			case 'S':
			case 'T':
			case 'U':
			case 'V':
			case 'W':
				$value = 94973;
				break;
			case 'FANCY COLOR':
				$value = 26337;
				break;
			case '':
				$value = -10;
				break;
			default:
				$value = -6;
				break;
		}

		return $value;

	}
	function addDiamondtoEbay($detail, $duration){
		//print_r($detail);
		$destFolder = 'images/diamonds/shape/';
		switch ($detail['shape']){
			case 'B':
				$shape = 'Round';
				$destFile = $destFolder.'round.jpg';
				$storeCategoryId = $this->getRoundStoreCategoryID($detail['carat']);
			break;
			case 'PR':
				$shape = 'Princess';
				$destFile = $destFolder.'princessrings.jpg';
				$storeCategoryId = $this->getPrincessStoreCategoryID($detail['carat']);
			break;
			case 'R':
				$shape = 'Radiant';
				$destFile = $destFolder.'radiantring.jpg';
				$storeCategoryId = $this->getRadiantStoreCategoryID($detail['carat']);
				break;
			case 'E':
				$shape = 'Emerald';
				$destFile = $destFolder.'emeraldring.jpg';
				$storeCategoryId = $this->getEmeraldStoreCategoryID($detail['carat']);
				break;
			case 'AS':
				$shape = 'Asscher';
				$destFile = $destFolder.'asscherring.jpg';
				$storeCategoryId = $this->getAsscherStoreCategoryID($detail['carat']);
				break;
			case 'O':
				$shape = 'Oval';
				$destFile = $destFolder.'oval.jpg';
				$storeCategoryId = $this->getOvalStoreCategoryID($detail['carat']);
				break;
			case 'M':
				$shape = 'Marquise';
				$destFile = $destFolder.'marquisering.jpg';
				$storeCategoryId = $this->getMarquiseStoreCategoryID($detail['carat']);
				break;
			case 'P':
				$shape = 'Pear';
				$destFile = $destFolder.'pear_ring.jpg';
				$storeCategoryId = $this->getPearStoreCategoryID($detail['carat']);
				break;
			case 'H':
				$shape = 'Heart';
				$destFile = $destFolder.'heartring.jpg';
				$storeCategoryId = $this->getHeartStoreCategoryID($detail['carat']);
				break;
			case 'C':
				$shape = 'Cushion';
				$destFile = $destFolder.'cushionring.jpg';
				$storeCategoryId = $this->getCushionStoreCategoryID($detail['carat']);
				break;								  	
			default:
				$shape = $detail['shape'];
				break;
		 }		

		 switch ($detail['Polish']) {
			case 'VG':
				$polish  = 'Very Good';
			break;
			case 'GD':
				$polish  = 'Good';
			break;
			case 'EX':
				$polish  = 'Excellent';
			break;
			case 'ID':
				$polish  = 'Ideal';
			break;
			default:
				$polish = $detail['Polish'];
			break;
		 }
		 
		 switch($detail['Sym']) {
			case 'VG':
				$sym  = 'Very Good';
			break;
			case 'GD':
				$sym  = 'Good';
			break;
			case 'EX':
				$sym  = 'Excellent';
			break;
			case 'ID':
				$sym  = 'Ideal';
			break;
			case 'P':
				$sym  = 'Premium';
			break;
			default:
				$sym = $detail['Sym'];
			break;
		 }

		
		$watchImage = config_item('base_url').$destFile;
		$colorImage = config_item('base_url').'images/Color_Profile.jpg';
		$storeImage = config_item('base_url').'images/upperbar02.jpg';

		$requestArray['listingType'] = 'StoresFixedPrice';//'FixedPriceItem';
		$requestArray['primaryCategory'] = '152899';
        $requestArray['itemTitle']       = $detail['carat'].' Carats '.$shape.' DIAMOND SOLITAIRE WG '.$detail['color'].'-'.$detail['clarity'].' '.$detail['Cert'];
		//$requestArray['itemTitle']       = $detail['carat'].' Carats Diamond Solitaire Ring '.$detail['color'].' '.$detail['clarity'].' '.$detail['Cert'];
		$requestArray['productID']       = $detail['lot'];
		$price = round(($detail['price'] + 150.00) * 1.10);

		$watchDetail = '<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>New Page 12</title>
<META content=FrontPage.Editor.Document name=ProgId><!-- Begin Description --> <!-- Begin Description -->
<META content="Microsoft FrontPage 4.0" name=GENERATOR>
<META content=FrontPage.Editor.Document name=ProgId>
</head>

<body onload="init();ebHelpContextualRebrand(\'buy\');" rightmargin="0" topmargin="0" leftmargin="0" bottommargin="0" marginheight="0" marginwidth="0">

<br><!-- ST_SEAL_HTML_END -->

<TABLE width=598 align=center border=0>
<TBODY>
<TR>
<TD align=middle width=626>
<MARQUEE><FONT face=Verdana size=5><B>WELCOME TO ALAN G, YOUR SOURCE FOR
CERTIFIED GIA & EGL DIAMONDS </B></FONT></MARQUEE>
<P>
<MARQUEE><FONT face=Verdana size=3><B>                              (877)425-2645 / (213)623-1456</B></FONT></MARQUEE>
<MARQUEE><A href="mailto:alangjewelers@aol.com?subject=ebay auction">alangjewelers@aol.com</A></MARQUEE><BR></P> </TD></TR>
<TR>
<TD align=middle width=626><IMG height=99 src="http://www.alangjewelers.com/images/upperbar02.jpg" width=900 border=0></TD></TR>
<TR>
<TD vAlign=top width=626 height=2309>
<DIV align=center>
<TABLE height=2479 width="100%" border=0>
<TBODY>
<TR>
<TD vAlign=top align=right width="99%" height=1457>
<TABLE height=638 width=625 align=center border=0>
<TBODY>
<TR vAlign=top align=left>
<TD width=252 height=931>
 <TABLE height=1 cellSpacing=1 cellPadding=1 width=364 border=0>
<TBODY>
<TR>
<TD align=middle width=360 bgColor=black height=17><B><FONT face="Georgia, Times New Roman, Times, serif" color=#ffffff size=2>Information</FONT></B></TD></TR>
<TR>
<TD width=360 height=10> ITEM NUMBER:'.$detail['lot'].'</TD></TR>
<TR>
<TD width=360 bgColor=silver height=2> METAL:  14KT WHITE GOLD</TD></TR>
<TR>
<TD width=360 bgColor=aqua height=16> ITEM INFO: '.$detail['Cert'].' CERTIFIED               </TD></TR>
<TR>
<TD width=360 height=18> SHAPE OF DIAMOND: '.$shape.' BRILLIANT CUT</TD></TR>
<TR>
<TD width=360 bgColor=silver height=15> WEIGHT OF DIAMOND: '.$detail['carat'].'  CARAT</TD></TR>
<TR>
<TD width=360 height=21> MEASUREMENT: '.$detail['Meas'].' </TD></TR>

<TR>
<TD width=360 bgColor=silver height=19> CLARITY:   '.$detail['clarity'].' (NATURAL
CLARITY)</TD></TR>
<TR>
<TD width=360 height=18> COLOR:   '.$detail['color'].'  (NATURAL
COLOR)</TD></TR>
<TR>
<TD width=360 bgColor=silver height=15> DEPTH:    '.$detail['Depth'].'%</TD></TR>
<TR>
<TD width=360 height=21> TABLE:    '.$detail['TablePercent'].'%</TD></TR>
<TR>
<TD width=360 bgColor=silver height=18> POLISH: '.$polish.'</TD></TR>
<TR>
<TD width=360 height=21> SYMMETRY: '.$sym.'</TD></TR>
<TR>
<TD width=360 bgColor=silver height=15> FLUORESCENCE: '.$detail['Flour'].'</TD></TR>
<TR>
<TD width=360 height=21> CUT: '.$detail['cut'].'</TD></TR>
<TR>
<TD width=360 bgColor=silver height=18> STYLE OF RING: DIAMOND SOLITAIRE</TD></TR>
<TR>
<TD width=360 height=21> DIAMOND QUANTITY:  1 INDIVIDUAL</TD></TR>
<TR>
<TD width=360 bgColor=silver height=19> RING SIZE:   ****FREE
RING SIZING****</TD></TR>
<TR>
<TD width=360 bgColor=#ffffff height=18> WIDTH OF BAND:   2.5 MM</TD></TR>
<TR>
<TD width=360 bgColor=silver height=18> DIAMOND SETTING:   PRONG</TD></TR>
<TR>
<TD width=360 height=22> CONDITION:  100% BRAND NEW</TD></TR>
<TR bgColor=#c8c8d8>
<TD width=360 bgColor=silver height=24> ESTIMATED RETAIL VALUE : $'.round($price * 4.5).'</TD></TR>
<TR>
<TD width=360 bgColor=yellow height=18> Our Price: <FONT color=#ff0000>$'.$price.'</FONT>  &  No Reserve <FONT face=Arial size=2><A href="http://members.ebay.com/aboutme/alan-g-jewelers/" target=_blank><IMG height=8 src="http://pics.ebaystatic.com/aw/pics/aboutme-small.gif" width=23 border=0> </A></FONT></TD></TR></TBODY></TABLE>
<DIV style="WIDTH: 365px; HEIGHT: 830px" align=center>
<TABLE height=1 width=365 border=0>
<TBODY>
<TR>
<TD style="FONT-SIZE: 11px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif" vAlign=top width=359><FONT color=black> *************************************************</FONT><FONT face=Verdana size=2> </FONT></TD></TR>
<TR>
<TD vAlign=top width=359 height=289><FONT color=#0000ff>                          </FONT><P align=justify><FONT face=Verdana size=2>This auction is for a <FONT color=#008080><B><I>
BRAND NEW</I></B> </FONT>
SOLITAIRE  diamond ladies\' engagement ring.   </FONT></P>
<P align=justify><font face="Verdana" size="2">The copy of the original certificate will be
mailed with the diamond upon purchase. The original will be mailed after
buyer has left feedback.   </font></P>
<P align=justify><FONT face=Verdana size=2>The RING is made of <U><FONT color=#008080><B>14kt white gold</B>.</FONT></U> 
14kt Yellow Gold available with no additional charge.  Upgrade to Platinum
950 for additional $495.00.  All rings are shipped in size 6 if sizing is
not indicated in your PAYPAL payment.  Please indicate your ring size in PAYPAL
Payment.  </FONT></P>
<P align=justify><FONT face=Verdana size=2>The diamond has an excellent polish 
and symmetry and is simply incredible.  It is clear and bright with 
exceptional brilliance and fire.  The clarity is truly amazing, and it sparkles immensely.  </FONT></P>
<P align=justify><FONT face=Verdana size=2>Please email me with your questions or
comments before you bid on any item.  Look for our auctions on Ebay. We
offer a huge selection of certified <SPAN style="text-decoration: underline">GIA & EGL diamonds</SPAN>.  The highest bidder will win this beauty.  Bid with full confidence. </FONT></P>
<P align="justify"><FONT color=#ff0000>These diamonds are all guaranteed to be 100% natural, with no enhancements or treatments.  The gemstones are  guaranteed to be 100% natural, with no enhancements or treatments.  All items have been examined by a GIA gemologist.</FONT></P>
<P align="justify"align="justify"><font face="Verdana" size="2"><FONT color=black>Descriptions of quality are inherently subjective. The quality descriptions we provide, are to the best of our certified gemologists ability, and are her honest opinion. Disagreements with quality descriptions may occur. 
</FONT>Appraisal value is given at high retail value for insurance purposes only.  Appraisal value is subjective and may vary from one gemologist to another. 
<FONT face=Verdana color=black size=2>Opinions of appraisers may vary up to 25%. Diamond grading is subjective and may vary greatly. If the lowest color or clarity grades we specify are determined to be more than one grade lower than indicated. you may return the item for a full refund less shipping and insurance. 
Buyer is responsible for lost diamonds or gems after purchase.  GIA &
EGL diamonds are independently certified and graded based on the companies
standard of grading diamonds.  Alan G is not responsible for diamond
grading by EGL or GIA.</FONT></font></P></TD></TR></TBODY></TABLE></DIV></TD>
<TD width=365 height=931>
<TABLE height=554 cellSpacing=1 cellPadding=1 width=389 align=center border=0>
<TBODY>
<TR>
<TD width=414 height=212><IMG height=325 src="'.$watchImage.'" width=400></TD></TR>
<TR>
<TD width=414 height=55><FONT face=Verdana size=2>
<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
<FORM name=orderform action=http://www.ewebcart.com/cgi-bin/cart.pl?add_items=1 method=post>
<TBODY>
<TR>
<TD style="FONT-SIZE: 11px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif" vAlign=top width="100%"><FONT color=#0000ff>*********************************************************</FONT><FONT face=Verdana size=2> </FONT></TD></TR></FORM></TBODY></TABLE></FONT>
<TABLE height=557 width=394 align=center border=0>
<TBODY>
<TR>
<TD vAlign=center width=388 background=topbk.jpg bgColor=black height=20>
<P align=center><B><FONT face="Georgia, Times New Roman, Times, serif" color=white size=2>Your Free Gift</FONT></B></P></TD></TR>
<TR>
<TD vAlign=top width=388 height=529>
<UL>
<LI><FONT face=Verdana color=#0000ff size=2>Jewelry Box </FONT></LI>
<LI><FONT face=Verdana color=#0000ff size=2>Guaranteed to be 100% genuine diamond</FONT></LI>
<LI><FONT face=Verdana color=#0000ff size=2>Guaranteed to be 100% genuine 14kt GOLD</FONT></LI>
<LI><FONT face=Verdana color=#0000ff size=2>Free appraisal for the high estimated retail value of the item with every purchase. 
(Appraisal is for insurance purposes only.  Please do not make a buying
decision based on any one\'s appraisal price.)</FONT></LI>
<LI><FONT face=Verdana,Arial color=#0000ff size=2>Items will be shipped 3 - 5 days
after your payment is received.  (shipping cut off time is 1:00 PM pacific standard time)</FONT>
<P>Alan G. Jewelers has been dedicated to excellent customer satisfaction and lowest prices in the jewelry business for nearly
25 years. We are a direct diamond importer and all of our diamonds and gemstones are guaranteed to appraise for twice the amount of purchase price. Our merchandise is being offered on EBAY in order to provide the same exceptional quality and value to the general public. <FONT color=#ff0000>These diamonds are all guaranteed to be natural, with no enhancements or treatments.</FONT> Our goal is to reach the highest customer satisfaction rate possible. We welcome the opportunity to serve you.</P>
<P><FONT face=Verdana color=#ff0000 size=4>Please review our feedback for your Confidence. </FONT></P>
<P><font face="Verdana" size="4" color="#FF0000">WE GUARANTEE ALL OUR DIAMONDS
TO APPRAISE HIGHER THAN YOUR PURCHASE PRICE.</font></P>
<P> </P>
<P align=center><FONT face=Verdana>BID WITH CONFIDENCE!</FONT> </P>
<P dir=rtl align=center><FONT color=#800000>Alan G Jewelers Guarantees all our <BR>diamonds to be 100% natural</FONT></P>
<P> </P></LI></UL></TD></TR></TBODY></TABLE>
</TD></TR></TBODY></TABLE></TD>
<TR vAlign=top align=left>
<TD width=617 colSpan=2 height=243 >
<!-- End Description -->
<P style="margin-top:20px;"> <U><B><FONT face=Verdana size=3>About us</FONT></B></U> </P>
<P class=text><FONT face=Verdana size=2>We invite you to read our <A href="http://members.ebay.com/aboutme/alan-g-jewelers/" target=_blank><IMG height=8 src="http://pics.ebaystatic.com/aw/pics/aboutme-small.gif" width=23 border=0> </A></FONT>page to obtain information on:
<UL type=circle>
<LI>
<P class=text>Alan G Jewelers</P></LI>
<LI>
<P class=text>Store Policy</P></LI>
<LI>
<P class=text>Shipping </P></LI>
<LI>
<P class=text>Return Policy</P></LI></UL>
<P class=fontblack><U><B><FONT face=Verdana size=3>Payment Information </FONT></B></U></P>
<P align=justify><FONT face=Verdana size=2>We accept <font color="#FF0000"> ELECTRONIC BANK
WIRE TRANSFER, PAYPAL, VISA, MASTERCARD, DISCOVER, AND AMEX</font></FONT></P>
<P align=justify>  <IMG height=24 src="http://pics.ebaystatic.com/aw/pics/paypal/iconEcheck.gif" width=50 border=0></P>
<P class=fontblack><u><b><font face="Verdana" size="3">Feedback Information</font></b></u></P>
<p align="justify">Please read our return policy detailed in our store. 
Contact us if you are not happy with your purchase before leaving any negative
feedback.  We have been in business for over 25 years and will be glad to
resolve any issues.</p>
<p align="justify"> </TD>
<TR vAlign=top align=left>
<TD width=617 colSpan=2 height=369> <U><B><FONT face=Verdana size=3>Helpful Information </FONT></B></U>
<P class=text><FONT face=Verdana size=2>GIA stands for Gemological Institute of America and EGL stands for European Gemological Laboratory. GIA and EGL certification are prepared by a third independent party not affiliated to Alan G Jewelers for your protection. The certifications state the color and clarity of diamonds greater than .50cts. They are both well respected in the jewelry industry. If you need any more information regarding these laboratories, you may visit EGL at <A href="http://www.eglusa.com/customerlogin.html">www.eglusa.com</a>. </FONT>
<P ><U><B><FONT face=Verdana size=3>Satisfied Clients</FONT></B></U>
<P >Please read our feedback to obtain positive feedback from our clients.  If you have any questions, please do not hesitate to contact our office or email.<FONT face=Verdana size=2>
<P ><U><B><FONT face=Verdana size=3>Clarity </FONT></B></U></P>
<P align=justify>The following table explains the diamond clarity (inside the diamond):<BR>
<P>
<TABLE width="80%" border=1>
<TBODY>
<TR>
<TD align=middle><FONT face=Arial color=#586479 size=1>IF</FONT> </TD>
<TD align=middle><FONT face=Arial color=#586479 size=1>VVS1</FONT> </TD>
<TD align=middle><FONT face=Arial color=#586479 size=1>VVS2</FONT> </TD>
<TD align=middle><FONT face=Arial color=#586479 size=1>VS1</FONT> </TD>
<TD align=middle><FONT face=Arial color=#586479 size=1>VS2</FONT> </TD>
<TD align=middle><FONT face=Arial color=#586479 size=1>SI1</FONT> </TD>
<TD align=middle><FONT face=Arial color=#586479 size=1>SI2</FONT> </TD>
<TD align=middle><FONT face=Arial color=#586479 size=1>SI3</FONT> </TD>
<TD align=middle><FONT face=Arial color=#586479 size=1>I1</FONT> </TD>
<TD align=middle><FONT face=Arial color=#586479 size=1>I2</FONT> </TD>
<TD align=middle><FONT face=Arial color=#586479 size=1>I3</FONT> </TD></TR>
<TR>
<TD align=middle><FONT face=Arial color=#586479 size=1>FLAWLESS</FONT> </TD>
<TD align=middle colSpan=2><FONT face=Arial color=#586479 size=1>EXTREMELY DIFFICULT TO SEE INCLUSIONS UNDER 10x MAGNIFICATION</FONT> </TD>
<TD align=middle colSpan=2><FONT face=Arial color=#586479 size=1>DIFFICULT TO SEE INCLUSIONS UNDER 10x MAGNIFICATION</FONT> </TD>
<TD align=middle colSpan=3><FONT face=Arial color=#586479 size=1>INCLUSIONS VISIBLE UNDER 10X MAGNIFICATION </FONT></TD>
<TD align=middle colSpan=3><FONT face=Arial color=#586479 size=1>INCLUSIONS VISIBLE TO NAKED EYE</FONT> </TD></TR></TBODY></TABLE>
<P class=fontblack> </P>
</FONT>
<TR>
<TD class=basic10 colSpan=2 height=394><FONT face=Verdana size=2><U><B><FONT face=Verdana size=3>Color </FONT></B></U></FONT>
<p>While many diamonds appear colorless, or white, they may actually have subtle yellow or brown tones that can be detected when comparing diamonds side by side. Diamonds were formed under intense heat and pressure, and traces of other elements may have been incorporated into their atomic structure accounting for the variances in color. <BR><BR>Diamond color grades start at D and continue down through the alphabet. Colorless diamonds, graded D, are extremely rare and very valuable. The closer a diamond is to being colorless, the more valuable and rare it is. <BR><BR>The color of a diamond is graded with the diamond upside down before it is set in a mounting. The first three colors D, E, F are often called collection color. The subtle changes in collection color are so minute that it is difficult to identify them in the smaller sizes. Although the presence of color makes a diamond less rare and valuable, some diamonds come out of the ground in vivid "fancy" colors - well defin
 ed reds, blues, pinks, greens, and bright yellows. These are highly priced and extremely rare.<BR><BR>
</p>
<DIV align=center><IMG height=200 src="http://www.alangjewelers.com/images/Color/Color_Profile.jpg" width=600> </DIV></TD></TR><TR>
<TD align=middle width=626><img src="'.$detail['certimage'].'"></TD></TR></TBODY></TABLE>
<DIV></DIV></TD></TR></TBODY></TABLE><!-- End Description --></DIV></TD></TR>

<BR />
	
</body>';
		//echo $watchDetail;
		//die('pp');
		if(get_magic_quotes_gpc()) {
            // print "stripslashes!!! <br>\n";
            $requestArray['itemDescription'] = stripslashes($watchDetail);
        } else {
            $requestArray['itemDescription'] = $watchDetail;
        }

		$requestArray['ItemSpecification'] = $this->getItemSpecification($detail);
		$requestArray['AttributeArray'] = $this->get_attribute($detail);
		$listing_duration = 'Days_'.$duration;
		$requestArray['listingDuration'] = $listing_duration;
        $requestArray['startPrice']      = round($price);
        $requestArray['buyItNowPrice']   = round($price);
        //$requestArray['quantity']        = $detail['quantity'];
		$requestArray['quantity']        = '1';
		/*if ($requestArray['listingType'] == 'StoresFixedPrice') {
          $requestArray['buyItNowPrice'] = 0.0;   // don't have BuyItNow for SIF
          $requestArray['listingDuration'] = 'GTC';
        }
        
        if ($listingType == 'Dutch') {
          $requestArray['buyItNowPrice'] = 0.0;   // don't have BuyItNow for Dutch
        }*/
		
		$requestArray['storeCategoryID'] = $storeCategoryId;
		$requestArray['itemID'] = $detail['ebayid'];
		$requestArray['image'] = $watchImage;//config_item('base_url').'/images/tamal/diamond/top_'.$shape.'.jpg';
		//print_R($requestArray);

//die('tt');
		//if($action=='Add') {
		if($detail['ebayid']=='' || $detail['ebayid']=='0') {	
			$itemID = $this->sendRequestEbay($requestArray);
		} 
		return $itemID;
	}

	function sendRequestEbay($requestArray, $section='watches') {
	
		global $userToken, $devID, $appID, $certID, $serverUrl, $compatabilityLevel;
		include_once(config_item('base_path').'system/application/helpers/eBaySession.php');
		include_once(config_item('base_path').'system/application/helpers/keys.php');
		//SiteID must also be set in the Request's XML
		//SiteID = 0  (US) - UK = 3, Canada = 2, Australia = 15, ....
		//SiteID Indicates the eBay site to associate the call with
		$siteID = 0;
		//the call being made:
		$verb = 'AddItem';
		//echo 'devid'.$devID;
		///Build the request Xml string
		$requestXmlBody  = '<?xml version="1.0" encoding="utf-8" ?>';
		$requestXmlBody .= '<AddItemRequest xmlns="urn:ebay:apis:eBLBaseComponents">';
		$requestXmlBody .= "<RequesterCredentials><eBayAuthToken>$userToken</eBayAuthToken></RequesterCredentials>";
		$requestXmlBody .= '<DetailLevel>ReturnAll</DetailLevel>';
		$requestXmlBody .= '<ErrorLanguage>en_US</ErrorLanguage>';
		$requestXmlBody .= "<Version>$compatabilityLevel</Version>";
		$requestXmlBody .= '<Item>';
		$requestXmlBody .= '<Site>US</Site>';
		//$requestXmlBody .= '';
		$requestXmlBody .= '<PrimaryCategory>';
		$requestXmlBody .= "<CategoryID>".$requestArray['primaryCategory']."</CategoryID>";
		$requestXmlBody .= '</PrimaryCategory>';
		$requestXmlBody .= '<PrivateListing>true</PrivateListing>';
		//$min = ($requestArray['startPrice'] * .85);
		$min = round($requestArray['startPrice'] * .85);
		$requestXmlBody .= '<ListingDetails>
								<ConvertedBuyItNowPrice currencyID="USD">0.00</ConvertedBuyItNowPrice>
								<ConvertedStartPrice currencyID="USD">'.$requestArray['startPrice'].'</ConvertedStartPrice>
								<ConvertedReservePrice currencyID="USD">0.0</ConvertedReservePrice>
								<MinimumBestOfferPrice currencyID="USD">'.$min.'</MinimumBestOfferPrice>
							</ListingDetails>';
		/*$requestXmlBody .= '<AttributeSetArray> 
							  <AttributeSet attributeSetID="1952"> 
								<Attribute attributeID="10244"> 
								  <Value> 
									<ValueID>10425</ValueID> 
								  </Value> 
								</Attribute> 
							  </AttributeSet> 
							</AttributeSetArray>';*/
		$requestXmlBody .= $requestArray['ItemSpecification'];//$requestArray['AttributeArray'];
		$requestXmlBody .= "<BuyItNowPrice currencyID=\"USD\">0.00</BuyItNowPrice>";
		$requestXmlBody .= '<Country>US</Country>';
		$requestXmlBody .= '<Currency>USD</Currency>';
		$requestXmlBody .= "<ListingDuration>".$requestArray['listingDuration']."</ListingDuration>";
        $requestXmlBody .= "<ListingType>".$requestArray['listingType']."</ListingType>";
		$requestXmlBody .= '<Location><![CDATA[Los Angeles, CA, 90013]]></Location>';
		$requestXmlBody .= '<PaymentMethods>AmEx</PaymentMethods>';
		$requestXmlBody .= '<PaymentMethods>VisaMC</PaymentMethods>';
		$requestXmlBody .= '<PaymentMethods>Discover</PaymentMethods>';
		$requestXmlBody .= '<PaymentMethods>PayPal</PaymentMethods>';
		$requestXmlBody .= '<PayPalEmailAddress>alangjewelers@aol.com</PayPalEmailAddress>';
		$requestXmlBody .=  '<Storefront>  
								<StoreCategoryID>'.$requestArray['storeCategoryID'].'</StoreCategoryID>  
							</Storefront>';
		$requestXmlBody .= "<Quantity>".$requestArray['quantity']."</Quantity>";
		$requestXmlBody .= '<RegionID>0</RegionID>';
		$requestXmlBody .= "<StartPrice>".$requestArray['startPrice']."</StartPrice>";
		$requestXmlBody .= '<ShippingTermsInDescription>True</ShippingTermsInDescription>';
		$requestXmlBody .= "<Title>".substr($requestArray['itemTitle'],0,54)."</Title>";
		$requestXmlBody .= "<Description><![CDATA[".$requestArray['itemDescription']."]]></Description>";
		$requestXmlBody .= '<DispatchTimeMax>3</DispatchTimeMax>';
		$requestXmlBody .= '<BestOfferDetails>
								<BestOfferCount>1</BestOfferCount>
								<BestOfferEnabled>true</BestOfferEnabled>
							</BestOfferDetails>';
		/*$requestXmlBody .= '<ReturnPolicy>
								<ReturnsAcceptedOption>ReturnsAccepted</ReturnsAcceptedOption>
								<RefundOption>MoneyBack</RefundOption>
								<ReturnsWithinOption>Days_7</ReturnsWithinOption>
								<Description>Please visit our eBay store for a detailed return policy</Description>
								<ShippingCostPaidByOption>Buyer</ShippingCostPaidByOption>
							</ReturnPolicy>
							<ShippingDetails>
							  <ShippingServiceOptions>
								<ShippingService>Freight</ShippingService>
								<FreeShipping>false</FreeShipping>
							  </ShippingServiceOptions>
							  <ShippingType>FreightFlat</ShippingType>
							</ShippingDetails>
							<PictureDetails> 
								<PictureURL>'.$requestArray[image].'</PictureURL>
							 </PictureDetails>'; */
		$requestXmlBody .= '<ReturnPolicy>
								<ReturnsAcceptedOption>ReturnsAccepted</ReturnsAcceptedOption>
								<RefundOption>MoneyBack</RefundOption>
								<ReturnsWithinOption>Days_7</ReturnsWithinOption>
								<Description>PLEASE VISIT OUR EBAY STORE FOR A DETAILED RETURN POLICY.</Description> 
								  <ShippingCostPaidByOption>Buyer</ShippingCostPaidByOption> 
								  <ShippingCostPaidBy>Buyer</ShippingCostPaidBy> 
							</ReturnPolicy>
							<ShippingDetails>
								<ApplyShippingDiscount>false</ApplyShippingDiscount> 
								<CalculatedShippingRate>
									  <OriginatingPostalCode>90013</OriginatingPostalCode> 
									  <PackageDepth unit="in" measurementSystem="English">3</PackageDepth> 
									  <PackageLength unit="in" measurementSystem="English">12</PackageLength> 
									  <PackageWidth unit="in" measurementSystem="English">10</PackageWidth> 
									  <PackagingHandlingCosts currencyID="USD">5.99</PackagingHandlingCosts> 
									  <ShippingIrregular>false</ShippingIrregular> 
									  <ShippingPackage>PackageThickEnvelope</ShippingPackage> 
									  <WeightMajor unit="lbs" measurementSystem="English">1</WeightMajor> 
									  <WeightMinor unit="oz" measurementSystem="English">2</WeightMinor> 
									  <InternationalPackagingHandlingCosts currencyID="USD">9.99</InternationalPackagingHandlingCosts> 
								</CalculatedShippingRate>
								<SalesTax>
									<SalesTaxPercent>0.0</SalesTaxPercent>
									<ShippingIncludedInTax>false</ShippingIncludedInTax>
								</SalesTax>
								 <ShippingServiceOptions>
									<ShippingService>UPSGround</ShippingService>
									<ShippingServicePriority>1</ShippingServicePriority>
									<FreeShipping>true</FreeShipping>
									<ExpeditedService>false</ExpeditedService>
									<ShippingTimeMin>1</ShippingTimeMin>
									<ShippingTimeMax>6</ShippingTimeMax>
									<FreeShipping>true</FreeShipping>
								</ShippingServiceOptions>
								<ShippingServiceOptions>
									<ShippingService>UPS3rdDay</ShippingService>
									<ShippingServicePriority>2</ShippingServicePriority>
									<ExpeditedService>false</ExpeditedService>
									<ShippingTimeMin>1</ShippingTimeMin>
									<ShippingTimeMax>3</ShippingTimeMax>
								</ShippingServiceOptions>
								<ShippingServiceOptions>
									<ShippingService>UPS2ndDay</ShippingService>
									<ShippingServicePriority>3</ShippingServicePriority>
									<ExpeditedService>false</ExpeditedService>
									<ShippingTimeMin>1</ShippingTimeMin>
									<ShippingTimeMax>2</ShippingTimeMax>
								</ShippingServiceOptions>
								<InternationalShippingServiceOption>
									<ShippingService>UPSStandardToCanada</ShippingService>
									<ShippingServicePriority>1</ShippingServicePriority>
									<ShipToLocation>CA</ShipToLocation>
								</InternationalShippingServiceOption>
								<InternationalShippingServiceOption>
									<ShippingService>UPSWorldWideExpedited</ShippingService>
									<ShippingServicePriority>2</ShippingServicePriority>
									<ShipToLocation>Europe</ShipToLocation>
									<ShipToLocation>Asia</ShipToLocation>
									<ShipToLocation>CA</ShipToLocation>
									<ShipToLocation>GB</ShipToLocation>
									<ShipToLocation>AU</ShipToLocation>
									<ShipToLocation>DE</ShipToLocation>
									<ShipToLocation>JP</ShipToLocation>
								</InternationalShippingServiceOption>
								<InternationalShippingServiceOption>
									<ShippingService>UPSWorldwideSaver</ShippingService>
									<ShippingServicePriority>3</ShippingServicePriority>
									<ShipToLocation>Europe</ShipToLocation>
									<ShipToLocation>Asia</ShipToLocation>
									<ShipToLocation>CA</ShipToLocation>
									<ShipToLocation>GB</ShipToLocation>
									<ShipToLocation>AU</ShipToLocation>
									<ShipToLocation>DE</ShipToLocation>
									<ShipToLocation>JP</ShipToLocation>
								</InternationalShippingServiceOption>
								<ShippingType>Calculated</ShippingType>
								<ThirdPartyCheckout>false</ThirdPartyCheckout>
								<TaxTable>
									<TaxJurisdiction>
										<JurisdictionID>CA</JurisdictionID>
										<SalesTaxPercent>9.75</SalesTaxPercent>
										<ShippingIncludedInTax>true</ShippingIncludedInTax>
									</TaxJurisdiction>
								</TaxTable>
						</ShippingDetails>
							<PictureDetails>
								<GalleryType>Gallery</GalleryType>
								<GalleryURL>'.$requestArray[image].'</GalleryURL> 
								<PhotoDisplay>None</PhotoDisplay> 
								<PictureURL>'.$requestArray[image].'</PictureURL>
								<PictureSource>Vendor</PictureSource>
							 </PictureDetails>'; 
		$requestXmlBody .= '</Item>';
		$requestXmlBody .= '</AddItemRequest>';
		
		//ECHO $requestXmlBody;

		//echo $requestXmlBody ;
		//die('tt');
        //Create a new eBay session with all details pulled in from included keys.php
         //exit;
        $session = new eBaySession($userToken, $devID, $appID, $certID, $serverUrl, $compatabilityLevel, $siteID, $verb);
		
		//send the request and get response
		$responseXml = $session->sendHttpRequest($requestXmlBody);
		if(stristr($responseXml, 'HTTP 404') || $responseXml == '')
			die('<P>Error sending request');
		
		//Xml string is parsed and creates a DOM Document object
		$responseDoc = new DomDocument();
		$responseDoc->loadXML($responseXml);
		//echo '<pre>';
		////print_r($responseXml);	
		//die('pp');
		//get any error nodes

		$responses = $responseDoc->getElementsByTagName("AddItemResponse");
        foreach ($responses as $response) {
           $acks = $response->getElementsByTagName("Ack");
           $ack   = $acks->item(0)->nodeValue;
          //echo "Ack = $ack <BR />\n";   // Success if successful
		}
		
		$errors = $responseDoc->getElementsByTagName('Errors');
		
		//if there are error nodes
		//if($errors->length > 0)
		if($ack == 'Failure')
		{	//echo '<br>'.die('xyz');
			foreach($errors AS $error) { 
				$SeverityCode     = $error->getElementsByTagName('SeverityCode');
				//echo '<br>'.$SeverityCode->item(0)->nodeValue;
				if($SeverityCode->item(0)->nodeValue=='Error') {
					$status = '<P><B>eBay returned the following error(s):</B>';
					//display each error
					//Get error code, ShortMesaage and LongMessage
					$code     = $error->getElementsByTagName('ErrorCode');
					$shortMsg = $error->getElementsByTagName('ShortMessage');
					$longMsg  = $error->getElementsByTagName('LongMessage');

					//Display code and shortmessage
					$status .= '<P>'. $code->item(0)->nodeValue. ' : '. str_replace(">", "&gt;", str_replace("<", "&lt;", $shortMsg->item(0)->nodeValue));
					//if there is a long message (ie ErrorLevel=1), display it
					if(count($longMsg) > 0)
						$status .= '<BR>'.str_replace(">", "&gt;", str_replace("<", "&lt;", $longMsg->item(0)->nodeValue));
						
					

				}
			}
				echo $status;
                                $errlog = date("Y-m-d h:i:s").'  CategoryID:'.$requestArray['primaryCategory'].'-'.substr($requestArray['itemTitle'],0,54).''. $code->item(0)->nodeValue. ' : '. str_replace(">", "&gt;", str_replace("<", "&lt;", $shortMsg->item(0)->nodeValue)).' '.str_replace("<", "&lt;", $longMsg->item(0)->nodeValue)."\n";
                                file_put_contents(config_item('base_path')."system/application/errors/ebayerrors.log", $errlog, FILE_APPEND);
//                                $fp = fopen(config_item('base_path')."system/application/errors/ebayerrors.log", "w");
//                                $putdata = fopen($status, "r");
//
//                                while ($data = fread($putdata, 1024))
//                                  fwrite($fp, $data);
//
//                                fclose($fp);
//                                fclose($putdata);
		} else { //no errors
            
			//get results nodes
            $responses = $responseDoc->getElementsByTagName("AddItemResponse");
            foreach ($responses as $response) {
              $acks = $response->getElementsByTagName("Ack");
              $ack   = $acks->item(0)->nodeValue;
              //echo "Ack = $ack <BR />\n";   // Success if successful
              
              $endTimes  = $response->getElementsByTagName("EndTime");
              $endTime   = $endTimes->item(0)->nodeValue;
              //echo "endTime = $endTime <BR />\n";
              
              $itemIDs  = $response->getElementsByTagName("ItemID");
              $itemID   = $itemIDs->item(0)->nodeValue;
              // echo "itemID = $itemID <BR />\n";
              
              $linkBase = "http://cgi.ebay.com/ws/eBayISAPI.dll?ViewItem&item=";
              $status = "<a href=$linkBase" . $itemID . ">".$requestArray['itemTitle']."</a> <BR />";
			
			  $this->db->where('lot' , $requestArray['productID']);
			 		$isinsert = $this->db->update($this->config->item('table_perfix').'rapproduct',
			 		array(			  
			  				'ebayid'	=> $itemID,
			  				
						 ));
            
              $feeNodes = $responseDoc->getElementsByTagName('Fee');
              foreach($feeNodes as $feeNode) {
                $feeNames = $feeNode->getElementsByTagName("Name");
                if ($feeNames->item(0)) {
                    $feeName = $feeNames->item(0)->nodeValue;
                    $fees = $feeNode->getElementsByTagName('Fee');  // get Fee amount nested in Fee
                    $fee = $fees->item(0)->nodeValue;
                    if ($fee > 0.0) {
                        if ($feeName == 'ListingFee') {
                          $status .= "<B>$feeName :".number_format($fee, 2, '.', '')." </B><BR>\n"; 
                        } else {
                          $status .= "$feeName :".number_format($fee, 2, '.', '')." </B><BR>\n";
                        }      
                    }  // if $fee > 0
                } // if feeName
              } // foreach $feeNode
            
            } // foreach response
                $successlog = date("Y-m-d h:i:s").'  itemid:'.$itemID.'-'.substr($requestArray['itemTitle'],0,54)."\n";
                file_put_contents(config_item('base_path')."system/application/errors/ebaysuccess.log", $successlog, FILE_APPEND);
		} // if $errors->length > 0
		echo $status;
                
            exit;
	}

	function getAllDiamonds(){
		/* $qry = "SELECT *
				FROM ".config_item('table_perfix')."rapproduct WHERE price !='0.0' AND clarity IN('SI3') AND ebayid IS NULL  ORDER BY RAND() LIMIT 0,1
				";*/
		$qry = "SELECT *
				FROM ".config_item('table_perfix')."rapproduct WHERE price !='0.0' AND ebayid IS NULL  ORDER BY RAND() LIMIT 0,5000
				";
		$return = 	$this->db->query($qry);
		$result = $return->result_array();	
		return isset($result) ? $result : false;
	}

	function getDiamonds(){
		/* $qry = "SELECT *
				FROM ".config_item('table_perfix')."rapproduct WHERE price !='0.0' AND clarity IN('SI3') AND ebayid IS NULL  ORDER BY RAND() LIMIT 0,1
				";*/
		$qry = "SELECT *
				FROM ".config_item('table_perfix')."rapproduct WHERE price !='0.0' AND ebayid IS NULL  ORDER BY RAND() LIMIT 0,1
				";
		$return = 	$this->db->query($qry);
		$result = $return->result_array();	
		return isset($result) ? $result : false;
	}
	
	
	
	function random($length = 8)
{     
    $chars = '983452458935876451386217';
   
    for ($p = 0; $p < $length; $p++)
    {
        $result .= ($p%2) ? $chars[mt_rand(19, 23)] : $chars[mt_rand(0, 18)];
    }
   
    return $result;
}
	/**** new function for Rapnet *******/
	function SaveEngagementRingsInDB($cols)
	{
	
     $email_content = '';
	 if(is_array($cols))
	  {
		$carat  		= isset($cols[4]) ? $cols[4] : '0';
	  	$Cert  			= isset($cols[12]) ? $cols[12] : '';
	  	$Cert_n  		= isset($cols[13]) ? $cols[13] : '';
		$clarity  		= isset($cols[6]) ? $cols[6] : '';
	  	$color  		= isset($cols[5]) ? $cols[5] : '';
	  	$Comment  		= isset($cols[23]) ? $cols[23] : '';
	  	$Country   		= isset($cols[26]) ? $cols[26] : '';
		$City    		= isset($cols[24]) ? $cols[24] : '';
		$Girdle  		= isset($cols[19]) ? $cols[19] : '';
	  	$Culet  		= isset($cols[20]) ? $cols[20] : '';
	  	$cut            =  isset($cols[7]) ? $cols[7] : 0;
		$Depth  		= isset($cols[17]) ? $cols[17] : '0';
	  	$Flour  		= isset($cols[10]) ? $cols[10] : '';
	  	$lot 			= isset($cols[29]) ? $cols[29] : 0;
	  	$Meas  			= isset($cols[11]) ? str_replace('-','x',$cols[11]) : '0';
	  	$Polish  		= isset($cols[8]) ? $cols[8] : '';
	  	$price  		= isset($cols[15]) ? $cols[15] : '0';
	  	$Rap  	    	= isset($cols[17]) ? $cols[17] : '0';
	  	$Make    		= isset($cols[18]) ? $cols[18] : '';
	  	$ratio    		= isset($cols[19]) ? $cols[19] : '';
	  	$owner  		= isset($cols[1]) ? $cols[1] : 'NA';
	  	$shape  		= isset($cols[3]) ? $cols[3] : '';
		//$shape  		= isset($cols[21]) ? strtoupper($cols[21]) : '';
                $State   		= isset($cols[25]) ? $cols[25] : '';
	  	$Stock_n    	= isset($cols[14]) ? $cols[14] : '';
	  	$Sym  			= isset($cols[9]) ? $cols[9] : '';
	  	$TablePercent  	= isset($cols[18]) ? $cols[18] : 'NA';
	  	$Stones  		= isset($cols[27]) ? $cols[27] : '';
	  	$CertImage   	= isset($cols[28]) ? $cols[28] : '';
	  	$Date    		= isset($cols[30]) ? $cols[30]  : '';
		
                $Date = date("Y-m-d H:i:s",strtotime($Date));
                $MeasArray		= explode('x', $Meas);
                $Stock_n = $Stock_n.($this->random(2));                
                if(strcmp($cut,'')===0)
		$cut='';		
                $shapeCode = strtoupper($cols[21]);
	  	$Cert = strtoupper($Cert);
	  	$ratio = ( isset($ratio) && $ratio != null) ? $ratio : ' ';	  
		$os = array('D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
       //     if (in_array($color , $os)) {
                  //if (in_array($owner , $ownerArr)) {
                    $qry = "SELECT lot FROM ".config_item('table_perfix')."rapproduct where lot = '".$lot."'";
                    $result = 	$this->db->query($qry);
                    $ret_lot = $result->result_array();
		    $cerstr = substr($Cert,0,5);
              /*      if(($cerstr == 'GIA' || $cerstr == 'EGL I' || $cerstr == 'EGL U') && !empty($Cert_n) &&  ($price > 0 ) ){      */                  
                       $email_content .= "<tr><td>".$lot."</td>
                       						  <td>".$owner."</td>
                       						  <td>".$shape."</td>
                       						  <td>".$price."<td>
                       						  <td>".$Cert."</td>
 					 </tr>";
			if(empty($ret_lot[0]['lot'])){
                       $isinsert = $this->db->insert($this->config->item('table_perfix').'rapproduct',
                                           array('lot'    =>  $lot,
					       'owner' =>  $owner,
					       'shape' =>  $shape,
					       'carat' => $carat,
					       'color' => $color,
					       'clarity' => $clarity,
					       'cut'   => $cut,
					       'price' => $price,
					       'Rap'   => $Rap,
					       'Cert'  => $Cert,
					       'Depth' => $Depth,
					       'TablePercent' 	=> $TablePercent,
					       'Girdle'	=> $Girdle,
					       'Culet' 	=> $Culet,
					       'Polish' => $Polish,
					       'Sym' 	=> $Sym,
					       'Flour' 	=> $Flour,
					       'Meas' 	=> $Meas,
					       'Comment'  => $Comment,
					       'Stones'   => $Stones,
					       'Cert_n'   => $Cert_n,
					       'Stock_n'  => $Stock_n,
					       'Make' 	=> $Make,
					       'Date' 	=> $Date,
					       'City' 	=> $City,
					       'State' 	=> $State,
					       'Country' => $Country,
					       'ratio'  => $ratio,
					       'tbl'	=> config_item('base_url').'diamonds/search/true/true/false/false/false/'.$lot,
                    	   'certimage' => $CertImage,
					       'length' => $MeasArray[0],
					       'width' => $MeasArray[1],
					       'height' => $MeasArray[2]
						   
					));
                        } else {
                            $this->db->where('lot' , $lot);
                          $isinsert = $this->db->update($this->config->item('table_perfix').'rapproduct',
                                          array(
					       'owner' =>  $owner,
					       'shape' =>  $shape,
					       'carat' => $carat,
					       'color' => $color,
					       'clarity' => $clarity,
					       'cut'   => $cut,
					       'price' => $price,
					       'Rap'   => $Rap,
					       'Cert'  => $Cert,
					       'Depth' => $Depth,
					       'TablePercent' 	=> $TablePercent,
					       'Girdle'	=> $Girdle,
					       'Culet' 	=> $Culet,
					       'Polish' => $Polish,
					       'Sym' 	=> $Sym,
					       'Flour' 	=> $Flour,
					       'Meas' 	=> $Meas,
					       'Comment'  => $Comment,
					       'Stones'   => $Stones,
					       'Cert_n'   => $Cert_n,
					       'Stock_n'  => $Stock_n,
					       'Make' 	=> $Make,
					       'Date' 	=> $Date,
					       'City' 	=> $City,
					       'State' 	=> $State,
					       'Country' => $Country,
					       'ratio'  => $ratio,
					       'tbl'	=> config_item('base_url').'diamonds/search/true/true/false/false/false/'.$lot,
                    	   'certimage' => $CertImage,
					       'length' => $MeasArray[0],
					       'width' => $MeasArray[1],
					       'height' => $MeasArray[2]
					));
                            
                        }   
				
				if(!$isinsert)
				{
					return -1 ;
				}
				else
				    return $email_content;
				// }
			// }
          }
	}
	
	/* custom */
	function SaveEngagementRingsInDBCustom($cols, $row) {
    
     $action='';	
     $email_content = '';

	 if(is_array($cols)) {	  		 		
		$lot 		= isset($cols[72]) ? $cols[72] : '0'; // new!!!		

		$owner 		= isset($cols[0]) ? $cols[0] : '';
		$Rap 		= isset($cols[1]) ? $cols[1] : '0';
		$shape 		= isset($cols[3]) ? $cols[3] : '';
		$carat 		= isset($cols[4]) ? $cols[4] : '0';
		$color	 	= isset($cols[5]) ? $cols[5] : '';
		$clarity 	= isset($cols[6]) ? $cols[6] : '';
		$fancy_color = isset($cols[7]) ? $cols[7] : '';		
		$fancy_color_ot = isset($cols[9]) ? $cols[9] : '';
		$cut 		= isset($cols[10]) ? $cols[10] : '0';					
		$Polish 	= isset($cols[11]) ? $cols[11] : '';
		$Sym 		= isset($cols[12]) ? $cols[12] : '';
		$Meas 		= isset($cols[15]) ? $cols[15] : '0';
		$length 	= isset($cols[16]) ? $cols[16] : '';
		$width 		= isset($cols[17]) ? $cols[17] : '';	
		$ratio 		= isset($cols[19]) ? $cols[19] : '';	
		$Cert 		= isset($cols[20]) ? $cols[20] : '0';		
		$Cert_n 	= isset($cols[21]) ? $cols[21] : '';
		$Stock_n 	= isset($cols[22]) ? $cols[22] : '';
                
		$cash_pricepercarat = isset($cols[26]) ? $cols[26] : '0';
		$cash_price 	    = isset($cols[28]) ? $cols[28] : '0';

		$pricepercrt_value = isset($cols[23]) ? $cols[23] : '0';
		$price_value       = isset($cols[25]) ? $cols[25] : '0';
                
                $pricepercrt = ( $pricepercrt_value > 0 ? $pricepercrt_value : $cash_pricepercarat );
                $diamond_price = ( $price_value > 0 ? $price_value : $cash_price );
                
                if( $Rap == 24542 ) {  //// check if owner is unitede diamonds then add 10% in price
                    $price = $diamond_price + $diamond_price * 0.10;
                } else {
                    $price = $diamond_price;
                }
                

	$sqlPrices = "SELECT pricefrom, priceto, rate FROM dev_helix_prices";
        $resultPrices = $this->db->query($sqlPrices)->result_array();
    if( $Rap != 24542 ) {
        foreach ($resultPrices as $resultPrice) {
        	if($price >= $resultPrice['pricefrom'] && $price <= $resultPrice['priceto']) {
        		$price *= $resultPrice['rate'];
        		break;
        	}        	
        }
    }

		$Depth 	    = isset($cols[30]) ? $cols[30] : '0';
		$tbl 		= isset($cols[31]) ? $cols[31] : '';
		$Girdle 	= isset($cols[32]) ? $cols[32] : '';
		$Culet 		= isset($cols[35]) ? $cols[35] : '';		
		$City 		= isset($cols[42]) ? $cols[42] : '';
		$State 		= isset($cols[43]) ? $cols[43] : '';
		$Country 	= isset($cols[44]) ? $cols[44] : '';
		$Stones 	= isset($cols[48]) ? $cols[48] : '';
		$Date 		= isset($cols[52]) ? $cols[52] : '';

		$name_code  = isset($cols[2]) ? $cols[2] : '0'; /// new!!!
		$fcolor_intens  = isset($cols[8]) ? $cols[8] : ''; /// new!!!  / fancy_color_intens
		$Flour_color = isset($cols[13]) ? $cols[13] : ''; /// new!!!
        $Flour 		= isset($cols[14]) ? $cols[14] : ''; /// new!!! 
        $height 	= isset($cols[18]) ? $cols[18] : ''; /// new!!! 
		$lab 		= isset($cols[20]) ? $cols[20] : ''; /// new!!!  

		$availability   = isset($cols[29]) ? $cols[29] : '0'; /// new!!!!!!!!!!!!!!!  / diamond_availability ??
		$Culet_size 	 = isset($cols[36]) ? $cols[36] : '';  /// new!!!
        $Culet_condition = isset($cols[37]) ? $cols[37] : ''; /// new!!!
        $crown 		= isset($cols[38]) ? $cols[38] : ''; /// new!!!
        $pavilion 	= isset($cols[39]) ? $cols[39] : ''; /// new!!!
        $Comment 	= isset($cols[40]) ? $cols[40] : ''; /// new!!!
        $member_coments	= isset($cols[41]) ? $cols[41] : ''; /// new!!!
        $isMatched 	= isset($cols[45]) ? $cols[45] : ''; /// new!!!
        $isMatched_separ = isset($cols[46]) ? $cols[46] : ''; /// new!!!
        $certimage  = isset($cols[49]) ? $cols[49] : ''; /// new!!!
        $Make 		= isset($cols[50]) ? $cols[50] : ''; /// new!!!       
        $imageurl   = isset($cols[50]) ? $cols[50] : ''; /// new!!!
        $rapSpec        = isset($cols[51]) ? $cols[51] : ''; /// new!!!!!!!!!!!!!!!!  / rapsepec ??

		$pavilion_depth = isset($cols[63]) ? $cols[63] : ''; /// new!!!
        $paviil_angle   = isset($cols[64]) ? $cols[64] : ''; /// new!!!
        $TablePercent = isset($cols[65]) ? $cols[65] : 'NA'; /// new!!!          
        $suplier_country  = isset($cols[66]) ? $cols[66] : ''; /// new!!!
        $depth_percent    = isset($cols[67]) ? $cols[67] : ''; /// new!!!
        $crown_angle = isset($cols[68]) ? $cols[68] : ''; /// new!!!
        $girdle_condition   = isset($cols[71]) ? $cols[71] : ''; /// new!!!
		
		///////////////////////////////////////////////////////		
			
		//$TablePercent = isset($cols[32]) ? $cols[32] : 'NA';											
						
		$Date = date("Y-m-d H:i:s", strtotime($Date));
		$MeasArray = explode('x', $Meas);
		$Stock_n = $Stock_n; //.($this->random(2));  /// new!!! - commented
		         
        if(strcmp($cut, '') === 0) {
        	$cut = '';			
        }
		
        $shapeCode = strtoupper($cols[3]);
	  	$Cert = strtoupper($Cert);
		
	  	$ratio = (isset($ratio) && $ratio != null) ? $ratio : ' ';	  
		$os = array('D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');

        // $cerstr = substr($Cert,0,5);
        // if(($cerstr == 'GIA' || $cerstr == 'EGL I' || $cerstr == 'EGL U') && !empty($Cert_n) &&  ($price > 0 ) ){
        $email_content .= "<tr><td>".$lot."</td>
       						  <td>".$owner."</td>
       						  <td>".$shape."</td>
       						  <td>".$price."<td>
       						  <td>".$Cert."</td>
		 					</tr>";		

        $isinsert = $this->db->insert($this->config->item('table_perfix').'rapproduct_temp',
                     array('lot'    =>  $lot,
					       'owner' =>  $owner,
					       'shape' =>  $shape,
					       'carat' => $carat,
					       'color' => $color,
						   'fancy_color' => $fancy_color,
						   'fancy_color_ot' => $fancy_color_ot,
						   'clarity' => $clarity,
						   'price' => $price,
						   'Rap' => $Rap,
						   'Cert' => $Cert,
						   'Depth' => $Depth,
						   'TablePercent' => $TablePercent,
						   'Girdle' => $Girdle,
						   'Culet' => $Culet,
						   'Polish' => $Polish,
						   'Sym' => $Sym,
						   'Flour' => $Flour,
						   'Meas' => $Meas,
						   'Comment' => $Comment,
						   'Stones' => $Stones,
						   'Cert_n' => $Cert_n,
						   'Stock_n' => $Stock_n,
						   'Make' => $Make,
						   'Date' => $Date,
						   'City' => $City,
						   'State' => $State,
						   'Country' => $Country,
						   'ratio' => $ratio,
						   'cut' => $cut,
						   'tbl' =>  $tbl,
						   'pricepercrt' => $pricepercrt,
						   'certimage' => $certimage,
						   'length' => $length,
						   'width' => $width,						   
						   'height' => $height,
						   ///////////////////////   new ones!!!
						   'name_code' => $name_code,
						   'fancy_color_intens' => $fcolor_intens,
						   'floursence_color' => $Flour_color,
						   'lab' => $lab,
						   'diamond_availability' => $availability,
						   'culet_size' => $Culet_size,
						   'culet_condition' => $Culet_condition,
						   'crown' => $crown,
						   'pavilion' => $pavilion,
						   'member_comments' => $member_coments,
						   'is_matched' => $isMatched,
						   'ismatched_separable' => $isMatched_separ,						   
						   'image_url' => $imageurl,
						   'rapsepec' => $rapSpec,
						   'pavilion_depth' => $pavilion_depth,
						   'pavilion_angle' => $paviil_angle,
						   'suplier_country' => $suplier_country,
						   'depth_percent' => $depth_percent,
						   'crown_angle' => $crown_angle,
						   'price_incsv' => $diamond_price,
						   'girdle_condition' => $girdle_condition						   
						));

						$action= "insert";                        

				return $action;
          }
	}


	function SaveEngagementRingsInDBCustomOld($cols, $row)
    {
        $action='';
	//print_ar($cols);
     $email_content = '';
	 if(is_array($cols)) {	  		 
		//$lot 		= isset($cols[22]) ? $cols[22] : '0';
		$lot 		= isset($cols[79]) ? $cols[79] : '0'; // new!!!
		//$ebayid 	= isset($cols[]) ? $cols[] : '';  // -2 by default (DDL)

		$owner 		= isset($cols[0]) ? $cols[0] : '';
		$Rap 		= isset($cols[1]) ? $cols[1] : '0';
		$shape 		= isset($cols[3]) ? $cols[3] : '';
		$carat 		= isset($cols[4]) ? $cols[4] : '0';
		$color	 	= isset($cols[5]) ? $cols[5] : '';
		$clarity 	= isset($cols[6]) ? $cols[6] : '';
		$fancy_color = isset($cols[7]) ? $cols[7] : '';		
		$fancy_color_ot = isset($cols[9]) ? $cols[9] : '';
		$cut 		= isset($cols[10]) ? $cols[10] : '0';					
		$Polish 	= isset($cols[11]) ? $cols[11] : '';
		$Sym 		= isset($cols[12]) ? $cols[12] : '';
		$Meas 		= isset($cols[15]) ? $cols[15] : '0';
		$length 	= isset($cols[16]) ? $cols[16] : '';
		$width 		= isset($cols[17]) ? $cols[17] : '';	
		$ratio 		= isset($cols[19]) ? $cols[19] : '';	
		$Cert 		= isset($cols[20]) ? $cols[20] : '0';		
		$Cert_n 	= isset($cols[21]) ? $cols[21] : '';
		$Stock_n 	= isset($cols[22]) ? $cols[22] : '';

		$pricepercrt = isset($cols[24]) ? $cols[24] : '0';
		$price 		= isset($cols[26]) ? $cols[26] : '0';
		$Depth 	    = isset($cols[31]) ? $cols[31] : '0';
		$tbl 		= isset($cols[32]) ? $cols[32] : '';
		$Girdle 	= isset($cols[33]) ? $cols[33] : '';
		$Culet 		= isset($cols[36]) ? $cols[36] : '';		
		$City 		= isset($cols[43]) ? $cols[43] : '';
		$State 		= isset($cols[44]) ? $cols[44] : '';
		$Country 	= isset($cols[45]) ? $cols[45] : '';
		$Stones 	= isset($cols[49]) ? $cols[49] : '';
		$Date 		= isset($cols[53]) ? $cols[53] : '';

		$name_code  = isset($cols[2]) ? $cols[2] : '0'; /// new!!!
		$fcolor_intens  = isset($cols[8]) ? $cols[8] : ''; /// new!!!  / fancy_color_intens
		$Flour_color = isset($cols[13]) ? $cols[13] : ''; /// new!!!
        $Flour 		= isset($cols[14]) ? $cols[14] : ''; /// new!!! 
        $height 	= isset($cols[18]) ? $cols[18] : ''; /// new!!! 
		$lab 		= isset($cols[20]) ? $cols[20] : ''; /// new!!!  
		$availability   = isset($cols[30]) ? $cols[30] : '0'; /// new!!!!!!!!!!!!!!!  / diamond_availability ??
		$Culet_size 	 = isset($cols[37]) ? $cols[37] : '';  /// new!!!
        $Culet_condition = isset($cols[38]) ? $cols[38] : ''; /// new!!!
        $crown 		= isset($cols[39]) ? $cols[39] : ''; /// new!!!
        $pavilion 	= isset($cols[40]) ? $cols[40] : ''; /// new!!!
        $Comment 	= isset($cols[41]) ? $cols[41] : ''; /// new!!!
        $member_coments	= isset($cols[42]) ? $cols[42] : ''; /// new!!!
        $isMatched 	= isset($cols[46]) ? $cols[46] : ''; /// new!!!
        $isMatched_separ = isset($cols[47]) ? $cols[47] : ''; /// new!!!
        $certimage  = isset($cols[50]) ? $cols[50] : ''; /// new!!!
        $Make 		= isset($cols[51]) ? $cols[51] : ''; /// new!!!       
        $imageurl   = isset($cols[51]) ? $cols[51] : ''; /// new!!!
        $rapSpec        = isset($cols[52]) ? $cols[52] : ''; /// new!!!!!!!!!!!!!!!!  / rapsepec ??

		$pavilion_depth = isset($cols[70]) ? $cols[70] : ''; /// new!!!
        $paviil_angle   = isset($cols[71]) ? $cols[71] : ''; /// new!!!
        $TablePercent = isset($cols[72]) ? $cols[72] : 'NA'; /// new!!!          
        $suplier_country  = isset($cols[73]) ? $cols[73] : ''; /// new!!!
        $depth_percent    = isset($cols[74]) ? $cols[74] : ''; /// new!!!
        $crown_angle = isset($cols[75]) ? $cols[75] : ''; /// new!!!
        $girdle_condition   = isset($cols[78]) ? $cols[78] : ''; /// new!!!
		
		///////////////////////////////////////////////////////		
			
		//$TablePercent = isset($cols[32]) ? $cols[32] : 'NA';											
						
		$Date = date("Y-m-d H:i:s", strtotime($Date));
		$MeasArray = explode('x', $Meas);
		$Stock_n = $Stock_n; //.($this->random(2));  /// new!!! - commented
		         
        if(strcmp($cut, '') === 0) {
        	$cut = '';			
        }
		
        $shapeCode = strtoupper($cols[3]);
	  	$Cert = strtoupper($Cert);
		
	  	$ratio = (isset($ratio) && $ratio != null) ? $ratio : ' ';	  
		$os = array('D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
        //  if (in_array($color , $os)) {
              //if (in_array($owner , $ownerArr)) {

		/* temp!!!
        //$qry = "SELECT Stock_n FROM " . config_item('table_perfix') . "rapproduct where Stock_n = '" . $Stock_n . "'";
        $qry = "SELECT lot FROM " . config_item('table_perfix') . "rapproduct where lot = '" . $lot . "'";  // new!!!
        $result = 	$this->db->query($qry);
        $ret_lot = $result->result_array();		
		*/

        // $cerstr = substr($Cert,0,5);
        // if(($cerstr == 'GIA' || $cerstr == 'EGL I' || $cerstr == 'EGL U') && !empty($Cert_n) &&  ($price > 0 ) ){
        $email_content .= "<tr><td>".$lot."</td>
       						  <td>".$owner."</td>
       						  <td>".$shape."</td>
       						  <td>".$price."<td>
       						  <td>".$Cert."</td>
		 					</tr>";		

			//if (empty($ret_lot[0]['Stock_n'])) {  
			//if (empty($ret_lot[0]['lot'])) {  // new!!! temp!!!
                       $isinsert = $this->db->insert($this->config->item('table_perfix').'rapproduct_temp',  //'rapproduct',  temp!!!
                     array('lot'    =>  $lot,
					       'owner' =>  $owner,
					       'shape' =>  $shape,
					       'carat' => $carat,
					       'color' => $color,
						   'fancy_color' => $fancy_color,
						   'fancy_color_ot' => $fancy_color_ot,
						   'clarity' => $clarity,
						   'price' => $price,
						   'Rap' => $Rap,
						   'Cert' => $Cert,
						   'Depth' => $Depth,
						   'TablePercent' => $TablePercent,
						   'Girdle' => $Girdle,
						   'Culet' => $Culet,
						   'Polish' => $Polish,
						   'Sym' => $Sym,
						   'Flour' => $Flour,
						   'Meas' => $Meas,
						   'Comment' => $Comment,
						   'Stones' => $Stones,
						   'Cert_n' => $Cert_n,
						   'Stock_n' => $Stock_n,
						   'Make' => $Make,
						   'Date' => $Date,
						   'City' => $City,
						   'State' => $State,
						   'Country' => $Country,
						   'ratio' => $ratio,
						   'cut' => $cut,
						   'tbl' =>  $tbl,
						   'pricepercrt' => $pricepercrt,
						   'certimage' => $certimage,
						   'length' => $length,
						   'width' => $width,						   
						   'height' => $height,
						   ///////////////////////   new ones!!!
						   'name_code' => $name_code,
						   'fancy_color_intens' => $fcolor_intens,
						   'floursence_color' => $Flour_color,
						   'lab' => $lab,
						   'diamond_availability' => $availability,
						   'culet_size' => $Culet_size,
						   'culet_condition' => $Culet_condition,
						   'crown' => $crown,
						   'pavilion' => $pavilion,
						   'member_comments' => $member_coments,
						   'is_matched' => $isMatched,
						   'ismatched_separable' => $isMatched_separ,						   
						   'image_url' => $imageurl,
						   'rapsepec' => $rapSpec,
						   'pavilion_depth' => $pavilion_depth,
						   'pavilion_angle' => $paviil_angle,
						   'suplier_country' => $suplier_country,
						   'depth_percent' => $depth_percent,
						   'crown_angle' => $crown_angle,
						   'girdle_condition' => $girdle_condition
						));

						$action= "insert";
                        /*}   temp!!!
                        else {
                            $this->db->where('Stock_n', $Stock_n);
                          	$isinsert = $this->db->update($this->config->item('table_perfix').'rapproduct',
                           	array(
					       'owner' =>  $owner,
					       'shape' =>  $shape,
					       'carat' => $carat,
					       'color' => $color,
						   'fancy_color' => $fancy_color,
						   'fancy_color_ot' => $fancy_color_ot,
						   'clarity' => $clarity,
						   'price' => $price,
						   'Rap' => $Rap,
						   'Cert' => $Cert,
						   'Depth' => $Depth,
						   'TablePercent' => $TablePercent,
						   'Girdle' => $Girdle,
						   'Culet' => $Culet,
						   'Polish' => $Polish,
						   'Sym' => $Sym,
						   'Flour' => $Flour,
						   'Meas' => $Meas,
						   'Comment' => $Comment,
						   'Stones' => $Stones,
						   'Cert_n' => $Cert_n,
						   'Stock_n' => $Stock_n,
						   'Make' => $Make,
						   'Date' => $Date,
						   'City' => $City,
						   'State' => $State,
						   'Country' => $Country,
						   'ratio' => $ratio,
						   'cut' => $cut,
						   'tbl' =>  $tbl,
						   'pricepercrt' => $pricepercrt,
						   'certimage' => $certimage,
						   'length' => $length,
						   'width' => $width,						   
						   'height' => $height,
						   ///////////////////////   new ones!!!
						   'name_code' => $name_code,
						   'fancy_color_intens' => $fcolor_intens,
						   'floursence_color' => $Flour_color,
						   'lab' => $lab,
						   'diamond_availability' => $availability,
						   'culet_size' => $Culet_size,
						   'culet_condition' => $Culet_condition,
						   'crown' => $crown,
						   'pavilion' => $pavilion,
						   'member_comments' => $member_coments,
						   'is_matched' => $isMatched,
						   'ismatched_separable' => $isMatched_separ,						   
						   'image_url' => $imageurl,
						   'rapsepec' => $rapSpec,
						   'pavilion_depth' => $pavilion_depth,
						   'pavilion_angle' => $paviil_angle,
						   'suplier_country' => $suplier_country,
						   'depth_percent' => $depth_percent,
						   'crown_angle' => $crown_angle,
						   'girdle_condition' => $girdle_condition	
						));
						$action= "update";
                            
                        }   */

				return $action;
				
				// if(!$isinsert)
				// {
				// 	return -1 ;
				// }
				// else
				//     return $email_content;
				// }
			// }
          }
	}	
	
	////// calculate price
	function calculate_rappnet_price() {
		
	}
	
	/***** Loose Diamond ******************/
	
	 function saveLooseDiamondsInDB($cols)
	{
	
	
         $email_content = '';
	 if(is_array($cols))
	  {		
		///////// dev_loosediamonds columns values
		$carat  		= isset($cols[4]) ? $cols[4] : '0';
	  	$Cert  			= isset($cols[12]) ? $cols[12] : '';
	  	$Cert_n  		= isset($cols[13]) ? $cols[13] : '';
		$clarity  		= isset($cols[6]) ? $cols[6] : '';
	  	$color  		= isset($cols[5]) ? $cols[5] : '';
	  	$Comment  		= isset($cols[23]) ? $cols[23] : '';
	  	$Country   		= isset($cols[26]) ? $cols[26] : '';
		$City    		= isset($cols[24]) ? $cols[24] : '';
		$Girdle  		= isset($cols[19]) ? $cols[19] : '';
	  	$Culet  		= isset($cols[20]) ? $cols[20] : '';
	  	$cut            =  isset($cols[7]) ? $cols[7] : 0;
		$Depth  		= isset($cols[17]) ? $cols[17] : '0';
	  	$Flour  		= isset($cols[10]) ? $cols[10] : '';
	  	$lot 			= isset($cols[29]) ? $cols[29] : '';
	  	$Meas  			= isset($cols[11]) ? str_replace('-','x',$cols[11]) : '0';
	  	$Polish  		= isset($cols[8]) ? $cols[8] : '';
	  	$price  		= isset($cols[15]) ? $cols[15] : '250';
	  	$Rap  	    	= isset($cols[17]) ? $cols[17] : '0';
	  	$Make    		= isset($cols[18]) ? $cols[18] : '';
	  	$ratio    		= isset($cols[19]) ? $cols[19] : '';
	  	$owner  		= isset($cols[1]) ? $cols[1] : 'NA';
	  	$shape  		= isset($cols[3]) ? $cols[3] : '';
		//$shape  		= isset($cols[21]) ? strtoupper($cols[21]) : '';
                $State   		= isset($cols[25]) ? $cols[25] : '';
	  	$Stock_n    	= isset($cols[14]) ? $cols[14] : '';
	  	$Sym  			= isset($cols[9]) ? $cols[9] : '';
	  	$TablePercent  	= isset($cols[18]) ? $cols[18] : 'NA';
	  	$Stones  		= isset($cols[27]) ? $cols[27] : '';
	  	$CertImage   	= isset($cols[28]) ? $cols[28] : '';
	  	$Date    		= isset($cols[30]) ? $cols[30]  : '';
                $Date = date("Y-m-d H:i:s",strtotime($Date));
                $MeasArray		= explode('x', $Meas);
                $Stock_n = $Stock_n.($this->random(2));                
                if(strcmp($cut,'')===0)
		$cut='';		
                $shapeCode = strtoupper($cols[21]);
	  	$Cert = strtoupper($Cert);
	  	$ratio = ( isset($ratio) && $ratio != null) ? $ratio : ' ';	  
		$os = array('D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
		// $ownerArr = array('67100','30697','24019', '64881','2288','24581');
		
  // if (in_array($color , $os)) {
//if (in_array($owner , $ownerArr)) {		 			
                    $qry = "SELECT lot FROM dev_loosediamonds where lot = '".$lot."'";
                    $result = 	$this->db->query($qry);
                    $ret_lot = $result->result_array();
                    $statusArr =  array("status" => "nothing");
		    $cerstr = substr($Cert,0,5);
                 //   if(($cerstr == 'GIA' || $cerstr == 'EGL I' || $cerstr == 'EGL U') && !empty($Cert_n) && $price > 0 ){
                        
                       $email_content .= "<tr><td>".$lot."</td>
                       						  <td>".$owner."</td>
                       						  <td>".$shape."</td>
                       						  <td>".$price."<td>
                       						  <td>".$Cert."</td>
                       						  <td>".$CertImage."</td>
                       						 </tr>";
                        if(empty($ret_lot[0]['lot'])){
                       $isinsert = $this->db->insert('dev_loosediamonds',
                                          array('lot'    =>  $lot,
					       'owner' =>  $owner,
					       'shape' =>  $shape,
					       'carat' => $carat,
					       'color' => $color,
					       'clarity' => $clarity,
					       'cut'   => $cut,
					       'price' => $price,
					       'Rap'   => $Rap,
					       'Cert'  => $Cert,
					       'Depth' => $Depth,
					       'TablePercent' 	=> $TablePercent,
					       'Girdle'	=> $Girdle,
					       'Culet' 	=> $Culet,
					       'Polish' => $Polish,
					       'Sym' 	=> $Sym,
					       'Flour' 	=> $Flour,
					       'Meas' 	=> $Meas,
					       'Comment'  => $Comment,
					       'Stones'   => $Stones,
					       'Cert_n'   => $Cert_n,
					       'Stock_n'  => $Stock_n,
					       'Make' 	=> $Make,
					       'Date' 	=> $Date,
					       'City' 	=> $City,
					       'State' 	=> $State,
					       'Country' => $Country,
					       'ratio'  => $ratio,
					       'tbl'	=> config_item('base_url').'diamonds/search/true/true/false/false/false/'.$lot,
                                               'certimage' => $CertImage,
					       'length' => $MeasArray[0],
					       'width' => $MeasArray[1],
					       'height' => $MeasArray[2]
					));
                              //     $statusArr["status"] = "added";
                        }else{
                           $this->db->where('lot' , $lot);
                          $isinsert = $this->db->update('dev_loosediamonds',
                                          array(
					       'owner' =>  $owner,
					       'shape' =>  $shape,
					       'carat' => $carat,
					       'color' => $color,
					       'clarity' => $clarity,
					       'cut'   => $cut,
					       'price' => $price,
					       'Rap'   => $Rap,
					       'Cert'  => $Cert,
					       'Depth' => $Depth,
					       'TablePercent' 	=> $TablePercent,
					       'Girdle'	=> $Girdle,
					       'Culet' 	=> $Culet,
					       'Polish' => $Polish,
					       'Sym' 	=> $Sym,
					       'Flour' 	=> $Flour,
					       'Meas' 	=> $Meas,
					       'Comment'  => $Comment,
					       'Stones'   => $Stones,
					       'Cert_n'   => $Cert_n,
					       'Stock_n'  => $Stock_n,
					       'Make' 	=> $Make,
					       'Date' 	=> $Date,
					       'City' 	=> $City,
					       'State' 	=> $State,
					       'Country' => $Country,
					       'ratio'  => $ratio,
					       'tbl'	=> config_item('base_url').'diamonds/search/true/true/false/false/false/'.$lot,
                                               'certimage' => $CertImage,
					       'length' => $MeasArray[0],
					       'width' => $MeasArray[1],
					       'height' => $MeasArray[2]
					));
                            //$statusArr["status"] = "edited";        
                        }                            
                              
				if(!$isinsert)
				{
					return -1 ;
				}
				else
				    return $email_content;
                              
				// }
		//	 }
          }
   }
 }
?>
<div>
<?php 
function random($length = 8)
{     
    $chars = '983452458935876451386217';
   
    for ($p = 0; $p < $length; $p++)
    {
        $result .= ($p%2) ? $chars[mt_rand(19, 23)] : $chars[mt_rand(0, 18)];
    }
   
    return $result;
}
 
$query = mysql_query("select * from `dev_ebaycategories` where parent_id = 0  and category_id IN (1450533015,1450534015)") or die(mysql_error());
$rootnumofcat = mysql_num_rows($query) or die(mysql_error());
$i=0;
$string = "<select name='category' id='category' onchange=\"return getDetail(this.value);\">";
while($i < $rootnumofcat ){
   $root = mysql_fetch_array($query) or die(mysql_error());
   if($root['category_id'] == $details['category']){
       $flag = ' selected = "selected" ';
   }else{
       $flag = '';
   }
   $string = $string."<option value='".$root['category_id']."'  $flag >".$root['category_name']."</option>";
   $substring = getSubcat($root['category_id'], $details['category']);
   if(!empty($substring)){
     $string = $string.$substring;     
   }
    
   $i=$i+1;
//   echo $string; exit;  
  //continue;
}
$string .= "</select>";
   
function getSubcat($rootid,$choosedID){ 

        $squery = mysql_query("select * from `dev_ebaycategories` where parent_id = '$rootid'  ") or die(mysql_error());
        $subnumofcat = mysql_num_rows($squery);    
        $j=0;
         if($subnumofcat > 0){
             while($j < $subnumofcat ){
  		  		 $subcat = mysql_fetch_array($squery) or die(mysql_error());
                                 if($subcat['category_id'] == $choosedID){
                                    $flag = ' selected= "selected" ';
                                 }else{
                                    $flag = '' ;
                                 }
  				 $substring = $substring."<option value='".$subcat['category_id']."'   $flag  >&nbsp;|-".$subcat['category_name']."</option>";
    			 $childstring = getMoreChilds($subcat['category_id'],$choosedID);
  				  $substring = $substring.$childstring;
    			  $j=$j+1;
    	      }
  	     }	 
  	      return trim($substring);
    
}

function getMoreChilds($rootid,$choosedID){
     $squery = mysql_query("select * from `dev_ebaycategories` where parent_id = '$rootid'  ") or die(mysql_error());
        $subnumofcat = mysql_num_rows($squery);    
        $j=0;
         if($subnumofcat > 0){
             while($j < $subnumofcat ){
  		  		 $subcat = mysql_fetch_array($squery) or die(mysql_error());                 
                                 if($subcat['category_id'] == $choosedID){
                                     $flag = 'selected  = "selected" ';
                                 }else{
                                     $flag   =  '';
                                 }
  				 $substring = $substring."<option value='".$subcat['category_id']."'  $flag >&nbsp;&nbsp;&nbsp;|----".$subcat['category_name']."</option>";
    			 $childstring = getMoreChilds1($subcat['category_id'],$choosedID);
  				  $substring = $substring.$childstring;
    			  $j=$j+1;
    	      }
  	     }	 
  	      return trim($substring);

}

function getMoreChilds1($rootid, $choosedID){
     $squery = mysql_query("select * from `dev_ebaycategories` where parent_id = '$rootid'  ") or die(mysql_error());
        $subnumofcat = mysql_num_rows($squery);    
        $j=0;
         if($subnumofcat > 0){
             while($j < $subnumofcat ){
  		  		 $subcat = mysql_fetch_array($squery) or die(mysql_error());                 
                                 if($subcat['category_id'] == $choosedID){
                                     $flag = 'selected  = "selected" ';
                                 }else{
                                     $flag   =  '';
                                 }
  				 $substring = $substring."<option value='".$subcat['category_id']."'   $flag >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|----".$subcat['category_name']."</option>";
    			
    			  $j=$j+1;
    	      }
  	     }	 
  	      return trim($substring);

}

if($action == 'add' || $action == 'edit'){
$this->load->helper('custom','form');
if(isset($details)){
$lot = isset($details['lot']) ? $details['lot'] : '';
$owner = isset($details['owner']) ? $details['owner'] : '';
$shape = isset($details['shape']) ? $details['shape'] : '';
$carat = isset($details['carat']) ? $details['carat'] : '';
$color = isset($details['color']) ? $details['color'] : '';
$clarity = isset($details['clarity']) ? $details['clarity'] : '';
$price = isset($details['price']) ? $details['price'] : '';
$rapnetPrice = isset($details['Rap']) ? $details['Rap'] : '';
$cert = isset($details['Cert']) ? $details['Cert'] : '';
$depth = isset($details['Depth']) ? $details['Depth'] : '';
$table = isset($details['TablePercent']) ? $details['TablePercent'] : '';
$girdle = isset($details['Girdle']) ? $details['Girdle'] : '';
$culet = isset($details['Culet']) ? $details['Culet'] : '';
$polish = isset($details['Polish']) ? $details['Polish'] : '';
$sym = isset($details['Sym']) ? $details['Sym'] : '';
$flour = isset($details['Flour']) ? $details['Flour'] : '';
//$meas = isset($details['Meas']) ? $details['Meas'] : '';

 if(!empty($details['Meas'])){
 list($w,$b,$h) = 	explode("x",$details['Meas']);
 $meas = $w." x ".$b." x ".$h;
 }else{
  $meas = '';   
 }
$carat = number_format($carat,2);
$comment = isset($details['Comment']) ? $details['Comment'] : '';
$stones = isset($details['Stones']) ? $details['Stones'] : '';
$certnum = isset($details['Cert_n']) ? $details['Cert_n'] : '';
$stocknum = isset($details['Stock_n']) ? $details['Stock_n'] : '';
$make = isset($details['Make']) ? $details['Make'] : '';
$date = isset($details['Date']) ? $details['Date'] : '';
$city = isset($details['City']) ? $details['City'] : '';
$state = isset($details['State']) ? $details['State'] : '';
$country = isset($details['Country']) ? $details['Country'] : '';
$ratio = isset($details['ratio']) ? $details['ratio'] : '';
$cut = isset($details['cut']) ? $details['cut'] : '';
$tbl = isset($details['tbl']) ? $details['tbl'] : '';
$pricepercert = isset($details['pricepercrt']) ? $details['pricepercrt'] : '';
$certimage = isset($details['certimage']) ? $details['certimage'] : '';
$length = isset($details['length']) ? $details['length'] : '';
$width = isset($details['width']) ? $details['width'] : '';
$height = isset($details['height']) ? $details['height'] : '';


$price = round($price * $carat);

}  else  {
$lot = isset($details['lot']) ? $details['lot'] : '';
$owner = isset($details['owner']) ? $details['owner'] : '';
$shape = isset($details['shape']) ? $details['shape'] : '';
$carat = isset($details['carat']) ? $details['carat'] : '';
$color = isset($details['color']) ? $details['color'] : '';
$clarity = isset($details['clarity']) ? $details['clarity'] : '';
$price = isset($details['price']) ? $details['price'] : '';
$rapnetPrice = isset($details['Rap']) ? $details['Rap'] : '';
$cert = isset($details['Cert']) ? $details['Cert'] : '';
$depth = isset($details['Depth']) ? $details['Depth'] : '';
$table = isset($details['TablePercent']) ? $details['TablePercent'] : '';
$girdle = isset($details['Girdle']) ? $details['Girdle'] : '';
$culet = isset($details['Culet']) ? $details['Culet'] : '';
$polish = isset($details['Polish']) ? $details['Polish'] : '';
$sym = isset($details['Sym']) ? $details['Sym'] : '';
$flour = isset($details['Flour']) ? $details['Flour'] : '';
$meas = isset($details['Meas']) ? $details['Meas'] : '';
$comment = isset($details['Comment']) ? $details['Comment'] : '';
$stones = isset($details['Stones']) ? $details['Stones'] : '';
$certnum = isset($details['Cert_n']) ? $details['Cert_n'] : '';
$stocknum = isset($details['Stock_n']) ? $details['Stock_n'] : '';
$make = isset($details['Make']) ? $details['Make'] : '';
$date = isset($details['Date']) ? $details['Date'] : '';
$city = isset($details['City']) ? $details['City'] : '';
$state = isset($details['State']) ? $details['State'] : '';
$country = isset($details['Country']) ? $details['Country'] : '';
$ratio = isset($details['ratio']) ? $details['ratio'] : '';
$cut = isset($details['cut']) ? $details['cut'] : '';
$tbl = isset($details['tbl']) ? $details['tbl'] : '';
$pricepercert = isset($details['pricepercrt']) ? $details['pricepercrt'] : '';
$certimage = isset($details['certimage']) ? $details['certimage'] : '';
$length = isset($details['length']) ? $details['length'] : '';
$width = isset($details['width']) ? $details['width'] : '';
$height = isset($details['height']) ? $details['height'] : '';
$title = '';
  }
$id  = isset($lot) ? $lot : '';
//$price = round($price * $carat);
$destFolder =  config_item('base_url')."/images/diamonds/pendants/";
$details['shape'] = trim($details['shape']);
switch ($details['shape']){
    case 'Round':
        $shape = 'Round';
        $destFile = $destFolder.'round.jpg';
        break;
    case 'Princess':
      $shape = 'Princess';
      $destFile = $destFolder.'princessrings.jpg';
      break;
    case 'Radiant':
      $shape = 'Radiant';
      $destFile = $destFolder.'radiantring.jpg';
      break;
    case 'Emerald':
      $shape = 'Emerald';
      $destFile = $destFolder.'emeraldring.jpg';
       break;
    case 'Asscher':
    case 'Sq. Emerald':
      $shape = 'Asscher';
      $destFile = $destFolder.'asscherring.jpg';
      break;
    case 'Oval':
      $shape = 'Oval';
      $destFile = $destFolder.'oval.jpg';
      break;
    case 'Marquise':
      $shape = 'Marquise';
      $destFile = $destFolder.'marquisering.jpg';
      break;
     case 'Pear':
      $shape = 'Pear';
      $destFile = $destFolder.'pear_ring.jpg';
      break;
     case 'Heart':
      $shape = 'Heart';
      $destFile = $destFolder.'heartring.jpg';
      break;
     case 'Cushion':
      $shape = 'Cushion';
      $destFile = $destFolder.'cushionring.jpg';
      break;
     case 'Cushion Modified':
     case 'CUSHION MODIFIED':
      $shape = 'Cushion';
      $destFile = $destFolder.'cushionring.jpg';
      break;
     default:
      $shape = $detail['shape'];
       break;
 }

if(trim($cert) == 'GIA'){
  $title = $carat.' CT '.strtoupper($shape).' '.$color. ' '.$clarity.' NATURAL LOOSE DIAMOND! '.$cert.'! '.$meas.' MM!';
  $certName = 'GIA';
}elseif(trim($cert) == 'EGL U') {
  $title  = $carat.' CT '.strtoupper($shape).' '.$color. ' '.$clarity.' NATURAL LOOSE DIAMOND! EGL'.' '.$country.'! '.$meas.' MM!' ;
  $certName = 'EGL USA';
}else{
  $title = $carat.' CT '.strtoupper($shape).' '.$color. ' '.$clarity.' NATURAL LOOSE DIAMOND! EGL'.'! '.$meas.' MM!';
  $certName = 'EGL';
}
$qry = "SELECT rate FROM ".config_item('table_perfix')."helix_prices WHERE pricefrom <= '$price'  and  priceto > '$price' ORDER BY pricefrom ASC LIMIT 0,1";
$result = $this->db->query($qry);
$pret = $result->result_array();	
$rate = $pret[0]['rate'];
$our_price = round( $price * $rate)  ;
$retail_price = round($our_price * 1.65) ;

if(empty($certimage))
               {
$sql = "SELECT cert_img FROM ". $this->config->item('table_perfix')."cert  WHERE cert_name = '".$details['Cert']."'";
$query = $this->db->query($sql);
$result = $query->result_array();
$certimage =   config_item('base_url').$result[0]['cert_img'];
               }
$stocknum = $stocknum                 
?>
<style>
    .lebelfield
    {
      color:white;font-weight:bold;
    }
    .inputfield { color:white; }

</style>
<div>
  <h1 class="hbb" align="center">Add Rapnet Stones on eBay</h1><br/>
  <div align="center">
      <form name="rapnetForm" action="<?php echo config_item('base_url');?>admin/pendants/<?php echo $action; echo ($action == 'edit') ? '/' .$id : '';?>" method="post" enctype="multipart/form-data" >
							
    <div class="lebelfield floatl">Lot:</div>
      <div class="inputfield floatl"><?php echo $lot;?>
        <input type="hidden" name="lot" value="<?php echo $lot;?>" maxlength="15" disabled="true" />
      </div>
    <div class="clear"></div>

        <!--
    <div class="lebelfield floatl">Category:</div>
      <div class="inputfield floatl">
         <? //echo $string; ?>
      </div>
    <div class="clear"></div>
    -->
    
    <div class="lebelfield floatl">Item title:</div>
      <div class="inputfield floatl"><?php echo $title;?>
        <input type="hidden" name="title" value="<?php echo $title;?>" maxlength="80" size="120"  disabled="true" />
      </div>
    <div class="clear"></div>
    
    <div class="lebelfield floatl">Shape:</div>
      <div class="inputfield floatl"><?php echo $shape;?>
        <input type="hidden" name="shape" value="<?php echo $shape;?>" maxlength="15" disabled="true" />        
      </div>
    <div class="clear"></div>
    
     <div class="lebelfield floatl">Carat:</div>
      <div class="inputfield floatl"><?php echo number_format($carat,2);?>
        <input type="hidden" name="carat" value="<?php echo number_format($carat,2);?>"  id="carat" />
      </div>
    <div class="clear"></div>
    
    <div class="lebelfield floatl">Color:</div>
      <div class="inputfield floatl"><?php echo $color;?>
        <input type="hidden" name="color" value="<?php echo $color;?>"  id="color" />
      </div>
    <div class="clear"></div>
<? if(!empty($clarity)){ ?> 
<div class="lebelfield floatl">Clarity:</div>
      <div class="inputfield floatl"><?php echo $clarity ;?>
        <input type="hidden" name="clarity" value="<?php echo $clarity ;?>"  id="clarity" />
      </div>
    <div class="clear"></div>
<? } ?>
<div class="lebelfield floatl">Price:</div>
      <div class="inputfield floatl">$<?php echo number_format($price,2) ;?>
        <input type="hidden" name="price" value="<?php echo number_format($price,2) ;?>"  id="price" />
      </div>
    <div class="clear"></div>

<div class="lebelfield floatl">Our Price:</div>
      <div class="inputfield floatl">$<?php echo number_format($our_price,2) ;?>
        <input type="hidden" name="price" value="<?php echo number_format($our_price,2) ;?>"  id="price" />
      </div>
    <div class="clear"></div>        

<div class="lebelfield floatl">Retail Price:</div>
      <div class="inputfield floatl">$<?php echo number_format($retail_price,2) ;?>
        <input type="hidden" name="retail_price" value="<?php echo number_format($retail_price,2) ;?>"  id="retail_price" />
      </div>
    <div class="clear"></div>                
        
<div class="lebelfield floatl">Certificate:</div>
      <div class="inputfield floatl"><?php echo $certName  ;?>
        <input type="hidden" name="cert" value="<?php echo $cert  ;?>"  id="cert" disabled="true" />
      </div>
    <div class="clear"></div>        

<div class="lebelfield floatl">Depth:</div>
      <div class="inputfield floatl"><?php echo $depth   ;?>%
        <input type="hidden" name="depth" value="<?php echo $depth   ;?>"  id="depth" />
      </div>
    <div class="clear"></div>        
                
<div class="lebelfield floatl">Table:</div>
      <div class="inputfield floatl"><?php echo $table   ;?>%
        <input type="hidden" name="table" value="<?php echo $table   ;?>"  id="table" />
      </div>
    <div class="clear"></div>        
   <!--
<div class="lebelfield floatl">Girdle:</div>
      <div class="inputfield floatl"><?php // echo $girdle   ;?>
        <input type="hidden" name="girdle" value="<?php // echo $girdle   ;?>"  id="girdle" />
      </div>
    <div class="clear"></div>
    -->
                <? if(!empty($culet)){ ?>
<div class="lebelfield floatl">Culet:</div>
      <div class="inputfield floatl"><?php echo $culet   ;?>
        <input type="hidden" name="culet" value="<?php echo $culet   ;?>"  id="culet" />
      </div>
    <div class="clear"></div>
    <? } ?> 
<div class="lebelfield floatl">Polish:</div>
      <div class="inputfield floatl"><?php echo $polish   ;?>
        <input type="hidden" name="polish" value="<?php echo $polish   ;?>"  id="polish" />
      </div>
    <div class="clear"></div>        

<div class="lebelfield floatl">Sym:</div>
      <div class="inputfield floatl"><?php echo $sym   ;?>
        <input type="hidden" name="sym" value="<?php echo $sym   ;?>"  id="sym" />
      </div>
    <div class="clear"></div>        
<div class="lebelfield floatl">Flour:</div>
      <div class="inputfield floatl"><?php echo $flour   ;?>
        <input type="hidden" name="flour" value="<?php echo $flour   ;?>"  id="flour" />
      </div>
    <div class="clear"></div>        
<div class="lebelfield floatl">Measurement:</div>
      <div class="inputfield floatl"><?php echo $meas   ;?>&nbsp;MM 
        <input type="hidden" name="meas" value="<?php echo $meas   ;?>"  id="meas" />
      </div>
    <div class="clear"></div>
    <? if(!empty($comment)){  ?>
<div class="lebelfield floatl">Comments:</div>
      <div class="inputfield floatl"><?php echo $comment ; ?>
       <!--   <textarea name="comments" id="comments" style="width:600px;height:100px;"><?php // echo $comment ; ?></textarea>        -->
      </div>
    <div class="clear"></div>
    <? } ?>
<div class="lebelfield floatl">Stones:</div>
      <div class="inputfield floatl"><?php echo $stones   ;?> Stones
        <input type="hidden" name="stones" value="<?php echo $stones   ;?>"  id="stones" />
      </div>
    <div class="clear"></div>        
<div class="lebelfield floatl">Certificate Number:</div>
      <div class="inputfield floatl"><?php echo $certnum   ;?>
        <input type="hidden" name="certnum" value="<?php echo $certnum   ;?>"  id="certnum" />
      </div>
    <div class="clear"></div>            
<div class="lebelfield floatl">Stock Number:</div>
      <div class="inputfield floatl"><?php echo $stocknum    ;?>
        <input type="hidden" name="stocknum" value="<?php echo $stocknum    ;?>"  id="stocknum" />
      </div>
    <div class="clear"></div>
    
<div class="lebelfield floatl">Length:</div>
      <div class="inputfield floatl"><?php echo $length    ;?>
        <input type="hidden" name="length" value="<?php echo $length    ;?>"  id="length" />
      </div>
    <div class="clear"></div>                    
<div class="lebelfield floatl">Width:</div>
      <div class="inputfield floatl"><?php echo $width    ;?>
        <input type="hidden" name="width" value="<?php echo $width    ;?>"  id="width" />
      </div>
    <div class="clear"></div>                    
<div class="lebelfield floatl">Height:</div>
      <div class="inputfield floatl"><?php echo $height    ;?>
        <input type="hidden" name="height" value="<?php echo $height    ;?>"  id="height" />
      </div>
    <div class="clear"></div>                        
       <? if(!empty($cut)){ ?>
<div class="lebelfield floatl">Cut:</div>
      <div class="inputfield floatl"><?php echo $cut    ;?>&nbsp;Cut!
        <input type="hidden" name="cut" value="<?php echo $cut    ;?>"  id="cut" />
      </div>
    <div class="clear"></div>
   <? } ?> 
    <!--
  <div class="lebelfield floatl">Image-1:</div>
      <div class="inputfield floatl">
        <input type="file" name="image1" id="image1" />
      </div>
    <div class="clear"></div>                              
    
<div class="lebelfield floatl">Image-2:</div>
      <div class="inputfield floatl">
        <input type="file" name="image2" id="image2" />
      </div>
    <div class="clear"></div>                      
    
 <div class="lebelfield floatl">Image-3:</div>
      <div class="inputfield floatl">
        <input type="file" name="image3" id="image3" />
      </div>
    <div class="clear"></div>                              
    
  <div class="lebelfield floatl">Image-4:</div>
      <div class="inputfield floatl">
        <input type="file" name="image4" id="image4" />
      </div>
    <div class="clear"></div>                              
    
    -->
<div class="lebelfield floatl">Certificate Image:</div>
      <div class="inputfield floatl">
        <!-- <input type="file" name="certimage" id="certimage" />         -->
      </div>
    <div class="clear"></div>                            
    <div align="center" style="margin-left:100px;">
        <div style="float:left;"><img src="<?php echo $certimage ;?>" style="width:100px;height:100px;" border="0" /></div>
        <div style="float:left;"><img src="<? echo $destFile; ?>"  style="width:100px;height:100px;"  border="0" /></div>
        <div class="clear"></div>
    </div>
<input type="submit"  name="<?=$action;?>btn" value="Continue to Send" class="adminbutton"  />
<a href="<?php echo config_item('base_url')?>admin/rapnetDiamonds" class="adminbutton"> Cancel</a>
</form>
</div>
</div>
    <?php }else{?>
			<div>
                            <form name="rapnetstones" method="post" action="<?php echo config_item('base_url')?>admin/searchStones" id="rapnetstones">
                        <table id="results" style="display:none; "></table>
                        </form>
			</div>
    <?php }?>
</div>
 

 

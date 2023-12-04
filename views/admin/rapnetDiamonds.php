<div class="inner">
    <div class="contentpanel">
        <!-- main menu start -->
        <div><?php echo admin_main_menu_list(); //// admin_mainmenu helper ?></div>
        <!-- main menu end -->
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
$details['Girdle'] = str_replace("-"," to ",$details['Girdle']);
$details['Girdle'] = str_replace("Extr." , "Extremely" , $details['Girdle']);
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
$destFolder =  config_item('base_url')."/images/diamonds/shape/";
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
    case 'Baguette':
      $shape = 'Baguette';
      $destFile = $destFolder.'baguettering.jpg';
      break;
  case 'Trilliant':
      $shape = 'Trilliant';
      $destFile = $destFolder.'trilliantring.jpg';
      break;
     case 'Cushion Modified':
      $shape = 'Cushion';
      $destFile = $destFolder.'cushionring.jpg';
      break;
     default:
      $shape = $details['shape'];
       break;
 }
if(strtoupper($shape) == 'A')
{
	$shaper = 'Asscher';
}
if(strtoupper($shape) == 'C')
{
	$shaper = 'Cushion';
}
if(strtoupper($shape) == 'E')
{
	$shaper = 'Emerald';
}
if(strtoupper($shape) == 'H')
{
	$shaper = 'Heart';
}
if(strtoupper($shape) == 'M')
{
	$shaper = 'Marquise';
}
if(strtoupper($shape) == 'O')
{
	$shaper = 'Oval';
}
if($shape == 'Pr')
{
	$shaper = 'Princess';
}
if(strtoupper($shape) == 'P')
{
	$shaper = 'Pear';
}
if(strtoupper($shape) == 'R')
{
	$shaper = 'Radiant';
}
if(strtoupper($shape) == 'B')
{
	$shaper = 'Round';
}

$diamondsShape = viewDmShape( $details['shape'] );
$certsName = explode(' ', trim( $details['Cert'] ) );

if( !empty($details['fancy_color']) ) {
    $title = _nf($carat, 2).' CT '.$diamondsShape.' '.$clarity. getFancyColorName($details['fancy_color']) . ' Fancy Loose Diamond! '.' '.$cert.'! ';
} else {
    $title = _nf($carat, 2).' CT '.$diamondsShape.' '.$color. ' '.$clarity.' '.$clarity_enhance.'Loose Diamond!'.' '.$cert.'! ';
}
$certName = $cert;

$qry = "SELECT rate FROM ".config_item('table_perfix')."helix_prices WHERE pricefrom <= '$price'  and  priceto > '$price' ORDER BY pricefrom ASC LIMIT 0,1";
$result = $this->db->query($qry);
$pret = $result->result_array();	
$rate = $pret[0]['rate'];
$our_price = round( $price * $rate)  + 195 ;
$retail_price = round($our_price * 1.65) ;
$rate1 = ($rate/100);
$xprice1 = $price * $rate1;
$ourprice1 = $price + $xprice1;
if(empty($certimage))
{
    $cert_name = explode(' ', $details['Cert']);
    $sql = "SELECT cert_img FROM ". $this->config->item('table_perfix')."cert  WHERE cert_name = '".$cert_name[0]."'";
    $query = $this->db->query($sql);
    $result = $query->result_array();
    $certimage = $result[0]['cert_img'];
}
$picsql = "SELECT picture1 FROM ". $this->config->item('table_perfix')."pictures  WHERE diamondshape = '".$shape."'";
$picquery = $this->db->query($picsql);
$picresult = $picquery->result_array();
$destFile =   config_item('base_url').$picresult[0]['picture1'];
$stocknum = $stocknum;       
?> 
<div class="blue_man">
   <div class="blue_admin_box1">			
      <div class="addcountry_box">
        <div class="heading">
          <h1>Add Rapnet Stones on eBay</h1>
        </div>
            <!-- Message Part -->
            <div style="width:100%;">
             <?php if(isset($success) && !empty($success)){ ?>
                <div style="width:95.5%; margin:5px; padding:10px 10px 10px 10px; background-color:#C8F2BB; font-weight:bold">
                      <? echo $success;   ?>
                </div>
                <?php } ?>
            </div>
            <div style="clear:both"></div>
            <!-- End -->
            <div class="search_box">
      <form name="rapnetForm" action="<?php echo config_item('base_url');?>admin/rapnetDiamonds/<?php echo $action; echo ($action == 'edit') ? '/' .$id : '';?>" method="post" enctype="multipart/form-data" >
           <table width="80%" border="0" align="center" cellpadding="5" cellspacing="0" class="table_border">
  <!--Warning Class-->
<!--end of displaying warning class-->
    <tr>
      <td width="20%" align="right">Lot</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
                <?php echo $lot; ?>
                      <input type="hidden" name="lot" value="<?php echo $lot;?>" maxlength="15"  />
            </dd>
      </td>
    </tr>  
    <tr>
      <td width="20%" align="right">Item Title</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
        <?php echo $title;?>
        <input type="hidden" name="title" value="<?php echo $title;?>" maxlength="80" size="120"   />
            </dd>
      </td>
    </tr>  
    <tr>
      <td width="20%" align="right">Shape</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
<?php
    $shaper = viewDmShape( strtoupper($shape) );
?>
<?php echo $diamondsShape; ?>
        <input type="hidden" name="shape" value="<?php echo $diamondsShape;?>" maxlength="15" />        
            </dd>
      </td>
    </tr>  
        <tr>
      <td width="20%" align="right">Carat</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
        <?php echo number_format($carat,2);?>
        <input type="hidden" name="carat" value="<?php echo number_format($carat,2);?>" id="carat" />
            </dd>
      </td>
    </tr>  
            <tr>
      <td width="20%" align="right">Color</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
        <?php echo $details['color'];?>
            <input type="hidden" name="color" value="<?php echo $details['color'];?>" id="color" />
            </dd>
      </td>
    </tr>  
<?php if(!empty($details['clarity'])){ ?> 
     <tr>
      <td width="20%" align="right">Clarity</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
        <?php echo $details['clarity'];?>
            <input type="hidden" name="clarity" value="<?php echo $details['clarity'];?>" id="clarity" />
            </dd>
      </td>
    </tr>  
<?php } ?>
     <tr>
      <td width="20%" align="right">Rapnet Price</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
        <?php
        $rapnet_price = $details['price'];
        $retaildm_price = $ourdm_price  * 1.65;
			//$pricer = number_format(round($ourprice1));
		?>
        $ <?php echo number_format($rapnet_price, 2); ?>
        <input type="hidden" name="price" value="<?php echo $rapnet_price; ?>"  id="price" />
            </dd>
      </td>
    </tr>  
    <tr>
      <td width="20%" align="right">Our Price</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
        $ <?php echo number_format($ourdm_price, 2); ?>
            </dd>
      </td>
    </tr>  
    <tr>
      <td width="20%" align="right">Sale Price</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
        $ <?php echo number_format($salesPrice, 2); ?>
        <input type="hidden" name="diamond_ourprice" value="<?php echo $ourdm_price; ?>"  id="price" />
        <input type="hidden" name="retail_price" value="<?php echo $retaildm_price; ?>"  id="retail_price" />
<!--        <input type="" name="retail_price" value="<?php echo $retaildm_price; ?>"  id="retail_price" />-->
            </dd>
      </td>
    </tr>  
<!--         <tr>
      <td width="20%" align="right">Retail Price</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
        $ <?php echo addslashes($retaildm_price); ?>
        <input type="hidden" name="retail_price" value="<?php echo $retaildm_price; ?>"  id="price" />
            </dd>
      </td>
    </tr>  -->
         <!--<tr>
      <td width="20%" align="right">Retail Price</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
        $<?php //echo number_format($retail_price,2) ;?>
        <input type="hidden" name="retail_price" value="<?php //echo number_format($retail_price,2) ;?>"  id="retail_price" />
            </dd>
      </td>
    </tr>-->  
         <tr>
      <td width="20%" align="right">Certificate</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
		<?php if(trim($cert == 'NONE'))
		{
			echo 'EGL';
		}
		else
		{ ?>	
        <?php echo $certName;?>
		<?php } ?>
        <input type="hidden" name="cert" value="<?php if(trim($cert == 'NONE')) { echo 'EGL'; } else {  echo $cert; } ?>"  id="cert"  />
            </dd>
      </td>
    </tr>  
<tr>
      <td width="20%" align="right">Depth</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
        <?php echo $depth   ;?>%
        <input type="hidden" name="depth" value="<?php echo $depth   ;?>"  id="depth" />
            </dd>
      </td>
    </tr>  
<tr>
      <td width="20%" align="right">Table</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
        <?php echo $table   ;?>%
        <input type="hidden" name="table" value="<?php echo $table   ;?>"  id="table" />
            </dd>
      </td>
    </tr>  
<tr>
      <td width="20%" align="right">Girdle</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
        <?php echo $girdle   ;?>
        <input type="hidden" name="girdle" value="<?php echo $girdle   ;?>"  id="girdle" />
            </dd>
      </td>
    </tr>          
<?php if(!empty($culet)){ ?>
    <tr>
      <td width="20%" align="right">Culet</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
        <?php echo $culet   ;?>
        <input type="hidden" name="culet" value="<?php echo $culet   ;?>"  id="culet" />
            </dd>
      </td>
    </tr>          
<? } ?> 
<tr>
      <td width="20%" align="right">Polish</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
        <?php echo $polish   ;?>
        <input type="hidden" name="polish" value="<?php echo $polish   ;?>"  id="polish" />
            </dd>
      </td>
    </tr>          
<tr>
      <td width="20%" align="right">Sym</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
        <?php echo $sym   ;?>
        <input type="hidden" name="sym" value="<?php echo $sym   ;?>"  id="sym" />
            </dd>
      </td>
    </tr>          
<tr>
      <td width="20%" align="right">Flour</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
        <?php echo $flour   ;?>
        <input type="hidden" name="flour" value="<?php echo $flour   ;?>"  id="flour" />
            </dd>
      </td>
    </tr>              
<tr>
      <td width="20%" align="right">Measurement</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
        <?php echo $meas   ;?>&nbsp;MM 
        <input type="hidden" name="meas" value="<?php echo $meas   ;?>"  id="meas" />
            </dd>
      </td>
    </tr>              
    <? if(!empty($comment)){  ?>
<tr>
      <td width="20%" align="right">Comments</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
        <?php echo $comment ; ?>
            </dd>
      </td>
    </tr> 
<? } ?>
<tr>
      <td width="20%" align="right">Stones</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
        <?php echo $stones   ;?> Stones
        <input type="hidden" name="stones" value="<?php echo $stones   ;?>"  id="stones" />
            </dd>
      </td>
    </tr> 
<tr>
      <td width="20%" align="right">Certificate Number</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
        <?php echo $certnum   ;?>
        <input type="hidden" name="certnum" value="<?php echo $certnum   ;?>"  id="certnum" />
            </dd>
      </td>
    </tr> 
<tr>
      <td width="20%" align="right">Stock Number</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
        <?php echo $stocknum    ;?>
        <input type="hidden" name="stocknum" value="<?php echo $stocknum    ;?>"  id="stocknum" />
            </dd>
      </td>
    </tr> 
<tr>
      <td width="20%" align="right">Length</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
        <?php echo $length    ;?>
        <input type="hidden" name="length" value="<?php echo $length    ;?>"  id="length" />
            </dd>
      </td>
    </tr> 
<tr>
      <td width="20%" align="right">Width</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
        <?php echo $width    ;?>
        <input type="hidden" name="width" value="<?php echo $width    ;?>"  id="width" />
            </dd>
      </td>
    </tr> 
<tr>
      <td width="20%" align="right">Height</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
        <?php echo $height    ;?>
        <input type="hidden" name="height" value="<?php echo $height;?>"  id="height" />
            </dd>
      </td>
    </tr>         
<?php if(!empty($cut)){ ?>
    <tr>
      <td width="20%" align="right">Cut</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
        <?php echo $cut;?>&nbsp;Cut!
        <input type="hidden" name="cut" value="<?php echo $cut;?>" id="cut" />
            </dd>
      </td>
    </tr>         
   <?php } ?> 
    <tr>        
      <td colspan="4">
<!--        <input type="hidden" name="Cert" value="<?php echo $details['Cert'];?>" id="Cert" />-->
        <input type="hidden" name="Cert_n" value="<?php echo $details['Cert_n'];?>" id="Cert_n" />
      </td>
    </tr>        
    <?php
        $destFolder1 = 'images/loosepictures/';
        $pendantImageNew = config_item('base_url').$destFolder1.$details['shape'].'.jpg';
            $shape = '';
            switch ($details['shape']) {
                case 'B':
                    $shape = 'Round';
                    $destFile = $destFolder . 'round.JPG';
                    break;
                case 'Pr':
                    $shape = 'Princess';
                    $destFile = $destFolder . 'princess.jpg';
                    break;
                case 'R':
                    $shape = 'Radiant';
                    $destFile = $destFolder . 'radiant.jpg';
                    break;
                case 'E':
                    $shape = 'Emerald';
                    $destFile = $destFolder . 'emeraldring.jpg';
                    break;
                case 'A':
                case 'Sq. Emerald':
                    $shape = 'Asscher';
                    $destFile = $destFolder . 'asscherring.jpg';
                    break;
                case 'O':
                    $shape = 'Oval';
                    $destFile = $destFolder . 'Oval_oval.jpg';
                    break;
                case 'M':
                    $shape = 'Marquise';
                    $destFile = $destFolder . 'Marquise_Big.jpeg';
                    break;
                case 'P':
                    $shape = 'Pear';
                    $destFile = $destFolder . 'Pear_pear.jpg';
                    break;
                case 'H':
                    $shape = 'Heart';
                    $destFile = $destFolder . 'heart.jpg';
                    break;
                case 'C':
                    $shape = 'Cushion';
                    $destFile = $destFolder . 'Cushion_Big.jpeg';
                    break;
                case 'Cushion Modified':
                    $shape = 'Cushion';
                    $destFile = $destFolder . 'cushionring.jpg';
                    break;
                default:
                    $shape = $row['shape'];
                    break;
            }
    ?>
    <tr>
      <td width="20%" align="right">Certificate Image</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
        <div style="float:left;"><img src="<?php echo $certimage;?>" style="width:100px;height:100px;" border="0" /></div>
        <div style="float:left;"><img src="<?php echo $shape_imge; ?>"  style="width:100px;height:100px;"  border="0" /><?php echo $shapeimg; ?></div>
        <input type="hidden" name="image2" value="<?php echo $shape_imge; ?>" id="image2"  />
		<input type="hidden" name="certimage" value="<?php echo $certimage; ?>" id="image2"  />
            </dd>
      </td>
    </tr>         
    <tr>
      <td align="right">&nbsp;</td>
	  <td width="3%" align="left" valign="top"><dt id="edit-label">&nbsp;</dt><dd id="edit-element">
            <input type="submit"  name="<?=$action;?>btn" value="Continue to Send"  id="edit"  class="search_but"></dd>&nbsp;</td>          
          <td width="74%" align="left" valign="top"><dt id="back-label">&nbsp;</dt><dd id="back-element">
            <button name="back" id="back" type="button" class="search_but" onclick="history.go(-1);">Back</button></dd></td>
    </tr>                     
     </table>
      </form>
</div>
   </div>		
 </div>
      <div class="spacerdiv"><img src="/template/admin/images/spacer.gif" alt="spacer" /></div>
    </div>       
    <?php }else{
		?><script type="text/javascript" >
/*function checkAllItem() {
(function($){
$(document).ready(function(){
    $("input.bookid").each(function(){
       $(this).attr("checked",true); 
    });
});
})(jQuery);
}*/
    function selectedProd(checkid) {
      ///check/uncheck items
        $("#"+checkid).change(function(){
            var v=$(this).is(":checked");
            $("input.bookid").each(function(){
                $(this).attr("checked",v); 
            });
        });  
    }
(function($){
$(document).ready(function(){
    $(".ebayExportResponse").html("").hide();
    $("a.send_batch_ebay").click(function(e){
        var frm=$("form#cash_limit_form");
        var ids=new Array();
        var cash_limit= $(frm).find("#cash_limit").val().replace(",","");
        $(".ebayExportResponse").html("").hide();
        $("input.bookid:checked").each(function(){
            ids.push($(this).attr("value")); 
        });
        //validation
        var msg="";
        if(ids.length==0) {
            msg+="Please select at least one item. <br/>";
        }
        if( $.trim(cash_limit)=="" || isNaN(cash_limit) || parseFloat(cash_limit) <=0 ) {
            msg+="Cash Limit must be a numeric value and greater than 0. <br/>";
        }
        if($.trim(msg)!=""){
            //alert(msg);
            $.facebox('<div style="width:400px; text-align:center;color:red;">'+msg+'</div>');
            e.preventDefault();
            return false;
        }
        $.facebox('<div style="width:200px; text-align:center;"><img src="<?php print site_url("images/loading.gif"); ?>"></div>');
        ////submitting form
        $(frm).find("#ids").attr("value",ids.join(","));
        //console.log($(frm).find("#ids").val());
        var post_={
            ids: $(frm).find("#ids").val(),
            cash_limit : parseFloat(cash_limit)
        };
        //ajax post  
        $.post(
		  '<?php echo config_item('base_url') . 'admin/sendRapDiamondToEbay' ?>',
          post_,
          function(data){
              if(data){
                  $.facebox('<div style="width:200px; text-align:center;">'+data+'</div>');
                  $(".ebayExportResponse").html(data).show();
                  $("#chkBox").attr("checked",false);
                  $("#mywatchfrm .flexigrid .pReload").click();
              }
              else {
                  $.facebox('<div style="width:200px; text-align:center;color:red;">Due to technical problem information cannot be processed. Please try again.</div>');
              }
          });     
    });
    ///check/uncheck items
    $("#chkBox").change(function(){
        var v=$(this).is(":checked");
        $("input.bookid").each(function(){
            $(this).attr("checked",v); 
        });
    });
    $("a.delete_batch_ebay").click(function(e){
        var frm=$("form#cash_limit_form");
        var ids=new Array();
        $(".ebayExportResponse").html("").hide();
        $("input.bookid:checked").each(function(){
            ids.push($(this).attr("value")); 
        });
        //validation
        var msg="";
        if(ids.length==0) {
            msg+="Please select at least one item. <br/>";
        }
        if($.trim(msg)!=""){
            //alert(msg);
            $.facebox('<div style="width:400px; text-align:center;color:red;">'+msg+'</div>');
            e.preventDefault();
            return false;
        }
        $.facebox('<div style="width:200px; text-align:center;"><img src="<?php print site_url("images/loading.gif"); ?>"></div>');
        ////submitting form
        $(frm).find("#ids").attr("value",ids.join(","));
        //console.log($(frm).find("#ids").val());
        var post_={
            ids: $(frm).find("#ids").val()
        };
        //ajax post  
        $.post(
          '<?php print site_url("admin/deleteRapdiamondToEbay"); ?>', 
          post_,
          function(data){
              if(data){
                  $.facebox('<div style="width:200px; text-align:center;">'+data+'</div>');
                  $(".ebayExportResponse").html(data).show();
                  $("#chkBox").attr("checked",false);
                  $("#mywatchfrm .flexigrid .pReload").click();
              }
              else {
                  $.facebox('<div style="width:200px; text-align:center;color:red;">Due to technical problem information cannot be processed. Please try again.</div>');
              }
          });     
    });
});
})(jQuery);
</script>
<p class="selectbkbg">
    <input type="checkbox" value="1" id="chkBox"> <label for="chkBox">Send All Selected to Ebay</label> 
    <input type="hidden" value="" name="lotsnumber" id="lotsnumber">
</p>
<p class="selectbkbg">
    <input type="checkbox" value="1" id="chkb_amazon" onclick="selectedProd('chkb_amazon')"> <label for="chkb_amazon">Send All Selected to Amazon </label> 
    <input type="hidden" value="" name="lotsnumber" id="lotsnumber">
</p>
<p class="selectbkbg">
    <input type="checkbox" value="1" id="chkb_amazon" onclick="selectedProd('chkb_amazon')"> <label for="chkb_amazon">Send All Selected to Amazon Canada </label> 
    <input type="hidden" value="" name="lotsnumber" id="lotsnumber">
</p>
<p class="selectbkbg">
    <input type="checkbox" value="1" id="chkb_sears" onclick="selectedProd('chkb_sears')"> <label for="chkb_sears">Send All Selected to Sears </label> 
    <input type="hidden" value="" name="lotsnumber" id="lotsnumber">
</p>

<div class="ebayExportResponse"></div>
<form name="rapnetstones" method="post" action="<?php echo config_item('base_url')?>admin/searchStones" enctype="multipart/form-data" id="rapnetstones">
                        <table id="results" style="display:none; "></table>
                        </form>
<br/>
<form id="cash_limit_form" action="<?php echo config_item('base_url') . 'admin/sendRapDiamondToEbay'; ?>" method="post" class="sendform" name="cash_limit_form">
Cash Limit:
    <input id="cash_limit" value="500,000" name="cash_limit">
    <input id="lotsnumber_limit" type="hidden" value="" name="lotsnumber_limit">
    <input id="checkbox_type" type="hidden" value="" name="checkbox_type">
    <input id="ids" type="hidden" value="" name="ids">
    <a href="javascript:void(0);" class="send_batch_ebay sendebaybtn">Send all to ebay</a>&nbsp;
    <a style="" href="javascript:void(0);" class="delete_batch_ebay deletebtn">Delete all</a>
</form>
<form id="cash_limit_form1" action="" method="post" name="cash_limit_form1" class="sendform">
Cash Limit:
    <input id="cash_limit" value="5,000,000" name="cash_limit">
    <a href="javascript:void(0);" class="send_batch_amazon sendebaybtn">Send all to Amazon</a>&nbsp;
    <a style="" href="javascript:void(0);" class="delete_batch_ebay deletebtn">Delete all</a>
</form>
<form id="cash_limit_form1" action="" method="post" name="cash_limit_form1" class="sendform">
Cash Limit:
    <input id="cash_limit" value="5,000,000" name="cash_limit">
    <a href="javascript:void(0);" class="send_batch_amazon sendebaybtn">Send all to Amazon Canada</a>&nbsp;
    <a style="" href="javascript:void(0);" class="delete_batch_ebay deletebtn">Delete all</a>
</form>
<form id="cash_limit_form2" action="" method="post" name="cash_limit_form2" class="sendform">
Cash Limit:
    <input id="cash_limit" value="500,000" name="cash_limit">
    <a href="javascript:void(0);" class="send_batch_amazon sendebaybtn">Send all to Sears</a>&nbsp;
    <a style="" href="javascript:void(0);" class="delete_batch_ebay deletebtn">Delete all</a>
</form>
<div>
</div>
    <?php }?>
</div>
</div>
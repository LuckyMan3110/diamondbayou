<style>
.bodytop{/*background: url(../images/bodytop.jpg) no-repeat;*/width: 720px; height: 12px;}
.bodymid{/*background: url(../images/bodymid.jpg) repeat-y;*/ width: 500px; padding: 0px 5px; float:left;background-color: #7A8897;color: #FFFFFF;
    float: left;
    font-family: verdana;
    font-size: 12px;
    padding-left: 10px;background-color:#7A8897;width:100%;display:block;float:right;padding-top:0px;}
.bodymid a{color:#ffffff;}
.bodybottom{/*background:url(../images/bodybottom.jpg) no-repeat;*/width: 720px; height: 12px;}
 
.bodytop_detail{/*background: url(../images/bodytop_detail.jpg) no-repeat;*/width: 850px; height: 12px;}
.bodymid_detail{/*background: url(../images/bodymid_detail.jpg) repeat-y; */width: 850px; padding: 0px 5px;}
.bodymid_detail a{color:#FFFFFF;;}
.bodybottom_detail{/*background:url(../images/bodybottom_detail.jpg) no-repeat;*/width: 850px; height: 12px;}
 .floatl,.lispace,.top_menu_ir,.top_menu_im,.top_menu_il,.atop_menu_ir,.atop_menu_im,.atop_menu_il{font-size:12px;font-family:verdana;float: left; color:#FFFFFF;background-color:#7A8897;padding-left:10px;}
.clear{clear: both;}
 .contentSectionOuter {
  margin-bottom: 0;
  margin-left: auto;
  margin-right: auto;
  margin-top: 0;
  width: 940px;
}
.contentSectionInner {
  float: left;
  text-align: left;
  width: 940px;
}
 .bodytop{/*background: url(../images/bodytop.jpg) no-repeat;*/width: 720px; height: 12px;}
 
</style>

<table style="background-color: #7A8897;">
<tr>
	<td colspan="3">
	<div id="hd" style="background-color: #7A8897;
    color: #FFFFFF;
    float: left;
    font-family: verdana;
    font-size: 12px;
    padding-left: 10px;">Order Submitted Successfully</div>
	</td>
</tr>
<!--<tr>
	<td colspan="3">
	<div id="hd" style="background-color: #7A8897;
    color: #FFFFFF;
    float: left;
    font-family: verdana;
    font-size: 12px;
    padding-left: 10px;">You purchased the following item(s):</div>
	</td>
</tr>-->
<tr>
	<td colspan="3">
	<div id="hd" style="background-color: #C0C2C5;
    font-weight: bold;
    margin-top: 5px;
    padding-left: 5px;
    padding-top: 6px;">You purchased the following item(s):</div>
	</td>
</tr>
<?php 
$this->load->helper('t');
$ringhtml = '';
$threestonehtml = '';
$earringhtml = '';
$diamondstudhtml = '';
$pendenthtml = '';
$threestonependanthtml = '';
$subtotal = 0;
$cchtml='';
$this->load->model('adminmodel');
$orderfrom='';
$cinfo='';
$customerinfo='';
$paymentmethod='';
$loosdiamondhtml='';
//print_r($orderdetail);
foreach ($orderdetail as $item){
	
	$paymentmethod = $item['paymentmethod'];
	$itemcount++;
	switch ($item['addoption']){
		case 'addwatch':
			$details = getWatchByID($item['watchid']);
			$loosdiamondhtml .='<tr>
<td></td>
<td><div class="floatl w200px m2"><br>
																<b>'.$details['productName'].'</b><br>
																'.$details['brand'].' Brand, '.$details['style'].' Style, '.$details['gender'].' Gender '.$details['band'].' Band '.$details['dial'].'-Dial <br>SKU #: '.$details['SKU'].'<br>
																Quantity: '.$item['quantity'].'
														</div></td>
<td><div class="floatl w85px m2 txtright"> $'.$item['price'].' </div></td>
</tr>';
		
			$subtotal = $subtotal + $item['price']*$item['quantity'];
			break;
case 'addloosediamond':
	$details = $this->adminmodel->getDetailsByLot($item['lot'],$orderid);
	$loosdiamondhtml .='<tr>
<td></td>
<td><div class="floatl w200px m2"><br>
																<!-- '.$details['cut'].' cut, '.$details['color'].' color, '.$details['clarity'].' clarity '.$details['shape'].' shape '.$details['carat'].'-Carat Diamond <br>-->Lot #: '.$details['lot'].'<br>
																Quantity: '.$item['quantity'].' 
														</div></td>
<td><div class="floatl w85px m2 txtright"> $'.number_format($item['price']).' </div></td>
</tr>';

	$subtotal = $subtotal + $item['price']*$item['quantity'];
	break;

case 'addtoring':
	$details = $this->adminmodel->getDetailsByLot($item['lot'],$orderid);
	$ring = getAllByStock($item['ringsetting']);
	$ringhtml .= '<tr>
<td></td>
<td><div class="floatl w200px m2"><br>
																<!--'.$details['cut'].' cut, '.$details['color'].' color, '.$details['clarity'].' clarity '.$details['shape'].' shape '.$details['carat'].'-Carat Diamond <br>-->Lot #: '.$details['lot'].'<br>
																Quantity: '.$item['quantity'].' 
														</div></td>
<td><div class="floatl w85px m2 txtright"> $'.number_format($item['price']).' </div></td>
</tr>';
	
	$subtotal = $subtotal + $item['price']*$item['quantity'];

	break;

case 'tothreestone':
	$details = $this->adminmodel->getDetailsByLot($item['lot'],$orderid);
	$sidestone1 = getDetailsByLot($item['sidestone1']);
	$sidestone2 = getDetailsByLot($item['sidestone2']);
	$sidestoneprice = $sidestone1['price'] + $sidestone2['price'];
	$ring = getAllByStock($item['ringsetting']);
	$threestonehtml .= '<tr>
<td></td>
<td><div class="floatl w200px m2"><br>
																<!--'.$details['cut'].' cut, '.$details['color'].' color, '.$details['clarity'].' clarity '.$details['shape'].' shape '.$details['carat'].'-Carat Diamond <br>-->Lot #: '.$details['lot'].'<br>
																Quantity: '.$item['quantity'].'
														</div></td>
<td><div class="floatl w85px m2 txtright"> $'.number_format($item['price']).' </div></td>
</tr>';
	
			$subtotal = $subtotal + $item['price']*$item['quantity'];
	
	
	//$subtotal = $subtotal + $item['totalprice'];
	break;

case 'toearring':
	$esidestone1 = getDetailsByLot($item['sidestone1']);
	$esidestone2 = getDetailsByLot($item['sidestone2']);
	$esidestoneprice = $esidestone1['price'] + $esidestone2['price'];
	$esettings = getEarringSettingsById($item['earringsetting']);
	$earringhtml .= '<tr>
<td></td>
<td><div class="floatl w200px m2"><br>
																<!--'.$details['cut'].' cut, '.$details['color'].' color, '.$details['clarity'].' clarity '.$details['shape'].' shape '.$details['carat'].'-Carat Diamond <br>-->Lot #: '.$details['lot'].'<br>
																Quantity: '.$item['quantity'].'
														</div></td>
<td><div class="floatl w85px m2 txtright"> $'.number_format($item['price']).' </div></td>
</tr>';
	
	$subtotal = $subtotal + $item['price']*$item['quantity'];
	
	
	break;
		
case 'addearringstud':
	$details = getAllByStock($item['studearring']);
	$diamondstudhtml .= '<tr>
<td></td>
<td><div class="floatl w200px m2"><br>
																<!--'.$details['cut'].' cut, '.$details['color'].' color, '.$details['clarity'].' clarity '.$details['shape'].' shape '.$details['carat'].'-Carat Diamond <br>-->Lot #: '.$details['lot'].'<br>
																Quantity: '.$item['quantity'].'
														</div></td>
<td><div class="floatl w85px m2 txtright"> $'.number_format($item['price']).' </div></td>
</tr>';
	
	$subtotal = $subtotal + $item['price']*$item['quantity'];
		
	break;
		
case 'addpendantsetings':
		
	$details = $this->adminmodel->getDetailsByLot($item['lot'],$orderid);
	$setting = getPendentSettingsById($item['pendantsetting']);
	$pendenthtml .= '<tr>
<td></td>
<td><div class="floatl w200px m2"><br>
																<!--'.$details['cut'].' cut, '.$details['color'].' color, '.$details['clarity'].' clarity '.$details['shape'].' shape '.$details['carat'].'-Carat Diamond <br>-->Lot #: '.$details['lot'].'<br>
																Quantity: '.$item['quantity'].'
														</div></td>
<td><div class="floatl w85px m2 txtright"> $'.number_format($item['price']).' </div></td>
</tr>';
	
	$subtotal = $subtotal + $item['price']*$item['quantity'];
	break;
		
case 'addpendantsetings3stone':
		
	$details = $this->adminmodel->getDetailsByLot($item['lot'],$orderid);
	$sidestone1 = getDetailsByLot($item['sidestone1']);
	$sidestone2 = getDetailsByLot($item['sidestone2']);
	$sidestoneprice = $sidestone1['price'] + $sidestone2['price'];
	$setting = getPendentSettingsById($item['pendantsetting']);
	$threestonependanthtml .= '<tr>
<td></td>
<td><div class="floatl w200px m2"><br>
																<!--'.$details['cut'].' cut, '.$details['color'].' color, '.$details['clarity'].' clarity '.$details['shape'].' shape '.$details['carat'].'-Carat Diamond <br>-->Lot #: '.$details['lot'].'<br>
																Quantity: '.$item['quantity'].'
														</div></td>
<td><div class="floatl w85px m2 txtright"> $'.number_format($item['price']).' </div></td>
</tr>';
	
	$subtotal = $subtotal + $item['price']*$item['quantity'];
	break;

default:
	break;
?>

<?php } }
echo $loosdiamondhtml.$ringhtml.$threestonehtml.$earringhtml.$diamondstudhtml.$pendenthtml.$threestonependanthtml;

?>

<?php 
//echo ("micasony".$customer->fname);
?>
			<tr>
<td colspan="3" style="background-color: #C0C2C5;
    font-weight: bold;
    margin-top: 5px;
    padding-left: 5px;
    padding-top: 6px;"><div class="commonheader">Customer Information</div>
</td>
</tr>
<t>
<td colspan="3">
<div class="floatl w350px m2">
														<?php 
														$orderfrom ='	<div class="floatl w350px m2">
															<b>Name: </b>'. $customer->fname.' '.$customer->lname.'													
																<div class="clear"></div>
															<b>Address: </b>'. $customer->address .'
															    <div class="clear"></div>
															<b>Phone : </b>'. $customer->phone.'
															   <div class="clear"></div>
															<b>Email : </b>'.$customer->email.'
															</div>';
														echo $orderfrom;
															//exit;											
															?>
															</div>
</td>
</tr>
<?php //} ?>

<?php ?>
			<tr>

<?php if(isset($shippment->creditcardname)){ ?>

<td colspan="3" style="background-color: #C0C2C5;
    font-weight: bold;
    margin-top: 5px;
    padding-left: 5px;
    padding-top: 6px;"><div class="commonheader">Credit Card Information</div>
</td>
</tr>
<tr>
<td colspan="3">
<div class="floatl w350px m2">
															<b>Credit Card Type: </b><?php echo $shippment->creditcardname;?>													
																<div class="clear"></div>
															<b>Credit Card Number: </b><?php echo $shippment->creditcardno;?>
															    <div class="clear"></div>
															<b>Exp Date : </b><?php echo $shippment->cardexpirydate;?>
															</div>
</td>
</tr>
<?php //} ?>

<?php } 
else {
?>

<td colspan="3" style="background-color: #C0C2C5;
    font-weight: bold;
    margin-top: 5px;
    padding-left: 5px;
    padding-top: 6px;"><div class="commonheader">Payment Option</div>
</td>
</tr>
<tr>
<td colspan="3">
<div class="floatl w350px m2">
															<b>Payment Method: </b><?php echo $paymentmethord?>													
																<div class="clear"></div>
															<b> </b>
															</div>
</td>
</tr>

<?php } ?>

<?php if(isset($shippment->billfname)){ ?>
<tr>
<td colspan="3" style="background-color: #C0C2C5;
    font-weight: bold;
    margin-top: 5px;
    padding-left: 5px;
    padding-top: 6px;"><div class="commonheader">Shipment Information</div>
</td>
</tr>
<tr>
<td colspan="3">
<div class="floatl w350px m2">
															<?php 
														$orderfrom ='	<div class="floatl w350px m2">
															<b>Name: </b>'. $shippment->billfname.' '.$shippment->billlname.'
																	<div class="clear"></div>
																	<b>Address: </b>'. $shippment->billaddress.'
																			<div class="clear"></div>
																			<b>City : </b>'. $shippment->billcity.'
																					<div class="clear"></div>
																					<b>Zip Code : </b>'. $shippment->billpostcode.'
																							<div class="clear"></div>
																							<b>Country : </b>'. $shippment->billcountry.'
															
																									</div>';
														echo $orderfrom;
																										
															?>
															</div>
</td>
</tr>

<?php } ?>
<tr>
<td colspan="3" style="background-color: #C0C2C5;
    font-weight: bold;
    margin-top: 5px;
    padding-left: 5px;
    padding-top: 6px;"><div class="commonheader">Order Status : <?php if($ordersatus == 1) echo 'Confirmed'; else echo'Pending'; ?></div></td>
</tr>

<?php //} 
//exit;
$taxedamount = ($subtotal* 3)/100;

?>

<script>
function uasepay()
{
	$.ajax({ 
        type    : 'POST', 
        url     : '<?php echo config_item('base_url');?>shoppingbasket/usaepay', 
        data    : {'creditcardno' :'<?php echo $shippment->creditcardno;?>',
				   'expmonth' :'<?php echo $shippment->cardexpirydate;?>',
				   'expyear' :'mode',
				   'totalprice' :'<?php echo $taxedamount;?>',
				   'fname' :'<?php $customer->fname ?>',
				   'lname' :'<?php $customer->lname ?>',
				   'address1' :'<?php $customer->address ?>',
				   'cvvcode' :'<?php $shippment->cvvcode ?>',
				  } 
     });//end of ajax function
	document.getElementById('replay').innerHTML=" Product can't find";
}
</script>
<tr>
<?php if($authcode){ ?><td colspan="3" style="background-color: #C0C2C5;
    font-weight: bold;
    margin-top: 5px;
    padding-left: 5px;
    padding-top: 6px;"><div class="commonheader"><a href="<?php echo $this->config->item('base_url');?>usaepay/usepayadmincharge.php?orderid=<?php echo $orderid ?>" onClick="uasepaya()">Charge</a><span id="replay"></span></div></td><?php } ?>
</tr>
</form>
<tr>


<td colspan="3" style="background-color: #C0C2C5;
    font-weight: bold;
    margin-top: 5px;
    padding-left: 5px;
    padding-top: 6px;"><div class="commonheader">Payment Option : </div></td>
</tr>

<tr>
<td></td>
<td></td> <!--
<td style="color: #FFFFFF;
    float: left;
    font-family: verdana;
    font-size: 12px">
<b>Subtotal</b>:<div><b>$<?php echo $subtotal; ?></b></div>
</td>
</tr>
<tr>
<td></td>
<td></td>
<td style="color: #FFFFFF;
    float: left;
    font-family: verdana;
    font-size: 12">
<b> 3% Tax    +   $<?php echo $taxedamount;?></b>:<div ><b>$+   $<?php echo $taxedamount;?></b></div>
</td>
</tr>
<tr>
<td></td>
<td></td> -->
<td style="color: #FFFFFF;
    float: left;
    font-family: verdana;
    font-size: 12">
<b>Total</b>:<div><b>$<?php echo $subtotal//$taxedamount+$subtotal;?></b></div>
</td>
</tr>

</table>

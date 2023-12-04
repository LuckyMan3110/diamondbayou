<?php 
$this->load->helper('t');
$this->load->helper('form');
$attributes = array('method' => 'POST', 'id' => 'frmshoppingcart');
$loosediamond = '';
$viewLooseDiamond = '';
$ring = '';
$threestonering = '';
$earring = '';
$studearring = '';
$watch = '';
$diamondpendant = '';
$threestonependant = '';
$view_shopingcart = '';
$uniqueRingview = '';
$shape_imgurl = config_item('base_url').'images/shapes_images/';

if(!isset($ajax)){
	$this->load->model('Cartmodel');
?>
<style>
.checkout_cols h3{color:#45AB99 !important;}
</style>
<script language="javascript" src="<?php echo SITE_URL; ?>js/common_function.js" type="text/javascript"></script>
<div class="less-height">
	<div class="bread-crumb">
		<div class="breakcrum_bk">
			<ul>
				<li><a href="<?php echo config_item('base_url') ?>">Home1</a></li>
				<li><a href="<?php echo config_item('base_url') ?>">Build Your Own Ring</a></li>
				<li>Check Out</li>
			</ul>
		</div>
		<div class="clear"></div>
	</div> 
	<div class="checkout_block">
		<h4>Shopping Basket</h4>
		<div class="checkout_content">
			<div class="ckleft_content">
				<?php echo form_open(config_item('base_url').'shbasket_wholesale/orderinformation', $attributes)?>
					<div class="">
						<div>
							<div id="carthtml"></div>
<?php } ?>
<?php if(isset($ajax)){ ?>
	<div id="carthtml">
		<?php
		$maintotal = 0;
		$subtotal = 0;
		$ldTotal = 0;
		$rTotal = 0;
		$tsTotal = 0;
		$eTotal = 0;
		$esTotal = 0;
		$pTotal = 0;
		$tspTotal = 0;
		$ld = 0;
		$r = 0;
		$ts = 0;
		$e = 0;
		$es = 0;
		$wh = 0;
		$p = 0;
		$tsp = 0;
		foreach ($mycartitems as $myCartIndex => $item){
			$item_name = isset($item['name'])?$item['name']:get_site_title('contact_info');
			$rapnet_diamnd = $this->Cartmodel->getrapnet_diamond_detail($item['lot']);
			$dmitem_title = isset($rapnet_diamnd[0]['Girdle'])?$rapnet_diamnd[0]['Girdle']:'';
			$item1_price = _nf($item['price']*$item['quantity']);
			$detail_link = config_item('base_url').'diamonds/diamond_detail/';
			$lotstone_detail = $detail_link.$item['lot'].'/'.$item['addoption'].'/';
			switch ($item['addoption']){
				case 'addloosediamond':
					$item['price'] = intval(number_format($item['price'],0,'.',''));
					$item['quantity'] = intval($item['quantity']);
					$details = getDetailsByLot($item['lot']);
					$price = $details['price'];
					if($ld == 0){
						$subtotal = 0;
						$ld = $ld +1;
						if($item['ezpay']=='normal'){ 
							$ezprice = $item['price'];
							$ezpay = 'Best Value - '.$item['price'].' Price after 15% discount when paid by Visa/MC.';
						}elseif($item['ezpay']=='3EZ'){
							$ezprice = $_SESSION['3ez_price']/2;
							$ezprice = number_format($ezprice,0);
							$ezpay = '3 EZ Pay- '.$item['price'].' with 2 EZ payments of '.$ezprice.' No credit check required.';
							$_SESSION['ez3_price'] = $ezprice;
						}elseif($item['ezpay']=='5EZ'){
							$ezprice = $_SESSION['5ez_price']/4;
							$ezprice = number_format($ezprice,0);
							$ezpay = '5 EZ Pay- '.$item['price'].' with 4 EZ payments of '.$ezprice.' No credit check required.';
							$_SESSION['ez5_price'] = $ezprice;
						}
						$ezprice = isset($ezprice)?$ezprice:'';
						$loosediamond .=  '<div class="cartheader">Your Diamond</div> 
						<div style="background-color:#888;">
							<table width="100%">
								<tr class="cartrowodd">
									<td style="width:20px">  <a href="javascript:void(0)" onclick="c = confirm(\'Are you sure delete this item from cart?\'); if(c)deletcartitembyid(\''.$item['id'].'\')" class="underline remove" alt="remove"> </a> </td>
									<td width="30%">Lot:'.$item['lot'].' - '.$item['name'].' :: '.$ezpay.'</td>
									<td width="30%" align="right">$ '.$item['price'].'x<input type="text" id="'.$item['id'].'" class="quantity" name="'.$item['id'].'" value="'.$item['quantity'].'"><a href="javascript:void(0)" onclick="updatecart(\''.$item['id'].'\',\''.$ezprice.'\')" class="underline update" alt="update"> </a></td>
									<td width="20%"align="right">$'.$item['price']*$item['quantity'].'</td> 
								</tr>
							</table>
						</div>';
						$subtotal = $item['price']*$item['quantity'];
						$ldTotal = $subtotal + $ldTotal;
						$maintotal = $maintotal + $subtotal ;
					}elseif ($ld >=1){
						$item['price'] = intval(number_format($item['price'],0,'.',''));
						$item['quantity'] = intval($item['quantity']);
						if($item['ezpay']=='normal'){ 
							$ezprice = $item['price'];
							$ezpay = 'Best Value - '.$item['price'].' Price after 15% discount when paid by Visa/MC.';
						}elseif($item['ezpay']=='3EZ'){ 
							$ezprice = $_SESSION['5ez_price']/2;
							$ezprice = number_format($ezprice,0);
							$ezpay = '3 EZ Pay- '.$item['price'].' with 2 EZ payments of '.$ezprice.' No credit check required.';
							$_SESSION['ez3_price'] = $ezprice;
						}elseif($item['ezpay']=='5EZ'){ 
							$ezprice = $_SESSION['5ez_price']/4;
							$ezprice = number_format($ezprice,0);
							$ezpay = '5 EZ Pay- '.$item['price'].' with 4 EZ payments of '.$ezprice.' No credit check required.';
							$_SESSION['ez5_price'] = $ezprice;
						}
						$ezprice = isset($ezprice)?$ezprice:'';
						$ld = $ld + 1;
						$c = ($ld % 2 == 0) ? 'class="cartroweven"' : 'class="cartrowodd"';
						$item_price = _nf($item['price']*$item['quantity']);
						$loosediamond .= '<tr '.$c.' >
							<td style="width:20px">  <a href="javascript:void(0)" onclick="c = confirm(\'Are you sure delete this item from cart?\'); if(c)deletcartitembyid(\''.$item['id'].'\')" class="underline remove" alt="remove"> </a> </td>
							<td width="30%">Lot:'.$item['lot'].' - '.$item['name'].' :: '.$ezpay.'</td>
							<td width="30%" align="right">$ '.$item['price'].'x <input type="text" id="'.$item['id'].'" class="quantity" name="'.$item['id'].'" value="'.$item['quantity'].'"><a href="javascript:void(0)" onclick="updatecart(\''.$item['id'].'\',\''.$ezprice.'\')" class="underline update" alt="update"> </a></td>
							<td width="20%"align="right">$'.$item_price.'</td> 
						</tr>';
						$subtotal = $item['price']*$item['quantity'];
						$ldTotal = $subtotal + $ldTotal;
						$maintotal = $maintotal + $subtotal ;
					}
				break;

				case 'addjewelry':
					$item['price'] = intval(number_format($item['price'],0,'.',''));
					$item['quantity'] = intval($item['quantity']);

					$details = getDetailsByLot($item['lot']);
					$lotdm_shape = view_shape_value($lot_image, $details['shape']);
					if( !empty($details['fcolor_value']) ) {
						$diam_type = 'Color Diamond';
						$viewdtLink = diamond_detail_link($details['lot'],$item['addoption'],'fancy_color');
					} else {
						$diam_type = 'White Diamond';
						$viewdtLink = diamond_detail_link($details['lot'],'false','');
					}
					$itemName = loose_diamond_title($details);
					$wirePrice = wire_price($item['price']*$item['quantity']);
					$price = isset($details['price'])?$details['price']:0;
					if($ld == 0){
						$subtotal = 0;
						$ld = $ld +1;
						if($item['ezpay']=='normal'){ 
							$ezprice = $item['price'];
							$ezpay = 'Best Value - '.$item['price'].' Price after 15% discount when paid by Visa/MC.';
						}elseif($item['ezpay']=='3EZ'){
							$ezprice = $_SESSION['3ez_price']/2;
							$ezprice = number_format($ezprice,0);
							$ezpay = '3 EZ Pay- '.$item['price'].' with 2 EZ payments of '.$ezprice.' No credit check required.';
							$_SESSION['ez3_price'] = $ezprice;
						}elseif($item['ezpay']=='5EZ'){
							$ezprice = $_SESSION['5ez_price']/4;
							$ezprice = number_format($ezprice,0);
							$ezpay = '5 EZ Pay- '.$item['price'].' with 4 EZ payments of '.$ezprice.' No credit check required.';
							$_SESSION['ez5_price'] = $ezprice;
						}
						$ezprice = isset($ezprice)?$ezprice:'';
						$viewLooseDiamond .= '<div class="cartcontent_box row-fluid">
							<div class="image_leftbk col-sm-2">
								<div><img src="'.$item['image_url'].'" width="146" alt="'.$itemName.'" /></div>
								<div class="viewDt"><a href="'.$viewdtLink.'">View Detail</a></div>
							</div>
							<div class="rightck_subk col-sm-10">
								<table>
									<tr>
										<td colspan="4"><div class="itemTitle">'.$itemName.'</div>
										<div class="itemNo"></div>
										</td>
										<td align="right"><a href="javascript:void(0)" onclick="c = confirm(\'Are you sure delete this item from cart?\'); if(c)deletcartitembyid(\''.$item['id'].'\')" class="underline" alt="remove"><img src="'.config_item('base_url').'img/page_img/remove-item.jpg" alt="" /></a></td>
									</tr>
									<tr>
										<td>Web ID:</td>
										<td>'.$item['lot'].'</td>
										<td>Quantity</td>
										<td>&nbsp;</td>
										<td align="right">
										<input type="text" id="'.$item['id'].'" class="quantity" name="'.$item['id'].'" value="'.$item['quantity'].'" />
										&nbsp;<a href="javascript:void(0)" onclick="updatecart(\''.$item['id'].'\',\''.$ezprice.'\')" class="underline" alt="update">
										<img src="'.config_item('base_url').'img/page_img/update-cart.jpg" alt="" />
										</a>
										</td>
									</tr>
									<tr>
										<td>Type:</td>
										<td>'.$diam_type.'</td>
										<td>Shape</td>
										<td>'.$lotdm_shape.'</td>
										<td>&nbsp;</td>
									</tr>
									<tr class="setcols_label">
										<td>Stones</td>
										<td>Carat</td>
										<td>Measurement</td>
										<td>Price</td>
										<td>Lab</td>
									</tr>
									<tr>
										<td class="setlabel_colr">'.$item['lot'].'</td>
										<td>'.$details['carat'].'</td>
										<td class="setlabel_colr">'.$details['Meas'].'</td>
										<td>$ '._nf(floatval($details['price'])*$item['quantity']).'</td>
										<td><a href="#">'.$details['lab'].'</a></td>
									</tr>
									<tr>
										<td>Price:</td>
										<td>$'.$item1_price.'</td>
										<td>Wire Price:</td>
										<td>$'._nf($wirePrice).'</td>
										<td>&nbsp;</td>
									</tr>
								</table>
							</div>
							<div class="clear"></div>
						</div>
						<div class="clear"></div><br />';
						$subtotal = $wirePrice;
						$ldTotal = $subtotal + $ldTotal;
						$maintotal = $maintotal + $subtotal;
					}elseif ($ld >=1){
						$itemName1 = str_replace(' ','',$item['name']);
						$item['price'] = intval(number_format($item['price'],0,'.',''));
						$item['quantity'] = intval($item['quantity']);
						if($item['ezpay']=='normal'){ 
							$ezprice = $item['price'];
							$ezpay = 'Best Value - '.$item['price'].' Price after 15% discount when paid by Visa/MC.';
						}elseif($item['ezpay']=='3EZ'){ 
							$ezprice = $_SESSION['5ez_price']/2;
							$ezprice = number_format($ezprice,0);
							$ezpay = '3 EZ Pay- '.$item['price'].' with 2 EZ payments of '.$ezprice.' No credit check required.';
							$_SESSION['ez3_price'] = $ezprice;
						}elseif($item['ezpay']=='5EZ'){ 
							$ezprice = $_SESSION['5ez_price']/4;
							$ezprice = number_format($ezprice,0);
							$ezpay = '5 EZ Pay- '.$item['price'].' with 4 EZ payments of '.$ezprice.' No credit check required.';
							$_SESSION['ez5_price'] = $ezprice;
						}
						$ezprice = isset($ezprice)?$ezprice:'';
						$itemPrice = number_format($item['price'],0);
						$itemPriceQty = $item['price']*$item['quantity'];
						$ld = $ld + 1;
						$c = ($ld % 2 == 0) ? 'class="cartroweven"' : 'class="cartrowodd"';

						$viewLooseDiamond .= '<div class="cartcontent_box row-fluid">
							<div class="image_leftbk col-sm-2">
								<div><img src="'.$item['image_url'].'" width="146" alt="'.$itemName.'" /></div>
								<div class="viewDt"><a href="'.$viewdtLink.'">View Detail</a></div>
							</div>
							<div class="rightck_subk col-sm-10">
								<table>
									<tr>
										<td colspan="4"><div class="itemTitle">'.$itemName.'</div>
										</td>
										<td align="right"><a href="javascript:void(0)" onclick="c = confirm(\'Are you sure delete this item from cart?\'); if(c)deletcartitembyid(\''.$item['id'].'\')" class="underline" alt="remove"><img src="'.config_item('base_url').'img/page_img/remove-item.jpg" alt="" /></a></td>
									</tr>
									<tr>
										<td>Web ID:</td>
										<td>'.$item['lot'].'</td>
										<td>Quantity</td>
										<td>&nbsp;</td>
										<td align="right"><input type="text" id="'.$item['id'].'" class="quantity" name="'.$item['id'].'" value="'.$item['quantity'].'" />&nbsp;<a href="javascript:void(0)" onclick="updatecart(\''.$item['id'].'\',\''.$ezprice.'\')" class="underline" alt="update"><img src="'.config_item('base_url').'img/page_img/update-cart.jpg" alt="" /></a></td>
									</tr>
									<tr>
										<td>Type:</td>
										<td>'.$diam_type.'</td>
										<td>Shape</td>
										<td>'.$lotdm_shape.'</td>
										<td>&nbsp;</td>
									</tr>
									<tr class="setcols_label">
										<td>Stones</td>
										<td>Carat</td>
										<td>Measurement</td>
										<td>Price</td>
										<td>Lab</td>
									</tr>
									<tr>
										<td class="setlabel_colr">'.$item['lot'].'</td>
										<td>'.$details['carat'].'</td>
										<td class="setlabel_colr">'.$details['Meas'].'</td>
										<td>$ '._nf(floatval($details['price'])*$item['quantity']).'</td>
										<td><a href="#">'.$details['lab'].'</a></td>
									</tr>
									<tr>
										<td>Price:</td>
										<td>$'.$item1_price.'</td>
										<td>Wire Price:</td>
										<td>$'._nf($wirePrice).'</td>
										<td>&nbsp;</td>
									</tr>
								</table>
							</div>
							<div class="clear"></div>
						</div>
						<div class="clear"></div><br />';
						$subtotal = $wirePrice;
						$ldTotal  = $subtotal + $ldTotal;
						$maintotal  = $maintotal + $subtotal;
					}
				break;

				case 'addunique':
					$item['price'] = intval(number_format($item['price'],0,'.',''));
					$item['quantity'] = intval($item['quantity']);

					$uniqe_dtlink = $item['unique_urlink'];
					$getCateName  = explode("/", $uniqe_dtlink);
					$details = getuniquedetail2(isset($getCateName[5])?$getCateName[5]:'');
					$rowsring = $this->Catemodel->getRingsDetailViaId($item['lot']);
					$details_link = SITE_URL.'testengagementrings/engagement_ring_detail/'.$item['lot'];
					$itemCateName = strtoupper(isset($getCateName[7])?$getCateName[7]:'');
					$iteMetal = str_replace('_',' ',$item['item_metal']);
					$itemSize = str_replace('_','/',$item['dsize']);
					$getRingDMShape = explode('/', isset($details['stone_weight'])?$details['stone_weight']:'');
					$lotdm_shape = view_shape_value($lot_image, isset($getRingDMShape[1])?$getRingDMShape[1]:'');
					$itemName = $itemCateName.' Style Diamond Semi Mount Ring';
					if($item['ezpay']=='normal'){
						$ezprice = $item['price'];
						$ezpay = 'Best Value - '.$item['price'].' Price after 15% discount when paid by Visa/MC.';
					}elseif($item['ezpay']=='3EZ'){
						$ezprice = $_SESSION['3ez_price']/2;
						$ezprice = number_format($ezprice,0);
						$ezpay = '3 EZ Pay- '.$item['price'].' with 2 EZ payments of '.$ezprice.' No credit check required.';
						$_SESSION['ez3_price'] = $ezprice;
					}elseif($item['ezpay']=='5EZ'){
						$ezprice = $_SESSION['5ez_price']/4;
						$ezprice = number_format($ezprice,0);
						$ezpay = '5 EZ Pay- '.$item['price'].' with 4 EZ payments of '.$ezprice.' No credit check required.';
						$_SESSION['ez5_price'] = $ezprice;
					}
					$ezprice = isset($ezprice)?$ezprice:'';
					$engr_price = ( !empty($item['engraved_text']) ? 30 : 0 );
					$price = isset($details['price'])?$details['price']:0;
					if($ld == 0){
						$subtotal = 0;
						$ld = $ld +1;
						$uniqueRingview .= '<div class="cartcontent_box row-fluid">
							<div class="image_leftbk col-sm-2">
								<div><img src="'.$item['image_url'].'" width="146" alt="'.$itemName.'" /></div>
								<div class="viewDt"><a href="'.$details_link.'">View Detail</a></div>
							</div>
							<div class="rightck_subk col-sm-10">
								<table>
									<tr>
										<td colspan="4"><div class="itemTitle">'.$itemName.'</div>
										<div class="itemNo">Item: '.$rowsring['name'].'</div>
										</td>
										<td align="right"><a href="javascript:void(0)" onclick="c = confirm(\'Are you sure delete this item from cart?\'); if(c)deletcartitembyid(\''.$item['id'].'\')" class="underline" alt="remove"><img src="'.config_item('base_url').'img/page_img/remove-item.jpg" alt="" /></a></td>
									</tr>
									<tr>
										<td>Stock Number:</td>
										<td>'.$rowsring['name'].'</td>
										<td>Quantity</td>
										<td>&nbsp;</td>
										<td align="right"><input type="text" id="'.$item['id'].'" class="quantity" name="txt_qty" value="'.$item['quantity'].'" />&nbsp;<a href="javascript:void(0)" onclick="updatecart(\''.$item['id'].'\',\'0\', \'1\')" class="underline" alt="update"><img src="'.config_item('base_url').'img/page_img/update-cart.jpg" alt="" /></a></td>
									</tr>
									<tr>
										<td>Metal:</td>
										<td>'.$iteMetal.'</td>
										<td>Shape</td>
										<td>'.$lotdm_shape.'</td>
										<td>&nbsp;</td>
									</tr>';
									if( $engr_price > 0 ){
										$uniqueRingview .= '<tr>
											<td>Engraved Text:</td>
											<td style="font-family:'.$item['engraved_font'].'">'.$item['engraved_text'].'</td>
											<td></td>
											<td>Engraved Price</td>
											<td>$'.$engr_price.'</td>
										</tr>';
									}
									$uniqueRingview .= '<tr class="setcols_label">
										<td>Stones</td>
										<td>Metal Weight</td>
										<td>Stone Weight</td>
										<td>Ring Size</td>
										<td>Price</td>
									</tr>
									<tr>
										<td class="setlabel_colr">'.$item['lot'].'</td>
										<td>'.$rowsring['metal_weight'].'</td>
										<td class="setlabel_colr">'.$rowsring['stone_weight'].'</td>
										<td>'.$itemSize.'</td>
										<td>$ '._nf(floatval($item['price'])).'</td>
									</tr>';
									$diamond['price'] = 0;
									if( !empty($item['sidestone1']) ) {
										$diamond = getDetailsByLot( $item['sidestone1']);
										$uniqueRingview .= '<tr class="setcols_label">
											<td>Center Stone Stock#</td>
											<td>Carat</td>
											<td>Shape</td>
											<td>Meas.</td>
											<td>Price</td>
										</tr>
										<tr>
											<td class="setlabel_colr">'.$diamond['lot'].'</td>
											<td>'.$diamond['carat'].'</td>
											<td class="setlabel_colr">'.$lotdm_shape.'</td>
											<td>'.$diamond['Meas'].'</td>
											<td>$ '._nf($diamond['price'], 2).'</td>
										</tr>';
									}
									$netTotalCartPrice = ( $item['price'] * $item['quantity']) + $diamond['price'] + $engr_price;
									$uniqueWirePrice = wire_price($netTotalCartPrice);
									$uniqueRingview .= '<tr>
										<td>Price:</td>
										<td>$'._nf($netTotalCartPrice).'</td>
										<td>Wire Price:</td>
										<td>$'._nf($uniqueWirePrice).'</td>
										<td>&nbsp;</td>
									</tr>
								</table>
							</div>
							<div class="clear"></div>
						</div>
						<div class="clear"></div><br />';
						$subtotal = $uniqueWirePrice;
						$maintotal = $maintotal + $subtotal;
					}elseif ($ld >=1){
						$itemName1 = str_replace(' ','',$item['name']);
						$item['price'] = intval(number_format($item['price'],0,'.',''));
						$item['quantity'] = intval($item['quantity']);
						$itemPrice = number_format($item['price'],0);
						$itemPriceQty = $item['price']*$item['quantity'];
						$ld = $ld + 1;
						$c = ($ld % 2 == 0) ? 'class="cartroweven"' : 'class="cartrowodd"';
						$metalWeight = isset($details['metal_weight'])?$details['metal_weight']:'';
						$stoneWeight = isset($details['stone_weight'])?$details['stone_weight']:'';
						$uniqueRingview .= '<div class="cartcontent_box row-fluid">
							<div class="image_leftbk col-sm-2">
								<div><img src="'.$item['image_url'].'" width="146" alt="'.$itemName.'" /></div>
								<div class="viewDt"><a href="'.$uniqe_dtlink.'">View Detail</a></div>
							</div>
							<div class="rightck_subk col-sm-10">
								<table>
									<tr>
										<td colspan="4"><div class="itemTitle">'.$itemName.'</div>
										<div class="itemNo">Item: '.$item['lot'].'</div>
										</td>
										<td align="right"><a href="javascript:void(0)" onclick="c = confirm(\'Are you sure delete this item from cart?\'); if(c)deletcartitembyid(\''.$item['id'].'\')" class="underline" alt="remove"><img src="'.config_item('base_url').'img/page_img/remove-item.jpg" alt="" /></a></td>
									</tr>
									<tr>
										<td>Stock Number:</td>
										<td>'.$item['lot'].'</td>
										<td>Quantity</td>
										<td>&nbsp;</td>
										<td align="right"><input type="text" id="'.$item['id'].'" class="quantity" name="'.$item['id'].'" value="'.$item['quantity'].'" />&nbsp;<a href="javascript:void(0)" onclick="updatecart(\''.$item['id'].'\',\''.$ezprice.'\')" class="underline" alt="update"><img src="'.config_item('base_url').'img/page_img/update-cart.jpg" alt="" /></a></td>
									</tr>
									<tr>
										<td>Metal:</td>
										<td>'.$iteMetal.'</td>
										<td>Shape</td>
										<td>'.$lotdm_shape.'</td>
										<td>&nbsp;</td>
									</tr>';
									if($engr_price > 0){
										$uniqueRingview .= '<tr>
											<td>Engraved Text:</td>
											<td style="font-family:'.$item['engraved_font'].'">'.$item['engraved_text'].'</td>
											<td></td>
											<td>Engraved Price</td>
											<td>$'.$engr_price.'</td>
										</tr>';
									}	
									$uniqueRingview .= '<tr class="setcols_label">
										<td>Stones</td>
										<td>Metal Weight</td>
										<td>Stone Weight</td>
										<td>Ring Size</td>
										<td>Price</td>
									</tr>
									<tr>
										<td class="setlabel_colr">'.$item['lot'].'</td>
										<td>'.$metalWeight.'</td>
										<td class="setlabel_colr">'.$stoneWeight.'</td>
										<td>'.$itemSize.'</td>
										<td>$ '._nf(floatval($item['price'])).'</td>
									</tr>';
									$diamond['price'] = 0;
									if(!empty($item['sidestone1'])){
										$diamond = getDetailsByLot( $item['sidestone1']) ;
										$uniqueRingview .= '<tr class="setcols_label">
											<td>Center Stone Stock#</td>
											<td>Carat</td>
											<td>Shape</td>
											<td>Meas.</td>
											<td>Price</td>
										</tr>
										<tr>
											<td class="setlabel_colr">'.$diamond['lot'].'</td>
											<td>'.$diamond['carat'].'</td>
											<td class="setlabel_colr">'.$lotdm_shape.'</td>
											<td>'.$diamond['Meas'].'</td>
											<td>$ '._nf($diamond['price'], 2).'</td>
										</tr>';
									}
									$netTotalCartPrice = ( $item['price'] * $item['quantity']) + $diamond['price'] + $engr_price;
									$uniqueWirePrice = wire_price($netTotalCartPrice);
									$uniqueRingview .= ' <tr>
										<td>Price:</td>
										<td>$'._nf($netTotalCartPrice).'</td>
										<td>Wire Price:</td>
										<td>$'._nf($uniqueWirePrice).'</td>
										<td>&nbsp;</td>
									</tr>
								</table>
							</div>
							<div class="clear"></div>
						</div>
						<div class="clear"></div><br />';
						$subtotal = $uniqueWirePrice;
						$maintotal  = $maintotal + $subtotal;
					}
				break;

				case 'addwatch':
					$details = $this->jewelrymodel->getWatchByStock($item['lot']);
					$price = $details['price1'];
					$item['price'] = intval(number_format($item['price'],0,'.',''));
					$item['quantity'] = intval($item['quantity']);
					$uniqe_dtlink = SITE_URL.'watches/watches_detail/'.$item['lot'];
					$itemName = $details['productName'].' '.getWatchIdType($details['id_type']).' '.$details['case_diameter'];
					$netTotalCartPrice = ( $price * $item['quantity'] );
					$uniqueWirePrice = wire_price($netTotalCartPrice);
					$ezprice = '';
					$ld = 1;
					$uniqueRingview .= '<div class="cartcontent_box row-fluid">
						<div class="image_leftbk col-sm-2">
							<div><img src="'.$item['image_url'].'" width="146" alt="'.$itemName.'" /></div>
							<div class="viewDt"><a href="'.$uniqe_dtlink.'">View Detail</a></div>
						</div>
						<div class="rightck_subk col-sm-10">
							<table>
								<tr>
									<td colspan="4"><div class="itemTitle">'.$itemName.'</div>
									<div class="itemNo">Item: '.$details['upc'].'</div>
									</td>
									<td align="right"><a href="javascript:void(0)" onclick="c = confirm(\'Are you sure delete this item from cart?\'); if(c)deletcartitembyid(\''.$item['id'].'\')" class="underline" alt="remove"><img src="'.config_item('base_url').'img/page_img/remove-item.jpg" alt="" /></a></td>
								</tr>
								<tr>
									<td>Stock Number:</td>
									<td>'.$setttings['upc'].'</td>
									<td>Quantity</td>
									<td>&nbsp;</td>
									<td align="right"><input type="text" id="'.$item['id'].'" class="quantity" name="'.$item['id'].'" value="'.$item['quantity'].'" />&nbsp;<a href="javascript:void(0)" onclick="updatecart(\''.$item['id'].'\',\''.$price.'\')" class="underline" alt="update"><img src="'.SITE_URL.'img/page_img/update-cart.jpg" alt="" /></a></td>
								</tr>
								<tr>
									<td>Model:</td>
									<td>'.check_empty($details['model_number'], 'NA').'</td>
									<td>Brand:</td>
									<td>'.check_empty($details['brand'], 'NA').'</td>
									<td>&nbsp;</td>
								</tr>';
								$uniqueRingview .= '<tr>
									<td></td>
									<td></td>
									<td>Sale Price:</td>
									<td>$'._nf($netTotalCartPrice).'</td>
									<td>&nbsp;</td>
								</tr>';
							$uniqueRingview .= '</table>
						</div>
						<div class="clear"></div>
					</div>
					<div class="clear"></div><br />';
					$subtotal  = $netTotalCartPrice;
					$maintotal = $maintotal + $subtotal;
				break;

				case 'diamond_bracelet':
					$details = $this->braceletmodel->getBraceleteDetail($item['lot']);
					$price = $item['price'];
					$item['price'] = intval(number_format($item['price'],0,'.',''));
					$item['quantity'] = intval($item['quantity']);
					$uniqe_dtlink = SITE_URL.'braceletsection/bracelet_detail/'.$item['lot'];
					$itemName = $item['name'];
					$netTotalCartPrice = ( $price * $item['quantity'] );
					$uniqueWirePrice = wire_price($netTotalCartPrice);
					$ld = 1;
					$uniqueRingview .= '<div class="cartcontent_box row-fluid">
						<div class="image_leftbk col-sm-2">
							<div><img src="'.$item['image_url'].'" width="146" alt="'.$itemName.'" /></div>
							<div class="viewDt"><a href="'.$uniqe_dtlink.'">View Detail</a></div>
						</div>
						<div class="rightck_subk col-sm-10">
							<table>
								<tr>
									<td colspan="4"><div class="itemTitle">'.$itemName.'</div>
									<div class="itemNo">Item: '.$details['item_number'].'</div>
									</td>
									<td align="right"><a href="javascript:void(0)" onclick="c = confirm(\'Are you sure delete this item from cart?\'); if(c)deletcartitembyid(\''.$item['id'].'\')" class="underline" alt="remove"><img src="'.config_item('base_url').'img/page_img/remove-item.jpg" alt="" /></a></td>
								</tr>
								<tr>
									<td>Stock Number:</td>
									<td>'.$details['item_number'].'</td>
									<td>Quantity</td>
									<td>&nbsp;</td>
									<td align="right"><input type="text" id="'.$item['id'].'" class="quantity" name="'.$item['id'].'" value="'.$item['quantity'].'" />&nbsp;<a href="javascript:void(0)" onclick="updatecart(\''.$item['id'].'\',\''.$price.'\')" class="underline" alt="update"><img src="'.SITE_URL.'img/page_img/update-cart.jpg" alt="" /></a></td>
								</tr>
								<tr>
									<td>Default Metal:</td>
									<td>'.check_empty($details['default_metal'], 'NA').'</td>
									<td>Default Color</td>
									<td>'.check_empty($details['default_color'], 'NA').'</td>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td>PC Casting:</td>
									<td>'.check_empty($details['pc_casting'], 'NA').'</td>
									<td>Stone Break Down:</td>
									<td>'.check_empty($details['stone_break_down'], 'NA').'</td>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td>Diamond CTTW Provided:</td>
									<td>'.check_empty($details['diamond_cttw_provided'], 'NA').'</td>
									<td>Diamond Quality Prices Based at:</td>
									<td>'.check_empty($details['diamond_quality_prices_based'], 'NA').'</td>
									<td>&nbsp;</td>
								</tr>';
								$uniqueRingview .= '<tr>
									<td></td>
									<td></td>
									<td>Sale Price:</td>
									<td>$'._nf($netTotalCartPrice).'</td>
									<td>&nbsp;</td>
								</tr>';
							$uniqueRingview .= '</table>
						</div>
						<div class="clear"></div>
					</div>
					<div class="clear"></div><br />';
					$subtotal  = $netTotalCartPrice;
					$maintotal = $maintotal + $subtotal;
				break;
    
				case 'rolex_watch':
					$details = $this->rolexmodel_new->getRolexWatchDetail($item['lot']);
					$price = $details['price'];
					$item['price'] = intval(number_format($item['price'],0,'.',''));
					$item['quantity'] = intval($item['quantity']);
					$uniqe_dtlink = SITE_URL.'rolexrings/rolex_watch_detail/'.$item['lot'];
					$itemName = $details['title'];
					$netTotalCartPrice = ( $price * $item['quantity'] );
					$uniqueWirePrice = wire_price($netTotalCartPrice);
					$ld = 1;
					$uniqueRingview .= '<div class="cartcontent_box row-fluid">
						<div class="image_leftbk col-sm-2">
							<div><img src="'.$item['image_url'].'" width="146" alt="'.$itemName.'" /></div>
							<div class="viewDt"><a href="'.$uniqe_dtlink.'">View Detail</a></div>
						</div>
						<div class="rightck_subk col-sm-10">
							<table>
								<tr>
									<td colspan="4"><div class="itemTitle">'.$itemName.'</div>
									<div class="itemNo">Item: '.$details['style'].'</div>
									</td>
									<td align="right"><a href="javascript:void(0)" onclick="c = confirm(\'Are you sure delete this item from cart?\'); if(c)deletcartitembyid(\''.$item['id'].'\')" class="underline" alt="remove"><img src="'.config_item('base_url').'img/page_img/remove-item.jpg" alt="" /></a></td>
								</tr>
								<tr>
									<td>Stock Number:</td>
									<td>'.$details['style'].'</td>
									<td>Quantity</td>
									<td>&nbsp;</td>
									<td align="right"><input type="text" id="'.$item['id'].'" class="quantity" name="'.$item['id'].'" value="'.$item['quantity'].'" />&nbsp;<a href="javascript:void(0)" onclick="updatecart(\''.$item['id'].'\',\''.$price.'\')" class="underline" alt="update"><img src="'.SITE_URL.'img/page_img/update-cart.jpg" alt="" /></a></td>
								</tr>
								<tr>
									<td>Metal:</td>
									<td>'.check_empty($details['metal'], 'NA').'</td>
									<td>Material: Accents:</td>
									<td>'.check_empty($details['material_accents'], 'NA').'</td>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td>Watch Type:</td>
									<td>'.check_empty($details['watch_type'], 'NA').'</td>
									<td>Country of Origin:</td>
									<td>'.check_empty($details['country'], 'NA').'</td>
									<td>&nbsp;</td>
								</tr>';
								$uniqueRingview .= '<tr>
									<td></td>
									<td></td>
									<td>Sale Price:</td>
									<td>$'._nf($netTotalCartPrice).'</td>
									<td>&nbsp;</td>
								</tr>';
							$uniqueRingview .= '</table>
						</div>
						<div class="clear"></div>
					</div>
					<div class="clear"></div><br />';
					$subtotal  = $netTotalCartPrice;
					$maintotal = $maintotal + $subtotal;
				break;

				case 'wb_diamond':
				case 'wb_ladies':
				case 'wb_platinum':
				case 'wb_mens':
				case 'wb_studs':
				case 'wb_hoops':
				case 'gemstone':
					$tablesName = getStulerTable( $item['addoption'] );        
					$details = $this->stulleringsmodel->getStulleRingDetail( $item['lot'], $tablesName['product'] );
					$price = $item['price'];
					$item['price'] = intval(number_format($item['price'],0,'.',''));
					$item['quantity'] = intval($item['quantity']);
					$ring_size_var = ( !empty($item['default_ringsize']) ? '/?ring_size='.$item['default_ringsize'] : '' );
					$uniqe_dtlink = SITE_URL.'stuller_new_rings/wbands_diamond_detail/'.$item['lot'].'/'.$item['addoption'].$ring_size_var;
					$itemName = $details['title'];
					$netTotalCartPrice = ( $price * $item['quantity'] );
					$uniqueWirePrice = wire_price($netTotalCartPrice);
					$ld = 1;
					$uniqueRingview .= '<div class="cartcontent_box row-fluid">
						<div class="image_leftbk col-sm-2">
							<div><img src="'.SITE_URL.$item['image_url'].'" width="146" alt="'.$itemName.'" /></div>
							<div class="viewDt"><a href="'.$uniqe_dtlink.'">View Detail</a></div>
						</div>
						<div class="rightck_subk col-sm-10">
							<table>
								<tr>
									<td colspan="4"><div class="itemTitle">'.$itemName.'</div>
									<div class="itemNo">Band Name: '.$tablesName['title'].'</div>
									</td>
									<td align="right"><a href="javascript:void(0)" onclick="c = confirm(\'Are you sure delete this item from cart?\'); if(c)deletcartitembyid(\''.$item['id'].'\')" class="underline" alt="remove"><img src="'.config_item('base_url').'img/page_img/remove-item.jpg" alt="" /></a></td>
								</tr>
								<tr>
									<td>Quality:</td>
									<td>'.$details['quality'].'</td>
									<td>Quantity</td>
									<td>&nbsp;</td>
									<td align="right"><input type="text" id="'.$item['id'].'" class="quantity" name="'.$item['id'].'" value="'.$item['quantity'].'" />&nbsp;<a href="javascript:void(0)" onclick="updatecart(\''.$item['id'].'\',\''.$price.'\')" class="underline" alt="update"><img src="'.SITE_URL.'img/page_img/update-cart.jpg" alt="" /></a></td>
								</tr>
								<tr>
									<td>Title:</td>
									<td>'.check_empty($details['title'], 'NA').'</td>
									<td>Name:</td>
									<td>'.check_empty($details['name'], 'NA').'</td>
									<td>&nbsp;</td>
								</tr>';
								if(!empty($item['dsize'])){
									$uniqueRingview .= '<tr>
										<td>Ring Size:</td>
										<td>'.$item['dsize'].'</td>
										<td></td>
										<td></td>
										<td>&nbsp;</td>
									</tr>';
								}
								$uniqueRingview .= '<tr>
									<td></td>
									<td></td>
									<td>Sale Price:</td>
									<td>$'._nf($netTotalCartPrice).'</td>
									<td>&nbsp;</td>
								</tr>';
							$uniqueRingview .= '</table>
						</div>
						<div class="clear"></div>
					</div>
					<div class="clear"></div><br />';
					$subtotal  = $netTotalCartPrice;
					$maintotal = $maintotal + $subtotal;
				break;

				case 'qualityrings':
					$price = $item['price'];
					$item['price'] = intval(number_format($item['price'],0,'.',''));
					$item['quantity'] = intval($item['quantity']);
					$details = $this->qualitymodel->qualityProductDetail($item['lot']);
					$uniqe_dtlink = SITE_URL.'qualitygoldrings/quality_ring_detail/'.$details['id'];
					$itemName = $details['title'];
					$engr_price = ( !empty($item['engraved_text']) ? 30 : 0 );
					$netTotalCartPrice = ( $item['price'] * $item['quantity']) + $engr_price;
					$uniqueWirePrice = wire_price($netTotalCartPrice);
					$ezprice = '';
					$subtotal = 0;
					$ld = 1;
					$uniqueRingview .= '<div class="cartcontent_box row-fluid">
						<div class="image_leftbk col-sm-2">
							<div><img src="'.QUALITY_IMGS.$details['large_image'].'" width="146" alt="'.$itemName.'" /></div>
							<div class="viewDt"><a href="'.$uniqe_dtlink.'">View Detail</a></div>
						</div>
						<div class="rightck_subk col-sm-10">
							<table>
								<tr>
									<td colspan="4"><div class="itemTitle">'.$itemName.'</div>
									<div class="itemNo">Item: '.$details['Item'].'</div>
									</td>
									<td align="right"><a href="javascript:void(0)" onclick="c = confirm(\'Are you sure delete this item from cart?\'); if(c)deletcartitembyid(\''.$item['id'].'\')" class="underline" alt="remove"><img src="'.config_item('base_url').'img/page_img/remove-item.jpg" alt="" /></a></td>
								</tr>
								<tr>
									<td>Stock Number:</td>
									<td>'.$details['style'].'</td>
									<td>Quantity</td>
									<td>&nbsp;</td>
									<td align="right">
									<input type="text" id="'.$item['id'].'" class="quantity" name="'.$item['id'].'" value="'.$item['quantity'].'" />
									&nbsp;<a href="javascript:void(0)" onclick="updatecart(\''.$item['id'].'\',\''.$price.'\')" class="underline" alt="update">
									<img src="'.SITE_URL.'img/page_img/update-cart.jpg" alt="" />
									</a>
									</td>
								</tr>
								<tr>
									<td>Metal Description:</td>
									<td>'.$details['metal'].'</td>
									<td>Average Weight</td>
									<td>'.$details['average_weight'].'</td>
									<td>&nbsp;</td>
								</tr>';
								if($engr_price > 0){
									$uniqueRingview .= '<tr>
										<td>Engraved Text:</td>
										<td style="font-family:'.$item['engraved_font'].'">'.$item['engraved_text'].'</td>
										<td></td>
										<td>Engraved Price</td>
										<td>$'.$engr_price.'</td>
									</tr>';
								}
								$uniqueRingview .= '<tr>
									<td></td>
									<td></td>
									<td>Sale Price:</td>
									<td>$'._nf($netTotalCartPrice).'</td>
									<td>&nbsp;</td>
								</tr>';
							$uniqueRingview .= '</table>
						</div>
						<div class="clear"></div>
					</div>
					<div class="clear"></div><br />';
					$subtotal = $netTotalCartPrice;
					$maintotal = $maintotal + $subtotal;
				break;

				case 'sterncolectionjewelry':
					$price = $item['price'];
					$item['price'] = intval(number_format($item['price'],0,'.',''));
					$item['quantity'] = intval($item['quantity']);

					$details = $this->davidsternmodel->sternProductDetail($item['lot']);
					$uniqe_dtlink = SITE_URL.'davidsternrings/jewelry_ring_detail/'.$details['id'];
					$ringBoxDesc = str_replace("/", ', ', $details['categories_name']);

					$itemName = $ringBoxDesc; // . ' Item ID: '. $details['item_id'];
					$ringsImg   = STERN_IMGS.$details['item_id'].'.jpg';
					$engr_price = ( !empty($item['engraved_text']) ? 30 : 0 );
					$netTotalCartPrice = ( $item['price'] * $item['quantity']) + $engr_price;
					$uniqueWirePrice = wire_price($netTotalCartPrice);
					$ezprice = '';
					$ld = 1;
					$uniqueRingview .= '<div class="cartcontent_box row-fluid">
						<div class="image_leftbk col-sm-2">
							<div><img src="'.$ringsImg.'" width="146" alt="'.$itemName.'" /></div>
							<div class="viewDt"><a href="'.$uniqe_dtlink.'">View Detail</a></div>
						</div>
						<div class="rightck_subk col-sm-10">
							<table>
								<tr>
									<td colspan="4"><div class="itemTitle">'.$itemName.'</div>
									<div class="itemNo">Item: '.$details['item_id'].'</div>
									</td>
									<td align="right"><a href="javascript:void(0)" onclick="c = confirm(\'Are you sure delete this item from cart?\'); if(c)deletcartitembyid(\''.$item['id'].'\')" class="underline" alt="remove"><img src="'.config_item('base_url').'img/page_img/remove-item.jpg" alt="" /></a></td>
								</tr>
								<tr>
									<td>Stock Number:</td>
									<td>'.$details['item_id'].'</td>
									<td>Quantity</td>
									<td>&nbsp;</td>
									<td align="right"><input type="text" id="'.$item['id'].'" class="quantity" name="'.$item['id'].'" value="'.$item['quantity'].'" />
									&nbsp;<a href="javascript:void(0)" onclick="updatecart(\''.$item['id'].'\',\''.$price.'\')" class="underline" alt="update">
									<img src="'.SITE_URL.'img/page_img/update-cart.jpg" alt="" />
									</a>
									</td>
								</tr>
								<tr>
									<td>Metal Description:</td>
									<td>'.$details['default_metal'].'</td>
									<td>Diamond CCTW</td>
									<td>'.$details['diamond_cctw_provided'].'</td>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td>Ring Size:</td>
									<td>'.$item['default_ringsize'].'</td>
									<td>Finish Level</td>
									<td>'.$item['finish_level'].'</td>
									<td>&nbsp;</td>
								</tr>';
								$uniqueRingview .= '<tr>
									<td></td>
									<td></td>
									<td>Sale Price:</td>
									<td>$'._nf($netTotalCartPrice).'</td>
									<td>&nbsp;</td>
								</tr>';
							$uniqueRingview .= '</table>
						</div>
						<div class="clear"></div>
					</div>
					<div class="clear"></div><br />';
					$subtotal = $netTotalCartPrice;
					$maintotal = $maintotal + $subtotal;
				break;

				case 'heart_diamond_collection':
					$price = $item['price'];
					$item['price'] = intval(number_format($item['price'],0,'.',''));
					$item['quantity'] = intval($item['quantity']);
					$details = $this->davidsternmodel->getSternCollectionDetail($item['lot']);
					$uniqe_dtlink = SITE_URL.'heartjewelrylistings/collection_detail/'.$details['stock_number'];
					$category_name = jewelry_cate_name( $details['category'] );
					$itemName = $category_name . ' ' . $details['metal_purity']. ' Item ID: '. $details['stock_number'];
					$engr_price = ( !empty($item['engraved_text']) ? 30 : 0 );
					$netTotalCartPrice = ( $item['price'] * $item['quantity']) + $engr_price;
					$uniqueWirePrice = wire_price($netTotalCartPrice);
					$ezprice = '';
					$ld = 1;
					$uniqueRingview .= '<div class="cartcontent_box row-fluid">
						<div class="image_leftbk col-sm-2">
							<div><img src="'.$item['image_url'].'" width="146" alt="'.$itemName.'" /></div>
							<div class="viewDt"><a href="'.$uniqe_dtlink.'">View Detail</a></div>
						</div>
						<div class="rightck_subk col-sm-10">
							<table>
								<tr>
									<td colspan="4"><div class="itemTitle">'.$item['name'].'</div>
									<div class="itemNo">Item Style: '.$details['ring_style'].'</div>
									</td>
									<td align="right"><a href="javascript:void(0)" onclick="c = confirm(\'Are you sure delete this item from cart?\'); if(c)deletcartitembyid(\''.$item['id'].'\')" class="underline" alt="remove"><img src="'.config_item('base_url').'img/page_img/remove-item.jpg" alt="" /></a></td>
								</tr>
								<tr>
									<td>Stock Number:</td>
									<td>'.$details['stock_number'].'</td>
									<td>Quantity</td>
									<td>&nbsp;</td>
									<td align="right">
									<input type="text" id="'.$item['id'].'" class="quantity" name="'.$item['id'].'" value="'.$item['quantity'].'" />
									&nbsp;<a href="javascript:void(0)" onclick="updatecart(\''.$item['id'].'\',\''.$price.'\')" class="underline" alt="update">
									<img src="'.SITE_URL.'img/page_img/update-cart.jpg" alt="" />
									</a>
									</td>
								</tr>
								<tr>
									<td>Metal Description:</td>
									<td>'.$details['metal'].'</td>
									<td>Weight</td>
									<td>'.$details['weight'].'</td>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td>Ring Size:</td>
									<td>'.$item['default_ringsize'].'</td>
									<td>Finish Level</td>
									<td>'.$item['finish_level'].'</td>
									<td>&nbsp;</td>
								</tr>';
								if($engr_price > 0){
									$uniqueRingview .= '<tr>
										<td>Engraved Text:</td>
										<td style="font-family:'.$item['engraved_font'].'">'.$item['engraved_text'].'</td>
										<td></td>
										<td>Engraved Price</td>
										<td>$'.$engr_price.'</td>
									</tr>';
								}
								$uniqueRingview .= '<tr>
									<td></td>
									<td></td>
									<td>Sale Price:</td>
									<td>$'._nf($netTotalCartPrice).'</td>
									<td>&nbsp;</td>
								</tr>';
							$uniqueRingview .= '</table>
						</div>
						<div class="clear"></div>
					</div>
					<div class="clear"></div><br />';
					$subtotal = $netTotalCartPrice;
					$maintotal = $maintotal + $subtotal;
				break;

				case 'stullerrings':
					$price = $item['price'];
					$item['price'] = intval(number_format($item['price'],0,'.',''));
					$item['quantity'] = intval($item['quantity']);
					$uniqe_dtlink = SITE_URL.$item['unique_urlink'];
					$details = $this->qualitymodel->stullerRingsDetail($item['lot']);
					$itemName = $details['Description'];
					$engr_price = ( !empty($item['engraved_text']) ? 30 : 0 );
					$netTotalCartPrice = ( $item['price'] * $item['quantity']) + $engr_price;
					$uniqueWirePrice = wire_price($netTotalCartPrice);
					$ezprice = '';
					$subtotal = 0;
					$ld = 1;
					$uniqueRingview .= '<div class="cartcontent_box row-fluid">
						<div class="image_leftbk col-sm-2">
							<div><img src="'.$item['image_url'].'" width="146" alt="'.$itemName.'" /></div>
							<div class="viewDt"><a href="'.$uniqe_dtlink.'">View Detail</a></div>
						</div>
						<div class="rightck_subk col-sm-10">
							<table>
								<tr>
									<td colspan="4"><div class="itemTitle">'.$itemName.'</div>
									<div class="itemNo">Item: '.$details['Sku'].'</div>
									</td>
									<td align="right"><a href="javascript:void(0)" onclick="c = confirm(\'Are you sure delete this item from cart?\'); if(c)deletcartitembyid(\''.$item['id'].'\')" class="underline" alt="remove"><img src="'.config_item('base_url').'img/page_img/remove-item.jpg" alt="" /></a></td>
								</tr>
								<tr>
									<td>Stock Number:</td>
									<td>'.$details['Sku'].'</td>
									<td>Quantity</td>
									<td>&nbsp;</td>
									<td align="right">
									<input type="text" id="'.$item['id'].'" class="quantity" name="'.$item['id'].'" value="'.$item['quantity'].'" />
									&nbsp;<a href="javascript:void(0)" onclick="updatecart(\''.$item['id'].'\',\''.$price.'\')" class="underline" alt="update">
									<img src="'.SITE_URL.'img/page_img/update-cart.jpg" alt="" />
									</a>
									</td>
								</tr>';
								if(!empty($details['RingSize'])){
									$uniqueRingview .= '<tr>
										<td>Ring Size:</td>
										<td>'.$details['RingSize'].'</td>
										<td>Ring Size Type</td>
										<td>'.$details['RingSizeype'].'</td>
										<td>&nbsp;</td>
									</tr>';
								} else {
									$uniqueRingview .= '<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td>&nbsp;</td>
									</tr>';
								}
								$uniqueRingview .= '<tr>
									<td>Weight:</td>
									<td>'._nf($details['Weight'],2).'</td>
									<td>Gram Weight</td>
									<td>'.$details['GramWeight'].'</td>
									<td>&nbsp;</td>
								</tr>';
								if( $engr_price > 0 ){
									$uniqueRingview .= '<tr>
										<td>Engraved Text:</td>
										<td style="font-family:'.$item['engraved_font'].'">'.$item['engraved_text'].'</td>
										<td></td>
										<td>Engraved Price</td>
										<td>$'.$engr_price.'</td>
									</tr>';
								}
								$uniqueRingview .= '<tr>
									<td></td>
									<td></td>
									<td>Sale Price:</td>
									<td>$'._nf($netTotalCartPrice).'</td>
									<td>&nbsp;</td>
								</tr>';
							$uniqueRingview .= '</table>
						</div>
						<div class="clear"></div>
					</div>
					<div class="clear"></div><br />';
					$subtotal = $netTotalCartPrice;
					$maintotal = $maintotal + $subtotal;
				break;

				case 'addtoring':										
					$diamond = getDetailsByLot($item['lot']);
					$dprice = $diamond['price'];
					$ringst_shape = view_shape_value($ringst_img, $diamond['shape']);
					$ringst_image  = $shape_imgurl.$ringst_img;
					$setttings = getAllByRindID($item['ringsetting']);
					$ringset_price = floatval($item['setting_price'])*$item['quantity'];
					$sprice = $item['price'];
					$itemPriceQty = ( ( floatval($dprice)*$item['quantity'] ) + $ringset_price );
					$diamond_detail = $detail_link.$item['lot'].'/'.$item['addoption'].'/'.$item['ringsetting'];
					$ringWirePrice = wire_price($itemPriceQty);
					$ringsImage = $this->Catemodel->getRingsImgViaId($setttings['style_group']);
					$setting_imgurl = config_item('base_url').'scrapper/imgs/'.$ringsImage['ImagePath'];
					if($r == 0){
						$subtotal = 0;
						$r = $r+1;
						$ring .= '<div class="cartcontent_box row-fluid">
							<div class="image_leftbk col-sm-2"><img src="'.$setting_imgurl.'" width="146" alt="'.$item_name.'" /></div>
							<div class="rightck_subk col-sm-10">
								<table>
									<tr>
										<td colspan="3"><div class="itemTitle">'.$setttings['name'].'</div>
										<div class="itemNo">Item: '.$item['ringsetting'].'</div></td>
										<td>&nbsp;</td>
										<td align="right"><a href="javascript:void(0)" onclick="c = confirm(\'Are you sure delete this item from cart?\'); if(c)deletcartitembyid(\''.$item['id'].'\')" class="underline" alt="remove"><img src="'.config_item('base_url').'img/page_img/remove-item.jpg" alt="" /></a></td>
									</tr>
									<tr>
										<td>Stock Number:</td>
										<td>'.$setttings['style_group'].'</td>
										<td>Quantity</td>
										<td>&nbsp;</td>
										<td align="right">
										<input type="text" id="'.$item['id'].'" name="'.$item['id'].'" value="'.$item['quantity'].'" class="quantity" />&nbsp;<a href="javascript:void(0)" onclick="updatecart(\''.$item['id'].'\',\''.$item['price'].'\')" class="underline" alt="update"><img src="'.config_item('base_url').'img/page_img/update-cart.jpg" alt="" /></a></td>
									</tr>
									<tr>
										<td>Metal Type:</td>
										<td>'.str_replace('_',' ',$item['item_metal']).'</td>
										<td>Size:</td>
										<td>'.$item['dsize'].'</td>
										<td>&nbsp;</td>
									</tr>
									<tr>
										<td>Ring Price:</td>
										<td>$'._nf($ringset_price).'</td>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
									</tr>
									<tr class="setcols_label">
										<td>Lot#</td>
										<td>Carat</td>
										<td>Measurement</td>
										<td>Price</td>
										<td>Image</td>
									</tr>
									<tr>
										<td class="setlabel_colr">'.$item['lot'].'</td>
										<td>'.$diamond['carat'].'</td>
										<td class="setlabel_colr">'.$diamond['Meas'].'</td>
										<td>$ '._nf(floatval($dprice)*$item['quantity']).'</td>
										<td><a href="'.$diamond_detail.'"><img src="'.$ringst_image.'" width="50" alt="'.$ringst_shape.'" /></a></td>
									</tr>
									<tr>
										<td>Price:</td>
										<td>$'._nf($itemPriceQty).'</td>
										<td>Wire Price:</td>
										<td>$'._nf($ringWirePrice).'</td>
										<td>&nbsp;</td>
									</tr>
								</table>
							</div>
							<div class="clear"></div>
						</div>
						<div class="clear"></div><br />';
						$subtotal = $ringWirePrice;
						$rTotal = $rTotal + $subtotal;
						$maintotal = $maintotal + $subtotal;
					}elseif($r >=1){
						$r = $r+1;
						$item_raddprice = floatval($sprice)*$item['quantity'];
						$c = ($r % 2 == 0) ? 'class="cartroweven"' : 'class="cartrowodd"';
						$ring .= '<div class="cartcontent_box row-fluid">
							<div class="image_leftbk col-sm-2"><img src="'.$setting_imgurl.'" width="146" alt="'.$item_name.'" /></div>
							<div class="rightck_subk col-sm-10">
								<table>
									<tr>
										<td colspan="3"><div class="itemTitle">'.$setttings['name'].'</div>
										<div class="itemNo">Item: '.$item['ringsetting'].'</div></td>
										<td>&nbsp;</td>
										<td align="right"><a href="javascript:void(0)" onclick="c = confirm(\'Are you sure delete this item from cart?\'); if(c)deletcartitembyid(\''.$item['id'].'\')" class="underline" alt="remove"><img src="'.config_item('base_url').'img/page_img/remove-item.jpg" alt="" /></a></td>
									</tr>
									<tr>
										<td>Stock Number:</td>
										<td>'.$setttings['style_group'].'</td>
										<td>Quantity</td>
										<td>&nbsp;</td>
										<td align="right"><input type="text" id="'.$item['id'].'" name="'.$item['id'].'" value="'.$item['quantity'].'" class="quantity" />&nbsp;<a href="javascript:void(0)" onclick="updatecart(\''.$item['id'].'\',\''.$item['price'].'\')" class="underline" alt="update"><img src="'.config_item('base_url').'img/page_img/update-cart.jpg" alt="" /></a></td>
									</tr>
									<tr>
										<td>Metal Type:</td>
										<td>'.str_replace('_',' ',$item['item_metal']).'</td>
										<td>Size:</td>
										<td>'.$item['dsize'].'</td>
										<td>&nbsp;</td>
									</tr>
									<tr>
										<td>Ring Price:</td>
										<td>$'._nf($ringset_price).'</td>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
									</tr>
									<tr class="setcols_label">
										<td>Lot#</td>
										<td>Carat</td>
										<td>Measurement</td>
										<td>Price</td>
										<td>Image</td>
									</tr>
									<tr>
										<td class="setlabel_colr">'.$item['lot'].'</td>
										<td>'.$diamond['carat'].'</td>
										<td class="setlabel_colr">'.$diamond['Meas'].'</td>
										<td>$ '._nf(floatval($dprice)*$item['quantity']).'</td>
										<td><a href="'.$diamond_detail.'"><img src="'.$ringst_image.'" width="50" alt="'.$ringst_shape.'" /></a></td>
									</tr>
									<tr>
										<td>Price:</td>
										<td>$'._nf($itemPriceQty).'</td>
										<td>Wire Price:</td>
										<td>$'._nf($ringWirePrice).'</td>
										<td>&nbsp;</td>
									</tr>
								</table>
							</div>
							<div class="clear"></div>
						</div>
						<div class="clear"></div><br />';
						$subtotal = $ringWirePrice;
						$rTotal = $rTotal + $subtotal;
						$maintotal = $maintotal + $subtotal ;
					}
				break;

				case 'addtoproduct':
					$diamond = getDetailsByLot($item['lot']);
					$dprice = $diamond['price'];
					$dprice = $item['price'];
					$setttings = getAllByStock($item['ringsetting']);
					$sprice = $item['price'];
					if($r == 0){
						$subtotal = 0;
						$r = $r+1;
						$ring .= '<div class="cartheader">Your Ring  </div>
						<div class="">
							<table width="100%"  >
								<tr class="cartrowodd">
									<td width="15%" valign="top"> 
									<a href="javascript:void(0)" onclick="c = confirm(\'Are you sure delete this item from cart?\'); if(c)deletcartitembyid(\''.$item['id'].'\')" class="underline remove" alt="remove"> </a>
									<a href="javascript:void(0)" onclick="updatecart(\''.$item['id'].'\',\''.$item['price'].'\')" class="underline update" alt="update"> </a><br>
									Quantity: <input type="text" id="'.$item['id'].'" class="quantity" name="'.$item['id'].'" value="'.$item['quantity'].'">
									</td>
									<td width="65%"> 
										<table width="100%">
											<tr>
												<td>Setting:'.$item['ringsetting'].'</td>
												<td align="right">$ '.floatval($sprice)*$item['quantity'].'</td>
											</tr> 
										</table>
									</td>
									<td width="20%" colspan="2" align="right">
										$'.$item['totalprice'].'
									</td>
								</tr>
							</table>
						</td>';
						$subtotal = $item['totalprice'];
						$rTotal = $rTotal + $subtotal;
						$maintotal = $maintotal + $subtotal;
					}elseif($r >=1){
						$r = $r+1;
						$c = ($r % 2 == 0) ? 'class="cartroweven"' : 'class="cartrowodd"';
						$ring .= '<tr '.$c.'>
							<td width="15%" valign="top"> 
							<a href="javascript:void(0)" onclick="c = confirm(\'Are you sure delete this item from cart?\'); if(c)deletcartitembyid(\''.$item['id'].'\')" class="underline remove" alt="remove"> </a>
							<a href="javascript:void(0)" onclick="updatecart(\''.$item['id'].'\',\''.$item['price'].'\')" class="underline update" alt="update"> </a><br>
							Quantity: <input type="text" id="'.$item['id'].'" class="quantity" name="'.$item['id'].'" value="'.$item['quantity'].'"> 
							</td>
							<td width="65%"> 
								<table width="100%">
									<tr>
										<td>Setting:'.$item['ringsetting'].'</td>
										<td align="right">$ '.floatval($sprice).' x '.$item['quantity'].'</td>
										<td align="right">$ '.floatval($sprice)*$item['quantity'].'</td>
									</tr>   
								</table>
							</td>
							<td width="20%" colspan="2" align="right">
							$'.$item['totalprice'].'
							</td>
						</tr>';
						$subtotal = $item['totalprice'];
						$rTotal = $rTotal + $subtotal;
						$maintotal = $maintotal + $subtotal ;
					}
				break;

				case 'tothreestone':
					$diamond = getDetailsByLot($item['lot']);
					$dprice = $diamond['price'];
					$diam_shape = view_shape_value($d1_image, $diamond['shape']);
					$diam_image1 = $shape_imgurl.$d1_image;

					$side1 = getDetailsByLot($item['sidestone1']);
					$s1price = $side1['price'];
					$diam1_shape = view_shape_value($dm1_image, $side1['shape']);
					$diamnd_image1 = $shape_imgurl.$dm1_image;

					$side2 = getDetailsByLot($item['sidestone2']);
					$s2price = $side2['price'];
					$diam2_shape = view_shape_value($dm2_image, $side2['shape']);
					$diamnd_image2 = $shape_imgurl.$dm2_image;

					$build_3stone = $item['stone_type'];
					$default_ringsize = '';
					if($build_3stone == 'unique'){
						$this->load->model('jewelleriesmodel');
						$setting_metal = $item['default_metal'];
						$default_ringsize = $item['default_ringsize'];
						$rowun_dtring = $this->Catemodel->getRingsDetailViaId($item['ringsetting'], $setting_metal, $default_ringsize);
						$sprice= $rowun_dtring['priceRetail'];
						$data['rowun_dtring'] = $rowun_dtring;
						$unique_ringimg = SITE_URL.'scrapper/imgs/'.$rowun_dtring['ImagePath'];
						$thestone_setinglink = config_item('base_url').'site/engagementRingDetail/'.$rowun_dtring['catid'].'/'.$item['ringsetting'];
					} else {
						$setttings = getAllByStock($item['ringsetting']);
						$sprice = $setttings['price'];
						$unique_ringimg = $item['image_url'];
						$thestone_setinglink = config_item('base_url').'jewelry/tothree_stonedetail/'.$item['ringsetting'];
						$setting_metal = ( $setttings['metal'] == 'WhiteGold' ? 'White Gold' : $setttings['metal'] );
					}
					$setingring_size = ( !empty($item['chain_size']) ? $item['chain_size'] : $default_ringsize );
					$lot3stone_link = diamond_detail_link($diamond['lot'],$item['addoption'],$item['ringsetting']);
					$stone1_3stone = diamond_detail_link($side1['lot'],$item['addoption'],$item['ringsetting']);
					$stone2_3stone = diamond_detail_link($side2['lot'],$item['addoption'],$item['ringsetting']);
					$threstone_ringname = $details['style'].' '.$setttings['shape'].' Diamond Engagement Ring';
					$threstone_ringname = ( !empty($threstone_ringname) ?  $threstone_ringname : 'Three-Stone Ring' );
					$itemtitle_3stone = 'Beta 256a Three Stone '.$diam_shape.' Diamond Engagement Ring';
					$threstone_wireprice = wire_price($item['totalprice']);
					if($ts == 0){
						$subtotal = 0;										
						$threestonering .= '<div class="cartcontent_box row-fluid">
							<div class="image_leftbk col-sm-2">
								<div><img src="'.$unique_ringimg.'" width="" alt="'.$item_nm.'" /></div>
								<div class="viewDt"><a href="'.$thestone_setinglink.'">View Detail</a></div>
							</div>
							<div class="rightck_subk col-sm-10">
								<table>
									<tr>
										<td colspan="3"><div class="itemTitle">'.$itemtitle_3stone.'</div>
										<div class="itemNo">Item: '.$item['ringsetting'].'</div>
										</td>
										<td>&nbsp;</td>
										<td align="right"><a href="javascript:void(0)" onclick="c = confirm(\'Are you sure delete this item from cart?\'); if(c)deletcartitembyid(\''.$item['id'].'\')" class="underline" alt="remove"><img src="'.config_item('base_url').'img/page_img/remove-item.jpg" alt="" /></a></td>
									</tr>
									<tr>
										<td>Web ID:</td>
										<td>'.$item['lot'].'</td>
										<td>Quantity</td>
										<td>&nbsp;</td>
										<td align="right"><input type="text" id="'.$item['id'].'" class="quantity" name="'.$item['id'].'" value="'.$item['quantity'].'" /><a href="javascript:void(0)" onclick="updatecart(\''.$item['id'].'\',\''.$item['price'].'\')" class="underline" alt="update"><img src="'.config_item('base_url').'img/page_img/update-cart.jpg" alt="" /></a></td>
									</tr>
									<tr>
										<td>Metal Type:</td>
										<td>'.check_empty($setting_metal,'NA').'</td>
										<td>Ring Size:</td>
										<td>'.$setingring_size.'</td>
										<td>&nbsp;</td>
									</tr>
									<tr class="setcols_label">
										<td>Stones</td>
										<td>Carat</td>
										<td>Measurement</td>
										<td>Price</td>
										<td>Image</td>
									</tr>
									<tr>
										<td class="setlabel_colr">Center Diamond</td>
										<td>'.$diamond['carat'].'</td>
										<td class="setlabel_colr">'.$diamond['Meas'].'</td>
										<td>$ '._nf(floatval($dprice)*$item['quantity']).'</td>
										<td><a href="'.$lot3stone_link.'"><img src="'.$diam_image1.'" width="50" alt="'.$diam_shape.'" /></a><span class="viewdt_link"><a href="'.$lot3stone_link.'">View Detail</a></span></td>
									</tr>
									<tr>
										<td class="setlabel_colr">Side1</td>
										<td>'.$side1['carat'].'</td>
										<td class="setlabel_colr">'.$side1['Meas'].'</td>
										<td>$ '._nf(floatval($s1price)*$item['quantity']).'</td>
										<td><a href="'.$stone1_3stone.'"><img src="'.$diamnd_image1.'" width="50" alt="'.$diam1_shape.'" /></a><span class="viewdt_link"><a href="'.$stone1_3stone.'">View Detail</a></span></td>
									</tr>
									<tr>
										<td class="setlabel_colr">Side2</td>
										<td>'.$side2['carat'].'</td>
										<td class="setlabel_colr">'.$side2['Meas'].'</td>
										<td>$ '._nf(floatval($s2price)*$item['quantity']).'</td>
										<td><a href="'.$stone2_3stone.'"><img src="'.$diamnd_image2.'" width="50" alt="'.$diam2_shape.'" /></a><span class="viewdt_link"><a href="'.$stone2_3stone.'">View Detail</a></span></td>
									</tr>
									<tr>
										<td>Setting: </td>
										<td>'.$item['ringsetting'].' | <a href="'.$thestone_setinglink.'">View Detail</a></td>
										<td>&nbsp;</td>
										<td align="left">$ '._nf(floatval($sprice)*$item['quantity']).'</td>
										<td>&nbsp;</td>
									</tr>
									<tr>
										<td>Price:</td>
										<td>$'.$item1_price.'</td>
										<td>Wire Price</td>
										<td>$'._nf($threstone_wireprice).'</td>
										<td>&nbsp;</td>
									</tr>
								</table>
							</div>
							<div class="clear"></div>
						</div>
						<div class="clear"></div><br />';
						$subtotal = $threstone_wireprice;
						$tsTotal = $tsTotal +$subtotal;
						$maintotal = $maintotal + $subtotal ;
						$ts = $ts +1;
					}elseif ($ts >=0){ 
						$ts = $ts +1;
						$c = ($ts % 2 == 0) ? 'class="cartroweven"' : 'class="cartrowodd"';
						$threestonering .= '<div class="cartcontent_box row-fluid">
							<div class="image_leftbk col-sm-2">
								<div><img src="'.$unique_ringimg.'" width="" alt="'.$item_nm.'" /></div>
								<div class="viewDt"><a href="'.$thestone_setinglink.'">View Detail</a></div>
							</div>
							<div class="rightck_subk col-sm-10">
								<table>
									<tr>
										<td colspan="3"><div class="itemTitle">'.$itemtitle_3stone.'</div>
										<div class="itemNo">Item: '.$item['ringsetting'].'</div>
										</td>
										<td>&nbsp;</td>
										<td align="right"><a href="javascript:void(0)" onclick="c = confirm(\'Are you sure delete this item from cart?\'); if(c)deletcartitembyid(\''.$item['id'].'\')" class="underline" alt="remove"><img src="'.config_item('base_url').'img/page_img/remove-item.jpg" alt="" /></a></td>
									</tr>
									<tr>
										<td>Web ID:</td>
										<td>'.$item['lot'].'</td>
										<td>Quantity</td>
										<td>&nbsp;</td>
										<td align="right"><input type="text" id="'.$item['id'].'" class="quantity" name="'.$item['id'].'" value="'.$item['quantity'].'" /><a href="javascript:void(0)" onclick="updatecart(\''.$item['id'].'\',\''.$item['price'].'\')" class="underline" alt="update"><img src="'.config_item('base_url').'img/page_img/update-cart.jpg" alt="" /></a></td>
									</tr>
									<tr>
										<td>Metal Type:</td>
										<td>'.check_empty($setting_metal,'NA').'</td>
										<td>Ring Size:</td>
										<td>'.$setingring_size.'</td>
										<td>&nbsp;</td>
									</tr>
									<tr class="setcols_label">
										<td>Stones</td>
										<td>Carat</td>
										<td>Measurement</td>
										<td>Price</td>
										<td>Image</td>
									</tr>
									<tr>
										<td class="setlabel_colr">Center Diamond</td>
										<td>'.$diamond['carat'].'</td>
										<td class="setlabel_colr">'.$diamond['Meas'].'</td>
										<td>$ '._nf(floatval($dprice)*$item['quantity']).'</td>
										<td><a href="'.$lot3stone_link.'"><img src="'.$diam_image1.'" width="50" alt="'.$diam_shape.'" /></a><span class="viewdt_link"><a href="'.$lot3stone_link.'">View Detail</a></span></td>
									</tr>
									<tr>
										<td class="setlabel_colr">Side1</td>
										<td>'.$side1['carat'].'</td>
										<td class="setlabel_colr">'.$side1['Meas'].'</td>
										<td>$ '._nf(floatval($s1price)*$item['quantity']).'</td>
										<td><a href="'.$stone1_3stone.'"><img src="'.$diamnd_image1.'" width="50" alt="'.$diam1_shape.'" /></a><span class="viewdt_link"><a href="'.$stone1_3stone.'">View Detail</a></span></td>
									</tr>
									<tr>
										<td class="setlabel_colr">Side2</td>
										<td>'.$side2['carat'].'</td>
										<td class="setlabel_colr">'.$side2['Meas'].'</td>
										<td>$ '._nf(floatval($s2price)*$item['quantity']).'</td>
										<td><a href="'.$stone2_3stone.'"><img src="'.$diamnd_image2.'" width="50" alt="'.$diam2_shape.'" /></a><span class="viewdt_link"><a href="'.$stone2_3stone.'">View Detail</a></span></td>
									</tr>
									<tr>
										<td>Setting: </td>
										<td>'.$item['ringsetting'].' | <a href="'.$thestone_setinglink.'">View Detail</a></td>
										<td>&nbsp;</td>
										<td align="left">$ '._nf(floatval($sprice)*$item['quantity']).'</td>
										<td>&nbsp;</td>
									</tr>
									<tr>
										<td>Price:</td>
										<td>$'.$item1_price.'</td>
										<td>Wire Price</td>
										<td>$'._nf($threstone_wireprice).'</td>
										<td>&nbsp;</td>
									</tr>
								</table>
							</div>
							<div class="clear"></div>
						</div>
						<div class="clear"></div><br />';
						$subtotal = $threstone_wireprice;
						$tsTotal = $tsTotal +$subtotal;
						$maintotal = $maintotal + $subtotal ;
					}
				break;

				case 'toearring':
					$side1 = getDetailsByLot($item['sidestone1']);
					$s1price = $side1['price'];
					$side_shape = view_shape_value($side1_image, $side1['shape']);
					$side_image1 = $shape_imgurl.$side1_image;
					$side1_detail = $detail_link.$side1['lot'].'/'.$item['addoption'].'/'.$item['ringsetting'];

					$side2 = getDetailsByLot($item['sidestone2']);
					$s2price = $side2['price'];
					$side2_shape  = view_shape_value($side2_image, $side2['shape']);
					$side_image2  = $shape_imgurl.$side2_image;
					$side2_detail = $detail_link.$side2['lot'].'/'.$item['addoption'].'/'.$item['ringsetting'];
					if($item['earing_type'] == 'findings') {
						$setttings = $this->findingsmodel->getFindingsRingDetails($item['earringsetting']);
						$vimage_urlink = RINGS_IMAGE.'crone/imgs/'.$setttings['ImagePath'];
						$sprice = $setttings['priceRetail'];
						$earingMetal = $setttings['metal_type'];
						$earingStyle = ucwords( $setttings['head_style_name'] );
						$stud_title = $earingMetal.' Diamond Stud Earrings';
						$ringDetail = config_item('base_url').'site/uniquefindings_detail/'.$setttings['catid'].'/'.$setttings['findings_id'];	
					} else {
						$setttings = getEarringSettingsById($item['earringsetting']);
						$vimage_urlink = config_item('base_url').$setttings['small_image'];
						$sprice = $setttings['price'];
						$earingMetal = metal_label($setttings['metal']);
						$earingStyle = ucwords( str_replace('-', ' ', $setttings['style']) );
						$stud_title = $earingMetal.' Diamond Stud Earrings';
						$ringDetail = config_item('base_url').'jewelry/jewelry_detail/'.$item['earringsetting'];
					}
					$ringDetail = config_item('base_url').'jewelry/jewelry_detail/'.$item['earringsetting'];
					$itemwire_price = wire_price($item['totalprice']);
					if($e == 0){
						$subtotal =0;
						$earring .= '<div class="cartcontent_box row-fluid">
							<div class="image_leftbk col-sm-2">
								<div><img src="'.$vimage_urlink.'" width="146" alt="'.$dmitem_title.'" /></div>
								<div class="viewDt"><a href="'.$ringDetail.'">View Detail</a></div>
							</div>
							<div class="rightck_subk col-sm-10">
								<table>
									<tr>
										<td colspan="3"><div class="itemTitle">'.$stud_title.'</div><div class="itemNo">Item: '.$item['earringsetting'].'</div></td>
										<td>&nbsp;</td>
										<td align="right"><a href="javascript:void(0)" onclick="c = confirm(\'Are you sure delete this item from cart?\'); if(c)deletcartitembyid(\''.$item['id'].'\')" class="underline" alt="remove"><img src="'.config_item('base_url').'img/page_img/remove-item.jpg" alt="" /></a></td>
									</tr>
									<tr>
										<td>Stock Number:</td>
										<td>'.$item['lot'].'</td>
										<td>Quantity</td>
										<td>&nbsp;</td>
										<td align="right"><input type="text" id="'.$item['id'].'" class="quantity" name="'.$item['id'].'" value="'.$item['quantity'].'">&nbsp;<a href="javascript:void(0)" onclick="updatecart(\''.$item['id'].'\',\''.$item['price'].'\')" class="underline" alt="update"><img src="'.config_item('base_url').'img/page_img/update-cart.jpg" alt="" /></a></td>
									</tr>
									<tr>
										<td>Metal Type:</td>
										<td>'.$earingMetal.'</td>';
										if(!empty($earingStyle)) {
											$earring .= '<td>Style</td>
											<td>'.$earingStyle.'</td>';
										}
										$earring .= '<td>&nbsp;</td>
									</tr>
									<tr class="setcols_label">
										<td>Stones</td>
										<td>Carat</td>
										<td>Measurement</td>
										<td>Price</td>
										<td>Image</td>
									</tr>
									<tr>
										<td class="setlabel_colr">Side1</td>
										<td>'.$side1['carat'].'</td>
										<td class="setlabel_colr">'.$side1['Meas'].'</td>
										<td>$ '._nf(floatval($s1price)*$item['quantity']).'</td>
										<td><a href="'.$side1_detail.'"><img src="'.$side_image1.'" width="50" alt="'.$side_shape.'" /></a><span class="viewdt_link"><a href="'.$side1_detail.'">View Detail</a></span></td>
									</tr>
									<tr>
										<td class="setlabel_colr">Side2</td>
										<td>'.$side2['carat'].'</td>
										<td class="setlabel_colr">'.$side2['Meas'].'</td>
										<td>$ '._nf(floatval($s2price)*$item['quantity']).'</td>
										<td><a href="'.$side2_detail.'"><img src="'.$side_image2.'" width="50" alt="'.$side2_shape.'" /></a><span class="viewdt_link"><a href="'.$side1_detail.'">View Detail</a></span></td>
									</tr>
									<tr>
										<td>Setting:</td>
										<td>'.$item['earringsetting'].'</td>
										<td>&nbsp;</td>
										<td>$ '._nf(floatval($sprice)*$item['quantity']).'</td>
										<td>&nbsp;</td>
									</tr>';
									$earring .= '<tr>
										<td>Price:</td>
										<td>$'._nf($item['totalprice']).'</td>
										<td>Wire Price</td>
										<td>$'._nf($itemwire_price).'</td>
										<td>&nbsp;</td>
									</tr>
								</table>
							</div>
							<div class="clear"></div>
						</div>
						<div class="clear"></div><br />';
						$subtotal = $itemwire_price;
						$eTotal = $eTotal + $subtotal;
						$maintotal = $maintotal + $subtotal ;
						$e = $e+1;
					}elseif($e >=1){
						$e = $e+1;
						$c = ($e % 2 == 0) ? 'class="cartroweven"' : 'class="cartrowodd"';
						$earring .= '<div class="cartcontent_box row-fluid">
							<div class="image_leftbk col-sm-2">
								<div><img src="'.$vimage_urlink.'" width="146" alt="'.$dmitem_title.'" /></div>
								<div class="viewDt"><a href="'.$ringDetail.'">View Detail</a></div>
							</div>
							<div class="rightck_subk col-sm-10">
								<table>
									<tr>
										<td colspan="3"><div class="itemTitle">'.$stud_title.'</div><div class="itemNo">Item: '.$item['earringsetting'].'</div></td>
										<td>&nbsp;</td>
										<td align="right"><a href="javascript:void(0)" onclick="c = confirm(\'Are you sure delete this item from cart?\'); if(c)deletcartitembyid(\''.$item['id'].'\')" class="underline" alt="remove"><img src="'.config_item('base_url').'img/page_img/remove-item.jpg" alt="" /></a></td>
									</tr>
									<tr>
										<td>Stock Number:</td>
										<td>'.$item['lot'].'</td>
										<td>Quantity</td>
										<td>&nbsp;</td>
										<td align="right"><input type="text" id="'.$item['id'].'" class="quantity" name="'.$item['id'].'" value="'.$item['quantity'].'">&nbsp;<a href="javascript:void(0)" onclick="updatecart(\''.$item['id'].'\',\''.$item['price'].'\')" class="underline" alt="update"><img src="'.config_item('base_url').'img/page_img/update-cart.jpg" alt="" /></a></td>
									</tr>
									<tr>
										<td>Metal Type:</td>
										<td>'.$earingMetal.'</td>';
										if(!empty($earingStyle)) {
											$earring .= '<td>Style</td>
											<td>'.$earingStyle.'</td>';
										}
										$earring .= '<td>&nbsp;</td>
									</tr>
									<tr class="setcols_label">
										<td>Stones</td>
										<td>Carat</td>
										<td>Measurement</td>
										<td>Price</td>
										<td>Image</td>
									</tr>
									<tr>
										<td class="setlabel_colr">Side1</td>
										<td>'.$side1['carat'].'</td>
										<td class="setlabel_colr">'.$side1['Meas'].'</td>
										<td>$ '._nf(floatval($s1price)*$item['quantity']).'</td>
										<td><a href="'.$side1_detail.'"><img src="'.$side_image1.'" width="50" alt="'.$side_shape.'" /></a><span class="viewdt_link"><a href="'.$side1_detail.'">View Detail</a></span></td>
									</tr>
									<tr>
										<td class="setlabel_colr">Side2</td>
										<td>'.$side2['carat'].'</td>
										<td class="setlabel_colr">'.$side2['Meas'].'</td>
										<td>$ '._nf(floatval($s2price)*$item['quantity']).'</td>
										<td><a href="'.$side2_detail.'"><img src="'.$side_image2.'" width="50" alt="'.$side2_shape.'" /></a><span class="viewdt_link"><a href="'.$side1_detail.'">View Detail</a></span></td>
									</tr>
									<tr>
										<td>Setting:</td>
										<td>'.$item['earringsetting'].'</td>
										<td>&nbsp;</td>
										<td>$ '._nf(floatval($sprice)*$item['quantity']).'</td>
										<td>&nbsp;</td>
									</tr>';
									$earring .= '<tr>
										<td>Price:</td>
										<td>$'._nf($item['totalprice']).'</td>
										<td>Wire Price</td>
										<td>$'._nf($itemwire_price).'</td>
										<td>&nbsp;</td>
									</tr>
								</table>
							</div>
							<div class="clear"></div>
						</div>
						<div class="clear"></div><br />';
						$subtotal = $itemwire_price;
						$eTotal = $eTotal + $subtotal;
						$maintotal = $maintotal + $subtotal;
					}
				break;

				case 'addearringstud':
					$setttings = $this->jewelrymodel->getByStock($item['studearring']);
					$sprice = $setttings['price'];
					if($es == 0){
						$subtotal = 0;
						$studearring .= '<div class="cartheader">Your Diamond Stud Earring</div> 
						<div class="">		
							<table width="100%">
								<tr class = "cartrowodd">
									<td width="20%">  <a href="javascript:void(0)" onclick="c = confirm(\'Are you sure delete this item from cart?\'); if(c)deletcartitembyid(\''.$item['id'].'\')" class="underline remove" alt="remove"> </a> </td>
									<td width="30%">Stud Earring :'.$item['studearring'].'</td>
									<td width="30%" align="right">$ '.floatval($sprice).'x <input type="text" id="'.$item['id'].'" class="quantity" name="'.$item['id'].'" value="'.$item['quantity'].'"><a href="javascript:void(0)" onclick="updatecart(\''.$item['id'].'\',\''.$item['price'].'\')" class="underline update" alt="update"> </a></td>
									<td width="20%"align="right">$'.$item['totalprice'].'</td> 
								</tr>
							</table>
						</div>';
						$subtotal = $item['totalprice'];
						$esTotal = $esTotal + $subtotal;
						$maintotal = $maintotal + $subtotal ;
						$es = $es +1;
					}elseif ($es >=1){
						$es = $es +1;
						$c = ($es % 2 == 0) ? 'class="cartroweven"' : 'class="cartrowodd"';
						$studearring .= '<tr '.$c.'>
							<td width="20%">  <a href="javascript:void(0)" onclick="c = confirm(\'Are you sure delete this item from cart?\'); if(c)deletcartitembyid(\''.$item['id'].'\')" class="underline remove" alt="remove"> </a> </td>
							<td width="30%">Stud Earring :'.$item['studearring'].'</td>
							<td width="30%" align="right">$ '.floatval($sprice).'x <input type="text" id="'.$item['id'].'" class="quantity" name="'.$item['id'].'" value="'.$item['quantity'].'"><a href="javascript:void(0)" onclick="updatecart(\''.$item['id'].'\',\''.$item['price'].'\')" class="underline update" alt="update"> </a></td>
							<td width="20%"align="right">$'.$item['totalprice'].'</td> 
						</tr>';
						$subtotal = $item['totalprice'];
						$esTotal = $esTotal + $subtotal;
						$maintotal = $maintotal + $subtotal;
					}			
				break;

				case 'addpendantsetings':
					$diamond = getDetailsByLot($item['lot']);
					$ringst_shape = view_shape_value($pendant_dmimg, $diamond['shape']);
					$pndt_image  = $shape_imgurl.$pendant_dmimg;

					$dprice = intval(number_format($diamond['price'],0,'.',''));
					$item['quantity'] = intval($item['quantity']);
					$item['totalprice'] = intval(number_format($item['totalprice'],0,'.',''));
					$dmPrice = intval($item['quantity'])*$diamond['price'];

					$setttings = getPendentSettingsById($item['pendantsetting']);
					$sprice = intval(number_format($setttings['price'],0,'.',''));
					$pendant_imgurl = config_item('base_url').$setttings['small_image'];
					$pendantLink = config_item('base_url').'jewelry/pendants_detail/'.$setttings['id'].'/solitaire/'.$setttings['metal'].'/true';
					$pendant_wrprice = wire_price($item['totalprice']);
					$solitiar_title = 'Solitaire '.$setttings['metal'].' Pendant';
					if($p == 0){
						$subtotal = 0;
						$diamondpendant .= '<div class="cartcontent_box row-fluid">
							<div class="image_leftbk col-sm-2">
								<div><img src="'.$pendant_imgurl.'" width="146" alt="'.$dmitem_title.'" /></div>
								<div class="viewDt"><a href="'.$pendantLink.'">View Detail</a></div>
							</div>
							<div class="rightck_subk col-sm-10">
								<table>
									<tr>
										<td colspan="3"><div class="itemTitle"> '.$solitiar_title.'</div><div class="itemNo">Item: '.$item['pendantsetting'].'</div></td>
										<td>&nbsp;</td>
										<td align="right"><a href="javascript:void(0)" onclick="c = confirm(\'Are you sure delete this item from cart?\'); if(c)deletcartitembyid(\''.$item['id'].'\')" class="underline" alt="remove"><img src="'.config_item('base_url').'img/page_img/remove-item.jpg" alt="" /></a></td>
									</tr>
									<tr>
										<td>Web ID:</td>
										<td>'.$item['lot'].'</td>
										<td>Quantity</td>
										<td>&nbsp;</td>
										<td align="right"><input type="text" id="'.$item['id'].'" class="quantity" name="'.$item['id'].'" value="'.$item['quantity'].'">&nbsp;<a href="javascript:void(0)"  onclick="updatecart(\''.$item['id'].'\',\''.$item['price'].'\')" class="underline" alt="update"><img src="'.config_item('base_url').'img/page_img/update-cart.jpg" alt="" /></a></td>
									</tr>
									<tr class="setcols_label">
										<td>Web ID</td>
										<td>Carat</td>
										<td>Measurement</td>
										<td>Price</td>
										<td>Image</td>
									</tr>
									<tr>
										<td class="setlabel_colr">'.$diamond['lot'].'</td>
										<td>'.$diamond['carat'].'</td>
										<td class="setlabel_colr">'.$diamond['Meas'].'</td>
										<td>$ '._nf($dmPrice).'</td>
										<td><a href="'.$lotstone_detail.$item['pendantsetting'].'"><img src="'.$pndt_image.'" width="50" alt="'.$ringst_shape.'" /></a>&nbsp;<span class="viewdt_link"><a href="'.$lotstone_detail.$item['pendantsetting'].'">View Detail</a></span></td>
									</tr>
									<tr>
										<td>Setting:</td>
										<td>'.$item['pendantsetting'].'</td>
										<td>&nbsp;</td>
										<td>$ '._nf($sprice*$item['quantity']).'</td>
										<td>&nbsp;</td>
									</tr>';
									if(!empty($item['item_metal'])) {
										$diamondpendant .= '<tr>
											<td>Metal Type:</td>
											<td>'.$item['item_metal'].'</td>
											<td>&nbsp;</td>
											<td>&nbsp;</td>
											<td>&nbsp;</td>
										</tr>';
									}
									$diamondpendant .= '<tr>
										<td>Price:</td>
										<td>$'.$item1_price.'</td>
										<td>Wire Price:</td>
										<td>$'._nf($pendant_wrprice).'</td>
										<td>&nbsp;</td>
									</tr>
								</table>
							</div>
							<div class="clear"></div>
						</div>
						<div class="clear"></div><br />';
						$subtotal = $pendant_wrprice;
						$pTotal = $pTotal + $subtotal;
						$maintotal = $maintotal + $subtotal ;
						$p = $p+1;
					}elseif($p >=1){
						$p = $p+1;
						$c = ($p % 2 == 0) ? 'class="cartroweven"' : 'class="cartrowodd"';
						$diamondpendant .= '<div class="cartcontent_box row-fluid">
							<div class="image_leftbk col-sm-2">
								<div><img src="'.$pendant_imgurl.'" width="146" alt="'.$dmitem_title.'" /></div>
								<div class="viewDt"><a href="'.$pendantLink.'">View Detail</a></div>
							</div>
							<div class="rightck_subk col-sm-10">
								<table>
									<tr>
										<td colspan="3"><div class="itemTitle"> '.$solitiar_title.'</div><div class="itemNo">Item: '.$item['pendantsetting'].'</div></td>
										<td>&nbsp;</td>
										<td align="right"><a href="javascript:void(0)" onclick="c = confirm(\'Are you sure delete this item from cart?\'); if(c)deletcartitembyid(\''.$item['id'].'\')" class="underline" alt="remove"><img src="'.config_item('base_url').'img/page_img/remove-item.jpg" alt="" /></a></td>
									</tr>
									<tr>
										<td>Web ID:</td>
										<td>'.$item['lot'].'</td>
										<td>Quantity</td>
										<td>&nbsp;</td>
										<td align="right"><input type="text" id="'.$item['id'].'" class="quantity" name="'.$item['id'].'" value="'.$item['quantity'].'">&nbsp;<a href="javascript:void(0)"  onclick="updatecart(\''.$item['id'].'\',\''.$item['price'].'\')" class="underline" alt="update"><img src="'.config_item('base_url').'img/page_img/update-cart.jpg" alt="" /></a></td>
									</tr>
									<tr class="setcols_label">
										<td>Web ID</td>
										<td>Carat</td>
										<td>Measurement</td>
										<td>Price</td>
										<td>Image</td>
									</tr>
									<tr>
										<td class="setlabel_colr">'.$diamond['lot'].'</td>
										<td>'.$diamond['carat'].'</td>
										<td class="setlabel_colr">'.$diamond['Meas'].'</td>
										<td>$ '._nf($dmPrice).'</td>
										<td><a href="'.$lotstone_detail.$item['pendantsetting'].'"><img src="'.$pndt_image.'" width="50" alt="'.$ringst_shape.'" /></a>&nbsp;<span class="viewdt_link"><a href="'.$lotstone_detail.$item['pendantsetting'].'">View Detail</a></span></td>
									</tr>
									<tr>
										<td>Setting:</td>
										<td>'.$item['pendantsetting'].'</td>
										<td>&nbsp;</td>
										<td>$ '._nf($sprice*$item['quantity']).'</td>
										<td>&nbsp;</td>
									</tr>';
									if(!empty($item['item_metal'])) {
										$diamondpendant .= '<tr>
											<td>Metal Type:</td>
											<td>'.$item['item_metal'].'</td>
											<td>&nbsp;</td>
											<td>&nbsp;</td>
											<td>&nbsp;</td>
										</tr>';
									}
									$diamondpendant .= '<tr>
										<td>Price:</td>
										<td>$'.$item1_price.'</td>
										<td>Wire Price:</td>
										<td>$'._nf($pendant_wrprice).'</td>
										<td>&nbsp;</td>
									</tr>
								</table>
							</div>
							<div class="clear"></div>
						</div>
						<div class="clear"></div><br />';
						$subtotal = $pendant_wrprice;
						$pTotal = $pTotal + $subtotal;
						$maintotal = $maintotal + $subtotal ;
					}			
				break;

				case 'addpendantsetings3stone':
					$diamond = getDetailsByLot($item['lot']);
					$dprice = $diamond['price'];
					$diam_shape = view_shape_value($d1_image, $diamond['shape']);
					$diam_image1 = $shape_imgurl.$d1_image;

					$side1 = getDetailsByLot($item['sidestone1']);
					$s1price = $side1['price'];
					$diam1_shape = view_shape_value($dm1_image, $side1['shape']);
					$diamnd_image1 = $shape_imgurl.$dm1_image;

					$side2 = getDetailsByLot($item['sidestone2']);
					$s2price = $side2['price'];
					$diam2_shape = view_shape_value($dm2_image, $side2['shape']);
					$diam2_shape = $shape_imgurl.$dm2_image;

					$setttings = getPendentSettingsById($item['pendantsetting']);
					$sprice = $setttings['price'];
					$pendante_image = config_item('base_url').$setttings['small_image'];
					$centerdm_link = diamond_detail_link($diamond['lot'],$item['addoption'],$item['pendantsetting']);
					$side1_link = diamond_detail_link($side1['lot'],$item['addoption'],$item['pendantsetting']);
					$side2_link = diamond_detail_link($side2['lot'],$item['addoption'],$item['pendantsetting']);
					$ringTitle = 'Beta 256a '.$diam_shape.' Diamond Engagement Ring';
					$pend3stone_wirepr = wire_price($item['totalprice']);
					$pend3stone_detail = config_item('base_url').'jewelry/pendants_detail/'.$item['pendantsetting'].'/threestone/'.$setttings['metal'].'/true';
					if($tsp == 0){
						$subtotal = 0;
						$threestonependant .= '<div class="cartcontent_box row-fluid">
							<div class="image_leftbk col-sm-2">
								<div><img src="'.$pendante_image.'" width="" alt="'.$item_nm.'" /></div>
								<div class="viewDt"><a href="'.$pend3stone_detail.'">View Detail</a></div>
							</div>
							<div class="rightck_subk col-sm-10">
								<table>
									<tr>
										<td colspan="3"><div class="itemTitle">'.$ringTitle.'</div>
										<div class="itemNo">Item: '.$item['pendantsetting'].'</div>
										</td>
										<td>&nbsp;</td>
										<td align="right"><a href="javascript:void(0)" onclick="c = confirm(\'Are you sure delete this item from cart?\'); if(c)deletcartitembyid(\''.$item['id'].'\')" class="underline" alt="remove"><img src="'.config_item('base_url').'img/page_img/remove-item.jpg" alt="" /></a></td>
									</tr>
									<tr>
										<td>Web ID:</td>
										<td>'.$item['lot'].'</td>
										<td>Quantity</td>
										<td>&nbsp;</td>
										<td align="right"><input type="text" id="'.$item['id'].'" class="quantity" name="'.$item['id'].'" value="'.$item['quantity'].'" /><a href="javascript:void(0)" onclick="updatecart(\''.$item['id'].'\',\''.$item['price'].'\')" class="underline" alt="update"><img src="'.config_item('base_url').'img/page_img/update-cart.jpg" alt="" /></a></td>
									</tr>
									<tr>
										<td>Metal Type:</td>
										<td>'.$item['item_metal'].'</td>
										<td>Ring Size:</td>
										<td>'.$item['chain_size'].'</td>
										<td>&nbsp;</td>
									</tr>
									<tr class="setcols_label">
										<td>Stones</td>
										<td>Carat</td>
										<td class="cols_width">Size</td>
										<td>Price</td>
										<td>Image</td>
									</tr>
									<tr>
										<td class="setlabel_colr">Center Diamond</td>
										<td>'.$diamond['carat'].'</td>
										<td class="setlabel_colr">'.$diamond['Meas'].'</td>
										<td>$ '._nf(floatval($dprice)*$item['quantity']).'</td>
										<td><a href="'.$centerdm_link.'"><img src="'.$diam_image1.'" width="50" alt="'.$diam_shape.'" /></a><span class="viewdt_link"><a href="'.$centerdm_link.'">View Detail</a></span></td>
									</tr>
									<tr>
										<td class="setlabel_colr">Side1</td>
										<td>'.$side1['carat'].'</td>
										<td class="setlabel_colr">'.$side1['Meas'].'</td>
										<td>$ '._nf(floatval($s1price)*$item['quantity']).'</td>
										<td><a href="'.$side1_link.'"><img src="'.$diamnd_image1.'" width="50" alt="'.$diam1_shape.'" /></a><span class="viewdt_link"><a href="'.$side1_link.'">View Detail</a></span></td>
									</tr>
									<tr>
										<td class="setlabel_colr">Side2</td>
										<td>'.$side2['carat'].'</td>
										<td class="setlabel_colr">'.$side2['Meas'].'</td>
										<td>$ '._nf(floatval($s2price)*$item['quantity']).'</td>
										<td><a href="'.$side2_link.'"><img src="'.$diam2_shape.'" width="50" alt="'.$diam2_shape.'" /></a><span class="viewdt_link"><a href="'.$side2_link.'">View Detail</a></span></td>
									</tr>
									<tr>
										<td>Setting: </td>
										<td>'.$item['pendantsetting'].' | <a href="'.$pend3stone_detail.'">View Detail</a></td>
										<td>&nbsp;</td>
										<td align="left">$ '._nf(floatval($sprice)*$item['quantity']).'</td>				
										<td>&nbsp;</td>
									</tr>
									<tr>
										<td>Price:</td>
										<td>$'.$item1_price.'</td>
										<td>Wire Price</td>
										<td>'._nf($pend3stone_wirepr).'</td>
										<td>&nbsp;</td>
									</tr>
								</table>
							</div>
							<div class="clear"></div>
						</div>
						<div class="clear"></div><br />';
						$subtotal = $pend3stone_wirepr;
						$tspTotal = $tspTotal + $subtotal;
						$maintotal = $maintotal + $subtotal ;
						$tsp = $tsp +1;
					}elseif ($tsp >=0){
						$tsp = $tsp +1;
						$c = ($tsp % 2 == 0) ? 'class="cartroweven"' : 'class="cartrowodd"';								
						$threestonependant .= '<div class="cartcontent_box" row-fluid>
							<div class="image_leftbk col-sm-2">
								<div><img src="'.$pendante_image.'" width="" alt="'.$item_nm.'" /></div>
								<div class="viewDt"><a href="'.$pend3stone_detail.'">View Detail</a></div>
							</div>
							<div class="rightck_subk col-sm-10">
								<table>
									<tr>
										<td colspan="3"><div class="itemTitle">'.$setttings['description'].'</div>
										<div class="itemNo">Item: '.$item['pendantsetting'].'</div>
										</td>
										<td>&nbsp;</td>
										<td align="right"><a href="javascript:void(0)" onclick="c = confirm(\'Are you sure delete this item from cart?\'); if(c)deletcartitembyid(\''.$item['id'].'\')" class="underline" alt="remove"><img src="'.config_item('base_url').'img/page_img/remove-item.jpg" alt="" /></a></td>
									</tr>
									<tr>
										<td>Web ID:</td>
										<td>'.$item['lot'].'</td>
										<td>Quantity</td>
										<td>&nbsp;</td>
										<td align="right"><input type="text" id="'.$item['id'].'" class="quantity" name="'.$item['id'].'" value="'.$item['quantity'].'" /><a href="javascript:void(0)" onclick="updatecart(\''.$item['id'].'\',\''.$item['price'].'\')" class="underline" alt="update"><img src="'.config_item('base_url').'img/page_img/update-cart.jpg" alt="" /></a></td>
									</tr>
									<tr>
										<td>Metal Type:</td>
										<td>'.$item['item_metal'].'</td>
										<td>Chain Size:</td>
										<td>'.$item['chain_size'].'</td>
										<td>&nbsp;</td>
									</tr>
									<tr class="setcols_label">
										<td>Stones</td>
										<td>Carat</td>
										<td class="cols_width">Size</td>
										<td>Price</td>
										<td>Image</td>
									</tr>
									<tr>
										<td class="setlabel_colr">'.$diamond['lot'].'</td>
										<td>'.$diamond['carat'].'</td>
										<td class="setlabel_colr">'.$diamond['Meas'].'</td>
										<td>$ '._nf(floatval($dprice)*$item['quantity']).'</td>
										<td><a href="'.diamond_detail_link($diamond['lot'],$item['addoption'],$item['pendantsetting']).'"><img src="'.$diam_image1.'" width="50" alt="'.$diam_shape.'" /></a></td>
									</tr>
									<tr>
										<td class="setlabel_colr">'.$side1['lot'].'</td>
										<td>'.$side1['carat'].'</td>
										<td class="setlabel_colr">'.$side1['Meas'].'</td>
										<td>$ '._nf(floatval($s1price)*$item['quantity']).'</td>
										<td><a href="'.diamond_detail_link($side1['lot'],$item['addoption'],$item['pendantsetting']).'"><img src="'.$diamnd_image1.'" width="50" alt="'.$diam1_shape.'" /></a></td>
									</tr>
									<tr>
										<td class="setlabel_colr">'.$side2['lot'].'</td>
										<td>'.$side2['carat'].'</td>
										<td class="setlabel_colr">'.$side2['Meas'].'</td>
										<td>$ '._nf(floatval($s2price)*$item['quantity']).'</td>
										<td><a href="'.diamond_detail_link($side2['lot'],$item['addoption'],$item['pendantsetting']).'"><img src="'.$diam2_shape.'" width="50" alt="'.$diam2_shape.'" /></a></td>
									</tr>
									<tr>
										<td>Setting: </td>
										<td>'.$item['pendantsetting'].'</td>
										<td>&nbsp;</td>
										<td align="left">$ '._nf(floatval($sprice)*$item['quantity']).'</td>				
										<td>&nbsp;</td>
									</tr>
									<tr>
										<td>Price:</td>
										<td>$'.$item1_price.'</td>
										<td>Wire Price</td>
										<td>'._nf($item['totalprice']).'</td>
										<td>&nbsp;</td>
									</tr>
								</table>
							</div>
							<div class="clear"></div>
						</div>
						<div class="clear"></div><br />';
						$subtotal = $pend3stone_wirepr;
						$tspTotal = $tspTotal + $subtotal;
						$maintotal = $maintotal + $subtotal ;
					}
				break;

				default:
				break;
			}
		}

		if($ld >0){
			echo $viewLooseDiamond;
		}
		if($r >0){
			echo $ring;
		}
		if($ts >0){
			echo $threestonering;
		}
		if($e>0){
			echo $earring;
		}
		if($es >0){
			echo $studearring;
		}
		if($wh >0){
			echo $watch;
		}
		if( !empty($uniqueRingview) ) {
			echo $uniqueRingview;
		}
		if($p >0){
			$diamondpendant .= '<div class="clear"></div>
			<div class="dbr"></div>';
			echo $diamondpendant;
		}
		if($tsp >0){
			echo $threestonependant;
		}
		if($ld == 0 && $r == 0 && $ts == 0 && $e == 0 && $es == 0 && $wh == 0 && $p == 0 && $tsp == 0){
			echo '<center> <b>Shopping Cart is Empty</b> </center>';
		}
	else {
	?>
        
        <div class="checkout_row row-fluid">
        	<div class="checkout_cols col-sm-4">
            	<div class="giftIcon">Gift Options available</div>
<!--                <div class="link_view"><a href="#">Show</a></div><br><br><br>-->
                <div>Gift Card or Reference Code</div>
<!--                <div class="link_view"><a href="#">Add</a></div><br><br><br>                -->
            </div>
            <div class="checkout_cols col-sm-4">
            	<h3>Shipping</h3>
                <div class="shiping_row">
                    <span>Order BY </span>
                    <span>2 PM PT Today</span>
                </div>
                <div class="shiping_row">
                    <span>Receive By </span>
                    <span><?php echo nextDate(); ?></span>
                </div>
                <div class="shiping_row">
                    <span>VIA</span>
                    <span>Fedex</span>
                </div>
                <br><br>
<!--                <div>View our <a href="#">shipping polices</a> and <a href="#">expedite</a> options. <a href="<?php echo config_item('base_url'); ?>site/page/contactus">Contact us</a> to learn about saturday shipping</div>-->
            </div>
            <div class="checkout_cols col-sm-4">
            <h3>Total</h3>
            	<div class="shiping_row">
                    <span>Total </span>
                    <span>$<?php echo _nf($maintotal); ?></span>
                </div>
                <div class="shiping_row">
                    <span>Fedex Shipping </span>
                    <span>Free</span>
                </div>
                <div class="shiping_row">
                    <span>Sales Tax* </span>
                    <span>$0.00</span>
                </div><br>
                <div class="shiping_row">
                    <span>Total Amount</span>
                    <span>$<?php echo _nf($maintotal); ?></span>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="further_dtrow row-fluid">
        	<div class="checkout_cols col-sm-4">
            <h3>Need Assistance</h3>
            	<div>
                	<!--<span class="liveChat">Live Chat</span>-->
                    <span class="contactNo"><?php echo get_site_title('contact_info'); ?></span>
                    <span class="emailUs"><a href="#javascript" class="js__p_another_start">Email Us</a></span>
                </div>
            </div>
            <div class="checkout_cols col-sm-4">
            	<div><span class="secure_ckout">Secure Chekout</span></div>
                <div>Shopping is always <a href="#">safe and secure</a></div>
            </div>
            <div class="checkout_cols ckout_blck col-sm-4">
            	<div class="addition_notes">*Sales Tax is collected for orders shipped to <?php echo getSalesTaxCount(); ?> ouside the United States.</div>
                <br>
            </div>
             <div class="clear"></div>
             <div class="col-sm-5"><a href="<?php echo SITE_URL; ?>" class="add_to_setting" id="addtoshopping">Continue Shopping</a></div>
                <div class="ckout_buton col-sm-6 pull-right text-right">                    
                    <input type="image" src="<?php echo $imgurl_path; ?>ckout_button.jpg" class="" value="" name="checkout">
                </div>
             <div class="clear"></div><br>
        </div>
        
        <?php
		$view_shopingcart .= '<div class="clear"></div><br />';
        $view_shopingcart .= '<div class="checkout_bk">
        <div class="giftLable">Gift Certificate/Optional Code:</div>
        <div class="checkout_cart">
        	<div class="redeem_codefield"><input type="text" name="txt_rdcode" class="redeem_field" />&nbsp;<img src="'.config_item('base_url').'img/page_img/rdeem.jpg" alt="" /></div>
            <div class="ckout_box">
            	<div class="rowtext"><label>Total:</label> <span>$'._nf($maintotal).'</span></div>
                <div class="clear"></div>
                <div class="rowtext evenRow"><label>Wire Total:</label> <span>$'._nf($maintotal).'</span></div>
                <div class="clear"></div><br/>                
            </div>
            <div><input type="image" src="'.config_item('base_url').'img/page_img/check_outcart.jpg" class="" value="" name="checkout"></div>
        </div>
        <div class="clear"></div>
        </div>';
		$seez3_price = isset($_SESSION['ez3_price'])?$_SESSION['ez3_price']:'';
		$seez5_price = isset($_SESSION['ez5_price'])?$_SESSION['ez5_price']:'';
		$view_shopingcart .= ' 
					<div class="floatl column">
						 <input type="hidden" name="totalprice" id="totalprice" value="'. $maintotal.'"> 
						 <input type="hidden" name="ez3_price" id="ez3_price" value="'. $seez3_price.'">
						 <input type="hidden" name="ez5_price" id="ez5_price" value="'. $seez5_price.'">  
						 <!--<input type="submit" class="tbutton3" value="check out to continue" name="checkout">-->
						 <!--<input type="submit" class="tbutton2" value="Update Basket" name="updatebasket">-->
					</div>
				
					<!--<div class="floatl column"><span class="floatr"><b>Total Price: $'.$maintotal.'</b></span></div>-->
					<div class="clear"></div>';
					//echo $view_shopingcart;
					
	} 
?>
</div>
<?php	
	}
    if(!isset($ajax)){  	
?>  	
		<!--<table><tr class=""><td></td> </tr> </table>-->
		
	
        
  </div>
</div>
<?php echo form_close();?> 
</div>

    </div>
<div class="clear"></div>
</div>

<div class="clear"></div>

<?php }?>
<div class="clear"></div>
<script>
    $(function() {
        ////// call popup scirpt
        $(".js__p_start, .js__p_another_start").simplePopup();
    });
        
    </script>
    <!-- second popup block -->
    <div class="p_body js__p_body js__fadeout"></div>
      <div class="popup js__another_popup js__slide_top"> <a href="#" class="p_close js__p_close" title="As an Expert"> <span></span><span></span> </a>
        <form name="askExpertForm" id="askExpertForm" method="post" action="#">
          <div class="p_content">
            <div class="popupHeading">Ask an Expert&nbsp;<span class="expertVdMessage"></span></div>
            <div class="formArea">
              <div class="fieldBlock">
                <div class="fLabel">Name</div>
                <div class="columnSection">
                  <input type="text" name="exprt_fname" id="exprt_fname" />
                  <br />
                  <span>First Name</span> </div>
                <div class="columnSection">
                  <input type="text" name="exprt_lname" id="exprt_lname" />
                  <br />
                  <span>Last Name</span> </div>
                <div class="clear"></div>
              </div>
              <div class="fieldBlock">
                <div class="fLabel">Email</div>
                <div>
                  <input type="text" name="exprt_email" id="exprt_email" class="fullTextField" />
                </div>
              </div>
              <div class="fieldBlock">
                <div class="fLabel">Phone No.</div>
                <div>
                  <input type="text" name="exprt_pno" id="exprt_pno" class="" />
                </div>
              </div>
              <div class="fieldBlock">
                <div class="fLabel">How did you hear about us?</div>
                <div>
                  <select name="exprt_hear" id="exprt_hear">
                    <option value="">Select</option>
                    <option>Search Engine</option>
                    <option>Yahoo</option>
                    <option>Bing</option>
                    <option>Google</option>
                    <option>Friends</option>
                    <option>Family</option>
                    <option>Other Sources</option>
                  </select>
                </div>
              </div>
              <div class="fieldBlock">
                <div class="fLabel">Description</div>
                <div class="">
                  <textarea name="exprt_desc" id="exprt_desc"></textarea>
                </div>
              </div>
              <div class="fieldBlock">
              <input type="hidden" name="details_link" id="details_link" value="#">
                <input type="button" name="btn_exsubmit" class="btnStyle" onclick="askExperForm()" value="Submit" />
              </div>
            </div>
          </div>
        </form>
      </div>
      <!-- popup blocks end! --> 
<?php 
echo featured_inlinks(); 
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
?>
<!-- start body content -->
<br><br>
<div class="body_content">
	<div class="leftmenu_bk">
		<?php echo wholeSalerLeftMenu(); ?>
    </div>
	<?php echo form_open(config_item('base_url').$contr_name.'/selectpaymentmethod', $attributes)?>
		<div class="rightmenu_bk">
			<h2>My Account > <span class="setSubLabel">My Cart</span></h2><br>
			<div class="mycart">
				<table>
					<tr>
						<td>Qty</td>
						<td>Item</td>
						<td>Description</td>
						<td>Item Price</td>
						<td>Total</td>
						<td>Action</td>
					</tr>
					<?php
					$maintotal = 0;
					$subtotal = 0;
					$diamondTotal = 0;
					$viewshoping_cart = '';
					$flag = 'true';
					if( count($mycartitems) > 0 ){
						foreach ($mycartitems as $myCartIndex => $item){
							$item_name = isset($item['name'])?$item['name']:'Yadegar Diamonds';
							$detail_link = config_item('base_url').'diamonds/diamond_detail/';
							switch ($item['addoption']){	
								case 'addunique':
									$item['price'] = intval(number_format($item['price'],0,'.',''));
									$item['quantity'] = intval($item['quantity']);

									$uniqe_dtlink = str_replace('?', '',$item['unique_urlink']);
									$details = getuniquedetail2($item['lot']); /// get unique rings detail
									$iteMetal = str_replace('_',' ',$item['item_metal']);
									$itemSize = str_replace('_','/',$item['dsize']);
									$itemName = $item_name.' Style Diamond Semi Mount Ring';
									$engr_price = ( !empty($item['engraved_text']) ? 30 : 0 );
									$netTotalCartPrice = $item['totalprice'] + $engr_price;
									$uniqueWirePrice = wire_price($netTotalCartPrice);
									$viewName = isset($details['name'])?$details['name']:$item_name;
									$uniqueRingview .= '<tr>
										<td>'.$item['quantity'].'</td>
										<td><div><img src="'.$item['image_url'].'" width="146" alt="'.$itemName.'" /></div>
										<div class="viewDt">'.$viewName.'</div></td>
										<td>'.$itemName.'</td>
										<td>$'.$netTotalCartPrice.'</td>
										<td>$'.$netTotalCartPrice.'</td>
										<td><a href="javascript:void(0)" onclick="c = confirm(\'Are you sure delete this item from cart?\'); if(c)deletcartitembyid(\''.$item['id'].'\', \''.$contr_name.'\')">Delete</a></td>
									</tr>';
									$subtotal = $netTotalCartPrice;
									$maintotal = $maintotal + $subtotal;
								break;

								case 'addjewelry':
									$item['price'] = intval(number_format($item['price'],0,'.',''));
									$item['quantity'] = intval($item['quantity']);
									$details = getDetailsByLot($item['lot']);
									if( !empty($details['fcolor_value']) ) {
										$diam_type = 'Color Diamond';
										$viewdtLink = diamond_detail_link($details['lot'],$item['addoption'],'fancy_color');
									} else {
										$diam_type = 'White Diamond';
										$viewdtLink = diamond_detail_link($details['lot'],'false','');
									}
									$itemName = loose_diamond_title($details);
									$wirePrice = wire_price($item['price']*$item['quantity']);
									$uniqueRingview .= '<tr>
										<td>'.$item['quantity'].'</td>
										<td><div><img src="'.$item['image_url'].'" width="146" alt="'.$itemName.'" /></div>
										<div class="viewDt">'.$diam_type.'</div></td>
										<td>'.$itemName.'</td>
										<td>$'._nf($item['totalprice'], 2).'</td>
										<td>$'._nf($item['totalprice'], 2).'</td>
										<td><a href="javascript:void(0)" onclick="c = confirm(\'Are you sure delete this item from cart?\'); if(c)deletcartitembyid(\''.$item['id'].'\', \''.$contr_name.'\')">Delete</a></td>
									</tr>';
									$subtotal = $item['price']*$item['quantity'];
									$maintotal = $maintotal + $subtotal;
								break;
							}
						}
						$total_wireprice = wire_price($maintotal);
						$viewshoping_cart .= $uniqueRingview;
						$viewshoping_cart .= '<tr>
							<td>&nbsp;</td>
							<td colspan="2">Total:</td>
							<td>$'._nf($maintotal, 2).'</td>
							<td>$'._nf($maintotal, 2).'</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td colspan="2">Wire Total:</td>
							<td>$'._nf($total_wireprice, 2).'</td>
							<td>$'._nf($total_wireprice, 2).'</td>
							<td>&nbsp;</td>
						</tr>';
					} else {
						$flag = '';
						$viewshoping_cart .= '<tr><td colspan="6"><div class="shoping_cartempt"><br>Your cart is empty.<br></div></td></tr>';
					}
					echo $viewshoping_cart;
					?>
				</table>
				<?php
				if( $flag != '') {
					echo '<br><br>
					<div class="cartsButon">
						<div>
							<a href="'.SITE_URL.'rings/ringsMainCategory/7" class="buttonStyle">Continue Shopping</a>&nbsp;&nbsp;&nbsp;
							<input type="submit" class="buttonStyle" value="Checkout" name="checkout">
						</div>
					</div>';	
				}
				?>
				<br><br>
				<div class="notesLable">* Total metal and stone weights are approximate values.<br>* Prices are approximate based on STK sizes.</div>
			</div>
		</div>
	<?php echo form_close();?> 
	<div class="clear"></div>
</div>
<!-- end body content -->
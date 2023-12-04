<style>
body {
	background:#191B1A !important;
}
.bodytop {/*background: url(../images/bodytop.jpg) no-repeat;*/
	width: 720px;
	height: 12px;
}
.bodymid {/*background: url(../images/bodymid.jpg) repeat-y;*/
	width: 500px;
	padding: 0px 5px;
	float:left;
	background-color: #7A8897;
	color: #FFFFFF;
	float: left;
	font-family: verdana;
	font-size: 12px;
	padding-left: 10px;
	background-color:#7A8897;
	width:100%;
	display:block;
	float:right;
	padding-top:0px;
}
.bodymid a {
	color:#ffffff;
}
.bodybottom {/*background:url(../images/bodybottom.jpg) no-repeat;*/
	width: 720px;
	height: 12px;
}
.bodytop_detail {/*background: url(../images/bodytop_detail.jpg) no-repeat;*/
	width: 850px;
	height: 12px;
}
.bodymid_detail {/*background: url(../images/bodymid_detail.jpg) repeat-y; */
	width: 850px;
	padding: 0px 5px;
}
.bodymid_detail a {
	color:#FFFFFF;
	;
}
.bodybottom_detail {/*background:url(../images/bodybottom_detail.jpg) no-repeat;*/
	width: 850px;
	height: 12px;
}
.floatl, .lispace, .top_menu_ir, .top_menu_im, .top_menu_il, .atop_menu_ir, .atop_menu_im, .atop_menu_il {
	font-size:12px;
	font-family:verdana;
	float: left;
	color:#FFFFFF;
	background-color:#7A8897;
	padding-left:10px;
}
.clear {
	clear: both;
}
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
.bodytop {/*background: url(../images/bodytop.jpg) no-repeat;*/
	width: 720px;
	height: 12px;
}
.shiping_row span {
	display: inline-block;
	width: 149px;
	vertical-align: top;
}
.bodymid2 {
  width: 990px; padding: 10px;
}
</style>
<link type="text/css" href="<?php echo config_item('base_url') ?>css/site-style.css" rel="stylesheet" />
<!-- order detail -->
<div class="bodymid2">
  <div class="ordereview_sumry">
    <div class="ship_row">
      <div id="heading_left" class="mainPageHeading">
        <h2 class="head_seting">Confirm &amp; Submit Order</h2>
      </div>
      <div class="heading_right"> </div>
      <div class="clear"></div>
    </div>
    <div class="shiping_left">
    <div class="order_summbk">
                <?php
					
					$tringTotal = 0;
					$tearTotal = 0;
					$stpendantTotal = 0;
					$threestonepdtTotal = 0;
					$tothreeTotal = 0;
					$adjewelryTotal = 0;
					$adUniqueTotal = 0;
					
					$defaultEaring = '';
					$addtoringview = '';
					$toearingview = '';
					$threstPendantView = '';
					$tosolitairview = '';
					$tothreeview = '';
					$addUniqueView = '';
					$imgwidth = 146;
					
					$this->load->helper('t');
					$this->load->model('cartmodel');
					$totalcart_price = 0;
					$i=1;
				foreach ($orderdetail as $item){
					
					$item_name = ($itemName1 == 'ZKORDIAMONDS' ? 'Graysault Diamonds' : $item['name']);
					/*$rapnet_diamnd = $this->cartmodel->getrapnet_diamond_detail($item['lot']);
					$dmitem_title = $rapnet_diamnd[0]['Girdle'];*/
					$itemWirePrice = wire_price($item['totalprice']);
			
				switch($item['addoption']) {
					
					case 'addjewelry':
							
					$details = getDetailsByLot($item['lot']);
					$lotdm_shape = view_shape_value($lot_image, $details['shape']);
					$lotdm_image = $shape_imgurl.$lotdm_shape;
					if( !empty($details['fcolor_value']) ) {
						$diam_type = 'Color Diamond';
						$viewdtLink = diamond_detail_link($details['lot'],$item['addoption'],'fancy_color');
					} else {
						$diam_type = 'White Diamond';
						$viewdtLink = diamond_detail_link($details['lot'],'false','');
					}
					
					$shapesImage = config_item('base_url').'images/shapes_images/'.$lot_image;
					$itemName = loose_diamond_title($details);
					$wirePrice = wire_price($item['price']*$item['quantity']);
					
							
							$adjewelryView .= '<div class="imgleft_cols"><img src="'.$shapesImage.'" width="'.$imgwidth.'" alt="'.$lotdm_shape.'" /></div>
											<div class="detail_rightbk">
												<div class="checkout_cols">
											<div class="shiping_row">
												<span>'.$itemName.'</span>
												<span></span>
											</div>
											<div class="shiping_row">
												<span>Web ID: </span>
												<span>'.$details['lot'].'</span>
											</div>
											<div class="shiping_row">
												<span>Lot : '.$item['lot'].'</span>
												<span>$'._nf($details['price']).'</span>
											</div>
											<div class="shiping_row">
												<span>Wire Price: </span>
												<span>'._nf($wirePrice).'</span>
											</div>
											<div class="shiping_row pricerow">
											<span>Net Price :</span>
											<span>$'._nf($wirePrice).'</span>
										</div>
										</div>
											</div>
											<div class="clear"></div><br>';
							
							$adjewelryTotal = $adjewelryTotal + $itemWirePrice;
							break;
					
				case 'addtoring':
							
					$diamond = getDetailsByLot($item['lot']);
					$dprice = $diamond['price'];
					$ringst_shape = view_shape_value($ringst_img, $side2['shape']);
					$ringst_image  = $shape_imgurl.$ringst_img;
					
					$setttings = getAllByRindID($item['ringsetting']);
					$setting_imgurl = 'http://www.uniquesettings.com/'.$setttings['image'];
					$ringset_price = floatval($item['setting_price'])*$item['quantity'];

					$sprice = $item['price'];
					//$itemPriceQty = ( ( floatval($dprice)*$item['quantity'] ) + $ringset_price );
					
							
							$addtoringview .= '<div class="imgleft_cols"><img src="'.$setting_imgurl.'" width="'.$imgwidth.'" alt="Ring" /></div>
											<div class="detail_rightbk">
												<div class="checkout_cols">
											<div class="shiping_row">
												<span>'.$setttings['name'].'</span>
												<span></span>
											</div>
											<div class="shiping_row">
												<span>Item: '.$setttings['style_group'].' </span>
												<span>$'._nf($item['setting_price']).'</span>
											</div>
											<div class="shiping_row">
												<span>Lot : '.$item['lot'].'</span>
												<span>$'._nf($diamond['price']).'</span>
											</div>
											<div class="shiping_row">
												<span>RING SIZE: </span>
												<span>'.$item['dsize'].'</span>
											</div>
											<div class="shiping_row pricerow">
											<span>Total Price :</span>
											<span>$'._nf($item['totalprice']).'</span>
										</div>
										<div class="shiping_row pricerow">
											<span>Wire Price :</span>
											<span>$'._nf($itemWirePrice).'</span>
										</div>
										</div>
											</div>
											<div class="clear"></div><br>';
							
							$tringTotal = $tringTotal + $itemWirePrice;
							break;
							
				case 'toearring':
							
					$side1 = getDetailsByLot($item['sidestone1']);
					$s1price = $side1['price'];
					$side_shape = view_shape_value($side1_image, $side1['shape']);
					$side_image1 = $shape_imgurl.$side1_image;
					
					$side2 = getDetailsByLot($item['sidestone2']);
					$s2price = $side2['price'];
					$side2_shape = view_shape_value($side2_image, $side2['shape']);
					$side_image2 = $shape_imgurl.$side2_image;
					
					$setttings = getEarringSettingsById($item['earringsetting']);
					$vimage_urlink = config_item('base_url').$setttings['small_image'];
					$sprice = $setttings['price'];
					$earingMetal = metal_label($setttings['metal']);
					$earingStyle = ucwords( str_replace('-', ' ', $setttings['style']) );
					$stone1_price = floatval($s1price)*$item['quantity'];
					$stone2_price = floatval($s2price)*$item['quantity'];
					$seting_price = floatval($sprice)*$item['quantity'];
					$total_ringpr = $stone1_price + $stone2_price + $seting_price;
					
							
							$toearingview .= '<div class="imgleft_cols"><img src="'.$vimage_urlink.'" width="'.$imgwidth.'" alt="Ring" /></div>
											<div class="detail_rightbk">
												<div class="checkout_cols">
											<div class="shiping_row">
												<span>Diamond Stud Earrings</span>
												<span></span>
											</div>
											<div class="shiping_row">
												<span>Item: '.$item['earringsetting'].'</span>
												<span>$'._nf($seting_price).'</span>
											</div>
											<div class="shiping_row">
												<span>Stone1 : '.$side1['lot'].'</span>
												<span>$'._nf($stone1_price).'</span>
											</div>
											<div class="shiping_row">
												<span>Stone2 : '.$side2['lot'].'</span>
												<span>$'._nf($stone2_price).'</span>
											</div>
											<div class="shiping_row pricerow">
											<span>Total Price :</span>
											<span>$'._nf($item['totalprice']).'</span>
										</div>
										<div class="shiping_row pricerow">
											<span>Wire Price :</span>
											<span>$'._nf($itemWirePrice).'</span>
										</div>
										</div>
											</div>
											<div class="clear"></div><br>';
							
							$tearTotal = $tearTotal + $itemWirePrice;
							break;
							
					case 'addpendantsetings':
							
					$diamond = getDetailsByLot($item['lot']);
					$ringst_shape = view_shape_value($pendant_dmimg, $diamond['shape']);
					$pndt_image  = $shape_imgurl.$pendant_dmimg;
					
					$dprice = intval(number_format($diamond['price'],0,'.',''));
					//$item['quantity'] = intval($item['quantity']);
					//$item['totalprice'] = intval(number_format($item['totalprice'],0,'.',''));
					$dmPrice = intval($item['quantity'])*$diamond['price'];
					
					$setttings = getPendentSettingsById($item['pendantsetting']);
					$sprice = intval(number_format($setttings['price'],0,'.',''));
					$pendant_imgurl = config_item('base_url').$setttings['small_image'];
							
						$tosolitairview .= '<div class="imgleft_cols"><img src="'.$pendant_imgurl.'" width="'.$imgwidth.'" alt="Ring" /></div>
										<div class="detail_rightbk">
											<div class="checkout_cols">
										<div class="shiping_row">
											<span>'.$setttings['description'].'</span>
											<span></span>
										</div>
										<div class="shiping_row">
											<span>Stock Number: '.$setttings['stock_number'].'</span>
											<span>$'._nf($sprice*$item['quantity']).'</span>
										</div>
										<div class="shiping_row">
											<span>Lot# : '.$diamond['lot'].'</span>
											<span>$'._nf($dmPrice).'</span>
										</div>
										<div class="shiping_row pricerow">
											<span>Total Price :</span>
											<span>$'._nf($item['totalprice']).'</span>
										</div>
										<div class="shiping_row pricerow">
											<span>Wire Price :</span>
											<span>$'._nf($itemWirePrice).'</span>
										</div>
									</div>
										</div>
										<div class="clear"></div><br>';
						
						$stpendantTotal = $stpendantTotal + $itemWirePrice;
						break;
						
		case 'addpendantsetings3stone':
		
					////// pendant 3stone detail
					$diamond = getDetailsByLot($item['lot']);
					$dprice = floatval($diamond['price'])*$item['quantity'];
					$diam_shape = view_shape_value($d1_image, $diamond['shape']);
					$diam_image1 = $shape_imgurl.$d1_image;
					
					$side1 = getDetailsByLot($item['sidestone1']);
					$s1price = floatval($side1['price'])*$item['quantity'];
					$diam1_shape = view_shape_value($dm1_image, $side1['shape']);
					$diamnd_image1 = $shape_imgurl.$dm1_image;
					
					$side2 = getDetailsByLot($item['sidestone2']);
					$s2price = floatval($side2['price'])*$item['quantity'];
					$diam2_shape = view_shape_value($dm2_image, $side2['shape']);
					$diam2_shape = $shape_imgurl.$dm2_image;
					
					$setttings = getPendentSettingsById($item['pendantsetting']);
					$sprice = $setttings['price'];
					$pendante_image = config_item('base_url').$setttings['small_image'];
					$seting_price = floatval($dprice)*$item['quantity'];
							
						$threstPendantView .= '<div class="imgleft_cols"><img src="'.$pendante_image.'" width="'.$imgwidth.'" alt="Ring" /></div>
										<div class="detail_rightbk">
											<div class="checkout_cols">
										<div class="shiping_row">
											<span>'.$setttings['description'].'</span>
											<span></span>
										</div>
										<div class="shiping_row">
											<span>Item: '.$item['pendantsetting'].'</span>
											<span>$'._nf($sprice*$item['quantity']).'</span>
										</div>
										<div class="shiping_row">
											<span>Lot# : '.$diamond['lot'].'</span>
											<span>$'._nf($dprice).'</span>
										</div>
										<div class="shiping_row">
											<span>Stone1 : '.$side1['lot'].'</span>
											<span>$'._nf($s1price).'</span>
										</div>
										<div class="shiping_row">
											<span>Stone2 : '.$side2['lot'].'</span>
											<span>$'._nf($s2price).'</span>
										</div>
										<div class="shiping_row pricerow">
											<span>Total Price :</span>
											<span>$'._nf($item['totalprice']).'</span>
										</div>
										<div class="shiping_row pricerow">
											<span>Wire Price :</span>
											<span>$'._nf($itemWirePrice).'</span>
										</div>
									</div>
										</div>
										<div class="clear"></div><br>';
						
						$threestonepdtTotal = $threestonepdtTotal + $itemWirePrice;
						break;
		
		case 'tothreestone':
		
					////// build three stone ring
					$diamond = getDetailsByLot($item['lot']);
					$dprice = $diamond['price'];
					$diam_shape = view_shape_value($d1_image, $diamond['shape']);
					$diam_image1 = $shape_imgurl.$d1_image;
					$shapeImgUrl = config_item('base_url').'images/shapes_images/'.$d1_image;;
					
					$side1 = getDetailsByLot($item['sidestone1']);
					$s1price = $side1['price'];
					$diam1_shape = view_shape_value($dm1_image, $side1['shape']);
					$diamnd_image1 = $shape_imgurl.$dm1_image;
					
					$side2 = getDetailsByLot($item['sidestone2']);
					$s2price = $side2['price'];
					$diam2_shape = view_shape_value($dm2_image, $side2['shape']);
					$diamnd_image2 = $shape_imgurl.$dm2_image;
					
					$setttings = getAllByStock($item['ringsetting']);
					$sprice = $setttings['price'];
					//$threstone_ringname = $details['style'].' '.$setttings['shape'].' Diamond Engagement Ring <span>in '.$setttings['metal'].' ('.$setttings['total_carats'].' tw.)</span>';
					$threstone_ringname = $details['style'].' '.$setttings['shape'].' Diamond Engagement Ring';
					$threstone_ringname = ( !empty($threstone_ringname) ?  $threstone_ringname : 'Three-Stone Ring' );
							
						$tothreeview .= '<div class="imgleft_cols"><img src="'.$item['image_url'].'" width="'.$imgwidth.'" alt="Ring" /></div>
										<div class="detail_rightbk">
											<div class="checkout_cols">
										<div class="shiping_row">
											<span>'.$threstone_ringname.'</span>
											<span></span>
										</div>
										<div class="shiping_row">
											<span>Item: '.$item['ringsetting'].'</span>
											<span>$'._nf(floatval($sprice)*$item['quantity']).'</span>
										</div>
										<div class="shiping_row">
											<span>Lot# : '.$diamond['lot'].'</span>
											<span>$'._nf(floatval($dprice)*$item['quantity']).'</span>
										</div>
										<div class="shiping_row">
											<span>Stone1 : '.$side1['lot'].'</span>
											<span>$'._nf(floatval($s1price)*$item['quantity']).'</span>
										</div>
										<div class="shiping_row">
											<span>Stone2 : '.$side2['lot'].'</span>
											<span>$'._nf(floatval($s2price)*$item['quantity']).'</span>
										</div>
										<div class="shiping_row pricerow">
											<span>Total Price :</span>
											<span>$'._nf($item['totalprice']).'</span>
										</div>
										<div class="shiping_row pricerow">
											<span>Wire Price :</span>
											<span>$'._nf($itemWirePrice).'</span>
										</div>
									</div>
										</div>
										<div class="clear"></div><br>';
						
						$tothreeTotal = $tothreeTotal + $itemWirePrice;
						break;
							
		case 'addunique':
							
					$item['price'] = intval(number_format($item['price'],0,'.',''));
					$item['quantity'] = intval($item['quantity']);
					
					$uniqe_dtlink = $item['unique_urlink'];
					$getCateName  = explode("/", $uniqe_dtlink);
					$details = getuniquedetail2($getCateName[5]);
					$itemCateName = strtoupper($getCateName[7]);
					$iteMetal = str_replace('_',' ',$item['item_metal']);
					$itemSize = str_replace('_','/',$item['dsize']);
					$getRingDMShape = explode('/', $details['stone_weight']);
					$lotdm_shape = view_shape_value($lot_image, $getRingDMShape[1]);
					$uniqueWirePrice = wire_price($item['totalprice']);
					$itemName = $itemCateName.' Style Diamond Semi Mount Ring';
					
							
							$addUniqueView .= '<div class="imgleft_cols"><img src="'.$item['image_url'].'" width="'.$imgwidth.'" alt="'.$lotdm_shape.'" /></div>
											<div class="detail_rightbk">
												<div class="checkout_cols">
											<div class="shiping_row">
												<span>'.$itemName.'</span>
												<span></span>
											</div>
											<div class="shiping_row">
												<span>Stock Number: </span>
												<span>'.$item['lot'].'</span>
											</div>
											<div class="shiping_row">
												<span>Metal: </span>
												<span>'.$iteMetal.'</span>
											</div>
											<div class="shiping_row">
												<span>Ring Size: </span>
												<span>'.$itemSize.'</span>
											</div>
											<div class="shiping_row">
												<span>Metal Weight:</span>
												<span>'.$details['metal_weight'].'</span>
											</div>
											<div class="shiping_row">
												<span>Stone Weight: </span>
												<span>'.$details['stone_weight'].'</span>
											</div>
											<div class="shiping_row">
												<span>Total Price: </span>
												<span>'._nf($item['totalprice']).'</span>
											</div>
										<div class="shiping_row pricerow">
											<span>Wire Price :</span>
											<span>$'._nf($uniqueWirePrice).'</span>
										</div>
										</div>
											</div>
											<div class="clear"></div><br>
											<div class="botom_line"></div><br>';
							
							$adUniqueTotal = $adUniqueTotal + $uniqueWirePrice;
							break;			
						
					} 
				}
						$totalcart_price = $tringTotal + $tearTotal + $stpendantTotal + $threestonepdtTotal + $tothreeTotal + $adjewelryTotal + $adUniqueTotal + $procesing_fees;
						$total_cartprice = $totalcart_price - $procesing_fees;						
						$ordercart_view = $addtoringview.$toearingview.$tosolitairview.$threstPendantView.$tothreeview.$adjewelryView.$addUniqueView;
						
						echo $ordercart_view;
					?>
            </div>
      <!--<div class="order_summbk">
        <div class="imgleft_cols"><img src="http://yadegardiamonds.com/images/shapes_images/asscher.jpg" width="146" alt="Ascher"></div>
        <div class="detail_rightbk">
          <div class="checkout_cols">
            <div class="shiping_row"> <span>4.000 Carat  Cut GIA Report  Natural Diamond <br>
              8.66 x 8.48 x 5.94mm</span> <span></span> </div>
            <div class="shiping_row"> <span>Web ID: </span> <span>3997</span> </div>
            <div class="shiping_row"> <span>Lot : 3997</span> <span>$75,920</span> </div>
            <div class="shiping_row"> <span>Wire Price: </span> <span>73,642</span> </div>
            <div class="shiping_row pricerow"> <span>Net Price :</span> <span>$73,642</span> </div>
          </div>
        </div>
        <div class="clear"></div>
        <br>
      </div>-->
      <input type="hidden" name="totalprice" id="totalprice" value="71433.128">
      <input type="hidden" name="paymentmethod" id="paymentmethod" value="furtherprocess">
      <br>
      <br>
      <div class="summary_detailbk">
                 	<div class="shipsumry_cols">
                    	<div class="shipHead">Ship To</div>
                        <div><?php echo $full_name; ?></div>
                        <div>Contact: <?php echo $customer->phone; ?></div>
                        <div><?php echo $customer->email; ?></div>
                        <div>Address1: <?php echo $customer->address; ?></div>
                        <div>Address2: <?php echo $customer->address2; ?></div>
                        <div><?php echo $postal_adress; ?></div>
                        <div class="editLink"><a href="<?php echo config_item('base_url')?>shoppingbasket/orderinformation">Edit</a></div>
                    </div>
                    <div class="shipsumry_cols">
                    	<div class="shipHead">Billing Address</div>
                        <div><?php echo $billing_fullname; ?></div>
                        <div>Contact: <?php echo $customer->billing_phone; ?></div>
                        <div><?php echo $customer->billing_email; ?></div>
                        <div>Address1: <?php echo $customer->billing_adres1; ?></div>
                        <div>Address2: <?php echo $customer->billing_adres2; ?></div>
                        <div><?php echo $postal_adress; ?></div>
                         <div class="editLink"><a href="<?php echo config_item('base_url')?>shoppingbasket/orderinformation">Edit</a></div>
                    </div>
                    <div class="shipsumry_cols">
                    	<div class="shipHead">Payment Method</div>
                        <div><?php echo $payment_mthod; ?></div>
                        <div>You will be contacted shortly</div>
                        <div class="editLink"><a href="<?php echo config_item('base_url')?>shoppingbasket/selectpaymentmethod">Edit</a></div>
                    </div>
                    <div class="clear"></div><br><br>
                    <div class="botom_line"></div><br>
                    <div class="sumry_notes">Order by 2 PM PT Today and receive your order by <?php echo nextDate(); ?> via FedEx. Subject to payment authorization.</div>
                 </div>
    </div>
    <div class="shiping_right">
      <div> <a href="#javascript;"><img src="<?php echo config_item('base_url')?>images/order_submited.jpg"></a> </div>
      <br>
      <div class="summary_block">
        <div class="sumbk_heading">Order Summary</div>
        <div class="summr_row"> <span>Subtotal</span> <span>$<?php echo _nf($total_cartprice); ?></span> </div>
        <div class="summr_row"> <span>Processing Fee</span> <span>$<?php echo $procesing_fees; ?>.00</span> </div>
        <div class="summr_row"> <span>Processing Fee Item Total</span> <span>$<?php echo _nf($totalcart_price); ?></span> </div>
        <div class="summr_row"> <span>Fedex Shipping</span> <span>$00.00</span> </div>
        <div class="summr_row"> <span>Sales Tax*</span> <span>$0.00</span> </div>
        <div class="summr_row"> <span>Order Id</span> <span><?php echo $orderid; ?></span> </div>
        <br>
        <br>
        <div class="botom_line"></div>
        <br>
        <div class="summr_row summttbk"> <span>Order Total</span> <span>$<?php echo _nf($totalcart_price); ?></span> </div>
      </div>
      <br>
      <div class="label_color"><span class="secure_ckout">Secure Checkout Shopping is always safe and secure</span></div>
    </div>
  </div>
</div>

<!-- End order detail -->
<div class="clear"></div>
<table style="background-color: #7A8897;">
  <tr>
    <td colspan="3"><div id="hd" style="background-color: #7A8897;
	color: #FFFFFF;
	float: left;
	font-family: verdana;
	font-size: 12px;
	padding-left: 10px;">Order Submitted Successfully</div></td>
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
    <td colspan="3"><div id="hd" style="background-color: #C0C2C5;
	font-weight: bold;
	margin-top: 5px;
	padding-left: 5px;
	padding-top: 6px;">You purchased the following item(s):</div></td>
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
	<!-- '.$details['cut'].' cut, '.$details['color'].' color, '.$details['clarity'].' clarity '.$details['shape'].' shape '.$details['carat'].'-Carat Diamond <br>-->Lot #: '.$details['lot'].', '.$details['venderinfo'].'<br>
	Quantity: '.$item['quantity'].' 
	</div></td>
	<td><div class="floatl w85px m2 txtright"> $'.number_format($item['price']).', '.$item['ezpay'].' </div></td>
	</tr>';
	
	$subtotal = $subtotal + $item['price']*$item['quantity'];
	break;
	
	case 'addjewelry':
	$details = $this->adminmodel->getDetailsByLot($item['lot'],$orderid);
	$loosdiamondhtml .='<tr>
	<td></td>
	<td><div class="floatl w200px m2"><br>
	<!-- '.$details['cut'].' cut, '.$details['color'].' color, '.$details['clarity'].' clarity '.$details['shape'].' shape '.$details['carat'].'-Carat Diamond <br>-->Lot #: '.$details['lot'].', '.$details['venderinfo'].'<br>
	Quantity: '.$item['quantity'].' 
	</div></td>
	<td><div class="floatl w85px m2 txtright"> $'.number_format($item['price']).', '.$item['ezpay'].' </div></td>
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
	padding-top: 6px;"><div class="commonheader">Customer Information</div></td>
  </tr>
  <t>
  
    <td colspan="3"><div class="floatl w350px m2">
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
      </div></td>
  </tr>
  <?php //} ?>
  <?php ?>
  <tr>
    <?php if(isset($shippment->creditcardname)){ ?>
    <td colspan="3" style="background-color: #C0C2C5;
	font-weight: bold;
	margin-top: 5px;
	padding-left: 5px;
	padding-top: 6px;"><div class="commonheader">Credit Card Information</div></td>
  </tr>
  <tr>
    <td colspan="3"><div class="floatl w350px m2"> <b>Credit Card Type: </b><?php echo $shippment->creditcardname;?>
        <div class="clear"></div>
        <b>Credit Card Number: </b><?php echo $shippment->creditcardno;?>
        <div class="clear"></div>
        <b>Exp Date : </b><?php echo $shippment->cardexpirydate;?><br>
        <b>CVV: </b><?php echo $shippment->cvvcode;?>
        <div class="clear"></div>
      </div></td>
  </tr>
  <?php //} ?>
  <?php } 
	else {
	?>
  
    <td colspan="3" style="background-color: #C0C2C5;
	font-weight: bold;
	margin-top: 5px;
	padding-left: 5px;
	padding-top: 6px;"><div class="commonheader">Payment Option</div></td>
  </tr>
  <tr>
    <td colspan="3"><div class="floatl w350px m2"> <b>Payment Method: </b><?php echo $paymentmethord?>
        <div class="clear"></div>
        <b> </b> </div></td>
  </tr>
  <?php } ?>
  <?php if(isset($shippment->billfname)){ ?>
  <tr>
    <td colspan="3" style="background-color: #C0C2C5;
	font-weight: bold;
	margin-top: 5px;
	padding-left: 5px;
	padding-top: 6px;"><div class="commonheader">Shipment Information</div></td>
  </tr>
  <tr>
    <td colspan="3"><div class="floatl w350px m2">
        <?php 
	$orderfrom ='	<div class="floatl w350px m2">
	<b>Name: </b>'. $shippment->billfname.' '.$shippment->billlname.'
	<div class="clear"></div>
	<b>Address: </b>'. $shippment->billaddress.'
	<div class="clear"></div>
	<b>City : </b>'. $shippment->billcity.'
	<div class="clear"></div>
	<b>State : </b>'. $shippment->billstate.'
	<div class="clear"></div>
	<b>Zip Code : </b>'. $shippment->billpostcode.'
	<div class="clear"></div>
	<b>Country : </b>'. $shippment->billcountry.'
	
	</div>';
	echo $orderfrom;
	
	?>
      </div></td>
  </tr>
  <?php } ?>
  <tr>
    <td colspan="3" style="background-color: #C0C2C5;
	font-weight: bold;
	margin-top: 5px;
	padding-left: 5px;
	padding-top: 6px;"><div class="commonheader">Order Status :
        <?php if($ordersatus == 1) echo 'Confirmed'; else echo'Pending'; ?>
      </div></td>
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
    <?php if($authcode){ ?>
    <td colspan="3" style="background-color: #C0C2C5;
	font-weight: bold;
	margin-top: 5px;
	padding-left: 5px;
	padding-top: 6px;"><div class="commonheader"><a href="<?php echo $this->config->item('base_url');?>usaepay/usepayadmincharge.php?orderid=<?php echo $orderid ?>" onClick="uasepaya()">Charge</a><span id="replay"></span></div></td>
    <?php } ?>
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
    <td></td>
    <!--
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
	font-size: 12"><b>Total</b>:
      <div><b>$<?php echo $subtotal//$taxedamount+$subtotal;?></b></div></td>
  </tr>
</table>

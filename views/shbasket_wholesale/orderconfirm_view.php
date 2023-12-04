<style type="text/css">
.oldcontainer {
	margin-left: 1px !important;
	margin-right: 1px !important;
}
.order_info td:nth-child(1) {
	text-align:right; /*border:1px solid red;*/
}
.order_info td:nth-child(2) {
	text-align:left; /*border:1px solid blue;*/
}
.add2 {
	text-align:left;
}
</style>
<script>
function billForm() {
	$('#breadCrumbForm').submit();
}
</script>
<script language="javascript" src="<?php echo SITE_URL; ?>js/jquery.popup.js" type="text/javascript"></script>
<script language="javascript" src="<?php echo SITE_URL; ?>js/common_function.js" type="text/javascript"></script>
<?php $this->load->helper('form');  ?>
<div class="">
	<form id="breadCrumbForm" name="breadCrumbForm" action="<?php echo SITE_URL; ?>shbasket_wholesale/orderinformation" method="post">
		<div class="bread-crumb">
			<div class="breakcrum_bk">
				<ul>
					<li><a href="<?php echo config_item('base_url')?>">Home</a></li>
					<li><a href="<?php echo config_item('base_url')?>shbasket_wholesale/mybasket">Shopping Cart</a></li>
					<li><a href="#javascript;" onclick="billForm()">Billing and Shipping Address</a></li>
					<li><a href="<?php echo config_item('base_url')?>shbasket_wholesale/selectpaymentmethod">Payment</a></li>
					<li>Confirm Order</li>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
		<input type="hidden" name="totalprice" id="totalprice" value="">
	</form>
	<div class="ordereview_sumry">
		<div class="ship_row row-fluid">
			<div id="heading_left" class="mainPageHeading col-sm-4">
				<h2 class="head_seting">Confirm &amp; Submit Order</h2>
			</div>
			<div class="heading_right col-sm-7 text-right">
				<ul class="shiping_tabs">
					<li class="active_circle">Shipping + Billing</li>
					<li class="active_circle">Payment</li>
					<li class="active_circle">Review Order</li>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
		<?php 
		$attributes = array('method' => 'POST', 'id' => 'frmcontinue');
		echo form_open(config_item('base_url').'shbasket_wholesale/orderinformation', $attributes)?>
			<div class="pad10">
				<div class="dbr clear"></div><br>
				<div class="dbr"></div>
				<div class="row-fluid">
					<div class="shiping_left col-sm-7">
						<div class="order_summbk">
							<?php
							$tringTotal = 0;
							$tearTotal = 0;
							$stpendantTotal = 0;
							$threestonepdtTotal = 0;
							$tothreeTotal = 0;
							$adjewelryTotal = 0;
							$adUniqueTotal = 0;
							$watchtotal = 0;
							$defaultEaring = '';
							$addtoringview = '';
							$toearingview = '';
							$threstPendantView = '';
							$tosolitairview = '';
							$tothreeview = '';
							$addUniqueView = '';
							$imgwidth = 146;
							$addwatchview = '';
							$this->load->helper('t');
							$totalcart_price = 0;
							$i=1;
							$vendors_name = array();
							foreach ($mycartitems as $myCartIndex => $item){
								$item_name = isset($item['name'])?$item['name']:get_site_title();
								$itemWirePrice = wire_price($item['totalprice']);
								$vendors_name[] = $item['vendorname'];
								switch($item['addoption']) {
									case 'addtoring':
										$diamond = getDetailsByLot($item['lot']);
										$dprice = $diamond['price'];
										$ringst_shape = view_shape_value($ringst_img, $side2['shape']);
										$ringst_image  = $shape_imgurl.$ringst_img;

										$setttings = getAllByRindID($item['ringsetting']);
										$ringset_price = floatval($item['setting_price'])*$item['quantity'];
										$diamPrice = $diamond['price']*$item['quantity'];

										$totalRingPrice = $diamPrice + ( $item['setting_price']*$item['quantity'] );
										$itmWirePrice = wire_price($totalRingPrice);
										$ringsImage = $this->Catemodel->getRingsImgViaId($setttings['style_group']);
										$setting_imgurl = config_item('base_url').'scrapper/imgs/'.$ringsImage['ImagePath'];
										$sprice = $item['price'];
										$addtoringview .= '<div class="row-fluid">';
											$addtoringview .= '<div class="imgleft_cols col-sm-2"><img src="'.$setting_imgurl.'" alt="Ring" /></div>
											<div class="detail_rightbk col-sm-10">
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
														<span>$'._nf($totalRingPrice).'</span>
													</div>
													<div class="shiping_row pricerow">
														<span>Wire Price :</span>
														<span>$'._nf($itmWirePrice).'</span>
													</div>
												</div>
											</div>
											<div class="clear"></div><br>
											<div class="botom_line"></div><br>
										</div>';
										$tringTotal = $tringTotal + $totalRingPrice;
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

										if($item['earing_type'] == 'findings') {
											$setttings = $this->findingsmodel->getFindingsRingDetails($item['earringsetting']);
											$vimage_urlink = RINGS_IMAGE.'crone/imgs/'.$setttings['ImagePath'];
											$sprice = $setttings['priceRetail'];
											$earingMetal = $setttings['metal_type'];
											$earingStyle = ucwords( $setttings['head_style_name'] );
											$seting_price = floatval($sprice)*$item['quantity'];	
										} else {
											$setttings = getEarringSettingsById($item['earringsetting']);
											$vimage_urlink = config_item('base_url').$setttings['small_image'];
											$sprice = $setttings['price'];
											$earingMetal = metal_label($setttings['metal']);
											$earingStyle = ucwords( str_replace('-', ' ', $setttings['style']) );
											$seting_price = floatval($sprice)*$item['quantity'];
										}
										$stone1_price = floatval($s1price)*$item['quantity'];
										$stone2_price = floatval($s2price)*$item['quantity'];
										$total_ringpr = $stone1_price + $stone2_price + $seting_price;
										$toearingview .= '<div class="row-fluid">';
											$toearingview .= '<div class="imgleft_cols col-sm-2"><img src="'.$vimage_urlink.'" alt="Ring" /></div>
											<div class="detail_rightbk col-sm-10">
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
											<div class="clear"></div><br>
											<div class="botom_line"></div><br>
										</div>';
										$tearTotal = $tearTotal + $item['totalprice'];
									break;

									case 'addpendantsetings':
										$diamond = getDetailsByLot($item['lot']);
										$ringst_shape = view_shape_value($pendant_dmimg, $diamond['shape']);
										$pndt_image  = $shape_imgurl.$pendant_dmimg;
										$dprice = intval(number_format($diamond['price'],0,'.',''));
										$dmPrice = intval($item['quantity'])*$diamond['price'];
										$setttings = getPendentSettingsById($item['pendantsetting']);
										$sprice = intval(number_format($setttings['price'],0,'.',''));
										$pendant_imgurl = config_item('base_url').$setttings['small_image'];
										$tosolitairview .= '<div class="row-fluid">';
											$tosolitairview .= '<div class="imgleft_cols col-sm-2"><img src="'.$pendant_imgurl.'" alt="Ring" /></div>
											<div class="detail_rightbk col-sm-10">
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
											<div class="clear"></div><br>
											<div class="botom_line"></div><br>
										</div>';
										$stpendantTotal = $stpendantTotal + $item['totalprice'];
									break;

									case 'addpendantsetings3stone':
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
										$threstPendantView .= '<div class="row-fluid">';
											$threstPendantView .= '<div class="imgleft_cols col-sm-2"><img src="'.$pendante_image.'" alt="Ring" /></div>
											<div class="detail_rightbk col-sm-10">
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
											<div class="clear"></div><br>
											<div class="botom_line"></div><br>
										</div>';
										$threestonepdtTotal = $threestonepdtTotal + $item['totalprice'];
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
										if( $build_3stone == 'unique' ){
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
										$threstone_ringname = $details['style'].' '.$setttings['shape'].' Diamond Engagement Ring';
										$threstone_ringname = ( !empty($threstone_ringname) ?  $threstone_ringname : 'Three-Stone Ring' );
										$tothreeview .= '<div class="row-fluid">';
											$tothreeview .= '<div class="imgleft_cols col-sm-2"><img src="'.$unique_ringimg.'" alt="Ring" /></div>
											<div class="detail_rightbk col-sm-10">
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
											<div class="clear"></div><br>
											<div class="botom_line"></div><br>
										</div>';
										$tothreeTotal = $tothreeTotal + $item['totalprice'];
									break;

									case 'addjewelry':
										$details = getDetailsByLot($item['lot']);
										$lotdm_shape = view_shape_value($lot_image, $details['shape']);
										//$lotdm_image = $shape_imgurl.$lotdm_shape;
										if( !empty($details['fcolor_value']) ) {
											$diam_type = 'Color Diamond';
											$viewdtLink = diamond_detail_link($details['lot'],$item['addoption'],'fancy_color');
										} else {
											$diam_type = 'White Diamond';
											$viewdtLink = diamond_detail_link($details['lot'],'false','');
										}
										$itemName = loose_diamond_title($details);
										$wirePrice = wire_price($item['price']*$item['quantity']);
										$adjewelryView = '';
										$adjewelryView .= '<div class="row-fluid">';
											$adjewelryView .= '<div class="imgleft_cols col-sm-2"><img src="'.$item['image_url'].'" alt="'.$lotdm_shape.'" /></div>
											<div class="detail_rightbk col-sm-10">
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
											<div class="clear"></div><br>
											<div class="botom_line"></div><br>
										</div>';
										$adjewelryTotal = $adjewelryTotal + $wirePrice; //$item['price']*$item['quantity'];
									break;

									case 'addunique':
										$item['price'] = intval(number_format($item['price'],0,'.',''));
										$item['quantity'] = intval($item['quantity']);

										$uniqe_dtlink = $item['unique_urlink'];
										$getCateName  = explode("/", $uniqe_dtlink);
										$details = getuniquedetail2(isset($getCateName[5])?$getCateName[5]:'');
										$itemCateName = strtoupper(isset($getCateName[7])?$getCateName[7]:'');
										$iteMetal = str_replace('_',' ',$item['item_metal']);
										$itemSize = str_replace('_','/',$item['dsize']);
										$getRingDMShape = explode('/', isset($details['stone_weight'])?$details['stone_weight']:'');
										$lotdm_shape = view_shape_value($lot_image, isset($getRingDMShape[1])?$getRingDMShape[1]:'');
										$itemName = $itemCateName.' Style Diamond Semi Mount Ring';
										$rowsring = $this->Catemodel->getRingsDetailViaId($item['lot']);
										if(isset($rowsring) && !empty($rowsring)){
											$rowname = isset($rowsring['name'])?$rowsring['name']:'';
											$rowmetal = isset($rowsring['metal_weight'])?$rowsring['metal_weight']:'';
											$rowstone = isset($rowsring['stone_weight'])?$rowsring['stone_weight']:'';
										}else{
											$rowname = '';
											$rowmetal = '';
											$rowstone = '';
										}

										$engr_price = ( !empty($item['engraved_text']) ? 30 : 0 );
										$unRingPrice = $item['price'] * $item['quantity'];
										$addUniqueView .= '<div class="row-fluid">';
											$addUniqueView .= '<div class="imgleft_cols col-sm-2"><img src="'.$item['image_url'].'" alt="'.$lotdm_shape.'" /></div>
											<div class="detail_rightbk col-sm-10">
												<div class="checkout_cols">
													<div class="shiping_row">
														<span>'.$itemName.'</span>
														<span></span>
													</div>
													<div class="shiping_row">
														<span>Stock Number: </span>
														<span>'.$rowname.'</span>
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
														<span>'.$rowmetal.'</span>
													</div>
													<div class="shiping_row">
														<span>Stone Weight: </span>
														<span>'.$rowstone.'</span>
													</div>';
													$diamond['price'] = 0;
													if( !empty($item['sidestone1']) ) {                
														$diamond = getDetailsByLot( $item['sidestone1']);
														$addUniqueView .= '<div class="shiping_row">
															<span>Diamond Carat<br>Stock# '.$diamond['lot'].' </span>
															<span>'.$diamond['carat'].'</span>
														</div>
														<div class="shiping_row">
															<span>Diamond Measurement:<br>'.$diamond['Meas'].' </span>
															<span></span>
														</div>
														<div class="shiping_row">
															<span>Diamond Price: </span>
															<span>'._nf($diamond['price'], 2).'</span>
														</div>';
													}
													$netTotalCartPrice = $unRingPrice + $diamond['price'] + $engr_price;
													$uniqueWirePrice = wire_price($netTotalCartPrice);
													if( $engr_price > 0){
														$addUniqueView .= '<div class="shiping_row">
															<span>Engraved Price: </span>
															<span>$'.$engr_price.'</span>
														</div>';
													}
													$addUniqueView .= '<div class="shiping_row">
														<span>Ring Price: </span>
														<span>$'._nf($unRingPrice).'</span>
													</div>
													<div class="shiping_row pricerow">
														<span>Wire Price :</span>
														<span>$'._nf($uniqueWirePrice).'</span>
													</div>
												</div>
											</div>
											<div class="clear"></div><br>
											<div class="botom_line"></div><br>
										</div>';
										$adUniqueTotal = $adUniqueTotal + $netTotalCartPrice;
									break;

									case 'addwatch':
										$details = $this->jewelrymodel->getWatchByStock($item['lot']);
										$item['price'] = $details['price1'];
										$item['quantity'] = intval($item['quantity']);
										$uniqe_dtlink = SITE_URL.$item['unique_urlink'];
										$itemName = $details['productName'].' '.getWatchIdType($details['id_type']).' '.$details['case_diameter'];
										$unRingPrice = $item['price'] * $item['quantity'];
										$netTotalCartPrice = $unRingPrice;
										$uniqueWirePrice = wire_price($netTotalCartPrice);
										$addUniqueView .= '<div class="row-fluid">';
											$addUniqueView .= '<div class="imgleft_cols col-sm-2"><img src="'.$item['image_url'].'" width="112" alt="'.$itemName.'" /></div>
											<div class="detail_rightbk col-sm-10">
												<div class="checkout_cols">
													<div class="shiping_row">
														<span>'.$itemName.'</span>
														<span></span>
													</div>
													<div class="shiping_row">
														<span>Item Number: </span>
														<span>'.$details['upc'].'</span>
													</div>
													<div class="shiping_row">
														<span>Model #: </span>
														<span>'.check_empty($details['model_number'], 'NA').'</span>
													</div>';
													$addUniqueView .= '<div class="shiping_row">
														<span>Brand Name: </span>
														<span>'.check_empty($details['brand'], 'NA').'</span>
													</div>';
													$addUniqueView .= '<div class="shiping_row">
														<span>Case Diametert:</span>
														<span>'.$details['case_diameter'].'</span>
													</div>';
													$addUniqueView .= '<div class="shiping_row pricerow">
														<span>Sale Price :</span>
														<span>$'._nf($unRingPrice).'</span>
													</div>
												</div>
											</div>
											<div class="clear"></div><br>
											<div class="botom_line"></div><br>
										</div>';
										$adUniqueTotal = $adUniqueTotal + $netTotalCartPrice;
									break;

									case 'diamond_bracelet':
										$details = $this->braceletmodel->getBraceleteDetail($item['lot']);
										$price = $item['price'];
										$item['quantity'] = intval($item['quantity']);

										$uniqe_dtlink = SITE_URL.'braceletsection/bracelet_detail/'.$item['lot'];
										$itemName = $item['name'];

										$unRingPrice = $item['price'] * $item['quantity'];
										$netTotalCartPrice = $unRingPrice;
										$uniqueWirePrice = wire_price($netTotalCartPrice);
										$addUniqueView .= '<div class="row-fluid">';
											$addUniqueView .= '<div class="imgleft_cols col-sm-2"><img src="'.$item['image_url'].'" width="112" alt="'.$itemName.'" /></div>
											<div class="detail_rightbk col-sm-10">
												<div class="checkout_cols">
													<div class="shiping_row">
														<span>'.$itemName.'</span>
														<span></span>
													</div>
													<div class="shiping_row">
														<span>Item Number: </span>
														<span>'.$details['item_number'].'</span>
													</div>
													<div class="shiping_row">
														<span>Default Metal: </span>
														<span>'.check_empty($details['default_metal'], 'NA').'</span>
													</div>';
													$addUniqueView .= '<div class="shiping_row">
														<span>Default Color: </span>
														<span>'.check_empty($details['default_color'], 'NA').'</span>
													</div>';
													$addUniqueView .= '<div class="shiping_row">
														<span>PC Casting:</span>
														<span>'.$details['pc_casting'].'</span>
													</div>
													<div class="shiping_row">
														<span>Stone Break Down:</span>
														<span>'.$details['stone_break_down'].'</span>
													</div>
													<div class="shiping_row">
														<span>Diamond CTTW:</span>
														<span>'.$details['diamond_cttw_provided'].'</span>
													</div>
													<div class="shiping_row">
														<span>Diamond Quality:</span>
														<span>'.$details['diamond_quality_prices_based'].'</span>
													</div>';
													$addUniqueView .= '<div class="shiping_row pricerow">
														<span>Sale Price :</span>
														<span>$'._nf($unRingPrice).'</span>
													</div>
												</div>
											</div>
											<div class="clear"></div><br>
											<div class="botom_line"></div><br>
										</div>';
										$adUniqueTotal = $adUniqueTotal + $netTotalCartPrice;
									break;

									case 'rolex_watch':
										$details = $this->rolexmodel_new->getRolexWatchDetail($item['lot']);
										$item['price'] = $details['price'];
										$item['quantity'] = intval($item['quantity']);

										$uniqe_dtlink = SITE_URL.'rolexrings/rolex_watch_detail/'.$item['lot'];
										$itemName = $details['title'];

										$unRingPrice = $item['price'] * $item['quantity'];
										$netTotalCartPrice = $unRingPrice;
										$uniqueWirePrice = wire_price($netTotalCartPrice);

										$addUniqueView .= '<div class="row-fluid">';
											$addUniqueView .= '<div class="imgleft_cols col-sm-2"><img src="'.$item['image_url'].'" width="112" alt="'.$itemName.'" /></div>
											<div class="detail_rightbk col-sm-10">
												<div class="checkout_cols">
													<div class="shiping_row">
														<span>'.$itemName.'</span>
														<span></span>
													</div>
													<div class="shiping_row">
														<span>Item Number: </span>
														<span>'.$details['style'].'</span>
													</div>
													<div class="shiping_row">
														<span>Watch Type: </span>
														<span>'.check_empty($details['watch_type'], 'NA').'</span>
													</div>';
													$addUniqueView .= '<div class="shiping_row">
														<span>Brand Name: </span>
														<span>'.check_empty($details['brand'], 'NA').'</span>
													</div>';
													$addUniqueView .= '<div class="shiping_row">
														<span>Country of Origin:</span>
														<span>'.$details['country'].'</span>
													</div>
													<div class="shiping_row">
														<span>Average Weight:</span>
														<span>'.$details['average_weight'].'</span>
													</div>';
													$addUniqueView .= '<div class="shiping_row pricerow">
														<span>Sale Price :</span>
														<span>$'._nf($unRingPrice).'</span>
													</div>
												</div>
											</div>
											<div class="clear"></div><br>
											<div class="botom_line"></div><br>
										</div>';
										$adUniqueTotal = $adUniqueTotal + $netTotalCartPrice;
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
										$item['quantity'] = intval($item['quantity']);
										$uniqe_dtlink = SITE_URL.'stuller_new_rings/wbands_diamond_detail/'.$item['lot'].'/'.$item['addoption'].'/?ring_size='.$item['default_ringsize'];
										$itemName = $details['title'];

										$unRingPrice = $item['price'] * $item['quantity'];
										$netTotalCartPrice = $unRingPrice;
										$uniqueWirePrice = wire_price($netTotalCartPrice);

										$addUniqueView .= '<div class="row-fluid">';
											$addUniqueView .= '<div class="imgleft_cols col-sm-2"><img src="'.SITE_URL.$item['image_url'].'" width="112" alt="'.$itemName.'" /></div>
											<div class="detail_rightbk col-sm-10">
												<div class="checkout_cols">
													<div class="shiping_row">
														<span>'.$itemName.'</span>
														<span></span>
													</div>
													<div class="shiping_row">
														<span>Band Name: </span>
														<span>'.$tablesName['title'].'</span>
													</div>
													<div class="shiping_row">
														<span>Quality: </span>
														<span>'.check_empty($details['quality'], 'NA').'</span>
													</div>';
													$addUniqueView .= '<div class="shiping_row">
														<span>Name: </span>
														<span>'.check_empty($details['name'], 'NA').'</span>
													</div>';
													if( !empty($item['dsize']) ) {
														$addUniqueView .= '<div class="shiping_row">
															<span>Ring Size:</span>
															<span>'.$item['dsize'].'</span>
														</div>';
													}
													$addUniqueView .= '<div class="shiping_row pricerow">
														<span>Sale Price :</span>
														<span>$'._nf($unRingPrice).'</span>
													</div>
												</div>
											</div>
											<div class="clear"></div><br>
											<div class="botom_line"></div><br>
										</div>';
										$adUniqueTotal = $adUniqueTotal + $netTotalCartPrice;
									break;

									case 'qualityrings':
										$item['price'] = intval(number_format($item['price'],0,'.',''));
										$item['quantity'] = intval($item['quantity']);

										$uniqe_dtlink = SITE_URL.$item['unique_urlink'];
										$details = $this->qualitymodel->qualityProductDetail($item['lot']);
										$itemName = $details['title'];

										$engr_price = ( !empty($item['engraved_text']) ? 30 : 0 );
										$unRingPrice = $item['price'] * $item['quantity'];
										$netTotalCartPrice = $unRingPrice + $engr_price;
										$uniqueWirePrice = wire_price($netTotalCartPrice);

										$addUniqueView .= '<div class="row-fluid">';
											$addUniqueView .= '<div class="imgleft_cols col-sm-2"><img src="'.QUALITY_IMGS.$details['large_image'].'" width="112" alt="'.$itemName.'" /></div>
											<div class="detail_rightbk col-sm-10">
												<div class="checkout_cols">
													<div class="shiping_row">
														<span>'.$itemName.'</span>
														<span></span>
													</div>
													<div class="shiping_row">
														<span>Item Number: </span>
														<span>'.$details['style'].'</span>
													</div>
													<div class="shiping_row">
														<span>Metal Desc: </span>
														<span>'.$details['metal'].'</span>
													</div>';
													$addUniqueView .= '<div class="shiping_row">
														<span>Item Length: </span>
														<span>'.$details['length_of_item'].'</span>
													</div>';
													$addUniqueView .= '<div class="shiping_row">
														<span>Average Weight:</span>
														<span>'.$details['average_weight'].'</span>
													</div>';
													if( $engr_price > 0){
														$addUniqueView .= '<div class="shiping_row">
															<span>Engraved Price: </span>
															<span>$'.$engr_price.'</span>
														</div>';
													}
													$addUniqueView .= '<div class="shiping_row pricerow">
														<span>Sale Price :</span>
														<span>$'._nf($unRingPrice).'</span>
													</div>
												</div>
											</div>
											<div class="clear"></div><br>
											<div class="botom_line"></div><br>
										</div>';
										$adUniqueTotal = $adUniqueTotal + $netTotalCartPrice;
									break;

									case 'sterncolectionjewelry':
										$item['price'] = intval(number_format($item['price'],0,'.',''));
										$item['quantity'] = intval($item['quantity']);

										$details = $this->davidsternmodel->sternProductDetail($item['lot']);
										$uniqe_dtlink = SITE_URL.'davidsternrings/jewelry_ring_detail/'.$details['id'];
										$ringBoxDesc = str_replace("/", ', ', $details['categories_name']);
										$itemName = $ringBoxDesc. ' Item ID: '. $details['item_id'];
										$ringsImg   = STERN_IMGS.$details['item_id'].'.jpg';

										$engr_price = ( !empty($item['engraved_text']) ? 30 : 0 );
										$unRingPrice = $item['price'] * $item['quantity'];
										$netTotalCartPrice = $unRingPrice + $engr_price;
										$uniqueWirePrice = wire_price($netTotalCartPrice);

										$addUniqueView .= '<div class="row-fluid">';
											$addUniqueView .= '<div class="imgleft_cols col-sm-2"><img src="'.$ringsImg.'" width="112" alt="'.$itemName.'" /></div>
											<div class="detail_rightbk col-sm-10">
												<div class="checkout_cols">
													<div class="shiping_row">
														<span>'.$itemName.'</span>
														<span></span>
													</div>
													<div class="shiping_row">
														<span>Item Number: </span>
														<span>'.$details['item_id'].'</span>
													</div>
													<div class="shiping_row">
														<span>Metal Desc: </span>
														<span>'.$details['default_metal'].'</span>
													</div>';
													$addUniqueView .= '<div class="shiping_row">
														<span>Diamond CCTW: </span>
														<span>'.$details['diamond_cctw_provided'].'</span>
													</div>';
													$addUniqueView .= '<div class="shiping_row">
														<span>Ring Size: </span>
														<span>'.$item['default_ringsize'].'</span>
													</div>';
													$addUniqueView .= '<div class="shiping_row">
														<span>Finish Level:</span>
														<span>'.$item['finish_level'].'</span>
													</div>';
													$addUniqueView .= '<div class="shiping_row pricerow">
														<span>Sale Price :</span>
														<span>$'._nf($unRingPrice).'</span>
													</div>
												</div>
											</div>
											<div class="clear"></div><br>
											<div class="botom_line"></div><br>
										</div>';
										$adUniqueTotal = $adUniqueTotal + $netTotalCartPrice;
									break;

									case 'heart_diamond_collection':
										$item['price'] = intval(number_format($item['price'],0,'.',''));
										$item['quantity'] = intval($item['quantity']);

										$uniqe_dtlink = SITE_URL.$item['unique_urlink'];
										$details = $this->davidsternmodel->getSternCollectionDetail($item['lot']);
										$category_name = jewelry_cate_name( $details['category'] );
										$itemName = $category_name . ' ' . $details['metal_purity']. ' Item ID: '. $details['stock_number'];

										$engr_price = ( !empty($item['engraved_text']) ? 30 : 0 );
										$unRingPrice = $item['price'] * $item['quantity'];
										$netTotalCartPrice = $unRingPrice + $engr_price;
										$uniqueWirePrice = wire_price($netTotalCartPrice);

										$addUniqueView .= '<div class="row-fluid">';
											$addUniqueView .= '<div class="imgleft_cols col-sm-2"><img src="'.$item['image_url'].'" width="112" alt="'.$itemName.'" /></div>
											<div class="detail_rightbk col-sm-10">
												<div class="checkout_cols">
													<div class="shiping_row">
														<span>'.$itemName.'</span>
														<span></span>
													</div>
													<div class="shiping_row">
														<span>Item Number: </span>
														<span>'.$details['stock_number'].'</span>
													</div>
													<div class="shiping_row">
														<span>Metal Desc: </span>
														<span>'.$details['metal'].'</span>
													</div>';
													$addUniqueView .= '<div class="shiping_row">
														<span>Item Length: </span>
														<span>'.$details['length'].'</span>
													</div>';
													$addUniqueView .= '<div class="shiping_row">
														<span>Item Width: </span>
														<span>'.$details['width'].'</span>
													</div>';
													$addUniqueView .= '<div class="shiping_row">
														<span>Average Weight:</span>
														<span>'.$details['weight'].'</span>
													</div>';
													$addUniqueView .= '<div class="shiping_row pricerow">
														<span>Sale Price :</span>
														<span>$'._nf($unRingPrice).'</span>
													</div>
												</div>
											</div>
											<div class="clear"></div><br>
											<div class="botom_line"></div><br>
										</div>';
										$adUniqueTotal = $adUniqueTotal + $netTotalCartPrice;
									break;

									case 'stullerrings':
										$item['price'] = intval(number_format($item['price'],0,'.',''));
										$item['quantity'] = intval($item['quantity']);

										$uniqe_dtlink = SITE_URL.$item['unique_urlink'];
										$details = $this->qualitymodel->stullerRingsDetail($item['lot']);
										$itemName = $details['Description'];

										$engr_price = ( !empty($item['engraved_text']) ? 30 : 0 );
										$unRingPrice = $item['price'] * $item['quantity'];
										$netTotalCartPrice = $unRingPrice + $engr_price;
										$uniqueWirePrice = wire_price($netTotalCartPrice);

										$addUniqueView .= '<div class="row-fluid">';
											$addUniqueView .= '<div class="imgleft_cols col-sm-2"><img src="'.$item['image_url'].'" width="112" alt="'.$itemName.'" /></div>
											<div class="detail_rightbk col-sm-10">
												<div class="checkout_cols">
													<div class="shiping_row">
														<span>'.$itemName.'</span>
														<span></span>
													</div>
													<div class="shiping_row">
														<span>Item Number: </span>
														<span>'.$details['Sku'].'</span>
													</div>';
													if( !empty($details['RingSize']) ) {
														$addUniqueView .= '<div class="shiping_row">
															<span>Ring Size: </span>
															<span>'.$details['RingSize'].'</span>
														</div>';
														$addUniqueView .= '<div class="shiping_row">
															<span>Ring Size Type: </span>
															<span>'.$details['RingSizeype'].'</span>
														</div>';
													}
													$addUniqueView .= '<div class="shiping_row">
														<span>Weight:</span>
														<span>'._nf($details['Weight'],2).'</span>
													</div>';
													$addUniqueView .= '<div class="shiping_row">
														<span>Gram Weight:</span>
														<span>'._nf($details['GramWeight'],2).'</span>
													</div>';
													if( $engr_price > 0){
														$addUniqueView .= '<div class="shiping_row">
															<span>Engraved Price: </span>
															<span>$'.$engr_price.'</span>
														</div>';
													}
													$addUniqueView .= '<div class="shiping_row pricerow">
														<span>Sale Price :</span>
														<span>$'._nf($unRingPrice).'</span>
													</div>
												</div>
											</div>
											<div class="clear"></div><br>
											<div class="botom_line"></div><br>
										</div>';
										$adUniqueTotal = $adUniqueTotal + $netTotalCartPrice;
									break;
								}
								$ck = $i-1;
								$i++;
							}
							$procesing_fees = isset($procesing_fees)?$procesing_fees:0;
							$totalcart_price = $tringTotal + $tearTotal + $stpendantTotal + $threestonepdtTotal + $tothreeTotal + $adjewelryTotal + $adUniqueTotal + $procesing_fees + $watchtotal;
							$total_cartprice = $totalcart_price - $procesing_fees;
							$ordercart_view = $addtoringview.$toearingview.$tosolitairview.$threstPendantView.$tothreeview.$adjewelryView.$addUniqueView.$addwatchview;

							echo $ordercart_view;
							$salesTaxPercnt = isset($salesTaxPercnt)?$salesTaxPercnt:0;
							$salesTaxAmount = $totalcart_price * ( $salesTaxPercnt / 100 );
							$netTotalOrderAmount = $totalcart_price + $salesTaxAmount;
							?>
						</div>
						<input type="hidden" name="totalprice" id="totalprice" value="<?php echo $totalcart_price;?>">
						<input type="hidden" name="paymentmethod" id="paymentmethod" value="furtherprocess">
						<br><br>
						<div class="summary_detailbk row-fluid">
							<div class="col-sm-4 set_bask_cols">
								<div class="shipHead">Ship To</div>
								<div><?php echo $full_name; ?></div>
								<div>Contact: <?php echo $cust_info->phone; ?></div>
								<div><?php echo $cust_info->email; ?></div>
								<div>City: <?php echo $cust_info->phone; ?></div>
								<div>State: <?php echo $cust_info->province; ?></div>
								<div>Zip: <?php echo $cust_info->postcode; ?></div>
								<div>Country: <?php echo $cust_info->country; ?></div>
								<div>Address1: <?php echo $cust_info->address; ?></div>
								<div><?php echo $postal_adress; ?></div>
								<?php
								if(empty($cart_message)) {
									echo '<div class="editLink"><a href="#javascript;" onclick="billForm()">Edit</a></div>';
								}
								?>
							</div>
							<div class="col-sm-4 set_bask_cols">
								<div class="shipHead">Billing Address</div>
								<div><?php echo $billing_fullname; ?></div>
								<div>Contact: <?php echo $cust_info->billing_phone; ?></div>
								<div><?php echo $cust_info->billing_email; ?></div>
								<div>City: <?php echo $cust_info->billing_city; ?></div>
								<div>State: <?php echo $cust_info->province; ?></div>
								<div>Zip: <?php echo $cust_info->billing_province; ?></div>
								<div>Country: <?php echo $cust_info->billing_country; ?></div>
								<div>Address1: <?php echo $cust_info->billing_adres1; ?></div>
								<!--<div>Address2: <?php echo $cust_info->billing_adres2; ?></div>-->
								<div><?php echo $postal_adress; ?></div>
								<?php
								if(empty($cart_message)) {
									echo '<div class="editLink"><a href="#javascript;" onclick="billForm()">Edit</a></div>';
								}
								?>
							</div>
							<div class="col-sm-4">
								<div class="shipHead">Payment Method</div>
								<div><?php echo $this->session->userdata('pay_method');?></div>
							</div>
							<div class="clear"></div><br><br>
							<div class="botom_line"></div><br>
							<div class="sumry_notes">Order by 2 PM PT Today and receive your order by <?php echo nextDate(); ?> via FedEx. Subject to payment authorization.</div>
						</div>
					</div>
          	<div class="shiping_right col-sm-5 pull-right">
          	<div>
            <?php
               if( $payment_mthod != 'paypal' ) {
                    if(empty($cart_message)) {
                            echo '<a href="'.$confirm_order.'"><img src="'.config_item('base_url').'img/page_img/submit_order.jpg"></a>';		
                    } else {
                            echo '<img src="'.config_item('base_url').'images/order_confirm.jpg">';
                    }
               }
            ?>
            </div>
            <br>
            <div class="summary_block">
            	<div class="sumbk_heading">Order Summary</div>
                <div class="summr_row">
                	<span>Subtotal</span>
                    <span>$<?php echo _nf($total_cartprice); ?></span>
                </div>
                <?php
                    if( $procesing_fees > 0 ) {
                       echo '<div class="summr_row">
                	<span>Processing Fee</span>
                        <span>$'.$procesing_fees.'.00</span>
                        </div>
                        <div class="summr_row">
                                <span>Processing Fee Item Total</span>
                            <span>$'._nf($totalcart_price).'</span>
                        </div>'; 
                    }                
                ?>
                <div class="summr_row">
                	<span>Fedex Shipping</span>
                    <span>$0.00</span>
                </div>
                <div class="summr_row">
                	<span>Sales Tax <?php echo ( $salesTaxPercnt > 0 ? $salesTaxPercnt : ''); ?>%*</span>
                    <span>$<?php echo _nf($salesTaxAmount, 2); ?></span>
                </div>
                <?php if( !empty($orderid) ) { ?>
                <div class="summr_row">
                	<span>Order Id</span>
                    <span><?php echo $orderid; ?></span>
                </div>
                <?php } ?>
                <br><br>
                <div class="botom_line"></div><br>
                 <div class="summr_row summttbk">
                	<span>Order Total</span>
                    <span>$<?php echo _nf($netTotalOrderAmount); ?></span>
                </div>
            </div>
            <br>
            <div class="label_color"><span class="secure_ckout">Secure Checkout Shopping is always safe and secure</span></div>
          </div>
          </div>
          <div class="clear"></div>
          <div></div>
          <!--<div><input type="radio" name="shippingmethod" id="fedex" value="fedex" checked><input type="radio" name="paymentmethod" id="creditcard" value="creditcard" checked></div>-->
      		
       
        <script type="text/javascript">
	
	function showmsgx(){
	if(document.getElementById('creditcard').checked != true && document.getElementById('phone').checked != true && document.getElementById('moneyorder').checked != true){
	alert('Please select a method of payment'); 
	}
	
	
	};	 	
	
	</script>
    <div class="clear"></div>
    <?php
		if($payment_mthod === 'payment_byphone') {
	?>
    <div class="guidline_block">
          <div class="phoneHead">Call for One-on-One Guidence</div> 
			<div class="clear"></div>
			
			<p>
				When you are ready to make a purchase, contact our customer service staff at <?php echo CONTACT_NO; ?>. Please be ready to:
			</p>
			
			<p class="pad10">
				1. Give this order number:<span class="bgblue"><?php echo $orderid;?></span> <br><br>
				2. Provide us with the stock numbers of the products you wish to purchase (listed below), your credit card number, and shipping address.
			</p>
			<br>
			<P>Please note that to complete this purchase you must make payment through Customer Service. Orders are not placed on hold and are subject to sale until payment has been completed.</P>
          </div>
    <div class="clear"></div><br>
    <?php } ?>

    <?php if($this->session->userdata('pay_method') === 'getfinancing') { ?>
        <div class="guidline_block">
          <div class="phoneHead">Order</div>
                <div class="clear"></div>

                <p>
                        All Finance Orders are Pending Results from Getfinancing.com
                </p>
          </div>
    <div class="clear"></div><br>
    <?php } ?>
    
    <br><br>
        <div class="newbotom_line"></div>
        <div id="further_asistcols" class="checkout_cols">
            <h3>Need Assistance</h3>
            	<div>
                	<!--<span class="liveChat">Live Chat</span>-->
                    <span class="contactNo"><?php echo get_site_title('contact_info'); ?></span>
                    <span class="emailUs"><a href="#javascript" class="js__p_another_start">Email Us</a></span>
                </div>
                <div class="clear"></div>
            </div> 
            <div class="submitOrdr">                
            <?php
                if(empty($cart_message) && $payment_mthod != 'paypal') {
                        echo '<a href="'.$confirm_order.'"><img src="'.config_item('base_url').'img/page_img/submit_order.jpg"></a>';		
                }
            ?>
            </div>
          <div class="clear"></div>
      </div>
      <!--</form>--> 
      <?php echo form_close();?> </div>
        <div class="clear"></div>
        <?php
        if( $payment_mthod == 'paypal' ) {                
    ?>
        <div class="submitOrdr paypal_submit"> 
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" name="form1" id="form1">
                <input type="hidden" name="cmd" value="_xclick">
                <!--<input type="hidden" name="business" value="superzales@gmail.com">-->
                <input type="hidden" name="business" value="davidsternfinejewelry@gmail.com">
                <input type="hidden" name="item_name" value="<?php echo implode(", ", $vendors_name); ?>">
                <input type="hidden" name="currency_code" value="USD">
                <input type="hidden" name="amount" value="<?php echo $netTotalOrderAmount; ?>">
                <input type="image" src="<?php echo SITE_URL; ?>img/page_img/paypalexpress_checkout.png" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
            </form>
        </div>
        <div class="clear"></div><br><br>
        <?php } ?>
        <div class="clear"></div>
  </div>
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
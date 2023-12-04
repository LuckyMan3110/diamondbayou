<style type="text/css">
.oldcontainer{margin-left:1px!important;margin-right:1px!important}
.order_info td:nth-child(1){text-align:right}
.order_info td:nth-child(2){text-align:left}
.add2{text-align:left}
.not-active1{pointer-events:none;cursor:default;text-decoration:none;color:black;}
.not-active2{pointer-events:none;cursor:default;text-decoration:none;color:black;}
</style>
<script>
function submit_cart_form() {
	<?php /* if($payment_mthod === 'payment_card') { ?>
	usaepay();
	<?php } else { ?>
	$( "#frmcontinue" ).submit();
	<?php } */ ?>
	$( "#frmcontinue" ).submit();
}

function usaepay(){
	var cno = $("#creditcardno").val();
	var cvcode = $("#cvvcode").val();
	if(cno == '') {
		alert('Please enter your card number!');
		$("#creditcardno").focus();
		return false;
	}
	if(cvcode == '') {
		alert('Please enter the CVV code!');
		$("#cvvcode").focus();
		return false;
	}
	var dataString = $("#frmcontinue").serialize();
	$('#cardResponse').html('Processing Please wait!...');

	$.ajax({
		url: "<?php echo base_url();?>shoppingbasket/usaepay", 
		type: "post",
		dataType: "html", 
		data:dataString, 
		error: function(){ 
             jContent.html( "<p>Page Not Found!!</p>" ); 
         }, 
         beforeSend: function(){ 

         }, 
         complete: function(){ 
             ShowStatus( "AJAX - complete()" ); 
         }, 
		success: function( data ){ 
			if(data == 'approved') {
				$('#cardResponse').html('Processing Complete');
				$( "#frmcontinue" ).submit();  
			} else {
				$('#cardResponse').html(data);  
			}
		} 
	});
}

function billForm() {
	$('#breadCrumbForm').submit();
}
</script>
<?php $this->load->helper('form'); ?>
<div class="order_confirm_block">
	<form id="breadCrumbForm" name="breadCrumbForm" action="<?php echo SITE_URL; ?>shoppingbasket/orderinformation" method="post">
		<div class="bread-crumb">
			<div class="breakcrum_bk">
				<ul>
					<li><a href="<?php echo config_item('base_url')?>">Home</a></li>
					<li><a href="<?php echo config_item('base_url')?>shoppingbasket/mybasket">Shopping Cart</a></li>
					<li><a href="#javascript;" onclick="billForm()">Billing and Shipping Address</a></li>
					<li><a href="<?php echo config_item('base_url')?>shoppingbasket/selectpaymentmethod">Payment</a></li>
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
				<h1 class="head_seting">Confirm &amp; Submit Order</h1>
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
		echo form_open(SITE_URL.'shoppingbasket/order_confirmation/true', $attributes);
		?>
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
							$adjewelryView = '';
							$addUniqueView = '';
							$imgwidth = 146;
							$addwatchview = '';

							$this->load->helper('t');
							$totalcart_price = 0;
							$i=1;
							foreach ($mycartitems as $myCartIndex => $item){
								$item_name = isset($item['name'])?$item['name']:get_site_title();
								$rapnet_diamnd = $this->Cartmodel->getrapnet_diamond_detail($item['lot']);
								$dmitem_title = isset($rapnet_diamnd[0]['Girdle'])?$rapnet_diamnd[0]['Girdle']:'';
								$itemWirePrice = wire_price($item['totalprice']);
								$discount_price = $item['price'] * $item['quantity'];
								$item_price = (isset($item['item_price']) && $item['item_price'] > 0 ? $item['item_price'] : $item['price'] );
								$totalRingPrice = $item_price * $item['quantity'];
								$item_final_wireprice = wire_price($discount_price);
								switch($item['addoption']) {
									case 'addtoring':
										$diamond = getDetailsByLot($item['lot']);
										$dprice = $diamond['price'];
										$setttings = getAllByRindID($item['ringsetting']);
										$ringset_price = floatval($item['setting_price'])*$item['quantity'];
										$totalitemPrice = ( $item['setting_price'] + $diamond['price'] ) * $item['quantity'];
										$itmWirePrice = wire_price($totalitemPrice);
										$setting_imgurl = '';
										$rings_image = $this->Catemodel->getengRingsImgViaId($item['ringsetting']);
										if(!empty($rings_image['image'])){
											$images = explode(";",$rings_image['image']);
											if(@getimagesize($images[0]) && $images[0] != ""){
												$setting_imgurl = $images[0];
											}elseif(@getimagesize($images[1]) && $images[1] != ""){
												$setting_imgurl = $images[1];
											}elseif(@getimagesize($images[2]) && $images[2] != ""){
												$setting_imgurl = $images[2];
											}elseif(@getimagesize($images[3]) && $images[3] != ""){
												$setting_imgurl = $images[3];
											}elseif(@getimagesize($images[4]) && $images[4] != ""){
												$setting_imgurl = $images[4];
											}else{
												$setting_imgurl = SITE_URL .'images/no_image.jpeg';
											}
										}else{
											$setting_imgurl = SITE_URL .'images/no_image.jpeg';
										}
										$sname = isset($setttings['name'])?$setttings['name']:'';
										$sstyleGroup = isset($setttings['style_group'])?$setttings['style_group']:'';
										$sprice = isset($item['price'])?$item['price']:0;
										$addtoringview .= '<div class="row-fluid">';
										$addtoringview .= '<div class="imgleft_cols col-sm-2"><img src="'.$setting_imgurl.'" width="'.$imgwidth.'" alt="Ring" />
											<div class="viewDt"><a href="'.$item['item_url'].'">View Detail</a></div></div>
											<div class="detail_rightbk col-sm-10">
												<div class="checkout_cols">
											<div class="shiping_row">
												<span>'.$sname.'</span>
												<span></span>
											</div>
											<div class="shiping_row">
												<span>Item: '.$sstyleGroup.' </span>
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
											<span>$'._nf($totalitemPrice).'</span>
										</div>
										<div class="shiping_row pricerow">
											<span>Wire Price :</span>
											<span>$'._nf($itmWirePrice).'</span>
										</div>
										</div>
										</div>
										<div class="clear"></div><br>
										<div class="botom_line"></div><br></div>';
										$tringTotal = $tringTotal + $totalitemPrice;
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
										$toearingview .= '<div class="imgleft_cols col-sm-2"><img src="'.$vimage_urlink.'" width="'.$imgwidth.'" alt="Ring" />
										<div class="viewDt"><a href="'.$item['item_url'].'">View Detail</a></div></div>
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
										</div>';

										if( !empty($item['coupon_code']) ) {
											$toearingview .= '<div class="shiping_row pricerow">
											<span>Coupon Code :</span>
											<span>'.$item['coupon_code'].'</span>
											</div>
											<div class="shiping_row pricerow">
											<span>Discount Price :</span>
											<span>$'._nf($discount_price).'</span>
											</div>
											<div class="shiping_row pricerow">
											<span>Wire Price :</span>
											<span>$'._nf($item_final_wireprice).'</span>
											</div>';
										} else {
											$toearingview .= '<div class="shiping_row pricerow">
											<span>Wire Price :</span>
											<span>$'._nf($item_final_wireprice).'</span>
											</div>';
										}
										$toearingview .= '</div>
										</div>
										<div class="clear"></div><br>
										<div class="botom_line"></div><br></div>';

										$tearTotal = $tearTotal + $item_final_wireprice;
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
										$tosolitairview .= '<div class="imgleft_cols col-sm-2">
											<img src="'.$pendant_imgurl.'" width="'.$imgwidth.'" alt="Ring" />
											<div class="viewDt"><a href="'.$item['item_url'].'">View Detail</a></div>
											</div>
											<div class="detail_rightbk col-sm-10">
												<div class="checkout_cols">
											<div class="shiping_row">
												<span>'.$setttings['description'].'</span>
												<span></span>
											</div>
											<div class="shiping_row">
												<span>Stock Number: '.$item['stock_number'].'</span>
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
										<div class="botom_line"></div><br></div>';
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
											$threstPendantView .= '<div class="imgleft_cols col-sm-2"><img src="'.$pendante_image.'" width="'.$imgwidth.'" alt="Ring" />
											<div class="viewDt"><a href="'.$item['item_url'].'">View Detail</a></div></div>
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
										<div class="botom_line"></div><br></div>';
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
											$unique_ringimg = config_item('base_url').str_replace(config_item('base_url'),"",$item['image_url']);
											$thestone_setinglink = config_item('base_url').'jewelry/tothree_stonedetail/'.$item['ringsetting'];
											$setting_metal = ( $setttings['metal'] == 'WhiteGold' ? 'White Gold' : $setttings['metal'] );
										}
										$threstone_ringname = $details['style'].' '.$setttings['shape'].' Diamond Engagement Ring';
										$threstone_ringname = ( !empty($threstone_ringname) ?  $threstone_ringname : 'Three-Stone Ring' );

										$tothreeview .= '<div class="row-fluid">';
										$tothreeview .= '<div class="imgleft_cols col-sm-2"><img src="'.$unique_ringimg.'" width="'.$imgwidth.'" alt="Ring" />
										<div class="viewDt"><a href="'.$item['item_url'].'">View Detail</a></div></div>
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
										<div class="botom_line"></div><br></div>';
										$tothreeTotal = $tothreeTotal + $item['totalprice'];
									break;

									case 'addjewelry':
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
										$jewelryTotal = $item['price']*$item['quantity'];
										$wirePrice = wire_price($jewelryTotal);					
										if((strpos($item['image_url'], config_item('base_url')) !== false)){
											$imgUrljw = config_item('base_url').str_replace(config_item('base_url'),"",$item['image_url']);
										}elseif((strpos($item['image_url'], 'http://') !== false) || (strpos($item['image_url'], 'https://') !== false)){
											$imgUrljw = str_replace(config_item('base_url'),"",$item['image_url']);
										}else{
											$imgUrljw = config_item('base_url').str_replace(config_item('base_url'),"",$item['image_url']);
										}
										$adjewelryView = '';
										$adjewelryView .= '<div class="row-fluid">';
											$adjewelryView .= '<div class="imgleft_cols col-sm-2"><a href="'.$item['item_url'].'"><img src="'.$imgUrljw.'" width="'.$imgwidth.'" alt="'.$lotdm_shape.'" /></a>
											<div class="viewDt"><a href="'.$item['item_url'].'">View Detail</a></div></div>
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
										</div>';
										if( $item['ezpay_option'] > 0 ) {
											$item_cart_price = $item['ezpay'] * $item['quantity'];
											$adjewelryView .= '<div class="shiping_row">
											<span>'.EZPAY_LABEL.': </span>
											<span>'.$item['ezpay_option'].' Months</span>
											</div>
											<div class="shiping_row">
											<span>First Payment: </span>
											<span>$'._nf($item_cart_price, 2).'</span>
											</div>';
										} else {
											$item_cart_price = $wirePrice;
										}
										$adjewelryView .= '</div>
										</div>
										<div class="clear"></div><br>
										<div class="botom_line"></div><br></div>';
										$adjewelryTotal = $adjewelryTotal + $item_cart_price;
									break;

									case 'addunique':
										$item['price'] = intval(number_format($item['price'],0,'.',''));
										$item['quantity'] = intval($item['quantity']);

										$uniqe_dtlink = $item['unique_urlink'];
										$getCateName  = explode("/", $uniqe_dtlink);
										if(isset($getCateName) && !empty($getCateName)){
											$details = getuniquedetail2(isset($getCateName[5])?$getCateName[5]:'');
											$itemCateName = strtoupper(isset($getCateName[7])?$getCateName[7]:'');
										}else{
											$details['stone_weight'] = '';
											$itemCateName = '';
										}
										$iteMetal = str_replace('_',' ',$item['item_metal']);
										$itemSize = str_replace('_','/',$item['dsize']);
										$getRingDMShape = explode('/', isset($details['stone_weight'])?$details['stone_weight']:'');
										$lotdm_shape = view_shape_value($lot_image, isset($getRingDMShape[1])?$getRingDMShape[1]:'');
										$itemName = $itemCateName.' Style Diamond Semi Mount Ring';
										$rowsring = $this->Catemodel->getRingsDetailViaId($item['lot']);
										$engr_price = ( !empty($item['engraved_text']) ? 30 : 0 );
										$unRingPrice = $item['price'] * $item['quantity'];
										if((strpos($item['image_url'], 'http://') !== false) || (strpos($item['image_url'], 'https://') !== false)){
											$imgUrl = $item['image_url'];
										}else{
											$imgUrl = config_item('base_url').str_replace(config_item('base_url'),"",$item['image_url']);
										}

										$addUniqueView .= '<div class="row-fluid">';
											$addUniqueView .= '<div class="imgleft_cols col-sm-2">
							                <img src="'. $imgUrl .'" width="'.$imgwidth.'" alt="'.$lotdm_shape.'" />
							                <div class="viewDt"><a href="'.$item['item_url'].'">View Detail</a></div>
							                </div>
											<div class="detail_rightbk col-sm-10">
												<div class="checkout_cols">
											<div class="shiping_row">
												<span>'.$item['item_title'].'</span>
												<span></span>
											</div>
											<div class="shiping_row">
												<span>Stock Number: </span>
												<span>'.$item['stock_number'].'</span>
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
												<span>Finish Level: </span>
												<span>'.set_finish_level($item['finish_level']).'</span>
											</div>
											<div class="shiping_row">
												<span>Metal Weight:</span>
												<span>'.$rowsring['metal_weight'].'</span>
											</div>
											<div class="shiping_row">
												<span>Stone Weight: </span>
												<span>'.$rowsring['stone_weight'].'</span>
											</div>';
											$diamond['price'] = 0;
											if( !empty($item['sidestone1']) ) {
												$diamond = getDetailsByLot( $item['sidestone1']) ;

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
												<span>Engraved Text :</span>
												<span style="font-family:'.$item['engraved_font'].'; font-size: 12px;">'.$item['engraved_text'].'</span>
												</div>
												<div class="shiping_row">
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
											</div>';
											if( $item['ezpay_option'] > 0 ) {
												$item_cart_price = $item['ezpay'] * $item['quantity'];
												$addUniqueView .= '<div class="shiping_row">
												<span>'.EZPAY_LABEL.': </span>
												<span>'.$item['ezpay_option'].' Months</span>
												</div>
												<div class="shiping_row">
												<span>First Payment: </span>
												<span>$'._nf($item_cart_price, 2).'</span>
												</div>';
											} else {
												$item_cart_price = $uniqueWirePrice;
											}
											$addUniqueView .= '</div>
											</div>
											<div class="clear"></div><br>
											<div class="botom_line"></div><br>
										</div>';
										$adUniqueTotal = $adUniqueTotal + $item_cart_price;
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
											$addUniqueView .= '<div class="imgleft_cols col-sm-2">
											<img src="'.config_item('base_url').str_replace(config_item('base_url'),"",$item['image_url']).'" width="112" alt="'.$itemName.'" />
											<div class="viewDt"><a href="'.$item['item_url'].'">View Detail</a></div>
											</div>
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
											$addUniqueView .= '<div class="imgleft_cols col-sm-2"><img src="'.config_item('base_url').str_replace(config_item('base_url'),"",$item['image_url']).'" width="112" alt="'.$itemName.'" /><div class="viewDt"><a href="'.$item['item_url'].'">View Detail</a></div></div>
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
											</div>';
											if( $item['ezpay_option'] > 0 ) {
												$item_cart_price = $item['ezpay'] * $item['quantity'];
												$addUniqueView .= '<div class="shiping_row">
												<span>'.EZPAY_LABEL.': </span>
												<span>'.$item['ezpay_option'].' Months</span>
												</div>
												<div class="shiping_row">
												<span>First Payment: </span>
												<span>$'._nf($item_cart_price, 2).'</span>
												</div>';
											} else {
												$item_cart_price = $netTotalCartPrice;
											}
											$addUniqueView .= '</div>
											</div>
											<div class="clear"></div><br>
											<div class="botom_line"></div><br>
										</div>';
										$adUniqueTotal = $adUniqueTotal + $item_cart_price;
									break;

									case 'tvjohny_collection_item':
										$details = $this->tvjohny_watchesmodel->getRolexWatchesDetail($item['lot']);
										$item['quantity'] = intval($item['quantity']);

										$uniqe_dtlink = SITE_URL.'tvjonhy_watches/rolex_watches_detail/'.$item['lot'];
										$itemName = $item['name'];

										$unRingPrice = $item['price'] * $item['quantity'];
										$netTotalCartPrice = $unRingPrice;
										$uniqueWirePrice = wire_price($netTotalCartPrice);
										$tvjohny_fields = getTvJonyTableFields(); /// ringsection helper

										$addUniqueView .= '<div class="row-fluid">';
											$addUniqueView .= '<div class="imgleft_cols col-sm-2"><img src="'.config_item('base_url').str_replace(config_item('base_url'),"",$item['image_url']).'" width="112" alt="'.$itemName.'" /></div>
											<div class="detail_rightbk col-sm-10">
											<div class="checkout_cols">
											<div class="shiping_row">
											<span>'.$itemName.'</span>
											<span></span>
											</div>
											<div class="shiping_row">
											<span>Item Number: </span>
											<span>'.$details['SKU'].'</span>
											</div>
											<div class="shiping_row">
											<span>Item Type: </span>
											<span>'.check_empty($details['Category'], 'NA').'</span>
											</div>';
											$addUniqueView .= '<div class="shiping_row">
											<span>Category: </span>
											<span>'.check_empty($details['Subcategory_1'], 'NA').'</span>
											</div>';
											$addUniqueView .= '<div class="shiping_row">
											<span>Ring Size: </span>
											<span>'.$item['default_ringsize'].'</span>
											</div>';
											$addUniqueView .= '<div class="shiping_row">
											<span>Finish Level: </span>
											<span>'.set_finish_level($item['finish_level']).'</span>
											</div>';
											foreach( $tvjohny_fields as $fieldTitle ) {
												$field_lable = str_replace('_', ' ', $fieldTitle);
												if( !empty($details[$fieldTitle]) ) {
													$addUniqueView .= '<div class="shiping_row">
													<span>'.$field_lable.':</span>
													<span>'.$details[$fieldTitle].'</span>
													</div>';
												}
											}
											$addUniqueView .= '<div class="shiping_row pricerow">
											<span>Sale Price :</span>
											<span>$'._nf($unRingPrice).'</span>
											</div>';
											if( $item['ezpay_option'] > 0 ) {
											$item_cart_price = $item['ezpay'] * $item['quantity'];
											$addUniqueView .= '<div class="shiping_row">
											<span>'.EZPAY_LABEL.': </span>
											<span>'.$item['ezpay_option'].' Months</span>
											</div>
											<div class="shiping_row">
											<span>First Payment: </span>
											<span>$'._nf($item_cart_price, 2).'</span>
											</div>';
											} else {
											$item_cart_price = $netTotalCartPrice;
											}
											$addUniqueView .= '</div>
											</div>
											<div class="clear"></div><br>
											<div class="botom_line"></div><br>
										</div>';
										$adUniqueTotal = $adUniqueTotal + $item_cart_price;
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
											$addUniqueView .= '<div class="imgleft_cols col-sm-2">
											<img src="'.config_item('base_url').str_replace(config_item('base_url'),"",$item['image_url']).'" width="112" alt="'.$itemName.'" />
											<div class="viewDt"><a href="'.$item['item_url'].'">View Detail</a></div>
											</div>
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

									case 'wb_diamond':
									case 'wb_ladies':
									case 'wb_platinum':
									case 'wb_mens':
									case 'wb_studs':
									case 'wb_hoops':
									case 'gemstone':
									case 'wb_classic':
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
											$addUniqueView .= '<div class="imgleft_cols col-sm-2"><a href="'.$item['item_url'].'"><img src="'.SITE_URL.$item['image_url'].'" width="112" alt="'.$itemName.'" /></a>
											<div class="viewDt"><a href="'.$item['item_url'].'">View Detail</a></div></div>
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
											</div>';
											if( $item['ezpay_option'] > 0 ) {
											$item_cart_price = $item['ezpay'] * $item['quantity'];
											$addUniqueView .= '<div class="shiping_row">
											<span>'.EZPAY_LABEL.': </span>
											<span>'.$item['ezpay_option'].' Months</span>
											</div>
											<div class="shiping_row">
											<span>First Payment: </span>
											<span>$'._nf($item_cart_price, 2).'</span>
											</div>';
											} else {
											$item_cart_price = $netTotalCartPrice;
											}        
											$addUniqueView .= '</div>
											</div>
											<div class="clear"></div><br>
											<div class="botom_line"></div><br>
										</div>';
										$adUniqueTotal = $adUniqueTotal + $item_cart_price;
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
											$addUniqueView .= '<div class="imgleft_cols col-sm-2"><img src="'.QUALITY_IMGS.$details['large_image'].'" width="112" alt="'.$itemName.'" />
											<div class="viewDt"><a href="'.$item['item_url'].'">View Detail</a></div></div>
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

											if( $engr_price > 0)
											{
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
											$addUniqueView .= '<div class="imgleft_cols col-sm-2"><img src="'.$ringsImg.'" width="112" alt="'.$itemName.'" />
											<div class="viewDt"><a href="'.$item['item_url'].'">View Detail</a></div></div>
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

									case 'sterncollection':
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
											$addUniqueView .= '<div class="imgleft_cols col-sm-2"><img src="'.config_item('base_url').str_replace(config_item('base_url'),"",$item['image_url']).'" width="112" alt="'.$itemName.'" />
											<div class="viewDt"><a href="'.$item['item_url'].'">View Detail</a></div></div>
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
											$addUniqueView .= '<div class="imgleft_cols col-sm-2"><img src="'.config_item('base_url').str_replace(config_item('base_url'),"",$item['image_url']).'" width="112" alt="'.$itemName.'" />
											<div class="viewDt"><a href="'.$item['item_url'].'">View Detail</a></div></div>
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
							$totalcart_price = $tringTotal + $tearTotal + $stpendantTotal + $threestonepdtTotal + $tothreeTotal + $adjewelryTotal + $adUniqueTotal + $procesing_fees + $watchtotal;
							$total_cartprice = $totalcart_price - $procesing_fees;
							$ordercart_view = $addtoringview.$toearingview.$tosolitairview.$threstPendantView.$tothreeview.$adjewelryView.$addUniqueView.$addwatchview;
							echo $ordercart_view;
							$salesTaxAmount = $totalcart_price * ( $salesTaxPercnt / 100 );   
							$sets_ship_method = $this->session->userdata('sets_ship_method');
							$ship_options = shipping_option_price($sets_ship_method); 
							$netTotalOrderAmount = $totalcart_price + $salesTaxAmount + $ship_options['ship_price'];
							?>
						</div>
						<input type="hidden" name="totalprice" id="totalprice" value="<?php echo $totalcart_price;?>">
						<input type="hidden" name="paymentmethod" id="paymentmethod" value="furtherprocess">
						<br><br>
						<div class="summary_detailbk row-fluid">
							<div class="col-sm-4">
								<div class="shipHead">Ship To</div>
								<div><?php echo $full_name; ?></div>
								<div>Contact: <?php echo $cust_info->phone; ?></div>
								<div><?php echo $cust_info->email; ?></div>
								<div>City: <?php echo $cust_info->city; ?></div>
								<div>State: <?php echo !empty($cust_info->state)?$cust_info->state:''; ?></div>
								<div>Zip: <?php echo $cust_info->postcode; ?></div>
								<div>Country: <?php echo $cust_info->country; ?></div>
								<div>Address1: <?php echo $cust_info->address; ?></div>
								<!--<div>Address2: <?php echo $cust_info->address2; ?></div>-->
								<div><?php echo $postal_adress; ?></div>
								<?php
								if(empty($cart_message)) {
								echo '<div class="editLink"><a href="#javascript;" onclick="billForm()">Edit</a></div>';
								}
								?>
							</div>
							<div class="col-sm-4">
								<div class="shipHead">Billing Address</div>
								<div><?php echo $billing_fullname; ?></div>
								<div>Contact: <?php echo $cust_info->billing_phone; ?></div>
								<div><?php echo $cust_info->billing_email; ?></div>
								<div>City: <?php echo $cust_info->billing_city; ?></div>
								<div>State: <?php echo !empty($cust_info->billing_state)?$cust_info->billing_state:''; ?></div>
								<div>Zip: <?php echo $cust_info->billing_postcode; ?></div>
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
								<div><?php echo $payment_method; ?></div>
								<div>You will be contacted shortly</div>
								<?php
								if(empty($cart_message)) {
								echo '<div class="editLink"><a href="'.SITE_URL.'shoppingbasket/selectpaymentmethod">Edit</a></div>';
								}
								?>
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
									if($payment_mthod != 'payment_card'){
										echo '<a href="#javascript" onclick="submit_cart_form()"><img src="'.config_item('base_url').'img/page_img/submit_order.jpg"></a>';	
									}/* else{
										echo '<a href="#javascript" onclick="submit_cart_form()" class="not-active1"><img src="'.config_item('base_url').'img/page_img/submit_order.jpg"></a>';
									} */
								} else {
									echo '<img src="'.config_item('base_url').'images/order_confirm.jpg">';
								}
							}
							?>
						</div><br>
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
								<?php
								echo '<span>'.$ship_options['ship_method'].' </span>
								<span>$'.$ship_options['ship_price'].'</span>';
								?>
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
						<div id="payment_viacard" style="display: <?php if( ( $payment_mthod === 'payment_card') && empty($cart_message) ) { echo 'block'; } else { echo 'none'; } ?>;">
							<?php /* <br>
							We can only accept US, Canadian, and Australian credit cards online. For other cards, 
							please contact us. If you would like to pay with more than one credit card, call <?php echo CONTACT_NO; ?>.<br> */ ?>
							<link rel="stylesheet" href="<?php echo config_item('base_url'); ?>css/paypalstyle.css">
							<div id="paymentSection">
								<input type="hidden" name="city" value="<?php echo $cust_info->city; ?>">
								<input type="hidden" name="zipcode" value="<?php echo $cust_info->postcode; ?>">
								<input type="hidden" name="countryCode" value="<?php echo $cust_info->country; ?>">
								<input type="hidden" name="payableAmount" value="<?php echo number_format($netTotalOrderAmount,0, '.', ''); ?>">
								<ul>
									<li>
										<label>Card number</label>
										<input type="text" placeholder="1234 5678 9012 3456" maxlength="20" id="card_number" name="card_number">
									</li>
									<li class="vertical">
										<ul>
											<li>
												<label>Expiry month</label>
												<input type="text" placeholder="MM" maxlength="5" id="expiry_month" name="expiry_month">
											</li>
											<li>
												<label>Expiry year</label>
												<input type="text" placeholder="YYYY" maxlength="5" id="expiry_year" name="expiry_year">
											</li>
											<li>
												<label>CVV</label>
												<input type="text" placeholder="123" maxlength="3" id="cvv" name="cvv">
											</li>
										</ul>
									</li>
									<li>
										<label>Name on card</label>
										<input type="text" placeholder="John Doe" id="name_on_card" name="name_on_card">
									</li>
									<li>
										<input type="hidden" name="card_type" id="card_type" value=""/>
										<input type="hidden" name="odrID" id="odrID" value="<?php echo $this->session->userdata('svar_orderid');?>"/>
										<input type="button" name="card_submit" id="cardSubmitBtn" value="Pay Now" class="payment-btn" disabled="true" >
									</li>
								</ul>
							</div>
							<script src="<?php echo config_item('base_url'); ?>js/creditCardValidator.js"></script>
							<script>
							/* Credit card validation code */
							function cardFormValidate(){
								var cardValid = 0;
								// Card number validation
								$('#card_number').validateCreditCard(function(result) {
									var cardType = (result.card_type == null)?'':result.card_type.name;
									if(cardType == 'Visa'){
										var backPosition = result.valid?'2px -163px, 260px -87px':'2px -163px, 260px -61px';
									}else if(cardType == 'MasterCard'){
										var backPosition = result.valid?'2px -247px, 260px -87px':'2px -247px, 260px -61px';
									}else if(cardType == 'Maestro'){
										var backPosition = result.valid?'2px -289px, 260px -87px':'2px -289px, 260px -61px';
									}else if(cardType == 'Discover'){
										var backPosition = result.valid?'2px -331px, 260px -87px':'2px -331px, 260px -61px';
									}else if(cardType == 'Amex'){
										var backPosition = result.valid?'2px -121px, 260px -87px':'2px -121px, 260px -61px';
									}else{
										var backPosition = result.valid?'2px -121px, 260px -87px':'2px -121px, 260px -61px';
									}
									$('#card_number').css("background-position", backPosition);
									if(result.valid){
										$("#card_type").val(cardType);
										$("#card_number").removeClass('required');
										cardValid = 1;
									}else{
										$("#card_type").val('');
										$("#card_number").addClass('required');
										cardValid = 0;
									}
								});
								  
								// Card details validation
								var cardName = $("#name_on_card").val();
								var expMonth = $("#expiry_month").val();
								var expYear = $("#expiry_year").val();
								var cvv = $("#cvv").val();
								var regName = /^[a-z ,.'-]+$/i;
								var regMonth = /^01|02|03|04|05|06|07|08|09|10|11|12$/;
								var regYear = /^2017|2018|2019|2020|2021|2022|2023|2024|2025|2026|2027|2028|2029|2030|2031$/;
								var regCVV = /^[0-9]{3,3}$/;
								if(cardValid == 0){
									$("#card_number").addClass('required');
									$("#card_number").focus();
									return false;
								}else if(!regMonth.test(expMonth)){
									$("#card_number").removeClass('required');
									$("#expiry_month").addClass('required');
									$("#expiry_month").focus();
									return false;
								}else if(!regYear.test(expYear)){
									$("#card_number").removeClass('required');
									$("#expiry_month").removeClass('required');
									$("#expiry_year").addClass('required');
									$("#expiry_year").focus();
									return false;
								}else if(!regCVV.test(cvv)){
									$("#card_number").removeClass('required');
									$("#expiry_month").removeClass('required');
									$("#expiry_year").removeClass('required');
									$("#cvv").addClass('required');
									$("#cvv").focus();
									return false;
								}else if(!regName.test(cardName)){
									$("#card_number").removeClass('required');
									$("#expiry_month").removeClass('required');
									$("#expiry_year").removeClass('required');
									$("#cvv").removeClass('required');
									$("#name_on_card").addClass('required');
									$("#name_on_card").focus();
									return false;
								}else{
									$("#card_number").removeClass('required');
									$("#expiry_month").removeClass('required');
									$("#expiry_year").removeClass('required');
									$("#cvv").removeClass('required');
									$("#name_on_card").removeClass('required');
									$('#cardSubmitBtn').prop('disabled', false);  
									return true;
								}
							}

							/* Submit card details and make payment */ 
							$(document).ready(function(){
								$("input#card_number").keyup(function(){
									cardFormValidate();
								});
								$("input#expiry_month").keyup(function(){
									cardFormValidate();
								});
								$("input#expiry_year").keyup(function(){
									cardFormValidate();
								});
								$("input#cvv").keyup(function(){
									cardFormValidate();
								});
								$("input#name_on_card").keyup(function(){
									cardFormValidate();
								});

								$("#cardSubmitBtn").on('click',function(){
									$('.status-msg').remove();
									if(cardFormValidate()){
										var formData = $('form#frmcontinue').serialize();
										$.ajax({
											type:'POST',
											url:"<?php echo config_item('base_url'); ?>paypal/Payflow_process.php",
											dataType: "json",
											data:formData,
											beforeSend: function(){
												$("#cardSubmitBtn").prop('disabled', true);
												$("#cardSubmitBtn").val('Processing....');
											},
											success:function(data){
												if(data.status == 1){
													$('#paymentSection').html('<p class="status-msg success">The transaction was successful. Transaction ID: <span>'+data.responce+'</span>, Order ID: <span>'+data.orderID+'</span></p>');
													setTimeout(function(){
														$( "#frmcontinue" ).submit();
													}, 10000);
												}else{
													$("#cardSubmitBtn").prop('disabled', false);
													$("#cardSubmitBtn").val('Proceed');
													$('#paymentSection').prepend('<p class="status-msg error">Transaction has been failed, please try again.</p>'+data.responce+'');
												}
											}
										});
									}
								});
							});
							</script>
							<?php /* <div class="card_form" style="display:none;">
								<div id="cardResponse" class="errorMsg"></div>
								<div class="label_rows">
									<span>Credit Card Number</span>
									<span><input type="text" class="cardField" value="<?php echo $rowcust_info->cc_number; ?>" name="creditcardno" id="creditcardno" /><br>
									<img src="<?php echo config_item('base_url'); ?>images/payment_cards.jpg" alt="" class="viewCard" /></span>
								</div>
								<div class="label_rows">
									<span>Expiration</span>
									<span>
										<select name="expmonth" id="expmonth" class="monthField1">
											<?php
											$month='';
											$selected = ( !empty($rowcust_info->exp_month) ? $rowcust_info->exp_month : date('m') );
											for($m=1; $m<=12; $m++) {
												$mn = ( $m < 10 ? '0'.$m : $m );
												$month .= '<option value="'.$mn.'" '.selectedOption($selected,$m).'>'.$m.'</option>';
											}
											echo $month;
											?>
										</select>&nbsp;
										<select name="expyear" id="expyear" class="yearSt">
											<?php
											$year = date('Y');
											$year_option = '';
											$selected1 = ( !empty($rowcust_info->exp_year) ? $rowcust_info->exp_year : $year );
											for($y = $year; $y <= 2030; $y++) {
												$year_option .= '<option '.selectedOption($y,$selected1).'>'.$y.'</option>';	
											}
											echo $year_option;
											?>
										</select>
									</span>
								</div>
								<div class="label_rows">
									<span>CVV Code</span>
									<span><input type="text" name="cvvcode" id="cvvcode" value="<?php echo $rowcust_info->cvv_code; ?>" class="monthField" /></span>
								</div>
							</div> */ ?>
						</div>
					</div>
				</div>
				<div class="clear"></div>
				<div></div>
				<script type="text/javascript">
				function showmsgx(){
					if(document.getElementById('creditcard').checked != true && document.getElementById('phone').checked != true && 	document.getElementById('moneyorder').checked != true){
						alert('Please select a method of payment'); 
					}
				}
				</script>
				<div class="clear"></div>
				<?php if($payment_mthod === 'payment_byphone') { ?>
					<div class="guidline_block">
						<div class="phoneHead">Call for One-on-One Guidence</div> 
						<div class="clear"></div>
						<p>When you are ready to make a purchase, contact our customer service staff at <?php echo CONTACT_NO; ?>. Please be ready to:</p>
						<p class="pad10">
						1. Give this order number:<span class="bgblue"><?php echo $orderid;?></span> <br><br>
						2. Provide us with the stock numbers of the products you wish to purchase (listed below), your credit card number, and shipping address.
						</p>
						<br>
						<P>Please note that to complete this purchase you must make payment through Customer Service. Orders are not placed on hold and are subject to sale until payment has been completed.</P>
					</div>
					<div class="clear"></div><br>
				<?php } ?>
				<br><br>
				<div class="newbotom_line"></div>
				<div id="further_asistcols" class="checkout_cols">
					<h3>Need Assistance</h3>
					<div>
						<span class="contactNo"><?php echo get_site_title('contact_info'); ?></span>
						<span class="emailUs"><a href="mailto:<?php echo get_site_title('email'); ?>">Email Us</a></span>
					</div>
					<div class="clear"></div>
				</div> 
				<div class="submitOrdr">
					<?php
					if(empty($cart_message) && $payment_mthod != 'paypal') {
						if($payment_mthod != 'payment_card'){
							echo '<a href="#javascript" onclick="submit_cart_form()" ><img src="'.config_item('base_url').'img/page_img/submit_order.jpg"></a>';
						}/* else{
							echo '<a href="#javascript" onclick="submit_cart_form()" class="not-active2"><img src="'.config_item('base_url').'img/page_img/submit_order.jpg"></a>';
						} */
					}
					?>
				</div>
				<div class="clear"></div>
			</div>
		<?php echo form_close();?>
	</div>
    <?php if( $payment_mthod == 'paypal' ) { ?>
		<div class="submitOrdr paypal_submit"> 
			<form action="https://www.paypal.com/cgi-bin/webscr" method="post" name="form1" id="form1">
				<input type="hidden" name="cmd" value="_xclick">
				<input type="hidden" name="business" value="orders@godstonediamonds.com">
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
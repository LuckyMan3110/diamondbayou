<style type="text/css">
.oldcontainer{margin-left:1px!important;margin-right:1px!important}
.order_info td:nth-child(1){text-align:right}
.order_info td:nth-child(2){text-align:left}
.add2{text-align:left}
.errorMsg{color:red;font-size:14px;margin-bottom:15px;line-height:16px}
</style>
<script>
function setPaymentOption(blockid) {
	var ar = ['payment_card', 'paypal','payment_bankwire','payment_byphone'];
	for(var i=0; i<=ar.length; i++) {
		if(ar[i] === blockid) {
			$('#'+ar[i]+' .payment_label').addClass('activeLabel');
			$('#payment_method').val(ar[i]);
			
		} else {
			$('#'+ar[i]+' .payment_label').removeClass('activeLabel');
			$('#payment_viacard').hide();
		}
	}
	if(blockid == 'payment_card') {
		$('#payment_viacard').show();
	}
}
//// submit form
function checkSubmitForm() {
	var pmt = $("#payment_method").val();
	if(pmt === 'payment_card') {
		usaepay();
	} else {
		$( "#frmcontinue" ).submit();
	}
}
</script>
<script>
function usaepay() {
	$( "#frmcontinue" ).submit();
}
function billForm() {
	$('#breadCrumbForm').submit();
}
</script>
<?php 
$this->load->helper('form');  
$attributes = array('method' => 'POST', 'id' => 'frmcontinue');

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
$tothreeview = '';$adjewelryView = '';
$addUniqueView = '';
$addwatchview = '';
$this->load->helper('t');
$totalcart_price = 0;
foreach ($mycartitems as $myCartIndex => $item){
	$item_name = isset($item['name'])?$item['name']:get_site_title();
	//$rapnet_diamnd = $this->Cartmodel->getrapnet_diamond_detail($item['lot']);
	//$dmitem_title = $rapnet_diamnd[0]['Girdle'];
	$itemWirePrice = wire_price($item['totalprice']);
	$discount_price = $item['price'] * $item['quantity'];
	$item_price = (isset($item['item_price']) && $item['item_price'] > 0 ? $item['item_price'] : $item['price'] );
	$totalRingPrice = $item_price * $item['quantity'];
	$item_final_wireprice = wire_price($discount_price);

	switch($item['addoption']) {
		case 'addtoring':
			$diamond = getDetailsByLot($item['lot']);
			$dprice = $diamond['price'];
			//$ringst_shape = view_shape_value($ringst_img, $side2['shape']);
			//$ringst_image  = $shape_imgurl.$ringst_img;
			$setttings = getAllByRindID($item['ringsetting']);
			$ringset_price = floatval($item['setting_price'])*$item['quantity'];
			$sprice = $item['price'];
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
			$addtoringview .= '<div class="row-fluid">';
				$addtoringview .= '<div class="imgleft_cols col-sm-2">
					<img src="'.$setting_imgurl.'" width="112" alt="Ring" />
					<div class="viewDt"><a href="'.$item['item_url'].'">View Detail</a></div>
				</div>
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
				<div class="botom_line"></div><br>
			</div>';
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
				$toearingview .= '<div class="imgleft_cols col-sm-2">
					<img src="'.$vimage_urlink.'" width="112" alt="Ring" />
					<div class="viewDt"><a href="'.$item['item_url'].'">View Detail</a></div>
				</div>
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
				<div class="botom_line"></div><br>
			</div>';
			$tearTotal = $tearTotal + $item_final_wireprice;
		break;

		case 'addpendantsetings':
			$diamond = getDetailsByLot($item['lot']);
			//$ringst_shape = view_shape_value($pendant_dmimg, $diamond['shape']);
			//$pndt_image  = $shape_imgurl.$pendant_dmimg;

			$dprice = intval(number_format($diamond['price'],0,'.',''));
			$dmPrice = intval($item['quantity'])*$diamond['price'];

			$setttings = getPendentSettingsById($item['pendantsetting']);
			$sprice = intval(number_format($setttings['price'],0,'.',''));
			$pendant_imgurl = config_item('base_url').$setttings['small_image'];

			$tosolitairview .= '<div class="row-fluid">';
				$tosolitairview .= '<div class="imgleft_cols col-sm-2">
					<img src="'.$pendant_imgurl.'" width="112" alt="Ring" />
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
				$threstPendantView .= '<div class="imgleft_cols col-sm-2">
					<img src="'.$pendante_image.'" width="112" alt="Ring" />
				</div>
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
			////// build three stone ring
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

			//// unique 3stone ring
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
				$tothreeview .= '<div class="imgleft_cols col-sm-2">
					<img src="'.$unique_ringimg.'" width="112" alt="Ring" />
					<div class="viewDt"><a href="'.$item['item_url'].'">View Detail</a></div>
				</div>
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
			$jewelryTotalPrice = $item['price']*$item['quantity'];
			$wirePrice = wire_price($jewelryTotalPrice);
			if((strpos($item['image_url'], config_item('base_url')) !== false)){
				$imgUrljw = config_item('base_url').str_replace(config_item('base_url'),"",$item['image_url']);
			}elseif((strpos($item['image_url'], 'http://') !== false) || (strpos($item['image_url'], 'https://') !== false)){
				$imgUrljw = str_replace(config_item('base_url'),"",$item['image_url']);
			}else{
				$imgUrljw = config_item('base_url').str_replace(config_item('base_url'),"",$item['image_url']);
			}
			$adjewelryView .= '<div class="row-fluid">';
				$adjewelryView .= '<div class="imgleft_cols col-sm-2">
					<img src="'.$imgUrljw.'" width="112" alt="'.$lotdm_shape.'" />
					<div class="viewDt"><a href="'.$item['item_url'].'">View Detail</a></div>
				</div>
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
						</div>';
						$adjewelryView .= '<div class="shiping_row">
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
				<div class="botom_line"></div><br>
			</div>';
			$adjewelryTotal = $adjewelryTotal + $item_cart_price; //$jewelryTotalPrice;
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
					<img src="'. $imgUrl .'" width="112" alt="'.$lotdm_shape.'" />
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
						$uniqueWirePrice = wire_price($unRingPrice + $diamond['price'] + $engr_price);
						$netTotalCartPrice = $uniqueWirePrice;
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

		case 'addwatch':
			$details = $this->jewelrymodel->getWatchByStock($item['lot']);
			$item['price'] = $details['price1'];
			$item['quantity'] = intval($item['quantity']);

			$uniqe_dtlink = SITE_URL.$item['unique_urlink'];
			$itemName = $details['productName'].' '.getWatchIdType($details['id_type']).' '.$details['case_diameter'];

			$unRingPrice = $item['price'] * $item['quantity'];
			$uniqueWirePrice = wire_price($unRingPrice);
			$netTotalCartPrice = $uniqueWirePrice;

			$addUniqueView .= '<div class="row-fluid">';
				$addUniqueView .= '<div class="imgleft_cols col-sm-2">
					<img src="'.config_item('base_url').str_replace(config_item('base_url'),"",$item['image_url']).'" width="112" alt="'.$itemName.'" />
					<div class="viewDt"><a href="'.$item['item_url'].'">View Detail</a></div>
				</div>
				<div class="detail_rightbk col-sm-10">
					<div class="checkout_cols">
						<div class="shiping_row">
							<span>'.$itemName.'</span>
							span></span>
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
			$uniqueWirePrice = wire_price($unRingPrice);
			$netTotalCartPrice = $uniqueWirePrice;

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
			$uniqueWirePrice = wire_price($unRingPrice);
			$netTotalCartPrice = $uniqueWirePrice;
			$tvjohny_fields = getTvJonyTableFields(); /// ringsection helper

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
			$uniqueWirePrice = wire_price($unRingPrice);
			$netTotalCartPrice = $uniqueWirePrice;

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
			$uniqueWirePrice = wire_price($unRingPrice);
			$netTotalCartPrice = $uniqueWirePrice;

			$addUniqueView .= '<div class="row-fluid">';
				$addUniqueView .= '<div class="imgleft_cols col-sm-2">
					<img src="'.SITE_URL.$item['image_url'].'" width="112" alt="'.$itemName.'" />
					<div class="viewDt"><a href="'.$item['item_url'].'">View Detail</a></div>
				</div>
				<div class="detail_rightbk col-sm-10">
					<div class="checkout_cols">
						<div class="shiping_row">
							<span>'.$itemName.'</span>
							<span></span>
						</div>
						<div class="shiping_row">
							<span>Stock Number: </span>
							<span>'.$item['stock_number'].'</span>
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
			$uniqueWirePrice = wire_price($unRingPrice + $engr_price);
			$netTotalCartPrice = $uniqueWirePrice;

			$addUniqueView .= '<div class="row-fluid">';
				$addUniqueView .= '<div class="imgleft_cols col-sm-2">
					<img src="'.QUALITY_IMGS.$details['large_image'].'" width="112" alt="'.$itemName.'" />
				</div>
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
			$uniqueWirePrice = wire_price($unRingPrice + $engr_price);
			$netTotalCartPrice = $uniqueWirePrice;

			$addUniqueView .= '<div class="row-fluid">';
				$addUniqueView .= '<div class="imgleft_cols col-sm-2">
					<img src="'.$ringsImg.'" width="112" alt="'.$itemName.'" />
				</div>
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
			$uniqueWirePrice = wire_price($unRingPrice + $engr_price);
			$netTotalCartPrice = $uniqueWirePrice;

			$addUniqueView .= '<div class="row-fluid">';
				$addUniqueView .= '<div class="imgleft_cols col-sm-2">
					<img src="'.config_item('base_url').str_replace(config_item('base_url'),"",$item['image_url']).'" width="112" alt="'.$itemName.'" />
				</div>
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
			$uniqueWirePrice = wire_price($unRingPrice + $engr_price);
			$netTotalCartPrice = $uniqueWirePrice;

			$addUniqueView .= '<div class="row-fluid">';
				$addUniqueView .= '<div class="imgleft_cols col-sm-2">
					<img src="'.config_item('base_url').str_replace(config_item('base_url'),"",$item['image_url']).'" width="112" alt="'.$itemName.'" />
				</div>
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
}
$totalcart_price = $tringTotal + $tearTotal + $stpendantTotal + $threestonepdtTotal + $tothreeTotal + $adjewelryTotal + $adUniqueTotal + $watchtotal;
$vieworder_cart = $addtoringview.$toearingview.$tosolitairview.$threstPendantView.$tothreeview.$adjewelryView.$addUniqueView.$addwatchview;

$salesTaxAmount = $totalcart_price * ( $salesTaxPercnt / 100 );   /// calculate tax amount
$sets_ship_method = $this->session->userdata('sets_ship_method');
$ship_options = shipping_option_price($sets_ship_method); // ringsection helper
$netTotalOrderAmount = $totalcart_price + $salesTaxAmount + $ship_options['ship_price'];
?>
<div class="">
	<div class="">
		<div>
			<form id="breadCrumbForm" name="breadCrumbForm" action="<?php echo SITE_URL; ?>checkout" method="post">
				<div class="bread-crumb">
					<div class="breakcrum_bk">	
						<ul>
							<li><a href="<?php echo config_item('base_url')?>">Home</a></li>
							<li><a href="<?php echo config_item('base_url')?>addtocart">Shopping Cart</a></li>
							<li><a href="#javascript;" onclick="billForm()">Billing and Shipping Address</a></li>
							<li>Payment</li>
						</ul>
					</div>
					<div class="clear"></div>
				</div>
				<input type="hidden" name="totalprice" id="totalprice" value="<?php echo $finalOrderPrice; ?>">
			</form>
			<div class="">
				<div class="ship_row">
					<div id="heading_left" class="mainPageHeading">
						<h2 class="head_seting">Choose Your Payment</h2>
					</div>
					<div class="heading_right">
						<ul class="shiping_tabs">
							<li class="active_circle">Shipping + Billing</li>
							<li class="active_circle">Payment</li>
							<li>Review Order</li>
						</ul>
					</div>
					<div class="clear"></div>
				</div>
				<p style="margin: 0px;padding-left: 20px;color: red;">All Orders Over $5,000 are paid with Bank Wire and Telephone Orders Only!</p>
				<?php echo form_open(SITE_URL.'shoppingbasket/selectpaymentmethod', $attributes)?> 
					<div class="pad10">
						<div class="dbr clear"></div><br>
						<div class="dbr"></div>
						<div class="shiping_left col-sm-5">
							<div class="payment_block">
								<?php /* if($netTotalOrderAmount < 5000){ ?>
									<div id="paypal">
										<div class="payment_label activeLabel"><a href="#javascript;" onclick="setPaymentOption('paypal')">Paypal</a></div>
									</div><br><br>
								<?php } */ ?>

								<div id="payment_card">
									<div class="payment_label activeLabel"><a href="#javascript;" onclick="setPaymentOption('payment_card')">PAY ONLINE </a></div>
								</div><br><br>

								<?php /* <div id="payment_byphone">
									<div class="payment_label activeLabel"><a href="#javascript;" onclick="setPaymentOption('payment_byphone')">PAY BY TELEPHONE</a></div>
								</div><br><br> */ ?>

								<div id="payment_bankwire">
									<div class="payment_label activeLabel"><a href="#javascript;" onclick="setPaymentOption('payment_bankwire')">PAY WITH A BANK WIRE</a></div>
									<div>All international orders are subject to a $35 processing fee.</div>
								</div><br><br>

								<br><br>
								<input type="hidden" name="payment_method" id="payment_method" value="payment_bankwire" />
								<div><span class="optionText">You will have an opportunity to review <br>your order on the next page.</span></div><br><br>
							</div>
						</div>
						<div class="shiping_right col-sm-6 pull-right">
							<div class="order_summbk">
								<div class="ordersm_heading">Order Summary</div>
								<?php echo $vieworder_cart; ?>
								<div class="further_row">
									<span>Subtotal</span>
									<span>$<?php echo _nf($totalcart_price); ?></span>
								</div>
								<div class="further_row">
									<?php
									echo '<span>'.$ship_options['ship_method'].' </span>
									<span>$'.$ship_options['ship_price'].'</span>';
									?>
								</div>
								<div class="further_row">
									<span>Sales Tax <?php echo ( $salesTaxPercnt > 0 ? $salesTaxPercnt : ''); ?>%*</span>
									<span>$<?php echo _nf($salesTaxAmount, 2); ?></span>
								</div>
								<div class="further_row">
									<span>Order Total</span>
									<span>$<?php echo _nf($netTotalOrderAmount); ?></span>
								</div>
							</div>
							<input type="hidden" name="totalprice" id="totalprice" value="<?php echo $totalcart_price;?>">
							<input type="hidden" name="paymentmethod" id="paymentmethod" value="furtherprocess">
							<br><br>
							<div class="setbotmText">
								<div class="label_color">*Sales Tax is collected for orders shipped to <?php echo getSalesTaxCount(); ?> or outside the United States.</div>
								<div class="label_color">View our policies for shipping internationally outside the U.S., Canada, and Australia.</div>
								<div class="label_color"><span class="secure_ckout">Secure Checkout Shopping is always safe and secure</span></div>
								<br><br>
								<div class="text-right"><input type="button" name="continueorder" value="continue" onclick="checkSubmitForm()" class="submit_bntbg" title="Continue"></div>
							</div>
						</div>
						<div class="clear"></div>
						<script type="text/javascript">
						function showmsgx(){
							if(document.getElementById('creditcard').checked != true && document.getElementById('phone').checked != true && document.getElementById('moneyorder').checked != true){
								alert('Please select a method of payment'); 
							}
						};	 	
						</script>
						<div class="clear"></div><br><br>
						<div class="newbotom_line"></div>
						<div id="further_asistcols" class="checkout_cols">
							<h3>Need Assistance</h3>
							<div>
								<span class="contactNo"><?php echo get_site_title('contact_info'); ?></span>
								<span class="emailUs"><a href="mailto:<?php echo get_site_title('email'); ?>">Email Us</a></span>
							</div>
							<div class="clear"></div><br>
						</div> 
						<div class="clear"></div>
					</div>
				<?php echo form_close();?>
			</div>
			<div class="clear"></div><br>
		</div>
		<div class="clear"></div>
	</div>
	<div class="clear"></div><br>
</div>
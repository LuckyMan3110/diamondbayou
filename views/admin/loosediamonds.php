<div class="inner"> 
	<div class="contentpanel">
		<div><?php echo admin_main_menu_list();?></div>
	</div>
	<div>
		<?php 
		function random($length = 8){     
			$chars = '983452458935876451386217';
			for ($p = 0; $p < $length; $p++){
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
				$girdle = isset($details['Girdle']) ? $details['Girdle'] : '';
				$culet = isset($details['Culet']) ? $details['Culet'] : '';
				$polish = isset($details['Polish']) ? $details['Polish'] : '';
				$sym = isset($details['Sym']) ? $details['Sym'] : '';
				$flour = isset($details['Flour']) ? $details['Flour'] : '';
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
			}else{
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
				case 'Baguette':
					$shape = 'Baguette';
					$destFile = $destFolder.'baguettering.jpg';
					break;
				case 'Trilliant':
					$shape = 'Trilliant';
					$destFile = $destFolder.'trilliantring.jpg';
					break;
				case 'Cushion Modified':
				case 'CUSHION MODIFIED':
					$shape = 'Cushion';
					$destFile = $destFolder.'cushionring.jpg';
					break;
				default:
					$shape = $details['shape'];
					break;
			}
			$diamondsShape = viewDmShape( $details['shape'] );
			$certsName = explode(' ', trim( $details['Cert'] ) );

			if( !empty($details['fancy_color']) ) {
				$title = $carat.' CT '.$diamondsShape.' '.$clarity. getFancyColorName($details['fancy_color']) . ' Fancy Loose Diamond! '.' '.$cert.'! ';
			} else {
				$title = $carat.' CT '.$diamondsShape.' '.$color. ' '.$clarity.' '.$clarity_enhance.'Loose Diamond!'.' '.$cert.'! ';
			}
			$certName = $cert;

			$qry = "SELECT rate FROM ".config_item('table_perfix')."helix_prices WHERE pricefrom <= '$price'  and  priceto > '$price' ORDER BY pricefrom ASC LIMIT 0,1";
			$result = $this->db->query($qry);
			$pret = $result->result_array();	
			$rate = $pret[0]['rate'];
			$our_price = round( $price * $rate)  ;
			$retail_price = round($our_price * 1.65) ;

			if(empty($certimage)){
				$cert_name = explode(' ', $details['Cert']);
				$sql = "SELECT cert_img FROM ". $this->config->item('table_perfix')."cert  WHERE cert_name = '".$cert_name[0]."'";
				$query = $this->db->query($sql);
				$result = $query->result_array();
				$certimage =  $result[0]['cert_img'];
			}
			$stocknum = $stocknum;

			$picsql = "SELECT picture1 FROM ". $this->config->item('table_perfix')."loosepictures  WHERE diamondshape = '".$shape."'";
			$picquery = $this->db->query($picsql);
			$picresult = $picquery->result_array();
			$destFile =   config_item('base_url').$picresult[0]['picture1'];
			?>
			<style>
			.lebelfield{color:white;font-weight:bold;}
			.inputfield { color:white; }
			</style>
			<div class="blue_man">
				<div class="blue_admin_box1">
					<div class="addcountry_box">
						<div class="heading">
							<h1>Add Rapnet LooseDiamonds on eBay</h1>
						</div>
						<div style="width:100%;">
							<? if(isset($success) && !empty($success)){ ?>
								<div style="width:95.5%; margin:5px; padding:10px 10px 10px 10px; background-color:#C8F2BB; font-weight:bold"><? echo $success;?></div>
							<? } ?>
						</div>
						<div style="clear:both"></div>
						<div class="search_box">
							<form name="rapnetForm" action="<?php echo config_item('base_url');?>admin/allloosediamonds/<?php echo $action; echo ($action == 'edit') ? '/' .$id : '';?>" method="post" enctype="multipart/form-data" >
								<table width="80%" border="0" align="center" cellpadding="5" cellspacing="0" class="table_border">
									<tr>
										<td width="20%" align="right">Lot</td>
										<td colspan="3"><dt id="account_name-label">&nbsp;</dt>
											<dd id="account_name-element">
											<?php echo $lot;?>
											<input type="hidden" name="lot" value="<?php echo $lot;?>" maxlength="15"  />
											</dd>
										</td>
									</tr>
									<tr>
										<td width="20%" align="right">Item Title</td>
										<td colspan="3"><dt id="account_name-label">&nbsp;</dt>
											<dd id="account_name-element">
											<?php echo $title;?>
											<input type="hidden" name="title" value="<?php echo $title;?>" maxlength="80" size="120"/>
											</dd>
										</td>
									</tr>
									<tr>
										<td width="20%" align="right">Shape</td>
										<td colspan="3"><dt id="account_name-label">&nbsp;</dt>
											<dd id="account_name-element">
											<?php echo $diamondsShape;?>
											<input type="hidden" name="shape" value="<?php echo $diamondsShape;?>" maxlength="15"/>
											</dd>
										</td>
									</tr>
									<tr>
										<td width="20%" align="right">Carat</td>
										<td colspan="3"><dt id="account_name-label">&nbsp;</dt>
											<dd id="account_name-element">
											<?php echo number_format($carat,2);?>
											<input type="hidden" name="carat" value="<?php echo number_format($carat,2);?>"  id="carat" />
											</dd>
										</td>
									</tr>
									<tr>
										<td width="20%" align="right">Color</td>
										<td colspan="3"><dt id="account_name-label">&nbsp;</dt>
											<dd id="account_name-element">
											<?php echo $color;?>
											<input type="hidden" name="color" value="<?php echo $color;?>"  id="color" />
											</dd>
										</td>
									</tr>
									<? if(!empty($clarity)){ ?> 
										<tr>
											<td width="20%" align="right">Clarity</td>
											<td colspan="3"><dt id="account_name-label">&nbsp;</dt>
												<dd id="account_name-element">
												<?php echo $clarity ;?>
												<input type="hidden" name="clarity" value="<?php echo $clarity ;?>"  id="clarity" />
												</dd>
											</td>
										</tr>
									<? } ?>
									<?php
									$rapnet_price = $details['price'];
									$ourdm_price = ( ($rapnet_price * $details['carat']) * 6 );
									$salesPrice = $this->adminmodel->getLooseFiltersDiscount($ourdm_price, 'eBay');
									$retaildm_price = $ourdm_price  * 1.65;
									?>
									<tr>
										<td width="20%" align="right">Rapnet Price</td>
										<td colspan="3"><dt id="account_name-label">&nbsp;</dt>
											<dd id="account_name-element">
											$ <?php echo number_format($rapnet_price,2) ;?>
											<input type="hidden" name="price" value="<?php echo $rapnet_price;?>"  id="price" />
											</dd>
										</td>
									</tr>
									<tr>
										<td width="20%" align="right">Our Price</td>
										<td colspan="3"><dt id="account_name-label">&nbsp;</dt>
											<dd id="account_name-element">
											$ <?php echo number_format($ourdm_price,2) ;?>
											</dd>
										</td>
									</tr>
									<tr>
										<td width="20%" align="right">Sale Price</td>
										<td colspan="3"><dt id="account_name-label">&nbsp;</dt>
											<dd id="account_name-element">
											$ <?php echo number_format($salesPrice,2) ;?>
											<input type="hidden" name="diamond_ourprice" value="<?php echo $salesPrice;?>"  id="price" />
											<input type="hidden" name="retail_price" value="<?php echo $retaildm_price; ?>"  id="retail_price" />
											</dd>
										</td>
									</tr>
									<tr>
										<td width="20%" align="right">Certificate</td>
										<td colspan="3"><dt id="account_name-label">&nbsp;</dt>
											<dd id="account_name-element">
											<?php echo $certName  ;?>
											<input type="hidden" name="cert" value="<?php echo $cert;?>"  id="cert" />
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
									<? if(!empty($comment)){ ?>
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
											<input type="hidden" name="height" value="<?php echo $height    ;?>"  id="height" />
											</dd>
										</td>
									</tr>
									<?php if(!empty($cut)){ ?>
										<tr>
											<td width="20%" align="right">Cut</td>
											<td colspan="3"><dt id="account_name-label">&nbsp;</dt>
											<dd id="account_name-element">
											<?php echo $cut    ;?>&nbsp;Cut!
											<input type="hidden" name="cut" value="<?php echo $cut    ;?>"  id="cut" />
											</dd>
											</td>
										</tr>
									<?php } ?>
									<tr>        
										<td colspan="4">
											<input type="hidden" name="Cert_n" value="<?php echo $details['Cert_n'];?>" id="Cert_n" />
										</td>
									</tr>
									<?php
									$destFolder1 = 'images/loosepictures/';
									switch ($detail['shape']) {
										case 'R':
											$shape = 'round';
											if ($detail['Cert'] == 'GIA') {
												$storeCategoryId = '4946247016';
												$requestArray['primaryCategory'] = '152899';
											} else {
												$storeCategoryId = '4946247016';
												$requestArray['primaryCategory'] = '152899';
											}
											break;
										case 'Pr':
											$shape = 'princess';
											if ($detail['Cert'] == 'GIA') {
												$storeCategoryId = '4946247016';
												$requestArray['primaryCategory'] = '152899';
											} else {
												$storeCategoryId = '4946247016';
												$requestArray['primaryCategory'] = '152899';
											}
											break;
										case 'R':
											$shape = 'radiant';
											if ($detail['Cert'] == 'GIA') {
												$storeCategoryId = '4946247016';
												$requestArray['primaryCategory'] = '152899';
											} else {
												$storeCategoryId = '4946247016';
												$requestArray['primaryCategory'] = '152899';
											}
											break;
										case 'E':
											$shape = 'emerald';
											if ($detail['Cert'] == 'GIA') {
												$storeCategoryId = '4946247016';
												$requestArray['primaryCategory'] = '152899';
											} else {
												$storeCategoryId = '4946247016';
												$requestArray['primaryCategory'] = '152899';
											}
											break;
										case 'AS':
											$shape = 'asscher';
											if ($detail['Cert'] == 'GIA') {
												$storeCategoryId = '4946247016';
												$requestArray['primaryCategory'] = '152899';
											} else {
												$storeCategoryId = '4946247016';
												$requestArray['primaryCategory'] = '152899';
											}
											break;
										case 'O':
											$shape = 'oval';
											if ($detail['Cert'] == 'GIA') {
												$storeCategoryId = '4946247016';
												$requestArray['primaryCategory'] = '152899';
											} else {
												$storeCategoryId = '4946247016';
												$requestArray['primaryCategory'] = '152899';
											}
											break;
										case 'M':
											$shape = 'marquise';
											if ($detail['Cert'] == 'GIA') {
												$storeCategoryId = '4946247016';
												$requestArray['primaryCategory'] = '152899';
											} else {
												$storeCategoryId = '4946247016';
												$requestArray['primaryCategory'] = '152899';
											}
											break;
										case 'P':
											$shape = 'pear';
											if ($detail['Cert'] == 'GIA') {
												$storeCategoryId = '4946247016';
												$requestArray['primaryCategory'] = '152899';
											} else {
												$storeCategoryId = '4946247016';
												$requestArray['primaryCategory'] = '152899';
											}
											break;
										case 'H':
											$shape = 'heart';
											if ($detail['Cert'] == 'GIA') {
												$storeCategoryId = '4946247016';
												$requestArray['primaryCategory'] = '152899';
											} else {
												$storeCategoryId = '4946247016';
												$requestArray['primaryCategory'] = '152899';
											}
											break;
										case 'C':
											$shape = 'cushion';
											if ($detail['Cert'] == 'GIA') {
												$storeCategoryId = '4946247016';
												$requestArray['primaryCategory'] = '152899';
											} else {
												$storeCategoryId = '4946247016';
												$requestArray['primaryCategory'] = '152899';
											}
											break;
										case 'Cushion Modified':
											$shape = 'cushion';
											if ($detail['Cert'] == 'GIA') {
												$storeCategoryId = '4946247016';
												$requestArray['primaryCategory'] = '152899';
											} else {
												$storeCategoryId = '4946247016';
												$requestArray['primaryCategory'] = '152899';
											}
										break;
										default:
											$shape = $detail['shape'];
											$storeCategoryId = '4946247016';
											$requestArray['primaryCategory'] = '164306';
											break;
									}
									$pendantImage = config_item('base_url').$destFolder1.$shape.'.jpg';
									$pendantImageNew = config_item('base_url').$destFolder1.$details['shape'].'.jpg';
									?> 
									<tr>
										<td width="20%" align="right">Certificate Image</td>
										<td colspan="3"><dt id="account_name-label">&nbsp;</dt>
											<dd id="account_name-element">
											<div style="float:left;"><img src="<?php echo $certimage ;?>" style="width:100px;height:100px;" border="0" /></div>
											<div style="float:left;"><img src="<? echo $shape_imge; ?>"  style="width:100px;height:100px;"  border="0" /></div>
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
		<?php }else{ ?>
			<script type="text/javascript" >
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
							$.facebox('<div style="width:400px; text-align:center;color:red;">'+msg+'</div>');
							e.preventDefault();
							return false;
						}

						$.facebox('<div style="width:200px; text-align:center;"><img src="<?php print site_url("images/loading.gif"); ?>"></div>');
						////submitting form
						$(frm).find("#ids").attr("value",ids.join(","));

						var post_={
							ids: $(frm).find("#ids").val(),
							cash_limit : parseFloat(cash_limit)
						};
						//ajax post
						$.facebox('<div style="width:200px; text-align:center;">Jewelercart.com is Processing your Diamonds to Ebay.com Please Standby</div>');
						$.post(
							'<?php echo config_item('base_url') . 'admin/sendRapDiamondToEbay' ?>',
							post_,
							function(data){
								if(data){
									$.facebox('<div style="width:200px; text-align:center;">'+data+'</div>');
									$(".ebayExportResponse").html(data).show();
									$("#chkBox").attr("checked",false);
									$("#mywatchfrm .flexigrid .pReload").click();
								} else {
									$.facebox('<div style="width:200px; text-align:center;color:red;">Due to technical problem information cannot be processed. Please try again.</div>');
								}
							}
						);
					});

					/* check/uncheck items */
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
							$.facebox('<div style="width:400px; text-align:center;color:red;">'+msg+'</div>');
							e.preventDefault();
							return false;
						}

						$.facebox('<div style="width:200px; text-align:center;"><img src="<?php print site_url("images/loading.gif"); ?>"></div>');
						////submitting form
						$(frm).find("#ids").attr("value",ids.join(","));
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
								}else {
									$.facebox('<div style="width:200px; text-align:center;color:red;">Due to technical problem information cannot be processed. Please try again.</div>');
								}
							}
						);
					});
				});
			})(jQuery);

			function set_option_lists(option_value) {
				window.location = option_value;
			}
			</script>
			<p style="background:#FF9; padding:10px; font-weight:bold; font-size:14px;">
				<input type="checkbox" value="1" id="chkBox"> Send All Selected to Ebay 
				<input type="hidden" value="" name="lotsnumber" id="lotsnumber">
			</p>
			<div class="set_cate_options">
				<form action="" method="get">
					Select Category:  
					<select name="Update_Software_Category" onchange="set_option_lists(this.value)" required="required">
						<?php
						$sql = "SELECT category FROM dev_ebay_items GROUP BY category ORDER BY category";
						$query_subcategory  = $this->db->query($sql);
						$result_subcategory = $query_subcategory->result_array();
						foreach($result_subcategory as $result_subcat){ 
						?>
							<option value="<?= SITE_URL() ?>admin/allloosediamonds/view/<?php echo $filter_id_no; ?>/<?php echo $diamond_shape; ?>/<?php echo $result_subcat[category]; ?>" <?php if($category_id == $result_subcat[category]){ echo 'selected'; } ?> >&nbsp;|-<?php echo $result_subcat[category]; ?></option>
						<?php } ?>
					</select>
					Category ID: <input type="text" placeholder="Insert Ebay Category ID" name="Update_Ebay_Category" required="required">
					<input type="submit" value="Update" name="Update_Ebay_Category_ID">
				</form>
				<?php
				if( isset($_GET['Update_Ebay_Category_ID']) ){
					$Update_Software_Category = $_GET['Update_Software_Category'];
					$Update_Ebay_Category     = $_GET['Update_Ebay_Category'];

					if( $Update_Ebay_Category != '' AND $Update_Software_Category != '' ){
						$Update_Ebay_Category_Sql = "UPDATE dev_ebay_items SET category_id = '". $Update_Ebay_Category ."' WHERE  category LIKE '".$category_id."'";
						$this->db->query($Update_Ebay_Category_Sql);
						if($Update_Ebay_Category_Sql){
							echo '<b style="color:green;">Successfully Updated.</b>';
						}
					}
				}
				?>
			</div>
			<div class="set_cate_options">
				Select Diamond Shape:
				<select onchange="set_option_lists(this.value)">
					<option value="">-- Select Diamond Shape --</option>
					<?php echo $diamond_shape_option; ?>
				</select>
			</div>
			<div class="ebayExportResponse"></div>
			<br/>
			<form method="post" action="" enctype="multipart/form-data">
				<button name="authentication_submit" type="authentication_submit" id="add_product" class="btn btn-primary">Must Start with Authentication Before Send to Etsy</button>
			</form>
			<form name="rapnetstones" method="post" action="<?php echo $galry_link; ?>" enctype="multipart/form-data" id="rapnetstones">
				<table id="results" style="display:none; "></table>
				<button name="authentication_send_etsy_submit" type="submit" id="add_product" class="btn btn-primary">Send to Etsy</button>
			</form>
			<br/>
			<form id="cash_limit_form" action="<?php echo config_item('base_url') . 'admin/sendRapDiamondToEbay'; ?>" method="post" name="cash_limit_form">
				Cash Limit:
				<input id="cash_limit" value="500,000" name="cash_limit">
				<input id="lotsnumber_limit" type="hidden" value="" name="lotsnumber_limit">
				<input id="checkbox_type" type="hidden" value="" name="checkbox_type">
				<input id="ids" type="hidden" value="" name="ids">
				<a style="padding: 5px 15px; border: 1px solid #444; background-color: #ccc;" href="javascript:void(0);" class="send_batch_ebay">Send
				all to ebay</a>&nbsp;<a style="padding: 5px 15px; border: 1px solid #444; background-color: #ccc;" href="javascript:void(0);" class="delete_batch_ebay">Delete
				all</a>
			</form>
			<div></div>
		<?php } ?>
	</div>
</div>
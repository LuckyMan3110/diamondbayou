<div class="inner"> 
	<!--\\\\\\\ inner start \\\\\\-->
	<div class="contentpanel">
		<!-- main menu start -->
		<div><?php echo admin_main_menu_list(); //// admin_mainmenu helper ?></div>
		<!-- main menu end -->
		<div>
			<div>
				<?php 
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
								<!-- Message Part -->
								<div style="width:100%;">
									<? if(isset($success) && !empty($success)){ ?>
										<div style="width:95.5%; margin:5px; padding:10px 10px 10px 10px; background-color:#C8F2BB; font-weight:bold">
											<? echo $success;   ?>
										</div>
									<? } ?>
								</div>
								<div style="clear:both"></div>
								<!-- End -->
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
													<input type="hidden" name="title" value="<?php echo $title;?>" maxlength="80" size="120"  />
													</dd>
												</td>
											</tr>
											<tr>
												<td width="20%" align="right">Shape</td>
												<td colspan="3"><dt id="account_name-label">&nbsp;</dt>
													<dd id="account_name-element">
													<?php echo $diamondsShape;?>
													<input type="hidden" name="shape" value="<?php echo $diamondsShape;?>" maxlength="15"  />
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
													<input type="hidden" name="price" value="<?php echo $rapnet_price;?>" id="price" />
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
													<input type="hidden" name="diamond_ourprice" value="<?php echo $salesPrice;?>" id="price" />
													<input type="hidden" name="retail_price" value="<?php echo $retaildm_price; ?>" id="retail_price" />
													</dd>
												</td>
											</tr>
											<tr>
												<td width="20%" align="right">Certificate</td>
												<td colspan="3"><dt id="account_name-label">&nbsp;</dt>
													<dd id="account_name-element">
													<?php echo $certName;?>
													<input type="hidden" name="cert" value="<?php echo $cert;?>" id="cert" />
													</dd>
												</td>
											</tr>
											<tr>
												<td width="20%" align="right">Depth</td>
												<td colspan="3"><dt id="account_name-label">&nbsp;</dt>
													<dd id="account_name-element">
													<?php echo $depth;?>%
													<input type="hidden" name="depth" value="<?php echo $depth;?>" id="depth" />
													</dd>
												</td>
											</tr>
											<tr>
												<td width="20%" align="right">Table</td>
												<td colspan="3"><dt id="account_name-label">&nbsp;</dt>
													<dd id="account_name-element">
													<?php echo $table;?>%
													<input type="hidden" name="table" value="<?php echo $table;?>" id="table" />
													</dd>
												</td>
											</tr>
											<tr>
												<td width="20%" align="right">Girdle</td>
												<td colspan="3"><dt id="account_name-label">&nbsp;</dt>
													<dd id="account_name-element">
													<?php echo $girdle;?>
													<input type="hidden" name="girdle" value="<?php echo $girdle;?>" id="girdle" />
													</dd>
												</td>
											</tr>
											<?php if(!empty($culet)){ ?>
												<tr>
													<td width="20%" align="right">Culet</td>
													<td colspan="3"><dt id="account_name-label">&nbsp;</dt>
														<dd id="account_name-element">
														<?php echo $culet;?>
														<input type="hidden" name="culet" value="<?php echo $culet;?>" id="culet" />
														</dd>
													</td>
												</tr>
											<? } ?> 
											<tr>
												<td width="20%" align="right">Polish</td>
												<td colspan="3"><dt id="account_name-label">&nbsp;</dt>
													<dd id="account_name-element">
													<?php echo $polish;?>
													<input type="hidden" name="polish" value="<?php echo $polish;?>" id="polish" />
													</dd>
												</td>
											</tr>
											<tr>
												<td width="20%" align="right">Sym</td>
												<td colspan="3"><dt id="account_name-label">&nbsp;</dt>
													<dd id="account_name-element">
													<?php echo $sym;?>
													<input type="hidden" name="sym" value="<?php echo $sym;?>" id="sym" />
													</dd>
												</td>
											</tr>          
											<tr>
												<td width="20%" align="right">Flour</td>
												<td colspan="3"><dt id="account_name-label">&nbsp;</dt>
												<dd id="account_name-element">
												<?php echo $flour;?>
												<input type="hidden" name="flour" value="<?php echo $flour;?>" id="flour" />
												</dd>
												</td>
											</tr>
											<tr>
												<td width="20%" align="right">Measurement</td>
												<td colspan="3"><dt id="account_name-label">&nbsp;</dt>
													<dd id="account_name-element">
													<?php echo $meas;?>&nbsp;MM 
													<input type="hidden" name="meas" value="<?php echo $meas;?>" id="meas" />
													</dd>
												</td>
											</tr>
											<? if(!empty($comment)){ ?>
												<tr>
													<td width="20%" align="right">Comments</td>
													<td colspan="3"><dt id="account_name-label">&nbsp;</dt>
														<dd id="account_name-element">
														<?php echo $comment; ?>
														</dd>
													</td>
												</tr>
											<? } ?>
											<tr>
												<td width="20%" align="right">Stones</td>
												<td colspan="3"><dt id="account_name-label">&nbsp;</dt>
													<dd id="account_name-element">
													<?php echo $stones;?> Stones
													<input type="hidden" name="stones" value="<?php echo $stones;?>" id="stones" />
													</dd>
												</td>
											</tr> 
											<tr>
												<td width="20%" align="right">Certificate Number</td>
												<td colspan="3"><dt id="account_name-label">&nbsp;</dt>
													<dd id="account_name-element">
													<?php echo $certnum;?>
													<input type="hidden" name="certnum" value="<?php echo $certnum;?>" id="certnum" />
													</dd>
												</td>
											</tr>
											<tr>
												<td width="20%" align="right">Stock Number</td>
												<td colspan="3"><dt id="account_name-label">&nbsp;</dt>
													<dd id="account_name-element">
													<?php echo $stocknum;?>
													<input type="hidden" name="stocknum" value="<?php echo $stocknum;?>" id="stocknum" />
													</dd>
												</td>
											</tr> 
											<tr>
												<td width="20%" align="right">Length</td>
												<td colspan="3"><dt id="account_name-label">&nbsp;</dt>
													<dd id="account_name-element">
													<?php echo $length;?>
													<input type="hidden" name="length" value="<?php echo $length;?>" id="length" />
													</dd>
												</td>
											</tr>
											<tr>
												<td width="20%" align="right">Width</td>
												<td colspan="3"><dt id="account_name-label">&nbsp;</dt>
												<dd id="account_name-element">
												<?php echo $width;?>
												<input type="hidden" name="width" value="<?php echo $width;?>" id="width" />
												</dd>
												</td>
											</tr>
											<tr>
												<td width="20%" align="right">Height</td>
												<td colspan="3"><dt id="account_name-label">&nbsp;</dt>
													<dd id="account_name-element">
													<?php echo $height;?>
													<input type="hidden" name="height" value="<?php echo $height;?>" id="height" />
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
					
					<script language="javascript" src="<?php echo SITE_URL; ?>js/jquery.popup.js" type="text/javascript"></script>
					<style>
					.flexigrid{width:100% !important;}
					</style>
					<input type="hidden" name="txt_viewtype" id="viewType" value="<?php echo $view_type; ?>" />
					<input type="hidden" name="category_id" id="categoryId" value="<?php echo $category_id; ?>" />
					<input type="hidden" name="filterID" id="filterID" value="<?php echo $filter_id_no; ?>" />
					<div id="item_popup_block"></div>
					<p class="selectbkbg">
						<input type="checkbox" value="1" id="chkb_ebay" onclick="selectedProd('chkb_ebay')"> <label for="chkb_ebay">Send All Selected to Ebay</label> 
						<input type="hidden" value="" name="lotsnumber" id="lotsnumber">
					</p>
					<p class="selectbkbg">
						<input type="checkbox" value="1" id="chkb_amazon" onclick="selectedProd('chkb_amazon')"> <label for="chkb_amazon">Send All Selected to Amazon </label> 
						<input type="hidden" value="" name="lotsnumber" id="lotsnumber">
					</p>
					<p class="selectbkbg">
						<input type="checkbox" value="1" id="chkb_amazon_ca" onclick="selectedProd('chkb_amazon_ca')"> <label for="chkb_amazon_ca">Send All Selected to Amazon Canada </label> 
						<input type="hidden" value="" name="lotsnumber" id="lotsnumber">
					</p>
					<p class="selectbkbg">
						<input type="checkbox" value="1" id="chkb_etsy" onclick="selectedProd('chkb_etsy')"> <label for="chkb_etsy">Send All Selected to Etsy </label> 
						<input type="hidden" value="" name="lotsnumber" id="lotsnumber">
					</p>
					<script>
					function set_option_sub_category_lists(){
						var get_main_category_value = $('#get_main_category_value').val();
						var get_filter_id_no        = $('#get_filter_id_no').val();
						$("#show_sub_category_value").html(''); 

						$.ajax({
							type: 'post',
							dataType : 'html',
							url: '<?php echo base_url(); ?>jcart_fashion_jewelry/get_main_costar_sub_category_list/?get_main_category_value='+get_main_category_value+'&get_filter_id_no='+get_filter_id_no,
							success: function (data) {
								// DO WHAT YOU WANT WITH THE RESPONSE
								$("#show_sub_category_value").html(data);
							}
						});
					}
					function set_option_lists(option_value) {
						window.location = option_value;
					}
					</script>
					<script type="text/javascript" >
					function update_market_id(itemID, checkbox_id, checkbox_field) {
						var check_box_id;
						if( $("#" + checkbox_id).is(":checked") ) {
							check_box_id = checkbox_id;
						} else {
							check_box_id = 0;
						}

						var url_link = base_url + 'admin_listings/update_market_id/' + itemID + '/' + checkbox_field + '/' + check_box_id;
						$.ajax({
							type:"POST",
							url:url_link,
							success:function(response) {
								//$("#searchresult").html(response);
								//alert(response);
							},
							error:function(){alert('Error ');}
						});
					}

					(function($){
						$(document).ready(function(){
							$(".ebayExportResponse").html("").hide();
							$("a.send_batch_ebay").click(function(e){
								var frm=$("form#cash_limit_form");
								var ids=new Array();
								var cash_limit= $(frm).find("#cash_limit").val().replace(",","");
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
									$(".ebayExportResponse").html('<div style="width:400px; text-align:center;color:red;">'+msg+'</div>').show();
									$("#ebay_return_mesage").html('<div style="width:400px; text-align:center;color:red;">'+msg+'</div>');
									return false;
								}

								$(".ebayExportResponse").html('<div style="width:200px; text-align:center;"><img src="<?php echo SITE_URL . 'images/loading.gif'; ?>"></div>').show();
								$("#ebay_return_mesage").html('<div style="width:200px; text-align:center;"><img src="<?php echo SITE_URL . 'images/loading.gif'; ?>"></div>');
								$(frm).find("#ids").attr("value",ids.join(","));
								var post_={
									ids: $(frm).find("#ids").val(),
									cash_limit : parseFloat(cash_limit)
								};
								$(".ebayExportResponse").html('<div style="width:200px; text-align:center;">Jewelercart.com is Processing your Diamonds to Ebay.com Please Standby</div>').show();
								$(".ebay_return_mesage").html('<div style="width:200px; text-align:center;">Jewelercart.com is Processing your Diamonds to Ebay.com Please Standby</div>');
								$.post(
								'<?php echo SITE_URL . 'send_stuller_fashionjew_item_toebay/send_bulk_item_jewelry_toebay' ?>',
								post_,
								function(data){
									if(data){
										//$.facebox('<div style="width:200px; text-align:center;">'+data+'</div>');
										$(".ebayExportResponse").html('<h1>Total '+ids.length+' rings item(s) added/updated. </h1><br>' + data).show();
										$("#ebay_return_mesage").html('<h1>Total '+ids.length+' rings item(s) added/updated. </h1><br>' + data);
										$("#chkBox").attr("checked",false);
										$("#mywatchfrm .flexigrid .pReload").click();
									} else {
										//$.facebox('<div style="width:200px; text-align:center;color:red;">Due to technical problem information cannot be processed. Please try again.</div>');
										$(".ebayExportResponse").html('<div style="width:200px; text-align:center;color:red;">Due to technical problem information cannot be processed. Please try again.</div>');
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
									} else {
										$.facebox('<div style="width:200px; text-align:center;color:red;">Due to technical problem information cannot be processed. Please try again.</div>');
									}
								});
							});
						});
					})(jQuery);
					</script>
					<script>
					function selectedProd(checkid) {
						///check/uncheck items
						$("#"+checkid).change(function(){
							var v=$(this).is(":checked");
							$("input.bookid").each(function(){
								$(this).prop("checked",v); 
							});
						});  
					}

					function update_jewitem_value(item_id) {
						var embedLink = $('#video_'+item_id).val();
						var url_link = base_url + 'admin_listings/update_jewelry_item/'+item_id+'/?embed_value='+embedLink;

						$.ajax({
							type:"POST",
							url:url_link,
							success:function(response) {
								//$("#searchresult").html(response);
							},
							error:function(){alert('Error ');}
						});
					}

					function update_jcarat_value(item_id) {
						var c_carat = $('#ctcarat_'+item_id).val();
						var s_carat = $('#scarat_'+item_id).val();
						var center_carat = ( c_carat !== '' ? c_carat : '' );
						var side_carat = ( s_carat !== '' ? s_carat : '' );
						var url_link = base_url + 'admin_listings/update_jewcarat_value/'+item_id+'/?center_carat='+center_carat+'&side_carat='+side_carat;

						$.ajax({
							type:"POST",
							url:url_link,
							success:function(response) {
							//$("#searchresult").html(response);
							},
							error:function(){alert('Error ');}
						});
					}

					function update_new_price(item_id) {
						var itemPrice = $('#new_price_'+item_id).val();
						var url_link = base_url + 'admin_listings/update_item_newprice/'+item_id+'/'+itemPrice;

						$.ajax({
							type:"POST",
							url:url_link,
							success:function(response) {
								//$("#searchresult").html(response);
							},
							error:function(){alert('Error ');}
						});
					}

					function update_mainitem_price(item_id) {
						var itemPrice = $('#price_box_'+item_id).val();
						var url_link = base_url + 'admin_listings/update_mainitem_price/'+item_id+'/'+itemPrice;

						$.ajax({
							type:"POST",
							url:url_link,
							success:function(response) {
								//$("#searchresult").html(response);
							},
							error:function(){alert('Error ');}
						});
					}

					function show_change_block(item_id) {
						var url_link = base_url + 'admin_listings/get_itemlist_popup/'+item_id;
						$.ajax({
							type:"POST",
							url:url_link,
							success:function(response) {
								$("#item_popup_block").html(response);
							},
							error:function(){alert('Error ');}
						});
					}

					function change_item_diamondinfo(item_id, diamondID, rowsType) {
						var url_link = base_url + 'admin_listings/changeItemDiamondInfo/'+item_id+'/'+diamondID;
						var view_type = $('#viewType').val();
						var item_category = $('#categoryId').val();
						var filterID = $('#filterID').val();
						if( rowsType === 1 ) {
							$('#un_row_'+diamondID).addClass('tbcols_selected');
						} else {
							$('#uns_row_'+diamondID).addClass('tbcols_selected');
						}

						$.ajax({
							type:"POST",
							url:url_link,
							success:function(response) {
								$("#viewErorMsg").html(response);
								window.location = base_url + 'admin_listings/heart_collection_items/view/' + view_type + '/' + filterID + '/' + item_category;
							},
							error:function(){alert('Error ');}
						});
					}

					function findCenterDiamondList(item_id, item_price) {
						var item_shape = $('#diamond_shape_'+item_id).val();
						var item_carat = $('#diamond_carats_'+item_id).val();
						var url_link = base_url + 'admin_listings/getCenterDiamondViaCaratSearch/'+item_id+'/'+item_shape+'/'+item_price+'/'+item_carat;
						$('#center_list_'+item_id).html('<b><i>Loading Diamond List Please be patience....</i></b>');

						$.ajax({
							type:"POST",
							url:url_link,
							success:function(response) {
								$('#center_list_'+item_id).html(response);
							},
							error:function(){ 
								//alert('Error ');
							}
						});
					}

					function findCenterDiamondListViaPrice(item_id, item_price, search_type) {
						var item_shape = $('#diamond_shape_'+item_id).val();
						var item_carat = $('#diamnd_carat_'+item_id).val();
						var min_price = $('#diamond_minprice_'+item_id).val();
						var max_price = $('#diamond_maxprice_'+item_id).val();
						var min_carat = $('#diamond_mincarat_'+item_id).val();
						var max_carat = $('#diamond_maxcarat_'+item_id).val();
						var n_min_carat = $('#new_mincarat_'+item_id).val();
						var n_max_carat = $('#new_maxcarat_'+item_id).val();
						var n_min_price = $('#new_minprice_'+item_id).val();
						var n_max_price = $('#new_maxprice_'+item_id).val();

						if( search_type === 1 ) {
							if( min_price === '' ) {
								$('#diamond_minprice_'+item_id).focus();
								$('#view_mesage_'+item_id).html('Plz enter the minimum price');
								return false;
							}
							if( max_price === '' ) {
								$('#diamond_maxprice_'+item_id).focus();
								$('#view_mesage_'+item_id).html('Plz enter the maximum price');
								return false;
							}        
						} else if( search_type === 2 ) {
							if( min_carat === '' ) {
								$('#diamond_mincarat_'+item_id).focus();
								$('#view_mesage_'+item_id).html('Plz enter the minimum carat');
								return false;
							}
							if( max_carat === '' ) {
								$('#diamond_maxcarat_'+item_id).focus();
								$('#view_mesage_'+item_id).html('Plz enter the maximum carat');
								return false;
							}
						} else if( search_type === 3 ) {
							if( n_min_carat === '' ) {
								$('#new_mincarat_'+item_id).focus();
								$('#view_mesage_'+item_id).html('Plz enter the new minimum carat');
								return false;
							}
							if( n_max_carat === '' ) {
								$('#new_maxcarat_'+item_id).focus();
								$('#view_mesage_'+item_id).html('Plz enter the new maximum carat');
								return false;
							}
						} else if( search_type === 4 ) {
							if( n_min_price === '' ) {
								$('#new_minprice_'+item_id).focus();
								$('#view_mesage_'+item_id).html('Plz enter the new minimum price');
								return false;
							}
							if( n_max_price === '' ) {
								$('#new_maxprice_'+item_id).focus();
								$('#view_mesage_'+item_id).html('Plz enter the new maximum price');
								return false;
							}
						}

						var search_string = item_id+'/'+item_shape+'/'+item_price+'/'+item_carat+'/' + min_price + '/' + max_price+'/?mincarat='+min_carat+'&maxcarat='+max_carat+'&new_min_carat='+n_min_carat+'&new_max_carat='+n_max_carat+'&new_min_price='+n_min_price+'&new_max_price='+n_max_price;
						var url_link = base_url + 'admin_listings/getCenterDiamondViaCaratSearch/' + search_string; //alert(url_link);
						$('#center_stone_list_'+item_id).html('<b><i>Loading Diamond List Please be patience....</i></b>');
						$.ajax({
							type:"POST",
							url:url_link,
							success:function(response) {
								$('#center_stone_list_'+item_id).html(response);
							},
							error:function(){ 
								//alert('Error ');
							}
						});
					}

					function update_jitem_price(item_id) {
						var item_price = $('#jitem_price_'+item_id).val();
						var url_link = base_url + 'admin_listings/update_jitems_price/'+item_id+'/'+item_price;
						$.ajax({
							type:"POST",
							url:url_link,
							success:function(response) {
								//$('#center_list_'+item_id).html(response);
							},
							error:function(){ 
								//alert('Error ');
							}
						});
					}

					function updateJitemPriceMW(geVall){
						var product_id		= geVall;
						var ringsMetalPrice	= $('#over_mounting_price_'+geVall).val();

						$.ajax({
							type: 'post',
							dataType : 'html',
							url: '<?php echo base_url(); ?>jcart_fashion_jewelry/update_prive_retail_by_id_wise/?product_id='+product_id+'&ringsMetalPrice='+ringsMetalPrice,
							success: function (data) {
								// DO WHAT YOU WANT WITH THE RESPONSE
								//var result = data.split('|');
								//$("#price").val(result[0]);
								//$("#jitem_ringsMetal_price_"+geVall).val(result[1]);
							}
						});
					}
					</script>
					<div class="set_cate_options">
						<input type="hidden" id="get_filter_id_no" value="<?= $filter_id_no ?>">
						Select Main Category:
						<select onchange="set_option_sub_category_lists(this.value)" id="get_main_category_value">
							<option>Select Category</option>
							<option value="740520368" <?php if($category_id == '740520368'){ echo 'selected'; } ?> >&nbsp;|-Color Fashion</option>
							<option value="740520369" <?php if($category_id == '740520369'){ echo 'selected'; } ?> >&nbsp;|-Diamond Fashion</option>
							<option value="740520370" <?php if($category_id == '740520370'){ echo 'selected'; } ?> >&nbsp;|-Engagement Rings</option>
							<option value="740520371" <?php if($category_id == '740520371'){ echo 'selected'; } ?> >&nbsp;|-Finished Bridal</option>
							<option value="740520372" <?php if($category_id == '740520372'){ echo 'selected'; } ?> >&nbsp;|-New Arrivals</option>
							<option value="740520373" <?php if($category_id == '740520373'){ echo 'selected'; } ?> >&nbsp;|-Wedding Bands</option>
						</select>
						<?php
						$where_cat_id 	= array('parent_id' => $category_id);
						$where_main_cat	= $this->Catemodel->getdata_any_table_where($where_cat_id, 'dev_ebaycategories');
						?>
						Select Sub Category:
						<select onchange="set_option_lists(this.value)" id="show_sub_category_value">
							<option>Select Category</option>
							<?php
							if(is_array($where_main_cat) AND !empty($category_id) ){
								foreach($where_main_cat as $main_cat){
									if( !empty($main_cat->category_name) AND $category_id == $main_cat->parent_id ){
									?>
										<option value="<?= $main_cat->category_id ?>" <?php if($main_cat->category_id == $item_sub_category){ echo 'selected'; } ?>> <?= $main_cat->category_name ?> </option>   
									<?php 
									}
								}
							}
							?>
						</select>
						<br>
					</div>
					<div class="ebayExportResponse"></div>
					<br>
					<?php /* <form method="post" action="" enctype="multipart/form-data">
						<button name="authentication_submit" type="authentication_submit" id="add_product" class="btn btn-primary">Must Start with Authentication Before Send to Etsy</button>
					</form> */ ?>
					<table id="results" style="display:none; "></table>
					<form id="cash_limit_form" action="<?php echo SITE_URL . 'admin/sendRapDiamondToEbay'; ?>" method="post" class="sendform" name="cash_limit_form">
					Cash Limit:
						<input id="cash_limit" value="500,000" name="cash_limit" />
						<input id="lotsnumber_limit" type="hidden" value="" name="lotsnumber_limit" />
						<input id="checkbox_type" type="hidden" value="" name="checkbox_type" />
						<input id="ids" type="hidden" value="" name="ids" />
						<a href="javascript:void(0);" class="send_batch_ebay sendebaybtn">Send all to ebay</a>&nbsp;
						<a style="" href="javascript:void(0);" class="delete_batch_ebay deletebtn">Delete all</a>
						<div id="ebay_return_mesage"></div>
					</form>
					<form id="cashlimit_form_amazon" action="" method="post" name="cashlimit_form_amazon" class="sendform">
						Cash Limit:
						<input id="cashlimit_amazon" value="5,000,000" name="cashlimit_amazon" />
						<a href="javascript:void(0);" class="send_batch_amazon sendebaybtn">Send all to Amazon</a>&nbsp;
						<a style="" href="javascript:void(0);" class="delete_batch_ebay deletebtn">Delete all</a>
					</form>
					<form id="cashlimit_form_amazon_ca" action="" method="post" name="cashlimit_form_amazon_ca" class="sendform">
						Cash Limit:
						<input id="cashlimit_amazon_ca" value="5,000,000" name="cashlimit_amazon_ca" />
						<a href="javascript:void(0);" class="send_batch_amazon sendebaybtn">Send all to Amazon Canada</a>&nbsp;
						<a style="" href="javascript:void(0);" class="delete_batch_ebay deletebtn">Delete all</a>
					</form>
					<form id="cashlimit_form_etsy" action="" method="post" name="cashlimit_form_etsy" class="sendform">
						Cash Limit:
						<input id="cashlimit_sears" value="500,000" name="cashlimit_sears" />
						<a href="javascript:void(0);" class="send_batch_amazon sendebaybtn">Send all to Etsy</a>&nbsp;
						<a style="" href="javascript:void(0);" class="delete_batch_ebay deletebtn">Delete all</a>
					</form>
					<div></div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
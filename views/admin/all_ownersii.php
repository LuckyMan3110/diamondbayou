<script>
function view_fitler_page(page_link) {
	window.open(page_link, "_blank", "tollbar=yes,scrollbars=yes,resizeable=yes,top=100,left=100,width=1200,height=600");
	return false;
}
</script>
<link href="<?= BASE_URL() ?>css/admin_style.css" rel='stylesheet' type='text/css' />
<div>
	<?php
	if ($action == 'add' || $action == 'edit') {
		$this->load->helper('custom', 'form');
		if (isset($details)) {
			$owners_id = isset($details['owner_id']) ? $details['owner_id'] : '';
			$company_id = isset($details['company_id']) ? $details['company_id'] : 0;
			$company_name = isset($details['company_name']) ? $details['company_name'] : '';
		} else {
			$owners_id = '';
			$company_id = 0;
			$company_name = '';
		}
		$id = isset($owners_id) ? $owners_id : '';
		?>
		<div class="blue_man">
			<div class="blue_admin_box1">
				<div class="addcountry_box">
					<div class="heading">
						<h1>Rapnet Companies Manager</h1>
					</div>
					<div style="width:100%;">
						<? if(isset($success) && !empty($success)){ ?>
							<div style="width:95.5%; margin:5px; padding:10px 10px 10px 10px; background-color:#C8F2BB; font-weight:bold"> <? echo $success; ?> </div>
						<? } ?>
					</div>
					<div style="clear:both"></div>
					<div class="search_box">
						<form name="" action="<?php echo config_item('base_url'); ?>admin/owners/<?php echo $action; echo ($action == 'edit') ? '/' . $owners_id : '';?>" method="post" enctype="multipart/form-data" >
							<table width="80%" border="0" align="center" cellpadding="5" cellspacing="0" class="table_border">
								<tr>
									<td width="20%" align="right">Company ID</td>
									<td colspan="3"><dt id="account_name-label">&nbsp;</dt>
										<dd id="account_name-element">
											<input type="text" name="company_id" value="<?php echo $company_id; ?>" size="30"   />
										</dd>
									</td>
								</tr>
								<tr>
									<td width="20%" align="right">Company name</td>
									<td colspan="3"><dt id="account_name-label">&nbsp;</dt>
										<dd id="account_name-element">
											<input type="text" name="company_name" value="<?php echo $company_name; ?>"  size="40" />
										</dd>
									</td>
								</tr>
								<tr>
									<td align="right">&nbsp;</td>
									<td width="3%" align="left" valign="top"><dt id="edit-label">&nbsp;</dt>
										<dd id="edit-element">
											<input type="submit" name="<?= $action; ?>btn" id="edit" value="Save" class="search_but">
										</dd>&nbsp;
									</td>
									<td width="74%" align="left" valign="top"><dt id="back-label">&nbsp;</dt>
										<dd id="back-element">
											<button name="back" id="back" type="button" class="search_but" onclick="history.go(-1);">Back</button>
										</dd>
									</td>
								</tr>
							</table>
						</form>
					</div>
				</div>
			</div>
			<div class="spacerdiv"><img src="/template/admin/images/spacer.gif" alt="spacer" /></div>
		</div>
	<?php } else { ?>
		<div>
			<form action="<?php echo config_item('base_url').$submitlink; ?>" method="post" name="search">
				<div style="height:200px;">
					<div class="filterBox">
						<div><b>Category</b></div>
						<select name="diamondscat" class="comboStyle">
							<?php
							$cate_list = array(
								'White Diamonds' => 'White Diamonds', 
								'Clarity Diamonds' => 'Clarity Diamonds', 
								'Colored Diamonds' => 'Colored Diamonds', 
								'NHD' => 'Simple Diamond Rings', 
								'HD' => 'HD Diamond Rings',
								'HDERING' => 'HD Ebay Rings',
								'ERPHD' => 'ERP HD Jewelry',
								'EBSFJ' => 'Ebay Stuller Fashion Jewelry',
							);
							$view_dmcate = '';
							foreach($cate_list as $optKeys => $catelist) {
								$view_dmcate .= '<option value="'.$optKeys.'" '.setSelected($optKeys, $detailcols['diamondscat']).'>'.$catelist.'</option>'; 
							}
							echo $view_dmcate;
							?>
						</select>
					</div>
					<div class="filterBox">
						<div><b>Shape</b></div>
						<select name="shape[]" class="comboStyle" multiple="multiple" >
							<?php
							$shape_list = array('B' => 'Round', 'PR' => 'Princess', 'E' => 'Emerald', 'AS' => 'Asscher', 'CU' => 'Cushion', 'M' => 'Marquise', 'O' => 'Oval', 'R' => 'Radiant', 'P' => 'Pear', 'H' => 'Heart');
							$view_dmshape = '';
							foreach($shape_list as $shapekey => $dmshapes) {
								$view_dmshape .= '<option value="'.$shapekey.'" '.arOptSelected($shapekey, $detailcols['shape']).'>'.$dmshapes.'</option>'; 
							}
							echo $view_dmshape;
							?>
						</select>
					</div>
					<div class="filterBox">
						<div><b>Cut</b></div>
						<select multiple="multiple" name="cut[]" class="comboStyle">
							<?php
							$cutlist = array('G' => 'Good', 'VG' => 'Very Good', 'I' => 'Ideal', 'EX' => 'Excellent', 'F' => 'Fair', 'P' => 'Poor', '' => 'NONE');
							$view_cut = '';
							foreach($cutlist as $cutkey => $cutval) {
								$view_cut .= '<option value="'.$cutkey.'" '.arOptSelected($cutkey, $detailcols['cut']).'>'.$cutval.'</option>'; 
							}
							echo $view_cut;
							?>
						</select>
					</div>
					<div class="filterBox">
						<div><b>Color</b></div>
						<select multiple="multiple" name="color[]" class="comboStyle">
							<?php
							$color_list = array('D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
							$view_color = '';
							foreach($color_list as $colorval) {
								$view_color .= '<option value="'.$colorval.'" '.arOptSelected($colorval, $detailcols['color']).'>'.$colorval.'</option>'; 
							}
							echo $view_color;
							?>
						</select>
					</div>
					<div class="filterBox">
						<div><b>Fancy Color</b></div>
						<select multiple="multiple" name="fancycolor[]" class="comboStyle">
							<?php echo $fcolor_list; ?>
						</select>
					</div>
					<div class="filterBox">
						<div><b>Clarity</b></div>
						<select multiple="multiple" name="clarity[]" class="comboStyle">
							<?php
							$clarity_list = array('FL', 'IF', 'VVS1', 'VVS2', 'VS1', 'VS2', 'SI1', 'SI2', 'SI3', 'I1', 'I2', 'I3', 'NONE');
							$view_clr = '';
							foreach($clarity_list as $clrvalue) {
								$clrval = ( $clrvalue == 'NONE' ? '' : $clrvalue );
							$view_clr .= '<option value="'.$clrval.'" '.arOptSelected($clrval, $detailcols['clarity']).'>'.$clrvalue.'</option>'; 
							}
							echo $view_clr;
							?>
						</select>
					</div>
					<div class="filterBox">
						<div><b>Cert</b></div>
						<select multiple="multiple" name="cert[]" class="comboStyle">
							<?php
							$cert_list = array('GIA', 'AGI', 'IGI', 'EGL', 'EGL USA', 'EGL NY', 'EGL I', 'EGL H', 'EGL OTHER', 'OTHER', 'EGL P', 'NONE');
							$view_cert = '';
							foreach($cert_list as $certvalue) {
								$view_cert .= '<option value="'.$certvalue.'" '.arOptSelected($certvalue, $detailcols['cert']).'>'.$certvalue.'</option>'; 
							}
							echo $view_cert;
							?>
						</select>
					</div>
					<div class="filterBox1">
						<div><strong>Price Discount</strong></div>
						<br>
						<div>
							<select name="manufactur_name" required="" class="setmanufact">
								<option value="">Select Manufacturer</option>
								<?php
								$manufact_list = array('eBay', 'Amazon', 'Amazon Ring', 'Rakuten');
								$manufactview = '';
								foreach($manufact_list as $manufactvale) {
									$manufactview .= '<option value="'.$manufactvale.'" '.setSelected($manufactvale, $detailcols['manufact_name']).'>'.$manufactvale.'</option>'; 
								}
								echo $manufactview;
								?>
							</select>
						</div>
						<br>
						<div><a href="#javascript" onclick="addDiscountRow()">Add Row</a></div>
						<table class="settable">
							<tr>
								<td>Min Price</td>
								<td>Max. Price</td>
								<td>Discount</td>
							</tr>
							<?php
							$i = 0;
							$viewdiscrow = '';
							$datarow = $detailcols['rapdisc'];
							if( count($datarow['mins_price']) > 0 ) {
								foreach($datarow['mins_price'] as $discrows) {
									$viewdiscrow .= '<tr>
										<td><input name="minpr[]" class="discfield" value="'.$discrows.'" /></td>
										<td><input name="maxpr[]" class="discfield" value="'.$datarow['maxs_price'][$i].'" /></td>
										<td><input name="discvalue[]" class="discfield" value="'.$datarow['rapnet_discount'][$i].'" />
										<a href="#javascript" class="removerow" onclick="SomeDeleteRowFunction(this)"> X</a></td>
									</tr>';
									$i++;
								}
							} else {
								$viewdiscrow .= '<tr>
									<td><input name="minpr[]" class="discfield" /></td>
									<td><input name="maxpr[]" class="discfield" /></td>
									<td><input name="discvalue[]" class="discfield" /></td>
								</tr>';   
							}
							echo $viewdiscrow;
							?>
						</table>
						<table class="settable" id="discountRows"></table>
					</div>
					<div class="filtrBox">
						<div><b>Carat</b> </div>
						<div style="margin:55px 0 0 13px;"> (Min):
							<input name="caratmin" id="caratmin" value="0" class="amountBox" />
							(Max):
							<input name="caratmax" id="caratmax" value="9.99" class="amountBox" />
						</div>
					</div>
					<div class="labelFields"> Enter Name :
						<input type="text" name="search_name" required="" value="<?php echo $rowdetail['name']; ?>" id="search_name">
						<input type="hidden" name="edit_id" required="" value="<?php echo $rowdetail['id']; ?>" id="search_name">
						<input type="submit" name="submit_search" value="Save Filter" onclick="return checkval();">
						<br/>
						<br/>
						<input type="submit" name="submit" value="Show Diamond">
						<input type="reset" value="Reset Filter">
					</div>
				</div>
				<div class="clear"></div><br>
					<div class="saveSearch">
						<div><b>Discount Search</b> </div>
						<div>
							<?php if (count($savesearch_disc) > 0) { ?>
								Cash Limit: <input name="cash_limit" id="cash_limit" value="<?php echo (isset($_SESSION['cash_limit']) && !empty($_SESSION['cash_limit'])) ? $_SESSION['cash_limit'] : '1,000,000';?>" /> 
								<?php
								echo '<table cellpadding="6" border="1">';
								$hd_list = array('HD', 'HDERING', 'ERPHD', 'NHD', 'EBSFJ');
								foreach($savesearch_disc as $search) {
									$search_str = unserialize($search['search_string']);

									if( in_array($search_str['diamondscat'], $hd_list)  ) {
										if( $search_str['diamondscat'] === 'EBSFJ' ) {
											$page_link = SITE_URL.'stuller_fashion_jewelry/stuller_fashionjew_listing/view/'.$search_str['diamondscat'].'/'.$search['id'];
										} else if( $search_str['diamondscat'] === 'HDERING' ) {
											$page_link = SITE_URL.'hdering_admin_listings/heart_collection_items/view/'.$search_str['diamondscat'].'/'.$search['id'];
										} else {
											$page_link = SITE_URL.'admin_listings/heart_collection_items/view/'.$search_str['diamondscat'].'/'.$search['id'];
										}
										$eBayLink = '<a href="'.$page_link.'" target="_blank">'.$search['name'].'</a>';
										$download_link = '<a href="'.SITE_URL.'make_item_list_excel_file/download_item_listings_excel/'.$search_str['diamondscat'].'/'.$search['id'].'">Download Excel</a>';
									} else {
										if( $search['manufact_name'] == 'eBay' ) {
											$pageLink = SITE_URL.'admin/allloosediamonds/view/'.$search['id'];
											$eBayLink = '<a href="'.$pageLink.'" target="_blank">'.$search['name'].'</a>';
										} else {
											$eBayLink = $search['name'];
										}
										$download_link = '';
									}
									?>
									<tr>
										<td><?php echo $eBayLink; ?></td>
										<td><?php echo $search['date']; ?></td>
										<td>
											<?php
											if( $search['manufact_name'] == 'Amazon' ) {
												$view_feeds = '<div><a href="'.SITE_URL.'csvfileadmin/csvTemplateDownlaodForAmazon/'.$search['id'].'">Amazon.txt Download</a></div>'; 
											} elseif( $search['manufact_name'] == 'Amazon Ring' ) {
												$view_feeds = '<div><a href="'.SITE_URL.'ringItemAmazonTemplate/txtTemplateDownlaodForAmazon/ERPHD/Band" target="_blank">Amazon Band Item</a></div>';
											} elseif( $search['manufact_name'] == 'Sears' ) {
												$view_feeds = '<div><a href="'.SITE_URL.'searsexcelfile/readWriteSearsTemplateFile/'.$search['id'].'" target="_blank">Sears Excel Download</a></div>';
											} elseif( $search['manufact_name'] == 'Rakuten' ) {
												$view_feeds = '<div><a href="'.SITE_URL.'rakutentextfile/inventFeedTemplatFile/'.$search['id'].'">Rakuten Inventory Download</a></div>'; 
											} else {
												$view_feeds = 'eBay';
											}
											echo $view_feeds;
											?>
										</td>
										<td><?php echo $download_link; ?></td>
										<td>
											<a href="<?php echo config_item('base_url'); ?>admin/delsavedsearch/<?php echo $search['id']; ?>/1">Delete</a> | 
											<a href="<?php echo config_item('base_url'); ?>admin/loosediamondsii/view/<?php echo $search['id']; ?>/">Edit</a>
										</td>
									</tr>
								<?php
								}
							echo '</table>';
						} ?>
						<script type="text/javascript">
						jQuery('.sllinkdisc').each(function(){
							jQuery(this).click(function(){
								var cash = jQuery('#cash_limit').val();
								var url = "<?php echo config_item('base_url'); ?>admin/saveloosesearchii/";
								var id = jQuery(this).attr('rel');
								window.location = url+'id='+id;
							});	
						});
						</script>
					</div>
				</div>
				<div class="clear"></div><br>
				<script>
				function checkval() {
					if(document.getElementById('search_name').value == '') {
						alert('Please enter search name');
						return false;
					}
					return true;
				}
				</script>
			</form>
		</div>
	<?php } ?>
</div>
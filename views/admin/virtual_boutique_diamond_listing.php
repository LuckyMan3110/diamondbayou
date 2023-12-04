<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?><div class="inner">
	<div class="contentpanel">
		<div><?php echo admin_main_menu_list(); ?></div>
		<div>
			<div>
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
					function set_option_sub_category_lists(option_value) {
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

								$(".ebayExportResponse").html('<div style="width:200px; text-align:center;"><img src="<?php echo SITEIMG_URL . 'images/loading.gif'; ?>"></div>').show();
								$("#ebay_return_mesage").html('<div style="width:200px; text-align:center;"><img src="<?php echo SITEIMG_URL . 'images/loading.gif'; ?>"></div>');
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

								$.facebox('<div style="width:200px; text-align:center;"><img src="<?php SITEIMG_URL."images/loading.gif"; ?>"></div>');
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

					function set_option_lists(option_value) {
						window.location = option_value;
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
						Select Shape:
						<select onchange="set_option_sub_category_lists(this.value)" id="get_main_category_value">
							<option>Select Shape</option>
							<?php echo $category_list; ?>
						</select>
						<form action="<?= SITE_URL .'stuller_fashion_jewelry/downloadcsvbycategory'; ?>" method="GET" enctype="multipart/form-data">
							<input type="hidden" name="maincat_id" id="maincat_id" value="3">
							<input type="hidden" name="cat_id" id="cat_id" value="<?= $category_id ?>">
							<input type="hidden" name="subcat_id" id="subcat_id" value="">
							<input type="submit" value="Download csv" name="download_csv">
						</form>
					</div>
					<div class="ebayExportResponse"></div>
					<br>
					<form method="post" action="" enctype="multipart/form-data">
						<button name="authentication_submit" type="authentication_submit" id="add_product" class="btn btn-primary">Must Start with Authentication Before Send to Etsy</button>
					</form>
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
			</div>
		</div>
	</div>
</div>
<script>
function setAction() {
	if (document.getElementById["ds"].checked) {
		choice = document.getElementById["ds"].value;
		alert('choice');
		window.location = choice;
	 }
}
</script>
<div class="inner">
	<div class="contentpanel">
		<div><?php echo admin_main_menu_list(); ?></div>
		<div class="pull-left breadcrumb_admin clear_both">
			<div class="pull-left page_title theme_color">
				<h1>Affiliate Customer Management</h1>
				<h2 class="">Affiliate Customer</h2>
			</div>
			<div class="pull-right">
				<ol class="breadcrumb">
					<li><a href="<?php echo SITE_URL; ?>admin">Home</a></li>
					<li><a href="<?php echo SITE_URL; ?>admin/customers">Affiliate Customer</a></li>
				</ol>
			</div>
		</div>
		<script>
		var adminURL = "<?php echo config_item('base_url'); ?>admin/jcart_download_excel";
		</script>
		<style type="text/css">
		td.body div.ffooter,td.body div.content{display:none !important;}
		table tr td{vertical-align:top;}
		</style>
		<?php
		$id = isset($id) ? $id : '';
		if($page_action == 'add') {
		?>
			<div class="blue_man">
				<div class="blue_admin_box1">
					<div class="addcountry_box">
						<div>
							<div class="heading">
								<h1 class="hbb">Affiliate Customer Management</h1><br/>
							</div>
							<div style="width:100%;">
								<? if(isset($success) && !empty($success)){ ?>
									<div style="width:95.5%; margin:5px; padding:10px 10px 10px 10px; background-color:#C8F2BB; font-weight:bold">
										<? echo $success; ?>
									</div>
								<? } ?>
							</div>
							<div style="clear:both"></div>
							<div class="search_box">
								<form name="addEditForm" id="addEditForm" action="" method="post" enctype="multipart/form-data" >
									<table width="80%" border="0" align="center" cellpadding="5" cellspacing="0" class="table_border">
										<tr>
											<td width="20%" align="right">User Name</td>
											<td colspan="3">
												<dd id="account_name-element">
												<input type="text" name="user_name" id="item_sku" required="required" value="<?= isset($username)?$username:''; ?>" maxlength="30" size="40" class="input1 required alpha" / >
												</dd>
											</td>
										</tr>
										<tr>
											<td width="20%" align="right">First Name</td>
											<td colspan="3">
												<dd id="account_name-element">
												<input type="text" name="ufirst_name" id="vendor_name" value="<?= isset($fname)?$fname:''; ?>" maxlength="30" size="40" class="input1 required alpha" /><?php echo form_error('vendor_name'); ?>
												</dd>
											</td>
										</tr>
										<tr>
											<td width="20%" align="right">Last Name</td>
											<td colspan="3">
												<dd id="account_name-element">
												<input type="text" name="ulast_name" id="vendor_name" value="<?= isset($lname)?$lname:''; ?>" maxlength="30" size="40" class="input1 required alpha" /><?php echo form_error('vendor_name'); ?>
												</dd>
											</td>
										</tr>
										<tr>
											<td width="20%" align="right">Email</td>
											<td colspan="3">
												<dd id="account_name-element">
												<input type="email" name="uemail_address" required="required" id ="vendor_sku" value="<?= isset($email)?$email:''; ?>" maxlength="30"  size="40" /><?php echo form_error('vendor_sku'); ?>
												</dd>
											</td>
										</tr>
										<?php if($edit_id == ''){ ?>
											<tr>
												<td width="20%" align="right">Login Password</td>
												<td colspan="3">
													<dd id="account_name-element">
													<input type="text" name="ulogin_pass" id="item_title" value="" maxlength="80"  size="30" />
													<?php echo form_error('item_title'); ?> 
													</dd>
												</td>
											</tr>
										<?php }else{ ?>
											<tr>
												<td align="right">Affiliate URL</td>
												<td colspan="3"><input type="text" name="affiliate_link" value="<?php echo $affiliate_url; ?>" size="40" /></td>
											</tr>
										<?php } ?>
										<tr>
											<td align="right">Allow Options</td>
											<td colspan="3">
											<?php echo $view_allowoption; ?>
											</td>
										</tr>
										<tr>
											<td align="right">&nbsp;</td>
											<td colspan="3">
												<input type="hidden" name="txt_editid" value="<?php echo $edit_id; ?>" />
												&nbsp;&nbsp;<button name="back" id="back" type="button" class="btn btn-primary" onclick="history.go(-1);">Back</button>
												<input type="submit" name="btn_submit" id="edit" value="<?= ucfirst($action); ?> User" class="btn btn-primary" />
											</td>
										</tr>
									</table>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
</div>
<?php echo popupsOtherBlockData(); ?>
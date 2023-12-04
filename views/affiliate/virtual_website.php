<?php echo featured_inlinks(); ?>
<!-- start body content -->
<br><br>
<div class="body_content">
	<div class="leftmenu_bk">
		<?php echo wholeSalerLeftMenu(); ?>
	</div>
	<style>
	.virtualws .colsrow_st{padding: 10px 10px 13px!important;}
	</style>
	<form method="post" name="virtualForm" enctype="multipart/form-data">
		<div class="rightmenu_bk">
			<h2>My Account > <span class="setSubLabel">My Virtual Webiste</span></h2><br>
			<div class="dataContent">We are proud to announce MyVirtualWebstore.com to our customers. It is a retail showcase website. Please follow the steps below to configure your MyVirtualWebstore.com</div>
			<div class="changepass_block">
				<div class="chbk_heading">Enter Settings</div>
				<div class="leftlable_bk virtualws">
					<div class="colsrow_st" style="padding: 18px 10px 20px!important;">Upload Compnay logo*</div>
					<div class="colsrow_st">Company Name *</div>
					<div class="colsrow_st">Phone Number *</div>
					<div class="colsrow_st">affiliate Url *</div>
					<div class="colsrow_st">affiliate Commission *</div>
				</div>
				<div class="rightcontent_bk">
					<div class="content_rowscol"><input type="file" name="comp_logo" /> <span class="label_content">Logo size is 250px X 100px</span></div>
					<div class="content_rowscol"><input type="text" name="comp_name" value="<?php echo $comp_name; ?>" /></div>
					<div class="content_rowscol"><input type="text" name="phone_number" value="<?php echo $phone_number; ?>" /></div>
					<div class="content_rowscol"><input type="text" name="affiliate_url" value="<?php echo $affiliate_url; ?>" /></div>
					<div class="content_rowscol">Cost x <input type="text" value="<?php echo $affiliate_commission; ?>" class="setcost_field" name="affiliate_commission" /></div>
				</div>
				<div class="clear"></div><br>
				<div class="setbuton"><input type="submit" class="changepass_btn" value="Save" name="vitrual_wbstore" /></div>
			</div>
		</div>
	</form>
	<div class="clear"></div>
</div>
<!-- end body content -->
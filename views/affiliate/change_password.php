<?php echo featured_inlinks(); ?>
<!-- start body content -->
<br><br>
<div class="body_content">
	<div class="leftmenu_bk">
		<?php echo wholeSalerLeftMenu(); ?>
	</div>
	<form method="post" name="chPassForm" action="<?php echo $action_link; ?>">
		<div class="rightmenu_bk">
			<h2>My Account > <span class="setSubLabel">Change Password</span></h2><br>
			<div class="erorMesage"><?php echo $return_eror2; ?></div>
			<div class="changepass_block">
				<div class="chbk_heading">Change Password</div>
                <div class="leftlable_bk">
                	<div class="colsrow_st">Old Password</div>
                    <div class="colsrow_st">New Password</div>
                    <div class="colsrow_st">Confirm New Password</div>
                </div>
                <div class="rightcontent_bk">
                	<div class="content_rowscol"><input type="password" name="curr_pass" /></div>
                    <div class="content_rowscol"><input type="password" name="newlogin_pass" /><br>
                    <span class="setpasslabel">Between 4 and 15 characters</span>
                    </div>
                    <div class="content_rowscol"><input type="password" name="confirm_pass" /></div>
                </div>
                <div class="clear"></div><br>
                <div class="setbuton"><input type="submit" class="changepass_btn" value="Change Password" name="change_pass" /></div>
			</div>
		</div>
	</form>
	<div class="clear"></div>
</div>
<!-- end body content -->
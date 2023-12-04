<div class="body_content">
	<h1 class="whContentHead">Login Account</h1><br>
	<div class="pagesb_block">
		<form name="loginform" method="post" action="<?php echo $login_link; ?>">
			<h3>Login</h3>
			<div class="erorMesage"><?php echo $logins_error; ?></div>
			<div class="formrow">
				<div class="fieldlabel">Username</div>
				<div class="fieldvalue"><input type="text" name="user_name" value="demouser" /></div>
				<div class="clear"></div>
			</div>
			<div class="formrow">
				<div class="fieldlabel">Password</div>
				<div class="fieldvalue"><input name="login_pass" type="password" value="12345" /></div>
				<div class="clear"></div>
			</div>

			<div class="formrow">
				<div class="fieldlabel">&nbsp;</div>
				<div class="fieldvalue"><input type="submit" name="login_btn" value="Login" /></div>
				<div class="clear"></div><br>
			</div>
		</form>
	</div>
	<div class="clear"></div>
</div>
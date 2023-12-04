<link href="<?php echo config_item('base_url') ?>css/newstyle.css" rel="stylesheet" type="text/css" />
<style>
.signInBoxOuter{max-width:520px;float:left;width:100%;border:#dedfde 1px solid;margin:11px 20px 20px;min-height:325px;padding:15px}
.createAccountBox li{padding:0 0 2px}
.createAccountBox ul{padding:0;margin:0}
#locginContent h2{text-align:center}
.accountButton{width:auto;float:right;margin-top:-12px}
#guest_login_register{background-color:#000;color:#fff;padding:7px 38px;border:solid 1px #000;font-weight:700;margin-right:3px}
.signInNowBox{max-width:100%;width:100%;margin:10px 0 0;float:right;text-align:right}
.createAccountbuttonBox{max-width:100%}
#locginContent input[type="text"],#locginContent input[type="password"],#locginContent input[type="email"],#locginContent select,#locginContent textarea{height:36px;width:100%!important;border:solid 1px #ddd;max-width:100%!important;padding-left:8px}
.fieldBoxOuter{max-width:100%;width:100%;margin:10px 0 0}
.fieldBoxInner{width:100%;float:left;padding:0 0 5px}
.fieldName{width:25%;float:left;text-align:right;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:13px;font-weight:300;color:#8c8a8c;padding:3px 0 0}
.fieldText{float:left;margin:0 0 0 6px;width:73%}
.signInBoxOuter h2{padding:1px 0 5px 5px}
.mainPageHeading{background:#000;margin:0}
</style>
<div class="row-fluid"> <br>
	<div class="mainPageHeading">
		<h2>User Login / Sign Up Page</h2>
	</div>
	<br>
	<div class="bodymid2" id="locginContent">
		<div class="row-fluid">
			<div class="">
				<div class="topLines" style="margin-top:0px;"> 
					<!-- <img src="<?php echo config_item('base_url') ?>img/top-lines.jpg" alt="" border="0" />--> 
				</div>
				<!-- Sign In Box Start Here -->
				<?php // $this->load->helper('form');  ?>
				<form action="<?php echo config_item('base_url') ?>account/membersignin" method="post" name="signin" id="signin">
					<div class="signInBoxOuter col-sm-6">
						<h2>sign in</h2>
						<div class="seteror_msg"><?= isset($errors)?$errors:''; ?></div>
						<span>If you have a “Yadegar Diamonds” account, please sign in.</span>
						<div class="fieldBoxOuter">
							<div class="fieldBoxInner">
								<div class="fieldName">*Username</div>
								<div class="fieldText">
									<input type="text" name="username" value="<?php echo $username; ?>" class=		"fieldsize" />
								</div>
								<div class="clear"></div>
							</div>
						</div>
						<div class="fieldBoxOuter">
							<div class="fieldBoxInner">
								<div class="fieldName">*Password</div>
								<div class="fieldText">
									<input type="password" name="password" value="<?php echo $password; ?>" class="fieldsize" />
								</div>
							</div>
							<div class="clear"></div>
							<div class="fieldBoxInner">
								<div class="fieldName">&nbsp;</div>
								<div class="fieldText"><span>Password are case sensitive</span></div>
							</div>
						</div>
						<div class="signInNowBox">
							<div class="textLeft">Not sure if you have an Account?<br /><a href="<?php echo config_item('base_url') ?>account/forgetpass">Forgot your password?</a></div>
							<div class="signInNowButton"><a href="javascript:volid(0)" onclick="document.signin.submit();" class="btnLinkStyle">Sign In Now</a></div>
							<div class="clear"></div>
						</div>
						<div class="clear"></div>
					</div>
					<!-- Sign In Box End Here -->
				</form>
				<div class="createAccountBox col-sm-6">
					<h2>Create Your Account</h2>
					<h3>Benefits include:</h3>
					<ul>
						<li><strong>Easy access</strong> to order history, saved items &amp; more</li>
						<li><strong>Faster checkout</strong> with stored shipping &amp; billing information</li>
						<li><strong>Exclusive offers</strong> via e-mail such as discounts &amp; shipping upgrades</li>
					</ul>
					<div class="createAccountbuttonBox">
						<div class="privacyPolicy">Review the <a href="<?php echo config_item('base_url') ?>site/page/privacypolicy">Privacy Policy</a></div>
						<div class="accountButton"><a href="<?php echo config_item('base_url') ?>registration" class="btnLinkStyle ">Create Account</a></div>
					</div>
					<div class="clear"></div>
					<h2 style="padding-top:30px;">Proceed as a Guest</h2>
					<form action="<?php echo config_item('base_url') ?>account/membersignin" method="post" name="register" id="register">
						<div style="height:auto;">
							<?php $current_time = time(); ?>
							<div class="fieldBoxOuter">
								<input name="username_guest" value="<?= time() ?>" id="username" type="hidden">
								<input name="name_guest" value="<?= time() ?>" id="name" type="hidden">
								<input name="password_guest" value="<?= $current_time ?>" id="password" type="hidden">
								<input name="cnf_password_guest" value="<?= $current_time ?>" id="cnf_password" type="hidden">
								<div class="fieldBoxInner">
									<div class="fieldName">*Email</div>
									<div class="fieldText">
										<input name="email_guest" value="" required="required" id="email_guest" type="email">
									</div>
								</div>
							</div>
							<div class="signInNowBox">
								<input type="submit" name="guest_login_register" id="guest_login_register" value="Submit" class="btn-default">
							</div>
							<div class="clear"></div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
</div>
<br>
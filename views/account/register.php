<?php

$username = array('name' => 'username', 'id' => 'username', 'value' => set_value('username'));
$name = array('name' => 'name', 'id' => 'name', 'value' => set_value('name'));
$email = array('name' => 'e_mail', 'id' => 'e_mail', 'value' => set_value('e_mail'));
$password = array('name' => 'password', 'id' => 'password', 'value' => '', 'type' => 'password');
$cnf_password = array('name' => 'cnf_password', 'id' => 'cnf_password', 'value' => '', 'type' => 'password');
?>
<style>
.signInBoxOuter span{ padding:0px !important; }
</style>
<link href="<?php echo config_item('base_url') ?>css/newstyle.css" rel="stylesheet" type="text/css" />
<div class="auto-height" id="main-body-a"><br>
<div class="mainPageHeading">
  <h2>User Sign Up / Login Page</h2>
</div>
<div class="bodymid2" id="locginContent">
<div class="">
    <div class="contentSectionInner">
        <div class="topLines" style="margin-top:0px;">
<!--            <img src="<?php echo config_item('base_url') ?>img/top-lines.jpg" alt="" border="0" />-->
        </div>
        <div class="row-fluid">	
        <!-- Sign Up Box Start Here -->
        	<div class="col-sm-6"><form action="<?php echo config_item('base_url') ?>account/register" method="post" name="register" id="register">
            <div class="signInBoxOuter" style="height:auto;">
                <h2>Create Your Account</h2>
<!--                <span>If you do no have a atlasdiamond  customer account, please register.</span>-->
                <?php if (validation_errors()): ?>
                    <?php echo validation_errors();
					 endif; 
					 isset($errors)?$errors:'';
					 ?>
                <div class="fieldBoxOuter">
                    <div class="fieldBoxInner">
                        <div class="fieldName">*Username</div>
                        <div class="fieldText">
                            <?php echo form_input($username); ?>
                        </div>
                    </div>
                    <div class="fieldBoxInner">
                        <div class="fieldName">*Full Name</div>
                        <div class="fieldText">
                            <?php echo form_input($name); ?>
                        </div>
                    </div>
                    <div class="fieldBoxInner">
                        <div class="fieldName">*Email</div>
                        <div class="fieldText">
                            <?php echo form_input($email); ?>
                        </div>
                    </div>
                    <div class="fieldBoxInner">
                        <div class="fieldName">*Password</div>
                        <div class="fieldText">
                            <?php echo form_input($password); ?>
                        </div>
                    </div>
                    <div class="fieldBoxInner">
                        <div class="fieldName">*Confirm Password</div>
                        <div class="fieldText">
                            <?php echo form_input($cnf_password); ?>
                            <input type="hidden" name="txt_submit" value="Submit" />
                        </div>
                    </div>
                    <div class="fieldBoxInner">
                        <div class="fieldName">&nbsp;</div>
                        <div class="fieldText"><span>Password are case sensitive</span></div>
                    </div>
                </div>
                <div class="signInNowBox">
<!--                    <div class="textLeft" style="width:180px;">Already have an <span>Account?<br /><a href="<?php echo config_item('base_url') ?>account/membersignin">Sign in</a></span></div>-->
                    <div class="signInNowButton" style="width:153px; margin-bottom: 5px;">
                    <a href="javascript:void(0);" onclick="document.register.submit();" class="btnLinkStyle">Create Account</a></div>
                    <br>
                </div>
                <div class="clear"></div>
            </div>
        </form></div>
        <!-- Sign Up Box End Here -->
        	<div class="createAccountBox setRightBox col-sm-6 pull-right">
            <h2>sign in</h2>
            <h3>Benefits include:</h3>
            <ul>
                <li><strong>Easy access</strong> to order history, saved items &amp; more</li>
                <li><strong>Faster checkout</strong> with stored shipping &amp; billing information</li>
                <li><strong>Exclusive offers</strong> via e-mail such as discounts &amp; shipping upgrades</li>
            </ul>
            <div class="createAccountbuttonBox">
<!--                <div class="privacyPolicy">Review the <a href="<?php echo config_item('base_url') ?>site/page/privacypolicy">Diamondengagementringsnyc Privacy Policy</a></div>-->
                <div class="accountButton"><a href="<?php echo config_item('base_url') ?>account/membersignin" class="btnLinkStyle">Sign In Now<!--<img src="<?php echo config_item('base_url') ?>img/sign-in-now.jpg" alt="" border="0" align="absmiddle" />--></a></div>
            </div>
        </div>
        </div>
        <div class="clear"></div>
        <br><br>
        <!-- Sign In Box End Here -->

    </div>
</div>
<?php echo form_close(); ?>
</div>
<div class="clear"></div><br>

</div>
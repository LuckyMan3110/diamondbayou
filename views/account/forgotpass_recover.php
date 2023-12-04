<div class="auto-height" id="main-body-a">
<link href="<?php echo config_item('base_url') ?>css/newstyle.css" rel="stylesheet" type="text/css" />
<div class="bodytop"></div>
<br>
<div class="mainPageHeading">
  <h2>User Sign Up / Login Page</h2>
</div><br>
<div class="bodymid2" id="locginContent">
<div class="contentSectionOuter">
<div class="contentSectionInner">
<div class="topLines" style="margin-top:0px;"> 
  <!--            <img src="<?php echo config_item('base_url') ?>img/top-lines.jpg" alt="" border="0" />--> 
</div>
<div class="createAccountBox">
  <h2>Create Your Account</h2>
  <h3>Benefits include:</h3>
  <ul>
    <li><strong>Easy access</strong> to order history, saved items &amp; more</li>
    <li><strong>Faster checkout</strong> with stored shipping &amp; billing information</li>
    <li><strong>Exclusive offers</strong> via e-mail such as discounts &amp; shipping upgrades</li>
  </ul>
  <div class="createAccountbuttonBox">
    <div class="privacyPolicy">Review the <a href="<?php echo config_item('base_url') ?>site/page/privacypolicy">Privacy Policy</a></div>
    <div class="accountButton"><a href="<?php echo config_item('base_url') ?>registration" class="btnLinkStyle ">Create Account<!--<img src="<?php echo config_item('base_url') ?>img/create-account.jpg" alt="" border="0" align="absmiddle" />--></a></div>
  </div>
  <div class="clear"></div>
</div>
<!-- Sign In Box Start Here -->
<?php // $this->load->helper('form');  ?>
<form action="<?php echo config_item('base_url').'account/password_recover/'.$forget_id.'/'.$s_id ?>" method="post" name="signin" id="signin">
<?php //echo form_open('form'); ?>
<?php //echo form_open('account/membersignin'); ?>
<div class="signInBoxOuter">
  <h2>Forgot Password</h2>
  <span>Enter your new login password</span>
  <div class="loginError"><?php echo $errors; ?></div>
  <div class="fieldBoxOuter">
    <div class="fieldBoxInner">
      <div class="fieldName">*New Password</div>
      <div class="fieldText">
        <input type="password" name="txt_pass" value="<?php echo $txt_pass; ?>" class="fieldsize"  />
      </div>
      <div class="clear"></div>
    </div>
    <div class="fieldBoxInner">
      <div class="fieldName">*Confirm Password</div>
      <div class="fieldText">
        <input type="password" name="confirm_password" value="<?php echo $txt_cpass; ?>" class="fieldsize"  />
      </div>
      <div class="clear"></div>
    </div>
  </div>
  <div class="signInNowBox">
    <div class="textLeft"><br />
      <a href="<?php echo config_item('base_url') ?>account/membersignin">Click here To Login</a></div>
    <div class="signInNowButton"><a href="javascript:volid(0)" onclick="document.signin.submit();" class="btnLinkStyle">Submit</a></div>
  </div>
  <div class="clear"></div>
</div>
<!-- Sign In Box End Here -->

</div>
</div>
<?php echo form_close(); ?>
</div>
<div class="clear"></div><br>
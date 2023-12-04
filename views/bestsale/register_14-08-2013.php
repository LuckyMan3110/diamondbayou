<?php
		//echo form_open('bestsale/register');
		$username=array('name' => 'username','id' => 'username', 'value' => set_value('username'));
		$name=array('name' => 'name','id' => 'name','value' => set_value('name'));		
		$email=array('name' => 'e_mail','id' => 'e_mail','value' => set_value('e_mail'));
		$password=array('name' => 'password','id' => 'password','value' => '','type' => 'password');
		$cnf_password=array('name' => 'cnf_password','id' => 'cnf_password','value' => '','type' => 'password');
?>
<link href="<?php echo config_item('base_url')?>css/newstyle.css" rel="stylesheet" type="text/css" />
	<div class="contentSectionOuter">
        <div class="contentSectionInner">
            <div class="topLines" style="margin-top:0px;"><img src="<?php echo config_item('base_url')?>img/top-lines.jpg" alt="" border="0" /></div>
            <div class="createAccountBox">
                <h2>sign in</h2>
                <h3>Benefits include:</h3>
                    <ul>
                        <li><strong>Easy access</strong> to order history, saved items &amp; more</li>
                        <li><strong>Faster checkout</strong> with stored shipping &amp; billing information</li>
                        <li><strong>Exclusive offers</strong> via e-mail such as discounts &amp; shipping upgrades</li>
                    </ul>
                    <div class="createAccountbuttonBox">
                        <div class="privacyPolicy">Review the <a href="<?php echo config_item('base_url')?>site/page/privacypolicy">Diamondengagementringsnyc Privacy Policy</a></div>
                        <div class="accountButton"><a href="<?php echo config_item('base_url')?>account/membersignin"><img src="<?php echo config_item('base_url')?>img/sign-in-now.jpg" alt="" border="0" align="absmiddle" /></a></div>
                    </div>
            </div>
            <!-- Sign In Box Start Here -->
            <form action="<?php echo config_item('base_url')?>/bestsale/register" method="post" name="register" id="register">
            <div class="signInBoxOuter" style="height:auto;">
                <h2>Create Your Account</h2>
                <span>If you do no have a atlasdiamond  customer account, please register.</span>
                <?php if(validation_errors()): ?>
                <?php echo validation_errors();?>
                <?php endif; ?>
                <div class="fieldBoxOuter">
                    <div class="fieldBoxInner">
                        <div class="fieldName">*Username</div>
                        <div class="fieldText">
                            <?php echo form_input($username);?>
                        </div>
                    </div>
                    <div class="fieldBoxInner">
                        <div class="fieldName">*Full Name</div>
                        <div class="fieldText">
                        	<?php echo form_input($name);?>
                        </div>
                    </div>
                    <div class="fieldBoxInner">
                        <div class="fieldName">*Email</div>
                        <div class="fieldText">
                        	<?php echo form_input($email);?>
                        </div>
                    </div>
                    <div class="fieldBoxInner">
                        <div class="fieldName">*Password</div>
                        <div class="fieldText">
                        	<?php echo form_input($password);?>
                        </div>
                    </div>
                    <div class="fieldBoxInner">
                        <div class="fieldName">*Confirm Password</div>
                        <div class="fieldText">
                        	<?php echo form_input($cnf_password);?>
                        </div>
                    </div>
                    <div class="fieldBoxInner">
                        <div class="fieldName">&nbsp;</div>
                        <div class="fieldText"><span>Password are case sensitive</span></div>
                    </div>
                </div>
                <div class="signInNowBox">
                    <div class="textLeft" style="width:180px;">Already have an <span>Account?<br /><a href="<?php echo config_item('base_url')?>account/membersignin">Sign in</a></span></div>
                    <div class="signInNowButton" style="width:153px;"><a href="javascript:void(0);" onclick="document.register.submit();" ><img src="<?php echo config_item('base_url')?>img/create-account.jpg" alt="" border="0" /></a></div>
                </div>
            </div>
            </form>
            <!-- Sign In Box End Here -->
            
        </div>
    </div>
<?php echo form_close();?> 


<?php /*?><!--<div class="registerMain">
    <div>
            <div><?php echo $top_ads;?></div>
            <div class="registerMainContent">
                    <div class="registerHeading"><?php //echo $userid; ?><h1 style="text-align:center;padding:10px;color: rgb(100, 34, 132);">Please fill details below</h1></div>
                    <div>
                            <table border="0" width="100%" cellspacing="5" cellpadding="5" class="pad10" style="text-align:left;">
                            <?php if(validation_errors()):?>
                            <thead>
                                    <tr>
                                            <td colspan="2" class="errors"><?php echo validation_errors();?></td>
                                    </tr>
                            </thead>
                            <?php endif; ?>
                            <tbody>
                                    <tr>
                                            <td class="registerColLeft"><span>*</span>Username</td>
                                            <td><?php echo form_input($username);?></td>
                                    </tr>
                                    <tr>
                                            <td class="registerColLeft"><span>*</span>Full name</td>
                                            <td><?php echo form_input($name);?></td>
                                    </tr>
                                    <tr>
                                            <td class="registerColLeft"><span>*</span>Email</td>
                                            <td><?php echo form_input($email);?></td>
                                    </tr>
                                    <tr>
                                            <td class="registerColLeft"><span>*</span>Password</td>
                                            <td> <?php echo form_input($password);?></td>
                                    </tr>
                                    <tr>
                                            <td class="registerColLeft"><span>*</span>Confirm Password</td>
                                            <td><?php echo form_input($cnf_password);?></td>
                                    </tr>								
                                    <tr>
                                            <td colspan="2" align="center"><?php echo form_submit(array('name'=>'register'), 'Register');?></td>
                                    </tr>
                            </tbody><?php form_close(); ?>
                            </table>
                    </div>
            </div>				
    </div>
</div>--><?php */?>
<link href="<?php echo config_item('base_url') ?>css/newstyle.css" rel="stylesheet" type="text/css" />
<div class="contentSectionOuter">
    <div class="contentSectionInner">
        <div class="topLines" style="margin-top:0px;">
<!--            <img src="<?php echo config_item('base_url') ?>img/top-lines.jpg" alt="" border="0" />-->
        </div>
        <!-- Sign In Box Start Here -->
        <?php // $this->load->helper('form');  ?>
        <form action="<?php echo config_item('base_url') ?>account/forgetpass" method="post" name="signin" id="signin">
            <?php //echo form_open('account/membersignin'); ?>					      			 
            <div class="signInBoxOuter">
                <h2>Forget Password</h2>
                <span>Enter your Email Address.</span>
                <div class="fieldBoxOuter">
                    <div class="fieldBoxInner">
                        <div class="fieldName">*Email</div>
                        <div class="fieldText">
                            <input type="text" name="email" value="<?php echo $email; ?>" class="fieldsize"  /> 
                        </div>
                    </div>
                    <? echo $errors ?>
                </div>
                <div class="signInNowBox">
                    <div class="textLeft">Not sure if you have an Account?<br /><a href="<?php echo config_item('base_url') ?>account/forgotpassword">Forgot your password?</a></div>
                    <div class="signInNowButton"><a href="javascript:volid(0)" onclick="document.signin.submit();" ><h3>Request Password</h3></a></div>
                </div>
            </div>
            <!-- Sign In Box End Here -->

    </div>
</div>
<?php echo form_close(); ?> 


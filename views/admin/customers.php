<div class="inner"> 
  <!--\\\\\\\ inner start \\\\\\-->
  <div class="contentpanel">
      <!-- main menu start -->
        <div><?php echo admin_main_menu_list(); //// admin_mainmenu helper ?></div>
        <!-- main menu end -->
  <div class="pull-left breadcrumb_admin clear_both">
    <div class="pull-left page_title theme_color">
      <h1>Settings</h1>
      <h2 class="">Manage Customers</h2>
    </div>
    <div class="pull-right">
      <ol class="breadcrumb">
        <li><a href="<?php echo SITE_URL; ?>admin">Home</a></li>
        <li>Settings</li>
      </ol>
    </div>
  </div>
  <?php
  	if($action == 'add' || $action == 'edit') {
   ?>
   <div class="orderdt_block">
   <h4>Settings</h4>
   <?php echo $rturn_msg; ?>
   <form method="post" action="<?php echo htmlspecialchars($action_link); ?>" name="customerForm">
       
   <style>
    .order_info td{padding:5px;}
   </style>
   <?php
	 //echo setForm($action_link, 'customerForm')?>
      <table class="order_info" cellpading="5">
            <tr>
              <td width="25%">First Name*</td>
              <td><input type="text" name="fname" id="fname" class="form-control" value="<?php echo $fname;?>" />
			  <?php echo form_error('fname');?></td>
            </tr>
            <tr>
              <td>Last Name:</td>
              <td><input type="text" name="lname" id="lname" class="form-control" value="<?php echo $lname;?>">
                <?php echo form_error('lname');?></td>
            </tr>
            <tr>
              <td>Address Line1*</td>
              <td><input type="text" name="address1" id="address1" class="form-control" value="<?php echo $address1;?>" /></td>
            </tr>
            <tr>
              <td>Address Line2</td>
              <td><input type="text" name="address2" id="address2" class="form-control" value="<?php echo $address2;?>" /></td>
            </tr>
            <tr>
              <td>Country</td>
              <td>
              	<select name="cmb_country" id="cmb_country" class="form-control">
                	<?php echo $option_ctlist; ?>
                </select>
              </td>
            </tr>
             <tr>
              <td>City*</td>
              <td><input type="text" name="city" id="city" class="form-control" value="<?php echo $city;?>" /></td>
            </tr>
            <tr>
              <td>State*</td>
              <td><input type="text" name="state" id="state" class="form-control" value="<?php echo $province;?>" /></td>
            </tr>
            <tr>
              <td>Postcode*</td>
              <td><input type="text" name="zipcode" id="zipcode" class="form-control" value="<?php echo $postcode;?>" /></td>
            </tr>
            <tr>
              <td>Telephone* </td>
              <td valign=""><input type="text" name="phone" id="phone" class="form-control" value="<?php echo $phone;?>" />
                <?php echo form_error('phone');?><br>
                </td>
            </tr>
            <tr>
              <td>Email Address* </td>
              <td><input type="email" name="email" id="email_adres" class="form-control" value="<?php echo $email;?>" />
                <?php echo form_error('email');?>
                </td>
            </tr>
            <tr>
              <td>Login Username* </td>
              <td><input type="text" name="login_user" required="required" class="form-control" value="<?php echo $login_user;?>" /></td>
            </tr>
            <tr>
              <td>Login Password* </td>
              <td><input type="password" name="login_pass" required="required" class="form-control" id="login_pass" />
              </td>
            </tr>
            <tr>
              <td colspan="2"><div class="accountButton"><input type="submit" name="btn_prefsubmit" value="Submit" class="accountBtn btn btn-primary" /></div></td>
            </tr>
            </table>
    </form>
    </div>
    <?php
	} else {
  ?>
    <div id="pagedata">
      <table id="pageresults" style="display:none; ">
      </table>
    </div>
    <?php } ?>
  </div>
  <!--\\\\\\\ inner end\\\\\\--> 
</div>
<!--\\\\\\\ wrapper end\\\\\\--> 
<?php echo popupsOtherBlockData(); ?>
<?php $this->load->helper('form');  ?>
<div>
  <div class="bread-crumb">
    <div class="breakcrum_bk">
    <ul>
      <li><a href="<?php echo config_item('base_url')?>">Home</a></li>
      <li>Account Setting</li>
    </ul>
    </div>
    <div class="clear"></div>
  </div>
  <h1 class="account_heading">Welcome To Your Account</h1>
  <br><br>
  <div class="tabs_area">
  	<ul><?php echo user_account_menu(); ?></ul>
  </div>
  <div class="clear"></div>
  <div class="tabs_ctarea">
  <h2 class="sbtabs_heading">Account Setting</h2>
  <div class="tabsv_contents">
  Make settings of your account<br><br>
  <br>
  <div class="row-fluid">
	  <?php //echo form_open(config_item('base_url').'shoppingbasket/orderinformation')
        echo form_open(config_item('base_url').'account/account_setting/name');
      ?>
        <div class="shiping_left col-sm-6">
        <h3 class="headingbg">Change Name Preferences</h3><br>
        <?php
            if( !empty($return_eror) ) {
                echo '<div class="error_msg">'.$return_eror.'</div>';	
            }
        ?>
        <table class="order_info">
                <tr>
                  <td>First Name*</td>
                  <td><input type="text" name="first_name" id="first_name" value="<?php echo $first_name;?>" />
                  <?php echo form_error('fname');?></td>
                </tr>
                <tr>
                  <td>Last Name:</td>
                  <td><input type="text" name="last_name" id="last_name" value="<?php echo $last_name;?>">
                    <?php echo form_error('lname');?></td>
                </tr>
                <tr>
                  <td>Current Password:</td>
                  <td><input type="password" name="curr_pass" id="curr_pass" value="<?php echo $address1;?>" /></td>
                </tr>
                <tr>
                  <td><input type="hidden" name="name_section" value="true"  />&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="2"><div class="accountButton"><input type="submit" name="btn_prefsubmit" value="Submit" class="accountBtn" /></div></td>
                </tr>
                </table></div>
      <?php echo form_close();?>
      <?php //echo form_open(config_item('base_url').'shoppingbasket/orderinformation')
        echo form_open(config_item('base_url').'account/account_setting/email');
      ?>
        <div class="shiping_left col-sm-6">
        <h3 class="headingbg">Change Email Address and Password</h3><br>
        <?php
            if( !empty($return_eror2) ) {
                echo '<div class="error_msg">'.$return_eror2.'</div>';	
            }
        ?>
        <table class="order_info">
                <tr>
                  <td width="32%">Email Address*</td>
                  <td><input type="text" name="email_adres" id="email_adres" value="<?php echo $email_adres;?>" />
                  <?php echo form_error('fname');?></td>
                </tr>
                <tr>
                  <td>Current Password:</td>
                  <td><input type="password" name="curr_pass" id="curr_pass" />
                    <?php echo form_error('lname');?></td>
                </tr>
                <tr>
                  <td>New Password*</td>
                  <td><input type="password" name="newlogin_pass" id="newlogin_pass" /></td>
                </tr>
                <tr>
                  <td>Confirm Password*</td>
                  <td><input type="password" name="confirm_pass" id="confirm_pass" />
                  <input type="hidden" name="email_section" value="true"  />
                  </td>
                </tr>
                <tr>
                  <td colspan="2"><div class="accountButton"><input type="submit" name="btn_emsubmit" value="Submit" class="accountBtn" /></div></td>
                </tr>
                </table></div>
      <?php echo form_close();?>
  </div>
  <div class="clear"></div>
  </div>
   
  </div>
  <?php echo signup_form(); 
  //$this->session->userdata('user');
  ?> </div>
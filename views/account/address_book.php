<script>
function viewBillingBlock() {
	//$('#billingadres_block').slideDown();
	if( $('#billingadres_block').css('display') == 'none' ) {
		$('#billingadres_block').slideDown();
	} else {
		$('#billingadres_block').slideUp();
	}
}
///// set billing address
function setBillingAddress() {
	
	if( $('#billing_adres').is(':checked') ) {
		$('#biling_fname').val( $('#fname').val() );
		$('#biling_lname').val( $('#lname').val() );
		$('#biling_address1').val( $('#address1').val() );
		$('#biling_address2').val( $('#address2').val() );
		$('#biling_country').val( $('#cmb_country').val() );
		$('#biling_city').val( $('#city').val() );
		$('#biling_state').val( $('#state').val() );
		$('#biling_zipcode').val( $('#zipcode').val() );
		$('#biling_phone').val( $('#phone').val() );
		$('#biling_email').val( $('#email_adres').val() );
		
	}
}
</script>
<style>
.addresHeading{color:#000 !important;}
</style>
<?php $this->load->helper('form');  ?>
<div>
  <div class="bread-crumb">
    <div class="breakcrum_bk">
    <ul>
      <li><a href="<?php echo config_item('base_url')?>">Home</a></li>
      <li>Address Book</li>
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
  <h2 class="sbtabs_heading">Address Book</h2>
  <div class="tabsv_contents">
  Addresses that have been saved in your address book will be available when ordering for fast and easy checkout<br><br>
  <h3 class="headingbg">Enter your New Address</h3><br>
  <br>
  <?php //echo form_open(config_item('base_url').'shoppingbasket/orderinformation')
  	echo form_open(config_item('base_url').'account/address_book');
  ?>
  	<div class="row-fluid">
    	<div class="shiping_left col-sm-6">
    <h3 class="addresHeading">Shipping Address</h3>
    <table class="order_info">
            <tr>
              <td width="25%">First Name*</td>
              <td><input type="text" name="fname" id="fname" value="<?php echo $fname;?>" />
			  <?php echo form_error('fname');?></td>
            </tr>
            <tr>
              <td>Last Name:</td>
              <td><input type="text" name="lname" id="lname" value="<?php echo $lname;?>">
                <?php echo form_error('lname');?></td>
            </tr>
            <tr>
              <td>Address Line1*</td>
              <td><input type="text" name="address1" id="address1" value="<?php echo $address1;?>" /></td>
            </tr>
            <tr>
              <td>Address Line2</td>
              <td><input type="text" name="address2" id="address2" value="<?php echo $address2;?>" /></td>
            </tr>
            <tr>
              <td>Country</td>
              <td>
              	<select name="cmb_country" id="cmb_country">
                	<?php echo $option_ctlist; ?>
                </select>
              </td>
            </tr>
             <tr>
              <td>City*</td>
              <td><input type="text" name="city" id="city" value="<?php echo $city;?>" /></td>
            </tr>
            <tr>
              <td>State*</td>
              <td><input type="text" name="state" id="state" value="<?php echo $province;?>" /></td>
            </tr>
            <tr>
              <td>Postcode*</td>
              <td><input type="text" name="zipcode" id="zipcode" value="<?php echo $postcode;?>" /></td>
            </tr>
            <tr>
              <td>Telephone* </td>
              <td valign=""><input type="text" name="phone" id="phone" value="<?php echo $phone;?>" />
                <?php echo form_error('phone');?><br>
                </td>
            </tr>
            <tr>
              <td>Email Address* </td>
              <td><input type="email" name="email" id="email_adres" value="<?php echo $email;?>" />
                <?php echo form_error('email');?><b></b><br></td>
            </tr>
            <tr>
              <td>Address Type:</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2">
              	<input type="checkbox" name="default_ship" value="DS" <?php echo checkedOption($dfship, 'DS'); ?> id="default_ship" />&nbsp;<label for="default_ship">Dafault Shipping Address</label>&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="checkbox" name="default_bill" value="BL" <?php echo checkedOption($dfbill, 'BL'); ?> id="default_bill" />&nbsp;<label for="default_bill">Dafault Billing Address</label>
              </td>
            </tr>
            <tr>
              <td colspan="2"><div class="accountButton"><input type="submit" name="btn_prefsubmit" value="Submit" class="accountBtn" /></div></td>
            </tr>
            </table></div>    
    	<div class="shiping_left col-sm-6">
    <h3 class="addresHeading">Billing Address</h3>
    	<table class="order_info">
            <tr>
              <td>First Name*</td>
              <td><input type="text" name="biling_fname" id="biling_fname" value="<?php echo $biling_fname;?>" /></td>
            </tr>
            <tr>
              <td>Last Name:</td>
              <td><input type="text" name="biling_lname" id="biling_lname" value="<?php echo $biling_lname;?>"></td>
            </tr>
            <tr>
              <td>Address Line1*</td>
              <td><input type="text" name="biling_address1" id="biling_address1" value="<?php echo $biling_address1;?>" /></td>
            </tr>
            <tr>
              <td>Address Line2</td>
              <td><input type="text" name="biling_address2" id="biling_address2" value="<?php echo $biling_address2;?>" /></td>
            </tr>
            <tr>
              <td>Country</td>
              <td>
              	<select name="biling_country" id="biling_country">
                	<?php echo $optoins_bilcont; ?>
                </select>
              </td>
            </tr>
             <tr>
              <td>City*</td>
              <td><input type="text" name="biling_city" id="biling_city" value="<?php echo $biling_city;?>" /></td>
            </tr>
            <tr>
              <td>State*</td>
              <td><input type="text" name="biling_state" id="biling_state" value="<?php echo $biling_state;?>" /></td>
            </tr>
            <tr>
              <td>Postcode*</td>
              <td><input type="text" name="biling_zipcode" id="biling_zipcode" value="<?php echo $biling_zipcode;?>" /></td>
            </tr>
            <tr>
              <td>Telephone* </td>
              <td valign=""><input type="text" name="biling_phone" id="biling_phone" value="<?php echo $biling_phone;?>" />
                </td>
            </tr>
            <tr>
              <td>Email Address* </td>
              <td><input type="email" name="biling_email" id="biling_email" value="<?php echo $biling_email;?>" /></td>
            </tr>
            </table>
    </div>
    </div>
  <?php echo form_close();?>
  <div class="clear"></div>
  </div>
   
  </div>
  <br>  
  <?php echo signup_form(); 
  //$this->session->userdata('user');
  ?> </div>
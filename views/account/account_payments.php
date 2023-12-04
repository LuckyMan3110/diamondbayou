<?php $this->load->helper('form');  ?>
<script>
function showCardForm() {
	$('#cardForm').show();
}
</script>
<style>
.card_form{color:#fff; background:#825302 !important;}
</style>
<div>
  <div class="bread-crumb">
    <div class="breakcrum_bk">
    <ul>
      <li><a href="<?php echo config_item('base_url')?>">Home</a></li>
      <li>Account Payment</li>
    </ul>
    </div>
    <div class="clear"></div>
  </div>
  <h1 class="account_heading">Welcome To Your Account</h1>
  <br>
  <br>
  <div class="tabs_area">
    <ul>
      <?php echo user_account_menu(); ?>
    </ul>
  </div>
  <div class="clear"></div>
  <div class="tabs_ctarea">
    <h2 class="sbtabs_heading">Account Payment</h2>
    <div class="tabsv_contents"> Save your card info for order payment<br>
      <?php echo $sbquerys; ?>
      <br>
      <div class="accountButton"><a href="#javascript;" onclick="showCardForm()" class="btnLinkStyle">Click Here</a></div>
      <br>
      <form name="paymentForm" method="post">
		<div class="card_form hide_block" id="cardForm">
        <div id="cardResponse" class="errorMsg"></div>
        <div class="label_rows"> <span>Credit Card Number</span> <span>
          <input type="text" class="cardField" name="creditcardno" value="<?php echo $row_cust->cc_number; ?>" required="required" id="creditcardno" />
          <br>
          <img src="<?php echo config_item('base_url'); ?>images/payment_cards.jpg" alt="" class="viewCard" /></span> </div>
        <div class="label_rows"> <span>Expiration</span> <span>
          <select name="expmonth" id="expmonth" class="monthField1">
            <?php
				$month='';
				$selected = ( !empty($row_cust->exp_month) ? $row_cust->exp_month : date('m') );
				for($m=1; $m<=12; $m++) {
				$mn = ( $m < 10 ? '0'.$m : $m );
				$month .= '<option value="'.$mn.'" '.selectedOption($selected,$m).'>'.$m.'</option>';
				}
				echo $month;
			?>
          </select>
          &nbsp;
          <select name="expyear" id="expyear" class="yearSt">
            <?php
				$year = date('Y');
				$year_option = '';
				$selected1 = ( !empty($row_cust->exp_year) ? $row_cust->exp_year : $year );
				
				for($y = $year; $y <= 2030; $y++) {
				$year_option .= '<option '.selectedOption($y,$selected1).'>'.$y.'</option>';	
				}
				echo $year_option;
			?>
          </select>
          </span> </div>
        <div class="label_rows"> <span>CVV Code</span> <span>
          <input type="text" name="cvvcode" required="required" value="<?php echo $row_cust->cvv_code; ?>" id="cvvcode" class="monthField" />
          </span> 
          </div>
          <div class="clear"></div><br>
          <div><input type="submit" name="btn_prefsubmit" value="Submit" class="accountBtn" /></div>
      </div>
	 </form>
      
      <div class="clear"></div>
    </div>
  </div>
  <?php echo signup_form(); 
	//$this->session->userdata('user');
	?> </div>
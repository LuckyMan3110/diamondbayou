<div>
  <div class="bread-crumb">
    <div class="breakcrum_bk">
    <ul>
      <li><a href="<?php echo config_item('base_url')?>">Home</a></li>
      <li>Return Order</li>
    </ul>
    </div>
    <div class="clear"></div>
  </div>
  <h1 class="account_heading">Welcome To Your Account</h1>
  <br>
  <div class="clear"></div>
  <div class="tabs_ctarea">
  <h2 class="sbtabs_heading">Order Returns</h2>
  <div class="tabsv_contents">
  	<div class="shiping_left">
    <?php echo $sbquery; ?>
        <form name="returnForm" method="post">
            <table class="order_info">
                <tr>
                  <td width="25%">Order ID</td>
                  <td><input type="text" name="fname" id="fname" readonly="readonly" value="<?php echo $row_ordt['orders_id']; ?>" /></td>
                </tr>
                
                <tr>
                  <td>Comments* </td>
                  <td><textarea name="tr_comments" id="tr_comments" required="required" class="commentsBox"></textarea>
                  <input type="hidden" name="txt_orderid" value="<?php echo $orderid; ?>" />
                  <b></b><br></td>
                </tr>
                <tr>
                  <td colspan="2"><div class="accountButton"><input type="submit" name="btn_prefsubmit" value="Submit" class="accountBtn" /></div></td>
                </tr>
                </table>
        </form>
    </div>
  </div>
   <br>
   
   <div class="clear"></div>
  </div>
  <div class="clear"></div>
  <?php echo signup_form(); 
  //$this->session->userdata('user');
  ?> </div>
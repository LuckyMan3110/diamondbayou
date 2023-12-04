<div>
  <div class="bread-crumb">
    <div class="breakcrum_bk">
    <ul>
      <li><a href="<?php echo config_item('base_url')?>">Home</a></li>
      <li>My Account</li>
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
  <h2 class="sbtabs_heading">Welcome To <?php echo SITES_NAME; ?> Order Returns</h2>
  <div class="tabsv_contents">
      <p>We want you to be happy with your Blue Nile experience and strive to make this as easy and convenient for you as possible. We gladly offer online returns on items shipped within 30 days and priced $500 and below.**</p>
    
    <b>*<?php echo SITES_NAME; ?> accepts merchandise returns via mail only.</b><br>
    
    <b>**Online Returns do not apply to the following items:</b><br><br>
    
    <ol>
	<li>International returns.</li>
    <li>Non-USD currencies.</li>
    <li>Item(s) shipped over 30 days ago.</li>
    <li>Individual purchases over $500.</li>
    <li>Exchanges, repairs, or resizing.</li>
    <li>Items that became damaged or defective after delivery.</li>
    <li>Engraved items (rings excluded).</li>
	</ol>
    <br>
    <p>For assistance with these items (e.g. items over $500, exchanges, repairs, resizes, or to report as damaged or defective) please contact a <?php echo SITES_NAME; ?> Consultant at <?php echo CONTACT_NO; ?>. For more details on why an item cannot be returned online, read our <a href="#">Return Policy</a>. Recent online returns are shown below. To check the status of returns set up by other methods, <a href="#">click here</a> to Check Return Status page.</p>
    <br>
    <div class="return_items">
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th scope="col">Sr #</th>
    <th scope="col">Order No.</th>
    <th scope="col">Return Date</th>
    <th scope="col">Comments</th>
    <th scope="col" class="setalign">Status</th>
  </tr>
  
    <?php
	$vorderList = '';
	$i=0;
	$s=1;
	 if(count($returnList) > 0) {
		 foreach($returnList as $roworder) {
			 $vorderList .= '<tr>
							<td>'.$s.'</td>
							<td>'.$roworder['oid'].'</td>
							<td>'.date('d-F-Y', strtotime($roworder['return_date'])).'</td>
							<td>'.$roworder['return_comments'].'</td>
							<td class="setalign">Processing</td>
						  </tr>';
		 $i++;
		 $s++;
		 }
	 } else {
		 $vorderList .= '<tr><td colspan="5"><strong>You currently have no item in process</strong></td></tr>';
	 }
	 echo $vorderList;
	?>
  
</table>
    
    </div>
  </div>
   <br>
   <h3>Returns Are Easy</h3><br>
   <div>Returns are simple with just 4 easy steps. If you are the original purchaser, select "return items". If you are the recipient, please select "return gift".</div><br>
   
   	<div class="seting_boxdt">
        <div class="left_return">
       <h4>new return</h4><br><br>   
        If you are the original cardholder or purchaser, start here to initiate a refund which will be credited back to your original payment method.
       <div class="btnstyles"><a href="<?php echo SITE_URL?>account/myaccount" class="btnLinkStyle">new return</a></div>
       </div>       
    </div>
   <div class="clear"></div>
  </div>
  <div class="clear"></div>
  <?php echo signup_form(); 
  //$this->session->userdata('user');
  ?> </div>
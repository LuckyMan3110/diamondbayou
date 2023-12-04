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
  <h2 class="sbtabs_heading">Orders</h2>
  <div class="tabsv_contents">
  Orders that are submitted after April 20, 2015 will be displayed. Order Detailed information can be viewed by clicking on following order number. If you have any question or inquiry plz contact via phone: <?php echo CONTACT_NO; ?> or by email : <a href="mailto:<?php echo SITE_EMAIL; ?>"><?php echo SITE_EMAIL; ?></a>
  </div>
   <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th scope="col">Sr #</th>
    <th scope="col">Order No.</th>
    <th scope="col">Order Date</th>
    <th scope="col">Delivery Date</th>
    <th scope="col" class="setalign">Action</th>
  </tr>
  
    <?php
	$vorderList = '';
	$i=0;
	$s=1;
	 if(count($orders_list) > 0) {
		 foreach($orders_list as $roworder) {
			 $vorderList .= '<tr>
							<td>'.$s.'</td>
							<td>'.$roworder['orders_id'].'</td>
							<td>'.date('d-F-Y', strtotime($roworder['orderdate'])).'</td>
							<td>'.date('d-F-Y', strtotime($roworder['deliverydate'])).'</td>
							<td class="setalign"><a href="'.SITE_URL.'account/managed_returns/'.$roworder['id'].'">Return</a> | <a href="'.SITE_URL.'account/order_detail/'.$roworder['id'].'">View Detail</a></td>
						  </tr>';
		 $i++;
		 $s++;
		 }
	 } else {
		 $vorderList .= '<tr><td colspan="5"><strong>There is currently no order history in your account</strong></td></tr>';
	 }
	 echo $vorderList;
	?>
  
</table>
  </div>
  <br>
  <?php echo signup_form(); 
  //$this->session->userdata('user');
  ?> </div>
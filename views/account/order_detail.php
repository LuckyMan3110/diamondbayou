<div>
  <div class="bread-crumb">
    <div class="breakcrum_bk">
    <ul>
      <li><a href="<?php echo config_item('base_url')?>">Home</a></li>
      <li>Order Detail</li>
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
  <h2 class="sbtabs_heading">Orders Detail</h2>
  <div class="tabsv_contents">
      
  <h4>Order Summary:</h4><br>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="19%">Order ID</td>
    <td width="81%"><?php echo $row_ordt['orders_id']; ?></td>
  </tr>
  <tr>
    <td>Order Date</td>
    <td><?php echo date('d-F-Y', strtotime($row_ordt['orderdate'])); ?></td>
  </tr>
  <tr>
    <td>Delivery Date</td>
    <td><?php echo date('d-F-Y', strtotime($row_ordt['deliverydate'])); ?></td>
  </tr>
  <tr>
    <td>Payment Method</td>
    <td><?php echo getPaymentMethod($row_ordt['paymentmethod']); ?></td>
  </tr>
  <?php
  
  $orderPirceListing = '';
  $orderamount = getSalesTaxAmount($row_ordt['totalprice'], $row_ordt['salestax_percent']);
  
  if( $row_ordt['processingfee'] > 0 ) {
      $orderPirceListing .= '<tr>
                <td>Processing Fee</td>
                <td>$'.$row_ordt['processingfee'].'</td>
            </tr>';
      $totalItemAmount = $row_ordt['totalprice'] - $row_ordt['processingfee'];
      $orderPirceListing .= '<tr>
                <td>Total Item Amount</td>
                <td>$'._nf($totalItemAmount,2).'</td>
            </tr>';
  }
  if( $row_ordt['salestax_percent'] > 0 ) {
      $orderPirceListing .= '<tr>
                <td>Sales Tax '.$row_ordt['salestax_percent'].'%</td>
                <td>$'.number_format($orderamount['taxamount'], 2).'</td>
            </tr>';
      $totalItemAmount = $row_ordt['totalprice'] - $row_ordt['processingfee'];
      $orderPirceListing .= '<tr>
                <td>Total Item Amount</td>
                <td>$'._nf($row_ordt['totalprice'],2).'</td>
            </tr>';
  }
  echo $orderPirceListing;
  
  $engCost = 30;
  $view_engraved = '';
  $netAmount = $row_ordt['totalprice'];
  
  	if( !empty($row_ordt['engraved_text']) ) {
		$view_engraved = '<tr>
							<td>Engraved Text</td>
							<td>'.$row_ordt['engraved_text'].'</td>
						  </tr>
						  <tr>
							<td>Engraved Cost:</td>
							<td>$'.$engCost.'</td>
						  </tr>';
	}
	echo $view_engraved;
  ?>
  <tr>
    <td>Total Order Amount:</td>
    <td>$<?php echo _nf($orderamount['total_amount'],2); ?></td>
  </tr>
  <!--<tr>
    <td>Total Wire Amount:</td>
    <td>$<?php
	$wireamount = wire_price( $row_ordt['totalprice'] );
	 echo _nf($wireamount,2); ?></td>
  </tr>-->
</table>
	<br><h4>Item Detail:</h4><br>
    <div>
    <?php echo $itemDetails; ?>
  </div>
   
  </div>
  <br>
  </div>
   <?php echo signup_form(); ?>
</div>
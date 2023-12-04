<!DOCTYPE html>
<html>
    <head>
        <title>Order Invoice Detail</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php echo ADMIN_LIB; ?>css/admin.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo ADMIN_LIB; ?>css/adminstyle.css" rel="stylesheet" type="text/css" />
        <script src="<?php echo ADMIN_LIB; ?>js/jquery-1.12.4.js" type="text/javascript"></script>
        <style>
            body, .contentpanel{background: #fff;}
            .contentpanel{padding: 10px 5px; margin: 0px;}
            .orderdt_block{width: 100%;}
            .orderdt_block h4{margin: 0px; padding: 0px;}
        </style>
    </head>
    <body onload="window.print()">
  <div class="contentpanel">
    <div class="orderdt_block"><h4>Order Invoice:</h4>
        <div>
            <b>Invoice Date: <?php echo date('d-F-Y'); ?></b>
        </div><br>
  	<form name="orderForm" method="post" action="">
        <table>
          <tr>
            <th width="19%">Order ID</th>
            <td width="81%"><?php echo $row_ordt['orders_id']; ?></td>
          </tr>
          <tr>
            <th>Order Date</th>
            <td><?php echo date('d-F-Y', strtotime($row_ordt['orderdate'])); ?></td>
          </tr>
          <tr>
            <th>Delivery Date</th>
            <td><?php echo date('d-F-Y', strtotime($row_ordt['deliverydate'])); ?></td>
          </tr>
          <tr>
            <th>Payment Method</th>
            <td><?php echo getPaymentMethod($row_ordt['paymentmethod']); ?></td>
          </tr>
          <tr>
            <th>Total Amount:</th>
            <td>$<?php echo _nf($row_ordt['totalprice'],2); ?></td>
          </tr>
          <tr>
            <th>Total Wire Amount:</th>
            <td>$<?php
            $wireamount = wire_price( $row_ordt['totalprice'] );
             echo _nf($wireamount,2); ?></td>
          </tr>
          <tr>
            <th>Order Status:</th>
            <td><?php echo getOrderStatus( $order_status ); ?></td>
          </tr>
          <tr>
            <th>Shipping Date:</th>
            <td><?php echo mdate('%m-%d-%Y', strtotime($shipeDate)); ?></td>
          </tr>
          <tr>
            <th>Payment Method:</th>
            <td><?php echo getPaymntMode($pmtmethod); ?></td>
          </tr>
          <tr>
            <th>Paid By:</th>
            <td><?php echo $paid_by; ?></td>
          </tr>
          <tr>
            <th>Check #:</th>
            <td><?php echo $check_numb; ?></td>
          </tr>
          <tr>
            <th>Payment Status:</th>
            <td><?php echo getPaymntStatus($payment_status); ?>
            </td>
          </tr>
        </table>
	</form>
	<br>
        <div class="items_detail"><h4>Item Detail:</h4></div>
        <div class="clear_both"></div>
        <br>
    <div>
    <?php echo $itemDetails; ?>
    <!-- End order detail -->
    <div class="clear"></div>
    <br>
        <div class="items_detail"><h4>Customer Detail:</h4><br></div>
        <div>
            <table>
          <tr>
            <th colspan="2">Shipping Detail:</th>
            <th colspan="2">Billing Detail:</th>
          </tr>
          <tr>
            <th width="15%">Full Name</th>
            <td width="35%"><?php echo $customer->fname.' '.$customer->lname; ?></td>
            <th width="15%">Full Name</th>
            <td width="35%"><?php echo $customer->billing_fname.' '.$customer->billing_lname; ?></td>
          </tr>
          <tr>
            <th>Email</th>
            <td><?php echo $customer->email; ?></td>
            <th>Email</th>
            <td><?php echo $customer->billing_email; ?></td>
          </tr>
          <tr>
            <th>Phone No.</th>
            <td><?php echo $customer->phone; ?></td>
            <th>Phone No.</th>
            <td><?php echo $customer->billing_phone; ?></td>
          </tr>
          <tr>
            <th>Full Address</th>
            <td><?php echo $customer->address.' '.$customer->address2; ?></td>
            <th>Full Address</th>
            <td><?php echo $customer->billing_adres1.' '.$customer->billing_adres2; ?></td>
          </tr>
          <tr>
            <th>City</th>
            <td><?php echo $customer->city; ?></td>
            <th>City</th>
            <td><?php echo $customer->billing_city; ?></td>
          </tr>
          <tr>
            <th>Postcode</th>
            <td><?php echo $customer->postcode; ?></td>
            <th>Postcode</th>
            <td><?php echo $customer->billing_postcode; ?></td>
          </tr>
          <tr>
            <th>Province / State</th>
            <td><?php echo $customer->province; ?></td>
            <th>Province / State</th>
            <td><?php echo $customer->billing_province; ?></td>
          </tr>
          <tr>
            <th>Country</th>
            <td><?php echo $customer->country; ?></td>
            <th>Country</th>
            <td><?php echo $customer->billing_country; ?></td>
          </tr>
        </table>
        </div>
    </div>
      
    </div>
  <!--\\\\\\\ inner end\\\\\\--> 
</div>
<!--\\\\\\\ wrapper end\\\\\\--> 
<!-- Modal -->
    </body>
</html>
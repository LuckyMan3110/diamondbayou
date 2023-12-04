<div class="inner">
<!--\\\\\\\ inner start \\\\\\-->
<div class="contentpanel">
    <!-- main menu start -->
        <div><?php echo admin_main_menu_list(); //// admin_mainmenu helper ?></div>
        <!-- main menu end -->
  <div class="pull-left breadcrumb_admin clear_both">
    <div class="pull-left page_title theme_color">
      <h1>Order Management</h1>
      <h2 class="">Order Detail</h2>
    </div>
    <div class="pull-right">
      <ol class="breadcrumb">
        <li><a href="<?php echo SITE_URL; ?>admin">Home</a></li>
        <li><a href="<?php echo SITE_URL; ?>admin/order">Website Fullfillments</a></li>
      </ol>
    </div>
  </div>
  <div class="orderdt_block">
    <h4>Order Summary:</h4>
    <br>
    <?php echo $mesage; ?>
    <table class="table">
      <tr>
        <th width="19%">Order ID</th>
        <td width="81%"><?php echo $row_ordt['id']; ?></td>
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
        <td>$
          <?php
    $wireamount = wire_price( $row_ordt['totalprice'] );
    echo _nf($wireamount,2); 
	$fullName = $customerDetail->billfname.' '.$customerDetail->billlname;
	?></td>
      </tr>
    </table>
    <br>
    <h4>Email Content:</h4>
    <br>
    <div>
      <form name="emailForm" method="post" action="<?php echo htmlspecialchars($actionURL); ?>">
        <table class="table">
          <tr>
            <th>Customer Name:</th>
            <td><input type="text" required="" value="<?php echo $fullName; ?>" name="cust_name" parsley-type="name" class="form-control parsley-validated" /></td>
          </tr>
          <tr>
            <th>Billing Country:</th>
            <td><input type="text" required="" value="<?php echo $customerDetail->billcountry; ?>" name="bill_country" parsley-type="country" class="form-control parsley-validated" /></td>
          </tr>
          <tr>
            <th>Billing Postcode:</th>
            <td><input type="text" required="" value="<?php echo $customerDetail->billpostcode; ?>" name="bill_postcode" parsley-type="country" class="form-control parsley-validated" /></td>
          </tr>
          <tr>
            <th>Email Address:</th>
            <td><input type="email" required="" value="<?php echo $customerDetail->email; ?>" name="email_adres" parsley-type="email" class="form-control parsley-validated" id="inputEmail3" /></td>
          </tr>
          <tr>
            <th>From Email:</th>
            <td><input type="text" required="" value="<?php echo SITE_EMAIL; ?>" name="from_email" parsley-type="email" class="form-control parsley-validated" id="inputEmail3" /></td>
          </tr>
          <tr>
            <th>Subject:</th>
             <td><input type="text" value="Order Email" name="email_subject" parsley-type="country" class="form-control parsley-validated" /></td>
          </tr>
          <tr>
            <th>Message:</th>
            <td><textarea class="form-control ckeditor" name="email_mesage" id="email_mesage" rows="6"><?php echo $content;?></textarea></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><button type="submit" class="btn btn-primary">Sent Email</button>
              &nbsp;
              <button class="btn btn-default">Cancel</button></td>
          </tr>
        </table>
      </form>
      
      <!-- End order detail -->
      <div class="clear"></div>
    </div>
  </div>
  <!--\\\\\\\ inner end\\\\\\--> 
</div>
<!--\\\\\\\ wrapper end\\\\\\--> 
<!-- Modal -->
<?php echo popupsOtherBlockData(); ?> 
<script type="text/javascript" src="<?php echo ADMIN_LIB; ?>plugins/ckeditor/ckeditor.js"></script> 
<style>
    table {
        background-color: #eee;
        padding:10px;
    }
</style>
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
    <div class="orderdt_block"><h4>Order Summary:</h4><br>
  	<form name="orderForm" method="post" action="">
        <table class="table" style="width:60%;">
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
            <td><select name="order_status" class="form-control"><?php echo $order_status; ?></select>
            </td>
          </tr>
          <tr>
            <th>Shipping Date:</th>
            <td><input type="text" class="form-control" value="<?php echo mdate('%m-%d-%Y', strtotime($shipeDate)); ?>" name="ship_date" />&nbsp;&nbsp;<span>(Date Formate: MM-DD-YYY)</span></td>
          </tr>
          <tr>
            <th>Payment Method:</th>
            <td><select name="payment_method" class="form-control"><?php echo $pmtmethod; ?></select></td>
          </tr>
          <tr>
            <th>Paid By:</th>
            <td><input type="text" class="form-control" value="<?php echo $paid_by; ?>" name="paid_by" /></td>
          </tr>
          <tr>
            <th>Check #:</th>
            <td><input type="text" class="form-control" value="<?php echo $check_numb; ?>" name="check_numb" /></td>
          </tr>
          <tr>
            <th>Payment Status:</th>
            <td><select name="payment_status" class="form-control"><?php echo $payment_status; ?></select>&nbsp;&nbsp;&nbsp;&nbsp;
            <br>
          <button name="back" id="back" type="button" class="btn btn-primary" onclick="history.go(-1);">Back</button>
          <input type="submit" name="submit" id="edit" value="Update Order Detail" class="btn btn-primary">
            </td>
          </tr>
        </table>
	</form>
	<br>
        <div class="items_detail"><h4>Item Detail:</h4></div>
        <div class="linksblock">
            <a href="#javascript" data-toggle="modal" data-target="#customerinfo_block">Customer Details</a>
            <a href="<?php echo SITE_URL.'adminjewelry/order_invoice_detail/'.$row_ordt['id']; ?>" target="_blank">Invoice Details</a>
        </div>
        <div class="clear_both"></div>
        <br>
    <div>
    <?php echo $itemDetails; ?>
    <!-- End order detail -->
    <div class="clear"></div>
    
  </div></div>
  <!--\\\\\\\ inner end\\\\\\--> 
</div>
<!--\\\\\\\ wrapper end\\\\\\--> 
<!-- Modal -->
<?php echo popupsOtherBlockData(); ?>
<div class="modal fade" id="customerinfo_block" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<form name="taskForm" id="taskForm" method="post">
      <div class="modal-dialog">
        <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Customer Details</h4>
              </div>
              <div class="modal-body">
                  <div class="detailBlock">
                      <div class="detailHeading">Shipping Detail</div>
                    <div>
                      <div class="labelfield_cols">Full Name:</div>
                      <div class="valfield_cols"><?php echo $customer->fname.' '.$customer->lname; ?></div>
                      <div class="clear_both"></div>
                    </div>
                    <div>
                      <div class="labelfield_cols">Email:</div>
                      <div class="valfield_cols"><?php echo $customer->email; ?></div>
                      <div class="clear_both"></div>
                    </div>
                    <div>
                      <div class="labelfield_cols">Phone No.:</div>
                      <div class="valfield_cols"><?php echo $customer->phone; ?></div>
                      <div class="clear_both"></div>
                    </div>
                    <div>
                      <div class="labelfield_cols">Full Address:</div>
                      <div class="valfield_cols"><?php echo $customer->address.' '.$customer->address2; ?></div>
                      <div class="clear_both"></div>
                    </div>
                    <div>
                      <div class="labelfield_cols">City:</div>
                      <div class="valfield_cols"><?php echo $customer->city; ?></div>
                      <div class="clear_both"></div>
                    </div>
                    <div>
                      <div class="labelfield_cols">Postcode:</div>
                      <div class="valfield_cols"><?php echo $customer->postcode; ?></div>
                      <div class="clear_both"></div>
                    </div>
                    <div>
                      <div class="labelfield_cols">Province / State:</div>
                      <div class="valfield_cols"><?php echo $customer->province; ?></div>
                      <div class="clear_both"></div>
                    </div>
                    <div>
                      <div class="labelfield_cols">Country:</div>
                      <div class="valfield_cols"><?php echo $customer->country; ?></div>
                      <div class="clear_both"></div>
                    </div>
                  </div>
                  <div class="detailBlock">
                      <div class="detailHeading">Billing Detail</div>
                    <div>
                      <div class="labelfield_cols">Full Name:</div>
                      <div class="valfield_cols"><?php echo $customer->billing_fname.' '.$customer->billing_lname; ?></div>
                      <div class="clear_both"></div>
                    </div>
                    <div>
                      <div class="labelfield_cols">Email:</div>
                      <div class="valfield_cols"><?php echo $customer->billing_email; ?></div>
                      <div class="clear_both"></div>
                    </div>
                    <div>
                      <div class="labelfield_cols">Phone No.:</div>
                      <div class="valfield_cols"><?php echo $customer->billing_phone; ?></div>
                      <div class="clear_both"></div>
                    </div>
                    <div>
                      <div class="labelfield_cols">Full Address:</div>
                      <div class="valfield_cols"><?php echo $customer->billing_adres1.' '.$customer->billing_adres2; ?></div>
                      <div class="clear_both"></div>
                    </div>
                    <div>
                      <div class="labelfield_cols">City:</div>
                      <div class="valfield_cols"><?php echo $customer->billing_city; ?></div>
                      <div class="clear_both"></div>
                    </div>
                    <div>
                      <div class="labelfield_cols">Postcode:</div>
                      <div class="valfield_cols"><?php echo $customer->billing_postcode; ?></div>
                      <div class="clear_both"></div>
                    </div>
                    <div>
                      <div class="labelfield_cols">Province / State:</div>
                      <div class="valfield_cols"><?php echo $customer->billing_province; ?></div>
                      <div class="clear_both"></div>
                    </div>
                    <div>
                      <div class="labelfield_cols">Country:</div>
                      <div class="valfield_cols"><?php echo $customer->billing_country; ?></div>
                      <div class="clear_both"></div>
                    </div>
                  </div>
                  <div class="clear_both"></div>
              </div>
<!--              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="saveTaskDetail()">Save changes</button>
              </div>-->
        </div>
      </div>
</form>
</div>
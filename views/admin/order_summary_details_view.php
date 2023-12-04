<div class="inner"> 
  <div class="contentpanel">
      
      <div><?php echo admin_main_menu_list(); //// admin_mainmenu helper ?></div>
      
  <div class="pull-left breadcrumb_admin clear_both">
    <div class="pull-left page_title theme_color">
      <h1>Sales Report</h1>
      <h2 class="">Order Summary Report</h2>
    </div>
    <div class="pull-right">
      <ol class="breadcrumb">
        <li><a href="<?php echo SITE_URL; ?>admin">Home</a></li>
        <li>Order Summary Report</li>
      </ol>
    </div>
  </div>
   <div class="orderdt_block">
   <h4>Sales Report</h4>
      <table class="table order_info">
            <tr>
                <td width="25%"><b>Total Orders</b></td>
              <td><?php echo $order_details['total_orders']; ?></td>
            </tr>
            <tr>
                <td width="25%"><b>Total Sales Amount</b></td>
               <td>$ <?php echo _nf($order_details['total_price'], 2); ?></td>
            </tr>
            <tr>
                <td width="25%"><b>Total Sales Tax Amounts</b></td>
               <td>0</td>
            </tr>
            <tr>
                <td width="25%"><b>Total Cost</b></td>
                <td>$ <?php echo _nf($order_details['total_price'], 2); ?></td>
            </tr>
            <tr>
                <td width="25%"><b>Total Profit</b></td>
              <td>0</td>
            </tr>
            </table>
            <br>
            <div class="order_list_view">
                <div class="set_page_heading">Order Listings</div>
                <form name="order_filter_form" method="post" action="">
                    <div class="search_filter_row">
                        <span>Search Order Via Date: </span>
                        <span>From: <input type="text" name="date_from" required="" value="<?php echo $date_from; ?>" placeholder="YYYY-MM-DD" /></span>
                        <span>To: <input type="text" name="date_to" required="" value="<?php echo $date_to; ?>" placeholder="YYYY-MM-DD" /></span>
                        <span>
                            <input type="submit" name="btn_submit" value="Search Order" class="btn btn-primary">
                        </span>
                    </div>
                </form>
                <table class="table order_list_table">
                    <tr>
                        <th>Sr#</th>
                        <th>Order ID</th>
                        <th>Shipping Method</th>
                        <th>Order Date</th>
                        <th>Total Order Price</th>
                        <th>Action</th>
                    </tr>
                    <?php echo $order_list_rows; ?>
                </table>
            </div>
    </div>    
  </div>
  <!--\\\\\\\ inner end\\\\\\--> 
</div>
<!--\\\\\\\ wrapper end\\\\\\--> 
<?php echo popupsOtherBlockData(); ?>
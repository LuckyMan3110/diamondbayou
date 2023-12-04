<?php echo featured_inlinks(); ?>
<!-- start body content -->
<br><br>
<div class="body_content">
	<div class="leftmenu_bk">
		<?php echo wholeSalerLeftMenu(); ?>
	</div>
	<div class="rightmenu_bk">
		<h2>My Account > <span class="setSubLabel">Invoices</span></h2><br>
		<div class="paymentblock">
			<table class="payment_table">
				<tr>
					<td colspan="7">
						<form name="orderForm" method="post" action="">
							<div class="inputFields setfieldalign">
								<span>Date From <input type="text" name="date_from" readonly="readonly" id="dateFrom" value="<?php echo $date_from; ?>" class="setdate_field" />&nbsp;
								<img id="calendar_icon" src="<?php echo WHSITE_IMGURL; ?>calender_vew.jpg" alt="" /></span>
								<span>&nbsp;&nbsp;Date To <input type="text" name="date_to" id="dateto" readonly="readonly" value="<?php echo $date_to; ?>" class="setdate_field" />&nbsp;
								<img src="<?php echo WHSITE_IMGURL; ?>calender_vew.jpg" id="calendar_icon1" alt="" /></span>&nbsp;&nbsp;
								<span> <input type="submit" value="List" class="search_btnst" name="search_btn" /></span>
							</div>
						</form>
					</td>
				</tr>
				<tr>
					<td>Transaction<br> Date</td>
					<td>Record #</td>
					<td>PO #</td>
					<td>Terms</td>
					<td>Due Date</td>
					<td>Total Amount</td>
					<td>Amount Due</td>
				</tr>
				<?php echo $viewInvoiceLIst; ?>             
			</table>
		</div>
	</div>
	<div class="clear"></div>
</div>
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>css/dhtmlxcalendar.css"/>
<script src="<?php echo SITE_URL; ?>js/dhtmlxcalendar.js"></script>
<script>
var myCalendar;
$(document).ready(function() {
	myCalendar = new dhtmlXCalendarObject({button: "calendar_icon"});
	myCalendar.attachEvent("onClick", function(){
		document.getElementById("dateFrom").value = myCalendar.getFormatedDate();
	});
	var myCalender1;
	myCalender1 = new dhtmlXCalendarObject({button: "calendar_icon1"});
	myCalender1.attachEvent("onClick", function(){
		document.getElementById("dateto").value = myCalender1.getFormatedDate();
	});
});
</script>
<!-- end body content -->
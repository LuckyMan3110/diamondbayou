<?php echo featured_inlinks(); ?>
<!-- start body content -->
<br><br>
<div class="body_content">
	<div class="leftmenu_bk">
		<?php echo wholeSalerLeftMenu(); ?>
	</div>
	<div class="rightmenu_bk">
		<h2>My Account > <span class="setSubLabel">Orders</span></h2><br>
		<div class="paymentblock">
			<table class="payment_table">
				<tr>
					<td colspan="8">
						<form name="orderForm" method="post" action="">
							<div class="inputFields">
								<span>Date From <input type="text" name="date_from" readonly="readonly" id="dateFrom" value="<?php echo $date_from; ?>" class="setdate_field" />&nbsp;
								<img id="calendar_icon" src="<?php echo WHSITE_IMGURL; ?>calender_vew.jpg" alt="" /></span>
								<span>&nbsp;&nbsp;Date To <input type="text" name="date_to" id="dateto" readonly="readonly" value="<?php echo $date_to; ?>" class="setdate_field" />&nbsp;
								<img src="<?php echo WHSITE_IMGURL; ?>calender_vew.jpg" id="calendar_icon1" alt="" /></span>
								<span>&nbsp;&nbsp;PO #: <input type="text" class="checkno_field" value="<?php echo $ponumb_field; ?>" name="ponumb_field" /></span>&nbsp;
								<span> <input type="submit" value="Search" class="search_btnst" name="search_btn" /></span>
							</div>
						</form>
					</td>
				</tr>
				<tr>
					<td>Order Date</td>
					<td>Order#</td>
					<td>PO #</td>
					<td>Invoice#</td>
					<td>Order Total</td>
					<td>Status</td>
					<td>Ship Date</td>
				</tr>
				<?php echo $viewOrderList; ?>
			</table>
			<br><br>
			<div class="notesLable">
				<div>*Estimated Order Total</div>
				<div>**Estimated shipping date</div>
			</div>
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
	myCalender1 = new dhtmlXCalendarObject({ button: "calendar_icon1" });
	myCalender1.attachEvent("onClick", function(){
		document.getElementById("dateto").value = myCalender1.getFormatedDate();
	});
});
</script>
<!-- end body content -->
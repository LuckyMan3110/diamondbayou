<?php
function wholeSalerLeftMenu() {
	$viewMenu = '<ul>
		<li>Menu</li>
		<li class="activeMenu"><a href="'.SITE_URL.'Affiliate/account_information">Account Information</a></li>
		<li><a href="'.SITE_URL.'Affiliate/shopping_cart">Shopping Cart</a></li>
		<li><a href="'.SITE_URL.'Affiliate/custom_design">Custom Design Request <span>New</span></a></li>
		<li><a href="'.SITE_URL.'Affiliate/wh_orders">Orders</a></li>
		<li><a href="'.SITE_URL.'Affiliate/wh_invoices">Invoices</a></li>
		<li><a href="'.SITE_URL.'Affiliate/wh_payments">Payments</a></li>
		<li><a href="'.SITE_URL.'Affiliate/virtual_webstore">My Virtual Webstore</a></li>
		<li><a href="'.SITE_URL.'Affiliate/change_password">Change Password</a></li>
		<li><a href="'.SITE_URL.'Affiliate/logout">Logout</a></li>            
	</ul>';
	return $viewMenu;
}
?>
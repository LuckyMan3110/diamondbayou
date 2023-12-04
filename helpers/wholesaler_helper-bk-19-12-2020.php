<?php

	function wholeSalerLeftMenu() 
	{
		$viewMenu = '<ul>
        	<li>Menu</li>
            <li class="activeMenu"><a href="'.SITE_URL.'wholesale/account_information">Account Information</a></li>
            <li><a href="'.SITE_URL.'wholesale/shopping_cart">Shopping Cart</a></li>
            <li><a href="'.SITE_URL.'wholesale/custom_design">Custom Design Request <span>New</span></a></li>
            <li><a href="'.SITE_URL.'wholesale/wh_orders">Orders</a></li>
            <li><a href="'.SITE_URL.'wholesale/wh_invoices">Invoices</a></li>
            <li><a href="'.SITE_URL.'wholesale/wh_payments">Payments</a></li>
            <li><a href="'.SITE_URL.'wholesale/virtual_webstore">My Virtual Webstore</a></li>
            <li><a href="'.SITE_URL.'wholesale/change_password">Change Password</a></li>
            <li><a href="'.SITE_URL.'wholesale/logout">Logout</a></li>            
        </ul>';
		
		return $viewMenu;
	}


?>
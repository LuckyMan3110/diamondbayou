<?php

function admin_main_menu_list() {
    return '';
    
    $menu_list = '<div id="ddtopmenubar" class="admin_container">
          <div id="ddtopmenubar" class="mattblackmenu">
            <ul>
              <li><a href="'.SITE_URL.'admin">Home</a></li>
              <li><a href="#" rel="site_management">Site Management <span class="glyphicon glyphicon-chevron-down"></span></a></li>
              <li><a href="#" rel="master_management">Master Management <span class="glyphicon glyphicon-chevron-down"></span></a></li>
              <li><a href="#" rel="stuller_bands">Stuller Bands <span class="glyphicon glyphicon-chevron-down"></span></a></li>
              <li><a href="#" rel="modules_section">Market Place Batch <span class="glyphicon glyphicon-chevron-down"></span></a></li>
              <li><a href="#" rel="ecommerce_section">E - Commerce <span class="glyphicon glyphicon-chevron-down"></span></a></li>
              <li><a href="#" rel="order_section">Orders <span class="glyphicon glyphicon-chevron-down"></span></a></li>
              <li><a href="#" rel="ezpay_configuration">EZ Pay Configuration <span class="glyphicon glyphicon-chevron-down"></span></a></li>
              <li><a href="#" rel="inventory_management">Inventory $ Management <span class="glyphicon glyphicon-chevron-down"></span></a></li>
              <li><a href="#" rel="market_places">Market Places <span class="glyphicon glyphicon-chevron-down"></span></a></li>
              <li><a href="'.SITE_URL.'admin/profile_mgmt">Profile</a></li>
              <li><a href="'.SITE_URL.'admin_order_summary/order_summary_details">Sales Report</a></li>
              <li><a href="'.SITE_URL.'home_page_mgmt/manage_home_page">Manage Home Page</a></li>
              <li><a href="'.SITE_URL.'admin/customers">Users</a></li>
              <li><a href="'.SITE_URL.'admin/logout">Logout</a></li>
            </ul>
          </div>
        </div>';
    
    $menu_list .= '<script type="text/javascript">
                    ddlevelsmenu.setup("ddtopmenubar", "topbar");
                </script>';
    
    $menu_list .= '<ul id="site_management" class="ddsubmenustyle">
            <li><a href="'.SITE_URL.'admin/commonpagetemplate">Pages Manager</a></li>
            <li> <a href="'.SITE_URL.'admin/manage_comments">Comments Manager</a></li>
            <li> <a href="'.SITE_URL.'admin/emails_subscriber">Email Subscriber</a></li>
            <li> <a href="'.SITE_URL.'admin/customs_design">Custom Design</a></li>
        </ul>
        <ul id="master_management" class="ddsubmenustyle">
          <li> <a href="'.SITE_URL.'admin/rolex">Watches Mgmt.</a> </li>
              <li> <a href="'.SITE_URL.'admin/brands">Manage Brands</a> </li>
              <li> <a href="'.SITE_URL.'admin/jewelries">3D Jewelry</a> </li>
              <li> <a href="'.SITE_URL.'admin/jewelries_manager">Manage Jewelercart ™</a> </li>
        </ul>
        <ul id="stuller_bands" class="ddsubmenustyle">
          <li><a href="'.SITE_URL.'admin/diamond_stuller_earing/wedding_bands_diamond">Diamond Wedding Bands</a> </li>
              <li> <a href="'.SITE_URL.'admin/diamond_stuller_earing/wedding_bands_ladies">Ladies Wedding Bands</a> </li>
              <li> <a href="'.SITE_URL.'admin/diamond_stuller_earing/wedding_bands_platinum">Wedding Bands</a> </li>
              <li> <a href="'.SITE_URL.'admin/diamond_stuller_earing/wb_mens">Men\'s Wedding Bands</a> </li>
              <li> <a href="'.SITE_URL.'admin/diamond_stuller_earing/wb_studs">Diamond Stud Earrings</a> </li>
              <li> <a href="'.SITE_URL.'admin/diamond_stuller_earing/wb_hoops">Diamond Hoops</a> </li>
              <li> <a href="'.SITE_URL.'admin/diamond_stuller_earing/gemstone">Gemstone Earrings</a> </li>
            <li><a href="'.SITE_URL.'admin/diamond_stud_earing">Diamond Stud Audit</a> </li>
        </ul>
        <ul id="modules_section" class="ddsubmenustyle">
          <li> <a href="'.SITE_URL.'admin_listings/heart_collection_items">Marketplace Jewelry</a> </li>
	      <li> <a href="'.SITE_URL.'admin/rapnetDiamondsSearch">Marketplace Diamonds</a> </li>
              <li> <a href="'.SITE_URL.'admin/diamondshapes">Diamond Shapes</a> </li>
	      <li> <a href="'.SITE_URL.'admin/cert">Diamond Cert</a> </li>
        </ul>
        <ul id="ecommerce_section" class="ddsubmenustyle">
              <li> <a href="'.SITE_URL.'admin/ideximport">Upload Diamonds</a> </li>
              <li> <a href="'.SITE_URL.'admin/customers">Manage Customers</a> </li>
              <li> <a href="'.SITE_URL.'admin/testimonial">Testimonials</a> </li>
              <li> <a href="'.SITE_URL.'admin/coupon">Coupon Manager</a> </li>
              <li> <a href="'.SITE_URL.'admin/feedbacks">Feedback Manager</a> </li>
        </ul>
        <ul id="order_section" class="ddsubmenustyle">
          <li> <a href="'.SITE_URL.'admin/order">Website Fullfillments</a> </li>
        </ul>
        <ul id="ezpay_configuration" class="ddsubmenustyle">
          <li> <a href="'.SITE_URL.'admin/ezpay">Ezpay Configuration</a> </li>
              <li> <a href="'.SITE_URL.'admin/catamanager">Category Manager</a> </li>
              <li> <a href="'.SITE_URL.'admin/catamanager">Price Manager</a> </li>
        </ul>
        <ul id="inventory_management" class="ddsubmenustyle">
            <li> <a href="'.SITE_URL.'admin/inventory_mgnt">Unique Settings</a> </li>
            <li> <a href="'.SITE_URL.'admin/inventory_mgnt">Stuller</a> </li>
            <li> <a href="'.SITE_URL.'admin/inventory_mgnt">Quality Gold</a> </li>
            <li> <a href="'.SITE_URL.'admin/helixprice">Rapnet</a> </li>
            <li> <a href="'.SITE_URL.'admin/jewelries_manager">Jeweler Cart</a> </li>
        </ul>
        <ul id="email_section" class="ddsubmenustyle">
          <li> <a href="'.SITE_URL.'admin/inbox"">Inbox</a> </li>
          <li> <a href="'.SITE_URL.'admin/compose"">Compose</a> </li>
        </ul>
        <ul id="market_places" class="ddsubmenustyle">
          <li> <a href="'.SITE_URL.'admin/loosediamonds">Market Filter</a> </li>              
          <li> <a href="'.SITE_URL.'admin_listings/heart_collection_items#marketplace">eBay Jewelry</a> </li>              
              <li> <a href="'.SITE_URL.'admin/rapnetDiamondsSearch#marketplace">eBay Diamonds</a> </li>
              <li> <a href="'.SITE_URL.'admin/#">Watches</a> </li>
              <li><b>1. Diamonds</b></li>  
              <li> <a href="'.SITE_URL.'admin/cert#marketplace">Diamond Certificates</a> </li>              
              <li> <a href="'.SITE_URL.'admin/diamondshapes#marketplace">Solitaire Image Uploader</a> </li>
              <li> <a href="'.SITE_URL.'admin/admin/loosediamondshapes#marketplace">Diamond Shape Image Upload</a> </li>
              <li> <a href="'.SITE_URL.'admin/admin//owners#marketplace">Rapnet Companies</a> </li>
              <li> <a href="'.SITE_URL.'admin/loosediamonds#marketplace">Bulk Upload Diamonds</a> </li>
              <li> <a href="'.SITE_URL.'admin/rapnetDiamondsSearch#marketplace">Single Diamond Upload</a> </li>
              <li> <a href="'.SITE_URL.'admin/helixpriceQuality#marketplace">Diamond Price Manager</a> </li>
              <li> <a href="'.SITE_URL.'admin/rappent_logins_mgmt#marketplace">Rapnet Logins</a> </li>
              <li><b>2. Watches</b></li>
              <li> <a href="'.SITE_URL.'admin/rolex#marketplace">Watches Mgmt.</a> </li>
              <li> <a href="'.SITE_URL.'admin/brands#marketplace">Manage Brands</a> </li>
              <li> <a href="'.SITE_URL.'admin/inventory#marketplace">Watches Bulk Upload</a> </li>
              <li><b>3. Jewelry</b></li>
              <li> <a href="'.SITE_URL.'admin/jewelries_manager#marketplace">Jewelry Mgmt.</a> </li>
              <li> <a href="'.SITE_URL.'admin/jewelries_manager/add#marketplace">Jewelry Upload</a> </li>
              <li> <a href="'.SITE_URL.'admin/rapnetcomdiamonds#marketplace">Bulk Jewelry Export</a> </li>
              <li> <a href="'.SITE_URL.'admin/helixpriceJwelery#marketplace">Bulk Jewelry Price</a> </li>
              <li> <a href="'.SITE_URL.'admin/jewelriesinventory#marketplace">Bulk Jewelry Import</a> </li>
              <li><b>4. Orders</b></li>
              <li> <a href="'.SITE_URL.'admin/orders#marketplace">Amazon Fullfillments</a> </li>
              <li> <a href="'.SITE_URL.'admin/canadaorders#marketplace">Canada Fullfillments</a> </li>
              <li> <a href="'.SITE_URL.'admin/ebayorders#marketplace">eBay Fullfillments</a> </li>
              <li><b>5.Market Place Login</b></li>
              <li>
              <a href="https://sellercentral.amazon.com/gp/ezdpc-gui/inventory-status/status.html/ref=ag_invmgr_dnav_xx_" target="_blank">Manage Inventory</a>
              </li>
              <li> <a href="'.SITE_URL.'admin/contentpage/ebaylogin#marketplace">Ebay Login</a></li>      
              <li> <a href="'.SITE_URL.'admin/contentpage/amazonlogin#marketplace">Amazon Login</a></li>   
              <li> <a href="'.SITE_URL.'admin/contentpage/sears#marketplace">Sears</a> </li>
        </ul>';
    
    return $menu_list;
    
}

/*
Market Place Batch:
<li> <a href="'.SITE_URL.'admin/helixpriceQuality">Helix Price Manager</a> </li>
              <li> <a href="'.SITE_URL.'admin/stuller">Stuller Manager</a> </li>
              <li> <a href="'.SITE_URL.'admin/qualitygold">Q &amp; G Manager</a> </li>
              <li> <a href="'.SITE_URL.'admin/uniquesettings">Unique Settings</a> </li>
              
              
Ecommerce:
              <li> <a href="'.SITE_URL.'admin/povadajewelries">Povada Jewelry</a> </li>   
              
       ddtopmenubar:       
              <li><a href="#" rel="email_section">Email</a></li>
               <li><a href="#">Notifications</a></li>
              */
<div>
  <div class="bread-crumb">
    <div class="breakcrum_bk">
    <ul>
      <li><a href="<?php echo config_item('base_url')?>">Home</a></li>
      <li>Wishlist</li>
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
  <h2 class="sbtabs_heading">Wishlist</h2>
  <?php echo $rtMesage; ?>
  <div class="tabsv_contents">
 At Yadegardiamonds, you can create a Wish List to save your favorite items in one convenient place. You can also purhcase a item(s) from your wishlist to give gifts to your friends and family. </div>
 <br>
 <?php echo $vwishList; ?>
 <br />
   
  </div>
  <?php echo signup_form(); 
  //$this->session->userdata('user');
  ?> </div>
<div>
  <div class="bread-crumb">
    <div class="breakcrum_bk">
    <ul>
      <li><a href="<?php echo config_item('base_url')?>">Home</a></li>
      <li>Diamonds Comparison</li>
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
  <h2 class="sbtabs_heading">Diamonds Comparison</h2>
  <div class="tabsv_contents">
  Currently, there are no diamond to compare. To compare a diamond, conduct a <a href="<?php echo config_item('base_url')?>diamonds/search/true/B" class="daimdSearch">diamond search</a>, select diamond and then click on compare.
  </div>
  <br>
   <table class="diamCompare">
    <tr>
        <th width="8%"><a href="">Type</a></th>
        <th width="11%"><a href="">Shape</a></th>
        <th width="9%"><a href="">Carat</a></th>
        <th width="9%"><a href="">Color</a></th>
        <th width="10%"><a href="">Clarity</a></th>
        <th width="8%"><a href="">Lab</a></th>
        <th width="11%"><a href="">Cut</a></th>
        <th width="12%"><a href="">Price</a></th>
        <th width="13%"><a href="">Wire</a></th>
        <th width="9%"><a href="">Details</a></th>
    </tr>
     	<?php echo $compares_list; ?>  
	</table>
  </div>
  <?php echo signup_form(); 
  //$this->session->userdata('user');
  ?> </div>
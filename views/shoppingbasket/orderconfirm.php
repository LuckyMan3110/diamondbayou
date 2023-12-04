<style type="text/css">
.oldcontainer{
margin-left:100px;
margin-right:0px;
}
</style>
<?php 
	 $this->load->helper('t');
	$loosdiamondhtml = '';
	$ringhtml = '';
	$threestonehtml = '';
	$earringhtml = '';
	$diamondstudhtml = '';
	$pendenthtml = '';
	$threestonependanthtml = '';
	$subtotal = 0;
	//var_dump($myallitems); 
	$shippingArray = $this->shoppingbasketmodel->getShippinginfo($orderid, $customerid);
	//print_r($shippingArray);
	
?> 
 

<article class="container_12">
<div class="oldcontainer" style="margin:0 auto; width:970px;">
<form method="POST" action="<?php echo config_item('base_url');?>shoppingbasket/billingandshipping">
<div class="floatl pad05 body">
  <div class="bodytop"></div>
  		<div class="pad10">
  		
  			<div style="text-align: center; font-size: 19px; width: 100%;">Order Confirmed .</div> <br>
  			<div style="text-align: center; font-size: 11px; width: 100%;"><a href="/">Go back to Shopping ..</a></div>

			
		</div>
  
 <div class="bodybottom"></div>
</div>

</form>
</div><div class="clearfix"></div>
</article>

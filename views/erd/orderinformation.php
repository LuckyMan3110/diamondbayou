<style type="text/css">
.oldcontainer {
    margin-left: 1px !important;
    margin-right: 1px !important;
}

</style>
<?php $this->load->helper('form');  ?>
<?php include_once("erd/header.php"); ?>
<article class="container_12">
<div class="oldcontainer">
<div class="floatl pad05 body">
  <div class="bodytop"></div>
  <div class="bodymid2">
  
  <!--<form method="POST" action="<?php echo config_item('base_url')?>shoppingbasket/billingandshipping" id="frmcontinue">-->
  <?php echo form_open(config_item('base_url').'shoppingbasket/orderinformation')?>
  
		  		<div class="pad10">
				  	
		  		
		  			<div class="floatl divheader">Order Information</div> 
					<div class="dbr clear"></div>
					
					<div style="background-color:#000000;" class="commonheader">Enter Personal Information</div>
					<div class="dbr"></div>
					
					<input type="hidden" name="totalprice" id="totalprice" value="<?php echo $totalprice;?>">
					
					<center>
						<table width="400" cellpadding="4" cellspacing="4">
								<tr>
									<td width="100"  valign="top">First Name:</td>
									<td width="300"> <input type="text" name="fname" value="<?php echo $fname;?>"><span class="required">*</span><?php echo form_error('fname');?></td>
								</tr>
								<tr>
									<td valign="top">Last Name:</td>
									<td> <input type="text" name="lname" value="<?php echo $lname;?>"><span class="required">*</span><?php echo form_error('lname');?></td>
								</tr>
								<tr>
									<td valign="top">E-mail: </td>
									<td>
											<input type="text" name="email" value="<?php echo $email;?>"><span class="required">*</span><?php echo form_error('email');?><b></b><br>
											<small><i>enter an address where we can send you an e-mail confirming your order</small></i> 
									</td>
								</tr>
								<tr>
									<td>Retype E-mail: </td>
									<td><input type="text" name="reemail"><span style="color:#000000">
									*</span></td>
								</tr>
								<tr>
									<td valign="top" >Phone: </td>
									<td valign=""><input type="text" name="phone" value="<?php echo $phone;?>"><span class="required">*</span><?php echo form_error('phone');?><br>
											<small><i>ennter a phone number where we can contact you if neccesary</small></i> 
									</td>
								</tr>

                                
                                <tr>
                                    <td valign="top" rowspan="2">Address:</td>
                                    <td><input type="text" name="address2"><span style="color:#000000">
									*</span></td>
                              </tr>
                              <tr>
  	                              <td><input type="text" name="address1"><span style="color:#000000">
									*</span></td>
                              </tr>
                                <tr>
                                    <td valign="top" rowspan="">City:</td>
                                    <td><input type="text" name="city"><span style="color:#000000">
									*</span></td>
                              </tr>
                                <tr>
                                    <td valign="top" rowspan="">State:</td>
                                    <td><input type="text" name="state"><span style="color:#000000">
									*</span></td>
                              </tr>
                                <tr>
                                    <td valign="top" rowspan="">Zip Code:</td>
                                    <td><input type="text" name="zipcode"><span style="color:#000000">
									*</span></td>
                              </tr>
                                
                                
						</table>			
					</center> 
					
					<div style="background-color:#000000;" class="commonheader"><!--Choose Your Method of Payment--></div>
					<div class="dbr"></div> 
					<center></center>
					
					<div class="commonheader"><h3 style="color:#4F1C66;">Choose Your Method of Shipping</h3></div>
					<div class="dbr"></div>
					 <center>
						<table width="450">
								<tr>
									<td width="10"><input type="radio" name="shippingmethod" id="fedex" value="fedex" checked></td>
									<td width="440"><b>FedEx Priority Overnight</b>&reg;(free)</td>
								</tr>
								 
						</table>
					</center>

					<div class="commonheader"><h3 style="color:#4F1C66;">Choose Your Method of Payment</h3></div>
					<div class="dbr"></div>
					<center>
						<table width="450">
							<tr>
								<td width="10"><input type="radio" name="paymentmethod" id="creditcard" value="creditcard" checked></td>
								<td width="440"><b>Online with credit card<br><!--3% surcharge is added to all credit card orders <br>--></b><small> Use your Visa, MasterCard, Diners Club, American Express, or Discover Card</small></td>
							</tr>
							<tr></tr>
							<!--<tr>
								<td><input type="radio" name="paymentmethod" id="phone" value="phone"></td>
								<td><b>By phone with customer service</b><br><small> Create your order now, complete it over the phone.</small></td>
							</tr>
							<tr></tr>
							<tr>
								<td><input type="radio" name="paymentmethod" id="moneyorder" value="moneyorder"></td>
								<td><b>By Money Order with Bank Service</b><br><small> Create your order now, complete it over the phone.</small></td>
							</tr>
							<!--<tr>
								<td><input type="radio" name="paymentmethod" id="paypal" value="paypal"></td>
								<td><b>By Paypal</b><br><small> Create your order now.</small></td>
							</tr>
							<tr>
							</tr>
							 <tr>
								<td><input type="radio" name="paymentmethod" id="registeruser" value="registeruser"></td>
								<td><b>I am already a registered user</b><br><small> Create your order now, complete it over the phone.</small></td>
							</tr>-->
							<tr></tr>
                        </table>
                    </center>

					<!-- <div class="commonheader">Choose Your Method of Shipping</div> -->
					<div class="dbr"></div>
					<!-- <center>
						<table width="450">
								<tr>
									<td width="10"><input type="radio" name="shippingmethod" id="fedex" value="fedex" checked></td>
									<td width="440"><b>FedEx Priority Overnight</b>&reg;(free)</td>
								</tr>
								 
						</table>
					</center>	 -->
					
					<div class="floatr"> 
								<input type="submit" name="continueorder" value="continue" class="tbutton3"  style="font-weight:bold;" title="continue"> 
					</div> 
					<div class="clear"></div> 
					<script type="text/javascript">
					 	
					function showmsgx(){
									if(document.getElementById('creditcard').checked != true && document.getElementById('phone').checked != true && document.getElementById('moneyorder').checked != true){
										alert('Please select a method of payment'); 
									}
									
									
								};	 	
							 	
				</script>
					
					
					
				</div> 
		<!--</form>-->
		<?php echo form_close();?>
  
  </div>
 <div class="bodybottom"></div>
</div>
</div>
</article>

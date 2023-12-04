<link href="https://images-na.ssl-images-amazon.com/images/G/01/browser-scripts/rainier-core/rainier-core-1538787513.css._V166129815_.css" rel="stylesheet" type="text/css" />
	<div>
<?php		
	       	$this->load->helper('custom','form');
                        $fedexService['StandardB']     = 'StandardB';
			$fedexService['ExpressMailCommitment']     = 'ExpressMailCommitment';
			$fedexService['ExpressMailIntlCertify']        = 'ExpressMailIntlCertify';
                        $fedexService['ExpressMailIntl']        = 'ExpressMailIntl';
                        $fedexService['PriorityMailIntl']        = 'PriorityMailIntl';
                        $fedexService['PriorityMailIntlCertify']        = 'PriorityMailIntlCertify';
                        $fedexService['FirstClassMailIntl']        = 'FirstClassMailIntl';
                        $fedexService['FirstClassMailIntlCertify']        = 'FirstClassMailIntlCertify';			
                        $fedexService['ExpressMailLabelCertify']        = 'ExpressMailLabelCertify';
                        $fedexService['ExpressMailLabel']        = 'ExpressMailLabel';
                        $fedexService['OpenDistributePriority']        = 'OpenDistributePriority';                       
                        
                        
///			$shippingServices = "<select name='' id=''>";
			foreach($fedexService as $key => $value){
				$shippingServices  .= '<option value='.$key.'>'.$value.'</option>';				
			}			
	//		$shippingServices  .= "</select>";
			
			 if(isset($details)){

                                                                $orderid 			= isset($details[0]['orderid']) 			? $details[0]['orderid'] 		: '';
                                                                $sku 			= isset($details[0]['sku']) 			? $details[0]['sku'] 		: '';
							 	$order_item_id 			= isset($details[0]['order-item-id']) 			? $details[0]['order-item-id'] 		: 0;						 	
							 	$purchase_date 			= isset($details[0]['purchase-date']) 			? $details[0]['purchase-date'] 		: 0;
							 	$payments_date 			= isset($details[0]['payments-date']) 			? $details[0]['payments-date'] 		: 0;
							 	$buyer_email 			= isset($details[0]['buyer-email']) 			? $details[0]['buyer-email'] 		: 0;
								$buyer_name          = isset($details[0]['buyer-name'])			? $details[0]['buyer-name'] 	: '';				 	
							 	$buyer_phone_number 			= isset($details[0]['buyer-phone-number']) 			? $details[0]['buyer-phone-number'] 	: '';
                                                                $product_name 			= isset($details[0]['product-name']) 			? $details[0]['product-name'] 		: '';
							 	$quantity_purchased 		= isset($details[0]['quantity-purchased']) 		? $details[0]['quantity-purchased'] 		: '';
							 	$item_price   			= isset($details[0]['item-price']) 	? $details[0]['item-price'] 	: '';
							 	$ship_address1   		= isset($details[0]['ship-address1']) 			? $details[0]['ship-address1'] 		: '';
								$ship_address2= isset($details[0]['ship-address2']) 			? $details[0]['ship-address2'] 		: '';
							 	$ship_city   		= isset($details[0]['ship-city']) 			? $details[0]['ship-city'] 		: '';
								$ship_state 	= isset($details[0]['ship-state']) 	? $details[0]['ship-state'] 	: '';
                                                                $ship_postal_code 		= isset($details[0]['ship-postal-code'])   	? $details[0]['ship-postal-code'] 	: '';
                                                                $ship_country 		= isset($details[0]['ship-country'])   	? $details[0]['ship-country'] 	: '';
								$ship_phone_number 	= isset($details[0]['ship-phone-number']) ? $details[0]['ship-phone-number'] 	: '';
                                                                $shipped_usps 		= isset($details[0]['shipped-usps'])   	? $details[0]['shipped-usps'] 	: '';
                                                                                                               $purchase_date 		= isset($details[0]['purchase-date'])   	? $details[0]['purchase-date'] 	: '';
                                                                $shipping_level =  isset($details[0]['ship-service-level'])   	? $details[0]['ship-service-level']	: '';
                                                                $trackingCode =  isset($details[0]['usps_tracking_code'])   	? $details[0]['usps_tracking_code']	: '';                                                                
                                                                $buyer_phone = isset($details[0]['buyer-phone-number'])   	? $details[0]['buyer-phone-number']	: '';                                                                


			                    
			    
			 }else{
			 	 	$orderid 			= '';
					$order_item_id 			= 0;
					$purchase_date 			= 0;
					$payments_date 			= 0;
					$buyer_email 			= '';					
				 	$buyer_name 		= '';
				 	$buyer_phone_number   	= '';
				 	$product_name   		= '';
				 	$quantity_purchased   		= '';
				 	$item_price   		= ''; $ship_address1 = ''; $ship_address2 = ''; $ship_city = ''; $ship_state = '';
					$ship_postal_code = '';  $ship_country = ''; $ship_phone_number = ''; $shipped_usps = '';
                                        $shipping_level = '';
                                        $sku = '';
			       }
			  		$id   = isset($orderid) ? $orderid : '';
			
			?>
			<style>
				.div{
				   color:white;
				}
				.lebelfield{
				      color:white;
				} 
				.bor{
				border:background: none repeat scroll 0 0 #F2F2F2;margin: 0 auto;padding: 3px;  border: 1px solid #D3D3D3;border-radius: 3px 3px 3px 3px;
				}
			</style>
			<div>
					<h1 class="hbb" align="center">
							USPS Shippment
					
					</h1>
					
					<br/>
					<div align="center">
					 
<form name="shipfrm" id="shipfrm" action="<?php echo config_item('base_url');?>admin/usps/<?php echo $id; ?>" method="post" enctype="multipart/form-data" >
     <input type ="hidden" name="buyername" value="<?php echo $buyer_name; ?>" />
      <input type ="hidden" name="buyeremail" value="<?php echo $buyer_email; ?>" />
      <input type ="hidden" name="buyeraddress1" value="<?php echo $ship_address1; ?>" />
      <input type ="hidden" name="buyeraddress2" value="<?php echo $ship_address2; ?>" />
      <input type ="hidden" name="buyercity" value="<?php echo $ship_city; ?>" />
      <input type ="hidden" name="buyerstate" value="<?php echo $ship_state; ?>" />
      <input type ="hidden" name="buyerzip" value="<?php echo $ship_postal_code; ?>" />
      <input type ="hidden" name="buyercountry" value="<?php echo $ship_country; ?>" />
      <input type ="hidden" name="buyerphone" value="<?php echo $buyer_phone; ?>" />


      <input type ="hidden" name="item_name" value="<?php echo $product_name; ?>" />
      <input type ="hidden" name="item_price" value="<?php echo $item_price; ?>" />
      <input type ="hidden" name="item_qty" value="<?php echo $quantity_purchased; ?>" />      
<div style="">
  <table class="titlebar" cellspacing="0"><tbody>
  <tr>
    <th align="left" width="50%">Order ID: # <?php echo $orderid; ?></th>

    <td align="right" width="50%">
      <a class="buttonImage" name="Print order packing slip" href="#"><span class="awesomeButton buttonSmall secondarySmallButton inner_button" onclick="window.print();"><span class="button_label">Print order packing slip</span></span></a>
    </td>
    <td align="right" width="50%">
      
    </td>
  </tr>
  </tbody></table> 

    <table class="data-display" cellpadding="1" cellspacing="1">

        <tbody><tr class="data-display-header" style="height: 25px;" id="_myo_ERROR_ROW">
            <td>
                <table align="left" border="0" cellpadding="0" cellspacing="0"><tbody><tr>
                    <td class="tiny" align="left" valign="middle">
                        <strong><font color="#666666">&nbsp;Your Merchant Order ID: #</font></strong>
                    </td>
                    <td>&nbsp;</td>
                    <td class="tiny" id="_myoMOID_MOIDReadOnlyPlaceholder" style="color: rgb(102, 102, 102); font-weight: bold;" align="left" valign="middle">
                        <?php echo $orderid; ?>
                    </td>
                    <td>&nbsp;</td>
                    <td class="tiny" id="_myoMOID_EditButtonPlaceholder" align="left" valign="middle">
                    
                    </td>
                    <td class="tiny" id="_myoMOID_MOIDEditablePlaceholder" style="display: none;" align="left" valign="middle">
                        <div id="_myoMOID_NewMOID_InputDiv" valign="middle">
                            
                        </div>
                        <div class="myo2messageboxerror" style="display: none;" id="_myoMOID_NewMOID_InputDiv_refErrorDiv">
                         
                        </div>
                    </td>
                    <td>&nbsp;</td>
                    <td class="tiny" id="_myoMOID_SuccessImagePlaceholder" style="display: none;" align="left" valign="middle">
                        <img src="https://images-na.ssl-images-amazon.com/images/G/01/rainier/icons/success-small._V192558628_.gif" style="margin: 0px;" align="absmiddle" border="0" height="15" width="15">
                    </td>

                    <td>&nbsp;</td>
                    <td class="tiny" id="_myoMOID_SaveButtonPlaceholder" style="display: none;" align="left" valign="middle">
                        <button name="" id="_myoMOID_SaveButton" class="awesomeButton buttonSmall secondarySmallButton" type="button"><span class="button_label">Save</span></button>
                    </td>
                    <td>&nbsp;</td>
                    <td class="tiny" id="_myoMOID_CancelButtonPlaceholder" style="display: none;" align="left" valign="middle">
                        <button name="Cancel" id="_myoMOID_CancelButton" class="awesomeButton buttonSmall secondarySmallButton" type="button"><span class="button_label">Cancel</span></button>
                    </td>

                    <td class="tiny" id="_myoMOID_LoadingImagePlaceholder" style="display: none;" align="left" valign="middle">
                        <img src="https://images-na.ssl-images-amazon.com/images/G/01/rainier/ajax/snake._V192558488_.gif" style="margin: 0px;" align="absmiddle" border="0" height="16" width="16">
                    </td>
                </tr>
              </tbody></table>
            </td>
        </tr></tbody>
    </table>



</div>


<table class="data-display" cellspacing="1"><tbody>
  <tr class="list-row">
    <td class="data-display-field" valign="top" width="30%"><strong>Shipping Address:</strong><br><? echo  $ship_address1."<br>".$ship_address2 . '<br>'.$ship_city.'<br>'.$ship_state ."<br>".$ship_postal_code.'<br>'.$ship_country.'<br>Phone:'.$ship_phone_number ; ?></td>
    <td class="data-display-field" valign="top" width="50%">
      <table class="data-display" cellpadding="0" cellspacing="0"><tbody>
        <tr class="list-row">
          <td class="data-display-field" style="font-weight: bold;" width="40%">Purchase Date:</td>
          <td class="data-display-field" width="60%"><?php echo $purchase_date; ?></td>
        </tr>


        
        <tr class="list-row">

          <td class="data-display-field" style="font-weight: bold;" width="40%">Expected Ship Date:</td>
          <td class="data-display-field" width="60%"><?php echo date("M d Y", strtotime(date("d",strtotime($purchase_date))+2)); ?></td>
        </tr>
        <tr class="list-row">
          <td class="data-display-field" style="font-weight: bold;" width="40%">Shipping Service:</td>
          <td class="data-display-field" width="60%"><? echo ucfirst($shipping_level) ; ?></td>
        </tr>

        <tr class="list-row">
          <td class="data-display-field" style="font-weight: bold;" width="40%">Contact Buyer:</td>
          <td class="data-display-field" width="60%"><a href="https://sellercentral.amazon.com/gp/orders-v2/contact?ie=UTF8&amp;orderID=<?=$orderid;?>" target="_blank"><?php echo ucfirst($buyer_name); ?></a></td>
        </tr>



        <tr class="list-row">
          <td class="data-display-field" style="font-weight: bold;" width="40%">Billing Country:</td>

          <td class="data-display-field" width="60%"><?php echo $ship_country; ?></td>
        </tr>

        <tr class="list-row">
          <td class="data-display-field" style="font-weight: bold;" width="40%">
            Sales Channel:
          </td>
          <td class="data-display-field" width="60%">
            Amazon.com
          </td>

        </tr>


        <tr class="list-row">
          <td class="data-display-field" style="font-weight: bold;" width="40%">
            Fulfillment Channel:
          </td>
          <td class="data-display-field" width="60%">
            Merchant
          </td>
        </tr>

      </tbody></table>

    </td><td class="data-display-field" valign="top" width="20%">
      <table class="printtotal" cellpadding="0" cellspacing="0" width="100%"><tbody>
        <tr class="list-row">
          <td class="data-display-field" style="font-weight: bold;" colspan="2" align="center" width="60%">Order Totals</td>
        </tr>


        <tr class="list-row">
          <td class="data-display-field" align="right" width="60%">Items total:</td>
          <td class="data-display-field" align="right" width="40%">$<?php echo number_format($item_price,2); ?></td>
        </tr>


        <tr>
          <td colspan="2"><hr color="#cccccc" noshade="noshade" size="1"></td>
        </tr>

        <tr class="list-row">
          <td class="data-display-field" style="font-weight: bold; color: rgb(0, 0, 102);" align="right" width="60%">Grand total:</td>
          <td class="data-display-field" style="font-weight: bold; color: rgb(0, 0, 102);" align="right" width="40%">$<?php echo number_format($item_price,2); ?></td>
        </tr>

      </tbody></table>
    </td>
  </tr>

</tbody></table>



 






   




<table class="data-display" cellspacing="1"><tbody>
  <tr>

    <td class="data-display-header" align="center" width="47%">Product Details</td>

    <td class="data-display-header" align="center" width="10%">Status</td>

    <td class="data-display-header" align="center" width="8%">Quantity Ordered</td>


    <td class="data-display-header" align="center" width="7%">Quantity Shipped</td>


    <td class="data-display-header" align="center" width="8%">Price</td>

    <td class="data-display-header" align="center" width="20%">Total</td>

  </tr>



  <tr class="list-row-odd">

    <td class="data-display-field" align="left" valign="top">







    <span class="smaller"><strong><a href="http://www.amazon.com/gp/product/<?=$order_item_id;?>"><?php echo $product_name; ?> ...</a></strong></span>
    <div style="margin-top: 5px;">
    <table border="0" cellpadding="1" cellspacing="0"><tbody>


    
    <tr>
        <td class="tiny-example" align="left"><strong>Quantity:</strong></td>
        <td class="tiny-example" align="left"><?php echo $quantity_purchased; ?></td>

    </tr>


    
    <tr>
        <td class="tiny-example" align="left"><strong>Merchant SKU:</strong></td>
        <td class="tiny-example" align="left"><? echo $sku ; ?></td>
    </tr>

   <!--  
    <tr>

        <td class="tiny-example" align="left"><strong>ASIN:</strong></td>
        <td class="tiny-example" align="left">B002VJJO2S</td>
    </tr>


    
    <tr>
        <td class="tiny-example" align="left"><strong>Listing ID:</strong></td>
        <td class="tiny-example" align="left">1011IOWGO3Z</td>

    </tr>
-->

    
    <tr>
        <td class="tiny-example" align="left"><strong>Order-Item ID:</strong></td>
        <td class="tiny-example" align="left"><?php  echo $order_item_id; ?></td>
    </tr>

    
    <tr>

        <td class="tiny-example" align="left"><strong>Condition:</strong></td>
        <td class="tiny-example" align="left">New</td>
    </tr>

    
    <tr>
        <td class="tiny-example" align="left"><strong>Comments:</strong></td>
        <td class="tiny-example" align="left">This watch is Brand NEW!!!!!!!!! . Factory Authorized Dealer 100% New In Box Customer Satisfaction Guaranteed or Money Back. Shop With Confidence.In Stock Same Day Shipping.</td>

    </tr>


    







    

    

    

    







    </tbody></table>
    </div>

</td>

    <td class="data-display-field" align="center" valign="top"><b style="color: green;">
    <?php if(!empty($trackingCode)){ 
               echo 'Shipped';
    }else{
               echo 'Not Shipped';
    
    }?>
    
    </b></td>


    <td class="data-display-field" align="center" valign="top"><?php echo $quantity_purchased; ?></td>


    <td class="data-display-field" align="center" valign="top"><?php echo $quantity_purchased; ?></td>


    <td class="data-display-field" align="center" valign="top">$<?php echo number_format($item_price,2); ?></td>

    <td class="data-display-field" align="center" valign="top">


<table border="0" cellpadding="1" cellspacing="0" width="100%"><tbody>

  <tr>
    <td class="smaller" align="right" width="60%">Subtotal:</td>
    <td class="smaller" align="right">$<?php echo number_format($item_price,2); ?></td>
  </tr>







  <tr>
    <td colspan="2"><hr color="#cccccc" noshade="noshade" size="1"></td>
  </tr>
  <tr>
    <td class="small" style="color: rgb(0, 0, 102); font-weight: bold;" align="right">Total:</td>
    <td class="small" style="color: rgb(0, 0, 102); font-weight: bold;" align="right">

       $<?php echo number_format($item_price,2); ?>
    </td>

  </tr>

</tbody></table>
 
    </td>

  </tr>
  
  
  <tr class="myo-row-payment-summary">
    <td colspan="5" align="right">Total Charged to Customer:</td>
    <td align="right">

      $<?php echo number_format($item_price,2); ?>
    </td>
  </tr>


</tbody></table>


 










<table align="center" border="0" cellpadding="2">
    <tbody><tr>



        <td><a class="buttonImage" name="Refund order" target="_blank" href="https://sellercentral.amazon.com/gp/orders-v2/refund?ie=UTF8&amp;orderID=<?=$orderid;?>"><span class="awesomeButton buttonLarge secondaryLargeButton inner_button"><span class="button_label">Refund order</span></span></a>
        <?php if(empty($trackingCode)){ ?>
        <input type="submit" name="submit" value="Send to Usps" style="width:170px;cursor:pointer;font-weight:bold;"></input>        
        <?php } ?>
        </td>
 
    



</tr></tbody></table>

           
 

 




<img src="https://images-na.ssl-images-amazon.com/images/G/01/x-locale/common/transparent-pixel._V42752373_.gif" style="position: absolute;" alt="" onload="if (typeof uet == 'function') { uet('af'); }" border="0" height="1" width="1">

 

 








<div class="content-module">





















<div style="display: none;"><img src="https://images-na.ssl-images-amazon.com/images/G/01/rainier/icons/success-small._V192558628_.gif" align="top" border="0" height="15" width="15"></div>
<table class="titlebar" cellspacing="0"><tbody>
    <tr id="_myo_ERROR_ROW">
        <th>
            <div id="emptyPackageMsgDiv_2444897128" style="float: left;">
              Package Details
                <input id="emptyPackage_2444897128" value="0" type="hidden">
            </div>
            <div class="myo2messageboxerror" style="display: none;" id="emptyPackageMsgDiv_2444897128_refErrorDiv">
                Please add at least one item to this package.
            </div>

        </th>
        <td align="right">
          <table id="_myoES_PackageTitleBarButtonsPlaceholder_2444897128" align="right" cellpadding="0" cellspacing="0"><tbody><tr>
            <td><a class="buttonImage" name="Print package packing slip" href="#"><span class="awesomeButton buttonSmall secondarySmallButton inner_button" onclick="return MYO.JS.openJSPopupWindow('https://sellercentral.amazon.com/gp/orders-v2/packing-slip?ie=UTF8&amp;orderID=002-4271362-8558666&amp;packageID=2444897128', 750);"><span class="button_label">Print package packing slip</span></span></a></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>

            <td></td>
            <td></td>
          </tr></tbody></table>
        </td>
        <td align="right">
          <table id="_myoES_PackageTitleBarSmallLoadingImagePlaceholder_2444897128" style="display: none;" align="right"><tbody><tr>
            <td><img src="https://images-na.ssl-images-amazon.com/images/G/01/rainier/ajax/snake._V192558488_.gif" align="top" border="0" height="16" width="16"></td>
          </tr></tbody></table>
        </td>

    </tr>
</tbody></table>
<table class="data-display" cellpadding="0" cellspacing="1" width="100%"><tbody>
    <tr>
        <td id="_myoES_PackageMessagePlaceholder_2444897128" style="display: none;" align="center" bgcolor="#ffffff"></td>
    </tr>
</tbody></table>






<table class="data-display" cellspacing="1"><tbody>

  <tr>
    <td class="data-display-header" align="left" width="85%">Product Details</td>
    <td class="data-display-header" align="center" width="15%">Item Quantity Included</td>
  </tr>



  <tr class="list-row-even" id="_myo_ERROR_ROW">



    <td class="data-display-field" align="left" valign="top" width="85%">








    <span class="smaller"><strong><a href="http://www.amazon.com/gp/product/B002VJJO2S"><? echo  $product_name;  ?> ...</a></strong></span>
    <div style="margin-top: 5px;">

    <table border="0" cellpadding="1" cellspacing="0"><tbody>


    
    <tr>
        <td class="tiny-example" align="left"><strong>Quantity:</strong></td>
        <td class="tiny-example" align="left"><?php echo $quantity_purchased; ?></td>
    </tr>


    
    <tr>

        <td class="tiny-example" align="left"><strong>Merchant SKU:</strong></td>
        <td class="tiny-example" align="left"><? echo $sku ; ?></td>
    </tr>

 <!--    
    <tr>
        <td class="tiny-example" align="left"><strong>ASIN:</strong></td>
        <td class="tiny-example" align="left">B002VJJO2S</td>

    </tr>


    
    <tr>
        <td class="tiny-example" align="left"><strong>Listing ID:</strong></td>
        <td class="tiny-example" align="left">1011IOWGO3Z</td>
    </tr>
-->

    
    <tr>

        <td class="tiny-example" align="left"><strong>Order-Item ID:</strong></td>
        <td class="tiny-example" align="left"><? echo $order_item_id ; ?></td>
    </tr>

    
    <tr>
        <td class="tiny-example" align="left"><strong>Condition:</strong></td>
        <td class="tiny-example" align="left">New</td>

    </tr>

    
    <tr>
        <td class="tiny-example" align="left"><strong>Comments:</strong></td>
        <td class="tiny-example" align="left">This watch is Brand NEW!!!!!!!!! . Factory Authorized Dealer 100% New In Box Customer Satisfaction Guaranteed or Money Back. Shop With Confidence.In Stock Same Day Shipping.</td>
    </tr>


    







    

    

    

    







    </tbody></table>

    </div>

</td>

    <td class="data-display-field" align="center" valign="top" width="15%">
        1
    </td>


  </tr>


</tbody></table>
















<table class="data-display" cellspacing="1"><tbody>

  <tr class="list-row">
    <td class="data-display-field" colspan="5">
        <strong>Shipping Details</strong>
    </td>
  </tr>

  <tr class="list-row">

    <td class="data-display-field" align="left" valign="middle" width="25%"><strong>Ship Date:</strong>&nbsp;<?php echo date("M , d Y");?></td>

    <td class="data-display-field" align="left" valign="middle" width="25%"><strong>Carrier:</strong>&nbsp;USPS</td>
    <td class="data-display-field" align="left" valign="middle" width="25%"><strong>Shipping Service:</strong>&nbsp;           <select class="commondropdown" name="shipped_usps" id="shipped_usps">
            <?php echo $shippingServices ; ?>
	   </select> 
</td>


        <td class="data-display-field" align="left" valign="middle" width="25%">
            <strong>Tracking ID:</strong>&nbsp;<br><a href="https://sellercentral.amazon.com/gp/shipping-manager/track-package-v2.html?_encoding=UTF8&amp;orderID=002-4271362-8558666&amp;packageID=2444897128"><? echo $trackingCode; ?></a>
        </td>

  </tr>


</tbody></table>






    </td>
    <td class="data-display-field" valign="top" width="50%">
      <strong>Total Shipping Cost:</strong>
      <table border="0" cellspacing="0" width="100%">
            <tbody><tr class="list-row">
                <td class="data-display-field" align="right">
                   Weight 
                    &nbsp;
                </td>

                <td class="data-display-field" align="right">
                    <input type="text" name="weightinpounds" id="weightinpounds" value="22" />pounds
                </td>
            </tr>
            
            <tr class="list-row">
                <td class="data-display-field" align="right">
                   weight
                    &nbsp;
                </td>

                <td class="data-display-field" align="right">
                    <input type="text" name="weightinounces" id="weightinounces" value="10" />ounces
                </td>
            </tr>
            
            
            <tr class="list-row">
                <td class="data-display-field" align="right">
                   Permit Issuing PO Zip5
                    &nbsp;
                </td>

                <td class="data-display-field" align="right">
                    <input type="text" name="permit_zip" id="permit_zip" value="21718" />
                </td>
            </tr>
            
            
            <tr class="list-row">
                <td class="data-display-field" align="right">
                   Tarif Number	
                    &nbsp;
                </td>

                <td class="data-display-field" align="right">
                    <input type="text" name="tarif" id="tarif" value="123456" />
                </td>
            </tr>
                       <tr class="list-row">
                <td class="data-display-field" align="right">
                    Width:
                    &nbsp;
                </td>
                <td class="data-display-field" align="right">
                    <input type="text" name="width" id="width" value= "7" />
                </td>

            </tr>
        <tr>
          <td colspan="2"><hr></td>
        </tr>

        <tr>
            <td class="data-display-field" align="right">
                Length
            </td>
            <td class="data-display-field" align="right">
				<input type="text" name="len" id="len" value= "20.5" />
            </td>
        </tr>
         <tr>
            <td class="data-display-field" align="right">
                Height
            </td>
            <td class="data-display-field" align="right">
				<input type="text" name="height" id="height" value= "15" />
            </td>
        </tr>
        <tr>
            <td class="data-display-field" align="right">
                Girth
            </td>
            <td class="data-display-field" align="right">
				<input type="text" name="girth" id="girth" value= "40" />
            </td>
        </tr>
      </tbody></table> 
    </td>
    
  </tr>
</tbody></table>


</div> 

 












<img src="https://images-na.ssl-images-amazon.com/images/G/01/x-locale/common/transparent-pixel._V42752373_.gif" style="position: absolute;" alt="" onload="if (typeof uet == 'function') { uet('cf'); }" border="0" height="1" width="1">
<!-- gonzo comment do not remove -->

 


<div class="content-module">

  
  <table class="titlebar" cellspacing="0"><tbody>
    <tr>
      <th align="left" width="50%">
        Your notes
      </th>

     
    </tr>
  </tbody></table>
  <table class="data-entry" cellspacing="1"><tbody>
    <tr class="list-row-even">
      <td class="label" align="right" valign="top" width="40%">

        <strong>Seller memo:</strong>
        <div class="tiny-example" style="text-align: right; font-weight: normal;" id="_myoPN_sellerMemoTextLengthNotification"></div>
      </td>
      <td class="data-display-field" align="left" valign="top" width="60%">
        <textarea rows="4" cols="80" id="comments" name="comments" wrap="soft" style="border: 1px solid rgb(127, 157, 185);"></textarea><br>
        <span class="tiny-example" style="font-weight: normal;">The information you enter here is for your use only and will not be displayed to the buyer.</span>
      </td>

    </tr>
  </tbody></table>

</div>


<div id="_myoSF_feedback_form_placeholder" class="content-module" align="center">





<table class="titlebar" cellspacing="0">
 <tbody>

   <tr>
     <th>
       Feedback Received
     </th>
     <td align="right">
	
     </td>
  </tr>
 </tbody>
</table>

</div>
</form>
</div>
</div>
</div>
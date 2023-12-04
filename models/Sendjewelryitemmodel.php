<?php  
    class Sendjewelryitemmodel extends CI_Model {

        function __construct()
        {
            parent::__construct();
            $this->load->model( 'adminmodel' );
            $this->load->model( 'catemodel' );
            $this->load->helper('item_jewelry_section');
            $this->load->model( 'itemjewelrymodel' );
        }
        //// get item specification
    function geteBayJewelryItemDeailSpec($product_id=0, $type='spec', $item_price=0) {
        if( $type === 'spec' ) {
            $results = $this->itemjewelrymodel->getItemSpecification($product_id);
            $specList = itemJewelerySpecList( $results );
        } else {
            $results = $this->itemjewelrymodel->getItemSpecification($product_id, 'dev_ebay_details');
            $specList = itemJeweleryDetailsList( $results, $item_price );
        }
        
        $spec_lists = $this->get_jewitem_rows($specList);
        
        return $spec_lists;
    }
    
    function get_jewitem_rows($result=array()) {
        $spec_lists = '';
        $i = 1;
        
        foreach( $result as $label => $colValue ) {
            $bg_color = ( $i%2 != 0 ? ' bgcolor="#f2f2f2"' : '' );
            
            if( !empty($colValue) ) {
                $spec_lists .= '<tr'.$bg_color.'><td width="25%" class="tddeco">'.$label.':</td><td width="75%" class="tddeco">'.$colValue.'</td></tr>';
                
                $i++;
            }
        }

        return $spec_lists;
    }

	function sendJewItemToEbay($itemID=0) {
        $response = '';
        $count=0;
        $GetResponse = $this->addItemJewelryToEbay($itemID, 30, 'pendants', '-1');
        if (isset($GetResponse) && !empty($GetResponse)) {
            $count++;
            $response .= "<div style=\"border: 1px solid red;display:block;\">Stock No($stock_no)</br>";
            $response .= $GetResponse."</div>";
        } else {
            $response .="<div style=\"border: 1px solid red;display:block;\">Item Failed to Update on eBay Stock No($stock_no)</div>";
        }         
        $response = "<h1>Total " . $count . " diamond(s) added/updated. </h1></br>" . $response;

        return $response;             
    }

    function addItemJewelryToEbay($item_id=0, $durations=30, $type, $index, $ebayRequest='AddItem') {
        $duration = ( $durations > 0 ? $durations : 30 );
        $item_details = $this->itemjewelrymodel->getItemDetailViaID($item_id);

        $storeCategoryId = '13525436017';
        $requestArray['primaryCategory'] = '152810';
        $requestArray['listingType'] = 'StoresFixedPrice'; //'FixedPriceItem';
        $requestArray['productID'] = $item_id;
        $requestArray['ring_id'] = $item_id;
        $item_price = $item_details['price'];
        $diamondSalePrice = $item_price;
        $salesPrice = $item_price;
        $daimondSalePrice = round($salesPrice,2);
        $results_img = $this->itemjewelrymodel->get_item_imgs( $item_details['id'] );   /// jewelry img list
        $watchdetails = '';
        $watchdetails .= '<html><head></head><body>
<link rel="stylesheet" href="https://diamondbayou.com/dev/ebayimages/store/css/store-style.css">
<link rel="stylesheet" href="https://diamondbayou.com/dev/ebayimages/tmp/css/sty.css">
<div class="pagewidth"><div class="pageminwidth"><div class="pagelayout"><div class="pagecontainer"><table cellspacing="0" cellpadding="0" border="0" width="100%">
<tbody><tr><td><!--header start--><table border="0" cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td><table cellspacing="0" cellpadding="0" border="0" width="100%"><tbody><tr><td colspan="1" rowspan="1"><div id="seo"><a href="http://www.ebaystoreprofessionals.com">Advanced eBay design, eBay store design, eBay shop design, eBay template design, eBay listing design</a></div><table cellspacing="0" cellpadding="0" border="0" width="1104"><tbody><tr><td><table width="1104" border="0"><tbody><tr><td><a href="http://stores.ebay.com/Petrosyan-Jewelry?_rdc=1"><img src="https://diamondbayou.com/dev/ebayimages/store/images/logo.jpg" width=""></a></td><td><img src="https://diamondbayou.com/dev/ebayimages/store/images/phone.jpg" width="579"></td></tr></tbody></table></td></tr><tr><td><table width="1104" border="0"> <tbody><tr><td><table border="0" class="navo" cellpadding="4" cellspacing="0" width="1150"><tbody><tr><td><a href="http://stores.ebay.com/Petrosyan-Jewelry">Home</a></td><td><a href="http://stores.ebay.com/Petrosyan-Jewelry/About-Us.html">About Us</a></td> <td><a href="http://stores.ebay.com/Petrosyan-Jewelry/Shipping.html">Shipping</a></td><td><a href="http://stores.ebay.com/Petrosyan-Jewelry/Returns.html">Returns</a></td> <td><a href="http://stores.ebay.com/Petrosyan-Jewelry/Policies.html">store policies</a></td><td><a href="http://stores.ebay.com/Petrosyan-Jewelry/Education.html">education center</a></td> <td align="right" class="clrblk"><a href="http://stores.ebay.com/Petrosyan-Jewelry/all">View All listings</a></td> <td width="210"><div id="x-hd-srch"><form method="get" name="search" action="http://stores.ebay.com/Petrosyan-Jewelry"><input id="x-hd-sbtn" name="submit" type="image" src="https://diamondbayou.com/dev/ebayimages/store/images/search.png" size="" 30=""><input id="x-hd-sbox" onblur="if (this.value == \'\') this.value = \'Store Search ...\';" onfocus="if (this.value == \'Store Search ...\') this.value = \'\';" value="Store Search ..." class="v4sbox" size="13" maxlength="300" name="_nkw" type="text"></form></div></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table><!-- header end --></td></tr><!-- content start --><tr><td>
<table width="100%" cellspacing="0" cellpadding="0" border="0">

<tbody><tr><td align="center"><br></td></tr>

<tr><td align="center">
	
Presenting this Breath-Taking, Vintage Pave Style Setting set with Hand-Selected<br>
3ct G color / VS2 clarity Round Diamonds <br>
(100% Clean, with amazing spark and NO Visible inclusions!!!)<br>
<br>
Highest quality, 100% Natural, Authentic diamonds at Special Wholesale Price.<br>
Offers Welcomed - Let\'s Deal!
	
	</td></tr>
	
<tr><td align="center"><br></td></tr>
<tr><td>
<table align="center" border="0">
<tbody><tr>
<td align="center">Click on Thumbnail to View Image</td>
</tr>
<tr>
<td><div class="image-galleryxxx">
  <div class="big-image">';
    $imgthumb_list = '';
  if( count($results_img) > 0 ) {
      $j = 1;
    foreach( $results_img as $rowimg ) {
      $watchdetails .= '<img id="image'.$j.'" src="' . SITE_URL . $rowimg['image'] . '" width="550" height="550">';
      $imgthumb_list .='<li class="format"><a href="#image'.$j.'"><img src="' . SITE_URL . $rowimg['image'] . '" width="150" height="150"></a></li>';
      
      $j++;
    }
  }
  $watchdetails .='</div>
  <ul>';
    $watchdetails .= $imgthumb_list;
    
    $watchdetails .='</ul>
</div></td>
</tr>
</tbody></table>
</td></tr>
<table width="1089" border="0" align="center">
<tbody><tr>
<td colspan="3" align="center" class="headingx-2">Product Specifications</td>
</tr>
</tbody></table>';

        $watchdetails .= '<table width="100%" border="0">
        <tbody>';
        
        $watchdetails .= $this->geteBayJewelryItemDeailSpec($item_details['id'], 'spec');
        
        $watchdetails .= '</tbody></table>';
        $watchdetails .= '</td></tr>

</tbody></table>
</td></tr>
<tr><td><br></td></tr>';

$watchdetails .= '<table width="1089" border="0" align="center">
<tbody><tr>
<td colspan="3" align="center" class="headingx-2">Product Details</td>
</tr>
</tbody></table>';
$watchdetails .= '<tr><td>';

 $watchdetails .= '<table width="100%" border="0">
        <tbody>';
        
        $watchdetails .= $this->geteBayJewelryItemDeailSpec($item_details['id'], 'product_detail', $item_details['price']);
        
        $watchdetails .= '</tbody></table>';
$watchdetails .= '</td></tr>';

    if( !empty($item_details['embed_link']) ) {
        $watchdetails .= '<tr><td><!-- BEGIN VIDEO -->
        <div style="position:relative; text-align:center; margin:auto; width:100%; max-width:600px;">
        <div style="width:100%; padding-top:75%;">
        <div style="position:absolute; left:0; right:0; top:0; bottom:0; margin:auto;">
        <object width="100%" height="100%" type="text/html" allowfullscreen="true" data="'.$item_details['embed_link'].'"></object></div></div></div>
        <!-- END VIDEO --></td></tr>';
    }

$watchdetails .= '<tr><td><br></td></tr>
<tr><td align="center" class="headingx-2">Featured Item Description: Engagement Ring</td></tr>

<tr><td> <table width="100%" border="0">   <tbody><tr>     <td colspan="2" align="center">Total Carat Weight: 3ct</td>   </tr>   <tr>     <td align="center">Here at Wonder Jewelers, we make the best efforts to bring you High-Quality Jewelry and Diamonds at Manufacture Direct Prices. We are Diamond-Cutters and Jewelry Manufacturing Company, therefore our prices are UNBEATABLE!<br>  We present this striking, Diamond Engagement Ring skillfully crafted from 18K White Gold symbolizing everlasting love and commitment!<br><br> The center stone carried on this piece is a 1.5ct of Round cut diamond with G color and VS2 clarity.<br><br> Accenting this gorgeous center stone are 1.5ct of round diamonds with G color and VS2 clarity.<br><br> The ring is available in any finger size requested.</td>     <td><img src="https://static.pexels.com/photos/5390/sunset-hands-love-woman.jpg" width="273"></td>   </tr> </tbody></table>  </td></tr>
<BR>
<tr><td><BR></td></tr>
<tr><td><div style="border-top:3px solid #0dadad"><br /></div></td></tr>

<tr><td align="center">
All diamonds are hand selected and professionally matched by our team of GIA certified Gemologists to ensure the high quality and excellent craftsmanship.<BR>
All of our purchases are 100% RISK FREE, backed by our 100% money back guarantee and lifetime upgrade policies.<BR><BR>
We only carry 100% natural diamonds that are non-enhanced by any shape or form.<BR><BR>
Buy with confidence. We will not let you down!
</td></tr> 
<tr><td><BR></td></tr>
<tr><td><div style="border-top:3px solid #0dadad"><br /></div></td></tr>
<tr><td align="center" class="headingx-2">The California Jewelers Guaranteed Value & Assurance:</td></tr>

<tr><td>

<table width="100%" border="0">
  <tr>
    <td align="center"><img src="https://diamondbayou.com/dev/ebayimages/tmp/images/1.jpg" width="200" /> </td>
    <td align="center"><img src="http://www.arcticgemlabs.com/images/article_gemologist.jpg" width="150" /></td>
    <td align="center"><img src="http://www.gminejewelry.com/images/graphics/sampleappraisal.jpg" width="150" /></td>
    <td align="center"><img src="https://ae01.alicdn.com/kf/HTB1OsNoOVXXXXbVXXXXq6xXFXXXY.jpg" width="200" /></td>
    <td align="center"><img src="http://quailvalleyjewelers.com/communities/0/000/001/032/790//images/14477647.png" width="200" /></td>
  </tr>
  <tr>
    <td align="center">Conflict-Free Diamonds</td>
    <td align="center">GIA Gemologist On-Staff </td>
    <td align="center">Professional Appraisal</td>
    <td align="center">Elegant Ring Box</td>
    <td align="center">FREE Resizing & Engraving</td>
	</tr>
	<tr><td><BR></td></tr>
	   <tr><td align="center" colspan="5">Diamond Full Report (click cert to enlarge)</td></tr>		
	   
	   <tr><td align="center" colspan="5"><img src="http://wonderjewelers.com/cert/XTJ12234.jpg" alt="" /></td></tr>		
 	
	<tr><td><BR></td></tr>
  </tr>
</table>

</td></tr>
<!-- content end -->

<!-- tabs  -->
<tr>
	<td><main>
<input class="inputfix" id="tab1" type="radio" name="tabs" checked="">
<label for="tab1">General information</label>
<input class="inputfix" id="tab2" type="radio" name="tabs">
<label for="tab2">Payment</label>
<input class="inputfix" id="tab3" type="radio" name="tabs">
<label for="tab3">Sales Tax / Int\'l Duties & Customs</label>
<input class="inputfix" id="tab4" type="radio" name="tabs">
<label for="tab4">Shipping</label>
<input class="inputfix" id="tab5" type="radio" name="tabs">
<label for="tab5">Refund Policy / Exchanges</label>

<input class="inputfix" id="tab6" type="radio" name="tabs">
<label for="tab6">Upgrades / Trade-ins</label>

<input class="inputfix" id="tab7" type="radio" name="tabs">
<label for="tab7">Contact info</label>

<section id="content1">
<h3 class="setting">General information</h3>
<p>All of our diamonds are 100% natural; with no enhancements or treatments of any kind.<BR><BR>
We cut round, princess, emerald & asscher diamonds exclusively in out cutting house located in Belguim and Israel<BR><BR>
Please note: all items are considered custom and are not ready to be shipped at time of purchase. Please allow 3-7 business days for production / shipping of any item. For rush delivery <BR><BR>
All purchases come with a free independent appraisal.<BR><BR>
Most items are available in white or yellow gold; please ask about platinum upgrades.<BR><BR>
Ring purchases come in an elegant hardwood ring box<BR><BR>
Free custom sizing - at time of purchase, it is buyer\'s responsibility to provide us with ring size(s) and gold preference. Most rings are available in either white or yellow gold. Same price!!!</p>
</section>
<section id="content2">
<h3 class="setting">Payment</h3>
<p>We accept the following forms of payments:<BR><br /><img src="http://www.wonderjewelers.com/images/bizcard1.gif" alt="" /><BR>
For US/Canada::<BR><BR>
PayPal, Direct Credit Card payment<BR><BR>
For all other countries:<BR><BR>
PayPal only! <BR><BR>
Please note, we will only ship to a Paypal confirmed address with NO exceptions!
</p>
<br>
</section>
<section id="content3">
<h3 class="setting">Sales Tax / Int\'l Duties & Customs</h3>
<p>CA STATE RESIDENTS MUST PAY 9% SALES TAX<BR><BR>
WE ARE NOT RESPONSIBLE FOR ANY DUTIES, TAXES OR PENALTIES <BR><BR>
INCURRED BY ANY BUYER WHEN WE SHIP OUTSIDE OF THE UNITED STATES.<BR><BR>
PLEASE CONTACT YOUR CUSTOMS BUREAU FOR ANY DUTIES OR <BR><BR>
TAXES THAT MAY APPLY IN YOUR HOME COUNTRY.</p>
</section>
<section id="content4">
<h3 class="setting">Shipping</h3>
<p>

We exclusively use federal experess or ups for shipment within the U.S. We use a specialized Diamond Shipping Company for Europe and Australia. Fees include insurance (required with every shipment). All packages require signatures.<br /><br />
$29 USD FOR U.S. DOMESTIC (50 STATES) FED EX 2-DAY SHIPPING<br />
$39 USD FOR U.S. DOMESTIC FED EX OVERNIGHT SHIPPING<br />
$59 USD FOR U.S. DOMESTIC FED EX SATURDAY DELIVERY<br />
$89 USD FOR CANADA FED EX SHIPPING<br />
$99 USD FOR EUROPE AND AUSTRALIA<br />
Please contact us if you wish to make alternative shipping arrangements.<br />
<br />
We are respectful of all events and occasions and try to meet all deadlines. Please indicate to us if you have special plans or an event.<br />
<br />
<b>DISCLAIMER:</b><BR>
Items are not ready to be shipped at time of purchase. In order to maintain the highest quality of craftmanship, we consider every order to be custom. Please allow for 5-10 business to receive item(s). Customized items may take longer.

</p>
</section>
<section id="content5">
<h3 class="setting">Refund Policy / Exchanges</h3>
<p>
WE STAND BY OUR MERCHANDISE 100% AND OFFER 100% MONEY BACK WITHOUT A RESTOCKING FEE (UNLESS THE ITEM HAS BEEN CUSTOM MADE AND/OR MODIFIED - CHECK BELOW) BUYER HAS SEVEN (7) DAYS TO NOTIFY CALIFORNIA JEWELERS OF THEIR DESIRE TO RETURN AND OR FIX THEIR ITEM(S)<BR><br />

BUYER IS RESPONSIBLE FOR PACKING THEIR OWN PACKAGES AND RETURNING THE ITEM IN THE SAME CONDITION IT WAS SHIPPED. ITEMS THAT HAVE BEEN DAMAGED WILL NOT BE REFUNDED<BR><br />
RESIZING AND ENGRAVING WILL NOT BE CONSIDERED DAMAGING TO THE PRODUCT AND ARE ELIGIBLE FOR REFUNDS<BR><br />
PLEASE NOTE: ITEMS THAT HAVE BEEN COSTUMED AND/OR MODIFIED ARE SUBJECTED TO A 20% RESTOCKING FEE.

</p>
</section>

<section id="content6">
<h3 class="setting">Upgrades / Trade-ins</h3>
<p>We are diamond cutters and wholesalers, we have many more stones to choose from that are not listed on the internet. 99% Of our stones are EGL or GIA certified.<BR><br />

If you want to trade-in a purchase made with us for an upgrade, we will buy back your item for what you paid for it and charge the difference
Please ask about upgrades to Platinum<BR><br />
Earrings are availble in screw-back or push-back posts . Same price!!!</p>
</section>

<section id="content7">
<h3 class="setting">Contact info</h3>
<p>

Didn\'t find what you are looking for?<BR><BR>
We carry over 50,000 diamonds in stock. Call us for a quote! <BR><BR>
Please call us if you have any questions on any of our item(s) on Ebay<BR><BR>
Our business hours are 7 AM - 9 PM PST.<BR><BR>
</p>
</section>

</main></td>
</tr>
<!-- tabs  -->  
  
</tbody></table></div></div></div></div></body></html>';

   // print_r($watchdetails); exit;

        if (get_magic_quotes_gpc()) {
            // print "stripslashes!!! <br>\n";
            $requestArray['itemDescription'] = stripslashes($watchdetails);
        } else {
            $requestArray['itemDescription'] = $watchdetails;
        }
        $requestArray['ItemSpecification'] = $this->getJewelryItemSpecification($item_details['id']);
        
        $requestArray['AttributeArray'] = $this->adminmodel->get_attribute('');
        $listing_duration = 'Days_' . $duration;
        $requestArray['listingDuration'] = $listing_duration;
        $requestArray['startPrice'] = round($item_details['price']); //round($salesPrice);
        $requestArray['buyItNowPrice'] = round($item_details['price']); //round($salesPrice);
        $requestArray['quantity'] = '1';
        $requestArray['storeCategoryID'] = $storeCategoryId;
        $requestArray['lot'] = $item_details['id'];
        $requestArray['itemID'] = $item_details['ebayid'];
        $requestArray['itemTitle'] = $item_details['product_name'];
        $requestArray['replace_gurantee'] = 'Days_14';
        $requestArray['ring_id'] = $item_details['id'];
        $requestArray['category_id'] = $item_details['category'];
        //$requestArray['image1'] = config_item('base_url') . $diamondpic;
        $requestArray['image1'] = $results_img[0]['image'];
        $requestArray['image2'] = $results_img[1]['image'];
//echo "</pre>"; print_r($requestArray); echo "<br>Type".$type."</pre>";
        if (!empty($detail['ebayid']) && $detail['ebayid'] != '-2' && $ebayRequest != 'ReviseItem') {
            //$itemID = $this->adminmodel->updateRequestEbay1($requestArray, $type);
        } else {
            $itemID = $this->sendItemJewelryToEbay($requestArray, $type, 'accent', $ebayRequest);
        }
        return $itemID;
    }
    
    function getJewelryItemSpecification($product_id) {
     
        $results = $this->itemjewelrymodel->getItemSpecification($product_id);
        $specList = itemJewelerySpecList( $results );        
   
        $specification = '<ItemSpecifics>';
        
        if( count($specList) > 0 ) {
            foreach( $specList as $label => $colvalue ) {
                if( !empty($colvalue) ) {
                    $specification .= '<NameValueList> 
                                  <Name>'.$label.'</Name>
                                  <Value>' . $colvalue . '</Value> 
                            </NameValueList>';
                }                
            }            
        }        
        
        $specification .= '</ItemSpecifics>';
        $specification .= '<ConditionID>1000</ConditionID>';
        return $specification;
    }
    
    function sendItemJewelryToEbay($requestArray, $section = 'watches', $category = 'accent', $ebayRequests) {
        global $userToken, $devID, $appID, $certID, $serverUrl, $compatabilityLevel,$production,$ebay_paypal_email,$shipping_salestax_and_jurisdiction,$location;
        include_once 'application/helpers/eBaySession.php';
        include_once 'application/helpers/keys.php';
        //pr, 17July,2015
        $this->adminmodel->validateTestUserRegistration();
        $requestArray['replace_gurantee'] = "Days_30";
        //pr("@sendRequestEbay1--include","exit");
        $siteID = 0;
        //for AddItemRequest, specify "AddItem" (without "Request") in this call name header.
        $verb = $ebayRequests; /// AddItem or ReviseItem 
        $addItemsRequest = $ebayRequests.'Request';
        ////// Autopaye : True: immediate payemnt is on and False: immediate payment is off
        $setAutoPay = 'false'; //( $requestArray['startPrice'] < 10000 ? 'true' : 'false' );
        $compatabilityLevel = 601;
        $requestXmlBody = '';
        $requestArray['listingType'] = "FixedPriceItem";
        $requestXmlBody = '<?xml version="1.0" encoding="utf-8" ?>';
        //$requestXmlBody .= '<AddItemRequest xmlns="urn:ebay:apis:eBLBaseComponents">';
        $requestXmlBody .= '<'.$addItemsRequest.' xmlns="urn:ebay:apis:eBLBaseComponents">';
        $requestXmlBody .= '<DetailLevel>ReturnAll</DetailLevel>';
        $requestXmlBody .= '<ErrorLanguage>en_US</ErrorLanguage>';
        $requestXmlBody .= "<Version>$compatabilityLevel</Version>";
        $requestXmlBody .= '<Item>';
        $requestXmlBody .= '<Country>US</Country>';
        $requestXmlBody .= '<Currency>USD</Currency>';
        $requestXmlBody .= "<Description><![CDATA[" . $requestArray['itemDescription'] . "]]></Description>";
        $requestArray['ebay_upload_type'] = 'bestoffer';
        
        $requestXmlBody .= "<ListingType>" . $requestArray['listingType'] . "</ListingType>";
        $requestXmlBody .= "<ListingDuration>" . $requestArray['listingDuration'] . "</ListingDuration>";
        $requestXmlBody .= '<Location><![CDATA[US]]></Location>';
        
        $requestXmlBody .= '<PaymentMethods>VisaMC</PaymentMethods>';
        $requestXmlBody .= '<PaymentMethods>Discover</PaymentMethods>';
        $requestXmlBody .= '<PaymentMethods>AmEx</PaymentMethods>';
        $requestXmlBody .= '<PaymentMethods>CreditCard</PaymentMethods>';
        $requestXmlBody .= '<PaymentMethods>PayPalCredit</PaymentMethods>';
        $requestXmlBody .= '<PaymentMethods>PayPal</PaymentMethods>';
        $requestXmlBody .= '<PayPalEmailAddress>'.$ebay_paypal_email.'</PayPalEmailAddress>';
        $requestXmlBody .= '<PrimaryCategory>';
        $requestXmlBody .= '<CategoryID>' . $requestArray['primaryCategory'] . '</CategoryID>';
        $requestXmlBody .= '</PrimaryCategory>';
        $requestXmlBody .= '<PrivateListing>true</PrivateListing>';
        $requestArray['ebay_upload_type'] = '';
        $requestXmlBody .= $requestArray['ItemSpecification'];
        $requestXmlBody .= "<BuyItNowPrice currencyID=\"USD\">0.00</BuyItNowPrice>";
        $requestXmlBody .= "<Quantity>" . $requestArray['quantity'] . "</Quantity>";
        $requestXmlBody .= '<DispatchTimeMax>3</DispatchTimeMax>';
        $requestXmlBody .= '<AutoPay>'.$setAutoPay.'</AutoPay>';
        $requestXmlBody .= "<StartPrice>" . round($requestArray['startPrice']) . "</StartPrice>";
        if (strlen($requestArray['itemTitle']) > 80) {
            $title = substr($requestArray['itemTitle'], 0, 80);
        } else {
            $title = $requestArray['itemTitle'];
            $length = strlen($requestArray['itemTitle']);
            $loop = 80 - $length;
            $title = $requestArray['itemTitle'];
            $string1 = '';
            $loop = $loop / 6;
            for ($k = 0; $k < $loop - 1; $k++) {
                $string1 = $string1 . "      ";
            }
            $title = $title . $string1;
        }
        //$requestXmlBody .= "<Title><![CDATA[".($requestArray['itemTitle'])."]]></Title>";
        $requestXmlBody .= "<Title><![CDATA[" . ($title) . "]]></Title>";
        if(!empty($requestArray['subTitle'])) {
            $subtitle=substr(strip_tags($requestArray['subTitle']),0,55);
            $requestXmlBody .= "<SubTitle><![CDATA[" . $subtitle . "]]></SubTitle>";
        }
        $requestXmlBody .= "<SKU>" . (string)$requestArray['productID'] . "</SKU>";
        $requestXmlBody .= '<ShippingTermsInDescription>True</ShippingTermsInDescription>';
        $requestXmlBody .= '<ShippingType>FlatDomesticCalculatedInternational</ShippingType><ThirdPartyCheckout>false</ThirdPartyCheckout>';
        $requestXmlBody .= '<ReturnPolicy>
            <ReturnsAcceptedOption>ReturnsAccepted</ReturnsAcceptedOption>
            <RefundOption>MoneyBack</RefundOption>
            <ReturnsWithinOption>' . $requestArray['replace_gurantee'] . '</ReturnsWithinOption>
            <Description>PLEASE VISIT OUR EBAY STORE FOR A DETAILED RETURN POLICY.</Description>
              <ShippingCostPaidByOption>Buyer</ShippingCostPaidByOption>
              <ShippingCostPaidBy>Buyer</ShippingCostPaidBy>
    </ReturnPolicy>
    <ShippingDetails>
          <GlobalShipping>true</GlobalShipping>
          <ApplyShippingDiscount>false</ApplyShippingDiscount>
          <SalesTax>
          <SalesTaxPercent>8</SalesTaxPercent>
          <SalesTaxState>'.$shipping_salestax_and_jurisdiction.'</SalesTaxState>
          <ShippingIncludedInTax>true</ShippingIncludedInTax>
          </SalesTax>
          <ShippingServiceOptions>
          <ShippingService>USPSFirstClass</ShippingService>
          <ShippingServiceCost>0.00</ShippingServiceCost>
          <ShippingServiceAdditionalCost>0.00</ShippingServiceAdditionalCost>
          <ShippingServicePriority>1</ShippingServicePriority>
          <FreeShipping>true</FreeShipping>
          <ExpeditedService>false</ExpeditedService>
          <ShippingTimeMin>1</ShippingTimeMin>
          <ShippingTimeMax>6</ShippingTimeMax>
          <FreeShipping>true</FreeShipping>
          </ShippingServiceOptions>
          <ShippingServiceOptions>
          <ShippingService>USPSPriority</ShippingService>
          <ShippingServiceCost>8.99</ShippingServiceCost>
          <ShippingServiceAdditionalCost>0.00</ShippingServiceAdditionalCost>
          <ShippingServicePriority>2</ShippingServicePriority>
          <ExpeditedService>false</ExpeditedService>
          <ShippingTimeMin>1</ShippingTimeMin>
          <ShippingTimeMax>3</ShippingTimeMax>
          </ShippingServiceOptions>
          <ShippingServiceOptions>
          <ShippingService>USPSExpressMail</ShippingService>
          <ShippingServicePriority>3</ShippingServicePriority>
          <ShippingServiceCost>29.99</ShippingServiceCost>
          <ShippingServiceAdditionalCost>0.00</ShippingServiceAdditionalCost>
          <ExpeditedService>false</ExpeditedService>
          <ShippingTimeMin>1</ShippingTimeMin>
          <ShippingTimeMax>6</ShippingTimeMax>
          </ShippingServiceOptions>
          <InternationalShippingServiceOption>
          <ShippingService>USPSExpressMailInternational</ShippingService>
          <ShippingServiceCost>55.00</ShippingServiceCost>
          <ShippingServiceAdditionalCost>0.00</ShippingServiceAdditionalCost>
          <ShippingServicePriority>1</ShippingServicePriority>
          <ShipToLocation>Europe</ShipToLocation>
          <ShipToLocation>Asia</ShipToLocation>
          <ShipToLocation>CA</ShipToLocation>
          <ShipToLocation>GB</ShipToLocation>
          <ShipToLocation>AU</ShipToLocation>
          <ShipToLocation>DE</ShipToLocation>
          <ShipToLocation>JP</ShipToLocation>
          </InternationalShippingServiceOption>
          <TaxTable>
                <TaxJurisdiction>
                  <JurisdictionID>'.$shipping_salestax_and_jurisdiction.'</JurisdictionID>
                  <SalesTaxPercent>0.00</SalesTaxPercent>
                  <ShippingIncludedInTax>true</ShippingIncludedInTax>
                </TaxJurisdiction>
          </TaxTable>
         </ShippingDetails>';
        ///$requestArray['image2'] is the large image
        $ebay_main_image=(!empty($requestArray['image1']) ? $requestArray['image1'] : $requestArray['image2']);
        $result_img = $this->itemjewelrymodel->get_item_imgs( $item_details['id'] );
        
        if (!empty($ebay_main_image)) { 
            $requestXmlBody .= '<PictureDetails><GalleryType>Gallery</GalleryType>
                                          <GalleryURL>' . SITE_URL . $ebay_main_image . '</GalleryURL>';
            $requestXmlBody .= '<PictureURL>' . $ebay_main_image . '</PictureURL>';
        }
        if (!empty($ebay_main_image)) {
            $requestXmlBody .= '<PictureURL>' . $ebay_main_image . '</PictureURL>';
        }
        
        if( count($result_img) > 0 ) {
            foreach( $result_img as $rowimg ) {
                $requestXmlBody .= '<PictureURL>' . SITE_URL . $rowimg['image'] . '</PictureURL>';
            }
        }
        
        if (!empty($ebay_main_image)) {
            $requestXmlBody .= '</PictureDetails>';
        }
        if ($category == "accent") {
            $ccid = 4520584010;
        } else {
            $ccid = 4520584010;
        }
        //$ccid='640142919';
        //echo "category ID".$ccid;
        $requestXmlBody .= '<Storefront>
          <StoreCategoryID>' . $requestArray['storeCategoryID'] . '</StoreCategoryID>
          </Storefront>';
        $requestXmlBody .= '<RegionID>0</RegionID>';
        $requestXmlBody .= '</Item>';
        $requestXmlBody .= "<RequesterCredentials><eBayAuthToken>$userToken</eBayAuthToken></RequesterCredentials>";
        $requestXmlBody .= '</'.$addItemsRequest.'>';
        //file_put_contents("additem_requests.txt",$requestXmlBody,FILE_APPEND);
        //$requestXmlBody .= '</'.$addItemRequest.'>';
        //echo '<pre>'; print_r($requestXmlBody); echo '</pre>';
        $session = new eBaySession($userToken, $devID, $appID, $certID, $serverUrl, $compatabilityLevel, $siteID, $verb);
        $responseXml = $session->sendHttpRequest($requestXmlBody);
        if (stristr($responseXml, 'HTTP 404') || $responseXml == '')
            die('<P>Error sending request');
        //Xml string is parsed and creates a DOM Document object
        $responseDoc = new DomDocument();
        $responseDoc->loadXML($responseXml); //print_ar($responseDoc);
        
    if($ebayRequests != 'ReviseItem') {
            $responses = $responseDoc->getElementsByTagName("AddItemResponse");
            foreach ($responses as $response) {
                $acks = $response->getElementsByTagName("Ack");
                $ack = $acks->item(0)->nodeValue;
                //echo "Ack = $ack <BR />\n"; // Success if successful
            }
            //get any error nodes
            $errors = $responseDoc->getElementsByTagName('Errors');
            if ($ack == 'Failure') {
                foreach ($errors AS $error) {
                    $SeverityCode = $error->getElementsByTagName('SeverityCode');
                    //echo '<br>'.$SeverityCode->item(0)->nodeValue;
                    if ($SeverityCode->item(0)->nodeValue == 'Error') {
                        $status = '<P><B>eBay returned the following error(s):</B>';
                        //display each error
                        //Get error code, ShortMesaage and LongMessage
                        $code = $error->getElementsByTagName('ErrorCode');
                        $shortMsg = $error->getElementsByTagName('ShortMessage');
                        $longMsg = $error->getElementsByTagName('LongMessage');
                        //Display code and shortmessage
                        $status .= '<P>' . $code->item(0)->nodeValue . ' : ' . str_replace(">", "&gt;", str_replace("<", "&lt;", $shortMsg->item(0)->nodeValue));
                        //if there is a long message (ie ErrorLevel=1), display it
                        if (count($longMsg) > 0)
                            $status .= '<BR>' . str_replace(">", "&gt;", str_replace("<", "&lt;", $longMsg->item(0)->nodeValue));
                    }
                }
                return $status;
            } else { //no errors
                //   echo '<br>'.die('ppt');
                //get results nodes
                $responses = $responseDoc->getElementsByTagName("AddItemResponse");
                //file_put_contents("additem_response.txt",$responses,FILE_APPEND);
                
                foreach ($responses as $response) {
                    $acks = $response->getElementsByTagName("Ack");
                    $ack = $acks->item(0)->nodeValue;
                    //echo "Ack = $ack <BR />\n";   // Success if successful
                    $endTimes = $response->getElementsByTagName("EndTime");
                    $endTime = $endTimes->item(0)->nodeValue;
                    //echo "endTime = $endTime <BR />\n";
                    $itemIDs = $response->getElementsByTagName("ItemID");
                    $itemID = $itemIDs->item(0)->nodeValue;
                    $itemID = trim($itemID);
                    // echo "itemID = $itemID <BR />\n";
                    if(!$production) {
                       $linkBase = "http://cgi.sandbox.ebay.com/ws/eBayISAPI.dll?ViewItem&item="; 
                    }
                    else{
                        $linkBase = "http://cgi.ebay.com/ws/eBayISAPI.dll?ViewItem&item="; 
                    }
                    $status = "<a href=$linkBase" . $itemID . " target='_blank'>" . $requestArray['itemTitle'] . "</a> <BR />";
                    $feeNodes = $responseDoc->getElementsByTagName('Fee');
                    foreach ($feeNodes as $feeNode) {
                        $feeNames = $feeNode->getElementsByTagName("Name");
                        if ($feeNames->item(0)) {
                            $feeName = $feeNames->item(0)->nodeValue;
                            $fees = $feeNode->getElementsByTagName('Fee'); // get Fee amount nested in Fee
                            $fee = $fees->item(0)->nodeValue;
                            if ($fee > 0.0) {
                                if ($feeName == 'ListingFee') {
                                    $status .= "<B>$feeName :" . number_format($fee, 2, '.', '') . " </B><BR>\n";
                                } else {
                                    $status .= "$feeName :" . number_format($fee, 2, '.', '') . " </B><BR>\n";
                                }
                            } // if $fee > 0
                        } // if feeName
                    } // foreach $feeNode
                    $status = "Item successfully added to Ebay.<br>click here to view this: ".$status;
                    
                } // foreach response
//                if( !empty($itemID) ) {
//                        $this->addDiscountToEbayListing( $itemID );
//                }
        if( !empty($itemID) ) {
            $this->db->where('id', $requestArray['ring_id']);
                $this->db->update($this->config->item('table_perfix') . 'ebay_items', array(
                    'ebayid' => $itemID,
                ));
            }
        }
    }
        //if $errors->length > 0
        return $status;
        //return 'Request: <br>'.$requestXmlBody.'<br>Response:'.print_r($responses);
    }
}
<?php
	
	///// set tabs
	function policiesTabs() {
		
		$returnTabs = '<div class="accordion">
                  <div class="accordion-section"> <a class="accordion-section-title active" href="#accordion-1">Shipping Policy</a>
                    <div id="accordion-1" class="accordion-section-content open" style="display:block;">
                      <p>Shipping Time -- Most orders ship within 24 hours of being approved, provided the product ordered is in stock. Orders are not processed or shipped on Saturday or Sunday, except by prior arrangement.</p>
</p>We cannot guarantee when an order will be delivered. Consider any shipping or transit time offered to you or other parties only as an estimate. We encourage you to order in a timely fashion to avoid delays caused by shipping or product availability.</p>
                    </div>
                    <!--end .accordion-section-content--> 
                  </div>
                  <div class="accordion-section"> <a class="accordion-section-title" href="#accordion-2">Upgrade Policy</a>
                    <div id="accordion-2" class="accordion-section-content">
                      <p>Coming Soon...</p>
                    </div>
                    <!--end .accordion-section-content--> 
                  </div>
                  <div class="accordion-section"> <a class="accordion-section-title" href="#accordion-3">Inspection Period and Return Policy</a>
                    <div id="accordion-3" class="accordion-section-content">
                      <p><span mce_style="font-size: 10pt;">We ensure that our fine diamond jewelry meets or exceeds your desires and expectations. To further show our commitment, we have put in place a 14-DAY MONEY BACK return policy. If, for any reason, you do not wish to keep your purchase, you may return it for an item exchange or store credit or for a full refund within 14 days of the original purchase item arriving at your shipping location.<br />
</span><span mce_name="strong" mce_style="font-weight: bold;"><span mce_style="font-size: 10pt;"><br />
Returning an item</span></span></p>
<p mce_style="margin-left: 0.5in; text-indent: -0.25in;"><span mce_style="font-size: 10pt;">1.<span mce_style="font: 7pt ">     </span></span><span mce_style="font-size: 10pt;">Please contact us and let us know that you are returning an item or items, include any order numbers.</span></p><a href="'.config_item('base_url').'site/page/return_polices" target="_blank">Read More</a>
                    </div>
                    <!--end .accordion-section-content--> 
                  </div>
                  <div class="accordion-section"> <a class="accordion-section-title" href="#accordion-4">Pack to Back</a>
                    <div id="accordion-4" class="accordion-section-content">
                      <p>Coming Soon...</p>
                    </div>
                    <!--end .accordion-section-content--> 
                  </div>
                </div>';
				
			return $returnTabs;		
	}
	
	function ringsPoliciesTabs() {
		
		$returnTabs = '<div class="accordion">
                  <div class="accordion-section"> <a class="accordion-section-title active" href="#accordion-1">Shipping Cost & Times</a>
                    <div id="accordion-1" class="accordion-section-content open" style="display:block;">
                      <p>We offer FREE shipping on all orders over $149 within the continental U.S. - all day, every day, no codes necessary.

FREE ground shipping on orders of $149 or more. All orders not customized are shipped with in 10 business days or less.</p>
					<div><a href="'.config_item('base_url').'site/page/shipping-cost">Read More</a></div>
                    </div>
                    <!--end .accordion-section-content--> 
                  </div>
                  <div class="accordion-section"> <a class="accordion-section-title" href="#accordion-2">Lifetime Upgrade</a>
                    <div id="accordion-2" class="accordion-section-content">
                      <p>Coming Soon...</p>
                      <!--<div><a href="'.config_item('base_url').'site/page/diamond-upgrade">Read More</a></div>-->
                    </div>
                    <!--end .accordion-section-content--> 
                  </div>
                  <div class="accordion-section"> <a class="accordion-section-title" href="#accordion-3">Terms and Conditions</a>
                    <div id="accordion-3" class="accordion-section-content">
                      <p>These terms and conditions apply to the '.getadmin_contact_info().' Web site located at '.getadmin_contact_info().', and all associated Web sites linked to '.getadmin_contact_info().' by '.getadmin_contact_info().', its subsidiaries and affiliates, including '.getadmin_contact_info().' sites around the world (collectively the Site). Please read these terms and conditions (the Terms and Conditions) carefully. BY USING THE SITE, YOU AGREE TO BE BOUND BY THESE TERMS AND CONDITIONS.</p>
                      <div><a href="'.config_item('base_url').'site/page/terms_conditions">Read More</a></div>
                    </div>
                    <!--end .accordion-section-content--> 
                  </div>
                  <div class="accordion-section"> <a class="accordion-section-title" href="#accordion-4">Privacy Policy</a>
                    <div id="accordion-4" class="accordion-section-content">
                      <p>This Privacy Policy governs the manner in which '.getadmin_contact_info().' collects, uses, maintains and discloses information collected from users (each, a "User") of the '.getadmin_contact_info().' website ("Site"). This privacy policy applies to the Site and all products and services offered by '.getadmin_contact_info().'.</p>
                      <div><a href="'.config_item('base_url').'site/page/privacypolicy">Read More</a></div>
                    </div>
                    <!--end .accordion-section-content--> 
                  </div>
                </div>';
				
			return $returnTabs;		
	}
	
?>
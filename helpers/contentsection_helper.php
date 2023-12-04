<?php

 //// heart about content
    function heart_about_row_content() {
        $rowcontent = '<div class="about_content_bk">
                <div class="about_heart_left about_block col-sm-5">
                    <div style="font-size:40px;background-color:#ffffff;color:#000000;padding:8px 70px;width:80%;margin:0px auto;line-height: 45px;text-transform: uppercase;"> '.get_site_contact_info('sites_title').'</div>
                    <br/>
                    <div>Shopping for an engagement ring can be overwhelming. '.get_site_contact_info('sites_title').' wants to educate you to help guide you to make the best decision for  such an important purchase.  We have the largest number of GIA Graduate  Gemologists and certified bench jewelers in the.  All of our  sales professionals receive continuing education so that we are the most  knowledgeable staff!  And we pass that knowledge on to you!</div><br>
     
                </div>
                <div class="about_heart_right about_block col-sm-6 pull-right">
                    <div class="about_heart_heading">'.get_site_contact_info('sites_title').'</div><br><br>
                    <div style="display:none;"><img src="'.SITE_URL.'img/heart_diamond/builder/heart_paypal_icon.jpg" alt="" /></div><br><br>
                    <div>'.get_site_contact_info('sites_title').' has several finance options to make your Shopping Experience with us simple and easy.</div>
                        <img src="'.SITE_URL.'uploads/111_sitelg_6b95b216-059b-43de-9e23-f3f38cf5d086.jpg" style="margin-top:14px;" width="130px" alt="'.get_site_contact_info('sites_title').'">
                </div>
                </div>
                <div class="clear"></div>';
        
        return $rowcontent;
    }

 //// heart about content
    function collections_about_row_content() {
        $rowcontent = '
                <div class="content_head">About '.get_site_contact_info('sites_title').' Diamond</div>
                <div>
                '.get_site_contact_info('sites_title').' specialize in the 
                creation and wholesale of a wide array of exquisite designs for Diamond Watches and Diamond Jewelry including Rings, 
                Earrings, Bracelets, Necklaces, Pendants, and more. We are proud to present an extensive collection of uniquely designed 
                items at highly Affordable, Factory-Direct prices. We offer a wide array of 10k, 14k and 18k gold that includes a selection
                 of White, Yellow or Pink (also called Rose Gold or Red Gold), as well as sterling silver and platinum options. 
                We strive for the highest degree of customer satisfaction by offering quality merchandise, amazing selection, 
                incredible prices, and one of the leading customer service departments in the industry that delivers business hours customer support.<br><br>
                
                We also specialize in custom orders and can create anything from custom hip hop pendants to custom engagement 
                rings to custom diamond watches, at factory-direct prices.
                </div><br>';
        
        return $rowcontent;
    }    
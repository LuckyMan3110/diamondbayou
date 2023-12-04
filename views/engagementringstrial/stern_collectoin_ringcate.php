<div id="main-container"> 
  <div class="breadtopred">
    <div class="topRedBar">
      <h1>Diamond Engagement Rings in 14k and 18k White Gold, Yellow Gold, Rose Gold and Platinum</h1>
    </div>
    <div class="breadcrumbs">
      <ul class="breadcrumb">
        <li class="home"> <a href="<?php echo SITE_URL; ?>" title="Diamond Jewelry Watches Home">Diamond Jewelry Watches Home</a> <span>&gt;</span> </li>
        <li class="current"> David Stern Collection </li>
      </ul>
    </div>
  </div>
  <div id="content-area">
    <div id="left-area"> 
      <script async="true" type="text/javascript" src="<?php echo DEMO_RETAIL_JS; ?>left_area.js"></script>
      <div class="leftmenu_block">
          <ul>
              <?php
                echo davidstern_left_menu( $category_id ); /// custome helper
    
            ?>
          </ul>
       </div>
      <script type="text/javascript">


jQuery(document).ready(function()
{     
	 jQuery("#firstpaneCat .menu_head_cat span").click(function()
      {  
		  var checkId = this.id; 
		  var text = jQuery('#'+checkId).html();		    
		  if(text == '+')		 
		  {
			   jQuery('#'+checkId).html('-');
		  }
		  else
		  {
		      jQuery('#'+checkId).html('+');
		  }
		  jQuery(this).next("ul.menu_body_cat").slideToggle(300).siblings("ul.menu_body_cat").slideUp("slow");
          jQuery(this).siblings();	        	
	   });
	 
});
</script>
      <div class="review-box testimonials">
        <div class="accordion-content">
          <div class="accordion-toggle"> Customer Reviews for&nbsp;Diamond Engagement Rings </div>
          <div class="vert simply-scroll-container">
            <div class="simply-scroll-back simply-scroll-btn simply-scroll-btn-up"></div>
            <div class="simply-scroll-forward simply-scroll-btn simply-scroll-btn-down"></div>
            <div class="simply-scroll-clip">
                <?php echo getYelpView(); ?>
              <div class="simply-scroll-list" style="">
                  <iframe src="<?php echo SITE_URL; ?>stullerygoldrings/productReviews" border="0" width="250" height="1510"></iframe>
              </div>
            </div>
          </div>
          
          <!-- //=============//Display google rich-snnipt rating Start	==========================// -->
          <div itemtype="http://data-vocabulary.org/Review-aggregate" itemscope="" itemprop="review">
            <meta content="37" itemprop="rating">
            <meta content="5" itemprop="count">
          </div>
          
          <!-- Display google rich-snnipt rating End --> 
        </div>
      </div>
      <script type="text/javascript">
(function(jQuery) {
	jQuery(function() { //on DOM ready
		jQuery("#scroller").simplyScroll({
			customClass: 'vert',
			orientation: 'vertical',
            auto: false,
            manualMode: 'loop',
			frameRate: 20,
			speed: 10

		});
	});
})(jQuery);
</script> 
      <script type="text/javascript">
// <![CDATA[
function newsLetterSubscribeForm(val) {
	var posturl = '<?php echo SITE_URL; ?>newsletter/subscriber/goisubscribe?email='+val;
	winCompare = new Window({className:'magento',title:'Sign up for special offers',id:'browser_window',url:posturl,destroyOnClose:true,width:650,height:476,minimizable:false,maximizable:false,showEffectOptions:{duration:0.4},hideEffectOptions:{duration:0.4}});
	winCompare.setZIndex(100);
		winCompare.showCenter(true);
}
// ]]>

function checkEmailss() {
	var email = document.getElementById('newsletter');
	var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if(!filter.test(email.value)) {
		alert('Please provide a valid email address');
		return false;
	}
	else {
		newsLetterSubscribeForm(email.value);
		return false;
	}
}
</script>
      <div class="block f-left">
        <div class="newsletter">
          <form action="" onSubmit="return checkEmailss();" method="post" id="newsletter-validate-detail">
            <input type="hidden" name="m" value="1100365236434">
            <input type="hidden" name="p" value="oi">
            <label for="newsletter">Sign up for special offers</label>
            <div class="input-box">
              <input type="text" name="email" id="newsletter" title="Sign up for our newsletter" class="input-text required-entry validate-email" value="Enter your email here" onBlur="replaceText(this,&#39;Enter your email here&#39;);" onFocus="clearText(this,&#39;Enter your email here&#39;);">
            </div>
            <div class="actions">
              <input type="submit" title="Subscribe" value="Subscribe">
            </div>
          </form>
        </div>
        <script type="text/javascript">
	//<![CDATA[
	var newsletterSubscriberFormDetail = new VarienForm('newsletter-validate-detail');
	//]]>
	</script> 
      </div>
      <div class="social-networking"> <span>Follow Us:</span> <br>
        <a href="#" target="_blank" title="DAVID STERN Diamond Jewelry Watches On Facebook"> 
        <img src="<?php echo DEMO_RETAIL_IMG; ?>facebook.png" width="48" height="48" alt="" title=""> </a> 
        <a href="#" target="_blank" title=""><img src="<?php echo DEMO_RETAIL_IMG; ?>twitter.png" width="48" height="48" alt="twitter" title=""> </a> 
        <a href="#" target="_blank" title=""> <img src="<?php echo DEMO_RETAIL_IMG; ?>pinit.png" width="48" height="48" alt="pinit" title=""> </a> 
        <a href="#" target="_blank" title=""> <img src="<?php echo DEMO_RETAIL_IMG; ?>gplus.png" width="48" height="48" alt="gplus" title=""> </a> </div>
    </div>
    <div id="mid-area">
      <script type="text/javascript">
jQuery(document).ready(function(){
	jQuery('.amsocial-side-image a').click(function(){
		jQuery('.coupon-btn').show();
	});
	jQuery('.amsocial-popup-close').click(function(){
		jQuery('.coupon-btn').hide();
	});
});
</script>
      <div class="coupon-btn" style="display:none;">
        <iframe id="amsocial_iframe" src="" class="amsocial-iframe" scrolling="auto" frameborder="0"></iframe>
      </div>
      <script type="text/javascript">
var amSocialIframeUrl = '<?php echo SITE_URL; ?>social/popup/';
</script>
      <script>
    window.fbAsyncInit = function() {
        FB.init({ appId: '539377236112720', 
            status: true, 
            cookie: true,
            xfbml: true,
            oauth: true});
    };
	
    (function() {
        var e = document.createElement('script'); e.async = true;
        e.src = document.location.protocol 
            + '//connect.facebook.net/en_US/all.js';
        document.getElementById('fb-root').appendChild(e);
    }());

    function aw_fb_login(){
       
        FB.getLoginStatus(function(response) {
            $('fb-loader').setStyle({ display: 'block' });
            if (response.status === 'connected') {
                aw_fb_login_a(response);       
            }else{
                FB.login(function(response) {
                    if (response.authResponse) {
                        aw_fb_login_a(response);
                    } else {
                        $('fb-loader').setStyle({ display: 'none' });
                    }
                },{scope:'publish_stream,user_birthday,email'});
            }
        });
    }

    function aw_fb_login_a(response){

        if (response.authResponse) {
            for(var key in response.authResponse) {
                var hiddenField = document.createElement("input");
                hiddenField.setAttribute("type", "hidden");
                hiddenField.setAttribute("name", key);
                hiddenField.setAttribute("value", response.authResponse[key]);
                $('fb-connect').appendChild(hiddenField);
            }
        }
        $('fb-connect').submit();
    }
</script>
      <div class="bredcrumbs-custom"><a href="<?php echo SITE_URL; ?>">&lt; Home</a></div>
      <input type="hidden" class="enter-price" name="min_price" id="min_price">
      <input type="hidden" class="enter-price" name="max_price" id="max_price">
      <div class="page-title category-title">
        <div class="cat-header">
          <h2 style="width:95%">David Stern Collection</h2>
          <div class="border"></div>
          <div class="side-text category-level1-desc">
            <div id="less_desc">Shopping for diamond engagement rings doesn't have to be an exhausting ordeal and empty your bank account in the process. Rather than spending weeks going from store to store in search of the right ring at a reasonable price, you can shop from the comfort of your home at <?php echo SITE_LABEL; ?>.com. At <?php echo SITE_LABEL; ?>.com, y<span class="moreellipses">...</span>&nbsp;<a href="Javascript:;" class="morelink mlink less">Read More</a></div>
            <div id="more_desc" style="display:none;">Shopping for <a href="<?php echo SITE_URL; ?>diamond-engagement-rings.aspx"><strong>diamond engagement rings</strong></a> doesn't have to be an exhausting ordeal and empty your bank account in the process. Rather than spending weeks going from store to store in search of the right ring at a reasonable price, you can shop from the comfort of your home at <?php echo SITE_LABEL; ?>.com. At <?php echo SITE_LABEL; ?>.com, you'll find a vast selection of diamond <a href="<?php echo SITE_URL; ?>diamond-engagement-rings.aspx">engagement rings</a> and other premium-quality jewelry at wholesale prices. This often translates into hundreds of dollars less than what you would have to pay at any retail store. Best of all, the old adage of "you get what you pay for" doesn't ring true here. All of our diamond jewelry is made with solid gold or Platinum and authentic diamonds of exceptional beauty. We never accept less than the very best, and neither should you.<a href="Javascript:;" class="morelink mlink">Read Less</a></div>
          </div>
        </div>
      </div>
      <div class="category-products">
        <div class="tp-c"></div>
        <div class="cat-container cat-list-custom">
          <div class="tp-c"></div>
          <div class="cat-cnt">
            <div class="cat-row"> <?php echo $ring_categoies; ?> </div>
          </div>
        </div>
        <p></p>
        <script type="text/javascript">
if (typeof jQuery == 'undefined')
{
    alert("Jquery library is not loaded. Please goto System > Configuration > Catalog > I-Quickshop and enable it.");
}
else
{
    jQuery(document).ready(function() {
        var tb_pathToImage = "<?php echo DEMO_RETAIL_IMG; ?>ajax-loader.gif";
        //tb_init('a.thickbox, area.thickbox, input.thickbox');//pass where to apply thickbox
        imgLoader = new Image();// preload image
        imgLoader.src = tb_pathToImage;
    });
	
	//close thick box on ESC key
	jQuery(this).keydown(function(e){
        if (e == null) { // ie
                keycode = event.keyCode;
        } else { // mozilla
                keycode = e.which;
        }
        if(keycode == 27){ // close
                top.tb_remove();
        }
	});
}

// Added by Amit JS on 06-NOV-2013 to notify empty page
//Modified by sujit on 24-02-14 to send email for partial search
jQuery(document).ready(function () {
	var partial = '';
	var par = jQuery.trim(partial);
	var page = getParameterByName('p');
	
	if(jQuery.trim(jQuery('.note-msg').text()) == 'There are no products matching the selection.') {
		jQuery.post(BASE_URL+'/feeds/sendnotification.php',{purl:'<?php echo SITE_URL; ?>diamond-engagement-rings.aspx',fpc_id:'15'},function(res) {
			if(res=='success') {
				window.location.reload(true);
			}
		});
	}
	else if(par!='' && page=='') {
		//alert(page);
		jQuery.post(BASE_URL+'/feeds/sendnotification.php',{ptext:'',partialtext:par,surl:'<?php echo SITE_URL; ?>diamond-engagement-rings.aspx',fpc_id:''},function(res) {
			if(res=='success') {
				window.location.reload(true);
			}
		});
	}
	else {
		viewMoreLess();
		reviewSlider();
	}
});
function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}
</script>
        <div class="bt-c"></div>
      </div>
    </div>
    <div id="right-area">
      <div id="comparecontent">
        <div id="comparecontent">
          <div class="block block-compare">
            <div class="block-title"> <strong><span class="white">Compare Products </span></strong> </div>
            <div class="block-content">
              <p class="empty">You have no items to compare.</p>
            </div>
          </div>
        </div>
      </div>
      <script>
function clearCompareData(){
	if(confirm('Are you sure you would like to remove all products from your comparison?')){	
	jQuery.post('/catalog/product_compare/clear',function(res){
		window.location.reload();
	});
}

}

function removeComparepPoductData(url){
	
	if(confirm('Are you sure you would like to remove this item from the comparison list?')){	
		jQuery.post(url, { ajax: 1 },function(res){
			window.location.reload();
		});
	}

}


</script>
      <div id="topseller">
        <div class="rightpanel-block">
          <hr class="hr-001">
        </div>
        <h2>Newest</h2>
        <ul class="top-seller">
            <?php echo $similar_products; ?>
        </ul>
      </div>
    </div>
  </div>
</div>
<input type="hidden" name="liting_class" id="liting_class" value="qualitygoldrings" />

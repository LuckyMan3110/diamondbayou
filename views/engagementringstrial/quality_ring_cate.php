<link type="text/css" rel="stylesheet" href="<?php echo SITE_URL; ?>css/home_style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>demo_retail/retaildemo_css/style.css" media="all">
<link type="text/css" href="<?php echo SITE_URL; ?>css/steps_bar_section.css" rel="stylesheet" />

<div id="main-container" class="container"> 
  <div class="breadtopred">
    <div class="topRedBar">
      <h1>Diamond Engagement Rings in 14k and 18k White Gold, Yellow Gold, Rose Gold and Platinum</h1>
    </div>
    <div class="breadcrumbs">
      <ul class="breadcrumb">
        <li class="home"> <a href="<?php echo SITE_URL; ?>">Home</a> <span>&gt;</span> </li>
        <li class="home"> <a href="<?php echo SITE_URL; ?>heartdiamond/heart_collection" title="<?php echo SITES_NAME; ?> Collection"><?php echo SITES_NAME; ?> Collection</a> <span>&gt;</span> </li>
        <?php echo $bread_crumb_link; ?>
      </ul>
    </div>
  </div>
  <div id="content-area">
    <div id="">
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
          <h2 style="width:95%"><?php echo $category_title['cate_title']; ?></h2>
          <div class="border"></div>
          <div class="side-text category-level1-desc">
            <div id="less_desc">Welcome to <?php echo $category_title['cate_title']; ?> Products. Shopping for diamond engagement rings doesn't have to be an exhausting ordeal and empty your bank account in the process. Rather than spending weeks going from store to store in search of the right ring at a reasonable price, you can shop from the comfort of your home at <?php echo SITE_LABEL; ?>.com. At <?php echo SITE_LABEL; ?>.com, y<span class="moreellipses">...</span>&nbsp;<a href="Javascript:;" class="morelink mlink less">Read More</a></div>
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
  </div>
</div>
<input type="hidden" name="liting_class" id="liting_class" value="qualitygoldrings" />

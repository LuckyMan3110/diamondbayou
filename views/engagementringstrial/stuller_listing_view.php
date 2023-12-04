<!-- saved from url=(0098)<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx -->

<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>demo_retail/retaildemo_css/style.css" media="all">

<div id="main-container"> 
  <script type="text/javascript">
 
$(".slideUpbox").click(function () {
   $(this).slideUp(2000);
});

</script>
  <div id="socialpopuparea"></div>
  <div class="breadtopred">
    <div class="topRedBar">
      <h1>Diamond Engagement Rings in 14k and 18k White Gold, Yellow Gold, Rose Gold and Platinum</h1>
    </div>
    <div class="breadcrumbs">
      <ul class="breadcrumb">
        <li class="home"> <a href="<?php echo SITE_URL; ?>" title="Fine Jewelry">Fine Jewelry</a> <span>&gt;</span> </li>
        <?php if ( $ringsCate != 1 ) {
            echo '<li class="home"> <a href="#" title="'.$ringsCate.'">'.$ringsCate.'</a> </li>';
        }
        ?>
      </ul>
    </div>
  </div>
  <div id="content-area">
    <div id="left-area"> 
      <script async="true" type="text/javascript" src="<?php echo DEMO_RETAIL_JS; ?>left_area.js"></script>
      <?php //echo '<div id="acordianMenu" class="leftmenu_block">'.accordian_left_menu().'</div>';    // function in custome helper ?>
<!--      <div class="leftnavigation nav-new-zindex" id="vertNavHomeLeft" onmouseover="addRemoveClassHome(1)" onmouseout="addRemoveClassHome(0)">
        <ul id="nav_vert1">
          <li class="bgnone">
            <ul>
              <?php
            //echo retail_left_menu(); /// custome helper
    
            ?>
            </ul>
          </li>
        </ul>
      </div>-->
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
      
      <!-- <link rel="stylesheet" href="" /> --> 
      <!-- End--> 
      <script type="text/javascript">
jQuery(document).ready(function()
{     
  
	 jQuery(document).on("click",".menu_head_pro",function()
      {   
		  if(jQuery(window).width() <= 800) 
          { 
		   //jQuery.getScript("<?php echo SITE_URL; ?>js/jquery-1.9.1.min.js"); 
		 
		  jQuery(this).next("ul.menu_body_pro").slideToggle(300).siblings("ul.menu_body_pro").slideUp("slow");
		  jQuery('#body_'+checkPid).slideToggle(300);
          jQuery(this).siblings();	        	
	  
	   }
	   });
	
});
function setListingPage(option_value) {
         window.location = option_value;
     }
</script> 
      <script type="text/javascript">	 
jQuery(function() {

	jQuery("#diamond_weight-slider-range").slider({
		range:true,
		min:0.00,
		max:0,
		values:[0.00,0],
		step:.1,
		
		slide:function(event,ui) {
				jQuery('#diamond_weight_range').html(ui.values[0]+' - '+ui.values[1]);
				jQuery('#min_diamond_weight').html(ui.values[0]);
				jQuery('#max_diamond_weight').html(ui.values[1]);
		},
		change:function(event,ui) {
		url = getUrl();			
		showLoaderNav();
		jQuery.post(url,function(res) {
				
				hideLoaderNav();
				var content = jQuery( res ).find( ".category-products" ).html();
				jQuery( ".category-products" ).empty().append( content );
				
				// add js file for lazy load
					
				jQuery.getScript(BASE_URL+"skin/frontend/default/<?php echo SITE_LABEL; ?>/js/mgt_lazy_image_loader/lazy-image-loader.js");	
		        jQuery.getScript(BASE_URL+"skin/frontend/default/<?php echo SITE_LABEL; ?>/js/mgt_lazy_image_loader/common.js");	
		        
				//update pagination at top section 
				var pagingproduct = jQuery( res ).find(".amount-box").html();
				jQuery(".amount-box").empty().append(pagingproduct);	
				//end of update pagination at top section 
                                
                 	
				var newproducts = jQuery( res ).find( "#topseller" ).html();
				jQuery( "#topseller" ).empty().append( newproducts );
									
				var contentmetal = jQuery( res ).find( "#metal" ).html();
				jQuery( "#metal" ).empty().append(contentmetal);	
				if(contentmetal) {
					jQuery("#metal").show();
				}
				else {
					jQuery("#metal").hide();
				}		
				
				var contentgender = jQuery( res ).find( "#gender" ).html();
				jQuery( "#gender" ).empty().append(contentgender);
				if(contentgender) {
					jQuery("#gender").show();
				}
				else {
					jQuery("#gender").hide();
				}		
				
				var contentdiamond = jQuery( res ).find( "#diamond" ).html();
				jQuery( "#diamond" ).empty().append(contentdiamond);
				if(contentdiamond) {
					jQuery("#diamond").show();
				}
				else {
					jQuery("#diamond").hide();
				}		
				
				var contentbrand = jQuery( res ).find( "#brand" ).html();
				jQuery( "#brand" ).empty().append(contentbrand);
				if(contentbrand) {
					jQuery("#brand").show();
				}
				else {
					jQuery("#brand").hide();
				}		
				
				//jQuery(window).unbind('scroll');
				//StrategeryInfiniteScroll.init();
				
				window.history.pushState("string","",url.replace('ajax=1&',''));
			});
		}
	});
});

</script> 
      <script type="text/javascript">

 function getUrl(){
	 
			jQuery('#metalClearAll').hide();
			jQuery('#genderClearAll').hide();
			jQuery('#cleartyClearAll').hide();
			jQuery('#brandClearAll').hide();
			jQuery('#platingClearAll').hide();			
 
	    	var url='';	
			//var url = '<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?ajax=1';			
			var url = '<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?'; 
			if(jQuery('#diamond_weight_range').length > 0 ) {
				var diamondweightrange = jQuery('#diamond_weight_range').html();
				var diamondweightrangeArray = diamondweightrange.split(' - ');
				url = url+'&carat_weight='+diamondweightrangeArray[0]+'%2C'+diamondweightrangeArray[1];
				
			}	
			
			if(jQuery('#size_range').length > 0 ) {	
				var sizerange = jQuery('#size_range').html();
				var sizerangeArray = sizerange.split(' - ');				
				url = url+'&size_for_filter='+sizerangeArray[0]+'%2C'+sizerangeArray[1];			
			}
			
			if(jQuery('#price_range').length>0){
			var pricerange = jQuery('#price_range').html();
			var pricerangeArray = pricerange.split(' - ');  
			var res = pricerangeArray[0].replace('<a href="tel:', '');
			var res1 = pricerangeArray[1].replace('">'+res, '');
			url = url+'&price='+res+'%2C'+res1;
			//url = url+'&price='+pricerangeArray[0]+'%2C'+pricerangeArray[1];
		   }
   
			
			if(jQuery('#width_range').length>0){
				var widthrange = jQuery('#width_range').html();
				var widthrangeArray = widthrange.split(' - ');		
				url = url+'&width_for_filter='+widthrangeArray[0]+'%2C'+widthrangeArray[1];
			}
						
			var genderids = '';
			jQuery(".gender:checked").each(function(){
			 genderids += jQuery(this).val()+",";
			 	jQuery('#genderClearAll').show();
			});		
			genderids = genderids.substring(0, genderids.length - 1);
			if(genderids!=""){
				url = url+"&gender_for_filter="+genderids;
					
			}
			
			var platingids = '';
			jQuery(".plating:checked").each(function(){
			 platingids += jQuery(this).val()+",";
			 	jQuery('#platingClearAll').show();
			});		
			platingids = platingids.substring(0, platingids.length - 1);
			if(platingids!=""){
				url = url+"&watch_color="+platingids;
					
			}
			
			var clearityids = '' ;
			jQuery(".clearity:checked").each(function(){
			 clearityids += jQuery(this).val()+",";
			 jQuery('#cleartyClearAll').show();
			});			
			clearityids = clearityids.substring(0, clearityids.length - 1);
			if(clearityids!=""){
				url = url+"&average_clarity_for_filter="+clearityids;
			}
			
			
			var brandids = '' ;
			jQuery(".brand:checked").each(function(){
				brandids += jQuery(this).val()+",";
				jQuery('#brandClearAll').show();
			});	
		
			brandids = brandids.substring(0, brandids.length - 1);
			if(brandids!=""){
			url = url+"&brand="+brandids;	
			}
			var metalids = '' ;
				jQuery(".metal:checked").each(function(){
				metalids += jQuery(this).val()+",";
				jQuery('#metalClearAll').show();
				});			
				metalids = metalids.substring(0, metalids.length - 1);
			if(metalids!=""){
				url = url+"&met="+metalids ;
			}		
			
			var pagingValue = jQuery("#paging").val();
			if(pagingValue!=""){
				url = url+"&p="+pagingValue ;
			}
			
			var optionValue = jQuery("#sortingid option:selected").val();

			if(optionValue!=""){
				url = url+"&"+optionValue ;
			}
			
			jQuery('#resetall').show();
			
			return url ;
				
			 }
 
 // Reset paging on onchange option
  function getUrlSort(){
	 
			jQuery('#metalClearAll').hide();
			jQuery('#genderClearAll').hide();
			jQuery('#cleartyClearAll').hide();
			jQuery('#brandClearAll').hide();
			jQuery('#platingClearAll').hide();			
 
	    	var url='';	
			//var url = '<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?ajax=1';			
			var url = '<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?'; 
			if(jQuery('#diamond_weight_range').length > 0 ) {
				var diamondweightrange = jQuery('#diamond_weight_range').html();
				var diamondweightrangeArray = diamondweightrange.split(' - ');
				url = url+'&carat_weight='+diamondweightrangeArray[0]+'%2C'+diamondweightrangeArray[1];
				
			}	
			
			if(jQuery('#size_range').length > 0 ) {	
				var sizerange = jQuery('#size_range').html();
				var sizerangeArray = sizerange.split(' - ');				
				url = url+'&size_for_filter='+sizerangeArray[0]+'%2C'+sizerangeArray[1];			
			}
			
			if(jQuery('#price_range').length>0){
			var pricerange = jQuery('#price_range').html();
			var pricerangeArray = pricerange.split(' - ');  
			var res = pricerangeArray[0].replace('<a href="tel:', '');
			var res1 = pricerangeArray[1].replace('">'+res, '');
			url = url+'&price='+res+'%2C'+res1;
			//url = url+'&price='+pricerangeArray[0]+'%2C'+pricerangeArray[1];
		   }
   
			
			if(jQuery('#width_range').length>0){
				var widthrange = jQuery('#width_range').html();
				var widthrangeArray = widthrange.split(' - ');		
				url = url+'&width_for_filter='+widthrangeArray[0]+'%2C'+widthrangeArray[1];
			}
						
			var genderids = '';
			jQuery(".gender:checked").each(function(){
			 genderids += jQuery(this).val()+",";
			 	jQuery('#genderClearAll').show();
			});		
			genderids = genderids.substring(0, genderids.length - 1);
			if(genderids!=""){
				url = url+"&gender_for_filter="+genderids;
					
			}
			
			var platingids = '';
			jQuery(".plating:checked").each(function(){
			 platingids += jQuery(this).val()+",";
			 	jQuery('#platingClearAll').show();
			});		
			platingids = platingids.substring(0, platingids.length - 1);
			if(platingids!=""){
				url = url+"&watch_color="+platingids;
					
			}
			
			var clearityids = '' ;
			jQuery(".clearity:checked").each(function(){
			 clearityids += jQuery(this).val()+",";
			 jQuery('#cleartyClearAll').show();
			});			
			clearityids = clearityids.substring(0, clearityids.length - 1);
			if(clearityids!=""){
				url = url+"&average_clarity_for_filter="+clearityids;
			}
			
			
			var brandids = '' ;
			jQuery(".brand:checked").each(function(){
				brandids += jQuery(this).val()+",";
				jQuery('#brandClearAll').show();
			});	
		
			brandids = brandids.substring(0, brandids.length - 1);
			if(brandids!=""){
			url = url+"&brand="+brandids;	
			}
			var metalids = '' ;
				jQuery(".metal:checked").each(function(){
				metalids += jQuery(this).val()+",";
				jQuery('#metalClearAll').show();
				});			
				metalids = metalids.substring(0, metalids.length - 1);
			if(metalids!=""){
				url = url+"&met="+metalids ;
			}			
			
			var optionValue = jQuery("#sortingid option:selected").val();

			if(optionValue!=""){
				url = url+"&"+optionValue ;
			}
			
			jQuery('#resetall').show();
			
			return url ;
				
			 }

</script> 
      <script type="text/javascript">
	function resetAll(elementId,clearAllId){
	
		jQuery('#'+elementId+':checked').removeAttr('checked'); 
		url = getUrl();
		showLoaderNav();
		jQuery.post(url,function(res) {
			hideLoaderNav();
					var content = jQuery( res ).find( ".category-products" ).html();
					jQuery( ".category-products" ).empty().append( content );	
				    
				 // add js file for lazy load
					
				jQuery.getScript(BASE_URL+"skin/frontend/default/<?php echo SITE_LABEL; ?>/js/mgt_lazy_image_loader/lazy-image-loader.js");	
		        jQuery.getScript(BASE_URL+"skin/frontend/default/<?php echo SITE_LABEL; ?>/js/mgt_lazy_image_loader/common.js");	
		        
					//update pagination at top section 
					var pagingproduct = jQuery( res ).find(".amount-box").html();
					jQuery(".amount-box").empty().append(pagingproduct);	
					//end of update pagination at top section 
					
					var content2 = jQuery( res ).find( "#metal" ).html();
					jQuery( "#metal" ).empty().append(content2);	
				
					var content2 = jQuery( res ).find( "#gender" ).html();
					jQuery( "#gender" ).empty().append(content2);	
					
					var plating = jQuery( res ).find( "#plating" ).html();
					jQuery( "#plating" ).empty().append(plating);	

					var contentdiamond = jQuery( res ).find( "#diamond" ).html();
			
					jQuery( "#diamond" ).empty().append(contentdiamond);
					
					var contentbrand = jQuery( res ).find( "#brand" ).html();
					jQuery( "#brand" ).empty().append(contentbrand);	
				
				
				//jQuery(window).unbind('scroll');
				//StrategeryInfiniteScroll.init();	
			
				var isChecked = jQuery('#'+elementId).attr('checked')?true:false;
			
				if(isChecked==true){
					jQuery('#'+clearAllId).show();
				}else{
					jQuery('#'+clearAllId).hide();
				}
				
					
				
			});
	}
	
</script>
      <div class="review-box testimonials">
        <div class="accordion-content">
          <div class="accordion-toggle"> Customer Reviews for&nbsp;Preset Diamond Engagement Rings </div>
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
    </div>
      <div id="mid-area" class="stuller_listing"> 
      
      <!--    <div class="amsocial-side-image">
        <a href="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx#" onclick="amsocialPopupShow(); return false;"><img src="<?php echo DEMO_RETAIL_IMG; ?>be_social_sidebar.png" height="156" width="33" alt="Diamond Jewelry and Watches Coupons"></a>
    </div>--> 
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
      <div class="bredcrumbs-custom"><a href="<?php echo SITE_URL; ?>diamond-engagement-rings.aspx">&lt; Diamond Engagement Rings</a></div>
      <input type="hidden" class="enter-price" name="min_price" id="min_price">
      <input type="hidden" class="enter-price" name="max_price" id="max_price">
      <div class="page-title category-title">
        <div class="cat-header">
          <h2 style="width:95%"><?php 
          $cateTitle = ( ( $ringsCate == 1 || empty($ringsCate) ) ? '<?php echo SITE_LABEL; ?> Gold Rings' : $ringsCate );
            echo $cateTitle; 
          
            ?></h2>
          <div class="border"></div>
          <div class="side-text category-level1-desc">
            <div id="less_desc">Expressing love is something that Diamond Engagement Rings do well. Maybe it's the way the light shines off the sharp cut edges of the stones and glances off your eyes. Or maybe it's the sheer mechanical beauty of the perfect form of the ring. Whatever it is, Diamond Engagement Rings have always cap<span class="moreellipses">...</span>&nbsp;<a href="Javascript:;" class="morelink mlink less">Read More</a></div>
            <div id="more_desc" style="display:none;">
              <div id="less_desc">Expressing love is something that Diamond Engagement Rings do well. Maybe it's the way the light shines off the sharp cut edges of the stones and glances off your eyes. Or maybe it's the sheer mechanical beauty of the perfect form of the ring. Whatever it is, Diamond Engagement Rings have always cap<span class="moreellipses">...</span>&nbsp;<a href="Javascript:;" class="morelink mlink less">Read More</a></div>
              <div id="more_desc" style="display:none;">
                <p>Expressing love is something that <strong>Diamond Engagement Rings</strong> do well. Maybe it's the way the light shines off the sharp cut edges of the stones and glances off your eyes. Or maybe it's the sheer mechanical beauty of the perfect form of the ring. Whatever it is, <strong>Diamond Engagement Rings</strong> have always captured our hearts and minds as expressions of caring and trust. Diamonds have a reputation for being the hardest substance on earth and because of this, they are perfect symbols for standing up to the rough times life may have in store for you.</p>
                <p><span style="font-size: medium;"><em>Diamond Longevity</em></span></p>
                <p><strong>Diamond Engagement Rings</strong> are designed to stand the test of time. They are perfectly crafted and the stones used are of the top quality. They are made to outlive everything just like the feelings you have for your significant other is apt to do. As a statement of intent, you can't do any better than a <strong>Diamond Engagement Ring</strong>, simply because nothing comes close to representing perfection and longevity.</p>
                <p>Honestly, there are very few better ways to declare your everlasting love for someone than getting them a diamond ring set. The sheer beauty of the piece will stun with even the most casual glance to the piece. it is truly a representation of beauty and a true reflection of eternal love which will always remind about your feelings towards each other. A diamond is really forever.</p>
                <a href="Javascript:;" class="morelink mlink">Read Less</a></div>
              <a href="Javascript:;" class="morelink mlink">Read Less</a></div>
          </div>
        </div>
      </div>
      <div class="clear"></div>
      <script async="true" type="text/javascript" src="<?php echo DEMO_RETAIL_JS; ?>ring_listing_area.js"></script>
      <div class="amount-box">
        <div class="pager">
          <input type="hidden" id="paging" value="1">
          <p class="amount"> <?php echo $page_numb_hint; ?> </p>
          <div class="limiter">
            <label>Show</label>
            <div class="sort-show">
              <select id="perPageOptions" onchange="setListingPage(this.value)">
                  <?php
                   echo $page_options;
                  ?>
              </select>
            </div>
            per page </div>
          <div class="pages">
              <ul class="pagesList">
                  <?php echo $page_links; ?>
              </ul>
          </div>
          <script async="true" type="text/javascript" src="<?php echo DEMO_RETAIL_JS; ?>reset_paging_options.js"></script> 
          
          <!-- <script>topseller('?p=');</script> --> 
          
        </div>
      </div>
      <div id="pageLocator" class="toolbar" style="margin:3px 0 0;">
        <div class="pager">
          <div class="sort-by">
            <label>Sort By</label>
            <div class="sort-select">
              <select class="" id="" onchange="setListingPage(this.value)">
                  <?php echo $sorting_option; ?>
              </select>
            </div>
          </div>
          <div class="narrow-search"> 
            <!--<div id="slider_outer">
				<div class="s3"></div>
				<div style="padding: 0;">
					<div id="slider-range-price"></div>
				</div>
			</div>--> 
            
            <!-- For width attribute 28 April 2014-->
            
<!--            <div class="">
              <div class="price-sort-by">
                <dl id="narrow-by-list">
                  <dt class="last odd">Price ($):</dt>
                  <dd>
                    <ol style="width:100%; display:none">
                      <li style="float:left; margin-right:5px; font-weight:bold;">Range:</li>
                      <li id="price_range">99 - 255950</li>
                    </ol>
                    <ol style="width:100%;">
                      <li id="min_price_range">
                        <input size="5" type="text" id="prmin" value="99">
                      </li>
                      <li id="scale">
                        <div id="price-slider-range" style="width:100%;" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" aria-disabled="false">
                          <div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 0%; width: 100%;"></div>
                          <a class="ui-slider-handle ui-state-default ui-corner-all" href="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx#" style="left: 0%;"></a><a class="ui-slider-handle ui-state-default ui-corner-all" href="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx#" style="left: 100%;"></a>
                          <div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 0%; width: 100%;"></div>
                        </div>
                      </li>
                      <li id="max_price_range">
                        <input size="5" type="text" id="prmax" value="255950">
                      </li>
                    </ol>
                  </dd>
                </dl>
              </div>
            </div>-->
            <div>
              <div class="price-sort-by1">
                  <div class="metalBlock">
                <span>Metal:</span>
                <select name="rings_metal" onchange="setListingPage(this.value)">
                    <?php echo $rings_metal; ?>
                </select>
            </div>
              </div>
            </div>
            <div class="price-slider-values">
              <input type="hidden" id="price_slider_url" name="price_slider_url" value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx">
              <input type="hidden" id="init_price_minimum" name="init_price_minimum" value="99">
              <input type="hidden" id="init_price_maximum" name="init_price_maximum" value="255950">
              <input type="hidden" id="step_value" name="step_value" value="">
            </div>
            <div class="filter-loader">&nbsp;</div>
          </div>
          <div class="custom-pager" style="display:none;">
            <div class="prev-nextNaV" style="display:none;"> <span class="prev">« Prev</span>
              <select onchange="topseller1(this.value);">
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=1" selected="">Page 1 of 120</option>
                <!--<option value=""  selected >Page 1 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=2">Page 2 of 120</option>
                <!--<option value="" >Page 2 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=3">Page 3 of 120</option>
                <!--<option value="" >Page 3 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=4">Page 4 of 120</option>
                <!--<option value="" >Page 4 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=5">Page 5 of 120</option>
                <!--<option value="" >Page 5 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=6">Page 6 of 120</option>
                <!--<option value="" >Page 6 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=7">Page 7 of 120</option>
                <!--<option value="" >Page 7 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=8">Page 8 of 120</option>
                <!--<option value="" >Page 8 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=9">Page 9 of 120</option>
                <!--<option value="" >Page 9 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=10">Page 10 of 120</option>
                <!--<option value="" >Page 10 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=11">Page 11 of 120</option>
                <!--<option value="" >Page 11 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=12">Page 12 of 120</option>
                <!--<option value="" >Page 12 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=13">Page 13 of 120</option>
                <!--<option value="" >Page 13 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=14">Page 14 of 120</option>
                <!--<option value="" >Page 14 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=15">Page 15 of 120</option>
                <!--<option value="" >Page 15 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=16">Page 16 of 120</option>
                <!--<option value="" >Page 16 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=17">Page 17 of 120</option>
                <!--<option value="" >Page 17 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=18">Page 18 of 120</option>
                <!--<option value="" >Page 18 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=19">Page 19 of 120</option>
                <!--<option value="" >Page 19 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=20">Page 20 of 120</option>
                <!--<option value="" >Page 20 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=21">Page 21 of 120</option>
                <!--<option value="" >Page 21 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=22">Page 22 of 120</option>
                <!--<option value="" >Page 22 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=23">Page 23 of 120</option>
                <!--<option value="" >Page 23 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=24">Page 24 of 120</option>
                <!--<option value="" >Page 24 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=25">Page 25 of 120</option>
                <!--<option value="" >Page 25 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=26">Page 26 of 120</option>
                <!--<option value="" >Page 26 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=27">Page 27 of 120</option>
                <!--<option value="" >Page 27 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=28">Page 28 of 120</option>
                <!--<option value="" >Page 28 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=29">Page 29 of 120</option>
                <!--<option value="" >Page 29 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=30">Page 30 of 120</option>
                <!--<option value="" >Page 30 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=31">Page 31 of 120</option>
                <!--<option value="" >Page 31 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=32">Page 32 of 120</option>
                <!--<option value="" >Page 32 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=33">Page 33 of 120</option>
                <!--<option value="" >Page 33 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=34">Page 34 of 120</option>
                <!--<option value="" >Page 34 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=35">Page 35 of 120</option>
                <!--<option value="" >Page 35 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=36">Page 36 of 120</option>
                <!--<option value="" >Page 36 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=37">Page 37 of 120</option>
                <!--<option value="" >Page 37 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=38">Page 38 of 120</option>
                <!--<option value="" >Page 38 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=39">Page 39 of 120</option>
                <!--<option value="" >Page 39 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=40">Page 40 of 120</option>
                <!--<option value="" >Page 40 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=41">Page 41 of 120</option>
                <!--<option value="" >Page 41 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=42">Page 42 of 120</option>
                <!--<option value="" >Page 42 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=43">Page 43 of 120</option>
                <!--<option value="" >Page 43 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=44">Page 44 of 120</option>
                <!--<option value="" >Page 44 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=45">Page 45 of 120</option>
                <!--<option value="" >Page 45 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=46">Page 46 of 120</option>
                <!--<option value="" >Page 46 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=47">Page 47 of 120</option>
                <!--<option value="" >Page 47 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=48">Page 48 of 120</option>
                <!--<option value="" >Page 48 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=49">Page 49 of 120</option>
                <!--<option value="" >Page 49 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=50">Page 50 of 120</option>
                <!--<option value="" >Page 50 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=51">Page 51 of 120</option>
                <!--<option value="" >Page 51 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=52">Page 52 of 120</option>
                <!--<option value="" >Page 52 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=53">Page 53 of 120</option>
                <!--<option value="" >Page 53 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=54">Page 54 of 120</option>
                <!--<option value="" >Page 54 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=55">Page 55 of 120</option>
                <!--<option value="" >Page 55 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=56">Page 56 of 120</option>
                <!--<option value="" >Page 56 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=57">Page 57 of 120</option>
                <!--<option value="" >Page 57 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=58">Page 58 of 120</option>
                <!--<option value="" >Page 58 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=59">Page 59 of 120</option>
                <!--<option value="" >Page 59 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=60">Page 60 of 120</option>
                <!--<option value="" >Page 60 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=61">Page 61 of 120</option>
                <!--<option value="" >Page 61 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=62">Page 62 of 120</option>
                <!--<option value="" >Page 62 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=63">Page 63 of 120</option>
                <!--<option value="" >Page 63 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=64">Page 64 of 120</option>
                <!--<option value="" >Page 64 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=65">Page 65 of 120</option>
                <!--<option value="" >Page 65 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=66">Page 66 of 120</option>
                <!--<option value="" >Page 66 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=67">Page 67 of 120</option>
                <!--<option value="" >Page 67 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=68">Page 68 of 120</option>
                <!--<option value="" >Page 68 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=69">Page 69 of 120</option>
                <!--<option value="" >Page 69 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=70">Page 70 of 120</option>
                <!--<option value="" >Page 70 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=71">Page 71 of 120</option>
                <!--<option value="" >Page 71 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=72">Page 72 of 120</option>
                <!--<option value="" >Page 72 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=73">Page 73 of 120</option>
                <!--<option value="" >Page 73 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=74">Page 74 of 120</option>
                <!--<option value="" >Page 74 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=75">Page 75 of 120</option>
                <!--<option value="" >Page 75 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=76">Page 76 of 120</option>
                <!--<option value="" >Page 76 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=77">Page 77 of 120</option>
                <!--<option value="" >Page 77 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=78">Page 78 of 120</option>
                <!--<option value="" >Page 78 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=79">Page 79 of 120</option>
                <!--<option value="" >Page 79 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=80">Page 80 of 120</option>
                <!--<option value="" >Page 80 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=81">Page 81 of 120</option>
                <!--<option value="" >Page 81 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=82">Page 82 of 120</option>
                <!--<option value="" >Page 82 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=83">Page 83 of 120</option>
                <!--<option value="" >Page 83 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=84">Page 84 of 120</option>
                <!--<option value="" >Page 84 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=85">Page 85 of 120</option>
                <!--<option value="" >Page 85 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=86">Page 86 of 120</option>
                <!--<option value="" >Page 86 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=87">Page 87 of 120</option>
                <!--<option value="" >Page 87 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=88">Page 88 of 120</option>
                <!--<option value="" >Page 88 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=89">Page 89 of 120</option>
                <!--<option value="" >Page 89 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=90">Page 90 of 120</option>
                <!--<option value="" >Page 90 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=91">Page 91 of 120</option>
                <!--<option value="" >Page 91 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=92">Page 92 of 120</option>
                <!--<option value="" >Page 92 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=93">Page 93 of 120</option>
                <!--<option value="" >Page 93 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=94">Page 94 of 120</option>
                <!--<option value="" >Page 94 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=95">Page 95 of 120</option>
                <!--<option value="" >Page 95 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=96">Page 96 of 120</option>
                <!--<option value="" >Page 96 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=97">Page 97 of 120</option>
                <!--<option value="" >Page 97 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=98">Page 98 of 120</option>
                <!--<option value="" >Page 98 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=99">Page 99 of 120</option>
                <!--<option value="" >Page 99 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=100">Page 100 of 120</option>
                <!--<option value="" >Page 100 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=101">Page 101 of 120</option>
                <!--<option value="" >Page 101 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=102">Page 102 of 120</option>
                <!--<option value="" >Page 102 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=103">Page 103 of 120</option>
                <!--<option value="" >Page 103 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=104">Page 104 of 120</option>
                <!--<option value="" >Page 104 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=105">Page 105 of 120</option>
                <!--<option value="" >Page 105 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=106">Page 106 of 120</option>
                <!--<option value="" >Page 106 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=107">Page 107 of 120</option>
                <!--<option value="" >Page 107 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=108">Page 108 of 120</option>
                <!--<option value="" >Page 108 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=109">Page 109 of 120</option>
                <!--<option value="" >Page 109 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=110">Page 110 of 120</option>
                <!--<option value="" >Page 110 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=111">Page 111 of 120</option>
                <!--<option value="" >Page 111 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=112">Page 112 of 120</option>
                <!--<option value="" >Page 112 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=113">Page 113 of 120</option>
                <!--<option value="" >Page 113 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=114">Page 114 of 120</option>
                <!--<option value="" >Page 114 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=115">Page 115 of 120</option>
                <!--<option value="" >Page 115 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=116">Page 116 of 120</option>
                <!--<option value="" >Page 116 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=117">Page 117 of 120</option>
                <!--<option value="" >Page 117 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=118">Page 118 of 120</option>
                <!--<option value="" >Page 118 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=119">Page 119 of 120</option>
                <!--<option value="" >Page 119 of 120</option>-->
                <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=120">Page 120 of 120</option>
                <!--<option value="" >Page 120 of 120</option>-->
              </select>
              <span class="next"><a href="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?p=2">Next »</a></span> </div>
            <p class="amount"> Items 1 to 28 of 3351 total </p>
            <input type="hidden" id="paging" value="1">
            <p class="amount"> Items 1 to 28 of 3351 total </p>
            <div class="limiter">
              <label>Show</label>
              <div class="sort-show">
                <select id="sortOrder" onchange="setLocationPerPage(this.value)">
                  <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?limit=28" selected="selected"> 28 </option>
                  <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?limit=56"> 56 </option>
                  <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?limit=84"> 84 </option>
                  <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?limit=112"> 112 </option>
                  <option value="<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings.aspx?limit=140"> 140 </option>
                </select>
              </div>
              per page </div>
            <div class="pages"> <strong>Page:</strong>
              <ol>
                <li class="current">1</li>
                <li onclick="changeByPage('<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings-2.aspx')"><a>2</a></li>
                <li onclick="changeByPage('<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings-3.aspx')"><a>3</a></li>
                <li onclick="changeByPage('<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings-4.aspx')"><a>4</a></li>
                <li onclick="changeByPage('<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings-5.aspx')"><a>5</a></li>
                <li onclick="changeByPage('<?php echo SITE_URL; ?>diamond-engagement-rings/wholesale-preset-gold-diamond-engagement-rings-2.aspx')"> <a class="next" title="Next"> <img src="<?php echo DEMO_RETAIL_IMG; ?>i_pager-next.gif" alt="Next" class="v-middle"> </a> </li>
              </ol>
            </div>
            
            <!-- reset paging options css --> 
            
          </div>
        </div>
      </div>
      <script type="text/javascript">	
jQuery(function() {
	jQuery("#width-slider-range").slider({
		range:true,
		min:0.0000,
		max:26,
		values:[0,26],
		step:1,
		slide:function(event,ui) {
			jQuery('#width_range').html(ui.values[0]+' - '+ui.values[1]);
			//jQuery('#min_width_range').html(ui.values[0]);
			//jQuery('#max_width_range').html(ui.values[1]);
			jQuery('#pmin').val(ui.values[0]);
			jQuery('#pmax').val(ui.values[1]);
		},
		change:function(event,ui) {
		showLoaderNav();
		url = getUrl();	
		jQuery.post(url,function(res) {
				hideLoaderNav();
				var content = jQuery( res ).find( ".category-products" ).html();
				jQuery( ".category-products" ).empty().append( content );
				
				// add js file for lazy load
				jQuery.getScript(BASE_URL+"skin/frontend/default/<?php echo SITE_LABEL; ?>/js/mgt_lazy_image_loader/lazy-image-loader.js");	
		jQuery.getScript(BASE_URL+"skin/frontend/default/<?php echo SITE_LABEL; ?>/js/mgt_lazy_image_loader/common.js");	
				
				//update pagination at top section 
				var pagingproduct = jQuery( res ).find(".amount-box").html();
				jQuery(".amount-box").empty().append(pagingproduct);	
				//end of update pagination at top section 
                                
                                
				var newproducts = jQuery( res ).find( "#topseller" ).html();
				jQuery( "#topseller" ).empty().append( newproducts );
				var contentmetal = jQuery( res ).find( "#metal" ).html();
				jQuery( "#metal" ).empty().append(contentmetal);
				if(contentmetal) {
					jQuery("#metal").show();
				}
				else {
					jQuery("#metal").hide();
				}			
				
				var contentgender = jQuery( res ).find( "#gender" ).html();
				jQuery( "#gender" ).empty().append(contentgender);
				if(contentgender) {
					jQuery("#gender").show();
				}
				else {
					jQuery("#gender").hide();
				}		
				
				var contentdiamond = jQuery( res ).find( "#diamond" ).html();
				jQuery( "#diamond" ).empty().append(contentdiamond);
				if(contentdiamond) {
					jQuery("#diamond").show();
				}
				else {
					jQuery("#diamond").hide();
				}		
				
				var contentbrand = jQuery( res ).find( "#brand" ).html();
				jQuery( "#brand" ).empty().append(contentbrand);	
				if(contentbrand) {
					jQuery("#brand").show();
				}
				else {
					jQuery("#brand").hide();
				}		
							
				//jQuery(window).unbind('scroll');
				//StrategeryInfiniteScroll.init();
				
				window.history.pushState("string","",url.replace('ajax=1&',''));
			});
		}
	});
	
	jQuery('#pmin,#pmax').change(function() {
		var minwidth = parseInt(jQuery('#pmin').val());
		var maxwidth = parseInt(jQuery('#pmax').val());
		if(minwidth>maxwidth)
		{
			alert('Please enter correct width range.');
			return false;
		}
		
		jQuery('#width_range').html(minwidth+' - '+maxwidth);
		jQuery('#width-slider-range').slider('values', [minwidth, maxwidth]);
	});
	
});
</script> 
      <script type="text/javascript">
 

	jQuery(function() {
		jQuery("#price-slider-range").slider({
			range:true,
			min:99,
			max:255950,
			values:[99,255950],
			step:1,
			slide:function(event,ui) {
				jQuery('#price_range').html(ui.values[0]+' - '+ui.values[1]);
				//jQuery('#min_price_range').html(ui.values[0]);
				//jQuery('#max_price_range').html(ui.values[1]);
				jQuery('#prmin').val(ui.values[0]);
				jQuery('#prmax').val(ui.values[1]);
				
			},
			change:function(event,ui) {
			url = getUrl();			
			showLoaderNav();
			jQuery.post(url,function(res) {
				hideLoaderNav();
				var content = jQuery( res ).find( ".category-products" ).html();
				jQuery( ".category-products" ).empty().append( content );
				
				// add js file for lazy load
				jQuery.getScript(BASE_URL+"skin/frontend/default/<?php echo SITE_LABEL; ?>/js/mgt_lazy_image_loader/lazy-image-loader.js");	
		jQuery.getScript(BASE_URL+"skin/frontend/default/<?php echo SITE_LABEL; ?>/js/mgt_lazy_image_loader/common.js");	
		
				//update pagination at top section 
				var pagingproduct = jQuery( res ).find(".amount-box").html();
				jQuery(".amount-box").empty().append(pagingproduct);	
				//end of update pagination at top section 
                                
                                
				var newproducts = jQuery( res ).find( "#topseller" ).html();
				jQuery( "#topseller" ).empty().append( newproducts );	
				var contentmetal = jQuery( res ).find( "#metal" ).html();
				jQuery( "#metal" ).empty().append(contentmetal);
				if(contentmetal) {
					jQuery("#metal").show();
				}
				else {
					jQuery("#metal").hide();
				}		
					
				var contentgender = jQuery( res ).find( "#gender" ).html();
				jQuery( "#gender" ).empty().append(contentgender);
				if(contentgender) {
					jQuery("#gender").show();
				}
				else {
					jQuery("#gender").hide();
				}		
				
				var contentdiamond = jQuery( res ).find( "#diamond" ).html();
				jQuery( "#diamond" ).empty().append(contentdiamond);
				if(contentdiamond) {
					jQuery("#diamond").show();
				}
				else {
					jQuery("#diamond").hide();
				}		
				
				var contentbrand = jQuery( res ).find( "#brand" ).html();
				jQuery( "#brand" ).empty().append(contentbrand);
				if(contentbrand) {
					jQuery("#brand").show();
				}
				else {
					jQuery("#brand").hide();
				}		
								
				//jQuery(window).unbind('scroll');
				//StrategeryInfiniteScroll.init();
				
				window.history.pushState("string","",url.replace('ajax=1&',''));
			});
			}
		});
	
		jQuery("#prmin,#prmax").keydown(function(e) {
		 if (e.keyCode == 13) {
			var minprice = parseInt(jQuery('#prmin').val());
			var maxprice = parseInt(jQuery('#prmax').val());
			if(minprice>maxprice)
			{
				alert('Please enter correct price range.');
				return false;
			}
			
			jQuery('#price_range').html(minprice+' - '+maxprice);
			jQuery('#price-slider-range').slider('values', [minprice, maxprice]);
		 //return false;
		 }
			
		});
		jQuery('#prmin,#prmax').change(function() {
			var minprice = parseInt(jQuery('#prmin').val());
			var maxprice = parseInt(jQuery('#prmax').val());
			if(minprice>maxprice)
			{
				alert('Please enter correct price range.');
				return false;
			}
			
			jQuery('#price_range').html(minprice+' - '+maxprice);
			jQuery('#price-slider-range').slider('values', [minprice, maxprice]);
		});
		//============================================//
		// We have update the option value when come through back botton in chrome
		if(jQuery('select#sortingid option:selected').val() != 'dir=desc&order=popularity'){
			jQuery('#sortingid').val('dir=desc&order=popularity');
		}
	});		
</script>
      <div class="mobile-paging-sort"> 
        <script type="text/javascript">
function fncSearchItems_b()
{
	var url = document.getElementById("price_slider_url_b").value;
	if(url.indexOf("?")==-1)
	{
		url=url+'?';
	}
	else
	{
		url=url+'&';
	}
	var price_minimum = document.getElementById("price_minimum_b").value;
	var price_maximum = document.getElementById("price_maximum_b").value;
	
	price_minimum  = parsePrice(price_minimum, AJAX_price_minimum);
	price_maximum  = parsePrice(price_maximum, AJAX_price_maximum);
	
	var minPrice  = parsePrice(AJAX_price_minimum, 0);
	var maxPrice  = parsePrice(AJAX_price_maximum, 9999999);
	
	if (isNaN(price_minimum) || price_minimum == '')price_minimum = minPrice;
	if (isNaN(price_maximum) || price_maximum == '')price_maximum = maxPrice;
	
    //Reverse price if Min price is Greater than Max Price
	/*
	if (price_minimum > price_maximum)
	{
		var buffer = price_maximum;
		price_maximum = price_minimum;
		price_minimum = buffer;
	}
    //Check Min and Max price with default Min/Max price
	if (price_minimum < minPrice || price_minimum > maxPrice)
	{
		price_minimum = minPrice;
	}	
    if (price_maximum < minPrice || price_maximum > maxPrice)
	{
		price_maximum = maxPrice;
	}*/
	
	url = removeQueryString(url, "price");
	url = url+"&price="+escape(price_minimum+","+price_maximum);
	//alert("TOP url==="+url);	
	window.location.href = url;
}
jQuery(document).ready(function()
{
    //called when key is pressed in textbox
	jQuery("#price_minimum_b").keypress(function (e)  
	{ 
	  //if the letter is not digit then display error and don't type anything
	  if( e.which!=8 && e.which!=0 && (e.which<48 || e.which>57))
	  {
		//display error message
		return false;
      }	
	});
	
	jQuery("#price_maximum_b").keypress(function (e)  
	{ 
	  //if the letter is not digit then display error and don't type anything
	  if( e.which!=8 && e.which!=0 && (e.which<48 || e.which>57))
	  {
		//display error message
		return false;
      }	
	});

  });
</script> 
        <!-- <script>topseller('?p=');</script> -->
      </div>
      <div class="category-products" name="category-products" id="category-products">
        <ul class="products-grid prduct-list first last odd">
          <?php echo $ring_listings; ?>
        </ul>
        <div> 
          <script type="text/javascript">
function fncSearchItems_b()
{
	var url = document.getElementById("price_slider_url_b").value;
	if(url.indexOf("?")==-1)
	{
		url=url+'?';
	}
	else
	{
		url=url+'&';
	}
	var price_minimum = document.getElementById("price_minimum_b").value;
	var price_maximum = document.getElementById("price_maximum_b").value;
	
	price_minimum  = parsePrice(price_minimum, AJAX_price_minimum);
	price_maximum  = parsePrice(price_maximum, AJAX_price_maximum);
	
	var minPrice  = parsePrice(AJAX_price_minimum, 0);
	var maxPrice  = parsePrice(AJAX_price_maximum, 9999999);
	
	if (isNaN(price_minimum) || price_minimum == '')price_minimum = minPrice;
	if (isNaN(price_maximum) || price_maximum == '')price_maximum = maxPrice;
	
    //Reverse price if Min price is Greater than Max Price
	/*
	if (price_minimum > price_maximum)
	{
		var buffer = price_maximum;
		price_maximum = price_minimum;
		price_minimum = buffer;
	}
    //Check Min and Max price with default Min/Max price
	if (price_minimum < minPrice || price_minimum > maxPrice)
	{
		price_minimum = minPrice;
	}	
    if (price_maximum < minPrice || price_maximum > maxPrice)
	{
		price_maximum = maxPrice;
	}*/
	
	url = removeQueryString(url, "price");
	url = url+"&price="+escape(price_minimum+","+price_maximum);
	//alert("TOP url==="+url);	
	window.location.href = url;
}
jQuery(document).ready(function()
{
    //called when key is pressed in textbox
	jQuery("#price_minimum_b").keypress(function (e)  
	{ 
	  //if the letter is not digit then display error and don't type anything
	  if( e.which!=8 && e.which!=0 && (e.which<48 || e.which>57))
	  {
		//display error message
		return false;
      }	
	});
	
	jQuery("#price_maximum_b").keypress(function (e)  
	{ 
	  //if the letter is not digit then display error and don't type anything
	  if( e.which!=8 && e.which!=0 && (e.which<48 || e.which>57))
	  {
		//display error message
		return false;
      }	
	});

  });
</script> 
          <!-- <script>topseller('?p=');</script> -->
          <div class="toolbar" style="margin:5px 0 0; display:block;">
            <div class="pager">
                <div class="pages">
                <ul class="pagesList">
                  <?php echo $page_links; ?>
              </ul>
              </div>
            </div>
          </div>
          <script>
			
/*function loadPaginationSction(url)
{
	jQuery("body").append("<div id='TB_load'><img src='"+imgLoader.src+"' /></div>");//add loader to the page
	jQuery("body").append("<div id='TB_overlay'></div>");
	jQuery("#TB_overlay").addClass("TB_overlayBG")
	jQuery('#TB_load').show();//show loader
	
	jQuery.post(url,
	function(res){
		
		jQuery('#TB_load').hide();//hide loader
		jQuery("#TB_overlay").remove();
   
	      	var content = jQuery( res ).find( ".category-products" ).html();
			jQuery( ".category-products" ).html( content );	
	      
			//StrategeryInfiniteScroll.init();
			
		 
	});	
	
}*/



function loadPaginationSction(url,pagingPosition) 
{
 jQuery("body").append("<div id='TB_load'><img src='"+imgLoader.src+"' alt='imgLoader'/></div>");//add loader to the page
 jQuery("body").append("<div id='TB_overlay'></div>");
 jQuery("#TB_overlay").addClass("TB_overlayBG")
 jQuery('#TB_load').show();//show loader
 var url = getUrl();
 var urls = getUrl();
 var pagingValue = jQuery("#"+pagingPosition).val();   //topPagingPage
 /* pagingValue1 = pagingValue;
 pagingValue = parseInt(1)+pagingValue;
 var lastValue = parseInt(jQuery("#bottomPage option:last-child").val());
 
 if(pagingValue!=" " && pagingValue!="undefined"){
  url = url+"&p="+pagingValue ;
  urls = urls+"&p="+pagingValue1 ;
 }
 if(lastValue==pagingValue1){
	jQuery(".ias_trigger").hide();	
 }else{

	jQuery(".ias_trigger").show();	 
	//jQuery("#bottomNextId").attr('href', url);
	jQuery('.pager .next').html('<a href="'+url+'" rel="next" id="bottomNextId">Next »</a>');
 }
 */
 //alert(pagingValue);
 //StrategeryInfiniteScroll.init();
 jQuery.post(pagingValue,
 function(res){
    
  jQuery('#TB_load').hide();//hide loader
  jQuery("#TB_overlay").remove();
  jQuery( ".products-grid" ).remove();


	var content = jQuery( res ).find( ".category-products" ).html();
	jQuery( ".category-products" ).empty().append( content );
    
     //add js file for lazy load
	 jQuery.getScript(BASE_URL+"skin/frontend/default/<?php echo SITE_LABEL; ?>/js/mgt_lazy_image_loader/lazy-image-loader.js");	
	 jQuery.getScript(BASE_URL+"skin/frontend/default/<?php echo SITE_LABEL; ?>/js/mgt_lazy_image_loader/common.js");
		
	var contentmetal = jQuery( res ).find( "#metal" ).html();
	jQuery( "#metal" ).empty().append(contentmetal);
				
				
	var contentgender = jQuery( res ).find( "#gender" ).html();
	jQuery( "#gender" ).empty().append(contentgender);
				
	var contentdiamond = jQuery( res ).find( "#diamond" ).html();
	jQuery( "#diamond" ).empty().append(contentdiamond);
				
				
	var contentbrand = jQuery( res ).find( "#brand" ).html();
	jQuery( "#brand" ).empty().append(contentbrand);
				
	//update pagination at top section 
	var pagingproduct = jQuery( res ).find(".amount-box").html();
	jQuery(".amount-box").empty().append(pagingproduct);	
	//end of update pagination at top section 
     window.history.pushState("string","",pagingValue.replace('ajax=1&',''));
    //location.href = "#pageLocator";
     
 }); 
	
	
}
</script> 
        </div>
        <script type="text/javascript">decorateGeneric($$('ul.products-grid'), ['odd','even','first','last'])</script>
        <div class="cat-footer">
          <div class="side-text">View our collection of over 2,000 of Preset Diamond Engagement Rings below to find your perfect engagement ring. All our preset diamond engagement rings are available in your choice of precious metals: from sterling silver to 10k, 14k, 18k white gold, yellow gold, rose gold, to Platinum. We can also fully customize any ring to your liking. <br>
            <br>
            If you are still not able to find your perfect diamond engagement ring from our collection please contact us with your specifications and we will custom make it for you! We specialize in custom orders and will work with you to create your dream ring. Contact us today!</div>
        </div>
        <!--</div>--> 
      </div>
      <div class="bt-c"></div>
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
		jQuery.post(BASE_URL+'/feeds/sendnotification.php',{purl:'<?php echo SITE_URL; ?>',fpc_id:'371'},function(res) {
			if(res=='success') {
				window.location.reload(true);
			}
		});
	}
	else if(par!='' && page=='') {
		//alert(page);
		jQuery.post(BASE_URL+'/feeds/sendnotification.php',{ptext:'',partialtext:par,surl:'<?php echo SITE_URL; ?>',fpc_id:''},function(res) {
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

<!-- Google Code for Remarketing Tag --> 
<!--------------------------------------------------
Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. See more information and instructions on how to setup the tag on: http://google.com/ads/remarketingsetup
---------------------------------------------------> 
<!-- BEGIN: buySAFE Seal --> 
<script src="<?php echo DEMO_RETAIL_JS; ?>rollover.js"></script>  
<!-- END: buySAFE Seal --> 
<input type="hidden" name="liting_class" id="liting_class" value="stullerygoldrings" />
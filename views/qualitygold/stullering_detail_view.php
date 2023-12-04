<div id="main-container">
  <div class="breadtopred">
    <div class="breadcrumbs">
      <ul class="breadcrumb">
        <li class="home"> <a href="<?php echo SITE_URL; ?>" title="Diamond Jewelry Watches Home">Diamond Jewelry Watches Home</a> <span>&gt;</span> </li>
        <?php echo $subcate_link['category_link']; ?>
        <li class="product"><?php echo $ringtitle; ?></li>
      </ul>
    </div>
  </div>
  <div id="content-area">
    <div id="left-area"> </div>
    <div id="mid-area"> 
      <div class="product-view">
        <div class="product-essential">
          <div class="productBox">
            <form action="#" method="post" id="form1" name="form1" enctype="multipart/form-data">
              <div class="no-display">
                <div id="discount"></div>
              </div>
              <div class="product-img-box">
                <div id="tab1" class="prdata">
                  <p class="product-image no-margin product-image-loader">
                  <div id="wrap" style="top:0px;z-index:99;position:relative;"> <a href="Javascript:;" class="cloud-zoom" id="zoom1" rel="position:&#39;right&#39;,showTitle:1,titleOpacity:0,lensOpacity:0.5,adjustX: 10,adjustY:-4" style="position: relative; display: block; cursor: default;"> <img src="<?php echo $ringimg; ?>" alt="<?php echo $ringtitle; ?>" title="<?php echo $ringtitle; ?>" style="display: block;"> </a>
                    <div style="width: 119.333px; position: absolute; top: 75%; left: 119.333px; text-align: center; opacity: 0.5;" class="cloud-zoom-loading">Loading...</div>
                  </div>
                  </p>
                </div>
                <div class="box_main1">
                  <div class="f-left">
                    <div class="more-views">
                      <ul>
                        <?php echo $rings_thumb; ?>
                      </ul>
                    </div>
                  </div>
                </div>
                
                <!-- AddThis Button BEGIN --> 
                <script type="text/javascript">var addthis_config = {"data_track_addressbar":false};</script> 
                <script type="text/javascript" src="<?php echo DEMO_RETAIL_JS; ?>addthis_widget.js"></script> 
                <!-- AddThis Button END --> 
              </div>
              <div class="detail-right" id="detail-right">
                <h1><?php echo $ringtitle; ?></h1>
                
                <!-- //---------New Code added on date 30-09-2015: --------------------------------// -->
                <div id="dailydeal-web" class="dailydeal-common"> 
                  <script type="text/javascript">
//<![CDATA[
	//var auctionTimeCounters = new Array();
	var dailydealTimeCounters = new Array();
	var i = 0;
//]]>
</script> 
                </div>
                <!-- //----------------------------------------------------------------------------// -->
                
                <div class="rating-review">
                  <div class="rating-box" style="float:left;">
                    <div class="rating" style="width:100%"></div>
                  </div>
                  <div class="rating-div-reviews"> <a href="#" class="reviewscount">2 Reviews </a> <a href="Javascript:;" title="Rate &amp; Review" class="mob-rate-review">Rate &amp; Review</a> <a href="<?php echo SITE_URL.'qualitygoldrings/quality_ring_detail/'.$rowsring['id']; ?>#prod_detail" title="Product Detail" onclick="" class="toprdDetail">Product Details</a> </div>
                  <span class="print_product_details_social"><a href="<?php echo SITE_URL.'catalog/product/print/'.$rowsring['id']; ?>" target="_blank" title="Print this Product" rel="nofollow"><img src="<?php echo DEMO_RETAIL_IMG; ?>print.png" border="0" alt="Print"></a></span> 
                  <!--Display google rich-snnipt rating Start--> 
                </div>
                <!--<div class="rating-review">
											</div>-->
                <div class="prdDetail">
                  <table width="100%" class="product-detail">
                    <tbody>
                      <tr>
                        <td><div class="left">
                            <div class="itemcode"> <span class="prices-label"><strong>Item Code:</strong></span> <span><?php echo $rowsring['style']; ?></span> <span class="shipfree"> 
                              <!-- // customm code for shipping free text -->
                              <div class="ship-for-free"> <strong><a class="freeShip" href="#" target="_blank">Ships for free&nbsp;*</a></strong> 
                                <!-- // End customm code --> 
                              </div>
                              </span> </div>
                            <div class="price-box">
                              <p class="old-price"> <span class="retail-label">Retail Price:</span> <span class="price" id="old-price-8592"> $<?php echo _nf($retail_price, 2) ; ?> </span> </p>
                              <p class="old-price"> <span class="ourprice-label">Our Price:</span> <span class="new-price" id="product-price-8592">$<?php echo _nf($rowsring['price'], 2) ; ?></span> <span class="special-price-label" id="old_price">(Savings:<?php echo round($saving_percent); ?>%)</span> <span id="google_discount"></span> <span id="twitter_discount"></span> <span id="facebook_discount"></span> <span id="pinterest_discount"></span> <span id="total_price"></span> </p>
                            </div>
                            
                            <!-- reward point code  -->
                            <div class="rewardPointsqtyBox">
                              <div class="rewardPoints">
                                <div class="reward-text"> EARN <span style="color:red">6118</span> DSTERN Reward Points </div>
                                <div class="reward-icon">
                                  <div id="jquery_tooltip_item_4" class="jquery_tooltip_item">
                                    <div class="tooltip_description"> <span class="arw-rgt"></span>
                                      <div class="tool-top"></div>
                                      <div class="tool-des"> You asked and we listened! Introducing a Rewards Loyalty program for all our customers to thank you for your business:
                                        <ul>
                                          <li>Receive 3% in Reward Point Dollars (100 Points = $1) for every eligible online purchase.</li>
                                          <li>Reward Dollars may also be used to make other eligible purchases. From time to time, <?php echo SITE_LABEL; ?> may run special promotions which permit you to earn additional Reward Dollars.</li>
                                          <li>Reward Dollars earned may be used and combined with other discounts and coupons.</li>
                                        </ul>
                                        <h2>CONDITIONS:</h2>
                                        <ul>
                                          <li>For rewards to apply you must register and create account online at <?php echo SITE_LABEL; ?> (free).</li>
                                          <li>Your participation in the Rewards Program is revocable by us at any time, at our sole discretion.</li>
                                          <li>You may only have one Rewards Account per email account.</li>
                                          <li>Your Rewards are non-transferable and have no cash value.</li>
                                          <li>Reward Dollars are not earned on purchases paid with Gift Cards, in-store credits or on purchases paid for with Reward Dollars.</li>
                                        </ul>
                                      </div>
                                      <div class="tool-bottom"></div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            
                            <!-- reward point code end  --> 
                            
                          </div>
                          
                          <!-- left div close  --></td>
                        <td><div class="right"> 
                            
                            <!-- product detail item -->
                            <div class="clear"></div>
                            <ul class="product-info">
<!--                              <li><b>Measurements:</b>: </li>-->
                              <li><b>Metal</b>: <?php echo $rowsring['metal']; ?></li>
                              <li><b>Average Weigth</b>: <?php echo $rowsring['average_weight']; ?></li>
                              <li><b>Gift Box Included</b></li>
                              <li class="prod_detail"><a href="#prod_detail">More Product Details...</a></li>
                            </ul>
                            <script type="text/javascript">decorateTable('product-attribute-specs-table')</script> 
                            <!-- end of product attribute --> 
                          </div></td>
                      </tr>
                    </tbody>
                  </table>
                  <!-- Added by Pramod for out of stock messaged up issues (04 March 2014) --> 
                  <!-- End -->
                  <div class="product-options1" id="product-options-wrapper"> 
                    <script type="text/javascript">
//<![CDATA[
var DateOption = Class.create({

    getDaysInMonth: function(month, year)
    {
        var curDate = new Date();
        if (!month) {
            month = curDate.getMonth();
        }
        if (2 == month && !year) { // leap year assumption for unknown year
            return 29;
        }
        if (!year) {
            year = curDate.getFullYear();
        }
        return 32 - new Date(year, month - 1, 32).getDate();
    },

    reloadMonth: function(event)
    {
        var selectEl = event.findElement();
        var idParts = selectEl.id.split("_");
        if (idParts.length != 3) {
            return false;
        }
        var optionIdPrefix = idParts[0] + "_" + idParts[1];
        var month = parseInt($(optionIdPrefix + "_month").value);
        var year = parseInt($(optionIdPrefix + "_year").value);
        var dayEl = $(optionIdPrefix + "_day");

        var days = this.getDaysInMonth(month, year);

        //remove days
        for (var i = dayEl.options.length - 1; i >= 0; i--) {
            if (dayEl.options[i].value > days) {
                dayEl.remove(dayEl.options[i].index);
            }
        }

        // add days
        var lastDay = parseInt(dayEl.options[dayEl.options.length-1].value);
        for (i = lastDay + 1; i <= days; i++) {
            this.addOption(dayEl, i, i);
        }
    },

    addOption: function(select, text, value)
    {
        var option = document.createElement('OPTION');
        option.value = value;
        option.text = text;

        if (select.options.add) {
            select.options.add(option);
        } else {
            select.appendChild(option);
        }
    }
});
var dateOption = new DateOption();
//]]>
</script>
                    <div class="product-options count2"> <strong class="selectAtt">Finish Level:</strong>
                      <div class="attBox">
                        <div id="web-option-select-changed" class="web-option-select-changed">
                          <select class="multiselect required-entry product-custom-option option-goldcolor-147416" id="finished_level" name="finished_level">
                            <option value="semi_mount" selected="selected">Semi Mount</option>
                            <option value="complete">Complete</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="clear"></div>
                    <br />
                    <div><a href="#javascript" onclick="addcartsubmit('<?php echo $buynow_link; ?>')" id="addtoshopping"><img src="<?php echo SITE_URL; ?>images/buy-now.jpg"  alt="buy-now"/></a>
                      <input type="hidden" name="txt_rstyle" id="txt_rstyle" value="<?php echo $rint_style; ?>">
                    <input type="hidden" name="3ez_price" value="0">
                    <input type="hidden" name="5ez_price" value="0">
                    <input type="hidden" name="main_price" value="<?php echo $sales_price; ?>">
                    <input type="hidden" name="vender" value="unique">
                    <input type="hidden" name="url" value="<?php echo $image_url ?>">
                    <input type="hidden" name="prodname" value="<?php echo $rowsring['title']; ?>">
                    <input type="hidden" name="diamnd_count" value="">
                    <input type="hidden" name="ring_shape" value="">
                    <input type="hidden" name="ring_carat" value="<?php echo $rowsring['average_weight'];?>">
                    <input type="hidden" name="prid" value="<?php echo $rowsring['id']; ?>">
                    <input type="hidden" name="txt_ringtype" value="generic_ring">
                    <input type="hidden" name="txt_ringsize" value="" />
                    <input type="hidden" name="txt_metal" value="" />
                    <input type="hidden" name="txt_addoption" value="qualityrings" />
                    <input type="hidden" name="unique_pagelink" value="<?php echo $quality_link; ?>" />
                    <input type="hidden" name="vendors_name" value="Quality Jewelry" />
                      <br />
                      <br />
                    </div>
                    <div><?php echo '<span><img src="'.SITE_URL.'demo_retail/images/logo-getfinancing.png" width="150"   alt="getfinancing"/></span>'; ?></div>
                    <div class="clear"></div>
                    <script>
    function addcartsubmit(pageURL)
    {
        //alert('Please select a payment option.');
        document.getElementById('form1').action = pageURL;
        document.getElementById('form1').submit();
    }
 function getColorImages(color, productId){
 //alert(color);
 //alert(productId) ;
 jQuery( ".product-img-box" ).empty().append('<img id="prodChangeImg" alt="getfinancing" src="<?php echo SITE_URLL; ?>images/loading-infinite.gif" style="padding: 214px 81px;">' );	
  url = '<?php echo SITE_URLL; ?>catalog/product/getcoloredimage/'
  jQuery.post(url,{colordata: color, pId: productId }, function(res) {
	  
	  var content = jQuery( res ).find( ".box_main1" ).html();
	  if(content)
		jQuery( ".product-img-box" ).empty().append( content );	

  });
  
 }
 
  //-----------------------------------------------//
 var screenWidth = screen.width;
 var screenHeight = screen.height;
 //300-767
 //w:1024
 
 //alert('screenWidth:'+screenWidth +' screenHeight:'+ screenHeight);
 //web-option-select-changed
 
 if(screenWidth < 1024){
	jQuery('#web-option-select-changed select').attr('onChange','');
 }
 
</script> 
                    <script type="text/javascript">
//<![CDATA[
enUS = {"m":{"wide":["January","February","March","April","May","June","July","August","September","October","November","December"],"abbr":["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"]}}; // en_US locale reference
Calendar._DN = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]; // full day names
Calendar._SDN = ["Sun","Mon","Tue","Wed","Thu","Fri","Sat"]; // short day names
Calendar._FD = 0; // First day of the week. "0" means display Sunday first, "1" means display Monday first, etc.
Calendar._MN = ["January","February","March","April","May","June","July","August","September","October","November","December"]; // full month names
Calendar._SMN = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"]; // short month names
Calendar._am = "AM"; // am/pm
Calendar._pm = "PM";

// tooltips
Calendar._TT = {};
Calendar._TT["INFO"] = "About the calendar";

Calendar._TT["ABOUT"] =
"DHTML Date/Time Selector\n" +
"(c) dynarch.com 2002-2005 / Author: Mihai Bazon\n" +
"For latest version visit: http://www.dynarch.com/projects/calendar/\n" +
"Distributed under GNU LGPL. See http://gnu.org/licenses/lgpl.html for details." +
"\n\n" +
"Date selection:\n" +
"- Use the \xab, \xbb buttons to select year\n" +
"- Use the " + String.fromCharCode(0x2039) + ", " + String.fromCharCode(0x203a) + " buttons to select month\n" +
"- Hold mouse button on any of the above buttons for faster selection.";
Calendar._TT["ABOUT_TIME"] = "\n\n" +
"Time selection:\n" +
"- Click on any of the time parts to increase it\n" +
"- or Shift-click to decrease it\n" +
"- or click and drag for faster selection.";

Calendar._TT["PREV_YEAR"] = "Prev. year (hold for menu)";
Calendar._TT["PREV_MONTH"] = "Prev. month (hold for menu)";
Calendar._TT["GO_TODAY"] = "Go Today";
Calendar._TT["NEXT_MONTH"] = "Next month (hold for menu)";
Calendar._TT["NEXT_YEAR"] = "Next year (hold for menu)";
Calendar._TT["SEL_DATE"] = "Select date";
Calendar._TT["DRAG_TO_MOVE"] = "Drag to move";
Calendar._TT["PART_TODAY"] = ' (' + "Today" + ')';

// the following is to inform that "%s" is to be the first day of week
Calendar._TT["DAY_FIRST"] = "Display %s first";

// This may be locale-dependent. It specifies the week-end days, as an array
// of comma-separated numbers. The numbers are from 0 to 6: 0 means Sunday, 1
// means Monday, etc.
Calendar._TT["WEEKEND"] = "0,6";

Calendar._TT["CLOSE"] = "Close";
Calendar._TT["TODAY"] = "Today";
Calendar._TT["TIME_PART"] = "(Shift-)Click or drag to change value";

// date formats
Calendar._TT["DEF_DATE_FORMAT"] = "%b %e, %Y";
Calendar._TT["TT_DATE_FORMAT"] = "%B %e, %Y";

Calendar._TT["WK"] = "Week";
Calendar._TT["TIME"] = "Time:";
//]]>
</script> 
                  </div>
                  <script type="text/javascript">decorateGeneric($$('#product-options-wrapper dl'), ['last']);</script>
                  <div class="product-options-bottom">
                    <div class="add-to-cart">
                      <div class="clear"></div>
                      <div class="main-buttons f-left">
                        <div class="qtyBox">
                          <label for="qty" class="pdqty">Qty:</label>
                          <input type="text" name="qty" id="qty" maxlength="12" value="1" title="Qty" class="input-text qty required-entry pdqty">
                        </div>
                        <input type="button" title="Add to Cart" class="button btn-cart" onclick="productAddToCartForm.submit()">
                        <div id="dailydeal-mob" class="dailydeal-common"> 
                          <script type="text/javascript">
//<![CDATA[
	//var auctionTimeCounters = new Array();
	var dailydealTimeCounters = new Array();
	var i = 0;
//]]>
</script> 
                        </div>
                        <div class="layaway"><a href="#" title="Free Layaway and Financing">Free Layaway and Financing</a> (no interest for 90 days)</div>
                        <div class="buySafe"> <span id="Kicker Custom 1_1" name="Kicker Custom 1" type="Kicker Custom 1" data-pin-no-hover="true" style="display: inline-block;"> <img src="<?php echo DEMO_RETAIL_IMG; ?>MP673357336a_Kicker_1.png" oncontextmenu="return false;" data-pin-no-hover="true" style="border:0;margin:0;padding:0;visibility:inherit;" alt="Norton Shopping Guarantee"> </span> </div>
                      </div>
                      <ul class="add-to-links">
                        <li class="wishlist"> <a href="<?php echo SITE_URL.'account/account_wishlist/'.$rowsring['id'].'/add/qualityrings'; ?>" title="Add to wishlist"><i></i> Add to Wishlist </a> </li>
                        <li class="compare"> <a href="#" title="Add to compare"><i></i>Add to Compare</a></li>
                        <li class="email"><a href="#javascript" class="js__p_start"><i></i>Ask a Friend</a></li>
                        <li class="email"><a href="#javascript" class="js__p_another_start"><i></i>Ask an Expert</a></li>
                        <li class="getprice"><span class="pnotify"><a href="#" id="productupdates-button7"><i></i>Get Price Update</a></span></li>
                      </ul>
                      <script>
		function viewStyle() {
            var ft = $('#font_style').val();
            //alert(ft);
            $("#viewFont").css({ "font-family": ft });
        }
    
        $(function() {
        
        $("#example-one").organicTabs();
        
        $("#example-two").organicTabs({
        "speed": 200
        });
        
        $('.nano').nanoScroller({
        preventPageScrolling: true
        });
        $(".nano").nanoScroller();
        $("#main").find("img").load(function() {
        $(".nano").nanoScroller();
        });
        /*$("#main").find('.description').load("readme.html", function(){
        $(".nano").nanoScroller();
        $("#main").find("img").load(function() {
        $(".nano").nanoScroller();
        });
        });*/
        //alert('true');
            viewStyle();
            ////// call popup scirpt
            $(".js__p_start, .js__p_another_start").simplePopup();
        });
        
        $(document).ready(function() {
            function close_accordion_section() {
                $('.accordion .accordion-section-title').removeClass('active');
                $('.accordion .accordion-section-content').slideUp(300).removeClass('open');
            }
    
            $('.accordion-section-title').click(function(e) {
                // Grab current anchor value
                var currentAttrValue = $(this).attr('href');
        
                if($(e.target).is('.active')) {
                    close_accordion_section();
                }else {
                    close_accordion_section();
        
                    // Add active class to section title
                    $(this).addClass('active');
                    // Open up the hidden content panel
                    $('.accordion ' + currentAttrValue).slideDown(300).addClass('open'); 
                }
        
                e.preventDefault();
            });
        });
        //// print page
            function printCurrPage() {
                window.print();
            }
            
        </script> 
                    </div>
                    <div class="chat"><a href="javascript:;" onclick="javascript: liveChat();" title="Chat Our Diamond Watches and Jewelry Sales Team" class="chat"></a></div>
                  </div>
                </div>
              </div>
            </form>
            <script>
			jQuery(document).ready(function() {
				jQuery("#content div").hide();//Initially hide all content
				jQuery("#tabs li:first").attr("id","current");//Activate first tab
				jQuery("#content div:first").fadeIn();//Show first tab content
				
				jQuery('#tabs a').click(function(e) {
					e.preventDefault();
					jQuery("#content div").hide();//Hide all content
					jQuery("#tabs li").attr("id","");//Reset id's
					jQuery(this).parent().attr("id","current");//Activate this
					jQuery('#' + jQuery(this).attr('title')).fadeIn();//Show content for current tab
					if(jQuery(this).attr('title') == 'tab7') {
						jQuery('#questionForm #name').val('');
						jQuery('#questionForm #phone').val('');
						jQuery('#questionForm #email').val('');
						jQuery('#questionForm #retypeemail').val('');
						var val = 'ask-a-question';
						jQuery.post('<?php echo SITE_URLL; ?>catalog/product/tabcontent',{val:val},function(res){
							var res_array = res.split('|');
							jQuery('#questionForm #name').val(res_array[0]);
							jQuery('#questionForm #phone').val(res_array[1]);
							jQuery('#questionForm #email').val(res_array[2]);
							jQuery('#questionForm #retypeemail').val(res_array[2]);
						});
					}
					else if(jQuery(this).attr('title') == 'tab8' && jQuery('#tab8').html() == '') {
						jQuery('#tab8').html('<img src="/skin/frontend/default/default/css/magestore/sociallogin/opc-ajax-loader.gif" style="margin-left:390px;">');
						var val = 'why-shop-with-us';
						jQuery.post('<?php echo SITE_URLL; ?>catalog/product/tabcontent',{val:val},function(res){jQuery('#tab8').html(res);});
					}
					else if(jQuery(this).attr('title') == 'tab9' && jQuery('#tab9').html() == '') {
						jQuery('#tab9').html('<img src="/skin/frontend/default/default/css/magestore/sociallogin/opc-ajax-loader.gif" style="margin-left:390px;">');
						var val = 'free-layaway-financing';
						jQuery.post('<?php echo SITE_URLL; ?>catalog/product/tabcontent',{val:val},function(res){jQuery('#tab9').html(res);});
					}
					else if(jQuery(this).attr('title') == 'tab10' && jQuery('#tab10').html() == '') {
						jQuery('#tab10').html('<img src='+BASE_URL+'"/skin/frontend/default/default/css/magestore/sociallogin/opc-ajax-loader.gif" style="margin-left:390px;">');
						var val = 'policies-shipping-returns';
						jQuery.post('<?php echo SITE_URLL; ?>catalog/product/tabcontent',{val:val},function(res){jQuery('#tab10').html(res);});
					}
					
					//for review tab
					jQuery('#review-form').css({'display':'none'});
					jQuery('#div-customer-review-content').fadeIn();
				});
			});
			</script>
            <div class="prdTabs">
              <ul id="tabs">
                <li id=""><a href="#" name="prod_detail" title="tab5">Product Details</a></li>
                <li id=""><a href="#" title="tab6">Customer Reviews</a></li>
                <li><a href="#" title="tab7">Ask a question</a></li>
                <li id=""><a href="#" title="tab8">Similar Products</a></li>
                <li id=""><a href="#" title="tab9">Policies</a></li>
              </ul>
              <div id="content">
                <div style="display: none;" id="tab5">
                  <table>
                    <tbody>
                      <tr>
                        <td width="60%" style="padding-right:5px">
            <?php echo $item_desc; ?></td>
    <td><span id="item-info"><b>Item Information</b></span>
      <table id="item-tbl" class="data-table2" width="100%" cellspacing="0" cellpadding="0">
        <tbody>
          <tr class="first-row">
            <th style="width:40%;color:#ff0000;font-weight:bold;">Item Code</th>
            <td style="color:#ff0000;font-weight:bold;"><?php echo $rowsring['style']; ?></td>
          </tr>
          <tr class="second-row">
            <th style="width:40%;">Average Weight</th>
            <td><?php echo $rowsring['average_weight']; ?></td>
          </tr>
          <?php
          $view_iteminfo = '';
          if( !empty($rowsring['metal']) ) {
            $view_iteminfo .= '<tr class="second-row">
                                  <th style="width:40%;">Metal</th>
                                  <td>'.$rowsring['metal'].'</td>
                                </tr>';
          }
          if( !empty($rowsring['item_length']) && $rowsring['item_length'] != 'null' ) {
            $view_iteminfo .= '<tr class="second-row">
                                  <th style="width:40%;">Item Length</th>
                                  <td>'.$rowsring['item_length'].'</td>
                                </tr>';
          }
          if( !empty($rowsring['status']) ) {
            $view_iteminfo .= '<tr class="second-row">
                                  <th style="width:40%;">Status</th>
                                  <td>'.$rowsring['status'].'</td>
                                </tr>';
          }
          if( !empty($rowsring['country']) ) {
            $view_iteminfo .= '<tr class="second-row">
                                  <th style="width:40%;">Country</th>
                                  <td>'.$rowsring['country'].'</td>
                                </tr>';
          }
          if( !empty($rowsring['product_type']) ) {
            $view_iteminfo .= '<tr class="second-row">
                                  <th style="width:40%;">Product Type</th>
                                  <td>'.$rowsring['product_type'].'</td>
                                </tr>';
          }
          if( !empty($rowsring['jewelry_type']) ) {
            $view_iteminfo .= '<tr class="second-row">
                                  <th style="width:40%;">Jewelry Type</th>
                                  <td>'.$rowsring['jewelry_type'].'</td>
                                </tr>';
          }
          if( !empty($rowsring['material_primary']) ) {
            $view_iteminfo .= '<tr class="second-row">
                                  <th style="width:40%;">Primary Material</th>
                                  <td>'.$rowsring['material_primary'].'</td>
                                </tr>';
          }
          if( !empty($rowsring['material_primary_color']) ) {
            $view_iteminfo .= '<tr class="second-row">
                                  <th style="width:40%;">Primary Material Color</th>
                                  <td>'.$rowsring['material_primary_color'].'</td>
                                </tr>';
          }
          if( !empty($rowsring['material_purity']) ) {
            $view_iteminfo .= '<tr class="second-row">
                                  <th style="width:40%;">Material Purity</th>
                                  <td>'.$rowsring['material_purity'].'</td>
                                </tr>';
          }
          if( !empty($rowsring['length_of_item']) ) {
            $view_iteminfo .= '<tr class="second-row">
                                  <th style="width:40%;">Length of Item</th>
                                  <td>'.$rowsring['length_of_item'].'</td>
                                </tr>';
          }
          if( !empty($rowsring['catalogs']) ) {
            $view_iteminfo .= '<tr class="second-row">
                                  <th style="width:40%;">Catalogs</th>
                                  <td>'.$rowsring['catalogs'].'</td>
                                </tr>';
          }
          
          echo $view_iteminfo;
          
          ?>
        </tbody>
      </table>
      </td>
  </tr>
</tbody>
</table>
</div>
<div style="display: none;" id="tab6">
<div>Customer Reviews:</div>
<?php echo $view_coments; ?> </div>
<div style="display: block;" id="tab7"> <span>Contact us 24/7 using <a href="javascript:void" onclick="javascript: liveChat();">Live Chat</a>, call us Mon-Fri 10am-9pm EST toll free in USA: <?php echo SITE_EMAIL; ?>, outside USA: <?php echo CONTACT_NO; ?>, email us at <a href="mailto:<?php echo CONTACT_NO; ?>"><?php echo SITE_EMAIL; ?></a> or use the form below:</span> 
<script type="text/javascript">
jQuery.noConflict();
</script> 
                  <a name="question-form"></a>
                  <form action="" id="questionForm" method="post">
                    <ul id="msg-area" class="messages">
                    </ul>
                    <span class="fieldset">
                    <ul class="form-list">
                      <li class="fields"> <span class="field">
                        <label for="name" class="required"><em>*</em>Name</label>
                        <span class="input-box">
                        <input name="name" id="name" title="Name" value="" class="input-text required-entry" type="text">
                        </span> </span> <span class="field">
                        <label for="phone" class="required">Phone</label>
                        <span class="input-box">
                        <input name="phone" id="phone" title="Phone" value="" class="input-text" type="text">
                        </span> </span> </li>
                      <li class="fields"> <span class="field">
                        <label for="email" class="required"><em>*</em>Email</label>
                        <span class="input-box">
                        <input name="email" id="" title="Email" value="" class="input-text required-entry validate-email" type="text">
                        </span> </span> <span class="field">
                        <label for="email" class="required"><em>*</em>Retype Email</label>
                        <span class="input-box">
                        <input name="retypeemail" id="retypeemails" title="Retype Email" value="" class="input-text required-entry validate-cemail" type="email">
                        </span> </span> </li>
                      <li class="fields"> <span class="field">
                        <label for="comment" class="required"><em>*</em>Your Question</label>
                        <span class="input-box">
                        <textarea name="question" id="question" title="Question" class="required-entry input-text" cols="5" rows="3" style="height:6em;width: 232px;"></textarea>
                        </span> </span> <span class="field"> <span id="captcha-loader" style="display:none;margin-top:10px;"></span> <br>
                        <label for="message" class="required"><em>*</em>Enter code</label>
                        <span class="input-box">
                        <input id="6_letters_code" name="6_letters_code" type="text" class="input-text required-entry">
                        <br>
                        <small style="color:#555555;font-size:0.9em;font-style:italic;">Can't read the image? click <a href="javascript: refreshCaptcha();">here</a> to refresh</small> </span> </span> </li>
                    </ul>
                    </span> <span class="buttons-set"> 
                    <!--<p class="required">* Required Fields</p>-->
                    <button type="button" id="qabutton" onclick="checkValidation();" title="Send Your Question" class="button form-button"><span><span>Send Your Question</span></span></button>
                    <span id="submit-loader" style="display:none; float:left; margin-top:5px;"><img src="./ring_detail_files/opc-ajax-loader.gif" alt=""></span>
                    <button style="display:none" type="submit" id="submitme" title="submit me" class="button form-button"><span><span>submit me</span></span></button>
                    </span>
                  </form>
                  <script type="text/javascript">
//<![CDATA[
    var contactForm = new VarienForm('questionForm', true);
    Validation.addAllThese([
		['validate-cemail','Please make sure your emails match.',function(v) {
			var conf = $('confirmation') ? $('confirmation') : $$('.validate-cemail')[0];  
			var pass = false;
			var confirm;
			if($('email')) {
				pass = $('email');
			}
			confirm = conf.value;
			if(!confirm && $('email2'))
			{
				confirm = $('email2').value;
			}
			return(pass.value == confirm);
		}]
	]);
//]]>
</script> 
                  <script language="JavaScript" type="text/javascript">
		
		jQuery = jQuery.noConflict();
		
		function refreshCaptcha()
		{	
			jQuery('#captcha-loader').show();
					
			var url = BASE_URL+"captcha/index/getcaptch" ;
			   req = new Ajax.Request(
            url, 
            {
                parameters: {},
                onSuccess: function(t) {
				jQuery('#captcha-loader').hide();
				}});
		   var img = document.images['captchaimg'];
			img.src  = "captcha/index/getcaptch/rand/"+Math.random()*1000;	
			 
		}
		
		
		
		function checkValidation(){
			
		var emailCheck1 = validateEmail(jQuery('#email').val());
		var emailCheck2 = validateEmail(jQuery('#retypeemail').val());
		
		if(jQuery('#name').val()=="" || jQuery('#email').val()=="" || jQuery('#retypeemail').val()=="" || jQuery('#question').val()=="" || jQuery('#6_letters_code').val()=="" || jQuery('#email').val()!=jQuery('#retypeemail').val() || emailCheck1 ==false || emailCheck2==false){
		jQuery('#submitme').click();
		}else{
		jQuery('form#questionForm').find('.validation-failed').removeClass('validation-failed');
		jQuery('form#questionForm').find('.validation-advice').hide();
		submitQA();
		}
		
		}
		
		
		function validateEmail($email) {
			var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
				if( !emailReg.test( $email ) ) {
				return false;
			} else {
		return true;
		}
		}
			
		
		function submitQA(){
		
		jQuery('#submit-loader').show();
			
		var url = '<?php echo SITE_URLL; ?>productqa/index/addQuestion/';
			jQuery.ajax({
			url: url,
			type: 'post',
			dataType: 'json',
			data: jQuery('form#questionForm').serialize(),
			success: function(data) {
				jQuery('#submit-loader').hide();
				if(data.success==true){
					var msg = '<li class="success-msg">'+data.message+'</li>' ;
					jQuery('#msg-area').html(msg);
					jQuery('form#questionForm').trigger('reset');
				}else{
					var msg = '<li class = "error-msg">'+data.message+'</li>' ;
					jQuery('#msg-area').html(msg);
				}
				
			 
			 }
			});
			}	  
		</script> 
                </div>
                <div style="display: none;" id="tab8">
                  <div>Similar Products</div>
                  <?php echo $similar_products; ?>
                  <div class="clear"></div>
                </div>
                <div style="display: none;" id="tab9">
                  <div>Ring Polices</div>
                  <?php echo ringsPoliciesTabs(); ?> </div>
              </div>
            </div>
            <div class="clear"></div>
            <script type="text/javascript">
			//<![CDATA[
			var productAddToCartForm = new VarienForm('product_addtocart_form');
			productAddToCartForm.submit = function() {
				if(this.validator.validate()) {
					this.form.submit();
				}
			}.bind(productAddToCartForm);
			//]]>
			</script> 
            <script type="text/javascript">
	/* Load Lazy Images after some time, as it does not load new Images when slider from left to right. */
	jQuery(document).ready(function() {
		
		setTimeout(function(){			 
			jQuery('.prchased .owl-prchased .owl-item').each(function(){					
					var datasrc = jQuery(this).find('.item .alsoviwed-product-img img').attr('data-src');
					jQuery(this).find('.item .alsoviwed-product-img img').attr('src', datasrc);					
				});			
			}, 9000);		
	});
</script> 
            <script type="text/javascript">
 jQuery(document).ready(function() {
	  
      var owl = jQuery("#owl-viewed"); 

      owl.owlCarousel({

        itemsCustom : [
			[0, 1],
			[320, 2],
			[480, 2],
			[600, 4],
			[700, 5],
			[1000, 5],
			[1200, 5],
			[1400, 6],
			[1600, 6]
        ],
        navigation : true,
		pagination : false,
		autoPlay : true

      });


    });
</script>
            <div style="clear:both;"></div>
            <div class="viewed">
              <h2 class="headline"><span>Customers Who Viewed This Item Also Viewed</span></h2>
            </div>
            <script type="text/javascript">
	/* Load Lazy Images after some time, as it does not load new Images when slider from left to right. */
	jQuery(document).ready(function() {
		
		setTimeout(function(){			 
			jQuery('.viewed .owl-viewed .owl-item').each(function(){					
					var datasrc = jQuery(this).find('.item .alsoviwed-product-img img').attr('data-src');
					jQuery(this).find('.item .alsoviwed-product-img img').attr('src', datasrc);					
				});			
			}, 9000);		
	});
</script> 
          </div>
        </div>
      </div>
      <script type="text/javascript">
//<![CDATA[
var itemCode = "006767";
clearProductPageFpcCache(itemCode);
//]]>

jQuery(document).ready(function(){
	var current_url      = window.location.href; 
	if(current_url.indexOf('prod_detail')>-1)
	{
		jQuery('#content div').hide(); jQuery('#tabs li').attr('id',''); jQuery('#tabs li a[title=\'tab6\']').parent().attr('id','current'); jQuery('#review-form').css({'display':'none'}); jQuery('#div-customer-review-content').fadeIn(); jQuery('#tab6').fadeIn();
	}
	});
</script> 
      <script type="text/javascript">

    var CAPTION_POINT = 'Points';
    var CAPTION_POINTS = 'Points';
    var CAPTION_YOU_WILL_SPEND = 'You Will Spend';
    var CAPTION_WITH = 'with';
    var CAPTION_CANNOT_USE_POINTS = "You cannot use points until you login or create a new account.";
    var CAPTION_NOT_ENOUGH_POINTS = "You don't have enough points to use this redemption rule.";
    var CAPTION_REFRESHING_CART = 'Refreshing cart, please wait..';

</script> 
      <script type="text/javascript">
    document.observe("dom:loaded", function() {
        Validation.add(
        'validate-can_use_points', 
        CAPTION_CANNOT_USE_POINTS, 
        function(rule_id) {
            if(rule_id == "") {
                return true;
            } else {
                var can_use = rule_options[rule_id]['can_use_rule']; 
                return can_use;
            }
        }, 
        {}
    );
		
        Validation.add(
        'validate-has_enough_points', 
        CAPTION_NOT_ENOUGH_POINTS, 
        function(rule_id) {
            if(rule_id == "") {
                return true;
            } else {
                var can_use = rule_options[rule_id]['can_use_rule'];
                var amt = rule_options[rule_id]['points_amt']; 
                var curr = rule_options[rule_id]['points_currency_id'];
                
                var qty = parseInt($('qty').getValue());
                // fix NaN or bad value
                if( false == (qty > 0) )
                    qty = 1;
                
                var uses = parseInt($('redemption_rule_uses').getValue());
                // fix NaN or bad value
                if( false == (uses > 0) )
                    uses = 1;
                
                if (customer_points) {
                    if(customer_points[curr] >= qty*amt*uses) {
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return true;
                }
            }
        }, 
        {}
    );	  	  
    });

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
      <h3>Similar Items</h3>
      <div class="prdSidebarInn"> <?php echo $similar_items; ?> </div>
    </div>
  </div>
  <footer id=""> 
    <script type="text/javascript">
(function(a){(jQuery.browser=jQuery.browser||{}).mobile=/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))})(navigator.userAgent||navigator.vendor||window.opera);
// <![CDATA[
function showCompareFooter(val) {
	var posturl = '<?php echo SITE_URLL; ?>newsletter/subscriber/goisubscribe?email='+val;
	winCompare = new Window({className:'magento',title:'Sign up for special offers',id:'browser_window',url:posturl,destroyOnClose:true,width:650,height:445,minimizable:false,maximizable:false,showEffectOptions:{duration:0.4},hideEffectOptions:{duration:0.4}});
	winCompare.setZIndex(100);
		winCompare.showCenter(true);
}

function showSignUp(val) {
	var getc = getCookie('popup');
	if(getc=='' && !jQuery.browser.mobile) {
		var posturl = '<?php echo SITE_URLL; ?>newsletter/subscriber/signupsubscribe?email='+val;
		winCompare = new Window({className:'magento',title:'Sign up for special offers',id:'browser_window_signup',url:posturl,destroyOnClose:true,width:650,height:375,minimizable:false,maximizable:false,showEffectOptions:{duration:0.4},hideEffectOptions:{duration:0.4}});
		winCompare.setZIndex(100);
		winCompare.showCenter(true);
	}
}

function checkEmailssFooter(url) {
	var email = document.getElementById('newsletter_b');
	var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if(!filter.test(email.value)) {
		alert('Please provide a valid email address');
		return false;
	}
	else {
		showCompareFooter(email.value);
		return false;
	}
}

function checkEmailssFooterMob(url){
	var email = document.getElementById('newsletter_mob_b');	
	var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if(!filter.test(email.value)) {
		alert('Please provide a valid email address');
		return false;
	}
	else {
		//showCompareFooter(email.value);
		//return false;
	}
}

setTimeout(function(){
	showSignUp('');
	setCookie('popup','pop',30);
},120000);

function setCookie(cname,cvalue,exdays) {
	var d = new Date();
	d.setTime(d.getTime() + (exdays*24*60*60*1000));
	var expires = "expires="+d.toGMTString();
	document.cookie = cname + "=" + cvalue + "; " + expires;
}

function getCookie(cname) {
	var name = cname + "=";
	var ca = document.cookie.split(';');
	for(var i=0; i<ca.length; i++) {
		var c = ca[i].replace(/^\s+|\s+$/g,'');
		if(c.indexOf(name) == 0) return c.substring(name.length,c.length);
	}
	return "";
}

function PopUp() {
	document.getElementById('ac-wrapper').style.display="none";
}
        
// ]]>
</script> 
    <!-- Added by Amit JS on 17 Dec 2013 for Ask a question answer --> 
    <!-- BRIM_FPC recentview 1d6c7e1cf57dbce6e310c30ba46bdce6 -->
    
    <div class="qaSection">
      <h2 class="qaTitle">Previously Answered Question About this item</h2>
      <div class="qaSectionInner" id="product-q-a">
        <div class="question-entry">
          <div class="entry-comment">Q: are the diamonds GIA certified?</div>
          <div class="entry-answer">A: For the price listed, diamonds in this ring set are not GIA-certified, but we can customize this set for you with a GIA-certified diamond of your desired specifications, please give us a call directly to discuss center diamond options and to place a customized order.<br>
            <br>
          </div>
          <br>
        </div>
        <div class="question-entry">
          <div class="entry-comment">Q: does this ring come with certificate </div>
          <div class="entry-answer">A: Yes, this diamond engagement ring set comes with a gemological appraisal certificate stating the metal type, diamond carat weight, quality and approximate retail price; and can be used for insurance purposes.<br>
            <br>
          </div>
          <br>
        </div>
      </div>
    </div>
    
    <!-- /BRIM_FPC recentview --><!-- End --> 
    
    <!--Added by Amit JS on 03 Dec 2013 for featured banner--> 
    
    <!-- Added for Mob View : 06-06-2015 : --> 
    
    <script>
jQuery(document).ready(function() {
	jQuery('.go-top-link').click(function(event) {
        event.preventDefault();
        jQuery('html, body').animate({scrollTop: 0}, 700);
        return false;
    });
});
</script> 
  </footer>
</div>

<!-- Google Code for Remarketing Tag --> 
<!--------------------------------------------------
Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. See more information and instructions on how to setup the tag on: http://google.com/ads/remarketingsetup
---------------------------------------------------> 
<!-- BEGIN: buySAFE Seal --> 
<script src="<?php echo DEMO_RETAIL_JS; ?>rollover.js"></script>  
<!-- END: buySAFE Seal --> 

<!-- Using the JavaScript SDK -->

<!-- Using the JavaScript SDK --> 

<div id="productupdates-overlay"></div>
<div id="productupdates">
  <div id="punContent"></div>
  <div id="punLoadMessage"> <img src="<?php echo DEMO_RETAIL_IMG; ?>opc-ajax-loader.gif" class="v-middle" alt="" width="16" height="16"> &nbsp; Loading... </div>
</div>
<script type="text/javascript">
    Event.observe(document, "dom:loaded", function() {
        if (typeof window.twttr == 'undefined') {
            window.twttr = (function (d,s,id) {
                var t, js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return; js=d.createElement(s); js.id=id;
                js.src="//platform.twitter.com/widgets.js"; fjs.parentNode.insertBefore(js, fjs);
                return window.twttr || (t = { _e: [], ready: function(f){ t._e.push(f) } });
            } (document, "script", "twitter-wjs"));
        }
    });
</script> 
<script type="text/javascript">
    (function(d){
        var f = d.getElementsByTagName('SCRIPT')[0], p = d.createElement('SCRIPT');
        p.type = 'text/javascript';
        p.async = true;
        p.src = '//assets.pinterest.com/js/pinit.js';
        f.parentNode.insertBefore(p, f);
    }(document));
</script> 
<script type="text/javascript">
    var checkPinterestUri = '<?php echo SITE_URLL; ?>rewardssocial/index/processPin/';
</script>

<!-- popup blocks start! -->

<div class="p_body js__p_body js__fadeout"></div>
<div class="popup js__popup js__slide_top"> <a href="#" class="p_close js__p_close" title="Ask a Friend"> <span></span><span></span> </a>
  <form name="askFriendForm" id="askFriendForm" method="post" action="#">
    <div class="p_content">
      <div class="popupHeading">Ask a Friend&nbsp;<span class="validateMesage"></span></div>
      <div class="formArea">
        <div class="fieldBlock">
          <div class="fLabel">Your Name</div>
          <div class="columnSection">
            <input type="text" name="frien_fname" id="frien_fname" />
            <br />
            <span>First Name</span> </div>
          <div class="columnSection">
            <input type="text" name="frien_lname" id="frien_lname" />
            <br />
            <span>Last Name</span> </div>
          <div class="clear"></div>
        </div>
        <div class="fieldBlock">
          <div class="fLabel">Your Email</div>
          <div>
            <input type="text" name="frien_email" id="frien_email" class="fullTextField" />
          </div>
        </div>
        <div class="fieldBlock">
          <div class="fLabel">Friend Name</div>
          <div class="columnSection">
            <input type="text" name="frien_frfname" id="frien_frfname" />
            <br />
            <span>First Name</span> </div>
          <div class="columnSection">
            <input type="text" name="frien_frlname" id="frien_frlname" />
            <br />
            <span>Last Name</span> </div>
          <div class="clear"></div>
        </div>
        <div class="fieldBlock">
          <div class="fLabel">Friend Email</div>
          <div class="">
            <input type="text" name="frien_fremail" id="frien_fremail" class="fullTextField" />
          </div>
        </div>
        <div class="fieldBlock">
          <div class="fLabel">Description / Message</div>
          <div class="">
            <textarea name="frein_desc" id="frein_desc"></textarea>
          </div>
        </div>
        <div class="fieldBlock">
          <input type="hidden" name="details_link" id="details_link" value="<?php echo 'qualitygoldrings/quality_ring_detail/'.$rowsring['id']; ?>" />
          <input type="button" name="btn_fnsubmit" class="btnStyle" onclick="friendForm()" value="Submit" />
        </div>
      </div>
    </div>
  </form>
</div>
<!-- second popup block -->
<div class="popup js__another_popup js__slide_top"> <a href="#" class="p_close js__p_close" title="As an Expert"> <span></span><span></span> </a>
  <form name="askExpertForm" id="askExpertForm" method="post" action="#">
    <div class="p_content">
      <div class="popupHeading">Ask an Expert&nbsp;<span class="expertVdMessage"></span></div>
      <div class="formArea">
        <div class="fieldBlock">
          <div class="fLabel">Name</div>
          <div class="columnSection">
            <input type="text" name="exprt_fname" id="exprt_fname" />
            <br />
            <span>First Name</span> </div>
          <div class="columnSection">
            <input type="text" name="exprt_lname" id="exprt_lname" />
            <br />
            <span>Last Name</span> </div>
          <div class="clear"></div>
        </div>
        <div class="fieldBlock">
          <div class="fLabel">Email</div>
          <div>
            <input type="text" name="exprt_email" id="exprt_email" class="fullTextField" />
          </div>
        </div>
        <div class="fieldBlock">
          <div class="fLabel">Phone No.</div>
          <div>
            <input type="text" name="exprt_pno" id="exprt_pno" class="" />
          </div>
        </div>
        <div class="fieldBlock">
          <div class="fLabel">How did you hear about us?</div>
          <div>
            <select name="exprt_hear" id="exprt_hear">
              <option value="">Select</option>
              <option>Search Engine</option>
              <option>Yahoo</option>
              <option>Bing</option>
              <option>Google</option>
              <option>Friends</option>
              <option>Family</option>
              <option>Other Sources</option>
            </select>
          </div>
        </div>
        <div class="fieldBlock">
          <div class="fLabel">Description</div>
          <div class="">
            <textarea name="exprt_desc" id="exprt_desc"></textarea>
          </div>
        </div>
        <div class="fieldBlock">
          <input type="hidden" name="details_link" id="details_link" value="<?php echo 'qualitygoldrings/quality_ring_detail/'.$rowsring['id'];?>">
          <input type="button" name="btn_exsubmit" class="btnStyle" onclick="askExperForm()" value="Submit" />
        </div>
      </div>
    </div>
  </form>
</div>
<!-- popup blocks end! --> 
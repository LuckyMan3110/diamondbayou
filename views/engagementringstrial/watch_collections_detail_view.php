<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script language="javascript" src="<?php echo SITE_URL; ?>js/jquery.popup.js" type="text/javascript"></script>
<style>
    .similar_collection .sp{width:453px;}
    .collection_detail_hover .addtocart_icon{ width: 100px; padding: 8px 0px 8px 0px;}
    .quick_view{top:10px !important;}

    .collection_listings .set_bk_height{
        width: 32%;
    }
    #similar-settings, #matching-wedding-bands {
        padding: 0 10px;
    }
</style>

<!--<link href="<?php echo SITE_URL; ?>css/magnific-popup.css" rel="stylesheet">-->
<script>
    var $ = jQuery.noConflict();
    
function getRingSize(field_id) {
 var mt = document.getElementById(field_id).value;
 window.location = mt;	
}
function ringThumbView(th_url) {
    $('#ringsthumb_view .sp').hide();
    $('#ex1').hide();
    $('#show_thumb_view').html('Loading.....');
    $('#show_thumb_view').html('<img src="'+th_url+'" onmouseover="show_magnify_affect(\'show_thumb_view\')" alt="show_thumb_view" />');
    $('#show_thumb_view').zoom();
}

///// show and hide product deail tabs
function show_tabs_block_detail(blockid) {
    var idar_list = ["product_details", "customer_reviews", "ask_questins", "similar_products", "policies"];
    
    $('#'+blockid).show();
    
    for(var i=0; i < idar_list.length; i++) {
        
        if( idar_list[i] !== blockid ) {
                $('#'+idar_list[i]).hide();
            }
    }
}

//// onclick show and hide block
function show_hide_block() {
    
    }
    
function commentsThisPost() {
	var urlink = base_url+'site/postRingComents';
	
	dataString = $("#coment_form").serialize();
	var fname = $('#full_name').val();
	var em = $('#email_adres').val();
	var coments = $('#tr_comments').val();
	var eror = '';
	
	<?php
		if(!$this->session->isLoggedin())
		{
	?>
		$('#view_errors').html('Plz login to your account first to comments this product!');
		return false
	<?php
		}
	?>
	if(fname == '') {
		$('#full_name').focus();
		$('#view_errors').html('Please enter your Full name!');
		return false
	}
	if(em == '') {
		eror = 'Please enter your email address!';
		$('#email_adres').focus();
		$('#view_errors').html('Please enter your email address!');
		return false
	}
	if(coments == '') {
		$('#tr_comments').focus();
		$('#view_errors').html('Please enter your comments!');
		return false
	}
	$("#view_coments").html('');
	
	$.ajax({
		 type: "POST",
		 url:urlink,
		 data: dataString,
		 success: function(data) {
			 $('#view_errors').html('<div class="set_center_margin"><img src="'+base_url+'images/loading.gif" alt="loading"></div>');
			 $("#view_errors").html(data);
			 //$('#full_name').val('');
			 //$('#email_adres').val('');
			 $('#tr_comments').val('');
			 $('#cmb_rating').val('');
			 //$('#comprForm').submit();
		},
		error: function(){alert('Error ');}
	  });
} 

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
 function addcartsubmit(pageURL)
    {
        document.getElementById('collection_form').action = pageURL;
        document.getElementById('collection_form').submit();
    }
    
 function setListingPage(option_value) {
     window.location = option_value;
 }
 
 function set_detail_blocks(id_block) {                    
        var bk = ["diamond_detail_bk", "ring_detail_bk"];
        var link_bk = ["diamonds_link", "rings_link"];

        for(var i=0; i < bk.length; i++) {
            if( bk[i] === id_block ) {
                $('#'+bk[i]).show();
                $('#'+link_bk[i]).addClass('sel_active_tabs');
            } else {
                $('#'+bk[i]).hide();
                $('#'+link_bk[i]).removeClass('sel_active_tabs');
            }
        }
    }
</script>
<script>
    $(document).ready(function() { 
        $('#topbar_block').click(function() {
            $('html,body').animate({ scrollTop: 0 }, 1000);
            return false;
        });
    });
    $(document).scroll(function () {
        //Show element after user scrolls 800px
        var y = $(this).scrollTop();
        if (y > 200) {
            $('.topbar_section').fadeIn();
        } else {
            $('.topbar_section').fadeOut();
        }                
    });
</script>
<link type="text/css" href="<?php echo SITE_URL; ?>css/zoom_jquery.css" rel="stylesheet" />
<script src="<?php echo SITE_URL; ?>js/jquery.zoom.js"></script>
<script>
        $(document).ready(function(){
                //$('#ex1').zoom();
                $('.sp').zoom();
                $('#show_thumb_view').zoom();
                $('#show_thumb_view .sp img').scroll(zoom);
        });
</script>
<script language="javascript" src="<?php echo SITE_URL; ?>js/common_function.js" type="text/javascript"></script>
<!--<script src="<?php echo SITE_URL; ?>js/jquery-1.11.3.min.js"></script>
<link type="text/css" href="<?php echo SITE_URL; ?>css/jquery.popup.css" rel="stylesheet" />
<script language="javascript" src="<?php echo SITE_URL; ?>js/jquery.popup.js" type="text/javascript"></script>-->
<script>
    var $ = jQuery.noConflict();
    
    function printCurrPage() {
        window.print();
    }
  $(function() {
    ////// call popup scirpt
    $(".js__p_start, .js__p_another_start").simplePopup();
  });
</script>
<?php
$diamond_carat_value = _nf($rowsring['carat'], 2);
$carat_margin = getCaratMargin( $diamond_carat_value );
?>
<style>
    .diamond_carat_bg{background: url('../../../../img/david_home/diamond_search/carat_diamond_bg_view.jpg') center no-repeat; width: 100%; height: 137px;}
    .diamond_carat_bg div{background: url('../../../../img/david_home/diamond_search/carat_bg_value.png') left no-repeat; width: 189px; height: 159px; display: inline-block; margin:5.4em 0px 0px <?php echo $carat_margin; ?>;}
    .diamond_carat_bg div span{display: inline-block; font-size: 20px; padding: 4.2em 0px 0px 24px; color:#fff;}
    .ring_img_block{position:relative; max-height:450px; height:100%;}
    </style>
<div class="diamondViewDetail container collection_detail_view">
<?php
$options_list = array('addpendantsetings3stone','tothreestone');

    $diamond_desc = 'This fair-cut '.$row_detail['cut'].', '.$row_detail['color'].'-color and '.$row_detail['clarity'].'-clarity diamond comes accompanied by a diamond grading report from the '.$row_detail['Cert'].'. <br>Have a question regarding this item? Our specialists are available to assist you.';
    $addring_link = config_item('base_url').'engagement/engagement_ring_settings/'.$lot.'/addtoring';
    $option_setting = setOptionValue($addoption);
    $diamondOption = ( ( $addoption == 'false' || $addoption === 'addjewelry' ) ? 'rapnet' : $addoption );
    $addring_pairlink = config_item('base_url').'diamonds/search/true/false/'.$option_setting.'/false/'.$lot;
    $diamondTitle = _nf($row_detail['carat'], 2) . '-Carat ' .$diamond_shape . ' Diamond';
    //echo wordwrap($diamond_desc, 50, "<br>\n");
    $watch_brand = base64_encode($rowsring['brand']);
    ?>
    <div>
        <ul class="bread_crumb_list">
            <li><a href="<?php echo SITE_URL; ?>">Home</a></li> > 
            <li><a href="<?php echo SITE_URL; ?>goldsourcediamond/goldsource-watch-collection-listing/RyBTaG9jaw==/"><?= SITES_NAME ?> collection</a></li> > 
            <?php 
                /*$newarr = strchr($ringimg, 'no_image_found.jpg');
                if( empty($newarr) ) {
                    echo ' > <li><a href="'.SITE_URL.'goldsourcediamond/goldsource-watch-collection-listing/RyBTaG9jaw==/">New Arrivals</a></li>';
                }
                echo $bread_crumb_link; */
            ?>
            <li><a href="<?php echo SITE_URL; ?>goldsourcediamond/goldsource-watch-collection-listing/<?= $watch_brand ?>/"><?= $rowsring['brand'] ?></a></li> > 
            <li><a href="#"><?= $rowsring['productName'] ?></a></li>
        </ul>
    </div>
    <div class="moredetail_bgblock daviddt_block">      
        <div class="container">
            <hr />
            <?php            
            
                if( $rowsring['category'] == 3292598018 ) {
            ?>
            <div class="set_steps_bar" id="builder_stpes_bar"><img src="<?php echo SITE_URL; ?>img/heart_diamond/ring_builder_steps.jpg" alt="ring_builder_steps" /></div>
                <?php } ?>
            <div id="content-wrapper">
    <div id="image-viewer-details-and-purchase" class="clearfix">
      <section class="small-only title-area">
        <div class="product-title">
          <h1 class="product-title" itemprop="name"><?php echo SITES_NAME; ?> Studio Heiress Halo Diamond Engagement Ring<span class="sub-text"> in Platinum (2/5 ct. tw.)</span></h1>
        </div>
      </section>
      <div class="left-half">
        <div class="detail_center">
                    <div class="ring_img_block">
                        <div class="zoomright" id="ringsthumb_view">
                            <div class="set_thumb_img" id="<?php echo $rowsring['stock_number'];?>">                                
                            <div class="" id="show_thumb_view"></div>
                                  <?php //echo $product_thums;?>
                            <div class="image_section">
                                <?php
                                echo $product_thumbs;
                                ?>
                            </div>
                            </div> 
                            <div class="left_arrow_view"><a href="#javascript" onclick="button_previous('<?php echo $rowsring['stock_number'];?>')"><img src="<?php echo SITE_URL; ?>img/heart_diamond/left_arrow_icon.jpg" alt="left_arrow_icon" /></a></div>
        <div class="right_arrow_view"><a href="#javascript" onclick="button_next('<?php echo $rowsring['stock_number'];?>')"><img src="<?php echo SITE_URL; ?>img/heart_diamond/right_arrow_icon.jpg" alt="right_arrow_icon" /></a></div>
                        </div>
                        <div class="clear"></div><br>
                        <div class="rings_thumbs">
                            <?php echo $rings_thumb; 
                                if( !empty($prod_thumbs['popup_thumbs']) ) {
                                    echo '<div class="smalimgview"><div class="popup-gallery">'.$prod_thumbs['popup_thumbs'].'</div></div>';
                                }
                            ?>
                            <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div><br><br>
                </div>
          <section id="recently-purchased-rings-medium" data-setting-id="50575" data-show-rpr="false">
              <?php echo $recently_purchased; ?>
          </section>
      </div>
        <form name="collection_form" id="collection_form" method="post" action="">
            <div class="right-half">
        <section class="title-area">
          <div class="product-title medium-and-large-only">
            <h1 class="product-title" itemprop="name"><?php echo $heart_title; ?> <span class="sub-text"> in <?php echo $rowsring['metal']; ?> (<?php echo check_empty($rowsring['carat'], 'NA'); ?>)</span></h1>
          </div>
          <section id="special-attention-message">
              <div class="countdown-message available-to-sell-messaging active-available-to-sell-message" data-skus=""> <strong><i class="free-shipping-icon"><img src="<?php echo SITE_URL; ?>collection_detail/free_shipping_icon.jpg" alt="free_shipping_icon" /></i>FedEx &reg; Shipping</strong><br>
              Delivery time varies by the diamond and setting you select. </div>
              
          </section>
          
            <div class="further_dtcols metalsection ringsize set_ezpay">
                
            <script>
                function selectEzPay(){
                    
                    var ez_payments     = $("#ez_payments").val();
                    var get_real_price  = $("#get_real_price").val();
                    
                    if(ez_payments == 3){
                        var show_real_price = addCommas(get_real_price/ez_payments);
                        $("#show_real_price_msg").html('Pay $'+show_real_price+' today and $'+show_real_price+' for the next 2 months than we will shipped product');
                    }else if(ez_payments == 5){
                        var show_real_price = addCommas(get_real_price/ez_payments);
                        $("#show_real_price_msg").html('Pay $'+show_real_price+' today and $'+show_real_price+' for the next 4 months than we will shipped product');
                    }else{
                        var show_real_price = addCommas(get_real_price);
                        $("#show_real_price_msg").html('<?php echo $cate_name; ?> Price');
                    }
                    $("#show_real_price").html('$'+show_real_price);
                    
                }
                
                function addCommas(nStr){
                	nStr += '';
                	x = nStr.split('.');
                	x1 = x[0];
                	x2 = x.length > 1 ? '.' + x[1] : '';
                	var rgx = /(\d+)(\d{3})/;
                	while (rgx.test(x1)) {
                		x1 = x1.replace(rgx, '$1' + ',' + '$2');
                	}
                	return x1 + x2;
                }
            </script>
            
                <?php
                    $first_ez_value     = 3;
                    $second_ez_value    = 5;
                ?>
                
                <span>Ez Pay <a href="#"  data-toggle="tooltip" data-placement="top" title="This is tooltip message!"><i class="fa fa-info-circle"></i></a> </span>
                <select name="ez_payments" id="ez_payments" class="form-control" onChange="selectEzPay()">
                    <option value="0">Full Price - $<?php echo _nf($sales_price, 2) ; ?></option>
                    <option value="<?php echo $first_ez_value; ?>"> <?php echo $first_ez_value; ?> ez - $<?php echo _nf($sales_price/$first_ez_value, 2) ; ?> </option>
                    <option value="<?php echo $second_ez_value; ?>"> <?php echo $second_ez_value; ?> ez - $<?php echo _nf($sales_price/$second_ez_value, 2) ; ?> </option>
                </select> 
                
            </div>
            
          <div class="price-and-purchase">
            <div class="price-with-button force-wrap" data-smart-wrap="true">
              <div class="price-display">
                <div class="regular-price">
                  <span class="price" id="show_real_price" itemprop="price" content="2990.00">$<?php echo _nf($sales_price, 2) ; ?></span>
                </div>
                <span class="price-message" style="text-transform: uppercase;">( <span id="show_real_price_msg" style="color:#F52237;"><?php echo $rowsring['brand']; ?> Price </span>)</span> </div>
            </div>
            <div class="action-buttons clearfix">
<!--                 <input type="hidden" name="txt_rstyle" id="txt_rstyle" value="<?php echo $rowsring['ring_style']; ?>" />
                <input type="hidden" name="3ez_price" value="" />
                <input type="hidden" name="5ez_price" value="" />
                <input type="hidden" name="main_price" id='main_price' value="<?php echo $sales_price; ?>" />
                <input type="hidden" name="price" value="<?php echo $sales_price; ?>" />
                <input type="hidden" name="vender" value="goldsourcejewelry_diamond_collection">
                <input type="hidden" name="url" value="<?php echo $ringimg; ?>">
                <input type="hidden" name="prodname" value="<?php echo $heart_title; ?>" />
                <input type="hidden" name="diamnd_count" value="<?php echo $rowsring['diamond_count']; ?>">
                <input type="hidden" name="ring_shape" value="<?php echo $rowsring['shape']; ?>" />
                <input type="hidden" name="ring_carat" value="<?php echo $rowsring['carat']; ?>" />
                <input type="hidden" name="prid" id="prid" value="<?php echo $rowsring['stock_number'];?>" />
                <input type="hidden" name="txt_ringtype" value="goldsourcejewelry_diamond_collection" />
                <input type="hidden" name="txt_ringsize" value="" />
                <input type="hidden" name="txt_metal" value="<?php echo $rowsring['metal']; ?>" />
                <input type="hidden" name="metals_weight" value="<?php echo $rowsring['weight']; ?>" />
                <input type="hidden" name="vendors_name" value="<?= SITES_NAME ?> Collection" />
                <input type="hidden" name="txt_addoption" value="goldsourcejewelry_diamond_collection" />
                <input type="hidden" name="center_stone_id" id="center_stone_id" /> -->

              <input type="hidden" name="txt_rstyle" id="txt_rstyle" value="<?php echo $setingtype; ?>">
              <input type="hidden" name="3ez_price" value="<?php echo intval(number_format($sales_price/3,0,'.','')); ?>">
              <input type="hidden" name="5ez_price" value="<?php echo intval(number_format($sales_price/5,0,'.','')); ?>">
              <input type="hidden" name="main_price" id='main_price' value="<?php echo $sales_price; ?>" />
              <input type="hidden" name="price" id="get_real_price" value="<?php echo $sales_price; ?>" />
              <input type="hidden" name="vender" value="unique">
              <input type="hidden" name="url" value="<?php echo $ringimg; ?>">
              <input type="hidden" name="prodname" value="<?php echo $heart_title; ?>">
              <input type="hidden" name="diamnd_count" value="<?php echo $rowsring['supplied_stones'];?>">
              <input type="hidden" name="ring_shape" value="<?php echo $suport_shape;?>">
              <input type="hidden" name="ring_carat" value="<?php echo $rowsring['metal_weight']; ?>">
              <input type="hidden" name="prid" id="prid" value="<?php echo $rowsring['productID'];?>">
              <input type="hidden" name="stock_number" id="stock_number" value="<?php echo $rowsring['stock_real_number'];?>">
              <input type="hidden" name="txt_ringtype" value="<?php echo $rowsring['brand']; ?>">
              <input type="hidden" name="txt_ringsize" value="<?php if(isset($_GET['ring_size'])){ echo $_GET['ring_size']; }else{ echo  $set_ring_size; };?>" />
              <input type="hidden" name="txt_metal" value="<?php echo $rowsring['metal']; ?>" />
              <input type="hidden" name="metals_weight" value="<?php echo $rowsring['width']; ?>" />
              
              <input type="hidden" name="vendors_name" value="Johnny Dang" />
              <input type="hidden" name="vendor_number" value="713-777-2026" />
              <input type="hidden" name="table_name" value="dev_watches" />
              <input type="hidden" name="item_title" value="<?php echo $heart_title; ?>" />
              <input type="hidden" name="item_url" value="<?php echo $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" />
              <input type="hidden" name="product_type" value="<?php echo $rowsring['brand']; ?>" />
              
              <input type="hidden" name="center_stone_id" id="center_stone_id" />
              <input type="hidden" name="txt_qty" value="1" />


              <div class="button-display">
                <div class="drop-down-action-button ">
                    <?php
                        if( $stone_count == 1 || $stone_count == 2 || empty($stone_count) ) {
                            echo '<a class="main-button blue-nile-button blue" href="#javascript" onclick="addcartsubmit(\''.$buynow_link.'\')">
                                <div class="main-text">
                                  <div class="processing-icon"></div>
                                  Buy Now</div>
                                </a>';
                        } else {
                            echo 'Please Call ' . CONTACT_NO . ' for pricing';
                        }
                    ?> 
                </div>
              </div>
            </div>
          </div>
          <div class="review-and-social">
            <div class="product-rating-stars " data-action="scroll-to-review">
              <div class="offer-rating">

                <!-- <div><img src="<?php echo SITE_URL; ?>collection_detail/customer_rating_stars.jpg" alt="<?php echo SITES_NAME; ?> Studio" /></div> -->

                <div class="rating-values"> <span>4.8</span> (<span><a href="#" data-target="customer-review">9</a></span>) </div>
              </div>
              <!-- <div class="review-count" data-review-count="9">(9 customer rating<span class="plural">s</span>)</div> -->
            </div>
            <div class="social-icons">
              <div class="group-of-icons"> 
                  <a href="#"><img src="<?php echo SITE_URL; ?>collection_detail/social_icon_set_1.jpg" alt="<?php echo SITES_NAME; ?> Studio" /></a>
                  <a href="#"><img src="<?php echo SITE_URL; ?>collection_detail/social_icon_set_2.jpg" alt="<?php echo SITES_NAME; ?> Studio" /></a>
                  <a href="#"><img src="<?php echo SITE_URL; ?>collection_detail/social_icon_set_3.jpg" alt="<?php echo SITES_NAME; ?> Studio" /></a>
                  <a href="#"><img src="<?php echo SITE_URL; ?>collection_detail/social_icon_set_4.jpg" alt="<?php echo SITES_NAME; ?> Studio" /></a>
                  <a href="#"><img src="<?php echo SITE_URL; ?>collection_detail/social_icon_set_5.jpg" alt="<?php echo SITES_NAME; ?> Studio" /></a>
                  <a href="#"><img src="<?php echo SITE_URL; ?>collection_detail/social_icon_set_6.jpg" alt="<?php echo SITES_NAME; ?> Studio" /></a>
<!--                <button class="icon-print"></button>
                <span class="icon-envelope"></span>-->
                <button class="icon-share" data-hasqtip="1"></button>
              </div>
            </div>
          </div>
        </section>
        <section id="product-description" itemprop="description"> <?php echo $heart_title . ' in ' . $rowsring['metal']; ?> </section>
        
        
        <section id="setting-information-table">
          <div class="detail-table">
                 
            <div class="row detail even first">
              <div data-unique-id="stock-number-column-0" class="column-0 "> <span> Item Number </span> </div>
              <div data-unique-id="stock-number-column-1" class="column-1 "> <span> <?php echo $rowsring['stock_real_number']; ?> </span> </div>
            </div>
            
            <?php if($rowsring['metal'] != ''){ ?>
            <div class="row detail">
              <div data-unique-id="stock-number-column-0" class="column-0 "> <span> Metal </span> </div>
              <div data-unique-id="stock-number-column-1" class="column-1 "> <span> <?php echo $rowsring['metal']; ?> </span> </div>
            </div>
            <?php } ?>
            
            <?php if($rowsring['brand'] != ''){ ?>
            <div class="row detail">
              <div data-unique-id="stock-number-column-0" class="column-0 "> <span> Brand </span> </div>
              <div data-unique-id="stock-number-column-1" class="column-1 "> <span> <?php echo $rowsring['brand']; ?> </span> </div>
            </div>
            <?php } ?>
            
            <?php if($rowsring['width'] != ''){ ?>
            <div class="row detail">
              <div data-unique-id="stock-number-column-0" class="column-0 "> <span> Width </span> </div>
              <div data-unique-id="stock-number-column-1" class="column-1 "> <span> <?php echo $rowsring['width']; ?> </span> </div>
            </div>
            <?php } ?>
            
            <?php if($rowsring['condition'] != ''){ ?>
            <div class="row detail">
              <div data-unique-id="stock-number-column-0" class="column-0 "> <span> Condition </span> </div>
              <div data-unique-id="stock-number-column-1" class="column-1 "> <span> <?php echo $rowsring['condition']; ?> </span> </div>
            </div>
            <?php } ?>
            
            <?php if($rowsring['band_length'] != ''){ ?>
            <div class="row detail">
              <div data-unique-id="stock-number-column-0" class="column-0 "> <span> Band Length </span> </div>
              <div data-unique-id="stock-number-column-1" class="column-1 "> <span> <?php echo $rowsring['band_length']; ?> </span> </div>
            </div>
            <?php } ?>
            
            
            <div class="row contains-link">
              <div class="column-0"></div>
              <div class="column-1"> <a href="#" class="arrowed">Find your ring size</a> </div>
            </div>
          </div>
          
          
            
            <?php if($rowsring['productDescription'] != ''){ ?>
            <br>
            <p> 
                <?php echo $rowsring['productDescription']; ?>
            </p> 
            <?php } ?>
            
        </section>
        <section id="contact-information">
          <div class="">
            <div class="text need_help_cols">
              <h4>Need Help?</h4>
              <p>Your questions or feedback are always welcome at <?php echo SITES_NAME; ?>.  Join in a conversation with one of our Diamond and Jewelry Consultants to help you make the right decision.</p>
            </div>
            <div class="contact_right_cols">
              <div class="link-wrapper"> 
                  <div>
                      <a href="tel:<?php echo CONTACT_NO; ?>">
                        <i class="set_icon_space"><img src="<?php echo SITE_URL; ?>collection_detail/phone_contact_icon.jpg" alt="phone_contact_icon" /></i>
                        <span><?php echo CONTACT_NO; ?></span>
                      </a>
                  </div>                   
                  <div>
                      <a href="mailto:<?php echo SITE_EMAIL; ?>">
                        <i class="set_icon_space"><img src="<?php echo SITE_URL; ?>collection_detail/email_contact_icon.jpg" alt="email_contact_icon" /></i><span>Email Us</span>
                      </a> 
                  </div>
              </div>
            </div>
          </div>
        </section>
      </div>
        </form>
    </div>
    <a name="similarItemAnchor"></a>
    <div id="setting-information">
      <div class="separator"> <span class="text">Similar Watches</span> </div><br>
      <section id="similar-settings">
          <div class="rings_block collection_listings">
              
                <?php echo $more_collection_listings['listings'].$more_collection_listings['popup_block']; ?>
                
                <div class="clear"></div>
            </div>
      </section>


      <div class="separator"><span class="text">About the designer</span></div>
      <section id="branding-section" class="horizontal-group">
        <div class="information-cell">
          <div> <img src="<?php echo SITE_URL; ?>uploads/111_sitelg_6b95b216-059b-43de-9e23-f3f38cf5d086.jpg" alt="<?php echo SITES_NAME; ?> Store" title="<?php echo SITES_NAME; ?> Store"> </div>
          <div>
            <h2><span class="collapsible">About The Designer: </span><span class="collapsible"><?php echo SITES_NAME; ?> Store</span></h2>
            <p><span><?php echo SITES_NAME; ?> Store is an exceptional collection of crafted by industry-leading designers and inspired by their years of experience and personal reflection. </span><span class="collapsible">Defined by <?php echo SITES_NAME; ?>'s classic style, with the highest regard to quality, this is everyday elegance at its finest. </span></p>
          </div>
        </div>
      </section>

      <div class="about-your-ring separator"> <span class="text">About Your <?php echo SITES_NAME; ?> <?php echo $rowsring['brand']; ?></span> </div>
      <section class="horizontal-group preset-stone-information first"><img src="<?php echo $ringimg; ?>" width="35%" class="background" style="right: 0px;">
        <div class="wrapper">
          <div class="content">
            <h2>Product Information</h2>
            <div class="characteristics">
              <div class="characteristic-row">

                <?php if($rowsring['metal'] != ''){ ?>
                <div class="characteristic">
                  <div class="label">Metal Type</div>
                  <div class="value"><?php echo $rowsring['metal']; ?></div>
                </div>
                <?php } ?>

                <?php if($rowsring['brand'] != ''){ ?>
                <div class="characteristic">
                  <div class="label">Brand</div>
                  <div class="value"><?php echo $rowsring['brand']; ?></div>
                </div>
                <?php } ?>

              </div>
              <div class="characteristic-row">

                <?php if($rowsring['width'] != ''){ ?>
                <div class="characteristic">
                  <div class="label">Width</div>
                  <div class="value"><?php echo $rowsring['width']; ?></div>
                </div>
                <?php } ?>

                <?php if($rowsring['condition'] != ''){ ?>
                <div class="characteristic">
                  <div class="label">Condition</div>
                  <div class="value"><?php echo $rowsring['condition']; ?></div>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </section>




      <div class="separator"></div>

<style type="text/css">
.preset-stone-information.horizontal-group .wrapper {
    height: 340px;
    margin: 0;
    width: 600px;
}
</style>


    </div>
    
  </main>
  
</div>
        </div>
    </div>
    <div class="clear"></div>
</div>
    <input type="hidden" name="liting_class" id="liting_class" value="" />
<script>
function centerStoneDiamondList(ringid, c_id, diamond_count) {
    var opt = $('#finished_level').val();
    $('#center_diamond_list').html('<div class="wait_data">LOADING PLEASE WAIT.....</div>');
    $('#diamond_detail_bk').show();
    $('.selection_tabs_bk').show();
    
    //if( opt === 'complete_stone' ) {
        $.ajax({
            type: "POST",
            url: base_url + 'heartdiamond/view_center_stone/' + ringid + '/' +diamond_count,
            success: function(response) {
                     $('#center_diamond_list').html(response);
           },
                     error: function(){alert('Error ');}
        });
        
        show_diamond_result_detail();
        get_left_diamond_detail(ringid, 'ring');
        
//    } else {
//        $('#center_diamond_list').html('');
//    }
}
function show_diamond_result_detail() {
    $.ajax({
            type: "POST",
            url: base_url + 'heartdiamond/view_diamond_result/',
            success: function(response) {
                     $('#diamond_detail_bk').html(response);
           },
                     error: function(){alert('Error ');}
        });
}

function get_left_diamond_detail(ringid, type) {
    $.ajax({
            type: "POST",
            url: base_url + 'heartdiamond/get_diamond_result_detail/'+encodeURI(ringid)+'/'+type,
            success: function(response) {
                     $('#center_stone_detail').html(response);
           },
                     error: function(){alert('Error ');}
        });
}
</script>
<script src="<?php echo SITE_URL; ?>js/jquery.simplePopup.js" type="text/javascript"></script>
<script type="text/javascript">
    function view_simple_popup(block_vid) {
        jQuery('#pop_' + block_vid).simplePopupBlock();
    }
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
<div class="p_body js__p_body js__fadeout"></div>
  <div class="popup js__popup js__slide_top"> <a href="#" class="p_close js__p_close" title="Email a Friend"> <span></span><span></span> </a>
    <form name="askFriendForm" id="askFriendForm" method="post" action="#">
      <div class="p_content">
        <div class="popupHeading">Email a Friend&nbsp;<span class="validateMesage"></span></div>
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
            <input type="hidden" name="details_link" id="details_link" value="<?php echo 'diamonds/diamond_detail/'.$row_detail['Stock_n'].'/false/';?>">
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
            <input type="hidden" name="details_link" id="details_link" value="<?php echo 'diamonds/diamond_detail/'.$row_detail['Stock_n'].'/false/';?>">
            <input type="button" name="btn_exsubmit" class="btnStyle" onclick="askExperForm()" value="Submit" />
          </div>
        </div>
      </div>
    </form>
  </div>
  
  <!-- top bar add to cart block start -->
<div class="topbar_section hide_block">
            <div class="top_bar_cart">
                <div class="topbar_left">
                    <div class="topbar_imgleft"><img src="<?php echo $ringimg; ?>" width="74" alt="<?php echo $ringtitle; ?>" /></div>
                    <div class="topbar_imgright">
                        <div class="topbar_heading"><?php echo $ringtitle; ?></div>
                        <div class="topbar_label"><?php echo $heart_title; ?> </div>
                        <div class="topbar_label">in <span style="text-transform: capitalize;"><?php echo $rowsring['brand']; ?></span></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="topbar_right">
                    <div class="topbar_cart_left">
                        <span style="font-size:30px;">$<?php echo _nf($sales_price, 2) ; ?></span> <a href="#" class="addtocart_btn" onclick="addcartsubmit('<?php echo $buynow_link; ?>')">Add To Cart</a>
                        <a href="#" class="addtowishlist_btn" onclick="addcartsubmit('<?php echo $buynow_link; ?>')">Add To Wishlist</a>
                    </div>
                    <div class="topbar_cart_right"><a href="#javascript" id="topbar_block"><img src="<?php echo SITE_URL; ?>img/heart_diamond/top_option_icon.jpg" alt="top_option_icon"/></a></div>
                </div>
                <div class="clear"></div>
            </div>
            <br>
            </div>


 <style type="text/css">
    .topbar_left{
        width: 43%;
    }
    .topbar_right{
        width: 56.50%;
    }
    .addtowishlist_btn {
        background: #666666;
        max-width: 195px;
        width: 100%;
        padding: 16px 10px;
        text-align: center;
        text-transform: capitalize;
        display: inline-block;
        color: #fff;
        margin-top: 17px;
    }
    .addtowishlist_btn:hover, .addtowishlist_btn:hover{
        background: #006495;
    }    
    .topbar_cart_left {
        float: left;
        width: 83%;
    }
  </style>
             
<!-- top bar add to cart block end -->
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<!--<script src="<?php echo SITE_URL; ?>js/jquery.min.js"></script>
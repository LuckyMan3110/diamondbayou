<!--<script src="https://code.jquery.com/jquery-1.10.2.js"></script>-->
<script language="javascript" src="<?php echo SITE_URL; ?>js/jquery.popup.js" type="text/javascript"></script>
<style>
    .similar_collection .sp{height: 100%;}
    .collection_detail_hover .addtocart_icon{ width: 100px; padding: 8px 0px 8px 0px;}
    .quick_view{top:10px !important;}
    #ringsthumb_view .set_thumb_img{padding: 9px 0px 0px 24px;}
.set_bands_heading{color:#027CD1;font-family: "Crimson",Perpetua,Palatino,"Times New Roman",Times,serif;font-size:1.71429em;font-weight:normal;margin: 15px 0px;}
    .set_button_box{float: left; width: 43%; margin: 20px 10px 20px 0px;}
</style>  
<!--<link href="<?php echo SITE_URL; ?>css/magnific-popup.css" rel="stylesheet">-->
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
    function printThisPage() {
        window.print();
    }
    
    function setHDIndexDiamondList(ring_id, shape_set, ring_color, item_metal, page_limit) {
        var urlink = base_url + 'hdering_collections/getIndexDiamondList/'+ring_id + '/' +shape_set + '/' + ring_color+ '/' + item_metal+ '/' + page_limit;
        $("#center_stone_list").html('<b><i>Loading Diamond Finder &trade; Please Wait</i></b>');
        
        $.ajax({
               type: "POST",
               url: decodeURI(urlink),
               success: function(response) {
                    $("#center_stone_list").html(response);
              },
                        error: function(){alert('Error ');}
           }); 
    }
</script>
<link type="text/css" href="<?php echo SITE_URL; ?>css/zoom_jquery.css" rel="stylesheet" />
<script src="<?php echo SITE_URL; ?>js/jquery.zoom.js"></script>
<script>
        //var $jq = jquery.noConflict();
        $(document).ready(function(){
            $( ".set_thumb_img" ).hover(function() {
                //$('#ex1').zoom();
                $('.sp').zoom();
                $('#show_thumb_view').zoom();
                $('#show_thumb_view .sp img').scroll(zoom);
            });
        });
</script>
<script>
    //var $ = jQuery.noConflict();
    
function getRingSize(field_id) {
 var mt = document.getElementById(field_id).value;
 window.location = mt;	
}
function ringThumbView(th_url) {
    $('#ringsthumb_view .sp').hide();
    $('#ex1').hide();
    $('#show_thumb_view').html('Loading.....');
    $('#show_thumb_view').html('<img src="'+th_url+'" onmouseover="show_magnify_affect(\'show_thumb_view\')" alt="" />');
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
    
    function view_center_diamond_list() {
        $('.center_stonelist').toggle();
    }
</script>
<script language="javascript" src="<?php echo SITE_URL; ?>js/common_function.js" type="text/javascript"></script>
<!--<script src="<?php echo SITE_URL; ?>js/jquery-1.11.3.min.js"></script>
<link type="text/css" href="<?php echo SITE_URL; ?>css/jquery.popup.css" rel="stylesheet" />
<script language="javascript" src="<?php echo SITE_URL; ?>js/jquery.popup.js" type="text/javascript"></script>-->
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
    $newCenterCarat = ( $new_center_carat == 1 ? _nf($new_center_carat, 1) : $new_center_carat );
    $mainCenterCarat = ( $rowsring['new_center_carat'] == 1 ? _nf($rowsring['new_center_carat'], 1) : $rowsring['new_center_carat'] );
    //echo wordwrap($diamond_desc, 50, "<br>\n");

    ?>
    <div>
        <ul class="bread_crumb_list">
            <li><a href="<?php echo SITE_URL; ?>">Home</a></li> > 
            <li><a href="<?php echo SITE_URL; ?>hdering_collections/heart_collection_listing/Ring">Hearts &amp; Diamonds collection</a></li>
            <?php 
                echo $cate_name;
//                $newarr = strchr($ringimg, 'no_image_found.jpg');
//                if( empty($newarr) ) {
//                    echo ' > <li><a href="'.SITE_URL.'hdering_collections/heart_collection_listing">HD '.$rowsring['category'].'</a></li>';
//                }
//                echo $bread_crumb_link; 
            ?>
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
                            <div class="set_thumb_img" id="<?php echo $rowsring['pid'];?>">                                
                            <div class="" id="show_thumb_view"></div>
                                  <?php //echo $product_thums;?>
                            <div class="image_section">
                                <?php
                                echo $product_thumbs;
                                ?>
                            </div>
                            </div> 
                            <div class="left_arrow_view"><a href="#javascript" onclick="button_previous('<?php echo $rowsring['pid'];?>')"><img src="<?php echo SITE_URL; ?>img/heart_diamond/left_arrow_icon.jpg" alt="left_arrow_icon" /></a></div>
        <div class="right_arrow_view"><a href="#javascript" onclick="button_next('<?php echo $rowsring['pid'];?>')"><img src="<?php echo SITE_URL; ?>img/heart_diamond/right_arrow_icon.jpg" alt="" /></a></div>
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
              <div class="set_short_note">(We sell rings in all colors but Image on website is only available in White Gold,Pladium and Platinum)</div>
              <?php echo $recently_purchased; ?>
          </section>
      </div>
        <form name="collection_form" id="collection_form" method="post" action="">
            <div class="right-half">
        <section class="title-area">
          <div class="product-title medium-and-large-only">
            <h1 class="product-title" itemprop="name"><?php echo $heart_title; ?> <span class="sub-text"> in <?php echo $rowsring['metal']; ?> (<?php echo check_empty($total_carat, 'NA'); ?> ct. tw.)</span></h1>
          </div>
          <section id="special-attention-message">
              <div class="countdown-message available-to-sell-messaging active-available-to-sell-message" data-skus=""> <strong><i class="free-shipping-icon"><img src="<?php echo SITE_URL; ?>collection_detail/free_shipping_icon.jpg" alt="" /></i> Free FedEx &reg; Shipping</strong><br>
              Delivery time varies by the diamond and setting you select. </div>
          </section>
            <div class="clear"></div>
            <div class="metal_list_box">
                <div class="set_metal_label">Metal &ndash; <b><?php echo $metals_name; ?></b></div>
                <ul class="set_metals_list">
                    <li>
                        <a href="<?php echo $main_detail_link.'14k_gold?ring_size='.$ring_size.'&diamond_lot='.$diamond_lot; ?>">
                            <img src="<?php echo SITE_URL; ?>img/heart_diamond/metal_icons_2.jpg" alt="metal_icons_2" />
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $main_detail_link.'18k_gold?ring_size='.$ring_size.'&diamond_lot='.$diamond_lot; ?>">
                            <img src="<?php echo SITE_URL; ?>img/heart_diamond/metal_icons_5.jpg" alt="metal_icons_5" />
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $main_detail_link.'platinum?ring_size='.$ring_size.'&diamond_lot='.$diamond_lot; ?>">
                            <img src="<?php echo SITE_URL; ?>img/heart_diamond/metal_icons_4.jpg" alt="metal_icons_4" />
                        </a>
                    </li>
                </ul>
            </div>
            <div class="metal_list_box">
                <ul class="set_diamond_carat">
                    <?php
                        $diamond_carat_list = '';
                        
                        for($i=1; $i <= 4; $i++) {
                            $match_diamond_id = strchr($diamond_carats['diamond_lot'.$i], $diamond_lot);
                            $active_carat = ( !empty($match_diamond_id) ? 'set_active_carat' : '' );
                            
                            $diamond_carat_list .= '<li class="'.$active_carat.'">
                                        <a href="'.$diamond_carats['diamond_lot'.$i].'">
                                            <img src="'.SITE_URL.'img/heart_diamond/diamond_carat_'.$i.'.jpg" alt="diamond_carat" />
                                        </a>
                                    </li>';
                        }
                        if( $rowsring['diamond_lot_id'] > 0 ) {
                            echo $diamond_carat_list;
                        }                        
                    ?>
                </ul>
            </div>
          <div class="price-and-purchase"> 
            <div class="price-with-button force-wrap" data-smart-wrap="true">
              <div class="price-display">
                <div class="regular-price">
                  <span class="price" itemprop="price" content="<?php echo $sales_price; ?>">$<?php echo _nf($sales_price, 2) ; ?></span>
                </div>               
                <?php if( $rowsring['category'] !== 'Band' ) { ?>    
                <span class="price-message">(Price with <?php echo $newCenterCarat; ?> Center Carat)</span><br>
                <?php
                    if( !empty($mainCenterCarat) && !empty($diamond_lot) ) {
                        echo '<span class="price-message"><a href="'.SITE_URL.'hdering_collections/collection-detail/'.$rowsring['pid'].'">(Try a larger center diamond '.$mainCenterCarat.' Carat)</a></span>';
                    }
                ?>
                <div>
                    <a href="#javascript" onclick="<?php echo $load_center_diamond; ?>">(Need More Center Diamond Options? Click Diamond Finder &trade;)</a>
                </div>
                <?php } ?>
              </div>
            </div>
            <div>
                <?php
                    $ring_total_carat = $rowsring['semi_mount_weight'] + $rowsring['new_center_carat'];
                ?>
                <input type="hidden" name="txt_rstyle" id="txt_rstyle" value="<?php echo $rowsring['item_id']; ?>" />
                <input type="hidden" name="3ez_price" value="" />
                <input type="hidden" name="5ez_price" value="" />
                <input type="hidden" name="main_price" id='main_price' value="<?php echo $sales_price; ?>" />
                <input type="hidden" name="price" value="<?php echo $sales_price; ?>" />
                <input type="hidden" name="vender" value="hdering_diamond_collection">
                <input type="hidden" name="url" value="<?php echo $ringimg; ?>">
                <input type="hidden" name="prodname" value="<?php echo $heart_title; ?>" />
                <input type="hidden" name="diamnd_count" value="" />
                <input type="hidden" name="ring_shape" value="" />
                <input type="hidden" name="ring_carat" value="<?php echo $ring_total_carat; ?>" />
                <input type="hidden" name="prid" id="prid" value="<?php echo $rowsring['pid'];?>" />
                <input type="hidden" name="diamond_id" value="<?php echo $diamond_lot;?>" />
                <input type="hidden" name="txt_ringtype" value="hdering_diamond_collection" />
                <input type="hidden" name="txt_ringsize" value="<?php echo $item_ring_size;?>" />
                <input type="hidden" name="txt_metal" value="<?php echo $metals_name; ?>" />
                <input type="hidden" name="metals_weight" value="" />
                <input type="hidden" name="vendors_name" value="Hearts and Diamonds Collection" />
                <input type="hidden" name="txt_addoption" value="hdering_diamond_collection" />
                <input type="hidden" name="center_stone_id" id="center_stone_id" />
              <div class="button-display set_button_box">
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
                <div class="set_button_box"><a class="main-button blue-nile-button blue" href="<?php echo SITE_URL; ?>account/account_wishlist/<?php echo $rowsring['pid'];?>/add/hdheart_market/">Add To Wishlist</a></div>
                <div class="clear"></div>
            </div>
          </div>
            <br>
            <div id="center_stone_list"></div>
            <br>
          <div class="review-and-social">
            <div class="product-rating-stars " data-action="scroll-to-review">
              <div class="offer-rating">
                <div><img src="<?php echo SITE_URL; ?>collection_detail/customer_rating_stars.jpg" alt="<?php echo SITES_NAME; ?> Studio" /></div>
                <div class="rating-values"> <span>4.8</span> (<span><a href="#" data-target="customer-review">9</a></span>) </div>
              </div>
              <div class="review-count" data-review-count="9">(9 customer rating<span class="plural">s</span>)</div>
            </div>
            <div class="social-icons">
              <div class="group-of-icons"> 
                  <a href="#"><img src="<?php echo SITE_URL; ?>collection_detail/social_icon_set_1.jpg" alt="<?php echo SITES_NAME; ?> Studio" /></a>
                  <a href="https://twitter.com/hashtag/heartsanddiamonds" target="_blank"><img src="<?php echo SITE_URL; ?>collection_detail/social_icon_set_2.jpg" alt="<?php echo SITES_NAME; ?> Studio" /></a>
                  <a href="#"><img src="<?php echo SITE_URL; ?>collection_detail/social_icon_set_3.jpg" alt="<?php echo SITES_NAME; ?> Studio" /></a>
                  <a href="https://www.facebook.com/HeartsandDiamondsJewelry/" target="_blank"><img src="<?php echo SITE_URL; ?>collection_detail/social_icon_set_4.jpg" alt="<?php echo SITES_NAME; ?> Studio" /></a>
                  <a href="#javascript" onclick="printThisPage()"><img src="<?php echo SITE_URL; ?>collection_detail/social_icon_set_5.jpg" alt="<?php echo SITES_NAME; ?> Studio" /></a>
                  <a href="#javascript" class="js__p_another_start"><img src="<?php echo SITE_URL; ?>collection_detail/social_icon_set_6.jpg" alt="<?php echo SITES_NAME; ?> Studio" /></a>
<!--                <button class="icon-print"></button>
                <span class="icon-envelope"></span>-->
                <button class="icon-share" data-hasqtip="1"></button>
              </div>
            </div>
          </div>
        </section>
        <section id="product-description" itemprop="description"> Beautifully crafted, this <?php echo $heart_title; ?>.</section><br>
        <div class="set_note_text"><?php echo ORDER_DELIVERY_LABEL; ?></div>
        <section id="setting-information-table">
<!--            <div class="set_prod_row set_row_bg">
                <div class="row_left_cols">Stock Number</div>
                <div class="row_right_cols"><?php echo check_empty($rowsring['random_item_id'], $rowsring['item_id']); ?></div>
                <div class="clear"></div>
            </div>
              <div class="set_prod_row set_prod_title"><?php echo $heart_title; ?> <span class="sub-text"> in <?php echo $rowsring['metal']; ?> (<?php echo check_empty($total_carat, 'NA'); ?> ct. tw.)</span></div>-->
          <div class="detail-table">
            <div class="row detail even first">
              <div data-unique-id="stock-number-column-0" class="column-0 "> <span> Stock Number </span> </div>
              <div data-unique-id="stock-number-column-1" class="column-1 "> <span><?php echo check_empty($rowsring['random_item_id'], $rowsring['item_id']); ?> </span> </div>
            </div>
              <?php //echo $item_details; 
                    echo $item_details_rows;
                    
                    if( $rowsring['category'] == 'Ring' ) {
              ?>
              <div class="row detail even">
                <div data-unique-id="available-in-sizes-column-0" class="column-0 "> <span> Available in sizes </span> </div>
                <div data-unique-id="available-in-sizes-column-1" class="column-1 "> 
                    <span> <select name="rings_size" id="rings_size" onchange="setListingPage(this.value)"><?php echo $finger_ring_size; ?></select> </span> 
                </div>
              </div>
                    <?php } ?>
<!--            <div class="row detail even">
              <div data-unique-id="available-in-sizes-column-0" class="column-0 "> <span> Available in sizes </span> </div>
              <div data-unique-id="available-in-sizes-column-1" class="column-1 "> <span> 4.5 - 8.5 </span> </div>
            </div>-->
            <div class="row contains-link">
              <div class="column-0"></div>
              <div class="column-1"> <a href="#" class="arrowed">Find your ring size</a> </div>
            </div>
          </div>
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
                      <a href="#">
                       <i class="set_icon_space"><img src="<?php echo SITE_URL; ?>collection_detail/live_chat_icon.jpg" alt="live_chat_icon" /></i><span>Live Chat</span> 
                      </a> 
                  </div>
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
      <div class="separator"> <span class="text">Similar Settings</span> </div><br>
      <section id="">
          <div class="rings_block">
                <?php echo $more_collection_listings['similar_listing'] . $more_collection_listings['popup_link']; ?>
                
                <div class="clear"></div>
            </div>
      </section>
      <div class="separator"><span class="text">About the designer</span></div>
      <section id="branding-section" class="horizontal-group">
        <div class="information-cell">
          <div> <img src="<?php echo SITE_URL; ?>collection_detail/about_designer_img.jpg" alt="<?php echo SITES_NAME; ?> Studio" title="<?php echo SITES_NAME; ?> Studio"> </div>
          <div>
            <h2><span class="collapsible">About The Designer: </span><span class="collapsible"><?php echo SITES_NAME; ?></span></h2>
            <p><span>Our <?php echo SITES_NAME; ?> fine jewelry is an exceptional collection crafted by industry-leading designers and inspired by their years of experience and personal reflection. </span><span class="collapsible">Defined by <?php echo SITES_NAME; ?>'s classic style, with the highest regard to quality, this is everyday elegance at its finest. </span></p>
          </div>
        </div>
      </section>
      <div class="about-your-ring separator"> <span class="text">About Your <?php echo SITES_NAME; ?> Ring</span> </div>
      <section class="horizontal-group preset-stone-information first">
          <img src="<?php echo $ringimg; ?>" class="background set_prod_bg" alt="<?php echo $heart_title; ?>" />
        <div class="wrapper">
          <div class="content">
            <h2>Setting Diamond Information</h2>
            <div class="characteristics">
              <div class="characteristic-row">
                <div class="characteristic">
                  <div class="label">Number of diamonds</div>
                  <div class="value"><?php echo check_empty($rowsring['total_diam_pcs'], 'NA'); ?></div>
                </div>
                <div class="characteristic">
                  <div class="label">Minimum carat total weight (ct. tw.)</div>
                  <div class="value"><?php echo check_empty($total_carat, 'NA'); ?></div>
                </div>
              </div>
              <div class="characteristic-row">
                <div class="characteristic">
                  <div class="label">Color</div>
                  <div class="value"><?php echo check_empty($diamond_detail['fcolor_value'], $diamond_detail['color']); ?></div>
                </div>
                <div class="characteristic">
                  <div class="label">Clarity</div>
                  <div class="value"><?php echo check_empty($diamond_detail['clarity'], 'NA'); ?></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <div class="supported-shapes separator"></div>
<!--      <section id="supported-shapes" class="horizontal-group">
        <div class="information-cell">
          <div class="row">
            <h2>CAN BE SET WITH</h2>
            <p>This ring is specially designed to accommodate the following center diamond shapes and sizes. If there is a size or shape you are interested in that is not listed, our diamond and jewelry consultants are available to help you customize the perfect engagement ring at <?php echo CONTACT_NO; ?>.</p>
          </div>
          <div class="diamonds row clearfix">
            <div class="diamond-wrapper">
              <div class="diamond">
                <div class="diamond-sprite round diamond-image"><img src="<?php echo SITE_URL; ?>collection_detail/round_shape_diamond.jpg" alt="" /></div>
                <div class="shape">round</div>
                <div class="range">0.64 &dash; 1.60</div>
                <div>Carat</div>
              </div>
            </div>
          </div>
        </div>
      </section>-->
<!--      <div class="separator"></div>-->
      <section id="">
          <h2 class="set_bands_heading">MATCHING WEDDING RINGS</h2>
        <div class="rings_block">
            <?php echo $popular_listings['similar_listing'] . $popular_listings['popup_link']; ?>
            <div class="clear"></div><br>
        </div>
      </section>
      <div class="separator"></div>
    </div>
    <div id="details-fixed-header" class="fixed-header">
      <div class="product-title">
        <h1 class="product-title"><?php echo SITES_NAME; ?> Studio Heiress Halo Diamond Engagement Ring<span class="sub-text"> in Platinum (2/5 ct. tw.)</span></h1>
      </div>
      <div class="right-half">
        <div class="price-display">
          <div class="regular-price"> <span class="price">$<?php echo _nf($sales_price, 2) ; ?></span> </div>
          <span class="price-message">(Price with <?php echo $new_center_carat; ?>Center Carat)</span> </div>
        <div class="button-display">
          <div class="drop-down-action-button "> <a class="main-button blue-nile-button blue" href="#">
            <div class="main-text">
              <div class="processing-icon"></div>
              Buy Now</div>
            </a> </div>
        </div>
      </div>
    </div>
  </main>
  <div id="recently-purchased-overlay" data-offer-id="50575" data-number-of-rings="20">
    <div class="container">
      <h4>Recently Purchased Rings</h4>
      <div class="overlay-video-or-image three-sixty-container"> </div>
      <div class="wrapper">
        <div class="rpr-overlay-information" data-current-ring-id="1880509421">
          <h5 class="product-title"><?php echo SITES_NAME; ?> Studio Heiress Halo Diamond Engagement Ring<span class="sub-text"> in Platinum (2/5 ct. tw.)</span></h5>
        </div>
        <div class="drop-down-action-button "> <a class="main-button blue-nile-button blue" href="#">
          <div class="main-text">
            <div class="processing-icon"></div>
            Buy Now</div>
          </a> </div>
      </div>
    </div>
  </div>
</div>
        </div>
    </div>
    <div class="clear"></div>
</div>
    <input type="hidden" name="liting_class" id="liting_class" value="hdering_collections" />
<!--<script src="<?php echo SITE_URL; ?>js/jquery.simplePopup.js" type="text/javascript"></script>-->
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
            <input type="hidden" name="details_link" id="details_link" value="<?php echo 'hdering_collections/collection-detail/'.$rowsring['pid'];?>">
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
            <input type="hidden" name="details_link" id="details_link" value="<?php echo 'hdering_collections/collection-detail/'.$rowsring['pid'];?>">
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
                    <div class="topbar_imgleft"><img src="<?php echo $ringimg; ?>" width="74" alt="<?php echo $heart_title; ?>" /></div>
                    <div class="topbar_imgright">
                        <div class="topbar_heading"><?php echo $ringtitle . '<br>' . $heart_title; ?> <span class="sub-text"> <br>in <?php echo $rowsring['metal']; ?> (<?php echo check_empty($total_carat, 'NA'); ?> ct. tw.)</span></div>
<!--                        <div class="topbar_label">in 18kt Yellow Gold with 1.5mm stones</div>-->
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="topbar_right">
                    <div class="topbar_cart_left">
                        <a href="#" class="addtocart_btn" onclick="addcartsubmit('<?php echo $buynow_link; ?>')">Add To Cart</a>
                    </div>
                    <div class="topbar_cart_right"><a href="#javascript" id="topbar_block"><img src="<?php echo SITE_URL; ?>img/heart_diamond/top_option_icon.jpg" /></a></div>
                </div>
                <div class="clear"></div>
            </div>
            <br>
            </div>
<!-- top bar add to cart block end -->
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<!--<script src="<?php echo SITE_URL; ?>js/jquery.min.js"></script>-->
<script src="<?php echo SITE_URL; ?>js/jquery.simplePopup.js" type="text/javascript"></script>
<script>
    $(function() {
        ////// call popup scirpt
        $(".js__p_start, .js__p_another_start").simplePopup();
    });
    //// print page
            function printCurrPage() {
                window.print();
            }
        
    </script>
<script type="text/javascript">
    function view_simple_popup(block_vid) {
        jQuery('#pop_' + block_vid).simplePopupBlock();
    }
function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}
</script> 
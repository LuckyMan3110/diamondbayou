<link rel="stylesheet" type="text/css" href="<?php echo OTHER_MANUFACT; ?>rolex_page/_global.less">   
<script src="<?php echo OTHER_MANUFACT; ?>rolex_page/js/modernizr-2.6.2.js" type="text/javascript"></script>
<link type="text/css" href="<?php echo SITE_URL; ?>css/zoom_jquery.css" rel="stylesheet" />
<link type="text/css" href="<?php echo SITE_URL; ?>css/tabs_style.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>demo_retail/retaildemo_css/productdetail.css?version=03232016" media="all">
<script src="<?php echo SITE_URL; ?>js/jquery.zoom.js"></script>

    <script>
        //var $ = jQuery.noConflict();
        
        $(document).ready(function(){
            $('#media_container').zoom();
            //alert('tem');
        });
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
			 $('#view_errors').html('<div style="margin: 0px auto; "><img src="'+base_url+'images/loading.gif"></div>');
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
    
    </script>
<!--[if IE 8]>    
    <script src="/Scripts/site_js/respond.js" type="text/javascript"></script>
<![endif]-->
<div id="container">
  <div style="display: none" id="page_loading"></div>
  <div id="page_spin"></div>
  <section id="main_content_area">
    <form id="form1" name="form1" method="post" action="">
    <div id="main_contentContainer" class="product_detail">
      <div id="product_detail_container" class="container">
        <div id="breadcrumb_container" class="col12">
          <div class="product_breadcrumb" id="ProductBreadcrumb1">
            <ul>
              <li class="parentList"><a href="<?php echo SITE_URL; ?>rolexrings/rolex_listing_view" class="parentLink" hidefocus="true">Watches </a><span class="separator"></span></li>
              <li class="parentList"><a href="<?php echo $rolex_listing_link; ?>" class="parentLink" hidefocus="true"><?php echo $results['Category']; ?> </a><span class="separator"></span></li>
              <li class="parentList"><a href="<?php echo $rolex_listing_link; ?>" class="parentLink" hidefocus="true"><?php echo $results['Subcategory_1']; ?> </a></li>
              <li class="parentList"></li>
            </ul>
          </div>
          <div class="last_breadcrumb"></div>
        </div>
        <div id="image_col" class="col6">
          <div id="media_container"> <!-- <img class="holder" width="500" height="500" src="./rolex_detail_page_files/product_detail_holder.gif"> --> 
            <?php echo $rolex_img_list; ?>
          </div>
            <div class="clear"></div>
            <div id="attributes_container" class="info_container">
<!--            <h3 class="section_header">Attributes:</h3>
            <ul>
              <?php echo $watch_attribute; ?>
            </ul>-->
          </div>
                <input type="hidden" name="price" value="<?php echo $item_price; ?>" />
                <input type="hidden" name="txt_rstyle" id="txt_rstyle" value="<?php echo $results['SKU']; ?>" />
                <input type="hidden" name="main_price" value="<?php echo $item_price; ?>" />
                <input type="hidden" name="vender" value="johnny_dang" />
                <input type="hidden" name="url" value="<?php echo $first_rolex_img[0]; ?>" />
                <input type="hidden" name="prodname" value="<?php echo $results['Title']; ?>" />
                <input type="hidden" name="diamnd_count" value="" />
                <input type="hidden" name="ring_shape" value="" />
                <input type="hidden" name="ring_carat" value="" />
                <input type="hidden" name="prid" value="<?php echo $results['id']; ?>" />
                <input type="hidden" name="txt_ringtype" value="" />
                <input type="hidden" name="txt_ringsize" value="<?php echo $item_ring_size; ?>" />
                <input type="hidden" name="txt_metal" value="<?php echo $results['Jewelry_Metal']; ?>" />
                <input type="hidden" name="vendors_name" value="<?php echo SITE_TITLE; ?>" />
                <input type="hidden" name="txt_addoption" value="tvjohny_collection_item" />
                <input type="hidden" name="txt_qty" value="1" />
            <div><a href="#javascript" onclick="addToCartSubmitForm('<?php echo SITE_URL; ?>jewelleries/addtoshoppingcart/')" id="addtoshopping"><img src="<?php echo SITE_URL; ?>images/buy-now.jpg" alt="Buy Now" width="242" style="width: 242px;" /></a><br></div>
        </div>
        <div id="info_col" class="col6 last">
          <div id="product_info_container">
            <h2 id="product_title"><?php echo $results['Title']; ?></h2>
            <div id="features_info"> 
              
              <!-- ko if: Product().MSRP() -->
              <div class="retail_price_set"><b>Retail Price :</b> <span>$<?php echo _nf($item_retail_price, 2); ?></span></div>
              <p class="price msrp_price "><span class="property">Suggested Sales Price: </span><span class="value" data-bind="text: &#39;$&#39; + Product().MSRP().toFixed(2) + &#39; &#39;">$<?php echo _nf($item_price, 2); ?> </span></p>
              
              <!-- /ko -->
              
              <p class="style"><span class="property">Style: </span><span class="value" data-bind="text: Product().Style() "><?php echo $results['style']; ?></span></p>
              <p class="stock" data-bind="css: { red: isDiscontinued() }"> <span class="property">In Stock: </span> <span class="value" data-bind="html: ActualStock()">Yes</span> </p>
            </div>
            <div id="product_tabs_container">
              <ul class="product_tab_list">
                <li class="product_tab_btn active" data-tab="Specs"><a href="https://qgold.com/pd/Certified-Pre-owned-Rolex-Steel-and-18ky-Ladies-Champagne-Dial-Watch/CRX119#" hidefocus="true"><span>Specs</span></a></li>
              </ul>
            </div>
            <div id="Specs" class="info_container tabbed">
                <ul data-bind="html: BuildSpecs()">
                    <?php echo $watch_details; ?>
                    <?php if( $cate_row['cate_type'] == 'rings' ) { ?>
                    <li><span class="property">Item Size:</span> 
                        <span class="value">
                            <select name="item_finger_size" onchange="set_page_location(this.value)">
                                <?php echo $item_finger_size; ?>
                            </select>
                        </span>
                    </li>
                    <li><span class="property">Finish Level:</span> 
                        <span class="value">
                            <select name="finish_level" id="finished_level">
                                <option value="complete_stone">Complete</option>                       
                            </select>
                        </span>
                    </li>
                    <?php } ?>
                    <?php if( $results['ezstatus'] == 1 ) { 
                    
                   $ezPayOption = '<li class="detail_rows set_ezpay">
                                    <span>'.EZPAY_LABEL.' :</span>
                                    <span>
                                        <input type="radio" name="ez_payments" id="firstOption" value="'.$first_ez_value.'" /><label for="firstOption">'.$first_ez_value.' Months</label>
                                        <input type="radio" name="ez_payments" id="secondOption" value="'.$second_ez_value.'" /><label for="secondOption">'.$second_ez_value.' Months</label>
                                    </span>
                                    <div class="clear"></div>
                                </li>';
                   
                                echo $ezPayOption;
                    } 
                ?>
                </ul>
            </div>
          </div>
<!--          <div id="detail_notify_container">
            <p>Login to add this product to your cart and see additional product details.</p>
            <a id="login_btn" href="https://qgold.com/Login?returnPath=/pd/Certified-Pre-owned-Rolex-Steel-and-18ky-Ladies-Champagne-Dial-Watch/CRX119" class="button blue" hidefocus="true">Login<span class="icon-arrow-right"></span></a> </div>-->
        </div>
      </div>
    </div>
    </form>
  </section>
        <div class="clear"></div><br>
        <div class="tabs_block">
                <ul>
                    <li><a href="#javascript" onclick="show_tabs_block_detail('product_details')">Product Details</a></li>
                    <li><a href="#javascript" onclick="show_tabs_block_detail('customer_reviews')">Customer Reviews</a></li>
                    <li><a href="#javascript" onclick="show_tabs_block_detail('ask_questins')">Ask a Questions</a></li>
                    <li><a href="#javascript" onclick="show_tabs_block_detail('similar_products')">Similar Products</a></li>
                    <li><a href="#javascript" onclick="show_tabs_block_detail('policies')">Policies</a></li>
                </ul>
            </div>
            <div class="tabsdata">
                <div id="product_details">
                    <div class="details_tab_left">
                       <?php 
                            $uniqueRingsDesc = $results['Description_1'] . ' ' . $results['Description_2'];
                            
                            echo $uniqueRingsDesc; 
                        ?>
                    </div>
                    <div class="details_tab_right">
                        <div><b>ITEM INFORMATION</b></div><br>
                        <div class="item_detail_bk">
                            <?php
                            $columnsList = getTvJonyTableFields(); /// ringsection helper
                            foreach( $columnsList as $column_name ) {
                                $cols_lable = str_replace('_', ' ', $column_name);
                                $cols_value = $results[$column_name];

                                if( !empty($cols_value) ) {
                                    $view_iteminfo .= '<div class="item_rows">
                                                        <span>'.$cols_lable.'</span>
                                                        <span>'.$cols_value.'</span>
                                                        <div class="clear"></div>
                                                    </div>';
                                }
                            }
                            
                            echo $view_iteminfo;
                            
                            ?>
                        </div>
                        <div class="clear"></div><br>
                    </div>
                    <div class="clear"></div><br>
                </div>
                <div id="customer_reviews" style="display: none;">
                    <div class="reviewLink"> <img src="<?php echo config_item('base_url') ?>img/page_img/stars_icon.png" />&nbsp;&nbsp; <a href="#javascript;" onclick="postComents()" class="commentBtn">Post a Comment</a> </div>
                    <div id="main">
                      <div class="nano has-scrollbar">
                        <form method="post" name="coment_form" id="coment_form" action="" class="formStyle commentsForm">
                            <div id="postcoment_form" style="display:none;">
                            <div id="view_errors"></div>
                                <div class="fieldBlock">
                                <div class="columnSection">
                                <div class="fLabel">Full Name</div>
                                <input required="required" type="text" name="full_name" value="<?php echo $row_cust->fname.' '.$row_cust->lname; ?>" id="full_name"> </div>
                                <div class="columnSection">
                                <div class="fLabel">Email Address</div>
                                <input required="required" type="email" value="<?php echo $row_cust->email; ?>" name="email_adres" id="email_adres">
                                <input type="hidden" name="rings_id" value="<?php echo $ring_id; ?>" />
                                </div>
                            <div class="clear"></div>
                            </div>
                              <div class="fieldBlock">
                                <div class="fLabel">Ring Rating</div>
                                <div>
                                  <select required="required" name="cmb_rating" id="cmb_rating">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option selected="selected">5</option>
                                  </select>
                                </div>
                              </div>
                              <div class="fieldBlock">
                                <div class="fLabel">Comments</div>
                                <div class="">
                                  <textarea name="tr_comments" required="required" id="tr_comments"></textarea>
                                </div>
                              </div>
                              <div><a href="#javascript;" onclick="commentsThisPost()" class="commentBtn">Submit</a></div> 
                            </div>
						</form>
                        <div class="overthrow nano-content description" tabindex="0" style="right: -17px;" id="vcomments_list">
                          <?php echo $view_coments; ?>
                        </div>
                        <div class="nano-pane" style="display: block;">
                          <div class="nano-slider" style="height: 35px; transform: translate(0px, 179.61471656403px);"></div>
                        </div>
                      </div>
                      <img src="" alt="" /> </div>
                </div>
                <div id="ask_questins" style="display: none;">
                    <?php echo askQuestionForm(); /// ringsection helper ?>
                </div>
                   <div class="clear"></div>
                </div>
                <div id="similar_products" style="display: none;">
                    <?php echo $similar_products; ?>
                    <div class="clear"></div>
                </div>
                <div id="policies" style="display: none;">
                    <?php echo ringsPoliciesTabs(); ?>
                </div>
        <div class="clear"></div><br>
        <div class="popular_rings">
                <div class="pprings_heading">Popular <?php echo $item_category; ?> <a href="#">See More</a></div><br>
                <?php echo $popular_listings; ?>
                <div class="clear"></div><br>
            </div>
             <hr class="horizontal_line1" />
        <div class="clear"></div>
        <div class="popular_rings">
                <div class="pprings_heading">More <?php echo $item_category; ?> <a href="#">See More</a></div><br>
                <?php echo $similar_listings; ?>
                <div class="clear"></div><br>
            </div>
        <div class="clear"></div><br><br>
            <?php require_once 'application/views/rolex_watches/rolex_johny_dang_intro.php' ?>
</div>
<!--<script src="<?php echo OTHER_MANUFACT; ?>rolex_page/js/jquery.min.js"></script> -->
<script>
    var $ = jQuery.noConflict();
    //window.jQuery || document.write('<script src="<?php echo OTHER_MANUFACT; ?>rolex_page/js/jquery-1.8.3.js"><\/script>');
</script> 
<script type="text/javascript">
            var ROOT = "/" == "/" ? "/" : "/";         
        </script> 
<script src="<?php echo OTHER_MANUFACT; ?>rolex_page/js/_global_scripts.js" type="text/javascript"></script> 
<script src="<?php echo OTHER_MANUFACT; ?>rolex_page/js/dropkick.js" type="text/javascript"></script> 
<script src="<?php echo OTHER_MANUFACT; ?>rolex_page/js/_qg.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo OTHER_MANUFACT; ?>rolex_page/js/qg_sliders.js"></script> 
<script type="text/javascript" src="<?php echo OTHER_MANUFACT; ?>rolex_page/js/knockout-2.1.0.js"></script> 
<script type="text/javascript" src="<?php echo OTHER_MANUFACT; ?>rolex_page/js/knockout-mapping-latest.js"></script> 
<script type="text/javascript" src="<?php echo OTHER_MANUFACT; ?>rolex_page/js/details.js"></script> 
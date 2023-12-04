<style>
    .prdSection {
      width: 21%;
    }
    .metalsection span:first-child{width: 94px;}
    .metalsection span:last-child{}
    .metalsection select{border: 1px solid #000; width: 200px; font-weight: bold;}
    .metalsection{ margin-bottom: 10px;}
</style>
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>css/jquery.popup.css" />
<!--<script src="https://code.jquery.com/jquery-1.10.2.js"></script>-->
  <script language="javascript" src="<?php echo SITE_URL; ?>js/jquery.popup.js" type="text/javascript"></script>      
<script>
    //var $ = jQuery.noConflict();
    
function getRingSize(field_id) {
 var mt = document.getElementById(field_id).value;
 window.location = mt;	
}
function ringThumbView(th_url) {
	$('#ringsthumb_view').html('Loading.....');
	$('#ringsthumb_view').html('<img src="'+th_url+'" width="400" onmousemove="jscMagnify(this,event)" onmouseout="jscMagnifyHide()" alt="jscMagnifyHide" />')
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
			 $('#view_errors').html('<div style="margin: 0px auto; "><img src="'+base_url+'images/loading.gif" alt="loading"></div>');
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
        document.getElementById('form1').action = pageURL;
        document.getElementById('form1').submit();
    }
    
    //// set metal and finished lvel
    function finishedLevel() {
        var metal = $('#cmb_metal').val();
        var level = $('#finish_level').val();
        var rid = $('#stern_ring_id').val();
        
        var urlink = base_url+'davidsternrings/finishlevel/'+rid+'/'+metal+'/finish';
        
        $.ajax({
		 type: "POST",
		 url:urlink,
		 success: function(data) {
                     //alert(data); return false;
                   var dt = data.split("_");
                   var fnoptions = data.replace(dt[0] + '_', '');
                     
			 $("#finish_level").html( fnoptions );
			 $("#stern_ring_price").html('$' + dt[0]);
		},
		error: function(){alert('Error ');}
	  });
    }
    
    //// set finished lvel
    function finishLevelPrices() {
        
        $('#loding_finish').show()
        var metal = $('#cmb_metal').val();
        var level = $('#finish_level').val();
        var rid = $('#stern_ring_id').val();
        
        var urlink = base_url+'davidsternrings/setFinishedLevel/'+rid+'/'+metal+'/'+level;
        
        $.ajax({
		 type: "POST",
		 url:urlink,
		 success: function(data) {
			 $("#stern_ring_price").html('$' + data);
             $('#loding_finish').hide()
		},
		error: function(){alert('Error ');}
	  });
    }
 
 function setListingPage(option_value) {
     window.location = option_value;
 }
 
</script>
<script language="javascript" src="<?php echo SITE_URL; ?>js/common_function.js" type="text/javascript"></script>
    <div class="container"><br>
        <div>
            <ul class="bread_crumb_list">
                <li><a href="<?php echo SITE_URL; ?>">Home</a></li> >
                <li><a href="<?php echo SITE_URL; ?>heartdiamond/heart_collection">Heart and Diamond Collections</a></li> >
                <li><a href="<?php echo SITE_URL; ?>braceletsection/bracelet_listings">Bracelets &amp; Bangles</a></li>
            </ul>
        </div>
        <div class="back_link"> < <a href="<?php echo SITE_URL; ?>heartdiamond/heart_collection">Browse The Hearts and Diamonds Collection</a></div><br><br>
        <div class="uper_detail_block">
            <div class="uperdt_left col-sm-6">
                <div class="thumbleft">
                    <?php echo $rings_thumb; ?>
                </div>
                <div class="zoomright" id="ringsthumb_view">
                    <img src="<?php echo $ringimg; ?>" alt="<?php echo $ringtitle; ?>" />
                </div>
            </div>
            <form name="form1" id="form1" method="post" action="">
            <div class="col-sm-5 pull-right">
               <div class="uperHeading">The Hearts and Diamonds Collection</div>
               <div class="ring_detail_headng"><?php echo $ringtitle; ?></div><br>
               <div class="prod_detail_list">
                   <ul>
                       <li><a href="#">2 Reviews</a></li> |
                       <li><a href="#">Rate &amp; Review</a></li>
                       <li><a href="#" class="prodet_box">Product Details</a></li>
                       <li><a href="#">Ships for free <br> Gift Box included</a></li>
                   </ul>
               </div>
               <hr class="horizontal_line" />
               <div class="further_dtcols">
                <span>ITEM CODE</span>
                <span><?php echo $rowsring['item_number']; ?></span>
            </div>    
            <div class="further_dtcols">
                <span>Metal</span>
                <span><?php echo $rowsring['default_metal']; ?></span>
            </div>    
            <div class="further_dtcols">
                <span>Retail Price</span>
                <span><strike>$ <?php echo _nf($retail_price, 2); ?></strike> <span>save <?php echo round($saving_percent); ?>%</span></span>
            </div>    
            <div class="further_dtcols">
                <span>Diamond CCTW</span>
                <span><?php echo $rowsring['diamond_cctw_provided']; ?></span>
            </div>
               <div class="clear"></div><br>
               <div class="further_dtcols">
                <span>Our Price</span>
                <span class="price_label" id="stern_ring_price">$ <?php echo _nf($sales_price, 2) ; ?></span>
            </div>
               <div class="clear"></div><br>
               <div class="earnpoints">Earn <span>6118</span> Hearts and Diamonds Reward Points</div>
               <hr class="horizontal_line" /><div class="clear"></div>
           <?php 
           
            if( in_array($rings_parent_id, $rings_allowed_id) ) {
           ?>
               <div class="further_dtcols metalsection">
                <span>Finger Size</span>
                <span>
                    <select name="finger_size" id="finger_size" onchange="setListingPage(this.value)">
                           <?php echo $finger_ring_size; ?>
                       </select>
                </span>
            </div>
            <?php } ?>
               <div class="further_dtcols metalsection">
                <span>Metal</span>
                <span>
                    <?php echo $rowsring['default_metal']; ?>
<!--                    <select name="txt_metal" id="cmb_metal" onchange="finishedLevel()">
                           <option value="gold">Gold</option>
                           <option value="silver">Silver</option>
                           <option value="platinum">Platinum</option>
                       </select>-->
                </span>
            </div>
               <div class="clear"></div>
               <div class="detail_botom_text">
                   <span>FINISH-LEVEL</span>
                   <span>
                       <select name="finish_level" id="finish_level" onchange="window.location=this.value">
                           <?php echo $finished_level; ?>
                       </select>
                   </span>
                   <span id="loding_finish" style="display:none;"><img width="33px" height="33px" src="<?php echo IMGSRC_LINK; ?>loading_pleasewait.gif" alt="loading please wait"></span>
                   <span>Qty</span>
                   <span><input type="text" class="qtyfield" name="txt_qty" value="1" /></span>
                   <span></span>
                   <span><a href="<?php echo SITE_URL.'account/account_wishlist/'.$rowsring['id']; ?>"><img src="<?php echo IMGSRC_LINK; ?>addto_wish_ic.jpg" alt="addto_wish_ic"></a></span>
               </div>
               <div class="clear"></div><br><br>
                <input type="hidden" name="txt_rstyle" id="txt_rstyle" value="">
                <input type="hidden" name="main_price" value="<?php echo $sales_price; ?>" />
                <input type="hidden" name="price" value="<?php echo $sales_price; ?>" />
                <input type="hidden" name="vender" value="diamond_bracelet">
                <input type="hidden" name="url" value="<?php echo $ringimg ?>" />
                <input type="hidden" name="prodname" value="<?php echo $ringtitle; ?>" />
                <input type="hidden" name="diamnd_count" value="" />
                <input type="hidden" name="ring_shape" value="" />
                <input type="hidden" name="ring_carat" value="<?php echo $rowsring['diamond_cctw_provided'];?>" />
                <input type="hidden" name="prid" id="stern_ring_id" value="<?php echo $rowsring['id']; ?>" />
                <input type="hidden" name="txt_ringtype" value="generic_ring" />
                <input type="hidden" name="txt_ringsize" value="<?php echo $set_ring_size; ?>" />
                <input type="hidden" name="txt_metal" value="<?php echo $rowsring['default_metal'];?>" />
                <input type="hidden" name="txt_addoption" value="diamond_bracelet" />
                <input type="hidden" name="unique_pagelink" value="" />
                <input type="hidden" name="vendors_name" value="Diamond Bracelets" />
                <div class="leftbtn_block">
                    <div><a href="#javascript" onclick="addcartsubmit('<?php echo $buynow_link; ?>')" id="addtoshopping"><img src="<?php echo SITE_URL ?>images/buy-now.jpg" alt="Buy Now"/></a><br /></div>
                </div>            
                <div class="rightbtn_block">
                    <ul>
                        <li><a href="#javascript" class="js__p_another_start">Ask an Expert</a></li>
                        <li><a href="#javascript" class="js__p_start">Ask a Friend</a></li>
                        <li><a href="#javascript" onclick="printCurrPage()">Print This</a></li>
                    </ul>
                </div>
                <div class="clear"></div>
            </div>
            </form>
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
            <div class="clear"></div><br><br>
            
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
                       Hearts and Diamonds Fine Jewelry Diamond Bracelet
                        <?php                       
                            echo $item_desc;
                       ?>
                    </div>
                    <div class="details_tab_right">
                        <div><b>ITEM INFORMATION</b></div><br>
                        <div class="item_detail_bk">
                            <div class="item_rows">
                                <span>Item Code</span>
                                <span><?php echo $rowsring['item_number']; ?></span>
                                <div class="clear"></div>
                            </div>
                            <div class="item_rows">
                                <span>Diamond CCTW Provided</span>
                                <span><?php echo $rowsring['diamond_cctw_provided']; ?></span>
                                <div class="clear"></div>
                            </div>
                            <div class="item_rows">
                                <span>Metal</span>
                                <span><?php echo $rowsring['default_metal']; ?></span>
                                <div class="clear"></div>
                            </div>
                            
                <?php
                    $itemInformation = '';
                    if( !empty($rowsring['default_color']) ) { 
                        $itemInformation .= '<div class="item_rows">
                                            <span>Default Color</span>
                                            <span>'.$rowsring['default_color'].'</span>
                                            <div class="clear"></div>
                                        </div>';
                    }
                    if( !empty($rowsring['approxi_semi_mount']) ) { 
                        $itemInformation .= '<div class="item_rows">
                                            <span>Approximate Semi Mount</span>
                                            <span>'.$rowsring['approxi_semi_mount'].'</span>
                                            <div class="clear"></div>
                                        </div>';
                    }
                    if( !empty($rowsring['pc_casting']) ) { 
                        $itemInformation .= '<div class="item_rows">
                                            <span>PC Casting</span>
                                            <span>'.$rowsring['pc_casting'].'</span>
                                            <div class="clear"></div>
                                        </div>';
                    }
                    if( !empty($rowsring['stone_break_down']) ) { 
                        $itemInformation .= '<div class="item_rows">
                                            <span>Stone Breakdown</span>
                                            <span>'.$rowsring['stone_break_down'].'</span>
                                            <div class="clear"></div>
                                        </div>';
                    }
                    if( !empty($rowsring['diamond_quality_prices_based']) ) { 
                        $itemInformation .= '<div class="item_rows">
                                            <span>Diamond quality <br>that prices are based at</span>
                                            <span>'.$rowsring['diamond_quality_prices_based'].'</span>
                                            <div class="clear"></div>
                                        </div>';
                    }
                    if( $rowsring['gold_polished_1300'] != 'Level N/A' ) { 
                        $itemInformation .= '<div class="item_rows">
                                            <span>Gold Polished $1300</span>
                                            <span>$ '.$rowsring['gold_polished_1300'].'</span>
                                            <div class="clear"></div>
                                        </div>';
                    }
                    if( $rowsring['gold_complete_1300'] != 'Level N/A' ) { 
                        $itemInformation .= '<div class="item_rows">
                                            <span>Gold Complete $1300</span>
                                            <span>$ '.$rowsring['gold_complete_1300'].'</span>
                                            <div class="clear"></div>
                                        </div>';
                    }
                    if( $rowsring['gold_semi_mount_1300'] != 'Level N/A' ) { 
                        $itemInformation .= '<div class="item_rows">
                                            <span>Gold Semi Mount $1300</span>
                                            <span>$ '.$rowsring['gold_semi_mount_1300'].'</span>
                                            <div class="clear"></div>
                                        </div>';
                    }
                    if( $rowsring['gold_polished_1700'] != 'Level N/A' ) { 
                        $itemInformation .= '<div class="item_rows">
                                            <span>Gold Polished $1700</span>
                                            <span>$ '.$rowsring['gold_polished_1700'].'</span>
                                            <div class="clear"></div>
                                        </div>';
                    }
                    if( $rowsring['gold_complete_1700'] != 'Level N/A' ) { 
                        $itemInformation .= '<div class="item_rows">
                                            <span>Gold Complete $1700</span>
                                            <span>$ '.$rowsring['gold_complete_1700'].'</span>
                                            <div class="clear"></div>
                                        </div>';
                    }
                    if( $rowsring['gold_semi_mount_1700'] != 'Level N/A' ) { 
                        $itemInformation .= '<div class="item_rows">
                                            <span>Gold Semi Mount $1700</span>
                                            <span>$ '.$rowsring['gold_semi_mount_1700'].'</span>
                                            <div class="clear"></div>
                                        </div>';
                    }
                    if( $rowsring['silver_polished_40'] != 'Level N/A' ) { 
                        $itemInformation .= '<div class="item_rows">
                                            <span>Silver Polished $40</span>
                                            <span>$ '.$rowsring['silver_polished_40'].'</span>
                                            <div class="clear"></div>
                                        </div>';
                    }
                    if( $rowsring['silver_complete_40'] != 'Level N/A' ) { 
                        $itemInformation .= '<div class="item_rows">
                                            <span>Silver Complete $40</span>
                                            <span>$ '.$rowsring['silver_complete_40'].'</span>
                                            <div class="clear"></div>
                                        </div>';
                    }
                    if( $rowsring['silver_semi_mount_40'] != 'Level N/A' ) { 
                        $itemInformation .= '<div class="item_rows">
                                            <span>Silver Semi Mount $40</span>
                                            <span>$ '.$rowsring['silver_semi_mount_40'].'</span>
                                            <div class="clear"></div>
                                        </div>';
                    }
                    if( $rowsring['silver_polished_60'] != 'Level N/A' ) { 
                        $itemInformation .= '<div class="item_rows">
                                            <span>Silver Polished $60</span>
                                            <span>$ '.$rowsring['silver_polished_60'].'</span>
                                            <div class="clear"></div>
                                        </div>';
                    }
                    if( $rowsring['silver_complete_60'] != 'Level N/A' ) { 
                        $itemInformation .= '<div class="item_rows">
                                            <span>Silver Complete $60</span>
                                            <span>$ '.$rowsring['silver_complete_60'].'</span>
                                            <div class="clear"></div>
                                        </div>';
                    }
                    if( $rowsring['silver_semi_mount_60'] != 'Level N/A' ) { 
                        $itemInformation .= '<div class="item_rows">
                                            <span>Silver Semi Mount $60</span>
                                            <span>$ '.$rowsring['silver_semi_mount_60'].'</span>
                                            <div class="clear"></div>
                                        </div>';
                    }
                    if( $rowsring['platinum_polished_1200'] != 'Level N/A' ) { 
                        $itemInformation .= '<div class="item_rows">
                                            <span>Platinum Polished $1200</span>
                                            <span>$ '.$rowsring['platinum_polished_1200'].'</span>
                                            <div class="clear"></div>
                                        </div>';
                    }
                    if( $rowsring['platinum_complete_1200'] != 'Level N/A' ) { 
                        $itemInformation .= '<div class="item_rows">
                                            <span>Platinum Complete $1200</span>
                                            <span>$ '.$rowsring['platinum_complete_1200'].'</span>
                                            <div class="clear"></div>
                                        </div>';
                    }
                    if( $rowsring['platinum_semi_mount_1200'] != 'Level N/A' ) { 
                        $itemInformation .= '<div class="item_rows">
                                            <span>Platinum Semi Mount $1200</span>
                                            <span>$ '.$rowsring['platinum_semi_mount_1200'].'</span>
                                            <div class="clear"></div>
                                        </div>';
                    }
                    if( $rowsring['platinum_polished_1600'] != 'Level N/A' ) { 
                        $itemInformation .= '<div class="item_rows">
                                            <span>Platinum Polished $1600</span>
                                            <span>$ '.$rowsring['platinum_polished_1600'].'</span>
                                            <div class="clear"></div>
                                        </div>';
                    }
                    if( $rowsring['platinum_complete_1600'] != 'Level N/A' ) { 
                        $itemInformation .= '<div class="item_rows">
                                            <span>Platinum Complete $1600</span>
                                            <span>$ '.$rowsring['platinum_complete_1600'].'</span>
                                            <div class="clear"></div>
                                        </div>';
                    }
                    if( $rowsring['platinum_semi_mount_1600'] != 'Level N/A' ) { 
                        $itemInformation .= '<div class="item_rows">
                                            <span>Platinum Semi Mount $1600</span>
                                            <span>$ '.$rowsring['platinum_semi_mount_1600'].'</span>
                                            <div class="clear"></div>
                                        </div>';
                    }
                    
                    echo $itemInformation;
                    
                ?>
                        </div>
                    </div>
                    <div class="clear"></div><br>
                </div>
                <div id="customer_reviews" style="display: none;">
                    <div class="reviewLink"> <img src="<?php echo SITE_URL ?>img/page_img/stars_icon.png" alt="stars icon"/>&nbsp;&nbsp; <a href="#javascript;" onclick="postComents()" class="commentBtn">Post a Comment</a> </div>
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
                                <input type="hidden" name="rings_id" value="<?php echo $rowsring['id']; ?>" />
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
                    <?php echo ringsPoliciesTabs();; ?>
                </div>
            </div>
            <div class="clear"></div><br>
            <div class="popular_rings">
                    <div class="pprings_heading">Popular <?php echo $rowsring['categories']; ?> <a href="#">See More</a></div><br>
                    <?php echo $popular_listings; ?>
                    <div class="clear"></div><br>
                </div>
                 <hr class="horizontal_line1" />
            <div class="clear"></div>
            <div class="popular_rings">
                    <div class="pprings_heading">More <?php echo $rowsring['categories']; ?> <a href="#">See More</a></div><br>
                    <?php echo $more_bracelet_listings; ?>
                    <div class="clear"></div><br>
                </div>
            <div class="clear"></div><br><br>
        </div>
    </div>
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
              	<input type="hidden" name="details_link" id="details_link" value="<?php echo 'braceletsection/bracelet_detail/'.$rowsring['id'];?>">
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
              <input type="hidden" name="details_link" id="details_link" value="<?php echo 'braceletsection/bracelet_detail/'.$rowsring['id'];?>">
                <input type="button" name="btn_exsubmit" class="btnStyle" onclick="askExperForm()" value="Submit" />
              </div>
            </div>
          </div>
        </form>
      </div>
      <!-- popup blocks end! --> 
<link type="text/css" href="<?php echo SITE_URL; ?>css/tabs_style.css" rel="stylesheet" />
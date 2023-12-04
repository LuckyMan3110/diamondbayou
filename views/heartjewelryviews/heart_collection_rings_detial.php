<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>css/jquery.popup.css" />
<link type="text/css" href="<?php echo SITE_URL; ?>css/simple_model.css" rel="stylesheet" />
<style>
    .prdSection {
      width: 21%; float: left; text-align: center; line-height: 20px;
    }
    .prdSection a img{padding-bottom: 10px;}
    .similar_products{padding: 15px 0px;}
    .productRingImg{min-height: 285px;}
    .similar_collection .sp{width:500px;}
    .collection_detail_hover .addtocart_icon{ width: 100px; padding: 8px 0px 8px 0px;}
    .quick_view{top:10px !important;}
</style>
<!--<script src="https://code.jquery.com/jquery-1.10.2.js"></script>-->
<script language="javascript" src="<?php echo SITE_URL; ?>js/jquery.popup.js" type="text/javascript"></script>
        
<script>
    var $ = jQuery.noConflict();
    
function getRingSize(field_id) {
 var mt = document.getElementById(field_id).value;
 window.location = mt;	
}
function ringThumbView(th_url) {
	$('#ringsthumb_view').html('Loading.....');
	$('#ringsthumb_view').html('<img src="'+th_url+'" alt="th_url" width="400" alt="" />')
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
    
 function setListingPage(option_value) {
     window.location = option_value;
 }
</script>
<?php
    echo '<link rel="stylesheet" type="text/css" href="'.DEMO_RETAIL_CSS.'productdetail.css?version=03232016" media="all">';
?>
<script language="javascript" src="<?php echo SITE_URL; ?>js/common_function.js" type="text/javascript"></script>
    <div class="mainwrap"><br>
        <div>
        <ul class="bread_crumb_list">
            <li><a href="<?php echo SITE_URL; ?>wholesale">Home</a></li> > 
            <li><a href="<?php echo SITE_URL; ?>heartjewelrylistings/heart_collection">Heart &amp; Diamond collection</a></li>
            <?php echo $bread_crumb_link; ?>
<!--            <li><a href="<?php echo SITE_URL.'heartjewelrylistings/heart_collection_listing/'.$rowsring['category']; ?>"><?php echo collection_cate_name($rowsring['category']); ?></a></li>-->
        </ul>
    </div>
        <div class="back_link"> < Browse The <?php echo SITES_NAME; ?> Collection</div><br>
    <div id="Filters">
        <div id="Funnel">
            <ul class="funnel-container" data-share-link="">
  <li data-shipping-date="" class="funnel-step step-active step_active_bk">
    <div class="funnel-step-container"><span class="funnel-step-content">1<a id="SettingFunnel" style="cursor:pointer" beforeprocessfn="JamesAllen.Engagement.DeletePagePosition" container="#WidePane" href="#"><span class="title_1"><span style="padding-left:0px !important">CHOOSE A</span><br>
      SETTING</span></a><span class="noring1"></span></span></div>
  </li>
  <li data-shipping-date="" class="funnel-step">
    <div class="funnel-step-container"><span class="funnel-step-content">2<span class="title_2"><a id="DiamondFunnel" beforeprocessfn="JamesAllen.Engagement.DeletePagePosition" container="#WidePane" href="#"><span style="padding-left:0px !important">CHOOSE A</span><br>
      DIAMOND</a></span><span class="nodiamond2"></span></span></div>
  </li>
  <li class="funnel-step">
    <div class="funnel-step-container"><span class="funnel-step-content">3</span><span onClick="JSite.Hijax.Manager.Load('/complete-ring/');" class="complete-ring completeFunnel"></span><span class="title_3"><a id="CompleteFunnel" container="#WidePane" style="cursor:default"><span style="padding-left:0px !important">REVIEW</span><br>
      COMPLETE
      
      RING </a></span><span class="img_3"></span><span class="price_3"></span></div>
  </li>
</ul>
        </div>
    </div>
        <div class="clear"></div>
        <br><br>
        <div class="uper_detail_block">
            <div class="uperdt_left col-sm-5">
                <div class="thumbleft">
                    <?php echo $rings_thumb; ?>
                </div>
                <div class="zoomright" id="ringsthumb_view">
                    <img src="<?php echo $ringimg; ?>" alt="<?php echo $heart_title; ?>" />
                </div>
            </div>
            <form name="form1" id="form1" method="post" action="">
            <div class="uperdt_right col-sm-6 pull-right">
               <div class="uperHeading">The <?php echo SITES_NAME; ?> Collection</div>
               <div class="ring_detail_headng"><?php echo $heart_title; ?></div><br>
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
                <span><?php echo $rowsring['stock_number']; ?></span>
            </div>    
            <div class="further_dtcols">
                <span>Metal</span>
                <span><?php echo $rowsring['metal']; ?></span>
            </div>    
            <div class="further_dtcols">
                <span>Retail Price</span>
                <span><strike>$ <?php echo _nf($retail_price, 2); ?></strike> <span>save <?php echo round($saving_percent); ?>%</span></span>
            </div>    
            <div class="further_dtcols">
                <span>Carat Weight</span>
                <span><?php echo $rowsring['carat']; ?></span>
            </div>
               <div class="clear"></div><br>
               <div class="further_dtcols">
                <span>Our Price</span>
                <span class="price_label" id="price_label">$ <?php echo _nf($sales_price, 2) ; ?></span>
            </div>
               <div class="clear"></div><br>
               <div class="earnpoints">Earn <span>6118</span> Hearts and Diamonds Reward Points</div>
               <hr class="horizontal_line" />
<!--               <div class="further_dtcols metalsection ringsize">
                <span>Ring Size:</span>
                <span>
                    <select name="rings_size" id="rings_size" onchange="setListingPage(this.value)">
                           <?php echo $ringsize_option; ?>
                       </select>
                </span>
            </div>-->
               <div class="further_dtcols metalsection ringsize">
                <span>Metal Type:</span>
                <span>
                    <select name="metal_type" id="metal_type" onchange="setListingPage(this.value)">
                           <?php echo $metal_type_options; ?>                       </select>
                </span>
            </div>
               <div class="clear"></div>
               <div class="detail_botom_text">
                   <span>Qty</span>
                   <span><input type="text" class="qtyfield" name="txt_qty" value="1" /></span>
                   <span></span>
                   <span>
                       <a href="<?php echo SITE_URL.'account/account_wishlist/'.$rowsring['stock_number']; ?>"><img src="<?php echo IMGSRC_LINK; ?>addto_wish_ic.jpg" alt="addto_wish_ic"></a>
                   </span>
               </div>
               <div class="clear"></div><br><br>
               
                    <input type="hidden" name="txt_rstyle" id="txt_rstyle" value="<?php echo $rowsring['style']; ?>" />
                          <input type="hidden" name="3ez_price" value="" />
                          <input type="hidden" name="5ez_price" value="" />
                          <input type="hidden" name="main_price" id='main_price' value="<?php echo $rowsring['price']; ?>" />
                          <input type="hidden" name="price" value="<?php echo $rowsring['price']; ?>" />
                          <input type="hidden" name="vender" value="heart_diamond_collection">
                          <input type="hidden" name="url" value="<?php echo $ringimg; ?>">
                          <input type="hidden" name="prodname" value="<?php echo $heart_title; ?>" />
                          <input type="hidden" name="diamnd_count" value="<?php echo $rowsring['diamond_count']; ?>">
                          <input type="hidden" name="ring_shape" value="<?php echo $rowsring['shape']; ?>" />
                          <input type="hidden" name="ring_carat" value="<?php echo $rowsring['carat']; ?>" />
                          <input type="hidden" name="prid" id="prid" value="<?php echo $rowsring['stock_number'];?>" />
                          <input type="hidden" name="txt_ringtype" value="generic_ring" />
                          <input type="hidden" name="txt_ringsize" value="" />
                          <input type="hidden" name="txt_metal" value="<?php echo $rowsring['metal']; ?>" />
                          <input type="hidden" name="metals_weight" value="<?php echo $rowsring['weight']; ?>" />
                          <input type="hidden" name="vendors_name" value="Heart and Diamond Collection" />
                          <input type="hidden" name="txt_addoption" value="heart_diamond_collection" />
                          <input type="hidden" name="center_stone_id" id="center_stone_id" />
           <div class="leftbtn_block">
               <?php
                             $addtoRingBtn = '<a href="#javascript;" onclick="addcartsubmit(\''.$addtoring_link.'\')" class="add_to_setting" id="addtoshopping">Select This Setting</a><br />';
                             echo $addtoRingBtn;
                ?>
           </div>
            <div class="rightbtn_block">
              <ul>
                  <li><a href="#javascript" class="js__p_another_start">Ask an Expert</a></li>
                  <li><a href="#javascript" class="js__p_start">Ask a Friend</a></li>
                  <li><a href="#javascript" onclick="printCurrPage()">Print This</a></li>
              </ul>
          </div>
                <div class="clear"></div>
            <br><br>
            
            <div id="center_diamond_list"></div>
            
            </div>
            </form>
            <div class="clear"></div>
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
            <br><br>
            
            <div class="tabs_block" id="tabs_block">
                <ul>
                    <li><a href="#tabs_block" onclick="show_tabs_block_detail('product_details')">Product Details</a></li>
                    <li><a href="#tabs_block" onclick="show_tabs_block_detail('customer_reviews')">Customer Reviews</a></li>
                    <li><a href="#tabs_block" onclick="show_tabs_block_detail('ask_questins')">Ask a Questions</a></li>
                    <li><a href="#tabs_block" onclick="show_tabs_block_detail('similar_products')">Similar Products</a></li>
                    <li><a href="#tabs_block" onclick="show_tabs_block_detail('policies')">Policies</a></li>
                </ul>
            </div>
            <div class="tabsdata">
                <div id="product_details">
                    <div class="details_tab_left">
                       <?php 
$uniqueRingsDesc = get_site_title().' stunning '.$rowsring['parent_cate'].' '.$setingtype.' Style '.$rowsring['category_name'].' diamond ring can be yours for <span id="viewDyPrice">$'._nf($sales_price, 2).'</span>. This ring does not include the Center diamond. Center Diamonds are sold seperately.';                       
                       echo $uniqueRingsDesc; 
                       
?>
                    </div>
                    <div class="details_tab_right">
                        <div><b>ITEM INFORMATION</b></div><br>
                        <div class="item_detail_bk">
                            <div class="item_rows">
                                <span>Item Code</span>
                                <span><?php echo $rowsring['stock_number']; ?></span>
                                <div class="clear"></div>
                            </div>
                            <div class="item_rows">
                                <span>Approx. Weight</span>
                                <span><?php echo $rowsring['carat']; ?></span>
                                <div class="clear"></div>
                            </div>
                            <div class="item_rows">
                                <span>Style Name</span>
                                <span><?php echo check_empty($rowsring['style'], 'NA'); ?></span>
                                <div class="clear"></div>
                            </div>
                            <?php
                            $global_fields = '';
                                if( count($global_fields) > 0 ) {
                                    foreach ( $global_fields as $rows ) {
                                        $global_fields .= '<div class="item_rows">
                                                                <span>'.$rows[0].'</span>
                                                                <span>'.$rows[1].'</span>
                                                                <div class="clear"></div>
                                                            </div>';
                                    }
                                }
                                echo $global_fields;
                            ?>
                        </div>
                        <div class="clear"></div><br>
<!--                        <div><b>DIAMOND INFORMATION</b></div><br>
                        <div class="item_detail_bk">
                            <div class="item_rows">
                                <span>Setting Type</span>
                                <span><?php echo $maincate_name; ?></span>
                                <div class="clear"></div>
                            </div>
                            <div class="item_rows">
                                <span>Supplied Stones</span>
                                <span><?php echo $rowsring['supplied_stones']; ?></span>
                                <div class="clear"></div>
                            </div>
                            <div class="item_rows">
                                <span>Supplied Stone Weight</span>
                                <span><?php echo $rowsring['stone_weight']; ?></span>
                                <div class="clear"></div>
                            </div>
                            <div class="item_rows">
                                <span>Diamond Shapes</span>
                                <span><?php echo $suport_shape; ?></span>
                                <div class="clear"></div>
                            </div>
                            
                            <div class="item_rows">
                                <span>Center Stone Sold Separately</span>
                                <span><?php echo $rowsring['additional_stones']; ?></span>
                                <div class="clear"></div>
                            </div>                            
                            <?php
                                $itemInformation = '';
                                if( !empty( $suported_shapes) ) {  
                                    $itemInformation .= '<div class="item_rows">
                                                        <span>Diamond Shapes View</span>
                                                        <span>'.$suported_shapes.'</span>
                                                        <div class="clear"></div>
                                                    </div>';
                                }

                                echo $itemInformation;

                            ?>
                            <div class="item_rows">
                                <span>Clarity</span>
                                <span>VVS1 to SI2</span>
                                <div class="clear"></div>
                            </div>
                            <div class="item_rows">
                                <span>Color</span>
                                <span>D to L</span>
                                <div class="clear"></div>
                            </div>
                            
                        </div>-->
                    </div>
                    <div class="clear"></div><br>
                </div>
                <div id="customer_reviews" style="display: none;">
                    <div class="reviewLink"> <img src="<?php echo config_item('base_url') ?>img/page_img/stars_icon.png" alt="stars_icon"/>&nbsp;&nbsp; <a href="#javascript;" onclick="postComents()" class="commentBtn">Post a Comment</a> </div>
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
                    <?php echo ringsPoliciesTabs();; ?>
                </div>
            </div>
            <div class="clear"></div><br><br>
        </div>
 
<script>
function centerStoneDiamondList(ringid) {
    var opt = $('#finished_level').val();
    $('#center_diamond_list').html('<div class="wait_data">LOADING PLEASE WAIT.....</div>');
    
    if( opt === 'complete_stone' ) {
        $.ajax({
            type: "POST",
            url: base_url + 'testengagementrings/viewCenterStone/'+ringid,
            success: function(response) {
                     $('#center_diamond_list').html(response);
           },
                     error: function(){alert('Error ');}
        });
    } else {
        $('#center_diamond_list').html('');
    }
}
</script>
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
              	<input type="hidden" name="details_link" id="details_link" value="<?php echo 'heartjewelrylistings/collection_ring_detail/'.$rowsring['stock_number'];?>">
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
              <input type="hidden" name="details_link" id="details_link" value="<?php echo 'heartjewelrylistings/collection_ring_detail/'.$rowsring['stock_number'];?>">
                <input type="button" name="btn_exsubmit" class="btnStyle" onclick="askExperForm()" value="Submit" />
              </div>
            </div>
          </div>
        </form>
      </div>
      <!-- popup blocks end! --> 
<link type="text/css" href="<?php echo SITE_URL; ?>css/tabs_style.css" rel="stylesheet" />
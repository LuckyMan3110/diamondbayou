<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>css/jquery.popup.css" />
<link type="text/css" href="<?php echo SITE_URL; ?>css/simple_model.css" rel="stylesheet" />
<style>
    .prdSection {
      width: 21%; float: left; text-align: center; line-height: 20px;
    }
    .prdSection a img{padding-bottom: 10px;}
    .similar_products{padding: 15px 0px;}
</style>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script language="javascript" src="<?php echo SITE_URL; ?>js/jquery.popup.js" type="text/javascript"></script>
<script type="text/javascript" src="https://cdn.getfinancing.com/libs/1.0/getfinancing.js"></script>
<script>
    var $ = jQuery.noConflict();
    
function getRingSize(field_id) {
 var mt = document.getElementById(field_id).value;
 window.location = mt;	
}
function ringThumbView(th_url) {
	$('#ringsthumb_view').html('Loading.....');
	$('#ringsthumb_view').html('<img src="'+th_url+'" alt="th_url" width="400" onmousemove="jscMagnify(this,event)" onmouseout="jscMagnifyHide()" alt="" />')
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
  
  /*** Function to add all financing options with ajax if user is logged in ****/
   var onComplete = function() {
    // this is called when the user finishes all the steps and
	    // gets loan preapproved

	alert('all steps are completed make new call now');
   };

   var onAbort = function() {
	  alert('user closes the window ');
	    // this is called when the user closes the lightbox before
	    // finishing all the steps
   };
  function addfinancesubmit(pr_id,pageURL){
	
  	var urlink = base_url+'/testmmengagementrings/getfinancecall';
	/* Get users info if logged in else return error msg */
	$.ajax({
		 type: "POST",
		 url:urlink,
		 data: {			
			pr_id:pr_id
		 },
		 success: function(encoded_data) {
			 document.getElementById('form1').action = pageURL;
		         document.getElementById('form1').submit();
		},
		error: function(){alert('Error ');}
	  });
	
  }

</script>
<?php
    echo '<link rel="stylesheet" type="text/css" href="'.DEMO_RETAIL_CSS.'productdetail.css?version=03232016" media="all">';
?>
<script language="javascript" src="<?php echo SITE_URL; ?>js/common_function.js" type="text/javascript"></script>
    <div class="mainwrap"><br>
        <div class="back_link"> < Browse The David Stern Collection</div><br><br>
        <div class="uper_detail_block">
            <div class="uperdt_left">
                <div class="thumbleft">
                    <?php echo $rings_thumb; ?>
                </div>
                <div class="zoomright" id="ringsthumb_view">
                    <img src="<?php echo $ringimg; ?>" alt="<?php echo $ringtitle; ?>" />
                </div>
            </div>
            <form name="form1" id="form1" method="post" action="">
            <div class="uperdt_right">
               <div class="uperHeading">The David Stern Collection</div>
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
                <span><?php echo $rowsring['style_group']; ?></span>
            </div>    
            <div class="further_dtcols">
                <span>Metal</span>
                <span><?php echo $rowsring['matalType']; ?></span>
            </div>    
            <div class="further_dtcols">
                <span>Retail Price</span>
                <span><strike>$ <?php echo _nf($retail_price, 2); ?></strike> <span>save <?php echo round($saving_percent); ?>%</span></span>
            </div>    
            <div class="further_dtcols">
                <span>Carat Weight</span>
                <span><?php echo $rowsring['stone_weight']; ?></span>
            </div>
               <div class="clear"></div><br>
               <div class="further_dtcols">
                <span>Our Price</span>
                <span class="price_label" id="price_label">$ <?php echo _nf($rowsring['priceRetail'], 2) ; ?></span>
            </div>
               <div class="clear"></div><br>
               <div class="earnpoints">Earn <span>6118</span> D-Stern Reward Points</div>
               <hr class="horizontal_line" />
               <div class="further_dtcols metalsection ringsize">
                <span>Ring Size:</span>
                <span>
                    <select name="rings_size" id="rings_size" onchange="setListingPage(this.value)">
                           <?php echo $ringsize_option; ?>
                       </select>
                </span>
            </div>
               <div class="further_dtcols metalsection ringsize">
                <span>Metal Type:</span>
                <span>
                    <select name="metal_type" id="metal_type" onchange="setListingPage(this.value)">
                           <?php echo $ringsmetail; ?>
                       </select>
                </span>
            </div>
               <div class="further_dtcols metalsection ringsize">
                <span>Metal Weight:</span>
                <span>
                    <select name="metal_weight" id="metal_weight" onchange="setListingPage(this.value)">
                           <?php echo $ring_weight; ?>
                       </select>
                </span>
            </div>
               <div class="clear"></div>
               <div class="detail_botom_text">
                   <span>FINISH-LEVEL</span>
                   <span>
                       <select name="finish_level" id="finished_level" onchange="centerStoneDiamondList('<?php echo $rowsring['ring_id']; ?>')">
                           <option value="semi_mount">Semi-Mount</option>
                           <?php
                           $idlist_ar = array(7,66);
	
                            if(in_array($getparent_cate, $idlist_ar)) 
                            {
                                echo '<option value="complete_stone">Complete</option>';
                            }
                           ?>                           
                       </select>
                   </span>
                   <span>Qty</span>
                   <span><input type="text" class="qtyfield" name="txt_qty" value="1" /></span>
                   <span></span>
                   <span>
                       <a href="<?php echo SITE_URL.'account/account_wishlist/'.$rowsring['ring_id']; ?>"><img src="<?php echo IMGSRC_LINK; ?>addto_wish_ic.jpg" alt="addto_wish_ic"></a>
                   </span>
               </div>
               <div class="clear"></div><br><br>
               
                    <input type="hidden" name="txt_rstyle" id="txt_rstyle" value="<?php echo $setingtype; ?>">
                      <input type="hidden" name="3ez_price" value="<?php echo intval(number_format($ez3,0,'.','')); ?>">
                      <input type="hidden" name="5ez_price" value="<?php echo intval(number_format($ez5,0,'.','')); ?>">
                      <input type="hidden" name="main_price" id='main_price' value="<?php echo $rowsring['priceRetail']; ?>" />
                      <input type="hidden" name="price" value="<?php echo $rowsring['priceRetail']; ?>" />
                      <input type="hidden" name="vender" value="unique">
                      <input type="hidden" name="url" value="<?php echo $ringimg; ?>">
                      <input type="hidden" name="prodname" value="<?php echo $rowsring['name']?>">
                      <input type="hidden" name="diamnd_count" value="<?php echo $rowsring['supplied_stones'];?>">
                      <input type="hidden" name="ring_shape" value="<?php echo $suport_shape;?>">
                      <input type="hidden" name="ring_carat" value="<?php echo $rowsring['metal_weight']; ?>">
                      <input type="hidden" name="prid" id="prid" value="<?php echo $rowsring['ring_id'];?>">
                      <input type="hidden" name="txt_ringtype" value="generic_ring">
                      <input type="hidden" name="txt_ringsize" value="<?php echo $set_ring_size;?>" />
                      <input type="hidden" name="txt_metal" value="<?php echo $default_metal;?>" />
                      <input type="hidden" name="vendors_name" value="Unique Jewelry" />
                      <input type="hidden" name="center_stone_id" id="center_stone_id" />
           <div class="leftbtn_block">
                          <div class=""><a href="#javascript" onclick="addcartsubmit('<?php echo $buynow_link; ?>')" id="addtoshopping"><img src="<?php echo config_item('base_url') ?>images/buy-now.jpg" alt="buy-now"/></a><br />
                <div class="imaglogo"><a href="javascript:void(0);" id="addfinancing" onclick="addfinancesubmit('<?php echo $rowsring['name']; ?>','<?php echo $buynow_link; ?>');" ><img src="<?php echo SITE_URL; ?>demo_retail/images/logo-getfinancing.png" width="250" alt="getfinancing"></a></div>
            </div>
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
$uniqueRingsDesc = get_site_title().' stunning '.$rowsring['parent_cate'].' '.$setingtype.' Style '.$rowsring['category_name'].' diamond ring can be yours for <span id="viewDyPrice">$'._nf($rowsring['priceRetail'], 2).'</span>. This ring does not include the Center diamond. Center Diamonds are sold seperately.';                       
                       echo $uniqueRingsDesc; 
                       
?>
                    </div>
                    <div class="details_tab_right">
                        <div><b>ITEM INFORMATION</b></div><br>
                        <div class="item_detail_bk">
                            <div class="item_rows">
                                <span>Item Code</span>
                                <span><?php echo $rowsring['style_group']; ?></span>
                                <div class="clear"></div>
                            </div>
                            <div class="item_rows">
                                <span>Approx. Weight</span>
                                <span><?php echo $rowsring['metal_weight']; ?></span>
                                <div class="clear"></div>
                            </div>
                            <div class="item_rows">
                                <span>Measurements</span>
                                <span><?php echo 'Top Width: '.$rowsring['top_width'].' mm, Bottom Width: '.$rowsring['bottom_width'].' mm, <br>Top Height: '.$rowsring['top_height'].' mm, Bottom Height: '.$rowsring['bottom_height'].' mm'; ?></span>
                                <div class="clear"></div><br>
                            </div>
                            <div class="item_rows">
                                <span>Style Name</span>
                                <span><?php echo $rowsring['name']; ?></span>
                                <div class="clear"></div>
                            </div>
                            <div class="item_rows">
                                <span>Style Group Name</span>
                                <span><?php echo $rowsring['style_group']; ?></span>
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
                        </div>
                        <div class="clear"></div><br>
                        <div><b>DIAMOND INFORMATION</b></div><br>
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
                            
                        </div>
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
            <div class="clear"></div><br>
            <div class="popular_rings">
                    <div class="pprings_heading">Popular Rings <a href="#">See More</a></div><br>
                    <?php echo $popular_listings; ?>
                    <div class="clear"></div><br>
                </div>
                 <hr class="horizontal_line1" />
            <div class="clear"></div>
            <div class="popular_rings">
                    <div class="pprings_heading">More Rings <a href="#">See More</a></div><br>
                    <?php echo $more_engagement_listings; ?>
                    <div class="clear"></div><br>
                </div>
            <div class="clear"></div><br><br>
            <div class="david_sterndm">
                <div class="davidst_left">
                    <div><img src="<?php echo IMGSRC_LINK; ?>david_engagement_view.jpg" alt="david_engagement_view"></div> 
                </div>
                <div class="davidst_right">
                    <div><iframe width="230" height="146" src="https://www.youtube.com/embed/AauU2UG8c28" frameborder="0" allowfullscreen></iframe></div>
                    <div><iframe width="230" height="146" src="https://www.youtube.com/embed/f1nyVGBESFM" frameborder="0" allowfullscreen></iframe></div>
                    <div><iframe width="230" height="146" src="https://www.youtube.com/embed/lXaEOiK5D-I" frameborder="0" allowfullscreen></iframe></div>
                    <div><iframe width="230" height="146" src="https://www.youtube.com/embed/J3JZB3uh98w" frameborder="0" allowfullscreen></iframe></div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
            <div class="david_biodata">
                <div class="dbio_left"><img src="<?php echo IMGSRC_LINK; ?>david_stern_bg.jpg" alt="david_stern_bg"></div>
                <div class="dbio_right">
                    <br><br>
                    <div class="david_heading">The Story of David Stern</div><br><br>
                    <div>David was trained in London, England under expert European Jewelers. After a 5 year apprenticeship, He learned how to hand make fine jewelry from scratch in the traditional fashion developed over many centuries, He opened his first business in 1970. </div>
                    <br>
                    <div>Within 5 years of hard work and determination to make his mark, he had achieved the opening of 3 retail stores in London, including one in Hatton Garden (the British version of 47th Street in NYC which is the US Manufacturing and Diamond Center) and two others in Central London. In addition, David has a thriving manufacturing business selling his one of a kind designs to retail jewelers throughout the UK. As a nationally known jewelry designer, he also regularly appraised antique, period and estate jewelry.</div>
                    
                    <div>Looking for an opportunity to become more exposed to new and innovative jewelry ideas, David emigrated to the US in 1976. His first priority was educating himself with the American way of doing business. David started to buy and sell antique and estate jewelry. He traveled the US participating in the estate jewelry show circuit to establish new contacts and start to build a reputation for his expertise in that field, while at the same time developing his latest collection of original jewelry designs. After achieving the above, David settled in Miami. He opened his first US store in downtown Miami in the Seybold Building (the central building in the jewelry district in South Florida) It featured his original designs and his unique antique jewelry collection gathered while touring the various antique shows.
                    </div><br><br>
                    <div class="readfullStory"><a href="#">Read Full Story</a></div>
                    <br><br>
                </div>
                <div class="clear"></div>
            </div>
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
              	<input type="hidden" name="details_link" id="details_link" value="<?php echo 'testengagementrings/engagement_ring_detail/'.$rowsring['id'];?>">
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
              <input type="hidden" name="details_link" id="details_link" value="<?php echo 'testengagementrings/engagement_ring_detail/'.$rowsring['id'];?>">
                <input type="button" name="btn_exsubmit" class="btnStyle" onclick="askExperForm()" value="Submit" />
              </div>
            </div>
          </div>
        </form>
      </div>
      <!-- popup blocks end! --> 
<link type="text/css" href="<?php echo SITE_URL; ?>css/tabs_style.css" rel="stylesheet" />

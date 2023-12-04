<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>css/jquery.popup.css" />
<!--<script src="https://code.jquery.com/jquery-1.10.2.js"></script>-->
<!--<script language="javascript" src="<?php echo SITE_URL; ?>js/jquery.popup.js" type="text/javascript"></script>-->
        
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
 
</script>
<script language="javascript" src="<?php echo SITE_URL; ?>js/common_function.js" type="text/javascript"></script>
    <div class="mainwrap container">
        <hr>
        <br>
        <div class="back_link"> < Browse The Heart and Diamond Collection</div><br><br>
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
            <div class="uperdt_right col-sm-5">
               <div class="uperHeading">The Heart and Diamond Collection</div>
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
                <span><?php echo $rowsring['Sku']; ?></span>
            </div>    
            <div class="further_dtcols">
                <span>Metal</span>
                <span><?php echo $rowsring['SearchFilterValue1']; ?></span>
            </div>
            
           <?php
             $ringsize_options = '';
             
             if( !empty($rowsring['RingSizable']) ) {
                $ringsize_options .= '<div class="further_dtcols">
                                        <span>Ring Size</span>
                                        <span>'.$rowsring['RingSizable'].'</span>
                                    </div>';
             }
             if( !empty($rowsring['RingSizeype']) ) {
                $ringsize_options .= '<div class="further_dtcols">
                                        <span>Size Type</span>
                                        <span>'.$rowsring['RingSizeype'].'</span>
                                    </div>';
             }
             echo $ringsize_options;
           
             ?>
               
            <div class="further_dtcols">
                <span>Retail Price</span>
                <span><strike>$ <?php echo _nf($retail_price, 2) ; ?></strike> <span>save <?php echo round($saving_percent); ?>%</span></span>
            </div>    
            <div class="further_dtcols">
                <span>Weight</span>
                <span><?php echo $rowsring['Weight']; ?></span>
            </div>
               <div class="clear"></div><br>
               <div class="further_dtcols">
                <span>Our Price</span>
                <span class="price_label">$ <?php echo _nf($sales_price, 2); ?></span>
            </div>
               <div class="clear"></div><br>
               <div class="earnpoints">Earn <span>6118</span> D-Stern Reward Points</div>
               <hr class="horizontal_line" />
            <?php if( strpos($rowsring['stuller_cate'], 'Ring') !== false ) { ?>
               <div class="further_dtcols metalsection ringsize">
                <span>Finger Size</span>
                <span>
                    <select name="finger_size" id="finger_size" onchange="setListingPage(this.value)">
                           <?php echo $finger_ring_size; ?>
                       </select>
                </span>
            </div>
            <?php } ?>
               <div class="clear"></div>
               <div class="detail_botom_text">
                   <span>FINISH-LEVEL</span>
                   <span>
                       <select name="finish_level" id="finish_level">
                           <option>Semi-Mount</option>
                           <option>Complete</option>
                       </select>
                   </span>
                   <span>Qty</span>
                   <span><input type="text" class="qtyfield" name="txt_qty" value="1" /></span>
                   <span></span>
                   <span><a href="<?php echo SITE_URL.'account/account_wishlist/'.$rowsring['stuller_id']; ?>"><img src="<?php echo IMGSRC_LINK; ?>addto_wish_ic.jpg" alt="addto_wish_ic"></a></span>
               </div>
               <div class="clear"></div><br><br>
               
                    <input type="hidden" name="txt_rstyle" id="txt_rstyle" value="">
                    <input type="hidden" name="3ez_price" value="0">
                    <input type="hidden" name="5ez_price" value="0">
                    <input type="hidden" name="main_price" value="<?php echo $sales_price; ?>" />
                    <input type="hidden" name="vender" value="unique">
                    <input type="hidden" name="url" value="<?php echo $ringimg ?>">
                    <input type="hidden" name="prodname" value="<?php echo $rowsring['Description']?>" />
                    <input type="hidden" name="diamnd_count" value="">
                    <input type="hidden" name="ring_shape" value="">
                    <input type="hidden" name="ring_carat" value="<?php echo $rowsring['Weight'];?>">
                    <input type="hidden" name="prid" value="<?php echo $rowsring['stuller_id'];?>">
                    <input type="hidden" name="txt_ringtype" value="generic_ring">
                    <input type="hidden" name="txt_ringsize" value="<?php echo $set_ring_size; ?>" />
                    <input type="hidden" name="price" value="<?php echo $sales_price; ?>" />
                    <input type="hidden" name="txt_metal" value="" />
                    <input type="hidden" name="txt_addoption" value="stullerrings" />
                    <input type="hidden" name="unique_pagelink" value="<?php echo $stuller_link; ?>" />
                    <input type="hidden" name="vendors_name" value="Stuller Jewelry" />
                    <div class="leftbtn_block">
                       <div class=""><a href="#javascript" onclick="addcartsubmit('<?php echo $buynow_link; ?>')" id="addtoshopping"><img src="<?php echo config_item('base_url') ?>images/buy-now.jpg" alt="buy-now" title="buy now"/></a><br /></div> 
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
            
            </div>
            </form>
            <div class="clear"></div><br><br>
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
                    <div class="details_tab_left col-sm-5">
                       <?php echo $item_desc; ?>
                    </div>
                    <div class="details_tab_right col-sm-6">
                        <div><b>ITEM INFORMATION</b></div><br>
                        <div class="item_detail_bk">
                            <div class="item_rows">
                                <span>Item Code</span>
                                <span><?php echo $rowsring['Sku']; ?></span>
                                <div class="clear"></div>
                            </div>
                            <div class="item_rows">
                                <span>Stuller Category</span>
                                <span><?php echo $rowsring['stuller_cate']; ?></span>
                                <div class="clear"></div>
                            </div>
                    
                <?php
                    $itemInformation = '';
                    if( !empty($rowsring['RingSizable']) ) {  
                        $itemInformation .= '<div class="item_rows">
                                            <span>Ring Size</span>
                                            <span>'.$rowsring['RingSizable'].'</span>
                                            <div class="clear"></div>
                                        </div>';
                    }
                    if( !empty($rowsring['RingSizeype']) ) {  
                        $itemInformation .= '<div class="item_rows">
                                            <span>Ring Size Type</span>
                                            <span>'.$rowsring['RingSizeype'].'</span>
                                            <div class="clear"></div>
                                        </div>';
                    }
                    if( !empty($rowsring['GroupDescription']) ) {  
                        $itemInformation .= '<div class="item_rows">
                                            <span>Group Description</span>
                                            <span>'.$rowsring['GroupDescription'].'</span>
                                            <div class="clear"></div>
                                        </div>';
                    }
                for( $c=1; $c<=5; $c++) {
                    if( !empty($rowsring['MerchandisingCategory'.$c]) ) {  
                        $itemInformation .= '<div class="item_rows">
                                            <span>Category'.$c.'</span>
                                            <span>'.$rowsring['MerchandisingCategory'.$c].'</span>
                                            <div class="clear"></div>
                                        </div>';
                    }
                }
                    if( !empty($rowsring['Weight']) ) {  
                        $itemInformation .= '<div class="item_rows">
                                            <span>Weight</span>
                                            <span>'.$rowsring['Weight'].'</span>
                                            <div class="clear"></div>
                                        </div>';
                    }
                    if( !empty($rowsring['Status']) ) {  
                        $itemInformation .= '<div class="item_rows">
                                            <span>Status</span>
                                            <span>'.$rowsring['Status'].'</span>
                                            <div class="clear"></div>
                                        </div>';
                    }
                    if( !empty($rowsring['GramWeight']) ) {  
                        $itemInformation .= '<div class="item_rows">
                                            <span>Gram Weight</span>
                                            <span>'.$rowsring['GramWeight'].'</span>
                                            <div class="clear"></div>
                                        </div>';
                    }
                    if( !empty($rowsring['AGTA']) ) {  
                        $itemInformation .= '<div class="item_rows">
                                            <span>AGTA</span>
                                            <span>'.$rowsring['AGTA'].'</span>
                                            <div class="clear"></div>
                                        </div>';
                    }
                    if( !empty($rowsring['DescriptiveElementGroup']) ) {  
                        $itemInformation .= '<div class="item_rows">
                                            <span>Desc. Element Group</span>
                                            <span>'.$rowsring['DescriptiveElementGroup'].'</span>
                                            <div class="clear"></div>
                                        </div>';
                    }
                for($r=1; $r<=15; $r++) {
                    if( !empty($rowsring['DescriptiveElementName'.$r]) ) {  
                        $itemInformation .= '<div class="item_rows">
                                            <span>'.$rowsring['DescriptiveElementName'.$r].'</span>
                                            <span>'.$rowsring['DescriptiveElementValue'.$r].'</span>
                                            <div class="clear"></div>
                                        </div>';
                    }
                }
                for($s=1; $s<=6; $s++) {
                    if( !empty($rowsring['SearchFilterName'.$s]) ) {  
                        $itemInformation .= '<div class="item_rows">
                                            <span>'.$rowsring['SearchFilterName'.$s].'</span>
                                            <span>'.$rowsring['SearchFilterValue'.$s].'</span>
                                            <div class="clear"></div>
                                        </div>';
                    }
                }
                    if( !empty($rowsring['CountryOfOrgin']) ) {  
                        $itemInformation .= '<div class="item_rows">
                                            <span>Country of Orignin</span>
                                            <span>'.$rowsring['CountryOfOrgin'].'</span>
                                            <div class="clear"></div>
                                        </div>';
                    }
                    if( !empty($rowsring['CreationDate']) ) {  
                        $itemInformation .= '<div class="item_rows">
                                            <span>Creation Date</span>
                                            <span>'.$rowsring['CreationDate'].'</span>
                                            <div class="clear"></div>
                                        </div>';
                    }
                    if( !empty($rowsring['LeadTime']) ) {  
                        $itemInformation .= '<div class="item_rows">
                                            <span>Lead Time</span>
                                            <span>'.$rowsring['LeadTime'].'</span>
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
                    <div class="pprings_heading">Popular Stuller Rings <a href="#">See More</a></div><br>
                    <?php echo $popular_listings; ?>
                    <div class="clear"></div><br>
                </div>
                 <hr class="horizontal_line1" />
            <div class="clear"></div>
            <div class="popular_rings">
                    <div class="pprings_heading">More Stuller Rings <a href="#">See More</a></div><br>
                    <?php echo $more_stuller_listings ?>
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
            <input type="hidden" name="details_link" id="details_link" value="<?php echo 'stullerygoldrings/stuller_ring_detail/'.$rowsring['stuller_id'];?>">
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
          <input type="hidden" name="details_link" id="details_link" value="<?php echo 'stullerygoldrings/stuller_ring_detail/'.$rowsring['stuller_id'];?>">
            <input type="button" name="btn_exsubmit" class="btnStyle" onclick="askExperForm()" value="Submit" />
          </div>
        </div>
      </div>
    </form>
  </div>
  <!-- popup blocks end! -->
<link type="text/css" href="<?php echo SITE_URL; ?>css/tabs_style.css" rel="stylesheet" />
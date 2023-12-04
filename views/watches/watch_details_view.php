<script>
function getRingSize(field_id) {
 var mt = document.getElementById(field_id).value;
 window.location = mt;	
}
function ringThumbView(th_url) {
	$('#ringsthumb').html('Loading.....');
	$('#ringsthumb').html('<img src="'+th_url+'" width="400" onmousemove="jscMagnify(this,event)" onmouseout="jscMagnifyHide()" alt="" />')
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
</script>
<script>
/*function ringThumbView(th_url) {
	//$('#ringsthumb').html('Loading.....');
	$('.zoom_01').remove();

	$('.zoom_01').removeData('elevateZoom');


$('#ringsthumb').html('<img src="'+th_url+'" width="400" class="zoom_01" data-zoom-image="http://yadegardiamonds.com/scrapper/imgs/00014212835d9c7765e82a2e40bab3fe.jpg">')
}*/
</script>
<style>
#ringsthumb {
	position:relative;
}
/*.codeDiv {
	font-family:monospace;
	border:1px solid yellow;
	padding:5px;
	background-color:#FFFFFA;
}
.warningDiv {
	border:1px solid #F99;
	background-color:#FFE;
	padding:5px;
}*/

.formStyle textarea{height:58px !important;}
.ctdm_shapes {
}
.ctdm_shapes a img {
	width:32px;
}
.activeShape img {
	border:1px solid #FF0;
}
.commentsForm{ padding:0px 20px;}
.commentsForm textarea {height:50px;}
.commentsForm .fieldBlock {
  margin-bottom: 10px;  padding-top: 5px;
}
.formStyle .fLabel { font-size:14px;}
a:hover{ text-decoration:none !important;}
.formStyle input[type='email']{
  width: 250px;
  border: 0px;
  background: #f0f0f0;
  padding: 6px 10px;
  font-size: 16px;
}
#view_errors{ color: #F00;  padding-bottom: 3px;}
.tabBox{width: 94%;}
#ringsthumb{height: auto !important;}
</style>
<br>
<div id="" class="row-fluid ringsDetail">
  <div class="col-sm-3">
    <?php
		echo accordian_left_menu('styles', $catgory_id);
	?>
  </div>
  <div class="col-sm-9">
    <div class="pgSt">
      <div class="bread-crumb brbg">
        <div class="breakcrum_bk">
            <ul>
              <li><a href="<?php echo config_item('base_url') ?>">Home</a></li>
              <li><a href="<?php echo SITE_URL; ?>watches/watches_settings/false/false/false/false/solitaire"><?php echo $details['productName'] ?></a></li></ul>
        </div>
        <div class="clear"></div>
      </div>
      <br />
    </div>
    <div class="contentTb">
      <?php
	
	$watchDescription = get_site_title().' '.$details['brand'].' '.$prod_type.' watch can be yours for <span id="viewDyPrice">$'.$watch_price.'.';
	
    ?>
      <form id="watchForm" name="watchForm" method="post">
        <table class="contb_bk">
          <tr>
            <td><div class="whHead"> <span class="dwar-icon"></span> <?php echo $details['productName']; ?> </div>
              <br />
              <div class="textList">
                <label>Watch Type:&nbsp;&nbsp;</label>
                <span><?php echo $prod_type; //$seting_type; ?></span> </div>
              <div class="textList">
                <label>Product ID:&nbsp;&nbsp;</label>
                <span><?php echo $details['upc']; ?></span> </div>
              <div class="textList">
                <?php
                if($watch_price > 0) {
                    echo '<label>Price:&nbsp;&nbsp;</label>
                <span id="vieDyPrice">$'.$watch_price.'</span>';
                } else {
                    echo '<label>Call: 415.626.5035</label>';
                }
              ?>
              </div>
              <div class="textList">
                <label>Case Diameter:&nbsp;&nbsp;</label>
                <span class="engra_text"><?php echo $details['case_diameter']; ?></span> </div>
              <br />
              <br />
              <div class="readText"><?php echo $watchDescription; //echo $details['bail_info']; ?></div>
              <br />
              <div class="whHead"> <span class="dwar-icon"></span>
                <label>Measurements</label>
              </div>
              <br />
              <div class="textList">
                <div class="left_measure">
                  <label>Length:</label>
                  <span><?php echo check_empty($details['band_length'], 'NA'); ?></span> </div>
                <div class="right_measure">
                  <label>Width:</label>
                  <span><?php echo check_empty($details['width'], 'NA'); ?></span> </div>
              </div>
              	<div class="clear"></div>
              </td>
            <td colspan="2"><div id="ringsthumb"><img src="<?php echo $watch_image; ?>" width="400" height="400" alt="<?php echo $details['name']; ?>" onmousemove='jscMagnify(this,event);' onmouseout='jscMagnifyHide();' /></div>
              <br>
              <div class="vringThumb"><?php echo $ring_thumbs; ?></div>
              <br>
              
              <!--<img src="<?php echo config_item('base_url') ?>images/scroll_gl.jpg" />--></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><div class="engra_text social_box">
                <div class="textList">
                  <label>Model :&nbsp;&nbsp;</label>
                  <span><?php echo check_empty($details['model_number'], 'NA'); ?></span> </div>
                <div class="textList">
                  <label>Brand :&nbsp;&nbsp;</label>
                  <span><?php echo check_empty($details['brand'], 'NA'); ?></span> </div>
                <div class="textList"> <br />
                  <div> <a href="#javascript;" onclick="addcartsubmit('<?php echo $buynow_link; ?>')" id="addtoshopping"><img src="<?php echo config_item('base_url') ?>images/buy-now.jpg" /></a><br />
                    <br />
                    <?php 
						//echo $addtoRingBtn;
					?>
					
                    <input type="hidden" name="txt_rstyle" id="txt_rstyle" value="<?php echo $rint_style; ?>">
                    <input type="hidden" name="3ez_price" value="<?php echo intval(number_format($ez3,0,'.','')); ?>">
                    <input type="hidden" name="5ez_price" value="<?php echo intval(number_format($ez5,0,'.','')); ?>">
                    <input type="hidden" name="price" value="<?php echo $watch_price; ?>">
                    <input type="hidden" name="main_price" value="<?php echo $watch_price; ?>">
                    <input type="hidden" name="vender" value="watches">
                    <input type="hidden" name="url" value="<?php echo $watch_image ?>">
                    <input type="hidden" name="prodname" value="<?php echo $details['productName']?>">
                    <input type="hidden" name="diamnd_count" value="<?php echo $details['diamond'];?>">
                    <input type="hidden" name="ring_shape" value="">
                    <input type="hidden" name="ring_carat" value="">
                    <input type="hidden" name="prid" value="<?php echo $watch_id;?>" />
                    <input type="hidden" name="txt_ringtype" value="<?php echo $details['brand'];?>">
                    <input type="hidden" name="txt_ringsize" value="" />
                    <input type="hidden" name="txt_metal" value="<?php echo watchCaseValue($details['metal']);?>" />
                    <input type="hidden" name="txt_addoption" value="addwatch" />
                    <input type="hidden" name="vendors_name" value="Rolex Watch" />
                  </div>
                  <div class="clear"></div>
                  <br />
                  <div class="share_this"> 
                    <!--<span class='st_sharethis_hcount' displayText='ShareThis'></span>--> 
                    <span class='st_facebook_hcount' displayText='Facebook'></span> <span class='st_twitter_hcount' displayText='Tweet'></span> <span class='st_linkedin_hcount' displayText='LinkedIn'></span> <span class='st_pinterest_hcount' displayText='Pinterest'></span> 
                    <!--<span class='st_email_hcount' displayText='Email'></span>--> 
                  </div>
                </div>
              </div></td>
            <td>
            	<div class="linkBlock">
                <div class="textList"> <a href="#" class="js__p_start"><span class="askic"></span>&nbsp;&nbsp;Ask a Friend</a> </div>
                <div class="textList"> <a href="#" class="js__p_another_start"><span class="askxic"></span>&nbsp;&nbsp;Ask an Expert</a> </div>
                <div class="textList"> <a href="#javascript;" onclick="printCurrPage();"><span class="printic"></span>&nbsp;&nbsp;Print This</a> </div>
                <div class="textList"> <a href="<?php echo SITE_URL.'account/account_wishlist/'.$watch_id.'/add/addwatch'; ?>"><span class="addic"></span>&nbsp;&nbsp;Add To wish List</a></div>
              </div></td>
          </tr>
          <tr>
            <td colspan="3">
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
              <?php
				$min_rsize = $result_rsize[0]['minimum_rsize'];
				$max_rsize = $result_rsize[0]['maximum_rsize'];
            ?>
              </td>
          </tr>
        </table>
      </form>
      <div id="example-two">
                <ul class="nav">
                  <li class="nav-one"><a href="#featured2" class="current">More Details</a></li>
                  <li class="nav-two"><a href="#core2">Similar Products</a></li>
                  <li class="nav-three"><a href="#jquerytuts2">Customer Reviews</a></li>
                  <li class="nav-four last"><a href="#classics2">Policies</a></li>
                </ul>
                <div class="list-wrap">
                  <div id="featured2">
                    <div class="tabsHeading">Description</div>
                    <br />
                    <div class="tabsData"><?php echo $watchDescription; ?> <a href="#">diamond inventory</a>.</div>
                    <br />
                    <div class="tabsHeading"><?php echo get_site_title(); ?> Signature</div>
                    <br />
                    <div class="tabsData">Supplied by approved outside vendors who have passed our strict quality control process. Selection is based on design, 
                      quality of materials, and price for the product.</div>
                    <br />
                    <br />
                    <div class="col-sm-6">
                        <div class="tabBox">
                      <div class="tabsHeading">WATCH INFORMATION:</div>
                      <div class="tabsRow">
                        <div class="metaLeft">Appraisal Value: <span class="sizeBlock"><?php echo $details['apprisal']; ?></span> </div>
                      </div>
                      <div class="tabsRow">
                        <div class="metaLeft">Product Type: <span class="sizeBlock"><?php echo $prod_type; ?></span> </div>
                      </div>
                      <div class="tabsRow">
                        <div class="metaLeft">ID Value: <span class="sizeBlock"><?php echo $details['upc']; ?></span> </div>
                      </div>
                      <div class="tabsRow">
                        <div class="metaLeft">Model Number: <span class="sizeBlock"><?php echo $details['model_number']; ?></span> </div>
                      </div>
                      <div class="tabsRow">
                        <div class="metaLeft">Case: <span class="sizeBlock"><?php echo watchCaseValue($details['metal']); ?></span> </div>
                      </div>
                      <div class="tabsRow">
                        <div class="metaLeft">Grade: <span class="sizeBlock"><?php echo $details['style']; ?></span> </div>
                      </div>
                      <div class="tabsRow">
                        <div class="metaLeft">Type: <span class="sizeBlock"><?php echo $watch_type; ?></span> </div>
                      </div>
                      <div class="tabsRow">
                        <div class="metaLeft">Band: <span class="sizeBlock"><?php echo $details['band']; ?></span> </div>
                      </div>
                      <div class="tabsRow">
                        <div class="metaLeft">Dial Color: <span class="sizeBlock"><?php echo $details['dial']; ?></span> </div>
                      </div>
                      <div class="tabsRow">
                        <div class="metaLeft">Band Material: <span class="sizeBlock"><?php echo $details['bezel']; ?></span> </div>
                      </div>
                      <div class="tabsRow">
                        <div class="metaLeft">Part Number: <span class="sizeBlock"><?php echo $details['part']; ?></span> </div>
                      </div>
                      <div class="tabsRow">
                        <div class="metaLeft">Clasp: <span class="sizeBlock"><?php echo $details['clasp']; ?></span> </div>
                      </div>
                      <div class="tabsRow">
                        <div class="metaLeft">Case Diameter: <span class="sizeBlock"><?php echo $details['case_diameter']; ?></span> </div>
                      </div>
                      <div class="tabsRow">
                        <div class="metaLeft">Band Length: <span class="sizeBlock"><?php echo $details['band_length']; ?></span> </div>
                      </div>
                      <div class="tabsRow">
                        <div class="metaLeft">Band Color: <span class="sizeBlock"><?php echo $details['band_color']; ?></span> </div>
                      </div>
                      <div class="tabsRow">
                        <div class="metaLeft">Movement: <span class="sizeBlock"><?php echo $details['movement']; ?></span> </div>
                      </div>
                      <div class="tabsRow">
                        <div class="metaLeft">Band Width: <span class="sizeBlock"><?php echo $details['width']; ?></span> </div>
                      </div>
                      <div class="tabsRow">
                        <div class="metaLeft">Warranty: <span class="sizeBlock"><?php echo $details['warranty']; ?></span> </div>
                      </div>
                    </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="tabBox">
                          <div class="tabsHeading">Interested in a Different Watches :</div>
                          <div class="tabsRow furtherdesc"> For the exceptional cases where you request other watch please <a href="#javascript;" class="js__p_another_start clickLink">click this link</a> and fill out form for your custom specifications you desire for watch. </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                  </div>
                  <div id="core2" class="hide">
                    <div class="similar_prod"> <?php echo $similarWatches; ?>
                      <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                    <div>
                      <?php //print_r($records); ?>
                    </div>
                  </div>
                  
                  <div id="jquerytuts2" class="hide">
                    <div class="reviewLink"> <img src="<?php echo config_item('base_url') ?>img/page_img/stars_icon.png" />&nbsp;&nbsp; <a href="#javascript;" onclick="postComents()" class="commentBtn">Post a Comment</a> </div>
                    <div id="">
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
                                <div class="fLabel">Watch Rating</div>
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
                  <div id="classics2" class="hide">
                    <?php
				  		echo ringsPoliciesTabs();
				  ?>
                  </div>
                </div>
                <!-- END List Wrap --> 
                
              </div>
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
              	<input type="hidden" name="details_link" id="details_link" value="<?php echo 'watches/watches_detail/'.$watch_id;?>">
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
              <input type="hidden" name="details_link" id="details_link" value="<?php echo 'watches/watches_detail/'.$watch_id;?>">
                <input type="button" name="btn_exsubmit" class="btnStyle" onclick="askExperForm()" value="Submit" />
              </div>
            </div>
          </div>
        </form>
      </div>
      <!-- popup blocks end! --> 
    </div>
  </div>
  <div class="clear"></div>
  <br />
  <div class="clear"></div>
  <div class="clearfix"></div>
  <script type="text/javascript">
   function addcartsubmit(pageURL)
    {
		document.getElementById('watchForm').action = pageURL;
		document.getElementById('watchForm').submit();
    }
	
		$('#zoom_01').elevateZoom({
		zoomType: "inner",
	cursor: "crosshair",
	zoomWindowFadeIn: 500,
	zoomWindowFadeOut: 750
	   }); 
   
    // ON BLUR , ON FOCUS	
    function myFocus(element) 
    {
    if (element.value == element.defaultValue) {
    element.value = '';
    }
    }
    function myBlur(element) 
    {
    if (element.value == '') {
    element.value = element.defaultValue;
    }
    
    }
    
    </script> 
  <script type="text/javascript">
    
    var currentImage;
    var currentIndex = -1;
    var interval;
    function showImage(index){
    if(index < $('#bigPic img').length){
    var indexImage = $('#bigPic img')[index]
    if(currentImage){   
    if(currentImage != indexImage ){
    $(currentImage).css('z-index',2);
    clearTimeout(myTimer);
    $(currentImage).fadeOut(250, function() {
    myTimer = setTimeout("showNext()", 3000);
    $(this).css({'display':'none','z-index':1})
    });
    }
    }
    $(indexImage).css({'display':'block', 'opacity':1});
    currentImage = indexImage;
    currentIndex = index;
    $('#thumbs li').removeClass('active');
    $($('#thumbs li')[index]).addClass('active');
    }
    }
    
    function showNext(){
    var len = $('#bigPic img').length;
    var next = currentIndex < (len-1) ? currentIndex + 1 : 0;
    showImage(next);
    }
    
    var myTimer;    
		$(document).ready(function() {
		myTimer = setTimeout("showNext()", 3000);
		showNext(); //loads first image
		$('#thumbs li').bind('click',function(e){
		var count = $(this).attr('rel');
		showImage(parseInt(count)-1);
		});
    });
    </script> 
  <script type="text/javascript">
    $(document).ready( function() {
    $("#tabs ul li:first").addClass("active");
    $("#tabs div:gt(0)").hide();
    $("#tabs ul li").click(function(){
    $("#tabs ul li").removeClass('active');
    //var current_index = $(this).index(); // Sử dụng cho jQuery >= 1.4.x
    var current_index = $("#tabs ul li").index(this);
    $("#tabs ul li:eq("+current_index+")").addClass("active");
    $("#tabs div").hide();
    $("#tabs div:eq("+current_index+")").fadeIn(100);
    });
    });
    </script> 
  <script type="text/javascript">
 
    
    function init()
    {
    var quaselection = document.getElementById('slectmetaltype');
    quaselection.onchange = ringSize;
    }
    window.onload = init;

    $('.zoom_01').elevateZoom({

    zoomType: "inner",
cursor: "crosshair",
zoomWindowFadeIn: 500,
zoomWindowFadeOut: 750
   });
	</script> 
</div>
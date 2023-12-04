<script>
function getRingSize(field_id) {
 var mt = document.getElementById(field_id).value;
 window.location = mt;	
}
function ringThumbView(th_url) {
	$('#ringsthumb').html('Loading.....');
	$('#ringsthumb').html('<img src="'+th_url+'" width="300" onmousemove="jscMagnify(this,event)" onmouseout="jscMagnifyHide()" alt="" />')
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
			 $('#view_errors').html('<div style="margin: 0px auto; "><img src="'+base_url+'images/loading.gif" alt="icon"></div>');
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

.formStyle textarea{height:48px !important;}
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
  margin-bottom: 8px;  padding-top: 1px;
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
.reviewData{ color:#000 !important; font-size:16px !important;}
</style>
<div class="container main_wraper">
    <?php
        echo rings_page_baner('stuller_jewelry', 'Stuller Gold Jewelry');
    ?>
<div id="" class="row-fluid ringsDetail">
  <div class="col-sm-3">
    <?php
	//echo current_url();
	 	//$getUrl = split('/', current_url());
		//print_r($getUrl);
		echo accordian_left_menu('styles', $catgory_id);
	?>
  </div>
  <div class="col-sm-9">
    <div class="pgSt">
      <div class="bread-crumb brbg">
        <div class="breakcrum_bk">
            <ul>
              <li><a href="<?php echo SITE_URL; ?>">Home</a></li>
              <li><a href="#">Stuller Gold Jewelry</a></li>
              <?php echo $category_link; ?>
            </ul>
        </div>
        <div class="clear"></div>
      </div>
      <br />
    </div>
    <div class="contentTb">
      <?php
	
    $na = 'NA';
    $mm = ' mm';
    $top_width 	   = ( !empty($details['top_width']) ? $details['top_width'].$mm : $na );
    $bottom_width  = ( !empty($details['bottom_width']) ? $details['bottom_width'].$mm : $na );
    $top_height    = ( !empty($details['top_height']) ? $details['top_height'].$mm : $na );
    $bottom_height = ( !empty($details['bottom_height']) ? $details['bottom_height'].$mm : $na );
    $rint_style	   = $details['style_group'];
 
	$org_price=$ringPriceView;
        $cuprice=$ringPriceView;
	$cateid_ar = array(52, 128, 202);
	$notallowed_id = array(59,67,69);
        $ez3 = $org_price+(($org_price*$ez3value)/100);
        $ez_3ezprice = $ez3 - $cuprice1;
        $ez5=$org_price+(($ez5value*$org_price)/100);
        $fez5=$ez5; 
        $ez5 = $ez5 - $cuprice1;
        $sales_price = $details['Price']; //sales_price_view($org_price, $sale_percent);
    
        $ring_size = ( !empty( $details['ring_size'] ) ? $details['ring_size'] : 6 );
	$netRingPrice = number_format($details['Price'],2);
	//$ringDescription = get_site_title().' stunning Antique Style diamond semi mount '.$details['category_name'].' ring can be yours for <span id="viewDyPrice">$'.$netRingPrice.'</span>.';
	
	$ringDescription .= 'ring can be yours for <span id="viewDyPrice">$'.$netRingPrice.'</span>. This ring does not include the Center diamond. Center Diamonds are sold seperately.';
	
	$idlist_ar = array(7,66);
	
	if(in_array($getparent_cate, $idlist_ar)) 
	{
		$addtoRingBtn = '<a href="#javascript;" onclick="addcartsubmit(\''.$addtoring_link.'\')" id="addtoshopping"><img src="'.config_item('base_url').'images/select-ring.jpg"  alt="stars_icon"/></a><br />';
		$uniqueRingsDesc = $ringDescription;
		$viewSupliedStone = '<div class="tabsRow"><div class="metaLeft">Center Stone Sold Separately: <span class="sizeBlock">'.$details['additional_stones'].'</span></div></div>';
	} 
	else 
	{
		$addtoRingBtn = '';	
		$uniqueRingsDesc = get_site_title().' stunning '.$details['Description'] . ' can be yours for <span id="viewDyPrice">$'.$netRingPrice.'</span>.';
		$viewSupliedStone = '';
		if( !empty($details['additional_stones']) ) {
			$viewSupliedStone = '<div class="tabsRow"><div class="metaLeft">Center Stone Sold Separately: <span class="sizeBlock">'.$details['additional_stones'].'</span></div></div>';	
		}
	}
        $imageList = ( !empty($details['Images']) ? json_decode($details['Images']) : json_decode($details['GroupImages']) );
	$image_url = $imageList[0]->ZoomUrl; //$details['Image1'];
    ?>
      <form id="form1" name="form1" method="post" action="">
            <div class="row-fluid"> <!-- old class: contb_bk -->
            <div class="col-sm-5">
            <div class="whHead"> <span class="dwar-icon"></span> <?php echo $details['Description']; ?> </div>
              <br />
              <div class="textList">
                <label>Product ID:&nbsp;&nbsp;</label>
                <span><?php echo $details['Sku']; ?></span> </div>
<!--              <div class="textList">
                <?php
                if($netRingPrice > 0) {
                    echo '<label>Price:&nbsp;&nbsp;</label>
                <span id="vieDyPrice" class="lineprice">$'.$netRingPrice.'</span>';
                } else {
                    echo '<label>Call: 415.626.5035</label>';
                }
				
              ?>
              </div>-->
              <div class="textList">
<!-- <input type="radio" name="rb_pricetp" value="SP" checked="checked" />-->
                <?php
                if($netRingPrice > 0) {
                    echo '<label>Sale Price:&nbsp;&nbsp;</label>
                    <span id="vieDyPrice"> $'._nf($sales_price,2).'</span>';
                }
              ?>
              </div>
              <div class="textList">
                <label>Weight:&nbsp;&nbsp;</label>
                <span class="engra_text">
                    <?php echo _nf($details['Weight'],2); ?>
                    <input type="hidden" name="available_sizes" id="available_sizes" value="<?php echo $details['Status']; ?>" />
<!--                <select name="available_sizes" id="available_sizes" onchange="getRingSize('available_sizes')" class="dropdw_bx">
                  <?php echo $ring_weight; ?>
                </select>-->
                </span> </div>
              <br />
              <br />
              <div class="readText"><?php echo $uniqueRingsDesc; //echo $details['bail_info']; ?></div>
              <br />
<!--              <div class="whHead"> <span class="dwar-icon"></span>
                <label>Measurements</label>
              </div>
              <br />
              <div class="textList">
                <div class="left_measure">
                  <label>Top Width:</label>
                  <span><?php echo $top_width; ?></span> </div>
                <div class="right_measure">
                  <label>Bottom Width:</label>
                  <span><?php echo $bottom_width; ?></span> </div>
              </div>-->
<!--              <div class="clear"></div>
              <div class="textList">
                <div class="left_measure">
                  <label>Top Height:</label>
                  <span><?php echo $top_height; ?></span> </div>
                <div class="right_measure">
                  <label>Bottom Height:</label>
                  <span><?php echo $bottom_height; ?></span> </div>
              </div>-->
                           
              </div>
              <div class="col-sm-5">
              <div id="ringsthumb"><img src="<?php echo $image_url; ?>" width="300" alt="<?php echo $details['name']; ?>" onmousemove='jscMagnify(this,event);' onmouseout='jscMagnifyHide();' /></div>
              <br>
              <div class="vringThumb"><?php echo $ring_thumbs; ?></div>
              <div>
                    <table cellspacing="2">
                      <tr>
                        <td><div class="engra_text social_box">
                <div class="textList">
<!--                  <label>Metal Desc:&nbsp;&nbsp;</label>-->
                  <span>
<!--                  <select name="item_metaltp" id="cmb_metaltype" onchange="getRingSize('cmb_metaltype')" class="dropdw_bx">
                    <?php                    
                        echo $ringsmetail;
                    ?>
                  </select>-->
                      <input type="hidden" name="item_metaltp" id="cmb_metaltype" value="<?php //echo $details['Metal_Desc']; ?>">
                  <input type="hidden" name="price" value="<?php echo intval(number_format($sales_price,0,'.',''))?>,normal">
                  </span> </div>
<!--                <div class="textList">
                  <label>Ring Size:&nbsp;&nbsp;</label>
                  <span>
                  <select name="item_rsize" id="cmb_ringsize" onchange="getRingSize('cmb_ringsize')" class="dropdw_bx">
                    <?php
                        echo $ring_vsizes;
                    ?>
                  </select>
                  </span> </div>-->
                <div class="textList"> <br />
                  <?php if( empty($buildring) ) : ?>
                  <div> <a href="#" onclick="addcartsubmit('<?php echo $buynow_link; ?>')" id="addtoshopping"><img src="<?php echo config_item('base_url') ?>images/buy-now.jpg" /></a><br />
                    <br />
                    <?php endif; ?>
                    <?php //echo $addtoRingBtn; ?>
					
                    <input type="hidden" name="txt_rstyle" id="txt_rstyle" value="<?php echo $rint_style; ?>">
                    <input type="hidden" name="3ez_price" value="0">
                    <input type="hidden" name="5ez_price" value="0">
                    <input type="hidden" name="main_price" value="<?php echo $sales_price; ?>">
                    <input type="hidden" name="vender" value="unique">
                    <input type="hidden" name="url" value="<?php echo $image_url ?>">
                    <input type="hidden" name="prodname" value="<?php echo $details['Description']?>">
                    <input type="hidden" name="diamnd_count" value="">
                    <input type="hidden" name="ring_shape" value="">
                    <input type="hidden" name="ring_carat" value="<?php echo $details['Weight'];?>">
                    <input type="hidden" name="prid" value="<?php echo $ring_id;?>">
                    <input type="hidden" name="txt_ringtype" value="generic_ring">
                    <input type="hidden" name="txt_ringsize" value="" />
                    <input type="hidden" name="txt_metal" value="" />
                    <input type="hidden" name="txt_addoption" value="stullerrings" />
                    <input type="hidden" name="unique_pagelink" value="<?php echo $stuller_link; ?>" />
                    <input type="hidden" name="vendors_name" value="Stuller Jewelry" />
                  </div>
                  <div class="clear"></div>
                  <br />
                  <div class="share_this">
                    <span class='st_facebook_hcount' displayText='Facebook'></span> <span class='st_twitter_hcount' displayText='Tweet'></span> <span class='st_linkedin_hcount' displayText='LinkedIn'></span> <span class='st_pinterest_hcount' displayText='Pinterest'></span> 
                    <!--<span class='st_email_hcount' displayText='Email'></span>--> 
                  </div>
                </div>
              </div></td>
              <td>&nbsp;</td>
                      </tr>
                    </table>
              </div>

              <br>
              </div>
                <div class="col-sm-2">
                    
                  <div class="linkBlock">
<div class="textList"> <a href="#" class="js__p_start"><span class="askic"></span>&nbsp;&nbsp;Ask a Friend</a> </div>
<div class="textList"> <a href="#" class="js__p_another_start"><span class="askxic"></span>&nbsp;&nbsp;Ask an Expert</a> </div>
<div class="textList"> <a href="#javascript;" onclick="printCurrPage();"><span class="printic"></span>&nbsp;&nbsp;Print This</a> </div>
<div class="textList"> <a href="<?php echo SITE_URL.'account/account_wishlist/'.$ring_id.'/add/stullerings'; ?>"><span class="addic"></span>&nbsp;&nbsp;Add To wish List</a> </div>
            </div>
                </div>
              </div>
        
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
                    <div class="tabsData"><?php echo $uniqueRingsDesc; ?> <a href="#">diamond inventory</a>.</div>
                    <br />
                    <div class="tabsHeading"><?php echo get_site_title(); ?> Signature</div>
                    <br />
                    <div class="tabsData">Supplied by approved outside vendors who have passed our strict quality control process. Selection is based on design, 
                      quality of materials, and price for the product.</div>
                    <br />
                    <br />
                    <div class="col-sm-6">
                    	<div class="tabBox">
                      <div class="tabsHeading">SETTING INFORMATION:</div>
                      <div class="tabsRow">
                        <div class="metaLeft">Item SKU: <span class="sizeBlock"><?php echo $details['Sku']; ?></span> </div>
                      </div>
                      <div class="tabsRow">
                        <div class="metaLeft">Item Category: <span class="sizeBlock"><?php echo $details['stuller_cate']; ?></span> </div>
                      </div>
                      <?php
                      $viewSetting = '';
                      
                    if( !empty($details['GroupDescription']) ) {  
                      $viewSetting .= '<div class="tabsRow">
                        <div class="metaLeft">Group Description: <span class="sizeBlock">'.$details['GroupDescription'].'</span>'.'</div></div>';
                    }
                    if( !empty($details['MerchandisingCategory1']) ) {  
                      $viewSetting .= '<div class="tabsRow">
                        <div class="metaLeft">Category1: <span class="sizeBlock">'.$details['MerchandisingCategory1'].'</span>'.'</div></div>';
                    }
                    if( !empty($details['MerchandisingCategory2']) ) {  
                      $viewSetting .= '<div class="tabsRow">
                        <div class="metaLeft">Category2: <span class="sizeBlock">'.$details['MerchandisingCategory2'].'</span>'.'</div></div>';
                    }
                    if( !empty($details['MerchandisingCategory3']) ) {  
                      $viewSetting .= '<div class="tabsRow">
                        <div class="metaLeft">Category3: <span class="sizeBlock">'.$details['MerchandisingCategory3'].'</span>'.'</div></div>';
                    }
                    if( !empty($details['MerchandisingCategory4']) ) {  
                      $viewSetting .= '<div class="tabsRow">
                        <div class="metaLeft">Category4: <span class="sizeBlock">'.$details['MerchandisingCategory4'].'</span>'.'</div></div>';
                    }
                    if( !empty($details['MerchandisingCategory5']) ) {  
                      $viewSetting .= '<div class="tabsRow">
                        <div class="metaLeft">Category5: <span class="sizeBlock">'.$details['MerchandisingCategory5'].'</span>'.'</div></div>';
                    }
                    if( !empty($details['Weight']) ) {  
                      $viewSetting .= '<div class="tabsRow">
                        <div class="metaLeft">Weight: <span class="sizeBlock">'.$details['Weight'].' '.$details['WeightUnitOfMeasure'].'</span>'.'</div></div>';
                    }
                    if( !empty($details['Status']) ) {  
                      $viewSetting .= '<div class="tabsRow">
                        <div class="metaLeft">Status: <span class="sizeBlock">'.$details['Status'].'</span>'.'</div></div>';
                    }
                    if( !empty($details['GramWeight']) ) {  
                      $viewSetting .= '<div class="tabsRow">
                        <div class="metaLeft">Gram Weight: <span class="sizeBlock">'.$details['GramWeight'].'</span>'.'</div></div>';
                    }
                    if( !empty($details['AGTA']) ) {  
                      $viewSetting .= '<div class="tabsRow">
                        <div class="metaLeft">AGTA: <span class="sizeBlock">'.$details['AGTA'].'</span>'.'</div></div>';
                    }
                    if( !empty($details['DescriptiveElementGroup']) ) {  
                      $viewSetting .= '<div class="tabsRow">
                        <div class="metaLeft">Desc. Element Group: <span class="sizeBlock">'.$details['DescriptiveElementGroup'].'</span>'.'</div></div>';
                    }
                for($r=1; $r<=15; $r++) {
                    if( !empty($details['DescriptiveElementName'.$r]) ) {  
                      $viewSetting .= '<div class="tabsRow">
                        <div class="metaLeft">'.$details['DescriptiveElementName'.$r].': <span class="sizeBlock">'.$details['DescriptiveElementValue'.$r].'</span>'.'</div></div>';
                    }
                }
                    if( !empty($details['SearchFilterName1']) ) {  
                      $viewSetting .= '<div class="tabsRow">
                        <div class="metaLeft">'.$details['SearchFilterName1'].': <span class="sizeBlock">'.$details['SearchFilterValue1'].'</span>'.'</div></div>';
                    }
                    if( !empty($details['SearchFilterName2']) ) {  
                      $viewSetting .= '<div class="tabsRow">
                        <div class="metaLeft">'.$details['SearchFilterName2'].': <span class="sizeBlock">'.$details['SearchFilterValue2'].'</span>'.'</div></div>';
                    }
                    if( !empty($details['SearchFilterName3']) ) {  
                      $viewSetting .= '<div class="tabsRow">
                        <div class="metaLeft">'.$details['SearchFilterName3'].': <span class="sizeBlock">'.$details['SearchFilterValue3'].'</span>'.'</div></div>';
                    }
                    if( !empty($details['SearchFilterName4']) ) {  
                      $viewSetting .= '<div class="tabsRow">
                        <div class="metaLeft">'.$details['SearchFilterName4'].': <span class="sizeBlock">'.$details['SearchFilterValue4'].'</span>'.'</div></div>';
                    }
                    if( !empty($details['SearchFilterName5']) ) {  
                      $viewSetting .= '<div class="tabsRow">
                        <div class="metaLeft">'.$details['SearchFilterName5'].': <span class="sizeBlock">'.$details['SearchFilterValue5'].'</span>'.'</div></div>';
                    }
                    if( !empty($details['SearchFilterName6']) ) {  
                      $viewSetting .= '<div class="tabsRow">
                        <div class="metaLeft">'.$details['SearchFilterName6'].': <span class="sizeBlock">'.$details['SearchFilterValue6'].'</span>'.'</div></div>';
                    }
                    if( !empty($details['CountryOfOrgin']) ) {  
                      $viewSetting .= '<div class="tabsRow">
                        <div class="metaLeft">Country of Orignin: <span class="sizeBlock">'.$details['CountryOfOrgin'].'</span>'.'</div></div>';
                    }
                    if( !empty($details['CreationDate']) ) {  
                      $viewSetting .= '<div class="tabsRow">
                        <div class="metaLeft">Creation Date: <span class="sizeBlock">'.$details['CreationDate'].'</span>'.'</div></div>';
                    }
                    if( !empty($details['LeadTime']) ) {  
                      $viewSetting .= '<div class="tabsRow">
                        <div class="metaLeft">Lead Time: <span class="sizeBlock">'.$details['LeadTime'].'</span>'.'</div></div>';
                    }
                    echo $viewSetting;
                      ?>
                      <!--<div class="tabsRow">
                        <div class="metaLeft">Metal Weight:</div>
                      </div>--> 
                    </div>
                    </div>
                    <div class="col-sm-6">
                    	<div class="tabBox tbrow2">
<!--                      <div class="tabsHeading">AVAILABLE IN SIZES:</div>-->
                      <?php //echo $available_insizes; ?> 
                      <!--<div class="tabsRow">
                        <div class="metaLeft"> <?php //echo $min_rsize.' - '.$max_rsize; //echo $details['availblesize']; ?> </div>
                      </div>--> 
<!--                      <div class="tabsHeading">Range of Color and Clarity:</div>
                      <div class="tabsRow">
                        <div class="metaLeft">Clarity: <span class="sizeBlock">VVS1 to SI2</span> </div>
                      </div>
                      <div class="tabsRow">
                        <div class="metaLeft">Color: <span class="sizeBlock">D to L</span> </div>
                      </div>-->
                      <div class="tabsHeading">Interested in a Different Diamond Shape :</div>
                      <div class="tabsRow furtherdesc"> For the exceptional cases where Ring can support other shapes other than as mentioned 
                        on this detail page please <a href="#javascript;" class="js__p_another_start clickLink">click this link</a> and fill out form for your custom specifications 
                        you desire for ring. </div>
                    </div>
                    </div>
                    <div class="clear"></div>
                  </div>
                  <div id="core2" class="hide">
                    <div class="similar_prod"> <?php echo $similarProdList; ?>
                      <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                    <div>
                      <?php //print_r($records); ?>
                    </div>
                  </div>
                  <div id="jquerytuts2" class="hide">
                    <div class="reviewLink"> <img src="<?php echo config_item('base_url') ?>img/page_img/stars_icon.png"  alt="stars_icon"/>&nbsp;&nbsp; <a href="#javascript;" onclick="postComents()" class="commentBtn">Post a Comment</a> </div>
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
                  <div id="classics2" class="hide">
                    <?php echo ringsPoliciesTabs(); ?>
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
              	<input type="hidden" name="details_link" id="details_link" value="<?php echo 'site/engagementRingDetail/'.$details['catid'].'/'.$ring_id;?>">
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
              <input type="hidden" name="details_link" id="details_link" value="<?php echo 'site/engagementRingDetail/'.$details['catid'].'/'.$ring_id;?>">
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
        document.getElementById('form1').action = pageURL;
        document.getElementById('form1').submit();
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
    function ringSize()
    {
    var productid = "<?php echo $details['qg_id']?>";
    var ringsize =  document.getElementById('selectringsize');
    var metaltype =  document.getElementById('slectmetaltype').value;
    url = base_url+'site/uniqeDetailMetalAjax/';
    var posting = $.post( url, { metal: metaltype, product: productid},function(data) {
    ringsize.innerHTML = data;
    } );
    var stullselection = document.getElementById('selectringsize');
    stullselection.onchange = prices;
    var addtocart =  document.getElementById('addtoshopping');
    addtocart.onclick = addcartsubmit;
    
    }
    
    function prices()
    {
    var ezststus = <?php echo $details['Status'] ?>;
    var productid = "<?php echo $details['qg_id']?>";
    var ringsize =  document.getElementById('selectringsize').value;
    var metaltype =  document.getElementById('slectmetaltype').value;
    var allpriceshow =  document.getElementById('allpriceshow');
    url = base_url+'site/uniqeDetailPriceAjax/';
    var posting = $.post( url, { metal: metaltype, ring: ringsize, ez: ezststus, product: productid, },function(data) {
    allpriceshow.innerHTML = data;
    } );
    }
    
    function addWishlist()
    {
    var radios = document.getElementsByName('price');
    var selected;
    for (var i = 0, count = radios.length; i < count; i++) {
    if (radios[i].checked) {
    selected = radios[i].value;
    break;
    }
    }
    if (selected) {
    document.getElementById('form1').action = "<?php echo SITE_URL; ?>jewelleries/wishList";
    document.getElementById('form1').submit();
    }
    else { alert('Please select a payment option.'); }
    }
    
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
</div>

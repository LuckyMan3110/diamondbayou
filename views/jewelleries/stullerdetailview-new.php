<script type="text/javascript">
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
    function addcartsubmit()
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
    document.getElementById('form1').submit();
    }
    else { 
			//alert('Please select a payment option.'); 
			document.getElementById('form1').submit();
		}
    }
    
    /*function ringSize()
    {
    var productid = "<?php echo $details['style_group']?>";
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
    var ezststus = <?php echo $details['ezstatus'] ?>;
    var productid = "<?php echo $details['style_group']?>";
    var ringsize =  document.getElementById('selectringsize').value;
    var metaltype =  document.getElementById('slectmetaltype').value;
    var allpriceshow =  document.getElementById('allpriceshow');
    url = base_url+'site/uniqeDetailPriceAjax/';
    var posting = $.post( url, { metal: metaltype, ring: ringsize, ez: ezststus, product: productid, },function(data) {
    allpriceshow.innerHTML = data;
    } );
    }*/
    
   /* function addWishlist()
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
    document.getElementById('form1').action = "<?php echo config_item('base_url') ?>jewelleries/wishList";
    document.getElementById('form1').submit();
    }
    else { alert('Please select a payment option.'); }
    }
    
    function init()
    {
    var quaselection = document.getElementById('slectmetaltype');
    quaselection.onchange = ringSize;
    }*/
   //	window.onload = init;
    </script>
<div id="main-body-a">
<div class="leftCl">
  <?php
	//echo current_url();
	 	//$getUrl = split('/', current_url());
		//print_r($getUrl);
		echo accordian_left_menu($accord_style);
	?>
</div>
<div class="rightCl">
  <div class="pgSt">
    <div class="bread-crumb brbg">
      <ul>
        <li><a href="<?php echo config_item('base_url') ?>">Home</a></li>
        <li><a href="#"><?php echo breadcrumTitle($accord_style) ?></a></li>
        <li><a href="#"><?php echo $cate_name; ?></a></li>
      </ul>
    </div>
    <br />
  </div>
  <form id="form1" name="form1" method="post" action="<?php echo config_item('base_url') ?>jewelleries/addtoshoppingcart">
  <div class="contentTb">
    <?php
	$na = 'NA';
	$mm = ' mm';
	$row_detail = $details['data'][0];
    $top_width 	   = ( !empty($details['top_width']) ? $details['top_width'].$mm : $na );
    $bottom_width  = ( !empty($details['bottom_width']) ? $details['bottom_width'].$mm : $na );
    $top_height    = ( !empty($details['top_height']) ? $details['top_height'].$mm : $na );
    $bottom_height = ( !empty($details['bottom_height']) ? $details['bottom_height'].$mm : $na );
	$cuprice=$org_price=$row_detail['Price'];
    
    $org_price=$cuprice;
    $cuprice= $cuprice*2.5;
    $cuprice1=$cuprice;
    $cuprice15=$cuprice*15/100;
    $cuprice=$cuprice-$cuprice15;
    
    $ring_size = ( !empty( $details['ring_size'] ) ? $details['ring_size'] : 6 );
	$netRingPrice = number_format($cuprice,2);
	
	$itemTitle = $row_detail['GroupDescription'];
	if($accord_style == 'wedding') {
		$ringDescription = 'Yadegardiamonds.com stunning '.$seting_type.' Style diamond semi mount ring can be yours for $'.$netRingPrice.'. This ring does not include the diamond. Diamonds are sold seperately.';
	} else {
		$ringDescription = 'Yadegardiamonds.com stunning '.$seting_type.' '.$cate_name.' ring can be yours for $'.$netRingPrice.'. This ring does not include the diamond. Diamonds are sold seperately.';
	}
    
    //$prodPrice = $cuprice;
    ?>
    <table class="contb_bk">
      <tr>
        <td><div class="whHead"> <span class="dwar-icon"></span> <?php echo $itemTitle; ?> </div>
          <br />
          <div class="textList">
            <label>Setting Type:&nbsp;&nbsp;</label>
            <span><?php echo $cate_name; ?></span> </div>
          <div class="textList">
            <label>Product ID:&nbsp;&nbsp;</label>
            <span><?php echo $row_detail['DescriptiveElementValue1']; ?></span> </div>
          <div class="textList">
            <label>Price:&nbsp;&nbsp;</label>
            <span>$<?php echo $netRingPrice; ?></span> </div>
          <br />
          <br />
          <div class="readText"><?php echo $ringDescription; //echo $details['bail_info']; ?><a href="#featured2" class="readMore">click for more</a></div>
          <?php
		  if($accord_style == 'wedding') {
			  ?>
          <br />
          <div class="whHead"> <span class="dwar-icon"></span>
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
          </div>
          <div class="clear"></div>
          <div class="textList">
            <div class="left_measure">
              <label>Top Height:</label>
              <span><?php echo $top_height; ?></span> </div>
            <div class="right_measure">
              <label>Bottom Height:</label>
              <span><?php echo $bottom_height; ?></span> </div>
          </div>
          <?php } ?>
          </td>
        <td colspan="2">
        <?php
			if($details['data'][0]['Videos']!=""){
			$json_decoded = json_decode($details['data'][0]['Videos']);
			$imagemy = $json_decoded[0]->{'FullUrl'};
			$prod_image= addslashes(str_replace('$standard$', 'hei=300&wid=300', $imagemy));
			//$src="http://".$details['data'][0]['ImageLink_500'];
			}
			else{
			$prod_image="http://images3.wikia.nocookie.net/__cb20061129213453/muppet/images/7/7c/Noimage.png";				
			}
		?>
        <img src="<?php echo $prod_image; ?>" alt="<?php echo $details['name']; ?>" width="400" /> 
          <!--<img src="<?php echo config_item('base_url') ?>images/scroll_gl.jpg" />--></td>
      </tr>
      <tr>
        <td>
        <?php
			if($accord_style == 'wedding') {
		?>
        <div class="whHead"> <span class="dwar-icon"></span> Engrave Setting: </div>
          <br />
          <div class="engra_text" ng-app="">
            <div class="textList">
              <label>Font:&nbsp;&nbsp;</label>
              <span>
              <select name="" id="font_style" onChange="viewStyle()">
                <option value="'Courier New', Courier, monospace" selected>Corier New</option>
                <option value="Georgia, 'Times New Roman', Times, serif">Georgia</option>
                <option value="Verdana, Geneva, sans-serif">Verdana</option>
                <option value="Arial, Helvetica, sans-serif">Arial</option>
                <option value="'Comic Sans MS', cursive">Comic Sans</option>
              </select>
              </span> </div>
            <div class="textList">
              <label>Engrave Text:&nbsp;&nbsp;</label>
              <span>
              <input type="text" name="txt_engtext" ng-model="name" maxlength="15" />
              </span> </div>
            <div class="textList">
              <label>Cost:&nbsp;&nbsp; <span>$30</span></label>
              <span class="engImgBlock">
              <div ng-bind="name" id="viewFont"></div>
              <img src="<?php echo config_item('base_url') ?>images/engr-text.jpg" /></span> </div>
          </div>
          <?php
			} else {
			?>
            <div class="whHead"> <span class="dwar-icon"></span> Yadegar Select </div><br>
          	<div class="readText">
          	<div class="rowStyle">
            	<div class="leftCol">Weight :</div>
                <div class="rightColmn"><?php echo $details['data'][0]['Weight']; ?></div>
                <div class="clear"></div>
            </div>
            <div class="rowStyle">
            	<div class="leftCol">Merchandizing Category :</div>
                <div class="rightColmn"><?php echo $details['data'][0]['MerchandisingCategory2']; ?></div>
                <div class="clear"></div>
            </div>
            <div class="rowStyle">
            	<div class="leftCol">Sky :</div>
                <div class="rightColmn"><?php echo $details['data'][0]['Sku']; ?></div>
                <div class="clear"></div>
            </div>
            <div class="rowStyle">
            	<div class="leftCol">Lead Time :</div>
                <div class="rightColmn"><?php echo $details['data'][0]['LeadTime']; ?></div>
                <div class="clear"></div>
            </div>
            <div class="rowStyle">
            	<div class="leftCol">Status :</div>
                <div class="rightColmn"><?php echo $details['data'][0]['Status']; ?></div>
                <div class="clear"></div>
            </div>
          </div>
            <?php 
			}
			?>
          </td>
        <td><div class="engra_text social_box">
            <div class="textList">
              <label>Metal Type:&nbsp;&nbsp;</label>
              <span>
              <input name="item_metaltp" class="mtringSize" id="slectmetaltype" type="text" value="<?php echo $row_dt['DescriptiveElementValue2']; ?>" />
              <!--<select name="" class="dropdw_bx">
                <?php
					$metalType = '';
					if(count($uniqueprice) > 0) {
					foreach($uniqueprice as $row_metal) {
					$metalType .= '<option>'.$row_metal['matalType'].'</option>';
					}
					} else {
					$metalType .= '<option>Metal Type</option>';
					}
					echo $metalType;
				?>
              </select>-->
              
              </span> </div>
              <?php if($accord_style == 'wedding') { ?>
            <div class="textList">
              <label>Ring Size:&nbsp;&nbsp;</label>
              <span>
              <input name="item_rsize" class="mtringSize" id="selectringsize" type="text" value="<?php echo $ring_size; ?>" />
             <!-- <select name="cmb_ringsize" id="selectringsize" onchange="calcRingPrice()" class="dropdw_bx">
                    <?php
                        
                        $getRingSize .= '<option>'.$ring_size.'</option>';
                        echo $getRingSize;
                    ?>
                  </select>-->
              </span> </div>
              <?php } ?>
            <div class="textList"> <br />
              <div> <a href="#" onclick="addcartsubmit()" id="addtoshopping"><img src="<?php echo config_item('base_url') ?>images/buy-now.jpg" /></a><br />
                <?php if($accord_style == 'wedding') { ?>
                <br />
                <a href="#"><img src="<?php echo config_item('base_url') ?>images/select-ring.jpg" /></a><br />
                <?php } ?>
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
        <td><div class="linkBlock">
            <div class="textList"> <a href="#" class="js__p_start"><span class="askic"></span>&nbsp;&nbsp;Ask a Friend</a> </div>
            <div class="textList"> <a href="#" class="js__p_another_start"><span class="askxic"></span>&nbsp;&nbsp;Ask an Expert</a> </div>
            <div class="textList"> <a href="#javascript;" onclick="printCurrPage();"><span class="printic"></span>&nbsp;&nbsp;Print This</a> </div>
            <div class="textList"> <a href="<?php echo config_item('base_url') ?>account/membersignin"><span class="addic"></span>&nbsp;&nbsp;Add To wish List</a> 
              <!--<a href="#" onClick="addWishlist()"><span class="addic"></span>&nbsp;&nbsp;Add To wish List</a>--> </div>
          </div>
          
         </td>
      </tr>
      <tr>
        <td colspan="3"><script>
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
		$result_rsize = $this->jewelleriesmodel->getRingSizes($details['style_group']);
		$min_rsize = $result_rsize[0]['minimum_rsize'];
		$max_rsize = $result_rsize[0]['maximum_rsize'];
		?>
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
                <div class="tabsData"><?php echo $ringDescription; ?> <a href="#">diamond inventory</a>.</div>
                <br />
                <?php if($accord_style == 'wedding') { ?>
                <div class="tabsHeading">Yadegar Diamond Signature</div>
                <br />
                <div class="tabsData">Supplied by approved outside vendors who have passed our strict quality control process. Selection is based on design, 
                  quality of materials, and price for the product.</div>
                <br />
                <br />
                <?php } ?>
                <div class="tabBox">
                  <div class="tabsHeading">SETTING INFORMATION:</div>
                  <div class="tabsRow">
                    <div class="metaLeft">Metal:
                    <span class="sizeBlock"> - </span>
                    </div>
                  </div>
                  <!--<div class="tabsRow">
                    <div class="metaLeft">Metal Weight:</div>
                  </div>--> 
                </div>
                <?php if($accord_style == 'wedding') { ?>
                <div class="tabBox tbrow2">
                  <div class="tabsHeading">AVAILABLE IN SIZES:</div>
                  <div class="tabsRow">
                    <div class="metaLeft">Size:
                    	<span class="sizeBlock"> <?php echo $min_rsize.' - '.$max_rsize; //echo $details['availblesize']; ?> </span>
                    </div>
                  </div>
                </div>
                <?php } ?>
                <div class="clear"></div>
              </div>
              <div id="core2" class="hide">
                <div class="similar_prod">
                  <?php
					$ttProd = count($rowdm_prod);
					if($ttProd > 0){
					for($i=0;$i<$ttProd;$i++)
					{
					if($rowdm_prod[$i]['Videos']!=""){
						
					$json_decoded = json_decode($rowdm_prod[$i]['Videos']);
					$imagemy = $json_decoded[0]->{'FullUrl'};
					$src= addslashes(str_replace('$standard$', 'hei=300&wid=300', $imagemy));
					}
					else{
					$src="http://images3.wikia.nocookie.net/__cb20061129213453/muppet/images/7/7c/Noimage.png";				
					}
					$detailPageLink = config_item('base_url').'site/stullerdetail/'.$rowdm_prod[$i]['stuller_id'].'/'.$accord_style.'/'.$subcate_name.'/'.$maincate;
					$cuprice=$org_price=$rowdm_prod[$i]['Price'];
					$cuprice= $cuprice*2.5;
					$cuprice1=$cuprice;
					$cuprice15=$cuprice*15/100;
					$cuprice=$cuprice-$cuprice15;
					
					$dmprod_desc = wordwrap($rowdm_prod[$i]['Description'],30,"<br>\n");
					
    				?>
                  <div class="prodBlock">
                    <div class="imgBlock"><a href="<?php echo $detailPageLink; ?>"><img src="<?php echo $src;?>" alt="<?php echo $records['result'][$i]['name'];?>" width="155" hight="144"></a></div>
                    <div class="prodLable"><?php echo $dmprod_desc; ?><br />
                      <span>From: $<?php echo $cuprice; ?></span> </div>
                  </div>
                  <?php } } ?>
                  <div class="clear"></div>
                </div>
                <div class="clear"></div>
                <div>
                  <?php //print_r($records); ?>
                </div>
              </div>
              <!--<ul id="core2" class="hide">
    <li><a href="http://css-tricks.com/video-screencasts/58-html-css-the-very-basics/">The VERY Basics of HTML &amp; CSS</a></li>
    <li><a href="http://css-tricks.com/the-difference-between-id-and-class/">Classes and IDs</a></li>
    <li><a href="http://css-tricks.com/the-css-box-model/">The CSS Box Model</a></li>
    <li><a href="http://css-tricks.com/all-about-floats/">All About Floats</a></li>
    <li><a href="http://css-tricks.com/the-css-overflow-property/">CSS Overflow Property</a></li>
    <li><a href="http://css-tricks.com/css-font-size/">CSS Font Size - (px - em - % - pt - keyword)</a></li>
    <li><a href="http://css-tricks.com/css-transparency-settings-for-all-broswers/">CSS Transparency / Opacity</a></li>
    <li><a href="http://css-tricks.com/css-sprites/">CSS Sprites</a></li>
    <li><a href="http://css-tricks.com/nine-techniques-for-css-image-replacement/">CSS Image Replacement</a></li>
    <li><a href="http://css-tricks.com/what-is-vertical-align/">CSS Vertial Align</a></li>
    <li><a href="http://css-tricks.com/the-css-overflow-property/">The CSS Overflow Property</a></li>
    </ul>-->
              
              <div id="jquerytuts2" class="hide">
                <div class="reviewLink"> <img src="<?php echo config_item('base_url') ?>img/page_img/stars_icon.png" />&nbsp;&nbsp; <a href="#" class="commentBtn">Post a Comment</a> </div>
                <div id="main">
                  <div class="nano has-scrollbar">
                    <div class="overthrow nano-content description" tabindex="0" style="right: -17px;">
                      <?php
							for($i=1; $i<100; $i++) {
						?>
                      <div class="reviews_block">
                        <div class="reviews_label">
                          <div><img src="<?php echo config_item('base_url') ?>img/page_img/stars_icon.png" /></div>
                          <div class="dateLabel">24 Dec,</div>
                        </div>
                        <br />
                        <div class="reviewHeading">This is comments review about diamond</div>
                        <div class="reviewData">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div>
                      </div>
                      <?php } ?>
                    </div>
                    <div class="nano-pane" style="display: block;">
                      <div class="nano-slider" style="height: 35px; transform: translate(0px, 179.61471656403px);"></div>
                    </div>
                  </div>
                  <img src="" alt="" /> </div>
              </div>
              <div id="classics2" class="hide">
                <div class="accordion">
                  <div class="accordion-section"> <a class="accordion-section-title" href="#accordion-1">Shipping Policy</a>
                    <div id="accordion-1" class="accordion-section-content">
                      <p>Mauris interdum fringilla augue vitae tincidunt. Curabitur vitae tortor id eros euismod ultrices. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent nulla mi, rutrum ut feugiat at, vestibulum ut neque? Cras tincidunt enim vel aliquet facilisis. Duis congue ullamcorper vehicula. Proin nunc lacus, semper sit amet elit sit amet, aliquet pulvinar erat. Nunc pretium quis sapien eu rhoncus. Suspendisse ornare gravida mi, et placerat tellus tempor vitae.</p>
                    </div>
                    <!--end .accordion-section-content--> 
                  </div>
                  <div class="accordion-section"> <a class="accordion-section-title" href="#accordion-2">Upgrade Policy</a>
                    <div id="accordion-2" class="accordion-section-content">
                      <p>Mauris interdum fringilla augue vitae tincidunt. Curabitur vitae tortor id eros euismod ultrices. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent nulla mi, rutrum ut feugiat at, vestibulum ut neque? Cras tincidunt enim vel aliquet facilisis. Duis congue ullamcorper vehicula. Proin nunc lacus, semper sit amet elit sit amet, aliquet pulvinar erat. Nunc pretium quis sapien eu rhoncus. Suspendisse ornare gravida mi, et placerat tellus tempor vitae.</p>
                    </div>
                    <!--end .accordion-section-content--> 
                  </div>
                  <div class="accordion-section"> <a class="accordion-section-title" href="#accordion-3">Inspection Period and Return Policy</a>
                    <div id="accordion-3" class="accordion-section-content">
                      <p>Mauris interdum fringilla augue vitae tincidunt. Curabitur vitae tortor id eros euismod ultrices. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent nulla mi, rutrum ut feugiat at, vestibulum ut neque? Cras tincidunt enim vel aliquet facilisis. Duis congue ullamcorper vehicula. Proin nunc lacus, semper sit amet elit sit amet, aliquet pulvinar erat. Nunc pretium quis sapien eu rhoncus. Suspendisse ornare gravida mi, et placerat tellus tempor vitae.</p>
                    </div>
                    <!--end .accordion-section-content--> 
                  </div>
                  <div class="accordion-section"> <a class="accordion-section-title" href="#accordion-4">Buy Pack Policy</a>
                    <div id="accordion-4" class="accordion-section-content">
                      <p>Mauris interdum fringilla augue vitae tincidunt. Curabitur vitae tortor id eros euismod ultrices. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent nulla mi, rutrum ut feugiat at, vestibulum ut neque? Cras tincidunt enim vel aliquet facilisis. Duis congue ullamcorper vehicula. Proin nunc lacus, semper sit amet elit sit amet, aliquet pulvinar erat. Nunc pretium quis sapien eu rhoncus. Suspendisse ornare gravida mi, et placerat tellus tempor vitae.</p>
                    </div>
                    <!--end .accordion-section-content--> 
                  </div>
                </div>
              </div>
            </div>
            <!-- END List Wrap --> 
            
          </div></td>
      </tr>
    </table>
    <input type="hidden" name="price" value="<?php echo intval(number_format($cuprice,0,'.',''))?>,normal">
    <?php if($details['data'][0]['ezstatus']){ ?>
	    
    <input type="hidden" name="price" value="<?php $ez3 = $org_price+(($org_price*$ez3value)/100);$fez3=$ez3;$ez3=$cuprice1-$ez3; echo intval(number_format($fez3,0,'.',''))?>,3EZ">
    <input type="hidden" name="price" value="<?php $ez5=$org_price+(($ez5value*$org_price)/100);$fez5=$ez5; $ez5=$cuprice1-$ez5; echo intval(number_format($fez5,0,'.','')); ?>,5EZ"> 
    <?php } ?>
    <input type="hidden" name="3ez_price" value="<?php echo intval(number_format($ez3,0,'.','')); ?>">
    <input type="hidden" name="5ez_price" value="<?php echo intval(number_format($ez5,0,'.','')); ?>">
    <input type="hidden" name="main_price" value="<?php echo intval(number_format($cuprice1,0,'.','')); ?>">
    <input type="hidden" name="vender" value="unique">
    <input type="hidden" name="url" value="<?php echo $prod_image ?>">
    <input type="hidden" name="prodname" value="<?php echo $itemTitle?>">
    <input type="hidden" name="prid" value="<?php echo $row_detail['DescriptiveElementValue1'];?>">
    
  </div>
  </form>
</div>
<div class="clear"></div>
<br />
<div class="searchBox" id="sign_up1">
  <h2 id="sup">SIGN ME UP!</h2>
  <div id="" class="enter_col">Enter your e-mail for news and updates, plus special offers that you'll only get in your inbox!</div>
  <div class="enter_label">Enter your Email for News &amp; Updates</div>
  <div class="subs_form">
    <form name="subscription" method="post" action="#">
      <input type="text" name="txt_subsemail" class="subs_field">
      <input type="submit" name="btn_submit" class="subscribe_btn" value="Subscribe Me!">
    </form>
  </div>
  <!--  <h5 id="email">Enter your Email for News &amp; Updates</h5>
    
    
    <form action="#">
    <input type="text" value="Enter your Email" class="inp2" name="Name" />
    <input type="submit" value="" id="submit-2" />
    
    </form><!--form end here--> 
  
</div>
<div class="clear"></div>

 <!-- popup blocks start! -->

<div class="p_body js__p_body js__fadeout"></div>
<div class="popup js__popup js__slide_top"> <a href="#" class="p_close js__p_close" title="Ask a Friend"> <span></span><span></span> </a>
<form name="askFriendForm" method="post" action="">
<div class="p_content">
<div class="popupHeading">Ask a Friend&nbsp;<span class="validateMesage"></span></div>
<div class="formArea">
    <div class="fieldBlock">
    <div class="fLabel">Your Name</div>
    <div class="columnSection">
    <input type="text" name="frien_fname" id="frien_fname" /><br />
    <span>First Name</span>
    </div>
    <div class="columnSection">
    <input type="text" name="frien_lname" id="frien_lname" /><br />
    <span>Last Name</span>
    </div>
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
    <input type="text" name="frien_frfname" id="frien_frfname" /><br />
    <span>First Name</span>
    </div>
    <div class="columnSection">
    <input type="text" name="frien_frlname" id="frien_frlname" /><br />
    <span>Last Name</span>
    </div>
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
    <input type="button" name="btn_fnsubmit" class="btnStyle" onclick="friendForm()" value="Submit" />
    </div>
    
    
</div>
</div>
</form>
</div>
<!-- second popup block -->
<div class="popup js__another_popup js__slide_top"> <a href="#" class="p_close js__p_close" title="As an Expert"> <span></span><span></span> </a>
<form name="askExpertForm" id="askExpertForm" method="post" action="">
    <div class="p_content">
<div class="popupHeading">Ask an Expert&nbsp;<span class="expertVdMessage"></span></div>
<div class="formArea">
    <div class="fieldBlock">
    <div class="fLabel">Name</div>
    <div class="columnSection">
    <input type="text" name="exprt_fname" id="exprt_fname" /><br />
    <span>First Name</span>
    </div>
    <div class="columnSection">
    <input type="text" name="exprt_lname" id="exprt_lname" /><br />
    <span>Last Name</span>
    </div>
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
    <input type="button" name="btn_exsubmit" class="btnStyle" onclick="askExperForm()" value="Submit" />
    </div>
</div>
</div>
</form>
</div>
<!-- popup blocks end! -->
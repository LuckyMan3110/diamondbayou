<script>
function getRingSize(field_id) {
 var mt = document.getElementById(field_id).value;
 window.location = mt;	
}
function ringThumbView(th_url) {
	$('#ringsthumb').html('Loading.....');
	$('#ringsthumb').html('<img src="'+th_url+'" width="400" alt="">')
}
</script>
<?php
        echo rings_page_baner('diamond_stud_heads', 'Dimond Stud Heads');
    ?>
    <div id="" class="jwDetail">
      <div class="dmPendantSection">
                 
        <div class=""> 
          
          <div class="bread-crumb">
          <div class="breakcrum_bk">
                <ul>
                  <li><a href="<?php echo config_item('base_url')?>">Home</a></li>
                 <li><a href="<?php echo config_item('base_url') ?>jewelry/search">Diamond Stud Heads</a></li>
                 <li><a href="<?php echo config_item('base_url') ?>jewelry/build_earings">Create Your Own</a></li>
                  <li><?php echo $findingdetails['name']; ?></li>
                </ul>
            </div>
            <div class="clear"></div>
          </div>
          <?php echo $pendan_stepsbar;?>
          <br />
          <div class="pagesub_label">CREATE YOUR OWN DIAMOND Earrings</div><br>
			<div class="earingBoxRow">
            	<div class="earboxCol earboxActive">1. Choose your setting</div>
                <div class="earboxCol">2. Choose your diamonds</div>
                <div class="earboxCol">3. Complete Your Earring</div>
                <div class="clear"></div>
            </div>
          <br><br>
         
          <div>
		 
          <div class="pendantshape_imgrview col-sm-4">
		  <?php $image_url = RINGS_IMAGE.'crone/imgs/'.$findingdetails['ImagePath'];?>
		  <img src="<?php echo $image_url;?>" width="280"></div>
          <div class="pendant_reviewbk col-sm-7 pull-right">
          <div><?php echo $findingdetails['name'];?> </div>
            <div class="pendant_mainhead">Diamond Stud Earrings<br> 
			<?php 
			
			    $na = 'NA';
	$mm = ' mm';
    
	$top_width 	   = ( !empty($findingdetails['top_width']) ? $findingdetails['top_width'].$mm : $na );
    $bottom_width  = ( !empty($findingdetails['bottom_width']) ? $findingdetails['bottom_width'].$mm : $na );
    $top_height    = ( !empty($findingdetails['top_height']) ? $findingdetails['top_height'].$mm : $na );
    $bottom_height = ( !empty($findingdetails['bottom_height']) ? $findingdetails['bottom_height'].$mm : $na );
	$rint_style	   = $findingdetails['style_group'];
    
   	$org_price = $findingdetails['priceRetail'];
    $cuprice   = $findingdetails['priceRetail'];
    
    $ring_size = ( !empty( $findingdetails['ring_size'] ) ? $findingdetails['ring_size'] : 6 );
	$netRingPrice = number_format($cuprice,2);
	$ringDescription = get_site_title().' stunning Antique Style diamond semi mount Findings ring can be yours for <span id="viewDyPrice">$'.$netRingPrice.'</span>. This ring includes all side stones of a total weight of '.$findingdetails['stone_weight'].' <br>Center Diamond is sold Seperately';
			
			
			$org_price = $findingdetails['priceRetail'];
            $cuprice   = $findingdetails['priceRetail'];
    
    		if($netRingPrice > 0) 
			   {
                    echo '$'.$netRingPrice.'';
                } else 
				{
                    echo 'Call: 415.626.5035';
                }?></div>
            <br>
            <div class="price_style"><?php echo $total_dmprice; ?></div><br><br>
            <div class="order_loosedm">ORDER Now FOR DELIVERY BY <?php echo $next_date; ?></div>
            <div class="free_shipst">FREE SHIPPING</div><div class="clear"></div><br>
            <div><a href="<?php echo $earing_detilink;?>" class="choosedm_style">Choose This Setting</a></div>
            <!--<div class="dropa_hint">
                <span>Want</span>&nbsp;&nbsp;&nbsp;&nbsp;
                <span>Drop a Hint</span>
            </div>-->
            <br>
            <div class="row-fluid">
            	<div class="need_assidcl col-sm-7">
                <div><span>- NEED ASSISTANCE?</span> CLICK TO COLLAPSE</div><br>
                <div>We're here for you. Our specialists are available to assist you in finding the perfect ring.</div>
                </div>
                
                <div class="contact_column col-sm-4">
                	<!--<div class="liveChat">Live Chat</div>-->
                    <div class="contactNo"><?php echo get_site_title('contact_info'); ?></div>
                    <div class="emailUs"><a href="#" class="js__p_another_start">Email Us</a></div>
                </div>
                <div class="clear"></div>
            </div>
            <br><br>
          </div>
          <div class="clear"></div>
          </div>
          <div class="clear"></div><br><br>
          
          <div class="stepstabs_row pendant_subtabs">          	
              <div id="dmdetail" class="steps_box activeBg" onclick="setDiamondTabs('diamondDetail','dmdetail')">
                  <div>Diamond Details</div>
              </div>
              <div id="smdiamond" class="steps_box" onclick="setDiamondTabs('similarDiamod','smdiamond')">
                  <div>Similar Settings</div>
              </div>
              <div id="dmpolicies" class="steps_box" onclick="setDiamondTabs('diamondPolicies','dmpolicies')">
                  <div>Polices</div>
              </div>
              <div class="clear"></div>
          </div>
           <div class="clear"></div>
          <div id="diamondDetail"> 
          <div class="diamond_tbdetail">
        <div class="sutab_col1">
        	<div class="setcols_height">
            <div class="pendant_mainhead">Product Details</div>
            <div><?php echo $ringDescription; ?></div><br>

        </div>
        <div class="clear"></div>
        <br><br>
        </div>
        <div class="sutab_col2">	
            <div class="dmrow_leftcolum">
            	<div><span>Style Number:</span><br><?php echo check_empty($findingdetails['head_style_name']); ?></div><br>
                <div><span>Recycled Metal:</span><br><?php echo check_empty($findingdetails['metal_type']); ?></div><br>
                <div><span>Shape :</span><br><?php echo check_empty($findingdetails['stone_type']); ?></div><br>
                <div><span>Backling:</span><br>NA<?php //echo $diamond1_shape; ?></div><br>
                <div><span>Rhodium Finish:</span><br>NA<?php //echo $row_earing['cut']; ?></div><br>
                <div><span>Setting Type:</span><br>NA<?php //echo $earing_style; ?></div>
                <div><span>Diamond shapes can be set with:</span><br><img src="<?php echo $image_url; ?>" width="29" alt="Round Shape" /></div><br>
            </div>
        </div>
        
        <div class="clear"></div><br><br>
        </div>
        </div>
		

        <div id="similarDiamod" style="display:none">
         <div class="diamond_tbdetail">
       	 	<?php echo $similar_settings; ?>
            </div>
        </div>
		<div id="diamondPolicies" style="display:none">
        	<div class="diamond_tbdetail">
       	 		<?php
				  		echo ringsPoliciesTabs();
				  ?>
            </div>
        </div>
        <div class="bottom_line"></div>
        
        <div class="clear"></div><br><br>
        
        
         </div><br><br>     
           
        <div class="clear"></div>
        
      </div>
    </div>


<!-- New HTML By KS Close-->


<div class="clear"></div>
<br />

<div class="clear"></div>
<div class="clearfix"></div>
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
    function addcartsubmit(pageURL)
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
			document.getElementById('form1').action = pageURL;
			document.getElementById('form1').submit();
		}
    }
    
    function ringSize()
    {
    var productid = "<?php echo $findingdetails['style_group']?>";
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
    var ezststus = <?php echo $findingdetails['ezstatus'] ?>;
    var productid = "<?php echo $findingdetails['style_group']?>";
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
    document.getElementById('form1').action = "<?php echo config_item('base_url') ?>jewelleries/wishList";
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
	
	//////////////////
	$(function() {
            ////// call popup scirpt
            $(".js__p_another_start").simplePopup();
        });
    </script>

<div class="p_body js__p_body js__fadeout"></div>
<div class="popup js__another_popup js__slide_top"> <a href="#" class="p_close js__p_close" title="As an Expert"> <span></span><span></span> </a>
        <form name="askExpertForm" id="askExpertForm" method="post" action="">
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
                <input type="button" name="btn_exsubmit" class="btnStyle" onclick="askExperForm()" value="Submit" />
              </div>
            </div>
          </div>
        </form>
      </div>
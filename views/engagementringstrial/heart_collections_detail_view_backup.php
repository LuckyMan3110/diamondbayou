<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script language="javascript" src="<?php echo SITE_URL; ?>js/jquery.popup.js" type="text/javascript"></script>
<style>
    .similar_collection .sp{width:453px;}
    .collection_detail_hover .addtocart_icon{ width: 100px; padding: 8px 0px 8px 0px;}
    .quick_view{top:10px !important;}
    .collection_listings .set_bk_height{
        width: 32%;
    }
    #similar-settings, #matching-wedding-bands {
        padding: 0 10px;
    }
    .set_ezpay label {
        font-size: 12px;
        font-weight: bold;
        width: 100px;
    }
    .set_ezpay span input[type="radio"] {
        margin: 0px 6px 0px 0px;
    }
    .unique_diamond_table tr td {
        border-right: 1px solid #F4F4F4;
        border-bottom: 1px solid #F4F4F4;
        padding: 5px 4px 5px 3px;
        font-size: 12px;
    }
</style>  
<!--<link href="<?php echo SITE_URL; ?>css/magnific-popup.css" rel="stylesheet">-->
<script>
    var $ = jQuery.noConflict();
    
function getRingSize(field_id) {
 var mt = document.getElementById(field_id).value;
 window.location = mt;	
}
function ringThumbView(th_url) {
    $('#ringsthumb_view .sp').hide();
    $('#ex1').hide();
    $('#show_thumb_view').html('Loading.....');
    $('#show_thumb_view').html('<img src="'+th_url+'" onmouseover="show_magnify_affect(\'show_thumb_view\')" alt="show_thumb_view" />');
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
</script>
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
</script>
<link type="text/css" href="<?php echo SITE_URL; ?>css/zoom_jquery.css" rel="stylesheet" />
<script src="<?php echo SITE_URL; ?>js/jquery.zoom.js"></script>
<script>
        $(document).ready(function(){
                //$('#ex1').zoom();
                $('.sp').zoom();
                $('#show_thumb_view').zoom();
                $('#show_thumb_view .sp img').scroll(zoom);
        });
</script>
<script language="javascript" src="<?php echo SITE_URL; ?>js/common_function.js" type="text/javascript"></script>
<!--<script src="<?php echo SITE_URL; ?>js/jquery-1.11.3.min.js"></script>
<link type="text/css" href="<?php echo SITE_URL; ?>css/jquery.popup.css" rel="stylesheet" />
<script language="javascript" src="<?php echo SITE_URL; ?>js/jquery.popup.js" type="text/javascript"></script>-->
<script>
    var $ = jQuery.noConflict();
    
    function printCurrPage() {
        window.print();
    }
  $(function() {
    ////// call popup scirpt
    $(".js__p_start, .js__p_another_start").simplePopup();
  });
</script>
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
    //echo wordwrap($diamond_desc, 50, "<br>\n");
    
    $get_stock_number = $rowsring['stock_real_number'];
    ?>
    <div>
        <ul class="bread_crumb_list">
            <li><a href="<?php echo SITE_URL; ?>">Home</a></li> > 
            <li><a href="<?php echo SITE_URL; ?>collection/collection-listing/740520120"><?= SITES_NAME ?> collection</a></li>
            <?php 
               /* $newarr = strchr($ringimg, 'no_image_found.jpg');
                if( empty($newarr) ) {
                    echo ' > <li><a href="'.SITE_URL.'goldsourcediamond/goldsource_collection">New Arrivals</a></li>';
                }*/
                echo $bread_crumb_link; 
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
                            <div class="set_thumb_img" id="<?php echo $rowsring['stock_number'];?>">                                
                            <div class="" id="show_thumb_view">
                                
                            </div>
                                  <?php //echo $product_thums;?>
                            <div class="image_section">
                                <?php
                                echo $product_thumbs;
                                ?>
                            </div>
                            </div> 
                            <div class="left_arrow_view"><a href="#javascript" onclick="button_previous('<?php echo $rowsring['stock_number'];?>')"><img src="<?php echo SITE_URL; ?>img/heart_diamond/left_arrow_icon.jpg" alt="left_arrow_icon" /></a></div>
        <div class="right_arrow_view"><a href="#javascript" onclick="button_next('<?php echo $rowsring['stock_number'];?>')"><img src="<?php echo SITE_URL; ?>img/heart_diamond/right_arrow_icon.jpg" alt="right_arrow_icon" /></a></div>
                        </div>
                        <div class="clear"></div><br>
                        <div class="rings_thumbs" style="max-width: 100%;">
                            <?php //cho $small_thumbs; 
                                if( !empty($prod_thumbs['small_thumbs']) ) {
                                   //echo '<div class="smalimgview"><div class="popup-gallery">'.$prod_thumbs['small_thumbs'].'</div></div>';
                                }
                            ?>
                            
                            
            
            <?php
                if( !empty($prod_thumbs['small_thumbs']) ) {
                   echo '<div class="small_thumbs">'.$prod_thumbs['small_thumbs'].'</div>';
                }
            ?>
            
                            <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div><br><br>
                </div>
          <section id="recently-purchased-rings-medium" data-setting-id="50575" data-show-rpr="false">
              <?php echo $recently_purchased; 

              $cate_name = $this->davidsternmodel->get_ebay_cat_name($rowsring['subcategory']);
              ?>
          </section>
      </div>
      
            
        
            <div class="right-half">
        <section class="title-area">
          <div class="product-title medium-and-large-only">
            <h1 class="product-title" itemprop="name"><?php echo $heart_title; ?> <span class="sub-text"> in <?php echo $rowsring['metal']; ?> (<?php echo $get_stock_number; ?>)</span></h1>
          </div>
          <section id="special-attention-message">
              <div class="countdown-message available-to-sell-messaging active-available-to-sell-message" data-skus=""> <strong><i class="free-shipping-icon"><img src="<?php echo SITE_URL; ?>collection_detail/free_shipping_icon.jpg" alt="free_shipping_icon" /></i>FedEx &reg; Shipping</strong><br>
              Delivery time varies by the diamond and setting you select. </div>

          </section>
          <div class="price-and-purchase">
              
              
              
      <?php
            $id = $rowsring['subcategory'];
            if($id == 740520120 OR $id == 740520121 OR $id == 740520122 OR $id == 740520123 OR $id == 740520124 OR $id == 740520125 OR $id == 740520126 OR $id == 740520127 OR $id == 740520128){
            ?>
            <form action="" method="get">
                <div class="col-md-12" id="set_metal_carat">
                    <input type="hidden" name="style" id="engagementRingsFilterStyle" value="<?= $rowsring['subcategory'] ?>">
                    <div class="further_dtcols metalsection ringsize set_ezpay">
                        <span>Select Metal <a href="#"  data-toggle="tooltip" data-placement="top" title="This is tooltip message!"></a> </span>
                        <select name="metal_type" id="engagementRingsFilterMetal" class="form-control" onchange="engagementRingsFilterSubmit()">
                            <option value=""> Select Metal </option>
                            <?php
                                
                                if($resultForMetal){
                                    foreach($resultForMetal as $resultForMData){
                                        $resultForMD = $resultForMData['metal_type'];
                                    ?>
                                        <option value="<?= $resultForMD ?>" <?php if( isset($_GET['metal_type']) AND $_GET['metal_type'] == $resultForMD){ echo 'selected'; } ?> ><?= $resultForMD ?></option>
                                    <?php
                                    }
                                }else{
                                    ?>
                                    <option value="14K Rose Gold" <?php if( isset($_GET['metal_type']) AND $_GET['metal_type'] == '14K Rose Gold'){ echo 'selected'; } ?> >14K Rose Gold</option>
                                    <option value="14K White Gold" <?php if( isset($_GET['metal_type']) AND $_GET['metal_type'] == '14K White Gold'){ echo 'selected'; } ?> >14K White Gold</option>
                                    <option value="14K Yellow Gold" <?php if( isset($_GET['metal_type']) AND $_GET['metal_type'] == '14K Yellow Gold'){ echo 'selected'; } ?> >14K Yellow Gold</option>
                                    <option value="10K White Gold" <?php if( isset($_GET['metal_type']) AND $_GET['metal_type'] == '10K White Gold'){ echo 'selected'; } ?> >10K White Gold</option>
                                    <option value="10K Yellow Gold" <?php if( isset($_GET['metal_type']) AND $_GET['metal_type'] == '10K Yellow Gold'){ echo 'selected'; } ?> >10K Yellow Gold</option>
                                    <option value="18K Rose Gold" <?php if( isset($_GET['metal_type']) AND $_GET['metal_type'] == '18K Rose Gold'){ echo 'selected'; } ?> >18K Rose Gold</option>
                                    <option value="18K White Gold" <?php if( isset($_GET['metal_type']) AND $_GET['metal_type'] == '"18K White Gold'){ echo 'selected'; } ?> >18K White Gold</option>
                                    <option value="18K Yellow Gold" <?php if( isset($_GET['metal_type']) AND $_GET['metal_type'] == '18K Yellow Gold'){ echo 'selected'; } ?> >18K Yellow Gold</option>
                                    <option value="10K Rose Gold" <?php if( isset($_GET['metal_type']) AND $_GET['metal_type'] == '10K Rose Gold'){ echo 'selected'; } ?> >10K Rose Gold</option>
                                    <option value="Platinum" <?php if( isset($_GET['metal_type']) AND $_GET['metal_type'] == 'Platinum'){ echo 'selected'; } ?> >Platinum</option>
                                    <?php
                                }
                            
                            ?>
                        </select> 
                    </div>     
                </div>
                <div class="col-md-12" id="set_material">
                    
                    <div class="further_dtcols metalsection ringsize set_ezpay">
                        <span>Select Quality <a href="#"  data-toggle="tooltip" data-placement="top" title="This is tooltip message!"></a> </span>
                        <select name="quality" id="engagementRingsFilterQuality" class="form-control" onchange="engagementRingsFilterSubmit()">
                            <option value=""> Select Quality </option>
                            <option value="SI1-SI2, G-H" <?php if( isset($_GET['quality']) AND $_GET['quality'] == 'SI1-SI2, G-H'){ echo 'selected'; } ?> >SI1-SI2, G-H</option>
                            <option value="SI2, H-I" <?php if( isset($_GET['quality']) AND $_GET['quality'] == 'SI2, H-I'){ echo 'selected'; } ?> >SI2, H-I</option>
                            <option value="I1, H-I" <?php if( isset($_GET['quality']) AND $_GET['quality'] == 'I1, H-I'){ echo 'selected'; } ?> >I1, H-I</option>
                            <option value="I2, H-I" <?php if( isset($_GET['quality']) AND $_GET['quality'] == 'I2, H-I'){ echo 'selected'; } ?> >I2, H-I</option>
                            <option value="Black" <?php if( isset($_GET['quality']) AND $_GET['quality'] == 'Black'){ echo 'selected'; } ?> >Black</option>
                            <option value="Champagne" <?php if( isset($_GET['quality']) AND $_GET['quality'] == 'Champagne'){ echo 'selected'; } ?> >Champagne</option>
                            <option value="VS1-VS2, F-G" <?php if( isset($_GET['quality']) AND $_GET['quality'] == 'VS1-VS2, F-G'){ echo 'selected'; } ?> >VS1-VS2, F-G</option>
                            <option value="SI1, G" <?php if( isset($_GET['quality']) AND $_GET['quality'] == 'SI1, G'){ echo 'selected'; } ?> >SI1, G</option>
                        </select>  
                    </div>      
                </div>
                
                <div class="col-md-12" id="set_material">
                    
                    <div class="further_dtcols metalsection ringsize set_ezpay">
                        <span>Select Carat <a href="#"  data-toggle="tooltip" data-placement="top" title="This is tooltip message!"></a> </span>
                        <select name="carat_item" id="engagementRingsFilterCarat" class="form-control" onchange="engagementRingsFilterSubmit()">
                            <option value="">Select Available Carat</option>
                            <option value="0.23 ct" <?php if( isset($_GET['carat_item']) AND $_GET['carat_item'] == '0.23 ct'){ echo 'selected'; } ?> >0.23 ct</option>
                            <option value="0.25 ct" <?php if( isset($_GET['carat_item']) AND $_GET['carat_item'] == '0.25 ct'){ echo 'selected'; } ?> >0.25 ct</option>
                            <option value="0.33 ct" <?php if( isset($_GET['carat_item']) AND $_GET['carat_item'] == '0.33 ct'){ echo 'selected'; } ?> >0.33 ct</option>
                            <option value="0.40 ct" <?php if( isset($_GET['carat_item']) AND $_GET['carat_item'] == '0.40 ct'){ echo 'selected'; } ?> >0.40 ct</option>
                            <option value="0.47 ct" <?php if( isset($_GET['carat_item']) AND $_GET['carat_item'] == '0.47 ct'){ echo 'selected'; } ?> >0.47 ct</option>
                            <option value="0.50 ct" <?php if( isset($_GET['carat_item']) AND $_GET['carat_item'] == '0.50 ct'){ echo 'selected'; } ?> >0.50 ct</option>
                            <option value="0.75 ct" <?php if( isset($_GET['carat_item']) AND $_GET['carat_item'] == '0.75 ct'){ echo 'selected'; } ?> >0.75 ct</option>
                            <option value="0.80 ct" <?php if( isset($_GET['carat_item']) AND $_GET['carat_item'] == '0.80 ct'){ echo 'selected'; } ?> >0.80 ct</option>
                            <option value="0.90 ct" <?php if( isset($_GET['carat_item']) AND $_GET['carat_item'] == '0.90 ct'){ echo 'selected'; } ?> >0.90 ct</option>
                            <option value="0.95 ct" <?php if( isset($_GET['carat_item']) AND $_GET['carat_item'] == '0.95 ct'){ echo 'selected'; } ?> >0.95 ct</option>
                            <option value="1.00 ct" <?php if( isset($_GET['carat_item']) AND $_GET['carat_item'] == '1.00 ct'){ echo 'selected'; } ?> >1.00 ct</option>
                            <option value="1.25 ct" <?php if( isset($_GET['carat_item']) AND $_GET['carat_item'] == '1.25 ct'){ echo 'selected'; } ?> >1.25 ct</option>
                            <option value="1.50 ct" <?php if( isset($_GET['carat_item']) AND $_GET['carat_item'] == '1.50 ct'){ echo 'selected'; } ?> >1.50 ct</option>
                            <option value="1.90 ct" <?php if( isset($_GET['carat_item']) AND $_GET['carat_item'] == '1.90 ct'){ echo 'selected'; } ?> >1.90 ct</option>
                            <option value="3.00 ct" <?php if( isset($_GET['carat_item']) AND $_GET['carat_item'] == '3.00 ct'){ echo 'selected'; } ?> >3.00 ct</option>
                        </select> 
                    </div>      
                </div>
                
                <div class="col-md-12" id="set_material">
                    
                    <div class="further_dtcols metalsection ringsize set_ezpay">
                        <span>Select Ring Size <a href="#"  data-toggle="tooltip" data-placement="top" title="This is tooltip message!"></a> </span>
                        <select name="ring_size" id="engagementRingsSize" class="form-control" onchange="engagementRingsFilterSubmit()">
                            <option value="">Ring Available Size</option>
                             <?php
                    
                                $where_dev_ebaycategories_cat    = array('subcategory' => $rowsring['subcategory']);
                                $dev_ebaycategories_data         = $this->catemodel->getdata_any_table_where($where_dev_ebaycategories_cat, 'dev_jewelries');
                                $check_unique_cat                = array();
                                if($dev_ebaycategories_data){
                                    foreach($dev_ebaycategories_data as $subcategory_data){
                                       
                                       $ring_size = $subcategory_data->ring_size;
                                       
                                       if( in_array($ring_size, $check_unique_cat) ){
                                           //
                                       }else{
                                           ?>
                                           <option value="<?= $ring_size ?>" <?php if( isset($_GET['ring_size']) AND $_GET['ring_size'] == $ring_size){ echo 'selected'; } ?> ><?= $ring_size ?></option>
                                           <?php
                                       }
                                       $check_unique_cat[] = $ring_size;
                                       
                                    }
                                }else{
                                    ?>
                                   <option value="">No Available Ring Size</option>
                                   <?php
                                }    
                                
                            ?>
                        </select> 
                    </div>      
                </div>
                
                <div class="clear"></div><br><br>
                <input type="submit" style="display:none;" name="engagement_rings_filter_submit" id="engagement_rings_filter_submit">
            </form>
            
            <script>
            	function engagementRingsFilterSubmit(){
            		$("#engagement_rings_filter_submit").click();
            	}
            </script>
            
            <?php } ?>
            
        <form name="collection_form" id="collection_form" method="post" action="">
                
            <script>
                function selectEzPay(){
                    
                    var ez_payments     = $("#ez_payments").val();
                    var get_real_price  = $("#get_real_price").val();
                    
                    if(ez_payments == 3){
                        var show_real_price = addCommas(get_real_price/ez_payments);
                        $("#show_real_price_msg").html('Pay $'+show_real_price+' today and $'+show_real_price+' for the next 2 months than we will shipped product');
                    }else if(ez_payments == 5){
                        var show_real_price = addCommas(get_real_price/ez_payments);
                        $("#show_real_price_msg").html('Pay $'+show_real_price+' today and $'+show_real_price+' for the next 4 months than we will shipped product');
                    }else{
                        var show_real_price = addCommas(get_real_price);
                        $("#show_real_price_msg").html('<?php echo $cate_name; ?> Price');
                    }
                    $("#show_real_price").html('$'+show_real_price);
                    
                }
                
                function addCommas(nStr){
                	nStr += '';
                	x = nStr.split('.');
                	x1 = x[0];
                	x2 = x.length > 1 ? '.' + x[1] : '';
                	var rgx = /(\d+)(\d{3})/;
                	while (rgx.test(x1)) {
                		x1 = x1.replace(rgx, '$1' + ',' + '$2');
                	}
                	return x1 + x2;
                }
            </script>  
        
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            
            <?php if( $rowsring['category'] == '740520120'){ ?>
           <!--<div class="further_dtcols metalsection ringsize">
                <span>Available in sizes</span>
                <span>
                    <select name="metal_type" id="metal_type" onchange="setListingPage(this.value)">
                           <?php echo $finger_ring_size; ?>
                       </select>
                </span>
            </div>-->
            <?php } 
            
            
            
            ?>
            
           <div class="further_dtcols metalsection ringsize set_ezpay">
                <span>Ez Pay <a href="#"  data-toggle="tooltip" data-placement="top" title="This is tooltip message!"><i class="fa fa-info-circle"></i></a> </span>
                <select name="ez_payments" id="ez_payments" class="form-control" onChange="selectEzPay()">
                    <option value="0">Full Price - $<?php echo _nf($sales_price, 2) ; ?></option>
                    <option value="<?php echo $first_ez_value; ?>"> <?php echo $first_ez_value; ?>ez - $<?php echo _nf($sales_price/$first_ez_value, 2) ; ?> </option>
                    <option value="<?php echo $second_ez_value; ?>"> <?php echo $second_ez_value; ?>ez - $<?php echo _nf($sales_price/$second_ez_value, 2) ; ?> </option>
                </select>   
            </div>
            
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
            
            <div class="price-with-button force-wrap" data-smart-wrap="true">
              <div class="price-display">
                <div class="regular-price">
                  <span class="price" id="show_real_price" itemprop="price" content="2990.00">$<?php echo _nf($sales_price, 2) ; ?></span>
                </div>
                <span class="price-message" style="text-transform: uppercase;">( <span id="show_real_price_msg" style="color:#F52237;"><?php echo $cate_name; ?> Price </span> )</span> </div>
                
            </div>
            
            
            <?php
            //echo '<pre>'; print_r($rowsring); echo '</pre>';
            $where_dev_ebaycategories_cat    = array('category_id' => $rowsring['subcategory']);
            $dev_ebaycategories_data         = $this->catemodel->getdata_any_table_where($where_dev_ebaycategories_cat, 'dev_ebaycategories');
            
            $where_dev_ebaycategories_cat2    = array('category_id' => $rowsring['category']);
            $dev_ebaycategories_data2         = $this->catemodel->getdata_any_table_where($where_dev_ebaycategories_cat2, 'dev_ebaycategories');
            ?>
            
            
            <div class="action-buttons clearfix">

              <input type="hidden" name="txt_rstyle" id="txt_rstyle" value="<?php echo $setingtype; ?>">
              <input type="hidden" name="3ez_price" value="<?php echo intval(number_format($sales_price/3,0,'.','')); ?>">
              <input type="hidden" name="5ez_price" value="<?php echo intval(number_format($sales_price/5,0,'.','')); ?>">
              <input type="hidden" name="main_price" id='main_price' value="<?php echo $sales_price; ?>" />
              <input type="hidden" name="price" id="get_real_price" value="<?php echo $sales_price; ?>" />
              <input type="hidden" name="vender" value="goldsource_diamond_collection">
              <input type="hidden" name="url" value="<?php echo $ringimg; ?>">
              <input type="hidden" name="prodname" value="<?php echo $rowsring['item_title']?>">
              <input type="hidden" name="diamnd_count" value="<?php echo $rowsring['supplied_stones'];?>">
              <input type="hidden" name="ring_shape" value="<?php echo $suport_shape;?>">
              <input type="hidden" name="ring_carat" value="<?php echo $rowsring['metal_weight']; ?>">
              <input type="hidden" name="prid" id="prid" value="<?php echo $rowsring['stock_number']; ?>">
              <input type="hidden" name="stock_number" id="stock_number" value="<?php echo $get_stock_number; ?>">
              <input type="hidden" name="txt_ringtype" value="<?php echo $rowsring['category_type']; ?>">
              <input type="hidden" name="txt_ringsize" value="<?php if(isset($_GET['ring_size'])){ echo $_GET['ring_size']; }else{ echo  $set_ring_size; };?>" />
              <input type="hidden" name="txt_metal" value="<?php echo $rowsring['metal_type']; ?>" />
              <input type="hidden" name="metals_weight" value="<?php echo $rowsring['width']; ?>" />
              
              <input type="hidden" name="vendors_name" value="<?php echo $rowsring['vendor_name']; ?>" />
              <input type="hidden" name="vendor_number" value="<?php echo $rowsring['vendor_sku']; ?>" />
              <input type="hidden" name="table_name" value="dev_jewelries" />
              <input type="hidden" name="item_title" value="<?php echo $rowsring['item_title']?>" />
              <input type="hidden" name="item_url" value="<?php echo $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" />
              <input type="hidden" name="product_type" value="<?php echo $dev_ebaycategories_data2['0']->category_name; ?>" />
              
              <input type="hidden" name="center_stone_id" id="center_stone_id" />
              <input type="hidden" name="txt_qty" value="1" />

              <div class="clear"></div><br>
              
              <div class="button-display">
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
                        
                        //echo '<pre>'; print_r($rowsring); echo '</pre>';
                        
                    ?> 
                </div>
              </div>
            </div>
          </div>
          
               
            <?php
                $id = $rowsring['subcategory'];
                //echo '<pre>'; print_r($rowsring); echo '</pre>';
                if($id == 740520120 OR $id == 740520121 OR $id == 740520122 OR $id == 740520123 OR $id == 740520124 OR $id == 740520125 OR $id == 740520126 OR $id == 740520127 OR $id == 740520128){
            ?>
                <br>
                <a href="#javascript" style="font-size: 16px;" onclick="setHDIndexDiamondList('<?php echo $rowsring['subcategory']; ?>', '<?php echo $rowsring['metal_type']; ?>', '<?php echo $rowsring['quality']; ?>', '<?php echo $rowsring['center_stone_sizes']; ?>')">(Need More Center Diamond Options? Click Diamond Finder &trade;)</a>  
            
            <script>
                function setHDIndexDiamondList(subcategory, metal_type, quality, center_stone_sizes) {
        
                    var urlink = base_url + 'collection/getIndexDiamondList360Rign/'+subcategory + '/' +metal_type + '/' + quality+ '/' + center_stone_sizes;
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
            
            <div class="clear"></div><br>
            <div id="center_stone_list"></div>
            <br>
            
            <?php } ?>
            
            
          <div class="review-and-social">
            <div class="product-rating-stars " data-action="scroll-to-review">
              <div class="offer-rating">
             
                <!-- <div><img src="<?php echo SITE_URL; ?>collection_detail/customer_rating_stars.jpg" alt="<?php echo SITES_NAME; ?> Studio" /></div> -->

                <div class="rating-values"> <span>4.8</span> (<span><a href="#" data-target="customer-review">9</a></span>) </div>
              </div>
             <!--  <div class="review-count" data-review-count="9">(9 customer rating<span class="plural">s</span>)</div> -->
            </div>
            <div class="social-icons">
              <div class="group-of-icons"> 
                  <a href="#"><img src="<?php echo SITE_URL; ?>collection_detail/social_icon_set_1.jpg" alt="Studio" /></a>
                  <a href="#"><img src="<?php echo SITE_URL; ?>collection_detail/social_icon_set_2.jpg" alt="Studio" /></a>
                  <a href="#"><img src="<?php echo SITE_URL; ?>collection_detail/social_icon_set_3.jpg" alt="Studio" /></a>
                  <a href="#"><img src="<?php echo SITE_URL; ?>collection_detail/social_icon_set_4.jpg" alt="Studio" /></a>
                  <a href="#"><img src="<?php echo SITE_URL; ?>collection_detail/social_icon_set_5.jpg" alt="Studio" /></a>
                  <a href="#"><img src="<?php echo SITE_URL; ?>collection_detail/social_icon_set_6.jpg" alt="Studio" /></a>
<!--                <button class="icon-print"></button>
                <span class="icon-envelope"></span>-->
                <button class="icon-share" data-hasqtip="1"></button>
              </div>
            </div>
          </div>
        </section>
        <section id="product-description" itemprop="description"> <?php echo $rowsring['description'].' '.$rowsring['description2']; ?> </section>
        <section id="setting-information-table">
          <div class="detail-table">
              
              
            <div class="row detail even first">
              <div data-unique-id="stock-number-column-0" class="column-0 "> <span> Stock Number </span> </div>
              <div data-unique-id="stock-number-column-1" class="column-1 "> <span> <?php echo $get_stock_number; ?> </span> </div>
            </div>
            
            <?php if($dev_ebaycategories_data2['0']->category_name != ''){ ?>
            <div class="row detail">
              <div data-unique-id="stock-number-column-0" class="column-0 "> <span> Category Type </span> </div>
              <div data-unique-id="stock-number-column-1" class="column-1 "> <span> <?php echo $dev_ebaycategories_data2['0']->category_name; ?> </span> </div>
            </div>
            <?php } ?>
            
             <?php if($dev_ebaycategories_data['0']->category_name != ''){ ?>
            <div class="row detail">
              <div data-unique-id="stock-number-column-0" class="column-0 "> <span> Category Sub Type</span> </div>
              <div data-unique-id="stock-number-column-1" class="column-1 "> <span> <?php echo $dev_ebaycategories_data['0']->category_name; ?> </span> </div>
            </div>
            <?php } ?>
            
            <?php if($rowsring['width'] != ''){ ?>
            <div class="row detail">
              <div data-unique-id="stock-number-column-0" class="column-0 "> <span> Width </span> </div>
              <div data-unique-id="stock-number-column-1" class="column-1 "> <span> <?php echo $rowsring['width']; ?> </span> </div>
            </div>
            <?php } ?>
            
            <?php if($rowsring['item_title'] != ''){ ?>
            <div class="row detail">
              <div data-unique-id="stock-number-column-0" class="column-0 "> <span> Style </span> </div>
              <div data-unique-id="stock-number-column-1" class="column-1 "> <span> <?php echo $rowsring['item_title']; ?> </span> </div>
            </div>
            <?php } ?>
            
            <?php if($rowsring['avail_size'] != ''){ ?>
            <div class="row detail" style='display:none;'>
              <div data-unique-id="stock-number-column-0" class="column-0 "> <span> Available Size </span> </div>
              <div data-unique-id="stock-number-column-1" class="column-1 "> <span> <?php echo $rowsring['avail_size']; ?> </span> </div>
            </div>
            <?php } ?>
            
            <?php if($rowsring['ring_style_bk'] != ''){ ?>
            <div class="row detail">
              <div data-unique-id="stock-number-column-0" class="column-0 "> <span> Style Group </span> </div>
              <div data-unique-id="stock-number-column-1" class="column-1 "> <span> <?php echo $rowsring['ring_style_bk']; ?> </span> </div>
            </div>
            <?php } ?>
            
            <?php if($rowsring['quality'] != ''){ ?>
            <div class="row detail">
              <div data-unique-id="stock-number-column-0" class="column-0 "> <span> Quality </span> </div>
              <div data-unique-id="stock-number-column-1" class="column-1 "> <span> <?php echo $rowsring['quality']; ?> </span> </div>
            </div>
            <?php } ?>
            
            <?php if($rowsring['weight'] != ''){ ?>
            <div class="row detail">
              <div data-unique-id="stock-number-column-0" class="column-0 "> <span> Weight </span> </div>
              <div data-unique-id="stock-number-column-1" class="column-1 "> <span> <?php echo $rowsring['weight']; ?> </span> </div>
            </div>
            <?php } ?>
            
            <?php if($rowsring['metal_type'] != ''){ ?>
            <div class="row detail">
              <div data-unique-id="stock-number-column-0" class="column-0 "> <span> Metal Type </span> </div>
              <div data-unique-id="stock-number-column-1" class="column-1 "> <span> <?php echo $rowsring['metal_type']; ?> </span> </div>
            </div>
            <?php } ?>
            
            
            <?php if($rowsring['diamond_size'] != ''){ ?>
            <div class="row detail">
              <div data-unique-id="stock-number-column-0" class="column-0 "> <span> Diamond Size </span> </div>
              <div data-unique-id="stock-number-column-1" class="column-1 "> <span> <?php echo $rowsring['diamond_size']; ?> </span> </div>
            </div>
            <?php } ?>
            
            <?php if($rowsring['total_carats'] != ''){ ?>
            <div class="row detail">
              <div data-unique-id="stock-number-column-0" class="column-0 "> <span> Total Diamonds </span> </div>
              <div data-unique-id="stock-number-column-1" class="column-1 "> <span> <?php echo $rowsring['total_carats']; ?> </span> </div>
            </div>
            <?php } ?>
            
              <?php 
            /* $item_info_list = array(
                                array('cate' => 3292598018, 'label'=>'Metal', 'col_value' => $rowsring['metal']),
                                array('cate' => 3292598018, 'label'=>'Metal Color', 'col_value' => $rowsring['metal_color']),
                                array('cate' => 3292598018, 'label'=>'Ring Style', 'col_value' => $rowsring['ring_style']),
                                array('cate' => 3292598018, 'label'=>'Karat', 'col_value' => $rowsring['carat']),
                                array('cate' => 3292598018, 'label'=>'Description', 'col_value' => $rowsring['description']),
                                array('cate' => 3292598018, 'label'=>'Ring Type', 'col_value' => $rowsring['ringtype']),
                                array('cate' => 3292598018, 'label'=>'Design', 'col_value' => $rowsring['design']),
                                array('cate' => 3292598018, 'label'=>'Made In', 'col_value' => $rowsring['made_in']),
                                array('cate' => 3292598018, 'label'=>'Ring Model', 'col_value' => $rowsring['ring_model']),
                                array('cate' => 3292598018, 'label'=>'Vend Style No.', 'col_value' => $rowsring['vend_style_no']),
                                array('cate' => 3292598018, 'label'=>'Clarity', 'col_value' => 'VVS1 to SI2'),
                                array('cate' => 3292598018, 'label'=>'Color', 'col_value' => 'D to L'),
                                array('cate' => '', 'label'=>'Metal', 'col_value' => $rowsring['metal']),
                                array('cate' => 3292603018, 'label'=>'Clasp', 'col_value' => $rowsring['chain_clasp']),
                                array('cate' => 3292603018, 'label'=>'Chain Length', 'col_value' => $rowsring['chain_length']),
                                array('cate' => 3292603018, 'label'=>'Chain Type', 'col_value' => $rowsring['chain_type']),
                                array('cate' => 3292603018, 'label'=>'Width', 'col_value' => $rowsring['width']),
                                array('cate' => 3292603018, 'label'=>'Length', 'col_value' => $rowsring['length']),
                                array('cate' => 3292603018, 'label'=>'Rhodium Plated', 'col_value' => 'Yes'),
                                array('cate' => 3292601018, 'label'=>'Diameter', 'col_value' => $rowsring['hoop_diameter']),
                                array('cate' => 3292601018, 'label'=>'Backing', 'col_value' => $rowsring['back_type']),
                                array('cate' => 3292601018, 'label'=>'Approximate Weight', 'col_value' => $rowsring['weight']),
                                array('cate' => 3292601018, 'label'=>'Rhodium Plated', 'col_value' => 'Yes'),
                                array('cate' => 740520034, 'label'=>'Height', 'col_value' => $rowsring['ring_height']),
                                array('cate' => 740520034, 'label'=>'Width', 'col_value' => $rowsring['band_width'])
                            );
                            
                    $jew_item_info = '';
                    $r = 1;
                    foreach( $item_info_list as $itemrow ) {
                        if( $rowsring['category'] == $itemrow['cate'] || empty($itemrow['cate']) ) {
                            $even_class = ($r%2 == 0 ? ' even' : '' );
                            
                            $jew_item_info .= '<div class="row detail'.$even_class.'">
                                  <div data-unique-id="width-column-0" class="column-0 tooltipcolumn"> <span> '.$itemrow['label'].' </span></div>
                                  <div data-unique-id="width-column-1" class="column-1 "> <span> '.check_empty($itemrow['col_value'], 'NA').' </span> </div>
                                </div>';
                        
                            $r++;
                        }
                    }
                            
                    echo $jew_item_info;
                    
                    if( $rowsring['category'] == 3292598018 ) {*/
              ?>
     <!--         <div class="row detail even">
                <div data-unique-id="available-in-sizes-column-0" class="column-0 "> <span> Available in sizes </span> </div>
                <div data-unique-id="available-in-sizes-column-1" class="column-1 "> 
                    <span> <select name="rings_size" id="rings_size" onchange="setListingPage(this.value)"><?php echo $finger_ring_size; ?></select> </span> 
                </div>
              </div>-->
                    <?php /*} */ ?>
                    
                    
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
      <section id="similar-settings">
          <div class="rings_block collection_listings">
                <?php //echo $more_collection_listings['similar_listing'] . $more_collection_listings['popup_link'];  ?>
                
                <?php echo $more_collection_listings_new['listings'].$more_collection_listings_new['popup_block']; ?>
                
                <div class="clear"></div>
            </div>
      </section>

      <div class="separator"><span class="text">About the designer</span></div>
      <section id="branding-section" class="horizontal-group">
        <div class="information-cell">
          <div> <img src="<?php echo SITE_URL; ?>uploads/111_sitelg_6b95b216-059b-43de-9e23-f3f38cf5d086.jpg" alt="<?php echo SITES_NAME; ?> Store" title="<?php echo SITES_NAME; ?> Store"> </div>
          <div>
            <h2><span class="collapsible">About The Designer: </span><span class="collapsible"><?php echo SITES_NAME; ?> Store</span></h2>
            <p><span><?php echo SITES_NAME; ?> Store is an exceptional collection of crafted by industry-leading designers and inspired by their years of experience and personal reflection. </span><span class="collapsible">Defined by <?php echo SITES_NAME; ?>'s classic style, with the highest regard to quality, this is everyday elegance at its finest. </span></p>
          </div>
        </div>
      </section>

      <div class="about-your-ring separator"> <span class="text">About Your <?php echo SITES_NAME; ?> <?php echo $rowsring['category_type']; ?></span> </div>
      <section class="horizontal-group preset-stone-information first"><img src="<?php echo $ringimg; ?>" width="35%" class="background" style="right: 0px;">
        <div class="wrapper">
          <div class="content">
            <h2>Product Information</h2>
            <div class="characteristics">
              <div class="characteristic-row">

                <?php if($get_stock_number != ''){ ?>
                <div class="characteristic">
                  <div class="label">Stock Number</div>
                  <div class="value"><?php echo $get_stock_number; ?></div>
                </div>
                <?php } ?>

                <?php if($dev_ebaycategories_data2['0']->category_name != ''){ ?>
                <div class="characteristic">
                  <div class="label">Category Type</div>
                  <div class="value"><?php echo $dev_ebaycategories_data2['0']->category_name; ?></div>
                </div>
                <?php } ?>

              </div>
              <div class="characteristic-row">

                <?php if($dev_ebaycategories_data['0']->category_name != ''){ ?>
                <div class="characteristic">
                  <div class="label">Category Sub Type</div>
                  <div class="value"><?php echo $dev_ebaycategories_data['0']->category_name; ?></div>
                </div>
                <?php } ?>

                <?php if($rowsring['item_title'] != ''){ ?>
                <div class="characteristic">
                  <div class="label">Style</div>
                  <div class="value"><?php echo $rowsring['item_title']; ?></div>
                </div>
                <?php } ?>

              </div>
            </div>
          </div>
        </div>
      </section>


      <div class="separator"></div>

<style type="text/css">
.preset-stone-information.horizontal-group .wrapper {
    height: 340px;
    margin: 0;
    width: 600px;
}
</style>

      <div class="supported-shapes separator"></div>
      
    </div>
    <div id="details-fixed-header" class="fixed-header">
      <div class="product-title">
        <h1 class="product-title"><?php echo SITES_NAME; ?> Studio Heiress Halo Diamond Engagement Ring<span class="sub-text"> in Platinum (2/5 ct. tw.)</span></h1>
      </div>
      <div class="right-half">
        <div class="price-display">
          <div class="regular-price"> <span class="price">$<?php echo _nf($sales_price, 2) ; ?></span> </div>
          <span class="price-message">(setting price)</span> </div>
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
    <input type="hidden" name="liting_class" id="liting_class" value="" />
<script>
function centerStoneDiamondList(ringid, c_id, diamond_count) {
    var opt = $('#finished_level').val();
    $('#center_diamond_list').html('<div class="wait_data">LOADING PLEASE WAIT.....</div>');
    $('#diamond_detail_bk').show();
    $('.selection_tabs_bk').show();
    
    //if( opt === 'complete_stone' ) {
        $.ajax({
            type: "POST",
            url: base_url + 'heartdiamond/view_center_stone/' + ringid + '/' +diamond_count,
            success: function(response) {
                     $('#center_diamond_list').html(response);
           },
                     error: function(){alert('Error ');}
        });
        
        show_diamond_result_detail();
        get_left_diamond_detail(ringid, 'ring');
        
//    } else {
//        $('#center_diamond_list').html('');
//    }
}
function show_diamond_result_detail() {
    $.ajax({
            type: "POST",
            url: base_url + 'heartdiamond/view_diamond_result/',
            success: function(response) {
                     $('#diamond_detail_bk').html(response);
           },
                     error: function(){alert('Error ');}
        });
}

function get_left_diamond_detail(ringid, type) {
    $.ajax({
            type: "POST",
            url: base_url + 'heartdiamond/get_diamond_result_detail/'+encodeURI(ringid)+'/'+type,
            success: function(response) {
                     $('#center_stone_detail').html(response);
           },
                     error: function(){alert('Error ');}
        });
}
</script>
<script src="<?php echo SITE_URL; ?>js/jquery.simplePopup.js" type="text/javascript"></script>
<script type="text/javascript">
    function view_simple_popup(block_vid) {
        jQuery('#pop_' + block_vid).simplePopupBlock();
    }
if (typeof jQuery == 'undefined')
{
    alert("Jquery library is not loaded. Please goto System > Configuration > Catalog > I-Quickshop and enable it.");
}
else
{
    jQuery(document).ready(function() {
        var tb_pathToImage = "<?php echo DEMO_RETAIL_IMG; ?>ajax-loader.gif";
        //tb_init('a.thickbox, area.thickbox, input.thickbox');//pass where to apply thickbox
        imgLoader = new Image();// preload image
        imgLoader.src = tb_pathToImage;
    });
	
	//close thick box on ESC key
	jQuery(this).keydown(function(e){
        if (e == null) { // ie
                keycode = event.keyCode;
        } else { // mozilla
                keycode = e.which;
        }
        if(keycode == 27){ // close
                top.tb_remove();
        }
	});
}

// Added by Amit JS on 06-NOV-2013 to notify empty page
//Modified by sujit on 24-02-14 to send email for partial search
jQuery(document).ready(function () {
	var partial = '';
	var par = jQuery.trim(partial);
	var page = getParameterByName('p');
	
	if(jQuery.trim(jQuery('.note-msg').text()) == 'There are no products matching the selection.') {
		jQuery.post(BASE_URL+'/feeds/sendnotification.php',{purl:'<?php echo SITE_URL; ?>',fpc_id:'371'},function(res) {
			if(res=='success') {
				window.location.reload(true);
			}
		});
	}
	else if(par!='' && page=='') {
		//alert(page);
		jQuery.post(BASE_URL+'/feeds/sendnotification.php',{ptext:'',partialtext:par,surl:'<?php echo SITE_URL; ?>',fpc_id:''},function(res) {
			if(res=='success') {
				window.location.reload(true);
			}
		});
	}
	else {
		viewMoreLess();
		reviewSlider();
	}
});
function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}
</script> 
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
            <input type="hidden" name="details_link" id="details_link" value="<?php echo 'diamonds/diamond_detail/'.$row_detail['Stock_n'].'/false/';?>">
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
            <input type="hidden" name="details_link" id="details_link" value="<?php echo 'diamonds/diamond_detail/'.$row_detail['Stock_n'].'/false/';?>">
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
                    <div class="topbar_imgleft"><img src="<?php echo $ringimg; ?>" width="74" alt="<?php echo $ringtitle; ?>" /></div>
                    <div class="topbar_imgright">
                       <div class="topbar_heading"><?php echo $ringtitle; ?></div>
                       <div class="topbar_label"><?php echo $rowsring['item_title']; ?> </div>
                       <div class="topbar_label">in <span style="text-transform: capitalize;"><?php echo $rowsring['category_type']; ?></span></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="topbar_right">
                    <div class="topbar_cart_left">
                        <span style="font-size:25px;">$<?php echo _nf($sales_price, 2) ; ?></span> 
                        <a href="#" class="addtocart_btn" onclick="addcartsubmit('<?php echo $buynow_link; ?>')">Add To Cart</a>
                        <a href="#" class="addtowishlist_btn" onclick="addcartsubmit('<?php echo $buynow_link; ?>')">Add To Wishlist</a>
                    </div>
                    <div class="topbar_cart_right"><a href="#javascript" id="topbar_block"><img src="<?php echo SITE_URL; ?>img/heart_diamond/top_option_icon.jpg" alt="top_option_icon"/></a></div>
                </div>
                <div class="clear"></div>
            </div>
            <br>
            </div>
</div>

 <style type="text/css">
    .topbar_left{
        width: 43%;
    }
    .topbar_right{
        width: 56.50%;
    }
    .addtowishlist_btn {
        background: #666666;
        max-width: 195px;
        width: 100%;
        padding: 16px 10px;
        text-align: center;
        text-transform: capitalize;
        display: inline-block;
        color: #fff;
        margin-top: 17px;
    }
    .addtowishlist_btn:hover, .addtowishlist_btn:hover{
        background: #006495;
    }    
    .topbar_cart_left {
        float: left;
        width: 83%;
    }
  </style>    
  
  
<script>
    function show_video_image(getV){
       
        $("#video_show_div_1").hide();
        $("#video_show_div_2").hide();
        $("#video_show_div_3").hide();
        $("#video_show_div_4").hide();
        $("#video_show_div_5").hide();
        $("#video_show_div_6").hide();
        $("#video_show_div").hide();
        $("#"+getV).show();
        
    }
</script>   
<!-- top bar add to cart block end -->
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<!--<script src="<?php echo SITE_URL; ?>js/jquery.min.js"></script>
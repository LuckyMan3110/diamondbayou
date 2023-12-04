<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script language="javascript" src="<?php echo SITE_URL; ?>js/jquery.popup.js" type="text/javascript"></script>
<style>
#image-viewer-details-and-purchase .right-half{float:none;width:100%}
.product-detail-purchase{position:fixed;width:400px;z-index:6;padding-top:70px}
.product-detail-accordion .accordion-item .accordion-drawer{max-width:100%}
.ring_img_block{text-align:center;height:auto}
.product-detail-accordion .product-detail{display:block;padding-right:inherit;padding-left:inherit;float:none;margin-bottom:20px;overflow:hidden}
body > #content-wrapper,body > footer{max-width:100%}
.product-detail-accordion{margin-top:0}
#image-viewer-details-and-purchase{margin:0}
.product-detail{padding:0!important}
.content{background:#fff}
.detail-accordion{background:#fff}
.product-detail-wrap{font-size:0;background-color:#fff;display:block;padding:0}
h1.product-title{padding-left:0;color:#222;line-height:35px}
.metalsection select{border:1px solid #ccc;width:280px}
.nile-button-black{background-color:#000;text-align:center;color:#fff;padding:13px 0;width:70%;margin:10px 0 20px}
.contact_right_cols{float:left;width:100%;border-left:none;margin:2px 0 0;padding:0}
.social-icons .group-of-icons{float:left}
.product-detail-accordion .accordion-item .accordion-button{border-top:none}
.product-detail-accordion .accordion-item:last-of-type{border-bottom:none}
.collection_listings .set_bk_height{width:23.9%;background-color:#fff}
.set_position img{position:static!important;width:100%}
.collection_listings .similar_collection .sp{padding:0!important;width:200px;margin:0 auto;position:relative}
.sp{margin:0}
#page{background:#E9E9E9}
.item_info_view{position:absolute;bottom:62px;left:0;font-size:13px;right:0;background-color:#fff;height:115px;padding:13px}
.item_lable_style a,.addtocart_icon a{color:#333}
.detail_center{padding:0 20px}
.shipping-details-area{background-color:#F3F3F3;padding:60px 0;position:relative;z-index:999999;margin-top:-18px!important}
.detail-accordion{position:initial}
.footer{z-index:999;position:relative}
.w3layouts_bottom{z-index:999;position:relative}
.set_position img{width:auto;max-width:200px}
.purchase-column{margin-left:1.1666666667%}
.collection-detail-accordion{width:55%;float:left}
.collection-purchase-column{width:40%;float:right}
#product-details{padding:0 0 30px 30px !important}
#card-details-and-purchase{width:450px}
.fix-scrolling{position:fixed;width:450px;top:100px}
.top_bar_cart{z-index:999}
.ring_view_rating{display:none}
.topbar_section{background-color:#fff}
</style>
<script>
window.onscroll = function() {myFunction()};
var header = document.getElementById("card-details-and-purchase");
var sticky = header.offsetTop;
function myFunction() {
	if (window.pageYOffset > sticky) {
		header.classList.add("fix-scrolling");
	} else {
		header.classList.remove("fix-scrolling");
	}
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
	var y = $(this).scrollTop();
	if (y > 200) {
		$('.topbar_section').fadeIn();
	} else {
		$('.topbar_section').fadeOut();
	}  
	if (y > 250) {
		$('#card-details-and-purchase').addClass("fix-scrolling");
	}else if (y > 400) {
		alert(y);
		$('#card-details-and-purchase').removeClass("fix-scrolling");
	} else {
		$('#card-details-and-purchase').removeClass("fix-scrolling");
	} 
});
</script>
<link type="text/css" href="<?php echo SITE_URL; ?>css/zoom_jquery.css" rel="stylesheet" />
<script src="<?php echo SITE_URL; ?>js/jquery.zoom.js"></script>
<script>
$(document).ready(function(){
	$('.sp').zoom();
	$('#show_thumb_view').zoom();
	$('#show_thumb_view .sp img').scroll(zoom);
});
</script>
<script language="javascript" src="<?php echo SITE_URL; ?>js/common_function.js" type="text/javascript"></script>
<script>
var $ = jQuery.noConflict();
function printCurrPage() {
	window.print();
}
$(function() {
	$(".js__p_start, .js__p_another_start").simplePopup();
});
</script>
<?php $sales_price = $rowsring['product_price'];?>

<div class="content">
    <!-- Product Details - Main Product Info Top -->
    <div class="row">
        <!-- Product Details Image Carousel - Top/ Left -->
        <div class="product-detail-column">
            <!-- Product detail vertical carousel navigation handlebars template -->
            <ul>
                <li>
                    <a class="carousel-pagination-link" href="#">
                       
                    </a>
                </li>
            </ul>
            <!-- End template -->
        </div>
        <!-- Product Details Purchase Column - Top/ Right -->
        
        
        <!-- Product Details Accordian - Left -->
        <div class="collection-detail-accordion">
            
            <div class="accordion-wrapper standard">
                <div id="accordion-product-details" class="product-details-nav-product-details accordion-item accordion-item-mutually-exclusive accordion-item-default accordion-item-standard accordion-item-medium accordion-item-small _open">
                   
                        <div class="detail_center">
                            <div class="clear"></div>

                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">    
                        <div class="tz-gallery-collection">    
							<?php echo '<a class="lightbox" id="light_a"  href="'.$rowsring['product_main_img'].'"><img alt="diamonds-img" id="light_img" class="" src="'.$rowsring['product_main_img'].'" style="margin: 0px 0px;width:100%;" /></a><br>';?>
							<?php if(!empty($rowsring['product_gallery_imges'])){
								$gallery_imgs = explode(",",$rowsring['product_gallery_imges']);
								if(!empty($gallery_imgs)){
									foreach($gallery_imgs as $gallery_img1){
										$gal_org = "'".$gallery_img1."'";
								?>
									<a href="javascript:void(0);" onclick="ch_img1('<?php echo $gal_org;?>')">	<img src="<?php echo $gallery_img1; ?>" style="width:55px;height:55px;" alt="<?php echo $rowsring['product_name']; ?>" />
									</a>
							<?php
									}
								}
								else{
							?>
									<img src="<?php echo $rowsring['product_gallery_imges']; ?>" style="width:55px;height:55px;" alt="<?php echo $rowsring['product_name']; ?>" />
							<?php }?>
							<?php }?>
                        </div>        
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>     
                        <script>
                            baguetteBox.run('.tz-gallery-collection');
                        </script>
                        </div>
                    <br><br>
                    <div class="accordion-drawer" id="product-details">
                        <div class="product-detail">
                            
                            <?php if( !empty($rowsring['note']) ){ ?>
                             <h3>Description</h3>
                             <?php echo $rowsring['note']; ?>
                            <?php } ?>
                            <div id="image-viewer-details-and-purchase">
                                <div class="right-half">
                                    <div id="setting-information-table">
                                      <div class="detail-table">
                                        
                                        <?php if($rowsring['information'] != ''){ 
                                            $rs_strins_labs = explode('<td class="y">',$rowsring['information']);
                                             if(!empty($rs_strins_labs)){
                                                 $i1 = 0;
                                                 foreach($rs_strins_labs as $rs_strins_lab_1){
                                                    $rs_string_2 = explode('</td>',$rs_strins_lab_1);
													$rs_sting_1 = explode('<td class="y">'.$rs_string_2[0].'</td>        <td class="x" height="30">',$rowsring['information']);
                                                    if(!empty($rs_sting_1)){
                                                        $rs_string_1 = explode('</td>',$rs_sting_1[1]);
                                                        $req_out1 = $rs_string_1[0];
                                                        if(!empty($req_out1) && !empty($rs_string_2[0])){
                                                        
                                         ?>
                                                        <div class="row detail">
                                                         <div data-unique-id="stock-number-column-0" class="column-0 "> <span> <?php echo $rs_string_2[0];?> </span> </div>
                                                            <div data-unique-id="stock-number-column-1" class="column-1 "> <span> <?php echo $req_out1; ?> </span> </div>
                                                        </div>
                                            <?php 
                                                        }
                                                    }
                                                    $i1++;
                                                }
                                            }
                                        } ?>
                                        <?php if($rowsring['additional_info'] != ''){ 
                                            $rs_strins_labs = explode('<td class="y">',$rowsring['additional_info']);
                                             if(!empty($rs_strins_labs)){
                                                 $i1 = 0;
                                                 foreach($rs_strins_labs as $rs_strins_lab_1){
                                                    $rs_string_2 = explode('</td>',$rs_strins_lab_1);
													$rs_sting_1 = explode('<td class="y">'.$rs_string_2[0].'</td>        <td class="x" height="30">',$rowsring['additional_info']);
                                                    if(!empty($rs_sting_1)){
                                                        $rs_string_1 = explode('</td>',$rs_sting_1[1]);
                                                        $req_out1 = $rs_string_1[0];
                                                        if(!empty($req_out1) && !empty($rs_string_2[0])){
                                                        
                                         ?>
                                                        <div class="row detail">
                                                         <div data-unique-id="stock-number-column-0" class="column-0 "> <span> <?php echo $rs_string_2[0];?> </span> </div>
                                                            <div data-unique-id="stock-number-column-1" class="column-1 "> <span> <?php echo $req_out1; ?> </span> </div>
                                                        </div>
                                            <?php 
                                                        }
                                                    }
                                                    $i1++;
                                                }
                                            }
                                        } ?>
                                        
                                        
                                        <div class="row contains-link">
                                          <div class="column-0"></div>
                                          <div class="column-1"> <a href="#" class="arrowed">Find your ring size</a> </div>
                                        </div>
                                      </div>
                                    </div>
                                </div>    
                                
                            </div> 
                    
                        </div>
                        <div class="product-detail-2">
                        </div>
                    </div>
                    
                </div>

            </div>
            <div class="find-promo-small">
                <ul>
                </ul>
            </div>
            <!-- .product-detail-accordion -->
        </div>
        <!-- Correct and working html chunk -->
        <div class="collection-purchase-column">
            <div id="card-details-and-purchase" class="clearfix">
                  <?php 
                  echo $recently_purchased; 
					$Metal_Color = $rowsring['gold_color']; 
                    $cate_name = $this->davidsternmodel->get_ebay_cat_name($rowsring['subcategory']);
                  ?>
                  <div class="small-only title-area">
                    <div class="product-title">
                      <h1 class="product-title" itemprop="name"><?php echo $rowsring['product_name']; ?> </h1>
                    </div>
                  </div>
                    <form name="collection_form" id="collection_form" method="post" action="">
                        <div class="right-half">
                    <div class="title-area">
						<div class="product-title medium-and-large-only">
                        <h1 class="product-title" itemprop="name"><?php echo $rowsring['product_name']; ?></h1>
                      </div>
                       <div class="price-with-button force-wrap" data-smart-wrap="true">
                            <div class="price-display">
                                <div class="regular-price" style="border-bottom: solid 1px #cccccc;padding-bottom: 5px;">
                                  <span class="price" style="font-size: 40px;color: #999999;" id="show_real_price" itemprop="price" content="2990.00">$<?php echo $sales_price; ?></span>
                                </div>
                            </div>
                        </div>
                        <span id="show_real_price_msg"></span>
                      <div class="price-and-purchase">
                      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                        <script>
                        $(document).ready(function(){
                            $('[data-toggle="tooltip"]').tooltip();   
                        });
                        function ch_img1(img_src){
                                $("#light_img").attr("src", img_src);
                                $('#light_a').attr("href",img_src);
                            }
                        </script> 
                      
                      </div>
					  <a class="" href="#" onclick="addcartsubmit('<?php echo SITE_URL; ?>jewelleries/addtoshoppingcart')"><div class="nile-button-black">ADD TO SHOPPING BAG</div></a>
                    </div>
                  </div>
                    </form>
                </div>
            <!-- . product-detail-purchase -->
        </div>
    </div>

</div>


<section id="similar-settings" style="z-index: 11; background-color: #ffffff !important; position: relative; padding-top: 30px; padding-bottom: 50px; padding-left: 20px; padding-right: 20px; border-top: solid 1px #ccc; margin-top: 20px;">

    <?php if($listings){ ?>    
    <div><h3 style="margin-bottom: 20px;text-align:center;color:#666;">You May Also Like</h3></div> 
    <?php } ?>
  
  <div class="rings_block collection_listings">
        
        <?php echo $listings; ?>
        
        <div class="clear"></div>
    </div>
</section>


<!-- top bar add to cart block start -->
<div class="topbar_section hide_block">
    <div class="top_bar_cart">
        <div class="topbar_left">
            <div class="topbar_imgleft"><img src="<?php echo $rowsring['product_main_img']; ?>" width="74" alt="<?php echo $rowsring['product_name']; ?>" /></div>
            <div class="topbar_imgright">
               <div class="topbar_heading"><?php echo $rowsring['product_name']; ?></div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="topbar_right">
            <div class="topbar_cart_left">
                <span style="font-size:25px;">$<?php echo $sales_price ; ?></span> 
                <a href="#" onclick="addcartsubmit('<?php echo SITE_URL; ?>jewelleries/addtoshoppingcart/')" class="addtocart_btn">Add To Cart</a>
                <a href="#" onclick="addcartsubmit('<?php echo SITE_URL; ?>jewelleries/addtoshoppingcart/')" class="addtowishlist_btn" >Add To Wishlist</a>
            </div>
            <div class="topbar_cart_right"><a href="#javascript" id="topbar_block"><img src="<?php echo SITE_URL; ?>img/heart_diamond/top_option_icon.jpg" alt="top_option_icon"/></a></div>
        </div>
        <div class="clear"></div>
    </div>
    <br>
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
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script src="<?php echo SITE_URL; ?>js/video.popup.js"></script>
<link rel="stylesheet" href="<?php echo SITE_URL; ?>css/video.popup.css">
<script>
$(function(){
	$("#video").videoPopup({autoplay:1});
});

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

function addcartsubmit(pageURL){
	document.getElementById('collection_form').action = pageURL;
	document.getElementById('collection_form').submit();
}
</script>
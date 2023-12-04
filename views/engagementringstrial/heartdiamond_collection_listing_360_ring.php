<link type="text/css" href="<?php echo SITE_URL; ?>css/heart_collection_menu.css" rel="stylesheet" />
<link type="text/css" href="<?php echo SITE_URL; ?>css/collectin_style.css" rel="stylesheet" />
<link type="text/css" href="<?php echo SITE_URL; ?>css/right_popup_hover.css" rel="stylesheet" />
<script>
function return_back_page() {
    window.history.back();
}
    function button_next(id_value) {
        $('#' + id_value + ' .active_view').removeClass('active_view').addClass('oldActive');    
            if ( $('.oldActive').is(':last-child')) {
                $('#' + id_value + ' .sp:nth-of-type(1)').addClass('active_view');
            } else{
                $('.oldActive').next().addClass('active_view');
            }
        $('.oldActive').removeClass('oldActive');
        $('#' + id_value + ' .sp').fadeOut();
        $('.active_view').fadeIn();
    }
</script>
<style>
    #primary_nav_wrap ul a {
    padding: 0 8px;
}
</style>
<div class="mainwrap clollection_listing_view">
    <ul class="bread_crumb_list">
            <li><a href="<?php echo SITE_URL; ?>">Home</a></li> > 
            <li><a href="<?php echo SITE_URL; ?>heartdiamond/heart-collection"><?= SITES_NAME ?> collection</a></li>
            <?php 
                if( !empty($bread_crumb_link) ) {
                    echo $bread_crumb_link;
                } else {
                    echo ' > <li><a href="#">'.$collection_type.'</a></li>';
                }
            ?>
            <li><a href="#"><?php //echo $cate_name; //$category_name; ?></a></li>
        </ul>
        <div class="collection_bar">
            <div class="colectionLinks col-sm-11">
                <div id="primary_nav_wrap">
                <?php echo $collection_cate_links; ?>
                </div>
            </div>
            <div class="col-sm-1 pull-right previous_page_link">
                <a href="#javascript" onclick="return_back_page()">< Return</a>
            </div>
            <div class="clear"></div>
        </div>
    <?php if( !empty($listing_type) ) { ?>
    <div class="paging_section_bars">
        <div class="col-sm-6">
            <span>Showing <?php echo $showing_paging_hint; ?></span>
            <span>
                <select name="cmb_sorting" onchange="set_dropdown_link(this.value)">
                    <?php echo $sort_dropdown_options; ?>
                </select>
            </span>
            <span>
                <span class="listings_views">
                    <a href="#javascript;" onclick="show_block_view('column_view')"><img src="<?php echo SITE_URL; ?>img/threstone/a_boxview.jpg" alt="List View"></a>
                </span>
                <span class="details_views">
                    <a href="#javascript;" onclick="show_block_view('detail_view')"><img src="<?php echo SITE_URL; ?>img/threstone/a_dtview.jpg" alt="Detail View"></a>
                </span>
            </span>
        </div>
        <div class="col-sm-6 set_pagination_links"><ul><?php echo $page_links; ?></ul></div>
        <div class="clear"></div>
    </div>
    <?php } ?>
    <div class="clear"></div>
    
    <div class="clear"></div>
    <div style="background-color:#dddddd;padding:15px;height:75px;margin-bottom: 30px;">
        	<form action="" method="get">
                <div class="col-sm-3" id="set_metals_box">
                    <select name="style" id="engagementRingsFilterStyle" style="width:95%;height:45px;margin-left:2%;" onchange="engagementRingsFilterSubmit()">
                        <option value="">Select Style</option>
                        <option value="740520121" <?php if( isset($_GET['style']) AND $_GET['style'] == 740520121){ echo 'selected'; } ?> >ROUND</option>
                        <option value="740520122" <?php if( isset($_GET['style']) AND $_GET['style'] == 740520122){ echo 'selected'; } ?> >OVAL</option>
                        <option value="740520123" <?php if( isset($_GET['style']) AND $_GET['style'] == 740520123){ echo 'selected'; } ?> >EMERALD</option>
                        <option value="740520124" <?php if( isset($_GET['style']) AND $_GET['style'] == 740520124){ echo 'selected'; } ?> >Princess</option>
                        <option value="740520125" <?php if( isset($_GET['style']) AND $_GET['style'] == 740520125){ echo 'selected'; } ?> >PEAR</option>
                        <option value="740520126" <?php if( isset($_GET['style']) AND $_GET['style'] == 740520126){ echo 'selected'; } ?> >MARQUISE</option>
                        <option value="740520127" <?php if( isset($_GET['style']) AND $_GET['style'] == 740520127){ echo 'selected'; } ?> >BLANK</option>
                        <option value="740520128" <?php if( isset($_GET['style']) AND $_GET['style'] == 740520128){ echo 'selected'; } ?> >Others</option>
                    </select>       
                </div>
                <div class="col-sm-3" id="set_metal_carat">
                    <select name="metal_type" id="engagementRingsFilterMetal" style="width:95%;height:45px;margin-left:2%;" onchange="engagementRingsFilterSubmit()">
                        <option value="">Select Metal</option>
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
                    </select>        
                </div>
                <div class="col-sm-3" id="set_material">
                    <select name="quality" id="engagementRingsFilterQuality" style="width:95%;height:45px;margin-left:2%;" onchange="engagementRingsFilterSubmit()">
                        <option value="">Select Quality</option>
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
                <div class="col-sm-3" id="set_metals_box">
                    <select name="carat_item" id="engagementRingsFilterStyle" style="width:95%;height:45px;margin-left:2%;" onchange="engagementRingsFilterSubmit()">
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
                <div class="clear"></div><br><br>
                <input type="submit" style="display:none;" name="engagement_rings_filter_submit" id="engagement_rings_filter_submit">
            </form>
    
            <script>
            	function engagementRingsFilterSubmit(){
            		$("#engagement_rings_filter_submit").click();
            	}
            </script>
        </div>
    <div class="clear"></div>
        <div class="david_sternbk david_stern_lists">
            <div class="below_ringrow setimgsize">
                <div id="detail_view" class="hide_block"><?php echo $ringlisting['collection_listing']; ?></div>
<!--                <div class="heart_list_viewbk">
                    <div class="col-sm-4 heart_img_view">
                        <img src="http://heartsanddiamonds.com/webimages/completed_images/IP1068-5.0.jpg" width="200" height="153" alt="Heart and Diamond Collection" />
                    </div>
                    <div class="col-sm-7 pull-right heart_content_section">
                        <h2>Ring0.55ct18kY0.38ct40st0.20ct</h2>
                        <div>Ring0.55ct18kY0.38ct40st0.20ct Heart and Diamond Collection</div><br><br>
                        <div class="col-sm-4 list_view_price">$543.09</div>
                        <div class="col-sm-4 pull-right add_tocart_icon"><a href="#javascript" onclick="submitCartForm('http://heartsanddiamonds.com/jewelleries/addtoshoppingcart/', 'form1')">Add to Cart</a></div>
                    </div>
                    <div class="clear"></div>
                </div>-->
                <div class="clear"></div>
                <div id="column_view">
                    <?php 
//                        if( !empty($ringlisting['listings']) ) {
//                             echo $ringlisting['listings'] . $ringlisting['popup_block']; 
//                        } else {
//                            echo '<b>No Heart and Diamond Collection Listing has Found</b>';
//                        }                       
                    ?>
                    <?php 
                        if( !empty($ringlisting['listings']) ) {
                             echo '<ul class="products-grid prduct-list first last odd">'.$ringlisting['listings'] . '</ul>' . $ringlisting['popup_block']; 
                        } else {
                            echo '<b>No Heart and Diamond Collection Listing has Found</b>';
                        }                       
                    ?>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="clear"></div>
        <hr class="horizontal_line" />
<!--        <div>
            <div class="row_viewed">
                <div class="stern_cols_3">&nbsp;</div>
                <div class="stern_cols_3"><a href="#">Your Recently Viewed Items</a></div>
                <div class="stern_cols_3 set_align"><a href="#">Clear Recently Viewed Items</a></div>
                <div class="clear"></div>
            </div>
            <div class="below_ringrow setimgsize">
                <div class="stern_cols_5"><img src="<?php echo SITE_URL; ?>img/david_home/collection_img/view_jewelry_1.jpg" alt=""></div>
                <div class="stern_cols_5"><img src="<?php echo SITE_URL; ?>img/david_home/collection_img/view_jewelry_2.jpg" alt=""></div>
                <div class="stern_cols_5"><img src="<?php echo SITE_URL; ?>img/david_home/collection_img/view_jewelry_3.jpg" alt=""></div>
                <div class="stern_cols_5"><img src="<?php echo SITE_URL; ?>img/david_home/collection_img/view_jewelry_4.jpg" alt=""></div>
                <div class="stern_cols_5"><img src="<?php echo SITE_URL; ?>img/david_home/collection_img/view_jewelry_4.jpg" alt=""></div>
                <div class="clear"></div>
            </div>
            <div class="set_align"><a href="#">View Older Items</a></div>
        </div>-->
        <div class="clear"></div><br>
    </div>
<input type="hidden" name="liting_class" id="liting_class" value="heartdiamond" />
<script src="<?php echo SITE_URL; ?>js/jquery.simplePopup.js" type="text/javascript"></script>
<script type="text/javascript">
    function show_block_view(view_id_bk) {
        if( view_id_bk === 'detail_view' ) {
            jQuery('#detail_view').show();
            jQuery('#column_view').hide();
        }
        if( view_id_bk === 'column_view' ) {
            jQuery('#detail_view').hide();
            jQuery('#column_view').show();
        }
    }
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
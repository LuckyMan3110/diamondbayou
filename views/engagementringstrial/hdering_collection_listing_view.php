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
<div class="mainwrap clollection_listing_view hdring_listing_view">
    <ul class="bread_crumb_list">
            <li><a href="<?php echo SITE_URL; ?>">Home</a></li> > 
            <li><a href="<?php echo SITE_URL; ?>hdering_collections/heart_collection_listing/Ring"><?php echo get_site_contact_info('dashboard_title'); ?></a></li>
            <?php 
                $cate_name; 
            ?>
            <li><a href="#"><?php //echo $cate_name; //$category_name; ?></a></li>
        </ul>
        <div class="collection_bar">
            <div class="collectHeading col-sm-5"><a href="<?php echo SITE_URL; ?>hdering_collections/heart_collection_listing"><?php echo get_site_contact_info('dashboard_title'); ?> <span></span></a></div>
            <div class="colectionLinks col-sm-4">
                <div id="primary_nav_wrap">
                <?php //echo $collection_cate_links; ?>
                </div>
            </div>
            <div class="col-sm-3 pull-right previous_page_link">
                <a href="#javascript" onclick="return_back_page()">< Return To Previous Page</a>
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
<!--    <div class="">
        <div class="main_drop_box" id="set_metals_box">
        <div class="set_drop_box down_arrow" onclick="setFilterDropBox('set_metals_box')">Metal <span>&#8744;</span></div>
        <div class="outer_drop_box" style="display:none;">
            <ul class="drop_box_list">
                <li><input type="checkbox" name="metal_box_list" value="" id="metal_1" /><label for="metal_1">Platinum</label></li>
                <li><input type="checkbox" name="metal_box_list" value="" id="metal_2" /><label for="metal_2">Rose Gold</label></li>
                <li><input type="checkbox" name="metal_box_list" value="" id="metal_3" /><label for="metal_3">White Gold</label></li>
                <li><input type="checkbox" name="metal_box_list" value="" id="metal_4" /><label for="metal_4">Yellow Gold</label></li>
            </ul>
        </div>        
    </div>
    <div class="main_drop_box" id="set_metal_carat">
        <div class="set_drop_box down_arrow" onclick="setFilterDropBox('set_metal_carat')">Metal Carat <span>&#8744;</span></div>
        <div class="outer_drop_box" style="display:none;">
            <ul class="drop_box_list">
                <li><input type="checkbox" name="metal_box_list" value="" id="metal_carat_1" /><label for="metal_carat_1">14K</label></li>
                <li><input type="checkbox" name="metal_box_list" value="" id="metal_carat_2" /><label for="metal_carat_2">18K</label></li>
            </ul>
        </div>        
    </div>
    <div class="main_drop_box" id="set_material">
        <div class="set_drop_box down_arrow" onclick="setFilterDropBox('set_material')">Material <span>&#8744;</span></div>
        <div class="outer_drop_box" style="display:none;">
            <ul class="drop_box_list">
                <li><input type="checkbox" name="metal_box_list" value="" id="material_1" /><label for="material_1">Diamond</label></li>
                <li><input type="checkbox" name="metal_box_list" value="" id="material_2" /><label for="material_2">Gemstone</label></li>
                <li><input type="checkbox" name="metal_box_list" value="" id="material_3" /><label for="material_3">Plain Metal</label></li>
            </ul>
        </div>        
    </div>
    <div class="main_drop_box" id="set_band_width">
        <div class="set_drop_box down_arrow" onclick="setFilterDropBox('set_band_width')">Band Width <span>&#8744;</span></div>
        <div class="outer_drop_box" style="display:none;">
            <ul class="drop_box_list">
                <li><input type="checkbox" name="metal_box_list" value="" id="band_width_1" /><label for="band_width_1">1-4mm</label></li>
                <li><input type="checkbox" name="metal_box_list" value="" id="band_width_2" /><label for="band_width_2">4-6mm</label></li>
            </ul>
        </div>        
    </div>
    <div class="main_drop_box" id="set_ring_type">
        <div class="set_drop_box down_arrow" onclick="setFilterDropBox('set_ring_type')">Ring Type <span>&#8744;</span></div>
        <div class="outer_drop_box" style="display:none;">
            <ul class="drop_box_list">
                <li><input type="checkbox" name="metal_box_list" value="" id="ring_type_1" /><label for="ring_type_1">Engagement</label></li>
                <li><input type="checkbox" name="metal_box_list" value="" id="ring_type_2" /><label for="ring_type_2">Engravable</label></li>
                <li><input type="checkbox" name="metal_box_list" value="" id="ring_type_3" /><label for="ring_type_3">Has Matching Band</label></li>
            </ul>
        </div>        
    </div>
        <div class="clear"></div><br><br>
    </div>
    <div class="clear"></div>-->
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
<input type="hidden" name="liting_class" id="liting_class" value="hdering_collections" />
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
<link type="text/css" href="<?php echo SITE_URL; ?>css/heart_collection_menu.css" rel="stylesheet" />
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
<div class="mainwrap clollection_listing_view">
    <ul class="bread_crumb_list">
            <li><a href="<?php echo SITE_URL; ?>wholesale">Home</a></li> > 
            <li><a href="<?php echo SITE_URL; ?>heartjewelrylistings/heart_collection">Hearts &amp; Diamonds collection</a></li>
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
            <div class="collectHeading col-sm-6"><a href="<?php echo SITE_URL; ?>heartjewelrylistings/heart_collection/"><span>The</span> Hearts and Diamonds collection <span></span></a></div>
            <div class="colectionLinks col-sm-3">
                <div id="primary_nav_wrap">
                <?php echo $collection_cate_links; ?>
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
        <div class="david_sternbk david_stern_lists">
            <div class="below_ringrow setimgsize">
                <div id="detail_view" style="display: none;"><?php echo $ringlisting['collection_listing']; ?></div>
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
                        if( !empty($ringlisting['listings']) ) {
                             echo $ringlisting['listings'] . $ringlisting['popup_block']; 
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
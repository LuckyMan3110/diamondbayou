<link type="text/css" href="<?php echo SITE_URL; ?>css/right_popup_hover_style.css" rel="stylesheet" />
<link type="text/css" href="<?php echo SITE_URL; ?>css/right_popup_hover.css" rel="stylesheet" />
<script>
    function setListingPage(option_value) {
         window.location = option_value;
     }    
</script>
<div class="main_container">
    <div>
        <ul class="bread_crumb_list">
            <li><a href="#">Top</a>&nbsp; &raquo;</li>
            <li><a href="#">Catalog</a>&nbsp; &raquo;</li>
            <li><a href="#"><?php echo $rolex_row['Category']; ?></a>&nbsp; &raquo;</li>
            <li><a href="#"><?php echo $rolex_row['Subcategory_1']; ?></a></li>
        </ul>
    </div>
    <div class="main_content">
        <div class="main_left">
            <div class="left_box_heading">Categories</div>
            <div class="left_content_area">
                <div class="left_content_list">
                    <ul>                        
                        <?php echo $rolex_categories['cate_list']; ?>
                    </ul>
                </div>
            </div>
            <div class="left_box_heading">Information</div>
            <div class="left_content_area">
                <div class="left_content_list">
                    <ul>
                        <li><a href="#">Shipping &amp; Returns</a></li>
                        <li><a href="#">Privacy Notice</a></li>
                        <li><a href="#">Conditions of Use</a></li>
                        <li><a href="#">Ordering Information</a></li>
                        <li><a href="#">Custom Engraving</a></li>
                        <li><a href="#">Contact us</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="main_right">
            <div class="left_box_heading"><?php echo $title; ?></div>
            <div class="sort_by_bk">
                <div>
                    Sort By:
                    <select name="cmb_sort" onchange="setListingPage(this.value)">
                        <?php echo $sorting_options; ?>
                    </select>
                </div>
                <div>View Products:</div>
                <div>
                    <ul class="list_box_icon">
                        <li><a href="<?php echo $sort_link.'/10/'.$sort_field; ?>">10</a></li>
                        <li><a href="<?php echo $sort_link.'/20/'.$sort_field; ?>">20</a></li>
                        <li><a href="<?php echo $sort_link.'/30/'.$sort_field; ?>">30</a></li>
                    </ul>
                </div>
            </div>
            <div class="clear"></div>
            <div class="rolex_page_content" id="column_view">
                <?php //echo $rolex_product_listing; ?>
                <ul class="products-grid prduct-list first last odd">
                    <?php echo $rolex_product_listing; ?>
                </ul>
            </div>
            <div class="clear"></div>
            <div class=""><img src="<?php echo SITE_URL; ?>img/site_tv_img/watches_banner_view.jpg" alt="" /></div>
            <div class="clear"></div><br><br>
        </div>
        <div class="clear"></div>
    </div>
</div>
<script src="<?php echo SITE_URL; ?>demo_retail/retaildemo_js/rollover.js"></script>  
<!-- END: buySAFE Seal --> 
<input type="hidden" name="liting_class" id="liting_class" value="tvjonhy_watches" />
<!--<script src="<?php echo SITE_URL; ?>js/jquery.simplePopup.js" type="text/javascript"></script>-->
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
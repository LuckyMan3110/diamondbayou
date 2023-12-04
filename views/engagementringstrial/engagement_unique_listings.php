<!--<script src="https://code.jquery.com/jquery-1.10.2.js"></script>-->
<link type="text/css" href="<?php echo SITE_URL; ?>css/right_popup_hover.css" rel="stylesheet" />
<style>
    .prduct-list h3 {
        margin: 25px 0 8px;
    }
</style>
<script>
    var $ = jQuery.noConflict();
    

function ringsThumbView(th_url, id1, id2) {
	$('#ringsthumb_view').html('Loading.....');
	$('a#'+id1).html('<img src="'+th_url+'" width="215" height="215" onmousemove="jscMagnify(this,event)" onmouseout="jscMagnifyHide()" alt="" />');
        
        $('ul#' + id1 + ' li#' + id2 + ' a img').attr("src", base_url + 'img/heart_diamond/active_dot_cicle.jpg');
}

</script>
<div class="container unique_listing_view">
    <br>
    <div>
    <ul class="bread_crumb_list">
            <li><a href="<?php echo SITE_URL; ?>">Home</a></li> >
            <?php
            
                echo unique_section_bread_crumb($ring_cate_name); //// ringsection helper
            ?>
        </ul>
</div>
    <div class="ring_page_heading">
        <div class="leftpage_heading col-sm-7">
            <h1><?php //echo $catename_title; ?></h1>
        </div>
        <!--<div class="col-sm-5">
            <div class="dropdown_cols">
                <select name="cmb_narrowby" onchange="set_page_location(this.value)">
                    <?php echo $sort_option_link; ?>
                </select>
            </div>
            <div class="clear"></div>
        </div>-->
        
        <div id="top-filtering-area" class="filterTable form-horizontal clear">            
        	<div class="col-md-3">
        		<label>Price</label>
        		<select id="price_orderby" name="price_orderby" onchange="set_dropdown_link(this.value)">
        		  <option value="<?php echo SITE_URL; ?>selection/engagement_ring_listings/<?= $main_category_id ?>">All</option>
        		  <option value="<?php echo SITE_URL; ?>selection/engagement_ring_listings/<?= $main_category_id ?>?sort_value=ASC&field=price" <?php if( isset($_GET['sort_value']) AND $_GET['sort_value'] == 'ASC' AND $_GET['field'] == 'price'){ echo 'selected'; } ?> >Price: Low to High</option>
        		  <option value="<?php echo SITE_URL; ?>selection/engagement_ring_listings/<?= $main_category_id ?>?sort_value=DESC&field=price" <?php if( isset($_GET['sort_value']) AND $_GET['sort_value'] == 'DESC' AND $_GET['field'] == 'price'){ echo 'selected'; } ?>>Price: High to Low</option>
        		</select>
        	</div>   
        	
        	<div class="col-md-3">
        		<label>Metals</label>
        		<select id="metals_sortby" name="metals_sortby">
        		  <option value="<?php echo SITE_URL; ?>selection/engagement_ring_listings/<?= $main_category_id ?>">All</option>
        		</select>
        	</div> 
        	
        	<div class="col-md-3">
        		<label>Setting Type</label>
        		<select id="settings_sortby" name="settings_sortby">
        		  <option value="<?php echo SITE_URL; ?>selection/engagement_ring_listings/<?= $main_category_id ?>">All</option>
        		</select>
        	</div> 
        	
        	<div class="col-md-3">
        		<label>Short</label>
        		<select id="sortby" name="sortby" onchange="set_dropdown_link(this.value)">
        		  <option value="<?php echo SITE_URL; ?>selection/engagement_ring_listings/<?= $main_category_id ?>">All</option>
        		  <option value="<?php echo SITE_URL; ?>selection/engagement_ring_listings/<?= $main_category_id ?>?sort_value=DESC&field=id" <?php if( isset($_GET['sort_value']) AND $_GET['sort_value'] == 'DESC' AND $_GET['field'] == 'id'){ echo 'selected'; } ?>>Newest</option>
        		  <option value="<?php echo SITE_URL; ?>selection/engagement_ring_listings/<?= $main_category_id ?>?sort_value=ASC&field=id" <?php if( isset($_GET['sort_value']) AND $_GET['sort_value'] == 'ASC' AND $_GET['field'] == 'id'){ echo 'selected'; } ?>>Oldest</option>
        		</select>
        	</div> 
        	
        	<script>
        	  function set_dropdown_link(getVal){
        		  window.location.href = getVal;
        	  }
        	</script>
          
        </div>

        <div class="clear"></div>
    </div>
    <?php if( $parent_cateid == 52 ) { ?>
    <div class="rings_type_row">
        <ul>
            <li><a href="<?php echo SITE_URL; ?>testengagementrings/engagement_ring_listings/103" title="Cushion">Cushion</a></li>
            <li><a href="<?php echo SITE_URL; ?>testengagementrings/engagement_ring_listings/101" title="Emerald">Emerald</a></li>
            <li><a href="<?php echo SITE_URL; ?>testengagementrings/engagement_ring_listings/54" title="Heart">Heart</a></li>
            <li><a href="<?php echo SITE_URL; ?>testengagementrings/engagement_ring_listings/53" title="Interchangeable Heads ">Interchange Heads </a></li>
            <li><a href="<?php echo SITE_URL; ?>testengagementrings/engagement_ring_listings/98" title="Marquise">Marquise</a></li>
            <li><a href="<?php echo SITE_URL; ?>testengagementrings/engagement_ring_listings/100" title="Oval">Oval</a></li>
            <li><a href="<?php echo SITE_URL; ?>testengagementrings/engagement_ring_listings/99" title="Pear">Pear</a></li>
            <li><a href="<?php echo SITE_URL; ?>testengagementrings/engagement_ring_listings/102" title="Princess">Princess</a></li>
            <li><a href="<?php echo SITE_URL; ?>testengagementrings/engagement_ring_listings/97" title="Round">Round</a></li>
            <li><a href="<?php echo SITE_URL; ?>testengagementrings/engagement_ring_listings/55" title="Trillion ">Trillion</a></li>
        </ul>
        <div class="clear"></div>
    </div>
    <?php } ?>
    <br>
    <div class="ring_listing_row unique_listings">
     <?php
        echo $ring_listings;
     ?>
        <div class="clear"></div><br><br>
        <div class="paginate_row">
            <ul>
                <li><img src="<?php echo SITE_URL; ?>img/heart_diamond/left_page_arrow.jpg" alt="left_page_arrow" /></li>
                <?php echo $page_links; ?>
                <li><img src="<?php echo SITE_URL; ?>img/heart_diamond/right_page_arrow.jpg" alt="right_page_arrow" /></li>
            </ul>
        </div>
        <div class="clear"></div><br><br><br>
        <div class="bottom_content">
            
            <?php echo collections_about_row_content(); ?>
                
            <br>
        </div><br>
        <?php echo heart_about_row_content(); // contentsection helper ?>
        <div class="clear"></div>
    </div>
</div>
<script src="<?php echo SITE_URL; ?>js/jquery.simplePopup.js" type="text/javascript"></script>
<!-- BEGIN: buySAFE Seal --> 
<script src="<?php echo DEMO_RETAIL_JS; ?>rollover.js"></script>  
<!-- END: buySAFE Seal -->
<input type="hidden" name="liting_class" id="liting_class" value="" />
<script type="text/javascript">
    function view_simple_popup(block_vid) {
        $('#pop_' + block_vid).simplePopupBlock();
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
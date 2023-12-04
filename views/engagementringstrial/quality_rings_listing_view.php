<!--<script src="https://code.jquery.com/jquery-1.10.2.js"></script>-->
<script>
    var $ = jQuery.noConflict();
    

function ringsThumbView(th_url, id1, id2) {
	$('#ringsthumb_view').html('Loading.....');
	$('a#'+id1).html('<img src="'+th_url+'" width="175" height="159" onmousemove="jscMagnify(this,event)" onmouseout="jscMagnifyHide()" alt="" />');
        
        $('ul#' + id1 + ' li#' + id2 + ' a img').attr("src", base_url + 'img/heart_diamond/active_dot_cicle.jpg');
}

</script>
<div class="container">
    <br>
    <div class="ring_page_heading">
        <div class="leftpage_heading col-sm-7">
            <h1><?php echo $cate_name['category_name']; ?></h1>
        </div>
        <div class="col-sm-5">
            <div class="dropdown_cols">
                <select name="cmb_narrowby">
                    <option value="">Narrow By</option>
                </select>
            </div>
            <div class="dropdown_cols">
                <select name="cmb_customized">
                    <option value="">Customized By</option>
                </select>
            </div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
<!--    <div class="rings_type_row">
        <ul>
            <?php //echo $category_links; ?>
        </ul>
        <div class="clear"></div>
    </div>-->
    <br>
    <div class="ring_listing_row">
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
            <div class="content_head">About <?php echo SITES_NAME; ?> Diamond Engagement Rings</div>
            <div>Engagement rings have been the ultimate symbol of love for thousands of years. In ancient Egypt, they wore rings on 
                    the third finger of the left hand to mark where the "vein of love" went directly to the heart, starting a tradition that 
                    continues today. When pledging your love with a unique engagement ring, you are starting your own family tradition. 
                    The most important value factor to consider when shopping for princess diamond engagement rings is the quality of 
                    the center stone. Gemvara hand-selects top quality conflict-free gems that are expertly cut for maximum beauty. The 
                    ancient Greeks called diamond "adamas," meaning invincible, theorizing that something so beautiful must be the 
                    crystallized teardrops of the gods. Gemvara's diamonds are hand selected for fine quality: even small accent gems are 
                    H SI2 or better. Center diamonds have GIA or AGS reports confirming the exceptional quality. Princess cut gemstones 
                    are the second most popular shape, after the round brilliance. Our unrivalled selection of engagement rings by Martha 
                    Gomez Gutierrez, Ruzanna Davtian, Jessica Behzad, and other talented jewelry designers means you can find an 
                    engagement ring that perfectly symbolizes your relationship. Clean princess diamond engagement rings with mild 
                    dish soap: use a soft brush where dust collects. When taking off your engagement ring, don't pull on the gemstone: 
                    this won't damage the gem but it can, over time, stretch the metal that holds it in place, making the setting less 
                    secure. Be careful when removing your ring to wash your hands. Don't leave it on the rim of a sink where it can slip 
                    down the drain! Gemvara's fine quality princess diamond engagement rings are designed to be passed down for 
                    generations to come, crafted by hand in the United States.</div><br>
        </div><br>
    </div>
    <br>
    <br>
    <br>
</div>
<!-- BEGIN: buySAFE Seal --> 
<script src="<?php echo DEMO_RETAIL_JS; ?>rollover.js"></script>  
<!-- END: buySAFE Seal -->
<input type="hidden" name="liting_class" id="liting_class" value="qualitygoldrings" />
<script type="text/javascript">
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
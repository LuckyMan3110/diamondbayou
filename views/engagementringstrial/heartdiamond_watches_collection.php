<link type="text/css" href="<?php echo SITE_URL; ?>css/heart_collection_menu.css" rel="stylesheet" />
<link type="text/css" href="<?php echo SITE_URL; ?>css/collectin_style.css" rel="stylesheet" />
<link type="text/css" href="<?php echo SITE_URL; ?>css/right_popup_hover.css" rel="stylesheet" />
<style>
    .collection_listings .set_bk_height {
        width: 24.13%;
    }
</style>
<div class="mainwrap container collection_listings">
    <div>
        <ul class="bread_crumb_list">
            <li><a href="<?php echo SITE_URL; ?>">Home</a></li> > 
            <li><a href="#"><?php echo SITES_NAME; ?> collection</a></li>
        </ul>
    </div>
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
     <div class="clear"></div>

        <div class="clear"></div>
        <div class="david_sternbk">
            <nav style="background-color:#ffffff;float: right;">
              <center><ul class="pagination">
                 <?php 
                    $total_limit    = ceil( ($get_jewelry_new_count/50) );
                    $limit          = 0;
                    $offset         = 0;

                    $limi_page      = 0;
                    $offset_active  = '';

                    if($total_limit > 0){   
                    ?>

                    <li class="page-item disabled">
                      <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span> Previous
                        <span class="sr-only">Previous</span> 
                      </a>
                    </li>
                    <?php 
                        if (isset($_GET['offset'])){
                            $offset_active = $_GET['offset'];
                        }
                        
                        $limit = 0;
                        for ($inc=1; $inc <= $total_limit; $inc++) { 

                           $limit   = $limit + 50;
                           $offset  = $limi_page;
                           if($offset_active == $offset){
                            ?>
                            <li class="page-item active"><a class="page-link" href="#"><?= $inc ?></a></li>
                            <?php
                           }else{
                            ?>
                            <li class="page-item"><a class="page-link" href="<?= BASE_URL(); ?>goldsourcediamond/goldsource_collection?limit=<?= $limit ?>&offset=<?= $offset ?>"><?= $inc ?></a></li>
                            <?php
                           }
                           $limi_page = $limi_page + 50;
                         }
                        ?>

                    <li class="page-item disabled">
                      <a class="page-link" href="#" aria-label="Next">
                       Next <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                      </a>
                    </li>
                    <?php    
                    }    
                ?>
               
              </center></ul>
            </nav>
            <div class="clear"></div>
            
            <div class="left_stern setimgsize1 col-sm-12">
                <?php echo $rings_listing_3['listings'].$rings_listing_3['popup_block']; ?>
            </div>
            <div class="clear"></div>
            
            <nav style="background-color:#ffffff;">
              <center><ul class="pagination">
                 <?php 
                    $total_limit    = ceil( ($get_jewelry_new_count/50) );
                    $limit          = 0;
                    $offset         = 0;

                    $limi_page      = 0;
                    $offset_active  = '';

                    if($total_limit > 0){   
                    ?>

                    <li class="page-item disabled">
                      <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span> Previous
                        <span class="sr-only">Previous</span> 
                      </a>
                    </li>
                    <?php 
                        if (isset($_GET['offset'])){
                            $offset_active = $_GET['offset'];
                        }
                        
                        $limit = 0;
                        for ($inc=1; $inc <= $total_limit; $inc++) { 

                           $limit   = $limit + 50;
                           $offset  = $limi_page;
                           if($offset_active == $offset){
                            ?>
                            <li class="page-item active"><a class="page-link" href="#"><?= $inc ?></a></li>
                            <?php
                           }else{
                            ?>
                            <li class="page-item"><a class="page-link" href="<?= BASE_URL(); ?>goldsourcediamond/goldsource_collection?limit=<?= $limit ?>&offset=<?= $offset ?>"><?= $inc ?></a></li>
                            <?php
                           }
                           $limi_page = $limi_page + 50;
                         }
                        ?>

                    <li class="page-item disabled">
                      <a class="page-link" href="#" aria-label="Next">
                       Next <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                      </a>
                    </li>
                    <?php    
                    }    
                ?>
               
              </center></ul>
            </nav>
                
        </div>
        
        
        
        <hr class="horizontal_line" />
        <div class="clear"></div>

            
             <?php 
             
                function heart_about_row_content() {
                        $rowcontent = '<div class="about_content_bk">
                                <div class="about_heart_left about_block col-sm-5">
                                    <div style="font-size:40px;background-color:#ffffff;color:#000000;padding:8px 70px;width:80%;margin:0px auto;line-height: 45px;text-transform: uppercase;"> '.get_site_contact_info('sites_title').'</div>
                                    <br/>
                                    <div>Shopping for an engagement ring can be overwhelming. '.get_site_contact_info('sites_title').' wants to educate you to help guide you to make the best decision for  such an important purchase.  We have the largest number of GIA Graduate  Gemologists and certified bench jewelers in the.  All of our  sales professionals receive continuing education so that we are the most  knowledgeable staff!  And we pass that knowledge on to you!</div><br>
                     
                                </div>
                                <div class="about_heart_right about_block col-sm-6 pull-right">
                                    <div class="about_heart_heading">'.get_site_contact_info('sites_title').'</div><br><br>
                                    <div style="display:none;"><img src="'.SITE_URL.'img/heart_diamond/builder/heart_paypal_icon.jpg" alt="" /></div><br><br>
                                    <div>'.get_site_contact_info('sites_title').' has several finance options to make your Shopping Experience with us simple and easy.</div>
                                        <img src="'.SITE_URL.'uploads/111_sitelg_6b95b216-059b-43de-9e23-f3f38cf5d086.jpg" style="margin-top:14px;" width="130px" alt="'.get_site_contact_info('sites_title').'">
                                </div> 
                                </div>
                                <div class="clear"></div>';
                        
                        return $rowcontent;
                    }
             //echo heart_about_row_content();
             ?>

        <div class="clear"></div><br>
    </div>

<input type="hidden" name="liting_class" id="liting_class" value="heartdiamond" />
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

<style>
    
div.box-detail-over {
    background: #fff;
    border: 1px solid #1d5c57;
    display: none;
    left: 100%;
    overflow: hidden;
    padding: 10px;
    position: absolute;
    top: 0px;
    width: 307px;
    z-index: 50;
}
    
</style>
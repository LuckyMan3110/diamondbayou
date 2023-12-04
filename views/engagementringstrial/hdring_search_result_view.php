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
    <div class="clear"></div>
        <div class="david_sternbk david_stern_lists">
            <div class="below_ringrow setimgsize">
                <div class="clear"></div>
                <div id="column_view"><br><br>
                    <?php 
                        echo '<b>No Search Result and match has found plz try an other keywords!</b>';                       
                    ?>
                </div>
                <div class="clear"></div><br><br><br><br>
            </div>
        </div>
        <div class="clear"></div>
        <hr class="horizontal_line" />
        <div class="clear"></div><br>
    </div>
<input type="hidden" name="liting_class" id="liting_class" value="hdering_collections" />
<script src="<?php echo SITE_URL; ?>js/jquery.simplePopup.js" type="text/javascript"></script>
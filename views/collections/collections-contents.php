</div>
<style type="text/css">
    .wedding-bands-bg {
        background: url('<?= $header_bg_image ?>') no-repeat 50% 50%;
    }
</style>
<div class="collections-page-header">
    <div class="container main_wraper">
        <ul class="bread_crumb_list">
            <li><a href="<?php echo SITE_URL; ?>">Home</a></li> >
            <li>
            <?php
                echo $sub_page_link; 
            ?>
            </li> 
        </ul>
    </div>
</div>

<div class="wedding-bands-bg">


</div>

<div class="container main_wraper">
<div class="container unique_listing_view">
    <br>
    <div class="ring_listing_row unique_listings">
         <?php
            echo $ring_listings;
         ?>
        <div class="clear"></div><br>

        <div class="clear"></div>
        <div class="bottom_content">

            <?php echo collections_about_row_content(); ?>

        </div>
        <br>
        <?php echo heart_about_row_content(); ?>
        <div class="clear"></div>
    </div>
</div>

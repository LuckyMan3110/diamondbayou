<div class="container">
    <br>
    <div>
    <ul class="bread_crumb_list">
            <li><a href="<?php echo SITE_URL; ?>">Home</a></li> >
            <?php
                echo unique_section_bread_crumb($cate_name, 'main'); //// ringsection helper
            ?>
        </ul>
    </div>
    <div class="ring_page_heading">
        <div class="leftpage_heading col-sm-7">
            <h1><?php echo $category_name; ?></h1>
        </div>
        <div class="col-sm-5">
            <div class="dropdown_cols">
                <select name="cmb_narrowby">
                    <option value="">Narrow By</option>
                </select>
            </div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
<!--    <div class="rings_type_row">
        <ul>
            <?php echo $category_links; ?>
        </ul>
        <div class="clear"></div>
    </div>-->
    <br>
    <div class="ring_listing_row sterncollection">
     <?php
        echo $ring_categoies;
     ?>
        <div class="clear"></div><br><br>
<!--        <div class="paginate_row">
            <ul>
                <li><img src="<?php echo SITE_URL; ?>img/heart_diamond/left_page_arrow.jpg" alt="" /></li>
                <?php echo $page_links; ?>
                <li><img src="<?php echo SITE_URL; ?>img/heart_diamond/right_page_arrow.jpg" alt="" /></li>
            </ul>
        </div>-->
        <div class="clear"></div><br><br><br>
        <div class="bottom_content">

                The <?php echo $title; ?> Listing.

                <?php echo collections_about_row_content(); ?> 

            <br>
        </div><br>
    </div>
    <br>
    <br>
    <br>
</div>
<!-- BEGIN: buySAFE Seal -->
<!-- END: buySAFE Seal -->
<input type="hidden" name="liting_class" id="liting_class" value="" />
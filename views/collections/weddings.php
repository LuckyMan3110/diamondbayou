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
    <br><br><br>
    <div class="ring_listing_row unique_listings">

        <div class="col-sm-3 collection-filters">
            <ul class="collection-sidebar-ul">
                <li class="sidebar-nav"><a href="#"><b>Wedding</b> </a></li>
                <li class=""><a href="http://www.bridalringcreator.com/moijey/?nsp=settingSearch#settingSearch" title="Build Your Ring">Build Your Ring</a></li>
                <li class=""><a href="<?php echo SITE_URL; ?>collections/engagement-rings" title="Engagement Ring">Engagement Ring</a></li>
                <li class=""><a href="<?php echo SITE_URL; ?>collections/engagement-ring-under-2-000" title="Engagement Ring Under $2000">Engagement Ring Under $2000</a></li>
                <li class=""><a href="<?php echo SITE_URL; ?>collections/wedding-bands" title="Bands For Her">Bands For Her</a></li>
                <li class=""><a href="<?php echo SITE_URL; ?>collections/bands-for-him" title="Bands For Him">Bands For Him</a></li>
                <li class=""><a href="<?php echo SITE_URL; ?>pages/contact-us" title="Engraving">Engraving</a></li>
                <li class=""><a href="<?php echo SITE_URL; ?>pages/contact-us" title="Wedding Ring Concierge">Wedding Ring Concierge</a></li>
            </ul>
        </div>

        <div class="col-sm-9">
            <div class="col-cats">
              <a class="col-cat full build-your-ring-bg-small" href="http://www.bridalringcreator.com/moijey/?nsp=settingSearch#settingSearch"><div class="black-hover"><span class="cat-title"></span></div></a>
              <a class="col-cat half engagement-rings-bg-small" href="<?php echo SITE_URL; ?>collections/engagement-rings"><div class="black-hover"><span class="cat-title">Engagement Ring</span></div></a>
              <a class="col-cat half anniversary-collection-bg-small" href="<?php echo SITE_URL; ?>collections/anniversary-collection"><div class="white-hover"><span class="cat-title">Anniversary Collection</span></div></a>
              <a class="col-cat half bands-for-her-bg-small" href="<?php echo SITE_URL; ?>collections/wedding-bands"><div class="white-hover"><span class="cat-title">Bands For Her</span></div></a>
              <a class="col-cat half bands-for-him-bg-small" href="<?php echo SITE_URL; ?>collections/bands-for-him"><div class="black-hover"><span class="cat-title">Bands For Him</span></div></a>
              <a class="col-cat half engraving-bg-small" href="<?php echo SITE_URL; ?>pages/newsletter"><div class="white-hover"><span class="cat-title">Engraving</span></div></a>
              <a class="col-cat half concierge-bg-small" href="<?php echo SITE_URL; ?>pages/contact-us"><div class="black-hover"><span class="cat-title">Wedding Ring Concierge</span></div></a>
            </div>
        <?php echo collections_about_row_content(); ?>
        </div>


        <div class="clear"></div>
    </div>
    <br><br>
</div>

<style type="text/css">

.black-hover {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0,0,0,0);
    -webkit-transition: background-color 200ms ease-out;
    -moz-transition: background-color 200ms ease-out;
    -ms-transition: background-color 200ms ease-out;
    -o-transition: background-color 200ms ease-out;
    transition: background-color 200ms ease-out;
}
.black-hover:hover {
    background: rgba(0,0,0,.5);
    -webkit-transition: background-color 200ms ease-out;
    -moz-transition: background-color 200ms ease-out;
    -ms-transition: background-color 200ms ease-out;
    -o-transition: background-color 200ms ease-out;
    transition: background-color 200ms ease-out;
}
.white-hover {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(255,255,255,0);
    -webkit-transition: background-color 200ms ease-out;
    -moz-transition: background-color 200ms ease-out;
    -ms-transition: background-color 200ms ease-out;
    -o-transition: background-color 200ms ease-out;
    transition: background-color 200ms ease-out;
}
.white-hover:hover {
    background: rgba(255,255,255,.5);
    -webkit-transition: background-color 200ms ease-out;
    -moz-transition: background-color 200ms ease-out;
    -ms-transition: background-color 200ms ease-out;
    -o-transition: background-color 200ms ease-out;
    transition: background-color 200ms ease-out;
}
.col-cats {
    text-align: justify;
    -moz-text-align-last: right;
    text-align-last: right;
}
.col-cats::after {
    content: '';
    display: inline-table;
    width: 100%;
    height: 0;
    z-index: -999;
}
.col-cat.full {
    width: 100%;
    padding-bottom: 20%;
}
.col-cat.half {
    width: 47.5%;
    padding-bottom: 40%;
}
.col-cat {
    position: relative;
    display: inline-block;
    margin: 0 0 12px 0;
    text-align: left;
    overflow: hidden;
}
.col-cat .cat-title {
    position: absolute;
    z-index: 2;
    font-family: Georgia,Utopia,"Times New Roman",Times,serif;
    font-size: 18px;
    padding: 6px 12px;
}

.build-your-ring-bg-small {
    background: url('//cdn.shopify.com/s/files/1/0773/7929/t/10/assets/banner_byor.jpg?11590209297283401907') no-repeat 50% 50%;
        background-size: auto auto;
    background-size: cover;
}
.engagement-rings-bg-small {
    background: url('//cdn.shopify.com/s/files/1/0773/7929/t/10/assets/engagement-rings-small.gif?11590209297283401907') no-repeat 50% 50%;
        background-size: auto auto;
    background-size: cover;
}
.anniversary-collection-bg-small {
    background: url('//cdn.shopify.com/s/files/1/0773/7929/t/10/assets/anniversary-collection-small.gif?11590209297283401907') no-repeat 50% 50%;
        background-size: auto auto;
    background-size: cover;
}
.bands-for-her-bg-small {
    background: url('//cdn.shopify.com/s/files/1/0773/7929/t/10/assets/bands-for-her-small.gif?11590209297283401907') no-repeat 50% 50%;
        background-size: auto auto;
    background-size: cover;
}
.bands-for-him-bg-small {
    background: url('//cdn.shopify.com/s/files/1/0773/7929/t/10/assets/bands-for-him-small.gif?11590209297283401907') no-repeat 50% 50%;
        background-size: auto auto;
    background-size: cover;
}
.engraving-bg-small {
    background: url('//cdn.shopify.com/s/files/1/0773/7929/t/10/assets/engraving-small.gif?11590209297283401907') no-repeat 50% 50%;
        background-size: auto auto;
    background-size: cover;
}
.concierge-bg-small {
    background: url('//cdn.shopify.com/s/files/1/0773/7929/t/10/assets/wedding-ring-concierge-small.gif?11590209297283401907') no-repeat 50% 50%;
        background-size: auto auto;
    background-size: cover;
}

.build-your-ring-bg-small .cat-title {
    top: 15px;
    left: 15px;
    color: #fff;
}
.engagement-rings-bg-small .cat-title {
    bottom: 15px;
    right: 15px;
    color: #fff;
}
.anniversary-collection-bg-small .cat-title {
    top: 15px;
    right: 15px;
    color: #000;
}
.bands-for-her-bg-small .cat-title {
    top: 15px;
    right: 15px;
    color: #000;
}
.bands-for-him-bg-small .cat-title {
    bottom: 15px;
    left: 15px;
    color: #fff;
}
.engraving-bg-small .cat-title {
    top: 15px;
    left: 15px;
    color: #000;
}
.concierge-bg-small .cat-title {
    top: 25%;
    left: 15px;
    color: #fff;
}
</style>
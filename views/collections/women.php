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
                <li class="sidebar-nav"><a href="#"><b>Women</b></a></li>
                <li class="sidebar-nav"><a href="<?php echo SITE_URL; ?>collections/wedding-bands">Wedding </a></li>
                <li class="sidebar-nav"><a href="<?php echo SITE_URL; ?>collections/featured-jewels">Featured Jewels </a></li>
                <li class="sidebar-nav"><a href="<?php echo SITE_URL; ?>collections/women-wedding-ring-gallery">Rings </a></li>
                <li class="sidebar-nav"><a href="<?php echo SITE_URL; ?>collections/diamond-earring">Earrings </a></li>
                <li class="sidebar-nav"><a href="<?php echo SITE_URL; ?>collections/bracelets">Bracelets </a></li>
                <li class="sidebar-nav"><a href="<?php echo SITE_URL; ?>collections/necklaces">Necklaces </a></li>
                <li class="sidebar-nav"><a href="<?php echo SITE_URL; ?>collections/pendants">Pendants </a></li>
                <li class="sidebar-nav"><a href="<?php echo SITE_URL; ?>collections/pearls">Pearls </a></li>
                <li class="sidebar-nav"><a href="<?php echo SITE_URL; ?>collections/gemstones">Gemstones </a></li>
            </ul>
        </div>

        <div class="col-sm-9">

            <div class="col-cats">
              <a class="col-cat half wedding-bands-bg-small" href="<?php echo SITE_URL; ?>collections/wedding-bands"><div class="black-hover"><span class="cat-title">Weddings</span></div></a>
              <a class="col-cat half featured-jewels-bg-small" href="<?php echo SITE_URL; ?>collections/featured-jewels"><div class="white-hover"><span class="cat-title">Featured Jewels</span></div></a>
              <a class="col-cat half women-wedding-ring-gallery-bg-small" href="<?php echo SITE_URL; ?>collections/women-wedding-ring-gallery"><div class="white-hover"><span class="cat-title">Rings</span></div></a>
              <a class="col-cat half bracelets-bg-small" href="<?php echo SITE_URL; ?>collections/bracelets"><div class="black-hover"><span class="cat-title">Bracelets</span></div></a>
              <a class="col-cat half necklaces-bg-small" href="<?php echo SITE_URL; ?>collections/necklaces"><div class="black-hover"><span class="cat-title">Necklaces</span></div></a>
              <a class="col-cat half pendants-bg-small" href="<?php echo SITE_URL; ?>collections/pendants"><div class="black-hover"><span class="cat-title">Pendants</span></div></a>
              <a class="col-cat half pearls-bg-small" href="<?php echo SITE_URL; ?>collections/pearls"><div class="white-hover"><span class="cat-title">Pearls</span></div></a>
              <a class="col-cat half gemstones-bg-small" href="<?php echo SITE_URL; ?>collections/gemstones"><div class="white-hover"><span class="cat-title">Gemstones</span></div></a>
            </div>

        <?php echo collections_about_row_content(); ?>
        </div>


        <div class="clear"></div>
    </div>
    <br><br>
</div>


<style type="text/css">
.col-cats::after {
    content: '';
    display: inline-table;
    width: 100%;
    height: 0;
    z-index: -999;
}
.col-cats {
    text-align: justify;
    -moz-text-align-last: right;
    text-align-last: right;
}
.col-cat.half {
    width: 47.5%;
    padding-bottom: 40%;
}
.wedding-bands-bg-small {
    background: url('//cdn.shopify.com/s/files/1/0773/7929/t/10/assets/wedding-small.gif?11590209297283401907') no-repeat 50% 50%;
        background-size: auto auto;
    background-size: cover;
}
.featured-jewels-bg-small {
    background: url('//cdn.shopify.com/s/files/1/0773/7929/t/10/assets/featured-jewels-small.gif?11590209297283401907') no-repeat 50% 50%;
        background-size: auto auto;
    background-size: cover;
}
.women-wedding-ring-gallery-bg-small {
    background: url('//cdn.shopify.com/s/files/1/0773/7929/t/10/assets/rings-small.gif?11590209297283401907') no-repeat 50% 50%;
        background-size: auto auto;
    background-size: cover;
}
.bracelets-bg-small {
    background: url('//cdn.shopify.com/s/files/1/0773/7929/t/10/assets/bracelets-small.gif?11590209297283401907') no-repeat 50% 50%;
        background-size: auto auto;
    background-size: cover;
}
.necklaces-bg-small {
    background: url('//cdn.shopify.com/s/files/1/0773/7929/t/10/assets/necklaces-small.gif?11590209297283401907') no-repeat 50% 50%;
        background-size: auto auto;
    background-size: cover;
}
.pendants-bg-small {
    background: url('//cdn.shopify.com/s/files/1/0773/7929/t/10/assets/pendants-small.gif?11590209297283401907') no-repeat 50% 50%;
        background-size: auto auto;
    background-size: cover;
}
.pearls-bg-small {
    background: url('//cdn.shopify.com/s/files/1/0773/7929/t/10/assets/pearls-small.gif?11590209297283401907') no-repeat 50% 50%;
        background-size: auto auto;
    background-size: cover;
}
.gemstones-bg-small {
    background: url('//cdn.shopify.com/s/files/1/0773/7929/t/10/assets/gemstones-small.gif?11590209297283401907') no-repeat 50% 50%;
        background-size: auto auto;
    background-size: cover;
}
.col-cat {
    position: relative;
    display: inline-block;
    margin: 0 0 12px 0;
    text-align: left;
    overflow: hidden;
}
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
.black-hover:hover {

    background: rgba(0,0,0,.5);
    -webkit-transition: background-color 200ms ease-out;
    -moz-transition: background-color 200ms ease-out;
    -ms-transition: background-color 200ms ease-out;
    -o-transition: background-color 200ms ease-out;
    transition: background-color 200ms ease-out;

}
.wedding-bands-bg-small .cat-title {
    top: 15px;
    left: 15px;
    color: #fff;
}
.featured-jewels-bg-small .cat-title {
    bottom: 15px;
    right: 15px;
    color: #2c2c2c;
}
.women-wedding-ring-gallery-bg-small .cat-title {
    top: 40%;
    left: 25px;
    color: #2c2c2c;
}
.bracelets-bg-small .cat-title {
    top: 35%;
    right: 25px;
    color: #fff;
}
.necklaces-bg-small .cat-title {
    bottom: 15px;
    left: 15px;
    color: #fff;
}
.pendants-bg-small .cat-title {
    bottom: 15px;
    right: 15px;
    color: #fff;
}
.pearls-bg-small .cat-title {
    top: 15px;
    right: 15px;
    color: #000;
}
.gemstones-bg-small .cat-title {
    bottom: 25px;
    right: 25px;
    color: #000;
}
.col-cat .cat-title {
    position: absolute;
    z-index: 2;
    font-family: Georgia,Utopia,"Times New Roman",Times,serif;
    font-size: 18px;
    padding: 6px 12px;
}
</style>
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
                <li class="sidebar-nav"><a href="#"><b>Men</b> </a></li>
                <li class=""><a href="<?php echo SITE_URL; ?>collections/mens-rings" title="Rings">Rings</a></li>
                <li class=""><a href="<?php echo SITE_URL; ?>collections/mens-bracelets" title="Bracelets">Bracelets</a></li>
                <li class=""><a href="<?php echo SITE_URL; ?>collections/mens-studs" title="Earrings">Earrings</a></li>
                <li class=""><a href="<?php echo SITE_URL; ?>collections/mens-chains" title="Chains">Chains</a></li>
                <li class=""><a href="<?php echo SITE_URL; ?>collections/cufflinks" title="Cufflinks">Cufflinks</a></li>
            </ul>
        </div>

        <div class="col-sm-9">
            <div class="col-cats">
              <a class="col-cat full mens-featured-collections-bg-small" href="<?php echo SITE_URL; ?>collections/mens-featured-collections"><div class="black-hover"><span class="cat-title">Featured Collection</span></div></a>
              <a class="col-cat half mens-rings-bg-small" href="<?php echo SITE_URL; ?>collections/mens-rings"><div class="white-hover"><span class="cat-title">Men's Rings</span></div></a>
              <a class="col-cat half mens-bracelets-bg-small" href="<?php echo SITE_URL; ?>collections/mens-bracelets"><div class="black-hover"><span class="cat-title">Men's Bracelets</span></div></a>
              <a class="col-cat half mens-studs-bg-small" href="<?php echo SITE_URL; ?>collections/mens-studs"><div class="black-hover"><span class="cat-title">Men's Studs</span></div></a>
              <a class="col-cat half cufflinks-bg-small" href="<?php echo SITE_URL; ?>collections/cufflinks"><div class="white-hover"><span class="cat-title">Cufflinks</span></div></a>
              <a class="col-cat full mens-chains-bg-small" href="<?php echo SITE_URL; ?>collections/mens-chains"><div class="white-hover"><span class="cat-title">Men's Chains</span></div></a>
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
.mens-featured-collections-bg-small {
    background: url('//cdn.shopify.com/s/files/1/0773/7929/t/10/assets/MensCufflinks2.jpg?11590209297283401907') no-repeat 50% 50%;
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
.col-cat.half {
    width: 47.5%;
    padding-bottom: 40%;
}
.mens-rings-bg-small {
    background: url('//cdn.shopify.com/s/files/1/0773/7929/t/10/assets/mens-rings-small.gif?11590209297283401907') no-repeat 50% 50%;
        background-size: auto auto;
    background-size: cover;
}
.mens-bracelets-bg-small {
    background: url('//cdn.shopify.com/s/files/1/0773/7929/t/10/assets/mens-bracelets-small.gif?11590209297283401907') no-repeat 50% 50%;
        background-size: auto auto;
    background-size: cover;
}
.mens-studs-bg-small {
    background: url('//cdn.shopify.com/s/files/1/0773/7929/t/10/assets/mens-studs-small.gif?11590209297283401907') no-repeat 50% 55%;
        background-size: auto auto;
    background-size: cover;
}
.cufflinks-bg-small {
    background: url('//cdn.shopify.com/s/files/1/0773/7929/t/10/assets/cufflinks-small.gif?11590209297283401907') no-repeat 50% 55%;
        background-size: auto auto;
    background-size: cover;
}
.mens-chains-bg-small {
    background: url('//cdn.shopify.com/s/files/1/0773/7929/t/10/assets/mens-chains-small.jpg?11590209297283401907') no-repeat 50% 50%;
        background-size: auto auto;
    background-size: cover;
}




.mens-rings-bg-small .cat-title {
    top: 15px;
    left: 15px;
    color: #000;
}
.mens-bracelets-bg-small .cat-title {
    bottom: 15px;
    left: 15px;
    color: #fff;
}
.mens-studs-bg-small .cat-title {
    bottom: 15px;
    left: 15px;
    color: #fff;
}
.cufflinks-bg-small .cat-title {
    top: 15px;
    right: 15px;
    color: #000;
}
.mens-chains-bg-small .cat-title {
    top: 15px;
    right: 15px;
    color: #000;
}





.mens-featured-collections-bg-small .cat-title {
    top: 15px;
    left: 15px;
    color: #fff;
}
.col-cat .cat-title {
    position: absolute;
    z-index: 2;
    font-family: Georgia,Utopia,"Times New Roman",Times,serif;
    font-size: 18px;
    padding: 6px 12px;
}

</style>
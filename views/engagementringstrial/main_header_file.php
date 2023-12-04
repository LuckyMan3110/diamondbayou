<!-- banner -->
    <div class="agileits_top_menu">
        <div class="w3l_header_left">
            
        </div>
        <div class="w3l_header_left">
            <ul>
                <li><i class="fa fa-phone" aria-hidden="true"></i> 1-866-277-7799</li>
                <li><i class="fa fa-user" aria-hidden="true"></i>
                    <?php
                    if ($this->session->isLoggedin()) {
                        $sign_in = '<a href="'.SITE_URL.'account/signout">LOGOUT</a>';
                    } else {
                        $sign_in = '<a href="'.SITE_URL.'account/membersignin">LOGIN</a>';
                    }
                        echo $sign_in;
                    ?>
                </li>
                <li><i class="fa fa-heart" aria-hidden="true"></i><a href="<?php echo SITE_URL; ?>account/account_wishlist">WISHLIST</a></li>
                <li><i class="fa fa-shopping-bag" aria-hidden="true"></i><a href="<?php echo SITE_URL; ?>shoppingbasket/mybasket">SHOPING CART</a></li>
            </ul>
        </div>
        <div class="clearfix"> </div>
    </div>
    <div class="agileits_w3layouts_banner_nav">
        <nav class="navbar navbar-default">
            <div class="navbar-header navbar-left">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                <h1>
                    <a class="navbar-brand" href="<?php echo SITE_URL; ?>">
                        <img src="<?php echo SITE_URL; ?>images/moijey_images/moijey-logo.png" width="170px">
                    </a>
                </h1>

            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                <nav>
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle hvr-underline-from-center" data-toggle="dropdown">Engagement Rings <b class="fa fa-caret-down"></b></a>
                            <ul class="dropdown-menu agile_short_dropdown">
                                <li><a href="<?php echo SITE_URL?>testengagementrings/engagementrings/52">Solitaire Engagement Rings</a></li>
                                <li><a href="<?php echo SITE_URL?>testengagementrings/engagement_ring_listings/8">Fancy Engagement Rings</a></li>
                                <li><a href="<?php echo SITE_URL?>testengagementrings/engagementrings/56">Three Stone Rings</a></li>
                                <li><a href="<?php echo SITE_URL?>testengagementrings/engagementrings/40">Halo Engagement Rings</a></li>
                                <li><a href="<?php echo SITE_URL?>testengagementrings/engagement_ring_listings/39">Antique Engagement Rings</a></li>
                                <li><a href="<?php echo SITE_URL?>testengagementrings/engagementrings/179">Petite Engagement rings</a></li>
                                <li><a href="<?php echo SITE_URL?>testengagementrings/engagementrings/9">Semi Mount</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="<?php echo SITE_URL; ?>diamonds/search/true" class="dropdown-toggle hvr-underline-from-center">Diamonds <b class="fa fa-caret-down"></b></a>
                            <ul class="dropdown-menu agile_short_dropdown">
                                <li><a href="<?php echo SITE_URL; ?>diamonds/search/true">Diamond Search</a></li>
                                <li><a href="<?php echo SITE_URL?>engagement/search">Build Your Own Earrings</a></li>
                                <li><a href="<?php echo SITE_URL?>jewelry/build-earings">Build Your Own Ring</a></li>
                                <li><a href="<?php echo SITE_URL?>jewelry/buildiamond-pendant">Build Your Own Diamond Pendant</a></li>
                                <li><a href="<?php echo SITE_URL?>jewelry/buildthree-stonesring">Build Your Own Three-Stone Ring</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle hvr-underline-from-center" data-toggle="dropdown">Earings <b class="fa fa-caret-down"></b></a>
                            <ul class="dropdown-menu agile_short_dropdown">
                                <li><a href="<?php echo SITE_URL; ?>stuller_new_rings/diamond_stud_earrings">Diamond Stud Earrings</a></li>
                                <li><a href="<?php echo SITE_URL?>stuller_new_rings/diamond_hoop_earings">Diamond Hoops</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle hvr-underline-from-center" data-toggle="dropdown">Fine Jewelry <b class="fa fa-caret-down"></b></a>
                            <ul class="dropdown-menu agile_short_dropdown">
                                <li><a href="<?php echo SITE_URL; ?>testengagementrings/engagement_ring_listings/192">Fancy Rings</a></li>
                                <li><a href="<?php echo SITE_URL?>testengagementrings/engagement_ring_listings/201">Color Stone Rings</a></li>
                                <li><a href="<?php echo SITE_URL?>testengagementrings/engagementrings/57">Pendants</a></li>
                                <li><a href="<?php echo SITE_URL?>testengagementrings/engagementrings/74">Mens Rings</a></li>
                                <li><a href="<?php echo SITE_URL?>testengagementrings/engagementrings/63">Half Diamond Wedding Band</a></li>
                                <li><a href="<?php echo SITE_URL?>testengagementrings/engagementrings/69">Half Diamond Wedding Band Sets</a></li>
                                <li><a href="<?php echo SITE_URL?>testengagementrings/engagementrings/67">Eternity Wedding Bands</a></li>
                                <li><a href="<?php echo SITE_URL?>jewelry/buildthree-stonesring">Build Your Own Three-Stone Ring</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle hvr-underline-from-center" data-toggle="dropdown">Watches <b class="fa fa-caret-down"></b></a>
                            <ul class="dropdown-menu agile_short_dropdown">
                                <li><a href="<?php echo SITE_URL; ?>rolexrings/rolex_rings_listing">Pre Own Rolex</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle hvr-underline-from-center" data-toggle="dropdown">Women <b class="fa fa-caret-down"></b></a>
                            <ul class="dropdown-menu agile_short_dropdown">
                                <li><a href="<?php echo SITE_URL; ?>collections/wedding-bands" title="Wedding">Wedding</a></li>
                                <li class=""><a href="<?php echo SITE_URL; ?>collections/featured-jewels" title="Featured Jewels">Featured Jewels</a></li>
                                <li class=""><a href="<?php echo SITE_URL; ?>collections/women-wedding-ring-gallery" title="Rings">Rings</a></li>
                                <li class=""><a href="<?php echo SITE_URL; ?>collections/diamond-earring" title="Earrings">Earrings</a></li>
                                <li class=""><a href="<?php echo SITE_URL; ?>collections/bracelets" title="Bracelets">Bracelets</a></li>
                                <li class=""><a href="<?php echo SITE_URL; ?>collections/necklaces" title="Necklaces">Necklaces</a></li>
                                <li class=""><a href="<?php echo SITE_URL; ?>collections/pendants" title="Pendants">Pendants</a></li>
                                <li class=""><a href="<?php echo SITE_URL; ?>collections/pearls" title="Pearls">Pearls</a></li>
                                <li class=""><a href="<?php echo SITE_URL; ?>collections/gemstones" title="Gemstones">Gemstones</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle hvr-underline-from-center" data-toggle="dropdown">Men <b class="fa fa-caret-down"></b></a>
                            <ul class="dropdown-menu agile_short_dropdown">
                                <li class=""><a href="<?php echo SITE_URL; ?>collections/mens-rings" title="Rings">Rings</a></li>
                                <li class=""><a href="<?php echo SITE_URL; ?>collections/mens-bracelets" title="Bracelets">Bracelets</a></li>
                                <li class=""><a href="<?php echo SITE_URL; ?>collections/mens-studs" title="Earrings">Earrings</a></li>
                                <li class=""><a href="<?php echo SITE_URL; ?>collections/mens-chains" title="Chains">Chains</a></li>
                                <li class=""><a href="<?php echo SITE_URL; ?>collections/cufflinks" title="Cufflinks">Cufflinks</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle hvr-underline-from-center" data-toggle="dropdown">Weddings <b class="fa fa-caret-down"></b></a>
                            <ul class="dropdown-menu agile_short_dropdown">
                                <li class=""><a href="http://www.bridalringcreator.com/moijey/?nsp=settingSearch#settingSearch" title="Build Your Ring">Build Your Ring</a></li>
                                <li class=""><a href="<?php echo SITE_URL; ?>collections/engagement-rings" title="Engagement Ring">Engagement Ring</a></li>
                                <li class=""><a href="<?php echo SITE_URL; ?>collections/engagement-ring-under-2-000" title="Engagement Ring Under $2000">Engagement Ring Under $2000</a></li>
                                <li class=""><a href="<?php echo SITE_URL; ?>collections/wedding-bands" title="Bands For Her">Bands For Her</a></li>
                                <li class=""><a href="<?php echo SITE_URL; ?>collections/bands-for-him" title="Bands For Him">Bands For Him</a></li>
                                <li class=""><a href="<?php echo SITE_URL; ?>pages/contact-us" title="Engraving">Engraving</a></li>
                                <li class=""><a href="<?php echo SITE_URL; ?>pages/contact-us" title="Wedding Ring Concierge">Wedding Ring Concierge</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle hvr-underline-from-center" data-toggle="dropdown">Discover Moijey <b class="fa fa-caret-down"></b></a>
                            <ul class="dropdown-menu agile_short_dropdown">
                                <li class=""><a href="<?php echo SITE_URL; ?>pages/newsletter" title="Email Sign-up">Email Sign-up</a></li>
                                <li class=""><a href="<?php echo SITE_URL; ?>pages/the-moijey-philosophy" title="The Moijey Philosophy">The Moijey Philosophy</a></li>
                                <li class=""><a href="<?php echo SITE_URL; ?>pages/newsletter" title="Our Journey">Our Journey</a></li>
                                <li class=""><a href="<?php echo SITE_URL; ?>pages/on-the-red-carpet" title="On The Red Carpet">On The Red Carpet</a></li>
                                <li class=""><a href="<?php echo SITE_URL; ?>pages/in-the-news" title="In The News">In The News</a></li>
                                <li class=""><a href="<?php echo SITE_URL; ?>pages/how-do-you-say-moijey" title="How Do You Say Moijey">How Do You Say Moijey</a></li>
                                <li class=""><a href="<?php echo SITE_URL; ?>pages/contact-us" title="Make an Appointment">Make an Appointment</a></li>
                                <li class=""><a href="<?php echo SITE_URL; ?>blogs/news" title="Blog">Blog</a></li>
                            </ul>
                        </li>
                        <li style="display:none;"><input type="text" placeholder="search"></li>
                    </ul>
                </nav>

            </div>
        </nav>

        <div class="clearfix"> </div>
    </div>
<?php 
if($page){ 
    if($page != 'home'){
        echo setContainer(); //// start cotainer div if page is not test enagement 
    }
}else{
   echo setContainer(); //// end cotainer div here if page is not test engagement     
}     
?> 
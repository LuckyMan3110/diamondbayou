<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <link rel="stylesheet" type="text/css" href="<?php echo config_item('base_url') ?>css/home/style_home.css"/>
        <link href="<?php echo config_item('base_url') ?>slider/js-image-slider.css" rel="stylesheet" type="text/css" />
        <script src="<?php echo config_item('base_url') ?>slider/js-image-slider.js" type="text/javascript"></script>
        <?php echo (isset($meta_tags)) ? $meta_tags : '<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />'; ?>
        <title>Jewelry Cart 1.0® is the leader in diamond jewelry shopping cart technology</title>
<!--        <link type="text/css" href="<?php echo config_item('base_url') ?>css/style.css" rel="stylesheet" />-->
<!--        <link type="text/css" href="<?php echo config_item('base_url') ?>css/tamal.css" rel="stylesheet" />-->
<!--        <link type="text/css" href="<?php echo config_item('base_url') ?>css/tabs.css" rel="stylesheet" /> -->
        <!--[if IE 7]><link rel="stylesheet" type="text/css" href="<?php echo config_item('base_url') ?>css/IE7styles.css" /><![endif]--> 
<!--        <link type="text/css" href="<?php echo config_item('base_url') ?>css/style1.css" rel="stylesheet" />-->
<!--        <link type="text/css" href="<?php echo config_item('base_url') ?>css/reset1.css" rel="stylesheet" />-->
<!--        <link type="text/css" href="<?php echo config_item('base_url') ?>css/ruman.css" rel="stylesheet" />-->
<!--        <link type="text/css" href="<?php echo config_item('base_url') ?>css/header_menu.css" rel="stylesheet" />-->
        <!--[if  IE 8]>
        <link rel="stylesheet" type="text/css"  href=<?php echo config_item('base_url') ?>IE8styles.css"" />
        <![endif]-->
        <script>var base_url = '<?php echo config_item('base_url'); ?>';</script>
        <script src="<?php echo config_item('base_url'); ?>js/jquery.js" type="text/javascript"></script>
        <script src="<?php echo config_item('base_url') ?>js/facebox.js" type="text/javascript"></script>
        <script src="<?php echo config_item('base_url') ?>js/jquery.corner.js" type="text/javascript"></script>
        <script src="<?php echo config_item('base_url') ?>js/function.js" type="text/javascript"></script>
        <script src="<?php echo config_item('base_url') ?>js/t.js" type="text/javascript"></script>
        <script src="<?php echo config_item('base_url') ?>js/r.js" type="text/javascript"></script>
        <style type="text/css">
            @import "css/reset1.css";
            @import "css/home/style_home.css";
        </style>
        <?php echo isset($extraheader) ? $extraheader : ''; ?> 

        <script type="text/javascript" language="javascript">
            jQuery(document).ready(function() {
<?php echo isset($onloadextraheader) ? $onloadextraheader : ''; ?>
        /*jQuery(".roundcorner").corner("round 3px");*/
        closetimer = 0;
        if(jQuery("#mainmenu")) {
            jQuery("#mainmenu b").mouseover(function() {
                clearTimeout(closetimer);
                if(this.className.indexOf("clicked") != -1) {
                    jQuery(this).parent().next().slideUp(300);
                    jQuery(this).removeClass("clicked");
                }
                else {
                    jQuery("#mainmenu b").removeClass();
                    jQuery(this).addClass("clicked");
                    jQuery("#mainmenu ul:visible").slideUp(300);
                    jQuery(this).parent().next().slideDown(300);
                }
                return false;
            });
            jQuery("#mainmenu").mouseover(function() {
                clearTimeout(closetimer);
            });
            jQuery("#mainmenu").mouseout(function() {
                closetimer = window.setTimeout(function(){
                    jQuery("#mainmenu ul:visible").slideUp(300);
                    jQuery("#mainmenu b").removeClass("clicked");
                }, 500);
            }); 
        }
		
        //menuleft js
        jQuery("ul.lst-menu-left").mouseover(function(){
            jQuery(this).find("div.categoryPopout").css("display","block");
        });
        jQuery("ul.lst-menu-left div.categoryPopout").mouseover(function(){
            jQuery(this).parent().addClass("active");
        });
        jQuery("#ul.lst-menu-left").mouseout(function() {
            jQuery(this).find("div.categoryPopout").css("display","none");
        });	
        jQuery("ul.lst-menu-left div.categoryPopout").mouseout(function(){
            jQuery(this).parent().removeClass("active");
        });
		
    });
        </script>


<!--        <link rel="stylesheet" type="text/css" href="<?php echo config_item('base_url') . "css/leftmenu.css"; ?>" >-->

    </head>
    <body>
        <div class="fix main_area">
            <div class="fix main_area" style="padding-top: 0px;">
                <h3 style="display: inline;">
                    <font color="#224774"> Live chat</font>
                </h3>&nbsp;&nbsp;
                <a href="#">
                    <img src="<?php echo config_item('base_url') ?>home_images/phone.png" alt="" style="display: inline;"/>
                </a>&nbsp;&nbsp;
                <h4 style="display: inline;">0000-000000(10 pm-2 pm)</h4>
                <div class="fix header_right">
                    <div class="fix social_bookmarks">
                        <a href="#"><img src="<?php echo config_item('base_url') ?>home_images/message.png" alt=""/></a>
                    </div>
                </div>
                <div class="fix header">						
                    <div class="fix logo">
                        <a href="#"><img src="<?php echo config_item('base_url') ?>home_images/logo.png" alt=""/></a>
                    </div>
                    <div class="fix site_title">
                    </div>
                    <div id="lg-form">
                        <a href="#">SIGN IN</a> / <a href="#">SIGN UP</a>
                    </div>
                    <div class="fix header_right2">		
                        <form id="search-form">
                            <input type="text" value="Keyword"/>
                            <input type="submit" value="Search" />
                        </form>
                    </div>
                </div>
                <div class="fix mainmenu">
                    <ul id="mainmenu">

                        <li class="submainmenu"><a href="<?= config_item('base_url') ?>diamonds/search"><b class="">&nbsp;&nbsp;Diamonds</b></a>


                            <ul style="display: none;  width:270px; font-family: times New Roman;font-size: 21px;font-weight: normal;float:left;color:#FFFFFF;background-color:#000000" class="w1">

                                <li><a href="<?= config_item('base_url') ?>diamonds/search">Diamond Search</a></li>
                                <li><a href="<?= config_item('base_url') ?>jewelry/search">Build Your Diamond Studs</a></li>
                                <li><a href="<?= config_item('base_url') ?>diamonds/premium">Premium Diamonds</a></li>
                                <li><a href="<?= config_item('base_url') ?>education/diamond">Learn About Diamonds</a></li>
                                <li><a href="<?= config_item('base_url') ?>engagement/search">Build the Ring of your Dreams </a></li>
                                <li><a href="<?= config_item('base_url') ?>jewelry/build_three_stone_ring">Build your Three-Stone Ring</a></li>
                                <li><a href="<?= config_item('base_url') ?>jewelry/diamondstudearring">Diamond Stud Earrings</a></li>
                                <li><a href="<?= config_item('base_url') ?>jewelry/build_diamond_pendant">Pendant Builder</a></li>
                            </ul>
                        </li>

                        <li class="sub"><a href="<?= config_item('base_url') ?>engagement">
                                <b class="">Engagement & Wedding</b></a>

                            <ul style="display: none;  width:270px; font-family: times New Roman;font-size: 21px;font-weight: normal;float:left;color:#FFFFFF;background-color:#000000" class="w2">
                                <li><a href="<?= config_item('base_url') ?>engagement/search">Build the Ring of your Dreams </a></li>
                                <li style="display: none;"><a href="<?= config_item('base_url') ?>engagement/search">Build Your Own Ring</a></li>
                                <li><a href="<?= config_item('base_url') ?>engagement/ring">Engagement Ring</a></li>
                                <li><a href="<?= config_item('base_url') ?>diamonds/search">Loose Diamonds</a></li>
                                <li><a href="<?= config_item('base_url') ?>engagement/engagement_product_settings/3">Wedding Bands</a></li>
                                <li><a href="<?= config_item('base_url') ?>engagement/engagement_product_settings/21">Anniversary Bands</a></li>								
                            </ul>
                        </li>

                        <li style="display: none;">
                            <a href="<?= config_item('base_url') ?>engagement/engagement_ring_settings/26527837/addtoring"><b class="">Wedding Rings</b></a>

                            <ul style="display: none; width:200px;" class="w3">
                                <li><a href="<?= config_item('base_url') ?>engagement/engagement_ring_settings/26527837/addtoring">Wedding Rings</a></li>
                                <li><a href="<?= config_item('base_url') ?>engagement/engagement_product_settings/3">Wedding Bands</a></li>

                            </ul>
                        </li>


                        <li><a href="<?= config_item('base_url') ?>engagement/ring"><b class="">Diamond Jewelry</b></a>
                            <ul  class="w3" style="display: none; width:200px;  width:270px; font-family: times New Roman;font-size: 21px;font-weight: normal;float:left;color:#FFFFFF;background-color:#000000">
                                <li style="display: none;><a href="<?= config_item('base_url') ?>engagement/ring">Engagement Ring</a></li>
                                <li style="display: none;><a href="<?= config_item('base_url') ?>jewelry/build_three_stone_ring">Three-Stone Ring</a></li>
                                <li><a href="<?= config_item('base_url') ?>engagement/engagement_product_settings/1">Diamond Bracelets</a></li>		
                                <li><a href="<?= config_item('base_url') ?>engagement/engagement_product_settings/2">Diamond Earrings</a></li>
                                <li><a href="<?= config_item('base_url') ?>jewelry/build_diamond_pendant">Diamond Pendants</a></li>		

                            </ul>
                        </li>

                        <li><a href="<?= config_item('base_url') ?>diamonds/search"><b class="">Other Products</b></a>

                            <ul style="display: none; width:300px;" class="w4">
                                <li><a href="<?= config_item('base_url') ?>engagement/engagement_product_settings/21">Ladies Diamond Band & Eternity</a></li>
                                <li><a href="<?= config_item('base_url') ?>engagement/engagement_product_settings/18">Ladies Diamond Necklaces</a></li>
                                <li><a href="<?= config_item('base_url') ?>engagement/engagement_product_settings/9">Diamond Cross</a></li>
                                <li><a href="<?= config_item('base_url') ?>engagement/engagement_product_settings/8">Gemstones</a></li>
                                <li><a href="<?= config_item('base_url') ?>engagement/engagement_product_settings/7">Diamond Earrings</a></li>
                                <li><a href="<?= config_item('base_url') ?>engagement/engagement_product_settings/6">Ladies Diamond Bracelets</a></li>
                                <li><a href="<?= config_item('base_url') ?>engagement/engagement_product_settings/5">Diamond Solitaire Pendants</a></li>
                                <li><a href="<?= config_item('base_url') ?>engagement/engagement_product_settings/4">Diamond Pendants</a></li>
                                <li><a href="<?= config_item('base_url') ?>engagement/engagement_product_settings/3">Mens Diamond Bands</a></li>
                                <li><a href="<?= config_item('base_url') ?>engagement/engagement_product_settings/2">Semi Mounts</a></li>
                                <li><a href="<?= config_item('base_url') ?>engagement/engagement_product_settings/13">Semi Mounts Yellow Gold</a></li>
                                <li><a href="<?= config_item('base_url') ?>engagement/engagement_product_settings/12">Semi Mounts White Gold</a></li>
                                <li><a href="<?= config_item('base_url') ?>engagement/engagement_product_settings/15">Mens Diamond Bands Yellow Gold</a></li>
                                <li><a href="<?= config_item('base_url') ?>engagement/engagement_product_settings/14">Mens Diamond Bands White Gold</a></li>
                                <li><a href="<?= config_item('base_url') ?>engagement/engagement_product_settings/17">Princess Diamond Solitaires</a></li>
                                <li><a href="<?= config_item('base_url') ?>engagement/engagement_product_settings/16">Round Diamond Solitaires</a></li>
                                <li><a href="<?= config_item('base_url') ?>engagement/engagement_product_settings/27">Diamond & Ruby Gems</a></li>
                                <li><a href="<?= config_item('base_url') ?>engagement/engagement_product_settings/26">Diamond & Blue Sapphire Gems</a></li>
                                <li><a href="<?= config_item('base_url') ?>engagement/engagement_product_settings/29">Diamond Cross Yellow Gold</a></li>
                                <li><a href="<?= config_item('base_url') ?>engagement/engagement_product_settings/28">Diamond Cross White Gold</a></li>
                                <li><a href="<?= config_item('base_url') ?>engagement/engagement_product_settings/19">Ladies Diamond Necklaces Yellow Gold</a></li>
                                <li><a href="<?= config_item('base_url') ?>engagement/engagement_product_settings/20">Ladies Diamond Necklaces White Gold</a></li>
                                <li><a href="<?= config_item('base_url') ?>engagement/engagement_product_settings/31">Ladies Diamond Band 10KT GOLD</a></li>
                                <li><a href="<?= config_item('base_url') ?>engagement/engagement_product_settings/24">Ladies Diamond Band Platinum</a></li>
                                <li><a href="<?= config_item('base_url') ?>engagement/engagement_product_settings/23">Ladies Diamond Band 18ct Gold</a></li>
                                <li><a href="<?= config_item('base_url') ?>engagement/engagement_product_settings/22">Ladies Diamond Band 14ct Gold</a></li>

                            </ul>
                        </li>


                        <li style="display:none">
                            <a href="<?= config_item('base_url') ?>account/signin"><b class="">Your Account</b></a>
                        </li>
                    </ul>
                    <ul>
                        <li><a href="#">DIAMOND</a></li>
                        <li><a href="#">JEWELERY</a></li>
                        <li><a href="#">ENGAGEMENT RINGeaching</a></li>
                        <li><a href="#">WEDDING BAND</a></li>
                        <li><a href="#">EDUCATION</a></li>
                        <li><a href="#">CONVERSATION</a></li>
                    </ul>     				
                </div>
                <div class="fix slider">
                    <div id="sliderFrame">
                        <div id="slider">
                            <a href="#"><img src="<?php echo config_item('base_url') ?>home_images/s/slider.jpg" alt="Welcome to Menucool.com" /></a>
                            <a href="#"><img src="<?php echo config_item('base_url') ?>home_images/s/image-slider-2.jpg" alt="Sample Text" /></a>
                            <a href="#"><img src="<?php echo config_item('base_url') ?>home_images/s/image-slider-3.jpg" alt="Sample Text" /></a>
                        </div>
                    </div>
                </div>
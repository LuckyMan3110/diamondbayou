<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <link rel="stylesheet" type="text/css" href="<?php echo config_item('base_url') ?>css/home/style_home.css"/>
        <link href="<?php echo config_item('base_url') ?>slider/js-image-slider.css" rel="stylesheet" type="text/css" />
        <script src="<?php echo config_item('base_url') ?>slider/js-image-slider.js" type="text/javascript"></script>
        <?php echo (isset($meta_tags)) ? $meta_tags : '<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />'; ?>
        <title>Jewelry Cart 1.0® is the leader in diamond jewelry shopping cart technology</title>
        <link type="text/css" href="<?php echo config_item('base_url') ?>css/style.css" rel="stylesheet" />
        <link type="text/css" href="<?php echo config_item('base_url') ?>css/tamal.css" rel="stylesheet" />
        <link type="text/css" href="<?php echo config_item('base_url') ?>css/tabs.css" rel="stylesheet" /> 
        <!--[if IE 7]><link rel="stylesheet" type="text/css" href="<?php echo config_item('base_url') ?>css/IE7styles.css" /><![endif]--> 
        <link type="text/css" href="<?php echo config_item('base_url') ?>css/style1.css" rel="stylesheet" />
        <link type="text/css" href="<?php echo config_item('base_url') ?>css/reset1.css" rel="stylesheet" />
        <link type="text/css" href="<?php echo config_item('base_url') ?>css/ruman.css" rel="stylesheet" />
        <link type="text/css" href="<?php echo config_item('base_url') ?>css/header_menu.css" rel="stylesheet" />
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
                    <img src="<?php echo config_item('base_url') ?>home_images/phone.png" alt="phone" style="display: inline;"/>
                </a>&nbsp;&nbsp;
                <h4 style="display: inline;">0000-000000(10 pm-2 pm)</h4>
                <div class="fix header_right">
                    <div class="fix social_bookmarks">
                        <a href="#"><img src="<?php echo config_item('base_url') ?>home_images/message.png" alt="message"/></a>
                    </div>
                </div>
                <div class="fix header">						
                    <div class="fix logo">
                        <a href="#"><img src="<?php echo config_item('base_url') ?>home_images/logo.png" alt="logo"/></a>
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
                    <div id="header_menu">
                        <div class="inner">

                            <nav class="main" style="clear:both;">
                                <ul>
                                    <li class="bridal"><a href="<?php echo config_item('base_url') ?>">HOME</a></li>
                                    <li class="bridal">
                                        <a href="<?php echo config_item('base_url') ?>jewelleries/index/M/">MEN's</a>

                                        <div id="drop-bridal" class="drop" style="width:720px;bottom:-315px;height:310px;">  
                                            <div class="clearfix"></div>
                                            <div style="width:auto;">
                                                <?php
                                                $statement = "select * from `dev_ebaycategories` where parent_id = '3291859018'  ";
                                                $query = $this->db->query($statement);
                                                $results = $query->result_array();
                                                for ($i = 0; $i < count($results); $i++) {
                                                    ?>
                                                    <div class="vertBar" style="width:auto;">

                                                        <div class="cols">

                                                            <ul >
                                                                <?php
                                                                if ($results[$i]["category_name"] == "Rings") {
                                                                    $pid = "3291875018";
                                                                } else if ($results[$i]["category_name"] == "Earrings") {
                                                                    $pid = "3291962018";
                                                                } else if ($results[$i]["category_name"] == "Pendants") {
                                                                    $pid = "3292498018";
                                                                } else if ($results[$i]["category_name"] == "Bracelets") {
                                                                    $pid = "3292560018";
                                                                } else if ($results[$i]["category_name"] == "Earrings") {
                                                                    $pid = "3292577018";
                                                                } else if ($results[$i]["category_name"] == "Shamballa") {
                                                                    $pid = "3709041018";
                                                                }
                                                                ?>
                                                                <li class="title"><a href="<?php echo config_item('base_url') ?>jewelleries/index/M/<?php echo $pid; ?>/"><?php echo $results[$i]["category_name"]; ?></a></li>
                                                                <?php
                                                                $state = "select * from `dev_ebaycategories` where parent_id = '" . $pid . "'  ";
                                                                $qu = $this->db->query($state);
                                                                $result = $qu->result_array();
                                                                for ($j = 0; $j < count($result); $j++) {
                                                                    ?>
                                                                    <li><a href="<?php echo config_item('base_url') ?>jewelleries/index/M/<?php echo $pid; ?>/<?php echo $result[$j]["category_id"]; ?>/none/none/none"><?php echo $result[$j]["category_name"]; ?></a></li>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                                ?>

                                            </div>
                                        </div>				  
                                    </li>

                                    <li class="bridal">
                                        <a href="<?php echo config_item('base_url') ?>jewelleries/index/F/">WOMENS</a>

                                        <div id="drop-bridal" class="drop" style="width:720px;bottom:-315px;height:310px;">  
                                            <div class="clearfix"></div>
                                            <div style="width:auto;">
                                                <?php
                                                $statement = "select * from `dev_ebaycategories` where parent_id = '3292596018'  ";
                                                $query = $this->db->query($statement);
                                                $results = $query->result_array();
                                                for ($i = 0; $i < count($results); $i++) {
                                                    ?>
                                                    <div class="vertBar" style="width:auto;">

                                                        <div class="cols">

                                                            <ul >
                                                                <?php
                                                                if ($results[$i]["category_name"] == "Rings") {
                                                                    $pid = "3292598018";
                                                                } else if ($results[$i]["category_name"] == "Earrings") {
                                                                    $pid = "3292601018";
                                                                } else if ($results[$i]["category_name"] == "Pendants") {
                                                                    $pid = "3292603018";
                                                                } else if ($results[$i]["category_name"] == "Necklaces") {
                                                                    $pid = "3292605018";
                                                                } else if ($results[$i]["category_name"] == "Braclets") {
                                                                    $pid = "3292607018";
                                                                } else if ($results[$i]["category_name"] == "Shamballa") {
                                                                    $pid = "3709172018";
                                                                }
                                                                ?>
                                                                <li class="title"><a href="<?php echo config_item('base_url') ?>jewelleries/index/F/<?php echo $pid; ?>/"><?php echo $results[$i]["category_name"]; ?></a></li>
                                                                <?php
                                                                $state = "select * from `dev_ebaycategories` where parent_id = '" . $pid . "'  ";
                                                                $qu = $this->db->query($state);
                                                                $result = $qu->result_array();
                                                                for ($j = 0; $j < count($result); $j++) {
                                                                    ?>
                                                                    <li><a href="<?php echo config_item('base_url') ?>jewelleries/index/F/<?php echo $pid; ?>/<?php echo $result[$j]["category_id"]; ?>/none/none/none"><?php echo $result[$j]["category_name"]; ?></a></li>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                                ?>

                                            </div>
                                        </div>				  
                                    </li>

                                    <li class="bridal">
                                        <a href="<?php echo config_item('base_url') ?>jewelleries/index/C/">CHILDREN</a>

                                        <div id="drop-bridal" class="drop" style="width:720px;bottom:-315px;height:310px;">  
                                            <div class="clearfix"></div>
                                            <div style="width:auto;">
                                                <?php
                                                $statement = "select * from `dev_ebaycategories` where parent_id = '3291859019'  ";
                                                $query = $this->db->query($statement);
                                                $results = $query->result_array();
                                                for ($i = 0; $i < count($results); $i++) {
                                                    ?>
                                                    <div class="vertBar" style="width:auto;">

                                                        <div class="cols">

                                                            <ul >
                                                                <?php
                                                                if ($results[$i]["category_name"] == "Jwellary") {
                                                                    $pid = "3291859021";
                                                                } else if ($results[$i]["category_name"] == "Jewelry testing21") {
                                                                    $pid = "3291859020";
                                                                } else if ($results[$i]["category_name"] == "Gift") {
                                                                    $pid = "3291859022";
                                                                }
                                                                ?>
                                                                <li class="title"><a href="<?php echo config_item('base_url') ?>jewelleries/index/C/<?php echo $pid; ?>/"><?php echo $results[$i]["category_name"]; ?></a></li>
                                                                <?php
                                                                $state = "select * from `dev_ebaycategories` where parent_id = '" . $pid . "'  ";
                                                                $qu = $this->db->query($state);
                                                                $result = $qu->result_array();
                                                                for ($j = 0; $j < count($result); $j++) {
                                                                    ?>
                                                                    <li><a href="<?php echo config_item('base_url') ?>jewelleries/index/C/<?php echo $pid; ?>/<?php echo $result[$j]["category_id"]; ?>/none/none/none"><?php echo $result[$j]["category_name"]; ?></a></li>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                                ?>

                                            </div>
                                        </div>				  
                                    </li>


                                    <li class="ladies">
                                        <a href="<?php echo config_item('base_url') ?>jewelleries/index/U/">UNISEX</a>
                                        <div id="drop-bridal" class="drop" style="width:720px;bottom:-315px;height:310px;">  
                                            <div class="clearfix"></div>
                                            <div style="width:auto;">
                                                <?php
                                                $statement = "select * from `dev_ebaycategories` where parent_id = '3291859018'  ";
                                                $query = $this->db->query($statement);
                                                $results = $query->result_array();
                                                for ($i = 0; $i < count($results); $i++) {
                                                    ?>
                                                    <div class="vertBar" style="width:auto;">
                                                        <!--<div class="ddroptitle">Rings</div>-->
                                                        <div class="cols">

                                                            <ul>
                                                                <?php
                                                                if ($results[$i]["category_name"] == "Rings") {
                                                                    $pid = "3291875018";
                                                                } else if ($results[$i]["category_name"] == "Chains") {
                                                                    $pid = "3291962018";
                                                                } else if ($results[$i]["category_name"] == "Pendants") {
                                                                    $pid = "3292498018";
                                                                } else if ($results[$i]["category_name"] == "Bracelets") {
                                                                    $pid = "3292560018";
                                                                } else if ($results[$i]["category_name"] == "Earrings") {
                                                                    $pid = "3292577018";
                                                                } else if ($results[$i]["category_name"] == "Shamballa") {
                                                                    $pid = "3709041018";
                                                                }
                                                                ?>
                                                                <li class="title"><a href="<?php echo config_item('base_url') ?>jewelleries/index/U/<?php echo $pid; ?>/"><?php echo $results[$i]["category_name"]; ?></a></li>
                                                                <?php
                                                                $state = "select * from `dev_ebaycategories` where parent_id = '" . $pid . "'  ";
                                                                $qu = $this->db->query($state);
                                                                $result = $qu->result_array();
                                                                for ($j = 0; $j < count($result); $j++) {
                                                                    ?>
                                                                    <li><a href="<?php echo config_item('base_url') ?>jewelleries/index/U/<?php echo $pid; ?>/<?php echo $result[$j]["category_id"]; ?>/none/none/none"><?php echo str_replace('Men', 'Unisex', $result[$j]["category_name"]); ?></a></li>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                                <!--<div class="container" style="width:350px; float:right;">
                                                 <div class="menbr" style="width:185px;float:left; margin-left:-30px;">
                                                        <div class="clearfix"></div>
                                                        <div class="ddroptitle">MEN'S BANDS</div>
                                                        <div>
                                                        <ul class="edge">
                                                          <li class="title">Platinum, Palladium, Gold</li>
                                                          <li class="Jav"><a href="#">Javlin</a></li>
                                                          <li><a href="#">Gothic</a></li>
                                                          <li><a href="#">Sparta</a></li>
                                                          <li><a href="#">Vintage</a></li>
                                                          <li><a href="#">Rope</a></li>
                                                          <li><a href="#">Equestrian</a></li>
                                                          <li><a style="margin-top:15px; *margin-top:3px;" href="#">VIEW ALL</a></li>
                                                        </ul>
                                                        </div>
                                                        </div>
                                                        <div style="width:180px; float:right;">
                                                        <ul class="cobalt">
                                                                <li class="title sk-cobalt">SK Cobalt</li>
                                                                  <li class="prime"><a href="#">Prime</a></li>
                                                                  <li><a href="#">Unity</a></li>
                                                                  <li><a href="#">Century</a></li>
                                                                  <li><a href="#">Code</a></li>
                                                                  <li><a href="#">Devout</a></li>
                                                                  <li><a href="#">Native</a></li>
                                                                  <li><a href="#">Braid</a></li>
                                                                  <li><a href="#">Troy</a></li>
                                                                  <li><a style="margin-top:15px; *margin-top:3px;" href="#">VIEW ALL</a></li>
                                                        </ul>
                                                        </div>
                                                </div>-->

                                            </div>
                                        </div>
                                    </li>


                                    <li class="mens">
                                        <a href="<?php echo config_item('base_url') ?>jewelleries/index/D/">DESIGNERS</strong></a>
                                        <div id="drop-bridal" class="drop" style="width:720px;bottom:-315px;height:310px;">  
                                            <div class="clearfix"></div>
                                            <div style="width:auto;">
                                                <?php
                                                $statement = "select * from `dev_ebaycategories` where parent_id = '3291859041'  ";
                                                $query = $this->db->query($statement);
                                                $results = $query->result_array();
                                                for ($i = 0; $i < count($results); $i++) {
                                                    ?>
                                                    <div class="vertBar" style="width:auto;">

                                                        <div class="cols">

                                                            <ul>
                                                                <?php
                                                                if ($results[$i]["category_name"] == "Rings") {
                                                                    $pid = "3291859042";
                                                                } else if ($results[$i]["category_name"] == "Chains") {
                                                                    $pid = "3291859043";
                                                                } else if ($results[$i]["category_name"] == "Pendants") {
                                                                    $pid = "3291859044";
                                                                } else if ($results[$i]["category_name"] == "Bracelets") {
                                                                    $pid = "3291859045";
                                                                } else if ($results[$i]["category_name"] == "Earrings") {
                                                                    $pid = "3291859046";
                                                                } else if ($results[$i]["category_name"] == "Shamballa") {
                                                                    $pid = "3291859047";
                                                                }
                                                                ?>
                                                                <li class="title"><a href="<?php echo config_item('base_url') ?>jewelleries/index/D/<?php echo $pid; ?>/"><?php echo $results[$i]["category_name"]; ?></a></li>
                                                                <?php
                                                                $state = "select * from `dev_ebaycategories` where parent_id = '" . $pid . "'  ";
                                                                $qu = $this->db->query($state);
                                                                $result = $qu->result_array();
                                                                for ($j = 0; $j < count($result); $j++) {
                                                                    ?>
                                                                    <li><a href="<?php echo config_item('base_url') ?>jewelleries/index/D/<?php echo $pid; ?>/<?php echo $result[$j]["category_id"]; ?>/none/none/none"><?php echo $result[$j]["category_name"]; ?></a></li>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                                ?>

                                            </div>
                                        </div>
                                    </li>


                                    <li class="retailer">
                                        <a href="<?php echo config_item('base_url') ?>jewelleries/index/CG/">COLORGEMSTONES</a>
                                        <div id="drop-bridal" class="drop" style="width:720px;bottom:-315px;height:310px;left:-39px;">  
                                            <div class="clearfix"></div>
                                            <div style="width:auto;">
                                                <?php
                                                $statement = "select * from `dev_ebaycategories` where parent_id = '3291859090'  ";
                                                $query = $this->db->query($statement);
                                                $results = $query->result_array();
                                                for ($i = 0; $i < count($results); $i++) {
                                                    ?>
                                                    <div class="vertBar" style="width:auto;">

                                                        <div class="cols">

                                                            <ul>

                                                                <?php
                                                                if ($results[$i]["category_name"] == "Emerald") {
                                                                    $pid = "3291859200";
                                                                } else if ($results[$i]["category_name"] == "Sapphire") {
                                                                    $pid = "3291859201";
                                                                } else if ($results[$i]["category_name"] == "Aquamarine") {
                                                                    $pid = "3291859202";
                                                                } else if ($results[$i]["category_name"] == "Citrine") {
                                                                    $pid = "3291859203";
                                                                } else if ($results[$i]["category_name"] == "Garnet") {
                                                                    $pid = "3291859204";
                                                                } else if ($results[$i]["category_name"] == "Peridot") {
                                                                    $pid = "3291859205";
                                                                } else if ($results[$i]["category_name"] == "Topaz") {
                                                                    $pid = "3291859206";
                                                                } else if ($results[$i]["category_name"] == "Pearl") {
                                                                    $pid = "32918592006";
                                                                } else if ($results[$i]["category_name"] == "Ruby") {
                                                                    $pid = "3291859207";
                                                                } else if ($results[$i]["category_name"] == "Cubic Zirconia") {
                                                                    $pid = "3291859208";
                                                                } else if ($results[$i]["category_name"] == "Tanzanite") {
                                                                    $pid = "3291859209";
                                                                } else if ($results[$i]["category_name"] == "Amethyst") {
                                                                    $pid = "3291859210";
                                                                } else if ($results[$i]["category_name"] == "Others") {
                                                                    $pid = "3291859211";
                                                                }
                                                                ?>
                                                                <li class="title"><a href="<?php echo config_item('base_url') ?>jewelleries/index/CG/<?php echo $pid; ?>/"><?php echo $results[$i]["category_name"]; ?></a></li>
                                                                <?php
                                                                $state = "select * from `dev_ebaycategories` where parent_id = '" . $pid . "'  ";
                                                                $qu = $this->db->query($state);
                                                                $result = $qu->result_array();
                                                                for ($j = 0; $j < count($result); $j++) {
                                                                    ?>
                                                                    <li><a href="<?php echo config_item('base_url') ?>jewelleries/index/CG/<?php echo $pid; ?>/<?php echo $result[$j]["category_id"]; ?>/none/none/none"><?php echo $result[$j]["category_name"]; ?></a></li>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                                ?>


                                            </div>
                                        </div>
                                    </li>


                                    <li class="bridal">
                                        <a href="<?php echo config_item('base_url') ?>jewelleries/index/E/">ESTATE</a>

                                        <div id="drop-bridal" class="drop" style="width:720px;bottom:-315px;height:310px;left:-155px">  
                                            <div class="clearfix"></div>
                                            <div style="width:auto;">
                                                <?php
                                                $statement = "select * from `dev_ebaycategories` where parent_id = '3291859023'  ";
                                                $query = $this->db->query($statement);
                                                $results = $query->result_array();
                                                for ($i = 0; $i < count($results); $i++) {
                                                    ?>
                                                    <div class="vertBar" style="width:auto;">

                                                        <div class="cols">

                                                            <ul >
                                                                <?php
                                                                if ($results[$i]["category_name"] == "Rings") {
                                                                    $pid = "3291859024";
                                                                } else if ($results[$i]["category_name"] == "Chains") {
                                                                    $pid = "3291859025";
                                                                } else if ($results[$i]["category_name"] == "Pendants") {
                                                                    $pid = "3291859026";
                                                                } else if ($results[$i]["category_name"] == "Bracelets") {
                                                                    $pid = "3291859027";
                                                                } else if ($results[$i]["category_name"] == "Earrings") {
                                                                    $pid = "3291859028";
                                                                } else if ($results[$i]["category_name"] == "Shamballa") {
                                                                    $pid = "3291859029";
                                                                }
                                                                ?>
                                                                <li class="title"><a href="<?php echo config_item('base_url') ?>jewelleries/index/E/<?php echo $pid; ?>/"><?php echo $results[$i]["category_name"]; ?></a></li>
                                                                <?php
                                                                $state = "select * from `dev_ebaycategories` where parent_id = '" . $pid . "'  ";
                                                                $qu = $this->db->query($state);
                                                                $result = $qu->result_array();

                                                                for ($j = 0; $j < count($result); $j++) {
                                                                    ?>
                                                                    <li><a href="<?php echo config_item('base_url') ?>jewelleries/index/E/<?php echo $pid; ?>/<?php echo $result[$j]["category_id"]; ?>/none/none/none"><?php echo $result[$j]["category_name"]; ?></a></li>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                                ?>

                                            </div>
                                        </div>				  
                                    </li>

                                    <li class="bridal">
                                        <a href="<?php echo config_item('base_url') ?>jewelleries/index/CH/">CHARMS</a>

                                        <div id="drop-bridal" class="drop" style="width:290px;bottom:-315px;height:310px;left:-170px">  
                                            <div class="clearfix"></div>
                                            <div style="width:auto;">
                                                <?php
                                                $statement = "select * from `dev_ebaycategories` where parent_id = '3291859060'  ";
                                                $query = $this->db->query($statement);
                                                $results = $query->result_array();
                                                for ($i = 0; $i < count($results); $i++) {
                                                    ?>
                                                    <div class="vertBar" style="width:auto;">

                                                        <div class="cols">

                                                            <ul >
                                                                <?php
                                                                ?>
                                                                <li class="title"><a href="<?php echo config_item('base_url') ?>jewelleries/index/M/<?php echo $pid; ?>/"><?php echo $results[$i]["category_name"]; ?></a></li>
                                                                <?php
                                                                $state = "select * from `dev_ebaycategories` where parent_id = '" . $pid . "'  ";
                                                                $qu = $this->db->query($state);
                                                                $result = $qu->result_array();
                                                                for ($j = 0; $j < count($result); $j++) {
                                                                    ?>
                                                                    <li><a href="<?php echo config_item('base_url') ?>jewelleries/index/M/<?php echo $pid; ?>/<?php echo $result[$j]["category_id"]; ?>/none/none/none"><?php echo $result[$j]["category_name"]; ?></a></li>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                                ?>

                                            </div>
                                        </div>				  
                                    </li>

                                    <li class="bridal">
                                        <a href="<?php echo config_item('base_url') ?>jewelleries/index/CH/">RELIGIOUS</a>

                                        <div id="drop-bridal" class="drop" style="width:330px;bottom:-315px;height:310px;left:-170px">  
                                            <div class="clearfix"></div>
                                            <div style="width:auto;">
                                                <?php
                                                $statement = "select * from `dev_ebaycategories` where parent_id = '3291859050'  ";
                                                $query = $this->db->query($statement);
                                                $results = $query->result_array();
                                                for ($i = 0; $i < count($results); $i++) {
                                                    ?>
                                                    <div class="vertBar" style="width:auto;">

                                                        <div class="cols">

                                                            <ul >
                                                                <?php
                                                                if ($results[$i]["category_name"] == "Gold") {
                                                                    $pid = "3291859051";
                                                                } else if ($results[$i]["category_name"] == "Silver") {
                                                                    $pid = "3291859052";
                                                                }
                                                                ?>
                                                                <li class="title"><a href="<?php echo config_item('base_url') ?>jewelleries/index/M/<?php echo $pid; ?>/"><?php echo $results[$i]["category_name"]; ?></a></li>
                                                                <?php
                                                                $state = "select * from `dev_ebaycategories` where parent_id = '" . $pid . "'  ";
                                                                $qu = $this->db->query($state);
                                                                $result = $qu->result_array();
                                                                for ($j = 0; $j < count($result); $j++) {
                                                                    ?>
                                                                    <li><a href="<?php echo config_item('base_url') ?>jewelleries/index/M/<?php echo $pid; ?>/<?php echo $result[$j]["category_id"]; ?>/none/none/none"><?php echo $result[$j]["category_name"]; ?></a></li>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                                ?>

                                            </div>
                                        </div>				  
                                    </li>

                                    <li class="bridal">
                                        <a href="<?php echo config_item('base_url') ?>jewelleries/index/CL/">CLEARANCE</a>

                                        <div id="drop-bridal" class="drop" style="width:720px;bottom:-315px;height:310px;left:-365px">  
                                            <div class="clearfix"></div>
                                            <div style="width:auto;">
                                                <?php
                                                $statement = "select * from `dev_ebaycategories` where parent_id = '3291859070'  ";
                                                $query = $this->db->query($statement);
                                                $results = $query->result_array();
                                                for ($i = 0; $i < count($results); $i++) {
                                                    ?>
                                                    <div class="vertBar" style="width:auto;">

                                                        <div class="cols">

                                                            <ul >
                                                                <?php
                                                                if ($results[$i]["category_name"] == "Earrings") {
                                                                    $pid = "3291859071";
                                                                } else if ($results[$i]["category_name"] == "Pendants") {
                                                                    $pid = "3291859071";
                                                                } else if ($results[$i]["category_name"] == "Necklaces") {
                                                                    $pid = "3291859073";
                                                                } else if ($results[$i]["category_name"] == "Rings") {
                                                                    $pid = "3291859074";
                                                                } else if ($results[$i]["category_name"] == "Bracelets") {
                                                                    $pid = "3291859075";
                                                                } else if ($results[$i]["category_name"] == "Watches") {
                                                                    $pid = "3291859076";
                                                                } else if ($results[$i]["category_name"] == "Others") {
                                                                    $pid = "3291859076";
                                                                }
                                                                ?>
                                                                <li class="title"><a href="<?php echo config_item('base_url') ?>jewelleries/index/CL/<?php echo $pid; ?>/"><?php echo $results[$i]["category_name"]; ?></a></li>
                                                                <?php
                                                                $state = "select * from `dev_ebaycategories` where parent_id = '" . $pid . "'  ";
                                                                $qu = $this->db->query($state);
                                                                $result = $qu->result_array();
                                                                for ($j = 0; $j < count($result); $j++) {
                                                                    ?>
                                                                    <li><a href="<?php echo config_item('base_url') ?>jewelleries/index/CL/<?php echo $pid; ?>/<?php echo $result[$j]["category_id"]; ?>/none/none/none"><?php echo $result[$j]["category_name"]; ?></a></li>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                                ?>

                                            </div>
                                        </div>				  
                                    </li>
                                </ul>
                                <div  class="clear"></div>
                            </nav> 

                        </div>
                    </div>
                    <!--                    <ul>
                                            <li><a href="#">DIAMOND</a></li>
                                            <li><a href="#">JEWELERY</a></li>
                                            <li><a href="#">ENGAGEMENT RINGeaching</a></li>
                                            <li><a href="#">WEDDING BAND</a></li>
                                            <li><a href="#">EDUCATION</a></li>
                                            <li><a href="#">CONVERSATION</a></li>
                                        </ul>     				-->
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
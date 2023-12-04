<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php echo (isset($meta_tags)) ? $meta_tags : '<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />';?>
<title><?php echo isset($title) ? $title : config_item('site_name'); ?></title>

<link type="text/css" href="<?php echo config_item('base_url') ?>css/style.css" rel="stylesheet" />
<link type="text/css" href="<?php echo config_item('base_url') ?>css/tamal.css" rel="stylesheet" />
<link type="text/css" href="<?php echo config_item('base_url') ?>css/ruman.css" rel="stylesheet" />
<link type="text/css" href="<?php echo config_item('base_url')?>css/tabs.css" rel="stylesheet" /> 
<script>var base_url = '<?php echo config_item('base_url');?>';</script>
<script src="<?php echo config_item('base_url');?>js/jquery.js" type="text/javascript"></script>
<script src="<?php echo config_item('base_url') ?>js/facebox.js" type="text/javascript"></script>
<script src="<?php echo config_item('base_url')?>js/jquery.corner.js" type="text/javascript"></script>
<script src="<?php echo config_item('base_url')?>js/function.js" type="text/javascript"></script>
<script src="<?php echo config_item('base_url')?>js/t.js" type="text/javascript"></script>
<script src="<?php echo config_item('base_url')?>js/r.js" type="text/javascript"></script>

 
<?php echo isset($extraheader) ? $extraheader : '';?> 
<script>jQuery(document).ready(function() {
 <?php echo isset($onloadextraheader) ? $onloadextraheader : '';?>
  $(".roundcorner").corner("round 3px");
  closetimer = 0;if($("#mainmenu")) {
		$("#mainmenu b").mouseover(function() {
		clearTimeout(closetimer);
			if(this.className.indexOf("clicked") != -1) {
				$(this).parent().next().slideUp(300);
				$(this).removeClass("clicked");
			}
			else {
				$("#mainmenu b").removeClass();
				$(this).addClass("clicked");
				$("#mainmenu ul:visible").slideUp(300);
				$(this).parent().next().slideDown(300);
			}
			return false;
		});
		$("#mainmenu").mouseover(function() {
		clearTimeout(closetimer);
		});
		$("#mainmenu").mouseout(function() {
			closetimer = window.setTimeout(function(){
			$("#mainmenu ul:visible").slideUp(300);
			$("#mainmenu b").removeClass("clicked");
			}, 500);
		}); 
	}
  
});


</script>
</head>
<body> 
<?php if(isset($usetips)){?>
<script type="text/javascript" src="<?php echo config_item('base_url'); ?>third_party/dhtmltooltips/wz_tooltip.js"></script>
<script type="text/javascript" src="<?php echo config_item('base_url'); ?>third_party/dhtmltooltips/tip_balloon.js"></script>
<script type="text/javascript" src="<?php echo config_item('base_url'); ?>third_party/dhtmltooltips/tip_centerwindow.js"></script>
<script type="text/javascript" src="<?php echo config_item('base_url'); ?>third_party/dhtmltooltips/tip_followscroll.js"></script>
<?php }?>
<div class="mcontent center w950px">
    <table width="1004" border="0" cellspacing="0" cellpadding="0" align="center">
      <tr>
      <!--header starts-->
        <td class="header_bg">
        <div class="header_top"></div>
        <div id="logo"><a href="index.php"><img src="<?php echo config_item('base_url'); ?>images/newtemp/header_logo.jpg" border="0" /></a></div>
                    <div id="log_in"><a href="#">Log in</a></div>
                    <div id="Shoping_cart"><a href="#">Shoping Cart</a></div> 
                     <div id="search_left"></div>
                        <div id="search_middle">
                        <div style="margin-top:5px;"> <input type="text" class="searchleft" name="searchkeyword" id="searchkeyword" value="Enter Diamond, Ring, or Watch Lot Number" onblur="if (this.value == '') {this.value = 'Enter Diamond, Ring, or Watch Lot Number';}" onfocus="if (this.value == 'Enter Diamond, Ring, or Watch Lot Number') {this.value = '';}" style="color:#aaa; font-size:10px;"></div></div>
                        <div id="search_right"></div>
                        <div style="color:#FFFFFF; margin-left:5px; margin-top:7px; float:left;"><span class="first_menuGo"><a href="#">GO</a></span></div>
                        <div id="top_line"></div> 
        <!--<div class="header_top"></div>
        	<div>
            	<div style="float:left; margin-left:850px"><a href=""><b>Login</b></a></div>
                <div style="float:left; margin-left:15px"><a href=""><b>Shopping Cart</b></a></div>
            </div>
        	<div>
            	<div style="float:left; margin-left:15px"><a href="index.php"><img src="images/header_logo.jpg" border="0" /></a></div>
                <div style="float:left; margin-left:485px">
                	<div style="float:left; margin-left:px; margin-top:20px;" class="search">
                    	<div style="margin-left:7px; margin-top:7px"><input type="text" size="18" value="search" id="input"></div>
                    </div>
               	  <div style="margin-top:13px;margin-left:4px;float:left"><h2><a href="#">GO</a></h2></div>
                </div>
            </div>
			<div class="header_devider" style="margin-top:70px" ></div>  -->
        	<div class="main_menu">
            	<!--<div style="float:left; margin-left:20px"><a href="Diamond_search.php"><span class="first_menu">D</span>IAMOND-->
                <?
                	echo $this->commonmodel->getHeadMenu();
				?>
               <!-- </a></div>
                <div style="float:left; margin-left:25px"><a href="Diamond_search2.php"><span class="first_menu">E</span>NGAGEMENT & WEDDING</a></div>
                <div style="float:left; margin-left:25px"><a href="ring-search.php"><span class="first_menu">D</span>IAMOND JEWELRY</a></div>-->
            </div> 
          
       

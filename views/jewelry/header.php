<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php echo (isset($meta_tags)) ? $meta_tags : '<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />';?>
<title>Jewelry Cart 1.0® is the leader in diamond jewelry shopping cart technology</title>
<link type="text/css" href="<?php echo config_item('base_url') ?>css/style.css" rel="stylesheet" />
<link type="text/css" href="<?php echo config_item('base_url') ?>css/js-image-slider.css" rel="stylesheet" />
<link type="text/css" href="<?php echo config_item('base_url') ?>css/tamal.css" rel="stylesheet" />
<link type="text/css" href="<?php echo config_item('base_url')?>css/tabs.css" rel="stylesheet" /> 
<!--[if IE 7]><link rel="stylesheet" type="text/css" href="<?php echo config_item('base_url')?>css/IE7styles.css" /><![endif]--> 
<link type="text/css" href="<?php echo config_item('base_url') ?>css/style1.css" rel="stylesheet" />
<link type="text/css" href="<?php echo config_item('base_url') ?>css/reset1.css" rel="stylesheet" />
<link type="text/css" href="<?php echo config_item('base_url') ?>css/ruman.css" rel="stylesheet" />
<link type="text/css" href="<?php echo config_item('base_url') ?>css/header_menu.css" rel="stylesheet" />
<!--[if  IE 8]>
<link rel="stylesheet" type="text/css"  href=<?php echo config_item('base_url')?>IE8styles.css"" />
<![endif]-->
<script>var base_url = '<?php echo config_item('base_url');?>';</script>
<script src="<?php echo config_item('base_url');?>js/jquery.js" type="text/javascript"></script>
<script src="<?php echo config_item('base_url');?>slider/js-image-slider.js" type="text/javascript"></script>
<script src="<?php echo config_item('base_url') ?>js/facebox.js" type="text/javascript"></script>
<script src="<?php echo config_item('base_url')?>js/jquery.corner.js" type="text/javascript"></script>
<script src="<?php echo config_item('base_url')?>js/function.js" type="text/javascript"></script>
<script src="<?php echo config_item('base_url')?>js/t.js" type="text/javascript"></script>
<script src="<?php echo config_item('base_url')?>js/r.js" type="text/javascript"></script>
<style type="text/css">
@import "css/reset1.css";
@import "css/style1.css";
</style>
<!--
<link type="text/css" href="<?php echo config_item('base_url');?>css/diamondsearch.css" rel="stylesheet" />
<link type="text/css" href="<?php echo config_item('base_url');?>css/papillon.css" rel="stylesheet" />
<script language="javascript" type="text/javascript" src="<?php echo config_item('base_url');?>js/papillon.js"></script>
-->
<?php echo isset($extraheader) ? $extraheader : '';?> 
<!--
<script type="text/javascript" language="javascript">
	jQuery(document).ready(function() {
		<?php echo isset($onloadextraheader) ? $onloadextraheader : '';?>
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
</script>-->
<script type="text/javascript" language="javascript">
	jQuery(document).ready(function() {
		<?php echo isset($onloadextraheader) ? $onloadextraheader : '';?>
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


<link rel="stylesheet" type="text/css" href="<?php echo config_item('base_url')."css/leftmenu.css"; ?>" >
	   
</head>
<body> 

	<div class="nav_top_nd">
	
	<div class="nav_link_m"><a href="#" class=""></a></div>
	   	<div class="nav_link_a">
		<a href="<?php echo $this->config->item('base_url');?>" class="">HOME</a>
		<a href="#" class="">EZPAY PLANS</a>
		<a href="#" class="">ABOUT US</a>
		<a href="#" class="">CONTACT US</a>
		<a href="<?php echo $this->config->item('base_url');?>account/membersignin" class="">MY ACCOUNT</a>
		<a href="<?php echo $this->config->item('base_url');?>account/trackorder" class="">ORDER STATUS</a>
		<a href="<?php echo $this->config->item('base_url');?>shoppingbasket/mybasket" class="">VIEW CART</a>
		</div>
	</div>

	
            <div class="nav_h">
	
	<div class="fix logo">
					<a href="#"><img src="<?php echo $this->config->item('base_url');?>images/logo.png" alt=""/></a>
				</div>
				<div class="nav_h_right">
				<div class="nav_h_right_p1"><img src="<?php echo $this->config->item('base_url');?>images/amazon.png"></div>
			<div class= "nav_h_right_p2">	
<form action="#" method="Post">
<input type="text" name="Keyword" id="name" value="Keyword" size="24" />
<div id="submitForm">
    <input type="submit" value="" name="submit"></form>
</div></div>
	</div>
				</div>
	
	
	

	
	
	
<div style="clear:both" ></div>

























<?php
	if(isset($usetips)) {
?>
	<script type="text/javascript" src="<?php echo config_item('base_url'); ?>third_party/dhtmltooltips/wz_tooltip.js"></script>
    <script type="text/javascript" src="<?php echo config_item('base_url'); ?>third_party/dhtmltooltips/tip_balloon.js"></script>
    <script type="text/javascript" src="<?php echo config_item('base_url'); ?>third_party/dhtmltooltips/tip_centerwindow.js"></script>
    <script type="text/javascript" src="<?php echo config_item('base_url'); ?>third_party/dhtmltooltips/tip_followscroll.js"></script>
<?php
	}
?>
<div class="mcontent center w950px">

    <table width="960" border="0" cellspacing="0" cellpadding="0" align="center" style="background-color:#fff;">
      <tr>
      <!--header starts-->
        <td class="header_bg">

 
  
  

		<div id="header_menu">
		<div class="inner mainmenu">
			
			<nav class="main" style="clear:both;">
			  <ul>
			  <li class="bridal"><a href="<?php echo config_item('base_url') ?>jewelleries/index/F/">ENGAGEMENT	RINGS </a></li>
			  <li class="bridal">
				  <a href="<?php echo config_item('base_url') ?>jewelleries/index/F/3292605018/">NECKLACES</a>
				  
				  <div id="drop-bridal" class="drop" style="width:720px;bottom:-315px;height:310px;">  
					<div class="clearfix"></div>
					<div style="width:auto;">
					<?php 
					$statement = "select * from `dev_ebaycategories` where parent_id = '3291859018'  ";					
					$query = $this->db->query($statement);					
					$results = $query->result_array();
				for($i=0;$i<count($results);$i++)
				{
				?>
					<div class="vertBar" style="width:auto;">
					
					<div class="cols">
				  
						<ul >
						  <?php
						if($results[$i]["category_name"]=="Rings"){
							$pid="3291875018";
						}
						else if($results[$i]["category_name"]=="Earrings"){
							$pid="3291962018";
						}
						else if($results[$i]["category_name"]=="Pendants"){
							$pid="3292498018";
						}
						else if($results[$i]["category_name"]=="Bracelets"){
							$pid="3292560018";
						}
						else if($results[$i]["category_name"]=="Earrings"){
							$pid="3292577018";
						}  
						else if($results[$i]["category_name"]=="Shamballa"){
							$pid="3709041018";
						}
						?>
				<li class="title"><a href="<?php echo config_item('base_url') ?>jewelleries/index/M/<?php echo $pid;?>/"><?php echo $results[$i]["category_name"]; ?></a></li>
						<?php  
					    $state = "select * from `dev_ebaycategories` where parent_id = '".$pid."'  ";
						$qu=$this->db->query($state);
						$result=$qu->result_array();
						for($j=0;$j<count($result);$j++)
						{
						  ?>
						  <li><a href="<?php echo config_item('base_url') ?>jewelleries/index/M/<?php echo $pid;?>/<?php echo $result[$j]["category_id"]; ?>/none/none/none"><?php echo $result[$j]["category_name"]; ?></a></li>
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
				  <a href="<?php echo config_item('base_url') ?>jewelleries/index/F/3292607018/">BRACELETS</a>
				  
				  <div id="drop-bridal" class="drop" style="width:720px;bottom:-315px;height:310px;">  
					<div class="clearfix"></div>
					<div style="width:auto;">
					<?php 
						$statement = "select * from `dev_ebaycategories` where parent_id = '3292596018'  ";
						$query =$this->db->query($statement);
						$results=$query->result_array();
				for($i=0;$i<count($results);$i++)
				{
				?>
					<div class="vertBar" style="width:auto;">
					
					<div class="cols">
				  
						<ul >
						  <?php
						if($results[$i]["category_name"]=="Rings"){
						$pid="3292598018";
						}
						else if($results[$i]["category_name"]=="Earrings"){
						$pid="3292601018";
						}
						else if($results[$i]["category_name"]=="Pendants"){
						$pid="3292603018";
						}
						else if($results[$i]["category_name"]=="Necklaces"){
						$pid="3292605018";
						}
						else if($results[$i]["category_name"]=="Braclets"){
						$pid="3292607018";
						}  
						else if($results[$i]["category_name"]=="Shamballa"){
						$pid="3709172018";
						}
						?>
				<li class="title"><a href="<?php echo config_item('base_url') ?>jewelleries/index/F/<?php echo $pid;?>/"><?php echo $results[$i]["category_name"]; ?></a></li>
						<?php  
					    $state = "select * from `dev_ebaycategories` where parent_id = '".$pid."'  ";
						$qu=$this->db->query($state);
						$result=$qu->result_array();
						for($j=0;$j<count($result);$j++)
						{
						  ?>
						  <li><a href="<?php echo config_item('base_url') ?>jewelleries/index/F/<?php echo $pid;?>/<?php echo $result[$j]["category_id"]; ?>/none/none/none"><?php echo $result[$j]["category_name"]; ?></a></li>
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
				  <a href="<?php echo config_item('base_url') ?>jewelleries/index/F/3292601018/">EARRINGS</a>
				  
				  <div id="drop-bridal" class="drop" style="width:720px;bottom:-315px;height:310px;">  
					<div class="clearfix"></div>
					<div style="width:auto;">
					<?php 
					$statement = "select * from `dev_ebaycategories` where parent_id = '3291859019'  ";
						$query =$this->db->query($statement);
						$results=$query->result_array();
				for($i=0;$i<count($results);$i++)
				{
				?>
					<div class="vertBar" style="width:auto;">
					
					<div class="cols">
				  
						<ul >
						  <?php
						if($results[$i]["category_name"]=="Jwellary"){
								$pid="3291859021";
							}
							else if($results[$i]["category_name"]=="Jewelry testing21"){
								$pid="3291859020";
							}
							else if($results[$i]["category_name"]=="Gift"){
								$pid="3291859022";
							}
						?>
				<li class="title"><a href="<?php echo config_item('base_url') ?>jewelleries/index/C/<?php echo $pid;?>/"><?php echo $results[$i]["category_name"]; ?></a></li>
						<?php  
					    $state = "select * from `dev_ebaycategories` where parent_id = '".$pid."'  ";
						$qu=$this->db->query($state);
						$result=$qu->result_array();
						for($j=0;$j<count($result);$j++)
						{
						  ?>
						  <li><a href="<?php echo config_item('base_url') ?>jewelleries/index/C/<?php echo $pid;?>/<?php echo $result[$j]["category_id"]; ?>/none/none/none"><?php echo $result[$j]["category_name"]; ?></a></li>
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
				  <a href="<?php echo config_item('base_url') ?>watches/watches_settings/false/false/false/false/solitaire">MEN’S WATCHES</a>
				  <div id="drop-bridal" class="drop" style="width:720px;bottom:-315px;height:310px;">  
					<div class="clearfix"></div>
					<div style="width:auto;">
					<?php
			$statement = "select * from `dev_ebaycategories` where parent_id = '3291859018'  ";
			$query =$this->db->query($statement);
			$results=$query->result_array();
				for($i=0;$i<count($results);$i++)
				{
				?>
					<div class="vertBar" style="width:auto;">
					<!--<div class="ddroptitle">Rings</div>-->
					<div class="cols">
				  
						<ul>
						  <?php
						if($results[$i]["category_name"]=="Rings"){
						$pid="3291875018";
						}
						else if($results[$i]["category_name"]=="Chains"){
						$pid="3291962018";
						}
						else if($results[$i]["category_name"]=="Pendants"){
						$pid="3292498018";
						}
						else if($results[$i]["category_name"]=="Bracelets"){
						$pid="3292560018";
						}
						else if($results[$i]["category_name"]=="Earrings"){
						$pid="3292577018";
						}  
						else if($results[$i]["category_name"]=="Shamballa"){
						$pid="3709041018";
						}
					?>
					<li class="title"><a href="<?php echo config_item('base_url') ?>jewelleries/index/U/<?php echo $pid;?>/"><?php echo $results[$i]["category_name"]; ?></a></li>
					<?php
					    $state = "select * from `dev_ebaycategories` where parent_id = '".$pid."'  ";
						$qu=$this->db->query($state);
						$result=$qu->result_array();
						for($j=0;$j<count($result);$j++)
						{
						  ?>
						  <li><a href="<?php echo config_item('base_url') ?>jewelleries/index/U/<?php echo $pid;?>/<?php echo $result[$j]["category_id"]; ?>/none/none/none"><?php echo str_replace('Men', 'Unisex', $result[$j]["category_name"]); ?></a></li>
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
				
				
								
				<li class="bridal">
				  <a href="<?php echo config_item('base_url') ?>jewelleries/index/CL/">CLEARANCE</a>
				  
				  <div id="drop-bridal" class="drop" style="width:720px;bottom:-315px;height:310px;left:-365px">  
					<div class="clearfix"></div>
					<div style="width:auto;">
					<?php 
					$statement = "select * from `dev_ebaycategories` where parent_id = '3291859070'  ";
				$query =$this->db->query($statement);
				$results=$query->result_array();
				for($i=0;$i<count($results);$i++)
				{
				?>
					<div class="vertBar" style="width:auto;">
					
					<div class="cols">
				  
						<ul >
						  <?php
						if($results[$i]["category_name"]=="Earrings"){
						$pid="3291859071";
					}
					else if($results[$i]["category_name"]=="Pendants"){
						$pid="3291859071";
					}
					else if($results[$i]["category_name"]=="Necklaces"){
						$pid="3291859073";
					}
					else if($results[$i]["category_name"]=="Rings"){
						$pid="3291859074";
					}  
					else if($results[$i]["category_name"]=="Bracelets"){
						$pid="3291859075";
					}
					else if($results[$i]["category_name"]=="Watches"){
						$pid="3291859076";
					}
					else if($results[$i]["category_name"]=="Others"){
						$pid="3291859076";
					}
						?>
				<li class="title"><a href="<?php echo config_item('base_url') ?>jewelleries/index/CL/<?php echo $pid;?>/"><?php echo $results[$i]["category_name"]; ?></a></li>
						<?php  
					    $state = "select * from `dev_ebaycategories` where parent_id = '".$pid."'  ";
						$qu=$this->db->query($state);
						$result=$qu->result_array();
						for($j=0;$j<count($result);$j++)
						{
						  ?>
						  <li><a href="<?php echo config_item('base_url') ?>jewelleries/index/CL/<?php echo $pid;?>/<?php echo $result[$j]["category_id"]; ?>/none/none/none"><?php echo $result[$j]["category_name"]; ?></a></li>
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
        
      <?php /*?><div class="header_top"></div>  
        <div id="logo"><a href="<?php echo config_item('base_url'); ?>"><img src="<?php echo config_item('base_url'); ?>images/newtemp/header_logo.jpg" border="0" /></a></div>
                    <div id="log_in"><a href="<?php echo config_item('base_url'); ?>account/signin">Log in</a></div>
                    <div id="Shoping_cart"><a href="<?php echo config_item('base_url'); ?>shoppingbasket/mybasket">Shopping Cart</a></div> 
                     <div id="search_left"></div>
                         <form action="<?php echo config_item('base_url');?>engagement/searchresult" method="POST">
                       <div id="search_middle">
                        <div style="margin-top:5px;"> <input type="text" class="searchleft" name="searchkeyword" id="searchkeyword" value="Search" onblur="if (this.value == '') {this.value = 'Search';}" onfocus="if (this.value == 'Search') {this.value = '';}" style=" font-family:Verdana,Arial,Helvetica,sans-serif; color:#FFFFFF; font-size:16px; background-color:#000000; border:0px; font-size:16px; vertical-align:middle; text-align:left; width:140px; height:20px;"></div></div>
                        <div id="search_right"></div>
                        <div style="color:#FFFFFF; margin-left:5px; margin-top:7px; float:left;"><span class="first_menuGo"> <input style=" background-color:#000000; color:#FFFFFF; font-size:30px; font-family: Georgia,Century Schoolbook ; border:0px;" type="submit" value="Go" ></span>
                         </form>
                        </div>
                        <div id="top_line"></div> <?php */?>
                       
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
        	<!--<div class="main_menu">

				              v style="float:left; margin-left:25px"><a href="ring-search.php"><span class="first_menu">D</span>IAMOND JEWELRY</a></div>
            </div> -->
          
        </div>
		<div style="background-color:#7A8897;width:100%;display:block;float:right;padding-top:20px;">

<link href="<?php echo SITE_URL; ?>css/main-menu.css" rel="stylesheet" type="text/css" />
<link href="<?php echo SITE_URL; ?>css/site-page.css" rel="stylesheet" type="text/css" />
<?php if($page != 'home'){ ?>
<style>
#view_search_itemlist{right: 19%;}
</style>
<?php } ?>
<script type="text/javascript" language="javascript">
$(document).ready(function(){
	$(".set_tabs_hover").mouseenter(function(){
		var winWidth = $(window).width();
		var class_names = '';
		if(winWidth < 768){
			if($(this).find(".tabsHeading a").length ==0)
			class_names = $(this).find(".tabsHeading").text();
			else
			class_names = $(this).find(".tabsHeading a:first-child").text();
		}
		else{
			if($(this).find(".tabsHeading a").length ==0)
			class_names = $(this).find(".tabsHeading").text();
			else
			class_names = $(this).find(".tabsHeading a:last-child").text();
		}
		$('.set_tabs_hover').removeClass(' active_tabs_hover');
		if(class_names == 'Diamonds'){
			$(this).addClass(' active_tabs_hover');
			$('.diamonds-menu').removeClass(' main-nav-item-open--FejHK');
			$('.men-menu').removeClass(' main-nav-item-open--FejHK');
			$('.women-menu').removeClass(' main-nav-item-open--FejHK');
			$('.engagement-rings-menu').removeClass(' main-nav-item-open--FejHK');
			$('.jewelry-menu').removeClass(' main-nav-item-open--FejHK');
			$('.clearance-menu').removeClass(' main-nav-item-open--FejHK');
			$('.diamonds-menu').addClass(' main-nav-item-open--FejHK');
		}else if(class_names == 'Men'){
			$(this).addClass(' active_tabs_hover');
			$('.diamonds-menu').removeClass(' main-nav-item-open--FejHK');
			$('.men-menu').removeClass(' main-nav-item-open--FejHK');
			$('.women-menu').removeClass(' main-nav-item-open--FejHK');
			$('.engagement-rings-menu').removeClass(' main-nav-item-open--FejHK');
			$('.jewelry-menu').removeClass(' main-nav-item-open--FejHK');
			$('.clearance-menu').removeClass(' main-nav-item-open--FejHK');
			$('.men-menu').addClass(' main-nav-item-open--FejHK');
		}else if(class_names == 'Women'){
			$(this).addClass(' active_tabs_hover');
			$('.diamonds-menu').removeClass(' main-nav-item-open--FejHK');
			$('.men-menu').removeClass(' main-nav-item-open--FejHK');
			$('.women-menu').removeClass(' main-nav-item-open--FejHK');
			$('.engagement-rings-menu').removeClass(' main-nav-item-open--FejHK');
			$('.jewelry-menu').removeClass(' main-nav-item-open--FejHK');
			$('.clearance-menu').removeClass(' main-nav-item-open--FejHK');
			$('.women-menu').addClass(' main-nav-item-open--FejHK');
		}else if(class_names == 'Engagement Rings'){
			$(this).addClass(' active_tabs_hover');
			$('.diamonds-menu').removeClass(' main-nav-item-open--FejHK');
			$('.men-menu').removeClass(' main-nav-item-open--FejHK');
			$('.women-menu').removeClass(' main-nav-item-open--FejHK');
			$('.engagement-rings-menu').removeClass(' main-nav-item-open--FejHK');
			$('.jewelry-menu').removeClass(' main-nav-item-open--FejHK');
			$('.clearance-menu').removeClass(' main-nav-item-open--FejHK');
			$('.engagement-rings-menu').addClass(' main-nav-item-open--FejHK');
		}else if(class_names == 'Jewelry'){
			$(this).addClass(' active_tabs_hover');
			$('.diamonds-menu').removeClass(' main-nav-item-open--FejHK');
			$('.men-menu').removeClass(' main-nav-item-open--FejHK');
			$('.women-menu').removeClass(' main-nav-item-open--FejHK');
			$('.engagement-rings-menu').removeClass(' main-nav-item-open--FejHK');
			$('.clearance-menu').removeClass(' main-nav-item-open--FejHK');
			$('.jewelry-menu').addClass(' main-nav-item-open--FejHK');
		}else if(class_names == 'Clearance'){
			$(this).addClass(' active_tabs_hover');
			$('.diamonds-menu').removeClass(' main-nav-item-open--FejHK');
			$('.men-menu').removeClass(' main-nav-item-open--FejHK');
			$('.women-menu').removeClass(' main-nav-item-open--FejHK');
			$('.engagement-rings-menu').removeClass(' main-nav-item-open--FejHK');
			$('.jewelry-menu').removeClass(' main-nav-item-open--FejHK');
			$('.clearance-menu').removeClass(' main-nav-item-open--FejHK');
			$('.clearance-menu').addClass(' main-nav-item-open--FejHK');
		}else{
			$(this).addClass(' active_tabs_hover');
			$('.diamonds-menu').removeClass(' main-nav-item-open--FejHK');
			$('.men-menu').removeClass(' main-nav-item-open--FejHK');
			$('.women-menu').removeClass(' main-nav-item-open--FejHK');
			$('.engagement-rings-menu').removeClass(' main-nav-item-open--FejHK');
			$('.jewelry-menu').removeClass(' main-nav-item-open--FejHK');
			$('.clearance-menu').removeClass(' main-nav-item-open--FejHK');
		}
	});

	$(".diamonds-menu, .men-menu, .women-menu, .engagement-rings-menu, .jewelry-menu, .clearance-menu").mouseleave(function(){
		$('.diamonds-menu').removeClass(' main-nav-item-open--FejHK');
		$('.men-menu').removeClass(' main-nav-item-open--FejHK');
		$('.women-menu').removeClass(' main-nav-item-open--FejHK');
		$('.engagement-rings-menu').removeClass(' main-nav-item-open--FejHK');
		$('.jewelry-menu').removeClass(' main-nav-item-open--FejHK');
		$('.clearance-menu').removeClass(' main-nav-item-open--FejHK');
	});
	
	$("#top_menus").mouseleave(function(){
		//$(".set_tabs_hover").removeClass(' active_tabs_hover');
		$('.diamonds-menu').removeClass(' main-nav-item-open--FejHK');
		$('.men-menu').removeClass(' main-nav-item-open--FejHK');
		$('.women-menu').removeClass(' main-nav-item-open--FejHK');
		$('.engagement-rings-menu').removeClass(' main-nav-item-open--FejHK');
		$('.jewelry-menu').removeClass(' main-nav-item-open--FejHK');
		$('.clearance-menu').removeClass(' main-nav-item-open--FejHK');
	});
});
</script>
<script>
$(document).ready(function(){
	var val = 1;
	$("#menubtn, .menucbtn").click(function(){
		if(val == 1){
			$("nav#showmblemenu").animate({
				'left' : '0'
			});
			val = 0;
		}else{
			val = 1;
			$("nav#showmblemenu").animate({
				'left' : '-100%'
			});
		}
		return false;
	});

	$('.sub-menus').click(function(e){
		var _this = $(this);
		if($(e.target).next('.children').length > 0){
			$(e.target).next('.children').addClass('tempOpen');
			$('.sub-menus .children:not(.tempOpen)').slideUp();
			$(e.target).next('.children').removeClass('tempOpen').slideToggle();
		}
		else if($(e.target).next('.innerchildren').length > 0){
			$(e.target).next('.innerchildren').addClass('tempOpen');
			$(_this).find('.innerchildren:not(.tempOpen)').slideUp();
			$(e.target).next('.innerchildren').removeClass('tempOpen').slideToggle();
		}
		setTimeout(function(){
			$(_this).find('.dropdown-backdrop').remove();
		},500);
	});
});
</script>
<style>
.only-for-mobile-menu{display:none!important}
.pull-rights{float:right}
@media (max-width: 767px) {
.diamond_tabs_row{display:none!important}
.only-for-mobile-menu{display:inline-block!important}
.fltrgt{float:right}
.pull-rights{float:left}
.pdng0{padding:0}
.flag_list{text-align:left}
.flag_list .fa-bars{display:block;padding:5px;color:#BEA46C;overflow:hidden;font-size:16px;font-weight:700;text-decoration:none;float:right;text-transform:uppercase;border:solid 1px;margin:0}
.fa-bars::before{content:""}
.flag_list span{float:left;font-size:20px;padding:20px;color:#fff}
.upercase{text-transform: uppercase;}
.innerchildren { display: none;}
}
.width15{width:15%!important}
</style>
<div id="main-head-containter">
	<header>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<div class="offerbackground">
			<p><strong>I STAND FOR </strong>Take $10 off on your first order w/code: <strong>CHANGE</strong> <strong><a href="/" style="color:black;padding-left:20px;"><u>details</u></a></strong></p>
		</div>
		<div class="container set_page_content">
			<div class="col-sm-6 pull-rights pdng0">
				<ul class="flag_list">
					<?php /* <li><a href="#"><img src="<?php echo SITE_URL; ?>assets/site_images/flags_icon_1.jpg" /></a></li>
					<li><a href="#"><img src="<?php echo SITE_URL; ?>assets/site_images/flags_icon_2.jpg" /></a></li>
					<li><a href="#"><img src="<?php echo SITE_URL; ?>assets/site_images/flags_icon_3.jpg" /></a></li>
					<li><a href="#"><img src="<?php echo SITE_URL; ?>assets/site_images/flags_icon_4.jpg" /></a></li>
					<li><a href="#"><img src="<?php echo SITE_URL; ?>assets/site_images/flags_icon_5.jpg" /></a></li>
					<li><a href="#"><img src="<?php echo SITE_URL; ?>assets/site_images/flags_icon_6.jpg" /></a></li>
					<li><a href="#"><img src="<?php echo SITE_URL; ?>assets/site_images/flags_icon_7.jpg" /></a></li>
					<li>|</li> */ ?>
					<li class="only-for-mobile-menu fltrgt" id="menubtn"><a href=""><p class="fa fa-bars">Menu</p></a></li>
					<?php /* <li><a href="#">Need Help</a></li>
					<li>|</li>
					<li><a href="#">Comments Suggestions?</a></li> */ ?>
				</ul>
			</div>
			<div class="clear"></div>
			<div class="">
				<div class="main_logo_left col-sm-4">
					<a href="<?php echo SITE_URL; ?>"><img src="<?php echo SITE_URL; ?>assets/site_images/diamond-bayou-logo.png" width="200px" /></a>
				</div>
				<div class="main_logo_right col-sm-7 pull-right">
					<ul class="flag_list">
						<?php /*<li><a href="#">Diamond Concierge Services HD</a></li>*/?>
						<li><a href="<?php echo SITE_URL; ?>site/page/contactus">Contact Us</a></li>
						<?php /*<li><a href="#">Bayou Reward Points</a></li>*/?>
						<li>
							<form autocomplete="off" action="<?php echo SITE_URL; ?>engagement/searchresult" class="search_formbk" name="f_search" method="Post">
								<input class="set_search_btn" type="image" src="<?php echo SITE_URL; ?>assets/site_images/search_field_icon.jpg" />
								<input type="text" name="search_field" id="search_field" class="search_field" onkeyup="search_items_result()" placeholder="Search">
							</form>
						</li>
					</ul>
				</div>
				<div id="view_search_itemlist">
					<ul></ul>
				</div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div><br><br>
			<?php $ch_menu = end($this->uri->segment_array());?>
			<div class="login_signup_row">
				<a href="<?php echo SITE_URL; ?>shoppingbasket/mybasket">View Shopping Bag</a>
				<a href="<?php echo SITE_URL; ?>account/register">Sign Up</a>
				<a href="<?php echo SITE_URL; ?>account/membersignin">Login</a>
			</div>
			<div id="top_menus">
			<div class="diamond_tabs_row">
				<div id="top-main-tab-area" class="outer_tabs_row">
					<div class="col-sm-2 set_tabs_hover <?php if(in_array("diamonds-search", $this->uri->segment_array())){ echo 'active_tabs_hover'; } ?>">
						<div class="tabsHeading">Diamonds</div>
					</div>
					<div class="col-sm-2 set_tabs_hover <?php if(in_array("men_diamond_rings", $this->uri->segment_array())){ echo 'active_tabs_hover'; } ?>">
						<div class="tabsHeading">
						<a style="color:white;" class="mobMenuItem" href="javascript:void(0);" onclick="ch_men('menu_sub_menu')">Men</a>
						<a style="color:white;" class="deskMenuItem" href="<?php echo SITE_URL; ?>diamonds/men_diamond_rings/" onclick="ch_men('menu_sub_menu')">Men</a>
						</div>
					</div>
					<div class="col-sm-2 set_tabs_hover <?php if(in_array("fine-jewelry", $this->uri->segment_array())){ echo 'active_tabs_hover'; } ?>">
						<div class="tabsHeading">
						<a style="color:white;" class="mobMenuItem" href="javascript:void(0);">Women</a>
						<a style="color:white;" class="deskMenuItem" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/">Women</a>
						</div>
					</div>
					<div class="col-sm-2 width15 set_tabs_hover <?php if(in_array("engagement-rings", $this->uri->segment_array())){ echo 'active_tabs_hover'; } ?>">
						<div class="tabsHeading">
						<a style="color:white;" class="mobMenuItem" href="javascript:void(0);">Engagement Rings</a>
						<a style="color:white;" class="deskMenuItem" href="<?php echo SITE_URL; ?>diamonds/engagement-rings">Engagement Rings</a>
						</div>
					</div>
					<div class="col-sm-2 set_tabs_hover <?php if(in_array("hip_hop_jewelry", $this->uri->segment_array())){ echo 'active_tabs_hover'; } ?>">
						<div class="tabsHeading">
						<a style="color:white;" class="mobMenuItem" href="javascript:void(0);">Jewelry</a>
						<a style="color:white;" class="deskMenuItem" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/">Jewelry</a>
						</div>
					</div>
					<?php /* <div class="col-sm-2 set_tabs_hover">
						<div class="tabsHeading">
						<a style="color:white;" class="mobMenuItem" href="javascript:;">Clearance</a>
						<a style="color:white;" class="deskMenuItem" href="<?php echo SITE_URL; ?>diamonds/pre_owned_luxury_bag_diamond/">Clearance</a>
						</div>
					</div> */ ?>
					<div class="col-sm-2 set_tabs_hover <?php if(in_array("education", $this->uri->segment_array())){ echo 'active_tabs_hover'; } ?>">
						<div class="tabsHeading">
						<a style="color:white;" class="mobMenuItem" href="<?php echo SITE_URL; ?>education">Education</a>
						<a style="color:white;" class="deskMenuItem" href="<?php echo SITE_URL; ?>education">Education</a>
						</div>
					</div>
					<div class="col-sm-2 set_tabs_hover <?php if(in_array("blog", $this->uri->segment_array())){ echo 'active_tabs_hover'; } ?>">
						<div class="tabsHeading">
						<a style="color:white;" class="mobMenuItem" href="<?php echo SITE_URL; ?>blog">Blog</a>
						<a style="color:white;" class="deskMenuItem" href="<?php echo SITE_URL; ?>blog">Blog</a>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
			<div class="diamonds-menu">
				<div class="sub-menu-container--1cQ-G">
					<div class="sub-menu--cBN8i diamonds-sub--2KVK3 labCreated--1MMGv">
						<div class="main-container--2PI0W row--35tYP">
							<div class="menu-column--147Lw">
								<div class="menu-unit--140vM design-your-own--2JENm" style="text-transform:capitalize">
									<div class="menu-unit-title--2s99-">design your own engagement ring</div>
									<div class="row--35tYP">
										<ul style="text-transform:capitalize" class="ul-column--1KfUm">
											<?php /* <li><a data-container="#WidePane" data-qa="start_with_a_diamond-diamonds" href="/loose-diamonds/all-diamonds/" class="class-icon--37NL7 icon-Diamond_DYO"><span>start with a diamond</span></a></li>
											<li><a data-container="#WidePane" data-qa="start_with_a_lab_created_diamond_-diamonds" href="/loose-diamonds/lab-created-diamonds/" class="class-icon--37NL7 icon-Diamond_DYO lab-color--3oZOJ"><span>start with a lab-created diamond</span></a></li>
											<li><a data-container="#WidePane" style="display:flex;align-items:center" data-qa="Start_With_A_Fancy_Color_Diamond" href="/fancy-color-diamonds/yellow/"><img src="https://ion.r2net.com/images/earth-fancy-3.svg" style="display:inline-block;height:18px;width:18px;margin-left:4px;margin-right:10px"><span>Start With A Fancy Color Diamond</span></a></li>
											<li><a data-container="#WidePane" style="display:flex" data-qa="Start_With_A_Fancy_Color_Lab-Created_Diamond" href="/fancy-color-diamonds/lab-created-diamonds/"><img src="https://ion.r2net.com/images/lab-fancy.svg" style="display:inline-block;height:18px;width:18px;margin-left:4px;margin-right:10px;margin-top:5px"><span style="flex:1">Start With A Fancy Color Lab-Created Diamond</span></a></li> */ ?>
											<li><a data-container="#WidePane" data-qa="start_with_a_setting-diamonds" href="<?php echo SITE_URL; ?>engagement/search" class="class-icon--37NL7 icon-Ring_DYO"><span>start with a setting</span></a></li>
										</ul>
									</div>
								</div>
								<div class="menu-unit--140vM diamonds-general-links--2lM-y" style="text-transform:capitalize">
									<div class="menu-unit-title--2s99-">premier diamond collection</div>
									<?php /* <div class="row--35tYP">
										<ul style="text-transform:capitalize" class="ul-column--1KfUm">
											<li><a data-container="#WidePane" data-qa="true_hearts_diamonds" href="/loose-diamonds/true-hearts/" class="class-icon--37NL7 icon-True_hearts icon-true-hearts--1fDmd"><span>True Hearts™ diamonds</span></a></li>
										</ul>
									</div> */ ?>
								</div>
							</div>
							<div class="menu-column--147Lw">
								<div class="menu-unit--140vM loose-diamonds--2FxmO" style="text-transform:capitalize">
									<div class="menu-unit-title--2s99-">loose diamonds</div>
									<div class="row--35tYP">
										<ul style="text-transform:capitalize" class="ul-column--1KfUm">
											<li><a data-container="#WidePane" data-qa="round_loose_diamonds" href="<?php echo SITE_URL; ?>diamonds/diamonds-search/round-cut/" class="class-icon--37NL7 icon-round"><span>round</span></a></li>
											<li><a data-container="#WidePane" data-qa="princess_loose_diamonds" href="<?php echo SITE_URL; ?>diamonds/diamonds-search/princess-cut/" class="class-icon--37NL7 icon-princess"><span>princess</span></a></li>
											<li><a data-container="#WidePane" data-qa="cushion_loose_diamonds" href="<?php echo SITE_URL; ?>diamonds/diamonds-search/cushion-cut/" class="class-icon--37NL7 icon-cushion"><span>cushion</span></a></li>
											<li><a data-container="#WidePane" data-qa="emerald_loose_diamonds" href="<?php echo SITE_URL; ?>diamonds/diamonds-search/emerald-cut/" class="class-icon--37NL7 icon-emerald"><span>emerald</span></a></li>
											<li><a data-container="#WidePane" data-qa="pear_loose_diamonds" href="<?php echo SITE_URL; ?>diamonds/diamonds-search/pear-shaped/" class="class-icon--37NL7 icon-pear"><span>pear</span></a></li>
										</ul>
										<ul style="text-transform:capitalize" class="ul-column--1KfUm">
											<li><a data-container="#WidePane" data-qa="oval_loose_diamonds" href="<?php echo SITE_URL; ?>diamonds/diamonds-search/oval-cut/" class="class-icon--37NL7 icon-oval"><span>oval</span></a></li>
											<li><a data-container="#WidePane" data-qa="radiant_loose_diamonds" href="<?php echo SITE_URL; ?>diamonds/diamonds-search/radiant-cut/" class="class-icon--37NL7 icon-radiant"><span>radiant</span></a></li>
											<li><a data-container="#WidePane" data-qa="asscher_loose_diamonds" href="<?php echo SITE_URL; ?>diamonds/diamonds-search/asscher-cut/" class="class-icon--37NL7 icon-asscher"><span>asscher</span></a></li>
											<li><a data-container="#WidePane" data-qa="marquise_loose_diamonds" href="<?php echo SITE_URL; ?>diamonds/diamonds-search/marquise-cut/" class="class-icon--37NL7 icon-marquise"><span>marquise</span></a></li>
											<li><a data-container="#WidePane" data-qa="heart_loose_diamonds" href="<?php echo SITE_URL; ?>diamonds/diamonds-search/heart-shaped/" class="class-icon--37NL7 icon-heart2"><span>heart</span></a></li>
										</ul>
									</div>
								</div>
								<div class="menu-unit--140vM fancy-color-diamonds--3posQ" style="text-transform:capitalize">
									<div class="menu-unit-title--2s99-">fancy color diamonds</div>
									<div class="row--35tYP">
										<ul style="text-transform:capitalize" class="ul-column--1KfUm">
											<li><a data-container="#WidePane" data-qa="yellow_color_diamonds" href="<?php echo SITE_URL; ?>diamonds/color-diamonds-search/yellow-color" class="class-icon--37NL7 icon-round yellow--37ZPO"><span>yellow</span></a></li>
											<li><a data-container="#WidePane" data-qa="pink_color_diamonds" href="<?php echo SITE_URL; ?>diamonds/color-diamonds-search/pink-color" class="class-icon--37NL7 icon-marquise pink--3gEGn"><span>pink</span></a></li>
											<li><a data-container="#WidePane" data-qa="purple_color_diamonds" href="<?php echo SITE_URL; ?>diamonds/color-diamonds-search/purple-color" class="class-icon--37NL7 icon-heart2 purple--3805f"><span>purple</span></a></li>
											<li><a data-container="#WidePane" data-qa="blue_color_diamonds" href="<?php echo SITE_URL; ?>diamonds/color-diamonds-search/blue-color" class="class-icon--37NL7 icon-oval blue--1tyqL"><span>blue</span></a></li>
										</ul>
										<ul style="text-transform:capitalize" class="ul-column--1KfUm">
											<li><a data-container="#WidePane" data-qa="green_color_diamonds" href="<?php echo SITE_URL; ?>diamonds/color-diamonds-search/green-color" class="class-icon--37NL7 icon-cushion green--2WQCn"><span>green</span></a></li>
											<li><a data-container="#WidePane" data-qa="orange_color_diamonds" href="<?php echo SITE_URL; ?>diamonds/color-diamonds-search/orange-color" class="class-icon--37NL7 icon-emerald orange--3Zbxs"><span>orange</span></a></li>
											<li><a data-container="#WidePane" data-qa="brown_color_diamonds" href="<?php echo SITE_URL; ?>diamonds/color-diamonds-search/brown-color" class="class-icon--37NL7 icon-asscher brown--10NIq"><span>brown</span></a></li>
											<li><a data-container="#WidePane" data-qa="black_color_diamonds" href="<?php echo SITE_URL; ?>diamonds/color-diamonds-search/black-color" class="class-icon--37NL7 icon-pear black--2m6P7"><span>black</span></a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="menu-column--147Lw">
								<div class="menu-unit--140vM design-your-own-diamonds--1CpGW" style="text-transform:capitalize">
									<div class="menu-unit-title--2s99-">design your own jewelry</div>
									<div class="row--35tYP">
										<ul style="text-transform:capitalize" class="ul-column--1KfUm">
											<li><a data-container="#WidePane" data-qa="design_your_own_earrings-diamonds" href="<?php echo SITE_URL; ?>jewelry/build-earings" class="class-icon--37NL7 icon-Studs_DYO"><span>earrings</span></a></li>
											<?php /* <li><a data-container="#WidePane" data-qa="matching_diamond_pairs-diamonds" href="/matching-pairs/all-diamonds/" class="class-icon--37NL7 icon-Pairs"><span>earth-created diamond pairs</span></a></li>
											<li><a data-container="#WidePane" data-qa="matching_lab_diamond_pairs-diamonds" href="/loose-diamonds/lab-created-matching-diamond-pairs/" class="class-icon--37NL7 icon-Pairs lab-color--3oZOJ"><span>lab-created diamond pairs</span></a></li> */ ?>
											<li><a data-container="#WidePane" data-qa="design_your_own_pendants-diamonds" href="<?php echo SITE_URL; ?>jewelry/buildiamond-pendant" class="class-icon--37NL7 icon-Pendants_DYO"><span>pendants</span></a></li>
											<li><a data-container="#WidePane" data-qa="design_your_own_three_stone-diamonds" href="<?php echo SITE_URL; ?>jewelry/buildthree-stonesring" class="class-icon--37NL7 icon-Pairs"><span>Three Stone Ring</span></a></li>
										</ul>
									</div>
								</div>
								<div class="menu-unit--140vM ready-to-ship--5tov6" style="text-transform:capitalize">
									<div class="menu-unit-title--2s99-">ready to ship jewelry</div>
									<div class="row--35tYP">
										<ul style="text-transform:capitalize" class="ul-column--1KfUm">
											<li><a data-container="#WidePane" data-qa="diamond_studs" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/wg-earrings" class="class-icon--37NL7 icon-Studs2"><span>White Gold Earrings</span></a></li>
											<li><a data-container="#WidePane" data-qa="diamond_earrings" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/rg-earrings" class="class-icon--37NL7 icon-Studs"><span>Rose Gold earrings</span></a></li>
											<li><a data-container="#WidePane" data-qa="diamond_pendants" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/ttg-pendants" class="class-icon--37NL7 icon-Pendants"><span>Two-Tone Gold pendants</span></a></li>
											<li><a data-container="#WidePane" data-qa="diamond_bracelets" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/tcg-bracelets" class="class-icon--37NL7 icon-Bracelets"><span>Tri-Color Gold bracelets</span></a></li>
											<li><a data-container="#WidePane" data-qa="diamond_rings" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/wg-bracelets" class="class-icon--37NL7 icon-Royal_ring"><span>White Gold Bracelets</span></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<a data-ajax-mode="disabled" href="lab-created-diamonds/"><div title="" class="sub-menu--cBN8i diamonds-sub--2KVK3 labCreated--1MMGv menu-image-bg--smxT7"><div style="background-color:transparent" class="true-hearts-white-overlay--2rF32"><div class="icon-Diamond_DYO text--1AO1C lab-diamond-icon--1Dqgd" style="font-weight:500">LEARN ABOUT<div style="font-weight:bold;display:inline">&nbsp;LAB-CREATED DIAMONDS &gt;</div></div></div></div></a>
					</div>
				</div>
			</div>
			<div class="men-menu">
				<div class="sub-menu-container--1cQ-G">
					<div class="sub-menu--cBN8i fine-jewelry-react-sub--30urw">
						<div class="main-container--2PI0W row--35tYP">
							<div class="menu-column--147Lw">
								<div class="menu-unit--140vM design-your-own--2JENm" style="text-transform:capitalize">
									<div class="menu-unit-title--2s99-">Men Styles</div>
									<div class="row--35tYP">
										<ul style="text-transform:capitalize" class="ul-column--1KfUm">
											<li><a data-container="#WidePane" data-qa="diamond_rings" href="<?php echo SITE_URL; ?>diamonds/men_diamond_rings/diamond_rings"><span>Diamond Rings</span></a></li>
											<li><a data-container="#WidePane" data-qa="luxurman_diamond_rings" href="<?php echo SITE_URL; ?>diamonds/men_diamond_rings/luxurman_diamond_rings"><span>Luxurman Diamond Rings</span></a></li>
											<li><a data-container="#WidePane" data-qa="wedding_rings" href="<?php echo SITE_URL; ?>diamonds/men_diamond_rings/wedding_rings"><span>Wedding Rings</span></a></li>
											<li><a data-container="#WidePane" data-qa="black_onyx_rings" href="<?php echo SITE_URL; ?>diamonds/men_diamond_rings/black_onyx_rings"><span>Black Onyx Rings</span></a></li>
											<li><a data-container="#WidePane" data-qa="diamond_eternity_bands" href="<?php echo SITE_URL; ?>diamonds/men_diamond_rings/diamond_eternity_bands"><span>Diamond Eternity Bands</span></a></li>
											<li><a data-container="#WidePane" data-qa="gold_rings" href="<?php echo SITE_URL; ?>diamonds/men_diamond_rings/gold_rings"><span>Gold Rings</span></a></li>
											<li><a data-container="#WidePane" data-qa="diamond_engagement_rings" href="<?php echo SITE_URL; ?>diamonds/men_diamond_rings/diamond_engagement_rings"><span>Diamond Engagement Rings</span></a></li>
											<li><a data-container="#WidePane" data-qa="luxurman_diamond_wedding_bands" href="<?php echo SITE_URL; ?>diamonds/men_diamond_rings/luxurman_diamond_wedding_bands"><span>Luxurman Diamond Wedding Bands</span></a></li>
											<li><a data-container="#WidePane" data-qa="three_stone_engagement_rings" href="<?php echo SITE_URL; ?>diamonds/men_diamond_rings/three_stone_engagement_rings"><span>Three Stone Engagement Rings</span></a></li>
											<li><a data-container="#WidePane" data-qa="mens_sterling_slver_rings" href="<?php echo SITE_URL; ?>diamonds/men_diamond_rings/mens_sterling_slver_rings"><span>Mens Sterling Silver Rings</span></a></li>
											<li><a data-container="#WidePane" data-qa="bridal_ring_sets" href="<?php echo SITE_URL; ?>diamonds/men_diamond_rings/bridal_ring_sets"><span>Bridal Ring Sets</span></a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="menu-column--147Lw">
								<div class="menu-unit--140vM ready-to-ship--5tov6" style="text-transform:capitalize">
									<div class="menu-unit-title--2s99-">bracelets</div>
									<div class="row--35tYP">
										<ul style="text-transform:capitalize" class="ul-column--1KfUm">
											<li><a data-container="#WidePane" data-qa="ready_to_ship_tennis_bracelets" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/diamond_bracelets" class="class-icon--37NL7 icon-tennis-bracelets"><span>Diamond Bracelets</span></a></li>
											<li><a data-container="#WidePane" data-qa="ready_to_ship_diamond_bracelets" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/wg_diamond_bracelets" class="class-icon--37NL7 icon-Bracelets"><span>Gold Bracelets(w/Diamond)</span></a></li>
											<li><a data-container="#WidePane" data-qa="ready_to_ship_diamond_bracelets" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/bracelets_landing_page" class="class-icon--37NL7 icon-Bracelets"><span>Bracelets Landing Page</span></a></li>
										</ul>
									</div>
								</div>
								<div class="menu-unit--140vM ready-to-ship--5tov6" style="text-transform:capitalize">
									<div class="menu-unit-title--2s99-">Luxury Watches</div>
									<div class="row--35tYP">
										<ul style="text-transform:capitalize" class="ul-column--1KfUm">
											<li><a data-container="#WidePane" data-qa="birthstones_gifts" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/gucci"><span>Gucci</span></a></li>
											<li><a data-container="#WidePane" data-qa="gifts_under_500" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/luxury_watches"><span>Luxury Watches Landing Pages</span></a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="menu-column--147Lw">
								<div class="menu-unit--140vM ready-to-ship--5tov6" style="text-transform:capitalize">
									<div class="menu-unit-title--2s99-">Religious Pendants</div>
									<div class="row--35tYP">
										<ul style="text-transform:capitalize" class="ul-column--1KfUm">
											<li><a data-container="#WidePane" data-qa="ready_to_ship_anniversary_rings" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/jesus_pendants" class="class-icon--37NL7 icon-Pendants_DYO"><span>Jesus Pendants</span></a></li>
											<li><a data-container="#WidePane" data-qa="ready_to_ship_anniversary_rings" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/heart_pendants" class="class-icon--37NL7 icon-Pendants_DYO"><span>Heart Shape Pendant</span></a></li>
											<li><a data-container="#WidePane" data-qa="ready_to_ship_anniversary_rings" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/infinity_pendants" class="class-icon--37NL7 icon-Pendants_DYO"><span>Infinity Design Pendant</span></a></li>
											<li><a data-container="#WidePane" data-qa="ready_to_ship_anniversary_rings" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/landing_pendants" class="class-icon--37NL7 icon-Pendants_DYO"><span>Pendants Landing Page</span></a></li>
											<li><a data-container="#WidePane" data-qa="ready_to_ship_anniversary_rings" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/designer_pendants" class="class-icon--37NL7 icon-Pendants_DYO"><span>Designer Pendants</span></a></li>
											<li><a data-container="#WidePane" data-qa="ready_to_ship_anniversary_rings" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/custom_diamond_pendants" class="class-icon--37NL7 icon-Pendants_DYO"><span>Custom Diamond Pendants</span></a></li>
											<li><a data-container="#WidePane" data-qa="ready_to_ship_anniversary_rings" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/miscellaneous_pendants" class="class-icon--37NL7 icon-Pendants_DYO"><span>Miscellaneous Pendants</span></a></li>
											<li><a data-container="#WidePane" data-qa="ready_to_ship_anniversary_rings" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/cartoonNemoji_pendants" class="class-icon--37NL7 icon-Pendants_DYO"><span>Cartoon & Emoji Pendants</span></a></li>
											<li><a data-container="#WidePane" data-qa="ready_to_ship_anniversary_rings" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/initial_diamond_pendants" class="class-icon--37NL7 icon-Pendants_DYO"><span>Initial Diamond Pendants</span></a></li>
											<li><a data-container="#WidePane" data-qa="ready_to_ship_anniversary_rings" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/dog_tags_pendants" class="class-icon--37NL7 icon-Pendants_DYO"><span>Dog Tags Pendants</span></a></li>
											<li><a data-container="#WidePane" data-qa="ready_to_ship_anniversary_rings" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/memoryNcoin_pendants" class="class-icon--37NL7 icon-Pendants_DYO"><span>Memory & Coin Pendants</span></a></li>
											<li><a data-container="#WidePane" data-qa="ready_to_ship_anniversary_rings" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/solitaire_pendants" class="class-icon--37NL7 icon-Pendants_DYO"><span>Solitaire Pendants</span></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<a data-ajax-mode="disabled" href="/fine-jewelry/"><div title="" class="sub-menu--cBN8i fine-jewelry-react-sub--30urw menu-image-bg--smxT7"></div></a>
					</div>
				</div>
			</div>
			<div class="women-menu">
				<div class="sub-menu-container--1cQ-G">
					<div class="sub-menu--cBN8i fine-jewelry-react-sub--30urw">
						<div class="main-container--2PI0W row--35tYP">
							<div class="menu-column--147Lw">
								<div class="menu-unit--140vM ready-to-ship--5tov6" style="text-transform:capitalize">
									<div class="menu-unit-title--2s99-">Women</div>
									<div class="row--35tYP">
										<ul style="text-transform:capitalize" class="ul-column--1KfUm">
											<li><a data-container="#WidePane" data-qa="diamond_studs-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/diamond_studs" class="class-icon--37NL7 icon-Studs2"><span>diamond studs</span></a></li>
											<li><a data-container="#WidePane" data-qa="diamond_earrings-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/diamond_earrings" class="class-icon--37NL7 icon-Studs"><span>diamond earrings</span></a></li>
										</ul>
									</div>
								</div>
								<div class="menu-unit--140vM design-your-own--2JENm" style="text-transform:capitalize">
									<div class="menu-unit-title--2s99-">Necklaces</div>
									<div class="row--35tYP">
										<ul style="text-transform:capitalize" class="ul-column--1KfUm">
											<li><a data-container="#WidePane" data-qa="diamond_necklaces" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/wg-necklaces" class="class-icon--37NL7 icon-Pendants"><span>White Gold necklaces</span></a></li>
											<li><a data-container="#WidePane" data-qa="cuban_necklaces" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/rg-necklaces" class="class-icon--37NL7 icon-Pendant-gem"><span>Rose Gold necklaces</span></a></li>
											<li><a data-container="#WidePane" data-qa="tennis_necklaces" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/ss-necklaces" class="class-icon--37NL7 icon-Pearl_Necklaces"><span>Sterling Silver necklaces</span></a></li>
											<li><a data-container="#WidePane" data-qa="rosary_necklaces" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/yg-necklaces" class="class-icon--37NL7 icon-Pendants"><span>Yellow Gold Necklaces</span></a></li>
											<li><a data-container="#WidePane" data-qa="designer_necklaces" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/ttg-necklaces" class="class-icon--37NL7 icon-Pendant-gem"><span>Two-Tone Gold necklaces</span></a></li>
											<li><a data-container="#WidePane" data-qa="designer_necklaces" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/ygNss-necklaces" class="class-icon--37NL7 icon-Pendant-gem"><span>Yellow Gold & Sterling Silver necklaces</span></a></li>
											<li><a data-container="#WidePane" data-qa="designer_necklaces" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/tcg-necklaces" class="class-icon--37NL7 icon-Pendant-gem"><span>Tri-Color Gold necklaces</span></a></li>
											<li><a data-container="#WidePane" data-qa="designer_necklaces" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/wNrg-necklaces" class="class-icon--37NL7 icon-Pendant-gem"><span>White & Rose Gold necklaces</span></a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="menu-column--147Lw">
								<div class="menu-unit--140vM ready-to-ship--5tov6" style="text-transform:capitalize">
									<div class="menu-unit-title--2s99-">bracelets</div>
									<div class="row--35tYP">
										<ul style="text-transform:capitalize" class="ul-column--1KfUm">
											<li><a data-container="#WidePane" data-qa="ready_to_ship_tennis_bracelets" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/wg-bracelets" class="class-icon--37NL7 icon-tennis-bracelets"><span>White Gold bracelets</span></a></li>
											<li><a data-container="#WidePane" data-qa="ready_to_ship_diamond_bracelets" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/rg-bracelets" class="class-icon--37NL7 icon-Bracelets"><span>Rose Gold bracelets</span></a></li>
											<li><a data-container="#WidePane" data-qa="ready_to_ship_gemstone_bracelets" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/ss-bracelets" class="class-icon--37NL7 icon-Bracelets-gems"><span>Sterling Silver bracelets</span></a></li>
											<li><a data-container="#WidePane" data-qa="ready_to_ship_pearl_bracelets" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/yg-bracelets" class="class-icon--37NL7 icon-Pearl_Bracelets"><span>Yellow Gold bracelets</span></a></li>
											<li><a data-container="#WidePane" data-qa="ready_to_ship_tennis_bracelets" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/ttg-bracelets" class="class-icon--37NL7 icon-tennis-bracelets"><span>Two-Tone Gold Bracelet</span></a></li>
											<li><a data-container="#WidePane" data-qa="ready_to_ship_tennis_bracelets" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/ygNss-bracelets" class="class-icon--37NL7 icon-tennis-bracelets"><span>Yellow Gold & Sterling Silver bracelets</span></a></li>
											<li><a data-container="#WidePane" data-qa="ready_to_ship_diamond_bracelets" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/tcg-bracelets" class="class-icon--37NL7 icon-Bracelets"><span>Tri-Color Gold bracelets</span></a></li>
											<li><a data-container="#WidePane" data-qa="ready_to_ship_gemstone_bracelets" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/rgNss-bracelets" class="class-icon--37NL7 icon-Bracelets-gems"><span>Rose Gold & Sterling Silver bracelets</span></a></li>
										</ul>
									</div>
								</div>
								<div class="menu-unit--140vM design-your-own--2JENm" style="text-transform:capitalize">
									<div class="menu-unit-title--2s99-">design your own</div>
									<div class="row--35tYP">
										<ul style="text-transform:capitalize" class="ul-column--1KfUm">
											<li><a data-container="#WidePane" data-qa="design_your_own_earrings-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/" class="class-icon--37NL7 icon-Studs_DYO"><span>design your own earrings</span></a></li>
											<li><a data-container="#WidePane" data-qa="design_your_own_pendant-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/" class="class-icon--37NL7 icon-Pendants_DYO"><span>design your own pendant</span></a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="menu-column--147Lw">
								<div class="menu-unit--140vM ready-to-ship--5tov6" style="text-transform:capitalize">
									<div class="menu-unit-title--2s99-">Rings</div>
									<div class="row--35tYP">
										<ul style="text-transform:capitalize" class="ul-column--1KfUm">
											<li><a data-container="#WidePane" data-qa="ready_to_ship_anniversary_rings" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/wg-rings" class="class-icon--37NL7 icon-anniversary class-icon-anniversary--2hVxF"><span>White Gold Rings</span></a></li>
											<li><a data-container="#WidePane" data-qa="ready_to_ship_diamond_rings" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/rg-rings" class="class-icon--37NL7 icon-Royal_ring"><span>Rose Gold rings</span></a></li>
											<li><a data-container="#WidePane" data-qa="ready_to_ship_gemstone_rings" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/ss-rings" class="class-icon--37NL7 icon-Ring-gem"><span>Sterling Silver rings</span></a></li>
											<li><a data-container="#WidePane" data-qa="ready_to_ship_pearl_rings" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/yg-rings" class="class-icon--37NL7 icon-Pearl_Rings"><span>Yellow Gold rings</span></a></li>
											<li><a data-container="#WidePane" data-qa="ready_to_ship_anniversary_rings" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/ttg-rings" class="class-icon--37NL7 icon-anniversary class-icon-anniversary--2hVxF"><span>Two-Tone Gold Rings</span></a></li>
											<li><a data-container="#WidePane" data-qa="ready_to_ship_diamond_rings" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/ygNss-rings" class="class-icon--37NL7 icon-Royal_ring"><span>Yellow Gold & Sterling Silver rings</span></a></li>
											<li><a data-container="#WidePane" data-qa="ready_to_ship_gemstone_rings" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/wNrg-rings" class="class-icon--37NL7 icon-Ring-gem"><span>White & Rose Gold rings</span></a></li>
										</ul>
									</div>
								</div>
								<div class="menu-unit--140vM ready-to-ship--5tov6" style="text-transform:capitalize">
									<div class="menu-unit-title--2s99-">GIFTS</div>
									<div class="row--35tYP">
										<ul style="text-transform:capitalize" class="ul-column--1KfUm">
											<li><a data-container="#WidePane" data-qa="gifts_under_500" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/"><span>Gifts Under $500</span></a></li>
											<li><a data-container="#WidePane" data-qa="gifts_under_1000" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/"><span>Gifts Under $1000</span></a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="menu-column--147Lw">
								<div class="menu-unit--140vM ready-to-ship--5tov6" style="text-transform:capitalize">
									<div class="menu-unit-title--2s99-">Shop By Carol Collection</div>
									<div class="row--35tYP">
										<ul style="text-transform:capitalize" class="ul-column--1KfUm">
											<li><a data-container="#WidePane" data-qa="ready_to_ship_tennis_bracelets" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/color-fashion" class="class-icon--37NL7 icon-tennis-bracelets"><span>Color Fashion</span></a></li>
											<li><a data-container="#WidePane" data-qa="ready_to_ship_diamond_bracelets" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/diamond-fashion" class="class-icon--37NL7 icon-Bracelets"><span>Diamond Fashion</span></a></li>
											<li><a data-container="#WidePane" data-qa="ready_to_ship_gemstone_bracelets" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/bridal-completes" class="class-icon--37NL7 icon-Bracelets-gems"><span>Bridal Completes</span></a></li>
											<li><a data-container="#WidePane" data-qa="ready_to_ship_pearl_bracelets" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/wedding-bands" class="class-icon--37NL7 icon-Pearl_Bracelets"><span>Wedding Bands</span></a></li>
											<li><a data-container="#WidePane" data-qa="ready_to_ship_tennis_bracelets" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/new-arrivals" class="class-icon--37NL7 icon-tennis-bracelets"><span>New Arrivals</span></a></li>
										</ul>
									</div>
								</div>
								<div class="menu-unit--140vM design-your-own--2JENm" style="text-transform:capitalize">
									<div class="menu-unit-title--2s99-">Shop By Oneil Collection</div>
									<div class="row--35tYP">
										<ul style="text-transform:capitalize" class="ul-column--1KfUm">
											<li><a data-container="#WidePane" data-qa="ready_to_ship_tennis_bracelets" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/bracelets" class="class-icon--37NL7 icon-tennis-bracelets"><span>Bracelets</span></a></li>
											<li><a data-container="#WidePane" data-qa="ready_to_ship_diamond_bracelets" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/earrings" class="class-icon--37NL7 icon-Bracelets"><span>Earrings</span></a></li>
											<li><a data-container="#WidePane" data-qa="ready_to_ship_gemstone_bracelets" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/necklaces" class="class-icon--37NL7 icon-Bracelets-gems"><span>Necklaces</span></a></li>
											<li><a data-container="#WidePane" data-qa="ready_to_ship_pearl_bracelets" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/pendants" class="class-icon--37NL7 icon-Pearl_Bracelets"><span>Pendants</span></a></li>
											<li><a data-container="#WidePane" data-qa="ready_to_ship_tennis_bracelets" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/wedding-o-bands" class="class-icon--37NL7 icon-tennis-bracelets"><span>Wedding Bands</span></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<?php /* <a data-ajax-mode="disabled" href="/fine-jewelry/"><div title="" class="sub-menu--cBN8i fine-jewelry-react-sub--30urw menu-image-bg--smxT7"></div></a> */ ?>
					</div>
				</div>
			</div>
			<div class="engagement-rings-menu">
				<div class="sub-menu-container--1cQ-G">
					<div class="sub-menu--cBN8i engagement-rings-sub--gxocv">
						<div class="main-container--2PI0W row--35tYP">
							<div class="menu-column--147Lw">
								<div class="menu-unit--140vM design-your-own--2JENm" style="text-transform:capitalize">
									<div class="menu-unit-title--2s99-">design your own engagement ring</div>
									<div class="row--35tYP">
										<ul style="text-transform:capitalize" class="ul-column--1KfUm">
											<li><a data-container="#WidePane" data-qa="start_with_a_setting-engagement_ring" href="<?php echo SITE_URL; ?>diamonds/engagement-rings/all-settings" class="class-icon--37NL7 icon-Ring_DYO"><span>start with a setting</span></a></li>
											<li><a data-container="#WidePane" data-qa="start_with_a_diamond-engagement_ring" href="<?php echo SITE_URL; ?>diamonds/loose-diamonds/all-diamonds" class="class-icon--37NL7 icon-Diamond_DYO"><span>start with a diamond</span></a></li>
											<?php /* <li><a data-container="#WidePane" data-qa="start_with_a_lab_created_diamond_-engagement_ring" href="/loose-diamonds/lab-created-diamonds/" class="class-icon--37NL7 icon-Diamond_DYO lab-color--3oZOJ"><span>start with a lab-created diamond</span></a></li>
											<li><a data-container="#WidePane" data-qa="start_with_a_gemstone-engagement_ring" href="/gemstones/blue-sapphire/" class="class-icon--37NL7 icon-Fancy"><span>start with a gemstone</span></a></li> */ ?>
										</ul>
									</div>
								</div>
								<div class="menu-unit--140vM undefined" style="text-transform:capitalize">
									<div class="menu-unit-title--2s99-">Get inspired by customer's rings</div>
									<div class="row--35tYP">
										<ul style="text-transform:capitalize" class="ul-column--1KfUm">
											<li><a data-container="#WidePane" data-qa="round_cut_rings" href="<?php echo SITE_URL; ?>diamonds/engagement-rings/round-cut-rings"><span>round cut rings</span></a></li>
											<li><a data-container="#WidePane" data-qa="princess_cut_rings" href="<?php echo SITE_URL; ?>diamonds/engagement-rings/princess-cut-rings"><span>princess cut rings</span></a></li>
											<li><a data-container="#WidePane" data-qa="cushion_cut_rings" href="<?php echo SITE_URL; ?>diamonds/engagement-rings/cushion-cut-rings"><span>cushion cut rings</span></a></li>
											<li><a data-container="#WidePane" data-qa="all_other_shapes" href="<?php echo SITE_URL; ?>diamonds/engagement-rings"><span>all other shapes</span></a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="menu-column--147Lw">
								<div class="menu-unit--140vM engagement-rings-styles--16bTs" style="text-transform:capitalize">
									<div class="menu-unit-title--2s99-">engagement ring styles</div>
									<div class="row--35tYP">
										<ul style="text-transform:capitalize" class="ul-column--1KfUm">
											<li><a data-container="#WidePane" data-qa="solitaire" href="<?php echo SITE_URL; ?>diamonds/engagement-rings/solitaire" class="class-icon--37NL7 icon-solitaire"><span>Solitaire</span></a></li>
											<li><a data-container="#WidePane" data-qa="Pave" href="<?php echo SITE_URL; ?>diamonds/engagement-rings/pave" class="class-icon--37NL7 icon-pave"><span>Pavé</span></a></li>
											<li><a data-container="#WidePane" data-qa="channel_set" href="<?php echo SITE_URL; ?>diamonds/engagement-rings/channel-set" class="class-icon--37NL7 icon-channel"><span>Channel-Set</span></a></li>
											<li><a data-container="#WidePane" data-qa="side_stone" href="<?php echo SITE_URL; ?>diamonds/engagement-rings/side-stones" class="class-icon--37NL7 icon-side-stone"><span>Side-Stone</span></a></li>
										</ul>
										<ul style="text-transform:capitalize" class="ul-column--1KfUm">
											<li><a data-container="#WidePane" data-qa="tension" href="<?php echo SITE_URL; ?>diamonds/engagement-rings/tension" class="class-icon--37NL7 icon-tension"><span>Tension</span></a></li>
											<li><a data-container="#WidePane" data-qa="vintage" href="<?php echo SITE_URL; ?>diamonds/engagement-rings/vintage" class="class-icon--37NL7 icon-vintage"><span>Vintage</span></a></li>
											<li><a data-container="#WidePane" data-qa="halo" href="<?php echo SITE_URL; ?>diamonds/engagement-rings/halo" class="class-icon--37NL7 icon-halo"><span>Halo</span></a></li>
											<li><a data-container="#WidePane" data-qa="three_stone" href="<?php echo SITE_URL; ?>diamonds/engagement-rings/three-stone" class="class-icon--37NL7 icon-tree-stone"><span>Three-Stone</span></a></li>
										</ul>
									</div>
								</div>
								<div class="menu-unit--140vM undefined" style="text-transform:capitalize">
									<div class="menu-unit-title--2s99-">Setting style</div>
									<div class="row--35tYP">
										<ul style="text-transform:capitalize" class="ul-column--1KfUm">
											<li><a data-container="#WidePane" data-qa="round_cut_rings" href="<?php echo SITE_URL; ?>diamonds/engagement-rings/Classic Trellis"><span>Classic Trellis</span></a></li>
											<li><a data-container="#WidePane" data-qa="princess_cut_rings" href="<?php echo SITE_URL; ?>diamonds/engagement-rings/Classic with Accents"><span>Classic with Accents</span></a></li>
											<li><a data-container="#WidePane" data-qa="cushion_cut_rings" href="<?php echo SITE_URL; ?>diamonds/engagement-rings/Four-Diamonds Row"><span>Four-Diamonds Row</span></a></li>
											<li><a data-container="#WidePane" data-qa="princess_cut_rings" href="<?php echo SITE_URL; ?>diamonds/engagement-rings/Milgrains"><span>Milgrains</span></a></li>
											<li><a data-container="#WidePane" data-qa="cushion_cut_rings" href="<?php echo SITE_URL; ?>diamonds/engagement-rings/Split Shank"><span>Split Shank</span></a></li>
											<li><a data-container="#WidePane" data-qa="all_other_shapes" href="<?php echo SITE_URL; ?>diamonds/engagement-rings"><span>All Other Designs</span></a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="menu-column--147Lw">
								<div class="menu-unit--140vM undefined" style="text-transform:capitalize">
									<div class="menu-unit-title--2s99-">shop by metal</div>
									<div class="row--35tYP">
										<ul style="text-transform:capitalize" class="ul-column--1KfUm">
											<li><a data-container="#WidePane" data-qa="white_gold" href="<?php echo SITE_URL; ?>diamonds/engagement-rings/white-gold" class="class-icon--37NL7 icon-metal class-white-gold--14E5n"><span>white gold</span></a></li>
											<li><a data-container="#WidePane" data-qa="yellow_gold" href="<?php echo SITE_URL; ?>diamonds/engagement-rings/yellow-gold" class="class-icon--37NL7 icon-metal class-yellow-gold--3oTCE"><span>yellow gold</span></a></li>
											<li><a data-container="#WidePane" data-qa="platinum" href="<?php echo SITE_URL; ?>diamonds/engagement-rings/platinum" class="class-icon--37NL7 icon-metal class-icon-platinum--3EOrn"><span>platinum</span></a></li>
										</ul>
									</div>
								</div>
								<div class="menu-unit--140vM undefined" style="text-transform:capitalize">
									<div class="menu-unit-title--2s99-">setting type</div>
									<div class="row--35tYP">
										<ul style="text-transform:capitalize" class="ul-column--1KfUm">
											<li><a data-container="#WidePane" data-qa="diamond_rings" href="<?php echo SITE_URL; ?>diamonds/engagement-rings/Bezel & Pave"><span>Bezel & Pave</span></a></li>
											<li><a data-container="#WidePane" data-qa="gemstone_rings" href="<?php echo SITE_URL; ?>diamonds/engagement-rings/Channel"><span>Channel</span></a></li>
											<li><a data-container="#WidePane" data-qa="diamond_rings" href="<?php echo SITE_URL; ?>diamonds/engagement-rings/Prong"><span>Prong</span></a></li>
											<li><a data-container="#WidePane" data-qa="gemstone_rings" href="<?php echo SITE_URL; ?>diamonds/engagement-rings/Prong & Bezel"><span>Prong & Bezel</span></a></li>
											<li><a data-container="#WidePane" data-qa="gemstone_rings" href="<?php echo SITE_URL; ?>diamonds/engagement-rings"><span>All other setting types</span></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<a data-ajax-mode="disabled" href="<?php echo SITE_URL; ?>diamonds/engagement-rings"><div title="" class="sub-menu--cBN8i engagement-rings-sub--gxocv menu-image-bg--smxT7"></div></a>
					</div>
				</div>
			</div>
			<div class="jewelry-menu">
				<div class="sub-menu-container--1cQ-G">
					<div class="sub-menu--cBN8i fine-jewelry-react-sub--30urw">
						<div class="main-container--2PI0W row--35tYP">
							<div class="menu-column--147Lw">
								<div class="menu-unit--140vM ready-to-ship--5tov6" style="text-transform:capitalize">
									<div class="menu-unit-title--2s99-">Necklaces</div>
									<div class="row--35tYP">
										<ul style="text-transform:capitalize" class="ul-column--1KfUm">
											<li><a data-container="#WidePane" data-qa="diamond_studs-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/gold_necklaces"><span>Gold Chains</span></a></li>
											<li><a data-container="#WidePane" data-qa="diamond_earrings-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/diamond_necklaces"><span>Diamond Chains</span></a></li>
											<li><a data-container="#WidePane" data-qa="diamond_studs-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/ss_necklaces"><span>Sterling Silver Chains</span></a></li>
											<li><a data-container="#WidePane" data-qa="diamond_earrings-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/landing_necklaces"><span>Necklaces Landing Page</span></a></li>
											<li><a data-container="#WidePane" data-qa="diamond_studs-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/cuban_necklaces"><span>Cuban Chains</span></a></li>
											<li><a data-container="#WidePane" data-qa="diamond_earrings-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/tennis_necklaces"><span>Tennis Chains</span></a></li>
											<li><a data-container="#WidePane" data-qa="diamond_studs-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/rosary_necklaces"><span>Rosary Necklaces</span></a></li>
											<li><a data-container="#WidePane" data-qa="diamond_earrings-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/designer_necklaces"><span>Ladies Designer Necklaces</span></a></li>
										</ul>
									</div>
								</div>
								<div class="menu-unit--140vM design-your-own--2JENm" style="text-transform:capitalize">
									<div class="menu-unit-title--2s99-">Bracelets</div>
									<div class="row--35tYP">
										<ul style="text-transform:capitalize" class="ul-column--1KfUm">
											<li><a data-container="#WidePane" data-qa="diamond_studs-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/diamond_bracelets"><span>Diamond Bracelets</span></a></li>
											<li><a data-container="#WidePane" data-qa="diamond_studs-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/wg_diamond_bracelets"><span>Gold Bracelets (w/o Diamond)</span></a></li>
											<li><a data-container="#WidePane" data-qa="diamond_studs-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/designer_bracelets"><span>Ladies Designer Bracelet</span></a></li>
											<li><a data-container="#WidePane" data-qa="diamond_studs-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/bracelets_landing_page"><span>Bracelets Landing Page</span></a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="menu-column--147Lw">
								<div class="menu-unit--140vM ready-to-ship--5tov6" style="text-transform:capitalize">
									<div class="menu-unit-title--2s99-">Pendants</div>
									<div class="row--35tYP">
										<ul style="text-transform:capitalize" class="ul-column--1KfUm">
											<li><a data-container="#WidePane" data-qa="diamond_studs-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/religious_pendants"><span>Religious Pendants</span></a></li>
											<li><a data-container="#WidePane" data-qa="diamond_studs-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/jesus_pendants"><span>Jesus Pendants</span></a></li>
											<li><a data-container="#WidePane" data-qa="diamond_studs-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/heart_pendants"><span>Heart Shape Pendant</span></a></li>
											<li><a data-container="#WidePane" data-qa="diamond_studs-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/infinity_pendants"><span>Infinity Design Pendant</span></a></li>
											<li><a data-container="#WidePane" data-qa="diamond_studs-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/landing_pendants"><span>Pendants Landing Page</span></a></li>
											<li><a data-container="#WidePane" data-qa="diamond_studs-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/designer_pendants"><span>Designer Pendants</span></a></li>
											<li><a data-container="#WidePane" data-qa="diamond_studs-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/custom_diamond_pendants"><span>Custom Diamond Pendants</span></a></li>
											<li><a data-container="#WidePane" data-qa="diamond_studs-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/miscellaneous_pendants"><span>Miscellaneous Pendants</span></a></li>
											<li><a data-container="#WidePane" data-qa="diamond_studs-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/cartoonNemoji_pendants"><span>Cartoon & Emoji Pendants</span></a></li>
											<li><a data-container="#WidePane" data-qa="diamond_studs-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/initial_diamond_pendants"><span>Initial Diamond Pendants</span></a></li>
											<li><a data-container="#WidePane" data-qa="diamond_studs-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/dog_tags_pendants"><span>Dog Tags Pendants</span></a></li>
											<li><a data-container="#WidePane" data-qa="diamond_studs-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/memoryNcoin_pendants"><span>Memory & Coin Pendants</span></a></li>
											<li><a data-container="#WidePane" data-qa="diamond_studs-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/solitaire_pendants"><span>Solitaire Pendants</span></a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="menu-column--147Lw">
								<div class="menu-unit--140vM ready-to-ship--5tov6" style="text-transform:capitalize">
									<div class="menu-unit-title--2s99-">Earrings</div>
									<div class="row--35tYP">
										<ul style="text-transform:capitalize" class="ul-column--1KfUm">
											<li><a data-container="#WidePane" data-qa="ready_to_ship_anniversary_rings" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/diamond_studs"><span>Stud Earrings</span></a></li>
											<li><a data-container="#WidePane" data-qa="ready_to_ship_diamond_rings" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/diamond_earrings"><span>Diamond Earrings</span></a></li>
										</ul>
									</div>
								</div>
								<div class="menu-unit--140vM design-your-own--2JENm" style="text-transform:capitalize">
									<div class="menu-unit-title--2s99-">Luxury Watches</div>
									<div class="row--35tYP">
										<ul style="text-transform:capitalize" class="ul-column--1KfUm">
											<li><a data-container="#WidePane" data-qa="design_your_own_earrings-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/gucci"><span>Gucci</span></a></li>
											<li><a data-container="#WidePane" data-qa="design_your_own_pendant-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/luxury_watches"><span>Luxury Watches Landing Page</span></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<a data-ajax-mode="disabled" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry"><div title="" class="sub-menu--cBN8i fine-jewelry-react-sub--30urw menu-image-bg--smxT7"></div></a>
					</div>
				</div>
			</div>
			<div class="clearance-menu">
				<div class="sub-menu-container--1cQ-G">
					<div class="sub-menu--cBN8i fine-jewelry-react-sub--30urw">
						<div class="main-container--2PI0W row--35tYP">
							<div class="menu-column--147Lw">
								<div class="menu-unit--140vM ready-to-ship--5tov6" style="text-transform:capitalize">
									<div class="menu-unit-title--2s99-">Women</div>
									<div class="row--35tYP">
										<ul style="text-transform:capitalize" class="ul-column--1KfUm">
											<li><a data-container="#WidePane" data-qa="diamond_studs-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/" class="class-icon--37NL7 icon-Studs2"><span>diamond studs</span></a></li>
											<li><a data-container="#WidePane" data-qa="diamond_earrings-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/" class="class-icon--37NL7 icon-Studs"><span>diamond earrings</span></a></li>
										</ul>
									</div>
								</div>
								<div class="menu-unit--140vM design-your-own--2JENm" style="text-transform:capitalize">
									<div class="menu-unit-title--2s99-">necklaces</div>
									<div class="row--35tYP">
										<ul style="text-transform:capitalize" class="ul-column--1KfUm">
											<li><a data-container="#WidePane" data-qa="diamond_necklaces" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/" class="class-icon--37NL7 icon-Pendants"><span>diamond necklaces</span></a></li>
											<li><a data-container="#WidePane" data-qa="gemstones_necklaces" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/" class="class-icon--37NL7 icon-Pendant-gem"><span>gemstones necklaces</span></a></li>
											<li><a data-container="#WidePane" data-qa="pearl_necklaces" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/" class="class-icon--37NL7 icon-Pearl_Necklaces"><span>pearl necklaces</span></a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="menu-column--147Lw">
								<div class="menu-unit--140vM ready-to-ship--5tov6" style="text-transform:capitalize">
									<div class="menu-unit-title--2s99-">bracelets</div>
									<div class="row--35tYP">
										<ul style="text-transform:capitalize" class="ul-column--1KfUm">
											<li><a data-container="#WidePane" data-qa="ready_to_ship_tennis_bracelets" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/" class="class-icon--37NL7 icon-tennis-bracelets"><span>tennis bracelets</span></a></li>
											<li><a data-container="#WidePane" data-qa="ready_to_ship_diamond_bracelets" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/" class="class-icon--37NL7 icon-Bracelets"><span>diamond bracelets</span></a></li>
											<li><a data-container="#WidePane" data-qa="ready_to_ship_gemstone_bracelets" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/" class="class-icon--37NL7 icon-Bracelets-gems"><span>gemstone bracelets</span></a></li>
											<li><a data-container="#WidePane" data-qa="ready_to_ship_pearl_bracelets" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/" class="class-icon--37NL7 icon-Pearl_Bracelets"><span>pearl bracelets</span></a></li>
										</ul>
									</div>
								</div>
								<div class="menu-unit--140vM ready-to-ship--5tov6" style="text-transform:capitalize">
									<div class="menu-unit-title--2s99-">Rings</div>
									<div class="row--35tYP">
										<ul style="text-transform:capitalize" class="ul-column--1KfUm">
											<li><a data-container="#WidePane" data-qa="ready_to_ship_anniversary_rings" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/" class="class-icon--37NL7 icon-anniversary class-icon-anniversary--2hVxF"><span>Anniversary Rings</span></a></li>
											<li><a data-container="#WidePane" data-qa="ready_to_ship_diamond_rings" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/" class="class-icon--37NL7 icon-Royal_ring"><span>diamond rings</span></a></li>
											<li><a data-container="#WidePane" data-qa="ready_to_ship_gemstone_rings" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/" class="class-icon--37NL7 icon-Ring-gem"><span>gemstone rings</span></a></li>
											<li><a data-container="#WidePane" data-qa="ready_to_ship_pearl_rings" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/" class="class-icon--37NL7 icon-Pearl_Rings"><span>pearl rings</span></a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="menu-column--147Lw">
								<div class="menu-unit--140vM ready-to-ship--5tov6" style="text-transform:capitalize">
									<div class="menu-unit-title--2s99-">GIFTS</div>
									<div class="row--35tYP">
										<ul style="text-transform:capitalize" class="ul-column--1KfUm">
											<li><a data-container="#WidePane" data-qa="birthstones_gifts" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/"><span>Birthstones Gifts</span></a></li>
											<li><a data-container="#WidePane" data-qa="gifts_under_500" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/"><span>Gifts Under $500</span></a></li>
											<li><a data-container="#WidePane" data-qa="gifts_under_1000" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/"><span>Gifts Under $1000</span></a></li>
										</ul>
									</div>
								</div>
								<div class="menu-unit--140vM design-your-own--2JENm" style="text-transform:capitalize">
									<div class="menu-unit-title--2s99-">design your own</div>
									<div class="row--35tYP">
										<ul style="text-transform:capitalize" class="ul-column--1KfUm">
											<li><a data-container="#WidePane" data-qa="design_your_own_earrings-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/" class="class-icon--37NL7 icon-Studs_DYO"><span>design your own earrings</span></a></li>
											<li><a data-container="#WidePane" data-qa="design_your_own_pendant-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/" class="class-icon--37NL7 icon-Pendants_DYO"><span>design your own pendant</span></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<a data-ajax-mode="disabled" href="/fine-jewelry/"><div title="" class="sub-menu--cBN8i fine-jewelry-react-sub--30urw menu-image-bg--smxT7"></div></a>
					</div>
				</div>
			</div>
			<div class="diamond_inner_tabs">
				<?php
				$swn1cls = 'style="display:block"';
				if($ch_menu != ''){
					if($ch_menu == 'white-diamond' || $ch_menu == 'color-diamonds-search'){
						$swn1cls = 'style="display:block"';
					}else{
						$swn1cls = 'style="display:none"';
					}
				}
				?>
				<?php /* <div id ="diamond_sub_menu" class="d_sub_menu" <?= $swn1cls ?>>
					<a href="<?php echo SITE_URL; ?>diamonds/diamonds-search/white-diamond/" style="color:#000;font-size: 14px;">
						<div class="col-sm-2 inner_tabs_hover <?php if($diamond_page_name == 'white-diamond'){echo 'inner_tabs_active'; } ?>">
							White <br>Diamonds
						</div>
					</a>
					<a href="<?php echo SITE_URL; ?>diamonds/color-diamonds-search/" style="color:#000;font-size: 14px;">
						<div class="col-sm-2 inner_tabs_hover <?php if($diamond_page_name == 'color-diamonds-search'){echo 'inner_tabs_active'; } ?>">
							Color <br>Diamonds
						</div>
					</a>
				</div> */ ?>
				<div id ="menu_sub_menu" <?php if($ch_menu != 'men_diamond_rings'){?>style="display:none"<?php }?> class="d_sub_menu">
					<a href="<?php echo SITE_URL().'selection/engagementrings/74';?>" style="color:#000;font-size: 14px;">
						<div class="col-sm-2 inner_tabs_hover <?php if($diamond_page_name == 'white-diamond'){echo 'inner_tabs_active'; } ?>">
							Classic <br>Diamond Men Rings
						</div>
					</a>
					<a href="<?php echo SITE_URL; ?>diamonds/men_diamond_rings/" style="color:#000;font-size: 14px;">
						<div class="col-sm-2 inner_tabs_hover <?php if($diamond_page_name == 'color-diamonds-search'){echo 'inner_tabs_active'; } ?>">
						Modern <br>Diamond Men Rings
						</div>
					</a>
				</div>
				<div id="hols_sub_menu" <?php if($ch_menu != 'fine-jewelry'){?>style="display:none"<?php }?> class="d_sub_menu">
					<a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/" style="color:#000;font-size: 14px;">
						<div class="col-sm-2 inner_tabs_hover <?php if($diamond_page_name == 'fine-jewelry'){echo 'inner_tabs_active'; } ?>">
						Fine<br> Jewelry
						</div>
					</a>
				</div>
				<?php
				$swncls = 'style="display:none"';
				if($ch_menu == 'solitaires-and-halos'){
					$swncls = 'style="display:block"';
				}elseif($ch_menu == 'engagement-rings'){
					$swncls = 'style="display:block"';
				}elseif($ch_menu == 'videos'){
					$swncls = 'style="display:block"';
				}else{
					$swncls = 'style="display:none"';
				}
				?>
				<div id="solle_sub_menu" <?= $swncls?> class="d_sub_menu">
					<?php /* <a href="<?php echo SITE_URL; ?>diamonds/solitaires-and-halos" style="color:#000;font-size: 14px;">
						<div class="col-sm-2 inner_tabs_hover <?php if($diamond_page_name == 'solitaires-and-halos'){echo 'inner_tabs_active'; } ?>">
							Solitaires and <br>Halos
						</div>
					</a> */ ?>
					<a href="<?php echo SITE_URL; ?>diamonds/engagement-rings" style="color:#000;font-size: 14px;">
						<div class="col-sm-2 inner_tabs_hover <?php if($diamond_page_name == 'engagement-rings'){echo 'inner_tabs_active'; } ?>">
							Engagement <br>Rings
						</div>
					</a>
					<a href="<?php echo SITE_URL; ?>diamonds/videos" style="color:#000;font-size: 14px;">
						<div class="col-sm-2 inner_tabs_hover <?php if($diamond_page_name == 'videos'){ echo 'inner_tabs_active'; } ?>" style="vertical-align: middle;padding: 19px 10px;">
							Video
						</div>
					</a>
				</div>
				<div id ="jewellry_sub_menu" <?php if($ch_menu != 'hip_hop_jewelry'){?>style="display:none"<?php }?> class="d_sub_menu">
					<a href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/" style="color:#000;font-size: 14px;">
						<div class="col-sm-2 inner_tabs_hover set_last_tabs <?php if($diamond_page_name == 'quality-gold'){echo 'inner_tabs_active'; } ?>">
						Necklaces
						</div>
					</a>
					<a href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/" style="color:#000;font-size: 14px;">
						<div class="col-sm-2 inner_tabs_hover set_last_tabs <?php if($diamond_page_name == 'quality-gold'){echo 'inner_tabs_active'; } ?>">
						Pendants
						</div>
					</a>
					<a href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/" style="color:#000;font-size: 14px;">
						<div class="col-sm-2 inner_tabs_hover set_last_tabs <?php if($diamond_page_name == 'quality-gold'){echo 'inner_tabs_active'; } ?>">
						Bracelets
						</div>
					</a>
					<a href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/" style="color:#000;font-size: 14px;">
						<div class="col-sm-2 inner_tabs_hover set_last_tabs <?php if($diamond_page_name == 'quality-gold'){echo 'inner_tabs_active'; } ?>">
						Earrings-Womens Rings
						</div>
					</a>
					<a href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/" style="color:#000;font-size: 14px;">
						<div class="col-sm-2 inner_tabs_hover set_last_tabs <?php if($diamond_page_name == 'quality-gold'){echo 'inner_tabs_active'; } ?>">
						Luxury
						</div>
					</a>
					<a href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/" style="color:#000;font-size: 14px;">
						<div class="col-sm-2 inner_tabs_hover set_last_tabs <?php if($diamond_page_name == 'quality-gold'){echo 'inner_tabs_active'; } ?>">
						Watches
						</div>
					</a>
				</div>
				<div id ="clearance_sub_menu" <?php if($ch_menu != 'pre_owned_luxury_bag_diamond'){?>style="display:none"<?php }?> class="d_sub_menu">
					<a href="<?php echo SITE_URL; ?>diamonds/pre_owned_luxury_bag_diamond/" style="color:#000;font-size: 14px;">
						<div class="col-sm-2 inner_tabs_hover set_last_tabs <?php if($diamond_page_name == 'quality-gold'){echo 'inner_tabs_active'; } ?>">
						Pre-Owned Luxury
						</div>
					</a>
					<a href="<?php echo SITE_URL; ?>diamonds/pre_owned_luxury_diamond_timepieces/" style="color:#000;font-size: 14px;">
						<div class="col-sm-2 inner_tabs_hover set_last_tabs <?php if($diamond_page_name == 'quality-gold'){echo 'inner_tabs_active'; } ?>">
						Timepieces
						</div>
					</a>
				</div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
			</div>
		</div>
		<nav class="only-for-mobile-menu" id="showmblemenu">
			<ul>
				<li style="text-align:right;">
					<div class="menucbtn nav-bar" style="background-color: transparent;margin-top: -20px;">
						<a href=""><p class="fa fa-bars" style="font-size: 12px;">Close</p><span></span></a>
					</div>
				</li>
				<li>
					<a href="javascript:;" class="hvr-underline-from-center">Our Collection</a>
				</li>
				<li class="sub-menus">
					<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">Diamonds &nbsp;<b class="fa fa-caret-down"></b></a>
					<ul class="children">
						<li class="innersub-menus">
							<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">design your own engagement ring &nbsp;<b class="fa fa-caret-down"></b></a>
							<ul class="innerchildren">
								<li><a data-container="#WidePane" data-qa="start_with_a_setting-diamonds" href="<?php echo SITE_URL; ?>engagement/search" class="class-icon--37NL7 icon-Ring_DYO"><span>start with a setting</span></a></li>
							</ul>
						</li>
						<li>
							<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase">premier diamond collection</a>
						</li>
						<li class="innersub-menus">
							<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">loose diamonds &nbsp;<b class="fa fa-caret-down"></b></a>
							<ul class="innerchildren">
								<li><a data-container="#WidePane" data-qa="round_loose_diamonds" href="<?php echo SITE_URL; ?>diamonds/diamonds-search/round-cut/" class="class-icon--37NL7 icon-round"><span>round</span></a></li>
								<li><a data-container="#WidePane" data-qa="princess_loose_diamonds" href="<?php echo SITE_URL; ?>diamonds/diamonds-search/princess-cut/" class="class-icon--37NL7 icon-princess"><span>princess</span></a></li>
								<li><a data-container="#WidePane" data-qa="cushion_loose_diamonds" href="<?php echo SITE_URL; ?>diamonds/diamonds-search/cushion-cut/" class="class-icon--37NL7 icon-cushion"><span>cushion</span></a></li>
								<li><a data-container="#WidePane" data-qa="emerald_loose_diamonds" href="<?php echo SITE_URL; ?>diamonds/diamonds-search/emerald-cut/" class="class-icon--37NL7 icon-emerald"><span>emerald</span></a></li>
								<li><a data-container="#WidePane" data-qa="pear_loose_diamonds" href="<?php echo SITE_URL; ?>diamonds/diamonds-search/pear-shaped/" class="class-icon--37NL7 icon-pear"><span>pear</span></a></li>
								<li><a data-container="#WidePane" data-qa="oval_loose_diamonds" href="<?php echo SITE_URL; ?>diamonds/diamonds-search/oval-cut/" class="class-icon--37NL7 icon-oval"><span>oval</span></a></li>
								<li><a data-container="#WidePane" data-qa="radiant_loose_diamonds" href="<?php echo SITE_URL; ?>diamonds/diamonds-search/radiant-cut/" class="class-icon--37NL7 icon-radiant"><span>radiant</span></a></li>
								<li><a data-container="#WidePane" data-qa="asscher_loose_diamonds" href="<?php echo SITE_URL; ?>diamonds/diamonds-search/asscher-cut/" class="class-icon--37NL7 icon-asscher"><span>asscher</span></a></li>
								<li><a data-container="#WidePane" data-qa="marquise_loose_diamonds" href="<?php echo SITE_URL; ?>diamonds/diamonds-search/marquise-cut/" class="class-icon--37NL7 icon-marquise"><span>marquise</span></a></li>
								<li><a data-container="#WidePane" data-qa="heart_loose_diamonds" href="<?php echo SITE_URL; ?>diamonds/diamonds-search/heart-shaped/" class="class-icon--37NL7 icon-heart2"><span>heart</span></a></li>
							</ul>
						</li>
						<li class="innersub-menus">
							<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">fancy color diamonds &nbsp;<b class="fa fa-caret-down"></b></a>
							<ul class="innerchildren">
								<li><a data-container="#WidePane" data-qa="yellow_color_diamonds" href="<?php echo SITE_URL; ?>diamonds/color-diamonds-search/yellow-color" class="class-icon--37NL7 icon-round yellow--37ZPO"><span>yellow</span></a></li>
								<li><a data-container="#WidePane" data-qa="pink_color_diamonds" href="<?php echo SITE_URL; ?>diamonds/color-diamonds-search/pink-color" class="class-icon--37NL7 icon-marquise pink--3gEGn"><span>pink</span></a></li>
								<li><a data-container="#WidePane" data-qa="purple_color_diamonds" href="<?php echo SITE_URL; ?>diamonds/color-diamonds-search/purple-color" class="class-icon--37NL7 icon-heart2 purple--3805f"><span>purple</span></a></li>
								<li><a data-container="#WidePane" data-qa="blue_color_diamonds" href="<?php echo SITE_URL; ?>diamonds/color-diamonds-search/blue-color" class="class-icon--37NL7 icon-oval blue--1tyqL"><span>blue</span></a></li>
								<li><a data-container="#WidePane" data-qa="green_color_diamonds" href="<?php echo SITE_URL; ?>diamonds/color-diamonds-search/green-color" class="class-icon--37NL7 icon-cushion green--2WQCn"><span>green</span></a></li>
								<li><a data-container="#WidePane" data-qa="orange_color_diamonds" href="<?php echo SITE_URL; ?>diamonds/color-diamonds-search/orange-color" class="class-icon--37NL7 icon-emerald orange--3Zbxs"><span>orange</span></a></li>
								<li><a data-container="#WidePane" data-qa="brown_color_diamonds" href="<?php echo SITE_URL; ?>diamonds/color-diamonds-search/brown-color" class="class-icon--37NL7 icon-asscher brown--10NIq"><span>brown</span></a></li>
								<li><a data-container="#WidePane" data-qa="black_color_diamonds" href="<?php echo SITE_URL; ?>diamonds/color-diamonds-search/black-color" class="class-icon--37NL7 icon-pear black--2m6P7"><span>black</span></a></li>
							</ul>
						</li>
						<li class="innersub-menus">
							<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">design your own jewelry &nbsp;<b class="fa fa-caret-down"></b></a>
							<ul class="innerchildren">
								<li><a data-container="#WidePane" data-qa="design_your_own_earrings-diamonds" href="<?php echo SITE_URL; ?>jewelry/build-earings" class="class-icon--37NL7 icon-Studs_DYO"><span>earrings</span></a></li>
								<li><a data-container="#WidePane" data-qa="design_your_own_pendants-diamonds" href="<?php echo SITE_URL; ?>jewelry/buildiamond-pendant" class="class-icon--37NL7 icon-Pendants_DYO"><span>pendants</span></a></li>
								<li><a data-container="#WidePane" data-qa="design_your_own_three_stone-diamonds" href="<?php echo SITE_URL; ?>jewelry/buildthree-stonesring" class="class-icon--37NL7 icon-Pairs"><span>Three Stone Ring</span></a></li>
							</ul>
						</li>
						<li class="innersub-menus">
							<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">ready to ship jewelry &nbsp;<b class="fa fa-caret-down"></b></a>
							<ul class="innerchildren">
								<li><a data-container="#WidePane" data-qa="diamond_studs" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/wg-earrings" class="class-icon--37NL7 icon-Studs2"><span>White Gold Earrings</span></a></li>
								<li><a data-container="#WidePane" data-qa="diamond_earrings" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/rg-earrings" class="class-icon--37NL7 icon-Studs"><span>Rose Gold earrings</span></a></li>
								<li><a data-container="#WidePane" data-qa="diamond_pendants" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/ttg-pendants" class="class-icon--37NL7 icon-Pendants"><span>Two-Tone Gold pendants</span></a></li>
								<li><a data-container="#WidePane" data-qa="diamond_bracelets" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/tcg-bracelets" class="class-icon--37NL7 icon-Bracelets"><span>Tri-Color Gold bracelets</span></a></li>
								<li><a data-container="#WidePane" data-qa="diamond_rings" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/wg-bracelets" class="class-icon--37NL7 icon-Royal_ring"><span>White Gold Bracelets</span></a></li>
							</ul>
						</li>
					</ul>
				</li>
				<li class="sub-menus">
					<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">Men &nbsp;<b class="fa fa-caret-down"></b></a>
					<ul class="children">
						<li class="innersub-menus">
							<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">Men Styles &nbsp;<b class="fa fa-caret-down"></b></a>
							<ul class="innerchildren">
								<li><a data-container="#WidePane" data-qa="diamond_rings" href="<?php echo SITE_URL; ?>diamonds/men_diamond_rings/diamond_rings"><span>Diamond Rings</span></a></li>
								<li><a data-container="#WidePane" data-qa="luxurman_diamond_rings" href="<?php echo SITE_URL; ?>diamonds/men_diamond_rings/luxurman_diamond_rings"><span>Luxurman Diamond Rings</span></a></li>
								<li><a data-container="#WidePane" data-qa="wedding_rings" href="<?php echo SITE_URL; ?>diamonds/men_diamond_rings/wedding_rings"><span>Wedding Rings</span></a></li>
								<li><a data-container="#WidePane" data-qa="black_onyx_rings" href="<?php echo SITE_URL; ?>diamonds/men_diamond_rings/black_onyx_rings"><span>Black Onyx Rings</span></a></li>
								<li><a data-container="#WidePane" data-qa="diamond_eternity_bands" href="<?php echo SITE_URL; ?>diamonds/men_diamond_rings/diamond_eternity_bands"><span>Diamond Eternity Bands</span></a></li>
								<li><a data-container="#WidePane" data-qa="gold_rings" href="<?php echo SITE_URL; ?>diamonds/men_diamond_rings/gold_rings"><span>Gold Rings</span></a></li>
								<li><a data-container="#WidePane" data-qa="diamond_engagement_rings" href="<?php echo SITE_URL; ?>diamonds/men_diamond_rings/diamond_engagement_rings"><span>Diamond Engagement Rings</span></a></li>
								<li><a data-container="#WidePane" data-qa="luxurman_diamond_wedding_bands" href="<?php echo SITE_URL; ?>diamonds/men_diamond_rings/luxurman_diamond_wedding_bands"><span>Luxurman Diamond Wedding Bands</span></a></li>
								<li><a data-container="#WidePane" data-qa="three_stone_engagement_rings" href="<?php echo SITE_URL; ?>diamonds/men_diamond_rings/three_stone_engagement_rings"><span>Three Stone Engagement Rings</span></a></li>
								<li><a data-container="#WidePane" data-qa="mens_sterling_slver_rings" href="<?php echo SITE_URL; ?>diamonds/men_diamond_rings/mens_sterling_slver_rings"><span>Mens Sterling Silver Rings</span></a></li>
								<li><a data-container="#WidePane" data-qa="bridal_ring_sets" href="<?php echo SITE_URL; ?>diamonds/men_diamond_rings/bridal_ring_sets"><span>Bridal Ring Sets</span></a></li>
							</ul>
						</li>
						<li class="innersub-menus">
							<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">Luxury Watches &nbsp;<b class="fa fa-caret-down"></b></a>
							<ul class="innerchildren">
								<li><a data-container="#WidePane" data-qa="birthstones_gifts" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/gucci"><span>Gucci</span></a></li>
								<li><a data-container="#WidePane" data-qa="gifts_under_500" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/luxury_watches"><span>Luxury Watches Landing Pages</span></a></li>
							</ul>
						</li>
						<li class="innersub-menus">
							<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">bracelets &nbsp;<b class="fa fa-caret-down"></b></a>
							<ul class="innerchildren">
								<li><a data-container="#WidePane" data-qa="ready_to_ship_tennis_bracelets" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/diamond_bracelets" class="class-icon--37NL7 icon-tennis-bracelets"><span>Diamond Bracelets</span></a></li>
								<li><a data-container="#WidePane" data-qa="ready_to_ship_diamond_bracelets" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/wg_diamond_bracelets" class="class-icon--37NL7 icon-Bracelets"><span>Gold Bracelets(w/Diamond)</span></a></li>
								<li><a data-container="#WidePane" data-qa="ready_to_ship_diamond_bracelets" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/bracelets_landing_page" class="class-icon--37NL7 icon-Bracelets"><span>Bracelets Landing Page</span></a></li>
							</ul>
						</li>
						<li class="innersub-menus">
							<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">Religious Pendants &nbsp;<b class="fa fa-caret-down"></b></a>
							<ul class="innerchildren">
								<li><a data-container="#WidePane" data-qa="ready_to_ship_anniversary_rings" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/jesus_pendants" class="class-icon--37NL7 icon-Pendants_DYO"><span>Jesus Pendants</span></a></li>
								<li><a data-container="#WidePane" data-qa="ready_to_ship_anniversary_rings" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/heart_pendants" class="class-icon--37NL7 icon-Pendants_DYO"><span>Heart Shape Pendant</span></a></li>
								<li><a data-container="#WidePane" data-qa="ready_to_ship_anniversary_rings" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/infinity_pendants" class="class-icon--37NL7 icon-Pendants_DYO"><span>Infinity Design Pendant</span></a></li>
								<li><a data-container="#WidePane" data-qa="ready_to_ship_anniversary_rings" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/landing_pendants" class="class-icon--37NL7 icon-Pendants_DYO"><span>Pendants Landing Page</span></a></li>
								<li><a data-container="#WidePane" data-qa="ready_to_ship_anniversary_rings" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/designer_pendants" class="class-icon--37NL7 icon-Pendants_DYO"><span>Designer Pendants</span></a></li>
								<li><a data-container="#WidePane" data-qa="ready_to_ship_anniversary_rings" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/custom_diamond_pendants" class="class-icon--37NL7 icon-Pendants_DYO"><span>Custom Diamond Pendants</span></a></li>
								<li><a data-container="#WidePane" data-qa="ready_to_ship_anniversary_rings" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/miscellaneous_pendants" class="class-icon--37NL7 icon-Pendants_DYO"><span>Miscellaneous Pendants</span></a></li>
								<li><a data-container="#WidePane" data-qa="ready_to_ship_anniversary_rings" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/cartoonNemoji_pendants" class="class-icon--37NL7 icon-Pendants_DYO"><span>Cartoon & Emoji Pendants</span></a></li>
								<li><a data-container="#WidePane" data-qa="ready_to_ship_anniversary_rings" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/initial_diamond_pendants" class="class-icon--37NL7 icon-Pendants_DYO"><span>Initial Diamond Pendants</span></a></li>
								<li><a data-container="#WidePane" data-qa="ready_to_ship_anniversary_rings" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/dog_tags_pendants" class="class-icon--37NL7 icon-Pendants_DYO"><span>Dog Tags Pendants</span></a></li>
								<li><a data-container="#WidePane" data-qa="ready_to_ship_anniversary_rings" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/memoryNcoin_pendants" class="class-icon--37NL7 icon-Pendants_DYO"><span>Memory & Coin Pendants</span></a></li>
								<li><a data-container="#WidePane" data-qa="ready_to_ship_anniversary_rings" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/solitaire_pendants" class="class-icon--37NL7 icon-Pendants_DYO"><span>Solitaire Pendants</span></a></li>
							</ul>
						</li>
					</ul>
				</li>
				<li class="sub-menus">
					<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">Women &nbsp;<b class="fa fa-caret-down"></b></a>
					<ul class="children">
						<li class="innersub-menus">
							<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">Women &nbsp;<b class="fa fa-caret-down"></b></a>
							<ul class="innerchildren">
								<li><a data-container="#WidePane" data-qa="diamond_studs-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/diamond_studs" class="class-icon--37NL7 icon-Studs2"><span>diamond studs</span></a></li>
								<li><a data-container="#WidePane" data-qa="diamond_earrings-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/diamond_earrings" class="class-icon--37NL7 icon-Studs"><span>diamond earrings</span></a></li>
							</ul>
						</li>
						<li class="innersub-menus">
							<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">necklaces &nbsp;<b class="fa fa-caret-down"></b></a>
							<ul class="innerchildren">
								<li><a data-container="#WidePane" data-qa="diamond_necklaces" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/wg-necklaces" class="class-icon--37NL7 icon-Pendants"><span>White Gold necklaces</span></a></li>
								<li><a data-container="#WidePane" data-qa="cuban_necklaces" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/rg-necklaces" class="class-icon--37NL7 icon-Pendant-gem"><span>Rose Gold necklaces</span></a></li>
								<li><a data-container="#WidePane" data-qa="tennis_necklaces" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/ss-necklaces" class="class-icon--37NL7 icon-Pearl_Necklaces"><span>Sterling Silver necklaces</span></a></li>
								<li><a data-container="#WidePane" data-qa="rosary_necklaces" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/yg-necklaces" class="class-icon--37NL7 icon-Pendants"><span>Yellow Gold Necklaces</span></a></li>
								<li><a data-container="#WidePane" data-qa="designer_necklaces" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/ttg-necklaces" class="class-icon--37NL7 icon-Pendant-gem"><span>Two-Tone Gold necklaces</span></a></li>
								<li><a data-container="#WidePane" data-qa="designer_necklaces" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/ygNss-necklaces" class="class-icon--37NL7 icon-Pendant-gem"><span>Yellow Gold & Sterling Silver necklaces</span></a></li>
								<li><a data-container="#WidePane" data-qa="designer_necklaces" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/tcg-necklaces" class="class-icon--37NL7 icon-Pendant-gem"><span>Tri-Color Gold necklaces</span></a></li>
								<li><a data-container="#WidePane" data-qa="designer_necklaces" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/wNrg-necklaces" class="class-icon--37NL7 icon-Pendant-gem"><span>White & Rose Gold necklaces</span></a></li>
							</ul>
						</li>
						<li class="innersub-menus">
							<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">bracelets &nbsp;<b class="fa fa-caret-down"></b></a>
							<ul class="innerchildren">
								<li><a data-container="#WidePane" data-qa="ready_to_ship_tennis_bracelets" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/wg-bracelets" class="class-icon--37NL7 icon-tennis-bracelets"><span>White Gold bracelets</span></a></li>
								<li><a data-container="#WidePane" data-qa="ready_to_ship_diamond_bracelets" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/rg-bracelets" class="class-icon--37NL7 icon-Bracelets"><span>Rose Gold bracelets</span></a></li>
								<li><a data-container="#WidePane" data-qa="ready_to_ship_gemstone_bracelets" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/ss-bracelets" class="class-icon--37NL7 icon-Bracelets-gems"><span>Sterling Silver bracelets</span></a></li>
								<li><a data-container="#WidePane" data-qa="ready_to_ship_pearl_bracelets" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/yg-bracelets" class="class-icon--37NL7 icon-Pearl_Bracelets"><span>Yellow Gold bracelets</span></a></li>
								<li><a data-container="#WidePane" data-qa="ready_to_ship_tennis_bracelets" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/ttg-bracelets" class="class-icon--37NL7 icon-tennis-bracelets"><span>Two-Tone Gold Bracelet</span></a></li>
								<li><a data-container="#WidePane" data-qa="ready_to_ship_tennis_bracelets" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/ygNss-bracelets" class="class-icon--37NL7 icon-tennis-bracelets"><span>Yellow Gold & Sterling Silver bracelets</span></a></li>
								<li><a data-container="#WidePane" data-qa="ready_to_ship_diamond_bracelets" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/tcg-bracelets" class="class-icon--37NL7 icon-Bracelets"><span>Tri-Color Gold bracelets</span></a></li>
								<li><a data-container="#WidePane" data-qa="ready_to_ship_gemstone_bracelets" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/rgNss-bracelets" class="class-icon--37NL7 icon-Bracelets-gems"><span>Rose Gold & Sterling Silver bracelets</span></a></li>
							</ul>
						</li>
						<li class="innersub-menus">
							<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">Rings &nbsp;<b class="fa fa-caret-down"></b></a>
							<ul class="innerchildren">
								<li><a data-container="#WidePane" data-qa="ready_to_ship_anniversary_rings" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/wg-rings" class="class-icon--37NL7 icon-anniversary class-icon-anniversary--2hVxF"><span>White Gold Rings</span></a></li>
								<li><a data-container="#WidePane" data-qa="ready_to_ship_diamond_rings" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/rg-rings" class="class-icon--37NL7 icon-Royal_ring"><span>Rose Gold rings</span></a></li>
								<li><a data-container="#WidePane" data-qa="ready_to_ship_gemstone_rings" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/ss-rings" class="class-icon--37NL7 icon-Ring-gem"><span>Sterling Silver rings</span></a></li>
								<li><a data-container="#WidePane" data-qa="ready_to_ship_pearl_rings" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/yg-rings" class="class-icon--37NL7 icon-Pearl_Rings"><span>Yellow Gold rings</span></a></li>
								<li><a data-container="#WidePane" data-qa="ready_to_ship_anniversary_rings" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/ttg-rings" class="class-icon--37NL7 icon-anniversary class-icon-anniversary--2hVxF"><span>Two-Tone Gold Rings</span></a></li>
								<li><a data-container="#WidePane" data-qa="ready_to_ship_diamond_rings" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/ygNss-rings" class="class-icon--37NL7 icon-Royal_ring"><span>Yellow Gold & Sterling Silver rings</span></a></li>
								<li><a data-container="#WidePane" data-qa="ready_to_ship_gemstone_rings" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/wNrg-rings" class="class-icon--37NL7 icon-Ring-gem"><span>White & Rose Gold rings</span></a></li>
							</ul>
						</li>
						<li class="innersub-menus">
							<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">GIFTS &nbsp;<b class="fa fa-caret-down"></b></a>
							<ul class="innerchildren">
								<li><a data-container="#WidePane" data-qa="gifts_under_500" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/"><span>Gifts Under $500</span></a></li>
								<li><a data-container="#WidePane" data-qa="gifts_under_1000" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/"><span>Gifts Under $1000</span></a></li>
							</ul>
						</li>
						<li class="innersub-menus">
							<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">design your own &nbsp;<b class="fa fa-caret-down"></b></a>
							<ul class="innerchildren">
								<li><a data-container="#WidePane" data-qa="design_your_own_earrings-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/" class="class-icon--37NL7 icon-Studs_DYO"><span>design your own earrings</span></a></li>
								<li><a data-container="#WidePane" data-qa="design_your_own_pendant-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/" class="class-icon--37NL7 icon-Pendants_DYO"><span>design your own pendant</span></a></li>
							</ul>
						</li>
						<li class="innersub-menus">
							<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">Shop By Carol Collection &nbsp;<b class="fa fa-caret-down"></b></a>
							<ul class="innerchildren">
								<li><a data-container="#WidePane" data-qa="ready_to_ship_anniversary_rings" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/color-fashion" class="class-icon--37NL7 icon-anniversary class-icon-anniversary--2hVxF"><span>Color Fashion</span></a></li>
								<li><a data-container="#WidePane" data-qa="ready_to_ship_diamond_rings" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/diamond-fashion" class="class-icon--37NL7 icon-Royal_ring"><span>Diamond Fashion</span></a></li>
								<li><a data-container="#WidePane" data-qa="ready_to_ship_gemstone_rings" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/finished-bridal" class="class-icon--37NL7 icon-Ring-gem"><span>Bridal Completes</span></a></li>
								<li><a data-container="#WidePane" data-qa="ready_to_ship_pearl_rings" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/wedding-bands" class="class-icon--37NL7 icon-Pearl_Rings"><span>Wedding Bands</span></a></li>
								<li><a data-container="#WidePane" data-qa="ready_to_ship_anniversary_rings" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/new-arrivals" class="class-icon--37NL7 icon-anniversary class-icon-anniversary--2hVxF"><span>New Arrivals</span></a></li>
							</ul>
						</li>
						<li class="innersub-menus">
							<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">Shop By Oneil Collection &nbsp;<b class="fa fa-caret-down"></b></a>
							<ul class="innerchildren">
								<li><a data-container="#WidePane" data-qa="ready_to_ship_anniversary_rings" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/bracelets" class="class-icon--37NL7 icon-anniversary class-icon-anniversary--2hVxF"><span>Bracelets</span></a></li>
								<li><a data-container="#WidePane" data-qa="ready_to_ship_diamond_rings" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/earrings" class="class-icon--37NL7 icon-Royal_ring"><span>Earrings</span></a></li>
								<li><a data-container="#WidePane" data-qa="ready_to_ship_gemstone_rings" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/necklaces" class="class-icon--37NL7 icon-Ring-gem"><span>Necklaces</span></a></li>
								<li><a data-container="#WidePane" data-qa="ready_to_ship_pearl_rings" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/pendants" class="class-icon--37NL7 icon-Pearl_Rings"><span>Pendants</span></a></li>
								<li><a data-container="#WidePane" data-qa="ready_to_ship_anniversary_rings" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/wedding-o-bands" class="class-icon--37NL7 icon-anniversary class-icon-anniversary--2hVxF"><span>Wedding Bands</span></a></li>
							</ul>
						</li>
					</ul>
				</li>
				<li class="sub-menus">
					<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">Engagement Rings &nbsp;<b class="fa fa-caret-down"></b></a>
					<ul class="children">
						<li class="innersub-menus">
							<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">design your own engagement ring &nbsp;<b class="fa fa-caret-down"></b></a>
							<ul class="innerchildren">
								<li><a data-container="#WidePane" data-qa="start_with_a_setting-engagement_ring" href="<?php echo SITE_URL; ?>diamonds/engagement-rings/all-settings" class="class-icon--37NL7 icon-Ring_DYO"><span>start with a setting</span></a></li>
								<li><a data-container="#WidePane" data-qa="start_with_a_diamond-engagement_ring" href="<?php echo SITE_URL; ?>diamonds/loose-diamonds/all-diamonds" class="class-icon--37NL7 icon-Diamond_DYO"><span>start with a diamond</span></a></li>
							</ul>
						</li>
						<li class="innersub-menus">
							<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">Get inspired by customer's rings &nbsp;<b class="fa fa-caret-down"></b></a>
							<ul class="innerchildren">
								<li><a data-container="#WidePane" data-qa="round_cut_rings" href="<?php echo SITE_URL; ?>diamonds/engagement-rings/round-cut-rings"><span>round cut rings</span></a></li>
								<li><a data-container="#WidePane" data-qa="princess_cut_rings" href="<?php echo SITE_URL; ?>diamonds/engagement-rings/princess-cut-rings"><span>princess cut rings</span></a></li>
								<li><a data-container="#WidePane" data-qa="cushion_cut_rings" href="<?php echo SITE_URL; ?>diamonds/engagement-rings/cushion-cut-rings"><span>cushion cut rings</span></a></li>
								<li><a data-container="#WidePane" data-qa="all_other_shapes" href="<?php echo SITE_URL; ?>diamonds/engagement-rings"><span>all other shapes</span></a></li>
							</ul>
						</li>
						<li class="innersub-menus">
							<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">engagement ring styles &nbsp;<b class="fa fa-caret-down"></b></a>
							<ul class="innerchildren">
								<li><a data-container="#WidePane" data-qa="solitaire" href="<?php echo SITE_URL; ?>diamonds/engagement-rings/solitaire" class="class-icon--37NL7 icon-solitaire"><span>Solitaire</span></a></li>
								<li><a data-container="#WidePane" data-qa="Pave" href="<?php echo SITE_URL; ?>diamonds/engagement-rings/pave" class="class-icon--37NL7 icon-pave"><span>Pavé</span></a></li>
								<li><a data-container="#WidePane" data-qa="channel_set" href="<?php echo SITE_URL; ?>diamonds/engagement-rings/channel-set" class="class-icon--37NL7 icon-channel"><span>Channel-Set</span></a></li>
								<li><a data-container="#WidePane" data-qa="side_stone" href="<?php echo SITE_URL; ?>diamonds/engagement-rings/side-stones" class="class-icon--37NL7 icon-side-stone"><span>Side-Stone</span></a></li>
								<li><a data-container="#WidePane" data-qa="tension" href="<?php echo SITE_URL; ?>diamonds/engagement-rings/tension" class="class-icon--37NL7 icon-tension"><span>Tension</span></a></li>
								<li><a data-container="#WidePane" data-qa="vintage" href="<?php echo SITE_URL; ?>diamonds/engagement-rings/vintage" class="class-icon--37NL7 icon-vintage"><span>Vintage</span></a></li>
								<li><a data-container="#WidePane" data-qa="halo" href="<?php echo SITE_URL; ?>diamonds/engagement-rings/halo" class="class-icon--37NL7 icon-halo"><span>Halo</span></a></li>
								<li><a data-container="#WidePane" data-qa="three_stone" href="<?php echo SITE_URL; ?>diamonds/engagement-rings/three-stone" class="class-icon--37NL7 icon-tree-stone"><span>Three-Stone</span></a></li>
							</ul>
						</li>
						<li class="innersub-menus">
							<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">designer collection &nbsp;<b class="fa fa-caret-down"></b></a>
							<ul class="innerchildren">
								<li><a data-container="#WidePane" data-qa="round_cut_rings" href="<?php echo SITE_URL; ?>diamonds/engagement-rings/Classic Trellis"><span>Classic Trellis</span></a></li>
								<li><a data-container="#WidePane" data-qa="princess_cut_rings" href="<?php echo SITE_URL; ?>diamonds/engagement-rings/Classic with Accents"><span>Classic with Accents</span></a></li>
								<li><a data-container="#WidePane" data-qa="cushion_cut_rings" href="<?php echo SITE_URL; ?>diamonds/engagement-rings/Four-Diamonds Row"><span>Four-Diamonds Row</span></a></li>
								<li><a data-container="#WidePane" data-qa="princess_cut_rings" href="<?php echo SITE_URL; ?>diamonds/engagement-rings/Milgrains"><span>Milgrains</span></a></li>
								<li><a data-container="#WidePane" data-qa="cushion_cut_rings" href="<?php echo SITE_URL; ?>diamonds/engagement-rings/Split Shank"><span>Split Shank</span></a></li>
								<li><a data-container="#WidePane" data-qa="all_other_shapes" href="<?php echo SITE_URL; ?>diamonds/engagement-rings"><span>All Other Designs</span></a></li>
							</ul>
						</li>
						<li class="innersub-menus">
							<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">shop by metal &nbsp;<b class="fa fa-caret-down"></b></a>
							<ul class="innerchildren">
								<li><a data-container="#WidePane" data-qa="white_gold" href="<?php echo SITE_URL; ?>diamonds/engagement-rings/white-gold" class="class-icon--37NL7 icon-metal class-white-gold--14E5n"><span>white gold</span></a></li>
								<li><a data-container="#WidePane" data-qa="yellow_gold" href="<?php echo SITE_URL; ?>diamonds/engagement-rings/yellow-gold" class="class-icon--37NL7 icon-metal class-yellow-gold--3oTCE"><span>yellow gold</span></a></li>
								<li><a data-container="#WidePane" data-qa="platinum" href="<?php echo SITE_URL; ?>diamonds/engagement-rings/platinum" class="class-icon--37NL7 icon-metal class-icon-platinum--3EOrn"><span>platinum</span></a></li>
							</ul>
						</li>
						<li class="innersub-menus">
							<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">ready to ship &nbsp;<b class="fa fa-caret-down"></b></a>
							<ul class="innerchildren">
								<li><a data-container="#WidePane" data-qa="diamond_rings" href="<?php echo SITE_URL; ?>diamonds/engagement-rings/Bezel & Pave"><span>Bezel & Pave</span></a></li>
								<li><a data-container="#WidePane" data-qa="gemstone_rings" href="<?php echo SITE_URL; ?>diamonds/engagement-rings/Channel"><span>Channel</span></a></li>
								<li><a data-container="#WidePane" data-qa="diamond_rings" href="<?php echo SITE_URL; ?>diamonds/engagement-rings/Prong"><span>Prong</span></a></li>
								<li><a data-container="#WidePane" data-qa="gemstone_rings" href="<?php echo SITE_URL; ?>diamonds/engagement-rings/Prong & Bezel"><span>Prong & Bezel</span></a></li>
								<li><a data-container="#WidePane" data-qa="gemstone_rings" href="<?php echo SITE_URL; ?>diamonds/engagement-rings/"><span>All other setting types</span></a></li>
							</ul>
						</li>
					</ul>
				</li>
				<li class="sub-menus">
					<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">Jewelry &nbsp;<b class="fa fa-caret-down"></b></a>
					<ul class="children">
						<li class="innersub-menus">
							<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">Necklaces &nbsp;<b class="fa fa-caret-down"></b></a>
							<ul class="innerchildren">
								<li><a data-container="#WidePane" data-qa="diamond_studs-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/gold_necklaces"><span>Gold Chains</span></a></li>
								<li><a data-container="#WidePane" data-qa="diamond_earrings-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/diamond_necklaces"><span>Diamond Chains</span></a></li>
								<li><a data-container="#WidePane" data-qa="diamond_studs-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/ss_necklaces"><span>Sterling Silver Chains</span></a></li>
								<li><a data-container="#WidePane" data-qa="diamond_earrings-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/landing_necklaces"><span>Necklaces Landing Page</span></a></li>
								<li><a data-container="#WidePane" data-qa="diamond_studs-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/cuban_necklaces"><span>Cuban Chains</span></a></li>
								<li><a data-container="#WidePane" data-qa="diamond_earrings-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/tennis_necklaces"><span>Tennis Chains</span></a></li>
								<li><a data-container="#WidePane" data-qa="diamond_studs-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/rosary_necklaces"><span>Rosary Necklaces</span></a></li>
								<li><a data-container="#WidePane" data-qa="diamond_earrings-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/designer_necklaces"><span>Ladies Designer Necklaces</span></a></li>
							</ul>
						</li>
						<li class="innersub-menus">
							<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">Bracelets &nbsp;<b class="fa fa-caret-down"></b></a>
							<ul class="innerchildren">
								<li><a data-container="#WidePane" data-qa="diamond_studs-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/diamond_bracelets"><span>Diamond Bracelets</span></a></li>
								<li><a data-container="#WidePane" data-qa="diamond_studs-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/wg_diamond_bracelets"><span>Gold Bracelets (w/o Diamond)</span></a></li>
								<li><a data-container="#WidePane" data-qa="diamond_studs-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/designer_bracelets"><span>Ladies Designer Bracelet</span></a></li>
								<li><a data-container="#WidePane" data-qa="diamond_studs-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/bracelets_landing_page"><span>Bracelets Landing Page</span></a></li>
							</ul>
						</li>
						<li class="innersub-menus">
							<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">Pendants &nbsp;<b class="fa fa-caret-down"></b></a>
							<ul class="innerchildren">
								<li><a data-container="#WidePane" data-qa="diamond_studs-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/religious_pendants"><span>Religious Pendants</span></a></li>
								<li><a data-container="#WidePane" data-qa="diamond_studs-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/jesus_pendants"><span>Jesus Pendants</span></a></li>
								<li><a data-container="#WidePane" data-qa="diamond_studs-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/heart_pendants"><span>Heart Shape Pendant</span></a></li>
								<li><a data-container="#WidePane" data-qa="diamond_studs-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/infinity_pendants"><span>Infinity Design Pendant</span></a></li>
								<li><a data-container="#WidePane" data-qa="diamond_studs-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/landing_pendants"><span>Pendants Landing Page</span></a></li>
								<li><a data-container="#WidePane" data-qa="diamond_studs-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/designer_pendants"><span>Designer Pendants</span></a></li>
								<li><a data-container="#WidePane" data-qa="diamond_studs-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/custom_diamond_pendants"><span>Custom Diamond Pendants</span></a></li>
								<li><a data-container="#WidePane" data-qa="diamond_studs-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/miscellaneous_pendants"><span>Miscellaneous Pendants</span></a></li>
								<li><a data-container="#WidePane" data-qa="diamond_studs-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/cartoonNemoji_pendants"><span>Cartoon & Emoji Pendants</span></a></li>
								<li><a data-container="#WidePane" data-qa="diamond_studs-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/initial_diamond_pendants"><span>Initial Diamond Pendants</span></a></li>
								<li><a data-container="#WidePane" data-qa="diamond_studs-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/dog_tags_pendants"><span>Dog Tags Pendants</span></a></li>
								<li><a data-container="#WidePane" data-qa="diamond_studs-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/memoryNcoin_pendants"><span>Memory & Coin Pendants</span></a></li>
								<li><a data-container="#WidePane" data-qa="diamond_studs-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/solitaire_pendants"><span>Solitaire Pendants</span></a></li>
							</ul>
						</li>
						<li class="innersub-menus">
							<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">Earrings &nbsp;<b class="fa fa-caret-down"></b></a>
							<ul class="innerchildren">
								<li><a data-container="#WidePane" data-qa="ready_to_ship_anniversary_rings" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/diamond_studs"><span>Stud Earrings</span></a></li>
								<li><a data-container="#WidePane" data-qa="ready_to_ship_diamond_rings" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/diamond_earrings"><span>Diamond Earrings</span></a></li>
							</ul>
						</li>
						<li class="innersub-menus">
							<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">Luxury Watches &nbsp;<b class="fa fa-caret-down"></b></a>
							<ul class="innerchildren">
								<li><a data-container="#WidePane" data-qa="design_your_own_earrings-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/gucci"><span>Gucci</span></a></li>
								<li><a data-container="#WidePane" data-qa="design_your_own_pendant-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/luxury_watches"><span>Luxury Watches Landing Page</span></a></li>
							</ul>
						</li>
					</ul>
				</li>
				<?php /* <li class="sub-menus">
					<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">Clearance &nbsp;<b class="fa fa-caret-down"></b></a>
					<ul class="children">
						<li class="innersub-menus">
							<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">Women &nbsp;<b class="fa fa-caret-down"></b></a>
							<ul class="innerchildren">
								<li><a data-container="#WidePane" data-qa="diamond_studs-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/" class="class-icon--37NL7 icon-Studs2"><span>diamond studs</span></a></li>
								<li><a data-container="#WidePane" data-qa="diamond_earrings-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/" class="class-icon--37NL7 icon-Studs"><span>diamond earrings</span></a></li>
							</ul>
						</li>
						<li class="innersub-menus">
							<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">necklaces &nbsp;<b class="fa fa-caret-down"></b></a>
							<ul class="innerchildren">
								<li><a data-container="#WidePane" data-qa="diamond_necklaces" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/" class="class-icon--37NL7 icon-Pendants"><span>diamond necklaces</span></a></li>
								<li><a data-container="#WidePane" data-qa="gemstones_necklaces" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/" class="class-icon--37NL7 icon-Pendant-gem"><span>gemstones necklaces</span></a></li>
								<li><a data-container="#WidePane" data-qa="pearl_necklaces" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/" class="class-icon--37NL7 icon-Pearl_Necklaces"><span>pearl necklaces</span></a></li>
							</ul>
						</li>
						<li class="innersub-menus">
							<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">bracelets &nbsp;<b class="fa fa-caret-down"></b></a>
							<ul class="innerchildren">
								<li><a data-container="#WidePane" data-qa="ready_to_ship_tennis_bracelets" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/" class="class-icon--37NL7 icon-tennis-bracelets"><span>tennis bracelets</span></a></li>
								<li><a data-container="#WidePane" data-qa="ready_to_ship_diamond_bracelets" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/" class="class-icon--37NL7 icon-Bracelets"><span>diamond bracelets</span></a></li>
								<li><a data-container="#WidePane" data-qa="ready_to_ship_gemstone_bracelets" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/" class="class-icon--37NL7 icon-Bracelets-gems"><span>gemstone bracelets</span></a></li>
								<li><a data-container="#WidePane" data-qa="ready_to_ship_pearl_bracelets" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/" class="class-icon--37NL7 icon-Pearl_Bracelets"><span>pearl bracelets</span></a></li>
							</ul>
						</li>
						<li class="innersub-menus">
							<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">Rings &nbsp;<b class="fa fa-caret-down"></b></a>
							<ul class="innerchildren">
								<li><a data-container="#WidePane" data-qa="ready_to_ship_anniversary_rings" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/" class="class-icon--37NL7 icon-anniversary class-icon-anniversary--2hVxF"><span>Anniversary Rings</span></a></li>
								<li><a data-container="#WidePane" data-qa="ready_to_ship_diamond_rings" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/" class="class-icon--37NL7 icon-Royal_ring"><span>diamond rings</span></a></li>
								<li><a data-container="#WidePane" data-qa="ready_to_ship_gemstone_rings" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/" class="class-icon--37NL7 icon-Ring-gem"><span>gemstone rings</span></a></li>
								<li><a data-container="#WidePane" data-qa="ready_to_ship_pearl_rings" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/" class="class-icon--37NL7 icon-Pearl_Rings"><span>pearl rings</span></a></li>
							</ul>
						</li>
						<li class="innersub-menus">
							<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">GIFTS &nbsp;<b class="fa fa-caret-down"></b></a>
							<ul class="innerchildren">
								<li><a data-container="#WidePane" data-qa="birthstones_gifts" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/"><span>Birthstones Gifts</span></a></li>
								<li><a data-container="#WidePane" data-qa="gifts_under_500" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/"><span>Gifts Under $500</span></a></li>
								<li><a data-container="#WidePane" data-qa="gifts_under_1000" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/"><span>Gifts Under $1000</span></a></li>
							</ul>
						</li>
						<li class="innersub-menus">
							<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">design your own &nbsp;<b class="fa fa-caret-down"></b></a>
							<ul class="innerchildren">
								<li><a data-container="#WidePane" data-qa="design_your_own_earrings-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/" class="class-icon--37NL7 icon-Studs_DYO"><span>design your own earrings</span></a></li>
								<li><a data-container="#WidePane" data-qa="design_your_own_pendant-fine_jewelry" href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/" class="class-icon--37NL7 icon-Pendants_DYO"><span>design your own pendant</span></a></li>
							</ul>
						</li>
					</ul>
				</li> */ ?>
				<li class="sub-menus">
					<a href="<?php echo SITE_URL; ?>education" class="dropdown-toggle hvr-underline-from-center upercase">Education</a>
				</li>
				<li class="sub-menus">
					<a href="<?php echo SITE_URL; ?>blog" class="dropdown-toggle hvr-underline-from-center upercase">Blog</a>
				</li>
			</ul>
		</nav>
	</header>
	<script>
	function search_items_result() {
		var s_field = $("#search_field").val();
		$.ajax({
			type: "POST",
			url: base_url + 'engagement/search_item_result/?search_field='+s_field,
			success: function(response) {
				if(response){
					$("#view_search_itemlist").show();
					$("#view_search_itemlist ul").html(response);
				}else{
					$("#view_search_itemlist").hide();
					$("#view_search_itemlist ul").html('');
				}
			},
			error: function(){
			}
		});
	}
	</script>  
	<?php 
	if($page){ 
		if($page != 'home'){
			echo setContainer(); //// start cotainer div if page is not test enagement 
		}
	}else{
		echo setContainer(); //// end cotainer div here if page is not test engagement     
	}

	if($image_background_option){

	}else{
	?>
		<style>
		#main-head-containter {
			min-height: auto;
			-webkit-background-size: cover;
			background-position: top center;
			background-image: none;
			background-color:#ECECEC;
		}
		header {background-color: #0A2B49;}
		</style>
	<?php } ?>
	<script>
	function ch_men(ch_id){
		$('.d_sub_menu').hide();
		$('#'+ch_id).show();
	}
	</script>
<style>
header{min-height:auto}
nav{background:none repeat scroll 0 0 #FFF}
.navbar{min-height:122px}
.navbar-brand{height:auto}
.sw-megamenu.navigation li.level0.fullwidth>.submenu{z-index:4}
nav ul li{display:list-item}
.row-fluid{width:100%;max-width:1140px;margin:auto}
input#amount{width:50px}
@media (max-width: 767px) {
.block-search{width:72%;z-index:99;padding:5px}
.block-search .label{position:absolute;right:29%;cursor:pointer;z-index:99;top:10px}
}
</style>
<!-- Header -->
<nav class="navbar navbar-expand-lg theme-header">
	<div class="container">
		<a class="navbar-brand" href="<?php echo config_item('base_url') ?>"><img src="<?php echo config_item('base_url') ?>/images/logo1.jpg" class="img-fluid" alt="logo"></a>
		<button class="navbar-toggler" id="menubtn" type="button">
		<img src="<?php echo config_item('base_url') ?>assets/images/menu-toggle.png" class="img-fluid" alt="menu-toggle"></button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<div class="right-menu-nav ml-auto mb-2 mb-lg-0">
				<div class="nav-icon">
					<div class="left-icon">
					
						<a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
						<a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i></a>
						<a href="#"><i class="fa fa-television" aria-hidden="true"></i></a>
					</div>
					<div class="right-icon">
						<a href="<?php echo config_item('base_url') ?>account/membersignin"><i class="fa fa-user-o" aria-hidden="true"></i></a>
						<a href="<?php echo config_item('base_url') ?>account/membersignin"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
						<a href="<?php echo SITE_URL; ?>shoppingbasket/mybasket"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
					</div>
				</div>
				<style>
				nav.navigation{display:contents}
				</style>
				<nav class="navigation sw-megamenu" role="navigation">
					<ul class="navbar-nav ml-auto mb-2 mb-lg-0">
						<li class="nav-item ui-menu-item level0 fullwidth parent" id="Diamonds">
							<a class="nav-link active" aria-current="page" href="<?php echo config_item('base_url') ?>loose-diamonds.html">Diamonds</a>
							<div class="level0 submenu">
								<div class="container">
									<div class="row">
										<div class="menu-left-block col-md-9">
											<div class="right_left_menu_section">
												<h3>&nbsp;</h3>
												<div class="left_menu">
													<div class="sub_menu">
														<ul class="subchildmenu loosediamond">
															<li>
																<a>Godstone Diamonds <span>Loose diamonds</span></a>
																<ul class="subchildmenu col-md-6">
																	<li><a href="<?php echo SITE_URL; ?>diamonds/diamonds-search/round-cut/"><i class="iconking-round"></i>Round</a></li>
																	<li><a href="<?php echo SITE_URL; ?>diamonds/diamonds-search/princess-cut/"><i class="iconking-princess"></i>Princess</a></li>
																	<li><a href="<?php echo SITE_URL; ?>diamonds/diamonds-search/cushion-cut/"><i class="iconking-cushion"></i>Cushion</a></li>
																	<li><a href="<?php echo SITE_URL; ?>diamonds/diamonds-search/emerald-cut/"><i class="iconking-emerald"></i>Emerald</a></li>
																	<li><a href="<?php echo SITE_URL; ?>diamonds/diamonds-search/pear-shaped/"><i class="iconking-pear"></i>Pear</a></li>
																</ul>
																<ul class="subchildmenu col-md-6">
																	<li><a href="<?php echo SITE_URL; ?>diamonds/diamonds-search/oval-cut/"><i class="iconking-oval"></i>Oval</a></li>
																	<li><a href="<?php echo SITE_URL; ?>diamonds/diamonds-search/radiant-cut/"><i class="iconking-radiant"></i>Radiant</a></li>
																	<li><a href="<?php echo SITE_URL; ?>diamonds/diamonds-search/asscher-cut/"><i class="iconking-asscher"></i>Asscher</a></li>
																	<li><a href="<?php echo SITE_URL; ?>diamonds/diamonds-search/marquise-cut/"><i class="iconking-marquise"></i>Marquise</a></li>
																	<li><a href="<?php echo SITE_URL; ?>diamonds/diamonds-search/heart-shaped/"><i class="iconking-heart"></i>Heart</a></li>
																</ul>
															</li>
														</ul>
													</div>
												</div>
												<div class="right_menu1 left_menu">
													<div class="sub_menu">
														<ul class="subchildmenu">
															<li>
																<a href="<?php echo SITE_URL; ?>diamonds/color-diamonds-search">FANCY COLOR DIAMONDS</a>
																<ul class="subchildmenu ul-column--1KfUm col-md-6">
																	<li><a data-container="#WidePane" data-qa="yellow_color_diamonds" href="<?php echo SITE_URL; ?>diamonds/color-diamonds-search/yellow-color" class="class-icon--37NL7 icon-round yellow--37ZPO"><span>yellow</span></a></li>
																	<li><a data-container="#WidePane" data-qa="pink_color_diamonds" href="<?php echo SITE_URL; ?>diamonds/color-diamonds-search/pink-color" class="class-icon--37NL7 icon-marquise pink--3gEGn"><span>pink</span></a></li>
																	<li><a data-container="#WidePane" data-qa="purple_color_diamonds" href="<?php echo SITE_URL; ?>diamonds/color-diamonds-search/purple-color" class="class-icon--37NL7 icon-heart2 purple--3805f"><span>purple</span></a></li>
																	<li><a data-container="#WidePane" data-qa="blue_color_diamonds" href="<?php echo SITE_URL; ?>diamonds/color-diamonds-search/blue-color" class="class-icon--37NL7 icon-oval blue--1tyqL"><span>blue</span></a></li>
																</ul>
																<ul class="subchildmenu ul-column--1KfUm col-md-6">
																	<li><a data-container="#WidePane" data-qa="green_color_diamonds" href="<?php echo SITE_URL; ?>diamonds/color-diamonds-search/green-color" class="class-icon--37NL7 icon-cushion green--2WQCn"><span>green</span></a></li>
																	<li><a data-container="#WidePane" data-qa="orange_color_diamonds" href="<?php echo SITE_URL; ?>diamonds/color-diamonds-search/orange-color" class="class-icon--37NL7 icon-emerald orange--3Zbxs"><span>orange</span></a></li>
																	<li><a data-container="#WidePane" data-qa="brown_color_diamonds" href="<?php echo SITE_URL; ?>diamonds/color-diamonds-search/brown-color" class="class-icon--37NL7 icon-asscher brown--10NIq"><span>brown</span></a></li>
																	<li><a data-container="#WidePane" data-qa="black_color_diamonds" href="<?php echo SITE_URL; ?>diamonds/color-diamonds-search/black-color" class="class-icon--37NL7 icon-pear black--2m6P7"><span>black</span></a></li>
																</ul>
															</li>
														</ul>
													</div>
												</div>
											</div>
										</div>
										<div class="menu-right-block col-md-3">
											<div class="right_menu_section">
												<div class="left_menu">
													<div class="sub_menu">
														<h3>&nbsp;</h3>
														<ul class="subchildmenu">
															<li>
																<a>Build Your Own</a>
																<ul class="subchildmenu">
																	<li><a href="<?php echo SITE_URL; ?>engagement/search">Build Your Own Ring</a></li>
																	<li><a href="<?php echo SITE_URL; ?>jewelry/build_earings">Build Your Own Earring</a></li>
																	<li><a href="<?php echo SITE_URL; ?>jewelry/buildthree_stonesring">Build Your Own Three Stone Ring</a></li>
																	<li><a href="<?php echo SITE_URL; ?>jewelry/buildiamond_pendant">Build Your Own Pendant</a></li>
																</ul>
															</li>
														</ul>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li class="nav-item level0 fullwidth parent Gemstones">
							<a class="nav-link" href="<?php echo SITE_URL; ?>diamonds/gemstones-search">Gemstones</a>
						</li>
						<li class="nav-item level0 fullwidth parent Engagement Rings" id="Engagement_Rings">
							<a class="nav-link" href="<?php echo SITE_URL; ?>engagement-ring.html">Engagement</a>
							<div class="level0 submenu">
								<div class="container">
									<div class="row">
										<div class="menu-left-block col-md-6">
											<div class="right_left_menu_section">
												<h3><a href="<?php echo SITE_URL; ?>engagement-rings/">Find a Ring</a></h3>
												<div class="left_menu">
													<div class="sub_menu">
														<ul class="subchildmenu">
															<li>
																<a>Bridal Collection</a>
																<ul class="subchildmenu">
																	<li><a href="<?php echo SITE_URL; ?>diamonds/engagement-rings/bridal-rings">Engagement Rings</a></li>
																	<li><a href="<?php echo SITE_URL; ?>diamonds/engagement-rings/everNever">Ever & Ever Wedding Bands</a></li>
																</ul>
															</li>
														</ul>
													</div>
												</div>
												<div class="right_menu1 left_menu">
													<div class="sub_menu">
														<ul class="subchildmenu">
															<li>
																<a>Build Your Own</a>
																<ul class="subchildmenu">
																	<li><a href="<?php echo SITE_URL; ?>engagement/search">Build Your Own Ring</a></li>
																	<li><a href="<?php echo SITE_URL; ?>jewelry/build_earings">Build Your Own Earring</a></li>
																	<li><a href="<?php echo SITE_URL; ?>jewelry/buildthree_stonesring">Build Your Own Three Stone Ring</a></li>
																	<li><a href="<?php echo SITE_URL; ?>jewelry/buildiamond_pendant">Build Your Own Pendant</a></li>
																</ul>
															</li>
														</ul>
													</div>
												</div>
											</div>
										</div>
										<div class="menu-right-block col-md-6">
											<div class="right_menu_section">
												<div class="left_menu">
													<div class="sub_menu">
														<h3>&nbsp;</h3>
														<ul class="subchildmenu">
															<li>
																<a href="<?php echo SITE_URL; ?>diamonds/engagement-rings">Get inspired by engagement rings</a>
																<ul class="subchildmenu col-md-6">
																	<li><a href="<?php echo SITE_URL; ?>diamonds/engagement-rings/halo-style">Halo Style Rings</a></li>
																	<li><a href="<?php echo SITE_URL; ?>diamonds/engagement-rings/accented-style">Accented Style Rings</a></li>
																	<li><a href="<?php echo SITE_URL; ?>diamonds/engagement-rings/three-stone-style">Three-Stone Style Rings</a></li>
																</ul>
																<ul class="subchildmenu col-md-6">
																	<li><a href="<?php echo SITE_URL; ?>diamonds/engagement-rings/solitaire-style">Solitaire Style Rings</a></li>
																	<li><a href="<?php echo SITE_URL; ?>diamonds/engagement-rings/sculptural-style">Sculptural Style Rings</a></li>
																	<li><a href="<?php echo SITE_URL; ?>diamonds/engagement-rings/vintage-style">Vintage Style Rings</a></li>
																</ul>
															</li>
														</ul>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li class="nav-item level0 fullwidth parent Designers" id="Wedding_Bands">
							<a class="nav-link" href="<?php echo config_item('base_url') ?>wedding-rings.html">Wedding</a>
							<div class="level0 submenu">
								<div class="container">
									<div class="row">
										<div class="menu-right-block col-md-6">
											<div class="right_menu_section">
												<div class="left_menu">
													<div class="sub_menu">
														<h3>&nbsp;</h3>
														<ul class="subchildmenu">
															<li>
																<a href="javascript:void(0);">Shop By Bands Style</a>
																<ul class="subchildmenu col-md-6">
																	<li><a href="<?php echo SITE_URL; ?>diamonds/wedding-bands/anniversary_band">Anniversary Style Bands</a></li>
																	<li><a href="<?php echo SITE_URL; ?>diamonds/wedding-bands/classic_band">Classic Style Bands</a></li>
																</ul>
																<ul class="subchildmenu col-md-6">
																	<li><a href="<?php echo SITE_URL; ?>diamonds/wedding-bands/eternity_band">Eternity Style Bands</a></li>
																	<li><a href="<?php echo SITE_URL; ?>diamonds/wedding-bands/fancy_band">Fancy Style Bands</a></li>
																	<li><a href="<?php echo SITE_URL; ?>diamonds/wedding-bands/matching_band">Matching Style Bands</a></li>
																</ul>
															</li>
														</ul>
													</div>
												</div>
											</div>
										</div>
										<div class="menu-left-block col-md-6">
											<div class="right_left_menu_section">
												<h3>&nbsp;</h3>
												<div class="right_menu">
													<div class="sub_menu">
														<ul class="subchildmenu">
															<li>
																<a href="javascript:void(0);">Get inspired by Wedding Band</a>
																<ul class="subchildmenu col-md-6">
																	<li><a href="<?php echo SITE_URL; ?>diamonds/wedding-bands/anniversary">Anniversary & Eternity Bands</a></li>
																	<li><a href="<?php echo SITE_URL; ?>diamonds/wedding-bands/mens">Men's Wedding Bands</a></li>
																	<li><a href="<?php echo SITE_URL; ?>diamonds/wedding-bands/womens">Women's Wedding Bands</a></li>
																</ul>
																<ul class="subchildmenu col-md-6">
																	<li><a href="<?php echo SITE_URL; ?>diamonds/wedding-bands/3C-bands">3C Bands </a></li>
																	<li><a href="<?php echo SITE_URL; ?>diamonds/wedding-bands/contemporary-metal">Contemporary Metal Bands</a></li>
																</ul>
															</li>
														</ul>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li class="nav-item ui-menu-item level0 fullwidth parent" id="Womens">
							<a class="nav-link" href="<?php echo config_item('base_url') ?>fine-jewelry.html">Fine Jewerly</a>
							<div class="level0 submenu">
								<div class="container">
									<div class="row">
										<div class="menu-left-block col-md-7">
											<div class="right_menu_section">
												<div class="left_menu">
													<div class="sub_menu">
														<h3>&nbsp;</h3>
														<ul class="subchildmenu">
															<li>
																<a href="javascript:void(0);">Shop By Jewelry</a>
																<ul class="subchildmenu col-md-4">
																	<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/rings-jewelry">Rings</a></li>
																	<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/earrings-jewelry">Earrings</a></li>
																	<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/necklacesNpendants">Necklaces & Pendants</a></li>
																	<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/bracelets-jewelry">Bracelets</a></li>
																	<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/broochesNpins">Brooches & Pins</a></li>
																</ul>
																<ul class="subchildmenu col-md-4">
																	<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/chainNcord">Chain & Cord</a></li>
																	<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/beadsNcharms">Beads & Charms</a></li>
																	<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/roses-jewelry">Roses</a></li>
																	<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/family-jewelry">Family Jewelry</a></li>
																	<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/religiousNsymbolic">Religious & Symbolic</a></li>
																</ul>
																<ul class="subchildmenu col-md-4">
																	<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/mens-jewelry">Men's Jewelry</a></li>
																	<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/youth-jewelry">Youth Jewelry</a></li>
																	<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/pearl-jewelry">Pearl Jewelry</a></li>
																	<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/personalization">Personalization</a></li>
																	<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/birthstone-jewelry">Birthstone Jewelry</a></li>
																</ul>
															</li>
														</ul>
													</div>
												</div>
											</div>
										</div>
										<div class="menu-right-block col-md-5">
											<div class="right_menu_section">
												<div class="left_menu">
													<div class="sub_menu">
														<h3>&nbsp;</h3>
														<ul class="subchildmenu">
															<li>
																<a href="<?php echo SITE_URL; ?>diamonds/engagement-rings">Shop By Mountings</a>
																<ul class="subchildmenu col-md-6">
																	<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/3c-collections">3C Collections</a></li>
																	<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/bridal-collections">Bridal Collections</a></li>
																	<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/rings-collections">Rings Collections</a></li>
																	<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/neckwear-collections">Neckwear Collections</a></li>
																	<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/earrings-collections">Earrings Collections</a></li>
																</ul>
																<ul class="subchildmenu col-md-6">
																	<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/family-collections">Family Jewelry Collections</a></li>
																	<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/bracelets-collections">Bracelets Collections</a></li>
																	<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/mens-collections">Men's Jewelry Collections</a></li>
																	<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/religious-collections">Religious Collections</a></li>
																</ul>
															</li>
														</ul>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li class="nav-item level0 fullwidth parent Designers">
							<a class="nav-link" href="<?php echo config_item('base_url') ?>learn.html">Learn</a>
						</li>
						<li class="nav-item level0 fullwidth parent Designers">
							<a class="nav-link" href="<?php echo config_item('base_url') ?>faq.html">FAQ</a>
						</li>
					</ul>
				</nav>
				<form class="form-inline" id="search_mini_form" action="<?php echo SITE_URL; ?>search" method="get">
					<input class="form-control" type="search" name="search_field" id="search_field" placeholder="Search" onkeyup="search_items_result()" aria-label="Search" value="<?= (isset($searchField) && !empty($searchField))?$searchField:'';?>" aria-haspopup="false" aria-autocomplete="both" autocomplete="off">
					<div id="search_autocomplete" class="search-autocomplete"><ul></ul></div>
					<button class="btn action search" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
				</form>
			</div>
		</div>
	</div>
</nav>
<!-- Header end -->
<header>
	<nav class="only-for-mobile-menu" id="showmblemenu" style="left:-100%;">
		<ul>
			<li>
				<div class="menucbtn nav-bar" style="background-color: transparent;margin-top: -20px;">
					<a href=""><p class="fa fa-bars">Close</p><span></span></a>
				</div>
			</li>
			<li>
				<div class="block block-search">
					<div class="block block-title"><strong>Search</strong></div>
					<div class="block block-content">
						<form class="form minisearch" id="search_mini_form" action="<?php echo SITE_URL; ?>search" method="get">
							<div class="field search">
								<label class="label" for="search" data-role="minisearch-label"><i class="fa fa-search"></i></label>
								<div class="control">
									<input type="text" name="search_field" id="search_field" class="input-text" onkeyup="search_items_result()" value="<?= (isset($searchField) && !empty($searchField))?$searchField:'';?>" placeholder="Search" maxlength="255" role="combobox" aria-haspopup="false" aria-autocomplete="both" autocomplete="off">
									<div id="search_autocomplete" class="search-autocomplete"><ul></ul></div>
								</div>
							</div>
							<div class="actions">
								<button type="submit" title="Search" class="action search"><span>Search</span></button>
							</div>
						</form>
					</div>
				</div>
			</li>
			<li class="sub-menus">
				<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">Diamonds </a>
				<ul class="children">
					<li class="innersub-menus">
						<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">Loose diamonds &nbsp;</a>
						<ul class="innerchildren">
							<li><a data-container="#WidePane" data-qa="round_loose_diamonds" href="<?php echo SITE_URL; ?>diamonds/diamonds-search/round-cut/" class="class-icon--37NL7 icon-round"><span>Round</span></a></li>
							<li><a data-container="#WidePane" data-qa="princess_loose_diamonds" href="<?php echo SITE_URL; ?>diamonds/diamonds-search/princess-cut/" class="class-icon--37NL7 icon-princess"><span>Princess</span></a></li>
							<li><a data-container="#WidePane" data-qa="cushion_loose_diamonds" href="<?php echo SITE_URL; ?>diamonds/diamonds-search/cushion-cut/" class="class-icon--37NL7 icon-cushion"><span>Cushion</span></a></li>
							<li><a data-container="#WidePane" data-qa="emerald_loose_diamonds" href="<?php echo SITE_URL; ?>diamonds/diamonds-search/emerald-cut/" class="class-icon--37NL7 icon-emerald"><span>Emerald</span></a></li>
							<li><a data-container="#WidePane" data-qa="pear_loose_diamonds" href="<?php echo SITE_URL; ?>diamonds/diamonds-search/pear-shaped/" class="class-icon--37NL7 icon-pear"><span>Pear</span></a></li>
							<li><a data-container="#WidePane" data-qa="oval_loose_diamonds" href="<?php echo SITE_URL; ?>diamonds/diamonds-search/oval-cut/" class="class-icon--37NL7 icon-oval"><span>Oval</span></a></li>
							<li><a data-container="#WidePane" data-qa="radiant_loose_diamonds" href="<?php echo SITE_URL; ?>diamonds/diamonds-search/radiant-cut/" class="class-icon--37NL7 icon-radiant"><span>Radiant</span></a></li>
							<li><a data-container="#WidePane" data-qa="asscher_loose_diamonds" href="<?php echo SITE_URL; ?>diamonds/diamonds-search/asscher-cut/" class="class-icon--37NL7 icon-asscher"><span>Asscher</span></a></li>
							<li><a data-container="#WidePane" data-qa="marquise_loose_diamonds" href="<?php echo SITE_URL; ?>diamonds/diamonds-search/marquise-cut/" class="class-icon--37NL7 icon-marquise"><span>Marquise</span></a></li>
							<li><a data-container="#WidePane" data-qa="heart_loose_diamonds" href="<?php echo SITE_URL; ?>diamonds/diamonds-search/heart-shaped/" class="class-icon--37NL7 icon-heart2"><span>Heart</span></a></li>
						</ul>
					</li>
					<li class="innersub-menus">
						<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">fancy color diamonds &nbsp;</a>
						<ul class="innerchildren">
							<li><a data-container="#WidePane" data-qa="yellow_color_diamonds" href="<?php echo SITE_URL; ?>diamonds/color-diamonds-search/yellow-color" class="class-icon--37NL7 icon-round yellow--37ZPO"><span>Yellow</span></a></li>
							<li><a data-container="#WidePane" data-qa="pink_color_diamonds" href="<?php echo SITE_URL; ?>diamonds/color-diamonds-search/pink-color" class="class-icon--37NL7 icon-marquise pink--3gEGn"><span>Pink</span></a></li>
							<li><a data-container="#WidePane" data-qa="purple_color_diamonds" href="<?php echo SITE_URL; ?>diamonds/color-diamonds-search/purple-color" class="class-icon--37NL7 icon-heart2 purple--3805f"><span>Purple</span></a></li>
							<li><a data-container="#WidePane" data-qa="blue_color_diamonds" href="<?php echo SITE_URL; ?>diamonds/color-diamonds-search/blue-color" class="class-icon--37NL7 icon-oval blue--1tyqL"><span>Blue</span></a></li>
							<li><a data-container="#WidePane" data-qa="green_color_diamonds" href="<?php echo SITE_URL; ?>diamonds/color-diamonds-search/green-color" class="class-icon--37NL7 icon-cushion green--2WQCn"><span>Green</span></a></li>
							<li><a data-container="#WidePane" data-qa="orange_color_diamonds" href="<?php echo SITE_URL; ?>diamonds/color-diamonds-search/orange-color" class="class-icon--37NL7 icon-emerald orange--3Zbxs"><span>Orange</span></a></li>
							<li><a data-container="#WidePane" data-qa="brown_color_diamonds" href="<?php echo SITE_URL; ?>diamonds/color-diamonds-search/brown-color" class="class-icon--37NL7 icon-asscher brown--10NIq"><span>Brown</span></a></li>
							<li><a data-container="#WidePane" data-qa="black_color_diamonds" href="<?php echo SITE_URL; ?>diamonds/color-diamonds-search/black-color" class="class-icon--37NL7 icon-pear black--2m6P7"><span>Black</span></a></li>
						</ul>
					</li>
					<li class="innersub-menus">
						<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">Build Your Own &nbsp;</a>
						<ul class="innerchildren">
							<li><a href="<?php echo SITE_URL; ?>engagement/search">Build Your Own Ring</a></li>
							<li><a href="<?php echo SITE_URL; ?>jewelry/build_earings">Build Your Own Earring</a></li>
							<li><a href="<?php echo SITE_URL; ?>jewelry/buildthree_stonesring">Build Your Own Three Stone Ring</a></li>
							<li><a href="<?php echo SITE_URL; ?>jewelry/buildiamond_pendant">Build Your Own Pendant</a></li>
						</ul>
					</li>
				</ul>
			</li>
			<li class="sub-menus">
				<a href="<?php echo SITE_URL; ?>diamonds/gemstones-search" class="dropdown-toggle hvr-underline-from-center upercase">Gemstones</a>
			</li>
			<li class="sub-menus">
				<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">Engagement </a>
				<ul class="children">
					<li class="innersub-menus">
						<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">Bridal Collection &nbsp;</a>
						<ul class="innerchildren">
							<li><a href="<?php echo SITE_URL; ?>diamonds/engagement-rings/bridal-rings">Engagement Rings</a></li>
							<li><a href="<?php echo SITE_URL; ?>diamonds/engagement-rings/everNever">Ever & Ever Wedding Bands</a></li>
						</ul>
					</li>
					<li class="innersub-menus">
						<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">Build Your Own &nbsp;</a>
						<ul class="innerchildren">
							<li><a href="<?php echo SITE_URL; ?>engagement/search">Build Your Own Ring</a></li>
							<li><a href="<?php echo SITE_URL; ?>jewelry/build_earings">Build Your Own Earring</a></li>
							<li><a href="<?php echo SITE_URL; ?>jewelry/buildthree_stonesring">Build Your Own Three Stone Ring</a></li>
							<li><a href="<?php echo SITE_URL; ?>jewelry/buildiamond_pendant">Build Your Own Pendant</a></li>
						</ul>
					</li>
					<li class="innersub-menus">
						<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">Get inspired by engagement rings &nbsp;</a>
						<ul class="innerchildren">
							<li><a href="<?php echo SITE_URL; ?>diamonds/engagement-rings/halo-style">Halo Style Rings</a></li>
							<li><a href="<?php echo SITE_URL; ?>diamonds/engagement-rings/accented-style">Accented Style Rings</a></li>
							<li><a href="<?php echo SITE_URL; ?>diamonds/engagement-rings/three-stone-style">Three-Stone Style Rings</a></li>
							<li><a href="<?php echo SITE_URL; ?>diamonds/engagement-rings/solitaire-style">Solitaire Style Rings</a></li>
							<li><a href="<?php echo SITE_URL; ?>diamonds/engagement-rings/sculptural-style">Sculptural Style Rings</a></li>
							<li><a href="<?php echo SITE_URL; ?>diamonds/engagement-rings/vintage-style">Vintage Style Rings</a></li>
						</ul>
					</li>
				</ul>
			</li>
			<li class="sub-menus">
				<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">Wedding </a>
				<ul class="children">
					<li class="innersub-menus">
						<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">Get inspired by Wedding Band &nbsp;</a>
						<ul class="innerchildren">
							<li><a href="<?php echo SITE_URL; ?>diamonds/wedding-bands/anniversary">Anniversary & Eternity Bands</a></li>
							<li><a href="<?php echo SITE_URL; ?>diamonds/wedding-bands/mens">Men's</a></li>
							<li><a href="<?php echo SITE_URL; ?>diamonds/wedding-bands/womens">Women's</a></li>
							<li><a href="<?php echo SITE_URL; ?>diamonds/wedding-bands/3C-bands">3C Bands</a></li>
							<li><a href="<?php echo SITE_URL; ?>diamonds/wedding-bands/contemporary-metal">Contemporary Metal</a></li>
						</ul>
					</li>
					<li class="innersub-menus">
						<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">Shop By Bands Style &nbsp;</a>
						<ul class="innerchildren">
							<li><a href="<?php echo SITE_URL; ?>diamonds/wedding-bands/anniversary_band">Anniversary Bands</a></li>
							<li><a href="<?php echo SITE_URL; ?>diamonds/wedding-bands/classic_band">Classic Bands</a></li>
							<li><a href="<?php echo SITE_URL; ?>diamonds/wedding-bands/eternity_band">Eternity Bands</a></li>
							<li><a href="<?php echo SITE_URL; ?>diamonds/wedding-bands/fancy_band">Fancy Bands</a></li>
							<li><a href="<?php echo SITE_URL; ?>diamonds/wedding-bands/matching_band">Matching Bands</a></li>
						</ul>
					</li>
					<li class="innersub-menus">
						<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">Shop By Bands Shape &nbsp;</a>
						<ul class="innerchildren">
							<li><a href="<?php echo SITE_URL; ?>diamonds/wedding-bands/asscher">Asscher Shape Bands</a></li>
							<li><a href="<?php echo SITE_URL; ?>diamonds/wedding-bands/cushion">Cushion Shape Bands</a></li>
							<li><a href="<?php echo SITE_URL; ?>diamonds/wedding-bands/emerald">Emerald Shape Bands</a></li>
							<li><a href="<?php echo SITE_URL; ?>diamonds/wedding-bands/marquise">Marquise Shape Bands</a></li>
							<li><a href="<?php echo SITE_URL; ?>diamonds/wedding-bands/oval">Oval Shape Shape Bands</a></li>
							<li><a href="<?php echo SITE_URL; ?>diamonds/wedding-bands/pear">Pear Shape Bands</a></li>
							<li><a href="<?php echo SITE_URL; ?>diamonds/wedding-bands/round">Round Shape Bands</a></li>
							<li><a href="<?php echo SITE_URL; ?>diamonds/wedding-bands/princess">Princess Shape Bands</a></li>
						</ul>
					</li>
				</ul>
			</li>
			<li class="sub-menus">
				<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">Fine Jewerly </a>
				<ul class="children">
					<li class="innersub-menus">
						<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">Shop By Jewelry &nbsp;</a>
						<ul class="innerchildren">
							<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/rings-jewelry">Rings</a></li>
							<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/earrings-jewelry">Earrings</a></li>
							<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/necklacesNpendants">Necklaces & Pendants</a></li>
							<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/bracelets-jewelry">Bracelets</a></li>
							<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/broochesNpins">Brooches & Pins</a></li>
							<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/chainNcord">Chain & Cord</a></li>
							<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/beadsNcharms">Beads & Charms</a></li>
							<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/roses-jewelry">Roses</a></li>
							<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/family-jewelry">Family Jewelry</a></li>
							<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/religiousNsymbolic">Religious & Symbolic</a></li>
							<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/mens-jewelry">Men's Jewelry</a></li>
							<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/youth-jewelry">Youth Jewelry</a></li>
							<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/pearl-jewelry">Pearl Jewelry</a></li>
							<?php /* <li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/diamond-studs">Diamond Studs</a></li>
							<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/lab-grown">Lab-Grown Diamond Jewelry</a></li> */ ?>
							<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/personalization">Personalization</a></li>
							<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/birthstone-jewelry">Birthstone Jewelry</a></li>
						</ul>
					</li>
					<li class="innersub-menus">
						<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">Shop By Mountings &nbsp;</a>
						<ul class="innerchildren">
							<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/3c-collections">3C Collections</a></li>
							<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/bridal-collections">Bridal</a></li>
							<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/rings-collections">Rings</a></li>
							<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/neckwear-collections">Neckwear</a></li>
							<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/earrings-collections">Earrings</a></li>
							<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/family-collections">Family Jewelry</a></li>
							<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/bracelets-collections">Bracelets</a></li>
							<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/mens-collections">Men's Jewelry</a></li>
							<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/religious-collections">Religious</a></li>
						</ul>
					</li>
				</ul>
			</li>
			<li class="sub-menus">
				<a href="<?php echo SITE_URL; ?>learn.html" class="dropdown-toggle hvr-underline-from-center upercase">Learn</a>
			</li>
			<li class="sub-menus">
				<a href="<?php echo SITE_URL; ?>faq.html" class="dropdown-toggle hvr-underline-from-center upercase">FAQ</a>
			</li>
			<li class="sub-menus">
				<a href="<?php echo SITE_URL; ?>site/jewelary/custom" class="dropdown-toggle hvr-underline-from-center upercase">Customize Your Ring</a>
			</li>
		</ul>
	</nav>
</header>
<script data-cfasync="false" type="text/javascript" language="javascript">
$(document).ready(function(){
	$("#Diamonds").mouseover(function(){
		$(this).addClass(' hover');
		$('#Diamonds li.level0.submenu').css({ 'opacity': '1', 'visibility': 'visible' });
	});
	$("#Womens").mouseover(function(){
		$(this).addClass(' hover');
		$('#Womens li.level0.submenu').css({ 'opacity': '1', 'visibility': 'visible' });
	});
	$("#Engagement_Rings").mouseover(function(){
		$(this).addClass(' hover');
		$('#Engagement_Rings li.level0.submenu').css({ 'opacity': '1', 'visibility': 'visible' });
	});
	$("#Wedding_Bands").mouseover(function(){
		$(this).addClass(' hover');
		$('#Wedding_Bands li.level0.submenu').css({ 'opacity': '1', 'visibility': 'visible' });
	});
	$(".wsmenu").mouseover(function(){
		$(".wsmegamenu.halfdiv").show();
	});
	/* $(".wsmenu").mouseleave(function(){
		$(".wsmegamenu.halfdiv").hide();
	}); */
});

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
<script data-cfasync="false" type="text/javascript" language="javascript">
function search_items_result() {
	var s_field = $("#search_field").val();
	$.ajax({
		type: "POST",
		url: base_url + 'engagement/search_item_result/?search_field='+s_field,
		success: function(response) {
			if(response){
				$("#search_autocomplete").show();
				$("#search_autocomplete ul").html(response);
			}else{
				$("#search_autocomplete").hide();
				$("#search_autocomplete ul").html('');
			}
		},
		error: function(){
		}
	});
}
function ch_men(ch_id){
	$('.d_sub_menu').hide();
	$('#'+ch_id).show();
}
</script>
<div class="page-wrapper">
	<div <?php if(isset($page) && $page == 'search'){ echo 'style="background-color: #fff;"'; }else{ ?>class="container main_wraper"<?php } ?>>
		<link rel="stylesheet" href="<?php echo SITE_URL; ?>css/header-new-style.css">
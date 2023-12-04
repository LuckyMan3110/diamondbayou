<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php echo (isset($meta_tags) && !empty($meta_tags)) ? $meta_tags : ''; ?>
		<meta name="google-site-verification" content="Epnk9IwQR1i8rkAuuRMxoKDTCbTgdl2g8u5nzLr6jqk" />
		<script data-cfasync="false" type="text/javascript">
		var base_url = '<?php echo config_item('base_url') ?>';
		var BASE_URL = base_url;
		var base_link = '<?php echo config_item('base_url') ?>';
		</script>
		<link rel="icon" href="<?php echo config_item('base_url') ?>assets/images/favicon.png" type="image/x-icon"/>
		<link rel="shortcut icon" href="<?php echo config_item('base_url') ?>assets/images/favicon.png" type="image/x-icon"/>
		<title><?php echo ( !empty( $title ) ? $title : 'Welcome to ' . get_site_contact_info('sites_title') ); ?> | <?php echo get_site_contact_info('dashboard_title'); ?></title>
		<!--Google font-->
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<!-- Fonts-awesome & falticon icon -->
		<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
		<!-- owl slider -->
		<link rel="stylesheet" href="assets/css/slick.css">
		<link rel="stylesheet" href="assets/css/slick-theme.css">
		<!-- Theme css -->
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">
		<link rel="stylesheet" type="text/css" href="assets/css/styles-l.min.css?v=0.01">
	</head>
	<body id="home" class="catalog-category-view categorypath-diamond-engagement-rings-aspx category-diamond-engagement-rings home_page">
		<!-- Header -->
		<nav class="navbar navbar-expand-lg theme-header">
			<div class="container">
				<a class="navbar-brand" href="<?php echo config_item('base_url') ?>"><img src="<?php echo config_item('base_url') ?>assets/images/godstonelogo.png" class="img-fluid" alt="logo"></a>
				<button class="navbar-toggler" id="menubtn" type="button">
				<img src="<?php echo config_item('base_url') ?>assets/images/menu-toggle.png" class="img-fluid" alt="menu-toggle"></button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<div class="right-menu-nav ml-auto mb-2 mb-lg-0">
						<div class="nav-icon">
							<div class="left-icon">
								<a id="header-telephone" href="tel:716-889-4803" data-category="Header" data-action="Click" data-label="Call Us_Other">(716) 889-4803</a>
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
						@media only screen and (max-width: 767px) {
						header nav{width:80%}
						}
						</style>
						<nav class="navigation sw-megamenu" role="navigation">
							<ul class="navbar-nav ml-auto mb-2 mb-lg-0">
								<li class="nav-item ui-menu-item level0 fullwidth parent" id="Diamonds">
									<a class="nav-link active" aria-current="page" href="<?php echo config_item('base_url') ?>loose-diamonds">Diamonds</a>
									<div class="level0 submenu">
										<div class="container">
											<div class="row">
												<div class="menu-left-block col-md-6">
													<div class="right_left_menu_section">
														<h3>&nbsp;</h3>
														<div class="left_menu">
															<div class="sub_menu">
																<ul class="subchildmenu loosediamond">
																	<li>
																		<a>Godstone Diamonds <span>Loose diamonds</span></a>
																		<ul class="subchildmenu">
																			<li><a href="<?php echo SITE_URL; ?>diamonds/diamonds-search/round-cut/"><i class="iconking-round"></i>Round</a></li>
																			<li><a href="<?php echo SITE_URL; ?>diamonds/diamonds-search/princess-cut/"><i class="iconking-princess"></i>Princess</a></li>
																			<li><a href="<?php echo SITE_URL; ?>diamonds/diamonds-search/cushion-cut/"><i class="iconking-cushion"></i>Cushion</a></li>
																			<li><a href="<?php echo SITE_URL; ?>diamonds/diamonds-search/emerald-cut/"><i class="iconking-emerald"></i>Emerald</a></li>
																			<li><a href="<?php echo SITE_URL; ?>diamonds/diamonds-search/pear-shaped/"><i class="iconking-pear"></i>Pear</a></li>
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
																		<ul class="subchildmenu ul-column--1KfUm">
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
																<ul class="subchildmenu labdiamond">
																	<li>
																		<a>Lab Diamonds</a>
																		<ul class="subchildmenu">
																			<li><a href="<?php echo SITE_URL; ?>diamonds/diamonds-search/asscher-ldcut"><i class="iconking-asscher"></i>Asscher</a></li>
																			<li><a href="<?php echo SITE_URL; ?>diamonds/diamonds-search/cushion-ldcut"><i class="iconking-cushion"></i>Cushion</a></li>
																			<li><a href="<?php echo SITE_URL; ?>diamonds/diamonds-search/emerald-ldcut"><i class="iconking-emerald"></i>Emerald Cut</a></li>
																			<li><a href="<?php echo SITE_URL; ?>diamonds/diamonds-search/heart-ldshaped"><i class="iconking-heart"></i>Heart Shape</a></li>
																			<li><a href="<?php echo SITE_URL; ?>diamonds/diamonds-search/marquise-ldcut"><i class="iconking-marquise"></i>Marquise</a></li>
																			<li><a href="<?php echo SITE_URL; ?>diamonds/diamonds-search/oval-ldcut"><i class="iconking-oval"></i>Oval</a></li>
																			<li><a href="<?php echo SITE_URL; ?>diamonds/diamonds-search/pear-ldshaped"><i class="iconking-pear"></i>Pear Shape</a></li>
																			<li><a href="<?php echo SITE_URL; ?>diamonds/diamonds-search/princess-ldcut"><i class="iconking-princess"></i>Princess</a></li>
																			<li><a href="<?php echo SITE_URL; ?>diamonds/diamonds-search/radiant-ldcut"><i class="iconking-radiant"></i>Radiant</a></li>
																			<li><a href="<?php echo SITE_URL; ?>diamonds/diamonds-search/round-ldcut"><i class="iconking-round"></i>Round</a></li>
																		</ul>
																	</li>
																</ul>
															</div>
														</div>
														<div class="right_menu">
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
								<li class="nav-item level0 fullwidth parent Engagement Rings" id="Engagement_Rings">
									<a class="nav-link" href="<?php echo config_item('base_url') ?>engagement-ring">Engagement</a>
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
																		<a href="<?php echo SITE_URL; ?>diamonds/engagement-rings">Get inspired by customer's rings</a>
																		<ul class="subchildmenu">
																			<li><a href="<?php echo SITE_URL; ?>diamonds/engagement-rings/round-cut-rings">round cut rings</a></li>
																			<li><a href="<?php echo SITE_URL; ?>diamonds/engagement-rings/princess-cut-rings">princess cut rings</a></li>
																			<li><a href="<?php echo SITE_URL; ?>diamonds/engagement-rings/cushion-cut-rings">cushion cut rings</a></li>
																		</ul>
																	</li>
																</ul>
															</div>
															<div class="sub_menu">
																<ul class="subchildmenu">
																	<li>
																		<a href="<?php echo SITE_URL; ?>diamonds/engagement-rings">Engagement ring styles</a>
																		<ul class="subchildmenu">
																			<li><a href="<?php echo SITE_URL; ?>diamonds/engagement-rings/solitaire">Solitaire</a></li>
																			<li><a href="<?php echo SITE_URL; ?>diamonds/engagement-rings/pave">Pavé</a></li>
																			<li><a href="<?php echo SITE_URL; ?>diamonds/engagement-rings/channel-set">Channel-Set</a></li>
																			<li><a href="<?php echo SITE_URL; ?>diamonds/engagement-rings/side-stones">Side-Stone</a></li>
																			<li><a href="<?php echo SITE_URL; ?>diamonds/engagement-rings/tension">Tension</a></li>
																			<li><a href="<?php echo SITE_URL; ?>diamonds/engagement-rings/vintage">Vintage</a></li>
																			<li><a href="<?php echo SITE_URL; ?>diamonds/engagement-rings/halo">Halo</a></li>
																			<li><a href="<?php echo SITE_URL; ?>diamonds/engagement-rings/three-stone">Three-Stone</a></li>
																		</ul>
																	</li>
																</ul>
															</div>
														</div>
														<div class="right_menu1 left_menu">
															<div class="sub_menu">
																<ul class="subchildmenu">
																	<li>
																		<a href="<?php echo SITE_URL; ?>diamonds/engagement-rings">Designer collection</a>
																		<ul class="subchildmenu">
																			<li><a href="<?php echo SITE_URL; ?>diamonds/engagement-rings/Classic Trellis">Classic Trellis</a></li>
																			<li><a href="<?php echo SITE_URL; ?>diamonds/engagement-rings/Classic with Accents">Classic with Accents</a></li>
																			<li><a href="<?php echo SITE_URL; ?>diamonds/engagement-rings/Four-Diamonds Row">Four-Diamonds Row</a></li>
																			<li><a href="<?php echo SITE_URL; ?>diamonds/engagement-rings/Milgrains">Milgrains</a></li>
																			<li><a href="<?php echo SITE_URL; ?>diamonds/engagement-rings/Split Shank">Split Shank</a></li>
																			<li><a href="<?php echo SITE_URL; ?>diamonds/engagement-rings">All Other Designs</a></li>
																		</ul>
																	</li>
																</ul>
															</div>
															<div class="sub_menu">
																<ul class="subchildmenu">
																	<li>
																		<a>Shop by metal</a>
																		<ul class="subchildmenu">
																			<li><a href="<?php echo SITE_URL; ?>diamonds/engagement-rings/white-gold">white gold</a></li>
																			<li><a href="<?php echo SITE_URL; ?>diamonds/engagement-rings/yellow-gold">yellow gold</a></li>
																			<li><a href="<?php echo SITE_URL; ?>diamonds/engagement-rings/platinum">platinum</a></li>
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
																		<a>The Star Collection</a>
																		<ul class="subchildmenu">
																			<li><a href="<?php echo SITE_URL; ?>diamonds/star-collection/new-arrivals">All New Arrivals</a></li>
																			<li><a href="<?php echo SITE_URL; ?>diamonds/star-collection/best-sellers">Best Sellers</a></li>
																			<li><a href="<?php echo SITE_URL; ?>diamonds/star-collection/color-stone-rings">Color Stone Rings</a></li>
																			<li><a href="<?php echo SITE_URL; ?>diamonds/star-collection/engagement-rings">Engagement Rings</a></li>
																			<li><a href="<?php echo SITE_URL; ?>diamonds/star-collection/engagement-sets">Engagement Sets</a></li>
																			<li><a href="<?php echo SITE_URL; ?>diamonds/star-collection/fancy-rings">Fancy Rings</a></li>
																			<li><a href="<?php echo SITE_URL; ?>diamonds/star-collection/fashion">Fashion</a></li>
																			<li><a href="<?php echo SITE_URL; ?>diamonds/star-collection/findings">Findings</a></li>
																			<li><a href="<?php echo SITE_URL; ?>diamonds/star-collection/mens-rings">Men's Rings</a></li>
																			<li><a href="<?php echo SITE_URL; ?>diamonds/star-collection/pendants">Pendants</a></li>
																			<li><a href="<?php echo SITE_URL; ?>diamonds/star-collection/wedding-bands">Wedding Bands</a></li>
																		</ul>
																	</li>
																</ul>
															</div>
														</div>
														<div class="right_menu">
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
								<li class="nav-item level0 fullwidth parent Designers" id="Wedding_Bands">
									<a class="nav-link" href="<?php echo config_item('base_url') ?>wedding-rings">Wedding</a>
									<div class="level0 submenu">
										<div class="container">
											<div class="row">
												<div class="menu-left-block col-md-6">
													<div class="right_menu_section">
														<div class="left_menu">
															<div class="sub_menu">
																<h3>&nbsp;</h3>
																<ul class="subchildmenu">
																	<li><a href="<?php echo SITE_URL; ?>diamonds/wedding-bands/oneil">Oneil Wedding Bands</a></li>
																	<li><a href="<?php echo SITE_URL; ?>diamonds/wedding-bands/carrols">Carrols Wedding Band</a></li>
																	<li><a href="<?php echo SITE_URL; ?>diamonds/wedding-bands/stuller">Stuller Wedding Band</a></li>
																</ul>
															</div>
														</div>
														<div class="right_menu">
															<div class="sub_menu">
																<h3>&nbsp;</h3>
																<ul class="subchildmenu">
																	<li>
																		<a>Women's wedding bands</a>
																		<ul class="subchildmenu">
																			<li><a href="<?php echo SITE_URL; ?>diamonds/star-collection/diamond-bands">Diamond bands</a></li>
																			<li><a href="<?php echo SITE_URL; ?>diamonds/star-collection/band-sets">Band sets</a></li>
																			<li><a href="<?php echo SITE_URL; ?>diamonds/star-collection/traditional-bands">Traditional bands</a></li>
																			<li><a href="<?php echo SITE_URL; ?>diamonds/star-collection/eternity-bands">Eternity bands</a></li>
																		</ul>
																	</li>
																</ul>
															</div>
														</div>
													</div>
												</div>
												<div class="menu-left-block col-md-6">
													<div class="right_menu_section">
														<div class="left_menu">
															<div class="sub_menu">
																<h3>&nbsp;</h3>
																<ul class="subchildmenu">
																	<li>
																		<a>Men's wedding bands</a>
																		<ul class="subchildmenu">
																			<li><a href="<?php echo SITE_URL; ?>diamonds/star-collection/men-wedding-bands">Wedding Band</a></li>
																			<li><a href="<?php echo SITE_URL; ?>diamonds/star-collection/solitaire">Solitaire</a></li>
																			<li><a href="<?php echo SITE_URL; ?>diamonds/star-collection/fancy-styles">Fancy styles</a></li>
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
									<a class="nav-link" href="<?php echo config_item('base_url') ?>fine-jewelry">Fine Jewerly</a>
									<div class="level0 submenu">
										<div class="container">
											<div class="row">
												<div class="menu-left-block col-md-5">
													<div class="wedding_menu designers_menu custome_design_menu">
														<div class="right_left_menu_section">
															<h3>&nbsp;</h3>
															<div class="left_menu">
																<div class="sub_menu">
																	<ul class="subchildmenu">
																		<li>
																			<a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry">Shop By Carol Collection</a>
																			<ul class="subchildmenu">
																				<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/color-fashion">Color Fashion</a></li>
																				<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/diamond-fashion">Diamond Fashion</a></li>
																				<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/finished-bridal">Bridal Completes</a></li>
																				<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/wedding-bands">Wedding Bands</a></li>
																				<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/new-arrivals">New Arrivals</a></li>
																			</ul>
																		</li>
																	</ul>
																</div>
															</div>
															<div class="right_menu1 left_menu">
																<div class="sub_menu">
																	<ul class="subchildmenu">
																		<li>
																			<a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry">Shop By Oneil Collection</a>
																			<ul class="subchildmenu">
																				<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/bracelets">Bracelets</a></li>
																				<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/earrings">Earrings</a></li>
																				<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/necklaces">Necklaces</a></li>
																				<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/pendants">Pendants</a></li>
																				<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/wedding-o-bands">Wedding Bands</a></li>
																			</ul>
																		</li>
																	</ul>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="menu-left-block col-md-7">
													<div class="wedding_menu designers_menu custome_design_menu">
														<div class="right_left_menu_section">
															<h3>&nbsp;</h3>
															<div class="left_menu">
																<div class="sub_menu">
																	<ul class="subchildmenu">
																		<li>
																			<a href="javascript:void(0);">NECKLACES</a>
																			<ul class="subchildmenu">
																				<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/wg-necklaces">White Gold Necklaces</a></li>
																				<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/rg-necklaces">Rose Gold Necklaces</a></li>
																				<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/yg-necklaces">Yellow Gold Necklaces</a></li>
																				<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/ttg-necklaces">Two-Tone Gold Necklaces</a></li>
																				<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/ttg-necklaces">Tri-Color Gold Necklaces</a></li>
																				<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/wNrg-necklaces">White & Rose Gold Necklaces</a></li>
																			</ul>
																		</li>
																	</ul>
																	<ul class="subchildmenu">
																		<li>
																			<a href="javascript:void(0);">BRACELETS</a>
																			<ul class="subchildmenu">
																				<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/wg-bracelets">White Gold Bracelets</a></li>
																				<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/rg-bracelets">Rose Gold Bracelets</a></li>
																				<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/yg-bracelets">Yellow Gold Bracelets</a></li>
																				<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/ttg-bracelets">Two-Tone Gold Bracelet</a></li>
																				<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/tcg-bracelets">Tri-Color Gold Bracelets</a></li>
																			</ul>
																		</li>
																	</ul>
																</div>
															</div>
															<div class="right_menu1 left_menu">
																<div class="sub_menu">
																	<ul class="subchildmenu">
																		<li>
																			<a href="javascript:void(0);">EARRINGS</a>
																			<ul class="subchildmenu">
																				<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/wg-earrings">White Gold Earrings</a></li>
																				<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/rg-earrings">Rose Gold Earrings</a></li>
																				<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/yg-earrings">Yellow Gold Bracelets</a></li>
																				<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/ttg-earrings">Two-Tone Gold Bracelet</a></li>
																				<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/tcg-earrings">Tri-Color Gold Bracelets</a></li>
																			</ul>
																		</li>
																	</ul>
																	<ul class="subchildmenu">
																		<li>
																			<a href="javascript:void(0);">RINGS</a>
																			<ul class="subchildmenu">
																				<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/wg-rings">White Gold Rings</a></li>
																				<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/rg-rings">Rose Gold Rings</a></li>
																				<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/yg-rings">Yellow Gold Rings</a></li>
																				<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/ttg-rings">Two-Tone Gold Rings</a></li>
																				<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/wNrg-rings">Tri-Color Gold Rings</a></li>
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
									</div>
								</li>
								<li class="nav-item level0 fullwidth parent Designers">
									<a class="nav-link" href="<?php echo config_item('base_url') ?>learn">Learn</a>
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
								<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">fancy color diamonds &nbsp;</a>
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
								<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">Lab Diamonds &nbsp;</a>
								<ul class="innerchildren">
									<li><a href="<?php echo SITE_URL; ?>diamonds/diamonds-search/asscher-ldcut">Asscher</a></li>
									<li><a href="<?php echo SITE_URL; ?>diamonds/diamonds-search/cushion-ldcut">Cushion</a></li>
									<li><a href="<?php echo SITE_URL; ?>diamonds/diamonds-search/emerald-ldcut">Emerald Cut</a></li>
									<li><a href="<?php echo SITE_URL; ?>diamonds/diamonds-search/heart-ldshaped">Heart Shape</a></li>
									<li><a href="<?php echo SITE_URL; ?>diamonds/diamonds-search/marquise-ldcut">Marquise</a></li>
									<li><a href="<?php echo SITE_URL; ?>diamonds/diamonds-search/oval-ldcut">Oval</a></li>
									<li><a href="<?php echo SITE_URL; ?>diamonds/diamonds-search/pear-ldshaped">Pear Shape</a></li>
									<li><a href="<?php echo SITE_URL; ?>diamonds/diamonds-search/princess-ldcut">Princess</a></li>
									<li><a href="<?php echo SITE_URL; ?>diamonds/diamonds-search/radiant-ldcut">Radiant</a></li>
									<li><a href="<?php echo SITE_URL; ?>diamonds/diamonds-search/round-ldcut">Round</a></li>
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
						<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">Engagement </a>
						<ul class="children">
							<li class="innersub-menus">
								<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">Get inspired by customer's rings &nbsp;</a>
								<ul class="innerchildren">
									<li><a data-container="#WidePane" data-qa="round_cut_rings" href="<?php echo SITE_URL; ?>diamonds/engagement-rings/round-cut-rings"><span>round cut rings</span></a></li>
									<li><a data-container="#WidePane" data-qa="princess_cut_rings" href="<?php echo SITE_URL; ?>diamonds/engagement-rings/princess-cut-rings"><span>princess cut rings</span></a></li>
									<li><a data-container="#WidePane" data-qa="cushion_cut_rings" href="<?php echo SITE_URL; ?>diamonds/engagement-rings/cushion-cut-rings"><span>cushion cut rings</span></a></li>
									<li><a data-container="#WidePane" data-qa="all_other_shapes" href="<?php echo SITE_URL; ?>diamonds/engagement-rings"><span>all other shapes</span></a></li>
								</ul>
							</li>
							<li class="innersub-menus">
								<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">engagement ring styles &nbsp;</a>
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
								<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">THE STAR COLLECTION &nbsp;</a>
								<ul class="innerchildren">
									<li><a href="<?php echo SITE_URL; ?>diamonds/star-collection/new-arrivals">ALL NEW ARRIVALS</a></li>
									<li><a href="<?php echo SITE_URL; ?>diamonds/star-collection/best-sellers">BEST SELLERS</a></li>
									<li><a href="<?php echo SITE_URL; ?>diamonds/star-collection/color-stone-rings">COLOR STONE RINGS</a></li>
									<li><a href="<?php echo SITE_URL; ?>diamonds/star-collection/engagement-rings">ENGAGEMENT RINGS</a></li>
									<li><a href="<?php echo SITE_URL; ?>diamonds/star-collection/engagement-sets">ENGAGEMENT SETS</a></li>
									<li><a href="<?php echo SITE_URL; ?>diamonds/star-collection/fancy-rings">FANCY RINGS</a></li>
									<li><a href="<?php echo SITE_URL; ?>diamonds/star-collection/fashion">FASHION</a></li>
									<li><a href="<?php echo SITE_URL; ?>diamonds/star-collection/findings">FINDINGS</a></li>
									<li><a href="<?php echo SITE_URL; ?>diamonds/star-collection/mens-rings">MEN'S RINGS</a></li>
									<li><a href="<?php echo SITE_URL; ?>diamonds/star-collection/pendants">PENDANTS</a></li>
									<li><a href="<?php echo SITE_URL; ?>diamonds/star-collection/wedding-bands">WEDDING BANDS</a></li>
								</ul>
							</li>
							<li class="innersub-menus">
								<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">SHOP BY METAL &nbsp;</a>
								<ul class="innerchildren">
									<li><a href="<?php echo SITE_URL; ?>diamonds/engagement-rings/white-gold">White Gold</a></li>
									<li><a href="<?php echo SITE_URL; ?>diamonds/engagement-rings/yellow-gold">Yellow Gold</a></li>
									<li><a href="<?php echo SITE_URL; ?>diamonds/engagement-rings/platinum">Platinum</a></li>
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
						<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase">Wedding </a>
						<ul class="children">
							<li><a href="<?php echo SITE_URL; ?>diamonds/wedding-bands/oneil">Oneil Wedding Bands</a></li>
							<li><a href="<?php echo SITE_URL; ?>diamonds/wedding-bands/carrols">Carrols Wedding Band</a></li>
							<li><a href="<?php echo SITE_URL; ?>diamonds/wedding-bands/stuller">Stuller Wedding Band</a></li>
							<li class="innersub-menus">
								<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">Women's wedding bands&nbsp;</a>
								<ul class="innerchildren">
									<li><a href="<?php echo SITE_URL; ?>diamonds/star-collection/diamond-bands">Diamond bands</a></li>
									<li><a href="<?php echo SITE_URL; ?>diamonds/star-collection/band-sets">Band sets</a></li>
									<li><a href="<?php echo SITE_URL; ?>diamonds/star-collection/traditional-bands">Traditional bands</a></li>
									<li><a href="<?php echo SITE_URL; ?>diamonds/star-collection/eternity-bands">Eternity bands</a></li>
								</ul>
							</li>
							<li class="innersub-menus">
								<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">Men's Wedding Band&nbsp;</a>
								<ul class="innerchildren">
									<li><a href="<?php echo SITE_URL; ?>diamonds/star-collection/men-wedding-bands">Wedding Band</a></li>
									<li><a href="<?php echo SITE_URL; ?>diamonds/star-collection/solitaire">Solitaire</a></li>
									<li><a href="<?php echo SITE_URL; ?>diamonds/star-collection/fancy-styles">Fancy styles</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li class="sub-menus">
						<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">Fine Jewerly </a>
						<ul class="children">
							<li class="innersub-menus">
								<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">Shop By Carol Collection &nbsp;</a>
								<ul class="innerchildren">
									<li><a data-container="#WidePane" data-qa="ready_to_ship_anniversary_rings" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/color-fashion" class="class-icon--37NL7 icon-anniversary class-icon-anniversary--2hVxF"><span>Color Fashion</span></a></li>
									<li><a data-container="#WidePane" data-qa="ready_to_ship_diamond_rings" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/diamond-fashion" class="class-icon--37NL7 icon-Royal_ring"><span>Diamond Fashion</span></a></li>
									<li><a data-container="#WidePane" data-qa="ready_to_ship_gemstone_rings" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/finished-bridal" class="class-icon--37NL7 icon-Ring-gem"><span>Bridal Completes</span></a></li>
									<li><a data-container="#WidePane" data-qa="ready_to_ship_pearl_rings" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/wedding-bands" class="class-icon--37NL7 icon-Pearl_Rings"><span>Wedding Bands</span></a></li>
									<li><a data-container="#WidePane" data-qa="ready_to_ship_anniversary_rings" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/new-arrivals" class="class-icon--37NL7 icon-anniversary class-icon-anniversary--2hVxF"><span>New Arrivals</span></a></li>
								</ul>
							</li>
							<li class="innersub-menus">
								<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">Shop By Oneil Collection &nbsp;</a>
								<ul class="innerchildren">
									<li><a data-container="#WidePane" data-qa="ready_to_ship_anniversary_rings" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/bracelets" class="class-icon--37NL7 icon-anniversary class-icon-anniversary--2hVxF"><span>Bracelets</span></a></li>
									<li><a data-container="#WidePane" data-qa="ready_to_ship_diamond_rings" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/earrings" class="class-icon--37NL7 icon-Royal_ring"><span>Earrings</span></a></li>
									<li><a data-container="#WidePane" data-qa="ready_to_ship_gemstone_rings" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/necklaces" class="class-icon--37NL7 icon-Ring-gem"><span>Necklaces</span></a></li>
									<li><a data-container="#WidePane" data-qa="ready_to_ship_pearl_rings" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/pendants" class="class-icon--37NL7 icon-Pearl_Rings"><span>Pendants</span></a></li>
									<li><a data-container="#WidePane" data-qa="ready_to_ship_anniversary_rings" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/wedding-o-bands" class="class-icon--37NL7 icon-anniversary class-icon-anniversary--2hVxF"><span>Wedding Bands</span></a></li>
								</ul>
							</li>
							<li class="innersub-menus">
								<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">Shop By Collection &nbsp;</a>
								<ul class="innerchildren">
									<li>
										<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">Necklaces&nbsp;</a>
										<ul class="subchildmenu">
											<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/wg-necklaces">White Gold Necklaces</a></li>
											<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/rg-necklaces">Rose Gold Necklaces</a></li>
											<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/yg-necklaces">Yellow Gold Necklaces</a></li>
											<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/ttg-necklaces">Two-Tone Gold Necklaces</a></li>
											<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/ttg-necklaces">Tri-Color Gold Necklaces</a></li>
											<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/wNrg-necklaces">White &amp; Rose Gold Necklaces</a></li>
										</ul>
									</li>
									<li>
										<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">Bracelet&nbsp;</a>
										<ul class="subchildmenu">
											<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/wg-bracelets">White Gold Bracelets</a></li>
											<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/rg-bracelets">Rose Gold Bracelets</a></li>
											<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/yg-bracelets">Yellow Gold Bracelets</a></li>
											<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/ttg-bracelets">Two-Tone Gold Bracelet</a></li>
											<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/tcg-bracelets">Tri-Color Gold Bracelets</a></li>
										</ul>
									</li>
									<li>
										<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">Earrings&nbsp;</a>
										<ul class="subchildmenu">
											<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/wg-earrings">White Gold Earrings</a></li>
											<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/rg-earrings">Rose Gold Earrings</a></li>
											<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/yg-earrings">Yellow Gold Bracelets</a></li>
											<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/ttg-earrings">Two-Tone Gold Bracelet</a></li>
											<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/tcg-earrings">Tri-Color Gold Bracelets</a></li>
										</ul>
									</li>
									<li>
										<a href="javascript:;" class="dropdown-toggle hvr-underline-from-center upercase" data-toggle="dropdown">Rings&nbsp;</a>
										<ul class="subchildmenu">
											<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/wg-rings">White Gold Rings</a></li>
											<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/rg-rings">Rose Gold Rings</a></li>
											<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/yg-rings">Yellow Gold Rings</a></li>
											<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/ttg-rings">Two-Tone Gold Rings</a></li>
											<li><a href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/wNrg-rings">Tri-Color Gold Rings</a></li>
										</ul>
									</li>
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
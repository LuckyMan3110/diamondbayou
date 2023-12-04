<link rel="stylesheet" href="<?php echo SITE_URL; ?>css/slider/foundation.css" />
<link rel="stylesheet" href="<?php echo SITE_URL; ?>css/slider/style.css" />
<script src="<?php echo SITE_URL; ?>js/slider/foundation/jquery.cookie.js"></script>
<style>
.colr2{margin-top:30px;text-align:center}
.colr2 img{margin-left:0;margin-top:0}
.ring1{margin-top:30px;text-align:center}
.ring1 img{margin-left:0;margin-top:0}
.ring2{margin-top:30px;text-align:center}
.ring2 img{margin-left:0;margin-top:0}
.custom_2 img{margin-top:0}
.colors1{margin-top:30px;text-align:center}
.colors1 img{margin-left:0;margin-top:0;width:auto}
.card .card-body{text-align:center}
.slide{padding:0}
.bg-gray{background-color:#bdbdbd}
.slide .testo{width:calc(100% - 0px);float:left;color:#fff;padding:7% 20%;text-align:center;height:320px}
.slide .testo .sottotitolo{font-size:24px;font-style:italic;color:#666;display:block;margin:10px 0 35px;line-height:32px}
.slide .testo p{font-size:18px;line-height:26px;margin:0}
.boxed-botom{padding:2% 15%;color:#666363;line-height:20px;float:left;width:100%;background-color:#eae9e8;height:330px}
.boxed-botom h3{font-size:32px;font-weight:700}
.pdn0{padding:0}
@media (max-width: 767px){
.colors1 img{width:100%}
.colr2 img{width:100%}
.wideContent{max-width: 100%;min-width: 100%;width:100%}
}
</style>
<div class="clear"></div>
<section class="section_2">
	<div class="container" style="padding:0px;">
		<div id="hp_hero" class="row full-width text-center hero-banner oneColumnPage_HomePage" style="background:none">
			<ul class="center-text" data-orbit data-options="navigation_arrows:true;variable_height:true;timer:true;timer_speed:4500;">
				<li>
					<div class="purchase_area" style=" text-align: center !important;line-height:normal !important;">
						<h1>Pick your BLING.</h1>
						<h1>PICK YOUR Cause.</h1>
						<p style="color:#212529 !important;text-align:center">FOLLOW US @DIAMONDBAYOU for the latest on how
							<br> your purchasesupport our Giving Partners and to get
							<br> involved.</p>
						<a href="<?php echo SITE_URL; ?>">Learn more</a>
						<br>
					</div>
				</li>
				<li>
					<a class="bannerLink" href="<?php echo SITE_URL; ?>" title=""><img id="topPromo_1-s" src="<?php echo SITE_URL; ?>images/slider/mental-health.jpg" class="hero-image" alt="Stand for tomorrow. I stand for mental health. I stand in alpargatas. Shop now. Instagram @MILCKMUSIC"/></a>
				</li>
				<li>
					<a class="bannerLink" href="<?php echo SITE_URL; ?>" title=""><img id="topPromo_2-s" src="<?php echo SITE_URL; ?>images/slider/home-less.jpg" class="hero-image" alt="Stand for tomorrow. I stand for the homeless. I stand in botas. Shop now. Instagram @croom12"/> </a>
				</li>
				<li>
					<a class="bannerLink" href="<?php echo SITE_URL; ?>" title=""><img id="topPromo_3-s" src="<?php echo SITE_URL; ?>images/slider/safe-water.jpg" class="hero-image" alt="Stand for tomorrow. I stand for safe water. I stand in alpargatas. Shop now. Instagram @LittleMissFlint"/> </a>
				</li>
				<li>
					<a class="bannerLink" href="<?php echo SITE_URL; ?>" title=""><img id="topPromo_4-s" src="<?php echo SITE_URL; ?>images/slider/women-rights.png" class="hero-image" alt="Stand for tomorrow. I stand for women's rights. I stand in poppy sandals. Shop now. Instagram @aijaofficial"/> </a>
				</li>
				<?php /* <li>
					<a class="bannerLink" href="<?php echo SITE_URL; ?>" title=""><img id="topPromo_5-s" src="<?php echo SITE_URL; ?>images/slider/equality.jpg" class="hero-image" alt="Stand for tomorrow. I stand for equality. I stand in alpargatas. Shop now. Instagram @BlairImani"/> </a>
				</li> */ ?>
			</ul>
		</div>
	</div>
</section>
<script src="<?php echo SITE_URL; ?>js/slider/foundation.min.js"></script>
<script src="<?php echo SITE_URL; ?>js/slider/hoverIntent.js"></script>
<!--image banner Careousal-->
<script>
$("#hp_hero ul[data-orbit]").on("ready.fndtn.orbit", function(event) {
	$('#hp_hero').css('max-height', 'none'); 
	$(this).show();
});

$(document).ready(function(){
	$(".container hr.promo-divide:gt(2)").filter(':not(.canvas-bg)').addClass("show-for-medium-up");
});

$(document).foundation({
	orbit: {
		animation: 'slide',
		timer_speed: 4500,
		pause_on_hover: true,
		resume_on_mouseout: true,
		animation_speed: 400,
		stack_on_small: false,
		navigation_arrows: false,
		slide_number: false,
		container_class: 'orbit-container',
		stack_on_small_class: 'orbit-stack-on-small',
		next_class: 'orbit-next',
		prev_class: 'orbit-prev',
		timer_paused_class: 'paused',
		timer_progress_class: 'orbit-progress',
		slides_container_class: 'orbit-slides-container',
		bullets_container_class: 'orbit-bullets',
		bullets_active_class: 'active',
		slide_number_class: 'orbit-slide-number',
		caption_class: 'orbit-caption',
		active_slide_class: 'active',
		orbit_transition_class: 'orbit-transitioning',
		bullets: true,
		timer: false,
		variable_height: false,
		swipe: true
	}
});
</script>
<section class="division"></section>
<section class="section_3">
	<h4><a href="<?php echo SITE_URL;?>pages/pick-bling" style="text-decoration: none;">PICK<br>YOUR<br>Cause</a></h4>
	<div class="container">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="discount_area" style=" text-align: center;">
					<h3>Sale end tonight 11:59 PM PT. Max discount  $120. Select items Final Sale.</h3>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="personal_area">
					<div class="container">
						<div class="row">
							<div class="col-xl-4 col-lg-4 col-md-4 col-12">
								<div class="personal_1" style="margin-top: 30px;"><img src="<?php echo SITE_URL; ?>images/home/img/section3/3.jpg">
									<p>We keep it real - everything is
										<br> guaranteed authentic, or your
										<br> money back.</p>
								</div>
							</div>
							<div class="col-xl-4 col-lg-4 col-md-4 col-12">
								<div class="personal_2" style="margin-top: 30px;"><img src="<?php echo SITE_URL; ?>images/home/img/section3/4.jpg">
									<p>Diamond Bayou is a diamond jewelry
										<br> Manufacture and diamond broker. We
										<br> cut out the middle men give you a
										<br> direct savings on all of our products.</p>
								</div>
							</div>
							<div class="col-xl-4 col-lg-4 col-md-4 col-12">
								<div class="personal_3" style="margin-top: 30px;"><img src="<?php echo SITE_URL; ?>images/home/img/section3/5.jpg">
									<p>Your personal style, your way
										<br> — all for up to 40% off retail</p>
									<br>
									<a href="#" style="color: #ff2222; margin-right: 116px; font-size: 16.6px; font-weight: 600;">Start Shopping</a></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-12">
				<div class="color_area" style="padding:0px">
					<div class="container">
						<div class="row">
							<div class="col-md-6 col-sm-12 col-12">
							    <a href="<?php echo SITE_URL.'engagement/search';?>">
									<div class="color_1 colors1"><img src="<?php echo SITE_URL; ?>images/home/img/image_2020_03_29T12_25_03_146Z.png">
										<h6>Design Your Dream Ring</h6>
										<p><a href="<?php echo SITE_URL; ?>diamonds/engagement-rings" style="color: #000;">Shop Now</a></p>
									</div>
								</a>
							</div>
							<div class="col-md-6 col-sm-12 col-12">
							    <a href="<?php echo SITE_URL.'diamonds/hip_hop_jewelry/M2_Jesus_Pendants';?>">
								<div class="color_1 colors1"><img src="<?php echo SITE_URL; ?>images/home/img/section3/221.jpg">
									<h6>Jesus Pendants</h6>
									<p><a href="<?php echo SITE_URL; ?>diamonds/hip_hop_jewelry/M2_Jesus_Pendants" style="color: #000;">Shop Now</a></p>
								</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-12 ">
				<div class="color_area">
					<div class="container">
						<div class="row">
							<div class="col-md-6 col-sm-12 col-12 pdn0">
								<div class="boxed-botom text-center">
									<h3>The diamond: <br/> untouchable by any event</h3>
									<p style="color: #666363;">A diamond has always been considered a safe value over time. The investment diamond is untouchable by any event, with the highest value and secure in relation to its dimensions, transportable and can be converted at anytime and anywhere.</p>
									<p style="color: #666363;">We are at your complete disposal in order to analyze the best investment and the most suitable for your needs.</p>
									<p style="color: #666363;">All our diamonds are provided with the best and accredited international certificate issued by the Gemological Institute of America (GIA)</p>
								</div>
							</div>
							<div class="col-md-6 col-sm-12 col-12 pdn0">
								<div><img src="<?php echo SITE_URL; ?>images/investimenti.jpg" class="img-responsive" style="width: 100%;height: 330px;"></div>      
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php /* <div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-12">
				<div class="design_area" style=" text-align: center;">
					<div class="container">
						<div class="row">
							<?php
							if(!empty($section1)):
								foreach($section1 as $sectiona):
									$gallery_imgs1 = explode(";",$sectiona['image']);
									$gallery_imgs = array_unique($gallery_imgs1);
									?>
									<div class="col-md-6 col-sm-12 col-12">
										<div class="design_1" style="margin-top: 30px;"><img src="<?php echo SITE_URL.'images/'.$sectiona['image_path'].$gallery_imgs[0]; ?>">
											<p><?= $sectiona['name']?></p>
											<a href="<?php echo SITE_URL; ?>selection/engagement-rings-detail/<?= $sectiona['id']?>" style="text-align: left;">Shop Now</a>
										</div>
									</div>
								<?php
								endforeach;
        					endif;
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> */ ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-12">
				<div class="inspired_area" style=" text-align: center;">
					<div class="inspired_top" style=" text-align: center;">
						<h1>GET INSPIRED</h1>
						<p>@Diamondbayou on Instagram</p>
					</div>
					<div class="inspired_bottom" style="padding: 0, 10px, 0, 10px;">
						<div class="container">
							<div class="row">
								<?php /* <div class="col-md-3 col-sm-12 col-12">
									<div class="inspired_1" style="margin-top: 30px;"><img src="<?php echo SITE_URL; ?>images/home/img/photos/1.jpg"> </div>
								</div>
								<div class="col-md-3 col-sm-12 col-12">
									<div class="inspired_2" style="margin-top: 30px;"><img src="<?php echo SITE_URL; ?>images/home/img/photos/2.jpg"> </div>
								</div>
								<div class="col-md-3 col-sm-12 col-12">
									<div class="inspired_3" style="margin-top: 30px;"><img src="<?php echo SITE_URL; ?>images/home/img/photos/3.jpg"> </div>
								</div>
								<div class="col-md-3 col-sm-12 col-12">
									<div class="inspired_4" style="margin-top: 30px;"><img src="<?php echo SITE_URL; ?>images/home/img/photos/4.jpg"> </div>
								</div> */ ?>
								<div class="col-md-3 col-sm-12 col-12">
									<div class="inspired_1" style="margin-top: 30px;"><img src="<?php echo SITE_URL; ?>images/rings/Sidestone_Ring/Sidestone-Ring_ENR6535_Round_5.jpg"></div>
								</div>
								<div class="col-md-3 col-sm-12 col-12">
									<div class="inspired_2" style="margin-top: 30px;"><img src="<?php echo SITE_URL; ?>images/rings/Sidestone_Ring/Sidestone-Ring_KR7911_XD250_Cushion_5.jpg"></div>
								</div>
								<div class="col-md-3 col-sm-12 col-12">
									<div class="inspired_3" style="margin-top: 30px;"><img src="<?php echo SITE_URL; ?>images/rings/Sidestone_Ring/Sidestone-Ring_ENR7298_Round_5.jpg"></div>
								</div>
								<div class="col-md-3 col-sm-12 col-12">
									<div class="inspired_4" style="margin-top: 30px;"><img src="<?php echo SITE_URL; ?>images/rings/Sidestone_Ring/Sidestone-Ring_KR7134_XD100_Princess_5.jpg"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-12">
				<div class="color_area">
					<div class="container">
						<div class="row">
							<div class="col-md-6 col-sm-12 col-12">
								<div class="color_1" style="margin-top: 30px;"><a href="<?php echo SITE_URL.'diamonds/diamonds-search/white-diamond/';?>">
								<img src="<?php echo SITE_URL; ?>images/home/img/photos/5.jpg"></a>
								    <div class="col-md-6 col-6 col-sm-6">
									    <h6><a href="<?php echo SITE_URL.'diamonds/color-diamonds-search/';?>">Color Diamonds</a></h6>
									    <p><a href="<?php echo SITE_URL.'diamonds/color-diamonds-search/';?>">Shop Color Diamonds</a></p>
									</div>
									<div class="col-md-6 col-6 col-sm-6">
									    <h6><a href="<?php echo SITE_URL.'diamonds/diamonds-search/white-diamond/';?>">White Diamonds</a></h6>
									    <p><a href="<?php echo SITE_URL.'diamonds/diamonds-search/white-diamond/';?>">Shop White Diamonds</a></p>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-sm-12 col-12">
								<div class="color_2 colr2">
								    <a href="<?php echo SITE_URL.'diamonds/hip_hop_jewelry/M2_Jesus_Pendants';?>">
								        <img src="<?php echo SITE_URL; ?>images/home/img/Ladies_Gold_Bracelet.png">
								    </a>
									<a href="<?php echo SITE_URL.'diamonds/hip_hop_jewelry/M2_Jesus_Pendants';?>"><h6>Ladies Gold Bracelets</h6></a>
									<a href="<?php echo SITE_URL.'diamonds/hip_hop_jewelry/M2_Jesus_Pendants';?>">Shop Now</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="section_4">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-12">
				<div class="ring_area">
					<div class="container">
						<div class="row">
							<div class="col-md-6 col-sm-12 col-12">
								<a href="<?php echo SITE_URL.'diamonds/hip_hop_jewelry/M1_Cuban_Chains';?>">
								<div class="ring_area_1 ring1"><img src="<?php echo SITE_URL; ?>images/home/img/photos/7.jpg">
									<h6>Cuban Link Chains</h6>
									<p>Shop Cuban Links</p>
								</div>
								</a>
							</div>
							<div class="col-md-6 col-sm-12 col-12">
							    <a href="<?php echo SITE_URL.'diamonds/men_diamond_rings/';?>">
								<div class="ring_area_2 ring2"><img src="<?php echo SITE_URL; ?>images/home/img/photos/8.jpg">
									<h6>Men's Rings</h6>
									Shop Men's Rings Now
								</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-12">
				<div class="return_area">
					<div class="container">
						<div class="row">
							<div class="col-md-3 col-sm-6 col-12">
								<div class="return_1" style="margin-top: 45px;">
									<br>
									<h6>Diamond Bayou<br>always<br>has your back.</h6>
								</div>
							</div>
							<div class="col-md-3 col-sm-6 col-12">
								<div class="return_2" style="margin-top: 30px;"><img src="<?php echo SITE_URL; ?>images/home/img/section3/6.jpg">
									<h6>Free Shipping </h6>
									<p>Orders over <b>$250</b> Free Shipping</p>
									<a href="#">Return Policy</a>
								</div>
							</div>
							<div class="col-md-3 col-sm-6 col-12">
								<div class="return_3" style="margin-top: 30px;"><img src="<?php echo SITE_URL; ?>images/home/img/section3/3.jpg">
									<h6>Authenticity</h6>
									<p>You deserve to get exactly what you pay for </p>
									<a href="#">Authenticity Promise</a>
								</div>
							</div>
							<div class="col-md-3 col-sm-6 col-12">
								<div class="return_4" style="margin-top: 30px;"><img src="<?php echo SITE_URL; ?>images/home/img/section3/7.jpg">
									<h6>Real People, Here to Help</h6>
									<p>Our dedicated team has you covered</p>
									<a href="#">Help & Support</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-12">
				<div class="luxury_area" style="padding-bottom: 0px;">
					<div class="container" id="place" style="padding: 0px;">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-12" style="text-align:center;margin-bottom:20px;">
								<img src="<?php echo SITE_URL; ?>images/imgInvestimenti.jpg" class="img-responsive" style="width: 100%;">
							</div>
							<div class="col-md-12 col-sm-12 col-12">
								<div class="luxury_a">
									<video width="100%" height="100%" controls autoplay muted>
										<source src="assets/DiamondBanner_V2.mp4" type="video/mp4">
									</video>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php /* <div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-12">
				<div class="luxury_area">
					<div class="container" id="place">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-12" style="text-align:center;margin-bottom:20px;padding: 0px;">
								<img src="<?php echo SITE_URL; ?>images/imgInvestimenti.jpg" class="img-responsive" style="width: 100%;">
							</div>
							<div class="col-md-6 col-sm-12 col-12">
								<div class="luxury_a">
									<a href="#" class="luxury_anchor">On Sale</a>
									<br>
									<iframe width="100%" height="350" src="https://www.youtube.com/embed/nL7aW15ZqsE" frameborder="0" allowfullscreen></iframe>
								</div>
							</div>
							<div class="col-md-6 col-sm-12 col-12">
								<div class="luxury_a">
									<a href="#" class="luxury_anchor">On Sale</a>
									<br>
									<iframe width="100%" height="350" src="https://www.youtube.com/embed/5Ox68FO-uu8" frameborder="0" allowfullscreen></iframe>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-12">
				<div class="collect_area">
					<h6>Make an Offer- Place a bid on the This is it Diamond Collection <img src="<?php echo SITE_URL; ?>images/home/img/qq.png" style="width: 30px; height: 30px"><br>This Is It Diamonds <img src="<?php echo SITE_URL; ?>images/home/img/qq.png" style="width: 30px; height: 30px"> is an exclusive designer engagement<br> ring collection of DiamondBayou.com.</h6>
				</div>
			</div>
		</div>
	</div> */ ?>

	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-12">
				<div class="custom_area">
					<div class="container">
						<div class="row">
							<div class="col-md-6 col-sm-12 col-12 slide bg-gray">
								<div class="testo txt-center">
									<span class="sottotitolo">
										Diamonds: a real value in the world;<br>a concrete value over time
									</span>
									<p>
										All our diamonds are provided with the best and accredited international certificate issued by the Gemological Institute of America (GIA).
									</p>
								</div>
							</div>
							<div class="col-md-6 col-sm-12 col-12 pdn0">
								<div class="custom_2">
									<img src="<?php echo SITE_URL; ?>images/testataDiamanti.jpg" class="img-responsive" style="width: 100%;height: 320px;">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-12">
				<div class="custom_area" style="padding:0px">
					<div class="container">
						<div class="row">
							<div class="pics-or--2dQJX">
								<div class="meet-bg-container--2Z8w7">
									<div class="meet-bg--1ZyF2">
										<div style="margin:0 auto;position:relative;bottom:29px" class="separator-container--2Upy6">
											<div style="background-color:#f9f3ec" class="separator--1JpBX"></div>
											<div style="background-color:#fff" class="separator--1JpBX"></div>
										</div>
									</div>
									<div class="title-pack--2qIWI">
										<div></div>
										<div>Real Diamond Love Photos</div>
									</div>
								</div>
							</div>
							<div class="wideContent">
								<div data-gtm-name="engagement moments" class="moments--232al">
									<div>
										<a><img src="https://ion.r2net.com/images/amazingHomepage/a_engage.jpg" alt="a couple kissing" title="a couple kissing"></a>
									</div>
									<div><a><img src="https://ion.r2net.com/images/amazingHomepage/b_engage.jpg" alt="a couple driving and smiling" title="a couple driving and smiling"></a></div>
									<div><a><img src="https://ion.r2net.com/images/amazingHomepage/c_engage.jpg" alt="a couple smiling at each other" title="a couple smiling at each other"></a></div>
									<div><a><img src="https://ion.r2net.com/images/amazingHomepage/d_engage.jpg" alt="a couple hugging" title="a couple hugging"></a></div>
									<div><a><img src="https://ion.r2net.com/images/amazingHomepage/e_engage.jpg" alt="a man proposing to a woman" title="a man proposing to a woman"></a></div>
									<div><a><img src="https://ion.r2net.com/images/amazingHomepage/f_engage.jpg" alt="a couple smiling and hugging" title="a couple smiling and hugging"></a></div>
									<div class="collage-middle--Wzwvd">
										<div><a><img src="https://ion.r2net.com/images/amazingHomepage/g_engage.jpg" alt="a couple showing their ring" title="a couple showing their ring"></a></div>
										<div><a><img src="https://ion.r2net.com/images/amazingHomepage/j_engage.jpg" alt="a couple trying on their ring" title="a couple trying on their ring"></a></div>
									</div>
									<div class="collage-middle--Wzwvd">
										<div><a><img src="https://ion.r2net.com/images/amazingHomepage/h_engage.jpg" alt="a man proposing to a woman" title="a man proposing to a woman"></a></div>
										<div><a><img src="https://ion.r2net.com/images/amazingHomepage/k_engage.jpg" alt="a couple showing their ring" title="a couple showing their ring"></a></div>
									</div>
									<div class="collage-double--1IQiQ"><a><img src="https://ion.r2net.com/images/amazingHomepage/i_engage.jpg" alt="a couple showing their ring" title="a couple showing their ring"></a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php/* <div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-12">
				<div class="custom_area">
					<div class="container">
						<div class="row">
							<div class="col-md-6 col-sm-12 col-12">
								<div class="costom_a">
									<img src="<?php echo SITE_URL; ?>images/home/img/section3/11.jpg" alt="">
									<p>Do Limit yourself to a fix ring Price for each ring click Make and Offer and we will adjust the price lower or higher based on your offer.</p>
								</div>
							</div>
							<div class="col-md-6 col-sm-12 col-12">
								<div class="costom_b">
									<img src="<?php echo SITE_URL; ?>images/home/img/section3/22.jpg" alt="">
									<p>Customized Engagement Rings Guaranteed. All rings from "This is it Diamonds" are made to order. Given each ring a custom fit.</p>
								</div>
							</div>
							<div class="col-md-6 col-sm-12 col-12">
								<div class="costom_c" >
									<img src="<?php echo SITE_URL; ?>images/home/img/section3/33.jpg" alt="">
									<p><b>Stress-Free Shipping</b>
										<br> This is it Diamonds" includes free shipping - you can ship without leaving home</p>
								</div>
							</div>
							<div class="col-md-6 col-sm-12 col-12">
								<div class="costom_d" style="margin-top:-142px;">
									<img src="<?php echo SITE_URL; ?>images/home/img/section3/44.jpg" alt="">
									<p><b>Smart Pricing Support</b>
										<br> Our Make an Offer Model will save you up to 40% compared to retail stores.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> */ ?>

	<?php /* <div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-12">
				<div class="color_area">
					<div class="container pt-4" style="border-bottom: 2px solid #c0c0c0; border-top: 2px solid #c0c0c0;">
						<div class="row">
							<div class="col-md-6 col-sm-12 col-12">
								<h3 class="font-weight-bolder text-center">Rebel against Retail Price & Get Real Luxury for less</h3>
							</div>
							<div class="col-md-3 col-sm-12 col-12">
								<div class="">
									<img class="" src="<?php echo SITE_URL; ?>images/home/img/bus.png" alt="Card image">
									<div class="card-body ">
										<h4 class="card-title">Shipping included</h4>
										<span class="card-text"> No hidden fees - the price you see the price you pay</span>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="">
									<img class="" src="<?php echo SITE_URL; ?>images/home/img/bag.png" alt="Card image">
									<div class="card-body ">
										<h4 class="card-title">No Stale Style</h4>
										<span class="card-text"> Shop 1000s of new arrival coming in hot daily</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-12">
				<div class="color_area">
					<div class="container">
						<div class="row">
							<?php
							if(!empty($section1)):
								foreach($section1 as $sectiona):
									$gallery_imgs1 = explode(";",$sectiona['image']);
									$gallery_imgs = array_unique($gallery_imgs1);
									?>
									<div class="col-md-6 col-sm-12 col-12">
										<a href="<?php echo SITE_URL; ?>selection/engagement-rings-detail/<?= $sectiona['id']?>">
										<div class="color_1 colors1">
											<img src="<?php echo SITE_URL.'images/'.$sectiona['image_path'].$gallery_imgs[0]; ?>">
											<h6><?= $sectiona['name']?></h6>
											<p><a href="<?php echo SITE_URL; ?>selection/engagement-rings-detail/<?= $sectiona['id']?>" style="color: #000;">Shop Now</a></p>
										</div>
										</a>
									</div>
								<?php
								endforeach;
        					endif;
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-12">
				<div class="color_area">
					<div class="container" style="border-bottom: 2px solid #c0c0c0;">
						<h3 class="text-center mb-5 ">Pre Owned Designer Bags</h3>
						<div class="row">
							<?php
							if(!empty($section2)):
								foreach($section2 as $sectionb):
									$gallery_imgs1 = explode(";",$sectionb['image']);
									$gallery_imgs = array_unique($gallery_imgs1);
									?>
									<div class="col-md-3 col-sm-12 col-12">
										<div class="card" style="width:250px">
											<a href="<?php echo SITE_URL; ?>selection/engagement-rings-detail/<?= $sectionb['id']?>">
												<img class="card-img-top" src="<?php echo SITE_URL.'images/'.$sectionb['image_path'].$gallery_imgs[0]; ?>" alt="Card image" style="width:100%">
											</a>
											<div class="card-body ">
												<h4 class="card-title"><a href="<?php echo SITE_URL; ?>selection/engagement-rings-detail/<?= $sectionb['id']?>"><?= $sectionb['name']?></a></h4>
												<p class="card-text">
													<a href="<?php echo SITE_URL; ?>selection/engagement-rings-detail/<?= $sectionb['id']?>"><?= $sectionb['description']?></a><br>
													<br><b><a href="<?php echo SITE_URL; ?>selection/engagement-rings-detail/<?= $sectionb['id']?>">$ <?= number_format($sectionb['price'],2)?></a></b>
												</p>
											</div>
										</div>
									</div>
								<?php
								endforeach;
        					endif;
							?>
						</div>
						<div class="text-center ">
						  <a href="<?php echo SITE_URL; ?>diamonds/engagement-rings" class="btn btn-outline-dark shop_all mt-5 mb-5 font-weight-bold">Shop All</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row ">
			<div class="col-md-12 col-sm-12 col-12">
				<div class="color_area">
					<div class="container" style="border-bottom: 2px solid #c0c0c0c;">
						<h3 class="text-center mb-5 ">Just for you</h3>
						<div class="row ">
							<?php
							if(!empty($section3)):
								foreach($section3 as $sectionc):
									$gallery_imgs1 = explode(";",$sectionc['image']);
									$gallery_imgs = array_unique($gallery_imgs1);
									?>
									<div class="col-md-3 col-sm-12 col-12">
										<div class="card" style="width:250px">
											<a href="<?php echo SITE_URL; ?>selection/engagement-rings-detail/<?= $sectionc['id']?>">
												<img class="card-img-top" src="<?php echo SITE_URL.'images/'.$sectionc['image_path'].$gallery_imgs[0]; ?>" alt="Card image" style="width:100%">
											</a>
											<div class="card-body ">
												<h4 class="card-title"><a href="<?php echo SITE_URL; ?>selection/engagement-rings-detail/<?= $sectionc['id']?>"><?= $sectionc['name']?></a></h4>
												<p class="card-text"> <a href="<?php echo SITE_URL; ?>selection/engagement-rings-detail/<?= $sectionc['id']?>"><?= $sectionc['description']?></a></p>
												<p class="card-text"> <a href="<?php echo SITE_URL; ?>selection/engagement-rings-detail/<?= $sectionc['id']?>">Engagement Rings</a></p>
												<p class="card-text"> <a href="<?php echo SITE_URL; ?>selection/engagement-rings-detail/<?= $sectionc['id']?>">$ <?= number_format($sectionc['price'],2)?></a></p>
											</div>
										</div>
									</div>
								<?php
								endforeach;
        					endif;
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row ">
			<div class="col-md-12 col-sm-12 col-12">
				<div class="color_area">
					<div class="container">
						<h3 class="text-center mb-5 "> Affordable Engagement Rings</h3>
						<div class="row ">
							<?php
							if(!empty($section4)):
								foreach($section4 as $sectiond):
									$gallery_imgs1 = explode(";",$sectiond['image']);
									$gallery_imgs = array_unique($gallery_imgs1);
									?>
									<div class="col-md-3 col-sm-12 col-12">
										<div class="card" style="width:250px">
											<a href="<?php echo SITE_URL; ?>selection/engagement-rings-detail/<?= $sectiond['id']?>"><img class="card-img-top" src="<?php echo SITE_URL.'images/'.$sectiond['image_path'].$gallery_imgs[0]; ?>" alt="Card image" style="width:100%"></a>
											<div class="card-body ">
												<h4 class="card-title"><a href="<?php echo SITE_URL; ?>selection/engagement-rings-detail/<?= $sectiond['id']?>"><?php echo $sectiond['name']; ?></a></h4>
        										<p class="card-text"> <a href="<?php echo SITE_URL; ?>selection/engagement-rings-detail/<?= $sectiond['id']?>">$<?php echo number_format($sectiond['price'],2); ?></a></p>
											</div>
										</div>
									</div>
								<?php
								endforeach;
        					endif;
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> */ ?>

</div>
<div class="lead-capture-banner lead-capture-banner--hidden email-capture">
	<div id="closeLeadCaptureBanner" class="lead-capture-close js-close">
		<span class="icon-cancel">X</span>
	</div>
	<div class="banner-img"></div>
	<div class="row">
		<div class="col-sm-8">
			<div class="lead-capture-banner__pre email-capture__pre">
				<div class="cta-copy">
					<h2>Get $50 Off</h2>
					<h5>Your First Purchase* of Always-Authentic Luxury Pieces</h5>
					<p>Plus, get discounts and personalized looks delivered right to your inbox.</p>
				</div>
				<form class="row" id="leadCaptureBannerForm" novalidate="">
					<div class="small-8 column">
						<input class="email-capture__input" title="email address" aria-labelledby="leadCaptureBannerSubmit" style="padding:10px;margin-left:14px;margin-right:6px" placeholder="Email Address" type="email" name="email" id="leadCaptureBannerEmail">
					</div>
					<div class="small-4 column">
						<button type="submit" style="background:black;color:white;" class="btn black sml expand" id="leadCaptureBannerSubmit">Join</button>
					</div>
				</form>
				<small>*Offer applies to purchases of $400+</small>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row ">
		<div class="col-md-12 col-sm-12 col-12">
			<div class="container" id="footerend">
				<div class="row " style="background-color: #c8c8c8;">
					<div class="col-md-7 col-sm-12 col-12 mt-4 mb-4">
						<h3 class="pl-4">Join to save on styles your crave</h3>
						<h6 class="pl-4">Get 250$ off your first purchase of $400+ and never miss a promotion or hot new arival.</h6>
					</div>
					<div class="col-md-5 col-sm-12 col-12">
						<div class="row">
							<div class="col-sm-7">
								<form class="" method="post" action="">
									<div class="form-inline margin_search">
										<input type="email" placeholder="Email address" name="search" style="border:1px solid black;padding:7px">
										<input type="submit" value="join" class="join_btn">
									</div>
								</form>
							</div>
							<div class="col-sm-3">
								<img src="<?php echo SITE_URL; ?>images/home/img/image5.png">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
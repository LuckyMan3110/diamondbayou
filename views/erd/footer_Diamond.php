			<?php
			if($page){ 
				if($page != 'home'){
					echo setContainer('footer'); //// end cotainer div here if page is not test engagement 
				}
			}else{
				echo setContainer('footer'); //// end cotainer div here if page is not test engagement     
			}    
			$ch_menu = end($this->uri->segment_array());?>
			<div class="clear"></div>
			<?php 
			require_once 'application/views/erd/main_footer_file.php';
			$get_cur_method = $this->router->fetch_method();
			$set_allow_method = array('collection_detail', 'heart_collection_detail', 'engagement_ring_detail');
			if($ch_menu!=''){ ?>
			<?php if( in_array($get_cur_method, $set_allow_method) ) { ?>
			<script src="<?php echo SITE_URL; ?>js/scrollreveal.min.js"></script>
			<script src="<?php echo SITE_URL; ?>js/jquery.magnific-popup.min.js"></script>
			<script src="<?php echo SITE_URL; ?>js/creative.min.js"></script>
			<?php } ?>
			<!-- Footer End here -->
			<script type="text/javascript" src="<?php echo SITE_URL; ?>js/jewelercart_js/modernizr.custom.46884.js"></script>
			<script src="<?php echo SITE_URL; ?>js/jewelercart_js/bars.js"></script>
			<script type="text/javascript" src="<?php echo SITE_URL; ?>js/jewelercart_js/jquery.slicebox.js"></script>
			<script type="text/javascript" src="<?php echo SITE_URL; ?>js/jewelercart_js/jquery.flexisel.js"></script>
			<script type="text/javascript">
			$(function () {
				var Page = (function () {
					var $navArrows = $('#nav-arrows').hide(),
					$navDots = $('#nav-dots').hide(),
					$nav = $navDots.children('span'),
					$shadow = $('#shadow').hide(),
					slicebox = $('#sb-slider').slicebox({
						onReady: function () {
							$navArrows.show();
							$navDots.show();
							$shadow.show();
						},
						onBeforeChange: function (pos) {
							$nav.removeClass('nav-dot-current');
							$nav.eq(pos).addClass('nav-dot-current');
						}
					}),
					init = function () {
						initEvents();
					},
					initEvents = function () {
						// add navigation events
						$navArrows.children(':first').on('click', function () {
							slicebox.next();
							return false;
						});

						$navArrows.children(':last').on('click', function () {
							slicebox.previous();
							return false;
						});

						$nav.each(function (i) {
							$(this).on('click', function (event) {
								var $dot = $(this);
								if (!slicebox.isActive()) {
									$nav.removeClass('nav-dot-current');
									$dot.addClass('nav-dot-current');
								}
								slicebox.jump(i + 1);
								return false;
							});
						});
					};
					return {
						init: init
					};
				})();
				Page.init();
			});
			</script>
			<!-- Stats -->
			<script src="<?php echo SITE_URL; ?>js/jewelercart_js/waypoints.min.js"></script>
			<script src="<?php echo SITE_URL; ?>js/jewelercart_js/counterup.min.js"></script>
			<script>
			jQuery(document).ready(function ($) {
				$('.counter').counterUp({
					delay: 10,
					time: 2000
				});
			});
			</script>
			<!-- //Stats -->
			<script type="text/javascript" src="<?php echo SITE_URL; ?>js/jewelercart_js/jquery.flexisel.js"></script>
			<!-- flexisel -->
			<script type="text/javascript">
			$(window).load(function () {
				$("#flexiselDemo1").flexisel({
					visibleItems: 4,
					animationSpeed: 1000,
					autoPlay: true,
					autoPlaySpeed: 3000,
					pauseOnHover: true,
					enableResponsiveBreakpoints: true,
					responsiveBreakpoints: {
						portrait: {
							changePoint: 480,
							visibleItems: 1
						},
						landscape: {
							changePoint: 640,
							visibleItems: 2
						},
						tablet: {
							changePoint: 768,
							visibleItems: 2
						}
					}
				});
			});
			</script>
			<!-- //flexisel -->
			<!-- //flexisel -->
			<!-- js for portfolio lightbox -->
			<script src="<?php echo SITE_URL; ?>js/jewelercart_js/jquery.chocolat.js"></script>
			<!-- //menu -->
			<!-- for bootstrap working -->
			<script src="<?php echo SITE_URL; ?>js/jewelercart_js/bootstrap.js"></script>
			<!-- //for bootstrap working -->
			<!-- start-smoth-scrolling -->
			<script type="text/javascript" src="<?php echo SITE_URL; ?>js/jewelercart_js/move-top.js"></script>
			<script type="text/javascript" src="<?php echo SITE_URL; ?>js/jewelercart_js/easing.js"></script>
			<script type="text/javascript">
			jQuery(document).ready(function ($) {
				$(".scroll").click(function (event) {
					event.preventDefault();
					$('html,body').animate({
						scrollTop: $(this.hash).offset().top
					}, 1000);
				});
			});
			</script>
			<!-- start-smoth-scrolling -->
			<!-- here stars scrolling icon -->
			<script type="text/javascript">
			$(document).ready(function () {
				$().UItoTop({
					easingType: 'easeOutQuart'
				});
			});
			</script>
			<!-- //here ends scrolling icon -->
			<style type="text/css">
			.dropdown:hover .dropdown-menu{display:block!important}
			.navbar-right ul.dropdown-menu{left:0;right:auto;width:240px!important;text-align:left!important}
			.navbar-right ul.dropdown-menu a{padding-left:15px!important}
			</style>
		<?php } ?>
		<?php if(empty($this->session->userdata('sessionid')) && $page == 'home'){ ?>
		<script type="text/javascript">
		var mouseX = 0;
		var mouseY = 0;
		var popupCounter = 0;
		document.addEventListener("mousemove", function(e) {
			mouseX = e.clientX;
			mouseY = e.clientY;
		});

		$(document).mouseleave(function () {
			if (mouseY < 100) {
				if (popupCounter < 1) {
					$('body#home').css('overflow', 'hidden');
					$("#offerpopup-overlay").show();
					$("#offerpopup").show();
				}
				popupCounter ++;
			}
		});
		</script>
		<?php } ?>
		<script type="text/javascript">
		$(document).ready(function(){
			$(".close").click(function(){
				addscrissesion();
				$('body#home').css('overflow', 'inherit');
				$("#offerpopup-overlay").hide();
				$("#offerpopup").hide();
			});
		});

		function addscrissesion() {
			$.ajax({
				type: "POST",
				url: base_url + 'welcome/addscrissesion/?search=test',
				success: function(response) {
				},
				error: function(){
				}
			});
		}
		</script>
		<style type="text/css">
		#offerpopup{display:none;position:fixed;top:15%;right:0;bottom:0;left:0;z-index:9;overflow:hidden;outline:0; -webkit-overflow-scrolling:touch;transform:scale(0.9);transform-origin:50% 50%}
		#offerpopup.container{width:550px!important;border-radius:50%;background-color:#f2f2f2;padding:4% 6%;height:550px}
		#offerpopup input[type=text],select,textarea{width:100%;padding:12px;border:1px solid #ccc;border-radius:4px;box-sizing:border-box;margin-top:6px;margin-bottom:16px;resize:vertical}
		#offerpopup .btn{width:100%;padding:12px 20px;background-color:#000}
		#offerpopup .btn:hover{background-color:#000}
		#offerpopup p{font-size:17px;font-weight:500;margin:5px}
		#offerpopup form{margin-top:-30px}
		#offerpopup .background{text-align:center;background-color:#ffba00}
		#offerpopup h5{font-size:46px;font-weight:bold}
		#offerpopup p.footr{font-size:12px;font-weight:500;margin:20px 5px}
		#offerpopup-overlay{background-image:none;background-color:rgba(255,255,255,0.85);display:block;position:fixed;bottom: 0;right:0;top:0;left:0;overflow:hidden;z-index:1;display:none}
		.close{position:fixed;font-size:34px;color:#b5b3b3;z-index:999999;opacity:14;bottom:0;left:46%;font-weight:100}
		@media (max-width: 767px){
			#offerpopup.container{width:100%!important;padding:15%;height:auto}
		}
		</style>
		<div id="offerpopup" class="container">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			<div class="text-center">
				<h2><strong>Before you go</strong></h2><br />
				<h5>$15 off $75</h1>
				<h5>$20 off $100</h1>
			</div>
			<p class="text-center">Your first purchase when you sign-up for email.</p>
			<input type="text" class="" id="emailSubscribe" name="mail" placeholder="Email address" required="required">
			<a class="btn btn-primary biolist_open subscribeButton" href="#biolist" style="border:solid #000000 1px;" data-popup-ordinal="0" id="open_43979064" onclick="copySubscribeEmail()">JOIN THE MOVEMENT</a>
			<p class="footr text-center">By selecting 'JOIN THE MOVEMENT', you agree to our<br><span>Terms of use & Terms of Sale and Privacy Policy</span></p>
		</div>
		<div id="offerpopup-overlay"></div>
		<script src="//code.tidio.co/oyrfcsiphzneqau6p2hqohn8th14fnp9.js"></script>
	</body>
</html>
			</div>
			<?php 
			$menuArr = !empty($this->uri->segment_array())?$this->uri->segment_array():array();
		    $ch_menu = end($menuArr);
			require_once 'application/views/erd/main_footer_file.php';
			if($ch_menu != ''){ ?>
			<script src="<?php echo SITE_URL; ?>js/scrollreveal.min.js"></script>
			<script src="<?php echo SITE_URL; ?>js/jquery.magnific-popup.min.js"></script>
			<?php /* <script src="<?php echo SITE_URL; ?>js/creative.min.js"></script> */ ?>
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
			<?php /* <script src="<?php echo SITE_URL; ?>js/jewelercart_js/waypoints.min.js"></script> */ ?>
			<script src="<?php echo SITE_URL; ?>js/jewelercart_js/counterup.min.js"></script>
			<script>
			jQuery(document).ready(function ($) {
				$('.counter').counterUp({
					delay: 10,
					time: 2000
				});
			});
			</script>
			<?php /* <!-- //Stats -->
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
			</script> */ ?>
			<script src="<?php echo SITE_URL; ?>js/jewelercart_js/jquery.chocolat.js"></script>
			<script src="<?php echo SITE_URL; ?>js/jewelercart_js/bootstrap.js"></script>
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
			<script type="text/javascript">
			$(document).ready(function () {
				$().UItoTop({
					easingType: 'easeOutQuart'
				});
			});
			</script>
			<style type="text/css">
			.dropdown:hover .dropdown-menu{display:block!important}
			.navbar-right ul.dropdown-menu{left:0;right:auto;width:240px!important;text-align:left!important}
			.navbar-right ul.dropdown-menu a{padding-left:15px!important}
			</style>
		<?php } ?>
		</div>
		<script data-cfasync="false" type="text/javascript" src="<?php echo SITE_URL; ?>js/tp.js"></script>
		<!-- Facebook Pixel Code -->
		<script>
		!function(f,b,e,v,n,t,s)
		{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		n.callMethod.apply(n,arguments):n.queue.push(arguments)};
		if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
		n.queue=[];t=b.createElement(e);t.async=!0;
		t.src=v;s=b.getElementsByTagName(e)[0];
		s.parentNode.insertBefore(t,s)}(window, document,'script',
		'https://connect.facebook.net/en_US/fbevents.js');
		fbq('init', '242521783951225');
		fbq('track', 'PageView');
		</script>
		<noscript><img height="1" width="1" style="display:none"
		src="https://www.facebook.com/tr?id=242521783951225&ev=PageView&noscript=1"
		/></noscript>
		<!-- End Facebook Pixel Code -->
		<!-- Facebook Pixel Code -->
		<script>
		!function(f,b,e,v,n,t,s)
		{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		n.callMethod.apply(n,arguments):n.queue.push(arguments)};
		if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
		n.queue=[];t=b.createElement(e);t.async=!0;
		t.src=v;s=b.getElementsByTagName(e)[0];
		s.parentNode.insertBefore(t,s)}(window, document,'script',
		'https://connect.facebook.net/en_US/fbevents.js');
		fbq('init', '3357782344319877');
		fbq('track', 'PageView');
		</script>
		<noscript><img height="1" width="1" style="display:none"
		src="https://www.facebook.com/tr?id=3357782344319877&ev=PageView&noscript=1"
		/></noscript>
		<!-- End Facebook Pixel Code -->
		<script src="//code.tidio.co/ke6kylzbwoyplfmfzxdlmob1menrsa9v.js" async></script>
	</body>
</html>
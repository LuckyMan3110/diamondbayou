		<div class="footer_sectionbg">
			<div class="container">
				<div class="col-sm-2 float-left footer-logo">
					<a href="<?php echo config_item('base_url') ?>"><img src="<?php echo config_item('base_url') ?>assets/images/jewelercartlogo.jpg" style="width:100%"></a>
				</div>
				<div class="col-sm-2 float-left">
					<h3>MAY WE HELP YOU?</h3>
					<ul>
						<li><a href="<?php echo config_item('base_url') ?>payment-billing">Payment &amp; Billing</a></li>
						<li><a href="<?php echo config_item('base_url') ?>privacy-cookies">Privacy Policy</a></li>
						<li><a href="<?php echo config_item('base_url') ?>return-and-exchanges">Return Policy</a></li>
						<li><a href="<?php echo config_item('base_url') ?>contact">Contact Us</a></li>
					</ul>
				</div>
				<div class="col-sm-2 float-left">
					<h3>THE COMPANY</h3>
					<ul class="footer-comblock">
						<li><a href="<?php echo config_item('base_url') ?>terms-and-conditions">Terms and Conditions</a></li>
						<li><a href="<?php echo config_item('base_url') ?>shipping-services">Shipping</a></li>
						<li><a href="<?php echo config_item('base_url') ?>promotions">Promotions</a></li>
					</ul>
				</div>
				<div class="col-sm-2 float-left">
					<h3>FIND US ON</h3>
					<ul class="footer_social_icons">
						<li><a class="fa fa-facebook facebook" rel="nofollow" target="_blank" href="https://www.facebook.com/"></a></li>
						<li><a class="fa fa-twitter twitter" rel="nofollow" target="_blank" href="https://twitter.com/"></a></li>
						<li><a class="fa fa-instagram instagram" rel="nofollow" target="_blank" href="https://www.instagram.com/"></a></li>
						<li><a class="fa fa-youtube youtube" rel="nofollow" target="_blank" href="https://www.youtube.com/"></a></li>
					</ul>
					<p>260 Peachtree St NW Suite 2200, Atlanta, GA 30303</p>
				</div>
				<div class="col-sm-4 float-left">
					<h3>Subscribe</h3>
					<ul class="newsletters">
						<li>Be in the know with our<br> newsletters, updates and offers.</li>
						<li style="display: inline-table;">
						<input type="text" id="footer_email_box" class="email_fields" placeholder="Email">
						<a class="initialism biolist_open btn_style subscribeButton" href="#biolist" data-popup-ordinal="1" id="open_43979064" onclick="copyEmailtoFormField()">Subscribe</a>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<script data-cfasync="false">
		function copyEmailtoFormField(){
			var footer_email_box = $("#footer_email_box").val();
			$("#subsc_email").val(footer_email_box);
		}
		function copySubscribeEmail(){
			//addscrissesion();
			var emailSubscribe = $("#newsletter").val();
			$("#subsc_email").val(emailSubscribe);
		}
		</script>
		<div id="biolist_wrapper" class="popup_wrapper" style="opacity:0;visibility:hidden;position:fixed;overflow:auto;z-index: 100001;transition:all .3s ease 0;width:100%;height:100%;top:0;left:0;text-align:center;display:none">
			<div id="biolist" class="well <?php if(!empty($details_search)){ echo 'hide_block'; } ?>">
				<form name="subscribeForm" id="subscribeForm" method="post" action="">
					<div class="p_content">
						<div class="popupHeading">Subscribe Me!&nbsp;<span class="viewErorMsage"></span></div>
						<div class="formArea">
							<div class="fieldBlock">
								<div class="fLabel">Name</div>
								<div class="col-sm-6 set_field_margin" style="padding-left: 0px;">
									<input type="text" name="subsc_fname" id="subsc_fname" />
									<br />
									<span class="set_field_label">First Name</span>
								</div>
								<div class="col-sm-6">
									<input type="text" name="subsc_lname" id="subsc_lname" />
									<br />
									<span class="set_field_label">Last Name</span>
								</div>
								<div class="clear"></div>
							</div>
							<div class="fieldBlock">
								<div class="fLabel">Email</div>
								<div>
									<input type="text" name="subsc_email" id="subsc_email" class="fullTextField" />
								</div>
							</div>
							<div class="fieldBlock">
								<input type="button" name="btn_prefsubmit" value="Submit" onclick="manageEmailSubs()" class="accountBtn">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<!-- latest jquery-->
		<script src="<?php echo config_item('base_url') ?>assets/js/jquery-3.3.1.min.js"></script>
		<!-- popper js-->
		<script src="<?php echo config_item('base_url') ?>assets/js/popper.min.js"></script>
		<!-- Owl slider js-->
		<script src="<?php echo config_item('base_url') ?>assets/js/slick.min.js"></script>
		<!-- Bootstrap js
		<script src="<?php echo config_item('base_url') ?>assets/js/bootstrap.js"></script> -->
		<script >
		$(".shopslider").slick({
			infinite: false,
			slidesToShow: 4,
			slidesToScroll: 4,
			dots: false,
			arrows: true,
			cssEase: 'ease',
			prevArrow:'<span class="slider-icon slidericon-left"><i class="fa fa-angle-left" aria-hidden="true"></i></span>',
			nextArrow:'<span class="slider-icon slidericon-right"><i class="fa fa-angle-right" aria-hidden="true"></i></span>',
			
			speed: '600',
			responsive: [
				{
					breakpoint: 1279,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 3,
						speed: '600'
					}
				},
				{
					breakpoint: 767,
					settings: {
						arrows: false,
						slidesToShow: 1.5,
						slidesToScroll: 1,
						speed: '600'
					}
				}
			]
		});
		$(".fineslider").slick({
			infinite: false,
			slidesToShow: 4,
			slidesToScroll: 4,
			dots: false,
			arrows: true,
			cssEase: 'ease',
			prevArrow:'<span class="slider-icon slidericon-left"><i class="fa fa-angle-left" aria-hidden="true"></i></span>',
			nextArrow:'<span class="slider-icon slidericon-right"><i class="fa fa-angle-right" aria-hidden="true"></i></span>',
			
			speed: '600',
			responsive: [
				{
					breakpoint: 1279,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 3,
						speed: '600'
					}
				},
				{
					breakpoint: 767,
					settings: {
						arrows: false,
						slidesToShow: 1.5,
						slidesToScroll: 1,
						speed: '600'
					}
				}
			]
		});
		</script>
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
			$(".wsmenu").mouseleave(function(){
				$(".wsmegamenu.halfdiv").hide();
			});
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
		<script src="//code.tidio.co/ke6kylzbwoyplfmfzxdlmob1menrsa9v.js" async></script>
	</body>
</html>
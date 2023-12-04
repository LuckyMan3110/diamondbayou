<?php header('Access-Control-Allow-Origin: *'); ?>
<script>
function replace_name() {
	var replace_ct_tw = "<span style='text-transform:lowercase;'>ct. tw</span>";
	var replace_and = " <span style='text-transform:lowercase;'>and</span> ";
	var replace_with = " <span style='text-transform:lowercase;'>with</span> ";

	var new_title = $('h1[class=heading]').html().replace(/ct. tw/ig, replace_ct_tw);
	new_title = new_title.replace(/ and /i, replace_and);
	new_title = new_title.replace(/ with /i, replace_with);

	$('h1[class=heading]').html(new_title);

}

function replace_name_v() {
	var replace_and = " <span style='text-transform:lowercase;'>and</span> ";
	var replace_with = " <span style='text-transform:lowercase;'>with</span> ";

	var new_title = $('h1[class=heading]').html().replace(/\(.*\)/, '');
	new_title = new_title.replace(/ and /i, replace_and);
	new_title = new_title.replace(/ with /i, replace_with);

	$('h1[class=heading]').html(new_title);
}

function replace_name_3_pdp() {
	var replace_and = " <span style='text-transform:lowercase;'>and</span> ";
	var replace_with = " <span style='text-transform:lowercase;'>with</span> ";

	var new_title = $('.setting_h1').html().replace(/\(.*\)/, '');
	new_title = new_title.replace(/ and /i, replace_and);
	new_title = new_title.replace(/ with /i, replace_with);

	$('.setting_h1').html(new_title);
}
</script>
<script src="//script.brilliantearth.com/static/js/product/pdp_engrave.js?_v=1625471808" ></script>
<script type="text/javascript" src="//script.brilliantearth.com/static/js/jquery.zoomall.min.js?_v=1625471808"></script>
<script type="text/javascript" src="//script.brilliantearth.com/static/js/nouislider/jquery.nouislider-v6.min.js"></script>
<link href="<?= SITE_URL ?>css/assets/pdp-mini.css" rel="stylesheet">
<div class="container container1260 container-cyo">
	<ol class="breadcrumb ir218-breadcrumb" role="navigation" data-acsb-bc="true" aria-label="Breadcrumbs">
		<li><a href="/engagement-rings/" class="google-event-tracker" data-category="Breadcrumb" data-action="Click" data-label="Engagement Gateway" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" data-acsb-hover="true"><span>Engagement Rings</span></a></li>
		<li class="active">Petite Twisted Vine </li>
	</ol>
</div>
<div class="container container1260 ir224-cyo-bar" id="cyo-bar">
	<div class="row">
		<div class="col-md-12 xs-nospace">
			<div class="wizard2-steps">
				<div class="step wizard2-steps-heading" data-acsb-hover="true" data-acsb-navigable="true" tabindex="0" data-acsb-now-navigable="true">
					<div class="node">
						<div class="node-skin">
							<div class="cont">Create Your Ring</div>
						</div>
					</div>
				</div>
				<div class="cyo-bar-step step step-item active-step acsb-hover" data-acsb-hover="true" data-acsb-navigable="true" data-acsb-now-navigable="false">
					<div class="node" style="cursor: pointer;">
						<div class="node-skin">
							<div class="num" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="0" data-acsb-now-navigable="true" role="button">1</div>
							<div class="cont">
								<div class="heading" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="0" data-acsb-now-navigable="true" role="button">Setting</div>
								<div class="data" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="0" data-acsb-now-navigable="true" role="button"><span class="cyobar_title">petite twisted vine</span><span style="padding-left: 4px;">-</span> $1,250</div>
								<div class="action">
									<a href="/rings/cyorings/change_setting/?sid=3821855&amp;did=&amp;is_tab=1&amp;first=" class="td-u bar-action" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true">Change</a>
								</div>
							</div>
							<div class="pho" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="0" data-acsb-now-navigable="true" role="button" data-acsb-textual-ops="scroll">
								<span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Scroll Page " aria-hidden="false" data-acsb-hidden="false"></span><span class="modal-product-superposition">
									<img alt="top setting" src="//image.brilliantearth.com/media/base_product_center_diamond_images/OR/BE1D54_Claw Prong_Round_white_carat_75.jpg" class="img-responsive cyobar_diamond_img mbm-multiply">
								</span>
							</div>
						</div>
					</div>
				</div>
				<div class="cyo-bar-step step step-item " data-view-link="/rings/cyorings/add_setting/3821855/?did=" data-acsb-hover="true" data-acsb-navigable="true" data-acsb-now-navigable="false">
					<div class="node" style="cursor: pointer;">
						<div class="node-skin">
							<div class="num" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="0" data-acsb-now-navigable="true" role="button">2</div>
							<div class="cont">
								<div class="heading" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="0" data-acsb-now-navigable="true" role="button"><h2 class="nostyle-heading">Choose Diamond</h2></div>
								<div class="action help-tips">
									<a href="/rings/cyorings/add_setting/3821855/" class="td-u bar-action" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true">Browse Diamonds</a>
								</div>
							</div>
							<div class="pho" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="0" data-acsb-now-navigable="true" role="button">
								<img src="//css.brilliantearth.com/static/img/svg/diamond.svg" alt="diamond" role="presentation">
							</div>
						</div>
					</div>
				</div>
				<div class="step step-item invariant-color">
					<div class="node">
						<div class="node-skin">
							<div class="num">3</div>
							<div class="cont">
								<div class="heading"><h2 class="nostyle-heading">Complete Ring</h2></div>
								<div class="action help-tips">Select Ring Size</div>
							</div>
							<div class="pho">
								<img src="//css.brilliantearth.com/static/img/svg/ring.svg" alt="ring" role="presentation">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container container1260 container-cyo">
	<div class="row be-detail-v2 pb-xs-30 ir309-detail ir218-detail">
		<style type="text/css">
		.ir309-detail.ir218-detail #image_icon{position:static!important;top:0}
		.jCarouselLiteDemo-body::-webkit-scrollbar{display:none}
		.jCarouselLiteDemo-body{overflow:-moz-scrollbars-none}
		.ir309-detail #jCarouselLiteDemo .carousel li a.zoomThumbActive{border-color:#ececec}
		.zoom-box .ir312-pdp-badge{display:none}
		</style>
		<script type="text/javascript">
		var desktop_zoom = true;
		var diamond_category = '';
		var setting_category = 'CYO Rings';
		var product_images = {};
		var setting_images = [];
		var purchased_images = [];
		var similar_purchased_images = [];
		var image_count = 0;
		var is_match_set = false;
		var is_cyo_page_match_set = false;
		var is_cyo_page = true;
		var is_uncerted_preset_rings_page = false;
		var is_purchase = false;
		var is_pc = true;
		var hide_zi_or_zi_on_different_device = true;
		var hand_thumb_caption_list = ['trans-hd', 'ring_top_hd', 'ring_top_hd_zm'];
		var hide_recently_purchased_thumbnail = '';
        product_images['top_lg'] = {
            "tn": '//image.brilliantearth.com/media/cache/04/0a/040a1e61f5edc387d8c8e40d3ea0e0ca.jpg',
            "md": '//image.brilliantearth.com/media/cache/b7/f3/b7f3cb1da267d7e8ac0412bdc522c862.jpg',
            "lg": '//image.brilliantearth.com/media/shape_images/011f7f24ae4cbbef191cff1a711df9e1_a3c9ca71b7d85d87085955f8d1c4bfc3_0_.jpg',
            "alt": 'Round Twisted Engagement Ring ',
            "data-zoomable": 'True',
            "text_line": 'Shown with 3/4 carat diamond'
        };
        setting_images.push({
            'caption': 'top_lg',
            "tn": '//image.brilliantearth.com/media/cache/04/0a/040a1e61f5edc387d8c8e40d3ea0e0ca.jpg',
            "md": '//image.brilliantearth.com/media/cache/b7/f3/b7f3cb1da267d7e8ac0412bdc522c862.jpg',
            "lg": '//image.brilliantearth.com/media/shape_images/011f7f24ae4cbbef191cff1a711df9e1_a3c9ca71b7d85d87085955f8d1c4bfc3_0_.jpg',
            "alt": 'Round Twisted Engagement Ring ',
            "description":'',
            "data-zoomable": 'True',
            "text_line": 'Shown with 3/4 carat diamond'
        });
        image_count +=1;
        product_images['side_lg'] = {
            "tn": '//image.brilliantearth.com/media/cache/89/e5/89e55645100d7976d20d764eccab2d34.jpg',
            "md": '//image.brilliantearth.com/media/cache/d4/35/d435732bf5e2b366d519431adce7f2dc.jpg',
            "lg": '//image.brilliantearth.com/media/product_images/8D/BE1D54_round_white_side.jpg',
            "alt": '18K White Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.), large side view',
            "data-zoomable": 'True',
            "text_line": ''
        };
        setting_images.push({
            'caption': 'side_lg',
            "tn": '//image.brilliantearth.com/media/cache/89/e5/89e55645100d7976d20d764eccab2d34.jpg',
            "md": '//image.brilliantearth.com/media/cache/d4/35/d435732bf5e2b366d519431adce7f2dc.jpg',
            "lg": '//image.brilliantearth.com/media/product_images/8D/BE1D54_round_white_side.jpg',
            "alt": '18K White Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.), large side view',
            "description":'',
            "data-zoomable": 'True',
            "text_line": ''
        });
        image_count +=1;

        product_images['add_img1'] = {
            "tn": '//image.brilliantearth.com/media/cache/7d/52/7d520a66f8c4df64fedcd90f87dee733.jpg',
            "md": '//image.brilliantearth.com/media/cache/cf/4b/cf4b2e5b110ab58f24de9976422887db.jpg',
            "lg": '//image.brilliantearth.com/media/product_images/4A/BE1D54_white_additional1.jpg',
            "alt": '18K White Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.), large additional view 1',
            "data-zoomable": 'True',
            "text_line": ''
        };
        setting_images.push({
            'caption': 'add_img1',
            "tn": '//image.brilliantearth.com/media/cache/7d/52/7d520a66f8c4df64fedcd90f87dee733.jpg',
            "md": '//image.brilliantearth.com/media/cache/cf/4b/cf4b2e5b110ab58f24de9976422887db.jpg',
            "lg": '//image.brilliantearth.com/media/product_images/4A/BE1D54_white_additional1.jpg',
            "alt": '18K White Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.), large additional view 1',
            "description":'None',
            "data-zoomable": 'True',
            "text_line": ''
        });
        image_count +=1;

        product_images['add_img2'] = {
            "tn": '//image.brilliantearth.com/media/cache/55/1a/551ab931962f79d5945ac9a5be09b49a.jpg',
            "md": '//image.brilliantearth.com/media/cache/2f/17/2f171875f51fbcc7da299df01c36cae0.jpg',
            "lg": '//image.brilliantearth.com/media/product_images/JT/BE1D54_white_additional2.jpg',
            "alt": '18K White Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.), large additional view 2',
            "data-zoomable": 'True',
            "text_line": ''
        };
        setting_images.push({
            'caption': 'add_img2',
            "tn": '//image.brilliantearth.com/media/cache/55/1a/551ab931962f79d5945ac9a5be09b49a.jpg',
            "md": '//image.brilliantearth.com/media/cache/2f/17/2f171875f51fbcc7da299df01c36cae0.jpg',
            "lg": '//image.brilliantearth.com/media/product_images/JT/BE1D54_white_additional2.jpg',
            "alt": '18K White Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.), large additional view 2',
            "description":'None',
            "data-zoomable": 'True',
            "text_line": ''
        });
        image_count +=1;

        product_images['add_img3'] = {
            "tn": '//image.brilliantearth.com/media/cache/84/53/8453d8c935d39697f9d4015192812062.jpg',
            "md": '//image.brilliantearth.com/media/cache/74/b1/74b13f75d2faaa8b43b5fc28dc7ad0d2.jpg',
            "lg": '//image.brilliantearth.com/media/product_images/HJ/BE1D54_additional3.jpg',
            "alt": '18K White Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.), large additional view 3',
            "data-zoomable": 'True',
            "text_line": ''
        };
        setting_images.push({
            'caption': 'add_img3',
            "tn": '//image.brilliantearth.com/media/cache/84/53/8453d8c935d39697f9d4015192812062.jpg',
            "md": '//image.brilliantearth.com/media/cache/74/b1/74b13f75d2faaa8b43b5fc28dc7ad0d2.jpg',
            "lg": '//image.brilliantearth.com/media/product_images/HJ/BE1D54_additional3.jpg',
            "alt": '18K White Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.), large additional view 3',
            "description":'None',
            "data-zoomable": 'True',
            "text_line": ''
        });
        image_count +=1;

        product_images['hand_lp'] = {
            "tn": '//image.brilliantearth.com/media/cache/34/f3/34f3bfd7d20809a799210b3d43c05d8f.jpg',
            "md": '//image.brilliantearth.com/media/cache/4b/14/4b14d836558c35cf2e8e913661dce930.jpg',
            "lg": '//image.brilliantearth.com/media/product_images/B9/BE1D54_white_hand_lp.jpg',
            "alt": '18K White Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.), large hand_lp',
            "data-zoomable": 'False',
            "text_line": ''
        };
        setting_images.push({
            'caption': 'hand_lp',
            "tn": '//image.brilliantearth.com/media/cache/34/f3/34f3bfd7d20809a799210b3d43c05d8f.jpg',
            "md": '//image.brilliantearth.com/media/cache/4b/14/4b14d836558c35cf2e8e913661dce930.jpg',
            "lg": '//image.brilliantearth.com/media/product_images/B9/BE1D54_white_hand_lp.jpg',
            "alt": '18K White Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.), large hand_lp',
            "description":'None',
            "data-zoomable": 'False',
            "text_line": ''
        });
        image_count +=1;

        purchased_images.push({
            'caption': 'purchased0',
            "tn": '//image.brilliantearth.com/media/cache/3c/03/3c0366979fc41daa925a11874dc665e5.jpg',
            "md": '//image.brilliantearth.com/media/cache/28/dc/28dcabc162bd019b534e18a95bf6f333.jpg',
            "lg": '//image.brilliantearth.com/media/recently_purchased/9C/422967.jpg',
            "alt": 'Platinum Petite Twisted Vine Diamond Ring (1/8 ct. tw.)',
            "description":'Platinum set with 0.8 Carat, Round, Very Good Cut, H Color, VS2 Clarity Diamond',
        });

        purchased_images.push({
            'caption': 'purchased1',
            "tn": '//image.brilliantearth.com/media/cache/c4/62/c462a36b748721437303e568c5d022a6.jpg',
            "md": '//image.brilliantearth.com/media/cache/93/08/9308ea80b7b1c2e2ddcbd65ee7dfd725.jpg',
            "lg": '//image.brilliantearth.com/media/recently_purchased/03/455820.jpg',
            "alt": 'Platinum Petite Twisted Vine Diamond Ring (1/8 ct. tw.)',
            "description":'Platinum set with 2.00 Carat, Round, Very Good Cut, G Color, VVS1 Clarity Diamond',
        });

        purchased_images.push({
            'caption': 'purchased2',
            "tn": '//image.brilliantearth.com/media/cache/02/25/02254479d288109d7a7b7ab1779c9bac.jpg',
            "md": '//image.brilliantearth.com/media/cache/c1/5b/c15bb5d36b627a8d2e96dc95dcbcfbed.jpg',
            "lg": '//image.brilliantearth.com/media/recently_purchased/E1/354950.jpg',
            "alt": '18K White Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)',
            "description":'18K White Gold set with 0.72 Carat, Round, Ideal Cut, G Color, VS1 Clarity Diamond',
        });

        purchased_images.push({
            'caption': 'purchased3',
            "tn": '//image.brilliantearth.com/media/cache/45/cb/45cb1821966ee6ec544b0ea25009af45.jpg',
            "md": '//image.brilliantearth.com/media/cache/99/61/99610b3143dc53941a5d645953da235e.jpg',
            "lg": '//image.brilliantearth.com/media/recently_purchased/LQ/349932.jpg',
            "alt": '18K White Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)',
            "description":'18K White Gold set with 1.25 Carat, Pear, Ideal Cut, J Color, VS1 Clarity Lab Diamond',
        });

        purchased_images.push({
            'caption': 'purchased4',
            "tn": '//image.brilliantearth.com/media/cache/89/22/8922b987dc3fd4711567a0c877653f7b.jpg',
            "md": '//image.brilliantearth.com/media/cache/5f/13/5f13dac30eba1d3496bbc3ff17743a71.jpg',
            "lg": '//image.brilliantearth.com/media/recently_purchased/C9/340633.jpg',
            "alt": '18K White Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)',
            "description":'18K White Gold set with 1.69 Carat, Round, Super Ideal Cut, E Color, VS1 Clarity Lab Diamond',
        });

        purchased_images.push({
            'caption': 'purchased5',
            "tn": '//image.brilliantearth.com/media/cache/85/d1/85d18d9cef005c57a33de617c0fa0e54.jpg',
            "md": '//image.brilliantearth.com/media/cache/91/7a/917a35126df5248e74b4da01b0d4ae99.jpg',
            "lg": '//image.brilliantearth.com/media/recently_purchased/18/339989.jpg',
            "alt": '14K Rose Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)',
            "description":'14K Rose Gold set with 2.3 Carat, Princess, Super Ideal Cut, G Color, VS1 Clarity Lab Diamond',
        });

        purchased_images.push({
            'caption': 'purchased6',
            "tn": '//image.brilliantearth.com/media/cache/86/2d/862d606aeaf18698a3d70138b24181f4.jpg',
            "md": '//image.brilliantearth.com/media/cache/b2/de/b2dee3f39385129b5777558d5621c32b.jpg',
            "lg": '//image.brilliantearth.com/media/recently_purchased/87/312888.jpg',
            "alt": '18K White Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)',
            "description":'18K White Gold set with 2.29 Carat, Radiant, Very Good Cut, F Color, VVS2 Clarity Lab Diamond',
        });

        purchased_images.push({
            'caption': 'purchased7',
            "tn": '//image.brilliantearth.com/media/cache/cb/37/cb37ec4f3a830e049da58970af1b510c.jpg',
            "md": '//image.brilliantearth.com/media/cache/d7/5e/d75ee2c806b0174a142cd2b23285b298.jpg',
            "lg": '//image.brilliantearth.com/media/recently_purchased/J3/BE1D54_18K_Yellow_Gold_set_with_1.27_Carat_Round_Super_Ideal_Cut_E_Color_V.jpg',
            "alt": '18K Yellow Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)',
            "description":'18K Yellow Gold set with 1.27 Carat, Round, Super Ideal Cut, E Color, VVS2 Clarity Lab Diamond',
        });

        purchased_images.push({
            'caption': 'purchased8',
            "tn": '//image.brilliantearth.com/media/cache/5c/27/5c27c1592c70b9d98e6afd4ba2470454.jpg',
            "md": '//image.brilliantearth.com/media/cache/13/3b/133b27714cad9c27e8d16f1f441b427d.jpg',
            "lg": '//image.brilliantearth.com/media/recently_purchased/EL/296720.jpg',
            "alt": '18K White Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)',
            "description":'18K White Gold set with 0.25 Carat, Round, Super Ideal Cut, D Color, VS1 Clarity Diamond',
        });

        purchased_images.push({
            'caption': 'purchased9',
            "tn": '//image.brilliantearth.com/media/cache/31/c9/31c9968aea61a081d46944b90c515563.jpg',
            "md": '//image.brilliantearth.com/media/cache/df/4e/df4ed66e22b3033b2c589668668c1af1.jpg',
            "lg": '//image.brilliantearth.com/media/recently_purchased/2B/295325.jpg',
            "alt": '18K Yellow Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)',
            "description":'18K Yellow Gold set with 0.8 Carat, Pear, Very Good Cut, G Color, SI1 Clarity Lab Diamond',
        });

        purchased_images.push({
            'caption': 'purchased10',
            "tn": '//image.brilliantearth.com/media/cache/9b/0c/9b0c8ff5177b13401d82c0a53e3aa50d.jpg',
            "md": '//image.brilliantearth.com/media/cache/ab/66/ab664bf1c0324d0f48ec6e049520986b.jpg',
            "lg": '//image.brilliantearth.com/media/recently_purchased/8A/294928.jpg',
            "alt": '18K Yellow Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)',
            "description":'18K Yellow Gold set with 1.0 Carat, Marquise, Ideal Cut, D Color, VS2 Clarity Diamond',
        });

        purchased_images.push({
            'caption': 'purchased11',
            "tn": '//image.brilliantearth.com/media/cache/47/0f/470f8d05eef0d639e1a770c8195e34c1.jpg',
            "md": '//image.brilliantearth.com/media/cache/40/32/40327a812122721c63c114872c560869.jpg',
            "lg": '//image.brilliantearth.com/media/recently_purchased/HU/274306.jpg',
            "alt": '18K White Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)',
            "description":'18K White Gold set with 0.8 Carat, Round, Ideal Cut, D Color, VVS2 Clarity Lab Diamond',
        });

        purchased_images.push({
            'caption': 'purchased12',
            "tn": '//image.brilliantearth.com/media/cache/59/95/59955f1c53bdc3369241b819bb3f9efd.jpg',
            "md": '//image.brilliantearth.com/media/cache/06/76/067640b11cbfc090ad6849ffaa284fcc.jpg',
            "lg": '//image.brilliantearth.com/media/recently_purchased/PC/291210.jpg',
            "alt": '14K Rose Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)',
            "description":'14K Rose Gold set with 2.0 Carat, Oval, Super Ideal Cut, D Color, VS1 Clarity Diamond',
        });

        purchased_images.push({
            'caption': 'purchased13',
            "tn": '//image.brilliantearth.com/media/cache/e8/8a/e88a04ef5bb0637f7ac7f74647a7cc57.jpg',
            "md": '//image.brilliantearth.com/media/cache/97/8c/978c34bc482e24493c3222a31d5874d7.jpg',
            "lg": '//image.brilliantearth.com/media/recently_purchased/3B/280995.jpg',
            "alt": '14K Rose Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)',
            "description":'14K Rose Gold set with 0.3 Carat, Round, Very Good Cut, D Color, VS1 Clarity Diamond',
        });

        purchased_images.push({
            'caption': 'purchased14',
            "tn": '//image.brilliantearth.com/media/cache/4f/2d/4f2df3196238e934f2af7e5d7154dffc.jpg',
            "md": '//image.brilliantearth.com/media/cache/04/3c/043ceecc9c0d2998aa7137e3617c7152.jpg',
            "lg": '//image.brilliantearth.com/media/recently_purchased/65/282177.jpg',
            "alt": '18K White Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)',
            "description":'18K White Gold set with 0.32 Carat, Pear, Ideal Cut, E Color, VVS2 Clarity Diamond',
        });

        purchased_images.push({
            'caption': 'purchased15',
            "tn": '//image.brilliantearth.com/media/cache/9f/3d/9f3dd18bffd78bd208a42ae7149bb0b9.jpg',
            "md": '//image.brilliantearth.com/media/cache/da/c3/dac3cce079bb72327cd79f39abb87450.jpg',
            "lg": '//image.brilliantearth.com/media/recently_purchased/1D/282470.jpg',
            "alt": '18K White Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)',
            "description":'18K White Gold set with 0.5 Carat, Pear, Very Good Cut, I Color, VS2 Clarity Diamond',
        });

        purchased_images.push({
            'caption': 'purchased16',
            "tn": '//image.brilliantearth.com/media/cache/ce/ad/ceadf9e38de132d8df3354dc411ab5a1.jpg',
            "md": '//image.brilliantearth.com/media/cache/4c/62/4c6215ced6291679777e3cab7381a846.jpg',
            "lg": '//image.brilliantearth.com/media/recently_purchased/9Q/282483.jpg',
            "alt": 'Platinum Petite Twisted Vine Diamond Ring (1/8 ct. tw.)',
            "description":'Platinum set with 1.52 Carat, Round, Super Ideal Cut, D Color, VS1 Clarity Diamond',
        });

        purchased_images.push({
            'caption': 'purchased17',
            "tn": '//image.brilliantearth.com/media/cache/08/b2/08b252fd8ecb5e0d6806e1f064682098.jpg',
            "md": '//image.brilliantearth.com/media/cache/88/77/887773240ca5fee2cb29c2a42993fd87.jpg',
            "lg": '//image.brilliantearth.com/media/recently_purchased/78/280286.JPG',
            "alt": 'Platinum Petite Twisted Vine Diamond Ring (1/8 ct. tw.)',
            "description":'Platinum set with 0.3 Carat, Round, Good Cut, G Color, VS1 Clarity Diamond',
        });

        purchased_images.push({
            'caption': 'purchased18',
            "tn": '//image.brilliantearth.com/media/cache/ce/f7/cef7a35debff615988dbd3931a629d46.jpg',
            "md": '//image.brilliantearth.com/media/cache/f1/2e/f12e696856da175f67239dc7fc046550.jpg',
            "lg": '//image.brilliantearth.com/media/recently_purchased/D0/277620.JPG',
            "alt": '18K White Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)',
            "description":'18K White Gold set with 0.74 Carat, Cushion, Ideal Cut, G Color, VVS2 Clarity Diamond',
        });
    
        purchased_images.push({
            'caption': 'purchased19',
            "tn": '//image.brilliantearth.com/media/cache/57/2a/572aa476405dad9b48a594822cade0ca.jpg',
            "md": '//image.brilliantearth.com/media/cache/86/c7/86c79f9e088d3cb59ad194c5ea86c4de.jpg',
            "lg": '//image.brilliantearth.com/media/recently_purchased/75/273893.jpg',
            "alt": '18K Yellow Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)',
            "description":'18K Yellow Gold set with 0.73 Carat, Round, Ideal Cut, G Color, VVS1 Clarity Lab Diamond',
        });
    
        purchased_images.push({
            'caption': 'purchased20',
            "tn": '//image.brilliantearth.com/media/cache/a8/5e/a85e2483a088634f390e948b801c9a31.jpg',
            "md": '//image.brilliantearth.com/media/cache/0f/8b/0f8bc96c010e6ae87187aacac3c2f4db.jpg',
            "lg": '//image.brilliantearth.com/media/recently_purchased/5E/277290.JPG',
            "alt": '18K White Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)',
            "description":'18K White Gold set with 0.76 Carat, Oval, Ideal Cut, E Color, VVS2 Clarity Diamond',
        });
    
        purchased_images.push({
            'caption': 'purchased21',
            "tn": '//image.brilliantearth.com/media/cache/a0/13/a01392259b5af605d74a97402c81505e.jpg',
            "md": '//image.brilliantearth.com/media/cache/2f/7d/2f7dbe846fb3b7328cd2d2b9755139e4.jpg',
            "lg": '//image.brilliantearth.com/media/recently_purchased/E1/278132.JPG',
            "alt": '18K White Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)',
            "description":'18K White Gold set with 1.01 Carat, Princess, Ideal Cut, F Color, VS2 Clarity Diamond',
        });
    
        purchased_images.push({
            'caption': 'purchased22',
            "tn": '//image.brilliantearth.com/media/cache/9f/92/9f92ed2cf33dbafe63c891fd56c277d5.jpg',
            "md": '//image.brilliantearth.com/media/cache/14/f3/14f3584c01cef12a2003cb401e890a85.jpg',
            "lg": '//image.brilliantearth.com/media/recently_purchased/55/278061.JPG',
            "alt": '14K Rose Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)',
            "description":'14K Rose Gold set with 0.89 Carat, Round, Ideal Cut, J Color, SI2 Clarity Diamond',
        });
    
        purchased_images.push({
            'caption': 'purchased23',
            "tn": '//image.brilliantearth.com/media/cache/a6/4a/a64ae04acdc81ae914dfde4c931000b0.jpg',
            "md": '//image.brilliantearth.com/media/cache/7c/89/7c89898732329dc8c44815ccab55e73f.jpg',
            "lg": '//image.brilliantearth.com/media/recently_purchased/D9/273343.JPG',
            "alt": '18K White Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)',
            "description":'18K White Gold set with 0.41 Carat, Round, Super Ideal Cut, F Color, IF Clarity Diamond',
        });
    
        purchased_images.push({
            'caption': 'purchased24',
            "tn": '//image.brilliantearth.com/media/cache/34/86/3486590dbad6e724c2bdf1a3448b5966.jpg',
            "md": '//image.brilliantearth.com/media/cache/71/69/71696d516d66fafbe3778d87208db7db.jpg',
            "lg": '//image.brilliantearth.com/media/recently_purchased/OJ/262839.JPG',
            "alt": '18K Yellow Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)',
            "description":'18K Yellow Gold set with 0.77 Carat, Heart, Super Ideal Cut, E Color, IF Clarity Diamond',
        });
    
        purchased_images.push({
            'caption': 'purchased25',
            "tn": '//image.brilliantearth.com/media/cache/ed/c9/edc90a7403db8e641b216f12c88c1079.jpg',
            "md": '//image.brilliantearth.com/media/cache/4b/00/4b00fe9e63bb9c9c0d9fdc2ba47cdcd3.jpg',
            "lg": '//image.brilliantearth.com/media/recently_purchased/53/271084.JPG',
            "alt": '18K White Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)',
            "description":'18K White Gold set with 1.0 Carat, Cushion, Very Good Cut, F Color, VS1 Clarity Diamond',
        });
    
        purchased_images.push({
            'caption': 'purchased26',
            "tn": '//image.brilliantearth.com/media/cache/cc/d2/ccd24f95d940c98818f1eebb72cf2fee.jpg',
            "md": '//image.brilliantearth.com/media/cache/6b/d0/6bd0f5b0e027e517e37f172e041694d9.jpg',
            "lg": '//image.brilliantearth.com/media/recently_purchased/70/271726.JPG',
            "alt": '18K White Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)',
            "description":'18K White Gold set with 1.76 Carat, Pear, Super Ideal Cut, D Color, VS1 Clarity Lab Diamond',
        });
    
        purchased_images.push({
            'caption': 'purchased27',
            "tn": '//image.brilliantearth.com/media/cache/ec/37/ec37efab09f01bcaf4fd2d24ff963bc4.jpg',
            "md": '//image.brilliantearth.com/media/cache/14/44/14442150399c8b2aef9cf209cb996838.jpg',
            "lg": '//image.brilliantearth.com/media/recently_purchased/A9/271682.JPG',
            "alt": 'Platinum Petite Twisted Vine Diamond Ring (1/8 ct. tw.)',
            "description":'Platinum set with 0.97 Carat, Round, Ideal Cut, I Color, VS2 Clarity Lab Diamond',
        });
    
        purchased_images.push({
            'caption': 'purchased28',
            "tn": '//image.brilliantearth.com/media/cache/35/37/3537305e396bdea0039652bd9f3e1bb1.jpg',
            "md": '//image.brilliantearth.com/media/cache/b6/93/b693ee27a4f188eac0ccc0c8cdd8b004.jpg',
            "lg": '//image.brilliantearth.com/media/recently_purchased/22/270523.JPG',
            "alt": '18K Yellow Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)',
            "description":'18K Yellow Gold set with 1.01 Carat, Cushion, Very Good Cut, J Color, VVS2 Clarity Diamond',
        });
    
        purchased_images.push({
            'caption': 'purchased29',
            "tn": '//image.brilliantearth.com/media/cache/67/7b/677b6f37ec8a20b3fa1af8182b0672c9.jpg',
            "md": '//image.brilliantearth.com/media/cache/ca/18/ca18f5b33ec44558e024be0af105d66a.jpg',
            "lg": '//image.brilliantearth.com/media/recently_purchased/F4/252698.JPG',
            "alt": 'Platinum Petite Twisted Vine Diamond Ring (1/8 ct. tw.)',
            "description":'Platinum set with 1.5 Carat, Asscher, Ideal Cut, G Color, VS2 Clarity Diamond',
        });
    
        purchased_images.push({
            'caption': 'purchased30',
            "tn": '//image.brilliantearth.com/media/cache/c9/be/c9be5e7d8d8cd12c863d70d767aee58d.jpg',
            "md": '//image.brilliantearth.com/media/cache/46/bf/46bf904959db18fdeeb56f8dcdf3ab5f.jpg',
            "lg": '//image.brilliantearth.com/media/recently_purchased/ZD/250388.JPG',
            "alt": '18K Yellow Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)',
            "description":'18K Yellow Gold set with 0.71 Carat, Heart, Very Good Cut, G Color, SI2 Clarity Diamond',
        });
    
        purchased_images.push({
            'caption': 'purchased31',
            "tn": '//image.brilliantearth.com/media/cache/9a/67/9a6768cb7253f887c6520bde191a4bbe.jpg',
            "md": '//image.brilliantearth.com/media/cache/72/82/7282ce9b0c7d99ab46bd9429fc5152e0.jpg',
            "lg": '//image.brilliantearth.com/media/recently_purchased/LT/249971.JPG',
            "alt": '18K White Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)',
            "description":'18K White Gold set with 0.3 Carat, Pear, Ideal Cut, F Color, VS1 Clarity Diamond',
        });
    
        purchased_images.push({
            'caption': 'purchased32',
            "tn": '//image.brilliantearth.com/media/cache/f7/49/f7497f1884672112d5f9660720db3e1e.jpg',
            "md": '//image.brilliantearth.com/media/cache/d7/40/d7404e0dbf749c80b7929387263e6610.jpg',
            "lg": '//image.brilliantearth.com/media/recently_purchased/2O/208890.JPG',
            "alt": '18K White Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)',
            "description":'18K White Gold set with 1.27 Carat, Oval, Super Ideal Cut, H Color, SI2 Clarity Diamond',
        });
    
        purchased_images.push({
            'caption': 'purchased33',
            "tn": '//image.brilliantearth.com/media/cache/75/2d/752dde710c66baf11507a1a7d0cf728b.jpg',
            "md": '//image.brilliantearth.com/media/cache/88/0c/880c886382cd9ccc4479c4b898f6cf8a.jpg',
            "lg": '//image.brilliantearth.com/media/recently_purchased/UX/208009.JPG',
            "alt": '18K White Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)',
            "description":'18K White Gold set with 0.52 Carat, Radiant, Ideal Cut, E Color, VVS1 Clarity Diamond',
        });
    
        purchased_images.push({
            'caption': 'purchased34',
            "tn": '//image.brilliantearth.com/media/cache/ba/4f/ba4fb3555e429c5cd655b7f065ba73d3.jpg',
            "md": '//image.brilliantearth.com/media/cache/ba/01/ba018cf801112dfdef1c290ac1953482.jpg',
            "lg": '//image.brilliantearth.com/media/recently_purchased/Z1/201661.JPG',
            "alt": '18K Yellow Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)',
            "description":'18K Yellow Gold set with 0.91 Carat, Pear, Super Ideal Cut, J Color, SI1 Clarity Diamond',
        });
    
        purchased_images.push({
            'caption': 'purchased35',
            "tn": '//image.brilliantearth.com/media/cache/60/9c/609c8afe69da7089de0a201153f0346b.jpg',
            "md": '//image.brilliantearth.com/media/cache/e2/76/e276e1a3cf64b3a417f0daee8a714d5e.jpg',
            "lg": '//image.brilliantearth.com/media/recently_purchased/8A/231095.jpg',
            "alt": 'Platinum Petite Twisted Vine Diamond Ring (1/8 ct. tw.)',
            "description":'Platinum set with 1.8 Carat, Round, Super Ideal Cut, F Color, VVS2 Clarity Diamond',
        });
    
        purchased_images.push({
            'caption': 'purchased36',
            "tn": '//image.brilliantearth.com/media/cache/65/9a/659a79fa50bd7325fc7978dd5defe2aa.jpg',
            "md": '//image.brilliantearth.com/media/cache/79/db/79db8a0808d2b1aa7ec10cb62abdd938.jpg',
            "lg": '//image.brilliantearth.com/media/recently_purchased/SV/214671.jpg',
            "alt": 'Platinum Petite Twisted Vine Diamond Ring (1/8 ct. tw.)',
            "description":'Platinum set with 2.03 Carat, Cushion, Ideal Cut, F Color, VS1 Clarity Diamond',
        });
    
        purchased_images.push({
            'caption': 'purchased37',
            "tn": '//image.brilliantearth.com/media/cache/1a/ef/1aef554ff2e5607fee78fe9a03f5fa56.jpg',
            "md": '//image.brilliantearth.com/media/cache/19/bc/19bcb5583aaffc3871fe74a6bc061c43.jpg',
            "lg": '//image.brilliantearth.com/media/recently_purchased/AF/212269.jpg',
            "alt": '18K Yellow Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)',
            "description":'18K Yellow Gold set with 0.9 Carat, Round, Very Good Cut, H Color, SI1 Clarity Diamond',
        });
    
        purchased_images.push({
            'caption': 'purchased38',
            "tn": '//image.brilliantearth.com/media/cache/80/59/805910ad97672725f2884d731c13734c.jpg',
            "md": '//image.brilliantearth.com/media/cache/84/cf/84cfb13d0dd7c3315844298f253afedc.jpg',
            "lg": '//image.brilliantearth.com/media/recently_purchased/68/212770.jpg',
            "alt": '18K White Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)',
            "description":'18K White Gold set with 2.50 Carat, Round, Super Ideal Cut, I Color, VS1 Clarity',
        });
    
        purchased_images.push({
            'caption': 'purchased39',
            "tn": '//image.brilliantearth.com/media/cache/0d/4b/0d4bd463f1afaa527c765a2b11cda4c2.jpg',
            "md": '//image.brilliantearth.com/media/cache/65/ee/65eeaa942872c3f325a6cf8337ff82c8.jpg',
            "lg": '//image.brilliantearth.com/media/recently_purchased/P1/BE1D54_14K_Rose_Gold_set_with_1.43_Carat_Round_Ideal_Cut_G_Color_VS2_Clari.jpg',
            "alt": '14K Rose Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)',
            "description":'14K Rose Gold set with 1.43 Carat, Round, Ideal Cut, G Color, VS2 Clarity Lab Diamond',
        });
    
        purchased_images.push({
            'caption': 'purchased40',
            "tn": '//image.brilliantearth.com/media/cache/60/af/60afa4283125c66e6bf69525e9dc0174.jpg',
            "md": '//image.brilliantearth.com/media/cache/7f/07/7f075d559e3d02a2d5dce510e97bce60.jpg',
            "lg": '//image.brilliantearth.com/media/recently_purchased/F3/0.82_Carat_Oval_Diamond_H_Color_Very_Good_Cut_SI2_Clarity.jpg',
            "alt": '14K Rose Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)',
            "description":'14K Rose Gold set with 0.82 Carat, Oval, Very Good Cut, H Color, SI2 Clarity Diamond',
        });
    
        purchased_images.push({
            'caption': 'purchased41',
            "tn": '//image.brilliantearth.com/media/cache/29/de/29dee6328d2a7e0c298f751c40ce29ba.jpg',
            "md": '//image.brilliantearth.com/media/cache/96/90/9690cc309d0d1bc9095d1fb064669615.jpg',
            "lg": '//image.brilliantearth.com/media/recently_purchased/Y5/BE1D54_14K_Rose_Gold_set_with_0.7_Carat_Round_Ideal_Cut_D_Color_VVS2_Clari.jpg',
            "alt": '14K Rose Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)',
            "description":'14K Rose Gold set with 0.7 Carat, Round, Ideal Cut, D Color, VVS2 Clarity Lab Diamond',
        });
    
        purchased_images.push({
            'caption': 'purchased42',
            "tn": '//image.brilliantearth.com/media/cache/e9/99/e999d7f88d07ed31c95f81460de3fab1.jpg',
            "md": '//image.brilliantearth.com/media/cache/e0/0e/e00eacd940318be5a2bc4a225dc88bd6.jpg',
            "lg": '//image.brilliantearth.com/media/recently_purchased/NV/208694.JPG',
            "alt": '18K White Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)',
            "description":'18K White Gold set with 0.96 Carat, Oval, Very Good Cut, G Color, VS2 Clarity Diamond',
        });
    
        purchased_images.push({
            'caption': 'purchased43',
            "tn": '//image.brilliantearth.com/media/cache/e4/4f/e44fcbfb9d3c562c0585b019da458ebf.jpg',
            "md": '//image.brilliantearth.com/media/cache/10/86/1086606fc4ede96813b68ae113561a88.jpg',
            "lg": '//image.brilliantearth.com/media/recently_purchased/2D/208420.jpg',
            "alt": '18K White Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)',
            "description":'18K White Gold set with 0.3 Carat, Princess, Very Good Cut, E Color, VVS2 Clarity Diamond',
        });
    
        purchased_images.push({
            'caption': 'purchased44',
            "tn": '//image.brilliantearth.com/media/cache/9e/5b/9e5b4dc389023d729e02473db4a404f1.jpg',
            "md": '//image.brilliantearth.com/media/cache/08/ef/08ef2dfd4a18b2f35c1f47251b197a16.jpg',
            "lg": '//image.brilliantearth.com/media/recently_purchased/29/203563.jpg',
            "alt": '14K Rose Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)',
            "description":'14K Rose Gold set with 1.08 Carat, Princess, Ideal Cut, G Color, VVS2 Clarity Diamond',
        });
    
        purchased_images.push({
            'caption': 'purchased45',
            "tn": '//image.brilliantearth.com/media/cache/52/84/5284dee797843b39ad286cb9d51acb39.jpg',
            "md": '//image.brilliantearth.com/media/cache/a0/81/a081269dd553b6c0dd413b05500dca9b.jpg',
            "lg": '//image.brilliantearth.com/media/recently_purchased/JN/202289-Edit.jpg',
            "alt": '18K Yellow Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)',
            "description":'18K Yellow Gold set with 0.71 Carat, Round, Super Ideal Cut, G Color, VS2 Clarity Diamond',
        });
    
        purchased_images.push({
            'caption': 'purchased46',
            "tn": '//image.brilliantearth.com/media/cache/cb/af/cbaffd06b69210ac34f4f032d5d293cc.jpg',
            "md": '//image.brilliantearth.com/media/cache/23/d1/23d194873a53d46bf4597c197abd1966.jpg',
            "lg": '//image.brilliantearth.com/media/recently_purchased/6B/201753.jpg',
            "alt": '14K Rose Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)',
            "description":'14K Rose Gold set with 0.9 Carat, Round, Super Ideal Cut, J Color, VVS2 Clarity Diamond',
        });
    
        purchased_images.push({
            'caption': 'purchased47',
            "tn": '//image.brilliantearth.com/media/cache/3c/b3/3cb33efdfdf913e3ab436a5a60e60b4e.jpg',
            "md": '//image.brilliantearth.com/media/cache/5a/8e/5a8ea187d8aaa42c93532c2a8febcc89.jpg',
            "lg": '//image.brilliantearth.com/media/recently_purchased/A1/201167.jpg',
            "alt": '18K White Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)',
            "description":'18K White Gold set with 0.9 Carat, Emerald, Very Good Cut, H Color, VS2 Clarity Diamond',
        });
    
        purchased_images.push({
            'caption': 'purchased48',
            "tn": '//image.brilliantearth.com/media/cache/25/f3/25f37e2336b975c67b4b67da5684ef57.jpg',
            "md": '//image.brilliantearth.com/media/cache/88/d2/88d2350340b524a0d242ec79f9af8fc2.jpg',
            "lg": '//image.brilliantearth.com/media/recently_purchased/P4/196278.jpg',
            "alt": '18K White Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)',
            "description":'18K White Gold set with 1.0 Carat, Round, Good Cut, J Color, VS1 Clarity Diamond',
        });
    
        purchased_images.push({
            'caption': 'purchased49',
            "tn": '//image.brilliantearth.com/media/cache/c6/3f/c63fa8f0db4a4ae26d1853a3b2c2e3ec.jpg',
            "md": '//image.brilliantearth.com/media/cache/01/b0/01b0942401f1ebe603c18c0f3b531b6f.jpg',
            "lg": '//image.brilliantearth.com/media/recently_purchased/O9/197568.jpg',
            "alt": '18K Yellow Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)',
            "description":'18K Yellow Gold set with 1.35 Carat, Marquise, Ideal Cut, D Color, IF Clarity Diamond',
        });
    

    

    var product_video_dict = {};
    
      product_video_dict['Round'] = '9054220'
    
      product_video_dict['Emerald'] = '1178618'
    
      product_video_dict['Cushion'] = '9466169'
    
      product_video_dict['Radiant'] = '2304379'
    
      product_video_dict['Heart'] = '4058631'
    
      product_video_dict['Pear'] = '2051189'
    
      product_video_dict['Princess'] = '1820759'
    
      product_video_dict['Marquise'] = '8597867'
    
      product_video_dict['Oval'] = '6204525'
    
      product_video_dict['Asscher'] = '5990510'
    

    var product_shape_images = {};
    
        product_shape_images['Asscher'] = {
            "top_lg": {
                "tn": '//image.brilliantearth.com/media/cache/9f/dc/9fdc01a528eac95b9ab2bf80e4231106.jpg',
                "md": '//image.brilliantearth.com/media/cache/da/a6/daa6f548453532675959d16b10f505f7.jpg',
                "lg": '//image.brilliantearth.com/media/shape_images/5430181ce9fdeb86db11bdfb3187f19f_0d1977cb91e4c9b4990bd3d462c8ba43_0_.jpg',
                "data-zoomable": 'True',
                "text_line": 'Shown with 1 1/4 carat diamond',
            },
            "side_lg": {
                "tn": '//image.brilliantearth.com/media/cache/89/e5/89e55645100d7976d20d764eccab2d34.jpg',
                "md": '//image.brilliantearth.com/media/cache/d4/35/d435732bf5e2b366d519431adce7f2dc.jpg',
                "lg": '//image.brilliantearth.com/media/product_images/8D/BE1D54_round_white_side.jpg',
                "data-zoomable": 'True'
            }
        };
    
        product_shape_images['Cushion'] = {
            "top_lg": {
                "tn": '//image.brilliantearth.com/media/cache/eb/96/eb96b4c75e7790068500e67613a483cd.jpg',
                "md": '//image.brilliantearth.com/media/cache/f4/ff/f4ffc8d5a1aea15784f2d588a3de8c9e.jpg',
                "lg": '//image.brilliantearth.com/media/shape_images/5430181ce9fdeb86db11bdfb3187f19f_4a1d791084f4754908c54c135864b99b_0_.jpg',
                "data-zoomable": 'True',
                "text_line": 'Shown with 1 1/4 carat diamond',
            },
            "side_lg": {
                "tn": '//image.brilliantearth.com/media/cache/89/e5/89e55645100d7976d20d764eccab2d34.jpg',
                "md": '//image.brilliantearth.com/media/cache/d4/35/d435732bf5e2b366d519431adce7f2dc.jpg',
                "lg": '//image.brilliantearth.com/media/product_images/8D/BE1D54_round_white_side.jpg',
                "data-zoomable": 'True'
            }
        };
    
        product_shape_images['Emerald'] = {
            "top_lg": {
                "tn": '//image.brilliantearth.com/media/cache/02/ae/02aec6a4d49a9ebe7adc38eef6923cb6.jpg',
                "md": '//image.brilliantearth.com/media/cache/94/79/94790cf821166e583e5ef1c051e488b7.jpg',
                "lg": '//image.brilliantearth.com/media/shape_images/5430181ce9fdeb86db11bdfb3187f19f_d50ae954b46bce388dd6a848eee25ae6_0_.jpg',
                "data-zoomable": 'True',
                "text_line": 'Shown with 1 1/4 carat diamond',
            },
            "side_lg": {
                "tn": '//image.brilliantearth.com/media/cache/89/e5/89e55645100d7976d20d764eccab2d34.jpg',
                "md": '//image.brilliantearth.com/media/cache/d4/35/d435732bf5e2b366d519431adce7f2dc.jpg',
                "lg": '//image.brilliantearth.com/media/product_images/8D/BE1D54_round_white_side.jpg',
                "data-zoomable": 'True'
            }
        };
    
        product_shape_images['Heart'] = {
            "top_lg": {
                "tn": '//image.brilliantearth.com/media/cache/18/e8/18e84beb6afe503104df8b46c4a0e584.jpg',
                "md": '//image.brilliantearth.com/media/cache/d8/49/d8492e36a7c0ddafce03c7389ebafa40.jpg',
                "lg": '//image.brilliantearth.com/media/shape_images/aaabd65e99f79cf8abb3aaf9197e17da_846e891ca5f597eb6fbe734a280c38c1_0_.jpg',
                "data-zoomable": 'True',
                "text_line": 'Shown with 1 1/4 carat diamond',
            },
            "side_lg": {
                "tn": '//image.brilliantearth.com/media/cache/89/e5/89e55645100d7976d20d764eccab2d34.jpg',
                "md": '//image.brilliantearth.com/media/cache/d4/35/d435732bf5e2b366d519431adce7f2dc.jpg',
                "lg": '//image.brilliantearth.com/media/product_images/8D/BE1D54_round_white_side.jpg',
                "data-zoomable": 'True'
            }
        };
    
        product_shape_images['Marquise'] = {
            "top_lg": {
                "tn": '//image.brilliantearth.com/media/cache/0c/70/0c70f1563b84e59236c736c6c6b7add1.jpg',
                "md": '//image.brilliantearth.com/media/cache/3c/24/3c2487335ecdab07fc8f3f540ab88968.jpg',
                "lg": '//image.brilliantearth.com/media/shape_images/011f7f24ae4cbbef191cff1a711df9e1_f7e1236aec27d3b3686ca01909d34415_0_.jpg',
                "data-zoomable": 'True',
                "text_line": 'Shown with 3/4 carat diamond',
            },
            "side_lg": {
                "tn": '//image.brilliantearth.com/media/cache/89/e5/89e55645100d7976d20d764eccab2d34.jpg',
                "md": '//image.brilliantearth.com/media/cache/d4/35/d435732bf5e2b366d519431adce7f2dc.jpg',
                "lg": '//image.brilliantearth.com/media/product_images/8D/BE1D54_round_white_side.jpg',
                "data-zoomable": 'True'
            }
        };
    
        product_shape_images['Oval'] = {
            "top_lg": {
                "tn": '//image.brilliantearth.com/media/cache/7f/a0/7fa06dbeaf8c739f41165e8e9c92c074.jpg',
                "md": '//image.brilliantearth.com/media/cache/04/42/044214284adc200d8bb022676371a255.jpg',
                "lg": '//image.brilliantearth.com/media/shape_images/011f7f24ae4cbbef191cff1a711df9e1_84c96ae667864da8b5678b3e1bc46114_0_.jpg',
                "data-zoomable": 'True',
                "text_line": 'Shown with 3/4 carat diamond',
            },
            "side_lg": {
                "tn": '//image.brilliantearth.com/media/cache/89/e5/89e55645100d7976d20d764eccab2d34.jpg',
                "md": '//image.brilliantearth.com/media/cache/d4/35/d435732bf5e2b366d519431adce7f2dc.jpg',
                "lg": '//image.brilliantearth.com/media/product_images/8D/BE1D54_round_white_side.jpg',
                "data-zoomable": 'True'
            }
        };
    
        product_shape_images['Pear'] = {
            "top_lg": {
                "tn": '//image.brilliantearth.com/media/cache/87/f0/87f0e32ceb20e1803429888757e1b332.jpg',
                "md": '//image.brilliantearth.com/media/cache/17/15/1715b3e459b73ba7b07da9d3f0d935e8.jpg',
                "lg": '//image.brilliantearth.com/media/shape_images/5430181ce9fdeb86db11bdfb3187f19f_2c55d67ad6ace94be8fddd4757347ab7_0_.jpg',
                "data-zoomable": 'True',
                "text_line": 'Shown with 1 1/4 carat diamond',
            },
            "side_lg": {
                "tn": '//image.brilliantearth.com/media/cache/89/e5/89e55645100d7976d20d764eccab2d34.jpg',
                "md": '//image.brilliantearth.com/media/cache/d4/35/d435732bf5e2b366d519431adce7f2dc.jpg',
                "lg": '//image.brilliantearth.com/media/product_images/8D/BE1D54_round_white_side.jpg',
                "data-zoomable": 'True'
            }
        };
    
        product_shape_images['Princess'] = {
            "top_lg": {
                "tn": '//image.brilliantearth.com/media/cache/15/b0/15b0a95c0b647891f84ef0741841e021.jpg',
                "md": '//image.brilliantearth.com/media/cache/63/48/63487e18cc85903d00bd648b7328513a.jpg',
                "lg": '//image.brilliantearth.com/media/shape_images/5430181ce9fdeb86db11bdfb3187f19f_e8174a4e8349f563d1ee88c418f20533_0_.jpg',
                "data-zoomable": 'True',
                "text_line": 'Shown with 1 1/4 carat diamond',
            },
            "side_lg": {
                "tn": '//image.brilliantearth.com/media/cache/89/e5/89e55645100d7976d20d764eccab2d34.jpg',
                "md": '//image.brilliantearth.com/media/cache/d4/35/d435732bf5e2b366d519431adce7f2dc.jpg',
                "lg": '//image.brilliantearth.com/media/product_images/8D/BE1D54_round_white_side.jpg',
                "data-zoomable": 'True'
            }
        };
    
        product_shape_images['Radiant'] = {
            "top_lg": {
                "tn": '//image.brilliantearth.com/media/cache/87/bb/87bb0ba5ee825fcc5885d092ef3bd51b.jpg',
                "md": '//image.brilliantearth.com/media/cache/54/f4/54f451b601ede9dd0e80a5d8764c4adf.jpg',
                "lg": '//image.brilliantearth.com/media/shape_images/5430181ce9fdeb86db11bdfb3187f19f_6f0a992ff6f0e3118f194365759c0c71_0_.jpg',
                "data-zoomable": 'True',
                "text_line": 'Shown with 1 1/4 carat diamond',
            },
            "side_lg": {
                "tn": '//image.brilliantearth.com/media/cache/89/e5/89e55645100d7976d20d764eccab2d34.jpg',
                "md": '//image.brilliantearth.com/media/cache/d4/35/d435732bf5e2b366d519431adce7f2dc.jpg',
                "lg": '//image.brilliantearth.com/media/product_images/8D/BE1D54_round_white_side.jpg',
                "data-zoomable": 'True'
            }
        };
    
        product_shape_images['Round'] = {
            "top_lg": {
                "tn": '//image.brilliantearth.com/media/cache/04/0a/040a1e61f5edc387d8c8e40d3ea0e0ca.jpg',
                "md": '//image.brilliantearth.com/media/cache/b7/f3/b7f3cb1da267d7e8ac0412bdc522c862.jpg',
                "lg": '//image.brilliantearth.com/media/shape_images/011f7f24ae4cbbef191cff1a711df9e1_a3c9ca71b7d85d87085955f8d1c4bfc3_0_.jpg',
                "data-zoomable": 'True',
                "text_line": 'Shown with 3/4 carat diamond',
            },
            "side_lg": {
                "tn": '//image.brilliantearth.com/media/cache/89/e5/89e55645100d7976d20d764eccab2d34.jpg',
                "md": '//image.brilliantearth.com/media/cache/d4/35/d435732bf5e2b366d519431adce7f2dc.jpg',
                "lg": '//image.brilliantearth.com/media/product_images/8D/BE1D54_round_white_side.jpg',
                "data-zoomable": 'True'
            }
        };
    

    

    
    size_on_hand_images = {
        'caption': '',
        'tn': '//css.brilliantearth.com/static/imgProd/diamond-size-visualization/image-assets/New-Hand-Zoom.jpg',
        'md': '//css.brilliantearth.com/static/imgProd/diamond-size-visualization/image-assets/New-Hand-Zoom.jpg',
        'lg': '//css.brilliantearth.com/static/imgProd/diamond-size-visualization/image-assets/New-Hand-Zoom.jpg',
        'alt': 'Actual Diamond Size on Size 6 Hand',
        'description':'Actual Diamond Size on Size 6 Hand'
    };

    
      carat_image_set = {"Asscher": [[0.33, 0.5, 0.75, 1.0, 1.25, 1.5, 2.0], {"0.33": "//image.brilliantearth.com/media/base_product_center_diamond_images/XW/BE1D54_Claw Prong_Asscher_white_carat_33.jpg", "0.5": "//image.brilliantearth.com/media/base_product_center_diamond_images/XP/BE1D54_Claw Prong_Asscher_white_carat_50.jpg", "0.75": "//image.brilliantearth.com/media/base_product_center_diamond_images/B1/BE1D54_Claw Prong_Asscher_white_carat_75.jpg", "1.0": "//image.brilliantearth.com/media/base_product_center_diamond_images/SJ/BE1D54_Claw Prong_Asscher_white_carat_1.jpg", "1.25": "//image.brilliantearth.com/media/base_product_center_diamond_images/8Q/BE1D54_Claw Prong_Asscher_white_carat_125.jpg", "1.5": "//image.brilliantearth.com/media/base_product_center_diamond_images/O8/BE1D54_Claw Prong_Asscher_white_carat_150.jpg", "2.0": "//image.brilliantearth.com/media/base_product_center_diamond_images/FI/BE1D54_Claw Prong_Asscher_white_carat_2.jpg"}], "Cushion": [[0.33, 0.5, 0.75, 1.0, 1.25, 1.5, 2.0, 2.75, 4], {"0.33": "//image.brilliantearth.com/media/base_product_center_diamond_images/XQ/BE1D54_Claw Prong_Cushion_white_carat_33.jpg", "0.5": "//image.brilliantearth.com/media/base_product_center_diamond_images/TC/BE1D54_Claw Prong_Cushion_white_carat_50.jpg", "0.75": "//image.brilliantearth.com/media/base_product_center_diamond_images/JQ/BE1D54_Claw Prong_Cushion_white_carat_75.jpg", "1.0": "//image.brilliantearth.com/media/base_product_center_diamond_images/AR/BE1D54_Claw Prong_Cushion_white_carat_1.jpg", "1.25": "//image.brilliantearth.com/media/base_product_center_diamond_images/82/BE1D54_Claw Prong_Cushion_white_carat_125.jpg", "1.5": "//image.brilliantearth.com/media/base_product_center_diamond_images/B5/BE1D54_Claw Prong_Cushion_white_carat_150.jpg", "2.0": "//image.brilliantearth.com/media/base_product_center_diamond_images/PE/BE1D54_Claw Prong_Cushion_white_carat_2.jpg", "2.75": "//image.brilliantearth.com/media/base_product_center_diamond_images/A8/BE1D54_Claw Prong_Cushion_white_carat_275.jpg", "4": "//image.brilliantearth.com/media/base_product_center_diamond_images/8I/BE1D54_Claw Prong_Cushion_white_carat_4.jpg"}], "Emerald": [[0.33, 0.5, 0.75, 1.0, 1.25, 1.5, 2.0], {"0.33": "//image.brilliantearth.com/media/base_product_center_diamond_images/97/BE1D54_Claw Prong_Emerald_white_carat_33.jpg", "0.5": "//image.brilliantearth.com/media/base_product_center_diamond_images/4R/BE1D54_Claw Prong_Emerald_white_carat_50.jpg", "0.75": "//image.brilliantearth.com/media/base_product_center_diamond_images/BZ/BE1D54_Claw Prong_Emerald_white_carat_75.jpg", "1.0": "//image.brilliantearth.com/media/base_product_center_diamond_images/2S/BE1D54_Claw Prong_Emerald_white_carat_1.jpg", "1.25": "//image.brilliantearth.com/media/base_product_center_diamond_images/59/BE1D54_Claw Prong_Emerald_white_carat_125.jpg", "1.5": "//image.brilliantearth.com/media/base_product_center_diamond_images/4I/BE1D54_Claw Prong_Emerald_white_carat_150.jpg", "2.0": "//image.brilliantearth.com/media/base_product_center_diamond_images/LI/BE1D54_Claw Prong_Emerald_white_carat_2.jpg"}], "Heart": [[0.33, 0.5, 0.75, 1.0, 1.25, 1.5, 2.0], {"0.33": "//image.brilliantearth.com/media/base_product_center_diamond_images/02/BE1D54_Claw Prong_Heart_white_carat_33.jpg", "0.5": "//image.brilliantearth.com/media/base_product_center_diamond_images/FO/BE1D54_Claw Prong_Heart_white_carat_50.jpg", "0.75": "//image.brilliantearth.com/media/base_product_center_diamond_images/G6/BE1D54_Claw Prong_Heart_white_carat_75.jpg", "1.0": "//image.brilliantearth.com/media/base_product_center_diamond_images/FB/BE1D54_Claw Prong_Heart_white_carat_1.jpg", "1.25": "//image.brilliantearth.com/media/base_product_center_diamond_images/QP/BE1D54_Claw Prong_Heart_white_carat_125.jpg", "1.5": "//image.brilliantearth.com/media/base_product_center_diamond_images/J1/BE1D54_Claw Prong_Heart_white_carat_150.jpg", "2.0": "//image.brilliantearth.com/media/base_product_center_diamond_images/E4/BE1D54_Claw Prong_Heart_white_carat_2.jpg"}], "Marquise": [[0.33, 0.5, 0.75, 1.0, 1.25, 1.5, 2.0], {"0.33": "//image.brilliantearth.com/media/base_product_center_diamond_images/2A/BE1D54_Claw Prong_Marquise_white_carat_33.jpg", "0.5": "//image.brilliantearth.com/media/base_product_center_diamond_images/NT/BE1D54_Claw Prong_Marquise_white_carat_50.jpg", "0.75": "//image.brilliantearth.com/media/base_product_center_diamond_images/W4/BE1D54_Claw Prong_Marquise_white_carat_75.jpg", "1.0": "//image.brilliantearth.com/media/base_product_center_diamond_images/58/BE1D54_Claw Prong_Marquise_white_carat_1.jpg", "1.25": "//image.brilliantearth.com/media/base_product_center_diamond_images/6V/BE1D54_Claw Prong_Marquise_white_carat_125.jpg", "1.5": "//image.brilliantearth.com/media/base_product_center_diamond_images/8E/BE1D54_Claw Prong_Marquise_white_carat_150.jpg", "2.0": "//image.brilliantearth.com/media/base_product_center_diamond_images/WD/BE1D54_Claw Prong_Marquise_white_carat_2.jpg"}], "Oval": [[0.33, 0.5, 0.75, 1.0, 1.25, 1.5, 2.0, 2.25], {"0.33": "//image.brilliantearth.com/media/base_product_center_diamond_images/13/BE1D54_Claw Prong_Oval_white_carat_33.jpg", "0.5": "//image.brilliantearth.com/media/base_product_center_diamond_images/YO/BE1D54_Claw Prong_Oval_white_carat_50.jpg", "0.75": "//image.brilliantearth.com/media/base_product_center_diamond_images/OT/BE1D54_Claw Prong_Oval_white_carat_75.jpg", "1.0": "//image.brilliantearth.com/media/base_product_center_diamond_images/CM/BE1D54_Claw Prong_Oval_white_carat_1.jpg", "1.25": "//image.brilliantearth.com/media/base_product_center_diamond_images/7W/BE1D54_Claw Prong_Oval_white_carat_125.jpg", "1.5": "//image.brilliantearth.com/media/base_product_center_diamond_images/WS/BE1D54_Claw Prong_Oval_white_carat_150.jpg", "2.0": "//image.brilliantearth.com/media/base_product_center_diamond_images/ZE/BE1D54_Claw Prong_Oval_white_carat_2.jpg", "2.25": "//image.brilliantearth.com/media/base_product_center_diamond_images/A1/BE1D54_Claw Prong_Oval_white_carat_225.jpg"}], "Pear": [[0.33, 0.5, 0.75, 1.0, 1.25, 1.5, 2.0], {"0.33": "//image.brilliantearth.com/media/base_product_center_diamond_images/64/BE1D54_Claw Prong_Pear_white_carat_33.jpg", "0.5": "//image.brilliantearth.com/media/base_product_center_diamond_images/RL/BE1D54_Claw Prong_Pear_white_carat_50.jpg", "0.75": "//image.brilliantearth.com/media/base_product_center_diamond_images/UY/BE1D54_Claw Prong_Pear_white_carat_75.jpg", "1.0": "//image.brilliantearth.com/media/base_product_center_diamond_images/Y8/BE1D54_Claw Prong_Pear_white_carat_1.jpg", "1.25": "//image.brilliantearth.com/media/base_product_center_diamond_images/31/BE1D54_Claw Prong_Pear_white_carat_125.jpg", "1.5": "//image.brilliantearth.com/media/base_product_center_diamond_images/EK/BE1D54_Claw Prong_Pear_white_carat_150.jpg", "2.0": "//image.brilliantearth.com/media/base_product_center_diamond_images/QA/BE1D54_Claw Prong_Pear_white_carat_2.jpg"}], "Princess": [[0.33, 0.5, 0.75, 1.0, 1.25, 1.5, 2.0], {"0.33": "//image.brilliantearth.com/media/base_product_center_diamond_images/49/BE1D54_Claw Prong_Princess_white_carat_33.jpg", "0.5": "//image.brilliantearth.com/media/base_product_center_diamond_images/N0/BE1D54_Claw Prong_Princess_white_carat_50.jpg", "0.75": "//image.brilliantearth.com/media/base_product_center_diamond_images/OA/BE1D54_Claw Prong_Princess_white_carat_75.jpg", "1.0": "//image.brilliantearth.com/media/base_product_center_diamond_images/4V/BE1D54_Claw Prong_Princess_white_carat_1.jpg", "1.25": "//image.brilliantearth.com/media/base_product_center_diamond_images/24/BE1D54_Claw Prong_Princess_white_carat_125.jpg", "1.5": "//image.brilliantearth.com/media/base_product_center_diamond_images/ZO/BE1D54_Claw Prong_Princess_white_carat_150.jpg", "2.0": "//image.brilliantearth.com/media/base_product_center_diamond_images/XO/BE1D54_Claw Prong_Princess_white_carat_2.jpg"}], "Radiant": [[0.33, 0.5, 0.75, 1.0, 1.25, 1.5, 2.0], {"0.33": "//image.brilliantearth.com/media/base_product_center_diamond_images/UD/BE1D54_Claw Prong_Radiant_white_carat_33.jpg", "0.5": "//image.brilliantearth.com/media/base_product_center_diamond_images/0Y/BE1D54_Claw Prong_Radiant_white_carat_50.jpg", "0.75": "//image.brilliantearth.com/media/base_product_center_diamond_images/6O/BE1D54_Claw Prong_Radiant_white_carat_75.jpg", "1.0": "//image.brilliantearth.com/media/base_product_center_diamond_images/G0/BE1D54_Claw Prong_Radiant_white_carat_1.jpg", "1.25": "//image.brilliantearth.com/media/base_product_center_diamond_images/KA/BE1D54_Claw Prong_Radiant_white_carat_125.jpg", "1.5": "//image.brilliantearth.com/media/base_product_center_diamond_images/FZ/BE1D54_Claw Prong_Radiant_white_carat_150.jpg", "2.0": "//image.brilliantearth.com/media/base_product_center_diamond_images/R7/BE1D54_Claw Prong_Radiant_white_carat_2.jpg"}], "Round": [[0.33, 0.5, 0.75, 1.0, 1.25, 1.5, 2.0, 2.75], {"0.33": "//image.brilliantearth.com/media/base_product_center_diamond_images/6S/BE1D54_Claw Prong_Round_white_carat_33.jpg", "0.5": "//image.brilliantearth.com/media/base_product_center_diamond_images/1F/BE1D54_Claw Prong_Round_white_carat_50.jpg", "0.75": "//image.brilliantearth.com/media/base_product_center_diamond_images/OR/BE1D54_Claw Prong_Round_white_carat_75.jpg", "1.0": "//image.brilliantearth.com/media/base_product_center_diamond_images/80/BE1D54_Claw Prong_Round_white_carat_1.jpg", "1.25": "//image.brilliantearth.com/media/base_product_center_diamond_images/2B/BE1D54_Claw Prong_Round_white_carat_125.jpg", "1.5": "//image.brilliantearth.com/media/base_product_center_diamond_images/3B/BE1D54_Claw Prong_Round_white_carat_150.jpg", "2.0": "//image.brilliantearth.com/media/base_product_center_diamond_images/58/BE1D54_Claw Prong_Round_white_carat_2.jpg", "2.75": "//image.brilliantearth.com/media/base_product_center_diamond_images/WL/BE1D54_Claw Prong_Round_white_carat_275.jpg"}]};
    

    
      hand_skin_tone_set = {"Asscher": {"0.5": {"zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/DX/BE1D54_Claw Prong_Asscher_white_carat_50_hd_zo.png", "zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/YA/BE1D54_Claw Prong_Asscher_white_carat_50_hd_zi.png"}, "2": {"zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/3W/BE1D54_Claw Prong_Asscher_white_carat_2_hd_zi.png", "zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/SH/BE1D54_Claw Prong_Asscher_white_carat_2_hd_zo.png"}, "1": {"zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/SF/BE1D54_Claw Prong_Asscher_white_carat_1_hd_zo.png", "zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/WO/BE1D54_Claw Prong_Asscher_white_carat_1_hd_zi.png"}, "1.25": {"zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/2I/BE1D54_Claw Prong_Asscher_white_carat_125_hd_zo.png", "zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/JM/BE1D54_Claw Prong_Asscher_white_carat_125_hd_zi.png"}, "1.5": {"zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/0B/BE1D54_Claw Prong_Asscher_white_carat_150_hd_zi.png", "zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/3L/BE1D54_Claw Prong_Asscher_white_carat_150_hd_zo.png"}, "0.33": {"zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/CI/BE1D54_Claw Prong_Asscher_white_carat_33_hd_zi.png", "zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/DM/BE1D54_Claw Prong_Asscher_white_carat_33_hd_zo.png"}, "0.75": {"zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/HQ/BE1D54_Claw Prong_Asscher_white_carat_75_hd_zo.png", "zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/M8/BE1D54_Claw Prong_Asscher_white_carat_75_hd_zi.png"}}, "Cushion": {"4": {"zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/PG/BE1D54_Claw Prong_Cushion_white_carat_4_hd_zo.png", "zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/WG/BE1D54_Claw Prong_Cushion_white_carat_4_hd_zi.png"}, "1.5": {"zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/W9/BE1D54_Claw Prong_Cushion_white_carat_150_hd_zo.png", "zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/5F/BE1D54_Claw Prong_Cushion_white_carat_150_hd_zi.png"}, "1": {"zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/G9/BE1D54_Claw Prong_Cushion_white_carat_1_hd_zi.png", "zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/ET/BE1D54_Claw Prong_Cushion_white_carat_1_hd_zo.png"}, "0.5": {"zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/3M/BE1D54_Claw Prong_Cushion_white_carat_50_hd_zi.png", "zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/8J/BE1D54_Claw Prong_Cushion_white_carat_50_hd_zo.png"}, "0.75": {"zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/60/BE1D54_Claw Prong_Cushion_white_carat_75_hd_zi.png", "zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/NM/BE1D54_Claw Prong_Cushion_white_carat_75_hd_zo.png"}, "2.75": {"zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/54/BE1D54_Claw Prong_Cushion_white_carat_275_hd_zo.png", "zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/FV/BE1D54_Claw Prong_Cushion_white_carat_275_hd_zi.png"}, "2": {"zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/QN/BE1D54_Claw Prong_Cushion_white_carat_2_hd_zo.png", "zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/IG/BE1D54_Claw Prong_Cushion_white_carat_2_hd_zi.png"}, "1.25": {"zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/SF/BE1D54_Claw Prong_Cushion_white_carat_125_hd_zi.png", "zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/4K/BE1D54_Claw Prong_Cushion_white_carat_125_hd_zo.png"}, "0.33": {"zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/E7/BE1D54_Claw Prong_Cushion_white_carat_33_hd_zo.png", "zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/BM/BE1D54_Claw Prong_Cushion_white_carat_33_hd_zi.png"}}, "Emerald": {"1": {"zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/H1/BE1D54_Claw Prong_Emerald_white_carat_1_hd_zi.png", "zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/KJ/BE1D54_Claw Prong_Emerald_white_carat_1_hd_zo.png"}, "1.25": {"zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/K7/BE1D54_Claw Prong_Emerald_white_carat_125_hd_zi.png", "zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/9F/BE1D54_Claw Prong_Emerald_white_carat_125_hd_zo.png"}, "1.5": {"zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/Z5/BE1D54_Claw Prong_Emerald_white_carat_150_hd_zo.png", "zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/QJ/BE1D54_Claw Prong_Emerald_white_carat_150_hd_zi.png"}, "0.75": {"zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/JU/BE1D54_Claw Prong_Emerald_white_carat_75_hd_zi.png", "zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/7M/BE1D54_Claw Prong_Emerald_white_carat_75_hd_zo.png"}, "0.5": {"zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/KD/BE1D54_Claw Prong_Emerald_white_carat_50_hd_zi.png", "zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/S9/BE1D54_Claw Prong_Emerald_white_carat_50_hd_zo.png"}, "0.33": {"zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/AG/BE1D54_Claw Prong_Emerald_white_carat_33_hd_zi.png", "zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/CE/BE1D54_Claw Prong_Emerald_white_carat_33_hd_zo.png"}, "2": {"zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/KB/BE1D54_Claw Prong_Emerald_white_carat_2_hd_zo.png", "zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/AM/BE1D54_Claw Prong_Emerald_white_carat_2_hd_zi.png"}}, "Heart": {"0.5": {"zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/YF/BE1D54_Claw Prong_Heart_white_carat_50_hd_zo.png", "zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/8T/BE1D54_Claw Prong_Heart_white_carat_50_hd_zi.png"}, "1.25": {"zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/Z1/BE1D54_Claw Prong_Heart_white_carat_125_hd_zi.png", "zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/DF/BE1D54_Claw Prong_Heart_white_carat_125_hd_zo.png"}, "1": {"zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/CD/BE1D54_Claw Prong_Heart_white_carat_1_hd_zi.png", "zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/CI/BE1D54_Claw Prong_Heart_white_carat_1_hd_zo.png"}, "0.33": {"zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/VN/BE1D54_Claw Prong_Heart_white_carat_33_hd_zo.png", "zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/8G/BE1D54_Claw Prong_Heart_white_carat_33_hd_zi.png"}, "2": {"zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/D5/BE1D54_Claw Prong_Heart_white_carat_2_hd_zi.png", "zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/ZD/BE1D54_Claw Prong_Heart_white_carat_2_hd_zo.png"}, "0.75": {"zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/SN/BE1D54_Claw Prong_Heart_white_carat_75_hd_zi.png", "zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/KB/BE1D54_Claw Prong_Heart_white_carat_75_hd_zo.png"}, "1.5": {"zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/SJ/BE1D54_Claw Prong_Heart_white_carat_150_hd_zi.png", "zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/Q3/BE1D54_Claw Prong_Heart_white_carat_150_hd_zo.png"}}, "Marquise": {"2": {"zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/5Z/BE1D54_Claw Prong_Marquise_white_carat_2_hd_zo.png", "zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/0U/BE1D54_Claw Prong_Marquise_white_carat_2_hd_zi.png"}, "0.5": {"zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/QO/BE1D54_Claw Prong_Marquise_white_carat_50_hd_zi.png", "zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/PV/BE1D54_Claw Prong_Marquise_white_carat_50_hd_zo.png"}, "1.25": {"zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/7K/BE1D54_Claw Prong_Marquise_white_carat_125_hd_zi.png", "zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/0U/BE1D54_Claw Prong_Marquise_white_carat_125_hd_zo.png"}, "0.75": {"zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/4U/BE1D54_Claw Prong_Marquise_white_carat_75_hd_zi.png", "zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/BG/BE1D54_Claw Prong_Marquise_white_carat_75_hd_zo.png"}, "1": {"zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/AR/BE1D54_Claw Prong_Marquise_white_carat_1_hd_zo.png", "zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/XV/BE1D54_Claw Prong_Marquise_white_carat_1_hd_zi.png"}, "0.33": {"zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/CL/BE1D54_Claw Prong_Marquise_white_carat_33_hd_zi.png", "zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/JW/BE1D54_Claw Prong_Marquise_white_carat_33_hd_zo.png"}, "1.5": {"zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/76/BE1D54_Claw Prong_Marquise_white_carat_150_hd_zo.png", "zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/IC/BE1D54_Claw Prong_Marquise_white_carat_150_hd_zi.png"}}, "Oval": {"2.25": {"zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/VB/BE1D54_Claw Prong_Oval_white_carat_225_hd_zi.png", "zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/UW/BE1D54_Claw Prong_Oval_white_carat_225_hd_zo.png"}, "0.33": {"zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/PW/BE1D54_Claw Prong_Oval_white_carat_33_hd_zo.png", "zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/K0/BE1D54_Claw Prong_Oval_white_carat_33_hd_zi.png"}, "0.5": {"zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/FU/BE1D54_Claw Prong_Oval_white_carat_50_hd_zo.png", "zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/LW/BE1D54_Claw Prong_Oval_white_carat_50_hd_zi.png"}, "1.25": {"zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/1Q/BE1D54_Claw Prong_Oval_white_carat_125_hd_zi.png", "zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/V9/BE1D54_Claw Prong_Oval_white_carat_125_hd_zo.png"}, "2": {"zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/CS/BE1D54_Claw Prong_Oval_white_carat_2_hd_zi.png", "zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/ZT/BE1D54_Claw Prong_Oval_white_carat_2_hd_zo.png"}, "1.5": {"zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/TD/BE1D54_Claw Prong_Oval_white_carat_150_hd_zi.png", "zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/9R/BE1D54_Claw Prong_Oval_white_carat_150_hd_zo.png"}, "1": {"zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/B6/BE1D54_Claw Prong_Oval_white_carat_1_hd_zi.png", "zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/9S/BE1D54_Claw Prong_Oval_white_carat_1_hd_zo.png"}, "0.75": {"zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/4T/BE1D54_Claw Prong_Oval_white_carat_75_hd_zi.png", "zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/KM/BE1D54_Claw Prong_Oval_white_carat_75_hd_zo.png"}}, "Pear": {"1.25": {"zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/YU/BE1D54_Claw Prong_Pear_white_carat_125_hd_zi.png", "zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/67/BE1D54_Claw Prong_Pear_white_carat_125_hd_zo.png"}, "0.33": {"zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/FI/BE1D54_Claw Prong_Pear_white_carat_33_hd_zo.png", "zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/UR/BE1D54_Claw Prong_Pear_white_carat_33_hd_zi.png"}, "1.5": {"zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/WP/BE1D54_Claw Prong_Pear_white_carat_150_hd_zi.png", "zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/S3/BE1D54_Claw Prong_Pear_white_carat_150_hd_zo.png"}, "1": {"zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/BT/BE1D54_Claw Prong_Pear_white_carat_1_hd_zo.png", "zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/3J/BE1D54_Claw Prong_Pear_white_carat_1_hd_zi.png"}, "2": {"zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/D3/BE1D54_Claw Prong_Pear_white_carat_2_hd_zi.png", "zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/SM/BE1D54_Claw Prong_Pear_white_carat_2_hd_zo.png"}, "0.5": {"zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/4S/BE1D54_Claw Prong_Pear_white_carat_50_hd_zi.png", "zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/47/BE1D54_Claw Prong_Pear_white_carat_50_hd_zo.png"}, "0.75": {"zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/9F/BE1D54_Claw Prong_Pear_white_carat_75_hd_zo.png", "zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/M8/BE1D54_Claw Prong_Pear_white_carat_75_hd_zi.png"}}, "Princess": {"0.5": {"zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/ZN/BE1D54_Claw Prong_Princess_white_carat_50_hd_zi.png", "zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/5D/BE1D54_Claw Prong_Princess_white_carat_50_hd_zo.png"}, "2": {"zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/54/BE1D54_Claw Prong_Princess_white_carat_2_hd_zi.png", "zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/WE/BE1D54_Claw Prong_Princess_white_carat_2_hd_zo.png"}, "0.33": {"zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/9M/BE1D54_Claw Prong_Princess_white_carat_33_hd_zo.png", "zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/TJ/BE1D54_Claw Prong_Princess_white_carat_33_hd_zi.png"}, "1.25": {"zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/PV/BE1D54_Claw Prong_Princess_white_carat_125_hd_zo.png", "zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/W9/BE1D54_Claw Prong_Princess_white_carat_125_hd_zi.png"}, "1": {"zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/S2/BE1D54_Claw Prong_Princess_white_carat_1_hd_zo.png", "zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/QZ/BE1D54_Claw Prong_Princess_white_carat_1_hd_zi.png"}, "0.75": {"zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/CA/BE1D54_Claw Prong_Princess_white_carat_75_hd_zo.png", "zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/I9/BE1D54_Claw Prong_Princess_white_carat_75_hd_zi.png"}, "1.5": {"zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/FO/BE1D54_Claw Prong_Princess_white_carat_150_hd_zo.png", "zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/G3/BE1D54_Claw Prong_Princess_white_carat_150_hd_zi.png"}}, "Radiant": {"1": {"zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/A5/BE1D54_Claw Prong_Radiant_white_carat_1_hd_zi.png", "zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/GT/BE1D54_Claw Prong_Radiant_white_carat_1_hd_zo.png"}, "0.5": {"zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/PD/BE1D54_Claw Prong_Radiant_white_carat_50_hd_zi.png", "zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/MS/BE1D54_Claw Prong_Radiant_white_carat_50_hd_zo.png"}, "1.5": {"zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/TS/BE1D54_Claw Prong_Radiant_white_carat_150_hd_zo.png", "zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/QF/BE1D54_Claw Prong_Radiant_white_carat_150_hd_zi.png"}, "0.33": {"zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/S0/BE1D54_Claw Prong_Radiant_white_carat_33_hd_zi.png", "zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/GX/BE1D54_Claw Prong_Radiant_white_carat_33_hd_zo.png"}, "1.25": {"zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/KR/BE1D54_Claw Prong_Radiant_white_carat_125_hd_zo.png", "zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/HF/BE1D54_Claw Prong_Radiant_white_carat_125_hd_zi.png"}, "2": {"zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/SX/BE1D54_Claw Prong_Radiant_white_carat_2_hd_zo.png", "zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/8O/BE1D54_Claw Prong_Radiant_white_carat_2_hd_zi.png"}, "0.75": {"zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/PW/BE1D54_Claw Prong_Radiant_white_carat_75_hd_zi.png", "zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/HS/BE1D54_Claw Prong_Radiant_white_carat_75_hd_zo.png"}}, "Round": {"1.25": {"zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/65/BE1D54_Claw Prong_Round_white_carat_125_hd_zo.png", "zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/QT/BE1D54_Claw Prong_Round_white_carat_125_hd_zi.png"}, "0.5": {"zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/LZ/BE1D54_Claw Prong_Round_white_carat_50_hd_zi.png", "zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/93/BE1D54_Claw Prong_Round_white_carat_50_hd_zo.png"}, "1.5": {"zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/5A/BE1D54_Claw Prong_Round_white_carat_150_hd_zi.png", "zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/NO/BE1D54_Claw Prong_Round_white_carat_150_hd_zo.png"}, "0.33": {"zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/ZY/BE1D54_Claw Prong_Round_white_carat_33_hd_zo.png", "zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/0A/BE1D54_Claw Prong_Round_white_carat_33_hd_zi.png"}, "0.75": {"zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/SG/BE1D54_Claw Prong_Round_white_carat_75_hd_zi.png", "zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/CG/BE1D54_Claw Prong_Round_white_carat_75_hd_zo.png"}, "1": {"zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/ZU/BE1D54_Claw Prong_Round_white_carat_1_hd_zi.png", "zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/ZH/BE1D54_Claw Prong_Round_white_carat_1_hd_zo.png"}, "2.75": {"zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/FI/BE1D54_Claw Prong_Round_white_carat_275_hd_zo.png", "zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/OZ/BE1D54_Claw Prong_Round_white_carat_275_hd_zi.png"}, "2": {"zi": "//image.brilliantearth.com/media/base_product_center_diamond_images/XA/BE1D54_Claw Prong_Round_white_carat_2_hd_zi.png", "zo": "//image.brilliantearth.com/media/base_product_center_diamond_images/EV/BE1D54_Claw Prong_Round_white_carat_2_hd_zo.png"}}};
    

    var hand_skin_tone_image_text = 'Shown <span style="text-transform:lowercase">with </span>' + 'Shown with 3/4 carat diamond'.replace('Shown with','').replace('Shown With','') + ' <span style="text-transform: lowercase">on</span> Size 6 Hand';

    
      hand_skin_tone = false;
    

    var current_caption = 'top_lg';

    var is_setting_video = false;
    
     var is_setting_video = true;
    
    var is_wistia_video = false;
</script>


  <script type="text/javascript">
    var pinch_zoom;
    $(function () {
      enable_zoom();
    });

    function enable_zoom(){
      if (is_touchable) {
        $('div.pinch-zoom').each(function () {
          if ($(this).parent('div').hasClass('carat-image')) {
            pinch_zoom = new RTP.PinchZoom($(this), {maxZoom: 2.833});
          } else {
            var $product_image_middle = $('#product_image_middle');
            var is_zoomable = $product_image_middle.data('zoomable') != 'False';
            if (is_zoomable){
              pinch_zoom = new RTP.PinchZoom($(this), {maxZoom: 2.833});
            }
          }
        });
      }
    }

    function disable_zoom(){
      if ($('.pinch-zoom-container').length > 0) {
        $('.pinch-zoom-container').each(function () {
          $(this).replaceWith($(this).find('.pinch-zoom').removeAttr("style"));
        });
      }
    }
  </script>


<div class="col-md-7 clearfix preview pb-20 pb-xs-0">
  <div id="jCarouselLiteDemo" class="clearfix" role="region" data-acsb-carousel="true" data-acsb-force-visible="true" aria-label="Carousel">
    <div id="id-carousel-thumb" class="jCarouselLiteDemo-body" style="position: relative;" data-shape="Round">
      <div class="position-relative ir309-product-images">
        
          
            <div id="thumb-a1" class="top_lg" data-toggle="zoom-all">
            
              <img class="img-responsive" src="//image.brilliantearth.com/media/base_product_center_diamond_images/OR/BE1D54_Claw Prong_Round_white_carat_75.jpg" style="margin-left: auto; margin-right:auto; margin-bottom:20px;" alt="Round Twisted Engagement Ring ">

            </div>
            
              <p class="ir218-image-text text-beautiful text-center image-text" id="top_lg_text" style="height:25px;">Shown <span style="text-transform:lowercase">with</span> 3/4 Carat Diamond</p>
            
          
        
          
            <div id="thumb-a2" class="side_lg hidden" data-toggle="zoom-all" style="" aria-hidden="true" data-acsb-hidden="true">
            
              <img class="img-responsive" src="//image.brilliantearth.com/media/product_images/8D/BE1D54_round_white_side.jpg" style="margin-left: auto; margin-right:auto; margin-bottom:20px;" alt="18K White Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.), large side view">

            </div>
            
          
        
          
        
          
        
          
        
          
        
        
        
        
          
        
          
        
          
        
          
        
          
        
          
        
          
        
        
          <div id="thumb-f" class="ring-on-hand skin-tone-image hidden" data-toggle="zoom-all" style="margin: 0px auto; z-index: 99;" aria-hidden="true" data-acsb-hidden="true">
            <div class="ring-on-hand-inner pinch-zoom">
              
                
                  <img src="https://css.brilliantearth.com/static/img/handskin/female_hand_visualizer_zo_light_updated.jpg" class="light_base_hand img-responsive" alt="Persons left hand with white nail polish">
                  <img src="https://css.brilliantearth.com/static/img/handskin/female_hand_visualizer_zo_dark_updated.jpg" class="dark_base_hand img-responsive" style="opacity: 0.26;" alt="Persons left hand with white manicure">
                  <img src="https://css.brilliantearth.com/static/img/handskin/female_hand_visualizer_zo_dark2_updated.jpg" class="dark_base2_hand img-responsive" style="opacity: 0;" alt="Persons left hand with white background">
                
                <img src="//image.brilliantearth.com/media/base_product_center_diamond_images/CG/BE1D54_Claw Prong_Round_white_carat_75_hd_zo.png" class="hand_ring_overlay img-responsive" alt="Be1d54_claw prong_round_white_carat_75_hd_zo" role="presentation">
              
            </div>
          </div>
          <div class="mt-15 hidden" aria-hidden="true" data-acsb-hidden="true">
            <p class="ir218-image-text text-beautiful text-center image-text" id="hand_skin_tone_text" style="height:25px;">Shown <span style="text-transform:lowercase">with</span> 3/4 Carat Diamond</p>
          </div>
          
            
              <div class="diamond-shape-select hidden" id="skin_tone_slider" style="height:50px;" aria-hidden="true" data-acsb-hidden="true">
                <div class="noUiSlider-zoom-pannel">
                    <div class="noUiSlider noUi-target noUi-ltr noUi-horizontal noUi-background" id="noUiSlider-discolour" onchange="track_event('Product Detail Page','CYO Rings','Setting|Diamond|Hand Tone|Interaction',true)">
                    <div class="noUi-base"><div class="noUi-origin" style="left: 25%;"><div class="noUi-handle noUi-handle-lower" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button"></div></div></div></div>
                </div>
              </div>
            
          
        
        
          
            <div id="thumb-video" class="hidden" style="background: none;" aria-hidden="true" data-acsb-hidden="true">
              <div style="height: 0; padding-bottom: 100%; position: relative;margin:0 auto 20px;">
                <iframe title="product video" src="//embed.imajize.com/9054220?v=1625471808" style="position: absolute; left: 0; top: 0;" scrolling="no" frameborder="0" height="454.266" width="454.266" aria-hidden="true" data-acsb-hidden="true"></iframe>
              </div>
            </div>
          
          <div class="mt-15 hidden" id="video_text" aria-hidden="true" data-acsb-hidden="true">
            <p class="ir218-image-text text-beautiful text-center" id="360_video_text" style="height:25px;">Interactive Video – Drag <span style="text-transform:lowercase">to</span> Rotate</p>
          </div>
        
        
          
        
          
        
          
            <div id="thumb-h3" class="hidden" data-toggle="zoom-all" style="" aria-hidden="true" data-acsb-hidden="true">
              <img class="img-responsive" src="//image.brilliantearth.com/media/product_images/4A/BE1D54_white_additional1.jpg" style="margin-left: auto; margin-right:auto; margin-bottom:20px;" alt="18K White Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.), large additional view 1">
            </div>
          
        
          
            <div id="thumb-h4" class="hidden" data-toggle="zoom-all" style="" aria-hidden="true" data-acsb-hidden="true">
              <img class="img-responsive" src="//image.brilliantearth.com/media/product_images/JT/BE1D54_white_additional2.jpg" style="margin-left: auto; margin-right:auto; margin-bottom:20px;" alt="18K White Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.), large additional view 2">
            </div>
          
        
          
            <div id="thumb-h5" class="hidden" data-toggle="zoom-all" style="" aria-hidden="true" data-acsb-hidden="true">
              <img class="img-responsive" src="//image.brilliantearth.com/media/product_images/HJ/BE1D54_additional3.jpg" style="margin-left: auto; margin-right:auto; margin-bottom:20px;" alt="18K White Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.), large additional view 3">
            </div>
          
        
          
        
          
        
        
      <div class="zoom-box" style="height: 502px; width: 502px; display: none;" aria-hidden="true" data-acsb-hidden="true" data-acsb-overflower="true"><div class="inner"><div id="thumb-a1" class="top_lg zoom-all-cloned" data-toggle="zoom-all">
            
              <img class="" src="//image.brilliantearth.com/media/base_product_center_diamond_images/OR/BE1D54_Claw Prong_Round_white_carat_75.jpg" style="margin-left: auto; margin-right: auto; margin-bottom: 20px; position: absolute; left: -32.6063%; top: 0%;" alt="Round Twisted Engagement Ring ">

            </div></div></div><div class="zoom-glass" style="top: 187.063px; left: 87.1329px; width: 269.215px; height: 269.215px; display: none;" aria-hidden="true" data-acsb-hidden="true"></div><div class="zoom-box" style="height: 502px; width: 502px; display: none;" aria-hidden="true" data-acsb-hidden="true"><div class="inner"><div id="thumb-a2" class="side_lg hidden zoom-all-cloned" data-toggle="zoom-all" style="" aria-hidden="true" data-acsb-hidden="true">
            
              <img class="" src="//image.brilliantearth.com/media/product_images/8D/BE1D54_round_white_side.jpg" style="margin-left: auto; margin-right: auto; margin-bottom: 20px; position: absolute;" alt="18K White Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.), large side view">

            </div></div></div><div class="zoom-glass" style="display: none;" aria-hidden="true" data-acsb-hidden="true"></div><div class="zoom-box" style="height: 502px; width: 502px; display: none;" aria-hidden="true" data-acsb-hidden="true"><div class="inner"><div id="thumb-f" class="ring-on-hand skin-tone-image hidden zoom-all-cloned" data-toggle="zoom-all" style="margin: 0px auto; z-index: 99;" aria-hidden="true" data-acsb-hidden="true">
            <div class="ring-on-hand-inner pinch-zoom">
              
                
                  <img src="https://css.brilliantearth.com/static/img/handskin/female_hand_visualizer_zo_light_updated.jpg" class="light_base_hand" alt="Persons left hand with white nail polish" style="position: absolute;">
                  <img src="https://css.brilliantearth.com/static/img/handskin/female_hand_visualizer_zo_dark_updated.jpg" class="dark_base_hand" style="opacity: 0.26; position: absolute;" alt="Persons left hand with white manicure">
                  <img src="https://css.brilliantearth.com/static/img/handskin/female_hand_visualizer_zo_dark2_updated.jpg" class="dark_base2_hand" style="opacity: 0; position: absolute;" alt="Persons left hand with white background">
                
                <img src="//image.brilliantearth.com/media/base_product_center_diamond_images/CG/BE1D54_Claw Prong_Round_white_carat_75_hd_zo.png" class="hand_ring_overlay" alt="Be1d54_claw prong_round_white_carat_75_hd_zo" role="presentation" style="position: absolute;">
              
            </div>
          </div></div></div><div class="zoom-glass" style="display: none;" aria-hidden="true" data-acsb-hidden="true"></div><div class="zoom-box" style="height: 502px; width: 502px; display: none;" aria-hidden="true" data-acsb-hidden="true"><div class="inner"><div id="thumb-h3" class="hidden zoom-all-cloned" data-toggle="zoom-all" style="" aria-hidden="true" data-acsb-hidden="true">
              <img class="" src="//image.brilliantearth.com/media/product_images/4A/BE1D54_white_additional1.jpg" style="margin-left: auto; margin-right: auto; margin-bottom: 20px; position: absolute;" alt="18K White Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.), large additional view 1">
            </div></div></div><div class="zoom-glass" style="display: none;" aria-hidden="true" data-acsb-hidden="true"></div><div class="zoom-box" style="height: 502px; width: 502px; display: none;" aria-hidden="true" data-acsb-hidden="true"><div class="inner"><div id="thumb-h4" class="hidden zoom-all-cloned" data-toggle="zoom-all" style="" aria-hidden="true" data-acsb-hidden="true">
              <img class="" src="//image.brilliantearth.com/media/product_images/JT/BE1D54_white_additional2.jpg" style="margin-left: auto; margin-right: auto; margin-bottom: 20px; position: absolute;" alt="18K White Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.), large additional view 2">
            </div></div></div><div class="zoom-glass" style="display: none;" aria-hidden="true" data-acsb-hidden="true"></div><div class="zoom-box" style="height: 502px; width: 502px; display: none;" aria-hidden="true" data-acsb-hidden="true"><div class="inner"><div id="thumb-h5" class="hidden zoom-all-cloned" data-toggle="zoom-all" style="" aria-hidden="true" data-acsb-hidden="true">
              <img class="" src="//image.brilliantearth.com/media/product_images/HJ/BE1D54_additional3.jpg" style="margin-left: auto; margin-right: auto; margin-bottom: 20px; position: absolute;" alt="18K White Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.), large additional view 3">
            </div></div></div><div class="zoom-glass" style="display: none;" aria-hidden="true" data-acsb-hidden="true"></div></div>
    </div>

    <div style="position: relative;" class="position-relative ir309-product-images" aria-hidden="true" data-acsb-hidden="true">
      
        
  
  
  
  

  <style type="text/css">
    .ir234-pdp-UGC { top: 0;}
    .ir234-pdp-UGC .slick-list { width: 300px; height: 300px; margin: 0 auto;}
    .ir234-pdp-UGC .slicker-data>ul { max-width: 460px;}
    .ir234-pdp-UGC .slicker-data .data-lists li { width: 16%;}
    .ir234-pdp-UGC .slick-list .c, .ir234-pdp-UGC .slick-list .c1, .ir234-pdp-UGC .slick-list .c2, .ir234-pdp-UGC .slick-list:before, .ir234-pdp-UGC .slick-list:after { display: none;}
    .ir234-lookbook h2 span { font-size: 15px; line-height: 12px; letter-spacing: 0.2px;}
    .ir234-pdp-UGC .slicker-data .data-lists li{color: #333;}
    .ir234-pdp-UGC .slick-prev{left: 60px;}
    .ir234-pdp-UGC .slick-next{right: 60px;}
    .ir234-pdp-UGC .slicker-data .data-lists{ border-top: 1px solid #333; display: -webkit-box; display: -webkit-flex; display: -ms-flexbox; display: flex; justify-content: center;}
    @media (max-width: 767px) {
      .ir234-pdp-UGC { display: none;}
      .ir234-lookbook h2 span { line-height: 18px;}
    }
    @media (min-width: 768px) {
      .ir234-customer-reviews { background: #f2f2f2;}
    }
  </style>
  <div class="ir234-pdp-UGC slick-container" style="width: 100%; position: absolute; visibility: hidden; z-index: 99">
    <div class="slider variable-width slick-initialized slick-slider">
      
        <div class="slick-list" style="padding: 0px 50px;"><div class="slick-track" style="opacity: 1; width: 100000px; transform: translate3d(-1250px, 0px, 0px);"><div class="slick-slide slick-cloned" data-slick-index="-4" id=""><img width="300" height="300" class="img-responsive slick-loading" alt="Platinum Petite Twisted Vine Diamond Ring (1/8 ct. tw.)" data-lazy="//image.brilliantearth.com/media/cache/a7/7b/a77b4a1e283c0b11901e5fd7f0c5af55.jpg" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Recently Purchased Carousel|Select" data-noninteract="true"></div><div class="slick-slide slick-cloned" data-slick-index="-3" id=""><img width="300" height="300" class="img-responsive slick-loading" alt="Platinum Petite Twisted Vine Diamond Ring (1/8 ct. tw.)" data-lazy="//image.brilliantearth.com/media/cache/a2/0b/a20b8d8d30f91605b0e310f04db7c25e.jpg" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Recently Purchased Carousel|Select" data-noninteract="true"></div><div class="slick-slide slick-cloned" data-slick-index="-2" id=""><img width="300" height="300" class="img-responsive" alt="18K White Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Recently Purchased Carousel|Select" data-noninteract="true" src="//image.brilliantearth.com/media/cache/59/d7/59d72c5911d9f2b4fb78e357c72b93f9.jpg" style="opacity: 1;"></div><div class="slick-slide slick-cloned slick-active" data-slick-index="-1" id=""><img width="300" height="300" class="img-responsive" alt="18K Yellow Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Recently Purchased Carousel|Select" data-noninteract="true" src="//image.brilliantearth.com/media/cache/76/ae/76ae167c5fce1d8b2b07a1fb7a9678a1.jpg" style="opacity: 1;"></div><div class="slick-slide slick-active slick-center" data-slick-index="0"><img width="300" height="300" class="img-responsive" alt="Platinum Petite Twisted Vine Diamond Ring (1/8 ct. tw.)" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Recently Purchased Carousel|Select" data-noninteract="true" src="//image.brilliantearth.com/media/cache/3e/61/3e61e55653b5a0f01daabaf576ecb15c.jpg" style="opacity: 1;"></div><div class="slick-slide slick-active" data-slick-index="1"><img width="300" height="300" class="img-responsive" alt="Platinum Petite Twisted Vine Diamond Ring (1/8 ct. tw.)" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Recently Purchased Carousel|Select" data-noninteract="true" src="//image.brilliantearth.com/media/cache/23/97/2397b5a3e68f3cf9c67a17381f3d0f46.jpg" style="opacity: 1;"></div><div class="slick-slide" data-slick-index="2"><img width="300" height="300" class="img-responsive" alt="18K White Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Recently Purchased Carousel|Select" data-noninteract="true" src="//image.brilliantearth.com/media/cache/a7/90/a790177230c870169261f909d653434a.jpg" style="opacity: 1;"></div><div class="slick-slide" data-slick-index="3"><img width="300" height="300" class="img-responsive slick-loading" alt="18K White Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)" data-lazy="//image.brilliantearth.com/media/cache/8e/61/8e610bfbcce47ad9a059e7bc3aadb2bb.jpg" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Recently Purchased Carousel|Select" data-noninteract="true"></div><div class="slick-slide" data-slick-index="4"><img width="300" height="300" class="img-responsive slick-loading" alt="18K White Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)" data-lazy="//image.brilliantearth.com/media/cache/0e/cf/0ecf0f779a88bddb7ebc48869404b6b0.jpg" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Recently Purchased Carousel|Select" data-noninteract="true"></div><div class="slick-slide" data-slick-index="5"><img width="300" height="300" class="img-responsive slick-loading" alt="14K Rose Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)" data-lazy="//image.brilliantearth.com/media/cache/d0/38/d038c12c015dd073eeac0b30d7cca963.jpg" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Recently Purchased Carousel|Select" data-noninteract="true"></div><div class="slick-slide" data-slick-index="6"><img width="300" height="300" class="img-responsive slick-loading" alt="18K White Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)" data-lazy="//image.brilliantearth.com/media/cache/36/98/3698b09103e154658f824b472b7e7c5f.jpg" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Recently Purchased Carousel|Select" data-noninteract="true"></div><div class="slick-slide" data-slick-index="7"><img width="300" height="300" class="img-responsive slick-loading" alt="18K Yellow Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)" data-lazy="//image.brilliantearth.com/media/cache/0d/22/0d2224c74f58a666e9cda5d42e9841e7.jpg" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Recently Purchased Carousel|Select" data-noninteract="true"></div><div class="slick-slide" data-slick-index="8"><img width="300" height="300" class="img-responsive slick-loading" alt="18K White Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)" data-lazy="//image.brilliantearth.com/media/cache/51/89/518984ebf7b7947710947f3168bf145d.jpg" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Recently Purchased Carousel|Select" data-noninteract="true"></div><div class="slick-slide" data-slick-index="9"><img width="300" height="300" class="img-responsive slick-loading" alt="18K Yellow Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)" data-lazy="//image.brilliantearth.com/media/cache/5e/5a/5e5a30fc39d69a76dfb3c79560b2855b.jpg" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Recently Purchased Carousel|Select" data-noninteract="true"></div><div class="slick-slide" data-slick-index="10"><img width="300" height="300" class="img-responsive slick-loading" alt="18K Yellow Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)" data-lazy="//image.brilliantearth.com/media/cache/8c/fa/8cfa60b198e3456df4ef7d247cadb88d.jpg" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Recently Purchased Carousel|Select" data-noninteract="true"></div><div class="slick-slide" data-slick-index="11"><img width="300" height="300" class="img-responsive slick-loading" alt="18K White Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)" data-lazy="//image.brilliantearth.com/media/cache/f6/98/f698b809db50e8cc7f35706486415240.jpg" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Recently Purchased Carousel|Select" data-noninteract="true"></div><div class="slick-slide" data-slick-index="12"><img width="300" height="300" class="img-responsive slick-loading" alt="14K Rose Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)" data-lazy="//image.brilliantearth.com/media/cache/44/35/443503680b153e50b311d87c3bcb61c1.jpg" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Recently Purchased Carousel|Select" data-noninteract="true"></div><div class="slick-slide" data-slick-index="13"><img width="300" height="300" class="img-responsive slick-loading" alt="14K Rose Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)" data-lazy="//image.brilliantearth.com/media/cache/6d/6f/6d6f36c383c0e4847fc25582a51a96b4.jpg" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Recently Purchased Carousel|Select" data-noninteract="true"></div><div class="slick-slide" data-slick-index="14"><img width="300" height="300" class="img-responsive slick-loading" alt="18K White Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)" data-lazy="//image.brilliantearth.com/media/cache/fd/ce/fdceebed52ef67bfb6e1fac12d8fe2e7.jpg" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Recently Purchased Carousel|Select" data-noninteract="true"></div><div class="slick-slide" data-slick-index="15"><img width="300" height="300" class="img-responsive slick-loading" alt="18K White Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)" data-lazy="//image.brilliantearth.com/media/cache/88/d8/88d837a250d88883bfaedfb142803ad4.jpg" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Recently Purchased Carousel|Select" data-noninteract="true"></div><div class="slick-slide" data-slick-index="16"><img width="300" height="300" class="img-responsive slick-loading" alt="Platinum Petite Twisted Vine Diamond Ring (1/8 ct. tw.)" data-lazy="//image.brilliantearth.com/media/cache/a7/7b/a77b4a1e283c0b11901e5fd7f0c5af55.jpg" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Recently Purchased Carousel|Select" data-noninteract="true"></div><div class="slick-slide" data-slick-index="17"><img width="300" height="300" class="img-responsive slick-loading" alt="Platinum Petite Twisted Vine Diamond Ring (1/8 ct. tw.)" data-lazy="//image.brilliantearth.com/media/cache/a2/0b/a20b8d8d30f91605b0e310f04db7c25e.jpg" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Recently Purchased Carousel|Select" data-noninteract="true"></div><div class="slick-slide" data-slick-index="18"><img width="300" height="300" class="img-responsive slick-loading" alt="18K White Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)" data-lazy="//image.brilliantearth.com/media/cache/59/d7/59d72c5911d9f2b4fb78e357c72b93f9.jpg" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Recently Purchased Carousel|Select" data-noninteract="true"></div><div class="slick-slide" data-slick-index="19"><img width="300" height="300" class="img-responsive slick-loading" alt="18K Yellow Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)" data-lazy="//image.brilliantearth.com/media/cache/76/ae/76ae167c5fce1d8b2b07a1fb7a9678a1.jpg" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Recently Purchased Carousel|Select" data-noninteract="true"></div><div class="slick-slide slick-cloned slick-center" data-slick-index="20" id=""><img width="300" height="300" class="img-responsive slick-loading" alt="Platinum Petite Twisted Vine Diamond Ring (1/8 ct. tw.)" data-lazy="//image.brilliantearth.com/media/cache/3e/61/3e61e55653b5a0f01daabaf576ecb15c.jpg" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Recently Purchased Carousel|Select" data-noninteract="true"></div><div class="slick-slide slick-cloned" data-slick-index="21" id=""><img width="300" height="300" class="img-responsive" alt="Platinum Petite Twisted Vine Diamond Ring (1/8 ct. tw.)" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Recently Purchased Carousel|Select" data-noninteract="true" src="//image.brilliantearth.com/media/cache/23/97/2397b5a3e68f3cf9c67a17381f3d0f46.jpg" style="opacity: 1;"></div><div class="slick-slide slick-cloned" data-slick-index="22" id=""><img width="300" height="300" class="img-responsive" alt="18K White Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Recently Purchased Carousel|Select" data-noninteract="true" src="//image.brilliantearth.com/media/cache/a7/90/a790177230c870169261f909d653434a.jpg" style="opacity: 1;"></div><div class="slick-slide slick-cloned" data-slick-index="23" id=""><img width="300" height="300" class="img-responsive" alt="18K White Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.)" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Recently Purchased Carousel|Select" data-noninteract="true" src="//image.brilliantearth.com/media/cache/8e/61/8e610bfbcce47ad9a059e7bc3aadb2bb.jpg" style="opacity: 1;"></div></div><i class="c1" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true"></i><i class="c2" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true"></i><i class="c" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true"></i></div>
      
        
      
        
      
        
      
        
      
        
      
        
      
        
      
        
      
        
      
        
      
        
      
        
      
        
      
        
      
        
      
        
      
        
      
        
      
        
      
    <button type="button" data-role="none" class="slick-prev" aria-label="previous" style="" data-action="CYO Rings" data-label="Setting|Diamond|Recently Purchased Carousel|Prev" data-category="Product Detail Page" data-noninteract="true" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="-1" data-acsb-now-navigable="false" role="button">Previous</button><button type="button" data-role="none" class="slick-next" aria-label="next" style="" data-action="CYO Rings" data-label="Setting|Diamond|Recently Purchased Carousel|Next" data-category="Product Detail Page" data-noninteract="true" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="-1" data-acsb-now-navigable="false" role="button">Next</button></div>
    <div class="slicker-data">
      <ul>
        
          <li class="item active">
            <div class="sold">Customer-Created Rings <span style="text-transform: lowercase">with this</span> Setting Style (1 of 20)</div>
            <ul class="data-lists clearfix hhhhh">
              
                
                  <li><span>Metal</span>Platinum</li>
                
                
                  <li><span>Shape</span>Round</li>
                
                
                  <li><span>Carat</span>0.80</li>
                
                
                  <li><span>Color</span>H</li>
                
                
                  <li><span>Cut</span>Very Good</li>
                
                
                  <li><span>Clarity</span>VS2</li>
                
              
            </ul>
          </li>
        
          <li class="item ">
            <div class="sold">Customer-Created Rings <span style="text-transform: lowercase">with this</span> Setting Style (2 of 20)</div>
            <ul class="data-lists clearfix hhhhh">
              
                
                  <li><span>Metal</span>Platinum</li>
                
                
                  <li><span>Shape</span>Round</li>
                
                
                  <li><span>Carat</span>2.00</li>
                
                
                  <li><span>Color</span>G</li>
                
                
                  <li><span>Cut</span>Very Good</li>
                
                
                  <li><span>Clarity</span>VVS1</li>
                
              
            </ul>
          </li>
        
          <li class="item ">
            <div class="sold">Customer-Created Rings <span style="text-transform: lowercase">with this</span> Setting Style (3 of 20)</div>
            <ul class="data-lists clearfix hhhhh">
              
                
                  <li><span>Metal</span>18K White Gold</li>
                
                
                  <li><span>Shape</span>Round</li>
                
                
                  <li><span>Carat</span>0.72</li>
                
                
                  <li><span>Color</span>G</li>
                
                
                  <li><span>Cut</span>Ideal</li>
                
                
                  <li><span>Clarity</span>VS1</li>
                
              
            </ul>
          </li>
        
          <li class="item ">
            <div class="sold">Customer-Created Rings <span style="text-transform: lowercase">with this</span> Setting Style (4 of 20)</div>
            <ul class="data-lists clearfix hhhhh">
              
                
                  <li><span>Metal</span>18K White Gold</li>
                
                
                  <li><span>Shape</span>Pear</li>
                
                
                  <li><span>Carat</span>1.25</li>
                
                
                  <li><span>Color</span>J</li>
                
                
                  <li><span>Cut</span>Ideal</li>
                
                
                  <li><span>Clarity</span>VS1</li>
                
              
            </ul>
          </li>
        
          <li class="item ">
            <div class="sold">Customer-Created Rings <span style="text-transform: lowercase">with this</span> Setting Style (5 of 20)</div>
            <ul class="data-lists clearfix hhhhh">
              
                
                  <li><span>Metal</span>18K White Gold</li>
                
                
                  <li><span>Shape</span>Round</li>
                
                
                  <li><span>Carat</span>1.69</li>
                
                
                  <li><span>Color</span>E</li>
                
                
                  <li><span>Cut</span>Super Ideal</li>
                
                
                  <li><span>Clarity</span>VS1</li>
                
              
            </ul>
          </li>
        
          <li class="item ">
            <div class="sold">Customer-Created Rings <span style="text-transform: lowercase">with this</span> Setting Style (6 of 20)</div>
            <ul class="data-lists clearfix hhhhh">
              
                
                  <li><span>Metal</span>14K Rose Gold</li>
                
                
                  <li><span>Shape</span>Princess</li>
                
                
                  <li><span>Carat</span>2.30</li>
                
                
                  <li><span>Color</span>G</li>
                
                
                  <li><span>Cut</span>Super Ideal</li>
                
                
                  <li><span>Clarity</span>VS1</li>
                
              
            </ul>
          </li>
        
          <li class="item ">
            <div class="sold">Customer-Created Rings <span style="text-transform: lowercase">with this</span> Setting Style (7 of 20)</div>
            <ul class="data-lists clearfix hhhhh">
              
                
                  <li><span>Metal</span>18K White Gold</li>
                
                
                  <li><span>Shape</span>Radiant</li>
                
                
                  <li><span>Carat</span>2.29</li>
                
                
                  <li><span>Color</span>F</li>
                
                
                  <li><span>Cut</span>Very Good</li>
                
                
                  <li><span>Clarity</span>VVS2</li>
                
              
            </ul>
          </li>
        
          <li class="item ">
            <div class="sold">Customer-Created Rings <span style="text-transform: lowercase">with this</span> Setting Style (8 of 20)</div>
            <ul class="data-lists clearfix hhhhh">
              
                
                  <li><span>Metal</span>18K Yellow Gold</li>
                
                
                  <li><span>Shape</span>Round</li>
                
                
                  <li><span>Carat</span>1.27</li>
                
                
                  <li><span>Color</span>E</li>
                
                
                  <li><span>Cut</span>Super Ideal</li>
                
                
                  <li><span>Clarity</span>VVS2</li>
                
              
            </ul>
          </li>
        
          <li class="item ">
            <div class="sold">Customer-Created Rings <span style="text-transform: lowercase">with this</span> Setting Style (9 of 20)</div>
            <ul class="data-lists clearfix hhhhh">
              
                
                  <li><span>Metal</span>18K White Gold</li>
                
                
                  <li><span>Shape</span>Round</li>
                
                
                  <li><span>Carat</span>0.25</li>
                
                
                  <li><span>Color</span>D</li>
                
                
                  <li><span>Cut</span>Super Ideal</li>
                
                
                  <li><span>Clarity</span>VS1</li>
                
              
            </ul>
          </li>
        
          <li class="item ">
            <div class="sold">Customer-Created Rings <span style="text-transform: lowercase">with this</span> Setting Style (10 of 20)</div>
            <ul class="data-lists clearfix hhhhh">
              
                
                  <li><span>Metal</span>18K Yellow Gold</li>
                
                
                  <li><span>Shape</span>Pear</li>
                
                
                  <li><span>Carat</span>0.80</li>
                
                
                  <li><span>Color</span>G</li>
                
                
                  <li><span>Cut</span>Very Good</li>
                
                
                  <li><span>Clarity</span>SI1</li>
                
              
            </ul>
          </li>
        
          <li class="item ">
            <div class="sold">Customer-Created Rings <span style="text-transform: lowercase">with this</span> Setting Style (11 of 20)</div>
            <ul class="data-lists clearfix hhhhh">
              
                
                  <li><span>Metal</span>18K Yellow Gold</li>
                
                
                  <li><span>Shape</span>Marquise</li>
                
                
                  <li><span>Carat</span>1.00</li>
                
                
                  <li><span>Color</span>D</li>
                
                
                  <li><span>Cut</span>Ideal</li>
                
                
                  <li><span>Clarity</span>VS2</li>
                
              
            </ul>
          </li>
        
          <li class="item ">
            <div class="sold">Customer-Created Rings <span style="text-transform: lowercase">with this</span> Setting Style (12 of 20)</div>
            <ul class="data-lists clearfix hhhhh">
              
                
                  <li><span>Metal</span>18K White Gold</li>
                
                
                  <li><span>Shape</span>Round</li>
                
                
                  <li><span>Carat</span>0.80</li>
                
                
                  <li><span>Color</span>D</li>
                
                
                  <li><span>Cut</span>Ideal</li>
                
                
                  <li><span>Clarity</span>VVS2</li>
                
              
            </ul>
          </li>
        
          <li class="item ">
            <div class="sold">Customer-Created Rings <span style="text-transform: lowercase">with this</span> Setting Style (13 of 20)</div>
            <ul class="data-lists clearfix hhhhh">
              
                
                  <li><span>Metal</span>14K Rose Gold</li>
                
                
                  <li><span>Shape</span>Oval</li>
                
                
                  <li><span>Carat</span>2.00</li>
                
                
                  <li><span>Color</span>D</li>
                
                
                  <li><span>Cut</span>Super Ideal</li>
                
                
                  <li><span>Clarity</span>VS1</li>
                
              
            </ul>
          </li>
        
          <li class="item ">
            <div class="sold">Customer-Created Rings <span style="text-transform: lowercase">with this</span> Setting Style (14 of 20)</div>
            <ul class="data-lists clearfix hhhhh">
              
                
                  <li><span>Metal</span>14K Rose Gold</li>
                
                
                  <li><span>Shape</span>Round</li>
                
                
                  <li><span>Carat</span>0.30</li>
                
                
                  <li><span>Color</span>D</li>
                
                
                  <li><span>Cut</span>Very Good</li>
                
                
                  <li><span>Clarity</span>VS1</li>
                
              
            </ul>
          </li>
        
          <li class="item ">
            <div class="sold">Customer-Created Rings <span style="text-transform: lowercase">with this</span> Setting Style (15 of 20)</div>
            <ul class="data-lists clearfix hhhhh">
              
                
                  <li><span>Metal</span>18K White Gold</li>
                
                
                  <li><span>Shape</span>Pear</li>
                
                
                  <li><span>Carat</span>0.32</li>
                
                
                  <li><span>Color</span>E</li>
                
                
                  <li><span>Cut</span>Ideal</li>
                
                
                  <li><span>Clarity</span>VVS2</li>
                
              
            </ul>
          </li>
        
          <li class="item ">
            <div class="sold">Customer-Created Rings <span style="text-transform: lowercase">with this</span> Setting Style (16 of 20)</div>
            <ul class="data-lists clearfix hhhhh">
              
                
                  <li><span>Metal</span>18K White Gold</li>
                
                
                  <li><span>Shape</span>Pear</li>
                
                
                  <li><span>Carat</span>0.50</li>
                
                
                  <li><span>Color</span>I</li>
                
                
                  <li><span>Cut</span>Very Good</li>
                
                
                  <li><span>Clarity</span>VS2</li>
                
              
            </ul>
          </li>
        
          <li class="item ">
            <div class="sold">Customer-Created Rings <span style="text-transform: lowercase">with this</span> Setting Style (17 of 20)</div>
            <ul class="data-lists clearfix hhhhh">
              
                
                  <li><span>Metal</span>Platinum</li>
                
                
                  <li><span>Shape</span>Round</li>
                
                
                  <li><span>Carat</span>1.52</li>
                
                
                  <li><span>Color</span>D</li>
                
                
                  <li><span>Cut</span>Super Ideal</li>
                
                
                  <li><span>Clarity</span>VS1</li>
                
              
            </ul>
          </li>
        
          <li class="item ">
            <div class="sold">Customer-Created Rings <span style="text-transform: lowercase">with this</span> Setting Style (18 of 20)</div>
            <ul class="data-lists clearfix hhhhh">
              
                
                  <li><span>Metal</span>Platinum</li>
                
                
                  <li><span>Shape</span>Round</li>
                
                
                  <li><span>Carat</span>0.30</li>
                
                
                  <li><span>Color</span>G</li>
                
                
                  <li><span>Cut</span>Good</li>
                
                
                  <li><span>Clarity</span>VS1</li>
                
              
            </ul>
          </li>
        
          <li class="item ">
            <div class="sold">Customer-Created Rings <span style="text-transform: lowercase">with this</span> Setting Style (19 of 20)</div>
            <ul class="data-lists clearfix hhhhh">
              
                
                  <li><span>Metal</span>18K White Gold</li>
                
                
                  <li><span>Shape</span>Cushion</li>
                
                
                  <li><span>Carat</span>0.74</li>
                
                
                  <li><span>Color</span>G</li>
                
                
                  <li><span>Cut</span>Ideal</li>
                
                
                  <li><span>Clarity</span>VVS2</li>
                
              
            </ul>
          </li>
        
          <li class="item ">
            <div class="sold">Customer-Created Rings <span style="text-transform: lowercase">with this</span> Setting Style (20 of 20)</div>
            <ul class="data-lists clearfix hhhhh">
              
                
                  <li><span>Metal</span>18K Yellow Gold</li>
                
                
                  <li><span>Shape</span>Round</li>
                
                
                  <li><span>Carat</span>0.73</li>
                
                
                  <li><span>Color</span>G</li>
                
                
                  <li><span>Cut</span>Ideal</li>
                
                
                  <li><span>Clarity</span>VVS1</li>
                
              
            </ul>
          </li>
        
      </ul>
    </div>
  </div>



      
    </div>

    
       <div id="image_icon" class="vertical" style="position: relative;">
          
            
              <div class="carousel nonCircular" data-acsb-overflower="true">
                <button class="prev disabled" style="outline:none;" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" role="button"> &lt;&lt;</button>
                <div class="jCarouselLite" style="visibility: visible; overflow: hidden; position: relative; z-index: 2; left: 0px; height: 476px;" data-acsb-overflower="true">
                  <ul class="clearfix nav" id="product_thumb_images" style="margin: 0px; padding: 0px; position: relative; list-style: none; z-index: 1; height: 476px; top: 0px; display: inherit;">
                    
                      
                        
                          <li class="active" style="overflow: hidden; float: none; width: 58px; height: 58px;">
                            <a onclick="show_carat_image(); hide_diamond_video(); track_event('Product Detail Page','CYO Rings','Setting|Diamond|Product Detail Image Zoom|Top Image',true);" data-caption="top_lg" href="#thumb-a1" class="carat_thumb" data-acsb-overflower="true" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" data-acsb-hover="true">
                              <img src="//image.brilliantearth.com/media/cache/04/0a/040a1e61f5edc387d8c8e40d3ea0e0ca.jpg" width="64" height="64" alt="Round Twisted Engagement Ring ">
                            </a>
                          </li>
                        
                      
                    
                      
                        
                          <li style="overflow: hidden; float: none; width: 58px; height: 58px;">
                            <a onclick="hide_video();hide_diamond_video();track_event('Product Detail Page','CYO Rings','Setting|Diamond|Product Detail Image Zoom|Side Image',true);" data-caption="side_lg" rel="{gallery: 'gal1', smallimage: product_images.side_lg.lg, largeimage: product_images.side_lg.lg}" href="#thumb-a2" data-acsb-overflower="true" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" data-acsb-hover="true">
                              <img src="//image.brilliantearth.com/media/cache/89/e5/89e55645100d7976d20d764eccab2d34.jpg" width="64" height="64" data-zoomable="True" alt="18K White Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.), smallside view">
                            </a>
                          </li><li style="overflow: hidden; float: none; width: 58px; height: 58px;">
                        <a onclick="show_skin_tone();track_event('Product Detail Page','CYO Rings','Setting|Diamond|Product Detail Image Zoom|Hand Image Zo',true);" data-caption="trans-hd" href="#thumb-f" class="skin_tone_thumb hand_zo" data-acsb-overflower="true" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" data-acsb-hover="true">
                          <img src="//image.brilliantearth.com/media/cache/55/3c/553c7578c85a82e05b8404ffc6310d65.jpg" width="64" height="64" data-zoomable="" alt="553c7578c85a82e05b8404ffc6310d65" role="presentation">
                        </a>
                      </li><li style="overflow: hidden; float: none; width: 58px; height: 58px;">
                        <a id="product_video_thumb" onclick="hide_carat_image(); show_product_video(); hide_diamond_video(); remove_play_360_mobile_image(); track_event('Product Detail Page','CYO Rings','Setting|Diamond|Product Detail Image Zoom|360 Setting',true);" data-caption="Video" href="#thumb-video" data-acsb-overflower="true" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" data-acsb-hover="true">
                          
                          <img src="//css.brilliantearth.com/static/img/icon/360-Icon-v2.png" width="64" height="64" data-zoomable="" alt="360°">
                          
                        </a>
                      </li>
                        
                      
                    
                      
                    
                      
                    
                      
                    
                      
                    
                      
                    
                    
                      
                    
                      
                    
                      
                    
                      
                    
                      
                    
                      
                    
                      
                    
                    
                      
                    
                    
                      
                    
                    
                      
                    
                    
                    
                    
                      
                    
                      
                    
                      
                        <li style="overflow: hidden; float: none; width: 58px; height: 58px;">
                          <a onclick="hide_video();hide_diamond_video();track_event('Product Detail Page','CYO Rings','Setting|Diamond|Product Detail Image Zoom|Additional Image 1',true);" data-caption="add_img1" rel="{gallery: 'gal1', smallimage: product_images.add_img1.lg, largeimage: product_images.add_img1.lg}" href="#thumb-h3" data-acsb-overflower="true" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" data-acsb-hover="true">
                            <img src="//image.brilliantearth.com/media/cache/7d/52/7d520a66f8c4df64fedcd90f87dee733.jpg" width="64" height="64" data-zoomable="True" alt="18K White Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.), smalladditional view 1">
                          </a>
                        </li>
                      
                    
                      
                        <li style="overflow: hidden; float: none; width: 58px; height: 58px;">
                          <a onclick="hide_video();hide_diamond_video();track_event('Product Detail Page','CYO Rings','Setting|Diamond|Product Detail Image Zoom|Additional Image 2',true);" data-caption="add_img2" rel="{gallery: 'gal1', smallimage: product_images.add_img2.lg, largeimage: product_images.add_img2.lg}" href="#thumb-h4" data-acsb-overflower="true" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" data-acsb-hover="true">
                            <img src="//image.brilliantearth.com/media/cache/55/1a/551ab931962f79d5945ac9a5be09b49a.jpg" width="64" height="64" data-zoomable="True" alt="18K White Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.), smalladditional view 2">
                          </a>
                        </li>
                      
                    
                      
                        <li style="overflow: hidden; float: none; width: 58px; height: 58px;">
                          <a onclick="hide_video();hide_diamond_video();track_event('Product Detail Page','CYO Rings','Setting|Diamond|Product Detail Image Zoom|Additional Image 3',true);" data-caption="add_img3" rel="{gallery: 'gal1', smallimage: product_images.add_img3.lg, largeimage: product_images.add_img3.lg}" href="#thumb-h5" data-acsb-overflower="true" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" data-acsb-hover="true">
                            <img src="//image.brilliantearth.com/media/cache/84/53/8453d8c935d39697f9d4015192812062.jpg" width="64" height="64" data-zoomable="True" alt="18K White Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.), smalladditional view 3">
                          </a>
                        </li>
                      
                    
                      
                    
                      
                    
                    

                  </ul>
                </div>
                <button style="outline: none; visibility: hidden;" class="next" id="next" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="-1" data-acsb-now-navigable="false" aria-hidden="true" data-acsb-hidden="true" role="button">&gt;&gt;</button>
                <div class="clear" aria-hidden="true" data-acsb-hidden="true"></div>
              </div>

              
                
                  
                
                  
                
                  
                
                  
                
                  
                
                  
                
                  
                    <hr class="mb-10 mt10">
                    <div class="ir309-inspiration-gallery" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Product Detail Image Zoom|Recently Purchased" data-noninteract="true" href="javascript:void(0);" id="recently-purchased" data-acsb-overflower="true" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="0" data-acsb-now-navigable="true" role="button" data-acsb-textual-ops="enlarge">
                      <span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Enlarge " aria-hidden="false" data-acsb-hidden="false"></span><img class="img-responsive" src="//css.brilliantearth.com/static/img/icon/Recently-Purchased-v4.png" width="80" height="80" alt="Platinum Petite Twisted Vine Diamond Ring (1/8 ct. tw.)">
                    </div>
                  
                
              
            
          
    </div>
    

  </div>
</div>




<script>
 var purple_bar_badge = '';
 $(document).ready(function () {
      if(purple_bar_badge){
            $('.ir309-product-images > div:first').after($('<div class="pdp-purple-bar-badge">'+ purple_bar_badge +'</div>'));
        }

  $("#product_thumb_images").on("click", "li a", function () {
            var getId = $(this).attr('href');
            $(this).parent().siblings().removeClass('active')
            $(this).parent().addClass('active')
            $('#id-carousel-thumb .ir309-product-images > div:not('+getId+',.zoom-glass,.zoom-box,.pdp-purple-bar-badge)').addClass('hidden')
            $(getId).removeClass('hidden')
            $(getId).find('*').removeClass('hidden')
            $('#top_lg_text').addClass('hidden')
            if (getId === '#thumb-f'){
              $('.mt-15').removeClass('hidden')
              $('#hand_skin_tone_text').removeClass('hidden')
              $('#skin_tone_slider').removeClass('hidden')
              $('#skin_tone_slider').find('*').removeClass('hidden')
              $('#video_text').addClass('hidden')
            }
            else if (getId === '#thumb-video'){
              $('.mt-15').removeClass('hidden')
              $('#hand_skin_tone_text').addClass('hidden')
              $('#360_video_text').removeClass('hidden')
            }else if($(this).data('caption') === 'top_lg'){
                $('#top_lg_text').removeClass('hidden')
            }

            if(purple_bar_badge){
                if($(this).parent().prevAll().length > 0){
                  $('.pdp-purple-bar-badge').css('display', 'none')
              }else{
                  $('.pdp-purple-bar-badge').css('display', 'block')
              }
            }
            return false;  // remove the jump event | 去掉 a href 引起的页面跳动
        });
  $('#product_thumb_images li:first a').click();

  })
  if (hide_zi_or_zi_on_different_device) {
    if (is_pc) {
      //remove hand zi on pc
      $('.hand_zi').closest('li').remove();
      $("a[data-caption='ring_top_hd_zm']").closest('li').remove();
      $('#id-carousel-thumb .skin-tone-image-zm').remove();
    } else {
      //remove hand zo on mobile on tablet
      $('.hand_zo').closest('li').remove();
      $("a[data-caption='ring_top_hd']").closest('li').remove();
      $('#id-carousel-thumb .skin-tone-image').remove();
    }
  }

  

  
    if($('#product_video_thumb').length){
      $('#product_video_thumb').closest('li').remove().insertAfter($('#product_thumb_images li:nth-child(2)'));
      $('#diamond_video_thumb').closest('li').remove().insertAfter($('#product_video_thumb').closest('li'));

      if (hide_zi_or_zi_on_different_device && !is_pc) {
          // task 16706, move setting video to the last position in mobile/tablet
          
      }
    }

    if ($('.hand_zi').length||$('.hand_zo').length){
      var hand_zi_tag = $('.hand_zi');
      var hand_zo_tag = $('.hand_zo');
    }else{
      var hand_zi_tag = $("a[data-caption='ring_top_hd_zm']");
      var hand_zo_tag = $("a[data-caption='ring_top_hd']");
    }
    if(is_match_set||is_cyo_page_match_set){
      hand_zi_tag.closest('li').remove().insertAfter($('#product_thumb_images li:nth-child(1)'));
      hand_zo_tag.closest('li').remove().insertAfter($('#product_thumb_images li:nth-child(1)'));
    }else{
      hand_zi_tag.closest('li').remove().insertAfter($('#product_thumb_images li:nth-child(2)'));
      hand_zo_tag.closest('li').remove().insertAfter($('#product_thumb_images li:nth-child(2)'));
    }
  


  // Move recently purchased thumbnail to third position by JS.
  var thumb_image_count = $('#product_thumb_images li').not('.recently').length > 4 ? 4 : $('#product_thumb_images li').not('.recently').length;
  if ( thumb_image_count <= 4 ) {
    $('#recently-purchased').closest('li').remove().insertAfter($('#product_thumb_images li').last());
  }

  if ($('.ir234-pdp-UGC').length === 0) {
    $('#recently-purchased').closest('div').prev('.mb-10.mt10').remove();
    $('#recently-purchased').closest('div').remove();
  }

  $('#recently-purchased').click(function(){
    $(this).addClass('active');
    $('#try_on_this_ring').css('display', 'none');
    $('#pdp-vto-stacking-tigger').css('display', 'none');
    $('#setting_360_video_text').remove();
    $('#id-carousel-thumb').css('opacity', 0);
    $('#image_icon li.active').removeClass('active');
    // animate_scroll("#jCarouselLiteDemo", 500, true);
    if ((is_cyo_page || is_uncerted_preset_rings_page) && !is_purchase) {
      show_recent_purchase();
    } else{
      var scroll_height = $('#id_recently_purchased').parents('.purchase_list').offset().top - $('#new-navgation').height() - 50;
      $('html, body').animate({scrollTop:scroll_height}, 'slow');
      return false;
    }
  });
  // hide next icon if thumbnails is not enough.
  $(document).ready(function () {
    var thumb_cur = window.innerWidth ? window.innerWidth : $(document).width();
    var thumb_length = $('#product_thumb_images > li:visible').length;
    if (is_mobile){
      if (thumb_cur < 375) {
        if (thumb_length <= 4) {
          $('#next').css('visibility','hidden');
        }
      } else{
        if (thumb_length <= 5) {
            $('#next').css('visibility','hidden');
        }
      }
    }else{
      if (thumb_length <= 7) {
            $('#next').css('visibility','hidden');
      }
    }

    $('#id_diamond_shape_text').click(function () {
        if ($('#collapse-preview-diamond').hasClass('collapse')) {
            $('#id_diamond_shape_text').find('i').removeClass('icons-chevron-down-gray').addClass('icons-chevron-up-gray')
        } else {
            $('#id_diamond_shape_text').find('i').removeClass('icons-chevron-up-gray').addClass('icons-chevron-down-gray');
        }
    })
  });
</script>

<script type="text/javascript">
function update_link() {
    if ($('#add_cyoring').length > 0) {
        $('#link_popup').replaceWith($('#add_cyoring').clone());
    } else if ($('.choose_btn').length > 0) {
        $('#link_popup').replaceWith($('.choose_btn').eq(0).clone());
    } else {
        $('#link_popup').replaceWith($('#back_search').clone());
    }
}

$(function() {
    // get add setting link
    update_link();
    $('#ring_size').change(function(){
        update_link();
    });
})
</script>

<script type="text/javascript">

  /*jqzoom*/
  var cyo_page = 'True';
  $(document).ready(function() {
    

    
    show_product_video();
    // Make sure realted DOMs exist, then init jqzoom.

    $('#product_thumb_images li a').click(function(){

      
      
      
      
      


      var $this = $(this);
      if ($('#recently-purchased').hasClass('active')){
        hide_recent_purchase();
        $('#recently-purchased').removeClass('active');
      }

      
      
      
      
      
      
      
      

      var has_new_hand = hand_skin_tone_set || hand_skin_tone;
      if ($this.data('caption') == 'ring_top_hd' && has_new_hand){
        show_skin_tone();
      }
      if ($this.data('caption') == 'ring_top_hd_zm' && has_new_hand){
        show_skin_tone('zm');
      }
      if ($this.hasClass('carat_thumb')) {
        
        var shape = $('#ir234-shop-diamond .ir309-shape-thumbnails.active').data('shape');
        if (shape in carat_image_set) {
          $('#carat_slider_div').show();
        }
        
        $('#ir234-shop-diamond .ir309-shape-thumbnails.active').css('display', 'block');
        $('#id_diamond_shape_text').css('display', 'block');
        $('#try_on_this_ring').css('display', 'block');
        $('#pdp-vto-stacking-tigger').css('display', 'inline-block');
        $('#image_text').css('display', 'block');
      } else {
        if (hand_thumb_caption_list.includes($this.data('caption')) && hand_skin_tone_set){
           $('#carat_slider_div').show();
           if (is_mobile){
             $('#collapse-preview-diamond').attr('class','in');
             $('#collapse-preview-diamond').attr('style','');
           }
         }else{
           $('#carat_slider_div').hide();
         }
        if ($this.data('caption') == 'top_lg') {
          $('#ir234-shop-diamond .ir309-shape-thumbnails.active').css('display', 'block');
          $('#id_diamond_shape_text').css('display', 'block');
          $('#try_on_this_ring').css('display', 'block');
          $('#pdp-vto-stacking-tigger').css('display', 'inline-block');
          $('#image_text').css('display', 'block');
        } else if($this.data('caption') == 'Video'){
          $('#try_on_this_ring').css('display', 'block');
          $('#pdp-vto-stacking-tigger').css('display', 'inline-block');
          $('#id_diamond_shape_text').css('display', 'none');
          $('#ir234-shop-diamond .ir309-shape-thumbnails.active').css('display', 'none');
        } else if(hand_thumb_caption_list.indexOf($this.data('caption')) != -1 && has_new_hand){
          $('#image_text').css('display', 'block');
        }else {
          $('#ir234-shop-diamond .ir309-shape-thumbnails.active').css('display', 'none');
          $('#id_diamond_shape_text').css('display', 'none');
          
          $('#try_on_this_ring').css('display', 'none');
          $('#pdp-vto-stacking-tigger').css('display', 'none');
          
          $('#image_text').css('display', 'none');
        }
      }


      // Change caption.
      var caption = $(this).attr('data-caption');
      if ( caption ) {
        current_caption = caption;
      }
      $('#gems_text').css('visibility', 'visible');
      $('#default_text').css('visibility', 'visible');
      $('#setting_360_video_text').remove();

      if (diamond_category == "Colored Gemstones") {
        $('#gems_text').html('Shown <span style="text-transform: lowercase">With</span> Diamond');
      }
      //HARDCODE
      // if ($this.data('center') == "Colored Gemstones") {
      //   $('#gems_text').css('visibility', 'hidden');
      // }
      if ($.inArray($this.attr('id'), ["product_video_thumb", "diamond_video_thumb"]) != -1) {
        $('#gems_text').css('visibility', 'hidden');
        $('#default_text').css('visibility', 'hidden');
      }

      if (caption == 'top_lg' || caption == 'ring_top_lg') {
        if(is_mobile){
          if($('#id_diamond_shape_text').hasClass('collapsed')){
             $('#collapse-preview-diamond').attr('class','collapse');
             $('#collapse-preview-diamond').attr('style','height: 0px;');
          }
        }
        $('#default_text').html('Roll Over Image to Zoom');
        if (diamond_category == "Colored Gemstones") {
          $('#gems_text').html($('#gems_text').data('value'));
        }
        if ($('#carat_slider_div').is(':visible')) {
          $('#image_text').html('Shown <span style="text-transform:lowercase">with</span> ' + get_fraction_carat() + ' carat diamond');
        } else {
          $('#image_text').html(product_images[caption]['text_line'].replace('with', '<span style="text-transform:lowercase">with</span>').replace('With', '<span style="text-transform:lowercase">with</span>'));
        }
        if (is_pc){
          $("#default_text").text("Roll Over Image to Zoom");
        }
        else{
          $("#default_text").text("");
        }
      } else if (caption == 'real_view') {
        $('#image_text').text("real diamond image");
        if (is_pc){
          $("#default_text").text("Roll Over Image to Zoom");
        }
        else{
          $("#default_text").text("");
        }
      } else if (caption == 'gemstone_top_lg'){
        $('#default_text').html('Roll Over Image to Zoom');
      } else if (caption == 'Diamond-Video') {
        
            var video_text = 'Interactive Real Diamond Video';
        
        $('#image_text').text(video_text);
        if (is_pc){
          $("#default_text").text(video_text);
        }
        else{
          $("#default_text").text("");
        }
      } else if (caption == 'band_top_lg'|| caption == 'band_side_lg') {
        $('#gems_text').css('visibility', 'hidden');
        $('#image_text').text("");
        if (is_pc){
          $("#default_text").text("Roll Over Image to Zoom");
        }
        else{
          $("#default_text").text("");
        }
      } else if (caption == 'Video'){
        
          if (!$('#thumb-video iframe').data('video-inited')) {
            $('#thumb-video').css('display', 'block');
            var video_width = $('#id-carousel-thumb img').eq(0).width();
            var video_height = $('#id-carousel-thumb img').eq(0).height();
            $('#thumb-video iframe').attr('height', video_height);
            $('#thumb-video iframe').attr('width', video_width);
            var setting_video_url = '//embed.imajize.com/9054220?v=1625471808';
            var shape = $('#ir234-shop-diamond .ir309-shape-thumbnails.active').data('shape');
            var new_video_code = product_video_dict[shape]
            if (new_video_code){
              setting_video_url = '//embed.imajize.com/' + new_video_code + '?v=1625471808';
            }
            $('#thumb-video iframe').attr('src', setting_video_url)
            $('#thumb-video iframe').data('video-inited', true);
          }
          $("p.text-lightgray").html("Interactive Video – Drag <span style='text-transform:lowercase'>to</span> Rotate");
        
        $("p.text-lightgray").css('display', 'block');
        
          if (is_mobile){
             $('#collapse-preview-diamond').attr('class','in');
             $('#collapse-preview-diamond').attr('style','');
           }
           $('#ir234-shop-diamond .ir309-shape-thumbnails.active').css('display', 'block');
        
        $('#default_text').css('visibility', 'visible');
        $('#gems_text').css('visibility', 'visible');
        if (diamond_category == "Colored Gemstones"||setting_category == "CYO Sapphire Rings"){
          $("p.text-lightgray").after('<p class="text-beautiful text-center pb10" id="setting_360_video_text" data-value="Shown with Diamond" style="visibility: visible; font-family: Avenir Light;color: #666666; height: 25px; letter-spacing: 1px; margin-top: -10px;text-transform: capitalize;">Shown <span style="text-transform: lowercase">With</span> Diamond</p>');
        }
      } else if (hand_thumb_caption_list.indexOf(caption) != -1 && has_new_hand){
        $('#image_text').html(hand_skin_tone_image_text);
        if (diamond_category == "Colored Gemstones") {
          var size_on_hand_gemstone = false;
          if (caption == 'ring_top_hd' || $this.hasClass('hand_zo')){
            if(hand_skin_tone_is_zo_colored_gemstone){
              size_on_hand_gemstone = true;
            }
          }else if(caption == 'ring_top_hd_zm' || $this.hasClass('hand_zi')) {
            if(hand_skin_tone_is_zi_colored_gemstone){
              size_on_hand_gemstone = true;
            }
          }
          if(size_on_hand_gemstone){
            $('#gems_text').html($('#gems_text').data('value').replace('Shown with','').replace('Shown With','') + ' <span style="text-transform: lowercase">on</span> Size 6 Hand');
          }
        }
        if (is_pc){
          $("#default_text").text("Roll Over Image to Zoom");
        }
        else{
          $("#default_text").text("");
        }
      }else if (caption == 'side_lg' || caption == 'ring_side_lg'){
        if (diamond_category == "Colored Gemstones") {
          $('#gems_text').html('Shown <span style="text-transform: lowercase">With</span> Diamond');
          $('#gems_text').css('visibility', 'visible');
        }
        if (is_pc){
          $("#default_text").text("Roll Over Image to Zoom");
        }
        else{
          $("#default_text").text("");
        }
      }else {
        if (is_pc){
          $("#default_text").text("Roll Over Image to Zoom");
        }
        else{
          $("#default_text").text("");
        }
      }

      if (caption == 'Actual Diamond Size on Size 6 Hand') {
        $('.image-assets').show();
        $('#diamond_skin_image').show();
        $('#skin_tone_slider').show();
        $('#image_text').text("Actual Diamond Size on Size 6 Hand");
      } else {
        $('.image-assets').hide();
        $('#diamond_skin_image').hide();
      }

      if(is_touchable && !$this.is('#product_video_thumb')){
        disable_zoom();
        enable_zoom()
      }
      if(caption == 'top_lg'){
        add_btn_360_video();
      }
      if(caption == 'Video'){
        
      } else {
        $('.ir218-image-text').removeClass('hide');
      }

      $('#id-carousel-thumb').css('opacity', 1);
      $('.ir234-pdp-UGC').css('visibility', 'hidden');
      $('.skin-tone-image,#hand_skin_tone_text,#skin_tone_slider').removeClass('hidden');
      $('#skin_tone_slider').css('display', 'block');
      $('#carat_slider_div').css('display', 'block');
      $('#ir234-shop-diamond li div').css('display', 'block');
      $('#product_thumb_images').removeClass('inactive');
    });
  });

  $(function(){
    if (is_touchable) {
      init_pdp_img_swipe();
    }
    if(is_mobile){
      $('.product_image_container').css('padding-bottom', '100%')
    }
  });
  
    window.addEventListener('message', function(e){
      if (is_pc){
        if(e.data == 'arq-firstTouch') {
          $("p.text-lightgray").text("Interactive Video – Double Click To Zoom");
        }
      }
      if(e.data == 'arq-doneLoading') {
        $("#product_video .load-icon").hide();
      }
    }, false);
  
  // fix top_large image cut off issue on iphone xs from landscape to portrait orientation
  window.addEventListener("orientationchange", function() {
    disable_zoom();
    enable_zoom();
  }, false);

</script>
<script>
  function change_setting_shape(obj, category) {
      try {
        var shape = $(obj).data('shape');
        var show_find_my_match_wedding_band = '';
        if (cyo_page){
          if (has_shapes_gap_show_fmmwb){
            var index = $.inArray(shape, has_shapes_gap_show_fmmwb);
            if (index >= 0){
                show_find_my_match_wedding_band = 'True';
                if($('#find_my_match_wedding_bands').length > 0){
                    $("#find_my_match_wedding_bands").removeClass("hidden");
                }
            } else {
                if($('#find_my_match_wedding_bands').length > 0){
                    $("#find_my_match_wedding_bands").addClass("hidden");
                }
            }
        }
      }
      product_images['top_lg']['tn'] = product_shape_images[shape]['top_lg']['tn'];
      product_images['top_lg']['md'] = product_shape_images[shape]['top_lg']['md'];
      product_images['top_lg']['lg'] = product_shape_images[shape]['top_lg']['lg'];
      product_images['top_lg']['data-zoomable'] = product_shape_images[shape]['top_lg']['data-zoomable'];
      product_images['top_lg']['text_line'] = product_shape_images[shape]['top_lg']['text_line'];
      if(product_images['side_lg']){
          product_images['side_lg']['tn'] = product_shape_images[shape]['side_lg']['tn'];
          product_images['side_lg']['md'] = product_shape_images[shape]['side_lg']['md'];
          product_images['side_lg']['lg'] = product_shape_images[shape]['side_lg']['lg'];
          product_images['side_lg']['data-zoomable'] = product_shape_images[shape]['side_lg']['data-zoomable'];
      }
      var flag = 0;
      var to_replace = ['top_lg', 'side_lg'];
      for (var i=0; i<setting_images.length; i++) {
          var image = setting_images[i];
          for (var j=0; j < to_replace.length; j++) {
              var caption = to_replace[j];
              if (image['caption'] == caption) {
                  image['tn'] = product_shape_images[shape][caption]['tn'];
                  image['md'] = product_shape_images[shape][caption]['md'];
                  image['lg'] = product_shape_images[shape][caption]['lg'];
                  image['data-zoomable'] = product_shape_images[shape][caption]['data-zoomable'];
                  image['text_line'] = product_shape_images[shape][caption]['text_line'];
                  flag++;
              }
          }
          if (flag == to_replace.length) {
              break;
          }
      }
      // recommended for you
      var params = {product_id: product_id, shape: shape, diamond_dict: diamond_dict, is_mobile: is_mobile, template_name: template_name, show_find_my_match_wedding_bands: show_find_my_match_wedding_band,};
      if(typeof(has_recent_right) != undefined){
          params['has_recent_right'] = has_recent_right;
      }
      get_recommended_for_you_dt_cyo_ring(params)
      // recommended matched sets
      
      
    }
    catch(e) {}

    try {
        // for matched sets only
        product_images['ring_top_lg']['tn'] = product_shape_images['ring_' + shape]['top_lg']['tn'];
        product_images['ring_top_lg']['md'] = product_shape_images['ring_' + shape]['top_lg']['md'];
        product_images['ring_top_lg']['lg'] = product_shape_images['ring_' + shape]['top_lg']['lg'];
        product_images['ring_top_lg']['data-zoomable'] = product_shape_images['ring_' + shape]['top_lg']['data-zoomable'];
        product_images['ring_top_lg']['text_line'] = product_shape_images['ring_' + shape]['top_lg']['text_line'];
        for (var i=0; i<setting_images.length; i++) {
            var image = setting_images[i];
            if (image['caption'] == 'ring_top_lg') {
                image['tn'] = product_shape_images['ring_' + shape]['top_lg']['tn'];
                image['md'] = product_shape_images['ring_' + shape]['top_lg']['md'];
                image['lg'] = product_shape_images['ring_' + shape]['top_lg']['lg'];
                image['data-zoomable'] = product_shape_images['ring_' + shape]['top_lg']['data-zoomable'];
                image['text_line'] = product_shape_images['ring_' + shape]['top_lg']['text_line'];
                break;
            }
        }
        src = product_images['ring_top_lg']['tn'];
        $("a[data-caption='ring_top_lg']").find('img').attr('src', src);
    }
    catch(e) {}

    change_product_thumb_image('top_lg');
    $('#id-carousel-thumb .top_lg img').attr('src', product_images['top_lg']['lg']);
    $('#id-carousel-thumb .top_lg img').attr('alt', product_images['top_lg']['alt'].replace(', large', ','));
    init_thumb_video();

    current_caption = 'top_lg';
    save_cookie_cyo_shape(category, shape);
    if (!is_wistia_video){
        if (product_video_dict[shape]){
            $('#product_video').removeClass('hidden');
            $('#product_video_thumb').parent().removeClass('hidden');
            $('#product_video iframe').data('video-inited', false);
        } else {
            $('#product_video').addClass('hidden');
            $('#product_video_thumb').parent().addClass('hidden');
        }
    }
  }

  function remove_play_360_mobile_image() {
      $('.play-360-mobile').remove();
  }
  function add_btn_360_video(){
    if(is_setting_video){
      $('.pinch-zoom-container #product_image, .pinch-zoom-container .ring-on-hand-inner').parent().prepend('<img src="https://image.brilliantearth.com/static/img/abtest/icon/thumbnail_v2/360-video-thumbnail-m-new.png" width="60" alt="" class="play-360-mobile visible-xs">')
      $('.play-360-mobile').click(function(){
        $('#product_video_thumb').click();
        $('.play-360-mobile').remove();
      })
    }
  }

  var video_width=null, video_height=null
  function init_thumb_video() {
      if (!is_wistia_video) {
        if (video_width === null){
          video_width  = $('#id-carousel-thumb img').eq(0).width() || 450
        }
        if (video_height === null){
          video_height = $('#id-carousel-thumb img').eq(0).height() || 450
        }
        $('#thumb-video iframe').attr('height', video_height);
        $('#thumb-video iframe').attr('width', video_width);
        var setting_video_url = '//embed.imajize.com/9054220?v=1625471808';
        var shape = $('#ir234-shop-diamond .ir309-shape-thumbnails.active').data('shape');
        var new_video_code = product_video_dict[shape];
        if (new_video_code){
          setting_video_url = '//embed.imajize.com/' + new_video_code + '?v=1625471808';
        }
        var $new_iframe = $('#thumb-video iframe').clone().attr('src', setting_video_url).data('video-inited', true);
        $('#thumb-video iframe').replaceWith($new_iframe);
      }
    }
    var base_load, overlay_load;


    $(function() {
      // if (!is_touchable) {
      //   $('[data-toggle=zoom-all]').zoomAll();
      // }
      
      
        $('.carat-image img').load(function() {
          var load_class = $(this).data('lc');
          if (load_class == 'loaded1') {
            clearTimeout(base_load);
          } else if (load_class == 'loaded2') {
            clearTimeout(overlay_load);
          }
          $('.carat-image').addClass(load_class);
        }).each(function() {
          if (this.complete) {
            $(this).load();
          }
        });
        $('.simultaneous-show img').load(function() {
          var load_class = $(this).data('lc');
          if (load_class == 'loaded1') {
            clearTimeout(base_load);
          } else if (load_class == 'loaded2') {
            clearTimeout(overlay_load);
          }
          var simultaneous_span = $(this).parent('span');
          if (simultaneous_span.hasClass('simultaneous-show')) {
            simultaneous_span.addClass(load_class);
          }
        }).each(function() {
          if (this.complete) {
            $(this).load();
          }
        });
      
      add_btn_360_video()

      // init video
    init_thumb_video();
    });
</script>

<script>
  $(function() {
      /* FT-15995 */
      /* FT-19813 */
      var $discolorSlider = $($("#noUiSlider-discolour"));
      if ($discolorSlider.length) {
          $discolorSlider.noUiSlider({
              range: {
                  'min': 0,
                  '25%': 0.125,
                  '50%': 0.5,
                  'max': 1
              },
              start: 0.125
          }).on('slide', function() {
              var slider_val = $(this).val();
              if( slider_val <= 0.125 ){
                  $(".dark_base_hand").css("opacity", slider_val*2);
                  $(".dark_base2_hand").css("opacity", 0);
              } else if( slider_val > 0.125 && slider_val <= 0.5 ){
                  $(".dark_base_hand").css("opacity", slider_val*2);
                  $(".dark_base2_hand").css("opacity", 0);
              }else {
                  $(".dark_base_hand").css("opacity", 1);
                  $(".dark_base2_hand").css("opacity", (slider_val-0.5)*2);
              }
          });
      }
      /**/
  });
  $(".dark_base_hand").css("opacity", 0.26);
  $(".dark_base2_hand").css("opacity", 0);
</script>

<script>
    // fangdajing
    $("#product_image_middle").mouseover(function(){
      var $this = $(this);

      if ($('#recently-purchased').hasClass('zoomThumbActive')){
        hide_recent_purchase();
      }

      if ($this.is('#product_video_thumb') || $this.hasClass('skin_tone_thumb') || $this.hasClass('carat_thumb')) {
        $this.closest('ul').find('a.zoomThumbActive').removeClass('zoomThumbActive');
        $this.addClass('zoomThumbActive');
      } else {
        $('#product_video_thumb').removeClass('zoomThumbActive');
        $('.skin_tone_thumb').removeClass('zoomThumbActive');
        $('#recently-purchased').removeClass('zoomThumbActive');
      }

      if (!$this.hasClass('skin_tone_thumb')) {
        hide_skin_tone();
        if ($this.is('#product_video_thumb')) {
          show_product_video();
        } else if (!$this.hasClass('carat_thumb')) {
          hide_carat_image();
          $('#product_image').removeClass('v-hidden');
        }
      }
      var has_new_hand = hand_skin_tone_set || hand_skin_tone;

      if ($('#product_thumb_images li a.zoomThumbActive').data('caption') != 'top_lg'){
         $('#ir234-shop-diamond .ir309-shape-thumbnails.active').css('display', 'none');
      }



      var caption = $(this).attr('data-caption');
      if ( caption ) {
        current_caption = caption;
      }
      $('#gems_text').css('visibility', 'visible');
      $('#default_text').css('visibility', 'visible');
      $('#setting_360_video_text').remove();

      if (diamond_category == "Colored Gemstones") {
        $('#gems_text').html('Shown <span style="text-transform: lowercase">With</span> Diamond');
      }

      if ($.inArray($this.attr('id'), ["product_video_thumb", "diamond_video_thumb"]) != -1) {
        $('#gems_text').css('visibility', 'hidden');
        $('#default_text').css('visibility', 'hidden');
      }

      if(is_touchable && !$this.is('#product_video_thumb')){
        disable_zoom();
        enable_zoom()
      }

      if ($('#product_thumb_images li a.zoomThumbActive').data('caption') == 'band_top_lg' || $('#product_thumb_images li a.zoomThumbActive').data('caption') == 'band_side_lg'){
         $('#gems_text').css('visibility', 'hidden');
      }
      if ($('#product_thumb_images li a.zoomThumbActive').data('caption') == 'ring_top_lg' || $('#product_thumb_images li a.zoomThumbActive').data('caption') == 'top_lg'){
         $('#gems_text').html($('#gems_text').data('value'));
      }

      hide_video();
      hide_diamond_video();

    });

    function show_skin_tone(is_zoom_image) {
        hide_carat_image();
        hide_video();
        hide_diamond_video();
        $('#product_image').addClass('v-hidden');
        $('#product_video').css('visibility', 'hidden');
        if (is_zoom_image === 'zm') {
          $.zoomAll.enable($('.skin-tone-image-zm'));
          $('.skin-tone-image-zm').css('visibility', 'visible');
          
          $.zoomAll.disable($('.skin-tone-image'));
        } else {
          $.zoomAll.enable($('.skin-tone-image'));
          $('.skin-tone-image').css('visibility', 'visible');
          $('.skin-tone-image-zm').css('visibility', 'hidden');
          $.zoomAll.disable($('.skin-tone-image-zm'));
        }
        $('#skin_tone_slider').show();
        $('#ir234-shop-diamond .ir309-shape-thumbnails.active').show();
        $('#id_diamond_shape_text').hide();
        
        $('#try_on_this_ring').hide();
        $('#pdp-vto-stacking-tigger').hide();
        
    }
    function hide_skin_tone() {
        $.zoomAll.disable($('.skin-tone-image'));
        $.zoomAll.disable($('.skin-tone-image-zm'));
        
        $('.skin-tone-image-zm').css('visibility', 'hidden');
        $('#skin_tone_slider').hide();
        $('#ir234-shop-diamond .ir309-shape-thumbnails.active').show();
    }

    function show_carat_image() {
      // hide_skin_tone();
      $('#product_image').addClass('v-hidden');
      $('#product_video').css({'visibility': 'hidden', 'position': 'absolute'});
      $('#product_video').find('video').css('visibility', 'hidden');
      $('[id^=wistia_fullscreenButton_]').addClass('v-hidden');
      $('.carat-image').addClass('display');
      $.zoomAll.enable($('.carat-image'));
    }

    function hide_carat_image() {
      $('.carat-image').removeClass('display');
      $.zoomAll.disable($('.carat-image'));
      $('.carat_thumb').removeClass('zoomThumbActive');
    }
    function show_diamond_video() {
      $('#product_video, #product_image, .ring-on-hand').addClass('v-hidden');
      $('#diamond_video').css('visibility', 'visible').css('display', 'block');
      
        var cert_num = '' || '';
      
      
        var video_url = '//css.brilliantearth.com/static/v360_viewer_zoom_slider/Vision360.html?d='+ cert_num +'&surl=//image.brilliantearth.com/media/v360/&version=';
      
      if ($("#vision360_iframe").attr('src') == "") {
        $("#vision360_iframe").attr('src', video_url);
      }
      
      $('p.text-lightgray').show().addClass('text-line-visible');
    }

    function hide_diamond_video() {
      $('.ring-on-hand, #product_video').removeClass('v-hidden');
      $('#diamond_video').css('visibility', 'hidden').css('display', 'none');
    }

    function show_recent_purchase() {
      hide_carat_image();
      hide_video();
      hide_skin_tone();
      disable_zoom();
      $('#recently-purchased').closest('ul').find('li.active').removeClass('active');
      $('#recently-purchased').addClass('active');
      $('#product_thumb_images').addClass('inactive');
      $('#collapse-preview-diamond, .diamond-shape-select, p.text-lightgray').addClass('hidden');
      $('#product_video, #product_image, .ring-on-hand').addClass('hidden');
      $('.ir234-pdp-UGC').css('visibility', 'visible');
    }

    function hide_recent_purchase() {
      $('#collapse-preview-diamond, .diamond-shape-select, p.text-lightgray').removeClass('hidden');
      $('.ring-on-hand, #product_video, #product_image').removeClass('hidden');
      $('.ir234-pdp-UGC').css('visibility', 'hidden');
    }

</script>

<script>
  no_ui_split = {
    2: "",
    3: "<ol class='ui-slider-two'><li class='fore1'></li></ol>",
    4: "<ol class='ui-slider-three'><li class='fore1'></li><li class='fore2'></li></ol>",
    5: "<ol class='ui-slider-four'><li class='fore1'></li><li class='fore2'></li><li class='fore3'></li></ol>",
    6: "<ol class='ui-slider-five'><li class='fore1'></li><li class='fore2'></li><li class='fore3'></li><li class='fore4'></li></ol>",
    7: "<ol class='ui-slider-six'><li class='fore1'></li><li class='fore2'></li><li class='fore3'></li><li class='fore4'></li><li class='fore5'></li></ol>",
    8: "<ol class='ui-slider-seven'><li class='fore1'></li><li class='fore2'></li><li class='fore3'></li><li class='fore4'></li><li class='fore5'></li><li class='fore6'></li></ol>",
    9: "<ol class='ui-slider-eight'><li class='fore1'></li><li class='fore2'></li><li class='fore3'></li><li class='fore4'></li><li class='fore5'></li><li class='fore6'></li><li class='fore7'></li></ol>",
  }
  no_ui_range = {
    2: {
        'min': [0, 0.1],
        'max': 0.1
    },
    3: {
        'min': [0, 0.1],
        '50%': [0.1, 0.1],
        'max': 0.2
    },
    4: {
        'min': [0, 0.1],
        '33%': [0.1, 0.1],
        '66%': [0.2, 0.1],
        'max': 0.3
    },
    5: {
        'min': [0, 0.1],
        '25%': [0.1, 0.1],
        '50%': [0.2, 0.1],
        '75%': [0.3, 0.1],
        'max': 0.4
    },
    6: {
        'min': [0, 0.1],
        '20%': [0.1, 0.1],
        '40%': [0.2, 0.1],
        '60%': [0.3, 0.1],
        '80%': [0.4, 0.1],
        'max': 0.5
    },
    7: {
        'min': [0, 0.1],
        '16.66%': [0.1, 0.1],
        '33.32%': [0.2, 0.1],
        '49.97%': [0.3, 0.1],
        '66.66%': [0.4, 0.1],
        '83.32%': [0.5, 0.1],
        'max': 0.6
    },
    8: {
        'min': [0, 0.1],
        '14.28%': [0.1, 0.1],
        '28.57%': [0.2, 0.1],
        '42.85%': [0.3, 0.1],
        '57.14%': [0.4, 0.1],
        '71.42%': [0.5, 0.1],
        '85.71%': [0.6, 0.1],
        'max': 0.7
    },
    9: {
        'min': [0, 0.1],
        '12.50%': [0.1, 0.1],
        '25.00%': [0.2, 0.1],
        '37.50%': [0.3, 0.1],
        '50.00%': [0.4, 0.1],
        '62.50%': [0.5, 0.1],
        '75.00%': [0.6, 0.1],
        '87.50%': [0.7, 0.1],
        'max': 0.8
    },
  }
  noui_notches = {
    2: ['0.00', '0.10'],
    3: ['0.00', '0.10', '0.20'],
    4: ['0.00', '0.10', '0.20', '0.30'],
    5: ['0.00', '0.10', '0.20', '0.30', '0.40'],
    6: ['0.00', '0.10', '0.20', '0.30', '0.40', '0.50'],
    7: ['0.00', '0.10', '0.20', '0.30', '0.40', '0.50', '0.60'],
    8: ['0.00', '0.10', '0.20', '0.30', '0.40', '0.50', '0.60', '0.70'],
    9: ['0.00', '0.10', '0.20', '0.30', '0.40', '0.50', '0.60', '0.70', '0.80'],
  }
  function get_carat_by_shape() {
    var shape = $('#ir234-shop-diamond .ir309-shape-thumbnails.active').data('shape');
    var available_range = carat_image_set[shape][0];
    if (shape == 'Round' || shape == 'Oval' || shape == 'Marquise') {
      if (available_range.indexOf(0.75) === -1) {
        return available_range[0];
      } else {
        return '0.75';
      }
    } else {
      if (available_range.indexOf(1.25) === -1) {
        return available_range[0];
      } else {
        return '1.25';
      }
    }
  }
  function change_setting_carat(carat) {
    var caption = $('.zoomThumbActive').data('caption');
    if (carat === undefined) {
     carat = get_carat_by_shape();
    }
    $('#carat_slider').data('carat', carat);
    fraction_carat = get_fraction_carat(carat);
    if (carat == 1) {
      carat = '1.0';
    } else if (carat == 2) {
      carat = '2.0';
    }
    $("#image_text_var").html('<span class="carat-text">View with Carat Size: </span>' + fraction_carat + ' Carat').data('carat', fraction_carat);
    
    // $.zoomAll.disable($('.carat-image'));
    // $.zoomAll.enable($('.skin-tone-image'));
    var shape = $('#ir234-shop-diamond .ir309-shape-thumbnails.active').data('shape');
    $('#id-carousel-thumb .top_lg img').attr('src', carat_image_set[shape][1][carat]);
    // if ($('.carat-image img.hand_ring_overlay.img-responsive').attr('src') != carat_image_set[shape][1][carat]) {
    //   clearTimeout(overlay_load);
    //   overlay_load = setTimeout('$(".carat-image").removeClass("loaded2")', 100);
    //   $('.carat-image img.hand_ring_overlay.img-responsive').attr('src', carat_image_set[shape][1][carat]);
    // }
    if (hand_skin_tone_set) {
      //in hand_skin_tone_set, the carat 2.0 is 2, the carat 1.0 is 1
      if (carat == '2.0' || carat == '1.0'){
        carat = carat.replace('.0', '');
      }
      if (shape in hand_skin_tone_set && carat in hand_skin_tone_set[shape]){
        if ('zo' in hand_skin_tone_set[shape][carat] && $('.skin-tone-image img.hand_ring_overlay.img-responsive').attr('src') != hand_skin_tone_set[shape][carat]['zo']) {
          $('.skin-tone-image img.hand_ring_overlay').attr('src', hand_skin_tone_set[shape][carat]['zo']);
        }
        if ('zi' in hand_skin_tone_set[shape][carat] && $('.skin-tone-image-zm img.hand_ring_overlay.img-responsive').attr('src') != hand_skin_tone_set[shape][carat]['zi']) {
          $('.skin-tone-image-zm img.hand_ring_overlay').attr('src', hand_skin_tone_set[shape][carat]['zi']);
        }
      }
    }
    hand_skin_tone_image_text = "Shown <span style='text-transform:lowercase'>with</span> " + fraction_carat + " Carat Diamond <span style='text-transform: lowercase'>on</span> Size 6 Hand";
    if (hand_thumb_caption_list.includes(caption) && hand_skin_tone_set) {
      $('.image-text').html(hand_skin_tone_image_text);
    } else {
       if (is_pc){
         $('.image-text').html('Shown <span style="text-transform:lowercase">with</span> ' + fraction_carat + ' Carat Diamond');
       } else{
         $('.image-text').html('Shown <span style="text-transform:lowercase">with</span> ' + fraction_carat + ' Carat Diamond');
       }
       // show_carat_image();
    }
    // $.zoomAll.enable($('.skin-tone-image'));
  }

  function init_or_hide_carat_slider(length) {
    var shape = $('#ir234-shop-diamond .ir309-shape-thumbnails.active').data('shape');
    if (shape in carat_image_set) {
      // $('#product_image_middle').attr('src', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAcwAAAHMCAMAAABvBWi0AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyZpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMDY3IDc5LjE1Nzc0NywgMjAxNS8wMy8zMC0yMzo0MDo0MiAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTUgKFdpbmRvd3MpIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOkM0ODE5MkJGNEE4QzExRTc5NzdCRjc5M0JGREEzQzdFIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOkM0ODE5MkMwNEE4QzExRTc5NzdCRjc5M0JGREEzQzdFIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6QzQ4MTkyQkQ0QThDMTFFNzk3N0JGNzkzQkZEQTNDN0UiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6QzQ4MTkyQkU0QThDMTFFNzk3N0JGNzkzQkZEQTNDN0UiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz6B3zZXAAAABlBMVEUAAAAAAAClZ7nPAAAAAXRSTlMAQObYZgAAAOZJREFUeNrswQEBAAAAgiD/r25IQAEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADwZgIMADyJAAHIy3IVAAAAAElFTkSuQmCC');
        var carat = get_carat_by_shape();
      // TODO: change carat_slider_div
      if (carat_image_set[shape][0].length == 1) {
        $('#carat_slider_div').hide();
        change_setting_carat(carat);
      } else {
        // $('#carat_slider_div').show();
        // show_carat_image();
        var carat_list = carat_image_set[shape][0]
        var length = carat_list.length;
        var left = carat_list[0];
        var right = carat_list[carat_list.length - 1];
        $('#carat_slider_div .min span').html(get_fraction_carat(left) + ' c');
        $('#carat_slider_div .max span').html(get_fraction_carat(right) + ' c');
        if ($('#carat_slider').html() === '') {
          if ('Shown with 3/4 carat diamond'.indexOf('2 carat') > 0) {
            var carat = 2;
          }
          var start = get_slider_value(parseFloat(carat));
          $("#carat_slider").noUiSlider({
            range: no_ui_range[length],
            tooltips: true,
            start: start
          }).on('slide', function() {
            change_setting_carat(get_carat());
          });
          $('#carat_slider_div').find('.noUi-base').append(no_ui_split[length]);
          change_setting_carat(carat);
        } else {
          var current_carat = parseFloat($('#carat_slider').data('carat'));
          if (carat_image_set[shape][0].indexOf(current_carat) == -1) {
            current_carat = parseFloat(get_carat_by_shape());
          }
          var current_slider_carat = get_slider_value(current_carat);
          $('#carat_slider').noUiSlider({
            range: no_ui_range[length]
          }, true);
          if ($('#carat_slider_div #min-euro-pdp').length === 0) {
            $('.shape-carat-noUiSlider').append('<div id="min-euro-pdp" class="nowrap"></div>');
          }
          $('#carat_slider ol').remove();
          $('#carat_slider_div').find('.noUi-base').append(no_ui_split[length]);
          $('#carat_slider').val(current_slider_carat);
          change_setting_carat(current_carat);
        }
      }
    } else {
      $('#carat_slider_div').hide();
      hide_carat_image();
    }
  }
  function get_carat() {
    var slider_value = $("#carat_slider").val();
    var shape = $('#ir234-shop-diamond .ir309-shape-thumbnails.active').data('shape');
    var length = carat_image_set[shape][0].length;
    var index = noui_notches[length].indexOf(slider_value);
    if (index === -1) {
      index = 0;
    }
    return carat_image_set[shape][0][index];
  }
  function get_fraction_carat(carat) {
    var fraction_carat_dict = {
      0.33: '1/3', 0.5: '1/2', 0.75: '3/4',
      1.0: '1', 1.25: '1 1/4', 1.5: '1 1/2',
      2.0: '2', 2.25: '2 1/4', 2.75: '2 3/4',
      4.0: '4',
    }
    if (carat === undefined) {
      carat = get_carat();
    }
    return fraction_carat_dict[carat] || carat;
  }
  function get_slider_value(carat) {
    var shape = $('#ir234-shop-diamond .ir309-shape-thumbnails.active').data('shape');
    var index = carat_image_set[shape][0].indexOf(carat);
    var length = carat_image_set[shape][0].length;
    return parseFloat(noui_notches[length][index]);
  }
  $(function() {
    // FT-15995
    init_or_hide_carat_slider();
    // setTimeout('init_or_hide_carat_slider()', 5000);
  });

</script>

<script>
$(document).ready(function() {
    $('.dropdown-menu').mouseenter(function () {
      $.zoomAll.disable($('[data-toggle=zoom-all]'))
    })
    $('.dropdown-menu').mouseleave(function () {
      if (!$('#product_video_thumb').hasClass('zoomThumbActive')){
        $.zoomAll.enable($('[data-toggle=zoom-all]'))
      }
    })
    
    $('.ir218-size-tips').click(function(){
       track_event('Product Detail Page', 'CYO Rings', 'Setting|Diamond|Select Size|Size Guide', false);
    })
    $('.ir218-size-tips-mobile').click(function(){
       track_event('Product Detail Page', 'CYO Rings', 'Setting|Diamond|Select Size|Size Guide', false);
    })
    $('.dropdown-menu.inner li a').click(function(){
       track_event('Product Detail Page', 'CYO Rings', 'Setting|Diamond|Select Size|'+this.text, false);
    })
    $('.filter-option.pull-left').click(function(){
        setTimeout(function(){
          if ($('.btn-group.bootstrap-select.form-control.sp-big').hasClass('open')){
            track_event(
                'Product Detail Page', 'CYO Rings',
                'Setting|Diamond|Select Size|Expand', false)
          }else{
              track_event(
                  'Product Detail Page', 'CYO Rings',
                  'Setting|Diamond|Select Size|Collapse', false)
          }
        }, 200);

    });
    

  });
</script>
<div class="visible-sm visible-xs clearfix" aria-hidden="true" data-acsb-hidden="true"></div>


      <!-- proudct info right -->
      <div class="col-md-5 ir218-detail-property pb-30 pb-xs-0">
        <div class="row">
          <div class="col-lg-10 col-md-12 ir218-explanation" id="ir309-explanation" data-acsb-main="true" role="main">
            <h1 class="heading">
              
                Petite Twisted Vine Diamond Engagement Ring 
              
            </h1>

            <script>
                replace_name_v();
            </script>

            <!-- customer reviews -->
            
              <div class="ir218-snippet-property mb-xs-15">
                  <span class="ir218-snippet-stars" data-acsb-possible-star="true">
                    <a href="javascript:void(0);" style="background-position:left -130px;" class="ir218-stars ir218-stars-small" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" role="button" data-acsb-hover="true"><span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Review " aria-hidden="false" data-acsb-hidden="false"></span></a>
                  </span>
                <span class="ir218-write-read">
                  <span class="ir218-snippet-read-reviews">
                      <a class="text-33" href="javascript:void(0);" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" role="button" data-acsb-hover="true">(187)</a> </span>
                   </span>
              </div>
            
            <p class="normal-statement mb20 mt5 ir309-description" data-acsb-overflower="true">This beautiful ring features a shimmering strand of pavé diamonds entwined with a lustrous ribbon of precious metal.
              <a class="ir309-description-read-more" href="javascript:void(0);" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Product Description|Read More" data-noninteract="true" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" role="button" data-acsb-hover="true"> <span class="display-ib td-n2 text-33"> ... </span>Read More</a>
            </p>

            <!--view with diamond shape-->
            <div class="view-with--shapes ">
              <p class="view-with__title title_shape">
                <span>View with Diamond Shape: </span>Round
              </p>
              <div class="list_carousel--ir234-shape responsive" role="region" data-acsb-carousel="true" data-acsb-force-visible="true" aria-label="Carousel">
                <a class="prev disabled" id="prev1" href="#" style="display: inline;" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Diamond Shape|Previous" data-noninteract="true" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="-1" data-acsb-now-navigable="false" aria-hidden="true" data-acsb-hidden="true" role="button" data-acsb-hover="true">
                  <span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Previous " aria-hidden="false" data-acsb-hidden="false"></span><i class="icons-chevron-left-black" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true"></i>
                </a>
                <div class="caroufredsel_wrapper" style="text-align: start; float: none; position: relative; inset: auto; z-index: auto; width: 369px; height: 32px; margin: 0px; overflow: hidden;" data-acsb-overflower="true"><ul id="ir234-shop-diamond" class="nav ir309-pdp-view-diamondShapes navclearfix" data-circular="false" style="text-align: left; float: none; position: absolute; inset: 0px auto auto 0px; margin: 0px; width: 1189px; height: 32px;">

                    
                      <li style="width: 41px;" rel="1" class="shape-li" data-shape="Round">
                        <div data-shape="Round" class="ir309-shape-thumbnails active
                             fore1
                             " data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Diamond Shape|Round" data-noninteract="true">
                          <i data-acsb-clickable="true" data-acsb-navigable="true" tabindex="0" data-acsb-now-navigable="true" role="button" data-acsb-textual-ops="cart"><span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Cart " aria-hidden="false" data-acsb-hidden="false"></span></i>
                          <span style="text-transform:Capitalize !important;" aria-hidden="false" data-acsb-hidden="false" class="acsb-sr-only" data-acsb-given-sr-only="true" data-acsb-sr-only="true" data-acsb-force-visible="true">Round</span>
                        </div>
                      </li>
                    
                      <li style="width: 41px;" rel="2" class="shape-li" data-shape="Oval">
                        <div data-shape="Oval" class="ir309-shape-thumbnails 
                             fore6
                             " data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Diamond Shape|Oval" data-noninteract="true">
                          <i data-acsb-clickable="true" data-acsb-navigable="true" tabindex="0" data-acsb-now-navigable="true" role="button" data-acsb-textual-ops="cart"><span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Cart " aria-hidden="false" data-acsb-hidden="false"></span></i>
                          <span style="text-transform:Capitalize !important;" aria-hidden="false" data-acsb-hidden="false" class="acsb-sr-only" data-acsb-given-sr-only="true" data-acsb-sr-only="true" data-acsb-force-visible="true">Oval</span>
                        </div>
                      </li>
                    
                      <li style="width: 41px;" rel="3" class="shape-li" data-shape="Cushion">
                        <div data-shape="Cushion" class="ir309-shape-thumbnails 
                             fore3
                             " data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Diamond Shape|Cushion" data-noninteract="true">
                          <i data-acsb-clickable="true" data-acsb-navigable="true" tabindex="0" data-acsb-now-navigable="true" role="button" data-acsb-textual-ops="cart"><span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Cart " aria-hidden="false" data-acsb-hidden="false"></span></i>
                          <span style="text-transform:Capitalize !important;" aria-hidden="false" data-acsb-hidden="false" class="acsb-sr-only" data-acsb-given-sr-only="true" data-acsb-sr-only="true" data-acsb-force-visible="true">Cushion</span>
                        </div>
                      </li>
                    
                      <li style="width: 41px;" rel="4" class="shape-li" data-shape="Princess">
                        <div data-shape="Princess" class="ir309-shape-thumbnails 
                             fore2
                             " data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Diamond Shape|Princess" data-noninteract="true">
                          <i data-acsb-clickable="true" data-acsb-navigable="true" tabindex="0" data-acsb-now-navigable="true" role="button" data-acsb-textual-ops="cart"><span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Cart " aria-hidden="false" data-acsb-hidden="false"></span></i>
                          <span style="text-transform:Capitalize !important;" aria-hidden="false" data-acsb-hidden="false" class="acsb-sr-only" data-acsb-given-sr-only="true" data-acsb-sr-only="true" data-acsb-force-visible="true">Princess</span>
                        </div>
                      </li>
                    
                      <li style="width: 41px;" rel="5" class="shape-li" data-shape="Pear">
                        <div data-shape="Pear" class="ir309-shape-thumbnails 
                             fore8
                             " data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Diamond Shape|Pear" data-noninteract="true">
                          <i data-acsb-clickable="true" data-acsb-navigable="true" tabindex="0" data-acsb-now-navigable="true" role="button" data-acsb-textual-ops="cart"><span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Cart " aria-hidden="false" data-acsb-hidden="false"></span></i>
                          <span style="text-transform:Capitalize !important;" aria-hidden="false" data-acsb-hidden="false" class="acsb-sr-only" data-acsb-given-sr-only="true" data-acsb-sr-only="true" data-acsb-force-visible="true">Pear</span>
                        </div>
                      </li>
                    
                      <li style="width: 41px;" rel="6" class="shape-li" data-shape="Emerald">
                        <div data-shape="Emerald" class="ir309-shape-thumbnails 
                             fore9
                             " data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Diamond Shape|Emerald" data-noninteract="true">
                          <i data-acsb-clickable="true" data-acsb-navigable="true" tabindex="0" data-acsb-now-navigable="true" role="button" data-acsb-textual-ops="cart"><span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Cart " aria-hidden="false" data-acsb-hidden="false"></span></i>
                          <span style="text-transform:Capitalize !important;" aria-hidden="false" data-acsb-hidden="false" class="acsb-sr-only" data-acsb-given-sr-only="true" data-acsb-sr-only="true" data-acsb-force-visible="true">Emerald</span>
                        </div>
                      </li>
                    
                      <li style="width: 41px;" rel="7" class="shape-li" data-shape="Marquise">
                        <div data-shape="Marquise" class="ir309-shape-thumbnails 
                             fore5
                             " data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Diamond Shape|Marquise" data-noninteract="true">
                          <i data-acsb-clickable="true" data-acsb-navigable="true" tabindex="0" data-acsb-now-navigable="true" role="button" data-acsb-textual-ops="cart"><span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Cart " aria-hidden="false" data-acsb-hidden="false"></span></i>
                          <span style="text-transform:Capitalize !important;" aria-hidden="false" data-acsb-hidden="false" class="acsb-sr-only" data-acsb-given-sr-only="true" data-acsb-sr-only="true" data-acsb-force-visible="true">Marquise</span>
                        </div>
                      </li>
                    
                      <li style="width: 41px;" rel="8" class="shape-li" data-shape="Asscher">
                        <div data-shape="Asscher" class="ir309-shape-thumbnails 
                             fore4
                             " data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Diamond Shape|Asscher" data-noninteract="true">
                          <i data-acsb-clickable="true" data-acsb-navigable="true" tabindex="0" data-acsb-now-navigable="true" role="button" data-acsb-textual-ops="cart"><span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Cart " aria-hidden="false" data-acsb-hidden="false"></span></i>
                          <span style="text-transform:Capitalize !important;" aria-hidden="false" data-acsb-hidden="false" class="acsb-sr-only" data-acsb-given-sr-only="true" data-acsb-sr-only="true" data-acsb-force-visible="true">Asscher</span>
                        </div>
                      </li>
                    
                      <li style="width: 41px;" rel="9" class="shape-li" data-shape="Radiant">
                        <div data-shape="Radiant" class="ir309-shape-thumbnails 
                             fore7
                             " data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Diamond Shape|Radiant" data-noninteract="true">
                          <i data-acsb-clickable="true" data-acsb-navigable="true" tabindex="0" data-acsb-now-navigable="true" role="button" data-acsb-textual-ops="cart"><span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Cart " aria-hidden="false" data-acsb-hidden="false"></span></i>
                          <span style="text-transform:Capitalize !important;" aria-hidden="false" data-acsb-hidden="false" class="acsb-sr-only" data-acsb-given-sr-only="true" data-acsb-sr-only="true" data-acsb-force-visible="true">Radiant</span>
                        </div>
                      </li>
                    
                      <li style="width: 41px;" rel="10" class="shape-li" data-shape="Heart" aria-hidden="true" data-acsb-hidden="true">
                        <div data-shape="Heart" class="ir309-shape-thumbnails 
                             fore10
                             " data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Diamond Shape|Heart" data-noninteract="true">
                          <i data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-textual-ops="cart"><span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Cart " aria-hidden="false" data-acsb-hidden="false"></span></i>
                          <span style="text-transform:Capitalize !important;">Heart</span>
                        </div>
                      </li>
                    
                </ul></div>
                <div class="clearfix" aria-hidden="true" data-acsb-hidden="true"></div>
                <a class="next" id="next1" href="#" style="display: inline;" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Diamond Shape|Next" data-noninteract="true" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" role="button" data-acsb-hover="true">
                  <span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next " aria-hidden="false" data-acsb-hidden="false"></span><i class="icons-chevron-right-black" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true"></i></a>
              </div>
            </div>
            <script type="text/javascript" src="//script.brilliantearth.com/static/js/jquery.carouFredSel-6.2.1-packed.js"></script>
            <script type="text/javascript">
              if($('.ir309-description').height() > 40){
                $('.ir309-description').removeClass('expanded')
              }
              $('.ir309-description-read-more').click(function () {
                $(this).parent().addClass('expanded');
              });
              $('#ir234-shop-diamond').carouFredSel({
                  auto:false,
                  circular:false,
                  infinite:false,
                  prev: '#prev1',
                  next: '#next1',
                  pagination: "#pager1"
              });
              var current_protocol = document.location.protocol;
              try{
                  cyo_shape = $('li.shape-li .ir309-shape-thumbnails.active').data('shape');
                  if (setting_category == "CYO Rings") {
                      if (current_protocol == 'https:') { $.cookie('cyoss_shape', cyo_shape, {path: '/', secure: true}); } else { $.cookie('cyoss_shape', cyo_shape, {path: '/'}); }
                      if (current_protocol == 'https:') { $.cookie('ring_shapes', cyo_shape, {path: '/', secure: true}); } else { $.cookie('ring_shapes', cyo_shape, {path: '/'}); }
                  } else if (setting_category == 'CYO Pendants'){
                      if (current_protocol == 'https:') { $.cookie('cyopd_shape', cyo_shape, {path: '/', secure: true}); } else { $.cookie('cyopd_shape', cyo_shape, {path: '/'}); }
                      if (current_protocol == 'https:') { $.cookie('pendant_shapes', cyo_shape, {path: '/', secure: true}); } else { $.cookie('pendant_shapes', cyo_shape, {path: '/'}); }
                  } else {
                      if (current_protocol == 'https:') { $.cookie('cyo_shape', cyo_shape, {path: '/', secure: true}); } else { $.cookie('cyo_shape', cyo_shape, {path: '/'}); }
                  }
              }
              catch(e) {}
              $(function () {
                $('.shape-li').on('click', function () {
                  $('#ir234-shop-diamond').find('.ir309-shape-thumbnails.active').removeClass('active');
                  $(this).find('.ir309-shape-thumbnails').addClass('active');
                  
                    init_or_hide_carat_slider();
                  
                  var current_li = $('#product_thumb_images li.active');
                  var caption = current_li.find('a').data('caption');
                  change_setting_shape(this, setting_category);
                  if (caption == 'Video'){
                    current_li.click();
                  } else if(hand_thumb_caption_list.includes(caption)){
                    current_li.click();
                  }
                });
                $('.shape-li').hover(function(){
                  $('.view-with__title.title_shape').html('<span>View with Diamond Shape: </span>' + $(this).data('shape'));
                },function(){
                  $('.view-with__title.title_shape').html('<span>View with Diamond Shape: </span>' + $('.ir309-shape-thumbnails.active').data('shape'));
                });
              });
            </script>
            <!--view width carat size-->
            
            <div class="view-with--caratSize" id="collapse-preview-diamond">
              <p class="view-with__title title_slider_carat" id="image_text_var"><span class="carat-text">View with Carat Size: </span>3/4 Carat</p>
              <!--carat_slider_div-->
              <div class="diamond-shape-select" id="carat_slider_div" style="padding-bottom: 7px;">
                <div class="carat-weight-noUiSlider shape-carat-noUiSlider">
                  <div class="min"><span>1/3 c</span><strong>ara</strong>t</div>
                  <div class="noUiSlider noUi-target noUi-ltr noUi-horizontal noUi-background" id="carat_slider" onchange="track_event('Product Detail Page','CYO Rings','Setting|Diamond|Carat|' + $('#image_text_var').data('carat'),true)"><div class="noUi-base"><div class="noUi-origin" style="left: 28.57%;"><div class="noUi-handle noUi-handle-lower" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-force-unnavigable="true" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true"></div></div><ol class="ui-slider-seven"><li class="fore1"></li><li class="fore2"></li><li class="fore3"></li><li class="fore4"></li><li class="fore5"></li><li class="fore6"></li></ol></div></div>
                  <div class="max"><span>2 3/4 c</span><strong>ara</strong>t</div>

                </div>
              </div>
            </div>
            

            <form role="form">
              
                
                  
                    

<div class="ir309-select-container" role="navigation" aria-label="Page Menu">
  <p id="pdp_metal" class="select__title"><span class="avenir-medium">Select Metal: </span>18K White Gold </p>
  <ul class="list-inline ir249-pdp-metals-select mb0 ir309-pdp-metals-select" style="margin-left:-5px;" data-acsb-menu="ul">
    
      
        
      
        
      
        
      
        
          
            <li data-acsb-menu="li" data-acsb-menu-root="true"><a class="value active change_track_info" href="/Petite-Twisted-Vine-Diamond-Ring-(1/8-ct.-tw.)-White-Gold-BE1D54-3821855/" data-metal="18K White Gold" data-balance="" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Metal|18KW" style="background-color:#dedede" data-noninteract="true" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" data-acsb-menu="a" data-acsb-menu-root-link="true" data-acsb-tooltip="Use ←/→ to navigate" data-acsb-hover="true">18kw</a></li>
          
        
      
        
      
        
          
            <li data-acsb-menu="li" data-acsb-menu-root="true"><a class="value change_track_info" href="/Petite-Twisted-Vine-Diamond-Ring-(1/8-ct.-tw.)-Gold-BE1D54-3821856/" data-metal="18K Yellow Gold" data-balance="" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Metal|18KY" style="background-color:#efd9a7" data-noninteract="true" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" data-acsb-menu="a" data-acsb-menu-root-link="true" data-acsb-hover="true">18ky</a></li>
          
        
      
        
          
            <li data-acsb-menu="li" data-acsb-menu-root="true"><a class="value change_track_info" href="/Petite-Twisted-Vine-Diamond-Ring-(1/8-ct.-tw.)-Rose-Gold-BE1D54-3821857/" data-metal="14K Rose Gold" data-balance="" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Metal|14KR" style="background-color:#f0bd9e" data-noninteract="true" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" data-acsb-menu="a" data-acsb-menu-root-link="true" data-acsb-hover="true">14kr</a></li>
          
        
      
        
      
        
          
            <li data-acsb-menu="li" data-acsb-menu-root="true"><a class="value change_track_info" href="/Petite-Twisted-Vine-Diamond-Ring-(1/8-ct.-tw.)-Platinum-BE1D54-3821858/" data-metal="Platinum" data-balance=" (+$400)" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Metal|PT" style="background-color:#dedede" data-noninteract="true" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" data-acsb-menu="a" data-acsb-menu-root-link="true" data-acsb-hover="true">pt</a></li>
          
        
      
        
      
        
      
    
  </ul>
</div>

<script type="text/javascript">
  $("#pdp_metal").parent().find('.value').hover(function(){
    $("#pdp_metal").html('<span class="avenir-medium" >Select Metal: </span> '+ $(this).data('metal') + $(this).data('balance'));
  },function(){
    $("#pdp_metal").html('<span  class="avenir-medium" >Select Metal: </span> 18K White Gold');
  });
  
    $(".change_track_info").map(function () {
      $(this).attr('data-category', 'Product Detail Page').attr('data-action', 'CYO Rings').attr('data-label', 'Setting|Diamond|Metal|'+this.text.toUpperCase()).attr('data-noninteract', true);
    });
    $(".change_track_info").mouseenter(function () {
      if (!$(this).hasClass('ga_hover')){
          track_event('Product Detail Page', 'CYO Rings', 'Setting|Diamond|Metal|'+this.text.toUpperCase()+'|Hover', true)
          $(this).addClass('ga_hover')
      }
    });
  
</script>

                  
                
              

              



<script type="text/javascript">
  // quality text
  $(document).ready(function () {
    $('#quality_text').hover(function() {
      var origin_name = $('.interlink-item.active').text();
      if (origin_name.indexOf("Standard") >= 0) {
        $("#quality_text").attr("data-content","Very good cutting, medium light to medium tone, and moderately strong saturation.");
      } else if (origin_name.indexOf("Premium") > 0) {
        if (origin_name.indexOf("Super") > 0) {
          $("#quality_text").attr("data-content","Excellent cutting, medium to medium dark tone, and strong saturation.");
        } else {
          $("#quality_text").attr("data-content","Very good to excellent cutting, medium tone, and moderately strong to strong saturation. ");
        }
      }
    });
  })

  $(document).ready(function () {
    // text interlink
    $(".interlink-view").each(function(){
      var $tittle = $(this).find('.interlink-tittle');
      var origin_name = $(this).find('.interlink-item.active').data('name');
      $tittle.text(origin_name);

      if(!Sys.is_touchable){
        $(this).find('.interlink-item').hover(function(){
          $tittle.text($(this).data('name'));

          

        },function(){
          $tittle.text(origin_name);
          
        });
      }

    });
    

    // picture interlink
    $(".interlink-pic").each(function(){
      var $tittle = $(this).find('.center_stone_title');
      var origin_name = $(this).find('.center_stone_img.active').data('name');
      $tittle.text(origin_name);

      if(!Sys.is_touchable){
        $(this).find('.center_stone_img').hover(function(){
          $tittle.text($(this).data('name'));

          var caption = $(".zoomThumbActive").data('caption');
          if (caption == 'side_lg') $('#product_image_middle').attr('src', $(this).data('side-img'));
          else if (caption == 'top_lg') $('#product_image_middle').attr('src', $(this).data('top-img'));

        },function(){
          $tittle.text(origin_name);
          $('#product_image_middle').attr('src',$('#product_image_middle').data('base-img'));
        });
      }
    });

    $(".interlink-zodiac").each(function(){
      var $tittle = $(this).find('.interlink-zodiac-tittle');
      var origin_name = $(this).find('.interlink-item-zodiac.active').data('name');
      $tittle.text(origin_name);

      if(!Sys.is_touchable){
        $(this).find('.interlink-item-zodiac').hover(function(){
          $tittle.text($(this).text());
          var title = $(this).text();
          var $img_obj = $('option[value="'+ title +'"]');
          var caption = $(".zoomThumbActive").data('caption');
          if (caption == 'side_lg') $('#product_image_middle').attr('src', $img_obj.data('side-img'));
          else if (caption == 'top_lg') $('#product_image_middle').attr('src', $img_obj.data('top-img'));

        },function(){
          $tittle.text(origin_name);
          $('#product_image_middle').attr('src',$('#product_image_middle').data('base-img'));
        });
      }
    });

    var quality_value = $('.interlink-item.active').text();
    if (quality_value.indexOf("Unheated") >= 0) {
        $("#quality_text").addClass("hide");
    }
  });
</script>


  




              <p class="mt0 setting-only-price">
                
                  
                    $1,250
                  
                  
                    <small>(Setting Only)</small>
                  
                  
                
              </p>

              <div class="form-group mb5 ir309-choose-setting">
                
                    <a class="btn btn-lg btn-block btn-success add_cyoring add_button" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|CTA|Choose Setting" data-noninteract="false" id="add_cyoring" data-href="/rings/cyorings/add_setting/3821855/?did=&amp;first=" href="/rings/cyorings/add_setting/3821855/?did=&amp;first=" rel="nofollow" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" data-acsb-hover="true">CHOOSE THIS SETTING</a>
                    <span class="detail wishlist_check niwl" id="wishlist_check" data-toggle="wishlist" data-return-item="true" data-valifunc="true" data-notitle="true" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Lead Behavior|Wish List" data-noninteract="false" data-product="3821855" data-wishlistitems="" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="0" data-acsb-now-navigable="true" role="button" data-acsb-textual-ops="favorites" data-acsb-possible-button="true" data-acsb-force-navigable="true"><span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Favorites " aria-hidden="false" data-acsb-hidden="false"></span><i class="iconfont iconfont-heart" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true"></i></span>

                
              </div>
            </form>

            
  <ul class="ir218-social-contact ir309-social-contact text-33 clearfix" data-acsb-menu="ul" role="navigation" aria-label="Page Menu">
  
    <li class="fore1" id="drop_hint" data-acsb-menu="li" data-acsb-menu-root="true">
      <a href="javascript:void(0);" id="email_to_friend" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Lead Behavior|Drop Hint" data-noninteract="false" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" data-acsb-menu="a" role="button" data-acsb-menu-root-link="true" data-acsb-tooltip="Use ←/→ to navigate" data-acsb-hover="true">
        <i class="iconfont iconfont-mail" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true"><span class="glyphicon glyphicon-heart" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true"></span></i>drop hint
      </a>
    </li>
  
    <li class="fore3" data-acsb-menu="li" data-acsb-menu-root="true">
      <a href="javascript:void(0);" class="request-info" rel="nofollow" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Lead Behavior|Email" data-noninteract="false" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" data-acsb-menu="a" role="button" data-acsb-menu-root-link="true" data-acsb-hover="true">
        <i class="iconfont iconfont-mail" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true"></i>email Us
      </a>
    </li>
    <li class="fore4" data-acsb-menu="li" data-acsb-menu-root="true">
      <a href="/contact/" id="pdp_telephone_text" class="phone_click" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Lead Behavior|Call" data-noninteract="false" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" data-acsb-menu="a" data-acsb-menu-root-link="true" data-acsb-hover="true">
        <span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Contact " aria-hidden="false" data-acsb-hidden="false"></span><i class="iconfont iconfont-tel3" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true"></i>(716) 889-4803
      </a>
    </li>
  </ul>

            <div class="divider-line"></div>
            
              

            

            
              <div class="ir309-shipping-and-delivery">
                <div class="free-shipping-text mb15 fs-15">
                  <img width="40" src="https://image.brilliantearth.com/static/img/icon/svg/icon-speedy-diamond.svg" alt="Processing the data, please give it a few seconds..." data-acsb-alt-candidate="Icon speedy diamond">
                  <p>
                    <a href="/shipping/" class="text-33" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Details|Free Shipping" data-noninteract="true" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" data-acsb-hover="true">
                      Free Shipping,
                    </a>
                    <a href="/30-Day-Returns/" class="text-33" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Details|Free 30 Day Returns" data-noninteract="true" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" data-acsb-hover="true">
                      Free 30 Day Returns
                    </a>
                  </p>
                </div>
              <!-- #21079 shipping week -->
                <div class="dilivery-text fs-15">
                  <img width="30" src="https://image.brilliantearth.com/static/img/icon/svg/calendar-icon.svg" alt="Processing the data, please give it a few seconds..." data-acsb-alt-candidate="Calendar icon">
                  
                      
                        <p class="">Order now and your order ships by
                          <span class="avenir-medium text-green">Wed, Jul 21</span>, depending on center
                          diamond.</p>
                      
                  
                </div>
              </div>
            


            <form id="email_form_to" action="/request-info/" method="POST" aria-hidden="true" data-acsb-hidden="true">
  <input type="hidden" name="csrfmiddlewaretoken" value="CrLgTAvZOmo4HiBLbE4ynOqAJq9Dc4ql0A9X67Vb9fa1aPojMVe7Rl6qVK0NeG2j" tabindex="-1" data-acsb-now-navigable="false">
  <input type="hidden" name="value" id="value_ring_size" tabindex="-1" data-acsb-now-navigable="false">
  <input type="hidden" name="text" id="text_ring_size" tabindex="-1" data-acsb-now-navigable="false">
  <input type="hidden" name="ids" value="3821855" tabindex="-1" data-acsb-now-navigable="false">
  <input type="hidden" name="prod_url" value="/Petite-Twisted-Vine-Diamond-Ring-%281/8-ct.-tw.%29-White-Gold-BE1D54-3821855/" tabindex="-1" data-acsb-now-navigable="false">
  <input type="hidden" name="did" value="" tabindex="-1" data-acsb-now-navigable="false">
  
  <input type="hidden" name="charm" value="" tabindex="-1" data-acsb-now-navigable="false">
</form>

<script type="text/javascript">
    $(".request-info").click(function () {
        var request_info_form = $('#email_form_to');
        if ($('#engrave_charm').val()) {
            request_info_form.find('input[name=charm]').val($('#engrave_charm').val());
        }
        $("#value_ring_size").val($("#ring_size").children('option:selected').val());
        $("#text_ring_size").val($("#ring_size").children('option:selected').text());
        request_info_form.submit();
    });
    $("#checkbox").click(function () {
        if ($(this).hasClass('icons-checkbox')) {
            $(this).removeClass('icons-checkbox');
            $(this).addClass('icons-checked');
            $('#engrave').attr('checked', 'checked')
        }
        else {
            if ($(this).hasClass('icons-checked')) {
                $(this).removeClass('icons-checked');
                $(this).addClass('icons-checkbox');
                $('#engrave').removeAttr('checked')
            }
        }
    })
    $('#checkbox_text').click(function () {
        if ($(this).prev().hasClass('icons-checkbox')) {
            $(this).prev().removeClass('icons-checkbox');
            $(this).prev().addClass('icons-checked');
            $('#engrave').attr('checked', 'checked')
        }
        else {
            if ($(this).prev().hasClass('icons-checked')) {
                $(this).prev().removeClass('icons-checked');
                $(this).prev().addClass('icons-checkbox');
                $('#engrave').removeAttr('checked')
            }
        }
    })
</script>
            
              <div class="divider-line"></div>
              

  <div class="mb-xs-0 mb-20 product-detail-promo-feature mt0" style="border:0;">
    <a href="javascript:void(0);" data-link="/Green-on-the-Inside/" class="promotion-bar" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" role="button" data-acsb-hover="true">
  
      
        <span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Gift Promotion " aria-hidden="false" data-acsb-hidden="false"></span><img class="img-responsive" src="//image.brilliantearth.com/media/cache/9e/3f/9e3f426674228e36e7af319023b1e15d.jpg" srcset="//image.brilliantearth.com/media/promotion/PDP_DT_Diamond_Bar_-_Last_Day_New1.jpg 2x" alt="9e3f426674228e36e7af319023b1e15d" role="presentation">
      
  
  </a>
  </div>
  <script type="text/javascript">
    $('.promotion-bar').click(function () {
      dataLayer.push({
                       'ecommerce': {
                         'promoClick': {'promotions': promotions}
                       }
                     });
      window.location.href = $(this).data('link');
    });
  </script>



            
            <div class="ir312-product-details-wrapper">
                <div class="IR218-product-details-lists ir312-product-details">
                    <div class="product-details-lists-v2">
                        <div class="panel">
                            <div class="panel-title">
                                <h2 class="heading-1 mt0 ir218-collapse-heading">
                                    <a href="#JS-Diamond-details" class="td-n2 collapsed" onclick="ring_details_recommended_click(this,'Ring Details')" data-toggle="collapse" aria-expanded="true" role="button" aria-controls="JS-Diamond-details" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" data-acsb-hover="true">Ring Details
                                        <span class="iconfont iconfont-uparrow" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true"></span></a></h2>
                            </div>
                            <div class="collapse" id="JS-Diamond-details" style="height: 0px;" aria-hidden="true" data-acsb-hidden="true">
                                <div class="ir218-collapse-body">
                                    <div class="break-visible">
                                        <h3 class="h5 tr-u">Ring Information</h3>
                                        
  





  
    <dl>
      <dt>Style:</dt>
      <dd>
        
          
            BE1D54-18KW
          
        
      </dd>
    </dl>
  



  




  
  

  
    
  

  
    
      <dl>
        <dt>
          Metal:
        </dt>
        <dd>
          
            
              18K White Gold
            
          
        </dd>
      </dl>
    
  

  
    
      
        
      
    
  

  
    
  

  
    
  

  
  
  
  

  
    
    
    
      <dl>
        <dt>Average width:</dt>
        <dd>2.5 mm</dd>
      </dl>
    
  

  
  
  
  

  
    
  






  
    <dl>
      <dt>Rhodium finish:</dt>
      <dd>Yes</dd>
    </dl>
  



  





  <dl>
    <dt>Setting:</dt>
    <dd>Claw Prong</dd>
  </dl>



                                    </div>
                                    <!-- accent gemstones -->
                                    
  <div class="fore3">
    <h3 class="h5 tr-u">Accent Gemstones</h3>
    <div class="row">
      
        <div class="col-sm-12">
          <div class="accent-gemstones">
            


  


  
    <dl>
      <dt class="position-relative"><a class="iconfont iconfont-infoicon td-n2" href="javascript:void(0);" data-toggle="modal" data-target="#lab-cyo-ring" data-mobile-access="ture" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="-1" data-acsb-now-navigable="false" role="button" data-acsb-hover="true"><span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" cyo-ring " aria-hidden="false" data-acsb-hidden="false"></span></a>Type:</dt>
      <dd style="overflow: hidden; float: none;">Natural or lab diamond, depending on selected center diamond</dd>
    </dl>
  



  <dl>
    <dt class="position-relative">
      
          <a class="iconfont iconfont-infoicon td-n2" href="javascript:void(0);" data-toggle="modal" data-target="#shape" data-mobile-access="ture" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="-1" data-acsb-now-navigable="false" role="button" data-acsb-hover="true"><span class="sr-only" aria-hidden="false" data-acsb-hidden="false" data-acsb-sr-only="true" data-acsb-force-visible="true">shape</span></a>Shape:
       
    </dt>
    <dd>Round</dd>
  </dl>



  
    
      <dl>
        <dt>Number:</dt>
        <dd>36</dd>
      </dl>
    
  



  
    
      
        <dl>
          <dt class="position-relative">
            <a class="iconfont iconfont-infoicon td-n2" href="/product-information/#carat_weight" target="_blank" rel="nofollow noopener noreferrer" data-acsb-tooltip="New Window" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="-1" data-acsb-now-navigable="false" data-acsb-hover="true"><span class="sr-only" aria-hidden="false" data-acsb-hidden="false" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" New Window ">Min. carat total weight</span></a>
            Min. carat total weight:
          </dt>
          <dd>0.12</dd>
        </dl>
      
    
  





  <dl>
    <dt>Setting:</dt>
    <dd>Scalloped Pavé</dd>
  </dl>









  
    <dl>
      <dt class="position-relative">
        <a class="iconfont iconfont-infoicon td-n2" href="javascript:void(0);" data-toggle="modal" data-target="#modal_color" data-mobile-access="ture" data-value="F/G" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="-1" data-acsb-now-navigable="false" role="button" data-acsb-hover="true"><span class="sr-only" aria-hidden="false" data-acsb-hidden="false" data-acsb-sr-only="true" data-acsb-force-visible="true">Average Color</span></a>Average Color:
      </dt>
      <dd>F/G</dd>
    </dl>
  



  
    <dl>
      <dt class="position-relative">
        <a class="iconfont iconfont-infoicon td-n2" href="javascript:void(0);" data-toggle="modal" data-target="#modal_clarity" data-mobile-access="ture" data-value="SI1" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="-1" data-acsb-now-navigable="false" role="button" data-acsb-hover="true"><span class="sr-only" aria-hidden="false" data-acsb-hidden="false" data-acsb-sr-only="true" data-acsb-force-visible="true">Average Clarity</span></a>Average Clarity:
      </dt>
      <dd>SI1</dd>
    </dl>
  



  



  
    
  



  
  
    
  






          </div>
        </div>
        
          <div class="clearfix visible-sm"></div>
        
      
    </div>
  </div>
  <script type="text/javascript">
    var dl_num = $('.dl-one dl').length / 2 - 1;
    var _html = $('.dl-one dl:gt(' + dl_num + ')').html();
    $('.dl-one dl:gt(' + dl_num + ')').remove();
    $('#gemstone_details_two').html(_html)
  </script>


                                    <!-- diamond shape mobile -->
                                    
                                        <div class="">
                                            <h3 class="h5 tr-u">Center Diamond</h3>

  <p class="mt10">This ring can be set with:</p>

<div class="center-diamond-shape clearfix">

  
    <div class="media">
      <div class="media-img">
        <span class="ico-diamond-shap-round media-object" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true"></span>
      </div>
      <div class="media-body">
        <div class="h3 media-heading">Round</div>
      </div>
    </div>
  
    <div class="media">
      <div class="media-img">
        <span class="ico-diamond-shap-princess media-object" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true"></span>
      </div>
      <div class="media-body">
        <div class="h3 media-heading">Princess</div>
      </div>
    </div>
  
    <div class="media">
      <div class="media-img">
        <span class="ico-diamond-shap-cushion media-object" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true"></span>
      </div>
      <div class="media-body">
        <div class="h3 media-heading">Cushion</div>
      </div>
    </div>
  
    <div class="media">
      <div class="media-img">
        <span class="ico-diamond-shap-oval media-object" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true"></span>
      </div>
      <div class="media-body">
        <div class="h3 media-heading">Oval</div>
      </div>
    </div>
  
    <div class="media">
      <div class="media-img">
        <span class="ico-diamond-shap-emerald media-object" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true"></span>
      </div>
      <div class="media-body">
        <div class="h3 media-heading">Emerald</div>
      </div>
    </div>
  
    <div class="media">
      <div class="media-img">
        <span class="ico-diamond-shap-pear media-object" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true"></span>
      </div>
      <div class="media-body">
        <div class="h3 media-heading">Pear</div>
      </div>
    </div>
  
    <div class="media">
      <div class="media-img">
        <span class="ico-diamond-shap-radiant media-object" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true"></span>
      </div>
      <div class="media-body">
        <div class="h3 media-heading">Radiant</div>
      </div>
    </div>
  
    <div class="media">
      <div class="media-img">
        <span class="ico-diamond-shap-asscher media-object" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true"></span>
      </div>
      <div class="media-body">
        <div class="h3 media-heading">Asscher</div>
      </div>
    </div>
  
    <div class="media">
      <div class="media-img">
        <span class="ico-diamond-shap-marquise media-object" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true"></span>
      </div>
      <div class="media-body">
        <div class="h3 media-heading">Marquise</div>
      </div>
    </div>
  
    <div class="media">
      <div class="media-img">
        <span class="ico-diamond-shap-heart media-object" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true"></span>
      </div>
      <div class="media-body">
        <div class="h3 media-heading">Heart</div>
      </div>
    </div>
  

</div>
<p class="visible-xs mt10">Note: This setting is available only with purchase of a diamond.</p>

                                        </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="IR218-recently-viewed-bottom p-r ir312-recommend-carousel" id="recommend_for_you" role="region" data-acsb-carousel="true" data-acsb-force-visible="true" aria-label="Carousel"><div class="container cm-container" id="recommened_ms_312">
            <div class="row">
                
                <div class="col-sm-12">
                    <h2 class="heading-1 ir218-collapse-heading"><a href="#recommend-carousel" class="td-n2" onclick="ring_details_recommended_click(this, 'Recommended Bridal Sets')" data-toggle="collapse" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" data-acsb-hover="true">Recommended Bridal Sets<span class="iconfont iconfont-uparrow" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true"></span></a></h2>
                </div>
                <div class="col-sm-12 in" id="recommend-carousel">
                    <div class="list_carousel list_carousel_abtest mb-xs-0 responsive mb-xs-0">
                        <div class="caroufredsel_wrapper">
                            <div class="caroufredsel_wrapper" style="text-align: start; float: none; position: relative; inset: auto; z-index: auto; width: 378.484px; height: 286px; margin: 0px; overflow: hidden;" data-acsb-overflower="true">
							<ul class="recommended-for-you-items" data-circular="false" style="text-align: left; float: none; position: absolute; inset: 0px auto auto 10px; margin: 0px; width: 1578.48px; height: 286px;">
                                
                                <li style="margin-right: 0px;">
                                    <div class="thumbnail">
                                        <a href="/Petite-Twisted-Vine-Diamond-Bridal-Set-(1/4-ct.-tw.)-White-Gold-BE1D54-BE2M254P-3821862/" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Recommended Bridal Sets|1" data-noninteract="true" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" data-acsb-hover="true">
                                            
                                                <img width="180" height="180" src="//image.brilliantearth.com/media/cache/dc/7c/dc7c9c81aedad2b4a5c3769412ef5458.jpg" alt="18K White Gold Petite Twisted Vine Diamond Bridal Set (1/4 ct. tw.)">
                                            
                                            <div class="caption">
                                                <div class="h3 change_with_style" data-toggle="clamp" data-item="Matched Sets" data-fake="" style="overflow: hidden; text-overflow: ellipsis; -webkit-box-orient: vertical; display: -webkit-box; -webkit-line-clamp: 4;">Petite Twisted Vine Bridal Set</div>
                                                <p class="price"> $2,240</p>
                                            </div>
                                        </a>
                                        
                                            <span class="perfect-match type type-only"><span class="glyphicon glyphicon-leaf fs-11" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true"></span> perfect match</span>
                                        
                                    </div>
                                </li>
                                
                                <li style="margin-right: 0px;">
                                    <div class="thumbnail">
                                        <a href="/Petite-Twisted-Vine-Contoured-Diamond-Bridal-Set-(1/3-ct.-tw.)-White-Gold-BE1D54-BE2D228-5293987/" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Recommended Bridal Sets|2" data-noninteract="true" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" data-acsb-hover="true">
                                            
                                                <img width="180" height="180" src="//image.brilliantearth.com/media/cache/ef/95/ef95dfad5cfc227aab3f584cc8cd4b5f.jpg" alt="18K White Gold Petite Twisted Vine Contoured Diamond Bridal Set (1/3 ct. tw.)">
                                            
                                            <div class="caption">
                                                <div class="h3 change_with_style" data-toggle="clamp" data-item="Matched Sets" data-fake="" style="overflow: hidden; text-overflow: ellipsis; -webkit-box-orient: vertical; display: -webkit-box; -webkit-line-clamp: 4;">Petite Twisted Vine Contoured Bridal Set</div>
                                                <p class="price"> $2,740</p>
                                            </div>
                                        </a>
                                        
                                            <span class="perfect-match type type-only"><span class="glyphicon glyphicon-leaf fs-11" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true"></span> perfect match</span>
                                        
                                    </div>
                                </li>
                                
                                <li style="margin-right: 9px;">
                                    <div class="thumbnail">
                                        <a href="/Petite-Twisted-Vine-Diamond-Ring-(1/8-ct.-tw.)-with-Twisted-Vine-Ring-White-Gold-BE1D54-BE2M56D-3821876/" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Recommended Bridal Sets|3" data-noninteract="true" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" data-acsb-hover="true">
                                            
                                                <img width="180" height="180" src="//image.brilliantearth.com/media/cache/bc/ca/bcca988ee842bda0bb41a0f23c564073.jpg" alt="18K White Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.) with Twisted Vine Ring">
                                            
                                            <div class="caption">
                                                <div class="h3 change_with_style" data-toggle="clamp" data-item="Matched Sets" data-fake="True" style="overflow: hidden; text-overflow: ellipsis; -webkit-box-orient: vertical; display: -webkit-box; -webkit-line-clamp: 4;" data-acsb-overflower="true">Petite Twisted Vine <span style="text-transform:lowercase">with</span> Twisted Vine</div>
                                                <p class="price"> $2,100</p>
                                            </div>
                                        </a>
                                        
                                    </div>
                                </li>
                                
                                <li style="margin-right: 0px;" aria-hidden="false" data-acsb-hidden="false">
                                    <div class="thumbnail" aria-hidden="true" data-acsb-hidden="true">
                                        <a href="/Petite-Twisted-Vine-Diamond-Ring-(1/8-ct.-tw.)-with-Petite-Luxe-Twisted-Vine-Diamond-Ring-(1/3-ct.-tw.)-White-Gold-BE1D54-BE2M9856-3821881/" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Recommended Bridal Sets|4" data-noninteract="true" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="-1" data-acsb-now-navigable="false" data-acsb-hover="true">
                                            
                                                <img width="180" height="180" src="//image.brilliantearth.com/media/cache/c9/06/c906ed5e564c15eb8c569423d7472d8c.jpg" alt="18K White Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.) with Petite Luxe Twisted Vine Diamond Ring (1/3 ct. tw.)">
                                            
                                            <div class="caption">
                                                <div class="h3 change_with_style" data-toggle="clamp" data-item="Matched Sets" data-fake="True" style="overflow: hidden; text-overflow: ellipsis; -webkit-box-orient: vertical; display: -webkit-box; -webkit-line-clamp: 4;">Petite Twisted Vine <span style="text-transform:lowercase">with</span> Petite Luxe Twisted Vine</div>
                                                <p class="price"> $2,900</p>
                                            </div>
                                        </a>
                                        
                                    </div>
                                </li>
                                
                                <li style="margin-right: 0px;" aria-hidden="false" data-acsb-hidden="false">
                                    <div class="thumbnail" aria-hidden="true" data-acsb-hidden="true">
                                        <a href="/Petite-Twisted-Vine-Diamond-Ring-(1/8-ct.-tw.)-with-Petite-Twisted-Vine-Eternity-Diamond-Ring-(1/5-ct.-tw.)-White-Gold-BE1D54-BE2D509E-6395723/" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Recommended Bridal Sets|5" data-noninteract="true" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="-1" data-acsb-now-navigable="false" data-acsb-hover="true">
                                            
                                                <img width="180" height="180" src="//image.brilliantearth.com/media/cache/ec/14/ec1479b7eb8b117ceb9df201be1fa6ca.jpg" alt="18K White Gold Petite Twisted Vine Diamond Ring (1/8 ct. tw.) with Petite Twisted Vine Eternity Diamond Ring (1/5 ct. tw.)">
                                            
                                            <div class="caption">
                                                <div class="h3 change_with_style" data-toggle="clamp" data-item="Matched Sets" data-fake="True" style="overflow: hidden; text-overflow: ellipsis; -webkit-box-orient: vertical; display: -webkit-box; -webkit-line-clamp: 4;">Petite Twisted Vine <span style="text-transform:lowercase">with</span> Petite Twisted Vine Eternity</div>
                                                <p class="price"> $2,540</p>
                                            </div>
                                        </a>
                                        
                                    </div>
                                </li>
                                
                            </ul></div>
                        </div>
                        <div class="clearfix" aria-hidden="true" data-acsb-hidden="true"></div>
                        <a id="prev3" class="prev disabled" href="#" style="display: inline;" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" role="button" data-acsb-hover="true"><span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Previous " aria-hidden="false" data-acsb-hidden="false"></span><i class="icons-chevron-left-gray" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true"></i></a>
                        <a id="next3" class="next" href="#" style="display: inline;" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" role="button" data-acsb-hover="true"><span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next " aria-hidden="false" data-acsb-hidden="false"></span><i class="icons-chevron-right-gray" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true"></i></a>
                        <div class="clearfix" aria-hidden="true" data-acsb-hidden="true"></div>
                    </div>
                </div>
                
            </div>
        </div></div>
                <script type="text/javascript">
				var Sys.country = 'in';
                    function get_recommended_for_you_dt_cyo_ring(params){
                    //country make nginx cache price is correct
                    params['country']= Sys.country;
                    $.ajax({
                        type:'get',
                        url:'/main/recommended-for-you/?is_cyo_ring_step=true',
                        data:params,
                        cache:true,
                        success:function(data){
                            $html = $(data);
                            $recommend = $html.find('#recommened_ms_312')
                            if ($recommend.length > 0){
                                $('#recommend_for_you').html($recommend.eq(0));
                            }
                            $similar = $html.find('#similar_v1_312')
                            if ($similar.length > 0){
                                $('#similar_for_you').html($similar.eq(0));
                            }
                            init_carousel($('.recommended-for-you-items'));
                            $('.simultaneous-show-recommended img').load(function() {
                              var load_class = $(this).data('lc');
                              var simultaneous_span = $(this).parent('span');
                            if (simultaneous_span.hasClass('simultaneous-show-recommended')) {
                              simultaneous_span.addClass(load_class);
                            }
                            }).each(function() {
                              if (this.complete) {
                                $(this).load();
                              }
                            });
                            // handle_product_description($('.IR218-recommended-matching-carousel .text-xs, .IR218-recommended-matching-carousel .h3 a, .IR218-recommended-matching-carousel .h3, .IR218-cut-product-name h3'));
                            // handle_product_description($('.IR218-recommended-matching-carousel .text-xs, .IR218-recommended-matching-carousel .h3 a'));
                            handle_product_description($('.IR218-recently-viewed-bottom .recommended-for-you-items .h3'));
                            init_clamp('#recommend_for_you div.caption > div.h3');
                            if($('.wishlist_check_similar').hasClass('settings')){
                                var $wishlist_similar = $('.wishlist_check_similar');
                                for (var i=0; i<$wishlist_similar.length;i++){
                                    {
                                        var param = {'product_id': $wishlist_similar.eq(i).attr('data-product'), 'page_info': 'settings'}
                                        wishlist_check_similar_ajax($wishlist_similar.eq(i), param, 'settings', '.ir226-pdp-countdown-timer.holiday_notes')
                                    }
                                }
                            }
                        }
                    });
                }
                  var is_cyo_ring_step = "true";
                  var is_matched_set = "False";
                  var product_id = "3821855";
                  var select_shape = "Round";
                  var did = "";
                  var diamond_shape = '';
                  var diamond_carat = '';
                  var diamond_category = '';
                  var diamond_dict = diamond_shape + ',' + diamond_carat + ',' + diamond_category;
                  var template_name = "recommended_two_section_items";
                  var has_recent_right = true;
                  var setting_diamond_category = 'Loose Diamonds';
                  var track_info = '';
                  
                    track_info = {'category': 'Product Detail Page', 'action': 'CYO Rings', 'label_prefix': 'Setting|Diamond', 'step': 'false'};
                  
                  var params = {
                      is_cyo_ring_step: is_cyo_ring_step,
                      product_id: product_id,
                      shape: select_shape,
                      did: did,
                      diamond_dict: diamond_dict,
                      template_name: template_name,
                      has_recent_right: has_recent_right,
                      setting_diamond_category: setting_diamond_category,
                      track_info: JSON.stringify(track_info),
                  };
                  get_recommended_for_you_dt_cyo_ring(params);
                </script>
                
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container container1260 luxury-consience-container forever-highlight pt-30 pb-30">
    <div class="row">
        <div class="col-sm-6">
            <div class="luxury-consience-left center-block">
                <h2 class="ir251-headline h2 text-left">Made Just for You</h2>
                <div class="">
                    <p class="luxury-consience-text">
                        At our San Francisco design studio, our team designs every ring to delight you, from the first time you see it and every day after. We carefully consider the entire piece—obsessing over comfort, quality, and durability so you can cherish it for a lifetime.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="pdp-collapse-wrapper" id="Design-Crafts" role="tablist">
                <div class="pdp-collapse-panel panel">
                    <div class="panel-title fore1" role="tab">
                        <div class="h5">
                            <a class="collapsed" onclick="setting_ga_click(this, 'Beyond Conflict Free')" role="button" data-toggle="collapse" href="#JS-beyond-conflict" data-parent="#Design-Crafts" aria-expanded="true" aria-controls="JS-beyond-conflict" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" data-acsb-hover="true">
                                <h3 class="fs-18 h3 mb0 mt0">Beyond Conflict Free<sup>TM</sup></h3>
                                <small>Setting a higher ethical standard</small>
                                <span class="iconfont iconfont-uparrow" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true"></span>
                            </a>
                        </div>
                    </div>
                    <div id="JS-beyond-conflict" class="collapse" aria-hidden="true" data-acsb-hidden="true">
                        <div class="pdp-collapse-body">
                            At Brilliant Earth we’ve set a new standard in diamond sourcing: Beyond Conflict Free™. We only accept diamonds from specific mine operations and countries that follow internationally recognized labor, trade, and environmental standards. While the Kimberly Process has made advancements in reducing conflict diamonds, it remains flawed and still leaves diamonds tainted by human rights abuses and environmental degradation in the supply chain.
                        </div>
                    </div>
                </div>
                
                <div class="pdp-collapse-panel panel">
                    <div class="collapsed panel-title fore2-v2" role="tab">
                        <div class="h5">
                            <a class="collapsed" onclick="setting_ga_click(this, 'Recycled Metal')" role="button" data-toggle="collapse" href="#JS-beyond-conflict2" data-parent="#Design-Crafts" aria-expanded="true" aria-controls="JS-beyond-conflict2" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" data-acsb-hover="true">
                                <h3 class="fs-18 h3 mb0 mt0">Recycled Precious Metals</h3><small>High quality and responsibly sourced</small>
                            <span class="iconfont iconfont-uparrow" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true"></span></a></div>

                    </div>
                    <div id="JS-beyond-conflict2" class="collapse" aria-hidden="true" data-acsb-hidden="true">
                        <div class="pdp-collapse-body">
                            Our metals are created from existing gold jewelry and excess production metal, sourced from refiners that have been audited by the Responsible Jewellery Council, Responsible Mining Initiative, and London Bullion Market Association.
                        </div>
                    </div>
                </div>
                
                <div class="pdp-collapse-panel panel">
                    <div class="collapsed panel-title fore3" role="tab">
                        <div class="h5">
                            <a class="collapsed" onclick="setting_ga_click(this, 'Giving Back')" role="button" data-toggle="collapse" href="#JS-beyond-conflict3" data-parent="#Design-Crafts" aria-expanded="true" aria-controls="JS-beyond-conflict3" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" data-acsb-hover="true">
                                <h3 class="fs-18 h3 mb0 mt0">Giving Back</h3>
                                <small>Support for causes that matter</small>
                            <span class="iconfont iconfont-uparrow" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true"></span></a></div>
                    </div>
                    <div id="JS-beyond-conflict3" class="collapse" aria-hidden="true" data-acsb-hidden="true">
                        <div class="pdp-collapse-body">
                            Brilliant Earth gives back to help build a brighter future in mining communities and in the communities we operate. We also donate to programs that are dedicated to improving human rights and environmental practices in our industry, including Feeding America, the Rainforest Alliance, and the NAACP Legal Defense and Educational Fund.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
<div class="IR218-recently-viewed-bottom p-r ir313-recommend-carousel-3items" id="similar_for_you" role="region" data-acsb-carousel="true" data-acsb-force-visible="true" aria-label="Carousel"><div class="container container1260 mb20 mt-xs-0 mb-xs-0 mt-50 pt-10 pb-10" id="similar_v1_312">
        <div class="row">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-12">
                  <h2 class="heading-1">Other Engagement Rings You’ll Love</h2>
                </div>
                <div class="col-md-12">
                  <div class="list_carousel list_carousel_abtest responsive">
                    <div class="caroufredsel_wrapper">
                      <div class="caroufredsel_wrapper" style="text-align: start; float: none; position: relative; inset: auto; z-index: auto; width: 1260px; height: 286px; margin: 0px; overflow: hidden;" data-acsb-overflower="true"><ul class="recommended-for-you-items" data-circular="false" style="text-align: left; float: none; position: absolute; inset: 0px auto auto 410px; margin: 0px; width: 2140px; height: 286px;">
                      
                        <li style="margin-right: 20px;">
                          <div class="thumbnail p-r">
                              <span class="settings ir312-similar-heart wishlist_check_similar niwl" data-toggle="wishlist" data-return-item="true" data-notitle="true" data-product="1554570" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="0" data-acsb-now-navigable="true" role="button" data-acsb-textual-ops="favorites"><span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Favorites " aria-hidden="false" data-acsb-hidden="false"></span><i class="iconfont iconfont-heart" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true"></i></span>

                            <a href="/Petite-Twisted-Vine-Halo-Diamond-Ring-(1/4-ct.-tw.)-White-Gold-BE1M54DH-1554570/" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Shop Similar Styles|" data-noninteract="true" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" data-acsb-hover="true">
                              
                                <img width="180" src="//image.brilliantearth.com/media/cache/c0/10/c010f374fdf4c2715991f68306d16255.jpg" alt="18K White Gold Petite Twisted Vine Halo Diamond Ring (1/4 ct. tw.)">
                              
                              <div class="caption">
                                <div class="h3" data-item="CYO Rings">Petite Twisted Vine Halo</div>
                                
                                  <p class="price">$1,990</p>
                                
                              </div>
                            </a>
                              
                          </div>
                        </li>
                      
                        <li style="margin-right: 430px;">
                          <div class="thumbnail p-r">
                              <span class="settings ir312-similar-heart wishlist_check_similar niwl" data-toggle="wishlist" data-return-item="true" data-notitle="true" data-product="3015415" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="0" data-acsb-now-navigable="true" role="button" data-acsb-textual-ops="favorites"><span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Favorites " aria-hidden="false" data-acsb-hidden="false"></span><i class="iconfont iconfont-heart" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true"></i></span>

                            <a href="/Three-Stone-Petite-Twisted-Vine-Diamond-Ring-(2/5-ct.-tw.)-White-Gold-BE1M30D-3015415/" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Shop Similar Styles|" data-noninteract="true" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" data-acsb-hover="true">
                              
                                <img width="180" src="//image.brilliantearth.com/media/cache/ff/22/ff22ead6970e0c9b922c215f85fcaf23.jpg" alt="18K White Gold Three Stone Petite Twisted Vine Diamond Ring (2/5 ct. tw.)">
                              
                              <div class="caption">
                                <div class="h3" data-item="CYO Rings">Three Stone Petite Twisted Vine</div>
                                
                                  <p class="price">$1,990</p>
                                
                              </div>
                            </a>
                              
                          </div>
                        </li>
                      
                      </ul></div></div>
                    <div class="clearfix" aria-hidden="true" data-acsb-hidden="true"></div>
                    <a id="prev3_similar" class="prev hidden disabled" href="#" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Shop Similar Styles|Previous" data-noninteract="true" style="display: none;" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="-1" data-acsb-now-navigable="false" aria-hidden="true" data-acsb-hidden="true" role="button" data-acsb-hover="true"><span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Previous " aria-hidden="false" data-acsb-hidden="false"></span><i class="icons-chevron-left-gray" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true"></i></a>
                    <a id="next3_similar" class="next hidden" href="#" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Shop Similar Styles|Next" data-noninteract="true" style="display: none;" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="-1" data-acsb-now-navigable="false" aria-hidden="true" data-acsb-hidden="true" role="button" data-acsb-hover="true"><span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next " aria-hidden="false" data-acsb-hidden="false"></span><i class="icons-chevron-right-gray" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true"></i></a>
                    <div class="clearfix" aria-hidden="true" data-acsb-hidden="true"></div>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div></div>



<div class="ir298-customer-reviews pt-60 pt-xs-0 mb-30 mb-xs-0 pb-60 box-gray1 pb-xs-0" id="ReviewHeader">
  <div class="container">
    <div class="row">
      <div class="indented-slickbox col-md-12" id="customer-reviews-slidebox">
        <header class="carat-comparisons">
          <h2 class="ir298-pdp-heading mt0">Reviews</h2>
           <!--<a href="/engagement-ring-settings/" class="ir251-link-text ml-auto hidden-xs">Shop All</a>-->
          <div class="slick-control"><span class="iconfont iconfont-left slick-disabled" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image|Previous" data-noninteract="true" style="" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true"></span><span class="iconfont iconfont-right" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image|Next" data-noninteract="true" style="" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="0" data-acsb-now-navigable="true" role="button" data-acsb-textual-ops="next"><span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next " aria-hidden="false" data-acsb-hidden="false"></span></span></div>
        </header>
        <div class="position-relative mb-30 ir309-review-slicks">
          <div class="cr-leading">
            <div class="ir218-total-score ir298-total-score">
              <div class="title" data-rating="5.0">5.0</div>
              <div class="ir218-snippet-stars ir298-snippet-stars" data-acsb-possible-star="true"> <span class="ir218-stars" style="background-position:left -200.0px;" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true"></span> </div>
            </div>
            <div class="ir218-snippet-read-write ir298-snippet-read-write">
              <span class="ir218-snippet-write-review">187 Reviews</span>
            </div>
            <div class="extra-action">
              <div class="hidden-xs-inline">
                <a class="text-66 tt-n td-u2" href="https://www.brilliantearth.com/review/?pr_page_id=BE1D54-18KW" onclick="track_event('Product Detail Page','CYO Rings','Setting|Diamond|Reviews|Leave Review', true)" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" data-acsb-scrape-url="https://brilliantearth.com/review/" data-acsb-hover="true">Leave a Review</a></div>
              </div>
            </div>
            <div class="indented-slick shop-by-style-slide slick-initialized slick-slider" id="customer-reviews-slide" data-acsb-overflower="true" role="region" data-acsb-carousel="true" data-acsb-force-visible="true" aria-label="Carousel">
              
                <div class="slick-list draggable"><div class="slick-track" style="opacity: 1; width: 6768px; transform: translate3d(0px, 0px, 0px);"><div data-slide="9955x1" class="image-popup-slide slick-slide slick-active" data-slick-index="0" style="width: 144px;">
                  <div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-overflower="true" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="0" data-acsb-now-navigable="true" role="button" data-acsb-carousel-paging="true">
                    <span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 1" aria-hidden="false" data-acsb-hidden="false"></span><div>
                      <img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/xg7mcptd0rrdas6apvr0.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
                    </div>
                  </div>
                </div><div data-slide="9773x1" class="image-popup-slide slick-slide slick-active" data-slick-index="1" style="width: 144px;">
                  <div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-overflower="true" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="0" data-acsb-now-navigable="true" role="button" data-acsb-carousel-paging="true">
                    <span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 2" aria-hidden="false" data-acsb-hidden="false"></span><div>
                      <img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/cwyocyoc7ky9fzchppan.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
                    </div>
                  </div>
                </div><div data-slide="9446x1" class="image-popup-slide slick-slide slick-active" data-slick-index="2" style="width: 144px;">
                  <div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-overflower="true" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="0" data-acsb-now-navigable="true" role="button" data-acsb-carousel-paging="true">
                    <span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 3" aria-hidden="false" data-acsb-hidden="false"></span><div>
                      <img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/pk04v1dvwkwsd2yyx0fl.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
                    </div>
                  </div>
                </div><div data-slide="9136x1" class="image-popup-slide slick-slide slick-active" data-slick-index="3" style="width: 144px;">
                  <div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-overflower="true" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="0" data-acsb-now-navigable="true" role="button" data-acsb-carousel-paging="true">
                    <span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 4" aria-hidden="false" data-acsb-hidden="false"></span><div>
                      <img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/wdwpucuzjilzzozk2dcy.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
                    </div>
                  </div>
                </div><div data-slide="8790x1" class="image-popup-slide slick-slide slick-active" data-slick-index="4" style="width: 144px;">
                  <div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-overflower="true" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="0" data-acsb-now-navigable="true" role="button" data-acsb-carousel-paging="true">
                    <span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 5" aria-hidden="false" data-acsb-hidden="false"></span><div>
                      <img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/grlazjla8bht9z5073he.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
                    </div>
                  </div>
                </div><div data-slide="8790x2" class="image-popup-slide slick-slide slick-active" data-slick-index="5" style="width: 144px;">
                  <div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-overflower="true" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="0" data-acsb-now-navigable="true" role="button" data-acsb-carousel-paging="true">
                    <span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 6" aria-hidden="false" data-acsb-hidden="false"></span><div>
                      <img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/amhbdahk6zzvlef0nl2v.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
                    </div>
                  </div>
                </div><div data-slide="8790x3" class="image-popup-slide slick-slide" data-slick-index="6" style="width: 144px;" aria-hidden="false" data-acsb-hidden="false">
                  <div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" role="button" data-acsb-carousel-paging="true" data-acsb-overflower="true" tabindex="0">
                    <span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 7" aria-hidden="false" data-acsb-hidden="false"></span><div>
                      <img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/is0zvkpl7jdeucwku7zb.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
                    </div>
                  </div>
                </div><div data-slide="8675x1" class="image-popup-slide slick-slide" data-slick-index="7" style="width: 144px;" aria-hidden="false" data-acsb-hidden="false">
                  <div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" role="button" data-acsb-carousel-paging="true" data-acsb-overflower="true" tabindex="0">
                    <span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 8" aria-hidden="false" data-acsb-hidden="false"></span><div>
                      <img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/jwot0nzrp1hz3bobuk6e.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
                    </div>
                  </div>
                </div><div data-slide="8665x1" class="image-popup-slide slick-slide" data-slick-index="8" style="width: 144px;" aria-hidden="false" data-acsb-hidden="false">
                  <div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" role="button" data-acsb-carousel-paging="true" data-acsb-overflower="true" tabindex="0">
                    <span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 9" aria-hidden="false" data-acsb-hidden="false"></span><div>
                      <img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/zdr44xzlr6dwe2qj3ert.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
                    </div>
                  </div>
                </div><div data-slide="8499x1" class="image-popup-slide slick-slide" data-slick-index="9" style="width: 144px;" aria-hidden="false" data-acsb-hidden="false">
                  <div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" role="button" data-acsb-carousel-paging="true" data-acsb-overflower="true" tabindex="0">
                    <span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 10" aria-hidden="false" data-acsb-hidden="false"></span><div>
                      <img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/tanxpgimbtb0zhkiodxf.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
                    </div>
                  </div>
                </div><div data-slide="8499x2" class="image-popup-slide slick-slide" data-slick-index="10" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
                  <div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
                    <span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 11" aria-hidden="false" data-acsb-hidden="false"></span><div>
                      <img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/lxil8svqa62qw3kn57tu.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
                    </div>
                  </div>
                </div><div data-slide="8355x1" class="image-popup-slide slick-slide" data-slick-index="11" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
                  <div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
                    <span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 12" aria-hidden="false" data-acsb-hidden="false"></span><div>
                      <img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/uprxo258ul3ruygtobld.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
                    </div>
                  </div>
                </div><div data-slide="8299x1" class="image-popup-slide slick-slide" data-slick-index="12" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
                  <div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
                    <span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 13" aria-hidden="false" data-acsb-hidden="false"></span><div>
                      <img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/vmppooppvliilrrhalwk.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
                    </div>
                  </div>
                </div><div data-slide="8285x1" class="image-popup-slide slick-slide" data-slick-index="13" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
                  <div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
                    <span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 14" aria-hidden="false" data-acsb-hidden="false"></span><div>
                      <img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/k1oukeqkifag8nsixmoa.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
                    </div>
                  </div>
                </div><div data-slide="8285x2" class="image-popup-slide slick-slide" data-slick-index="14" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
                  <div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
                    <span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 15" aria-hidden="false" data-acsb-hidden="false"></span><div>
                      <img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/aicedpa8hodzoccxpzb6.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
                    </div>
                  </div>
                </div><div data-slide="8140x1" class="image-popup-slide slick-slide" data-slick-index="15" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
                  <div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
                    <span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 16" aria-hidden="false" data-acsb-hidden="false"></span><div>
                      <img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/eqnxonebgnfyawqqlf7s.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
                    </div>
                  </div>
                </div><div data-slide="8140x2" class="image-popup-slide slick-slide" data-slick-index="16" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
                  <div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
                    <span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 17" aria-hidden="false" data-acsb-hidden="false"></span><div>
                      <img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/zpnygdaic0fcaseuhhyn.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
                    </div>
                  </div>
                </div><div data-slide="8140x3" class="image-popup-slide slick-slide" data-slick-index="17" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
                  <div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
                    <span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 18" aria-hidden="false" data-acsb-hidden="false"></span><div>
                      <img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/tptfj3rq9cojes8ff5aq.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
                    </div>
                  </div>
                </div><div data-slide="8140x4" class="image-popup-slide slick-slide" data-slick-index="18" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
                  <div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
                    <span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 19" aria-hidden="false" data-acsb-hidden="false"></span><div>
                      <img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/hruidxdtuywpdpdsbdxr.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
                    </div>
                  </div>
                </div><div data-slide="8114x1" class="image-popup-slide slick-slide" data-slick-index="19" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
                  <div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
                    <span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 20" aria-hidden="false" data-acsb-hidden="false"></span><div>
                      <img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/lz2ctwefiqfc9efud8fi.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
                    </div>
                  </div>
                </div><div data-slide="8057x1" class="image-popup-slide slick-slide" data-slick-index="20" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
                  <div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
                    <span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 21" aria-hidden="false" data-acsb-hidden="false"></span><div>
                      <img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/bz0buyczkebflfynhvac.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
                    </div>
                  </div>
                </div><div data-slide="7828x1" class="image-popup-slide slick-slide" data-slick-index="21" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
                  <div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
                    <span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 22" aria-hidden="false" data-acsb-hidden="false"></span><div>
                      <img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/i6jxrlyqjepbjkvk4lih.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
                    </div>
                  </div>
                </div><div data-slide="7587x1" class="image-popup-slide slick-slide" data-slick-index="22" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
                  <div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
                    <span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 23" aria-hidden="false" data-acsb-hidden="false"></span><div>
                      <img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/plldapobyh9j3rv81myp.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
                    </div>
                  </div>
                </div><div data-slide="7588x1" class="image-popup-slide slick-slide" data-slick-index="23" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
                  <div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
                    <span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 24" aria-hidden="false" data-acsb-hidden="false"></span><div>
                      <img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/ixmbu4ke1d99jubop104.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
                    </div>
                  </div>
                </div><div data-slide="7469x1" class="image-popup-slide slick-slide" data-slick-index="24" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
                  <div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
                    <span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 25" aria-hidden="false" data-acsb-hidden="false"></span><div>
                      <img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/dai6bi4soqvukqqbhfsh.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
                    </div>
                  </div>
                </div><div data-slide="7144x1" class="image-popup-slide slick-slide" data-slick-index="25" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
                  <div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
                    <span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 26" aria-hidden="false" data-acsb-hidden="false"></span><div>
                      <img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/ksjhamjul5vntynkuhh6.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
                    </div>
                  </div>
                </div><div data-slide="7109x1" class="image-popup-slide slick-slide" data-slick-index="26" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
                  <div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
                    <span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 27" aria-hidden="false" data-acsb-hidden="false"></span><div>
                      <img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/ftutkmtdz68xhvvclvt3.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
                    </div>
                  </div>
                </div><div data-slide="7087x1" class="image-popup-slide slick-slide" data-slick-index="27" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
                  <div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
                    <span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 28" aria-hidden="false" data-acsb-hidden="false"></span><div>
                      <img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/tuburhubhhp6yjmf91g4.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
                    </div>
                  </div>
                </div><div data-slide="6274x1" class="image-popup-slide slick-slide" data-slick-index="28" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
                  <div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
                    <span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 29" aria-hidden="false" data-acsb-hidden="false"></span><div>
                      <img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/zfymtclmrhfhsoyn9qor.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
                    </div>
                  </div>
                </div><div data-slide="5431x1" class="image-popup-slide slick-slide" data-slick-index="29" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
                  <div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
                    <span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 30" aria-hidden="false" data-acsb-hidden="false"></span><div>
                      <img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/md1meqpuzohhsgw83t8r.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
                    </div>
                  </div>
                </div><div data-slide="4788x1" class="image-popup-slide slick-slide" data-slick-index="30" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
                  <div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
                    <span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 31" aria-hidden="false" data-acsb-hidden="false"></span><div>
                      <img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/zlepdvtolbs3zeuz438m.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
                    </div>
                  </div>
                </div><div data-slide="4788x2" class="image-popup-slide slick-slide" data-slick-index="31" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
                  <div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
                    <span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 32" aria-hidden="false" data-acsb-hidden="false"></span><div>
                      <img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/cia3iutjzuifmgsdjjgy.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
                    </div>
                  </div>
                </div><div data-slide="4734x1" class="image-popup-slide slick-slide" data-slick-index="32" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
                  <div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
                    <span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 33" aria-hidden="false" data-acsb-hidden="false"></span><div>
                      <img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/qskrrmconyecs6a3oa8d.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
                    </div>
                  </div>
                </div><div data-slide="4609x1" class="image-popup-slide slick-slide" data-slick-index="33" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
                  <div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
                    <span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 34" aria-hidden="false" data-acsb-hidden="false"></span><div>
                      <img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/zyilgjzmt3k83px5dpug.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
                    </div>
                  </div>
                </div><div data-slide="4531x1" class="image-popup-slide slick-slide" data-slick-index="34" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
                  <div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
                    <span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 35" aria-hidden="false" data-acsb-hidden="false"></span><div>
                      <img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/f_auto,w_576,h_768/prod/iyqsg9xsxv9j38h1xdpw.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
                    </div>
                  </div>
                </div><div data-slide="3829x1" class="image-popup-slide slick-slide" data-slick-index="35" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
                  <div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
                    <span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 36" aria-hidden="false" data-acsb-hidden="false"></span><div>
                      <img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/qmjt517prceankc9zmpp.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
                    </div>
                  </div>
                </div><div data-slide="3723x1" class="image-popup-slide slick-slide" data-slick-index="36" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
                  <div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
                    <span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 37" aria-hidden="false" data-acsb-hidden="false"></span><div>
                      <img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/euvlu1cg4eletwxxwavq.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
                    </div>
                  </div>
                </div><div data-slide="3628x1" class="image-popup-slide slick-slide" data-slick-index="37" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
                  <div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
                    <span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 38" aria-hidden="false" data-acsb-hidden="false"></span><div>
                      <img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/epgbd4eag5is21y1y4vj.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
                    </div>
                  </div>
                </div><div data-slide="3624x1" class="image-popup-slide slick-slide" data-slick-index="38" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
                  <div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
                    <span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 39" aria-hidden="false" data-acsb-hidden="false"></span><div>
                      <img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/y7gm2fulcfyz3gum6beq.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
                    </div>
                  </div>
                </div><div data-slide="3608x1" class="image-popup-slide slick-slide" data-slick-index="39" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
                  <div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
                    <span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 40" aria-hidden="false" data-acsb-hidden="false"></span><div>
                      <img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/bg2wifz6w7esfdmknram.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
                    </div>
                  </div>
                </div><div data-slide="3274x1" class="image-popup-slide slick-slide" data-slick-index="40" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
                  <div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
                    <span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 41" aria-hidden="false" data-acsb-hidden="false"></span><div>
                      <img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/a4cq4jpexohxxomvoirn.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
                    </div>
                  </div>
                </div><div data-slide="2849x1" class="image-popup-slide slick-slide" data-slick-index="41" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
                  <div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
                    <span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 42" aria-hidden="false" data-acsb-hidden="false"></span><div>
                      <img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/qqzorvzkhn2quruilw8r.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
                    </div>
                  </div>
                </div><div data-slide="2801x1" class="image-popup-slide slick-slide" data-slick-index="42" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
                  <div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
                    <span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 43" aria-hidden="false" data-acsb-hidden="false"></span><div>
                      <img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/sfmk9w4gy0iyyptwrokc.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
                    </div>
                  </div>
                </div><div data-slide="2801x2" class="image-popup-slide slick-slide" data-slick-index="43" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
                  <div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
                    <span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 44" aria-hidden="false" data-acsb-hidden="false"></span><div>
                      <img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/poa9ps8trqxwo5hamvpt.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
                    </div>
                  </div>
                </div><div data-slide="2703x1" class="image-popup-slide slick-slide" data-slick-index="44" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
                  <div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
                    <span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 45" aria-hidden="false" data-acsb-hidden="false"></span><div>
                      <img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/rrswu2b85wauvau4pohi.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
                    </div>
                  </div>
                </div><div data-slide="654x1" class="image-popup-slide slick-slide" data-slick-index="45" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
                  <div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
                    <span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 46" aria-hidden="false" data-acsb-hidden="false"></span><div>
                      <img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/jfhgwfvqltwhbrw7zrer.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
                    </div>
                  </div>
                </div><div data-slide="655x1" class="image-popup-slide slick-slide" data-slick-index="46" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
                  <div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
                    <span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 47" aria-hidden="false" data-acsb-hidden="false"></span><div>
                      <img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/hpxabairmcyq0vxt2b82.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
                    </div>
                  </div>
                </div></div><i class="c1" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true"></i><i class="c2" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true"></i><i class="c" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true"></i></div>
              
                
              
                
              
                
              
                
              
                
              
                
              
                
              
                
              
                
              
                
              
                
              
                
              
                
              
                
              
                
              
                
              
                
              
                
              
                
              
                
              
                
              
                
              
                
              
                
              
                
              
                
              
                
              
                
              
                
              
                
              
                
              
                
              
                
              
                
              
                
              
                
              
                
              
                
              
                
              
                
              
                
              
                
              
                
              
                
              
                
              
                
              
            </div>
            <div class="dropdown ir218-dropdown-sort-by">
              <a id="sort" data-target="#" href="#" class="dropdown-toggle tt-c" data-toggle="dropdown" role="button" aria-expanded="false" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" data-acsb-hover="true">
                <span>sort:</span>
                <span class="sort-result" id="sort_by_btn" data-value="" data-init="">highest rating</span>
                <span class="caret" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true"></span>
              </a>
              <div class="dropdown-content" aria-labelledby="sort" aria-hidden="true" data-acsb-hidden="true">
                <dl class="sort-by" id="sort_by">
                  <dd>
                    <a class="sort-option google-event-tracker" href="javascript:void(0);" data-value="newest" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="-1" data-acsb-now-navigable="false" role="button" data-acsb-hover="true">newest</a>
                  </dd>
                  <dd>
                    <a class="sort-option google-event-tracker" href="javascript:void(0);" data-value="oldest" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="-1" data-acsb-now-navigable="false" role="button" data-acsb-hover="true">oldest</a>
                  </dd>
                  <dd>
                    <a class="sort-option google-event-tracker" href="javascript:void(0);" data-value="highest rating" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="-1" data-acsb-now-navigable="false" role="button" data-acsb-hover="true">highest rating</a>
                  </dd>
                  <dd>
                    <a class="sort-option google-event-tracker" href="javascript:void(0);" data-value="lowest rating" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="-1" data-acsb-now-navigable="false" role="button" data-acsb-hover="true">lowest rating</a>
                  </dd>
                  <dd>
                    <a class="sort-option google-event-tracker" href="javascript:void(0);" data-value="most helpful" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="-1" data-acsb-now-navigable="false" role="button" data-acsb-hover="true">most helpful</a>
                  </dd>
                  <dd>
                    <a class="sort-option google-event-tracker" href="javascript:void(0);" data-value="least helpful" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="-1" data-acsb-now-navigable="false" role="button" data-acsb-hover="true">least helpful</a>
                  </dd>
                </dl>
              </div>
            </div>
          </div>
      </div>
      <div class="col-md-12 cr-body">
        <div class="cr-content" id="customer-reviews-post">
          <div class="pb-30">
            

<div class="reviews-post-section" data-acsb-overflower="true">
  <div class="author"><div class="pull-right">June 8, 2021</div>Kelsey
  </div>
  <ul class="list-inline pull-right reviews-post-section_thumbnail" aria-hidden="true" data-acsb-hidden="true" role="presentation">
    
  </ul>
  <div style="overflow:hidden;" data-acsb-overflower="true">
    <span class="ir218-snippet-stars" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true" data-acsb-possible-star="true">
      <span style="background-position:left -130.0px;" class="ir218-stars ir218-stars-small" aria-label="Review"></span>
    </span>
    <div class="author-headline">Perfect</div>
    <p class="author-commit expanded">
      LOVE everything about the ring and the process. Love getting to choose the particular stone, when I needed customer service they were quick and pleasant to deal with. Extremely happy with the final product!!
      <a href="javascript:void(0);" data-toggle="customer_review_read_more" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Read More" data-noninteract="true" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="-1" data-acsb-now-navigable="false" aria-hidden="true" data-acsb-hidden="true" role="button" data-acsb-hover="true">...Read More</a>
   </p>
  </div>
</div>

<div class="reviews-post-section" data-acsb-overflower="true">
  <div class="author"><div class="pull-right">June 7, 2021</div>JR
  </div>
  <ul class="list-inline pull-right reviews-post-section_thumbnail" aria-hidden="true" data-acsb-hidden="true" role="presentation">
    
  </ul>
  <div style="overflow:hidden;" data-acsb-overflower="true">
    <span class="ir218-snippet-stars" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true" data-acsb-possible-star="true">
      <span style="background-position:left -130.0px;" class="ir218-stars ir218-stars-small" aria-label="Review"></span>
    </span>
    <div class="author-headline">Exceeded Expectations</div>
    <p class="author-commit expanded">
      Was hesitant to purchase jewelry online for a special occasion, but with the Covid-19 pandemic determined it was most practical for our needs.  The results were exceptional and I would readily order again.
      <a href="javascript:void(0);" data-toggle="customer_review_read_more" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Read More" data-noninteract="true" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="-1" data-acsb-now-navigable="false" aria-hidden="true" data-acsb-hidden="true" role="button" data-acsb-hover="true">...Read More</a>
   </p>
  </div>
</div>

<div class="reviews-post-section" data-acsb-overflower="true">
  <div class="author"><div class="pull-right">June 7, 2021</div>Brandon
  </div>
  <ul class="list-inline pull-right reviews-post-section_thumbnail" aria-hidden="true" data-acsb-hidden="true" role="presentation">
    
  </ul>
  <div style="overflow:hidden;" data-acsb-overflower="true">
    <span class="ir218-snippet-stars" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true" data-acsb-possible-star="true">
      <span style="background-position:left -130.0px;" class="ir218-stars ir218-stars-small" aria-label="Review"></span>
    </span>
    <div class="author-headline">Great prouct!</div>
    <p class="author-commit expanded">
      Proposed to my girlfriend with this, absolutely beautiful ring!
      <a href="javascript:void(0);" data-toggle="customer_review_read_more" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Read More" data-noninteract="true" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="-1" data-acsb-now-navigable="false" aria-hidden="true" data-acsb-hidden="true" role="button" data-acsb-hover="true">...Read More</a>
   </p>
  </div>
</div>



<script type="text/javascript">
  //加载更多按钮显示的信息
  var load_more_info = "(Showing 3 of 187)";
  //是否已经加载全部
  var is_last = "False";

  $(".author-commit").each(function() {
      if($(this).height() > 40 && !$(this).hasClass('old-item')){
          $(this).addClass('old-item');
          $(this).removeClass('expanded')
      }
  })
</script>
          </div>
        </div>
        
          <div class="text-center">
            <button class="btn btn-lg btn-default ir218-load-more-reviews" style="display: none" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="-1" data-acsb-now-navigable="false" aria-hidden="true" data-acsb-hidden="true" role="button">loading ...</button>
            <button class="btn btn-lg btn-default ir218-load-more-reviews" id="load-more-reviews" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Load More" data-noninteract="true" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" role="button">load more</button>
          </div>
        
      </div>
    </div>
  </div>
</div>

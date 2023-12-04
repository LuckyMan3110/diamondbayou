<link href="<?php echo SITE_URL; ?>assets/css/global-style-min.css" rel="stylesheet">
<link href="<?php echo SITE_URL; ?>assets/css/how-to-buy-an-engagement-ring.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>assets/css/autocomplete.css">
<link rel="preload" href="<?php echo SITE_URL; ?>assets/js/appointment-min.js" as="script">
<link href="<?php echo SITE_URL; ?>assets/css/holiday-mini.css" rel="stylesheet">
<!--[if IE 8]><link href="//css.brilliantearth.com/static/css/ie8.css?_v=1625471808" rel="stylesheet"><![endif]-->
<script src="https://www.brilliantearth.com/static/js/jquery-1.12.4.min.js"></script>

<?php echo html_entity_decode($content->section_content); ?>

<script type="text/javascript">
$(function() {
	$('video').each(function() {
		this.play();
	});
});
</script>
<script type="text/javascript" src="//script.brilliantearth.com/static/js/jcarousellite_1.1.js"></script>
<script type="text/javascript" language="javascript">
$(function() {
	//  Responsive layout, resizing the items
	page_item = $('#gateway-top-slider-shown-count').val();
	$('#er-gateway-our-top-favorites-v3').carouFredSel({
		auto: false,
		prev: '#prev',
		next: '#next',
		width:'100%',
		scroll: 1,
		pagination: {
			container: "#pager1",
			items: page_item,
		},
		mousewheel: false,
		swipe: {
			onMouse: false,
			onTouch: true,
			options: {
				excludedElements:"label, button, input, select, textarea, .noSwipe"
			}
		}
	});
});
$(function() {
	//  Responsive layout, resizing the items
	$('#ir234-shop-diamond').carouFredSel({
		auto: false,
		prev: '#prev1',
		next: '#next1',
		width:'100%',
		scroll: 1,
		pagination: {
			container: "#pager1"
		},
		mousewheel: false,
		swipe: {
			onMouse: false,
			onTouch: true,
			options: {
				excludedElements:"label, button, input, select, textarea, .noSwipe"
			}
		}
	});
});
$(function() {
	$('#er-gateway-our-top-favorites-v3').carouFredSel({
		auto: false,
		prev: '#prev2',
		next: '#next2',
		width:'100%',
		scroll: 1,
		mousewheel: false,
		swipe: {
			onMouse: false,
			onTouch: true,
			options: {
			  excludedElements:"label, button, input, select, textarea, .noSwipe"
			}
		}
	});
});

$('#er-gateway-our-top-favorites-v3 li').each(function () {
	$(this).css("min-height", "235px");
});
</script>
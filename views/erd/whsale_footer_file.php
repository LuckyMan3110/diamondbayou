<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style rel="stylesheet" type="text/css">
.fa-twitter:before{content:"\f099"}
.fa-facebook-f:before,.fa-facebook:before{content:"\f09a"}
.fa-instagram:before{content:"\f16d"}
.fa-youtube:before{content:"\f167"}
.footer_social_icons li a{font-size:25px}
.footer_sectionbg a,.footer_sectionbg a:hover{font:normal normal normal 14px/1 FontAwesome}
</style>
<div class="footer_sectionbg">
	<div class="container">
		<div class="col-sm-2 float-left footer-logo">
			<a href="<?php echo SITE_URL; ?>"><img src="<?php echo SITE_URL; ?>images/new-logo.png" style="width:200px;"></a>
		</div>
		<div class="col-sm-2 float-left">
			<h3>MAY WE HELP<br> YOU?</h3>
			<ul>
				<?php
				$where_footer_column	=  array('footer_column' => 1);
				$content_man_page_data	=  $this->commonmodel->getdata_any_table_limit_order_where('content_man_page', $where_footer_column, 100, 0, 'page_id');
				foreach($content_man_page_data as $page_data){
				?>
					<li><a href="<?php echo SITE_URL; ?><?= $page_data->page_slug ?>"><?= $page_data->title ?></a></li>
				<?php } ?>
				<li><a style="color:white;" href="<?php echo SITE_URL; ?>contact">Contact Us</a></li>
			</ul>
		</div>
		<div class="col-sm-2 float-left">
			<h3>THE COMPANY</h3>
			<ul>
				<?php
				$where_footer_column	=  array('footer_column' => 2);
				$content_man_page_data	=  $this->commonmodel->getdata_any_table_limit_order_where('content_man_page', $where_footer_column, 100, 0, 'page_id');
				foreach($content_man_page_data as $page_data){
				?>
					<li><a href="<?php echo SITE_URL; ?><?= $page_data->page_slug ?>"><?= $page_data->title ?></a></li>
				<?php } ?>
				<li><a href="<?php echo SITE_URL; ?>Affiliate/account_login">Affiliate</a></li>
			</ul>
		</div>
		<div class="col-sm-3 float-left">
			<h3>FIND US ON</h3>
			<ul class="footer_social_icons">
				<li><a class="fa fa-facebook facebook" rel="nofollow" target="_blank" href="https://www.facebook.com/yadegardiamonds"></a></li>
				<li><a class="fa fa-twitter twitter" rel="nofollow" target="_blank" href="https://twitter.com/yadegardiamonds?lang=en"></a></li>
				<li><a class="fa fa-instagram instagram" rel="nofollow" target="_blank" href="https://www.instagram.com/yadegar_diamonds/"></a></li>
				<li><a class="fa fa-youtube youtube" rel="nofollow" target="_blank" href="https://www.youtube.com/watch?v=6Gl1h3ZhtVg"></a></li>
			</ul>
			<p>888 Brannan St, San Francisco, CA 94103</p>
		</div>
		<div class="col-sm-3 float-left">
			<h3>Subscribe</h3>
			<ul>
				<li>Be in the know with our<br> newsletters, updates and offers.</li>
				<br>
				<li>
				<input type="text" id="footer_email_box" class="email_fields" style="color:#000;width: 70%;" placeholder="Email">
				<a class="initialism biolist_open btn_style subscribeButton" href="#biolist" style="border:solid #000000 1px;" data-popup-ordinal="0" id="open_43979064" onclick="copyEmailtoFormField()">Subscribe</a>
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
<!-- //footer -->
<script async src="<?php echo SITE_URL; ?>js/bootstrap.min.js"></script>
<script async src="<?php echo SITE_URL; ?>js/bootstrap-toggle.js"></script>
<script data-cfasync="false">
$(document).ready(function () {
	$('#fade').popup({
		transition: 'all 0.3s',
		scrolllock: true
	});
});

$(document).ready(function () {
	$('#biolist').popup({
		transition: 'all 0.3s',
		scrolllock: true
	});

});
</script>
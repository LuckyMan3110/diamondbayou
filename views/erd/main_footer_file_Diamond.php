<?php
$ch_menu = end($this->uri->segment_array());
if($ch_menu!=''){
?>
	<!-- subscribe -->
	<div class="w3layouts_bottom">
		<div class="container">
			<div class="col-md-3"></div>  
			<div class="col-md-3 w3layouts_getin_info">
				<h3 style="text-align: center; margin-top: 8px;">SIGN UP FOR OUR EMAIL LIST</h3>
			</div>

			<div id="footer-top-subscribe-form" class="col-md-6">
				<input type="email" name="signup-email" placeholder="Enter Your Email" required="" id="footer_email_box">
				<a class="initialism biolist_open" href="#biolist"><input type="submit" name="signup-submit" value="Subscribe" onClick="copyEmailtoFormField()"></a>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!-- //subscribe -->
<?php } ?>
<script>
function copyEmailtoFormField(){
	var footer_email_box = $("#footer_email_box").val();
	$("#subsc_email").val(footer_email_box);
}
function copySubscribeEmail(){
	addscrissesion();
	var emailSubscribe = $("#emailSubscribe").val();
	$("#subsc_email").val(emailSubscribe);
}
</script>
<div class="footer_sectionbg">
	<div class="container">
		<div class="col-sm-2 float-left">
			<a href="#"><img src="<?php echo SITE_URL; ?>assets/site_images/main_site_footer_logo.png" style="width:200px;"/></a>
		</div>
		<div class="col-sm-2 float-left">
			<h3>MAY WE HELP YOU?</h3>
			<ul>
				<?php
				$where_footer_column	=  array('footer_column' => 1);
				$content_man_page_data	=  $this->commonmodel->getdata_any_table_limit_order_where('content_man_page', $where_footer_column, 100, 0, 'page_id');
				foreach($content_man_page_data as $page_data){
				?>
					<li><a href="<?php echo SITE_URL; ?><?= $page_data->page_slug ?>"><?= $page_data->title ?></a></li>
				<?php } ?>
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
				<li class="footer-item "><a class="footer-link " href="<?php echo SITE_URL; ?>site-map">Site Map</a></li>
			</ul>
		</div>
		<div class="col-sm-3 float-left">
			<h3>FIND US ON</h3>
			<ul class="footer_social_icons">
				<li><a href="https://www.facebook.com/Diamondbayou-102353134634861/?modal=admin_todo_tour"><img src="<?php echo SITE_URL; ?>assets/site_images/fb_icon.png" /></a></li>
				<li><a href="https://twitter.com/diamondbayou"><img src="<?php echo SITE_URL; ?>assets/site_images/twitter_icon.png" /></a></li>
				<li><a href="https://www.instagram.com/diamondbayousmm/"><img src="<?php echo SITE_URL; ?>assets/site_images/insta_icon.png" /></a></li>
				<li><a href="#"><img src="<?php echo SITE_URL; ?>assets/site_images/pinterest_icon.png" /></a></li>
				<li><a href="#"><img src="<?php echo SITE_URL; ?>assets/site_images/youtube_icon.png" /></a></li>
			</ul>
		</div>
		<div class="col-sm-3 float-left">
			<h3>Subscribe</h3>
			<ul>
				<li>Be in the know with our<br> newsletters, updates and offers.</li><br>
				<li>
					<input type="text" id="footer_email_box" class="email_fields" style="color:#000;width: 70%;" placeholder="Email" />
					<a class="initialism biolist_open btn_style subscribeButton" href="#biolist" style="border:solid #000000 1px;" data-popup-ordinal="0" id="open_43979064" onclick="copyEmailtoFormField()">Subscribe</a>
				</li>
			</ul>
		</div>
		<div class="clear"></div>
	</div>
</div>
<!-- footer -->
<div class="footer">
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
			<!-- Start of LiveChat (www.livechatinc.com) code -->
			<script type="text/javascript">
			window.__lc = window.__lc || {};
			window.__lc.license = 8860054;
			(function() {
				var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = true;
				lc.src = ('https:' == document.location.protocol ? 'https://' : 'https://') + 'cdn.livechatinc.com/tracking.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);
			})();
			</script>
			<!-- End of LiveChat code -->
		</div>
	</div>
    <div class="container">    
        <div class="agileinfo_copyright">
            <p><center>© Copyright <?= date("Y") ?> <?php echo get_site_contact_info('dashboard_title'); ?>.</center></p>
        </div><br>
    </div>
	<!-- //footer -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<script src="<?php echo SITE_URL; ?>js/bootstrap-toggle.js"></script>
    <script>
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
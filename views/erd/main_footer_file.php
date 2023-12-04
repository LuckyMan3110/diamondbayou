		<style>
		.newsletters li a.btn_style{background: #8e1010;color: #fff;text-transform: uppercase;padding: 16px;font-size: 15px;}
		.footer_sectionbg{padding:50px;background:#fff7f79e;color:#000}
		.footer_sectionbg a,.footer_sectionbg a:hover{color:#fff;font-size:13px;line-height:20px;font-family:"TrajanPro-Regular";font-weight:400;text-decoration:none;text-transform:capitalize}
		.float-left h3{font-family:"TrajanPro-Regular"!important}
		.footer_sectionbg a,.footer_sectionbg a:hover{color:#040000;font-size:13px;line-height:20px;font-family:"TrajanPro-Regular";font-weight:400;text-decoration:none;text-transform:capitalize}
		.float-left ul{padding-top:10px}
		.footer_social_icons li{display:inline-block;padding:0 0 0 15px}
		.footer_social_icons li a{font-size:2rem}
		.footer_social_icons li:first-child{padding:0}
		.footer_social_icons a,.footer_social_icons a:hover{color:#8e1010;font:normal normal normal 14px/1 FontAwesome}
		.email_fields{padding:8px 10px 13px 10px}
		</style>
		<div class="footer_sectionbg">
			<div class="container">
				<div class="col-sm-2 float-left footer-logo">
					<a href="<?php echo config_item('base_url') ?>"><img src="<?php echo config_item('base_url') ?>assets/images/jewelercartlogo.jpg" style="width:100%"></a>
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
						<li><a href="<?php echo SITE_URL; ?>contact">Contact Us</a></li>
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
				<div class="col-sm-2 float-left">
					<h3>FIND US ON</h3>
					<ul class="footer_social_icons">
						<li><a class="fa fa-facebook facebook" rel="nofollow" target="_blank" href="https://www.facebook.com"></a></li>
						<li><a class="fa fa-twitter twitter" rel="nofollow" target="_blank" href="https://twitter.com"></a></li>
						<li><a class="fa fa-instagram instagram" rel="nofollow" target="_blank" href="https://www.instagram.com"></a></li>
						<li><a class="fa fa-youtube youtube" rel="nofollow" target="_blank" href="https://www.youtube.com"></a></li>
					</ul>
					<p>260 Peachtree St NW Suite 2200, Atlanta, GA 30303</p>
				</div>
				<div class="col-sm-4 float-left">
					<h3>Subscribe</h3>
					<ul>
						<li>Be in the know with our<br> newsletters, updates and offers.</li>
						<li>
						<input type="text" id="footer_email_box" class="email_fields" style="color:#000;width:68%;" placeholder="Email">
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
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo $page_title; ?></title>
		<link type="text/css" href="<?php echo SITE_URL; ?>css/wh_styles.css" rel="stylesheet" />
		<script type="text/javascript" src="<?php echo SITE_URL; ?>js/jquery-1.8.3.min.js"></script>
		<script> var base_url = '<?php echo SITE_URL; ?>'; </script>
		<script type="text/javascript" src="<?php echo SITE_URL; ?>js/trial_version_js.js"></script>
	</head>
	<body>
		<div id="mainpage_content">
			<div class="header_bk">
				<div class="mainft_wraper">
					<div class="logo_bk"> <a href="<?php echo SITE_URL; ?>"><img src="<?php echo SITE_URL; ?>images/new-logo.png"" alt="Free Trial" /></a> </div>
					<div class="contact_bk"> 
						<span class="contact_ic"><img src="<?php echo SITE_WHURL; ?>contact_icft.png" alt="Sales" /> Sales: 1-866-Yad-EGAR</span> 
						<span class="contact_ic"><img src="<?php echo SITE_WHURL; ?>contact_icft.png" alt="Support" />  Support: 1-866-Yad-EGAR</span>
					</div>
					<div class="clear"></div>
				</div>
			</div>
			<div class="mainft_banner">
				<div><img src="<?php echo SITE_WHURL; ?>main_baner_ft.jpg" alt="Main Banner" /></div>
				<div class="mainft_wraper">
					<form method="post" id="triaForm" name="triaForm" action="#">
						<div class="trial_form">
							<div class="formHeading">Sign up for free trial</div>
							<div id="errorMesage"></div>
							<br>
							<div><input type="text" name="txt_fname" id="first_name" placeholder="First Name" required /></div>
							<div><input type="text" name="txt_lname" id="last_name" placeholder="Last Name" required /></div>
							<div><input name="txt_email" type="email" id="email_adres" placeholder="Email" required /></div>
							<div><input type="text" name="txt_phone" id="phone_no" placeholder="Phone Number" required /></div>
							<div><input type="text" name="txt_jobtitle" id="job_title" placeholder="Job Title" required /></div>
							<div><input type="text" name="txt_company" id="comp_name" placeholder="Company" required /></div>
							<div>
								<select name="cmb_industry" id="idustry_name" class="setwidthcmb">
									<option value="">Select An Industry</option>
									<option>Retailer</option>
									<option>Diamond Dealer</option>
									<option>Wholesaler</option>
								</select>
							</div>
							<div align="left"><input type="checkbox" name="cb_trials" id="cb_trials" value="Y" />&nbsp;<label for="cb_trials">Click True Trials to Confirm</label></div>
							<div><input name="btn_submit" value="Get Started Now!" id="getstarted" onClick="sbmitTrialForm()" class="getstarted" type="button" /></div>
							<div class="byclicking">By clicking the 'GET STARTED' button above, you agree to the Terms &amp; Conditions</div>
						</div>
					</form>
				</div>
			</div>
			<div class="bodyft_content">
				<br>
				<div class="mainft_wraper">
					<div class="content_ftrow">
						<div class="smarter_cols">
							<h1>What We Do</h1><br>
							<div class="clear"></div>
						</div>
						<div class="clear"></div><br>
						<div class="smarter_cols">
							<div class="smarter_img"><img src="<?php echo SITE_WHURL; ?>jcart_combines.jpg" alt=""></div>
							<div class="smarter_desc">
								<div>Turn key Complete Web E-Solution for Jewelers, Diamond Dealers and Wholesalers that installs within 5 seconds</div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="clear"></div><br>

						<div class="smarter_cols">
							<div class="smarter_img"><img src="<?php echo SITE_WHURL; ?>jcart_combines.jpg" alt=""></div>
							<div class="smarter_desc">
							<div>Build your own Suite,ring builder , Earring builder, Pendant Builder, three stone ring builder and Loose Diamond Integration</div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="clear"></div><br>

						<div class="smarter_cols">
							<div class="smarter_img"><img src="<?php echo SITE_WHURL; ?>jcart_combines.jpg" alt=""></div>
							<div class="smarter_desc">
							<div>Api Integrations with major Jewelry manufactures and diamond trade portals</div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="clear"></div><br>

						<div class="smarter_cols">
							<div class="smarter_img"><img src="<?php echo SITE_WHURL; ?>jcart_combines.jpg" alt=""></div>
							<div class="smarter_desc">
							<div>Competetive Framework that allows your website to compete with companies like Bluenile and Jamesallen</div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="clear"></div><br>

						<div class="smarter_cols">
							<div class="smarter_img"><img src="<?php echo SITE_WHURL; ?>jcart_combines.jpg" alt=""></div>
							<div class="smarter_desc">
							<div>Complete Back office to Manage all orders and Inventory</div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="clear"></div><br>

						<div class="smarter_cols">
							<div class="smarter_img"><img src="<?php echo SITE_WHURL; ?>jcart_combines.jpg" alt=""></div>
							<div class="smarter_desc">
							<div>Complete integration with market places such as amazon.com, ebay.com and sears</div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="clear"></div><br>

						<div class="smarter_cols">
							<div class="smarter_img"><img src="<?php echo SITE_WHURL; ?>jcart_combines.jpg" alt=""></div>
							<div class="smarter_desc">
							<div>Responsive webdesign for Smart Devices and Phones along with Modrewrite to increase Search Engine Visibility</div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="clear"></div><br>

						<div class="smarter_cols">
							<div class="smarter_img"><img src="<?php echo SITE_WHURL; ?>jcart_combines.jpg" alt=""></div>
							<div class="smarter_desc">
							<div>Custom Diamond and Jewelry App Modules to develop customized applications unique to your business practices</div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="clear"></div><br><br>
					</div>
				</div>
			</div>
			<div class="footer_ftbk">
				<div class="mainft_wraper"><br>
					<h2 class="footer_fthead">Testimonials</h2>
					<div>"Amazing to see how Yadegar Diamonds Manages thousands of<br> diamonds in Ebay"</div><br><br>
					<div><img src="<?php echo SITE_WHURL; ?>slider_circles.jpg" alt="" /></div><br><br><br><br>
					<div class="footr_links">
					<img src="<?php echo SITE_WHURL; ?>ebay_ft.jpg" alt="Ebay" />
					<img src="<?php echo SITE_WHURL; ?>amazon_seller_ft.jpg" alt="Amazon Seller" />
					<img src="<?php echo SITE_WHURL; ?>sears_ft.jpg" alt="Sears Seller" />
					<img src="<?php echo SITE_WHURL; ?>amazon_ft.jpg" alt="Amazon Ca" />
					</div><br><br><br>
					<div class="copy_rights">&copy;2002-2014 Yadegar Diamonds Software. All Rights Reserved. eBay and Amazon Inventory and Listing Solution.</div><br><br>
				</div>
			</div>
		</div>
	</body>
</html>
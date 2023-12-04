<div class="inner">
	<div class="contentpanel">
		<div><?php echo admin_main_menu_list();?></div>
		<div class="pull-left breadcrumb_admin clear_both">
			<div class="pull-left page_title theme_color">
				<h1><a href="<?php echo SITE_URL; ?>admin">Admin</a></h1>
				<h2 class="">Profile Settings</h2>
			</div>
		</div>
		<div class="container clear_both padding_fix">
			<div class="page-content">
				<div class="row">
					<div class="col-md-8">
						<div class="block-web full">
							<ul class="nav nav-tabs nav-justified nav_bg">
								<li class="active"><a href="#edit-profile" data-toggle="tab"><i class="fa fa-pencil"></i> Edit Your Profile</a></li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane animated fadeInRight" id="about">
									<div class="user-profile-content">
										<h5><strong>ABOUT</strong> ME</h5>
										<p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. </p>
										<hr>
										<div class="row">
											<div class="col-sm-6">
												<h5><strong>CONTACT</strong> ME</h5>
												<address>
												<strong>Phone</strong><br>
												<abbr title="Phone">+91 354 123 4567</abbr>
												</address>
												<address>
												<strong>Email</strong><br>
												<a href="mailto:#">first.last@example.com</a>
												</address>
												<address>
												<strong>Website</strong><br>
												<a href="http://riaxe.com">http://riaxe.com</a>
												</address>
											</div>
											<div class="col-sm-6">
												<h5><strong>MY</strong> SKILLS</h5>
												<p>UI Design</p>
												<p>Clean and Modern Web Design</p>
												<p>PHP and MySQL Programming</p>
												<p>Vector Design</p>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane animated fadeInRight active" id="edit-profile">
									<div class="user-profile-content">
										<form role="form" name="admin_form" method="post" enctype="multipart/form-data" action="<?php echo $action_link; ?>">
											<div class="form-group">
												<label for="FullName">First Name</label>
												<input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $rowresults['fname']; ?>" />
											</div>
											<div class="form-group">
												<label for="FullName">Last Name</label>
												<input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo $rowresults['lname']; ?>" />
											</div>
											<div class="form-group">
												<label for="Email">Email</label>
												<input type="text" class="form-control" name="txt_email" id="Email" value="<?php echo $rowresults['email']; ?>" />
											</div>
											<div class="form-group">
												<label for="Username">Username</label>
												<input type="text" class="form-control" name="login_username" id="Username" value="<?php echo $rowresults['userid']; ?>" />
											</div>
											<div class="form-group">
												<label for="Password">Password</label>
												<input type="password" class="form-control"  name="login_pass" value="<?php echo $rowresults['visible_pasview']; ?>" id="Password" placeholder="6 - 15 Characters">
											</div>
											<div class="form-group">
												<label for="Password">Company Name</label>
												<input type="text" class="form-control"  name="sites_title" id="sites_title" value="<?php echo $rowresults['sites_title']; ?>" placeholder="Enter Site Title">
											</div>
											<div class="form-group">
												<label for="Password">Contact Info</label>
												<input type="text" class="form-control"  name="contacts_info" value="<?php echo $rowresults['contact_info']; ?>" placeholder="Enter Site Contact Info">
											</div>
											<div class="form-group">
												<label for="Password">Dashboard Title</label>
												<input type="text" class="form-control"  name="dashboard_title" value="<?php echo $rowresults['dashboard_title']; ?>" placeholder="Admin Dashboard Title">
											</div>
											<div class="form-group">
												<label for="Password"> Country</label>
												<select class="form-control" name="salestax_country" id="select-tax-country" onchange="selectCountryTax()">
													<option value="">Select Country</option>
													<option value="USA" <?php if($rowresults['salestax_country'] == 'USA'){ echo 'selected';} ?> >USA </option>
													<option value="Canada" <?php if($rowresults['salestax_country'] == 'Canada'){ echo 'selected';} ?> >Canada</option>
												</select>
											</div>
											<script>
											function selectCountryTax(){
												$("select#salestax_city").val('');
												var get_selectCountryTax = $("#select-tax-country").val();
												if(get_selectCountryTax == 'USA'){
													$(".usa-state").show();
													$(".canada-state").hide();
												}else if(get_selectCountryTax == 'Canada'){
													$(".usa-state").hide();
													$(".canada-state").show();
												}else{
													$(".usa-state").show();
													$(".canada-state").hide();
												}
											}
											</script>
											<div class="form-group">
												<label for="Password">Sales Tax City</label>
												<select class="form-control" class="form-control"  name="salestax_city" id="salestax_city">
													<?php if($rowresults['salestax_city']){ ?>
													<option value="<?php echo $rowresults['salestax_city']; ?>" selected><?php echo $rowresults['salestax_city']; ?></option>
													<?php } ?>
													<option value="">Select Sales Tax City ----</option>
													<div id="usa-state">
													<option value="Alabama" class="usa-state">Alabama</option>
													<option value="Alaska" class="usa-state">Alaska</option>
													<option value="Arizona" class="usa-state">Arizona</option>
													<option value="Arkansas" class="usa-state">Arkansas</option>
													<option value="California" class="usa-state">California</option>
													<option value="Colorado" class="usa-state">Colorado</option>
													<option value="Connecticut" class="usa-state">Connecticut</option>
													<option value="Delaware" class="usa-state">Delaware</option>
													<option value="District Of Columbia" class="usa-state">District Of Columbia</option>
													<option value="Florida" class="usa-state">Florida</option>
													<option value="Georgia" class="usa-state">Georgia</option>
													<option value="Hawaii" class="usa-state">Hawaii</option>
													<option value="Idaho" class="usa-state">Idaho</option>
													<option value="Illinois" class="usa-state">Illinois</option>
													<option value="Indiana" class="usa-state">Indiana</option>
													<option value="Iowa" class="usa-state">Iowa</option>
													<option value="Kansas" class="usa-state">Kansas</option>
													<option value="Kentucky" class="usa-state">Kentucky</option>
													<option value="Louisiana" class="usa-state">Louisiana</option>
													<option value="Maine" class="usa-state">Maine</option>
													<option value="Maryland" class="usa-state">Maryland</option>
													<option value="Massachusetts" class="usa-state">Massachusetts</option>
													<option value="Michigan" class="usa-state">Michigan</option>
													<option value="Minnesota" class="usa-state">Minnesota</option>
													<option value="Mississippi" class="usa-state">Mississippi</option>
													<option value="Missouri" class="usa-state">Missouri</option>
													<option value="Montana" class="usa-state">Montana</option>
													<option value="Nebraska" class="usa-state">Nebraska</option>
													<option value="Nevada" class="usa-state">Nevada</option>
													<option value="New Hampshir" class="usa-state">New Hampshire</option>
													<option value="New Jersey" class="usa-state">New Jersey</option>
													<option value="New Mexico" class="usa-state">New Mexico</option>
													<option value="New York" class="usa-state">New York</option>
													<option value="North Carolina" class="usa-state">North Carolina</option>
													<option value="North Dakota" class="usa-state">North Dakota</option>
													<option value="Ohio" class="usa-state">Ohio</option>
													<option value="Oklahoma" class="usa-state">Oklahoma</option>
													<option value="Oregon" class="usa-state">Oregon</option>
													<option value="Pennsylvania" class="usa-state">Pennsylvania</option>
													<option value="Rhode Island" class="usa-state">Rhode Island</option>
													<option value="South Carolina" class="usa-state">South Carolina</option>
													<option value="South Dakota" class="usa-state">South Dakota</option>
													<option value="Tennessee" class="usa-state">Tennessee</option>
													<option value="Texas" class="usa-state">Texas</option>
													<option value="Utah" class="usa-state">Utah</option>
													<option value="Vermont" class="usa-state">Vermont</option>
													<option value="Virginia" class="usa-state">Virginia</option>
													<option value="Washington" class="usa-state">Washington</option>
													<option value="West Virginia" class="usa-state">West Virginia</option>
													<option value="Wisconsin" class="usa-state">Wisconsin</option>
													<option value="Wyoming" class="usa-state">Wyoming</option>
													</div>
													<div id="canada-state">
													<option value="Alberta" class="canada-state">Alberta</option>
													<option value="British Columbia" class="canada-state">British Columbia</option>
													<option value="Manitoba" class="canada-state">Manitoba</option>
													<option value="New Brunswick" class="canada-state">New Brunswick</option>
													<option value="Newfoundland and Labrador" class="canada-state">Newfoundland and Labrador</option>
													<option value="Nova Scotia" class="canada-state">Nova Scotia</option>
													<option value="Ontario" class="canada-state">Ontario</option>
													<option value="Prince Edward Island" class="canada-state">Prince Edward Island</option>
													<option value="Quebec" class="canada-state">Quebec</option>
													<option value="Saskatchewan" class="canada-state">Saskatchewan</option>
													<option value="Northwest Territories" class="canada-state">Northwest Territories</option>
													<option value="Nunavut" class="canada-state">Nunavut</option>
													<option value="Yukon" class="canada-state">Yukon</option>
													</div>
												</select>
											</div>
											<div class="form-group">
												<label for="slaes tax">Sales Tax Percent</label>
												<input type="text" class="form-control"  name="salestax_percent" value="<?php echo $rowresults['salestax_percent']; ?>" placeholder="Sales Tax Percent">
											</div>
											<div class="form-group">
												<label for="site_logo">Site Logo</label>
												<input type="file" name="site_logo" id="site_logo" /><br>
												<div><img src="<?php echo SITE_URL.'uploads/'.get_site_title('sites_logo'); ?>" width="270" /></div>
											</div>
											<div class="form-group">
												<label for="Google Analytics">Google Analytics ID</label>
												<input type="text" class="form-control" name="google_analytics_id" value="<?php echo $rowresults['google_analytics_id']; ?>" placeholder="Google Analytics ID">
											</div>
											<button type="submit" class="btn btn-primary">Save</button>
										</form>
									</div>
								</div>
								<div class="tab-pane" id="user-activities">
									<ul class="media-list">
										<li class="media"> <a href="#">
										<p><strong>John Doe</strong> Uploaded a photo <strong>"DSC000254.jpg"</strong> <br>
										<i>2 minutes ago</i></p>
										</a> </li>
										<li class="media"> <a href="#">
										<p><strong>Imran Tahir</strong> Created an photo album <strong>"Indonesia Tourism"</strong> <br>
										<i>8 minutes ago</i></p>
										</a> </li>
										<li class="media"> <a href="#">
										<p><strong>Colin Munro</strong> Posted an article <strong>"London never ending Asia"</strong> <br>
										<i>an hour ago</i></p>
										</a> </li>
										<li class="media"> <a href="#">
										<p><strong>Corey Anderson</strong> Added 3 products <br>
										<i>3 hours ago</i></p>
										</a> </li>
										<li class="media"> <a href="#">
										<p><strong>Morne Morkel</strong> Send you a message <strong>"Lorem ipsum dolor..."</strong> <br>
										<i>12 hours ago</i></p>
										</a> </li>
										<li class="media"> <a href="#">
										<p><strong>Imran Tahir</strong> Updated his avatar <br>
										<i>Yesterday</i></p>
										</a> </li>
									</ul>
								</div>
								<div class="tab-pane" id="mymessage">
									<ul class="media-list">
										<li class="media"> <a class="pull-left" href="#"><img src="images/gg.png" /></a>
										<div class="media-body">
										<h4 class="media-heading"><a href="#fakelink">John Doe</a> <small>Just now</small></h4>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
										</div>
										</li>
										<li class="media"> <a class="pull-left" href="#"><img src="images/gg.png" /></a>
										<div class="media-body">
										<h4 class="media-heading"><a href="#fakelink">Tim Southee</a> <small>Yesterday at 04:00 AM</small></h4>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam rhoncus</p>
										</div>
										</li>
										<li class="media"> <a class="pull-left" href="#"><img src="images/gg.png" /></a>
										<div class="media-body">
										<h4 class="media-heading"><a href="#fakelink">Kane Williamson</a> <small>January 17, 2014 05:35 PM</small></h4>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
										</div>
										</li>
										<li class="media"> <a class="pull-left" href="#"><img src="images/gg.png" /></a>
										<div class="media-body">
										<h4 class="media-heading"><a href="#fakelink">Lonwabo Tsotsobe</a> <small>January 17, 2014 05:35 PM</small></h4>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
										</div>
										</li>
										<li class="media"> <a class="pull-left" href="#"><img src="images/gg.png" /></a>
										<div class="media-body">
										<h4 class="media-heading"><a href="#fakelink">Dale Steyn</a> <small>January 17, 2014 05:35 PM</small></h4>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
										</div>
										</li>
										<li class="media"> <a class="pull-left" href="#"><img src="images/gg.png" /></a>
										<div class="media-body">
										<h4 class="media-heading"><a href="#fakelink">John Doe</a> <small>Just now</small></h4>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
										</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php echo popupsOtherBlockData(); ?>
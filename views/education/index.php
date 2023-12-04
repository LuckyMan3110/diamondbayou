<link href="<?php echo SITE_URL; ?>assets/css/site-page.css" rel="stylesheet">
<div class="col-sm-3">
	<div class="leftMenueBoxOuter">
		<h2>MAY WE HELP YOU?</h2>
		<div class="content_leftmenu">
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
		<div class="clear"></div><br><br>
		<h2>THE COMPANY</h2>
		<div class="content_leftmenu">
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
		<div class="clear"></div><br><br>
		<h2>FIND US ON</h2>
		<div class="content_leftmenu">
			<ul>
				<li><a href="https://www.facebook.com/Diamondbayou-102353134634861/?modal=admin_todo_tour"><img src="<?php echo SITE_URL; ?>assets/site_images/fb_icon.png" /></a></li>
				<li><a href="https://twitter.com/diamondbayou"><img src="<?php echo SITE_URL; ?>assets/site_images/twitter_icon.png" /></a></li>
				<li><a href="https://www.instagram.com/diamondbayousmm/"><img src="<?php echo SITE_URL; ?>assets/site_images/insta_icon.png" /></a></li>
				<li><a href="#"><img src="<?php echo SITE_URL; ?>assets/site_images/pinterest_icon.png" /></a></li>
				<li><a href="#"><img src="<?php echo SITE_URL; ?>assets/site_images/youtube_icon.png" /></a></li>
			</ul>
		</div>
		<div class="clear"></div>
	</div>
</div>
<div class="rightCl col-sm-9">
	<div class="bodytop"></div>
	<div class="bodymid">
		<div class="welcomediv">
			<h1 class="pageheader">Education & Guidancessss</h1>
		</div>
		<div class="clear hr"></div>
		<div>
			<div class="floatl">
				<div><img src="<?php echo config_item('base_url')?>images/ruman/edu_home.jpg"> </div>
			</div>
			<div class="floatl bigcontainerJ signaturecontainer">
				<div class="divheader">
					<a class="redd" href="<?php echo config_item('base_url()'); ?>education/diamondes_education">Diamond Education &nbsp;&nbsp;<img src="<?php echo config_item('base_url')?>images/tamal/arrow_bg.jpg"></a>
				</div>
				<div class="divcontainer">Become a diamond expert with our <a class="redd underline" href="<?php echo config_item('base_url()'); ?>education/diamondes_education">Diamond Education</a>, or go to a specific subject:<br><br></div>
				<div>
					<table cellpadding="0" cellspacing="0">
						<tr>
							<td width="90px"><img src="<?php echo config_item('base_url')?>images/tamal/arrow_bg.jpg" >&nbsp;<a class="redd underline" href="<?php echo config_item('base_url')?>education/diamond/shape">Shape</a></td>
							<td width="90px"><img src="<?php echo config_item('base_url')?>images/tamal/arrow_bg.jpg" >&nbsp;<a class="redd underline" href="<?php echo config_item('base_url()'); ?>diamonds/education">Cut</a></td>
							<td width="90px"><img src="<?php echo config_item('base_url')?>images/tamal/arrow_bg.jpg" >&nbsp;<a class="redd underline" href="<?php echo config_item('base_url()'); ?>diamonds/education">Color</a></td>
						</tr>
						<tr><td colspan="3" height="5px"></td></tr>
						<tr>
							<td width="90px"><img src="<?php echo config_item('base_url')?>images/tamal/arrow_bg.jpg" >&nbsp;<a class="redd underline" href="<?php echo config_item('base_url()'); ?>diamonds/education">Clarity</a></td>
							<td width="90px"><img src="<?php echo config_item('base_url')?>images/tamal/arrow_bg.jpg" >&nbsp;<a class="redd underline" href="<?php echo config_item('base_url()'); ?>diamonds/education">Carat Weight</a></td>
							<td width="90px"><img src="<?php echo config_item('base_url')?>images/tamal/arrow_bg.jpg" >&nbsp;<a class="redd underline" href="<?php echo config_item('base_url()'); ?>diamonds/education">Certification</a></td>
						</tr>
						<tr><td colspan="3" height="25px"></td></tr>
						<tr>
							<td colspan="3">
								<img src="<?php echo config_item('base_url')?>images/tamal/arrow_bg.jpg" >&nbsp;<a class="redd underline" href="<?php echo config_item('base_url()'); ?>diamonds/education">Build Your Own Ring</a>
							</td>
						</tr>
						<tr><td colspan="3" height="5px"></td></tr>
						<tr>
							<td colspan="3">
								<img src="<?php echo config_item('base_url')?>images/tamal/arrow_bg.jpg" >&nbsp;<a class="redd underline" href="<?php echo config_item('base_url()'); ?>diamonds/education">Search for Diamonds</a>
							</td>
						</tr>
					</table>
				</div>	
			</div>
			<div class="clear"></div>
			<div class="floatl pad20 wide225">
				<h5 class="pageheader font12">Jewelry Gift Guides</h5>
				<div class="hrule"></div>
				<div>Learn how to choose a piece of jewelry to fit her style and taste in our:</div>
				<br>
				<div class="floatl">
					<div><img src="<?php echo config_item('base_url')?>images/ruman/edu_earring.jpg"></div>
				</div>
				<div class="floatl">
					<div class="lhight14">
						<img src="<?php echo config_item('base_url')?>images/tamal/arrow_bg.jpg" >&nbsp;<a class="redd underline" href="<?php echo config_item('base_url()'); ?>diamonds/education">Earring Guide</a>
					</div>
					<div class="lhight14">
						<img src="<?php echo config_item('base_url')?>images/tamal/arrow_bg.jpg" >&nbsp;<a class="redd underline" href="<?php echo config_item('base_url()'); ?>diamonds/education">Necklace Guide</a>
					</div>
					<div class="lhight14">
						<img src="<?php echo config_item('base_url')?>images/tamal/arrow_bg.jpg" >&nbsp;<a class="redd underline" href="<?php echo config_item('base_url()'); ?>diamonds/education">Bracelet Guide</a>
					</div>
					<div class="lhight14">
						<img src="<?php echo config_item('base_url')?>images/tamal/arrow_bg.jpg" >&nbsp;<a class="redd underline" href="<?php echo config_item('base_url()'); ?>diamonds/education">Watch Guide</a>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="floatl pad20 wide225">
				<h5 class="pageheader font12">How to Find the Perfect Ring</h5>
				<div class="hrule"></div>
				<div>Get expert guidance on finding the perfect engagement ring or wedding ring.</div>
				<br>
				<div class="floatl">
					<div><img src="<?php echo config_item('base_url')?>images/ruman/edu_ring.jpg"></div>
				</div>
				<div class="floatl">
					<div class="lhight14">
						<img src="<?php echo config_item('base_url')?>images/tamal/arrow_bg.jpg" >&nbsp;<a class="redd underline" href="<?php echo config_item('base_url()'); ?>diamonds/education">Engagement Rings</a>
					</div>
					<div class="lhight14">
						<img src="<?php echo config_item('base_url')?>images/tamal/arrow_bg.jpg" >&nbsp;<a class="redd underline" href="<?php echo config_item('base_url()'); ?>diamonds/education">Wedding Rings</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="clear"></div>
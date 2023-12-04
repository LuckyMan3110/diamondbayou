<main id="maincontent" class="page-main">
	<a id="contentarea" tabindex="-1"></a>
	<div class="page messages">
		<div data-placeholder="messages"></div>
		<div data-bind="scope: 'messages'"></div>
	</div>
	<div class="columns">
		<div class="column main">
			<input name="form_key" type="hidden" value="Rb9GsZBhkGydFldo">
			<div></div>
			<div id="map-popup-click-for-price" class="map-popup">
				<div class="popup-header">
					<strong class="title" id="map-popup-heading-price"></strong>
				</div>
				<div class="popup-content">
					<div class="map-info-price" id="map-popup-content">
						<div class="price-box">
							<div class="map-msrp" id="map-popup-msrp-box">
								<span class="label">Price</span>
								<span class="old-price map-old-price" id="map-popup-msrp">
									<span class="price"></span>
								</span>
							</div>
							<div class="map-price" id="map-popup-price-box">
								<span class="label">Actual Price</span>
								<span id="map-popup-price" class="actual-price"></span>
							</div>
						</div>
						<form action="" method="POST" class="map-form-addtocart">
							<input type="hidden" name="product" class="product_id" value="" />
							<button type="button" title="Add to Cart" class="action tocart primary">
								<span>Add to Cart</span>
							</button>
							<div class="additional-addtocart-box"></div>
						</form>
					</div>
					<div class="map-text" id="map-popup-text">Our price is lower than the manufacturer&#039;s &quot;minimum advertised price.&quot; As a result, we cannot show you the price in catalog or the product page. <br><br> You have no obligation to purchase the product once you know the price. You can simply remove the item from your cart. </div>
				</div>
			</div>

			<div id="map-popup-what-this" class="map-popup">
				<div class="popup-header">
					<strong class="title" id="map-popup-heading-what-this"></strong>
				</div>
				<div class="popup-content">
					<div class="map-help-text" id="map-popup-text-what-this">Our price is lower than the manufacturer&#039;s &quot;minimum advertised price.&quot; As a result, we cannot show you the price in catalog or the product page. <br><br> You have no obligation to purchase the product once you know the price. You can simply remove the item from your cart.</div>
				</div>
			</div>

			<div class="widget block block-static-block">
				<div class="filter_container">
					<div class="own_block" style="width:100%;">
						<div class="own_title">
							<h3 class="diamond_title">Create Your Own</h3>
						</div>
						<p>Create your own engagement ring, earrings and pendant with the <a class="workbanch" href="<?php echo SITE_URL; ?>engagement/search">Yadegar Diamonds Workbench</a> - or ask our team to cut a custom diamond just for you.</p>
						<ul class="own_order">
							<li><img src="<?php echo SITE_URL; ?>images/BGD-2010-Custom-Engagement.png" alt="Engagement Ring"> <a class="product_link" href="<?php echo SITE_URL; ?>engagement/search"><span class="diamond_name">Engagement Rings</span></a></li>
							<li><img src="<?php echo SITE_URL; ?>images/BGD-2010-Custom-Earrings.png" alt="Diamond Earrings"><a class="product_link" href="<?php echo SITE_URL; ?>jewelry/build-earings"><span class="diamond_name">Earrings</span></a></li>
							<li><img src="<?php echo SITE_URL; ?>images/BGD-2010-Custom-Pendant1.png" alt="Diamond Pendants"><a class="product_link" href="<?php echo SITE_URL; ?>jewelry/buildiamond-pendant"><span class="diamond_name">Pendants</span></a></li>
							<li><img src="<?php echo SITE_URL; ?>images/BGD-2010-Custom-Diamonds2.png" alt="Custom Diamonds"><a class="product_link" href="<?php echo SITE_URL; ?>diamonds/diamonds-search"><span class="diamond_name">Custom Diamonds</span></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="widget block block-static-block">
				<div class="popular_section">
					<div class="most_popular_container">
						<div class="title_main">Most Popular</div>
						<div class="popular_tab">
							<ul>
								<li><input class="popular_radio" id="radio1" name="mp_radio" type="radio" checked="checked" value="10"> <label for="radio1">Diamonds</label></li>
								<li><input class="popular_radio" id="radio2" name="mp_radio" type="radio" value="20"> <label for="radio2">Women</label></li>
								<li><input class="popular_radio" id="radio3" name="mp_radio" type="radio" value="30"> <label for="radio3">engagement rings</label></li>
							</ul>
						</div>
						<div class="ringed1">
							<ul class="product_grid grid_list" id="mp_product_list">
								<?php
								if(!empty($section1)):
									foreach($section1 as $sectiona):
										if($sectiona['image_url'] != '' && file_exists($sectiona['image_url'])){
											$view_shapeimage = "". SITE_URL ."image.php/".$sectiona['image_url']."?width=230&height=222&image=/". $sectiona['image_url'] ."";
											$diamond_shape      = $sectiona['shape'];
										}else{
											if($sectiona['shape'] == 'Round'){
												$view_shapeimage    = ''.SITE_URL.'images/shapes_images/shaped/actual-dime.jpg';
												$diamond_shape      = 'Round';
											}else if($sectiona['shape'] == 'Princess'){
												$view_shapeimage    = ''.SITE_URL.'images/shapes_images/shaped/princesss.jpg';
												$diamond_shape      = 'Princess';
											}else if($sectiona['shape'] == 'Cushion'){
												$view_shapeimage    = ''.SITE_URL.'images/shapes_images/shaped/cushion.jpg';
												$diamond_shape      = 'Cushion';
											}else if($sectiona['shape'] == 'Radiant'){
												$view_shapeimage = "". SITE_URL ."image.php/radiant.jpg?width=220&height=220&image=/images/shapes_images/radiant.jpg";
												//$view_shapeimage    = ''.SITE_URL.'images/shapes_images/radiant.jpg';
												$diamond_shape      = 'Radiant';
											}else if($sectiona['shape'] == 'Emerald'){
												$view_shapeimage    = ''.SITE_URL.'images/shapes_images/shaped/emeraled.jpg';
												$diamond_shape      = 'Emerald';
											}else if($sectiona['shape'] == 'Pear'){
												$view_shapeimage    = ''.SITE_URL.'images/shapes_images/shaped/pear.jpg';
												$diamond_shape      = 'Pear';
											}else if($sectiona['shape'] == 'Oval'){
												$view_shapeimage    = ''.SITE_URL.'images/shapes_images/shaped/oval.jpg';
												$diamond_shape      = 'Oval';
											}else if($sectiona['shape'] == 'Asscher'){
												$view_shapeimage    = ''.SITE_URL.'images/shapes_images/shaped/asscher.jpg';
												$diamond_shape      = 'Asscher';
											}else if($sectiona['shape'] == 'Marquise'){
												$view_shapeimage    = ''.SITE_URL.'images/shapes_images/shaped/marquise.jpg';
												$diamond_shape      = 'Marquise';
											}else if($sectiona['shape'] == 'Heart'){
												$view_shapeimage    = ''.SITE_URL.'images/shapes_images/shaped/heart.jpg';
												$diamond_shape      = 'Heart';
											}else{
												$view_shapeimage    = ''.SITE_URL.'images/shapes_images/shaped/actual-dime.jpg';
												$diamond_shape      = '';
											}
										}
										?>
										<li>
											<div class="product_list">
												<a href="<?php echo SITE_URL; ?>diamonds/diamond_detail/<?php echo $sectiona['Stock_n'];?>/false"><img src="<?php echo $view_shapeimage;?>" alt="Diamond"></a>
												<div class="product_list_info">
													<span class="price">$<?php echo _nf($sectiona['price']);?></span> 
													<div class="product_info"><a class="product_name" href="<?php echo SITE_URL; ?>diamonds/diamond_detail/<?php echo $sectiona['Stock_n'];?>/false"><span class="name_bold"><?php echo _nf($sectiona['carat'], 2).'-Carat ';?></span> <span class="name_light"><?php echo $diamond_shape.' Diamond';?></span></a></div>
												</div>
											</div>
										</li>
									<?php
									endforeach;
								endif;
								?>
							</ul>
							<div class="view_all" id="mp_view_more"><a class="button_custom" href="<?php echo SITE_URL; ?>diamonds/diamonds-search" id="mp_view_more_a">view all</a></div>
						</div>
						<div class="ringed2" style="display:none;">
							<ul class="product_grid grid_list" id="mp_product_list">
								<?php
								if(!empty($section2)):
									foreach($section2 as $sectionb):
										if($sectionb['is_carol'] == 1){
											$view_shapeimage = "". SITE_URL ."image.php/".$sectionb['image1']."?width=230&height=222&image=/". $sectionb['image1']."";
										}elseif($sectionb['is_oneil'] == 1){
											$view_shapeimage = "". SITE_URL ."image.php/".str_replace("THUMBNAIL/","",$sectionb['image1'])."?width=230&height=222&image=/". str_replace("THUMBNAIL/","",$sectionb['image1'])."";
										}else{
											$view_shapeimage	= str_replace("http://","https://",$sectionb['image1']);
										}
										?>
										<li>
											<div class="product_list">
												<a href="<?php echo SITE_URL; ?>collection/collection-detail/<?php echo $sectionb['stock_number'];?>"><img src="<?php echo $view_shapeimage;?>" alt="Diamond"></a>
												<div class="product_list_info">
													<span class="price">$<?php echo _nf($sectionb['price_website']);?></span> 
													<div class="product_info"><a class="product_name" href="<?php echo SITE_URL; ?>collection/collection-detail/<?php echo $sectionb['stock_number'];?>"><span class="name_bold"><?php echo $sectionb['item_title'];?></span></a></div>
												</div>
											</div>
										</li>
									<?php
									endforeach;
								endif;
								?>
							</ul>
							<div class="view_all" id="mp_view_more"><a class="button_custom" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry" id="mp_view_more_a">view all</a></div>
						</div>
						<div class="ringed3" style="display:none;">
							<ul class="product_grid grid_list" id="mp_product_list">
								<?php
								if(!empty($section3)):
									foreach($section3 as $sectionc):
										if(!empty($sectionc['image'])){
											$images = explode(";",$sectionc['image']);
											$newimage = explode("/",$images[0]);
											$view_shapeimage = SITE_URL.'images/section3/'.end($newimage);
										}else{
											$view_shapeimage = '';
										}
										if($sectionc['dev_us_id'] > 0){
											$sqlClr = "SELECT metal_weight,supplied_stones FROM dev_us WHERE name LIKE '".$sectionc['name']."' AND id = '".$sectionc['dev_us_id']."' ";
											$queryClr = $this->db->query($sqlClr);
											$resultClr = $queryClr->row();
											$cur_stones1 = explode(',',$resultClr->supplied_stones);
											$req_tot = 0;
											if(!empty($cur_stones1)){
												foreach($cur_stones1 as $cur_stone1){
													$req_data = explode('-',$cur_stone1);
													$req_tot = $req_tot + (int)$req_data[0];
												}
												$req_tot = $req_tot +1;
											}
											$weightigrm = str_replace(" grams","",$resultClr->metal_weight);
											$metalprc = 70*$weightigrm;
											$stonprc = 14*$req_tot;
											$semiMountprce = $metalprc+$stonprc;
											$finalsemiMountprce = $semiMountprce*1.5;
											$offer_price = $finalsemiMountprce;
										}else{
											$offer_price = $sectionc['price'];
										}
										?>
										<li>
											<div class="product_list">
												<a href="<?php echo SITE_URL; ?>selection/engagement-rings-detail/<?php echo $sectionc['id'];?>"><img src="<?php echo $view_shapeimage;?>" alt="Diamond"></a>
												<div class="product_list_info">
													<span class="price">$<?php echo _nf($offer_price,2);?></span>
													<div class="product_info"><a class="product_name" href="<?php echo SITE_URL; ?>selection/engagement-rings-detail/<?php echo $sectionc['id'];?>"><span class="name_bold"><?php echo $sectionc['description'];?></span></a></div>
												</div>
											</div>
										</li>
									<?php
									endforeach;
								endif;
								?>
							</ul>
							<div class="view_all" id="mp_view_more"><a class="button_custom" href="<?php echo SITE_URL; ?>diamonds/engagement-rings" id="mp_view_more_a">view all</a></div>
						</div>
						<script data-cfasync="false">
						$(document).ready(function() {
							$('.popular_radio').change(function() {
								if($(this).val() == 10){
									$("#radio1").attr("checked","checked");
									$(".ringed1").show();
									$(".ringed2").hide();
									$(".ringed3").hide();
									$("#radio2").removeAttr("checked");
									$("#radio3").removeAttr("checked");
								}else if($(this).val() == 20){
									$("#radio2").attr("checked","checked");
									$(".ringed2").show();
									$(".ringed1").hide();
									$(".ringed3").hide();
									$("#radio1").removeAttr("checked");
									$("#radio3").removeAttr("checked");
								}else if($(this).val() == 30){
									$("#radio3").attr("checked","checked");
									$(".ringed3").show();
									$(".ringed1").hide();
									$(".ringed2").hide();
									$("#radio1").removeAttr("checked");
									$("#radio2").removeAttr("checked");
								}
							});
						});
						</script>
					</div>
					<div class="blog_news">
						<div class="title_main">Shop Yadegar</div>
						<div class="block_title">Rings</div>
						<ul class="blog_section">
							<?php
							if(!empty($section5)):
								foreach($section5 as $sectione):
									if(!empty($sectione['image'])){
										$images = explode(";",$sectione['image']);
										if($sectione['costar_id'] > 0){
											if(file_exists('images/'. $sectione['image_path'].$images[0] .'')){
												$view_shapeimage = "". SITE_URL ."image.php/".$images[0]."?width=92&height=92&image=/images/". $sectione['image_path'].$images[0]."";
											}else{
												$view_shapeimage = "". SITE_URL ."image.php/".$images[1]."?width=92&height=92&image=/images/". $sectione['image_path'].$images[1]."";
											}
										}elseif($sectione['overnight_id'] > 0){
											if(file_exists('images/'. $sectione['image_path'].str_replace("THUMBNAIL/","",$images[0]).'')){
												$view_shapeimage = "". SITE_URL ."image.php/".str_replace("THUMBNAIL/","",$images[0])."?width=92&height=92&image=/images/". $sectione['image_path'].str_replace("THUMBNAIL/","",$images[0])."";
											}else{
												$view_shapeimage = "". SITE_URL ."image.php/".str_replace("THUMBNAIL/","",$images[1])."?width=92&height=92&image=/images/". $sectione['image_path'].str_replace("THUMBNAIL/","",$images[1])."";
											}
										}elseif($sectione['dev_us_id'] > 0){
											if(file_exists(''. $sectione['image_path'].$images[0] .'')){
												$view_shapeimage = "". SITE_URL ."image.php/".$images[0]."?width=92&height=92&image=/images/". $sectione['image_path'].$images[0]."";
											}else{
												$view_shapeimage = "". SITE_URL ."image.php/".$images[1]."?width=92&height=92&image=/images/". $sectione['image_path'].$images[1]."";
											}
										}else{
											if(file_exists('images/'. $sectione['image_path'].$images[0] .'')){
												$view_shapeimage = "". SITE_URL ."image.php/".$images[0]."?width=92&height=92&image=/images/". $sectione['image_path'].$images[0]."";
											}else{
												$view_shapeimage = "". SITE_URL ."image.php/".$images[1]."?width=92&height=92&image=/images/". $sectione['image_path'].$images[1]."";
											}
										}
									}else{
										$view_shapeimage = '';
									}
									?>
									<li style="margin-bottom: 35px;">
										<div class="blog_image">
											<a href="<?php echo SITE_URL; ?>selection/engagement-rings-detail/<?php echo $sectione['id'];?>" target="_blank"><img src="<?php echo $view_shapeimage;?>" alt="Diamond Ring"></a>
										</div>
										<div class="blog_right">
											<h4 style="font-size: 12px;overflow: visible;white-space: break-spaces;line-height: 16px;"><a href="<?php echo SITE_URL; ?>selection/engagement-rings-detail/<?php echo $sectione['id'];?>" target="_blank" style="color: #d18c4a;"><?php echo $sectione['description'];?></a></h4>
											<span class="price">$<?php echo _nf($sectione['price'],2);?></span>
										</div>
									</li>
								<?php
								endforeach;
							endif;
							?>
						</ul>
						<div class="view_all"><a class="button_custom" href="<?php echo SITE_URL; ?>diamonds/engagement-rings" target="_blank">view all</a></div>
						<style type="text/css">
						.block_title {padding-left: 30px;font-weight: bold;color: #908787;}
						</style>
					</div>
				</div>
			</div>
			<div class="widget block block-static-block">
				<div class="signature_container"><a href="<?php echo SITE_URL; ?>brian-gavins-hearts-and-arrows/"><img src="images/signatureright-img.png" alt="Signature Banner"></a></div>
			</div>
		</div>
	</div>

	<div class="custome_subscribe">
		<div class="subscribe_container">
			<div class="subscribe_recive">
				<div class="subscribe_product"><img src="images/ring-bottom.png" alt="custom ring design"></div>
				<p>Subscribe to receive <a>email exclusive</a> discount offers <br> and stay up to date with new releases and other news.</p>
			</div>
			<div class="content">
				<form class="form subscribe" novalidate="novalidate" action="<?php echo SITE_URL; ?>" method="post" id="newsletter-validate-detail">
					<div class="field newsletter">
						<div class="control">
							<input name="email" type="email" id="newsletter" placeholder="your@email.here" data-validate="{required:true, 'validate-email':true}">
						</div>
					</div>
					<div class="actions">
						<div> </div>
						<a class="action subscribe primary biolist_open subscribeButton" title="Subscribe" href="#biolist" data-popup-ordinal="0" style="padding: 10px 57.07px;" onclick="copySubscribeEmail()"><span>Subscribe</span></a>
					</div>
					<input type="hidden" name="amasty_invisible_token">
				</form>
			</div>
		</div>
	</div>

	<div class="trust_pilot_container">
		<div class="trust_pilot">
			<div class="trust_title">
				<div class="title_main">Over 30 Years Experience in the Diamond Business</div>
			</div>
			<div class="container trustpilot">
				<div class="row" style="margin-bottom: 20px">
					<div class="review-deck">
						<div class="review">
							<div class="review-background"></div>
						</div>
					</div>
				</div>
				<div class="row" style="margin-bottom: 20px">
					<div class="review-deck">
						<div class="review">
							<div class="review-img"><img style="height: 100%;" src="<?php echo SITE_URL; ?>images/gimg-2.png" class="card-img-top" alt=""></div>
						</div>
					</div>
				</div>
				<div class="row" style="margin-bottom: 20px">
					<div class="review-deck">
						<div class="review">
							<div class="review-background"></div>
						</div>
					</div>
				</div>
				<div class="row" style="margin-bottom: 20px">
					<div class="review-deck">
						<div class="review">
							<div class="review-img"><img style="height: 100%;" src="<?php echo SITE_URL; ?>images/gimg-4.png" class="card-img-top" alt=""></div>
						</div>
					</div>
				</div>
				<div class="row" style="margin-bottom: 20px">
					<div class="review-deck">
						<div class="review">
							<div class="review-background"></div>
						</div>
					</div>
				</div>
				<div class="row" style="margin-bottom: 20px">
					<div class="review-deck">
						<div class="review">
							<div class="review-img"><img style="height: 100%;" src="<?php echo SITE_URL; ?>images/gimg-6.png" class="card-img-top" alt=""></div>
						</div>
					</div>
				</div>
				<div class="row" style="margin-bottom: 20px">
					<div class="review-deck">
						<div class="review">
							<div class="review-background"></div>
						</div>
					</div>
				</div>
				<div class="row" style="margin-bottom: 20px">
					<div class="review-deck">
						<div class="review">
							<div class="review-img"><img style="height: 100%;" src="<?php echo SITE_URL; ?>images/gimg-8.png" alt=""></div>
						</div>
					</div>
				</div>
				<div class="row" style="margin-bottom: 20px">
					<div class="review-deck">
						<div class="review">
							<div class="review-background"></div>
						</div>
					</div>
				</div>
			</div>
			<style type="text/css">
			.card-text{font-size:12px;color:#d18c4a}
			.btn.btn-primary{color:#fff}
			</style>
		</div>
		<div class="meet_designer_container">
			<div class="meet_title">
				<div class="title_main">About Yadegar Diamonds</div>
			</div>
			<video width="100%" height="auto" controls autoplay muted>
				<source src="<?php echo SITE_URL; ?>assets/rings-video.mp4" type="video/mp4">
			</video>
			<div class="meet-slider owl-carousel owl-theme owl-loaded owl-drag">
				<div class="owl-stage-outer">
					<div class="owl-stage" style="transform: translate3d(-654px, 0px, 0px); transition: all 0.25s ease 0s; width: 1962px;">
						<div class="owl-item active" style="width: 327px;">
							<div class="item">&nbsp;</div>
						</div>
						<div class="owl-item active" style="width: 327px;">
							<div class="item">&nbsp;</div>
						</div>
						<div class="owl-item active" style="width: 327px;">
							<div class="item">
								<div class="meet_images"></div>
								<div class="designer_info">
									<p>Craftsman and inventor of Tension Settings<sup class="wt-sup-p2">™</sup> and magnetic Polarium<sup class="wt-sup-p2">™</sup> platinum jewelry.</p>
									<ul>
										<?php
										if(!empty($section4)):
											foreach($section4 as $sectiond):
												?>
												<li>
													<div class="meet_product_image"><a href="<?php echo SITE_URL; ?>collection/collection-detail/<?php echo $sectiond['stock_number'];?>"><img src="<?php echo "". SITE_URL ."image.php/".$sectiond['image1']."?width=94&height=94&image=/". $sectiond['image1'] ."";?>"></a></div>
													<div class="rating_summery">&nbsp;</div>
													<div class="product_title"><a href="<?php echo SITE_URL; ?>collection/collection-detail/<?php echo $sectiond['stock_number'];?>"><?php echo $sectiond['item_title'];?></a></div>
													<div class="product_price"><a href="<?php echo SITE_URL; ?>collection/collection-detail/<?php echo $sectiond['stock_number'];?>">$<?php echo _nf($sectiond['price_website'],2);?></a></div>
												</li>
											<?php
											endforeach;
										endif;
										?>
									</ul>
									<div class="view_all"><a class="button_custom" href="<?php echo SITE_URL; ?>diamonds/fine-jewelry/new-arrivals">View Collection</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="seo_content_cover">
		<div class="most_popular_container" style="width: 100%;">
			<ul class="product_grid grid_list" id="mp_product_list">
				<?php
				if(!empty($section6)):
					foreach($section6 as $sectionz):
						if(!empty($sectionz['image'])){
							$images = explode(";",$sectionz['image']);
							$newimage = explode("/",$images[0]);
							if(file_exists('images/section3/'.end($newimage))){
								$view_shapeimage = SITE_URL.'images/section3/'.end($newimage);
							}else{
								$images = explode(";",$sectionz['image']);
								if($sectionz['costar_id'] > 0){
									if(file_exists('images/'. $sectionz['image_path'].$images[0] .'')){
										$view_shapeimage = "". SITE_URL ."image.php/".$images[0]."?width=220&height=220&image=/images/". $sectionz['image_path'].$images[0]."";
									}else{
										$view_shapeimage = "". SITE_URL ."image.php/".$images[1]."?width=220&height=220&image=/images/". $sectionz['image_path'].$images[1]."";
									}
								}elseif($sectionz['overnight_id'] > 0){
									if(file_exists('images/'. $sectionz['image_path'].str_replace("THUMBNAIL/","",$images[0]).'')){
										$view_shapeimage = "". SITE_URL ."image.php/".str_replace("THUMBNAIL/","",$images[0])."?width=220&height=220&image=/images/". $sectionz['image_path'].str_replace("THUMBNAIL/","",$images[0])."";
									}else{
										$view_shapeimage = "". SITE_URL ."image.php/".str_replace("THUMBNAIL/","",$images[1])."?width=220&height=220&image=/images/". $sectionz['image_path'].str_replace("THUMBNAIL/","",$images[1])."";
									}
								}elseif($sectionz['dev_us_id'] > 0){
									if(file_exists(''. $sectionz['image_path'].$images[0] .'')){
										$view_shapeimage = "". SITE_URL ."image.php/".$images[0]."?width=220&height=220&image=/images/". $sectionz['image_path'].$images[0]."";
									}else{
										$view_shapeimage = "". SITE_URL ."image.php/".$images[1]."?width=220&height=220&image=/images/". $sectionz['image_path'].$images[1]."";
									}
								}else{
									if(file_exists('images/'. $sectionz['image_path'].$images[0] .'')){
										$view_shapeimage = "". SITE_URL ."image.php/".$images[0]."?width=220&height=220&image=/images/". $sectionz['image_path'].$images[0]."";
									}else{
										$view_shapeimage = "". SITE_URL ."image.php/".$images[1]."?width=220&height=220&image=/images/". $sectionz['image_path'].$images[1]."";
									}
								}
							}
						}else{
							$view_shapeimage = '';
						}
						if($sectionz['dev_us_id'] > 0){
							$sqlClr = "SELECT metal_weight,supplied_stones FROM dev_us WHERE name LIKE '".$sectionz['name']."' AND id = '".$sectionz['dev_us_id']."' ";
							$queryClr = $this->db->query($sqlClr);
							$resultClr = $queryClr->row();
							$cur_stones1 = explode(',',$resultClr->supplied_stones);
							$req_tot = 0;
							if(!empty($cur_stones1)){
								foreach($cur_stones1 as $cur_stone1){
									$req_data = explode('-',$cur_stone1);
									$req_tot = $req_tot + (int)$req_data[0];
								}
								$req_tot = $req_tot +1;
							}
							$weightigrm = str_replace(" grams","",$resultClr->metal_weight);
							$metalprc = 70*$weightigrm;
							$stonprc = 14*$req_tot;
							$semiMountprce = $metalprc+$stonprc;
							$finalsemiMountprce = $semiMountprce*1.5;
							$offer_price = $finalsemiMountprce;
						}else{
							$offer_price = $sectionz['price'];
						}

						require_once 'Mobile_Detect.php';
						$detect = new Mobile_Detect;
						?>
						<li <?php if(!$detect->isMobile()){ echo 'style="width: 17%;"'; } ?>>
							<div class="product_list">
								<a href="<?php echo SITE_URL; ?>selection/engagement-rings-detail/<?php echo $sectionz['id'];?>"><img src="<?php echo $view_shapeimage;?>" alt="Diamond"></a>
								<div class="product_list_info">
									<span class="price">$<?php echo _nf($offer_price,2);?></span>
									<b style="font-size:16px;">Setting Price</b>
									<?php if($sectionz['overnight_id'] > 0){ ?>
										<div class="product_info"><a class="product_name" href="<?php echo SITE_URL; ?>selection/engagement-rings-detail/<?php echo $sectionz['id'];?>"><span class="name_bold">#<?php echo $sectionz['item_number'];?></span></a></div>
									<?php }else{ ?>
										<div class="product_info"><a class="product_name" href="<?php echo SITE_URL; ?>selection/engagement-rings-detail/<?php echo $sectionz['id'];?>"><span class="name_bold"><?php echo $sectionz['description'];?></span></a></div>
									<?php } ?>
								</div>
							</div>
						</li>
					<?php
					endforeach;
				endif;
				?>
			</ul>
			<div class="view_all" id="mp_view_more"><a class="button_custom" href="<?php echo SITE_URL; ?>diamonds/engagement-rings" id="mp_view_more_a">view all</a></div>
		</div>
	</div>
</main>
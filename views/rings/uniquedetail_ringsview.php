<script>
function getRingSize(field_id) {
	var mt = document.getElementById(field_id).value;
	window.location = mt;
}
function ringThumbView(th_url) {
	$('#ringsthumb').html('Loading.....');
	$('#ringsthumb').html('<img src="'+th_url+'" width="400" onmousemove="jscMagnify(this,event)" onmouseout="jscMagnifyHide()" alt="" />')
}
function commentsThisPost() {
	var urlink = base_url+'site/postRingComents';
	dataString = $("#coment_form").serialize();
	var fname = $('#full_name').val();
	var em = $('#email_adres').val();
	var coments = $('#tr_comments').val();
	var eror = '';
	<?php if(!$this->session->isLoggedin()){ ?>
	$('#view_errors').html('Plz login to your account first to comments this product!');
	return false
	<?php } ?>
	if(fname == '') {
		$('#full_name').focus();
		$('#view_errors').html('Please enter your Full name!');
		return false
	}
	if(em == '') {
		eror = 'Please enter your email address!';
		$('#email_adres').focus();
		$('#view_errors').html('Please enter your email address!');
		return false
	}
	if(coments == '') {
		$('#tr_comments').focus();
		$('#view_errors').html('Please enter your comments!');
		return false
	}
	$("#view_coments").html('');
	$.ajax({
		type: "POST",
		url:urlink,
		data: dataString,
		success: function(data) {
			$('#view_errors').html('<div style="margin: 0px auto; "><img src="'+base_url+'images/loading.gif" alt="loading"></div>');
			$("#view_errors").html(data);
			$('#tr_comments').val('');
			$('#cmb_rating').val('');
		},
		error: function(){
			alert('Error ');
		}
	});
}
</script>
<style>
#ringsthumb{position:relative}
.formStyle textarea{height:36px!important}
.reviewData{color:#000!important;font-size:16px!important}
.ctdm_shapes a img{width:32px}
.activeShape img{border:1px solid #FF0}
.commentsForm{padding:0 20px}
.commentsForm textarea{height:50px}
.commentsForm .fieldBlock{margin-bottom:10px;padding-top:5px}
.formStyle .fLabel{font-size:14px}
a:hover{text-decoration:none!important}
.formStyle input[type='email']{width:250px;border:0;background:#f0f0f0;padding:6px 10px;font-size:16px}
#view_errors{color:red;padding-bottom:3px}
#ringsthumb{width:100%;height:100%;text-align:center}
.vringThumb{width:100%}
.vringThumb a img{width:115px}
</style>
<div id="main-body-a">
	<div class="rightCl">
		<div class="pgSt">
			<div class="bread-crumb brbg">
				<div class="breakcrum_bk">
					<ul>
						<li><a href="<?php echo config_item('base_url') ?>">Home</a></li>
						<li><a href="<?php echo config_item('base_url') ?>rings/ringCollections/<?= $catgory_id; ?>"><?php echo $parent_cate; ?></a></li>
						<li><a href="<?php echo config_item('base_url') ?>rings/rings_view_detail/<?= $catgory_id; ?>/<?= $setings_id; ?>"><?php echo $details['item_number'] ?></a></li>
					</ul>
				</div>
				<div class="clear"></div>
			</div>
			<br />
		</div>
		<div class="contentTb">
			<?php
			$na = 'NA';
			$mm = ' mm';
			$top_width 	   = (isset($details['top_width']) && !empty($details['top_width'])?$details['top_width'].$mm : $na );
			$bottom_width  = (isset($details['top_width']) && !empty($details['bottom_width'])?$details['bottom_width'].$mm : $na );
			$top_height    = (isset($details['top_width']) && !empty($details['top_height'])?$details['top_height'].$mm : $na );
			$bottom_height = (isset($details['top_width']) && !empty($details['bottom_height'])?$details['bottom_height'].$mm : $na );
			$rint_style	   = isset($details['style_group'])?$details['style_group']:'';

			if(!empty($details['image'])){
				$images = explode(";",$details['image']);
				if($details['costar_id'] > 0){
					if(file_exists('images/'. $details['image_path'].$images[0].'')){
						$ringimage = SITE_URL ."images/". $details['image_path'].$images[0];
					}else{
						$ringimage = SITE_URL ."images/". $details['image_path'].$images[1];
					}
				}elseif($details['overnight_id'] > 0){
					if(file_exists('images/'. $details['image_path'].str_replace("THUMBNAIL/","",$images[0]).'')){
						$ringimage = SITE_URL ."images/". $details['image_path'].str_replace("THUMBNAIL/","",$images[0]);
					}else{
						$ringimage = SITE_URL ."images/". $details['image_path'].str_replace("THUMBNAIL/","",$images[1]);
					}
				}elseif($details['dev_us_id'] > 0){
					if(file_exists(''. $details['image_path'].$images[0].'')){
						$ringimage = SITE_URL . $details['image_path'].$images[0];
					}else{
						$ringimage = SITE_URL . $details['image_path'].$images[1];
					}
				}else{
					if(file_exists('images/'. $details['image_path'].$images[0].'')){
						$ringimage = SITE_URL ."images/".$details['image_path'].$images[0];
					}else{
						$ringimage = SITE_URL ."images/".$details['image_path'].$images[1];
					}
				}
			}else{
				$ringimage = '';
			}
			if($details['dev_us_id'] > 0){
				$sqlClr = "SELECT metal_weight,supplied_stones FROM dev_us WHERE name LIKE '".$details['name']."' AND id = '".$details['dev_us_id']."' ";
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
				$offer_price = $finalsemiMountprce+225;
			}else{
				$offer_price = $details['price'];
			}
			$ringName = !empty($details['description'])?$details['description']:$details['name'];
			$ring_id = $details['id'];
			?>
			<form id="form1" name="form1" method="post" action="">
				<table class="contb_bk">
					<tr>
						<td>
							<div class="whHead"> <span class="dwar-icon"></span> <?php echo $parent_cate; ?> </div>
							<br />
							<div class="textList">
								<label>Setting Type:&nbsp;&nbsp;</label>
								<span><?php echo $details['stone_shape']; ?></span>
							</div>
							<div class="textList">
								<label>Product ID:&nbsp;&nbsp;</label>
								<span><?php echo $details['item_number']; ?></span>
							</div>
							<div class="textList">
								<?php
								if($offer_price > 0) {
									echo '<label>Price:&nbsp;&nbsp;</label>
									<span id="vieDyPrice">$'.$offer_price.'</span>';
								} else {
									echo '<label>Call: 1-866-Yad-EGAR</label>';
								}
								?>
							</div>
							<br /><br />
							<div class="readText"><?php echo $details['descriptionNdetails']; ?></div>
							<br />
						</td>
						<td colspan="2">
							<div id="ringsthumb"><img src="<?php echo $ringimage; ?>" width="400" alt="<?php echo $details['name']; ?>" /></div>
							<br>
							<div class="vringThumb">
								<?php 
								$make_html = '';
								if(!empty($details['image'])){
									$gallery_imgs1 = explode(";",$details['image']);
									$gallery_imgs = array_unique($gallery_imgs1);
									if(!empty($gallery_imgs)){
										if($details['costar_id'] > 0){
											foreach($gallery_imgs as $gallery_img1){
												if($gallery_img1 != '' && $gallery_img1 != '.'){
													if(file_exists('images/'.$details['image_path'].$gallery_img1)){
														$make_html .= '<a href="#javascript;" onclick="ringThumbView(\''. SITE_URL .'images/'.$details['image_path'].$gallery_img1 .'\')"><img src="'. SITE_URL .'images/'.$details['image_path'].$gallery_img1 .'" alt="'.$details['description'].'"></a>';
													}
												}
											}
										}elseif($details['overnight_id'] > 0){
											foreach($gallery_imgs as $gallery_img1){
												if (strpos($gallery_img1, '.jpg') !== false) {
													if(file_exists('images/'.$details['image_path'].str_replace("THUMBNAIL/","",$gallery_img1))){
														$make_html .= '<a href="#javascript;" onclick="ringThumbView(\''. SITE_URL .'images/'.$details['image_path'].str_replace("THUMBNAIL/","",$gallery_img1) .'\')"><img src="'. SITE_URL .'images/'.$details['image_path'].str_replace("THUMBNAIL/","",$gallery_img1) .'" alt="'.$details['description'].'"></a>';
													}
												}
											}
										}elseif($details['dev_us_id'] > 0){
											foreach($gallery_imgs as $gallery_img1){
												if (strpos($gallery_img1, '.jpg') !== false) {
													if(file_exists(''.$details['image_path'].$gallery_img1)){
														$make_html .= '<a href="#javascript;" onclick="ringThumbView(\''. SITE_URL .$details['image_path'].str_replace("THUMBNAIL/","",$gallery_img1) .'\')"><img src="'. SITE_URL .$details['image_path'].$gallery_img1 .'" alt="'.$details['description'].'"></a>';
													}
												}
											}
										}else{
											foreach($gallery_imgs as $gallery_img1){
												if($gallery_img1 != '' && $gallery_img1 != '.'){
													if(file_exists('images/'.$details['image_path'].'Medium/'.$gallery_img1)){
														$make_html .= '<a href="#javascript;" onclick="ringThumbView(\''. SITE_URL .'images/'.$details['image_path'].'Medium/'.$gallery_img1 .'\')"><img src="'. SITE_URL .'images/'.$details['image_path'].'Medium/'.$gallery_img1 .'" alt="'.$details['description'].'"></a>';
													}
												}
											}
										}
									}
								}
								echo $make_html;
								?>
							</div>
							<br>
						</td>
					</tr>
					<tr>
						<td>
							<div class="whHead"> <span class="dwar-icon"></span> Engrave Setting: </div>
							<br />
							<div class="engra_text" ng-app="">
								<div class="textList">
									<label>Font:&nbsp;&nbsp;</label>
									<span>
										<select name="font_style" id="font_style" onChange="viewStyle()">
											<option value="Courier New, Courier, monospace" selected>Corier New</option>
											<option value="Georgia, Times New Roman, Times, serif">Georgia</option>
											<option value="Verdana, Geneva, sans-serif">Verdana</option>
											<option value="Arial, Helvetica, sans-serif">Arial</option>
											<option value="'Comic Sans MS, cursive">Comic Sans</option>
										</select>
									</span>
								</div>
								<div class="textList">
									<label>Engrave Text:&nbsp;&nbsp;</label>
									<span>
										<input type="text" name="txt_engtext" ng-model="name" maxlength="15" />
									</span>
								</div>
								<div class="textList">
									<label>Cost:&nbsp;&nbsp; <span>$30</span></label>
									<span class="engImgBlock"><div ng-bind="name" id="viewFont"></div><img src="<?php echo config_item('base_url') ?>images/engr-text.jpg" /></span>
								</div>
							</div>
						</td>
						<td>
							<div class="engra_text social_box">
								<div class="textList">
									<label>Metal Type:&nbsp;&nbsp;</label>
									<span><?= isset($details['metal'])?$details['metal']:''; ?></span>
								</div>
								<div class="textList">
									<div class="orderBtn"><a href="#" onclick="addcartsubmit('<?php echo $buynow_link; ?>')" id="addtoshopping" class="btnLinkStyle ">Place a Memo</a></div>
									<br /><br /><br /><br />
									<input type="hidden" name="txt_rstyle" id="txt_rstyle" value="<?php echo $rint_style; ?>">
									<input type="hidden" name="3ez_price" value="<?php echo intval(number_format($ez3value,0,'.','')); ?>">
									<input type="hidden" name="5ez_price" value="<?php echo intval(number_format($ez5value,0,'.','')); ?>">
									<input type="hidden" name="main_price" value="<?php echo intval(number_format($offer_price,0,'.','')); ?>">
									<input type="hidden" name="price" value="<?php echo intval(number_format($offer_price,0,'.','')); ?>">
									<input type="hidden" name="vender" value="unique">
									<input type="hidden" name="url" value="<?php echo $ringimage ?>">
									<input type="hidden" name="prodname" value="<?= isset($details['ringName'])?$details['ringName']:'';?>">
									<input type="hidden" name="diamnd_count" value="<?= isset($details['supplied_stones'])?$details['supplied_stones']:'';?>">
									<input type="hidden" name="ring_shape" value="<?= isset($details['stone_shape'])?$details['stone_shape']:'';?>">
									<input type="hidden" name="ring_carat" value="<?= isset($details['diamond_weight'])?str_replace(" CT.","",$details['diamond_weight']):'';?>">
									<input type="hidden" name="prid" value="<?php echo $ring_id;?>">
									<input type="hidden" name="txt_ringtype" value="generic_ring">
									<input type="hidden" name="txt_ringsize" value="<?= isset($details['ring_size'])?$details['ring_size']:'';?>" />
									<input type="hidden" name="txt_metal" value="<?= isset($details['metal'])?$details['metal']:'';?>" />
								</div>
								<div class="clear"></div>
								<br />
							</div>
						</td>
						<td>
							<div class="linkBlock">
								<div class="textList"> <a href="#" class="js__p_start"><span class="askic"></span>&nbsp;&nbsp;Ask a Friend</a> </div>
								<div class="textList"> <a href="#" class="js__p_another_start"><span class="askxic"></span>&nbsp;&nbsp;Ask an Expert</a> </div>
								<div class="textList"> <a href="#javascript;" onclick="printCurrPage();"><span class="printic"></span>&nbsp;&nbsp;Print This</a> </div>
								<div class="textList">
									<a href="<?php echo SITE_URL.'account/account_wishlist/'.$ring_id; ?>"><span class="addic"></span>&nbsp;&nbsp;Add To wish List</a> 
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<td colspan="3">
							<script>
							function viewStyle() {
								var ft = $('#font_style').val();
								$("#viewFont").css({ "font-family": ft });
							}

							$(function() {
								$("#example-one").organicTabs();
								$("#example-two").organicTabs({
									"speed": 200
								});

								$('.nano').nanoScroller({
									preventPageScrolling: true
								});
								$(".nano").nanoScroller();
								$("#main").find("img").load(function() {
									$(".nano").nanoScroller();
								});
								viewStyle();
								$(".js__p_start, .js__p_another_start").simplePopup();
							});
        
							$(document).ready(function() {
								function close_accordion_section() {
									$('.accordion .accordion-section-title').removeClass('active');
									$('.accordion .accordion-section-content').slideUp(300).removeClass('open');
								}

								$('.accordion-section-title').click(function(e) {
									var currentAttrValue = $(this).attr('href');
									if($(e.target).is('.active')) {
										close_accordion_section();
									}else {
										close_accordion_section();
										$(this).addClass('active');
										$('.accordion ' + currentAttrValue).slideDown(300).addClass('open'); 
									}
									e.preventDefault();
								});
							});
							function printCurrPage() {
								window.print();
							}
							</script>
						</td>
					</tr>
				</table>
			</form>
			<?php
			/* $org_price=$ringPriceView;
			$cuprice=$ringPriceView;
			$cateid_ar = array(52, 128, 202);
			$notallowed_id = array(59,67,69);

			$ring_size = ( !empty( $details['ring_size'] ) ? $details['ring_size'] : 6 );
			$netRingPrice = number_format($cuprice,2);
			$ringDescription = get_site_title().' stunning '.$details['parent_cate'].' '.$sbparent_style.' Style '.$details['stone_shape'].' diamond ';

			if(!in_array($getparent_cate, $notallowed_id)){
				$ringDescription .= 'semi mount ';
			}
			$ringDescription .= 'ring can be yours for <span id="viewDyPrice">$'.$netRingPrice.'</span>. This ring does not include the Center diamond. Center Diamonds are sold seperately.';

			$idlist_ar = array(7,66);
			if(in_array($getparent_cate, $idlist_ar)) {
				$addtoRingBtn = '<a href="#javascript;" onclick="addcartsubmit(\''.$addtoring_link.'\')" id="addtoshopping"><img src="'.config_item('base_url').'images/select-ring.jpg"  alt="loading"/></a><br />';
				$uniqueRingsDesc = $ringDescription;
			} else {
				$addtoRingBtn = '';	
				$uniqueRingsDesc = get_site_title().' stunning '.$details['parent_cate'].' '.$sbparent_style.' Style '.$details['stone_shape'].' diamond ring can be yours for <span id="viewDyPrice">$'.$netRingPrice.'</span>.';
			} */
			?>
			<div id="example-two">
				<ul class="nav">
					<li class="nav-one"><a href="#featured2" class="current">More Details</a></li>
					<li class="nav-two"><a href="#core2">Similar Products</a></li>
					<li class="nav-three"><a href="#jquerytuts2">Customer Reviews</a></li>
					<li class="nav-four last"><a href="#classics2">Policies</a></li>
				</ul>
				<div class="list-wrap">
					<div id="featured2">
						<div class="tabsHeading">Description</div>
						<br />
						<div class="tabsData"><?= isset($details['descriptionNdetails'])?$details['descriptionNdetails']:'';?> <a href="#">diamond inventory</a>.</div>
						<br />
						<div class="tabsHeading"><?php echo get_site_title(); ?> Signature</div>
						<br />
						<div class="tabsData">Supplied by approved outside vendors who have passed our strict quality control process. Selection is based on design, quality of materials, and price for the product.</div>
						<br /><br />
						<div class="tabBox">
							<div class="tabsHeading">SETTING INFORMATION:</div>
							<div class="tabsRow">
								<div class="metaLeft">Metal: <span class="sizeBlock"><?= isset($details['metal'])?$details['metal']:'';?></span> </div>
							</div>
							<div class="tabsRow">
								<div class="metaLeft">Style Name: <span class="sizeBlock"><?php echo $details['name']; ?></span> </div>
							</div>
							<div class="tabsRow">
								<div class="metaLeft">Style Group Name: <span class="sizeBlock"><?= isset($details['style_group'])?$details['style_group']:'';?></span> </div>
							</div>
							<div class="tabsRow">
								<div class="metaLeft">14k Gold Weight: <span class="sizeBlock"><?php echo $details['metal_weight']; ?></span> </div>
							</div>
							<div class="tabsRow">
								<div class="metaLeft">Supplied Stones: <span class="sizeBlock"><?= isset($details['supplied_stones'])?$details['supplied_stones']:'';?></span> </div>
							</div>
							<div class="tabsRow">
								<div class="metaLeft">Supplied Stone Weight: <span class="sizeBlock"><?php echo $details['side_stone_weight']; ?></span> </div>
							</div>
							<div class="tabsRow">
								<div class="metaLeft">Center Stone Sold Separately: <span class="sizeBlock"><?= isset($details['additional_stones'])?$details['additional_stones']:'';?></span> </div>
							</div>
							<div class="tabsRow">
								<div class="metaLeft">Diamond Shapes: <span class="sizeBlock"><?= isset($details['stone_shape'])?$details['stone_shape']:'';?></span> </div>
							</div>
						</div>
						<div class="tabBox tbrow2">
							<div class="tabsHeading">AVAILABLE IN SIZES:</div>
							<br>
							<div class="tabsHeading">Range of Color and Clarity:</div>
							<div class="tabsRow">
								<div class="metaLeft">Clarity: <span class="sizeBlock">VVS1 to SI2</span> </div>
							</div>
							<div class="tabsRow">
								<div class="metaLeft">Color: <span class="sizeBlock">D to L</span> </div>
							</div>
							<div class="tabsHeading">Interested in a Different Diamond Shape :</div>
							<div class="tabsRow furtherdesc"> For the exceptional cases where Ring can support other shapes other than as mentioned on this detail page please <a href="#javascript;" class="js__p_another_start clickLink">click this link</a> and fill out form for your custom specifications you desire for ring. </div>
						</div>
						<div class="clear"></div>
					</div>
					<div id="core2" class="hide">
						<div class="similar_prod">
							<?= isset($similarProdList)?$similarProdList:''; ?>
							<div class="clear"></div>
						</div>
						<div class="clear"></div>
					</div>
					<div id="jquerytuts2" class="hide">
						<div class="reviewLink"> <img src="<?php echo config_item('base_url') ?>img/page_img/stars_icon.png" />&nbsp;&nbsp; <a href="#javascript;" onclick="postComents()" class="commentBtn">Post a Comment</a> </div>
						<div id="main">
							<div class="nano has-scrollbar">
								<form method="post" name="coment_form" id="coment_form" action="" class="formStyle commentsForm">
									<div id="postcoment_form" style="display:none;">
										<div id="view_errors"></div>
										<div class="fieldBlock">
											<div class="columnSection">
												<div class="fLabel">Full Name</div>
												<input required="required" type="text" name="full_name" value="" id="full_name">
											</div>
											<div class="columnSection">
												<div class="fLabel">Email Address</div>
												<input required="required" type="email" value="" name="email_adres" id="email_adres">
												<input type="hidden" name="rings_id" value="<?php echo $ring_id; ?>" />
											</div>
											<div class="clear"></div>
										</div>
										<div class="fieldBlock">
											<div class="fLabel">Ring Rating</div>
											<div>
												<select required="required" name="cmb_rating" id="cmb_rating">
													<option>1</option>
													<option>2</option>
													<option>3</option>
													<option>4</option>
													<option selected="selected">5</option>
												</select>
											</div>
										</div>
										<div class="fieldBlock">
											<div class="fLabel">Comments</div>
											<div class="">
												<textarea name="tr_comments" required="required" id="tr_comments"></textarea>
											</div>
										</div>
										<div><a href="#javascript;" onclick="commentsThisPost()" class="commentBtn">Submit</a></div> 
									</div>
								</form>
								<div class="overthrow nano-content description" tabindex="0" style="right: -17px;" id="vcomments_list">
									<?= isset($view_coments)?$view_coments:''; ?>
								</div>
								<div class="nano-pane" style="display: block;">
									<div class="nano-slider" style="height: 35px; transform: translate(0px, 179.61471656403px);"></div>
								</div>
							</div>
						</div>
					</div>
					<div id="classics2" class="hide">
						<?php echo ringsPoliciesTabs();?>
					</div>
				</div>
			</div>
			<!-- popup blocks start! -->

			<div class="p_body js__p_body js__fadeout"></div>
			<div class="popup js__popup js__slide_top">
				<a href="#" class="p_close js__p_close" title="Ask a Friend"> <span></span><span></span> </a>
				<form name="askFriendForm" id="askFriendForm" method="post" action="#">
				<div class="p_content">
				<div class="popupHeading">Ask a Friend&nbsp;<span class="validateMesage"></span></div>
				<div class="formArea">
				<div class="fieldBlock">
				<div class="fLabel">Your Name</div>
				<div class="columnSection">
				<input type="text" name="frien_fname" id="frien_fname" />
				<br />
				<span>First Name</span> </div>
				<div class="columnSection">
				<input type="text" name="frien_lname" id="frien_lname" />
				<br />
				<span>Last Name</span> </div>
				<div class="clear"></div>
				</div>
				<div class="fieldBlock">
				<div class="fLabel">Your Email</div>
				<div>
				<input type="text" name="frien_email" id="frien_email" class="fullTextField" />
				</div>
				</div>
				<div class="fieldBlock">
				<div class="fLabel">Friend Name</div>
				<div class="columnSection">
				<input type="text" name="frien_frfname" id="frien_frfname" />
				<br />
				<span>First Name</span> </div>
				<div class="columnSection">
				<input type="text" name="frien_frlname" id="frien_frlname" />
				<br />
				<span>Last Name</span> </div>
				<div class="clear"></div>
				</div>
				<div class="fieldBlock">
				<div class="fLabel">Friend Email</div>
				<div class="">
				<input type="text" name="frien_fremail" id="frien_fremail" class="fullTextField" />
				</div>
				</div>
				<div class="fieldBlock">
				<div class="fLabel">Description / Message</div>
				<div class="">
				<textarea name="frein_desc" id="frein_desc"></textarea>
				</div>
				</div>
				<div class="fieldBlock">
				<input type="hidden" name="details_link" id="details_link" value="<?php echo 'site/engagementRingDetail/'.$catgory_id.'/'.$ring_id;?>">
				<input type="button" name="btn_fnsubmit" class="btnStyle" onclick="friendForm()" value="Submit" />
				</div>
				</div>
				</div>
				</form>
			</div>
			<!-- second popup block -->
			<div class="popup js__another_popup js__slide_top">
				<a href="#" class="p_close js__p_close" title="As an Expert"> <span></span><span></span> </a>
				<form name="askExpertForm" id="askExpertForm" method="post" action="#">
					<div class="p_content">
					<div class="popupHeading">Ask an Expert&nbsp;<span class="expertVdMessage"></span></div>
					<div class="formArea">
					<div class="fieldBlock">
					<div class="fLabel">Name</div>
					<div class="columnSection">
					<input type="text" name="exprt_fname" id="exprt_fname" />
					<br />
					<span>First Name</span> </div>
					<div class="columnSection">
					<input type="text" name="exprt_lname" id="exprt_lname" />
					<br />
					<span>Last Name</span> </div>
					<div class="clear"></div>
					</div>
					<div class="fieldBlock">
					<div class="fLabel">Email</div>
					<div>
					<input type="text" name="exprt_email" id="exprt_email" class="fullTextField" />
					</div>
					</div>
					<div class="fieldBlock">
					<div class="fLabel">Phone No.</div>
					<div>
					<input type="text" name="exprt_pno" id="exprt_pno" class="" />
					</div>
					</div>
					<div class="fieldBlock">
					<div class="fLabel">How did you hear about us?</div>
					<div>
					<select name="exprt_hear" id="exprt_hear">
					<option value="">Select</option>
					<option>Search Engine</option>
					<option>Yahoo</option>
					<option>Bing</option>
					<option>Google</option>
					<option>Friends</option>
					<option>Family</option>
					<option>Other Sources</option>
					</select>
					</div>
					</div>
					<div class="fieldBlock">
					<div class="fLabel">Description</div>
					<div class="">
					<textarea name="exprt_desc" id="exprt_desc"></textarea>
					</div>
					</div>
					<div class="fieldBlock">
					<input type="hidden" name="details_link" id="details_link" value="<?php echo 'site/engagementRingDetail/'.$catgory_id.'/'.$ring_id;?>">
					<input type="button" name="btn_exsubmit" class="btnStyle" onclick="askExperForm()" value="Submit" />
					</div>
					</div>
					</div>
				</form>
			</div>
			<!-- popup blocks end! --> 
		</div>
	</div>
	<div class="clear"></div>
	<br />
	<div class="clear"></div>
	<div class="clearfix"></div>
	<script type="text/javascript">
	$('#zoom_01').elevateZoom({
		zoomType: "inner",
		cursor: "crosshair",
		zoomWindowFadeIn: 500,
		zoomWindowFadeOut: 750
	});	
	function myFocus(element) {
		if (element.value == element.defaultValue) {
			element.value = '';
		}
	}
	function myBlur(element) {
		if (element.value == '') {
			element.value = element.defaultValue;
		}
	}
    </script> 
	<script type="text/javascript">
	var currentImage;
	var currentIndex = -1;
	var interval;
	function showImage(index){
		if(index < $('#bigPic img').length){
			var indexImage = $('#bigPic img')[index]
			if(currentImage){   
				if(currentImage != indexImage ){
					$(currentImage).css('z-index',2);
					clearTimeout(myTimer);
					$(currentImage).fadeOut(250, function() {
						myTimer = setTimeout("showNext()", 3000);
						$(this).css({'display':'none','z-index':1})
					});
				}
			}
			$(indexImage).css({'display':'block', 'opacity':1});
			currentImage = indexImage;
			currentIndex = index;
			$('#thumbs li').removeClass('active');
			$($('#thumbs li')[index]).addClass('active');
		}
	}

	function showNext(){
		var len = $('#bigPic img').length;
		var next = currentIndex < (len-1) ? currentIndex + 1 : 0;
		showImage(next);
	}

    var myTimer;
    $(document).ready(function() {
		myTimer = setTimeout("showNext()", 3000);
		showNext();
		$('#thumbs li').bind('click',function(e){
			var count = $(this).attr('rel');
			showImage(parseInt(count)-1);
		});
	});
    </script> 
	<script type="text/javascript">
	$(document).ready( function() {
	$("#tabs ul li:first").addClass("active");
	$("#tabs div:gt(0)").hide();
	$("#tabs ul li").click(function(){
	$("#tabs ul li").removeClass('active');
	//var current_index = $(this).index(); // Sử dụng cho jQuery >= 1.4.x
	var current_index = $("#tabs ul li").index(this);
	$("#tabs ul li:eq("+current_index+")").addClass("active");
	$("#tabs div").hide();
	$("#tabs div:eq("+current_index+")").fadeIn(100);
	});
	});
	</script> 
	<script type="text/javascript">
    function addcartsubmit(pageURL){
		var radios = document.getElementsByName('price');
		var selected;
		for (var i = 0, count = radios.length; i < count; i++) {
			if (radios[i].checked) {
				selected = radios[i].value;
				break;
			}
		}
		if (selected) {
			document.getElementById('form1').submit();
		} else { 
			document.getElementById('form1').action = pageURL;
			document.getElementById('form1').submit();
		}
    }

    function ringSize(){
		var productid = "<?= isset($details['style_group'])?$details['style_group']:0; ?>";
		var ringsize =  document.getElementById('selectringsize');
		var metaltype =  document.getElementById('slectmetaltype').value;
		url = base_url+'site/uniqeDetailMetalAjax/';
		var posting = $.post( url, { metal: metaltype, product: productid},function(data) {
		ringsize.innerHTML = data;
		} );
		var stullselection = document.getElementById('selectringsize');
		stullselection.onchange = prices;
		var addtocart =  document.getElementById('addtoshopping');
		addtocart.onclick = addcartsubmit;
    }

    function prices(){
		var ezststus = "<?= isset($details['ezstatus'])?$details['ezstatus']:'';?>";
		var productid = "<?= isset($details['style_group'])?$details['style_group']:0; ?>";
		var ringsize =  document.getElementById('selectringsize').value;
		var metaltype =  document.getElementById('slectmetaltype').value;
		var allpriceshow =  document.getElementById('allpriceshow');
		url = base_url+'site/uniqeDetailPriceAjax/';
		var posting = $.post( url, { metal: metaltype, ring: ringsize, ez: ezststus, product: productid, },function(data) {
		allpriceshow.innerHTML = data;
		} );
    }

    function addWishlist(){
		var radios = document.getElementsByName('price');
		var selected;
		for (var i = 0, count = radios.length; i < count; i++) {
			if (radios[i].checked) {
				selected = radios[i].value;
				break;
			}
		}

		if (selected) {
			document.getElementById('form1').action = "<?php echo config_item('base_url') ?>jewelleries/wishList";
			document.getElementById('form1').submit();
		} else { alert('Please select a payment option.'); }
	}

	function init(){
		var quaselection = document.getElementById('slectmetaltype');
		quaselection.onchange = ringSize;
	}
	window.onload = init;
	$('.zoom_01').elevateZoom({
		zoomType: "inner",
		cursor: "crosshair",
		zoomWindowFadeIn: 500,
		zoomWindowFadeOut: 750
	});
	</script> 
</div>
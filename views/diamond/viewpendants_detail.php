<link rel="stylesheet" href="<?php echo SITE_URL; ?>css/jquery.popup.css" />
<script>
$(function() {
	$(".js__p_another_start").simplePopup();
});
</script>
<div id="diamond_dtails">
	<div>
		<div class="detailHeading">Diamond Detail</div>
		<div class="diamond_imgview">
			<a href="<?php echo $detail_pglink; ?>" class="dmshape_view"><img src="<?php echo $view_shapeimage ?>" alt="<?php echo $diamond_shape ?>" width="215" /></a>
		</div>
	</div>
	<div class="diamonds_more_detail">
		<div class="button_bk"> 
			<a href="#javascript;" onclick="closeDetail()"><img src="<?php echo SITE_URL?>img/david_home/diamond_search/close_details.jpg" alt="Close Detail" /></a>
			<a href="<?php echo $detail_pglink; ?>"><img src="<?php echo SITE_URL?>img/david_home/diamond_search/more_detail_btn.jpg" alt="More Detail" /></a>
		</div>
		<div class="round_cara"><?php echo $row_detail['carat'].' Carat '.$diamond_shape; ?> Diamond</div>
		<div class="pric_bk"><span>$<?php echo number_format($row_detail['price'],0); ?></span>&nbsp;&nbsp; <a href="<?php echo $addto_dmlink; ?>"><img src="<?php echo SITE_URL?>img/david_home/diamond_search/add_this_diamond.jpg" alt="Add This Diamond" /></a> </div>
		<div id="summ_bk" class="summr_bk">
			<span class="summr_label">Summary</span>
			<span class="summr_links"> <a href="#" class="js__p_another_start"><img src="<?php echo SITE_URL?>img/david_home/diamond_search/mail_icon.jpg" alt="Send Email" /></a> <a href="#javascript" onclick="printBlock('diamond_dtails')"><img src="<?php echo SITE_URL?>img/david_home/diamond_search/print_icon.jpg" alt="Print Form" /></a> </span>
			<div class="clear"></div>
		</div>
		<div class="summr_bk"> <span class="summr_label">Stock Number</span> <span class="summr_links"><?php echo $row_detail['Stock_n']; ?></span>
			<div class="clear"></div>
		</div>
		<div class="summr_bk"> <span class="summr_label">Retail Price</span> <span class="summr_links">$<?php echo _nf($row_detail['price']); ?></span>
			<div class="clear"></div>
		</div>
		<?php /* <div class="summr_bk"> <span class="summr_label">Price Per Carat</span> <span class="summr_links">$<?php echo _nf($row_detail['pricepercrt'],0); ?></span>
			<div class="clear"></div>
		</div> */ ?>
		<div class="summr_bk"> <span class="summr_label">Carat Weight</span> <span class="summr_links"><?php echo $row_detail['carat']; ?></span>
			<div class="clear"></div>
		</div>
		<div class="summr_bk"> <span class="summr_label">Shape</span> <span class="summr_links"><?php echo $diamond_shape; ?></span>
			<div class="clear"></div>
		</div>
		<div class="summr_bk"> <span class="summr_label">Cut</span> <span class="summr_links"><?php echo $row_detail['cut']; ?></span>
			<div class="clear"></div>
		</div>
		<div class="summr_bk"> <span class="summr_label">Color</span> <span class="summr_links"><?php echo $row_detail['color']; ?></span>
			<div class="clear"></div>
		</div>
		<div class="summr_bk"> <span class="summr_label">Clarity</span> <span class="summr_links"><?php echo $row_detail['clarity']; ?></span>
			<div class="clear"></div>
		</div>
		<div class="summr_bk"> <span class="summr_label">Length/Width ratio</span> <span class="summr_links"><?php echo $row_detail['length'].'x'.$row_detail['width']; ?></span>
			<div class="clear"></div>
		</div>
		<div class="summr_bk"> <span class="summr_label">Depth %</span> <span class="summr_links"><?php echo $row_detail['Depth']; ?>%</span>
			<div class="clear"></div>
		</div>
		<div class="summr_bk"> <span class="summr_label">Table</span> <span class="summr_links"><?php echo $row_detail['TablePercent']; ?>%</span>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
		<div id="diamond_more_detail" style="display: block;">
			<div class="summr_bk"> <span class="summr_label">Polish</span> <span class="summr_links"><?php echo $row_detail['Polish']; ?></span>
				<div class="clear"></div>
			</div>
			<div class="summr_bk"> <span class="summr_label">Symmetry</span> <span class="summr_links"><?php echo $row_detail['Sym']; ?></span>
				<div class="clear"></div>
			</div>
			<div class="summr_bk"> <span class="summr_label">Girdle</span> <span class="summr_links"><?php echo $row_detail['Girdle']; ?></span>
				<div class="clear"></div>
			</div>
			<div class="summr_bk"> <span class="summr_label">Culet</span> <span class="summr_links"><?php echo $row_detail['Culet']; ?></span>
				<div class="clear"></div>
			</div>
			<div class="summr_bk"> <span class="summr_label">Floursecence</span> <span class="summr_links"><?php echo $row_detail['Flour']; ?></span>
				<div class="clear"></div>
			</div>
			<div class="summr_bk"> <span class="summr_label">Measurements</span> <span class="summr_links"><?php echo $row_detail['Meas']; ?></span>
				<div class="clear"></div>
			</div>
			<div class="summr_bk">
				<div class="dataseting">Order Today for free Loose Diamond Delivery on <?php echo nextDate().' or set in jewelry on '.nextDate(11); ?>.</div><br>
				<div class="">
					<div class="helpLabel">Need Help</div>
					<div class="dataseting">Your questions or feedback are always welcome at <?php echo get_site_title(); ?>. Join in a conversation with one of our Diamond and Jewelry Consultants to help you make the right decision.</div>
				</div><br>
				<div class="">
					<div class="contact_column">
						<!--<div class="liveChat">Live Chat</div>-->
						<div class="contactNo"><?php echo get_site_title('contact_info'); ?></div>
						<div class="emailUs"><a href="mailto:<?php echo get_site_title('email'); ?>">Email Us</a></div>
					</div>
				</div>
				<div class="clear"></div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
			<div class="">
				<a href="<?php echo $detail_pglink; ?>" class="dmshape_view"><img src="<?php echo $view_shapeimage ?>" alt="<?php echo $diamond_shape ?>" width="215" /></a><br>
				<div class="grading_rptstyle">Diamond Grading Report</div>
				<div><a href="http://www.gia.edu/cs/Satellite?reportno=<?php echo $row_detail['Cert_n'] ?>&c=Page&childpagename=GIA%2FPage%2FReportCheck&pagename=GIA%2FDispatcher&cid=1355954554547&encryptedString=7CD682F48A4AC0441FEEC95403BDAA3C" target="_blank"><img src="<?php echo SITE_URL?>img/icons/gia_rptic.jpg" alt="GIA Report" /></a></div>
				<div class="clear"></div>
				<div class="pric_bk"><span>$<?php echo number_format($row_detail['price'],0); ?></span>&nbsp;&nbsp; <a href="<?php echo $addto_dmlink; ?>"><img src="<?php echo SITE_URL?>img/david_home/diamond_search/add_this_diamond.jpg" alt="Add This Diamond" /></a></div>
				<div class="clear"></div>
				<div class="button_bk"> <a href="#javascript;" onclick="closeDetail()"><img src="<?php echo SITE_URL?>img/david_home/diamond_search/close_details.jpg" alt="Close Detail" /></a> <a href="<?php echo $detail_pglink; ?>"><img src="<?php echo SITE_URL?>img/david_home/diamond_search/more_detail_btn.jpg" alt="More Detail" /></a> </div>
			</div>
		</div>
	</div>
</div>
<div class="p_body js__p_body js__fadeout"></div>
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
						<span>First Name</span>
					</div>
					<div class="columnSection">
						<input type="text" name="exprt_lname" id="exprt_lname" />
						<br />
						<span>Last Name</span>
					</div>
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
					<input type="hidden" name="details_link" id="details_link" value="<?php echo 'diamonds/diamond_detail/'.$row_detail['lot'].'/'.$addoption.'/'.$settingsid;?>">
					<input type="button" name="btn_exsubmit" class="btnStyle" onclick="askExperForm()" value="Submit" />
				</div>
			</div>
		</div>
	</form>
</div>
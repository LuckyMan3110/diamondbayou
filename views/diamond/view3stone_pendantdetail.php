<script>
$(document).ready(function() {
	$(".tabContent").not(":first").hide();
	$("ul.tabs li:first").addClass("active").show();
	$("ul.tabs li").click(function() {
		$("ul.tabs li.active").removeClass("active");
		$(this).addClass("active");
		$(".tabContent").hide();
		$($('a',this).attr("href")).fadeIn('slow'); 
		return false;
	});

	$("li#opentabs1").click(function() {
		$(".tabimg2").hide();
		$(".tabimg1").show();
	});

	$("li#opentabs2").click(function() {
		$(".tabimg1").hide();
		$(".tabimg2").show();
	});
});
</script>
<div id="vdiamond_3stonedetail">
	<div class="button_bk">
		<a href="#javascript;" onclick="closeDetail()">
			<img src="<?php echo SITE_URL;  ?>img/david_home/diamond_search/close_details.jpg" alt="Close Detail">
		</a>
		<a href="<?php echo $moredt_link; ?>">
			<img src="<?php echo SITE_URL;  ?>img/david_home/diamond_search/more_detail_btn.jpg" alt="More Detail">
		</a>
	</div>
    <div class="tabimg1">
		<a href="<?php echo $moredt_link; ?>">
			<img src="<?php echo $view_shapeimage; ?>" alt="<?php echo $diamond_shape; ?>" width="215" />
		</a>
	</div>
	<div class="tabimg2" style="display:none;">
		<a href="<?php echo $moredt_link2; ?>">
			<img src="<?php echo $view_shapeimage2; ?>" alt="<?php echo $diamond_shape2; ?>" width="215" />
		</a>
	</div>
	<br>
	<div class="tabs_labelbk">
		<h3>Your Diamond Pair</h3>
		<div>Your Diamond Pair has a Total Carat Weight 
		of <?php echo $sidestone_carat; ?> carats. These carefully selected 
		diamonds work well together because of 
		their near-identical cut, color, clarity and 
		size. To compare the specific diamond 
		details, see the charts and information below.</div>
	</div>
	<div class="pric_bk">
		<span><?php echo $bothdm_price; ?></span>&nbsp;&nbsp; <a href="<?php echo $moredt_link; ?>"><img src="<?php echo SITE_URL;  ?>img/david_home/diamond_search/add_this_diamond.jpg" alt="Add This Diamond"></a>
	</div>
	<div>Your item requires 2 diamonds</div>
	<ul class="tabs">
		<li id="opentabs1"><a href="#tab1">1</a></li>
		<li id="opentabs2"><a href="#tab2">2</a></li>
	</ul>
	<div class="tabContainer">
		<div id="tab1" class="tabContent">
			<div id="summ_bk" class="summr_bk">
				<span class="summr_label">Summary</span> <span class="summr_links"> <a href=""><img src="<?php echo SITE_URL; ?>img/icons/mail_ic.jpg" alt="Send Email" /></a> <a href=""><img src="<?php echo SITE_URL; ?>img/icons/print_ic.jpg" alt="Print Form" /></a> </span>
				<div class="clear"></div>
			</div>
			<div class="summr_bk">
				<span class="summr_label">Stock Number</span> <span class="summr_links"><?php echo $row_detail['Stock_n']; ?></span>
				<div class="clear"></div>
			</div>
			<div class="summr_bk">
				<span class="summr_label">Retail Price</span> <span class="summr_links">$<?php echo _nf($row_detail['price']); ?></span>
				<div class="clear"></div>
			</div>
			<?php /* <div class="summr_bk"> <span class="summr_label">Price Per Carat</span> <span class="summr_links">$<?php echo _nf($row_detail['pricepercrt']); ?></span>
			<div class="clear"></div>
			</div> */ ?>
			<div class="summr_bk">
				<span class="summr_label">Carat Weight</span> <span class="summr_links"><?php echo $row_detail['carat']; ?></span>
				<div class="clear"></div>
			</div>
			<div class="summr_bk">
				<span class="summr_label">Shape</span> <span class="summr_links"><?php echo $diamond_shape; ?></span>
				<div class="clear"></div>
			</div>
			<div class="summr_bk">
				<span class="summr_label">Cut</span> <span class="summr_links"><?php echo $row_detail['cut']; ?></span>
				<div class="clear"></div>
			</div>
			<div class="summr_bk">
				<span class="summr_label">Color</span> <span class="summr_links"><?php echo $row_detail['color']; ?></span>
				<div class="clear"></div>
			</div>
			<div class="summr_bk">
				<span class="summr_label">Clarity</span> <span class="summr_links"><?php echo $row_detail['clarity']; ?></span>
				<div class="clear"></div>
			</div>
			<div class="summr_bk">
				<span class="summr_label">Length/Width ratio</span> <span class="summr_links"><?php echo $row_detail['length'].'x'.$row_detail['width']; ?></span>
				<div class="clear"></div>
			</div>
			<div class="summr_bk">
				<span class="summr_label">Depth %</span> <span class="summr_links"><?php echo $row_detail['Depth']; ?>%</span>
				<div class="clear"></div>
			</div>
			<div class="summr_bk">
				<span class="summr_label">Table</span> <span class="summr_links"><?php echo $row_detail['TablePercent']; ?>%</span>
				<div class="clear"></div>
			</div>
			<div class="summr_bk">
				<span class="summr_label">Polish</span> <span class="summr_links"><?php echo $row_detail['Polish']; ?></span>
				<div class="clear"></div>
			</div>
			<div class="summr_bk">
				<span class="summr_label">Symmetry</span> <span class="summr_links"><?php echo $row_detail['Sym']; ?></span>
				<div class="clear"></div>
			</div>
			<div class="summr_bk">
				<span class="summr_label">Girdle</span> <span class="summr_links"><?php echo $row_detail['Girdle']; ?></span>
				<div class="clear"></div>
			</div>
			<div class="summr_bk">
				<span class="summr_label">Culet</span> <span class="summr_links"><?php echo $row_detail['Culet']; ?></span>
				<div class="clear"></div>
			</div>
			<div class="summr_bk">
				<span class="summr_label">Floursecence</span> <span class="summr_links"><?php echo $row_detail['Flour']; ?></span>
				<div class="clear"></div>
			</div>
			<div class="summr_bk">
				<span class="summr_label">Measurements</span> <span class="summr_links"><?php echo $row_detail['Meas']; ?></span>
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
						<div class="contactNo"><?php echo get_site_title('contact_info'); ?></div>
						<div class="emailUs"><a href="mailto:<?php echo get_site_title('email'); ?>">Email Us</a></div>
					</div>
				</div>
				<div class="clear"></div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
			<div class="">
				<a href="<?php echo $moredt_link; ?>"><img src="<?php echo $view_shapeimage ?>" alt="<?php echo $diamond_shape ?>" width="215" /></a><br>
				<div class="grading_rptstyle">Diamond Grading Report</div>
				<div><a href="http://www.gia.edu/cs/Satellite?reportno=<?php echo $row_detail['Cert_n'] ?>&c=Page&childpagename=GIA%2FPage%2FReportCheck&pagename=GIA%2FDispatcher&cid=1355954554547&encryptedString=7CD682F48A4AC0441FEEC95403BDAA3C" target="_blank"><img src="<?php echo SITE_URL; ?>img/icons/gia_rptic.jpg" alt="GIA Report" /></a></div>
				<div class="clear"></div>
				<div class="pric_bk"><span><?php echo $bothdm_price; ?></span>&nbsp;&nbsp; <a href="<?php echo $moredt_link; ?>"><img src="<?php echo SITE_URL; ?>img/david_home/diamond_search/add_this_diamond.jpg" alt="Add This Diamond" /></a></div>
				<div class="clear"></div>
				<div class="button_bk"> <a href="#javascript;" onclick="closeDetail()"><img src="<?php echo SITE_URL; ?>img/david_home/diamond_search/close_details.jpg" alt="Close Detail" /></a> <a href="<?php echo $moredt_link; ?>"><img src="<?php echo SITE_URL; ?>img/david_home/diamond_search/more_detail_btn.jpg" alt="More Detail" /></a> </div>
			</div>
		</div>
		<div id="tab2" class="tabContent">
			<div id="summ_bk" class="summr_bk">
				<span class="summr_label">Summary</span> <span class="summr_links"> <a href=""><img src="<?php echo SITE_URL; ?>img/icons/mail_ic.jpg" alt="Send Email" /></a> <a href=""><img src="<?php echo SITE_URL; ?>img/icons/print_ic.jpg" alt="Print Form" /></a> </span>
				<div class="clear"></div>
			</div>
			<div class="summr_bk">
				<span class="summr_label">Stock Number</span> <span class="summr_links"><?php echo $row_detail2['Stock_n']; ?></span>
				<div class="clear"></div>
			</div>
			<div class="summr_bk">
				<span class="summr_label">Retail Price</span> <span class="summr_links">$<?php echo _nf($row_detail2['price']); ?></span>
				<div class="clear"></div>
			</div>
			<?php /* <div class="summr_bk"> <span class="summr_label">Price Per Carat</span> <span class="summr_links">$<?php echo _nf($row_detail2['pricepercrt']); ?></span>
			<div class="clear"></div>
			</div> */ ?>
			<div class="summr_bk">
				<span class="summr_label">Carat Weight</span> <span class="summr_links"><?php echo $row_detail2['carat']; ?></span>
				<div class="clear"></div>
			</div>
			<div class="summr_bk">
				<span class="summr_label">Shape</span> <span class="summr_links"><?php echo $diamond_shape; ?></span>
				<div class="clear"></div>
			</div>
			<div class="summr_bk">
				<span class="summr_label">Cut</span> <span class="summr_links"><?php echo $row_detail2['cut']; ?></span>
				<div class="clear"></div>
			</div>
			<div class="summr_bk">
				<span class="summr_label">Color</span> <span class="summr_links"><?php echo $row_detail2['color']; ?></span>
				<div class="clear"></div>
			</div>
			<div class="summr_bk">
				<span class="summr_label">Clarity</span> <span class="summr_links"><?php echo $row_detail2['clarity']; ?></span>
				<div class="clear"></div>
			</div>
			<div class="summr_bk">
				<span class="summr_label">Length/Width ratio</span> <span class="summr_links"><?php echo $row_detail2['length'].'x'.$row_detail2['width']; ?></span>
				<div class="clear"></div>
			</div>
			<div class="summr_bk">
				<span class="summr_label">Depth %</span> <span class="summr_links"><?php echo $row_detail2['Depth']; ?>%</span>
				<div class="clear"></div>
			</div>
			<div class="summr_bk">
				<span class="summr_label">Table</span> <span class="summr_links"><?php echo $row_detail2['TablePercent']; ?>%</span>
				<div class="clear"></div>
			</div>
			<div class="summr_bk">
				<span class="summr_label">Polish</span> <span class="summr_links"><?php echo $row_detail2['Polish']; ?></span>
				<div class="clear"></div>
			</div>
			<div class="summr_bk">
				<span class="summr_label">Symmetry</span> <span class="summr_links"><?php echo $row_detail2['Sym']; ?></span>
				<div class="clear"></div>
			</div>
			<div class="summr_bk">
				<span class="summr_label">Girdle</span> <span class="summr_links"><?php echo $row_detail2['Girdle']; ?></span>
				<div class="clear"></div>
			</div>
			<div class="summr_bk">
				<span class="summr_label">Culet</span> <span class="summr_links"><?php echo $row_detail2['Culet']; ?></span>
				<div class="clear"></div>
			</div>
			<div class="summr_bk">
				<span class="summr_label">Floursecence</span> <span class="summr_links"><?php echo $row_detail2['Flour']; ?></span>
				<div class="clear"></div>
			</div>
			<div class="summr_bk">
				<span class="summr_label">Measurements</span> <span class="summr_links"><?php echo $row_detail2['Meas']; ?></span>
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
						<div class="contactNo"><?php echo get_site_title('contact_info'); ?></div>
						<div class="emailUs"><a href="mailto:<?php echo get_site_title('email'); ?>">Email Us</a></div>
					</div>
				</div>
				<div class="clear"></div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
			<div class="">
				<a href="<?php echo $moredt_link; ?>"><img src="<?php echo $view_shapeimage ?>" alt="<?php echo $diamond_shape ?>" width="215" /></a><br>
				<div class="grading_rptstyle">Diamond Grading Report</div>
				<div><a href="http://www.gia.edu/cs/Satellite?reportno=<?php echo $row_detail2['Cert_n'] ?>&c=Page&childpagename=GIA%2FPage%2FReportCheck&pagename=GIA%2FDispatcher&cid=1355954554547&encryptedString=7CD682F48A4AC0441FEEC95403BDAA3C" target="_blank"><img src="<?php echo SITE_URL; ?>img/icons/gia_rptic.jpg" alt="GIA Report" /></a></div>
				<div class="clear"></div>
				<div class="pric_bk"><span><?php echo $bothdm_price; ?></span>&nbsp;&nbsp; <a href="<?php echo $moredt_link; ?>"><img src="<?php echo SITE_URL; ?>img/david_home/diamond_search/add_this_diamond.jpg" alt="Add This Diamond" /></a></div>
				<div class="clear"></div>
				<div class="button_bk"> <a href="#javascript;" onclick="closeDetail()"><img src="<?php echo SITE_URL; ?>img/david_home/diamond_search/close_details.jpg" alt="Close Detail" /></a> <a href="<?php echo $moredt_link; ?>"><img src="<?php echo SITE_URL; ?>img/david_home/diamond_search/more_detail_btn.jpg" alt="More Detail" /></a> </div>
			</div>
		</div>
	</div>
	<div style="clear:both;"></div>
</div>
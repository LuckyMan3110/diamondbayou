<div class="button_bk"> 
<a href="#javascript;" onclick="closeDetail()"><img src="<?php echo config_item('base_url')?>img/icons/close_dtic.jpg" alt="Close Detail" /></a> <a href="<?php echo $detail_pglink; ?>"><img src="<?php echo config_item('base_url')?>img/icons/mrdetail_ic.jpg" alt="More Detail" /></a> </div>
<div class=""> <a href="<?php echo $detail_pglink; ?>" class="dmshape_view"><img src="<?php echo $view_shapeimage ?>" alt="<?php echo $diamond_shape ?>" width="215" /></a></div><br>
<div class="round_cara"><?php echo $row_detail['carat'].' Carat '.$diamond_shape; ?> Diamond</div>
<div class="pric_bk"><span>$<?php echo number_format($row_detail['price'],0); ?></span>&nbsp;&nbsp; <a href="<?php echo $addto_dmlink; ?>"><img src="<?php echo config_item('base_url')?>img/icons/addm_ic.jpg" alt="Add This Diamond" /></a> </div>
<div id="summ_bk" class="summr_bk"> <span class="summr_label">Summary</span> <span class="summr_links"> <a href=""><img src="<?php echo config_item('base_url')?>img/icons/mail_ic.jpg" alt="Send Email" /></a> <a href=""><img src="<?php echo config_item('base_url')?>img/icons/print_ic.jpg" alt="Print Form" /></a> </span>
  <div class="clear"></div>
</div>
<div class="summr_bk"> <span class="summr_label">Stock Number</span> <span class="summr_links"><?php echo $row_detail['Stock_n']; ?></span>
  <div class="clear"></div>
</div>
<div class="summr_bk"> <span class="summr_label">Retail Price</span> <span class="summr_links">$<?php echo _nf($row_detail['price']); ?></span>
  <div class="clear"></div>
</div>
<div class="summr_bk"> <span class="summr_label">Price Per Carat</span> <span class="summr_links">$<?php echo _nf($row_detail['pricepercrt'],0); ?></span>
  <div class="clear"></div>
</div>
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
<!--<div class="summr_bk"> All of our certified diamonds are backed by our Diamond Price Guarantee. <a href="#">Learn More</a><br>
  <br>
  Order in the next 8 hours 4 minutes for free delivery loose on <span class="set_colr">Monday Feburary 2 </span>or set jewelry on<span class="set_colr"> Tuseday Feburary</span>.
  <div class="clear"></div>
</div>-->
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
<div class=""> <a href="<?php echo $detail_pglink; ?>" class="dmshape_view"><img src="<?php echo $view_shapeimage ?>" alt="<?php echo $diamond_shape ?>" width="215" /></a><br>
	<!--<img src="<?php echo config_item('base_url')?>img/icons/dmview_icon.jpg" alt="Diamond Shape" />-->
  <div class="grading_rptstyle">Diamond Grading Report</div>
  <div><a href="http://www.gia.edu/cs/Satellite?reportno=<?php echo $row_detail['Cert_n'] ?>&c=Page&childpagename=GIA%2FPage%2FReportCheck&pagename=GIA%2FDispatcher&cid=1355954554547&encryptedString=7CD682F48A4AC0441FEEC95403BDAA3C" target="_blank"><img src="<?php echo config_item('base_url')?>img/icons/gia_rptic.jpg" alt="GIA Report" /></a></div>
  <div class="clear"></div>
  <div class="pric_bk"><span>$<?php echo number_format($row_detail['price'],0); ?></span>&nbsp;&nbsp; <a href="<?php echo $addto_dmlink; ?>"><img src="<?php echo config_item('base_url')?>img/icons/addm_ic.jpg" alt="Add This Diamond" /></a></div>
  <div class="clear"></div>
  <div class="button_bk"> <a href="#javascript;" onclick="closeDetail()"><img src="<?php echo config_item('base_url')?>img/icons/close_dtic.jpg" alt="Close Detail" /></a> <a href="<?php echo $detail_pglink; ?>"><img src="<?php echo config_item('base_url')?>img/icons/mrdetail_ic.jpg" alt="More Detail" /></a> </div>
</div>

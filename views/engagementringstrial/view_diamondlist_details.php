<script src="<?php echo SITE_URL; ?>/js/jquery-1.11.3.min.js"></script>
<script>
function setDiamondPrice() {
    
}

</script>
<!--
<script language="javascript" src="<?php echo SITE_URL; ?>js/jquery.popup.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?php echo SITE_URL; ?>css/jquery.popup.css" />-->
<link rel="stylesheet" href="<?php echo SITE_URL; ?>css/site-body.css" />
<script>
    $(function() {
        ////// call popup scirpt
        $(".js__p_another_start").simplePopup();
    });
</script>
<div id="diamond_dtails">
    <div>
    <div class="detailHeading">Diamond Detail</div>
<!--<div class="diamond_imgview"> <a href="#" class="dmshape_view"><img src="<?php echo $view_shapeimage ?>" alt="<?php echo $diamond_shape ?>" width="215" /></a></div>-->
</div>
    <div class="diamonds_more_detail">
        <?php
            $diamond_lot_id = str_replace('_slash_', '/', $row_detail['lot']);
        ?>
        <div class="button_bk"><a href="#javascript" onclick="selectThisDiamond('<?php echo $diamond_lot_id; ?>', '<?php echo $row_detail['price']; ?>')"><img src="<?php echo SITE_URL?>img/david_home/diamond_search/add_center_stone.jpg" alt="Add This Diamond" /></a></div>
<div class="round_cara"><?php echo $row_detail['carat'].' Carat '.$diamond_shape; ?> Diamond</div>
<div class="pric_bk"><span>$<?php echo number_format($row_detail['price'], 2); ?></span>&nbsp;&nbsp;</div>
<div id="summ_bk" class="summr_bk"> <span class="summr_label">Summary</span> <span class="summr_links"> <!--<a href="#" class="js__p_another_start"><img src="<?php echo SITE_URL?>img/david_home/diamond_search/mail_icon.jpg" alt="Send Email" /></a> <a href="#javascript" onclick="printBlock('diamond_dtails')"><img src="<?php echo SITE_URL?>img/david_home/diamond_search/print_icon.jpg" alt="Print Form" /></a>--> </span>
  <div class="clear"></div>
</div>
<div class="summr_bk"> <span class="summr_label">Stock Number</span> <span class="summr_links"><?php echo $row_detail['Stock_n']; ?></span>
  <div class="clear"></div>
</div>
<div class="summr_bk"> <span class="summr_label">Retail Price</span> <span class="summr_links">$<?php echo _nf($row_detail['price'], 2); ?></span>
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
<div class="clear"></div>
<!--<div class="view_more_detail"><a href="#javascript" class="vdetailButon" onclick="viewDiamondDtBlock()">View Details</a></div>-->

<div id="diamond_more_detail">
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
    <div class=""> <a href="<?php echo $detail_pglink; ?>" class="dmshape_view"><img src="<?php echo $view_shapeimage ?>" alt="<?php echo $diamond_shape ?>" width="215" /></a><br>
            <!--<img src="<?php echo SITE_URL?>img/david_home/diamond_search/dmview_icon.jpg" alt="Diamond Shape" />-->
      <div class="grading_rptstyle">Diamond Grading Report</div>
      <div><a href="http://www.gia.edu/cs/Satellite?reportno=<?php echo $row_detail['Cert_n'] ?>&c=Page&childpagename=GIA%2FPage%2FReportCheck&pagename=GIA%2FDispatcher&cid=1355954554547&encryptedString=7CD682F48A4AC0441FEEC95403BDAA3C" target="_blank"><img src="<?php echo SITE_URL?>img/icons/gia_rptic.jpg" alt="GIA Report" /></a></div>
      <div class="clear"></div>
      <div class="pric_bk"><span>$<?php echo number_format($row_detail['price'], 2); ?></span>&nbsp;&nbsp; <a href="#javascript"><img src="<?php echo SITE_URL?>img/david_home/diamond_search/add_center_stone.jpg" alt="Add This Diamond" /></a></div>
      <div class="clear"></div>
    </div>
    </div>
</div>
</div>
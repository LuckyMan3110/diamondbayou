<?php 
	$pth = FCPATH; //substr(FCPATH,0,-10);
	$onclickfunction = '';
	$totalprice = '';
	$metalprice = '';
	
	$metalprice = $ringmt_price;
	switch ($addoption) {
	case 'addtoring':
	//$totalprice = $diamonddetails['price'] + $details['price'] ;
	$totalprice = $diamonddetails['price'] + $metalprice;
	//$totalprice = $metalprice;
	$onclickfunction = "addtocart('" . $addoption . "','" . $lotno . "',false,false,'" . $stockno . "','" . $totalprice . "','" . $dsize . "')";
	break;
	
	case 'tothreestone':
	//$totalprice = $diamonddetails['price'] + $details['price'] + $side1['price'] + $side2['price'];
	$totalprice = $diamonddetails['price'] + $metalprice + $side1['price'] + $side2['price'];
	$onclickfunction = "addtocart('" . $addoption . "','" . $lotno . "','" . $sidestone1 . "','" . $sidestone2 . "','" . $stockno . "','" . $totalprice . "','" . $dsize . "')";
	break;
	}
	?>
<?php
	$image45 = config_item('base_url') . 'images/rings/icons/45/45degree.jpg';
	$image90 = config_item('base_url') . 'images/rings/icons/90/90degree.jpg';
	$image180 = config_item('base_url') . 'images/rings/icons/180/180degree.jpg';
	
	$image45_bg = config_item('base_url') . 'images/rings/icons/45/45.jpg';
	$image90_bg = config_item('base_url') . 'images/rings/icons/90/90.jpg';
	$image180_bg = config_item('base_url') . 'images/rings/icons/180/180.jpg';
	
	$flash1 = config_item('base_url') . 'flash/45.swf';
	$flash2 = config_item('base_url') . 'flash/90.swf';
	$flash3 = config_item('base_url') . 'flash/180.swf';
	
	if (count($flashfiles) > 0) {
	if ($flashfiles['image45']) {
	$image45 = 'images/rings/icons/45' . $flashfiles['image45'];
	$image45 = (file_exists($pth.'/'. $image45)) ? config_item('base_url') . $image45 : config_item('base_url') . 'images/rings/icons/45/45degree.jpg';
	}
	if ($flashfiles['image90']) {
	$image90 = 'images/rings/icons/90' . $flashfiles['image90'];
	$image90 = (file_exists($pth.'/'. $image90)) ? config_item('base_url') . $image90 : config_item('base_url') . 'images/rings/icons/90/90degree.jpg';
	}
	
	if ($flashfiles['image180']) {
	$image180 = 'images/rings/icons/180' . $flashfiles['image180'];
	$image180 = (file_exists($pth.'/'. $image180)) ? config_item('base_url') . $image180 : config_item('base_url') . 'images/rings/icons/180/180degree.jpg';
	}
	
	if ($flashfiles['image45_bg']) {
	$image45_bg = 'images/rings/icons/45' . $flashfiles['image45_bg'];
	$image45_bg = (file_exists($pth.'/'. $image45_bg)) ? config_item('base_url') . $image45_bg : config_item('base_url') . 'images/rings/icons/45/45.jpg';
	}
	
	if ($flashfiles['image90_bg']) {
	$image90_bg = 'images/rings/icons/90' . $flashfiles['image90_bg'];
	$image90_bg = (file_exists($pth.'/'. $image90_bg)) ? config_item('base_url') . $image90_bg : config_item('base_url') . 'images/rings/icons/90/90.jpg';
	}
	
	if ($flashfiles['image180_bg']) {
	$image180_bg = 'images/rings/icons/180' . $flashfiles['image180_bg'];
	$image180_bg = (file_exists($pth.'/'. $image180_bg)) ? config_item('base_url') . $image180_bg : config_item('base_url') . 'images/rings/icons/180/180.jpg';
	}
	
	if ($flashfiles['flash1']) {
	$flash1 = $flashfiles['flash1'];
	$flash1 = (file_exists($pth.'/'. $flash1)) ? config_item('base_url') . $flash1 : config_item('base_url') . 'flash/45.swf';
	}
	
	if ($flashfiles['flash2']) {
	$flash2 = $flashfiles['flash2'];
	$flash2 = (file_exists($pth.'/'. $flash2)) ? config_item('base_url') . $flash2 : config_item('base_url') . 'flash/90.swf';
	}
	
	if ($flashfiles['flash3']) {
	$flash3 = $flashfiles['flash3'];
	$flash3 = (file_exists($pth.'/'. $flash3)) ? config_item('base_url') . $flash3 : config_item('base_url') . 'flash/180.swf';
	}
    }
?>
<script>
	function viewImageBlock(meta) {
	$('#flashanimation').html('<div style="margin: 0px auto; text-align:center;"><img src="'+base_url+'images/loading.gif"  alt="loading"></div>');
	$('#flashanimation').html('<img src="'+meta+'" alt="" width="400" height="295" alt="loading"/>');
	}
	</script>
<style>
#example-two {
	color:#fff;
}
</style>
<div class="">
<div class="tothree_stone">
  <div class="bread-crumb">
    <div class="breakcrum_bk">
      <ul>
        <li><a href="<?php echo config_item('base_url')?>">Home</a></li>
        <li><a href="<?php echo config_item('base_url')?>">Pendant</a></li>
        <li>BUILD YOUR OWN THREE-STONE RING</li>
      </ul>
    </div>
    <div class="clear"></div>
  </div>
  <div> <?php echo stepsBuildToThrestone(); ?>
    <div class="earing_heading">BUILD YOUR OWN THREE-STONE RING</div>
    <br>
    <div class="view_seting">< View All Settings</div>
    <br>
    <div class="ringdt_desc">
      <div class="pgHeading"><?php echo $detail_title; ?></div>
      <div><?php echo $detail_desc; ?></div>
    </div>
    <br>
    <div class="clear"></div>
    <br>
    <div class="colsblock row-fluid">
      <div class="left_cols1 col-sm-4">
      <div><a href="#">See Details</a></div><br>
        <div id="flashanimation"></div>
        <div class="view_animatbk"> 
          <!--<div><a href="#"><img src="<?= config_item('base_url') ?>img/page_img/3d_ring.jpg" alt="3D Image" /></a></div>--><br>
          <center>
            <!--<a href="javascript:void(0)" onclick="showbigflash()">Larger View </a> <br>--> 
            <img src="<?= $image180 ?>" onclick="viewImageBlock('<?= $image180_bg ?>')" alt="180 degree" style="margin: 0px 5px 5px 5px;width:58px;height:58px;border:1px solid #0B81A5;"> <img src="<?= $image90 ?>" onclick="viewImageBlock('<?= $image90_bg ?>')" alt="90 degree"  style="margin: 5px;width:58px;height:58px;border:1px solid #0B81A5;"> <img src="<?= $image45 ?>" onclick="viewImageBlock('<?= $image45_bg ?>')" alt="45 Degree" style="margin: 5px;width:58px;height:58px;border:1px solid #0B81A5;"> <img src="<?= config_item('base_url') ?>img/page_img/3d_ring.jpg" onclick="writeswf(1)" alt="45 Degree" style="margin: 5px;width:58px;height:58px;border:1px solid #0B81A5;">
          </center>
          <script type="text/javascript">
	// <![CDATA[
	
	function writeswf(swfid){
	if(swfid == 1){
		so = new SWFObject("<?= $flash2 ?>", "test", "400", "295", "8", "#fff");
		so.addParam("wmode", "transparent");
		so.write("flashanimation");
	}
	
	if(swfid == 2) {
		so = new SWFObject("<?= $flash3; ?>", "test", "400", "295", "8", "#fff");
		so.addParam("wmode", "transparent");
		so.write("bigflash");
		}
	}
	writeswf(1); 
	
	
	// ]]>
	</script> 
        </div>
      </div>
      <div class="col-sm-7 pull-right">
        <div class="text-right">
            <div>
      <img src="<?php echo config_item('base_url')?>img/threstone/a_asterik.jpg" alt="List View" />&nbsp;(60)</div>
            <div> <a href="#"><img src="<?php echo config_item('base_url')?>img/threstone/r2_p.jpg" alt="" /></a> <a href="#"><img src="<?php echo config_item('base_url')?>img/threstone/r2_t.jpg" alt="" /></a> <a href="#"><img src="<?php echo config_item('base_url')?>img/threstone/r2_g.jpg" alt="" /></a> <a href="#"><img src="<?php echo config_item('base_url')?>img/threstone/r2_f.jpg" alt="" /></a> <a href="#"><img src="<?php echo config_item('base_url')?>img/threstone/r2_save.jpg" alt="" /></a> <a href="#"><img src="<?php echo config_item('base_url')?>img/threstone/r2_leter.jpg" alt="" /></a>
    </div>
        </div>
        <br>
        <div class="pendant_reviewbk">
          <div class="chain_block">
            <div class="chain_mainhead">SELECT Metal</div>
            <div class="chain_boxst">
              <div class="chain_rowst" onclick="showRingMetal('<?php echo $rings_metal; ?>')"><?php echo $rings_metal; ?></div>
              <input type="hidden" name="chain_field" id="chain_field" value="">
              <div class="chain_valuest" id="chainRow" style="display: none;"> <?php echo $metal_list; ?>
              </div>
            </div>
          </div>
          <div class="clear"></div>
          <br>
          <br>
          <br>
          <div class="ordernwRow">Shipping time varies by the diamonds and setting you select.</div>
          <div class="textSeting">Engraving is available in the basket for an additional cost.</div>
          <div class="clear"></div>
          <br>
          <div class="select_stylebk">
            <div class="price_label">$<?php echo _nf($metalprice); ?></div>
            <div class="seting_price">(setting price)</div>
            <br>
            <div><a href="<?php echo $addthis_setting?>"><img src="<?php echo config_item('base_url')?>img/threstone/r2_select.jpg" alt="" /></a></div>
          </div>
        </div>
      </div>
    </div>
    <div class="clear"></div>
    <br>
    <div class="havequest_rowst">
      <div>
      <span class="qest_label">Have Qestions?</span> <?php echo getadmin_contact_info('contact_info'); ?> 
      <span class="qest_emailst">Email Us : <a href="mailto:<?php echo getadmin_contact_info('email'); ?>"><?php echo getadmin_contact_info('email'); ?></a></span> 
      </div>
    </div>
    <div class="clear"></div>
    <div class="filter_row"> <span class="filtericon">Similar Rings</span> <span class="reset_filter"><a href="#">See all recently purchased rings ></a></span> <div class="clear"></div></div>
    <div class="clear"></div>
    <br>
    <br>
    <div class="purchased_block">
      <?php
	echo $getsimilar_rings;
	?>
    </div>
    <div class="clear"></div>
    <br>
    <br>
    <div id="" class="tabBox_block">
      <div id="example-two">
        <ul class="nav">
          <li class="nav-one"><a href="#featured2" class="current">Setting Details</a></li>
          <li class="nav-two"><a href="#core2">Reviews</a></li>
          <li class="nav-three"><a href="#shippingbk">Shippings</a></li>
        </ul>
        <div class="list-wrap">
          <div id="featured2">
            <div class="setting_title"><?php echo $detail_title; ?></div>
            <div class="tabBox">
              <div class="tabs_heading">Setting Information</div>
              <div class="tabs_row"> <span class="item_span">Stock Number:</span> <span class="item_spvalue"><?php echo check_empty($details['stock_number']); ?></span> </div>
              <div class="tabs_row"> <span class="item_span">Metal:</span> <span class="item_spvalue"><?php echo check_empty($details['metal']); ?></span> </div>
              <div class="tabs_row"> <span class="item_span">Height / Length:</span> <span class="item_spvalue"><?php echo $seting_length; ?></span> </div>
              <div class="tabs_row"> <span class="item_span">Width:</span> <span class="item_spvalue"><?php echo $seting_width; ?></span> </div>
              <div class="tabs_row"> <span class="item_span">Prong Metal:</span> <span class="item_spvalue">NA</span> </div>
              <div class="tabs_row"> <span class="item_span">Available in sizes:</span> <span class="item_spvalue"><?php echo check_empty($details['finger_size']); ?></span> </div>
            </div>
            <div id="vtabsBlock" class="tabBox"><br>
              <br>
              <br>
              <div class="tabs_row"> <span class="item_span">Number of <?php echo $details['shape']; ?> Diamonds:</span> <span class="item_spvalue"><?php echo check_empty($details['diamond_count']); ?></span> </div>
              <div class="tabs_row"> <span class="item_span">Minimum Carat Total Weight (ct. tw.):</span> <span class="item_spvalue"><?php echo check_empty($details['total_carats']); ?></span> </div>
              <div class="tabs_row"> <span class="item_span">Average color:</span> <span class="item_spvalue"><?php echo check_empty($details['metal_color']); ?></span> </div>
              <div class="tabs_row"> <span class="item_span">Average clarity:</span> <span class="item_spvalue">NA</span> </div>
              <div class="tabs_row"> <span class="item_span">Setting Type:</span> <span class="item_spvalue"><?php echo check_empty($details['ringtype']); ?></span> </div>
            </div>
            <div class="clear"></div>
            <div class="tabBox">
              <div class="tabs_heading">Can be set with</div>
              <div class="tabs_row"> <span class="item_span">Shape</span> <span class="item_spvalue">Carat Range</span> </div>
              <div class="tabs_row"> <span class="item_span">Round</span> <span class="item_spvalue">0.45 to 1.50</span> </div>
              <div class="tabs_row"> <span class="item_span">Princess</span> <span class="item_spvalue">0.45 to 1.10</span> </div>
              <br>
              <div><img src="<?php echo config_item('base_url')?>img/threstone/r2_detail.jpg" alt="" /></div>
            </div>
            <div class="clear"></div>
            <br>
            <br>
          </div>
          <div id="core2" class="hide">
            <div>Reviews Detail</div>
          </div>
          <div id="shippingbk" class="hide">
            <div class="tabBox">
              <div class="tabs_heading">Shipping Information</div>
              <div class="tabs_row"> <span class="item_span">Order By:</span> <span class="item_spvalue">4 PM EST Tomorrow</span> </div>
              <div class="tabs_row"> <span class="item_span">Received on:</span> <span class="item_spvalue">Thursday, March 19</span> </div>
              <div class="tabs_row"> <span class="item_span">Free Shipping:</span> <span class="item_spvalue">Fed Ex</span> </div>
            </div>
            <div id="vtabsBlock" class="tabBox"><br>
              <br>
              <br>
              <div class="tabs_row">Need it Faster?</div>
              <div class="tabs_row"> Do you need this <span class="green_text"><?php echo get_site_title(); ?></span> Item before Saturday, February 28 and <br>
                <a href="#">Click Here</a> to send a special request of this item and than <br>
                call <?php echo get_site_title('contact_info'); ?>. </div>
            </div>
            <div class="clear"></div>
            <br>
            <br>
          </div>
          <!-- END List Wrap -->
          <div class="clear"></div>
        </div>
      </div>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </div>
  <?php echo signup_form(); ?> </div>
<!--<script src="<?php echo config_item('base_url'); ?>js/jquery.min.js"></script>--> 
<script type="text/javascript" src="<?php echo config_item('base_url'); ?>js/organictabs.jquery.js"></script>
<link type="text/css" href="<?php echo config_item('base_url'); ?>css/tabs_pendantstyle.css" rel="stylesheet" />
<script>
	$(function() {
	
	$("#example-two").organicTabs({
	"speed": 200
	});
	
	});
	</script>
</div>
<style type="text/css">
.commonheader {
	background: none repeat scroll 0 0 #282a29 !important;
	color: #fff;
	font-size: 18px;
	font-weight: normal;
	height: 20px;
	margin: 15px 15px 5px 0;
	padding-bottom: 8px;
	padding-left: 10px;
	padding-top: 6px;
}
.green_text1, #example-two a {
	color:#fff;
}
.green_text {
	color:#000 !important;
}
</style>
<?php 
$paramoption = ($style == 'threestone') ? 'addpendantsetings3stone' : 'addpendantsetings';
$pth = FCPATH; //substr(FCPATH,0,-10);
$img = file_exists($pth.'/'.$details['small_image']) ? config_item('base_url').$details['small_image'] : config_item('base_url').'images/rings/noimage_sm.jpg';
?>
  <div class="build_pendant engagement">
    <div class="dmPendantSection"> 
      <!-- <div class="ads01"><a href="#"><img src="<?php echo config_item('base_url') ?>images/ads1.png" alt=""/></a></div> img/page_img/viewdm_img.jpg-->
      <div class="bread-crumb">
        <div class="breakcrum_bk">
          <ul>
            <li><a href="<?php echo SITE_URL ?>">Home</a></li>
            <li><a href="#">Diamonds</a></li>
            <li><a href="<?php echo SITE_URL; ?>jewelry/build_earings">Build Your Own Diamond Pendant</a></li>
          </ul>
        </div>
        <div class="clear"></div>
      </div>
      <?php echo $pendan_stepsbar;?> <br />
      <div class="pendant_mainhead">Build your own diamond pendant</div>
      <div class="pdhead_label">Review Your Pendant</div>
      <br>
      <div class="row-fluid">
      	<div class="pendant_imgrview col-sm-4"><img src="<?php echo $img;?>" width="230" alt="more"></div>
      	<div class="pendant_reviewbk col-sm-7 pull-right">
        <div class="image_icons"> <a href="#javascript" onclick="pagPrint()"><img src="<?php echo config_item('base_url');?>img/page_img/printx_ic.jpg" alt="Print Page" width=""></a>&nbsp; <a href="#" class="letter_imglink"><img src="<?php echo config_item('base_url');?>img/page_img/leter_ic.jpg" width=""></a> </div>
        <br>
        <div class="ordernwRow">Order now for free delivery on <?php echo $order_ddate; ?>.</div>
        <br>
        <!--<div class="available_itemst">This item will ship in time for Valentine's Day.</div><br>-->
        <div class="chain_block">
          <div class="chain_mainhead">SELECT Length</div>
          <div class="chain_boxst">
            <div class="chain_rowst" onclick="showChainRow()">16 in Chain Size <span id="show_chainvalue"></span> </div>
            <input type="hidden" value="16" name="chain_field" id="chain_field" />
            <div class="chain_valuest" id="chainRow"> <span class="chain_colst"><a href="#javascript;" onclick="setChainSize('16')">16 in</a></span> <span class="chain_colst"><a href="#javascript;" onclick="setChainSize('18')">18 in</a></span> <span class="chain_colst"><a href="#javascript;" onclick="setChainSize('24')">24 in</a></span> <span class="chain_colst bgwhite">&nbsp;</span> <span class="chain_colst bgwhite">&nbsp;</span> <!--<span class="chain_colst bgwhite">&nbsp;</span>--> <span class="chain_colst bgwhite">&nbsp;</span> </div>
            <br>
            <div class="chain_desctext">
              <div class="chlength_label">Learn about chain length</div>
              <div>If you don't see your chain length, please <?php echo getadmin_contact_info('contact_info'); ?>. We may still be able to help you.</div>
            </div>
          </div>
        </div>
        <div class="clear"></div>
        <br>
        <br>
        <div class="pendant_detail">
          <div> The total diamond carat weight of your earrings is <?= isset($row_detail['carat'])?$row_detail['carat']:''; ?>.<br>
            <br>
            <div><?php echo $diam_desc; ?>
              <div class="clear"></div>
              Stock #: <?= isset($row_detail['Stock_n'])?$row_detail['Stock_n']:''; ?> </div>
            <br>
            <?= isset($sidestones_desc)?$sidestones_desc:''; ?> 
            
            <!--<div><span class="green_text">Very Good-cut, E-color, VS2-clarity, Round, 0.23-carat Diamond</span> <span class="price_sectionbk">$354</span>
<div class="clear"></div>
Stock #: LD04233361</div><br>-->
            
            <div><span class="green_text"><?php echo $details['description']; ?></span><span class="price_sectionbk">$<?php echo _nf($details['price']); ?></span>
              <div class="clear"></div>
              Stock #: <?php echo $details['stock_number']; ?> </div>
            <br>
          </div>
          <div class="subtotal_price">Subtotal : <span>$<?php echo _nf( floatval($totalprice) );?></span></div>
          <br>
          <br>
          <div class="descBox"><a href="<?php echo config_item('base_url');?>account/membersignin" class="btnLinkStyle">Add To Wishlist</a></div>
          <div class="descBox"><a href="<?php echo $nexturl;?>" onclick="<?php echo ($nexturl == '#') ? $onclickfunction : '';?>" class="btnLinkStyle">Add To basket</a></div>
        </div>
        <div class="clear"></div>
        <br>
      </div>
      </div>
      <div class="clear"></div>
      <div class="havequest_rowst">
        <div><span class="qest_label">Have Qestions?</span> <?php echo getadmin_contact_info('contact_info'); ?> <span class="qest_emailst">Email Us : <a href="mailto:<?php echo getadmin_contact_info('email'); ?>"><?php echo getadmin_contact_info('email'); ?></a></span> </div>
      </div>
      <br>
      <div class="clear"></div>
      <br>
      <br>
      <div id="" class="tabBox_block">
        <div id="example-two">
          <ul class="nav">
            <li class="nav-one"><a href="#featured2" class="current">Shipping</a></li>
            <li class="nav-two"><a href="#core2">Reviews</a></li>
          </ul>
          <div class="list-wrap">
            <div id="featured2">
              <div class="tabBox">
                <div class="tabs_heading">Shipping Information</div>
                <div class="tabs_row"> <span class="item_span">Order By:</span> <span class="item_spvalue">4 PM EST Today</span> </div>
                <div class="tabs_row"> <span class="item_span">Received on:</span> <span class="item_spvalue"><?php echo $order_ddate; ?></span> </div>
                <div class="tabs_row"> <span class="item_span">Free Shipping:</span> <span class="item_spvalue">Fed Ex</span> </div>
              </div>
              <div id="vtabsBlock" class="tabBox"><br>
                <br>
                <br>
                <div class="tabs_row">Need it Faster?</div>
                <div class="tabs_row"> Do you need this <span class="green_text1"><?php echo getadmin_contact_info(); ?></span> Item before <?php echo $order_ddate; ?> and <br>
                  <a href="#">Click Here</a> to send a special request of this item and than <br>
                  <?php echo getadmin_contact_info('contact_info'); ?>.
                  <?php //echo $order_ddate; ?>
                </div>
              </div>
              <div class="clear"></div>
              <br>
              <br>
              <div class="tabs_whead">Included With Your Order:</div>
              <br>
              <div class="tabstext_dt"> GIA grading report  ><br>
                Free FedEx shipping   ><br>
                30-day returns   ><br>
                Diamond upgrade program   ><br>
              </div>
              <br>
              <div><span class="green_text1">Note:</span> Prices and availability are subject to change without notice. View our <a href="" class="grLink">terms and conditions</a> for more information <br>
              </div>
            </div>
            <div id="core2" class="hide">
              <div>Diamond Information</div>
            </div>
            <!-- END List Wrap -->
            <div class="clear"></div>
          </div>
        </div>
        <div class="clear"></div>
        <br>
        <br>
      </div>
      <div class="clear"></div>
    </div>
  </div>
  <div class="clear"></div>
<!--End #Content--> 

<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.mins.js"></script>--> 
	<script type="text/javascript" src="<?php echo config_item('base_url'); ?>js/organictabs.jquery.js"></script>
    <link type="text/css" href="<?php echo config_item('base_url'); ?>css/tabs_pendantstyle.css" rel="stylesheet" />
    <script type="text/javascript">
    function submitform()
    {
    document.getElementById('form1').submit();
    }
    </script> 
    <script>
    $(function() {
    
    $("#example-two").organicTabs({
    "speed": 200
    });
    
    });
    </script> 
    <script type="text/javascript">
    window.onload = function() {
    var radios = document.getElementsByName('ctweight');
    };
    </script> 
    <script type="text/javascript">stLight.options({publisher: "7a6efe38-c4d4-4f64-a105-5247ba606425", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
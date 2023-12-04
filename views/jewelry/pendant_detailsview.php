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
.similarItems,
#example-two {color:#fff;}
</style>
<script language="javascript" type="text/javascript" src="<?php echo config_item('base_url'); ?>js/organictabs.jquery.js"></script>
<link type="text/css" href="<?php echo config_item('base_url'); ?>css/tabs_pendantstyle.css" rel="stylesheet" />
<script language="javascript" src="<?php echo config_item('base_url'); ?>js/jquery.popup.js" type="text/javascript"></script>
<script language="javascript" src="<?php echo config_item('base_url'); ?>js/common_function.js" type="text/javascript"></script>
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
			
			$(".js__p_start, .js__p_another_start").simplePopup();
    
        });
    </script>
<?php 
$paramoption = ($style == 'threestone') ? 'addpendantsetings3stone' : 'addpendantsetings';
$pth = FCPATH; //substr(FCPATH,0,-10);
$img = file_exists($pth.'/'.$details['small_image']) ? config_item('base_url').$details['small_image'] : config_item('base_url').'images/rings/noimage_sm.jpg';
?>

    <div class="dmPendantSection"> 
      <!-- <div class="ads01"><a href="#"><img src="<?php echo config_item('base_url') ?>images/ads1.png" alt=""/></a></div> -->
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
      <br />
      <?php echo stepsRowBuildPendant(1, $addoption); ?>
      <br />
      <div class="row-fluid">
      	<div class="pendant_imgbk col-sm-4"><img src="<?php echo $img;?>" width="250px"></div>
      	<div class="col-sm-7 pull-right">
        <div class="pendantHeading"><?php echo $details['description']; ?></div>
        <br>
        <!--<p><?php echo $details['description'];?></p>-->
        <div class="descLine">Order now for shipment as early as <?php echo $order_ddate; ?>. Need it sooner? <br><?php echo getadmin_contact_info('contact_info'); ?></div>
        <br>
        <br>
        <div class="pricBlock"><?php echo ucwords($details['metal']); ?> Price : $<?php echo $details['price']?></div>
        <div class="socialIcons"></div>
        <div class="clear"></div>
        <br>
        <div class="metal_dropdown descBox">
          <select name="cmb_metaltype" id="cmb_metaltype" onchange="rdLink('cmb_metaltype')">
            <?php echo $view_mtoptions; ?>
          </select>
        </div>
        <div class="descBox"><a href="<?php echo config_item('base_url')?>diamonds/search/false/false/<?php echo $paramoption;?>/false/<?php echo $details['id'];?>" class="btnLinkStyle">Add To Diamond</a></div>
        <div class="clear"></div>
        <br>
        <br>
        <br>
        <div class="additionList">
          <ul>
            <li><a href="<?php echo config_item('base_url')?>account/membersignin">Add To Wishlist</a></li>
            <li><a href="#" class="js__p_another_start">Ask an Question</a></li>
            <li><a href="#" class="js__p_start">Email a Friend</a></li>
            <li><a href="#javascript;" onclick="pagPrint()">Print</a></li>
          </ul>
        </div>
      </div>
      </div>
      <div class="clear"></div>
      <br>
      <br>
      <hr class="horizontaLine" />
      <br>
      <div class="clear"></div>
      <div class="tabBox">
        <div class="similarItems">Similar Pendants</div>
        <div class="sitems_block">
          <div class="wgitem_block">
            <?php
					for($i=1; $i<4; $i++) {
				?>
            <a href="#"><img src="<?php echo config_item('base_url')?>img/page_img/pendant_imgbk.jpg" alt="Pendant Jewelry" /></a>
            <?php } ?>
          </div>
        </div>
      </div>
      <div id="vtabsBlock" class="tabBox">
        <div id="example-two">
          <ul class="nav">
            <li class="nav-one"><a href="#featured2" class="current">Item Detail</a></li>
            <li class="nav-two"><a href="#core2">Diamond Information</a></li>
            <li class="nav-three"><a href="#jquerytuts2">Shipping &amp; Returns</a></li>
          </ul>
          <div class="list-wrap">
            <div id="featured2">
              <div class="tabs_row"> <span class="item_span">Item Number:</span> <span class="item_spvalue">PS188</span> </div>
              <div class="tabs_row"> <span class="item_span">14K Gold:</span> <span class="item_spvalue">$750</span> </div>
              <div class="tabs_row"> <span class="item_span">Available Metals:</span> <span class="item_spvalue">14K, 18K, Platinum</span> </div>
              <div class="tabs_row"> <span class="item_span">Finish Type:</span> <span class="item_spvalue">High Polish</span> </div>
            </div>
            <div id="core2" class="hide">
              <div>Diamond Information</div>
            </div>
            <div id="jquerytuts2" class="hide">
              <div>Shipping and Returns</div>
            </div>
          </div>
          <!-- END List Wrap --> 
          
        </div>
      </div>
      <div class="clear"></div>
      <br>
      <br>
      <hr class="horizontaLine" />
      <div class="clear"></div>
      <br>
      <br>
      <div class="tabBox">
        <div class="pdImageBk"><img src="<?php echo config_item('base_url')?>img/page_img/pendant_bx.jpg" alt="About Pendant" /></div>
        <div class="pdDescBk">
          <div class="pdBkHeading">ENJOY 30-DAY RETURNS &amp; FREE FEDEX OVERNIGHT SHIPPING</div>
          <div>Yadegar aims to provide you with a worry-
            free shopping experience. If for any reason
            you aren't satisfied with your purchase you
            may return it within 30-daysof the shipping
            date for a full no-questtions -asked refund.</div>
        </div>
        <div class="clear"></div>
      </div>
      <div class="tabBox">
        <div class="pdImageBk"><img src="<?php echo config_item('base_url')?>img/page_img/help_bx.jpg" alt="About Pendant" /></div>
        <div class="pdDescBk">
          <div class="pdBkHeading">HAVE QUESTIONS? WE'RE HERE TO HELP</div>
          <div>Need help finding what you're looking for?
            Send us an email, use our live chat or speak with
            one of our customer service representatives.
            We're here to help you every step of the way. <a href="#">Learn more</a></div>
        </div>
        <div class="clear"></div>
      </div>
    </div>
    <div class="clear"></div>
<!--End #Content-->

<div class="p_body js__p_body js__fadeout"></div>
<div class="popup js__popup js__slide_top"> <a href="#" class="p_close js__p_close" title="Ask a Friend"> <span></span><span></span> </a>
  <form name="askFriendForm" method="post" action="">
    <div class="p_content">
      <div class="popupHeading">Email a Friend&nbsp;<span class="validateMesage"></span></div>
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
          <input type="button" name="btn_fnsubmit" class="btnStyle" onclick="friendForm()" value="Submit" />
        </div>
      </div>
    </div>
  </form>
</div>
<!-- second popup block -->
<div class="popup js__another_popup js__slide_top"> <a href="#" class="p_close js__p_close" title="As an Expert"> <span></span><span></span> </a>
  <form name="askExpertForm" id="askExpertForm" method="post" action="">
    <div class="p_content">
      <div class="popupHeading">Ask an Question&nbsp;<span class="expertVdMessage"></span></div>
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
          <input type="button" name="btn_exsubmit" class="btnStyle" onclick="askExperForm()" value="Submit" />
        </div>
      </div>
    </div>
  </form>
</div>
<!-- popup blocks end! -->
<script type="text/javascript">
window.onload = function() {
var radios = document.getElementsByName('ctweight');
};
</script>
<script type="text/javascript">stLight.options({publisher: "7a6efe38-c4d4-4f64-a105-5247ba606425", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>

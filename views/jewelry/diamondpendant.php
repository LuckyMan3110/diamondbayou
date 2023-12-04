<style type="text/css">
.commonheader{
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
.leftblock_box,
.leftblock_box h4,
.grLabel,
.pendantLabel,
.clickLabel,
.prodDescLabel span,
.leftblock_box a {color:#fff; z-index:}
.rgleft_sblock .yLabel{color:#fff !important;}
</style>
<script type="text/javascript">
function submitform(){
	document.getElementById('form1').submit();
}
</script>
<div id="" class="engagement">
      <div class="dmPendantSection">
           
        <!--<div class="engagement-right"> -->
        <div class="row-fluid"> 
          <!-- <div class="ads01"><a href="#"><img src="<?php echo config_item('base_url') ?>images/ads1.png" alt=""/></a></div> -->
         <div class="bread-crumb">
          <div class="breakcrum_bk">
            <ul>
                <li><a href="<?php echo SITE_URL; ?>">Home</a></li>
                <li><a href="#">Diamonds</a></li>
                <li><a href="<?php echo config_item('base_url')?>jewelry/buildiamond_pendant">Design Your Own Pendant</a></li>
              </ul>
            </div>
          <div class="clear"></div>
          </div>
        <div class="clear"></div>
          <br />
          <?php echo stepsRowBuildPendant(1, ''); ?>
          <!--<div class="pendants_lable">ORDER NOW AND ENJOY FREE FEDEX OVERNIGHT SHIPPING AND 30-DAY RETURNS</div>-->
          <!--<div class="freeFedexLabel">FREE FEDEX OVERNIGHT SHIPPING ></div>--><br>
          <div class="right_sublock row-fluid">
          <h3>PENDANT SEARCH</h3>
          	<div class="rgleft_sblock col-sm-3">
            <div class="leftblock_box">
            	<h4>Reset Search</h4><br>
                <div class="yLabel">View With</div>
                <div>
                <!--<a href="#" class="btnLinkStyle" id="threestonechk" onclick="getpendantsettings('threestonechk');addSelectClass('threestonechk')">Three Stone</a>
                <a href="#" class="btnLinkStyle" id="solitirechk" onclick="getpendantsettings('solitirechk');addSelectClass('solitirechk')">Solitaire</a>-->
                <a href="#" class="btnLinkStyle" id="threestonechk" onclick="getpendantsettings('threestonechk')">Three Stone</a>
                <a href="#" class="btnLinkStyle" id="solitirechk" onclick="getpendantsettings('solitirechk')">Solitaire</a>
                </div><br>
                <div class="yLabel">Metal Type</div>
                <div>
                <input type="checkbox" id="whitegoldchk" onclick="getpendantsettings()">&nbsp;&nbsp;<label for="whitegoldchk">14K White Gold</label><br>
                <input type="checkbox" id="yelloegoldchk" onclick="getpendantsettings()">&nbsp;&nbsp;<label for="yelloegoldchk">14K Yellow Gold</label><br>
                <input type="checkbox" id="whitegold_18" onclick="getpendantsettings()" />&nbsp;&nbsp;<label for="whitegold_18">18K White Gold</label><br>
                <input type="checkbox" id="yellowgold_18" onclick="getpendantsettings()" />&nbsp;&nbsp;<label for="yellowgold_18">18K Yellow Gold</label><br>
                <!--<input type="checkbox" name="" value="" />&nbsp;&nbsp;<label for="">Rose Gold</label><br>-->
                <input type="checkbox" id="platinumchk" onclick="getpendantsettings()">&nbsp;&nbsp;<label for="platinumchk">Platinum</label><br>
                
                </div><br><br><br>
                <div class="yLabel">Price Range</div>
                <select name="price_range" id="price_range" onchange="getpendantsettings()" class="prangeOption">
                <option value="">Select Price Range</option>
                <option value="300-325">From $ 300 To $ 325</option>
                <option value="325-340">From $ 326 To $ 340</option>
                <option value="340-400">From $ 340 To $ 400</option>
                <option value="400-405">From $ 400 To $ 405</option>
                </select>
            </div>
            <div class="clear"></div><br>
            <div class="leftblock_box leftbk_contactbox">
            	<div class="grLabel">NEED ASSISTANCE? <br>WE'RE HERE TO HELP</div><br>
                <div class="yLabel">By Phone</div>
                <div><strong>US and Canadian Customers:</strong><br>
                <?php echo get_site_title('contact_info'); ?></div><br>
                <div><strong>UK Customers:</strong><br>
                <?php echo get_site_title('contact_info'); ?></div><br>

                <div><strong>Other Inernational Customers:</strong><br>
                <?php echo get_site_title('contact_info'); ?></div><br>

				<div class="yLabel">By Email</div>
                <div><strong>Customer Sales &amp; Service</strong><br>
                <a href="mailto:leefredricksonmo@gmail.com">leefredricksonmo@gmail.com</a>
                </div><br>
				<div class="yLabel">Service Hours</div>
                <div>9am - 5pm Monday - Friday</div>
            </div>
            </div>
            <div class="rgright_sblock col-sm-9">
           <div> 
                <div class="pendantLabel">Pendants List</div>
                <!--<div class="sortBox">Sort By:
                <select name="cmb_sortoption">
                    <option value="">YADEGAR FAVORITES</option>
                </select>
                </div>-->
            </div>
            <div class="clear"></div>
            <div class="clickLabel">Click here to view a detailed explanation of your search</div><br>
            <div id="pendantresules" class="row-fluid"></div>
            </div>
          </div>
          <div class="clear"></div>
          
        </div>
        <div class="clear"></div>
      </div>
    </div>
    <div class="clear"></div>
<!--End #Content-->

<script type="text/javascript">
window.onload = function() {
var radios = document.getElementsByName('ctweight');
getpendantsettingsresult(0);
};
</script>
<script type="text/javascript">stLight.options({publisher: "7a6efe38-c4d4-4f64-a105-5247ba606425", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
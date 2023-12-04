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
<?php
if(strcmp('toearring', $addoption) === 0) {
	echo '.cols_box:nth-of-type(2):after{content: url("'.config_item('base_url').'img/page_img/side_sticon.png"); width:75px; height:35px;position: absolute;right: 32px;top: 5px;}';
}
if(strcmp('tothreestone', $addoption) === 0) {
	echo '.cols_box:nth-of-type(4):after{content: url("'.config_item('base_url').'img/page_img/engage_ring.jpg"); width:39px; height:39px;position: absolute;right: 3px;top: 0px;}';
}
?>
</style>               
<div class="dmPendantSection"> 
  <!-- <div class="ads01"><a href="#"><img src="<?php echo config_item('base_url') ?>images/ads1.png" alt=""/></a></div> -->
  <div class="bread-crumb">
    <div class="breakcrum_bk">
    	<ul>
      <li><a href="<?php echo config_item('base_url') ?>">Home</a></li>
      <li><a href="#">Diamonds</a></li>
      <li><a href="<?php echo SITE_URL; ?>jewelry/build_earings">Build Your Own Earring</a></li>
    </ul>
    </div>
    <div class="clear"></div>
  </div>
  <?php echo $pendan_stepsbar;?>
  <br />
  <div class="pagesub_label">CREATE YOUR OWN DIAMOND PENDANT</div>
  <br><br>
  <!--<div class="pendant_mainhead">Build your own diamond pendant</div>
  <div class="pdhead_label">Review Your Pendant</div><br>-->
  <div class="row-fluid">
  <div class="pendantshape_imgrview col-sm-4"><img src="<?php echo $pair_image;?>" width="430" alt="<?php echo $diamond1_shape;?>" alt="diamond1_shape" /></div>
  <div class="pendant_reviewbk col-sm-7">
    <div><?php echo $total_carat; ?> TOTAL CARAT WEIGHT </div>
    <div class="pendant_mainhead"><?php echo $diamond1_shape; ?> Diamonds</div>
    <div>DIAMOND 1: <?php echo $diamond1_detail; ?> <br>
    DIAMOND 2: <?php echo $diamond2_detail; ?> </div>
    <div class="price_style"><?php echo $total_dmprice; ?></div><br><br>
    <div class="order_loosedm">ORDER LOOSE DIAMOND FOR DELIVERY BY <?php echo $next_date; ?></div>
    <div class="free_shipst">FREE SHIPPING  FREE RETURNS</div><br>
    <div><a href="<?php echo $choose_dmlink; ?>" class="choosedm_style">Choose Diamonds</a></div>
    <div class="dropa_hint">
        <span><a href="#" class="js__p_another_start">Drop a Hint</a></span>
    </div>
    <br>
    <div>
        <div class="need_assidcl">
        <!--<div><span>- NEED ASSISTANCE?</span> CLICK TO COLLAPSE</div><br>-->
        <div>We're here for you. Our specialists are available to assist you in finding the perfect ring.</div>
        </div>
        
        <div class="contact_column">
            <!--<div class="liveChat">Live Chat</div>-->
            <div class="contactNo"><?php echo get_site_title('contact_info'); ?></div>
            <div class="emailUs"><a href="mailto:<?php echo SITE_EMAIL; ?>">Email Us</a></div>
        </div>
        <div class="clear"></div>
    </div>
    <br><br>
  </div>
  <div class="clear"></div>
  </div>
  <div class="clear"></div><br><br>
  <div class="stepstabs_row pendant_subtabs">          	
      <div id="dmdetail" class="steps_box activeBg" onclick="setDiamondTabs('diamondDetail','dmdetail')">
          <div>Diamond Details</div>
      </div>
      <div id="smdiamond" class="steps_box" onclick="setDiamondTabs('similarDiamod','smdiamond')">
          <div>Similar Diamonds</div>
      </div>
      <div id="dmpolicies" class="steps_box" onclick="setDiamondTabs('diamondPolicies','dmpolicies')">
          <div>Polices</div>
      </div>
      <div class="clear"></div>
  </div>
   <div class="clear"></div>
  <div id="diamondDetail"> 
  <div class="diamond_tbdetail row-fluid">
<div class="sutab_col1 col-sm-4">
    <div class="setcols_height">
    <div class="pendant_mainhead">Diamond 1 Details</div>
    <div>Diamonds of similar size with 
slight variations for color, clarity, 
and cut make an excellent 
matched pair for earrings.</div><br>
    <div class="imgeBlock">
    <a href="http://www.gia.edu/cs/Satellite?reportno=<?php echo $dmrow_detail['Cert_n'] ?>&c=Page&childpagename=GIA%2FPage%2FReportCheck&pagename=GIA%2FDispatcher&cid=1355954554547&encryptedString=7CD682F48A4AC0441FEEC95403BDAA3C" target="_blank"><img src="<?php echo config_item('base_url');?>img/page_img/report_img1.jpg" alt="GIA Report" /><br>GIA Report</a>
    <a href="http://www.gia.edu/cs/Satellite?reportno=<?php echo $dmrow_detail['Cert_n'] ?>&c=Page&childpagename=GIA%2FPage%2FReportCheck&pagename=GIA%2FDispatcher&cid=1355954554547&encryptedString=7CD682F48A4AC0441FEEC95403BDAA3C" target="_blank"><img src="<?php echo config_item('base_url');?>img/page_img/report_img.jpg" alt="Origin Country Certificate" /><br>Verify Report</a>
</div>
</div>
<div class="clear"></div>
<br><br>
<div class="cutlabel"><span>Cut</span>: <?php echo getCutValue($dmrow_detail['cut']); ?></div>
<div class="boxTable">
    <?php echo $cut_box; ?>
    <div class="clear"></div>
</div><br>
<div>Good quality cut which reflects some light while
maximizing weight. While not as brilliant as a good
cut, still a quality diamond. Top 35% of diamond
quality.</div>
</div>
<div class="sutab_col2 col-sm-4">	
    <div class="dmrow_leftcolum">
        <div><span>Stock Number:</span><br><?php echo $dmrow_detail['Stock_n']; ?></div><br>
        <div><span>Origin:</span><br><?php echo $dmrow_detail['Country']; ?></div><br>
        <div><span>Carat Weight:</span><br><?php echo $dmrow_detail['carat']; ?></div><br>
        <div><span>Shape:</span><br><?php echo $diamond1_shape; ?></div><br>
        <div><span>Cut:</span><br><?php echo $dmrow_detail['cut']; ?></div><br>
    </div>
    <div class="dmrow_rightcolum">
        <div><span>Color:</span><br><?php echo $dmrow_detail['color']; ?></div><br>
        <div><span>Clarity:</span><br><?php echo $dmrow_detail['clarity']; ?></div><br>
        <div><span>Measurements:</span><br><?php echo $dmrow_detail['Meas']; ?></div><br>
        <div><span>Table:</span><br><?php echo $dmrow_detail['tbl']; ?></div><br>
        <div><span>Depth:</span><br><?php echo $dmrow_detail['Depth']; ?></div><br>
    </div>		
<div class="clear"></div>
<br><br>
<div class="cutlabel"><span>Color</span>: <?php echo $dmrow_detail['color']; ?></div>
<div class="boxTable">
<?php echo $color_box; ?>
    <div class="clear"></div>
</div><br>
<div>Near-colorless. Color may be noticeable when 
compared to diamonds of better grades, but offers 
excellent value.</div>
</div>
<div class="sutab_col3 col-sm-4">
    <div class="dmrow_leftcolum">
        <div><span>Symmetry:</span><br><?php echo getCutValue($dmrow_detail['Sym']); ?></div><br>
        <div><span>Polish:</span><br><?php echo getCutValue($dmrow_detail['Polish']); ?></div><br>
        <div><span>Flouresence:</span><br><?php echo $dmrow_detail['Flour']; ?></div><br>
    </div>
<div class="clear"></div>
<br><br>
<div class="cutlabel"><span>Clarity</span>: <?php echo $dmrow_detail2['clarity']; ?></div>
<div class="boxTable">
    <?php echo $clarity_box; ?>
    <div class="clear"></div>
</div><br>
<div>Very slightly included 1. Difficult to see inclusions
under 10x magnification. Typically can not see
inclusions with the naked eye. Slightly more
inclusions than VS1.</div>
</div>

<div class="clear"></div><br><br>
</div>
    <div class="bottom_line"></div>
    <div class="diamond_tbdetail row-fluid">
<div class="sutab_col1 col-sm-4">
    <div class="setcols_height">
    <div class="pendant_mainhead">Diamond 2 Details</div>
    <div>Diamonds of similar size with 
slight variations for color, clarity, 
and cut make an excellent 
matched pair for earrings.</div><br>
    <div class="imgeBlock">
    <a href="http://www.gia.edu/cs/Satellite?reportno=<?php echo $dmrow_detail2['Cert_n'] ?>&c=Page&childpagename=GIA%2FPage%2FReportCheck&pagename=GIA%2FDispatcher&cid=1355954554547&encryptedString=7CD682F48A4AC0441FEEC95403BDAA3C" target="_blank"><img src="<?php echo config_item('base_url');?>img/page_img/report_img1.jpg" alt="GIA Report" /><br>GIA Report</a>
    <a href="http://www.gia.edu/cs/Satellite?reportno=<?php echo $dmrow_detail2['Cert_n'] ?>&c=Page&childpagename=GIA%2FPage%2FReportCheck&pagename=GIA%2FDispatcher&cid=1355954554547&encryptedString=7CD682F48A4AC0441FEEC95403BDAA3C" target="_blank"><img src="<?php echo config_item('base_url');?>img/page_img/report_img.jpg" alt="Origin Country Certificate" /><br>Verify Report</a>
</div>
</div>
<div class="clear"></div>
<br><br>
<div class="cutlabel"><span>Cut</span>: <?php echo getCutValue($dmrow_detail2['cut']); ?></div>
<div class="boxTable">
    <?php echo $cut2_box; ?>
    <!--<div class="boxTable_cols">Excellent</div>
    <div class="boxTable_cols">Ideal</div>
    <div class="boxTable_cols">Very Good</div>
    <div class="boxTable_cols">Good</div>
    <div id="lastcut_box" class="boxTable_cols extrabg">Fair</div>-->
    <div class="clear"></div>
</div><br>
<div>Good quality cut which reflects some light while
maximizing weight. While not as brilliant as a good
cut, still a quality diamond. Top 35% of diamond
quality.</div>
</div>
<div class="sutab_col2 col-sm-4">	
    <div class="dmrow_leftcolum">
        <div><span>Stock Number:</span><br><?php echo $dmrow_detail2['Stock_n']; ?></div><br>
        <div><span>Origin:</span><br><?php echo $dmrow_detail2['Country']; ?></div><br>
        <div><span>Carat Weight:</span><br><?php echo $dmrow_detail2['carat']; ?></div><br>
        <div><span>Shape:</span><br><?php echo $diamond2_shape; ?></div><br>
        <div><span>Cut:</span><br><?php echo $dmrow_detail2['cut']; ?></div><br>
    </div>
    <div class="dmrow_rightcolum">
        <div><span>Color:</span><br><?php echo $dmrow_detail2['color']; ?></div><br>
        <div><span>Clarity:</span><br><?php echo $dmrow_detail2['clarity']; ?></div><br>
        <div><span>Measurements:</span><br><?php echo $dmrow_detail2['Meas']; ?></div><br>
        <div><span>Table:</span><br><?php echo $dmrow_detail2['tbl']; ?></div><br>
        <div><span>Depth:</span><br><?php echo $dmrow_detail2['Depth']; ?></div><br>
    </div>		
<div class="clear"></div>
<br><br>
<div class="cutlabel"><span>Color</span>: <?php echo $dmrow_detail2['color']; ?></div>
<div class="boxTable">
    <?php echo $color2_box; ?>
    <div class="clear"></div>
</div><br>
<div>Near-colorless. Color may be noticeable when 
compared to diamonds of better grades, but offers 
excellent value.</div>
</div>
<div class="sutab_col3 col-sm-4">
    <div class="dmrow_leftcolum">
        <div><span>Symmetry:</span><br><?php echo getCutValue($dmrow_detail2['Sym']); ?></div><br>
        <div><span>Polish:</span><br><?php echo getCutValue($dmrow_detail2['Polish']); ?></div><br>
        <div><span>Flouresence:</span><br><?php echo $dmrow_detail2['Flour']; ?></div><br>
    </div>
<div class="clear"></div>
<br><br>
<div class="cutlabel"><span>Clarity</span>: <?php echo $dmrow_detail2['clarity']; ?></div>
<div class="boxTable">
<?php echo $clarity2_box; ?>
    <!--<div class="boxTable_cols">FL</div>
    <div class="boxTable_cols">IF</div>
    <div class="boxTable_cols">WSI</div>
    <div class="boxTable_cols">VVS2</div>
    <div class="boxTable_cols">VS1</div>
    <div class="boxTable_cols">VS2</div>
    <div class="boxTable_cols">S11</div>
    <div id="lastcut_box" class="boxTable_cols extrabg">S12</div>-->
    <div class="clear"></div>
</div><br>
<div>Very slightly included 1. Difficult to see inclusions
under 10x magnification. Typically can not see
inclusions with the naked eye. Slightly more
inclusions than VS1.</div>
</div>

<div class="clear"></div><br><br>
</div>
</div>
<div id="similarDiamod" style="display:none">
 <div class="diamond_tbdetail">
    <table class="diamondListTable">
        <thead>
            <tr>
                <th scope="col">Shape</th>
                <th scope="col">Carat</th>
                <th scope="col">Color</th>
                <th scope="col">Clarity</th>
                <th scope="col">Ratio</th>
                <th scope="col">Cut</th>
                <th scope="col">Cert</th>
                <th scope="col">Polish</th>
                <th scope="col">Sym</th>
                <th scope="col">Flour</th>
                <th scope="col">Price</th>
                <th scope="col">Details</th>
            </tr>
        </thead>
            <tbody>
                <?php echo $simlars_diamondpair; ?>
            </tbody>
    </table>

    </div>
</div>
<div id="diamondPolicies" style="display:none">
    <div class="diamond_tbdetail">
        <?php echo policiesTabs(); ?>
    </div>
</div>
<div class="clear"></div><br><br>
<div class="showpiece_row row-fluid">
    <div class="showpiec_leftcl col-sm-6">
        <div class="showpc_lflabel col-sm-8">EXQUISITE<br>
                <span>CRAFTSMANSHIP</span><br>
                Each piece is handcrafted to order <br>with
                the highest quality and beauty.<br>
                
                <a href="#">LEARN MORE</a></div>
        <div class="showpc_rglabel col-sm-4"><img src="<?php echo config_item('base_url');?>img/page_img/viewshape_ring.jpg" alt="Learn More" /></div>
        
        <div class="clear"></div>
    </div>
    
    <div class="showpiec_leftcl showpiec_rgcl col-sm-6 pull-right">
        <div class="row-fluid">
        	<div class="showpc_lflabel col-sm-8">JEWELRY WITH<br>
                <span><?php echo get_site_title(); ?></span><br>
                Your finest in custom diamonds. and replace that image of woman with box to pendant image i gave you.<br>
                </div>
        	<div class="showpc_rglabel col-sm-4"><img src="<?php echo config_item('base_url');?>img/page_img/box_shapebg.jpg" alt="Learn More" /></div>
         </div>
        
        <div class="clear"></div>
    </div>
</div>
<div class="clear"></div><br>
<div class="showpiece_row row-fluid">
    <div class="showpiec_sbcl col-sm-3">
        OUR<br>
        <span><span>COMMITMENT</span><br>
        TO YOU</span><br>
        Free Shipping Both Way<br>
        30 Day Returns<br>
        Manufacturing Warranty<br>
    </div>
    <div class="showpiec_sbcl col-sm-3">
        HELPFUL<br>
        <span><span>GUIDANCE</span></span><br><br>
        
        Diamond Guide<br>
        Our Ethical Practices<br>
        Find your Ring Size<br>
    </div>
    <div class="showpiec_leftcl showpiec_rgcl col-sm-6 pull-right">
    <br><br>
        <div class="row-fluid">
        	<div class="showpiec_rgsbcl col-sm-7">
            NEED<br>
            <span>ASSISTANCE?</span><br>
            
            We're here for you. Our<br>
            specialists are available to<br>
            assist you in finding the <br>
            perfect ring.<br>
        </div>
        	<div class="showpiece_rgsbcl col-sm-7">
            <div class="contact_column">
               <!-- <div class="liveChat">Live Chat</div>-->
                <div class="contactNo"><?php echo get_site_title('contact_info'); ?></div>
                <div class="emailUs"><a href="mailto:<?php echo SITE_EMAIL; ?>">Email Us</a></div>
            </div>
        </div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>
 </div>
        <div class="clear"></div>
<!--End #Content-->
<div class="p_body js__p_body js__fadeout"></div>
<!-- second popup block -->
<div class="popup js__another_popup js__slide_top"> <a href="#" class="p_close js__p_close" title="As an Expert"> <span></span><span></span> </a>
<form name="askExpertForm" id="askExpertForm" method="post" action="">
    <div class="p_content">
<div class="popupHeading">Ask an Expert&nbsp;<span class="expertVdMessage"></span></div>
<div class="formArea">
    <div class="fieldBlock">
    <div class="fLabel">Name</div>
    <div class="columnSection">
    <input type="text" name="exprt_fname" id="exprt_fname" /><br />
    <span>First Name</span>
    </div>
    <div class="columnSection">
    <input type="text" name="exprt_lname" id="exprt_lname" /><br />
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
    <input type="button" name="btn_exsubmit" class="btnStyle" onclick="askExperForm()" value="Submit" />
    </div>
</div>
</div>
</form>
</div>
<!-- popup blocks end! -->

</body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.mins.js"></script>
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
	////// call popup scirpt
	$(".js__p_start, .js__p_another_start").simplePopup();
});
</script>
<script type="text/javascript">
window.onload = function() {
var radios = document.getElementsByName('ctweight');
};
</script>
<script type="text/javascript">stLight.options({publisher: "7a6efe38-c4d4-4f64-a105-5247ba606425", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
</html>
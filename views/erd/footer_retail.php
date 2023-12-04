
<div class="clear"></div>
<div class="container main_wraper">
<!-- start footer -->
  <div class="footer_section"> 
  <br>
    <br>
  <div class="bottom_footer row-fluid">
      <div class="footer_cols col-sm-3">
        <h4>Shop <?php echo get_site_title(); ?></h4>
        <a href="<?php echo SITE_URL; ?>site/page/ritani-difference">The <?php echo get_site_title(); ?> Difference</a> 
        <a href="<?php echo SITE_URL; ?>site/page/free-in-store">Free In-Store Preview</a> 
        <a href="<?php echo SITE_URL; ?>site/page/lifetime-warranty">Lifetime Warranty</a> 
        <a href="<?php echo SITE_URL; ?>site/page/free-shipping">Free Shipping</a> 
        <a href="<?php echo SITE_URL; ?>site/page/free-returns">Free Returns</a> 
        <a href="<?php echo SITE_URL; ?>site/page/price-mathching">Diamond Price Matching</a> 
        <a href="<?php echo SITE_URL; ?>site/page/order-status">Order Status</a> 
       </div>
      <div class="footer_cols col-sm-3">
        <h4>Education</h4>
        <a href="<?php echo SITE_URL; ?>site/page/learn-4cs-of-diamonds">Learn the 4Cs of Diamonds</a> 
        <a href="<?php echo SITE_URL; ?>site/page/diamond-cuts">Diamond Cuts</a> 
        <a href="<?php echo SITE_URL; ?>site/page/engagement-ring-styles">Engagement Ring Styles</a> 
        <a href="<?php echo SITE_URL; ?>site/page/engagement-ring-cuts">Engagement Ring Cuts</a> 
        <a href="<?php echo SITE_URL; ?>site/page/engagement-ring-settings">Engagement Ring Settings</a> 
        </div>
      <div class="footer_cols col-sm-3">
        <h4>Company Info</h4>
        <a href="<?php echo SITE_URL; ?>site/page/about-ritani">About <?php echo get_site_title(); ?></a> 
        <a href="<?php echo SITE_URL; ?>site/page/international-shipping">International Shipping</a> 
        <a href="<?php echo SITE_URL; ?>site/page/in-the-news">In the News</a> 
        <a href="<?php echo SITE_URL; ?>site/page/contactus">Contact Us</a> 
        <a href="<?php echo SITE_URL; ?>site/page/site-blog">Blog</a> 
        </div>
      <div class="footer_cols col-sm-3">
        <h4>Featured In</h4>
        <a href="#"><img src="<?php echo SITE_WHURL; ?>american_view_gem.jpg" alt="American" /></a> 
        <a href="#"><img src="<?php echo SITE_WHURL; ?>gia_icon_wh.jpg" alt="GIA" /></a> 
        <a href="#"><img src="<?php echo SITE_WHURL; ?>jcart_tower.jpg" alt="JCART" /></a> 
        </div>
      <div class="clear"></div>
      <br>
      <br>
    </div>
  <div class="clear"></div>
  <br>
  <div class="footer_icons">
    <div class="footer_content">
      <div class="socialIcons col-sm-4"> CONNECT: &nbsp;<a href="#"><img src="<?php echo SITE_WHURL; ?>fb_wh.jpg" alt="FB" /></a> 
      <a href="#"><img src="<?php echo SITE_WHURL; ?>tw_wh.jpg" alt="Twitter" /></a> 
      <a href="#"><img src="<?php echo SITE_WHURL; ?>pint_wh.jpg" alt="Pintrest" /></a> 
      <a href="#"><img src="<?php echo SITE_WHURL; ?>gp_wh.jpg" alt="Google Plus" /></a> 
      <a href="#"><img src="<?php echo SITE_WHURL; ?>view_wh.jpg" alt="View" /></a>
        </div>
        <div class="col-sm-4 socialIcons">
        	<form method="post" action="#" class="signup_formbk">
          <span>
          <input type="email" required name="txt_subsemail" id="subscribe_email" class="signup_field" />
          <a class="initialism biolist_open btn_signup" href="#biolist">Sign Up</a>
          </span>
        </form>
        </div>
        <div class="col-sm-4 socialIcons">
        	<span class="sc_block"><img src="<?php echo SITE_WHURL; ?>likes_wh.jpg" alt="likes_wh" /></span>
        </div> 
        <div class="clear"></div>
    </div>
  </div>
  <br>
  <div class="base_footer"> 
  <a href="#">Financing</a> 
  <a href="#">Sitemap</a> 
  <a href="#">Terms & Conditions</a> 
  <a href="#">Privacy Policy</a> 
  <a href="#">Sweeps takes</a> <span>© 1999 - 2015 <?php echo get_site_title(); ?> All Rights Reserved </span><br>
    On <?php echo get_site_title(); ?>: <a href="#">Engagement Rings</a> 
    <a href="#">Loose Diamonds</a> 
    <a href="#">Men's Wedding Bands</a> 
    <a href="#">Women's Wedding Rings</a> 
    <a href="#">Diamond Earrings</a> 
    <a href="#">Diamond Bracelets</a> <br>
    Free In-Store Preview: <a href="#">Atlanta</a> 
    <a href="#">Charlotte </a> 
    <a href="#">Chicago</a> 
    <a href="#">Dallas</a> 
    <a href="#">Jacksonville</a> 
    <a href="#">New York</a> 
    <a href="#">San Francisco</a> 
    <a href="#">Washington, D.C.</a> 
    <a href="#">See all cities</a> 
    </div>
  <br>
  </div>
  <!-- end footer -->

<?php 
	$view_sbpopup = '';
	$show_iframe = '';
	if( check_diamond_page() ) {
		$view_sbpopup .= '<div id="biolist" class="well">
		  <form name="subscribeForm" id="subscribeForm" method="post" action="">
          <div class="p_content">
            <div class="popupHeading">Subscribe Me!&nbsp;<span class="viewErorMsage"></span></div>
            <div class="formArea">
              <div class="fieldBlock">
                <div class="fLabel">Name</div>
                <div class="columnSection">
                  <input type="text" name="subsc_fname" id="subsc_fname" />
                  <br />
                  <span>First Name</span> </div>
                <div class="columnSection">
                  <input type="text" name="subsc_lname" id="subsc_lname" />
                  <br />
                  <span>Last Name</span> </div>
                <div class="clear"></div>
              </div>
              <div class="fieldBlock">
                <div class="fLabel">Email</div>
                <div>
                  <input type="text" name="subsc_email" id="subsc_email" class="fullTextField" />
                </div>
              </div>
              <div class="fieldBlock">
                <div class="fLabel">Phone No.</div>
                <div>
                  <input type="text" name="subsc_pno" id="subsc_pno" class="" />
                </div>
              </div>
              <div class="fieldBlock">
                <div class="fLabel">City</div>
                <div>
                  <input type="text" name="subsc_city" id="subsc_city" class="fullTextField" />
                </div>
              </div>
              <div class="fieldBlock">
                <div class="fLabel">State</div>
                <div>
                  <input type="text" name="subsc_state" id="subsc_state" class="fullTextField" />
                </div>
              </div>
              <div class="fieldBlock">
                <div class="fLabel">Country</div>
                <div>
                  <input type="text" name="subsc_country" id="subsc_country" class="fullTextField" />
                </div>
              </div>
              <div class="fieldBlock">
				<input type="button" name="btn_prefsubmit" value="Close" class="biolist_close btn btn-default accountBtn">
				<input type="button" name="btn_prefsubmit" value="Submit" onclick="manageEmailSubs()" class="accountBtn">
              </div>
            </div>
          </div>
        </form>
		</div>';
		//echo $view_sbpopup;
		
		//// show iframe 
		$show_iframe .= '<div id="fade" class="well"><iframe src="http://www.chicmetropolitan.com/interview/jay-yadegar-of-yadegar-diamonds/" width="800" height="650"></iframe></div>';
		$popuJs = "<script>
					$(document).ready(function () {
					
						$('#fade').popup({
						  transition: 'all 0.3s',
						  scrolllock: true
						});
					
					});
						$(document).ready(function () {
						
							$('#biolist').popup({
							transition: 'all 0.3s',
							scrolllock: true
							});
						
						});
					</script>";
		//echo $show_iframe;
		//echo $popuJs;
	}
?>
<!-- Footer End here -->
</div>
<!--wrapper end here-->
<script src="<?php echo SITE_URL; ?>js/bootstrap.js"></script>
<script src="<?php echo SITE_URL; ?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo SITE_URL; ?>js/jquery.smartmenus.js"></script>
<script type="text/javascript" src="<?php echo SITE_URL; ?>js/jquery.smartmenus.bootstrap.js"></script>

<script type="text/javascript">
	var menu=new menu.dd("menu");
	menu.init("menu","menuhover");
</script>
</body>
<script type="text/javascript">var switchTo5x=true;</script>
<!--<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>-->
<script type="text/javascript">stLight.options({publisher: "6d816b93-3e96-4acf-bbc0-a211c6b2a1bd", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
<script type="text/javascript">
    // ON BLUR , ON FOCUS	
    function myFocus(element) 
    {
    if (element.value == element.defaultValue) {
    element.value = '';
    }
    }
    function myBlur(element) 
    {
    if (element.value == '') {
    element.value = element.defaultValue;
    }
    
    }
    
    </script>
</html>
<script type="text/javascript">
function submitform()
{
	document.getElementById('form1').submit();
}
</script>
<article class="container" id="main-body-a"> 
  <!--<section id="sub"> </section>-->
  <section id="main" class="engagement">
    <div id="containt">
      <div class="content">
        <div class="col-sm-2">
          <?php
			echo accordian_left_menu();
		   ?>
          <div class="clear"></div>
         </div>
        <div class="col-sm-10"> 
          <!-- <div class="ads01"><a href="#"><img src="<?php echo config_item('base_url') ?>images/ads1.png" alt=""/></a></div> -->
          <div class="bread-crumb">
            <ul>
              <li><a href="<?php echo config_item('base_url') ?>">Home</a></li>
              <li><a href="#">Engagement Rings</a></li>
              <li><a href="#">Custom Engagement Rings</a></li>
            </ul>
          </div>
          <br />
          
          <?php echo $page_contents; ?>
          <br />
          
          <div class="clear"></div>
          <br />
          <!--<div class="bordr-line">&nbsp;</div>-->
         
        </div>
      </div>
    </div>
  </section>
  <?php echo $sign_upform; ?>
</article>
<!--End #Content-->

</body><script type="text/javascript">
window.onload = function() {
var radios = document.getElementsByName('ctweight');
};
</script>
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
<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "7a6efe38-c4d4-4f64-a105-5247ba606425", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
</html>
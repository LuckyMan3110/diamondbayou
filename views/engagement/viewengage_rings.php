<script type="text/javascript">
function submitform()
{
	document.getElementById('form1').submit();
}
</script>
<div class="container main_wraper"><br>
      <div class="row-fluid">
        <div class="col-sm-3">
            <div class="leftMenueBoxOuter">
          <div class="content_leftmenu">
        <?php echo content_page_left_menu(); ?>
      </div>
      <div class="clear"></div>
         </div>
        </div>
        <div class="rightCl col-sm-9"> 
          <!-- <div class="ads01"><a href="#"><img src="<?php echo config_item('base_url') ?>images/ads1.png" alt=""/></a></div> -->
            <div class="bread-crumb brbg">
            <div class="breakcrum_bk">
                <ul>
                    <li><a href="<?php echo config_item('base_url') ?>">Home</a></li>
                    <li><a href="#">Custom Engagement Rings</a></li>
                </ul>
            </div>
            <div class="clear"></div>
          </div>
          
          <?php echo $page_contents; ?>          
          <div class="clear"></div>
          <!--<div class="bordr-line">&nbsp;</div>-->
         
        </div>
      </div>
    <br>
    <?php echo $sign_upform; ?>
    </div>

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
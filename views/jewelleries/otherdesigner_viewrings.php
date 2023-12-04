<script type="text/javascript">
function submitform()
{
	document.getElementById('form1').submit();
}
</script>
<article class="container_12" id="main-body-a"> 
  <!--<section id="sub"> </section>-->
  <section id="main" class="engagement">
    <div id="containt">
      
      <div class="content">
        <div class="engagement-left">
          <?php
				echo accordian_left_menu($engage_styles);
			?>
          <div class="clear"></div>
          
        </div>
        <div class="engagement-right"> 
         <div class="bread-crumb">
            <ul>
              <li><a href="<?php echo config_item('base_url') ?>">Home</a></li>
              <li><a href="#">Engagement Rings</a></li>
              <li><a href="<?php echo config_item('base_url') ?>jewelleries/engagementQuality/">Classic</a></li>
            </ul>
          </div>
          <br />
          <?php
		  	$dbminprice = ($this->session->userdata('dbminprice')!=null)?($this->session->userdata('dbminprice')):0;
		  	$dbmaxprice = ($this->session->userdata('dbmaxprice')!=null)?($this->session->userdata('dbmaxprice')):2130000;
			?>
          <div class="seting-box">
            <div class="box-row">
              <div class="signat-bk">
                <input type="checkbox" id="signat_seting" name="signat_seting" onclick="rdPage('<?php echo config_item('base_url') ?>jewelleries/engagementQuality/Engagement_Rings/sidestone/18/');" value="Y" />
                &nbsp;&nbsp; <span class="sgicon">Yadegar Signature Setting</span> </div>
              <div class="signat-bk1">
                <input type="checkbox" id="signat_seting" name="signat_seting" value="Y" />
                &nbsp;&nbsp; <span class="sgicon1">Yadegar Select Setting</span> </div>
              <div class="signat-bk" align="center">
                <input type="checkbox" id="signat_seting" name="signat_seting" onclick="rdPage('<?php echo config_item('base_url') ?>jewelleries/viewotherdesigner');" value="Y" />
                &nbsp;&nbsp; <span class="sgicon2">Other Designer</span> </div>
            </div>
            <div class="clear"></div>
            <br />
            <div class="box-row">
              <div class="signat-bk"> Price : <a href="#">Low To High</a>&nbsp;&nbsp;<a href="#">High To Low</a> </div>
              <div class="signat-bk3">
                <table width="200">
                  <tr>
                    <td align="left">
                      <div class="minpr"><input type="text" value="<?php echo $dbminprice; ?>" id="pricerange1" name="pricerange1" class="priceRang" onchange="modifyresult('searchminprice',this.value)"></div>
                      <div class="maxpr"><input type="text" value="<?php echo $dbmaxprice; ?>" id="pricerange2" name="pricerange2" class="priceRang1" onchange="modifyresult('searchmaxprice',this.value)"></div>
                      </td>
                   
                  </tr>
                  <tr>
                  <td colspan="2"><div id='pricerange' class='ui-slider-2'>
                  <div class='ui-slider-handle'></div>
                  <div class='ui-slider-handle' style="left: 170px;"></div>
                </div>
                </td>
                  </tr>
                </table>
              </div>
              <div class="signat-bk2" align="center">
                <select name="cmb_cates" id="cmb_categories" onChange="rdLink('cmb_categories')" class="ddbox-st">
                  <option value="#">Categories</option>
                  <?php
							/*$view_cate = '';
							if(count($sub_ex)>0){
								foreach ($sub_ex['result'] as $ff){ 
								$view_cate .= '<option value="'.config_item('base_url').'jewelleries/engagementQuality/'.$ff['id'].'">'.$ff['catname'].'</option>';
									if(isset($ff['sub_categories']['result']) && count($ff['sub_categories']['result'])>0) {
										foreach($ff['sub_categories']['result'] as $sub){
										$view_cate .= '<option value="'.config_item('base_url').'jewelleries/engagementQuality/'.$sub['id'].'">'.$sub['catname'].'</option>';
										} 
									} 
								}
							} else { 
								foreach($main_cat['result'] as $cate) { 
								$view_cate .= '<option value="'.config_item('base_url').'jewelleries/engagementQuality/'.substr(  str_replace(' ','_',trim($cate['catname'])), 0,-1).'">'.$cate['catname'].'</option>';
								$view_cate .= '<option value="'.config_item('base_url').'jewelleries/engagementQuality/'.$cate['id'].'">'.$cate['catname'].'</option>';
									if(isset($cate['sub_categories'])) { 
										foreach($cate['sub_categories']['result'] as $sub){
										$view_cate .= '<option value="'.config_item('base_url').'jewelleries/engagementQuality/'.$sub['id'].'">'.$sub['catname'].'</option>';
										}  
									} 
								}
							}
							echo $view_cate;*/
						?>
                </select>
                &nbsp;&nbsp;
                <select name="cmb_mtype" id="cmb_metaltype" onChange="rdLink('cmb_metaltype')" class="ddbox-st">
                  <option value="#">Metal Type</option>
                  <option value="<?php echo config_item('base_url') ; ?>jewelleries/getstullerfur/Sterling_Silver/Ring">Sterling Silver</option>
                  <option value="<?php echo config_item('base_url') ; ?>jewelleries/getstullerfur/14k_Yellow_Gold/Ring">14k Yellow Gold</option>
                  <option value="<?php echo config_item('base_url') ; ?>jewelleries/getstullerfur/14k_Silver_Two-Tone/Ring">14k Silver Two-Tone</option>
                  <option value="<?php echo config_item('base_url') ; ?>jewelleries/getstullerfur/14k_Rose_Gold/Ring">14k Rose Gold</option>
                  <option value="<?php echo config_item('base_url') ; ?>jewelleries/getstullerfur/14k_White_Gold/Ring">14k White Gold</option>
                  <option value="<?php echo config_item('base_url') ; ?>jewelleries/getstullerfur/14k_Two-tone/Ring">14k Two-tone</option>
                  <option value="<?php echo config_item('base_url') ; ?>jewelleries/getstullerfur/14k-Silver_Two-Tone/Ring">14k Silver Two-Tone</option>
                </select>
              </div>
            </div>
            <div class="clear"></div>
          </div>
          <br />
          <div class="paginat_st"> Page <span><</span>&nbsp;
            <select name="paginat_box" id="paginat_box" onChange="rdLink('paginat_box')" class="ddbox-st1">
              <?php
			$tt_records = ceil($total_records/$perPage);
			$startLimit =  1;
			if($total_records > 0) {	
				for($i=1; $i<=$tt_records; $i++) {
					echo '<option value="'.$page_link.$startLimit.'">'.$i.'</option>';
					$startLimit = $i*$perPage;
				}
			} else {
				echo '<option>1</option>';	
			}
			?>
            </select>
            &nbsp;<span>></span>&nbsp; of <?php echo $tt_records; ?> pages &nbsp;&nbsp;&nbsp;&nbsp;
            View Products:
            <?php
			   
			   if($total_records > 9) {
			   $view_pagelimit = '<a href="'.$page_link.'0/9">9</a>';
			   }
			   if($total_records > 27) {
			   $view_pagelimit .= ' | <a href="'.$page_link.'0/27">27</a>';
			   }
			   if($total_records > 54) {
			   $view_pagelimit .= ' | <a href="'.$page_link.'0/54">54</a>';
			   }
			   if($total_records > 99) {
			   $view_pagelimit .= ' | <a href="'.$page_link.'0/99">99</a>';
			   }
			   
			   echo $view_pagelimit;
			//echo $base_link;
			//echo $this->pagination->create_links();?>
          </div>
          <div class="clear"></div>
          <br />
          <?php echo $viewrings_list; ?>
        </div>
      </div>
    </div>
    <div class="clear"></div>
  </section>
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
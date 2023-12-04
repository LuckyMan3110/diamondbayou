<style>
div.content a{color:#000!important}
.txtsmall{color:#000;font-weight:700}
.search{color:#000;font-weight:700}
.ringbox a{color:#000;font-weight:700}
.rightck_subk{color:#fff}
.breadcrumb_list ul li a{color:#fff}
.rightbox_head,.rightdm_box,.setting_bk h4,.right_chosen table tr td{color:#000!important}
ul.funnel-container{border-right:0}
.norings_found{padding:20px 0 20px 20px;font-size:20px}
[type=radio]:checked, [type=radio]:not(:checked){position:relative;left:0px;}
</style>
<link type="text/css" href="<?php echo SITE_URL; ?>css/steps_bar_section.css" rel="stylesheet" />
<?php
if( !empty($heart_collection) ) {
    $items_metal = check_empty($heart_metal, $row_ring['metal']);
} else {
    $items_metal = setURLValue($item_metaltp, 7);
}
$item_sizes = setURLValue($item_rsize, 8);
$items_sizes = resetRingSize($item_sizes);
?>
<div class="clr"></div>
<div id="main-body-a">
    <?php
      if( $add_option == 'addtoring' ) { ?>
      <br>
      <div id="Filters">
        <div id="Funnel">
            <ul class="funnel-container" data-share-link="">
  <li class="funnel-step">
      <div class="funnel-step-container">
          <span class="funnel-step-content">1<span class="title_1" style="z-index:10"><a id="SettingFunnel" style="text-decoration:none;cursor:pointer" container="#WidePane" href="#"><span style="padding-left:0px !important">CHOOSE A</span><br>SETTING</a></span>
              <span class="edit_1"></span>
              <span class="img_1">
                  <a href="<?php echo $view_link; ?>" id="SettingFunnel_ImageView" beforeprocessfn="JamesAllen.Engagement.DeletePagePosition" container="#WidePane">
                      <img class="steps_img" src="<?php echo $setting_image; ?>"></a>
              </span>
                      <span class="price_1"><span class="">$<?php echo $setting_price; ?></span></span>
                      <span class="change_1"><span style=""><a id="SettingFunnel_View" class="viewchange" href="<?php echo $view_link; ?>" beforeprocessfn="JamesAllen.Engagement.DeletePagePosition" container="#WidePane">View</a> |

        <a id="SettingFunnel_Remove" href="<?php echo SITE_URL; ?>engagement/remove_unique_setting" class="viewchange"container="#WidePane">Remove</a></span></span></span></div>
  </li>
  <li class="funnel-step">
      <div class="funnel-step-container">
          <span class="funnel-step-content">2<span class="title_2" style="z-index:10">
                  <a id="DiamondFunnel" style="text-decoration:none" container="#WidePane" href="#">
                      <span style="padding-left:0px !important">CHOOSE A</span><br>DIAMOND</a></span>
                      <span class="edit_2"></span>
                      <a id="DiamondFunnel_ImageView" href="<?php echo $diamond_view_link; ?>" beforeprocessfn="JamesAllen.Engagement.DeletePagePosition" container="#WidePane">
                          <span class="img_2"><img class="steps_img" src="<?php echo $diamond_shapes; ?>" /></span></a>
                          <span class="price_2">$<?php echo $diamond_price; ?></span>
                          <span class="change_2"><span>
                                  <a id="DiamondFunnel_View" class="viewchange" href="<?php echo $diamond_view_link; ?>" beforeprocessfn="JamesAllen.Engagement.DeletePagePosition" container="#WidePane">View</a> |
            <a id="DiamondFunnel_Remove" href="<?php echo SITE_URL; ?>engagement/remove_diamond_detail" class="viewchange" container="#WidePane">
              Remove
            </a></span></span></span></div></li>
  <li class="funnel-step step-active set_active_img complete_step">
  <div class="funnel-step-container"> <span class="funnel-step-content">3</span><span class="complete-ring completeFunnel"></span>
      <span class="title_3">
          <a id="CompleteFunnel" container="#WidePane" href="#"><span style="padding-left:0px !important">REVIEW</span><br>
    COMPLETE    
    RING <span class="price_3"><span class="">$<?php echo $ring_total_price; ?></span></span></a></span><span class="img_3"></span><span class="price_3"></span> 
  </div>
</li>
</ul>
    </div>
  </div>
      <br>
      <?php } ?>
  <div class="diamond_block">
    <div class="leftdm_box">
      <div class="breadcrumb_list">
        <span></span><a href="<?php echo SITE_URL; ?>">Home</a>
        <span></span><a href="#">Diamonds</a>
        <span></span><a href="<?php echo SITE_URL; ?>engagement/search">Build Your Own Ring</a>
        <span></span><a href="#">Complete a Ring</a>
        <div class="clear"></div>        
        </div>
      <div class="clear"></div>
      <div>
      	<div class="leftbox_content">
        <div class="leftbox_heading">My Workbench</div>
<!--        <div class="tabs_list"> 
        <a href="<?php echo config_item('base_url')?>engagement/engagement_ring_settings/6/addtoring" class="curent_tabg"><span>Choose Your Settings</span></a> 
        <a href="<?php echo config_item('base_url')?>engagement/choose_urdiamond" class="curent_tabg"><span>Choose Your Diamond</span></a> 
        <a href="<?php echo config_item('base_url')?>engagement/complete_youring" class="active_tabg"><span>Complete Your Ring</span></a> </div>-->
        <div class="clear"></div>
        <div class="complete_ringar"> 
        <?php
			if(isset($rings_id) && !empty($rings_id)) {
		?>
        	<div class="cartcontent_box">
        <div class="image_leftbk engagemnt_ring">
        <img src="<?php echo $vring_image; ?>" width="146" alt="">
        </div>
        <div class="rightck_subk">
        <table>
          <tbody><tr>
            <td><img src="<?php echo config_item('base_url')?>img/page_img/dwon-ylar.jpg" alt=""></td>
            <td><?php //echo ucwords($prodct_name); ?></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td align="right">&nbsp;</td>
          </tr>
          <tr>
            <td>Product ID:</td>
            <td><?php echo $odring_id; ?></td>
            <td>Diamond Count</td>
            <td><?php echo $diam_count; ?></td>
            <td align="right">&nbsp;</td>
          </tr>
          <tr>
            <td>Metal Type and Color:</td>
            <td><?php echo set_ring_metal($items_metal); ?></td>
            <td>Shape</td>
            <td><?php echo $rings_shape; ?></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Size:</td>
            <td><?php echo $items_sizes; ?></td>
            <td>Ring Price:</td>
            <td>$<?php echo _nf($main_price,2); ?></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Center Carat</td>
            <td><?php echo $rings_carat; ?></td>
            <td>Diamond Price:</td>
            <td>$<?php echo  _nf($row_diamond['price'],2); ?></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>Total Price:</td>
            <td>$<?php echo  _nf($total_rprice,2); ?></td>
            <td>&nbsp;</td>
          </tr>
        </tbody>
        </table>
		
        </div>
        <div class="clear"></div>
        </div>
        	<br>  
                <div class="basketLink"><a href="#" onclick="addtocart('addtoring','<?php echo $d_id; ?>',false,false,'<?php echo $ring_id; ?>','<?php echo $total_rprice; ?>','<?php echo $items_sizes; ?>','<?php echo $items_metal; ?>','image_url')" class="add_to_setting">Add To Cart</a></div><div class="clear"></div> <br> 
            <?php } else { echo '<br><br><br><br><div class="workbench_empty">Workbench is Empty</div>'; }?>
        	<!--<div>Workbench is Empty</div>-->        
        </div>
        <div class="clear"></div>
      </div>
      </div>
      <div>
        <div id="searchresult"></div>
      </div>
    </div>
    <div class="rightdm_box">
      <div class="rightbox_head">Workbench</div>
      <?php echo $work_bench; ?>
    
    </div>
    <div class="clear"></div>
  </div>
  <?php echo $signup_form; ?>
  <div class="clear"></div>
</div>
</div>

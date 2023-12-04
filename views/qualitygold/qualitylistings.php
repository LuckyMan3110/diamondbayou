<div class="container main_wraper">
    <?php
        echo rings_page_baner('quality_gold', 'Quality Gold Jewelry');
    ?>
<div class="content row-fluid engagement">
    <div class="col-sm-3" id="acordianMenu">
      <?php
            echo accordian_left_menu('styles', $catgory_id);
        ?>
      <div class="clear"></div>           
    </div>
    <div id="uniquRingView" class="col-sm-9">
      <!-- <div class="ads01"><a href="#"><img src="<?php echo config_item('base_url') ?>images/ads1.png" alt=""/></a></div> -->
      <div class="bread-crumb">
      <div class="breakcrum_bk col-sm-6">
        <ul>
              <li><a href="<?php echo config_item('base_url') ?>">Home</a></li>
              <li><a href="#">Quality Gold Jewelry</a></li>
              <?php echo $quality_cate; ?>
            </ul>
        </div>
        <div class="paginat_st paginateBlock col-sm-6">
       <div class="setpagination"> <ul><?php echo $paginate_links; ?></ul></div>
       <!-- Page <span><</span>&nbsp;
        <select name="paginat_box" id="paginat_box" onChange="rdLink('paginat_box')" class="ddbox-st1">
          <?php echo $paginate;	?>
        </select>
        &nbsp;<span>></span>&nbsp; of <?php echo $ttpages; ?> pages &nbsp;&nbsp;&nbsp;&nbsp;
        View Products:-->
      </div>
      <div class="clear"></div>
      </div>
      
      <br />
      <div class="setpagination anotherPaginate"><ul><?php echo $paginate_links; //echo $pagination_links; ?></ul></div>
      <div class="clear"></div>
      <br />
      <!-- view unique sub categories -->
      
      <!--<div class="bordr-line">&nbsp;</div>-->
     <div class="uniqueRingsView">
     <?php
            $r=1;
            //$results_rings = setfile_response(config_item('base_url').'webserviceapi/getRingsViaCategory/'.$catgory_id);
            //$results_rings = getUrlResponse(config_item('base_url').'webservice_apis/index.php?type=ringsview&cateid='.$catgory_id);
            
            $hoverContent = '';
            $sitesTitle = get_site_title();
            $trialUserLogo = get_trial_user_logo();
            $notallowed_id = array(59,67,69);
            
            if(count($results_rings)>0){
                foreach($results_rings as $rows_rings)
                {
                    $formid = 'form'.$r;
                    $buynow = 'buy'.$r;
                    echo "<div class='col-sm-4'><form id='".$formid."' name='".$formid."' method='post' action=''>";
                    
                    $ringdetail_link = config_item('base_url').'qualitystuller/qualityringsdetail/'.$rows_rings['qg_id'].'/?quality='.$cat_id;
                    $viewRingImg = $rows_rings['ImageLink_100'];
                    $netRingPrice = $rows_rings['Price'];
                    $ringPriceView = $netRingPrice;
                    $getRingPrice = ( $ringPriceView > 0 ? $ringPriceView : 0 );
                    
                    $ringDescription = $sitesTitle.' stunning '.$rows_rings['Description'].' Metal '.$rows_rings['Metal_Desc'];
                        
                    $ringDetaiLink = $ringdetail_link;
                    $buildRing = config_item('base_url').'engagement/search';
                    $wishList = config_item('base_url').'account/account_wishlist/'.$rows_rings['ring_id'];
                    
                    $hoverContent = "<div class='popupdetailBox'>
                        <div class='indicatearow leftindicate'></div>
                        <div class='viewringDetail detailBoxLeftSteing'>
                        <div class='tooltipTitle'>".$rows_rings['Description']."</div>
                        <div class='asterikView'><img src='".config_item('base_url')."img/pages/title_stars.jpg' alt='Asterik'></div>
                        <div>".$ringDescription."</div><br><div></div><br>
                        <div class='button_block'>";
                    $hoverContent .=  "<div class='orangebtn_bg'><a href='#' id='".$buynow."' onclick='addCartFormSubmit($r, 1)'>Buy Now</a></div>";
                    $hoverContent .= "<div class='orangebtn_bg otherbgView'><a href='#' onclick='addCartFormSubmit($r, 2)'>Build a Ring</a></div>";
                    $hoverContent .= "<div class='orangebtn_bg'><a href='".$ringDetaiLink."'>View</a></div>";
                    $hoverContent .= "<div class='orangebtn_bg otherbgView'><a href='".$wishList."'>Add to Wish List</a></div>";
                        
                        $hoverContent .= "<div class='clear'></div>
                        </div>
                         <div class='clear'></div>
                        </div>
                         <div class='clear'></div>
                        </div>";
                 ?>
      <div class="engagement-product">
      <?php 
            echo "
                <input type='hidden' name='txt_rstyle' id='txt_rstyle' value='".$rint_style."' />
                <input type='hidden' name='3ez_price' value='".intval(number_format($getRingPrice,0,'.',''))."' />
                <input type='hidden' name='5ez_price' value='".intval(number_format($getRingPrice,0,'.',''))."' />
                <input type='hidden' name='main_price' value='".intval(number_format($getRingPrice,0,'.',''))."' />
                <input type='hidden' name='vender' value='unique' />
                <input type='hidden' name='url' value='".$viewRingImg."' />
                <input type='hidden' name='prodname' value='".$rows_rings['Description']."' />
                <input type='hidden' name='diamnd_count' value='' />
                <input type='hidden' name='ring_shape' value='' />
                <input type='hidden' name='ring_carat' value='".$rows_rings['Weight']."' />
                <input type='hidden' name='prid' value='".$rows_rings['id']."' />
                <input type='hidden' name='txt_ringtype' value='generic_ring'>
                <input type='hidden' name='unique_pagelink' value='".$ringdetail_link."'>
                <input type='hidden' name='buynowring' id='buynowring' value='jewelleries/addtoshoppingcart/'>
                <input type='hidden' name='buildaring' id='buildaring' value='engagement/complete_youring/false/".$rows_rings['Item']."/addtoring'>
                <input type='hidden' name='price' value='".intval(number_format($getRingPrice,0,'.','')).",normal' />";
      ?>
      <span class="setcolr">&ndash;</span>
        <div class="image-engagement">
        <div class="setringsbg_bk"><?php echo $trialUserLogo; ?></div>
        <a href="<?php echo $ringdetail_link ?>">&nbsp;<img src="<?php echo $viewRingImg;?>" alt="<?php echo $rows_rings['Description'];?>" width="155" hight="144"></a>
        <meta class="desc" content="<?php echo $hoverContent; ?>">
        </div>
        <div class="dw-arrow"><img src="<?php echo config_item('base_url') ?>images/down-ar.png" align="Down Arrow" /></div>
        <div class="price-product ringprice-section">
          <p class="ring-engagement"><a href="<?php echo $ringdetail_link ?>"><?php echo $rows_rings['Description'];?></a></p>
          <div>
          <?php
            if($getRingPrice > 0) {
                echo 'Price: $'.number_format($getRingPrice,0);
            } else {
                echo 'call 415 626.5035 for prices';
            }
          ?>
          </div>
          </div>
      </div>
      <?php 
      echo '</form></div>';
      
      if($r%3 == 0) {
          //echo '<div class="bordr-line">&nbsp;</div><div class="clear">&nbsp;</div>';
      }
      $r++; } } else {
                echo '<h4 class="norecordMesage">No Ring Records Found</h4>';
      }
      ?>
      <div class="clear"></div>
      <div class="setpagination"><ul><?php echo $paginate_links; //$pagination_links; ?></ul></div><br>
      <div id="details-pane" style="display: none;"> 
            <div class="desc"></div> 
      </div>
      </div>
      
    </div>
  </div>
<div class="clear"></div>
</div>
<script>
function addCartFormSubmit(id, nm) 
    {
        var fieldname = ( nm == 1 ? 'buynowring' : 'buildaring' );
        var urlpath = document.getElementById(fieldname).value;
        
        var pageurl = base_url+urlpath;
        var formid = 'form'+id;
        
        document.getElementById(formid).action = pageurl;
        document.getElementById(formid).submit();
    }
</script>
<!--End #Content-->
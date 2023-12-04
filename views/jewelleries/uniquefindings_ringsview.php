<div class="content engagement row-fluid">
    <?php
        echo rings_page_baner('diamond_stud_heads', 'Dimond Stud Heads');
    ?>
        <div class="col-sm-3" id="acordianMenu">
          <?php
				echo accordian_left_menu('styles', $catgory_id);
			?>
          <div class="clear"></div>           
        </div>
        <div id="uniquRingView" class="col-sm-9"> 
          <!-- <div class="ads01"><a href="#"><img src="<?php echo config_item('base_url') ?>images/ads1.png" alt=""/></a></div> -->
          <div class="bread-crumb">
          <div class="breakcrum_bk">
            <ul>
                  <li><a href="<?php echo config_item('base_url') ?>">Home</a></li>
                  <li><a href="#">Diamond Stud Heads</a></li>
                </ul>
            </div>
            <!--<div class="paginat_st paginateBlock"> Page <span><</span>&nbsp;
            <select name="paginat_box" id="paginat_box" onChange="rdLink('paginat_box')" class="ddbox-st1">
              <?php echo $paginate;	?>
            </select>
            &nbsp;<span>></span>&nbsp; of <?php echo $fdtt_pages; ?> pages &nbsp;&nbsp;&nbsp;&nbsp;
            View Products:
            <?php
			   
			   if($total_records > 9) {
			   $view_pagelimit = '<a href="'.$base_link.'?off_set=9">9</a>';
			   }
			   if($total_records > 27) {
			   $view_pagelimit .= ' | <a href="'.$base_link.'?off_set=27">27</a>';
			   }
			   if($total_records > 54) {
			   $view_pagelimit .= ' | <a href="'.$base_link.'?off_set=54">54</a>';
			   }
			   if($total_records > 99) {
			   $view_pagelimit .= ' | <a href="'.$base_link.'?off_set=99">99</a>';
			   }
			   
			  // echo $view_pagelimit;
			//echo $base_link;
			//echo $this->pagination->create_links();?>
          </div>-->
          <div class="clear"></div>
          </div>
          
          <br />
          <!--<div class="setpagination"><ul><?php echo $pagination_links; ?></ul></div>-->
          
          <div class="clear"></div>
          <br />
          <!-- view unique sub categories -->
          
          <!--<div class="bordr-line">&nbsp;</div>-->
         <?php
						$r=1;
						$sitesTitle = get_site_title();
						foreach($finding_shpapes as $rgshapes) {
						$result_rings = $this->findingsmodel->getFindingsRingList($rgshapes);
						$findingsresult = $result_rings['result'];
						//print_ar($findingsresult);
						?>
                        <div class="style_headings"><?php echo $rgshapes; ?></div>
                        <?php
						$hoverContent = '';
						if(count($findingsresult)>0){
							foreach($findingsresult as $rows_rings)
							{
								$formid = 'form'.$r;
								$buynow = 'buy'.$r;
								echo "<div class='col-sm-4'><form id='".$formid."' name='".$formid."' method='post' action=''>";
								
								$ringdetail_link = config_item('base_url').'site/uniquefindings_detail/'.$rows_rings['catid'].'/'.$rows_rings['findings_id'];
								$viewRingImg = RINGS_IMAGE.'crone/imgs/'.$rows_rings['ImagePath'];
								$netRingPrice = $rows_rings['priceRetail'];
								$ringPriceView = $netRingPrice; //file_get_contents(config_item('base_url').'webservice_apis/index.php?type=ringprice&cateid='.trim($rows_rings->name));
								$getRingPrice = ( $ringPriceView > 0 ? $ringPriceView : 0 );
								
								$ringDescription = $sitesTitle.' stunning Style Earring Finding can be yours for $'.$netRingPrice.'. This Earring Casing does not include the diamond. Diamonds are sold seperately.';
									
								$ringDetaiLink = $ringdetail_link;
								$buildRing = config_item('base_url').'engagement/search';
								$buyRing = config_item('base_url').'engagement/search';
								
								$hoverContent = "<div class='popupdetailBox'>
									<div class='indicatearow leftindicate'></div>
									<div class='viewringDetail detailBoxLeftSteing'>
									<div class='tooltipTitle'>".$rows_rings['name']."</div>
									<div class='asterikView'><img src='".config_item('base_url')."img/pages/title_stars.jpg' alt='Asterik'></div>
									<div>".$ringDescription."</div><br><div>Call: ".$this->config->item('site_owner_number')." for prices</div><br>
									<div class='button_block'>";
								$hoverContent .=  "<div class='orangebtn_bg'><a href='#' id='".$buynow."' onclick='addCartFormSubmit($r, 1)'>Buy Now</a></div>";
								$hoverContent .= "<div class='orangebtn_bg'><a href='#' onclick='addCartFormSubmit($r, 2)'>Build a Stud</a></div>
									<div class='orangebtn_bg otherbgView'><a href='".$ringDetaiLink."'>View</a></div>";
								//$hoverContent .= "<div class='orangebtn_bg otherbgView'><a href='#' class='js__p_start'>Ask a Friend</a></div>";
								//$hoverContent .= "<div class='orangebtn_bg otherbgView'><a href='#'>Show Similar</a></div>";
									//$hoverContent .= "<div class='orangebtn_bg sharebgView'><a href='#'></a></div>";
									$hoverContent .= "<div class='orangebtn_bg otherbgView'><a href='".$wishList."'>Add to Wish List</a></div>";
									//$hoverContent .= "<div class='orangebtn_bg otherbgView'><a href='#'>View Reviews</a></div>";
									
									$hoverContent .= "<div class='clear'></div>
									</div>
									 <div class='clear'></div>
									</div>
									 <div class='clear'></div>
									</div>";
									
							echo "
							    	<input type='hidden' name='txt_rstyle' id='txt_rstyle' value='".$rint_style."' />
									<input type='hidden' name='3ez_price' value='".intval(number_format($getRingPrice,0,'.',''))."' />
									<input type='hidden' name='5ez_price' value='".intval(number_format($getRingPrice,0,'.',''))."' />
									<input type='hidden' name='main_price' value='".intval(number_format($getRingPrice,0,'.',''))."' />
									<input type='hidden' name='vender' value='unique' />
									<input type='hidden' name='url' value='".$viewRingImg."' />
									<input type='hidden' name='prodname' value='".$rows_rings['name']."' />
									<input type='hidden' name='diamnd_count' value='".$rows_rings['diamond_count']."' />
									<input type='hidden' name='ring_shape' value='".$rows_rings['shpae']."' />
									<input type='hidden' name='ring_carat' value='".$rows_rings['carat']."' />
									<input type='hidden' name='prid' value='".$rows_rings['style_group']."' />
									<input type='hidden' name='txt_ringtype' value='generic_ring'>
									<input type='hidden' name='unique_pagelink' value='".$ringdetail_link."'>
									<input type='hidden' name='buynowring' id='buynowring' value='jewelleries/addtoshoppingcart/'>
									<input type='hidden' name='buildaring' id='buildaring' value='engagement/complete_youring/false/".$rows_rings['ring_id']."/addtoring'>
									<input type='hidden' name='price' value='".intval(number_format($getRingPrice,0,'.','')).",normal' />";
							 ?>
          <div class="engagement-product"><span class="setcolr">&ndash;</span>
            <div class="image-engagement"><a href="<?php echo $ringdetail_link ?>">&nbsp;<img src="<?php echo $viewRingImg;?>" alt="<?php echo $rows_rings['name'];?>" width="155" hight="144"></a>
            <meta class="desc" content="<?php echo $hoverContent; ?>">
            </div>
            <div class="dw-arrow"><img src="<?php echo config_item('base_url') ?>images/down-ar.png" align="Down Arrow" /></div>
            <div class="price-product ringprice-section">
              <? //	var_dump($uniqueprice); ?>
              <p class="ring-engagement"><a href="<?php echo $ringdetail_link ?>"><?php echo $rows_rings['name'];?></a></p>
              <div>Price: $<?php echo $getRingPrice ?></div>
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
          <?php } ?>
          <!--<div class="setpagination"><ul><?php echo $pagination_links; ?></ul></div>--><br>
          <div id="details-pane" style="display: none;"> 
  				<div class="desc"></div> 
		  </div>
          
        </div>
      </div>
      <div class="clear"></div>
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
	 $(function() {
		 $(".js__p_start, .js__p_another_start").simplePopup();
	 });
</script>
<!--End #Content-->
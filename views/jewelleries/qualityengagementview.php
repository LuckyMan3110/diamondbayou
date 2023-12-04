<?php
	///// list down unique products
	if(isset($uniqupr) && $uniqupr == 'uniquprod') {
	?>

<br />
<br />
<br />
<div class="engagement-paging">
  <ul>
    <?php
            $tt_rec = count($records['result']);
            $pp = 18;
            $tt_pp = round($tt_rec/$pp);
            
            $gp = 1;
            $page_list = '';
            for($i=1; $i <= $tt_pp; $i++) {
            
            $page_list .= '<li><a href="#javascript;" onClick="viewRingRs('."'".$gp."'".')">'.$i.'</a></li>';
            $gp = $i * $pp;
            	if($i > 15) break;
            }
           ?>
  </ul>
</div>
<?php
	if(!empty($prod_cate)) {
	?>
<ul class="uc_category">
  <?php
		foreach ($prod_cate['result'] as $ff){ ?>
  <li><a href="#" onclick="viewProdList('<?php echo $ff['id']?>', '<?php echo $ff['pid']?>')"><?php echo $ff['catname']?></a>
    <?php if(isset($ff['sub_categories']['result']) && count($ff['sub_categories']['result'])>0) { ?>
    <ul>
      <?php 
					foreach($ff['sub_categories']['result'] as $sub){ 
				?>
      <li><a href="#" onclick="viewProdList('<?php echo $sub['id']?>', '<?php echo $ff['pid']?>')"><?php echo $sub['catname']; ?></a></li>
      <?php } ?>
    </ul>
    <?php } ?>
  </li>
  <?php } ?>
</ul>
<?php
	}
	echo '<br /><br />';
	
	if(count($records['result'])>0){
		for($i=0;$i<count($records['result']);$i++)
		{
			$ringImage = 'http://www.uniquesettings.com'.$records['result'][$i]['image'];
			$uniqueprice = $this->jewelleriesmodel->getPricesUnique($records['result'][$i]['style_group']);
			
			$cate_id = $records['result'][$i]['catid'];
			$ring_name = $records['result'][$i]['name'];
			$rg_name = str_replace(' ', '', $ring_name);
			
			if($cate_id == 213 || $cate_id == 7) {
			$pid = $cate_id;
			} else {
			$pid = $this->jewelleriesmodel->getParentId($cate_id);
			}
			
			//$pc_id = (!empty($pid) ? $pid : $cate_id);
			if($rg_name == 'BridalRing' && !empty($bridal)) {
			$st_name = 'Bridal Ring Collection';
			} else if($rg_name == 'EngagementRings' && !empty($hallo)) {
			$st_name = 'Halo Collection';
			} else if($rg_name == 'EngagementRings' && !empty($sideStone)) {
			$st_name = 'Sidestone Collection';
			} else {
			$st_name = $this->jewelleriesmodel->get_style_name($pid);
			}
			
			$styl_name = (!empty($st_name) ? $st_name : 'Style Collection');
		
		if(getimagesize($ringImage)) {
		 ?>
<div class="engagements-product">
  <div class="stylName"><?php echo $styl_name; ?></div>
  <div class="image-engagement"><a href="<?php echo config_item('base_url') ?>site/enagagementqualitydetail/<?php echo $records['result'][$i]['id']; ?>/<?php echo $uniqueprice['price']; ?>"><img src="http://www.uniquesettings.com<?php echo $records['result'][$i]['image'];?>" alt="<?php echo $records['result'][$i]['name'];?>" width="155" hight="144"></a></div>
  <div class="price-product">
    <?//	var_dump($uniqueprice); ?>
    <p class="ring-engagement"><?php echo $records['result'][$i]['name'];?></p>
    <?php if(isset($uniqueprice['price'])){
                    $cuprice=$org_price=$uniqueprice['price'];
                    $cuprice= $cuprice*2.5;
                    $cuprice1=$cuprice;
                    $cuprice15=$cuprice*15/100;
                    $cuprice=$cuprice-$cuprice15;
                    if($cuprice>=$filterprice){
                ?>
    <span>Price : $<?php echo number_format($cuprice,0) ?></span><br>
    <?php if($records['result'][$i]['ezstatus']) { ?>
    3EZ : $
    <?php  $ez3 = $org_price+(($org_price*$ez3value)/100); $fez3=$ez3; $ez3=$cuprice1-$ez3; echo number_format($ez3/2,0); ?>
    <br>
    5EZ : $
    <?php  $ez5=$org_price+(($ez5value*$org_price)/100); $fez5=$ez5; $ez5=$cuprice1-$ez5; echo number_format($ez5/4,0); ?>
    <br>
    <?php } ?>
    <?php } /*else { ?>
                <span>Call 414-810-2050 For Prices</span><br>
                
                <!--<span>Price : $ 0</span><br>-->
                <?php } */?>
    <?php }else{ echo "Call: ".$this->config->item('site_owner_number')." for Prices"; } ?>
    These are semimount only <br>
    diamonds are sold seperately </div>
</div>
<?php 
		} //// image if
	} }
	else {
		echo 'No Product Found!';	
	}
	exit;
	}
	?>
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
      <?php /*?><div class="share"> <span class="text-search"><?php echo $cataname ?></span> 
        <!--<div>
                        <span class='st_sharethis' displayText='Share'></span>
                        <span class='st_pinterest'></span>
                        <span class='st_facebook'></span>
                        <span class='st_twitter'></span>
                        <span class='st_linkedin'></span> 
                        <span class='st_email'></span>
                    </div> --> 
      </div><?php */?>
      <div class="content">
        <div class="engagement-left">
          <?php
				echo accordian_left_menu($engage_styles);
			?>
          <div class="clear"></div>
          <!--<div class="leftmenu-list">
        	<ul>
            <li><a href="#">Diamonds</a></li>
            <li><a href="#">Engagement Rings</a></li>
            <li><a href="#">Wedding and <br />Anniversary Brands</a></li>
            <li><a href="#">Diamond Earnings</a></li>
            <li><a href="#">Diamond Pendants</a></li>
            <li><a href="#">Diamond Bracelets</a></li>
            <li><a href="#">Pearl Earnings</a></li>
            <li><a href="#">Fashion Rings</a></li>
            <li><a href="#">Gold Jewlery</a></li>
            <li><a href="#">Colored Stone <br />Jewlery</a></li>
            <li><a href="#">Designers</a></li>
            </ul>
        </div>--> 
          <!--<p class="tt-engagement">REFINE SEARCH</p>-->
          <form id="form1" name="form1" method="post" action="<?php echo current_url()?>">
            <!--<ul class="carat">
              <li><strong>Carat Weight</strong></li>
              <li>
                <input type="radio" name="ctweight" onclick="submitform()" value="0.24"/>
                0 - 0.24</li>
              <li>
                <input type="radio" name="ctweight" onclick="submitform()" value="0.49"/>
                0.25 - 0.49</li>
              <li>
                <input type="radio" name="ctweight" onclick="submitform()" value="0.99"/>
                0.50 - 0.99</li>
              <li>
                <input type="radio" name="ctweight" onclick="submitform()" value="1.49"/>
                1.00 - 1.49</li>
              <li>
                <input type="radio" name="ctweight" onclick="submitform()" value="1.99"/>
                1.50 - 1.99</li>
              <li>
                <input type="radio" name="ctweight" onclick="submitform()" value="2.00"/>
                2.00+</li>
            </ul>--> 
            <!--<ul class="carat">
              <li><strong>Price Range</strong></li>
              <li>
                <input type="radio" name="price" onclick="submitform()" value="999"/>
                $0 - $999</li>
              <li>
                <input type="radio" name="price" onclick="submitform()" value="1999"/>
                $1,000 - $1,999</li>
              <li>
                <input type="radio" name="price" onclick="submitform()" value="2999"/>
                $2,000 - $2,999</li>
              <li>
                <input type="radio" name="price" onclick="submitform()" value="3999"/>
                $3,000 - $4,999</li>
              <li>
                <input type="radio" name="price" onclick="submitform()" value="4999"/>
                $5,000 +</li>
            </ul>-->
            <style>
							ul.category li{
							clear:both;
							}
                        </style>
            <?php /*?><br /><br />
            <ul class="category">
              <li class="style-title">CATEGORIES</li>
              <?php
							if(count($sub_ex)>0){
							foreach ($sub_ex['result'] as $ff){ ?>
              <li><a href="<?php echo config_item('base_url') ?>jewelleries/engagementQuality/<?php echo $ff['id']?>"><?php echo $ff['catname']?></a><br>
                <?php if(isset($ff['sub_categories']['result']) && count($ff['sub_categories']['result'])>0) { ?>
                <ul>
                  <?php foreach($ff['sub_categories']['result'] as $sub){ ?>
                  <li><a href="<?php echo config_item('base_url') ?>jewelleries/engagementQuality/<?php echo $sub['id']?>"><?php echo $sub['catname']; ?></a></li>
                  <?php } ?>
                </ul>
                <?php } ?>
              </li>
              <?php 
							}?>
              <?php } else{ foreach($main_cat['result'] as $cate) { ?>
              <!--<li><a href="<?php echo config_item('base_url') ?>jewelleries/engagementQuality/<?php echo substr(  str_replace(' ','_',trim($cate['catname'])), 0,-1)?>"><?php echo $cate['catname']?></a></li>-->
              <li><a href="<?php echo config_item('base_url') ?>jewelleries/engagementQuality/<?php echo $cate['id']?>"><?php echo $cate['catname']?></a></li>
              <?php if(isset($cate['sub_categories'])) { ?>
              <ul>
                <?php foreach($cate['sub_categories']['result'] as $sub){ ?>
                <li><a href="<?php echo config_item('base_url') ?>jewelleries/engagementQuality/<?php echo $sub['id']?>"><?php echo $sub['catname']; ?></a></li>
                <?php } ?>
              </ul>
              <?php } ?>
              <?php }
								} ?>
            </ul><?php */?>
            <!--<ul class="style">
              <li class="style-title">Style</li>
              <?php //echo $stylelink ?>
            </ul>--> 
            
            <!--<ul class="carat">
                        	<li><strong>Clearance</strong></li><?php echo $clearancelink ?>
                        </ul>--> 
            <!--
                        <ul class="style">
                        	<li class="style-title">Engagement Rings</li>
                            <li><a href="<?php echo config_item('base_url') ?>jewelleries/engagementQuality/Engagement_Rings/">Engagement Rings</a></li>
                            <li><a href="<?php echo config_item('base_url') ?>jewelleries/engagementQuality/Three_Stone_Rings/">Three Stone Rings</a></li>
                            <li><a href="<?php echo config_item('base_url') ?>jewelleries/engagementQuality/Wedding_Bands/">Wedding Bands</a></li>
                            <li><a href="<?php echo config_item('base_url') ?>jewelleries/engagementQuality/Bridal_Ring/">Bridal Ring</a></li>
                            <li><a href="<?php echo config_item('base_url') ?>jewelleries/engagementQuality/Color_Stone_Ring/">Color Stone Rings</a></li>
                            <li><a href="<?php echo config_item('base_url') ?>jewelleries/engagementQuality/Fancy_Ring/">Fancy Ring</a></li> 
                            <li><a href="<?php echo config_item('base_url') ?>jewelleries/engagementQuality/Pendant/">Pendant</a></li> 
                        </ul>--> 
            
            <!--<hr />
            <ul class="style">
              <li class="style-title"><strong>Metal</strong></li>
              <?php //echo $metallink ?>
            </ul>-->
          </form>
          <!--<hr />--> 
          
          <!--<ul class="category">
                        	<li class="style-title">CATEGORIES</li>
                            <li><a href="<?php //echo config_item('base_url') ?>jewelleries/getuniquecat">Engagement</a></li>
								<?php /*<ul>
								<?php foreach($sub_categories['result'] as $sub_cate){?>
									<li><a href="<?php echo config_item('base_url') ?>jewelleries/engagementQuality/<?php echo str_replace(' ', '_',$sub_cate['catname'] ) ?>"><?php echo $sub_cate['catname'] ?></a></li>
								<?php } ?>
								</ul> */ ?>
                            <li><a href="<?php echo config_item('base_url') ?>jewelleries/getjewleries/Ring">Rings</a></li>
                            <li><a href="<?php echo config_item('base_url') ?>jewelleries/getjewleries/Necklace">Necklaes</a></li>
                            <li><a href="<?php echo config_item('base_url') ?>jewelleries/getjewleries/Bracelet">Bracelets</a></li>
                            <li><a href="<?php echo config_item('base_url') ?>jewelleries/getjewleries/Earring">Earrings</a></li>
                            <li><a href="<?php echo config_item('base_url') ?>jewelleries/getjewleries/Mens">Mens</a></li> 
                            <li><a href="<?php echo config_item('base_url') ?>watches">Watches</a></li> 
                            <li><a href="<?php echo config_item('base_url') ?>jewelleries/getmystuller">Clearance</a></li> 
                        </ul>
                        --> 
          <!--<ul class="style">
            <li class="style-title">Designers</li>
            <li><a href="<?php echo config_item('base_url') ?>engagement/search">Build Your Own Ring</a></li>
            <li><a href="#">Build  Your Own Earrings</a></li>
            <li><a href="<?php echo config_item('base_url') ?>jewelry/search">Build Three Stone Ring</a></li>
            <li><a href="<?php echo config_item('base_url') ?>engagement/search">Build  Your Own Pendant</a></li>
            <li><a href="#">Loose Diamond Search</a></li>
          </ul>--> 
          <!--
                        <div class="bn-ads01">
                        	 <img src="<?php echo config_item('base_url') ?>images/sp01.png" alt="banner"/>
                        </div>
                        
                        <div class="bn-ads02">
                        	 <img src="<?php echo config_item('base_url') ?>images/sp02.png" alt="banner"/>
                        </div>
                        
                        <div class="bn-ads02">
                        	 <img src="<?php echo config_item('base_url') ?>images/sp03.png" alt="banner"/>
                        </div> --> 
        </div>
        <div class="engagement-right"> 
          <!-- <div class="ads01"><a href="#"><img src="<?php echo config_item('base_url') ?>images/ads1.png" alt=""/></a></div> -->
          <div class="bread-crumb">
            <ul>
              <li><a href="<?php echo config_item('base_url') ?>">Home</a></li>
              <li><a href="<?php echo config_item('base_url') ?>jewelleries/engagementQuality/171/classic">Engagement Rings</a></li>
              <li><?php echo str_replace('_',' ',ucwords($engage_styles)); ?></li>
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
              <!--<div class="signat-bk"> Price : <a href="<?php echo $base_sblink; ?>asc">Low To High</a>&nbsp;&nbsp;<a href="<?php echo $base_sblink; ?>desc">High To Low</a> </div>
              <div class="signat-bk3">
                <table width="200">
                  <tr>
                    <td align="left">
                      <div class="minpr"><input type="text" value="<?php echo $dbminprice; ?>" readonly="readonly" id="pricerange1" name="pricerange1" class="priceRang" onchange="modifyresult('searchminprice',this.value)"></div>
                      <div class="maxpr"><input type="text" value="<?php echo $dbmaxprice; ?>" readonly="readonly" id="pricerange2" name="pricerange2" class="priceRang1" onchange="modifyresult('searchmaxprice',this.value)"></div>
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
              </div>-->
              <div class="signat-bk2" align="center">
                <select name="cmb_cates" id="cmb_categories" onChange="rdLink('cmb_categories')" class="ddbox-st">
                  <option value="#">Select Shape</option>
                  <?php
							$view_cate = $this->session->userdata('retrive_catelist');
							echo $view_cate;
						?>
                </select>
                &nbsp;&nbsp;
                <!--<select name="cmb_mtype" id="cmb_metaltype" onChange="rdLink('cmb_metaltype')" class="ddbox-st">
                  <?php	echo $metalOptionRing; ?>
                </select>-->
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
					echo '<option value="'.$base_link.$startLimit.'">'.$i.'</option>';
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
			   
			   echo $view_pagelimit;
			//echo $base_link;
			//echo $this->pagination->create_links();?>
          </div>
          <div class="clear"></div>
          <br />
          <!-- view unique sub categories -->
          
          <!--<div class="bordr-line">&nbsp;</div>-->
         <?php
						//print_r($metal_list);exit;
						//echo $records;exit;
						//$records=$records1;
						$r=1;
						if(count($records['result'])>0){
							for($i=0;$i<count($records['result']);$i++)
							{
								$uniqueprice   = $this->jewelleriesmodel->getPricesUniqueFromScrap($records['result'][$i]['style_group']); //$records['result'][$i]['ring_price'];
								$unique_price  = ( !empty($uniqueprice['price']) ? $uniqueprice['price'] : 0 );
								$cuprice=$org_price=$unique_price;
								$cuprice= $cuprice*2.5;
								$cuprice1=$cuprice;
								$cuprice15=$cuprice*15/100;
								$cuprice=$cuprice-$cuprice15;
								$netRingPrice = _nf($cuprice,2);
								
								$ringDescription = 'Yadegardiamonds.com stunning Style diamond semi mount ring can be yours for $'.$netRingPrice.'. This ring does not include the diamond. Diamonds are sold seperately.';
									
								$ringDetaiLink = config_item('base_url').'site/enagagementqualitydetail/'.$records['result'][$i]['id'].'/'.$unique_price.'/'.$engage_styles;
								$buildRing = config_item('base_url').'engagement/search';
								$buyRing = config_item('base_url').'engagement/search';
								
								$hoverContent = "<div class='popupdetailBox'>
									<div class='indicatearow leftindicate'></div>
									<div class='viewringDetail detailBoxLeftSteing'>
									<div class='tooltipTitle'>".$records['result'][$i]['name']."</div>
									<div class='asterikView'><img src='".config_item('base_url')."img/pages/title_stars.jpg' alt='Asterik'></div>
									<div>".$ringDescription."</div><br><div>Call: ".$this->config->item('site_owner_number')." for prices</div><br>
									<div class='button_block'>
									<div class='orangebtn_bg'><a href='".$buyRing."'>Buy Now</a></div>
									<div class='orangebtn_bg'><a href='".$buildRing."'>Build a Ring</a></div>
									<div class='orangebtn_bg otherbgView'><a href='".$ringDetaiLink."'>View</a></div>
									<div class='orangebtn_bg otherbgView'><a href='#'>Ask a Friend</a></div>
									<div class='orangebtn_bg otherbgView'><a href='#'>Show Similar</a></div>
									<div class='orangebtn_bg sharebgView'><a href='#'></a></div>
									<div class='orangebtn_bg otherbgView'><a href='#'>Add to Wish List</a></div>
									<div class='orangebtn_bg otherbgView'><a href='#'>View Reviews</a></div>
									
									<div class='clear'></div>
									</div>
									 <div class='clear'></div>
									</div>
									 <div class='clear'></div>
									</div>";
								
							 ?>
          <div class="engagement-product"><span class="setcolr">&ndash;</span>
            <div class="image-engagement"><a href="<?php echo $ringDetaiLink ?>">&nbsp;<img src="http://www.uniquesettings.com<?php echo $records['result'][$i]['image'];?>" alt="<?php echo $records['result'][$i]['name'];?>" width="155" hight="144"></a>
            <meta class="desc" content="<?php echo $hoverContent; ?>">
            </div>
            <div class="dw-arrow"><img src="<?php echo config_item('base_url') ?>images/down-ar.png" align="Down Arrow" /></div>
            <div class="price-product ringprice-section">
              <?//	var_dump($uniqueprice); ?>
              <p class="ring-engagement"><?php echo $records['result'][$i]['name'];?></p>
              <?php if(isset($unique_price) && $unique_price > 0){
									
									if($cuprice>=$filterprice){
								?>
              <span>Price : $<?php echo number_format($cuprice,0) ?></span><br>
              <?php if($records['result'][$i]['ezstatus']) { ?>
              3EZ : $
              <?php  $ez3 = $org_price+(($org_price*$ez3value)/100); $fez3=$ez3; $ez3=$cuprice1-$ez3; echo number_format($ez3/2,0); ?>
              <br>
              5EZ : $
              <?php  $ez5=$org_price+(($ez5value*$org_price)/100); $fez5=$ez5; $ez5=$cuprice1-$ez5; echo number_format($ez5/4,0); ?>
              <br>
              <?php } ?>
              <?php } /*else { ?>
                                <span>Call 414-810-2050 For Prices</span><br>
                                
                                <!--<span>Price : $ 0</span><br>-->
								<?php } */?>
              <?php }else{ echo "Call: ".$this->config->item('site_owner_number')." for Prices"; } ?>
              These are semimount only <br>
              diamonds are sold seperately </div>
          </div>
          <?php 
		  if($r%3 == 0) {
			  //echo '<div class="bordr-line">&nbsp;</div><div class="clear">&nbsp;</div>';
		  }
		  $r++; } } else {
			  		echo '<h4 class="norecordMesage">No Ring Records Found</h4>';
		  }
		  ?>
          <div id="details-pane" style="display: none;"> 
  				<div class="desc"></div> 
		  </div>
          
        </div>
      </div>
    </div>
    <div class="clear"></div>
  </section>
</article>
<!--End #Content-->
</body>
<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "7a6efe38-c4d4-4f64-a105-5247ba606425", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
</html>
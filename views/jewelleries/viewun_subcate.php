<div class="engagement-paging">
  <ul>
    <?php 
		echo $page_list;
		//echo $records; exit;
	//echo $this->pagination->create_links(); ?>
  </ul>
</div>
<?php
function is_url_exist($url){
    $ch = curl_init($url);    
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if($code == 200){
       $status = true;
    }else{
      $status = false;
    }
    curl_close($ch);
   return $status;
}
	if(!empty($prod_cate)) {
	
	?>
		<ul class="uc_category">
	<?php
		foreach ($prod_cate['result'] as $ff){ ?>
            
            <li><a href="#" onclick="viewProdList('<?php echo $ff['id']?>', '<?php echo $ff['pid']?>')"><?php echo $ff['catname']; ?></a></li>
            
    <?php } ?>
    </ul>
    <br /><br />
    <?php
	}
	
	if(count($records['result']) > 0) {
	for($i=0;$i<count($records['result']);$i++)
		{
		$uniqueprice = $this->jewelleriesmodel->getPricesUnique($records['result'][$i]['style_group']);
		$imagName = $records['result'][$i]['image'];
		$image_fileck = 'http://www.uniquesettings.com'.$imagName;
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
		
		if(is_url_exist($image_fileck)) {
				
	?>
	<div class="engagements-product">
    <div class="stylName"><?php echo $styl_name; ?></div>
  <div class="image-engagement"><a href="<?php echo config_item('base_url') ?>site/enagagementqualitydetail/<?php echo $records['result'][$i]['id']; ?>/<?php echo $uniqueprice['price']; ?>"><img src="http://www.uniquesettings.com<?php echo $records['result'][$i]['image'];?>" alt="<?php echo $ring_name;?>" width="155" hight="144"></a></div>
  <div class="price-product">
    <?//	var_dump($uniqueprice); ?>
    <p class="ring-engagement"><?php echo $ring_name;?></p>
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
		} // image check
		}
	} else {
		echo 'No Record Found';	
	}
	exit;
	?>

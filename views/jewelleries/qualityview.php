<?
	function array_column($input = null, $columnKey = null, $indexKey = null)
	{
	// Using func_get_args() in order to check for proper number of
	// parameters and trigger errors exactly as the built-in array_column()
	// does in PHP 5.5.
	$argc = func_num_args();
	$params = func_get_args();
	
	if ($argc < 2) {
	trigger_error("array_column() expects at least 2 parameters, {$argc} given", E_USER_WARNING);
	return null;
	}
	
	if (!is_array($params[0])) {
	trigger_error('array_column() expects parameter 1 to be array, ' . gettype($params[0]) . ' given', E_USER_WARNING);
	return null;
	}
	
	if (!is_int($params[1])
	&& !is_float($params[1])
	&& !is_string($params[1])
	&& $params[1] !== null
	&& !(is_object($params[1]) && method_exists($params[1], '__toString'))
	) {
	trigger_error('array_column(): The column key should be either a string or an integer', E_USER_WARNING);
	return false;
	}
	
	if (isset($params[2])
	&& !is_int($params[2])
	&& !is_float($params[2])
	&& !is_string($params[2])
	&& !(is_object($params[2]) && method_exists($params[2], '__toString'))
	) {
	trigger_error('array_column(): The index key should be either a string or an integer', E_USER_WARNING);
	return false;
	}
	
	$paramsInput = $params[0];
	$paramsColumnKey = ($params[1] !== null) ? (string) $params[1] : null;
	
	$paramsIndexKey = null;
	if (isset($params[2])) {
	if (is_float($params[2]) || is_int($params[2])) {
	$paramsIndexKey = (int) $params[2];
	} else {
	$paramsIndexKey = (string) $params[2];
	}
	}
	
	$resultArray = array();
	
	foreach ($paramsInput as $row) {
	
	$key = $value = null;
	$keySet = $valueSet = false;
	
	if ($paramsIndexKey !== null && array_key_exists($paramsIndexKey, $row)) {
	$keySet = true;
	$key = (string) $row[$paramsIndexKey];
	}
	
	if ($paramsColumnKey === null) {
	$valueSet = true;
	$value = $row;
	} elseif (is_array($row) && array_key_exists($paramsColumnKey, $row)) {
	$valueSet = true;
	$value = $row[$paramsColumnKey];
	}
	
	if ($valueSet) {
	if ($keySet) {
	$resultArray[$key] = $value;
	} else {
	$resultArray[] = $value;
	}
	}
	
	}
	
	return $resultArray;
	}
	
	$ar_c = array_column($max_price['result'], 'MSRP');
	// echo "<pre>";
	//var_dump(array_map('intval',$ar_c));
	$ar_f = max(array_map('intval',$ar_c));
	
	$ar_c_c = array_column($max_carat['result'], 'CT_Weight');
	//echo "<pre>";
	// var_dump(array_map('floatval',$ar_c_c));
	$ar_f_c = max(array_map('floatval',$ar_c_c));
	
	?>
<script type="text/javascript">
	function submitform()
	{
	document.getElementById('form1').submit();
	}
	</script>

<article class="container_12" id="main-body-a">
  <section id="main" class="engagement">
    <div id="containt">
      <div class="content">
        <div class="engagement-left">
          <?php
	echo accordian_left_menu($accord_menu);
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
                <input type="checkbox" id="signat_seting" name="signat_seting" value="Y" />
                &nbsp;&nbsp; <span class="sgicon">Yadegar Signature Setting</span> </div>
              <div class="signat-bk1">
                <input type="checkbox" id="signat_seting" name="signat_seting" value="Y" />
                &nbsp;&nbsp; <span class="sgicon1">Yadegar Select Setting</span> </div>
              <!--<div class="signat-bk" align="center">
                <input type="checkbox" id="signat_seting" name="signat_seting" value="Y" />
                &nbsp;&nbsp; <span class="sgicon2">Other Designer</span> </div>-->
            </div>
            <div class="clear"></div>
            <br />
            <div class="box-row">
              <div class="signat-bk"> Price : <a href="#">Low To High</a>&nbsp;&nbsp;<a href="#">High To Low</a> </div>
              <div class="signat-bk3">
                <table width="200">
                  <tr>
                    <td align="left"><div class="minpr">
                        <input type="text" value="<?php echo $dbminprice; ?>" id="pricerange1" name="pricerange1" class="priceRang" onchange="modifyresult('searchminprice',this.value)">
                      </div>
                      <div class="maxpr">
                        <input type="text" value="<?php echo $dbmaxprice; ?>" id="pricerange2" name="pricerange2" class="priceRang1" onchange="modifyresult('searchmaxprice',this.value)">
                      </div></td>
                  </tr>
                  <tr>
                    <td colspan="2"><div id='pricerange' class='ui-slider-2'>
                        <div class='ui-slider-handle'></div>
                        <div class='ui-slider-handle' style="left: 170px;"></div>
                      </div></td>
                  </tr>
                </table>
              </div>
              <div class="signat-bk2" align="center">
                <select name="cmb_cates" id="cmb_categories" onChange="rdLink('cmb_categories')" class="ddbox-st">
                  <option value="#">Categories</option>
                  <?php
	$view_cate = '';
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
	echo $view_cate;
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
		$selected = ( $startLimit == $page_offset ? 'selected' : '' );
	echo '<option value="'.$base_link.$engage_styles.$startLimit."/?off_set=".$perPage.'" '.$selected.'>'.$i.'</option>';
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
		$page_vlink = $base_link.$page_offset.'/';
		if($total_records > 9) {
		$view_pagelimit = '<a href="'.$page_vlink.'?off_set=9">9</a>';
		}
		if($total_records > 27) {
		$view_pagelimit .= ' | <a href="'.$page_vlink.'?off_set=27">27</a>';
		}
		if($total_records > 54) {
		$view_pagelimit .= ' | <a href="'.$page_vlink.'?off_set=54">54</a>';
		}
		if($total_records > 99) {
		$view_pagelimit .= ' | <a href="'.$page_vlink.'?off_set=99">99</a>';
		}
	
	echo $view_pagelimit;
	//echo $base_link;
	//echo $this->pagination->create_links();?>
          </div>
          <div class="clear"></div>
          <br />
          <?php
	if(count($records['result'])>0){
	for($i=0;$i<count($records['result']);$i++)
	{
	if($records['result'][$i]['ImageLink_100']!=""){
	$src="http://".$records['result'][$i]['ImageLink_500'];
	}
	else{
	$src="http://images3.wikia.nocookie.net/__cb20061129213453/muppet/images/7/7c/Noimage.png";			
	}
	$prodDetaiLink = config_item('base_url').'site/qualitydetail/'.$records['result'][$i]['qg_id'].'/'.$accord_menu.'/'.$main_subcate.'/'.$cataname;
	?>
          <div class="engagement-product">
            <div class="image-engagement"><a href="<?php echo $prodDetaiLink; ?>"><img src="<?php echo $src;?>" alt="<?php echo $records['result'][$i]['Metal_Desc'];?>" width="155" hight="144"></a></div>
           <div class="dw-arrow"><img src="<?php echo config_item('base_url') ?>images/down-ar.png" align="Down Arrow"></div>
            <div class="price-product ringprice-section">
              <p class="ring-engagement"><?php echo $records['result'][$i]['Description'];?>
                <?php //echo $cataname?>
                <?php //echo $records['result'][$i]['qg_id']; ?>
              </p>
              <?php 
	if(isset($records['result'][$i]['MSRP'])) { 
	$cuprice=$org_price=$records['result'][$i]['MSRP'];
	$cuprice= $cuprice*2.5;
	$cuprice1=$cuprice;
	$cuprice15=$cuprice*15/100;
	$cuprice=$cuprice-$cuprice15; 
	if($cuprice>=$filterprice){
	?>
              <span>Price : $<?php echo  number_format($cuprice,0); ?></span><br>
              <?php if($records['result'][$i]['ezstatus']) { ?>
              3EZ : $
              <?php $ez3 = $org_price+(($org_price*$ez3value)/100); $fez3=$ez3; $ez3=$cuprice1-$ez3; echo number_format($ez3/2,0); ?>
              <br>
              5EZ : $
              <?php  $ez5= $org_price+(($ez5value*$org_price)/100); $fez5=$ez5; $ez5=$cuprice1-$ez5; echo number_format($ez5/4,0); ?>
              <br>
              <?php } 
	}
	} ?>
              <!--These are semimount only <br>diamonds are sold seperately-->
              <p class="view"><a href="<?php echo $prodDetaiLink; ?>">View Details</a></p>
            </div>
          </div>
          <?php } }?>
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
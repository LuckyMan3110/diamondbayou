<div class="inner"> 
  <!--\\\\\\\ inner start \\\\\\-->
  <div class="contentpanel">
      <!-- main menu start -->
        <div><?php echo admin_main_menu_list(); //// admin_mainmenu helper ?></div>
        <!-- main menu end -->
    <div>
      <?php 
    function random($length = 8)
    {     
    $chars = '983452458935876451386217';
    
    for ($p = 0; $p < $length; $p++)
    {
    $result .= ($p%2) ? $chars[mt_rand(19, 23)] : $chars[mt_rand(0, 18)];
    }
    
    return $result;
    }
    /*
    $query = mysql_query("select * from `dev_ebaycategories` where parent_id = 0  and category_id IN (1450533015,1450534015)") or die(mysql_error());
    $rootnumofcat = mysql_num_rows($query) or die(mysql_error());
    $i=0;
    $string = "<select name='category' id='category' onchange=\"return getDetail(this.value);\">";
    while($i < $rootnumofcat ){
    $root = mysql_fetch_array($query) or die(mysql_error());
    if($root['category_id'] == $details['category']){
    $flag = ' selected = "selected" ';
    }else{
    $flag = '';
    }
    $string = $string."<option value='".$root['category_id']."'  $flag >".$root['category_name']."</option>";
    $substring = getSubcat($root['category_id'], $details['category']);
    if(!empty($substring)){
    $string = $string.$substring;     
    }
    
    $i=$i+1;
    //   echo $string; exit;  
    //continue;
    }
    $string .= "</select>";
    
    function getSubcat($rootid,$choosedID){ 
    
    $squery = mysql_query("select * from `dev_ebaycategories` where parent_id = '$rootid'  ") or die(mysql_error());
    $subnumofcat = mysql_num_rows($squery);    
    $j=0;
    if($subnumofcat > 0){
    while($j < $subnumofcat ){
    $subcat = mysql_fetch_array($squery) or die(mysql_error());
    if($subcat['category_id'] == $choosedID){
    $flag = ' selected= "selected" ';
    }else{
    $flag = '' ;
    }
    $substring = $substring."<option value='".$subcat['category_id']."'   $flag  >&nbsp;|-".$subcat['category_name']."</option>";
    $childstring = getMoreChilds($subcat['category_id'],$choosedID);
    $substring = $substring.$childstring;
    $j=$j+1;
    }
    }	 
    return trim($substring);
    
    }
    
    function getMoreChilds($rootid,$choosedID){
    $squery = mysql_query("select * from `dev_ebaycategories` where parent_id = '$rootid'  ") or die(mysql_error());
    $subnumofcat = mysql_num_rows($squery);    
    $j=0;
    if($subnumofcat > 0){
    while($j < $subnumofcat ){
    $subcat = mysql_fetch_array($squery) or die(mysql_error());                 
    if($subcat['category_id'] == $choosedID){
    $flag = 'selected  = "selected" ';
    }else{
    $flag   =  '';
    }
    $substring = $substring."<option value='".$subcat['category_id']."'  $flag >&nbsp;&nbsp;&nbsp;|----".$subcat['category_name']."</option>";
    $childstring = getMoreChilds1($subcat['category_id'],$choosedID);
    $substring = $substring.$childstring;
    $j=$j+1;
    }
    }	 
    return trim($substring);
    
    }
    
    function getMoreChilds1($rootid, $choosedID){
    $squery = mysql_query("select * from `dev_ebaycategories` where parent_id = '$rootid'  ") or die(mysql_error());
    $subnumofcat = mysql_num_rows($squery);    
    $j=0;
    if($subnumofcat > 0){
    while($j < $subnumofcat ){
    $subcat = mysql_fetch_array($squery) or die(mysql_error());                 
    if($subcat['category_id'] == $choosedID){
    $flag = 'selected  = "selected" ';
    }else{
    $flag   =  '';
    }
    $substring = $substring."<option value='".$subcat['category_id']."'   $flag >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|----".$subcat['category_name']."</option>";
    
    $j=$j+1;
    }
    }	 
    return trim($substring);
    
    }
    */
    if($action == 'add' || $action == 'edit'){
    $this->load->helper('custom','form');
    if(isset($details)){
    $lot = isset($details['lot']) ? $details['lot'] : '';
    $owner = isset($details['owner']) ? $details['owner'] : '';
    $shape = isset($details['shape']) ? $details['shape'] : '';
    $carat = isset($details['carat']) ? $details['carat'] : '';
    $color = isset($details['color']) ? $details['color'] : '';
    $clarity = isset($details['clarity']) ? $details['clarity'] : '';
    $price = isset($details['price']) ? $details['price'] : '';
    $rapnetPrice = isset($details['Rap']) ? $details['Rap'] : '';
    $cert = isset($details['Cert']) ? $details['Cert'] : '';
    $depth = isset($details['Depth']) ? $details['Depth'] : '';
    $table = isset($details['TablePercent']) ? $details['TablePercent'] : '';
    $girdle = isset($details['Girdle']) ? $details['Girdle'] : '';
    $culet = isset($details['Culet']) ? $details['Culet'] : '';
    $polish = isset($details['Polish']) ? $details['Polish'] : '';
    $sym = isset($details['Sym']) ? $details['Sym'] : '';
    $flour = isset($details['Flour']) ? $details['Flour'] : '';
    //$meas = isset($details['Meas']) ? $details['Meas'] : '';
    
    if(!empty($details['Meas'])){
    list($w,$b,$h) = 	explode("x",$details['Meas']);
    $meas = $w." x ".$b." x ".$h;
    }else{
    $meas = '';   
    }
    $carat = number_format($carat,2);
    $comment = isset($details['Comment']) ? $details['Comment'] : '';
    $stones = isset($details['Stones']) ? $details['Stones'] : '';
    $certnum = isset($details['Cert_n']) ? $details['Cert_n'] : '';
    $stocknum = isset($details['Stock_n']) ? $details['Stock_n'] : '';
    $make = isset($details['Make']) ? $details['Make'] : '';
    $date = isset($details['Date']) ? $details['Date'] : '';
    $city = isset($details['City']) ? $details['City'] : '';
    $state = isset($details['State']) ? $details['State'] : '';
    $country = isset($details['Country']) ? $details['Country'] : '';
    $ratio = isset($details['ratio']) ? $details['ratio'] : '';
    $cut = isset($details['cut']) ? $details['cut'] : '';
    $tbl = isset($details['tbl']) ? $details['tbl'] : '';
    $pricepercert = isset($details['pricepercrt']) ? $details['pricepercrt'] : '';
    $certimage = isset($details['certimage']) ? $details['certimage'] : '';
    $length = isset($details['length']) ? $details['length'] : '';
    $width = isset($details['width']) ? $details['width'] : '';
    $height = isset($details['height']) ? $details['height'] : '';
    $price = round($price * $carat);
    
    }  else  {
    $lot = isset($details['lot']) ? $details['lot'] : '';
    $owner = isset($details['owner']) ? $details['owner'] : '';
    $shape = isset($details['shape']) ? $details['shape'] : '';
    $carat = isset($details['carat']) ? $details['carat'] : '';
    $color = isset($details['color']) ? $details['color'] : '';
    $clarity = isset($details['clarity']) ? $details['clarity'] : '';
    $price = isset($details['price']) ? $details['price'] : '';
    $rapnetPrice = isset($details['Rap']) ? $details['Rap'] : '';
    $cert = isset($details['Cert']) ? $details['Cert'] : '';
    $depth = isset($details['Depth']) ? $details['Depth'] : '';
    $table = isset($details['TablePercent']) ? $details['TablePercent'] : '';
    $girdle = isset($details['Girdle']) ? $details['Girdle'] : '';
    $culet = isset($details['Culet']) ? $details['Culet'] : '';
    $polish = isset($details['Polish']) ? $details['Polish'] : '';
    $sym = isset($details['Sym']) ? $details['Sym'] : '';
    $flour = isset($details['Flour']) ? $details['Flour'] : '';
    $meas = isset($details['Meas']) ? $details['Meas'] : '';
    $comment = isset($details['Comment']) ? $details['Comment'] : '';
    $stones = isset($details['Stones']) ? $details['Stones'] : '';
    $certnum = isset($details['Cert_n']) ? $details['Cert_n'] : '';
    $stocknum = isset($details['Stock_n']) ? $details['Stock_n'] : '';
    $make = isset($details['Make']) ? $details['Make'] : '';
    $date = isset($details['Date']) ? $details['Date'] : '';
    $city = isset($details['City']) ? $details['City'] : '';
    $state = isset($details['State']) ? $details['State'] : '';
    $country = isset($details['Country']) ? $details['Country'] : '';
    $ratio = isset($details['ratio']) ? $details['ratio'] : '';
    $cut = isset($details['cut']) ? $details['cut'] : '';
    $tbl = isset($details['tbl']) ? $details['tbl'] : '';
    $pricepercert = isset($details['pricepercrt']) ? $details['pricepercrt'] : '';
    $certimage = isset($details['certimage']) ? $details['certimage'] : '';
    $length = isset($details['length']) ? $details['length'] : '';
    $width = isset($details['width']) ? $details['width'] : '';
    $height = isset($details['height']) ? $details['height'] : '';
    $title = '';
    }
    $id  = isset($lot) ? $lot : '';
    //$price = round($price * $carat);
    $destFolder =  config_item('base_url')."images/loosepictures/";
    $details['shape'] = trim($details['shape']);
    switch ($details['shape']){
    case 'R':
    $shape = 'round';
    $destFile = $destFolder.$shape.'.jpg';
    break;
    case 'Pr':
    $shape = 'princess';
    $destFile = $destFolder.$shape.'.jpg';
    break;
    case 'R':
    $shape = 'radiant';
    $destFile = $destFolder.$shape.'.jpg';
    break;
    case 'E':
    $shape = 'emerald';
    $destFile = $destFolder.$shape.'.jpg';
    break;
    case 'AS':
    $shape = 'asscher';
    $destFile = $destFolder.$shape.'.jpg';
    break;
    case 'O':
    $shape = 'oval';
    $destFile = $destFolder.$shape.'.jpg';
    break;
    case 'M':
    $shape = 'marquise';
    $destFile = $destFolder.$shape.'.jpg';
    break;
    case 'P':
    $shape = 'pear';
    $destFile = $destFolder.$shape.'.jpg';
    break;
    case 'H':
    $shape = 'heart';
    $destFile = $destFolder.$shape.'.jpg';
    break;
    case 'C':
    $shape = 'cushion';
    $destFile = $destFolder.$shape.'.jpg';
    break;
    case 'B':
    $shape = 'Baguette';
    $destFile = $destFolder.$shape.'.jpg';
    break;
    
    case 'T':
    $shape = 'Trilliant';
    $destFile = $destFolder.'trilliantring.jpg';
    break;
    
    case 'Cushion Modifieds':
    case 'CUSHION MODIFIED':
    $shape = 'Cushion';
    $destFile = $destFolder.'cushionring.jpg';
    break;
    default:
    $shape = $detail['shape'];
    break;
    }
    
    if(trim($cert) == 'GIA'){
    $title = $carat.' CT '.strtoupper($shape).' '.$color. ' '.$clarity.' DIAMOND! '.$cert.'! '.$meas.' MM!';
    $certName = 'GIA';
    }elseif(trim($cert) == 'EGL U') {
    $title  = $carat.' CT '.strtoupper($shape).' '.$color. ' '.$clarity.' DIAMOND! EGL'.' '.$country.'! '.$meas.' MM!' ;
    $certName = 'EGL USA';
    }else{
    $title = $carat.' CT '.strtoupper($shape).' '.$color. ' '.$clarity.' DIAMOND! EGL'.'! '.$meas.' MM!';
    $certName = 'EGL';
    }
    $qry = "SELECT rate FROM ".config_item('table_perfix')."helix_prices WHERE pricefrom <= '$price'  and  priceto > '$price' ORDER BY pricefrom ASC LIMIT 0,1";
    $result = $this->db->query($qry);
    $pret = $result->result_array();	
    $rate = $pret[0]['rate'];
    $our_price = round( $price * $rate)  ;
    $retail_price = round($our_price * 1.65) ;
    
    if(empty($certimage))
    {
    $sql = "SELECT cert_img FROM ". $this->config->item('table_perfix')."cert  WHERE cert_name = '".$details['Cert']."'";
    $query = $this->db->query($sql);
    $result = $query->result_array();
    $certimage =   config_item('base_url').$result[0]['cert_img'];
    }
    $stocknum = $stocknum;
    
    $picsql = "SELECT picture1 FROM ". $this->config->item('table_perfix')."loosepictures  WHERE diamondshape = '".$shape."'";
    $picquery = $this->db->query($picsql);
    $picresult = $picquery->result_array();
    
    ?>
      <style>
    .lebelfield
    {
    color:white;font-weight:bold;
    }
    .inputfield { color:white; }
    
    </style>
      <div class="blue_man">
        <div class="blue_admin_box1">
          <div class="addcountry_box">
            <div class="heading">
              <h1>Add Rapnet LooseDiamonds on eBay</h1>
            </div>
            <!-- Message Part -->
            <div style="width:100%;">
              <? if(isset($success) && !empty($success)){ ?>
              <div style="width:95.5%; margin:5px; padding:10px 10px 10px 10px; background-color:#C8F2BB; font-weight:bold"> <? echo $success;   ?> </div>
              <? } ?>
            </div>
            <div style="clear:both"></div>
            <!-- End -->
            <div class="search_box">
              <form name="rapnetForm" action="<?php echo config_item('base_url');?>admin/loosediamonds/<?php echo $action; echo ($action == 'edit') ? '/' .$id : '';?>" method="post" enctype="multipart/form-data" >
                <table width="80%" border="0" align="center" cellpadding="5" cellspacing="0" class="table_border">
                  <!--Warning Class--> 
                  <!--end of displaying warning class-->
                  
                  <tr>
                    <td width="20%" align="right">Lot</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element"> <?php echo $lot;?>
                        <input type="hidden" name="lot" value="<?php echo $lot;?>" maxlength="15" disabled="true" />
                      </dd></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right">Item Title</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element"> <?php echo $title;?>
                        <input type="hidden" name="title" value="<?php echo $title;?>" maxlength="80" size="120"  disabled="true" />
                      </dd></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right">Shape</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element"> <?php echo $shape;?>
                        <input type="hidden" name="shape" value="<?php echo $shape;?>" maxlength="15" disabled="true" />
                      </dd></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right">Carat</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element"> <?php echo number_format($carat,2);?>
                        <input type="hidden" name="carat" value="<?php echo number_format($carat,2);?>"  id="carat" />
                      </dd></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right">Color</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element"> <?php echo $color;?>
                        <input type="hidden" name="color" value="<?php echo $color;?>"  id="color" />
                      </dd></td>
                  </tr>
                  <? if(!empty($clarity)){ ?>
                  <tr>
                    <td width="20%" align="right">Clarity</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element"> <?php echo $clarity ;?>
                        <input type="hidden" name="clarity" value="<?php echo $clarity ;?>"  id="clarity" />
                      </dd></td>
                  </tr>
                  <? } ?>
                  <tr>
                    <td width="20%" align="right">Price</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element"> $<?php echo number_format($price,2) ;?>
                        <input type="hidden" name="price" value="<?php echo number_format($price,2) ;?>"  id="price" />
                      </dd></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right">Our Price</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element"> $<?php echo number_format($our_price,2) ;?>
                        <input type="hidden" name="price" value="<?php echo number_format($our_price,2) ;?>"  id="price" />
                      </dd></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right">Retail Price</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element"> $<?php echo number_format($retail_price,2) ;?>
                        <input type="hidden" name="retail_price" value="<?php echo number_format($retail_price,2) ;?>"  id="retail_price" />
                      </dd></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right">Certificate</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element"> <?php echo $certName  ;?>
                        <input type="hidden" name="cert" value="<?php echo $cert  ;?>"  id="cert" disabled="true" />
                      </dd></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right">Depth</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element"> <?php echo $depth   ;?>%
                        <input type="hidden" name="depth" value="<?php echo $depth   ;?>"  id="depth" />
                      </dd></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right">Table</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element"> <?php echo $table   ;?>%
                        <input type="hidden" name="table" value="<?php echo $table   ;?>"  id="table" />
                      </dd></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right">Girdle</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element"> <?php echo $girdle   ;?>
                        <input type="hidden" name="girdle" value="<?php echo $girdle   ;?>"  id="girdle" />
                      </dd></td>
                  </tr>
                  <?php if(!empty($culet)){ ?>
                  <tr>
                    <td width="20%" align="right">Culet</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element"> <?php echo $culet   ;?>
                        <input type="hidden" name="culet" value="<?php echo $culet   ;?>"  id="culet" />
                      </dd></td>
                  </tr>
                  <? } ?>
                  <tr>
                    <td width="20%" align="right">Polish</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element"> <?php echo $polish   ;?>
                        <input type="hidden" name="polish" value="<?php echo $polish   ;?>"  id="polish" />
                      </dd></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right">Sym</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element"> <?php echo $sym   ;?>
                        <input type="hidden" name="sym" value="<?php echo $sym   ;?>"  id="sym" />
                      </dd></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right">Flour</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element"> <?php echo $flour   ;?>
                        <input type="hidden" name="flour" value="<?php echo $flour   ;?>"  id="flour" />
                      </dd></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right">Measurement</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element"> <?php echo $meas   ;?>&nbsp;MM
                        <input type="hidden" name="meas" value="<?php echo $meas   ;?>"  id="meas" />
                      </dd></td>
                  </tr>
                  <? if(!empty($comment)){  ?>
                  <tr>
                    <td width="20%" align="right">Comments</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element"> <?php echo $comment ; ?> </dd></td>
                  </tr>
                  <? } ?>
                  <tr>
                    <td width="20%" align="right">Stones</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element"> <?php echo $stones   ;?> Stones
                        <input type="hidden" name="stones" value="<?php echo $stones   ;?>"  id="stones" />
                      </dd></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right">Certificate Number</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element"> <?php echo $certnum   ;?>
                        <input type="hidden" name="certnum" value="<?php echo $certnum   ;?>"  id="certnum" />
                      </dd></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right">Stock Number</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element"> <?php echo $stocknum    ;?>
                        <input type="hidden" name="stocknum" value="<?php echo $stocknum    ;?>"  id="stocknum" />
                      </dd></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right">Length</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element"> <?php echo $length    ;?>
                        <input type="hidden" name="length" value="<?php echo $length    ;?>"  id="length" />
                      </dd></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right">Width</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element"> <?php echo $width    ;?>
                        <input type="hidden" name="width" value="<?php echo $width    ;?>"  id="width" />
                      </dd></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right">Height</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element"> <?php echo $height    ;?>
                        <input type="hidden" name="height" value="<?php echo $height    ;?>"  id="height" />
                      </dd></td>
                  </tr>
                  <? if(!empty($cut)){ ?>
                  <tr>
                    <td width="20%" align="right">Cut</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element"> <?php echo $cut    ;?>&nbsp;Cut!
                        <input type="hidden" name="cut" value="<?php echo $cut    ;?>"  id="cut" />
                      </dd></td>
                  </tr>
                  <? } ?>
                  <tr>
                    <td width="20%" align="right">Certificate Image</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element">
                        <div style="float:left;"><img src="<?php echo $certimage ;?>" style="width:100px;height:100px;" border="0" /></div>
                        <div style="float:left;"><img src="<? echo $destFile; ?>"  style="width:100px;height:100px;"  border="0" /></div>
                      </dd></td>
                  </tr>
                  <tr>
                    <td align="right">&nbsp;</td>
                    <td width="3%" align="left" valign="top"><dt id="edit-label">&nbsp;</dt>
                      <dd id="edit-element">
                        <input type="submit"  name="<?=$action;?>btn" value="Continue to Send"  id="edit"  class="search_but">
                      </dd>
                      &nbsp;</td>
                    <td width="74%" align="left" valign="top"><dt id="back-label">&nbsp;</dt>
                      <dd id="back-element">
                        <button name="back" id="back" type="button" class="search_but" onclick="history.go(-1);">Back</button>
                      </dd></td>
                  </tr>
                </table>
              </form>
            </div>
          </div>
        </div>
        <div class="spacerdiv"><img src="/template/admin/images/spacer.gif" alt="spacer" /></div>
      </div>
      <?php }else{?>
      <div>
        <form name="rapnetstones" method="post" action="<?php echo config_item('base_url')?>admin/searchStones" id="rapnetstones">
          <table id="results" style="display:none; ">
          </table>
        </form>
      </div>
      <?php }?>
    </div>
  </div>
  <!--\\\\\\\ inner end\\\\\\--> 
</div>
<!--\\\\\\\ wrapper end\\\\\\--> 
<!-- Modal -->
<?php echo popupsOtherBlockData(); ?>
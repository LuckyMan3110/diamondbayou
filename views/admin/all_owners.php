<link href="https://yadegardiamonds.com/css/admin_style.css" rel="stylesheet" />
<div class="inner"> 
  <!--\\\\\\\ inner start \\\\\\-->
  <div class="contentpanel">
      <!-- main menu start -->
        <div><?php echo admin_main_menu_list(); //// admin_mainmenu helper ?></div>
        <!-- main menu end -->
    <div>
  <style>
    .comboStyle {
        width: 85px;
    }
    .filtrBox, .filterBox{
        height: 225px;
    }
    .filterBox1 {
        width: 230px;
        height: 225px;
    }
    .labelFields {
        padding-top: 10px;
        padding-left: 10px;
        border: 1px solid #efefef;
        width: 232px;
        height: 225px;
        float: left;
        padding-right: 10px;
    }
    .comboStyle {
        height: 196px !important;
    }
  </style>
  
  <script>
    function view_fitler_page(page_link) {
        window.open(page_link, "_blank", "tollbar=yes,scrollbars=yes,resizeable=yes,top=100,left=100,width=1200,height=600");
        return false;
    }
</script>
<div>
  <?php
    if ($action == 'add' || $action == 'edit') {
        $this->load->helper('custom', 'form');
        if (isset($details)) {
            $owners_id = isset($details['owner_id']) ? $details['owner_id'] : '';
            $company_id = isset($details['company_id']) ? $details['company_id'] : 0;
            $company_name = isset($details['company_name']) ? $details['company_name'] : '';
        } else {
            $owners_id = '';
            $company_id = 0;
            $company_name = '';
        }
        $id = isset($owners_id) ? $owners_id : '';
        ?>
  <div class="blue_man">
    <div class="blue_admin_box1">
      <div class="addcountry_box">
        <div class="heading">
          <h1>Rapnet Companies Manager</h1>
        </div>
        <!-- Message Part -->
        <div style="width:100%;">
          <? if (isset($success) && !empty($success)) { ?>
            <div style="width:95.5%; margin:5px; padding:10px 10px 10px 10px; background-color:#C8F2BB; font-weight:bold"> <? echo $success; ?> </div>
            <? } ?>
        </div>
        <div style="clear:both"></div>
        <!-- End -->
        <div class="search_box">
          <form name="" action="<?php echo config_item('base_url'); ?>admin/owners/<?php echo $action;
                    echo ($action == 'edit') ? '/' . $owners_id : '';
                        ?>" method="post" enctype="multipart/form-data" >
            <table width="80%" border="0" align="center" cellpadding="5" cellspacing="0" class="table table_border">
              <!--Warning Class--> 
              <!--end of displaying warning class-->
              
              <tr>
                <td width="20%" align="right">Company ID</td>
                <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                  <dd id="account_name-element">
                    <input type="text" name="company_id" value="<?php echo $company_id; ?>" size="30"   />
                  </dd></td>
              </tr>
              <tr>
                <td width="20%" align="right">Company name</td>
                <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                  <dd id="account_name-element">
                    <input type="text" name="company_name" value="<?php echo $company_name; ?>"  size="40" />
                  </dd></td>
              </tr>
              <tr>
                <td align="right">&nbsp;</td>
                <td width="3%" align="left" valign="top"><dt id="edit-label">&nbsp;</dt>
                  <dd id="edit-element">
                    <input type="submit" name="<?= $action; ?>btn" id="edit" value="Save" class="btn-primary search_but">
                  </dd>
                  &nbsp;</td>
                <td width="74%" align="left" valign="top"><dt id="back-label">&nbsp;</dt>
                  <dd id="back-element">
                    <button name="back" id="back" type="button" class="search_but btn-primary" onclick="history.go(-1);">Back</button>
                  </dd></td>
              </tr>
            </table>
          </form>
        </div>
      </div>
    </div>
    <div class="spacerdiv"><img src="/template/admin/images/spacer.gif" alt="spacer" /></div>
  </div>
  <?php } else { 
      //print_ar($detailcols);
      
      ?>
  <div>
    <form action="<?php echo config_item('base_url').$submitlink; ?>" method="post" name="search">
      <div style="height:200px;">
	  
        
        
                <div class="filterBox">
                  <div><b>Category</b></div>
                  <select name="diamondscat" class="form-control comboStyle">
                      <?php
                        $cate_list = array(
                            'jewelercart' => 'Jewelercart',
                            'jewelercart_watches' => 'Jewelercart Watches',
                            'White Diamonds' => 'White Diamonds', 
                            'Engagement Rings' => 'Engagement Rings',
                            'Fine Jewelry' => 'Fine Jewelry',
                            'Wedding Bands Mens' => 'Wedding Bands Mens',
                            'Wedding Bands Ladies' => 'Wedding Bands Ladies',
                            'Wedding Bands platinum' => 'Wedding Bands platinum',
                            'Diamond Stud Earrings' => 'Diamond Stud Earrings',
                            'Diamond Hoops' => 'Diamond Hoops',
                            'Clarity Diamonds' => 'Clarity Diamonds', 
                            'Colored Diamonds' => 'Colored Diamonds', 
                            'NHD' => 'Simple Diamond Rings', 
                            'HD' => 'HD Diamond Rings',
                            'HDERING' => 'HD Ebay Rings',
                            'ERPHD' => 'ERP HD Jewelry',
                            'EBSFJ' => 'Ebay Stuller Fashion Jewelry',
                            );
                        $view_dmcate = '';
                        foreach($cate_list as $optKeys => $catelist) {
                           $view_dmcate .= '<option value="'.$optKeys.'" '.setSelected($optKeys, $detailcols['diamondscat']).'>'.$catelist.'</option>'; 
                        }
                        echo $view_dmcate;
                      ?>
                  </select>
                </div>
        	  
                <div class="filterBox">
                  <div><b>Shape</b></div>
                  <select name="shape[]" class="form-control comboStyle" multiple="multiple" >
                      <?php
                      //print_ar($detailcols);
                      
                        $shape_list = array('B' => 'Round', 'PR' => 'Princess', 'E' => 'Emerald', 'AS' => 'Asscher', 'CU' => 'Cushion', 'M' => 'Marquise', 'O' => 'Oval', 'R' => 'Radiant', 'P' => 'Pear', 'H' => 'Heart');
                        $view_dmshape = '';
                        foreach($shape_list as $shapekey => $dmshapes) {
                           $view_dmshape .= '<option value="'.$shapekey.'" '.arOptSelected($shapekey, $detailcols['shape']).'>'.$dmshapes.'</option>'; 
                        }
                        echo $view_dmshape;
                      ?>
                  </select>
                </div>
        		
                <div class="filterBox">
                  <div><b>Cut</b></div>
                  <select multiple="multiple" name="cut[]" class="form-control comboStyle">
                      <?php
                        $cutlist = array('G' => 'Good', 'VG' => 'Very Good', 'I' => 'Ideal', 'EX' => 'Excellent', 'F' => 'Fair', 'P' => 'Poor', '' => 'NONE');
                        $view_cut = '';
                        foreach($cutlist as $cutkey => $cutval) {
                           $view_cut .= '<option value="'.$cutkey.'" '.arOptSelected($cutkey, $detailcols['cut']).'>'.$cutval.'</option>'; 
                        }
                        echo $view_cut;
                      ?>
                  </select>
                </div>
                <div class="filterBox">
                  <div><b>Color</b></div>
                  <select multiple="multiple" name="color[]" class="form-control comboStyle">
                      <?php
                        $color_list = array('D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
                        $view_color = '';
                        foreach($color_list as $colorval) {
                           $view_color .= '<option value="'.$colorval.'" '.arOptSelected($colorval, $detailcols['color']).'>'.$colorval.'</option>'; 
                        }
                        echo $view_color;
                      ?>
                  </select>
                </div>
                <div class="filterBox">
                  <div><b>Fancy Color</b></div>
                  <select multiple="multiple" name="fancycolor[]" class="form-control comboStyle">
                    <?php echo $fcolor_list; ?>
                  </select>
                </div>
                <div class="filterBox">
                  <div><b>Clarity</b></div>
                  <select multiple="multiple" name="clarity[]" class="form-control comboStyle">
                      <?php
                          $clarity_list = array('FL', 'IF', 'VVS1', 'VVS2', 'VS1', 'VS2', 'SI1', 'SI2', 'SI3', 'I1', 'I2', 'I3', 'NONE');
                          $view_clr = '';
                            foreach($clarity_list as $clrvalue) {
                               $clrval = ( $clrvalue == 'NONE' ? '' : $clrvalue );
                               $view_clr .= '<option value="'.$clrval.'" '.arOptSelected($clrval, $detailcols['clarity']).'>'.$clrvalue.'</option>'; 
                            }
                            echo $view_clr;
                      ?>
                  </select>
                </div>
                <div class="filterBox">
                  <div><b>Cert</b></div>
                  <select multiple="multiple" name="cert[]" class="form-control comboStyle">
                      <?php
                        $cert_list = array('GIA', 'AGI', 'IGI', 'EGL', 'EGL USA', 'EGL NY', 'EGL I', 'EGL H', 'EGL OTHER', 'OTHER', 'EGL P', 'NONE');
                        $view_cert = '';
                            foreach($cert_list as $certvalue) {
                               $view_cert .= '<option value="'.$certvalue.'" '.arOptSelected($certvalue, $detailcols['cert']).'>'.$certvalue.'</option>'; 
                            }
                            echo $view_cert;
                      ?>
                  </select>
                </div>
                
        
        <div class="filterBox1">
            <div><strong>Price Discount</strong></div>
          <br>
            <div>
                <select name="manufactur_name" required="" class="form-control setmanufact">
                <option value="">Select Manufacturer</option>
                <?php
                //$manufact_list = array('eBay', 'Amazon', 'Sears', 'Rakuten');
                $manufact_list = array('eBay', 'Amazon', 'Amazon Ring', 'Rakuten');
                $manufactview = '';
                    foreach($manufact_list as $manufactvale) {
                       $manufactview .= '<option value="'.$manufactvale.'" '.setSelected($manufactvale, $detailcols['manufact_name']).'>'.$manufactvale.'</option>'; 
                    }
                    echo $manufactview;
                ?>
            </select>
            </div>
          <br>
          <div><a href="#javascript" onclick="addDiscountRow()">Add Row</a></div>
            <table class="table settable">
                <tr>
                    <td>Min Price</td>
                    <td>Max. Price</td>
                    <td>Discount</td>
                </tr>
                <?php
                $i = 0;
                $viewdiscrow = '';
                $datarow = $detailcols['rapdisc'];
                //print_ar($custcols['rapdisc']);
                
            if( count($datarow['mins_price']) > 0 ) {
                foreach($datarow['mins_price'] as $discrows) {
                    $viewdiscrow .= '<tr>
                    <td><input name="minpr[]" class="form-control discfield" value="'.$discrows.'" /></td>
                    <td><input name="maxpr[]" class="form-control discfield" value="'.$datarow['maxs_price'][$i].'" /></td>
                    <td><input name="discvalue[]" class="form-control discfield" value="'.$datarow['rapnet_discount'][$i].'" />
                        <a href="#javascript" class="removerow" onclick="SomeDeleteRowFunction(this)"> X</a></td>
                </tr>';
                    
                    $i++;
                }
            } else {
             $viewdiscrow .= '
                <tr>
                    <td><input name="minpr[]" class="form-control discfield" /></td>
                    <td><input name="maxpr[]" class="form-control discfield" /></td>
                    <td><input name="discvalue[]" class="form-control discfield" /></td>
                </tr>';   
            }
            echo $viewdiscrow;
            
                ?>
            </table>
            <table class="table settable" id="discountRows">
            </table>
        </div>
        <div class="filtrBox">
          <div><b>Carat</b> </div>
          <div style="margin:55px 0 0 13px;"> (Min):
            <input name="caratmin" id="caratmin" value="0" class="form-control amountBox" />
            (Max):
            <input name="caratmax" id="caratmax" value="9.99" class="form-control amountBox" />
          </div>
        </div>
        <div class="labelFields"> Enter Name :
            <input type="text" name="search_name" required="" class="form-control" value="<?php echo $rowdetail['name']; ?>" id="search_name">
            <input type="hidden" name="edit_id" required="" class="form-control" value="<?php echo $rowdetail['id']; ?>" id="search_name">
            <br>
          <input type="submit" name="submit_search" class="btn-primary" value="Save Filter" onclick="return checkval();">
          <br/>
          <br/>
          <input type="submit" name="submit" class="btn-primary" value="Show Diamond">
          <input type="reset" value="Reset Filter" class="btn-danger">
        </div>
      </div>
        <div class="clear"></div><br>
        <div class="saveSearch" style="width:100%;height: auto;overflow: inherit;">
            <br>
          <div><b>Discount Search</b> </div>
          <br>
          <div>
            <?php if (count($savesearch_disc) > 0) {
                                                        ?>
                                                        Cash Limit: <input name="cash_limit" id="cash_limit" value="<?php echo (isset($_SESSION['cash_limit']) && !empty($_SESSION['cash_limit'])) ? $_SESSION['cash_limit'] : '1,000,000';?>" /> 
<br>
    <?php
        echo '<br><table cellpadding="6" border="1" class="table">';
        ?>
        <thead>
            <th>#SL</th>
            <th>Filter Name</th>
            <th>Date</th>
            <th>Marketplace</th>
            <th>Amazon</th>
            <th>Settings</th>
        </thead>
        <?php
        $hd_list = array('HD', 'HDERING', 'ERPHD', 'NHD', 'EBSFJ', 'jewelercart', 'jewelercart_watches');
        
        //print_ar($savesearch_disc);
        $sl = 1;
        foreach($savesearch_disc as $search) 
            {


            //echo '<pre>'; print_r($search); echo '<pre>';

            $search_str = unserialize($search['search_string']);
            
            if( in_array($search_str['diamondscat'], $hd_list)  ) {
                
                 
            } else {                
                if( $search['manufact_name'] == 'eBay' ) {
                    $pageLink = SITE_URL.'admin/allloosediamonds/view/'.$search['id'];
                    $eBayLink = '<a href="'.$pageLink.'" target="_blank">'.$search['name'].'</a>';                  
                } else {
                    $eBayLink = $search['name'];   
                }
                $download_link = '';
            }
                
               /* if( $search_str['diamondscat'] === 'EBSFJ' ) {
                    $page_link = SITE_URL.'stuller_fashion_jewelry/stuller_fashionjew_listing/view/'.$search_str['diamondscat'].'/'.$search['id'];
                } else if( $search_str['diamondscat'] === 'HDERING' ) {
                    $page_link = SITE_URL.'hdering_admin_listings/heart_collection_items/view/'.$search_str['diamondscat'].'/'.$search['id'];
                }else if($search_str['diamondscat'] === 'JCART'){
                    $page_link = SITE_URL.'jcart_fashion_jewelry/stuller_fashionjew_listing/view/'.$search_str['diamondscat'].'/'.$search['id'];
                }else if($search_str['diamondscat'] === 'JCARTW'){
                    $page_link = SITE_URL.'jcartw_fashion_jewelry/stuller_fashionjew_listing/view/'.$search_str['diamondscat'].'/'.$search['id'];
                }else{
                    $page_link = SITE_URL.'admin_listings/heart_collection_items/view/'.$search_str['diamondscat'].'/'.$search['id'];
                }   */     
                
                //echo $search['name'].'<br>'; 
                
                if($search_str['diamondscat'] === 'jewelercart'){
                    $page_link = SITE_URL.'jcart_fashion_jewelry/stuller_fashionjew_listing/view/'.$search_str['diamondscat'].'/'.$search['id'].'?pc=mm&cp=mm3';
                    $eBayLink = '<a href="'.$page_link.'" target="_blank">'.$search['name'].'</a>';
                }else if($search_str['diamondscat'] === 'jewelercart_watches'){
                    $page_link = SITE_URL.'jcartw_fashion_jewelry/stuller_fashionjew_listing/view/'.$search_str['diamondscat'].'/'.$search['id'].'?pc=mm&cp=mm1';
                    $eBayLink = '<a href="'.$page_link.'" target="_blank">'.$search['name'].'</a>';
                }else if($search['name'] == 'Engagement Rings'){
                    $eBayLink = '<a href="'.SITE_URL.'engagement_rings_fashion_jewelry/stuller_engagement_rings_listing/view/engagement_rings/'.$search['id'].'" target="_blank">'.$search['name'].'</a>';
                }else if($search['name'] == 'wedding_bands_platinum'){
                    $eBayLink = '<a href="'.SITE_URL.'wedding_bands_fashion_jewelry/stuller_wedding_bands_listing/view/wedding_bands_platinum/'.$search['id'].'" target="_blank">Wedding Bands Platinum</a>';
                }else if($search['name'] == 'diamond_stud_earrings'){
                    $eBayLink = '<a href="'.SITE_URL.'wedding_bands_fashion_jewelry/stuller_stud_earrings_listing/view/diamond_stud_earrings/'.$search['id'].'" target="_blank">Diamond Stud Earrings</a>';
                }else if($search['name'] == 'diamond_hoops'){
                    $eBayLink = '<a href="'.SITE_URL.'wedding_bands_fashion_jewelry/stuller_diamond_hoops_listing/view/diamond_hoops/'.$search['id'].'" target="_blank">Diamond Hoop Earings</a>';
                }else if($search['name'] == 'wedding_bands_ladies'){
                    $eBayLink = '<a href="'.SITE_URL.'wedding_bands_fashion_jewelry/stuller_wedding_bands_ladies_listing/view/wedding_bands_ladies/'.$search['id'].'" target="_blank">Wedding Bands Ladies</a>';
                }else if($search['name'] == 'wedding_bands_mens'){
                    $eBayLink = '<a href="'.SITE_URL.'wedding_bands_fashion_jewelry/stuller_wedding_bands_mens_listing/view/wedding_bands_mens/'.$search['id'].'" target="_blank">Wedding Bands Mens</a>';
                }else if($search['name'] == 'quality_gold'){
                    $eBayLink = '<a href="'.SITE_URL.'jcart_fashion_jewelry/quality_gold_listing/view/jewelercart/'.$search['id'].'?pc=tpj&cp=tpj2_2" target="_blank">Quality Gold</a>';
                }else if($search['name'] == '360_engagement_rings'){
                    $eBayLink = '<a href="'.SITE_URL.'jcart_fashion_jewelry/three_sixty_engagement_rings/view/jewelercart/'.$search['id'].'?pc=tpj&cp=tpj2" target="_blank">360 Engagement Rings</a>';
                }else{
                    $page_link = SITE_URL.'admin_listings/heart_collection_items/view/'.$search_str['diamondscat'].'/'.$search['id'];
                    $eBayLink = '<a href="'.$page_link.'" target="_blank">'.$search['name'].'</a>';
                }             
                
                
                
                $download_link = '<a href="'.SITE_URL.'make_item_list_excel_file/download_item_listings_excel/'.$search_str['diamondscat'].'/'.$search['id'].'">Download Excel</a>';
           
        ?>    
            <tr>
              <td><?php echo $sl++; ?></td>
              <td><?php echo $eBayLink; ?></td>
              <td><?php echo $search['date']; ?></td>
              <td>
    <?php
    if( $search['manufact_name'] == 'Amazon' ) {
       $view_feeds = '<div><a href="'.SITE_URL.'csvfileadmin/csvTemplateDownlaodForAmazon/'.$search['id'].'">Amazon.txt Download</a></div>'; 
    } 
    elseif( $search['manufact_name'] == 'Amazon Ring' ) 
    {
        $view_feeds = '<div><a href="'.SITE_URL.'ringItemAmazonTemplate/txtTemplateDownlaodForAmazon/ERPHD/Band" target="_blank">Amazon Band Item</a></div>';
    } 
    elseif( $search['manufact_name'] == 'Sears' ) 
    {
        $view_feeds = '<div><a href="'.SITE_URL.'searsexcelfile/readWriteSearsTemplateFile/'.$search['id'].'" target="_blank">Sears Excel Download</a></div>';
    } 
    elseif( $search['manufact_name'] == 'Rakuten' ) 
    {
       $view_feeds = '<div><a href="'.SITE_URL.'rakutentextfile/inventFeedTemplatFile/'.$search['id'].'">Rakuten Inventory Download</a></div>'; 
    } else {
        $view_feeds = 'Ebay and Etsy';
    }
    echo $view_feeds;
    ?>
              </td>
              <td><?php echo $download_link; ?></td>
              <td>
                  <!--<a href="<?php echo config_item('base_url'); ?>admin/delsavedsearch/<?php echo $search['id']; ?>/1">Delete</a> | -->
                  <a href="<?php echo config_item('base_url'); ?>admin/loosediamonds/view/<?php echo $search['id']; ?>/">Edit</a>
              </td>
            </tr>
            <?php }
                echo '</table>';
                 } ?>
	    <script type="text/javascript">
                jQuery('.sllinkdisc').each(function()
                {
                        jQuery(this).click(function()
                        {
                                var cash = jQuery('#cash_limit').val();
                                var url = "<?php echo config_item('base_url'); ?>admin/saveloosesearch/";
                                var id = jQuery(this).attr('rel');
                                //alert(id);
                                window.location = url+'id='+id;
                        });	
                });
            </script>
          </div>
        </div>
        <div class="clear"></div><br>
<!--        <div>
          <div class="saveSearch">
          <div><b>Save Search</b> </div>
          <div>
<?php if (count($savesearch) > 0) {
    ?>
    Cash Limit: <input name="cash_limit" id="cash_limit" value="<?php echo (isset($_SESSION['cash_limit']) && !empty($_SESSION['cash_limit'])) ? $_SESSION['cash_limit'] : '1,000,000';?>" /> 

    <?php
            echo '<table cellpadding="6" border="1" class="table">';  
                    foreach($savesearch as $search) {
    ?>
            <tr>
              <td><a href="<?php echo SITE_URL.'admin/allloosediamonds/view/'.$search['id']; ?>" class="sllink"><?php echo $search['name']; ?></a></td>
              <td><?php echo $search['date']; ?></td>
              <td>
                  <div><a href="<?php echo SITE_URL.'searsexcelfile/readWriteSearsTemplateFile/'.$search['id']; ?>" target="_blank">Sears Excel Download</a></div>
                  <div><a href="<?php echo SITE_URL.'csvfileadmin/csvTemplateDownlaodForAmazon/'.$search['id']; ?>">Amazon.txt Download</a></div>
 <div><a href="<?php echo SITE_URL.'rakutentextfile/textTabDelimitedTempForRakuten/'.$search['id']; ?>">Rakuten Download</a></div>
                  <div><a href="<?php echo SITE_URL.'rakutentextfile/inventFeedTemplatFile/'.$search['id']; ?>">Rakuten Inventory Download</a></div>
              </td>
              <td><a href="<?php echo config_item('base_url'); ?>admin/delsavedsearch/<?php echo $search['id']; ?>/1">Delete</a></td>
            </tr>
            <?php }
                echo '</table>';
                 } ?>
          </div>
        </div>
        </div>-->
<script>
    function checkval() {
            if(document.getElementById('search_name').value == '') {
                    alert('Please enter search name');
                    return false;
            }
            return true;
    }
</script>
<!--      <table id="results" style="display:none; "></table>-->
    </form>
  </div>
  <?php } ?>
</div>
  
  
  
</div>
<!--\\\\\\\ wrapper end\\\\\\--> 
<!-- Modal -->
<?php echo popupsOtherBlockData(); ?>
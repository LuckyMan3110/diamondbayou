<div class="inner"> 
  <!--\\\\\\\ inner start \\\\\\-->
  <div class="contentpanel"> 
      <!-- main menu start -->
        <div><?php echo admin_main_menu_list(); //// admin_mainmenu helper ?></div>
        <!-- main menu end -->
    <!--\\\\\\\ contentpanel start\\\\\\-->
    <div class="pull-left breadcrumb_admin clear_both">
      <div class="pull-left page_title theme_color">
        <h1>Master Management</h1>
        <h2 class="">Watches Management</h2>
      </div>
      <div class="pull-right">
        <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li><a href="#">PAGES</a></li>
          <li class="active">blankpage</li>
        </ol>
      </div>
    </div>
    <div class="container clear_both padding_fix">
    <div>
    <?php if($action == 'add' || $action == 'edit'){
        $this->load->helper('custom','form');
    
        if(isset($details)){
    
            $brand_link 		= isset($details['brand_link']) ?  $details['brand_link'] : '';
            $content 	= isset($details['brand_content']) ?  $details['brand_content'] : '';
            $brand_name 	= isset($details['brand_name']) ?  $details['brand_name'] : '';
                              
    
        }else{                            
                                            
            $image_type =  '';
            $content =  '';
            $brand_link =  '';
            $brand_name =  '';
            //$asin_price = '0.00';
                                
        }
        $id         	= isset($id) ? $id : '';
                            
        ?>
<div class="blue_man">
   <div class="blue_admin_box1">			
      <div class="addcountry_box">
        <div class="heading">
          <h1><?=ucfirst($action) ?> Watch Brand</h1>
        </div>
            <!-- Message Part -->
            <div style="width:100%;">
             <? if(isset($success) && !empty($success)){ ?>
                <div style="width:95.5%; margin:5px; padding:10px 10px 10px 10px; background-color:#C8F2BB; font-weight:bold">
               
                      <? echo $success;   ?>
                 
                </div>
                <? } ?>
            </div>
            <div style="clear:both"></div>
            <!-- End -->
            <div class="search_box">
                 <form name="watchform" action="<?php echo config_item('base_url');?>admin/brands/<?php echo $action; echo ($action == 'edit') ? '/' .$id : '';?>" method="post" enctype="multipart/form-data" >
           <table width="80%" border="0" align="center" cellpadding="5" cellspacing="0" class="table_border">
  <!--Warning Class-->
<!--end of displaying warning class-->
    
      
    <tr>
      <td width="20%" align="right">Brand Image</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
          <input type="file" name="image" id="image">   
                          <input type="hidden" name="brand_id"  id="brand_id" value ="<?php echo $id;  ?>"  style="width:120px;"/>
            </dd>
      </td>
    </tr>  
        
  <tr>
      <td width="20%" align="right">  Brand name</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">          
                    <input type="text" name="brand_name" id="brand_name" value="<?=$brand_name; ?>"  style="width:150px;"/>
                    <br><small>Donot use the minus(-) special sign in brand name.</small>
            </dd>
      </td>
    </tr>  
           
        
  <tr>
      <td width="20%" align="right">Watch Descriptions</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">          
            <textarea  name="brand_content" id="brand_content" style="width:280px;height:100px;"> <?=$content; ?></textarea>
            </dd>
      </td>
    </tr>  
    
          
    <tr>
      <td align="right">&nbsp;</td>
	  <td width="3%" align="left" valign="top"><dt id="edit-label">&nbsp;</dt><dd id="edit-element">
            <input type="submit" name="<?=$action;?>btn" id="edit" value="Save" class="search_but"></dd>&nbsp;</td>          
          <td width="74%" align="left" valign="top"><dt id="back-label">&nbsp;</dt><dd id="back-element">
            <button name="back" id="back" type="button" class="search_but" onclick="history.go(-1);">Back</button></dd></td>
    </tr>                     
     </table>
      </form>
</div>
   </div>		
 </div>
      <div class="spacerdiv"><img src="/template/admin/images/spacer.gif" alt="spacer" /></div>
    </div>       
       
             
                
    <?php }else{
    $a = config_item('base_url')."admin/updaterolexgroup";
    ?>
    <form name="mywatchfrm" id="mywatchfrm" action="<?php echo $a; ?>" method="post">
    <div>
        <table id="results" style="display:none; "></table>
    </div>
    <?php }?>
</div>
    <!--\\\\\\\ container  end \\\\\\--> 
  </div>
  <!--\\\\\\\ content panel end \\\\\\--> 
</div>
<!--\\\\\\\ inner end\\\\\\-->
</div>
<!--\\\\\\\ wrapper end\\\\\\--> 
<!-- Modal -->
<?php echo popupsOtherBlockData(); ?>
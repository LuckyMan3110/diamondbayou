<div>
		<?php if($action == 'add' || $action == 'edit'){
	       	$this->load->helper('custom','form');
			
			 if(isset($details)){ $details = $details[0];

                          		$option_name 			= isset($details['option_name'])  ? $details['option_name'] : '';
							 	$option_price 			= isset($details['option_price']) 	  ? $details['option_price'] : 0;							 	
							 	$option_value 		= isset($details['option_value']) 	  ? $details['option_value'] 	: '' ;
							 			    
			 }else{
                    
                          	$option_name 			=  '';
							 	$optin_price 			=  0;							 	
							 	$option_value 		=  '' ;
			    
			 }
			  		$id         	= isset($id) ? $id : '';
			
			?>
	<div class="blue_man">
   <div class="blue_admin_box1">			
      <div class="addcountry_box">
        <div class="heading">
          <h1><?=ucfirst($action) ?> Nameplate Attributes</h1>
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
<form name="" action="<?php echo config_item('base_url');?>admin/attribute/<?php echo $action; echo ($action == 'edit') ? '/' .$id : '';?>" method="post" enctype="multipart/form-data" >
 <table width="80%" border="0" align="center" cellpadding="5" cellspacing="0" class="table_border">
  <!--Warning Class-->
<!--end of displaying warning class-->
    
      
    <tr>
      <td width="20%" align="right">Option Name:</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
          <select name="option_name" id="option_name">
                                                                             <? if ($option_name == '1') {  ?>
                                                                              <option value="1" selected="selected" >Metal</option>
                                                                            <? } else { ?>
                                                                              <option value="1">Metal</option>
                                                                              <? } ?>
                                                                          <? if ($option_name == '2') {  ?>
                                                                              <option value="2" selected>Chain Style</option>
                                                                           <? } else { ?>
                                                                              <option value="2">Chain Style</option>
                                                                           <? } ?>
                                                                            </select>
            </dd>
      </td>
    </tr>  

<tr>
      <td width="20%" align="right">Option Value:</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">          
                  <input type="text" name="option_value" value="<?php echo $option_value;?>" maxlength="15" class="price" /> 											
            </dd>
      </td>
    </tr>  
<tr>
      <td width="20%" align="right">Option Price:</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">          
		<input type="text" name="option_price" id="option_price"  value="<?php echo $option_price ; ?>" maxlength="15" class="option_price" /> 											
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
			
<?php }else{?>
	<div>
      	    <table id="results" style="display:none; "></table>
	</div>
		<?php }?>
</div>
 

 

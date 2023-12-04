<style>
.pageheader{color:#000;}
</style>
<div>
		<?php
        	if($action == 'details'){
		?>
           <div>Page Detail</div> 
      <?php
		}
		if($action == 'add' || $action == 'edit'){
	       	$this->load->helper('custom','form');
			 if(isset($details)){
							 	$pricefrom  = isset($details['pricefrom'])? $details['pricefrom'] 		: 0;
							 	$priceto 	= isset($details['priceto'])  ? $details['priceto'] 		: 0;
							 	$rate   	= isset($details['rate']) 	  ? $details['rate'] 	: 1;
							 	
			                    
			                    
			    
			 }else{
			 	 					$pricefrom  =  0;
								 	$priceto 	=  0;
								 	$rate   	= 1;
			    
			 }
			  		$id         	= isset($id) ? $id : '';
			
			?>
			<div class="blue_man">
   <div class="blue_admin_box1">			
      <div class="addcountry_box">
        <div class="heading">
          <h1><?=ucfirst($action) ?> Comments Management</h1>
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
<form name="helixprice" action="<?php echo config_item('base_url');?>admin/uniqueprice_setting/<?php echo $action; echo ($action == 'edit') ? '/' .$id : '';?>" method="post">
<table width="95%" align="center" cellpadding="10" cellspacing="10">
<tr>
      <td width="20%" align="right">Price From:</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">          
          <input type="text" name="pricefrom" value="<?php echo $pricefrom;?>" maxlength="15" class="price" /><?php echo form_error('pricefrom'); ?> 											
            </dd>
      </td>
</tr>							
<tr>
      <td width="20%" align="right">Price To:</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">          
          <input type="text" name="priceto" value="<?php echo $priceto;?>" maxlength="15" class="price" /><?php echo form_error('priceto'); ?> 											
            </dd>
      </td>
</tr>							    
<tr>
      <td width="20%" align="right">Price Rate(%):</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">          
        <input type="text" name="rate" value="<?php echo $rate;?>" maxlength="10" class="" /><?php echo form_error('rate'); ?>
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
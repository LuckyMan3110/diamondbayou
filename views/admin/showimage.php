<div>
		<?php if($action == 'add' || $action == 'edit'){
	       	$this->load->helper('custom','form');

				if(isset($details)){

                         	$image_link 		= isset($details['image_link']) ?  $details['image_link'] : '';
                            $image_type 	= isset($details['image_type']) ?  $details['image_type'] : '';
                            $content 	= isset($details['content']) ?  $details['content'] : '';
                            $image_title 	= isset($details['image_title']) ?  $details['image_title'] : '';
                          

			 }else{                            
                   	                
	            		$image_type =  '';
                        $content =  '';
                        $image_link =  '';
                        $image_title =  '';
                        //$asin_price = '0.00';
			    
			 }
			  		$id         	= isset($id) ? $id : '';
			
			?>
			<div>
					<h1 class="hbb" align="center">
								<?=ucfirst($action) ?> Watch Brand
					
					</h1>
					
					<br/>
					<div align="center">
					 
						 <form name="watchform" action="<?php echo config_item('base_url');?>admin/showimage/<?php echo $action; echo ($action == 'edit') ? '/' .$id : '';?>" method="post" enctype="multipart/form-data" >
						
<table width="95%" align="center" cellpadding="10" cellspacing="10">
  <tr>
    <td>Upload Watch Brand</td>
    </tr>
	<tr>
		<td>			
		Brand Image
		</td>
		<td>
		<input type="file" name="file" id="file">   
                <input type="hidden" name="image_id"  id="image_id" value ="<?php echo $id;  ?>"  style="width:120px;"/>
		</td>	
	</tr>
        
        <tr>
		<td>			
		Brand title
		</td>
		<td>
                    <input type="text" name="image_title" id="image_title" value="<?=$image_title; ?>"  style="width:150px;"/>
		</td>	
	</tr>
    
      <tr>
		<td>			
		Brand Link
		</td>
		<td>
                     <input type="text" name="image_link" id="image_link" style="width:240px;" value="<?=$image_link; ?>">
		</td>	
	</tr>
		
		  <tr>
		<td>			
			Watch Descriptions
		</td>
		<td>
                     <textarea  name="content" id="content" style="width:280px;height:100px;"> <?=$content; ?></textarea>
		</td>	
	</tr>
        
        <tr>
		<td>			
				Brand Name 
		</td>
		<td>
		<?php 
			$brandoptions = array('ANNE KLEIN',"ARMANI EXCHANGE","BABY-G","BREITLING","BULOVA","CALVIN KLEIN","CARAVELLE","CARTIER","CASIO","CATERPILLAR","CITIZEN","DIESEL","DKNY","EDIFICE","FOSSIL","G-SHOCK","GRAND MASTER","GUESS","ICE/WATCH","JOE RODEO","KENNETH COLE","MICHAEL KORS","MICHELE","MOVADO","NAUTICA","PULSAR","ROLEX","SEIKO","SKAGEN","TECHNO MASTER","TISSOT","WHITTNAUER","TIMEX" , "AQUA MASTER","PATH FINDER","SWISS ARMY","TIMEX" ,"JoJino", "Lego","Super techno" ,"Tenakey","Nychi","Ice Plus");
		?>
                    <select name="image_type" id="image_type" style="width:120px;">
                    <?php for($j=0;$j<sizeof($brandoptions); $j++){ 
                     if($brandoptions[$j] == $image_type){ 
                    	echo "<option value='".$brandoptions[$j]."'  selected='selected' >".$brandoptions[$j]."</option>";
                     }else {
                     	echo "<option value='".$brandoptions[$j]."' >".$brandoptions[$j]."</option>";                     	
                     } } ?>                     
                    </select>
                    
		</td>	
	</tr>
    
							  <tr>
							  <td colspan="3" align="left">
							   <input type="submit"  name="<?=$action;?>btn" value="Save" class="adminbutton1"  /> 
							   <a href="<?php echo config_item('base_url')?>admin/showimage" class="adminbutton1" style="background:white;margin:5px;padding:10px;color:black;font-size:13px;font-weight:bold;"> Cancel</a> 
					 </td>
							  </tr>
							</table>
								 
						</form>
					</div>
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
 

 

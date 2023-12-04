<?php


  $id= $result['image_id'];
?>

<form method="post" action="<?php echo config_item('base_url');?>index.php/admin/updateimg/edit/<?=$image_id; ?>" enctype="multipart/form-data">
<table width="95%" align="center" cellpadding="10" cellspacing="10">
  <tr>
    <td>Upload Home Page Image</td>
    </tr>
	<tr>
		<td>			
		Upload Image
		</td>
		<td>
		<input type="file" name="file" id="file">   
                <input type="hidden" name="image_id"  id="image_id" value ="<?php echo $id;  ?>" />
		</td>	
	</tr>
        
        <tr>
		<td>			
		Image title
		</td>
		<td>
                    <input type="text" name="title" id="title" value="<?=$result['image_title']; ?>" />
		</td>	
	</tr>
                <tr>
		<td>			
		Image Link
		</td>
		<td>
                     <input type="text" name="link" id="link" style="width:180px;" value="<?=$result['image_link']; ?>">
		</td>	
	</tr>
        
        <tr>
		<td>			
		Image for 
		</td>
		<td>
                    <select name="type" id="type">
                     <?  if($result['image_type'] == 'Brand')  { ?>
                        <option value="Brand" selected="selected">Brand</option>
                        <option value="Watch">Watch</option>
                     <?  } else { ?>
                        <option value="Brand" >Brand</option>
                        <option value="Watch" selected="selected">Watch</option>
                     
                     <? } ?>
                    </select>
                        <input type="submit" name="submit" value="submit">
		</td>	
	</tr>
        
</table>

</form>

<form method="post" action="<?php echo config_item('base_url');?>index.php/admin/uploads" enctype="multipart/form-data">
<table width="95%" align="center">
  <tr>
    <td>Upload Ebay orders</td>
    </tr>
	<tr>
		<td>			
		Upload File(cvs format)	
		</td>
		<td>
		<input type="file" name="filecsv"> <input type="submit" name="submit" value="submit">
		</td>
	
	</tr>
</table>

</form>
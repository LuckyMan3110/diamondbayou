
<div>
	
			<div>
						<div align="center">
						 <form name="" action="<?php echo config_item('base_url');?>index.php/admin/upload/add" method="post" enctype="multipart/form-data" >
							
						<table 	 border="0" align="left" width="100%"/>
						  <tr>
								<td colspan="2"> 
									<table width="100%"><tr><td valign="top">
												<fieldset style="background: #fff;">
												<legend><b>Upload Diamond CSV</b></legend>
													<center>
													<input type="file" name="uploadcsv" id="file1" value=""  /> 
													<br>
													<a href ="<?php echo config_item('base_url').'upload/sample/sample.csv';?>" target='_blank'>Click here to download the Sample CSV</a>
													<br>
													<a href ="<?php echo config_item('base_url').'upload/sample/value.xls';?>" target='_blank'>Reference Code For Values in CSV</a>
													</center>
												</fieldset>	
											</td>
									  </tr>
							  		</table>
								 </td>
							  </tr>
							   <tr>
							  <td></td><td><br>
							   <input type="submit"  name="addbtn" value="Upload" class="adminbutton"  /> <a href="<?php echo config_item('base_url')?>index.php/admin/index" class="adminbutton"> Cancel</a>
										 
							  </td>
							  </tr>
							</table>
							 
						</form>
					</div>
			</div>
			
</div>

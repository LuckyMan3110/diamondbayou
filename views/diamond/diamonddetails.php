<? //var_dump($details); ?>
<?php 
 
 
	$shape = '';
	switch ($details['shape']){
				  	case 'B':
				  		$shape = 'Round';
				  		break;
				  	case 'PR':
				  		$shape = 'Princess';
				  		break;
				  	case 'R':
				  		$shape = 'Radiant';
				  		break;
				  	case 'E':
				  		$shape = 'Emerald';
				  		break;
				  	case 'AS':
				  		$shape = 'Asscher';
				  		break;
				  	case 'O':
				  		$shape = 'Oval';
				  		break;
				  	case 'M':
				  		$shape = 'Marquise';
				  		break;
				  	case 'P':
				  		$shape = 'Pear';
				  		break;
				  	case 'H':
				  		$shape = 'Heart';
				  		break;
				  	case 'C':
				  		$shape = 'Cushion';
				  		break;								  	
				  	default:
				  		$shape = $details['shape'];
				  		break;
				  }		



?>
<style type="text/css">
    .diamonddetails{
	background:url(<?=config_item('base_url');?>/images/tamal/diamond/top_<?=$shape?>.jpg) no-repeat;
	width:190px;
	position:
}  
</style>
<script>
  function show_div(id1,id2,id3,id4)
  {
       document.getElementById(id1).style.display="block";
       document.getElementById(id2).style.display="none";
       document.getElementById(id3).style.display="none";
       document.getElementById(id4).style.display="none";
  
  
  
  }

</script>
<div class="floatl pad05">
    <div style="width:100%;float:left;text-align:left;margin-bottom:30px;">
	      <a href="#" onclick="show_div('first','loupe','ideal','hearts');" >Detail View</a>
	     <img src="<?php echo config_item('base_url');?>images/popup/loupe_tab.gif" alt="loupe_tab" style="margin-top:5px;" onclick="show_div('loupe','ideal','hearts','first');">
	     <img src="<?php echo config_item('base_url');?>images/popup/ideal_tab.gif" alt="loupe_tab" style="margin-top:5px;" onclick="show_div('ideal','loupe','hearts','first');" >
	     <img src="<?php echo config_item('base_url');?>images/popup/heart_tab.gif" alt="loupe_tab" style="margin-top:5px;" onclick="show_div('hearts','loupe','ideal','first');" >
	</div>
    <div style="width:100%;float:left;display:none;text-align:left;" id="loupe">
	     <img src="<?php echo config_item('base_url');?>images/popup/loupe.gif" alt="loupe">
		 
	</div>
     <div style="width:100%;float:left;display:none;text-align:left;" id="ideal">
	      <img src="<?php echo config_item('base_url');?>images/popup/ideal.gif" alt="ideal">
	</div>
    <div style="width:100%;float:left;display:none;text-align:left;" id="hearts">
	      <img src="<?php echo config_item('base_url');?>images/popup/hearts.gif" alt="hearts">
	</div>
    <div style="width:100%;float:left;display:block;text-align:left;" id="first">

	  	<div class="bodymid_detail">  
				<div class="topdiv">
					<?php echo $top_ads;?>
				</div>
	  			
	  			<h1 class="pageheader hr" style="margin-bottom:30px;"><?php echo $pageheader; ?></h1>
	  			 
	  			<div class="dbr"></div>	  			
	  			
	  			<div>
			  			<div class="floatl tile0">
			  				<div id="diamonddetails" style="display:block;" class="diamonddetails">
			  					
			  					
			  									<div class="sidedetail">
				  										<div class="depthpercent1 txtsmall">Depth%: <?php echo $details['Depth'] ?>%</div> 
				  										<div class="tablepercent1 txtsmall">Table%: <?php echo $details['TablePercent'] ?>%</div>
					  									<div class="depth1 txtsmall">Depth</div>
					  									<div class="culet1 txtsmall">Culet:<?php echo $details['Culet'] ?></div>
			  									</div>			  									
			  					
			  					
			  				</div>
			  			</div>
			  			<div class="floatl width285">
						      <p><strong><?php echo $details['carat'] ?>-Carat <?php echo $shape ?> Shape Diamond</strong> </p>
						      <p>This <i><?php echo $details['cut']?></i>-cut, <i><?php echo $details['color']?></i>-color, and <i><?php echo $details['clarity']?></i>-clarity diamond comes accompanied by a diamond grading report from the <?php echo $details['Cert']?>.</p>
						      <div class="dbr"></div>
						      <p style="margin-left:30px;"><strong>Price:</strong> $&nbsp;<?php echo round($details['pricepercrt'] * $details['carat']) ?> </p>
						      <br /><br />
						       <form method="POST" action="<?php echo config_item('base_url');?>engagement/search/ring/true">   
						       		<table cellpadding="0" cellspacing="0" border="0" width="101%">
						       			<tbody><tr>
							      	      	<td width="130px">	
							      	      		<div id="adddiamond" class="floatl textleft" style="margin-left: 288px;">  
							      	      			<div class="floatl">
							      	      				
							      	      				<div class="floatl">
                                                        <?php
														//echo count($sidestones_ct);
														 //if($sidestones_ct > 0) {
														?>
                                                        <a href="<?php echo $nexturl;?>" onclick="<?php echo ($nexturl == '#') ? "$('#add_diamond_list').toggle()" : $onclickfunction ;?>">Add this Diamond</a>
                                                        <?php
														 /*} else {
															echo 'No Match Found call <br /># 415'; 
														 }*/
														?>
                                                        </div>
							      	      				
							      	      				<div class="clear"></div>
							      	      			</div>  
							      	      			<div class="clear"></div>
							      	      			<?php echo $linkhtml;?>
							      	      			
							      	      		</div>
							      	      	</td>
							      	      	<td width="120" valign="top">
							      	      		<div class="floatl w125px" style="margin-left: -197px;">
						      	      				<div class="floatr "></div>
						      	      				<div class="floatr "><a href="#" onclick="$.facebox.close()">back to search</a></div>
						      	      				<div class="floatr "></div>
						      	      				<div class="clear"></div>
							      	      		</div>
						      	      		</td>
					      	      		</tr></tbody>
				      	      		</table>   	      		  
				      	      </form>
						     
				      	      
				      </div>
				      <div class="clear"></div>
				</div>
		      	
				<div class="dbr"></div>
				<div>
					<div class="floatl padl10">
						<div class="floatl">
						       <img src="<?php echo config_item('base_url')?>/images/tamal/minimize.jpg"  alt="minimize" id="expand" onclick="$('#productdetails').toggle(); if( this.src == '<?php echo config_item('base_url')?>/images/tamal/minimize.jpg') this.src='<?php echo config_item('base_url')?>/images/tamal/expand.jpg' ;else  this.src = '<?php echo config_item('base_url')?>/images/tamal/minimize.jpg';">
						</div>
						<div class="infobox01 floatl width450px">Product Details</div>
						<div class="clear"></div>
						
						<div id="productdetails" style="display:block; padding:0px;">
							<div class="infoheader padt10">Diamond information</div>
								<table cellpadding="0" cellspacing="0" border="0" width="101%">
									<tbody><tr>
										<td width="230" valign="top">
											<table cellpadding="0" cellspacing="0" border="0" width="90%">
												<tbody>
													<tr>
														<td width="120" class="brownback"><u>Lot #:</u></td>
														<td width="120" class="brownback">&nbsp;<?php echo $details['lot'] ?></td>
													</tr>
													<tr>
														<td width="120" class="brownback"><u>Carat:</u></td>
														<td width="120" class="brownback">&nbsp;<?php echo $details['carat'] ?></td>
													</tr>
													<tr>
														<td width="120" class="brownback"><u>Cut:</u></td>
														<td width="120" class="brownback">&nbsp;<?php echo $details['cut'] ?></td>
													</tr>
													<tr>
														<td width="120" class="brownback"><u>Color:</u></td>
														<td width="120" class="brownback">&nbsp;<?php echo $details['color'] ?></td>
													</tr>
													<tr>
														<td width="120" class="brownback"><u>Clarity:</u></td>
														<td width="120" class="brownback">&nbsp;<?php echo $details['clarity'] ?></u></td>
													</tr>
												</tbody>
											</table>
										</td>
										<td width="240" valign="top">
											<table cellpadding="0" cellspacing="0" border="0">
												<tbody>
													<tr>
														<td width="120" class="brownback"><u>Depth %:</u></td>
														<td width="120" class="brownback">&nbsp;<?php echo $details['Depth'] ?></td>
													</tr>
													<tr>
														<td width="120" class="brownback"><u>Table %:</u></td>
														<td width="120" class="brownback">&nbsp;<?php echo $details['TablePercent'] ?></td>
													</tr>
													<tr>
														<td width="120" class="brownback"><u>Symmetry:</u></td>
														<td width="120" class="brownback">&nbsp;<?php echo $details['Sym'] ?></td>
													</tr>
													<tr>
														<td width="120" class="brownback"><u>Polish:</u></td>
														<td width="120" class="brownback">&nbsp;<?php echo $details['Polish'] ?></u></td>
													</tr>
													<tr>
														<td width="120" class="brownback"><u>Girdle:</u></td>
														<td width="120" class="brownback">&nbsp;<?php echo $details['Girdle'] ?></u></td>
													</tr>
													<tr>
														<td width="120" class="brownback"><u>Culet:</u></td>
														<td width="120" class="brownback">&nbsp;<?php echo $details['Culet'] ?></u></td>
													</tr>
													<tr>
														<td width="120" class="brownback"><u>Fluorescence:</u></td>
														<td width="120" class="brownback">&nbsp;<?php echo $details['Flour'] ?></u></td>
													</tr>
													<tr>
														<td width="120" class="brownback">Measurements:</td>
														<td width="120" class="brownback">&nbsp;<?php echo $details['Meas'] ?></u></td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr></tbody>
								</table>
						</div>
						
						
			<?php if(trim($details['certimage'])!='') { 	
				  $chart = trim($details['certimage']);
				 
				  $linktype = explode('.',$chart);
				  $imagetype=array('jpg','jpeg','png','gif','pjpeg');
				  $imgext = $linktype[(count($linktype)-1)];
		
				  $chart= '<img src="'.$chart.'"  />';
				  if(!in_array($imgext,$imagetype))  {
	
					
				  }
				  else
				  {
					// $chart= '<img src="'.$chart.'"  />';
				  }		
				  ?>	
				<div class="dbr"></div>
						
						<div class="floatl">
							<div class="floatl">
								<img src="<?php echo config_item('base_url')?>/images/ruman/engagement/truck.jpg" alt="truck">
							</div>
							<div class="infobox01 floatl width800px">Diamond Certificate Information</div>
							<div class="clear"></div>
							<div class="smallheight"></div>
							<div class="brownback width800px" style="overflow:scroll"> <?=$chart?> &nbsp;</div>
							<div><br></div>
							<div class="clear"></div>
							
						</div>
						
						
					<? } ?>	
						
						
						
						
						
						<div class="dbr"></div> <br>
					<!--	<div class="floatl">
							<div class="floatl">
								<img src="<?php echo config_item('base_url')?>/images/ruman/engagement/truck.jpg">
							</div>
							<div class="infobox01 floatl width800px">Shipping Information</div>
							<div class="clear"></div>
							<div class="smallheight"></div>
							<div class="brownback width800px">
								This ring usally arrives in 2-4 business days. Arrival depends on the diamond selected.
								 
								<div style="border:1px #fff solid;"></div>
															Free shpping via  <a href="<?php echo config_item('base_url');?>site/page/freefedEx">
															<b>FedEx Priority Overnight</b></a>
								</div>
							<div><br></div>
							<div class="clear"></div>
							
						</div> -->
						
					</div>
      	     		 <div class="clear"></div>
				</div>
				      	     
	  	
	  	
	  	</div>
	  	<div class="bodybottom_detail"></div>
            </div> <!---End first--->
		</div>

<div class="clear"></div>

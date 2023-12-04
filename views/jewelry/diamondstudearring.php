<?php $this->load->helper('t');?>

    <div style="float:left; padding-left:07px;" >
        <div style="float:left;font-size:11px;">
        <ul id="ul_main">
       <li id="diamond_search"><a href="<?php echo config_item('base_url');?>diamonds/search"><span class="font">D</span>IAMOND <span class="font">S</span>EARCH</a></li>
       <li><a href="<?php echo config_item('base_url');?>education/diamond"><span class="font">L</span>EARN <span class="font">A</span>BOUT <span class="font">D</span>IAMONDS</a></li>
       <li><a href="<?php echo config_item('base_url');?>engagement/search"><span class="font">B</span>UILD THE <span class="font">R</span>ING OF YOUR <span class="font">D</span>REAM</a></li>
       <li><a href="<?php echo config_item('base_url');?>jewelry/build_three_stone_ring"><span class="font">B</span>UILD THE <span class="font">R</span>ING OF YOUR <span class="font">D</span>REAM (3 STONES)</a></li>
       <li><a href="<?php echo config_item('base_url');?>jewelry/search"><span class="font">D</span>IAMOND <span class="font">S</span>TUD <span class="font">E</span>ARRINGS <span class="font">B</span>UILDER </a></li>
                    <li><a href="<?php echo config_item('base_url');?>jewelry/build_diamond_pendant"><span class="font">P</span>ENDANT <span class="font">B</span>UILDER</a></li>
                                    </ul>
                             </div>
 <div style=" width: 11px;" id="line_2"></div>
<div style="float: left;
    width: 514px; padding-left: 38px;" class="">

     
      <div style="width:500px;" class="divbody">	  
	            
            
	  		<div class="pad10">

	  		<?php foreach ($collections as $collection){?>
	  			<div class="dbr"></div>
				<div class="floatl " valign='middle' align='center' style='padding:10px'>
					<?php $img = file_exists(config_item('base_path').'images/'.$collection['big_image']) ? config_item('base_url').'images/'.$collection['big_image'] : config_item('base_url').'images/rings/noimage.jpg';  ?>
			  		<img src="<?php echo $img; ?>"  alt="more"><br>	
		  		</div>

		  		<div class="tileheader" style='padding-left:10px'><?php echo $collection['collection']?></div><br>		  					
		  		<div style='padding-left:10px'><?php echo $collection['description']?> </div>
		  		
		  		<?php $earrings = $this->jewelrymodel->getByCollectionName($collection['collection']);
		  		
		  		//print_r($earrings)
		  		
		  		echo '<table><tr>';
		  			foreach ($earrings as $earring){
				//	echo($img);
					
		  		?>
		  			<td>
						<a href="javascript:void(0)"onclick="viewearringstuddetails('<?php echo $earring['stock_number']?>','<?php echo $earring['price']?>')">
						<div class="floatl borderrigth">
						<table>
						<tr>
						<td>
						
		  					
		  							<?php $img = file_exists(config_item('base_path').'images/'.$earring['carat_image']) ? config_item('base_url').'images/'.$earring['carat_image'] : config_item('base_url').'images/rings/noimage.jpg';  ?>
		  							
		  							<!--<img src="<?php echo config_item('base_url')?>images/rings/<?php echo $earring['carat_image']?>"><br>-->
		  							</td>
		  							</tr>
                                      <? if($img!="http://www.diamondleaders.com/january28/images/mti/studs/18k Gold Princess-Cut Diamond Stud Earrings/carat_image/.25.gif")
								  {
								  ?>
		  							<tr>
		  							<td>
                                
		  							<img src="<?php echo $img; ?>" alt="more">
                                    
		  							</td>
		  							</tr>
                                    
		  							<tr>
		  							<td>
		  							
			  						<?php echo '$'.$earring['price'];?>
			  						</td>
			  						<tr>
                                    
			  						<td>
			  						<a href="#" onclick="viewearringstuddetails('<?php echo $earring['stock_number']?>','<?php echo $earring['price']?>')" class="underline">View</a>
			  						</td>
			  						</tr>
                                    <? } ?>
			  						</table>
		  					
		  				</div>
						</a>
						</td>

	  		<?php }
	  					echo '</tr></table>';
	  					echo '<div class="clear"></div>';
	  					echo '<div class="hr"></div>';
	  		} ?>
	  		</div>
	  		
	  
	  </div>
 <div class="bodybottom"></div>
</div>
</div
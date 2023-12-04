<?php 

	$this->load->helper('t');

?>
<style>
    p {

       color: #000000;
    }
    a {

        color: #000000;
    }
    .floatl, .lispace, .top_menu_ir, .top_menu_im, .top_menu_il, .atop_menu_ir, .atop_menu_im, .atop_menu_il {
    color: #000000;
    float: left;
    font-family: verdana;
    font-size: 12px;
}
</style>
<div class="floatl pad05 body" style="width:100%;float:left;">
  <div class="bodytop"></div>
	  <div class="bodymid2">  
	  			
	  
			  	<div class="pad10">
			  			
			  			<div class="divheader">Search Result For : <?php echo $inputvalue;?></div>
			  			<div class="dbr"></div>
			  			
			  			<?php
						
			  			if($diamonddetails['lot']!=""){?>
			  				<div class="resultheader">
			  						<a href="<?php echo config_item('base_url')?>diamonds/diamonddetails/<?php echo $diamonddetails['lot'];?>">Diamond of Lot# <?php echo $diamonddetails['lot'];?></a>
			  				</div>
			  				<div class="fakaline">
			  						This is <?php echo $diamonddetails['cut'];?>-cut, <?php echo $diamonddetails['color'];?>-color, and <?php echo $diamonddetails['clarity'];?>-clarity diamond...... <a href="<?php echo config_item('base_url')?>diamonds/diamonddetails/<?php echo $diamonddetails['lot'];?>">(see more)</a>

			  				</div>
			  				<br>
			  			<?php } 
			  			 
			  			if($jewelrydetails!=""){?>
			  				<div class="resultheader">
			  						<a href="<?php echo config_item('base_url')?>engagement/addtobasket/false/<?php echo $jewelrydetails['stock_number'];?>/addtoring">Jewelry of Stock# <?php echo $jewelrydetails['stock_number'];?></a> 
			  				</div>
			  				<div class="fakaline">
			  						<?php echo substr($jewelrydetails['description'],0,60);?>....<a href="<?php echo config_item('base_url')?>engagement/addtobasket/false/<?php echo $jewelrydetails['stock_number'];?>/addtoring">(see more)</a>

			  				</div>
			  				<br>
			  			<?php }
							if(count($stullerdetail)>0){?>
			  				<div class="resultheader">
							<a href="javascript:void(0)" onclick="showdetails_new('ff','<?php echo $stullerdetail['ItemNumber'];?>')"  >Stuller of Item No # <?php echo $inputvalue;?></a> 
			  				</div>
							 <div class="fakaline">
			  						<?php echo substr($stullerdetail['Description'],0,60);?>....

			  				</div>
			  	
			  				<br>
			  			<?php }
							if(count($qgdetail)>0){?>
			  				<div class="resultheader">
							<a href="javascript:void(0)" onclick="showdetails_new('qg','<?php echo $qgdetail['qg_id'];?>')" >QualityGold of Model # <?php echo $inputvalue;?></a> 
			  				</div>
			  			     <div class="fakaline">
			  						<?php echo substr($qgdetail['description'],0,60);?>....

			  				</div>
			  				<br>
			  			<?php }

			  			/* $keyhtml = '';
			  			if(isset($keydetails) || sizeof($keydetails)>0){
			  				
			  				foreach ($keydetails as $key){
			  					 
			  					$keyhtml .= '
			  									<div class="resultheader">
			  											<a href="'.$key['pagelink'].'">'.$key['headline'].'</a>
			  									</div>
			  									<div class="fakaline">'.substr($key['description'],0,100).'....<a href="'.$key['pagelink'].'">(see more)</a></div>	
			  					
			  					';
			  			  }
			  			   echo $keyhtml;
			  			} */

			  			if(count($qgdetail)==0 && count($stullerdetail)==0 &&  $diamonddetails == '' && $jewelrydetails == '' && sizeof($keydetails) == 0){
			  			?>
			  					
			  					<p class="noresult">No result found for <?php echo $inputvalue?>!</p>
			  					<p class="fakalinr">Plese search with appropriate keyword</p>
			  			
			  			<?php 	
			  			}
			  			?>
			  			
			  			
			  			
			    </div>
			    
	  </div>
 <div class="bodybottom"></div>
</div>

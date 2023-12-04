<?php 

	$shape = '';
	switch ($diamond['shape']){
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
	  		$shape = 'Ascher';
	  		break;
	  	case 'O':
	  		$shape = 'Oval';
	  		break;
	  	case 'M':
	  		$shape = 'Marquise';
	  		break;
	  	case 'P':
	  		$shape = 'Pear shape';
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
	  echo("<pre>");
	  //print_r($diamond); 
	  //print_r($tabhtml);
	  //echo "sidestones";
	  //print_r($sidestones);
	  echo("</pre>"); 
?>

<style>

.floatmy{
    color: #FFFFFF;
    float: left;
    font-family: verdana;
    font-size: 12px;
}
.bigcontainerL {
    width: 195px;
    padding:0px!important;
}
.w85px{width: 125px !important;margin: 0px !important;padding-left: 10px;font-size: 13px; color:#fff;}
.tabsBg .smalltabheader {
width: 215px !important;
font-size: 13px !important;
}
.smalltabselected{width:194px !important;}
</style>
<div id="main-body-a">
<div class="bodytop"></div>
<div class="mainPageHeading"><h2>Build Your Own Three-Stone Ring (Diamond Jewelry)</h2></div>

		<div class="bodymid2">
		
				<div class="topdiv">
					<?php //echo $top_ads;?>
				</div>	
				<div class="tabsBg"><?php echo $tabhtml;?></div>
                <div style="float:right; width:50%; margin-right:0px;">
                            <a href="#" onclick="<?php echo $onclickfunction; ?>" class="linkButton">Add To Basket</a>                           
                            </div>
                            <div class="clear"></div>
				<div class="dbr"></div><br><br>
				<div class="floatmy column">
						<p class="infobox01">Your Center Stone details</p>
						<div class="brownback ml4">
								<div class="w50px floatmy">
									<a href="#" class="underline">Shape :</a>
								</div>
								<div class="floatmy bigcontainerL">
									<?php echo $shape; ?>
								</div>
								<div class="clear"></div>
						</div>
						<div class="brownback ml4">
								<div class="w50px floatmy">
									<a href="#" class="underline">Price:</a>
								</div>
								<div class="floatmy bigcontainerL">$
									<?php echo ($diamond['price']); ?>
								</div>
								<div class="clear"></div>								
						</div>
						<div class="brownback ml4">
								<div class="w50px floatmy">
									<a href="#" class="underline">Cut:</a>
								</div>
								<div class="floatmy bigcontainerL">
									<?php echo $diamond['cut'];?> 
								</div>
								<div class="clear"></div>								
							
						</div>
						<div class="brownback ml4">
								<div class="w50px floatmy">
									<a href="#" class="underline">Color:</a>
								</div>
								<div class="floatmy bigcontainerL">
									<?php echo $diamond['color']?>
								</div>
								<div class="clear"></div>
						</div>
						<div class="brownback ml4">
								<div class="w50px floatmy">
									<a href="#" class="underline">Clarity:</a>
								</div>
								<div class="floatmy bigcontainerL">
									<?php echo $diamond['clarity']?>
								</div>
								<div class="clear"></div>							
						</div>
						<div class="brownback ml4">
								<div class="w50px floatmy">
									<a href="#" class="underline">Carat:</a>
								</div>
								<div class="floatmy bigcontainerL">
									<?php echo $diamond['carat']
									?>
								</div>
								<div class="clear"></div>														
						</div>
						<div class="brownback ml4">
								<div class="w50px floatmy">
									<a href="#" class="underline">Report:</a>
								</div>
								<div class="floatmy bigcontainerL">
									<?php echo $diamond['Cert']
									?>
								</div>
								<div class="clear"></div>														
						</div>
				</div>
				
				<div class="clearfix"></div><br><br>
				<div class="floatmy column">
						<p class=" pad10"> To speak to an experienced jewelry professional, please call <b><? echo $this->config->item('site_owner_number'); ?></b> </P>
				
				</div>
				<div class="clear"></div>
				<div class="hr"></div>
				<div class="dbr"></div>
				<p>Your search result</p>
				
				<input type="hidden" id="hlot" value="<?php echo $hlot;?>">
				<input type="hidden" id="hsettings" value="<?php echo $pendantsettingsid;?>">
				<input type="hidden" id="haddoption" value="<?php echo $addoption;?>">
				
				<div id="sidestoneresult">
					 
				</div>
				
			
		</div>
		<div class="bodybottom"></div><div class="clearfix"></div>

</div>
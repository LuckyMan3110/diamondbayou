<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

<link href="<?php echo config_item('base_url') ?>css/dcverticalmegamenu.css" rel="stylesheet" type="text/css" />
 <script type='text/javascript' src='<?php echo config_item('base_url') ?>js/jquery.hoverIntent.minified.js'></script>
<script type='text/javascript' src='<?php echo config_item('base_url') ?>js/jquery.dcverticalmegamenu.1.3.js'></script>
<script type="text/javascript">
$(document).ready(function($){

	$('#mega-1').dcVerticalMegaMenu({
		rowItems: '3',
		speed: 'fast',
		effect: 'show',
		direction: 'right'
	}); 
});
</script>

<div style="width:190px;">
		<ul id="mega-1" class="mega-menu" style="width: 98%;">	
				
				<li><a href="<?php echo config_item(base_url);?>diamonds/search">Diamonds</a>
						 
							
							<ul >
							
								<li><a href="<?php echo config_item(base_url);?>diamonds/search">Diamond Search</a></li>
                                <li><a href="<?php echo config_item(base_url);?>jewelry/search">Build Your Diamond Studs</a></li>
								<li><a href="<?php echo config_item(base_url);?>diamonds/premium">Premium Diamonds</a></li>
								<li><a href="<?php echo config_item(base_url);?>education/diamond">Learn About Diamonds</a></li>
								<li><a href="<?php echo config_item(base_url);?>engagement/search">Build the Ring of your Dreams </a></li>
								<li><a href="<?php echo config_item(base_url);?>jewelry/build_three_stone_ring">Build your Three-Stone Ring</a></li>
								<li><a href="<?php echo config_item(base_url);?>jewelry/diamondstudearring">Diamond Stud Earrings</a></li>
								<li><a href="<?php echo config_item(base_url);?>jewelry/build_diamond_pendant">Pendant Builder</a></li>
							</ul>
						</li>

						<li ><a href="<?php echo config_item(base_url); ?>engagement"><b class="">Engagement & Wedding</b></a>
							
							<ul>
							<li><a href="<?php echo config_item(base_url); ?>engagement/search">Build the Ring of your Dreams </a></li>
								<li style="display: none;><a href="<?php echo config_item(base_url); ?>engagement/search">Build Your Own Ring</a></li>
								<li><a href="<?php echo config_item(base_url); ?>engagement/ring">Engagement Ring</a></li>
								<li><a href="<?php echo config_item(base_url); ?>diamonds/search">Loose Diamonds</a></li>
								<li><a href="<?php echo config_item(base_url); ?>engagement/engagement_product_settings/3">Wedding Bands</a></li>
								<li><a href="<?php echo config_item(base_url); ?>engagement/engagement_product_settings/21">Anniversary Bands</a></li>								
							</ul>
						</li>
						
						<li ><a href="<?php echo config_item('base_url') ?>jewelleries/index/S/"><b class="">Services</b></a>
							
							<ul>
							<?php 
								$statement = "select * from `dev_ebaycategories` where parent_id = '3291859080'  ";
								$query =$this->db->query($statement);
								$results=$query->result_array();
								for($i=0;$i<count($results);$i++)
								{
									if($results[$i]["category_name"]=="Custom Designs"){
										$pid="3291859081";
									}
									else if($results[$i]["category_name"]=="Appraisals"){
										$pid="3291859082";
									}
									else if($results[$i]["category_name"]=="Engraving"){
										$pid="3291859083";
									}
									else if($results[$i]["category_name"]=="Remounting"){
										$pid="3291859084";
									}
									else if($results[$i]["category_name"]=="Expert on site repair"){
										$pid="3291859085";
									}  
									else if($results[$i]["category_name"]=="Ring Sizing"){
										$pid="3291859086";
									}
									else if($results[$i]["category_name"]=="Professional Cleaning"){
										$pid="3291859087";
									}
									else if($results[$i]["category_name"]=="Watch batteries and repair"){
										$pid="3291859088";
									}
									else if($results[$i]["category_name"]=="Buy"){
										$pid="3291859089";
									}
									else if($results[$i]["category_name"]=="Consign"){
										$pid="3291859100";
									}
									else if($results[$i]["category_name"]=="Trade"){
										$pid="3291859101";
									}
									else if($results[$i]["category_name"]=="Wholesale"){
										$pid="3291859102";
									}
							?>
									<li><a href="<?php echo config_item('base_url') ?>jewelleries/index/S/<?php echo $pid;?>/"><?php echo $results[$i]["category_name"]; ?></a></li>
									
									<?php  
										//$state = "select * from `dev_ebaycategories` where parent_id = '".$pid."'  ";
										//	$qu=$this->db->query($state);
										//	$result=$qu->result_array();
										//for($j=0;$j<count($result);$j++)
										//{
										  ?>
										  <!-- <li><a href="<?php //echo config_item('base_url') ?>jewelleries/index/S/<?php //echo $pid;?>/<?php //echo $result[$j]["category_id"]; ?>/none/none/none"><?php //echo $result[$j]["category_name"]; ?></a></li>-->
										  <?php
										//}
										  ?>
									
							<?php } ?>
								
							</ul>
						</li>
						
						<li style="display: none;" ><a 	href="<?php echo config_item(base_url); ?>engagement/engagement_ring_settings/26527837/addtoring"><b class="">Wedding Rings</b></a>
						
						<ul>
								<li><a href="<?php echo config_item(base_url); ?>engagement/engagement_ring_settings/26527837/addtoring">Wedding Rings</a></li>
								<li><a href="<?php echo config_item(base_url); ?>engagement/engagement_product_settings/3">Wedding Bands</a></li>
										
							</ul>
						</li>
						
						
						<li style="display:none"><a href="<?php echo config_item(base_url); ?>engagement/ring"><b class="">Diamond Jewelry</b></a>
							<ul >
								<li style="display: none;><a href="<?php echo config_item(base_url); ?>engagement/ring">Engagement Ring</a></li>
								<li style="display: none;><a href="<?php echo config_item(base_url); ?>jewelry/build_three_stone_ring">Three-Stone Ring</a></li>
								<li><a href="<?php echo config_item(base_url); ?>engagement/engagement_product_settings/1">Diamond Bracelets</a></li>		
								<li><a href="<?php echo config_item(base_url); ?>engagement/engagement_product_settings/2">Diamond Earrings</a></li>
								<li><a href="<?php echo config_item(base_url); ?>jewelry/build_diamond_pendant">Diamond Pendants</a></li>		
										
							</ul>
						</li>
						
						<li style="display:none"><a href="<?php echo config_item(base_url); ?>diamonds/search"><b class="">Other Products</b></a>
							
							<ul>
								<li><a href="<?php echo config_item(base_url); ?>engagement/engagement_product_settings/21">Ladies Diamond Band & Eternity</a></li>
								<li><a href="<?php echo config_item(base_url); ?>engagement/engagement_product_settings/18">Ladies Diamond Necklaces</a></li>
								<li><a href="<?php echo config_item(base_url); ?>engagement/engagement_product_settings/9">Diamond Cross</a></li>
								<li><a href="<?php echo config_item(base_url); ?>engagement/engagement_product_settings/8">Gemstones</a></li>
								<li><a href="<?php echo config_item(base_url); ?>engagement/engagement_product_settings/7">Diamond Earrings</a></li>
								<li><a href="<?php echo config_item(base_url); ?>engagement/engagement_product_settings/6">Ladies Diamond Bracelets</a></li>
								<li><a href="<?php echo config_item(base_url); ?>engagement/engagement_product_settings/5">Diamond Solitaire Pendants</a></li>
								<li><a href="<?php echo config_item(base_url); ?>engagement/engagement_product_settings/4">Diamond Pendants</a></li>
								<li><a href="<?php echo config_item(base_url); ?>engagement/engagement_product_settings/3">Mens Diamond Bands</a></li>
								<li><a href="<?php echo config_item(base_url); ?>engagement/engagement_product_settings/2">Semi Mounts</a></li>
								<li><a href="<?php echo config_item(base_url); ?>engagement/engagement_product_settings/13">Semi Mounts Yellow Gold</a></li>
								<li><a href="<?php echo config_item(base_url); ?>engagement/engagement_product_settings/12">Semi Mounts White Gold</a></li>
							<li><a href="<?php echo config_item(base_url); ?>engagement/engagement_product_settings/15">Mens Diamond Bands Yellow Gold</a></li>
							<li><a href="<?php echo config_item(base_url); ?>engagement/engagement_product_settings/14">Mens Diamond Bands White Gold</a></li>
								<li><a href="<?php echo config_item(base_url); ?>engagement/engagement_product_settings/17">Princess Diamond Solitaires</a></li>
								<li><a href="<?php echo config_item(base_url); ?>engagement/engagement_product_settings/16">Round Diamond Solitaires</a></li>
								<li><a href="<?php echo config_item(base_url); ?>engagement/engagement_product_settings/27">Diamond & Ruby Gems</a></li>
							<li><a href="<?php echo config_item(base_url); ?>engagement/engagement_product_settings/26">Diamond & Blue Sapphire Gems</a></li>
								<li><a href="<?php echo config_item(base_url); ?>engagement/engagement_product_settings/29">Diamond Cross Yellow Gold</a></li>
								<li><a href="<?php echo config_item(base_url); ?>engagement/engagement_product_settings/28">Diamond Cross White Gold</a></li>
					<li><a href="<?php echo config_item(base_url); ?>engagement/engagement_product_settings/19">Ladies Diamond Necklaces Yellow Gold</a></li>
					<li><a href="<?php echo config_item(base_url); ?>engagement/engagement_product_settings/20">Ladies Diamond Necklaces White Gold</a></li>
						<li><a href="<?php echo config_item(base_url); ?>engagement/engagement_product_settings/31">Ladies Diamond Band 10KT GOLD</a></li>
						<li><a href="<?php echo config_item(base_url); ?>engagement/engagement_product_settings/24">Ladies Diamond Band Platinum</a></li>
						<li><a href="<?php echo config_item(base_url); ?>engagement/engagement_product_settings/23">Ladies Diamond Band 18ct Gold</a></li>
						<li><a href="<?php echo config_item(base_url); ?>engagement/engagement_product_settings/22">Ladies Diamond Band 14ct Gold</a></li>
								
							</ul>
						</li>
						
						
						<li style="display:none" class="';$menuhtml .= ($curcntlr == 'account') ? 'a': ''; $menuhtml .='mainmenu"><a href="<?php echo config_item(base_url); ?>account/signin"><b class="">Your Account</b></a>
						</li>
		
		
		
			
        </ul>
              
      <div style="clear:both;"></div>        
</div>
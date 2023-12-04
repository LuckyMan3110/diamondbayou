<script type="text/javascript">
function submitform()
{
	document.getElementById('form1').submit();
}
</script>
    
    <article class="container_12">
        <section id="sub">
        	 
        </section>
        
        <section id="main" class="engagement">
        	<div id="containt">
                 <div class="share">
                    <span class="text-search">Engagement</span>  
                    <div>
                        <span class='st_sharethis' displayText='Share'></span>
                        <span class='st_pinterest'></span>
                        <span class='st_facebook'></span>
                        <span class='st_twitter'></span>
                        <span class='st_linkedin'></span> 
                        <span class='st_email'></span>
                    </div> 
                 </div>
                 
                  
                 
                  
                 
                 <div class="content">
                 	<div class="engagement-left">
                    	<p class="tt-engagement">REFINE SEARCH</p>
                        <form id="form1" name="form1" method="post" action="<?php echo current_url()?>">
                        <ul class="carat">
                        	<li><strong>Carat Weight</strong></li>
                            <li><input type="radio" name="ctweight" onclick="submitform()" value="0.24"/> 0 - 0.24</li>
                            <li><input type="radio" name="ctweight" onclick="submitform()" value="0.49"/> 0.25 - 0.49</li>
                            <li><input type="radio" name="ctweight" onclick="submitform()" value="0.99"/> 0.50 - 0.99</li>
                            <li><input type="radio" name="ctweight" onclick="submitform()" value="1.49"/> 1.00 - 1.49</li>
                            <li><input type="radio" name="ctweight" onclick="submitform()" value="1.99"/> 1.50 - 1.99</li>
                            <li><input type="radio" name="ctweight" onclick="submitform()" value="2.00"/> 2.00+</li>
                        </ul>
                        
                        <!--<ul class="carat">
                        	<li><strong>Price Range</strong></li>
                            <li><input type="radio" name="price" onclick="submitform()" value="999"/> $0 - $999</li>
                            <li><input type="radio" name="price" onclick="submitform()" value="1999"/> $1,000 - $1,999</li>
                            <li><input type="radio" name="price" onclick="submitform()" value="2999"/> $2,000 - $2,999</li>
                            <li><input type="radio" name="price" onclick="submitform()" value="3999"/> $3,000 - $4,999</li>
                            <li><input type="radio" name="price" onclick="submitform()" value="4999"/> $5,000 +</li> 
                        </ul>-->
                        
                        <ul class="carat">
                        	<li><strong>Metal</strong></li>
                            <li><input type="radio" name="metal" onclick="submitform()" value="Sterling Silver"/> Sterling Silver</li>
                            <li><input type="radio" name="metal" onclick="submitform()" value="14k Yellow Gold"/> 14k Yellow Gold</li>
                            <li><input type="radio" name="metal" onclick="submitform()" value="14k Silver Two-Tone"/> 14k Silver Two-Tone</li>
                            <li><input type="radio" name="metal" onclick="submitform()" value="14k Rose Gold"/> 14k Rose Gold</li>
                            <li><input type="radio" name="metal" onclick="submitform()" value="14k White Gold"/> 14k White Gold</li>
                            <li><input type="radio" name="metal" onclick="submitform()" value="14k Two-tone"/> 14k Two-tone</li>
                            <li><input type="radio" name="metal" onclick="submitform()" value="14k/Silver Two-Tone"/> 14k/Silver Two-Tone</li> 
                        </ul>
                        </form>
                        
                        <hr />
                        
                        <ul class="style">
                        	<li class="style-title">Style</li>
                            <li><a href="#">Three Stone Rings</a></li>
                            <li><a href="#">Engagement Sets</a></li>
                            <li><a href="#">Fancy Rings</a></li>
                            <li><a href="#">Color Stone Rings</a></li>
                            <li><a href="#">Engagement And Anniversary</a></li>
                            <li><a href="#">Wedding Bands</a></li> 
                        </ul>
                        
                        <ul class="category">
                        	<li class="style-title">CATEGORIES</li>
                            <li><a href="#">Engagement</a></li>
                            <li><a href="#">Rings</a></li>
                            <li><a href="#">Necklaes</a></li>
                            <li><a href="#">Bracelets</a></li>
                            <li><a href="#">Earrings</a></li>
                            <li><a href="#">Mens</a></li> 
                            <li><a href="#">Watches</a></li> 
                            <li><a href="#">Clearance</a></li> 
                        </ul>
                        
                        <ul class="style">
                        	<li class="style-title">Designers</li>
                            <li><a href="#">Build Your Own Ring</a></li>
                            <li><a href="#">Build  Your Own Earrings</a></li>
                            <li><a href="#">Build Three Stone Ring</a></li>
                            <li><a href="#">Build  Your Own Pendant</a></li>
                            <li><a href="#">Loose Diamond Search</a></li> 
                        </ul>
                        
                        <div class="bn-ads01">
                        	 <img src="<?php echo config_item('base_url') ?>images/sp01.png" alt=""/>
                        </div>
                        
                        <div class="bn-ads02">
                        	 <img src="<?php echo config_item('base_url') ?>images/sp02.png" alt=""/>
                        </div>
                        
                        <div class="bn-ads02">
                        	 <img src="<?php echo config_item('base_url') ?>images/sp03.png" alt=""/>
                        </div>
                    </div>
                    
                    <div class="engagement-right">
                    	<div class="ads01"><a href="#"><img src="<?php echo config_item('base_url') ?>images/ads1.png" alt=""/></a></div>
                        <div class="engagement-paging">
                        	<ul><?php echo $this->pagination->create_links();?>
                                <!--<li>
									<a class="active" href="#">1</a>                                    
                                </li>
                                <li>
									<a href="#">2</a>                                    
                                </li>
                                <li>
									<a href="#">></a>                                    
                                </li>
                                <li>
									<a href="#">>|</a>                                    
                                </li>-->
                            </ul>
                            
                             <!--<span class="total-page">1 to 33 of 52 (2 Page)</span>-->
                        </div>
						<?php
						if(count($records['result'])>0){
							for($i=0;$i<count($records['result']);$i++)
							{
							 	if($records['result'][$i]['image']!=""){
								$src="http://www.uniquesettings.com".$records['result'][$i]['image'];
								}
								else{
								$src="http://images3.wikia.nocookie.net/__cb20061129213453/muppet/images/7/7c/Noimage.png";				
								}
							 ?>
                        <div class="engagement-product">
                            
                            <div class="image-engagement"><a href="#"><img src="<?php echo $src;?>" alt="engagement product" width="155" hight="144"></a></div>  
                            <div class="price-product">
                            	<p class="ring-engagement"><?php echo $cataname?> - <?php echo $records['result'][$i]['id']; ?></p>
                                <span>Call  414-810-2050  For Prices</span><br>
                                <!--<p class="view"><a href="">View Details</a></p>-->
                            </div>
                            
                        </div><?php } }?>
                         
                    </div>
                 </div> 
            </div>
             
             
        </section>
        
    </article><!--End #Content-->

<script type="text/javascript">
// ON BLUR , ON FOCUS	
function myFocus(element) 
   {
     if (element.value == element.defaultValue) {
       element.value = '';
     }
   }
function myBlur(element) 
{
 if (element.value == '') {
   element.value = element.defaultValue;
 }
 
}

</script>

<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "7a6efe38-c4d4-4f64-a105-5247ba606425", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
</html>

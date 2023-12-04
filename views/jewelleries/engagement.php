<style type="text/css">
#pagination{
    float: left;
    font:11px Tahoma, Verdana, Arial, "Trebuchet MS", Helvetica, sans-serif;
    color:#3d3d3d;
	text-align:center;
    width:100%;
}
#pagination a, #pagination strong{
    list-style-type: none;
    display: inline;
    padding: 5px 8px;
    text-decoration: none; 
    background-color: inherit;
    color: #5D78AE;
    font-weight: bold;
}
#pagination strong{
    color: #ffffff;
    background-color:#5D78AE;
    background-position: top center;
    background-repeat: no-repeat;
    text-decoration: none; 
}
#pagination a:hover{
    color: #ffffff;
    background-color:#5D78AE;
    background-position: top center;
    background-repeat: no-repeat;
    text-decoration: none; 
}
.maindiv{
float:left;
width:100%;
text-align:center;
margin-left:0px;
margin-top:40px;
}

.panels-1 {  
    padding: 0;  
    margin:0 6px 10px 50px;
    float: left; 
    position: relative;
    border: 7px solid #fff;

    width: 325px;  
    height: auto; 
    overflow: hidden;
  
} 
 
.panels-1 .panel-1, .panels-1 .panel-2 {  
    padding: 0;  
    margin:  0;
    height: 210px;
    width: 325px;
}

.panel-2 {
    	position:absolute; 
	display:none; 
	width:325px;
        height:260px;
        bottom: 0;
}

.panel-1 a img {
   width: 325px;
}

.panels-1 .panel-2 h4, .panels-1 .panel-2 h5 {
     font-family: "neuzon-1","neuzon-2", sans-serif;
     text-transform: uppercase;
     position: absolute;
     text-align: center;
     width: 325px;
     color: #f6f5f0;
}

.panels-1 .panel-2 h4 {
     font-size: 18px;
     bottom: 24px;
}

.panels-1 .panel-2 h5, p.soldout {
     font-size: 14px;
     bottom: 80px;
}

.panels-1 .panel-2 h5 span, p.soldout span {
     background-color: #d93645;
     padding: 3px 5px 5px 5px;
-moz-border-radius: 4px; border-radius: 4px; -webkit-border-radius: 4px; 
}
.jprice{
width:100%;
text-align:center;
color:#5D78AE;
font-weight:bold;
}
.jdetail{
width:100%;
text-align:center;
color:#5D78AE;
font-weight:bold;
}
.jtitle{
width:100%;
text-align:center;
color:#5D78AE;
font-weight:bold;
margin:2px 0px 2px 0px;
}
.sortby{
width:100%;
height:60px;
margin-top:40px;
float:left;
color:#00507C;
}
.sorttitle{
width:20%;
float:left;
}
.sorttext{
width:18%;
float:left;
}
.catclass{
width:200px;
float:left;
}
.cattype{
width:200px;
float:left;
}
.cinput{
width:200px;
float:left;
}

</style>
<script type="text/javascript">
function showdetail(id){
	urllink = base_url+'site/uniquedetail/'+id+'/';	
			$.ajax({
                 type: "POST",
                 url:urllink,
                 success: function(response) {
    				$.facebox('<div >' + response + '</div>');
                },
				error: function(){alert('Error ');}
             }) 
	
}

</script>
<?php 

?>
<article class="container_12">
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
                        
                        <ul class="carat">
                        	<li><strong>Carat Weight</strong></li>
                            <li><input type="checkbox"/> 0 - 0.24</li>
                            <li><input type="checkbox"/> 0.25 - 0.49</li>
                            <li><input type="checkbox"/> 0.50 - 0.99</li>
                            <li><input type="checkbox"/> 1.00 - 1.49</li>
                            <li><input type="checkbox"/> 1.50 - 1.99</li>
                            <li><input type="checkbox"/> 2.00+</li>
                        </ul>
                        
                        <ul class="carat">
                        	<li><strong>Price Range</strong></li>
                            <li><input type="checkbox"/> $0 - $999</li>
                            <li><input type="checkbox"/> $1,000 - $1,999</li>
                            <li><input type="checkbox"/> $2,000 - $2,999</li>
                            <li><input type="checkbox"/> $3,000 - $4,999</li>
                            <li><input type="checkbox"/> $5,000 +</li> 
                        </ul>
                        
                        <ul class="carat">
                        	<li><strong>Metal</strong></li>
                            <li><input type="checkbox"/> Sterling Silver</li>
                            <li><input type="checkbox"/> 14k Yellow Gold</li>
                            <li><input type="checkbox"/> 14k Silver Two-Tone</li>
                            <li><input type="checkbox"/> 14k Rose Gold</li>
                            <li><input type="checkbox"/> 14k White Gold</li>
                            <li><input type="checkbox"/> 14k Two-tone</li>
                            <li><input type="checkbox"/> 14k/Silver Two-Tone</li> 
                        </ul>
                        
                        <hr />
                        
                        <ul class="style">
                        	<li class="style-title">Style</li>
                            <li><a href="#">Three Stone Rings » </a></li>
                            <li><a href="#">Engagement Sets » </a></li>
                            <li><a href="#">Fancy Rings » </a></li>
                            <li><a href="#">Color Stone Rings » </a></li>
                            <li><a href="#">Engagement And Anniversary » </a></li>
                            <li><a href="#">Wedding Bands » </a></li> 
                        </ul>
                        
                        <ul class="category">
                        	<li class="style-title">CATEGORIES</li>
                            <li><a href="#">Engagement » </a></li>
                            <li><a href="#">Rings »  </a></li>
                            <li><a href="#">Necklaes »  </a></li>
                            <li><a href="#">Bracelets »  </a></li>
                            <li><a href="#">Earrings »  </a></li>
                            <li><a href="#">Mens » </a></li> 
                            <li><a href="#">Watches » </a></li> 
                            <li><a href="#">Clearance » </a></li> 
                        </ul>
                        
                        <ul class="style">
                        	<li class="style-title">Designers</li>
                            <li><a href="#">Build Your Own Ring » </a></li>
                            <li><a href="#">Build  Your Own Earrings » </a></li>
                            <li><a href="#">Build Three Stone Ring » </a></li>
                            <li><a href="#">Build  Your Own Pendant » </a></li>
                            <li><a href="#">Loose Diamond Search  » </a></li> 
                        </ul>
                        
                        <div class="bn-ads01">
                        	 <img src="<?php echo $this->config->item('base_url');?>images/sp01.png" alt=""/>
                        </div>
                        
                        <div class="bn-ads02">
                        	 <img src="<?php echo $this->config->item('base_url');?>images/sp02.png" alt=""/>
                        </div>
                        
                        <div class="bn-ads02">
                        	 <img src="<?php echo $this->config->item('base_url');?>images/sp03.png" alt=""/>
                        </div>
                    </div>
                    
                    <div class="engagement-right">
                    	<div class="ads01"><a href="#"><img src="<?php echo $this->config->item('base_url');?>images/ads1.png" alt=""/></a></div>
                        <div class="engagement-paging">
                        	<ul>
                                <li>
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
                                </li>
                            </ul>
                            
                             <span class="total-page">1 to 33 of 52 (2 Page)</span>
                        </div>
                        <div class="engagement-product">
                            
                            <div class="image-engagement"><a href="#"><img src="<?php echo $this->config->item('base_url');?>images/product.png" alt=""/></a></div>  
                            <div class="price-product">
                            	<p class="ring-engagement">Ring - 00000</p>
                                <span>Price : $837.00</span><br>
                                3EZ = $279.00<br>
                                5EZ = $167.40<br>
                                <p class="view"><a href="<?php echo $this->config->item('base_url');?>jewelleries/engagementView">View Details</a></p>
                            </div>
                            
                        </div>
                        <div class="engagement-product">
                            
                            <div class="image-engagement"><a href="#"><img src="<?php echo $this->config->item('base_url');?>images/product.png" alt=""/></a></div>  
                            <div class="price-product">
                            	<p class="ring-engagement">Ring - 00000</p>
                                <span>Price : $837.00</span><br>
                                3EZ = $279.00<br>
                                5EZ = $167.40<br>
                                <p class="view"><a href="<?php echo $this->config->item('base_url');?>jewelleries/engagementView">View Details</a></p>
                            </div>
                            
                        </div>
                        <div class="engagement-product">
                            
                            <div class="image-engagement"><a href="#"><img src="<?php echo $this->config->item('base_url');?>images/product.png" alt=""/></a></div>  
                            <div class="price-product">
                            	<p class="ring-engagement">Ring - 00000</p>
                                <span>Price : $837.00</span><br>
                                3EZ = $279.00<br>
                                5EZ = $167.40<br>
                                <p class="view"><a href="<?php echo $this->config->item('base_url');?>jewelleries/engagementView">View Details</a></p>
                            </div>
                            
                        </div>
                        
                        <div class="engagement-product">
                            
                            <div class="image-engagement"><a href="#"><img src="<?php echo $this->config->item('base_url');?>images/product.png" alt=""/></a></div>  
                            <div class="price-product">
                            	<p class="ring-engagement">Ring - 00000</p>
                                <span>Price : $837.00</span><br>
                                3EZ = $279.00<br>
                                5EZ = $167.40<br>
                                <p class="view"><a href="<?php echo $this->config->item('base_url');?>jewelleries/engagementView">View Details</a></p>
                            </div>
                            
                        </div>
                        <div class="engagement-product">
                            
                            <div class="image-engagement"><a href="#"><img src="<?php echo $this->config->item('base_url');?>images/product.png" alt=""/></a></div>  
                            <div class="price-product">
                            	<p class="ring-engagement">Ring - 00000</p>
                                <span>Price : $837.00</span><br>
                                3EZ = $279.00<br>
                                5EZ = $167.40<br>
                                <p class="view"><a href="<?php echo $this->config->item('base_url');?>jewelleries/engagementView">View Details</a></p>
                            </div>
                            
                        </div>
                        <div class="engagement-product">
                            
                            <div class="image-engagement"><a href="#"><img src="<?php echo $this->config->item('base_url');?>images/product.png" alt=""/></a></div>  
                            <div class="price-product">
                            	<p class="ring-engagement">Ring - 00000</p>
                                <span>Price : $837.00</span><br>
                                3EZ = $279.00<br>
                                5EZ = $167.40<br>
                                <p class="view"><a href="<?php echo $this->config->item('base_url');?>jewelleries/engagementView">View Details</a></p>
                            </div>
                            
                        </div>
                        
                        <div class="engagement-product">
                            
                            <div class="image-engagement"><a href="#"><img src="<?php echo $this->config->item('base_url');?>images/product.png" alt=""/></a></div>  
                            <div class="price-product">
                            	<p class="ring-engagement">Ring - 00000</p>
                                <span>Price : $837.00</span><br>
                                3EZ = $279.00<br>
                                5EZ = $167.40<br>
                                <p class="view"><a href="<?php echo $this->config->item('base_url');?>jewelleries/engagementView">View Details</a></p>
                            </div>
                            
                        </div>
                        <div class="engagement-product">
                            
                            <div class="image-engagement"><a href="#"><img src="<?php echo $this->config->item('base_url');?>images/product.png" alt=""/></a></div>  
                            <div class="price-product">
                            	<p class="ring-engagement">Ring - 00000</p>
                                <span>Price : $837.00</span><br>
                                3EZ = $279.00<br>
                                5EZ = $167.40<br>
                                <p class="view"><a href="<?php echo $this->config->item('base_url');?>jewelleries/engagementView">View Details</a></p>
                            </div>
                            
                        </div>
                        <div class="engagement-product">
                            
                            <div class="image-engagement"><a href="#"><img src="<?php echo $this->config->item('base_url');?>images/product.png" alt=""/></a></div>  
                            <div class="price-product">
                            	<p class="ring-engagement">Ring - 00000</p>
                                <span>Price : $837.00</span><br>
                                3EZ = $279.00<br>
                                5EZ = $167.40<br>
                                <p class="view"><a href="<?php echo $this->config->item('base_url');?>jewelleries/engagementView">View Details</a></p>
                            </div>
                            
                        </div>
                        
                        <div class="engagement-product">
                            
                            <div class="image-engagement"><a href="#"><img src="<?php echo $this->config->item('base_url');?>images/product.png" alt=""/></a></div>  
                            <div class="price-product">
                            	<p class="ring-engagement">Ring - 00000</p>
                                <span>Price : $837.00</span><br>
                                3EZ = $279.00<br>
                                5EZ = $167.40<br>
                                <p class="view"><a href="<?php echo $this->config->item('base_url');?>jewelleries/engagementView">View Details</a></p>
                            </div>
                            
                        </div>
                        <div class="engagement-product">
                            
                            <div class="image-engagement"><a href="#"><img src="<?php echo $this->config->item('base_url');?>images/product.png" alt=""/></a></div>  
                            <div class="price-product">
                            	<p class="ring-engagement">Ring - 00000</p>
                                <span>Price : $837.00</span><br>
                                3EZ = $279.00<br>
                                5EZ = $167.40<br>
                                <p class="view"><a href="<?php echo $this->config->item('base_url');?>jewelleries/engagementView">View Details</a></p>
                            </div>
                            
                        </div>
                        <div class="engagement-product">
                            
                            <div class="image-engagement"><a href="#"><img src="<?php echo $this->config->item('base_url');?>images/product.png" alt=""/></a></div>  
                            <div class="price-product">
                            	<p class="ring-engagement">Ring - 00000</p>
                                <span>Price : $837.00</span><br>
                                3EZ = $279.00<br>
                                5EZ = $167.40<br>
                                <p class="view"><a href="<?php echo $this->config->item('base_url');?>jewelleries/engagementView">View Details</a></p>
                            </div>
                            
                        </div>
                        
                        <div class="engagement-product">
                            
                            <div class="image-engagement"><a href="#"><img src="<?php echo $this->config->item('base_url');?>images/product.png" alt=""/></a></div>  
                            <div class="price-product">
                            	<p class="ring-engagement">Ring - 00000</p>
                                <span>Price : $837.00</span><br>
                                3EZ = $279.00<br>
                                5EZ = $167.40<br>
                                <p class="view"><a href="<?php echo $this->config->item('base_url');?>jewelleries/engagementView">View Details</a></p>
                            </div>
                            
                        </div>
                        <div class="engagement-product">
                            
                            <div class="image-engagement"><a href="#"><img src="<?php echo $this->config->item('base_url');?>images/product.png" alt=""/></a></div>  
                            <div class="price-product">
                            	<p class="ring-engagement">Ring - 00000</p>
                                <span>Price : $837.00</span><br>
                                3EZ = $279.00<br>
                                5EZ = $167.40<br>
                                <p class="view"><a href="<?php echo $this->config->item('base_url');?>jewelleries/engagementView">View Details</a></p>
                            </div>
                            
                        </div>
                        <div class="engagement-product">
                            
                            <div class="image-engagement"><a href="#"><img src="<?php echo $this->config->item('base_url');?>images/product.png" alt=""/></a></div>  
                            <div class="price-product">
                            	<p class="ring-engagement">Ring - 00000</p>
                                <span>Price : $837.00</span><br>
                                3EZ = $279.00<br>
                                5EZ = $167.40<br>
                                <p class="view"><a href="<?php echo $this->config->item('base_url');?>jewelleries/engagementView">View Details</a></p>
                            </div>
                            
                        </div>
                        
                        <div class="engagement-product">
                            
                            <div class="image-engagement"><a href="#"><img src="<?php echo $this->config->item('base_url');?>images/product.png" alt=""/></a></div>  
                            <div class="price-product">
                            	<p class="ring-engagement">Ring - 00000</p>
                                <span>Price : $837.00</span><br>
                                3EZ = $279.00<br>
                                5EZ = $167.40<br>
                                <p class="view"><a href="<?php echo $this->config->item('base_url');?>jewelleries/engagementView">View Details</a></p>
                            </div>
                            
                        </div>
                        <div class="engagement-product">
                            
                            <div class="image-engagement"><a href="#"><img src="<?php echo $this->config->item('base_url');?>images/product.png" alt=""/></a></div>  
                            <div class="price-product">
                            	<p class="ring-engagement">Ring - 00000</p>
                                <span>Price : $837.00</span><br>
                                3EZ = $279.00<br>
                                5EZ = $167.40<br>
                                <p class="view"><a href="<?php echo $this->config->item('base_url');?>jewelleries/engagementView">View Details</a></p>
                            </div>
                            
                        </div>
                        <div class="engagement-product">
                            
                            <div class="image-engagement"><a href="#"><img src="<?php echo $this->config->item('base_url');?>images/product.png" alt=""/></a></div>  
                            <div class="price-product">
                            	<p class="ring-engagement">Ring - 00000</p>
                                <span>Price : $837.00</span><br>
                                3EZ = $279.00<br>
                                5EZ = $167.40<br>
                                <p class="view"><a href="<?php echo $this->config->item('base_url');?>jewelleries/engagementView">View Details</a></p>
                            </div>
                            
                        </div>
                         
                    </div>
                 </div> 
            </div>
             
             
        </section>
        
    </article>
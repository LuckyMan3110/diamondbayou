
    
    <article class="container_12">
        <section id="sub">
        	 <ul>
            	<li><a href="#">Home</a></li>
                <li>></li>
                <li><a href="#">Necklaces</a></li> 
            </ul> 
        </section>
        
        <section id="main" class="earrings">
        	<div id="containt">
                 <div class="share">
                    <span class="text-search">Necklaces</span>  
                    <!--<div>
                        <span class='st_sharethis' displayText='Share'></span>
                        <span class='st_pinterest'></span>
                        <span class='st_facebook'></span>
                        <span class='st_twitter'></span>
                        <span class='st_linkedin'></span> 
                        <span class='st_email'></span>
                    </div> -->
                 </div> 
                 
                 <div class="content">
                 	<div class="earrings-left">
                    	<div class="funny">
                        	<!--<p>Big and chunky describes diamond necklaces which are ultra chic on the fashion scene. Cyjewelers. offers fabulous women's necklaces with a stylish and feminine look in large construction or thin delicate look which is also a fashion forward style.</p>
                            <p>Fabulous necklace styles offered include twisted beads, romantic ribbon closures and ultra popular chain styles.</p>-->
                            <p><center><img src="<?php echo config_item('base_url') ?>images/necklaces-product03.png" alt=""/></center></p>
                        </div>
                        
                        <img src="<?php echo config_item('base_url') ?>images/ads2.png" alt=""/>
                    </div>
                    <div class="earrings-right">
                         <?php
						$statement = "SELECT DISTINCT `Metal_Desc` FROM `dev_qg` WHERE `Description` LIKE '%".$this->uri->segment(3)."%'";

						$query =$this->db->query($statement);
						$result = $query->result_array();
						foreach($result as $allsub)// returns an object of the first row
						{ $journalName = preg_replace('/\s+/', '_', $allsub['Metal_Desc']);?>
                        <div class="earrings-product">
                            <div class="name-inner">
                                <?php echo $allsub['Metal_Desc'] ?>
								<?php if($allsub['Metal_Desc']=='14k Yellow Gold') $thumbimg = '14kyellow.JPG';
									if($allsub['Metal_Desc']=='Sterling Silver') $thumbimg = 'sterling silver.JPG';
									if($allsub['Metal_Desc']=='14k Rose Gold') $thumbimg = '14krosegold.JPG';
									if($allsub['Metal_Desc']=='14k White Gold') $thumbimg = '14whitegold.jpg';
									if($allsub['Metal_Desc']=='14k Silver Two-Tone') $thumbimg = '14k silver two tone.JPG';
									if($allsub['Metal_Desc']=='14k/Silver Two-Tone') $thumbimg = '14krosegold.JPG';
									if($allsub['Metal_Desc']=='Gemstone Fashion') $thumbimg = 'gemstone fashion.1.jpg';
									if($allsub['Metal_Desc']=='Diamond Fashion') $thumbimg = 'diamondfashion.jpg';
									if($allsub['Metal_Desc']=='Metal Fashion') $thumbimg = 'metalfashion.jpg';
									if($allsub['Metal_Desc']=='Mountings') $thumbimg = 'mountings.jpg';
								?>
                                <p><a href="<?php echo config_item('base_url') ?>jewelleries/getstullerfur/<?php echo $journalName; ?>/<?php echo $this->uri->segment(3);?>/">VIEW</a></p>
                            </div>
                            <div class="image-inner image-necklaces"><a href="<?php echo config_item('base_url') ?>jewelleries/getstullerfur/<?php echo $journalName; ?>/<?php echo $this->uri->segment(3);?>/"><img src="<?php echo config_item('base_url') ?>images/Necklaces-view/<?php echo $thumbimg ?>" alt="" width="185px" height="121px"/></a></div> 
                            
                        </div>
			<?php } ?>
			<?php $statement = "SELECT DISTINCT `MerchandisingCategory1` FROM `dev_stuller` WHERE `MerchandisingCategory2` LIKE '%".str_replace('_', ' ', $this->uri->segment(3))."%'";

			$query =$this->db->query($statement);
			$result = $query->result_array();
			foreach($result as $allsub)// returns an object of the first row
			{ $journalName = preg_replace('/\s+/', '_', $allsub['MerchandisingCategory1']);?>
                        
                        <div class="earrings-product">
                            <div class="name-inner">
                                <?php echo $allsub['MerchandisingCategory1'] ?>
								<?php if($allsub['MerchandisingCategory1']=='14k Yellow Gold') $thumbimg = '14kyellow.JPG';
									if($allsub['MerchandisingCategory1']=='Sterling Silver') $thumbimg = 'sterling silver.JPG';
									if($allsub['MerchandisingCategory1']=='14k Rose Gold') $thumbimg = '14krosegold.JPG';
									if($allsub['MerchandisingCategory1']=='14k White Gold') $thumbimg = '14whitegold.jpg';
									if($allsub['MerchandisingCategory1']=='14k Silver Two-Tone') $thumbimg = '14k silver two tone.JPG';
									if($allsub['MerchandisingCategory1']=='14k/Silver Two-Tone') $thumbimg = '14krosegold.JPG';
									if($allsub['MerchandisingCategory1']=='Gemstone Fashion') $thumbimg = 'gemstone fashion.1.jpg';
									if($allsub['MerchandisingCategory1']=='Diamond Fashion') $thumbimg = 'diamondfashion.jpg';
									if($allsub['MerchandisingCategory1']=='Metal Fashion') $thumbimg = 'metalfashion.jpg';
									if($allsub['MerchandisingCategory1']=='Mountings') $thumbimg = 'mountings.jpg';
								?>
                                <p><a href="<?php echo config_item('base_url') ?>jewelleries/getmystullerfurwithsub/<?php echo $journalName; ?>/<?php echo $this->uri->segment(3);?>/">VIEW</a></p>
                            </div>
                            <div class="image-inner image-necklaces"><a href="<?php echo config_item('base_url') ?>jewelleries/getmystullerfurwithsub/<?php echo $journalName; ?>/<?php echo $this->uri->segment(3);?>/"><img src="<?php echo config_item('base_url') ?>images/Necklaces-view/<?php echo $thumbimg ?>" alt="" width="185px" height="121px"/></a></div> 
                            
                        </div>
			<?php } ?>
                         
                    </div>
                    
                    <div class="note-earrings clearfix">
                    	<!--<h4>Necklaces in the City</h4>
                        <p>Carrie Bradshaw has become the icon of style for the modern women and very often they watch the favorite “Sex and the City” for hundred times with the only one idea – to copy her dress, her bag or her pair of shoes. If your girlfriend or wife is young, attractive and classy, be sure she likes the style of Carrie and will be so happy if you give her a diamond necklace like Carrie was given in the last episode of the serial. Her lover from Russia gave it to her to make her happy.</p>-->
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

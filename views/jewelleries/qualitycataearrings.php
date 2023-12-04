
    
    <article class="container_12">
        <section id="sub">
        	 
        </section>
        
        <section id="main" class="earrings">
        	<div id="containt">
                 <div class="share">
                    <span class="text-search"><?php echo $cataname ?></span>  
                   <!-- <div>
                        <span class='st_sharethis' displayText='Share'></span>
                        <span class='st_pinterest'></span>
                        <span class='st_facebook'></span>
                        <span class='st_twitter'></span>
                        <span class='st_linkedin'></span> 
                        <span class='st_email'></span>
                    </div> -->
                 </div> 
                 
                 <div class="content1">
                 	<div class="earrings-left">
                    	<div class="funny">
                        	<!--<p>Funny and unusual earrings with diamonds for women are liked by optimistic people. It goes without saying that decorations with diamonds are preferred by successful people just because of their great price.</p>
                            <p>The price of earrings with diamonds is impressive even if you get the stone just of 3 carats, not more. Every man, who cares about his wife or girlfriend, has to know that it is very pleasant to get diamonds as a gift.</p>-->
                            <p><img src="<?php echo $this->config->item('base_url');?>images/img-earrings.png" alt="earrings"/></p>
                        </div>
                        
                        <img src="<?php echo $this->config->item('base_url');?>images/ads2.png" alt=""/>
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
								<?php if($allsub['Metal_Desc']=='14k Yellow Gold') $thumbimg = '14k yellow gold.jpg';
									if($allsub['Metal_Desc']=='Sterling Silver') $thumbimg = '14krosegold.JPG';
									if($allsub['Metal_Desc']=='14k Rose Gold') $thumbimg = '14krosegold.JPG';
									if($allsub['Metal_Desc']=='14k White Gold') $thumbimg = '14 white gold.jpg';
									if($allsub['Metal_Desc']=='14k Silver Two-Tone') $thumbimg = '14k silver two tone.JPG';
									if($allsub['Metal_Desc']=='14k/Silver Two-Tone') $thumbimg = '14krosegold.JPG';
									if($allsub['Metal_Desc']=='Gemstone Fashion') $thumbimg = 'gemstonefashion.jpg';
									if($allsub['Metal_Desc']=='Diamond Fashion') $thumbimg = 'diamondfashion.jpg';
									if($allsub['Metal_Desc']=='Metal Fashion') $thumbimg = 'metalfashion.jpg';
									if($allsub['Metal_Desc']=='Mountings') $thumbimg = 'mountings.jpg';
								?>
                                <p><a href="<?php echo config_item('base_url') ?>jewelleries/getstullerfur/<?php echo $journalName; ?>/<?php echo $this->uri->segment(3);?>/">VIEW</a></p>
                            </div>
                            <div class="image-inner"><a href="<?php echo config_item('base_url') ?>jewelleries/getstullerfur/<?php echo $journalName; ?>/<?php echo $this->uri->segment(3);?>/"><img src="<?php echo $this->config->item('base_url');?>images/<?php echo $thumbimg ?>" alt="" width="185px" height="121px"/></a></div> 
                            
                        </div>
						<?php } ?>
						<?php 
						 $statement = "SELECT DISTINCT `MerchandisingCategory1` FROM `dev_stuller` WHERE `MerchandisingCategory2` LIKE '%".str_replace('_', ' ', $this->uri->segment(3))."%'";

						$query =$this->db->query($statement);
						$result = $query->result_array();
						foreach($result as $allsub)// returns an object of the first row
						{ $journalName = preg_replace('/\s+/', '_', $allsub['MerchandisingCategory1']);?>
                        <div class="earrings-product">
                            <div class="name-inner">
                                <?php echo $allsub['MerchandisingCategory1'] ?>
								<?php if($allsub['MerchandisingCategory1']=='14k Yellow Gold') $thumbimg = '14k yellow gold.jpg';
									if($allsub['MerchandisingCategory1']=='Sterling Silver') $thumbimg = '14krosegold.JPG';
									if($allsub['MerchandisingCategory1']=='14k Rose Gold') $thumbimg = '14krosegold.JPG';
									if($allsub['MerchandisingCategory1']=='14k White Gold') $thumbimg = '14 white gold.jpg';
									if($allsub['MerchandisingCategory1']=='14k Silver Two-Tone') $thumbimg = '14k silver two tone.JPG';
									if($allsub['MerchandisingCategory1']=='14k/Silver Two-Tone') $thumbimg = '14krosegold.JPG';
									if($allsub['MerchandisingCategory1']=='Gemstone Fashion') $thumbimg = 'gemstonefashion.jpg';
									if($allsub['MerchandisingCategory1']=='Diamond Fashion') $thumbimg = 'diamondfashion.jpg';
									if($allsub['MerchandisingCategory1']=='Metal Fashion') $thumbimg = 'metalfashion.jpg';
									if($allsub['MerchandisingCategory1']=='Mountings') $thumbimg = 'mountings.jpg';
								?>
                                <p><a href="<?php echo config_item('base_url') ?>jewelleries/getmystullerfurwithsub/<?php echo $journalName; ?>/<?php echo $this->uri->segment(3);?>/">VIEW</a></p>
                            </div>
                            <div class="image-inner"><a href="<?php echo config_item('base_url') ?>jewelleries/getmystullerfurwithsub/<?php echo $journalName; ?>/<?php echo $this->uri->segment(3);?>/"><img src="<?php echo $this->config->item('base_url');?>images/<?php echo $thumbimg ?>" alt="" width="185px" height="121px"/></a></div> 
                            
                        </div>
						<?php } ?>
                         
                    </div>
                    
                    <div class="note-earrings clearfix">
                    	<!--<h4>Earrings to Make Her Happy</h4>
                        <p>Do you want to make your wife or girlfriend happy? Then get a diamond for her. This gem is very strong and that’s why a man in love usually gives it to his woman to show that his passion is as strong as a diamond. If your imagination is enough only for a ring with this stone, you have to look around and get earrings for her.</p>-->
                    </div>
                 </div> 
            </div>
             
             
        </section>
        
    </article><!--End #Content-->
	 
</body>

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

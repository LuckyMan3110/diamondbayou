
    
    <article class="container_12" id="main-body-a">
        <section id="sub">
        	 
        </section>
        
        <section id="main" class="ring">
        	<div id="containt">
                 <div class="share">
                    <span class="text-search">Ring</span>  
                   <!-- <div>
                        <span class='st_sharethis' displayText='Share'></span>
                        <span class='st_pinterest'></span>
                        <span class='st_facebook'></span>
                        <span class='st_twitter'></span>
                        <span class='st_linkedin'></span> 
                        <span class='st_email'></span>
                    </div>-->
                    
                  <!--  <div class="ads"><a href="#"><img src="<?php //echo config_item('base_url') ?>images/ads.png" alt=""/></a></div> -->
                 </div>
                  
                 
                 <div class="content1">
                 	<?php
						$statement = "SELECT DISTINCT `Metal_Desc` FROM `dev_qg` WHERE `Description` LIKE '%".$this->uri->segment(3)."%'";

						$query =$this->db->query($statement);
						$result = $query->result_array();
						foreach($result as $allsub)// returns an object of the first row
						{ $journalName = preg_replace('/\s+/', '_', $allsub['Metal_Desc']);?>
                        <div class="inner-product">
                            <div class="name-inner">
                                <?php echo $allsub['Metal_Desc'] ?>
								<?php if($allsub['Metal_Desc']=='Sterling Silver') $thumbimg = 'sterlng silver.JPG';
									if($allsub['Metal_Desc']=='14k Yellow Gold') $thumbimg = '14k yellowgold.JPG';
									if($allsub['Metal_Desc']=='14k Silver Two-Tone') $thumbimg = '14k silver two tone.JPG';
									if($allsub['Metal_Desc']=='14k Rose Gold') $thumbimg = 'Sterling Silver.JPG';
									if($allsub['Metal_Desc']=='14k White Gold') $thumbimg = '14whitegold.JPG';
									if($allsub['Metal_Desc']=='14k Two-tone') $thumbimg = '14k two tone.JPG';
									if($allsub['Metal_Desc']=='Gemstone Fashion') $thumbimg = 'gemstone fashion.jpg';
									if($allsub['Metal_Desc']=='Wedding Bands') $thumbimg = 'wedding bands.jpg';
									if($allsub['Metal_Desc']=='Diamond Fashion') $thumbimg = 'diamondfashion.jpg';
									if($allsub['Metal_Desc']=='Engagement And Anniversary') $thumbimg = 'engagement anniversary.jpg';
									if($allsub['Metal_Desc']=='Metal Fashion') $thumbimg = 'metal fashion.jpg';
									if($allsub['Metal_Desc']=='Mountings') $thumbimg = 'mounding.jpg';
								?>
                                <p><a href="<?php echo config_item('base_url') ?>jewelleries/getstullerfur/<?php echo $journalName; ?>/<?php echo $this->uri->segment(3);?>/">VIEW</a></p>
                            </div>
                            <div class="image-inner"><a href="<?php echo config_item('base_url') ?>jewelleries/getstullerfur/<?php echo $journalName; ?>/<?php echo $this->uri->segment(3);?>/"><img src="<?php echo config_item('base_url') ?>images/Rings-view/<?php echo $thumbimg ?>" alt="" width="185px" height="121px"/></a></div> 
                            
                        </div>
			<?php } ?>
			<?php $statement = "SELECT DISTINCT `MerchandisingCategory1` FROM `dev_stuller` WHERE `MerchandisingCategory2` LIKE '%".str_replace('_', ' ', $this->uri->segment(3))."%'";

			$query =$this->db->query($statement);
			$result = $query->result_array();
			foreach($result as $allsub)// returns an object of the first row
			{ $journalName = preg_replace('/\s+/', '_', $allsub['MerchandisingCategory1']);?>
                        
                        <div class="inner-product">
                            <div class="name-inner">
                                <?php echo $allsub['MerchandisingCategory1'] ?>
								<?php if($allsub['MerchandisingCategory1']=='Sterling Silver') $thumbimg = 'sterlng silver.JPG';
									if($allsub['MerchandisingCategory1']=='14k Yellow Gold') $thumbimg = '14k yellowgold.JPG';
									if($allsub['MerchandisingCategory1']=='14k Silver Two-Tone') $thumbimg = '14k silver two tone.JPG';
									if($allsub['MerchandisingCategory1']=='14k Rose Gold') $thumbimg = 'Sterling Silver.JPG';
									if($allsub['MerchandisingCategory1']=='14k White Gold') $thumbimg = '14whitegold.JPG';
									if($allsub['MerchandisingCategory1']=='14k Two-tone') $thumbimg = '14k two tone.JPG';
									if($allsub['MerchandisingCategory1']=='Gemstone Fashion') $thumbimg = 'gemstone fashion.jpg';
									if($allsub['MerchandisingCategory1']=='Wedding Bands') $thumbimg = 'wedding bands.jpg';
									if($allsub['MerchandisingCategory1']=='Diamond Fashion') $thumbimg = 'diamondfashion.jpg';
									if($allsub['MerchandisingCategory1']=='Engagement And Anniversary') $thumbimg = 'engagement anniversary.jpg';
									if($allsub['MerchandisingCategory1']=='Metal Fashion') $thumbimg = 'metal fashion.jpg';
									if($allsub['MerchandisingCategory1']=='Mountings') $thumbimg = 'mounding.jpg';
								?>
                                <p><a href="<?php echo config_item('base_url') ?>jewelleries/getmystullerfurwithsub/<?php echo $journalName; ?>/<?php echo $this->uri->segment(3);?>/">VIEW</a></p>
                            </div>
                            <div class="image-inner"><a href="<?php echo config_item('base_url') ?>jewelleries/getmystullerfurwithsub/<?php echo $journalName; ?>/<?php echo $this->uri->segment(3);?>/"><img src="<?php echo config_item('base_url') ?>images/Rings-view/<?php echo $thumbimg ?>" alt="" width="185px" height="121px"/></a></div> 
                            
                        </div>
			<?php } ?>
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

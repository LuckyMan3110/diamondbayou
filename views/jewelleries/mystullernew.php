
    
    <article class="container_12">
        <section id="sub">
        	 
        </section>
        
        <section id="main" class="clearance">
        	<div id="containt">
                 <div class="share">
                    <span class="text-search"><?php echo $cataname ?></span>  
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
                 	<div class="earrings-left clearance-left">
                    	<div class="funny sale">
                        	<p>Jewelry is always a great way to invest money. It is popular all the time and it is always in price, irrespective of the economy situation, since precious metals and stones are valuable due to their physical characteristics like hardness alongside with jewelry beauty and aesthetical aspects.</p>
                            <p>Besides investing, jewelry may help you to earn money. Purchasing wholesale jewelry is a fair method to start your own business if you don not currently run one.</p>
                            <p><img src="<?php echo $this->config->item('base_url');?>images/sale.png" alt=""/></p>
                            <h5>What Makes Wholesale Jewelry Cheap</h5>
                            <p>It is a well-known fact that items bought in bulk are much cheaper that those bought in retail, although they are of the same quality and provided by a same jewelry manufacturer.</p>
                            <p>Wholesale jewelry in New York does not have heavy price tags since middlemen are eliminated from the purchase process. You simply buy the items from the direct manufacturer, paying the lowest price for these.</p>
                        </div>
                        
                        <img src="<?php echo $this->config->item('base_url');?>images/ads2.png" alt=""/>
                    </div>
                    <div class="earrings-right">
					<?php 

					$statement = "SELECT DISTINCT `MerchandisingCategory1` FROM `dev_stuller`";

					$query =$this->db->query($statement);
					$result = $query->result_array();
					foreach($result as $allsub)// returns an object of the first row
					{
						$journalName = preg_replace('/\s+/', '_', $allsub['MerchandisingCategory1']);
					?>
                        <div class="earrings-product">
                            <div class="name-inner">
                                <?php echo $allsub['MerchandisingCategory1']; ?>
                                <p><a href="<?php echo config_item('base_url') ?>jewelleries/getmystullerfur/<?php echo $journalName; ?>/">VIEW</a></p>
                            </div>
                            <div class="image-inner"><a href="<?php echo config_item('base_url') ?>jewelleries/getmystullerfur/<?php echo $journalName; ?>/"><img src="<?php echo $this->config->item('base_url');?>images/clearance-product01.png" alt=""/></a></div> 
                            
                        </div><?php }?><!--
                        <div class="earrings-product">
                            <div class="name-inner">
                                Rings
                                <p><a href="<?php echo config_item('base_url') ?>jewelleries/getjewleries/Ring/">VIEW</a></p>
                            </div>
                            <div class="image-inner"><a href="<?php echo config_item('base_url') ?>jewelleries/getjewleries/Ring/"><img src="<?php echo config_item('base_url') ?>images/clearance-product01.png" alt=""/></a></div> 
                            
                        </div>
                        <div class="earrings-product">
                            <div class="name-inner">
                                Earrings 
                                <p><a href="<?php echo config_item('base_url')?>jewelleries/getjewleries/Earring/">VIEW</a></p>
                            </div>
                            <div class="image-inner"><a href="<?php echo config_item('base_url')?>jewelleries/getjewleries/Earring/"><img src="<?php echo config_item('base_url')?>images/clearance-product01.png" alt=""/></a></div> 
                            
                        </div> 
                        <div class="earrings-product">
                            <div class="name-inner">
                                Pendants
                                <p><a href="<?php echo config_item('base_url') ?>jewelleries/getjewleries/Pendant/">VIEW</a></p>
                            </div>
                            <div class="image-inner"><a href="<?php echo config_item('base_url') ?>jewelleries/getjewleries/Pendant/"><img src="<?php echo config_item('base_url') ?>images/clearance-product01.png" alt=""/></a></div> 
                            
                        </div>
                        <div class="earrings-product">
                            <div class="name-inner">
                                Necklaces
                                <p><a href="<?php echo config_item('base_url') ?>jewelleries/getjewleries/Necklace/">VIEW</a></p>
                            </div>
                            <div class="image-inner"><a href="<?php echo config_item('base_url') ?>jewelleries/getjewleries/Necklace/"><img src="<?php echo config_item('base_url') ?>images/clearance-product01.png" alt=""/></a></div> 
                            
                        </div>
                        <div class="earrings-product">
                            <div class="name-inner">
                                Braclets
                                <p><a href="<?php echo config_item('base_url') ?>jewelleries/getjewleries/Bracelet/">VIEW</a></p>
                            </div>
                            <div class="image-inner"><a href="<?php echo config_item('base_url') ?>jewelleries/getjewleries/Bracelet/"><img src="<?php echo config_item('base_url') ?>images/clearance-product01.png" alt=""/></a></div> 
                            
                        </div> -->

                    </div>
                    
                    <div class="note-earrings clearfix">
                    	<h4>Earrings to Make Her Happy</h4>
                        <p>Do you want to make your wife or girlfriend happy? Then get a diamond for her. This gem is very strong and that’s why a man in love usually gives it to his woman to show that his passion is as strong as a diamond. If your imagination is enough only for a ring with this stone, you have to look around and get earrings for her.</p>
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

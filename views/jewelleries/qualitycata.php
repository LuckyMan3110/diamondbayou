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
        <section id="sub">
        	 <ul>
            	<li><a href="#">Home</a></li>
                <li></li>
                <li><a href="#"><?php echo $cataname ?></a></li> 
            </ul> 
        </section>
        
        <section id="main" class="earrings">
        	<div id="containt">
                 <div class="share">
                    <span class="text-search"><?php echo $cataname ?></span>  
                    <!--<div>
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
                    	<div class="funny watches">
                        	<!--<p>Grace and Beauty of Bracelets. Have you ever wondered about the popularity of bracelets among ladies of all ages? Meanwhile, these items of jewelry were popular even in ancient times, when they were considered a status sign.</p>
                            <p>Nowadays, they have lost this meaning, but there is one thing that remains unchanged: bracelets feature grace and sophistication that contribute to the overall look of the wearer by adding mysterious sparkle and glitter to it.</p>-->
                            <p><center><img src="<?php echo config_item('base_url') ?>images/img-bracelets1.png" alt=""/></center></p>
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
								<?php if($allsub['Metal_Desc']=='14k Yellow Gold') $thumbimg = 'yellowgold.JPG';
									if($allsub['Metal_Desc']=='Sterling Silver') $thumbimg = 'Sterling Silver.JPG';
									if($allsub['Metal_Desc']=='14k Rose Gold') $thumbimg = '14krosegold.JPG';
									if($allsub['Metal_Desc']=='14k White Gold') $thumbimg = '14k whitegold.jpg';
									if($allsub['Metal_Desc']=='14k Silver Two-Tone') $thumbimg = '14ksilver.JPG';
									if($allsub['Metal_Desc']=='Gemstone Fashion') $thumbimg = 'gemstone fashion.jpg';
									if($allsub['Metal_Desc']=='Diamond Fashion') $thumbimg = 'diamond fashion.jpg';
									if($allsub['Metal_Desc']=='Metal Fashion') $thumbimg = 'metal fashion.jpg';
									if($allsub['Metal_Desc']=='Mountings') $thumbimg = 'mountings.jpg';
								?>
                                <p><a href="<?php echo config_item('base_url') ?>jewelleries/getstullerfur/<?php echo $journalName; ?>/<?php echo $this->uri->segment(3);?>/">VIEW</a></p>
                            </div>
                            <div class="image-inner image-bracelets"><a href="<?php echo config_item('base_url') ?>jewelleries/getstullerfur/<?php echo $journalName; ?>/<?php echo $this->uri->segment(3);?>/"><img src="<?php echo config_item('base_url') ?>images/Bracelet-view/<?php echo $thumbimg ?>" alt="" width="185px" height="121px"/></a></div> 
                            
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
								<?php if($allsub['MerchandisingCategory1']=='14k Yellow Gold') $thumbimg = 'yellowgold.JPG';
									if($allsub['MerchandisingCategory1']=='Sterling Silver') $thumbimg = 'Sterling Silver.JPG';
									if($allsub['MerchandisingCategory1']=='14k Rose Gold') $thumbimg = '14krosegold.JPG';
									if($allsub['MerchandisingCategory1']=='14k White Gold') $thumbimg = '14k whitegold.jpg';
									if($allsub['MerchandisingCategory1']=='14k Silver Two-Tone') $thumbimg = '14ksilver.JPG';
									if($allsub['MerchandisingCategory1']=='Gemstone Fashion') $thumbimg = 'gemstone fashion.jpg';
									if($allsub['MerchandisingCategory1']=='Diamond Fashion') $thumbimg = 'diamond fashion.jpg';
									if($allsub['MerchandisingCategory1']=='Metal Fashion') $thumbimg = 'metal fashion.jpg';
									if($allsub['MerchandisingCategory1']=='Mountings') $thumbimg = 'mountings.jpg';
								?>
                                <p><a href="<?php echo config_item('base_url') ?>jewelleries/getmystullerfurwithsub/<?php echo $journalName; ?>/<?php echo $this->uri->segment(3);?>/">VIEW</a></p>
                            </div>
                            <div class="image-inner image-bracelets"><a href="<?php echo config_item('base_url') ?>jewelleries/getmystullerfurwithsub/<?php echo $journalName; ?>/<?php echo $this->uri->segment(3);?>/"><img src="<?php echo config_item('base_url') ?>images/Bracelet-view/<?php echo $thumbimg ?>" alt="" width="185px" height="121px"/></a></div> 
                            
                        </div>
			<?php } ?>
                         
                         
                    </div>
                    
                    <div class="note-earrings clearfix">
                    	<!--<h4>Add a Stunning Effect to Your Wrist With Bracelets with Diamonds</h4>
                        <p>Nowadays experts differentiate between several styles of these accessories based on their basic characteristics. Actually, there are 6 main types of them, so you are highly recommended to learn more about each category to define which style works best for you. These categories include gemstone diamond pieces, tennis, bangle, red carpet bracelets in New York as well as vintage and designer bracelets. Each style is characterized by specific features that make them unique.</p>-->
                    </div>
                 </div> 
            </div>
             
             
        </section>
        
    </article><!--End #Content-->

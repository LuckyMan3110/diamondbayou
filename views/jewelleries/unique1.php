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
        	 
        </section>
        
        <section id="main">
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
                    
                    <div class="ads"><a href="#"><img src="<?php echo $this->config->item('base_url');?>images/ads.png" alt=""/></a></div>
                 </div>
                 
                  
                 
                  
                 
                 <div class="content">
                 	<?php
						foreach($records as $allsub)// returns an object of the first row
						{ $journalName = preg_replace('/\s+/', '_', $allsub['catname']);?>
                        <div class="inner-product">
                            <div class="name-inner">
                                <?php echo $allsub['catname'] ?>
                                <p><a href="<?php echo config_item('base_url') ?>jewelleries/getuniqueproduct/<?php echo $allsub['id']; ?>/<?php echo $allsub['catname'] ?>/">VIEW</a></p>
                            </div>
                            <div class="image-inner"><a href="<?php echo config_item('base_url') ?>jewelleries/getuniqueproduct/<?php echo $allsub['id']; ?>/<?php echo $allsub['catname'] ?>/"><img src="<?php echo config_item('base_url') ?>images/eng-product.png" alt=""/></a></div> 
                            
                        </div>
			<?php } ?>
                 </div> 
            </div>
             
             
        </section>
        
    </article>

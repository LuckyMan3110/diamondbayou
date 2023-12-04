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

<form id="form1" name="form1" method="post" action="<?php echo config_item('base_url') ?>jewelleries/addtoshoppingcart">

<article class="container_12">
        <section id="sub">
        	<ul>
            	<li><a href="#">Home</a></li>
                <li>></li>
                <li><a href="#">view detail</a></li>
                
            </ul>
        </section>
        
        <section id="main" class="view">
        	<div id="containt">
                 <div class="share">
                    <span class="text-search">View Detail</span>  
                    <!--<div>
                        <span class='st_sharethis' displayText='Share'></span>
                        <span class='st_pinterest'></span>
                        <span class='st_facebook'></span>
                        <span class='st_twitter'></span>
                        <span class='st_linkedin'></span> 
                        <span class='st_email'></span>
                    </div>-->
                     
                 </div>      

                 <div class="content">
                 	 <div class="view-left">
                     	<div class="img-description">
                     		<div id="bigPic">
                                <img src="http://www.uniquesettings.com<?php echo $details['data'][0]['image']; ?>" alt="<?php echo $details['data'][0]['name'];?>" width="385" hight="396"/>
                                <!--<img src="<?php echo $this->config->item('base_url');?>images/prod02.jpg" alt="" />
                                <img src="<?php echo $this->config->item('base_url');?>images/prod03.jpg" alt="" /> -->
                            </div>
                             <!--<p class="tt">click here to view larger</p>
                            <ul id="thumbs">
                                <li class='active' rel='1'><img src="<?php echo $this->config->item('base_url');?>images/thum01.jpg" alt="" /></li>
                                <li rel='2'><img src="<?php echo $this->config->item('base_url');?>images/thum02.jpg" alt="" /></li>
                                <li rel='3'><img src="<?php echo $this->config->item('base_url');?>images/thum03.jpg" alt="" /></li> 
                            </ul>-->
                            
                            <!--<div class="note clearfix">
                            	<div class="note-left">
                                    <p class="text-h4">Extended Service Plan</p>
                                    <p>Once you've made your selection, you'll want to protect it for a lifetime. </p>
                                </div>
                                <div class="note-right">
                                	Learn more about our Extended Service Plan
                                </div>
                            </div>-->
                        </div>
                        <div class="text-description"><?php //var_dump($uniqueprice) ?>
                        	<h4 class="title-description"><?php echo $details['data'][0]['name']; ?></h4>
                            <p class="date-description">Stock number: <?php echo $details['data'][0]['id'];?></p>
                            <p><?php echo $details['data'][0]['Description']; ?></p>
                            <p class="ring">
                                <select  id="slectmetaltype">
                                	<option value="">18K White</option>
                                	<?php foreach ($uniqueprice as $prices){ ?>
                                    <option value="<?php echo $prices['matalType'] ?>"><?php echo $prices['matalType'] ?></option><?php } ?>
                                </select> 
                                Metal Type<b class="icon-note"></b>
                            </p>
                            <p class="ring">
                                <select  id="selectringsize">
                                	<option value="">6</option>
                                </select> 
                                Ring size<b class="icon-note"></b>
                            </p>
							<div class="desc-price">
								<p id="allpriceshow">
								
								<?php 
								
								//allpriceshowmp($org_price);
								$org_price=$cuprice;
								$cuprice= $cuprice*2.5;
								$cuprice1=$cuprice;
								$cuprice15=$cuprice*15/100;
								$cuprice=$cuprice-$cuprice
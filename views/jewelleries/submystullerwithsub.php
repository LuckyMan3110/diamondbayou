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
	urllink = base_url+'site/stullerdetail/'+id+'/';	
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
<div class="catheader">
<br/><br/>
<table width="100%">
<tr style="background-color:#010F1E;color:#FFFFFF">
	<td colspan="5"><div class="CategoryChildCategoryHeader">CATEGORIES</div></td>
</tr>
<tr style="color:#FFFFFF">
<?php if($this->uri->segment(3)=="Ring"){?>
	<td><a href="<?php echo config_item('base_url') ?>jewelleries/getjewleries/Ring/">Rings</a></td>
	<?php }else if($this->uri->segment(3)=="Earring"){?>
	<td><a href="<?php echo config_item('base_url')?>jewelleries/getjewleries/Earring/">Earrings</a></td>
	<?php }else if($this->uri->segment(3)=="Pendant"){ ?>
	<td><a href="<?php echo config_item('base_url') ?>jewelleries/getjewleries/Pendant/">Pendants</a></td>
	<?php }elseif($this->uri->segment(3)=="Necklace"){?>
	<td><a href="<?php echo config_item('base_url') ?>jewelleries/getjewleries/Necklace/">Necklaces</a></td>
	<?php }elseif($this->uri->segment(3)=="Bracelet"){?>
	<td><a href="<?php echo config_item('base_url') ?>jewelleries/getjewleries/Bracelet/">Braclets</a></td>
	<?php }?>
</tr>

<tr>
<td colpan="4"><a href="javascript:" onclick="history.go(-1);"><img src="<?php echo base_url();?>images/back.jpg" width="65px" height="65px" /></a></td>
</tr>
</table>
</div>
<br/><br/><br/>
<div style="background-color:#010F1E;color:#FFFFFF">Products</div>
<br/><br/><br/>
<?php echo $this->pagination->create_links();?>
<div class="maindiv">
<?php
if(count($records['result'])>0){
for($i=0;$i<count($records['result']);$i++)
{
?>
<div class="panels-1">
<div class="jtitle" style="color:White"><?php echo $records['result'][$i]['Description'];?></div>
         <div class="panel-1">
            <!--   <a href="javascript:;" onclick="showdetail(<?php //echo $records['result'][$i]['stock_number']; ?>)" class="" style="width: 325px;">-->
			 <?php
if($records['result'][$i]['Videos']!=""){
			 		$json_decoded = json_decode($records['result'][$i]['Videos']);
			 		$imagemy = $json_decoded[0]->{'FullUrl'};
				$src= addslashes(str_replace('$standard$', 'hei=300&wid=300', $imagemy));
				}
				else{
				$src="http://images3.wikia.nocookie.net/__cb20061129213453/muppet/images/7/7c/Noimage.png";				
				}
			 ?>
                  <img src="<?php echo $src;?>" alt="<?php echo $records['result'][$i]['ShortDescription'];?>" class="first" style="height:210px;width:325px;">
              </a>
          </div>

		<div class="jprice" style="color:White">Best:$<?php echo number_format($records['result'][$i]['Price'],2);?></div>
		<?php if($records['result'][$i]['ezstatus'] == true){ ?>
		<div class="jprice" style="color:White">3EZ:$<?php $ez3 = $records['result'][$i]['Price']+((12*$records['result'][$i]['Price'])/100); echo number_format($ez3,2); ?></div>
		<div class="jprice" style="color:White">5EZ:$<?php $ez5 =  $records['result'][$i]['Price']+((17*$records['result'][$i]['Price'])/100); echo number_format($ez5,2); ?></div><?php } ?>

		  <div class="jdetail"> <a href="javascript:;" onclick="showdetail(<?php echo $records['result'][$i]['stuller_id']; ?>)">View Detail</a>
		 
		  </div>
    </div>
<?php
}
}
else{
?>
<div style="float:left;width:100%;text-align:center;">No record found! </div>
<?php
}
?>
</div>
<?php //echo $this->pagination->create_links();?>
<?php
//echo "<pre>";
//print_r($records);
//for($i=0;$i<count($records);$i++)
//{
?>
<?php //echo $records[$i]->description;?>
<?php
/*}*/
?>


<?php // echo $this->pagination->create_links();?>

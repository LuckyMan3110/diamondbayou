<script type="text/javascript">
	function submitform()
	{
	//alert('dsfsdf');
	document.getElementById('form1').submit();
	}
	</script>

<article class="container_12">
	<div class="bread-crumb">
        <ul>
          <li><a href="<?php echo config_item('base_url') ?>">Home</a></li>
          <li><a href="#javascript;">Search Results</a></li>
          <li><a href="#javascript;">Ring</a></li>
        </ul>
      </div>
  <section id="main">
    <div id="containt">
      <div class="share"> <span class="text-search">Search Results</span>
        <div> <span class='st_sharethis' displayText='Share'></span> <span class='st_pinterest'></span> <span class='st_facebook'></span> <span class='st_twitter'></span> <span class='st_linkedin'></span> <span class='st_email'></span> </div>
      </div>
      <div class="clear"></div>
      <div class="results">We found <?php echo $totalresult?> results for <?php echo $inputvalue ?></div>
      <div class="clear"></div>
      <div class="search-narrow"> 
        <!--&nbsp;&nbsp;&nbsp;&nbsp;Narrow Your Search: 
	<select class="type">
	<option>Price</option>
	<option>Price 1</option>
	<option>Price 2</option>
	<option>Price 3</option>
	</select> 
	<select class="type">
	<option>Metal Type</option>
	<option>Metal Type 1</option>
	<option>Metal Type 2</option>
	<option>Metal Type 3</option>
	</select> 
	<select class="type">
	<option>Style</option>
	<option>Style 1</option>
	<option>Style 2</option>
	<option>Style 3</option>
	</select> 
	<select class="type">
	<option>Ring Type</option>
	<option>Ring Type 1</option>
	<option>Ring Type 2</option>
	<option>Ring Type 3</option>
	</select> 
	
	<input type="reset" value="Reset" class="reset"/>-->
        <form id="form1" name="form1" method="post" action="<?php echo current_url()?>/">
          <span class="sort-by-01">SORT BY:
          <select name="sortby" class="type">
            <option value="">--------------</option>
            <option value="qg_id">ID</option>
            <option value="Item">Item No.</option>
            <option value="Weight">Weight</option>
            <option value="CT_Weight">Carat</option>
            <option value="Size">Size</option>
            <option value="MSRP">Price</option>
          </select>
          </span> <span class="sort-by-02">RESULTS PER PAGE:
          <select name="pageper" class="type">
            <option value="">--------------</option>
            <option value="20">20</option>
            <option value="50">50</option>
            <option value="100">100</option>
            <option value="300">300</option>
          </select>
          </span> <span class="sort-by-02">Price Range:
          <select name="pricerange" class="type">
            <option value="">--------------</option>
            <option value="999">$0 - $999</option>
            <option value="1999">$1,000 - $1,999</option>
            <option value="2999">$2,000 - $2,999</option>
            <option value="4999">$3,000 - $4,999</option>
            <option value="5000">$5,000 +</option>
          </select>
          </span>
          <input type="hidden" name="searchkeyword" value="<?php echo $inputvalue ?>">
          <input type="reset" value="submit" onclick="submitform()" class="reset"/>
        </form>
      </div>
      <div class="paging"> <span class="sort-by-03"> Displaying <strong><?php echo $numresults?></strong> of <?php echo $totalresult?> <!--&nbsp;&nbsp;&nbsp;&nbsp; 
	<strong>1</strong> of  800 -->&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->pagination->create_links();?> </span> </div>
      <div class="clear"></div>
      <div class="jewelry_boxrow">
        <div id="earingresult" class="content earingresult">
          <?php 
		  $productRings = '';
		  if($query_view == 'stuller') 
		  {
			  foreach($results as $result) 
			  { 
			  	$cuprice = $org_price = $result['Price'];
				$cuprice= $cuprice*2.5;
				$cuprice1=$cuprice;
				$cuprice15=$cuprice*15/100;
				$cuprice=$cuprice-$cuprice15;
				
				if($result['Videos']!="")
				{
					$json_decoded = json_decode($result['Videos']);
					$imagemy = $json_decoded[0]->{'FullUrl'};
					$src= addslashes(str_replace('$standard$', 'hei=300&wid=300', $imagemy));
				}
				else
				{
					$src="http://images3.wikia.nocookie.net/__cb20061129213453/muppet/images/7/7c/Noimage.png";				
				}
					$detailPageLink = '#'; //config_item('base_url').'site/stullerdetail/'.$result['stuller_id'].'/'.$parent_menu.'/'.$sub_catename.'/'.$cataname;
				
			   $productRings .= '<div class="engagement-product">
				<div class="image-engagement"><a href="'.$detailPageLink.'"><img src="'.$src.'" width="146" hight="136" alt="diamond"/></a></div>
				<div class="prodDescLabel"><a href="'.$detailPageLink.'">'.$result['Description'].'</a></div>
				<div class="jewlry_price">Price : $'._nf($cuprice,0).'';
				
				if($result['ezstatus']) 
				{
					$productRings .= '3EZ : $'.$ez3 = $org_price+(($org_price*$ez3value)/100); $fez3=$ez3; $ez3=$cuprice1-$ez3; echo number_format($ez3/2,0);
					$productRings .= '<br>5EZ : $'.$ez5=$org_price+(($ez5value*$org_price)/100); $fez5=$ez5; $ez5=$cuprice1-$ez5; echo number_format($ez5/4,0);
				}
				
				$productRings .= '</div>
			  </div>';
			  } ///// end foreach
			  echo $productRings;
			//// view unique
		  } 
		  else if($query_view == 'unique') 
		  {
			  foreach($results as $result) 
			  { 
			  	$uniqueprice   = $this->jewelleriesmodel->getPricesUniqueFromScrap($result['style_group']); //$result['ring_price'];
				$unique_price  = ( !empty($uniqueprice['price']) ? $uniqueprice['price'] : 0 );
				$cuprice=$org_price=$unique_price;
				$cuprice= $cuprice*2.5;
				$cuprice1=$cuprice;
				$cuprice15=$cuprice*15/100;
				$cuprice=$cuprice-$cuprice15;
									
				$srcimage = 'http://www.uniquesettings.com'.$result['image'];
				if(getimagesize($srcimage))
				{
					$src= $srcimage;
				}
				else
				{
					$src="http://images3.wikia.nocookie.net/__cb20061129213453/muppet/images/7/7c/Noimage.png";				
				}
					$detailPageLink = '#'; //config_item('base_url').'site/enagagementqualitydetail/'.$result['id'].'/'.$unique_price.'/'.$engage_styles;
				
			   $productRings .= '<div class="engagement-product">
				<div class="image-engagement"><a href="'.$detailPageLink.'"><img src="'.$src.'" width="146" hight="136" alt="diamond"/></a></div>
				<div class="prodDescLabel"><a href="'.$detailPageLink.'">'.$result['name'].'</a></div>
				<div class="jewlry_price">Price : $'._nf($cuprice,0).'';
				
				if($result['ezstatus'])
				{
					$productRings .= '3EZ : $'.$ez3 = $org_price+(($org_price*$ez3value)/100); $fez3=$ez3; $ez3=$cuprice1-$ez3; echo number_format($ez3/2,0);
					$productRings .= '<br>5EZ : $'.$org_price+(($ez5value*$org_price)/100); $fez5=$ez5; $ez5=$cuprice1-$ez5; echo number_format($ez5/4,0);
				}
				
				$productRings .= '</div>
			  </div>';
			  } ///// end foreach
			  echo $productRings; 
			  ///// end
		  } else {
		  
		  foreach($results as $result) {
	
			if($result['ImageLink_100']!=""){
			$src="http://".$result['ImageLink_500'];
			}
			else{
			$src="http://images3.wikia.nocookie.net/__cb20061129213453/muppet/images/7/7c/Noimage.png";				
			}?>
          <div class="engagement-product">
            <div class="image-engagement"><a href="<?php echo config_item('base_url') ?>site/qualitydetail/<?php echo $result['qg_id']?>">
            	<img src="<?php echo $src ?>" width="146" hight="136" alt="diamond"/></a></div>
            <div class="prodDescLabel"><a href="<?php echo config_item('base_url') ?>site/qualitydetail/<?php echo $result['qg_id']?>"><?php echo $result['Description'] ?></a></div>
            <div class="jewlry_price">Price : $<?php echo $result['MSRP']; if($result['ezstatus'] == true){ ?><br />
              3EZ = $
              <?php $ez3 = ($result['MSRP']+(($ez3value*$result['MSRP'])/100))/3; echo number_format($ez3,2); ?>
              <br/>
              5EZ = $
              <?php $ez5 =  ($result['MSRP']+(($ez5value*$result['MSRP'])/100))/5; echo number_format($ez5,2); ?>
              <br/>
              <? } ?>
            </div>
          </div>
          <?php } } ?>
          <!--<div class="item-product">
	<div class="image-product"><a href="<?php echo config_item('base_url') ?>site/qualitydetail/<?php echo $result['qg_id']?>"><img src="<?php echo $src ?>" width="146" hight="136" alt="diamond"/></a></div>
	<div class="name-product"><a href="<?php echo config_item('base_url') ?>site/qualitydetail/<?php echo $result['qg_id']?>"><?php echo $result['Description'] ?></a></div>
	<div class="price-product">
	Price : $<?php echo $result['MSRP']; if($result['ezstatus'] == true){ ?><br />
	3EZ = $ <?php $ez3 = ($result['MSRP']+(($ez3value*$result['MSRP'])/100))/3; echo number_format($ez3,2); ?><br/>
	5EZ = $ <?php $ez5 =  ($result['MSRP']+(($ez5value*$result['MSRP'])/100))/5; echo number_format($ez5,2); ?><br/> <? } ?>
	</div>
	</div>--> 
        </div>
      </div>
      <div class="clear"></div>
      <div class="paging clearfix"> 
        <!--<span class="sort-by-01">SORT BY: 
	<select class="type">
	<option>New</option>
	<option>Price 1</option>
	<option>Price 2</option>
	<option>Price 3</option>
	</select>  
	</span>
	<span class="sort-by-02">RESULTS PER PAGE:
	<select class="type">
	<option>New</option>
	<option>New 1</option>
	<option>New 2</option>
	<option>New 3</option>
	</select>  
	</span>--> 
        
        <span class="sort-by-03"> Displaying <strong><?php echo $numresults?></strong> of <?php echo $totalresult?> &nbsp;&nbsp;&nbsp;&nbsp; 
        <!--<strong>1</strong> of  800 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--> 
        <?php echo $this->pagination->create_links();?></span> </div>
        <div class="clear"></div><br>
    </div>
  </section>
</article>
<!--End #Content-->
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
<div class="clear"></div>
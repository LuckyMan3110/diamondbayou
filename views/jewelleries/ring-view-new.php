<div id="main-body-a">


<div class="main-container" style="margin:0 auto; width:970px;">

<div class="row">
<div class="col-md-12 pag-hading-clr">
<h2>Designer, And Diamond Earrigs</h2>
</div>
</div>

<div class="row font-clr">
<div class="col-md-3">
<img src="<? echo config_item('base_url') ?>images/page6-img1.jpg" class="img-responsive" alt="" />
</div>
<div class="col-md-8">
<h2>Wedding Rings</h2>
<p>Shop online from hundreds of different diamond and gemstone rings in our collection.</p>
<button class="btn btn-lg btn-default btn-design">BROWSE WEDDING RINGS</button>
</div>
</div>

<!--<div class="row font-clr">
<div class="col-md-8">
<h2>Preset Diamond Studs</h2>
<p>Z.Kor Diamonds offers you an amazing selection of preset diamond pendants, each more breathtaking than the last. Whatever the mood, whatever the occasion, these gorgeous diamond pendants are the answer.</p>
<button class="btn btn-lg btn-default btn-design">BROWSE PRESET STUD</button>
</div>

<div class="col-md-4">
<img src="<? echo config_item('base_url') ?>images/page4-img2.jpg" class="img-responsive" alt="" />
</div>
</div>-->

<div class="row">

  <div class="col-md-5">
    <h2 class="text-center">Women</h2>
      <?php
      $statement = "SELECT DISTINCT `Metal_Desc` FROM `dev_qg` WHERE `Description` LIKE '%".$this->uri->segment(3)."%'";

      $query =$this->db->query($statement);
      $result = $query->result_array();
      foreach($result as $allsub)// returns an object of the first row
      { $journalName = preg_replace('/\s+/', '_', $allsub['Metal_Desc']);?>
    <div class="col-md-3">
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

    <a href="<?php echo config_item('base_url') ?>jewelleries/getstullerfur/<?php echo $journalName; ?>/<?php echo $this->uri->segment(3);?>/"><img src="<?php echo config_item('base_url') ?>images/Rings-view/<?php echo $thumbimg ?>" width="110" height="110"/></a>
    <p><a href="<?php echo config_item('base_url') ?>jewelleries/getstullerfur/<?php echo $journalName; ?>/<?php echo $this->uri->segment(3);?>/">VIEW</a></p>
    </div>
    <?php } ?>
    
    <?php $statement = "SELECT DISTINCT `MerchandisingCategory1` FROM `dev_stuller` WHERE `MerchandisingCategory2` LIKE '%".str_replace('_', ' ', $this->uri->segment(3))."%'";

    $query =$this->db->query($statement);
    $result = $query->result_array();
    foreach($result as $allsub)// returns an object of the first row
    { $journalName = preg_replace('/\s+/', '_', $allsub['MerchandisingCategory1']);?>
     <div class="col-md-3">	
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
    <a href="<?php echo config_item('base_url') ?>jewelleries/getmystullerfurwithsub/<?php echo $journalName; ?>/<?php echo $this->uri->segment(3);?>/"><img src="<?php echo config_item('base_url') ?>images/Rings-view/<?php echo $thumbimg ?>" alt="" width="110" height="110"/></a>
    <p><a href="<?php echo config_item('base_url') ?>jewelleries/getmystullerfurwithsub/<?php echo $journalName; ?>/<?php echo $this->uri->segment(3);?>/">VIEW</a></p>
    </div>
    <?php } ?>
    
  </div>
<div class="col-md-5 shoping-cart">
  <h2 class="text-center">Men</h2>
  <?php
  $str = "Mens";
  $statement = "SELECT DISTINCT `Metal_Desc` FROM `dev_qg` WHERE `Description` LIKE '%".$str."%'";

  $query =$this->db->query($statement);
  $result = $query->result_array();
  foreach($result as $allsub)// returns an object of the first row
  { $journalName = preg_replace('/\s+/', '_', $allsub['Metal_Desc']);?>
  <div class="col-md-4">
    <?php echo $allsub['Metal_Desc'] ?>
    <a href="<?php echo config_item('base_url') ?>jewelleries/getstullerfur/<?php echo $journalName; ?>/<?php echo $this->uri->segment(3);?>/"><img src="<?php echo $this->config->item('base_url');?>images/mens-view/men rings.JPG" alt="" width="110" height="110"/></a>
    <p><a href="<?php echo config_item('base_url') ?>jewelleries/getstullerfur/<?php echo $journalName; ?>/<?php echo $this->uri->segment(3);?>/">VIEW</a></p>
  </div>
  <?php } ?>
  <?php $str = "Mens";
    $statement = "SELECT DISTINCT `MerchandisingCategory1` FROM `dev_stuller` WHERE `MerchandisingCategory2` LIKE '%".str_replace('_', ' ', $str)."%'";

  $query =$this->db->query($statement);
  $result = $query->result_array();
  foreach($result as $allsub)// returns an object of the first row
  { $journalName = preg_replace('/\s+/', '_', $allsub['MerchandisingCategory1']);?>
  
  <div class="col-md-4">
    <?php echo $allsub['MerchandisingCategory1'] ?>
      <a href="<?php echo config_item('base_url') ?>jewelleries/getmystullerfurwithsub/<?php echo $journalName; ?>/<?php echo $this->uri->segment(3);?>/"><img src="<?php echo $this->config->item('base_url');?>images/mens-view/men rings.JPG" alt="" width="110" height="110"/></a>
    <p><a href="<?php echo config_item('base_url') ?>jewelleries/getmystullerfurwithsub/<?php echo $journalName; ?>/<?php echo $this->uri->segment(3);?>/">VIEW</a></p>
  </div>
  <?php } ?>
  
</div>
</div>

</div>

</div>
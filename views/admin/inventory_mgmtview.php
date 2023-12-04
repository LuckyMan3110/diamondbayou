<script>
function getUniqueCate(cid, cmd_id) {
	
	var cateID = $('#'+cid).val();
	var urlink = base_url+'admin/getUniqueSbCate/'+cateID;	
	dataString = $("#uniqueForm").serialize();
	
	$.ajax({
			 type: "POST",
			 url:urlink,
			 data: dataString,
			 success: function(data) {
				 $('#'+cmd_id).html('<div style="margin: 0px auto; "><img src="'+base_url+'images/loading.gif"></div>');
				 $('#'+cmd_id).html(data);
			},
			error: function(){alert('Error ');}
		  });
}
//// save unique percent
function saveUniquePercent() {
	
	var urlink = base_url+'admin/saveUniquePercent/';	
	dataString = $("#uniqueForm").serialize();
	
	$.ajax({
			 type: "POST",
			 url:urlink,
			 data: dataString,
			 success: function(data) {
				 $('#uniqueMesage').html('<div style="margin: 0px auto; "><img src="'+base_url+'images/loading.gif"></div>');
				$('#uniqueMesage').addClass('alert alert-success');	
				 $('#uniqueMesage').html(data);
			},
			error: function(){alert('Error ');}
		  });
}

//// save unique percent 
function showOvSubCategory(idvalue, id_options) {
	
	var urlink = base_url+'admin/overnight_subcate_list/'+idvalue+'/options';
	
	$.ajax({
                type: "POST",
                url:urlink,
                success: function(data) {
                        $('#'+id_options).html(data);
               },
               error: function(){alert('Error ');}
         });
}

//// list the quality sub categories
function showQualitySubCategory(idvalue, id_options) {
	
	var urlink = base_url+'admin/getQualityCateList/'+idvalue+'/options';
	
	$.ajax({
                type: "POST",
                url:urlink,
                success: function(data) {
                        $('#'+id_options).html(data);
               },
               error: function(){alert('Error ');}
         });
}
</script>

<div class="inner"> 
  <!--\\\\\\\ inner start \\\\\\-->
  <div class="contentpanel">
      <!-- main menu start -->
        <div><?php echo admin_main_menu_list(); //// admin_mainmenu helper ?></div>
        <!-- main menu end -->
  <div class="pull-left breadcrumb_admin clear_both">
      <div class="pull-left page_title theme_color">
        <h1>Inventory Price Management</h1>
        <h2 class="">Unique and Other Inventory Settings</h2>
      </div>
      <div class="pull-right">
        <ol class="breadcrumb">
          <li><a href="<?php echo SITE_URL; ?>admin">Home</a></li>
          <li class="active">Inventory Mgmt.</li>
        </ol>
      </div>
    </div>
    <style type="text/css">
    .options { margin: 20px 0px 0px 30px; float:left; }
	select{ width:170px !important;}
    </style>
    <div id="uniqueMesage"></div>
    <div class="options">
      <p>
        <?php if(isset($status)) echo $status?>
      </p>
      <form id="uniqueForm" name="uniqueForm" method="post" action="<?php echo SITE_URL; ?>admin/inventory_mgnt">
        <div>
        <label for="stullercatagory">Unique Settings : </label>
        <select name="unique_setings" id="unique_setings" onchange="getUniqueCate('unique_setings','unique_sbcate')">
          <?php echo $view_unique; ?>
        </select>
        <select name="unique_sbcate" id="unique_sbcate" required="" onchange="getUniqueCate('unique_sbcate','uniques_sbcate1')"></select>
        <select name="uniques_sbcate1" id="uniques_sbcate1" onchange="getUniqueCate('uniques_sbcate1','uniques_sbcate2')"></select>
        <select name="uniques_sbcate2" id="uniques_sbcate2"></select>
        <label for="uniqueprice_margin">Price Margin : </label>
        <input type="text" name="uniqueprice_margin" id="uniqueprice_margin" size="5" maxlength="4" value="0">
        <input type="submit" name="submit" id="submit" value="Submit" />
        </div>
        
      </form>
      <p>&nbsp;</p>
       <form id="form1" name="form1" method="post" action="<?php echo SITE_URL; ?>admin/inventory_mgnt">
        <label for="stullercatagory">Stuller : </label>
        <select name="stuller_category" required="" id="stuller_category">
          <option value=''>----------</option>
          <?php echo stuller_cate_list('options'); //// stuller category in custome helper ?>
        </select>
        <label for="stuler_pricemargin">Price Margin : </label>
        <input type="text" name="stuler_pricemargin" id="stuler_pricemargin" size="5" maxlength="4" value="0">
        <input type="submit" name="submit" id="submit" value="Submit" />
      </form>
      <p>&nbsp;</p>
       <form id="form1" name="form1" method="post" action="<?php echo SITE_URL; ?>admin/inventory_mgnt">
        <label for="stullercatagory">Stuller Fine Jewelry : </label>
        <select name="stuller_fine_jew" required="" id="stuller_category">
          <option value=''>----------</option>
          <option value='wb_diamond'>Diamond Wedding Bands</option>         
          <option value='wb_ladies'>Ladies Wedding Bands</option>         
          <option value='wb_platinum'>Wedding Band</option>         
          <option value='wb_mens'>Mens Wedding Bands</option>         
          <option value='wb_studs'>Diamond Stud Earrings</option>         
          <option value='wb_hoops'>Diamond Hoops</option>         
          <option value='gemstone'>Gemstone Earrings</option>
        </select>
        <label for="stuler_pricemargin">Price Margin : </label>
        <input type="text" name="stuller_fine_maring" id="stuler_pricemargin" size="5" maxlength="4" value="0">
        <input type="submit" name="submit" id="submit" value="Submit" />
      </form>
      <p>&nbsp;</p>
      <form id="form1" name="form1" method="post" action="<?php echo SITE_URL; ?>admin/inventory_mgnt">
        <label for="david_stern_collection">Jewelercart : </label>
        <select name="david_stern_collection" required="" id="david_stern_collection">
          <option value=''>----------</option>
          <option value='dstern'>Jewelercart</option>
        </select>
        <label for="stuler_pricemargin">Price Margin : </label>
        <input type="text" name="dstern_margin" id="stuler_pricemargin" size="5" maxlength="4" value="0">
        <input type="submit" name="submit" id="submit" value="Submit" />
      </form>
      <p>&nbsp;</p>
      <form id="form2" name="form2" method="post" action="<?php echo config_item('base_url') ?>admin/inventory_mgnt">
        <label for="qualitycatagory">Quality : </label>
        <select name="quality_parentcate" id="quality_parentcate" onchange="showQualitySubCategory(this.value, 'quality_subcate')">
          <?php echo $quality_category; ?>
        </select>
        <select name="quality_subcate" id="quality_subcate" onchange="showQualitySubCategory(this.value, 'quality_childcate')"></select>
        <select name="quality_childcate" id="quality_childcate" onchange="showQualitySubCategory(this.value, 'quality_child1')"></select>
        <select name="quality_child1" id="quality_child1" onchange="showQualitySubCategory(this.value, 'quality_child2')"></select>
        <select name="quality_child2" id="quality_child2"></select>
        <label for="quality_pricemargin">Price Margin : </label>
        <input type="text" name="quality_pricemargin" id="quality_pricemargin" size="5" maxlength="4" value="0">
        <input type="submit" name="submit" id="submit" value="Submit" />
      </form>
      <p>&nbsp;</p>
      <form id="form3" name="form3" method="post" action="<?php echo SITE_URL; ?>admin/inventory_mgnt">
        <label for="qualitycatagory">Overnight : </label>
        <select name="cmb_ovparentcate" onchange="showOvSubCategory(this.value, 'overnight_subcate')" id="overnight_parent">
          <?php echo $newstyle_category; ?>
        </select>
        <select name="overnight_subcate" required="" id="overnight_subcate" onchange="showOvSubCategory(this.value, 'overnight_childcate')"></select>
        <select name="overnight_childcate" id="overnight_childcate"></select>
        <label for="overnight_price">Price Margin : </label>
        <input type="text" name="overnight_price" id="overnight_price" size="5" maxlength="4" value="0">
        <input type="submit" name="submit" id="submit" value="Submit" />
      </form>
		<p>&nbsp;</p>
		<form id="form3" name="form3" method="post" action="<?php echo SITE_URL; ?>admin/inventory_mgnt">
			<label for="qualitycatagory">Diamond: </label>
			<select name="shape_diamond" id="diamond_parent">
				<?php echo $newstyle_shape; ?>
			</select>
			<label for="diamond_price">increase price by : </label>
			<input type="text" name="diamond_price" id="diamond_price" size="5" maxlength="4" value="0">
			<input type="submit" name="submit" id="submit" value="Submit" />
		</form>
		<p>&nbsp;</p>
	</div>
    <script>
    function stullOptions()
    {
    var stullselection = document.getElementById('stullercatagory2').value;
    if(stullselection == 'Rings'){
    document.getElementById('stullercatagory').innerHTML = "<option value='Gemstone Fashion'>Gemstone Fashion</option><option value='Wedding Bands'>Wedding Bands</option><option value='Diamond Fashion'>Diamond Fashion</option><option value='Engagement And Anniversary'>Engagement And Anniversary</option><option value='Metal Fashion'>Metal Fashion</option><option value='Mountings'>Mountings</option>";
    }
    else if(stullselection == 'Necklaces'){
    document.getElementById('stullercatagory').innerHTML = "<option value='Diamond Fashion'>Diamond Fashion</option><option value='Gemstone Fashion'>Gemstone Fashion</option><option value='Metal Fashion'>Metal Fashion</option><option value='Mountings'>Mountings</option>";
    }
    else if(stullselection == 'Bracelets'){
    document.getElementById('stullercatagory').innerHTML = "<option value='Gemstone Fashion'>Gemstone Fashion</option><option value='Mountings'>Mountings</option><option value='Metal Fashion'>Metal Fashion</option><option value='Diamond Fashion'>Diamond Fashion</option>";
    }
    else if(stullselection == 'Clearnace'){
    document.getElementById('stullercatagory').innerHTML = "<option value='Gemstone Fashion'>Gemstone Fashion</option><option value='Wedding Bands'>Wedding Bands</option><option value='Diamond Fashion'>Diamond Fashion</option><option value='Mountings'>Mountings</option><option value='Metal Fashion'>Metal Fashion</option><option value='Engagement And Anniversary'>Engagement And Anniversary</option><option value='Findings'>Findings</option><option value='Fabricated Metals'>Fabricated Metals</option><option value='Functional Drivers'>Functional Drivers</option>";
    }
    else if(stullselection == 'Earrings'){
    document.getElementById('stullercatagory').innerHTML = "<option value='Gemstone Fashion'>Gemstone Fashion</option><option value='Diamond Fashion'>Diamond Fashion</option><option value='Mountings'>Mountings</option><option value='Metal Fashion'>Metal Fashion</option>";
    }
    else{
    document.getElementById('stullercatagory').innerHTML = "";
    }
    }
    
    function quaOptions()
    {
    var stullselection = document.getElementById('qualitycatagory2').value;
    if(stullselection == 'Rings'){
    document.getElementById('qualitycatagory').innerHTML = "<option value='Sterling Silver'>Sterling Silver</option><option value='14k Yellow Gold'>14k Yellow Gold</option><option value='14k Silver Two-Tone'>14k Silver Two-Tone</option><option value='14k Rose Gold'>14k Rose Gold</option><option value='14k White Gold'>14k White Gold</option><option value='14k Two-tone'>14k Two-tone</option><option value='14k/Silver Two-Tone'>14k/Silver Two-Tone</option>";
    }
    else if(stullselection == 'Necklaces'){
    document.getElementById('qualitycatagory').innerHTML = "<option value='Sterling Silver'>Sterling Silver</option><option value='14k Yellow Gold'>14k Yellow Gold</option><option value='14k Silver Two-Tone'>14k Silver Two-Tone</option><option value='14k White Gold'>14k White Gold</option><option value='14k Two-tone'>14k Two-tone</option><option value='14k/Silver Two-Tone'>14k/Silver Two-Tone</option>";
    }
    else if(stullselection == 'Bracelets'){
    document.getElementById('qualitycatagory').innerHTML = "<option value='Sterling Silver'>Sterling Silver</option><option value='14k Yellow Gold'>14k Yellow Gold</option><option value='14k Silver Two-Tone'>14k Silver Two-Tone</option><option value='14k White Gold'>14k White Gold</option><option value='14k Two-tone'>14k Two-tone</option><option value='14k/Silver Two-Tone'>14k/Silver Two-Tone</option>";
    }
    else if(stullselection == 'Earrings'){
    document.getElementById('qualitycatagory').innerHTML = "<option value='Sterling Silver'>Sterling Silver</option><option value='14k Yellow Gold'>14k Yellow Gold</option><option value='14k Silver Two-Tone'>14k Silver Two-Tone</option><option value='14k Rose Gold'>14k Rose Gold</option><option value='14k White Gold'>14k White Gold</option><option value='14k Silver Two-Tone'>14k Silver Two-Tone</option><option value='14k/Silver Two-Tone'>14k/Silver Two-Tone</option>";
    }
    else if(stullselection == 'Mens'){
    document.getElementById('qualitycatagory').innerHTML = "<option value='Sterling Silver'>Sterling Silver</option><option value='clearnace'>clearnace</option><option value='Rings'>Rings</option><option value='Earrings'>Earrings</option><option value='Pendants'>Pendants</option><option value='Necklaces'>Necklaces</option><option value='Braclets'>Braclets</option>";
    }
    else{
    document.getElementById('qualitycatagory').innerHTML = "";
    }
    }
    
    function init()
    {
    var stullselection = document.getElementById('stullercatagory2');
    stullselection.onchange = stullOptions;
    var quaselection = document.getElementById('qualitycatagory2');
    quaselection.onchange = quaOptions;
    }
    window.onload = init;
    </script> 
  </div>
  <!--\\\\\\\ inner end\\\\\\--> 
</div>
<!--\\\\\\\ wrapper end\\\\\\--> 
<!-- Modal -->
<?php echo popupsOtherBlockData(); ?>
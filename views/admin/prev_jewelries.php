<script>
    function getDetail(str){
        /*
if(str == '36' ||  str == '38' ||  str == '40' ||  str == '42' ||  str == '50' ||  str == '44' ||  str == '46' ||  str == '48' ||  str == '242' ||  str == '52' ||  str == '56' ||  str == '54' ||  str == '55' ||  str == '57' ||  str == '58' ||  str == '60' ||  str == '62' ||  str == '64' ||  str == '66' 
||  str == '68' ||  str == '72' ||  str == '87' ||  str == '89' ||  str == '91' ||  str == '93' ||  str == '70' ||  str == '84' ||  str == '82' 
        ||  str == '80' ||  str == '79' ||  str == '74' ||  str == '250' ||  str == '248' ||  str == '247' ||  str == '245' ||  str == '76' ||  str == '104' 
        ||  str == '102' ||  str == '100' ||  str == '98' ||  str == '96' ) {
  document.getElementById('extradetail').style.display = 'inline';
  return true;
}else{
  document.getElementById('extradetail').style.display = 'none';
  return false;
}
         */
    }
    function getinfo(v){

        if(v != 'NONE'){
            document.getElementById("gemstone_info").style.display = 'block';
        }else{
            document.getElementById("gemstone_info").style.display = 'none';
        }
    
    }
    function enableMore()

    {
        if(document.getElementById("chain_included").checked){
            document.getElementById("moreFields").style.display = 'block';
        }else{
            document.getElementById("moreFields").style.display = 'none';
        }
    }
    function getCategoryBox(gender,sel,sub)
    {
    
        document.getElementById("sectionhold").innerHTML = '<img src="http://gemnile.com/ajax-loader.gif"  border="0" align="center" />';
        
        $.ajax({
            type: "POST",
            dataType: "post",
            url: "http://atlasdiamond.seowebdirect.com/admin/catajaxreq",
            data: "gender="+gender+"&sel="+sel+"&sub="+sub,
            success: function(data)
            {           
                document.getElementById("sectionhold").innerHTML =  data;
            }
      
        });
        /*/
  if(gender == 'M'){
    getSubCategoryBox(3291875018);            
   }else if(gender == 'F'){
    getSubCategoryBox(3292598018);            
        }
         */
    }
    function checkOpt(v){
        /*
    if(v == 124){ //ring section
        document.getElementById("chainextraFields").style.display = 'none';
        document.getElementById("ringextraFields").style.display = 'none';
        document.getElementById("earningextraFields").style.display = 'none';
        document.getElementById("bracletextraFields").style.display = 'none';
        document.getElementById("pendantextraFields").style.display = 'none';        
        document.getElementById("studearningextraFields").style.display = 'block';        
    }else{
       // getSubCategoryBox(v);
       
        document.getElementById("chainextraFields").style.display = 'none';
        document.getElementById("ringextraFields").style.display = 'none';
        document.getElementById("earningextraFields").style.display = 'block';
        document.getElementById("bracletextraFields").style.display = 'none';
        document.getElementById("pendantextraFields").style.display = 'none';        
        document.getElementById("studearningextraFields").style.display = 'none'; 
    }
         */
    }
    function getSubCategoryBox(cat_id,sub_id)
    {
       
        document.getElementById("subsectionhold").innerHTML = '<img src="http://gemnile.com/ajax-loader.gif"  border="0" align="center" />';
        if(cat_id == '3291875018'  ||  cat_id == '3292598018'){ //ring section
            /*
        document.getElementById("chainextraFields").style.display = 'none';
        document.getElementById("ringextraFields").style.display = 'block';
        document.getElementById("earningextraFields").style.display = 'none';
        document.getElementById("bracletextraFields").style.display = 'none';
        document.getElementById("pendantextraFields").style.display = 'none';
        document.getElementById("studearningextraFields").style.display = 'none';        
             */  
            document.getElementById("category_type").value = 'ring';		  
            document.getElementById("chainextraFields").style.display = 'none';
            document.getElementById("ringextraFields").style.display = 'block';
            document.getElementById("earningextraFields").style.display = 'none';
            document.getElementById("bracletextraFields").style.display = 'none';
            document.getElementById("pendantextraFields").style.display = 'none';
            document.getElementById("studearningextraFields").style.display = 'none';        
        }
        if(cat_id == '3291962018' ){ //chain section
            document.getElementById("category_type").value = 'chain';		  
            document.getElementById("chainextraFields").style.display = 'block';
            document.getElementById("ringextraFields").style.display = 'none';
            document.getElementById("earningextraFields").style.display = 'none';
            document.getElementById("bracletextraFields").style.display = 'none';
            document.getElementById("pendantextraFields").style.display = 'none';
            document.getElementById("studearningextraFields").style.display = 'none';        
        }
        if(cat_id == '3292498018' ||  cat_id == '3292603018' ){ //pendants section
            document.getElementById("category_type").value = 'pendant';		  
            document.getElementById("chainextraFields").style.display = 'none';
            document.getElementById("ringextraFields").style.display = 'none';
            document.getElementById("earningextraFields").style.display = 'none';
            document.getElementById("bracletextraFields").style.display = 'none';
            document.getElementById("pendantextraFields").style.display = 'block';
            document.getElementById("studearningextraFields").style.display = 'none';        
        
        }
        if(cat_id == '3292607018' ||  cat_id == '3292560018' ){ //bracelet section
            document.getElementById("category_type").value = 'bracelet';		  
            document.getElementById("chainextraFields").style.display = 'none';
            document.getElementById("ringextraFields").style.display = 'none';
            document.getElementById("earningextraFields").style.display = 'none';
            document.getElementById("bracletextraFields").style.display = 'block';
            document.getElementById("pendantextraFields").style.display = 'none';
            document.getElementById("studearningextraFields").style.display = 'none';        
        }
        if(cat_id == '3292577018' ||  cat_id == '3292601018' ){ //earning section
            document.getElementById("category_type").value = 'earrings';		  
            document.getElementById("chainextraFields").style.display = 'none';
            document.getElementById("ringextraFields").style.display = 'none';
            document.getElementById("earningextraFields").style.display = 'block';
            document.getElementById("bracletextraFields").style.display = 'none';
            document.getElementById("pendantextraFields").style.display = 'none';
            document.getElementById("studearningextraFields").style.display = 'none';        
        }
        $.ajax({
            type: "POST",
            dataType: "post",
            url: "http://atlasdiamond.seowebdirect.com/admin/getsubcatajaxreq",
            data: "catid="+cat_id+"&subid="+sub_id,
            success: function(data)
            {
                document.getElementById("subsectionhold").innerHTML =  data;
            }
        });
    }
    function getField(v){
        // document.getElementById("gemHoldBox").innerHTML = '<img src="http://gemnile.com/ajax-loader.gif"  border="0" align="center" />';	
        document.getElementById("gemHoldBox").innerHTML = '';
        total = v ; //document.getElementById("count").value;
        if(total > 0){        
            for(j=0; j<total; j++) {        
                gemstones="gemstone"+j;
                gemstone_class="gemstoneClass"+j;
                gemstone_color  = "gemstoneColor"+j;
                birthstone = "birthstone"+j;
                gemstone_shape = "gemstoneShape"+j;
                stone_size  = "stoneSize"+j;
                stone_count = "stone_count"+j;
                stone_color = "stone_color"+j;
                stone_clarity = "stone_clarity"+j;
                stone_weight = "stone_weight"+j;
                setting = "setting"+j;
                shape = "shape"+j;
                cut = "cut"+j;
                carat = "carat"+j;
                gem1='';
                class1='';
                color1='';
                shape1='';size1='';counter1='';
                totalweight1 = '';
                settings1 = '';
                month1=0;
                
                if(document.getElementById('class'+j)){
                     class1=document.getElementById('class'+j).innerHTML;                     
                }if(document.getElementById("color"+j)){                
                    color1=document.getElementById("color"+j).innerHTML;
                }if(document.getElementById("g"+j)){
                    gem1=document.getElementById("g"+j).innerHTML;
                }if(document.getElementById("m"+j)){
                    month1=document.getElementById("m"+j).innerHTML;
                }if(document.getElementById("shape"+j)){
                    shape1=document.getElementById("shape"+j).innerHTML;
                }if(document.getElementById("size"+j)){
                    size1=document.getElementById("size"+j).innerHTML;
                }if(document.getElementById("counter"+j)){
                    counter1=document.getElementById("counter"+j).innerHTML;
                }if(document.getElementById("totalweight"+j)){
                    totalweight1=document.getElementById("totalweight"+j).innerHTML;
                }if(document.getElementById("settings"+j)){
                    settings1=document.getElementById("settings"+j).innerHTML;
                }
                var marr = new Array();
                marr[1] = 'January';
                marr[2] = 'february';
                marr[3] = 'mar';
                marr[4] = 'apr';
                marr[5] = 'may';
                marr[6] = 'june';
                marr[7] = 'july';
                marr[8] = 'aug';
                marr[9] = 'sep';
                marr[10] = 'oct';
                marr[11] = 'nov';
                marr[12] = 'dec';
                string = '';
                
                for(mcounter=1; mcounter <= 12 ; mcounter++){
                    //alert(mcounter + '--------'+ month1);
                    if(mcounter == parseInt(month1)){                        
                        string += '<option value='+mcounter+' selected="selected">'+marr[mcounter]+'</option>';
                    }else{
                       string += '<option value='+mcounter+'>'+marr[mcounter]+'</option>'; 
                    }
                }               

// value='+gem1+'                
                type= "Gemstone"; //document.getElementById('stone').options[document.getElementById('stone').selectedIndex].value; 
                //document.getElementById("stone").selectedIndex;
                document.getElementById("gemHoldBox").innerHTML += '<table border="1" style="border-collapse:collapse;"><tr><td><input type="text" size="11" name='+gemstones+'  id='+gemstones+'  value = '+gem1+' ></td><td><input type="text" size="10" name='+gemstone_class+'  id='+gemstone_class+'  value='+class1+'  ></td><td><input type="text" size="10" name='+gemstone_color+'  id='+gemstone_color+'  value='+color1+' ></td><td><select name='+birthstone+' id='+birthstone+'>'+string+'</select></td><td><input type="text" size="14" name='+gemstone_shape+'  id='+gemstone_shape+' value='+shape1+'></td><td><input type="text" size="10" name='+stone_size+'  id='+stone_size+'  value='+size1+'></td><td><input type="text" size="2" name='+stone_count+'  id='+stone_count+' value='+counter1+'></td><td><input type="text" size="3" name='+stone_weight+' id='+stone_weight+' value='+totalweight1+'></td><td><input type="text" size="22" name='+setting+' id='+setting+' value='+settings1+'></td></tr></table>';
                document.getElementById("gemHoldBox").innerHTML +=  '</tr>';
                
            }     
        }   
    }
    function checkField(v)
    {
        document.getElementById("gemstones").innerHTML = ''; 
        for(j=0; j<v; j++){
            str =  "<tr>";
      
            //str += "<td><input type=\"text\" name=\"gem\"+v+" id="gem"'+v+' /></td>";   
      
            str += "<td><input type='text' name='gem'"+v+'" id="gem"'+v+" /></td>";   
            /*str += '<td><input type="text" name="gem"'+v+' id="gem"'+v+' /></td>';   
      str += '<td><input type="text" name="gem"'+v+' id="gem"'+v+' /></td>';   
      str += '<td><input type="text" name="gem"'+v+' id="gem"'+v+' /></td>';   
      str += '<td><input type="text" name="gem"'+v+' id="gem"'+v+' /></td>';   
      str += '<td><input type="text" name="gem"'+v+' id="gem"'+v+' /></td>';   
      str += '<td><input type="text" name="gem"'+v+' id="gem"'+v+' /></td>';   
             */
        }
        document.getElementById("gemstones").innerHTML = str; 
        /*
   document.getElementById("countHoldBox").innerHTML = '';
   if(v != 'NONE'){
      document.getElementById("countHoldBox").innerHTML += 'Count : <input type="text" size="3" name="count" id="count"  onblur ="getField(this.value)"  />';
   }else{
      document.getElementById("countHoldBox").innerHTML = '';
      document.getElementById("gemHoldBox").innerHTML = '';
        }
         */
    }
</script>

<?php
$id =  $this->uri->segment(4);

if ($action == 'add' || $action == 'edit') {
    
  
    /*     ebayid 	section 	collection 	price 	carat 	shape 	metal 	finger_size 	diamond_count 
		diamond_size 	total_carats 	pearl_lenght 	pearl_mm 	semi_mounted 	side 
		description 	big_image 	small_image 	carat_image 	style 	white_gold_price 	yellow_gold_price 
		platinum_price 	name 	ringtype 	c */
		
		$section = isset($details['section']) ? $details['section'] : '';
        $ebayid = isset($details['ebayid']) ? $details['ebayid'] : 0;
        $collection = isset($details['collection']) ? $details['collection'] : '';
        $price = isset($details['price']) ? $details['price'] : '';
        $carat = isset($details['carat']) ? $details['carat'] : '';
        $shape = isset($details['shape']) ? $details['shape'] : '';
        $metal = isset($details['metal']) ? $details['metal'] : '';
        $finger_size = isset($details['finger_size']) ? $details['finger_size'] : '';
        $diamond_count = isset($details['diamond_count']) ? $details['diamond_count'] : '';
        $diamond_size = isset($details['diamond_size']) ? $details['diamond_size'] : '';
        $total_carats = isset($details['total_carats']) ? $details['total_carats'] : '';
        $pearl_lenght = isset($details['pearl_lenght']) ? $details['pearl_lenght'] : '';
        $pearl_mm = isset($details['pearl_mm']) ? $details['pearl_mm'] : '';
        $semi_mounted = isset($details['semi_mounted']) ? $details['semi_mounted'] : '';
        $side = isset($details['side']) ? $details['side'] : '';
        $description = isset($details['description']) ? $details['description'] : '';
        $style = isset($details['style']) ? $details['style'] : '';
        $white_gold_price = isset($details['white_gold_price']) ? $details['white_gold_price'] : '';
        $yellow_gold_price = isset($details['yellow_gold_price']) ? $details['yellow_gold_price'] : '';
        $platinum_price = isset($details['platinum_price']) ? $details['platinum_price'] : '';
        $name = isset($details['name']) ? $details['name'] : '';
        $ringtype = isset($details['ringtype']) ? $details['ringtype'] : '';
        $ringtype = isset($details['ringtype']) ? $details['ringtype'] : '';

        $big_image = isset($details['big_image']) ? $details['big_image'] : '';
        $small_image = isset($details['small_image']) ? $details['small_image'] : '';
        $carat_image = isset($details['carat_image']) ? $details['carat_image'] : '';
      
   
    $id = isset($id) ? $id : '';
    ?>
<div class="blue_man">
   <div class="blue_admin_box1">			
      <div class="addcountry_box">
        <div class="heading">
            <h1 class="hbb" align="center"><?= ucfirst($action) ?> Rings</h1><br/>
        </div>
            <!-- Message Part -->
            <div style="width:100%;">
             <? if(isset($success) && !empty($success)){ ?>
                <div style="width:95.5%; margin:5px; padding:10px 10px 10px 10px; background-color:#C8F2BB; font-weight:bold">
               
                      <? echo $success;   ?>
                 
                </div>
                <? } ?>
            </div>
            <div style="clear:both"></div>
            <!-- End -->
            <div class="search_box">
                <form name="addEditForm" id="addEditForm" action="<?php echo config_item('base_url'); ?>admin/jewelries/<?php echo $action;
    echo ($action == 'edit') ? '/' . $id : ''; ?>" method="post" enctype="multipart/form-data" >
           <table width="80%" border="0" align="center" cellpadding="5" cellspacing="0" class="table_border">
  <!--Warning Class-->
<!--end of displaying warning class-->
     <h1 style="color:navy;font-weight:bold;font-family:serif;">  <legend>JEWELRY INFORMATION</legend></h1>
  
 <tr>
      <td width="20%" align="right">Section</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
           <input type="text" name="section" id="section" value="<?php echo $section; ?>" maxlength="30"  size="40"  class="input1 required alpha" / >
            </dd>
      </td>
    </tr>  
    
 
 <tr>
      <td width="20%" align="right">Collection</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
          <input type="text" name="collection" id="collection" value="<?php echo $collection; ?>" maxlength="30"  size="40" class="input1 required alpha" />											
            </dd>
      </td>
    </tr>  
  
     
 <tr>
      <td width="20%" align="right">carat</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
          <input type="text" name="carat"  id ="carat" value="<?php echo $carat; ?>" maxlength="30"  size="40" />											
            </dd>
      </td>
    </tr>  
  
     <tr>
      <td width="20%" align="right">Shape</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
           <input type="text" name="shape" id="shape" value="<?php echo $shape; ?>" maxlength="80"  size="90" />
            <?php echo form_error('item_title'); ?> 
            </dd>
      </td>
    </tr>  
    
    <tr>
      <td width="20%" align="right">Metal</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
           <input type="text" name="metal" id="metal" value="<?php echo $metal; ?>" maxlength="80"  size="90" />
          
            </dd>
      </td>
    </tr>  
   

                     

    <tr>
    <td width="20%" align="right">Finger Size</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
           <input type="text" name="finger_size" id="finger_size" value="<?php echo $finger_size; ?>" maxlength="30"  size="40" />

            </dd>
      </td>
    </tr>  
    
    
    <tr>
      <td width="20%" align="right">Diamond Count</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
           <input type="text" name="diamond_count" id="diamond_count" value="<?php echo $diamond_count; ?>" maxlength="30"  size="40" />
            </dd>
      </td>
    </tr>  
    
   <tr>
      <td width="20%" align="right">Total carats</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
            <input type="text" name="total_carats" id="total_carats" value="<?php echo $total_carats; ?>" maxlength="30"  size="40" />

            </dd>
      </td>
    </tr>  
    
    <tr>
      <td width="20%" align="right">Pearl Lenght</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
             <input type="text" name="pearl_lenght" id="pearl_lenght" value="<?php echo $pearl_lenght; ?>" maxlength="30"  size="40" />	
            </dd>
      </td>
    </tr>  
             
 <tr>
      <td width="20%" align="right">Pearl mm</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
             <input type="text" name="pearl_mm"  id = "pearl_mm" value="<?php echo $pearl_mm; ?>" maxlength="15" class="q" />	
            </dd>
      </td>
    </tr>  
              
         
   <tr>
      <td width="20%" align="right">Semi Mounted</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
                   <input type="text" name="semi_mounted" value="<?php echo $semi_mounted; ?>" maxlength="30"  size="40" />
            </dd>
      </td>
    </tr>  
     
    <tr>
      <td width="20%" align="right">Side</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
                <input type="text" name="side" value="<?php echo $side; ?>" maxlength="30"  size="40" />
            </dd>
      </td>
    </tr>                             
 
                      
 <tr>
      <td width="20%" align="right">description</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
                  <input type="text" name="description" id="description" value="<?php echo $description; ?>"   size="100" />
            </dd>
      </td>
    </tr>     
              
  <!--Braclates  extra fields -->
  <tr><td></td><td colspan="4" id="bracletextraFields" align="center">
<!-- <div id="bracletextraFields" style="display:none;"> -->
<table width="100%" align="center">
  <tr>
      <td width="20%" align="right">style</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
               <input type="text" name="style" id="style"  value="<?php echo $style; ?>"    size="50" />
            </dd>
      </td>
    </tr>
    	
  <tr>
      <td width="20%" align="right">white_gold_price</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
               <input type="text" name="white_gold_price" id="white_gold_price"  value="<?php echo $white_gold_price; ?>"    size="50" />
            </dd>
      </td>
    </tr>  
  <tr>
      <td width="20%" align="right">yellow_gold_price</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
            <input type="text" name="yellow_gold_price" id="yellow_gold_price"  value="<?php echo $yellow_gold_price; ?>"    size="50" />
            </dd>
      </td>
    </tr>  
    <tr>
      <td width="20%" align="right">platinum_price</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
            <input type="text" name="platinum_price" id="platinum_price" value="<?php echo $platinum_price; ?>" size="50" />
            </dd>
      </td>
    </tr>   </table>  
</td></tr>
 <!-- End extra fields -->

 <!--Chain  extra fields -->
      <!-- <div id="chainextraFields" style="display: none;" > -->
<tr><td></td><td colspan="4" id="chainextraFields"  align="center"> 
 
        <table width="100%">
     <tr>
      <td width="20%" align="right">name</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
               <input type="text" name="name" id="name"  value="<?php echo $name; ?>"    size="50" /><?php echo form_error('style'); ?>
            </dd>
      </td>
    </tr>   
    
     <tr>
      <td width="20%" align="right">ringtype</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
               <input type="text" name="ringtype" id="ringtype"  value="<?php echo $ringtype; ?>"    size="50" />
            </dd>
      </td>
    </tr>   
        

  <tr>
     <td colspan="4"  align="center">
            <table  border="0" align="left" width="100%"/>
            <tr>
                <td colspan="2"> 
                    <table width="100%"><tr><td valign="top">
                                <fieldset style="background: #fff;">
                                    <legend>big_image</legend>
                                    <center>
    <?php {

        if (file_exists(config_item('base_path') . 'images/rings/' . $big_image) && $big_image != '')
            echo '<img width="120" height="120" src="' . config_item('base_url') . 'images/rings/' . $big_image . '" style="width: 80px; height: 80px;"><br />';
        else
            echo '<img src="' . config_item('base_url') . 'images/rings/noringimage.png" style="width: 80px; height: 80px;"><br />';
        //  echo '<small>Upload new image will replace the old image</small><br />'; 
    }
    ?>
                                        <input type="file" name="big_image" id="big_image" value=""  /> 
                                    </center>
                                </fieldset>	
                            </td>
                            <td>
                                <fieldset style="background: #fff;">
                                    <legend>Ring image2</legend>
                                    <center>
    <?php {

        if (file_exists(config_item('base_path') . 'images/rings/' . $small_image) && $small_image != '')
            echo '<img src="' . config_item('base_url') . 'images/rings/' . $small_image . '" style="width: 80px; height: 80px;"><br />';
        else
            echo '<img src="' . config_item('base_url') . 'images/rings/noringimage.png" style="width: 80px; height: 80px;"><br />';
        //   echo '<small>Upload new image will replace the old image</small><br />'; 
    }
    ?>
                                        <input type="file" name="small_image" id="small_image" value=""  /> 
                                    </center>
                                </fieldset>	
                            </td>

                            <td>
                                <fieldset style="background: #fff;">
                                    <legend>carat_image</legend>
                                    <center>
    <?php {

        if (file_exists(config_item('base_path') . 'images/rings/' . $carat_image) && $carat_image != '')
            echo '<img src="' . config_item('base_url') . 'images/rings/' . $carat_image . '" style="width: 80px; height: 80px;"><br />';
        else
            echo '<img src="' . config_item('base_url') . 'images/rings/noringimage.png" style="width: 80px; height: 80px;"><br />';
    }
    ?>
                                        <input type="file" name="carat_image" id="carat_image" value=""  /> 
                                    </center>
                                </fieldset>	
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
    <tr>
          <td align="right">&nbsp;</td>
	  <td width="3%" align="left" valign="top"><dt id="edit-label">&nbsp;</dt><dd id="edit-element">
            <input type="submit" name="<?=$action;?>btn" id="edit" value="<?= ucfirst($action); ?>" class="search_but"></dd>&nbsp;</td>          
          <td width="74%" align="left" valign="top"><dt id="back-label">&nbsp;</dt><dd id="back-element">
            </dd></td>
    </tr>      
 
</table>
            <input type="hidden" value="ring" name="category_type" id="category_type"  />
            
<?php

if(isset($gemstones) && sizeof($gemstones) > 0 ) {
    
for ($jw = 0; $jw < sizeof($gemstones); $jw++) {
    $c = "color$jw";
    $cl = "class$jw";
    $g = "g$jw";
    $m = "m$jw";
    $s = "shape$jw";
    $size = "size$jw";
    $counter = "counter$jw";
    $totalweight = "totalweight$jw";
    $settings = "settings$jw";

    echo "<div id='".$c."' style='visibility:hidden;'>" . $gemstones[$jw]['color'] . "</div>";
    echo "<div id='".$cl."' style='visibility:hidden;'>" . $gemstones[$jw]['class'] . "</div>";
    echo "<div id='".$totalweight."' style='visibility:hidden;'>" . $gemstones[$jw]['total_weight'] . "</div>";

    echo "<div id='".$g."' style='visibility:hidden;'>" . $gemstones[$jw]['gemstone'] . "</div>";
    echo "<div id='".$m."' style='visibility:hidden;'>" . $gemstones[$jw]['birthstone_month'] . "</div>";
    echo "<div id='".$s."' style='visibility:hidden;'>" . $gemstones[$jw]['shape'] . "</div>";

    echo "<div id='".$size."' style='visibility:hidden;'>" . $gemstones[$jw]['stone_size'] . "</div>";
    echo "<div id='".$counter."' style='visibility:hidden;'>" . $gemstones[$jw]['number_of_gemstones'] . "</div>";
    echo "<div id='".$settings."' style='visibility:hidden;'>" . $gemstones[$jw]['settings'] . "</div>";
} }
?>            
            </form>
        
<?php }else { ?>

    <div>
        <table id="results" style="display:none; "></table>
    </div>
<? } ?>

<script>
<? if (empty($gender)) { ?>
            getCategoryBox('M','-1','-1');
<? } else { ?>
            getCategoryBox('<? echo $gender; ?>','<? echo $category; ?>','<? echo $subcategory; ?>');    
<? } ?>     
<? if (empty($category)) { ?>
                getSubCategoryBox('3291875018','-1');
<? } else { ?>
                getSubCategoryBox('<? echo $category; ?>','<? echo $subcategory; ?>');
<? } ?>
<? if (isset($chain_included) && $chain_included == '1') { ?>		
                enableMore();
<? } ?>
<? if (isset($type) && $type != 'none') { ?>		
               getinfo('<? echo $type; ?>');
<? } ?>
            
<? if (isset($stone) && $stone > 0) { ?>		
                 getField('<? echo $stone; ?>');
<? } ?>
            
            
            
</script> 

 

<style>
    .flexigrid div.bDiv td{border: 1px solid #ccc !important; padding: 0px 10px 0px 0px !important;}
    .flexigrid div.hDiv th, div.colCopy{ border: 1px solid #ccc !important; border-bottom: 0px !important; padding: 0px 10px 0px 0px !important;}
</style>
<div class="inner">
<!--\\\\\\\ inner start \\\\\\-->
<div class="contentpanel">
    <!-- main menu start -->
        <div><?php echo admin_main_menu_list(); //// admin_mainmenu helper ?></div>
        <!-- main menu end -->
<script>
    ///// update jewelry item_sku and image url
    function update_jewelry_cols(field_id) {
        var item_sku  = $('#item_sku_'+field_id).val();
        var str       = $('#image_url_'+field_id).val();
        var image_url = str.replace("/", "_slash_");
        
	urlink = '<?php echo SITE_URL; ?>admin/update_jewelry_cols/'+field_id+'/'+item_sku+'/?image_link='+image_url;
	
	$.ajax({
                type: "GET",
                url:urlink,
                success: function(response) {
                        $('#return_mesage').html( response );
               },
               error: function(){
                  alert('Error ');
               }
          });
		   
		return false;
    }
    
var adminURL = "<?php echo config_item('base_url'); ?>admin/jcart_download_excel";

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
		
        //document.getElementById("sectionhold").innerHTML = '<img src="<?php echo SITE_URL; ?>ajax-loader.gif"  border="0" align="center" />';
		document.getElementById("sectionhold").innerHTML = '<img src="<?php echo SITE_URL; ?>ajax-loader.gif"  border="0" align="center" />';
				
        excel_download_link(sel, sub, gender);
		//alert("in ajac getCategoryBox line 38 /admin/catajaxreq");
        $.ajax({
            type: "POST",
            dataType: "post",
            //url: "<?php echo SITE_URL; ?>admin/jew_man_catajaxreq",
			url: "<?php echo SITE_URL; ?>admin/jew_man_catajaxreq",
            data: "gender="+gender+"&sel="+sel+"&sub="+sub,
            success: function(data)
            { 
            	//alert(data); 
                //alert(sel);
                document.getElementById("sectionhold").innerHTML =  data;
            }
      
        });
        
        if(gender == 'M'){
            //getSubCategoryBox(3291875018);           
            getSubCategoryBox(3291859018);           
        }else if(gender == 'U'){
            getSubCategoryBox(3291875018);            
        }
        else if(gender == 'F'){
            getSubCategoryBox(3292598018);            
        }else if(gender == 'C'){
            getSubCategoryBox(3291859021); /*intial load category by default user parent id */           
        }else if(gender == 'E'){
            getSubCategoryBox(3291859024); /*intial load category by default user parent id */           
        }
		else if(gender == 'D'){
            getSubCategoryBox(3291859042); /*intial load category by default user parent id */           
        }
		else if(gender == 'R'){
            getSubCategoryBox(3291859051); /*intial load category by default user parent id */           
        }
		else if(gender == 'CH'){
            getSubCategoryBox(3291859061); /*intial load category by default user parent id */           
        }
		else if(gender == 'CL'){
            getSubCategoryBox(3291859071); /*intial load category by default user parent id */           
        }else if(gender == 'S'){
            getSubCategoryBox(3291859081); /*intial load category by default user parent id */           
        }
		else if(gender == 'CG'){
            getSubCategoryBox(3291859200); /*intial load category by default user parent id */           
        }
    }
    function checkOpt(v){
		
		var cate_id  = document.getElementById("category").value;
		var genderID = document.getElementById("gender").value;
		
		excel_download_link(cate_id, v, genderID);
		
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
       
        document.getElementById("subsectionhold").innerHTML = '<img src="<?php echo SITE_URL; ?>ajax-loader.gif"  border="0" align="center" />';
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
        if(cat_id == '3292607018' ||  cat_id == '3292560018' ||  cat_id == '3291859018' ){ //bracelet section
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
        
        var unisex = '';
		//var adminURL = "<?php echo SITE_URL; ?>admin/jcart_download_excel";
        var s = document.getElementById('gender');
        var genderVal = s.options[s.selectedIndex].value;
		
		excel_download_link(cat_id, sub_id, genderVal);

        //alert(unisex);
       if(genderVal == 'U')
        	unisex = 'unisex';
    	
        $.ajax({
            type: "POST",
            dataType: "post",
            url: "<?php echo SITE_URL; ?>admin/jew_man_getsubcatajaxreq",
            data: "catid="+cat_id+"&subid="+sub_id+"&unisex="+unisex,
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
		//// disbale form submit when press enter
		document.getElementById("addEditForm").onsubmit = function () {
			return false;
		};  
    }
	
	//////// excel download link
	function excel_download_link(cat_id, sub_id, gender) {
				
        var sub_cateid = $('#subcategory').val();
		
		subCateId = ( ( sub_id != '' || sub_id != 'undefined' )? sub_id : sub_cateid);
		//var dlink = adminURL+"/?catid="+cat_id+"&subid="+subCateId+"&gender="+gender;
		var sb_id = (subCateId == 'undefined' ? '' : '/'+subCateId);
		var dlink = adminURL+"/"+cat_id+"/"+gender+sb_id;
		
		//alert(dlink);
            <?php if( $action_type == 'edit' ) { ?>
		setsession('category_id', cat_id);
		setsession('gender_id', gender);
		setsession('sub_cate_id', sb_id);
            <?php } ?>
                
		//document.getElementById("dexcelLink").innerHTML =  '<a href="'+dlink+'" target="_blank">Download Excel</a>';
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
    
    $('document').ready(function() {
        setInterval(setJewelryField, 1000);
    }); 
    
    function setJewelryField() {
        var item_sku     = $('#item_sku').val();
        var vendors_name = $('#vendor_name').val();
        var veondors_sku = $('#vendor_sku').val();
        var item_title   = $('#item_title').val();
        var jwsub_cate   = $('#subcategory').val();
        var metal_purity = $('#metal_purity').val();
        var metal_color  = $('#metal_color').val();
        
        //alert(item_sku);
    <?php if( $action_type == 'edit' ) { ?>    
        setsession('item_sku', item_sku);
        setsession('vendors_name', vendors_name);
        setsession('veondors_sku', veondors_sku);
        setsession('item_title', item_title);
        setsession('jwsub_cate', jwsub_cate);
        setsession('metal_purity', metal_purity);
        setsession('metal_color', metal_color);
        setsession('rings_gender', $('#gender').val() );
    <?php }?>
    
    }
    
    //// popup window for create new sub category
    function createSubCateWindow() {
        window.open("<?php echo SITE_URL; ?>adminjewelry/managedSubCategory", "Create Sub Category", "width=500, height=400, left=450, top=150");
    }
    
    //// popup window for create attribute
    function createAttributeWindow() {
        window.open("<?php echo SITE_URL; ?>adminsection/manageRingAttribute", "Create Ring Attribute", "width=750, height=400, left=300, top=150, scrollbars=1");
    }
    
    //// popup window for create attribute
    function donwloadExcelGemstones() {
        window.open("<?php echo SITE_URL; ?>admin/downlaodExcelFile", "Download excel with gemstone", "width=750, height=400, left=300, top=150, scrollbars=1");
    }
    
</script>
<?php
    $query = $this->db->query("select * from `dev_ebaycategories` where parent_id = 0");
    //$rootnumofcat = $query->result(); //mysql_num_rows($query) or die(mysql_error());
    $i = 0;
    $string = "<select name='category' id='category' onchange=\"return getDetail(this.value);\">";
    
     foreach ($query->result_array() as $root){
        
        $string = $string . "<option value='" . $root['category_id'] . "'>" . $root['category_name'] . "</option>";
        $substring = getSubcat(isset($root['id'])?$root['id']:0);
        if (!empty($substring)) {
            $string = $string . $substring;
        }
    
    $i = $i + 1;
    //echo $string; exit;  
    //continue;
    }
    //echo $root['category_id']; exit();
    $string .= "</select>";
    
    
    
    function getSubcat($rootid) {
        $ci =& get_instance();
        
        $squery = $ci->db->query("select * from `dev_ebaycategories` where parent_id = '$rootid'");
        //$subnumofcat = mysql_num_rows($squery);
        $j = 0;
        
        if ($squery->num_rows() > 0) {
            $substring = '';
            foreach ($squery->result_array() as $subcat){    
                //$subcat = mysql_fetch_array($squery) or die(mysql_error());
                $substring .= "<option value='" . $subcat['category_id'] . "'>&nbsp;|-" . $subcat['category_name'] . "</option>";
                $childstring = getMoreChilds($subcat['category_id']);
                $substring .= $substring . $childstring;
                $j = $j + 1;
            }
        }
        return trim($substring);
    }
    
    function getMoreChilds($rootid) {
        $ci =& get_instance();
        $squery = $ci->db->query("select * from `dev_ebaycategories` where parent_id = '$rootid'");
        //$subnumofcat = mysql_num_rows($squery);
        $j = 0;
        if ($squery->num_rows() > 0) {
			$substring = '';
            foreach ($squery->result_array() as $subcat){ 
                //$subcat = mysql_fetch_array($squery) or die(mysql_error());
                $substring .= "<option value='" . $subcat['category_id'] . "'>&nbsp;&nbsp;&nbsp;|----" . $subcat['category_name'] . "</option>";
                $childstring = getMoreChilds1($subcat['cat_id']);
                $substring .= $substring . $childstring;
                $j = $j + 1;
            }
        }
        return trim($substring);
    }
    
    function getMoreChilds1($rootid) {
        $ci =& get_instance();
        $squery = $ci->db->query("select * from `dev_ebaycategories` where parent_id = '$rootid'");
        //$subnumofcat = mysql_num_rows($squery);
        $j = 0;
        if ($squery->num_rows() > 0) {
			$substring = '';
            foreach ($squery->result_array() as $subcat){ 
                //$subcat = mysql_fetch_array($squery) or die(mysql_error());
                $substring .= "<option value='" . $subcat['category_id'] . "'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|----" . $subcat['category_name'] . "</option>";
                
                $j = $j + 1;
            }
        }
        return trim($substring);
    }
    
    if ($action == 'add' || $action == 'edit') {
    $this->load->helper('custom', 'form');
    $shapeoptions = '<option value=""> Select Shape </option>
    <option value="Asscher">Asscher </option>
    <option value="Cushion">Cushion </option>
    <option value="Emerald">Emerald </option>
    <option value="Heart">Heart </option>
    <option value="Marquise">Marquise </option>
    <option value="Oval">Oval </option>
    <option value="Pear">Pear </option>
    <option value="Princess">Princess </option>
    <option value="Radiant">Radiant </option>
    <option value="Round">Round </option>';
    $stonesarr = '<option value="NONE">NONE</option><option value="Diamond">Diamond</option><option value="Gemstone">Gemstone</option>';
    $sizeoptions = '<option value=""> Select Size </option><option value="all">All</option><option value="8">8(+$45) </option><option value="8.5">8.5(+$45) </option><option value="9">9(+$35) </option><option value="9.5">9.5(+$35) </option><option value="10">10 </option><option value="10.5">10.5(+$35) </option><option value="11">11(+$35) </option><option value="11.5">11.5(+$45) </option><option value="12">12(+$45) </option>';
    //$sectionoptions = '<option value=""> Select Section </option><option value="EngagementRings">Engagement Rings </option><option value="Jewelry">Jewelry</option>'; 
    $metaloptions = '<option value=""> Select Metal </option><option value="10k white gold">10k white gold </option><option value="10 yellow gold">10 yellow gold</option><option value="14k white gold">14k white gold</option><option value="14k yellow gold">14k yellow gold</option><option value="18k white gold">18k white gold</option><option value="18k yellow gold">18k yellow gold</option><option value="10k two-tone">10k two-tone</option><option value="14k two-tone">14k two-tone</option><option value="18k two-tone">18k two-tone</option><option value="22k two-tone">22k two-tone</option><option value="24k two-tone">24k two-tone</option><option value="PLATINUM">PLATINUM</option><option value="SILVER">SILVER</option><option value="STAINLESS STEEL">STAINLESS STEEL</option><option value="TUNGSTEN">TUNGSTEN</option>';
    $metalcolorarr = '<option value=""> Select Metal Color </option><option value="YELLOW">YELLOW</option><option value="WHITE">WHITE</option><option value="TWO-TONE">TWO-TONE</option><option value="TRO-COLOR">TRO-COLOR</option><option value="BLACK">BLACK</option><option value="ROSE">ROSE</option>';
    $styleoptions = '<option value=""> Select Style </option>
    <option value="Sidestones">Side Stones</option>
    <option value="Pave">Pave </option>
    <option value="Solitaire">Solitaire </option>
    <option value="Three Stones">Three stones</option>
    <option value="Wedding Bands">Wedding Bands </option>
    <option value="MatchingSet">Matching Set</option>
    <option value="Anniversary Ring">Anniversary Ring</option>
    <option value="Bridal Set">Bridal Set </option>
    <option value="Channel">Channel</option>
    <option value="Halo">Halo</option>';
    if (isset($details)) {
    $item_sku = isset($details['item_sku']) ? $details['item_sku'] : '';
    $ebayid = isset($details['ebayid']) ? $details['ebayid'] : 0;
    $vendor_name = isset($details['vendor_name']) ? $details['vendor_name'] : '';
    $vendor_sku = isset($details['vendor_sku']) ? $details['vendor_sku'] : '';
    $item_title = isset($details['item_title']) ? $details['item_title'] : '';
    $marketplace_on_amazon = isset($details['marketplace_on_amazon']) ? $details['marketplace_on_amazon'] : '';
    $marketplace_on_ebay = isset($details['marketplace_on_ebay']) ? $details['marketplace_on_ebay'] : '';
    $marketplace_on_website = isset($details['marketplace_on_website']) ? $details['marketplace_on_website'] : '';
    $price_amazon = isset($details['price_amazon']) ? $details['price_amazon'] : '';
    $price_ebay = isset($details['price_ebay']) ? $details['price_ebay'] : '';
    $price_website = isset($details['price_website']) ? $details['price_website'] : '';
    $quantity = isset($details['quantity']) ? $details['quantity'] : '';
    $gender = isset($details['gender']) ? $details['gender'] : '';
    $category = isset($details['category']) ? $details['category'] : '3292598018';
    $subcategory = isset($details['subcategory']) ? $details['subcategory'] : '3292613018';
    $metal_type = isset($details['metal_type']) ? $details['metal_type'] : '';
    $metal_purity = isset($details['metal_purity']) ? $details['metal_purity'] : '';
    $metal_color = isset($details['metal_color']) ? $details['metal_color'] : '';
    $finish = isset($details['finish']) ? $details['finish'] : '';
    $category_type = isset($details['category_type']) ? $details['category_type'] : '';
    $description = isset($details['description']) ? $details['description'] : '';
    $style = isset($details['style']) ? $details['style'] : '';
    $ring_size = isset($details['ring_size']) ? $details['ring_size'] : '';
    $avail_size = isset($details['avail_size']) ? $details['avail_size'] : '';
    $measurements = isset($details['measurements']) ? $details['measurements'] : '';
    
    $weight = isset($details['weight']) ? $details['weight'] : '';
    $length = isset($details['length']) ? $details['length'] : '';
    $width = isset($details['width']) ? $details['width'] : '';
    $chain_type = isset($details['chain_type']) ? $details['chain_type'] : '';
    $clasp_type = isset($details['clasp_type']) ? $details['clasp_type'] : '';
    $back_type = isset($details['back_type']) ? $details['back_type'] : '';
    $hoop_diameter = isset($details['hoop_diameter']) ? $details['hoop_diameter'] : '0';
    $chain_included = isset($details['is_included']) ? $details['is_included'] : '';
    $chain_style = isset($details['chain_style']) ? $details['chain_style'] : '';
    $chain_length = isset($details['chain_length']) ? $details['chain_length'] : '';
    $chain_purity = isset($details['chain_purity']) ? $details['chain_purity'] : '';
    $chain_clasp = isset($details['chain_clasp']) ? $details['chain_clasp'] : '';
    $chain_weight = isset($details['chain_weight']) ? $details['chain_weight'] : '';
    $gift_pkg = isset($details['gift_pkg']) ? $details['gift_pkg'] : '';
    $image1 = isset($details['image1']) ? $details['image1'] : '';
    $image2 = isset($details['image2']) ? $details['image2'] : '';
    $image3 = isset($details['image3']) ? $details['image3'] : '';
    $image4 = isset($details['image4']) ? $details['image4'] : '';
    $image5 = isset($details['image5']) ? $details['image5'] : '';
    $image6 = isset($details['image6']) ? $details['image6'] : '';
    $stone = isset($details['stone']) ? $details['stone'] : 0;
    $type = isset($details['gemstone_type']) ? $details['gemstone_type'] : 'none';
    } else {
    $item_sku = isset($details['item_sku']) ? $details['item_sku'] : 'jewelercart'.getRandowNumber(4);
    $ebayid = isset($details['ebayid']) ? $details['ebayid'] : 0;
    $vendor_name = isset($details['vendor_name']) ? $details['vendor_name'] : '';
    $vendor_sku = isset($details['vendor_sku']) ? $details['vendor_sku'] : '';
    $item_title = isset($details['item_title']) ? $details['item_title'] : '';
    $marketplace_on_amazon = isset($details['marketplace_on_amazon']) ? $details['marketplace_on_amazon'] : '';
    $marketplace_on_ebay = isset($details['marketplace_on_ebay']) ? $details['marketplace_on_ebay'] : '';
    $marketplace_on_website = isset($details['marketplace_on_website']) ? $details['marketplace_on_website'] : '';
    $price_amazon = isset($details['price_amazon']) ? $details['price_amazon'] : '';
    $price_ebay = isset($details['price_ebay']) ? $details['price_ebay'] : '';
    $price_website = isset($details['price_website']) ? $details['price_website'] : '';
    $quantity = isset($details['quantity']) ? $details['quantity'] : '1';
    $gender = isset($details['gender']) ? $details['gender'] : '';
    $category = isset($details['category']) ? $details['category'] : '3292598018';
    $subcategory = isset($details['subcategory']) ? $details['subcategory'] : '3292613018';
    $metal_type = isset($details['metal_type']) ? $details['metal_type'] : '';
    $metal_purity = isset($details['metal_purity']) ? $details['metal_purity'] : '';
    $metal_color = isset($details['metal_color']) ? $details['metal_color'] : '';
    $finish = isset($details['finish']) ? $details['finish'] : '';
    $category_type = isset($details['category_type']) ? $details['category_type'] : '';
    $description = isset($details['description']) ? $details['description'] : '';
    $style = isset($details['style']) ? $details['style'] : '';
    $ring_size = isset($details['ring_size']) ? $details['ring_size'] : '';
    $avail_size = isset($details['avail_size']) ? $details['avail_size'] : '';
    $measurements = isset($details['measurements']) ? $details['measurements'] : '';
    
    $weight = isset($details['weight']) ? $details['weight'] : '';
    $length = isset($details['length']) ? $details['length'] : '';
    $width = isset($details['width']) ? $details['width'] : '';
    $chain_type = isset($details['chain_type']) ? $details['chain_type'] : '';
    $clasp_type = isset($details['clasp_type']) ? $details['clasp_type'] : '';
    $back_type = isset($details['back_type']) ? $details['back_type'] : '';
    $hoop_diameter = isset($details['hoop_diameter']) ? $details['hoop_diameter'] : '0';
    $chain_included = isset($details['is_included']) ? $details['is_included'] : '';
    $chain_style = isset($details['chain_style']) ? $details['chain_style'] : '';
    $chain_length = isset($details['chain_length']) ? $details['chain_length'] : '';
    $chain_purity = isset($details['chain_purity']) ? $details['chain_purity'] : '';
    $chain_clasp = isset($details['chain_clasp']) ? $details['chain_clasp'] : '';
    $chain_weight = isset($details['chain_weight']) ? $details['chain_weight'] : '';
    $gift_pkg = isset($details['gift_pkg']) ? $details['gift_pkg'] : '';
    $image1 = isset($details['image1']) ? $details['image1'] : '';
    $image2 = isset($details['image2']) ? $details['image2'] : '';
    $image3 = isset($details['image3']) ? $details['image3'] : '';
    $image4 = isset($details['image4']) ? $details['image4'] : '';
    $image5 = isset($details['image5']) ? $details['image5'] : '';
    $image6 = isset($details['image6']) ? $details['image6'] : '';
    $stone = isset($details['stone']) ? $details['stone'] : 0;
    $type = isset($details['gemstone_type']) ? $details['gemstone_type'] : 'none';
    }
    $id = isset($id) ? $id : '';
    ?>
<div class="blue_man">
<div class="blue_admin_box1">
<div class="addcountry_box">
  <div class="heading">
    <h1 class="hbb" align="center">
      <?= ucfirst($action) ?>
      Rings</h1>
    <br/>
  </div>
  <!-- Message Part -->
  <div style="width:100%;">
    <? if(isset($success) && !empty($success)){ ?>
    <div style="width:95.5%; margin:5px; padding:10px 10px 10px 10px; background-color:#C8F2BB; font-weight:bold"> <? echo $success;   ?> </div>
    <? } ?>
  </div>
  <div style="clear:both"></div>
  <!-- End -->
  <div class="search_box">
    <form name="addEditForm" id="addEditForm" action="<?php echo config_item('base_url'); ?>admin/jewelries_manager/<?php echo $action;
    echo ($action == 'edit') ? '/' . $id : ''; ?>" method="post" enctype="multipart/form-data" >
           <table class="table" width="80%" border="0" align="center" cellpadding="5" cellspacing="0" class="table_border">
  <!--Warning Class-->
<!--end of displaying warning class-->
     <h1 style="color:navy;font-weight:bold;font-family:serif;">  <legend>JEWELRY INFORMATION</legend></h1>

 <tr>
      <td width="20%" align="right">Item Sku</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
           <input type="text" name="item_sku" id="item_sku" value="<?php echo $item_sku; ?>" maxlength="30"  size="40"  class="form-control input1 required alpha" / >
            </dd>
      </td>
    </tr>  
    
 
 <tr>
      <td width="20%" align="right">Vendor Name</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
          <input type="text" name="vendor_name" id="vendor_name" value="<?php echo $vendor_name; ?>" maxlength="30"  size="40" class="form-control input1 required alpha" /><?php echo form_error('vendor_name'); ?> 											
            </dd>
      </td>
    </tr>  
  
     
 <tr>
      <td width="20%" align="right">Vendor Sku</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
          <input type="text" name="vendor_sku"  id ="vendor_sku" class="form-control" value="<?php echo $vendor_sku; ?>" maxlength="30"  size="40" /><?php echo form_error('vendor_sku'); ?> 											
            </dd>
      </td>
    </tr>  
  
     <tr>
      <td width="20%" align="right">Title</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
            <input type="text" name="item_title" id="item_title" class="form-control" required="" value="<?php echo $item_title; ?>" maxlength="80"  size="90" />
            <?php echo form_error('item_title'); ?> 
            </dd>
      </td>
    </tr>  
    
<!--    <tr>
      <td width="20%" align="right">Title</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
           <input type="text" name="item_title" id="item_title" value="<?php echo $item_title; ?>" maxlength="80"  size="90" />
            <?php echo form_error('item_title'); ?> 
            </dd>
      </td>
    </tr>  -->
    
    <tr>
      <td width="20%" align="right">Marketplace</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
           &nbsp;&nbsp;Ebay<input type="checkbox" name="marketplace_on_ebay" id="marketplace_on_ebay"  value="1"  <? if ($marketplace_on_ebay == '1') {
        echo 'checked="checked"';
    } ?>  />&nbsp;&nbsp;Website  <input type="checkbox" name="marketplace_on_website" id="marketplace_on_website"  value="1"  <? if ($marketplace_on_website == '1') {
        echo 'checked="checked"';
    } ?> />&nbsp;&nbsp;Amazon  <input type="checkbox" name="marketplace_on_amazon" id="marketplace_on_amazon"  value="1"  <? if ($marketplace_on_amazon == '1') {
                            echo 'checked="checked"';
                        } ?> />
            </dd>
      </td>
    </tr>  
                     

    <tr>
      <td width="20%" align="right">Price Amazon</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
           <input type="text" name="price_amazon" class="form-control" id="price_amazon" value="<?php echo $price_amazon; ?>" maxlength="30"  size="40" />
    <?php echo form_error('price_amazon'); ?> 	
            </dd>
      </td>
    </tr>  
    
    
    <tr>
      <td width="20%" align="right">Retail Price</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
           <input type="text" name="retail" class="form-control" id="retail" value="<?php echo $retail; ?>" maxlength="30"  size="40" />
            </dd>
      </td>
    </tr>  
    
   <tr>
      <td width="20%" align="right">Price eBay</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
            <input type="text" name="price_ebay" class="form-control" id="price_ebay" value="<?php echo $price_ebay; ?>" maxlength="30"  size="40" />
    <?php echo form_error('price_ebay'); ?> 	
            </dd>
      </td>
    </tr>  
    
    <tr>
      <td width="20%" align="right">Wholesale price</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
             <input type="text" name="price_website" class="form-control" id="price_website" value="<?php echo $price_website; ?>" maxlength="30"  size="40" />
    <?php echo form_error('price_website'); ?> 		
            </dd>
      </td>
    </tr>  
               
 <tr>
      <td width="20%" align="right">Quantity</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
             <input type="text" name="quantity" class="form-control"  id = "quantity" value="<?php echo $quantity; ?>" maxlength="15" class="q" />	
            </dd>
      </td>
    </tr>  
              
 <tr>
      <td width="20%" align="right">Gender</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
             <select name="gender" id="gender" class="form-control" onchange="getCategoryBox(this.value,'<? echo $category; ?>','<? echo $subcategory; ?>');">
                                <?php
                                $genderOptions = array("M" => "Men's", "F" => "Women's", "U" => "Unisex", "C" => "Children", "E" => "Estate", "D" => "Designers", "R" => "Religious", "CH" => "Charms", "CL" => "Clearance", "S" => "Services","CG"=>"Colored Gemstones");
                                foreach ($genderOptions as $k => $v):
                                    if ($k == $gender) {
                                        echo "<option value='" . $k . "' selected='selected' >" . $v . "</option>";
                                    } else {
                                        echo "<option value='" . $k . "'>" . $v . "</option>";
                                    }
                                endforeach;
                                ?>
                            </select>
            </dd>
      </td>
    </tr>  
              
 <tr>
      <td width="20%" align="right">Jewelry Category</td>
      <td colspan="3"><!--<dt id="account_name-label">&nbsp;<?php //echo $string;?></dt>-->
        <dd id="account_name-element">
            <div id="sectionhold"></div>
            <div id="subsectionhold"></div>
        </dd>
        <br />
        <div><a href="#javascript" onclick="createSubCateWindow()">Create Sub Category</a></div>
        <div><a href="#javascript" onclick="createAttributeWindow()">Create Jewelry Attributes</a></div>
        <div id="dexcelLink">
<!--            <a href="<?php echo config_item('base_url'); ?>admin/jcart_download_excel" onclick="donwloadExcelGemstones()">Download Excel</a>-->
            <a href="#javascript" onclick="donwloadExcelGemstones()">Download Excel</a>
        </div>
      </td>
    </tr>  
         
   <tr>
      <td width="20%" align="right">Metal Type</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
                   <input type="text" name="metal_type" class="form-control" value="<?php echo $metal_type; ?>" maxlength="30"  size="40" />
    <?php echo form_error('metal_type'); ?> 	
            </dd>
      </td>
    </tr>  
     
    <tr>
      <td width="20%" align="right">Metal Purity</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
                  <select class="commondropdown" class="form-control" name="metal_purity" id="metal_purity">
    <?php echo makeOptionSelected($metaloptions, $metal_purity); ?>
                            </select> <?php echo form_error('metal_purity'); ?> 	
            </dd>
      </td>
    </tr>                             

                      
<tr>
      <td width="20%" align="right">Metal Color</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
                  <select class="commondropdown" class="form-control" name="metal_color" id="metal_color">
    <?php echo makeOptionSelected($metalcolorarr, $metal_color); ?>
                            </select> <?php echo form_error('metal_color'); ?> 	
            </dd>
      </td>
    </tr>
    <?php
        //// edit the jewelry details columns
        $jewelry_detcols = '';
        
        if( count($global_fields) > 0 ) {
            foreach( $global_fields as $grows ) {
                $jewelry_detcols .= '<tr>
                    <td width="20%" valign="top" align="right">'.$grows[0].'<input type="hidden" name="jewlabel[]" value="'.$grows[0].'" /></td>';
                
                if( $grows[0] != 'Description') {
                    $jewelry_detcols .= '<td colspan="3"><input type="text" name="jew_field[]" value="'.$grows[1].'" /></td>';
                } else {
                    $jewelry_detcols .= '<td colspan="3"><textarea name="desc_field" rows="10" cols="10">'.$grows[1].'</textarea></td>';
                }                
                
                $jewelry_detcols .= '</tr>';
            }
        }
        
        echo $jewelry_detcols;
        
    ?>
                      
 <tr>
      <td width="20%" align="right">Finish</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
                  <input type="text" name="finish" class="form-control" id="finish" value="<?php echo $finish; ?>"   size="100" />
    <?php echo form_error('finish'); ?> 
            </dd>
      </td>
    </tr>     
              
  <!--Braclates  extra fields -->
  <tr><td></td><td colspan="4" id="bracletextraFields" style="display:none;" align="center">
<!-- <div id="bracletextraFields" style="display:none;"> -->
<table width="100%" align="center"class="table">
  <tr>
      <td width="20%" align="right">Bracelet Style</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
               <input type="text" name="bracelet_style" class="form-control" id="bracelet_style"  value="<?php echo $style; ?>"    size="50" /><?php echo form_error('bracelet_style'); ?> 
            </dd>
      </td>
    </tr>   
  <tr>
      <td width="20%" align="right">Bracelet Claps Type</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
               <input type="text" name="bracelet_clasp_type" class="form-control" id="bracelet_clasp_type"  value="<?php echo $bracelet_clasp_type; ?>"    size="50" />
            </dd>
      </td>
    </tr>  
  <tr>
      <td width="20%" align="right">Bracelet Length</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
            <input type="text" name="bracelet_length" class="form-control" id="bracelet_length"  value="<?php echo $length; ?>"    size="50" />
            </dd>
      </td>
    </tr>  
    <tr>
      <td width="20%" align="right">Bracelet Width</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
            <input type="text" name="bracelet_width" class="form-control" id="bracelet_width" value="<?php echo $width; ?>" size="50" />
            </dd>
      </td>
    </tr>   </table>  
</td></tr>
 <!-- End extra fields -->

 <!--Chain  extra fields -->
      <!-- <div id="chainextraFields" style="display: none;" > -->
<tr><td></td><td colspan="4" id="chainextraFields" style="display:none;" align="center"> 
        <table width="100%"class="table">
     <tr>
      <td width="20%" align="right">Chain Style</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
               <input type="text" name="main_chain_style" class="form-control" id="main_chain_style"  value="<?php echo $style; ?>"    size="50" /><?php echo form_error('style'); ?>
            </dd>
      </td>
    </tr>   
    
     <tr>
      <td width="20%" align="right">Chain type</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
               <input type="text" name="chain_type" class="form-control" id="chain_type"  value="<?php echo $chain_type; ?>"    size="50" />
            </dd>
      </td>
    </tr>   
        
    <tr>
      <td width="20%" align="right">Chain Length</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
               <input type="text" name="main_chain_length" class="form-control" id="main_chain_length"  value="<?php echo $chain_length; ?>"    size="50" />
            </dd>
      </td>
    </tr>   
    
     <tr>
      <td width="20%" align="right">Chain Width</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
             <input type="text" name="chain_width" class="form-control" id="chain_width" value="<?php echo $width; ?>" size="50" />
            </dd>
      </td>
    </tr>  

     <tr>
      <td width="20%" align="right">Claps Type</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
               <input type="text" name="main_chain_clasp" class="form-control" id="main_chain_clasp"  value="<?php echo $chain_clasp; ?>"    size="50" />
            </dd>
      </td>
    </tr>   
    
     <tr>
      <td width="20%" align="right">Chain Weight</td>
      <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
        <dd id="account_name-element">
             <input type="text" name="main_chain_weight" class="form-control" id="main_chain_weight"  value="<?php echo $chain_weight; ?>" size="60"   />
            </dd>
      </td>
    </tr>  </table></td></tr>

<!-- End extra fields -->

<!--Earnings  extra fields -->
<!--    <div id="earningextraFields" style="display:none;">-->
<tr><td></td><td colspan="4" id="earningextraFields" style="display:none;" align="center"> 
        <table width="100%" class="table">
        <tr id="earningstyle">
            <td width="20%" align="right">Earring Style</td>
            <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                <dd id="account_name-element">
                      <input type="text" size="90" name="earring_style" class="form-control" id="earring_style" value="<? echo $style; ?>" /><?php echo form_error('style'); ?> 
                    </dd>
            </td>
        </tr>  
        
        <tr>
            <td width="20%" align="right">Earring Back Type</td>
            <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                <dd id="account_name-element">
                      <input type="text" name="back_type" id="back_type" class="form-control"  value="<?php echo $back_type; ?>"    size="50" />
                    </dd>
            </td>
        </tr>  
        
        <tr>
            <td width="20%" align="right">Earring Width</td>
            <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                <dd id="account_name-element">
                      <input type="text" name="earring_width" class="form-control" id="earring_width" value="<?php echo $width; ?>" size="50" />
                    </dd>
            </td>
        </tr>  
        
         <tr>
            <td width="20%" align="right">Hoop Diameter</td>
            <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                <dd id="account_name-element">
                    <input type="text" name="hoop_diameter" class="form-control" id="hoop_diameter"  value="<?php echo $hoop_diameter; ?>" size="60" class="hoop_diameter" />
                    </dd>
            </td>
        </tr>  
        
           <tr>
            <td width="20%" align="right">Earring Weight</td>
            <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                <dd id="account_name-element">
                    <input type="text" name="earring_weight" class="form-control" id="earring_weight"  value="<?php echo $weight; ?>" size="60" class="earring_weight" />
                    </dd>
            </td>
        </tr>  
           </table></td></tr>
<!-- End extra fields -->

 <!--Pendants  extra fields -->
<!--<div id="pendantextraFields" style="display: none;" >-->
<tr><td></td><td colspan="4" id="pendantextraFields" style="display:none;" align="center"> 
        <table class="table" width="100%">
    
    <tr>
            <td width="20%" align="right">Pendant Style</td>
            <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                <dd id="account_name-element">
                  <input type="text" name="pendant_style" id="pendant_style" class="form-control"  value="<?php echo $style; ?>"    size="50" /><?php echo form_error('style'); ?> 
                    </dd>
            </td>
        </tr>  
      <tr>
            <td width="20%" align="right">Pendant Weight</td>
            <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                <dd id="account_name-element">
                  <input type="text" name="pendant_weight" id="pendant_weight" class="form-control" value="<?php echo $weight; ?>" size="50" />
                    </dd>
            </td>
        </tr>      
        
      <tr>
            <td width="20%" align="right">Pendant Length</td>
            <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                <dd id="account_name-element">
                  <input type="text" name="pendant_length" id="pendant_length" class="form-control"  value="<?php echo $length; ?>"    size="50" />
                    </dd>
            </td>
        </tr>   
        
       <tr>
            <td width="20%" align="right">Pendant Width</td>
            <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                <dd id="account_name-element">
                  <input type="text" name="pendant_width" id="pendant_width" class="form-control" value="<?php echo $width; ?>" size="50" />
                    </dd>
            </td>
        </tr>    
        
        <tr>
            <td width="20%" align="right">Chain Included</td>
            <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                <dd id="account_name-element">
                  <input type="checkbox" name="chain_included" class="form-control" id="chain_included"  value="1" <? if ($chain_included == '1') { echo "checked='checked'";    }  ?> size="60" class="chain_included"  onclick="enableMore();" />&nbsp;Chain Included
                    </dd>
            </td>
        </tr>    
        
         <tr>
            <td width="20%" align="right">Pendant Width</td>
            <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                <dd id="account_name-element">
                  <input type="text" name="pendant_width" id="pendant_width" class="form-control" value="<?php echo $width; ?>" size="50" />
                    </dd>
            </td>
        </tr>    
  
                            <div id="moreFields" style="display:none;">
  <tr>
            <td width="20%" align="right">Chain Style</td>
            <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                <dd id="account_name-element">
                  <input type="text" name="chain_style" id="chain_style" class="form-control" value="<?php echo $chain_style; ?>" size="50" />
                    </dd>
            </td>
        </tr>    
  
        <tr>
            <td width="20%" align="right">Chain length</td>
            <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                <dd id="account_name-element">
            <input type="text" name="chain_length" id="chain_length" class="form-control" value="<?php echo $chain_length; ?>" size="50" />
                    </dd>
            </td>
        </tr>
        
        
        <tr>
            <td width="20%" align="right">Chain Purity</td>
            <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                <dd id="account_name-element">
            <input type="text" name="chain_purity" id="chain_purity" class="form-control" value="<?php echo $chain_purity; ?>" size="50" />
                    </dd>
            </td>
        </tr>
        
            <tr>
            <td width="20%" align="right">Clasp</td>
            <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                <dd id="account_name-element">
                    <input type="text" name="chain_clasp" id="chain_clasp" class="form-control" value="<?php echo $chain_clasp; ?>" size="50" />
                    </dd>
            </td>            
        </tr>
        
          <tr>
            <td width="20%" align="right">Chain Weight</td>
            <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                <dd id="account_name-element">
                    <input type="text" name="chain_weight" id="chain_weight" class="form-control" value="<?php echo $chain_weight; ?>" size="50" />
                    </dd>
            </td>
                            </tr> 
        </div>
           </table></td></tr>
<!-- End extra fields -->

<!-- Ring Extra Fields -->
<!--    <div id="ringextraFields" >-->
<tr><td></td><td colspan="4" id="ringextraFields"  align="center"> 
        <table width="100%" class="table">
          <tr>
            <td width="20%" align="right">Ring Style</td>
            <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                <dd id="account_name-element">
                    <select class="commondropdown" name="ring_style" class="form-control" id="ring_style">
                                <?php echo makeOptionSelected($styleoptions, $style); ?>
                    </select> <?php echo form_error('style'); ?> 
                    </dd>
            </td>
            </tr>
        
             <tr>
            <td width="20%" align="right">Ring Size</td>
            <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                <dd id="account_name-element">
                      <input type="text" name="ring_size"  id="ring_size" class="form-control" value="<?php echo $ring_size; ?>"    size="50" />
                    </dd>
            </td>
            </tr>
            
           <tr>
            <td width="20%" align="right">Avail sizes</td>
            <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                <dd id="account_name-element">
                      <select class="commondropdown" name="avail_size" class="form-control" id="avail_size" >
                                <?php echo makeOptionSelected($sizeoptions, $avail_size); ?>
                                </select> <?php echo form_error('avail_size'); ?> 
                    </dd>
            </td>
            </tr>
      
           <tr>
            <td width="20%" align="right">Measurements</td>
            <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                <dd id="account_name-element">
                     <input type="text" name="ring_measurements" id="ring_measurements" class="form-control"  value="<?php echo $measurements; ?>" size="60" class="measurements" />
                    </dd>
            </td>
            </tr>

           <tr>
            <td width="20%" align="right">Ring Weight</td>
            <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                <dd id="account_name-element">
                     <input type="text" name="ring_weight" id="ring_weight" class="form-control" value="<?php echo $weight; ?>" size="60" class="weight" />
                    </dd>
            </td>
            </tr>
<!--</div>	--></table>
           </td></tr>
<!-- End Ring extra fields -->



<!--Stud Earnings  extra fields -->
<!--<div id="studearningextraFields" style="display:none;">-->
<tr><td></td><td colspan="4" id="studearningextraFields"  style="display:none;" align="center"> 
    <table width="100%" class="table">
    
           <tr>
            <td width="20%" align="right">Earring Style</td>
            <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                <dd id="account_name-element">
                   <input type="text" name="earring_style" id="earring_style"  class="form-control" value="<?php echo $style; ?>"    size="50" /><?php echo form_error('style'); ?>  
                    </dd>
            </td>
            </tr>
            
            
           <tr>
            <td width="20%" align="right">Earring Back Type</td>
            <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                <dd id="account_name-element">
                     <input type="text" name="back_type" id="back_type"  class="form-control" value="<?php echo $back_type; ?>"    size="50" />
                    </dd>
            </td>
            </tr>
            
            <tr>
            <td width="20%" align="right">Measurements</td>
            <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                <dd id="account_name-element">
                     <input type="text" name="earring_measurements" class="form-control" id="earring_measurements"  value="<?php echo $measurements; ?>" size="60" class="measurements" />
                    </dd>
            </td>
            </tr>
            
             <tr>
            <td width="20%" align="right">Post Length</td>
            <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                <dd id="account_name-element">
                     <input type="text" name="post_length" id="post_length" class="form-control" value="<?php echo $length; ?>" size="50" />
                    </dd>
            </td>
            </tr>
            
              <tr>
            <td width="20%" align="right">Earring Weight</td>
            <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                <dd id="account_name-element">
                     <input type="text" name="earring_weight" id="earring_weight" class="form-control"  value="<?php echo $weight; ?>" size="60" class="weight" />
                    </dd>
            </td>
            </tr>
<!--</div>	--></table></td></tr>

<!-- End extra fields -->
  <tr>
            <td width="20%" align="right">Description</td>
            <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                <dd id="account_name-element">
                     <textarea name="description"  id="description" class="form-control" style="width: 400px;height: 60px;"><?php echo $description; ?></textarea> 
                    </dd>
            </td>
            </tr>
     
              <tr>
            <td width="20%" align="right">Type</td>
            <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                <dd id="account_name-element">
                     <select name="type" id="type" class="form-control" onchange="getinfo(this.value)">
    <?
    $typeArr = array("NONE" => "None", "gemstone" => "Gemstone", "multiple" => "Multidiminal Gemstone");
    foreach ($typeArr as $t => $v):
        if ($type == $t) {
            echo '<option value="' . $t . '" selected="selected">' . $v . '</option>';
        } else {
            echo '<option value="' . $t . '" >' . $v . '</option>';
        }
    endforeach;
    ?></select>
                    </dd>
            </td>
            </tr>
								
 <tr>
     <td colspan="4"  align="center">
                <div id="gemstone_info" style="display:none;">
                        <h1 style="color:navy;font-weight:bold;font-family:serif;" >GEMSTONE INFORMATION</h1>

                            <table border="0" align="left" width="100%" class="table">
                                <tr>
                                    <td colspan="2"> 
                                        <table width="100%" border="1" style="border-collapse: collapse;">
                                            Stones:<input type="text" value="<? echo $stone; ?>" name="stone" size="4" id="stone"   onchange="getField(this.value)"  />
                                            <tr>
                                                <th valign="top" style="width:96px;">Gemstone</th>
                                                <th valign="top" style="width:90px;">Class</th>
                                                <th valign="top" style="width:90px;">Color</th>
                                                <th valign="top" style="width:79px;">Birthstone <br> Mon.</th>
                                                <th valign="top" style="width:101px;">Shape</th>
                                                <th valign="top" style="width:101px;">Stone Size</th>
                                                <th valign="top" style="width:58px;"># of <br> Gems.</th>
                                                <th valign="top" style="width:101px;">Total<br>weight(approx.)</th>
                                                <th valign="top" style="width:101px;">Setting</th>
                                            </tr>
                                            <tr>
                                                <td colspan="9">
                                                    <div id="gemHoldBox"></div>    
                                                </td>
                                            </tr>
                                        </table>    
                                    </td>
                                </tr></table>                          
                    </div>    
     </td>
 </tr>
  <tr>
     <td colspan="4"  align="center">
                    <div id="package_info">
                        <h1 style="color:navy;font-weight:bold;font-family:serif;">PACKAGING INFORMATION</h1>
                            <tr>
                            <td width="20%" align="right">Gift Package</td>
                            <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                                <dd id="account_name-element">
                                    <input type="text" name="gift_pkg" class="form-control" id="gift_pkg" size="90"  value="<?php echo $gift_pkg; ?>"  />
                                    </dd>
                            </td>
                            </tr>                                                   
                    </div>
     </td>
  </tr>
  <tr>
    <td colspan="4" align="left">
    <br />
    <fieldset style="background: #fff;">
                        <legend><strong>Import Excel File</strong></legend>
                        <div><br /><input type="file" name="import_xlfile" /></div>
                        <br />
                    </fieldset>
    </td>
  </tr>     
  <tr>
     <td colspan="4"  align="center">
            <table  border="0" align="left" width="100%"/>
            <tr>
                <td colspan="2"> 
                    <table width="100%"><tr><td valign="top">
                                <fieldset style="background: #fff;">
                                    <legend>Ring Image1</legend>
                                    <center>
    <?php {

        if (file_exists(config_item('base_path') . 'images/jewelercart/' . $image1) && $image1 != '')
            echo '<img width="120" height="120" src="' . config_item('base_url') . 'images/jewelercart/' . $image1 . '" style="width: 80px; height: 80px;"><br />';
        else
            echo '<img src="' . config_item('base_url') . 'images/jewelercart/noringimage.png" style="width: 80px; height: 80px;"><br />';
        //  echo '<small>Upload new image will replace the old image</small><br />'; 
    }
    ?>
                                        <input type="file" name="image1" id="image1" value=""  /> 
                                    </center>
                                </fieldset>	
                            </td>
                            <td>
                                <fieldset style="background: #fff;">
                                    <legend>Ring image2</legend>
                                    <center>
    <?php {

        if (file_exists(config_item('base_path') . 'images/jewelercart/' . $image2) && $image2 != '')
            echo '<img src="' . config_item('base_url') . 'images/jewelercart/' . $image2 . '" style="width: 80px; height: 80px;"><br />';
        else
            echo '<img src="' . config_item('base_url') . 'images/jewelercart/noringimage.png" style="width: 80px; height: 80px;"><br />';
        //   echo '<small>Upload new image will replace the old image</small><br />'; 
    }
    ?>
                                        <input type="file" name="image2" id="image2" value=""  /> 
                                    </center>
                                </fieldset>	
                            </td>

                            <td>
                                <fieldset style="background: #fff;">
                                    <legend>Ring image3</legend>
                                    <center>
    <?php {

        if (file_exists(config_item('base_path') . 'images/jewelercart/' . $image3) && $image3 != '')
            echo '<img src="' . config_item('base_url') . 'images/jewelercart/' . $image3 . '" style="width: 80px; height: 80px;"><br />';
        else
            echo '<img src="' . config_item('base_url') . 'images/jewelercart/noringimage.png" style="width: 80px; height: 80px;"><br />';
    }
    ?>
                                        <input type="file" name="image3" id="image3" value=""  /> 
                                    </center>
                                </fieldset>	
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <br>
                    <fieldset style="background: #fff;">
                        <legend>Rings Images (Bigger)</legend>
                        <table align="center"  width="100%">
                            <tr> 
                                <td>
                            <center>
                                <?php {

                                    if (file_exists(config_item('base_path') . 'images/jewelercart/' . $image4) && $image4 != '')
                                        echo '<img width="158" height="158" src="' . config_item('base_url') . 'images/jewelercart/' . $image4 . '"><br />';
                                    else
                                        echo '<img src="' . config_item('base_url') . 'images/jewelercart/noringimage.png" width="158" height="158" ><br />';
                                    //echo '<small>Upload image of the ring from 45&deg; angle</small><br />'; 
                                }
                                ?>
                                <input type="file" name="image4" id="image4" value=""  /> 
                            </center>
                            </td>

                            <td>
                            <center>
                                <?php {

                                    if (file_exists(config_item('base_path') . 'images/jewelercart/' . $image5) && $image5 != '')
                                        echo '<img width="158" height="158" src="' . config_item('base_url') . 'images/jewelercart/' . $image5 . '"><br />';
                                    else
                                        echo '<img src="' . config_item('base_url') . 'images/jewelercart/noringimage.png" width="158" height="158" ><br />';
                                    //echo '<small>Upload image of the ring from 90&deg; angle</small><br />'; 
                                }
                                ?>
                                <input type="file" name="image5" id="image5" value=""  /> 
                            </center>
                            </td>

                            <td>
                            <center>
    <?php {

        if (file_exists(config_item('base_path') . 'images/jewelercart/' . $image6) && $image6 != '')
            echo '<img width="158" height="158" src="' . config_item('base_url') . 'images/jewelercart/' . $image6 . '"><br />';
        else
            echo '<img src="' . config_item('base_url') . 'images/jewelercart/noringimage.png" width="158" height="158" ><br />';
        //echo '<small>Upload image of the ring from 180&deg; angle</small><br />'; 
    }
    ?>
                                <input type="file" name="image6" id="image6" value=""  /> 
                            </center>
                            </td>

                            </tr>
                        </table>
                    </td>                        
            </tr>
    <tr>
          <td align="right">&nbsp;</td>
	  <td width="3%" align="left" valign="top"><dt id="edit-label">&nbsp;</dt><dd id="edit-element">
            <input type="submit" name="<?=$action;?>btn" id="edit" value="<?= ucfirst($action); ?>" class="search_but btn btn-primary"></dd>&nbsp;</td>          
          <td width="74%" align="left" valign="top"><dt id="back-label">&nbsp;</dt><dd id="back-element">
            &nbsp; <button name="back" id="back" type="button" class="search_but btn btn-primary"  onclick="history.go(-1);">Back</button></dd></td>
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
      <div id="jewelry_update"></div>
    <div>
      <table id="results" style="display:none; ">
      </table>
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
  </div>
  <!--\\\\\\\ inner end\\\\\\--> 
</div>
<!--\\\\\\\ wrapper end\\\\\\--> 
<!-- Modal -->
<?php echo popupsOtherBlockData(); ?>
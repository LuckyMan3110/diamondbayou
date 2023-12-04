<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php echo ADMIN_LIB; ?>css/adminstyle.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo ADMIN_LIB; ?>css/admin.css" rel="stylesheet" type="text/css" />
        <script src="<?php echo ADMIN_LIB; ?>js/jquery-1.12.4.js" type="text/javascript"></script>
        <script>
            var baselink = '<?php echo SITE_URL; ?>';
                                    
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
            
            function getinfo(v){

                if(v != 'NONE'){
                    document.getElementById("gemstone_info").style.display = 'block';
                }else{
                    document.getElementById("gemstone_info").style.display = 'none';
                }

            }
            
            function submit_gemstone_form() {
                document.getElementById('gemstone_form').submit();
            }
        </script>
        <style>
            .main_form_block{width: 700px !important; margin-bottom: 20px; padding-bottom: 20px;}
            body{background: #fff !important;}
            .orderdt_block{width: 100% !important;}
        </style>
    </head>
    <body>
        <div class="main_form_block">
            <h2>Managed Jewelry Attributes</h2><br>
            <div class="submit_msg"><?php echo $submit_form; ?></div>
            
            <div class="categform_block">
                <form name="jewelryform" id="jewelryform" method="post" action="">
                    <div class="formslabel">Jewelry Type:</div>
                    <div class="formsfield">
                        <select name="type" id="type" onchange="getinfo(this.value)">
                            <option value="NONE">None</option>
                            <option value="gemstone">Gemstone</option>
                            <option value="multiple">Multidiminal Gemstone</option>
                        </select>
                    </div>
                    <div class="clear"></div>
                    <div class="formslabel">&nbsp;</div>
                </form>
                <div class="clear"></div><br>
                <div class=""><a href="#javascript" onclick="submit_gemstone_form()">Download Excel File</a></div><br>
                <div class="orderdt_block">
                    <form name="gemstone_form" id="gemstone_form" method="post" action="<?php echo $excel_file_link; ?>">
                    <div id="gemstone_info" style="display:none;">
                        <h1 style="color:navy;font-weight:bold;font-family:serif;" >GEMSTONE INFORMATION</h1>

                            <table class="attribute_list" border="0" align="left" width="100%" >
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
                    </form>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </body>
</html>

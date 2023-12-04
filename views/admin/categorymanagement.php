<div class="inner"> 
  <!--\\\\\\\ inner start \\\\\\-->
  <div class="contentpanel"> 
      <!-- main menu start -->
        <div><?php echo admin_main_menu_list(); //// admin_mainmenu helper ?></div>
        <!-- main menu end -->
    <script>
    function getsubcats(category,b)
    { 
    
    if(document.getElementById("ch"+b).checked == true) {
    document.getElementById("ch"+b).checked = false;
    document.getElementById("response_"+b).innerHTML = '';             
    }else{
    document.getElementById("ch"+b).checked = true;
    
    box = "response_"+b;
    $.ajax({
    type: "POST",
    url: "<?php echo config_item('base_url'); ?>admin/getcategorybylevel2",
    data: 	"category="+escape(category),
    success: function(html){
    document.getElementById(box).innerHTML = html;
    },
    
    error: function(){
    alert('failure');
    }
    
    });
    
    }
    }
    
    function getcatproducts(category,section)
    {     
    document.getElementById("productBox").innerHTML = '<img src="http://mike.seowebdirect.com/images/ajax.gif" border=0  />';
    $.ajax({
    type: "POST",
    url:  "<?php echo config_item('base_url'); ?>admin/getproducts",
    data: "category="+escape(category)+"&section="+escape(section),
    success: function(html){                                
    document.getElementById("productBox").innerHTML = html;
    },
    error: function(){
    alert('failure');
    }
    });	                   
    }
    
    
    </script>
    <style>
    #categoryBox
    {
    float: left;
    
    min-height: 500px;
    width: 200px;
    height: auto;
    }
    
    #productBox
    {
    
    
    min-height: 500px;
    width: 950px;
    margin-left: 230px;
    height: auto;
    
    }   
    .a{
    cursor: pointer;
    }
    .top-menu {background:url(../images/banner-top.jpg) top left no-repeat; height:96px; width:476px; float:right; text-align:right; padding-top:8px; color:#CCC;}
    .top-menu a {font-size:10px; font-family:Arial, Helvetica, sans-serif; font-weight:bold;}
    .top-menu a:hover {text-decoration:none; color:#000;}
    #main-menu {background:url(../images/menu-bg.jpg) left top repeat-x; height:48px;}
    #nav {padding:0px; margin:0; list-style:none;  position:relative; z-index:500; font-family:arial; }
    #nav li.top {display:block; float:left; height:27px; white-space:nowrap;}
    #nav li a.top_link {display:block; float:left; height:48px; line-height:48px; color:#d8d8d8; text-decoration:none; font-size:12px; font-weight:bold; padding:0px; letter-spacing:1px; cursor:pointer; background:url(../images/menu-line.jpg) right top no-repeat; white-space:nowrap;}
    #nav li a.top_link span {float:left; display:block; padding:0 39px; height:48px; white-space:nowrap;}
    #nav li a.top_link span.down {float:left; display:block; padding:0 39px; height:48px; background: url(../images/three_0a.jpg) no-repeat right top;}
    
    #nav li:hover a.top_link, #nav li:hover a.top_link span {background-color:#336699;}
    #nav li:hover a.top_link span.down {background-color:#336699 right top;}
    
    #nav li:hover {position:relative; z-index:200;}
    #nav li:hover ul.sub
    {left:1px; top:48px; background-color:#336699; padding:0px; _border:0px solid #0069A2; _border-bottom:8px solid #000; text-align:left; width:230px; height:auto; z-index:300; font-family:Arial, Helvetica, sans-serif;}
    #nav li:hover ul.sub li {display:block; position:relative; float:left; width:230px; font-weight:normal;}
    #nav li:hover ul.sub li a {display:block; font-family:Arial, Helvetica, sans-serif; font-size:10pt; letter-spacing:1px; width:100%; line-height:28px; text-indent:10px; color:#FFFFFF; text-decoration:none; _border-bottom:1px solid #0069A2; line-height:20px;}
    #nav li:hover ul.sub li a:hover {background-color:#003366; color:#ede9e8;}
    
    #nav li:hover li:hover ul,
    #nav li:hover li:hover li:hover ul,
    #nav li:hover li:hover li:hover li:hover ul,
    #nav li:hover li:hover li:hover li:hover li:hover ul
    {left:163px; top:-0px; background-color:#003366; width:100%; z-index:400; height:auto;}
    #nav li:hover ul.sub li ul li a {display:block; font-family:Arial, Helvetica, sans-serif; font-size:9pt; width:100%; line-height:28px; text-indent:5px; color:#FFF; text-decoration:none; _border:1px solid #009;}
    
    #nav ul, 
    #nav li:hover ul ul,
    #nav li:hover li:hover ul ul,
    #nav li:hover li:hover li:hover ul ul,
    #nav li:hover li:hover li:hover li:hover ul ul
    {position:absolute; left:-9999px; top:-9999px; width:0; height:0; margin:0; padding:0; list-style:none;}
    
    </style>
    <?php
    
    if(isset($msg) && !empty($msg))
    {
    echo "<p style='color:red;'>$msg</p>";
    }      
    ?>
    <form name="catfrm" method="post" action="<?php echo config_item('base_url'); ?>admin/categorymanagement">
      <div id="mainBox">
        <div id="categoryBox">
          <?php
    $i=0;
    if(isset($section) && $section == 'Quality'){
    ?>
          <li>
            <input type="checkbox" onclick="getcatproducts('Newproduct*1928Catalog2011','quality');" />
            <nobr><a  href="javascript:void(0);"  class="nosubmenu"  onclick="getcatproducts('Newproduct*1928Catalog2011','quality');" >1928 Catalog 2011</a></nobr></li>
          <li>
            <input type="checkbox" onclick="getcatproducts('Newproduct*AmoreLaVitaFallWinter2011','quality');" />
            <nobr><a  href="javascript:void(0);"  class="nosubmenu" onclick="getcatproducts('Newproduct*AmoreLaVitaFallWinter2011','quality');" >Amore La Vita Fall Winter 2011</a></nobr></li>
          <li>
            <input type="checkbox" onclick="getcatproducts('Newproduct*AmoreLaVitaSpringIntroductions2012','quality');" />
            <nobr><a  href="javascript:void(0);"  class="nosubmenu" onclick="getcatproducts('Newproduct*AmoreLaVitaSpringIntroductions2012','quality');" >AmoreLaVita Spring Introductions 2012</a></nobr></li>
          <li>
            <input type="checkbox" onclick="getcatproducts('Newproduct*Beads-Crystal','quality');" />
            <nobr><a  href="javascript:void(0);"  class="nosubmenu" onclick="getcatproducts('Newproduct*Beads-Crystal','quality');"  >Beads Crystal</a></nobr></li>
          <li>
            <input type="checkbox" onclick="getcatproducts('Newproduct*Beads-New-Introductions-Spring-2012','quality');" />
            <nobr><a  href="javascript:void(0);"  class="nosubmenu" onclick="getcatproducts('Newproduct*Beads-New-Introductions-Spring-2012','quality');"> Beads New Introductions Spring 2012</a></nobr></li>
          <li>
            <input type="checkbox" onclick="getcatproducts('Newproduct*Beads-Reflection-Beads-2012','quality');" />
            <nobr><a  href="javascript:void(0);"  class="nosubmenu" onclick="getcatproducts('Newproduct*Beads-Reflection-Beads-2012','quality');"> Beads Reflection Beads 2012</a></nobr></li>
          <li>
            <input type="checkbox" onclick="getcatproducts('Newproduct*Belle-Amore','quality');" />
            <nobr><a  href="javascript:void(0);"  class="nosubmenu" onclick="getcatproducts('Newproduct*Belle-Amore','quality');">Beads Reflection Beads Personalized</a></nobr></li>
          <li>
            <input type="checkbox" onclick="getcatproducts('Newproduct*Beads-New-Introductions-Spring-2012','quality');" />
            <nobr><a  href="javascript:void(0);"  class="nosubmenu" onclick="getcatproducts('Newproduct*Beads-New-Introductions-Spring-2012','quality');" > Belle Amore</a></nobr></li>
          <li>
            <input type="checkbox" onclick="getcatproducts('Newproduct*Body-Jewelry','quality');"  />
            <nobr><a  href="javascript:void(0);"   class="nosubmenu" onclick="getcatproducts('Newproduct*Body-Jewelry','quality');" > Body Jewelry</a></nobr></li>
          <li>
            <input type="checkbox" onclick="getcatproducts('Newproduct*Body-Jewelry-09','quality');" />
            <nobr><a  href="javascript:void(0);"   class="nosubmenu" onclick="getcatproducts('Newproduct*Body-Jewelry-09','quality');" > Body Jewelry 09</a></nobr></li>
          <li>
            <input type="checkbox" onclick="getcatproducts('Newproduct*Botanical-Harvest-2011','quality');"  />
            <nobr><a  href="javascript:void(0);"   class="nosubmenu" onclick="getcatproducts('Newproduct*Botanical-Harvest-2011','quality');" > Botanical Harvest 2011</a></nobr></li>
          <li>
            <input type="checkbox" onclick="getcatproducts('Newproduct*Bridal-Book-2012','quality');" />
            <nobr><a  href="javascript:void(0);"   class="nosubmenu" onclick="getcatproducts('Newproduct*Bridal-Book-2012','quality');" > Bridal Book 2012</a></nobr></li>
          <li>
            <input type="checkbox" onclick="getcatproducts('Newproduct*Beads-New-Introductions-Spring-2012','quality');" />
            <nobr><a  href="javascript:void(0);"   class="nosubmenu" onclick="getcatproducts('Newproduct*Beads-New-Introductions-Spring-2012','quality');" >Brilliant Embers 2012 Introductions</a></nobr></li>
          <li>
            <input type="checkbox" onclick="getcatproducts('Newproduct*Colored-Gemstones-&-Silver','quality');" />
            <nobr><a  href="javascript:void(0);"  class="nosubmenu" onclick="getcatproducts('Newproduct*Colored-Gemstones-&-Silver','quality');" >Colored Gemstones & Silver </a></nobr></li>
          <li>
            <input type="checkbox" onclick="getcatproducts('Newproduct*Family-Jewelry-Antiqued','quality');" />
            <nobr><a  href="javascript:void(0);"  class="nosubmenu"  onclick="getcatproducts('Newproduct*Family-Jewelry-Antiqued','quality');">Family Jewelry Antiqued </a></nobr></li>
          <li>
            <input type="checkbox" onclick="getcatproducts('Newproduct*disney','quality');" />
            <nobr> <a  href="javascript:void(0);"  class="nosubmenu" onclick="getcatproducts('Newproduct*disney','quality');" >disney</a></nobr></li>
          <li>
            <input type="checkbox" onclick="getcatproducts('Newproduct*Beads-New-Introductions-Spring-2012','quality');" />
            <nobr> <a  href="javascript:void(0);"  class="nosubmenu" onclick="getcatproducts('Newproduct*Beads-New-Introductions-Spring-2012','quality');" >Stackable Expressions Fall Winter 2011 </a></nobr></li>
          <li>
            <input type="checkbox" onclick="getcatproducts('Newproduct*Stackable-Expressions-Spring-2012-Introductions','quality');" />
            <nobr><a  href="javascript:void(0);"  class="nosubmenu" onclick="getcatproducts('Newproduct*Stackable-Expressions-Spring-2012-Introductions','quality');" >Stackable Expressions Spring 2012 </a></nobr></li>
          <li>
            <input type="checkbox" onclick="getcatproducts('Newproduct*Charles-W-Collection-Fine-Moissanite-Jewelry','quality');" />
            <nobr><a  href="javascript:void(0);"  class="nosubmenu" onclick="getcatproducts('Newproduct*Charles-W-Collection-Fine-Moissanite-Jewelry','quality');" >CharlesWCollection  Moissanite Jewelry </a></nobr></li>
          <li>
            <input type="checkbox" onclick="getcatproducts('Newproduct*Brilliant-Embers-Micro-Pave-2011','quality');" />
            <nobr><a  href="javascript:void(0);"   class="nosubmenu" onclick="getcatproducts('Newproduct*Brilliant-Embers-Micro-Pave-2011','quality');" >Brilliant Embers Micro Pave 2011 </a></nobr></li>
          <li>
            <input type="checkbox" onclick="getcatproducts('Newproduct*Brilliant-Embers-2012-Introductions','quality');" />
            <nobr><a   href="javascript:void(0);"   class="nosubmenu" onclick="getcatproducts('Newproduct*Brilliant-Embers-2012-Introductions','quality');" >Brilliant Embers 2012 Introductions </a></nobr></li>
          <li>
            <input type="checkbox" onclick="getcatproducts('Newproduct*Celebrate-Mom-2012','quality');" />
            <nobr><a  href="javascript:void(0);"  class="nosubmenu" onclick="getcatproducts('Newproduct*Celebrate-Mom-2012','quality');" >Celebrate Mom 2012 </a></nobr></li>
          <li>
            <input type="checkbox" onclick="getcatproducts('Newproduct*Charming-Enhancements','quality');" />
            <nobr><a   href="javascript:void(0);"  class="nosubmenu" onclick="getcatproducts('Newproduct*Charming-Enhancements','quality');" >Charming-Enhancements </a></nobr></li>
          <li>
            <input type="checkbox" onclick="getcatproducts('Newproduct*Cheryl-M-Vol-3','quality');" />
            <nobr><a  href="javascript:void(0);"   class="nosubmenu" onclick="getcatproducts('Newproduct*Cheryl-M-Vol-3','quality');" >Cheryl M Vol 3 </a></nobr></li>
          <li>
            <input type="checkbox" onclick="getcatproducts('Newproduct*Beads-New-Introductions-Spring-2012','quality');" />
            <nobr><a  href="javascript:void(0);"   class="nosubmenu" onclick="getcatproducts('Newproduct*Beads-New-Introductions-Spring-2012','quality');" >Chisel New Leather </a></nobr></li>
          <li>
            <input type="checkbox" onclick="getcatproducts('Newproduct*Claddagh-2012','quality');" />
            <nobr><a  href="javascript:void(0);"  class="nosubmenu" onclick="getcatproducts('Newproduct*Claddagh-2012','quality');" >Claddagh 2012 </a></nobr></li>
          <li>
            <input type="checkbox" onclick="getcatproducts('Newproduct*Collegiate-Licensed-Items','quality');" />
            <nobr><a  href="javascript:void(0);"  class="nosubmenu" onclick="getcatproducts('Newproduct*Collegiate-Licensed-Items','quality');" >Collegiate Licensed Items </a></nobr></li>
          <?php
    
    
    }else {
    foreach($level2 as $cat){
    $checked='';
    if($cat["is_checked"] == '1'){
    $checked= "checked=checked";        
    }
    $checkboxID = "ch$i";    
    $value = urlencode($cat["category"]);
    echo "<div><input type='checkbox' name='".$checkboxID."' id='".$checkboxID."' value='".$cat["category"]."' onclick='getsubcats(this.value,$i);'  $checked><a onclick='getsubcats(".'"'.$value.'"'.",$i);' href=\"javascript:void(0);\" ><b>".$cat["category"]."</b></a></div>";
    echo "<div id='response_$i'></div>";
    if($cat["is_checked"] == '1'){
    echo "<script>getsubcats('".$cat["category"]."',".$i.");</script>";
    }
    $i++;
    }
    }
    ?>
        </div>
        <div id="productBox"> </div>
        <div style="clear:both;">&nbsp;</div>
        <!--  <div><input type="submit" name="submit" value="Save" id="submit"></div> --> 
      </div>
    </form>
  </div>
  <!--\\\\\\\ inner end\\\\\\--> 
</div>
<!--\\\\\\\ wrapper end\\\\\\--> 
<!-- Modal -->
<?php echo popupsOtherBlockData(); ?>
<style>
#ul_main li a {
	color:#fff;
}
.search_for_col3 {
	width:60px;
	float:left;
}
.search_for_col4 {
	width:100%;
	float:left;
}
.search_for_col4a {
	width:100%;
	float:left;
}
</style>
<div id="main-body-a"> 
  <div class="bodytop"></div>
  <?php echo $pendan_stepsbar; //stepsRowBuildPendant(1, $pendanType); ?>
  <div class="mainPageHeading"><h2>Diamond Search</h2></div>
  <!--         <div class="topdiv">
    <?php echo $top_ads;?>
    </div>-->
  <?php $action = ($addoption == '' || $settingsid == '') ? config_item('base_url').'diamonds/search/true' : config_item('base_url').'diamonds/search/true/false/'.$addoption.'/false/'.$settingsid;?>
  <div class="bodymid2">
    <!--<ul id="ul_main" class="link_list">
      <li id="diamond_search"><a href="<?php echo config_item('base_url');?>diamonds/search"><span class="font">D</span>IAMOND <span class="font">S</span>EARCH</a></li>
      <li><a href="<?php echo config_item('base_url');?>diamonds/Dlsearch"><span class="font">DL</span><span class="font">D</span>IAMOND <span class="font">C</span>OLLECTION</a></li>
      <li><a href="<?php echo config_item('base_url');?>education/diamond"><span class="font">L</span>EARN <span class="font">A</span>BOUT <span class="font">D</span>IAMONDS</a></li>
      <li><a href="<?php echo config_item('base_url');?>engagement/search"><span class="font">B</span>UILD THE <span class="font">R</span>ING OF YOUR <span class="font">D</span>REAMS</a></li>
      <li><a href="<?php echo config_item('base_url');?>jewelry/build_three_stone_ring"><span class="font">B</span>UILD THE <span class="font">R</span>ING OF YOUR <span class="font">D</span>REAM (3 STONES)</a></li>
      <li><a href="<?php echo config_item('base_url');?>jewelry/search"><span class="font">D</span>IAMOND <span class="font">S</span>TUD <span class="font">E</span>ARRINGS <span class="font">B</span>UILDER </a></li>
      <li><a href="<?php echo config_item('base_url');?>jewelry/build_diamond_pendant"><span class="font">P</span>ENDANT <span class="font">B</span>UILDER</a></li>
    </ul>-->
    <form action="<?php echo $action;?>" method="POST">
      <link type="text/css" href="http://gemnile.com/css/lateststyle.css" rel="stylesheet" />
      <div id="line_2"></div>
      <div id="Advertising_left"></div>
      <div id="Advertising_middle">
        <!--<div id="head_w" align="center">ADVERTISING SPACE</div>-->
      </div>
      <div id="Advertising_right"></div>
      <div id="right_bg" align="left"><br><br>
        <div id="chose" align="left"><h3>Choose Diamond Shape & Price</h3></div><br>
        <div class="clear"></div>
       <div class="diamond_option"> 
       <div class="search_for_col3">
          <div class="search_for_col4">
            <!--<div class="search_for_col4a"><a href="#" class="active">Round</a></div>-->
            <div class="search_for_col4a"><img src="<?php echo config_item('base_url');?>images/diamonds/round.jpg" alt="round" style="width:50px;height:50px;" /></div>
            <div class="search_for_col4a">
              <input type="radio" value="round" name="diamondshape" id="B" onclick="toggleopacity(this, false)"><a href="#" class="active">Round</a>
            </div>
          </div>
        </div>
        <div class="search_for_col3">
          <div class="search_for_col4">
            <!--<div class="search_for_col4a"><a href="#" >Heart</a></div>-->
            <div class="search_for_col4a"><img src="<?php echo config_item('base_url');?>images/diamonds/heart.jpg" alt="heart" style="width:50px;height:50px;" /></div>
            <div class="search_for_col4a">
              <input type="radio" value="heart" name="diamondshape" id="H" onclick="toggleopacity(this, false)" /><a href="#" >Heart</a>
            </div>
          </div>
        </div>
        <div class="search_for_col3">
          <div class="search_for_col4">
            <!--<div class="search_for_col4a"><a href="#">Emerald</a></div>-->
            <div class="search_for_col4a"><img src="<?php echo config_item('base_url');?>images/diamonds/emerald.jpg" alt="emerald" style="width:50px;height:50px;" /></div>
            <div class="search_for_col4a">
              <input type="radio" value="emerald" name="diamondshape" id="E" onclick="toggleopacity(this, false)"><a href="#">Emerald</a>
            </div>
          </div>
        </div>
        <div class="search_for_col3">
          <div class="search_for_col4">
            <!--<div class="search_for_col4a"><a href="#">Princess</a></div>-->
            <div class="search_for_col4a"><img src="<?php echo config_item('base_url');?>images/diamonds/princess.jpg" alt="princess" style="width:50px;height:50px;" /></div>
            <div class="search_for_col4a">
              <input type="radio" value="princess" name="diamondshape" id="PR" onclick="toggleopacity(this, false)"><a href="#">Princess</a>
            </div>
          </div>
        </div>
        <div class="search_for_col3">
          <div class="search_for_col4">
            <!--<div class="search_for_col4a"><a href="#">Radiant</a></div>-->
            <div class="search_for_col4a"><img src="<?php echo config_item('base_url');?>images/diamonds/radiant.jpg" alt="radiant" style="width:50px;height:50px;" /></div>
            <div class="search_for_col4a">
              <input type="radio" value="radiant" name="diamondshape" id="R" onclick="toggleopacity(this, false)"><a href="#">Radiant</a>
            </div>
          </div>
        </div>
        <div class="search_for_col3">
          <div class="search_for_col4">
            <!--<div class="search_for_col4a"><a href="#">Oval</a></div>-->
            <div class="search_for_col4a"><img src="<?php echo config_item('base_url');?>images/diamonds/oval.jpg" alt="oval" style="width:50px;height:50px;"  /></div>
            <div class="search_for_col4a">
              <input type="radio" value="oval" name="diamondshape" id="O" onclick="toggleopacity(this, false)"><a href="#">Oval</a>
            </div>
          </div>
        </div>
        <div class="search_for_col3">
          <div class="search_for_col4">
            <!--<div class="search_for_col4a"><a href="#">Marquise</a></div>-->
            <div class="search_for_col4a"><img src="<?php echo config_item('base_url');?>images/diamonds/marquise.jpg" alt="marquise" style="width:50px;height:50px;" /></div>
            <div class="search_for_col4a">
              <input type="radio" value="marquise" name="diamondshape" id="M" onclick="toggleopacity(this, false)"><a href="#">Marquise</a>
            </div>
          </div>
        </div>
        <div class="search_for_col3">
          <div class="search_for_col4">
            <!--<div class="search_for_col4a"><a href="#">Asscher</a></div>-->
            <div class="search_for_col4a"><img src="<?php echo config_item('base_url');?>images/diamonds/asscher.jpg" alt="asscher" style="width:50px;height:50px;" /></div>
            <div class="search_for_col4a">
              <input type="radio" value="asscher" name="diamondshape" id="AS" onclick="toggleopacity(this, false)"><a href="#">Asscher</a>
            </div>
          </div>
        </div>
        <div class="search_for_col3">
          <div class="search_for_col4">
            <!--<div class="search_for_col4a"><a href="#">Pear</a></div>-->
            <div class="search_for_col4a"><img src="<?php echo config_item('base_url');?>images/diamonds/pear.jpg" alt="pear"  style="width:50px;height:50px;" /></div>
            <div class="search_for_col4a">
              <input type="radio" value="pear" name="diamondshape" id="P" onclick="toggleopacity(this, false)"><a href="#">Pear</a>
            </div>
          </div>
        </div>
        <div class="search_for_col3">
          <div class="search_for_col4">
            <!--<div class="search_for_col4a"><a href="#">Cushion</a></div>-->
            <div class="search_for_col4a"><img src="<?php echo config_item('base_url');?>images/diamonds/cushion.jpg" alt="cushion" style="width:50px;height:50px;" /></div>
            <div class="search_for_col4a">
              <input type="radio" value="cushion" name="diamondshape" id="C" onclick="toggleopacity(this, false)"><a href="#">Cushion</a>
            </div>
          </div>
        </div>
       </div>
        <div class="clear"></div><br>
        <div>
          <p>You were searching for <?php echo $shapename." ";?>diamonds from $<?php echo number_format($lastminpr);?> to $<?php echo number_format($lastmaxpr);?></p>
        </div>
      </div>
      <div class="clear"></div><br>
        <div id="Text_field"> FROM
          <input type="text" name="minprice" id='minprice' value="<?php echo round($minprice);?>" class="w100px price" maxlength="9" onchange="checkMinMaxPrice(this,'maxprice',<?php echo $minprice, ",",$maxprice.",'min'";?>)">
          TO
          <input type="text" name="maxprice" id="maxprice" value="<?php echo round($maxprice); ?>" class="w100px price" maxlength="9" onchange="checkMinMaxPrice(this,'minprice',<?php echo $minprice, ",",$maxprice.",'max'";?>)">
          <input type="submit" value="Search" class="searchdiamondbtn" name="searchdiamonds">
          <!--<input type="submit" value="Resum" class="resumebtn" name="resumesearch">-->
        </div>
        <div class="clear"></div>
      <!--</div>-->
      
    </form><br><br>
  </div>
  <div class="clear"></div>
</div>
<div class="clear"></div>
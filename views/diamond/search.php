<style>
#ul_main li a{color:#fff}
.search_for_col3{width:110px;float:left}
.search_for_col4{width:100%;float:left}
.search_for_col4a{width:100%;float:left}
.steps_rgarow img{width:39px;height:39px;right:42px;position:absolute;top:2px;z-index:999}
.diamond_option{min-height:87px;padding:7px 7px 10px;background:#000;text-align:center}
.search_for_col4a a{padding:5px;vertical-align:bottom}
</style>
<div id="">
  <?php echo $pendan_stepsbar; //stepsRowBuildPendant(1, $pendanType); ?>
  <div class="mainPageHeading"><h2>Diamond Search</h2></div>
  <!--         <div class="topdiv">
    <?php echo $top_ads;?>
    </div>-->
  <?php $action = ($addoption == '' || $settingsid == '') ? config_item('base_url').'diamonds/search/true' : config_item('base_url').'diamonds/search/true/false/'.$addoption.'/false/'.$settingsid;?>
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
            <div class="search_for_col4a"><img src="<?php echo config_item('base_url');?>images/diamonds/round.jpg" alt="round" /></div>
            <div class="search_for_col4a">
              <input type="radio" value="round" name="diamondshape" id="B" onclick="toggleopacity(this, false)"><a href="#" class="active">Round</a>
            </div>
          </div>
        </div>
        <div class="search_for_col3">
          <div class="search_for_col4">
            <!--<div class="search_for_col4a"><a href="#" >Heart</a></div>-->
            <div class="search_for_col4a"><img src="<?php echo config_item('base_url');?>images/diamonds/heart.jpg" alt="heart" /></div>
            <div class="search_for_col4a">
              <input type="radio" value="heart" name="diamondshape" id="H" onclick="toggleopacity(this, false)" /><a href="#" >Heart</a>
            </div>
          </div>
        </div>
        <div class="search_for_col3">
          <div class="search_for_col4">
            <!--<div class="search_for_col4a"><a href="#">Emerald</a></div>-->
            <div class="search_for_col4a"><img src="<?php echo config_item('base_url');?>images/diamonds/emerald.jpg" alt="emerald" /></div>
            <div class="search_for_col4a">
              <input type="radio" value="emerald" name="diamondshape" id="E" onclick="toggleopacity(this, false)"><a href="#">Emerald</a>
            </div>
          </div>
        </div>
        <div class="search_for_col3">
          <div class="search_for_col4">
            <!--<div class="search_for_col4a"><a href="#">Princess</a></div>-->
            <div class="search_for_col4a"><img src="<?php echo config_item('base_url');?>images/diamonds/princess.jpg" alt="princess" /></div>
            <div class="search_for_col4a">
              <input type="radio" value="princess" name="diamondshape" id="PR" onclick="toggleopacity(this, false)"><a href="#">Princess</a>
            </div>
          </div>
        </div>
        <div class="search_for_col3">
          <div class="search_for_col4">
            <!--<div class="search_for_col4a"><a href="#">Radiant</a></div>-->
            <div class="search_for_col4a"><img src="<?php echo config_item('base_url');?>images/diamonds/radiant.jpg" alt="radiant" /></div>
            <div class="search_for_col4a">
              <input type="radio" value="radiant" name="diamondshape" id="R" onclick="toggleopacity(this, false)"><a href="#">Radiant</a>
            </div>
          </div>
        </div>
        <div class="search_for_col3">
          <div class="search_for_col4">
            <!--<div class="search_for_col4a"><a href="#">Oval</a></div>-->
            <div class="search_for_col4a"><img src="<?php echo config_item('base_url');?>images/diamonds/oval.jpg" alt="oval"  /></div>
            <div class="search_for_col4a">
              <input type="radio" value="oval" name="diamondshape" id="O" onclick="toggleopacity(this, false)"><a href="#">Oval</a>
            </div>
          </div>
        </div>
        <div class="search_for_col3">
          <div class="search_for_col4">
            <!--<div class="search_for_col4a"><a href="#">Marquise</a></div>-->
            <div class="search_for_col4a"><img src="<?php echo config_item('base_url');?>images/diamonds/marquise.jpg" alt="marquise" /></div>
            <div class="search_for_col4a">
              <input type="radio" value="marquise" name="diamondshape" id="M" onclick="toggleopacity(this, false)"><a href="#">Marquise</a>
            </div>
          </div>
        </div>
        <div class="search_for_col3">
          <div class="search_for_col4">
            <!--<div class="search_for_col4a"><a href="#">Asscher</a></div>-->
            <div class="search_for_col4a"><img src="<?php echo config_item('base_url');?>images/diamonds/asscher.jpg" alt="asscher" /></div>
            <div class="search_for_col4a">
              <input type="radio" value="asscher" name="diamondshape" id="AS" onclick="toggleopacity(this, false)"><a href="#">Asscher</a>
            </div>
          </div>
        </div>
        <div class="search_for_col3">
          <div class="search_for_col4">
            <!--<div class="search_for_col4a"><a href="#">Pear</a></div>-->
            <div class="search_for_col4a"><img src="<?php echo config_item('base_url');?>images/diamonds/pear.jpg" alt="pear" /></div>
            <div class="search_for_col4a">
              <input type="radio" value="pear" name="diamondshape" id="P" onclick="toggleopacity(this, false)"><a href="#">Pear</a>
            </div>
          </div>
        </div>
        <div class="search_for_col3">
          <div class="search_for_col4">
            <!--<div class="search_for_col4a"><a href="#">Cushion</a></div>-->
            <div class="search_for_col4a"><img src="<?php echo config_item('base_url');?>images/diamonds/cushion.jpg" alt="cushion" /></div>
            <div class="search_for_col4a">
              <input type="radio" value="cushion" name="diamondshape" id="C" onclick="toggleopacity(this, false)"><a href="#">Cushion</a>
            </div>
          </div>
        </div>
        <div class="clear"></div>
       </div>
        <div class="clear"></div><br>
        <div>
          <p>You were searching for <?php echo $shapename." ";?>diamonds from $<?php echo number_format($lastminpr);?> to $<?php echo number_format($lastmaxpr);?></p>
        </div>
      </div>
      <div class="clear"></div><br>
        <div id="Text_field" class="row-fluid"> 
        <div class="col-sm-3">
        <span class="setSearchLabel">FROM</span>
          <input type="text" name="minprice" id='minprice' value="<?php echo round($minprice);?>" class="w100px price" maxlength="9" onchange="checkMinMaxPrice(this,'maxprice',<?php echo $minprice, ",",$maxprice.",'min'";?>)"></div>
          <div class="col-sm-3">
          <span class="setSearchLabel">TO</span>
          <input type="text" name="maxprice" id="maxprice" value="<?php echo round($maxprice); ?>" class="w100px price" maxlength="9" onchange="checkMinMaxPrice(this,'minprice',<?php echo $minprice, ",",$maxprice.",'max'";?>)"></div>
          <div class="col-sm-2 text-right"><input type="submit" value="Search" class="searchdiamondbtn" name="searchdiamonds"></div>
          <div class="col-sm-4"></div>
        </div>
        <div class="clear"></div>
      <!--</div>-->
      
    </form><br><br>
</div>
<div class="clear"></div>
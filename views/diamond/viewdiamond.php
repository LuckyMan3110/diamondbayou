<?php //echo "<br>vnr<br>";
//var_dump($details);

$shape = '';
switch ($details['shape']) {
    case 'B':
        $shape = 'Round';
        break;
    case 'PR':
        $shape = 'Princess';
        break;
    case 'R':
        $shape = 'Radiant';
        break;
    case 'E':
        $shape = 'Emerald';
        break;
    case 'AS':
        $shape = 'Ascher';
        break;
    case 'O':
        $shape = 'Oval';
        break;
    case 'M':
        $shape = 'Marquise';
        break;
    case 'P':
        $shape = 'Pear shape';
        break;
    case 'H':
        $shape = 'Heart';
        break;
    case 'C':
        $shape = 'Cushion';
        break;
    default:
        $shape = $details['shape'];
        break;
}
?>
<style type="text/css">
    .diamonddetails{
        background:url(<?= config_item('base_url'); ?>/images/tamal/diamond/top_<?= $shape ?>.jpg) no-repeat;
        width:190px;
        position:
    }
</style>
<div id="main-body-a">
	<div style="margin:0 auto; width:970px;">

    <div class="bodytop"></div>
    <div class="bodymid">  

        <div class="topdiv">
            <?php echo $top_ads; ?>
        </div>

        <h1 class="pageheader hr"><?php echo $pageheader; ?></h1>
        <?php echo $tabhtml; ?>

        <div class="dbr"></div>	  			

        <div>
            <div class="floatl tile0">
                <div style="display:block;" class="diamonddetails">


                    <div class="sidedetail">
                        <div style="color:#000000"class="depthpercent1 txtsmall">Depth%: <?php echo $details['Depth'] ?>%</div> 
                        <div style="color:#000000" class="tablepercent1 txtsmall">Table%: <?php echo $details['TablePercent'] ?>%</div>
                        <div style="color:#000000" class="depth1 txtsmall">Depth</div>
                        <div style="color:#000000" class="culet1 txtsmall">Culet:<?php echo $details['Culet'] ?></div>
                    </div>			  									


                </div>
            </div>
			 <?php
                      //  echo "basit=================================";
                      $price = round($details['pricepercrt'] * $details['carat']);
                      $dicount_15 = ($price * 15) / 100;
                      $price_3z = $price / 3;
                      $price_5z = $price / 5;
               ?>
            <div class="floatl width285">
                <p><strong><?php echo $details['carat'] ?>-Carat <?php echo $shape ?> Shape Diamond</strong> </p>
                <p>This <i><?php echo $details['cut'] ?></i>-cut, <i><?php echo $details['color'] ?></i>-color, and <i><?php echo $details['clarity'] ?></i>-clarity diamond comes accompanied by a diamond grading report from the <?php echo $details['Cert'] ?>.</p>
                <div class="dbr"></div>
                <p><strong>Price:</strong> <?php echo $price;?></p>
                <br /><br />
                <form method="POST" action="<?php echo config_item('base_url'); ?>engagement/search/ring/true">   
                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
                        <tbody><tr>
                                <td width="130px">	
                                    <div id="adddiamond" class="floatl textleft">
                                        <div class="diamond_options">
                                            <?php
                                          //  echo "basit=================================";
                                            $price = $details['price'];
                                            $dicount_15 = ($price * 15) / 100;
                                            $price_3z = $price / 3;
                                            $price_5z = $price / 5;
                                            ?>
                                            <!--<div>
                                                <input type="radio" name="diamond_options" checked="checked" value="<?php echo $details['lot'] ?>" />
                                                <label>BEST VALUE - $<?php echo $dicount_15 ?> Price after 15% discount when paid by Visa/MC.</label>
                                            </div>
                                            <div>
                                                <input type="radio" name="diamond_options" value="<?php echo $details['lot'] ?>" />
                                                <label>3 EZ Pay - $<?php echo $price;?> Price with 3 EZ payments of $<?php echo $price_3z;?>. No credit check required.</label>
                                            </div>
                                            <div>
                                                <input type="radio" name="diamond_options" value="<?php echo $details['lot'] ?>" />
                                                <label>5 EZ Pay - $<?php echo $price;?> Price with 5 EZ payments of $<?php echo $price_5z;?>. Subject to credit verification. </label>
                                            </div>-->
                                        </div>
                                    </div>
                                    <div id="adddiamond" class="floatl textleft">  
                                        <div class="floatl">
                                            <!--<div class="floatl blurleft"></div>-->
                                            <div class="floatl bluemiddle"><a href="<?php echo $nexturl; ?>" onclick="<?php echo ($nexturl == '#') ? "$('#add_diamond_list').toggle()" : $onclickfunction; ?>">Add this Diamond</a></div>
                                           <!-- <div class="floatl blueright"></div>-->
                                            <div class="clear"></div>
                                        </div>  
                                        <div class="clear"></div>
                                        <?php echo $linkhtml; ?>

                                    </div>
                                </td>
                                <td width="120" valign="top">
                                    <div class="floatl w125px">
                                        <div class="floatr brownright"></div>
                                        <div class="floatr brownmiddle"><a href="<?php echo config_item('base_url'); ?>/diamonds/search/true/false/<?php echo $addoption ?>">back to search</a></div>
                                        <div class="floatr brownleft"></div>
                                        <div class="clear"></div>
                                    </div>
                                </td>
                            </tr></tbody>
                    </table>   	      		  
                </form>
                <!--<div>
                  <div class="dimaond floatl">
                          <div class="diamondbox floatl"></div>
                                  <div class="floatl">&nbsp;<a class="vsmall" href="#" style="text-decoration:underline;">find similar</a></div>
                                  <div class="clear"></div>
                          </div>
                          
                          
                          <div class="emails floatl">
                                  <div class="emailbox floatl"></div>
                                  <div class="floatl">&nbsp;<a class="vsmall" href="#" style="text-decoration:underline;">e-mail to a friend</a></div>
                                  <div class="clear"></div>
                          </div>
                          
                          <div class="prints floatl">
                                  <div class="printbox floatl"></div>
                                  <div class="floatl">&nbsp;<a class="vsmall" href="#" style="text-decoration:underline;">print</a></div>
                                  <div class="clear"></div>
                          </div>
                          <div class="clear"></div>
                  </div>	-->

            </div>
            <div class="clear"></div>
        </div>

        <div class="dbr"></div>
        <div>
            <div class="floatl padl10">
                <div class="floatl">
                    <img src="<?php echo config_item('base_url') ?>/images/tamal/expand.jpg" alt="expand" id="expand" style="display:none;" onclick="showhide('productdetails', 'true')">
                    <img src="<?php echo config_item('base_url') ?>/images/tamal/minimize.jpg" alt="minimize" id="minimize" onclick="showhide('productdetails', 'false')">
                </div>
                <div class="infobox01 floatl width450px">Product Details</div>
                <div class="clear"></div>

                <div id="productdetails" style="display:block; padding:0px;">
                    <div class="infoheader padt10">Diamond information</div>
                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
                        <tbody><tr>
                                <td width="230" valign="top">
                                    <table cellpadding="0" cellspacing="0" border="0" width="90%">
                                        <tbody>
                                            <tr>
                                                <td width="120" class="brownback"><u>Lot #:</u></td>
                                <td width="120" class="brownback">&nbsp;<?php echo $details['lot'] ?></td>
                            </tr>
                            <tr>
                                <td width="120" class="brownback"><u>Carat:</u></td>
                        <td width="120" class="brownback">&nbsp;<?php echo $details['carat'] ?></td>
                        </tr>
                        <tr>
                            <td width="120" class="brownback"><u>Cut:</u></td>
                        <td width="120" class="brownback">&nbsp;<?php echo $details['cut'] ?></td>
                        </tr>
                        <tr>
                            <td width="120" class="brownback"><u>Color:</u></td>
                        <td width="120" class="brownback">&nbsp;<?php echo $details['color'] ?></td>
                        </tr>
                        <tr>
                            <td width="120" class="brownback"><u>Clarity:</u></td>
                        <td width="120" class="brownback">&nbsp;<?php echo $details['clarity'] ?></u></td>
                        </tr>
                        </tbody>
                    </table>
                    </td>
                    <td width="240" valign="top">
                        <table cellpadding="0" cellspacing="0" border="0">
                            <tbody>
                                <tr>
                                    <td width="120" class="brownback"><u>Price per carat:</u></td>
                    <td width="120" class="brownback">&nbsp;<?php echo $details['pricepercrt'] ?></td>
                    </tr>
                    <tr>
                        <td width="120" class="brownback"><u>Depth %:</u></td>
                    <td width="120" class="brownback">&nbsp;<?php echo $details['Depth'] ?></td>
                    </tr>
                    <tr>
                        <td width="120" class="brownback"><u>Table %:</u></td>
                    <td width="120" class="brownback">&nbsp;<?php echo $details['TablePercent'] ?></td>
                    </tr>
                    <tr>
                        <td width="120" class="brownback"><u>Symmetry:</u></td>
                    <td width="120" class="brownback">&nbsp;<?php echo $details['Sym'] ?></td>
                    </tr>
                    <tr>
                        <td width="120" class="brownback"><u>Polish:</u></td>
                    <td width="120" class="brownback">&nbsp;<?php echo $details['Polish'] ?></u></td>
                    </tr>
                    <tr>
                        <td width="120" class="brownback"><u>Girdle:</u></td>
                    <td width="120" class="brownback">&nbsp;<?php echo $details['Girdle'] ?></u></td>
                    </tr>
                    <tr>
                        <td width="120" class="brownback"><u>Culet:</u></td>
                    <td width="120" class="brownback">&nbsp;<?php echo $details['Culet'] ?></u></td>
                    </tr>
                    <tr>
                        <td width="120" class="brownback"><u>Fluorescence:</u></td>
                    <td width="120" class="brownback">&nbsp;<?php echo $details['Flour'] ?></u></td>
                    </tr>
                    <tr>
                        <td width="120" class="brownback">Measurements:</td>
                        <td width="120" class="brownback">&nbsp;<?php echo $details['Meas'] ?></u></td>
                    </tr>
                    </tbody>
                    </table>
                    </td>
                    </tr></tbody>
                    </table>
                </div>

                <div class="dbr"></div><br>
             <!--   <div class="floatl">
                    <div class="floatl">
                        <img src="<?php echo config_item('base_url') ?>/images/ruman/engagement/truck.jpg">
                    </div>
                    <div class="infobox01 floatl width440px">Shipping Information</div>
                    <div class="clear"></div>
                    <div class="smallheight"></div>
                    <div class="brownback width480px">
                        This ring usally arrives in 2-4 business days. Arrival depends on the diamond selected.

                        <div style="border:1px #fff solid;"></div>
                        Free shpping via  <a href="<?php echo config_item('base_url'); ?>site/page/freefedEx">
                            <b>FedEx Priority Overnight</b></a>
                    </div>
                    <div><br></div>
                    <div class="clear"></div>

                </div> -->

            </div>
            <div class="clear"></div>
        </div>



    </div>
    <div class="bodybottom"></div>
</div>
</div>

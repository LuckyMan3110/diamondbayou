<div class="inner"> 
  <!--\\\\\\\ inner start \\\\\\-->
  <div class="contentpanel">
      <!-- main menu start -->
        <div><?php echo admin_main_menu_list(); //// admin_mainmenu helper ?></div>
        <!-- main menu end -->
    <div>
      <?php
    if ($action == 'add' || $action == 'edit') {
    $this->load->helper('custom', 'form');
    if (isset($details)) {
    $owners_id = isset($details['owner_id']) ? $details['owner_id'] : '';
    $company_id = isset($details['company_id']) ? $details['company_id'] : 0;
    $company_name = isset($details['company_name']) ? $details['company_name'] : '';
    } else {
    $owners_id = '';
    $company_id = 0;
    $company_name = '';
    }
    $id = isset($owners_id) ? $owners_id : '';
    ?>
      <div class="blue_man">
        <div class="blue_admin_box1">
          <div class="addcountry_box">
            <div class="heading">
              <h1>Rapnet Companies Manager</h1>
            </div>
            <!-- Message Part -->
            <div style="width:100%;">
              <? if (isset($success) && !empty($success)) { ?>
                <div style="width:95.5%; margin:5px; padding:10px 10px 10px 10px; background-color:#C8F2BB; font-weight:bold"> <? echo $success; ?> </div>
                <? } ?>
            </div>
            <div style="clear:both"></div>
            <!-- End -->
            <div class="search_box">
              <form name="" action="<?php echo config_item('base_url'); ?>admin/owners/<?php
    echo $action;
    echo ($action == 'edit') ? '/' . $owners_id : '';
    ?>" method="post" enctype="multipart/form-data" >
                <table width="80%" border="0" align="center" cellpadding="5" cellspacing="0" class="table_border">
                  <!--Warning Class--> 
                  <!--end of displaying warning class-->
                  
                  <tr>
                    <td width="20%" align="right">Company ID</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element">
                        <input type="text" name="company_id" value="<?php echo $company_id; ?>" size="30"   />
                      </dd></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right">Company name</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element">
                        <input type="text" name="company_name" value="<?php echo $company_name; ?>"  size="40" />
                      </dd></td>
                  </tr>
                  <tr>
                    <td align="right">&nbsp;</td>
                    <td width="3%" align="left" valign="top"><dt id="edit-label">&nbsp;</dt>
                      <dd id="edit-element">
                        <input type="submit" name="<?= $action; ?>btn" id="edit" value="Save" class="search_but">
                      </dd>
                      &nbsp;</td>
                    <td width="74%" align="left" valign="top"><dt id="back-label">&nbsp;</dt>
                      <dd id="back-element">
                        <button name="back" id="back" type="button" class="search_but" onclick="history.go(-1);">Back</button>
                      </dd></td>
                  </tr>
                </table>
              </form>
            </div>
          </div>
        </div>
        <div class="spacerdiv"><img src="/template/admin/images/spacer.gif" alt="spacer" /></div>
      </div>
      <?php } else { ?>
      <div>
        <form action="<?php echo config_item('base_url'); ?>admin/rapnetDiamonds" method="post" name="search">
          <div style="height:200px;">
            <div style="border:1px solid #efefef;padding:2px;height:190px;float:left;">
              <div><b>Shape</b></div>
              <select name="shape[]" style="width:100px;height:165px;" multiple="multiple" >
                <option value="Round">Round</option>
                <option value="Princess">Princess</option>
                <option value="Sq. Emerald">Emerald</option>
                <option value="Asscher">Asscher</option>
                <option value="Cushion">Cushion</option>
                <option value="Marquise">Marquise</option>
                <option value="Oval">Oval</option>
                <option value="Radiant">Radiant</option>
                <option value="Pear">Pear</option>
                <option value="Heart">Heart</option>
              </select>
            </div>
            <div style="border:1px solid #efefef;padding:2px;height:190px;float:left;">
              <div><b>Cut</b></div>
              <select multiple="multiple" name="cut[]" style="width:100px;height:165px;">
                <option value="Good">Good</option>
                <option value="Very Good">Very Good</option>
                <option value="Ideal">Ideal</option>
                <option value="Excellent">Excellent</option>
                <option value="Fair">Fair</option>
                <option value="Poor">Poor</option>
              </select>
            </div>
            <div style="border:1px solid #efefef;padding:2px;height:190px;float:left;">
              <div><b>Color</b></div>
              <select multiple="multiple" name="color[]" style="width:100px;height:164px;">
                <option value="D">D</option>
                <option value="E">E</option>
                <option value="F">F</option>
                <option value="G">G</option>
                <option value="H">H</option>
                <option value="I">I</option>
                <option value="J">J</option>
                <option value="K">K</option>
                <option value="L">L</option>
                <option value="M">M</option>
                <option value="N">N</option>
                <option value="O">O</option>
                <option value="P">P</option>
                <option value="Q">Q</option>
                <option value="R">R</option>
                <option value="S">S</option>
                <option value="T">T</option>
                <option value="U">U</option>
                <option value="V">V</option>
                <option value="W">W</option>
                <option value="X">X</option>
                <option value="Y">Y</option>
                <option value="Z">Z</option>
              </select>
            </div>
            <div style="border:1px solid #efefef;padding:2px;height:190px;float:left;">
              <div><b>Clarity</b></div>
              <select multiple="multiple" name="clarity[]" style="width:100px;height:165px;">
                <option value="FL">FL</option>
                <option value="IF">IF</option>
                <option value="VVS1">VVS1</option>
                <option value="VVS2">VVS2</option>
                <option value="VS1">VS1</option>
                <option value="VS2">VS2</option>
                <option value="SI1">SI1</option>
                <option value="SI2">SI2</option>
                <option value="SI3">SI3</option>
              </select>
            </div>
            <div style="border:1px solid #efefef;padding:2px;height:190px;float:left;">
              <div><b>Cert</b></div>
              <select multiple="multiple" name="cert[]" style="width:100px;height:165px;">
                <option value="GIA">GIA</option>
                <option value="EGL U">EGL U</option>
                <option value="EGL I">EGL I</option>
                <option value="EGL H">EGL H</option>
                <option value="OTHER">OTHER</option>
                <option value="EGL P">EGL P</option>
              </select>
            </div>
            <div style="border:1px solid #efefef;width:170px;height:190px;float:left;">
              <div><b>Carat</b> </div>
              <div style="margin:55px 0 0 13px;"> (Min):
                <input name="caratmin" id="caratmin" value="0" style="width:25px;height:27px;"/>
                (Max):
                <input name="caratmax" id="caratmax" value="9.99" style="width:25px;height:27px;" />
              </div>
            </div>
            <div style="padding-top: 65px;padding-left:45px;border:1px solid #efefef;width:150px;height:125px;float:left;"> Enter Name :
              <input type="text" name="search_name" id="search_name">
              <input type="submit" name="submit_search" value="Save Filter" onclick="return checkval();">
              <br/>
              <br/>
              <input type="submit" name="submit" value="Show Diamond">
              <input type="reset" value="Reset Filter">
            </div>
            <div style="border:1px solid #efefef;width:270px;height:190px;float:left; overflow:scroll;">
              <div><b>Save Search</b> </div>
              <div>
                <?php if (count($savesearch) > 0) {
    ?>
                Cash Limit:
                <input name="cash_limit" id="cash_limit" value="<?php echo (isset($_SESSION['cash_limit']) && !empty($_SESSION['cash_limit'])) ? $_SESSION['cash_limit'] : '1,000,000';?>" />
                <script type="text/javascript">
    var $cash = 1000;
    var $url = "<?php echo config_item('base_url'); ?>admin/savesearch/";
    function sllink(id){
    $cash = $('#cash_limit').val();
    $url += id + '/' + $cash;
    window.location = url;
    }
    </script>
                <?php
    echo '<table cellpadding="6" border="1">'; 
    foreach($savesearch as $search) {
    ?>
                <tr>
                  <td><a href="javascript:void(0);" onclick="sllink('<?php echo base64_encode($search['id']);?>');" class="sllink"><?php echo $search['name']; ?></a></td>
                  <td><?php echo $search['date']; ?></td>
                  <td><a href="<?php echo config_item('base_url'); ?>admin/delsavedsearch/<?php echo $search['id']; ?>/0">Delete</a></td>
                </tr>
                <?php } 
    echo '</table>';
    } ?>
              </div>
            </div>
          </div>
          <script>
    function checkval() {
    if(document.getElementById('search_name').value == '') {
    alert('Please enter search name');
    return false;
    }
    return true;
    }
    </script>
          <table id="results" style="display:none; ">
          </table>
        </form>
      </div>
      <?php } ?>
    </div>
  </div>
  <!--\\\\\\\ inner end\\\\\\--> 
</div>
<!--\\\\\\\ wrapper end\\\\\\--> 
<!-- Modal -->
<?php echo popupsOtherBlockData(); ?>
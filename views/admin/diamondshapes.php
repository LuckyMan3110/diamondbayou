

<div class="inner"> 
  <!--\\\\\\\ inner start \\\\\\-->
  <div class="contentpanel">
      <!-- main menu start -->
        <div><?php echo admin_main_menu_list(); //// admin_mainmenu helper ?></div>
        <!-- main menu end -->
    <div>
      <?
    if($action == 'add' || $action == 'edit'){
    
    ?>
      <div class="blue_man">
        <div class="blue_admin_box1">
          <div class="addcountry_box">
            <div class="heading">
              <h1>
                <?=ucfirst($action) ?>
                Diamonds Shapes</h1>
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
              <form name="diamondshape" action="<?php echo config_item('base_url');?>admin/diamondshapes/add" method="post" enctype="multipart/form-data" >
                <table width="80%" border="0" align="center" cellpadding="5" cellspacing="0" class="table_border">
                  <!--Warning Class--> 
                  <!--end of displaying warning class-->
                  
                  <tr>
                    <td>Diamond Shape</td>
                    <td><select name="diamondshape" id="diamondshape">
                        <? $diamondshapes = array('Round' => 'Round', 'Trilliant' => 'Trilliant' ,  'Princess' => 'Princess' , 'Radiant' => 'Radiant' , 'Emerald' => 'Emerald' , 'Asscher' => 'Asscher' , 'Oval' => 'Oval' , 'Marquise' => 'Marquise' , 'Pear' => 'Pear' , 'Heart' => 'Heart' , 'Cushion' => 'Cushion', 'Baguette' => 'Baguette');
                            foreach($diamondshapes as $k => $v){
                            echo '<option value="'.$k.'">'.$v.'</option>';
                            }
                        ?>
                      </select></td>
                  </tr>
                  <tr>
                    <td>Picture 1</td>
                    <td><input type="file" name="picture1" id="picture1" value=""  /></td>
                  </tr>
                  <tr>
                    <td>Picture 2</td>
                    <td><input type="file" name="picture2" id="picture2" value=""  /></td>
                  </tr>
                  <tr>
                    <td>Picture 3</td>
                    <td><input type="file" name="picture3" id="picture3" value=""  /></td>
                  </tr>
                  <tr>
                    <td>Picture 4</td>
                    <td><input type="file" name="picture4" id="picture4" value=""  /></td>
                  </tr>
                  <tr>
                    <td>Picture 5</td>
                    <td><input type="file" name="picture5" id="picture5" value=""  /></td>
                  </tr>
                  <tr>
                    <td>Picture 6</td>
                    <td><input type="file" name="picture6" id="picture6" value=""  /></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td><br>
                      <input type="submit"  name="addbtn" value="Upload" class="adminbutton"  />
                      <a href="<?php echo config_item('base_url')?>index.php/admin/index" class="adminbutton"> Cancel</a></td>
                  </tr>
                </table>
              </form>
            </div>
          </div>
        </div>
        <div class="spacerdiv"><img src="/template/admin/images/spacer.gif" alt="spacer" /></div>
      </div>
      <?php }else{?>
      <div>
        <form name="rapnetstones" method="post" action="<?php echo config_item('base_url')?>admin/searchStones" id="rapnetstones">
          <table id="results" style="display:none; ">
          </table>
        </form>
      </div>
      <?php }?>
    </div>
  </div>
  <!--\\\\\\\ inner end\\\\\\--> 
</div>
<!--\\\\\\\ wrapper end\\\\\\--> 
<!-- Modal -->
<?php echo popupsOtherBlockData(); ?>
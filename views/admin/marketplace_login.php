<div class="inner"> 
  <!--\\\\\\\ inner start \\\\\\-->
  <div class="contentpanel">
      <!-- main menu start -->
        <div><?php echo admin_main_menu_list(); ?></div>
        <!-- main menu end -->
    <style>
        .form-horizontal .control-label {
            margin-bottom: 5px;
            text-align: left;
        }
    </style>
    <div class="clear_both padding_fix">
        <!--\\\\\\\ container  start \\\\\\-->
        <div class="page-content">
          <div class="row">
              
                <div class="container">
                    <?php if ($msg_notify == 0){
                      // nothing
                    }else if ($msg_notify == 1){ ?>
                      <div class="alert alert-success alert-dismissable">
                          <a class="close" href="#" data-dismiss="alert" aria-label="close">&times;</a>    
                            <?= $msg ?>
                        </div>
                        <hr>
                    <?php 
                    }else if ($msg_notify == 2){ ?>
                      <div class="alert alert-danger alert-dismissable">
                          <a class="close" href="#" data-dismiss="alert" aria-label="close">&times;</a>    
                            <?= $msg ?>
                        </div>
                        <hr>
                    <?php
                    } 
                    ?>
                
                  <p style="font-size: 15px;margin-bottom: 10px;">Save Here Your <?= $pages_title ?> Access:</p>
                  <form class="form-inline" action="" method="post">
                    <div class="form-group">
                      <label for="email">Email:</label>
                      <input type="text" class="form-control" requied="required" id="email" value="<?= $get_mpa_data[0]->userName ?>" placeholder="Enter username/email" name="userName">
                    </div>
                    <div class="form-group">
                      <label for="pwd">Password:</label>
                      <input type="text" class="form-control" requied="required" id="pwd" placeholder="Enter password" value="<?= $get_mpa_data[0]->password ?>" name="password">
                      <input type="hidden" class="form-control" value="<?= $pages_title ?>" name="type">
                    </div>
                    <div class="form-group">
                      <label for="pwd">&nbsp;</label>
                      <button type="submit" class="btn btn-default" name="save_udpate_access" style="height: 35px;border-color: #999999;">SAVE</button>
                    </div>
                    
                  </form>
                </div>
                
                <?php
                    if($pages_title == 'Etsy Login'){
                        ?>
                        <style>
                            input, button, select, textarea {
                                width: 100%;
                            }
                            #gnav-header, #join-neu-form, .forgot-password, .tabs, #ext-acct-signin{display:none;}
                        </style>
                        <br>
                        <?php
                    }
                ?>
              
              <div class="container"><?php echo $pagecontents; ?></div>
              
          </div>
          <!--/row-->
        </div>
      </div>
      <!--\\\\\\\ container  end \\\\\\-->
      
  </div>
  <!--\\\\\\\ inner end\\\\\\--> 
</div>
<!--\\\\\\\ wrapper end\\\\\\--> 
<?php echo popupsOtherBlockData(); ?>

<div class="inner"> 
    <!--\\\\\\\ inner start \\\\\\-->
    <div class="contentpanel"> 
        <!-- main menu start -->
        <div><?php echo admin_main_menu_list(); ?></div>
        <!-- main menu end -->       
      
      <div class="container clear_both padding_fix"> 
        <div class="clear"></div><br>
        <div class="col-md-12">
            
            
            <section class="content">
                <div class="container-fluid">
            
                    <div class="block-header">
                        <!-- Content Header (Page header) -->
                        <section class="content-header">
                          <h1>
                            <?php if ($edit_option == 1) { echo 'Update'; }else{echo 'Add New';} ?> Diamond Shape
                          </h1>
                          <ol class="breadcrumb">
                            <li><a href="<?= BASE_URL(); ?>solitaire_image_uploader"><i class="fa fa-dashboard"></i> Back</a></li>
                            <li class="active"><?php if ($edit_option == 1) { echo 'Update'; }else{echo 'Add New';} ?> Diamond Shape</li>
                          </ol>
                        </section>
            
                        <hr> 
                    </div>
            
                    <div class="row clearfix">
                      <div class="xs">
            
                        <div class="col-md-10 inbox_right">
                            <div class="Compose-Message">               
                                <div class="panel panel-default">
                                  <form action="" method="post" enctype="multipart/form-data">
                                    <div class="panel-body">
                                        
                                        <?php
                                        
                                        function checkShpapeImage($getV1){
             
                                            if( isset($getV1) ){
                                                
                                                if (strpos($getV1, 'heartsanddiamonds') !== false) {
                                                    $change_img_url = str_replace('heartsanddiamonds', 'diamondbayou', $getV1);
                                                    $noShapeImge = '<img src="'.$change_img_url.'" width="50px">';
                                                }else{
                                                    $noShapeImge = '<img src="'.SITE_URL.$getV1.'" width="50px">';
                                                }
                                                
                                            }else{
                                                $noShapeImge = '<img src="'.SITE_URL.'images/rings/noringimage.png" width="50px">';
                                                
                                            }
                                            echo $noShapeImge;
                                        }
                                        
                                        if ($msg_notify == 0){
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
                                        if ($edit_option == 1) {
                                            foreach ($get_cat as $cat_value) {
                                               $pic_id              = $cat_value->pic_id;
                                               $diamondshape        = $cat_value->diamondshape;
                                               
                                               $white_background    = $cat_value->white_background;
                                               $White               = $cat_value->White;
                                               $Yellow              = $cat_value->Yellow;
                                               $Purple              = $cat_value->Purple;
                                               $Green               = $cat_value->Green;
                                               $Orange              = $cat_value->Orange;
                                               $Red                 = $cat_value->Red;
                                               $Blue                = $cat_value->Blue;
                                               $Black               = $cat_value->Black;
                                               $Gray                = $cat_value->Gray;
                                               $Pink                = $cat_value->Pink;
                                               $Brown               = $cat_value->Brown;
                                               $chameleon_sh        = $cat_value->chameleon_sh;
                                               $champagne_sh        = $cat_value->champagne_sh;
                                            }
                                        }
                                        ?>
            
                                        <div class="form-group">
                                          <label for="title">Diamond Shape *: </label>
                                          <div class="form-line">
                                              <select name="diamondshape" class="form-control" id="diamondshape">
                                                <option value="<?php echo $diamondshape; ?>"><?php echo $diamondshape; ?></option>
                                              </select>
                                          </div>
                                        </div>
                                        
                                        <div class="col-md-6 inbox_left">
                                            
                                            <div class="form-group">
                                              <label for="page_slug">White Background *: </label>
                                              <div class="form-line">
                                                <input type="file" name="white_background" id="img_box1">
                                                <input type="hidden" name="white_background_check" id="white_background_check" value="<?php if ($edit_option == 1) { echo $white_background; } ?>">
                                                <p class="help-block">Click here and upload your image.</p>
                                                <?php if ($edit_option == 1) { checkShpapeImage($white_background); } ?>
                                              </div>
                                            </div>
                                            
                                            <div class="form-group">
                                              <label for="page_slug">Yellow *: </label>
                                              <div class="form-line">
                                                <input type="file" name="Yellow" id="img_box1">
                                                <input type="hidden" name="Yellow_check" id="Yellow_check" value="<?php if ($edit_option == 1) { echo $Yellow; } ?>">
                                                <p class="help-block">Click here and upload your image.</p>
                                                <?php if ($edit_option == 1) { checkShpapeImage($Yellow); } ?>
                                              </div>
                                            </div>
                                            
                                            <div class="form-group">
                                              <label for="page_slug">Green *: </label>
                                              <div class="form-line">
                                                <input type="file" name="Green" id="img_box1">
                                                <input type="hidden" name="Green_check" id="Green_check" value="<?php if ($edit_option == 1) { echo $Green; } ?>">
                                                <p class="help-block">Click here and upload your image.</p>
                                                <?php if ($edit_option == 1) { checkShpapeImage($Green); } ?>
                                              </div>
                                            </div>
                                            
                                            <div class="form-group">
                                              <label for="page_slug">Red *: </label>
                                              <div class="form-line">
                                                <input type="file" name="Red" id="img_box1">
                                                <input type="hidden" name="Red_check" id="Red_check" value="<?php if ($edit_option == 1) { echo $Red; } ?>">
                                                <p class="help-block">Click here and upload your image.</p>
                                                <?php if ($edit_option == 1) { checkShpapeImage($Red); } ?>
                                              </div>
                                            </div>
                                            
                                            <div class="form-group">
                                              <label for="page_slug">Black *: </label>
                                              <div class="form-line">
                                                <input type="file" name="Black" id="img_box1">
                                                <input type="hidden" name="Black_check" id="Black_check" value="<?php if ($edit_option == 1) { echo $Black; } ?>">
                                                <p class="help-block">Click here and upload your image.</p>
                                                <?php if ($edit_option == 1) { checkShpapeImage($Black); } ?>
                                              </div>
                                            </div>
                                            
                                            <div class="form-group">
                                              <label for="page_slug">Pink *: </label>
                                              <div class="form-line">
                                                <input type="file" name="Pink" id="img_box1">
                                                <input type="hidden" name="Pink_check" id="Pink_check" value="<?php if ($edit_option == 1) { echo $Pink; } ?>">
                                                <p class="help-block">Click here and upload your image.</p>
                                                <?php if ($edit_option == 1) { checkShpapeImage($Pink); } ?>
                                              </div>
                                            </div>
                                            
                                        </div>   
                                        
                                        <div class="col-md-6 inbox_right">
                                            
                                            <div class="form-group">
                                              <label for="page_slug">White *: </label>
                                              <div class="form-line">
                                                <input type="file" name="White" id="img_box1">
                                                <input type="hidden" name="White_check" id="White_check" value="<?php if ($edit_option == 1) { echo $White; } ?>">
                                                <p class="help-block">Click here and upload your image.</p>
                                                <?php if ($edit_option == 1) { checkShpapeImage($White); } ?>
                                              </div>
                                            </div>
                                            
                                            <div class="form-group">
                                              <label for="page_slug">Purple *: </label>
                                              <div class="form-line">
                                                <input type="file" name="Purple" id="img_box1">
                                                <input type="hidden" name="Purple_check" id="Purple_check" value="<?php if ($edit_option == 1) { echo $Purple; } ?>">
                                                <p class="help-block">Click here and upload your image.</p>
                                                <?php if ($edit_option == 1) { checkShpapeImage($Purple); } ?>
                                              </div>
                                            </div>
                                            
                                            <div class="form-group">
                                              <label for="page_slug">Orange *: </label>
                                              <div class="form-line">
                                                <input type="file" name="Orange" id="img_box1">
                                                <input type="hidden" name="Orange_check" id="Orange_check" value="<?php if ($edit_option == 1) { echo $Orange; } ?>">
                                                <p class="help-block">Click here and upload your image.</p>
                                                <?php if ($edit_option == 1) { checkShpapeImage($Orange); } ?>
                                              </div>
                                            </div>
                                            
                                            <div class="form-group">
                                              <label for="page_slug">Blue *: </label>
                                              <div class="form-line">
                                                <input type="file" name="Blue" id="img_box1">
                                                <input type="hidden" name="Blue_check" id="Blue_check" value="<?php if ($edit_option == 1) { echo $Blue; } ?>">
                                                <p class="help-block">Click here and upload your image.</p>
                                                <?php if ($edit_option == 1) { checkShpapeImage($Blue); } ?>
                                              </div>
                                            </div>
                                            
                                            <div class="form-group">
                                              <label for="page_slug">Gray *: </label>
                                              <div class="form-line">
                                                <input type="file" name="Gray" id="img_box1">
                                                <input type="hidden" name="Gray_check" id="Gray_check" value="<?php if ($edit_option == 1) { echo $Gray; } ?>">
                                                <p class="help-block">Click here and upload your image.</p>
                                                <?php if ($edit_option == 1) { checkShpapeImage($Gray); } ?>
                                              </div>
                                            </div>
                                            
                                            <div class="form-group">
                                              <label for="page_slug">Brown *: </label>
                                              <div class="form-line">
                                                <input type="file" name="Brown" id="img_box1">
                                                <input type="hidden" name="Brown_check" id="Brown_check" value="<?php if ($edit_option == 1) { echo $Brown; } ?>">
                                                <p class="help-block">Click here and upload your image.</p>
                                                <?php if ($edit_option == 1) { checkShpapeImage($Brown); } ?>
                                              </div>
                                            </div>
                                            
                                        </div>   
                                        
                                        <input type="hidden" name="edit_option" value="<?= $edit_option ?>" readonly="readonly" />
                                        <input type="hidden" name="edited_page_id" value="<?php if ($edit_option == 1) { echo $pic_id; } ?>" readonly="readonly" />
            
                                         <div class="clearfix"> </div>
                                        <hr>
                                        <input type="submit" name="<?php if ($edit_option == 1) { echo'edit_page'; }else{echo'add_page';} ?>" value="<?php if ($edit_option == 1) { echo'Update Page'; }else{echo'Add Page';} ?>" class="btn btn-warning btn-warng1">
                                        <input type="reset" name="Reset" value="Reset" class="btn btn-success btn-warng1">
                                  </form> 
                                    </div>
                                 </div>
                              </div>
                         </div>
                         <div class="clearfix"> </div>
                   </div>
              </div>  
            </section>
            
            
        </div>
        
      </div>
      <!--\\\\\\\ container  end \\\\\\--> 
    </div>
    <!--\\\\\\\ content panel end \\\\\\--> 
  </div>
  <!--\\\\\\\ inner end\\\\\\--> 
</div>
<!--\\\\\\\ wrapper end\\\\\\--> 
<?php echo popupsOtherBlockData(); ?>
<script type="text/javascript" src="<?php echo ADMIN_LIB; ?>plugins/ckeditor/ckeditor.js"></script> 
<!-- /sidebar chats --> 
         
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
                            <?php if ($edit_option == 1) { echo 'Update'; }else{echo 'Add New';} ?> Sub Page
                          </h1>
                          <ol class="breadcrumb">
                            <li><a href="<?= BASE_URL(); ?>footer_category_sub_page_manager"><i class="fa fa-dashboard"></i> Back</a></li>
                            <li class="active"><?php if ($edit_option == 1) { echo 'Update'; }else{echo 'Add New';} ?> Sub Page</li>
                          </ol>
                        </section>
            
                        <hr> 
                    </div>
            
                    <div class="row clearfix">
                      <div class="xs">
            
                        <div class="col-md-8 inbox_right">
                            <div class="Compose-Message">               
                                <div class="panel panel-default">
                                  <form action="" method="post" enctype="multipart/form-data">
                                    <div class="panel-body">
                                        
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
                                        if ($edit_option == 1) {
                                            foreach ($get_cat as $cat_value) {
                                               $title           = $cat_value->title;
                                               $page_id         = $cat_value->page_id;
                                               $content         = $cat_value->content;
                                            }
                                        }
                                        ?>
            
                                        <div class="form-group">
                                          <label for="title">Sub Page Title *: </label>
                                          <div class="form-line">
                                            <input type="text" name="title" id="title" value="<?php if ($edit_option == 1) { echo $title; } ?>" required="" class="form-control">
                                          </div>
                                        </div>
                                        
                                        <div class="form-group">
                                          <label for="page_id">Select Main Page *: </label>
                                          <select name="page_id" id="page_id" class="form-control" required="">
                                            <option value="">Select Page</option>
                                            <?php
                                              foreach ($get_page_list as $page) {
                                            ?>
                                                <option value="<?= $page->page_id; ?>" <?php if ($edit_option == 1) { if($page->page_id == $page_id ){echo 'selected';} } ?> ><?= $page->title; ?></option>
                                            <?php    
                                              }
                                            ?>
                                          </select>
                                        </div>
            
                                        <div class="form-group">
                                          <label for="content">Sub Page Content: </label>
                                          <div class="form-line">
                                            <textarea rows="6" name="content" id="page_content" class="form-control control2 ckeditor"><?php if ($edit_option == 1) { echo $content; } ?></textarea>
                                          </div>
                                        </div>
                                        
                                        <input type="hidden" name="edit_option" value="<?= $edit_option ?>" readonly="readonly" />
                                        <input type="hidden" name="edited_page_id" value="<?php if ($edit_option == 1) { echo $page_id; } ?>" readonly="readonly" />
            
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
         
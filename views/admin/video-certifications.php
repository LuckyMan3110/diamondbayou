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
              
              <div class="col-md-12"><h2>Add Video
              <?php
                if(isset( $_GET['category'] )){
                    echo 'for '.ucwords(str_replace('_', ' ', $_GET['category']));
                }
              ?>
              </h2><hr></div>
              
              <form class="form-horizontal" action="" method="post">
                <fieldset style="width: 100%;">
                
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

                <div class="col-md-6">
                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-12 control-label" for="video_url">Video URL</label>  
                      <div class="col-md-12">
                      <input id="video_url" name="video_url" placeholder="Video URL" class="form-control input-md" required="" value="<?php if($edit_option == 1){ echo $get_edit_video_info[0]->video_url; } ?>" type="text">
                        
                      </div>
                    </div>
                
                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-12 control-label" for="details">Video Description</label>  
                      <div class="col-md-12">
                        <textarea class="form-control" id="details" name="details"><?php if($edit_option == 1){ echo $get_edit_video_info[0]->details; } ?></textarea>
                      </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    
                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-12 control-label" for="title">Title</label>  
                      <div class="col-md-12">
                      <input id="title" name="title" placeholder="Video Title" class="form-control input-md" value="<?php if($edit_option == 1){ echo $get_edit_video_info[0]->title; } ?>" required="" type="text">
                        
                      </div>
                    </div>
                    
                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-12 control-label" for="video_code">Code</label>  
                      <div class="col-md-12">
                      <input id="video_code" name="video_code" placeholder="Code" class="form-control input-md" value="" required="" type="text">
                        
                      </div>
                    </div>
                    
                
                    <!-- Button -->
                    <div class="form-group">
                      <div class="col-md-4">
                        <button type="submit" id="singlebutton" name="<?php if($edit_option == 1){ echo 'edit_video_action'; }else{ echo 'add_video_action';} ?>" class="btn btn-primary"><?php if($edit_option == 1){ echo 'Edit Video'; }else{ echo 'Add Video';} ?></button>
                        <?php if($edit_option == 1){ ?>
                            <a href="<?= BASE_URL(); ?>admin/video_certifications?category=<?= $_GET['category'] ?>" class="btn btn-success">
                                Back 
                            </a>
                        <?php } ?>
                      </div>
                    </div>
                    
                </div>
                
                </fieldset>
                </form>
          </div>
          <!--/row-->
        </div>
      </div>
      <!--\\\\\\\ container  end \\\\\\-->
      
      
        <div class="row">
            <?php 
            
            if(is_array($get_video_list)){
                $sl = 1;  
                foreach ($get_video_list as $videos) { 
                    
                    $url        =   $videos->video_url;
                    $step1      =   explode('v=', $url);
                    $step2      =   explode('&',$step1[1]);
                    $vedio_id   =   $step2[0];
                    
                    if($vedio_id){
                    
                ?>
                <div class="col-md-3" style="height:500px;">
                    <iframe src="https://www.youtube.com/embed/<?php echo $vedio_id; ?>" width="100%" height="240px" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
                    <a href="<?= BASE_URL() ?>admin/single_video?video_id=<?= $vedio_id ?>&video_title=<?= $videos->title ?>">
                        <h5 style="margin:10px 0px;color:#111;font-size: 17px;line-height: 20px;"> <?= $sl ?>. <?php echo  ucwords($videos->title); ?></h5>
                    </a>
                    <p style="font-size:13px;"><?php echo  $videos->details; ?></p>
                    <form action="" metho="get" name="form_<?= $videos->vc_id ?>" style="float: left;width: 85%;">
                        <input id="delete_video_code" name="delete_video_code" placeholder="Before Delete Enter Code Here" value="" required="" type="text" style="padding-right:8px;text-align:right;width:80%;height: 30px;border: solid 0px;font-size: 12px;">
                        <input id="delete_video_id" name="delete_video_id" value="<?= $videos->vc_id ?>" type="hidden">
                        <input id="category" name="category" value="<?= $_GET['category'] ?>" type="hidden">
                        <button type="submit" id="singlebutton" name="delete_video_action" class="btn btn-primary" style="height: 31px;"><span class="glyphicon glyphicon-trash"></span></button>
                        <!--<a href="<?= BASE_URL(); ?>admin/video_certifications?category=<?= $_GET['category'] ?>&delete_video_id=<?= $videos->vc_id ?>" class="btn btn-sm btn-success warning_3" onclick="return confirm('Are you want to delete this video?');">
                            <span class="glyphicon glyphicon-trash"></span> Delete 
                        </a>-->
                    </form>
                    <a  style="float: right;" href="<?= BASE_URL(); ?>admin/video_certifications?category=<?= $_GET['category'] ?>&edit_video_id=<?= $videos->vc_id ?>" class="btn btn-sm btn-success warning_3">
                        Edit 
                    </a>
                </div>
                <?php 
                $sl++;
                    }
                }
            }else{
                echo '<h5><center>No Video Found</center></h5>';
            }
            ?>
        </div>
      
      
  </div>
  <!--\\\\\\\ inner end\\\\\\--> 
</div>
<!--\\\\\\\ wrapper end\\\\\\--> 
<?php echo popupsOtherBlockData(); ?>
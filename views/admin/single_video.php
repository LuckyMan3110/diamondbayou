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
              
              <div class="col-md-12"><h2><?= $_GET['video_title'] ?></h2><hr></div>
              
              <div class="col-md-12"><iframe src="https://www.youtube.com/embed/<?= $_GET['video_id'] ?>" width="100%" height="550px" frameborder="0" allowfullscreen="allowfullscreen"></iframe></div>
              
          </div>
          <!--/row-->
        </div>
      </div>
      <!--\\\\\\\ container  end \\\\\\-->
      
      
        <div class="row">
            
            <?php 
            
            if(is_array($get_video_list)){
                ?>
                <div class="col-md-12"><h2>Others Frontend Videos</h2><hr></div>
                <?php
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
                     <h5 style="margin:10px 0px;color:#111;font-size: 17px;line-height: 20px;"><?php echo  $videos->title; ?></h5>
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
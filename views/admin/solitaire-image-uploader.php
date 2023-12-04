<div class="inner"> 
    <!--\\\\\\\ inner start \\\\\\-->
    <div class="contentpanel"> 
        <!-- main menu start -->
        <div><?php echo admin_main_menu_list(); //// admin_mainmenu helper
        
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
        
        ?></div>
        <!-- main menu end -->       
        
      <!--\\\\\\\ contentpanel start\\\\\\-->
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1><a href="<?php echo SITE_URL; ?>admin">Solitaire Image Uploader</a></h1>
          <h2 class="">Welcome <?php echo $login_full_name; ?></h2>
        </div>
        <!--<div class="pull-right">
          <ol class="breadcrumb">
            <li><a href="<?php echo SITE_URL; ?>admin">Home</a></li>
            <li><a href="<?php echo SITE_URL; ?>admin">DASHBOARD</a></li>
          </ol>
        </div>-->
      </div>
      
      <div class="container clear_both padding_fix"> 
        <div class="clear"></div><br>
        <div class="col-md-12">
            
            
            
            <section class="content">
                <div class="container-fluid">
            
                    <div class="block-header">
                        <!--<a href="<?= BASE_URL(); ?>solitaire_image_uploader/add" class="btn btn-warning btn-warng1"><span class="glyphicon glyphicon-plus"></span> Add New Solitaire Image </a>&nbsp;-->
                        <hr> 
                    </div>
            
                    <!-- Main content -->
            
                    <div class="row clearfix">
                      <div class="xs">
                        
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
                        <div class="col-md-12 inbox_right">
            
                            <div class="mailbox-content">
            
                                <table class="table">
                                    <tr class="unread checked">
                                        <th>#SL</th>
                                        <th class="hidden-xs">Shape</th>
                                        <th>White Bg</th>
                                        <th>White</th>
                                        <th>Yellow</th>
                                        <th>Purple</th>
                                        <th>Green</th>
                                        <th>Orange</th>
                                        <th>Red</th>
                                        <th>Blue</th>
                                        <th>Black</th>
                                        <th>Gray</th>
                                        <th>Pink</th>
                                        <th>Brown</th>
                                    </tr>
                                    <tbody>
            
                                        <?php $sl = 1;  
                                            if(is_array($get_category_list)){
                                             foreach ($get_category_list as $category) { 
                                            
                                            ?>
            
                                            <tr class="unread checked">
                                                <td class="hidden-xs">
                                                    #<?= $sl ?>
                                                    <a href="<?= BASE_URL(); ?>solitaire_image_uploader/add?edit_page_id=<?= $category->pic_id ?>" class="btn btn-sm btn-success warning_33"><span class="glyphicon glyphicon-pencil"></span> </a>&nbsp;
                                                    <!--<a href="<?= BASE_URL(); ?>footer_category_page_manager?delete_page_id=<?= $category->pic_id ?>" class="btn btn-sm btn-success warning_3" onclick="return confirm('Are you want to delete this page?');"><span class="glyphicon glyphicon-trash"></span> </a>-->
                                                </td>
                                                <td><?= $category->diamondshape ?></td>
                                                <td><?= checkShpapeImage($category->white_background) ?></td>
                                                <td><?= checkShpapeImage($category->White) ?></td>
                                                <td><?= checkShpapeImage($category->Yellow) ?></td>
                                                <td><?= checkShpapeImage($category->Purple) ?></td>
                                                <td><?= checkShpapeImage($category->Green) ?></td>
                                                <td><?= checkShpapeImage($category->Orange) ?></td>
                                                <td><?= checkShpapeImage($category->Red) ?></td>
                                                <td><?= checkShpapeImage($category->Blue) ?></td>
                                                <td><?= checkShpapeImage($category->Black) ?></td>
                                                <td><?= checkShpapeImage($category->Gray) ?></td>
                                                <td><?= checkShpapeImage($category->Pink) ?></td>
                                                <td><?= checkShpapeImage($category->Brown) ?></td>
                                            </tr>
            
                                        <?php 
                                        $sl++;
                                        }
                                    }else{
                                        echo '<tr><td colspan="8"><center>No Item Found</center></td></tr>';
                                    }
                                    ?>
            
                                    </tbody>
                                </table>
                               </div>
                            </div>
                        <div class="clearfix"> </div>
                   </div>
            
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

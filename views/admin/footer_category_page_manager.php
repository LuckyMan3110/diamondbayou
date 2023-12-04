<div class="inner"> 
    <!--\\\\\\\ inner start \\\\\\-->
    <div class="contentpanel"> 
        <!-- main menu start -->
        <div><?php echo admin_main_menu_list(); //// admin_mainmenu helper ?></div>
        <!-- main menu end -->       
        
      <!--\\\\\\\ contentpanel start\\\\\\-->
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1><a href="<?php echo SITE_URL; ?>admin">Footer Pages</a></h1>
          <h2 class="">Welcome <?= isset($login_full_name)?$login_full_name:''; ?></h2>
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
                        <a href="<?= BASE_URL(); ?>footer_category_page_manager/add" class="btn btn-warning btn-warng1"><span class="glyphicon glyphicon-plus"></span> Add New Main Page </a>&nbsp;
                        <a href="<?= BASE_URL(); ?>footer_category_sub_page_manager/add" class="btn btn-warning btn-warng1"><span class="glyphicon glyphicon-plus"></span> Add New Sub Page </a>&nbsp;
                        <hr> 
                    </div>
            
                    <!-- Main content -->
            
                    <div class="row clearfix">
                      <div class="xs">
                        
                        <?php if (isset($msg_notify) && $msg_notify == 0){
                              // nothing
                            }else if (isset($msg_notify) && $msg_notify == 1){ ?>
                              <div class="alert alert-success alert-dismissable">
                                  <a class="close" href="#" data-dismiss="alert" aria-label="close">&times;</a>    
                                    <?= $msg ?>
                                </div>
                                <hr>
                            <?php 
                            }else if (isset($msg_notify) && $msg_notify == 2){ ?>
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
                                        <th class="hidden-xs">
                                            #SL
                                        </th>
                                        <th class="hidden-xs">
                                            Page Title
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th>
                                            Entry Date
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                    <tbody>
            
                                        <?php $sl = 1;  
                                            if(is_array($get_category_list)){
                                             foreach ($get_category_list as $category) { 
                                            
                                            ?>
            
                                            <tr class="unread checked">
                                                <td class="hidden-xs">
                                                    <?= $sl ?>
                                                </td>
                                                <td class="hidden-xs">
                                                    <?=  $category->title ?>
                                                </td>
                                                <td>
                                                    <?= $category->status ?>
                                                </td>
                                                <td>
                                                    <?= $category->entry_date ?>
                                                </td>
                                                <td>
                                                    <a href="<?= BASE_URL(); ?>footer_category_page_manager/add?edit_page_id=<?= $category->page_id ?>" class="btn btn-sm btn-warning warning_33"><span class="glyphicon glyphicon-pencil"></span> Edit </a>&nbsp;
                                                    <a href="<?= BASE_URL(); ?>footer_category_page_manager?delete_page_id=<?= $category->page_id ?>" class="btn btn-sm btn-success warning_3" onclick="return confirm('Are you want to delete this page?');"><span class="glyphicon glyphicon-trash"></span> Delete </a>
                                                </td>
                                            </tr>
            
                                        <?php 
                                        $sl++;
                                        }
                                    }else{
                                        echo '<tr><td colspan="8"><center>No Page Found</center></td></tr>';
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

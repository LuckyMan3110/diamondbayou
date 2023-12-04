<link rel="stylesheet" href="<?= BASE_URL() ?>admin_libs/css/dashboard.css">
<div class="inner"> 
    <!--\\\\\\\ inner start \\\\\\-->
    <div class="contentpanel"> 
        <!-- main menu start -->
        <div><?php echo admin_main_menu_list(); //// admin_mainmenu helper ?></div>
        <!-- main menu end -->       
        
      <!--\\\\\\\ contentpanel start\\\\\\-->
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1><a href="<?php echo SITE_URL; ?>admin">Dashboard</a></h1>
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
        <!--\\\\\\\ container  start \\\\\\-->
        <div class="row">
          
        </div>
        <div class="clear"></div><br>
        <div class="col-md-12">
            <div class="bs-glyphicons">
                <ul class="bs-glyphicons-list">

                        <li>
                            <span class="glyphicon glyphicon-home"></span>
                        <span class="glyphicon-class"><a href="<?php echo SITE_URL; ?>">
                                <!--<i class="icon-home"></i>-->
                                <span class="glyphicon-class">Dashboard</span>
                            </a></span>
                        </li>
                                            <li>
                            <span class="glyphicon glyphicon-user"></span>
                            <a href="<?php echo SITE_URL; ?>admin/commonpagetemplate/">
                                <!-- <i class="icon-cogs"></i>-->
                                <span class="glyphicon-class">Site Managment</span>
                            </a>
                        </li>
                                                                <li>
                            <span class="glyphicon glyphicon-list"></span>
                            <a href="<?php echo SITE_URL; ?>admin/jewelries_manager">
                                <!--<i class="icon-cogs"></i>-->
                                <span class="glyphicon-class">Master Management </span>
                            </a>
                        </li>
                                                                <li>
                            <span class="glyphicon glyphicon-signal"></span>
                            <a href="<?php echo SITE_URL; ?>admin/helixprice">
                                <!--<i class="icon-cogs"></i>-->
                                <span class="glyphicon-class">Modules</span>
                            </a>
                        </li>
                          <li>
                            <span class="glyphicon glyphicon-signal"></span>
                            <a href="<?php echo SITE_URL; ?>admin/customers">
                                <!--<i class="icon-cogs"></i>-->
                                <span class="glyphicon-class">E-commerce</span>
                            </a>
                        </li>
                    

                        <li>
                            <span class="glyphicon glyphicon-signal"></span>
                            <a href="<?php echo SITE_URL; ?>admin/order">
                                <!-- <i class="icon-cogs"></i>-->
                                <span class="glyphicon-class">Orders</span>
                            </a>
                        </li>
                      	 <li>
                            <span class="glyphicon glyphicon-tasks"></span>
                            <a href="<?php echo SITE_URL; ?>admin/catamanager">
                                <!-- <i class="icon-cogs"></i>-->
                                <span class="glyphicon-class">Ezpay Configuration</span>
                            </a>
                        </li>
                         <li>
                            <span class="glyphicon glyphicon-tasks"></span>
                            <a href="<?php echo SITE_URL; ?>admin/inventory_mgnt">
                                <!--<i class="icon-cogs"></i>-->
                                <span class="glyphicon-class">Inventory Management</span>
                            </a>
                        </li>
                    
                        <li>
                            <span class="glyphicon glyphicon-tasks"></span>
                            <a href="<?php echo SITE_URL; ?>admin/inbox">
                                <!--<i class="icon-cogs"></i>-->
                                <span class="glyphicon-class">Email</span>
                            </a>
                        </li>
                        
                        <li>
                            <span class="glyphicon glyphicon-tasks"></span>
                            <a href="<?php echo SITE_URL; ?>admin/manage_tasks">
                                <!--<i class="icon-cogs"></i>-->
                                <span class="glyphicon-class">Tasks</span>
                            </a>
                        </li>
                        
                        <li>
                            <span class="glyphicon glyphicon-tasks"></span>
                            <a href="#">
                                <!--<i class="icon-cogs"></i>-->
                                <span class="glyphicon-class">Market Places</span>
                            </a>
                            <div class="">
                                <a href="<?php echo SITE_URL; ?>admin_listings/heart_collection_items#marketplace">eBay Jewelry</a><br>
                                <a href="<?php echo SITE_URL; ?>admin/rapnetDiamondsSearch#marketplace">eBay Diamonds</a>
                            </div>
                        </li>
                        
                        <li>
                            <span class="glyphicon glyphicon-tasks"></span>
                            <a href="#">
                                <!--<i class="icon-cogs"></i>-->
                                <span class="glyphicon-class">Google Analytics</span>
                            </a>
                            <div class="activateContent">Call  404 596 8912 to activate</div>
                        </li>
                        
                        <li>
                            <span class="glyphicon glyphicon-tasks"></span>
                            <a href="#">
                                <!--<i class="icon-cogs"></i>-->
                                <span class="glyphicon-class">Social Media</span>
                            </a>
                            <div class="activateContent">Call  404 596 8912 to activate</div>
                        </li>
                        
                        <li>
                            <span class="glyphicon glyphicon-tasks"></span>
                            <a href="<?php echo SITE_URL; ?>admin/profile_mgmt">
                                <!--<i class="icon-cogs"></i>-->
                                <span class="glyphicon-class">Profile</span>
                            </a>
                        </li>
                        <?php if( $this->session->userdata('user_status') == 'admin' ) : ?>
                        <li>
                            <span class="glyphicon glyphicon-tasks"></span>
                            <a href="<?php echo SITE_URL; ?>admin/trial_users">
                                <!--<i class="icon-cogs"></i>-->
                                <span class="glyphicon-class">Users</span>
                            </a>
                        </li>
                    	<?php endif; ?>
                    <li>
                        <span class="glyphicon  glyphicon-off"></span>
                        <a href="<?php echo SITE_URL; ?>admin/logout">
                            <!-- <i class="icon-off"></i>-->
                            <span class="glyphicon-class">Log Out</span>
                        </a>
                    </li>


                </ul>
            </div>
        </div>
        <?php /*?><div class="row">
          <div class="col-md-12">
            <div class="block-web">
              <div class="header">
                <h3 class="content-header">Graph</h3>
              </div>
              <div class="porlets-content">
                <div id="graph"></div>
              </div>
              <!--/porlets-content--> 
            </div>
            <!--/block-web--> 
          </div>
          <!--/col-md-12--> 
        </div><?php */?>
        <!--/row-->
        
        <!--<div class="row">
          <div class="col-md-6">
            <div class="multi-stat-box">
              <div class="header">
                <div class="left">
                  <h2>Pageviews</h2>
                  <a><i class="fa fa-chevron-down"></i> </a> </div>
                <div class="right">
                  <h2>NOV 14 - DEC 15</h2>
                  <div class="percent"><i class="fa fa-angle-double-down"></i> 34%</div>
                </div>
              </div>
              <div class="content">
                <div class="left">
                  <ul>
                    <li> <span class="date">Overall</span> <span class="value">1,104</span> </li>
                    <li class="active"> <span class="date">This week</span> <span class="value">486</span> </li>
                    <li> <span class="date">Yesterday</span> <span class="value">364</span> </li>
                    <li> <span class="date">Today</span> <span class="value">254</span> </li>
                  </ul>
                </div>
                <div class="right">
                  <div class="sparkline" data-type="line" data-resize="true" data-height="130" data-width="90%" data-line-width="1" data-line-color="#ddd" data-spot-color="#ccc" data-fill-color="" data-highlight-line-color="#ddd" data-spot-radius="4" data-data="[200,135,667,333,526,996,564,123,890,564,455,150,530,140]"></div>
                  <div class="ticket-lebel">SUN</div>
                  <div class="ticket-lebel">MON</div>
                  <div class="ticket-lebel">TUE</div>
                  <div class="ticket-lebel">WED</div>
                  <div class="ticket-lebel">THR</div>
                  <div class="ticket-lebel">FRI</div>
                  <div class="ticket-lebel">SAT</div>
                  <div class="ticket-lebel">SUN</div>
                </div>
              </div>
            </div>
            <br/>
            <div class="panel">
              <div class="panel-body">
                <div class="chart">
                  <div class="heading"> <span>June</span> <strong>15 Days | 57%</strong> </div>
                  <div id="barchart"></div>
                </div>
              </div>
              <div class="chart-tittle"> <span class="title text-muted">Total Earning</span> <span class="value-pie text-muted">$, 87,34,577</span> </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h4>Jaguar 'E' Type vehicles in the UK</h4>
              </div>
              <div class="panel-body">
                <div id="hero-graph" class="graph"></div>
              </div>
            </div>
          </div>
        </div>-->
        <?php /*?><div class="row">
          <div class="col-md-4 ">
            <div class="block-web green-bg-color">
              <h3 class="content-header ">Most Important Task</h3>
              <div class="porlets-content">
                <ul class="list-group task-list no-margin collapse in">
                  <div id="viewImpTask">
                  <?php echo $viewTasks; ?>
                  </div>
                  <form class="form-inline margin-top-10" id="impTaskForm" name="impTaskForm" role="form">
                    <input type="text" class="form-control" name="task_title" id="task_title" placeholder="Enter tasks here...">
                    <button class="btn btn-default btn-warning pull-right" onclick="saveImpTaskDetail('')" type="button"><i class="fa fa-plus"></i> Add Task</button>
                  </form>
                </ul>
                <!-- /list-group --> 
              </div>
              <!--/porlets-content--> 
            </div>
            <!--/block-web--> 
          </div>
          <!--/col-md-4-->
          <div class="col-md-4 ">
            <div class="block-web">
              <h3 class="content-header">Note</h3>
              <div class="block widget-notes">
                <div contenteditable="true" class="paper"> Send e-mail to supplier<br>
                  <s>Conference at 4 pm.</s><br>
                  <s>Order a pizza</s><br>
                  <s>Buy flowers</s><br>
                  Buy some coffee.<br>
                  Dinner at Plaza.<br>
                  Take Alex for walk.<br>
                  Buy some coffee.<br>
                </div>
              </div>
              <!--/widget-notes--> 
            </div>
            <!--/block-web--> 
          </div>
          <!--/col-md-4 -->
          <div class="col-md-4 ">
            <div class="kalendar"></div>
            <div class="list-group"> <a class="list-group-item" href="#"> <span class="badge bg-danger">7:50</span> Consectetuer </a> <a class="list-group-item" href="#"> <span class="badge bg-success">10:30</span> Lorem ipsum dolor sit amet </a> <a class="list-group-item" href="#"> <span class="badge bg-light">11:40</span> Consectetuer adipiscing </a> </div>
            <!--/calendar end--> 
          </div>
          <!--/col-md-4 end--> 
        </div><?php */?>
        <!--/row end--> 
        
        <!--row start-->
        <?php /*?><div class="row">
          <div class="col-md-8">
            <div class="block-web">
              <h3 class="content-header"> Quick Stats
                <div class="button-group pull-right" data-toggle="buttons"> <a href="javascript:;" class="btn active border-gray right-margin"> <span class="button-content"> Top this week </span> </a> <a href="javascript:;" class="btn border-gray right-margin"> <span class="button-content"> Refering </span> </a> <a href="javascript:;" class="btn border-gray"> <span class="button-content"> Others </span> </a> </div>
                <!--/button-group--> 
              </h3>
              <div class="custom-bar-chart">
                <ul class="y-axis">
                  <li><span>100</span></li>
                  <li><span>80</span></li>
                  <li><span>60</span></li>
                  <li><span>40</span></li>
                  <li><span>20</span></li>
                  <li><span>0</span></li>
                </ul>
                <div class="bar">
                  <div class="value tooltips" data-original-title="30%" data-toggle="tooltip" data-placement="top">30%</div>
                  <div class="title">Jan</div>
                </div>
                <!--/bar-->
                <div class="bar">
                  <div class="value tooltips bar-bg-color" data-original-title="50%" data-toggle="tooltip" data-placement="top">50%</div>
                  <div class="title">Fab</div>
                </div>
                <!--/bar-->
                <div class="bar ">
                  <div class="value tooltips" data-original-title="40%" data-toggle="tooltip" data-placement="top">40%</div>
                  <div class="title">Mar</div>
                </div>
                <!--/bar-->
                <div class="bar ">
                  <div class="value tooltips" data-original-title="80%" data-toggle="tooltip" data-placement="top">80%</div>
                  <div class="title">Apr</div>
                </div>
                <!--/bar-->
                <div class="bar">
                  <div class="value tooltips bar-bg-color" data-original-title="70%" data-toggle="tooltip" data-placement="top">70%</div>
                  <div class="title">May</div>
                </div>
                <!--/bar-->
                <div class="bar ">
                  <div class="value tooltips" data-original-title="50%" data-toggle="tooltip" data-placement="top">50%</div>
                  <div class="title">Jun</div>
                </div>
                <!--/bar-->
                <div class="bar">
                  <div class="value tooltips" data-original-title="40%" data-toggle="tooltip" data-placement="top">40%</div>
                  <div class="title">Jul</div>
                </div>
                <!--/bar-->
                <div class="bar">
                  <div class="value tooltips" data-original-title="35%" data-toggle="tooltip" data-placement="top">35%</div>
                  <div class="title">Aug</div>
                </div>
                <!--/bar-->
                
                <div class="bar ">
                  <div class="value tooltips" data-original-title="80%" data-toggle="tooltip" data-placement="top">80%</div>
                  <div class="title">Sep</div>
                </div>
                <!--/bar-->
                <div class="bar">
                  <div class="value tooltips bar-bg-color" data-original-title="70%" data-toggle="tooltip" data-placement="top">70%</div>
                  <div class="title">Oct</div>
                </div>
                <!--/bar-->
                <div class="bar ">
                  <div class="value tooltips" data-original-title="50%" data-toggle="tooltip" data-placement="top">50%</div>
                  <div class="title">Nov</div>
                </div>
                <!--/bar-->
                <div class="bar">
                  <div class="value tooltips" data-original-title="40%" data-toggle="tooltip" data-placement="top">40%</div>
                  <div class="title">Dec</div>
                </div>
                <!--/bar--> 
                
              </div>
              <!--/custom-bar-chart--> 
            </div>
            <!--/block-web--> 
          </div>
          <!--/col-md-8-->
          
          <div class="col-md-4">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h4>Donut flavours</h4>
              </div>
              <div class="panel-body">
                <div id="hero-donut" class="graph"></div>
              </div>
            </div>
          </div>
        </div><?php */?>
        <!--row end--> 
        
      </div>
      <!--\\\\\\\ container  end \\\\\\--> 
    </div>
    <!--\\\\\\\ content panel end \\\\\\--> 
  </div>
  <!--\\\\\\\ inner end\\\\\\--> 
</div>
<!--\\\\\\\ wrapper end\\\\\\--> 
<?php echo popupsOtherBlockData(); ?>


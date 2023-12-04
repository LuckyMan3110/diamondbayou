<div class="inner"> 
  <!--\\\\\\\ inner start \\\\\\-->
  <div class="contentpanel">
      <!-- main menu start -->
        <div><?php echo admin_main_menu_list(); //// admin_mainmenu helper ?></div>
        <!-- main menu end -->
    <div class="pull-left breadcrumb_admin clear_both">
      <div class="pull-left page_title theme_color">
        <h1>Admin</h1>
        <h2 class="">Website Settings</h2>
      </div>
      <div class="pull-right">
        <ol class="breadcrumb">
          <li><a href="<?php echo SITE_URL; ?>admin">Home</a></li>
          <li>Website Settings</li>
        </ol>
      </div>
    </div>
    <div class="container clear_both padding_fix">
        <section class="panel panel-default">
          <div class="panel-heading bg_color">Layout Options</div>
          <div class="panel-body">
            <div class="row">
              <div class="col-md-12">
                <p>Refer below to know all available features.</p>
                <div class="table-responsive">
                  <table class="table table-hover table-bordered">
                    <thead>
                      <tr>
                        <th>Options</th>
                        <th>CSS (Apply class in Body)</th>
                        <th>JS API</th>
                        <th>Try</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td width="180">fixed_header</td>
                        <td><code>fixed_header</code></td>
                        <td><code>fixed_header(true);</code></td>
                        <td><button type="button" class="btn btn-primary btn-xs btn-mini">Yes</button></td>
                      </tr>
                      <tr>
                        <td>left_nav_fixed</td>
                        <td><code>left_nav_fixed</code></td>
                        <td><code>left_nav_fixed(true);</code></td>
                        <td><button type="button" class="btn btn-primary btn-xs btn-mini">Yes</button></td>
                      </tr>
                      <tr>
                        <td>right_nav</td>
                        <td><code>right_nav</code></td>
                        <td><code>right_nav(true);</code></td>
                        <td><button type="button" class="btn btn-primary btn-xs btn-mini">Yes</button></td>
                      </tr>
                      <tr>
                        <td>boxed_layout</td>
                        <td><code>boxed_layout</code></td>
                        <td><code>boxed_layout(true);</code></td>
                        <td><button type="button" class="btn btn-primary btn-xs btn-mini">Yes</button></td>
                      </tr>
                      
                    </tbody>
                  </table>
                </div>
                <p>Contact/message me to report any issues.</p>
              </div>
            </div>
          </div>
        </section>
        <section class="panel panel-default">
          <div class="panel-heading bg_color">theme Options</div>
          <div class="panel-body">
            <div class="row">
              <div class="col-md-12">
                <p>Refer below to know all available features.</p>
                <div class="table-responsive">
                  <table class="table table-hover table-bordered">
                    <thead>
                      <tr>
                        <th>Options</th>
                        <th>CSS (Apply class in Body)</th>
                        <th>JS API</th>
                        <th>Try</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td width="180">red_thm</td>
                        <td><code>red_thm</code></td>
                        <td><code>red_thm(true);</code></td>
                        <td><button class="btn btn-primary btn-xs btn-mini" type="button">Apply here</button></td>
                      </tr>
                      <tr>
                        <td>blue_thm</td>
                        <td><code>blue_thm</code></td>
                        <td><code>blue_thm(true);</code></td>
                        <td><button class="btn btn-primary btn-xs btn-mini" type="button">Apply here</button></td>
                      </tr>
                      <tr>
                        <td>green_thm</td>
                        <td><code>green_thm</code></td>
                        <td><code>green_thm(true);</code></td>
                        <td><button class="btn btn-primary btn-xs btn-mini" type="button">Apply here</button></td>
                      </tr>
                      <tr>
                        <td>magento_thm</td>
                        <td><code>magento_thm</code></td>
                        <td><code>magento_thm(true);</code></td>
                        <td><button class="btn btn-primary btn-xs btn-mini" type="button">Apply here</button></td>
                      </tr>
                       <tr>
                        <td>dark_theme</td>
                        <td><code>dark_theme</code></td>
                        <td><code>dark_theme(true);</code></td>
                        <td><button class="btn btn-primary btn-xs btn-mini" type="button">Apply here</button></td>
                      </tr>
                       <tr>
                        <td>light_theme</td>
                        <td><code>light_theme</code></td>
                        <td><code>light_theme(true);</code></td>
                        <td><button class="btn btn-primary btn-xs btn-mini" type="button">Apply here</button></td>
                      </tr>
                      
                    </tbody>
                  </table>
                </div>
                <p>Contact/message me to report any issues.</p>
              </div>
            </div>
          </div>
        </section>
      </div>
  </div>
  <!--\\\\\\\ inner end\\\\\\--> 
</div>
<!--\\\\\\\ wrapper end\\\\\\--> 
<?php echo popupsOtherBlockData(); ?>
<body class="light_theme  fixed_header left_nav_fixed">
<div class="wrapper"> 
  <!--\\\\\\\ wrapper Start \\\\\\-->
  
  <div class="login_page">
    <div class="login_content">
        
        <div style="width:60%;margin:0px auto;">
          <div class="panel-heading border login_heading">Sign in now</div>
          <?php echo (isset($loginerror)) ? '<div class="loginError">'. $loginerror.'</div>' : '';?>
          <form role="form" class="form-horizontal" method="post" action="<?php echo htmlentities(SITE_URL.'admin/signin') ?>">
            <div class="form-group">
              <div class="col-sm-10">
                <input type="text" placeholder="Username / Email" name="username" id="inputEmail3" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-10">
              <input type="hidden" name="token" value="dafc63ea667ce8759586c6a569c4bae1" id="token">
                <input type="password" placeholder="Password" name="password" id="inputPassword3" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <div class=" col-sm-10">
                <div class="checkbox checkbox_margin">
                  <label class="lable_margin">
                  <input type="checkbox"> 
                  </label>
                  <p class="pull-left"> Remember me &nbsp; </p>
                  <button class="btn btn-primary pull-right" type="submit">Sign in</button>
                  </div>
              </div>
            </div>
          </form>
        </div>
        
    </div>
  </div>
</div>
<!--\\\\\\\ wrapper end\\\\\\--> 
<!-- Modal -->
<?php echo popupsOtherBlockData(); ?>
<div class="inner"> 
  <!--\\\\\\\ inner start \\\\\\-->
  <div class="contentpanel"> 
      <!-- main menu start -->
        <div><?php echo admin_main_menu_list(); //// admin_mainmenu helper ?></div>
        <!-- main menu end -->
    <script>
    function getorderdetail(id)
    {
    
    var url= "<?php echo config_item('base_url');?>admin/getorderdetail/"+id;
    newwindow=window.open(url,'name','height=450,width=720');
    if (window.focus) {newwindow.focus()}
    return false;
    }
    function sendContact(id)
    {
    
    var url= "<?php echo config_item('base_url');?>admin/sendContact/"+id;
    newwindow=window.open(url,'name','height=450,width=720');
    if (window.focus) {newwindow.focus()}
    return false;
    }
    function submitmode(mode)
    {
    $.ajax({ 
    type    : 'POST', 
    url     : '<?php echo config_item('base_url');?>admin/updatemode', 
    data    : {'mode' :mode} 
    });//end of ajax function 
    }
    </script>
    <form id="paymentform" name="paymentform" action="" method="post" >
      <?php 
    $this->load->helper('t');
    $mode	=	getpaymentmode();
    
    ?>
    </form>
    <br><br>
    <div>
    	<div><a href="<?php echo SITE_URL; ?>admin/order/view/0/R">Retailers Order</a></div><br>
        <div><a href="<?php echo SITE_URL; ?>admin/order/view/0/W">Wholesaler Order</a></div>
    </div>
    <br><br>
    <div id="pagedata">
      <table id="results" style="display:none; ">
      </table>
    </div>
  </div>
  <!--\\\\\\\ inner end\\\\\\--> 
</div>
<!--\\\\\\\ wrapper end\\\\\\--> 
<!-- Modal -->
<?php echo popupsOtherBlockData(); ?>
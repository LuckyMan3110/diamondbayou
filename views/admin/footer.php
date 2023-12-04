        
            </div>
        </div>
        
        <!--footer-->
		<div class="footer">
		   <p>Copyright <?= date('Y') ?> &copy; <?php echo getadmin_contact_info('dashboard_title'); ?> , All Rights Reserved.</p>
		</div>
        <!--//footer-->
	</div>
	<!-- Classie -->
		<script src="<?= BASE_URL() ?>new-admin/js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			

			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!--scrolling js-->
	<script src="<?= BASE_URL() ?>new-admin/js/jquery.nicescroll.js"></script>
	<script src="<?= BASE_URL() ?>new-admin/js/scripts.js"></script>
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
   <!--script src="<?= BASE_URL() ?>new-admin/js/bootstrap.js"> </script-->

	<div class="row calender widget-shadow" style="display: none;">
		<h4 class="title">Calender</h4>
		<div class="cal1">
			
		</div>
	</div>
	
    <script src="<?php echo ADMIN_LIB; ?>js/bootstrap.min.js"></script>
    <script src="<?php echo ADMIN_LIB; ?>js/common-script.js"></script>
    <script src="<?php echo ADMIN_LIB; ?>js/jquery.slimscroll.min.js"></script>
    <script src="<?php echo ADMIN_LIB; ?>js/jquery.sparkline.js"></script>
    <script src="<?php echo ADMIN_LIB; ?>js/sparkline-chart.js"></script>
    <script src="<?php echo ADMIN_LIB; ?>js/graph.js"></script>
    <script src="<?php echo ADMIN_LIB; ?>js/edit-graph.js"></script>
    <script src="<?php echo ADMIN_LIB; ?>plugins/kalendar/kalendar.js" type="text/javascript"></script>
    <script src="<?php echo ADMIN_LIB; ?>plugins/kalendar/edit-kalendar.js" type="text/javascript"></script>
    
    <script src="<?php echo ADMIN_LIB; ?>plugins/sparkline/jquery.sparkline.js" type="text/javascript"></script>
    <script src="<?php echo ADMIN_LIB; ?>plugins/sparkline/jquery.customSelect.min.js" ></script> 
    <script src="<?php echo ADMIN_LIB; ?>plugins/sparkline/sparkline-chart.js"></script> 
    <script src="<?php echo ADMIN_LIB; ?>plugins/sparkline/easy-pie-chart.js"></script>
    <script src="<?php echo ADMIN_LIB; ?>plugins/morris/morris.min.js" type="text/javascript"></script> 
    <script src="<?php echo ADMIN_LIB; ?>plugins/morris/raphael-min.js" type="text/javascript"></script>  
    <script src="<?php echo ADMIN_LIB; ?>plugins/morris/morris-script.js"></script> 
    
    <script src="<?php echo ADMIN_LIB; ?>plugins/demo-slider/demo-slider.js"></script>
    <script src="<?php echo ADMIN_LIB; ?>plugins/knob/jquery.knob.min.js"></script> 
    
    <script src="<?php echo ADMIN_LIB; ?>js/jPushMenu.js"></script> 
    <script src="<?php echo ADMIN_LIB; ?>js/side-chats.js"></script>
    <script src="<?php echo ADMIN_LIB; ?>js/jquery.slimscroll.min.js"></script>
    <script src="<?php echo ADMIN_LIB; ?>plugins/scroll/jquery.nanoscroller.js"></script>
	

<style>
.flexigrid div.btnseparator {
    float: left;
    height: 22px;
    border-left: 1px solid #ccc;
    border-right: 1px solid #ccc;
    margin: 1px;
}
.flexigrid div.tDiv {
    background: none;background-color: rgba(0, 0, 0, 0);
    position: relative;
    border: 1px solid #ccc;
    border-bottom-width: 1px;
    border-bottom-style: solid;
    border-bottom-color: rgb(204, 204, 204);
    border-bottom: 0px;
    overflow: hidden;
    height: 50px;
    background-color: #cccccc;
    padding-top: 10px;
}
.flexigrid div.pDiv {
    background: url(images/wbg.gif) repeat-x 0 -1px;
    border: 1px solid #ccc;
    border-top: 0px;
    overflow: hidden;
    white-space: nowrap;
    position: relative;
    height: 50px;
    padding-top: 10px;
    background-color: #cccccc;
}
.flexigrid {
    border: solid #cccccc 1px;
    width: 100% !important;
}
.flexigrid div.mDiv div {
    padding: 0px !important;
    white-space: nowrap;
}
#results td{
    border: solid #cccccc 1px;
}
.breadcrumb_admin {
    width: 100%;
    background: #fff;
    box-shadow: 0 2px 2px rgba(0, 0, 0, 0.05), 0 1px 0 rgba(0, 0, 0, 0.05);
    margin-bottom: 15px;
}
.pull-left {
    float: left !important;
}
.page_title {
    font-size: 22px;
    padding: 7px 0 7px 10px;
    text-transform: uppercase;
}
.page_title h1 {
    font-size: 22px;
    font-weight: normal;
    display: inline;
    margin: 3px 0px 6px 0px;
    float: left;
}
.page_title h2 {
    font-size: 12px;
    font-weight: normal;
    display: inline;
    color: #999999;
    margin-top: 9px;
    position: absolute;
}
.page_title h1::after {
    content: "/";
    margin-right: 10px;
    margin-left: 15px;
    font-size: 22px;
    color: #ccc;
}
.pageheader{
    font-size: 22px !important;
    padding: 15px !important;
    text-align: center !important;
}
.cbp-spmenu-vertical {
    width: 230px;
    overflow: scroll;
}
#cbp-spmenu-s1 b{
    padding-left: 29px;
}
.nav > li > a {
    padding: 4px 10px;
}
</style>
	
</body>
</html>
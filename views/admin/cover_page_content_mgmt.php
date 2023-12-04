<style>
#cke_1_contents{height:700px!important}
#cke_2_contents{height:700px!important}
#cke_3_contents{height:700px!important}
#cke_4_contents{height:700px!important}
#cke_5_contents{height:700px!important}
#cke_6_contents{height:700px!important}
.col-sm-12{padding:10px 0px}
</style>
<div class="form-group">
	<label class="col-sm-2 control-label">Page Cover:</label>
	<div class="col-sm-10">
		<select name="templateid" id="templateid" class="form-control">
			<option value="home">Home Page</option>
			<option value="diamonds">Diamond Page</option>
			<option value="engagement">Engagement Page</option>
			<option value="wedding">Wedding Page</option>
			<option value="jewelry">Fine Jewelry Page</option>
			<option value="learn">Learn Page</option>
		</select>
	</div>
</div>
<?php /* <script src="<?php echo ADMIN_LIB; ?>plugins/ckeditor/ckeditor.js"></script> */ ?>
<script src="https://cdn.ckeditor.com/4.16.1/standard-all/ckeditor.js"></script>
<div class="row configs_item" id="home">
	<form action="<?php echo config_item('base_url');?>home_page_mgmt/manage_cover_page" method="POST" id="home_content_form" enctype="multipart/form-data">
		<input type="hidden" name="page_name" value="home" />
		<?php
		$qry = "SELECT * FROM `dev_cover_pages` WHERE page_name LIKE 'home' ORDER BY `sort_order` ASC";
		$return = $this->db->query($qry);
		$result1 = $return->result_array();
		foreach($result1 as $row){
		?>
			<div class="col-sm-12">
				<div class="form-group">
					<label class="col-sm-1 control-label" style="text-align: center;">Section <?= $row['page_section'];?>:</label>
					<div class="col-sm-11">
						<?php if($row['sort_order'] == 0){ ?>
						<input type="submit" name="btn_submit" value="Save Changes" />
						<?php }else{ ?>
						<hr>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="col-sm-12">
				<div class="form-group">
					<label class="col-sm-1 control-label">Sort order:</label>
					<div class="col-sm-11">
						<input type="text" class="form-control" name="sort_order" value="<?= $row['sort_order'];?>">
					</div>
				</div>
			</div>
			<div class="col-sm-12">
				<div class="form-group">
					<label class="col-sm-1 control-label">Content/text:</label>
					<div class="col-sm-11">
						<textarea class="editor1" name="editor1" id="home_content"><?= $row['section_content'];?></textarea>
					</div>
				</div>
			</div>
		<?php } ?>
	</form>
</div>

<div class="row configs_item" id="diamonds" style="display:none;">
	<form action="<?php echo config_item('base_url');?>home_page_mgmt/manage_cover_page" method="POST" id="diamonds_content_form" enctype="multipart/form-data">
		<input type="hidden" name="page_name" value="diamonds" />
		<?php
		$qry = "SELECT * FROM `dev_cover_pages` WHERE page_name LIKE 'diamonds' ORDER BY `sort_order` ASC";
		$return = $this->db->query($qry);
		$result2 = $return->result_array();
		foreach($result2 as $row){
		?>
			<div class="col-sm-12">
				<div class="form-group">
					<label class="col-sm-1 control-label" style="text-align: center;">Section <?= $row['page_section'];?>:</label>
					<div class="col-sm-11">
						<?php if($row['sort_order'] == 0){ ?>
						<input type="submit" name="btn_submit" value="Save Changes" />
						<?php }else{ ?>
						<hr>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="col-sm-12">
				<div class="form-group">
					<label class="col-sm-1 control-label">Sort order:</label>
					<div class="col-sm-11">
						<input type="text" class="form-control" name="sort_order" value="<?= $row['sort_order'];?>">
					</div>
				</div>
			</div>
			<div class="col-sm-12">
				<div class="form-group">
					<label class="col-sm-1 control-label">Content/text:</label>
					<div class="col-sm-11">
						<textarea class="editor2" name="editor2" id="diamonds_content"><?= $row['section_content'];?></textarea>
					</div>
				</div>
			</div>
		<?php } ?>
	</form>
</div>

<div class="row configs_item" id="engagement" style="display:none;">
	<form action="<?php echo config_item('base_url');?>home_page_mgmt/manage_cover_page" method="POST" id="engagement_content_form" enctype="multipart/form-data">
		<input type="hidden" name="page_name" value="engagement" />
		<?php
		$qry = "SELECT * FROM `dev_cover_pages` WHERE page_name LIKE 'engagement' ORDER BY `sort_order` ASC";
		$return = $this->db->query($qry);
		$result2 = $return->result_array();
		foreach($result2 as $row){
		?>
			<div class="col-sm-12">
				<div class="form-group">
					<label class="col-sm-1 control-label" style="text-align: center;">Section <?= $row['page_section'];?>:</label>
					<div class="col-sm-11">
						<?php if($row['sort_order'] == 0){ ?>
						<input type="submit" name="btn_submit" value="Save Changes" />
						<?php }else{ ?>
						<hr>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="col-sm-12">
				<div class="form-group">
					<label class="col-sm-1 control-label">Sort order:</label>
					<div class="col-sm-11">
						<input type="text" class="form-control" name="sort_order" value="<?= $row['sort_order'];?>">
					</div>
				</div>
			</div>
			<div class="col-sm-12">
				<div class="form-group">
					<label class="col-sm-1 control-label">Content/text:</label>
					<div class="col-sm-11">
						<textarea class="editor3" name="editor3" id="engagement_content"><?= $row['section_content'];?></textarea>
					</div>
				</div>
			</div>
		<?php } ?>
	</form>
</div>

<div class="row configs_item" id="wedding" style="display:none;">
	<form action="<?php echo config_item('base_url');?>home_page_mgmt/manage_cover_page" method="POST" id="wedding_content_form" enctype="multipart/form-data">
		<input type="hidden" name="page_name" value="wedding" />
		<?php
		$qry = "SELECT * FROM `dev_cover_pages` WHERE page_name LIKE 'wedding' ORDER BY `sort_order` ASC";
		$return = $this->db->query($qry);
		$result2 = $return->result_array();
		foreach($result2 as $row){
		?>
			<div class="col-sm-12">
				<div class="form-group">
					<label class="col-sm-1 control-label" style="text-align: center;">Section <?= $row['page_section'];?>:</label>
					<div class="col-sm-11">
						<?php if($row['sort_order'] == 0){ ?>
						<input type="submit" name="btn_submit" value="Save Changes" />
						<?php }else{ ?>
						<hr>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="col-sm-12">
				<div class="form-group">
					<label class="col-sm-1 control-label">Sort order:</label>
					<div class="col-sm-11">
						<input type="text" class="form-control" name="sort_order" value="<?= $row['sort_order'];?>">
					</div>
				</div>
			</div>
			<div class="col-sm-12">
				<div class="form-group">
					<label class="col-sm-1 control-label">Content/text:</label>
					<div class="col-sm-11">
						<textarea class="editor4" name="editor4" id="wedding_content"><?= $row['section_content'];?></textarea>
					</div>
				</div>
			</div>
		<?php } ?>
	</form>
</div>

<div class="row configs_item" id="jewelry" style="display:none;">
	<form action="<?php echo config_item('base_url');?>home_page_mgmt/manage_cover_page" method="POST" id="jewelry_content_form" enctype="multipart/form-data">
		<input type="hidden" name="page_name" value="jewelry" />
		<?php
		$qry = "SELECT * FROM `dev_cover_pages` WHERE page_name LIKE 'jewelry' ORDER BY `sort_order` ASC";
		$return = $this->db->query($qry);
		$result2 = $return->result_array();
		foreach($result2 as $row){
		?>
			<div class="col-sm-12">
				<div class="form-group">
					<label class="col-sm-1 control-label" style="text-align: center;">Section <?= $row['page_section'];?>:</label>
					<div class="col-sm-11">
						<?php if($row['sort_order'] == 0){ ?>
						<input type="submit" name="btn_submit" value="Save Changes" />
						<?php }else{ ?>
						<hr>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="col-sm-12">
				<div class="form-group">
					<label class="col-sm-1 control-label">Sort order:</label>
					<div class="col-sm-11">
						<input type="text" class="form-control" name="sort_order" value="<?= $row['sort_order'];?>">
					</div>
				</div>
			</div>
			<div class="col-sm-12">
				<div class="form-group">
					<label class="col-sm-1 control-label">Content/text:</label>
					<div class="col-sm-11">
						<textarea class="editor5" name="editor5" id="jewelry_content"><?= $row['section_content'];?></textarea>
					</div>
				</div>
			</div>
		<?php } ?>
	</form>
</div>

<div class="row configs_item" id="learn" style="display:none;">
	<form action="<?php echo config_item('base_url');?>home_page_mgmt/manage_cover_page" method="POST" id="learn_content_form" enctype="multipart/form-data">
		<input type="hidden" name="page_name" value="learn" />
		<?php
		$qry = "SELECT * FROM `dev_cover_pages` WHERE page_name LIKE 'learn' ORDER BY `sort_order` ASC";
		$return = $this->db->query($qry);
		$result2 = $return->result_array();
		foreach($result2 as $row){
		?>
			<div class="col-sm-12">
				<div class="form-group">
					<label class="col-sm-1 control-label" style="text-align: center;">Section <?= $row['page_section'];?>:</label>
					<div class="col-sm-11">
						<?php if($row['sort_order'] == 0){ ?>
						<input type="submit" name="btn_submit" value="Save Changes" />
						<?php }else{ ?>
						<hr>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="col-sm-12">
				<div class="form-group">
					<label class="col-sm-1 control-label">Sort order:</label>
					<div class="col-sm-11">
						<input type="text" class="form-control" name="sort_order" value="<?= $row['sort_order'];?>">
					</div>
				</div>
			</div>
			<div class="col-sm-12">
				<div class="form-group">
					<label class="col-sm-1 control-label">Content/text:</label>
					<div class="col-sm-11">
						<textarea class="editor6" name="editor6" id="learn_content"><?= $row['section_content'];?></textarea>
					</div>
				</div>
			</div>
		<?php } ?>
	</form>
</div>
<script>
CKEDITOR.config.allowedContent = true;
CKEDITOR.config.allowedContent = 'span;ul;li;table;td;style;*[id];*(*);*{*}';
CKEDITOR.dtd.$removeEmpty['i'] = false;
CKEDITOR.replace('editor1', {
	extraPlugins: 'stylesheetparser,font',
	height: 300,
	contentsCss: [
		'https://diamondbayou.com/assets/css/font-awesome.css',
		'https://diamondbayou.com/assets/css/slick.css',
		'https://diamondbayou.com/assets/css/slick-theme.css',
		'https://diamondbayou.com/assets/css/bootstrap.css',
		'https://diamondbayou.com/assets/css/style.css',
		'https://diamondbayou.com/assets/css/styles-l.min.css?v=0.01'
	],
	// Configure your file manager integration. This example uses CKFinder 3 for PHP.
	filebrowserBrowseUrl: '<?php echo SITE_URL; ?>cover_images.php',
	filebrowserImageBrowseUrl: '<?php echo SITE_URL; ?>cover_images.php',
	filebrowserUploadUrl: '<?php echo SITE_URL; ?>cover_imageupload.php',
	filebrowserImageUploadUrl: '<?php echo SITE_URL; ?>cover_imageupload.php'
});
CKEDITOR.replace('editor2', {
	extraPlugins: 'stylesheetparser,font',
	height: 300,
	contentsCss: [
		'https://diamondbayou.com/assets/css/global-style-min.css',
		'https://diamondbayou.com/assets/css/common-style-min.css',
		'https://diamondbayou.com/assets/css/new-gateway-min.css',
		'https://diamondbayou.com/assets/css/autocomplete.css',
		'https://diamondbayou.com/assets/css/holiday-mini.css',
		'https://diamondbayou.com/assets/css/diamond_custom.css'
	],
	// Configure your file manager integration. This example uses CKFinder 3 for PHP.
	filebrowserBrowseUrl: '<?php echo SITE_URL; ?>cover_images98.php',
	filebrowserImageBrowseUrl: '<?php echo SITE_URL; ?>cover_images98.php',
	filebrowserUploadUrl: '<?php echo SITE_URL; ?>cover_imageupload.php',
	filebrowserImageUploadUrl: '<?php echo SITE_URL; ?>cover_imageupload.php'
});
CKEDITOR.replace('editor3', {
	extraPlugins: 'stylesheetparser,font',
	height: 300,
	contentsCss: [
		'https://diamondbayou.com/assets/css/global-style-min.css',
		'https://diamondbayou.com/assets/css/common-style-min.css',
		'https://diamondbayou.com/assets/css/engagement-rings.css',
		'https://diamondbayou.com/assets/css/engagement-rings-mobile.min.css',
		'https://diamondbayou.com/assets/css/autocomplete.css',
		'https://diamondbayou.com/assets/css/holiday-mini.css',
		'https://css.brilliantearth.com/static/css/slick.css'
	],
	// Configure your file manager integration. This example uses CKFinder 3 for PHP.
	filebrowserBrowseUrl: '<?php echo SITE_URL; ?>cover_images196.php',
	filebrowserImageBrowseUrl: '<?php echo SITE_URL; ?>cover_images196.php',
	filebrowserUploadUrl: '<?php echo SITE_URL; ?>cover_imageupload.php',
	filebrowserImageUploadUrl: '<?php echo SITE_URL; ?>cover_imageupload.php'
});
CKEDITOR.replace('editor4', {
	extraPlugins: 'stylesheetparser,font',
	height: 300,
	contentsCss: [
		'https://diamondbayou.com/assets/css/global-style-min.css',
		'https://diamondbayou.com/assets/css/global-style-mobile-min.css',
		'https://diamondbayou.com/assets/css/common-style-min.css',
		'https://diamondbayou.com/assets/css/new-gateway-min.css',
		'https://css.brilliantearth.com/static/css/slick.min.css',
		'https://css.brilliantearth.com/static/css/common/owl.carousel.min.css',
		'https://diamondbayou.com/assets/css/autocomplete.css',
		'https://diamondbayou.com/assets/css/holiday-mini.css',
		'https://diamondbayou.com/assets/css/wedding_custom.css'
	],
	// Configure your file manager integration. This example uses CKFinder 3 for PHP.
	filebrowserBrowseUrl: '<?php echo SITE_URL; ?>cover_images294.php',
	filebrowserImageBrowseUrl: '<?php echo SITE_URL; ?>cover_images294.php',
	filebrowserUploadUrl: '<?php echo SITE_URL; ?>cover_imageupload.php',
	filebrowserImageUploadUrl: '<?php echo SITE_URL; ?>cover_imageupload.php'
});
CKEDITOR.replace('editor5', {
	extraPlugins: 'stylesheetparser,font',
	height: 300,
	contentsCss: [
		'https://diamondbayou.com/css/fine-jewelry.css',
		'https://diamondbayou.com/assets/css/jewelry_custom.css'
	],
	// Configure your file manager integration. This example uses CKFinder 3 for PHP.
	filebrowserBrowseUrl: '<?php echo SITE_URL; ?>cover_images392.php',
	filebrowserImageBrowseUrl: '<?php echo SITE_URL; ?>cover_images392.php',
	filebrowserUploadUrl: '<?php echo SITE_URL; ?>cover_imageupload.php',
	filebrowserImageUploadUrl: '<?php echo SITE_URL; ?>cover_imageupload.php'
});
CKEDITOR.replace('editor6', {
	extraPlugins: 'stylesheetparser,font',
	height: 300,
	contentsCss: [
		'https://diamondbayou.com/assets/css/global-style-min.css',
		'https://diamondbayou.com/assets/css/how-to-buy-an-engagement-ring.css',
		'https://diamondbayou.com/assets/css/autocomplete.css',
		'https://diamondbayou.com/assets/css/holiday-mini.css'
	],
	// Configure your file manager integration. This example uses CKFinder 3 for PHP.
	filebrowserBrowseUrl: '<?php echo SITE_URL; ?>cover_images490.php',
	filebrowserImageBrowseUrl: '<?php echo SITE_URL; ?>cover_images490.php',
	filebrowserUploadUrl: '<?php echo SITE_URL; ?>cover_imageupload.php',
	filebrowserImageUploadUrl: '<?php echo SITE_URL; ?>cover_imageupload.php'
});
</script>
<script>
$(document).ready(function(){
	$("#templateid").change(function(){
		$(".configs_item").hide();
		$("#"+$(this).val()+"").show();
	});
});

$('#home_content_form').on('submit',function(){
	var editor_html1 = $("#home_content").Editor("getText");
	$("#home_content").val(editor_html1);
});

$('#diamonds_content_form').on('submit',function(){
	var editor_html1 = $("#diamonds_content").Editor("getText");
	$("#diamonds_content").val(editor_html1);
});

$('#engagement_content_form').on('submit',function(){
	var editor_html1 = $("#engagement_content").Editor("getText");
	$("#engagement_content").val(editor_html1);
});

$('#wedding_content_form').on('submit',function(){
	var editor_html1 = $("#wedding_content").Editor("getText");
	$("#wedding_content").val(editor_html1);
});

$('#jewelry_content_form').on('submit',function(){
	var editor_html1 = $("#jewelry_content").Editor("getText");
	$("#jewelry_content").val(editor_html1);
});

$('#learn_content_form').on('submit',function(){
	var editor_html1 = $("#learn_content").Editor("getText");
	$("#learn_content").val(editor_html1);
});
</script>

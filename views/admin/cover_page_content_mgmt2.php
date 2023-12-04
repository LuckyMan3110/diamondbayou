<style>
.form-group {margin-bottom: 15px;padding: 10px 0px;}
</style>
<div class="inner"> 
	<div class="contentpanel"> 
		<div><?php echo admin_main_menu_list();?></div>
		<div class="pull-left breadcrumb_admin clear_both">
			<div class="pull-left page_title theme_color">
				<h1>Site Management</h1>
				<h2 class="">Manage Cover Page Content</h2>
			</div>
			<div class="pull-right">
				<ol class="breadcrumb">
					<li><a href="<?php echo SITE_URL; ?>admin">Home</a></li>
					<li class="active">Manage Cover Page Content</li>
				</ol>
			</div>
		</div>
		<div class="container clear_both padding_fix"> 
			<form action="<?php echo config_item('base_url');?>home_page_mgmt/manage_cover_page" method="POST" name="page_content_form" enctype="multipart/form-data">
				<input type="submit" name="btn_submit" value="Submit Page" />
				<div class="form-group">
					<label class="col-sm-2 control-label">Page Cover:</label>
					<div class="col-sm-10">
						<select name="templateid" id="templateid" class="form-control">
							<option value="home">Home Page</option>
							<option value="diamond">Diamond Page</option>
							<option value="engagement">Engagement Page</option>
							<option value="wedding">Wedding Page</option>
							<option value="jewelry">Fine Jewelry Page</option>
							<option value="learn">Learn Page</option>
						</select>
					</div>
				</div>
				<div class="row configs_item" id="home">
					<div class="col-sm-12">
						<div class="form-group">
							<label class="col-sm-6 control-label" style="text-align: center;">Section 1:</label>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">	Upload Image File:</label>
							<div class="col-sm-9">
								<input type="file" name="file_name_1">
								<div class="set_dimension">Dimension: 1903 x 1086</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Content/text:</label>
							<div class="col-sm-9">
								<textarea class="form-control" name="page_content" id="page_content" rows="4"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Sort order:</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="title" value="">
							</div>
						</div>
					</div>
					<div class="form-group"><div class="clear"></div></div>
					<div class="col-sm-12">
						<div class="form-group">
							<label class="col-sm-6 control-label" style="text-align: center;">Section 2:</label>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">	Upload Image File:</label>
							<div class="col-sm-9">
								<input type="file" name="file_name_1">
								<div class="set_dimension">Dimension: 1903 x 1086</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Content/text:</label>
							<div class="col-sm-9">
								<textarea class="form-control" name="page_content" id="page_content" rows="4"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Sort order:</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="title" value="">
							</div>
						</div>
					</div>
					<div class="form-group"><div class="clear"></div></div>
					<div class="col-sm-12">
						<div class="form-group">
							<label class="col-sm-6 control-label" style="text-align: center;">Section 3:</label>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">	Upload Image File:</label>
							<div class="col-sm-9">
								<input type="file" name="file_name_1">
								<div class="set_dimension">Dimension: 1903 x 1086</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Content/text:</label>
							<div class="col-sm-9">
								<textarea class="form-control" name="page_content" id="page_content" rows="4"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Sort order:</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="title" value="">
							</div>
						</div>
					</div>
					<div class="form-group"><div class="clear"></div></div>
					<div class="col-sm-12">
						<div class="form-group">
							<label class="col-sm-6 control-label" style="text-align: center;">Section 4:</label>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">	Upload Image File:</label>
							<div class="col-sm-9">
								<input type="file" name="file_name_1">
								<div class="set_dimension">Dimension: 1903 x 1086</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Content/text:</label>
							<div class="col-sm-9">
								<textarea class="form-control" name="page_content" id="page_content" rows="4"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Sort order:</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="title" value="">
							</div>
						</div>
					</div>
					<div class="form-group"><div class="clear"></div></div>
					<div class="col-sm-12">
						<div class="form-group">
							<label class="col-sm-6 control-label" style="text-align: center;">Section 5:</label>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">	Upload Image File:</label>
							<div class="col-sm-9">
								<input type="file" name="file_name_1">
								<div class="set_dimension">Dimension: 1903 x 1086</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Content/text:</label>
							<div class="col-sm-9">
								<textarea class="form-control" name="page_content" id="page_content" rows="4"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Sort order:</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="title" value="">
							</div>
						</div>
					</div>
					<div class="form-group"><div class="clear"></div></div>
					<div class="col-sm-12">
						<div class="form-group">
							<label class="col-sm-6 control-label" style="text-align: center;">Section 6:</label>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">	Upload Image File:</label>
							<div class="col-sm-9">
								<input type="file" name="file_name_1">
								<div class="set_dimension">Dimension: 1903 x 1086</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Content/text:</label>
							<div class="col-sm-9">
								<textarea class="form-control" name="page_content" id="page_content" rows="4"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Sort order:</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="title" value="">
							</div>
						</div>
					</div>
					<div class="form-group"><div class="clear"></div></div>
					<div class="col-sm-12">
						<div class="form-group">
							<label class="col-sm-6 control-label" style="text-align: center;">Section 7:</label>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">	Upload Image File:</label>
							<div class="col-sm-9">
								<input type="file" name="file_name_1">
								<div class="set_dimension">Dimension: 1903 x 1086</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Content/text:</label>
							<div class="col-sm-9">
								<textarea class="form-control" name="page_content" id="page_content" rows="4"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Sort order:</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="title" value="">
							</div>
						</div>
					</div>
					<div class="form-group"><div class="clear"></div></div>
					<div class="col-sm-12">
						<div class="form-group">
							<label class="col-sm-6 control-label" style="text-align: center;">Section 8:</label>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">	Upload Image File:</label>
							<div class="col-sm-9">
								<input type="file" name="file_name_1">
								<div class="set_dimension">Dimension: 1903 x 1086</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Content/text:</label>
							<div class="col-sm-9">
								<textarea class="form-control" name="page_content" id="page_content" rows="4"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Sort order:</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="title" value="">
							</div>
						</div>
					</div>
					<div class="form-group"><div class="clear"></div></div>
					<div class="col-sm-12">
						<div class="form-group">
							<label class="col-sm-6 control-label" style="text-align: center;">Section 9:</label>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">	Upload Image File:</label>
							<div class="col-sm-9">
								<input type="file" name="file_name_1">
								<div class="set_dimension">Dimension: 1903 x 1086</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Content/text:</label>
							<div class="col-sm-9">
								<textarea class="form-control" name="page_content" id="page_content" rows="4"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Sort order:</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="title" value="">
							</div>
						</div>
					</div>
					<div class="form-group"><div class="clear"></div></div>
					<div class="col-sm-12">
						<div class="form-group">
							<label class="col-sm-6 control-label" style="text-align: center;">Section 10:</label>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">	Upload Image File:</label>
							<div class="col-sm-9">
								<input type="file" name="file_name_1">
								<div class="set_dimension">Dimension: 1903 x 1086</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Content/text:</label>
							<div class="col-sm-9">
								<textarea class="form-control" name="page_content" id="page_content" rows="4"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Sort order:</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="title" value="">
							</div>
						</div>
					</div>
					<div class="form-group"><div class="clear"></div></div>
					<div class="col-sm-12">
						<div class="form-group">
							<label class="col-sm-6 control-label" style="text-align: center;">Section 11:</label>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">	Upload Image File:</label>
							<div class="col-sm-9">
								<input type="file" name="file_name_1">
								<div class="set_dimension">Dimension: 1903 x 1086</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Content/text:</label>
							<div class="col-sm-9">
								<textarea class="form-control" name="page_content" id="page_content" rows="4"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Sort order:</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="title" value="">
							</div>
						</div>
					</div>
					<div class="form-group"><div class="clear"></div></div>
					<div class="col-sm-12">
						<div class="form-group">
							<label class="col-sm-6 control-label" style="text-align: center;">Section 2:</label>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">	Upload Image File:</label>
							<div class="col-sm-9">
								<input type="file" name="file_name_1">
								<div class="set_dimension">Dimension: 1903 x 1086</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Content/text:</label>
							<div class="col-sm-9">
								<textarea class="form-control" name="page_content" id="page_content" rows="4"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Sort order:</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="title" value="">
							</div>
						</div>
					</div>
					<div class="form-group"><div class="clear"></div></div>
					<div class="col-sm-12">
						<div class="form-group">
							<label class="col-sm-6 control-label" style="text-align: center;">Section 3:</label>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">	Upload Image File:</label>
							<div class="col-sm-9">
								<input type="file" name="file_name_1">
								<div class="set_dimension">Dimension: 1903 x 1086</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Content/text:</label>
							<div class="col-sm-9">
								<textarea class="form-control" name="page_content" id="page_content" rows="4"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Sort order:</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="title" value="">
							</div>
						</div>
					</div>
					<div class="form-group"><div class="clear"></div></div>
					<div class="col-sm-12">
						<div class="form-group">
							<label class="col-sm-6 control-label" style="text-align: center;">Section 2:</label>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">	Upload Image File:</label>
							<div class="col-sm-9">
								<input type="file" name="file_name_1">
								<div class="set_dimension">Dimension: 1903 x 1086</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Content/text:</label>
							<div class="col-sm-9">
								<textarea class="form-control" name="page_content" id="page_content" rows="4"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Sort order:</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="title" value="">
							</div>
						</div>
					</div>
					<div class="form-group"><div class="clear"></div></div>
					<div class="col-sm-12">
						<div class="form-group">
							<label class="col-sm-6 control-label" style="text-align: center;">Section 3:</label>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">	Upload Image File:</label>
							<div class="col-sm-9">
								<input type="file" name="file_name_1">
								<div class="set_dimension">Dimension: 1903 x 1086</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Content/text:</label>
							<div class="col-sm-9">
								<textarea class="form-control" name="page_content" id="page_content" rows="4"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Sort order:</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="title" value="">
							</div>
						</div>
					</div>
				</div>

				<div class="row configs_item" id="diamond" style="display:none;">
					<div class="col-sm-12">
						<form name="page_content_form" method="post" action="" enctype="multipart/form-data">
							<div class="form-group pull-right">
								<input type="submit" name="btn_submit" value="Submit Page" />
							</div>
							<div class="clear"></div><br>
							<div class="form-group">
								<label class="col-sm-1 control-label">Content:</label>
								<div class="col-sm-11">
									<textarea class="form-control ckeditor" name="page_content" id="page_content" rows="6"></textarea>
								</div>
							</div>
						</form>
					</div>
				</div>

				<div class="row configs_item" id="engagement" style="display:none;">
					<div class="col-sm-12">
						<form name="page_content_form" method="post" action="" enctype="multipart/form-data">
							<div class="form-group pull-right">
								<input type="submit" name="btn_submit" value="Submit Page" />
							</div>
							<div class="clear"></div><br>
							<div class="form-group">
								<label class="col-sm-1 control-label">Content:</label>
								<div class="col-sm-11">
									<textarea class="form-control ckeditor" name="page_content" id="page_content" rows="6"></textarea>
								</div>
							</div>
						</form>
					</div>
				</div>

				<div class="row configs_item" id="wedding" style="display:none;">
					<div class="col-sm-12">
						<form name="page_content_form" method="post" action="" enctype="multipart/form-data">
							<div class="form-group pull-right">
								<input type="submit" name="btn_submit" value="Submit Page" />
							</div>
							<div class="clear"></div><br>
							<div class="form-group">
								<label class="col-sm-1 control-label">Content:</label>
								<div class="col-sm-11">
									<textarea class="form-control ckeditor" name="page_content" id="page_content" rows="6"></textarea>
								</div>
							</div>
						</form>
					</div>
				</div>

				<div class="row configs_item" id="jewelry" style="display:none;">
					<div class="col-sm-12">
						<form name="page_content_form" method="post" action="" enctype="multipart/form-data">
							<div class="form-group pull-right">
								<input type="submit" name="btn_submit" value="Submit Page" />
							</div>
							<div class="clear"></div><br>
							<div class="form-group">
								<label class="col-sm-1 control-label">Content:</label>
								<div class="col-sm-11">
									<textarea class="form-control ckeditor" name="page_content" id="page_content" rows="6"></textarea>
								</div>
							</div>
						</form>
					</div>
				</div>

				<div class="row configs_item" id="learn" style="display:none;">
					<div class="col-sm-12">
						<form name="page_content_form" method="post" action="" enctype="multipart/form-data">
							<div class="form-group pull-right">
								<input type="submit" name="btn_submit" value="Submit Page" />
							</div>
							<div class="clear"></div><br>
							<div class="form-group">
								<label class="col-sm-1 control-label">Content:</label>
								<div class="col-sm-11">
									<textarea class="form-control ckeditor" name="page_content" id="page_content" rows="6"></textarea>
								</div>
							</div>
						</form>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
$(document).ready(function(){
	$("#templateid").change(function(){
		$(".configs_item").hide();
		$("#"+$(this).val()+"").show();
	});
});
</script>
<!-- Modal -->
<?php echo popupsOtherBlockData(); ?>
<script type="text/javascript" src="<?php echo ADMIN_LIB; ?>plugins/ckeditor/ckeditor.js"></script>
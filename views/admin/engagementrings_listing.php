<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
<div class="inner"> 
	<div class="contentpanel">
        <div><?php echo admin_main_menu_list(); ?></div>
		<div class="pull-left breadcrumb_admin clear_both">
			<div class="pull-left page_title theme_color">
				<h1>Diamonds</h1>
				<h2 class="">Rings Listing</h2>
			</div>
			<div class="pull-right">
				<ol class="breadcrumb">
					<li><a href="<?php echo SITE_URL; ?>admin">Home</a></li>
					<li>Rings Listing</li>
				</ol>
			</div>
		</div>
		<div>
			<div class="blue_man">
				<div class="blue_admin_box1">
					<div class="addcountry_box">
						<div class="heading">
							<h1>Manage Rings</h1>
						</div>
						<div class="table-responsive">
							<table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" id="datatable" class="table_border">
								<thead>
									<tr>
										<th style="display:none;">id</th>
										<th>Category</th>
										<th>Sub Category</th>
										<th>Name</th>
										<th>Price</th>
										<th>Description</th>
										<th>Video Link</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($ring_rows as $row){ ?>
										<tr>
											<td style="display:none;"><?= $row['id'] ?></td>
											<td><?= $row['category'] ?></td>
											<td><?= $row['sub_category'] ?></td>
											<td><?= $row['name'] ?></td>
											<td><?= $row['price'] ?></td>
											<td><?= $row['description'] ?></td>
											<td><?= $row['video_link'] ?></td>
											<td>
												<button class="btn btn-primary popupEdit" id="<?= $row['id'] ?>">Add Video</button>
												<div id="myModalData<?= $row['id'] ?>" class="modal fade" role="dialog">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal">&times;</button>
																<h4 class="modal-title">Add Video link for <?= $row['description'] ?></h4>
															</div>
															<div class="modal-body">
																<form id="videoSubmit" method="post" action="<?= BASE_URL() ?>admin/save_videolink">
																	<input name="ring_id" type="hidden" value="<?= $row['id'] ?>" id="ring_id"  />
																	<div class="row">
																		<div class="col-md-12">
																			<div class="form-group">
																				<label>Video ID</label>
																				<input type="text" name="video_link" class="form-control" required autocomplete="off" value="<?= $row['video_link'] ?>" placeholder="https://www.youtube.com/embed/{Video ID}" />
																			</div>
																		</div>
																		<button type="submit" id="submitvideo" class="btn btn-primary">Save</button>
																	</div>
																</form>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
															</div>
														</div>
													</div>
												</div>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
$('#submitvideo').click(function(event){
	event.preventDefault();
	var ring_id = $('#ring_id').val();
	if(ring_id != 0 || ring_id == ""){
		var formData = new FormData();
		var contact = $('#videoSubmit').serializeArray();
		$.each(contact, function (key, input) {
			formData.append(input.name, input.value);
		});

		$('#submitvideo').addClass('disabled');
		$.ajax({
			type:'POST',
			url:"<?=base_url();?>admin/save_videolink",
			data: formData,
			cache: false,
			contentType: false,
			processData: false,
			dataType: 'JSON',
			success:function(data){
				alert(data.message);
				location.reload();
			}
		});
	}else{
		alert('Your Paid amount is Zero (0)'); 
	}
});


$(document).ready(function () {
	$("#datatable").DataTable({
		dom: "Bfrtip",
		"bPaginate": true, ordering: true, "pageLength": 15,
		buttons: [],
		order: [0, "asc"],
		responsive: true,
		"footerCallback": function (row, data, start, end, display) {
		}
	});

	$('.popupEdit').click(function(){
		var id = $(this).attr('id');
		$('#myModalData'+id).modal('show');
	});
});
</script>
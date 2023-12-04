<style>
.corporate-template{padding-bottom:30px;padding-top:30px;padding-left:15px;padding-right:15px}
.naccs{position:relative;max-width:100%;margin:40px auto 0}
.naccs .menu div{padding:15px 20px 15px 40px;margin-bottom:10px;color:#fff;background:#111;box-shadow:0 0 20px rgba(0,0,0,0.1);cursor:pointer;position:relative;vertical-align:middle;font-weight:700;transition:1s all cubic-bezier(0.075,0.82,0.165,1)}
.naccs .menu div:hover{box-shadow:0 0 10px rgba(0,0,0,0.1)}
.naccs .menu div span.light{height:10px;width:10px;position:absolute;top:24px;left:15px;background-color:#37B1F2;border-radius:100%;transition:1s all cubic-bezier(0.075,0.82,0.165,1)}
.naccs .menu div.active span.light{background-color:#37B1F2;left:0;height:100%;width:3px;top:0;border-radius:0}
.naccs .menu div.active{color:#37B1F2;padding:15px 20px}
ul.nacc{position:relative;height:400px;list-style:none;margin:0;padding:0;transition:.5s all cubic-bezier(0.075,0.82,0.165,1)}
.corporate-template{padding-bottom:60px;padding-top:60px}
ul.nacc li{opacity:0;transform:translateX(50px);position:absolute;list-style:none;transition:1s all cubic-bezier(0.075,0.82,0.165,1)}
ul.nacc li.active{transition-delay:.3s;z-index:2;opacity:1;transform:translateX(0px)}
ul.nacc li p{margin:0;font-size:15px}
ul.nacc a, p, li {font-family: CenturyGothic,sans-serif;}
</style>
<section class="corporate-template content">
	<?php
	$where_sub_page_slug	=  array('page_id' => $content_main_page[0]->page_id);
	$sub_content_main_page	=  $this->Commonmodel->getdata_any_table_where($where_sub_page_slug, 'content_sub_page');
	if($sub_content_main_page){
	?>
		<div class="naccs">
			<div class="grid">
				<div class="col-md-4">
					<div class="menu">
						<div class="active"><span class="light"></span><span><?= $title ?></span></div>
						<?php foreach($sub_content_main_page as $sub_page_data){ ?>
							<div><span class="light"></span><span><?= $sub_page_data->title ?></span></div>
						<?php } ?>
					</div>
				</div>
				<div class="col-md-8">
					<ul class="nacc">
						<li class="active">
							<div><?php echo $content_data ?></div>
						</li>
						<?php foreach($sub_content_main_page as $sub_page_data){ ?>
							<li><div><?= $sub_page_data->content ?></div></li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>
	<?php }else{ ?>
		<div class="content-area">
			<?php echo $content_data ?>
		</div>
	<?php } ?>
	<script>
	$(document).on("click", ".naccs .menu div", function() {
		var numberIndex = $(this).index();
		if (!$(this).is("active")) {
			$(".naccs .menu div").removeClass("active");
			$(".naccs ul li").removeClass("active");
			$(this).addClass("active");
			$(".naccs ul").find("li:eq(" + numberIndex + ")").addClass("active");
			var listItemHeight = $(".naccs ul")
				.find("li:eq(" + numberIndex + ")")
				.innerHeight();
			$(".naccs ul").height(listItemHeight + "px");
		}
	});
	</script>
</section>
		</div>
		<link href="<?php echo SITE_URL; ?>css/mystyle.css" rel="stylesheet" type="text/css">
		<?php echo setContainer('footer'); ?>
		<div class="clear"></div>
		<?php require_once 'application/views/erd/whsale_footer_file.php'; ?>
		<script>
		$(document).ready(function () {
			$('#fade').popup({
				transition: 'all 0.3s',
				scrolllock: true
			});
		});
		$(document).ready(function () {
			$('#biolist').popup({
				transition: 'all 0.3s',
				scrolllock: true
			});
		});
		</script>
	</body>
</html>
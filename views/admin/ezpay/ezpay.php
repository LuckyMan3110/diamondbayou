<style>
	.ezpay h1{
		color: #444;
	}

	.ezpayOptions{
		margin: 10px;
		padding: 10px;
	}
	.ezpayOptions li{
		display: inline;
		margin: 0;
		padding: 0;
		margin-right: 10px;
		padding: 10px;
	}
	.ezpayOptions a{
		padding: 10px;
		background-color: #ccc;
		border: solid 1px #aaa;
	}
</style>
<div class="ezpay">
	<ul class="ezpayOptions">
		<li><a href="<?php echo config_item('base_url')."admin/ezpay/vendor"; ?>">Vendor Level</a></li>
		<li><a href="<?php echo config_item('base_url')."admin/ezpay/category"; ?>">Category Level</a></li>
		<li><a href="<?php echo config_item('base_url')."admin/ezpay/item"; ?>">Item Level</a></li>
	</ul>
</div>
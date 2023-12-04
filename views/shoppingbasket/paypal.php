<div class="floatl pad05 body">
  <div class="bodytop"></div>
  <div class="bodymid2">

<form action="https://www.paypal.com/cgi-bin/webscr" method="post" name="form1" id="form1">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="orders@godstonediamonds.com">
<input type="hidden" name="item_name" value="Item Name">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="amount" value="<?php echo ($paypalprice); ?>">
<input type="image" src="http://www.paypal.com/en_US/i/btn/x-click-but01.gif" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
</form>

<script>

window.form.submit();

</script>
  
  </div>
 <div class="bodybottom"></div>
</div>
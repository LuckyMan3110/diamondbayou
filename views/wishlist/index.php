<script type="text/javascript">
$(document).ready(function()
{
	$("[id^='delete_']").click(function()
	{
		var id	=	$(this).attr("id").split("_")[1];
		if(id != "")
		{
			var postdata	=	"delete="+id;
			$.ajax(
			{
				type: "POST",
				data: postdata,
				url:window.location.href,
				success: function(response)
				{
					window.location.href = window.location.href;
				},
				error: function(){alert('Error ');}
			}) ;
		}
	});
});
</script>

<div class="registerMain">
  <div class="registerHeading"><h1 style="color: rgb(100, 34, 132);padding:10px;">Wish List</h1><?php //echo count($wishlist); ?></div>
<?php if(count($wishlist) > 0): ?>
  <div class="tableContent">
    <div class="rowHeading">
      <div class="columnStyle columnWidth10">Quantity</div>
      <div class="columnStyle columnWidth10">Item</div>
      <div class="columnStyle columnWidth10">Price</div>
      <div class="columnStyle columnWidth10">Date</div>
      <div class="columnStyle columnWidth10">Image</div>
      <div class="columnStyle columnWidth10">Action</div>
    </div>
<?php $class = 'rowLight';

foreach($wishlist as $wish): ?>
<?php
/* if($wish['ringsetting'] != 0)
$itemName = "Ring";
if($wish['earringsetting'] != 0)
$itemName = "Earring";
if($wish['pendantsetting'] != 0)
$itemName = "Pendent";
if($wish['watchid'] != 0)
$itemName = "Watch"; */
?>
    <div class="<?php echo $class; ?>">
      <div class="columnStyle columnWidth10">&nbsp;<?php echo $wish['quantity']; ?></div>
      <div class="columnStyle columnWidth10">&nbsp;<?php echo $wish['lot']; ?></div>
      <div class="columnStyle columnWidth10">&nbsp;<?php echo ($wish['price'])?($wish['price']):('Not Available');?></div>
      <div class="columnStyle columnWidth10">&nbsp;<?php echo $wish['insertdate']; ?></div>
      <div class="columnStyle columnWidth10">&nbsp;
         <?if($wish['url']=='addqualitygold'){?>
		 <a href="#" onclick="showdetails('qg','<?php echo $wish['lot']?>')" style="color:#000000;" > 
		 <?}else if($wish['url']=='addstuller'){?>
	     <a href="#" onclick="showdetails_new('ff','<?php echo $wish['lot']?>')" style="color:#000000;" > 
	     <?}
		 else {
		 ?>
		  <a href="#" onclick="viewDiamondDetails('<?php echo $wish['lot']?>',false)" style="color:#000000;" > 
		 <?}?>
		 
		    View  Image</a>
	    </div>
      <div class="columnStyleButton columnWidth10">&nbsp;<a href="javascript:void(0);" id="delete_<?php echo $wish['id']; ?>"><input type="button" name="delete" value="Delete" /></a></div>
    </div>
<?php //$class = ($class == "rowLight")?("rowDark"):("rowLight"); ?>
<?php endforeach;?>
	<div class="rowLight">
		<?php echo $this->pagination->create_links(); ?>
   	</div>
  </div>
<?php else: ?>
  <div class="registerMainContent">
    <div class="messageError">Empty! No items found in your wishlist.</div>
  </div>
<?php endif; ?>
</div>
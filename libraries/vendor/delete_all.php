<?php
session_start();
include('config.php');
$query = "SELECT * FROM product";
$data = mysqli_query($conn,$query)

?>
<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <link rel="stylesheet" href="./etsy_files/bootstrap.min.css">
        <link rel="stylesheet" href="./etsy_files/bootstrap-theme.min.css">
        <link href="./etsy_files/fileinput.css" media="all" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body>
		        <div class="container kv-main">
            <div class="page-header">
                <h1>show products</h1>
            </div>
            <form method="post" action="etsy.php" enctype="multipart/form-data">
                <button name="submit" type="submit" id="add_product" class="btn btn-primary">Back To Home Pge</button>&nbsp&nbsp&nbsp&nbsp;
                
            </form><br>
<!--
            <form method="post" action="delete_all.php" enctype="multipart/form-data">
                <button name="submit" type="submit" id="add_product" class="btn btn-primary">Delete All Products</button>&nbsp&nbsp&nbsp&nbsp;    
            </form><br>
-->
            <!--<form action="send_product.php" method="post">-->
            <form action="delete_all_p.php" method="post">
            <button name="submit" type="submit" id="send_product" class="btn btn-primary">Delete Selected</button><br><br>
			
        </div>
   
		<table border="2" id="mytable">
			<th><input type="checkbox" id="checkAll"></th>
			<th>id</th>
			<th>listing id</th>
			<th>quantity</th>
			<th>title</th>
			<th>description</th>
			<th>price</th>
			<th>who_made</th>
			<th>is_supply</th>
			<th>when_made</th>
			<th>tags</th>
	
			<?php
			while($data1 = mysqli_fetch_assoc($data)){
				echo "<tr><td><input type='checkbox' name='checkbox[]' id='checkAll' value='".$data1['id']."'></td><td>".$data1['id']."</td><td>".$data1['listing_id']."</td><td>".$data1['quantity']."</td><td>".$data1['title']."</td><td>".$data1['description']."</td><td>".$data1['price']."</td><td>".$data1['who_made']."</td><td>".$data1['is_supply']."</td><td>".$data1['when_made']."</td><td>".$data1['tags']."</td></tr>";
				echo '<input type="hidden" name="listing_id" value="'.$data1['listing_id'].'">';
				echo '<input type="hidden" name="id" value="'.$data1['id'].'">';
				
				}
			?>
		</table>
		</form>
<script>
$("#checkAll").click(function(){
    $('input:checkbox').not(this).prop('checked', this.checked);
});
</script>
</body></html>

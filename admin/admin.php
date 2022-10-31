<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Dashboard</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./adminstyles.css">
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<body class="body">
	<?php
		include('./dashboard.php');
		include('../helpers/DbHelpers.php');
		// variable to call a function which fetches all data from the orders table
		$value = $db_helpers->getOrders('orders');
		$orders = mysqli_fetch_assoc($db_helpers->countData('orders'));
		$products = mysqli_fetch_assoc($db_helpers->countData('animals'));
		$customers = mysqli_fetch_assoc($db_helpers->countUsers('customer'));
		$suppliers = mysqli_fetch_assoc($db_helpers->countUsers('supplier'));
		$most_ordered = $db_helpers->ordering();
		
		$months = ['Jan', 'Feb', 'March', 'April', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'];
	?>
	
	<div class="container">
		<div class="item7">
			<div class="item">
				<b><?=$products['count'];?></b> &nbsp; Product(s)
				<a href="product_report.php"><button type="button" class="button-1"><i class='fas fa-arrow-right'></i></button></a>
			</div>

			<div class="item">
				<b><?=$orders['count'];?></b> &nbsp; order(s)
				<a href="orders_report.php"><button type="button" class="button-1"><i class='fas fa-arrow-right'></i></button></a>
			</div>

			<div class="item">
				<b> <?=$customers['count'];?></b> &nbsp; Customer(s)
				<a href="customers_report.php"><button type="button" class="button-1"><i class='fas fa-arrow-right'></i></button></a>
			</div>

			<div class="item">
				<b><?=$suppliers['count'];?></b> &nbsp; Supplier(s)
				<a href="suppliers_report.php"><button type="button" class="button-1"><i class='fas fa-arrow-right'></i></button></a>
			</div>
			
			<div class="item">
				<b></b> &nbsp; Revenue
				<a href="salesreport.php"><button type="button" class="button-1"><i class='fas fa-arrow-right'></i></button></a>
			</div>
		</div>

		<div class="item">
			<table>
				<tr>
					<th>Breed</th>
					<th>Type</th>
					<th>Quantity</th>
				</tr>
				<?php 
					// create a while loop to fetch all the array values and display in a table
					// var_dump($most_ordered);die();
					while($value = mysqli_fetch_assoc($most_ordered)):
				?>
				<tr>
					<td><?= $value['breed']; ?></td>
					<td><?= $value['type']; ?></td>
					<td><?= $value['sum(quantity)']; ?></td>
				</tr>
				<?php endwhile; ?>
			</table> 
		</div>
	</div>
</body>
</html>
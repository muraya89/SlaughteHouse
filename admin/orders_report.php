<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Landpage</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../public/css/adminstyles.css">
</head>
<body style="display: grid; grid-auto-columns: auto auto">
<div class="nav">
		<input type="checkbox" id="nav-check">
		<div class="nav-header">
			<div class="nav-title">
				<a href=""><b><strong> The Meat Hook</strong></b></a>
			</div>
		</div>
		<div class="nav-btn">
			<label for="nav-check">
				<span></span>
				<span></span>
				<span></span>
			</label>
		</div>
		<div class="nav-links">
			<a href="admin.php">Dashboard</a>
			<a href="users_report.php">Users</a>
			<a href="product_report.php">Products</a>
			<a href="orders_report.php" style="background-color: #007bff; color: #FFF;">Orders</a>
			<a href="categories_report.php">Categories</a>
			<a href="admin_profile.php">Admin Profile</a>
		</div>
	</div>
    

	<?php
	include('../helpers/DbHelpers.php');
	$value = $db_helpers->getAll('orders');
    // $value = $db_helpers->show('orders', ['user_id' => $_SESSION['id']]);
	?>


    <div class="table">
	 <div class="supplierTable">
        <table>
         <tr>
            <th>#</th>
            <th>Price</th>
            <th>Product ID</th>
            <th>Breed</th>
            <th>Price Per Animal</th>
            <th>Type</th>
            <th>Quantity</th>
            <th>Mode Of Payment</th>
            <th>Delivery</th>
            <th>address</th>
            <th>Made on</th>
         </tr>
         <?php while($order = mysqli_fetch_assoc($value)) :?>
         <tr>
             <td><?= $order['id']; ?></td>
             <td><?= $order['price']; ?></td>
             <td><?= $order['product_id']; ?></td>
             <td><?= $order['breed']; ?></td>
             <td><?= $order['number']; ?></td>
             <td><?= $order['type']; ?></td>
             <td><?= $order['quantity']; ?></td>
             <td><?= $order['mode_of_payment']; ?></td>
             <td><?= $order['delivery']; ?></td>
             <td><?= $order['address']; ?></td>
             <td><?= $order['created_at']; ?></td>
             <td>

             </td>
         </tr>
         <?php endwhile; ?>
        </table>
	</div>
    <!-- <div class="pagination">
        <a href="#">&laquo;</a>
        <a href="" class="active">1</a>
        <a href="">2</a>
        <a href="">3</a>
        <a href="">4</a>
        <a href="">5</a>
        <a href="">6</a>
        <a href="">7</a>
        <a href="#">&raquo</a>
    </div> -->
</body>
</html>

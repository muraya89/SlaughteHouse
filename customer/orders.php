<?php 
session_start();

if (!isset($_SESSION['id'])) {
    header('Location: ../auth/login.php?error=403');
}


include('../helpers/DbHelpers.php');
$value = $db_helpers->show('orders', ['user_id' => $_SESSION['id']]);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Apply to supply</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../public/css/sstyles.css">
</head>
<body>

<!-- navigation bar -->
<div class="nav">
		<input type="checkbox" id="nav-check">
		<div class="nav-header">
				<div class="logo">
					<img src="../public/images/slaughterhouse.jpeg" alt="">
				</div>
			<div class="nav-title">
				<a href="index.php">The Meat Hook</a>
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
            <a href="index.php">Produce</a>
			<div class="div_logout">
				<form method="post" action="../app/auth/Logout.php">
					<button type="submit" name="logout" class="logout">Logout</button>
				</form>
			</div>

			<!-- search bar -->
			<!-- <div class="search">
					<form action="">
						<input type="text" placeholder="Search...">
					<div class="searchbtn">
						<button type="submit" name="Submit">Submit</button>
					</div>
					</form>
			</div> -->
		</div>
	</div>

    <div class="paragraph">
        <p> My Orders</p>
    </div>

	<div class="index">
	 <div class="supplierTable">
        <table>
         <tr>
            <th>#</th>
            <th>Product ID</th>
            <th>Breed</th>
            <th>Price Per Animal</th>
            <th>Type</th>
            <th>Quantity</th>
            <th>Mode Of Payment</th>
            <th>Total Price</th>
            <th>Delivery</th>
            <th>address</th>
            <th>Made on</th>
            <th>Actions</th>
         </tr>
         <?php while($order = mysqli_fetch_assoc($value)) :?>
         <tr>
             <td><?= $order['id']; ?></td>
             <td><?= $order['product_id']; ?></td>
             <td><?= $order['breed']; ?></td>
             <td><?= $order['price']; ?>/=</td>
             <td><?= $order['type']; ?></td>
             <td><?= $order['quantity']; ?></td>
             <td><?= $order['mode_of_payment']; ?></td>
             <td><?= $order['total_price']; ?>/=</td>
             <td><?= $order['delivery']; ?></td>
             <td><?= $order['address']; ?></td>
             <td><?= $order['created_at']; ?></td>
             <td>
                <div class="td1">
                    <form action="../admin/AdminClass.php" method="post" class=action1>
                        <input type="hidden" name="id" value="<?= $order['id'] ?>"/>
                        <input type="hidden" name="table" value="orders" />
                        <input type="hidden" name="redirect_to" value="../customer/orders.php" />
                        <button type="submit" name="deleteSubmit" class="delete_btn">Delete</button>
                    </form>
                    <!-- <form action="../app/customer/Orders.php" method="post" class="action2">
                        <input type="hidden" name="id" value="<?= $order['id'] ?>"/>
                        <input type="hidden" name="table" value="orders" />
                        <input type="hidden" name="redirect_to" value="../customer/orders.php" />
                        <button type="submit" name="supply_submit" class="edit_btn">Edit</button>
                    </form> -->                    
                    <a href="buy.php?edit=<?=$base64UrlString;?>"><button class= "edit_btn"> Edit</button></a>
                </div>
             </td>
         </tr>
         <?php endwhile; ?>
        </table>
     </div>
    <div class="pagination">
        <a href="#">&laquo;</a>
        <a href="" class="active">1</a>
        <a href="">2</a>
        <a href="">3</a>
        <a href="">4</a>
        <a href="">5</a>
        <a href="">6</a>
        <a href="">7</a>
        <a href="#">&raquo</a>
    </div>
	</div>
</body>
</html>
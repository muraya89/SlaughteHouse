<?php include_once('main.php'); ?>
		<div class="nav-links">
			<a href="" style="background-color: #007bff; color: #FFF;">Dashboard</a>
			<a href="users_report.php">Users</a>
			<a href="product_report.php">Products</a>
			<a href="orders_report.php">Orders</a>
			<a href="categories_report.php">Categories</a>
			<a href="feedback_report.php">Feedback</a>
			<a href="admin_profile.php">Admin Profile</a>
		</div>
	</div>

	<?php
	include('../helpers/DbHelpers.php');
	$value = $db_helpers->getAll('animals');
	$result = $db_helpers->getAll('users');
	$orders = $db_helpers->getAll('orders');
	$ordering = $db_helpers->ordering();
	?>

	<div class="box">
		<div class="item2">
			<div class="card_title">
				<p style="font-size: 17px; font-weight: 900; line-height: 1; text-transform: uppercase;"> Most ordered breed</p>
			</div>
			<div class="card_title">
				<table>
					<tr>
						<th>Breed</th>
						<th>Type</th>
						<th>Quantity</th>
					</tr>
					<?php
						// create a loop to get all the values in the database to the table
						while($order = mysqli_fetch_assoc($ordering)) :?>
					<tr>
						<td><?= $order['breed']; ?></td>
						<td><?= $order['type']; ?></td>
						<td><?= $order['sum(quantity)']; ?></td>
					</tr>
					<?php endwhile; ?>
				</table>
			</div>
		</div>
		<div class="item4">
			<div class="item2">
				<div class="card-title">					
					<a href="customers_report.php"><button type="button" class="item_btn">Number of customers</button></a>
				</div>
				<div class="card-title">
					<p  style="font-weight:50px;">
						<?=
							// use the function to count the number of rows
							mysqli_num_rows($db_helpers->getUsers('customer')); ?> Customers
					</p>
				</div>
			</div>
			<div class="item2">
				<div class="card-title">
					<a href="orders_report.php"><button type="button" class="item_btn">Number of suppliers</button></a>
				</div>
				<div class="card_title">
					<p  style="font-weight:50px;">
					<?= mysqli_num_rows($db_helpers->getUsers('supplier')); ?> Suppliers
					</p>
				</div>
			</div>
			</div>
		</div>
	<div class="box">
		<div class="item6">
			<div class="item5">
				<div class="card_title">
					<a href="product_report.php"><button type="button" class="order_btn">Total supplied products</button></a>
				</div>	
				<div class="card_title">
					<p  style="font-weight:50px;">
						<?php $product = mysqli_num_rows($value);	echo $product;?> products
					</p>
				</div>			
			</div>
			<div class="item5">
				<div class="card_title">
					<a href="orders_report.php"><button type="button" class="item_btn">Number of orders</button></a>
				</div>
				<div class="card_title">
					<p  style="font-weight:50px;">
						<?php $product = mysqli_num_rows($orders);	echo $product;?> Orders
					</p>
				</div>			
			</div>
		</div>
		<div class="item5">
			<?php
				// declare the variable before giving the values to set the revenue as a total price which is picked from the database
				$revenue = 0;
				while($order = mysqli_fetch_assoc($orders)) {
					$revenue += (int)$order['total_price'];
				}

			?>
			<div class="card_title">
				<a href="creport.php"><button type="button" class="item_btn">Revenue</button></a>
			</div>
			<div class="card_title">
					<p  style="font-weight:50px;">
						Ksh <?= $revenue; ?>
					</p>
			</div>
		</div>
	</div>
	</div>
</body>
</html>




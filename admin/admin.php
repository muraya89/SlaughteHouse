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
	?>

	<div class="box">
		<div class="item">
			<div class="item3">
				<div class="card_title" style="text-align: center;">
					<a href="users_report.php"><button type="button" class="item_btn">Total users</button></a>
				</div>
				<div class="card_title">
					<svg width="200px" height="400px" viewBox="0 0 42 42" class="donut">
						<circle class="donut-hole" cx="21" cy="21" r="15.91549430918954" fill="#fff"></circle>
						<circle class="donut-ring" cx="21" cy="21" r="15.91549430918954" fill="transparent" stroke="#b1c94e" stroke-width="3"></circle>

						<?php 
						
						$allusers = mysqli_num_rows($result);
						$s = 1;
						$c = 1;
						while($user = mysqli_fetch_assoc($result)) {
							if ($user['account'] == 'supplier'){
								$s++;
							} elseif ($user['account'] == 'customer') {
								$c++;
							}
						}
						$suppliers = (int)((int)$s/(int)$allusers)*100;
						$customers = (int)((int)$c/(int)$allusers)*100;
						
						?>
						<circle class="donut-segment" cx="21" cy="21" r="15.91549430918954" fill="transparent" stroke="#377bbc" 
						stroke-width="3" stroke-dasharray="30 70" stroke-dashoffset="65" data-per="<?= $supplier?>"></circle>
						<!-- unused 10% -->
						<g class="chart-text">
							<text x="50%" y="50%" class="chart-label">
							<?php $product = mysqli_num_rows($result);	echo $product;?> Users
							</text>
						</g>
					</svg>
				</div>
				<div class="caption1">
					<ul>
						<li class="suppliers">Suppliers</li>
					</ul>
				</div>
				<div class="caption2">
					<ul>						
						<li class="customers">Customers</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="item4">
			<div class="item2">
				<div class="card-title">					
					<a href="orders_report.php"><button type="button" class="item_btn">Number of customers</button></a>
				</div>
				<div class="card-title">
					<p  style="font-weight:50px;">
						<?= mysqli_num_rows($db_helpers->getUsers('customer')); ?> Customers
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




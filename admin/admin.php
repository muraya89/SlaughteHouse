<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Landpage</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="adminstyles.css">
	<style>	
.chart-number {
  font-size: 0.6em;
  text-anchor: middle;
  -moz-transform: translateY(-0.25em);
  -ms-transform: translateY(-0.25em);
  -webkit-transform: translateY(-0.25em);
  transform: translateY(-0.25em);
}

.chart-label {
  font-size: 0.2em;
  text-transform: uppercase;
  text-anchor: middle;
  -moz-transform: translateY(0.7em);
  -ms-transform: translateY(0.7em);
  -webkit-transform: translateY(0.7em);
  transform: translateY(0.7em);
}
</style>
</head>
<body>
<div class="nav">
		<input type="checkbox" id="nav-check">
		<div class="nav-header">
			<div class="nav-title">
				<a href=""><b><strong> Slaughterhouse</strong></b></a>
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
			<a href="" style="background-color: #007bff; color: #FFF;">Dashboard</a>
			<a href="users_report.php">Users</a>
			<a href="product_report.php">Products</a>
			<a href="orders_report.php">Orders</a>
			<a href="">Categories</a>
		</div>
	</div>

	<?php
	include('../helpers/DbHelpers.php');
	$value = $db_helpers->getAll('animals');
	$result = $db_helpers->getAll('users');
	?>

	<div class="box">
		<div class="item">
			<div class="item3">
				<div class="card-title" style="text-align: center;">
					<a href="users_report.php"><button type="button" class="item_btn">Total users</button></a>
						<!-- <br> -->
						<!-- <p  style="font-weight:50px;"><?php $product = mysqli_num_rows($result);	echo $product;?> Users</p> -->
				</div>
				<div class="card-title">
					<svg width="200px" height="400px" viewBox="0 0 42 42" class="donut">
						<circle class="donut-hole" cx="21" cy="21" r="15.91549430918954" fill="#fff"></circle>
						<circle class="donut-ring" cx="21" cy="21" r="15.91549430918954" fill="transparent" stroke="#b1c94e" stroke-width="3"></circle>

						<circle class="donut-segment" cx="21" cy="21" r="15.91549430918954" fill="transparent" stroke="#377bbc" stroke-width="3" stroke-dasharray="30 70" stroke-dashoffset="65"></circle>
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
		<div class="item">
			<a href="salesreport.php"><button type="button" class="item_btn">Sales/Orders</button></a>
		</div>
	</div>
	<div class="box">
		<div class="item1">
			<div class="item2">
				<div class="card-title">
					<a href="product_report.php"><button type="button" class="order_btn">Total supplied products</button></a>
				</div>
				<div class="card-title"><p  style="font-weight:50px;"><?php $product = mysqli_num_rows($value);	echo $product;?> products</p></div>
			</div>
			<div class="item2">
			<a href="creport.php"><button type="button" class="item_btn">Profit</button></a>
			</div>
		</div>
		<div class="item">
			<a href="sreport.php"><button type="button" class="item_btn">Total users</button></a>
		</div>
	</div>
	<div class="box">
		<div class="item">
			<a href="preport.php"><button type="button" class="item_btn"></button></a>
		</div>
		<div class="item">
			<a href="salesreport.php"><button type="button" class="item_btn">Sales</button></a>
			<br>
			<form action=""></form>
		</div>
	</div>
	</div>
</body>
</html>




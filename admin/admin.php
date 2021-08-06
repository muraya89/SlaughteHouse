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
				<a href=""><b><strong> Dashboard</strong></b></a>
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
			<a href="">Analytics</a>
			<a href="users.php">Users</a>
			<a href="">Categories</a>
		</div>
	</div>


	<div class="box">
		<div class="item">
				<a href="preport.php"><button type="button" class="item_btn">Total users</button></a>
		</div>
		<div class="item">
			<a href="salesreport.php"><button type="button" class="item_btn">Sales</button></a>
		</div>
	</div>
	<div class="box">
		<div class="item1">
			<div class="item2">
				<div class="card-title">
					<a href="creport.php"><button type="button" class="order_btn">Total orders</button></a>
				</div>
				<div class="card-title"><p  style="font-weight:50px;">58776 orders</p></div>
				<div class="card-title"><img src="../public/images/img21.jpg" alt="" style="width:100px;"></div>
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
		</div>
	</div>
	<div class="box">
		<div class="">					
			<svg width="1000px" height="600px" viewBox="0 0 42 42" class="donut">
				<circle class="donut-hole" cx="21" cy="21" r="15.91549430918954" fill="#fff"></circle>
				<circle class="donut-ring" cx="21" cy="21" r="15.91549430918954" fill="transparent" stroke="#d2d3d4" stroke-width="3"></circle>

				<circle class="donut-segment" cx="21" cy="21" r="15.91549430918954" fill="transparent" stroke="#ce4b99" stroke-width="3" stroke-dasharray="40 60" stroke-dashoffset="25"></circle>
				<circle class="donut-segment" cx="21" cy="21" r="15.91549430918954" fill="transparent" stroke="#b1c94e" stroke-width="3" stroke-dasharray="20 80" stroke-dashoffset="85"></circle>
				<circle class="donut-segment" cx="21" cy="21" r="15.91549430918954" fill="transparent" stroke="#377bbc" stroke-width="3" stroke-dasharray="30 70" stroke-dashoffset="65"></circle>
				<!-- unused 10% -->
				<g class="chart-text">
					<text x="50%" y="50%" class="chart-label">
					Users
					</text>
				</g>
			</svg>
		</div>
		<div class="caption">
			<ul>
				<li>Suppliers</li>
				<li>Customers</li>
			</ul>
		</div>
	</div>
</body>
</html>




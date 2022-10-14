<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Dashboard</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="adminstyles.css">
</head>
<body>
	<?php
	include('./dashboard.php')
	?>
	<!-- <div class="box">
		<div class="item">
			<a href="creport.php"><button type="button" class="sendbtn">Customer</button></a>
		</div>
		<div class="item">
			<a href="sreport.php"><button type="button" class="sendbtn">Supplier</button></a>
		</div>
	</div>
	<div class="box">
		<div class="item">
			<a href="preport.php"><button type="button" class="sendbtn">Products</button></a>
		</div>
		<div class="item">
			<a href="salesreport.php"><button type="button" class="sendbtn">Sales</button></a>
		</div>
	</div> -->
	<div class="container">
		<table>
			<tr>
				<th>Company</th>
				<th>Contact</th>
				<th>Country</th>
			</tr>
			<tr>
				<td>Alfreds Futterkiste</td>
				<td>Maria Anders</td>
				<td>Germany</td>
			</tr>
			<tr>
				<td>Centro comercial Moctezuma</td>
				<td>Francisco Chang</td>
				<td>Mexico</td>
			</tr>
		</table> 
	</div>
</body>
</html>

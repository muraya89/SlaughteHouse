<?php
session_start();

if (!isset($_SESSION['id'])) {
    header('Location: ../admin/index.php?error=403');
}


include('../helpers/DbHelpers.php');
$value = $db_helpers->showAdmin('admin', ['admin_id' => $_SESSION['id']]);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Landpage</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../public/css/adminstyles.css">
</head>
<body>
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
			<a href="orders_report.php">Orders</a>
			<a href="categories_report.php">Categories</a>
			<a href="admin_profile.php" style="background-color: #007bff; color: #FFF;">Admin Profile</a>
		</div>
	</div>
</div>



<div class="table">
	<?php echo "$value";?>
</div>

</body>
</html>
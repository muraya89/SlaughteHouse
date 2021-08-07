<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Landpage</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="adminstyles.css">
</head>
<body style="display: grid; grid-auto-columns: auto auto">
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
			<a href="admin.php">Analytics</a>
			<a href="users_report.php" style="background-color: #003366; color: #FFF">Users</a>
			<a href="product_report.php">Products</a>
			<a href="">Categories</a>
		</div>
	</div>
    

	<?php
	include('../helpers/DbHelpers.php');
	$value = $db_helpers->getAll('users');
	?>


    <div class="table">
	 <div class="supplierTable">
        <table>
         <tr>
            <th>#</th>
            <th>Company name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Address</th>
            <th>Account Type</th>
            <th>Date Created</th>
         </tr>
         <?php while($detail = mysqli_fetch_assoc($value)) :?>
         <tr>
             <td><?= $detail['id']; ?></td>
             <td><?= $detail['cname']; ?></td>
             <td><?= $detail['email']; ?></td>
             <td><?= $detail['phoneno']; ?></td>
             <td><?= $detail['address']; ?></td>
             <td><?= $detail['account']; ?></td>
             <td><?= $detail['date_created']; ?></td>
         </tr>
         <?php endwhile; ?>
        </table>
	</div>
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

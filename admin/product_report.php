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
			<a href="users_report.php">Users</a>
			<a href="product_report.php" style="background-color: #003366; color: #FFF">Products</a>
			<a href="">Categories</a>
		</div>
	</div>
    

	<?php
	include('../helpers/DbHelpers.php');
	$value = $db_helpers->getAll('animals');
	?>


    <div class="table">
	 <div class="supplierTable">
        <table>
         <tr>
            <th>#</th>
            <th>Breed</th>
            <th>Weight</th>
            <th>Sex</th>
            <th>Age</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Type</th>
            <th>Status</th>
         </tr>
         <?php while($product = mysqli_fetch_assoc($value)) :?>
         <tr>
             <td><?= $product['id']; ?></td>
             <td><?= $product['breed']; ?></td>
             <td><?= $product['weight']; ?></td>
             <td><?= $product['sex']; ?></td>
             <td><?= $product['age']; ?></td>
             <td><?= $product['number']; ?></td>
             <td><?= $product['price']; ?></td>
             <td><?= $product['type']; ?></td>
             <td>
                 <?php if ($product['status'] == 0): ?>
                 <div>
                     <span>pending</span>
                  </div>
                  <?php else: ?>
                    <div>
                     <span>sold</span>
                    </div>
                  <?php endif; ?>
             </td>
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

<?php 
session_start();

if (!isset($_SESSION['id'])) {
    header('Location: ../auth/login.php?error=403');
}

include('../helpers/DbHelpers.php');
$value = $db_helpers->getAll('animals');
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
    <div>
        <form method="post" action="../app/auth/Logout.php">
            <button type="submit">Logout</button>
        </form>
    </div>
	<div class="index">
        <div class="addp">
            <a href="../supplier/supply.php"><button class="btnClass">Add Product</button></a>
        </div>
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
            <th>Actions</th>
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
             <td>
                 <div class="flex-box">
                    <a href=""><button class= "btn"> Edit</button></a>
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
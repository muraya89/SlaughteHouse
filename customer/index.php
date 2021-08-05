<?php 
// session_start();

// if (!isset($_SESSION['id'])) {
//     header('Location: ../auth/login.php?error=403');
// }


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

<!-- navigation bar -->
<div class="nav">
		<input type="checkbox" id="nav-check">
		<div class="nav-header">
				<div class="logo">
					<img src="public/images/slaughterhouse.jpeg" alt="">
				</div>
			<div class="nav-title">
				<a href="index.php">Slaughterhouse</a>
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
			<a href="about.php">About</a>
			<a href="auth/signup.php">Sign Up</a>
			<a href="faq.php">FAQ</a>

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

	<div class="index">
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
                 <?php 
                    $base64UrlString = base64_encode(json_encode(array_merge($product, ['isEdit' => true]))); 
                 ?>
                 <div class="flex-box">
                    <a href="buy.php?edit=<?=$base64UrlString;?>"><button class= "btn"> BUY</button></a>
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
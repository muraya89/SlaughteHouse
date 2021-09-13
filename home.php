<?php 

session_start();

if ($_SESSION['id']) {
	
 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Welcome</title>
</head>
<body style="background-color: #cd5759;">
	<div class="welcome">
		<p>WELCOME <?php echo $_SESSION['id'] ?></p>
		<a href="logout.php">Logout</a>
	</div>
</body>
</html>

<?php 

}else{
	header("Location: ../index.php");
	exit();
}

 ?>
 
 <svg width="200px" height="400px" viewBox="0 0 42 42" class="donut">
						<circle class="donut-hole" cx="21" cy="21" r="15.91549430918954" fill="#fff"></circle>
						<circle class="donut-ring" cx="21" cy="21" r="15.91549430918954" fill="transparent" stroke="#b1c94e" stroke-width="3"></circle>

						<?php 
						
						// $allusers = mysqli_num_rows($result);
						// $s = 1;
						// $c = 1;
						// while($user = mysqli_fetch_assoc($result)) {
						// 	if ($user['account'] == 'supplier'){
						// 		$s++;
						// 	} elseif ($user['account'] == 'customer') {
						// 		$c++;
						// 	}
						// }
						// $suppliers = (int)((int)$s/(int)$allusers)*100;
						// $customers = (int)((int)$c/(int)$allusers)*100;
						
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




					SELECT breed, count(quantity) FROM orders GROUP BY breed order by count(quantity) desc limit 3
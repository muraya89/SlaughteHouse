<!DOCTYPE html>
<html>
<head>
	<title>SIGN IN</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../public/css/styles.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>

<?php 
// create an error message if the user made an error when trying to login
if (isset($_GET['error'])) {
	// code...
	if ($_GET['error']=="emptyfields") {
		// code...
		echo "<p class='err'>Fill in all fields</p>";
	}elseif ($_GET['error']== "pwderr") {
		echo "<p class='err'>Wrong password</p>";
	}
}

 ?>
 <div class="container">
<div class="item" >
	<h1>LOGIN AS A CUSTOMER</h1>
	<p>Welcome back.</p>
	<!-- insert session -->
	<form action="../app/auth/Login.php" class="login" method="POST">
		<input type="text" name="email" class="input-box" placeholder="Email"></br>
		<input type="passowrd" name="password" class="input-box" placeholder="Password"></br>
		<button name="login_submit" class="sendbtn" type="submit">Login</button>
	</form>
	<p>Don't have an account?<a href="signup.php">JOIN</a></p>
</div>
<!-- <div class="item">
	<h1>LOGIN AS A SUPPLIER</h1>
	<p>Welcome back.</p>
	<form action="includes/login.inc.php" class="login" method="POST">
		<input type="text" name="email" class="input-box" placeholder="Email"></br>
		<input type="text" name="password" class="input-box" placeholder="Password"></br>
		<button name="login_submit" class="sendbtn" type="submit">Login</button>
	</form>
	<p>Don't have an account?<a href="signup.php">JOIN</a></p>
</div> -->
</div>
</body>


</html>
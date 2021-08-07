<!DOCTYPE html>
<html>
<head>
	<title>ADMIN PAGE</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="adminstyles.css">
</head>
<body>
	<?php
		if(isset($_GET['error'])){			
			if ($_GET['error']=="emptyfields") {
				echo "<p class='err'>Fill in all fields</p>";
			}elseif ($_GET['error']== "pwderr") {
				echo "<p class='err'>Wrong password</p>";
				}
		}
	?>

	<div class="effect1">

		<div class="login">
			<h1>Login</h1>
			<p>Welcome admin</p>
		</div>
		<!-- form for admin login -->
		<form action="../app/auth/login.php" method="post">
			<input type="text" name="username" placeholder="Enter your username" class="input-box">
			<br>
			<input type="password" name="password" placeholder="Enter your password" class="input-box">
			<br>
			<button name="login_submit" class="sendbtn" type="submit">Login</button>
		</form>
</div>
</body>
</html>
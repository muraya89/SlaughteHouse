<!DOCTYPE html>
<html>
<head>
	<title>SIGN IN</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../public/css/styles.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		body{
			background: linear-gradient(95deg,  #460645 0%,#ff5450 100%);
		}
	</style>

</head>
<body>

<div class="nav">
		<input type="checkbox" id="nav-check">
		<div class="nav-header">
			<div class="logo">
				<img src="../public/images/slaughterhouse.jpeg" alt="">
			</div>
			<div class="nav-title">
				<a href="../index.php"><b><strong> The Meat Hook</strong></b></a>
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
			<a href="../about.php">About</a>
            <!-- <div class="div_logout">
                <form method="post" action="../app/auth/Logout.php">
                    <button type="submit" name="logout" class="logout">Logout</button>
                </form>
            </div> -->
			<a href="../faq.php">FAQ</a>

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

<div class="effect1" >
	<h1 class="login">LOGIN</h1>
	<p class="login">Welcome back.</p>
	<?php 
	// create an error message if the user made an error when trying to login
	if (isset($_GET['error'])) {
		// code...
		if ($_GET['error']=="emptyfields") {
			// code...
			echo "<p class='err'>Fill in all fields</p>";
		}elseif ($_GET['error']== "pwderr") {
			echo "<p class='err'>Wrong password</p>";
		}elseif ($_GET['error']== "403") {
			echo "<p class='err'>Unauthorized</p>";
		} elseif ($_GET['error'] == "accountError") {
			echo "<p class='err'>Account Type required</p>";
		} elseif ($_GET['error'] == "accountError2") {
			echo "<p class='err'>Sorry, the details do not match</p>";
		} elseif ($_GET['error'] === "404") {
			echo "<p class='err'>Sorry, this user does not exist in our database</p>"; 
		}
	}
	$data = [];
	if (isset($_GET['value'])) {
	//   for decoding stored data when the edit button is selected
	  $data = json_decode(base64_decode($_GET['value']));
	//   var_dump($data);die();
	}

	?>
 
	<form action="../app/auth/Login.php" class="login" method="POST">
		<input type="email" name="email" class="input-box" placeholder="Email" value="<?= isset($_GET['value']) && isset($data->email) ? $data->email : ''; ?>"></br>
		<div class="radio">
			<div class="radio1">
				<input type="radio" value="supplier" name="accounttype" value="<?= isset($_GET['value']) && isset($data->accounttype) ? $data->accounttype : ''; ?>">
				<label for="supplier">Supplier</label>
			</div>
			<div class="radio1">
				<input type="radio" value="customer" name="accounttype" value="<?= isset($_GET['value']) && isset($data->accounttype) ? $data->accounttype : ''; ?>">
				<label for="customer">Customer</label>
			</div>
		</div>
		<input type="password" name="password" class="input-box" placeholder="Password"></br>
		<button name="login_submit" class="sendbtn" type="submit">Login</button>
	</form>
	<p>Don't have an account?<a href="signup.php">JOIN</a></p>
    <p>Or</p>
	<p><a href="forgotPassword.php">Forgot Password</a></p>
</div>
</body>


</html>
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
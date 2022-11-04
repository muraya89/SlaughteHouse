<?php 
require('autoload.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Slaughterhouse Management System</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./public/css/styles.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>

	<div class="nav">
		<input type="checkbox" id="nav-check">
		<div class="nav-header">
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
			<a href="auth/login.php">Login</a>
			<a href="faq.php">FAQ</a>
		</div>
	</div>

	<div class="top">
		<h1>THE SLAUGHTER HOUSE</h1>
		<p>The Slaughter house is the leading abattoir in Kenya and will continue providing quality meat to our customers</p>
	</div>


	<div class="container">
		<div class="item">
			<img src="./public/images/img1.jpg" style="height: 300px;width: 300px;">
			<br>
			<a href="redmeat.php" style="text-decoration: none; color: #cd5759;">Red Meat</a>
			<p>Red meat is commonly red when raw and after being cooked turns a dark color. Farm reared mammals are what are considered red meat. Examples include: pork, beef rabbit, lamb and goat...</p>
		</div>
		<div class="item">
			<img src="./public/images/img16.jpg" style="height: 300px;width: 300px;">
			<br>
			<a href="whitemeat.php"style="text-decoration: none; color: #cd5759;">White Meat</a>
			<p>White meat involves different kinds of animals including poultry and fish.Atleast one trillion fish are slaughtered each year for human consumption. Some relatively human ways have been developed, including percussive and electric stunning...</p>
		</div>
	</div>

	<hr class="hr" >
	<!-- form for comments or complaints-->
	<h1>Have a query?</h1>
	<div class="contact">
		
		<?php
			if (isset($_GET['error'])) {
				if ($_GET['error'] == "emptyFields") {
					echo '<p class=err>Fill in all fields</p>';
				}
				if ($_GET['error'] == "success") {
					echo '<p class=success>You have successfully submitted your feedback</p>';
				}
				if ($_GET['error'] == "err") {
					echo '<p class=err>Data not saved, please try again</p>';
				}
			}
		?>
		<form action="./app/contact.php" class="feedback" method="POST">
			<input type="text" name="fname" class="input-box" placeholder="First Name"></br>
			<input type="text" name="lname" class="input-box" placeholder="Last Name"></br>
			<input type="text" name="email" class="input-box" placeholder="Email"></br>
			<textarea class="input-box" rows="5" placeholder="Message" name="input"></textarea></br>
			<button type="submit" name="feedback_submit" class="sendbtn" id="contact">Send</button>
		</form>
	</div>

</body>

<script>
	window.onload = ifError()

	function ifError(){
		var arr = window.location.href.split('?');
		if (arr.length > 1 && arr[1] !== '') {
			document.getElementById('contact').focus();
		}
	}
	
</script>

<footer class="footer">
		THE SLAUGHTERHOUSE
		<br><br>
		&copy;2022 The Slaughter House <br>
		<a href="contact.php">Contact Us</a><br>
</footer>

</html>
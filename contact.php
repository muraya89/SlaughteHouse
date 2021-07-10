<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>CONTACT US</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./public/css/styles.css">
</head>
<body>

<!-- navabar -->
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
			<a href="signin.php">Sign Up</a>
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

<!-- picture beginning of page -->
<div class="top">	
	<h1>CONTACT US</h1>
	<p>Contact details and residence</p>
</div>

<!-- introduction -->
<div class="intro">
	<p style="margin: 30px;">Contact details on The Slaughterhouse residence is listed below and operational contact details. Alternatively complete the cotact form down below and an agent will contact you.</p>
</div>

<!-- columns with contact details -->
<div class="container">
	<div class="item1">
		<h2> The SlaughterHouse</h2>
		<p>1128-00515 NAIROBI</p>
		<p><b>Telephone Number </b><br> 0741996366</p>
	</div>
	<div class="item2">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63820.91580459309!2d36.652843979101554!3d-1.2899222999999993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f1c0f79312dd5%3A0x6ef06df0ea8d205e!2sNyonjoro%20Slaughterhouse!5e0!3m2!1sen!2ske!4v1622886404029!5m2!1sen!2ske" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
	</div>
</div>


<!-- form for contact-->
<h1>Have a query?</h1>
<div class="contact">
	<form action="" class="feedback" method="POST">
		<input type="text" name="fname" class="input-box" placeholder="First Name"></br>
		<input type="text" name="lname" class="input-box" placeholder="Last Name"></br>
		<input type="text" name="email" class="input-box" placeholder="Email"></br>
		<p style="text-align: left;">How should we contact you?</p>
		<div class="contact1">
			<label for="option">
				<select name="" class="contact2">
					<option value="hide">-- option --</option>
					<option value="phone">Phone number</option>
					<option value="email">Email</option>
				</select>
			</label>
		</div>
		<textarea class="input-box" rows="5" placeholder="Message"></textarea></br>
		<button type="button" class="sendbtn">Send</button>
	</form>
</div>


<footer class="footer">
		THE SLAUGHTERHOUSE
		<br><br>
		&copy;2021 The Slaughter House <br>
		<a href="contact.php">Contact Us</a><br>
</footer>

</body>
</html>
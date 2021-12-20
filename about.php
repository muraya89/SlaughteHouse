<!DOCTYPE html>
<html>
<head>
	<title>About Us</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./public/css/styles.css">
</head>
<body>

<!-- navigation bar -->
<!-- <div class="topnav" id="mytopnav">
	<a href="homepage.php">Home</a>
	<div class="dropdown">
		<button class="dropbtn">Products
			<i class="fa fa-caret-down"></i>
		</button>
			<div class="dropdown-content">
				<a href="redmeat.php">red meat</a>
				<a href="whitemeat.php">white meat</a>
				<a href="seafood.php">seafood</a>
			</div>
	</div>
				<a href="#hide">Hide</a>
	<a href="About.php" class="active">About Us</a>
	<a href="faq.php">FAQ</a>
	<a href="team.php">Team</a>
	<div class="search-container">
		<form action="/action_page.php">
			<input type="text" name="search" placeholder="Search...">
			<button type="submit"><i class="fa fa-search"></i></button>
		</form>
	</div>
</div>
 -->


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
			<a href="auth/signup.php">Sign In</a>
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

<div class="header">
	<h1> ABOUT THE SLAUGHTERHOUSE </h1>
	<h3>About our operations</h3>
</div> <hr>

<!-- column with details of abattoir -->

<div class="container">
	<div class="item1">
		<h2> Slaughter House services offered</h2>
		<li>Strict observance of all hygiene rules</li>
		<li>Demonstration of animals treated in a bening</li>
		<li>Beef, pork, lamb and goat supply</li>
		<li>Consideration of the wastes we produce into the environment</li>
	</div>
	<div class="item2">
		<img src="images/img3.jpg" >
	</div>
</div>
	<div class="container">
		<div class="item1">
			<img src="images/img2.jpg">
		</div>
	<div class="item2">
		<h2>The Slaughterhouse is proud to supply:</h2>
		<ol>
			<li>Red Meat</li>
			<li>White Meat</li>
			<li>Clean offal</li>
			<li>Dirty offal</li>
			<li>Hides</li>
		</ol>
	</div>
</div>

<hr class="hr">

<h1> Learn more on how we treat our animals</h1>
	<p class="paragraph">The Slaughterhouse complies with all the necessary rules and regulations governing the red meat industry and our certifications are a testament of this. The video shown below shows just how much we take the health issue very seriously.</p>

<div class="video">
	<iframe width="900px" height="345" id="video2" src="https://www.youtube.com/embed/oXoOws_PBWE&autoplay=1"></iframe>
	<br>
	<iframe width="900px" height="345" id="video1" src="https://www.youtube.com/embed/hHP2ka5Foh4"></iframe>

</div>

</body>

<footer class="footer">
		THE SLAUGHTERHOUSE
		<br><br>
		&copy;2021 The Slaughter House <br>
		<a href="contact.php">Contact Us</a><br>
</footer>

</html>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Apply to supply</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../public/css/sstyles.css">
</head>
<body>
	<div class="effect">
		<h3>Add Products</h3>
		<?php 

			if(isset($_GET['error'])) {
    			if($_GET['error'] == "emptyfields") {
      				echo '<p class=err>Fill in all fields</p>';
   			 	}
   			 	if($_GET['error'] == "excessweight") {
      				echo '<p class=err>The weight you entered is excess</p>';
   			 	}
				if($_GET['error'] == "notsaved") {
      				echo '<p class=err>Data not saved, please try again</p>';
   			 	}
   			}

		 ?>
		<form method="POST" action="../app/supplier/Products.php">
			<select class="input-box" name="breed">
				<option value="">--choose the breed of your supply--</option>
				<option value="angus">Angus catle</option>
				<option value="holstein">Holstein Cattle</option>
				<option value="hereford">Hereford cattle</option>
				<option value="shorthorn">Shorthorn</option>
				<option value="jersey">Jersey cattle</option>
				<option value="charolais">Charolais cattle</option>
				<option value="simmental">Simmental cattle</option>
			</select>
			<br>
			<input type="text" name="weight" placeholder="Enter the weight" class="input-box">
			<br>
			<select class="input-box" name="sex">
				<option value="">--select the sex of the animal--</option>
				<option value="female">Female</option>
				<option value="male">Male</option>
			</select>
			<br>
			<input type="number" name="age" placeholder="Enter the age" class="input-box">
			<br>
			<select class="input-box" name="type">
				<option value="">--select the type of meat--</option>
				<option value="redmeat">Red meat</option>
				<option value="whitemeat">White Meat</option>
			</select>
			<input type="number" name="number" placeholder="Enter the number of animals you want to sell" class="input-box">
			<br>
			<input type="number" name="price" placeholder="Enter the price to sell the animal" class="input-box">
			<br>
			<button type="submit" name="supply_submit" class="sendbtn">Submit</button>
		</form>
	</div>
</body>
</html>
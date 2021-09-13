<?php 

session_start();

if (!isset($_SESSION['id'])) {
    header('Location: ../auth/login.php?error=403');
}

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Apply to supply</title>
	<link rel="stylesheet" type="text/css" href="../public/css/sstyles.css">
</head>

<body>

	<div class="nav">
		<input type="checkbox" id="nav-check">
		<div class="nav-header">
          <div class="logo">
            <img src="../public/images/slaughterhouse.jpeg" alt="">
          </div>
			<div class="nav-title">
				<a href="index.php"><b><strong> The Meat Hook</strong></b></a>
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
			<a href="index.php">My Produce</a>
			<div class="div_logout">
				<form method="post" action="../app/auth/Logout.php">
					<button type="submit" name="logout" class="logout">Logout</button>
				</form>
			</div>

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
	<?php

	if (isset($_GET['error'])) {
		if ($_GET['error'] == "emptyfields") {
			echo '<p class=err>Fill in all fields</p>';
		}
		if ($_GET['error'] == "excessweight") {
			echo '<p class=err>The weight you entered is excess</p>';
		}
		if ($_GET['error'] == "notsaved") {
			echo '<p class=err>Data not saved, please try again</p>';
		}
	}
	$data = [];
	if (isset($_GET['edit'])) {
		//for decoding stored data
		$data = json_decode(base64_decode($_GET['edit']));
	}
	
	include('../helpers/DbHelpers.php');
	$cat = $db_helpers->getCategory('categories');

	?>
	<div class="effect">
		<h3><?= isset($_GET['edit']) ? 'Edit' : 'Add'; ?> Products</h3>
		<form method="POST" action="../app/supplier/Products.php">
			<select class="input-box" name="breed">
				<option value="<?= isset($_GET['edit']) && isset($data->breed) ? $data->breed : ''; ?>">
				<?= isset($_GET['edit']) && isset($data->breed) ? $data->breed : '--choose the breed of your supply--'; ?></option>
        		<?php while($detail = mysqli_fetch_assoc($cat)) {
					echo "<option value='". $detail['name'] ."'>" .$detail['name'] ."</option>";
				}?>
			</select>
			<br>
			<input type="text" value="<?= isset($_GET['edit']) && isset($data->weight) ? $data->weight : ''; ?>" name="weight" placeholder="Enter the weight" class="input-box">
			<br>
			<select class="input-box" name="sex">
				<option value="<?= isset($_GET['edit']) && isset($data->sex) ? $data->sex : ''; ?>"><?= isset($_GET['edit']) && isset($data->sex) ? $data->sex : '--select the sex of the animal--'; ?></option>
				<option value="male">Male</option>
				<option value="female">Female</option>
			</select>
			<input type="number" value="<?= isset($_GET['edit']) && isset($data->age) ? $data->age : ''; ?>" name="age" placeholder="Enter the age" class="input-box">
			<br>
			<select class="input-box" name="type">
				<option value="<?= isset($_GET['edit']) && isset($data->type) ? $data->type : ''; ?>"><?= isset($_GET['edit']) && isset($data->type) ? $data->type : '--select the type of meat--'; ?></option>
				<option value="redmeat">Red meat</option>
				<option value="whitemeat">White Meat</option>
			</select>
			<input type="number" value="<?= isset($_GET['edit']) && isset($data->number) ? $data->number : ''; ?>" name="number" placeholder="Enter the amount you want to sell" class="input-box">
			<br>
			<input type="number" value="<?= isset($_GET['edit']) && isset($data->price) ? $data->price : ''; ?>" name="price" placeholder="Enter the price to sell the animal per animal" class="input-box">
			<br>
			<input type="hidden" value="<?= isset($_GET['edit']) ? 'edit' : 'add'; ?>" name="submitType" />
			<input type="hidden" value="<?= isset($_GET['edit']) && isset($data->id) ? $data->id : ''; ?>" name="id" />
			<input type="hidden" value="<?= $_SESSION['id']; ?>" name="user_id" />

			<button type="submit" name="supply_submit" class="sendbtn"><?= isset($_GET['edit']) ? 'Edit' : 'Submit'; ?></button>
		</form>
	</div>
</body>

</html>
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
	<meta charset="utf-8">
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

	?>
	<div class="effect">
		<h3>Buy products</h3>
		<form id="orders_form" method="POST" action="../app/customer/Orders.php">
		<section class="accordion">
            <input type="checkbox" name="collapse" id="handle1">
            <h2 class="handle">
                <label for="handle1" class="handle2">Product description</label>
            </h2>
            <div class="content">
                    <label for="breed">Breed: </label>
                    <select class="disabled-box" name="breed" disabled>
                        <option value="<?= isset($_GET['edit']) && isset($data->breed) ? $data->breed : ''; ?>">
                        <?= isset($_GET['edit']) && isset($data->breed) ? $data->breed : '--choose the breed of your supply--'; ?></option>
                        <option value="angus">Angus catle</option>
                        <option value="holstein">Holstein Cattle</option>
                        <option value="hereford">Hereford cattle</option>
                        <option value="shorthorn">Shorthorn</option>
                        <option value="jersey">Jersey cattle</option>
                        <option value="charolais">Charolais cattle</option>
                        <option value="simmental">Simmental cattle</option>
                    </select>
                    <br>
                    <label for="weight">Weight: </label>
                    <input type="text" value="<?= isset($_GET['edit']) && isset($data->weight) ? $data->weight : ''; ?>" name="weight" placeholder="Enter the weight" class="disabled-box" disabled>
                    <br>
                    <label for="sex">Sex: </label>
                    <select class="disabled-box" name="sex" disabled>
                        <option value="<?= isset($_GET['edit']) && isset($data->sex) ? $data->sex : ''; ?>"><?= isset($_GET['edit']) && isset($data->sex) ? $data->sex : '--select the sex of the animal--'; ?></option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                    <br>
                    <label for="age">Age: </label>
                    <input type="number" value="<?= isset($_GET['edit']) && isset($data->age) ? $data->age : ''; ?>" name="age" placeholder="Enter the age" class="disabled-box" disabled >
                    <br>
                    <label for="type">Type: </label>
                    <select class="disabled-box" name="type" disabled>
                        <option value="<?= isset($_GET['edit']) && isset($data->type) ? $data->type : ''; ?>"><?= isset($_GET['edit']) && isset($data->type) ? $data->type : '--select the type of meat--'; ?></option>
                        <option value="redmeat">Red meat</option>
                        <option value="whitemeat">White Meat</option>
                    </select>
                    <br>
                    
                    <label for="number">Number of animals: </label>
                    <input type="number" id="quantity" onkeyup="displayTotal()" name="quantity" placeholder="Enter the number of animals you want to sell" max="<?= (int)$data->number; ?>" min="1" class="disabled-box">
					<!-- <p style="padding: 10px; color: red;" id="qError"></p> -->
                    <br>
                    <label for="price">Price per animal: </label>
                    <input type="number" id="price" value="<?= isset($_GET['edit']) && isset($data->price) ? $data->price : ''; ?>" name="price" placeholder="Enter the price to sell the animal" class="disabled-box" disabled>
                    <br>
                    <input type="hidden" value="<?= isset($_GET['edit']) && isset($data->id) ? $data->id : ''; ?>" name="product_id" />
                    <input type="hidden" value="<?= isset($_GET['edit']) && isset($data->number) ? $data->number : ''; ?>" name="number" />
					<input type="hidden" value="<?= $_SESSION['id']; ?>" name="user_id" />
            </div>
        </section>
        <section class="accordion">
            <input type="checkbox" name="collapse" id="handle2" checked>
            <h2 class="handle">
                <label for="handle2" class="handle2">Customer details</label>
            </h2>
            <div class="content">
					<select name="mode_of_payment" class="disabled-box">
						<option value="">--choose mode of payment--</option>
						<option value="cash">Cash</option>
						<option value="mpesa">M-pesa</option>
					</select>
					<br>
					<div class="delivery">
						<label for="delivery"> Delivery:</label><br><br>
						<input type="radio" name="delivery" value="true">Yes
						<br><br>
						<input type="radio" name="delivery" value="false">No
					</div>
					<br>
					<input type="text" name="address" class="disabled-box" placeholder="Enter your delivery address">
					<br>
					<label for="total">Total Cost (in Ksh):</label>
					<br>
					<input type="text" readonly name="total_price" class="disabled-box" id="total" />
            </div>
        </section>
        <div class="container">
		    <button name="order_submit" type="submit" class="sendbtn">BUY</button>
        </div>
		</form>
	</div>
</body>

<script>

	function displayTotal () {
		const quantity = parseInt(document.getElementById('quantity').value)
		const price = parseInt(document.getElementById('price').value)
		document.getElementById('total').value = quantity*price
	}

	// function makeOrder () {
	// 	const quantity = document.getElementsByName('quantity');
	// 	const mode_of_payment = document.getElementsByName('mode_of_payment');
	// 	const delivery = document.getElementsByName('delivery');
		
	// 	console.log(quantity[0].value);

	// 	if (quantity[0].value.length === 0) {
	// 		qError = document.getElementById('qError')
	// 	}
	// }

</script>

</html>
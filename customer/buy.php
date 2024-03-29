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
	<title>Buy Produce</title>
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
			if ($_GET['error'] == "emptyaddress") {
				echo '<p class=err>Please add an address for your delivery</p>';
			}
		}
		$data = [];
		if (isset($_GET['edit'])) {
			//for decoding stored data
			$data = json_decode(base64_decode($_GET['edit']));
		}
		if(isset($_GET['error'])){
			$customer_data = json_decode(base64_decode($_GET['value']));
		}
	?>
	<div class="effect" style="margin-top: 5px;">
		<h3>Buy products</h3>
		<form id="orders_form" method="POST" action="../app/customer/Orders.php">
			<section class="accordion">
				<input type="checkbox" name="collapse" id="handle1" checked>

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
					<!-- <label for="type">Type: </label>
					<select class="disabled-box" name="type" disabled>
						<option value="<?= isset($_GET['edit']) && isset($data->type) ? $data->type : ''; ?>"><?= isset($_GET['edit']) && isset($data->type) ? $data->type : '--select the type of meat--'; ?></option>
						<option value="redmeat">Red meat</option>
						<option value="whitemeat">White Meat</option>
					</select>
					<br> -->
					
					<label for="number">Available quantity: </label>
					<input type="number" id="number" value="<?= isset($_GET['edit']) && isset($data->available_quantity) ? $data->available_quantity : ''; ?>" name="available_quantity" placeholder="Remaining animals" class="disabled-box" disabled>
					<!-- <p style="padding: 10px; color: red;" id="qError"></p> -->
					<br>
					<label for="price">Price per animal: </label>
					<input type="number" id="price" value="<?= isset($_GET['edit']) && isset($data->price) ? $data->price : ''; ?>" name="price" placeholder="Enter the price to sell the animal" class="disabled-box" disabled>
					<br>
					<input type="hidden" value="<?= isset($_GET['edit']) && isset($data->id) ? $data->id : ''; ?>" name="product_id" />
					<input type="hidden" value="<?= isset($_GET['edit']) && isset($data->price) ? $data->price : ''; ?>" name="price" />
					<input type="hidden" value="<?= isset($_GET['edit']) && isset($data->breed) ? $data->breed : ''; ?>" name="breed" />
					<input type="hidden" value="<?= isset($_GET['edit']) && isset($data->available_quantity) ? $data->available_quantity : ''; ?>" name="available_quantity" />
					<input type="hidden" value="<?= $_SESSION['id']; ?>" name="user_id" />
					<input type="hidden" value="<?= $_SESSION['name']; ?>" name="username" />
				</div>
			</section>

			<section class="accordion">
				<input type="checkbox" name="collapse" id="handle2" checked>
				<h2 class="handle">
					<label for="handle2" class="handle2">Customer details</label>
				</h2>
				<div class="content">
					<select name="mode_of_payment" class="disabled-box" required value="<?= isset($_GET['value']) && isset($customer_data->mode_of_payment) ? $customer_data->mode_of_payment : ''; ?>">
						<option value="">--choose mode of payment--</option>
						<option value="cash">Cash</option>
						<option value="mpesa">M-pesa</option>
					</select>
					<br>
					<div class="delivery">
						<label for="delivery"> Delivery:</label><br><br>
						<input type="radio" name="delivery" value="yes" required>Yes
						<br><br>
						<input type="radio" name="delivery" value="no">No
					</div>
					<br>
					<input type="text" name="address" class="disabled-box" placeholder="Enter your delivery address" value="<?= isset($_GET['value']) && isset($customer_data->address) ? $customer_data->address : ''; ?>">
					<br>
					<input type="number" required id="quantity" onkeyup="displayTotal()" name="quantity" placeholder="Enter the number of animals you want to buy" max="<?= (int)$data->available_quantity; ?>" min="1" class="disabled-box" value="<?= isset($_GET['value']) && isset($customer_data->quantity) ? $customer_data->quantity : ''; ?>">
					<br>
					<div style="margin-left: -25px;">
						<label for="total">Total Cost (in Ksh):</label>
						<input type="text" readonly name="total_price" class="disabled-box" id="total" value="<?= isset($_GET['value']) && isset($customer_data->total_price) ? $customer_data->total_price : ''; ?>"/>
					</div>
					<input type="hidden" name="redirect_to" value="../../customer/buy.php?edit=<?=$_GET['edit'];?>" />
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
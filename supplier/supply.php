<?php 
    session_start();

    if (!isset($_SESSION)) {
        header('Location: ../auth/login.php?error=403');
    }
// var_dump($_SESSION);die();
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
				// var_dump($data);die();
   			}
			if(isset($_GET['edit'])){
				$data = json_decode(base64_decode($_GET['edit']));
			}
			include('../helpers/DbHelpers.php');
			$breed =  $db_helpers->getAll('categories');
		 ?>

		<form method="POST" action="../app/supplier/Products.php">
			<label for="breed">Breed: </label>
			<select class="input-box" name="breed" required>
				<option value="<?= isset($_GET['edit']) && isset($data->breed) ? $data->breed : ''; ?>"><?= isset($_GET['edit']) && isset($data->breed) ? $data->breed : ''; ?><?= isset($_GET['edit']) && isset($data->breed) ? $data->breed : '--choose the breed of your supply--'; ?></option>
				<?php while($product = mysqli_fetch_assoc($breed)) :?>
					<option value="<?=$product['name']?>"><?=$product['name']?></option>
				<?php endwhile; ?>
			</select>
			<br>

			<label for="weight">Weight: (kg)</label>
			<input type="number	" name="weight" min="550" max="1800" placeholder="Enter the weight" class="input-box" value="<?= isset($_GET['edit']) && isset($data->weight) ? $data->weight : ''; ?>">
			<br>

			<label for="sex">Sex: </label>
			<select class="input-box" name="sex" required>
				<option value="<?= isset($_GET['edit']) && isset($data->sex) ? $data->sex : ''; ?>"><?= isset($_GET['edit']) && isset($data->sex) ? $data->sex : '--select the sex of the animal--'; ?></option>
				<option value="female">Female</option>
				<option value="male">Male</option>
			</select>
			<br>

			<label for="age">Age: </label>
			<input type="number" name="age" min="30" max="70" placeholder="Enter the age" class="input-box" required value="<?= isset($_GET['edit']) && isset($data->age) ? $data->age : ''; ?>">
			<br>

			<label for="number">Number: (months)</label>
			<input type="number" name="number" placeholder="Enter the number of animals you want to sell" class="input-box" required value="<?= isset($_GET['edit']) && isset($data->number) ? $data->number : ''; ?>">
			<br>

			<label for="price">Price: </label>
			<input type="number" name="price" placeholder="Enter the price to sell the animal" class="input-box" required value="<?= isset($_GET['edit']) && isset($data->price) ? $data->price : ''; ?>">

			<input type="text" name="submitType" hidden value="<?= isset($_GET['edit']) ?'edit' : 'new'; ?>">
			<input type="text" name="id" hidden value="<?= isset($_GET['edit']) && isset($data->id)? $data->id : ''; ?>">
			<input type="text" name="supplier" hidden value="<?= $_SESSION['name']?>">
			<br>

			<div>
				<button type="submit" name="supply_submit" class="sendbtn">Submit</button>
			</div>
		</form>
	</div>
</body>
</html>
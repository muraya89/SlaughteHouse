<?php 
	
	if (isset($_POST['supply_submit'])) {
		// code...
		require 'C:\xampp\htdocs\SlaughteHouse\supplier\includes/db.inc.php';

		$breed = $_POST['breed'];
		$weight = $_POST['weight'];
		$sex = $_POST['sex'];
		$age = $_POST['age'];
		$type = $_POST['type'];
		$number = $_POST['number'];
		$price = $_POST['price'];

		if (empty($breed) || empty($weight) || empty($sex) || empty($age) || empty($type) ||empty($number) || empty($price)) {
			// code...
			header("Location: ../supply.php?error=emptyfields&breed=".$breed."&weight=".$weight."&sex=".$sex.	"&age=".$age."&type=".$type."&number=".$number."&price=".$price);
			exit();
		}elseif (!preg_match('/^[1-9][0-9]{0,3}*$/', $weight)) {
			header("Location: ../supply.php?error=excessweight&breed=".$breed."&weight=".$weight."&sex=".$sex.	"&age=".$age."&type=".$type."&number=".$number."&price=".$price);
			exit();
		}
	}

 ?>
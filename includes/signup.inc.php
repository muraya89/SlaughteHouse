<?php 

session_start();

if (isset($_POST['signup_submit'])) {
	// code...
	require 'db.inc.php';

	$cname = $_POST['cname'];
	$email = $_POST['email'];
	$phoneno = $_POST['phoneno'];
	$address = $_POST['address'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];

	// password variables
	$uppercase = preg_match('@[A-Z]@', $password);
	$lowercase = preg_match('@[a-z]@', $password);
	$number = preg_match('@[0-9]@', $password);
	$specialChars = preg_match('@[^\w]@', $password); // letter, number, underscore

	if (empty($cname)) {
		// // code...
		// $name_err = 'Please insert your username';
		header("Location: ../signup.php?error=emptyfields&cname=".$cname."&email=".$email.
        "&address=".$address."&phoneno=".$phoneno);
        exit();
	}
	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		// code...
		header("Location: ../signup.php?error=invalidemail&cname=".$cname.
        "$address=".$address."&phoneno=".$phoneno);
        exit();
	}
	elseif (empty($password)) {
		// code...
		header("Location: ../signup.php?error=invalidpassword&cname=".$cname."&email=".$email."&address=".$address."&phoneno=".$phoneno);
		exit();
	}
	elseif (!$uppercase || !$number ||!$lowercase || !$specialChars || strlen($password)<8) {
		// code...
		header("Location: ../signup.php?error=invalidPassword&cname=".$cname."&email=".$email."&address=".$address."&phoneno=".$phoneno);
		exit();
	}
	elseif ($password !== $cpassword) {
        header("Location: ../signup.php?error=passwordCheck&cname=".$cname."&email=".$email."&address=".$address."&phoneno=".$phoneno);
        exit();
    }else{
    	// check connection
    	$sql = "SELECT cname FROM customer WHERE cname=?";
    	// prepare the conn stmt and return status value
    	$stmt = mysqli_stmt_init($conn);
    	// prepare operation
    	if (!mysqli_stmt_prepare($stmt, $sql)) {
    		// code...
    		header("Location: ../signup.php?error=dberror");
    		exit();
    	}else{
    		//bind parameters markers to application variables before executing the statement
    		mysqli_stmt_bind_param($stmt, "s", $cname);
    		// execute prepared statement
    		mysqli_stmt_store_result($stmt);
    		$resultCheck = mysqli_stmt_num_rows($stmt);
    		if ($resultCheck > 0) {
    			// code...
    			header("Location: ../signup.php?error=usertaken&&cname=".$cname."&email=".$email."&address=".$address."&phoneno=".$phoneno);
    			exit();
    		}
    		else{
    			$sql = "INSERT INTO customer(cname, email, password, phoneno, address) VALUES (?, ?, ?, ?, ?)"; 
    			$stmt = mysqli_stmt_init($conn);
    			if (!mysqli_stmt_prepare($stmt, $sql)) {
    				// code...
    				header("Location: ../signup.php?error=dberror");
    				exit();
    			}else{
    				$hashedPassword = password_verify($password, PASSWORD_DEFAULT);
    				mysqli_stmt_bind_param($stmt, "sssss", $cname, $email, $password, $phoneno, $address);
    				mysqli_stmt_execute($stmt);
    				header("Location: ../index.php?signup=success");	
    				exit();
    			}

    		}
    	}

    } 
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}else{
	
	header("Location: ../index.php");
}

 ?>
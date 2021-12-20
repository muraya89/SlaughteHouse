<?php 

if (isset($_POST['login_submit'])) {
	// code...
	require 'db.inc.php';

	$email = $_POST['email'];
	$password = $_POST['password'];
	$accountype = $_POST['account'];

	if (empty($email)|| empty($password)|| empty($accountype)) {
		// code...
		header("Location: ../login.php?error=emptyfields");
		exit();
	}else{
		$sql = "SELECT * FROM customer WHERE email = ?;";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			// code...
			header("Location: ../signup.php?error=dberror");
			exit();
		}else{
			mysqli_stmt_bind_param($stmt, "s", $email);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if ($row = mysqli_fetch_assoc($result)) {
				// code...
				// chech if password entered password is the same as the one used to register
				$pwdCheck = password_verify($password, $row['password']);

				if ($pwdCheck == false) {
					// code...
					header("Location: ../login.php?error=pwderr");
					exit();
				}elseif ($pwdCheck == true) {
					// code...
					//session variablr
					session_start();
					$_SESSION['id'] = $row['id'];
					$_SESSION['email'] = $row['email'];
					header("Location: ../login.php?Login=Welcome");
					exit();
				}
			}
			else{
				header("Location: ../login.php?error=nouser");
				exit();
			}
		}
	}
}else{
	header("Location: ../login.php");
}

 ?>
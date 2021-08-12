<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Landpage</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../public/css/adminstyles.css">
</head>
<body style="display: grid; grid-auto-columns: auto auto">
<div class="nav">
		<input type="checkbox" id="nav-check">
		<div class="nav-header">
			<div class="nav-title">
				<a href=""><b><strong> The Meat Hook</strong></b></a>
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
			<a href="admin.php">Dashboard</a>
			<a href="users_report.php" style="background-color: #007bff; color: #FFF">Users</a>
			<a href="product_report.php">Products</a>
			<a href="orders_report.php">Orders</a>
			<a href="">Categories</a>
			<a href="admin_profile.php">Admin Profile</a>
		</div>
	</div>
    

	<?php
	include('../helpers/DbHelpers.php');
	$value = $db_helpers->getAll('users');
      
// <!-- create an error message if the user made an error trying to create an account -->
  if(isset($_GET['error'])) {
    if($_GET['error']=="emptyfields"){
      echo '<p class = "err">Fill in all fields!</p>';
    }
    elseif($_GET['error']== "invalidemail") {
      echo '<p class = "err">Provide a valid email!</p>';  
    }
    elseif ($_GET['error'] == "invalidpassword") {
       // code...
      echo '<p class = "err">Enter password!</p>';
    }
    elseif ($_GET['error'] == "invalidPassword") {
       // code...
      echo '<p class = "err"> Password should be atleast 8 characters long and should include at least one number, one uppercase letter and one special character </p>';
    }
    elseif($_GET['error']== "passwordCheck") {
      echo '<p class = "err">Your passwords do not match!</p>';
    }elseif($_GET['error'] == "dberror") {
        // code...
    echo '<p class = "err">Unsuccessful Signup!</p>';
    } elseif ($_GET['error'] == "accountError") {
      echo '<p class = "err">Account type required!</p>';
    } elseif($_GET['signup']== "success") {
      echo '<p> class = "err"Signup Successful!</p>';
    }
  }
?>

    <div class="box1">
        <div class="left">
            <a href="addUser.php"><button type="" class="addUser" name="add_user">+</button></a>
            <p>Add User</p>
        </div>
    </div>


    <div class="table">
	 <div class="supplierTable">
        <table>
         <tr>
            <th>#</th>
            <th>Company name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Address</th>
            <th>Account Type</th>
            <th>Date Created</th>
            <th>Action</th>
         </tr>
         <?php while($detail = mysqli_fetch_assoc($value)) :?>
         <tr>
            <td><?= $detail['id']; ?></td>
            <td><?= $detail['cname']; ?></td>
            <td><?= $detail['email']; ?></td>
            <td><?= $detail['phoneno']; ?></td>
            <td><?= $detail['address']; ?></td>
            <td><?= $detail['account']; ?></td>
            <td><?= $detail['date_created']; ?></td>
            <td>
              <form action="deleteUser.php">
                <button type="" name="delete_btn" class="btn">Delete</button>
              </form>
            </td>
         </tr>
         <?php endwhile; ?>
        </table>
	</div>
</div>
    <!-- <div class="pagination">
        <a href="#">&laquo;</a>
        <a href="" class="active">1</a>
        <a href="">2</a>
        <a href="">3</a>
        <a href="">4</a>
        <a href="">5</a>
        <a href="">6</a>
        <a href="">7</a>
        <a href="#">&raquo</a>
    </div> -->
</body>
</html>

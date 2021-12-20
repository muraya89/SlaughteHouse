<?php
include_once('main.php');

include('../helpers/DbHelpers.php');
// insert function to call the specific profile of the logged in user using the session ID
$value = $db_helpers->showAdmin('admin', ['id' => $_SESSION['id']]);

?>
		<div class="nav-links">
			<a href="admin.php">Dashboard</a>
			<a href="users_report.php">Users</a>
			<a href="product_report.php">Products</a>
			<a href="orders_report.php">Orders</a>
			<a href="categories_report.php">Categories</a>
			<a href="feedback_report.php">Feedback</a>
			<a href="admin_profile.php" style="background-color: #007bff; color: #FFF;">Admin Profile</a>
		</div>
	</div>
</div>



<div class="table1" >
	<div class="table2">
		<div class="table3">		
			<?php 
			// fetch the values within the specific array object
				$admin_details = mysqli_fetch_assoc($value);
			?>
			<img src="../public/images/admin.png" alt=""><br>
			<p><?=  $admin_details['username'];?></p><br>

		</div>
		<div class="table3" style="background-color: #fff;">
			<p>Information</p>
			<hr>
			<label for="" class="label">ID</label><br>
			<input class="profile" value="<?=  $admin_details['id'];?>"><br>
			<label for="" class="label">Date Created</label><br>
			<input class="profile" value="<?=  $admin_details['date_created'];?>"><br>
			<label for="" class="label">Role</label><br>
			<input class="profile" value="<?=  $admin_details['role'];?>"><br>
		
			<form method="post" action="logout.php">
			<input type="hidden" name="redirect" value="admin_profile.php">
				<button type="submit" name="logout" class="logout">Logout</button>
			</form>
		</div>
	</div>
</div>

</body>
</html>
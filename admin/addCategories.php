<?php include_once('main.php'); ?>
		<div class="nav-links">
			<a href="admin.php">Dashboard</a>
			<a href="users_report.php">Users</a>
			<a href="product_report.php">Products</a>
			<a href="orders_report.php">Orders</a>
			<a href="categories_report.php" style="background-color: #007bff; color: #FFF;">Categories</a>
			<a href="admin_profile.php">Admin Profile</a>
		</div>
	</div>



  <div class="box2">    
    <h1>Add Category</h1>  
    <!-- create an error message if the user made an error trying to create an account -->
      <?php
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
            echo '<p class = "err">Signup Successful!</p>';
          }
        }
      ?>
    <form method="POST" action="categories.php">
        <label for="name">Name*</label><br>
        <input type="text" name="name" class="input" >
        <br>
        <label for="type">Type *</label><br>
        <input type="text" name="type" class="input" >
        <br>
        <input type="hidden" name="table" value="category" />
        <input type="hidden" name="redirect_to" value="../../admin/addCategories.php" />
      <button type="submit" class="sendbtn" name="signup_submit">Add</button>
    </form>
  </div>
</body>


</html>


<?php include_once('main.php'); ?>
		<div class="nav-links">
			<a href="admin.php">Dashboard</a>
			<a href="users_report.php" style="background-color: #007bff; color: #FFF;">Users</a>
			<a href="product_report.php">Products</a>
			<a href="orders_report.php">Orders</a>
			<a href="categories_report.php">Categories</a>
			<a href="feedback_report.php">Feedback</a>
			<a href="admin_profile.php">Admin Profile</a>
		</div>
	</div>
    

	<?php
	include('../helpers/DbHelpers.php');
  // using the the variable value call the function from the db_helpers file to fetch all the values from the customers table
	$value = $db_helpers->getUsers('customer');
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
            <th>
              <label class="dropdown">
                <div class="dd-button">Account Type </div><div class="triangle"></div>
                <input type="checkbox" class="dd-input" id="test">
                <ul class="dd-menu">
                  <li> <a href="customers_report.php">Customer</a> </li>
                  <li> <a href="suppliers_report.php">Supplier</a> </li>
                  <hr>
                  <li> <a href="users_report.php">All</a> </li>
                </ul>
              </label>
            </th>
            <th>Date Created</th>
            <th>
              <label class="dropdown">
                <div class="dd-button">status </div><div class="triangle"></div>
                <input type="checkbox" class="dd-input" id="test">
                <ul class="dd-menu">
                  <li> <a href="online_users.php">Online Users</a> </li>
                  <li> <a href="offline_users.php">Offline Users</a> </li>
                </ul>
              </label>
            </th>
            <th>Action</th>
         </tr>
         <?php 
          // create a while loop to fetch all the array values and display in a table
          while($detail = mysqli_fetch_assoc($value)) :?>
         <tr>
            <td><?= $detail['id']; ?></td>
            <td><?= $detail['cname']; ?></td>
            <td><?= $detail['email']; ?></td>
            <td><?= $detail['phoneno']; ?></td>
            <td><?= $detail['address']; ?></td>
            <td><?= $detail['account']; ?></td>
            <td><?= $detail['date_created']; ?></td>          
            <td>
              <?php
                // check whether the specific user is online/offline and show the respective image
                if ($detail['status'] == "online") {?>
                  <img src="../public/images/online1.png" alt="" style="height: 20px; width: 20px; margin:auto;">
              <?php  
                }else{?>
                  <img src="../public/images/offline.png" alt="" style="height: 20px; width: 20px;margin:auto;">
              <?php  
                }
              ?>
            </td>
            <td>
              <form action="AdminClass.php" method="post">
                <!-- ensure that the product being deleted is the one with the id being selected -->
                <input type="hidden" name="id" value="<?= $detail['id'] ?>"/>
                <!-- and from the orders table -->
                <input type="hidden" name="table" value="users" />
                <!-- after deleting the redirect should go to the page and refreshed -->
                <input type="hidden" name="redirect_to" value="users_report.php" />
                <button type="submit" name="deleteSubmit" class="btn">Delete</button>
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

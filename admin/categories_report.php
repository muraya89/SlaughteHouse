<?php include_once('main.php'); ?>
		<div class="nav-links">
			<a href="admin.php">Dashboard</a>
			<a href="users_report.php">Users</a>
			<a href="product_report.php">Products</a>
			<a href="orders_report.php">Orders</a>
			<a href="categories_report.php" style="background-color: #007bff; color: #FFF;">Categories</a>
			<a href="feedback_report.php">Feedback</a>
			<a href="admin_profile.php">Admin Profile</a>
		</div>
	</div>
</div>

<?php
  include('../helpers/DbHelpers.php');
  // using the the variable category call the function from the db_helpers file to fetch all the values from the category table
  $category = $db_helpers->getAll('categories');
?>

<div class="box1">
  <div class="left">
    <a href="addCategories.php"><button type="" class="addUser" name="add_catefory">+</button></a>
    <p>Add Category</p>
  </div>
</div>
<div class="table">
	<div class="supplierTable">
    <table>
      <tr>
        <th>#</th>
        <th>Breed name</th>
        <th>Type</th>
        <th>Added on</th>
        <th>Actions</th>
      </tr>
      <?php 
      // create a while loop to display all the array values and display in a table
      while($detail = mysqli_fetch_assoc($category)) :?>
      <tr>
        <td><?= $detail['id']; ?></td>
        <td><?= $detail['name']; ?></td>
        <td><?= $detail['type']; ?></td>
        <td><?= $detail['date_created']; ?></td>
        <td >
          <div class="td">
            <form action="AdminClass.php" method="post" class=action1>
              <input type="hidden" name="id" value="<?= $detail['id'] ?>"/>
              <input type="hidden" name="table" value="categories" />
              <input type="hidden" name="redirect_to" value="categories_report.php" />
              <button type="submit" name="deleteSubmit" class="btn">Delete</button>
            </form>
            <!-- <form action="../app/supplier/Products.php" method="post" class="action2">
              <input type="hidden" name="id" value="<?= $detail['id'] ?>"/>
              <input type="hidden" name="table" value="categories" />
              <input type="hidden" name="redirect_to" value="categories_report.php" />
              <button type="submit" name="supply_submit" class="edit_btn">Edit</button>
            </form> -->
                 <?php 
                    // when the edit button is selected the information is displayed as a string and then encoded 
                    $base64UrlString = base64_encode(json_encode(array_merge($detail, ['isEdit' => true]))); 
                 ?>
                 <div class="flex-box action2">
                    <a href="addCategories.php?edit=<?=$base64UrlString;?>"><button class= "edit_btn" name="edit"> Edit</button></a>
                 </div>
          </div>
        </td>
      </tr>
      <?php endwhile; ?>
    </table>
	</div>
</div>



</body>
</html>
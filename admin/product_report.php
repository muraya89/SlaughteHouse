<?php include_once('main.php'); ?>
		<div class="nav-links">
			<a href="admin.php">Dashboard</a>
			<a href="users_report.php">Users</a>
			<a href="product_report.php" style="background-color: #007bff; color: #FFF">Products</a>
			<a href="orders_report.php">Orders</a>
			<a href="categories_report.php">Categories</a>
			<a href="feedback_report.php">Feedback</a>
			<a href="admin_profile.php">Admin Profile</a>
		</div>
	</div>
    

	<?php
	include('../helpers/DbHelpers.php');
  // variable to call a function which fetches all data from the animals table
	$value = $db_helpers->getAll('animals');
	?>


    <div class="table">
	 <div class="supplierTable">
        <table>
         <tr>
            <th>#</th>
            <th>Supplier</th>
            <th>Breed</th>
            <th>Weight</th>
            <th>Sex</th>
            <th>Age</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Type</th>
            <th>Status</th>
            <th>Action</th>
         </tr>
         <?php 
            // create a while loop to fetch all the array values and display in a table
            while($product = mysqli_fetch_assoc($value)) :?>
         <tr>
             <td><?= $product['id']; ?></td>
             <td><?= $product['supplier']; ?></td>
             <td><?= $product['breed']; ?></td>
             <td><?= $product['weight']; ?></td>
             <td><?= $product['sex']; ?></td>
             <td><?= $product['age']; ?></td>
             <td><?= $product['number']; ?></td>
             <td><?= $product['price']; ?></td>
             <td><?= $product['type']; ?></td>
             <td><?= $product['status']; ?></td>
            <td>
              <form action="AdminClass.php" method="post" class=action>
                <!-- ensure that the product being deleted is the one with the id being selected -->
                <input type="hidden" name="id" value="<?= $product['id'] ?>"/>
                <!-- and from the animals table -->
                <input type="hidden" name="table" value="animals" />
                <!-- after deleting the redirect should go to the page and refreshed -->
                <input type="hidden" name="redirect_to" value="product_report.php" />
                <button type="submit" name="deleteSubmit" class="btn">Delete</button>
              </form>
            </td>
         </tr>
         <?php endwhile;?>
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

<?php include_once('main.php'); ?>
		<div class="nav-links">
			<a href="admin.php">Dashboard</a>
			<a href="users_report.php">Users</a>
			<a href="product_report.php">Products</a>
			<a href="orders_report.php" style="background-color: #007bff; color: #FFF;">Orders</a>
			<a href="categories_report.php">Categories</a>
			<a href="admin_profile.php">Admin Profile</a>
		</div>
	</div>
    

	<?php
	include('../helpers/DbHelpers.php');
	$value = $db_helpers->getOrders('orders');
    $orders_by_month = mysqli_fetch_assoc($db_helpers->getByMonth('orders'));
    
    $months = ['Jan', 'Feb', 'March', 'April', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'];
	?>


    <div class="table orders">
        <div>
            <ul>
                <li>Month: <?= $months[(int)$orders_by_month['month']-1]; ?>, Number of Orders: <?= $orders_by_month['count']; ?></li>
            </ul>
        </div>
	 <div class="supplierTable">
        <table>
         <tr>
            <th>#</th>
            <th>Price</th>
            <th>Product ID</th>
            <th>Breed</th>
            <th>Price Per Animal</th>
            <th>Type</th>
            <th>Quantity</th>
            <th>Mode Of Payment</th>
            <th>Delivery</th>
            <th>address</th>
            <th>Made on</th>
            <th>Actions</th>
         </tr>
         <?php while($order = mysqli_fetch_assoc($value)) :?>
         <tr>
             <td><?= $order['order_id']; ?></td>
             <td><?= $order['price']; ?></td>
             <td><?= $order['product_id']; ?></td>
             <td><?= $order['breed']; ?></td>
             <td><?= $order['total_price']; ?>/=</td>
             <td><?= $order['type']; ?></td>
             <td><?= $order['quantity']; ?></td>
             <td><?= $order['mode_of_payment']; ?></td>
             <td><?= $order['delivery']; ?></td>
             <td><?= $order['address']; ?></td>
             <td><?= $order['made_on']; ?></td>
             <td>
                <div class="td1">
                    <form action="AdminClass.php" method="post" class=action1>
                        <input type="hidden" name="id" value="<?= $order['order_id'] ?>"/>
                        <input type="hidden" name="table" value="orders" />
                        <input type="hidden" name="redirect_to" value="orders_report.php" />
                        <button type="submit" name="deleteSubmit" class="btn">Delete</button>
                    </form>
                    <form action="../app/supplier/Products.php" method="post" class="action2">
                    <input type="hidden" name="id" value="<?= $order['order_id'] ?>"/>
                    <input type="hidden" name="table" value="categories" />
                    <input type="hidden" name="redirect_to" value="orders_report.php" />
                    <button type="submit" name="supply_submit" class="edit_btn">Edit</button>
                    </form>
                </div>
             </td>
         </tr>
         <?php endwhile; ?>
        </table>
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

<?php 
session_start();

if (!isset($_SESSION['id'])) {
    header('Location: ../auth/login.php?error=403');
}


include('../helpers/DbHelpers.php');
$value = $db_helpers->show('orders', ['user_id' => $_SESSION['id']]);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>My Orders</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../public/css/sstyles.css">
</head>
<body>

    <!-- navigation bar -->
    <div class="nav">
            <input type="checkbox" id="nav-check">
            <div class="nav-header">
                    <div class="logo">
                        <img src="../public/images/slaughterhouse.jpeg" alt="">
                    </div>
                <div class="nav-title">
                    <a href="index.php">The Meat Hook</a>
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
                <a href="index.php">Produce</a>
                <div class="div_logout">
                    <form method="post" action="../app/auth/Logout.php">
                        <button type="submit" name="logout" class="logout">Logout</button>
                    </form>
                </div>

                <!-- search bar -->
                <!-- <div class="search">
                        <form action="">
                            <input type="text" placeholder="Search...">
                        <div class="searchbtn">
                            <button type="submit" name="Submit">Submit</button>
                        </div>
                        </form>
                </div> -->
            </div>
    </div>

    <div class="paragraph">
        <p> My Orders</p>
    </div>

	<div class="index">
	 <div class="supplierTable">
        <table>
         <tr>
            <th>#</th>
            <th>Product ID</th>
            <th>Breed</th>
            <th>Price Per Animal</th>
            <th>Quantity</th>
            <th>Mode Of Payment</th>
            <th>Total Price</th>
            <th>Delivery</th>
            <th>address</th>
            <th>Made on</th>
            <th>Actions</th>
         </tr>
         <?php while($order = mysqli_fetch_assoc($value)) :?>
         <tr>
             <td><?= $order['id']; ?></td>
             <td><?= $order['product_id']; ?></td>
             <td><?= $order['breed']; ?></td>
             <td><?= $order['price']; ?>&nbsp;/=</td>
             <td><?= $order['quantity']; ?></td>
             <td><?= $order['mode_of_payment']; ?></td>
             <td><?= $order['total_price']; ?>&nbsp;/=</td>
             <td><?= $order['delivery']; ?></td>
             <td><?= $order['address']; ?></td>
             <td><?= $order['created_at']; ?></td>
             <td>
                <div class="td1">  
                 <?php 
                //  encode the data as a string before sending it to the next page in the url and save to the variable
                    $base64UrlString = base64_encode(json_encode(array_merge($order, ['isEdit' => true]))); 
                 ?>
                 <div class="flex-box">
                     <!-- call variable with the encoded data -->
                    <a href="receipt.php?edit=<?=$base64UrlString;?>"><button class="receipt_btn"> Receipt</button></a>
                 </div>
                    <form action="../app/customer/Orders.php" method="post" class="action1">
                        <input type="hidden" name="order" value="<?= base64_encode(json_encode($order)) ?>"/>
                        <input type="hidden" name="table" value="orders" />
                        <input type="hidden" name="redirect_to" value="../../customer/orders.php" />
                        <button type="submit" name="deleteSubmit" class="delete_btn">Delete</button>
                    </form>
                    <!-- <form action="../app/supplier/Products.php" method="post" class="action2">
                        <input type="hidden" name="id" value=""/>
                        <input type="hidden" name="table" value="categories" />
                        <input type="hidden" name="redirect_to" value="orders_report.php" />
                        <button type="submit" name="supply_submit" class="edit_btn">Edit</button>
                    </form> -->
                  
                </div>
             </td>
         </tr>
         <?php endwhile; ?>
        </table>
     </div>
	</div>
</body>
</html>
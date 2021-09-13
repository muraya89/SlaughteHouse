<?php 
session_start();

if (!isset($_SESSION['id'])) {
    header('Location: ../auth/login.php?error=403');
}


include('../helpers/DbHelpers.php');
$value = $db_helpers->show('orders', ['order_id' => $_SESSION['id']]);

$data = [];
if (isset($_GET['edit'])) {
    //for decoding stored data
    $data = json_decode(base64_decode($_GET['edit']));
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Receipt</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../public/css/sstyles.css">
</head>
<body id="receipt">

<div class="effect receipt">
    <h2>The Meat Hook</h2>
    <p class="header">Thank You for the order</p>
    <div class="orderDetails">
        <p>Order ID: <input type="text" value="<?= isset($_GET['edit']) && isset($data->id) ? $data->id : ''; ?> " style="border: none;"></p>
        <p>Date: <input type="text" value="<?= isset($_GET['edit']) && isset($data->created_at) ? $data->created_at : ''; ?> " style="border: none;"></p>
        <p>Shipping Address: <input type="text" value="<?= isset($_GET['edit']) && isset($data->address) ? $data->address : ''; ?> " style="border: none;"></p>
    </div>
    <hr style="border: .7px solid #aaa;">
    <div class="details">
        <h3>Order Details</h3>
        <div class="orderDetails">
            <p>Breed:  <input type="text" value="<?= isset($_GET['edit']) && isset($data->breed) ? $data->breed : ''; ?> " style="border: none;"></p>

            <p>Quantity:  <input type="text" value="<?= isset($_GET['edit']) && isset($data->quantity) ? $data->quantity : ''; ?> " style="border: none;"></p>

            <p>Price-per-animal:  Kshs<input type="text" value="<?= isset($_GET['edit']) && isset($data->price) ? $data->price : ''; ?> " style="border: none;"></p>

            <p class="subtotal">Subtotal: 
                <span> Kshs 
                    <input type="text" value="<?= isset($_GET['edit']) && isset($data->total_price) ? $data->total_price : ''; ?>" name="subtotal">
                </span>
            </p>
            
            <input type="hidden" value="<?= isset($_GET['edit']) && isset($data->delivery) ? $data->delivery : ''; ?> "name="delivery">
            <p class="subtotal">Delivery: 
                <span> Kshs
                    <?php
                        $charge = 100;
                        if ($data->delivery == true) {
                            # code...
                            echo $charge;
                        }else{
                            echo "0";
                        }
                    
                    ?>
                </span>
            </p>
        </div>
    </div>
    <hr style="border: .7px solid #aaa;">

    <p class="total"> Total 
        <span> Kshs
			<?php
			
				$total = 0;
					$total += $data->total_price + $charge;
                    echo $total;
			?>
        </span>
    </p>

</div>

</body>
</html>
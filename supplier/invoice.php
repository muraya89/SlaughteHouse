<?php 
session_start();

if (!isset($_SESSION['id'])) {
    header('Location: ../auth/login.php?error=403');
}


include('../helpers/DbHelpers.php');

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
	<title>Invoice Details</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../public/css/sstyles.css">
</head>
<body style="background-color: #E5E5E5;">


<div class="effect invoice">
    <div class="invoice_logo">
        <div class="left_invoice">
            <img src="../public/images/slaughterhouse.jpeg" alt="The Meat Hook logo">
            <h2> <strong> The Meat Hook</strong></h2>
            <p>9390-00100 Nairobi</p>
            <p>Dagoretti</p>
            <p>Kenya</p>

            <br><br>
            
            <strong> Bill to:</strong>
            <p> <input type="text" value="<?= isset($_GET['edit']) && isset($data->address) ? $data->address : ''; ?> " disabled></p>
            <p> <input type="text" value="<?= isset($_GET['edit']) && isset($data->address) ? $data->address : ''; ?> " disabled></p>


        </div>

        <div class="right_invoice">
            <p class="header">Sales Invoice</p>
            <p>Invoice: #<input type="text" value="<?= isset($_GET['edit']) && isset($data->id) ? $data->id : ''; ?> " style="border: none;" disabled></p>
            <p>Invoice date:  <input type="text" value="<?= isset($_GET['edit']) && isset($data->supply_date) ? $data->supply_date : ''; ?> " style="border: none;" disabled></p>
        </div>

    </div>
    
    <div class="orderDetails">
	 <div class="Table">
        <table>
         <tr>
            <th>#</th>
            <th>Details</th>
            <th>Quantity</th>
            <th>Price</th>
         </tr>            
         <tr>
             <td><?= isset($_GET['edit']) && isset($data->id) ? $data->id : ''; ?></td>
             <td><?= isset($_GET['edit']) && isset($data->breed) ? $data->breed : ''; ?> </td>
             <td><?= isset($_GET['edit']) && isset($data->number) ? $data->number : ''; ?></td>
             <td><?= isset($_GET['edit']) && isset($data->price) ? $data->price : ''; ?></td>
         </tr>
        </table>
     </div>
        
    </div>

    <p class="total1"> 
        <Button> Grand Total: 
        <span> Kshs
			<?php
			
				$total = 0;
					$total += $data->price ;
                    echo $total;
			?>
        </span></Button>
    </p>

</div>

</body>
</html>
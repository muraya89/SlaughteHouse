<?php 

//db variables
$server = "localhost";
$user = "root";
$Password = "";
$dbName = "sms";

$conn = mysqli_connect($server,$user,$Password,$dbName);
 
 if (!$conn) {
    // code...
    die("Connection failed." .mysqli_connect_error());
 }

 ?>
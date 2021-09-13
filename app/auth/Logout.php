<?php 
session_start();
// for functions
require('../../helpers/DbHelpers.php');
// check if the session exists
if (isset($_SESSION['id']) && isset($_SESSION['name'])) {
    $value = $db_helpers->updateData('users', ['id' => $_SESSION['id'], 'status' => 'offline']);
    if ($value->response) {
    session_destroy();
    unset($_SESSION['id']);
    unset($_SESSION['name']);
    header("Location: ../../auth/login.php");
        // redirect here
        $associativeArray['account'] == 'supplier' 
        ? header('Location: ../../supplier/index.php') 
        : header('Location: ../../customer/index.php');                                    
    }
}

?>
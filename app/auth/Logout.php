<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['name'])) {
    session_destroy();
    unset($_SESSION['id']);
    unset($_SESSION['name']);
    header('Location: ../../auth/login.php');
}

?>
<?php 
    session_start();
    include('function.php');
    if (!isset($_SESSION['customer_username'])) {
        redirect('../index.php');
    }
?>
<?php 

    session_start();
    // session_destroy();
    unset($_SESSION['customer_username']);
    header('location:index.php');

?>
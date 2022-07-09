<?php 
    session_start();
    include('function.php');
    if (!isset($_SESSION['admin_username'])) {
        redirect('../index.php');
    }
?>
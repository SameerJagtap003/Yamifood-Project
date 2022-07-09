<?php 
    session_start();
    include('function-admin-menu.php');
    if (!isset($_SESSION['admin_username'])) {
        redirect('../../index.php');
    }
?>
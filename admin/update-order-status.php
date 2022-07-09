<?php 
    
    include('login-check.php');
    include('../constant/coneection.php');
    if (isset($_GET['submit'])) {
        
        $status = $_GET['status'];
        $order_id = $_GET['order_id'];

        $result = pg_query($pgcon,"UPDATE tbl_orders SET status = '$status' WHERE order_id = $order_id;");
        if ($result == true) {
            
            $_SESSION['update-order-status'] = "Status Updated";
            // header('location:update-order.php');
            redirect('admin-orders.php');
        } else {
            
            $_SESSION['update-order-status'] = "Status Not Updated";
            // header('location:update-order.php');
            redirect('admin-orders.php');
        }
    }


?>
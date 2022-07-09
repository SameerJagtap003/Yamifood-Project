<?php 

    include('login-check.php');
    include('../constant/coneection.php');
    $order_id = $_GET['order_id'];

    //to delete the order
    $cancel_ord_result = pg_query($pgcon,"DELETE FROM tbl_order_cancel_msg WHERE order_id = $order_id");
    $result = pg_query($pgcon,"DELETE FROM tbl_orders WHERE order_id = $order_id");

    if ($result == true) {
        
        $_SESSION['order_delete'] = "Order Deleted Successfully";
        header('location:admin-orders.php');
    } else {
        
        $_SESSION['order_delete'] = "Order Not Deleted";
        header('location:admin-orders.php');
    }

?>
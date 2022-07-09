<?php 

    session_start();
    include('../constant/coneection.php');
    $order_id = $_GET['order_id'];

    //get cust_id from tbl_orders
    $result_order = pg_query($pgcon,"SELECT * FROM tbl_orders WHERE order_id = $order_id");
    while ($rows_order = pg_fetch_assoc($result_order)) {
        
        $cust_id = $rows_order['cust_id'];
    }


    //get cust_name from tbl_customer
    $result_cust = pg_query($pgcon,"SELECT * FROM tbl_customer WHERE cust_id = $cust_id");
    while ($rows_cust = pg_fetch_assoc($result_cust)) {
        
        $cust_name = $rows_cust['cust_name'];
    }

    
    //insert order_id and cust_name into tbl_order_cancel_msg
    $result_ord_can = pg_query($pgcon,"INSERT INTO tbl_order_cancel_msg(order_id, cust_name, status) VALUES($order_id, '$cust_name', 0); ");





    //to delete the order
    $result = pg_query($pgcon,"UPDATE tbl_orders SET status = 'Canceled' WHERE order_id = '$order_id' ");

    if ($result == true) {
        
        $_SESSION['order_canceled'] = "Order Canceled Successfully";
        header('location:orders.php');
    } else {
        
        $_SESSION['order_canceled'] = "Order Not Canceled";
        header('location:orders.php');
    }

?>
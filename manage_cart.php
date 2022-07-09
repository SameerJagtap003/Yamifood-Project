<?php 

    session_start();
    include('constant/coneection.php');
    $menu_id = $_GET['menu_id'];
    $cust_id = $_SESSION['cust_id'];

    if (isset($menu_id) && $cust_id) {
            
        $res = pg_query($pgcon,"SELECT * FROM tbl_cart WHERE cust_id = $cust_id AND menu_id = $menu_id");
        if (pg_num_rows($res) > 0) {
            $rows = pg_fetch_assoc($res);
            $cid = $rows['cart_id'];
            pg_query($pgcon,"UPDATE tbl_cart SET cust_id = '$cust_id', menu_id = '$menu_id' WHERE cart_id = '$cid' ");
            $_SESSION['cart_added'] = "Menu Added to Cart";
            header('location:cart.php');
        } else {
            pg_query($pgcon,"INSERT INTO tbl_cart(cust_id, menu_id) VALUES($cust_id, $menu_id)");
            $_SESSION['cart_added'] = "Menu Added to Cart";
            header('location:cart.php');
        }
    }

?>
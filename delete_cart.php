<?php 

    session_start();
    $cart_id = $_GET['cart_id'];
    //connection to postgreSQL
    include('constant/coneection.php');

    //query to execute
    $query = "DELETE FROM tbl_cart where cart_id = $cart_id";

    //execute the query
    $result = pg_query($pgcon,$query);

    if ($result == true) {
        
        $_SESSION['delete-cart-msg'] = "Menu Removed Successfully";
        header('location:cart.php');
    } else {
        $_SESSION['delete-cart-msg'] = "Menu Not Removed";
        header('location:cart.php');
    }


?>
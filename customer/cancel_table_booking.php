<?php 

    session_start();
    include('../constant/coneection.php');
    $table_id = $_GET['table_id'];
    $result = pg_query($pgcon,"DELETE FROM tbl_table WHERE table_id = $table_id ");
    if ($result == true) {
        
        $_SESSION['cancel-order'] = "Booking Canceled Succefully";
        header('location:table_booking_history.php');
    } else {

        $_SESSION['cancel-order'] = "Booking Not Canceled";
        header('location:table_booking_history.php');
    }

?>
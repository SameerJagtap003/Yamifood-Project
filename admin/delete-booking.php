<?php 

    session_start();
    include('../constant/coneection.php');
    $table_id = $_GET['table_id'];
    $result = pg_query($pgcon,"DELETE FROM tbl_table WHERE table_id = $table_id ");
    if ($result == true) {
        
        $_SESSION['delete-order'] = "Booking Deleted Succefully";
        header('location:table_bookings.php');
    } else {

        $_SESSION['delete-order'] = "Booking Not Deleted";
        header('location:table_bookings.php');
    }

?>
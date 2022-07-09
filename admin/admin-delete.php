<?php 

    session_start();
    $admin_id = $_GET['admin_id'];
    //connection to postgreSQL
    include('../constant/coneection.php');

    //query to execute
    $query = "DELETE FROM tbl_admin where admin_id = $admin_id";

    //execute the query
    $result = pg_query($pgcon,$query);

    if ($result == true) {
        
        $_SESSION['delete-admin-msg'] = "Admin Deleted Successfully";
        header('location:admins.php');
    } else {
        $_SESSION['delete-admin-msg'] = "Admin Not Delete";
        header('location:admins.php');
    }


?>
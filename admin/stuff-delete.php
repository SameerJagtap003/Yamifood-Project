<?php 

    session_start();
    $stuff_id = $_GET['stuff_id'];
    //connection to postgreSQL
    include('../constant/coneection.php');

    //query to execute
    $query = "DELETE FROM tbl_stuff where stuff_id = $stuff_id";

    //execute the query
    $result = pg_query($pgcon,$query);

    if ($result == true) {
        
        $_SESSION['delete-stuff-msg'] = "Stuff Deleted Successfully";
        header('location:stuff.php');
    } else {
        $_SESSION['delete-stuff-msg'] = "Stuff Not Delete";
        header('location:stuff.php');
    }


?>
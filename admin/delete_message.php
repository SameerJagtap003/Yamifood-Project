<?php 

    session_start();
    include('../constant/coneection.php');
    $cont_id = $_GET['cont_id'];

    //query to execute
    $query = "DELETE FROM tbl_contact where cont_id = $cont_id";

    //execute the query
    $result = pg_query($pgcon,$query);

    if ($result == true) {
        
        $_SESSION['delete-msg'] = "Message Deleted Successfully";
        header('location:admin-messages.php');
    } else {
        $_SESSION['delete-msg'] = "Message Not Delete";
        header('location:admin-messages.php');
    }
    

?>
<?php 

    session_start();
    include('../../constant/coneection.php');
    
    $menu_id = $_GET['menu_id'];

    //query to execute
    $query = "DELETE FROM tbl_menu where menu_id = $menu_id";

    //execute the query
    $result = pg_query($pgcon,$query);

    if ($result == true) {
        
        $_SESSION['delete-admin-msg'] = "Menu Deleted Successfully";
        header('location:../admin-menu.php');
    } else {
        $_SESSION['delete-admin-msg'] = "Menu Not Delete";
        header('location:../admin-menu.php');
    }

?>
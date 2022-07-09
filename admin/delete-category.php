<?php 

    session_start();
    include('../constant/coneection.php');

    $category_id = $_GET['category_id'];

    $result = pg_query($pgcon,"DELETE FROM tbl_category WHERE category_id = $category_id");
    if ($result == true) {
        
        $_SESSION['delete-cat'] = "Category Deleted";
        header('location:admin-category.php');
    } else {
        
        $_SESSION['delete-cat'] = "Category not Deleted";
        header('location:admin-category.php');
    }

?>
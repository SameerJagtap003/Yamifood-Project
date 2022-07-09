<?php 

    session_start();
    include('../constant/coneection.php');

    $category_name = $_GET['category_name'];
    $status = $_GET['status'];

    $result = pg_query($pgcon,"INSERT INTO tbl_category(category_name, category_active) VALUES('$category_name' , '$status')");
    if ($result == true) {
        
        $_SESSION['cat_add'] = "Category Added";
        header('location:admin-category.php');
    } else {
        
        $_SESSION['cat_add'] = "Category not Added";
        header('location:admin-category.php');
    }

?>
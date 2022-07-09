<?php 

    session_start();
    include('../constant/coneection.php');
    $blog_id = $_GET['blog_id'];

    $result = pg_query($pgcon,"DELETE FROM tbl_blog WHERE blog_id = $blog_id");
    if ($result == true) {
        
        $_SESSION['delete-blog'] = "Blog Deleted Successfully";
        header('location:admin-blogs.php');
    } else {
        
        $_SESSION['delete-blog'] = "Blog not Deleted";
        header('location:admin-blogs.php');
    }

?>
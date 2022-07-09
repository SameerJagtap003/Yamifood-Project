<?php 

    session_start();
    include('../constant/coneection.php');
    $blog_id = $_SESSION['blog_id'];
    
    if (isset($_POST['submit']) && isset($_FILES['img'])) {

        $blog_title = $_POST['blog_title'];
        $content = $_POST['content'];

        //img file
        $file_temp_name = $_FILES['img']['tmp_name'];
        $file_name = $_FILES['img']['name'];

        if (move_uploaded_file($file_temp_name,"../images/" . $file_name)) {

            //query to insert data
            $query = "UPDATE tbl_blog SET 
                    blog_title = '$blog_title',
                    content = '$content', 
                    img = '$file_name'
                    WHERE blog_id = $blog_id;
            ";
            
            //execute the query
            $result = pg_query($pgcon,$query);

            if ($result == true) {
                
                //data inserted
                $_SESSION['blog-update'] = "Blog Updated Succesfully...";
                unset($_SESSION['blog_id']);
                header('location:admin-blogs.php');
            } else {

                $_SESSION['blog-update'] = "blog Not Updated...";
                unset($_SESSION['blog_id']);
                header('location:admin-blogs.php');
            }
        }
    }

?>
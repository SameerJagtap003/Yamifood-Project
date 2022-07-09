<?php 

    include('login-check.php');
    include('../constant/coneection.php');
    $admin_username = $_SESSION['admin_username'];

    $query = "SELECT admin_id FROM tbl_admin WHERE admin_username = '$admin_username' ";
    $result = pg_query($pgcon,$query);
   
    while ($rows = pg_fetch_assoc($result)) {
        $admin_id = $rows['admin_id'];
    }

    if (isset($_POST['submit']) && isset($_FILES['img'])) {

        $blog_title = $_POST['blog_title'];
        $content = $_POST['content'];

        //img file
        $file_temp_name = $_FILES['img']['tmp_name'];
        $file_name = $_FILES['img']['name'];

        if (move_uploaded_file($file_temp_name,"../images/" . $file_name)) {

            //query to insert data
            $query = "INSERT INTO tbl_blog(blog_title, content, writer_name,img, admin_id)
                VALUES('$blog_title', '$content', '$admin_username','$file_name', $admin_id);
            ";
            
            //execute the query
            $result = pg_query($pgcon,$query);

            if ($result == true) {
                
                //data inserted
                $_SESSION['blog-add'] = "Blog Added Succesfully...";
                header('location:admin-blogs.php');
            } else {

                $_SESSION['blog-add'] = "blog Not Added...";
                header('location:admin-blogs.php');
            }
        }
    }

?>
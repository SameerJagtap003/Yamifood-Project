<?php 

    include('login-check.php');
    include('../constant/coneection.php');

    if (isset($_POST['submit']) && isset($_FILES['img'])) {
        
        $full_name = $_POST['full_name'];
        $user_name = $_POST['user_name'];
        $phone_no = $_POST['phone_no'];
        $password = md5($_POST['password']);
        $confirm_password = md5($_POST['confirm_password']);
        $email = $_POST['email'];
        $address = $_POST['address'];

        //img file
        $file_temp_name = $_FILES['img']['tmp_name'];
        $file_name = $_FILES['img']['name'];

        if ($password == $confirm_password) {
            
            if (move_uploaded_file($file_temp_name,"admin-img/" . $file_name)) {

                //query to insert data
                $query = "INSERT INTO tbl_admin(admin_name, admin_username, admin_password, admin_img, admin_address, admin_phone, admin_email)
                        VALUES('$full_name','$user_name','$confirm_password','$file_name','$address','$phone_no','$email');
                ";

                //execute the query
                $result = pg_query($pgcon,$query);

                if ($result == true) {
                    
                    //data inserted
                    $_SESSION['data-inserted'] = "Admin Added Succesfully...";
                    header('location:admins.php');
                } else {

                    $_SESSION['data-inserted'] = "Admin Not Added...";
                    header('location:admins.php');
                }
            }
        } else {
            
            $_SESSION['pass-msg'] = "Password and Confirm Password Does not Matched";
            header('location:admin-add.php');
        }

    }

?>
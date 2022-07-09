

<?php 

    session_start();
    include('../constant/coneection.php');
    $admin_username = $_SESSION['admin_username'];
    if (isset($_POST['submit']) && isset($_FILES['img'])) {
        
        $full_name = $_POST['full_name'];
        $user_name = $_POST['user_name'];
        $phone_no = $_POST['phone_no'];
        $new_password = md5($_POST['new_password']);
        $confirm_password = md5($_POST['confirm_password']);
        $email = $_POST['email'];
        $address = $_POST['address'];

        
            //checking whether new and confirm password is match or not
            if ($new_password == $confirm_password) {

                //for img
                $file_temp_name = $_FILES['img']['tmp_name'];
                $file_name = $_FILES['img']['name'];
                
                if (move_uploaded_file($file_temp_name,"admin-img/" . $file_name)) {

                    //query to update data
                    $update_query = " UPDATE tbl_admin SET
                        admin_name = '$full_name',
                        admin_username = '$user_name',
                        admin_password = '$confirm_password',
                        admin_img = '$file_name',
                        admin_address = '$address',
                        admin_phone = $phone_no,
                        admin_email = '$email'
                        WHERE admin_username = '$admin_username';
                    ";

                    //execute the query
                    $update_result = pg_query($pgcon,$update_query);

                    //checking whether the query is executed or not
                    if ($update_result == true) {
                            
                        $_SESSION['admin-updated'] = "Admin Updated...";
                        header('location:admin-home.php');
                    } else {
                            
                        $_SESSION['admin-updated'] = "Admin not Updated...";
                        header('location:admin-home.php');
                    }
                }
            } else {
                    
                $_SESSION['new-conf-pass-not-match'] = "New and Confirm Password not Match...";
                header('location:admin-update.php');
            } 
    }

?>
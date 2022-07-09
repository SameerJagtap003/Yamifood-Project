

<?php 

    session_start();
    include('../constant/coneection.php');
    $customer_username = $_SESSION['customer_username'];
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
                
                if (move_uploaded_file($file_temp_name,"img/" . $file_name)) {

                    //query to update data
                    $update_query = " UPDATE tbl_customer SET
                        cust_name = '$full_name',
                        cust_username = '$user_name',
                        cust_pass = '$confirm_password',
                        cust_img = '$file_name',
                        cust_address = '$address',
                        cust_phone = $phone_no,
                        cust_email = '$email'
                        WHERE cust_username = '$customer_username';
                    ";

                    //execute the query
                    $update_result = pg_query($pgcon,$update_query);

                    //checking whether the query is executed or not
                    if ($update_result == true) {
                            
                        $_SESSION['customer-updated'] = "Updated...";
                        header('location:account.php');
                    } else {
                            
                        $_SESSION['customer-updated'] = "Not Updated...";
                        header('location:account.php');
                    }
                }
            } else {
                    
                $_SESSION['new-conf-pass-not-match'] = "New and Confirm Password not Match...";
                header('location:customer-update.php');
            } 
    }

?>
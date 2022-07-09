<?php 

    session_start();
    include('../constant/coneection.php');

    if (isset($_POST['submit']) && isset($_FILES['img'])) {

        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone_no = $_POST['phone_no'];
        $password = md5($_POST['password']);
        $confirm_password = md5($_POST['confirm_password']);
        $address = $_POST['address'];

        //img file
        $file_temp_name = $_FILES['img']['tmp_name'];
        $file_name = $_FILES['img']['name'];

        if ($password == $confirm_password) {
            
            if (move_uploaded_file($file_temp_name,"img/" . $file_name)) {

                //query to insert data
                $query = "INSERT INTO tbl_customer(cust_name, cust_phone, cust_username, cust_pass, cust_email, cust_img, cust_address)
                        VALUES('$full_name','$phone_no','$username','$confirm_password','$email','$file_name','$address');
                ";

                //execute the query
                $result = pg_query($pgcon,$query);

                if ($result == true) {
                    
                    //data inserted
                    $_SESSION['customer-inserted'] = "Registered Succesfully...";
                    header('location:../login.php');
                } else {

                    $_SESSION['customer-inserted'] = "Not Registered...";
                    header('location:../login.php');
                }
            }
        } else {
            
            $_SESSION['pass-msg'] = "Password and Confirm Password Does not Matched";
            header('location:../register.php');
        }
    }

?>
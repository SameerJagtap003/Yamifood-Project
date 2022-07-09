<?php 

    session_start();
    include('../constant/coneection.php');
    if (isset($_POST['submit'])) {

        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        // $pgcon = pg_connect("host=localhost dbname=new_food user=postgres password=samsj@2010");
        $query = "SELECT * FROM tbl_customer WHERE cust_username = '$username' AND cust_email = '$email' AND cust_pass = '$password'; ";
        $result = pg_query($pgcon,$query);
        if (pg_num_rows($result) == 1) {

            $rows = pg_fetch_assoc($result);
            $_SESSION['cust_id'] = $rows['cust_id'];

            $_SESSION['customer_username'] = $username;
            header('location:../index.php');
        } else {
            $_SESSION['customer-login-msg'] = "Username or Password is Wrong";
            header('location:../login.php');
        }
    }
?>  


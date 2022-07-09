<?php 

    session_start();
    if (isset($_POST['submit'])) {

        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $pgcon = pg_connect("host=localhost dbname=new_food user=postgres password=samsj@2010");
        $query = "SELECT * FROM tbl_admin WHERE  admin_username = '$username' AND admin_password = '$password'; ";
        $result = pg_query($pgcon,$query);
        if (pg_num_rows($result) == 1) {

            $_SESSION['admin_username'] = $username;
            header('location:admin-home.php');
        } else {
            $_SESSION['admin-login-msg'] = "Username or Password is Wrong";
            header('location:../index.php');
        }
    }
?>


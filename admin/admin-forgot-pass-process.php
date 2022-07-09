
<?php 

    session_start();
    if (isset($_POST['submit'])) {
        
        //if yes
        //get data from form
        $admin_username = $_POST['admin_username'];
        $phone_no = $_POST['phone_no'];
        $password = md5($_POST['password']);
        $confirm_password = md5($_POST['confirm_password']);

        if ($password == $confirm_password) {
        
            //then coonect to database
            $pgcon = pg_connect("host=localhost user=postgres dbname=new_food password=samsj@2010")
            or die("Failed to Connect");

            //query to get data
            $query = "SELECT * FROM tbl_admin WHERE admin_username = '$admin_username' AND admin_phone = $phone_no; ";
            
            //execute the query
            $result = pg_query($pgcon,$query);

            if (pg_num_rows($result) == 1) {

                $query_to_update = "UPDATE tbl_admin SET 
                    admin_password = '$confirm_password'
                    WHERE admin_username = '$admin_username';
                ";

                $result_to_update = pg_query($pgcon,$query_to_update);
                
                if ($result_to_update == true) {
                    
                    $_SESSION['pass-change'] = "Password Changed";
                    header('location:../index.php');
                } else {
                    
                    $_SESSION['pass-not-change'] = "Password not Changed";
                    header('location:admin-forgot-password.php');
                }

            } else {
                
                $_SESSION['admin-login-msg'] = "Username or Password is Wrong";
                header('location:admin-forgot-password.php');
            }
        } else {
            
            $_SESSION['pass-not-match'] = "New and Confirm Password does not Match";
            header('location:admin-forgot-password.php');
        }

    }

?>
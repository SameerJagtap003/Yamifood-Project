
<?php 

    session_start();
    if (isset($_POST['submit'])) {
        
        //if yes
        //get data from form
        $cust_username = $_POST['cust_username'];
        $cust_email = $_POST['cust_email'];
        $password = md5($_POST['password']);
        $confirm_password = md5($_POST['confirm_password']);

        if ($password == $confirm_password) {
        
            //then coonect to database
            $pgcon = pg_connect("host=localhost user=postgres dbname=new_food password=samsj@2010")
            or die("Failed to Connect");

            //query to get data
            $query = "SELECT * FROM tbl_customer WHERE cust_username = '$cust_username' AND cust_email = '$cust_email'; ";
            
            //execute the query
            $result = pg_query($pgcon,$query);

            if (pg_num_rows($result) == 1) {

                $query_to_update = "UPDATE tbl_customer SET 
                    cust_pass = '$confirm_password'
                    WHERE cust_username = '$cust_username';
                ";

                $result_to_update = pg_query($pgcon,$query_to_update);
                
                if ($result_to_update == true) {
                    
                    $_SESSION['cust-pass-change'] = "Password Changed";
                    header('location:../login.php');
                } else {
                    
                    $_SESSION['cust-pass-not-change'] = "Password not Changed";
                    header('location:cust-forgot-pass.php');
                }

            } else {
                
                $_SESSION['cust-login-msg'] = "Username or Password is Wrong";
                header('location:cust-forgot-pass.php');
            }
        } else {
            
            $_SESSION['cust-pass-not-match'] = "New and Confirm Password does not Match";
            header('location:cust-forgot-pass.php');
        }

    }

?>
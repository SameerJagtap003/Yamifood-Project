<?php 

    session_start();
    include('constant/coneection.php');

    if (isset($_POST['submit'])) {

        $customer_username = $_SESSION['customer_username'];

		$cust_query = "SELECT cust_id FROM tbl_customer WHERE cust_username = '$customer_username' ";
		$cust_result = pg_query($pgcon,$cust_query);
		$cust_rows = pg_fetch_assoc($cust_result);
        $cust_id = $cust_rows['cust_id'];


        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        //query to insert data
        $query = "INSERT INTO tbl_contact(name, email, message, cust_id)
            VALUES('$name', '$email', '$message', $cust_id);
        ";

        //execute the query
        $result = pg_query($pgcon,$query);

        if ($result == true) {
            
            //data inserted
            $_SESSION['data-inserted'] = "Message sent Succesfully...";
            header('location:contact.php');
        } else {

            $_SESSION['data-not-inserted'] = "Message not sent...";
            header('location:contact.php');
        }
    }

?>
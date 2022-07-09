<?php 

    session_start();
    include('../constant/coneection.php');

    $cust_id = $_SESSION['cust_id'];

    $tbl_date = $_POST['tbl_date'];
    $tbl_time = $_POST['tbl_time'];
    $tbl_person = $_POST['tbl_person'];
    $cust_name = $_POST['cust_name'];
    $cust_email = $_POST['cust_email'];
    $cust_phone = $_POST['cust_phone'];

    $income = $tbl_person * 50;

    $query = "INSERT INTO tbl_table(cust_id, cust_name, cust_email, cust_phone, booking_date, booking_time, no_of_persons, income, status)
            VALUES($cust_id, '$cust_name', '$cust_email', $cust_phone, '$tbl_date', '$tbl_time', $tbl_person, $income, 0)
    ";

    $result = pg_query($pgcon,$query);

    if ($result == true) {
        
        $_SESSION['table_booking'] = "Your Table Is Reserved";
        header('location:../reservation.php');
    } else {

        $_SESSION['table_booking'] = "Something is Wrong";
        header('location:../reservation.php');
    }


?>
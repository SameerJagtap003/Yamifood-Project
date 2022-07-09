<?php 

    include('../constant/coneection.php');

    $result = pg_query($pgcon,"SELECT date_time FROM tbl_orders");
    $rows = pg_fetch_assoc($result);
    $date = date("M d, Y", strtotime($rows['date_time']));
    echo $date;


?>
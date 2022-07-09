

<?php 

    session_start();

    //Connect to DB
    include('../constant/coneection.php');

    //get category id
    $category_id = $_GET['category_id'];
        
    //Query for data
    $query = "SELECT * FROM tbl_category WHERE category_id = $category_id ";

    //Execute the query 
    $result = pg_query($pgcon,$query);

    //Fetch the date
    $rows = pg_fetch_assoc($result);

    if ($rows['category_active'] == 'Active' || $rows['category_active'] == 'active') {
            
        //Query to update
        $query_drink = "UPDATE tbl_category SET
            category_active = 'Not Active'
            WHERE category_id = $category_id
        ";

        //execute the query
        $update_result =  pg_query($pgcon,$query_drink);

        if ($update_result == true) {
                    
            $_SESSION['category_update_msg'] = "Category Updated...";
            header('location:admin-category.php');
        } else {
                    
            $_SESSION['category_update_msg'] = "Category Not Updated...";
            header('location:admin-category.php');
        }

    } elseif($rows['category_active'] == 'Not Active' || $rows['category_active'] == 'not active') {
            
        //Query to update
        $query_drink = "UPDATE tbl_category SET
            category_active = 'Active'
            WHERE category_id = $category_id
        ";

        //execute the query
        $update_result = pg_query($pgcon,$query_drink); 
            
        if ($update_result == true) {
                
            $_SESSION['category_update_msg'] = "Category Updated...";
            header('location:admin-category.php');
        } else {
                
            $_SESSION['category_update_msg'] = "Category Not Updated...";
            header('location:admin-category.php');
        }
    }
?>


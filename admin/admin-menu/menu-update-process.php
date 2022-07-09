<?php 

    session_start();
    
    //connect to DB
    include('../../constant/coneection.php');

    //get id of menu item
    $menu_id = $_SESSION['menu_id'];

    if (isset($_POST['submit'])) {

        if (isset($_FILES['img'])) {
            
            $menu_name = $_POST['menu_name'];
            $menu_price = $_POST['menu_price'];
            $description = $_POST['description'];
            $category = $_POST['category'];
            $status = $_POST['status'];

            //img file
            $file_temp_name = $_FILES['img']['tmp_name'];
            $file_name = $_FILES['img']['name'];

            // //for category
            // if (isset($_POST['category'])) {
                
            //     $category = $_POST['category'];
            // } else {
                
            //     $category = 2;
            // }

            // //for status
            // if (isset($_POST['status'])) {
                
            //     $status = $_POST['status'];
            // } else {
                
            //     $status = "Active";
            // }

            if (move_uploaded_file($file_temp_name,"menu-img/" . $file_name)) {

                //query to update menu
                $update_query = "UPDATE tbl_menu SET 
                    menu_name = '$menu_name',
                    menu_img = '$file_name',
                    menu_description = '$description',
                    menu_price = $menu_price,
                    menu_active = '$status',
                    category_id = $category
                    WHERE menu_id = $menu_id
                ";

                //execute the query
                $update_result = pg_query($pgcon,$update_query);

                //checking whether the query is executed or not
                if ($update_result == true) {
                        
                    $_SESSION['menu-updated'] = "Menu Updated...";
                    header('location:../admin-menu.php');
                } else {
                        
                    $_SESSION['menu-updated'] = "Menu not Updated...";
                    header('location:../admin-menu.php');
                }
            }

        } else {
            $_SESSION['select-img'] = "Please Select the Images for Menu";
            header('location:update-menu.php');
        }
    }
?>

<?php 

    session_start();
    include('../../constant/coneection.php');

    if (isset($_POST['submit']) && isset($_FILES['img'])) {

        $menu_name = $_POST['menu_name'];
        $menu_price = $_POST['menu_price'];
        $description = $_POST['description'];

        //img file
        $file_temp_name = $_FILES['img']['tmp_name'];
        $file_name = $_FILES['img']['name'];

        //for category
        if (isset($_POST['category'])) {
            
            $category = $_POST['category'];
        } else {
            
            $category = 2;
        }

        //for status
        if (isset($_POST['status'])) {
            
            $status = $_POST['status'];
        } else {
            
            $status = "Active";
        }

        if (move_uploaded_file($file_temp_name,"menu-img/" . $file_name)) {

            //query to insert data
            $query = "INSERT INTO tbl_menu(menu_name, menu_img, menu_description, menu_price, menu_active, category_id)
                VALUES('$menu_name','$file_name','$description',$menu_price,'$status',$category);
            ";
            
            //execute the query
            $result = pg_query($pgcon,$query);

            if ($result == true) {
                
                //data inserted
                $_SESSION['menu-add'] = "Menu Added Succesfully...";
                header('location:../admin-menu.php');
            } else {

                $_SESSION['menu-add'] = "Menu Not Added...";
                header('location:../admin-menu.php');
            }
        }
    }

?>
<?php 

    session_start();
    include('../constant/coneection.php');

    if (isset($_POST['submit']) && isset($_FILES['img'])) {
        
        $full_name = $_POST['full_name'];
        $possition = $_POST['possition'];
        $address = $_POST['address'];

        //img file
        $file_temp_name = $_FILES['img']['tmp_name'];
        $file_name = $_FILES['img']['name'];

        if (move_uploaded_file($file_temp_name,"../images/" . $file_name)) {

            //query to insert data
            $query = "INSERT INTO tbl_stuff(stuff_name, stuff_address, stuff_possition, stuff_img)
                    VALUES('$full_name','$address','$possition','$file_name');
            ";

            //execute the query
            $result = pg_query($pgcon,$query);

            if ($result == true) {
                
                //data inserted
                $_SESSION['data-inserted'] = "Stuff Added Succesfully...";
                header('location:stuff.php');
            } else {

                $_SESSION['data-inserted'] = "Stuff Not Added...";
                header('location:stuff.php');
            }
        }

    }

?>
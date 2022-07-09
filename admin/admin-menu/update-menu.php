<?php 
    
    include('login-check-admin-menu.php');
    
    //connection to PostgrSQL
    include('../../constant/coneection.php'); 
    
    //get menu id
    $menu_id = $_GET['menu_id'];
    $_SESSION['menu_id'] = $_GET['menu_id'];

    //query
    $query = "SELECT * FROM tbl_menu WHERE menu_id = '$menu_id'; ";

    //execute the query
    $result = pg_query($pgcon,$query);

    //check whether the query is executed or not
    if ($result == true) {
        
        //check whether the admin data is available or not
        $count = pg_num_rows($result);
        if ($count == 1) {
            
            $rows = pg_fetch_assoc($result);
            $menu_name = $rows['menu_name'];
            $menu_img = $rows['menu_img'];
            $menu_description = $rows['menu_description'];
            $menu_price = $rows['menu_price'];
            $menu_active = $rows['menu_active'];
            $cat_id = $rows['category_id'];
        }
    }

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../admin-css/img-upload.css">

    <title>Add Menu</title>
</head>
<style>
    body{
        padding: 1%;
    }
        
    .profile-pic-div{
        height: 200px;
        width: 200px;
        position: absolute;
        top: 35%;
        left: 65%;
        transform: translate(-50%,-50%);
        border-radius: 50%;
        overflow: hidden;
        border: 1px solid grey;
    }
</style>
<body>

    <div class="container mt-4">
        <h3>Please Add Here:</h3>
        <hr>
        <form action="menu-update-process.php" method="post" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Menu Name</label>
                    <input type="text" class="form-control" name="menu_name" id="inputEmail4" placeholder="Full Name" value="<?php echo $menu_name; ?>" required>
                    <br>
                    <label for="inputEmail4">Menu Price</label>
                    <input type="number" class="form-control" name="menu_price" id="inputEmail4" placeholder="Menu Price" value="<?php echo $menu_price; ?>" required>
                </div>
                <label for="inputEmail4">Select Image</label><br>

                <div class="profile-pic-div">
                    <?php 
                        if (isset($menu_img)) {
                            echo "<img id='photo' src='menu-img/" . $menu_img . " ' class='img-fluid' alt='user' width='400'>";
                        } else {
                            ?>
                            <img src="menu-img/food_default.png" id="photo">
                            <?php
                        }
                    ?>
                    <!-- <img src="menu-img/food_default.png" id="photo"> -->
                    <?php 
                        // echo "<img src='menu-img/" . $rows['menu_img'] . " ' id='photo'> '";
                    ?>
                    <input type="file" id="file" name="img" required>
                    <label for="file" id="uploadBtn">Choose Photo</label>
                </div>
            </div>

            
                <label for="inputEmail4">Category</label><br>

                <?php 
                
                    
                include('../../constant/coneection.php');
                $category_res = pg_query($pgcon,"SELECT * FROM tbl_category");
                $count = 0;
                while ($cat_rows = pg_fetch_assoc($category_res)) {
                    $category_id = $cat_rows['category_id'];
                    $category_name = $cat_rows['category_name'];
                    $category_active = $cat_rows['category_active'];

                    ?>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="category" id="<?php echo $category_name ?>" value="<?php echo $category_id ?>" 
                                <?php 
                                    if ($category_id == $cat_id) {
                                        echo 'checked';
                                    }
                                ?>
                            >
                            <label class="form-check-label" for="<?php echo $category_name ?>"><?php echo $category_name ?></label>
                        </div>

                    <?php
                    $count++;
                    if ($count == 5) {
                        echo "<br>";
                        $count = 0;
                    }
                }
            
            ?>

                <br><br>

                <label for="inputEmail4">Active</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="Active" value="Active" 
                        <?php 
                            if ($menu_active == 'Active') {
                                echo 'checked';
                            }
                        ?>
                    >
                <label class="form-check-label" for="Active">Active</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="NotActive" value="Not Active"
                        <?php 
                            if ($menu_active == 'Not Active') {
                                echo 'checked';
                            }
                        ?>
                    >
                <label class="form-check-label" for="NotActive">NotActive</label>
                </div> 

            <br><br>
            
            <div class="form-group" style="width: 50%;">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="description" placeholder="Description" required></textarea>
            </div>
            <?php 
                if (isset($_SESSION['select-img'])) {
                    echo "<br>" . $_SESSION['select-img'] . "<br>";
                    unset($_SESSION['select-img']);
                }
            ?>
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <!-- img upload js -->
    <script src="../admin-js/app.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

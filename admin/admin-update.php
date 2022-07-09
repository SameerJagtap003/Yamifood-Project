<?php 
    
    include('login-check.php');
    
    //connection to PostgrSQL
    include('../constant/coneection.php'); 
    
    //get admin username 
    $admin_username = $_SESSION['admin_username'];

    //query
    $query = "SELECT * FROM tbl_admin WHERE admin_username = '$admin_username'; ";

    //execute the query
    $result = pg_query($pgcon,$query);

    //check whether the query is executed or not
    if ($result == true) {
        
        //check whether the admin data is available or not
        $count = pg_num_rows($result);
        if ($count == 1) {
            
            $rows = pg_fetch_assoc($result);
            $admin_name = $rows['admin_name'];
            $admin_username = $rows['admin_username'];
            $admin_img = $rows['admin_img'];
            $admin_address = $rows['admin_address'];
            $admin_phone = $rows['admin_phone'];
            $admin_email = $rows['admin_email'];
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
    <link rel="stylesheet" href="admin-css/img-upload.css">

    <title>PHP login system!</title>
  </head>
  <style>
    
    body{
        padding: 1%;
    }
        
    .profile-pic-div{
        height: 200px;
        width: 200px;
        position: absolute;
        top: 50%;
        left: 70%;
        transform: translate(-50%,-50%);
        border-radius: 50%;
        overflow: hidden;
        border: 1px solid grey;
    }
  
  </style>
  <body>

    <div class="container mt-4">
        <h3>Please Register Here:</h3>
        <hr>
        <form action="admin-update-process.php" method="post" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Full Name</label>
                    <input type="text" class="form-control" name="full_name" id="inputEmail4" placeholder="Full Name" value="<?php echo $admin_name ?>" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Username</label>
                    <input type="text" class="form-control" name ="user_name" id="inputPassword4" placeholder="Username" value="<?php echo $admin_username ?>" required>
                </div>
                <div class="form-group col-md-6">
                <label for="inputPassword4">Email</label>
                <input type="email" class="form-control" name ="email" id="inputPassword" placeholder="Email" value="<?php echo $admin_email ?>" required>
                </div>
                <div class="form-group col-md-6">
                    
                </div>
            </div>

            <div class="profile-pic-div">
                <img src="admin-img/image.jpg" id="photo">
                <?php 
                    // echo "value='" . "<img src='admin-img/" . $rows['admin_img'] . " ' id='photo'> '";
                 ?>
                <input type="file" id="file" name="img" required>
                <label for="file" id="uploadBtn">Choose Photo</label>
            </div>

            <div class="form-group" style="width: 50%;">
                <label for="inputPassword4">Phone Number</label>
                <input type="phone" class="form-control" name ="phone_no" id="inputPassword4" placeholder="Phone Number" value="<?php echo $admin_phone ?>" required>
                <br>
                <label for="inputPassword4">New Password</label>
                <input type="password" class="form-control" name ="new_password" id="inputPassword" placeholder="New Password" required>
                <br>
                <label for="inputPassword4">Confirm Password</label>
                <input type="password" class="form-control" name ="confirm_password" id="inputPassword" placeholder="Confirm Password" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Address</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" cols="10" placeholder="Address" name="address" value="<?php echo $admin_address ?>" required></textarea>
            </div>
            <?php 
                if (isset($_SESSION['new-conf-pass-not-match'])) {
                    echo $_SESSION['new-conf-pass-not-match'] . "<br>";
                    unset($_SESSION['new-conf-pass-not-match']);
                }
            ?>
            <input type="submit" name="submit" value="submit" class="btn btn-primary">
        </form>
    </div>

    <!-- img upload js -->
    <script src="admin-js/app.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

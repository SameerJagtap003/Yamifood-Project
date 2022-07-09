<?php session_start(); ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="css/customer-login-style.css">

</head>


<body>

    <main id="main-area"> 
            
    <!-- registration area -->
    <section id="register">
        <div class="row m-0">
            <div class="col-lg-4 offset-lg-2">
                <div class="text-center pb-5">
                    <h1 class="login-title text-dark">Register</h1>
                    <p class="p-1 m-0 font-ubuntu text-black-50">Register and enjoy additional features</p>
                    <span class="font-ubuntu text-black-50">I already have <a href="login.php">Login</a></span>
                </div>
                <div class="upload-profile-image d-flex justify-content-center pb-5">
                    <div class="text-center">
                        <div class="d-flex justify-content-center">
                            <img class="camera-icon" src="images/assets/camera-solid.svg" alt="camera">
                        </div>
                        <img src="images/assets/profile/beard.png" style="width: 200px; height: 200px" class="img rounded-circle" alt="profile">
                        <small class="form-text text-black-50">Choose Image</small>
                        <input type="file" form="reg-form" class="form-control-file" name="img" id="upload-profile">
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <form action="customer/customer-register-process.php" method="post" enctype="multipart/form-data" id="reg-form">
                        <div class="form-row">
                            <div class="col">
                                <input type="text" value="" name="full_name" id="firstName" class="form-control" placeholder="Full Name">
                            </div>
                            <div class="col">
                                <input type="text" value="" name="username" id="LastName" class="form-control" placeholder="Username">
                            </div>
                        </div>

                        <div class="form-row my-4">
                            <div class="col">
                                <input type="email" value="" required name="email" id="email" class="form-control" placeholder="Email*">
                            </div>
                        </div>
                        <div class="form-row my-4">
                            <div class="col">
                                <input type="text" value="" required name="phone_no" id="email" class="form-control" placeholder="Phone No*">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <input type="password" value="" name="password" id="firstName" class="form-control" placeholder="Password">
                            </div>
                            <div class="col">
                                <input type="password" value="" name="confirm_password" id="LastName" class="form-control" placeholder="Confirm Password">
                            </div>
                        </div>

                        <div class="form-row my-4">
                            <div class="col">
                                <textarea name="address" placeholder="Address" id="LastName" required class="form-control" cols="5" ></textarea>
                            </div>
                        </div>

                        <!-- <div class="form-row my-4">
                            <div class="col">
                                <input type="password" required name="password" id="password" class="form-control" placeholder="password*">
                            </div>
                        </div>

                        <div class="form-row my-4">
                            <div class="col">
                                <input type="password" required name="confirm_pwd" id="confirm_pwd" class="form-control" placeholder="Confirm Password*">
                                <small id="confirm_error" class="text-danger"></small>
                            </div>
                        </div> -->

                        <!-- <div class="form-check form-check-inline">
                            <input type="checkbox" name="agreement" class="form-check-input" required>
                            <label for="agreement" class="form-check-label font-ubuntu text-black-50">I agree <a href="#">term, conditions, and policy </a>(*) </label>
                        </div> -->
                        <?php 
                            if (isset( $_SESSION['pass-msg'])) {
                                echo  $_SESSION['pass-msg'] . "<br>";
                                unset( $_SESSION['pass-msg']);
                            }
                        ?>
                        <div class="submit-btn text-center my-5">
                            <button type="submit" name="submit" class="btn btn-warning rounded-pill text-dark px-5">Continue</button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- #registration area -->



    </main>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script src="js/main.js"></script>
</body>
</html>
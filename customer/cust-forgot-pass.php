<?php session_start(); ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>PHP login system!</title>
</head>
<body>

    <div class="container mt-4">
        <h3>Please Register Here:</h3>
        <hr>
        <form action="cust-forgot-pass-process.php" method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Username</label>
                    <input type="text" class="form-control" name="cust_username" id="inputEmail4" placeholder="Username" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Email</label>
                    <input type="email" class="form-control" name ="cust_email" id="inputPassword4" placeholder="Email" required>
                </div>
                
                <!-- <div class="form-group col-md-6">
                    <label for="inputPassword4">Telephone Number(Optional)</label>
                    <input type="tel" class="form-control" name ="tel_no" id="inputPassword4" placeholder="Telephone Number">
                </div> -->
            </div>

            <div class="form-group" style="width: 50%;">
                <label for="inputPassword4">Password</label>
                <input type="password" class="form-control" name ="password" id="inputPassword" placeholder="Password" required>
                <br>
                <label for="inputPassword4">Confirm Password</label>
                <input type="password" class="form-control" name ="confirm_password" id="inputPassword" placeholder="Confirm Password" required>
            </div>
            <?php 
                if (isset($_SESSION['cust-pass-not-change'])) {
                    echo $_SESSION['cust-pass-not-change'] . "<br><br>";
                    unset($_SESSION['cust-pass-not-change']);
                }
                if (isset($_SESSION['cust-login-msg'])) {
                    echo $_SESSION['cust-login-msg'] . "<br><br>";
                    unset($_SESSION['cust-login-msg']);
                }
                if (isset($_SESSION['cust-pass-not-match'])) {
                    echo $_SESSION['cust-pass-not-match'] . "<br><br>";
                    unset($_SESSION['cust-pass-not-match']);
                }
            ?>
            <button type="submit" name="submit" class="btn btn-primary">Change Password</button>
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
